<?php
$necessario = array('hotel');
include('../template/iniciarDados.php');

if ($_SESSION['NIVEL'] != 2 && $_SESSION['NIVEL'] != 1) {
    header('location:../home/');
}
// se tem o id do hotel faz a busca para colocar nos campos
$hotelVo = new HotelVo();

if(!empty($_GET['hotel'])){
	$hotelVo ->setHotelId($_GET['hotel']);
	$hotelBpm = new HotelBpm();
	$hotelVo = $hotelBpm -> exibir($hotelVo, 'hotel');
	//var_dump($hotelVo);
	
	$telefoneArray = $hotelVo->getTelefoneVo();
	$cepXedicaoVo = $hotelVo->getCepXedicaoVo();
	if($cepXedicaoVo->getCepXedicaoTipo() == 1) {
		$cepCadastro = $hotelVo->getCepCadastroVo();

	} else {		echo '2343';
		
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en_US" xml:lang="en_US">
    <head>
        <title><?php echo $nome_site_Title; ?></title>
        <!-- css gerais-->
        <?php include('../template/css.php'); ?>
    </head>
    <body>	
        <?php include('../template/topoAdmin.php') ?>
        <div class="content cf">
            <div class="container">
                <div class="middle">

                    <!-- conteudo -->	
                    <form action="hotelController.php" method="post" id="cadastroHotel" onsubmit="return verificarCampos('cadastroHotel', 'hotel');" >
                        <input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarHotel" />

                        <input type="hidden" name="hotelId" id="hotelId" value="<?php echo $hotelVo->getHotelId();?>" />


                        <div id="hotel" >
                            <!-- hotel -->
                            <label>Nome do hotel:</label><br />
                            </label><input type="text" name="hotelNome" id="hotelNome" value="<?php echo $hotelVo->getHotelNome();?>" maxlength="50" class="obrigatorio" onblur='verificaCamposUnicos("hotel", "hotelNome", this.value);' /><br />
                            E-mail:<br />
                            <input type="text" name="hotelEmail" id="hotelEmail" value="<?php echo $hotelVo->getHotelEmail();?>" maxlength="50" class="obrigatorio" onblur='verificaCamposUnicos("hotel", "hotelEmail", this.value);' /><br />
                            Cnpj: 	<br />
                            <input type="text" name="hotelCnpj" id="hotelCnpj" value="<?php echo $hotelVo->getHotelCnpj();?>" maxlength="50" class="obrigatorio cnpj" onblur='verificaCamposUnicos("hotel", "hotelCnpj", this.value);' /><br />
                            Inscrição Estadual:	<br />
                            <input type="text" name="hotelInscricaoEstadual" id="hotelInscricaoEstadual" value="<?php echo $hotelVo->getHotelInscricaoEstadual();?>" maxlength="50" class="obrigatorio" onblur='verificaCamposUnicos("hotel", "hotelInscricaoEstadual", this.value);' /><br />
                            Gerente: 	<br />
                            <input type="text" name="hotelGerente" id="hotelGerente" value="<?php echo $hotelVo->getHotelGerente();?>" maxlength="50" class="obrigatorio"  /><br />
                            Observação:<br />
                            <input type="text" name="hotelObservacao" id="hotelObservacao" value="<?php echo $hotelVo->getHotelObservacao();?>" maxlength="50" class="obrigatorio"  /><br />

                            <div id='telefone'>
                                <!-- telefone -->
                            </div>
                            <a onclick="mostrarTelefone();">+ telefone</a><br />
                            <input type='hidden' name="qtdeTelefone" id="qtdeTelefone" value="" />


                            <label for="cepPesquisa">Cep</label>
                            <input type="text" 		name="cepPesquisa" 		id="cepPesquisa"    class="cep obrigatorio" />
                            <input type="button" 	value="Pesquisar cep" onclick="cepPesquisar();" /><br />

                            <input type="hidden" 	name="cepXedicaoTipo" 	id="cepXedicaoTipo" 	value="" />		      
                            <input type="hidden" 	name="cepXedicaoId" 	id="cepXedicaoId" 	value="" />		  
                            <div id='cep'>
                                <!-- cep -->   
                            </div>


                            <input type="submit" name="cmdSalvar" value="<?php echo(empty($_GET)?'Cadastrar':'Alterar');?>" />
                        </div>
                    </form>


                </div>
            </div>
        </div>

        <?php include('../template/rodapeAdmin.php'); ?>
    </body>
    <!-- scripts gerais -->
    <?php include('../template/js.php') ?>	
    <script type="text/javascript" src="../../_js/hotel.js"></script>	
    <script type="text/javascript">
		telefoneArray = new Array();
		cepArray = new Array();
		cepComplementoArray = new Array();
		
		// seta o campo hidden como zero
		$('#qtdeTelefone').val(0);	
		//seta o cepXedicaoTipo com o valor do banco
		cepTipo = <?php echo $cepXedicaoVo->getCepXedicaoTipo();?>;
		$('#cepXedicaoTipo').val(cepTipo);
		
		
		<?php if (!empty($_SESSION['NOME'])){ 
				for ( $i = 0; $i < count($telefoneArray); $i++ ) { ?>
					
					var telefone = new Object(); 	
					<?php foreach ( $telefoneArray[$i]->telefoneObrigatorio as $chave => $valor) { ?>
						telefone['<?php echo $chave;?>'] = '<?php eval('echo $telefoneArray['.$i.']->get'.ucfirst($chave).'();'); ?>';
	
					<?php } ?>	
					
					telefoneArray[<?php echo $i;?>] = telefone;	  
			<?php } ?>
			<?php if ($cepXedicaoVo->getCepXedicaoTipo() == 1) { 
				// mostra o cepCadastro preenchido
					foreach ( $cepCadastro->cepCadastroObrigatorio as $chave => $valor ) { ?>
		       			cepArray['<?php echo $chave;?>'] = '<?php eval('echo $cepCadastro->get'.ucfirst($chave).'();'); ?>';
			<?php	}					
			 } else { ?>
				 
			<?php }?>
			<?php foreach ( $cepXedicaoVo->cepXedicaoObrigatorio as $chave => $chave ) { ?>
	       			cepComplementoArray['<?php echo $chave; ?>'] =  '<?php eval('echo $cepXedicaoVo->get'.ucfirst($chave).'();'); ?>';
			<?php }
			
			}?>
	
			
			
		
		<?php if(empty($_SESSION['ID'])) { ?>
		<?php } ?>
		
	</script>	
</html>

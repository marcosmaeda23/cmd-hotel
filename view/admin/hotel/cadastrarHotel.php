<?php
require_once '../topoAdmin.php';

require_once '../../../dao/Banco.php';
require_once '../../../dao/Entidade.php';
require_once '../../../dao/HotelDao.php';
require_once '../../../dao/TelefoneDao.php';
require_once '../../../dao/CepXedicaoDao.php';
require_once '../../../dao/CepCadastroDao.php';

require_once '../../../bpm/BpmGenerico.php';
require_once '../../../bpm/HotelBpm.php';
require_once '../../../bpm/CepBpm.php';
require_once '../../../bpm/TelefoneBpm.php';

require_once '../../../vo/HotelVo.php';
require_once '../../../vo/CepXedicaoVo.php';
require_once '../../../vo/CepCadastroVo.php';
require_once '../../../vo/TelefoneVo.php';

require_once '../../../biblioteca/funcoes.php';


// verificar a sessao
session_start();
//var_dump($_SESSION);
$hotelVo = new HotelVo();
if (!empty($_SESSION['NOME'])) {
    if (!empty($_SESSION['ID'])) {
        $hotelBpm = new HotelBpm();
        // buscar hotel para mostrar nos campos
        $hotelVo->setHotelId($_SESSION['ID']);
        $hotelVo = $hotelBpm->exibir($hotelVo, 'hotel');
    }
    $telefoneArray = $hotelVo->getTelefoneVo();
    $cepXedicaoVo = $hotelVo->getCepXedicaoVo();
    if ($cepXedicaoVo->getCepXedicaoTipo() == 1) {
        $cepCadastro = $hotelVo->getCepCadastroVo();
    } else {
        
    }
}

//var_dump($CepXedicaoVo);
//var_dump($hotelVo);
// se for sessao de cliente mostrar o cadastro preenchido botao pra apagar cadastro ou alterar, o campo de senha tbm
// ou sem sessao de cliente cadastro normal , o campo de senha tbm
// sessao de gerente mostrar nivel de acesso, apagar, alterar, cadastrar, nao mostrar campo de senha e sim um botao para enviar email para o cliente
// sessao do recepcionista , cadastrar, alterar, nao mostrar campo de senha e sim um botao para enviar email pro cliente
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en_US" xml:lang="en_US">
    <!--
     * Created on 22/05/2012
     *
     * To change the template for this generated file go to
     * Window - Preferences - PHPeclipse - PHP - Code Templates
    -->
    <head>
        <title> </title>

    </head>
    <body>	
        <div id="formulario">
            <form action="hotelController.php" method="post" id="cadastroHotel" onsubmit="return verificarCampos();" >
                <input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarHotel" />

                <input type="hidden" name="hotelId" id="hotelId" value="" />


                <div id="hotel" >
                    <!-- hotel -->
                    <label>Nome do hotel:</label><br />
                    </label><input type="text" name="hotelNome" id="hotelNome" value="" maxlength="50" class="obrigatorio"  /><br />
                    E-mail:<br />
                    <input type="text" name="hotelEmail" id="hotelEmail" value="" maxlength="50" class="obrigatorio"  /><br />
                    Cnpj: 	<br />
                    <input type="text" name="hotelCnpj" id="hotelCnpj" value="" maxlength="50" class="obrigatorio"  /><br />
                    Inscrição Estadual:	<br />
                    <input type="text" name="hotelInscricaoEstadual" id="hotelInscricaoEstadual" value="" maxlength="50" class="obrigatorio"  /><br />
                    Confirmacao de senha: 	<br />
                    <input type="text" name="hotelGerente" id="hotelGerente" value="" maxlength="50" class="obrigatorio"  /><br />
                    Observação:<br />


		        
			<div id='telefone'>
				<!-- telefone -->
			</div>
			<a onclick="mostrarTelefone();">+ telefone</a><br />
			<input type='hidden' name="qtdeTelefone" id="qtdeTelefone" value="" />
			          

                    <label for="cepPesquisa">Cep</label>
                    <input type="text" 		name="cepPesquisa" 		id="cepPesquisa"    class="cep" />
                    <input type="button" 	value="Pesquisar cep" onclick="cepPesquisar();" /><br />

                    <input type="hidden" 	name="cepXedicaoTipo" 	id="cepXedicaoTipo" 	value="" />		      
                    <input type="hidden" 	name="cepXedicaoId" 	id="cepXedicaoId" 	value="" />		  
                    <div id='cep'>
                        <!-- cep -->   
                    </div>


                    <input type="submit" name="cmdSalvar" value=" Cadastrar " />
            </form>
        </div>
    </body>
	<!-- scripts -->
	<script type="text/javascript" src="../../_js/slider/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="../../_js/plugin/jquery.maskedinput-1.3.min.js"></script>
	<script type="text/javascript" src="../../_js/funcoes.js"></script>
	<script type="text/javascript" src="../../modulos/modulos.js"></script>
	<script type="text/javascript" src="../../_js/usuario.js"></script>
	
	<script type="text/javascript">
		telefoneArray = new Array();
		cepArray = new Array();
		cepComplementoArray = new Array();
		
		// seta o campo hidden como zero
		$('#qtdeTelefone').val(0);	
		//seta o cepXedicaoTipo com o valor do banco
		cepTipo = <?php echo $cepXedicaoVo->getCepXedicaoTipo();?>;
		$('#cepXedicaoTipo').val(cepTipo);
		
		var edicao = false;
		
		<?php if (!empty($_SESSION['ID'])){ 
				for ( $i = 0; $i < count($telefoneArray); $i++ ) { ?>
					var telefone = new Object(); 	
					<?php foreach ( $telefoneArray[$i]->telefoneObrigatorio as $chave => $valor) { ?>				
						telefone['<?php echo $chave;?>'] = '<?php eval('echo $telefoneArray['.$i.']->get'.ucfirst($chave).'();'); ?>';
					<?php } ?>	
					telefoneArray[<?php echo $i;?>] = telefone;	     
			<?php } ?>
			edicao = true;
			<?php if ($cepXedicaoVo->getCepXedicaoTipo() == 1) { 
				// mostra o cepCadastro preenchido
					foreach ( $cepCadastro->cepCadastroObrigatorio as $chave => $valor ) { ?>
		       			cepArray['<?php echo $chave;?>'] = '<?php eval('echo $cepCadastro->get'.ucfirst($chave).'();'); ?>';
			<?php	}					
			 } else { ?>
				// mostra o campo do cep do banco 
			<?php }?>
			<?php foreach ( $cepXedicaoVo->cepXedicaoObrigatorio as $chave => $chave ) { ?>
	       			cepComplementoArray['<?php echo $chave; ?>'] =  '<?php eval('echo $cepXedicaoVo->get'.ucfirst($chave).'();'); ?>';
			<?php }
			
			}?>
		
		
			mostrarTelefone()
		
		aplicarMascara(<?php $_POST['paisOrigem'];?>);
		
	</script>
</html>


<?php require_once '../rodapeAdmin.php'; ?>

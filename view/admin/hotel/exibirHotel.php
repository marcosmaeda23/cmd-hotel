<?php
$necessario = array('hotel');
include('../../admin/template/iniciarDados.php');

if ($_SESSION['NIVEL'] == 4) {
    header('location:../home/');
}
// se tem o id do hotel faz a busca para colocar nos campos
$hotelVo = new HotelVo();

if (!empty($_GET['hotel'])) {
    $hotelVo->setHotelId($_GET['hotel']);
    $hotelBpm = new HotelBpm();
    $hotelVo = $hotelBpm->exibir($hotelVo, 'hotel');
    //var_dump($hotelVo);

    $telefoneArray = $hotelVo->getTelefoneVo();
    $cepXedicaoVo = $hotelVo->getCepXedicaoVo();
    if ($cepXedicaoVo->getCepXedicaoTipo() == 1) {
        $cepCadastro = $hotelVo->getCepCadastroVo();
    } else {
        echo '2343';
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
                    <div class="cadastro_titulo"><p> Detalhes Hotel </p></div>	
                    <form action="hotelController.php" method="post" id="cadastroHotel" onsubmit="return verificarCampos('cadastroHotel', 'hotel');" >
                        <input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarHotel" />

                        <input type="hidden" name="hotelId" id="hotelId" value="<?php echo $hotelVo->getHotelId(); ?>" />


                        <div id="hotel" >
                            <!-- hotel -->
                            <label>Nome do hotel:</label>
                            <?php echo $hotelVo->getHotelNome(); ?><br /><br />
                            E-mail:<br />
                            <?php echo $hotelVo->getHotelEmail(); ?><br /><br />
                            Cnpj: 	<br />
                            <?php echo $hotelVo->getHotelCnpj(); ?><br /><br />
                            Inscrição Estadual:	<br />
                            <?php echo $hotelVo->getHotelInscricaoEstadual(); ?><br /><br />
                            Gerente: 	<br />
                            <?php echo $hotelVo->getHotelGerente(); ?><br /><br />
                            Observação:<br />
                            <?php echo $hotelVo->getHotelObservacao(); ?><br /><br />
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
        cepTipo = '';
<?php if (!empty($_GET['hotel'])) { ?>
        // seta o campo hidden como zero
        $('#qtdeTelefone').val(0);	
        //seta o cepXedicaoTipo com o valor do banco
        cepTipo = <?php echo $cepXedicaoVo->getCepXedicaoTipo(); ?>;
        $('#cepXedicaoTipo').val(cepTipo);
            		
    <?php for ($i = 0; $i < count($telefoneArray); $i++) { ?>
                        					
                var telefone = new Object(); 	
        <?php foreach ($telefoneArray[$i]->telefoneObrigatorio as $chave => $valor) { ?>
                        telefone['<?php echo $chave; ?>'] = '<?php eval('echo $telefoneArray[' . $i . ']->get' . ucfirst($chave) . '();'); ?>';
                                    	
        <?php } ?>	
                        					
                    telefoneArray[<?php echo $i; ?>] = telefone;	  
    <?php } ?>
    <?php
    if ($cepXedicaoVo->getCepXedicaoTipo() == 1) {
        // mostra o cepCadastro preenchido
        foreach ($cepCadastro->cepCadastroObrigatorio as $chave => $valor) {
            ?>
                            cepArray['<?php echo $chave; ?>'] = '<?php eval('echo $cepCadastro->get' . ucfirst($chave) . '();'); ?>';
            <?php
        }
    } else {
        ?>
                        				 
    <?php } ?>
    <?php foreach ($cepXedicaoVo->cepXedicaoObrigatorio as $chave => $chave) { ?>
                cepComplementoArray['<?php echo $chave; ?>'] =  '<?php eval('echo $cepXedicaoVo->get' . ucfirst($chave) . '();'); ?>';
        <?php
    }
}
?>
	
			
			
		
<?php if (empty($_SESSION['ID'])) { ?>
<?php } ?>
		
    </script>	
</html>

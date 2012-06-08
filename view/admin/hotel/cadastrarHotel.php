<?php
include('../template/iniciarDados.php');

if ($_SESSION['NIVEL'] != 2 && $_SESSION['NIVEL'] != 1) {
    header('location:../home/');
}
// se tem o id do hotel faz a busca para colocar nos campos
if(!empty($_GET['hotel'])){
	echo 'buscando';
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

                        <input type="hidden" name="hotelId" id="hotelId" value="" />


                        <div id="hotel" >
                            <!-- hotel -->
                            <label>Nome do hotel:</label><br />
                            </label><input type="text" name="hotelNome" id="hotelNome" value="" maxlength="50" class="obrigatorio" onblur='verificaCamposUnicos("hotel", "hotelNome", this.value);' /><br />
                            E-mail:<br />
                            <input type="text" name="hotelEmail" id="hotelEmail" value="" maxlength="50" class="obrigatorio" onblur='verificaCamposUnicos("hotel", "hotelEmail", this.value);' /><br />
                            Cnpj: 	<br />
                            <input type="text" name="hotelCnpj" id="hotelCnpj" value="" maxlength="50" class="obrigatorio cnpj" onblur='verificaCamposUnicos("hotel", "hotelCnpj", this.value);' /><br />
                            Inscrição Estadual:	<br />
                            <input type="text" name="hotelInscricaoEstadual" id="hotelInscricaoEstadual" value="" maxlength="50" class="obrigatorio" onblur='verificaCamposUnicos("hotel", "hotelInscricaoEstadual", this.value);' /><br />
                            Gerente: 	<br />
                            <input type="text" name="hotelGerente" id="hotelGerente" value="" maxlength="50" class="obrigatorio"  /><br />
                            Observação:<br />
                            <input type="text" name="hotelObservacao" id="hotelObservacao" value="" maxlength="50" class="obrigatorio"  /><br />

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


                            <input type="submit" name="cmdSalvar" value=" Cadastrar " />
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
	</script>	
</html>

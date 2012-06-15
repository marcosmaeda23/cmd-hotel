<?php
$necessario = array('usuario');
include('../../admin/template/iniciarDados.php');


$usuarioVo = new UsuarioVo();
if (!empty($_GET)) {


    $usuarioBpm = new UsuarioBpm();
    // buscar usuario para mostrar nos campos
    $usuarioVo->setUsuarioId($_GET['usuario']);
    $usuarioVo = $usuarioBpm->exibir($usuarioVo, 'usuario');
    var_dump($usuarioVo);

    $telefoneArray = $usuarioVo->getTelefoneVo();
    $cepXedicaoVo = $usuarioVo->getCepXedicaoVo();
    if ($cepXedicaoVo->getCepXedicaoTipo() == 1) {
        $cepCadastro = $usuarioVo->getCepCadastroVo();
    } else {
        echo '2343';
    }
}

//var_dump($CepXedicaoVo);
//var_dump($usuarioVo);
// se for sessao de cliente mostrar o cadastro preenchido botao pra apagar cadastro ou alterar, o campo de senha tbm
// ou sem sessao de cliente cadastro normal , o campo de senha tbm
// sessao de gerente mostrar nivel de acesso, apagar, alterar, cadastrar, nao mostrar campo de senha e sim um botao para enviar email para o cliente
// sessao do recepcionista , cadastrar, alterar, nao mostrar campo de senha e sim um botao para enviar email pro cliente
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en_US" xml:lang="en_US">

    <head>
        <title><?php echo $nome_site_Title; ?></title>
        <?php include('../template/css.php'); ?>	
    </head>
    <body>	
        <?php
        if (!empty($_SESSION)) {
            include('../template/topoAdmin.php');
        } else {
            include('../../template/topo.php');
            echo "<div  style='padding-top:120px;'>";
        }
        ?>
        <div class="content cf">
            <div class="container">
                <div class="middle">	
                    <div class="cadastro_titulo"><p> Cadastrar Usu&aacute;rio </p></div>	
                    <div id="formulario">
                        <form action="usuarioController.php" method="post" id="cadastroUsuario" onsubmit="return verificarCampos('cadastroUsuario');" >
                            <input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarUsuario" />
                            <input type="hidden" name="usuarioStatus" id="usuarioStatus" value="1" />			

                            <input type="hidden" name="paisOrigem" id="paisOrigem" value="<?php echo $_POST['paisOrigem'] ? $_POST['paisOrigem'] : 'brasil'; ?>" />
                            <input type="hidden" name="usuarioId" id="usuarioId" value="<?php echo $usuarioVo->getUsuarioId(); ?>" />


                            <div id="usuario" >
                                <!-- usuario -->
                                <label>Nome completo:</label><br />
                                </label><input type="text" name="usuarioNome" id="usuarioNome" value="<?php echo $_POST['usuarioNome'] ? $_POST['usuarioNome'] : $usuarioVo->getUsuarioNome(); ?>" maxlength="50" class="obrigatorio"  /><br />
                                Seu e-mail:<br />
                                <input type="text" name="usuarioEmail" id="usuarioEmail" value="<?php echo $_POST['usuarioEmail'] ? $_POST['usuarioEmail'] : $usuarioVo->getUsuarioEmail(); ?>" maxlength="50" onblur='verificaCamposUnicos("usuario", "usuarioEmail", this.value);' class="obrigatorio"  /><br />

                                <div id='campoLogin'>

                                </div>

                                <?php if ($_SESSION['NIVEL'] == 2 || $_SESSION['NIVEL'] == 1) { ?>
                                    Nivel:<br />
                                    <select name="nivelId" id="nivelId" class="obrigatorio" >
                                        <option value=""> Selecione o Nivel: </option>
                                        <option value="2"> Gerente </option>
                                        <option value="3"> Recepcionista </option>
                                    </select><br />
                                <?php } else if ($_SESSION['NIVEL'] == 3) { ?>
                                    <input type="hidden" name="nivelId" id="nivelId" value="3" />
                                <?php } else { ?>
                                    <input type="hidden" name="nivelId" id="nivelId" value="4" />
                                <?php } ?>

                                Eu Sou:<br />
                                <select name="usuarioSexo" id="usuarioSexo" class="obrigatorio" >
                                    <option value=""> Selecione o g&ecirc;nero: </option>
                                    <option value="m" <?php echo $usuarioVo->getUsuarioSexo() == 'm' ? 'selected=\'selected\'' : ''; ?>> Masculino </option>
                                    <option value="f" <?php echo $usuarioVo->getUsuarioSexo() == 'f' ? 'selected=\'selected\'' : ''; ?>> Feminino </option>
                                </select><br />
                                Data de nascimento:	<br />
                                <input type="text" name="usuarioDataNascimento" id="usuarioDataNascimento" value="<?php echo $usuarioVo->getUsuarioDataNascimento(); ?>" maxlength="50" class="obrigatorio data"  /><br />
                                Documento tipo: 	<br />
                                <select name="usuarioDocumentoTipo" id="usuarioDocumentoTipo" onchange="mudaMascara(this.value);" class="obrigatorio" >
                                    <option value=""> Selecione o tipo do documento: </option>
                                    <option value="cpf" <?php echo $usuarioVo->getUsuarioDocumentoTipo() == 'cpf' ? 'selected=\'selected\'' : ''; ?>> cpf </option>
                                    <option value="cnpj" <?php echo $usuarioVo->getUsuarioDocumento() == 'cnpj' ? 'selected=\'selected\'' : ''; ?>> cnpj </option>
                                    <option value="passaporte" <?php echo $usuarioVo->getUsuarioDocumentoTipo() == 'passaporte' ? 'selected=\'selected\'' : ''; ?>> passaporte </option>
                                </select><br />
                                <div id='documentoNumero' style='display:none;'>
                                    Documento numero: 	<br />
                                    <input type="text" name="usuarioDocumento" id="usuarioDocumento" value="<?php echo $usuarioVo->getUsuarioDocumento() ?>" maxlength="50" onblur='verificaCamposUnicos("usuario", "usuarioDocumento", this.value);' class="obrigatorio"  /><br />
                                </div>
                            </div> 	


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


                            <input type="submit" name="cmdSalvar" value="<?php echo(empty($_GET) ? 'Cadastrar' : 'Alterar'); ?>" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include('../template/rodapeAdmin.php'); ?>
    </body>
    <!-- scripts -->
    <?php include('../template/js.php'); ?>
    <script type="text/javascript" src="../../_js/usuario.js"></script>	
    <script type="text/javascript">
        telefoneArray = new Array();
        cepArray = new Array();
        cepComplementoArray = new Array();
        cepTipo = '';
		
<?php if (!empty($_GET)) { ?>
        // seta o campo hidden como zero
        $('#qtdeTelefone').val(0);	
        //seta o cepXedicaoTipo com o valor do banco
    <?php if (!empty($cepXedicaoVo)) { ?>
                cepTipo = <?php echo $cepXedicaoVo->getCepXedicaoTipo(); ?>;
                $('#cepXedicaoTipo').val(cepTipo);
        <?php
    }


    for ($i = 0; $i < count($telefoneArray); $i++) {
        ?>
                		        					
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
} else {
    ?>
<?php }
?>
    mostrarCampoLogin();
	
		
		
    </script>
</html>
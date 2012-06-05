<?php
//require_once '../topoAdmin.php';

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
$usuarioVo = new UsuarioVo();
if (!empty($_SESSION['NOME'])) {
    if (!empty($_SESSION['ID'])) {
        $usuarioBpm = new UsuarioBpm();
        // buscar usuario para mostrar nos campos
        $usuarioVo->setUsuarioId($_SESSION['ID']);
        $usuarioVo = $usuarioBpm->exibir($usuarioVo, 'usuario');
    }
    $telefoneArray = $usuarioVo->getTelefoneVo();
    $cepXedicaoVo = $usuarioVo->getCepXedicaoVo();
    if ($cepXedicaoVo->getCepXedicaoTipo() == 1) {
        $cepCadastro = $usuarioVo->getCepCadastroVo();
    } else {
        
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
                <input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarUsuario" />

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
                    <a onclick="chamarFuncaoTel()">+ telefone</a><br />
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
</html>

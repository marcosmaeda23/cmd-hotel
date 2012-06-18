<?php
$necessario = array('hotel', 'ambiente', 'quartoTipo', 'usuario');
include('../template/iniciarDados.php');

// buscar os hoteis para mostar no slect
$arrayHotelVo = new HotelVo();
$hotelBpm = new HotelBpm();
$arrayHotelVo = $hotelBpm->buscar('hotel');

// buscar os Tipo Quarto para mostar no slect
$arrayQuartoTipoVo = new QuartoTipoVo();
$quartoTipoBpm = new QuartoTipoBpm();
$arrayQuartoTipoVo = $quartoTipoBpm->buscar('quartoTipo');

// buscar os Tipo Quarto para mostar no slect
$arrayAmbienteVo = new AmbienteVo();
$ambienteBpm = new AmbienteBpm();
$arrayAmbienteVo = $ambienteBpm->buscar('ambiente');

$usuarioVo = new UsuarioVo();
if($_SESSION['NIVEL'] <> 4){
    $usuarioBpm = new UsuarioBpm();
    $usuarioVo = $usuarioBpm->buscar('usuario');	
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
                    <div class="cadastro_titulo"><p> Cadastrar Reserva </p></div>	
                    <div id="formulario">
                        <?php
                        if (count($arrayHotelVo) == 0) {
                            echo 'Voce precisa cadastar algum hotel antes.';
                            $ERRO = true;
                        }
                        if (count($arrayQuartoTipoVo) == 0) {
                            echo 'Voce precisa cadastar algum tipo de quarto antes.';
                            $ERRO = true;
                        }
                        if (count($arrayAmbienteVo) == 0) {
                            echo 'Voce precisa cadastar algum tipo de ambiente antes.';
                            $ERRO = true;
                        }
                        if (!$ERRO) {
                            ?>								
                            <form id="cadastrarReserva" action="cadastrarReserva.php" method="post" onsubmit="return verificarCampos('cadastrarReserva');" >
                                <input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarReserva" />
                                <div id="quarto" >
                                    <!-- Quarto -->
                                    Selecione o hotel:<br />
                                    <select name="hotelId" id="hotelId" class="obrigatorio" >
                                        <option value=""> Selecione o hotel: </option>
                                        <?php for ($i = 0; $i < count($arrayHotelVo); $i++) { ?>
                                            <option value="<?php echo $arrayHotelVo[$i]->getHotelId(); ?>">
                                                <?php echo $arrayHotelVo[$i]->getHotelNome(); ?>
                                            </option>

                                        <?php }
                                        ?>
                                    </select><br />
                                    
		                            <?php
		                            if($_SESSION['NIVEL'] == 4){ ?>
		                           		<input type="hidden" class="obrigatorio" name="usuarioId" id="usuarioId" value="<?php echo $_SESSION['ID']; ?>"  />
		                           	<?php
		                            } else {
		                               	?>
		                            	 Selecione o usuario:<br />
		                                    <select name="usuarioId" id="usuarioId" class="obrigatorio" >
		                                        <option value=""> Selecione o usuário: </option>
		                                        <?php for ($i = 0; $i < count($usuarioVo); $i++) { ?>
		                                            <option value="<?php echo $usuarioVo[$i]->getUsuarioId(); ?>">
		                                                <?php echo $usuarioVo[$i]->getUsuarioNome(); ?>
		                                            </option>
		
		                                        <?php }
		                                        ?>
		                                    </select><br /> 
		                                    
		                                    
		                                    <?php
		                            }
		                            ?>
		                           	<br />
                                    <input type="reset" value="Limpar" name="B1" />
                                    <span style=" padding-left: 10px" />
                                    <input type="submit" value="Voltar" name="B2" onClick="this.form.action='index.php'"/>  
                                    <span style=" padding-left: 10px" />
                                    <input type="submit" name="cmdSalvar" value="Continuar Cadastro" />
                                </div>
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include('../template/rodapeAdmin.php'); ?>
    </body>
    <!-- scripts gerais -->
    <?php include('../template/js.php') ?>	
    <script type="text/javascript" src="../../_js/reserva.js"></script>
</html>
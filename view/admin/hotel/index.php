<?php
include('../template/iniciarDados.php');

if(empty($_SESSION['NOME'])){
	header('location:../');
}

$hotelVo = new HotelVo();
$hotelBpm = new HotelBpm();

$arrayHotelVo = $hotelBpm -> buscar('hotel');

//var_dump($arrayHotelVo);

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
					<?php 
					// colocar os campos de pesquisa 
					
					for ( $i = 0; $i < count($arrayHotelVo); $i++ ) { ?>
						<a href='cadastrarHotel.php?hotel=<?php echo $arrayHotelVo[$i]->getHotelId();?>'> 
					<?php
						echo $arrayHotelVo[$i]->getHotelId();
						echo ' - ';
						echo $arrayHotelVo[$i]->getHotelNome();
						?>
						</a>
						<a href="javascript:;" onclick="alert('excluir');">Excluir</a>
						<br />
					<?php
						// colocar aqui um botao para excluir e outro para alterar
					}
					
					?>


					<br />
                    <a href="cadastrarHotel.php">Novo</a> <br />
                    




                </div>
            </div>
        </div>

<?php include('../template/rodapeAdmin.php'); ?>
    </body>
    <!-- scripts gerais -->
        <?php include('../template/js.php') ?>
</html>
</html>
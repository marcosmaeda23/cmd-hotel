<?php

// Configuração básica WebSite
$nome_site = "CMD";
$nome_site_Title = "CMD - Hoteis & Resorts";
$cor_principal = "bgAzulClaro";
$cor_secundaria = "bgAzul";


require_once '../../../dao/Banco.php';
require_once '../../../dao/Entidade.php';
require_once '../../../dao/UsuarioDao.php';
require_once '../../../dao/TelefoneDao.php';
require_once '../../../dao/CepXedicaoDao.php';
require_once '../../../dao/CepCadastroDao.php';

require_once '../../../bpm/BpmGenerico.php';
require_once '../../../bpm/UsuarioBpm.php';
require_once '../../../bpm/CepBpm.php';
require_once '../../../bpm/TelefoneBpm.php';

require_once '../../../vo/UsuarioVo.php';
require_once '../../../vo/CepXedicaoVo.php';
require_once '../../../vo/CepCadastroVo.php';
require_once '../../../vo/TelefoneVo.php';

require_once '../../../biblioteca/funcoes.php';





?>
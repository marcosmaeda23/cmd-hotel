<?php

// Configuração básica WebSite
$nome_site = "CMD";
$nome_site_Title = "CMD - Hoteis & Resorts";
$cor_principal = "bgAzulClaro";
$cor_secundaria = "bgAzul";

// seta variaveis necessarias
$ERRO = false;
$sucesso = false;
$erro_nome = '';
$verificarUnicos = true;

// sem "http://" nem "https://" nem "www"
define('URL_SISTEMA_ONLINE', 'admhotel.com.br');
//define('URL_SISTEMA_LOCAL', 'localhost/projetos/cmd-hotel/view/'	);
define('URL_SISTEMA_LOCAL', 'localhost:8888/projetos/');
define('URL_SISTEMA_LOCAL', '127.0.0.1:8888/projetos/');


// =============================================================================================
// DEFINE SE O SERVIDOR ONLINE OU OFFLINE: =====================================================
// =============================================================================================	
$_pos_barra = strpos(URL_SISTEMA_LOCAL, '/');
define('URL_DO_DIRETORIO_DO_SITE_NO_SERVIDOR_LOCAL', substr(URL_SISTEMA_LOCAL, $_pos_barra));
$_pos_barra = strpos(URL_SISTEMA_ONLINE, '/');
define('URL_DO_DIRETORIO_DO_SITE_NO_SERVIDOR_ONLINE', substr(URL_SISTEMA_ONLINE, $_pos_barra));
if (strpos($_SERVER['HTTP_HOST'], 'www.') === 0) {
    $http_host_sem_www = substr($_SERVER['HTTP_HOST'], 4);
} else {
    $http_host_sem_www = $_SERVER['HTTP_HOST'];
}

if (strpos(URL_SISTEMA_ONLINE, $http_host_sem_www) === 0) {

    // SERVIDOR ONLINE: ===============================================================
    if (strpos($_SERVER['HTTP_HOST'], 'www.') !== 0) {
        // EST� SEM www; ENT�O REDIRECIONA:
        $url = str_replace('http://', 'http://www.', $_SERVER['SCRIPT_URI']);
        header('Location: ' . $url);
        exit();
    } else {
        define('SERVIDOR_ONLINE', true);
    }
} else if (strpos(URL_SISTEMA_LOCAL, $http_host_sem_www) === 0) {

    // SERVIDOR LOCAL: ================================================================
    define('SERVIDOR_ONLINE', false);
} else {

    // NENHUM DELES: ==================================================================
    die('ERRO: acesso ao sistema atrav�s de endere�o desconhecido.');
}
// =============================================================================================
// DEFINIR RAIZ_SITE E URL_ATUAL: ==============================================================
// =============================================================================================	
$url = $_SERVER['PHP_SELF'];
$url = str_replace(URL_DO_DIRETORIO_DO_SITE_NO_SERVIDOR_LOCAL, '', $url);
$url = str_replace(URL_DO_DIRETORIO_DO_SITE_NO_SERVIDOR_ONLINE, '', $url);

// TIRAR BARRA DO IN�CIO, SE TIVER:
$primeiro_char = substr($url, 0, 1);
if ($primeiro_char == '/') {
    $url = substr($url, 1);
}
define("URL_ATUAL", strtolower($url));

// CONTAR QTAS "/" TEM E MONTAR A URL RELATIVA:
$qtd_barras = substr_count($url, '/');
$_raiz_site = '';
for ($i = 1; $i < $qtd_barras; $i++) {
    $_raiz_site .= '../';
}
define("RAIZ_SITE", $_raiz_site);

session_start();
if ($_GET['acao'] == 'deslogar') {
    session_unset();
    session_destroy();
    header('location:../../');
}

// inclui os arquivos que serao necessarios na pagina pela array $necessario
require_once (RAIZ_SITE . 'dao/Banco.php');
require_once (RAIZ_SITE . 'dao/Entidade.php');
require_once (RAIZ_SITE . 'bpm/BpmGenerico.php');

for ($i = 0; $i < count($necessario); $i++) {
    // inclui o vo
    require_once (RAIZ_SITE . 'vo/' . ucfirst($necessario[$i]) . 'Vo.php');
    // inclui o bpm
    require_once (RAIZ_SITE . 'bpm/' . ucfirst($necessario[$i]) . 'Bpm.php');
    // inclui o dao
    require_once (RAIZ_SITE . 'dao/' . ucfirst($necessario[$i]) . 'Dao.php');
}

if (in_array('hotel', $necessario) || in_array('usuario', $necessario)) {
    // inclui o vo
    require_once (RAIZ_SITE . 'vo/CepXedicaoVo.php');
    require_once (RAIZ_SITE . 'vo/CepCadastroVo.php');
    require_once (RAIZ_SITE . 'vo/TelefoneVo.php');
    // inclui o bpm
    require_once (RAIZ_SITE . 'bpm/CepBpm.php');
    require_once (RAIZ_SITE . 'bpm/TelefoneBpm.php');
    // inclui o dao		
    require_once (RAIZ_SITE . 'dao/TelefoneDao.php');
    require_once (RAIZ_SITE . 'dao/CepXedicaoDao.php');
    require_once (RAIZ_SITE . 'dao/CepCadastroDao.php');
}

require_once (RAIZ_SITE . 'biblioteca/funcoes.php');
?>
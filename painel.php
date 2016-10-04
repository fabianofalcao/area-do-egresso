<?php
session_start();
require_once './_app/Config.inc.php';
require_once './sm.php';

$login = new Login(3);

$logoff = filter_input(INPUT_GET, 'acesso', FILTER_VALIDATE_BOOLEAN);


if (!$login->CheckLogin()) {
    unset($_SESSION['userlogin']);
    header("Location: index.php?acesso=restrito");
} else {
    $userLogin = $_SESSION['userlogin'];
}

if ($logoff) {
    unset($_SESSION['userlogin']);
    $red = $logoff = filter_input(INPUT_GET, 'redirecionar', FILTER_VALIDATE_BOOLEAN);
    if($red){
        header("Location: http://www.sje.ifmg.edu.br");
    }else{
        header("Location: index.php?acesso=logoff");
    }
}

$sm->assign("NomeLogado", $_SESSION['userlogin']['Nome']);
$sm->display('painel.tpl');




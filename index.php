<?php
session_start();

require_once './_app/Config.inc.php';
require_once './sm.php';

$Login = new Login(3);

// Se já estiver logado, e estou acessando a pagina mais uma vez
if($Login->CheckLogin()){
    header("Location: painel.php");
}
$dadosLogin = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dadosLogin['AdmLogin'])){
    $Login->ExeLogin($dadosLogin);

    if(!$Login->getResult()){
       $sm->assign("FafErro", FAFErro($Login->getError()[0], $Login->getError()[1]));
       $sm->assign("ValorUsuario", "value=\"{$dadosLogin['inputUsuario']}\" ");
    }else{
        header("Location: painel.php");
    }
}else{
    $sm->assign("FafErro",null);
    $sm->assign("ValorUsuario",null);
}

$get = filter_input(INPUT_GET, 'acesso', FILTER_DEFAULT);
if(!empty($get)){
    if($get == 'restrito'){
        $sm->assign("FafErro", FAFErro("<b>Oppsss:</b> Acesso negado. Favor efetue login!", FAF_WARNING));
    }else if($get == 'logoff'){
        $sm->assign("FafErro", FAFErro("<b>Sucesso ao deslogar:</b> Sua sessão foi finalizada. Volte sempre!", FAF_SUCCESS));
    }else if($get== 'senhaalterada'){
        $sm->assign("FafErro", FAFErro("<b>Sucesso ao alterar senha:</b> faça login com a nova senha!", FAF_SUCCESS));
    }else if($get=='linkenviado'){
        $sm->assign("FafErro", FAFErro("As informações para recuperação da senha foram enviadas para o e-mail informado!", FAF_SUCCESS));
    }
}
             

$sm->display('index.tpl');


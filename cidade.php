<?php
session_start();
require_once './_app/Config.inc.php';

require_once './sm.php';

// Restrições de página
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
    if ($red) {
        header("Location: http://www.sje.ifmg.edu.br");
    } else {
        header("Location: index.php?acesso=logoff");
    }
}

$sm->assign("ErrMsg", null);

$dataBusca = filter_input_array(INPUT_GET, FILTER_DEFAULT);

// ################# PAGINACAO #########################
$paginaAtual = filter_input(INPUT_GET, 'atual', FILTER_VALIDATE_INT);
$pager = new Pager("cidade.php?inputPesquisa={$dataBusca['inputPesquisa']}&atual=", 'Primeira', 'Última', 2);
$pager->ExePager($paginaAtual, 5);

//validar dados vindos do post e salvar
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
require_once './modelo/mdCidade.class.php';
$cidade = new mdCidade;
$estado = new Read;

$estado->ExeRead('tblEstados');

if($post):
    if($post['acao'] == 'alterar'):
        unset($post['acao']);
        $cidade->ExeUpdate($post['idCidade'], $post);
    elseif($post['acao'] == 'excluir'):
        unset($post['acao']);
        $cidade->ExeDelete($post['idCidade']);
    elseif($post['acao'] == 'inserir'):
        unset($post['acao']);
        $cidade->ExeCreate($post);
    endif;
    $sm->assign("ErrMsg", FAFErro($cidade->getError()[0], $cidade->getError()[1]));
endif;

//Listar com paginação os dados
if(empty($dataBusca['inputPesquisa'])):
    $cidade->ExeRead('%', $pager->getLimit(), $pager->getOffset());
else:
    $cidade->ExeRead($dataBusca['inputPesquisa'], $pager->getLimit(), $pager->getOffset());
endif;
$pager->ExePaginator("tblCidade", "WHERE Nome LIKE :id ORDER BY Nome", "id={$dataBusca['inputPesquisa']}%");


// Se tentar acessar uma pagina acima do npumero de paginas, reotrna para o ultimo
if (!$cidade->getResult()){
    $pager->ReturnPage();
}


$sm->assign("lista", $cidade->getResult());
$sm->assign("inputPesquisa", (!empty($dataBusca['inputPesquisa']) ? $dataBusca['inputPesquisa'] : null));
$sm->assign("paginacao", $pager->getPaginator());

$sm->assign("listaEstado", $estado->getResult());
$sm->assign("idEstado", $cidade->getResult()[0]['idEstado']);
$sm->assign("NomeEstado", $estado->getResult()[0]['Nome']);


$sm->assign("NomeLogado", $_SESSION['userlogin']['Nome']);
$sm->display('cidade.tpl');



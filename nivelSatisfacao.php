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
$pager = new Pager("nivelSatisfacao.php?inputPesquisa={$dataBusca['inputPesquisa']}&atual=", 'Primeira', 'Última', 2);
$pager->ExePager($paginaAtual, 2);

//validar dados vindos do post e salvar
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
require_once './modelo/mdNIvelSatisfacao.class.php';
$nivelSatisfacao = new mdNIvelSatisfacao;
if($post):
    if($post['acao'] == 'alterar'):
        unset($post['acao']);
        $nivelSatisfacao->ExeUpdate($post['idNivelSatisfacao'], $post);
    elseif($post['acao'] == 'excluir'):
        unset($post['acao']);
        $nivelSatisfacao->ExeDelete($post['idNivelSatisfacao'], $post);
    elseif($post['acao'] == 'inserir'):
        unset($post['acao']);
        $nivelSatisfacao->ExeCreate($post);
    endif;
    $sm->assign("ErrMsg", FAFErro($nivelSatisfacao->getError()[0], $nivelSatisfacao->getError()[1]));
endif;

if(empty($dataBusca['inputPesquisa'])):
    $nivelSatisfacao->ExeReadByDescricao('%', $pager->getLimit(), $pager->getOffset());
else:
    $nivelSatisfacao->ExeReadByDescricao($dataBusca['inputPesquisa'], $pager->getLimit(), $pager->getOffset());
endif;
$pager->ExePaginator("tblNivelSatisfacao", "WHERE Descricao LIKE :id ORDER BY Descricao DESC", "id={$dataBusca['inputPesquisa']}%");

if (!$nivelSatisfacao->getResult()){
    $pager->ReturnPage();
}

/*$read = new Read;
if (empty($dataBusca['inputPesquisa'])):
    $read->ExeRead("tblNivelSatisfacao", "ORDER BY Descricao LIMIT :limit OFFSET :offset", "limit={$pager->getLimit()}&offset={$pager->getOffset()}");
else:
    $read->ExeRead("tblNivelSatisfacao", "WHERE Descricao LIKE :desc ORDER BY Descricao LIMIT :limit OFFSET :offset", "desc={$dataBusca['inputPesquisa']}%&limit={$pager->getLimit()}&offset={$pager->getOffset()}");
endif;
$pager->ExePaginator("tblNivelSatisfacao", "WHERE Descricao LIKE :id ORDER BY Descricao DESC", "id={$dataBusca['inputPesquisa']}%");
*/



$sm->assign("lista", $nivelSatisfacao->getResult());
$sm->assign("inputPesquisa", (!empty($dataBusca['inputPesquisa']) ? $dataBusca['inputPesquisa'] : null));
$sm->assign("paginacao", $pager->getPaginator());

$sm->assign("NomeLogado", $_SESSION['userlogin']['Nome']);
$sm->display('nivelSatisfacao.tpl');

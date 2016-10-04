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
$pager = new Pager("modalidade.php?inputPesquisa={$dataBusca['inputPesquisa']}&atual=", 'Primeira', 'Última', 2);
$pager->ExePager($paginaAtual, 2);

//validar dados vindos do post e salvar
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
require_once './modelo/mdModalidade.class.php';
$modalidade = new mdModalidade;
if($post):
    if($post['acao'] == 'alterar'):
        unset($post['acao']);
        $modalidade->ExeUpdate($post['idModalidadeCurso'], $post);
    elseif($post['acao'] == 'excluir'):
        unset($post['acao']);
        $modalidade->ExeDelete($post['idModalidadeCurso'], $post);
    elseif($post['acao'] == 'inserir'):
        unset($post['acao']);
        $modalidade->ExeCreate($post);
    endif;
    $sm->assign("ErrMsg", FAFErro($modalidade->getError()[0], $modalidade->getError()[1]));
endif;

if(empty($dataBusca['inputPesquisa'])):
    $modalidade->ExeReadByDescricao('%', $pager->getLimit(), $pager->getOffset());
else:
    $modalidade->ExeReadByDescricao($dataBusca['inputPesquisa'], $pager->getLimit(), $pager->getOffset());
endif;
$pager->ExePaginator("tblModalidadeCurso", "WHERE Descricao LIKE :id ORDER BY Descricao DESC", "id={$dataBusca['inputPesquisa']}%");

if (!$modalidade->getResult()){
    $pager->ReturnPage();
}

$sm->assign("lista", $modalidade->getResult());
$sm->assign("inputPesquisa", (!empty($dataBusca['inputPesquisa']) ? $dataBusca['inputPesquisa'] : null));
$sm->assign("paginacao", $pager->getPaginator());

$sm->assign("NomeLogado", $_SESSION['userlogin']['Nome']);
$sm->display('modalidadeCurso.tpl');

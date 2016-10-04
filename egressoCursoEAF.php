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
$pager = new Pager("egressoCursoEAF.php?inputPesquisa={$dataBusca['inputPesquisa']}&atual=", 'Primeira', 'Última', 2);
$pager->ExePager($paginaAtual, 5);

//validar dados vindos do post e salvar
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
require_once './modelo/mdAlunoCurso.php';
$alunoCurso = new mdAlunoCurso();
$read = new Read;

$read->ExeRead("tblCurso");
$listaCurso = $read->getResult();

$read->ExeRead("tblAluno");
$listaAluno = $read->getResult();



if($post):
    if($post['acao'] == 'alterar'):
        unset($post['acao']);
        $alunoCurso->ExeUpdate($post['idAluno'],$post['idCurso'], $post);
    elseif($post['acao'] == 'excluir'):
        unset($post['acao']);
        $curso->ExeDelete($post['idAluno'], $post['idCurso']);
    elseif($post['acao'] == 'inserir'):
        unset($post['acao']);
        $curso->ExeCreate($post);
    endif;
    $sm->assign("inputPesquisa", (!$dataBusca['inputPesquisa'] ? '%' : $dataBusca['inputPesquisa']));
    $sm->assign("ErrMsg", FAFErro($alunoCurso->getError()[0], $alunoCurso->getError()[1]));
endif;

//Listar com paginação os dados
if(empty($dataBusca['inputPesquisa'])):
    $alunoCurso->ExeRead('%', $pager->getLimit(), $pager->getOffset());
else:
    $alunoCurso->ExeRead($dataBusca['inputPesquisa'], $pager->getLimit(), $pager->getOffset());
endif;
$pager->ExePaginator("tblAlunoCurso");


// Se tentar acessar uma pagina acima do npumero de paginas, reotrna para o ultimo
if (!$alunoCurso->getResult()){
    $pager->ReturnPage();
}

$listaAnos = array();
for($i=1952; $i<=date('Y'); $i++):
    array_push($listaAnos, $i);
endfor;
    



$sm->assign("lista", $alunoCurso->getResult());
$sm->assign("inputPesquisa", (!empty($dataBusca['inputPesquisa']) ? $dataBusca['inputPesquisa'] : null));
$sm->assign("paginacao", $pager->getPaginator());

$sm->assign("listaAnos", $listaAnos);
$sm->assign("listaCurso", $listaCurso);
$sm->assign("listaAluno", $listaAluno);
$sm->assign("idAluno", $alunoCurso->getResult()[0]['idAluno']);
$sm->assign("idCurso", $alunoCurso->getResult()[0]['idCurso']);



$sm->assign("NomeLogado", $_SESSION['userlogin']['Nome']);
$sm->display('egressoCursoEAF.tpl');



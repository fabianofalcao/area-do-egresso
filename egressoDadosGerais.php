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
$pager = new Pager("egressoDadosGerais.php?inputPesquisa={$dataBusca['inputPesquisa']}&atual=", 'Primeira', 'Última', 4);
$pager->ExePager($paginaAtual, 10);

//validar dados vindos do post e salvar
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
require_once './modelo/mdAluno.class.php';
$aluno = new mdAluno;
$estado = new Read;
$cidade = new Read;

$estado->ExeRead('tblEstados');
$cidade->ExeRead("tblCidade");

if($post):
    if($post['acao'] == 'alterar'):
        unset($post['acao']);
        $aluno->ExeUpdate($post['idAluno'], $post);
    elseif($post['acao'] == 'excluir'):
        unset($post['acao']);
        $aluno->ExeDelete($post['idAluno']);
    elseif($post['acao'] == 'inserir'):
        unset($post['acao']);
        $aluno->ExeCreate($post);
    endif;
    $sm->assign("ErrMsg", FAFErro($aluno->getError()[0], $aluno->getError()[1]));
endif;

//Listar com paginação os dados
if(empty($dataBusca['inputPesquisa'])):
    $aluno->ExeRead('%', $pager->getLimit(), $pager->getOffset());
else:
    $aluno->ExeRead($dataBusca['inputPesquisa'], $pager->getLimit(), $pager->getOffset());
endif;
$pager->ExePaginator("tblAluno", "WHERE Nome LIKE :id ORDER BY Nome", "id={$dataBusca['inputPesquisa']}%");


// Se tentar acessar uma pagina acima do npumero de paginas, reotrna para o ultimo
if (!$aluno->getResult()){
    $pager->ReturnPage();
}


$sm->assign("lista", $aluno->getResult());
$sm->assign("inputPesquisa", (!empty($dataBusca['inputPesquisa']) ? $dataBusca['inputPesquisa'] : null));
$sm->assign("paginacao", $pager->getPaginator());

$sm->assign("listaEstado", $estado->getResult());
$sm->assign("listaCidade", $cidade->getResult());
$sm->assign("idEstado", $aluno->getResult()[0]['idEstado']);
$sm->assign("idCidade", $aluno->getResult()[0]['idCidade']);
$sm->assign("NomeEstado", $estado->getResult()[0]['Nome']);


$sm->assign("NomeLogado", $_SESSION['userlogin']['Nome']);
$sm->display('egressoDadosGerais.tpl');



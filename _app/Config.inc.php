<?php
// CONFIGRAÇÕES DO BANCO ####################
define('HOST', 'localhost');
define('USER', 'sistemas');
define('PASS', 'Hoje1000%');
define('DBSA', 'Exalunos');

// DEFINE SERVIDOR DE E-MAIL ################
define('NOMEUSUARIO', 'Area do Egresso - Sistemas IFMG-SJE');
define('EMAILUSUARIO', 'sistemas.ifmgsje@gmail.com');
define('EMAILSENHA', 'ti991848');
define('EMAILPORT', '465');
define('EMAILHOST', 'smtp.gmail.com');

// DEFINE IDENTIDADE DO SITE ################
define('SITENAME', 'Cidade Online');
define('SITEDESC', 'Este site foi desenvolvido no curso de PHP Orientado a Objetos da UPINSIDE TREINAMENTOS. O mesmo utiliza a arquitetura semântica do HTML5 e foi criado com as últimas técnologias disponíveis!');

// DEFINE A BASE DO SITE ####################
define('HOME', 'http://dominiocompleto.com.br');
define('THEME', 'cidadeonline');

define('INCLUDE_PATH', HOME . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . THEME);
define('REQUIRE_PATH', 'themes' . DIRECTORY_SEPARATOR . THEME);

// AUTO LOAD DE CLASSES ####################
function MeuAutoload($Class) {

    $cDir = ['Conn', 'Helpers', 'Models'];
    $iDir = null;

    foreach ($cDir as $dirName):
        if (!$iDir && file_exists(__DIR__ . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php') && !is_dir(__DIR__ . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php')):
            include_once (__DIR__ . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php');
            $iDir = true;
        endif;
    endforeach;

    if (!$iDir):
        trigger_error("Não foi possível incluir {$Class}.class.php", E_USER_ERROR);
        die;
    endif;
}

/* ################## TRATAMENTO DE ERROS - BOOSTRAP #################### */
//CSS constantes :: Mensagens de erros
define('FAF_SUCCESS', 'alert-success');
define('FAF_INFO', 'alert-info');
define('FAF_WARNING', 'alert-warning');
define('FAF_DANGER', 'alert-danger');


//FAFErro :: Exibe mensagens lançadas :: Front
function FAFErro($ErrMsg, $ErrNo, $ErrDie = null) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? FAF_INFO : ($ErrNo == E_USER_WARNING ? FAF_WARNING : ($ErrNo == E_USER_ERROR ? FAF_DANGER : $ErrNo)));
    return "<div class=\"alert {$CssClass}\">{$ErrMsg}</div>";
    if($ErrDie){
        die;
    }
}

//PHPErro :: Exibe mensagens lançadas :: Front
function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? FAF_INFO : ($ErrNo == E_USER_WARNING ? FAF_WARNING : ($ErrNo == E_USER_ERROR ? FAF_DANGER : $ErrNo)));
    echo "<div style=\"margin: 10px;\" class=\"alert {$CssClass}\">";
    echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"fechar\">&times;</a>";
    echo "<strong>Erro na linha: {$ErrLine} ::</strong> {$ErrMsg} <br/>";
    echo "<small>{$ErrFile}</small>";
    echo "</div>";
    if($ErrNo == E_USER_ERROR){
        die;
    }
}
set_error_handler('PHPErro');



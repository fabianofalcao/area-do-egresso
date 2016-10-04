<?php
require_once '../_app/Config.inc.php';
require_once '../_app/Conn/Conn.class.php';
require_once '../_app/Conn/Create.class.php';

$getPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$setPost = array_map('strip_tags', $getPost);
$post = array_map('trim', $setPost);

if($post):
    $create = new Create;
    if($post['descricao']==''):
        echo FAFErro("<b>Erro ao cadastrar!</b> Para realizar o cadastro preencha a descrição!", FAF_DANGER);
    else:
        $create->ExeCreate("tblNivelSatisfacao", $post);
        if(!$create->getResult()):
            echo FAFErro("Impossível inserir", FAF_DANGER);
        endif;
    endif;
endif;





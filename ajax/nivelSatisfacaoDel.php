<?php
require_once '../_app/Config.inc.php';
require_once '../_app/Conn/Conn.class.php';
require_once '../_app/Conn/Create.class.php';

$getPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$setPost = array_map('strip_tags', $getPost);
$post = array_map('trim', $setPost);

if($post):
    $delete = new Delete;
    $delete->ExeDelete("tblNivelSatisfacao", "WHERE idNovelSatisfacao = id", "id={$post['idNivelSatisfacao']}");
endif;



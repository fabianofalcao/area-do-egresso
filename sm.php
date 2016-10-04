<?php
// sm :: declaração inicial da classe smarty
require_once './_app/Library/Smarty/libs/Smarty.class.php';
$sm = new Smarty;
$sm->template_dir = "./view/";
$sm->compile_dir = "./view/Library/Smarty/templates_c/";
$sm->config_dir = "./view/Library/Smarty/configs/";
$sm->cache_dir = "./view/Library/Smarty/cache/";
//ativando classe auto load
spl_autoload_register('MeuAutoload');


<?php
/* Smarty version 3.1.30, created on 2016-09-21 21:58:36
  from "/var/www/html/admin/view/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e32cbc11e181_89917597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e26b62699615eb2ca7ce7d21f6950ec825be5f61' => 
    array (
      0 => '/var/www/html/admin/view/index.tpl',
      1 => 1474450001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e32cbc11e181_89917597 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>

<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Página para realizar login na área do egrasso IFMG-SJE">
        <meta name="author" content="IFMG-SJE">
        <!-- Favicon and touch icons  -->
        <link rel="icon" href="view/icone/favicon.ico">
        <title>Área do Egresso - IFMG Campus São João Evangelesta</title>

        <!-- CSS -->
        <link rel="stylesheet" href="view/bootstrap-3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="view/css/style.css">
        <link rel="stylesheet" href="view/css/login.css ">
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
        <![endif]-->




    </head>

    <body>

        <div class="container">
            <div class="row">


                <form action="" method="post" class="form-signin">
                    <h2 class="form-signin-heading text-center">Área do egresso IFMG-SJE<br/>Painel Administrativo</h2>
                    <p>Digite seu nome de usuário e senha para acessar o sistema:</p>
                    <?php echo $_smarty_tpl->tpl_vars['FafErro']->value;?>

                    <label for="inputUsuario" class="sr-only">Usuário</label>
                    <input type="text" name="inputUsuario" id="inputUsuario" class="form-control input-sm" <?php echo $_smarty_tpl->tpl_vars['ValorUsuario']->value;?>
 placeholder="Digite seu usuário ou CPF" required autofocus>
                    <label for="inputSenha" class="sr-only">Senha</label>
                    <input type="password" name="inputSenha" id="inputSenha" class="form-control input-sm" placeholder="Digite sua senha" required>
                    <button class="btn btn-lg btn-success btn-block" type="submit" name="AdmLogin" value="Acessar">Acessar</button>
                </form>

            </div>

        </div> <!-- /container -->


        <!-- Javascript -->
        <?php echo '<script'; ?>
 src="view/js/jquery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="view/bootstrap-3.3.6/js/bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="view/js/scripts.js"><?php echo '</script'; ?>
>

        <!--[if lt IE 10]>
            <?php echo '<script'; ?>
 src="assets/js/placeholder.js"><?php echo '</script'; ?>
>
        <![endif]-->

    </body>

</html><?php }
}

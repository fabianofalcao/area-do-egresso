<?php
/* Smarty version 3.1.30, created on 2016-09-25 21:54:49
  from "/var/www/html/admin/view/begin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e871d9e26807_29253402',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d0fdc410e0cb192ae78a1d9cea64fb47fb7559b' => 
    array (
      0 => '/var/www/html/admin/view/begin.tpl',
      1 => 1474849362,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e871d9e26807_29253402 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Área para cadastros de cardápios - UAN</title>

        <meta name="description" content="Área do egresso - IFMG Câmpus São João Evangelista!">
        <meta name="author" content="IFMG Campus São João Evangelista">

        <link href="view/bootstrap-3.3.6/css/bootstrap-pingendo.css" rel="stylesheet">
        <link href="view/css/style.css" rel="stylesheet">
        <link href="view/css/jquery-ui.min.css" rel="stylesheet">
        
    </head>
    <body>
        <header style="background-color: #006600">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <a href="#"><img src="view/img/logo-ifmg-sje-H.jpg" class="img-responsive logoIfmg"></a>                      
                    </div>
                    <div class="col-md-7">
                        <h3 class="TituloSite">Área do egresso COAGRI/EAFSJE/IFMG-SJE</h3>
                    </div>
                    <div class="col-md-3">
                        <div id="navadmin">
                            <ul class="systema_nav radius">
                                <li class="username">Olá <?php echo $_smarty_tpl->tpl_vars['NomeLogado']->value;?>
</li>
                                <!-- <li class="text-center"><a class="icon profile radius" href="painel.php?acesso=users/profile">Perfíl</a></li>
                                <li><a class="icon users radius" href="painel.php?acesso=users/users">Usuários</a></li> -->
                                <li class="text-center"><a class="icon logout radius" href="painel.php?acesso=true">Sair</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-inverse navbar">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!--<a class="navbar-brand" href="index.php">Ex-AlunosAdm</a>-->
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <!-- <li><a href="index.php">Home</a></li> -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros básicos<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="nivelSatisfacao.php">Niveis de satisfação</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="curso.php">Cursos</a></li>
                                    <li><a href="modalidade.php">Modalidades de Cursos</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="cidade.php">Cidades</a></li>
                                    <!--
                                    <li><a href="ListaEvento.php">Eventos</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="ListaAluno.php">Egressos</a></li>
                                    -->
                                </ul>
                            </li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Egressos <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="egressoDadosGerais.php">Dados gerais</a></li>
                                    <li><a href="egressoCursoEAF.php">Cursos IFMG-SJE</a></li>
                                    <li><a href="egressoCursoExterno.php">Cursos pós IFMG-SJE</a></li>
                                    <li><a href="egressoDadosProfissionais.php">Informações profissionais</a></li>
                                    <li><a href="egressoDadosSatisfacao.php">Satisfação com IFMG-SJE</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gerenciar Inscrições em Eventos <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Confirmar pagamentos</a></li>
                                    <li><a href="#">Editar Inscrição</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relatórios <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Relação de Inscrições</a></li>
                                    <li><a href="#">Relatórios Geranciais</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrador <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Controle de usuários</a></li>
                                    <li><a href="#">Níveis de acesso</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sistema <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Alterar senha</a></li>
                                    <li><a href="#">Sobre o sistema</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Sair</a></li>
                                </ul>
                            </li>            

                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!-- final div container nav -->
            </nav> <!-- final do navbar -->
        </header>
<?php }
}

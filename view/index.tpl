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
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->




    </head>

    <body>

        <div class="container">
            <div class="row">


                <form action="" method="post" class="form-signin">
                    <h2 class="form-signin-heading text-center">Área do egresso IFMG-SJE<br/>Painel Administrativo</h2>
                    <p>Digite seu nome de usuário e senha para acessar o sistema:</p>
                    {$FafErro}
                    <label for="inputUsuario" class="sr-only">Usuário</label>
                    <input type="text" name="inputUsuario" id="inputUsuario" class="form-control input-sm" {$ValorUsuario} placeholder="Digite seu usuário ou CPF" required autofocus>
                    <label for="inputSenha" class="sr-only">Senha</label>
                    <input type="password" name="inputSenha" id="inputSenha" class="form-control input-sm" placeholder="Digite sua senha" required>
                    <button class="btn btn-lg btn-success btn-block" type="submit" name="AdmLogin" value="Acessar">Acessar</button>
                </form>

            </div>

        </div> <!-- /container -->


        <!-- Javascript -->
        <script src="view/js/jquery.js"></script>
        <script src="view/bootstrap-3.3.6/js/bootstrap.min.js"></script>
        <script src="view/js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
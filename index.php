<?php
  error_reporting(0);
  $erro=$_GET['erro'];
  if(isset($erro)){
    switch ($erro) {
      case 0:
        echo"<div style='width:99%;height:30px;background:#0099cc;border-radius:10px;border:1px solid blue;color:#fff;font-family:Arial;margin:5px 5px;padding-top:10px;'><center>Cadastro efetuado com sucesso!!!</center></div>";
        break;
      case 1:
        echo"<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> <b>Erro ao fazer o Login!! Senha inválida</b></div>";
      break;
      case 2:
        echo"<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> <b>Erro ao fazer o Login!! Usuário inválido</b></div>";
      break;
      case 3:
          echo"<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> <b>Erro!! Você deve estar logado para acessar o conteúdo.</b></div>";
      break;
      case 4:
          echo"<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> <b>Você foi desconectado!</b></div>";
      break;
      default:
        echo"<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> <b>Algo estranho aconteceu!</b></div>";
        break;
   }
 }
?>
<html>
<head>
	<title>Gestão de Clientes</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/login.css">

	<!-- Latest compiled and minified JavaScript -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background:#f3f5f6;">
	<div class="container">
      <p>
        <center><img src="img/fgv_azul.png" width="300" /></center>
      </p>
      <form class="form-signin" action="validaLog.php" method="post">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputEmail" class="sr-only">Usuário</label>
        <input name="usuario" type="email" id="inputEmail" class="form-control" placeholder="Usuário" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Lembrar-me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      </form>

    </div> <!-- /container -->

</body>
</html>
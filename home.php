<?php
session_cache_limiter(9999);
session_cache_expire(1);
session_start();  
$logEmail = $_SESSION["LOGIN_USUARIO"];
include "verifica.php";
include("online.php"); 
?> 
<html>
<head>
  <title>Gestão de Vendas</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/home.css">

  <!-- Tabela jquery -->

<script src="js/jquery.min.js"></script>

  <!-- Latest compiled and minified JavaScript -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
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
<nav class="navbar navbar-inverse navbar-fixed-top" style="background:#332f63;">
      <div class="container-fluid">
        <div class="navbar-header" >
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <img src="img/fgv_branca.png" width="120" />
        <a class="navbar-brand" style="float:right;" href="logoff.php">Sair</a>
        <span class="navbar-brand" style="float:right;">Sr. <?php echo $_SESSION["LOGIN_USUARIO"]; ?></span>
        <div id="navbar"  class="navbar-collapse collapse">
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
      <?php 
              $acessos = mysql_query("SELECT tipo,idusuarios FROM usuarios WHERE email = '$logEmail'")or die(mysql_error());
              $typeUser = mysql_fetch_assoc($acessos);
              $id=$typeUser[ 'idusuarios'];
              if($typeUser['tipo'] == 'ADM' ){
          ?>
        <div class="navbar-default sidebar " role="navigation">
          <ul class="nav nav-sidebar navbar-collapse">
            <li><a href="?go=cli">Pagina Inicial<span class="sr-only">(current)</span></a></li>
            <li><a href="?go=addCursos">Cursos</a></li>
            <!--<li><a href="?go=gestao">Gerenciar Clientes</a></li>-->
            <li><a href="?go=categorias">Categorias</a></li>
            <!--<li><a href="?go=search">Pesquisar Cliente</a></li>-->
            <li><a href="calendar.php">Agenda/Tarefas</a></li>
            <li><a href="?go=relatorios">Relatórios</a></li>
            <li><a href="?go=add">Usuários</a></li>
             </ul>
        </div>
            <?php 
            } else{ ?>
        <div class="navbar-default sidebar">
          <ul class="nav nav-sidebar navbar-collapse">
             <li><a href="?go=cli">Pagina Inicial<span class="sr-only">(current)</span></a></li>
            <!--<li><a href="?go=add">Adicionar Cliente</a></li>
            <li><a href="?go=gestao">Gerenciar Clientes</a></li>
            <li><a href="?go=add">Adicionar Funcionário</a></li>
            <li><a href="?go=gestao">Gerenciar Funcionário</a></li>
            <li><a href="?go=search">Pesquisar Cliente</a></li>-->
            <li><a href="calendar.php">Agenda/Tarefas</a></li>
            <!--<li><a href="?go=relatorios">Relatórios</a></li>-->
          </ul>
        </div>
            <?php 
            } 
            ?>
          
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php 
              if (isset($_GET['go'])) {
                    $arquivo = 'file/' . str_replace(array('.', ':', '/'), '', $_GET['go']) . '.php';
                    if (file_exists($arquivo))
                        include $arquivo;
                    else {
                        echo "<h1>Pagina não encontrada.</h1>";
                    }
                } else {
                    include 'file/cli.php';
                }
            
                
            ?>
          
        </div><!-- content -->
      </div>
    </div>
    <script src="js/holder.js"></script>
</body>
</html>
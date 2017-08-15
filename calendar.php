<?php
require_once('bdd.php');
require_once("file/conexao.php");
session_cache_limiter();
session_cache_expire(1);
session_start();  
include "verifica.php";
$login = $_SESSION["LOGIN_USUARIO"];
$res = mysql_query("select idusuarios,color_user from usuarios WHERE email = '$login'")or die(mysql_error());
$dado = mysql_fetch_assoc($res);
$idUsr = $dado['idusuarios'];
$color = $dado['color_user'];
$sql = "SELECT *FROM events JOIN usuarios WHERE usuarios_idusuarios = idusuarios ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();
foreach($events as $event): 
$id = $event['usuarios_idusuarios'];
endforeach;
?>
<?php

?> 
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de gestão vendas</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/bootstrap.css" rel="stylesheet">
	<link href='css/fullcalendar.min.css' rel='stylesheet' />
	<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
  	<link rel="stylesheet" href="css/home.css">
	<!-- FullCalendar -->
	
	 
	
	
	
	 <script src="js/jquery.js"></script>

	 <script src="js/bootstrap.min.js"></script>
	 
	
	<script src='js/moment.js'></script>
<script src='js/fullcalendar-3.4.0.min.js'></script>
	 <script src='locale/pt-br.js'></script>
	
	
	<script type="text/javascript">
	 $(document).ready(function(){
	 	// $('input[id=materiais]').attr('checked', 'checked');
	 	// $('input[id=negociacao]').attr('checked', 'checked');
	 	// $('input[id=eventos]').attr('checked', 'checked');
	 	 $("#sgeForm").hide(100);
	 	 $("#contatoclienteForm").hide(100);
	 	 $("#organizarForm").hide(100);
	 	 $("#posvendaForm").hide(100);
	 	 $("#formVisitas").hide(100);
	 	 $("#formViagens").hide(100);
	 	 $("#formCampanhas").hide(100);
	 	 $("#formSazonais").hide(100);
		 $("#negociacao").click(function(){//clicando em pessoa fisica
			 $("#negociacaoForm").show(100);
			 $("#contatoclienteForm").hide(100);
			 $("#organizarForm").hide(100);
	 	 	 $("#posvendaForm").hide(100);
	 	 	 $("#sgeForm").hide(100);
		 });
		 $("#contatocliente").click(function(){//clicando em pessoa fisica
			 $("#contatoclienteForm").show(100);
			 $("#negociacaoForm").hide(100);
			 $("#organizarForm").hide(100);
	 	 	 $("#posvendaForm").hide(100);
	 	 	 $("#sgeForm").hide(100);
		 });
		 $("#organizar").click(function(){//clicando em pessoa fisica
		 	 $("#sgeForm").hide(100);
		 	 $("#contatoclienteForm").hide(100);
		 	 $("#organizarForm").show(100);
		 	 $("#posvendaForm").hide(100);
		 	 $("#negociacaoForm").hide(100);
		 });
		 $("#sge").click(function(){//clicando em pessoa fisica
		 	 $("#sgeForm").show(100);
		 	 $("#contatoclienteForm").hide(100);
		 	 $("#organizarForm").hide(100);
		 	 $("#posvendaForm").hide(100);
		 	 $("#negociacaoForm").hide(100);
		 	 
		 });
		 $("#posvenda").click(function(){//clicando em pessoa fisica
		 	 $("#posvendaForm").show(100);
		 	 $("#sgeForm").hide(100);
		 	 $("#contatoclienteForm").hide(100);
		 	 $("#organizarForm").hide(100);
		 	 $("#negociacaoForm").hide(100);
		 });
		 $("#materiais").click(function(){//clicando em pessoa fisica
		 	 $("#formMateriais").show(100);
		 	 $("#formVisitas").hide(100);
		 	 $("#formViagens").hide(100);
		 });
		  $("#visitas").click(function(){//clicando em pessoa fisica
		 	 $("#formMateriais").hide(100);
		 	 $("#formVisitas").show(100);
		 	 $("#formViagens").hide(100);
		 });
		  $("#viagens").click(function(){//clicando em pessoa fisica
		 	 $("#formMateriais").hide(100);
		 	 $("#formVisitas").hide(100);
		 	 $("#formViagens").show(100);
		 });
		  $("#eventos").click(function(){//clicando em pessoa fisica
		 	 $("#formCampanhas").hide(100);
		 	 $("#formSazonais").hide(100);
		 	 $("#formEventos").show(100);
		 });
		 $("#campanha").click(function(){//clicando em pessoa fisica
		 	 $("#formCampanhas").show(100);
		 	 $("#formSazonais").hide(100);
		 	 $("#formEventos").hide(100);
		 });
		  $("#sazonais").click(function(){//clicando em pessoa fisica
		 	 $("#formCampanhas").hide(100);
		 	 $("#formSazonais").show(100);
		 	 $("#formEventos").hide(100);
		 });

 });
	 
	</script>
	

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	#calendar {
		max-width: 900px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background:#f3f5f6;">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#332f63;">
        <div class="container-fluid">
        <div class="navbar-header" >
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
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
        <!-- /.container -->
    </nav>
    <?php 
              $acessos = mysql_query("SELECT tipo FROM usuarios WHERE email = '$login'")or die(mysql_error());
              $typeUser = mysql_fetch_assoc($acessos);
              

              if($typeUser['tipo'] == 'ADM' ){
    ?>
     <div class="navbar-default sidebar " role="navigation">
          <ul class="nav nav-sidebar navbar-collapse">
            <li><a href="home.php?go=cli">Pagina Inicial<span class="sr-only">(current)</span></a></li>
            <!--<li><a href="?go=add">Adicionar Cliente</a></li>
            <li><a href="?go=gestao">Gerenciar Clientes</a></li>-->
            <li><a href="home.php?go=addCursos">Cursos</a></li>
            
            <li><a href="home.php?go=categorias">Categorias</a></li>
            <!--<li><a href="?go=search">Pesquisar Cliente</a></li>-->
            <li><a href="calendar.php">Agenda/Tarefas</a></li>
            <li><a href="home.php?go=relatorios">Relatórios</a></li>
            <li><a href="home.php?go=add">Usuários</a></li>
        </ul>
    </div>
            <?php 
            } else if($typeUser['tipo'] == 'usuario_comum' ){ ?>
     <div class="navbar-default sidebar " role="navigation">
          <ul class="nav nav-sidebar navbar-collapse">
             <li><a href="home.php?go=cli">Pagina Inicial<span class="sr-only">(current)</span></a></li>
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
         
    <!-- Page Content -->
    <div class="container" style="float:left;width:80%">

        <div class="row" style="margin-left:250px;">
            <div class="col-lg-12 text-center">
                <h1></h1>
                <p class="lead">
                	
                </p>
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		
		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<ul class="nav nav-tabs">
			<?php 
					$atv = mysql_query("SELECT categoria_id from categoria WHERE categoria_nome = 'Atividade interna' ") or die(mysql_error());
					$mostrar = mysql_fetch_assoc($atv);
					$idCat1 = $mostrar['categoria_id'];

					$atv2 = mysql_query("SELECT categoria_id from categoria WHERE categoria_nome = 'Atividade externa' ") or die(mysql_error());
					$mostrar2 = mysql_fetch_assoc($atv2);
					$idCat2 = $mostrar['categoria_id'];

					$atv3 = mysql_query("SELECT categoria_id from categoria WHERE categoria_nome = 'Atividade estrategia' ") or die(mysql_error());
					$mostrar3 = mysql_fetch_assoc($atv3);
					$idCat3 = $mostrar['categoria_id'];
					
			?>
			  <li class="active"><a data-toggle="tab" href="#interna" >Atividade Interna</a></li>
			  <li><a data-toggle="tab" href="#externa">Atividade Externa</a></li>
			  <li><a data-toggle="tab" href="#estrategia">Estrategia</a></li>
			</ul>

			<div class="tab-content">
			  <div id="interna" class="tab-pane fade in active">
			  <section style="padding:10px 10px;">
						<input type="radio" name="opc" id="negociacao" value="negociacao" checked="checked" /> Negociação
						<input type="radio" name="opc" id="sge" value="sge" /> Atualizar Cadastros SGE
						<input type="radio" name="opc" id="organizar" value="orgranizar" /> Organizar Documentos<br>
						<input type="radio" name="opc" id="posvenda" value="posvenda" /> Pós vendas
						<input type="radio" name="opc" id="contatocliente" value="contatocliente" /> Contato Cliente
					</section>
				<form class="form-horizontal" method="POST" action="addEvent.php?idCat=<?php echo $idCat1; ?>&id=<?php echo $idUsr;?>&menu=1" id="negociacaoForm">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Adicionar Atividade Negociação</h4>
				  </div>
			  	  <div class="modal-body">
					 <div class="form-group">
						<label for="title" class="col-sm-2 control-label">Título</label>
						<div class="col-sm-10">
							<input type="text" name="title" class="form-control" id="title" placeholder="Título" required>
						</div>
				  	</div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
				<select name="color" class="form-control" id="color" style="margin-bottom: 10px;" disabled>
				  <option value="">Escolha uma cor</option>
				  <option style="color:#4169E1;" value="#4169E1" <?php if($color=='#4169E1')echo 'selected' ?>>&#9724; Azul Escuro</option>
				  <option style="color:#00CED1;" value="#00CED1" <?php if($color=='#00CED1')echo 'selected' ?>>&#9724; Turquesa</option>
				  <option style="color:#3CB371;" value="#3CB371" <?php if($color=='#3CB371')echo 'selected' ?>>&#9724; Verde</option>
				  <option style="color:#FFD700;" value="#FFD700" <?php if($color=='#FFD700')echo 'selected' ?>>&#9724; Amarelo</option>
				  <option style="color:#D2691E;" value="#D2691E" <?php if($color=='#D2691E')echo 'selected' ?>>&#9724; Laranja</option>
				  <option style="color:#FF6347;" value="#FF6347" <?php if($color=='#FF6347')echo 'selected' ?>>&#9724; Vermelho</option>
				  <option style="color:#ccdde5;" value="#ccdde5" <?php if($color=='#ccdde5')echo 'selected' ?>>&#9724; Preto</option>			  
				</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Descrição</label>
					<div class="col-sm-10">
					 <textarea name="descricao" class="form-control"  placeholder="Descrição da Atividade"></textarea>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Início</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Término</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				  
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Salvar</button>
			  </div>
			</form><!--negociação-->


			<form class="form-horizontal" method="POST" action="addEvent.php?idCat=<?php echo $idCat1; ?>&id=<?php echo $idUsr;?>&menu=2" id="sgeForm">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Adicionar Atividade SGE</h4>
				  </div>
			  	  <div class="modal-body">
					 <div class="form-group">
						<label for="title" class="col-sm-2 control-label">Título</label>
						<div class="col-sm-10">
							<input type="text" name="title" class="form-control" id="title" placeholder="Título" required>
						</div>
				  	</div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
				<select name="color" class="form-control" id="color" style="margin-bottom: 10px;" disabled>
				  <option value="">Escolha uma cor</option>
				  <option style="color:#4169E1;" value="#4169E1" <?php if($color=='#4169E1')echo 'selected' ?>>&#9724; Azul Escuro</option>
				  <option style="color:#00CED1;" value="#00CED1" <?php if($color=='#00CED1')echo 'selected' ?>>&#9724; Turquesa</option>
				  <option style="color:#3CB371;" value="#3CB371" <?php if($color=='#3CB371')echo 'selected' ?>>&#9724; Verde</option>
				  <option style="color:#FFD700;" value="#FFD700" <?php if($color=='#FFD700')echo 'selected' ?>>&#9724; Amarelo</option>
				  <option style="color:#D2691E;" value="#D2691E" <?php if($color=='#D2691E')echo 'selected' ?>>&#9724; Laranja</option>
				  <option style="color:#FF6347;" value="#FF6347" <?php if($color=='#FF6347')echo 'selected' ?>>&#9724; Vermelho</option>
				  <option style="color:#ccdde5;" value="#ccdde5" <?php if($color=='#ccdde5')echo 'selected' ?>>&#9724; Preto</option>			  
				</select>
					</div>
				  </div>
				  <div class="form-group" id='negociacaoForm'>
					<label for="start" class="col-sm-2 control-label">Descrição</label>
					<div class="col-sm-10">
					 <textarea name="descricao" class="form-control"  placeholder="Descrição da Atividade"></textarea>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Início</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Término</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Salvar</button>
			  </div>
			</form><!--SGE-->


			<form class="form-horizontal" method="POST" action="addEvent.php?idCat=<?php echo $idCat1; ?>&id=<?php echo $idUsr; ?>&menu=3" id="organizarForm">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Adicionar Atividade Organizar Documentos</h4>
				  </div>
			  	  <div class="modal-body">
					 <div class="form-group">
						<label for="title" class="col-sm-2 control-label">Título</label>
						<div class="col-sm-10">
							<input type="text" name="title" class="form-control" id="title" placeholder="Título" required>
						</div>
				  	</div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
				<select name="color" class="form-control" id="color" style="margin-bottom: 10px;" disabled>
				  <option value="">Escolha uma cor</option>
				  <option style="color:#4169E1;" value="#4169E1" <?php if($color=='#4169E1')echo 'selected' ?>>&#9724; Azul Escuro</option>
				  <option style="color:#00CED1;" value="#00CED1" <?php if($color=='#00CED1')echo 'selected' ?>>&#9724; Turquesa</option>
				  <option style="color:#3CB371;" value="#3CB371" <?php if($color=='#3CB371')echo 'selected' ?>>&#9724; Verde</option>
				  <option style="color:#FFD700;" value="#FFD700" <?php if($color=='#FFD700')echo 'selected' ?>>&#9724; Amarelo</option>
				  <option style="color:#D2691E;" value="#D2691E" <?php if($color=='#D2691E')echo 'selected' ?>>&#9724; Laranja</option>
				  <option style="color:#FF6347;" value="#FF6347" <?php if($color=='#FF6347')echo 'selected' ?>>&#9724; Vermelho</option>
				  <option style="color:#ccdde5;" value="#ccdde5" <?php if($color=='#ccdde5')echo 'selected' ?>>&#9724; Preto</option>			  
				</select>
					</div>
				  </div>
				  <div class="form-group" id='negociacao'>
					<label for="start" class="col-sm-2 control-label">Descrição</label>
					<div class="col-sm-10">
					 <textarea name="descricao" class="form-control"  placeholder="Descrição da Atividade"></textarea>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Início</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Término</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				<div class="form-group" id="orgdoc">
					<label for="end" class="col-sm-2 control-label">Documento</label>
					<div class="col-sm-10">
						<select name="tipodoc" class="form-control">
							<option value="0">Escolha um Tipo</option>
							<option value="contrato">Contrato</option>
							<option value="negociacao">Negociação</option>
						</select>
					</div>
				  </div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Salvar</button>
			  </div>
			</form><!--organizar-->


			<form class="form-horizontal" method="POST" action="addEvent.php?idCat=<?php echo $idCat1; ?>&id=<?php echo $idUsr; ?>&menu=4" id="posvendaForm">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Adicionar Atividade Pós Venda</h4>
				  </div>
			  	  <div class="modal-body">
					 <div class="form-group">
						<label for="title" class="col-sm-2 control-label">Título</label>
						<div class="col-sm-10">
							<input type="text" name="title" class="form-control" id="title" placeholder="Título" required>
						</div>
				  	</div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
				<select name="color" class="form-control" id="color" style="margin-bottom: 10px;" disabled>
				  <option value="">Escolha uma cor</option>
				  <option style="color:#4169E1;" value="#4169E1" <?php if($color=='#4169E1')echo 'selected' ?>>&#9724; Azul Escuro</option>
				  <option style="color:#00CED1;" value="#00CED1" <?php if($color=='#00CED1')echo 'selected' ?>>&#9724; Turquesa</option>
				  <option style="color:#3CB371;" value="#3CB371" <?php if($color=='#3CB371')echo 'selected' ?>>&#9724; Verde</option>
				  <option style="color:#FFD700;" value="#FFD700" <?php if($color=='#FFD700')echo 'selected' ?>>&#9724; Amarelo</option>
				  <option style="color:#D2691E;" value="#D2691E" <?php if($color=='#D2691E')echo 'selected' ?>>&#9724; Laranja</option>
				  <option style="color:#FF6347;" value="#FF6347" <?php if($color=='#FF6347')echo 'selected' ?>>&#9724; Vermelho</option>
				  <option style="color:#ccdde5;" value="#ccdde5" <?php if($color=='#ccdde5')echo 'selected' ?>>&#9724; Preto</option>			  
				</select>
					</div>
				  </div>
				  <div class="form-group" id='negociacaoForm'>
					<label for="start" class="col-sm-2 control-label">Descrição</label>
					<div class="col-sm-10">
					 <textarea name="descricao" class="form-control"  placeholder="Descrição da Atividade"></textarea>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Início</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Término</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				 
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Salvar</button>
			  </div>
			</form><!--Pos venda-->


			<form class="form-horizontal" method="POST" action="addEvent.php?idCat=<?php echo $idCat1; ?>&id=<?php echo $idUsr; ?>&menu=5" id="contatoclienteForm">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Adicionar Atividade Contato com Cliente</h4>
				  </div>
			  	  <div class="modal-body">
					 <div class="form-group">
						<label for="title" class="col-sm-2 control-label">Título</label>
						<div class="col-sm-10">
							<input type="text" name="title" class="form-control" id="title" placeholder="Título" required>
						</div>
				  	</div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
				<select name="color" class="form-control" id="color" style="margin-bottom: 10px;" disabled>
				  <option value="">Escolha uma cor</option>
				  <option style="color:#4169E1;" value="#4169E1" <?php if($color=='#4169E1')echo 'selected' ?>>&#9724; Azul Escuro</option>
				  <option style="color:#00CED1;" value="#00CED1" <?php if($color=='#00CED1')echo 'selected' ?>>&#9724; Turquesa</option>
				  <option style="color:#3CB371;" value="#3CB371" <?php if($color=='#3CB371')echo 'selected' ?>>&#9724; Verde</option>
				  <option style="color:#FFD700;" value="#FFD700" <?php if($color=='#FFD700')echo 'selected' ?>>&#9724; Amarelo</option>
				  <option style="color:#D2691E;" value="#D2691E" <?php if($color=='#D2691E')echo 'selected' ?>>&#9724; Laranja</option>
				  <option style="color:#FF6347;" value="#FF6347" <?php if($color=='#FF6347')echo 'selected' ?>>&#9724; Vermelho</option>
				  <option style="color:#ccdde5;" value="#ccdde5" <?php if($color=='#ccdde5')echo 'selected' ?>>&#9724; Preto</option>			  
				</select>
					</div>
				  </div>
				  <div class="form-group" id='negociacaoForm'>
					<label for="start" class="col-sm-2 control-label">Descrição</label>
					<div class="col-sm-10">
					 <textarea name="descricao" class="form-control"  placeholder="Descrição da Atividade"></textarea>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Início</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Término</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				  <div class="form-group" id="tipocliente">
					<label for="end" class="col-sm-2 control-label">Contato</label>
					<div class="col-sm-10">
						<select name="tipo" class="form-control">
							<option value="0">Escolha um Tipo</option>
							<option value="telefone">Telefone</option>
							<option value="email">Email</option>
						</select>
					</div>
				  </div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Salvar</button>
			  </div>
			</form><!--contatocliente-->
			  </div>


			  <!-- [[[ Atividade Externa ]] -->

			  <div id="externa" class="tab-pane fade">
			  	<section style="padding:10px 10px;">
					<input type="radio" name="opc" id="materiais" value="materiais" /> Distribuição de materiais
					<input type="radio" name="opc" id="visitas" value="visitas" /> Visitas as empresas
					<input type="radio" name="opc" id="viagens" value="viagens" /> Viagens
				</section>
			    <form class="form-horizontal" method="POST" action="addEvent.php?idCat=<?php echo $idCat2; ?>&opc=1&id=<?php echo $idUsr; ?>&menu=6" id="formMateriais">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Distribuição de Materiais</h4>
					
				  </div>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Título</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Título" required>
					</div>
					
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
					   <select name="color" class="form-control" id="color" style="margin-bottom: 10px;" disabled>
						  <option value="">Escolha uma cor</option>
						  <option style="color:#4169E1;" value="#4169E1" <?php if($color=='#4169E1')echo 'selected' ?>>&#9724; Azul Escuro</option>
						  <option style="color:#00CED1;" value="#00CED1" <?php if($color=='#00CED1')echo 'selected' ?>>&#9724; Turquesa</option>
						  <option style="color:#3CB371;" value="#3CB371" <?php if($color=='#3CB371')echo 'selected' ?>>&#9724; Verde</option>
						  <option style="color:#FFD700;" value="#FFD700" <?php if($color=='#FFD700')echo 'selected' ?>>&#9724; Amarelo</option>
						  <option style="color:#D2691E;" value="#D2691E" <?php if($color=='#D2691E')echo 'selected' ?>>&#9724; Laranja</option>
						  <option style="color:#FF6347;" value="#FF6347" <?php if($color=='#FF6347')echo 'selected' ?>>&#9724; Vermelho</option>
						  <option style="color:#ccdde5;" value="#ccdde5" <?php if($color=='#ccdde5')echo 'selected' ?>>&#9724; Preto</option>			  
					</select>
					</div>
				  </div>
				  <div class="form-group" id='negociacaoForm'>
					<label for="start" class="col-sm-2 control-label">Descrição</label>
					<div class="col-sm-10">
					 <textarea name="descricao" class="form-control"  placeholder="Descrição da Atividade"></textarea>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Início</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Término</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>

				  <div class="form-group" id="tipocliente">
					<label for="end" class="col-sm-2 control-label">Tipo</label>
					<div class="col-sm-10">
						<select name="tipo" class="form-control">
							<option value="0">Escolha um Tipo</option>
							<option value="telefone">Banner</option>
							<option value="email">Flayer</option>
						</select>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Salvar</button>
			  </div>
			</form> <!-- materiais -->

			<form class="form-horizontal" method="POST" action="addEvent.php?idCat=<?php echo $idCat2; ?>&opc=1&id=<?php echo $idUsr; ?>&menu=6" id="formVisitas">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Adicionar Visitas a empresa</h4>
				
			  </div>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Título</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Título" required>
					</div>
					
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
					   <select name="color" class="form-control" id="color" style="margin-bottom: 10px;" disabled>
						  <option value="">Escolha uma cor</option>
						  <option style="color:#4169E1;" value="#4169E1" <?php if($color=='#4169E1')echo 'selected' ?>>&#9724; Azul Escuro</option>
						  <option style="color:#00CED1;" value="#00CED1" <?php if($color=='#00CED1')echo 'selected' ?>>&#9724; Turquesa</option>
						  <option style="color:#3CB371;" value="#3CB371" <?php if($color=='#3CB371')echo 'selected' ?>>&#9724; Verde</option>
						  <option style="color:#FFD700;" value="#FFD700" <?php if($color=='#FFD700')echo 'selected' ?>>&#9724; Amarelo</option>
						  <option style="color:#D2691E;" value="#D2691E" <?php if($color=='#D2691E')echo 'selected' ?>>&#9724; Laranja</option>
						  <option style="color:#FF6347;" value="#FF6347" <?php if($color=='#FF6347')echo 'selected' ?>>&#9724; Vermelho</option>
						  <option style="color:#ccdde5;" value="#ccdde5" <?php if($color=='#ccdde5')echo 'selected' ?>>&#9724; Preto</option>			  
					</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Início</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Término</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				  <div class="form-group" id="tipocliente">
					<label for="end" class="col-sm-2 control-label">Estado</label>
					<div class="col-sm-10">
						<select name="estado" class="form-control">
							<option value="0">Escolha um Estado</option>
							<option value="telefone">Santa Catarina</option>
							<option value="email">Rio Grande do Sul</option>
						</select>
					</div>
				  </div>
				  <div class="form-group" id="tipocliente">
					<label for="end" class="col-sm-2 control-label">Cidade</label>
					<div class="col-sm-10">
						<select name="cidade" class="form-control">
							<option value="0">Escolha uma Cidade</option>
							<option value="telefone">Chapecó</option>
							<option value="email">Pinhalzinho</option>
						</select>
					</div>
				  </div>
				  
				  <div class="form-group" id="tipocliente">
					<label for="end" class="col-sm-2 control-label">Agendamento</label>
					<div class="col-sm-10">
						<select name="objetivo" class="form-control">
							<option value="0">Agendado?</option>
							<option value="telefone">Sim</option>
							<option value="email">Não</option>
						</select>
					</div>
				  </div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Salvar</button>
			  </div>
			</form><!-- visitas -->

			<form class="form-horizontal" method="POST" action="addEvent.php?idCat=<?php echo $idCat2; ?>&opc=1&id=<?php echo $idUsr; ?>&menu=7" id="formViagens">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Adicionar Viagens</h4>
				
			  </div>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Título</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Título" required>
					</div>
					
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
					   <select name="color" class="form-control" id="color" style="margin-bottom: 10px;" disabled>
						  <option value="">Escolha uma cor</option>
						  <option style="color:#4169E1;" value="#4169E1" <?php if($color=='#4169E1')echo 'selected' ?>>&#9724; Azul Escuro</option>
						  <option style="color:#00CED1;" value="#00CED1" <?php if($color=='#00CED1')echo 'selected' ?>>&#9724; Turquesa</option>
						  <option style="color:#3CB371;" value="#3CB371" <?php if($color=='#3CB371')echo 'selected' ?>>&#9724; Verde</option>
						  <option style="color:#FFD700;" value="#FFD700" <?php if($color=='#FFD700')echo 'selected' ?>>&#9724; Amarelo</option>
						  <option style="color:#D2691E;" value="#D2691E" <?php if($color=='#D2691E')echo 'selected' ?>>&#9724; Laranja</option>
						  <option style="color:#FF6347;" value="#FF6347" <?php if($color=='#FF6347')echo 'selected' ?>>&#9724; Vermelho</option>
						  <option style="color:#ccdde5;" value="#ccdde5" <?php if($color=='#ccdde5')echo 'selected' ?>>&#9724; Preto</option>			  
					</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Início</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Término</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				  <div class="form-group" id="tipocliente">
					<label for="end" class="col-sm-2 control-label">Estado</label>
					<div class="col-sm-10">
						<select name="estado" class="form-control">
							<option value="0">Escolha um Estado</option>
							<option value="telefone">Santa Catarina</option>
							<option value="email">Rio Grande do Sul</option>
						</select>
					</div>
				  </div>
				  <div class="form-group" id="tipocliente">
					<label for="end" class="col-sm-2 control-label">Cidade</label>
					<div class="col-sm-10">
						<select name="cidade" class="form-control">
							<option value="0">Escolha uma Cidade</option>
							<option value="telefone">Chapecó</option>
							<option value="email">Pinhalzinho</option>
						</select>
					</div>
				  </div>
				  <div class="form-group" id="tipocliente">
					<label for="end" class="col-sm-2 control-label">Objetivo</label>
					<div class="col-sm-10">
						<select name="objetivo" class="form-control">
							<option value="0">Escolha o motivo</option>
							<option value="telefone">Treinamento</option>
							<option value="email">Confraternização</option>
						</select>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Salvar</button>
			  </div>
			</form><!-- Viagens -->
			  </div><!-- FIM EXTERNA -->
			  

			  <!-- [[ ESTRATÉGIA ]] -->


			  <div id="estrategia" class="tab-pane fade">
			    <section style="padding:10px 10px;">
					<input type="radio" name="opc" id="eventos" value="eventos" /> Participações Evento
					<input type="radio" name="opc" id="campanha" value="campanha" /> Campanha Publicitária
					<input type="radio" name="opc" id="sazonais" value="sazonais" /> Ações Sazonais<br>
				</section>
			    <form class="form-horizontal" method="POST" action="addEvent.php?idCat=<?php echo $idCat3; ?>&opc=2&id=<?php echo $idUsr; ?>" id="formEventos">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Adicionar Participação em Evento</h4>
				
			  </div>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Título</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Título" required>
					</div>
					
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color" style="margin-bottom: 10px;" disabled>
						  <option value="">Escolha uma cor</option>
						  <option style="color:#4169E1;" value="#4169E1" <?php if($color=='#4169E1')echo 'selected' ?>>&#9724; Azul Escuro</option>
						  <option style="color:#00CED1;" value="#00CED1" <?php if($color=='#00CED1')echo 'selected' ?>>&#9724; Turquesa</option>
						  <option style="color:#3CB371;" value="#3CB371" <?php if($color=='#3CB371')echo 'selected' ?>>&#9724; Verde</option>
						  <option style="color:#FFD700;" value="#FFD700" <?php if($color=='#FFD700')echo 'selected' ?>>&#9724; Amarelo</option>
						  <option style="color:#D2691E;" value="#D2691E" <?php if($color=='#D2691E')echo 'selected' ?>>&#9724; Laranja</option>
						  <option style="color:#FF6347;" value="#FF6347" <?php if($color=='#FF6347')echo 'selected' ?>>&#9724; Vermelho</option>
						  <option style="color:#ccdde5;" value="#ccdde5" <?php if($color=='#ccdde5')echo 'selected' ?>>&#9724; Preto</option>			  
					</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Início</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Término</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>

				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Salvar</button>
			  </div>
			</form><!-- eventos -->


			<form class="form-horizontal" method="POST" action="addEvent.php?idCat=<?php echo $idCat3; ?>&opc=2&id=<?php echo $idUsr; ?>" id="formCampanhas">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Adicionar campanha publicitária</h4>
				
			  </div>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Título</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Título" required>
					</div>
					
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color" style="margin-bottom: 10px;" disabled>
						  <option value="">Escolha uma cor</option>
						  <option style="color:#4169E1;" value="#4169E1" <?php if($color=='#4169E1')echo 'selected' ?>>&#9724; Azul Escuro</option>
						  <option style="color:#00CED1;" value="#00CED1" <?php if($color=='#00CED1')echo 'selected' ?>>&#9724; Turquesa</option>
						  <option style="color:#3CB371;" value="#3CB371" <?php if($color=='#3CB371')echo 'selected' ?>>&#9724; Verde</option>
						  <option style="color:#FFD700;" value="#FFD700" <?php if($color=='#FFD700')echo 'selected' ?>>&#9724; Amarelo</option>
						  <option style="color:#D2691E;" value="#D2691E" <?php if($color=='#D2691E')echo 'selected' ?>>&#9724; Laranja</option>
						  <option style="color:#FF6347;" value="#FF6347" <?php if($color=='#FF6347')echo 'selected' ?>>&#9724; Vermelho</option>
						  <option style="color:#ccdde5;" value="#ccdde5" <?php if($color=='#ccdde5')echo 'selected' ?>>&#9724; Preto</option>			  
					</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Início</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Término</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>

				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Salvar</button>
			  </div>
			</form><!-- campanha -->


			<form class="form-horizontal" method="POST" action="addEvent.php?idCat=<?php echo $idCat3; ?>&opc=2&id=<?php echo $idUsr; ?>" id="formSazonais">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Adicionar Ações Sazonais</h4>
				
			  </div>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Título</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Título" required>
					</div>
					
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color" style="margin-bottom: 10px;" disabled>
						  <option value="">Escolha uma cor</option>
						  <option style="color:#4169E1;" value="#4169E1" <?php if($color=='#4169E1')echo 'selected' ?>>&#9724; Azul Escuro</option>
						  <option style="color:#00CED1;" value="#00CED1" <?php if($color=='#00CED1')echo 'selected' ?>>&#9724; Turquesa</option>
						  <option style="color:#3CB371;" value="#3CB371" <?php if($color=='#3CB371')echo 'selected' ?>>&#9724; Verde</option>
						  <option style="color:#FFD700;" value="#FFD700" <?php if($color=='#FFD700')echo 'selected' ?>>&#9724; Amarelo</option>
						  <option style="color:#D2691E;" value="#D2691E" <?php if($color=='#D2691E')echo 'selected' ?>>&#9724; Laranja</option>
						  <option style="color:#FF6347;" value="#FF6347" <?php if($color=='#FF6347')echo 'selected' ?>>&#9724; Vermelho</option>
						  <option style="color:#ccdde5;" value="#ccdde5" <?php if($color=='#ccdde5')echo 'selected' ?>>&#9724; Preto</option>			  
					</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Início</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Término</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>

				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Salvar</button>
			  </div>
			</form><!-- sazonais -->
			 
		</div><!-- Fim ESTRATEGIA -->
		
		</div>
		</div>
		</div>
		</div>

		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventTitle.php?idUser=<?php echo $idUsr; ?>">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Editar Tarefa</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Título</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
					   <select name="color" class="form-control" id="color" style="margin-bottom: 10px;" disabled>
						  <option value="">Escolha uma cor</option>
						  <option style="color:#4169E1;" value="#4169E1" <?php if($color=='#4169E1')echo 'selected' ?>>&#9724; Azul Escuro</option>
						  <option style="color:#00CED1;" value="#00CED1" <?php if($color=='#00CED1')echo 'selected' ?>>&#9724; Turquesa</option>
						  <option style="color:#3CB371;" value="#3CB371" <?php if($color=='#3CB371')echo 'selected' ?>>&#9724; Verde</option>
						  <option style="color:#FFD700;" value="#FFD700" <?php if($color=='#FFD700')echo 'selected' ?>>&#9724; Amarelo</option>
						  <option style="color:#D2691E;" value="#D2691E" <?php if($color=='#D2691E')echo 'selected' ?>>&#9724; Laranja</option>
						  <option style="color:#FF6347;" value="#FF6347" <?php if($color=='#FF6347')echo 'selected' ?>>&#9724; Vermelho</option>
						  <option style="color:#ccdde5;" value="#ccdde5" <?php if($color=='#ccdde5')echo 'selected' ?>>&#9724; Preto</option>			  
					</select>
					</div>
				  </div>
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete">Excluir Tarefa</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
				
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Salvar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

    </div>
    <!-- /.container -->
<script>
	 //$ = jQuery.noConflict();
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listMonth'
			},
			defaultView: 'month',
			editable: true,
			navlinks: true,
			businessHours: false, //Descata dias uteis da semana
			lang: 'pt-br',
			locale: 'pt-br',
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			weekNumbersWithinDays: true,
			
			showNonCurrentDates: true,
			views: {
				listMonth: { buttonText: 'Compromissos' },
				listWeek: { buttonText: 'list week' }
			},

			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit #idUser').val(event.idUser);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
				$id = $event['usuarios_idusuarios'];
				$name = $event['nome'];
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title'] . " ( " . $name. " )" ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Alterações salvas!');
					}else{
						alert('Não foi possível salvar'); 
					}
				}
			});
		}
		
	});

</script>
</script>

</body>

</html>

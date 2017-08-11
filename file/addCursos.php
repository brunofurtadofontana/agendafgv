<?php 
	error_reporting(0);
	$status = $_GET['sts'];
	switch ($status) {
		case 1:
			echo "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok' aria-hidden='true'> </span><b> Cadastrado com sucesso!<b></div>";
			break;
		case 2:
			echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> <b>Erro ao cadastrar o cliente!</b></div>";
			break;
		default:
			
			break;
	}

	//SELECT nome,TIMEDIFF(a.end, a.start) diferenca
//FROM events as a JOIN usuarios as u WHERE a.usuarios_idusuarios = u.idusuarios

?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/add.css">
	
</head>
<body>
<h2>Cadastro de Cursos</h2>
<div class="container-fluid">
	<div class="col-md-10" >
	<form action="file/trata.php?id=<?php echo $id; ?>&status=7" method="post">
		<input type="text" class="form-control" name="nome" placeholder="Nome Curso" required="required"/>
		<input type="text" class="form-control" name="cargahoraria" placeholder="Carga Horária Ex: 420 Horas" required="required"/>
		<input type="text" class="form-control" name="valor" placeholder="Valor do Curso Ex: 15.000" required style="margin-bottom: 10px;"/> 
		<button type="submit" class="btn btn-primary" >Enviar</button>
	</form>

	<h2>Cursos Cadastrados</h2>
	<table class="table table-bordered" style="font-size:14px;margin-top:20px;">
				<tr>
					<th style="text-align:center;">Nome</th>
					<th style="text-align:center;">Carga Horária</th>
					<th style="text-align:center;" >Preço</th>
					<th style="text-align:center;">Ação</th>
				</tr>
				<?php 
				$res = mysql_query("SELECT *FROM cursos LIMIT 40")or die(mysql_error());
				$total = mysql_num_rows($res);
				while($resultado = mysql_fetch_assoc($res)){
					$id = $resultado['cursos_id'];
		 			$nome = $resultado['cursos_nome'];
			 		$email= $resultado['cursos_cargahoraria'];
			 		$setor = $resultado['cursos_valor'];
				?>
				<tr>
					
					<th > <?php echo $nome; ?> </th>
					<th > <?php echo $email; ?> </th> 
					<th > <?php echo $setor; ?> </th>
			 		<th style="text-align:center;">
			 			<a href="home.php?go=editCursos&id=<?php echo $id; ?>" data-toggle="modal" title="Editar">
						<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
						</a>
			        	<a href="home.php?go=delCursos&id=<?php echo $id; ?>" data-toggle="modal" title="Excluir">
			        	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			        	</a>
			        </th>
 				</tr>
 				<?php } ?>
 			</table>	
</div>

</div>
</body>
</html>
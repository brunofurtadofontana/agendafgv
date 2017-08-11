<?php require_once('file/conexao.php'); ?>
<?php 
	error_reporting(0);
	$status = $_GET['sts'];
	switch ($status) {
		case 1:
			echo "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok' aria-hidden='true'> </span><b> Deletado com sucesso!<b></div>";
			break;
		case 2:
			echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> <b>Erro!! Algo inesperado aconteceu.</b></div>";
			break;
		case 3:
			echo "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok' aria-hidden='true'> </span><b> Atualizado com sucesso!<b></div>";
			break;
		case 5:
		echo "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok' aria-hidden='true'> </span><b> Mensagem enviada com sucesso!<b></div>";
		break;
		default:
			
			break;
	}

?>
<html>
<head>
	<title>Gestão de Clientes</title>
</head>
<body>
	<div class="container-fluid">
		<div class="table-responsive">
			<h2>Funcionários cadastrados</h2>
			
			<table class="table table-bordered" style="font-size:14px;margin-top:20px;">
				<tr>
					<th style="text-align:center;">Nome</th>
					<th style="text-align:center;">Setor</th>
					<th style="text-align:center;" >Privilégios</th>
					<th style="text-align:center;">Ação</th>
				</tr>
				<?php 
				$res = mysql_query("SELECT *FROM usuarios LIMIT 40")or die(mysql_error());
				$total = mysql_num_rows($res);
				while($resultado = mysql_fetch_assoc($res)){
					$id = $resultado['idusuarios'];
		 			$nome = $resultado['nome'];
			 		$email= $resultado['email'];
			 		$setor = $resultado['setor'];
			 		$priv = $resultado['tipo']
				
				?>
				<tr>
					
					<th > <?php echo $nome; ?> </th>
					<th > <?php echo $setor; ?> </th> 
					<th > <?php echo $priv; ?> </th>
			 		<th style="text-align:center;">
			 			<a href="home.php?go=edit&id=<?php echo $id; ?>" data-toggle="modal" title="Editar">
						<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
						</a>
			        	<a href="home.php?go=del&id=<?php echo $id; ?>" data-toggle="modal" title="Excluir">
			        	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			        	</a>
			        	<a href="home.php?go=info&id=<?php echo $id; ?>" data-toggle="modal" title="Mais Informações">
						<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
						</a>
						<a href="home.php?go=email&id=<?php echo $id; ?>" data-toggle="modal" title="Enviar Email">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</a>
			        </th>
 				</tr>
 				<?php } ?>
 			</table>
		</div>
</body>
</html>
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
<h2>Cadastro de Funcionários</h2>
<div class="container-fluid">
	<div class="col-md-10" >
	<form action="file/trata.php?status=1" method="post">
		<input type="text" class="form-control" name="nome" placeholder="Nome" required="required"/>
		<input type="email" class="form-control" name="email" placeholder="Email" required="required"/>
		<input type="password" class="form-control" name="senha" placeholder="Senha" required style="margin-bottom: 10px;"/> 
		<select name="color" class="form-control" id="color" style="margin-bottom: 10px;">
						  <option value="">Escolha uma cor</option>
						  <option style="color:#4169E1;" value="#4169E1">&#9724; Azul Escuro</option>
						  <option style="color:#00CED1;" value="#00CED1">&#9724; Turquesa</option>
						  <option style="color:#3CB371;" value="#3CB371">&#9724; Verde</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Amarelo</option>
						  <option style="color:#D2691E;" value="#D2691E">&#9724; Laranja</option>
						  <option style="color:#FF6347;" value="#FF6347">&#9724; Vermelho</option>
						  <option style="color:#ccdde5;" value="#ccdde5">&#9724; Preto</option>
						  
						</select>
		<select name="setor" class="form-control" style="margin-bottom: 10px;">
			<option value="0">Escolha uma setor</option>
			<option value="Administrativo">Administrativo</option>
			<option value="Comercial">Comercial</option>
		</select>
		<select name="tipo"class="form-control">
			<option value="0">Privilégios de acesso ao sistema</option>
			<option value="ADM">Administrador</option>
			<option value="usuario_comum">Usuário Comum</option>
		</select>
		<button type="submit" class="btn btn-primary" >Enviar</button>

	</form>

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
</div>

</div>
</body>
</html>
<div class="col-md-11" style="border:1px solid #ccc;border-radius:5px;">
		<h2>Pesquisar Clientes</h2>
		<form action="" method="post">
			<input type="text" class="form-control" name="search" required="required" placeholder="Digite o CPF ou Email" >
			<button type="submit" class="btn btn-primary" name="pesq" value="ok">Pesquisar</button>

		</form>
</div>
<div class="table-responsive" style="float:left;width:94%;">
<?php
	error_reporting(0);
	require_once("file/conexao.php");
	if(isset($_POST['pesq'])){
	$busca = $_POST['search'];
	$res = mysql_query("select * from usuarios WHERE nome LIKE '%".$busca."%' OR email LIKE '%".$busca."%' ")or die(mysql_error());
	$total = mysql_num_rows($res);
	if($total!=0){
	while ($resultado = mysql_fetch_assoc($res)) {
 		 $id = $resultado['idusuarios'];
 		 $nome = $resultado['nome'];
 		 $email = $resultado['email'];
 		 $cpf= $resultado['cpf'];
 		 $cnpj = $resultado['cnpj'];
 		 $endereco = $resultado['endereco'];
 		 $fonecel = $resultado['fonecel'];
 	?>
 		<table class="table table-bordered">
	<h2>Clientes</h2>
	<tr>
		<th>Id</th>
		<th>Nome</th>
		<th>Email</th>
		<th>CPF/CNPJ</th>
		<th>Endereço</th>
		<th>Fone</th>
		<th>Ação</th>
	</tr>
	<tr>
		<th scope="row"> <?php echo $id; ?> </th>
		<th > <?php echo $nome; ?> </th>
		<th > <?php echo $email; ?> </th>
		<th > <?php echo $cpf."/".$cnpj; ?> </th>
 		<th > <?php echo $endereco; ?> </th> 
 		<th > <?php echo $fonecel; ?> </th> 
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
 		</th> 
 	</tr>	
 	<?php
 	}
	
	} else echo "<br><h1>Nenhum resultado encontrado</h1>"; 

}
?>

</table>
</div>
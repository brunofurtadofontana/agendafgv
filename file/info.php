
<h2>Infomações Cliente</h2>
<div class="table-responsive" style="">
<?php
	error_reporting(0);
	require_once("file/conexao.php");
	$id=$_GET['id'];
	$res = mysql_query("select * from usuarios WHERE idusuarios = $id")or die(mysql_error());
	$total = mysql_num_rows($res);
	if($total!=0){
	while ($resultado = mysql_fetch_assoc($res)) {
 		 $id = $resultado['idusuarios'];
 		 $nome = $resultado['nome'];
 		 $email = $resultado['email'];
 		 $setor = $resultado['setor'];
 		 $priv = $resultado['tipo'];
 	?>
 	<table class="table table-bordered" style="font-size:14px;">
	<tr>
		<th>Id</th>
		<th>Nome</th>
		<th>Email</th>
		<th>Setor</th>
		<th>Privilégios</th>
	</tr>
	<tr>
		<th scope="row"> <?php echo $id; ?> </th>
		<th > <?php echo $nome; ?> </th>
		<th > <a style="text-decoration:none;"href='mailto:<?php echo $email; ?>'><?php echo $email; ?></a></th>
		<th > <?php echo $setor; ?> </th> 
		<th > <?php echo $priv; ?> </th>
 	</tr>	

 	<?php
 	}
	
	} else echo "<br><h1>Nenhum resultado encontrado</h1>"; 


?>
</table>
 <a href="home.php?go=gestao" value="s" class="btn btn-info" role="button">Voltar</a>
</div>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container-fluid">
	<div class="table-responsive" style="float:left;width:94%;">

<?php
	error_reporting(0);
	require_once("file/conexao.php");
	$id=$_GET['id'];
	?>
	<h2></h2>
	<?php
	$res = mysql_query("select cursos_nome from cursos WHERE cursos_id = $id")or die(mysql_error());
	$total = mysql_num_rows($res);
	if($total!=0){
	while ($resultado = mysql_fetch_assoc($res)) {
 		 
 		 $nome = $resultado['cursos_nome'];
 		 /*$email = $resultado['email'];
 		 $cpf= $resultado['cpf'];
 		 $cnpj = $resultado['cnpj'];
 		 $endereco = $resultado['endereco'];
 		 $fonecel = $resultado['fonecel'];
 		 $foneres = $resultado['foneres'];
 		 $fonecom = $resultado['fonecom'];
 		 $obs = $resultado['obs'];
 		 */
 	?>
 	<h2>Deseja deletar o curso <b style="border:1px solid #0099cc;text-transform:uppercase;border-radius:5px;"><?php echo $nome; ?></b>?</h2>		
 	<br/>
 	<a href="file/trata.php?status=9&id=<?php echo $id; ?>" value="s" class="btn btn-primary" role="button">Sim</a>&nbsp;
 	<a href="home.php?go=addCursos" class="btn btn-danger" role="button">Cancelar</a>
 	<?php
 	}
	
	} else echo "<br><h1>Nenhum resultado encontrado</h1>"; 
	
?>
</div>
</body>
</html>
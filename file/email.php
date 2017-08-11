<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/add.css">
	<script type="text/javascript">
	 $(document).ready(function(){
		 $("#pessoafis").click(function(){//clicando em pessoa fisica
			 $("#cnpj").attr("disabled",true);//desabilita cnpj
			 $("#cpf").removeAttr("disabled");//habilita cpf
		 });
		 $("#pessoajur").click(function(){//clicando em pessoa juridica
			 $("#cnpj").removeAttr("disabled");//habilita cnpj
			 $("#cpf").attr("disabled",true);//desabilita cpf
	 });
 });
	</script>
</head>
<body>

<div class="container-fluid">
	
<?php
	error_reporting(0);
	require_once("file/conexao.php");
	?>
	<?php	
	$id=$_GET['id'];
	$res = mysql_query("select * from usuarios WHERE idusuarios = $id")or die(mysql_error());
	$total = mysql_num_rows($res);
	if($total!=0){
	while ($resultado = mysql_fetch_assoc($res)) {
 		 $id = $resultado['idusuarios'];
 		 $nome = $resultado['nome'];
 		 $email = $resultado['email'];
 	?>	
 	<h2>Enviar Email</h2>
      <div class="modal-body">
		<form action="file/trata.php?status=6&id=<?php echo $id; ?>" method="post">
			<input type="text" class="form-control" name="nome" placeholder="Seu Nome" required="required"/>
			<input type="email" class="form-control" name="email"  placeholder="Seu Email" required="required"/>
			<input type="text" class="form-control" name="assunto"  placeholder="Assunto" required="required"/>
			<textarea name="msg" placeholder="Mensagem" class="form-control"></textarea>
		
      </div>
      <div class="modal-footer">
        <a href="home.php?go=gestao" value="s" class="btn btn-info" role="button">Voltar</a>
        <input type="submit" class="btn btn-primary" style="margin-top:-2px;" value="Salvar" />
 		<!--<a href="" type="submit" class="btn btn-primary" role="button">Salvar alterações</a>-->
      </div>
      </form>
    </div>
  </div>
</div>
<?php
 	}
	
	} else echo "<br><h1>Nenhum resultado encontrado</h1>"; 


?>
</body>
</html>
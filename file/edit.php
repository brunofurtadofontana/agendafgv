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
 		 $senha= $resultado['senha'];
 		 $setor = $resultado['setor'];
 		 $tipo = $resultado['tipo'];
 		 $color = $resultado['color_user'];
 	?>	
 	<h2>Atualizar Cadastro</h2>
      <div class="modal-body">
		<form action="file/trata.php?status=2&id=<?php echo $id; ?>" method="post">
			<input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>"placeholder="Nome" required="required"/>
			<input type="email"class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Email"required="required"/>
			<input type="password" class="form-control" name="senha" value="<?php echo $senha; ?>"placeholder="Senha" required style="margin-bottom: 10px;"/> 
			<select name="color" class="form-control" id="color" style="margin-bottom: 10px;">
				  <option value="">Escolha uma cor</option>
				  <option style="color:#4169E1;" value="#4169E1" <?php if($color=='#4169E1')echo 'selected' ?>>&#9724; Azul Escuro</option>
				  <option style="color:#00CED1;" value="#00CED1" <?php if($color=='#00CED1')echo 'selected' ?>>&#9724; Turquesa</option>
				  <option style="color:#3CB371;" value="#3CB371" <?php if($color=='#3CB371')echo 'selected' ?>>&#9724; Verde</option>
				  <option style="color:#FFD700;" value="#FFD700" <?php if($color=='#FFD700')echo 'selected' ?>>&#9724; Amarelo</option>
				  <option style="color:#D2691E;" value="#D2691E" <?php if($color=='#D2691E')echo 'selected' ?>>&#9724; Laranja</option>
				  <option style="color:#FF6347;" value="#FF6347" <?php if($color=='#FF6347')echo 'selected' ?>>&#9724; Vermelho</option>
				  <option style="color:#ccdde5;" value="#ccdde5" <?php if($color=='#ccdde5')echo 'selected' ?>>&#9724; Preto</option>			  
			</select>
		<select name="setor" class="form-control" style="margin-bottom: 10px;">
			<option value="0" <?php if($setor==0)echo 'selected' ?>>Escolha um setor</option>
			<option value="Administrativo" <?php if($setor=='Administrativo')echo 'selected' ?>> Administrativo</option>
			<option value="Vendas" <?php if($setor=='Comercial')echo 'selected'; ?>>Comercial</option>
		</select>
		<select name="tipo" class="form-control">
			<option value="0" <?php if($tipo==0)echo 'selected' ?>>Privilégios de acesso ao sistema</option>
			<option value="ADM" <?php if($tipo=='ADM')echo 'selected' ?>>Administrador</option>
			<option value="usuario_comum" <?php if($tipo=='usuario_comum')echo 'selected' ?>>Usuário Comum</option>
		</select>
		
      </div>
      <div class="modal-footer">
        <a href="home.php?go=add" value="s" class="btn btn-info" role="button">Voltar</a>
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
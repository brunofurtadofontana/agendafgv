<?php 
require_once('file/conexao.php'); 

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
		default:
			
			break;
	}

?>

<html>
<head>
	<title>Gestão de Clientes</title>
	<style type="text/css">
		#COMBOCID option{
    		
		}
		label{
			margin-top:-8px;
		}
	</style>
	<script type="text/javascript">
	
	</script>
</head>
<body>
	<div class="container-fluid">
	<h2>Gerar Relatórios</h2>
	<form action="" method="POST">
	<fieldset>
	<legend></legend>
<table style="width:100%;text-align:Center;">
	<tr>
	<td><label for="">Funcionário</label></td>
	<td>
		<select name="funcionario" class="form-control" style="width:100%;height:35px;border-radius:5px;margin-bottom:20px;" required ="required">	
		<option value="0">Selecione um funcionário</option>
		<?php 
		$res = mysql_query("select nome from usuarios")or die(mysql_error());
		while($show = mysql_fetch_assoc($res)):
			$nome = $show['nome'];
		?>
		<option value="<?php echo $nome ?>"><?php echo $nome ?></option>
		<?php
		endwhile;
		?>
		
		</select>
	</td>

	<td><label>Tipo de Atividade</label></td>
	<td>
		<select name="Distrito" size="1" width="180" class="COMBODISTCSS form-control" id="COMBOFAB" tabindex="1">
		    <option value="Indiferente">Escolha uma Atividade</option>
		    <option value="interna">Atividade Interna</option>
		    <option value="externa">Atividade Externa</option>
		    <option value="estrategia">Estratégia</option>
		</select>
	</td>
	<td><label>Atividade</label></td>
		<td>
			<select name="Concelho" size="1" width="195" class="COMBOCONCCSS form-control" id="COMBOCID" tabindex="1">
		    <option data-distrito="interna" value="negociacao">Negociação</option>
		    <option data-distrito="interna" value="sge">Atualizar Cadastros SGE</option>
		    <option data-distrito="interna" value="organizar">Organizar Documentos</option>
		    <option data-distrito="interna" value="posvenda">Pós vendas</option>
		    <option data-distrito="interna" value="contatocliente">Contato Cliente</option>
		   
		    <option data-distrito="externa" value="distmateriais">Distribuições de Materiais</option>
		    <option data-distrito="externa" value="visitaempresa">Visitas Empresas</option>
		    <option data-distrito="externa" value="viagens">Viagens</option>
		    
		    <option data-distrito="estrategia" value="partevento">Participação em Evento</option>
		    <option data-distrito="estrategia" value="campanhapublicitaria">Campanha Publicitaria</option>
		    <option data-distrito="estrategia" value="sazonais">Ações Sazonais</option>
		    
</select>
		</td>

	</tr>
	<tr>
		<td><label>Data Início</label></td>
		<td><input type="date" name="start"  class="form-control"/></td>
		<td><label>Data Final</label></td>
		<td><input type="date" name="end"  class="form-control"/></td>
	</tr>
	<tr>
		<td><input type="submit" class="btn btn-primary" name="buscar" Value="Buscar"></td>
	</tr>
</table>
</fieldset>
</form>
<script type="text/javascript">
	var concelhos = $('select[name="Concelho"] option');
	$('select[name="Distrito"]').on('change', function () {
	    var Distrito = this.value;
	    var novoSelect = concelhos.filter(function () {
	        return $(this).data('distrito') == Distrito;
	    });
	 $('select[name="Concelho"]').html(novoSelect);
	});
</script>
<?php
	error_reporting(0);
	
	if( $_SERVER['REQUEST_METHOD']=='POST' ){
		$nome = $_POST['funcionario'];
		$atividade = $_POST['atividade'];
		$atividade = "Atividade " .$atividade;
		$subatividade = $_POST['subatividade'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$entre = " between ".$start." AND ". $end;
		if($atividade == "interna"){
			$result = mysql_query("select * from events join categoria where categoria_categoria_id = categoria_id AND categoria_nome = $atividade");
		}else if($atividade == "externa"){
			$result = mysql_query("select * from events join categoria where categoria_categoria_id = categoria_id AND categoria_nome = $atividade");
		}else if($atividade == "estrategia"){
			$result = mysql_query("select * from events join categoria where categoria_categoria_id = categoria_id AND categoria_nome = $atividade");
		}
		if( $nome ){ $where[] = " nome = '{$nome}'"; }
		//if( $atividade ){ $where[] = " title = '{$atividade}'"; }
		
		//if( $entre ){ $where[] = " e.start = '{$entre}'"; }
		//if( $entre ){ $where[] = " e.end = '{$entre}'"; }
		//if( $end ){ $where[] = " end = '{$end}'"; }
		$sql .= ' WHERE '.implode( ' AND ',$where);
		echo $sql;
		
			$result =" SELECT *FROM usuarios JOIN events  JOIN categoria ". $sql." AND idusuarios = usuarios_idusuarios AND categoria_id = categoria_categoria_id";
			$res = mysql_query($result);
			$query = utf8_encode($result);
			if(mysql_num_rows($res) == 0){
					echo "<h2>Refaça a pesquisa, Nenhuma informação foi encontrada!</h2>";
			}else{  ?>
			<h2>Resultado da pesquisa</h2>
			<table class="table table-bordered" style="font-size:14px;margin-top:20px;">
				<tr>
					<th style="text-align:center;">Nome</th>
					<th style="text-align:center;">Título Atividades</th>
					<th style="text-align:center;" >Tipo Atividades</th>
					<th style="text-align:center;">Ação</th>
				</tr>

			<?php
				while($mostrar = mysql_fetch_assoc($res)){
					$nome = $mostrar['nome'];
					$title = $mostrar['title'];
					$cat = $mostrar['categoria_nome'];
					if($cat == "Atividade interna"){
						$cate = $cat;
					}else if( $cat == "Atividade Externa"){
						$cate = $cat;
					}else if($cat == "Estrategia"){
						$cate = $cat;
					}				

				?>
				
					<tr>
					<th > <?php echo $nome; ?> </th>
					<th > <?php echo $title; ?> </th> 
					<th > <?php echo $cate; ?> </th>
			 		<th style="text-align:center;">
			 			<a href="home.php?go=editCursos&id=<?php echo $id; ?>" data-toggle="modal" title="Editar">
						<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
						</a>
			        	<a href="home.php?go=delCursos&id=<?php echo $id; ?>" data-toggle="modal" title="Excluir">
			        	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			        	</a>
			        </th>
 				</tr>
 				
 				
					
	<?php		}
			}
		}
			?>
	</table>

</body>
</html>
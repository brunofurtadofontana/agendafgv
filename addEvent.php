<?php
require_once('bdd.php');
$menu = $_GET['menu'];
switch ($menu) {
	case 1: //negociação
	if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end'])){
		$idUser = $_GET['id'];
		$idCat = $_GET['idCat'];
		$title = $_POST['title'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$desc = $_POST['descricao'];
		if($idUser == '1'){
			$color = '#4169E1';//azul escuro
		} 
		if($idUser == '23747'){
			$color = '#00CED1';//turquesa
		}
		if($idUser == '219803'){
			$color = '#3CB371';//verde
		}
		if($idUser == '220414'){
			$color = '#FFD700';//amarelo
		}
		if($idUser == '367463'){
			$color = '#D2691E';//laranja
		}
		if($idUser == '541244'){
			$color = '#FF6347';//vermelho
		}
		if($idUser == '689117'){
			$color = '#ccdde5';//Cinza
		}
		//$color = $_POST['color'];

		$sql = "INSERT INTO events(title,start,end,color,usuarios_idusuarios,categoria_categoria_id)values('$title','$start','$end','$color','$idUser','$idCat')";
		
		$query = $bdd->prepare( $sql );
		//$req = $bdd->prepare($sql);
		//$req->execute();
		if ($query == false) {
		 print_r($bdd->errorInfo());
		 die ('Erreur prepare');
		}
		$sth = $query->execute();
		if ($sth == false) {
		 print_r($query->errorInfo());
		 die ('Erreur execute');
		}


		//echo $sql;
		include('file/conexao.php');
		
		$res = mysql_query("select MAX(id) as id from events")or die(mysql_error());
		$show = mysql_fetch_assoc($res);
		$idEvent = $show['id'];

		$sql2 = mysql_query("INSERT INTO negociacao(negociacao_desc,
													events_id,
													categoria_id)
													VALUES(
													'$desc',
													'$idEvent',
													'$idCat')")or die(mysql_erro());
		

		
}
header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
	case 2: //sge
		if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end'])){
		$idUser = $_GET['id'];
		$idCat = $_GET['idCat'];
		$title = $_POST['title'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$desc = $_POST['descricao'];
		if($idUser == '1'){
			$color = '#4169E1';//azul escuro
		} 
		if($idUser == '23747'){
			$color = '#00CED1';//turquesa
		}
		if($idUser == '219803'){
			$color = '#3CB371';//verde
		}
		if($idUser == '220414'){
			$color = '#FFD700';//amarelo
		}
		if($idUser == '367463'){
			$color = '#D2691E';//laranja
		}
		if($idUser == '541244'){
			$color = '#FF6347';//vermelho
		}
		if($idUser == '689117'){
			$color = '#ccdde5';//Cinza
		}
		//$color = $_POST['color'];

		$sql = "INSERT INTO events(title,start,end,color,usuarios_idusuarios,categoria_categoria_id)values('$title','$start','$end','$color','$idUser','$idCat')";
		
		$query = $bdd->prepare( $sql );
		if ($query == false) {
		 print_r($bdd->errorInfo());
		 die ('Erreur prepare');
		}
		$sth = $query->execute();
		if ($sth == false) {
		 print_r($query->errorInfo());
		 die ('Erreur execute');
		}
		//$req = $bdd->prepare($sql);
		//$req->execute();
		
		//echo $sql;
		include('file/conexao.php');

		$res = mysql_query("select MAX(id) as id from events")or die(mysql_error());
		$show = mysql_fetch_assoc($res);
		$idEvent = $show['id'];

		

		$sql2 = mysql_query("INSERT INTO sge(sge_desc,events_id,categoria_id)VALUES('$desc','$idEvent','$idCat')");
		//$query3 = $bdd->prepare( $sql3 );

		

}
header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
	case 3://organizar
	if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end'])){
		$idUser = $_GET['id'];
		$idCat = $_GET['idCat'];
		$title = $_POST['title'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$desc = $_POST['descricao'];
		$tipo = $_POST['tipodoc'];
		if($idUser == '1'){
			$color = '#4169E1';//azul escuro
		} 
		if($idUser == '23747'){
			$color = '#00CED1';//turquesa
		}
		if($idUser == '219803'){
			$color = '#3CB371';//verde
		}
		if($idUser == '220414'){
			$color = '#FFD700';//amarelo
		}
		if($idUser == '367463'){
			$color = '#D2691E';//laranja
		}
		if($idUser == '541244'){
			$color = '#FF6347';//vermelho
		}
		if($idUser == '689117'){
			$color = '#ccdde5';//Cinza
		}
		//$color = $_POST['color'];

		$sql = "INSERT INTO events(title,start,end,color,usuarios_idusuarios,categoria_categoria_id)values('$title','$start','$end','$color','$idUser','$idCat')";
		
		$query = $bdd->prepare( $sql );
		if ($query == false) {
		 print_r($bdd->errorInfo());
		 die ('Erreur prepare');
		}
		$sth = $query->execute();
		if ($sth == false) {
		 print_r($query->errorInfo());
		 die ('Erreur execute');
		}
		//$req = $bdd->prepare($sql);
		//$req->execute();
		
		//echo $sql;
		include('file/conexao.php');

		$res = mysql_query("select MAX(id) as id from events")or die(mysql_error());
		$show = mysql_fetch_assoc($res);
		$idEvent = $show['id'];

		

		$sql2 = mysql_query("INSERT INTO organizar(organizar_desc,organizar_tipo,events_id,categoria_id)VALUES('$desc','$tipo','$idEvent','$idCat')");
		//$query3 = $bdd->prepare( $sql3 );

		

}
header('Location: '.$_SERVER['HTTP_REFERER']);
		break;

	case 4://pos venda
		if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end'])){
		$idUser = $_GET['id'];
		$idCat = $_GET['idCat'];
		$title = $_POST['title'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$desc = $_POST['descricao'];
		//$tipo = $_POST['tipodoc'];
		if($idUser == '1'){
			$color = '#4169E1';//azul escuro
		} 
		if($idUser == '23747'){
			$color = '#00CED1';//turquesa
		}
		if($idUser == '219803'){
			$color = '#3CB371';//verde
		}
		if($idUser == '220414'){
			$color = '#FFD700';//amarelo
		}
		if($idUser == '367463'){
			$color = '#D2691E';//laranja
		}
		if($idUser == '541244'){
			$color = '#FF6347';//vermelho
		}
		if($idUser == '689117'){
			$color = '#ccdde5';//Cinza
		}
		//$color = $_POST['color'];

		$sql = "INSERT INTO events(title,start,end,color,usuarios_idusuarios,categoria_categoria_id)values('$title','$start','$end','$color','$idUser','$idCat')";
		
		$query = $bdd->prepare( $sql );
		if ($query == false) {
		 print_r($bdd->errorInfo());
		 die ('Erreur prepare');
		}
		$sth = $query->execute();
		if ($sth == false) {
		 print_r($query->errorInfo());
		 die ('Erreur execute');
		}
		//$req = $bdd->prepare($sql);
		//$req->execute();
		
		//echo $sql;
		include('file/conexao.php');

		$res = mysql_query("select MAX(id) as id from events")or die(mysql_error());
		$show = mysql_fetch_assoc($res);
		$idEvent = $show['id'];

		$sql2 = mysql_query("INSERT INTO posvenda(posvenda_desc,events_id,categoria_id)VALUES('$desc','$idEvent','$idCat')");
		//$query3 = $bdd->prepare( $sql3 );
}
header('Location: '.$_SERVER['HTTP_REFERER']);

		break;
	case 5:
		if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end'])){
		$idUser = $_GET['id'];
		$idCat = $_GET['idCat'];
		$title = $_POST['title'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$desc = $_POST['descricao'];
		$tipo = $_POST['tipo'];
		if($idUser == '1'){
			$color = '#4169E1';//azul escuro
		} 
		if($idUser == '23747'){
			$color = '#00CED1';//turquesa
		}
		if($idUser == '219803'){
			$color = '#3CB371';//verde
		}
		if($idUser == '220414'){
			$color = '#FFD700';//amarelo
		}
		if($idUser == '367463'){
			$color = '#D2691E';//laranja
		}
		if($idUser == '541244'){
			$color = '#FF6347';//vermelho
		}
		if($idUser == '689117'){
			$color = '#ccdde5';//Cinza
		}
		//$color = $_POST['color'];

		$sql = "INSERT INTO events(title,start,end,color,usuarios_idusuarios,categoria_categoria_id)values('$title','$start','$end','$color','$idUser','$idCat')";
		
		$query = $bdd->prepare( $sql );
		if ($query == false) {
		 print_r($bdd->errorInfo());
		 die ('Erreur prepare');
		}
		$sth = $query->execute();
		if ($sth == false) {
		 print_r($query->errorInfo());
		 die ('Erreur execute');
		}
		//$req = $bdd->prepare($sql);
		//$req->execute();
		
		//echo $sql;
		include('file/conexao.php');

		$res = mysql_query("select MAX(id) as id from events")or die(mysql_error());
		$show = mysql_fetch_assoc($res);
		$idEvent = $show['id'];

		$sql2 = mysql_query("INSERT INTO contatocliente(contatocliente_desc,contatocliente_tipo,events_id,categoria_id)VALUES('$desc','$tipo','$idEvent','$idCat')");
		//$query3 = $bdd->prepare( $sql3 );
}
header('Location: '.$_SERVER['HTTP_REFERER']);
		
		break;
	
	default:
		# code...
		break;
}
//echo $_POST['title'];

?>

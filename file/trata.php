<?php
/*
"trata.php?status=1"
1-Adicionar
2-Editar
3-Remover
4-listar
*/	
require_once("conexao.php");
$status = $_GET['status'];

switch ($status) {
	case 1:
		add();
		break;
	case 2:
		edit();
		break;
	case 3:
		remove();
		break;
	case 4:
		listar();
		break;
	case 5:
		search();
		break;
	case 6:
		email();
	break;
	case 7:
		addCursos();
	break;	
	case 8:
		editCursos();
	break;
	case 9:
		deletCursos();
	break;
	case 10:
		addCat();
	break;
	case 11:
		deletCat();
	break;
	case 12:
		editCat();
	break;
	default:
		echo "index.php";
		break;
}

function add(){
	$id = rand(99,999999);
	$nome = htmlspecialchars(trim($_POST['nome']));
	$email = htmlspecialchars(trim($_POST['email']));
	$senha = htmlspecialchars(trim($_POST['senha']));
	$tipo = htmlspecialchars(trim($_POST['tipo']));
	$setor = htmlspecialchars(trim($_POST['setor']));
	$color = htmlspecialchars(trim($_POST['color']));
	$data = date("Y-m-d");
	$cliestatus = "s";
		$res = mysql_query("INSERT INTO usuarios(idusuarios,
												nome,
												email,
												senha,
												setor,
												tipo,
												datacadas,
												color_user)
										VALUES( $id,
												'$nome',
												'$email',
												'$senha',
												'$setor',
												'$tipo',
												'$data',
												'$color')")or die(mysql_error());
	if($res){
		echo header("location:../home.php?go=add&sts=1");
	}
	else echo header("location:../home.php?go=add&sts=2");
}
function edit(){
	
	$id=$_GET['id'];
	$nome = htmlspecialchars(trim($_POST['nome']));
	$email = htmlspecialchars(trim($_POST['email']));
	$senha = htmlspecialchars(trim($_POST['senha']));
	$tipo = htmlspecialchars(trim($_POST['tipo']));
	$setor = htmlspecialchars(trim($_POST['setor']));
	$color = htmlspecialchars(trim($_POST['color']));
	$data = date("Y-m-d");
	$res = mysql_query("UPDATE usuarios SET	nome='$nome',
											email='$email',
											senha='$senha',
											setor = '$setor',
											tipo ='$tipo',
											datacadas = '$data',
											color_user = '$color'
											WHERE idusuarios = '$id'")or die(mysql_error());
	if($res){
		echo header("location:../home.php?go=add&sts=3");
	}
	else echo header("location:../home.php?go=add&sts=2");
}
function remove(){
	$id=$_GET['id'];
	$res = mysql_query("Delete from usuarios WHERE idusuarios = '$id' ")or die(mysql_error());
	if($res){
		echo header("location:../home.php?go=add&sts=1");
	}
	else echo header("location:../home.php?go=add&sts=2");
}
function listar(){
	

}
function search(){
	$nome = $_POST['nome'];
	
}
function email(){
	
 error_reporting(0);
//Pega os dados postados pelo formulário HTML e os coloca em variaveis
if (eregi('tempsite.ws$|brunodeveloper.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
//substitua na linha acima a aprte locaweb.com.br por seu domínio.
$email_from='contato@brunodeveloper.com.br';	// Substitua essa linha pelo seu e-mail@seudominio
}else {
$email_from = "email@" . $_SERVER[HTTP_HOST];         
//    Na linha acima estamos forçando que o remetente seja 'webmaster@',
// você pode alterar para que o remetente seja, por exemplo, 'contato@'.
}
 
 
if( PATH_SEPARATOR ==';'){ $quebra_linha="\r\n";
 
} elseif (PATH_SEPARATOR==':'){ $quebra_linha="\n";
 
} elseif ( PATH_SEPARATOR!=';' and PATH_SEPARATOR!=':' )  {echo ('Esse script não funcionará corretamente neste servidor, a função PATH_SEPARATOR não retornou o parâmetro esperado.');
 
}
 
//pego os dados enviados pelo formulário 
$nome_para = $_POST["nome"]; 
$email = 'brunofurtadoxd@gmail.com';
$assunto = $_POST['assunto'] ;
$mensagem = $_POST["msg"]; 
$assunto = $_POST["assunto"]; 
//formato o campo da mensagem 
$mensagem = wordwrap( $mensagem, 50, "<br>", 1); 
 
//valido os emails 
if (!ereg("^([0-9,a-z,A-Z]+)([.,_]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$", $email)){ 
 
echo"<center>Digite um email valido</center>"; 
echo "<center><a href=\"javascript:history.go(-1)\">Voltar</center></a>"; 
exit; 
 
} 
 
if(file_exists($arquivo["tmp_name"]) and !empty($arquivo)){ 
 
$fp = fopen($_FILES["arquivo"]["tmp_name"],"rb"); 
$anexo = fread($fp,filesize($_FILES["arquivo"]["tmp_name"])); 
$anexo = base64_encode($anexo); 
 
fclose($fp); 
 
$anexo = chunk_split($anexo); 
 
$boundary = "XYZ-" . date("dmYis") . "-ZYX"; 
 
$mens = "--$boundary" . $quebra_linha . ""; 
$mens .= "Content-Transfer-Encoding: 8bits" . $quebra_linha . ""; 
$mens .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $quebra_linha . "" . $quebra_linha . ""; //plain 
$mens .= "Aluno: $nome_para" . $quebra_linha . "<br>";
$mens .= "Mensagem: $mensagem" . $quebra_linha . ""; 
$mens .= "--$boundary" . $quebra_linha . ""; 
$mens .= "Content-Type: ".$arquivo["type"]."" . $quebra_linha . ""; 
$mens .= "Content-Disposition: attachment; filename=\"".$arquivo["name"]."\"" . $quebra_linha . ""; 
$mens .= "Content-Transfer-Encoding: base64" . $quebra_linha . "" . $quebra_linha . ""; 
$mens .= "$anexo" . $quebra_linha . ""; 
$mens .= "--$boundary--" . $quebra_linha . ""; 
 
$headers = "MIME-Version: 1.0" . $quebra_linha . ""; 
$headers .= "From: $email_from " . $quebra_linha . ""; 
$headers .= "Return-Path: $email_from " . $quebra_linha . ""; 
$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"" . $quebra_linha . ""; 
$headers .= "$boundary" . $quebra_linha . ""; 
 
 
//envio o email com o anexo 
mail($email,$assunto,$mensagem,$headers, "-r".$email_from); 
 
echo"Email enviado com Sucesso!"; 
 
} 
 
//se nao tiver anexo 
else{ 
 
$headers = "MIME-Version: 1.0" . $quebra_linha . ""; 
$headers .= "Content-type: text/html; charset=iso-8859-1" . $quebra_linha . ""; 
$headers .= "From: $email_from " . $quebra_linha . ""; 
$headers .= "Return-Path: $email_from " . $quebra_linha . ""; 
 
//envia o email sem anexo 
mail($email,$assunto,$mensagem, $headers, "-r".$email_from); 
 
 
echo header("location:../home.php?go=add&sts=5");
} 

}
function addCursos(){
	$id=$_GET['id'];
	$nome = htmlspecialchars(trim($_POST['nome']));
	$carga = htmlspecialchars(trim($_POST['cargahoraria']));
	$valor = htmlspecialchars(trim($_POST['valor']));
	$data = date("Y-m-d");
	$cliestatus = "s";
		$res = mysql_query("INSERT INTO cursos(	cursos_nome,
												cursos_cargahoraria,
												cursos_valor)
										VALUES( '$nome',
												'$carga',
												'$valor')")or die(mysql_error());
	if($res){
		echo header("location:../home.php?go=addCursos&sts=1");
	}
	else echo header("location:../home.php?go=addCursos&sts=2");

}
function editCursos(){
	$id=$_GET['id'];
	$nome = htmlspecialchars(trim($_POST['nome']));
	$carga = htmlspecialchars(trim($_POST['cargahoraria']));
	$valor = htmlspecialchars(trim($_POST['valor']));
	$data = date("Y-m-d");
	$res = mysql_query("UPDATE cursos SET   cursos_nome='$nome',
											cursos_cargahoraria='$carga',
											cursos_valor='$valor'
											WHERE cursos_id = '$id'")or die(mysql_error());
	if($res){
		echo header("location:../home.php?go=addCursos&sts=3");
	}
	else echo header("location:../home.php?go=addCursos&sts=2");
}
function deletCursos(){
	$id=$_GET['id'];
	$res = mysql_query("Delete from cursos WHERE cursos_id = '$id' ")or die(mysql_error());
	if($res){
		echo header("location:../home.php?go=addCursos&sts=1");
	}
	else echo header("location:../home.php?go=addCursos&sts=2");
}

function addCat(){
	$id=$_GET['id'];
	$nome = htmlspecialchars(trim($_POST['nome']));
	$nome = "Atividade ".$nome;
		$res = mysql_query("INSERT INTO categoria(categoria_nome) VALUES( '$nome')")or die(mysql_error());
	if($res){
		echo header("location:../home.php?go=categorias&sts=1");
	}
	else echo header("location:../home.php?go=categorias&sts=2");
}
function deletCat(){
	$id=$_GET['id'];
	$res = mysql_query("Delete from categoria WHERE categoria_id = '$id' ")or die(mysql_error());
	if($res){
		echo header("location:../home.php?go=categorias&sts=1");
	}
	else echo header("location:../home.php?go=categorias&sts=2");
}
function editCat(){
	$id=$_GET['id'];
	$nome = htmlspecialchars(trim($_POST['nome']));
	$nome = "Atividade ".$nome;
	$res = mysql_query("UPDATE categoria SET   categoria_nome ='$nome'
											WHERE categoria_id = '$id'")or die(mysql_error());
	if($res){
		echo header("location:../home.php?go=categorias&sts=3");
	}
	else echo header("location:../home.php?go=categorias&sts=2");
}
 <?php 
 require("file/conexao.php");
 error_reporting(0);
$ip = $_SERVER['REMOTE_ADDR'];

if(mysql_num_rows(mysql_query("SELECT * FROM usersonline WHERE ip='".$ip."'"))>0) { //verifica se o ip ja esta no DB
//ja que ele está é necessario dar um update no time para que ele não seja deletado rapdamente
mysql_query('UPDATE usersonline SET time="'.time().'" WHERE ip="'.$ip.'"');
} else {
//ele não está no DB, então prescisamos inseri-lo
mysql_query('INSERT INTO usersonline (ip,time) VALUES ("'.$ip.'","'.time().'")');
}
mysql_query('DELETE FROM usersonline WHERE time<'.(time()-($tempmins*60))); //deleta os ips com mais de 5 minutos
$linhas = mysql_num_rows(mysql_query("SELECT * FROM usersonline")); //Mostra na pagina os usuarios online
echo "<center>Usuários online (" .$linhas.")</center>";
 ?>
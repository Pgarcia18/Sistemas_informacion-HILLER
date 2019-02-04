<?php

session_start();
include 'config.php';

$link = Conectarse();

$usuario = $_POST['usuario'];
$password = sha1($_POST['password']);

$query = "SELECT * FROM tblusuarios WHERE nombre = '".$usuario."' AND password = '".$password."'";

$result = mysql_query($query, $link);

$num_rows = mysql_num_rows($result);

echo $num_rows;
if($result){ 
	if($num_rows > 0) 
	{
		$_SESSION['user'] = $usuario;
		header("Location: inicio.php");
	} else {
		header("Location: index.php?error=si");
	}
}

mysql_close($link);

?>
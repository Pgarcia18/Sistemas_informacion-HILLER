<?php

function Conectarse()
{

	$Server = "localhost";
	$UserDB = "root";
	$PassDB = "";
	$DBname = "hiller";

	$con = mysql_connect($Server,$UserDB,$PassDB);
	if(!$con)
    {

        	echo"Error conectando a la base de datos.";

	        exit();

	}


	if(!mysql_select_db($DBname,$con))
    {

        	echo"Error seleccionando la base de datos.";

	        exit();

	}

	return $con;

}


?>
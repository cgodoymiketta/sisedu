<?php

// par�metros
$bdtipo = "MySQL";
$host   = "localhost";
$user   = "root";
$password = "";
$bd = "donbosco";

/*
if ($conexion->set_charset('utf8') === false) {
  die('Error: ' .  $conexion->error);
}
*/
//$upfile="C:\\Program Files\\Apache Group\\Apache\\htdocs\\icaro\\images\\upfiles\\";
//path absoluto con slash al final carpeta con permisos de escritura
//ejm /home/httpd/htdocs/icaro/images/upfiles/

// conexi�n con la base de datos
function connect ()
{
	global $bdtipo;
	global $host;
	global $user;
	global $password;
	global $bd;
	switch ($bdtipo) 
	{
		case "MySQL":
        		$vbase=mysql_pconnect($host, $user);
        		mysql_select_db($bd);
				
        		return $vbase;
    			break;;
  
	    	case "ODBC":
	    	      $vbase=@odbc_pconnect($bd,$user,$password);
         		return $vbase;
    			break;;

    		default:
        		$vbase=@mysql_pconnect($host, $user, $password);
        		mysql_select_db($bd);
		      return $vbase;
    			break;;
    	}

}

//ejecuta un query
function execute_query($vquery, $vbid)
{
	global $bdtipo;
	switch ($bdtipo) 
	{
		case "MySQL":
        		$vres=@mysql_query($vquery, $vbid) or die(mysql_error());
        		return $vres;
    			break;;
        
    		case "ODBC":
        		$vrid=@odbc_prepare($vbid,$vquery);
        		$vres=@odbc_execute($vrid);
        		return $vres;
    			break;;
  
    
		default:
        		$vres=@mysql_query($vquery, $vbid);
        		return $vres;
    			break;;
    	}   
}

//obtiene un resultado
function get_result($vresultado,$vregistro,$vcampo) 
{
	if($vcampo != "")
		return @mysql_result($vresultado,$vregistro,$vcampo);
	else
		return @mysql_result($vresultado,$vregistro);
}

//n�mero total de registros
function total_records($vresultado) 
{
	
	return mysql_num_rows($vresultado);
}


//Cierra la conexi�n con la base de datos
function disconnect($vdb) 
{
	return mysql_close($vdb);
}

?>

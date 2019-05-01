<?php 

switch ($vlccn) {
case "nuevo":
//echo "nuevo";
	//$VLdtCamp20="is_numeric ( mixed $var )";
	
break 1; 
case "guardar":
//echo "guardar";
break 1; 
case "modificar":
/////  CREAMOS LOS CAMPOS PARA LAS CORRECCIONES Y CAMBIAMOS EL ESTADO DE LAS TABLAS

break 1; 
case "buscar":
//echo "buscar";
break 1; 
case "imprimir":
//echo "imprimir";
break 1; 
case "eliminar":
//echo "eliminar";
break 1; 
default: 

}

?>
<table width="100%" border="0">
	<tr>
	  <td ><?php include("mnuccncrprcvdctnts.php"); ?></td>
	</tr>
	  <tr>
		<td ><hr></td>
	  </tr>
	  <tr>
		<td valign="top">
		<?php
		switch ($vlccn)
		{
			case "listado":
				include("dtslstd1crprcvdctnts.php"); 
			break 1;
			case "parcial":
				include("dtslstd2crvprcl.php"); 
			break 1;
			
		}
		
		 ?></td>
	</tr>
</table>
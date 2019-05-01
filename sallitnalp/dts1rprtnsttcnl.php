<?php 

switch ($vlccn) {
case "nuevo":
//echo "nuevo";

break 1; 
case "guardar":

//echo "guardar";
break 1; 
case "modificar":
//////////////////////// GRABO LA MATRICULA

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
<table width="100%"  border="0">
	<tr>
	  <td ><?php include("mnuccnrprtnsttcnl.php"); ?></td>
	</tr>
	  <tr>
		<td ><hr></td>
	  </tr>
	  <tr>
		<td ></td>
	  </tr>
	  <tr>
		<td  valign="top">
		<?php
		if (  $vlccn=="modificar")
		{
			include("dtslstd2rprtnsttcnl.php"); 
		} else {
		 	include("dtslstd1rprtnsttcnl.php"); 
		 }
		 ?></td>
	</tr>
</table>
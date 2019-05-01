<?php 

switch ($vlccn) {
case "nuevo":
//echo "nuevo";
	$VLdtCamp1="";
	$VLdtCamp2="";
	$VLdtCamp3="";
	$VLdtCamp4="";
	$VLdtCamp5="";
break 1; 
case "guardar":

break 1; 
case "modificar":

	if ( $VLModificar !="")
	{
		$Vtquery = $VLQry4.$VLQry18.$VLQry9.$VLQryCampo12."=".$VLdtCamp12 ; /// elimino los paralelos
		$VLdtDatosGP = execute_query($Vtquery,$VLConexion);					
		
		for($i=0 ; $i<$numero1; $i++){
			$VtqueryGP = $VLQry17.$VLdtCamp12.",".$VLdtCamp8[$i].")" ; /// inserto los paralelos
			$VLdtDatosGP = execute_query($VtqueryGP,$VLConexion);					
		}
		//echo "modificar";*/		
	}

	if ($VLdtCamp1!="" )
	{
		$Vtquery = $VLQry6." ".$VLQry9." ".$VLQryCampo1."=".$VLdtCamp1 ; /// recupero la especialidad
		//echo $Vtquery;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
		$VLnuDatos = total_records($VLdtDatos);
		if ( $VLnuDatos>0 )
		{
			for ( $i=0; $i< $VLnuDatos; $i++  )
			{
				$VLdtCamp1=get_result($VLdtDatos,$i,$VLQryCampo1);
				$VLdtCamp2=get_result($VLdtDatos,$i,$VLQryCampo2);
				$VLdtCamp3=get_result($VLdtDatos,$i,$VLQryCampo3);
				$VLdtCamp6=get_result($VLdtDatos,$i,$VLQryCampo6);
			}
		}
		
		$Vtquery = $VLQry10." ".$VLQry9." ".$VLQryCampo4."=".$VLdtCamp4 ; //// recupero el curso
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
		$VLnuDatos = total_records($VLdtDatos);
		if ( $VLnuDatos>0 )
		{
			for ( $i=0; $i< $VLnuDatos; $i++  )
			{
				$VLdtCamp4=get_result($VLdtDatos,$i,$VLQryCampo4);
				$VLdtCamp5=get_result($VLdtDatos,$i,$VLQryCampo5);
			}
		}
	} 
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
	  <td ><?php include("mnuccnscrdstrbtvprll.php"); ?></td>
	</tr>
	  <tr>
		<td ><hr></td>
	  </tr>
	  <tr>
		<td  valign="top">
		<?php
		if ( $VLNuevo != "" || $vlccn=="modificar")
		{
			include("dtslstd2scrdstrbtvprll.php"); 
		} else {
		 	include("dtslstd1scrdstrbtvprll.php"); 
		 }
		 ?></td>
	</tr>
</table>
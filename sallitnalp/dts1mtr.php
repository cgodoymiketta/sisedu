<?php 

switch ($vlccn) {
case "nuevo":
//echo "nuevo";
	$VLdtCamp1="";
	$VLdtCamp2="";
	$VLdtCamp3="";
	$VLdtCamp4="";
	$VLdtCamp5="";
	$VLdtCamp6="";
	$VLdtCamp7="";
	$VLdtCamp8=0;
	$VLdtCamp9=1;
break 1; 
case "guardar":
	if ($VLdtCamp2!="") // Validación de campos necesarios
	{
		$Vtquery = $VLQry1."'$VLdtCamp2','$VLdtCamp3','$VLdtCamp4','$VLdtCamp5','$VLdtCamp6','$VLdtCamp7','$VLdtCamp9',1".$VLQry5;
		//echo $Vtquery;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
	}
//echo "guardar";
break 1; 
case "modificar":
	if ( $VLModificar !="")
	{
		$Vtquery = $VLQry2." ".$VLQryCampo2."='".$VLdtCamp2."', ";
		$Vtquery .= $VLQryCampo3."='".$VLdtCamp3."', ";
		$Vtquery .= $VLQryCampo4."='".$VLdtCamp4."', ";
		$Vtquery .= $VLQryCampo5."='".$VLdtCamp5."', ";
		$Vtquery .= $VLQryCampo6."='".$VLdtCamp6."', ";
		$Vtquery .= $VLQryCampo7."='".$VLdtCamp7."', ";
		$Vtquery .= $VLQryCampo9."=".$VLdtCamp9." ";
		$Vtquery .= $VLQry3. " " .$VLdtCamp1;
		//echo $Vtquery;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
		//$VLnuDatos = total_records($VLdtDatos);
		//echo "modificar";		
	}
	if ($VLdtCamp1!="" )
	{
		$Vtquery = $VLQry6." ".$VLQry3. " " .$VLdtCamp1. " " .$VLQry7 ;
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
				$VLdtCamp4=get_result($VLdtDatos,$i,$VLQryCampo4);
				$VLdtCamp5=get_result($VLdtDatos,$i,$VLQryCampo5);
				$VLdtCamp6=get_result($VLdtDatos,$i,$VLQryCampo6);
				$VLdtCamp7=get_result($VLdtDatos,$i,$VLQryCampo7);
				$VLdtCamp8=get_result($VLdtDatos,$i,$VLQryCampo8);
				$VLdtCamp9=get_result($VLdtDatos,$i,$VLQryCampo9);
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
/*
	if ($VLdtCamp1!="" )
	{
		
		// Validamos que no tenga relaciones en otras tablas.
		$VTQueryV= $VLQry8 ." ".$VLQry3. " " .$VLdtCamp1;
		$VLdtDatosV1 = execute_query($VTQueryV,$VLConexion);
		$VLnuDatosV1 = total_records($VLdtDatosV1);
		$VTQueryV2= $VLQry10 ." ".$VLQry3. " " .$VLdtCamp1;
		$VLdtDatosV2 = execute_query($VTQueryV2,$VLConexion);
		$VLnuDatosV2 = total_records($VLdtDatosV2);
		if ($VLnuDatosV1==0 && $VLnuDatosV2==0){
		// En caso de no tener la procedemos a eliminar.
			$Vtquery = $VLQry4." ".$VLQry3. " " .$VLdtCamp1;
			//echo $Vtquery;
			$VLdtDatos = execute_query($Vtquery,$VLConexion);
		} else {
		// En caso de tener la procedemos a inhabilitar.
			$Vtquery = $VLQry2. " ".$VLQryCampo4."=0 ".$VLQry3. " " .$VLdtCamp1;
			//echo $Vtquery;
			$VLdtDatos = execute_query($Vtquery,$VLConexion);		
		}

	}
	*/	
//echo "eliminar";
break 1; 
default: 

}

?>
<table width="100%" border="0">
	<tr><td valign="top"><?php include("mnuccnmtr.php"); ?></td></tr>
	  <tr><td><hr></td></tr>
	  <tr><td valign="top">
		<?php
		if ( $VLNuevo != "" || $vlccn=="modificar")
		{
			include("dtslstd2mtr.php"); 
		} else {
		 	include("dtslstd1mtr.php"); 
		 }
		 ?></td></tr>
</table>
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
	$VLdtCamp8="";
	$VLdtCamp9="";
	$VLdtCamp10="";

break 1; 
case "guardar":
	if ($VLdtCamp2!="" && $VLdtCamp4!="" ) // Validación de campos necesarios
	{
		/// ONFIRMAMOS QUE LA PERSONA NO EXISTA
		$Vtquery2 = $VLQry10.$VLQryCampo4."='".$VLdtCamp4."' "; 
		$VLdtDatos2 = execute_query($Vtquery2,$VLConexion);
		$VLnuDatos2 = total_records($VLdtDatos2);
		//// SI EXISTE LA HACEMOS DOCENTE
		if ( $VLnuDatos2 > 0 ){ 
			$VLdtCamp1=get_result($VLdtDatos2,0,"p.".$VLQryCampo1);
			$Vtquery3 = $VLQry11.$VLdtCamp1.",".$VLInstitucion.")";
			$VLdtDatos3 = execute_query($Vtquery3,$VLConexion);

		} else {
			/// SI NO EXISTE LA CREAMOS Y LA HACEMOS DOCENTE
			$Vtquery = $VLQry1."'".$VLdtCamp2."','".$VLdtCamp3;
			$Vtquery .="','".$VLdtCamp4."','".$VLdtCamp5."',";
			$Vtquery .= "'".$VLdtCamp6."','".$VLdtCamp7."','";
			$Vtquery .= $VLdtCamp8."','".$VLdtCamp9."',1)";
			$VLdtDatos = execute_query($Vtquery,$VLConexion);
			/////  RECUPERAMOS A LA PERSONA
			$Vtquery2 = $VLQry10.$VLQryCampo4."='".$VLdtCamp4."' "; 
			$VLdtDatos2 = execute_query($Vtquery2,$VLConexion);
			
			$VLdtCamp1=get_result($VLdtDatos2,0,"p.".$VLQryCampo1);
			$Vtquery3 = $VLQry11.$VLdtCamp1.",".$VLInstitucion.")";
			$VLdtDatos3 = execute_query($Vtquery3,$VLConexion);
		
		}
	}
//echo "guardar";
break 1; 
case "modificar":
	if ( $VLModificar !="")
	{
		$Vtquerym = $VLQry2." ".$VLQryCampo2."='".$VLdtCamp2."', ";
		$Vtquerym.= $VLQryCampo3."='".$VLdtCamp3."', ";
		$Vtquerym.= $VLQryCampo4."='".$VLdtCamp4."', ";
		$Vtquerym.= $VLQryCampo5."='".$VLdtCamp5."', ";
		$Vtquerym.= $VLQryCampo6."='".$VLdtCamp6."', ";
		$Vtquerym.= $VLQryCampo7."='".$VLdtCamp7."', ";
		$Vtquerym.= $VLQryCampo8."='".$VLdtCamp8."', ";
		$Vtquerym.= $VLQryCampo9."='".$VLdtCamp9."' ";
		$Vtquerym.= $VLQry3. $VLdtCamp1;
		//echo $Vtquery;
		$VLdtDatos = execute_query($Vtquerym,$VLConexion);
		//$VLnuDatos = total_records($VLdtDatos);
		//echo "modificar";		
	}
	if ($VLdtCamp1!="" )
	{
		$Vtquery = $VLQry6." and p.".$VLQryCampo1."=".$VLdtCamp1." ".$VLQry7 ;
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
				$fecha1=strtotime($VLdtCamp7);
				$VLdtCamp7=date("Y/m/d",$fecha1);
				$VLdtCamp8=get_result($VLdtDatos,$i,$VLQryCampo8);
				$VLdtCamp9=get_result($VLdtDatos,$i,$VLQryCampo9);
				$VLdtCamp10=get_result($VLdtDatos,$i,$VLQryCampo10);
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
		if ($VLnuDatosV1==0){
		// En caso de no tener la procedemos a eliminar.
			$Vtquery = $VLQry4." ".$VLQry3. " " .$VLdtCamp1;
			//echo $Vtquery;
			$VLdtDatos = execute_query($Vtquery,$VLConexion);
		} else {
		// En caso de tener la procedemos a inhabilitar.
			$Vtquery = $VLQry2. " ".$VLQryCampo11."=0 ".$VLQry3. " " .$VLdtCamp1;
			//echo $Vtquery;
			$VLdtDatos = execute_query($Vtquery,$VLConexion);		
		}

	}*/	
//echo "eliminar";
break 1; 
default: 

}

?>
<table width="100%" border="0">
	<tr>
	  <td ><?php include("mnuccnscrdcnt.php"); ?></td>
	</tr>
	  <tr>
		<td ><hr></td>
	  </tr>
	  <tr>
		<td valign="top">
		<?php
		if ( $VLNuevo != "" || $vlccn=="modificar" || $VLGuardar!="")
		{
			include("dtslstd2scrdcnt.php"); 
		} else {
		 	include("dtslstd1scrdcnt.php"); 
		 }
		 ?></td>
	</tr>
</table>
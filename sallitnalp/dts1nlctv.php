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
	if ($VLdtCamp2!="") // Validación de campos necesarios
	{
		// CONSULTAMOS LA ULTIMA MATRICULA
		$VTQryMat="Select mtrno from mtrcl order by mtrno desc";
		$VLdtMat = execute_query($VTQryMat,$VLConexion);
		$VLnuMat = total_records($VLdtMat);
		if ( $VLnuMat>1){
				$VTdtMtrno=get_result($VLdtMat,0,"mtrno")+1;
			}else{
				$VTdtMtrno=1;
			}
		
		$Vtquery = $VLQry1."'".$VLdtCamp2."','".$VLdtCamp3."','".$VLdtCamp4;
		$Vtquery .= "','".$VLdtCamp5."',1,'".$VLInstitucion."',".$VTdtMtrno." ".$VLQry5;
		//echo $Vtquery;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
		
		/// consultamos el codigo del ano creado
		$VtqueryA="Select * from nlctv where ".$VLQryCampo2."='".$VLdtCamp2."' ";
		if ($VLdtCamp3!="")
		{$VtqueryA.=" and ".$VLQryCampo3."='".$VLdtCamp3."' ";}
		if($VLdtCamp4!="")
		{$VtqueryA.=" and ".$VLQryCampo4."='".$VLdtCamp4."' ";}
		$VtqueryA.=" order by anocodigo desc ";
		$VLdtDatosA = execute_query($VtqueryA,$VLConexion);
		$VLnuDatosA = total_records($VLdtDatosA);
		if ( $VLnuDatosA>0 )
		{
			$VLdtanocodigo=get_result($VLdtDatosA,0,"anocodigo");
		/// creamos el perfil del que creo el año en ese año
			for ($x=0; $x<$VLnuDatosU; $x++)
			{	
				$VLdtPerUsusario=get_result($VLdtDatosU,$x,"perfcodigo");
			/// creamos el perfil del que creo el año en ese año
				$VtqueryP="Insert into srprfl ( perfcodigo, usucodigo, anocodigo) values ( ".$VLdtPerUsusario.",".$VLUsuario.",".$VLdtanocodigo.")";
			$VLdtDatosP = execute_query($VtqueryP,$VLConexion);
			}
		}
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
		$Vtquery .= $VLQryCampo7."='".$VLInstitucion."' ";		
		$Vtquery .= $VLQry3. " " .$VLdtCamp1;
		//echo $Vtquery;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
		//$VLnuDatos = total_records($VLdtDatos);

		/// Consultamos el codigo del Usuario si existe.
		$VtqueryA="Select * from srprfl where ".$VLQryCampo1."='".$VLdtCamp1."' ";
		$VtqueryA.=" and usucodigo='".$VLUsuario."' ";
		$VLdtDatosA = execute_query($VtqueryA,$VLConexion);
		$VLnuDatosA = total_records($VLdtDatosA);
		if ( $VLnuDatosA==0 )
		{
			$VLdtanocodigo=$VLdtCamp1;
			for ($x=0; $x<$VLnuDatosU; $x++)
			{	
				$VLdtPerUsusario=get_result($VLdtDatosU,$x,"perfcodigo");
			/// creamos el perfil del que creo el año en ese año
				$VtqueryP="Insert into srprfl ( perfcodigo, usucodigo, anocodigo) values ( ".$VLdtPerUsusario.",".$VLUsuario.",".$VLdtanocodigo.")";
			$VLdtDatosP = execute_query($VtqueryP,$VLConexion);
			}
		}


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
				$fecha1=strtotime($VLdtCamp3);
				$VLdtCamp3=date("Y/m/d",$fecha1);
				$VLdtCamp4=get_result($VLdtDatos,$i,$VLQryCampo4);
				$fecha1=strtotime($VLdtCamp4);
				$VLdtCamp4=date("Y/m/d",$fecha1);
				$VLdtCamp5=get_result($VLdtDatos,$i,$VLQryCampo5);
				$VLdtCamp6=get_result($VLdtDatos,$i,$VLQryCampo6);
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
			$Vtquery = $VLQry2. " ".$VLQryCampo6."=0 ".$VLQry3. " " .$VLdtCamp1;
			echo $Vtquery;
			$VLdtDatos = execute_query($Vtquery,$VLConexion);		
		}

	}	
//echo "eliminar";
break 1; 
default: 

}

?>
<table width="100%"  border="0">
	<tr>
	  <td ><?php include("mnuccnnlctv.php"); ?></td>
	</tr>
	  <tr>
		<td ><hr></td>
	  </tr>
	  <tr>
		<td  valign="top">
        <?php //echo $VtqueryP; ?>
		<?php
		if ( $VLNuevo != "" || $vlccn=="modificar")
		{
			include("dtslstd2nlctv.php"); 
		} else {
		 	include("dtslstd1nlctv.php"); 
		 }
		 ?></td>
	</tr>
</table>
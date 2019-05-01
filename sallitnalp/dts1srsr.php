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
	if ($VLdtCamp8!="" && $VLdtCamp10!="" && $VLdtCamp3!="" && $VLdtCamp4!="" ) // Validación de campos necesarios
	{
		
//////// CONSULTAMOS LA PERSONA ///////
		$Vtquery = $VLQry4.$VLQry5.$VLQryCampo10."='".$VLdtCamp10."'";
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
		$VLnuDatos = total_records($VLdtDatos);
		
//////// VERIFICAMOS QUE EXISTA LA PERSONA ////
		if ( $VLnuDatos>0 )
		{
///////  SI EXISTE RECUPERAMOS EL CODIGO DE LA PERSONA		
						$VTCampo2=get_result($VLdtDatos,0,$VLQryCampo2);
						$VLdtCamp2=$VTCampo2;
		}else{
///////   SI NO EXISTE LA CREAMOS
			$Vtquery2 = $VLQry3."'".$VLdtCamp8."','".$VLdtCamp9."','".$VLdtCamp10."')";
			$VLdtDatos2 = execute_query($Vtquery2,$VLConexion);
			$VLnuDatos2 = total_records($VLdtDatos2);
///////   RECUPERAMOS EL CODIGO DE LA PERSONA
			$Vtquery = $VLQry4.$VLQry5.$VLQryCampo10."='".$VLdtCamp10."'";
			$VLdtDatos = execute_query($Vtquery,$VLConexion);
			$VLnuDatos = total_records($VLdtDatos);
			$VTCampo2=get_result($VLdtDatos,0,$VLQryCampo2);
			$VLdtCamp2=$VTCampo2;
		}
///////   CREAMOS EL USUARIO
			$Vtquery3 = $VLQry6.$VTCampo2.",'".$VLdtCamp3."','".$VLdtCamp4."',1)";
			$VLdtDatos3 = execute_query($Vtquery3,$VLConexion);
			//$VLnuDatos3 = total_records($VLdtDatos3);
///////   RECUPERAMOS EL CODIGO DEL USUARIO
			$Vtquery4 = $VLQry8.$VLQry5.$VLQryCampo3."='".$VLdtCamp3;
			$Vtquery4.= "' and ".$VLQryCampo4."='".$VLdtCamp4."'";
			$VLdtDatos4 = execute_query($Vtquery4,$VLConexion);
			$VLnuDatos4 = total_records($VLdtDatos4);
			$VTCampo1=get_result($VLdtDatos4,0,$VLQryCampo1);
			$VLdtCamp1=$VTCampo1;
///////   DESACTIVAMOS LOS PERFILES
			$Vtquery5 = $VLQry10.$VLQryCampo1."=".$VLdtCamp1;
			$VLdtDatos5 = execute_query($Vtquery5,$VLConexion);
			//$VLnuDatos5 = total_records($VLdtDatos5);
			
////////   ASIGNAMOS LOS PERFILES
			$NoPerfil=count($VLdtCamp11);
			if ( $NoPerfil>0)
			{
				for($i=0; $i<$NoPerfil; $i++)
				{ 			
					$Vtquery5 = $VLQry11.$VLdtCamp11[$i].",".$VLdtCamp1.",".$VLAnoLocal.")";
					$VLdtDatos5 = execute_query($Vtquery5,$VLConexion);
				}
			}
	}
//echo "guardar";
break 1; 
case "modificar":
	if ( $VLModificar !="")
	{
		$Vtquery7 = $VLQry12.$VLQryCampo3."='".$VLdtCamp3;
		$Vtquery7.="', ".$VLQryCampo4."='".$VLdtCamp4."' ";
		$Vtquery7.=$VLQry5.$VLQryCampo1."=".$VLdtCamp1;
		$VLdtDatos7 = execute_query($Vtquery7,$VLConexion);
		
///////   DESACTIVAMOS LOS PERFILES
			$Vtquery5 = $VLQry10.$VLQryCampo1."=".$VLdtCamp1.$VLQry13.$VLQryCampo13."=".$VLAnoLocal;
			$VLdtDatos5 = execute_query($Vtquery5,$VLConexion);
			//$VLnuDatos5 = total_records($VLdtDatos5);
			
////////   ASIGNAMOS LOS PERFILES
			$NoPerfil=count($VLdtCamp11);
			if ( $NoPerfil>0)
			{
				for($i=0; $i<$NoPerfil; $i++)
				{ 			
					$Vtquery5 = $VLQry11.$VLdtCamp11[$i].",".$VLdtCamp1.",".$VLAnoLocal.")";
					$VLdtDatos5 = execute_query($Vtquery5,$VLConexion);
				}
			}
	}
  ///////  RECUPERAMOS LA INFORMACION	
	if ($VLdtCamp1!="" && $VLdtCamp2!="" )
	{
		$Vtquery = $VLQry1." and u.".$VLQryCampo1."=".$VLdtCamp1." and ";
		$Vtquery .="p.".$VLQryCampo2."=".$VLdtCamp2;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
		$VLnuDatos = total_records($VLdtDatos);
		if ( $VLnuDatos>0 )
		{
			for ( $i=0; $i< $VLnuDatos; $i++  )
			{
				$VLdtCamp1=get_result($VLdtDatos,$i,"u.".$VLQryCampo1);
				$VLdtCamp2=get_result($VLdtDatos,$i,"p.".$VLQryCampo2);
				$VLdtCamp3=get_result($VLdtDatos,$i,"u.".$VLQryCampo3);
				$VLdtCamp4=get_result($VLdtDatos,$i,"u.".$VLQryCampo4);
				$VLdtCamp8=get_result($VLdtDatos,$i,"p.".$VLQryCampo8);
				$VLdtCamp9=get_result($VLdtDatos,$i,"p.".$VLQryCampo9);
				$VLdtCamp10=get_result($VLdtDatos,$i,"p.".$VLQryCampo10);
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
	  <td ><?php include("mnuccnsrsr.php"); ?></td>
	</tr>
	  <tr>
		<td ><hr></td>
	  </tr>
	  <tr>
		<td  valign="top">
		<?php
		if ( $VLNuevo != "" || $vlccn=="modificar")
		{
			include("dtslstd2srsr.php"); 
		} else {
		 	include("dtslstd1srsr.php"); 
		 }
		 ?></td>
	</tr>
</table>
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
//////// RECUPERAMOS LAS MATERIAS Q ESTAN ASIGNADAS EN ESA FAMILIA
	if ($VLdtCriterio2!="Asignadas")
	{
			$Vtqueryma =$VLQry6." and f.".$VLQryCampo10."=".$VLdtCriterio2.$VLQry7;
		
		$VLdtDatosma = execute_query($Vtqueryma,$VLConexion);
		$VLnuDatosma = total_records($VLdtDatosma);
		
		if ( $VLnuDatosma>0){
//////// LAS DESACTIVAMOS TODAS ////
				$Vtquerydes =$VLQry8.$VLQryCampo15."=0";
				$Vtquerydes.=" where ".$VLQryCampo9."=".$VLdtCamp9;
				$Vtquerydes.=" and ".$VLQryCampo10."=".$VLdtCriterio2;
				$Vtquerydes.=" and ".$VLQryCampo16."=".$VLAnoLocal;
				
				$VLdtDatosdes = execute_query($Vtquerydes,$VLConexion);
		}
		if ( $numero1>0)
		{		
//////// CONSULTAMOS LAS MATERIAS DE ESA FAMILIA
			$Vtqueryfm =$VLQry4." and f.".$VLQryCampo10."=".$VLdtCriterio2;
			$VLdtDatosfm = execute_query($Vtqueryfm,$VLConexion);
			$VLnuDatosfm = total_records($VLdtDatosfm);

//////// CONFIRMAMOS QUE EXISTAN MATERIAS EN ESTA FAMILIA
			if ( $VLnuDatosfm > 0) 
			{
/////// VAMOS PASANDO UNA A UNA LAS MATERIAS DE LA FAMILIA
				for ($j=0; $j<$VLnuDatosfm; $j++)
				{

////////////////////  RECUPERAMOS MATERIA Y FAMILIA
					$VTCampo10=get_result($VLdtDatosfm,$j,"f.".$VLQryCampo10);
					$VTCampo11=get_result($VLdtDatosfm,$j,"f.".$VLQryCampo11);
					$VTCampo12=get_result($VLdtDatosfm,$j,"m.".$VLQryCampo12);
					$VTCampo13=get_result($VLdtDatosfm,$j,"m.".$VLQryCampo13);

///////  VERIFICAMOS CON LAS SELECCIONADAS
					for ( $k=0; $k<$numero1; $k++)
					{
						if ($VLdtCamp12[$k]==$VTCampo12){
							$Asignada=0;
///////////////////////CONFIRMAMOS SI ESTA YA ASIGNADA
							for ( $x=0; $x<$VLnuDatosma; $x++)
							{
								$VTCampo12_temp=get_result($VLdtDatosma,$x,"m.".$VLQryCampo12);
								if ( $VLdtCamp12[$k]==$VTCampo12_temp )
								{
									$Asignada=1;
									$x=$VLnuDatosma;
								}
								
							}
							
							if ( $Asignada==1 ){
/////////////////// SI ESTA LA ACTIVAMOS
								$Vtqueryact =$VLQry8.$VLQryCampo15."=1";
								$Vtqueryact.=" where ".$VLQryCampo9."=".$VLdtCamp9;
								$Vtqueryact.=" and ".$VLQryCampo10."=".$VLdtCriterio2;
								$Vtqueryact.=" and ".$VLQryCampo12."=".$VLdtCamp12[$k];
								$Vtqueryact.=" and ".$VLQryCampo16."=".$VLAnoLocal;
								
								$VLdtDatosact = execute_query($Vtqueryact,$VLConexion);
							} else {
///////////////////// SI NO ESTA LA CREAMOS
								$Vtqueryact =$VLQry9.$VLdtCamp9.",".$VLdtCamp12[$k].",";
								$Vtqueryact.=$VLdtCriterio2.",1,".$VLAnoLocal.")";
								$VLdtDatosact = execute_query($Vtqueryact,$VLConexion);
							}
							
						}
						
					}
				}
			}
		}
	}

break 1; 
case "modificar":
	/// CONSULTAMOS LOS DATOS DEL DOCENTE////
			$VLQuery= $VLQry1;
			$VLQuery.= " and p.".$VLQryCampo1."=".$VLdtCamp1;
			$VLQuery.= " and d.".$VLQryCampo9."=".$VLdtCamp9;
			$VLdtDatos = execute_query($VLQuery,$VLConexion);
			$VLnuDatos = total_records($VLdtDatos);
			if ($VLnuDatos > 0)
			{
				//$VLdtCamp1=get_result($VLdtDatos,0,"p.".$VLQryCampo1);
				$VLdtCamp2=get_result($VLdtDatos,0,"p.".$VLQryCampo2);
				$VLdtCamp3=get_result($VLdtDatos,0,"p.".$VLQryCampo3);
				$VLdtCamp4=get_result($VLdtDatos,0,"p.".$VLQryCampo4);
				$VLdtCamp5=get_result($VLdtDatos,0,"p.".$VLQryCampo5);
				$VLdtCamp6=get_result($VLdtDatos,0,"p.".$VLQryCampo6);
				$VLdtCamp7=get_result($VLdtDatos,0,"p.".$VLQryCampo7);
				$VLdtCamp8=get_result($VLdtDatos,0,"p.".$VLQryCampo8);
				//$VLdtCamp9=get_result($VLdtDatos,0,"d.".$VLQryCampo9);
			}
	
	/// CONSULTAMOS LAS FAMILIAS DE MATERIAS ///
	
	

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
	  <td ><?php include("mnuccnscrddcnt.php"); ?></td>
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
		if ( $vlccn=="modificar" || $vlccn=="guardar" )
		{
			include("dtslstd2scrddcnt.php"); 
		} else {
		 	include("dtslstd1scrddcnt.php"); 
		 }
		 ?></td>
	</tr>
</table>
<?php 

switch ($vlccn) {
case "nuevo":
//echo "nuevo";<strong></strong>
	$VLdtCamp1="";
	$VLdtCamp2="";
	$VLdtCamp3="";
	$VLdtCamp4="";
	$VLdtCamp5="";
break 1; 
case "guardar":
	/*if ($VLdtCamp2!="") // Validación de campos necesarios
	{
		$Vtquery = $VLQry1."'$VLdtCamp2','$VLdtCamp3','$VLdtCamp4','$VLdtCamp5',1".$VLQry5;
		//echo $Vtquery;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
	}*/
//echo "guardar";
break 1; 
case "modificar":
	if ($VLdtCamp2=="")
	{
		$Vtquery2=$VLQry19." and g.espcodigo=".$VLdtCamp1;
		$Vtquery2.=" and g.curcodigo=".$VLdtCamp4;
		$Vtquery2.=$VLQry20;
		$VLdtDatos2 = execute_query($Vtquery2,$VLConexion);
		$VLdtCamp2=get_result($VLdtDatos2,0,$VLQryCampo2);
		$VLdtCamp5=get_result($VLdtDatos2,0,$VLQryCampo5);
	}

	if ( $VLModificar !="")
	{
		//criterio 2 guarda la familia
		$Vtquery = $VLQry18.$VLQry22.$VLQryCampo15."=".$VLdtCamp15;
		if ($VLdtCriterio2!="Asignadas")
			$Vtquery.= $VLQry22.$VLQryCampo11."=".$VLdtCriterio2;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
		$VLnuDatos = total_records($VLdtDatos);
		
		if ($VLdtCamp1!="" && $VLdtCamp4 !="" && $VLdtCamp15!="" && $numero1>0 )
		{
			if ($VLnuDatos<1 )
			{ // si no tiene materias el Grupo
				for ($i=0; $i<$numero1; $i++)
				{
					$Vtquery1 = $VLQry1.$VLdtCamp13[$i];
					$Vtquery1.= ",".$VLdtCamp15.",1)";
					$VLdtDatos1 = execute_query($Vtquery1,$VLConexion);
				}
			} else
			{ // Si posee materias el Grupo
			// desactivamos todas las que tenga en el grupo y la familia.
				for ($i=0; $i<$VLnuDatos ;$i++)
				{
					$Vtcodmtr=get_result($VLdtDatos,$i,$VLQryCampo13);
					$Vtquery1 = $VLQry2;
					$Vtquery1 .= $VLQryCampo16."=0";
					$Vtquery1 .= $VLQry3.$VLdtCamp15;
					$Vtquery1 .= $VLQry22.$VLQryCampo13."=".$Vtcodmtr;
					$VLdtDatos1 = execute_query($Vtquery1,$VLConexion);
				// elimino todas las materias
				}
				if ($numero1!=0)
				{
					for ($i=0; $i<$numero1; $i++)
					{
						$existe="no";
						for ($k=0; $k<$VLnuDatos; $k++)
						{
							$VTCampo13=get_result($VLdtDatos,$k,$VLQryCampo13);
							if ($VTCampo13==$VLdtCamp13[$i])
							{
								$existe="si";
							} 
						}
						if ($existe=="no")
						{
							$Vtquery1 = $VLQry1.$VLdtCamp13[$i];
							$Vtquery1.= ",".$VLdtCamp15.",1)";
							$VLdtDatos1 = execute_query($Vtquery1,$VLConexion);
						} else {
							$Vtquery1 = $VLQry2;
							$Vtquery1 .= $VLQryCampo16."=1";
							$Vtquery1 .= $VLQry3.$VLdtCamp15;
							$Vtquery1 .= " and ".$VLQryCampo13."=".$VLdtCamp13[$i];
							$VLdtDatos1 = execute_query($Vtquery1,$VLConexion);
						}
						
					}
				}
			}
		} 
		else // si se borran todas las materias
		{
			for ($i=0; $i<$VLnuDatos ;$i++)
			{
				$Vtcodmtr=get_result($VLdtDatos,$i,$VLQryCampo13);
				$Vtquery1 = $VLQry2;
				$Vtquery1 .= $VLQryCampo16."=0";
				$Vtquery1 .= $VLQry3.$VLdtCamp15;
				$Vtquery1 .= $VLQry22.$VLQryCampo13."=".$Vtcodmtr;
				$VLdtDatos1 = execute_query($Vtquery1,$VLConexion);
			// elimino todas las materias
			}
		}
		//echo "modificar";*/		
	}

break 1; 
case "buscar":
//echo "buscar";
break 1; 
case "imprimir":
//echo "imprimir";
break 1; 
case "eliminar":
	$Vtquery1 = $VLQry2;
	$Vtquery1 .= $VLQryCampo16."=0";
	$Vtquery1 .= $VLQry3.$VLdtCamp15;
	$VLdtDatos1 = execute_query($Vtquery1,$VLConexion);
//echo "eliminar";
break 1; 
default: 

}

?>
<table width="100%"  border="0">
	<tr>
	  <td ><?php include("mnuccnrprtlbrtq.php"); ?></td>
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
		if ( $VLNuevo != "" || $vlccn=="reportes")
		{
			include("dtslstd2rprtlbrtq.php"); 
		} else {
		 	include("dtslstd1rprtlbrtq.php"); 
		 }
		 ?></td>
	</tr>
</table>
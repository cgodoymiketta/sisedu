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
	/*if ($VLdtCamp2!="") // Validación de campos necesarios
	{
		$Vtquery = $VLQry1."'$VLdtCamp2','$VLdtCamp3','$VLdtCamp4','$VLdtCamp5',1".$VLQry5;
		//echo $Vtquery;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
	}*/
//echo "guardar";
break 1; 
case "modificar":

	if ( $VLModificar !="")
	{
		$Vtquery = $VLQry8." ".$VLQry9." ".$VLQryCampo1."=".$VLdtCamp1 ;
		$Vtquery .= " and ".$VLQryCampo7."=".$VLAnoLocal;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
		$VLnuDatos = total_records($VLdtDatos);
		if ($VLnuDatos==0)
		{
			for ($i=0; $i< $numero1; $i++)
			{
				
				$Vtquery1= $VLQry1;
				$Vtquery1.= $VLdtCamp1.",";
				$Vtquery1.= $VLdtCamp8[$i].",";
				$Vtquery1.= $VLAnoLocal.",";
								
				for($j=0; $j< $numero2; $j++)
				{
					if ($VLdtHcodigo[$j]==$VLdtCamp8[$i])
					{
						if ($VLdtCamp9[$j]=="")
						{
							$Vtquery1.="0,";
						}else {
							$Vtquery1.=$VLdtCamp9[$j].",";
						}
					}
				}

				$Vtquery1.= "1".$VLQry5;
				//echo $Vtquery1;
				$VLdtDatos1 = execute_query($Vtquery1,$VLConexion);
			}
			
		} else {
			$VLQuery = $VLQry2;
			$VLQuery .= $VLQryCampo10."=0 ";
			$VLQuery .= $VLQry9 ;
			$VLQuery .= $VLQryCampo1."=".$VLdtCamp1 ;
			$VLQuery .= " and ".$VLQryCampo7."=".$VLAnoLocal;
			//echo $VLQuery;
			$VLdtDatos1 = execute_query($VLQuery,$VLConexion);
			//$VLnuDatos1 = total_records($VLdtDatos1);
			
			for ($i=0; $i< $numero1; $i++)
			{
				
				// si no existe
				$VLdtCamp8a= $VLdtCamp8[$i];
				for($j=0; $j< $numero2; $j++)
				{
					if ($VLdtHcodigo[$j]==$VLdtCamp8[$i])
					{
						$VLdtCamp9a=$VLdtCamp9[$j];
					}
				}
				$actualiza="no";
				for ( $k=0 ; $k<$VLnuDatos; $k++ )
				{
					$VLdtCamp4=get_result($VLdtDatos,$k,$VLQryCampo4);
					
					if ($VLdtCamp4==$VLdtCamp8a)
					{ 
						$actualiza="si"; 
					}
				}
				if ($VLdtCamp9a=="")
				{
					$VLdtCamp9a=0;
				}
				
				if ($actualiza=="si")
				{
					$Vtquery1 = $VLQry2;
					$Vtquery1 .= $VLQryCampo10."=1, ";
					$Vtquery1 .= $VLQryCampo9."=".$VLdtCamp9a." ";
					$Vtquery1 .= $VLQry9 ;
					$Vtquery1 .= $VLQryCampo1."=".$VLdtCamp1 ;
					$Vtquery1 .= " and ".$VLQryCampo4."=".$VLdtCamp8a;
					$Vtquery1 .= " and ".$VLQryCampo7."=".$VLAnoLocal;
				} else {
					$Vtquery1= $VLQry1;
					$Vtquery1.= $VLdtCamp1.",";
					$Vtquery1.= $VLdtCamp8a.",";
					$Vtquery1.= $VLAnoLocal.",";				
					$Vtquery1.=$VLdtCamp9a.",";
					$Vtquery1.= "1".$VLQry5;
				}
				//echo $Vtquery1;
				$VLdtDatos1 = execute_query($Vtquery1,$VLConexion);
			}
			
		}
		//echo "modificar";*/		
	}

	if ($VLdtCamp1!="" )
	{
		$Vtquery = $VLQry6." ".$VLQry9." ".$VLQryCampo1."=".$VLdtCamp1 ;
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
			$Vtquery = $VLQry2. " ".$VLQryCampo6."=0 ".$VLQry3. " " .$VLdtCamp1;
			echo $Vtquery;
			$VLdtDatos = execute_query($Vtquery,$VLConexion);		
		}

	}*/	
//echo "eliminar";
break 1; 
default: 

}

?>
<table width="100%"  border="0">
	<tr>
	  <td ><?php include("mnuccnscrcrs.php"); ?></td>
	</tr>
	  <tr>
		<td ><hr></td>
	  </tr>
	  <tr>
		<td  valign="top">
		<?php
		if ( $VLNuevo != "" || $vlccn=="modificar")
		{
			include("dtslstd2scrcrs.php"); 
		} else {
		 	include("dtslstd1scrcrs.php"); 
		 }
		 ?></td>
	</tr>
</table>
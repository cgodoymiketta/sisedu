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
/////////////// CONFIRMAMOS EL NUMERO DE ESTUDIANTES

	$VtNumero=count($VTdtDtqmcodigo);
	
	if ($VtNumero>0)
	{
		$VTCadena="";
		for ($i=0; $i<$VtNumero; $i++)
		{
			$VTQryQmstr="Select * from qmstr where quicodigo=".$VLdtCamp6;
			$VLdtDatosQ = execute_query($VTQryQmstr,$VLConexion);
			$VLnuDatosQ = total_records($VLdtDatosQ);
			if ( $VLnuDatosQ > 0)
			{
					///// CONFIRMAR EL TIPO DE MATERIA PARA CALCULAR SEGUN ELLO ////
					if ( $VLdtmattipo[$i]== 1 ) 
					{
						if($VLdtfamilia[$i]<4)////PARA PRIMERO
						{
							
							$Vtquery="update qmstrdtll set ";			
							$Vtquery.=" quipromparcial=".$VTdtPromParcial[$i];
							$Vtquery.=", quiequivalencia80=".$VTdtEquiv80[$i];
							$Vtquery.=", quiexamen=".$VTdtExamen[$i];
							$Vtquery.=", quiequivalencia20=".$VTdtEquiv20[$i];
							$Vtquery.=", quipromquimestre=".$VTdtPromQuim[$i];
							$Vtquery.=" where ";
							$Vtquery.=" dtqmcodigo=".$VTdtDtqmcodigo[$i];
							$VLdtDatos = execute_query($Vtquery,$VLConexion);
						}else{
							if ($VtTipoq==1)///// PARA EL CALCULO ANUAL
							{
								
								$Vtquery="update qmstrdtll set ";			
								
								
								$VTdtPromQ=0;
								if($VTdtPromQ<$VTdtPromParcial[$i])
								{ $VTdtPromQ=$VTdtPromParcial[$i]; }
								
								if ( is_numeric($VTdtEquiv80[$i])){
									if ($VTdtPromQ<$VTdtEquiv80[$i])
									{
										$VTdtPromQ=$VTdtEquiv80[$i];
									}
								}else{ $VTdtEquiv80[$i]=0; }
								
								if ( is_numeric($VTdtExamen[$i])){
									if ($VTdtPromQ<$VTdtExamen[$i])
									{
										$VTdtPromQ=$VTdtExamen[$i];
									}
								}else{ $VTdtExamen[$i]=0; }
								
								if ( is_numeric($VTdtEquiv20[$i])){
									if ($VTdtPromQ<$VTdtEquiv20[$i])
									{
										$VTdtPromQ=$VTdtEquiv20[$i];
									}
								}else{ $VTdtEquiv20[$i]=0; }	
								
								$Vtquery.=" quipromparcial=".$VTdtPromParcial[$i];
								$Vtquery.=", quiequivalencia80=".$VTdtEquiv80[$i];
								$Vtquery.=", quiexamen=".$VTdtExamen[$i];
								$Vtquery.=", quiequivalencia20=".$VTdtEquiv20[$i];
								$Vtquery.=", quipromquimestre=".$VTdtPromQ;
								$Vtquery.=" where ";
								$Vtquery.=" dtqmcodigo=".$VTdtDtqmcodigo[$i];
								$VLdtDatos = execute_query($Vtquery,$VLConexion);

							} else {
								////////////////// PARA EL CALCULO QUIMESTRAL -----
								if ( is_numeric($VTdtExamen[$i])){
									if($VTdtExamen[$i]>10)
									{
										$VTdtExamen[$i]=0;	
									}
								} else { $VTdtExamen[$i]=0;}
								
								$Vtquery="update qmstrdtll set ";			
								$Vtquery.=" quipromparcial=".$VTdtPromParcial[$i];
								$Vtquery.=", quiequivalencia80=".$VTdtEquiv80[$i];
								$Vtquery.=", quiexamen=".$VTdtExamen[$i];
								if($VTdtExamen[$i]>0)
								{
									$VTdtEquiv20=round($VTdtExamen[$i]*2/10,2);
									
								}else{
									$VTdtEquiv20=0;
								}
								$VTdtPromQ=$VTdtEquiv80[$i]+$VTdtEquiv20;
								$Vtquery.=", quiequivalencia20=".$VTdtEquiv20;
								$Vtquery.=", quipromquimestre=".$VTdtPromQ;
								$Vtquery.=" where ";
								$Vtquery.=" dtqmcodigo=".$VTdtDtqmcodigo[$i];
								$VLdtDatos = execute_query($Vtquery,$VLConexion);
								$VTCadena=$VTCadena."---".$Vtquery;

							}
						}
					}
					if ( $VLdtmattipo[$i]== 2 ) 
					{
						if ($VtTipoq==1)
						{
							
							$VTdtPromQ=0;
							if($VTdtPromQ<$VTdtPromParcial[$i])
							{ $VTdtPromQ=$VTdtPromParcial[$i]; }
							
							if ( is_numeric($VTdtEquiv80[$i])){
								if ($VTdtPromQ<$VTdtEquiv80[$i])
								{
									$VTdtPromQ=$VTdtEquiv80[$i];
								}
							}else{ $VTdtEquiv80[$i]=0; }
							
							if ( is_numeric($VTdtExamen[$i])){
								if ($VTdtPromQ<$VTdtExamen[$i])
								{
									$VTdtPromQ=$VTdtExamen[$i];
								}
							}else{ $VTdtExamen[$i]=0; }
							
							if ( is_numeric($VTdtEquiv20[$i])){
								if ($VTdtPromQ<$VTdtEquiv20[$i])
								{
									$VTdtPromQ=$VTdtEquiv20[$i];
								}
							}
							
							$Vtquery="update qmstrdtll set ";			
							$Vtquery.=" quipromparcial=".$VTdtPromParcial[$i];
							$Vtquery.=", quiequivalencia80=".$VTdtEquiv80[$i];
							$Vtquery.=", quiexamen=".$VTdtExamen[$i];
							$Vtquery.=", quiequivalencia20=".$VTdtEquiv20[$i];
							$Vtquery.=", quipromquimestre=".$VTdtPromQ;
						} else{
							$Vtquery="update qmstrdtll set ";			
							$Vtquery.=" quipromparcial=".$VTdtPromParcial[$i];
							$Vtquery.=", quiequivalencia80=".$VTdtPromParcial[$i];
							$Vtquery.=", quiexamen=".$VTdtExamen[$i];
							$Vtquery.=", quiequivalencia20=".$VTdtExamen[$i];
							$Vtquery.=", quipromquimestre=".$VTdtPromQuim[$i];
						}
							$Vtquery.=" where ";
							$Vtquery.=" dtqmcodigo=".$VTdtDtqmcodigo[$i];
							$VLdtDatos = execute_query($Vtquery,$VLConexion);
					}
					if ( $VLdtmattipo[$i]== 3 ) 
					{
						$Vtquery="update qmstrdtll set ";			
						$Vtquery.=" quipromquimestre=".$VTdtPromQuim[$i];
						$Vtquery.=" where ";
						$Vtquery.=" dtqmcodigo=".$VTdtDtqmcodigo[$i];
						$VLdtDatos = execute_query($Vtquery,$VLConexion);
						
					}
					if ( $VLdtmattipo[$i]== 4 ) 
					{
						
						$Vtquery="update qmstrdtll set ";
						$Vtquery.=" quipromparcial=".$VTdtPromParcial[$i];
						$Vtquery.=", quiexamen=".$VTdtExamen[$i];
						$Vtquery.=", quiequivalencia20=".$VTdtEquiv20[$i];
						$Vtquery.=" where ";
						$Vtquery.=" dtqmcodigo=".$VTdtDtqmcodigo[$i];
						$VLdtDatos = execute_query($Vtquery,$VLConexion);
						$VTCadena=$VTCadena+" - "+$Vtquery;
					}
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
<table width="100%" border="0">
	<tr>
	  <td ><?php include("mnuccncrvqmstr.php"); ?></td>
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
				include("dtslstd1crvqmst.php"); 
			break 1;
			case "quimetre":
				include("dtslstd1crvqmstr.php"); 
			break 1;
			
		}
		 ?></td>
	</tr>
</table>
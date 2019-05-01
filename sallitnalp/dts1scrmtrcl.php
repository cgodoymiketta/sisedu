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
if ( $VLModificar != "" )
{
		if ( $VLdtCamp16=="")  ////// si no tiene numero de matricula
		{
			///////////////  es una matricula nueva	
			///// Confirmamos que tenga todos los datos necesarios
			if($VLdtCamp11!="" && $VLdtCamp14!="" && $VLFecha!="" && $VLFechaTexto!="" ) {
				$QueryMT = $VLQry24.$VLdtCamp19.",".$VLdtCamp11.",".$VLdtCamp14.",'";
				$QueryMT.= $VLFecha."','".$VLFechaTexto."',".$VLAnoLocal.",".$VLdtCamp25.")";
				$VLdtDatos = execute_query($QueryMT,$VLConexion);
				$QueryMT=$VLQry25.$VLQryCampo19."=".$VLdtCamp19.$VLQry21.$VLQryCampo11."=".$VLdtCamp11.$VLQry21.$VLQryCampo14."=".$VLdtCamp14;
				$VLdtDatos = execute_query($QueryMT,$VLConexion);
				$VLdtCamp16=get_result($VLdtDatos,0,$VLQryCampo16);
				$VLdtCamp17=$VLdtCamp16 - $VLFolio;
				$QueryMT=$VLQry26.$VLQryCampo17."=".$VLdtCamp17." , ".$VLQryCampo25."=".$VLdtCamp25;
				$QueryMT.=$VLQry9.$VLQryCampo16."=".$VLdtCamp16;
				$VLdtDatos = execute_query($QueryMT,$VLConexion);
				
				///// consultamos el numero de matricula y grupo
				$VtQueryDQ="Select mtrno, grucodigo, mtrestado from mtrcl where inescodigo=".$VLdtCamp19;
				$VtQueryDQ.=" and anocodigo=".$VLAnoLocal;
				$VLdtDatosDQ = execute_query($VtQueryDQ,$VLConexion);
				$VLnuDatosDQ = total_records($VLdtDatosDQ);
				if ($VLnuDatosDQ>0){
					///// recuperamos el numero de matricula y grupo
					$VTMtrno=get_result($VLdtDatosDQ,0,"mtrno");
					$VTGrucodigo=get_result($VLdtDatosDQ,0,"grucodigo");
					$VTMtrestado=get_result($VLdtDatosDQ,0,"mtrestado");
				////// recuperamos las materias /////
					$VtQueryMt="Select m.matcodigo,m.matdescripcion, m.matnoconsecutivo, m.mattipo 
					from grpmtr g, mtr m where m.matcodigo=g.matcodigo and grucodigo=".$VTGrucodigo;
					$VLdtDatosMt = execute_query($VtQueryMt,$VLConexion);
					$VLnuDatosMt = total_records($VLdtDatosMt);
					if($VLnuDatosMt>0){
						
					///// vemos si ya se han generados Pruebas Quimestrales.
						$VtQueryQ="SELECT quicodigo FROM qmstr WHERE quiestado >0";
						$VtQueryQ.=" AND anocodigo =".$VLAnoLocal." AND inscodigo =".$VLInstitucion;
						$VLdtDatosQ = execute_query($VtQueryQ,$VLConexion);
						$VLnuDatosQ = total_records($VLdtDatosQ);
						if($VLnuDatosQ > 0)
						{
							for($i=0; $i<$VLnuDatosQ ; $i++)
							{
								$VTQuicodigo=get_result($VLdtDatosQ,$i,"quicodigo");
								//// Recupero los parciales \\\\\\\\\\
								$VtQueryP="Select prccodigo, prcestado from prcl where prcestado>1 and quicodigo=".$VTQuicodigo;
								$VLdtDatosP = execute_query($VtQueryP,$VLConexion);
								$VLnuDatosP = total_records($VLdtDatosP);
								
								////// creo los detalle de Quimestre por materia
								
								////// me muevo en las materias ///////
								for ($j=0; $j<$VLnuDatosMt; $j++) 
								{
									///// recupero la materia //////
									$VTMatcodigo=get_result($VLdtDatosMt,$j,"m.matcodigo");
									$VTMatorden=get_result($VLdtDatosMt,$j,"m.matnoconsecutivo");
									$VTMattipo=get_result($VLdtDatosMt,$j,"m.mattipo");
									$VTMatdescripcion=get_result($VLdtDatosMt,$j,"m.matdescripcion");
									$VTQueryIQ="insert into qmstrdtll ( quicodigo, mtrno, matcodigo, quipromparcial,";
									$VTQueryIQ.="quiequivalencia80, quiexamen, quiequivalencia20, quipromquimestre,";
									$VTQueryIQ.="mtrestado) values (".$VTQuicodigo.",";
									$VTQueryIQ.=$VTMtrno.",";
									$VTQueryIQ.=$VTMatcodigo.",0,0,0,0,0,";
									$VTQueryIQ.=$VTMtrestado.")";
									$VLdtDatosIQ = execute_query($VTQueryIQ,$VLConexion);
									
									$VTQueryRQ="Select dtqmcodigo from qmstrdtll where ";
									$VTQueryRQ.="quicodigo=".$VTQuicodigo." and ";
									$VTQueryRQ.="mtrno=".$VTMtrno." and ";
									$VTQueryRQ.="matcodigo=".$VTMatcodigo;
									$VLdtDatosRQ = execute_query($VTQueryRQ,$VLConexion);
									$VLnuDatosRQ = total_records($VLdtDatosRQ);
									if ( $VLnuDatosRQ>0)
									{
										$VTDtqmcodigo=get_result($VLdtDatosRQ,0,"dtqmcodigo");
										if ($VLnuDatosP>0)
										{
											for ($x=0; $x<$VLnuDatosP; $x++)
											{
												$VTPrccodigo=get_result($VLdtDatosP,$x,"prccodigo");
												$VTPrcestado=get_result($VLdtDatosP,$x,"prcestado");
												$VtqueryPD="Insert into prcldtll (prccodigo, dtqmcodigo,";
												$VtqueryPD.="dtprtareas, dtpractindiv, dtpractgrupal, dtprlecciones,";
												$VtqueryPD.="dtprprueba, dtprpromedio, matcodigo, matdescripcion,";
												$VtqueryPD.=" matorden, mattipo,dtprestado) values ( ".$VTPrccodigo;
												$VtqueryPD.=", ".$VTDtqmcodigo.",0,0,0,0,0,0,".$VTMatcodigo;
												$VtqueryPD.=", '".$VTMatdescripcion;
												$VtqueryPD.="', ".$VTMatorden.",".$VTMattipo.",".$VTPrcestado.")";
												$VLdtDatosPD = execute_query($VtqueryPD,$VLConexion);
											}
										}
									}
								}
								
								
							}	
						}
					}
				}
			}

		}else{
		    ////////////////  la matricula ya ha sido registrada	
			$QueryMT=$VLQry26.$VLQryCampo14."=".$VLdtCamp14." , ".$VLQryCampo25."=".$VLdtCamp25;
			$QueryMT.=$VLQry9.$VLQryCampo16."=".$VLdtCamp16;
			$VLdtDatos = execute_query($QueryMT,$VLConexion);
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
	  <td ><?php include("mnuccnscrmtrcl.php"); ?></td>
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
			include("dtslstd2scrmtrcl.php"); 
		} else {
		 	include("dtslstd1scrmtrcl.php"); 
		 }
		 ?></td>
	</tr>
</table>
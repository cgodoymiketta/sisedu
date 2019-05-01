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
	

	////// VALIDAMOS QUE EL ALUMNO ESTE MATRICULADO
	if ( $VLdtCamp16!="")  ////// si no tiene numero de matricula no puede avanzar
	{
	//////  RECUPERAMOS LOS DATOS DEL ALUMNO y SU MATRICULA.
		if($VLdtCamp11==$VLdtCamp26) //// curso anterior / nuevo
		{
			///// CONFIRMAMOS QUE SEA EL MISMO CURSO
			$QueryMT=$VLQry26.$VLQryCampo17."=".$VLdtCamp17." , ".$VLQryCampo25."=".$VLdtCamp25;
			$QueryMT.=" , ".$VLQryCampo14."=".$VLdtCamp14." ";
			$QueryMT.=$VLQry9.$VLQryCampo16."=".$VLdtCamp16." AND anocodigo=".$VLAnoLocal;
			$VLdtDatosMT = execute_query($QueryMT,$VLConexion);
			
			///////  REVISAMOS QUE TENGA LOS QUIMESTRES CREADOS
			$VTQueryQ=" select quicodigo, anocodigo, quiestado ";
			$VTQueryQ.=" FROM qmstr   ";
			$VTQueryQ.=" where anocodigo=".$VLAnoLocal;
			$VTQueryQ.=" and quiestado=2 ";
			$VLdtDatosQ = execute_query($VTQueryQ,$VLConexion);
			$VLnuDatosQ = total_records($VLdtDatosQ);
			
			$QueryE="Select qd.dtqmcodigo, qd.quicodigo, qd.mtrno, qd.matcodigo  ";
			$QueryE.=" FROM qmstr q, qmstrdtll qd  ";
			$QueryE.=" where q.anocodigo=".$VLAnoLocal;
			$QueryE.=" and qd.mtrno=".$VLdtCamp16;
			$QueryE.=" and q.quicodigo=qd.quicodigo and q.quiestado=2 ";
			$VLdtDatosE = execute_query($QueryE,$VLConexion);
			$VLnuDatosE = total_records($VLdtDatosE);
			
			if ( $VLnuDatosQ >0 ) //// CONFIRMAMOS QUE EXISTAN ACTIVOS
			{
				for( $i=0; $i< $VLnuDatosQ; $i++) ///// nos movemos en todos quimestres activos
				{
					$VTdtqmcodigo=get_result($VLdtDatosQ,$i,"qd.dtqmcodigo");
					$VTdtquicodigo=get_result($VLdtDatosQ,$i,"qd.quicodigo");
					$VTdtmtrno=get_result($VLdtDatosQ,$i,"qd.mtrno");
					$VTdtmatcodigo=get_result($VLdtDatosQ,$i,"qd.matcodigo");
					//////// SI EXISTEN QUIMESTRES CONFIRMAMOS QUE LOS TENGA ////
					$VTExiste=0;
					if ( $VLnuDatosE >0 )
					{
						for($j=0; $j< $VLnuDatosE ; $j++)
						{
							$VTdtqmcodigo2=get_result($VLdtDatosE,$j,"qd.dtqmcodigo");
							$VTdtquicodigo2=get_result($VLdtDatosE,$j,"qd.quicodigo");
							$VTdtmtrno2=get_result($VLdtDatosE,$j,"qd.mtrno");
							$VTdtmatcodigo2=get_result($VLdtDatosE,$j,"qd.matcodigo");
							if ( $VTdtquicodigo2== $VTdtquicodigo)
							{
								$VTExiste=1;
								$j=$VLnuDatosE;
							}
							
						}
						
						///////////////  SI NO EXISTE LO CREAMOS Y SUS PARCIALES ///////////
						if ( $VTExiste==0)
						{
							////////// LE CREAMOS EL QUIMESTRE
							
							
							////////// RECUPERAMOS EL QUIMESTRE
							
							
							///////// CREAMOS LOS PARCIALES
							
							
						}
					}
					
					
				}
			}
				
		}else{
			///// SE HACE CAMBIO DE CURSO
			$VLQryCamCurso="Update mtrcl set grucodigo=".$VLdtCamp26;
			$VLQryCamCurso.=", parcodigo=".$VLdtCamp14;
			$VLQryCamCurso.=" where anocodigo=".$VLAnoLocal;
			$VLQryCamCurso.=" and ".$VLQryCampo16."=".$VLdtCamp16;
			$VLQryCamCurso.=" and ".$VLQryCampo17."=".$VLdtCamp17;
			$VLQryCamCurso.=" and ".$VLQryCampo19."=".$VLdtCamp19;
			$VLdtDatosCamCurso = execute_query($VLQryCamCurso,$VLConexion);
			
		
			/////  SE BORRAN LOS PARCIALES DETALLE 
			
			
		}
		

		
	}
	
	
	
	///// RECUPERAMOS LOS DATOS DEL QUIMESTRE Y EL PARCIAL EN CURSO ACTIVOS.
	
	//// CONFIRMAMOS SI SE VA A CAMBIAR DE GRUPO.
	
	////  SI VA A UN GRUPO DIFERENTE BORRAMOS DETALLE PARALELO Y DETALLE QUIMESTRE
	
	////  CONFIRMAMOS QUE NO TENGA DETALLE QUIMESTRE 
	
	////  ASIGNAMOS LOS NUEVOS DETALLE QUIMESTRES
	
	/// CONFIRMAMOS QUE NO LO TENGA AL DETALLE PARALELO
	/*


///////////////////   RECUPERAMOS TODAS MATRICULAS POR GRUPO Y MATERIA //////////////
		$Vtquery = "Select m.mtrno, g.grucodigo, g.matcodigo, m.mtrestado ";
		$Vtquery.=" from mtrcl m, grpmtr g, grp gr, mtr mt ";
		$Vtquery.=" where m.grucodigo=g.grucodigo";
		$Vtquery.=" and m.mtrno=".$VLdtCamp16;		
		$Vtquery.=" and gr.grucodigo=g.grucodigo and mt.matcodigo=g.matcodigo ";
		$Vtquery.=" and g.gmestado=1 and not mt.mattipo=5 ";
		$Vtquery.=" group by g.grucodigo, m.mtrno,  g.matcodigo";
		$Vtquery.=" order by g.grucodigo, m.mtrno,  g.matcodigo " ;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
		$VLnuDatos = total_records($VLdtDatos);
		if ( $VLnuDatos>0 )
		{
			for ( $i=0; $i< $VLnuDatos; $i++  )
			{
/////////////////  RECUPERO LA MATRICULA Y LA MATERIA /////////////////////////////////////////
				$VLdtMtrNo=get_result($VLdtDatos,$i,"m.mtrno");
				$VLdtMatcodigo=get_result($VLdtDatos,$i,"g.matcodigo");
				$VLdtGrucodigo=get_result($VLdtDatos,$i,"g.grucodigo");
				$VLdtMtrestado=get_result($VLdtDatos,$i,"m.mtrestado");
//////////////////  CREO LOS QUIMESTRES   /////////////////////////////////////////////////////////
				$VtqueryQ =" insert into qmstrdtll ( quicodigo, mtrno, matcodigo, mtrestado, " ;
				$VtqueryQ .=" quipromparcial, quiequivalencia80, quiexamen, ";
				$VtqueryQ .=" quiequivalencia20, quipromquimestre ";
				$VtqueryQ .=" ) values ( ";
				$VtqueryQ.=$VLdtCamp1.",".$VLdtMtrNo.",".$VLdtMatcodigo.",".$VLdtMtrestado.",0,0,0,0,0)" ;
////////////////// OJO TENEMOS QUE VER LOS QUIMESTRES GENERADOS /////////////////////////////////				
				
				//$VLdtDatosQ = execute_query($VtqueryQ,$VLConexion);
			}
		}
///////////////////   RECUPERAMOS PARCIALES Y DETALLES DE QUIMESTRES //////////////
		/*
		$VtqueryP = "Select q.matcodigo, q.dtqmcodigo, p.prccodigo, q.dtqmcodigo, q.mtrno, mt.mattipo, ";
		$VtqueryP.= "  q.quicodigo, m.parcodigo, g.curcodigo, mt.matdescripcion, mt.matnoconsecutivo, mt.matcodigo ";
		$VtqueryP.= " from qmstrdtll q, prcl p, mtrcl m, grp g, mtr mt ";
		$VtqueryP.= " where q.mtrno=m.mtrno and m.grucodigo=g.grucodigo and q.matcodigo=mt.matcodigo " ;
		$VtqueryP.= " and q.quicodigo=p.quicodigo and p.prccodigo= ".$VLdtCamp1 ;
		$VtqueryP.= " and not mt.mattipo=5 ";
		$VLdtDatosP = execute_query($VtqueryP,$VLConexion);
		$VLnuDatosP = total_records($VLdtDatosP);
		if ( $VLnuDatosP>0 )
		{
			$VLdtMtrno_temp=0;
			for ( $i=0; $i< $VLnuDatosP; $i++  )
			{
///////////////// RECUPERAMOS LOS DATOS DEL PARCIAL  /////////////////////////////////////////
				$VLdtDtqmcodigo=get_result($VLdtDatosP,$i,"q.dtqmcodigo");
				$VLdtPrccodigo=get_result($VLdtDatosP,$i,"p.prccodigo");
				$VLdtMtrno=get_result($VLdtDatosP,$i,"q.mtrno");
				$VLdtQuicodigo=get_result($VLdtDatosP,$i,"q.quicodigo");
				$VLdtParcodigo=get_result($VLdtDatosP,$i,"m.parcodigo");
				$VLdtCurcodigo=get_result($VLdtDatosP,$i,"g.curcodigo");
				$VLdtMatdescripcion=get_result($VLdtDatosP,$i,"mt.matdescripcion");
				$VLdtMatnoconsecutivo=get_result($VLdtDatosP,$i,"mt.matnoconsecutivo");
				$VLdtMattipo=get_result($VLdtDatosP,$i,"mt.mattipo");
				$VLdtMatcodigo=get_result($VLdtDatosP,$i,"mt.matcodigo");
				
//////////////////  CREO LOS DETALLES DE LOS PARCIALES   /////////////////////////////////////////////////////////
				$VtqueryPD =" insert into prcldtll ( dtqmcodigo, prccodigo,  matcodigo,";
				$VtqueryPD.=" matdescripcion, mattipo, matorden,";
				$VtqueryPD.="dtpractindiv, dtpractgrupal, dtprlecciones, dtprtareas, ";
				$VtqueryPD.="dtprprueba, dtprpromedio  ) values ( " ;
				$VtqueryPD.=$VLdtDtqmcodigo.",".$VLdtPrccodigo.",".$VLdtMatcodigo;
				$VtqueryPD.=",'".$VLdtMatdescripcion."',".$VLdtMattipo.",".$VLdtMatnoconsecutivo;
				$VtqueryPD.=",0,0,0,0,0,0)" ;
				$VLdtDatosPD = execute_query($VtqueryPD,$VLConexion);
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
			}
		}
		*/

				
				
				
			//}

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
	  <td ><?php include("mnuccnscrcmb.php"); ?></td>
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
			include("dtslstd2scrcmb.php"); 
		} else {
		 	include("dtslstd1scrcmb.php"); 
		 }
		 ?></td>
	</tr>
</table>
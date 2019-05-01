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
	$VLdtCamp9="0";
	$VLdtCamp8="1";
	$VLdtCamp10="AMBOS";
	
break 1; 
case "guardar":
	if ($VLdtCamp2!="") // Validación de campos necesarios
	{
		$Vtquery = $VLQry1."'$VLdtCamp2','$VLdtCamp3','$VLdtCamp4','$VLdtCamp5','$VLInstitucion','$VLAnoLocal',1,'$VLdtCamp9','$VLdtCamp10')";
		//echo $Vtquery;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
	}
//echo "guardar";
break 1; 
case "modificar":
	if ( $VLModificar !="")
	{
		//// modificamos los datos del Quimestres.
		$Vtquery = $VLQry2." ".$VLQryCampo2."='".$VLdtCamp2."', ";
		$Vtquery .= $VLQryCampo3."='".$VLdtCamp3."', ";
		$Vtquery .= $VLQryCampo4."='".$VLdtCamp4."', ";
		$Vtquery .= $VLQryCampo5."='".$VLdtCamp5."', ";
		$Vtquery .= $VLQryCampo6."='".$VLdtCamp6."', ";
		$Vtquery .= $VLQryCampo7."='".$VLdtCamp7."', ";
		$Vtquery .= $VLQryCampo9."='".$VLdtCamp9."', ";
		$Vtquery .= $VLQryCampo10."='".$VLdtCamp10."' ";
		$Vtquery .= $VLQry3.$VLdtCamp1;

		$VLdtDatos = execute_query($Vtquery,$VLConexion);

	}
	if ($VLdtCamp1!="" )
	{
		$Vtquery = $VLQry6." ".$VLQry3. " " .$VLdtCamp1. " " .$VLQry7 ;
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
				$VLdtCamp10=get_result($VLdtDatos,$i,$VLQryCampo10);
			}
		}
	} 
break 1; 
case "buscar":
//echo "buscar";
break 1; 
case "generar":
///////////////////   RECUPERAMOS TODAS MATRICULAS POR INSTITUCION, ANO, GRUPO Y MATERIA ////////////// SOLO DE LA SECCION QUE NOS INTERESA
////// ANTERIOR
/*
		$Vtquery = "Select m.mtrno, g.grucodigo, g.matcodigo, m.mtrestado ";
		$Vtquery.=" from mtrcl m, grpmtr g, grp gr, mtr mt ";
		$Vtquery.=" where m.grucodigo=g.grucodigo";
		$Vtquery.=" and gr.anocodigo=".$VLAnoLocal." and m.anocodigo=".$VLAnoLocal;
		$Vtquery.=" and gr.grucodigo=g.grucodigo and mt.matcodigo=g.matcodigo ";
		$Vtquery.=" group by g.grucodigo, m.mtrno,  g.matcodigo";
		$Vtquery.=" order by g.grucodigo, m.mtrno,  g.matcodigo " ;
*/

////////MODIFICACION
		$Vtquery = "Select m.mtrno, g.grucodigo, g.matcodigo, m.mtrestado, e.espseccion ";
		$Vtquery.=" from mtrcl m, grpmtr g, grp gr, spcldd e, mtr mt ";
		$Vtquery.=" where  ";
		/////////// CONFIRMAMOS DE QUE SECCION SE DESEA GENERAR EL QUIMESTRE
		if ($VLdtCamp10!="AMBOS"){
			$Vtquery.="  e.espseccion='".$VLdtCamp10."' and e.espcodigo=gr.espcodigo and ";
		}
		$Vtquery.=" m.grucodigo=g.grucodigo ";
		$Vtquery.=" and gr.anocodigo=".$VLAnoLocal." and m.anocodigo=".$VLAnoLocal;
		$Vtquery.=" and gr.grucodigo=g.grucodigo and mt.matcodigo=g.matcodigo ";
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
				$VLdtDatosQ = execute_query($VtqueryQ,$VLConexion);
			}
			$Vtquery=" Update qmstr set quiestado=2 where quicodigo=".$VLdtCamp1 ;
			$VLdtDatos = execute_query($Vtquery,$VLConexion);
		}

//////////////////  CAMBIO EL ESTADO DEL QUIMESTRE ////////////////////////////////////////////////

break 1; 
case "abrir":
	if ($VLdtCamp1!="" )
	{
		// Validamos que no tenga relaciones en otras tablas.
		$VTQueryV= $VLQry8 ." ".$VLQry3. " " .$VLdtCamp1;
		$VLdtDatosV1 = execute_query($VTQueryV,$VLConexion);
		$VLnuDatosV1 = total_records($VLdtDatosV1);
		if ($VLnuDatosV1==0){
		// En caso de no tener la procedemos a eliminar.
			//$Vtquery = $VLQry4." ".$VLQry3. " " .$VLdtCamp1;
			//echo $Vtquery;
			//$VLdtDatos = execute_query($Vtquery,$VLConexion);
		} else {
		// En caso de tener la procedemos a inhabilitar.
			$Vtquery = $VLQry2. " ".$VLQryCampo8."=3 ".$VLQry3. " " .$VLdtCamp1;
			$VLdtDatos = execute_query($Vtquery,$VLConexion);		
		}
	}	
break 1; 
case "calcular":
//echo "buscar";
break 1; 
case "cerrar":
	if ($VLdtCamp1!="" )
	{
		// Validamos que no tenga relaciones en otras tablas.
		$VTQueryV= $VLQry8 ." ".$VLQry3. " " .$VLdtCamp1;
		$VLdtDatosV1 = execute_query($VTQueryV,$VLConexion);
		$VLnuDatosV1 = total_records($VLdtDatosV1);
		if ($VLnuDatosV1==0){
		// En caso de no tener la procedemos a eliminar.
			//$Vtquery = $VLQry4." ".$VLQry3. " " .$VLdtCamp1;
			//echo $Vtquery;
			//$VLdtDatos = execute_query($Vtquery,$VLConexion);
		} else {
		// En caso de tener la procedemos a inhabilitar.
			$Vtquery = $VLQry2. " ".$VLQryCampo8."=4 ".$VLQry3. " " .$VLdtCamp1;
			$VLdtDatos = execute_query($Vtquery,$VLConexion);		
		}
	}	
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
			$Vtquery = $VLQry2. " ".$VLQryCampo8."=0 ".$VLQry3. " " .$VLdtCamp1;
			//echo $Vtquery;
			$VLdtDatos = execute_query($Vtquery,$VLConexion);		
		}

	}	
//echo "eliminar";
break 1; 
default: 

}

?>
<table width="100%" border="0">
	<tr>
	  <td ><?php include("mnuccnscrqmstr.php"); ?></td>
	</tr>
	  <tr>
		<td ><hr></td>
	  </tr>
	  <tr>
		<td valign="top">
		<?php
		if ( $VLNuevo != "" || $vlccn=="modificar")
		{
			include("dtslstd2scrqmstr.php"); 
		} else {
		 	include("dtslstd1scrqmstr.php"); 
		 }
		 ?></td>
	</tr>
</table>
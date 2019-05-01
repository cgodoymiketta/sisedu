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
	$VLdtCamp8="1";
	$VLdtCamp14="1";
	
break 1; 
case "guardar":
	if ($VLdtCamp2!="") // Validación de campos necesarios
	{
		$Vtquery = $VLQry1."'$VLdtCamp2','$VLdtCamp3','$VLdtCamp4','$VLdtCamp5','$VLdtCamp6','$VLdtCamp13',1,'$VLdtCamp14')";
		//echo $Vtquery;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
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
		$Vtquery .= $VLQryCampo13."='".$VLdtCamp13."', ";
		$Vtquery .= $VLQryCampo14."='".$VLdtCamp14."' ";
		$Vtquery .= $VLQry3. " " .$VLdtCamp1;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
		//$VLnuDatos = total_records($VLdtDatos);
		//echo "modificar";		
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
				$VLdtCamp4=get_result($VLdtDatos,$i,$VLQryCampo4);
				$VLdtCamp5=get_result($VLdtDatos,$i,$VLQryCampo5);
				$VLdtCamp6=get_result($VLdtDatos,$i,$VLQryCampo6);
				$VLdtCamp7=get_result($VLdtDatos,$i,$VLQryCampo7);
				$VLdtCamp8=get_result($VLdtDatos,$i,$VLQryCampo8);
				$VLdtCamp13=get_result($VLdtDatos,$i,$VLQryCampo13);
				$VLdtCamp14=get_result($VLdtDatos,$i,$VLQryCampo14);
			}
		}
	} 
break 1; 
case "buscar":
//echo "buscar";
break 1;
case "generar":
///////////////////   RECUPERAMOS PARCIALES Y DETALLES DE QUIMESTRES //////////////
		$VtqueryP = "Select q.matcodigo, q.dtqmcodigo, p.prccodigo, q.dtqmcodigo, q.mtrno, mt.mattipo, ";
		$VtqueryP.= "  q.quicodigo, m.parcodigo, g.curcodigo, mt.matdescripcion, mt.matnoconsecutivo, mt.matcodigo, e.espseccion ";
		$VtqueryP.= " from qmstrdtll q, prcl p, mtrcl m, grp g, mtr mt, spcldd e ";
		$VtqueryP.= " where q.mtrno=m.mtrno and e.espseccion='".$VLdtCamp13."' and e.espcodigo=g.espcodigo " ;
		$VtqueryP.= " and m.grucodigo=g.grucodigo and q.matcodigo=mt.matcodigo " ;
		$VtqueryP.= " and q.quicodigo=p.quicodigo and p.prccodigo= ".$VLdtCamp1 ;
		$VLdtDatosP = execute_query($VtqueryP,$VLConexion);
		$VLnuDatosP = total_records($VLdtDatosP);
		//$VTRegistros=$VLnuDatosP;
		if ( $VLnuDatosP>0 )
		{
			$VLdtMtrno_temp=0;
			
			for ( $i=0; $i< $VLnuDatosP; $i++  )
			{
///////////////// RECUPERAMOS LOS DATOS DEL PARCIAL  /////////////////////////////////////////
				$VLdtDtqmcodigo=get_result($VLdtDatosP,$i,"q.dtqmcodigo");
				$VLdtPrccodigo=get_result($VLdtDatosP,$i,"p.prccodigo");
				$VLdtMatdescripcion=get_result($VLdtDatosP,$i,"mt.matdescripcion");
				$VLdtMatnoconsecutivo=get_result($VLdtDatosP,$i,"mt.matnoconsecutivo");
				$VLdtMattipo=get_result($VLdtDatosP,$i,"mt.mattipo");
				$VLdtMatcodigo=get_result($VLdtDatosP,$i,"mt.matcodigo");
				
//////////////////  CREO LOS DETALLES DE LOS PARCIALES   /////////////////////////////////////////////////////////
				$VtqueryPD =" insert into prcldtll ( dtqmcodigo, prccodigo,  matcodigo,";
				$VtqueryPD.=" matdescripcion, mattipo, matorden,";
				$VtqueryPD.="dtprestado  ) values ( " ;
				$VtqueryPD.=$VLdtDtqmcodigo.",".$VLdtPrccodigo.",".$VLdtMatcodigo;
				$VtqueryPD.=",'".$VLdtMatdescripcion."',".$VLdtMattipo.",".$VLdtMatnoconsecutivo;
				$VtqueryPD.=",2)" ;
				$VLdtDatosPD = execute_query($VtqueryPD,$VLConexion);
				$VTRegistros=$i;
			}
//////////////////  CAMBIO EL ESTADO DEL PARCIAL ////////////////////////////////////////////////
			$Vtquery=" Update prcl set prcestado=2 where prccodigo=".$VLdtCamp1 ;
			$VLdtDatos = execute_query($Vtquery,$VLConexion);
		}
break 1; 
case "abrir":
//////////////////  CAMBIO EL ESTADO DEL QUIMESTRE ////////////////////////////////////////////////
	$VtQueryPa="update prcl set prcestado=3 where prccodigo=".$VLdtCamp1;
	$VtqueryPD="update prcldtll set dtprestado=3 where prccodigo=".$VLdtCamp1;
	$VLdtDatos = execute_query($VtQueryPa,$VLConexion);
	$VLdtDatos = execute_query($VtqueryPD,$VLConexion);
break 1; 
case "cerrar":
//////////////////// CONSULTAMOS LOS DETALLES DE LAS NOTAS DE ESE PARCIAL EN LAS CUANTITATIVAS  
	$VtQueryPa="update prcl set prcestado=4 where prccodigo=".$VLdtCamp1;
	$VtqueryPD="update prcldtll set dtprestado=4 where prccodigo=".$VLdtCamp1;
	$VLdtDatos = execute_query($VtQueryPa,$VLConexion);
	$VLdtDatos = execute_query($VtqueryPD,$VLConexion);
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
	  <td ><?php include("mnuccnscrprcl.php"); ?></td>
	</tr>
	  <tr>
		<td ><hr></td>
	  </tr>
	  <tr>
		<td valign="top">
		<?php
		if ( $VLNuevo != "" || $vlccn=="modificar")
		{
			include("dtslstd2scrprcl.php"); 
		} else {
		 	include("dtslstd1scrprcl.php"); 
		 }
		 ?></td>
	</tr>
</table>
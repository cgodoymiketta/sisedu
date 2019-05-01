<table width="100%" border="0">
 <tr>
	<td width="12%">
		<fieldset  >
		<table width="100%" border="0">
<?php 
if ( $VLBuscar!="")
{
?>
		  <tr>
			<td width="12%"><font face="Times New Roman, Times, serif" size="2" color="#000000" >Criterios
			    de B&uacute;squeda</font></td>
			<td width="71%" align="right">
				<select name="critero">
					<option value="<?php echo $VLtxtCampo1; ?>"><?php echo $VLtxtCampo1; ?>
					<option value="<?php echo $VLtxtCampo2; ?>"><?php echo $VLtxtCampo2; ?>
					<option value="<?php echo $VLtxtCampo3; ?>"><?php echo $VLtxtCampo3; ?>
				</select>
				<input name="txt_Consulta" type="text" id="txt_Consulta" size="30" maxlength="45" >&nbsp;</td>
			<td width="5%">&nbsp;</td>
			<td width="12%"><input name="consultar" type="image" id="consultar" onClick="sumit" src="imagenes/0025-searchx24.gif" alt="consultar" width="24" height="24" border="0" value="consultar">&nbsp;</td>
		  </tr>
<?php } ?>
		  <tr>
			<td width="12%"><font face="Times New Roman, Times, serif" size="2" color="#000000" >&nbsp;</font></strong></td>
			<td width="71%">&nbsp;</td>
			<td width="5%"><font face="Times New Roman, Times, serif" size="2" color="#000000" >&nbsp;</font></strong></td>
			<td width="12%"><font face="Times New Roman, Times, serif" size="2" color="#000000" >&nbsp;</font></strong></td>
		  </tr>
		</table>

	<!---------------------------   Desde aqui se visualiza el listado que se ha almacenado  ----------------------------------------->
	<iframe id="txt_Lista" name="txt_Lista" style="width:755px; height:170px;" >
<?php 
		$VTTablaLista="<table width='100%' border='1'>";
		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='35%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo3."</font></strong></td>";
			$VTTablaLista.="<td width='25%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo4."</font></strong></td>";
			$VTTablaLista.="<td width='40%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo1."</font></strong></td>";
		  $VTTablaLista.="</tr>";

	if ( $VLConsultar!="")
	{
		$Vtquery= "SELECT m.matcodigo, m.matdescripcion, c.curdescripcion, p.pardescripcion, q.quidescripcion, pr.prcdescripcion, q.quicodigo, pr.prccodigo, p.parcodigo, pr.prcestado, c.curcodigo
FROM mtr m, crs c, prll p, qmstr q, prcl pr, dcntmtr d, grpprllmtrdcnt dm, grpmtr gm, qmstrdtll qm, grp g
WHERE d.matcodigo = m.matcodigo
AND d.matcodigo = qm.matcodigo
AND q.quicodigo = qm.quicodigo
AND d.dcmtcodigo = dm.dcmtcodigo
AND q.quicodigo = pr.quicodigo
AND e.espseccion=pr.prcseccion
AND dm.indocodigo =".$VLdtCamp2."
AND dm.gmcodigo = gm.gmcodigo
AND gm.grucodigo = g.grucodigo
AND g.curcodigo = c.curcodigo
AND dm.parcodigo = p.parcodigo
AND q.anocodigo =".$VLAnoLocal."
AND g.anocodigo =".$VLAnoLocal."
AND q.quiestado > 1
AND d.indocodigo =".$VLdtCamp2."
AND pr.prcestado >4
AND dm.gpmdestado =1  ";
		switch ($VLdtCriterio) {
		case $VLtxtCampo1:
			$Vtquery .=" ".$VLQryCampo1." like '%".$VLdtConsultar."%'";
			break 1; 
		case $VLtxtCampo2:
			$Vtquery .=" ".$VLQryCampo2." like '%".$VLdtConsultar."%'";
			break 1; 
		case $VLtxtCampo3:
			$Vtquery .=" ".$VLQryCampo3." like '%".$VLdtConsultar."%'";
			break 1; 
		case $VLtxtCampo4:
			$Vtquery .=" ".$VLQryCampo4." like '%".$VLdtConsultar."%'";
			break 1; 
		default: 
		}
	} else {
		$Vtquery= "SELECT m.matcodigo, m.matdescripcion,m.mattipo, c.curdescripcion, p.pardescripcion, q.quidescripcion, pr.prcdescripcion, q.quicodigo, pr.prccodigo, p.parcodigo, pr.prcestado, pr.prcversion, c.curcodigo, e.espcodigo, e.espsiglas, e.esporden,  prd.dtprestado
FROM mtr m, crs c, prll p, qmstr q, prcl pr, prcldtll prd, dcntmtr d, grpprllmtrdcnt dm, grpmtr gm, qmstrdtll qm, grp g, spcldd e, mtrcl mt
WHERE
( prd.dtprestado=5 or prd.dtprestado=7 )
AND pr.prcestado =4
AND pr.prccodigo=prd.prccodigo
AND prd.matcodigo=m.matcodigo
AND prd.dtqmcodigo=qm.dtqmcodigo
AND mt.anocodigo=".$VLAnoLocal."
AND qm.mtrno=mt.mtrno
AND d.matcodigo = m.matcodigo
AND d.indocodigo =".$VLdtCamp2."
AND d.matcodigo = qm.matcodigo
AND q.quicodigo = qm.quicodigo
AND mt.parcodigo=p.parcodigo
AND d.dcmtcodigo = dm.dcmtcodigo
AND q.quicodigo = pr.quicodigo
AND dm.indocodigo =".$VLdtCamp2."
AND dm.gmcodigo = gm.gmcodigo
AND gm.grucodigo = g.grucodigo
AND g.espcodigo=e.espcodigo
AND e.espseccion=pr.prcseccion
AND g.curcodigo = c.curcodigo
AND dm.parcodigo = p.parcodigo
AND q.anocodigo =".$VLAnoLocal."
AND g.anocodigo =".$VLAnoLocal."
AND q.quiestado > 1
AND dm.gpmdestado =1 ";
		
	}
	$Vtquery.= " group by  m.matcodigo, m.matdescripcion, c.curdescripcion, p.pardescripcion, q.quidescripcion, pr.prcdescripcion,q.quicodigo, pr.prccodigo ";
	$Vtquery.= " order by  q.quiorden desc, pr.prcorden desc, e.esporden, c.curorden, p.parorden, m.mattipo, m.matnoconsecutivo";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTCampo1=get_result($VLdtDatos,$i,"m.matdescripcion");
			$VTCampo2=get_result($VLdtDatos,$i,"c.curdescripcion");
			$VTCampo3=get_result($VLdtDatos,$i,"p.pardescripcion");
			$VTCampo4=get_result($VLdtDatos,$i,"q.quidescripcion");
			$VTCampo5=get_result($VLdtDatos,$i,"pr.prcdescripcion");
			$VTCampo6=get_result($VLdtDatos,$i,"q.quicodigo");
			$VTCampo7=get_result($VLdtDatos,$i,"pr.prccodigo");
			$VTCampo8=get_result($VLdtDatos,$i,"p.parcodigo");
			$VTCampo9=get_result($VLdtDatos,$i,"c.curcodigo");
			$VTCampo10=get_result($VLdtDatos,$i,"m.matcodigo");
			$VTCampo11=get_result($VLdtDatos,$i,"prd.dtprestado");
			$VTCampo12=get_result($VLdtDatos,$i,"e.espcodigo");
			$VTCampo13=get_result($VLdtDatos,$i,"e.espsiglas");
			$VTCampo14=get_result($VLdtDatos,$i,"pr.prcversion");
			$VtMattipo=get_result($VLdtDatos,$i,"m.mattipo");
			if ($VtMattipo > 2){ //$VTCampo11=2; 
			}
			
			
		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td ><a href='doccorrecionparcial.php?vlccn=modificar&txt_Camp1=".$VLdtCamp1."&txt_Camp2=".$VLdtCamp2."&txt_Camp10=".$VTCampo10."&txt_Camp6=".$VTCampo6."&txt_Camp7=".$VTCampo7."&txt_Camp8=".$VTCampo8."&txt_Camp9=".$VTCampo9."&txt_Camp11=".$VTCampo11."&txt_Camp12=".$VTCampo12."&txt_Camp14=".$VTCampo14."&txt_dtmattipo=".$VtMattipo."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >". ($VTCampo1)."</font></strong></a></td>";
			$VTTablaLista.="<td ><a href='doccorrecionparcial.php?vlccn=modificar&txt_Camp1=".$VLdtCamp1."&txt_Camp2=".$VLdtCamp2."&txt_Camp10=".$VTCampo10."&txt_Camp6=".$VTCampo6."&txt_Camp7=".$VTCampo7."&txt_Camp8=".$VTCampo8."&txt_Camp9=".$VTCampo9."&txt_Camp11=".$VTCampo11."&txt_Camp12=".$VTCampo12."&txt_Camp14=".$VTCampo14."&txt_dtmattipo=".$VtMattipo."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".($VTCampo13."-".$VTCampo2." ".$VTCampo3)."</font></strong></a></td>";
			$VTTablaLista.="<td ><a href='doccorrecionparcial.php?vlccn=modificar&txt_Camp1=".$VLdtCamp1."&txt_Camp2=".$VLdtCamp2."&txt_Camp10=".$VTCampo10."&txt_Camp6=".$VTCampo6."&txt_Camp7=".$VTCampo7."&txt_Camp8=".$VTCampo8."&txt_Camp9=".$VTCampo9."&txt_Camp11=".$VTCampo11."&txt_Camp12=".$VTCampo12."&txt_Camp14=".$VTCampo14."&txt_dtmattipo=".$VtMattipo."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".($VTCampo4." / ".$VTCampo5)."</font></strong></a></td>";
		  $VTTablaLista.="</tr>";
		}
	} else {

		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$Vtquery."&nbsp;</font></strong></td>";
			$VTTablaLista.="<td ><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td ><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
		  $VTTablaLista.="</tr>";

	}
	
		$VTTablaLista.="</table>";
?>		
		</iframe>
		<script>
			var editor_obj = document.all["txt_Lista"];								
			var editdoc = editor_obj.contentWindow.document;									
			var VTHtml="<html><head><link href='../estilos/estilos.css' rel='stylesheet' type='text/css'></head>";
			var VTTabla="<?=$VTTablaLista?>";
			editdoc.open();
			editdoc.write(VTHtml+'<body leftmargin=0 topmargin=0 rightmargin=0 bottommargin=0>'+VTTabla+'</body></html>');
			editdoc.close();									
			editdoc.editor_obj=editor_obj; 
		</script> 		
<!-----------------------------------  Hasta aqui va la visualización del listado  ----------------------------------------------->		

		</fieldset>
        <? //echo $Vtquery; ?>
		</td>
	</tr>		
</table>
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

		$Vtquery= "SELECT q.quidescripcion, q.quitipo, q.quicodigo, 
q.quiestado, q.quiorden, m.matcodigo, m.matdescripcion, m.matnoconsecutivo, m.mattipo,
c.curorden, c.curcodigo, c.curdescripcion, p.parcodigo, p.pardescripcion, p.parorden,
e.espcodigo, e.espsiglas, e.esporden, g.grucodigo
FROM qmstrdtll qd, qmstr q, mtr m, crs c, prll p, dcntmtr d,
mtrcl mt, grp g, grpmtr gm, grpprllmtrdcnt md, spcldd e
WHERE 
 q.quiestado>1 
AND q.anocodigo=".$VLAnoLocal."
AND q.inscodigo=".$VLInstitucion."
AND qd.quicodigo = q.quicodigo
AND qd.matcodigo=m.matcodigo
AND qd.mtrno=mt.mtrno
AND mt.grucodigo=g.grucodigo
AND g.curcodigo=c.curcodigo
AND	g.espcodigo=e.espcodigo
AND m.matcodigo=gm.matcodigo
AND g.grucodigo=gm.grucodigo
AND g.anocodigo=".$VLAnoLocal."
AND mt.parcodigo=p.parcodigo
AND gm.gmcodigo=md.gmcodigo
and md.dcmtcodigo=d.dcmtcodigo
and md.indocodigo=".$VLdtCamp2."
and d.indocodigo=".$VLdtCamp2;
		
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
		$Vtquery= "SELECT q.quidescripcion, q.quitipo, q.quicodigo, 
q.quiestado, q.quiorden, m.matcodigo, m.matdescripcion, m.matnoconsecutivo, m.mattipo,
c.curorden, c.curcodigo, c.curdescripcion, p.parcodigo, p.pardescripcion, p.parorden,
e.espcodigo, e.espsiglas, e.esporden, g.grucodigo
FROM qmstrdtll qd, qmstr q, mtr m, crs c, prll p, dcntmtr d,
 grp g, grpmtr gm, grpprllmtrdcnt md, spcldd e
WHERE 
d.indocodigo=".$VLdtCamp2."
and md.gpmdestado =1	
AND md.indocodigo=".$VLdtCamp2."
AND md.indocodigo=d.indocodigo
AND md.parcodigo=p.parcodigo
AND md.gmcodigo=gm.gmcodigo
AND gm.matcodigo=m.matcodigo
AND gm.grucodigo=g.grucodigo
AND g.anocodigo=".$VLAnoLocal."
AND	g.espcodigo=e.espcodigo
AND g.curcodigo=c.curcodigo
AND qd.matcodigo=m.matcodigo
AND q.quiestado>1 
AND q.quiseccion=e.espseccion
AND q.anocodigo=".$VLAnoLocal."
AND q.inscodigo=".$VLInstitucion."
AND qd.quicodigo = q.quicodigo";	
	}
	$Vtquery.= " GROUP BY q.quidescripcion, q.quicodigo, q.quiestado, m.matcodigo, e.espcodigo,
	m.matdescripcion, c.curcodigo, c.curdescripcion, p.parcodigo, p.pardescripcion ";
	$Vtquery.= " order by  q.quiorden desc, e.esporden, e.espcodigo, c.curorden, p.parorden, m.mattipo, m.matnoconsecutivo";
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
			//$VTCampo5=get_result($VLdtDatos,$i,"pr.prcdescripcion");
			$VTCampo6=get_result($VLdtDatos,$i,"q.quicodigo");
			//$VTCampo7=get_result($VLdtDatos,$i,"pr.prccodigo");
			$VTCampo8=get_result($VLdtDatos,$i,"p.parcodigo");
			$VTCampo9=get_result($VLdtDatos,$i,"c.curcodigo");
			$VTCampo10=get_result($VLdtDatos,$i,"m.matcodigo");
			$VTCampo11=get_result($VLdtDatos,$i,"q.quiestado");
			$VTCampo12=get_result($VLdtDatos,$i,"e.espcodigo");
			$VTCampo13=get_result($VLdtDatos,$i,"e.espsiglas");
			$VTCampo14=get_result($VLdtDatos,$i,"g.grucodigo");
			$VTCampo50=get_result($VLdtDatos,$i,"q.quitipo");
			
		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='45%'><a href='docquimestre.php?vlccn=modificar&txt_Camp1=".$VLdtCamp1."&txt_Camp2=".$VLdtCamp2."&txt_Camp10=".$VTCampo10."&txt_Camp6=".$VTCampo6."&txt_Camp7=".$VTCampo7."&txt_Camp8=".$VTCampo8."&txt_Camp9=".$VTCampo9."&txt_tipoq=".$VTCampo50."&txt_Camp11=".$VTCampo11."&txt_Camp12=".$VTCampo12."&txt_Camp14=".$VTCampo14."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >". ($VTCampo1)."</font></strong></a></td>";
			$VTTablaLista.="<td width='15%'><a href='docquimestre.php?vlccn=modificar&txt_Camp1=".$VLdtCamp1."&txt_Camp2=".$VLdtCamp2."&txt_Camp10=".$VTCampo10."&txt_Camp6=".$VTCampo6."&txt_Camp7=".$VTCampo7."&txt_Camp8=".$VTCampo8."&txt_Camp9=".$VTCampo9."&txt_tipoq=".$VTCampo50."&txt_Camp11=".$VTCampo11."&txt_Camp12=".$VTCampo12."&txt_Camp14=".$VTCampo14."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".($VTCampo13."-".$VTCampo2." ".$VTCampo3)."</font></strong></a></td>";
			$VTTablaLista.="<td width='40%'><a href='docquimestre.php?vlccn=modificar&txt_Camp1=".$VLdtCamp1."&txt_Camp2=".$VLdtCamp2."&txt_Camp10=".$VTCampo10."&txt_Camp6=".$VTCampo6."&txt_Camp7=".$VTCampo7."&txt_Camp8=".$VTCampo8."&txt_Camp9=".$VTCampo9."&txt_tipoq=".$VTCampo50."&txt_Camp11=".$VTCampo11."&txt_Camp12=".$VTCampo12."&txt_Camp14=".$VTCampo14."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".($VTCampo4." / ".$VTCampo5)."</font></strong></a></td>";
		  $VTTablaLista.="</tr>";
		}
	} else {

		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='45%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='15%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='40%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
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
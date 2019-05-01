<table width="100%" border="0">
	<?php 
		if ($vlccn=="reportes")
		{ 
	?>
		
 	<tr>
		<td ><table width="100%" border="0">
		  <tr>
    <td width="10%">&nbsp;</td>
    <td width="80%" align="center">REPORTES QUIMESTRALES POR MATERIA</td>
    <td width="10%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    

	<!---------------------------   Desde aqui se visualiza el listado que se ha almacenado  ----------------------------------------->
	<iframe id="txt_Lista" name="txt_Lista" style="width:755px; height:170px;" >
<?php 
		$VTTablaLista="<table width='100%' border='1'>";
		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='40%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo3."</font></strong></td>";
			$VTTablaLista.="<td width='25%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo4."</font></strong></td>";
			$VTTablaLista.="<td width='35%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo1."</font></strong></td>";
		  $VTTablaLista.="</tr>";

		$VtqueryQ= "SELECT q.quidescripcion, q.quicodigo, q.quiestado, q.quiorden
, m.matcodigo, m.matdescripcion, c.curcodigo, 
c.curdescripcion, p.parcodigo, p.pardescripcion,
m.matnoconsecutivo, m.mattipo, e.espsiglas
FROM qmstrdtll qd, qmstr q, mtr m, crs c, prll p,
mtrcl mt, grp g, grpmtr gm, spcldd e ";
if ( $VLPer==4 || $VLPer==7 ){
	$VtqueryQ= $VtqueryQ.", dcntmtr dm, grpprllmtrdcnt gpmd  ";
}
$VtqueryQ= $VtqueryQ." WHERE 
qd.quicodigo = q.quicodigo
AND qd.dtqmestado>0
AND qd.matcodigo=m.matcodigo
AND qd.mtrno=mt.mtrno
AND p.parcodigo=".$VLdtCamp19."
AND mt.parcodigo=p.parcodigo
AND mt.grucodigo=g.grucodigo
AND g.gruestado=1
AND g.anocodigo=".$VLAnoLocal."
AND c.curcodigo=".$VLdtCamp4."
AND g.curcodigo=".$VLdtCamp4."
AND e.espcodigo=".$VLdtCamp1."
AND g.espcodigo=".$VLdtCamp1."
AND g.espcodigo=e.espcodigo
AND g.curcodigo=c.curcodigo
AND g.grucodigo=gm.grucodigo
AND gm.gmestado=1 
AND m.matcodigo=gm.matcodigo";
if ( $VLPer==4 || $VLPer==7 ){
	$VtqueryQ= $VtqueryQ." 	
and gpmd.gmcodigo=gm.gmcodigo 
and gpmd.indocodigo=".$VTdtDocCodigo."
and gpmd.gpmdestado=1
and gpmd.parcodigo=".$VLdtCamp19."
AND dm.dcmtcodigo=gpmd.dcmtcodigo 
AND dm.indocodigo= ".$VTdtDocCodigo." 
AND dm.anocodigo=".$VLAnoLocal;
}
$VtqueryQ= $VtqueryQ." 
AND q.quiestado>1 
AND q.anocodigo=".$VLAnoLocal."
AND q.inscodigo=".$VLInstitucion." ";
	$VtqueryQ.= " GROUP BY q.quiorden, q.quidescripcion, q.quicodigo, q.quiestado, m.matcodigo, m.matdescripcion, c.curcodigo, c.curdescripcion, p.parcodigo, p.pardescripcion ";
	$VtqueryQ.= " order by  q.quiorden, q.quidescripcion, c.curdescripcion, p.pardescripcion, m.mattipo, m.matnoconsecutivo,m.matdescripcion, m.matcodigo  ";
	$VLdtDatosQ = execute_query($VtqueryQ,$VLConexion);
	$VLnuDatos =0;
	$VLnuDatos = total_records($VLdtDatosQ);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTCampo1=get_result($VLdtDatosQ,$i,"m.matdescripcion");
			$VTCampo2=get_result($VLdtDatosQ,$i,"c.curdescripcion");
			$VTCampo3=get_result($VLdtDatosQ,$i,"p.pardescripcion");
			$VTCampo4=get_result($VLdtDatosQ,$i,"q.quidescripcion");
			$VTCampo6=get_result($VLdtDatosQ,$i,"q.quicodigo");
			$VTCampo8=get_result($VLdtDatosQ,$i,"p.parcodigo");
			$VTCampo9=get_result($VLdtDatosQ,$i,"c.curcodigo");
			$VTCampo10=get_result($VLdtDatosQ,$i,"m.matcodigo");
			$VTCampo11=get_result($VLdtDatosQ,$i,"q.quiestado");
			$VTCampo12=get_result($VLdtDatosQ,$i,"e.espsiglas");
			
		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='45%'><a href='setroper/repquimestralmateria.php?vlccn=modificar&txt_Camp1=".$VLdtCamp1."&txt_Camp2=".$VLdtCamp2."&txt_Camp10=".$VTCampo10."&txt_Camp6=".$VTCampo6."&txt_Camp7=".$VTCampo7."&txt_Camp8=".$VTCampo8."&txt_Camp9=".$VTCampo9."&txt_Camp11=".$VTCampo11."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=new  ><font face='Times New Roman, Times, serif' size='2' color='#000000' >". utf8_encode($VTCampo1)."</font></strong></a></td>";
			$VTTablaLista.="<td width='15%'><a href='setroper/repquimestralmateria.php?vlccn=modificar&txt_Camp1=".$VLdtCamp1."&txt_Camp2=".$VLdtCamp2."&txt_Camp10=".$VTCampo10."&txt_Camp6=".$VTCampo6."&txt_Camp7=".$VTCampo7."&txt_Camp8=".$VTCampo8."&txt_Camp9=".$VTCampo9."&txt_Camp11=".$VTCampo11."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=new ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".utf8_encode($VTCampo12." ".$VTCampo2." ".$VTCampo3)."</font></strong></a></td>";
			$VTTablaLista.="<td width='40%'><a href='setroper/repquimestralmateria.php?vlccn=modificar&txt_Camp1=".$VLdtCamp1."&txt_Camp2=".$VLdtCamp2."&txt_Camp10=".$VTCampo10."&txt_Camp6=".$VTCampo6."&txt_Camp7=".$VTCampo7."&txt_Camp8=".$VTCampo8."&txt_Camp9=".$VTCampo9."&txt_Camp11=".$VTCampo11."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=new ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".utf8_encode($VTCampo4." / ".$VTCampo5)."</font></strong></a></td>";
		  $VTTablaLista.="</tr>";
		}
	
		
		
	} else {

		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='45%'><font face='Times New Roman, Times, serif' size='2' color='#000000' > &nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='15%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='40%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
		  $VTTablaLista.="</tr>";

	}
	
////////////////  PARA EL CASO DE SER INSPECTOR		
		

		$VtqueryQI= "SELECT q.quidescripcion, q.quicodigo, q.quiestado, q.quiorden
, m.matcodigo, m.matdescripcion, c.curcodigo, 
c.curdescripcion, p.parcodigo, p.pardescripcion,
m.matnoconsecutivo, m.mattipo, e.espsiglas
FROM qmstrdtll qd, qmstr q, mtr m, crs c, prll p,
mtrcl mt, grp g, grpmtr gm, spcldd e 
WHERE 
qd.quicodigo = q.quicodigo
AND qd.dtqmestado>0
AND qd.matcodigo=m.matcodigo
AND qd.mtrno=mt.mtrno
AND p.parcodigo=".$VLdtCamp19."
AND mt.parcodigo=p.parcodigo
AND mt.grucodigo=g.grucodigo
AND g.gruestado=1
AND g.anocodigo=".$VLAnoLocal."
AND c.curcodigo=".$VLdtCamp4."
AND g.curcodigo=".$VLdtCamp4."
AND e.espcodigo=".$VLdtCamp1."
AND g.espcodigo=".$VLdtCamp1."
AND g.espcodigo=e.espcodigo
AND g.curcodigo=c.curcodigo
AND g.grucodigo=gm.grucodigo 
AND m.matcodigo=gm.matcodigo
AND ( m.mattipo=4 OR m.mattipo=3 )
AND q.quiestado>1 
AND q.anocodigo=".$VLAnoLocal."
AND q.inscodigo=".$VLInstitucion." ";
	$VtqueryQI.= " GROUP BY q.quiorden, q.quidescripcion, q.quicodigo, q.quiestado, m.matcodigo, m.matdescripcion, c.curcodigo, c.curdescripcion, p.parcodigo, p.pardescripcion ";
	$VtqueryQI.= " order by  q.quiorden, q.quidescripcion, c.curdescripcion, p.pardescripcion, m.mattipo, m.matnoconsecutivo,m.matdescripcion, m.matcodigo  ";
	$VLdtDatosQI = execute_query($VtqueryQI,$VLConexion);
	$VLnuDatosI =0;
	$VLnuDatosI = total_records($VLdtDatosQI);
	if ( $VLnuDatosI>0 )
	{
		for ( $i=0; $i< $VLnuDatosI; $i++  )
		{
			$VTCampo1=get_result($VLdtDatosQI,$i,"m.matdescripcion");
			$VTCampo2=get_result($VLdtDatosQI,$i,"c.curdescripcion");
			$VTCampo3=get_result($VLdtDatosQI,$i,"p.pardescripcion");
			$VTCampo4=get_result($VLdtDatosQI,$i,"q.quidescripcion");
			$VTCampo6=get_result($VLdtDatosQI,$i,"q.quicodigo");
			$VTCampo8=get_result($VLdtDatosQI,$i,"p.parcodigo");
			$VTCampo9=get_result($VLdtDatosQI,$i,"c.curcodigo");
			$VTCampo10=get_result($VLdtDatosQI,$i,"m.matcodigo");
			$VTCampo11=get_result($VLdtDatosQI,$i,"q.quiestado");
			$VTCampo12=get_result($VLdtDatosQI,$i,"e.espsiglas");
			
		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='45%'><a href='setroper/repquimestralmateria.php?vlccn=modificar&txt_Camp1=".$VLdtCamp1."&txt_Camp2=".$VLdtCamp2."&txt_Camp10=".$VTCampo10."&txt_Camp6=".$VTCampo6."&txt_Camp7=".$VTCampo7."&txt_Camp8=".$VTCampo8."&txt_Camp9=".$VTCampo9."&txt_Camp11=".$VTCampo11."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=new  ><font face='Times New Roman, Times, serif' size='2' color='#000000' >". utf8_encode($VTCampo1)."</font></strong></a></td>";
			$VTTablaLista.="<td width='15%'><a href='setroper/repquimestralmateria.php?vlccn=modificar&txt_Camp1=".$VLdtCamp1."&txt_Camp2=".$VLdtCamp2."&txt_Camp10=".$VTCampo10."&txt_Camp6=".$VTCampo6."&txt_Camp7=".$VTCampo7."&txt_Camp8=".$VTCampo8."&txt_Camp9=".$VTCampo9."&txt_Camp11=".$VTCampo11."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=new ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".utf8_encode($VTCampo12." ".$VTCampo2." ".$VTCampo3)."</font></strong></a></td>";
			$VTTablaLista.="<td width='40%'><a href='setroper/repquimestralmateria.php?vlccn=modificar&txt_Camp1=".$VLdtCamp1."&txt_Camp2=".$VLdtCamp2."&txt_Camp10=".$VTCampo10."&txt_Camp6=".$VTCampo6."&txt_Camp7=".$VTCampo7."&txt_Camp8=".$VTCampo8."&txt_Camp9=".$VTCampo9."&txt_Camp11=".$VTCampo11."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=new ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".utf8_encode($VTCampo4." / ".$VTCampo5)."</font></strong></a></td>";
		  $VTTablaLista.="</tr>";
		}
	} else {

		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='45%'><font face='Times New Roman, Times, serif' size='2' color='#000000' > &nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='15%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='40%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
		  $VTTablaLista.="</tr>";

	}
	//////////////////////////////////		
	
	
	
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
    
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></td>
	</tr>

	<?php 

		} // si es nuevo final 
		else { // si no es nuevo inicio
	
	?>
 	<tr>
		<td >&nbsp;</td>
	</tr>
	<tr>
		<td align="center">&nbsp;</td>
	</tr>
<?php } ?>			
</table>
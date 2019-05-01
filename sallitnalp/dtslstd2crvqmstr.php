<table width="100%" border="0">
	<?php 
		if ($vlccn=="parcial")
		{ 
	?>
		
 	<tr>
		<td ><table width="100%" border="0">
		  <tr>
    <td width="10%">&nbsp;</td>
    <td width="80%" align="center">CORRECCION DE QUIMESTRE POR MATERIA</td>
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
			$VTTablaLista.="<td width='15%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >CURSO / PARALELO</font></strong></td>";
			$VTTablaLista.="<td width='45%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >MATERIA</font></strong></td>";
			$VTTablaLista.="<td width='40%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >PARCIAL</font></strong></td>";
		  $VTTablaLista.="</tr>";
		
		
		$VtqueryC= "select * from crs where curcodigo=".$VLdtCurCodigo;
		$VtqueryP= "select * from prll where parcodigo=".$VLdtCamp19;

		$VtqueryM= "SELECT q.quicodigo, q.quiorden, m.matcodigo, m.matdescripcion, q.quidescripcion,
p.prccodigo, p.prcdescripcion, p.prcorden, p.prcversion
FROM qmstrdtll dq, qmstr q, prcl p, mtr m, grpmtr gm, grp g, spcldd e, dcntmtr dm ";
if ( $VLPer==4){
	$VtqueryM= $VtqueryM.", grpprllmtrdcnt gpmd  ";
}
$VtqueryM= $VtqueryM." WHERE p.prcestado > 3
AND q.inscodigo=".$VLInstitucion."
AND q.anocodigo=".$VLAnoLocal."
AND q.quicodigo = dq.quicodigo
AND p.quicodigo = q.quicodigo ";
if ( $VLPer==4){
	$VtqueryM= $VtqueryM."AND dm.indocodigo= ".$VTdtDocCodigo." 
AND dm.dcmtcodigo=gpmd.dcmtcodigo 
AND dm.anocodigo=".$VLAnoLocal." 
and gpmd.indocodigo=".$VTdtDocCodigo."
and gpmd.gpmdestado=1
and gpmd.gmcodigo=gm.gmcodigo 
and gpmd.parcodigo=".$VLdtCamp19;
}
$VtqueryM= $VtqueryM." AND m.matcodigo= dm.matcodigo
AND m.matcodigo = dq.matcodigo
AND m.matcodigo = gm.matcodigo
AND gm.grucodigo =".$VLdtCamp15."
AND g.grucodigo=gm.grucodigo
AND g.espcodigo=e.espcodigo
and p.prcseccion=e.espseccion
AND g.anocodigo=".$VLAnoLocal."
AND g.gruestado=1
GROUP BY dq.quicodigo, dq.matcodigo, p.prcdescripcion
ORDER by q.quiorden desc, p.prcorden desc, p.prcdescripcion, dq.matcodigo ";


	$VLdtDatosM = execute_query($VtqueryM,$VLConexion);
	$VLnuDatosM = total_records($VLdtDatosM);
	if ( $VLnuDatosM>0 )
	{
		$VLdtDatosC = execute_query($VtqueryC,$VLConexion);
		$VLdtDatosP = execute_query($VtqueryP,$VLConexion);
			$VTCampo7=get_result($VLdtDatosC,0,"curcodigo");
			$VTCampo8=get_result($VLdtDatosC,0,"curdescripcion");
			$VTCampo9=get_result($VLdtDatosP,0,"parcodigo");
			$VTCampo10=get_result($VLdtDatosP,0,"pardescripcion");
		
		
		for ( $i=0; $i< $VLnuDatosM; $i++  )
		{
			$VTCampo1=get_result($VLdtDatosM,$i,"m.matcodigo");
			$VTCampo2=get_result($VLdtDatosM,$i,"m.matdescripcion");
			$VTCampo3=get_result($VLdtDatosM,$i,"q.quicodigo");
			$VTCampo4=get_result($VLdtDatosM,$i,"q.quidescripcion");
			$VTCampo5=get_result($VLdtDatosM,$i,"p.prccodigo");
			$VTCampo6=get_result($VLdtDatosM,$i,"p.prcdescripcion");
			$VTCampo14=get_result($VLdtDatosM,$i,"p.prcversion");
			
		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='15%'><a href='sallitnalp/corparcialmateria.php?vlccn=modificar&txt_Camp1=".$VLdtCamp7."&txt_Camp10=".$VTCampo1."&txt_Camp6=".$VTCampo3."&txt_Camp7=".$VTCampo5."&txt_Camp8=".$VTCampo9."&txt_Camp9=".$VTCampo7."&txt_Camp14=".$VTCampo14."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=new ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".utf8_encode($VTCampo8)." - ".$VTCampo10."</font></strong></a></td>";
			$VTTablaLista.="<td width='45%'><a href='sallitnalp/corparcialmateria.php?vlccn=modificar&txt_Camp1=".$VLdtCamp7."&txt_Camp10=".$VTCampo1."&txt_Camp6=".$VTCampo3."&txt_Camp7=".$VTCampo5."&txt_Camp8=".$VTCampo9."&txt_Camp9=".$VTCampo7."&txt_Camp14=".$VTCampo14."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=new ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".utf8_encode($VTCampo2)."</font></strong></a></td>";
			$VTTablaLista.="<td width='40%'><a href='sallitnalp/corparcialmateria.php?vlccn=modificar&txt_Camp1=".$VLdtCamp7."&txt_Camp10=".$VTCampo1."&txt_Camp6=".$VTCampo3."&txt_Camp7=".$VTCampo5."&txt_Camp8=".$VTCampo9."&txt_Camp9=".$VTCampo7."&txt_Camp14=".$VTCampo14."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=new ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".utf8_encode($VTCampo4." / ".$VTCampo6)."</font></strong></a></td>";
		  $VTTablaLista.="</tr>";
		}
	} else {

		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='15%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='45%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
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
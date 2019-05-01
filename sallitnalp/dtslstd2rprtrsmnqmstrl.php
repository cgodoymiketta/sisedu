<table width="100%" border="0">
	<?php 
		if ($vlccn=="reportes")
		{ 
	?>
		
 	<tr>
		<td ><table width="100%" border="0">
		  <tr>
    <td width="10%">&nbsp;</td>
    <td width="80%" align="center">RESUMENES QUIMESTRALES</td>
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
			$VTTablaLista.="<td width='45%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo3."</font></strong></td>";
		  $VTTablaLista.="</tr>";
//*
if ( $VLPer==4){
	$VTQryTutor=" Select m.matcodigo
	from mtr m, dcntmtr dm, grpprllmtrdcnt gpmd, grpmtr gm, grp g
	where 
	m.mattipo=5
	and m.matcodigo=dm.matcodigo
	and dm.dcmtestado=1
	and dm.indocodigo=".$VTdtDocCodigo."
	and dm.anocodigo=".$VLAnoLocal."
	and dm.dcmtcodigo=gpmd.dcmtcodigo
	and gpmd.gpmdestado=1
	and gpmd.parcodigo=".$VLdtCamp8."
	and gpmd.gmcodigo=gm.gmcodigo
	and gm.gmestado=1
	and gm.grucodigo=g.grucodigo
	and g.gruestado=1
	and g.anocodigo=".$VLAnoLocal."
	and g.curcodigo=".$VLdtCamp4."
	and g.espcodigo=".$VLdtCamp1."
	group by m.matcodigo
	order by m.matcodigo ";
	$VLdtDatosQT = execute_query($VTQryTutor,$VLConexion);
	$VLnuDatosT =0;
	$VLnuDatosT = total_records($VLdtDatosQT);
	if ( $VLnuDatosT>0 )
	{
$VtqueryQ= "SELECT q.quidescripcion, q.quicodigo, q.quiestado, q.quiorden
 from qmstr q
 WHERE  q.quiestado>1 
 AND q.anocodigo=".$VLAnoLocal."
 AND q.inscodigo=".$VLInstitucion." 
 GROUP BY q.quiorden, q.quidescripcion, q.quicodigo, q.quiestado
order by  q.quiorden";		
	} else { $VtqueryQ=" "; echo "xxxx"; }
} else {
	//*/
		$VtqueryQ= "SELECT q.quidescripcion, q.quicodigo, q.quiestado, q.quiorden
		from qmstr q, spcldd e
 WHERE  q.quiestado>1 
 AND q.anocodigo=".$VLAnoLocal."
 AND q.inscodigo=".$VLInstitucion." 
 and e.inscodigo =".$VLInstitucion."
 and e.espcodigo=".$VLdtCamp1."
 and e.espseccion=q.quiseccion
 GROUP BY q.quiorden, q.quidescripcion, q.quicodigo, q.quiestado
order by  q.quiorden";
}	
	$VLdtDatosQ = execute_query($VtqueryQ,$VLConexion);
	$VLnuDatos =0;
	$VLnuDatos = total_records($VLdtDatosQ);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTCampo4=get_result($VLdtDatosQ,$i,"q.quidescripcion");
			$VTCampo6=get_result($VLdtDatosQ,$i,"q.quicodigo");
			$VTCampo11=get_result($VLdtDatosQ,$i,"q.quiestado");
			
		  $VTTablaLista.="<tr>";
		   $VTTablaLista.="<td width='40%'><a href='setroper/repquimestral.php?vlccn=modificar&txt_Camp1=".$VLdtCamp1."&txt_Camp2=".$VLdtCamp2."&txt_Camp10=".$VTCampo10."&txt_Camp6=".$VTCampo6."&txt_Camp8=".$VLdtCamp8."&txt_Camp9=".$VLdtCamp4."&txt_Camp11=".$VTCampo11."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=new ><font face='Times New Roman, Times, serif' size='2' color='#000000' >CUADRO GENERAL PARA JUNTAS / ".utf8_encode($VTCampo4)."</font></strong></a></td>";
		  $VTTablaLista.="</tr>";
		  $VTTablaLista.="<tr>";
		   $VTTablaLista.="<td width='40%'><a href='setroper/repmejorpromedioquimestral.php?vlccn=modificar&txt_Camp1=".$VLdtCamp1."&txt_Camp2=".$VTCampo6."&txt_Camp10=".$VTCampo10."&txt_Camp6=".$VTCampo6."&txt_Camp8=".$VLdtCamp8."&txt_Camp9=".$VLdtCamp4."&txt_Camp11=".$VTCampo11."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=new ><font face='Times New Roman, Times, serif' size='2' color='#000000' >MEJORES PROMEDIOS / ".utf8_encode($VTCampo4)."</font></strong></a></td>";	   
		  $VTTablaLista.="</tr>";
		}
	} else {

		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='45%'><font face='Times New Roman, Times, serif' size='2' color='#000000' > &nbsp;</font></strong></td>";
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
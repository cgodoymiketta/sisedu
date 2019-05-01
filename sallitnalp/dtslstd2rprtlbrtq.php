<table width="100%" border="0">
	<?php 
		if ($vlccn=="reportes")
		{ 
	?>
		
 	<tr>
		<td ><table width="100%" border="0">
		  <tr>
    <td width="10%">&nbsp;</td>
    <td width="80%" align="center">REPORTE DE QUIMESTRES</td>
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
			$VTTablaLista.="<td width='40%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >QUIMESTRE </font></strong></td>";
			$VTTablaLista.="<td width='20%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >ESTADO</font></strong></td>";
		  $VTTablaLista.="</tr>";
		  
		$VtqueryQmt= " SELECT quicodigo, quidescripcion, quiestado, quiorden
FROM qmstr q, spcldd e WHERE  anocodigo=".$VLAnoLocal." and q.inscodigo=".$VLInstitucion." and
e.inscodigo=".$VLInstitucion." and e.espcodigo=".$VLdtCamp1." and q.quiseccion=e.espseccion 
and e.espestado=1 order by quiorden ";
	$VLdtDatosQmt = execute_query($VtqueryQmt,$VLConexion);
	$VLnuDatosQmt = total_records($VLdtDatosQmt);
	if ( $VLnuDatosQmt>0 )
	{
		
		
		for ( $i=0; $i< $VLnuDatosQmt; $i++  )
		{
			$VTQuicodigo=get_result($VLdtDatosQmt,$i,"quicodigo");
			$VTQuidescripcion=get_result($VLdtDatosQmt,$i,"quidescripcion");
			$VTQuiestado=get_result($VLdtDatosQmt,$i,"quiestado");
			
		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='40%'>";
			if($VTQuiestado!=1) {
			$VTTablaLista.="<a href='setroper/libretaq.php?vlccn=modificar&txt_Camp1=".$VTQuicodigo."&txt_Camp2=".$VTPrccodigo."&txt_Camp3=".$VLdtCamp4."&txt_Camp4=".$VLdtCamp19."&txt_Camp5=".$VTCampo7."&txt_Camp9=".$VLdtCamp9."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=new >";
			}
			$VTTablaLista.="<font face='Times New Roman, Times, serif' size='2' color='#000000' >";
			$VTTablaLista.=utf8_encode($VTQuidescripcion);
			$VTTablaLista.="</font></strong>";
			if($VTQuiestado!=1) {
			$VTTablaLista.="</a>";
			}
			$VTTablaLista.="</td>";
			$VTTablaLista.="<td width='20%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >";
			switch ($VTQuiestado) {
			case "1":
			$VTTablaLista.="CREADO";
			break 1; 
			case "2":
			$VTTablaLista.="GENERADO";
			break 1; 
			case "3":
			$VTTablaLista.="ABIERTO";
			break 1; 
			case "4":
			$VTTablaLista.="CERRADO";
			break 1; 
			}
			
			$VTTablaLista.="</font></strong></td>";
		  $VTTablaLista.="</tr>";
		}
	} else {

		  $VTTablaLista.="<tr>";
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
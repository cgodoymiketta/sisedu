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
					<option value="<?php echo $VLtxtCampo2; ?>"><?php echo $VLtxtCampo2; ?>
					<option value="<?php echo $VLtxtCampo5; ?>"><?php echo $VLtxtCampo5; ?>					
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
	<iframe id="txt_Lista" name="txt_Lista" style="width:755px; height:170px;" frameborder="0"  scrolling="auto" >
<?php 
		
		
		$VTTablaLista="<table border='1'>";
		  $VTTablaLista.="<tr>";
				$VTTablaLista.="<td width='350' ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo5."</font></strong></td>";
		  $VTTablaLista.="</tr>";
		  $VTTablaLista.="<tr>";
				$VTTablaLista.="<td width='350' ><a href='setroper/reppromedioanualinstitucion.php?vlccn=modificar&critero2=NUEVOS&txt_Camp1=".$VTCampo1."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."&nlctv=".$VLAnoLocal."&txt_Camp4=".$VTCampo4."&nlctv2=".$VLAnoLocal."&consultar2.x=20&consultar2.y=15' target=new ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo6."</font></a></strong></td>";
		  $VTTablaLista.="</tr>";
		  $VTTablaLista.="<tr>";
				$VTTablaLista.="<td width='350' ><a href='setroper/reppromedioanualinstitucionespe.php?vlccn=modificar&critero2=NUEVOS&txt_Camp1=".$VTCampo1."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."&nlctv=".$VLAnoLocal."&txt_Camp4=".$VTCampo4."&nlctv2=".$VLAnoLocal."&consultar2.x=20&consultar2.y=15' target=new ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo7."</font></a></strong></td>";
		  $VTTablaLista.="</tr>";

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
		
		</td>
	</tr>		
</table>
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
					<option value="<?php echo $VLtxtCampo4; ?>"><?php echo $VLtxtCampo4; ?>
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
	<iframe id="txt_Lista" name="txt_Lista" style="width:755px; height:170px; ">
<?php 
		$VTTablaLista="<table width='100%' border='1'>";
		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='12%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo1."</font></strong></td>";
			$VTTablaLista.="<td width='32%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo2."</font></strong></td>";
			$VTTablaLista.="<td width='12%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo3."</font></strong></td>";
			$VTTablaLista.="<td width='44%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo4."</font></strong></td>";
		  $VTTablaLista.="</tr>";

	if ( $VLConsultar!="")
	{
		$Vtquery= $VLQry6." ".$VLQry9;
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
		//echo $Vtquery.",,".$VLdtCriterio;
	} else {
		$Vtquery = $VLQry6;
	}
	$Vtquery.= " ".$VLQry7;
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTCampo1=get_result($VLdtDatos,$i,$VLQryCampo1);
			$VTCampo2=get_result($VLdtDatos,$i,$VLQryCampo2);
			$VTCampo3=get_result($VLdtDatos,$i,$VLQryCampo3);
			$VTCampo4=get_result($VLdtDatos,$i,$VLQryCampo4);
			$VTCampo5=get_result($VLdtDatos,$i,$VLQryCampo5);

		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='12%'><a href='paralelo.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo1."</font></strong></a></td>";
			$VTTablaLista.="<td width='32%'><a href='paralelo.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo2."</font></strong></a></td>";
			$VTTablaLista.="<td width='12%'><a href='paralelo.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo3."</font></strong></a></td>";
			$VTTablaLista.="<td width='44%'><a href='paralelo.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo4."</font></strong></a></td>";
		  $VTTablaLista.="</tr>";

		}
	} else {

		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='12%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='32%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='12%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='44%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
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
		</td>
	</tr>		
</table>
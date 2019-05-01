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
					<option value="<?php echo $VLtxtCampo3; ?>"><?php echo $VLtxtCampo3; ?>
					<option value="<?php echo $VLtxtCampo8; ?>"><?php echo $VLtxtCampo8; ?>
					<option value="<?php echo $VLtxtCampo9; ?>"><?php echo $VLtxtCampo9; ?>
					<option value="<?php echo $VLtxtCampo10; ?>"><?php echo $VLtxtCampo10; ?>
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
			$VTTablaLista.="<td width='30%' align='center'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo3."</font></strong></td>";
			$VTTablaLista.="<td width='50%' align='center'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo8." y ".$VLtxtCampo9."</font></strong></td>";
			$VTTablaLista.="<td width='20%' align='center'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo10."</font></strong></td>";
			//$VTTablaLista.="<td width='44%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo4."</font></strong></td>";
		  $VTTablaLista.="</tr>";

	if ( $VLConsultar!="")
	{
		$Vtquery= $VLQry1;
		switch ($VLdtCriterio) {
		case $VLtxtCampo3:
			$Vtquery .=" and ".$VLQryCampo3." like '%".$VLdtConsultar."%'";
			break 1; 
		case $VLtxtCampo8:
			$Vtquery .=" and ".$VLQryCampo8." like '%".$VLdtConsultar."%'";
			break 1; 
		case $VLtxtCampo9:
			$Vtquery .=" and ".$VLQryCampo9." like '%".$VLdtConsultar."%'";
			break 1; 
		case $VLtxtCampo10:
			$Vtquery .=" and ".$VLQryCampo10." like '%".$VLdtConsultar."%'";
			break 1; 
		default: 
		}
		//echo $Vtquery.",,".$VLdtCriterio;
	} else {
		$Vtquery = $VLQry1;
	}
	$Vtquery.= " ".$VLQry7;
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTCampo1=get_result($VLdtDatos,$i,"u.".$VLQryCampo1);
			$VTCampo2=get_result($VLdtDatos,$i,"p.".$VLQryCampo2);
			$VTCampo8=get_result($VLdtDatos,$i,"p.".$VLQryCampo8);
			$VTCampo9=get_result($VLdtDatos,$i,"p.".$VLQryCampo9);
			$VTCampo10=get_result($VLdtDatos,$i,"p.".$VLQryCampo10);
			$VTCampo3=get_result($VLdtDatos,$i,"u.".$VLQryCampo3);

		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='5%'><a href='usrusuario.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&txt_Camp2=".$VTCampo2."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo3."</font></strong></a></td>";
			$VTTablaLista.="<td width='25%'><a href='usrusuario.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&txt_Camp2=".$VTCampo2."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo8." ".$VTCampo9."</font></strong></a></td>";
			$VTTablaLista.="<td width='70%'><a href='usrusuario.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&txt_Camp2=".$VTCampo2."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo10."</font></strong></a></td>";
			//$VTTablaLista.="<td width='44%'><a href='familia.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&nlctv=".$VLAnoLocal."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo4."</font></strong></a></td>";
		  $VTTablaLista.="</tr>";

		}
	} else {

		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='5%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='25%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='70%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			//$VTTablaLista.="<td width='44%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
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
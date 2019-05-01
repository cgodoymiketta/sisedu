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
					<option value="<?php echo $VLtxtCampo3; ?>"><?php echo $VLtxtCampo3; ?>
					<option value="<?php echo $VLtxtCampo4; ?>"><?php echo $VLtxtCampo4; ?>					
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
///////////////// CONSULTAMOS LAS PERSONAS QUE SON DOCENTES//////		
		$Vtquery = $VLQry1;

	if ( $VLConsultar!="")
	{
		switch ($VLdtCriterio) {
		case $VLtxtCampo2:
			$Vtquery .= " and p.".$VLQryCampo2." like '%".$VLdtConsultar."%' ";
			break 1; 
		case $VLtxtCampo3:
			$Vtquery .= " and p.".$VLQryCampo3." like '%".$VLdtConsultar."%' ";
			break 1; 
		case $VLtxtCampo4:
			$Vtquery .= " and p.".$VLQryCampo4." like '%".$VLdtConsultar."%' ";
			break 1; 
		case $VLtxtCampo5:
			$Vtquery .= " and p.".$VLQryCampo5." like '%".$VLdtConsultar."%' ";
			break 1; 
		default: 
		}
	}
	$Vtquery .=$VLQry2;
		
		
		
		$VTTablaLista="<table border='1'>";
		/* Determinamos las columnas que va a tener la tabla */
		
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
		$VLnuDatos = total_records($VLdtDatos);
		//$VLnuDatos=0;
			    $VTTablaLista.="<tr>";
					$VTTablaLista.="<td width='50' align='center' ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo1."</font></strong></td>";
				
				$VTTablaLista.="<td width='200' align='center' ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo2." y ".$VLtxtCampo3."</font></strong></td>";
				$VTTablaLista.="<td width='150' align='center'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo4."  # </font></strong></td>";
				$VTTablaLista.="<td width='100' align='center'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo6."</font></strong></td>";
				$VTTablaLista.="<td width='200' align='center' ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo7." </font></strong></td>";
				$VTTablaLista.="</tr>";
		if ( $VLnuDatos>0 )
		{
			for ( $i=0; $i< $VLnuDatos; $i++  )
			{
				$VTCampo1=get_result($VLdtDatos,$i,"p.".$VLQryCampo1);
				$VTCampo2=get_result($VLdtDatos,$i,"p.".$VLQryCampo2);
				$VTCampo3=get_result($VLdtDatos,$i,"p.".$VLQryCampo3);
				$VTCampo4=get_result($VLdtDatos,$i,"p.".$VLQryCampo4);
				$VTCampo5=get_result($VLdtDatos,$i,"p.".$VLQryCampo5);
				$VTCampo6=get_result($VLdtDatos,$i,"p.".$VLQryCampo6);
				$VTCampo7=get_result($VLdtDatos,$i,"p.".$VLQryCampo7);
				$VTCampo8=get_result($VLdtDatos,$i,"p.".$VLQryCampo8);
				$VTCampo9=get_result($VLdtDatos,$i,"d.".$VLQryCampo9);
			    $VTTablaLista.="<tr>";
			    $VTTablaLista.="<tr>";
					$VTTablaLista.="<td width='50' ><font face='Times New Roman, Times, serif' size='2' color='#000000' ><a  href='secdocentemateriacurso.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&txt_Camp9=".$VTCampo9."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_blank >".$VTCampo1."</a></font></strong></td>";
				
				$VTTablaLista.="<td width='200' ><font face='Times New Roman, Times, serif' size='2' color='#000000' ><a  href='secdocentemateriacurso.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&txt_Camp9=".$VTCampo9."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_blank >".$VTCampo2." ".$VTCampo3."</a></font></strong></td>";
				$VTTablaLista.="<td width='150'><font face='Times New Roman, Times, serif' size='2' color='#000000' ><a  href='secdocentemateriacurso.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&txt_Camp9=".$VTCampo9."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_blank >".$VTCampo5."</a> </font></strong></td>";
				$VTTablaLista.="<td width='100'><font face='Times New Roman, Times, serif' size='2' color='#000000' ><a  href='secdocentemateriacurso.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&txt_Camp9=".$VTCampo9."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_blank >".$VTCampo6."</a> </font></strong></td>";
				$VTTablaLista.="<td width='200'><font face='Times New Roman, Times, serif' size='2' color='#000000' ><a  href='secdocentemateriacurso.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&txt_Camp9=".$VTCampo9."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_blank >".$VTCampo7."</a> </font></strong></td>";
				$VTTablaLista.="</tr>";
				
			}
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
		<? //=$Vtquery; ?>
		</td>
	</tr>		
</table>
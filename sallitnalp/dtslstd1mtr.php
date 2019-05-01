<table width="100%" border="0">
 <tr>
	<td width="12%">
		<fieldset>
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
					<option value="<?php echo $VLtxtCampo5; ?>"><?php echo $VLtxtCampo5; ?>
					<option value="<?php echo $VLtxtCampo6; ?>"><?php echo $VLtxtCampo6; ?>
					<option value="<?php echo $VLtxtCampo7; ?>"><?php echo $VLtxtCampo7; ?>
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
			$VTTablaLista.="<td width='5%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo1."</font></strong></td>";
			$VTTablaLista.="<td width='47%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo2."</font></strong></td>";
			$VTTablaLista.="<td width='9%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo3."</font></strong></td>";
			$VTTablaLista.="<td width='10%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo4."</font></strong></td>";
			$VTTablaLista.="<td width='15%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo7."</font></strong></td>";
			$VTTablaLista.="<td width='14%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo9."</font></strong></td>";
		  $VTTablaLista.="</tr>";
 
	if ( $VLConsultar!="")
	{
		$Vtquery= $VLQry6." ".$VLQry13;
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
		case $VLtxtCampo5:
			$Vtquery .=" ".$VLQryCampo5." like '%".$VLdtConsultar."%'";
			break 1; 
		case $VLtxtCampo6:
			$Vtquery .=" ".$VLQryCampo6." like '%".$VLdtConsultar."%'";
			break 1; 
		case $VLtxtCampo7:
			$Vtquery .=" f.".$VLQryCampo7_2." like '%".$VLdtConsultar."%'";
			break 1; 
		default: 
		}
		//echo $Vtquery.",,".$VLdtCriterio;
	} else {
		$Vtquery = $VLQry6." where m.famcodigo=f.famcodigo ";
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
			$VTCampo6=get_result($VLdtDatos,$i,$VLQryCampo6);
			$VTCampo7=get_result($VLdtDatos,$i,$VLQryCampo7);
			$VTCampo9=get_result($VLdtDatos,$i,$VLQryCampo9);
			switch ($VTCampo9) {
			case "1":
				$VTCampo9="Cuantitativa";
				break 1; 
			case "2":
				$VTCampo9="Cualitativa";
				break 1; 
			case "3":
				$VTCampo9="Comportamiento";
				break 1; 
			case "4":
				$VTCampo9="Asistencia";
				break 1; 
			case "5":
				$VTCampo9="Funcionario";
				break 1; 
			}
			$Vtquery2 = $VLQry12." ".$VLQry9." ".$VLQryCampo7."=".$VTCampo7;
			$VLdtDatos2 = execute_query($Vtquery2,$VLConexion);
			$VLnuDatos2 = total_records($VLdtDatos2);
			if ($VLnuDatos2>0)
			{
				$VTCampo7=get_result($VLdtDatos2,0,$VLQryCampo7_2);
			}

		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='5%'><a href='materia.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&nsttcn=".$VLInstitucion."&nlctv=".$VLAnoLocal."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo1."</font></strong></a></td>";
			$VTTablaLista.="<td width='47%'><a href='materia.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&nsttcn=".$VLInstitucion."&nlctv=".$VLAnoLocal."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo2."</font></strong></a></td>";
			$VTTablaLista.="<td width='9%'><a href='materia.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&nsttcn=".$VLInstitucion."&nlctv=".$VLAnoLocal."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo3."</font></strong></a></td>";
			$VTTablaLista.="<td width='10%'><a href='materia.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&nsttcn=".$VLInstitucion."&nlctv=".$VLAnoLocal."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo4."</font></strong></a></td>";
			$VTTablaLista.="<td width='15%'><a href='materia.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&nsttcn=".$VLInstitucion."&nlctv=".$VLAnoLocal."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo7."</font></strong></a></td>";
			$VTTablaLista.="<td width='14%'><a href='materia.php?vlccn=modificar&txt_Camp1=".$VTCampo1."&nsttcn=".$VLInstitucion."&nlctv=".$VLAnoLocal."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo9."</font></strong></a></td>";
		  $VTTablaLista.="</tr>";
 
		}
	} else {
	

		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='5%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='47%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$Vtquery."&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='9%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='10%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='15%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='14%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
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
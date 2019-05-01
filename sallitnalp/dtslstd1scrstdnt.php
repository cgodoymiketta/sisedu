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
					<option value="<?php echo $VLtxtCampo2; ?>"><?php echo $VLtxtCampo2." o ".$VLtxtCampo3; ?>
					<option value="<?php echo $VLtxtCampo3; ?>"><?php echo $VLtxtCampo3; ?>
					<option value="<?php echo $VLtxtCampo4; ?>"><?php echo $VLtxtCampo4; ?>
					<option value="<?php echo $VLtxtCampo5; ?>"><?php echo $VLtxtCampo5; ?>
					<option value="<?php echo $VLtxtCampo6; ?>"><?php echo $VLtxtCampo6; ?>
					<option value="<?php echo $VLtxtCampo7; ?>"><?php echo $VLtxtCampo7; ?>
					<option value="<?php echo $VLtxtCampo8; ?>"><?php echo $VLtxtCampo8; ?>
					<option value="<?php echo $VLtxtCampo9; ?>"><?php echo $VLtxtCampo9; ?>
					<option value="<?php echo $VLtxtCampo30; ?>"><?php echo $VLtxtCampo30; ?>
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
			$VTTablaLista.="<td width='5%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo1."</font></strong></td>";
			$VTTablaLista.="<td width='35%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo2." y ".$VLtxtCampo3."</font></strong></td>";
			$VTTablaLista.="<td width='10%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo4."</font></strong></td>";
			$VTTablaLista.="<td width='10%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo5."</font></strong></td>";
			$VTTablaLista.="<td width='10%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo6."</font></strong></td>";
			$VTTablaLista.="<td width='30%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo9."</font></strong></td>";
		  $VTTablaLista.="</tr>";

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// MODIFICAR ESTA CONSULTA PARA QUE SALGAN SOLO LOS ESTUDIANTES
		$Vtquery= $VLQry1;	
	if ( $VLConsultar!="")
	{
		$Vtquery.= $VLQry2." ( ";
		switch ($VLdtCriterio) {
		case $VLtxtCampo2:
			$Vtquery .=" p.".$VLQryCampo2." like '%".$VLdtConsultar."%' or p.".$VLQryCampo3." like '%".$VLdtConsultar."%' ";
			break 1; 
		case $VLtxtCampo3:
			$Vtquery .=" p.".$VLQryCampo3." like '%".$VLdtConsultar."%' ";
			break 1; 
		case $VLtxtCampo4:
			$Vtquery .=" p.".$VLQryCampo4." like '%".$VLdtConsultar."%' ";
			break 1; 
		case $VLtxtCampo5:
			$Vtquery .=" p.".$VLQryCampo5." like '%".$VLdtConsultar."%' ";
			break 1; 
		case $VLtxtCampo6:
			$Vtquery .=" p.".$VLQryCampo6." like '%".$VLdtConsultar."%' ";
			break 1; 
		case $VLtxtCampo7:
			$Vtquery .=" p.".$VLQryCampo7." like '%".$VLdtConsultar."%' ";
			break 1; 
		case $VLtxtCampo8:
			$Vtquery .=" p.".$VLQryCampo8." like '%".$VLdtConsultar."%' ";
			break 1; 
		case $VLtxtCampo9:
			$Vtquery .=" p.".$VLQryCampo9." like '%".$VLdtConsultar."%' ";
			break 1; 
		case $VLtxtCampo30:
			$Vtquery .=" p.".$VLQryCampo30." like '%".$VLdtConsultar."%'";
			break 1; 
		default: 
		}
		$Vtquery.= " ) ";
	} else {
		$Vtquery = $VLQry1;
	}
	$Vtquery.= $VLQry4;
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos && $i<10; $i++  )
		{
			
			$VTCampo1=get_result($VLdtDatos,$i,"p.".$VLQryCampo1);
			$VTCampo2=get_result($VLdtDatos,$i,"p.".$VLQryCampo2);
			$VTCampo3=get_result($VLdtDatos,$i,"p.".$VLQryCampo3);
			$VTCampo4=get_result($VLdtDatos,$i,"p.".$VLQryCampo4);
			$VTCampo5=get_result($VLdtDatos,$i,"p.".$VLQryCampo5);
			if ($VTCampo5=="Masculino"){ $VTCampo5="Masculino"; } else { $VTCampo5="Femenino"; }
			$VTCampo6=get_result($VLdtDatos,$i,"p.".$VLQryCampo6);
			$fecha1=strtotime($VTCampo6);
			$VTCampo6=date("Y/m/d",$fecha1);
			$VTCampo9=get_result($VLdtDatos,$i,"p.".$VLQryCampo9);

			
		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='5%'><a href='estudiante.php?vlccn=cargar&txt_Camp1=".$VTCampo1."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo1."</font></strong></a></td>";
			$VTTablaLista.="<td width='35%'><a href='estudiante.php?vlccn=cargar&txt_Camp1=".$VTCampo1."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo2." ".$VTCampo3."</font></strong></a></td>";
			$VTTablaLista.="<td width='10%'><a href='estudiante.php?vlccn=cargar&txt_Camp1=".$VTCampo1."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo4."</font></strong></a></td>";
			$VTTablaLista.="<td width='10%'><a href='estudiante.php?vlccn=cargar&txt_Camp1=".$VTCampo1."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo5."</font></strong></a></td>";
			$VTTablaLista.="<td width='10%'><a href='estudiante.php?vlccn=cargar&txt_Camp1=".$VTCampo1."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo6."</font></strong></a></td>";
			$VTTablaLista.="<td width='30%'><a href='estudiante.php?vlccn=cargar&txt_Camp1=".$VTCampo1."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo9."</font></strong></a></td>";
		  $VTTablaLista.="</tr>";
		}
	} else {

		  $VTTablaLista.="<tr>";
			$VTTablaLista.="<td width='5%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='35%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='10%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='10%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='10%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
			$VTTablaLista.="<td width='30%'><font face='Times New Roman, Times, serif' size='2' color='#000000' >&nbsp;</font></strong></td>";
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
    <tr><td> <?=$Vtquery; ?></td></tr>		
</table>
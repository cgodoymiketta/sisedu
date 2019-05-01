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

		$Vtquery = $VLQry6.$VLQry9; 	////// CONSULTAMOS LA ESPECIALIDAD
		$Vtquery2 = $VLQry10;			////// COSNULTAMOS EL CURSO
		$Vtquery3 = $VLQry8.$VLQry9;	////// EL GRUPO

	if ( $VLConsultar!="")
	{
		
		switch ($VLdtCriterio) {
		case $VLtxtCampo1:
			$Vtquery .= $VLQryCampo1." like '%".$VLdtConsultar."%' ";
			$Vtquery .= " and ";
			$Vtquery3 .= " ".$VLQryCampo1." like '%".$VLdtConsultar."%' and ";
			break 1; 
		case $VLtxtCampo2:
			$Vtquery .= $VLQryCampo2." like '%".$VLdtConsultar."%' ";
			$Vtquery .= " and ";
			break 1; 
		case $VLtxtCampo3:
			$Vtquery .= $VLQryCampo3." like '%".$VLdtConsultar."%' ";
			$Vtquery .= " and ";
			break 1; 
		case $VLtxtCampo4:
			$Vtquery2 .= $VLQry9.$VLQryCampo4." like '%".$VLdtConsultar."%' ";
			$Vtquery3 .= $VLQryCampo4." like '%".$VLdtConsultar."%' and ";
			break 1; 
		case $VLtxtCampo5:
			$Vtquery2 .= $VLQry9." ".$VLQryCampo5." like '%".$VLdtConsultar."%' ";
			break 1; 
		default: 
		}
	}
	
		$Vtquery .= $VLQryCampo1." in (";
		$Vtquery .= " select ".$VLQryCampo1." from ";
		$Vtquery .= $VLQry12.$VLQry9.$VLQryCampo10."=1 ".$VLQry5." ";
		$Vtquery .= $VLQry7;
		$Vtquery2 .= $VLQry11;
		
		$Vtquery3 .= $VLQryCampo7."=".$VLAnoLocal;
		$Vtquery3 .= " and ".$VLQryCampo10."=1";
		
		
		
		$VTTablaLista="<table border='1'>";
		  $VTTablaLista.="<tr>";
				$VTTablaLista.="<td width='150' ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".utf8_encode($VLtxtCampo5)."</font></strong></td>";
		/* Determinamos las columnas que va a tener la tabla */
		
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
		$VLnuDatos = total_records($VLdtDatos);

		$VLdtDatos2 = execute_query($Vtquery2,$VLConexion);
		$VLnuDatos2 = total_records($VLdtDatos2);

		$VLdtDatos3 = execute_query($Vtquery3,$VLConexion);
		$VLnuDatos3 = total_records($VLdtDatos3);
		
		if ( $VLnuDatos>0 )
		{
			for ( $i=0; $i< $VLnuDatos; $i++  )
			{
				$VTCampo1=get_result($VLdtDatos,$i,$VLQryCampo1);
				$VTCampo3=get_result($VLdtDatos,$i,$VLQryCampo3);
				$VTTablaLista.="<td width='80' ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".utf8_encode($VTCampo3)."</font></strong></td>";
			}
		}
		  $VTTablaLista.="</tr>";
		  
		if ( $VLnuDatos2>0 )
		{
			for ( $j=0; $j< $VLnuDatos2; $j++  )
			{
				$VTTablaLista.="<tr>";
				$VTCampo5=get_result($VLdtDatos2,$j,$VLQryCampo5);
				$VTCampo4=get_result($VLdtDatos2,$j,$VLQryCampo4);
				$VTTablaLista.="<td width='150'><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo5."</font></strong></td>";

				if ( $VLnuDatos>0 )
				{
					for ( $i=0; $i< $VLnuDatos; $i++  )
					{
							$VTCampo1=get_result($VLdtDatos,$i,$VLQryCampo1);
							
						if ($VLnuDatos3==0)
						{
							$VTTablaLista.="<td width='80' ><font face='Times New Roman, Times, serif' size='2' color='#000000' ><img src='imagenes/blog-post-delete_16x16-32.gif' alt='Si' width='16' height='16' border='0'></font></strong></td>";
						}else{
							$activo="no";
							for($k=0; $k< $VLnuDatos3; $k++ )
							{
								
								$VTCampo1a=get_result($VLdtDatos3,$k,$VLQryCampo1);
								$VTCampo4a=get_result($VLdtDatos3,$k,$VLQryCampo4);
								$VTCampo10=get_result($VLdtDatos3,$k,$VLQryCampo10);
								$VTCampo15=get_result($VLdtDatos3,$k,$VLQryCampo15);
								if ($VTCampo1==$VTCampo1a && $VTCampo4==$VTCampo4a)
								{
									if ($VTCampo10==0)
									{ $activo="no"; } else { $activo="si"; }
									$k= $VLnuDatos3;
								} else{
									$activo="no";
								}
							}
							
							if ($activo=="no")
							{
								$VTTablaLista.="<td width='80' ><font face='Times New Roman, Times, serif' size='2' color='#000000' ><img src='imagenes/blog-post-delete_16x16-32.gif' alt='Si' width='16' height='16' border='0'></font></strong></td>";
							} else {
								
							$Vtquery4=" Select p.pardescripcion, p.parorden, p.parcodigo ";
							$Vtquery4.=" from prll p, grpprll gp, grp g ";
							$Vtquery4.=" where p.parcodigo=gp.parcodigo and gp.grucodigo=g.grucodigo  ";
							$Vtquery4.=" and  g.curcodigo= ".$VTCampo4." and g.espcodigo=".$VTCampo1;
							$Vtquery4.=" and  g.anocodigo=".$VLAnoLocal;
							$Vtquery4.=" and  p.inscodigo=".$VLInstitucion;
							$Vtquery4.=" order by p.parorden";
							
							$VLdtDatos4 = execute_query($Vtquery4,$VLConexion);
							$VLnuDatos4 = total_records($VLdtDatos4);
							
								
								$VTTablaLista.="<td width='180' >";
								if($VLnuDatos4>0)
								{
									$VTTablaLista.="<table border='0'><tr>";
									for($y=0; $y<$VLnuDatos4; $y++)
									{
										$VTCampo19=get_result($VLdtDatos4,$y,"p.".$VLQryCampo19);
										$VTCampo20=get_result($VLdtDatos4,$y,"p.".$VLQryCampo20);
										$VTCampo21=get_result($VLdtDatos4,$y,"p.".$VLQryCampo21);
										$VTTablaLista.="<td width='100' align='center'><a href='represquimestral.php?vlccn=reportes&txt_Camp1=".$VTCampo1."&nlctv=".$VLAnoLocal."&nsttcn=".$VLInstitucion."&sr=".$VLUsuario."&txt_Camp4=".$VTCampo4."&txt_Camp15=".$VTCampo15."&txt_Camp19=".$VTCampo19."&txt_Camp8=".$VTCampo19."&critero2=Asignadas&consultar2.x=20&consultar2.y=15' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".utf8_encode($VTCampo20)."</font></strong></a></td>";
									}
									$VTTablaLista.="</tr></table>";
									
								}else {
									$VTTablaLista.="&nbsp;";
								}
								
								$VTTablaLista.="</td>";
							}
						}
					}
				}
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
		
		</td>
	</tr>		
</table>
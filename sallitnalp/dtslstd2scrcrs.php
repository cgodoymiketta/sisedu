<table width="100%" border="0">
	<?php 
		if ($VLNuevo != "")
		{  // si es nuevo inicio
			$VLQuery= "Select ".$VLQryCampo1.",".$VLQryCampo2;
			$VLQuery.= " from ".$VLQry13;
			$VLQuery.= $VLQry9.$VLQryCampo1." not in( select ";
			$VLQuery.= $VLQryCampo1." from ".$VLQry12;
			$VLQuery.= " where ".$VLQryCampo7."=".$VLAnoLocal;
			$VLQuery.= " and ".$VLQryCampo10."=1" ;
			$VLQuery.= " ) order by  ".$VLQryCampo2; 
			//echo $VLQuery;
			$VLdtDatos = execute_query($VLQuery,$VLConexion);
			$VLnuDatos = total_records($VLdtDatos);
	?>
		
 	<tr>
		<td >
			<table width="100%" border="0">
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><?=$VLtxtCampo2; ?>:</td>
					<td>
						<select name="critero">
						<?php 
							if ($VLnuDatos<1)
							{
						?>
							<option value="nada">Nada
						<?php } else {
								for ( $i=0; $i<$VLnuDatos; $i++)
								{
									$VTCampo1=get_result($VLdtDatos,$i,$VLQryCampo1);
									$VTCampo2=get_result($VLdtDatos,$i,$VLQryCampo2);
						?>
							<option value="<?php echo $VTCampo1; ?>"><?php echo $VTCampo2; ?>
						<?php 	}
							} ?>					
						</select>
					</td>
					<td><input name="consultarnuevo" type="image" id="consultarnuevo" onClick="sumit" src="imagenes/0025-searchx24.gif" alt="consultarnuevo" width="24" height="24" border="0" value="consultarnuevo"></td>
					<td>&nbsp;</td>
				  </tr>
			</table>	
		</td>
	</tr>

	<?php 

		} // si es nuevo final 
		else { // si no es nuevo inicio
	
	?>
 	<tr>
		<td >
			<table width="100%" border="0">
				  <tr>
					<td><?=$VLtxtCampo1; ?>:</td>
					<td><input name="txt_Camp1" type="text" id="txt_Camp1" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp1; ?>"></td>
					<td><?=$VLtxtCampo2; ?>:</td>
					<td><input name="txt_Camp2" type="text" id="txt_Camp2" size="30" maxlength="45" readonly="1" value="<?=$VLdtCamp2; ?>"></td>
					<td><?=$VLtxtCampo3; ?>:</td>
					<td><input name="txt_Camp3" type="text" id="txt_Camp3" size="10" maxlength="9"  readonly="1" value="<?=$VLdtCamp3; ?>"></td>
				  </tr>
			</table>	
		</td>
	</tr>
	<tr>
		<td align="center">	
			<table width="50%" border="1">
			  <tr>
				<td width="20%"><?php echo $VLtxtCampo4; ?>&nbsp;</td>
				<td width="40%"><?php echo $VLtxtCampo5; ?>&nbsp;</td>
				<td width="20%"><?php echo $VLtxtCampo8; ?>&nbsp;</td>
				<td width="20%"><?php echo $VLtxtCampo9; ?>&nbsp;</td>
			  </tr>
			  <?php 
			  
				$Vtquery2 = $VLQry10;
				$Vtquery2 .= $VLQry11;
				$Vtquery3 = $VLQry8.$VLQry9." ".$VLQryCampo1."=".$VLdtCamp1;
				$Vtquery3 .= " and ".$VLQryCampo7."=".$VLAnoLocal;
				
		
				$VLdtDatos2 = execute_query($Vtquery2,$VLConexion);
				$VLnuDatos2 = total_records($VLdtDatos2);
		
				$VLdtDatos3 = execute_query($Vtquery3,$VLConexion);
				$VLnuDatos3 = total_records($VLdtDatos3);
		
			  	if ( $VLnuDatos2>0)
				{
					for ( $i=0; $i<$VLnuDatos2 ; $i++)
					{
						$VTCampo4=get_result($VLdtDatos2,$i,$VLQryCampo4);
						$VTCampo5=get_result($VLdtDatos2,$i,$VLQryCampo5);
						if ($VLnuDatos3>0)
						{
							$asignado="no";
							for ($k=0; $k<$VLnuDatos2 ; $k++)
							{
								$VTCampo4a=get_result($VLdtDatos3,$k,$VLQryCampo4);
								$VTCampo10=get_result($VLdtDatos3,$k,$VLQryCampo10);
								if ($VTCampo4==$VTCampo4a)
								{
									if ($VTCampo10 == 1)
									{
										$asignado="si";
										$VTCampo9a=get_result($VLdtDatos3,$k,$VLQryCampo9);
									} else {
										$asignado="no";
										$VTCampo9a=get_result($VLdtDatos3,$k,$VLQryCampo9);
									}
								}
							}
							if ($asignado=="si")
							{
							?>
							  <tr>
								<td width="20%"><font face="Times New Roman, Times, serif" size="2" color="#000000" ><?php echo $VTCampo4; ?><input type="hidden" name="hcodigo[]" value="<?=$VTCampo4; ?>"></font></strong></td>
								<td width="40%"><font face='Times New Roman, Times, serif' size='2' color='#000000' ><?php echo $VTCampo5; ?></font></strong></td>
								<td width="20%"><input type="checkbox" name="txt_Camp8[]" value="<?php echo $VTCampo4; ?>" checked ></td>
								<td width="20%"><input type="text" name="txt_Camp9[]" value="<?php echo $VTCampo9a; ?>"></td>
							  </tr>
							<?php				
							
							} else {
							?>
							  <tr>
								<td width="20%"><font face="Times New Roman, Times, serif" size="2" color="#000000" ><?php echo $VTCampo4; ?><input type="hidden" name="hcodigo[]" value="<?=$VTCampo4; ?>"></font></strong></td>
								<td width="40%"><font face='Times New Roman, Times, serif' size='2' color='#000000' ><?php echo $VTCampo5; ?></font></strong></td>
								<td width="20%"><input type="checkbox" name="txt_Camp8[]" value="<?php echo $VTCampo4; ?>"></td>
								<td width="20%"><input type="text" name="txt_Camp9[]" value="<?php echo $VLdtCamp9[$i]; ?>"></td>
							  </tr>
							<?php				
							
							}
							
						} else {
 			?>
			  <tr>
				<td width="20%"><font face="Times New Roman, Times, serif" size="2" color="#000000" ><?php echo $VTCampo4; ?><input type="hidden" name="hcodigo[]" value="<?=$VTCampo4; ?>"></font></strong></td>
				<td width="40%"><font face='Times New Roman, Times, serif' size='2' color='#000000' ><?php echo $VTCampo5; ?></font></strong></td>
				<td width="20%"><input type="checkbox" name="txt_Camp8[]" value="<?php echo $VTCampo4; ?>"></td>
				<td width="20%"><input type="text" name="txt_Camp9[]" value="<?php echo $VLdtCamp9[$i]; ?>"></td>
			  </tr>
			<?php				
						}
					}
				} else {
			  ?>
			  <tr>
				<td width="20%">&nbsp;</td>
				<td width="40%">&nbsp;</td>
				<td width="20%">&nbsp;</td>
				<td width="20%">&nbsp;</td>
			  </tr>
			<?php				
			}
			} // si no es nuevo final	
			  ?>
			  
			  
			</table>
		</td>
	</tr>		
</table>
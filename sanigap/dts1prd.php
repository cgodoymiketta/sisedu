
<table width="100%" border="0">
			  <tr>
				<td width="40%" align="right"><input name="ingresar" type="image" id="ingresar" onClick="sumit" src="imagenes/Regional%20Settings_48x48-32.gif" alt="Guardar" width="91" height="91" border="0" value="ingresar"><input type="hidden" name="nsttcn" value="<?php echo $VLInstitucion; ?>"><input type="hidden" name="sr" value="<?php echo $VLUsuario; ?>"></td>
				<td width="60%" >
				  <table width="70%" border="0">
				  <tr>
					<td width="50%" align="right"><?php echo $VLtxtCampo6; ?></td>
					<td width="50%" align="left">
                    
					  <select name="nlctv">
					  <?php 
						$Vtquery= $VLQry6.$VLQry8.$VLQryCampo7." =".$VLInstitucion;
						$Vtquery.= " ".$VLQry7;
						$VLdtDatos = execute_query($Vtquery,$VLConexion);
						$VLnuDatos = total_records($VLdtDatos);
						if ($VLnuDatos==0 )
						{
							echo "<option value='nada'>2011 - 2012</option>";
						} else
						{
							for ( $i=0; $i< $VLnuDatos; $i++  )
							{
								$VTCampo1=get_result($VLdtDatos,$i,$VLQryCampo1);
								$VTCampo2=get_result($VLdtDatos,$i,$VLQryCampo2);
								echo "<option value='".$VTCampo1."'>".$VTCampo2."</option>";
							}
						
						}
								
					?>
					    </select>
					    
					  </td>
				  </tr>
				  </table>
				</td>
			  </tr>
			</table>
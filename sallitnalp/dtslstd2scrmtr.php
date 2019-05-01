<table width="100%" border="0">
	<?php 
		if ($VLNuevo != "")
		{  // si es nuevo inicio 
		   // se recuperan los Grupos activos
			$VLQuery= $VLQry19;
			$VLQuery.= $VLQry22.$VLQryCampo7."=".$VLAnoLocal;
			$VLQuery.= $VLQry22." not ".$VLQryCampo15. " in ";
			$VLQuery.= $VLQry23;
			$VLQuery.= $VLQry22.$VLQryCampo10;
			$VLQuery.= "=1".$VLQry20;
			
			
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
									$VTCampo2=get_result($VLdtDatos,$i,$VLQryCampo2);
									$VTCampo5=get_result($VLdtDatos,$i,$VLQryCampo5);
									$VTCampo15=get_result($VLdtDatos,$i,$VLQryCampo15);
									
						?>
							<option value="<?php echo $VTCampo15; ?>"><?php echo $VTCampo5; ?> de <?php echo $VTCampo2; ?>
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

					<td><input name="txt_Camp1" type="hidden" id="txt_Camp1" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp1; ?>"><?=$VLtxtCampo2; ?>:</td>
					<td><input name="txt_Camp2" type="text" id="txt_Camp2" size="30" maxlength="45" readonly="1" value="<?=$VLdtCamp2; ?>"></td>
					<td><input name="txt_Camp4" type="hidden" id="txt_Camp4" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp4; ?>"><?=$VLtxtCampo5; ?>:</td>
					<td><input name="txt_Camp5" type="text" id="txt_Camp5" size="10" maxlength="9"  readonly="1" value="<?=$VLdtCamp5; ?>"></td>					
					<td><input name="txt_Camp15" type="hidden" id="txt_Camp15" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp15; ?>"><?=$VLtxtCampo12; ?>:</td>
					<td>
						<select name="critero2">
							<option value="Asignadas">Asignadas
			  <?php 
			  //	Familias
				$Vtqueryf = $VLQry14;
				$VLdtDatosf = execute_query($Vtqueryf,$VLConexion);
				$VLnuDatosf = total_records($VLdtDatosf);
			  	if ( $VLnuDatosf<1 )
				{ 
				// si no existen Familias

			  } else 
			  {
			  	for ( $i=0; $i<$VLnuDatosf; $i++)
				{
					$VTCampo11=get_result($VLdtDatosf,$i,$VLQryCampo11);
					$VTCampo12=get_result($VLdtDatosf,$i,$VLQryCampo12);
					if ($VLdtCriterio2==$VTCampo11)
					{
			   ?>
					<option value="<?php echo $VTCampo11; ?>" selected><?php echo $VTCampo12; ?>
			   <?php 
			   		} else {
				 ?>
					<option value="<?php echo $VTCampo11; ?>"><?php echo $VTCampo12; ?>
				 <?php	
					}
			   	}
			  }
			   ?>
						</select>
					<td>&nbsp;</td>
					<td><input name="consultar2" type="image" id="consultar2" onClick="sumit" src="imagenes/0025-searchx24.gif" alt="consultar2" width="24" height="24" border="0" value="consultar2">&nbsp;</td>
				  </tr>
			</table>	
		</td>
	</tr>
	<tr>
		<td align="center">	
			<table  border="0">
			  <tr>
			  <?php 
			  //	recuperamos las materias
				$Vtquerym = $VLQry15;
				$Vtqueryg = $VLQry18." and ".$VLQryCampo15."=".$VLdtCamp15;
				$Vtqueryg .= " and ".$VLQryCampo16."=1";
				if ($VLConsultar2!="" || $VLdtCriterio2!="" )
				{
					if ($VLdtCriterio2 != "Asignadas")
					{
						$Vtquerym .= $VLQry9.$VLQryCampo11."=".$VLdtCriterio2;
					} else
					{
						$Vtquerym .= $VLQry9.$VLQryCampo13." in (";
						$Vtquerym .= $VLQry24.$VLQry9.$VLQryCampo16."=1".$VLQry22 ;
						$Vtquerym .= $VLQryCampo15."=".$VLdtCamp15.$VLQry5;
					}
				}
				
				$Vtquerym .= $VLQry16;
				$VLdtDatosm = execute_query($Vtquerym,$VLConexion);
				$VLnuDatosm = total_records($VLdtDatosm);
				$VLdtDatosg = execute_query($Vtqueryg,$VLConexion);
				$VLnuDatosg = total_records($VLdtDatosg);
				
			  	if ( $VLnuDatosm<1 )
				{ 
				
				} else {
				$j=0;
			  	for ( $i=0; $i<$VLnuDatosm; $i++)
				{
					$VTCampo13=get_result($VLdtDatosm,$i,$VLQryCampo13);
					$VTCampo14=get_result($VLdtDatosm,$i,$VLQryCampo14);
					$seleccion= " ";
					
					if ( $VLnuDatosg > 0 )
					{
						for ($k=0; $k<$VLnuDatosg; $k++)
						{
							$VTCampo13_existente=get_result($VLdtDatosg,$k,$VLQryCampo13);
							if ($VTCampo13_existente==$VTCampo13)
							{
								$seleccion=" checked ";
							}
						}
					}
					if ($VLdtCriterio2 != "Asignadas") // Para el caso de seleccionar una familia
					{
						if ($j==3)
						{
						 ?>
						</tr> 
						<tr>
						<td><input type="checkbox" name="txt_Camp13[]" value="<?php echo $VTCampo13; ?>" <?php echo $seleccion; ?> ><?php echo $VTCampo14; ?>&nbsp;</td>
						 <?php 		
						 $j=0;
						}else
						{
						 ?>
						<td><input type="checkbox" name="txt_Camp13[]" value="<?php echo $VTCampo13; ?>" <?php echo $seleccion; ?> ><?php echo $VTCampo14; ?>&nbsp;</td>
						 <?php 
						}
						$j++;		
					} else { // se visualizan todas las asignadas a ese distributivo
						if ($seleccion==" checked ") // solo se grafican las seleccionadas
						{
							if ($j==3)
							{
								 ?>
								</tr> 
								<tr>
								<td><input type="checkbox" name="txt_Camp13[]" value="<?php echo $VTCampo13; ?>" <?php echo $seleccion; ?> ><?php echo $VTCampo14; ?>&nbsp;</td>
								 <?php 		
								 $j=0;
							}else
							{
								 ?>
								<td><input type="checkbox" name="txt_Camp13[]" value="<?php echo $VTCampo13; ?>" <?php echo $seleccion; ?> ><?php echo $VTCampo14; ?>&nbsp;</td>
								 <?php 
							}
							$j++;
							
						}
					}
			   	}
			  }
			   ?>
			   </tr>
			</table>
		</td>
	</tr>
<?php } ?>			
</table>
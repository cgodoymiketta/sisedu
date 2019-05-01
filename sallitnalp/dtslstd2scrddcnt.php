<table width="100%" border="0">
	<?php 
		if ($VLNuevo != "")
		{  // si es nuevo inicio
			$VLQuery= $VLQry19;
			$VLQuery.= " and ".$VLQryCampo10;
			$VLQuery.= "=1".$VLQry20;
			
			//echo $VLQuery;
			//$VLdtDatos = execute_query($VLQuery,$VLConexion);
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

					<td><input name="txt_Camp9" type="hidden" id="txt_Camp9" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp9; ?>"></td>
					<td><input name="txt_Camp2" type="text" id="txt_Camp2" size="50" maxlength="60" readonly="1" value="<?=$VLdtCamp2." ".$VLdtCamp3; ?>"></td>
					<td><input name="txt_Camp1" type="hidden" id="txt_Camp1" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp1; ?>"></td>
					<td>&nbsp;</td>					
					<td><input name="txt_Camp15" type="hidden" id="txt_Camp15" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp15; ?>"><?=$VLtxtCampo11; ?>:</td>
					<td>
						<select name="critero2">
							<option value="Asignadas" <?php if ($VLdtCriterio2 == "Asignadas"){ ?> selected="selected" <?php } ?>  >Asignadas
			  <?php 
			  //	Familias
				$Vtqueryf = $VLQry3;
				$VLdtDatosf = execute_query($Vtqueryf,$VLConexion);
				$VLnuDatosf = total_records($VLdtDatosf);
			  	if ( $VLnuDatosf<1 )
				{ 
				// si no existen Familias

			  } else 
			  {
			  	for ( $i=0; $i<$VLnuDatosf; $i++)
				{
					$VTCampo10=get_result($VLdtDatosf,$i,$VLQryCampo10);
					$VTCampo11=get_result($VLdtDatosf,$i,$VLQryCampo11);
					if ($VLdtCriterio2==$VTCampo10)
					{
			   ?>
					<option value="<?php echo $VTCampo10; ?>" selected><?php echo $VTCampo11; ?>
			   <?php 
			   		} else {
				 ?>
					<option value="<?php echo $VTCampo10; ?>"><?php echo $VTCampo11; ?>
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
			<table  border="1">
              <tr>
              	<td width="500"> MATERIA</td>
              	<td width="200"> FAMILIA </td>
              </tr>
			  <?php 
			  if ($VLdtCriterio2 == "")
			  {}else
			  {
			  //	familias y materias
				if ($VLdtCriterio2 == "Asignadas")
				{
////////////////////////////  SOLO SE VISUALIZAN LAS QUE TENGA ASIGNADAS
					$Vtqueryfm =$VLQry6." and ".$VLQryCampo15."=1 ".$VLQry7;
				} else {
///////////////////////////   SE VISUALIZAN TODAS LAS MATERIAS DE LA FAMILIA
					$Vtqueryfm = $VLQry4." and f.".$VLQryCampo10."=".$VLdtCriterio2.$VLQry7;
					
				}
				
/////////////////////  SE RECUPERA LAS MATERIAS ASIGNADAS EN ESTA FAMILIA PARA VALIDAR ///////////
				$Vtqueryma =$VLQry6." and d.".$VLQryCampo15."=1";
				if ($VLdtCriterio2 != "Asignadas")
				{
					$Vtqueryma.=" and f.".$VLQryCampo10."=".$VLdtCriterio2;
					
				}
				$Vtqueryma.=$VLQry7;
				$VLdtDatosma = execute_query($Vtqueryma,$VLConexion);
				$VLnuDatosma = total_records($VLdtDatosma);
				
///////////////////////  CONSULTAMOS LAS MATERIAS PARA VISUALIZARLAS								
				
				$VLdtDatosfm = execute_query($Vtqueryfm,$VLConexion);
				$VLnuDatosfm = total_records($VLdtDatosfm);
			  	if ( $VLnuDatosfm>0 )
			  	{
					for ( $i=0; $i<$VLnuDatosfm; $i++)
					{
						$seleccion="0";
						$VTCampo10=get_result($VLdtDatosfm,$i,"f.".$VLQryCampo10);
						$VTCampo11=get_result($VLdtDatosfm,$i,"f.".$VLQryCampo11);
						$VTCampo12=get_result($VLdtDatosfm,$i,"m.".$VLQryCampo12);
						$VTCampo13=get_result($VLdtDatosfm,$i,"m.".$VLQryCampo13);
						$seleccion="";
////////////////////////   CONFIRMAMOS SI ESTA YA ASIGNADA //////////////////////
						for ($z=0; $z<$VLnuDatosma; $z++)
						{
							$VTCampo12_temp=get_result($VLdtDatosma,$z,"m.".$VLQryCampo12);
							if ($VTCampo12_temp==$VTCampo12)
							{
								$seleccion="1";
								$z=$VLnuDatosma;
							}
						}  
						
			  ?>
			  <tr>
              	<td ><input type="checkbox" name="txt_Camp12[]"  value="<?php echo $VTCampo12; ?>" <?php if ( $seleccion==1) {?> checked="checked" <? } ?> > <?php echo $VTCampo13; ?>&nbsp;</td>
                <td ><?=$VTCampo11; ?></td>
			  </tr>
			  <?php 
					}
				}
			  }
			  //	FIN DEL GRAFICO DE LA TABLA DE FAMILIAS Y MATERIAS 
			  ?> 
              <tr>
              	<td width="400"> </td>
              	<td width="300">  <? //=$Vtqueryma."/".$numero1."/".$VLnuDatosma."/".$VLnuDatosfm; ?></td>
              </tr>
			</table>
		</td>
	</tr>
<?php } ?>			
</table>
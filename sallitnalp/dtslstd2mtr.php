<table width="100%" border="0">
 <tr>
	<td ><fieldset  >
						<p>
						  <legend >Datos</legend>
						</p>
						<table width="100%" border="0">
						  <tr>
							<td width="50%"><table width="100%" border="0">
                              <tr>
                                <td width="35%"><?php echo $VLtxtCampo1; ?>:</td>
                                <td width="65%"><input name="txt_Camp1" type="text" id="txt_Camp1" size="11" maxlength="11"  readonly="1" value="<?=$VLdtCamp1; ?>"></td>
                              </tr>
                              <tr>
                                <td><?php echo $VLtxtCampo2; ?>:</td>
                                <td><input name="txt_Camp2" type="text" id="txt_Camp2" size="30" maxlength="45" value="<?=$VLdtCamp2; ?>"></td>
                              </tr>
                              <tr>
                                <td><?php echo $VLtxtCampo3; ?>: </td>
                                <td><input name="txt_Camp3" type="text" id="txt_Camp3" size="10" maxlength="9" value="<?=$VLdtCamp3; ?>"></td>
                              </tr>
                              <tr>
                                <td><?php echo $VLtxtCampo4; ?>: </td>
                                <td><input name="txt_Camp4" type="text" id="txt_Camp4" size="10" maxlength="9" value="<?=$VLdtCamp4; ?>"></td>
                              </tr>
                              <tr>
                                <td><?php echo $VLtxtCampo5; ?>: </td>
                                <td><input name="txt_Camp5" type="text" id="txt_Camp5" size="10" maxlength="9" value="<?=$VLdtCamp5; ?>"></td>
                              </tr>
                            </table>							
							</td>
							<td width="50%"><table width="100%" border="0">
                              <tr>
                                <td><table width="100%" border="0">
                              <tr>
                                <td width="30%"><?php echo $VLtxtCampo7; ?>:&nbsp;</td>
                                <td width="70%">
								
								<select name="txt_Camp7">
									<option value="NINGUNA">NINGUNA
<?php 
$Vtquery = $VLQry11 ;
//echo $Vtquery;
$VLdtDatos = execute_query($Vtquery,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if ( $VLnuDatos>0 )
{
	for ( $i=0; $i< $VLnuDatos; $i++  )
	{
		$VLdtCamp7_1=get_result($VLdtDatos,$i,$VLQryCampo7_1);
		$VLdtCamp7_2=get_result($VLdtDatos,$i,$VLQryCampo7_2);

	

?>
									<option  value="<?php echo $VLdtCamp7_1; ?>" 
									<?php 
if ( $VLdtCamp7 !="" && $VLdtCamp7==$VLdtCamp7_1) { ?> selected<?php	}?>><?php echo $VLdtCamp7_2; ?>
<? } }?>
								</select>&nbsp;
								</td>
                              </tr>
                              <tr>
                              	<td><?php echo $VLtxtCampo9; ?>:&nbsp;
                                
                                </td>
                              	<td>
                                <select name="txt_Camp9">
                                    <option  value="1" <?php if ($VLdtCamp9==1){ ?> selected <?php } ?> >Cuantitativa
                                    <option  value="2" <?php if ($VLdtCamp9==2){ ?> selected <?php } ?>>Cualitativa
                                    <option  value="3" <?php if ($VLdtCamp9==3){ ?> selected <?php } ?>>Comportamiento
                                    <option  value="4" <?php if ($VLdtCamp9==4){ ?> selected <?php } ?>>Asistencia
                                    <option  value="5" <?php if ($VLdtCamp9==5){ ?> selected <?php } ?>>Funcionario
								</select>                                
                                </td>
                              </tr>
                              <tr>
                                <td width="30%"><?php echo $VLtxtCampo6; ?>:&nbsp;</td>
                                <td width="70%"><textarea name="txt_Camp6" cols="35" rows="4" id="txt_Camp6"><?=$VLdtCamp6; ?></textarea>&nbsp;</td>
                              </tr>
                            </table></td>
                              </tr>
                            </table></td>
						  </tr>
						</table>

						</fieldset></td>
	</tr>		
</table>
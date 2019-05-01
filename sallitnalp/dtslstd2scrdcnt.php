<table width="100%" border="0">
 <tr>
	<td ><fieldset  >
						  <legend >Datos <? //=$Vtquerym." / ".$VLModificar." -- ".$Vtquery3;  ?></legend>
						<table width="100%" border="0">
						  <tr>
							<td width="50%" valign="top"><table width="100%" border="0">
                              <tr>
                                <td width="26%" align="right"><?php echo $VLtxtCampo1; ?>:</td>
                                <td width="74%"><input name="txt_Camp1" type="text" id="txt_Camp1" size="6" maxlength="5" readonly="1"  value="<?=$VLdtCamp1; ?>" ></td>
                              </tr>                            
                              <tr>
                                <td width="26%"  align="right" ><?php echo $VLtxtCampo2; ?>:</td>
                                <td width="74%"><input name="txt_Camp2" type="text" id="txt_Camp2" size="30" maxlength="45" value="<?=$VLdtCamp2; ?>"></td>
                              </tr>
                              <tr>
                                <td  align="right" ><?php echo $VLtxtCampo3; ?>: </td>
                                <td><input name="txt_Camp3" type="text" id="txt_Camp3" size="30" maxlength="45" value="<?=$VLdtCamp3; ?>">
                                </td>
                              </tr>
							  <tr>
                                <td><select name="txt_Camp6" >
									<option value="Cedula" <?php if ( utf8_encode($VLdtCamp6) == "Cédula") {?> selected <?php }?>>Cedula</option>
									<option  value="CarneRefugiado" <?php if ( $VLdtCamp6 == "CarneRefugiado") {?> selected <?php }?>>CarneRefugiado</option>
                                    <option value="Pasaporte" <?php if ( $VLdtCamp6 == "Pasaporte") {?> selected <?php }?>>Pasaporte</option>
                                    <option value="No tiene" <?php if ( $VLdtCamp6 == "No tiene") {?> selected <?php }?>>No tiene</option>
									</select></td>
                                <td><input name="txt_Camp4" type="text" id="txt_Camp4" size="30" maxlength="45" value="<?=$VLdtCamp4; ?>">
                                </td>
                              </tr>
							  <tr>
                                <td  align="right">
								<?php echo $VLtxtCampo5; ?>: </td>
                                <td>
                                    <select name="txt_Camp5">
                                    <option value="Masculino" <? if (strcmp(trim($VLdtCamp5), "Masculino") == 0){ ?>  selected="selected" <? } ?> >Masculino </option>
                                    <option  value="Femenino"<? if (strcmp(trim($VLdtCamp5),"Femenino") == 0) { ?> selected="selected"  <? } ?>>Femenino</option>
                                    </select>
                                </td>
                              </tr>                            
							  </table>							
							</td>
							<td width="50%"><table width="100%" border="0">
                              <tr>
                                <td width="26%"  align="right"><?php echo $VLtxtCampo7; ?>:</td>
                                <td width="74%"><input name="txt_Camp7" type="text" id="txt_Camp7" size="11" maxlength="11"  value="<?=$VLdtCamp7; ?>"></td>
                              </tr>
                              <tr>
                                <td  align="right"><?php echo $VLtxtCampo8; ?>:</td>
                                <td><input name="txt_Camp8" type="text" id="txt_Camp8" size="50" maxlength="53" value="<?=$VLdtCamp8; ?>"></td>
                              </tr>
                              <tr>
                                <td  align="right"><?php echo $VLtxtCampo9; ?>:</td>
                                <td><input name="txt_Camp9" type="text" id="txt_Camp9" size="50" maxlength="53" value="<?=$VLdtCamp9; ?>">
                                </td>
                              </tr>
							  </table></td>
						  </tr>
						</table>

						</fieldset></td>
	</tr>		
</table>
<table width="100%" border="0">
 <tr>
	<td ><fieldset  >
						<p><legend >Datos<?php echo $VtqueryP; ?></legend></p>
						<table width="100%" border="0">
						  <tr>
							<td width="65%"><table width="100%" border="0">
                              <tr>
                                <td width="40%"><?=$VLtxtCampo1; ?>:</td>
                                <td width="60%"><input name="txt_Camp1" type="text" id="txt_Camp1" size="11" maxlength="11"  readonly="1" value="<?=$VLdtCamp1; ?>"></td>
                              </tr>
                              <tr>
                                <td><?=$VLtxtCampo2; ?>:</td>
                                <td><input name="txt_Camp2" type="text" id="txt_Camp2" size="30" maxlength="45" value="<?=$VLdtCamp2; ?>"></td>
                              </tr>
                              <tr>
                                <td><?=$VLtxtCampo3; ?>: </td>
                                <td><input name="txt_Camp3" type="text" id="txt_Camp3" size="11" maxlength="10" value="<?=$VLdtCamp3; ?>"></td>
                              </tr>
                              <tr>
                                <td><?=$VLtxtCampo4; ?>: </td>
                                <td><input name="txt_Camp4" type="text" id="txt_Camp4" size="11" maxlength="10" value="<?=$VLdtCamp4; ?>"></td>
                              </tr>
                            </table>							
							</td>
							<td width="45%"><table width="100%" border="0">
                              <tr>
                                <td><?=$VLtxtCampo5; ?>:</td>
                              </tr>
                              <tr>
                                <td><textarea name="txt_Camp5" cols="42" rows="4" id="txt_Camp5"><?=$VLdtCamp5; ?></textarea></td>
                              </tr>
                            </table></td>
						  </tr>
						</table>

						</fieldset></td>
	</tr>		
</table>
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
                                <td width="26%"><?php echo $VLtxtCampo1; ?>:</td>
                                <td width="74%"><input name="txt_Camp1" type="text" id="txt_Camp1" size="11" maxlength="11"  readonly="1" value="<?=$VLdtCamp1; ?>"></td>
                              </tr>
                              <tr>
                                <td><?php echo $VLtxtCampo2; ?>:</td>
                                <td><input name="txt_Camp2" type="text" id="txt_Camp2" size="30" maxlength="45" value="<?=$VLdtCamp2; ?>"></td>
                              </tr>
                              <tr>
                                <td><?php echo $VLtxtCampo3; ?>: </td>
                                <td><input name="txt_Camp3" type="text" id="txt_Camp3" size="10" maxlength="9" value="<?=$VLdtCamp3; ?>"></td>
                              </tr>
                            </table>							
							</td>
							<td width="50%"><table width="100%" border="0">
                              <tr>
                                <td><?php echo $VLtxtCampo4; ?>:</td>
                              </tr>
                              <tr>
                                <td><textarea name="txt_Camp4" cols="42" rows="4" id="txt_Camp4"><?=$VLdtCamp4; ?></textarea></td>
                              </tr>
                            </table></td>
						  </tr>
						</table>

						</fieldset></td>
	</tr>		
</table>
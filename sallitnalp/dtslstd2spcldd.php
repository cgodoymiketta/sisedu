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
                                <td width="26%">C&oacute;digo:</td>
                                <td width="74%"><input name="txt_Camp1" type="text" id="txt_Camp1" size="11" maxlength="11"  readonly="1" value="<?=$VLdtCamp1; ?>"></td>
                              </tr>
                              <tr>
                                <td>Nombre:</td>
                                <td><input name="txt_Camp2" type="text" id="txt_Camp2" size="30" maxlength="45" value="<?=$VLdtCamp2; ?>"></td>
                              </tr>
                              <tr>
                                <td>Siglas: </td>
                                <td><input name="txt_Camp3" type="text" id="txt_Camp3" size="10" maxlength="9" value="<?=$VLdtCamp3; ?>"></td>
                              </tr>
                              <tr>
                                <td>Secci&oacute;n: </td>
                                <td><select name="txt_Camp7">
                                  <option  value="MATUTINA" <?php if (strcmp(trim($VLdtCamp7),trim("MATUTINA"))==0){ ?> selected <?php } ?> >MATUTINA
                                  <option  value="VESPERTINA" <?php if (strcmp(trim($VLdtCamp7),trim("VESPERTINA"))==0){ ?> selected <?php } ?>>VESPERTINA
                                  <option  value="NOCTURNA" <?php if (strcmp(trim($VLdtCamp7),trim("NOCTURNA"))==0){ ?> selected <?php } ?>>NOCTURNA
								</select></td>
                              </tr>
                              <tr>
                                <td>No Cr&eacute;dito: </td>
                                <td><input name="txt_Camp4" type="text" id="txt_Camp4" size="5" maxlength="4" value="<?=$VLdtCamp4; ?>"></td>
                              </tr>
                            </table>							
							</td>
							<td width="50%"><table width="100%" border="0">
                              <tr>
                                <td>Observaciones:</td>
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
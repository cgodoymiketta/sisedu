<table width="100%" border="0">
 <tr>
	<td ><fieldset  >
    			 <legend >Datos</legend>
						<table width="100%" border="0">
						  <tr>
							<td width="50%"><table width="100%" border="0">
                              <tr>
                                <td width="26%" align="right"><?php echo $VLtxtCampo1; ?>:</td>
                                <td width="74%"><table width="300" border="0" hspace="0" vspace="0">
  <tr>
    <td width="50"><input name="txt_Camp1" type="text" id="txt_Camp1" size="5" maxlength="5"  readonly="1" value="<?=$VLdtCamp1; ?>"></td>
    <td width="50">&nbsp;</td>
    <td width="50"><?php echo $VLtxtCampo9; ?>:</td>
    <td><select name="txt_Camp9">
									<option value="0" <?php if ( $VLdtCamp9 == "0") {?> selected <?php }?>>Quimestre</option>
									<option  value="1" <?php if ( $VLdtCamp9 == "1") {?> selected <?php }?>>Nota Anual</option>
									</select></td>
  </tr>
</table>
</td>
                              </tr>
                              <tr>
                                <td align="right"><?php echo $VLtxtCampo2; ?>:</td>
                                <td><input name="txt_Camp2" type="text" id="txt_Camp2" size="40" maxlength="45" value="<?=$VLdtCamp2; ?>"></td>
                              </tr>
                              <tr>
                                <td align="right"><?php echo $VLtxtCampo3; ?>: </td>
                                <td>
                                <table width="300" border="0" hspace="0" vspace="0">
  <tr>
    <td width="50"><input name="txt_Camp3" type="text" id="txt_Camp3" size="5" maxlength="5" value="<?=$VLdtCamp3; ?>"></td>
    <td width="50">&nbsp;</td>
    <td width="50"><?php echo $VLtxtCampo10; ?>:</td>
    <td><select name="txt_Camp10">
									<option value="AMBOS" <?php if ( $VLdtCamp10 == "AMBOS") {?> selected <?php }?>>AMBOS</option>
									<option  value="MATUTINA" <?php if ( $VLdtCamp10 == "MATUTINA") {?> selected <?php }?>>MATUTINA</option>
									<option  value="VESPERTINA" <?php if ( $VLdtCamp10 == "VESPERTINA") {?> selected <?php }?>>VESPERTINA</option>
									</select></td>
  </tr>
</table>
                                </td>
                              </tr>
                              <tr>
                                <td align="right"><?php echo $VLtxtCampo4; ?>: </td>
                                <td><input name="txt_Camp4" type="text" id="txt_Camp4" size="40" maxlength="12" value="<?=$VLdtCamp4; ?>"></td>
                              </tr>
                              <tr>
                                <td align="right"><?php echo $VLtxtCampo5; ?>: </td>
                                <td><input name="txt_Camp5" type="text" id="txt_Camp5" size="40" maxlength="12" value="<?=$VLdtCamp5; ?>"></td>
                              </tr>
                            </table>							
							</td>
							
						  </tr>
						</table>

						</fieldset></td>
	</tr>
    <tr>
    	<td>
        <fieldset>
        <legend>Acciones</legend>
        <table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td><input name="txt_Camp6" type="hidden" value="<?=$VLInstitucion; ?>"  /><input name="txt_Camp7" type="hidden" value="<?=$VLAnoLocal; ?>"  /><input name="txt_Camp8" type="hidden" value="<?=$VLdtCamp8; ?>"  /> &nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">
      	<input type="submit" name="GENERAR" id="GENERAR" value="GENERAR" <?php if($VLdtCamp8!=1){ ?> disabled="disabled" <?php } ?>  />
    </td>
    <td align="center">      
    	<input type="submit" name="ABRIR" id="ABRIR" value="ABRIR"  disabled="disabled"  />
    </td>
    <td align="center">
        <input type="submit" name="CERRADO" id="CERRADO" value="CERRADO" <?php if($VLdtCamp8<2){ ?> disabled="disabled" <?php } ?> />

    </td>
    <td>&nbsp;</td>
  </tr>
</table>

        </fieldset>
        </td>
    </tr>		
</table>
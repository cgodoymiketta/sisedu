<table width="100%" border="0">
 <tr>
	<td ><fieldset  >
						  <legend >Datos <font color="#FF0000"> <?php echo   $VLMensaje;///."   /   ".$VLQryRep."---".$VLdtCamp13a.$VLdtCamp12a.$VLdtCamp14a.$VLdtCamp15a."--".$VLdtCamp15; ?> </legend>
						<table width="100%" border="1">

						  <tr>
							<td width="50%" valign="top"><table width="100%" border="0">
                              <tr>
                                <td width="26%"><?php echo $VLtxtCampo1; ?>:</td>
                                <td width="74%"><input name="txt_Camp1" type="text" id="txt_Camp1"  size="8" maxlength="8" readonly="1"  value="<?=$VLdtCamp1; ?>" ></td>
                              </tr>                            
                              <tr>
                                <td width="26%" ><?php echo $VLtxtCampo2; ?>:</td>
                                <td width="74%"><input name="txt_Camp2" type="text" id="txt_Camp2" size="30" maxlength="45" value="<?=$VLdtCamp2; ?>"></td>
                              </tr>
                              <tr>
                                <td><?php echo $VLtxtCampo3; ?>: </td>
                                <td><input name="txt_Camp3" type="text" id="txt_Camp3" size="30" maxlength="45" value="<?=$VLdtCamp3; ?>"></td>
                              </tr>
                              <tr>
                                <td><?php echo $VLtxtCampo4; ?>: </td>
                                <td><select name="txt_Camp22" >
									<option value="Cedula" <?php if ( utf8_encode($VLdtCamp22) == "Cédula") {?> selected <?php }?>>Cedula</option>
									<option  value="CarneRefugiado" <?php if ( $VLdtCamp22 == "CarneRefugiado") {?> selected <?php }?>>CarneRefugiado</option>
                                    <option value="Pasaporte" <?php if ( $VLdtCamp22 == "Pasaporte") {?> selected <?php }?>>Pasaporte</option>
                                    <option value="No tiene" <?php if ( $VLdtCamp22 == "No tiene") {?> selected <?php }?>>No tiene</option>
									</select>
                                <input name="txt_Camp4" type="text" id="txt_Camp4" size="11" maxlength="11" value="<?=$VLdtCamp4; ?>"></td>
                              </tr>
                              <tr>
                                <td><?php echo $VLtxtCampo5; ?>: </td>
                                <td>
									<select name="txt_Camp5">
									<option value="Masculino" <?php if ( $VLdtCamp5 == "Masculino") {?> selected <?php }?>>Masculino</option>
									<option  value="Femenino" <?php if ( $VLdtCamp5 == "Femenino") {?> selected <?php }?>>Femenino</option>
									</select>
								</td>
                              </tr>
                              <tr>
                                <td width="26%"><?php echo $VLtxtCampo6; ?>:</td>
                                <td width="74%"><input name="txt_Camp6" type="text" id="txt_Camp6" size="30" maxlength="11" value="<?=$VLdtCamp6; ?>"  ></td>
                              </tr> 
                              <tr>
                                <td width="26%"><?php echo $VLtxtCampo7; ?>:</td>
                                <td width="74%"><input name="txt_Camp7" type="text" id="txt_Camp7" size="30" maxlength="11" value="<?=$VLdtCamp7; ?>"  ></td>
                              </tr> 
                              <tr>
                                <td width="26%"><?php echo $VLtxtCampo8; ?>:</td>
                                <td width="74%"><input name="txt_Camp8" type="text" id="txt_Camp8" size="30" maxlength="50" value="<?=$VLdtCamp8; ?>"  ></td>
                              </tr>
                              <tr>
                                <td><?php echo $VLtxtCampo9; ?>:</td>
                                <td><input name="txt_Camp9" type="text" id="txt_Camp9" size="30" maxlength="45" value="<?=$VLdtCamp9; ?>">
                                </td>
                              </tr>
							  <tr>
                                <td><?php echo $VLtxtCampo10; ?>:</td>
                                <td><input name="txt_Camp10" type="text" id="txt_Camp10" size="30" maxlength="80" value="<?=$VLdtCamp10; ?>"></td>
                              </tr>
                              <tr>
                                <td><?php echo $VLtxtCampo11; ?>:</td>
                                <td><input name="txt_Camp11" type="text" id="txt_Camp11" size="30" maxlength="45" value="<?=$VLdtCamp11; ?>"></td>
                              </tr>                            
							  </table>
							</td>
							<td width="50%">
							 <table width="100%" border="0">
                              <tr> 
                              	<td> </td>
                                <td align="left">REPRESENTANTE LEGAL </td>
                              </tr>
                              <tr>
                                <td width="30%"><?php echo $VLtxtCampo12; ?>:</td>
                                <td width="70%"><input name="txt_Camp12" type="text" id="txt_Camp12" size="8" maxlength="8" readonly="1"   value="<?=$VLdtCamp12; ?>" ></td>
                              </tr>                            
                              <tr>
                                <td width="30%" ><?php echo $VLtxtCampo13; ?>:</td>
                                <td width="70%"><input name="txt_Camp13" type="text" id="txt_Camp13" size="30" maxlength="45" value="<?=$VLdtCamp13; ?>"></td>
                              </tr>
                              <tr>
                                <td><?php echo $VLtxtCampo14; ?>: </td>
                                <td><input name="txt_Camp14" type="text" id="txt_Camp14" size="30" maxlength="20" value="<?=$VLdtCamp14; ?>">
                                </td>
                              </tr>
							  <tr>
                                <td><?php echo $VLtxtCampo15; ?>: </td>
                                <td><select name="txt_Camp23">
									<option value="Cedula" <?php if ( $VLdtCamp23 == "Cedula") {?> selected <?php }?>>Cedula</option>
									<option  value="CarneRefugiado" <?php if ( $VLdtCamp23 == "CarneRefugiado") {?> selected <?php }?>>CarneRefugiado</option>
                                    <option value="Pasaporte" <?php if ( $VLdtCamp23 == "Pasaporte") {?> selected <?php }?>>Pasaporte</option>
<option value="No tiene" <?php if ( $VLdtCamp23 == "No tiene") {?> selected <?php }?>>No tiene</option>
									</select><input name="txt_Camp15" type="text" id="txt_Camp15" size="12" maxlength="10" value="<?=$VLdtCamp15; ?>"  ></td>
                              </tr>
							  <tr>
                                <td><?php echo $VLtxtCampo16; ?>: </td>
                                <td><select name="txt_Camp16">
									<option value="Masculino" <?php if ( $VLdtCamp16 == "Masculino") {?> selected <?php }?>>Masculino</option>
									<option  value="Femenino" <?php if ( $VLdtCamp16 == "Femenino") {?> selected <?php }?>>Femenino</option>
									</select></td>
                              </tr>    
                              <tr>
                                <td width="30%"><?php echo $VLtxtCampo17; ?>:</td>
                                <td width="70%"><input name="txt_Camp17" type="text" id="txt_Camp17" size="30" maxlength="10" value="<?=$VLdtCamp17; ?>"  ></td>
                              </tr> 							  
                              <tr>
                                <td><?php echo $VLtxtCampo18; ?>:</td>
                                <td> <select name="txt_Camp18">
									<option  value="ABUELO" <?php if ( $VLdtCamp18 == "ABUELO") {?> selected <?php }?>>ABUELO</option>
									<option  value="BISABUELO" <?php if ( $VLdtCamp18 == "BISABUELO") {?> selected <?php }?>>BISABUELO</option>
                                    <option  value="ADOPTIVA" <?php if ( $VLdtCamp18 == "ADOPTIVA") {?> selected <?php }?>>ADOPTIVA</option>
                                    <option  value="CRIANZA" <?php if ( $VLdtCamp18 == "CRIANZA") {?> selected <?php }?>>CRIANZA</option>
									<option  value="MADRE" <?php if ( $VLdtCamp18 == "MADRE") {?> selected <?php }?>>MADRE</option>
									<option  value="MADRASTRA" <?php if ( $VLdtCamp18 == "MADRASTRA") {?> selected <?php }?>>MADRASTRA</option>
                                    <option  value="HERMANO" <?php if ( $VLdtCamp18 == "HERMANO") {?> selected <?php }?>>HERMANO</option>
                                    <option value="PADRE" <?php if ( $VLdtCamp18 == "PADRE") {?> selected <?php }?>>PADRE</option>
                                    <option value="PADRASTRO" <?php if ( $VLdtCamp18 == "PADRASTRO") {?> selected <?php }?>>PADRASTRO</option>
                                    <option  value="PRIMO" <?php if ( $VLdtCamp18 == "PRIMO") {?> selected <?php }?>>PRIMO</option>
                                    <option  value="TIO" <?php if ( $VLdtCamp18 == "TIO") {?> selected <?php }?>>TIO</option>
                                    <option  value="TUTOR" <?php if ( $VLdtCamp18 == "TUTOR") {?> selected <?php }?>>TUTOR</option>
                                    <option  value="OTRO" <?php if ( $VLdtCamp18 == "OTRO") {?> selected <?php }?>>OTRO</option>
									</select> 
                                </td>
                              </tr>
                              <tr>
                                <td><?php echo $VLtxtCampo19; ?>:</td>
                                <td><input name="txt_Camp19" type="text" id="txt_Camp19" size="30" maxlength="50" value="<?=$VLdtCamp19; ?>"  ></td>
                              </tr>                              
                              <tr>
                                <td><?php echo $VLtxtCampo20; ?>:</td>
                                <td><input name="txt_Camp20" type="text" id="txt_Camp20" size="30" maxlength="50" value="<?=$VLdtCamp20; ?>" >
                                </td>
                              </tr>                               
                              <tr>
                                <td><?php echo $VLtxtCampo21; ?>:</td>
                                <td><input name="txt_Camp21" type="text" id="txt_Camp21" size="30" maxlength="50" value="<?=$VLdtCamp21; ?>" >
                                </td>
                              </tr>                            
							  </table>
							</td>
						  </tr>
						</table>

						</fieldset>
                        </td>
	</tr>		
</table>
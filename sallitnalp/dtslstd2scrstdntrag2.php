<table width="100%" border="0">
 <tr>
	<td ><fieldset  >
          <legend >FICHA DE INFORMACION GENERAL Y SOCIOECON'OMICA DEL ESTUDIANTE <?php echo $VLInstitucion; ?> </legend>
        	<table width="100%" border="0">
  <tr>
  <?php //INFORMACION GENERAL ?><input type="hidden" name="txt_Camp1" value="<?=$txt_Camp1; ?>">
    <td>
<table width="100%" border="0">
  <tr>
    <td>
    <table width="100%" border="0">
  <tr>
    <td>
        <table width="100%" border="0" cellspacing="0" >
          <tr>
            <td><?php echo $VLtxtCampo2; ?></td>
            <td><input name="txt_Camp2" type="text" id="txt_Camp2" size="25" maxlength="45" value="<?=$VLdtCamp2; ?>"></td>
        <td><?php echo $VLtxtCampo3; ?></td>
            <td><input name="txt_Camp3" type="text" id="txt_Camp3" size="25" maxlength="45" value="<?=$VLdtCamp3; ?>"></td>
            <td><select name="txt_Camp22">
                                            <option value="Cedula" <?php if ( $VLdtCamp22 == "Cedula") {?> selected <?php }?>>Cedula</option>
                                            <option  value="CarneRefugiado" <?php if ( $VLdtCamp22 == "CarneRefugiado") {?> selected <?php }?>>CarneRefugiado</option>
                                            <option value="Pasaporte" <?php if ( $VLdtCamp22 == "Pasaporte") {?> selected <?php }?>>Pasaporte</option>
                                            </select></td>
            <td><input name="txt_Camp4" type="text" id="txt_Camp4" size="11" maxlength="45" value="<?=$VLdtCamp4; ?>"></td>  
            </tr>
        </table>    
	</td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0"  cellspacing="0" >
  <tr>
    <td><?php echo $VLtxtCampo5; ?></td>
    <td>
    <select name="txt_Camp5">
		<option value="Masculino" <?php if ( $VLdtCamp5 == "Masculino") {?> selected <?php }?>>Masculino</option>
		<option  value="Femenino" <?php if ( $VLdtCamp5 == "Femenino") {?> selected <?php }?>>Femenino</option>
	</select>
    </td>
    <td><?php echo $VLtxtCampo24; ?></td>
    <td><input name="txt_Camp24" type="text" id="txt_Camp24" size="11" maxlength="45" value="<?=$VLdtCamp24; ?>"></td>
    <td><?php echo $VLtxtCampo25; ?></td>
    <td><select name="txt_Camp25">
		<option value="Si" <?php if ( $VLdtCamp25 == "Si") {?> selected <?php }?>>Si</option>
		<option  value="No" <?php if ( $VLdtCamp25 == "No") {?> selected <?php }?>>No</option>
	</select>
    </td>
    <td><?php echo $VLtxtCampo26; ?></td>
    <td><input name="txt_Camp26" type="text" id="txt_Camp26" size="11" maxlength="20" value="<?=$VLdtCamp26; ?>"></td>
    <td><?php echo $VLtxtCampo27; ?></td>
    <td><input name="txt_Camp27" type="text" id="txt_Camp27" size="5" maxlength="10" value="<?=$VLdtCamp27; ?>"></td>    
    
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
        <table width="100%" border="0">
          <tr>
            <td><?php echo $VLtxtCampo7; ?></td>
            <td><input name="txt_Camp7" type="text" id="txt_Camp7" size="25" maxlength="50" value="<?=$VLdtCamp7; ?>"></td>
            <td><?php echo $VLtxtCampo6; ?></td>
            <td><input name="txt_Camp6" type="text" id="txt_Camp6" size="8" maxlength="20" value="<?=$VLdtCamp6; ?>"></td>
            <td><?php echo $VLtxtCampo28; ?></td>
            <td><input name="txt_Camp28" type="text" id="txt_Camp29" size="15" maxlength="20" value="<?=$VLdtCamp28; ?>"></td>
            <td><?php echo $VLtxtCampo29; ?></td>
            <td><input name="txt_Camp29" type="text" id="txt_Camp29" size="10" maxlength="20" value="<?=$VLdtCamp29; ?>"></td>
          </tr>
        </table>
    </td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0">
      <tr>
        <td><?php echo $VLtxtCampo30; ?></td>
        <td><input name="txt_Camp30" type="text" id="txt_Camp30" size="25" maxlength="50" value="<?=$VLdtCamp30; ?>"></td>
        <td><?php echo $VLtxtCampo8; ?></td>
        <td><input name="txt_Camp8" type="text" id="txt_Camp8" size="70" maxlength="100" value="<?=$VLdtCamp8; ?>"></td>
      </tr>
      <tr>
        <td><?php echo $VLtxtCampo9; ?></td>
        <td><input name="txt_Camp9" type="text" id="txt_Camp9" size="25" maxlength="50" value="<?=$VLdtCamp9; ?>"></td>
        <td><?php echo $VLtxtCampo10; ?></td>
        <td><input name="txt_Camp10" type="text" id="txt_Camp10" size="70" maxlength="100" value="<?=$VLdtCamp10; ?>"></td>
      </tr>
    </table>
    </td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0">
  <tr>
    <td>DATOS FAMILIARES</td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0">
      <tr>
        <td>
        <table width="100%" border="0">
          <tr>
            <td><select name="txt_Camp40">
									<option  value="ABUELO" <?php if ( $VLdtCamp40 == "ABUELO") {?> selected <?php }?>>ABUELO</option>
									<option  value="BISABUELO" <?php if ( $VLdtCamp40 == "BISABUELO") {?> selected <?php }?>>BISABUELO</option>
                                    <option  value="ADOPTIVA" <?php if ( $VLdtCamp40 == "ADOPTIVA") {?> selected <?php }?>>ADOPTIVA</option>
                                    <option  value="CRIANZA" <?php if ( $VLdtCamp40 == "CRIANZA") {?> selected <?php }?>>CRIANZA</option>
									<option  value="MADRE" <?php if ( $VLdtCamp40 == "MADRE") {?> selected <?php }?>>MADRE</option>
									<option  value="MADRASTRA" <?php if ( $VLdtCamp40 == "MADRASTRA") {?> selected <?php }?>>MADRASTRA</option>
                                    <option  value="HERMANO" <?php if ( $VLdtCamp40 == "HERMANO") {?> selected <?php }?>>HERMANO</option>
                                    <option value="PADRE" <?php if ( $VLdtCamp40 == "PADRE") {?> selected <?php }?>>PADRE</option>
                                    <option value="PADRASTRO" <?php if ( $VLdtCamp40 == "PADRASTRO") {?> selected <?php }?>>PADRASTRO</option>
                                    <option  value="PRIMO" <?php if ( $VLdtCamp40 == "PRIMO") {?> selected <?php }?>>PRIMO</option>
                                    <option  value="TIO" <?php if ( $VLdtCamp40 == "TIO") {?> selected <?php }?>>TIO</option>
                                    <option  value="TUTOR" <?php if ( $VLdtCamp40 == "TUTOR") {?> selected <?php }?>>TUTOR</option>
                                    <option  value="OTRO" <?php if ( $VLdtCamp40 == "OTRO") {?> selected <?php }?>>OTRO</option>
									</select></td>
            <td><?php echo $VLtxtCampo41; ?></td>
            <td><input name="txt_Camp41" type="text" id="txt_Camp41" size="20" maxlength="50" value="<?=$txt_Camp41; ?>"></td>
            <td><?php echo $VLtxtCampo42; ?></td>
            <td><input name="txt_Camp42" type="text" id="txt_Camp42" size="20" maxlength="50" value="<?=$txt_Camp42; ?>"></td>
            <td><select name="txt_Camp43">
                <option value="Cedula" <?php if ( $VLdtCamp43 == "Cedula") {?> selected <?php }?>>Cedula</option>
                <option  value="CarneRefugiado" <?php if ( $VLdtCamp43 == "CarneRefugiado") {?> selected <?php }?>>CarneRefugiado</option>
                <option value="Pasaporte" <?php if ( $VLdtCamp43 == "Pasaporte") {?> selected <?php }?>>Pasaporte</option>
                </select></td>
            <td><input name="txt_Camp44" type="text" id="txt_Camp44" size="11" maxlength="50" value="<?=$txt_Camp44; ?>"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td><?php echo $VLtxtCampo45; ?></td>
            <td><select name="txt_Camp45">
									<option value="Masculino" <?php if ( $txt_Camp45 == "Masculino") {?> selected <?php }?>>Masculino</option>
									<option  value="Femenino" <?php if ( $txt_Camp45 == "Femenino") {?> selected <?php }?>>Femenino</option>
									</select></td>
            <td><?php echo $VLtxtCampo46; ?></td>
            <td><input name="txt_Camp46" type="text" id="txt_Camp46" size="11" maxlength="50" value="<?=$txt_Camp46; ?>"></td>
            <td><?php echo $VLtxtCampo47; ?></td>
            <td><input name="txt_Camp47" type="text" id="txt_Camp47" size="60" maxlength="100" value="<?=$txt_Camp47; ?>"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td><?php echo $VLtxtCampo48; ?></td>
            <td><input name="txt_Camp48" type="text" id="txt_Camp48" size="10" maxlength="100" value="<?=$txt_Camp48; ?>"></td>
            <td><?php echo $VLtxtCampo49; ?></td>
            <td><input name="txt_Camp49" type="text" id="txt_Camp49" size="10" maxlength="100" value="<?=$txt_Camp49; ?>"></td>
            <td><?php echo $VLtxtCampo50; ?></td>
            <td><input name="txt_Camp50" type="text" id="txt_Camp50" size="20" maxlength="100" value="<?=$txt_Camp50; ?>"></td>
             <td><?php echo $VLtxtCampo51; ?></td>
            <td><select name="txt_Camp51">
                <option value="CASADO" <?php if ( $txt_Camp51 == "CASADO") {?> selected <?php }?>>CASADO</option>
                <option  value="SOLTERO" <?php if ( $txt_Camp51 == "SOLTERO") {?> selected <?php }?>>SOLTERO</option>
                <option value="UNION LIBRE" <?php if ( $txt_Camp51 == "UNION LIBRE") {?> selected <?php }?>>UNION LIBRE</option>
                <option value="DIVORCIADO" <?php if ( $txt_Camp51 == "DIVORCIADO") {?> selected <?php }?>>DIVORCIADO</option>
                <option value="VIUDO" <?php if ( $txt_Camp51 == "VIUDO") {?> selected <?php }?>>VIUDO</option>
                </select></td>
             <td><?php echo $VLtxtCampo52; ?></td>
            <td><select name="txt_Camp52">
                <option value="Si" <?php if ( $txt_Camp52 == "Si") {?> selected <?php }?>>Si</option>
                <option  value="No" <?php if ( $txt_Camp52 == "No") {?> selected <?php }?>>No</option>
                </select></td>

          </tr>
        </table></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0">
      <tr>
        <td>
        <table width="100%" border="0">
          <tr>
            <td><select name="txt_Camp60">
									<option  value="ABUELO" <?php if ( $VLdtCamp60 == "ABUELO") {?> selected <?php }?>>ABUELO</option>
									<option  value="BISABUELO" <?php if ( $VLdtCamp60 == "BISABUELO") {?> selected <?php }?>>BISABUELO</option>
                                    <option  value="ADOPTIVA" <?php if ( $VLdtCamp60 == "ADOPTIVA") {?> selected <?php }?>>ADOPTIVA</option>
                                    <option  value="CRIANZA" <?php if ( $VLdtCamp60 == "CRIANZA") {?> selected <?php }?>>CRIANZA</option>
									<option  value="MADRE" <?php if ( $VLdtCamp60 == "MADRE") {?> selected <?php }?>>MADRE</option>
									<option  value="MADRASTRA" <?php if ( $VLdtCamp60 == "MADRASTRA") {?> selected <?php }?>>MADRASTRA</option>
                                    <option  value="HERMANO" <?php if ( $VLdtCamp60 == "HERMANO") {?> selected <?php }?>>HERMANO</option>
                                    <option value="PADRE" <?php if ( $VLdtCamp60 == "PADRE") {?> selected <?php }?>>PADRE</option>
                                    <option value="PADRASTRO" <?php if ( $VLdtCamp60 == "PADRASTRO") {?> selected <?php }?>>PADRASTRO</option>
                                    <option  value="PRIMO" <?php if ( $VLdtCamp60 == "PRIMO") {?> selected <?php }?>>PRIMO</option>
                                    <option  value="TIO" <?php if ( $VLdtCamp60 == "TIO") {?> selected <?php }?>>TIO</option>
                                    <option  value="TUTOR" <?php if ( $VLdtCamp60 == "TUTOR") {?> selected <?php }?>>TUTOR</option>
                                    <option  value="OTRO" <?php if ( $VLdtCamp60 == "OTRO") {?> selected <?php }?>>OTRO</option>
									</select></td>
            <td><?php echo $VLtxtCampo61; ?></td>
            <td><input name="txt_Camp61" type="text" id="txt_Camp61" size="20" maxlength="50" value="<?=$txt_Camp61; ?>"></td>
            <td><?php echo $VLtxtCampo62; ?></td>
            <td><input name="txt_Camp62" type="text" id="txt_Camp62" size="20" maxlength="50" value="<?=$txt_Camp62; ?>"></td>
            <td><select name="txt_Camp63">
                <option value="Cedula" <?php if ( $VLdtCamp63 == "Cedula") {?> selected <?php }?>>Cedula</option>
                <option  value="CarneRefugiado" <?php if ( $VLdtCamp63 == "CarneRefugiado") {?> selected <?php }?>>CarneRefugiado</option>
                <option value="Pasaporte" <?php if ( $VLdtCamp63 == "Pasaporte") {?> selected <?php }?>>Pasaporte</option>
                </select></td>
            <td><input name="txt_Camp64" type="text" id="txt_Camp64" size="11" maxlength="50" value="<?=$txt_Camp64; ?>"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td><?php echo $VLtxtCampo65; ?></td>
            <td><select name="txt_Camp65">
									<option value="Masculino" <?php if ( $txt_Camp65 == "Masculino") {?> selected <?php }?>>Masculino</option>
									<option  value="Femenino" <?php if ( $txt_Camp65 == "Femenino") {?> selected <?php }?>>Femenino</option>
									</select></td>
            <td><?php echo $VLtxtCampo66; ?></td>
            <td><input name="txt_Camp66" type="text" id="txt_Camp66" size="11" maxlength="50" value="<?=$txt_Camp66; ?>"></td>
            <td><?php echo $VLtxtCampo67; ?></td>
            <td><input name="txt_Camp67" type="text" id="txt_Camp67" size="60" maxlength="100" value="<?=$txt_Camp67; ?>"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td><?php echo $VLtxtCampo68; ?></td>
            <td><input name="txt_Camp68" type="text" id="txt_Camp68" size="10" maxlength="100" value="<?=$txt_Camp68; ?>"></td>
            <td><?php echo $VLtxtCampo69; ?></td>
            <td><input name="txt_Camp69" type="text" id="txt_Camp69" size="10" maxlength="100" value="<?=$txt_Camp69; ?>"></td>
            <td><?php echo $VLtxtCampo70; ?></td>
            <td><input name="txt_Camp70" type="text" id="txt_Camp70" size="20" maxlength="100" value="<?=$txt_Camp70; ?>"></td>
             <td><?php echo $VLtxtCampo71; ?></td>
            <td><select name="txt_Camp71">
                <option value="CASADO" <?php if ( $txt_Camp71 == "CASADO") {?> selected <?php }?>>CASADO</option>
                <option  value="SOLTERO" <?php if ( $txt_Camp71 == "SOLTERO") {?> selected <?php }?>>SOLTERO</option>
                <option value="UNION LIBRE" <?php if ( $txt_Camp71 == "UNION LIBRE") {?> selected <?php }?>>UNION LIBRE</option>
                <option value="DIVORCIADO" <?php if ( $txt_Camp71 == "DIVORCIADO") {?> selected <?php }?>>DIVORCIADO</option>
                <option value="VIUDO" <?php if ( $txt_Camp71 == "VIUDO") {?> selected <?php }?>>VIUDO</option>
                </select></td>
             <td><?php echo $VLtxtCampo72; ?></td>
            <td><select name="txt_Camp72">
                <option value="Si" <?php if ( $txt_Camp72 == "Si") {?> selected <?php }?>>Si</option>
                <option  value="No" <?php if ( $txt_Camp72 == "No") {?> selected <?php }?>>No</option>
                </select></td>

          </tr>
        </table></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0">
      <tr>
        <td>
        <table width="100%" border="0">
          <tr>
            <td><select name="txt_Camp80">
									<option  value="ABUELO" <?php if ( $VLdtCamp80 == "ABUELO") {?> selected <?php }?>>ABUELO</option>
									<option  value="BISABUELO" <?php if ( $VLdtCamp80 == "BISABUELO") {?> selected <?php }?>>BISABUELO</option>
                                    <option  value="ADOPTIVA" <?php if ( $VLdtCamp80 == "ADOPTIVA") {?> selected <?php }?>>ADOPTIVA</option>
                                    <option  value="CRIANZA" <?php if ( $VLdtCamp80 == "CRIANZA") {?> selected <?php }?>>CRIANZA</option>
									<option  value="MADRE" <?php if ( $VLdtCamp80 == "MADRE") {?> selected <?php }?>>MADRE</option>
									<option  value="MADRASTRA" <?php if ( $VLdtCamp80 == "MADRASTRA") {?> selected <?php }?>>MADRASTRA</option>
                                    <option  value="HERMANO" <?php if ( $VLdtCamp80 == "HERMANO") {?> selected <?php }?>>HERMANO</option>
                                    <option value="PADRE" <?php if ( $VLdtCamp80 == "PADRE") {?> selected <?php }?>>PADRE</option>
                                    <option value="PADRASTRO" <?php if ( $VLdtCamp80 == "PADRASTRO") {?> selected <?php }?>>PADRASTRO</option>
                                    <option  value="PRIMO" <?php if ( $VLdtCamp80 == "PRIMO") {?> selected <?php }?>>PRIMO</option>
                                    <option  value="TIO" <?php if ( $VLdtCamp80 == "TIO") {?> selected <?php }?>>TIO</option>
                                    <option  value="TUTOR" <?php if ( $VLdtCamp80 == "TUTOR") {?> selected <?php }?>>TUTOR</option>
                                    <option  value="OTRO" <?php if ( $VLdtCamp80 == "OTRO") {?> selected <?php }?>>OTRO</option>
									</select></td>
            <td><?php echo $VLtxtCampo81; ?></td>
            <td><input name="txt_Camp81" type="text" id="txt_Camp81" size="20" maxlength="50" value="<?=$txt_Camp81; ?>"></td>
            <td><?php echo $VLtxtCampo82; ?></td>
            <td><input name="txt_Camp82" type="text" id="txt_Camp82" size="20" maxlength="50" value="<?=$txt_Camp82; ?>"></td>
            <td><select name="txt_Camp83">
                <option value="Cedula" <?php if ( $VLdtCamp83 == "Cedula") {?> selected <?php }?>>Cedula</option>
                <option  value="CarneRefugiado" <?php if ( $VLdtCamp83 == "CarneRefugiado") {?> selected <?php }?>>CarneRefugiado</option>
                <option value="Pasaporte" <?php if ( $VLdtCamp83 == "Pasaporte") {?> selected <?php }?>>Pasaporte</option>
                </select></td>
            <td><input name="txt_Camp84" type="text" id="txt_Camp84" size="11" maxlength="50" value="<?=$txt_Camp84; ?>"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td><?php echo $VLtxtCampo85; ?></td>
            <td><select name="txt_Camp85">
									<option value="Masculino" <?php if ( $txt_Camp85 == "Masculino") {?> selected <?php }?>>Masculino</option>
									<option  value="Femenino" <?php if ( $txt_Camp85 == "Femenino") {?> selected <?php }?>>Femenino</option>
									</select></td>
            <td><?php echo $VLtxtCampo86; ?></td>
            <td><input name="txt_Camp86" type="text" id="txt_Camp86" size="11" maxlength="50" value="<?=$txt_Camp86; ?>"></td>
            <td><?php echo $VLtxtCampo87; ?></td>
            <td><input name="txt_Camp87" type="text" id="txt_Camp87" size="60" maxlength="100" value="<?=$txt_Camp87; ?>"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td><?php echo $VLtxtCampo88; ?></td>
            <td><input name="txt_Camp88" type="text" id="txt_Camp88" size="10" maxlength="100" value="<?=$txt_Camp88; ?>"></td>
            <td><?php echo $VLtxtCampo89; ?></td>
            <td><input name="txt_Camp89" type="text" id="txt_Camp89" size="10" maxlength="100" value="<?=$txt_Camp89; ?>"></td>
            <td><?php echo $VLtxtCampo90; ?></td>
            <td><input name="txt_Camp90" type="text" id="txt_Camp90" size="20" maxlength="100" value="<?=$txt_Camp90; ?>"></td>
             <td><?php echo $VLtxtCampo91; ?></td>
            <td><select name="txt_Camp91">
                <option value="CASADO" <?php if ( $txt_Camp91 == "CASADO") {?> selected <?php }?>>CASADO</option>
                <option  value="SOLTERO" <?php if ( $txt_Camp91 == "SOLTERO") {?> selected <?php }?>>SOLTERO</option>
                <option value="UNION LIBRE" <?php if ( $txt_Camp91 == "UNION LIBRE") {?> selected <?php }?>>UNION LIBRE</option>
                <option value="DIVORCIADO" <?php if ( $txt_Camp91 == "DIVORCIADO") {?> selected <?php }?>>DIVORCIADO</option>
                <option value="VIUDO" <?php if ( $txt_Camp91 == "VIUDO") {?> selected <?php }?>>VIUDO</option>
                </select></td>
             <td><?php echo $VLtxtCampo92; ?></td>
            <td><select name="txt_Camp92">
                <option value="Si" <?php if ( $txt_Camp92 == "Si") {?> selected <?php }?>>Si</option>
                <option  value="No" <?php if ( $txt_Camp92 == "No") {?> selected <?php }?>>No</option>
                </select></td>

          </tr>
        </table></td>
      </tr>
    </table>
    </td>
  </tr>
</table>
    
    </td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
  <?php //INFORMACION GENERAL ?>
    <td>
        <table width="100%" border="0">
          <tr>
            <td>ESTRUCTURA FAMILIAR</td>
          </tr>
          <tr>
            <td>
                <table width="100%" border="0">
                  <tr>
                    <td>
                    <table width="100%" border="0" cellspacing="0" >
                      <tr>
                        <td><?php echo $VLtxtCampo100; ?></td>
                        <td><select name="txt_Camp100">
                <option value="ORGANIZADO" <?php if ( $txt_Camp100 == "ORGANIZADO") {?> selected <?php }?>>ORGANIZADO</option>
                <option  value="DESORGANIZADO" <?php if ( $txt_Camp100 == "DESORGANIZADO") {?> selected <?php }?>>DESORGANIZADO</option>
                <option value="COMPLETO" <?php if ( $txt_Camp100 == "COMPLETO") {?> selected <?php }?>>COMPLETO</option>
                <option value="INCOMPLETO" <?php if ( $txt_Camp100 == "INCOMPLETO") {?> selected <?php }?>>INCOMPLETO</option>
                </select></td>
                        <td><?php echo $VLtxtCampo101; ?></td>
                        <td><select name="txt_Camp101">
                <option value="SOLO MADRE" <?php if ( $txt_Camp101 == "SOLO MADRE") {?> selected <?php }?>>SOLO MADRE</option>
                <option  value="SOLO PADRE" <?php if ( $txt_Camp101 == "SOLO PADRE") {?> selected <?php }?>>SOLO PADRE</option>
                <option value="MADRE Y PADRE" <?php if ( $txt_Camp101 == "MADRE Y PADRE") {?> selected <?php }?>>MADRE Y PADRE</option>
                <option value="OTROS" <?php if ( $txt_Camp101 == "OTROS") {?> selected <?php }?>>OTROS</option>
                </select></td>
                        <td><?php echo $VLtxtCampo102; ?></td>
                        <td><input name="txt_Camp102" type="text" id="txt_Camp102" size="30" maxlength="50" value="<?=$txt_Camp102; ?>"></td>
                      </tr>
                    </table>
                  </td>
                  </tr>
                  <tr>
                    <td>
                    <table width="100%" border="0" cellspacing="0" >
                      <tr>
                        <td><?php echo $VLtxtCampo103; ?></td>
                        <td><input name="txt_Camp103" type="text" id="txt_Camp103" size="10" maxlength="10" value="<?=$txt_Camp103; ?>"></td>
                        <td><?php echo $VLtxtCampo104; ?></td>
                        <td><input name="txt_Camp104" type="text" id="txt_Camp104" size="10" maxlength="10" value="<?=$txt_Camp104; ?>"></td>
                        <td><?php echo $VLtxtCampo105; ?></td>
                        <td><input name="txt_Camp105" type="text" id="txt_Camp105" size="10" maxlength="10" value="<?=$txt_Camp105; ?>"></td>
                      </tr>
                    </table>
					</td>
                  </tr>
                  <tr>
                    <td>
                    <table width="100%" border="0" cellspacing="0" >
                      <tr>
                        <td><?php echo $VLtxtCampo106; ?></td>
                        <td><input name="txt_Camp106" type="text" id="txt_Camp106" size="10" maxlength="10" value="<?=$txt_Camp106; ?>"></td>
                        <td><?php echo $VLtxtCampo107; ?></td>
                        <td><input name="txt_Camp107" type="text" id="txt_Camp107" size="30" maxlength="60" value="<?=$txt_Camp107; ?>"></td>
                      </tr>
                    </table>
                    </td>
                  </tr>
                </table>
            </td>
          </tr>
        </table>
    </td>
  </tr>
  <tr>
  <?php //INFORMACION GENERAL ?>
    <td>
        <table width="100%" border="0">
          <tr>
            <td>NIVEL SOCIOECONOMICO</td>
          </tr>
          <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="1">
                      <tr>
                        <td><?php echo $VLtxtCampo110; ?></td>
                        <td><select name="txt_Camp110">
                <option value="EXCELENTE" <?php if ( $txt_Camp110 == "EXCELENTE") {?> selected <?php }?>>EXCELENTE</option>
                <option  value="BUENO" <?php if ( $txt_Camp110 == "BUENO") {?> selected <?php }?>>BUENO</option>
                <option value="REGULAR" <?php if ( $txt_Camp110 == "REGULAR") {?> selected <?php }?>>REGULAR</option>
                <option value="CON DIFICULTAD" <?php if ( $txt_Camp110 == "CON DIFICULTAD") {?> selected <?php }?>>CON DIFICULTAD</option>
                <option value="DEFICIENTE" <?php if ( $txt_Camp110 == "DEFICIENTE") {?> selected <?php }?>>DEFICIENTE</option>
                </select></td>
                        <td><?php echo $VLtxtCampo111; ?></td>
                        <td><select name="txt_Camp111">
                <option value="PROPIA" <?php if ( $txt_Camp111 == "PROPIA") {?> selected <?php }?>>PROPIA</option>
                <option  value="ARRENDADA" <?php if ( $txt_Camp111 == "ARRENDADA") {?> selected <?php }?>>ARRENDADA</option>
                <option value="FAMILIAR" <?php if ( $txt_Camp111 == "FAMILIAR") {?> selected <?php }?>>FAMILIAR</option>
                <option value="CEDIDA" <?php if ( $txt_Camp111 == "CEDIDA") {?> selected <?php }?>>CEDIDA</option>
                </select></td>
                        <td><?php echo $VLtxtCampo112; ?></td>
                        <td><input name="txt_Camp112" type="text" id="txt_Camp112" size="40" maxlength="100" value="<?=$txt_Camp112; ?>"></td>
                      </tr>
                    </table>
                    </td>
                  </tr>
                  <tr>
                    <td>                    
                    <table width="100%" border="0" cellspacing="0" cellpadding="1">
                      <tr>
                        <td><?php echo $VLtxtCampo113; ?></td>
                        <td><input name="txt_Camp113" type="text" id="txt_Camp113" size="30" maxlength="100" value="<?=$txt_Camp113; ?>"></td>
                        <td><?php echo $VLtxtCampo114; ?></td>
                        <td><input name="txt_Camp114" type="text" id="txt_Camp114" size="30" maxlength="100" value="<?=$txt_Camp114; ?>"></td>
                      </tr>
                    </table>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="1">
                      <tr>
                        <td><?php echo $VLtxtCampo115; ?></td>
                        <td><input name="txt_Camp115" type="text" id="txt_Camp115" size="30" maxlength="100" value="<?=$txt_Camp115; ?>"></td>
                        <td><?php echo $VLtxtCampo116; ?></td>
                        <td><input name="txt_Camp116" type="text" id="txt_Camp116" size="30" maxlength="100" value="<?=$txt_Camp116; ?>"></td>
                      </tr>
                    </table>
                    </td>
                  </tr>
                </table>
            
            </td>
          </tr>
        </table>
    </td>
  </tr>
  <tr>
  <?php //INFORMACION GENERAL ?>
    <td>
        <table width="100%" border="0">
          <tr>
            <td>DATOS ESCOLARES</td>
          </tr>
          <tr>
            <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><?php echo $VLtxtCampo120; ?></td>
                    <td><input name="txt_Camp120" type="text" id="txt_Camp120" size="60" maxlength="100" value="<?=$txt_Camp120; ?>"></td>
                    <td><?php echo $VLtxtCampo121; ?></td>
                    <td><select name="txt_Camp121">
                <option value="Si" <?php if ( $txt_Camp121 == "Si") {?> selected <?php }?>>Si</option>
                <option  value="No" <?php if ( $txt_Camp121 == "No") {?> selected <?php }?>>No</option>
                </select></td>
                  </tr>
                </table>
                </td>
              </tr>
              <tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><?php echo $VLtxtCampo122; ?></td>
                    <td><select name="txt_Camp122">
                <option value="Si" <?php if ( $txt_Camp122 == "Si") {?> selected <?php }?>>Si</option>
                <option  value="No" <?php if ( $txt_Camp122 == "No") {?> selected <?php }?>>No</option>
                </select></td>
                    <td><?php echo $VLtxtCampo123; ?></td>
                    <td><input name="txt_Camp123" type="text" id="txt_Camp123" size="40" maxlength="100" value="<?=$txt_Camp123; ?>"></td>
                  </tr>
                  <tr>
                    <td><?php echo $VLtxtCampo124; ?></td>
                    <td><select name="txt_Camp124">
                <option value="Si" <?php if ( $txt_Camp124 == "Si") {?> selected <?php }?>>Si</option>
                <option  value="No" <?php if ( $txt_Camp124 == "No") {?> selected <?php }?>>No</option>
                </select></td>
                    <td><?php echo $VLtxtCampo125; ?></td>
                    <td><input name="txt_Camp125" type="text" id="txt_Camp125" size="40" maxlength="100" value="<?=$txt_Camp125; ?>"></td>
                  </tr>
                  <tr>
                    <td><?php echo $VLtxtCampo126; ?></td>
                    <td><select name="txt_Camp126">
                <option value="Si" <?php if ( $txt_Camp126 == "Si") {?> selected <?php }?>>Si</option>
                <option  value="No" <?php if ( $txt_Camp126 == "No") {?> selected <?php }?>>No</option>
                </select></td>
                    <td><?php echo $VLtxtCampo127; ?></td>
                    <td><input name="txt_Camp127" type="text" id="txt_Camp127" size="40" maxlength="100" value="<?=$txt_Camp127; ?>"></td>
                  </tr>
                </table>
                </td>
             </tr>
			<tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><?php echo $VLtxtCampo128; ?></td>
                    <td><input name="txt_Camp128" type="text" id="txt_Camp128" size="30" maxlength="100" value="<?=$txt_Camp128; ?>"></td>
                    <td><?php echo $VLtxtCampo129; ?></td>
                    <td><input name="txt_Camp129" type="text" id="txt_Camp129" size="30" maxlength="100" value="<?=$txt_Camp129; ?>"></td>
                  </tr>
                </table>
                </td>
              </tr>              
			<tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><?php echo $VLtxtCampo130; ?></td>
                    <td><select name="txt_Camp130">
                <option value="Si" <?php if ( $txt_Camp130 == "Si") {?> selected <?php }?>>Si</option>
                <option  value="No" <?php if ( $txt_Camp130 == "No") {?> selected <?php }?>>No</option>
                </select></td>
                    <td><?php echo $VLtxtCampo131; ?></td>
                    <td><input name="txt_Camp131" type="text" id="txt_Camp131" size="40" maxlength="100" value="<?=$txt_Camp131; ?>"></td>
                  </tr>
                </table>
                </td>
              </tr>              
			<tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><?php echo $VLtxtCampo132; ?></td>
                    <td><input name="txt_Camp132" type="text" id="txt_Camp132" size="60" maxlength="100" value="<?=$txt_Camp132; ?>"></td>
                  </tr>
                </table>
                </td>
              </tr>              
            </table>
            </td>
          </tr>
        </table>
    </td>
  </tr>
  <tr>
  <?php //INFORMACION GENERAL ?>
    <td>
        <table width="100%" border="0">
          <tr>
            <td>ASPECTOS DE SALUD</td>
          </tr>
          <tr>
            <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><?php echo $VLtxtCampo140; ?></td>
                    <td><input name="txt_Camp140" type="text" id="txt_Camp140" size="60" maxlength="100" value="<?=$txt_Camp140; ?>"></td>
                  </tr>
                </table>
                </td>
              </tr>
              <tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><?php echo $VLtxtCampo141; ?></td>
                    <td><select name="txt_Camp141">
                <option value="VISUAL" <?php if ( $txt_Camp141 == "VISUAL") {?> selected <?php }?>>VISUAL</option>
                <option value="AUDITIVA" <?php if ( $txt_Camp141 == "AUDITIVA") {?> selected <?php }?>>AUDITIVA</option>
                <option value="PSICOMOTRIZ" <?php if ( $txt_Camp141 == "PSICOMOTRIZ") {?> selected <?php }?>>PSICOMOTRIZ</option>
                <option value="DENTAL" <?php if ( $txt_Camp141 == "DENTAL") {?> selected <?php }?>>DENTAL</option>
                <option value="FISICA" <?php if ( $txt_Camp141 == "FISICA") {?> selected <?php }?>>FISICA</option>
                </select></td>
                	<td><?php echo $VLtxtCampo142; ?></td>
                    <td><input name="txt_Camp142" type="text" id="txt_Camp142" size="70" maxlength="100" value="<?=$txt_Camp142; ?>"></td>
                  </tr>
                </table>
                </td>
              </tr>
              <tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><?php echo $VLtxtCampo143; ?></td>
                    <td><input name="txt_Camp143" type="text" id="txt_Camp143" size="30" maxlength="100" value="<?=$txt_Camp143; ?>"></td>
                    <td><?php echo $VLtxtCampo144; ?></td>
                    <td><input name="txt_Camp144" type="text" id="txt_Camp144" size="30" maxlength="100" value="<?=$txt_Camp144; ?>"></td>
                  </tr>
                </table>
                </td>
              </tr>
            </table>
            </td>
          </tr>
        </table>
    </td>
  </tr>
  <tr>
    <td>
        <table width="100%" border="0">
          <tr>
            <td>ASPECTOS PSICOLOGICOS</td>
          </tr>
          <tr>
            <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><?php echo $VLtxtCampo150; ?></td>
                        <td><input name="txt_Camp150" type="text" id="txt_Camp150" size="30" maxlength="100" value="<?=$txt_Camp150; ?>"></td>
                        <td><?php echo $VLtxtCampo151; ?></td>
                        <td><input name="txt_Camp151" type="text" id="txt_Camp151" size="30" maxlength="100" value="<?=$txt_Camp151; ?>"></td>
                      </tr>
                      <tr>
                        <td><?php echo $VLtxtCampo152; ?></td>
                        <td><input name="txt_Camp152" type="text" id="txt_Camp152" size="30" maxlength="100" value="<?=$txt_Camp152; ?>"></td>
                        <td><?php echo $VLtxtCampo153; ?></td>
                        <td><input name="txt_Camp153" type="text" id="txt_Camp153" size="30" maxlength="100" value="<?=$txt_Camp153; ?>"></td>
                      </tr>
                      <tr>
                        <td><?php echo $VLtxtCampo154; ?></td>
                        <td><input name="txt_Camp154" type="text" id="txt_Camp154" size="30" maxlength="100" value="<?=$txt_Camp154; ?>"></td>
                        <td><?php echo $VLtxtCampo155; ?></td>
                        <td><input name="txt_Camp155" type="text" id="txt_Camp155" size="30" maxlength="100" value="<?=$txt_Camp155; ?>"></td>
                      </tr>
                      <tr>
                        <td><?php echo $VLtxtCampo156; ?></td>
                        <td><input name="txt_Camp156" type="text" id="txt_Camp156" size="30" maxlength="100" value="<?=$txt_Camp156; ?>"></td>
                        <td><?php echo $VLtxtCampo157; ?></td>
                        <td><input name="txt_Camp157" type="text" id="txt_Camp157" size="30" maxlength="100" value="<?=$txt_Camp157; ?>"></td>
                      </tr>
                    </table>
                </td>
              </tr>
              <tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><?php echo $VLtxtCampo158; ?></td>
                    <td><input name="txt_Camp158" type="text" id="txt_Camp158" size="70" maxlength="100" value="<?=$txt_Camp158; ?>"></td>
                  </tr>
                  <tr>
                    <td><?php echo $VLtxtCampo159; ?></td>
                    <td><input name="txt_Camp159" type="text" id="txt_Camp159" size="70" maxlength="100" value="<?=$txt_Camp159; ?>"></td>
                  </tr>
                </table>
                </td>
              </tr>
            </table>
            </td>
          </tr>
        </table>
    </td>
  </tr>
  <tr> 
      <td> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>ASPECTOS DISCIPLINARIOS IMPORTANTES</td>
                  </tr>
                  <tr>
                    <td><textarea name="txtcamp160" cols="80" rows="3">&nbsp;</textarea></td>
                  </tr>
                </table>
            </td>
          </tr>
          <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>PROBLEMAS FAMILIARES IMPORTANTES</td>
                  </tr>
                  <tr>
                    <td><textarea name="txtcamp162" cols="80" rows="3">&nbsp;</textarea></td>
                  </tr>
                </table>
            </td>
          </tr>
          <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>DIFICULTADES IMPORTANTES EN EL RENDIMIENTO</td>
                  </tr>
                  <tr>
                    <td><textarea name="txtcamp163" cols="80" rows="3">&nbsp;</textarea></td>
                  </tr>
                </table>
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
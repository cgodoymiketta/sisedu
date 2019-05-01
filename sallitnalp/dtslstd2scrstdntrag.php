
<table width="100%" border="0">
 <tr>
	<td ><fieldset  >
          <legend >FICHA DE INFORMACION GENERAL Y SOCIOECONOMICA DEL ESTUDIANTE <font color="#FF0000"> <?php echo $VLMensaje; ?> </font> </legend>
        	<table width="100%" border="0">
  <tr>
  <?php //INFORMACION GENERAL ?><input type="hidden" name="txt_Camp1" value="<?=$VLdtCamp1; ?>">
    <td>
<table width="100%" border="0">
  <tr>
    <td>
    <table width="100%" border="0">
  <tr>
    <td>
        <table width="100%" border="0" >
          <tr>
            <td><?php echo $VLtxtCampo2; ?></td>
            <td><input name="txt_Camp2" type="text" id="txt_Camp2" size="25" maxlength="45" value="<?=$VLdtCamp2; ?>"></td>
        <td><?php echo $VLtxtCampo3; ?></td>
            <td><input name="txt_Camp3" type="text" id="txt_Camp3" size="25" maxlength="45" value="<?=$VLdtCamp3; ?>"></td>
            <td><select name="txt_Camp22">
                                            <option value="Cedula" <?php if ( $VLdtCamp22 == "Cedula") {?> selected <?php }?>>Cedula</option>
                                            <option  value="CarneRefugiado" <?php if ( $VLdtCamp22 == "CarneRefugiado") {?> selected <?php }?>>CarneRefugiado</option>
                                            <option value="Pasaporte" <?php if ( $VLdtCamp22 == "Pasaporte") {?> selected <?php }?>>Pasaporte</option>
<option value="No tiene" <?php if ( $VLdtCamp22 == "No tiene") {?> selected <?php }?>>No tiene</option>
									</select></td>
            <td><input name="txt_Camp4" type="text" id="txt_Camp4" size="11" maxlength="45" value="<?=$VLdtCamp4; ?>"></td>  
            </tr>
        </table>    
	</td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0"  >
  <tr>
    <td><?php echo $VLtxtCampo5; ?></td>
    <td>
    <select name="txt_Camp5">
		<option value="Masculino" <?php if ( $VLdtCamp5 == "Masculino") {?> selected <?php }?>>Masculino</option>
		<option  value="Femenino" <?php if ( $VLdtCamp5 == "Femenino") {?> selected <?php }?>>Femenino</option>
	</select>
    </td>
    <td><?php echo $VLtxtCampo31; ?></td>
    <td><input name="txt_Camp31" type="text" id="txt_Camp31" size="11" maxlength="45" value="<?=$VLdtCamp31; ?>"></td>
    <td><?php echo $VLtxtCampo32; ?></td>
    <td><select name="txt_Camp32">
		<option value="No" <?php if ( $VLdtCamp32 == "No" ) {?> selected <?php }?>  >No</option>
        <option value="Si" <?php if ( $VLdtCamp32 == "Si") {?> selected <?php }?>>Si</option>
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
            <td><input name="txt_Camp28" type="text" id="txt_Camp28" size="10" maxlength="20" value="<?=$VLdtCamp28; ?>"></td>
            <td><?php echo $VLtxtCampo29; ?></td>
            <td>
            <select name="txt_Camp29" >
									<option value="Meztizo" <?php if ($VLdtCamp29 == "Meztizo") {?> selected <?php }?>>Meztizo</option>
									<option value="Montubio" <?php if ( $VLdtCamp29 == "Montubio") {?> selected <?php }?>>Montubio</option>
									<option value="Afroecuatoriano" <?php if ($VLdtCamp29 == "Afroecuatoriano") {?> selected <?php }?>>Afroecuatoriano</option>
									<option value="Indigena" <?php if ( $VLdtCamp29 == "Indigena") {?> selected <?php }?>>Indigena</option>
									<option value="Blanco" <?php if ( $VLdtCamp29 == "Blanco") {?> selected <?php }?>>Blanco</option>
									<option value="Otros" <?php if ( $VLdtCamp29 == "Otros") {?> selected <?php }?>>Otros</option>
									</select></td>
          </tr>
        </table>
    </td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0">
      <tr>
        <td><?php echo $VLtxtCampo30; ?></td>
        <td><select name="txt_Camp30" >
									<option value="5 DE AGOSTO" <?php if (strcmp(trim($VLdtCamp30),trim("5 DE AGOSTO"))==0 ) {?> selected <?php }?>>5 DE AGOSTO</option>
									<option value="BARTOLOME RUIZ" <?php if (strcmp(trim($VLdtCamp30),trim("BARTOLOME RUIZ"))==0) {?> selected <?php }?>>BARTOLOME RUIZ</option>
									<option value="ESMERALDAS" <?php if (strcmp(trim($VLdtCamp30),trim("ESMERALDAS"))==0) {?> selected <?php }?>>ESMERALDAS</option>
									<option value="LUIS TELLO" <?php if (strcmp(trim($VLdtCamp30),trim("LUIS TELLO"))==0) {?> selected <?php }?>>LUIS TELLO</option>
									<option value="SIMON PLATA TORRES" <?php if (strcmp(trim($VLdtCamp30),trim("SIMON PLATA TORRES"))==0) {?> selected <?php }?>>SIMON PLATA TORRES</option>
									<option value="TACHINA" <?php if (strcmp(trim($VLdtCamp30),trim("TACHINA"))==0) {?> selected <?php }?>>TACHINA</option>
									<option value="VUELTA LARGA" <?php if (strcmp(trim($VLdtCamp30),trim("VUELTA LARGA"))==0) {?> selected <?php }?>>VUELTA LARGA</option>
									</select>
        </td>
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
    <table width="100%" border="0" >
      <tr>
        <td>
        <table width="100%" border="0">
          <tr><input type="hidden" name="txt_Camp53" value="<?=$VLdtCamp53; ?>">
            <td><select name="txt_Camp40">
                    <option  value="ABUELO" <?php if ( strcmp(trim($VLdtCamp40),trim("ABUELO"))==0) {?> selected <?php }?>>ABUELO</option>
                    <option  value="BISABUELO" <?php if (  strcmp(trim($VLdtCamp40),trim("BISABUELO"))==0) {?> selected <?php }?>>BISABUELO</option>
                    <option  value="ADOPTIVA" <?php if ( strcmp(trim($VLdtCamp40),trim("ADOPTIVA"))==0) {?> selected <?php }?>>ADOPTIVA</option>
                    <option  value="CRIANZA" <?php if ( strcmp(trim($VLdtCamp40),trim("CRIANZA"))==0) {?> selected <?php }?>>CRIANZA</option>
                    <option  value="MADRE" <?php if (  strcmp(trim($VLdtCamp40),trim("MADRE"))==0) {?> selected <?php }?>>MADRE</option>
                    <option  value="MADRASTRA" <?php if ( strcmp(trim($VLdtCamp40),trim("MADRASTRA"))==0) {?> selected <?php }?>>MADRASTRA</option>
                    <option  value="HERMANO" <?php if ( strcmp(trim($VLdtCamp40),trim("HERMANO"))==0) {?> selected <?php }?>>HERMANO</option>
                    <option value="PADRE" <?php if ( strcmp(trim($VLdtCamp40),trim("PADRE"))==0) {?> selected <?php }?>>PADRE</option>
                    <option value="PADRASTRO" <?php if ( strcmp(trim($VLdtCamp40),trim("PADRASTRO"))==0) {?> selected <?php }?>>PADRASTRO</option>
                    <option  value="PRIMO" <?php if ( strcmp(trim($VLdtCamp40),trim("PRIMO"))==0) {?> selected <?php }?>>PRIMO</option>
                    <option  value="TIO" <?php if ( strcmp(trim($VLdtCamp40),trim("TIO"))==0) {?> selected <?php }?>>TIO</option>
                    <option  value="TUTOR" <?php if ( strcmp(trim($VLdtCamp40),trim("TUTOR"))==0) {?> selected <?php }?>>TUTOR</option>
                    <option  value="OTRO" <?php if ( strcmp(trim($VLdtCamp40),trim("OTRO"))==0) {?> selected <?php }?>>OTRO</option>
                </select>
            </td>
            <td><?php echo $VLtxtCampo41; ?></td>
            <td><input name="txt_Camp41" type="text" id="txt_Camp41" size="20" maxlength="50" value="<?=$VLdtCamp41; ?>"></td>
            <td><?php echo $VLtxtCampo42; ?></td>
            <td><input name="txt_Camp42" type="text" id="txt_Camp42" size="20" maxlength="50" value="<?=$VLdtCamp42; ?>"></td>
            <td><select name="txt_Camp43">
                <option value="Cedula" <?php if ( $VLdtCamp43 == "Cedula") {?> selected <?php }?>>Cedula</option>
                <option  value="CarneRefugiado" <?php if ( $VLdtCamp43 == "CarneRefugiado") {?> selected <?php }?>>CarneRefugiado</option>
                <option value="Pasaporte" <?php if ( $VLdtCamp43 == "Pasaporte") {?> selected <?php }?>>Pasaporte</option>
                <option value="No tiene" <?php if ( $VLdtCamp43 == "No tiene") {?> selected <?php }?>>No tiene</option>
                </select></td>
            <td><input name="txt_Camp44" type="text" id="txt_Camp44" size="11" maxlength="50" value="<?=$VLdtCamp44; ?>"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td><?php echo $VLtxtCampo45; ?></td>
            <td><select name="txt_Camp45">
									<option value="Masculino" <?php if ( $VLdtCamp45 == "Masculino") {?> selected <?php }?>>Masculino</option>
									<option  value="Femenino" <?php if ( $VLdtCamp45 == "Femenino") {?> selected <?php }?>>Femenino</option>
									</select></td>
            <td><?php echo $VLtxtCampo46; ?></td>
            <td><input name="txt_Camp46" type="text" id="txt_Camp46" size="11" maxlength="50" value="<?=$VLdtCamp46; ?>"></td>
            <td><?php echo $VLtxtCampo47; ?></td>
            <td><input name="txt_Camp47" type="text" id="txt_Camp47" size="60" maxlength="100" value="<?=$VLdtCamp47; ?>"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td><?php echo $VLtxtCampo48; ?></td>
            <td><input name="txt_Camp48" type="text" id="txt_Camp48" size="10" maxlength="100" value="<?=$VLdtCamp48; ?>"></td>
            <td><?php echo $VLtxtCampo49; ?></td>
            <td><input name="txt_Camp49" type="text" id="txt_Camp49" size="10" maxlength="100" value="<?=$VLdtCamp49; ?>"></td>
            <td><?php echo $VLtxtCampo50; ?></td>
            <td><input name="txt_Camp50" type="text" id="txt_Camp50" size="20" maxlength="100" value="<?=$VLdtCamp50; ?>"></td>
             <td><?php echo $VLtxtCampo51; ?></td>
            <td><select name="txt_Camp51">
                <option value="CASADO" <?php if ( $VLdtCamp51 == "CASADO") {?> selected <?php }?>>CASADO</option>
                <option  value="SOLTERO" <?php if ( $VLdtCamp51 == "SOLTERO") {?> selected <?php }?>>SOLTERO</option>
                <option value="UNION LIBRE" <?php if ( $VLdtCamp51 == "UNION LIBRE") {?> selected <?php }?>>UNION LIBRE</option>
                <option value="DIVORCIADO" <?php if ( $VLdtCamp51 == "DIVORCIADO") {?> selected <?php }?>>DIVORCIADO</option>
                <option value="VIUDO" <?php if ( $VLdtCamp51 == "VIUDO") {?> selected <?php }?>>VIUDO</option>
                </select></td>
             <td><?php echo $VLtxtCampo52; ?></td>
            <td><select name="txt_Camp52">
                <option value="Si" <?php if ( strcmp(trim($VLdtCamp52),trim("Si"))==0) {?> selected <?php }?>>Si</option>
                <option  value="No" <?php if ( strcmp(trim($VLdtCamp52),trim("No"))==0) {?> selected <?php }?>>No</option>
                </select></td>

          </tr>
        </table></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0" >
      <tr>
        <td>
        <table width="100%" border="0">
          <tr><input type="hidden" name="txt_Camp73" value="<?=$VLdtCamp73; ?>">
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
            <td><input name="txt_Camp61" type="text" id="txt_Camp61" size="20" maxlength="50" value="<?=$VLdtCamp61; ?>"></td>
            <td><?php echo $VLtxtCampo62; ?></td>
            <td><input name="txt_Camp62" type="text" id="txt_Camp62" size="20" maxlength="50" value="<?=$VLdtCamp62; ?>"></td>
            <td><select name="txt_Camp63">
                <option value="Cedula" <?php if ( $VLdtCamp63 == "Cedula") {?> selected <?php }?>>Cedula</option>
                <option  value="CarneRefugiado" <?php if ( $VLdtCamp63 == "CarneRefugiado") {?> selected <?php }?>>CarneRefugiado</option>
                <option value="Pasaporte" <?php if ( $VLdtCamp63 == "Pasaporte") {?> selected <?php }?>>Pasaporte</option>
                <option value="No tiene" <?php if ( $VLdtCamp63 == "No tiene") {?> selected <?php }?>>No tiene</option>
                </select></td>
            <td><input name="txt_Camp64" type="text" id="txt_Camp64" size="11" maxlength="50" value="<?=$VLdtCamp64; ?>"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td><?php echo $VLtxtCampo65; ?></td>
            <td><select name="txt_Camp65">
									<option value="Masculino" <?php if ( $VLdtCamp65 == "Masculino") {?> selected <?php }?>>Masculino</option>
									<option  value="Femenino" <?php if ( $VLdtCamp65 == "Femenino") {?> selected <?php }?>>Femenino</option>
									</select></td>
            <td><?php echo $VLtxtCampo66; ?></td>
            <td><input name="txt_Camp66" type="text" id="txt_Camp66" size="11" maxlength="50" value="<?=$VLdtCamp66; ?>"></td>
            <td><?php echo $VLtxtCampo67; ?></td>
            <td><input name="txt_Camp67" type="text" id="txt_Camp67" size="60" maxlength="100" value="<?=$VLdtCamp67; ?>"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td><?php echo $VLtxtCampo68; ?></td>
            <td><input name="txt_Camp68" type="text" id="txt_Camp68" size="10" maxlength="100" value="<?=$VLdtCamp68; ?>"></td>
            <td><?php echo $VLtxtCampo69; ?></td>
            <td><input name="txt_Camp69" type="text" id="txt_Camp69" size="10" maxlength="100" value="<?=$VLdtCamp69; ?>"></td>
            <td><?php echo $VLtxtCampo70; ?></td>
            <td><input name="txt_Camp70" type="text" id="txt_Camp70" size="20" maxlength="100" value="<?=$VLdtCamp70; ?>"></td>
             <td><?php echo $VLtxtCampo71; ?></td>
            <td><select name="txt_Camp71">
                <option value="CASADO" <?php if ( $VLdtCamp71 == "CASADO") {?> selected <?php }?>>CASADO</option>
                <option  value="SOLTERO" <?php if ( $VLdtCamp71 == "SOLTERO") {?> selected <?php }?>>SOLTERO</option>
                <option value="UNION LIBRE" <?php if ( $VLdtCamp71 == "UNION LIBRE") {?> selected <?php }?>>UNION LIBRE</option>
                <option value="DIVORCIADO" <?php if ( $VLdtCamp71 == "DIVORCIADO") {?> selected <?php }?>>DIVORCIADO</option>
                <option value="VIUDO" <?php if ( $VLdtCamp71 == "VIUDO") {?> selected <?php }?>>VIUDO</option>
                </select></td>
             <td><?php echo $VLtxtCampo72; ?></td>
            <td><select name="txt_Camp72">
                <option value="Si" <?php if ( $VLdtCamp72 == "Si") {?> selected <?php }?>>Si</option>
                <option  value="No" <?php if ( $VLdtCamp72 == "No") {?> selected <?php }?>>No</option>
                </select></td>

          </tr>
        </table></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0" >
      <tr>
        <td>
        <table width="100%" border="0">
          <tr><input type="hidden" name="txt_Camp93" value="<?=$VLdtCamp93; ?>">
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
            <td><input name="txt_Camp81" type="text" id="txt_Camp81" size="20" maxlength="50" value="<?=$VLdtCamp81; ?>"></td>
            <td><?php echo $VLtxtCampo82; ?></td>
            <td><input name="txt_Camp82" type="text" id="txt_Camp82" size="20" maxlength="50" value="<?=$VLdtCamp82; ?>"></td>
            <td><select name="txt_Camp83">
                <option value="Cedula" <?php if ( $VLdtCamp83 == "Cedula") {?> selected <?php }?>>Cedula</option>
                <option  value="CarneRefugiado" <?php if ( $VLdtCamp83 == "CarneRefugiado") {?> selected <?php }?>>CarneRefugiado</option>
                <option value="Pasaporte" <?php if ( $VLdtCamp83 == "Pasaporte") {?> selected <?php }?>>Pasaporte</option>
                <option value="No tiene" <?php if ( $VLdtCamp83 == "No tiene") {?> selected <?php }?>>No tiene</option>
                </select></td>
            <td><input name="txt_Camp84" type="text" id="txt_Camp84" size="11" maxlength="50" value="<?=$VLdtCamp84; ?>"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td><?php echo $VLtxtCampo85; ?></td>
            <td><select name="txt_Camp85">
									<option value="Masculino" <?php if ( $VLdtCamp85 == "Masculino") {?> selected <?php }?>>Masculino</option>
									<option  value="Femenino" <?php if ( $VLdtCamp85 == "Femenino") {?> selected <?php }?>>Femenino</option>
									</select></td>
            <td><?php echo $VLtxtCampo86; ?></td>
            <td><input name="txt_Camp86" type="text" id="txt_Camp86" size="11" maxlength="50" value="<?=$VLdtCamp86; ?>"></td>
            <td><?php echo $VLtxtCampo87; ?></td>
            <td><input name="txt_Camp87" type="text" id="txt_Camp87" size="60" maxlength="100" value="<?=$VLdtCamp87; ?>"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td><?php echo $VLtxtCampo88; ?></td>
            <td><input name="txt_Camp88" type="text" id="txt_Camp88" size="10" maxlength="100" value="<?=$VLdtCamp88; ?>"></td>
            <td><?php echo $VLtxtCampo89; ?></td>
            <td><input name="txt_Camp89" type="text" id="txt_Camp89" size="10" maxlength="100" value="<?=$VLdtCamp89; ?>"></td>
            <td><?php echo $VLtxtCampo90; ?></td>
            <td><input name="txt_Camp90" type="text" id="txt_Camp90" size="20" maxlength="100" value="<?=$VLdtCamp90; ?>"></td>
             <td><?php echo $VLtxtCampo91; ?></td>
            <td><select name="txt_Camp91">
                <option value="CASADO" <?php if ( $VLdtCamp91 == "CASADO") {?> selected <?php }?>>CASADO</option>
                <option  value="SOLTERO" <?php if ( $VLdtCamp91 == "SOLTERO") {?> selected <?php }?>>SOLTERO</option>
                <option value="UNION LIBRE" <?php if ( $VLdtCamp91 == "UNION LIBRE") {?> selected <?php }?>>UNION LIBRE</option>
                <option value="DIVORCIADO" <?php if ( $VLdtCamp91 == "DIVORCIADO") {?> selected <?php }?>>DIVORCIADO</option>
                <option value="VIUDO" <?php if ( $VLdtCamp91 == "VIUDO") {?> selected <?php }?>>VIUDO</option>
                </select></td>
             <td><?php echo $VLtxtCampo92; ?></td>
            <td><select name="txt_Camp92">
                <option value="Si" <?php if ( $VLdtCamp92 == "Si") {?> selected <?php }?>>Si</option>
                <option  value="No" <?php if ( $VLdtCamp92 == "No") {?> selected <?php }?>>No</option>
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
                    <table width="100%" border="0" >
                      <tr>
                        <td><?php echo $VLtxtCampo100; ?></td>
                        <td><select name="txt_Camp100">
                <option value="ORGANIZADO" <?php if ( $VLdtCamp100 == "ORGANIZADO") {?> selected <?php }?>>ORGANIZADO</option>
                <option  value="DESORGANIZADO" <?php if ( $VLdtCamp100 == "DESORGANIZADO") {?> selected <?php }?>>DESORGANIZADO</option>
                <option value="COMPLETO" <?php if ( $VLdtCamp100 == "COMPLETO") {?> selected <?php }?>>COMPLETO</option>
                <option value="INCOMPLETO" <?php if ( $VLdtCamp100 == "INCOMPLETO") {?> selected <?php }?>>INCOMPLETO</option>
                </select></td>
                        <td><?php echo $VLtxtCampo101; ?></td>
                        <td><select name="txt_Camp101">
                <option value="MADRE" <?php if ( $VLdtCamp101 == "SOLO MADRE") {?> selected <?php }?>>SOLO MADRE</option>
                <option  value="PADRE" <?php if ( $VLdtCamp101 == "SOLO PADRE") {?> selected <?php }?>>SOLO PADRE</option>
                <option value="MADRE Y PADRE" <?php if ( $VLdtCamp101 == "MADRE Y PADRE") {?> selected <?php }?>>MADRE Y PADRE</option>
                <option value="OTROS" <?php if ( $VLdtCamp101 == "OTROS") {?> selected <?php }?>>OTROS</option>
                </select></td>
                        <td><?php echo $VLtxtCampo102; ?></td>
                        <td><input name="txt_Camp102" type="text" id="txt_Camp102" size="30" maxlength="50" value="<?=$VLdtCamp102; ?>"></td>
                      </tr>
                    </table>
                  </td>
                  </tr>
                  <tr>
                    <td>
                    <table width="100%" border="0" >
                      <tr>
                        <td><?php echo $VLtxtCampo103; ?></td>
                        <td><input name="txt_Camp103" type="text" id="txt_Camp103" size="10" maxlength="10" value="<?=$VLdtCamp103; ?>"></td>
                        <td><?php echo $VLtxtCampo104; ?></td>
                        <td><input name="txt_Camp104" type="text" id="txt_Camp104" size="10" maxlength="10" value="<?=$VLdtCamp104; ?>"></td>
                        <td><?php echo $VLtxtCampo105; ?></td>
                        <td><input name="txt_Camp105" type="text" id="txt_Camp105" size="10" maxlength="10" value="<?=$VLdtCamp105; ?>"></td>
                      </tr>
                    </table>
					</td>
                  </tr>
                  <tr>
                    <td>
                    <table width="100%" border="0" >
                      <tr>
                        <td><?php echo $VLtxtCampo106; ?></td>
                        <td><input name="txt_Camp106" type="text" id="txt_Camp106" size="10" maxlength="10" value="<?=$VLdtCamp106; ?>"></td>
                        <td><?php echo $VLtxtCampo107; ?></td>
                        <td><input name="txt_Camp107" type="text" id="txt_Camp107" size="30" maxlength="60" value="<?=$VLdtCamp107; ?>"></td>
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
                <table width="100%" border="0" >
                  <tr>
                    <td>
                    <table width="100%" border="0" >
                      <tr>
                        <td><?php echo $VLtxtCampo110; ?></td>
                        <td><select name="txt_Camp110">
                <option value="EXCELENTE" <?php if ( $VLdtCamp110 == "EXCELENTE") {?> selected <?php }?>>EXCELENTE</option>
                <option  value="BUENO" <?php if ( $VLdtCamp110 == "BUENO") {?> selected <?php }?>>BUENO</option>
                <option value="REGULAR" <?php if ( $VLdtCamp110 == "REGULAR") {?> selected <?php }?>>REGULAR</option>
                <option value="CON DIFICULTAD" <?php if ( $VLdtCamp110 == "CON DIFICULTAD") {?> selected <?php }?>>CON DIFICULTAD</option>
                <option value="DEFICIENTE" <?php if ( $VLdtCamp110 == "DEFICIENTE") {?> selected <?php }?>>DEFICIENTE</option>
                </select></td>
                        <td><?php echo $VLtxtCampo111; ?></td>
                        <td><select name="txt_Camp111">
                <option value="PROPIA" <?php if ( $VLdtCamp111 == "PROPIA") {?> selected <?php }?>>PROPIA</option>
                <option  value="ARRENDADA" <?php if ( $VLdtCamp111 == "ARRENDADA") {?> selected <?php }?>>ARRENDADA</option>
                <option value="FAMILIAR" <?php if ( $VLdtCamp111 == "FAMILIAR") {?> selected <?php }?>>FAMILIAR</option>
                <option value="CEDIDA" <?php if ( $VLdtCamp111 == "CEDIDA") {?> selected <?php }?>>CEDIDA</option>
                <option value="PRESTADA" <?php if ( $VLdtCamp111 == "PRESTADA") {?> selected <?php }?>>PRESTADA</option>
                <option value="ANTICRESIS" <?php if ( $VLdtCamp111 == "ANTICRESIS") {?> selected <?php }?>>ANTICRESIS</option>
                <option value="CON PRESTAMO" <?php if ( $VLdtCamp111 == "CON PRESTAMO") {?> selected <?php }?>>CON PRESTAMO</option>
                </select></td>
                        <td><?php echo $VLtxtCampo112; ?></td>
                        <td><input name="txt_Camp112" type="text" id="txt_Camp112" size="40" maxlength="100" value="<?=$VLdtCamp112; ?>"></td>
                      </tr>
                    </table>
                    </td>
                  </tr>
                  <tr>
                    <td>                    
                    <table width="100%" border="0" cellspacing="0" cellpadding="1">
                      <tr>
                        <td><?php echo $VLtxtCampo113; ?></td>
                        <td><input name="txt_Camp113" type="text" id="txt_Camp113" size="30" maxlength="100" value="<?=$VLdtCamp113; ?>"></td>
                        <td><?php echo $VLtxtCampo114; ?></td>
                        <td><input name="txt_Camp114" type="text" id="txt_Camp114" size="30" maxlength="100" value="<?=$VLdtCamp114; ?>"></td>
                      </tr>
                    </table>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    <table width="100%" border="0" >
                      <tr>
                        <td><?php echo $VLtxtCampo115; ?></td>
                        <td><input name="txt_Camp115" type="text" id="txt_Camp115" size="30" maxlength="100" value="<?=$VLdtCamp115; ?>"></td>
                        <td><?php echo $VLtxtCampo116; ?></td>
                        <td><input name="txt_Camp116" type="text" id="txt_Camp116" size="30" maxlength="100" value="<?=$VLdtCamp116; ?>"></td>
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
            <table width="100%" border="0" >
              <tr>
                <td>
                <table width="100%" border="0" >
                  <tr>
                    <td><?php echo $VLtxtCampo120; ?></td>
                    <td><input name="txt_Camp120" type="text" id="txt_Camp120" size="60" maxlength="100" value="<?=$VLdtCamp120; ?>"></td>
                    <td><?php echo $VLtxtCampo121; ?></td>
                    <td><select name="txt_Camp121">
                <option  value="No" <?php if ( $VLdtCamp121 == "No") {?> selected <?php }?>>No</option>
                <option value="Si" <?php if ( $VLdtCamp121 == "Si") {?> selected <?php }?>>Si</option>
                </select></td>
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
      <table width="100%" border="0" >
          <tr>
            <td>
                <table width="100%" border="0" >
                  <tr>
                    <td>DEPARTAMENTO PASTORAL</td>
                  </tr>
                  <tr>
                    <td>
                    <table width="100%" border="0" >
                      <tr>
                        <td>
                        <table width="100%" border="0" >
                          <tr>
                            <td><?php echo $VLtxtCampo122; ?></td>
                            <td><input name="txt_Camp122" type="text" id="txt_Camp122" size="20" maxlength="100" value="<?=$VLdtCamp122; ?>"></td>
                            <td><?php echo $VLtxtCampo123; ?></td>
                            <td><input name="txt_Camp123" type="text" id="txt_Camp123" size="20" maxlength="100" value="<?=$VLdtCamp123; ?>"></td>
                          </tr>
                        </table>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <table width="100%" border="0" >
                              <tr>
                                <td><?php echo $VLtxtCampo124; ?></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td><?php echo $VLtxtCampo125; ?><select name="txt_Camp125">
        <option value="Si" <?php if ( $VLdtCamp125 == "Si") {?> selected <?php }?>>Si</option>
		<option value="No" <?php if ( $VLdtCamp125 == "No" ) {?> selected <?php }?>  >No</option>
	</select> </td>
                                <td><?php echo $VLtxtCampo126; ?><select name="txt_Camp126">
		<option value="No" <?php if ( $VLdtCamp126 == "No" ) {?> selected <?php }?>  >No</option>
        <option value="Si" <?php if ( $VLdtCamp126 == "Si") {?> selected <?php }?>>Si</option>
	</select></td>
                                <td><?php echo $VLtxtCampo127; ?><select name="txt_Camp127">
		<option value="No" <?php if ( $VLdtCamp127 == "No" ) {?> selected <?php }?>  >No</option>
        <option value="Si" <?php if ( $VLdtCamp127 == "Si") {?> selected <?php }?>>Si</option>
	</select></td>
                                <td><?php echo $VLtxtCampo128; ?><select name="txt_Camp128">
		<option value="No" <?php if ( $VLdtCamp128 == "No" ) {?> selected <?php }?>  >No</option>
        <option value="Si" <?php if ( $VLdtCamp128 == "Si") {?> selected <?php }?>>Si</option>
	</select></td>
                              </tr>
                            </table>
                        </td>
                      </tr>
                      <tr>
                        <td>
                        <table width="100%" border="0"  >
                          <tr>
                            <td><?php echo $VLtxtCampo129; ?></td>
                          </tr>
                          <tr>
                            <td><textarea name="txtCampo129" cols="90" rows="3" ><?php echo $VLdtCampo129; ?></textarea></td>
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
      </table>

      </td>
  </tr>
</table>
        </fieldset>
        </td>
	</tr>		
</table>
<table width="100%" border="0">
 <tr>
	<td ><fieldset  >
						  <legend >Datos</legend>
						<table width="100%" border="0">
						  <tr>
							<td width="50%"><table width="100%" border="0">
                              <tr>
                                <td width="26%" align="right"><?php echo $VLtxtCampo6; ?>:</td>
                                <td width="74%">
<?php
		if ( $vlccn=="modificar")
		{ $Vtquery = $VLQry12; } else { $Vtquery = $VLQry10; }
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
		$VLnuDatos = total_records($VLdtDatos);
?>                                
<select name="txt_Camp6" <? if($VLdtCamp1!=""){ ?> disabled="disabled" <? } ?> >

<?php
	if ($VLnuDatos >0) {
		for ( $i=0; $i<$VLnuDatos; $i++)
		{
				$VTCamp6=get_result($VLdtDatos,$i,$VLQryCampo6);
				$VTCamp8=get_result($VLdtDatos,$i,$VLQryCampo8);
				$VTCamp10=get_result($VLdtDatos,$i,$VLQryCampo10);
				$VTCamp15=get_result($VLdtDatos,$i,$VLQryCampo15);
				
				
?>
    <option value="<?php echo $VTCamp6; ?>" <?php if ( $VLdtCamp6 == $VTCamp6) { $VLdtCamp10= $VTCamp10;   ?> selected <?php }?>><?php echo $VTCamp8."(".$VTCamp15.")"; ?></option>
                                    
 <?php
		}
 
	}		
?>                                   

</select>                                
                                
                                
                                &nbsp;</td>
                              </tr>
                              <tr>
                                <td width="26%" align="right"><?php echo $VLtxtCampo1; ?>:</td>
                                <td width="74%"><table>
                                	<tr>
                                    	<td><input name="txt_Camp1" type="text" id="txt_Camp1" size="11" maxlength="11"  readonly="1" value="<?=$VLdtCamp1; ?>"></td>
                                        <td><select name="txt_Camp13">
                                  <option  value="MATUTINA" <?php if (strcmp(trim($VLdtCamp13),trim("MATUTINA"))==0){ ?> selected <?php } ?> >MATUTINA
                                  <option  value="VESPERTINA" <?php if (strcmp(trim($VLdtCamp13),trim("VESPERTINA"))==0){ ?> selected <?php } ?>>VESPERTINA
                                  <option  value="NOCTURNA" <?php if (strcmp(trim($VLdtCamp13),trim("NOCTURNA"))==0){ ?> selected <?php } ?>>NOCTURNA
								</select>
                                        </td>
                                        <td><select name="txt_Camp14">
                                  <option  value="1" <?php if ($VLdtCamp14==1){ ?> selected <?php } ?> >Ver 2.0
                                  <option  value="0" <?php if ($VLdtCamp14==0){ ?> selected <?php } ?>>Ver 1.0
								</select>
                                        </td>
                                    </tr></table>
                                </td>
                              </tr>
                              <tr>
                                <td align="right"><?php echo $VLtxtCampo2; ?>:</td>
                                <td><input name="txt_Camp2" type="text" id="txt_Camp2" size="40" maxlength="45" value="<?=$VLdtCamp2; ?>"></td>
                              </tr>
                              <tr>
                                <td align="right"><?php echo $VLtxtCampo3; ?>: </td>
                                <td><input name="txt_Camp3" type="text" id="txt_Camp3" size="40" maxlength="12" value="<?=$VLdtCamp3; ?>"></td>
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
    <td><input name="txt_Camp7" type="hidden" value="<?=$VLdtCamp7; ?>"  /><input name="txt_Camp10" type="hidden" value="<?=$VLdtCamp10; ?>"  /> <? //echo $VLdtCamp10."-".$VLdtCamp7; ?> 
    &nbsp;</td>
    <td>&nbsp;</td>
    <td><? //echo $VTRegistros; ?>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    
 <?php 
 ////////////////  CONFIRMAMOS EL ESTADO DEL QUIMESTRE
 if ( $VLdtCamp10==1 ){
	 ///////////////// ESTA CREADO EL QUIMESTRE NO PODEMOS GENERAR PARCIAL
	 $VTEstado=1;
	 }else{
		 if($VLdtCamp10==2 || $VLdtCamp10==3 ){
	//////////////// ESTA GENERADO EL QUIMESTRE PODEMOS GENERAR PARCIAL
		 	if($VLdtCamp7==1)
			{
	 			$VTEstado=1;//creado
			}
		 	if($VLdtCamp7==2)
			{
	 			$VTEstado=2;// generado
			}
		 	if($VLdtCamp7==3)
			{
	 			$VTEstado=3;// abierto
			}
		 	if($VLdtCamp7==4)
			{
	 			$VTEstado=4;// cerrado
			}
		 }else{
	 			$VTEstado=5;//otro
		 }
	 }
 ?>   
    <td align="center"><? //echo $VLdtCamp10."-".$VLdtCamp7."/".$VTEstado; ?>
      	<input type="submit" name="GENERAR" id="GENERAR" value="GENERAR" <?php if($VTEstado>1){ ?> disabled="disabled" <?php } ?>  />
    </td>
    <td align="center">&nbsp;</td>
    <td align="center"><input type="submit" name="ABRIR" id="ABRIR" value="ABRIR"  disabled="disabled"  /></td>
    <td>&nbsp;</td>
    <td align="center">
        <input type="submit" name="CERRADO" id="CERRADO" value="CERRADO" <?php if($VTEstado==1 || $VTEstado==4 ){ ?> disabled="disabled" <?php } ?> />

    </td>
    <td>&nbsp;</td>
  </tr>
</table>

        </fieldset>
        </td>
    </tr>	
</table>
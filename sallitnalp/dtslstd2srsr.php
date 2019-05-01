<table width="100%" border="0">
 <tr>
	<td ><fieldset  >
          <legend >Datos</legend>
        <table width="100%" border="0">
          <tr>
            <td width="50%"><table width="100%" border="0">
              <tr>
                <td width="26%"><?php echo $VLtxtCampo2; ?>:</td>
                <td width="74%"><input name="txt_Camp2" type="text" id="txt_Camp2" size="11" maxlength="11"  readonly="1" value="<?=$VLdtCamp2; ?>"></td>
              </tr>
              <tr>
                <td><?php echo $VLtxtCampo8; ?>:</td>
                <td><input name="txt_Camp8" type="text" id="txt_Camp8" size="40" maxlength="40" value="<?=$VLdtCamp8; ?>"></td>
              </tr>
              <tr>
                <td><?php echo $VLtxtCampo9; ?>: </td>
                <td><input name="txt_Camp9" type="text" id="txt_Camp9" size="40" maxlength="40" value="<?=$VLdtCamp9; ?>"></td>
              </tr>
              <tr>
                <td><?php echo $VLtxtCampo10; ?>: </td>
                <td><input name="txt_Camp10" type="text" id="txt_Camp10" size="40" maxlength="40" value="<?=$VLdtCamp10; ?>"></td>
              </tr>
            </table>							
            </td>
            <td width="50%">
            <table width="100%" border="0">
              <tr>
                <td width="26%"><?php echo $VLtxtCampo1; ?>:</td>
                <td width="76%"><input name="txt_Camp1" type="text" id="txt_Camp1" size="11" maxlength="11"  readonly="1" value="<?=$VLdtCamp1; ?>"></td>
              </tr>
              <tr>
                <td><?php echo $VLtxtCampo3; ?>:</td>
                <td><input name="txt_Camp3" type="text" id="txt_Camp3" size="40" maxlength="40" value="<?=$VLdtCamp3; ?>"></td>
              </tr>
              <tr>
                <td><?php echo $VLtxtCampo4; ?>:</td>
                <td><input name="txt_Camp4" type="text" id="txt_Camp4" size="40" maxlength="40" value="<?=$VLdtCamp4; ?>"></td>
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
        <legend >Perfiles</legend>
        <table width="100%" border="0">
        <?php 
////// SE CONSULTAN LOS PERFILES ASIGNADOS
		if ($VLdtCamp1!=""){
			$Vtquery6 = $VLQry9.$VLQry5.$VLQryCampo1."=".$VLdtCamp1." and anocodigo=".$VLAnoLocal ;
			$VLdtDatos6 = execute_query($Vtquery6,$VLConexion);
			$VLnuDatos6 = total_records($VLdtDatos6);
		} else { $VLnuDatos6=0;}
//////  SE CONSULTAN TODAS LOS PERFILES		
		$Vtquery = $VLQry2 ;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
		$VLnuDatos = total_records($VLdtDatos);
		if ( $VLnuDatos>0)
		{
			for( $i=0; $i<$VLnuDatos; $i++)
			{
				$VTCampo11=get_result($VLdtDatos,$i,$VLQryCampo11);
				$VTCampo12=get_result($VLdtDatos,$i,$VLQryCampo12);	
				$Selecion=0;
				if ($VLnuDatos6>0)
				{
					for($j=0; $j<$VLnuDatos6; $j++)
					{
						$VTCampo11_temp=get_result($VLdtDatos6,$j,$VLQryCampo11);
						if ($VTCampo11_temp==$VTCampo11)
						{
							$Selecion=1;
							$j=$VLnuDatos6;
						}	
						
					}
						
				}
							
		 ?>
          <tr>
            <td align="right" width="50%" ><?=$VTCampo12; ?></td>
            <td align="left" ><input type="checkbox" name="txt_Camp11[]" value="<?php echo $VTCampo11; ?>" <?php if ($Selecion==1){ ?> checked="checked" <?php } ?> ></td>
          </tr>
          <?php
			}
		}
		  ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>

        </fieldset>
        </td>
   </tr>	
</table>
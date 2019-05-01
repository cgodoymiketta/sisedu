<table width="100%" border="0">
 	<tr>
		<td ><?php echo " - ".$numero1; ?>
			<table width="100%" border="0">
				  <tr>
					<td><?=$VLtxtCampo1; ?>:<input name="txt_Camp12" type="hidden" value="<?=$VLdtCamp12; ?>" /></td>
					<td><input name="txt_Camp1" type="text" id="txt_Camp1" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp1; ?>"></td>
					<td><?=$VLtxtCampo2; ?>:</td>
					<td><input name="txt_Camp2" type="text" id="txt_Camp2" size="30" maxlength="45" readonly="1" value="<?=$VLdtCamp2; ?>"></td>
					<td><?=$VLtxtCampo4; ?>:</td>
					<td><input name="txt_Camp4" type="text" id="txt_Camp3" size="10" maxlength="9"  readonly="1" value="<?=$VLdtCamp4; ?>"></td>
					<td><?=$VLtxtCampo5; ?>:</td>
					<td><input name="txt_Camp5" type="text" id="txt_Camp3" size="10" maxlength="9"  readonly="1" value="<?=$VLdtCamp5; ?>"></td>
				  </tr>
			</table>	
		</td>
	</tr>
	<tr>
		<td align="center">	
			<table width="30%" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%" align="center"><?=$VLtxtCampo12; ?></td>
                <td width="60%" align="center"><?=$VLtxtCampo13; ?></td>
                <td width="20%" align="center"><?=$VLtxtCampo8; ?></td>
              </tr>
<?php  
//// consultamos los grpprll q tengan esa especialidad
		$VtqueryGP = $VLQry15." ".$VLQry9." ".$VLQryCampo12."=".$VLdtCamp12 ;
		$VLdtDatosGP = execute_query($VtqueryGP,$VLConexion);  ///// reuperamos las especialidades
		$VLnuDatosGP = total_records($VLdtDatosGP);
//// consultamos los paralelos
		$Vtquery = $VLQry14.$VLQry9.$VLQryCampo13."=1 ".$VLQry16;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);  ///// reuperamos las especialidades
		$VLnuDatos = total_records($VLdtDatos);
		if ( $VLnuDatos>0 )
		{
			for( $i=0; $i<$VLnuDatos; $i++)
			{	
				$VTCampo11=get_result($VLdtDatos,$i,$VLQryCampo11); /// codigo paralelo
				$VTCampo14=get_result($VLdtDatos,$i,$VLQryCampo14); /// descripcion paralelo
				
?>
              <tr>
                <td align="center"><?=$VTCampo11; ?></td>
                <td align="center"><?=$VTCampo14; ?></td>
<?php  
				for ($j=0; $j<$VLnuDatosGP; $j++)
				{
					$VTCampo11a=get_result($VLdtDatosGP,$j,$VLQryCampo11);
					if( $VTCampo11a==$VTCampo11){ $activo="si"; $j=$VLnuDatosGP;	}else {  $activo="no"; }
				}
?>
                <td align="center"><input type="checkbox" name="txt_Camp8[]" value="<?php echo $VTCampo11; ?>" <?php  
		if ($activo=="si"){ ?> checked="checked" <?php } ?> ></td>
              </tr>
<?php  
		}}
?>
            </table>

		</td>
	</tr>		
</table>
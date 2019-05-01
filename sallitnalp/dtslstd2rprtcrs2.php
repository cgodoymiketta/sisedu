<table width="100%" border="0">
	<?php 
		if ($vlccn=="reportes")
		{ 
	?>
		
 	<tr>
		<td >
<?php 
//////////////////////// PARA SELECCIONAR LOS REPORTE A SACAR ///
?>
			<table width="100%" border="0">
  <tr>
    <td width="10%">&nbsp;</td>
    <td width="80%" align="center">REPORTES AGRUPADOS POR EL CURSO :</td>
    <td width="10%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table width="100%" border="0">
      <tr>
        <td width="70%">REPORTE
        <input name="dt2" type="hidden" id="dt2" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp1; ?>">
        <input name="dt3" type="hidden" id="dt3" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp4; ?>"></td>
        <td width="10%">&nbsp;</td>
        <td width="20%">PARALELO</td>
      </tr>
      <tr>
        <td> 
          <input type="submit" name="estudiante" id="estudiante" value="ESTUDIANTE" />
          </td>
        <td>&nbsp;</td>
        <td>
        <?php 
		
				$Vtqueryf = "Select p.parcodigo, p.pardescripcion from grpprll gp, grp g , prll p";
				$Vtqueryf.=" where anocodigo=".$VLAnoLocal;
				$Vtqueryf.=" and espcodigo=".$VLdtCamp1;
				$Vtqueryf.=" and curcodigo=".$VLdtCamp4;
				$Vtqueryf.=" and gp.parcodigo=p.parcodigo and gp.grucodigo=g.grucodigo" ;
				
				
				$VLdtDatosf = execute_query($Vtqueryf,$VLConexion);
		
		?>
        
<select name="dt1">
			  <?php 
			  //	
				$VLnuDatosf = total_records($VLdtDatosf);
			  	if ( $VLnuDatosf>0 )
				{ 

			  	for ( $i=0; $i<$VLnuDatosf; $i++)
				{
					$VTCampo11=get_result($VLdtDatosf,$i,"p.parcodigo");
					$VTCampo12=get_result($VLdtDatosf,$i,"p.pardescripcion");
					
			   ?>
					<option value="<?php echo $VTCampo11; ?>"><?php echo $VTCampo12; ?>
				 <?php	
					
			   	}
			  }
			   ?>
				  </select>        
        </td>
      </tr>
      <tr>
        <td>HORARIO</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>MATERIAS</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>PROFESORES</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><? ///=$Vtqueryf. "-".$VLnuDatosf; ?>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
	
<?php 
//////////////////////// FIN DEL LISTADO DE REPORTES ///
?>
		</td>
	</tr>

	<?php 

		} // si es nuevo final 
		else { // si no es nuevo inicio
	
	?>
 	<tr>
		<td >
			<table width="100%" border="0">
				  <tr>

					<td><input name="txt_Camp1" type="hidden" id="txt_Camp1" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp1; ?>"><?=$VLtxtCampo2; ?>:</td>
					<td><input name="txt_Camp2" type="text" id="txt_Camp2" size="30" maxlength="45" readonly="1" value="<?=$VLdtCamp2; ?>"></td>
					<td><input name="txt_Camp4" type="hidden" id="txt_Camp4" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp4; ?>"><?=$VLtxtCampo5; ?>:</td>
					<td><input name="txt_Camp5" type="text" id="txt_Camp5" size="10" maxlength="9"  readonly="1" value="<?=$VLdtCamp5; ?>"></td>					
					<td><input name="txt_Camp15" type="hidden" id="txt_Camp15" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp15; ?>"><?=$VLtxtCampo12; ?>:</td>
					<td>
						<select name="critero2">
							<option value="Asignadas">Asignadas
			  <?php 
			  //	Familias
				$Vtqueryf = $VLQry14;
				$VLdtDatosf = execute_query($Vtqueryf,$VLConexion);
				$VLnuDatosf = total_records($VLdtDatosf);
			  	if ( $VLnuDatosf<1 )
				{ 
				// si no existen Familias

			  } else 
			  {
			  	for ( $i=0; $i<$VLnuDatosf; $i++)
				{
					$VTCampo11=get_result($VLdtDatosf,$i,$VLQryCampo11);
					$VTCampo12=get_result($VLdtDatosf,$i,$VLQryCampo12);
					if ($VLdtCriterio2==$VTCampo11)
					{
			   ?>
					<option value="<?php echo $VTCampo11; ?>" selected><?php echo $VTCampo12; ?>
			   <?php 
			   		} else {
				 ?>
					<option value="<?php echo $VTCampo11; ?>"><?php echo $VTCampo12; ?>
				 <?php	
					}
			   	}
			  }
			   ?>
						</select>
					<td>&nbsp;</td>
					<td><input name="consultar2" type="image" id="consultar2" onClick="sumit" src="imagenes/0025-searchx24.gif" alt="consultar2" width="24" height="24" border="0" value="consultar2">&nbsp;</td>
				  </tr>
			</table>	
		</td>
	</tr>
	<tr>
		<td align="center">	
			<table  border="0">
			  <tr>
			  <?php 
			  //	recuperamos las materias
				$Vtquerym = $VLQry15;
				$Vtqueryg = $VLQry18." and ".$VLQryCampo15."=".$VLdtCamp15;
				$Vtqueryg .= " and ".$VLQryCampo16."=1";
				if ($VLConsultar2!="" || $VLdtCriterio2!="" )
				{
					if ($VLdtCriterio2 != "Asignadas")
					{
						$Vtquerym .= $VLQry9.$VLQryCampo11."=".$VLdtCriterio2;
					} else
					{
						$Vtquerym .= $VLQry9.$VLQryCampo13." in (";
						$Vtquerym .= $VLQry24.$VLQry9.$VLQryCampo16."=1".$VLQry22 ;
						$Vtquerym .= $VLQryCampo15."=".$VLdtCamp15.$VLQry5;
					}
				}
				
				$Vtquerym .= $VLQry16;
				$VLdtDatosm = execute_query($Vtquerym,$VLConexion);
				$VLnuDatosm = total_records($VLdtDatosm);
				$VLdtDatosg = execute_query($Vtqueryg,$VLConexion);
				$VLnuDatosg = total_records($VLdtDatosg);
				
			  	if ( $VLnuDatosm<1 )
				{ 
				
				} else {
				$j=0;
			  	for ( $i=0; $i<$VLnuDatosm; $i++)
				{
					$VTCampo13=get_result($VLdtDatosm,$i,$VLQryCampo13);
					$VTCampo14=get_result($VLdtDatosm,$i,$VLQryCampo14);
					$seleccion= " ";
					
					if ( $VLnuDatosg > 0 )
					{
						for ($k=0; $k<$VLnuDatosg; $k++)
						{
							$VTCampo13_existente=get_result($VLdtDatosg,$k,$VLQryCampo13);
							if ($VTCampo13_existente==$VTCampo13)
							{
								$seleccion=" checked ";
							}
						}
					}
					if ($VLdtCriterio2 != "Asignadas") // Para el caso de seleccionar una familia
					{
						if ($j==3)
						{
						 ?>
						</tr> 
						<tr>
						<td><input type="checkbox" name="txt_Camp13[]" value="<?php echo $VTCampo13; ?>" <?php echo $seleccion; ?> ><?php echo $VTCampo14; ?>&nbsp;</td>
						 <?php 		
						 $j=0;
						}else
						{
						 ?>
						<td><input type="checkbox" name="txt_Camp13[]" value="<?php echo $VTCampo13; ?>" <?php echo $seleccion; ?> ><?php echo $VTCampo14; ?>&nbsp;</td>
						 <?php 
						}
						$j++;		
					} else { // se visualizan todas las asignadas a ese distributivo
						if ($seleccion==" checked ") // solo se grafican las seleccionadas
						{
							if ($j==3)
							{
								 ?>
								</tr> 
								<tr>
								<td><input type="checkbox" name="txt_Camp13[]" value="<?php echo $VTCampo13; ?>" <?php echo $seleccion; ?> ><?php echo $VTCampo14; ?>&nbsp;</td>
								 <?php 		
								 $j=0;
							}else
							{
								 ?>
								<td><input type="checkbox" name="txt_Camp13[]" value="<?php echo $VTCampo13; ?>" <?php echo $seleccion; ?> ><?php echo $VTCampo14; ?>&nbsp;</td>
								 <?php 
							}
							$j++;
							
						}
					}
			   	}
			  }
			   ?>
			   </tr>
			</table>
		</td>
	</tr>
<?php } ?>			
</table>
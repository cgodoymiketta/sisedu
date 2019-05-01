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
        <input name="txt_Camp4" type="hidden" id="txt_Camp4" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp4; ?>"></td>
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
		 // si no es nuevo inicio
	
	?>
 	<tr>
		<td align="center" >
        <table width="300" border="0">
        
  <tr>
    <td align="right">No</td>
    <td><input type="checkbox" name="chk_1" value="No" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Matricula</td>
    <td><input type="checkbox" name="chk_2" value="Mtr" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Apellidos</td>
    <td><input type="checkbox" name="chk_3" value="Apellido" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Nombres</td>
    <td><input type="checkbox" name="chk_4" value="Nombre" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Documento</td>
    <td><input type="checkbox" name="chk_5" value="Documento" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">No</td>
    <td><input type="checkbox" name="chk_6" value="CC" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Sexo</td>
    <td><input type="checkbox" name="chk_7" value="Sexo" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Fecha Nacimiento</td>
    <td><input type="checkbox" name="chk_8" value="FN" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Edad</td>
    <td><input type="checkbox" name="chk_9" value="Edad" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Nacionalidad</td>
    <td><input type="checkbox" name="chk_10" value="Nacionalidad" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Discapacidad</td>
    <td><input type="checkbox" name="chk_11" value="Discapacidad" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Porcentaje</td>
    <td><input type="checkbox" name="chk_12" value="Porcentaje" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Raza</td>
    <td><input type="checkbox" name="chk_13" value="Raza" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Telefono</td>
    <td><input type="checkbox" name="chk_14" value="Telefono" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Direccion</td>
    <td><input type="checkbox" name="chk_15" value="Direccion" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Parroquia</td>
    <td><input type="checkbox" name="chk_16" value="Parroquia" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Curso</td>
    <td><input type="checkbox" name="chk_17" value="Curso" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Paralelo</td>
    <td><input type="checkbox" name="chk_18" value="Paralelo" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right"></td>
    <td><input type="checkbox" name="chk_19" value="ADC" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Representante Apellidos</td>
    <td><input type="checkbox" name="chk_20" value="RApellido" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Representante Nombres</td>
    <td><input type="checkbox" name="chk_21" value="RNombre" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Rep. Documento</td>
    <td><input type="checkbox" name="chk_22" value="RCC" checked="checked"  ></td>
  </tr>
  <tr>
    <td align="right">Parentesco</td>
    <td><input type="checkbox" name="chk_23" value="RParentesco" checked="checked"  ></td>
  </tr>
</table>
</td>
	</tr>
	<tr>
		<td align="center">&nbsp;</td>
	</tr>
			
</table>
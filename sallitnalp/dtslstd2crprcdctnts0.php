

<table width="100%" border="0">
<?php 
/////////////////  CONSULTAMOS CURSO / PARALELO / MATERIA / QUIMESTRE / PARCIAL
	$VtQueryC=" Select curdescripcion from crs where curcodigo=".$VLdtCamp9;
	$VtQueryP=" Select pardescripcion from prll where parcodigo=".$VLdtCamp8;
	$VtQueryM=" Select matdescripcion, mattipo, famcodigo from mtr where matcodigo=".$VLdtCamp10;
	$VtQueryQ=" Select quidescripcion from qmstr where quicodigo=".$VLdtCamp6;
	$VtQueryPr=" Select prcdescripcion from prcl where prccodigo=".$VLdtCamp7;
	
	$VLdtDatosC = execute_query($VtQueryC,$VLConexion);
	$VLnuDatosC = total_records($VLdtDatosC);
	if ( $VLnuDatosC>0 )
	{
		$VtCurso=get_result($VLdtDatosC,0,"curdescripcion");
	}
	$VLdtDatosP = execute_query($VtQueryP,$VLConexion);
	$VLnuDatosP = total_records($VLdtDatosP);
	if ( $VLnuDatosP>0 )
	{
		$VtParalelo=get_result($VLdtDatosP,0,"pardescripcion");
	}
	$VLdtDatosM = execute_query($VtQueryM,$VLConexion);
	$VLnuDatosM = total_records($VLdtDatosM);
	if ( $VLnuDatosM>0 )
	{
		$VtMateria=get_result($VLdtDatosM,0,"matdescripcion");
		$VtMateriaTipo=get_result($VLdtDatosM,0,"mattipo");
		$VtFamilia=get_result($VLdtDatosM,0,"famcodigo");
		
	}
	$VLdtDatosQ = execute_query($VtQueryQ,$VLConexion);
	$VLnuDatosQ = total_records($VLdtDatosQ);
	if ( $VLnuDatosQ>0 )
	{
		$VtQuimestre=get_result($VLdtDatosQ,0,"quidescripcion");
	}
	$VLdtDatosPr = execute_query($VtQueryPr,$VLConexion);
	$VLnuDatosPr = total_records($VLdtDatosPr);
	if ( $VLnuDatosPr>0 )
	{
		$VtParcial=get_result($VLdtDatosPr,0,"prcdescripcion");
	}
	
	////////////////////DETALLE DE PRUEBAS //////////////////////////
	/////////////////////////////////////////////////////////////////
	if ($VLdtCamp13!="")
{
?>	
<tr>
	<td >
    <input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>">
    <fieldset  >
						  <legend ><?  echo utf8_encode($VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre." - ".$VtParcial); ?></legend>
						<table width="100%" border="1">
						  <tr>
							<td width="40%" align="center" rowspan="3"><font size="-1" ><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>"><input type="hidden" name="txt_Camp13" value="<?php echo $VLdtCamp13; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>"><input type="hidden" name="txt_familia" value="<?php echo $VtFamilia; ?>">
							NOMINA</font><?php //echo $VLCadena[3]."-".$VLTemp[3]; ?></td>
<?php                          
$Vtquery= " Select p.perapellidos, p.pernombres, p.percc, p.percodigo
, pd.dtprcodigo, pd.dtprtareas, pd.dtpractindiv,pd.dtpractgrupal, 
 pd.dtprlecciones, pd.dtprprueba, pd.dtprpromedio, 
 pd.prcnota1, pd.prcnota2, pd.prcnota3, pd.prcnota4, pd.prcnota5, pd.prcnota6,
 pd.prcnota7, pd.prcnota8, pd.prcdesc1, pd.prcdesc2, pd.prcdesc3, pd.prcdesc4,
 pd.prcdesc5, pd.prcdesc6, pd.prcdesc7, pd.prcdesc8, pd.prcfecha1, pd.prcfecha2,
 pd.prcfecha3, pd.prcfecha4, pd.prcfecha5, pd.prcfecha6, pd.prcfecha7, pd.prcfecha8
from mtrcl m, psn p, grp g, nsttcnstdnt n
, prcldtll pd, qmstrdtll qd
where p.percodigo=n.percodigo and n.inescodigo=m.inescodigo 
and m.grucodigo=g.grucodigo and m.parcodigo=".$VLdtCamp8." and g.espcodigo=".$VLdtCamp12." and
g.curcodigo=".$VLdtCamp9." and m.mtrno=qd.mtrno and qd.matcodigo=".$VLdtCamp10." 
and qd.quicodigo=".$VLdtCamp6." and pd.prccodigo=".$VLdtCamp7." and qd.dtqmcodigo=pd.dtqmcodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
		if ( $VLnuDatos>0 )
	{
		$VTdtprDesc1=get_result($VLdtDatos,0,"pd.prcdesc1");
		$VTdtprDesc2=get_result($VLdtDatos,0,"pd.prcdesc2");
		$VTdtprDesc3=get_result($VLdtDatos,0,"pd.prcdesc3");
		$VTdtprDesc4=get_result($VLdtDatos,0,"pd.prcdesc4");
		$VTdtprDesc5=get_result($VLdtDatos,0,"pd.prcdesc5");
		$VTdtprDesc6=get_result($VLdtDatos,0,"pd.prcdesc6");
		$VTdtprDesc7=get_result($VLdtDatos,0,"pd.prcdesc7");
		$VTdtprDesc8=get_result($VLdtDatos,0,"pd.prcdesc8");
		$VTdtprFecha1=get_result($VLdtDatos,0,"pd.prcfecha1");
		$VTdtprFecha2=get_result($VLdtDatos,0,"pd.prcfecha2");
		$VTdtprFecha3=get_result($VLdtDatos,0,"pd.prcfecha3");
		$VTdtprFecha4=get_result($VLdtDatos,0,"pd.prcfecha4");
		$VTdtprFecha5=get_result($VLdtDatos,0,"pd.prcfecha5");
		$VTdtprFecha6=get_result($VLdtDatos,0,"pd.prcfecha6");
		$VTdtprFecha7=get_result($VLdtDatos,0,"pd.prcfecha7");
		$VTdtprFecha8=get_result($VLdtDatos,0,"pd.prcfecha8");
	}
	
	if ( $VLdtCamp13==1)
	{                           
?>                             
							<td width="20%" align="center" colspan="4" ><font size="-1" ><B><a href='docnotas.php?vlccn=modificar&txt_Camp1=<?php echo $VLdtCamp1; ?>&txt_Camp2=<?php echo $VLdtCamp2; ?>&txt_Camp10=<?php echo $VLdtCamp10; ?>&txt_Camp6=<?php echo $VLdtCamp6; ?>&txt_Camp7=<?php echo $VLdtCamp7; ?>&txt_Camp8=<?php echo $VLdtCamp8; ?>&txt_Camp9=<?php echo $VLdtCamp9; ?>&txt_Camp11=<?php echo $VLdtCamp11; ?>&txt_Camp12=<?php echo $VLdtCamp12; ?>&txt_Camp14=<?php echo $VLdtCamp14; ?>&nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>' target=_parent >ACTIVIDADES INDIVIDUALES</a></B></font></td>
							<td width="10%" align="center" rowspan="3"><font size="-1" >PROMEDIO</font></td>
<?php } else { ?>                            
							<td width="10%" align="center" colspan="4"><font size="-1" ><B><a href='docnotas.php?vlccn=modificar&txt_Camp1=<?php echo $VLdtCamp1; ?>&txt_Camp2=<?php echo $VLdtCamp2; ?>&txt_Camp10=<?php echo $VLdtCamp10; ?>&txt_Camp6=<?php echo $VLdtCamp6; ?>&txt_Camp7=<?php echo $VLdtCamp7; ?>&txt_Camp8=<?php echo $VLdtCamp8; ?>&txt_Camp9=<?php echo $VLdtCamp9; ?>&txt_Camp11=<?php echo $VLdtCamp11; ?>&txt_Camp12=<?php echo $VLdtCamp12; ?>&txt_Camp14=<?php echo $VLdtCamp14; ?>&nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>' target=_parent >ACTIVIDADES GRUPALES</a></B></font></td>
							<td width="10%" align="center" rowspan="3"><font size="-1" >PROMEDIO</font></td> <?php } ?>
						  </tr>
                    
                          <tr>
<?php if ( $VLdtCamp13==1) { ?>                            
                          	<td><input name="txt_Desc1" type="text" id="txt_Consultad1" size="5" maxlength="15" value="<?php echo $VTdtprDesc1; ?>"></td>
                            <td><input name="txt_Desc2" type="text" id="txt_Consultad2" size="5" maxlength="15" value="<?php echo $VTdtprDesc2; ?>"></td>
                            <td><input name="txt_Desc3" type="text" id="txt_Consultad3" size="5" maxlength="15" value="<?php echo $VTdtprDesc3; ?>"></td>
                          	<td><input name="txt_Desc4" type="text" id="txt_Consultad4" size="5" maxlength="15" value="<?php echo $VTdtprDesc4; ?>"></td>
<?php } else { ?>                            
                            
                          	<td><input name="txt_Desc5" type="text" id="txt_Consultad1" size="5" maxlength="15" value="<?php echo $VTdtprDesc5; ?>"></td>
                            <td><input name="txt_Desc6" type="text" id="txt_Consultad2" size="5" maxlength="15" value="<?php echo $VTdtprDesc6; ?>"></td>
                            <td><input name="txt_Desc7" type="text" id="txt_Consultad3" size="5" maxlength="15" value="<?php echo $VTdtprDesc7; ?>"></td>
                          	<td><input name="txt_Desc8" type="text" id="txt_Consultad4" size="5" maxlength="15" value="<?php echo $VTdtprDesc8; ?>"></td>
<?php } ?>                            
                            
                          </tr>
                          <tr>
<?php if ( $VLdtCamp13==1) { ?>                            
                          	<td><input name="txt_Fecha1" type="text" id="txt_Consultaf1" size="5" maxlength="15" value="<?php echo $VTdtprFecha1; ?>"></td>
                          	<td><input name="txt_Fecha2" type="text" id="txt_Consultaf2" size="5" maxlength="15" value="<?php echo $VTdtprFecha2; ?>"></td>
                          	<td><input name="txt_Fecha3" type="text" id="txt_Consultaf3" size="5" maxlength="15" value="<?php echo $VTdtprFecha3; ?>"></td>
                          	<td><input name="txt_Fecha4" type="text" id="txt_Consultaf4" size="5" maxlength="15" value="<?php echo $VTdtprFecha4; ?>"></td>
<?php } else { ?>                            
                          	<td><input name="txt_Fecha5" type="text" id="txt_Consultaf5" size="5" maxlength="15" value="<?php echo $VTdtprFecha5; ?>"></td>
                          	<td><input name="txt_Fecha6" type="text" id="txt_Consultaf6" size="5" maxlength="15" value="<?php echo $VTdtprFecha6; ?>"></td>
                          	<td><input name="txt_Fecha7" type="text" id="txt_Consultaf7" size="5" maxlength="15" value="<?php echo $VTdtprFecha7; ?>"></td>
                          	<td><input name="txt_Fecha8" type="text" id="txt_Consultaf8" size="5" maxlength="15" value="<?php echo $VTdtprFecha8; ?>"></td>
<?php } ?>                                                        
                          </tr>
<?PHP 

	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTdtprcodigo=get_result($VLdtDatos,$i,"pd.dtprcodigo");
			$VTdtprtareas=get_result($VLdtDatos,$i,"pd.dtprtareas");
			$VTdtpractindiv=get_result($VLdtDatos,$i,"pd.dtpractindiv");
			$VTdtpractgrupal=get_result($VLdtDatos,$i,"pd.dtpractgrupal");
			$VTdtprlecciones=get_result($VLdtDatos,$i,"pd.dtprlecciones");
			$VTdtprprueba=get_result($VLdtDatos,$i,"pd.dtprprueba");
			$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
			$VTdtprNota1=get_result($VLdtDatos,$i,"pd.prcnota1");
			$VTdtprNota2=get_result($VLdtDatos,$i,"pd.prcnota2");
			$VTdtprNota3=get_result($VLdtDatos,$i,"pd.prcnota3");
			$VTdtprNota4=get_result($VLdtDatos,$i,"pd.prcnota4");
			$VTdtprNota5=get_result($VLdtDatos,$i,"pd.prcnota5");
			$VTdtprNota6=get_result($VLdtDatos,$i,"pd.prcnota6");
			$VTdtprNota7=get_result($VLdtDatos,$i,"pd.prcnota7");
			$VTdtprNota8=get_result($VLdtDatos,$i,"pd.prcnota8");
			
			if ( $VtFamilia<4 ){
			
?>						  

    <tr>
        <td width="40%"><font size="-1" ><? echo utf8_encode($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
<?php if ( $VLdtCamp13==1) { ?>                            
        <td width="10%" align="center"> 
        <select name="txt_Nota1[]">
        <option value="0" <?php if ( $VTdtprNota1 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota1 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota1 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota1 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota1 == "4") {?> selected <?php }?>>N/E</option>
		</select>
     </td>
        <td width="10%" align="center">
        <select name="txt_Nota2[]">
        <option value="0" <?php if ( $VTdtprNota2 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota2 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota2 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota2 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota2 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Nota3[]">
        <option value="0" <?php if ( $VTdtprNota3 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota3 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota3 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota3 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota3 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Nota4[]">
        <option value="0" <?php if ( $VTdtprNota4 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota4 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota4 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota4 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota4 == "4") {?> selected <?php }?>>N/E</option>
		</select>
		</td>
<?php } else { ?>                                    
        <td width="10%" align="center">
        <select name="txt_Tarea[]">
        <option value="0" <?php if ( $VTdtprtareas == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprtareas == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprtareas == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprtareas == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprtareas == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center"> 
        <select name="txt_Nota5[]">
        <option value="0" <?php if ( $VTdtprNota5 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota5 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota5 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota5 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota5 == "4") {?> selected <?php }?>>N/E</option>
		</select>
     </td>
        <td width="10%" align="center">
        <select name="txt_Nota6[]">
        <option value="0" <?php if ( $VTdtprNota6 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota6 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota6 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota6 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota6 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Nota7[]">
        <option value="0" <?php if ( $VTdtprNota7 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota7 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota7 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota7 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota7 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Nota8[]">
        <option value="0" <?php if ( $VTdtprNota8 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota8 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota8 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota8 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota8 == "4") {?> selected <?php }?>>N/E</option>
		</select>
		</td>
        <td width="10%" align="center">
        <select name="txt_ActI[]">
        <option value="0" <?php if ( $VTdtpractindiv == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtpractindiv == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtpractindiv == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtpractindiv == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtpractindiv == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
<?php } ?>                                                                
    </tr>

<?php  
			}else{
?>
    <tr>
        <td width="40%"><font size="-1" ><? echo utf8_encode($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
<?php if ( $VLdtCamp13==1) { ?>                            
        <td width="10%" align="center"><input name="txt_Nota1[]" type="text" id="txt_Consulta" size="5" maxlength="5" value="<?php echo $VTdtprNota1; ?>"></td>
        <td width="10%" align="center"><input name="txt_Nota2[]" type="text" id="txt_Consulta2" size="5" maxlength="5" value="<?php echo $VTdtprNota2; ?>"></td>
        <td width="10%" align="center"><input name="txt_Nota3[]" type="text" id="txt_Consulta3" size="5" maxlength="5" value="<?php echo $VTdtprNota3; ?>"></td>
        <td width="10%" align="center"><input name="txt_Nota4[]" type="text" id="txt_Consulta6" size="5" maxlength="5" value="<?php echo $VTdtprNota4; ?>"></td>
        <td width="10%" align="center"><input name="txt_Tarea[]" type="text" id="txt_Consulta" size="5" maxlength="5" readonly="readonly" value="<?php echo $VTdtprtareas; ?>"></td>
<?php } else { ?>                                            
        <td width="10%" align="center"><input name="txt_Nota5[]" type="text" id="txt_Consulta2" size="5" maxlength="5" value="<?php echo $VTdtprNota5; ?>"></td>
        <td width="10%" align="center"><input name="txt_Nota6[]" type="text" id="txt_Consulta3" size="5" maxlength="5" value="<?php echo $VTdtprNota6; ?>"></td>
        <td width="10%" align="center"><input name="txt_Nota7[]" type="text" id="txt_Consulta4" size="5" maxlength="5" value="<?php echo $VTdtprNota7; ?>"></td>
        <td width="10%" align="center"><input name="txt_Nota8[]" type="text" id="txt_Consulta5" size="5" maxlength="5" value="<?php echo $VTdtprNota8; ?>"></td>
        <td width="10%" align="center"><input name="txt_ActI[]" type="text" id="txt_Consulta" size="5" maxlength="5" readonly="readonly" value="<?php echo $VTdtpractindiv; ?>"></td>
<?php } ?>                                                                        
    </tr>
    
<?php
			}
?>    
    
    
<?php 
		}
	}
?>                      
                      
						</table>

						</fieldset></td>
	</tr>	
	
	
<?php	
	
	/////////////////////////////////////////////////////////////////
	/////////////////////PARA MATERIAS CUANTITATIVAS
} else {	
	
switch ($VtMateriaTipo) {
case "1":
?>

 <tr>
	<td >
    <input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>">
    <fieldset  >
						  <legend ><?  echo utf8_encode($VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre." - ".$VtParcial); ?></legend>
						<table width="100%" border="1">
						  <tr>
							<td width="40%" align="center" rowspan="2"><font size="-1" ><input type="hidden" name="txt_familia" value="<?php echo $VtFamilia; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>"><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>">
						    NOMINA</font></td>
							<td width="20%" align="center" colspan="2" ><font size="-1" ><B>INSUMO1</B></font></td>
							<td width="10%" align="center"><font size="-1" ><B>INSUMO2</B></font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >REFUERZO ACADEMICO</font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >PROMEDIO</font></td>
						  </tr>
                          <tr>
                          	<td><a href='docnotas.php?vlccn=modificar&txt_Camp1=<?php echo $VLdtCamp1; ?>&txt_Camp2=<?php echo $VLdtCamp2; ?>&txt_Camp10=<?php echo $VLdtCamp10; ?>&txt_Camp6=<?php echo $VLdtCamp6; ?>&txt_Camp7=<?php echo $VLdtCamp7; ?>&txt_Camp8=<?php echo $VLdtCamp8; ?>&txt_Camp9=<?php echo $VLdtCamp9; ?>&txt_Camp11=<?php echo $VLdtCamp11; ?>&txt_Camp12=<?php echo $VLdtCamp12; ?>&txt_Camp13=1&txt_Camp14=<?php echo $VLdtCamp14; ?>&nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>' target=_parent >Act. Indiv.</a></td>
                            <td><a href='docnotas.php?vlccn=modificar&txt_Camp1=<?php echo $VLdtCamp1; ?>&txt_Camp2=<?php echo $VLdtCamp2; ?>&txt_Camp10=<?php echo $VLdtCamp10; ?>&txt_Camp6=<?php echo $VLdtCamp6; ?>&txt_Camp7=<?php echo $VLdtCamp7; ?>&txt_Camp8=<?php echo $VLdtCamp8; ?>&txt_Camp9=<?php echo $VLdtCamp9; ?>&txt_Camp11=<?php echo $VLdtCamp11; ?>&txt_Camp12=<?php echo $VLdtCamp12; ?>&txt_Camp13=2&txt_Camp14=<?php echo $VLdtCamp14; ?>&nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>' target=_parent >Act. Grupal</a></td>
                            <td align="center">Evaluación Parcial</td>
                            
                          </tr>
<?PHP 
$Vtquery= " Select p.perapellidos, p.pernombres, p.percc, p.percodigo
, pd.dtprcodigo, pd.dtprtareas, pd.dtpractindiv,pd.dtpractgrupal, 
 pd.dtprlecciones, pd.dtprprueba, pd.dtprpromedio , pd.mattipo,
 pd.prcnota1, pd.prcnota2, pd.prcnota3, pd.prcnota4, pd.prcnota5, pd.prcnota6,
 pd.prcnota7, pd.prcnota8, pd.prcdesc1, pd.prcdesc2, pd.prcdesc3, pd.prcdesc4,
 pd.prcdesc5, pd.prcdesc6, pd.prcdesc7, pd.prcdesc8, pd.prcfecha1, pd.prcfecha2,
 pd.prcfecha3, pd.prcfecha4, pd.prcfecha5, pd.prcfecha6, pd.prcfecha7, pd.prcfecha8
from mtrcl m, psn p, grp g, nsttcnstdnt n
, prcldtll pd, qmstrdtll qd
where p.percodigo=n.percodigo and n.inescodigo=m.inescodigo 
and m.grucodigo=g.grucodigo and m.parcodigo=".$VLdtCamp8." and g.espcodigo=".$VLdtCamp12." and
g.curcodigo=".$VLdtCamp9." and m.mtrno=qd.mtrno and qd.matcodigo=".$VLdtCamp10." 
and qd.quicodigo=".$VLdtCamp6." and pd.prccodigo=".$VLdtCamp7." and qd.dtqmcodigo=pd.dtqmcodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTdtprcodigo=get_result($VLdtDatos,$i,"pd.dtprcodigo");
			$VTdtprtareas=get_result($VLdtDatos,$i,"pd.dtprtareas");
			$VTdtpractindiv=get_result($VLdtDatos,$i,"pd.dtpractindiv");
			$VTdtpractgrupal=get_result($VLdtDatos,$i,"pd.dtpractgrupal");
			$VTdtprlecciones=get_result($VLdtDatos,$i,"pd.dtprlecciones");
			$VTdtprprueba=get_result($VLdtDatos,$i,"pd.dtprprueba");
			$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
			$VtMateriaTipo=get_result($VLdtDatos,$i,"pd.mattipo");
			$VTdtprNota5=get_result($VLdtDatos,$i,"pd.prcnota5");
			$VTdtprNota6=get_result($VLdtDatos,$i,"pd.prcnota6");
			$VTdtprNota7=get_result($VLdtDatos,$i,"pd.prcnota7");
			$VTdtprNota8=get_result($VLdtDatos,$i,"pd.prcnota8");
			$VTdtprNota1=get_result($VLdtDatos,$i,"pd.prcnota1");
			$VTdtprNota2=get_result($VLdtDatos,$i,"pd.prcnota2");
			$VTdtprNota3=get_result($VLdtDatos,$i,"pd.prcnota3");
			$VTdtprNota4=get_result($VLdtDatos,$i,"pd.prcnota4");

			if ( $VtFamilia<4 ){
			
?>						  

    <tr>
        <td width="40%"><font size="-1" ><? echo utf8_encode($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
        <td width="10%" align="center"> 
        <select name="txt_Tarea[]">
        <option value="0" <?php if ( $VTdtprtareas == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprtareas == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprtareas == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprtareas == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprtareas == "4") {?> selected <?php }?>>N/E</option>
		</select>
     </td>
        <td width="10%" align="center">
        <select name="txt_ActI[]">
        <option value="0" <?php if ( $VTdtpractindiv == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtpractindiv == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtpractindiv == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtpractindiv == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtpractindiv == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_lecc[]">
        <option value="0" <?php if ( $VTdtprlecciones == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprlecciones == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprlecciones == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprlecciones == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprlecciones == "4") {?> selected <?php }?>>N/E</option>
		</select>
		</td>
        <td width="10%" align="center">
        <select name="txt_Prb[]">
        <option value="0" <?php if ( $VTdtprprueba == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprprueba == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprprueba == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprprueba == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprprueba == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Pro[]">
        <option value="0" <?php if ( $VTdtprpromedio == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprpromedio == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprpromedio == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprpromedio == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprpromedio == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
    </tr>

<?php  
			}else{
?>
    <tr>
        <td width="40%"><font size="-1" ><? echo utf8_encode($VTApellido." ".$VTNombre );  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
        <td width="10%" align="center"><input name="txt_Tarea[]" type="text" id="txt_Consulta" size="5" maxlength="5" value="<?php echo $VTdtprtareas; ?>"></td>
        <td width="10%" align="center"><input name="txt_ActI[]" type="text" id="txt_Consulta2" size="5" maxlength="5" value="<?php echo $VTdtpractindiv; ?>"></td>
        <td width="10%" align="center"><input name="txt_lecc[]" type="text" id="txt_Consulta4" size="5" maxlength="5" value="<?php echo $VTdtprlecciones; ?>"></td>
        <td width="10%" align="center" <?php if($VTdtprpromedio<7 && $VTdtprpromedio>0 ){ ?> bgcolor="#FF9999" <?php } ?>  ><input name="txt_Prb[]" type="text" id="txt_Consulta5" size="5" maxlength="5" value="<?php echo $VTdtprprueba; ?>"></td>
        <td width="10%" align="center"><input name="txt_Pro[]" type="text" id="txt_Consulta6" size="5" maxlength="5" readonly="readonly" value="<?php echo $VTdtprpromedio; ?>"></td>
    </tr>
    
<?php
			}
?>    
    
    
<?php 
		}
	}
?>                      
                      
						</table>

						</fieldset></td>
	</tr>
<?php
break 1;
/////////////////// PARA MATERIAS CULITATIVAS
case "2":

?>
    <tr>
    	<td><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>">
<fieldset  >
						  <legend ><?  echo utf8_encode($VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre." - ".$VtParcial); ?></legend>
						<table width="100%" border="1">
						  <tr>
							<td width="40%" align="center" rowspan="2"><font size="-1" ><input type="hidden" name="txt_familia" value="<?php echo $VtFamilia; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>"><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>">NOMINA</font></td>
							<td width="20%" align="center" colspan="2" ><font size="-1" >INSUMO1</font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >REFUERZO ACADEMICO</td>
							<td width="10%" align="center"><font size="-1" >INSUMO2</font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >REFUERZO ACADEMICO</font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >PROMEDIO</font></td>
						  </tr>
                          <tr>
                          	<td>Act. Indiv.</td>
                            <td>Act. Grupal</td>
                            <td>Prueba PArcial</td>
                            
                          </tr>
<?PHP 
$Vtquery= " Select p.perapellidos, p.pernombres, p.percc, p.percodigo
, pd.dtprcodigo, pd.dtprtareas, pd.dtpractindiv,pd.dtpractgrupal, 
 pd.dtprlecciones, pd.dtprprueba, pd.dtprpromedio 
from mtrcl m, psn p, grp g, nsttcnstdnt n
, prcldtll pd, qmstrdtll qd
where p.percodigo=n.percodigo and n.inescodigo=m.inescodigo 
and m.grucodigo=g.grucodigo and m.parcodigo=".$VLdtCamp8." and 
g.curcodigo=".$VLdtCamp9." and m.mtrno=qd.mtrno and qd.matcodigo=".$VLdtCamp10." 
and qd.quicodigo=".$VLdtCamp6." and pd.prccodigo=".$VLdtCamp7." and qd.dtqmcodigo=pd.dtqmcodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTdtprcodigo=get_result($VLdtDatos,$i,"pd.dtprcodigo");
			$VTdtprtareas=get_result($VLdtDatos,$i,"pd.dtprtareas");
			$VTdtpractindiv=get_result($VLdtDatos,$i,"pd.dtpractindiv");
			$VTdtpractgrupal=get_result($VLdtDatos,$i,"pd.dtpractgrupal");
			$VTdtprlecciones=get_result($VLdtDatos,$i,"pd.dtprlecciones");
			$VTdtprprueba=get_result($VLdtDatos,$i,"pd.dtprprueba");
			$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
?>						  
    <tr>
        <td width="40%"><font size="-1" ><? echo utf8_encode($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center">
        <select name="txt_Pro[]">
        <option value="0" <?php if ( $VTdtprpromedio == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprpromedio == "9" ) {?> selected <?php }?>  >EX</option>
        <option value="7" <?php if ( $VTdtprpromedio == "7") {?> selected <?php }?>>MB</option>
        <option value="5" <?php if ( $VTdtprpromedio == "5") {?> selected <?php }?>>B</option>
        <option value="4" <?php if ( $VTdtprpromedio == "4") {?> selected <?php }?>>R</option>
		</select>
        </td>
    </tr>
<?php 
		}
	}
?>                      
                      
						</table>

						</fieldset>        
        
        </td>
    </tr>
<?php
break 1;
//////////////// PARA MATERIAS DE COMPORTAMIENTO
case "3":

?>    
    <tr>
    	<td><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>">
<fieldset  >
						  <legend ><?  echo utf8_encode($VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre." - ".$VtParcial); ?></legend>
						<table width="100%" border="1">
						  <tr>
							<td width="40%" align="center"><font size="-1" ><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>"><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>">Apellidos y Nombres</font></td>
							<td width="10%" align="center">&nbsp;</td>
							<td width="10%" align="center"><font size="-1" >Comportamiento</font></td>
						  </tr>
<?PHP 
$Vtquery= " Select p.perapellidos, p.pernombres, p.percc, p.percodigo
, pd.dtprcodigo, pd.dtprtareas, pd.dtpractindiv,pd.dtpractgrupal, 
 pd.dtprlecciones, pd.dtprprueba, pd.dtprpromedio 
from mtrcl m, psn p, grp g, nsttcnstdnt n
, prcldtll pd, qmstrdtll qd
where p.percodigo=n.percodigo and n.inescodigo=m.inescodigo 
and m.grucodigo=g.grucodigo and m.parcodigo=".$VLdtCamp8." and 
g.curcodigo=".$VLdtCamp9." and m.mtrno=qd.mtrno and qd.matcodigo=".$VLdtCamp10." 
and qd.quicodigo=".$VLdtCamp6." and pd.prccodigo=".$VLdtCamp7." and qd.dtqmcodigo=pd.dtqmcodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTdtprcodigo=get_result($VLdtDatos,$i,"pd.dtprcodigo");
			$VTdtprtareas=get_result($VLdtDatos,$i,"pd.dtprtareas");
			$VTdtpractindiv=get_result($VLdtDatos,$i,"pd.dtpractindiv");
			$VTdtpractgrupal=get_result($VLdtDatos,$i,"pd.dtpractgrupal");
			$VTdtprlecciones=get_result($VLdtDatos,$i,"pd.dtprlecciones");
			$VTdtprprueba=get_result($VLdtDatos,$i,"pd.dtprprueba");
			$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
?>						  
    <tr>
        <td width="40%"><font size="-1" ><? echo utf8_encode($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><select name="txt_Pro[]">
        <option value="0" <?php if ( $VTdtprpromedio == "0") {?> selected <?php }?>>NR</option>
		<option value="5" <?php if ( $VTdtprpromedio == "5" ) {?> selected <?php }?>  >A</option>
        <option value="4" <?php if ( $VTdtprpromedio == "4") {?> selected <?php }?>>B</option>
        <option value="3" <?php if ( $VTdtprpromedio == "3") {?> selected <?php }?>>C</option>
        <option value="2" <?php if ( $VTdtprpromedio == "2") {?> selected <?php }?>>D</option>
        <option value="1" <?php if ( $VTdtprpromedio == "1") {?> selected <?php }?>>E</option>
		</select></td>
    </tr>
<?php 
		}
	}
?>                      
                      
						</table>

						</fieldset>        
        
        </td>
    </tr>
<?php
break 1;
//////////////// PARA MATERIAS DE ASISTENCIA
case "4":

?>    
    <tr>
    	<td>
        <input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>">
<fieldset  >
						  <legend ><?  echo utf8_encode($VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre." - ".$VtParcial); ?></legend>
						<table width="100%" border="1">
						  <tr>
							<td width="40%" align="center"><font size="-1" ><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>"><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>">Apellidos y Nombres</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</td>
							<td width="10%" align="center"><font size="-1" >Faltas Justificadas</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</font></td>
							<td width="10%" align="center"><font size="-1" >Faltas Injustificadas</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</font></td>
						  </tr>
<?PHP 
$Vtquery= " Select p.perapellidos, p.pernombres, p.percc, p.percodigo
, pd.dtprcodigo, pd.dtprtareas, pd.dtpractindiv,pd.dtpractgrupal, 
 pd.dtprlecciones, pd.dtprprueba, pd.dtprpromedio 
from mtrcl m, psn p, grp g, nsttcnstdnt n
, prcldtll pd, qmstrdtll qd
where p.percodigo=n.percodigo and n.inescodigo=m.inescodigo 
and m.grucodigo=g.grucodigo and m.parcodigo=".$VLdtCamp8." and 
g.curcodigo=".$VLdtCamp9." and m.mtrno=qd.mtrno and qd.matcodigo=".$VLdtCamp10." 
and qd.quicodigo=".$VLdtCamp6." and pd.prccodigo=".$VLdtCamp7." and qd.dtqmcodigo=pd.dtqmcodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTdtprcodigo=get_result($VLdtDatos,$i,"pd.dtprcodigo");
			$VTdtprtareas=get_result($VLdtDatos,$i,"pd.dtprtareas");
			$VTdtpractindiv=get_result($VLdtDatos,$i,"pd.dtpractindiv");
			$VTdtpractgrupal=get_result($VLdtDatos,$i,"pd.dtpractgrupal");
			$VTdtprlecciones=get_result($VLdtDatos,$i,"pd.dtprlecciones");
			$VTdtprprueba=get_result($VLdtDatos,$i,"pd.dtprprueba");
			$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
?>						  
    <tr>
        <td width="40%"><font size="-1" ><? echo utf8_encode($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><input name="txt_ActI[]" type="text" id="txt_Consulta2" size="5" maxlength="5" value="<?php echo $VTdtpractindiv; ?>"></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><input name="txt_lecc[]" type="text" id="txt_Consulta4" size="5" maxlength="5" value="<?php echo $VTdtprlecciones; ?>"></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center">&nbsp;</td>
    </tr>
<?php 
		}
	}
?>                      
                      
						</table>

						</fieldset>        
        </td>
    </tr> 
 
 <?php
break 1;

}
}
 ?>   
<tr><td> <? //echo $VtQueryC; ?>  </td></tr>    		
</table>
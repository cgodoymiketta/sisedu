

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
						  <legend ><?  echo ($VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre." - ".$VtParcial); ?></legend>
						<table width="100%" border="1">
						  <tr>
							<td width="40%" align="center" rowspan="2"><font size="-1" ><input type="hidden" name="txt_Camp13" value="<?php echo $VLdtCamp13; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>"><input type="hidden" name="txt_familia" value="<?php echo $VtFamilia; ?>">NOMINA-1</font> <?php //echo $VLCadena[3]."-".$VLTemp[3]; ?></td>
<?php                          
$Vtquery= " Select p.perapellidos, p.pernombres, p.percc, p.percodigo,
 pd.dtprcodigo, pd.dtprtareas, pd.dtpractindiv,pd.dtpractgrupal, 
 pd.dtprlecciones, pd.dtprprueba, pd.dtprpromedio1, pd.dtprpromedio, 
 pd.DTPRADICIONAL2, pd.DTPRADICIONAL1, pd.dtprrefuerzo,
 pd.prcnota1, pd.prcnota2, pd.prcnota3, pd.prcnota4, pd.prcnota5, pd.prcnota6,
 pd.prcnota7, pd.prcnota8, pd.prcnota9, pd.prcdesc1, pd.prcdesc2, pd.prcdesc3, pd.prcdesc4,
 pd.prcdesc5, pd.prcdesc6, pd.prcdesc7, pd.prcdesc8, pd.PRCDESCA1,
 pd.PRCDESCA2
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
		$VTdtprDescA1=get_result($VLdtDatos,0,"pd.PRCDESCA1");
		$VTdtprDescA2=get_result($VLdtDatos,0,"pd.PRCDESCA2");
	}
	
	if ( $VLdtCamp13==1)
	{                           
?>                             
							<td width="20%" align="center" colspan="4" ><font size="-1" ><B><a href='docnotas.php?vlccn=modificar&txt_Camp1=<?php echo $VLdtCamp1; ?>&txt_Camp2=<?php echo $VLdtCamp2; ?>&txt_Camp10=<?php echo $VLdtCamp10; ?>&txt_Camp6=<?php echo $VLdtCamp6; ?>&txt_Camp7=<?php echo $VLdtCamp7; ?>&txt_Camp8=<?php echo $VLdtCamp8; ?>&txt_Camp9=<?php echo $VLdtCamp9; ?>&txt_Camp11=<?php echo $VLdtCamp11; ?>&txt_Camp12=<?php echo $VLdtCamp12; ?>&txt_Camp14=<?php echo $VLdtCamp14; ?>&nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>' target=_parent >INSUMO1</a></B></font></td>
<?php } else { ?>                            
							<td width="10%" align="center" colspan="4"><font size="-1" ><B><a href='docnotas.php?vlccn=modificar&txt_Camp1=<?php echo $VLdtCamp1; ?>&txt_Camp2=<?php echo $VLdtCamp2; ?>&txt_Camp10=<?php echo $VLdtCamp10; ?>&txt_Camp6=<?php echo $VLdtCamp6; ?>&txt_Camp7=<?php echo $VLdtCamp7; ?>&txt_Camp8=<?php echo $VLdtCamp8; ?>&txt_Camp9=<?php echo $VLdtCamp9; ?>&txt_Camp11=<?php echo $VLdtCamp11; ?>&txt_Camp12=<?php echo $VLdtCamp12; ?>&txt_Camp14=<?php echo $VLdtCamp14; ?>&nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>' target=_parent >INSUMO2</a></B></font></td> <?php } ?>
						  </tr>
                    
                          <tr>
<?php if ( $VLdtCamp13==1) { ?>                            
                          	<td>Tareas</td>
                            <td>Lecciones</td>
                            <td><input name="txt_DescA1" type="text" id="txt_Consultad3" size="5" maxlength="15" value="<?php echo $VTdtprDescA1; ?>"></td>
                          	<td><input name="txt_DescA2" type="text" id="txt_Consultad4" size="5" maxlength="15" value="<?php echo $VTdtprDescA2; ?>"></td>
<?php } else { ?>                            
                            
                          	<td>Act. Indiv.</td>
                            <td>Act. Grupal</td>
                            <td>Eval. Parcial</td>
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
			$VTdtpradicional1=get_result($VLdtDatos,$i,"pd.DTPRADICIONAL1");
			$VTdtpradicional2=get_result($VLdtDatos,$i,"pd.DTPRADICIONAL2");
			$VTdtprrefuerzo=get_result($VLdtDatos,$i,"pd.dtprrefuerzo");
			$VTdtprpromedio1=get_result($VLdtDatos,$i,"pd.dtprpromedio1");
			$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
			$VTdtprNota1=get_result($VLdtDatos,$i,"pd.prcnota1");
			$VTdtprNota2=get_result($VLdtDatos,$i,"pd.prcnota2");
			$VTdtprNota3=get_result($VLdtDatos,$i,"pd.prcnota3");
			$VTdtprNota4=get_result($VLdtDatos,$i,"pd.prcnota4");
			$VTdtprNota5=get_result($VLdtDatos,$i,"pd.prcnota5");
			$VTdtprNota6=get_result($VLdtDatos,$i,"pd.prcnota6");
			$VTdtprNota7=get_result($VLdtDatos,$i,"pd.prcnota7");
			$VTdtprNota8=get_result($VLdtDatos,$i,"pd.prcnota8");
			$VTdtprNota9=get_result($VLdtDatos,$i,"pd.prcnota9");
			
			if ( $VtFamilia<4 ){
			
?>						  

    <tr>
        <td width="40%"><font size="-1" ><? echo ($VTApellido." ".$VTNombre);  ?>
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
<?php } ?>                                                                
    </tr>

<?php  
			}else{
?>
    <tr>
        <td width="40%"><font size="-1" ><? echo ($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
<?php if ( $VLdtCamp13==1) { ?>                            
        <td width="10%" align="center"><input name="txt_Tarea[]" type="text" id="txt_Consulta" size="5" maxlength="5" value="<?php echo $VTdtprtareas; ?>"></td>
        <td width="10%" align="center"><input name="txt_leccion[]" type="text" id="txt_Consulta2" size="5" maxlength="5" value="<?php echo $VTdtprlecciones; ?>"></td>
        <td width="10%" align="center"><input name="txt_Adc1[]" type="text" id="txt_Consulta3" size="5" maxlength="5" value="<?php echo $VTdtpradicional1; ?>"></td>
        <td width="10%" align="center"><input name="txt_Adc2[]" type="text" id="txt_Consulta6" size="5" maxlength="5" value="<?php echo $VTdtpradicional2; ?>"></td>
<?php } else { ?>                                            
        <td width="10%" align="center"><input name="txt_ActI[]" type="text" id="txt_Consulta2" size="5" maxlength="5" value="<?php echo $VTdtpractindiv; ?>"></td>
        <td width="10%" align="center"><input name="txt_ActG[]" type="text" id="txt_Consulta3" size="5" maxlength="5" value="<?php echo $VTdtpractgrupal; ?>"></td>
        <td width="10%" align="center"><input name="txt_Prb[]" type="text" id="txt_Consulta4" size="5" maxlength="5" value="<?php echo $VTdtprprueba; ?>"></td>
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
	<td ><fieldset  >
						  <legend ><?  echo ($VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre." - ".$VtParcial); ?></legend>
						<table width="100%" border="1">
						  <tr>
<?php                          
$Vtquery= " Select p.perapellidos, p.pernombres, p.percc, p.percodigo
, pd.dtprcodigo, pd.dtprtareas, pd.dtpractindiv, pd.dtpractgrupal, 
 pd.dtprlecciones, pd.dtprprueba, pd.dtprpromedio1, pd.dtprpromedio , 
 pd.mattipo, pd.dtprrefuerzo, pd.dtpradicional2, pd.dtpradicional1, pd.dtprrefuerzo,
 pd.prcnota1, pd.prcnota2, pd.prcnota3, pd.prcnota4, pd.prcnota5, pd.prcnota6,
 pd.prcnota7, pd.prcnota8, pd.prcnota9, pd.prcdesca1, pd.prcdesca2 
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
		$VTDesA1=get_result($VLdtDatos,0,"pd.prcdesca1");
		$VTDesA2=get_result($VLdtDatos,0,"pd.prcdesca2");
	}
	                          
?>                       
							<td width="40%" align="center" rowspan="2"><font size="-1" ><input type="hidden" name="txt_familia" value="<?php echo $VtFamilia; ?>"><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>"><input type="hidden" name="txt_Camp13" value="<?php echo $VLdtCamp13; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>">
							NOMINA</font></td>
							<td width="20%" align="center" colspan="4" ><font size="-1" ><B><a href='docnotas.php?vlccn=modificar&txt_Camp1=<?php echo $VLdtCamp1; ?>&txt_Camp2=<?php echo $VLdtCamp2; ?>&txt_Camp10=<?php echo $VLdtCamp10; ?>&txt_Camp6=<?php echo $VLdtCamp6; ?>&txt_Camp7=<?php echo $VLdtCamp7; ?>&txt_Camp8=<?php echo $VLdtCamp8; ?>&txt_Camp9=<?php echo $VLdtCamp9; ?>&txt_Camp11=<?php echo $VLdtCamp11; ?>&txt_Camp12=<?php echo $VLdtCamp12; ?>&txt_Camp13=1&txt_Camp14=<?php echo $VLdtCamp14; ?>&nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>' target=_parent >INSUMO1</a></B></font></td>
							<td width="10%" align="center" colspan="3" ><font size="-1" ><B><a href='docnotas.php?vlccn=modificar&txt_Camp1=<?php echo $VLdtCamp1; ?>&txt_Camp2=<?php echo $VLdtCamp2; ?>&txt_Camp13=2&txt_Camp14=<?php echo $VLdtCamp14; ?>&txt_Camp10=<?php echo $VLdtCamp10; ?>&txt_Camp6=<?php echo $VLdtCamp6; ?>&txt_Camp7=<?php echo $VLdtCamp7; ?>&txt_Camp8=<?php echo $VLdtCamp8; ?>&txt_Camp9=<?php echo $VLdtCamp9; ?>&txt_Camp11=<?php echo $VLdtCamp11; ?>&txt_Camp12=<?php echo $VLdtCamp12; ?>&nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>' target=_parent >INSUMO2</a></B></font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >PROM.</font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >REF. ACAD.</font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >PROM. PARC.</font></td>
						  </tr>
                          <tr>
                          	<td align="center">Tareas</td>
                            <td align="center">Lección</td>
                          	<td align="center"><?php echo $VTDesA1; ?>&nbsp;</td>
                            <td align="center"><?php echo $VTDesA2; ?>&nbsp;</td>
                          	<td align="center">Act. Indiv.</td>
                            <td align="center">Act. Grupal</td>
                            <td align="center">Eval. Parcial</td>
                            
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
			$VLdtpradicional1=get_result($VLdtDatos,$i,"pd.dtpradicional1");
			$VLdtpradicional2=get_result($VLdtDatos,$i,"pd.dtpradicional2");
			$VLdtprrefuerzo=get_result($VLdtDatos,$i,"pd.dtprrefuerzo");
			$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
			$VtMateriaTipo=get_result($VLdtDatos,$i,"pd.mattipo");

			if ( $VtFamilia<4 ){
			
?>						  

    <tr>
        <td width="40%"><font size="-1" ><? echo ($VTApellido." ".$VTNombre);  ?>
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
        <select name="txt_lecc[]">
        <option value="0" <?php if ( $VTdtprlecciones == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprlecciones == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprlecciones == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprlecciones == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprlecciones == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Adc1[]">
        <option value="0" <?php if ( $VLdtpradicional1 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VLdtpradicional1 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VLdtpradicional1 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VLdtpradicional1 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VLdtpradicional1 == "4") {?> selected <?php }?>>N/E</option>
		</select>
		</td>
        <td width="10%" align="center">
        <select name="txt_Adc2[]">
        <option value="0" <?php if ( $VLdtpradicional2 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VLdtpradicional2 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VLdtpradicional2 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VLdtpradicional2 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VLdtpradicional2 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_ActI[]">
        <option value="0" <?php if ( $VLdtpractindiv == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VLdtpractindiv == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VLdtpractindiv == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VLdtpractindiv == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VLdtpractindiv == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_ActG[]">
        <option value="0" <?php if ( $VLdtpractgrupal == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VLdtpractgrupal == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VLdtpractgrupal == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VLdtpractgrupal == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VLdtpractgrupal == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Prb[]">
        <option value="0" <?php if ( $VLdtprprueba == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VLdtprprueba == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VLdtprprueba == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VLdtprprueba == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VLdtprprueba == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        
        <td width="10%" align="center">
        <select name="txt_Pro1[]">
        <option value="0" <?php if ( $VTdtprpromedio1 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprpromedio1 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprpromedio1 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprpromedio1 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprpromedio1 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        
        <td width="10%" align="center">
        <select name="txt_Rfz[]">
        <option value="0" <?php if ( $VLdtprrefuerzo == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VLdtprrefuerzo == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VLdtprrefuerzo == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VLdtprrefuerzo == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VLdtprrefuerzo == "4") {?> selected <?php }?>>N/E</option>
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
        <td width="40%"><font size="-1" ><? echo ($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
        <td width="10%" align="center"><?php echo number_format($VTdtprtareas,2); ?></td>
        <td width="10%" align="center"><?php echo number_format($VTdtprlecciones,2); ?></td>
        <td width="10%" align="center"><?php echo number_format($VLdtpradicional1,2); ?></td>
        <td width="10%" align="center"  ><?php echo number_format($VLdtpradicional2,2); ?></td>
        <td width="10%" align="center"><?php echo number_format($VTdtpractindiv,2); ?></td>
        <td width="10%" align="center"><?php echo number_format($VTdtpractgrupal,2); ?></td>
        <td width="10%" align="center"><?php echo number_format($VTdtprprueba,2); ?></td>        
        <?php 
		//////////////  CALCULAMOS EL PROMEDIO 1 /////////////////////////////
		$VtDiv=0;
		$VtPromedio1=0;
		
		if ($VTdtprtareas>0){
			$VtPromedio1 += $VTdtprtareas;
			$VtDiv++;
		}
		if ($VTdtprlecciones>0){
			$VtPromedio1 += $VTdtprlecciones;
			$VtDiv++;
		}
		if ($VLdtpradicional1>0){
			$VtPromedio1 += $VLdtpradicional1;
			$VtDiv++;
		}
		if ($VLdtpradicional2>0){
			$VtPromedio1 += $VLdtpradicional2;
			$VtDiv++;
		}
		if ($VTdtpractindiv>0){
			$VtPromedio1 += $VTdtpractindiv;
			$VtDiv++;
		}
		if ($VTdtpractgrupal>0){
			$VtPromedio1 += $VTdtpractgrupal;
			$VtDiv++;
		}
		if ($VTdtprprueba>0){
			$VtPromedio1 += $VTdtprprueba;
			$VtDiv++;
		}
		
		if ($VtDiv>0)
		{
			$VLdtprpromedio1=$VtPromedio1/$VtDiv;	
		} else{
			$VLdtprpromedio1=0;
		}
		
		if ($VLdtprrefuerzo>0){
			$VtPromedio1 += $VLdtprrefuerzo;
			$VtDiv++;
		}
		if ($VtDiv>0)
		{
			$VTdtprpromedio=$VtPromedio1/$VtDiv;	
		} else {
			$VTdtprpromedio=0;
		}
				
////////////////// ACTUALIZAMOS LOS PROMEDIOS EN LA BDD /////////
			if ( $VLModificar!="")
			{
					$Vtquery2="update prcldtll set ";
					if ( $VLdtmattipo[$i]== 2 || $VLdtmattipo[$i]== 3 ) {
						$Vtquery2.=" dtprpromedio1=".round($VLdtprpromedio1,2)." , dtprpromedio=".round($VTdtprpromedio,2);
					}else {						
						$Vtquery2.=" dtprpromedio1=".round($VLdtprpromedio1,2)." , dtprpromedio=".round($VTdtprpromedio,2);
					}
					$Vtquery2.=" where ( dtprestado=2 or dtprestado=3 ) and ";
					$Vtquery2.="dtprcodigo=".$VLdtprcodigo[$i];
					$VLdtDatos2 = execute_query($Vtquery2,$VLConexion);
			}
		?>
        
        <td width="10%" align="center"><font  <?php if($VLdtprpromedio1<7 && $VLdtprpromedio1>0 ){ ?> color="#FF0000" <?php } else { ?> color="#000000" <?php } ?> ><b><?php echo number_format($VLdtprpromedio1,2); ?></b></font></td>
        <td width="10%" align="center" <?php if($VLdtprpromedio1<7 && $VLdtprpromedio1>0 ){ ?> bgcolor="#FF9999" <?php } ?>  ><input name="txt_Rfz[]" type="text" id="txt_Consulta9" size="5" maxlength="5" value="<?php echo $VLdtprrefuerzo; ?>"></td>
        <td width="10%" align="center"><font  <?php if($VTdtprpromedio<7 && $VTdtprpromedio>0 ){ ?> color="#FF0000" <?php } else { ?> color="#000000" <?php } ?> ><b><?php echo number_format($VTdtprpromedio,2); ?></b></font></td>
        
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
    	<td>
        <input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>">
<fieldset  >
						  <legend ><?  echo ($VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre." - ".$VtParcial); ?></legend>
						<table width="100%" border="1">
						  <tr>
							<td width="40%" align="center" ><font size="-1" ><input type="hidden" name="txt_familia" value="<?php echo $VtFamilia; ?>"><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>"><input type="hidden" name="txt_Camp13" value="<?php echo $VLdtCamp13; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>">NOMINA</font></td>
							<td width="20%" align="center" colspan="2" ><font size="-1" >INSUMO1</font></td>
							<td width="10%" align="center"><font size="-1" >INSUMO2</font></td>
							<td width="10%" align="center" ><font size="-1" >REFUERZO ACADEMICO</font></td>
							<td width="10%" align="center" ><p><font size="-1" >PROMEDIO PARCIAL</font></p></td>
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
        <td width="40%"><font size="-1" ><? echo ($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
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
    	<td>
        <input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>">
<fieldset  >
						  <legend ><?  echo ($VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre." - ".$VtParcial); ?></legend>
						<table width="100%" border="1">
						  <tr>
							<td width="40%" align="center"><font size="-1" ><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>"><input type="hidden" name="txt_Camp13" value="<?php echo $VLdtCamp13; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>">Apellidos y Nombres</font></td>
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
        <td width="40%"><font size="-1" ><? echo ($VTApellido." ".$VTNombre);  ?>
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
						  <legend ><?  echo ($VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre." - ".$VtParcial); ?></legend>
						<table width="100%" border="1">
						  <tr>
							<td width="40%" align="center"><font size="-1" ><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>"><input type="hidden" name="txt_Camp13" value="<?php echo $VLdtCamp13; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>">Apellidos y Nombres</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</td>
							<td width="10%" align="center"><font size="-1" >Faltas Justificadas</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</font></td>
							<td width="10%" align="center"><font size="-1" >Faltas Injustificadas</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</font></td>
							<td width="10%" align="center"><font size="-1" >Atrasos</font></td>
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
        <td width="40%"><font size="-1" ><? echo ($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><input name="txt_ActI[]" type="text" id="txt_Consulta2" size="5" maxlength="5" value="<?php echo $VTdtpractindiv; ?>"></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><input name="txt_leccion[]" type="text" id="txt_Consulta4" size="5" maxlength="5" value="<?php echo $VTdtprlecciones; ?>"></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><input name="txt_ActG[]" type="text" id="txt_Consulta4" size="5" maxlength="5" value="<?php echo $VTdtpractgrupal; ?>"></td>
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
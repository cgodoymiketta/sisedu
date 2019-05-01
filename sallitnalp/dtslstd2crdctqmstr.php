<?PHP //=$Vtquery;
	$VtQueryE=" Select espdescripcion, espsiglas from spcldd where espcodigo=".$VLdtCamp12;
	$VtQueryC=" Select curdescripcion from crs where curcodigo=".$VLdtCamp9;
	$VtQueryP=" Select pardescripcion from prll where parcodigo=".$VLdtCamp8;
	$VtQueryM=" Select matdescripcion, mattipo, famcodigo from mtr where matcodigo=".$VLdtCamp10;
	$VtQueryQ=" Select quidescripcion, quitipo from qmstr where quicodigo=".$VLdtCamp6;
/////////////////  CONSULTAMOS ESPECIALIDAD / CURSO / PARALELO / MATERIA / QUIMESTRE / PARCIAL
	
	$VLdtDatosE = execute_query($VtQueryE,$VLConexion);
	$VLnuDatosE = total_records($VLdtDatosE);
	if ( $VLnuDatosE>0 )
	{
		$VtEspecialidad=get_result($VLdtDatosE,0,"espsiglas");
	}
	
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
		$VtQuimestreTipo=get_result($VLdtDatosQ,0,"quitipo");
	}
	
switch($VtQuimestreTipo){
case "0": //////////// QUIMESTRE

 ?>

<table width="100%" border="0">
<?php 

	
	
switch ($VtMateriaTipo) {
case "1":
/////////////////////PARA MATERIAS CUANTITATIVAS
?>

 <tr>
	<td ><fieldset  >
						  <legend ><?  echo ($VtEspecialidad." - ".$VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre); ?></legend>
						<table width="100%" border="1">
						  <tr>
							<td width="10%" align="center">No</td>
							<td width="40%" align="center"><font size="-1" ><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>"><input type="hidden" name="txt_familia" value="<?php echo $VtFamilia; ?>"><input type="hidden" name="txt_tipoq" value="<?php echo $VtTipoq; ?>">Apellidos y Nombres <?php //echo $VTCadena; ?> </font></td>
							<td width="10%" align="center"><font size="-1" >PRO. PARC.</font></td>
							<td width="10%" align="center"><font size="-1" >EQUIV 80%</font></td>
							<td width="10%" align="center"><font size="-1" >EXAM QUIM</font></td>
							<td width="10%" align="center"><font size="-1" >EQUIV. 20%</font></td>
							<td width="10%" align="center"><font size="-1" >PROM. QUIM.</font></td>
							<td width="10%" align="center">&nbsp;</td>
						  </tr>
<?PHP 
$Vtquery= "SELECT p.perapellidos, p.pernombres, mt.mtrestado,
q.quicodigo, qd.dtqmcodigo, qd.mtrno, qd.matcodigo, 
qd.quipromparcial, qd.quiequivalencia80, qd.quiexamen, 
qd.quiequivalencia20, qd.quipromquimestre, qd.dtqmestado
FROM qmstr q, qmstrdtll qd, mtrcl mt, nsttcnstdnt e, psn p
WHERE q.quicodigo =".$VLdtCamp6."
and q.quicodigo=qd.quicodigo
and qd.matcodigo=".$VLdtCamp10."
and qd.mtrno=mt.mtrno
and (qd.dtqmestado=5 or qd.dtqmestado=7 or qd.dtqmestado=9 )
and mt.grucodigo=".$VLdtCamp14."
and mt.parcodigo=".$VLdtCamp8."
and mt.inescodigo=e.inescodigo
and e.percodigo=p.percodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTMtrEstado=get_result($VLdtDatos,$i,"mt.mtrestado");
			$VTdtDtqmcodigo=get_result($VLdtDatos,$i,"qd.dtqmcodigo");
			$VTdtPromParcial=get_result($VLdtDatos,$i,"qd.quipromparcial");
			$VTdtEquiv80=get_result($VLdtDatos,$i,"qd.quiequivalencia80");
			$VTdtExamen=get_result($VLdtDatos,$i,"qd.quiexamen");
			$VTdtEquiv20=get_result($VLdtDatos,$i,"qd.quiequivalencia20");
			$VTdtPromQuim=get_result($VLdtDatos,$i,"qd.quipromquimestre");
			$VTdtDtQmEstado=get_result($VLdtDatos,$i,"qd.dtqmestado");
			
			
			$VTdtPromParcial8=$VTdtPromParcial;
			$VTdtEquiv808=$VTdtEquiv80;
			$VTdtExamen8=$VTdtExamen;
			$VTdtEquiv208=$VTdtEquiv20;
			$VTdtPromQuim8=$VTdtPromQuim;

			
			$VTQry="Select * from prcldtll where dtqmcodigo=".$VTdtDtqmcodigo;
			$VLdtDatosPro = execute_query($VTQry,$VLConexion);
			$VLnuDatosPro = total_records($VLdtDatosPro);
			if ( $VLnuDatosPro>0)
			{
				$VTdtPromParcial=0;
				for ($m=0; $m< $VLnuDatosPro; $m++)
				{
					$VTdtPromPar=get_result($VLdtDatosPro,$m,"dtprpromedio");
					$VTdtPromParcial= $VTdtPromParcial+$VTdtPromPar;
				}	
				$VTdtPromParcial=round($VTdtPromParcial/$VLnuDatosPro,2);
				$VTdtEquiv80=round($VTdtPromParcial*8/10,2);
			}else {
				
				$VTdtPromParcial=0;
				$VTdtEquiv80=0;
			}
			if($VTdtExamen>0)
			{
				$VTdtEquiv20=round($VTdtExamen*2/10,2);
				
			}else{
				$VTdtEquiv20=0;
			}
			$VTdtPromQuim=$VTdtEquiv80+$VTdtEquiv20;
			

			switch ($VTMtrEstado) {
			case "1":
			$VLdtColor="#000000";
			$VLdtObserv="&nbsp;";
				break 1; 
			case "2":
			$VLdtColor="#003300"; 
			$VLdtObserv=" ( DESERTOR )";
			case "3":
			$VLdtColor="#FF0000"; 
			$VLdtObserv=" ( RETIRADO)";
			default: 
			}

			
			if ( $VtFamilia<4 ){ /////////////PARA PRIMERO
			
?>						  

    <tr>
		<td width="10%" align="center"><?=$i+1; ?></td>
        <td width="40%"><font size="-1" color="<?=$VLdtColor ; ?>" ><? echo ($VTApellido." ".$VTNombre.$VLdtObserv);  ?>
        <input type="hidden" name="txt_Dtqmcodigo[]" value="<?php echo $VTdtDtqmcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"><input type="hidden" name="txt_dtfamilia[]" value="<?php echo $VtFamilia; ?>"></font></td>
        <td width="10%" align="center"> 
        <select name="txt_PromParc[]">
        <option value="0" <?php if ( $VTdtPromParcial8 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtPromParcial8 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtPromParcial8 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtPromParcial8 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtPromParcial8 == "4") {?> selected <?php }?>>N/E</option>
		</select>
     </td>
        <td width="10%" align="center">
        <select name="txt_Equi80[]">
        <option value="0" <?php if ( $VTdtEquiv808 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtEquiv808 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtEquiv808 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtEquiv808 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtEquiv808 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Exam[]">
        <option value="0" <?php if ( $VTdtExamen8 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtExamen8 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtExamen8 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtExamen8 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtExamen8 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Equi20[]">
        <option value="0" <?php if ( $VTdtEquiv208 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtEquiv208 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtEquiv208 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtEquiv208 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtEquiv208 == "4") {?> selected <?php }?>>N/E</option>
		</select>
		</td>
        <td width="10%" align="center">
        <select name="txt_ProQui[]">
        <option value="0" <?php if ( $VTdtPromQuim8 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtPromQuim8 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtPromQuim8 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtPromQuim8 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtPromQuim8 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">&nbsp;</td>
    </tr>

<?php  
			}else{
?>
    <tr>
		<td width="10%" align="center"><?=$i+1; ?><?php echo "--".$VTdtDtQmEstado; ?></td>
        <td width="40%"><font size="-1" ><? echo ($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_Dtqmcodigo[]" value="<?php echo $VTdtDtqmcodigo; ?>"><input type="hidden" name="txt_Dtqmestado[]" value="<?php echo $VTdtDtQmEstado; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"><input type="hidden" name="txt_dtfamilia[]" value="<?php echo $VtFamilia; ?>"></font></td>
        <td width="10%" align="center"><input name="txt_PromParc[]" type="text" id="txt_Consulta" value="<?php echo $VTdtPromParcial; ?>" size="5" maxlength="5" readonly="readonly"></td>
        <td width="10%" align="center"><input name="txt_Equi80[]" type="text" id="txt_Consulta2" value="<?php echo $VTdtEquiv80; ?>" size="5" maxlength="5" readonly="readonly"></td>
        <td width="10%" align="center"><input name="txt_Exam[]" type="text" id="txt_Consulta3" size="5" maxlength="5" value="<?php echo $VTdtExamen; ?>"></td>
        <td width="10%" align="center"><input name="txt_Equi20[]" type="text" id="txt_Consulta4" value="<?php echo $VTdtEquiv20; ?>" size="5" maxlength="5" readonly="readonly"></td>
        <td width="10%" align="center"><input name="txt_ProQui[]" type="text" id="txt_Consulta5" value="<?php echo $VTdtPromQuim; ?>" size="5" maxlength="5" readonly="readonly"></td>
        <td width="10%" align="center">&nbsp;</td>
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
case "2":
/////////////////// PARA MATERIAS CULITATIVAS

?>
    <tr>
    	<td>
<fieldset  >
	    <legend ><?  echo ($VtCurso." ".$VtParalelo."  /  ".$VtMateria." ".$VtMateriaTipo." ..  /   ".$VtQuimestre); ?></legend>
						<table width="100%" border="1">
						  <tr>
							<td width="10%" align="center">No</td>
							<td width="40%" align="center"><font size="-1" ><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>"><input type="hidden" name="txt_familia" value="<?php echo $VtFamilia; ?>"><input type="hidden" name="txt_tipoq" value="<?php echo $VtTipoq; ?>">Apellidos y Nombres</font></td>
							<td width="10%" align="center"><font size="-1" >PRO. PARC.</font></td>
							<td width="10%" align="center"><font size="-1" >EQUIV 80%</font></td>
							<td width="10%" align="center"><font size="-1" >EXAM QUIM</font></td>
							<td width="10%" align="center"><font size="-1" >EQUIV. 20%</font></td>
							<td width="10%" align="center"><font size="-1" >PROM. QUIM.</font></td>
							<td width="10%" align="center">&nbsp;</td>
						  </tr>
<?PHP 
$Vtquery= " SELECT p.perapellidos, p.pernombres, mt.mtrestado,
q.quicodigo, qd.dtqmcodigo, qd.mtrno, qd.matcodigo, 
qd.quipromparcial, qd.quiequivalencia80, qd.quiexamen, 
qd.quiequivalencia20, qd.quipromquimestre
FROM qmstr q, qmstrdtll qd, mtrcl mt, nsttcnstdnt e, psn p
WHERE q.quicodigo =".$VLdtCamp6."
and qd.matcodigo=".$VLdtCamp10."
and q.quicodigo=qd.quicodigo
and qd.mtrno=mt.mtrno
and qd.dtqmestado>4
and mt.grucodigo=".$VLdtCamp14."
and mt.parcodigo=".$VLdtCamp8."
and mt.inescodigo=e.inescodigo
and e.percodigo=p.percodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTMtrEstado=get_result($VLdtDatos,$i,"mt.mtrestado");
			$VTdtDtqmcodigo=get_result($VLdtDatos,$i,"qd.dtqmcodigo");
			$VTdtPromParcial=get_result($VLdtDatos,$i,"qd.quipromparcial");
			$VTdtEquiv80=get_result($VLdtDatos,$i,"qd.quiequivalencia80");
			$VTdtExamen=get_result($VLdtDatos,$i,"qd.quiexamen");
			$VTdtEquiv20=get_result($VLdtDatos,$i,"qd.quiequivalencia20");
			$VTdtPromQuim=get_result($VLdtDatos,$i,"qd.quipromquimestre");

			switch ($VTMtrEstado) {
			case "1":
			$VLdtColor="#000000";
			$VLdtObserv="&nbsp;";
				break 1; 
			case "2":
			$VLdtColor="#003300"; 
			$VLdtObserv=" ( DESERTOR )";
			case "3":
			$VLdtColor="#FF0000"; 
			$VLdtObserv=" ( RETIRADO)";
			default: 
			}

?>						  

    <tr>
		<td width="10%" align="center"><?=$i+1; ?></td>
        <td width="40%"><font size="-1" color="<?=$VLdtColor ; ?>" ><? echo ($VTApellido." ".$VTNombre.$VLdtObserv);  ?>
        <input type="hidden" name="txt_Dtqmcodigo[]" value="<?php echo $VTdtDtqmcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
        <td width="10%" align="center"> 
        <select name="txt_PromParc[]">
        <option value="0" <?php if ( $VTdtPromParcial == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtPromParcial == "9" ) {?> selected <?php }?>  >EX</option>
        <option value="7" <?php if ( $VTdtPromParcial == "7") {?> selected <?php }?>>MB</option>
        <option value="5" <?php if ( $VTdtPromParcial == "5") {?> selected <?php }?>>B</option>
        <option value="4" <?php if ( $VTdtPromParcial == "4") {?> selected <?php }?>>R</option>
		</select>
     </td>
        <td width="10%" align="center">
        <select name="txt_Equi80[]" disabled="disabled" >
        <option value="0" <?php if ( $VTdtEquiv80 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtEquiv80 == "9" ) {?> selected <?php }?>  >EX</option>
        <option value="7" <?php if ( $VTdtEquiv80 == "7") {?> selected <?php }?>>MB</option>
        <option value="5" <?php if ( $VTdtEquiv80 == "5") {?> selected <?php }?>>B</option>
        <option value="4" <?php if ( $VTdtEquiv80 == "4") {?> selected <?php }?>>R</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Exam[]">
        <option value="0" <?php if ( $VTdtExamen == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtExamen == "9" ) {?> selected <?php }?>  >EX</option>
        <option value="7" <?php if ( $VTdtExamen == "7") {?> selected <?php }?>>MB</option>
        <option value="5" <?php if ( $VTdtExamen == "5") {?> selected <?php }?>>B</option>
        <option value="4" <?php if ( $VTdtExamen == "4") {?> selected <?php }?>>R</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Equi20[]" disabled="disabled">
        <option value="0" <?php if ( $VTdtEquiv20 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtEquiv20 == "9" ) {?> selected <?php }?>  >EX</option>
        <option value="7" <?php if ( $VTdtEquiv20 == "7") {?> selected <?php }?>>MB</option>
        <option value="5" <?php if ( $VTdtEquiv20 == "5") {?> selected <?php }?>>B</option>
        <option value="4" <?php if ( $VTdtEquiv20 == "4") {?> selected <?php }?>>R</option>
		</select>
		</td>
        <td width="10%" align="center">
        <select name="txt_ProQui[]" >
        <option value="0" <?php if ( $VTdtPromQuim == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtPromQuim == "9" ) {?> selected <?php }?>  >EX</option>
        <option value="7" <?php if ( $VTdtPromQuim == "7") {?> selected <?php }?>>MB</option>
        <option value="5" <?php if ( $VTdtPromQuim == "5") {?> selected <?php }?>>B</option>
        <option value="4" <?php if ( $VTdtPromQuim == "4") {?> selected <?php }?>>R</option>
		</select>
        </td>
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
case "3":
//////////////// PARA MATERIAS DE COMPORTAMIENTO
?>    
    <tr>
    	<td>
<fieldset  >
						  <legend ><?  echo ($VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre); ?></legend>
						<table width="100%" border="1">
						  <tr>
							<td width="10%" align="center">No</td>
							<td width="40%" align="center"><font size="-1" ><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>"><input type="hidden" name="txt_familia" value="<?php echo $VtFamilia; ?>"><input type="hidden" name="txt_tipoq" value="<?php echo $VtTipoq; ?>">Apellidos y Nombres</font></td>
							<td width="10%" align="center">&nbsp;</td>
							<td width="10%" align="center"><font size="-1" >Comportamiento</font></td>
						  </tr>
<?PHP 
$Vtquery= " SELECT p.perapellidos, p.pernombres, mt.mtrestado,
q.quicodigo, qd.dtqmcodigo, qd.mtrno, qd.matcodigo, qd.quipromquimestre
FROM qmstr q, qmstrdtll qd, mtrcl mt, nsttcnstdnt e, psn p
WHERE q.quicodigo =".$VLdtCamp6."
and qd.matcodigo=".$VLdtCamp10."
and q.quicodigo=qd.quicodigo
and qd.mtrno=mt.mtrno
and qd.dtqmestado>4
and mt.grucodigo=".$VLdtCamp14."
and mt.parcodigo=".$VLdtCamp8."
and mt.inescodigo=e.inescodigo
and e.percodigo=p.percodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTMtrEstado=get_result($VLdtDatos,$i,"mt.mtrestado");
			$VTdtDtqmcodigo=get_result($VLdtDatos,$i,"qd.dtqmcodigo");
			$VTdtPromQuim=get_result($VLdtDatos,$i,"qd.quipromquimestre");

			switch ($VTMtrEstado) {
			case "1":
			$VLdtColor="#000000";
			$VLdtObserv="&nbsp;";
				break 1; 
			case "2":
			$VLdtColor="#003300"; 
			$VLdtObserv=" ( DESERTOR )";
			case "3":
			$VLdtColor="#FF0000"; 
			$VLdtObserv=" ( RETIRADO)";
			default: 
			}
			if($VTdtPromQuim==0){			
				$VTQry="Select * from prcldtll where dtqmcodigo=".$VTdtDtqmcodigo." order by PRCCODIGO  DESC";
				$VLdtDatosPro = execute_query($VTQry,$VLConexion);
				$VLnuDatosPro = total_records($VLdtDatosPro);
				if ( $VLnuDatosPro>0)
				{
						$VTdtPromQuim=get_result($VLdtDatosPro,0,"dtprpromedio");
					
				}
			}

?>						  
    <tr>
		<td width="10%" align="center"><?=$i+1; ?></td>
        <td width="40%"><font size="-1" ><? echo ($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_Dtqmcodigo[]" value="<?php echo $VTdtDtqmcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><select name="txt_ProQui[]">
        <option value="0" <?php if ( $VTdtPromQuim == "0") {?> selected <?php }?>>NR</option>
		<option value="5" <?php if ( $VTdtPromQuim == "5" ) {?> selected <?php }?>  >A</option>
        <option value="4" <?php if ( $VTdtPromQuim == "4") {?> selected <?php }?>>B</option>
        <option value="3" <?php if ( $VTdtPromQuim == "3") {?> selected <?php }?>>C</option>
        <option value="2" <?php if ( $VTdtPromQuim == "2") {?> selected <?php }?>>D</option>
        <option value="1" <?php if ( $VTdtPromQuim == "1") {?> selected <?php }?>>E</option>
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
case "4":
//////////////// PARA MATERIAS DE ASISTENCIA
?>    
    <tr>
    	<td>
        
<fieldset  >
						  <legend ><?  echo ($VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre); ?></legend>
						<table width="100%" border="1">
						  <tr>
							<td width="10%" align="center">No</td>
							<td width="40%" align="center"><font size="-1" ><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>"><input type="hidden" name="txt_familia" value="<?php echo $VtFamilia; ?>"><input type="hidden" name="txt_tipoq" value="<?php echo $VtTipoq; ?>">Apellidos y Nombres</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</td>
							<td width="10%" align="center"><font size="-1" >Faltas Justificadas</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</font></td>
							<td width="10%" align="center"><font size="-1" >Faltas Injustificadas</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</font></td>
							<td width="10%" align="center"><font size="-1" >Atrasos</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</font></td>
						  </tr>
<?PHP 
$Vtquery= " SELECT p.perapellidos, p.pernombres, mt.mtrestado,
q.quicodigo, qd.dtqmcodigo, qd.mtrno, qd.matcodigo, 
qd.quipromquimestre, qd.quipromparcial, qd.quiexamen, 
qd.quiequivalencia20
FROM qmstr q, qmstrdtll qd, mtrcl mt, nsttcnstdnt e, psn p
WHERE q.quicodigo =".$VLdtCamp6."
and qd.matcodigo=".$VLdtCamp10."
and q.quicodigo=qd.quicodigo
and qd.mtrno=mt.mtrno
and qd.dtqmestado>4
and mt.grucodigo=".$VLdtCamp14."
and mt.parcodigo=".$VLdtCamp8."
and mt.inescodigo=e.inescodigo
and e.percodigo=p.percodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTMtrEstado=get_result($VLdtDatos,$i,"mt.mtrestado");
			$VTMtrNo=get_result($VLdtDatos,$i,"qd.mtrno");
			$VTdtDtqmcodigo=get_result($VLdtDatos,$i,"qd.dtqmcodigo");
			$VTdtPromParcial=get_result($VLdtDatos,$i,"qd.quipromparcial");
			$VTdtExamen=get_result($VLdtDatos,$i,"qd.quiexamen");
			$VTdtEquiv20=get_result($VLdtDatos,$i,"qd.quiequivalencia20");
			$VTdtPromQuim=get_result($VLdtDatos,$i,"qd.quipromquimestre");

			switch ($VTMtrEstado) {
			case "1":
			$VLdtColor="#000000";
			$VLdtObserv="&nbsp;";
				break 1; 
			case "2":
			$VLdtColor="#003300"; 
			$VLdtObserv=" ( DESERTOR )";
			case "3":
			$VLdtColor="#FF0000"; 
			$VLdtObserv=" ( RETIRADO)";
			default: 
			}
			$VTQry="Select pd.dtprlecciones, pd.dtpractindiv, pd.dtpractgrupal,  dt.matcodigo, dt.mtrno 
			from qmstr q, qmstrdtll dt, prcldtll pd 
			where q.quicodigo=dt.quicodigo
			and dt.dtqmcodigo=pd.dtqmcodigo
			and q.anocodigo=".$VLAnoLocal."
			and q.quicodigo=".$VLdtCamp6."
			and q.inscodigo=".$VLInstitucion."
			and dt.matcodigo=".$VLdtCamp10."
			and dt.mtrno=".$VTMtrNo."
			and q.quitipo=0";
			$VLdtDatosPro = execute_query($VTQry,$VLConexion);
			$VLnuDatosPro = total_records($VLdtDatosPro);
			if ( $VLnuDatosPro>0)
			{
				$VTdtPromParcial=0;
				$VTdtExamen=0;
				$VTdtEquiv20=0;
				
				for ($m=0; $m< $VLnuDatosPro; $m++)
				{
					$VTdtInjustificadaa=get_result($VLdtDatosPro,$m,"pd.dtprlecciones");
					$VTdtJustificadaa=get_result($VLdtDatosPro,$m,"pd.dtpractindiv");
					$VTdtAtrasoa=get_result($VLdtDatosPro,$m,"pd.dtpractgrupal");
					$VTdtPromParcial=$VTdtPromParcial+$VTdtJustificadaa;
					$VTdtExamen=$VTdtExamen+$VTdtInjustificadaa;
					$VTdtEquiv20=$VTdtEquiv20+$VTdtAtrasoa;
				}	
				
			}

?>						  
    <tr>
		<td width="10%" align="center"><?=$i+1; ?></td>
        <td width="40%"><font size="-1" ><? echo ($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_Dtqmcodigo[]" value="<?php echo $VTdtDtqmcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
        <td width="10%" align="center"><? //echo $VTQry; ?>&nbsp;</td>
        <td width="10%" align="center"><input name="txt_PromParc[]" type="text" id="txt_PromParc" size="5" maxlength="5" value="<?php echo $VTdtPromParcial; ?>"></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><input name="txt_Exam[]" type="text" id="txt_Exam" size="5" maxlength="5" value="<?php echo $VTdtExamen; ?>"></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><input name="txt_Equi20[]" type="text" id="txt_Exam" size="5" maxlength="5" value="<?php echo $VTdtEquiv20; ?>"></td>
        <td width="10%" align="center"><input type="hidden" name="txt_ProQui[]" value="<?php echo $VTCadena; ?>">&nbsp;</td>
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
 
 ?>   
    		
</table>

<?PHP
 break 1;
 case "1":////////////// FIN DE AÑO
?>

<table width="100%" border="0">
<?php 

	
	
switch ($VtMateriaTipo) {
case "1":
/////////////////////PARA MATERIAS CUANTITATIVAS
?>

 <tr>
	<td ><fieldset  >
						  <legend ><?  echo ($VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre); ?></legend>
						<table width="100%" border="1">
						  <tr>
							<td width="10%" align="center">No</td>
							<td width="40%" align="center"><font size="-1" ><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>"><input type="hidden" name="txt_familia" value="<?php echo $VtFamilia; ?>"><input type="hidden" name="txt_tipoq" value="<?php echo $VtTipoq; ?>">Apellidos y Nombres</font></td>
							<td width="10%" align="center"><font size="-1" >PRO. QUIM</font></td>
							<td width="10%" align="center"><font size="-1" >SUPLETORIO</font></td>
							<td width="10%" align="center"><font size="-1" >REMEDIAL</font></td>
							<td width="10%" align="center"><font size="-1" >GRACIA</font></td>
							<td width="10%" align="center"><font size="-1" >PROM. ANUAL.</font></td>
							<td width="10%" align="center">&nbsp;</td>
						  </tr>
<?PHP 
$Vtquery= "SELECT p.perapellidos, p.pernombres, mt.mtrno, mt.mtrestado,
q.quicodigo, qd.dtqmcodigo, qd.mtrno, qd.matcodigo, 
qd.quipromparcial, qd.quiequivalencia80, qd.quiexamen, 
qd.quiequivalencia20, qd.quipromquimestre
FROM qmstr q, qmstrdtll qd, mtrcl mt, nsttcnstdnt e, psn p
WHERE q.quicodigo =".$VLdtCamp6."
and q.anocodigo=".$VLAnoLocal."
and q.inscodigo=".$VLInstitucion."
and q.quicodigo=qd.quicodigo
and qd.matcodigo=".$VLdtCamp10."
and qd.mtrno=mt.mtrno
and qd.dtqmestado>4
and mt.grucodigo=".$VLdtCamp14."
and mt.parcodigo=".$VLdtCamp8."
and mt.inescodigo=e.inescodigo
and e.percodigo=p.percodigo
group by p.perapellidos, p.pernombres, mt.mtrestado, q.quicodigo, qd.dtqmcodigo, qd.mtrno, qd.matcodigo, qd.quipromparcial, qd.quiequivalencia80, qd.quiexamen, qd.quiequivalencia20, qd.quipromquimestre
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTMtrEstado=get_result($VLdtDatos,$i,"mt.mtrestado");
			$VTMtrNo=get_result($VLdtDatos,$i,"mt.mtrno");
			$VTdtDtqmcodigo=get_result($VLdtDatos,$i,"qd.dtqmcodigo");
			$VTdtPromParcial=get_result($VLdtDatos,$i,"qd.quipromparcial");
			$VTdtEquiv80=get_result($VLdtDatos,$i,"qd.quiequivalencia80");
			$VTdtExamen=get_result($VLdtDatos,$i,"qd.quiexamen");
			$VTdtEquiv20=get_result($VLdtDatos,$i,"qd.quiequivalencia20");
			$VTdtPromQuim=get_result($VLdtDatos,$i,"qd.quipromquimestre");
			
			$VTdtPromParcial8=$VTdtPromParcial;
			$VTdtEquiv808=$VTdtEquiv80;
			$VTdtExamen8=$VTdtExamen;
			$VTdtEquiv208=$VTdtEquiv20;
			$VTdtPromQuim8=$VTdtPromQuim;
			
			
			$VTQry="Select sum(dt.quipromquimestre) suma, count(dt.quipromquimestre) total, dt.matcodigo, dt.mtrno 
			from qmstr q, qmstrdtll dt 
			where q.quicodigo=dt.quicodigo
			and q.anocodigo=".$VLAnoLocal."
			and q.inscodigo=".$VLInstitucion."
			and dt.matcodigo=".$VLdtCamp10."
			and dt.mtrno=".$VTMtrNo."
			and q.quitipo=0
			group by dt.matcodigo, dt.mtrno";
			$VLdtDatosPro = execute_query($VTQry,$VLConexion);
			$VLnuDatosPro = total_records($VLdtDatosPro);
			if ( $VLnuDatosPro>0)
			{
				$VTdtPromParcial=0;
				$VtSuma=get_result($VLdtDatosPro,0,"suma");
				$VtDiv=get_result($VLdtDatosPro,0,"total");
				if ($VtDiv>0)
				{
					$VTdtPromParcial=round($VtSuma/$VtDiv,2);
				}
			}else {
				
			$VTdtPromParcial8=0;
			$VTdtEquiv808=0;
			$VTdtExamen8=0;
			$VTdtEquiv208=0;
			$VTdtPromQuim8=0;
			}
		
			switch ($VTMtrEstado) {
			case "1":
			$VLdtColor="#000000";
			$VLdtObserv="&nbsp;";
				break 1; 
			case "2":
			$VLdtColor="#003300"; 
			$VLdtObserv=" ( DESERTOR )";
			case "3":
			$VLdtColor="#FF0000"; 
			$VLdtObserv=" ( RETIRADO)";
			default: 
			}
			
			if ( $VtFamilia<4 ){
?>						  

    <tr>
		<td width="10%" align="center"><?=$i+1; ?></td>
        <td width="40%"><font size="-1" color="<?=$VLdtColor ; ?>" ><? echo ($VTApellido." ".$VTNombre.$VLdtObserv);  ?></font>
        <input type="hidden" name="txt_Dtqmcodigo[]" value="<?php echo $VTdtDtqmcodigo; ?>">
        <input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>">
        <input type="hidden" name="txt_dtfamilia[]" value="<?php echo $VtFamilia; ?>">
        <input type="hidden" name="txt_dtmattipo[]2" value="<?php echo $VtMateriaTipo; ?>" />
        </td>
        <td width="10%" align="center"> 
        <select name="txt_PromParc[]">
        <option value="0" <?php if ( $VTdtPromParcial8 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtPromParcial8 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtPromParcial8 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtPromParcial8 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtPromParcial8 == "4") {?> selected <?php }?>>N/E</option>
		</select>
     </td>
        <td width="10%" align="center">
        <select name="txt_Equi80[]">
        <option value="0" <?php if ( $VTdtEquiv808 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtEquiv808 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtEquiv808 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtEquiv808 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtEquiv808 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Exam[]">
        <option value="0" <?php if ( $VTdtExamen8 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtExamen8 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtExamen8 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtExamen8 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtExamen8 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Equi20[]">
        <option value="0" <?php if ( $VTdtEquiv208 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtEquiv208 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtEquiv208 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtEquiv208 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtEquiv208 == "4") {?> selected <?php }?>>N/E</option>
		</select>
		</td>
        <td width="10%" align="center">
        <select name="txt_ProQui[]">
        <option value="0" <?php if ( $VTdtPromQuim8 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtPromQuim8 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtPromQuim8 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtPromQuim8 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtPromQuim8 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">&nbsp;</td>
    </tr>

<?php  
			}else{
?>
    <tr>
		<td width="10%" align="center"><?=$i+1; ?></td>
        <td width="40%"><font size="-1" ><? echo ($VTApellido." ".$VTNombre);  ?></font>
        <input type="hidden" name="txt_Dtqmcodigo[]" value="<?php echo $VTdtDtqmcodigo; ?>">
        <input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>">
        <input type="hidden" name="txt_dtfamilia[]" value="<?php echo $VtFamilia; ?>">
        <input type="hidden" name="txt_dtmattipo[]2" value="<?php echo $VtMateriaTipo; ?>" />
        </td>
        <td width="10%" align="center"><input name="txt_PromParc[]" type="text" id="txt_Consulta" value="<?php echo $VTdtPromParcial; ?>" size="5" maxlength="5" readonly="readonly"></td>
        <td width="10%" align="center"><input name="txt_Equi80[]" type="text" id="txt_Consulta2" value="<?php echo $VTdtEquiv80; ?>" size="5" maxlength="5" ></td>
        <td width="10%" align="center"><input name="txt_Exam[]" type="text" id="txt_Consulta3" size="5" maxlength="5" value="<?php echo $VTdtExamen; ?>"></td>
        <td width="10%" align="center"><input name="txt_Equi20[]" type="text" id="txt_Consulta4" value="<?php echo $VTdtEquiv20; ?>" size="5" maxlength="5" ></td>
        <td width="10%" align="center"><input name="txt_ProQui[]" type="text" id="txt_Consulta5" value="<?php echo $VTdtPromQuim; ?>" size="5" maxlength="5" readonly="readonly"></td>
        <td width="10%" align="center">&nbsp;</td>
    </tr>
    
<?php
			}
?>    
    
    
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
case "2":
/////////////////// PARA MATERIAS CULITATIVAS

?>
    <tr>
    	<td>
<fieldset  >
	    <legend ><?  echo ($VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre); ?></legend>
						<table width="100%" border="1">
						  						  <tr>
							<td width="10%" align="center">No</td>
							<td width="40%" align="center"><font size="-1" ><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>"><input type="hidden" name="txt_familia" value="<?php echo $VtFamilia; ?>"><input type="hidden" name="txt_tipoq" value="<?php echo $VtTipoq; ?>">Apellidos y Nombres</font></td>
							<td width="10%" align="center"><font size="-1" >PRO. QUIM</font></td>
							<td width="10%" align="center"><font size="-1" >SUPLETORIO</font></td>
							<td width="10%" align="center"><font size="-1" >REMEDIAL</font></td>
							<td width="10%" align="center"><font size="-1" >GRACIA</font></td>
							<td width="10%" align="center"><font size="-1" >PROM. ANUAL.</font></td>
							<td width="10%" align="center">&nbsp;</td>
						  </tr>

<?PHP 
$Vtquery= " SELECT p.perapellidos, p.pernombres, mt.mtrestado,
q.quicodigo, qd.dtqmcodigo, qd.mtrno, qd.matcodigo, 
qd.quipromparcial, qd.quiequivalencia80, qd.quiexamen, 
qd.quiequivalencia20, qd.quipromquimestre
FROM qmstr q, qmstrdtll qd, mtrcl mt, nsttcnstdnt e, psn p
WHERE q.quicodigo =".$VLdtCamp6."
and q.anocodigo=".$VLAnoLocal."
and q.inscodigo=".$VLInstitucion."
and qd.matcodigo=".$VLdtCamp10."
and qd.dtqmestado>4
and q.quicodigo=qd.quicodigo
and qd.mtrno=mt.mtrno
and mt.grucodigo=".$VLdtCamp14."
and mt.parcodigo=".$VLdtCamp8."
and mt.inescodigo=e.inescodigo
and e.percodigo=p.percodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTMtrEstado=get_result($VLdtDatos,$i,"mt.mtrestado");
			$VTdtDtqmcodigo=get_result($VLdtDatos,$i,"qd.dtqmcodigo");
			$VTdtPromParcial=get_result($VLdtDatos,$i,"qd.quipromparcial");
			$VTdtEquiv80=get_result($VLdtDatos,$i,"qd.quiequivalencia80");
			$VTdtExamen=get_result($VLdtDatos,$i,"qd.quiexamen");
			$VTdtEquiv20=get_result($VLdtDatos,$i,"qd.quiequivalencia20");
			$VTdtPromQuim=get_result($VLdtDatos,$i,"qd.quipromquimestre");

			switch ($VTMtrEstado) {
			case "1":
			$VLdtColor="#000000";
			$VLdtObserv="&nbsp;";
				break 1; 
			case "2":
			$VLdtColor="#003300"; 
			$VLdtObserv=" ( DESERTOR )";
			case "3":
			$VLdtColor="#FF0000"; 
			$VLdtObserv=" ( RETIRADO)";
			default: 
			}

?>						  

    <tr>
		<td width="10%" align="center"><?=$i+1; ?></td>
        <td width="40%"><font size="-1" color="<?=$VLdtColor ; ?>" ><? echo ($VTApellido." ".$VTNombre.$VLdtObserv);  ?>
        <input type="hidden" name="txt_Dtqmcodigo[]" value="<?php echo $VTdtDtqmcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
        <td width="10%" align="center"> 
        <select name="txt_PromParc[]" >
        <option value="0" <?php if ( $VTdtPromParcial == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtPromParcial == "9" ) {?> selected <?php }?>  >EX</option>
        <option value="7" <?php if ( $VTdtPromParcial == "7") {?> selected <?php }?>>MB</option>
        <option value="5" <?php if ( $VTdtPromParcial == "5") {?> selected <?php }?>>B</option>
        <option value="4" <?php if ( $VTdtPromParcial == "4") {?> selected <?php }?>>R</option>
		</select>
     </td>
        <td width="10%" align="center">
        <select name="txt_Equi80[]" >
        <option value="0" <?php if ( $VTdtEquiv80 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtEquiv80 == "9" ) {?> selected <?php }?>  >EX</option>
        <option value="7" <?php if ( $VTdtEquiv80 == "7") {?> selected <?php }?>>MB</option>
        <option value="5" <?php if ( $VTdtEquiv80 == "5") {?> selected <?php }?>>B</option>
        <option value="4" <?php if ( $VTdtEquiv80 == "4") {?> selected <?php }?>>R</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Exam[]">
        <option value="0" <?php if ( $VTdtExamen == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtExamen == "9" ) {?> selected <?php }?>  >EX</option>
        <option value="7" <?php if ( $VTdtExamen == "7") {?> selected <?php }?>>MB</option>
        <option value="5" <?php if ( $VTdtExamen == "5") {?> selected <?php }?>>B</option>
        <option value="4" <?php if ( $VTdtExamen == "4") {?> selected <?php }?>>R</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Equi20[]" >
        <option value="0" <?php if ( $VTdtEquiv20 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtEquiv20 == "9" ) {?> selected <?php }?>  >EX</option>
        <option value="7" <?php if ( $VTdtEquiv20 == "7") {?> selected <?php }?>>MB</option>
        <option value="5" <?php if ( $VTdtEquiv20 == "5") {?> selected <?php }?>>B</option>
        <option value="4" <?php if ( $VTdtEquiv20 == "4") {?> selected <?php }?>>R</option>
		</select>
		</td>
        <td width="10%" align="center">
        <select name="txt_ProQui[]" disabled="disabled" >
        <option value="0" <?php if ( $VTdtPromQuim == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtPromQuim == "9" ) {?> selected <?php }?>  >EX</option>
        <option value="7" <?php if ( $VTdtPromQuim == "7") {?> selected <?php }?>>MB</option>
        <option value="5" <?php if ( $VTdtPromQuim == "5") {?> selected <?php }?>>B</option>
        <option value="4" <?php if ( $VTdtPromQuim == "4") {?> selected <?php }?>>R</option>
		</select>
        </td>
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
case "3":
//////////////// PARA MATERIAS DE COMPORTAMIENTO
?>    
    <tr>
    	<td>
<fieldset  >
						  <legend ><?  echo ($VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre); ?></legend>
						<table width="100%" border="1">
						  <tr>
							<td width="10%" align="center">No</td>
							<td width="40%" align="center"><font size="-1" ><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>"><input type="hidden" name="txt_familia" value="<?php echo $VtFamilia; ?>"><input type="hidden" name="txt_tipoq" value="<?php echo $VtTipoq; ?>">Apellidos y Nombres</font></td>
							<td width="10%" align="center">&nbsp;</td>
							<td width="10%" align="center"><font size="-1" >Comportamiento</font></td>
						  </tr>
<?PHP 
$Vtquery= " SELECT p.perapellidos, p.pernombres, mt.mtrestado,
q.quicodigo, qd.dtqmcodigo, qd.mtrno, qd.matcodigo, qd.quipromquimestre
FROM qmstr q, qmstrdtll qd, mtrcl mt, nsttcnstdnt e, psn p
WHERE q.quicodigo =".$VLdtCamp6."
and q.anocodigo=".$VLAnoLocal."
and q.inscodigo=".$VLInstitucion."
and qd.matcodigo=".$VLdtCamp10."
and q.quicodigo=qd.quicodigo
and qd.mtrno=mt.mtrno
and qd.dtqmestado>4
and mt.grucodigo=".$VLdtCamp14."
and mt.parcodigo=".$VLdtCamp8."
and mt.inescodigo=e.inescodigo
and e.percodigo=p.percodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++ )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTMtrNo=get_result($VLdtDatos,$i,"qd.mtrno");
			$VTMtrEstado=get_result($VLdtDatos,$i,"mt.mtrestado");
			$VTdtDtqmcodigo=get_result($VLdtDatos,$i,"qd.dtqmcodigo");
			$VTdtPromQuim=get_result($VLdtDatos,$i,"qd.quipromquimestre");

			switch ($VTMtrEstado) {
			case "1":
			$VLdtColor="#000000";
			$VLdtObserv="&nbsp;";
				break 1; 
			case "2":
			$VLdtColor="#003300"; 
			$VLdtObserv=" ( DESERTOR )";
			case "3":
			$VLdtColor="#FF0000"; 
			$VLdtObserv=" ( RETIRADO)";
			default: 
			}
			if($VTdtPromQuim==0){			
				$VTQry="Select q.quiorden, dt.quipromquimestre, dt.matcodigo, dt.mtrno 
			from qmstr q, qmstrdtll dt 
			where q.quicodigo=dt.quicodigo
			and q.anocodigo=".$VLAnoLocal."
			and q.inscodigo=".$VLInstitucion."
			and dt.matcodigo=".$VLdtCamp10."
			and dt.mtrno=".$VTMtrNo."
			and not q.quitipo=1
			order by q.quiorden desc";
				$VLdtDatosPro = execute_query($VTQry,$VLConexion);
				$VLnuDatosPro = total_records($VLdtDatosPro);
				if ( $VLnuDatosPro>0)
				{
					$VTdtPromQuim=get_result($VLdtDatosPro,0,"dt.quipromquimestre");
				}
			}

?>						  
    <tr>
		<td width="10%" align="center"><?=$i+1; ?></td>
        <td width="40%"><font size="-1" ><? echo ($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_Dtqmcodigo[]" value="<?php echo $VTdtDtqmcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><select name="txt_ProQui[]">
        <option value="0" <?php if ( $VTdtPromQuim == "0") {?> selected <?php }?>>NR</option>
		<option value="5" <?php if ( $VTdtPromQuim == "5" ) {?> selected <?php }?>  >A</option>
        <option value="4" <?php if ( $VTdtPromQuim == "4") {?> selected <?php }?>>B</option>
        <option value="3" <?php if ( $VTdtPromQuim == "3") {?> selected <?php }?>>C</option>
        <option value="2" <?php if ( $VTdtPromQuim == "2") {?> selected <?php }?>>D</option>
        <option value="1" <?php if ( $VTdtPromQuim == "1") {?> selected <?php }?>>E</option>
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
case "4":
//////////////// PARA MATERIAS DE ASISTENCIA
?>    
    <tr>
    	<td>
        
<fieldset  >
						  <legend ><?  echo ($VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre); ?></legend>
						<table width="100%" border="1">
						  <tr>
							<td width="10%" align="center">No</td>
							<td width="40%" align="center"><font size="-1" ><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>"><input type="hidden" name="txt_familia" value="<?php echo $VtFamilia; ?>"><input type="hidden" name="txt_tipoq" value="<?php echo $VtTipoq; ?>">Apellidos y Nombres</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</td>
							<td width="10%" align="center"><font size="-1" >Faltas Justificadas</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</font></td>
							<td width="10%" align="center"><font size="-1" >Faltas Injustificadas</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</font></td>
							<td width="10%" align="center"><font size="-1" >Atrasos</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</font></td>
						  </tr>
<?PHP 
$Vtquery= " SELECT p.perapellidos, p.pernombres, mt.mtrno, mt.mtrestado,
q.quicodigo, qd.dtqmcodigo, qd.mtrno, qd.matcodigo, 
qd.quipromparcial, qd.quiequivalencia80, qd.quiexamen, 
qd.quiequivalencia20, qd.quipromquimestre
FROM qmstr q, qmstrdtll qd, mtrcl mt, nsttcnstdnt e, psn p
WHERE q.quicodigo =".$VLdtCamp6."
and q.anocodigo=".$VLAnoLocal."
and q.inscodigo=".$VLInstitucion."
and q.quicodigo=qd.quicodigo
and qd.matcodigo=".$VLdtCamp10."
and qd.mtrno=mt.mtrno
and qd.dtqmestado>4
and mt.grucodigo=".$VLdtCamp14."
and mt.parcodigo=".$VLdtCamp8."
and mt.inescodigo=e.inescodigo
and e.percodigo=p.percodigo
group by p.perapellidos, p.pernombres, mt.mtrestado, q.quicodigo, qd.dtqmcodigo, qd.mtrno, qd.matcodigo, qd.quipromparcial, qd.quiequivalencia80, qd.quiexamen, qd.quiequivalencia20, qd.quipromquimestre
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTMtrEstado=get_result($VLdtDatos,$i,"mt.mtrestado");
			$VTMtrNo=get_result($VLdtDatos,$i,"mt.mtrno");
			$VTdtDtqmcodigo=get_result($VLdtDatos,$i,"qd.dtqmcodigo");
			$VTdtPromParcial=get_result($VLdtDatos,$i,"qd.quipromparcial");
			$VTdtExamen=get_result($VLdtDatos,$i,"qd.quiexamen");
			$VTdtEquiv20=get_result($VLdtDatos,$i,"qd.quiequivalencia20");

			switch ($VTMtrEstado) {
			case "1":
			$VLdtColor="#000000";
			$VLdtObserv="&nbsp;";
				break 1; 
			case "2":
			$VLdtColor="#003300"; 
			$VLdtObserv=" ( DESERTOR )";
			case "3":
			$VLdtColor="#FF0000"; 
			$VLdtObserv=" ( RETIRADO)";
			default: 
			}
			
			/////  PARA EL CASO DE SER LA NOTA ANUAL		
			$VTQry="Select sum(dt.quipromparcial) injustificada, sum(dt.quiexamen) justificada, 
			sum(dt.quiequivalencia20) atrasos, dt.matcodigo, dt.mtrno 
			from qmstr q, qmstrdtll dt 
			where q.quicodigo=dt.quicodigo
			and q.anocodigo=".$VLAnoLocal."
			and q.inscodigo=".$VLInstitucion."
			and dt.matcodigo=".$VLdtCamp10."
			and dt.mtrno=".$VTMtrNo."
			and not q.quitipo=1
			group by dt.matcodigo, dt.mtrno";			
			
			
			$VLdtDatosPro = execute_query($VTQry,$VLConexion);
			$VLnuDatosPro = total_records($VLdtDatosPro);
			if ( $VLnuDatosPro>0)
			{
				$VTdtInjustificada=0;
				$VTdtJustificada=0;
				$VTdtAtraso=0;
				
				
				for ($m=0; $m< $VLnuDatosPro; $m++)
				{
					$VTdtInjustificadaa=get_result($VLdtDatosPro,$m,"injustificada");
					$VTdtJustificadaa=get_result($VLdtDatosPro,$m,"justificada");
					$VTdtAtrasoa=get_result($VLdtDatosPro,$m,"atrasos");
						
					
					//if ($VTdtPromParcial==0 )
					//{	
						$VTdtPromParcial=$VTdtInjustificada+$VTdtInjustificadaa;
					//}
					//if ($VTdtExamen==0 )
					//{
						$VTdtExamen=$VTdtJustificada+$VTdtJustificadaa;
					//}
					//if ($VTdtEquiv20==0 )		
					//{					
						$VTdtEquiv20= $VTdtAtraso+$VTdtAtrasoa;
					//}
				}	
			}

?>						  
    <tr>
		<td width="10%" align="center"><?=$i+1; ?></td>
        <td width="40%"><font size="-1" ><? echo ($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_Dtqmcodigo[]" value="<?php echo $VTdtDtqmcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><input name="txt_PromParc[]" type="text" id="txt_PromParc" size="5" maxlength="5" value="<?php echo $VTdtPromParcial; ?>"></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><input name="txt_Exam[]" type="text" id="txt_Exam" size="5" maxlength="5" value="<?php echo $VTdtExamen; ?>"></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><input name="txt_Equi20[]" type="text" id="txt_Exam" size="5" maxlength="5" value="<?php echo $VTdtEquiv20; ?>"></td>
        <td width="10%" align="center"><input type="hidden" name="txt_ProQui[]" value="<?php echo $VTdtFaltas; ?>">&nbsp;</td>
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
 
 ?>   
    		
</table>
<?php
break 1;
}


?>
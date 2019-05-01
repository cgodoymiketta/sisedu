<?PHP
require "../cnxn_bsddts/mnjdr_bsdts.php";
header('Content-Type: text/html; charset=UTF-8');
$VLdtCamp1=$_GET[txt_Camp1];
$VLdtCamp2=$_GET[txt_Camp2];
$VLdtCamp3=$_GET[txt_Camp3];
$VLdtCamp4=$_GET[txt_Camp4];
$VLdtCamp5=$_GET[txt_Camp5];
$VLdtCamp6=$_GET[txt_Camp6];
$VLdtCamp7=$_GET[txt_Camp7];
$VLdtCamp9=$_GET[txt_Camp9];

$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];


$VLConexion=connect();
$Query = "Select * from nlctv where anocodigo= ".$VLAnoLocal;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if ( $VLnuDatos>0 )
{
	$VLdtPeriodo=get_result($VLdtDatos,0,"anodescripcion");
}

$Query=" Select q.quidescripcion, p.prcdescripcion ";
$Query.=" from qmstr q, prcl p ";
$Query.=" where p.quicodigo=q.quicodigo and q.quicodigo=".$VLdtCamp1;
$Query.=" and p.prccodigo=".$VLdtCamp2;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if ( $VLnuDatos>0 )
{
	$VLdtQuimestre=get_result($VLdtDatos,0,"q.quidescripcion");
	$VLdtParcial=get_result($VLdtDatos,0,"p.prcdescripcion");
}

$VLQryC="Select * from crs where curcodigo=".$VLdtCamp3;
$VLQryP="Select * from prll where parcodigo=".$VLdtCamp4;
$VLdtDatosC = execute_query($VLQryC,$VLConexion);
$VLdtDatosP = execute_query($VLQryP,$VLConexion);
$VLnuDatosC = total_records($VLdtDatosC);
$VLnuDatosP = total_records($VLdtDatosP);

if ($VLnuDatosC>0 && $VLnuDatosP>0)
{
	$VLdtCurso=get_result($VLdtDatosC,0,"curdescripcion");
	$VLdtParalelo=get_result($VLdtDatosP,0,"pardescripcion");
}


$VlQryTutor="SELECT p.pernombres, p.perapellidos
FROM `dcntmtr` dm, psn p, nsttcndcnt id, grpprllmtrdcnt gmd, grp g, mtr m, grpmtr gm
WHERE m.mattipo =5
AND m.matcodigo = gm.matcodigo
AND gm.gmcodigo = gmd.gmcodigo
AND gm.grucodigo = g.grucodigo
AND g.curcodigo =".$VLdtCamp3."
AND gmd.gmcodigo = gm.gmcodigo
AND gmd.parcodigo =".$VLdtCamp4."
AND gmd.dcmtcodigo = dm.dcmtcodigo
AND dm.indocodigo = id.indocodigo
AND id.percodigo = p.percodigo";
$VLdtDatosTutor = execute_query($VlQryTutor,$VLConexion);
$VLnuDatosTutor = total_records($VLdtDatosTutor);
if ($VLnuDatosTutor >0)
{
	$VLdtApellidoT=get_result($VLdtDatosTutor,0,"p.perapellidos");
	$VLdtNombreT=get_result($VLdtDatosTutor,0,"p.pernombres");
}

$VLQuerylib="SELECT pd.dtprpromedio, pd.dtpractindiv, pd.dtprlecciones, pd.matdescripcion, pd.mattipo, pd.matorden, pd.dtqmcodigo, qd.mtrno, p.pernombres, p.perapellidos, mt.famcodigo
FROM prcldtll pd, qmstrdtll qd, mtrcl m, nsttcnstdnt ie, psn p, grp g, mtr mt
WHERE qd.dtqmcodigo = pd.dtqmcodigo
AND m.mtrno = qd.mtrno 
AND qd.matcodigo = mt.matcodigo
AND m.inescodigo = ie.inescodigo
AND ie.percodigo = p.percodigo
AND m.grucodigo = g.grucodigo
AND pd.prccodigo =".$VLdtCamp2."
AND g.curcodigo =".$VLdtCamp3."
AND m.parcodigo =".$VLdtCamp4."
ORDER BY p.perapellidos, p.pernombres,`qd`.`mtrno` , pd.mattipo, pd.matdescripcion ASC";
$VLdtDatosLib = execute_query($VLQuerylib,$VLConexion);
$VLnuDatosLib = total_records($VLdtDatosLib);


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPORTE DE NOTAS PARCIALES</title>
</head>

<body>


<table border="0" cellpadding="0" cellspacing="0">
<?php 
	if ($VLnuDatos>0)
	{
?>
	<tr><td><table border="0" cellpadding="0" cellspacing="0">
    <tr><td>
<?php
		$Otro=0;
		$nuevaf=0;
		$nuevac=0;
		$j=0;
		$k=0;
		$VtPromedio=0;
		$VtDivisor=0;
		for($i=0 ; $i<$VLnuDatosLib; $i++)
		{			
			$VLMateria=get_result($VLdtDatosLib,$i,"pd.matdescripcion");
			$VLMatTipo=get_result($VLdtDatosLib,$i,"pd.mattipo");
			$VLMatOrden=get_result($VLdtDatosLib,$i,"pd.matorden");
			$VLNoMatricula=get_result($VLdtDatosLib,$i,"qd.mtrno");
			$VLNombre=get_result($VLdtDatosLib,$i,"p.pernombres");
			$VLApellido=get_result($VLdtDatosLib,$i,"p.perapellidos");
			$VLMatNota=get_result($VLdtDatosLib,$i,"pd.dtprpromedio");
			$VLMatjust=get_result($VLdtDatosLib,$i,"pd.dtpractindiv");
			$VLMatinjust=get_result($VLdtDatosLib,$i,"pd.dtprlecciones");
			$VLMatfamilia=get_result($VLdtDatosLib,$i,"mt.famcodigo");
			
			
			if($i==0){
				$Otro=$VLNoMatricula;
			}
			if ($Otro==$VLNoMatricula)
			{
				if($j==0)///// nuevo estudiante
				{
					
?>
<table width="300" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td ><table width="300" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="50"><img src="../imagenes/logo1.gif" width="50" height="50"></td>
        <td><table width="250" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center"><font size="-1"><b>ESCUELA EGB FISCOMISIONAL</b></font></td>
          </tr>
          <tr>
            <td align="center"><font size="-1"><b>&quot;NUEVO ECUADOR&quot;</b></font></td>
          </tr>
          <tr>
            <td align="center"><font size="-2"> Esmeraldas - Ecuador </font></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
</tr>

<tr>
    <td><table width="300" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td align="center"><font size="-1"><b> REPORTE DE CALIFICACIONES </b></font></td>
      </tr>
      <tr>
        <td align="center"><b>Año Lectivo <?=$VLdtPeriodo; ?></b>                  &nbsp;</td>
      </tr>
      <tr>
        <td><table width="300" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="127" align="right"><font size="-1"> <?=$VLdtQuimestre; ?></font>&nbsp;</td>
            <td width="26">&nbsp;</td>
            <td width="127" align="left"><font size="-1"><?=$VLdtParcial; ?></font>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><font size="-2" ><b> Estudiante:</b> <? echo ($VLApellido." ".$VLNombre); ?></font></td>
      </tr>
      <tr>
        <td><font size="-2" ><b>Curso y Paralelo:</b>  <? echo ($VLdtCurso." ''".$VLdtParalelo."''"); ?> </font></td>
      </tr>
      <tr>
        <td><font size="-2" ><b>Docente Tutor/a:</b>  <? echo ($VLdtApellidoT." ".$VLdtNombreT); ?> </font></td>
      </tr>
    </table></td>
</tr>

<tr>
	<td> 
    	<table width="300" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="25"><hr></td>
            <td width="25"><hr></td>
            <td width="250"><hr></td>
            <td align="center" width="50"><hr></td>
          </tr>
          <tr>
            <td align="right" width="25"> <font size="-2" ><b>#</b></font> </td>
            <td width="25">&nbsp;</td>
            <td width="250"><font size="-2" ><b>Asignaturas</b></font></td>
            <td align="center" width="50"><font size="-2" ><b>Calificación</b></font></td>
          </tr>
          <tr>
            <td align="right" width="25"><hr></td>
            <td width="25"><hr></td>
            <td width="250"><hr></td>
            <td align="center" width="50"><hr></td>
          </tr>
          <tr>
            <td align="right" width="25"> <font size="-2" ><?=$j+1; ?></font> </td>
            <td width="25">&nbsp;</td>
            <td width="250"><font size="-2" ><?php echo ($VLMateria); ?></font></td>
            <td align="center" width="50"><font size="-2" ><?
	if($VLMatfamilia==8)
	{
   		switch ($VLMatNota) {
		case "0":
		echo "NR";
		break;
		case "9":
		echo "A";
		break;
		case "7":
		echo "EP";
		break;
		case "5":
		echo "I";
		break;
		case "4":
		echo "N/E";
		break;
		}
	}else{
			
			
			echo number_format($VLMatNota,2); 
	}
			?></font></td>
          </tr>
    	</table>
    </td>
</tr>
<?				
					$VtPromedio=$VtPromedio+$VLMatNota;
					$VtDivisor++;
				
				}else ////// una calificacion mas
				{
//////////  PARA LAS CUANTITATIVAS					
		switch ($VLMatTipo) {
		case "1":
?>
<tr>
	<td> 
    	<table width="300" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="25"> <font size="-2" ><?=$j+1; ?></font> </td>
            <td width="25">&nbsp;</td>
            <td width="250"><font size="-2" ><?php echo ($VLMateria); ?></font></td>
            <td align="center" width="50"><font size="-2" ><?
	if($VLMatfamilia==8)
	{
   		switch ($VLMatNota) {
		case "0":
		echo "NR";
		break;
		case "9":
		echo "A";
		break;
		case "7":
		echo "EP";
		break;
		case "5":
		echo "I";
		break;
		case "4":
		echo "N/E";
		break;
		}
	}else{
			
			
			echo number_format($VLMatNota,2); 
	}
			?></font></td>
          </tr>
    	</table>
    </td>
</tr>
<?					
			$VtPromedio=$VtPromedio+$VLMatNota;
			$VtDivisor++;
			break 1; 
		case "2":
?>
<tr>
	<td> 
    	<table width="300" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="25" height="1"><hr></td>
            <td width="25" height="1"><hr></td>
            <td width="250" height="1"><hr></td>
            <td align="center" width="50" height="1"><hr></td>
          </tr>
          <tr>
            <td align="right" width="25">&nbsp;  </td>
            <td width="25">&nbsp;</td>
            <td width="250"><font size="-2" ><B>PROMEDIO</B></font></td>
            <td align="center" width="50"><font size="-2" ><B><?
			$VLMatNota=$VtPromedio/$VtDivisor;
	if($VLMatfamilia==8)
	{
   		if ($VLMatNota==0){
			echo "NR";
		}
   		if ($VLMatNota>0 && $VLMatNota<7){
			echo "I";
		}
   		if ($VLMatNota>=7 && $VLMatNota<8){
			echo "EP";
		}
   		if ( $VLMatNota>=8){
			echo "A";
		}
	}else{
		echo number_format($VLMatNota,2); 
	}
 ?></B></font></td>
          </tr>
          <tr>
            <td align="right" width="25" height="0"><hr></td>
            <td width="25" height="0"><hr></td>
            <td width="250" height="0"><hr></td>
            <td align="center" width="50" height="0"><hr></td>
          </tr>
    	</table>
    </td>
</tr>
<? $VtPromedio=0; $VtDivisor=0; ?>
<tr>
	<td> 
    	<table width="300" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="25"> <font size="-2" ><?=$j+1; ?></font> </td>
            <td width="25">&nbsp;</td>
            <td width="250"><font size="-2" ><?php echo ($VLMateria); ?></font></td>
            <td align="center" width="50"><font size="-2" ><?
			

		if( $VLMatNota>8.99 && $VLMatNota<11)
		{
			echo "EX";
		}
		if( $VLMatNota>6.99 && $VLMatNota<9)
		{
			echo "MB";
		}
		if( $VLMatNota>4.99 && $VLMatNota<7)
		{
			echo "B";
		}
		if( $VLMatNota>0 && $VLMatNota<5)
		{
			echo "R";
		}
		if( $VLMatNota==0)
		{
			echo "NR";
		}			
			?></font></td>
          </tr>
          <tr>
            <td align="right" width="25"><hr></td>
            <td width="25"><hr></td>
            <td width="250"><hr></td>
            <td align="center" width="50"><hr></td>
          </tr>
    	</table>
    </td>
</tr>
<?					
			break 1; 
		case "3":
?>
<tr>
	<td> 
    	<table width="300" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="25">&nbsp;</td>
            <td width="25">&nbsp;</td>
            <td width="250"><font size="-2" ><?php echo ($VLMateria); ?></font></td>
            <td align="center" width="50"><font size="-2" ><?
		switch ($VLMatNota) {
		case "0":
		echo "NR";
		break;
		case "1":
		echo "E";
		break;
		case "2":
		echo "D";
		break;
		case "3":
		echo "C";
		break;
		case "4":
		echo "B";
		break;
		case "5":
		echo "A";
		break;
		}
		
		?></font></td>
          </tr>
    	</table>
    </td>
</tr>
<?					
			break 1; 
		case "4":
?>
<tr>
	<td> 
    	<table width="300" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="25">&nbsp;</td>
            <td width="25">&nbsp;</td>
            <td width="250"><font size="-2" >FALTAS JUSTIFICADAS</font></td>
            <td align="center" width="50"><font size="-2" ><?=number_format($VLMatjust,0); ?></font></td>
          </tr>
          <tr>
            <td align="right" width="25">&nbsp;</td>
            <td width="25">&nbsp;</td>
            <td width="250"><font size="-2" >FALTAS INJUSTIFICADAS</font></td>
            <td align="center" width="50"><font size="-2" ><?=number_format($VLMatinjust,0); ?></font></td>
          </tr>
          <tr>
            <td align="right" width="25">&nbsp;</td>
            <td width="25">&nbsp;</td>
            <td width="250">&nbsp;</td>
            <td align="center" width="50">&nbsp;</td>
          </tr>
    	</table>
    </td>
</tr>
<?					
			break 1; 
		}
				
				}
				$j++;
			}else{ //////// cambio de lado
				$Otro=$VLNoMatricula;
				$j=0;
				$k++;	
				if($nuevac==0) //// crear una columna a la derecha
				{
					$nuevac=1;
?>
</table></td>
<td width="80">&nbsp;</td>
<td>
<table border="0" width="300" cellpadding="0" cellspacing="0">
<tr>
    <td ><table width="300" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="50"><img src="../imagenes/logo1.gif" width="50" height="50"></td>
        <td><table width="250" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center"><font size="-1"><b>ESCUELA EGB FISCOMISIONAL</b></font></td>
          </tr>
          <tr>
            <td align="center"><font size="-1"><b>&quot;NUEVO ECUADOR&quot;</b></font></td>
          </tr>
          <tr>
            <td align="center"><font size="-2"> Esmeraldas - Ecuador </font></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
</tr>
<tr>
    <td><table width="300" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td align="center"><font size="-1"><b> REPORTE DE CALIFICACIONES </b></font></td>
      </tr>
      <tr>
        <td align="center"><b>Año Lectivo <?=$VLdtPeriodo; ?></b>                  &nbsp;</td>
      </tr>
      <tr>
        <td><table width="300" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="127" align="right"><font size="-1"> <?=$VLdtQuimestre; ?></font>&nbsp;</td>
            <td width="26">&nbsp;</td>
            <td width="127" align="left"><font size="-1"><?=$VLdtParcial; ?></font>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><font size="-2" ><b> Estudiante:</b> <? echo ($VLApellido." ".$VLNombre); ?></font></td>
      </tr>
      <tr>
        <td><font size="-2" ><b>Curso y Paralelo:</b>  <? echo ($VLdtCurso." ''".$VLdtParalelo."''"); ?> </font></td>
      </tr>
      <tr>
        <td><font size="-2" ><b>Docente Tutor/a:</b>  <? echo ($VLdtApellidoT." ".$VLdtNombreT); ?> </font></td>
      </tr>
    </table></td>
</tr>

<tr>
	<td> 
    	<table width="300" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="25"><hr></td>
            <td width="25"><hr></td>
            <td width="250"><hr></td>
            <td align="center" width="50"><hr></td>
          </tr>
          <tr>
            <td align="right" width="25"> <font size="-2" ><b>#</b></font> </td>
            <td width="25">&nbsp;</td>
            <td width="250"><font size="-2" ><b>Asignaturas</b></font></td>
            <td align="center" width="50"><font size="-2" ><b>Calificación</b></font></td>
          </tr>
          <tr>
            <td align="right" width="25"><hr></td>
            <td width="25"><hr></td>
            <td width="250"><hr></td>
            <td align="center" width="50"><hr></td>
          </tr>
          <tr>
            <td align="right" width="25"> <font size="-2" ><?=$j+1; ?></font> </td>
            <td width="25">&nbsp;</td>
            <td width="250"><font size="-2" ><?php echo ($VLMateria); ?></font></td>
            <td align="center" width="50"><font size="-2" ><?
	if($VLMatfamilia==8)
	{
   		switch ($VLMatNota) {
		case "0":
		echo "NR";
		break;
		case "9":
		echo "A";
		break;
		case "7":
		echo "EP";
		break;
		case "5":
		echo "I";
		break;
		case "4":
		echo "N/E";
		break;
		}
	}else{
			
			
			echo number_format($VLMatNota,2); 
	}
			?></font></td>
          </tr>
    	</table>
    </td>
</tr>
<?				
				$VtPromedio=$VtPromedio+$VLMatNota;
				$VtDivisor++;
				$j++;	
				} else { ////////// crear nueva fila
					$nuevac=0;
?>
</table></td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>					
<table border="0" width="300" cellpadding="0" cellspacing="0">
<tr>
    <td ><table width="300" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="50"><img src="../imagenes/logo1.gif" width="50" height="50"></td>
        <td><table width="250" border="0" cellpadding="0">
          <tr>
            <td align="center"><font size="-1"><b>ESCUELA EGB FISCOMISIONAL</b></font></td>
          </tr>
          <tr>
            <td align="center"><font size="-1"><b>&quot;NUEVO ECUADOR&quot;</b></font></td>
          </tr>
          <tr>
            <td align="center"><font size="-2"> Esmeraldas - Ecuador </font></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
</tr>
<tr>
    <td><table width="300" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td align="center"><font size="-1"><b> REPORTE DE CALIFICACIONES </b></font></td>
      </tr>
      <tr>
        <td align="center"><b>Año Lectivo <?=$VLdtPeriodo; ?></b>                  &nbsp;</td>
      </tr>
      <tr>
        <td><table width="300" border="0" cellpadding="0" cellspacing="">
          <tr>
            <td width="127" align="right"><font size="-1"> <?=$VLdtQuimestre; ?></font>&nbsp;</td>
            <td width="26">&nbsp;</td>
            <td width="127" align="left"><font size="-1"><?=$VLdtParcial; ?></font>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><font size="-2" ><b> Estudiante:</b> <? echo ($VLApellido." ".$VLNombre); ?></font></td>
      </tr>
      <tr>
        <td><font size="-2" ><b> Curso y Paralelo:</b> <? echo ($VLdtCurso." ''".$VLdtParalelo."''"); ?> </font></td>
      </tr>
      <tr>
        <td><font size="-2" ><b>Docente Tutor/a: </b> <? echo ($VLdtApellidoT." ".$VLdtNombreT); ?> </font></td>
      </tr>
    </table></td>
</tr>
<tr>
	<td> 
    	<table width="300" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="25"><hr></td>
            <td width="25"><hr></td>
            <td width="250"><hr></td>
            <td align="center" width="50"><hr></td>
          </tr>
          <tr>
            <td align="right" width="25"> <font size="-2" ><b>#</b></font> </td>
            <td width="25">&nbsp;</td>
            <td width="250"><font size="-2" ><b>Asignaturas</b></font></td>
            <td align="center" width="50"><font size="-2" ><b>Calificación</b></font></td>
          </tr>
          <tr>
            <td align="right" width="25"><hr></td>
            <td width="25"><hr></td>
            <td width="250"><hr></td>
            <td align="center" width="50"><hr></td>
          </tr>
          <tr>
            <td align="right" width="25"> <font size="-2" ><?=$j+1; ?></font> </td>
            <td width="25">&nbsp;</td>
            <td width="250"><font size="-2" ><?php echo ($VLMateria); ?></font></td>
            <td align="center" width="50"><font size="-2" ><?
	if($VLMatfamilia==8)
	{
   		switch ($VLMatNota) {
		case "0":
		echo "NR";
		break;
		case "9":
		echo "A";
		break;
		case "7":
		echo "EP";
		break;
		case "5":
		echo "I";
		break;
		case "4":
		echo "N/E";
		break;
		}
	}else{
			
			
			echo number_format($VLMatNota,2); 
	}
			?></font></td>
          </tr>
    	</table>
    </td>
</tr>					
<?	
	$VtPromedio=$VtPromedio+$VLMatNota;
	$VtDivisor++;
$j++;
				}
			}
?>        
<?php
		}
?>		
<?php	
	}
  ?>
</table>
</body>
</html>
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

$VLQryE="Select * from spcldd where espcodigo=".$VLdtCamp6;
$VLQryC="Select * from crs where curcodigo=".$VLdtCamp3;
$VLQryP="Select * from prll where parcodigo=".$VLdtCamp4;
$VLdtDatosE = execute_query($VLQryE,$VLConexion);
$VLdtDatosC = execute_query($VLQryC,$VLConexion);
$VLdtDatosP = execute_query($VLQryP,$VLConexion);
$VLnuDatosE = total_records($VLdtDatosE);
$VLnuDatosC = total_records($VLdtDatosC);
$VLnuDatosP = total_records($VLdtDatosP);

if ($VLnuDatosC>0 && $VLnuDatosP>0 && $VLnuDatosE>0 )
{
	$VLdtEspecialidad=get_result($VLdtDatosE,0,"espsiglas");
	$VLdtCurso=get_result($VLdtDatosC,0,"curdescripcion");
	$VLdtParalelo=get_result($VLdtDatosP,0,"pardescripcion");
}


$VlQryTutor="SELECT p.pernombres, p.perapellidos, gmd.gmcodigo
FROM `dcntmtr` dm, psn p, nsttcndcnt id, grpprllmtrdcnt gmd, grp g, mtr m, grpmtr gm
WHERE m.mattipo =5
AND m.matcodigo = gm.matcodigo
AND gm.gmcodigo = gmd.gmcodigo
AND gm.grucodigo = g.grucodigo
AND g.curcodigo =".$VLdtCamp3."
AND g.espcodigo=".$VLdtCamp6."
AND gmd.gmcodigo = gm.gmcodigo
AND gmd.gpmdestado=1
AND gmd.parcodigo =".$VLdtCamp4."
AND gmd.dcmtcodigo = dm.dcmtcodigo
AND dm.dcmtestado=1
AND dm.indocodigo = id.indocodigo
AND id.percodigo = p.percodigo
order by gmd.gmcodigo desc";
$VLdtDatosTutor = execute_query($VlQryTutor,$VLConexion);
$VLnuDatosTutor = total_records($VLdtDatosTutor);
if ($VLnuDatosTutor >0)
{
	$VLdtApellidoT=get_result($VLdtDatosTutor,0,"p.perapellidos");
	$VLdtNombreT=get_result($VLdtDatosTutor,0,"p.pernombres");
}

$VLQuerylib="SELECT pd.dtprpromedio, pd.dtprtareas, pd.dtpractgrupal, pd.dtprprueba,  pd.dtpractindiv, pd.dtprlecciones, pd.matdescripcion, pd.mattipo, pd.matorden, pd.dtqmcodigo, qd.mtrno, p.pernombres, p.perapellidos, mt.famcodigo, mt.matnoconsecutivo, m.mtrestado
FROM prcldtll pd, qmstrdtll qd, mtrcl m, nsttcnstdnt ie, psn p, grp g, mtr mt, grpmtr gm
WHERE qd.dtqmcodigo = pd.dtqmcodigo
AND m.mtrno = qd.mtrno 
AND qd.matcodigo = mt.matcodigo
AND m.inescodigo = ie.inescodigo
AND ie.percodigo = p.percodigo
AND m.grucodigo = g.grucodigo
AND pd.prccodigo =".$VLdtCamp2."
AND g.curcodigo =".$VLdtCamp3."
AND g.espcodigo=".$VLdtCamp6."
AND m.parcodigo =".$VLdtCamp4."
and g.grucodigo = gm.grucodigo
and gm.matcodigo=mt.matcodigo
and not gm.gmestado=0
ORDER BY p.perapellidos, p.pernombres,`qd`.`mtrno` , pd.mattipo, mt.matnoconsecutivo, pd.matdescripcion ASC";
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
	<tr><td width="20">&nbsp;</td></tr>
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
		//echo $VLQuerylib;
		for($i=0 ; $i<$VLnuDatosLib; $i++)
		{			
			$VLMateria=get_result($VLdtDatosLib,$i,"pd.matdescripcion");
			$VLMatTipo=get_result($VLdtDatosLib,$i,"pd.mattipo");
			$VLMatOrden=get_result($VLdtDatosLib,$i,"pd.matorden");
			$VLNoMatricula=get_result($VLdtDatosLib,$i,"qd.mtrno");
			$VLNombre=get_result($VLdtDatosLib,$i,"p.pernombres");
			$VLApellido=get_result($VLdtDatosLib,$i,"p.perapellidos");
			$VLMtrEstado=get_result($VLdtDatosLib,$i,"m.mtrestado");
			switch ($VLMtrEstado) {
			case "1":
			$VLdtColor="#000000";
			$VLdtObserv="&nbsp;";
				break 1; 
			case "2":
			$VLdtColor="#003300"; 
			$VLdtObserv=" ( DESERTOR )";
				break 1;
			case "3":
			$VLdtColor="#FF0000"; 
			$VLdtObserv=" ( RETIRADO )";
			default: 
			}
			
			$VLMatNota=get_result($VLdtDatosLib,$i,"pd.dtprpromedio");
			$VLMatTarea=get_result($VLdtDatosLib,$i,"pd.dtprtareas");
			$VLMatActInd=get_result($VLdtDatosLib,$i,"pd.dtpractindiv");
			$VLMatActGru=get_result($VLdtDatosLib,$i,"pd.dtpractgrupal");
			$VLMatLecc=get_result($VLdtDatosLib,$i,"pd.dtprlecciones");
			$VLMatPrueb=get_result($VLdtDatosLib,$i,"pd.dtprprueba");
			$VLMatPromedio=get_result($VLdtDatosLib,$i,"pd.dtprpromedio");
			$VLMatjust=get_result($VLdtDatosLib,$i,"pd.dtpractindiv");
			$VLMatinjust=get_result($VLdtDatosLib,$i,"pd.dtprlecciones");
			$VLMatfamilia=get_result($VLdtDatosLib,$i,"mt.famcodigo");
			$VLMatatraso=get_result($VLdtDatosLib,$i,"pd.dtpractgrupal");
			
			
			if($i==0){
				$Otro=$VLNoMatricula;
			}
			if ($Otro==$VLNoMatricula)
			{
				if($j==0)///// nuevo estudiante
				{
					
?>
<table width="800" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td align="center" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center"><img src="../imagenes/membrete4.png" width="586" height="122" alt="UNIDAD EDUCATIVA FISCOMISIONAL &quot;DON BOSCO&quot;"></td>
      </tr>
    </table></td>
</tr>

<tr>
    <td><table width="800" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td align="center"><font size="-1"><b> REPORTE DE CALIFICACIONES <?=$VLdtPeriodo; ?></b></font></td>
      </tr>
      <tr>
        <td align="center"><table width="600" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="127" align="right"><font size="-1"> <?=$VLdtQuimestre; ?></font>&nbsp;</td>
            <td width="26">&nbsp;</td>
            <td width="127" align="left"><font size="-1"><?=$VLdtParcial; ?></font>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><font color="<?=$VLdtColor; ?>" face="Arial Narrow, Arial" ><b> Estudiante:</b> <? echo ($VLApellido." ".$VLNombre.$VLdtObserv); ?></font></td>
      </tr>
      <tr>
        <td><font  face="Arial Narrow, Arial"><b>Curso y Paralelo:</b>  <? echo ($VLdtEspecialidad." ".$VLdtCurso." ''".$VLdtParalelo."''"); ?> </font></td>
      </tr>
      <tr>
        <td><font  face="Arial Narrow, Arial"><b>Docente Tutor/a:</b>  <? echo ($VLdtApellidoT." ".$VLdtNombreT); ?> </font></td>
      </tr>
    </table></td>
</tr>

<tr>
	<td> 
    	<table width="800" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="23"><hr></td>
            <td width="20"><hr></td>
            <td width="272"><hr></td>
            <td align="center" width="74"><hr></td>
            <td align="center" width="70"><hr></td>
            <td align="center" width="47"><hr></td>
            <td align="center" width="47"><hr></td>
            <td align="center" width="45"><hr></td>
            <td align="center" width="60"><hr></td>
            <td align="center" width="78"><hr></td>
            <td align="center" width="64"><hr></td>
          </tr>
          <tr>
            <td align="right" width="23"> <font size="-1" ><b>#</b></font> </td>
            <td width="20">&nbsp;</td>
            <td width="272"><font size="-1" ><b>Asignaturas</b></font></td>
            <td align="center" width="74"><font size="-1" ><b><?=$VLdtParcial; ?></b></font></td>
            <td align="center" width="70"><font size="-1" ><b>Cualitativa</b></font></td>
            <td align="center" width="47">&nbsp;</td>
            <td align="center" width="47">&nbsp;</td>
            <td align="center" width="45">&nbsp;</td>
            <td align="center" width="60">&nbsp;</td>
            <td align="center" width="78">&nbsp;</td>
            <td align="center" width="64">&nbsp;</td>
          </tr>
          <tr>
            <td align="right" width="23"><hr></td>
            <td width="20"><hr></td>
            <td width="272"><hr></td>
            <td align="center" width="74"><hr></td>
            <td align="center" width="70"><hr></td>
            <td align="center" width="47"><hr></td>
            <td align="center" width="47"><hr></td>
            <td align="center" width="45"><hr></td>
            <td align="center" width="60"><hr></td>
            <td align="center" width="78"><hr></td>
            <td align="center" width="64"><hr></td>
          </tr>
          
<tr>
            <td align="right" width="23"> <font  face="Arial Narrow, Arial"><?=$j+1; ?></font> </td>
            <td width="20">&nbsp;</td>
            <td width="272"><font   face="Arial Narrow, Arial"><?php echo ($VLMateria); ?></font></td>
            <td align="center" width="74"><?
	if($VLMatfamilia<4)
	{
   		switch ($VLMatPromedio) {
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
			echo number_format($VLMatPromedio,2); 
	}
			?></td>
            <td align="center" width="70"><?
	if($VLMatfamilia<4)
	{
			if($VLMatPromedio==0)
			{
				$VTEquivalencia="NR";
			}
			if($VLMatPromedio>0)
			{
				$VTEquivalencia="N/E";
			}
			if($VLMatPromedio>=5)
			{
				$VTEquivalencia="I";
			}
			if($VLMatPromedio>=7)
			{
				$VTEquivalencia="EP";
			}
			if($VLMatPromedio>=9)
			{
				$VTEquivalencia="A";
			}
			
			echo $VTEquivalencia; 
	}else{
			
			if($VLMatPromedio==0)
			{
				$VTEquivalencia="NR";
			}
			if($VLMatPromedio>0)
			{
				$VTEquivalencia="N.A.A.R";
			}
			if($VLMatPromedio>=5)
			{
				$VTEquivalencia="P.A.A.R";
			}
			if($VLMatPromedio>=7)
			{
				$VTEquivalencia="A.A.R.";
			}
			if($VLMatPromedio>=9)
			{
				$VTEquivalencia="D.A.R";
			}
			
			echo $VTEquivalencia; 
	}
			?></td>
            <td align="center" width="47">&nbsp;</td>
            <td align="center" width="47">&nbsp;</td>
            <td align="center" width="45">&nbsp;</td>
            <td align="center" width="60">&nbsp;</td>
            <td align="center" width="78">&nbsp;</td>
            <td align="center" width="64">&nbsp;</td>
            
          </tr>          
          
    	</table>
    </td>
</tr>
<?				
					$VtPromedio=$VtPromedio+$VLMatNota;
					if ($VLMatNota>0)
					{
						$VtDivisor++;
					}
				}else ////// una calificacion mas
				{
//////////  PARA LAS CUANTITATIVAS					
		switch ($VLMatTipo) {
		case "1":
?>
<tr>
	<td> 
    	<table width="800" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="22"> <font  face="Arial Narrow, Arial"><?=$j+1; ?></font> </td>
            <td width="18">&nbsp;</td>
            <td width="276"><font  face="Arial Narrow, Arial"><?php echo ($VLMateria); ?></font></td>
            <td align="center" width="70"><?
	if($VLMatfamilia<4)
	{
   		switch ($VLMatPromedio) {
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
			
			
			echo number_format($VLMatPromedio,2); 
	}
			?></td>
            <td align="center" width="74"><?
	if($VLMatfamilia<4)
	{
			if($VLMatPromedio==0)
			{
				$VTEquivalencia="NR";
			}
			if($VLMatPromedio>0)
			{
				$VTEquivalencia="N/E";
			}
			if($VLMatPromedio>=5)
			{
				$VTEquivalencia="I";
			}
			if($VLMatPromedio>=7)
			{
				$VTEquivalencia="EP";
			}
			if($VLMatPromedio>=9)
			{
				$VTEquivalencia="A";
			}
			
			echo $VTEquivalencia; 
	}else{
			
			if($VLMatPromedio==0)
			{
				$VTEquivalencia="NR";
			}
			if($VLMatPromedio>0)
			{
				$VTEquivalencia="N.A.A.R";
			}
			if($VLMatPromedio>=5)
			{
				$VTEquivalencia="P.A.A.R";
			}
			if($VLMatPromedio>=7)
			{
				$VTEquivalencia="A.A.R.";
			}
			if($VLMatPromedio>=9)
			{
				$VTEquivalencia="D.A.R";
			}
			
			echo $VTEquivalencia; 
	}
			?></td>
            <td align="center" width="49">&nbsp;</td>
            <td align="center" width="43">&nbsp;</td>
            <td align="center" width="46">&nbsp;</td>
            <td align="center" width="60">&nbsp;</td>
            <td align="center" width="78">&nbsp;</td>
            <td align="center" width="64">&nbsp;</td>
            
          </tr>
    	</table>
    </td>
</tr>
<?					
			$VtPromedio=$VtPromedio+$VLMatNota;
			if ( $VLMatNota >0 )
			{
				$VtDivisor++;
			}
			$Yata=0;
			break 1; 
			
		case "2":
		$Yata=1;
?>
<tr>
	<td> 
    	<table width="800" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="23">&nbsp;</td>
            <td width="20">&nbsp;</td>
            <td width="273">&nbsp;</td>
            <td align="center" width="71">&nbsp;</td>
            <td align="center" width="74">&nbsp;</td>
            <td align="center" width="46">&nbsp;</td>
            <td align="center" width="47">&nbsp;</td>
            <td align="center" width="45">&nbsp;</td>
            <td align="center" width="61">&nbsp;</td>
            <td align="center" width="78">&nbsp;</td>
            <td align="center" width="62">&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td ><B>PROMEDIO</B></td>
            <td align="center" ><B><?
			if($VtDivisor>0){
			$VLMatNota2=$VtPromedio/$VtDivisor;
			}else{ 
			$VLMatNota2=0;
			}
	if($VLMatfamilia<4)
	{
   		if ($VLMatNota2==0){
			echo "NR";
		}
   		if ($VLMatNota2>0 && $VLMatNota2<7){
			echo "I";
		}
   		if ($VLMatNota2>=7 && $VLMatNota2<8){
			echo "EP";
		}
   		if ( $VLMatNota2>=8){
			echo "A";
		}
	}else{
		echo number_format($VLMatNota2,2);
	}
 ?></B></td>
<td align="center"><?
	if($VLMatfamilia<4)
	{
   		if ($VLMatNota2==0){
			echo "NR";
		}
   		if ($VLMatNota2>0 && $VLMatNota2<7){
			echo "I";
		}
   		if ($VLMatNota2>=7 && $VLMatNota2<8){
			echo "EP";
		}
   		if ( $VLMatNota2>=8){
			echo "A";
		}
			
			
	}else{
			
			if($VLMatNota2==0)
			{
				$VTEquivalencia="NR";
			}
			if($VLMatNota2>0)
			{
				$VTEquivalencia="N.A.A.R";
			}
			if($VLMatNota2>=5)
			{
				$VTEquivalencia="P.A.A.R";
			}
			if($VLMatNota2>=7)
			{
				$VTEquivalencia="A.A.R.";
			}
			if($VLMatNota2>=9)
			{
				$VTEquivalencia="D.A.R";
			}
			
			echo $VTEquivalencia; 
	}
			?></td>         
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            
             </tr>
          <tr>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
          </tr>
    	</table>
    </td>
</tr>
<? $VtPromedio=0; $VtDivisor=0; ?>
<tr>
	<td> 
    	<table width="800" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="22"> <font  face="Arial Narrow, Arial"><?=$j+1; ?></font> </td>
            <td width="21">&nbsp;</td>
            <td width="219"><font size= face="Arial Narrow, Arial"><?php echo ($VLMateria); ?></font></td>
            <td align="center" width="55"><font  face="Arial Narrow, Arial"><?
			

		if( $VLMatPromedio>8.99 && $VLMatPromedio<11)
		{
			echo "EX";
		}
		if( $VLMatPromedio>6.99 && $VLMatPromedio<9)
		{
			echo "MB";
		}
		if( $VLMatPromedio>4.99 && $VLMatPromedio<7)
		{
			echo "B";
		}
		if( $VLMatPromedio>0 && $VLMatPromedio<5)
		{
			echo "R";
		}
		if( $VLMatPromedio==0)
		{
			echo "NR";
		}			
			?></font></td>
          <td width="483" align="center"><table width="100%" border="0">
  <tr>
    <td width="42" align="center">&nbsp;</td>
    <td width="115"><font size="-1" color="#3399FF" face="Arial Narrow, Arial"> A: Muy satisfactorio</font></td>
    <td width="14">&nbsp;</td>
    <td width="294"><font size="-1" color="#006600" face="Arial Narrow, Arial"> <?php if($VLMatfamilia<4)
	{ ?> A Adquirida <? }else{ ?> D.A.R: Domina los Aprendizajes Requeridos <?php } ?></font></td>
  </tr>
</table>
</td>
          </tr>
    	</table>
    </td>
</tr>
<?					
			break 1; 
		case "3":
		
		if($Yata==0) {
?>
<tr>
	<td> 
    	<table width="800" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="23">&nbsp;</td>
            <td width="20">&nbsp;</td>
            <td width="273">&nbsp;</td>
            <td align="center" width="71">&nbsp;</td>
            <td align="center" width="74">&nbsp;</td>
            <td align="center" width="46">&nbsp;</td>
            <td align="center" width="47">&nbsp;</td>
            <td align="center" width="45">&nbsp;</td>
            <td align="center" width="61">&nbsp;</td>
            <td align="center" width="78">&nbsp;</td>
            <td align="center" width="62">&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td ><B>PROMEDIO</B></td>
            <td align="center" ><B><?
			if($VtDivisor>0){
			$VLMatNota2=$VtPromedio/$VtDivisor;
			}else{ 
			$VLMatNota2=0;
			}
	if($VLMatfamilia<4)
	{
   		if ($VLMatNota2==0){
			echo "NR";
		}
   		if ($VLMatNota2>0 && $VLMatNota2<7){
			echo "I";
		}
   		if ($VLMatNota2>=7 && $VLMatNota2<8){
			echo "EP";
		}
   		if ( $VLMatNota2>=8){
			echo "A";
		}
	}else{
		echo number_format($VLMatNota2,2);
	}
 ?></B></td>
<td align="center"><?
	if($VLMatfamilia<4)
	{
   		if ($VLMatNota2==0){
			echo "NR";
		}
   		if ($VLMatNota2>0 && $VLMatNota2<7){
			echo "I";
		}
   		if ($VLMatNota2>=7 && $VLMatNota2<8){
			echo "EP";
		}
   		if ( $VLMatNota2>=8){
			echo "A";
		}
			
			
	}else{
			
			if($VLMatNota2==0)
			{
				$VTEquivalencia="NR";
			}
			if($VLMatNota2>0)
			{
				$VTEquivalencia="N.A.A.R";
			}
			if($VLMatNota2>=5)
			{
				$VTEquivalencia="P.A.A.R";
			}
			if($VLMatNota2>=7)
			{
				$VTEquivalencia="A.A.R.";
			}
			if($VLMatNota2>=9)
			{
				$VTEquivalencia="D.A.R";
			}
			
			echo $VTEquivalencia; 
	}
			?></td>         
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            
             </tr>
          <tr>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
          </tr>
    	</table>
    </td>
</tr>
<? $VtPromedio=0; $VtDivisor=0; ?>
<tr>
	<td> 
    	<table width="800" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="22"> <font  face="Arial Narrow, Arial"><? if ( $VLMatTipo==2) { echo $j+1; }?></font> </td>
            <td width="21">&nbsp;</td>
            <td width="219"><font size= face="Arial Narrow, Arial"><?php if ( $VLMatTipo==2) { echo ($VLMateria); } ?></font></td>
            <td align="center" width="55"><font  face="Arial Narrow, Arial"><? if ( $VLMatTipo==2) {
			

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
			} ?></font></td>
          <td width="483" align="center"><table width="100%" border="0">
  <tr>
    <td width="42" align="center">&nbsp;</td>
    <td width="115"><font size="-1" color="#3399FF" face="Arial Narrow, Arial"> A: Muy satisfactorio</font></td>
    <td width="14">&nbsp;</td>
    <td width="294"><font size="-1" color="#006600" face="Arial Narrow, Arial"> <?php if($VLMatfamilia<4)
	{ ?> A Adquirida <? }else{ ?> D.A.R: Domina los Aprendizajes Requeridos <?php } ?></font></td>
  </tr>
</table>
</td>
          </tr>
    	</table>
    </td>
</tr>

<?php } ?>
<tr>
	<td> 
    	<table width="800" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="23">&nbsp;</td>
            <td width="20">&nbsp;</td>
            <td width="207"><font  face="Arial Narrow, Arial"><?php echo ($VLMateria); ?></font></td>
            <td align="center" width="52"><font  face="Arial Narrow, Arial"><?
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
        <td width="459" align="center"><table width="100%" border="0">
  <tr>
    <td width="35" align="center">&nbsp;</td>
    <td width="94"><font size="-1" color="#3399FF" face="Arial Narrow, Arial"> B: Satisfactorio</font></td>
    <td width="12">&nbsp;</td>
    <td width="241"><font size="-1" color="#006600" face="Arial Narrow, Arial"> <?php if($VLMatfamilia<4)
	{ ?> EP En Proceso <? }else{ ?> A.A.R: Alcanza los Aprendizajes Requeridos <?php } ?></font></td>
  </tr>
</table>
</td>
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
    	<table width="800" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="26">&nbsp;</td>
            <td width="22">&nbsp;</td>
            <td width="214"><font  face="Arial Narrow, Arial">FALTAS JUSTIFICADAS</font></td>
            <td align="center" width="56"><font  face="Arial Narrow, Arial"><?=number_format($VLMatjust,0); ?></font></td>
        <td width="482" align="center"><table width="100%" border="0">
  <tr>
    <td width="35" align="center">&nbsp;</td>
    <td width="94"><font size="-1" color="#3399FF" face="Arial Narrow, Arial" > C: Poco Satisfactorio</font></td>
    <td width="12">&nbsp;</td>
    <td width="241"><font size="-1" color="#006600" face="Arial Narrow, Arial"> <?php if($VLMatfamilia<4)
	{ ?> I Inicio <? }else{ ?>
       P.A.A.R: Proximo a Alcanzar los Aprendizajes Requeridos 
       <?php } ?></font></td>
  </tr>
</table>
</td>
          </tr>
          <tr>
            <td align="right" width="26">&nbsp;</td>
            <td width="22">&nbsp;</td>
            <td width="214"><font  face="Arial Narrow, Arial">FALTAS INJUSTIFICADAS</font></td>
            <td align="center" width="56"><font  face="Arial Narrow, Arial"><?=number_format($VLMatinjust,0); ?></font></td>
            <td width="482" align="center"><table width="100%" border="0">
              <tr>
                <td width="35" align="center">&nbsp;</td>
                <td width="94"><font size="-1" color="#3399FF" > D: Mejorable</font></td>
                <td width="12">&nbsp;</td>
                <td width="241"><font size="-1" color="#006600" face="Arial Narrow, Arial"> <?php if($VLMatfamilia<4)
	{ ?> N/E No Evaluado <? }else{ ?> N.A.A.R: No alcanza los Aprendizajes Requeridos <?php } ?></font></td>
                </tr>
  </table>
  </td>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
            <td>&nbsp;</td>
            <td><font  face="Arial Narrow, Arial">ATRASOS</font></td>
            <td align="center"><?=number_format($VLMatatraso,0); ?></td>
            <td align="center"><table width="100%" border="0">
              <tr>
                <td width="35" align="center">&nbsp;</td>
                <td width="93"><font size="-1" color="#3399FF" face="Arial Narrow, Arial"> E: Insatisfactorio</font></td>
                <td width="11">&nbsp;</td>
                <td width="243">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
<tr>
            <td align="right">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center"><table width="400" border="0">
              <tr>
                <td width="35" align="center">&nbsp;</td>
                <td width="109">&nbsp;</td>
                <td width="32">&nbsp;</td>
                <td width="206">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          
<tr>
            <td align="right">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center"><font size="-1">DOCENTE </font></td>
            <td align="center">&nbsp;</td>
            <td align="center"><table width="400" border="0">
              <tr>
                <td width="35" align="center">&nbsp;</td>
                <td width="109">&nbsp;</td>
                <td width="32">&nbsp;</td>
                <td width="206" align="center"><font size="-1">VICERECTOR(A)</font></td>
              </tr>
              
            </table></td>
          </tr>          <tr>
            <td align="right">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center"><table width="400" border="0">
              <tr>
                <td width="35" align="center">&nbsp;</td>
                <td width="109">&nbsp;</td>
                <td width="32">&nbsp;</td>
                <td width="206">&nbsp;</td>
              </tr>
              
            </table></td>
          </tr>    	</table>
    </td>
</tr>
<?					
			break 1; 
		}
		}
			$j++;
			} else {
				$Otro=$VLNoMatricula;
				$j=0;

?>
</table></td></tr></table></td></tr>
<tr><td >&nbsp;</td></tr>
<tr><td>
<table width="800" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td align="center" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center"><img src="../imagenes/membrete4.png" width="586" height="147" alt="UNIDAD EDUCATIVA FISCOMISIONAL &quot;DON BOSCO&quot;"></td>
      </tr>
    </table></td>
</tr>

<tr>
    <td><table width="800" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td align="center"><font size="-1"><b> REPORTE DE CALIFICACIONES <?=$VLdtPeriodo; ?></b></font></td>
      </tr>
      <tr>
        <td align="center"><table width="600" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="127" align="right"><font size="-1"> <?=$VLdtQuimestre; ?></font>&nbsp;</td>
            <td width="26">&nbsp;</td>
            <td width="127" align="left"><font size="-1"><?=$VLdtParcial; ?></font>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><font color="<?=$VLdtColor; ?>" face="Arial Narrow, Arial" ><b> Estudiante:</b> <? echo ($VLApellido." ".$VLNombre.$VLdtObserv); ?></font></td>
      </tr>
      <tr>
        <td><font  face="Arial Narrow, Arial"><b>Curso y Paralelo:</b>  <? echo ($VLdtEspecialidad." ".$VLdtCurso." ''".$VLdtParalelo."''"); ?> </font></td>
      </tr>
      <tr>
        <td><font  face="Arial Narrow, Arial"><b>Docente Tutor/a:</b>  <? echo ($VLdtApellidoT." ".$VLdtNombreT); ?> </font></td>
      </tr>
    </table></td>
</tr>
<tr>
	<td> 
    	<table width="800" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="23"><hr></td>
            <td width="20"><hr></td>
            <td width="276"><hr></td>
            <td align="center" width="66"><hr></td>
            <td align="center" width="74"><hr></td>
            <td align="center" width="41"><hr></td>
            <td align="center" width="47"><hr></td>
            <td align="center" width="45"><hr></td>
            <td align="center" width="60"><hr></td>
            <td align="center" width="80"><hr></td>
            <td align="center" width="68"><hr></td>
          </tr>
          <tr>
            <td align="right" width="23"> <font size="-1" ><b>#</b></font> </td>
            <td width="20">&nbsp;</td>
            <td width="272"><font size="-1" ><b>Asignaturas</b></font></td>
            <td align="center" width="74"><font size="-1" ><b><?=$VLdtParcial; ?></b></font></td>
            <td align="center" width="70"><font size="-1" ><b>Cualitativa</b></font></td>
            <td align="center" width="47">&nbsp;</td>
            <td align="center" width="47">&nbsp;</td>
            <td align="center" width="45">&nbsp;</td>
            <td align="center" width="60">&nbsp;</td>
            <td align="center" width="78">&nbsp;</td>
            <td align="center" width="64">&nbsp;</td>
          </tr>
          <tr>
            <td align="right" width="23"><hr></td>
            <td width="20"><hr></td>
            <td width="276"><hr></td>
            <td align="center" width="66"><hr></td>
            <td align="center" width="74"><hr></td>
            <td align="center" width="41"><hr></td>
            <td align="center" width="47"><hr></td>
            <td align="center" width="45"><hr></td>
            <td align="center" width="60"><hr></td>
            <td align="center" width="80"><hr></td>
            <td align="center" width="68"><hr></td>
          </tr>
          
		 <tr>
            <td align="right" width="23"> <font   face="Arial Narrow, Arial"><?=$j+1; ?></font> </td>
            <td width="20">&nbsp;</td>
            <td width="276"><font  face="Arial Narrow, Arial"><?php echo ($VLMateria); ?></font></td>
            <td align="center" width="66"><?
	if($VLMatfamilia<4)
	{
   		switch ($VLMatPromedio) {
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
			
			
			echo number_format($VLMatPromedio,2); 
	}
			?></td>
            <td align="center" width="74"><?
	if($VLMatfamilia<4)
	{
   		switch ($VLMatPromedio) {
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
			
			if($VLMatPromedio==0)
			{
				$VTEquivalencia="NR";
			}
			if($VLMatPromedio>0)
			{
				$VTEquivalencia="N.A.A.R";
			}
			if($VLMatPromedio>=5)
			{
				$VTEquivalencia="P.A.A.R";
			}
			if($VLMatPromedio>=7)
			{
				$VTEquivalencia="A.A.R.";
			}
			if($VLMatPromedio>=9)
			{
				$VTEquivalencia="D.A.R";
			}
			
			echo $VTEquivalencia; 
	}
			?></td>
            <td align="center" width="41">&nbsp;</td>
            <td align="center" width="47">&nbsp;</td>
            <td align="center" width="45">&nbsp;</td>
            <td align="center" width="60">&nbsp;</td>
            <td align="center" width="80">&nbsp;</td>
            <td align="center" width="68">&nbsp;</td>
            
          </tr>  
          </table>
          </td>
          </tr>        
<?		
			$j++;
			$VtPromedio=$VtPromedio+$VLMatNota;
				if ( $VLMatNota > 0 )
				{
					$VtDivisor++;	
				}
			}
		}
	}
?>
</table>
  </body>
</html>
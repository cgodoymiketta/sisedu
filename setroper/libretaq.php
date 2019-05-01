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

$Query=" Select q.quidescripcion, q.quitipo, p.prcdescripcion ";
$Query.=" from qmstr q, prcl p ";
$Query.=" where p.quicodigo=q.quicodigo and q.quicodigo=".$VLdtCamp1;

$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if ( $VLnuDatos>0 )
{
	$VLdtQuimestre=get_result($VLdtDatos,0,"q.quidescripcion");
	$VLdtQuimestreTipo=get_result($VLdtDatos,0,"q.quitipo");
}else{
	$Query=" Select * ";
	$Query.=" from qmstr ";
	$Query.=" where quicodigo=".$VLdtCamp1;
	$VLdtDatos = execute_query($Query,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	$VLdtQuimestre=get_result($VLdtDatos,0,"quidescripcion");
	$VLdtQuimestreTipo=get_result($VLdtDatos,0,"quitipo");
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


$VlQryTutor="SELECT p.pernombres, p.perapellidos, gmd.gmcodigo
FROM `dcntmtr` dm, psn p, nsttcndcnt id, grpprllmtrdcnt gmd, grp g, mtr m, grpmtr gm
WHERE m.mattipo =5
AND m.matcodigo = gm.matcodigo
AND gm.gmcodigo = gmd.gmcodigo
AND gm.grucodigo = g.grucodigo
AND g.espcodigo =".$VLdtCamp9."
AND g.curcodigo =".$VLdtCamp3."
AND gmd.gmcodigo = gm.gmcodigo
AND gmd.parcodigo =".$VLdtCamp4."
AND gmd.dcmtcodigo = dm.dcmtcodigo
AND gmd.gpmdestado=1
AND dm.indocodigo = id.indocodigo
AND id.percodigo = p.percodigo
order by gmd.gmcodigo desc ";
$VLdtDatosTutor = execute_query($VlQryTutor,$VLConexion);
$VLnuDatosTutor = total_records($VLdtDatosTutor);
if ($VLnuDatosTutor >0)
{
	$VLdtApellidoT=get_result($VLdtDatosTutor,0,"p.perapellidos");
	$VLdtNombreT=get_result($VLdtDatosTutor,0,"p.pernombres");
}

$VLQryEst="Select mt.mtrno, mt.mtrestado, e.perapellidos, e.pernombres
FROM qmstr q, qmstrdtll qd, prcl p, prcldtll pd, psn e,
nsttcnstdnt ei, mtrcl mt, mtr m, grp g
WHERE q.quicodigo = qd.quicodigo 
and p.quicodigo=q.quicodigo
and p.prccodigo=pd.prccodigo
and qd.dtqmcodigo=pd.dtqmcodigo
and qd.matcodigo=m.matcodigo
and qd.mtrno=mt.mtrno
and mt.inescodigo=ei.inescodigo
and ei.percodigo = e.percodigo
and mt.grucodigo=g.grucodigo
and q.inscodigo=".$VLInstitucion."
and q.anocodigo=".$VLAnoLocal."
and q.quicodigo=".$VLdtCamp1."
and mt.parcodigo=".$VLdtCamp4."
and g.curcodigo=".$VLdtCamp3."
AND g.espcodigo =".$VLdtCamp9."
and not m.mattipo=5
group by mt.mtrno, mt.mtrestado, e.perapellidos, e.pernombres
order by e.perapellidos, e.pernombres";
$VLdtDatosEst = execute_query($VLQryEst,$VLConexion);
$VLnuDatosEst = total_records($VLdtDatosEst);



$VlQryMaterias="SELECT m.matcodigo, m.matestado, m.matdescripcion, m.matnoconsecutivo, m.mattipo
FROM  grpmtr gm, mtr m, grp g
WHERE m.matcodigo = gm.matcodigo
and g.gruestado=1
and gm.gmestado=1
and gm.grucodigo = g.grucodigo
and g.curcodigo=".$VLdtCamp3."
and g.espcodigo =".$VLdtCamp9."
and g.anocodigo=".$VLAnoLocal."
and not m.mattipo=5
order by m.mattipo, m.matnoconsecutivo";

$VLdtDatosMat = execute_query($VlQryMaterias,$VLConexion);
$VLnuDatosMat = total_records($VLdtDatosMat);


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPORTE DE NOTAS QUIMESTRALES</title>
</head>

<body>


<?php
//////////////////////// CONFIRMAMOS EL TIPO DE QUIMESTRE Q SE CONSULTA
if ($VLdtQuimestreTipo==0)
{

?>
<table border="0" cellpadding="0" cellspacing="0">


<?php 


	if ($VLnuDatosEst>0) {
		
		for($i=0; $i<$VLnuDatosEst;$i++)
		{
			
			$VtApellidos=get_result($VLdtDatosEst,$i,"e.perapellidos");
			$VtNombres=get_result($VLdtDatosEst,$i,"e.pernombres");
			$VtMtrno=get_result($VLdtDatosEst,$i,"mt.mtrno");
			//$j++;
			$VTMtrestado=get_result($VLdtDatosEst,$i,"mt.mtrestado");
			switch ($VTMtrestado) {
			case "1":
				$VLdtColor="#000000";
				$VLdtObserv="&nbsp;";
				break 1; 
			case "2":
				$VLdtColor="#003300"; 
				$VLdtObserv=" (DESERTOR)";
				break 1; 

			case "3":
				$VLdtColor="#FF0000"; 
				$VLdtObserv=" (RETIRADO)";
			default: 
			}				
			$VtEstudiante=$VtApellidos." ".$VtNombres.$VLdtObserv;
			
?>
	<tr><td>&nbsp;</td></tr>
    <tr><td><table border="0" cellpadding="0" cellspacing="0">
    <tr><td>
<table width="800" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td align="center" ><img src="../imagenes/membrete4.png" width="586" height="122" alt="UNIDAD EDUCATIVA FISCOMISIONAL &quot;DON BOSCO&quot;"></td>
</tr>

<tr>
    <td><table width="800" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td align="center"><font size="-1"><b> REPORTE DE CALIFICACIONES </b></font></td>
      </tr>
      <tr>
        <td align="center"><b>Año Lectivo <?=$VLdtPeriodo; ?></b>                  &nbsp;</td>
      </tr>
      <tr>
        <td align="center"><font size="-1"> <?=$VLdtQuimestre; ?></font></td>
      </tr>
      <tr>
        <td><font size="-1" color="<?=$VLdtColor; ?>" face="Arial Narrow, Arial"  ><b> Estudiante:</b> <? echo ($VtEstudiante); ?></font></td>
      </tr>
      <tr>
        <td><font size="-1" face="Arial Narrow, Arial"  ><b>Curso y Paralelo:</b>  <? echo ($VLdtCurso." ''".$VLdtParalelo."''"); ?> </font></td>
      </tr>
      <tr>
        <td><font size="-1" face="Arial Narrow, Arial" ><b>Docente Tutor/a:</b>  <? echo ($VLdtApellidoT." ".$VLdtNombreT); ?> </font></td>
      </tr>
    </table></td>
</tr>

<tr>
	<td>
<table width="800" border="0" cellspacing="0">
  <tr>
    <td align="center" width="23"><hr></td>
    <td width="20"><hr></td>
    <td align="center" width="280"><hr></td>
    <td align="center" width="20"><hr></td>
    <td align="center" width="20"><hr></td>
    <td align="center" width="20"><hr></td>
    <td align="center" width="20"><hr></td>
    <td align="center" width="20"><hr></td>
    <td align="center" width="20"><hr></td>
    <td align="center" width="20"><hr></td>
    <td align="center" width="20"><hr></td>
    <td align="center" width="20"><hr></td>
  </tr>

  <tr>
    <td align="center" width="23"><font size="-2" ><b>#</b></font></td>
    <td width="20">&nbsp;</td>
    <td align="center" width="180"><font size="-2" ><b>Asignatura</b></font></td>
    <td align="center" width="20"><font size="-2" ><b>1. Parcial</b></font></td>
    <td align="center" width="20"><font size="-2" ><b>2. Parcial</b></font></td>
    <td align="center" width="20"><font size="-2" ><b>3. Parcial</b></font></td>
    <td align="center" width="20"><font size="-2" ><b>Prom. Parcial</b></font></td>
    <td align="center" width="20"><font size="-2" ><b>80%</b></font></td>
    <td align="center" width="20"><font size="-2" ><b>Examen</b></font></td>
    <td align="center" width="20"><font size="-2" ><b>20%</b></font></td>
    <td align="center" width="20"><font size="-2" ><b>Promedio Quimestral</b></font></td>
    <td align="center" width="110"><font size="-2" ><b>Equivalencia</b></font></td>
  </tr>
  <tr>
    <td align="center" width="23"><hr></td>
    <td width="20"><hr></td>
    <td align="center" width="180"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
  </tr>
  <?php  

$VLQuerylib="SELECT mt.mtrno, mt.mtrestado, e.perapellidos, e.pernombres, q.quicodigo, q.quiorden,
q.quidescripcion, qd.dtqmcodigo, qd.quipromparcial, 
qd.quiequivalencia80, qd.quiexamen, qd.quiequivalencia20, 
qd.quipromquimestre, p.prccodigo, p.prcdescripcion,
p.prcorden, pd.dtprpromedio, m.matdescripcion, m.matcodigo,
m.matnoconsecutivo, m.mattipo, m.famcodigo, mt.mtrestado, mt.mtrno
FROM qmstr q, qmstrdtll qd, prcl p, prcldtll pd, psn e,
nsttcnstdnt ei, mtrcl mt, mtr m, grp g, grpmtr gm
WHERE q.quicodigo = qd.quicodigo 
and p.quicodigo=q.quicodigo
and p.prccodigo=pd.prccodigo
and qd.dtqmcodigo=pd.dtqmcodigo
and qd.matcodigo=m.matcodigo
and qd.mtrno=mt.mtrno
and mt.inescodigo=ei.inescodigo
and ei.percodigo = e.percodigo
and mt.grucodigo=g.grucodigo
and gm.matcodigo=m.matcodigo
and gm.grucodigo=g.grucodigo
and gm.gmestado=1
and q.inscodigo=".$VLInstitucion."
and q.anocodigo=".$VLAnoLocal."
and q.quicodigo=".$VLdtCamp1."
and mt.parcodigo=".$VLdtCamp4."
and g.curcodigo=".$VLdtCamp3."
and mt.mtrno=".$VtMtrno."
and not m.mattipo=5
order by q.quiorden, e.perapellidos, e.pernombres,
m.mattipo, m.matnoconsecutivo, m.matdescripcion, 
p.prcorden";
$VLdtDatosLib = execute_query($VLQuerylib,$VLConexion);
$VLnuDatosLib = total_records($VLdtDatosLib);  
  
  	if($VLnuDatosLib>0)
	{
		$No=0;
		$VLPromGene=0;
		$VlDiv=0;
		$VLMatCodigo1=get_result($VLdtDatosLib,0,"m.matcodigo");
		$VTCualitativa=0;
		
		for( $j=0; $j<$VLnuDatosLib; $j++)
		{
			$VLParcial1=0;
			$VLParcial2=0;
			$VLParcial3=0;
			if($j!=0)
			{
				$j--;	
			}
			for( $k=0; $k<6; $k++) //// confirmamos q la materia sea la mima
			{
				$VLMatCodigo=get_result($VLdtDatosLib,$j,"m.matcodigo");
				if ( $VLMatCodigo1==$VLMatCodigo )
				{
					$VLMateria=get_result($VLdtDatosLib,$j,"m.matdescripcion");
					$VLMatTipo=get_result($VLdtDatosLib,$j,"m.mattipo");
					$VLProPar=get_result($VLdtDatosLib,$j,"qd.quipromparcial");
					$VLEquiv80=get_result($VLdtDatosLib,$j,"qd.quiequivalencia80");
					$VLExamen=get_result($VLdtDatosLib,$j,"qd.quiexamen");
					$VLEquiv20=get_result($VLdtDatosLib,$j,"qd.quiequivalencia20");
					$VLPromQ=get_result($VLdtDatosLib,$j,"qd.quipromquimestre");
					$VLMatfamilia=get_result($VLdtDatosLib,$j,"m.famcodigo");
					$VLPromParcial=get_result($VLdtDatosLib,$j,"pd.dtprpromedio");
					$VLParOrden=get_result($VLdtDatosLib,$j,"p.prcorden");
					switch ($VLParOrden) {
					case 1:
						$VLParcial1=$VLPromParcial;
						break 1;
					case 2:
						$VLParcial2=$VLPromParcial;
						break 1;
					case 3:
						$VLParcial3=$VLPromParcial;
						break 1;
					}
					$j++;
				} else
				{
					$VLMatCodigo1=$VLMatCodigo;
					$No=$No+1;
					$k=6;
					
				}
			}
			
			switch ($VLMatTipo) {
			case "1":
	///////////////////////// PARA LAS CUANTITATIVAS
  ?> 
  <tr>
    <td align="right"><font size="-1" face="Arial Narrow, Arial"  ><? echo $No; ?></font></td>
    <td width="20"><? // echo $k."/".$j." - ".$VLMatCodigo1."/".$VLMatCodigo; ?>&nbsp;</td>
    <td><font size="-1" face="Arial Narrow, Arial"  ><? echo ($VLMateria); ?></font></td>
    <td width="40" align="right"><font size="-1" face="Arial Narrow, Arial"  ><?
	if($VLMatfamilia<4)
	{
   		switch ($VLParcial1) {
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
			
			
			echo number_format($VLParcial1,2); 
	}
			?></font></td>
    <td width="40" align="right"><font size="-1" face="Arial Narrow, Arial"  ><?
	if($VLMatfamilia<4)
	{
   		switch ($VLParcial2) {
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
			
			
			echo number_format($VLParcial2,2); 
	}
			?></font></td>
    <td width="40" align="right"><font size="-1" face="Arial Narrow, Arial"  ><?
	if($VLMatfamilia<4)
	{
   		switch ($VLParcial3) {
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
			
			
			echo number_format($VLParcial3,2); 
	}
			?></font></td>
    <td width="40" align="right"><font size="-1" face="Arial Narrow, Arial"  ><?
	if($VLMatfamilia<4)
	{
   		switch ($VLProPar) {
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
			
			
			echo number_format($VLProPar,2); 
	}
			?></font></td>
    <td width="40" align="right"><font size="-1" face="Arial Narrow, Arial" ><?
	if($VLMatfamilia<4)
	{
   		switch ($VLProPar) {
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
			
			
			echo number_format($VLEquiv80,2); 
	}
			?></font></td>
            
    <td width="40" align="right"><font size="-1" face="Arial Narrow, Arial"  ><?
	if($VLMatfamilia<4)
	{
   		switch ($VLExamen) {
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
			
			
			echo number_format($VLExamen,2); 
	}
			?></font></td>
            
    <td width="40" align="right"><font size="-1" face="Arial Narrow, Arial"  ><?
	if($VLMatfamilia<4)
	{
   		switch ($VLExamen) {
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
			
			
			echo number_format($VLEquiv20,2); 
	}
			?></font></td>
    <td width="40" align="right"><font size="-1" face="Arial Narrow, Arial"  ><?
	if($VLMatfamilia<4)
	{
   		switch ($VLPromQ) {
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
			
			
			echo number_format($VLPromQ,2); 
			
	}
	if ($VLPromQ > 0 )
	{
		$VLPromGene=$VLPromGene+$VLPromQ;
		$VlDiv++;
	}
			?></b></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial" ><?
	if($VLMatfamilia<4)
	{
			if($VLPromQ==0)
			{
				$VTEquivalencia="NR";
			}
			if($VLPromQ>0)
			{
				$VTEquivalencia="N/E";
			}
			if($VLPromQ>=5)
			{
				$VTEquivalencia="I";
			}
			if($VLPromQ>=7)
			{
				$VTEquivalencia="EP";
			}
			if($VLPromQ>=9)
			{
				$VTEquivalencia="A";
			}
			
			echo $VTEquivalencia; 
	}else{
			
			if($VLPromQ==0)
			{
				$VTEquivalencia="NR";
			}
			if($VLPromQ>0)
			{
				$VTEquivalencia="N.A.A.R";
			}
			if($VLPromQ>=5)
			{
				$VTEquivalencia="P.A.A.R";
			}
			if($VLPromQ>=7)
			{
				$VTEquivalencia="A.A.R";
			}
			if($VLPromQ>=9)
			{
				$VTEquivalencia="D.A.R";
			}
			
			echo $VTEquivalencia; 
	}
			?></font></td>
    
  </tr>
<?php
			break 1; 
			
		case "2":
		///////////////// PARA LAS CUALITATIVAS
		$VTCualitativa=1;
?>  
  <tr>
    <td align="center" width="23"><hr></td>
    <td width="20"><hr></td>
    <td align="center" width="180"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
  </tr>
<?PHP
		//////  calculamos el promedio de las cuantitativas
?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><font size="-1" ><b>PROMEDIO</b></font></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial" ><b><? 
	if ( $VlDiv>0) {
		$VlResp =$VLPromGene / $VlDiv;
	}
	
		if($VLMatfamilia<4)
		{
			if($VlResp==0)
			{
				$VTEquivalencia="NR";
			}
			if($VlResp>0)
			{
				$VTEquivalencia="N/E";
			}
			if($VlResp>3)
			{
				$VTEquivalencia="I";
			}
			if($VlResp>5)
			{
				$VTEquivalencia="EP";
			}
			if($VlResp>7)
			{
				$VTEquivalencia="A";
			}
			echo $VTEquivalencia;
		} else {	
			echo number_format($VlResp,2);
			$VLPromGene=0;
			$VlDiv=0;
		}
	?></b></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial" ><B><?
		if($VLMatfamilia<4)
		{
			if($VlResp==0)
			{
				$VTEquivalencia="NR";
			}
			if($VlResp>0)
			{
				$VTEquivalencia="N/E";
			}
			if($VlResp>3)
			{
				$VTEquivalencia="I";
			}
			if($VlResp>5)
			{
				$VTEquivalencia="EP";
			}
			if($VlResp>7)
			{
				$VTEquivalencia="A";
			}
		} else {	
			if($VlResp==0)
			{
				$VTEquivalencia="NR";
			}
			if($VlResp>0)
			{
				$VTEquivalencia="N.A.A.R";
			}
			if($VlResp>=5)
			{
				$VTEquivalencia="P.A.A.R";
			}
			if($VlResp>=7)
			{
				$VTEquivalencia="A.A.R";
			}
			if($VlResp>=9)
			{
				$VTEquivalencia="D.A.R";
			}
		} 
			echo $VTEquivalencia; 
			$VlResp=0;
			?></B></font>
    
    
    </td>
  </tr>
</table>
    
    </td>
</tr>
  
<tr>
	<td> 
    	<table width="800" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="24"> <font size="-1" face="Arial Narrow, Arial" ><?=$No; ?></font> </td>
            <td width="23">&nbsp;</td>
            <td width="208"><font size="-1" face="Arial Narrow, Arial" ><?php echo ($VLMateria); ?></font></td>
            <td align="center" width="45"><font size="-1" face="Arial Narrow, Arial" ><?
			

		if( $VLPromQ>8.99 && $VLPromQ<11)
		{
			echo "EX";
		}
		if( $VLPromQ>6.99 && $VLPromQ<9)
		{
			echo "MB";
		}
		if( $VLPromQ>4.99 && $VLPromQ<7)
		{
			echo "B";
		}
		if( $VLPromQ>0 && $VLPromQ<5)
		{
			echo "R";
		}
		if( $VLPromQ==0)
		{
			echo "NR";
		}			
			?></font></td>
          <td width="400" align="center"><table width="400" border="0">
  <tr>
    <td width="35" align="center">&nbsp;</td>
    <td width="120"><font size="-2" color="#3399FF" face="Arial Narrow, Arial" > A: Muy satisfactorio</font></td>
    <td width="12">&nbsp;</td>
    <td width="270"><font size="-2" color="#006600" face="Arial Narrow, Arial" > <?php if($VLMatfamilia<4)
	{ ?> A Adquirida <? }else{ ?> D.A.R: Domina los Aprendizajes Requeridos <?php } ?></font></td>
  </tr>
</table>
</td>
          </tr>
    	</table>
    </td>
</tr>

<?PHP
		break 1;
		
		case "3":
		
		if ($VTCualitativa==0)
		{
///////////////////  SACAMOS EL PROMEDIO ////////////////////////////////////////////
			?>
  <tr>
    <td align="center" width="23"><hr></td>
    <td width="20"><hr></td>
    <td align="center" width="180"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
    <td align="center"><hr></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><font size="-1" ><b>PROMEDIO</b></font></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial" ><b><? 
	if ( $VlDiv>0) {
		$VlResp =$VLPromGene / $VlDiv;
	}
	
		if($VLMatfamilia<4)
		{
			if($VlResp==0)
			{
				$VTEquivalencia="NR";
			}
			if($VlResp>0)
			{
				$VTEquivalencia="N/E";
			}
			if($VlResp>3)
			{
				$VTEquivalencia="I";
			}
			if($VlResp>5)
			{
				$VTEquivalencia="EP";
			}
			if($VlResp>7)
			{
				$VTEquivalencia="A";
			}
			echo $VTEquivalencia;
		} else {	
			echo number_format($VlResp,2);
			$VLPromGene=0;
			$VlDiv=0;
		}
	?></b></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial" ><B><?
		if($VLMatfamilia<4)
		{
			if($VlResp==0)
			{
				$VTEquivalencia="NR";
			}
			if($VlResp>0)
			{
				$VTEquivalencia="N/E";
			}
			if($VlResp>3)
			{
				$VTEquivalencia="I";
			}
			if($VlResp>5)
			{
				$VTEquivalencia="EP";
			}
			if($VlResp>7)
			{
				$VTEquivalencia="A";
			}
		} else {	
			if($VlResp==0)
			{
				$VTEquivalencia="NR";
			}
			if($VlResp>0)
			{
				$VTEquivalencia="N.A.A.R";
			}
			if($VlResp>=5)
			{
				$VTEquivalencia="P.A.A.R";
			}
			if($VlResp>=7)
			{
				$VTEquivalencia="A.A.R";
			}
			if($VlResp>=9)
			{
				$VTEquivalencia="D.A.R";
			}
		} 
			echo $VTEquivalencia; 
			$VlResp=0;
			?></B></font>
    
    
    </td>
  </tr>
</table>
    
    </td>
</tr>
  
<tr>
	<td> 
    	<table width="800" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="24"> <font size="-1" face="Arial Narrow, Arial" >&nbsp;</font> </td>
            <td width="23">&nbsp;</td>
            <td width="208"><font size="-1" face="Arial Narrow, Arial" >&nbsp;</font></td>
            <td align="center" width="45"><font size="-1" face="Arial Narrow, Arial" >&nbsp;</font></td>
          <td width="400" align="center"><table width="400" border="0">
  <tr>
    <td width="35" align="center">&nbsp;</td>
    <td width="120"><font size="-2" color="#3399FF" face="Arial Narrow, Arial" > A: Muy satisfactorio</font></td>
    <td width="12">&nbsp;</td>
    <td width="270"><font size="-2" color="#006600" face="Arial Narrow, Arial" > <?php if($VLMatfamilia<4)
	{ ?> A Adquirida <? }else{ ?> D.A.R: Domina los Aprendizajes Requeridos <?php } ?></font></td>
  </tr>
</table>
</td>
          </tr>
    	</table>
    </td>
</tr>
 <?PHP

/////////////////////////////////////////////////////////////////////////////////////			
		} else {
////// NO HACEMOS NADA YA TA 			
			
		}
?>
<tr>
	<td> 
    	<table width="800" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" width="21">&nbsp;</td>
            <td width="25">&nbsp;</td>
            <td width="208"><font size="-1"  face="Arial Narrow, Arial" ><B><?php echo ($VLMateria); ?></B></font></td>
            <td align="center" width="46"><font size="-1" face="Arial Narrow, Arial" ><B><?
		switch ($VLPromQ) {
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
		
		?></B></font></td>
        <td width="400" align="center"><table width="400" border="0">
  <tr>
    <td width="35" align="center">&nbsp;</td>
    <td width="103"><font size="-2" color="#3399FF" face="Arial Narrow, Arial" > B: Satisfactorio</font></td>
    <td width="10">&nbsp;</td>
    <td width="234"><font size="-2" color="#006600" face="Arial Narrow, Arial" > <?php if($VLMatfamilia<4)
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
            <td align="right" width="23">&nbsp;</td>
            <td width="23">&nbsp;</td>
            <td width="207"><font size="-1" face="Arial Narrow, Arial" >FALTAS JUSTIFICADAS</font></td>
            <td align="center" width="47"><font size="-1" face="Arial Narrow, Arial" ><?=number_format($VLProPar,0); ?></font></td>
        <td width="400" align="center"><table width="400" border="0">
  <tr>
    <td width="28" align="center">&nbsp;</td>
    <td width="116"><font size="-2" color="#3399FF" face="Arial Narrow, Arial"  > C: Poco Satisfactorio</font></td>
    <td width="10">&nbsp;</td>
    <td width="234"><font size="-2" color="#006600" face="Arial Narrow, Arial" > <?php if($VLMatfamilia<4)
	{ ?> I Inicio <? }else{ ?> P.A.A.R: Proximo a alcanzar los Aprendizajes Requeridos <?php } ?></font></td>
  </tr>
</table>
</td>
          </tr>
          <tr>
            <td align="right" width="23">&nbsp;</td>
            <td width="23">&nbsp;</td>
            <td width="207"><font size="-1" face="Arial Narrow, Arial" >FALTAS INJUSTIFICADAS</font></td>
            <td align="center" width="47"><font size="-1" face="Arial Narrow, Arial" ><?=number_format($VLExamen,0); ?></font></td>
            <td width="400" align="center"><table width="400" border="0">
              <tr>
                <td width="35" align="center">&nbsp;</td>
                <td width="120"><font size="-2" color="#3399FF" face="Arial Narrow, Arial"  >D: Mejorable</font></td>
                <td width="12">&nbsp;</td>
                <td width="270"><font size="-2" color="#006600" face="Arial Narrow, Arial" > <?php if($VLMatfamilia<4)
	{ ?> N/E No Evaluado <? }else{ ?> N.A.A.R: No alcanza los Aprendizajes Requeridos <?php } ?></font></td>
                </tr>
  </table>
  </td>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
            <td>&nbsp;</td>
            <td><font size="-1" face="Arial Narrow, Arial" >ATRASOS</font></td>
            <td align="center"><font size="-1" face="Arial Narrow, Arial" ><?=number_format($VLEquiv20,0); ?></font></td>
            <td align="center"><table width="400" border="0">
              <tr>
                <td width="35" align="center">&nbsp;</td>
                <td width="120"><font size="-2" color="#3399FF" face="Arial Narrow, Arial"  > E: Insatisfactorio</font></td>
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
                <td width="206" align="center"><font size="-1">RECTORA</font></td>
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
	}
  ?>  

</table></td></tr></table></td></tr>
<tr>
  <td >&nbsp;</td></tr>
<?php
		}
	}
?>
<tr>
	<td><? //=$VlQryMaterias." - ".$VLnuDatosLib." - ".$VLQuerylib; ?>&nbsp;</td>
</tr>
</table>
<?php
} else {

///////  PARA EL CASO DE SER UN EXAMEN FINAL


$VLQryEst="Select mt.mtrno, mt.mtrestado, e.perapellidos, e.pernombres
FROM qmstr q, qmstrdtll qd, prcl p, prcldtll pd, psn e,
nsttcnstdnt ei, mtrcl mt, mtr m, grp g
WHERE q.quicodigo = qd.quicodigo 
and p.quicodigo=q.quicodigo
and p.prccodigo=pd.prccodigo
and qd.dtqmcodigo=pd.dtqmcodigo
and qd.matcodigo=m.matcodigo
and qd.mtrno=mt.mtrno
and mt.inescodigo=ei.inescodigo
and ei.percodigo = e.percodigo
and mt.grucodigo=g.grucodigo
and q.inscodigo=".$VLInstitucion."
and q.anocodigo=".$VLAnoLocal."
and mt.parcodigo=".$VLdtCamp4."
and g.curcodigo=".$VLdtCamp3."
AND g.espcodigo =".$VLdtCamp9."
and not m.mattipo=5
group by mt.mtrno, mt.mtrestado, e.perapellidos, e.pernombres
order by e.perapellidos, e.pernombres";
$VLdtDatosEst = execute_query($VLQryEst,$VLConexion);
$VLnuDatosEst = total_records($VLdtDatosEst);


/*
	<tr><td><?php echo "Query:".$VLQryEst; ?></td></tr>
	<tr><td><?php echo "Query:".$VLQryFinal; ?></td></tr>

*/
 ?>

<table border="0" cellpadding="0" cellspacing="0">
	

<?php 

	if ($VLnuDatosEst>0) {
/////////// CONSULTAMOS LAS CALIFICACIONES ////////////
		
		for($i=0; $i<$VLnuDatosEst;$i++)
		{
			
			$VtApellidos=get_result($VLdtDatosEst,$i,"e.perapellidos");
			$VtNombres=get_result($VLdtDatosEst,$i,"e.pernombres");
			$VtMtrno=get_result($VLdtDatosEst,$i,"mt.mtrno");
			$VTMtrestado=get_result($VLdtDatosEst,$i,"mt.mtrestado");
			
			$VTdtPromedio=0;
			$VTdtSumatoria=0;
			switch ($VTMtrestado) {
			case "1":
				$VLdtColor="#000000";
				$VLdtObserv="&nbsp;";
				break 1; 
			case "2":
				$VLdtColor="#003300"; 
				$VLdtObserv=" (DESERTOR)";
				break 1; 

			case "3":
				$VLdtColor="#FF0000"; 
				$VLdtObserv=" (RETIRADO)";
			default: 
			}				
			$VtEstudiante=$VtApellidos." ".$VtNombres.$VLdtObserv;
			
?>
	<tr><td>&nbsp;</td></tr>
    <tr><td>
        <table border="0" cellpadding="0" cellspacing="0" width="800">
            <tr><td>
                <table width="800" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center" ><img src="../imagenes/membrete4.png" width="586" height="122" alt="UNIDAD EDUCATIVA FISCOMISIONAL &quot;DON BOSCO&quot;"></td>
                    </tr>
                    <tr>
                        <td>
                            <table width="800" border="0" cellpadding="1" cellspacing="1">
                              <tr>
                                <td align="center"><font size="-1"><b> REPORTE DE ANUAL DE APRENDIZAJE </b></font></td>
                              </tr>
                              <tr>
                                <td align="center"><b>Año Lectivo <?=$VLdtPeriodo; ?></b>&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center"><font size="-1"> <?=$VLdtQuimestre; ?></font></td>
                              </tr>
                              <tr>
                                <td><font size="-1" color="<?=$VLdtColor; ?>" face="Arial Narrow, Arial"  ><b> Estudiante:</b> <? echo ($VtEstudiante); ?></font></td>
                              </tr>
                              <tr>
                                <td><font size="-1" face="Arial Narrow, Arial"  ><b>Curso y Paralelo:</b>  <? echo ($VLdtCurso." ''".$VLdtParalelo."''"); ?> </font></td>
                              </tr>
                              <tr>
                                <td><font size="-1" face="Arial Narrow, Arial" ><b>Docente Tutor/a:</b>  <? echo ($VLdtApellidoT." ".$VLdtNombreT); ?> </font></td>
                              </tr>
                            </table>
                        </td>
                    </tr>
                    <tr><td>
<?php 
////////  CARGAMOS LAS ASIGNATURAS Y LAS CALIFICACIONES POR ESTUDIANTE

?>                    
<table width="800" border="0" >
  <tr>
    <td align="center" width="20"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center" width="300"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center" width="80"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center" width="80"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center" width="80"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center" width="80"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center" width="80"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center" width="80"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
  </tr>
  <tr>
    <td rowspan="3" align="center"><font size="-1" face="Arial Narrow, Arial"> No..<? echo "qq".$VLnuDatosMat; ?>..</font></td>
    <td rowspan="3" align="center"><font size="-1" face="Arial Narrow, Arial">ASIGNATURA</font></td>
    <td colspan="2" align="center"><font size="-1" face="Arial Narrow, Arial">PRIMER QUIMESTRE</font></td>
    <td colspan="2" align="center"><font size="-1" face="Arial Narrow, Arial">SEGUNDO QUIMESTRE</font></td>
    <td colspan="2" align="center"><font size="-1" face="Arial Narrow, Arial">NOTA ANUAL</font></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><font size="-1" face="Arial Narrow, Arial">CALIFICACIONES</font></td>
    <td colspan="2" align="center"><font size="-1" face="Arial Narrow, Arial">CALIFICACIONES</font></td>
    <td colspan="2" align="center"><font size="-1" face="Arial Narrow, Arial">CALIFICACIONES</font></td>
  </tr>
  <tr>
    <td align="center"><font size="-2" face="Arial Narrow, Arial">CUANTITATIVA</font></td>
    <td align="center"><font size="-2" face="Arial Narrow, Arial">CUALITATIVA</font></td>
    <td align="center"><font size="-2" face="Arial Narrow, Arial">CUANTITATIVA</font></td>
    <td align="center"><font size="-2" face="Arial Narrow, Arial">CUALITATIVA</font></td>
    <td align="center"><font size="-2" face="Arial Narrow, Arial">CUANTITATIVA</font></td>
    <td align="center"><font size="-2" face="Arial Narrow, Arial">CUALITATIVA</font></td>
  </tr>
  <tr>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
  </tr>
<?php
//$VLdtDatosFinal = execute_query($VLQryFinal,$VLConexion);
//$VLnuDatosFinal = total_records($VLdtDatosFinal);

if ($VLnuDatosMat>0)
{
////////////////  CONSULTAMOS LAS CALIFICACIONES 

$VLQryFinal="Select 
p.perapellidos, p.pernombres, q.quiorden, q.quitipo,
m.matdescripcion, m.mattipo, m.matnoconsecutivo, m.famcodigo,
qd.mtrno, qd.quipromparcial, qd.quiequivalencia80, 
qd.quiexamen, qd.quiequivalencia20, qd.quipromquimestre
from qmstr q, qmstrdtll qd, mtr m, psn p, 
nsttcnstdnt e, mtrcl mt, grp g, grpmtr gm
where
gm.grucodigo=g.grucodigo
and not ( gm.gmestado=0)
and  gm.matcodigo=m.matcodigo
and m.matcodigo=qd.matcodigo
and q.quicodigo=qd.quicodigo
and q.anocodigo=".$VLAnoLocal."
and q.inscodigo=".$VLInstitucion."
and e.inscodigo=".$VLInstitucion."
and mt.anocodigo=".$VLAnoLocal."
and g.anocodigo=".$VLAnoLocal."
AND g.espcodigo =".$VLdtCamp9."
and p.percodigo=e.percodigo
and e.inescodigo=mt.inescodigo
and mt.mtrno=".$VtMtrno."
and mt.mtrno = qd.mtrno
and mt.parcodigo=".$VLdtCamp4."
and g.curcodigo=".$VLdtCamp3."
and g.grucodigo=mt.grucodigo
and not m.mattipo=5
order by p.perapellidos, p.pernombres, qd.mtrno, 
m.mattipo, m.matnoconsecutivo, q.quiorden	";

$VLdtDatosFinal = execute_query($VLQryFinal,$VLConexion);
$VLnuDatosFinal = total_records($VLdtDatosFinal);


if ($VLnuDatosFinal>0){
///////////////////////////////	
///// nosmovemos en las calificaciones
	for ($l=0; $l<$VLnuDatosFinal; $l++)
	{
//////////////////////////////
	for($m=0; $m<$VLnuDatosMat; $m++)
	{
		$VLdtNombreM=get_result($VLdtDatosFinal,$l,"m.matdescripcion");
		$VLdtPrimerQ=get_result($VLdtDatosFinal,$l,"qd.quipromquimestre");
		$VLdtSegundoQ=get_result($VLdtDatosFinal,$l+1,"qd.quipromquimestre");
		$VLdtAnual=get_result($VLdtDatosFinal,$l+2,"qd.quipromquimestre");
		$VLdtFJust=get_result($VLdtDatosFinal,$l+2,"qd.quipromquimestre");
		$VLdtFInjust=get_result($VLdtDatosFinal,$l+2,"qd.quiexamen");
		$VLdtTipoMat=get_result($VLdtDatosFinal,$l,"m.mattipo");
		$VLMatfamilia=get_result($VLdtDatosFinal,$l,"m.famcodigo");
		
		////// calculamos el promedio y cerramos la tabla dibujamos una nueva
		switch ($VLdtTipoMat) {
		case "4":
		/////ASISTENCIA
?>
  <tr>
    <td align="center" colspan="3"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center" colspan="5"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
  </tr>
  <tr>
    <td align="center"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
    <td align="left"><font size="-1" face="Arial Narrow, Arial">Faltas Justificadas</font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><?php echo number_format($VLdtFJust,0); ?></font></td>
    <td align="center" colspan="5"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
  </tr>
  <tr>
    <td align="center"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
    <td align="left"><font size="-1" face="Arial Narrow, Arial">Faltas Injustificadas</font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><?php echo number_format($VLdtFInjust,0); ?></font></td>
    <td align="center" colspan="5"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
  </tr>
  <tr>
    <td align="center" colspan="3"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
    <td align="center" colspan="5"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
  </tr>
  <tr>
    <td align="center" colspan="3"><font size="-1" face="Arial Narrow, Arial">DOCENTE</font></td>
    <td align="center" colspan="5"><font size="-1" face="Arial Narrow, Arial">RECTORA</font></td>
  </tr>
    <tr>
    <td align="center" colspan="3"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
    <td align="center" colspan="5"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
  </tr>
    <tr>
    <td align="center" colspan="3"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
    <td align="center" colspan="5"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
  </tr>

  <tr>
    <td align="center" colspan="3"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
    <td align="center" colspan="5"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
  </tr>

<?php		
		break; 
		case "3":
		///// COMPORTAMIENTO
		
		
?>  
  <tr>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><hr></font></td>
  </tr>

  <tr>
    <td align="center"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
    <td align="left"><font size="-1" face="Arial Narrow, Arial"><b>
    <?php if ($VLMatfamilia>3){ ?>
    PROMEDIO ANUAL
    <?php } ?>
    </b></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><b>
    <?php if ($VLMatfamilia>3){
			if ($VTdtSumatoria>0)
			{ 
				echo number_format($VTdtPromedio/$VTdtSumatoria,2); 
				$VTdtProAnual=$VTdtPromedio/$VTdtSumatoria;
			}else { echo "0.00";}}
	?>
    </b></font></td>
    <td align="left"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
    <td align="left" colspan="4"><font size="-1" face="Arial Narrow, Arial"><b><?
		if($VLMatfamilia<4)
		{
				$VTEquivalencia=" ";
		} else {	
			if($VTdtProAnual==0)
			{
				$VTEquivalencia="N.R.";
			}
			if($VTdtProAnual>0)
			{
				$VTEquivalencia="No alcanza los Aprendizajes Requeridos";
			}
			if($VTdtProAnual>=5)
			{
				$VTEquivalencia="Proximo a alcanzar los Aprendizajes Requeridos";
			}
			if($VTdtProAnual>=7)
			{
				$VTEquivalencia="Alcanza los Aprendizajes Requeridos";
			}
			if($VTdtProAnual>=9)
			{
				$VTEquivalencia="Domina los Aprendizajes Requeridos";
			}
		} 
			echo $VTEquivalencia; 
			$VlResp=0;
			?></b></font></td>
  </tr>
  <tr>
    <td align="center"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
    <td align="left"><font size="-1" face="Arial Narrow, Arial"><b>COMPORTAMIENTO</b></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><b><?		
	switch ($VLdtAnual) {
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
		} ?>
</b></font></td>
    <td align="center" colspan="5"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
  </tr>

<?php  
		break;
		case "1" or "2":?>
  <tr>
    <td><font size="-1" face="Arial Narrow, Arial" ><?php echo $m+1; ?></font></td>
    <td><font size="-1" face="Arial Narrow, Arial" ><?php echo ($VLdtNombreM); ?></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial" ><? 
if ($VLMatfamilia>3){
	if ( $VLdtTipoMat==2) {

		if( $VLdtPrimerQ>8.99 && $VLdtPrimerQ<11)
		{
			echo "EX";
		}
		if( $VLdtPrimerQ>6.99 && $VLdtPrimerQ<9)
		{
			echo "MB";
		}
		if( $VLdtPrimerQ>4.99 && $VLdtPrimerQ<7)
		{
			echo "B";
		}
		if( $VLdtPrimerQ>0 && $VLdtPrimerQ<5)
		{
			echo "R";
		}
		if( $VLdtPrimerQ==0)
		{
			echo "NR";
		}			
	} else { 
		echo number_format($VLdtPrimerQ,2); 
	}
}?></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial" ><?
	if($VLMatfamilia<4)
	{
			if($VLdtPrimerQ==0)
			{
				$VTEquivalencia="NR";
			}
			if($VLdtPrimerQ>0)
			{
				$VTEquivalencia="N/E";
			}
			if($VLdtPrimerQ>=5)
			{
				$VTEquivalencia="I";
			}
			if($VLdtPrimerQ>=7)
			{
				$VTEquivalencia="EP";
			}
			if($VLdtPrimerQ>=9)
			{
				$VTEquivalencia="A";
			}
			
			echo $VTEquivalencia; 
	}else{
			
			if($VLdtPrimerQ==0)
			{
				$VTEquivalencia="NR";
			}
			if($VLdtPrimerQ>0)
			{
				$VTEquivalencia="N.A.A.R";
			}
			if($VLdtPrimerQ>=5)
			{
				$VTEquivalencia="P.A.A.R";
			}
			if($VLdtPrimerQ>=7)
			{
				$VTEquivalencia="A.A.R";
			}
			if($VLdtPrimerQ>=9)
			{
				$VTEquivalencia="D.A.R";
			}
			
			echo $VTEquivalencia; 
	}
			?></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial" ><?
if ($VLMatfamilia>3){
	 if ( $VLdtTipoMat==2) { 
		if( $VLdtSegundoQ>8.99 && $VLdtSegundoQ<11)
		{
			echo "EX";
		}
		if( $VLdtSegundoQ>6.99 && $VLdtSegundoQ<9)
		{
			echo "MB";
		}
		if( $VLdtSegundoQ>4.99 && $VLdtSegundoQ<7)
		{
			echo "B";
		}
		if( $VLdtSegundoQ>0 && $VLdtSegundoQ<5)
		{
			echo "R";
		}
		if( $VLdtSegundoQ==0)
		{
			echo "NR";
		}			
			} else { 
				echo number_format($VLdtSegundoQ,2); 
			} }?></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial" ><?
	if($VLMatfamilia<4)
	{
			if($VLdtSegundoQ==0)
			{
				$VTEquivalencia="NR";
			}
			if($VLdtSegundoQ>0)
			{
				$VTEquivalencia="N/E";
			}
			if($VLdtSegundoQ>=5)
			{
				$VTEquivalencia="I";
			}
			if($VLdtSegundoQ>=7)
			{
				$VTEquivalencia="EP";
			}
			if($VLdtSegundoQ>=9)
			{
				$VTEquivalencia="A";
			}
			
			echo $VTEquivalencia; 
	}else{
			
			if($VLdtSegundoQ==0)
			{
				$VTEquivalencia="NR";
			}
			if($VLdtSegundoQ>0)
			{
				$VTEquivalencia="N.A.A.R";
			}
			if($VLdtSegundoQ>=5)
			{
				$VTEquivalencia="P.A.A.R";
			}
			if($VLdtSegundoQ>=7)
			{
				$VTEquivalencia="A.A.R";
			}
			if($VLdtSegundoQ>=9)
			{
				$VTEquivalencia="D.A.R";
			}
			
			echo $VTEquivalencia; 
	}
			?></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial" ><b><? 
if ($VLMatfamilia>3){	
	if ( $VLdtTipoMat==2) {  
		if( $VLdtAnual>8.99 && $VLdtAnual<11)
		{
			echo "EX";
		}
		if( $VLdtAnual>6.99 && $VLdtAnual<9)
		{
			echo "MB";
		}
		if( $VLdtAnual>4.99 && $VLdtAnual<7)
		{
			echo "B";
		}
		if( $VLdtAnual>0 && $VLdtAnual<5)
		{
			echo "R";
		}
		if( $VLdtAnual==0)
		{
			echo "NR";
		}			
			} else { 
				echo number_format($VLdtAnual,2);
				$VTdtPromedio=$VTdtPromedio+$VLdtAnual;
				$VTdtSumatoria++;
			} }?></b></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial" ><?
	if($VLMatfamilia<4)
	{
			if($VLdtAnual==0)
			{
				$VTEquivalencia="NR";
			}
			if($VLdtAnual>0)
			{
				$VTEquivalencia="N/E";
			}
			if($VLdtAnual>=5)
			{
				$VTEquivalencia="I";
			}
			if($VLdtAnual>=7)
			{
				$VTEquivalencia="EP";
			}
			if($VLdtAnual>=9)
			{
				$VTEquivalencia="A";
			}
			
			echo $VTEquivalencia; 
	}else{
			
			if($VLdtAnual==0)
			{
				$VTEquivalencia="NR";
			}
			if($VLdtAnual>0)
			{
				$VTEquivalencia="N.A.A.R";
			}
			if($VLdtAnual>=5)
			{
				$VTEquivalencia="P.A.A.R";
			}
			if($VLdtAnual>=7)
			{
				$VTEquivalencia="A.A.R";
			}
			if($VLdtAnual>=9)
			{
				$VTEquivalencia="D.A.R";
			}
			
			echo $VTEquivalencia; 
	}
			?></font></td>
  </tr>
<?php
		break;
		}
		$l=$l+3;
	}
	}
	//$i=$i-1;
} 

}
?>
</table>


<?php

///////   FIN DE LA TABLA DE CALIFICACIONES
?>                    
                    </td></tr>
                </table>
            </td></tr>
        </table>
	</td></tr> 
	<tr><td>&nbsp;</td></tr>
<?php
		}
	}
?>   
 
</table> 

<?php
}
///////  FINAL DE LIBRETA
 ?>

</body>
</html>
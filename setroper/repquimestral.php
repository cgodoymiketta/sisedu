
<?php 

require "../cnxn_bsddts/mnjdr_bsdts.php";
header('Content-Type: text/html; charset=UTF-8');

$VLConexion=connect();
$VLNuevo=$_GET[nuevo_x];
$VLGuardar=$_GET[guardar_x];
$VLModificar=$_GET[modificar_x];
$VLBuscar=$_GET[buscar_x];
$VLImprimir=$_GET[imprimir_x];
$VLEliminar=$_GET[eliminar_x];
$VLConsultar=$_GET[consultar_x];
$VLdtCriterio=$_GET[critero];
$VLdtConsultar=$_GET[txt_Consulta];
$VLdtCamp1=$_GET[txt_Camp1];
$VLdtCamp2=$_GET[txt_Camp2];
$VLdtCamp3=$_GET[txt_Camp3];
$VLdtCamp4=$_GET[txt_Camp4];
$VLdtCamp5=$_GET[txt_Camp5];
$VLdtCamp6=$_GET[txt_Camp6];
$VLdtCamp7=$_GET[txt_Camp7];
$VLdtCamp8=$_GET[txt_Camp8];
$VLdtCamp9=$_GET[txt_Camp9];
$VLdtCamp10=$_GET[txt_Camp10];
$VLdtCamp11=$_GET[txt_Camp11];

$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$VLtxtCampo1="Quimestre";
$VLtxtCampo2="Parcial";
$VLtxtCampo3="Materia";
$VLtxtCampo4="Curso";
$VLtxtCampo5="Estado";
$VLtxtCampo6="Sigla";
$VLQryCampo1="curcodigo";
$VLQryCampo2="curdescripcion";
$VLQryCampo3="curorden";
$VLQryCampo4="curobservacion";
$VLQryCampo5="curestado";
$VLQryCampo6="cursigla";
$VLQry1=" insert into crs ( ";
$VLQry1.="curdescripcion,curorden,";
$VLQry1.="curobservacion,cursigla,curestado) ";
$VLQry1.=" values ( ";
$VLQry2="update crs set  ";
$VLQry3=" where curcodigo=";
$VLQry4.="delete from crs ";
$VLQry5=")";
$VLQry6="Select * from crs ";
$VLQry7= " order by curorden ";
$VLQry8="Select * from grp ";
$VLQry9= "where";

$VLConexion=connect();
$Query = "Select * from nlctv where anocodigo= ".$VLAnoLocal;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);

if ( $VLnuDatos>0 )
{
				$VLdtPeriodo=get_result($VLdtDatos,0,"anodescripcion");
}

if ( $VLNuevo != "")
{
	$vlccn="nuevo";
} 
if ( $VLGuardar != "")
{
	$vlccn="guardar";
} 
if ( $VLModificar != "")
{
	$vlccn="modificar";
} 
if ( $VLBuscar != "")
{
	$vlccn="buscar";
} 
if ( $VLImprimir != "")
{
	$vlccn="imprimir";
} 
if ( $VLEliminar != "")
{
	$vlccn="eliminar";
} 

/////////////////  CONSULTAMOS ESPECIALIDAD / CURSO / PARALELO / MATERIA / QUIMESTRE / PARCIAL
	$VtQueryE=" Select espsiglas from spcldd where espcodigo=".$VLdtCamp1;
	$VtQueryC=" Select curdescripcion from crs where curcodigo=".$VLdtCamp9;
	$VtQueryP=" Select pardescripcion from prll where parcodigo=".$VLdtCamp8;
	$VtQueryQ=" Select quidescripcion, quitipo from qmstr where quicodigo=".$VLdtCamp6." order by quiorden";
	$VtQueryM=" Select m.matdescripcion, m.matcodigo, m.matnoconsecutivo, m.mattipo, m.famcodigo from mtr m,";
	$VtQueryM.=" grpmtr gm, grp g where m.matestado=1 and not m.mattipo=5 and m.matcodigo=gm.matcodigo  ";
	$VtQueryM.=" and gm.grucodigo=g.grucodigo and g.anocodigo=".$VLAnoLocal." and g.curcodigo=".$VLdtCamp9;
	$VtQueryM.=" and gm.gmestado=1 and g.espcodigo=".$VLdtCamp1;
	$VtQueryM.=" order by m.mattipo, m.matnoconsecutivo";
	
	$VtQueryRp="SELECT e.perapellidos, e.pernombres, q.quicodigo, q.quiorden,
q.quidescripcion, qd.dtqmcodigo, qd.quipromparcial, 
qd.quiequivalencia80, qd.quiexamen, qd.quiequivalencia20, 
qd.quipromquimestre, m.matdescripcion, m.matcodigo,
m.matnoconsecutivo, m.mattipo, m.famcodigo, mt.mtrestado, mt.mtrno
FROM qmstr q, qmstrdtll qd, psn e,
nsttcnstdnt ei, mtrcl mt, mtr m, grp g, grpmtr gm
WHERE 
gm.gmestado=1
and gm.matcodigo=m.matcodigo 
and gm.grucodigo=g.grucodigo
and q.quicodigo = qd.quicodigo 
and qd.matcodigo=m.matcodigo
and qd.mtrno=mt.mtrno
and mt.inescodigo=ei.inescodigo
and ei.percodigo = e.percodigo
and mt.grucodigo=g.grucodigo
and q.inscodigo=".$VLInstitucion."
and q.anocodigo=".$VLAnoLocal."
and q.quicodigo=".$VLdtCamp6."
and mt.parcodigo=".$VLdtCamp8."
and g.curcodigo=".$VLdtCamp9."
and g.espcodigo=".$VLdtCamp1."
and not m.mattipo=5
order by q.quiorden, e.perapellidos, e.pernombres,
m.mattipo, m.matnoconsecutivo, m.matdescripcion";
	
	
	$VLdtDatosM = execute_query($VtQueryM,$VLConexion);
	$VLnuDatosM = total_records($VLdtDatosM);
	$VTMatFamilia=get_result($VLdtDatosM,0,"m.famcodigo");

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

	$VLdtDatosQ = execute_query($VtQueryQ,$VLConexion);
	$VLnuDatosQ = total_records($VLdtDatosQ);
	if ( $VLnuDatosQ>0 )
	{
		$VtQuimestre=get_result($VLdtDatosQ,0,"quidescripcion");
		$VtQuiTipo=get_result($VLdtDatosQ,0,"quitipo");
	}
	
	$VLdtDatosRp = execute_query($VtQueryRp,$VLConexion);
	$VLnuDatosRp = total_records($VLdtDatosRp);	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CUADRO DE CALIFICACIONES QUIMESTRALES PARA JUNTAS DE CURSO</title>
</head>

<body>
<form id="RAG" name="RAG" method="get" action="">

<table width="1700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><img src="../imagenes/membrete2.png" width="779" height="142" /></td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><font size="+1"> 
         <? if ($VtQuiTipo==0){ ?> CUADRO RESUMEN PARA JUNTA DE CURSOS <? } else { ?> SABANA DE CALIFICACIONES - PROMEDIO ANUAL <? } ?></font>  </td>
      </tr>
      <tr>
        <td align="center"><font size="+1"> <? echo $VtEspecialidad." ".$VtCurso." ".$VtParalelo." - ".$VtQuimestre; ?>  </font></td>
      </tr>
      <tr>
        <td align="center"><font size="+1"> AÑO LECTIVO <? echo $VLdtPeriodo; ?> </font> </td>
      </tr>
    </table>
	</td>
  </tr>
  <TR>
  <TD>&nbsp;</TD>
  </TR>
  <tr>
      <td>&nbsp;</td>
  </tr>

<?php 
  //////////////////// PARA REPORTES QUIMESTRALES		
	if ($VtQuiTipo==0)
	{
?>

  <tr>
  <td>
 <table border="1">
 
 
  <tr>
    <td width="25" rowspan="2" align="center"><font size="-1">No.</font></td>
    <td width="250" rowspan="2" align="center"><font size="-1">APELLIDOS Y NOMBRES</font></td>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMateria=get_result($VLdtDatosM,$k,"m.matdescripcion");
		$VTMatCodigo[$k]=get_result($VLdtDatosM,$k,"m.matcodigo");
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		$VTSumaPQ[$k]=0;
		$VTFrec10[$k]=0;
		$VTFrec8[$k]=0;
		$VTFrec6[$k]=0;
		$VTFrec4[$k]=0;
		
?>    
    <td  width="90" <? if( $VTMattipo[$k]==3 ){ ?> colspan="1"  <? } else {  ?> colspan="3" <? } ?> align="center"><font size="-2"><? echo ($VTMateria); ?></font></td>
<?php
	}
?>   
	<td width="30"> PGQ </td> 
  </tr>
  <tr>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		if( $VTMattipo[$k] == 1 ) {
?>    
    <td align="center" width="30"><font size="-2">P. P.</font></td>
    <td align="center" width="30"><font size="-2">EXAM.</font></td>
    <td align="center" width="30"><font size="-2">P. Q.</font></td>
<?php
		}
		if( $VTMattipo[$k] == 2 ) {
?>    
    <td align="center" width="30"><font size="-2">P. P.</font></td>
    <td align="center" width="30"><font size="-2">EXAM.</font></td>
    <td align="center" width="30"><font size="-2">P. Q.</font></td>
<?php
		}
		if( $VTMattipo[$k] == 3 ) {
?>    
    <td align="center" width="30"><font size="-2">A.Jta.</font></td>
<?php
		}
		if( $VTMattipo[$k] == 4 ) {
?>    
    <td align="center" width="30"><font size="-2">F.J.</font></td>
    <td align="center" width="30"><font size="-2">F.I.</font></td>
    <td align="center" width="30"><font size="-2">Atr.</font></td><?php
			
		}
		
	}
?> 
	<td align="center" width="30"><font size="-2">&nbsp;</font></td>   
  </tr>
  
<?php

	$j=0;
	$x=0;
	$m=0;
	$VTEPromG=0;
	$VTMPromG=0;
	$VTEDiv=0;
	$VTMDiv=0;
	for( $i=0; $i< $VLnuDatosRp ; $i++)
	{
		if( $i==0 )
		{ 
			$VTdMtrnoant=get_result($VLdtDatosRp,$i,"mt.mtrno");
			$VTMateriaCero=0;
		}
		
			$VTdMtrno=get_result($VLdtDatosRp,$i,"mt.mtrno");
			$VTdApellido=get_result($VLdtDatosRp,$i,"e.perapellidos");
			$VTdNombre=get_result($VLdtDatosRp,$i,"e.pernombres");
			$VTdMatcodigo=get_result($VLdtDatosRp,$i,"m.matcodigo");
			$VTdMattipo=get_result($VLdtDatosRp,$i,"m.mattipo");
			$VTdfamcodigo=get_result($VLdtDatosRp,$i,"m.famcodigo");
			$VTParcial=get_result($VLdtDatosRp,$i,"qd.quipromparcial");
			$VTExamen=get_result($VLdtDatosRp,$i,"qd.quiexamen");
			$VTEquiv20=get_result($VLdtDatosRp,$i,"qd.quiequivalencia20");
			$VTPromedio=get_result($VLdtDatosRp,$i,"qd.quipromquimestre");
			$VLMtrEstado=get_result($VLdtDatosRp,$i,"mt.mtrestado");

			switch ($VLMtrEstado) {
			case "1":
			$VLdtColor="#000000";
			$VLdtObserv="&nbsp;";
				break 1; 
			case "2":
			$VLdtColor="#FF0000"; 
			$VLdtObserv=" ( DESERTOR )";
				break 1;
			case "3":
			$VLdtColor="#FF0000"; 
			$VLdtObserv=" ( RETIRADO )";
			default: 
			}

		if( $i==0)
		{
			$j++;
			$m=1;
			if($VLMtrEstado==1)
			{
			////////// para el caso de ser un estudiante activo
				if ($VTPromedio>0 )
				{
					$x++;
					//$VTMateriaCero++; // EN CASO DE QUE LA MATERIA NO TENGA PROMEDIO SE LA RESTA DEL NUMERO DE MATERIAS	
				}

			}
?>  
  <tr>
    <td align="right"><? echo $j; ?></td>
    <td align="left"><font size="-1" color="<? echo $VLdtColor; ?>" face="Arial Narrow, Arial"><? echo ($VTdApellido." ".$VTdNombre." ".$VLdtObserv); ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial"><? 
	if ( $VTdfamcodigo<4 )
	{
		switch ($VTParcial) {
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
	} else {
	 echo number_format($VTParcial,2); } ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial"><? 
	if ( $VTdfamcodigo<4  )
	{
		switch ($VTExamen) {
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
	} else {
	echo number_format($VTExamen,2); } ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial" <? if($VTPromedio<7) { ?> color="#FF0000" <? } else { ?> color="#0000FF" <? } ?> ><b><?  
	if ( $VTdfamcodigo<4  )
	{
		$z=0;
		$PA=0;
		$PEP=0;
		$PI=0;
		switch ($VTPromedio) {
			case "0":
			echo "NR";
			break;
			case "9":
			echo "A";
			$VTFrec10[$z]++;
			$PA++;
			break;
			case "7":
			echo "EP";
			$VTFrec8[$z]++;
			$PEP++;
			break;
			case "5":
			echo "I";
			$VTFrec6[$z]++;
			$PI++;
			break;
			case "4":
			echo "N/E";
			$VTFrec4[$z]++;
			break;
			}
			
	} else {
	echo number_format($VTPromedio,2); 
	$VTEPromG=$VTPromedio; 
	
	$VTEDiv=1; 
		if($VLMtrEstado==1)
		{
		////////// para el caso de ser un estudiante activo
		///////// primera materia
			$z=0;
			$VTSumaPQ[$z]=$VTSumaPQ[$z]+$VTPromedio;
			if ($VTPromedio>=9)
			{
				$VTFrec10[$z]++;
			} else {
				if ($VTPromedio>=7)
				{
					$VTFrec8[$z]++;
				} else {
					if ($VTPromedio>=5)
					{
						$VTFrec6[$z]++;
					} else {
						$VTFrec4[$z]++;
					}
				}
			}
		}
	
	}?></b></font></td>
  
  
<?php
			
		} else {
		
		if( $VTdMtrnoant!=$VTdMtrno )
		{
			$j++;
			$m=1;
			$VTdMtrnoant=$VTdMtrno;
			if($VLMtrEstado==1)
			{
			////////// para el caso de ser un estudiante activo sumamos una materia
				if ($VTPromedio>0 )
				{
					$x++;
				}
				
			}
?>  
  <tr>
    <td align="right"><? echo $j; ?></td>
    <td align="left"><font size="-1" face="Arial Narrow, Arial" color="<? echo $VLdtColor; ?>"><? echo ($VTdApellido." ".$VTdNombre." ".$VLdtObserv); ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial"><?  
	if ( $VTdfamcodigo<4  )
	{
		switch ($VTParcial) {
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
	} else {
	 echo number_format($VTParcial,2); } ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial"><?  
	if ( $VTdfamcodigo<4  )
	{
		switch ($VTExamen) {
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
	} else {
	echo number_format($VTExamen,2); } ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial" <? if($VTPromedio<7) { ?> color="#FF0000" <? } else { ?> color="#0000FF" <? } ?> ><b><?   
	if ( $VTdfamcodigo<4  )
	{
		$z=0;
		$PA=0;
		$PEP=0;
		$PI=0;
		switch ($VTPromedio) {
			case "0":
			echo "NR";
			break;
			case "9":
			echo "A";
			$VTFrec10[$z]++;
			$PA++;
			break;
			case "7":
			echo "EP";
			$VTFrec8[$z]++;
			$PEP++;
			break;
			case "5":
			echo "I";
			$VTFrec6[$z]++;
			$PI++;
			break;
			case "4":
			echo "N/E";
			$VTFrec4[$z]++;
			break;
			}
	} else {
	echo number_format($VTPromedio,2); 
	$VTEPromG=$VTPromedio; 
	$VTEDiv=1; 
			if($VLMtrEstado==1)
			{
			////////// para el caso de ser un estudiante activo
			///////// primera materia
				$z=0;
				$VTSumaPQ[$z]=$VTSumaPQ[$z]+$VTPromedio;
				if ($VTPromedio>=9)
				{
					$VTFrec10[$z]++;
				} else {
					if ($VTPromedio>=7)
					{
						$VTFrec8[$z]++;
					} else {
						if ($VTPromedio>=5)
						{
							$VTFrec6[$z]++;
						} else {
							$VTFrec4[$z]++;
						}
					}
				}
			}
	
	} ?></b></font></td>
 
  
<?php
		}else {
			
			if ( $VTdMattipo==1){
?>		
    <td align="right"><font size="-1" face="Arial Narrow, Arial"><?  
	if ( $VTdfamcodigo<4  )
	{
		switch ($VTParcial) {
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
	} else {
	 echo number_format($VTParcial,2); } ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial"><?   
	if ( $VTdfamcodigo<4  )
	{
		switch ($VTExamen) {
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
	} else {
	echo number_format($VTExamen,2); } ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial" <? if($VTPromedio<7) { ?> color="#FF0000" <? } else { ?> color="#0000FF" <? } ?> ><B><?   
	if ( $VTdfamcodigo<4  )
	{
		$z++;
		switch ($VTPromedio) {
			case "0":
			echo "NR";
			break;
			case "9":
			echo "A";
			$VTFrec10[$z]++;
			$PA++;
			break;
			case "7":
			echo "EP";
			$VTFrec8[$z]++;
			$PEP++;
			break;
			case "5":
			echo "I";
			$VTFrec6[$z]++;
			$PI++;
			break;
			case "4":
			echo "N/E";
			$VTFrec4[$z]++;
			break;
			}
	} else {
	echo number_format($VTPromedio,2);
	if ( $VTPromedio>0)
	{
		$VTEPromG= $VTEPromG + $VTPromedio; 
		$VTEDiv= $VTEDiv + 1;
	}
	if($VLMtrEstado==1)
	{
	////////// para el caso de ser un estudiante activo
	///////// resto de materias
		$z++;
		$VTSumaPQ[$z]=$VTSumaPQ[$z]+$VTPromedio;
		if ($VTPromedio>=9)
		{
			$VTFrec10[$z]++;
		} else {
			if ($VTPromedio>=7)
			{
				$VTFrec8[$z]++;
			} else {
				if ($VTPromedio>=5)
				{
					$VTFrec6[$z]++;
				} else {
					$VTFrec4[$z]++;
				}
			}
		}
		
	}
	
	 } ?></b></font></td>
	
<?php
			}
			if ( $VTdMattipo==2){
?>		
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><? 
	
		if( $VTParcial>8.99 && $VTParcial<11)
		{
			echo "EX";
		}
		if( $VTParcial>6.99 && $VTParcial<9)
		{
			echo "MB";
		}
		if( $VTParcial>4.99 && $VTParcial<7)
		{
			echo "B";
		}
		if( $VTParcial>0 && $VTParcial<5)
		{
			echo "R";
		}
		if( $VTParcial==0)
		{
			echo "NR";
		}
	 ?></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><? 
	
		if( $VTExamen>8.99 && $VTExamen<11)
		{
			echo "EX";
		}
		if( $VTExamen>6.99 && $VTExamen<9)
		{
			echo "MB";
		}
		if( $VTExamen>4.99 && $VTExamen<7)
		{
			echo "B";
		}
		if( $VTExamen>0 && $VTExamen<5)
		{
			echo "R";
		}
		if( $VTExamen==0)
		{
			echo "NR";
		}	
		?></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><? 
		if( $VTPromedio>8.99 && $VTPromedio<11)
		{
			echo "EX";
		}
		if( $VTPromedio>6.99 && $VTPromedio<9)
		{
			echo "MB";
		}
		if( $VTPromedio>4.99 && $VTPromedio<7)
		{
			echo "B";
		}
		if( $VTPromedio>0 && $VTPromedio<5)
		{
			echo "R";
		}
		if( $VTPromedio==0)
		{
			echo "NR";
		}
		 ?></font></td>
	
<?php
			}
			if ( $VTdMattipo==3){
?>		
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><? 
	
switch ($VTPromedio) {
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
			} ?></font></td>
<?php
			}
			
			if ( $VTdMattipo==4){
?>		
    <td align="center"><font size="-1" face="Arial Narrow, Arial" ><? if ($VTParcial>0){ echo $VTParcial; } else { ?>&nbsp;<? } ?></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><? if ($VTExamen>0){ echo $VTExamen; } else { ?>&nbsp;<? } ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial"><? if ($VTEquiv20>0){ echo $VTEquiv20; } else { ?>&nbsp;<? } ?></font></td>

    <td align="right"><font size="-1" face="Arial Narrow, Arial" <?PHP	if ($VTEDiv>0)	{ if ($VTEPromG/$VTEDiv <7 ){?> color="#FF0000" <? } else { ?> color="#009900" <? }} ?>><b>
	<? 
	if ( $VTdfamcodigo<4  )
	{
		if ( $PA>=$PEP) { if ($PA>=$PI) { echo "A"; } else { echo "I"; }} else { if ($PEP>= $PI) { echo "EP"; } else { echo "I"; }}
	} else {
	if ($VTEDiv>0){ echo number_format($VTEPromG/$VTEDiv,2); } else { ?>
    &nbsp;
	<? } } ?>
    
    </b></font></td>
	
<?php
			}
			
			if ($m==$VLnuDatosM)
			{
				//////////////// imprimimos el fin de fila
?> 				
	</tr>						
<?php
				
			}
			
		}
		}
	}
?>  

  <tr>
    <td width="25" rowspan="1" align="center"><font size="-1">&nbsp;</font></td>
    <td width="250" rowspan="1" align="center"><font size="-1">PROMEDIO</font></td>
<?php
	$VtPrGC=0;
	$VtPNum=0;
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
//////////////////////// CONFIRMAMOS EL TIPO DE MATERIA ///////
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
//////////////////////// CONFIRMAMOS EL CURSO //////////////////////		
		if( $VTMattipo[$k] == 1 ) {
			
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-1" color="#000066"><B><? if ( $x>0 ) {
	if ($VTMatFamilia<4 )
	{
		if ($VTFrec10[$k]>=$VTFrec8[$k]){ 
			if ($VTFrec10[$k]>=$VTFrec6[$k]) { echo "A";} else { echo "I"; } 
			} else { 
				if ($VTFrec8[$k]>=$VTFrec6[$k]) { echo "EP";} else { echo "I"; }
			}
	} else { echo number_format($VTSumaPQ[$k]/$x,2);
		$VtPMat=$VTSumaPQ[$k]/$x;
		$VtPNum=$VtPNum+1;
		$VtPrGC=$VtPrGC+$VtPMat;
	 }
	}?></B></font></td>
<?php
		}
		if( $VTMattipo[$k] == 2 ) {
			
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
			
		}
		if( $VTMattipo[$k] == 3 ) {
			
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
			
		}
		if( $VTMattipo[$k] == 4 ) {
			
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    
<?php
			
		}
		
	}
?> 
	<td align="center" width="30"><font  size="-1" color="#003300"><b>
<?php    
////////////////////////////////////  PONEMOS EL PROMEDIO GENERAL DEL CURSO    
	if($VtPNum>0)
	{
		echo number_format($VtPrGC/$VtPNum,2);
	}
	
?></b></font></td>   
  </tr>
</table>
 
  
  
  </td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
  <tr> 
  <td>
  <table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
  </td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><font size="+1" face="Arial Narrow, Arial"> CUADRO DE FRECUENCIAS PARA JUNTA DE CURSOS </font>  </td>
      </tr>
      <tr>
        <td align="center"><font size="+1" face="Arial Narrow, Arial"> <? echo $VtEspecialidad." ".$VtCurso." ".$VtParalelo." - ".$VtQuimestre; ?>  </font></td>
      </tr>
      <tr>
        <td align="center"><font size="+1" face="Arial Narrow, Arial"> AÑO LECTIVO <? echo $VLdtPeriodo; ?> </font> </td>
      </tr>
    </table>
	</td>
  </tr>
  <TR>
  <TD>&nbsp;</TD>
  </TR>  <tr>
    <td>

<table border="1">
  <tr>
    <td width="25" rowspan="2" align="center"><font size="-1">&nbsp;</font></td>
    <td width="250" rowspan="2" align="center"><font size="-1" face="Arial Narrow, Arial">DETALLE FRECUENCIA</font></td>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMateria=get_result($VLdtDatosM,$k,"m.matdescripcion");
		$VTMatCodigo[$k]=get_result($VLdtDatosM,$k,"m.matcodigo");
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");		
?>    
    <td  width="90" <? if( $VTMattipo[$k]==3 ){ ?> colspan="1"  <? } else {  ?> colspan="3" <? } ?> align="center"><font size="-2" face="Arial Narrow, Arial"><? echo ($VTMateria); ?></font></td>
<?php
	}
?>   
	<td width="30"> PGQ </td> 
  </tr>
  <tr>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		if( $VTMattipo[$k] == 1 ) {
?>    
    <td align="center" width="30"><font size="-2">P. P.</font></td>
    <td align="center" width="30"><font size="-2">EXAM.</font></td>
    <td align="center" width="30"><font size="-2">P. Q.</font></td>
<?php
		}
		if( $VTMattipo[$k] == 2 ) {
			
?>    
    <td align="center" width="30"><font size="-2">P. P.</font></td>
    <td align="center" width="30"><font size="-2">EXAM.</font></td>
    <td align="center" width="30"><font size="-2">P. Q.</font></td>
<?php
			
		}
		if( $VTMattipo[$k] == 3 ) {
			
?>    
    <td align="center" width="30"><font size="-2">A.Jta.</font></td>
<?php
			
		}
		if( $VTMattipo[$k] == 4 ) {
			
?>    
    <td align="center" width="30"><font size="-2">F.J.</font></td>
    <td align="center" width="30"><font size="-2">F.I.</font></td>
    <td align="center" width="30"><font size="-2">Atr.</font></td>
    
<?php
			
		}
		
	}
?> 
	<td align="center" width="30"><font size="-2">&nbsp;</font></td>   
  </tr>
  <tr>
    <td width="25"  align="center"><font size="-1"><? if ($VTMatFamilia<4 )
	{ ?> A <? } else { ?> 9-10 <? } ?></font></td>
    <td width="250"  align="center"><font size="-1" face="Arial Narrow, Arial"><? if ($VTMatFamilia<4 )
	{ ?> ALCANZA APRENDIZAJE <? } else { ?> DOMINA LOS APRENDIZAJES <? } ?></font></td>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		if( $VTMattipo[$k] == 1 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $VTFrec10[$k]; ?></font></td>
<?php
		}
		if( $VTMattipo[$k] == 2 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 3 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 4 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    
<?php
		}
	}
?> 
	<td align="center" width="30"><font size="-2">&nbsp;</font></td>   
  </tr>
  <tr>
    <td width="25"  align="center"><font size="-1" face="Arial Narrow, Arial"><? if ($VTMatFamilia<4 )
	{ ?> EP <? } else { ?> 7-8 <? } ?></font></td>
    <td width="250"  align="center"><font size="-1" face="Arial Narrow, Arial"><? if ($VTMatFamilia<4 )
	{ ?> EN PROCESO DE APRENDIZAJE <? } else { ?> ALCANZA LOS APRENDIZAJES <? } ?></font></td>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		if( $VTMattipo[$k] == 1 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $VTFrec8[$k]; ?></font></td>
<?php
		}
		if( $VTMattipo[$k] == 2 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 3 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 4 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
	}
?> 
	<td align="center" width="30"><font size="-2">&nbsp;</font></td>   
  </tr>
  <tr>
    <td width="25"  align="center"><font size="-1" face="Arial Narrow, Arial"><? if ($VTMatFamilia<4 )
	{ ?> I <? } else { ?> 5-6 <? } ?></font></td>
    <td width="250"  align="center"><font size="-2" face="Arial Narrow, Arial"><? if ($VTMatFamilia<4 )
	{ ?><font size="-1" face="Arial Narrow, Arial"> INICIA APRENDIZAJE <? } else { ?><font size="-2" face="Arial Narrow, Arial"> ESTA PROXIMO A ALCANZAR LOS APRENDIZAJES<? } ?></font></td>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		if( $VTMattipo[$k] == 1 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="2"><? echo $VTFrec6[$k]; ?></font></td>
<?php
		}
		if( $VTMattipo[$k] == 2 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 3 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 4 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
	}
?> 
	<td align="center" width="30"><font size="-2">&nbsp;</font></td>   
  </tr>
  <tr>
    <td width="25"  align="center"><font size="-1" face="Arial Narrow, Arial"><? if ($VTMatFamilia<4 )
	{ ?> &nbsp; <? } else { ?> <=4 <? } ?></font></td>
    <td width="250"  align="center"><font size="-2" face="Arial Narrow, Arial"><? if ($VTMatFamilia<4 )
	{ ?> &nbsp; <? } else { ?> NO ALCANZA LOS APRENDIZAJES REQUERIDOS<? } ?></font></td>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		if( $VTMattipo[$k] == 1 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $VTFrec4[$k]; ?></font></td>
<?php
		}
		if( $VTMattipo[$k] == 2 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 3 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 4 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    
<?php
		}
	}
?> 
	<td align="center" width="30"><font size="-2">&nbsp;</font></td>   
  </tr>
  <tr>
    <td width="25"  align="center"><font size="-1">&nbsp;</font></td>
    <td width="250"  align="center"><font size="-2" face="Arial Narrow, Arial">TOTAL</font></td>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		if( $VTMattipo[$k] == 1 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="2"><? echo $x; ?></font></td>
<?php
		}
		if( $VTMattipo[$k] == 2 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 3 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 4 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    
<?php
		}
	}
?> 
	<td align="center" width="30"><font size="-2">&nbsp;</font></td>   
  </tr>
  
</table>
    </td>
  </tr>  
  
 <?php  
	} else {
  ////////////////////  PARA REPORTES DE FINAL DE AÑO
  
$VtQueryRp="SELECT e.perapellidos, e.pernombres, q.quicodigo, q.quiorden,
q.quidescripcion, qd.dtqmcodigo, qd.quipromparcial, 
qd.quiequivalencia80, qd.quiexamen, qd.quiequivalencia20, 
qd.quipromquimestre, m.matdescripcion, m.matcodigo,
m.matnoconsecutivo, m.mattipo, m.famcodigo, mt.mtrestado, mt.mtrno
FROM qmstr q, qmstrdtll qd, psn e,
nsttcnstdnt ei, mtrcl mt, mtr m, grp g, grpmtr gm
WHERE q.quicodigo = qd.quicodigo 
and qd.matcodigo=m.matcodigo
and m.matcodigo=gm.matcodigo
and not ( gm.gmestado=0 )
and gm.grucodigo=g.grucodigo
and qd.mtrno=mt.mtrno
and mt.inescodigo=ei.inescodigo
and ei.percodigo = e.percodigo
and mt.grucodigo=g.grucodigo
and q.inscodigo=".$VLInstitucion."
and q.anocodigo=".$VLAnoLocal."
and mt.parcodigo=".$VLdtCamp8."
and g.curcodigo=".$VLdtCamp9."
and g.espcodigo=".$VLdtCamp1."
and not m.mattipo=5
order by e.perapellidos, e.pernombres, m.mattipo, m.matnoconsecutivo, m.matdescripcion, q.quiorden";  


	$VLdtDatosRp = execute_query($VtQueryRp,$VLConexion);
	$VLnuDatosRp = total_records($VLdtDatosRp);	

  ?>
  <tr>
  <td>
 <table border="1">
 
 <? /////////////////////  CABECERA DEL REPORTE //////////////// ?>
  <tr>
    <td width="25" rowspan="2" align="center"><font size="-1" face="Arial Narrow, Arial">No.</font></td>
    <td width="250" rowspan="2" align="center"><font size="-1" face="Arial Narrow, Arial">APELLIDOS Y NOMBRES <?php //echo $VLnuDatosRp; ?></font></td>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMateria=get_result($VLdtDatosM,$k,"m.matdescripcion");
		$VTMatCodigo[$k]=get_result($VLdtDatosM,$k,"m.matcodigo");
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		$VTSumaPQ[$k]=0;
		$VTFrec10[$k]=0;
		$VTFrec8[$k]=0;
		$VTFrec6[$k]=0;
		$VTFrec4[$k]=0;
		$VTSumaPQI[$k]=0;
		$VTFrec10I[$k]=0;
		$VTFrec8I[$k]=0;
		$VTFrec6I[$k]=0;
		$VTFrec4I[$k]=0;
		$VTSumaPQII[$k]=0;
		$VTFrec10II[$k]=0;
		$VTFrec8II[$k]=0;
		$VTFrec6II[$k]=0;
		$VTFrec4II[$k]=0;
		
?>    
    <td  width="90" <? if( $VTMattipo[$k]==3 ){ ?> colspan="2"  <? } else {  ?> colspan="3" <? } ?> align="center"><font size="-2" face="Arial Narrow, Arial"><? echo ($VTMateria); ?></font></td>
<?php
	}
?>   
	<td width="30"> PGQ </td> 
  </tr>
  <tr>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		if( $VTMattipo[$k] == 1 ) {
?>    
    <td align="center" width="30"><font size="-2">I</font></td>
    <td align="center" width="30"><font size="-2">II</font></td>
    <td align="center" width="30"><font size="-2">P. A.</font></td>
<?php
		}
		if( $VTMattipo[$k] == 2 ) {
			
?>    
    <td align="center" width="30"><font size="-2">I</font></td>
    <td align="center" width="30"><font size="-2">II</font></td>
    <td align="center" width="30"><font size="-2">P. A.</font></td>
<?php
			
		}
		if( $VTMattipo[$k] == 3 ) {
			
?>    
    <td align="center" width="30"><font size="-2">A.Jta.</font></td>
    <td align="center" width="30"><font size="-2">DEFINITIVO</font></td>
<?php
			
		}
		if( $VTMattipo[$k] == 4 ) {
			
?>    
    <td align="center" width="30"><font size="-2">F.J.</font></td>
    <td align="center" width="30"><font size="-2">F.I.</font></td>
    <td align="center" width="30"><font size="-2">Atr.</font></td>
    
<?php
			
		}
		
	}
?> 
	<td align="center" width="30"><font size="-2">&nbsp;</font></td>   
  </tr>
  
<?php

	$j=0;
	$x=0;
	$m=0;
	$VTEPromG=0;
	$VTMPromG=0;
	$VTEDiv=0;
	$VTMDiv=0;
	for( $i=0; $i< $VLnuDatosRp ; $i++)
	{
		if( $i==0 )
		{ 
			$VTdMtrnoant=get_result($VLdtDatosRp,$i,"mt.mtrno");
		}
		
			$VTdMtrno=get_result($VLdtDatosRp,$i,"mt.mtrno");
			$VLMtrEstado=get_result($VLdtDatosRp,$i,"mt.mtrestado");
			$VTdApellido=get_result($VLdtDatosRp,$i,"e.perapellidos");
			$VTdNombre=get_result($VLdtDatosRp,$i,"e.pernombres");
			$VTdMatcodigo=get_result($VLdtDatosRp,$i,"m.matcodigo");
			$VTdMattipo=get_result($VLdtDatosRp,$i,"m.mattipo");
			$VTdfamcodigo=get_result($VLdtDatosRp,$i,"m.famcodigo");
			$VTParcial=get_result($VLdtDatosRp,$i,"qd.quipromquimestre");
			$VTExamen=get_result($VLdtDatosRp,$i+1,"qd.quipromquimestre");
			$VTPromedio=get_result($VLdtDatosRp,$i+2,"qd.quipromquimestre");
			$VTFaltasJ=get_result($VLdtDatosRp,$i+2,"qd.quipromparcial");
			$VTFaltasI=get_result($VLdtDatosRp,$i+2,"qd.quiexamen");
			$VTAtrasos=get_result($VLdtDatosRp,$i+2,"qd.quiequivalencia20");
			
			switch ($VLMtrEstado) {
			case "1":
			$VLdtColor="#000000";
			$VLdtObserv="&nbsp;";
				break 1; 
			case "2":
			$VLdtColor="#FF0000"; 
			$VLdtObserv=" ( DESERTOR )";
				break 1;
			case "3":
			$VLdtColor="#FF0000"; 
			$VLdtObserv=" ( RETIRADO )";
			default: 
			}

		if( $i==0)
		{
			$j++;
			$m=1;
			if($VLMtrEstado==1)
			{
			////////// para el caso de ser un estudiante activo
				if ($VTPromedio>0 )
				{

					$x++;
				}
			}
?>  
  <tr>
    <td align="right"><? echo $j; ?></td>
    <td align="left"><font size="-1" face="Arial Narrow, Arial" color="<? echo $VLdtColor; ?>"><? echo ($VTdApellido." ".$VTdNombre." ".$VLdtObserv); ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial"><? 
	if ( $VTdfamcodigo<4  )
	{
		switch ($VTParcial) {
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
//////////////////////////// se deberia sumar para el promedio ////////////////			
			
			
///////////////////////////////////////////////////////////////////////////////			
			
	} else {
	 echo number_format($VTParcial,2); 
	 
		if($VLMtrEstado==1)
		{
		////////// para el caso de ser un estudiante activo
		///////// primera materia
			$w=0;
			$VTSumaPQI[$w]=$VTSumaPQI[$w]+$VTParcial;
			if ($VTParcial>=9)
			{
				$VTFrec10I[$w]++;
			} else {
				if ($VTParcial>=7)
				{
					$VTFrec8I[$w]++;
				} else {
					if ($VTParcial>4)
					{
						$VTFrec6I[$w]++;
					} else {
						$VTFrec4I[$w]++;
					}
				}
			}
		}
	 
	 } ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial"><? 
	if ( $VTdfamcodigo<4  )
	{
		switch ($VTExamen) {
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
	} else {
	echo number_format($VTExamen,2);
		if($VLMtrEstado==1)
		{
		////////// para el caso de ser un estudiante activo
		///////// primera materia
			$y=0;
			$VTSumaPQII[$y]=$VTSumaPQII[$y]+$VTExamen;
			if ($VTExamen>=9)
			{
				$VTFrec10II[$y]++;
			} else {
				if ($VTExamen>=7)
				{
					$VTFrec8II[$y]++;
				} else {
					if ($VTExamen>4)
					{
						$VTFrec6II[$y]++;
					} else {
						$VTFrec4II[$y]++;
					}
				}
			}
		}
	
	 } ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial" <? if($VTPromedio<7) { ?> color="#FF0000" <? } else { ?> color="#0000FF" <? } ?> ><b><?  
	if ( $VTdfamcodigo<4  )
	{
		switch ($VTPromedio) {
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
		$i=$i+2;
		
	} else {
	echo number_format($VTPromedio,2); 
	$VTEPromG=$VTPromedio; 
	$i=$i+2;

	$VTEDiv=1; 
		if($VLMtrEstado==1)
		{
		////////// para el caso de ser un estudiante activo
		///////// primera materia
			$z=0;
			$VTSumaPQ[$z]=$VTSumaPQ[$z]+$VTPromedio;
			if ($VTPromedio>=9)
			{
				$VTFrec10[$z]++;
			} else {
				if ($VTPromedio>=7)
				{
					$VTFrec8[$z]++;
				} else {
					if ($VTPromedio>4)
					{
						$VTFrec6[$z]++;
					} else {
						$VTFrec4[$z]++;
					}
				}
			}
		}
	
	}?></b></font></td>
  
  
<?php
			
		} else {
		
		if( $VTdMtrnoant!=$VTdMtrno )
		{
			$j++;
			$m=1;
			$VTdMtrnoant=$VTdMtrno;
			if($VLMtrEstado==1)
			{
			////////// para el caso de ser un estudiante activo
				if ($VTPromedio>0 )
				{

					$x++;
				}
				
			}
?>  
  <tr>
    <td align="right"><? echo $j; ?></td>
    <td align="left"><font size="-1" face="Arial Narrow, Arial" color="<? echo $VLdtColor; ?>"><? echo ($VTdApellido." ".$VTdNombre." ".$VLdtObserv); ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial"><?  
	if ( $VTdfamcodigo<4 )
	{
		switch ($VTParcial) {
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
	} else {
	 echo number_format($VTParcial,2); 
		if($VLMtrEstado==1)
		{
		////////// para el caso de ser un estudiante activo
		///////// primera materia
			$w=0;
			$VTSumaPQI[$w]=$VTSumaPQI[$w]+$VTParcial;
			if ($VTParcial>=9)
			{
				$VTFrec10I[$w]++;
			} else {
				if ($VTParcial>=7)
				{
					$VTFrec8I[$w]++;
				} else {
					if ($VTParcial>4)
					{
						$VTFrec6I[$w]++;
					} else {
						$VTFrec4I[$w]++;
					}
				}
			}
		}
	 
	 } ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial"><?  
	if ( $VTdfamcodigo<4 )
	{
		switch ($VTExamen) {
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
	} else {
	echo number_format($VTExamen,2); 
		if($VLMtrEstado==1)
		{
		////////// para el caso de ser un estudiante activo
		///////// primera materia
			$y=0;
			$VTSumaPQII[$y]=$VTSumaPQII[$y]+$VTExamen;
			if ($VTExamen>=9)
			{
				$VTFrec10II[$y]++;
			} else {
				if ($VTExamen>=7)
				{
					$VTFrec8II[$y]++;
				} else {
					if ($VTExamen>4)
					{
						$VTFrec6II[$y]++;
					} else {
						$VTFrec4II[$y]++;
					}
				}
			}
		}
	
	} ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial" <? if($VTPromedio<7) { ?> color="#FF0000" <? } else { ?> color="#0000FF" <? } ?> ><b><?   
	if ( $VTdfamcodigo<4 )
	{
		switch ($VTPromedio) {
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
		$i=$i+2;
	} else {
	echo number_format($VTPromedio,2); 
	$VTEPromG=$VTPromedio; 
	$i=$i+2;	
	$VTEDiv=1; 
			if($VLMtrEstado==1)
			{
			////////// para el caso de ser un estudiante activo
			///////// primera materia
				$z=0;
				$VTSumaPQ[$z]=$VTSumaPQ[$z]+$VTPromedio;
				if ($VTPromedio>=9)
				{
					$VTFrec10[$z]++;
				} else {
					if ($VTPromedio>=7)
					{
						$VTFrec8[$z]++;
					} else {
						if ($VTPromedio>4)
						{
							$VTFrec6[$z]++;
						} else {
							$VTFrec4[$z]++;
						}
					}
				}
			}
	
	} ?></b></font></td>
 
  
<?php
		}else {
			
			if ( $VTdMattipo==1){
?>		
    <td align="right"><font size="-1" face="Arial Narrow, Arial"><?  
	if ( $VTdfamcodigo<4 )
	{
		switch ($VTParcial) {
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
	} else {
	 echo number_format($VTParcial,2); 
	if($VLMtrEstado==1)
	{
	////////// para el caso de ser un estudiante activo
	///////// resto de materias
		$w++;
		$VTSumaPQI[$w]=$VTSumaPQI[$w]+$VTParcial;
		if ($VTParcial>=9)
		{
			$VTFrec10I[$w]++;
		} else {
			if ($VTParcial>=7)
			{
				$VTFrec8I[$w]++;
			} else {
				if ($VTParcial>4)
				{
					$VTFrec6I[$w]++;
				} else {
					$VTFrec4I[$w]++;
				}
			}
		}
		
	}	 
	 } ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial"><?   
	if ( $VTdfamcodigo<4 )
	{
		switch ($VTExamen) {
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
	} else {
	echo number_format($VTExamen,2); 
	
	if($VLMtrEstado==1)
	{
	////////// para el caso de ser un estudiante activo
	///////// resto de materias
		$y++;
		$VTSumaPQII[$y]=$VTSumaPQII[$y]+$VTExamen;
		if ($VTExamen>=9)
		{
			$VTFrec10II[$y]++;
		} else {
			if ($VTExamen>=7)
			{
				$VTFrec8II[$y]++;
			} else {
				if ($VTExamen>4)
				{
					$VTFrec6II[$y]++;
				} else {
					$VTFrec4II[$y]++;
				}
			}
		}
		
	}
	
	} ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial" <? if($VTPromedio<7) { ?> color="#FF0000" <? } else { ?> color="#0000FF" <? } ?> ><B><?   
	if ( $VTdfamcodigo<4 )
	{
		switch ($VTPromedio) {
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
		$i=$i+2;
	} else {
	echo number_format($VTPromedio,2);
	$VTEPromG= $VTEPromG + $VTPromedio; 
	$i=$i+2;
	$VTEDiv= $VTEDiv + 1;
	if($VLMtrEstado==1)
	{
	////////// para el caso de ser un estudiante activo
	///////// resto de materias
		$z++;
		$VTSumaPQ[$z]=$VTSumaPQ[$z]+$VTPromedio;
		if ($VTPromedio>=9)
		{
			$VTFrec10[$z]++;
		} else {
			if ($VTPromedio>=7)
			{
				$VTFrec8[$z]++;
			} else {
				if ($VTPromedio>4)
				{
					$VTFrec6[$z]++;
				} else {
					$VTFrec4[$z]++;
				}
			}
		}
		
	}
	
	 } ?></b></font></td>
	
<?php
			}
			if ( $VTdMattipo==2){
?>		
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><? 
	
		if( $VTParcial>8.99 && $VTParcial<11)
		{
			echo "EX";
		}
		if( $VTParcial>6.99 && $VTParcial<9)
		{
			echo "MB";
		}
		if( $VTParcial>4.99 && $VTParcial<7)
		{
			echo "B";
		}
		if( $VTParcial>0 && $VTParcial<5)
		{
			echo "R";
		}
		if( $VTParcial==0)
		{
			echo "NR";
		}
	 ?></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><? 
	
		if( $VTExamen>8.99 && $VTExamen<11)
		{
			echo "EX";
		}
		if( $VTExamen>6.99 && $VTExamen<9)
		{
			echo "MB";
		}
		if( $VTExamen>4.99 && $VTExamen<7)
		{
			echo "B";
		}
		if( $VTExamen>0 && $VTExamen<5)
		{
			echo "R";
		}
		if( $VTExamen==0)
		{
			echo "NR";
		}	
		?></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><? 
		if( $VTPromedio>8.99 && $VTPromedio<11)
		{
			echo "EX";
		}
		if( $VTPromedio>6.99 && $VTPromedio<9)
		{
			echo "MB";
		}
		if( $VTPromedio>4.99 && $VTPromedio<7)
		{
			echo "B";
		}
		if( $VTPromedio>0 && $VTPromedio<5)
		{
			echo "R";
		}
		if( $VTPromedio==0)
		{
			echo "NR";
		}
		$i=$i+2; 
		 ?></font></td>
	
<?php
			}
			if ( $VTdMattipo==3){
?>		
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><? 
	
switch ($VTPromedio) {
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
			
			$i=$i+2;
			?></font></td>
    <td align="right">&nbsp;</td>
<?php
			}
			
			if ( $VTdMattipo==4){
?>		
    <td align="center"><font size="-1" face="Arial Narrow, Arial" ><? if ($VTFaltasJ>0){ echo $VTFaltasJ; } else { ?>&nbsp;<? } ?></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial" ><? if ($VTFaltasI>0){ echo $VTFaltasI; } else { ?>&nbsp;<? } ?></font></td>
    <td align="center"><font size="-1" face="Arial Narrow, Arial"><? if ($VTAtrasos>0){ echo $VTAtrasos; } else { ?>&nbsp;<? } 
	$i=$i+2;
	 ?></font></td>
    <td align="right"><font size="-1" face="Arial Narrow, Arial" <?PHP
	if ($VTEDiv>0)
	{
		if ($VTEPromG/$VTEDiv <7 ){
	?> color="#FF0000" <? } else { ?> color="#009900" <? }} ?>><b><? if ($VTEDiv>0){ echo number_format($VTEPromG/$VTEDiv,2); } else { ?>&nbsp;<? } ?></b></font></td>
	
<?php
			}
			
			if ($m==$VLnuDatosM)
			{
				//////////////// imprimimos el fin de fila
?> 				
	</tr>						
<?php
				
			}
			
		}
		}
	}
?>  

  <tr>
    <td width="25" rowspan="1" align="center"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
    <td width="250" rowspan="1" align="center"><font size="-1" face="Arial Narrow, Arial">PROMEDIO</font></td>
<?php
	$VtPrGC=0;
	$VtPNum=0;
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		if( $VTMattipo[$k] == 1 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-1" face="Arial Narrow, Arial" color="#000066"><B><? if ( $x>0 ) { echo number_format($VTSumaPQ[$k]/$x,2); 
	$VtPMat=$VTSumaPQ[$k]/$x;
	$VtPNum=$VtPNum+1;
	$VtPrGC=$VtPrGC+$VtPMat;
	} ?></B></font></td>
<?php
		}
		if( $VTMattipo[$k] == 2 ) {
			
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
			
		}
		if( $VTMattipo[$k] == 3 ) {
			
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
			
		}
		if( $VTMattipo[$k] == 4 ) {
			
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    
<?php
			
		}
	}
?> 
	<td align="center" width="30"><font size="-2" color="#006600">
<?php    
////////////////////////////////////  PONEMOS EL PROMEDIO GENERAL DEL CURSO    
	if($VtPNum>0)
	{
		echo number_format($VtPrGC/$VtPNum,2);
	}
	
?>
   &nbsp;</font></td>   
  </tr>
</table>
 
  
  
  </td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
  <tr> 
  <td>
  <table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
  </td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><font size="+1" face="Arial Narrow, Arial"> CUADRO DE FRECUENCIAS PARA JUNTA DE CURSOS </font>  </td>
      </tr>
      <tr>
        <td align="center"><font size="+1" face="Arial Narrow, Arial"> <? echo $VtEspecialidad." ".$VtCurso." ".$VtParalelo." - ".$VtQuimestre; ?>  </font></td>
      </tr>
      <tr>
        <td align="center"><font size="+1" face="Arial Narrow, Arial"> AÑO LECTIVO <? echo $VLdtPeriodo; ?> </font> </td>
      </tr>
    </table>
	</td>
  </tr>
  <TR>
  <TD>&nbsp;</TD>
  </TR>  <tr>
    <td>

<table border="1">
  <tr>
    <td width="25" rowspan="2" align="center"><font size="-1" face="Arial Narrow, Arial">&nbsp;</font></td>
    <td width="250" rowspan="2" align="center"><font size="-1" face="Arial Narrow, Arial">DETALLE FRECUENCIA</font></td>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMateria=get_result($VLdtDatosM,$k,"m.matdescripcion");
		$VTMatCodigo[$k]=get_result($VLdtDatosM,$k,"m.matcodigo");
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");		
?>    
    <td  width="90" <? if( $VTMattipo[$k]==3 ){ ?> colspan="2"  <? } else {  ?> colspan="3" <? } ?> align="center"><font size="-2"><? echo ($VTMateria); ?></font></td>
<?php
	}
?>   
	<td width="30"> PGQ </td> 
  </tr>
  <tr>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		if( $VTMattipo[$k] == 1 ) {
?>    
    <td align="center" width="30"><font size="-2">I</font></td>
    <td align="center" width="30"><font size="-2">II</font></td>
    <td align="center" width="30"><font size="-2">P.A.</font></td>
<?php
		}
		if( $VTMattipo[$k] == 2 ) {
			
?>    
    <td align="center" width="30"><font size="-2">I</font></td>
    <td align="center" width="30"><font size="-2">II</font></td>
    <td align="center" width="30"><font size="-2">P.A.</font></td>
<?php
			
		}
		if( $VTMattipo[$k] == 3 ) {
			
?>    
    <td align="center" width="30"><font size="-2">A.Jta.</font></td>
    <td align="center" width="30"><font size="-2">DEFINITIVO</font></td>
<?php
			
		}
		if( $VTMattipo[$k] == 4 ) {
			
?>    
    <td align="center" width="30"><font size="-2">F.J.</font></td>
    <td align="center" width="30"><font size="-2">F.I.</font></td>
    <td align="center" width="30"><font size="-2">Atr.</font></td>
    
<?php
			
		}
		
	}
?> 
	<td align="center" width="30"><font size="-2">&nbsp;</font></td>   
  </tr>
  <tr>
    <td width="25"  align="center"><font size="-1" face="Arial Narrow, Arial">9-10</font></td>
    <td width="250"  align="center"><font size="-1" face="Arial Narrow, Arial">DOMINA LOS APRENDIZAJES</font></td>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		if( $VTMattipo[$k] == 1 ) {
?>    
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $VTFrec10I[$k]; ?></font></td>
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $VTFrec10II[$k]; ?></font></td>
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $VTFrec10[$k]; ?></font></td>
<?php
		}
		if( $VTMattipo[$k] == 2 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 3 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 4 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    
<?php
		}
	}
?> 
	<td align="center" width="30"><font size="-2">&nbsp;</font></td>   
  </tr>
  <tr>
    <td width="25"  align="center"><font size="-1" face="Arial Narrow, Arial">7-8</font></td>
    <td width="250"  align="center"><font size="-1" face="Arial Narrow, Arial">ALCANZA LOS APRENDIZAJES</font></td>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		if( $VTMattipo[$k] == 1 ) {
?>    
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $VTFrec8I[$k]; ?></font></td>
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $VTFrec8II[$k]; ?></font></td>
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $VTFrec8[$k]; ?></font></td>
<?php
		}
		if( $VTMattipo[$k] == 2 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 3 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 4 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    
<?php
		}
	}
?> 
	<td align="center" width="30"><font size="-2">&nbsp;</font></td>   
  </tr>
  <tr>
    <td width="25"  align="center"><font size="-1" face="Arial Narrow, Arial">5-6</font></td>
    <td width="250"  align="center"><font size="-2" face="Arial Narrow, Arial">ESTA PROXIMO A ALCANZAR LOS APRENDIZAJES</font></td>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		if( $VTMattipo[$k] == 1 ) {
?>    
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $VTFrec6I[$k]; ?></font></td>
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $VTFrec6II[$k]; ?></font></td>
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $VTFrec6[$k]; ?></font></td>
<?php
		}
		if( $VTMattipo[$k] == 2 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 3 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 4 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    
<?php
		}
	}
?> 
	<td align="center" width="30"><font size="-2">&nbsp;</font></td>   
  </tr>
  <tr>
    <td width="25"  align="center"><font size="-1" face="Arial Narrow, Arial"><=4</font></td>
    <td width="250"  align="center"><font size="-2" face="Arial Narrow, Arial">NO ALCANZA LOS APRENDIZAJES REQUERIDOS</font></td>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		if( $VTMattipo[$k] == 1 ) {
?>    
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $VTFrec4I[$k]; ?></font></td>
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $VTFrec4II[$k]; ?></font></td>
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $VTFrec4[$k]; ?></font></td>
<?php
		}
		if( $VTMattipo[$k] == 2 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 3 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 4 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    
<?php
		}
	}
?> 
	<td align="center" width="30"><font size="-2">&nbsp;</font></td>   
  </tr>
  <tr>
    <td width="25"  align="center"><font size="-1">&nbsp;</font></td>
    <td width="250"  align="center"><font size="-2" face="Arial Narrow, Arial">TOTAL</font></td>
<?php
	for($k=0 ; $k<$VLnuDatosM; $k++)
	{
		$VTMattipo[$k]=get_result($VLdtDatosM,$k,"m.mattipo");
		if( $VTMattipo[$k] == 1 ) {
?>    
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $x; ?></font></td>
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $x; ?></font></td>
    <td align="center" width="30"><font size="2" face="Arial Narrow, Arial"><? echo $x; ?></font></td>
<?php
		}
		if( $VTMattipo[$k] == 2 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 3 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
<?php
		}
		if( $VTMattipo[$k] == 4 ) {
?>    
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    <td align="center" width="30"><font size="-2">&nbsp;</font></td>
    
<?php
		}
	}
?> 
	<td align="center" width="30"><font size="-2">&nbsp;</font></td>   
  </tr>
 
  
   </table>
   </td>
   </tr>
  <?php
	}
  
  ?>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
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
$VLConsultar2=$_GET[consultar2_x];
$VLConsultarNuevo=$_GET[consultarnuevo_x];
$VLdtCriterio=$_GET[critero];
$VLdtCriterio2=$_GET[critero2];
$VLdtConsultar=$_GET[txt_Consulta];
$VLdtCamp1=$_GET[txt_Camp1]; //// codigo especialidad
$VLdtCamp6=$_GET[txt_Camp6]; //// codigo quimestre
$VLdtCamp11=$_GET[txt_Camp11]; /// estado del quimestre
$VLdtCamp8=$_GET[txt_Camp8]; //// codigo paralelo
$VLdtCamp9=$_GET[txt_Camp9]; //// codigo del curso
$VLdtCamp10=$_GET[txt_Camp10]; //// numero de matricula
$VLdtCamp2=$_GET[txt_Camp2]; //// codigo grupo
$VLdtHcodigo=$_GET[hcodigo];
$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLAnoReporte=$_GET[nlctv2];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

//// armamos la fecha 

$txtDia=date("d");
$txtDia2=date("N");
$txtMes=date("m");
$txtAno=date("Y");

$VLFecha=$txtAno."/".$txtMes."/".$txtDia;

switch ($txtDia2) {
case "1":
$VLFechaTexto="lunes";
	break 1; 
case "2":
$VLFechaTexto="martes";	break 1; 
case "3":
$VLFechaTexto="miércoles";	break 1; 
case "4":
$VLFechaTexto="jueves";	break 1; 
case "5":
$VLFechaTexto="viernes";	break 1; 
case "6":
$VLFechaTexto="sábado";	break 1; 
case "7":
$VLFechaTexto="domingo";	break 1; 
default: 
}

$VLFechaTexto.=" ".$txtDia." de ";
   
switch ($txtMes) {
case "01":
$VLFechaTexto.="enero";
	break 1; 
case "02":
$VLFechaTexto.="febrero";	break 1; 
case "03":
$VLFechaTexto.="marzo";	break 1; 
case "04":
$VLFechaTexto.="abril";	break 1; 
case "05":
$VLFechaTexto.="mayo";	break 1; 
case "06":
$VLFechaTexto.="junio";	break 1; 
case "07":
$VLFechaTexto.="julio";	break 1; 
case "08":
$VLFechaTexto.="agosto"; break 1; 
case "09":
$VLFechaTexto.="septiembre";	break 1; 
case "10":
$VLFechaTexto.="octubre";	break 1; 
case "11":
$VLFechaTexto.="noviembre";	break 1; 
case "12":
$VLFechaTexto.="diciembre";	break 1; 
default: 
}

$VLFechaTexto.=" de ".$txtAno; 





$UNIDADES = array(
        ' ',
        'UNO ',
        'DOS ',
        'TRES ',
        'CUATRO ',
        'CINCO ',
        'SEIS ',
        'SIETE ',
        'OCHO ',
        'NUEVE ');
$UNIDADES2 = array(
        'CERO',
        'UNO ',
        'DOS ',
        'TRES ',
        'CUATRO ',
        'CINCO ',
        'SEIS ',
        'SIETE ',
        'OCHO ',
        'NUEVE ');
		
$DECENAS = array(
		' ',
        'DIEZ ',
        'VEINTE ',
        'TREINTA ',
        'CUARENTA ',
        'CINCUENTA ',
        'SESENTA ',
        'SETENTA ',
        'OCHENTA ',
        'NOVENTA ');
		
$DECENAS2 = array(
		' CERO ',
        'DIEZ ',
        'VEINTE ',
        'TREINTA ',
        'CUARENTA ',
        'CINCUENTA ',
        'SESENTA ',
        'SETENTA ',
        'OCHENTA ',
        'NOVENTA ');
		
$VTQryDAtos="Select g.espcodigo, g.curcodigo, mt.parcodigo, g.grucodigo
from mtrcl mt, grp g 
where mt.mtrno=".$VLdtCamp10."
and mt.anocodigo=".$VLAnoReporte."
and g.anocodigo=".$VLAnoReporte."
and mt.grucodigo=g.grucodigo ";

$VLdtDatosUnit = execute_query($VTQryDAtos,$VLConexion);
$VLnuDatosUnit = total_records($VLdtDatosUnit);
if ( $VLnuDatosUnit>0 )
{
	$VLdtCamp1=get_result($VLdtDatosUnit,0,"g.espcodigo");
	$VLdtCamp8=get_result($VLdtDatosUnit,0,"mt.parcodigo");
	$VLdtCamp9=get_result($VLdtDatosUnit,0,"g.curcodigo");
	$VLdtCamp2=get_result($VLdtDatosUnit,0,"g.grucodigo");
}

$VLQryQui="Select q.quicodigo, q.quidescripcion, q.quiorden 
from qmstr q, qmstrdtll qd 
where q.inscodigo=".$VLInstitucion." and q.anocodigo=".$VLAnoReporte." 
and qd.mtrno=".$VLdtCamp10."
and not q.quitipo=1 
group by q.quicodigo, q.quidescripcion, q.quiorden 
order by q.quiorden"; //// consultamos los quimestres que no son fin de ano

//$VTQryQuiFinal="Select * from qmstr where inscodigo=".$VLInstitucion." and anocodigo=".$VLAnoReporte." and quitipo=1 order by quiorden";
$VTQryQuiFinal="Select q.quicodigo, q.quidescripcion, q.quiorden 
from qmstr q, qmstrdtll qd 
where q.inscodigo=".$VLInstitucion." and q.anocodigo=".$VLAnoReporte." 
and qd.mtrno=".$VLdtCamp10."
and q.quitipo=1 
group by q.quicodigo, q.quidescripcion, q.quiorden 
order by q.quiorden";

$VLdtDatosFinal = execute_query($VTQryQuiFinal,$VLConexion);
$VLnuDatosFinal = total_records($VLdtDatosFinal);
if ( $VLnuDatosFinal>0 )
{
	$VLdtCamp6=get_result($VLdtDatosFinal,0,"quicodigo");
	$VLdtCamp11=get_result($VLdtDatosFinal,0,"quiestado");
}





$VTQryEsp="Select * from spcldd where espcodigo=".$VLdtCamp1;
$VTQryCur="Select * from crs where curcodigo=".$VLdtCamp9;

$VTQryPar="Select * from prll where parcodigo=".$VLdtCamp8;
$VTQryMat="SELECT m.matdescripcion , m.mattipo, m.matnoconsecutivo
FROM mtr m, `grpmtr` gm, grp g 
WHERE 
g.curcodigo=".$VLdtCamp9."
and g.espcodigo=".$VLdtCamp1."
and g.anocodigo=".$VLAnoLocal."
and g.grucodigo=gm.grucodigo
and gm.gmestado>0
and gm.matcodigo=m.matcodigo
and not (m.mattipo=4 or m.mattipo=5)
order by m.mattipo, m.matnoconsecutivo, m.matdescripcion ";
$VTQryEst="Select p.perapellidos, p.pernombres, m.mtrno, m.mtrestado, ie.inescodigo
from psn p, nsttcnstdnt ie, mtrcl m, grp g
where p.percodigo=ie.percodigo
and ie.inscodigo=".$VLInstitucion."
and g.curcodigo=".$VLdtCamp9."
and g.espcodigo=".$VLdtCamp1."
and ie.inescodigo=m.inescodigo
and m.anocodigo=".$VLAnoReporte."
and m.parcodigo=".$VLdtCamp8."
and m.mtrno=".$VLdtCamp10."
and m.grucodigo=g.grucodigo 
order by p.perapellidos, p.pernombres, m.mtrno, ie.inescodigo";

$Query = "Select * from nlctv where anocodigo= ".$VLAnoReporte;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if ( $VLnuDatos>0 )
{
	$VLdtPeriodo=get_result($VLdtDatos,0,"anodescripcion");
}
$VLdtDatosCur = execute_query($VTQryCur,$VLConexion);
$VLnuDatosCur = total_records($VLdtDatosCur);
if ( $VLnuDatosCur>0 )
{
	$VLdtCurso=get_result($VLdtDatosCur,0,"curdescripcion");
	$VLdtCursoOrden=get_result($VLdtDatosCur,0,"curorden");
}

/*
if ( $VLdtCursoOrden == 10){
$VLdtCurso2="PRIMERO";
	
}else {
	*/
	$VtOrden=$VLdtCursoOrden+1;
$VTQryCur2="Select * from crs where curorden=".$VtOrden;
$VLdtDatosCur2 = execute_query($VTQryCur2,$VLConexion);
$VLnuDatosCur2 = total_records($VLdtDatosCur2);

$VLdtCurso2=get_result($VLdtDatosCur2,0,"curdescripcion");

//}

$VLdtDatosEsp = execute_query($VTQryEsp,$VLConexion);
$VLnuDatosEsp = total_records($VLdtDatosEsp);
if ( $VLnuDatosEsp>0 )
{
	$VLdtEspecialidad=get_result($VLdtDatosEsp,0,"espdescripcion");
	$VLdtSeccion=get_result($VLdtDatosEsp,0,"espseccion");
}


$VLdtDatosPar = execute_query($VTQryPar,$VLConexion);
$VLnuDatosPar = total_records($VLdtDatosPar);
if ( $VLnuDatosPar>0 )
{
	$VLdtParalelo=get_result($VLdtDatosPar,0,"pardescripcion");
}

$VLdtDatosMat = execute_query($VTQryMat,$VLConexion);
$VLnuDatosMat = total_records($VLdtDatosMat);

$VLdtDatosQui = execute_query($VLQryQui,$VLConexion);
$VLnuDatosQui = total_records($VLdtDatosQui);


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CERTIFICADO DE PROMOCION</title>
</head>

<body>
<table width="800" border="0">
<?php  

$VLdtDatosEst = execute_query($VTQryEst,$VLConexion);
$VLnuDatosEst = total_records($VLdtDatosEst);
if ( $VLnuDatosEst>0 )
{
	for($i=0; $i<$VLnuDatosEst; $i++)
	{
		$VLdtApellido=get_result($VLdtDatosEst,$i,"p.perapellidos");
		$VLdtNombre=get_result($VLdtDatosEst,$i,"p.pernombres");
		$VLdtNoMatricula=get_result($VLdtDatosEst,$i,"m.mtrno");
		$VLdtMatEstado=get_result($VLdtDatosEst,$i,"m.mtrestado");
?>


  <tr>
    <td>
<table width="100%" border="0">
  <tr>
    <td align="center"><img src="../imagenes/membrete1.png" width="750" height="129" /></td>
  </tr>
  <tr>
    <td align="center"><table width="100%" border="0">
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><font face="Arial, Arial Narrow" size="+1"><b>CERTIFICADO DE PROMOCIÓN</b></font></td>
  </tr>
  <tr>
    <td align="center"><font face="Arial, Arial Narrow" size="+1"><b>AÑO LECTIVO <?php echo $VLdtPeriodo; ?></b></font></td>
  </tr>
  <tr>
    <td align="center"><font face="Arial, Arial Narrow" size="+1"><b>JORNADA <?php echo $VLdtSeccion; ?></b></font> </td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td align="center"><table width="90%" border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="justify"  > <font face="Arial, Arial Narrow" size="-1" >De conformidad con lo prescrito en el Art. 197 del Reglamento General a la Ley Orgánica de educación Intercultural y demás normativas vigentes, certifica que el/la estudiante <b><?php echo ($VLdtApellido." ".$VLdtNombre)?></b> estudiante del <b><?php echo ($VLdtCurso);?> " <?php echo ($VLdtParalelo);?> "</b> Año de <b><?php echo ($VLdtEspecialidad); ?></b> obtuvo las siguientes calificaciones durante el presente año lectivo:</font></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><table width="550" border="1">
      <tr>
        <td rowspan="2" width="250" align="center" ><font face="Arial, Arial Narrow" size="-1" ><b>ASIGNATURAS</b></font></td>
        <td colspan="2" width="350" align="center"><font face="Arial, Arial Narrow" size="-1" ><b>CALIFICACIONES</b></font></td>
      </tr>
      <tr>
        <td width="50" align="center"><font face="Arial, Arial Narrow" size="-1" >No</font></td>
        <td width="250" align="center"><font face="Arial, Arial Narrow" size="-1" >LETRAS</font></td>
      </tr>
<?php
$VTQryQuiA="Select m.matnoconsecutivo,m.matdescripcion, m.mattipo, m.famcodigo, q.mtrno, q.quipromparcial, q.quiequivalencia80, q.quiexamen, q.quiequivalencia20, q.quipromquimestre
from mtr m, qmstrdtll q, mtrcl mt, grpmtr gm
where q.mtrno=".$VLdtCamp10." 
and q.quicodigo=".$VLdtCamp6." 
and q.matcodigo=m.matcodigo
and m.matestado=1
and not ( m.mattipo=4 or m.mattipo=5)
and q.mtrno=mt.mtrno 
and mt.grucodigo=gm.grucodigo
and gm.gmestado>0
and gm.matcodigo=q.matcodigo
order by q.mtrno, m.mattipo, m.matnoconsecutivo";

		$VLdtDatosQuiA = execute_query($VTQryQuiA,$VLConexion);
		$VLnuDatosQuiA = total_records($VLdtDatosQuiA);
		if ($VLnuDatosQuiA>0){
			$VTdtProm=0;
			$VTdtDiv=0;
			for($j=0; $j<$VLnuDatosQuiA; $j++)
			{
				$VTdtMatDesc=get_result($VLdtDatosQuiA,$j,"m.matdescripcion");
				$VTdtQuiA=get_result($VLdtDatosQuiA,$j,"q.quipromquimestre");
				$VTdtMatTipo=get_result($VLdtDatosQuiA,$j,"m.mattipo");
				$VLMatfamilia=get_result($VLdtDatosQuiA,$j,"m.famcodigo");				
				if($VTdtMatTipo!=3){
					
?>      
      <tr>
        <td><font face="Arial, Arial Narrow" size="-1" ><?php echo ($VTdtMatDesc);  ?></font></td>
        <td align="center"><font face="Arial, Arial Narrow" size="-1" ><?php switch ($VTdtMatTipo)
	{
		case "1":
			if($VLMatfamilia<4)
			{
				switch ($VTdtQuiA) {
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
				 echo number_format($VTdtQuiA,2); 
			}
		$VTdtProm=$VTdtProm+$VTdtQuiA;
		$VTdtDiv++;
		break 1;
		case "2":
		if( $VTdtQuiA>8.99 && $VTdtQuiA<11)
		{
			echo "EX";
		}
		if( $VTdtQuiA>6.99 && $VTdtQuiA<9)
		{
			echo "MB";
		}
		if( $VTdtQuiA>4.99 && $VTdtQuiA<7)
		{
			echo "B";
		}
		if( $VTdtQuiA>0 && $VTdtQuiA<5)
		{
			echo "R";
		}
		if( $VTdtQuiA==0)
		{
			echo "NR";
		}			
		break 1;
		case "3":
			switch ($VTdtQuiA) {
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
		break 1;
	} ?></font></td>
        <td>
        
        
        <font face="Arial, Arial Narrow" size="-1" > <?php 
		switch ($VTdtMatTipo)
		{
			case "1":
			if($VLMatfamilia<4)
			{
				switch ($VTdtQuiA) {
				case "0":
				echo "NO HA RENDIDO";
				break;
				case "9":
				echo "ADQUIRIDA";
				break;
				case "7":
				echo "EN PROCESO";
				break;
				case "5":
				echo "INICIO";
				break;
				case "4":
				echo "NO EVALUADO";
				break;
				}
			}else{
				$VTdtValor=$VTdtQuiA;
				$VTdtValor=$VTdtValor/10;
				$VTdtDecena=intval($VTdtValor);
				$VTdtValor=$VTdtValor-$VTdtDecena;
				$VTdtValor=$VTdtValor*10;
				$VTdtUnidad=intval($VTdtValor);
				$VTdtValor=$VTdtValor-$VTdtUnidad;
				$VTdtValor=$VTdtValor*10;
				$VTdtDecima=round(intval($VTdtValor),0);
				$VTdtDecima2=$VTdtValor;
				$VTdtValor=$VTdtValor-$VTdtDecima;
				$VTdtValor=$VTdtValor*10;
				$VTdtCentecima=round($VTdtValor,0);
				if ($VTdtDecima >0 && $VTdtCentecima>=1)
				{
					$VTCadena=$DECENAS[$VTdtDecena].$UNIDADES[$VTdtUnidad];
					if ( intval($VTdtCentecima)>9)
					{
						$VTCadena.=" COMA ".$DECENAS[$VTdtDecima+1];
					} else 
					{ 
						$VTCadena.=" COMA ".$DECENAS[$VTdtDecima]." Y ".$UNIDADES[$VTdtCentecima];
					}
					echo $VTCadena;
				} else {
					$VTCadena=$DECENAS[$VTdtDecena].$UNIDADES[$VTdtUnidad];
					if ( round($VTdtDecima2)==1 && $VTdtCentecima==10 )
					{
						$VTCadena.=" COMA ".$DECENAS2[round($VTdtDecima2)].$UNIDADES[$VTdtCentecima];
					} else {
						if($DECENAS[$VTdtDecima]!=" " || $UNIDADES[$VTdtCentecima]!=" " ){
							$VTCadena.=" COMA ".$DECENAS2[$VTdtDecima].$UNIDADES[$VTdtCentecima];
						}
					}
					echo $VTCadena;
				}
			}
			break;
			case "2":
				if($VTdtQuiA==0)
				{
					$VtdtMensaje="NO HA RENDIDO";
				}
				if($VTdtQuiA>0)
				{
					$VtdtMensaje= "REGULAR";
				}
				if($VTdtQuiA>=5)
				{
					$VtdtMensaje="BUENO";
				}
				if($VTdtQuiA>=7)
				{
					$VtdtMensaje="MUY BUENO";
				}
				if($VTdtQuiA>=9)
				{
					$VtdtMensaje= "EXCELENTE";
				}
				echo $VtdtMensaje;
			break 1;
		}
		?></font></td>
      </tr>
<?php      
				}
			}
		}
?>      <tr>
        <td><font face="Arial, Arial Narrow" size="-1" ><b>PROMEDIO GENERAL</b></font></td>
        <td align="center"><font face="Arial, Arial Narrow" size="-1" ><b><?php 
		$VlResp=$VTdtProm/$VTdtDiv;
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

		$VTPromGen=number_format($VTdtProm/$VTdtDiv,2);
		echo number_format($VTdtProm/$VTdtDiv,2);} ?></b></font></td>
        <td><font face="Arial, Arial Narrow" size="-1" > <b> <?php 
		
				$VTdtValor=$VTPromGen;
				$VTdtValor=$VTdtValor/10;
				$VTdtDecena=intval($VTdtValor);
				$VTdtValor=$VTdtValor-$VTdtDecena;
				$VTdtValor=$VTdtValor*10;
				$VTdtUnidad=intval($VTdtValor);
				$VTdtValor=$VTdtValor-$VTdtUnidad;
				$VTdtValor=$VTdtValor*10;
				$VTdtDecima=round(intval($VTdtValor),0);
				$VTdtDecima2=$VTdtValor;
				$VTdtValor=$VTdtValor-$VTdtDecima;
				$VTdtValor=$VTdtValor*10;
				$VTdtCentecima=round($VTdtValor,0);
				if ($VTdtDecima >0 && $VTdtCentecima>=1)
				{
					$VTCadena=$DECENAS[$VTdtDecena].$UNIDADES[$VTdtUnidad];
					if ( intval($VTdtCentecima)>9)
					{
						$VTCadena.=" COMA ".$DECENAS[$VTdtDecima+1];
					} else 
					{ 
						$VTCadena.=" COMA ".$DECENAS[$VTdtDecima]." Y ".$UNIDADES[$VTdtCentecima];
					}
					echo $VTCadena;
				} else {
					$VTCadena=$DECENAS[$VTdtDecena].$UNIDADES[$VTdtUnidad];
					if ( round($VTdtDecima2)==1 && $VTdtCentecima==10 )
					{
						$VTCadena.=" COMA ".$DECENAS2[round($VTdtDecima2)].$UNIDADES[$VTdtCentecima];
					} else {
						if($DECENAS[$VTdtDecima]!=" " || $UNIDADES[$VTdtCentecima]!=" " ){
							$VTCadena.=" COMA ".$DECENAS2[$VTdtDecima].$UNIDADES[$VTdtCentecima];
						}
					}
					echo $VTCadena;
				} ?> </b></font> </td>
      </tr>
      <tr>
        <td><font face="Arial, Arial Narrow" size="-1" ><b>COMPORTAMIENTO</b></font></td>
        <td align="center"><font face="Arial, Arial Narrow" size="-1" ><b><?php 			
		switch ($VTdtQuiA) {
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
  ?></b></font></td>
        <td><font face="Arial, Arial Narrow" size="-1" ><b><?php  			
		switch ($VTdtQuiA) {
			case "0":
			echo "NR";
			break;
			case "1":
			echo "Insatisfactorio";
			break;
			case "2":
			echo "Mejorable";
			break;
			case "3":
			echo "Poco Satisfactorio";
			break;
			case "4":
			echo "Satisfactorio";
			break;
			case "5":
			echo "Muy Satisfactorio";
			break;
			}
?></b></font></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><table width="90%" border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><font face="Arial, Arial Narrow" size="-1" > <?php if ( $VLdtCursoOrden == 15) { if($VTPromGen<7) {?> Por lo tanto no aprueba el TERCER AÑO DE <?php echo ($VLdtEspecialidad); } else {?>  Por lo tanto aprueba el TERCER AÑO DE  <?php echo ($VLdtEspecialidad); } } else { ?> Por lo tanto  <?php if($VTPromGen<7){ ?> no es promovido/a <?php } else { ?> es promovido/a <?php } ?>al <b><?php echo $VLdtCurso2;  ?> AÑO DE <?php if ( $VLdtCursoOrden > 11){ echo "BACHILLERATO";
		} else { echo ($VLdtEspecialidad); } } ?> </b>. Para certificar suscriben en unidad de acto la  Rectora y la  Secretaria General del Plantel quien certifica</font> </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><table width="90%" border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><font face="Arial, Arial Narrow" size="-1" >Esmeraldas,  <?php echo $VLFechaTexto;  ?></font></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td width="10%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td width="20%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td width="10%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><hr /></td>
        <td>&nbsp;</td>
        <td><hr /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center">Msc. María Isabel Fajardo López</td>
        <td>&nbsp;</td>
        <td align="center"><font face="Arial, Arial Narrow" size="-1" >SECRETARIA</font></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center">RECTORA</td>
        <td>&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
    
    </td>
  </tr>
  
<?php
	}
}
?>  
  
</table>


</body>
</html>
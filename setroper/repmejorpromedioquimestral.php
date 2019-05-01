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
$VLdtCamp1=$_GET[txt_Camp1];
$VLdtCamp2=$_GET[txt_Camp2]; 
$VLdtCamp6=$_GET[txt_Camp6]; 
$VLdtCamp11=$_GET[txt_Camp11]; 
$VLdtCamp8=$_GET[txt_Camp8]; 
$VLdtCamp9=$_GET[txt_Camp9]; 
$VLdtHcodigo=$_GET[hcodigo];
$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
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

$VLQryQui="Select * from qmstr where inscodigo=".$VLInstitucion." and anocodigo=".$VLAnoLocal." and quicodigo=".$VLdtCamp6." order by quiorden"; //// consultamos los quimestres que no son fin de ano
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
and gm.matcodigo=m.matcodigo
and gm.gmestado=1
and gm.gmestado>0
and not (m.mattipo=4 or m.mattipo=5)
order by m.mattipo, m.matnoconsecutivo, m.matdescripcion ";

$VTQryEst="Select p.perapellidos, p.pernombres, m.mtrno, m.mtrestado, ie.inescodigo,
count(mt.matdescripcion) as materias, sum(qd.quipromquimestre) as suma
from psn p, nsttcnstdnt ie, mtrcl m, grp g, mtr mt, grpmtr gm, qmstrdtll qd, qmstr q
where p.percodigo=ie.percodigo
and ie.inscodigo=".$VLInstitucion."
and gm.gmestado=1
and gm.grucodigo=g.grucodigo
and gm.matcodigo=mt.matcodigo
and g.curcodigo=".$VLdtCamp9."
and g.espcodigo=".$VLdtCamp1."
and ie.inescodigo=m.inescodigo
and m.anocodigo=".$VLAnoLocal."
and m.parcodigo=".$VLdtCamp8."
and m.grucodigo=g.grucodigo 
and q.anocodigo=".$VLAnoLocal."
and q.quicodigo=".$VLdtCamp2."
and qd.quipromquimestre>0
and q.quicodigo=qd.quicodigo
and m.mtrno=qd.mtrno
and qd.matcodigo=mt.matcodigo
and mt.matestado=1
and mt.mattipo=1
group by p.perapellidos, p.pernombres, m.mtrno, ie.inescodigo
order by suma desc, p.perapellidos, p.pernombres, m.mtrno, ie.inescodigo
";


$VTQryQuiA="Select m.matnoconsecutivo,m.matdescripcion, m.mattipo, m.famcodigo, q.mtrno, q.quipromparcial, q.quiequivalencia80, q.quiexamen, q.quiequivalencia20, q.quipromquimestre
from mtr m, qmstrdtll q, mtrcl mt, grpmtr gm
where q.mtrno=".$VLdtNoMatricula." 
and q.quicodigo=".$VLdtCamp6." 
and q.matcodigo=m.matcodigo
and m.matestado=1
and not ( m.mattipo=4 or m.mattipo=5)
and q.mtrno=mt.mtrno 
and mt.grucodigo=gm.grucodigo
and gm.gmestado>0
and gm.matcodigo=q.matcodigo
order by q.mtrno, m.mattipo, m.matnoconsecutivo";


$Query = "Select * from nlctv where anocodigo= ".$VLAnoLocal;
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

//if ( $VLdtCursoOrden == 10){
//$VLdtCurso2="PRIMERO";
	
//}else {
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
if ( $VLnuDatosQui>0 )
{
	$VLdtQuimestre=get_result($VLdtDatosQui,0,"quidescripcion");
}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MEJORES PROMEDIOS QUIMESTRALES</title>
</head>

<body>
<table width="800" border="0">

  <tr>
    <td align="center"><img src="../imagenes/membrete.png" width="779" height="200" /></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><font face="Arial, Arial Narrow" size="+1"><b>LISTA DE MEJORES PROMEDIOS / <?php echo $VLdtQuimestre; ?></b></font></td>
  </tr>
  <tr>
    <td align="center"><font face="Arial, Arial Narrow" size="+1"><b>AÑO LECTIVO <?php echo $VLdtPeriodo; ?></b></font></td>
  </tr>
  <tr>
    <td align="center"><font face="Arial, Arial Narrow" size="+1"><b>JORNADA <?php echo $VLdtSeccion; ?></b></font> </td>
  </tr>
  <tr>
    <td align="center"><font face="Arial, Arial Narrow" size="+1"><b><?php echo $VLdtEspecialidad." ".$VLdtCurso." ' ".$VLdtParalelo." '"; ?></b></font> </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>

  <tr>
    <td align="center">
    <table width="100%" border="1">
    	<tr>
        	<td width="50" align="center"><b>No </b> </td>
        	<td width="300" align="center"><b> NOMBRE DEL ALUMNO </b></td>
        	<td width="100" align="center"><b> PROMEDIO QUIMESTRAL </b></td>
    	</tr>
<?php
$VLdtDatosEst = execute_query($VTQryEst,$VLConexion);
$VLnuDatosEst = total_records($VLdtDatosEst);
if ( $VLnuDatosEst>0 )
{
	$a=0;
	for ( $i=0 ; $i< $VLnuDatosEst; $i++)
	{
	$VLdtEstNombre=get_result($VLdtDatosEst,$i,"p.pernombres");
	$VLdtEstApellido=get_result($VLdtDatosEst,$i,"p.perapellidos");
	$VLdtMateria=get_result($VLdtDatosEst,$i,"materias");
	$VLdtSuma=get_result($VLdtDatosEst,$i,"suma");

		if ( ($VLdtSuma/$VLdtMateria) >=8.995 )
		{
			$a++;
	?>
	
			<tr>
				<td width="50" align="center"><? echo $i+1; ?> </td>
				<td width="300" align="center"><? echo  ($VLdtEstApellido." ".$VLdtEstNombre); ?></td>
				<td width="100" align="center"><? echo  number_format($VLdtSuma/$VLdtMateria,2); ?></td>
			</tr>
	<? 
		} 
	}

if( $a==0)
	{

?>
			<tr>
				<td width="50" align="center">&nbsp;</td>
				<td width="300" align="center">No existen estudiantes con promedios iguales o superiores a 9</td>
				<td width="100" align="center">&nbsp;</td>
			</tr>
<?

	}	
	
}?>

    </table>
    </td>
  </tr>  
</table>


</body>
</html>
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


$VLQryQui="Select q.quicodigo, q.quidescripcion, q.quiorden, q.quiseccion 
from qmstr q
where q.inscodigo=".$VLInstitucion." and q.anocodigo=".$VLAnoReporte." 
and q.quitipo=1 
group by q.quicodigo, q.quidescripcion, q.quiorden 
order by q.quiorden"; //// consultamos los quimestres que no son fin de ano


$Query = "Select * from nlctv where anocodigo= ".$VLAnoReporte;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if ( $VLnuDatos>0 )
{
	$VLdtPeriodo=get_result($VLdtDatos,0,"anodescripcion");
}


$VLdtDatosQui = execute_query($VLQryQui,$VLConexion);
$VLnuDatosQui = total_records($VLdtDatosQui);
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPORTE DEL PROMEDIO ANUAL POR CURSO</title>
</head>

<body>
<table width="800" border="0">


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
    <td align="center"><font face="Arial, Arial Narrow" size="+1"><b>PROMEDIO ANUAL POR CURSO</b></font></td>
  </tr>
  <tr>
    <td align="center"><font face="Arial, Arial Narrow" size="+1"><b>AÑO LECTIVO <?php echo $VLdtPeriodo; ?></b></font></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td align="center">
    <?PHP
	
		if ( $VLnuDatosQui>0 ) 
		/// SI EXISTEN QUIMESTRES ANUALES EN ESTE AÑO
		{
			$VTStrQui=" and ( ";
			for ( $i=0; $i<$VLnuDatosQui; $i++)
			{
				$VTQuicodigo=get_result($VLdtDatosQui,$i,"q.quicodigo");	
				if ($VLnuDatosQui==$i+1)
				{
					$VTStrQui=$VTStrQui." q.quicodigo=".$VTQuicodigo." ";	
				}else{
					$VTStrQui=$VTStrQui." q.quicodigo=".$VTQuicodigo." or ";	
				}
			}
			
			$VTStrQui=$VTStrQui." )";
			
			$VTQry="SELECT e.esporden, e.espseccion, e.espdescripcion, q.quicodigo, AVG(q.quipromquimestre) promedio
FROM  `mtrcl` m, grp g, prll p, crs c, spcldd e, mtr mt, qmstrdtll q
WHERE m.anocodigo =".$VLAnoReporte."
AND m.mtrestado =1
AND m.grucodigo = g.grucodigo
AND g.espcodigo = e.espcodigo
AND mt.mattipo=1
AND m.mtrno=q.mtrno
AND q.matcodigo=mt.matcodigo ".$VTStrQui."
group by e.esporden, e.espseccion, e.espdescripcion,  q.quicodigo
ORDER BY e.espseccion, e.esporden,  e.espdescripcion";
			
			
			//echo $VTQry;
			$VLdtDatosProm = execute_query($VTQry,$VLConexion);
			$VLnuDatosProm = total_records($VLdtDatosProm);
			if ($VLnuDatosProm>0)
			{		
	?>
	<table width="100%" border="1">
      <tr>
        <td>Sección</td>
        <td>Especialidad</td>
        <td>Curso</td>
        <td>Paralelo</td>
        <td>Promedio</td>

      </tr>
      <?php
	  	$VTdtPromAnual=0;
		for($x=0; $x<$VLnuDatosProm; $x++){
	  	$VTdtSeccion=get_result($VLdtDatosProm,$x,"e.espseccion");
	  	$VTdtEspecialidad=get_result($VLdtDatosProm,$x,"e.espdescripcion");
	  	$VTdtCurso=get_result($VLdtDatosProm,$x,"c.curdescripcion");
	  	$VTdtParalelo=get_result($VLdtDatosProm,$x,"p.pardescripcion");
	  	$VTdtPromedio=get_result($VLdtDatosProm,$x,"promedio");
	  	$VTdtPromedio2=round($VTdtPromedio,3);
		$VTdtPromAnual+=$VTdtPromedio2;
		?>
      <tr>
        <td><?php echo $VTdtSeccion; ?></td>
        <td><?php echo $VTdtEspecialidad; ?></td>
        <td><?php echo $VTdtCurso; ?></td>
        <td><?php echo $VTdtParalelo; ?></td>
        <td><?php echo $VTdtPromedio2; ?></td>
      </tr>
      <?php
		}
		?>
      <tr>
        <td colspan="4">Promedio Anual de la Institución</td>
        <td><?php echo round($VTdtPromAnual/$VLnuDatosProm,3); ?></td>
      </tr>

    </table>	
    
    
    	
    <?PHP
			}
		} else {
	
	?>
		No hay nada
    <?PHP
		}
	?>
    </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
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
  

  
</table>


</body>
</html>
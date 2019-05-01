<?php 

require "cnxn_bsddts/mnjdr_bsdts.php";
header('Content-Type: text/html; charset=UTF-8');

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



$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLParcodigo=$_GET[dt1];
$VLEspcodigo=$_GET[dt2];
$VLCurcodigo=$_GET[dt3];
$VTEstudiante=$_GET[estudiante];
$VTMateria=$_GET[materia];
$VTDocente=$_GET[docente];

$VLtxtCampo1="No Matrícula";
$VLtxtCampo2="Codigo Estudiante";
$VLtxtCampo3="C Grupo";
$VLtxtCampo4="C Paralelo";
$VLtxtCampo5="No Folio";
$VLtxtCampo6="Fecha";

$VLQryCampo1="mtrno";
$VLQryCampo2="inescodigo";
$VLQryCampo3="grucodigo";
$VLQryCampo4="parcodigo";
$VLQryCampo5="mtrfolio";
$VLQryCampo6="mtrfechaext";
$VLQryCampo7="anodescripcion";
$VLQryCampo8="cursigla";
$VLQryCampo9="percodigo";
$VLQryCampo10="perapellidos";
$VLQryCampo11="pernombres";
$VLQryCampo12="pertelefono";
$VLQryCampo13="perdireccion";
$VLQryCampo14="parentezco";
$VLQryCampo15="parrepresent";
$VLQryCampo16="percodigo";



	$VLQry="Select p.percodigo, p.perapellidos, p.pernombres, m.mtrestado ";
	$VLQry.=" from psn p, nsttcnstdnt ip, mtrcl m, grp g ";
	$VLQry.=" where p.percodigo=ip.percodigo and ip.inescodigo=m.inescodigo ";
	$VLQry.=" and m.grucodigo=g.grucodigo ";
	$VLQry.=" and ip.inscodigo=".$VLInstitucion;
	$VLQry.=" and m.parcodigo= ".$VLParcodigo;
	$VLQry.=" and g.espcodigo= ".$VLEspcodigo;
	$VLQry.=" and g.curcodigo= ".$VLCurcodigo;
	$VLQry.=" and g.anocodigo=".$VLAnoLocal;
	$VLQry.=" group by  p.perapellidos, p.pernombres, p.percodigo ";
	$VLQry.=" order by  p.perapellidos, p.pernombres, p.percodigo ";
	$VLQry2="Select curdescripcion from crs where curcodigo=".$VLCurcodigo;
	$VLQry3="Select pardescripcion from prll where parcodigo=".$VLParcodigo;
	$VLQry4="Select * from spcldd where espcodigo=".$VLEspcodigo;
	
	
	$VLConexion=connect();
	
	////////  RECUPERAMOS EL TIPO DE REPORTE QUE SE DESEA HACER
	
	if ( $VTEstudiante!="" )
	{
		$VTTipoReporte="1"; //// ESTUDIANTE	
	} else {
		if ( $VTMateria!=""){
			$VTTipoReporte="2"; //// MATERIA	
		} else {
			$VTTipoReporte="3"; //// PROFESOR	
		}
		
	}
	
	
	
	
	
	$VLdtDatos2 = execute_query($VLQry2,$VLConexion);
	$VLdtDatos3 = execute_query($VLQry3,$VLConexion);
	$VLdtDatos4 = execute_query($VLQry4,$VLConexion);

	$VlCurdescripcion=get_result($VLdtDatos2,0,"curdescripcion");
	$VlPardescripcion=get_result($VLdtDatos3,0,"pardescripcion");
	$VLEspSiglas=get_result($VLdtDatos4,0,"espsiglas");
	$VLEspSeccion=get_result($VLdtDatos4,0,"espseccion");

	$VLdtDatos1 = execute_query($VLQry,$VLConexion);
	$VLnuDatos1 = total_records($VLdtDatos1);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
<title>REPORTE DEL CURSO <?php echo ($VLEspSiglas." ".$VLEspSeccion." ".$VlCurdescripcion." ".$VlPardescripcion); ?> / <?php 
switch ($VTTipoReporte )
{
 case 1:
 	echo "ESTUDIANTES";
 break;
 case 2:
 	echo "MATERIAS";
 break;
 case 3:
 	echo "DOCENTES";
 break;
}
 ?></title>
<style type="text/css">
.mat {
	font-weight: bold;
}
.ta {
	font-size: 14px;
}
.fuente {
	font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>


<body  class="fuente">
<form action="rprtcrsestudiante1.php" method="get">
<table width="900" border="0">
  <tr>
    <td width="10%">&nbsp;</td>
    <td width="85%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    
<?php 
switch ($VTTipoReporte )
{
 case 1:


?>    
    <table width="100%" border="0">
  <tr>
    <td align="center">NOMINA DE ESTUDIANTES</td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>CURSO: <? echo ($VlCurdescripcion); ?> </td>
        <td>PARALELO:<?=$VlPardescripcion; ?></td>
        <td>FECHA:</td>
      </tr>
      <tr>
        <td>Objetivo:</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="1">
      <tr>
        <td width="5">No</td>
        <td width="5">Codigo</td>
        <td width="180">Apellidos y Nombres</td>
        <td width="50">Observacion</td>
        <td width="10">&nbsp;</td>
        <td width="10">&nbsp;</td>
        <td width="10">&nbsp;</td>
        <td width="10">&nbsp;</td>
        <td width="10">&nbsp;</td>
        <td width="10">&nbsp;</td>
        <td width="10">&nbsp;</td>
        <td width="10">&nbsp;</td>
        <td width="10">&nbsp;</td>
      </tr>
      
      <?PHP
      if ($VLnuDatos1>0)
	  {
		  for($i=0; $i<$VLnuDatos1; $i++)
		  {
		
	  
				$VLdtcodigo=get_result($VLdtDatos1,$i,"p.percodigo");
				$VLdtApellido=get_result($VLdtDatos1,$i,"p.perapellidos");
				$VLdtNombre=get_result($VLdtDatos1,$i,"p.pernombres");
	  			$VLdtEstado=get_result($VLdtDatos1,$i,"m.mtrestado");
				
switch ($VLdtEstado) {
case "1":
$VLdtColor="#000000";
$VLdtObserv="&nbsp;";
	break 1; 
case "2":
$VLdtColor="#003300"; 
$VLdtObserv="DESERTOR";
break 1;
case "3":
$VLdtColor="#FF0000"; 
$VLdtObserv="RETIRADO";
default: 
}
	  ?>
      <tr>
        <td><font size="-2" color="<?=$VLdtColor; ?>" ><?=$i+1; ?></font></td>
        <td><font size="-2" color="<?=$VLdtColor; ?>" ><?=$VLdtcodigo; ?></font></td>
        <td><font size="-2" color="<?=$VLdtColor; ?>" ><? echo ($VLdtApellido." ".$VLdtNombre); ?></font></td>
        <td><font size="-2" color="<?=$VLdtColor; ?>" ><? echo ($VLdtObserv); ?></font></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <?PHP
	  
		  }
	  }
	  ?>      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>

<?php 
 break;
 case 2:
?> 
<table width="100%" border="0">
  <tr>
    <td align="center">LISTADO DE MATERIAS&nbsp;</td>
  </tr>
  <tr>
    <td><table width="800" border="0">
  <tr>
    <td width="100%">&nbsp;</td>
  </tr>
  <tr>
    <td>CURSO : <?php echo ($VLEspSiglas." ".$VLEspSeccion." ".$VlCurdescripcion." ".$VlPardescripcion); ?>&nbsp;</td>
  </tr>
  <tr>
    <td width="100%">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="1">
  <tr>
    <td width="7%" align="center">No</td>
    <td width="7%" align="center">ORDEN</td>
    <td width="45%" align="center">DESCRIPCION</td>
    <td width="10%" align="center">SIGLAS</td>
    <td width="10%" align="center">CREDITOS</td>
    <td width="20%" align="center">FAMILIA</td>
  </tr>
  <?php 
  	$VTQryMateria="Select m.matdescripcion, m.matid, m.matnocredito, m.matnoconsecutivo, ";
	$VTQryMateria.="m.mattipo, f.famnombre from mtr m, fml f, grp g, grpmtr gm ";
	$VTQryMateria.=" where g.curcodigo=".$VLCurcodigo;
	$VTQryMateria.=" and g.espcodigo=".$VLEspcodigo;	
	$VTQryMateria.=" and g.anocodigo=".$VLAnoLocal;
	$VTQryMateria.=" and g.gruestado=1";
	$VTQryMateria.=" and g.grucodigo=gm.grucodigo";
	$VTQryMateria.=" and gm.gmestado=1";
	$VTQryMateria.=" and gm.matcodigo=m.matcodigo";				
	$VTQryMateria.=" and f.famcodigo=m.famcodigo";
	$VTQryMateria.=" order by  f.famnombre, m.mattipo, m.matnoconsecutivo";
	
	
	$VLdtDatosM = execute_query($VTQryMateria,$VLConexion);
	$VLnuDatosM = total_records($VLdtDatosM);
	if ( $VLnuDatosM>0) {
	for( $i=0; $i<$VLnuDatosM; $i++)
	{
  		$VTMatDescripcion=get_result($VLdtDatosM,$i,"m.matdescripcion");
  		$VTMatSiglas=get_result($VLdtDatosM,$i,"m.matid");
  		$VTMatCreditos=get_result($VLdtDatosM,$i,"m.matnocredito");
  		$VTMatOrden=get_result($VLdtDatosM,$i,"m.matnoconsecutivo");
  		$VTFamDescripcion=get_result($VLdtDatosM,$i,"f.famnombre");
  ?>
  <tr>
    <td><?php echo $i+1; ?>&nbsp;</td>
    <td><?php echo $VTMatOrden; ?>&nbsp;</td>
    <td><?php echo ($VTMatDescripcion); ?>&nbsp;</td>
    <td><?php echo $VTMatSiglas; ?>&nbsp;</td>
    <td><?php echo $VTMatCreditos; ?>&nbsp;</td>
    <td><?php echo ($VTFamDescripcion); ?>&nbsp;</td>
  </tr>
  <?php 
	} } else {
  ?>	
  <tr>
    <td colspan="6">NO TIENE MATERIAS ASIGNADAS</td>
  </tr>
  <?php 
	}
  ?>
  <tr>
    <td colspan="6"><?php //echo $VTQryMateria; ?>&nbsp;</td>
  </tr>
</table>
&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><?php echo $VLFechaTexto; ?>&nbsp;</td>
  </tr>
</table>
&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<?PHP	
 break;
 case 3:
 
 ?>
 <table width="800" border="0">
  <tr>
    <td align="center">LISTADO DE DOCENTES POR MATERIA</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>CURSO : <?php echo ($VLEspSiglas." ".$VLEspSeccion." ".$VlCurdescripcion." ".$VlPardescripcion); ?>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="1">
  <tr>
    <td width="5%">No</td>
    <td width="45%">MATERIA</td>
    <td width="50%">DOCENTE</td>
  </tr>
  <?php 
  	$VTQryMateria="Select m.matcodigo, m.matdescripcion, m.matid, m.matnocredito, m.matnoconsecutivo, ";
	$VTQryMateria.="m.mattipo, f.famnombre, g.espcodigo, g.curcodigo, gg.parcodigo, ";
	$VTQryMateria.="p.perapellidos, p.pernombres ";
	$VTQryMateria.="from mtr m, fml f, grp g, grpmtr gm, grpprllmtrdcnt gg,  ";
	$VTQryMateria.="dcntmtr dm, nsttcndcnt d, psn p ";
	$VTQryMateria.=" where g.curcodigo=".$VLCurcodigo;
	$VTQryMateria.=" and g.espcodigo=".$VLEspcodigo;	
	$VTQryMateria.=" and g.anocodigo=".$VLAnoLocal;
	$VTQryMateria.=" and g.gruestado=1";
	$VTQryMateria.=" and g.grucodigo=gm.grucodigo";
	$VTQryMateria.=" and gm.gmestado=1";
	$VTQryMateria.=" and gm.matcodigo=m.matcodigo";				
	$VTQryMateria.=" and f.famcodigo=m.famcodigo";
	$VTQryMateria.=" and gm.gmcodigo=gg.gmcodigo";
	$VTQryMateria.=" and gg.parcodigo=".$VLParcodigo;
	$VTQryMateria.=" and gg.dcmtcodigo=dm.dcmtcodigo";
	$VTQryMateria.=" and gg.gpmdestado=1";	
	$VTQryMateria.=" and dm.indocodigo=d.indocodigo";
	$VTQryMateria.=" and d.inscodigo=".$VLInstitucion;
	$VTQryMateria.=" and d.percodigo=p.percodigo";
	$VTQryMateria.=" group by m.matdescripcion, m.matid, m.matnocredito, m.matnoconsecutivo,";
	$VTQryMateria.="m.mattipo, f.famnombre, g.espcodigo, g.curcodigo, gg.parcodigo, ";
	$VTQryMateria.="p.perapellidos, p.pernombres ";
	$VTQryMateria.=" order by  f.famnombre, m.mattipo, m.matnoconsecutivo";
	
	
	$VLdtDatosM = execute_query($VTQryMateria,$VLConexion);
	$VLnuDatosM = total_records($VLdtDatosM);
	if($VLnuDatosM >0){
	for( $i=0; $i<$VLnuDatosM; $i++)
	{
  		$VTMatDescripcion=get_result($VLdtDatosM,$i,"m.matdescripcion");
  		$VTMatSiglas=get_result($VLdtDatosM,$i,"m.matid");
  		$VTMatCreditos=get_result($VLdtDatosM,$i,"m.matnocredito");
  		$VTFamDescripcion=get_result($VLdtDatosM,$i,"f.famnombre");
		$VTDocNombre=get_result($VLdtDatosM,$i,"p.pernombres");
		$VTDocApellido=get_result($VLdtDatosM,$i,"p.perapellidos");
  ?>  
  <tr>
    <td><?php echo $i+1; ?>&nbsp;</td>
    <td><?php echo ($VTMatDescripcion); ?>&nbsp;</td>
    <td><?php echo ($VTDocApellido." ".$VTDocNombre); ?>&nbsp;</td>
  </tr>
  <?php } } else {?>
  <tr>
    <td colspan="3">NO TIENE DOCENTES ASIGNADO A LAS MATERIAS</td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="3"><?php //echo $VTQryMateria; ?>&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><?php echo $VLFechaTexto; ?>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

 <?php
 break;
}
////// FIN DEL REPORTE

?>

&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


</form>
</body>
</html>
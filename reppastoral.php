<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
<title>FICHA ESTUDIANTIL AREA DE RELIGION</title>
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


$VLdtCamp1=$_GET[txt_Camp1];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];


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
$VLQryCampo8="curdescripcion";
$VLQryCampo9="percodigo";
$VLQryCampo10="perapellidos";
$VLQryCampo11="pernombres";
$VLQryCampo12="perdocumento";
$VLQryCampo13="percc";
$VLQryCampo17="perdireccion";
$VLQryCampo21="pertelefono";
$VLQryCampo22="pardescripcion";
$VLQryCampo23="pasreligion";
$VLQryCampo24="pasparroquia";
$VLQryCampo25="pasbautismo";
$VLQryCampo26="pascomunion";
$VLQryCampo27="pasbiblia";
$VLQryCampo28="pasconfirmacion";
$VLQryCampo29="pasobserv";




$VLQry1="SELECT * from mtrcl  where mtrno=".$VLdtCamp1;
$VLQry2="SELECT a.anodescripcion from mtrcl m, nlctv a where m.anocodigo=a.anocodigo and m.mtrno=".$VLdtCamp1;
$VLQry3="SELECT c.curdescripcion from mtrcl m, grp g, crs c where m.grucodigo=g.grucodigo and g.curcodigo=c.curcodigo and m.mtrno=".$VLdtCamp1;
$VLQry4="SELECT p.percodigo, p.perapellidos, p.pernombres, p.perdocumento, p.percc, ";
$VLQry4.=" p.perdireccion, p.pertelefono from mtrcl m, nsttcnstdnt e, psn p where m.inescodigo=e.inescodigo and e.percodigo=p.percodigo and m.mtrno=".$VLdtCamp1;
$VLQry7="SELECT pardescripcion from prll a where parcodigo=";
$VLQry8="SELECT * from dtspstrl a where percodigo=";

$VLConexion=connect();


$VLdtDatos1 = execute_query($VLQry1,$VLConexion);
$VLnuDatos1 = total_records($VLdtDatos1);
	$VLdtCamp2=get_result($VLdtDatos1,0,$VLQryCampo2);
	$VLdtCamp3=get_result($VLdtDatos1,0,$VLQryCampo3);
	$VLdtCamp4=get_result($VLdtDatos1,0,$VLQryCampo4);
	$VLdtCamp5=get_result($VLdtDatos1,0,$VLQryCampo5);
	$VLdtCamp6=get_result($VLdtDatos1,0,$VLQryCampo6);
$VLdtDatos2 = execute_query($VLQry2,$VLConexion);
$VLnuDatos2 = total_records($VLdtDatos2);
	$VLdtCamp7=get_result($VLdtDatos2,0,$VLQryCampo7);
$VLdtDatos3 = execute_query($VLQry3,$VLConexion);
$VLnuDatos3 = total_records($VLdtDatos3);
	$VLdtCamp8=get_result($VLdtDatos3,0,$VLQryCampo8);
	
$VLdtDatos4 = execute_query($VLQry4,$VLConexion);
$VLnuDatos4 = total_records($VLdtDatos4);
	$VLdtCamp9=get_result($VLdtDatos4,0,$VLQryCampo9);
	$VLdtCamp10=get_result($VLdtDatos4,0,$VLQryCampo10);
	$VLdtCamp11=get_result($VLdtDatos4,0,$VLQryCampo11);
	$VLdtCamp12=get_result($VLdtDatos4,0,$VLQryCampo12);
	$VLdtCamp13=get_result($VLdtDatos4,0,$VLQryCampo13);
	$VLdtCamp17=get_result($VLdtDatos4,0,$VLQryCampo17);
	$VLdtCamp21=get_result($VLdtDatos4,0,$VLQryCampo21);

$VLQry7=$VLQry7.$VLdtCamp4;
$VLdtDatos7 = execute_query($VLQry7,$VLConexion);
$VLnuDatos7 = total_records($VLdtDatos7);
	$VLdtCamp22=get_result($VLdtDatos7,0,$VLQryCampo22);
$VLQry8=$VLQry8.$VLdtCamp9;

$VLdtDatos8 = execute_query($VLQry8,$VLConexion);
$VLnuDatos8 = total_records($VLdtDatos8);
	$VLdtCamp23=get_result($VLdtDatos8,0,$VLQryCampo23);
	$VLdtCamp24=get_result($VLdtDatos8,0,$VLQryCampo24);
	$VLdtCamp25=get_result($VLdtDatos8,0,$VLQryCampo25);
	$VLdtCamp26=get_result($VLdtDatos8,0,$VLQryCampo26);
	$VLdtCamp27=get_result($VLdtDatos8,0,$VLQryCampo27);
	$VLdtCamp28=get_result($VLdtDatos8,0,$VLQryCampo28);
	$VLdtCamp29=get_result($VLdtDatos8,0,$VLQryCampo29);

?>

<body  class="fuente">
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagenes/membrete.png" width="794" height="215" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" ><span class="fuente"><font size="6"  >FICHA ESTUDIANTIL ÁREA DE RELIGIÓN</font></span> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><font size="5"  > AÑO LECTIVO <?=$VLdtCamp7; ?> </font> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="70%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
      <tr>
        <td width="30%" align="right">AÑO EGB</td>
        <td width="20%" align="center"> <font size="4" color="#006600" class="mat"  > <?=$VLdtCamp8; ?> </font>&nbsp;</td>
        <td width="30%" align="right">PARALELO</td>
        <td width="20%" align="center"> <font size="4" color="#006600" class="mat"  ><?=$VLdtCamp22; ?></font>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

    </td>
    <td align="right"><img src="imagenes/foto.jpg" width="163" height="194" /></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
      <tr>
        <td><font size="5" >DATOS PERSONALES</td>
      </tr>
      <tr>
        <td>APELLIDOS Y NOMBRES: <font size="4"  color="#000099"  > <? echo ($VLdtCamp10." ".$VLdtCamp11); ?></font></td>
      </tr>
      <tr>
        <td>DOCUMENTO: <font size="4"  color="#000099"  > <? echo ($VLdtCamp12." ".$VLdtCamp13); ?></td>
      </tr>
      <tr>
        <td>DIRECCIÓN DOMICILIARIA: <font size="4"  color="#000099"  > <? echo ($VLdtCamp17); ?></td>
      </tr>
      <tr>
        <td>TELÉFONOS: <font size="4"  color="#000099"  ><? echo ($VLdtCamp21); ?></td>
      </tr>
      <tr>
        <td>RELIGIÓN A LA QUE PERTENECE: <font size="4"  color="#000099"  ><? echo ($VLdtCamp23); ?></td>
      </tr>
      <tr>
        <td>PARROQUIA DONDE PRACTICA: <font size="4"  color="#000099"  ><? echo ($VLdtCamp24); ?></td>
      </tr>
      <tr>
      <tr>
        <td>SACRAMENTOS RECIBIDOS:</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>BAUTISMO: <font size="4"  color="#000099"  ><? echo ($VLdtCamp25); ?></td>
    <td>COMUNIÓN: <font size="4"  color="#000099"  ><? echo ($VLdtCamp26); ?></td>
    <td>BIBLIA LATINOAMERICANA: <font size="4"  color="#000099"  ><? echo ($VLdtCamp27); ?></td>
    <td>CONFIRMACIÓN: <font size="4"  color="#000099"  ><? echo ($VLdtCamp28); ?></td>
  </tr>
</table>
</td>
      </tr>      
      <tr>
        <td>OBSERVACIONES: <font size="4"  color="#000099"  ><? echo ($VLdtCamp29); ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Esmeraldas, <?=$VLdtCamp6; ?></td>
      </tr>
      <tr>
        <td align="center">REPRESENTANTE</td>
      </tr>
    </table></td>
  </tr>
</table>


</body>
</html>
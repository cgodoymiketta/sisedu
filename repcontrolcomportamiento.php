<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
<title>HOJA DE CONTROL DE FALTAS AL COMPORTAMIENTO</title>
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
$VLdtCamp9=$_GET[txt_Camp9];
$VLdtCamp15=$_GET[txt_Camp15];
$VLBuscar=$_GET[buscar_x];
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
$VLQryCampo8="cursigla";
$VLQryCampo9="percodigo";
$VLQryCampo10="perapellidos";
$VLQryCampo11="pernombres";
$VLQryCampo12="pertelefono";
$VLQryCampo13="perdireccion";
$VLQryCampo14="parentezco";
$VLQryCampo15="parrepresent";
$VLQryCampo16="percodigo";




$VLQry1="SELECT * from mtrcl  where mtrno=".$VLdtCamp1;
$VLQry2="SELECT a.anodescripcion from mtrcl m, nlctv a where m.anocodigo=a.anocodigo and m.mtrno=".$VLdtCamp1;
$VLQry3="SELECT c.cursigla from mtrcl m, grp g, crs c where m.grucodigo=g.grucodigo and g.curcodigo=c.curcodigo and m.mtrno=".$VLdtCamp1;
$VLQry4="SELECT p.percodigo, p.perapellidos, p.pernombres, p.perdocumento, p.percc, p.pernacionalidad,";
$VLQry4.="p.perlugarnacimiento, p.perfechanacimiento, p.perdireccion, p.perparroquia, p.perraza,";
$VLQry4.="p.pertelefono, p.persexo from mtrcl m, nsttcnstdnt e, psn p where m.inescodigo=e.inescodigo and e.percodigo=p.percodigo and m.mtrno=".$VLdtCamp1;
$VLQry5="SELECT p.percodigo, p.perapellidos, p.pernombres, p.perdocumento, p.percc, f.parentezco,f.parrepresent from psn p, prntsc f ";
$VLQry5.=" where  p.percodigo=f.pariente and f.percodigo=";
$VLQry6="SELECT darinstproced, darrepite from dtscdmcs a where percodigo=";
$VLQry7="SELECT pardescripcion from prll a where parcodigo=";
$VLQry8="SELECT * from psn where percodigo=".$VLdtCamp15;
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
	$VLdtCamp14=get_result($VLdtDatos4,0,$VLQryCampo14);
$VLQry5=$VLQry5.$VLdtCamp9;
$VLdtDatos5 = execute_query($VLQry5,$VLConexion);
$VLnuDatos5 = total_records($VLdtDatos5);
	
$VLQry7=$VLQry7.$VLdtCamp4;
$VLdtDatos7 = execute_query($VLQry7,$VLConexion);
$VLnuDatos7 = total_records($VLdtDatos7);
	$VLdtCamp22=get_result($VLdtDatos7,0,$VLQryCampo22);

if ( $VLBuscar!="")
{
$VLdtDatos8 = execute_query($VLQry8,$VLConexion);
$VLnuDatos8 = total_records($VLdtDatos8);
	$VLdtCamp10k=get_result($VLdtDatos8,0,"perapellidos");
	$VLdtCamp11k=get_result($VLdtDatos8,0,"pernombres");
}

?>

<body  class="fuente">
<form action="repcontrolcomportamiento.php" method="get">

<table width="1000" border="0" cellspacing="0" cellpadding="0">
<?php if ($VLBuscar=="") { ?>
  <tr>
    <td width="10">ESTUDIANTE:<input name="txt_Camp1" type="hidden" value="<?=$VLdtCamp1; ?>" /><input name="txt_Camp9" type="hidden" value="<?=$VLdtCamp9; ?>" /><input name="nlctv" type="hidden" value="<?=$VLAnoLocal; ?>" /><input name="nsttcn" type="hidden" value="<?=$VLInstitucion; ?>" /></td>
    <td><font size="4"  color="#000099"  > <? echo ($VLdtCamp10." ".$VLdtCamp11); ?></font></td>
  </tr>
  <tr>
    <td>REPRESENTANTE:</td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    	<?php if($VLnuDatos5>0) { ?>
        <select name="txt_Camp15" >
        	<?php for ( $i=0; $i<$VLnuDatos5; $i++)
			{
				$VLdtCamp9a=get_result($VLdtDatos5,$i,$VLQryCampo9);
				$VLdtCamp10a=get_result($VLdtDatos5,$i,$VLQryCampo10);
				$VLdtCamp11a=get_result($VLdtDatos5,$i,$VLQryCampo11);
				$VLdtNombre=$VLdtCamp10a." ".$VLdtCamp11a;
				?>
            <option value="<?=$VLdtCamp9a; ?>" ><? echo ($VLdtNombre); ?></option>
            <?php } ?>
        </select> 
        <?php }?>
	</td>
    <td width="15%"><input name="buscar" type="image" id="buscar" onClick="sumit" src="imagenes/027-folder_searchx24.gif" alt="Buscar" width="24" height="24" border="0" value="buscar"></td>
  </tr>
</table></td>
  </tr>
  <?php } else { ?>
 <tr>
 <td>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagenes/membrete2.png" width="779" height="142" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>  
  <tr>
    <td align="center"><span class="fuente"><font size="4" class="mat" >HOJA DE CONTROL DE FALTAS AL COMPORTAMIENTO</font></span></td>
  </tr>
</table>
</td>
    <td valign="bottom"><img src="imagenes/foto.jpg" width="143" height="160" /></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="65%"><font size="2">APELLIDOS Y NOMBRES: </font>  <font size="2"  color="#000099"  > <? echo ($VLdtCamp10." ".$VLdtCamp11); ?></font></td>
    <td width="35%"><font size="2">AÑO LECTIVO: <font size="2"  color="#000099"  > <? echo ($VLdtCamp7); ?></font></td>
  </tr>
  <tr>
    <td><font size="2">DIRECCIÓN: <font size="2"  color="#000099"  > <? echo ($VLdtCamp13); ?></font></td>
    <td><font size="2">TELÉFONOS: <font size="2"  color="#000099"  > <? echo ($VLdtCamp12); ?></font></td>
  </tr>
  <tr>
    <td><font size="2">REPRESENTANTE:  <font size="2"  color="#000099"  > <? echo ($VLdtCamp10k." ".$VLdtCamp11k); ?></td>
    <td><font size="2">FIRMA:</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
<table width="100%" border="1" cellspacing="0" cellpadding="4" >
  <tr>
    <td width="10%"  align="center" >FECHA</td>
    <td width="60%"  align="center"  >FALTA COMETIDA</td>
    <td  align="center" >FIRMA DEL REPRESENTANTE</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
    
    </td>
  </tr>
</table>
  </td>
 </tr>
<?php } ?>

</table>
</form>
</body>
</html>
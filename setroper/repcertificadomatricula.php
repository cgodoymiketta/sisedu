<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
<title>MATRÍCULA REGLAMENTARIA</title>
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

require "../cnxn_bsddts/mnjdr_bsdts.php";
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
$VLdtCamp9=$_GET[txt_Camp9];
$VLdtCamp15=$_GET[txt_Camp15];
$VLBuscar=$_GET[buscar_x];


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
$VLQryCampo14="pernacionalidad";
$VLQryCampo15="perlugarnacimiento";
$VLQryCampo16="perfechanacimiento";
$VLQryCampo17="perdireccion";
$VLQryCampo18="perparroquia";
$VLQryCampo19="perraza";
$VLQryCampo20="persexo";
$VLQryCampo21="pertelefono";
$VLQryCampo22="pardescripcion";
$VLQryCampo23="darrepite";
$VLQryCampo24="darinstproced";
$VLQryCampo25="parentezco";
$VLQryCampo26="parrepresent";
$VLQryCampo27="ddsdiscapacidad";
$VLQryCampo28="ddsporcentaje";
$VLQryCampo29="ddscarne";
$VLQryCampo30="espdescripcion";



$VLQry1="SELECT * from mtrcl  where mtrno=".$VLdtCamp1;
$VLQry2="SELECT a.anodescripcion from mtrcl m, nlctv a where m.anocodigo=a.anocodigo and m.mtrno=".$VLdtCamp1;
$VLQry3="SELECT c.cursigla, c.curdescripcion, e.espdescripcion 
from mtrcl m, grp g, crs c , spcldd e
where m.grucodigo=g.grucodigo and g.curcodigo=c.curcodigo and 
e.espcodigo=g.espcodigo and m.mtrno=".$VLdtCamp1;
$VLQry4="SELECT p.percodigo, p.perapellidos, p.pernombres, p.perdocumento, p.percc, p.pernacionalidad,";
$VLQry4.="p.perlugarnacimiento, p.perfechanacimiento, p.perdireccion, p.perparroquia, p.perraza,";
$VLQry4.="p.pertelefono, p.persexo from mtrcl m, nsttcnstdnt e, psn p where m.inescodigo=e.inescodigo and e.percodigo=p.percodigo and m.mtrno=".$VLdtCamp1;
$VLQry5="SELECT p.perapellidos, p.pernombres, p.perdocumento, p.percc, f.parentezco,f.parrepresent from psn p, prntsc f ";
$VLQry5.=" where  p.percodigo=f.pariente and f.percodigo=";
$VLQry6="SELECT darinstproced, darrepite from dtscdmcs a where percodigo=";
$VLQry7="SELECT pardescripcion from prll a where parcodigo=";
$VLQry8="SELECT ddsdiscapacidad, ddsporcentaje, ddscarne from dtsdsld a where percodigo=";

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
	$VLdtCamp30=get_result($VLdtDatos3,0,$VLQryCampo30);
$VLdtDatos4 = execute_query($VLQry4,$VLConexion);
$VLnuDatos4 = total_records($VLdtDatos4);
	$VLdtCamp9=get_result($VLdtDatos4,0,$VLQryCampo9);
	$VLdtCamp10=get_result($VLdtDatos4,0,$VLQryCampo10);
	$VLdtCamp11=get_result($VLdtDatos4,0,$VLQryCampo11);
	$VLdtCamp12=get_result($VLdtDatos4,0,$VLQryCampo12);
	$VLdtCamp13=get_result($VLdtDatos4,0,$VLQryCampo13);
	$VLdtCamp14=get_result($VLdtDatos4,0,$VLQryCampo14);
	$VLdtCamp15=get_result($VLdtDatos4,0,$VLQryCampo15);
	$VLdtCamp16=get_result($VLdtDatos4,0,$VLQryCampo16);
	$VLdtCamp17=get_result($VLdtDatos4,0,$VLQryCampo17);
	$VLdtCamp18=get_result($VLdtDatos4,0,$VLQryCampo18);
	$VLdtCamp19=get_result($VLdtDatos4,0,$VLQryCampo19);
	$VLdtCamp20=get_result($VLdtDatos4,0,$VLQryCampo20);
	$VLdtCamp21=get_result($VLdtDatos4,0,$VLQryCampo21);
$VLQry5=$VLQry5.$VLdtCamp9;
$VLdtDatos5 = execute_query($VLQry5,$VLConexion);
$VLnuDatos5 = total_records($VLdtDatos5);
	$VLdtCamp10a=get_result($VLdtDatos5,0,$VLQryCampo10);
	$VLdtCamp11a=get_result($VLdtDatos5,0,$VLQryCampo11);
	$VLdtCamp12a=get_result($VLdtDatos5,0,$VLQryCampo12);
	$VLdtCamp13a=get_result($VLdtDatos5,0,$VLQryCampo13);
	$VLdtCamp25a=get_result($VLdtDatos5,0,$VLQryCampo25);
	$VLdtCamp26a=get_result($VLdtDatos5,0,$VLQryCampo26);
	$VLdtCamp10b=get_result($VLdtDatos5,1,$VLQryCampo10);
	$VLdtCamp11b=get_result($VLdtDatos5,1,$VLQryCampo11);
	$VLdtCamp12b=get_result($VLdtDatos5,1,$VLQryCampo12);
	$VLdtCamp13b=get_result($VLdtDatos5,1,$VLQryCampo13);
	$VLdtCamp25b=get_result($VLdtDatos5,1,$VLQryCampo25);
	$VLdtCamp26b=get_result($VLdtDatos5,1,$VLQryCampo26);
	$VLdtCamp10c=get_result($VLdtDatos5,2,$VLQryCampo10);
	$VLdtCamp11c=get_result($VLdtDatos5,2,$VLQryCampo11);
	$VLdtCamp12c=get_result($VLdtDatos5,2,$VLQryCampo12);
	$VLdtCamp13c=get_result($VLdtDatos5,2,$VLQryCampo13);
	$VLdtCamp25c=get_result($VLdtDatos5,2,$VLQryCampo25);
	$VLdtCamp26c=get_result($VLdtDatos5,2,$VLQryCampo26);
	
$VLQry6=$VLQry6.$VLdtCamp9;
$VLdtDatos6 = execute_query($VLQry6,$VLConexion);
$VLnuDatos6 = total_records($VLdtDatos6);
	$VLdtCamp23=get_result($VLdtDatos6,0,$VLQryCampo23);
	$VLdtCamp24=get_result($VLdtDatos6,0,$VLQryCampo24);
$VLQry7=$VLQry7.$VLdtCamp4;
$VLdtDatos7 = execute_query($VLQry7,$VLConexion);
$VLnuDatos7 = total_records($VLdtDatos7);
	$VLdtCamp22=get_result($VLdtDatos7,0,$VLQryCampo22);
$VLQry8=$VLQry8.$VLdtCamp9;
$VLdtDatos8 = execute_query($VLQry8,$VLConexion);
$VLnuDatos8 = total_records($VLdtDatos8);
if ( $VLnuDatos8>0){
	$VLdtCamp27=get_result($VLdtDatos8,0,$VLQryCampo27);
	$VLdtCamp28=get_result($VLdtDatos8,0,$VLQryCampo28);
	$VLdtCamp29=get_result($VLdtDatos8,0,$VLQryCampo29);
}

?>

<body  class="fuente">

<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="../imagenes/membrete.png" width="779" height="217" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
    <table width="650" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" ><span class="fuente"><font size="6" class="mat" > CERTIFICADO DE MATRÍCULA </font></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><font size="5"  > AÑO LECTIVO </font> </td>
  </tr>
  <tr>
    <td align="center"><font size="5"  ><?=$VLdtCamp7; ?> </font> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="justify" ><p style='text-align:justify;line-height:200%;widows:' ><b><font size="4" >CERTIFICO:</font></b> <font size="4" >Que el estudiante</font> <b><font color="#000099" size="4"><? echo ($VLdtCamp10." ".$VLdtCamp11); ?></font></b> <font size="4" >previo los requisitos legales, se matriculó en </font><font color="#000099" size="4"><b>
      <?=$VLdtCamp8; ?> DE
      <?=$VLdtCamp30; ?> </b></font>,<font size="4" > el </font><b><font color="#000099">
        <?=$VLdtCamp6; ?>
        </font></b>.<font size="4" > Así consta en el Folio No. </font><font size="4" color="#FF0000" class="mat"  >
          <?=$VLdtCamp5; ?>
          </font><font size="4" > Matrícula No. </font><font size="4" color="#FF0000" class="mat"  >
            <?=$VLdtCamp1; ?>
          </font><font size="4" > del libro respectivo.</font></p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td align="right" ><font size="4" >Esmeraldas, <?=$VLFechaTexto; ?></font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><table width="100%" border="0">
      <tr>
        <td width="5%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td width="5%">&nbsp;</td>
      </tr>
      <tr>
        <td width="5%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td width="5%">&nbsp;</td>
      </tr>
      <tr>
        <td width="5%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td width="5%">&nbsp;</td>
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
        <td align="center"><font size="4" >Rectora</font></td>
        <td>&nbsp;</td>
        <td align="center"><font size="4" >Secretaria</font></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center">&nbsp;</td>
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
</td>
  </tr>
</table>
</body>
</html>
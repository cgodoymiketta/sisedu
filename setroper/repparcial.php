
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
$VLdtCamp11=$_GET[dt1];
$VLdtChk1=$_GET[chk_1];
$VLdtChk2=$_GET[chk_2];
$VLdtChk3=$_GET[chk_3];
$VLdtChk4=$_GET[chk_4];
$VLdtChk5=$_GET[chk_5];
$VLdtChk6=$_GET[chk_6];
$VLdtChk7=$_GET[chk_7];
$VLdtChk8=$_GET[chk_8];
$VLdtChk9=$_GET[chk_9];
$VLdtChk10=$_GET[chk_10];
$VLdtChk11=$_GET[chk_11];
$VLdtChk12=$_GET[chk_12];
$VLdtChk13=$_GET[chk_13];
$VLdtChk14=$_GET[chk_14];
$VLdtChk15=$_GET[chk_15];
$VLdtChk16=$_GET[chk_16];
$VLdtChk17=$_GET[chk_17];
$VLdtChk18=$_GET[chk_18];
$VLdtChk19=$_GET[chk_19];
$VLdtChk20=$_GET[chk_20];
$VLdtChk21=$_GET[chk_21];
$VLdtChk22=$_GET[chk_22];
$VLdtChk23=$_GET[chk_23];

$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$VLtxtCampo1="No";
$VLtxtCampo2="Matr";
$VLtxtCampo3="Apellidos";
$VLtxtCampo4="Nombres";
$VLtxtCampo5="Documento";
$VLtxtCampo6="No";
$VLtxtCampo7="Sexo";
$VLtxtCampo8="Fec. Nacimiento";
$VLtxtCampo9="Edad";
$VLtxtCampo10="Nacionalidad";
$VLtxtCampo11="Discapacidad";
$VLtxtCampo12="Porcentaje";
$VLtxtCampo13="Raza";
$VLtxtCampo14="Telefono";
$VLtxtCampo15="Direccion";
$VLtxtCampo16="Parroquia";
$VLtxtCampo17="Curso";
$VLtxtCampo18="Paralelo";
$VLtxtCampo19="";
$VLtxtCampo20="Rep. Apellidos";
$VLtxtCampo21="Rep. Nombres";
$VLtxtCampo22="Rep. No Doc";
$VLtxtCampo23="Rep. Parentezco";

$VTQryCamp1="No";
$VTQryCamp2="m.mtrno";
$VTQryCamp3="p.perapellidos";
$VTQryCamp4="p.pernombres";
$VTQryCamp5="p.perdocumento";
$VTQryCamp6="p.percc";
$VTQryCamp7="p.persexo";
$VTQryCamp8="p.perfechanacimiento";
$VTQryCamp9="edad";
$VTQryCamp10="p.pernacionalidad";
$VTQryCamp11="d.ddsdiscapacidad";
$VTQryCamp12="d.ddsporcentaje";
$VTQryCamp13="p.perraza";
$VTQryCamp14="p.pertelefono";
$VTQryCamp15="p.perdireccion";
$VTQryCamp16="p.perparroquia";
$VTQryCamp17="c.curdescripcion";
$VTQryCamp18="pr.pardescripcion";
$VTQryCamp19="";
$VTQryCamp20="p2.perapellidos";
$VTQryCamp21="p2.pernombres";
$VTQryCamp22="p2.percc";
$VTQryCamp23="pa.parentezco";



$VLQry1=" SELECT p.perapellidos, p.pernombres, p.perdocumento, p.percc, p.persexo, p.pernacionalidad, p.perdireccion, p.perraza, p.perparroquia, p.pertelefono, p.perfechanacimiento, d.ddsdiscapacidad, d.ddsporcentaje, i.inescodigo, m.mtrno, pr.pardescripcion, c.curdescripcion, p2.perapellidos, p2.pernombres, p2.percc, pa.parentezco
FROM psn p, dtsdsld d, nsttcnstdnt i, mtrcl m, prll pr, grp g, crs c, psn p2, prntsc pa
WHERE p.percodigo = d.percodigo
AND p.percodigo = pa.percodigo
AND pa.pariente = p2.percodigo
AND p.percodigo = i.percodigo
AND i.inescodigo = m.inescodigo
AND m.parcodigo = pr.parcodigo
AND m.grucodigo = g.grucodigo
AND g.curcodigo = c.curcodigo 
AND g.curcodigo=".$VLdtCamp4."
AND pr.parcodigo=".$VLdtCamp11."
order by p.perapellidos, p.pernombres";


$VLConexion=connect();
$Query = "Select * from nlctv where anocodigo= ".$VLAnoLocal;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);

if ( $VLnuDatos>0 )
{
				$VLdtPeriodo=get_result($VLdtDatos,0,"anodescripcion");
}

$VLdtDatos1 = execute_query($VLQry1,$VLConexion);
$VLnuDatos1 = total_records($VLdtDatos1);




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DATOS GENERALES DE LOS PARCIALES </title>
</head>

<body>
<form id="RAG" name="RAG" method="get" action="">

<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><img src="../imagenes/membrete2.png" width="779" height="142" /></td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><font size="+2">NOMINA DE ESTUDIANTES MATRICULADOS</font></td>
      </tr>
      <tr>
        <td align="center"> <font size="+2"> PERIODO: <? echo $VLdtPeriodo; ?> </font> </td>
      </tr>
      
    </table>
	</td>
  </tr>
  <TR>
  <TD>&nbsp;</TD>
  </TR>
  <tr>
  <td><table width="100%" border="1">
  <tr>
  <? 
  	if ($VLdtChk1!=""){ 
	
	?>
    <td><? echo $VLtxtCampo1; ?></td>
  <? 
  	}
  	if ($VLdtChk2!=""){ 
  ?>
    <td><? echo $VLtxtCampo2; ?></td>
  <? 
  	}
  	if ($VLdtChk3!=""){ 
  ?>
    <td><? echo $VLtxtCampo3; ?></td>
  <? 
  	}
  	if ($VLdtChk4!=""){ 
  ?>
    <td><? echo $VLtxtCampo4; ?></td>
  <? 
  	}
  	if ($VLdtChk5!=""){ 
  ?>
    <td><? echo $VLtxtCampo5; ?></td>
  <? 
  	}
  	if ($VLdtChk6!=""){ 
  ?>
    <td><? echo $VLtxtCampo6; ?></td>
  <? 
  	}
  	if ($VLdtChk7!=""){ 
  ?>
    <td><? echo $VLtxtCampo7; ?></td>
  <? 
  	}
  	if ($VLdtChk8!=""){ 
  ?>
    <td><? echo $VLtxtCampo8; ?></td>
  <? 
  	}
  	if ($VLdtChk9!=""){ 
  ?>
    <td><? echo $VLtxtCampo9; ?></td>
  <? 
  	}
  	if ($VLdtChk10!=""){ 
  ?>
    <td><? echo $VLtxtCampo10; ?></td>
  <? 
  	}
  	if ($VLdtChk11!=""){ 
  ?>
    <td><? echo $VLtxtCampo11; ?></td>
  <? 
  	}
  	if ($VLdtChk12!=""){ 
  ?>
    <td><? echo $VLtxtCampo12; ?></td>
  <? 
  	}
  	if ($VLdtChk13!=""){ 
  ?>
    <td><? echo $VLtxtCampo13; ?></td>
  <? 
  	}
  	if ($VLdtChk14!=""){ 
  ?>
    <td><? echo $VLtxtCampo14; ?></td>
  <? 
  	}
  	if ($VLdtChk15!=""){ 
  ?>
    <td><? echo $VLtxtCampo15; ?></td>
  <? 
  	}
  	if ($VLdtChk16!=""){ 
  ?>
    <td><? echo $VLtxtCampo16; ?></td>
  <? 
  	}
  	if ($VLdtChk17!=""){ 
  ?>
    <td><? echo $VLtxtCampo17; ?></td>
  <? 
  	}
  	if ($VLdtChk18!=""){ 
  ?>
    <td><? echo $VLtxtCampo18; ?></td>
  <? 
  	}
  	if ($VLdtChk19!=""){ 
  ?>
    <td><? echo $VLtxtCampo19; ?></td>
  <? 
  	}
  	if ($VLdtChk20!=""){ 
  ?>
    <td><? echo $VLtxtCampo20; ?></td>
  <? 
  	}
  	if ($VLdtChk21!=""){ 
  ?>
    <td><? echo $VLtxtCampo21; ?></td>
  <? 
  	}
  	if ($VLdtChk22!=""){ 
  ?>
    <td><? echo $VLtxtCampo22; ?></td>
  <? 
  	}
  	if ($VLdtChk23!=""){ 
  ?>
    <td><? echo $VLtxtCampo23; ?></td>
  <? 
  	}
  ?>
  </tr>
<?php  
		
	if ( $VLnuDatos1>0 )
	{  
  		for ( $i=0; $i<$VLnuDatos1; $i++)
		{
			
			$VTdtCampo1=get_result($VLdtDatos1,$i,$VTQryCamp1);
			$VTdtCampo2=get_result($VLdtDatos1,$i,$VTQryCamp2);
			$VTdtCampo3=get_result($VLdtDatos1,$i,$VTQryCamp3);
			$VTdtCampo4=get_result($VLdtDatos1,$i,$VTQryCamp4);
			$VTdtCampo5=get_result($VLdtDatos1,$i,$VTQryCamp5);
			$VTdtCampo6=get_result($VLdtDatos1,$i,$VTQryCamp6);
			$VTdtCampo7=get_result($VLdtDatos1,$i,$VTQryCamp7);
			$VTdtCampo8=get_result($VLdtDatos1,$i,$VTQryCamp8);
			$VTdtCampo9=get_result($VLdtDatos1,$i,$VTQryCamp9);
			$VTdtCampo10=get_result($VLdtDatos1,$i,$VTQryCamp10);
			$VTdtCampo11=get_result($VLdtDatos1,$i,$VTQryCamp11);
			$VTdtCampo12=get_result($VLdtDatos1,$i,$VTQryCamp12);
			$VTdtCampo13=get_result($VLdtDatos1,$i,$VTQryCamp13);
			$VTdtCampo14=get_result($VLdtDatos1,$i,$VTQryCamp14);
			$VTdtCampo15=get_result($VLdtDatos1,$i,$VTQryCamp15);
			$VTdtCampo16=get_result($VLdtDatos1,$i,$VTQryCamp16);
			$VTdtCampo17=get_result($VLdtDatos1,$i,$VTQryCamp17);
			$VTdtCampo18=get_result($VLdtDatos1,$i,$VTQryCamp18);
			//$VTdtCampo19=get_result($VLdtDatos1,$i,$VTQryCamp19);
			$VTdtCampo20=get_result($VLdtDatos1,$i,$VTQryCamp20);
			$VTdtCampo21=get_result($VLdtDatos1,$i,$VTQryCamp21);
			$VTdtCampo22=get_result($VLdtDatos1,$i,$VTQryCamp22);
			$VTdtCampo23=get_result($VLdtDatos1,$i,$VTQryCamp23);
			
			
			
			
?>
  <tr>
  <? 
  	if ($VLdtChk1!=""){ 
  ?>
    <td><? echo $i+1; ?></td>
  <? 
  	}
  	if ($VLdtChk20!=""){ 
  ?>
    <td><? echo  ($VTdtCampo2); ?></td>
  <? 
  	}
  	if ($VLdtChk3!=""){ 
  ?>
    <td><? echo  ($VTdtCampo3) ?></td>
  <? 
  	}
  	if ($VLdtChk4!=""){ 
  ?>
    <td><? echo  ($VTdtCampo4); ?></td>
  <? 
  	}
  	if ($VLdtChk5!=""){ 
  ?>
    <td><? echo  ($VTdtCampo5); ?></td>
  <? 
  	}
  	if ($VLdtChk6!=""){ 
  ?>
    <td><? echo  ($VTdtCampo6); ?></td>
  <? 
  	}
  	if ($VLdtChk7!=""){ 
  ?>
    <td><? echo  ($VTdtCampo7); ?></td>
  <? 
  	}
  	if ($VLdtChk8!=""){ 
  ?>
    <td><? echo  ($VTdtCampo8); ?></td>
  <? 
  	}
  	if ($VLdtChk9!=""){ 
  ?>
    <td><? echo  ($VTdtCampo9); ?></td>
  <? 
  	}
  	if ($VLdtChk10!=""){ 
  ?>
    <td><? echo  ($VTdtCampo10); ?></td>
  <? 
  	}
  	if ($VLdtChk11!=""){ 
  ?>
    <td><? echo  ($VTdtCampo11); ?></td>
  <? 
  	}
  	if ($VLdtChk12!=""){ 
  ?>
    <td><? echo  ($VTdtCampo12); ?></td>
  <? 
  	}
  	if ($VLdtChk13!=""){ 
  ?>
    <td><? echo  ($VTdtCampo13); ?></td>
  <? 
  	}
  	if ($VLdtChk14!=""){ 
  ?>
    <td><? echo  ($VTdtCampo14); ?></td>
  <? 
  	}
  	if ($VLdtChk15!=""){ 
  ?>
    <td><? echo  ($VTdtCampo15); ?></td>
  <? 
  	}
  	if ($VLdtChk16!=""){ 
  ?>
    <td><? echo  ($VTdtCampo16); ?></td>
  <? 
  	}
  	if ($VLdtChk17!=""){ 
  ?>
    <td><? echo  ($VTdtCampo17); ?></td>
  <? 
  	}
  	if ($VLdtChk18!=""){ 
  ?>
    <td><? echo  ($VTdtCampo18); ?></td>
  <? 
  	}
  	if ($VLdtChk19!=""){ 
  ?>
    <td><? //echo  ($VTdtCampo19); ?></td>
  <? 
  	}
  	if ($VLdtChk20!=""){ 
  ?>
    <td><? echo  ($VTdtCampo20); ?></td>
  <? 
  	}
  	if ($VLdtChk21!=""){ 
  ?>
    <td><? echo  ($VTdtCampo21); ?></td>
  <? 
  	}
  	if ($VLdtChk22!=""){ 
  ?>
    <td><? echo  ($VTdtCampo22); ?></td>
  <? 
  	}
  	if ($VLdtChk23!=""){ 
  ?>
    <td><? echo  ($VTdtCampo23); ?></td>
  <? 
  	}
  	 
  ?>
  </tr>
<?php
		}
	}

?>
</table>
&nbsp;</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
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
</table>

  </td>
  </tr>
</table>
</form>
</body>
</html>
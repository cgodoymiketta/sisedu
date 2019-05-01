
<?php 

require "cnxn_bsddts/mnjdr_bsdts.php";
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
$VLdtCamp12=$_GET[txt_Camp12];
$VLdtCamp13=$_GET[txt_Camp13];
$VLdtCamp14=$_GET[txt_Camp14];/// VERSION

$VLdtprcodigo=$_GET[txt_dtprcodigo];
$VLdtprtareas=$_GET[txt_Tarea];
$VLdtpractindiv=$_GET[txt_ActI];
$VLdtpractgrupal=$_GET[txt_ActG];
$VLdtprlecciones=$_GET[txt_lecc];
$VLdtprprueba=$_GET[txt_Prb];
$VLdtprpromedio=$_GET[txt_Pro];

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

$QueryD="Select u.usucodigo, u.percodigo, d.indocodigo, p.perapellidos, p.pernombres, p.percc ";
$QueryD.="from sr u, nsttcndcnt d, psn p ";
$QueryD.="where u.percodigo=d.percodigo and p.percodigo=u.percodigo and u.usucodigo=".$VLUsuario;
$VLdtDatosD = execute_query($QueryD,$VLConexion);
$VLnuDatosD = total_records($VLdtDatosD);

if ( $VLnuDatosD>0 )
{
				$VLdtCamp1=get_result($VLdtDatosD,0,"u.percodigo");
				$VLdtCamp2=get_result($VLdtDatosD,0,"d.indocodigo");
				$VLdtApellidos=get_result($VLdtDatosD,0,"p.perapellidos");
				$VLdtNombres=get_result($VLdtDatosD,0,"p.pernombres");
}

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

	$VtQueryQ=" Select quidescripcion from qmstr where quicodigo=".$VLdtCamp6;
	$VtQueryPr=" Select prcdescripcion from prcl where prccodigo=".$VLdtCamp7;

	$VLdtDatosQ = execute_query($VtQueryQ,$VLConexion);
	$VLnuDatosQ = total_records($VLdtDatosQ);
	if ( $VLnuDatosQ>0 )
	{
		$VtQuimestre=get_result($VLdtDatosQ,0,"quidescripcion");
	}
	$VLdtDatosPr = execute_query($VtQueryPr,$VLConexion);
	$VLnuDatosPr = total_records($VLdtDatosPr);
	if ( $VLnuDatosPr>0 )
	{
		$VtParcial=get_result($VLdtDatosPr,0,"prcdescripcion");
	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPORTE DE NOTAS</title>
</head>

<body>
<form id="RAG" name="RAG" method="get" action="">

<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagenes/membrete2.png" width="779" height="142" /></td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
<tr>
        <td align="center"><font size="+1"> <? if( $VtMateriaTipo==5 ) { ?>
         CUADRO RESUMEN <? } else { ?> CUADRO DE APROVECHAMIENTO <? } ?> </font>  </td>
      </tr>
      <tr>
        <td align="center"><font size="+1"> <? echo $VtQuimestre." - ".$VtParcial; ?>  </font></td>
      </tr>
      <tr>
        <td align="center"><font size="+1"> AÑO LECTIVO <? echo $VLdtPeriodo; ?> </font> </td>
      </tr>      
      <tr>
        <td align="center">&nbsp;</td>
      </tr>    
      <tr>
        <td align="center">&nbsp;</td>
      </tr>    
      </table>
	</td>
  </tr>
  <TR>
  <TD>
<table width="100%" border="0">
<?php 
/////////////////  CONSULTAMOS CURSO / PARALELO / MATERIA / QUIMESTRE / PARCIAL
	$VtQueryE=" Select espsiglas from spcldd where espcodigo=".$VLdtCamp12;
	$VtQueryC=" Select curdescripcion from crs where curcodigo=".$VLdtCamp9;
	$VtQueryP=" Select pardescripcion from prll where parcodigo=".$VLdtCamp8;
	$VtQueryM=" Select matdescripcion, mattipo, famcodigo from mtr where matcodigo=".$VLdtCamp10;
	$VtQueryQ=" Select quidescripcion from qmstr where quicodigo=".$VLdtCamp6;
	$VtQueryPr=" Select prcdescripcion from prcl where prccodigo=".$VLdtCamp7;
	
	$VLdtDatosE = execute_query($VtQueryE,$VLConexion);
	$VLnuDatosE = total_records($VLdtDatosE);
	if ( $VLnuDatosE>0 )
	{
		$VtSiglas=get_result($VLdtDatosE,0,"espsiglas");
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
	$VLdtDatosM = execute_query($VtQueryM,$VLConexion);
	$VLnuDatosM = total_records($VLdtDatosM);
	if ( $VLnuDatosM>0 )
	{
		$VtMateria=get_result($VLdtDatosM,0,"matdescripcion");
		$VtMateriaTipo=get_result($VLdtDatosM,0,"mattipo");
		$VtFamilia=get_result($VLdtDatosM,0,"famcodigo");
		
	}
	$VLdtDatosQ = execute_query($VtQueryQ,$VLConexion);
	$VLnuDatosQ = total_records($VLdtDatosQ);
	if ( $VLnuDatosQ>0 )
	{
		$VtQuimestre=get_result($VLdtDatosQ,0,"quidescripcion");
	}
	$VLdtDatosPr = execute_query($VtQueryPr,$VLConexion);
	$VLnuDatosPr = total_records($VLdtDatosPr);
	if ( $VLnuDatosPr>0 )
	{
		$VtParcial=get_result($VLdtDatosPr,0,"prcdescripcion");
	}
	

	$VTPromedioCurso=0;
	$VTDivisor=0;
	
switch ($VtMateriaTipo) {
case "1":
	/////////////////////PARA MATERIAS CUANTITATIVAS
	///////////////  DETERMINAMOS LA VERSION
  switch( $VLdtCamp14)///
  {
  case "0": /////////////  version 1.0
  
	if ( $VLdtCamp13!=""){
		
?>

<tr>
	<td ><fieldset  >
						  <legend ><?  echo utf8_encode($VtSiglas." ".$VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre." - ".$VtParcial); ?></legend>
						<table width="100%" border="1">
						  <tr>
                          	<td align="center" rowspan="3">NO</td>
							<td width="40%" align="center" rowspan="3"><font size="-1" ><input type="hidden" name="txt_Camp13" value="<?php echo $VLdtCamp13; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>"><input type="hidden" name="txt_familia" value="<?php echo $VtFamilia; ?>">NOMINA</font> <?php //echo $VLCadena[3]."-".$VLTemp[3]; ?></td>
<?php                          
$Vtquery= " Select p.perapellidos, p.pernombres, p.percc, p.percodigo
, pd.dtprcodigo, pd.dtprtareas, pd.dtpractindiv,pd.dtpractgrupal, 
 pd.dtprlecciones, pd.dtprprueba, pd.dtprpromedio, 
 pd.prcnota1, pd.prcnota2, pd.prcnota3, pd.prcnota4, pd.prcnota5, pd.prcnota6,
 pd.prcnota7, pd.prcnota8, pd.prcdesc1, pd.prcdesc2, pd.prcdesc3, pd.prcdesc4,
 pd.prcdesc5, pd.prcdesc6, pd.prcdesc7, pd.prcdesc8, pd.prcfecha1, pd.prcfecha2,
 pd.prcfecha3, pd.prcfecha4, pd.prcfecha5, pd.prcfecha6, pd.prcfecha7, pd.prcfecha8
from mtrcl m, psn p, grp g, nsttcnstdnt n
, prcldtll pd, qmstrdtll qd
where p.percodigo=n.percodigo and n.inescodigo=m.inescodigo 
and m.grucodigo=g.grucodigo and m.parcodigo=".$VLdtCamp8." and g.espcodigo=".$VLdtCamp12." and
g.curcodigo=".$VLdtCamp9." and m.mtrno=qd.mtrno and qd.matcodigo=".$VLdtCamp10." 
and qd.quicodigo=".$VLdtCamp6." and pd.prccodigo=".$VLdtCamp7." and qd.dtqmcodigo=pd.dtqmcodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
		if ( $VLnuDatos>0 )
	{
		$VTdtprDesc1=get_result($VLdtDatos,0,"pd.prcdesc1");
		$VTdtprDesc2=get_result($VLdtDatos,0,"pd.prcdesc2");
		$VTdtprDesc3=get_result($VLdtDatos,0,"pd.prcdesc3");
		$VTdtprDesc4=get_result($VLdtDatos,0,"pd.prcdesc4");
		$VTdtprDesc5=get_result($VLdtDatos,0,"pd.prcdesc5");
		$VTdtprDesc6=get_result($VLdtDatos,0,"pd.prcdesc6");
		$VTdtprDesc7=get_result($VLdtDatos,0,"pd.prcdesc7");
		$VTdtprDesc8=get_result($VLdtDatos,0,"pd.prcdesc8");
		$VTdtprFecha1=get_result($VLdtDatos,0,"pd.prcfecha1");
		$VTdtprFecha2=get_result($VLdtDatos,0,"pd.prcfecha2");
		$VTdtprFecha3=get_result($VLdtDatos,0,"pd.prcfecha3");
		$VTdtprFecha4=get_result($VLdtDatos,0,"pd.prcfecha4");
		$VTdtprFecha5=get_result($VLdtDatos,0,"pd.prcfecha5");
		$VTdtprFecha6=get_result($VLdtDatos,0,"pd.prcfecha6");
		$VTdtprFecha7=get_result($VLdtDatos,0,"pd.prcfecha7");
		$VTdtprFecha8=get_result($VLdtDatos,0,"pd.prcfecha8");
	}
	
	if ( $VLdtCamp13==1)
	{                           
?>                             
							<td width="20%" align="center" colspan="4" ><font size="-1" ><B>ACTIVIDADES INDIVIDUALES</B></font></td>
							<td width="10%" align="center" rowspan="3"><font size="-1" >PROMEDIO</font></td>
<?php } else { ?>                            
							<td width="10%" align="center" colspan="4"><font size="-1" ><B>ACTIVIDADES GRUPALES</B></font></td>
							<td width="10%" align="center" rowspan="3"><font size="-1" >PROMEDIO</font></td> <?php } ?>
						  </tr>
                    
                          <tr>
<?php if ( $VLdtCamp13==1) { ?>                            
                          	<td align="center"><?php echo $VTdtprDesc1; ?>&nbsp;</td>
                            <td align="center"><?php echo $VTdtprDesc2; ?>&nbsp;</td>
                            <td align="center"><?php echo $VTdtprDesc3; ?>&nbsp;</td>
                          	<td align="center"><?php echo $VTdtprDesc4; ?>&nbsp;</td>
<?php } else { ?>                            
                            
                          	<td align="center"><?php echo $VTdtprDesc5; ?>&nbsp;</td>
                            <td align="center"><?php echo $VTdtprDesc6; ?>&nbsp;</td>
                            <td align="center"><?php echo $VTdtprDesc7; ?>&nbsp;</td>
                          	<td align="center"><?php echo $VTdtprDesc8; ?>&nbsp;</td>
<?php } ?>                            
                            
                          </tr>
                          <tr>
<?php 
////////////// CABECERAS ///////
	  if ( $VLdtCamp13==1) { ?>                            
                          	<td align="center"><?php echo $VTdtprFecha1; ?>&nbsp;</td>
                          	<td align="center"><?php echo $VTdtprFecha2; ?>&nbsp;</td>
                          	<td align="center"><?php echo $VTdtprFecha3; ?>&nbsp;</td>
                          	<td align="center"><?php echo $VTdtprFecha4; ?>&nbsp;</td>
<?php } else { ?>                            
                          	<td align="center"><?php echo $VTdtprFecha5; ?>&nbsp;</td>
                          	<td align="center"><?php echo $VTdtprFecha6; ?>&nbsp;</td>
                          	<td align="center"><?php echo $VTdtprFecha7; ?>&nbsp;</td>
                          	<td align="center"><?php echo $VTdtprFecha8; ?>&nbsp;</td>
<?php } ?>                                                        
                          </tr>
<?PHP 
////////////////////////  DATOS
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTdtprcodigo=get_result($VLdtDatos,$i,"pd.dtprcodigo");
			$VTdtprtareas=get_result($VLdtDatos,$i,"pd.dtprtareas");
			$VTdtpractindiv=get_result($VLdtDatos,$i,"pd.dtpractindiv");
			$VTdtpractgrupal=get_result($VLdtDatos,$i,"pd.dtpractgrupal");
			$VTdtprlecciones=get_result($VLdtDatos,$i,"pd.dtprlecciones");
			$VTdtprprueba=get_result($VLdtDatos,$i,"pd.dtprprueba");
			$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
			$VTdtprNota1=get_result($VLdtDatos,$i,"pd.prcnota1");
			$VTdtprNota2=get_result($VLdtDatos,$i,"pd.prcnota2");
			$VTdtprNota3=get_result($VLdtDatos,$i,"pd.prcnota3");
			$VTdtprNota4=get_result($VLdtDatos,$i,"pd.prcnota4");
			$VTdtprNota5=get_result($VLdtDatos,$i,"pd.prcnota5");
			$VTdtprNota6=get_result($VLdtDatos,$i,"pd.prcnota6");
			$VTdtprNota7=get_result($VLdtDatos,$i,"pd.prcnota7");
			$VTdtprNota8=get_result($VLdtDatos,$i,"pd.prcnota8");
			
			if ( $VtFamilia<4 ){
			
?>						  

    <tr>
    	<td > <?php echo $i+1; ?> </td>
        <td width="40%"><font size="-1" ><? echo utf8_encode($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
<?php if ( $VLdtCamp13==1) { ?>                            
        <td width="10%" align="center"> 
        <select name="txt_Nota1[]">
        <option value="0" <?php if ( $VTdtprNota1 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota1 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota1 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota1 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota1 == "4") {?> selected <?php }?>>N/E</option>
		</select>
     </td>
        <td width="10%" align="center">
        <select name="txt_Nota2[]">
        <option value="0" <?php if ( $VTdtprNota2 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota2 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota2 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota2 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota2 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Nota3[]">
        <option value="0" <?php if ( $VTdtprNota3 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota3 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota3 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota3 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota3 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Nota4[]">
        <option value="0" <?php if ( $VTdtprNota4 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota4 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota4 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota4 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota4 == "4") {?> selected <?php }?>>N/E</option>
		</select>
		</td>
<?php } else { ?>                                    
        <td width="10%" align="center">
        <select name="txt_Tarea[]">
        <option value="0" <?php if ( $VTdtprtareas == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprtareas == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprtareas == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprtareas == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprtareas == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center"> 
        <select name="txt_Nota5[]">
        <option value="0" <?php if ( $VTdtprNota5 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota5 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota5 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota5 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota5 == "4") {?> selected <?php }?>>N/E</option>
		</select>
     </td>
        <td width="10%" align="center">
        <select name="txt_Nota6[]">
        <option value="0" <?php if ( $VTdtprNota6 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota6 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota6 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota6 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota6 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Nota7[]">
        <option value="0" <?php if ( $VTdtprNota7 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota7 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota7 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota7 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota7 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Nota8[]">
        <option value="0" <?php if ( $VTdtprNota8 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota8 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota8 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota8 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota8 == "4") {?> selected <?php }?>>N/E</option>
		</select>
		</td>
        <td width="10%" align="center">
        <select name="txt_ActI[]">
        <option value="0" <?php if ( $VTdtpractindiv == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtpractindiv == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtpractindiv == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtpractindiv == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtpractindiv == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
<?php } ?>                                                                
    </tr>

<?php  
			}else{
?>
    <tr>
    	<td > <?php echo $i+1; ?> </td>
        <td width="40%"><font size="-1" ><? echo utf8_encode($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
<?php if ( $VLdtCamp13==1) { ?>                            
        <td width="10%" align="center"><?php echo $VTdtprNota1; ?>&nbsp;</td>
        <td width="10%" align="center"><?php echo $VTdtprNota2; ?>&nbsp;</td>
        <td width="10%" align="center"><?php echo $VTdtprNota3; ?>&nbsp;</td>
        <td width="10%" align="center"><?php echo $VTdtprNota4; ?>&nbsp;</td>
        <td width="10%" align="center"><?php echo $VTdtprtareas; ?>&nbsp;</td>
<?php } else { ?>                                            
        <td width="10%" align="center"><?php echo $VTdtprNota5; ?>&nbsp;</td>
        <td width="10%" align="center"><?php echo $VTdtprNota6; ?>&nbsp;</td>
        <td width="10%" align="center"><?php echo $VTdtprNota7; ?>&nbsp;</td>
        <td width="10%" align="center"><?php echo $VTdtprNota8; ?>&nbsp;</td>
        <td width="10%" align="center"><?php echo $VTdtpractindiv; ?>&nbsp;</td>
<?php } ?>                                                                        
    </tr>
    
<?php
			}
?>    
<?php 
		}
	}
?>                      
                      
						</table>

						</fieldset></td>
	</tr>                        
<?php } else { 
//////////////////// CABECERA
?>                          

 <tr>
	<td ><fieldset  >
						  <legend ><?  echo utf8_encode($VtSiglas." ".$VtCurso." ".$VtParalelo."  /  ".$VtMateria); ?></legend>
						<table width="100%" border="1">
						  <tr>
                            <td rowspan="2" > No </td>
							<td width="40%" align="center" rowspan="2"><font size="-1" >NOMINA</font></td>
							<td width="20%" align="center" colspan="2" ><font size="-1" ><B>INSUMO1</B></font></td>
							<td width="10%" align="center"><font size="-1" ><B>INSUMO2</B></font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >REFUERZO ACADEMICO</font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >PROMEDIO PARCIAL</font></td>
						  </tr>
                          <tr>
                          	<td align="center">Actividad Individual</td>
                            <td align="center">Actividad Grupal</td>
                            <td align="center">Evaluación Parcial</td>
                            
                          </tr>
<?PHP 
$Vtquery= " Select p.perapellidos, p.pernombres, p.percc, p.percodigo
, pd.dtprcodigo, pd.dtprtareas, pd.dtpractindiv,pd.dtpractgrupal, 
 pd.dtprlecciones, pd.dtprprueba, pd.dtprpromedio, m.mtrestado 
from mtrcl m, psn p, grp g, nsttcnstdnt n
, prcldtll pd, qmstrdtll qd
where p.percodigo=n.percodigo and n.inescodigo=m.inescodigo 
and m.grucodigo=g.grucodigo and g.espcodigo=".$VLdtCamp12." and m.parcodigo=".$VLdtCamp8." and 
g.curcodigo=".$VLdtCamp9." and m.mtrno=qd.mtrno and qd.matcodigo=".$VLdtCamp10." 
and qd.quicodigo=".$VLdtCamp6." and pd.prccodigo=".$VLdtCamp7." and qd.dtqmcodigo=pd.dtqmcodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
		if ( $VLnuDatos>0 )
		{
			for ( $i=0; $i< $VLnuDatos; $i++  )
			{
				$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
				$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
				$VTdtprcodigo=get_result($VLdtDatos,$i,"pd.dtprcodigo");
				$VTdtprtareas=get_result($VLdtDatos,$i,"pd.dtprtareas");
				$VTdtpractindiv=get_result($VLdtDatos,$i,"pd.dtpractindiv");
				$VTdtpractgrupal=get_result($VLdtDatos,$i,"pd.dtpractgrupal");
				$VTdtprlecciones=get_result($VLdtDatos,$i,"pd.dtprlecciones");
				$VTdtprprueba=get_result($VLdtDatos,$i,"pd.dtprprueba");
				$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
				$VTMtrestado=get_result($VLdtDatos,$i,"m.mtrestado");
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
				
				if ($VtFamilia<4)
				{
	?>						  
		<tr>
			<td > <?php echo $i+1; ?> </td>
			<td width="40%"><font size="-1" color="<?=$VLdtColor; ?>" ><? echo utf8_encode($VTApellido." ".$VTNombre." ".$VLdtObserv);  ?>
			<input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"></font></td>
			<td width="10%" align="center" > <font  <?php if($VTdtprtareas<7 && $VTdtprtareas>0 ){ ?> color="#CC0000" <?php } ?> > <?php
			
			switch ($VTdtprtareas) {
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
			 ?> </font></td>
			<td width="10%" align="center"><font  <?php if($VTdtpractindiv<7 && $VTdtpractindiv>0 ){ ?> color="#CC0000" <?php } ?> ><?php 
			switch ($VTdtpractindiv) {
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
			?></font></td>
			
			<td width="10%" align="center"><font  <?php if($VTdtprlecciones<7 && $VTdtprlecciones>0 ){ ?> color="#CC0000" <?php } ?> ><?php 
			switch ($VTdtprlecciones) {
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
			?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtprprueba<7 && $VTdtprprueba>0 ){ ?> color="#CC0000" <?php } ?> ><?php 
			switch ($VTdtprprueba) {
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
			?></font></td>
			<td width="10%" align="center"><?php 
			switch ($VTdtprpromedio) {
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
			?></td>
		</tr>
		
	<?php    
				}else {
		/////////////////// NOMINA
	?>
		<tr>
			<td > <?php echo $i+1; ?> </td>
			<td width="40%"><font size="-1" ><font size="-1" color="<?=$VLdtColor; ?>" ><? echo utf8_encode($VTApellido." ".$VTNombre." ".$VLdtObserv);  ?>
			<input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtprtareas<7 && $VTdtprtareas>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo $VTdtprtareas; ?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtpractindiv<7 && $VTdtpractindiv>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo $VTdtpractindiv; ?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtprlecciones<7 && $VTdtprlecciones>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo $VTdtprlecciones; ?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtprprueba<7 && $VTdtprprueba>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo $VTdtprprueba; ?></font></td>
			<td width="10%" align="center"><?php 
			$suma=0;
			$divisor=0;
			if($VTdtprtareas>0)
			{
				$suma= $suma+$VTdtprtareas;
				$divisor= $divisor+1;
			}
			if($VTdtpractindiv>0)
			{
				$suma= $suma+$VTdtpractindiv;
				$divisor= $divisor+1;
			}
			if($VTdtpractgrupal>0)
			{
				$suma= $suma+$VTdtpractgrupal;
				$divisor= $divisor+1;
			}
			if($VTdtprlecciones>0)
			{
				$suma= $suma+$VTdtprlecciones;
				$divisor= $divisor+1;
			}
			if($VTdtprprueba>0)
			{
				$suma= $suma+$VTdtprprueba;
				$divisor= $divisor+1;
			}
			if( $divisor==0)
			{
				$VTdtprpromedio=0;
			}else{
				$VTdtprpromedio=round($suma/$divisor,2);
			}
			
			if ($VTdtprpromedio > 0 )
			{
				if($VTMtrestado==1)
				{
					$VTPromedioCurso= $VTPromedioCurso + $VTdtprpromedio;
					$VTDivisor= $VTDivisor + 1;
				}
				
			}
			echo $VTdtprpromedio; ?></td>
		</tr>
		
	<?php 
				}
				}
		}
  	  }
	  
   break;
   case "1": //////////// version 2.0
   
	if ( $VLdtCamp13!=""){
?>
<tr>
	<td ><fieldset  >
						  <legend ><?  echo utf8_encode($VtSiglas." ".$VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre." - ".$VtParcial); ?></legend>
						<table width="100%" border="1">
						  <tr>
                          	<td width="10%" align="center" rowspan="2">No</td>
							<td width="40%" align="center" rowspan="2"><font size="-1" ><input type="hidden" name="txt_Camp13" value="<?php echo $VLdtCamp13; ?>"><input type="hidden" name="txt_Camp12" value="<?php echo $VLdtCamp12; ?>"><input type="hidden" name="txt_familia" value="<?php echo $VtFamilia; ?>">NOMINA</font> <?php //echo $VLCadena[3]."-".$VLTemp[3]; ?></td>
<?php                          
$Vtquery= "  Select p.perapellidos, p.pernombres, p.percc, p.percodigo, 
pd.dtprcodigo, pd.dtprtareas, pd.dtpractindiv,pd.dtpractgrupal,
pd.dtpradicional1, pd.dtpradicional2, pd.dtprrefuerzo, pd.dtprpromedio1,
 pd.dtprlecciones, pd.dtprprueba, pd.dtprpromedio, m.mtrestado,
 pd.prcdesca1, pd.prcdesca2 
from mtrcl m, psn p, grp g, nsttcnstdnt n
, prcldtll pd, qmstrdtll qd
where p.percodigo=n.percodigo and n.inescodigo=m.inescodigo 
and m.grucodigo=g.grucodigo and m.parcodigo=".$VLdtCamp8." and g.espcodigo=".$VLdtCamp12." and
g.curcodigo=".$VLdtCamp9." and m.mtrno=qd.mtrno and qd.matcodigo=".$VLdtCamp10." 
and qd.quicodigo=".$VLdtCamp6." and pd.prccodigo=".$VLdtCamp7." and qd.dtqmcodigo=pd.dtqmcodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
		if ( $VLnuDatos>0 )
	{
		$VTdtprDesca1=get_result($VLdtDatos,0,"pd.prcdesca1");
		$VTdtprDesca2=get_result($VLdtDatos,0,"pd.prcdesca2");
	}
	
	if ( $VLdtCamp13==1)
	{                           
?>                             
							<td width="20%" align="center" colspan="4" ><font size="-1" ><B>INSUMO 1</B></font></td>
<?php } else { ?>                            
							<td width="10%" align="center" colspan="3"><font size="-1" ><B>INSUMO 2</B></font></td>
							<?php } ?>
						  </tr>
                    
                          <tr>
<?php if ( $VLdtCamp13==1) { ?>                            
                          	<td align="center">Tareas&nbsp;</td>
                            <td align="center">Lección&nbsp;</td>
                          	<td align="center"><?php echo $VTdtprDesca1; ?>&nbsp;</td>
                            <td align="center"><?php echo $VTdtprDesca2; ?>&nbsp;</td>
<?php } else { ?>                            
                          	<td align="center">Act. Indiv.</td>
                            <td align="center">Act. Grupal</td>
                            <td align="center">Eval. Parcial</td>
<?php } ?>                            
                            
                          </tr>

<?PHP 
////////////////////////  DATOS
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
				$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
				$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
				$VTdtprcodigo=get_result($VLdtDatos,$i,"pd.dtprcodigo");
				$VTdtprtareas=get_result($VLdtDatos,$i,"pd.dtprtareas");
				$VTdtpractindiv=get_result($VLdtDatos,$i,"pd.dtpractindiv");
				$VTdtpractgrupal=get_result($VLdtDatos,$i,"pd.dtpractgrupal");
				$VTdtprlecciones=get_result($VLdtDatos,$i,"pd.dtprlecciones");
				$VTdtpradicional1=get_result($VLdtDatos,$i,"pd.dtpradicional1");
				$VTdtpradicional2=get_result($VLdtDatos,$i,"pd.dtpradicional2");
				$VTdtprpromedio1=get_result($VLdtDatos,$i,"pd.dtprpromedio1");
				$VTdtprrefuerzo=get_result($VLdtDatos,$i,"pd.dtprrefuerzo");
				$VTdtprprueba=get_result($VLdtDatos,$i,"pd.dtprprueba");
				$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
				$VTMtrestado=get_result($VLdtDatos,$i,"m.mtrestado");
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
			
			if ( $VtFamilia<4 ){
			
?>						  

    <tr>
    	<td > <?php echo $i+1; ?> </td>
        <td width="40%"><font size="-1" ><? echo utf8_encode($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
<?php if ( $VLdtCamp13==1) { ?>                            
        <td width="10%" align="center"> 
        <select name="txt_Nota1[]">
        <option value="0" <?php if ( $VTdtprNota1 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota1 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota1 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota1 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota1 == "4") {?> selected <?php }?>>N/E</option>
		</select>
     </td>
        <td width="10%" align="center">
        <select name="txt_Nota2[]">
        <option value="0" <?php if ( $VTdtprNota2 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota2 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota2 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota2 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota2 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Nota3[]">
        <option value="0" <?php if ( $VTdtprNota3 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota3 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota3 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota3 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota3 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center">
        <select name="txt_Nota4[]">
        <option value="0" <?php if ( $VTdtprNota4 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota4 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota4 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota4 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota4 == "4") {?> selected <?php }?>>N/E</option>
		</select>
		</td>
<?php } else { ?>                                    
        <td width="10%" align="center">
        <select name="txt_Tarea[]">
        <option value="0" <?php if ( $VTdtprtareas == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprtareas == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprtareas == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprtareas == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprtareas == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
        <td width="10%" align="center"> 
        <select name="txt_Nota5[]">
        <option value="0" <?php if ( $VTdtprNota5 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota5 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota5 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota5 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota5 == "4") {?> selected <?php }?>>N/E</option>
		</select>
     </td>
        <td width="10%" align="center">
        <select name="txt_Nota6[]">
        <option value="0" <?php if ( $VTdtprNota6 == "0") {?> selected <?php }?>>NR</option>
		<option value="9" <?php if ( $VTdtprNota6 == "9" ) {?> selected <?php }?>  >A</option>
        <option value="7" <?php if ( $VTdtprNota6 == "7") {?> selected <?php }?>>EP</option>
        <option value="5" <?php if ( $VTdtprNota6 == "5") {?> selected <?php }?>>I</option>
        <option value="4" <?php if ( $VTdtprNota6 == "4") {?> selected <?php }?>>N/E</option>
		</select>
        </td>
<?php } ?>                                                                
    </tr>

<?php  
			}else{
?>
    <tr>
    	<td > <?php echo $i+1; ?> </td>
        <td width="40%"><font size="-1" ><? echo utf8_encode($VTApellido." ".$VTNombre);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_dtmattipo[]" value="<?php echo $VtMateriaTipo; ?>"></font></td>
<?php if ( $VLdtCamp13==1) { ?>                            
        <td width="10%" align="center"><font  <?php if($VTdtprtareas<7 && $VTdtprtareas>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtprtareas,2); ?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtprlecciones<7 && $VTdtprlecciones>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtprlecciones,2); ?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtpradicional1<7 && $VTdtpradicional1>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtpradicional1,2); ?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtpradicional2<7 && $VTdtpradicional2>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtpradicional2,2); ?></font></td>
<?php } else { ?>                                            
        <td width="10%" align="center"><font  <?php if($VTdtpractindiv<7 && $VTdtpractindiv>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtpractindiv,2); ?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtpractgrupal<7 && $VTdtpractgrupal>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtpractgrupal,2); ?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtprprueba<7 && $VTdtprprueba>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtprprueba,2); ?></font></td>
<?php } ?>                                                                        
    </tr>
    
<?php
			}
?>    
<?php 
		}
	}
?>                      
                      
						</table>

						</fieldset></td>
	</tr>                        
<?php } else { 
//////////////////// CABECERA
?>                          

 <tr>
	<td ><fieldset  >
						  <legend ><?  echo utf8_encode($VtSiglas." ".$VtCurso." ".$VtParalelo."  /  ".$VtMateria); ?></legend>
						<table width="100%" border="1">
						  <tr>
                            <td width="10%" rowspan="2" > No </td>
							<td width="40%" align="center" rowspan="2"><font size="-1" >NOMINA 
<?php                            
$Vtquery= " Select p.perapellidos, p.pernombres, p.percc, p.percodigo, 
pd.dtprcodigo, pd.dtprtareas, pd.dtpractindiv,pd.dtpractgrupal,
pd.dtpradicional1, pd.dtpradicional2, pd.dtprrefuerzo, pd.dtprpromedio1,
 pd.dtprlecciones, pd.dtprprueba, pd.dtprpromedio, m.mtrestado,
 pd.prcdesca1, pd.prcdesca2  
 from mtrcl m, psn p, grp g, nsttcnstdnt n
, prcldtll pd, qmstrdtll qd
where p.percodigo=n.percodigo and n.inescodigo=m.inescodigo 
and m.grucodigo=g.grucodigo and g.espcodigo=".$VLdtCamp12." and m.parcodigo=".$VLdtCamp8." and 
g.curcodigo=".$VLdtCamp9." and m.mtrno=qd.mtrno and qd.matcodigo=".$VLdtCamp10." 
and qd.quicodigo=".$VLdtCamp6." and pd.prccodigo=".$VLdtCamp7." and qd.dtqmcodigo=pd.dtqmcodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);     
		if ( $VLnuDatos>0 )
	{
		$VTdtprDesca1=get_result($VLdtDatos,0,"pd.prcdesca1");
		$VTdtprDesca2=get_result($VLdtDatos,0,"pd.prcdesca2");
	}
?>                       
                            </font></td>
							<td width="20%" align="center" colspan="4" ><font size="-1" ><B><a href='docrepnotasparcial.php?vlccn=modificar&txt_Camp1=<?php echo $VLdtCamp1; ?>&txt_Camp2=<?php echo $VLdtCamp2; ?>&txt_Camp10=<?php echo $VLdtCamp10; ?>&txt_Camp6=<?php echo $VLdtCamp6; ?>&txt_Camp7=<?php echo $VLdtCamp7; ?>&txt_Camp8=<?php echo $VLdtCamp8; ?>&txt_Camp9=<?php echo $VLdtCamp9; ?>&txt_Camp11=<?php echo $VLdtCamp11; ?>&txt_Camp12=<?php echo $VLdtCamp12; ?>&txt_Camp13=1&txt_Camp14=<?php echo $VLdtCamp14; ?>&nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>' target=_parent >INSUMO1</a></B></font></td>
							<td width="10%" align="center" colspan="3" ><font size="-1" ><B><a href='docrepnotasparcial.php?vlccn=modificar&txt_Camp1=<?php echo $VLdtCamp1; ?>&txt_Camp2=<?php echo $VLdtCamp2; ?>&txt_Camp13=2&txt_Camp14=<?php echo $VLdtCamp14; ?>&txt_Camp10=<?php echo $VLdtCamp10; ?>&txt_Camp6=<?php echo $VLdtCamp6; ?>&txt_Camp7=<?php echo $VLdtCamp7; ?>&txt_Camp8=<?php echo $VLdtCamp8; ?>&txt_Camp9=<?php echo $VLdtCamp9; ?>&txt_Camp11=<?php echo $VLdtCamp11; ?>&txt_Camp12=<?php echo $VLdtCamp12; ?>&nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>' target=_parent >INSUMO2</a></B></font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >PROM.</font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >REF. ACAD.</font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >PROM. PARC.</font></td>
						  </tr>
                          <tr>
                          	<td align="center">Tareas</td>
                            <td align="center">Lección</td>
                          	<td align="center"><?php echo $VTdtprDesca1; ?>&nbsp;</td>
                            <td align="center"><?php echo $VTdtprDesca2; ?>&nbsp;</td>
                          	<td align="center">Act. Indiv.</td>
                            <td align="center">Act. Grupal</td>
                            <td align="center">Eval. Parcial</td>
                            
                          </tr>
<?PHP 

		if ( $VLnuDatos>0 )
		{
			for ( $i=0; $i< $VLnuDatos; $i++  )
			{
				$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
				$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
				$VTdtprcodigo=get_result($VLdtDatos,$i,"pd.dtprcodigo");
				$VTdtprtareas=get_result($VLdtDatos,$i,"pd.dtprtareas");
				$VTdtpractindiv=get_result($VLdtDatos,$i,"pd.dtpractindiv");
				$VTdtpractgrupal=get_result($VLdtDatos,$i,"pd.dtpractgrupal");
				$VTdtprlecciones=get_result($VLdtDatos,$i,"pd.dtprlecciones");
				$VTdtpradicional1=get_result($VLdtDatos,$i,"pd.dtpradicional1");
				$VTdtpradicional2=get_result($VLdtDatos,$i,"pd.dtpradicional2");
				$VTdtprpromedio1=get_result($VLdtDatos,$i,"pd.dtprpromedio1");
				$VTdtprrefuerzo=get_result($VLdtDatos,$i,"pd.dtprrefuerzo");
				$VTdtprprueba=get_result($VLdtDatos,$i,"pd.dtprprueba");
				$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
				$VTMtrestado=get_result($VLdtDatos,$i,"m.mtrestado");
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
				
				if ($VtFamilia<4)
				{
	?>						  
		<tr>
			<td > <?php echo $i+1; ?> </td>
			<td width="40%"><font size="-1" color="<?=$VLdtColor; ?>" ><? echo utf8_encode($VTApellido." ".$VTNombre." ".$VLdtObserv);  ?>
			<input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"></font></td>
			<td width="10%" align="center" > <font  <?php if($VTdtprtareas<7 && $VTdtprtareas>0 ){ ?> color="#CC0000" <?php } ?> > <?php
			
			switch ($VTdtprtareas) {
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
			 ?> </font></td>
			<td width="10%" align="center"><font  <?php if($VTdtpractindiv<7 && $VTdtpractindiv>0 ){ ?> color="#CC0000" <?php } ?> ><?php 
			switch ($VTdtpractindiv) {
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
			?></font></td>
			
			<td width="10%" align="center"><font  <?php if($VTdtprlecciones<7 && $VTdtprlecciones>0 ){ ?> color="#CC0000" <?php } ?> ><?php 
			switch ($VTdtprlecciones) {
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
			?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtprprueba<7 && $VTdtprprueba>0 ){ ?> color="#CC0000" <?php } ?> ><?php 
			switch ($VTdtprprueba) {
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
			?></font></td>
			<td width="10%" align="center"><?php 
			switch ($VTdtprpromedio) {
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
			?></td>
			<td width="10%" align="center"><?php 
			switch ($VTdtprpromedio) {
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
			?></td>
			<td width="10%" align="center"><?php 
			switch ($VTdtprpromedio) {
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
			?></td>
			<td width="10%" align="center"><?php 
			switch ($VTdtprpromedio) {
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
			?></td>
			<td width="10%" align="center"><?php 
			switch ($VTdtprpromedio) {
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
			?></td>
			<td width="10%" align="center"><?php 
			switch ($VTdtprpromedio) {
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
			?></td>
		</tr>
		
	<?php    
				}else {
		/////////////////// NOMINA
	?>
		<tr>
			<td > <?php echo $i+1; ?> </td>
			<td width="40%"><font size="-1" ><font size="-1" color="<?=$VLdtColor; ?>" ><? echo utf8_encode($VTApellido." ".$VTNombre." ".$VLdtObserv);  ?>
			<input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtprtareas<7 && $VTdtprtareas>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtprtareas,2); ?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtprlecciones<7 && $VTdtprlecciones>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtprlecciones,2); ?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtpradicional1<7 && $VTdtpradicional1>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtpradicional1,2); ?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtpradicional2<7 && $VTdtpradicional2>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtpradicional2,2); ?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtpractindiv<7 && $VTdtpractindiv>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtpractindiv,2); ?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtpractgrupal<7 && $VTdtpractgrupal>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtpractgrupal,2); ?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtprprueba<7 && $VTdtprprueba>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtprprueba,2); ?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtprpromedio1<7 && $VTdtprpromedio1>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtprpromedio1,2); ?></font></td>
			<td width="10%" align="center"><font  <?php if($VTdtprrefuerzo<7 && $VTdtprrefuerzo>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtprrefuerzo,2); ?></font></td>
			<td width="10%" align="center"><?php 
			/*
			$suma=0;
			$divisor=0;
			if($VTdtprtareas>0)
			{
				$suma= $suma+$VTdtprtareas;
				$divisor= $divisor+1;
			}
			if($VTdtprlecciones>0)
			{
				$suma= $suma+$VTdtprlecciones;
				$divisor= $divisor+1;
			}			
			if($VTdtpradicional1>0)
			{
				$suma= $suma+$VTdtpradicional1;
				$divisor= $divisor+1;
			}			
			if($VTdtpradicional2>0)
			{
				$suma= $suma+$VTdtpradicional2;
				$divisor= $divisor+1;
			}			
			if($VTdtpractindiv>0)
			{
				$suma= $suma+$VTdtpractindiv;
				$divisor= $divisor+1;
			}
			if($VTdtpractgrupal>0)
			{
				$suma= $suma+$VTdtpractgrupal;
				$divisor= $divisor+1;
			}
			if($VTdtprprueba>0)
			{
				$suma= $suma+$VTdtprprueba;
				$divisor= $divisor+1;
			}
			if( $divisor==0)
			{
				$VTdtprpromedio=0;
			}else{
				$VTdtprpromedio=round($suma/$divisor,2);
			}
			if ($VTdtprpromedio > 0 )
			{
				if($VTMtrestado==1)
				{
					$VTPromedioCurso= $VTPromedioCurso + $VTdtprpromedio;
					$VTDivisor= $VTDivisor + 1;
				}
				
			}
			*/
			echo number_format($VTdtprpromedio,2); ?></td>
		</tr>
		
	<?php 
				}
				}
		}
  	  }
	  
   break;
  }
?>                      
                      
						</table>

						</fieldset></td>
	</tr>
    <tr>
    <td>
    <table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Promedio general del Curso: <?php
	
	if ($VTDivisor>0)
	{
		echo 	round($VTPromedioCurso/$VTDivisor,2);
	}
	
	 ?></td>
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
    
<?php
break 1;

case "2":
/////////////////// PARA MATERIAS CULITATIVAS
?>
    <tr>
    	<td>
<fieldset  >
						  <legend ><?  echo utf8_encode($VtSiglas." ".$VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre." - ".$VtParcial); ?></legend>
						<table width="100%" border="1">
						  <tr>
                            <td > No </td>
							<td width="40%" align="center"><font size="-1" >Apellidos y Nombres</font></td>
							<td width="10%" align="center">Tareas</td>
							<td width="10%" align="center"><font size="-1" >Act. Indiv.</font></td>
							<td width="10%" align="center"><font size="-1" >Act. Grup.</font></td>
							<td width="10%" align="center"><font size="-1" >Lecciones</font></td>
							<td width="10%" align="center"><font size="-1" >PRUEBA ESCR.</font></td>
							<td width="10%" align="center"><font size="-1" >PROMEDIO</font></td>
						  </tr>
<?PHP 
$Vtquery= " Select p.perapellidos, p.pernombres, p.percc, p.percodigo
, pd.dtprcodigo, pd.dtprtareas, pd.dtpractindiv,pd.dtpractgrupal, 
 pd.dtprlecciones, pd.dtprprueba, pd.dtprpromedio, m.mtrestado
from mtrcl m, psn p, grp g, nsttcnstdnt n
, prcldtll pd, qmstrdtll qd
where p.percodigo=n.percodigo and n.inescodigo=m.inescodigo 
and m.grucodigo=g.grucodigo and g.espcodigo=".$VLdtCamp12." and m.parcodigo=".$VLdtCamp8." and 
g.curcodigo=".$VLdtCamp9." and m.mtrno=qd.mtrno and qd.matcodigo=".$VLdtCamp10." 
and qd.quicodigo=".$VLdtCamp6." and pd.prccodigo=".$VLdtCamp7." and qd.dtqmcodigo=pd.dtqmcodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTdtprcodigo=get_result($VLdtDatos,$i,"pd.dtprcodigo");
			$VTdtprtareas=get_result($VLdtDatos,$i,"pd.dtprtareas");
			$VTdtpractindiv=get_result($VLdtDatos,$i,"pd.dtpractindiv");
			$VTdtpractgrupal=get_result($VLdtDatos,$i,"pd.dtpractgrupal");
			$VTdtprlecciones=get_result($VLdtDatos,$i,"pd.dtprlecciones");
			$VTdtprprueba=get_result($VLdtDatos,$i,"pd.dtprprueba");
			$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
			$VTMtrestado=get_result($VLdtDatos,$i,"m.mtrestado");
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
?>						  
    <tr>
    	<td > <?php echo $i+1; ?> </td>
        <td width="40%"><font size="-1" color="<?=$VLdtColor; ?>" ><? echo utf8_encode($VTApellido." ".$VTNombre." ".$VLdtObserv);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"></font></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><?php
		if( $VTdtprpromedio>8.99 && $VTdtprpromedio<11)
		{
			echo "EX";
		}
		if( $VTdtprpromedio>6.99 && $VTdtprpromedio<9)
		{
			echo "MB";
		}
		if( $VTdtprpromedio>4.99 && $VTdtprpromedio<7)
		{
			echo "B";
		}
		if( $VTdtprpromedio>0 && $VTdtprpromedio<5)
		{
			echo "R";
		}
		if( $VTdtprpromedio==0)
		{
			echo "NR";
		}
		    ?></td>
    </tr>
<?php 
		}
	}
?>                      
                      
						</table>

						</fieldset>        
        
        </td>
    </tr>
<?php
break 1;

case "3":
//////////////// PARA MATERIAS DE COMPORTAMIENTO
?>    
    <tr>
    	<td>
<fieldset  >
						  <legend ><?  echo utf8_encode($VtSiglas." ".$VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre." - ".$VtParcial); ?></legend>
						<table width="100%" border="1">
						  <tr>
                            <td > No </td>
							<td width="40%" align="center"><font size="-1" >Apellidos y Nombres</font></td>
							<td width="10%" align="center">&nbsp;</td>
							<td width="10%" align="center"><font size="-1" >Comportamiento</font></td>
						  </tr>
<?PHP 
$Vtquery= " Select p.perapellidos, p.pernombres, p.percc, p.percodigo
, pd.dtprcodigo, pd.dtprtareas, pd.dtpractindiv,pd.dtpractgrupal, 
 pd.dtprlecciones, pd.dtprprueba, pd.dtprpromedio, m.mtrestado
from mtrcl m, psn p, grp g, nsttcnstdnt n
, prcldtll pd, qmstrdtll qd
where p.percodigo=n.percodigo and n.inescodigo=m.inescodigo 
and m.grucodigo=g.grucodigo and g.espcodigo=".$VLdtCamp12."  and m.parcodigo=".$VLdtCamp8." and 
g.curcodigo=".$VLdtCamp9." and m.mtrno=qd.mtrno and qd.matcodigo=".$VLdtCamp10." 
and qd.quicodigo=".$VLdtCamp6." and pd.prccodigo=".$VLdtCamp7." and qd.dtqmcodigo=pd.dtqmcodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTdtprcodigo=get_result($VLdtDatos,$i,"pd.dtprcodigo");
			$VTdtprtareas=get_result($VLdtDatos,$i,"pd.dtprtareas");
			$VTdtpractindiv=get_result($VLdtDatos,$i,"pd.dtpractindiv");
			$VTdtpractgrupal=get_result($VLdtDatos,$i,"pd.dtpractgrupal");
			$VTdtprlecciones=get_result($VLdtDatos,$i,"pd.dtprlecciones");
			$VTdtprprueba=get_result($VLdtDatos,$i,"pd.dtprprueba");
			$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
			$VTMtrestado=get_result($VLdtDatos,$i,"m.mtrestado");
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
?>						  
    <tr>
        <td > <?php echo $i+1; ?> </td>
        <td width="40%"><font size="-1" color="<?=$VLdtColor; ?>" ><? echo utf8_encode($VTApellido." ".$VTNombre." ".$VLdtObserv);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"></font></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center">  <?php 
		switch ($VTdtprpromedio) {
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
		
		?></td>
    </tr>
<?php 
		}
	}
?>                      
                      
						</table>

						</fieldset>        
        
        </td>
    </tr>
<?php
break 1;

case "4":
//////////////// PARA MATERIAS DE ASISTENCIA
?>    
    <tr>
    	<td>
        
<fieldset  >
						  <legend ><?  echo utf8_encode($VtSiglas." ".$VtCurso." ".$VtParalelo."  /  ".$VtMateria."   /   ".$VtQuimestre." - ".$VtParcial); ?></legend>
						<table width="100%" border="1">
						  <tr>
                            <td > No </td>
							<td width="40%" align="center"><font size="-1" >Apellidos y Nombres</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</td>
							<td width="10%" align="center"><font size="-1" >Faltas Justificadas</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</font></td>
							<td width="10%" align="center"><font size="-1" >Faltas Injustificadas</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</font></td>
							<td width="10%" align="center"><font size="-1" >Atrasos</font></td>
						  </tr>
<?PHP 
$Vtquery= " Select p.perapellidos, p.pernombres, p.percc, p.percodigo
, pd.dtprcodigo, pd.dtprtareas, pd.dtpractindiv,pd.dtpractgrupal, 
 pd.dtprlecciones, pd.dtprprueba, pd.dtprpromedio, m.mtrestado
from mtrcl m, psn p, grp g, nsttcnstdnt n
, prcldtll pd, qmstrdtll qd
where p.percodigo=n.percodigo and n.inescodigo=m.inescodigo 
and m.grucodigo=g.grucodigo and g.espcodigo=".$VLdtCamp12."  and m.parcodigo=".$VLdtCamp8." and 
g.curcodigo=".$VLdtCamp9." and m.mtrno=qd.mtrno and qd.matcodigo=".$VLdtCamp10." 
and qd.quicodigo=".$VLdtCamp6." and pd.prccodigo=".$VLdtCamp7." and qd.dtqmcodigo=pd.dtqmcodigo
order by p.perapellidos, p.pernombres";
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTdtprcodigo=get_result($VLdtDatos,$i,"pd.dtprcodigo");
			$VTdtprtareas=get_result($VLdtDatos,$i,"pd.dtprtareas");
			$VTdtpractindiv=get_result($VLdtDatos,$i,"pd.dtpractindiv");
			$VTdtpractgrupal=get_result($VLdtDatos,$i,"pd.dtpractgrupal");
			$VTdtprlecciones=get_result($VLdtDatos,$i,"pd.dtprlecciones");
			$VTdtprprueba=get_result($VLdtDatos,$i,"pd.dtprprueba");
			$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
			$VTMtrestado=get_result($VLdtDatos,$i,"m.mtrestado");
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
?>						  
    <tr>
    	<td > <?php echo $i+1; ?> </td>
        <td width="40%"><font size="-1" color="<?=$VLdtColor; ?>" ><? echo utf8_encode($VTApellido." ".$VTNombre." ".$VLdtObserv);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"></font></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><?php echo $VTdtpractindiv; ?></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><?php echo $VTdtprlecciones; ?></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="10%" align="center"><?php echo $VTdtpractgrupal; ?></td>
    </tr>
<?php 
		}
	}
?>                      
                      
						</table>

						</fieldset>        
        </td>
    </tr> 
 
 <?php
break 1;

}
 
 ?>   
</table>  </TD>
  </TR>
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
  <td>
  <table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td align="center"><? echo utf8_encode($VLdtApellidos." ".$VLdtNombres); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">DOCENTE</td>
    <td>&nbsp;</td>
  </tr>
</table>

  </td>
  </tr>
</table>
</form>
</body>
</html>
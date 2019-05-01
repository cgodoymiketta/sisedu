
<?php 

require "../cnxn_bsddts/mnjdr_bsdts.php";
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
$VLdtCamp14=$_GET[txt_Camp14];
$NoActivos=count($VLdtCamp12);

$VLdtprcodigo=$_GET[txt_dtprcodigo];
$VLdtprestado=$_GET[txt_dtprestado];
$VLdtprtareas=$_GET[txt_Tarea];
$VLdtpractindiv=$_GET[txt_ActI];
$VLdtpractgrupal=$_GET[txt_ActG];
$VLdtprlecciones=$_GET[txt_lecc];
$VLdtprprueba=$_GET[txt_Prb];
$VLdtprpromedio1=$_GET[txt_Pro1];
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

/////////////////  CONSULTAMOS CURSO / PARALELO / MATERIA / QUIMESTRE / PARCIAL
	$VtQueryE=" Select espsiglas from spcldd where espcodigo=".$VLdtCamp1;
	$VtQueryC=" Select curdescripcion from crs where curcodigo=".$VLdtCamp9;	
	$VtQueryP=" Select pardescripcion from prll where parcodigo=".$VLdtCamp8;
	$VtQueryM=" Select matdescripcion, mattipo, famcodigo from mtr where matcodigo=".$VLdtCamp10;
	$VtQueryQ=" Select quidescripcion from qmstr where quicodigo=".$VLdtCamp6;
	$VtQueryPr=" Select prcdescripcion from prcl where prccodigo=".$VLdtCamp7;
	
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
	}
	$VLdtDatosPr = execute_query($VtQueryPr,$VLConexion);
	$VLnuDatosPr = total_records($VLdtDatosPr);
	if ( $VLnuDatosPr>0 )
	{
		$VtParcial=get_result($VLdtDatosPr,0,"prcdescripcion");
	}

	$VLdtDatosM = execute_query($VtQueryM,$VLConexion);
	$VLnuDatosM = total_records($VLdtDatosM);
	if ( $VLnuDatosM>0 )
	{
		$VtMateria=get_result($VLdtDatosM,0,"matdescripcion");
		$VtMateriaTipo=get_result($VLdtDatosM,0,"mattipo");
		$VtFamilia=get_result($VLdtDatosM,0,"famcodigo");
		
	}

//////////////////////// verificamos los que se van a activar
///// el estado del parcial debe ser cerrado = prcestado=4
///// consultamos los parciales estudiantes del parcial ingresado
$Vtquery= " Select p.perapellidos, p.pernombres, p.percc, p.percodigo
, pd.dtprcodigo, pd.dtprtareas, pd.dtpractindiv, pd.dtpractgrupal,
 pd.dtprlecciones, pd.dtprprueba, pd.dtprpromedio1, pd.dtprpromedio,
 pd.dtpradicional1, pd.dtpradicional2, pd.prcdesca1, pd.prcdesca2,
 pd.dtprrefuerzo, pd.dtprestado, m.mtrestado 
from mtrcl m, psn p, grp g, nsttcnstdnt n
, prcldtll pd, qmstrdtll qd
where p.percodigo=n.percodigo and n.inescodigo=m.inescodigo 
and m.grucodigo=g.grucodigo and g.espcodigo=".$VLdtCamp1."  and m.parcodigo=".$VLdtCamp8." and 
g.curcodigo=".$VLdtCamp9." and m.mtrno=qd.mtrno and qd.matcodigo=".$VLdtCamp10." 
and qd.quicodigo=".$VLdtCamp6." and pd.prccodigo=".$VLdtCamp7." and qd.dtqmcodigo=pd.dtqmcodigo
order by p.perapellidos, p.pernombres";

	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);

///// HACEMOS EL BARRIDO EN LOS ESTUDIANTES	
	if ($VLnuDatos>0 )
	{
		$VTTotal=0;
		for ( $y=0 ; $y<$VLnuDatos; $y++) //// Nos movemos en los estudiantes
		{
			//// recuperamos el Codigo del Parcial-Estudiante y el estado
			$VTprcodigo=get_result($VLdtDatos,$y,"dtprcodigo");
			$VTestado=get_result($VLdtDatos,$y,"pd.dtprestado");
			if ( $NoActivos>0) /// confirmamos q se esten seleccionando estudiantes
			{
				for ( $x=0; $x<$NoActivos; $x++)
				{
					if ( $VLdtCamp12[$x]==$VTprcodigo) // Parcial del estudiante seleccionado
					{
////////////////// RECUPERAMOS TODOS LOS CAMPOS
						$VTSqlPrdtlle="Select * from prcldtll where DTPRCODIGO =".$VTprcodigo;
						$VTdtDatosPrdtll = execute_query($VTSqlPrdtlle,$VLConexion);
						$VTActdtprcodigo=get_result($VTdtDatosPrdtll,0,"dtprcodigo");
						$VTActprccodigo=get_result($VTdtDatosPrdtll,0,"prccodigo");
						$VTActdtqmcodigo=get_result($VTdtDatosPrdtll,0,"dtqmcodigo");
						$VTActdtprtareas=get_result($VTdtDatosPrdtll,0,"dtprtareas");
						$VTActdtpractindiv=get_result($VTdtDatosPrdtll,0,"dtpractindiv");
						$VTActdtpractgrupal=get_result($VTdtDatosPrdtll,0,"dtpractgrupal");
						$VTActdtprlecciones=get_result($VTdtDatosPrdtll,0,"dtprlecciones");
						$VTActdtprprueba=get_result($VTdtDatosPrdtll,0,"dtprprueba");
						$VTActdtpradicional1=get_result($VTdtDatosPrdtll,0,"dtpradicional1");
						$VTActdtpradicional2=get_result($VTdtDatosPrdtll,0,"dtpradicional2");
						$VTActdtprpromedio1=get_result($VTdtDatosPrdtll,0,"dtprpromedio1");
						$VTActdtprrefuerzo=get_result($VTdtDatosPrdtll,0,"dtprrefuerzo");
						$VTActdtprpromedio=get_result($VTdtDatosPrdtll,0,"dtprpromedio");
						$VTActmatcodigo=get_result($VTdtDatosPrdtll,0,"matcodigo");
						$VTActmatdescripcion=get_result($VTdtDatosPrdtll,0,"matdescripcion");
						$VTActmatorden=get_result($VTdtDatosPrdtll,0,"matorden");
						$VTActmattipo=get_result($VTdtDatosPrdtll,0,"mattipo");
						$VTActdtprestado=get_result($VTdtDatosPrdtll,0,"dtprestado");
						$VTActprcnota1=get_result($VTdtDatosPrdtll,0,"prcnota1");
						$VTActprcnota2=get_result($VTdtDatosPrdtll,0,"prcnota2");
						$VTActprcnota3=get_result($VTdtDatosPrdtll,0,"prcnota3");
						$VTActprcnota4=get_result($VTdtDatosPrdtll,0,"prcnota4");
						$VTActprcnota5=get_result($VTdtDatosPrdtll,0,"prcnota5");
						$VTActprcnota6=get_result($VTdtDatosPrdtll,0,"prcnota6");
						$VTActprcnota7=get_result($VTdtDatosPrdtll,0,"prcnota7");
						$VTActprcnota8=get_result($VTdtDatosPrdtll,0,"prcnota8");
						$VTActprcnota9=get_result($VTdtDatosPrdtll,0,"prcnota9");
						$VTActprcdesca1=get_result($VTdtDatosPrdtll,0,"prcdesca1");
						$VTActprcdesca2=get_result($VTdtDatosPrdtll,0,"prcdesca2");
						$VTActprcdesc1=get_result($VTdtDatosPrdtll,0,"prcdesc1");
						$VTActprcdesc2=get_result($VTdtDatosPrdtll,0,"prcdesc2");
						$VTActprcdesc3=get_result($VTdtDatosPrdtll,0,"prcdesc3");
						$VTActprcdesc4=get_result($VTdtDatosPrdtll,0,"prcdesc4");
						$VTActprcdesc5=get_result($VTdtDatosPrdtll,0,"prcdesc5");
						$VTActprcdesc6=get_result($VTdtDatosPrdtll,0,"prcdesc6");
						$VTActprcdesc7=get_result($VTdtDatosPrdtll,0,"prcdesc7");
						$VTActprcdesc8=get_result($VTdtDatosPrdtll,0,"prcdesc8");
						$VTActprcfecha1=get_result($VTdtDatosPrdtll,0,"prcfecha1");
						$VTActprcfecha2=get_result($VTdtDatosPrdtll,0,"prcfecha2");
						$VTActprcfecha3=get_result($VTdtDatosPrdtll,0,"prcfecha3");
						$VTActprcfecha4=get_result($VTdtDatosPrdtll,0,"prcfecha4");
						$VTActprcfecha5=get_result($VTdtDatosPrdtll,0,"prcfecha5");
						$VTActprcfecha6=get_result($VTdtDatosPrdtll,0,"prcfecha6");
						$VTActprcfecha7=get_result($VTdtDatosPrdtll,0,"prcfecha7");
						$VTActprcfecha8=get_result($VTdtDatosPrdtll,0,"prcfecha8");
////////////////// CREAMOS LA COPIA DE ESTE CAMPO //////////////////////////////////////
						$VTSqlAudita="INSERT INTO crrcnprcldtll (`DTPRCODIGO`, `PRCCODIGO`, `DTQMCODIGO`, `USUCODIGOACT`, `USUCODIGOMOD`, `DTPRTAREAS`, `DTPRACTINDIV`, `DTPRACTGRUPAL`, `DTPRLECCIONES`, `DTPRPRUEBA`, `DTPRADICIONAL1`, `DTPRADICIONAL2`, `DTPRPROMEDIO1`, `DTPRREFUERZO`, `DTPRPROMEDIO`, `MATCODIGO`, `MATDESCRIPCION`, `MATORDEN`, `MATTIPO`, `DTPRESTADO`, `PRCNOTA1`, `PRCNOTA2`, `PRCNOTA3`, `PRCNOTA4`, `PRCNOTA5`, `PRCNOTA6`, `PRCNOTA7`, `PRCNOTA8`, `PRCNOTA9`, `PRCDESCA1`, `PRCDESCA2`, `PRCDESC1`, `PRCDESC2`, `PRCDESC3`, `PRCDESC4`, `PRCDESC5`, `PRCDESC6`, `PRCDESC7`, `PRCDESC8`, `PRCFECHA1`, `PRCFECHA2`, `PRCFECHA3`, `PRCFECHA4`, `PRCFECHA5`, `PRCFECHA6`, `PRCFECHA7`, `PRCFECHA8`) VALUES (".$VTActdtprcodigo.",".$VTActprccodigo.", ".$VTActdtqmcodigo.", ".$VLUsuario.", ".$VLUsuario.", ".$VTActdtprtareas.", ".$VTActdtpractindiv.", ".$VTActdtpractgrupal.", ".$VTActdtprlecciones.", ".$VTActdtprprueba.", ".$VTActdtpradicional1.", ".$VTActdtpradicional2.", ".$VTActdtprpromedio1.", ".$VTActdtprrefuerzo.", ".$VTActdtprpromedio.", ".$VTActmatcodigo.", '".$VTActmatdescripcion."', ".$VTActmatorden.", ".$VTActmattipo.", ".$VTActdtprestado.", ".$VTActprcnota1.", ".$VTActprcnota2.", ".$VTActprcnota3.", ".$VTActprcnota4.", ".$VTActprcnota5.", ".$VTActprcnota6.", ".$VTActprcnota7.", ".$VTActprcnota8.", ".$VTActprcnota9.", '".$VTActprcdesca1."', '".$VTActprcdesca2."', '".$VTActprcdesc1."', '".$VTActprcdesc2."', '".$VTActprcdesc3."', '".$VTActprcdesc4."', '".$VTActprcdesc5."', '".$VTActprcdesc6."', '".$VTActprcdesc7."', '".$VTActprcdesc8."', '".$VTActprcfecha1."', '".$VTActprcfecha2."', '".$VTActprcfecha3."', '".$VTActprcfecha4."', '".$VTActprcfecha5."', '".$VTActprcfecha6."', '".$VTActprcfecha7."', '".$VTActprcfecha8."')";
						
///////////////// REALIZAMOS LA ACCION DEPENDIENDO DEL ESTADO ///////////
/* 
	los estados para el parcial del estudiante son: 
	4=sin modificar
	5=activo a modificar
	6=Se ha guardado la primera modificacion
	7=vuelta activo, mas de una modificacion
	8=Se ha guardado la modificacion, Tiene mas de una modificacion
*/
						
						switch ($VTestado)
						{
							case 4: //// Primera Modificacion 
								
								///// CREAMOS LA COPIA DEL PARCIAL
								$VLdtDatosAud = execute_query($VTSqlAudita,$VLConexion);
								
								
								$VTTotal++;
								///// MODIFICAMOS EL ESTADO
								$VTSqlModificar= "UPDATE prcldtll SET dtprestado =5 WHERE DTPRCODIGO =".$VTprcodigo;
								$VLdtDatosModificar = execute_query($VTSqlModificar,$VLConexion);						

								
							break 1;
							case 5://// activo y puesto nuevamente activo /// no hacemos nada
							
							break 1;
							case 6://// ya fue modificado y se lo vuelve a activar
								///// CREAMOS LA COPIA DEL PARCIAL
								$VLdtDatosAud = execute_query($VTSqlAudita,$VLConexion);
								
								
								$VTTotal++;
								///// MODIFICAMOS EL ESTADO
								$VTSqlModificar= "UPDATE prcldtll SET dtprestado =7 WHERE DTPRCODIGO =".$VTprcodigo;
								$VLdtDatosModificar = execute_query($VTSqlModificar,$VLConexion);						
							
							break 1;	
							case 7://// ya fue modificado y se lo vuelve a activar
							
							break 1;	
							case 8://// ya fue modificado y se lo vuelve a activar
								///// CREAMOS LA COPIA DEL PARCIAL
								$VLdtDatosAud = execute_query($VTSqlAudita,$VLConexion);
								
								
								$VTTotal++;
								///// MODIFICAMOS EL ESTADO
								$VTSqlModificar= "UPDATE prcldtll SET dtprestado =9 WHERE DTPRCODIGO =".$VTprcodigo;
								$VLdtDatosModificar = execute_query($VTSqlModificar,$VLConexion);						
							
							break 1;	
						}

					}
				}
			}
		}
	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CORRECION <?  echo utf8_encode($VtEspecialidad." ".$VtCurso." ".$VtParalelo."  -  ".$VtMateria."   -   ".$VtQuimestre." - ".$VtParcial); ?></title>
</head>

<body>
<form id="RAG" name="RAG" method="get" action="corparcialmateria.php">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td align="center"><font size="+2"> <? echo $VtQuimestre." - ".$VtParcial; ?>  </font></td>
      </tr>
      <tr>
        <td align="center"><font size="+2"> AÑO LECTIVO <? echo $VLdtPeriodo; ?> </font> </td>
      </tr>
      <tr>
        <td><input type="hidden" name="txt_Camp1" value="<?php echo $VLdtCamp1; ?>"><input type="hidden" name="txt_Camp10" value="<?php echo $VLdtCamp10; ?>"><input type="hidden" name="txt_Camp6" value="<?php echo $VLdtCamp6; ?>"><input type="hidden" name="txt_Camp7" value="<?php echo $VLdtCamp7; ?>"><input type="hidden" name="txt_Camp8" value="<?php echo $VLdtCamp8; ?>"><input type="hidden" name="txt_Camp9" value="<?php echo $VLdtCamp9; ?>"><input type="hidden" name="txt_Camp14" value="<?php echo $VLdtCamp14; ?>"><input type="hidden" name="nlctv" value="<?php echo $VLAnoLocal; ?>"><input type="hidden" name="nsttcn" value="<?php echo $VLInstitucion; ?>"><input type="hidden" name="sr" value="<?php echo $VLUsuario; ?>">&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><input type="submit" name="button" id="activar" value="Activar" /></td>
      </tr>
    </table>
	</td>
  </tr>
  <TR>
  <TD>
<table width="100%" border="0">
<?php 

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
	switch($VLdtCamp14){
		case "0":	/////// version 1.0
?>
 <tr>
	<td ><fieldset  >
						  <legend ><font size="+2" ><?  echo utf8_encode($VtEspecialidad." ".$VtCurso." ".$VtParalelo."  /  ".$VtMateria); ?></font></legend>
						<table width="100%" border="1">
                          <tr>
                            <td width="10%" rowspan="2"> No </td>
							<td width="40%" align="center" rowspan="2"><font size="-1" >NOMINA</font></td>
							<td width="20%" align="center" colspan="2" ><font size="-1" ><B>INSUMO1</B></font></td>
							<td width="10%" align="center"><font size="-1" ><B>INSUMO2</B></font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >REFUERZO ACADEMICO</font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >PROMEDIO</font></td>
						  </tr>
                          <tr>
                          	<td>Act. Indiv.</td>
                            <td>Act. Grupal</td>
                            <td>Evaluación Parcial</td>
                            
                          </tr>

<?PHP 
$Vtquery= " Select p.perapellidos, p.pernombres, p.percc, p.percodigo
, pd.dtprcodigo, pd.dtprtareas, pd.dtpractindiv,pd.dtpractgrupal, pd.dtprestado,
 pd.dtprlecciones, pd.dtprprueba, pd.dtprpromedio, m.mtrestado 
from mtrcl m, psn p, grp g, nsttcnstdnt n
, prcldtll pd, qmstrdtll qd
where p.percodigo=n.percodigo and n.inescodigo=m.inescodigo 
and m.grucodigo=g.grucodigo and g.espcodigo=".$VLdtCamp1."  and m.parcodigo=".$VLdtCamp8." and 
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
			$VTdtprestado=get_result($VLdtDatos,$i,"pd.dtprestado");
			$VTdtprtareas=get_result($VLdtDatos,$i,"pd.dtprtareas");
			$VTdtpractindiv=get_result($VLdtDatos,$i,"pd.dtpractindiv");
			$VTdtpractgrupal=get_result($VLdtDatos,$i,"pd.dtpractgrupal");
			$VTdtprlecciones=get_result($VLdtDatos,$i,"pd.dtprlecciones");
			$VTdtprprueba=get_result($VLdtDatos,$i,"pd.dtprprueba");
			$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
			$VTMtrestado=get_result($VLdtDatos,$i,"m.mtrestado");
				
				switch ($VTdtprestado){
				case "4":
					$VTColor="#8BFB7B"; /// verde
				break 1;
				case "5":
					$VTColor="#FCC0A7"; /// rojo
				break 1;
				case "6":
					$VTColor="#80FFFF"; /// azul
				break 1;
				case "7":
					$VTColor="#C99CC9"; /// lila
				break 1;
				case "8":
					$VTColor="#FB97B3"; /// lila
				break 1;
				case "9":
					$VTColor="#999999"; /// lila
				break 1;
				case "10":
					$VTColor="#666666"; /// lila
				break 1;

				}

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
    <tr bgcolor="<? echo $VTColor; ?>" >
    	<td> <?php //echo $VTdtprcodigo."-".$VTdtprestado; ?><input type="checkbox" name="txt_Camp12[]" <?php if ($VTdtprestado==5 || $VTdtprestado==7 || $VTdtprestado > 8){ ?> disabled="disabled" <?php } ?> value="<?php echo $VTdtprcodigo; ?>" <?php if ( $VTdtprestado==5 || $VTdtprestado==7 || $VTdtprestado==9 ) { ?> checked="checked" <?php } ?>  > <?php echo $i+1; ?> </td>
        <td width="40%"><font size="-1" color="<?=$VLdtColor; ?>" ><? echo utf8_encode($VTApellido." ".$VTNombre." ".$VLdtObserv);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_matfamilia[]" value="<?php echo $VTdtmatfamilia; ?>"></font></td>
        <td width="10%" align="center"><?php
		
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
		 ?></td>
        <td width="10%" align="center"><?php 
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
		?></td>
        <td width="10%" align="center"><?php 
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
		?></td>
        <td width="10%" align="center"><?php 
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
	
?>
    <tr bgcolor="<? echo $VTColor; ?>" >
    	<td> <?php //echo $VTdtprcodigo."-".$VTdtprestado; ?><input type="checkbox" name="txt_Camp12[]" <?php if ($VTdtprestado==5 || $VTdtprestado==7 || $VTdtprestado > 8){ ?> disabled="disabled" <?php } ?> value="<?php echo $VTdtprcodigo; ?>" <?php if ( $VTdtprestado==5 || $VTdtprestado==7 || $VTdtprestado==9 ) { ?> checked="checked" <?php } ?>  ><?php echo $i+1; ?> </td>
        <td width="40%"><font size="-1" color="<?=$VLdtColor; ?>" ><? echo utf8_encode($VTApellido." ".$VTNombre." ".$VLdtObserv);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><input type="hidden" name="txt_matfamilia[]" value="<?php echo $VTdtmatfamilia; ?>"></font></td>
        <td width="10%" align="center"><?php echo number_format($VTdtprtareas,2); ?></td>
        <td width="10%" align="center"><?php echo number_format($VTdtpractindiv,2); ?></td>
        <td width="10%" align="center"><?php echo number_format($VTdtprlecciones,2); ?></td>
        <td width="10%" align="center"><?php echo number_format($VTdtprprueba,2); ?></td>
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
			////// PARA EL CASO EN QUE NO ES RETIRADO NI DESERTOR
			if ( $VTMtrestado==1 ) {
			$VTPromedioCurso= $VTPromedioCurso + $VTdtprpromedio;
			$VTDivisor= $VTDivisor + 1;
			}
		}
		echo  number_format($VTdtprpromedio,2); ?></td>
    </tr>
    
<?php 
			}
		}
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
    <td><B>PROMEDIO GENERAL DEL CURSO: <?php
	
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
			break 0;
			case "1": //////version 2.0
?>
 <tr>
	<td ><fieldset  >
						  <legend ><font size="+2" ><?  echo utf8_encode($VtEspecialidad." ".$VtCurso." ".$VtParalelo."  /  ".$VtMateria); ?></font></legend>
						<table width="100%" border="1">
                          <tr>
<?php      
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		$VTDesA1=get_result($VLdtDatos,0,"pd.prcdesca1");
		$VTDesA2=get_result($VLdtDatos,0,"pd.prcdesca2");
	}
                          
?>                     
                            <td width="3%"  rowspan="2"> No <?php echo $VTTotal; ?> </td>
							<td width="30%"  align="center" rowspan="2"><font size="-1" >NOMINA</font></td>
							<td width="25%" align="center" colspan="4" ><font size="-1" ><B>INSUMO1</B></font></td>
							<td width="20%" align="center" colspan="3"><font size="-1" ><B>INSUMO2</B></font></td>
							<td width="5%"  align="center" rowspan="2"><font size="-1" >PROM.</font></td>
							<td width="5%"  align="center" rowspan="2"><font size="-1" >REF. ACAD.</font></td>
							<td width="5%" align="center" rowspan="2"><font size="-1" >PROM. PARCIAL</font></td>
						  </tr>
                          <tr>
                          	<td>Tarea</td>
                            <td>Leccion</td>
                            <td><?php echo utf8_encode($VTDesA1);  ?>&nbsp;</td>
                          	<td><?php echo utf8_encode($VTDesA2);  ?>&nbsp;</td>
                          	<td>Act. Indiv.</td>                            
                            <td>Act. Grupal</td>
                            <td>Eval. Parcial</td>
                          </tr>

<?PHP 

	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTdtprcodigo=get_result($VLdtDatos,$i,"pd.dtprcodigo");
			$VTdtprestado=get_result($VLdtDatos,$i,"pd.dtprestado");
			$VTdtprtareas=get_result($VLdtDatos,$i,"pd.dtprtareas");
			$VTdtpractindiv=get_result($VLdtDatos,$i,"pd.dtpractindiv");
			$VTdtpractgrupal=get_result($VLdtDatos,$i,"pd.dtpractgrupal");
			$VTdtprlecciones=get_result($VLdtDatos,$i,"pd.dtprlecciones");
			$VTdtpradicional1=get_result($VLdtDatos,$i,"pd.dtpradicional1");
			$VTdtpradicional2=get_result($VLdtDatos,$i,"pd.dtpradicional2");
			$VTdtprprueba=get_result($VLdtDatos,$i,"pd.dtprprueba");
			$VTdtprrefuerzo=get_result($VLdtDatos,$i,"pd.dtprrefuerzo");
			$VTdtprpromedio1=get_result($VLdtDatos,$i,"pd.dtprpromedio1");
			$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
			$VTdtprestado=get_result($VLdtDatos,$i,"pd.dtprestado");			
			$VTMtrestado=get_result($VLdtDatos,$i,"m.mtrestado");
			
				switch ($VTdtprestado){
				case "4":
					$VTColor="#8BFB7B"; /// verde
				break 1;
				case "5":
					$VTColor="#FCC0A7"; /// rojo
				break 1;
				case "6":
					$VTColor="#80FFFF"; /// azul
				break 1;
				case "7":
					$VTColor="#C99CC9"; /// lila
				break 1;
				case "8":
					$VTColor="#FB97B3"; /// lila
				break 1;
				case "9":
					$VTColor="#999999"; /// lila
				break 1;

				}
				
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
    	<td><input type="checkbox" name="txt_Camp11[]" value="" ><input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"> <?php echo $i+1; ?> </td>
        <td width="40%"><font size="-1" color="<?=$VLdtColor; ?>" ><? echo utf8_encode($VTApellido." ".$VTNombre." ".$VLdtObserv);  ?>
        <input type="hidden" name="txt_matfamilia[]" value="<?php echo $VTdtmatfamilia; ?>"></font></td>
        <td width="10%" align="center"><?php
		
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
		 ?></td>
        <td width="10%" align="center"><?php 
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
		?></td>
        <td width="10%" align="center"><?php 
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
		?></td>
        <td width="10%" align="center"><?php 
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
				$Seleccion=0;
				if ( $NoActivos>0){
					for ( $x=0; $x<$NoActivos; $x++)
					{
						if ( $VLdtCamp12[$x]==$VTdtprcodigo)
						{
							$Seleccion=1;
						}
					}
				} else
				{ $Seleccion=0; }
				
?>
    <tr bgcolor="<? echo $VTColor; ?>" >
    	<td> <?php //echo $VTdtprcodigo."-".$VTdtprestado; ?><input type="checkbox" name="txt_Camp12[]" <?php if ($VTdtprestado==5 || $VTdtprestado==7 || $VTdtprestado > 8){ ?> disabled="disabled" <?php } ?> value="<?php echo $VTdtprcodigo; ?>" <?php if ( $VTdtprestado==5 || $VTdtprestado==7 || $VTdtprestado==9 ) { ?> checked="checked" <?php } ?>  ><input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"><?php echo $i+1; ?> </td>
        <td ><font size="-1" color="<?=$VLdtColor; ?>" ><? echo utf8_encode($VTApellido." ".$VTNombre." ".$VLdtObserv);  ?>
        <input type="hidden" name="txt_matfamilia[]" value="<?php echo $VTdtmatfamilia; ?>"></font></td>
			<td  align="center"><font  <?php if($VTdtprtareas<7 && $VTdtprtareas>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtprtareas,2); ?></font></td>
			<td  align="center"><font  <?php if($VTdtprlecciones<7 && $VTdtprlecciones>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtprlecciones,2); ?></font></td>
			<td  align="center"><font  <?php if($VTdtpradicional1<7 && $VTdtpradicional1>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtpradicional1,2); ?></font></td>
			<td  align="center"><font  <?php if($VTdtpradicional2<7 && $VTdtpradicional2>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtpradicional2,2); ?></font></td>
			<td  align="center"><font  <?php if($VTdtpractindiv<7 && $VTdtpractindiv>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtpractindiv,2); ?></font></td>
			<td  align="center"><font  <?php if($VTdtpractgrupal<7 && $VTdtpractgrupal>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtpractgrupal,2); ?></font></td>
			<td  align="center"><font  <?php if($VTdtprprueba<7 && $VTdtprprueba>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtprprueba,2); ?></font></td>
			<td  align="center"><font  <?php if($VTdtprpromedio1<7 && $VTdtprpromedio1>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtprpromedio1,2); ?></font></td>
			<td  align="center"><font  <?php if($VTdtprrefuerzo<7 && $VTdtprrefuerzo>0 ){ ?> color="#CC0000" <?php } ?> ><?php echo number_format($VTdtprrefuerzo,2); ?></font></td>
			<td  align="center"><font  <?php if($VTdtprpromedio<7 && $VTdtprpromedio>0 ){ ?> color="#CC0000" <?php } ?> ><b><?php echo number_format($VTdtprpromedio,2); ?></b></font></td>    </tr>
    
<?php 
			}
		}
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
    <td><B>PROMEDIO GENERAL DEL CURSO: <?php
	
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
	}
break 1;

case "2":
/////////////////// PARA MATERIAS CUALITATIVAS
?>
    <tr>
    	<td>
<fieldset  >
						  <legend ><?  echo utf8_encode($VtEspecialidad." ".$VtCurso." ".$VtParalelo."  /  ".$VtMateria); ?></legend>
						<table width="100%" border="1">
						                            <tr>
                            <td width="10" rowspan="2"> No </td>
							<td width="200" align="center" rowspan="2"><font size="-1" >NOMINA</font></td>
							<td width="20%" align="center" colspan="2" ><font size="-1" ><B>INSUMO1</B></font></td>
							<td width="10%" align="center"><font size="-1" ><B>INSUMO2</B></font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >REFUERZO ACADEMICO</font></td>
							<td width="10%" align="center" rowspan="2"><font size="-1" >PROMEDIO</font></td>
						  </tr>
                          <tr>
                          	<td>Act. Indiv.</td>
                            <td>Act. Grupal</td>
                            <td>Evaluación Parcial</td>
                            
                          </tr>

<?PHP 
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTdtprcodigo=get_result($VLdtDatos,$i,"pd.dtprcodigo");
			$VTdtprestado=get_result($VLdtDatos,$i,"pd.dtprestado");
			$VTdtprtareas=get_result($VLdtDatos,$i,"pd.dtprtareas");
			$VTdtpractindiv=get_result($VLdtDatos,$i,"pd.dtpractindiv");
			$VTdtpractgrupal=get_result($VLdtDatos,$i,"pd.dtpractgrupal");
			$VTdtprlecciones=get_result($VLdtDatos,$i,"pd.dtprlecciones");
			$VTdtprprueba=get_result($VLdtDatos,$i,"pd.dtprprueba");
			$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
			$VTMtrestado=get_result($VLdtDatos,$i,"m.mtrestado");

			
				switch ($VTdtprestado){
				case "4":
					$VTColor="#8BFB7B"; /// verde
				break 1;
				case "5":
					$VTColor="#FCC0A7"; /// rojo
				break 1;
				case "6":
					$VTColor="#80FFFF"; /// azul
				break 1;
				case "7":
					$VTColor="#C99CC9"; /// lila
				break 1;
				case "8":
					$VTColor="#FB97B3"; /// lila
				break 1;
				case "9":
					$VTColor="#999999"; /// lila
				break 1;

				}
				
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
    <tr bgcolor="<? echo $VTColor; ?>" >
    	<td> <?php //echo $VTdtprcodigo."-".$VTdtprestado; ?><input type="checkbox" name="txt_Camp12[]" <?php if ($VTdtprestado==5 || $VTdtprestado==7 || $VTdtprestado > 8){ ?> disabled="disabled" <?php } ?> value="<?php echo $VTdtprcodigo; ?>" <?php if ( $VTdtprestado==5 || $VTdtprestado==7 || $VTdtprestado==9 ) { ?> checked="checked" <?php } ?>  > <?php echo $i+1; ?> </td>
        <td width="40%"><font size="-1" color="<?=$VLdtColor; ?>" ><? echo utf8_encode($VTApellido." ".$VTNombre." ".$VLdtObserv);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"></font></td>
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
    	<td width="700">
<fieldset  >
						  <legend ><?  echo utf8_encode($VtEspecialidad." ".$VtCurso." ".$VtParalelo."  /  ".$VtMateria); ?></legend>
						<table width="100%" border="1">
						  <tr>
    						<td width="10%">No </td>
							<td width="50%" align="center"><font size="-1" >Apellidos y Nombres</font></td>
							<td width="20%" align="center">&nbsp;</td>
							<td width="20%" align="center"><font size="-1" >Comportamiento</font></td>
						  </tr>
<?PHP 
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ( $VLnuDatos>0 )
	{
		for ( $i=0; $i< $VLnuDatos; $i++  )
		{
			$VTApellido=get_result($VLdtDatos,$i,"p.perapellidos");
			$VTNombre=get_result($VLdtDatos,$i,"p.pernombres");
			$VTdtprcodigo=get_result($VLdtDatos,$i,"pd.dtprcodigo");
			$VTdtprestado=get_result($VLdtDatos,$i,"pd.dtprestado");
			$VTdtprtareas=get_result($VLdtDatos,$i,"pd.dtprtareas");
			$VTdtpractindiv=get_result($VLdtDatos,$i,"pd.dtpractindiv");
			$VTdtpractgrupal=get_result($VLdtDatos,$i,"pd.dtpractgrupal");
			$VTdtprlecciones=get_result($VLdtDatos,$i,"pd.dtprlecciones");
			$VTdtprprueba=get_result($VLdtDatos,$i,"pd.dtprprueba");
			$VTdtprpromedio=get_result($VLdtDatos,$i,"pd.dtprpromedio");
			$VTMtrestado=get_result($VLdtDatos,$i,"m.mtrestado");

			
				switch ($VTdtprestado){
				case "4":
					$VTColor="#8BFB7B"; /// verde
				break 1;
				case "5":
					$VTColor="#FCC0A7"; /// rojo
				break 1;
				case "6":
					$VTColor="#80FFFF"; /// azul
				break 1;
				case "7":
					$VTColor="#C99CC9"; /// lila
				break 1;
				case "8":
					$VTColor="#FB97B3"; /// lila
				break 1;
				case "9":
					$VTColor="#999999"; /// lila
				break 1;

				}
				
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
    <tr bgcolor="<? echo $VTColor; ?>" >
    	<td> <?php //echo $VTdtprcodigo."-".$VTdtprestado; ?><input type="checkbox" name="txt_Camp12[]" <?php if ($VTdtprestado==5 || $VTdtprestado==7 || $VTdtprestado > 8){ ?> disabled="disabled" <?php } ?> value="<?php echo $VTdtprcodigo; ?>" <?php if ( $VTdtprestado==5 || $VTdtprestado==7 || $VTdtprestado==9 ) { ?> checked="checked" <?php } ?>  ><?php echo $i+1; ?> </td>
        <td width="404"><font size="-1" color="<?=$VLdtColor; ?>" ><? echo utf8_encode($VTApellido." ".$VTNombre." ".$VLdtObserv);  ?>
        <input type="hidden" name="txt_dtprcodigo[]" value="<?php echo $VTdtprcodigo; ?>"></font></td>
        <td width="53" align="center">&nbsp;</td>
        <td width="82" align="center">  <?php 
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
						  <legend ><?  echo utf8_encode($VtEspecialidad." ".$VtCurso." ".$VtParalelo."  /  ".$VtMateria); ?></legend>
						<table width="100%" border="1">
						  <tr>
                            <td>No </td>
							<td width="40%" align="center"><font size="-1" >Apellidos y Nombres</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</td>
							<td width="10%" align="center"><font size="-1" >Faltas Justificadas</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</font></td>
							<td width="10%" align="center"><font size="-1" >Faltas Injustificadas</font></td>
							<td width="10%" align="center"><font size="-1" >&nbsp;</font></td>
							<td width="10%" align="center"><font size="-1" >Atrasos</font></td>
						  </tr>
<?PHP 
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
			$VTdtprestado=get_result($VLdtDatos,$i,"pd.dtprestado");			
			$VTMtrestado=get_result($VLdtDatos,$i,"m.mtrestado");

			
				switch ($VTdtprestado){
				case "4":
					$VTColor="#8BFB7B"; /// verde
				break 1;
				case "5":
					$VTColor="#FCC0A7"; /// rojo
				break 1;
				case "6":
					$VTColor="#80FFFF"; /// azul
				break 1;
				case "7":
					$VTColor="#C99CC9"; /// lila
				break 1;
				case "8":
					$VTColor="#FB97B3"; /// lila
				break 1;
				case "9":
					$VTColor="#999999"; /// lila
				break 1;

				}
				
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
    <tr bgcolor="<? echo $VTColor; ?>" >
    	<td> <?php //echo $VTdtprcodigo."-".$VTdtprestado; ?><input type="checkbox" name="txt_Camp12[]" <?php if ($VTdtprestado==5 || $VTdtprestado==7 || $VTdtprestado > 8){ ?> disabled="disabled" <?php } ?> value="<?php echo $VTdtprcodigo; ?>" <?php if ( $VTdtprestado==5 || $VTdtprestado==7 || $VTdtprestado==9 ) { ?> checked="checked" <?php } ?>  ><?php echo $i+1; ?> </td>
        <td width="40%"><font size="-1" ><font size="-1" color="<?=$VLdtColor; ?>" ><? echo utf8_encode($VTApellido." ".$VTNombre." ".$VLdtObserv);  ?>
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

case "5":
//////////////// PARA EL CASO DE SER TUTOR

//////////////// CONSULTAMOS EL NUMERO DE MATERIAS DEL CURSO 
	$VTQueryMC="SELECT m.matcodigo, m.matdescripcion, m.mattipo, 
	m.famcodigo, m.matnoconsecutivo 
	FROM `mtr` m, grp g, grpmtr gm 
	WHERE 
	m.matcodigo=gm.matcodigo and gm.grucodigo=g.grucodigo 
	and g.curcodigo=".$VLdtCamp9."
	and g.anocodigo=".$VLAnoLocal."
	and g.espcodigo=".$VLdtCamp1." 
	order by m.mattipo, m.matnoconsecutivo, m.matdescripcion ";
	$VLdtDatosMC = execute_query($VTQueryMC,$VLConexion);
	$VLnuDatosMC = total_records($VLdtDatosMC);

//////////////// CONSULTAMOS EL NUMERO DE ESTUDIANTES DEL CURSO
	$VTQueryEC="SELECT m.mtrno, p.perapellidos, p.pernombres, m.mtrestado
FROM `mtrcl` m, grp g, nsttcnstdnt i, psn p
WHERE 
m.inescodigo=i.inescodigo
and i.percodigo=p.percodigo
and m.grucodigo=g.grucodigo
and g.espcodigo=".$VLdtCamp1." 
and g.anocodigo=".$VLAnoLocal."
and g.curcodigo=".$VLdtCamp9."
and m.parcodigo=".$VLdtCamp8."
and m.anocodigo=".$VLAnoLocal."
order by p.perapellidos, p.pernombres
";
	$VLdtDatosEC = execute_query($VTQueryEC,$VLConexion);
	$VLnuDatosEC = total_records($VLdtDatosEC);
///////////////  CONSULTAMOS LOS PROMEDIOS DEL QUIMESTRE Y PARCIAL
	
	$VTQueryPC="SELECT q.mtrno, q.matcodigo, p.dtprpromedio, 
	p.dtprlecciones, p.dtpractindiv, p.dtpractgrupal
FROM `prcldtll` p, qmstrdtll q
WHERE 
q.quicodigo=".$VLdtCamp6." and p.prccodigo=".$VLdtCamp7." and
q.dtqmcodigo = p.dtqmcodigo
AND q.mtrno
IN (
SELECT m.mtrno
FROM `mtrcl` m, grp g, nsttcnstdnt i, psn p
WHERE m.inescodigo = i.inescodigo
AND i.percodigo = p.percodigo
AND m.grucodigo = g.grucodigo
AND g.espcodigo=".$VLdtCamp1." 
AND g.curcodigo =".$VLdtCamp9."
AND m.parcodigo =".$VLdtCamp8."
AND m.anocodigo =".$VLAnoLocal."
)
AND q.matcodigo
IN (
SELECT m.matcodigo
FROM `mtr` m, grp g, grpmtr gm
WHERE m.matcodigo = gm.matcodigo
AND gm.grucodigo = g.grucodigo
and g.espcodigo=".$VLdtCamp1." 
AND g.curcodigo =".$VLdtCamp9."
and g.anocodigo=".$VLAnoLocal."
)
ORDER BY mtrno";

	$VLdtDatosPC = execute_query($VTQueryPC,$VLConexion);
	$VLnuDatosPC = total_records($VLdtDatosPC);

?>
<tr><td><fieldset  >
						  <legend ><font size="+2" ><?  echo utf8_encode($VtEspecialidad." ".$VtCurso." ".$VtParalelo." "); ?></font></legend>
<table width="100%" border="1">
  <tr>
  <? ////////////////////////////////  CABECERA DEL REPORTE///////////////////////  ?>
      <td>No</td>
    <td width="200" > <font size="-2">Apellidos y Nombres</font></td>
    <?php
    	if ($VLnuDatosMC>0){
			for($i=0; $i<$VLnuDatosMC; $i++)
			{
				$VTMateria=get_result($VLdtDatosMC,$i,"m.matdescripcion");
				$VTMattipo=get_result($VLdtDatosMC,$i,"m.mattipo");
	?>
    <td align="center"><font size="-3"><?  
	
	if($VTMattipo==5 || $VTMattipo==4 )
	{	
		if ($VTMattipo==5 )
		{
			echo "PROMEDIO";	
		} else {
			echo " Falta Just. "; ?> </font></td>
    <td align="center"><font size="-3"><?  
			echo " Falta Inj. "; ?> </font></td>
    <td align="center"><font size="-3"><?
			echo " Atraso "; 
		}
	}else{
		echo utf8_encode($VTMateria); 
		
	}
	?></font></td>
    <?php
			}
		}
	?>
    <td><? //=$VTQueryMC; ?>OBSERVACIONES</td>
  </tr>
  <?php
  ////////////////////////////////// EMPEZAMOS A RECUPERAR LAS FILAS /////////////
  	if($VLnuDatosEC>0)
	{ 
		for($j=0; $j<=$VLnuDatosEC; $j++) //////////// TANTAS FILAS COMO ESTUDIANTES
		{
				$VTApellido=get_result($VLdtDatosEC,$j,"p.perapellidos");
				$VTNombre=get_result($VLdtDatosEC,$j,"p.pernombres");
				$VTMtrno=get_result($VLdtDatosEC,$j,"m.mtrno");
				$VTMtrestado=get_result($VLdtDatosEC,$j,"m.mtrestado");
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
  <tr bgcolor="<? echo $VTColor; ?>" >
    	<td> <?php //echo $VTdtprcodigo."-".$VTdtprestado; ?><?=$j+1; ///// NUMERAMOS LOS ESTUDIANTES ?></td>
    
    <? if ($j==$VLnuDatosEC ) { ///// SI SE TERMINARON LOS ESTUDIANTES PONEMOS EL PROMEDIO
	$VTPromedioCursoGeneral=0;
	$VTDivisorPCGeneral=0;
	 ?>
     <td>Promedio Materia</td>
     <?
	 	
    	if ($VLnuDatosMC>0){
			for($i=0; $i<$VLnuDatosMC; $i++)
			{
	?>
    <td align="center">
    <? 
        if ($VTDivisorMateria[$i]==0){
			$VTMattipo=get_result($VLdtDatosMC,$i,"m.mattipo");
			if($VTMattipo==5)
			{	
				if ( $VTDivisorPCGeneral>0)
				{ 
				?>
                <font size="+2"><b>
                <?php
				
					echo number_format($VTPromedioCursoGeneral/$VTDivisorPCGeneral,2);
				?>
                </b></font>
                <?php
					 
				}
			}else{
				if ($VTMattipo==4){
					echo "&nbsp";
					?>
                    </td><td>
                    <?
					echo "&nbsp";
					?>
                    </td><td>
                    <?
					echo "&nbsp";
				} else {
					echo "&nbsp";
				}
			}
        }else {
    		echo number_format($VTPromedioMateria[$i]/$VTDivisorMateria[$i],2); 
			$VTPromedioCursoGeneral+=$VTPromedioMateria[$i]/$VTDivisorMateria[$i];
			$VTDivisorPCGeneral++;
        }
    ?>
    
    </td>
    <? }}} else { ?>
    <td><font size="-2" color="<?=$VLdtColor; ?>" ><?  echo utf8_encode($VTApellido." ".$VTNombre." ".$VLdtObserv); ?></font></td>
	<?
	
    	if ($VLnuDatosMC>0){
			$VTPromedioEstudiante=0;
			$VTDivisorEstudiante=0;
			for($i=0; $i<$VLnuDatosMC; $i++)
			{
				$VTMateria=get_result($VLdtDatosMC,$i,"m.matdescripcion");
				$VTMatcodigo=get_result($VLdtDatosMC,$i,"m.matcodigo");
				$VTMattipo=get_result($VLdtDatosMC,$i,"m.mattipo");
				$VTMatfamilia=get_result($VLdtDatosMC,$i,"m.famcodigo");
				for($k=0; $k<$VLnuDatosPC; $k++)
				{
					
					$VTdtMtrno=get_result($VLdtDatosPC,$k,"q.mtrno");
					$VTdtMatcodigo=get_result($VLdtDatosPC,$k,"q.matcodigo");
					$VTPromedio=get_result($VLdtDatosPC,$k,"p.dtprpromedio");
					$VTFJ=get_result($VLdtDatosPC,$k,"p.dtpractindiv");
					$VTFI=get_result($VLdtDatosPC,$k,"p.dtprlecciones");
					$VTAT=get_result($VLdtDatosPC,$k,"p.dtpractgrupal");
					
					if ($VTdtMatcodigo==$VTMatcodigo && $VTdtMtrno==$VTMtrno )
					{
						$k=$VLnuDatosPC;
					}else
					{
						$VTPromedio=0;
					}
				}
	
	?>
    <td align="center"><b> <font size="2" <?php if($VTPromedio<7 && $VTMattipo<4) { ?> color="#FF0000" <?php }else{ ?> color="#000066" <?php } ?>  >
	<?php	switch ($VTMattipo) {
case "1":
	if($VTMatfamilia<4)
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
	} else {
		if ( $VTMattipo==5)
		{
			if ($VTDivisorEstudiante>0){
				echo number_format($VTPromedioEstudiante/$VTDivisorEstudiante,2);
			}else{
				echo "NR";
			}
		}else {
			echo number_format($VTPromedio,2);
		}
		if ($VTPromedio >0)
		{
			//////// PARA EL CASO DE SER RETIRADO //////
			//if( $VTMtrestado== 1 ) {
				$VTPromedioEstudiante=$VTPromedioEstudiante+$VTPromedio;
				$VTDivisorEstudiante=$VTDivisorEstudiante+1;
			//}
			
		}
	}
  if ($VTMtrestado==1 ){
	  $VTPromedioMateria[$i]=$VTPromedioMateria[$i]+$VTPromedio;
	  if ( $VTPromedio != 0)
	  { $VTDivisorMateria[$i]=$VTDivisorMateria[$i]+1; }
  }
	break 1;

case "2":


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
		    
break 1;
case "3":


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
break 1;
case "4":
		echo $VTFJ;
		?>
      	</font></b></td><td align="center"><b> <font size="2"  color="#000066" >  
        <?
		echo $VTFI;
		?>
      	</font></b></td><td align="center">  <b> <font size="2" color="#000066" >
        <?
		echo $VTAT;
		
break 1;
case "5":
//// IMPRIMIMOS EL PROMEDIO GENERAL DEL ESTUDIANTE
	if ($VTDivisorEstudiante>0){
		echo number_format($VTPromedioEstudiante/$VTDivisorEstudiante,2);
	}else{
		echo "NR";
	}
		    
break 1;


	}
	
	?></font></b></td>
    <?php
			}
			}
		}
	
	?>
    <td>&nbsp;</td>
  </tr>
  <?php
		}
	}
  ?>
</table>


<?php
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
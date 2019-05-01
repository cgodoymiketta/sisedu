
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
$VLdtDtQmCodigo=$_GET[txt_dtqmcodigo];
$NoActivos=count($VLdtCamp12);

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
	$VtQueryE=" Select espdescripcion, espsiglas, espseccion from spcldd where espcodigo=".$VLdtCamp1;
////////  RECUPERAMOS LA SECCION PARA EL PARCIAL //////
	$VLdtDatosE = execute_query($VtQueryE,$VLConexion);
	$VLnuDatosE = total_records($VLdtDatosE);
	if ( $VLnuDatosE>0 )
	{
		$VtSeccion=get_result($VLdtDatosE,0,"espseccion");
	}
	
	
	$VtQueryC=" Select curdescripcion from crs where curcodigo=".$VLdtCamp9;
	$VtQueryP=" Select pardescripcion from prll where parcodigo=".$VLdtCamp8;
	$VtQueryM=" Select matdescripcion, mattipo, famcodigo from mtr where matcodigo=".$VLdtCamp10;
	$VtQueryQ=" Select quidescripcion, quitipo from qmstr where quicodigo=".$VLdtCamp6." order by quiorden";
	$VtQueryPr=" Select prcdescripcion from prcl where quicodigo=".$VLdtCamp6." and  prcseccion='".$VtSeccion."' order by prcorden";
	$VtQueryRp="SELECT e.perapellidos, e.pernombres, q.quicodigo, q.quiorden,
q.quidescripcion, qd.dtqmcodigo, qd.quipromparcial, qd.mtrestado,
qd.quiequivalencia80, qd.quiexamen, qd.quiequivalencia20, qd.dtqmestado, 
qd.quipromquimestre, p.prccodigo, p.prcdescripcion,
p.prcorden, pd.dtprpromedio, m.matdescripcion, m.matcodigo, 
m.matnoconsecutivo, m.mattipo, mt.mtrestado, mt.mtrno
FROM qmstr q, qmstrdtll qd, prcl p, prcldtll pd, psn e,
nsttcnstdnt ei, mtrcl mt, mtr m, grp g
WHERE  q.inscodigo=".$VLInstitucion."
and q.anocodigo=".$VLAnoLocal."
and q.quicodigo=".$VLdtCamp6."
and q.quicodigo = qd.quicodigo 
and p.quicodigo=q.quicodigo
and p.prccodigo=pd.prccodigo
and qd.dtqmcodigo=pd.dtqmcodigo
and m.matcodigo=".$VLdtCamp10."
and qd.matcodigo=m.matcodigo
and mt.parcodigo=".$VLdtCamp8."
and qd.mtrno=mt.mtrno
and mt.inescodigo=ei.inescodigo
and ei.percodigo = e.percodigo
and g.curcodigo=".$VLdtCamp9."
and g.espcodigo=".$VLdtCamp1."
and mt.grucodigo=g.grucodigo
order by q.quiorden, e.perapellidos, e.pernombres,
m.mattipo, m.matnoconsecutivo, m.matdescripcion, 
p.prcorden";

	$VtQryQuiEst="Select qd.dtqmcodigo, qd.dtqmestado 
	from qmstrdtll qd, mtrcl m, grp g
	where qd.matcodigo=".$VLdtCamp10."
	and qd.quicodigo=".$VLdtCamp6."
	and qd.mtrno=m.mtrno
	and m.anocodigo=".$VLAnoLocal."
	and m.parcodigo=".$VLdtCamp8."
	and m.grucodigo=g.grucodigo
	and g.curcodigo=".$VLdtCamp9."
	and g.espcodigo=".$VLdtCamp1." ";
	$VLdtDatos = execute_query($VtQryQuiEst,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	

//////////////////////// verificamos los que se van a activar
///// el estado del Quimestre debe ser cerrado = quiestado=4
///// consultamos los Quimestre estudiantes del quimestre ingresado

///////// HACEMOS UN BARRIDO POR TODOS LOS ESTUDIANTES //////
	if($VLnuDatos > 0)
	{
		for ( $y=0 ; $y<$VLnuDatos; $y++) //// Nos movemos en los estudiantes
		{
			//// recuperamos el Codigo del Parcial-Estudiante y el estado
			$VTdtqmcodigo=get_result($VLdtDatos,$y,"qd.dtqmcodigo");
			$VTestado=get_result($VLdtDatos,$y,"qd.dtqmestado");
			if ( $NoActivos>0) /// confirmamos q se esten seleccionando estudiantes
			{
				for ( $x=0; $x<$NoActivos; $x++)
				{
					if ( $VLdtCamp12[$x]==$VTdtqmcodigo) // Parcial del estudiante seleccionado
					{
////////////////// RECUPERAMOS TODOS LOS CAMPOS
						$VTSqlQmdtlle="Select * from qmstrdtll where dtqmcodigo =".$VTdtqmcodigo;
						$VTdtDatosQmdtll = execute_query($VTSqlQmdtlle,$VLConexion);
						$VTActdtqmcodigo=get_result($VTdtDatosQmdtll,0,"dtqmcodigo");
						$VTActquicodigo=get_result($VTdtDatosQmdtll,0,"quicodigo");
						$VTActdtmtrno=get_result($VTdtDatosQmdtll,0,"mtrno");
						$VTActmatcodigo=get_result($VTdtDatosQmdtll,0,"matcodigo");
						$VTActquipromparcial=get_result($VTdtDatosQmdtll,0,"quipromparcial");
						$VTActquiequivalencia80=get_result($VTdtDatosQmdtll,0,"quiequivalencia80");
						$VTActquiexamen=get_result($VTdtDatosQmdtll,0,"quiexamen");
						$VTActquiequivalencia20=get_result($VTdtDatosQmdtll,0,"quiequivalencia20");
						$VTActquipromquimestre=get_result($VTdtDatosQmdtll,0,"quipromquimestre");
						$VTActmtrestado=get_result($VTdtDatosQmdtll,0,"mtrestado");
						$VTActdtqmestado=get_result($VTdtDatosQmdtll,0,"dtqmestado");
////////////////// CREAMOS LA COPIA DE ESTE CAMPO //////////////////////////////////////
						$VTSqlAudita="INSERT INTO `crrcnqmstrdtll` (`DTQMCODIGO`, `USUCODIGO`, `USUCODIGOACT`, `QUICODIGO`, `MTRNO`, `MATCODIGO`, `QUIPROMPARCIAL`, `QUIEQUIVALENCIA80`, `QUIEXAMEN`, `QUIEQUIVALENCIA20`, `QUIPROMQUIMESTRE`, `MTRESTADO`, `DTQMESTADO`) VALUES (".$VTActdtqmcodigo.",".$VLUsuario.", ".$VLUsuario.", ".$VTActquicodigo.", ".$VTActdtmtrno.", ".$VTActmatcodigo.", ".$VTActquipromparcial.", ".$VTActquiequivalencia80.", ".$VTActquiexamen.", ".$VTActquiequivalencia20.", ".$VTActquipromquimestre.", ".$VTActmtrestado.", ".$VTActdtqmestado." )";
						
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
							case 1: //// Primera Modificacion 
								
								///// CREAMOS LA COPIA DEL PARCIAL
								$VLdtDatosAud = execute_query($VTSqlAudita,$VLConexion);
								
								
								$VTTotal++;
								///// MODIFICAMOS EL ESTADO
								$VTSqlModificar= "UPDATE qmstrdtll SET dtqmestado =5 WHERE dtqmcodigo =".$VTdtqmcodigo;
								$VLdtDatosModificar = execute_query($VTSqlModificar,$VLConexion);						

								
							break 1;
							case 5://// activo y puesto nuevamente activo /// no hacemos nada
							
							break 1;
							case 6://// ya fue modificado y se lo vuelve a activar
								///// CREAMOS LA COPIA DEL PARCIAL
								$VLdtDatosAud = execute_query($VTSqlAudita,$VLConexion);
								
								
								$VTTotal++;
								///// MODIFICAMOS EL ESTADO
								$VTSqlModificar= "UPDATE qmstrdtll SET dtqmestado =7 WHERE dtqmcodigo =".$VTdtqmcodigo;
								$VLdtDatosModificar = execute_query($VTSqlModificar,$VLConexion);						
							
							break 1;	
							case 7://// ya fue modificado y se lo vuelve a activar
							
							break 1;	
							case 8://// ya fue modificado y se lo vuelve a activar
								///// CREAMOS LA COPIA DEL PARCIAL
								$VLdtDatosAud = execute_query($VTSqlAudita,$VLConexion);
								
								
								$VTTotal++;
								///// MODIFICAMOS EL ESTADO
								$VTSqlModificar= "UPDATE qmstrdtll SET dtqmestado =9 WHERE dtqmcodigo =".$VTdtqmcodigo;
								$VLdtDatosModificar = execute_query($VTSqlModificar,$VLConexion);						
							
							break 1;	
						}
						
						
					}
				}
			}
		}
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
		$vtQuimestreTipo=get_result($VLdtDatosQ,0,"quitipo");
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
	if ( $vtQuimestreTipo==1){
		$VtQueryRp="SELECT e.perapellidos, e.pernombres, q.quicodigo, q.quiorden,
q.quidescripcion, qd.dtqmcodigo, qd.quipromparcial, 
qd.quiequivalencia80, qd.quiexamen, qd.quiequivalencia20, 
qd.quipromquimestre, qd.dtqmestado, m.matdescripcion, 
m.matnoconsecutivo, m.mattipo, mt.mtrestado, mt.mtrno
FROM qmstr q, qmstrdtll qd, psn e,
nsttcnstdnt ei, mtrcl mt, mtr m, grp g
WHERE q.quicodigo = qd.quicodigo 
and qd.matcodigo=m.matcodigo
and qd.mtrno=mt.mtrno
and mt.inescodigo=ei.inescodigo
and ei.percodigo = e.percodigo
and mt.grucodigo=g.grucodigo
and q.inscodigo=".$VLInstitucion."
and q.anocodigo=".$VLAnoLocal."
and q.quicodigo=".$VLdtCamp6."
and m.matcodigo=".$VLdtCamp10."
and mt.parcodigo=".$VLdtCamp8."
and g.curcodigo=".$VLdtCamp9."
order by q.quiorden, e.perapellidos, e.pernombres,
m.mattipo, m.matnoconsecutivo, m.matdescripcion ";	
	}
	$VLdtDatosRp = execute_query($VtQueryRp,$VLConexion);
	$VLnuDatosRp = total_records($VLdtDatosRp);	


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACTIVACION DE NOTAS QUIMESTRALES</title>
</head>

<body>
<form id="RAG" name="RAG" method="get" action="">

<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><font size="+2"> ACTIVACION PARA CORRECCION </font>  </td>
      </tr>
      <tr>
        <td align="center"><font size="+2"> <? echo $VtQuimestre; ?>  </font></td>
      </tr>
      <tr>
        <td align="center"><font size="+2"> AÑO LECTIVO <? echo $VLdtPeriodo; ?> </font> </td>
      </tr>
      <tr>
        <td><input type="hidden" name="nlctv" value="<?php echo $VLAnoLocal; ?>">
        <input type="hidden" name="nsttcn" value="<?php echo $VLInstitucion; ?>">
        <input type="hidden" name="sr" value="<?php echo $VLUsuario; ?>">
        <input type="hidden" name="vlccn" value="<?php echo $vlccn; ?>">
        <input type="hidden" name="txt_Camp1" value="<?php echo $VLdtCamp1; ?>">
        <input type="hidden" name="txt_Camp6" value="<?php echo $VLdtCamp6; ?>">
        <input type="hidden" name="txt_Camp8" value="<?php echo $VLdtCamp8; ?>">
        <input type="hidden" name="txt_Camp9" value="<?php echo $VLdtCamp9; ?>">
        <input type="hidden" name="txt_Camp10" value="<?php echo $VLdtCamp10; ?>">
        
        &nbsp;</td>
      </tr>
      <tr>
        <td align="center"><input type="submit" name="button" id="activar" value="Activar" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
	</td>
  </tr>
  
<?php  
if ( $vtQuimestreTipo==0)
{
	//////////////// PARA EL REPORTE QUIMESTRAL
	
switch ($VtMateriaTipo) {
case "1":
 /////////  CUANTITATIVAS //////////////////////////////// 
?>  
  <TR>
  <TD>&nbsp;</TD>
  </TR>
  <tr>
  <td><fieldset><legend><? echo utf8_encode($VtCurso." ".$VtParalelo." / ".$VtMateria); ?></legend>
  <table width="800" border="1">
  <tr>
    <td width="40"><font size="-1">NO <?php //echo $NoActivos." - ".$VLnuDatos; ?></font></td>
    <td width="250"><font size="-1">APELLIDOS Y NOMBRES</font></td>
<?php
	for ($k=0; $k<$VLnuDatosPr; $k++)
	{
?>
	<td align="center"><font size="-1">
<?PHP 
		$VtParcial=get_result($VLdtDatosPr,$k,"prcdescripcion");
	echo $VtParcial;
?>    
    </font></td>
<?php
	}
?>    
	<td align="center"><font size="-1">PROM. PARCIAL</font>
    
    </td>
	<td align="center"><font size="-1">EQUIV. 80%</font>
    
    </td>
	<td align="center"><font size="-1">EXAMEN</font>
    
    </td>
	<td align="center"><font size="-1">EQUIV. 20%</font>
    
    </td>
	<td align="center"><font size="-1">PROM. QUIMESTRAL</font>
    
    </td>
  </tr>
<?php  
	if ( $VLnuDatosRp>0 )
	{
////////////// SI EXISTEN ESTUDIANTES DIBUJO LA FILAS ///////
?>
  <tr>
<?PHP		
		
		$j=0;
		
		$VtMtrnoAnt=get_result($VLdtDatosRp,0,"mt.mtrno");
		for($i=0; $i<$VLnuDatosRp;$i++)
		{	
			$VTQcodigo=get_result($VLdtDatosRp,$i,"qd.dtqmcodigo");
			$VTQEstado=get_result($VLdtDatosRp,$i,"qd.dtqmestado");
			$VtApellidos=get_result($VLdtDatosRp,$i,"e.perapellidos");
			$VtNombres=get_result($VLdtDatosRp,$i,"e.pernombres");
			$VtMtrno=get_result($VLdtDatosRp,$i,"mt.mtrno");
			$j++;
			$VTMtrestado=get_result($VLdtDatosRp,$i,"mt.mtrestado");
			
							switch ($VTQEstado){
				case "1":
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
			$VtEstudiante=$VtApellidos." ".$VtNombres.$VLdtObserv;
			
?>
    <td align="right" bgcolor="<? echo $VTColor; ?>" > <?php //echo $VTQcodigo."-".$VTQEstado; ?> <input type="checkbox" name="txt_Camp12[]" <?php if ($VTQEstado==5 || $VTQEstado==7 || $VTQEstado > 8){ ?> disabled="disabled" <?php } ?> value="<?php echo $VTQcodigo; ?>" <?php if ( $VTQEstado==5 || $VTQEstado==7 || $VTQEstado==9 ) { ?> checked="checked" <?php } ?>  ><input type="hidden" name="txt_dtqmcodigo[]" value="<?php echo $VTQcodigo; ?>"><? echo $j; ?></td>
    <td bgcolor="<? echo $VTColor; ?>" ><font size="-2" color="<?=$VLdtColor; ?>"><? echo utf8_encode($VtEstudiante); ?></font></td>
<?PHP
///////////////IMPRIMIMOS LOS PARCIALES
	for( $m=0; $m<$VLnuDatosPr; $m++)
	{
			$x=$i+$m;
			$VtParcial=get_result($VLdtDatosRp,$x,"pd.dtprpromedio");
?>
	<td align="right" bgcolor="<? echo $VTColor; ?>"  ><font color=<?php if ( $VtParcial < 7 && $VtParcial > 0 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			switch ($VtParcial) {
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

	 		echo number_format($VtParcial,2); 
		}
	?> </font></td>
<?php
		
		
	}
	$i=$i+$m-1;
///////////IMPRIMIRMOS LOS RESULTADOS QUIMESTRALES
			$x=$i-1;
			$VtPromParc=get_result($VLdtDatosRp,$x,"qd.quipromparcial");
			$VtEquiv80=get_result($VLdtDatosRp,$x,"qd.quiequivalencia80");
			$VtExamen=get_result($VLdtDatosRp,$x,"qd.quiexamen");
			$VtEquiv20=get_result($VLdtDatosRp,$x,"qd.quiequivalencia20");
			$VtPromQuim=get_result($VLdtDatosRp,$x,"qd.quipromquimestre");
?>
    <TD align="right" bgcolor="<? echo $VTColor; ?>" ><font color=<?php if ( $VtPromParc < 7 && $VtPromParc > 0 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			switch ($VtPromParc) {
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

	 		echo number_format($VtPromParc,2); 
		}
	 ?></font></TD>
    <TD align="right" bgcolor="<? echo $VTColor; ?>" ><font color=<?php if ( $VtEquiv80 < 5.6 && $VtEquiv80 > 0 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			switch ($VtEquiv80) {
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

	 		echo number_format($VtEquiv80,2);  
		}
	?></font></TD>
    <TD align="right" bgcolor="<? echo $VTColor; ?>" ><font color=<?php if ( $VtExamen < 7 && $VtExamen > 0 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			switch ($VtExamen) {
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

	 		 echo number_format($VtExamen,2);
		}
	 ?></font></TD>
    <TD align="right" bgcolor="<? echo $VTColor; ?>" ><font color=<?php if ( $VtExamen < 7 && $VtExamen > 0 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			switch ($VtEquiv20) {
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

	 		echo number_format($VtEquiv20,2);
		}
	  ?></font></TD>
    <TD align="right" bgcolor="<? echo $VTColor; ?>" ><font color=<?php if ( $VtPromQuim < 7 && $VtPromQuim > 0 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			switch ($VtPromQuim) {
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

	 		echo number_format($VtPromQuim,2);
		}
	   ?></font></TD>
	</tr>
    <tr>
<?PHP
		}
///////// SIGUIENTE ESTUDIANTE
?>

  </tr>
<?PHP
	}
?>
</table>
  </fieldset></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
  
  <?php
  		break 1;
	case 2:
/////////// CUALITATIVAS /////////////////////////////////
  ?>
  
 <TR>
  <TD>&nbsp;</TD>
  </TR>
  <tr>
  <td><fieldset><legend><? echo utf8_encode($VtCurso." ".$VtParalelo." / ".$VtMateria); ?></legend>
  <table width="800" border="1">
  <tr>
    <td width="40"><font size="-1">NO</font></td>
    <td width="250"><font size="-1">APELLIDOS Y NOMBRES</font></td>
<?php
	for ($k=0; $k<$VLnuDatosPr; $k++)
	{
?>
	<td align="center"><font size="-1">
<?PHP 
		$VtParcial=get_result($VLdtDatosPr,$k,"prcdescripcion");
	echo $VtParcial;
?>    
    </font></td>
<?php
	}
?>    
	<td align="center"><font size="-1">PROM. PARCIAL</font>
    
    </td>
	<td align="center"><font size="-1">EQUIV. 80%</font>
    
    </td>
	<td align="center"><font size="-1">EXAMEN</font>
    
    </td>
	<td align="center"><font size="-1">EQUIV. 20%</font>
    
    </td>
	<td align="center"><font size="-1">PROM. QUIMESTRAL</font>
    
    </td>
  </tr>
<?php  
	if ( $VLnuDatosRp>0 )
	{
////////////// SI EXISTEN ESTUDIANTES DIBUJO LA FILAS ///////
?>
  <tr>
<?PHP		
		
		$j=0;
		$VtMtrnoAnt=get_result($VLdtDatosRp,0,"mt.mtrno");
		for($i=0; $i<$VLnuDatosRp;$i++)
		{	
			$VTQcodigo=get_result($VLdtDatosRp,$i,"qd.dtqmcodigo");
			$VTQEstado=get_result($VLdtDatosRp,$i,"qd.dtqmestado");
			$VtApellidos=get_result($VLdtDatosRp,$i,"e.perapellidos");
			$VtNombres=get_result($VLdtDatosRp,$i,"e.pernombres");
			$VtMtrno=get_result($VLdtDatosRp,$i,"mt.mtrno");
			$j++;
			$VTMtrestado=get_result($VLdtDatosRp,$i,"mt.mtrestado");
			
				switch ($VTQEstado){
				case "1":
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
			$VtEstudiante=$VtApellidos." ".$VtNombres.$VLdtObserv;
			
?>
    <td align="right" bgcolor="<? echo $VTColor; ?>" ><?php //echo $VTdtprcodigo."-".$VTdtprestado; ?> <input type="checkbox" name="txt_Camp12[]" <?php if ($VTQEstado==5 || $VTQEstado==7 || $VTQEstado > 8){ ?> disabled="disabled" <?php } ?> value="<?php echo $VTQcodigo; ?>" <?php if ( $VTQEstado==5 || $VTQEstado==7 || $VTQEstado==9 ) { ?> checked="checked" <?php } ?>  ><input type="hidden" name="txt_dtqmcodigo[]" value="<?php echo $VTQcodigo; ?>"><? echo $j; ?></td>
    <td bgcolor="<? echo $VTColor; ?>" ><font size="-2" color="<?=$VLdtColor; ?>"><? echo utf8_encode($VtEstudiante); ?></font></td>
<?PHP
///////////////IMPRIMIMOS LOS PARCIALES
	for( $m=0; $m<$VLnuDatosPr; $m++)
	{
			$x=$i+$m;
			$VtParcial=get_result($VLdtDatosRp,$x,"pd.dtprpromedio");
?>
	<td align="right" bgcolor="<? echo $VTColor; ?>"  ><font color=<?php if ( $VtParcial < 7 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			if( $VtParcial>8.99 && $VtParcial<11)
			{
				echo "EX";
			}
			if( $VtParcial>6.99 && $VtParcial<9)
			{
				echo "MB";
			}
			if( $VtParcial>4.99 && $VtParcial<7)
			{
				echo "B";
			}
			if( $VtParcial>0 && $VtParcial<5)
			{
				echo "R";
			}
			if( $VtParcial==0)
			{
				echo "NR";
			}
		}else{

		if( $VtParcial>8.99 && $VtParcial<11)
		{
			echo "EX";
		}
		if( $VtParcial>6.99 && $VtParcial<9)
		{
			echo "MB";
		}
		if( $VtParcial>4.99 && $VtParcial<7)
		{
			echo "B";
		}
		if( $VtParcial>0 && $VtParcial<5)
		{
			echo "R";
		}
		if( $VtParcial==0)
		{
			echo "NR";
		}


	 		//echo number_format($VtParcial,2); 
		}
	?> </font></td>
<?php
		
		
	}
	$i=$i+$m-1;
///////////IMPRIMIRMOS LOS RESULTADOS QUIMESTRALES
			$x=$i-1;
			$VtPromParc=get_result($VLdtDatosRp,$x,"qd.quipromparcial");
			$VtEquiv80=get_result($VLdtDatosRp,$x,"qd.quiequivalencia80");
			$VtExamen=get_result($VLdtDatosRp,$x,"qd.quiexamen");
			$VtEquiv20=get_result($VLdtDatosRp,$x,"qd.quiequivalencia20");
			$VtPromQuim=get_result($VLdtDatosRp,$x,"qd.quipromquimestre");
?>
    <TD align="right" bgcolor="<? echo $VTColor; ?>" ><font color=<?php if ( $VtPromParc < 7 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			if( $VtParcial>8.99 && $VtParcial<11)
			{
				echo "EX";
			}
			if( $VtParcial>6.99 && $VtParcial<9)
			{
				echo "MB";
			}
			if( $VtParcial>4.99 && $VtParcial<7)
			{
				echo "B";
			}
			if( $VtParcial>0 && $VtParcial<5)
			{
				echo "R";
			}
			if( $VtParcial==0)
			{
				echo "NR";
			}
		}else{

		if( $VtPromParc>8.99 && $VtPromParc<11)
		{
			echo "EX";
		}
		if( $VtPromParc>6.99 && $VtPromParc<9)
		{
			echo "MB";
		}
		if( $VtPromParc>4.99 && $VtPromParc<7)
		{
			echo "B";
		}
		if( $VtPromParc>0 && $VtPromParc<5)
		{
			echo "R";
		}
		if( $VtPromParc==0)
		{
			echo "NR";
		}


	 		//echo number_format($VtPromParc,2); 
		}
	 ?></font></TD>
    <TD align="right" bgcolor="<? echo $VTColor; ?>" ><font color=<?php if ( $VtEquiv80 < 5.6 && $VtEquiv80 > 0 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			if( $VtParcial>8.99 && $VtParcial<11)
			{
				echo "EX";
			}
			if( $VtParcial>6.99 && $VtParcial<9)
			{
				echo "MB";
			}
			if( $VtParcial>4.99 && $VtParcial<7)
			{
				echo "B";
			}
			if( $VtParcial>0 && $VtParcial<5)
			{
				echo "R";
			}
			if( $VtParcial==0)
			{
				echo "NR";
			}
		}else{

		if( $VtEquiv80>8.99 && $VtEquiv80<11)
		{
			echo "EX";
		}
		if( $VtEquiv80>6.99 && $VtEquiv80<9)
		{
			echo "MB";
		}
		if( $VtEquiv80>4.99 && $VtEquiv80<7)
		{
			echo "B";
		}
		if( $VtEquiv80>0 && $VtEquiv80<5)
		{
			echo "R";
		}
		if( $VtEquiv80==0)
		{
			echo "NR";
		}

	 		///echo number_format($VtEquiv80,2);  
		}
	?></font></TD>
    <TD align="right" bgcolor="<? echo $VTColor; ?>" ><font color=<?php if ( $VtExamen < 7 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			if( $VtExamen>8.99 && $VtExamen<11)
			{
				echo "EX";
			}
			if( $VtExamen>6.99 && $VtExamen<9)
			{
				echo "MB";
			}
			if( $VtExamen>4.99 && $VtExamen<7)
			{
				echo "B";
			}
			if( $VtExamen>0 && $VtExamen<5)
			{
				echo "R";
			}
			if( $VtExamen==0)
			{
				echo "NR";
			}
		}else{

			if( $VtExamen>8.99 && $VtExamen<11)
			{
				echo "EX";
			}
			if( $VtExamen>6.99 && $VtExamen<9)
			{
				echo "MB";
			}
			if( $VtExamen>4.99 && $VtExamen<7)
			{
				echo "B";
			}
			if( $VtExamen>0 && $VtExamen<5)
			{
				echo "R";
			}
			if( $VtExamen==0)
			{
				echo "NR";
			}

	 		// echo number_format($VtExamen,2);
		}
	 ?></font></TD>
    <TD align="right" bgcolor="<? echo $VTColor; ?>" ><font color=<?php if ( $VtExamen < 7 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			if( $VtExamen>8.99 && $VtExamen<11)
			{
				echo "EX";
			}
			if( $VtExamen>6.99 && $VtExamen<9)
			{
				echo "MB";
			}
			if( $VtExamen>4.99 && $VtExamen<7)
			{
				echo "B";
			}
			if( $VtExamen>0 && $VtExamen<5)
			{
				echo "R";
			}
			if( $VtExamen==0)
			{
				echo "NR";
			}
		}else{

		if( $VtEquiv20>8.99 && $VtEquiv20<11)
		{
			echo "EX";
		}
		if( $VtEquiv20>6.99 && $VtEquiv20<9)
		{
			echo "MB";
		}
		if( $VtEquiv20>4.99 && $VtEquiv20<7)
		{
			echo "B";
		}
		if( $VtEquiv20>0 && $VtEquiv20<5)
		{
			echo "R";
		}
		if( $VtEquiv20==0)
		{
			echo "NR";
		}

	 		//echo number_format($VtEquiv20,2);
		}
	  ?></font></TD>
    <TD align="right" bgcolor="<? echo $VTColor; ?>" ><font color=<?php if ( $VtPromQuim < 7 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
		if( $VtPromQuim>8.99 && $VtPromQuim<11)
		{
			echo "EX";
		}
		if( $VtPromQuim>6.99 && $VtPromQuim<9)
		{
			echo "MB";
		}
		if( $VtPromQuim>4.99 && $VtPromQuim<7)
		{
			echo "B";
		}
		if( $VtPromQuim>0 && $VtPromQuim<5)
		{
			echo "R";
		}
		if( $VtPromQuim==0)
		{
			echo "NR";
		}
		}else{

		if( $VtPromQuim>8.99 && $VtPromQuim<11)
		{
			echo "EX";
		}
		if( $VtPromQuim>6.99 && $VtPromQuim<9)
		{
			echo "MB";
		}
		if( $VtPromQuim>4.99 && $VtPromQuim<7)
		{
			echo "B";
		}
		if( $VtPromQuim>0 && $VtPromQuim<5)
		{
			echo "R";
		}
		if( $VtPromQuim==0)
		{
			echo "NR";
		}

	 		///echo number_format($VtPromQuim,2);
		}
	   ?></font></TD>
	</tr>
    <tr>
<?PHP
		}
///////// SIGUIENTE ESTUDIANTE
?>

  </tr>
<?PHP
	}
?>
</table>
  </fieldset></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
  
  
  <?php
  		break 1;
	case 3:
  //////////////////// COMPORTAMIENTO 
  ?>
  
  
 <TR>
  <TD>&nbsp;</TD>
  </TR>
  <tr>
  <td><fieldset><legend><? echo utf8_encode($VtCurso." ".$VtParalelo." / ".$VtMateria); ?></legend>
  <table width="800" border="1">
  <tr>
    <td width="40"><font size="-1">NO</font></td>
    <td width="250"><font size="-1">APELLIDOS Y NOMBRES</font></td>
<?php
	for ($k=0; $k<$VLnuDatosPr; $k++)
	{
?>
	<td align="center"><font size="-1">
<?PHP 
		$VtParcial=get_result($VLdtDatosPr,$k,"prcdescripcion");
	echo $VtParcial;
?>    
    </font></td>
<?php
	}
?>    
	<td align="center"><font size="-1">PROM. QUIMESTRAL</font>
    
    </td>
  </tr>
<?php  
	if ( $VLnuDatosRp>0 )
	{
////////////// SI EXISTEN ESTUDIANTES DIBUJO LA FILAS ///////
?>
  <tr>
<?PHP		
		
		$j=0;
		$VtMtrnoAnt=get_result($VLdtDatosRp,0,"mt.mtrno");
		for($i=0; $i<$VLnuDatosRp;$i++)
		{	
			$VTQcodigo=get_result($VLdtDatosRp,$i,"qd.dtqmcodigo");
			$VTQEstado=get_result($VLdtDatosRp,$i,"qd.dtqmestado");
			$VtApellidos=get_result($VLdtDatosRp,$i,"e.perapellidos");
			$VtNombres=get_result($VLdtDatosRp,$i,"e.pernombres");
			$VtMtrno=get_result($VLdtDatosRp,$i,"mt.mtrno");
			$j++;
			$VTMtrestado=get_result($VLdtDatosRp,$i,"mt.mtrestado");
			
				switch ($VTQEstado){
				case "1":
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
			$VtEstudiante=$VtApellidos." ".$VtNombres.$VLdtObserv;
			
?>
    <td align="right" bgcolor="<? echo $VTColor; ?>" > <?php //echo $VTdtprcodigo."-".$VTdtprestado; ?> <input type="checkbox" name="txt_Camp12[]" <?php if ($VTQEstado==5 || $VTQEstado==7 || $VTQEstado > 8){ ?> disabled="disabled" <?php } ?> value="<?php echo $VTQcodigo; ?>" <?php if ( $VTQEstado==5 || $VTQEstado==7 || $VTQEstado==9 ) { ?> checked="checked" <?php } ?>  ><input type="hidden" name="txt_dtqmcodigo[]" value="<?php echo $VTQcodigo; ?>"><? echo $j; ?></td>
    <td bgcolor="<? echo $VTColor; ?>" ><font size="-2" color="<?=$VLdtColor; ?>"><? echo utf8_encode($VtEstudiante); ?></font></td>
<?PHP
///////////////IMPRIMIMOS LOS PARCIALES
	for( $m=0; $m<$VLnuDatosPr; $m++)
	{
			$x=$i+$m;
			$VtParcial=get_result($VLdtDatosRp,$x,"pd.dtprpromedio");
?>
	<td align="center" bgcolor="<? echo $VTColor; ?>"  ><font color=<?php if ( $VtParcial < 7 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			switch ($VtParcial) {
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
		}else{

			switch ($VtParcial) {
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

	 		//echo number_format($VtParcial,2); 
		}
	?> </font></td>
<?php
		
		
	}
	$i=$i+$m-1;
///////////IMPRIMIRMOS LOS RESULTADOS QUIMESTRALES
			$x=$i-1;
			$VtPromParc=get_result($VLdtDatosRp,$x,"qd.quipromparcial");
			$VtEquiv80=get_result($VLdtDatosRp,$x,"qd.quiequivalencia80");
			$VtExamen=get_result($VLdtDatosRp,$x,"qd.quiexamen");
			$VtEquiv20=get_result($VLdtDatosRp,$x,"qd.quiequivalencia20");
			$VtPromQuim=get_result($VLdtDatosRp,$x,"qd.quipromquimestre");
?>
    <TD align="center" bgcolor="<? echo $VTColor; ?>" ><font color=<?php if ( $VtPromQuim < 7 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
			switch ($VtPromQuim) {
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
	 		
	   ?></font></TD>
	</tr>
    <tr>
<?PHP
		}
///////// SIGUIENTE ESTUDIANTE
?>

  </tr>
<?PHP
	}
?>
</table>
  </fieldset></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
  

  
  <?php
  		break 1;
	case 4:
  //////////////////// ASISTENCIA
  ?>
  
 <TR>
  <TD>&nbsp;</TD>
  </TR>
  <tr>
  <td><fieldset><legend><? echo utf8_encode($VtCurso." ".$VtParalelo." / ".$VtMateria); ?></legend>
  <table width="800" border="1">
  <tr>
    <td width="40"><font size="-1">NO</font></td>
    <td width="250"><font size="-1">APELLIDOS Y NOMBRES</font></td>
<?php
	for ($k=0; $k<$VLnuDatosPr; $k++)
	{
?>
<?PHP 
		$VtParcial=get_result($VLdtDatosPr,$k,"prcdescripcion");
	//echo $VtParcial;
?>    
<?php
	}
?>    
	<td align="center"><font size="-1">FALTA JUSTIFICADAS</font>
    
    </td>
	<td align="center">&nbsp;</td>
	<td align="center"><font size="-1">FALTAS INJUSTIFICADAS</font>
    
    </td>
	<td align="center">&nbsp;</td>
	<td align="center"><font size="-1">ATRASOS</font></td>
  </tr>
<?php  
	if ( $VLnuDatosRp>0 )
	{
////////////// SI EXISTEN ESTUDIANTES DIBUJO LA FILAS ///////
?>
  <tr>
<?PHP		
		
		$j=0;
		$VtMtrnoAnt=get_result($VLdtDatosRp,0,"mt.mtrno");
		for($i=0; $i<$VLnuDatosRp;$i++)
		{	
			$VTQcodigo=get_result($VLdtDatosRp,$i,"qd.dtqmcodigo");
			$VTQEstado=get_result($VLdtDatosRp,$i,"qd.dtqmestado");
			$VtApellidos=get_result($VLdtDatosRp,$i,"e.perapellidos");
			$VtNombres=get_result($VLdtDatosRp,$i,"e.pernombres");
			$VtMtrno=get_result($VLdtDatosRp,$i,"mt.mtrno");
			$j++;
			$VTMtrestado=get_result($VLdtDatosRp,$i,"mt.mtrestado");
			
				switch ($VTQEstado){
				case "1":
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
			$VtEstudiante=$VtApellidos." ".$VtNombres.$VLdtObserv;
			
?>
    <td align="right" bgcolor="<? echo $VTColor; ?>" > <?php //echo $VTdtprcodigo."-".$VTdtprestado; ?> <input type="checkbox" name="txt_Camp12[]" <?php if ($VTQEstado==5 || $VTQEstado==7 || $VTQEstado > 8){ ?> disabled="disabled" <?php } ?> value="<?php echo $VTQcodigo; ?>" <?php if ( $VTQEstado==5 || $VTQEstado==7 || $VTQEstado==9 ) { ?> checked="checked" <?php } ?>  ><input type="hidden" name="txt_dtqmcodigo[]" value="<?php echo $VTQcodigo; ?>"><? echo $j; ?></td>
    <td bgcolor="<? echo $VTColor; ?>" ><font size="-2" color="<?=$VLdtColor; ?>"><? echo utf8_encode($VtEstudiante); ?></font></td>
<?PHP
///////////////IMPRIMIMOS LOS PARCIALES
	for( $m=0; $m<$VLnuDatosPr; $m++)
	{
			$x=$i+$m;
			$VtParcial=get_result($VLdtDatosRp,$x,"pd.dtprpromedio");
	}
	$i=$i+$m-1;
///////////IMPRIMIRMOS LOS RESULTADOS QUIMESTRALES
			$x=$i-1;
			$VtPromParc=get_result($VLdtDatosRp,$x,"qd.quipromparcial");
			$VtEquiv80=get_result($VLdtDatosRp,$x,"qd.quiequivalencia80");
			$VtExamen=get_result($VLdtDatosRp,$x,"qd.quiexamen");
			$VtEquiv20=get_result($VLdtDatosRp,$x,"qd.quiequivalencia20");
			$VtPromQuim=get_result($VLdtDatosRp,$x,"qd.quipromquimestre");
?>
    <TD align="center" bgcolor="<? echo $VTColor; ?>" > <?PHP 
	 		echo $VtPromParc; 
	 ?></TD>
    <TD align="right" bgcolor="<? echo $VTColor; ?>" >&nbsp;</TD>
    <TD align="center" bgcolor="<? echo $VTColor; ?>" > <?PHP 
	 		echo $VtExamen;
	 ?></TD>
    <TD align="right" bgcolor="<? echo $VTColor; ?>" >&nbsp;</TD>
    <TD align="right" bgcolor="<? echo $VTColor; ?>" > <?PHP 
	 		echo $VtEquiv20;
	 ?></TD>
	</tr>
    <tr>
<?PHP
		}
///////// SIGUIENTE ESTUDIANTE
?>

  </tr>
<?PHP
	}
?>
</table>
  </fieldset></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
    
  
  
  <?php
  		break 1;
}
} else {
	///////////////// PARA EL REPORTE ANUAL
switch ($VtMateriaTipo) {
case "1":
 /////////  CUANTITATIVAS //////////////////////////////// 
?>  
  <TR>
  <TD>&nbsp;</TD>
  </TR>
  <tr>
  <td><fieldset><legend><? echo utf8_encode($VtCurso." ".$VtParalelo." / ".$VtMateria); ?></legend>
  <table width="800" border="1">
  <tr>
    <td width="10"><font size="-1">NO</font></td>
    <td width="250"><font size="-1">APELLIDOS Y NOMBRES</font></td>
	<td align="center"><font size="-1">PROM. QUIM</font></td>
	<td align="center"><font size="-1">SUPLETORIO</font></td>
	<td align="center"><font size="-1">REMEDIAL</font></td>
	<td align="center"><font size="-1">GRACIA</font></td>
	<td align="center"><font size="-1">PROM. ANUAL</font>
    
    </td>
  </tr>
<?php  
	if ( $VLnuDatosRp>0 )
	{
////////////// SI EXISTEN ESTUDIANTES DIBUJO LA FILAS ///////
?>
  <tr>
<?PHP		
		
		$j=0;
		$VtMtrnoAnt=get_result($VLdtDatosRp,0,"mt.mtrno");
		for($i=0; $i<$VLnuDatosRp;$i++)
		{	
			$VTQcodigo=get_result($VLdtDatosRp,$i,"qd.dtqmcodigo");
			$VTQEstado=get_result($VLdtDatosRp,$i,"qd.dtqmestado");
			$VtApellidos=get_result($VLdtDatosRp,$i,"e.perapellidos");
			$VtNombres=get_result($VLdtDatosRp,$i,"e.pernombres");
			$VtMtrno=get_result($VLdtDatosRp,$i,"mt.mtrno");
			$j++;
			$VTMtrestado=get_result($VLdtDatosRp,$i,"mt.mtrestado");
			
				switch ($VTQEstado){
				case "1":
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
			$VtEstudiante=$VtApellidos." ".$VtNombres.$VLdtObserv;
			
?>
    <td align="right" bgcolor="<? echo $VTColor; ?>" > <?php //echo $VTdtprcodigo."-".$VTdtprestado; ?> <input type="checkbox" name="txt_Camp12[]" <?php if ($VTQEstado==5 || $VTQEstado==7 || $VTQEstado > 8){ ?> disabled="disabled" <?php } ?> value="<?php echo $VTQcodigo; ?>" <?php if ( $VTQEstado==5 || $VTQEstado==7 || $VTQEstado==9 ) { ?> checked="checked" <?php } ?>  ><input type="hidden" name="txt_dtqmcodigo[]" value="<?php echo $VTQcodigo; ?>"><? echo $j; ?></td>
    <td bgcolor="<? echo $VTColor; ?>" ><font size="-2" color="<?=$VLdtColor; ?>"><? echo utf8_encode($VtEstudiante); ?></font></td>
<?php
	//$i=$i+$m-1;
///////////IMPRIMIRMOS LOS RESULTADOS QUIMESTRALES
			$x=$i;
			$VtPromParc=get_result($VLdtDatosRp,$x,"qd.quipromparcial");
			$VtEquiv80=get_result($VLdtDatosRp,$x,"qd.quiequivalencia80");
			$VtExamen=get_result($VLdtDatosRp,$x,"qd.quiexamen");
			$VtEquiv20=get_result($VLdtDatosRp,$x,"qd.quiequivalencia20");
			$VtPromQuim=get_result($VLdtDatosRp,$x,"qd.quipromquimestre");
?>
    <TD align="right"><font color=<?php if ( $VtPromParc < 7 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			switch ($VtPromParc) {
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

	 		echo number_format($VtPromParc,2); 
		}
	 ?></font></TD>
    <TD align="right"> <?PHP 
		if ($VtFamilia<4)
		{
			switch ($VtEquiv80) {
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

	 		echo number_format($VtEquiv80,2);  
		}
	?></TD>
    <TD align="right"><font color=<?php if ( $VtExamen < 7 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			switch ($VtExamen) {
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

	 		 echo number_format($VtExamen,2);
		}
	 ?></font></TD>
    <TD align="right"><font color=<?php if ( $VtExamen < 7 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			switch ($VtEquiv20) {
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

	 		echo number_format($VtEquiv20,2);
		}
	  ?></font></TD>
    <TD align="right"><font color=<?php if ( $VtPromQuim < 7 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			switch ($VtPromQuim) {
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

	 		echo number_format($VtPromQuim,2);
		}
	   ?></font></TD>
	</tr>
    <tr>
<?PHP
		}
///////// SIGUIENTE ESTUDIANTE
?>

  </tr>
<?PHP
	}
?>
</table>
  </fieldset></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
  
  <?php
  		break 1;
	case 2:
/////////// CUALITATIVAS /////////////////////////////////
  ?>
  
 <TR>
  <TD>&nbsp;</TD>
  </TR>
  <tr>
  <td><fieldset><legend><? echo utf8_encode($VtCurso." ".$VtParalelo." / ".$VtMateria); ?></legend>
  <table width="800" border="1">
  <tr>
    <td width="10"><font size="-1">NO</font></td>
    <td width="250"><font size="-1">APELLIDOS Y NOMBRES</font></td>
	<td align="center"><font size="-1">PROM. QUIM</font></td>
	<td align="center"><font size="-1">SUPLETORIO</font></td>
	<td align="center"><font size="-1">REMEDIAL</font></td>
	<td align="center"><font size="-1">GRACIA</font></td>
	<td align="center"><font size="-1">PROM. ANUAL</font></td>
  </tr>
<?php  
	if ( $VLnuDatosRp>0 )
	{
////////////// SI EXISTEN ESTUDIANTES DIBUJO LA FILAS ///////
?>
  <tr>
<?PHP		
		
		$j=0;
		$VtMtrnoAnt=get_result($VLdtDatosRp,0,"mt.mtrno");
		for($i=0; $i<$VLnuDatosRp;$i++)
		{	
			$VtApellidos=get_result($VLdtDatosRp,$i,"e.perapellidos");
			$VtNombres=get_result($VLdtDatosRp,$i,"e.pernombres");
			$VtMtrno=get_result($VLdtDatosRp,$i,"mt.mtrno");
			$j++;
			$VTMtrestado=get_result($VLdtDatosRp,$i,"mt.mtrestado");
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
			$VtEstudiante=$VtApellidos." ".$VtNombres.$VLdtObserv;
			
?>
    <td align="right"><? echo $j; ?></td>
    <td><font size="-2" color="<?=$VLdtColor; ?>"><? echo utf8_encode($VtEstudiante); ?></font></td>

<?php
	//$i=$i+$m-1;
///////////IMPRIMIRMOS LOS RESULTADOS QUIMESTRALES
			$x=$i;
			$VtPromParc=get_result($VLdtDatosRp,$x,"qd.quipromparcial");
			$VtEquiv80=get_result($VLdtDatosRp,$x,"qd.quiequivalencia80");
			$VtExamen=get_result($VLdtDatosRp,$x,"qd.quiexamen");
			$VtEquiv20=get_result($VLdtDatosRp,$x,"qd.quiequivalencia20");
			$VtPromQuim=get_result($VLdtDatosRp,$x,"qd.quipromquimestre");
?>
    <TD align="right"><font color=<?php if ( $VtPromParc < 7 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			if( $VtPromParc>8.99 && $VtPromParc<11)
			{
				echo "EX";
			}
			if( $VtPromParc>6.99 && $VtPromParc<9)
			{
				echo "MB";
			}
			if( $VtPromParc>4.99 && $VtPromParc<7)
			{
				echo "B";
			}
			if( $VtPromParc>0 && $VtPromParc<5)
			{
				echo "R";
			}
			if( $VtPromParc==0)
			{
				echo "NR";
			}
		}else{

		if( $VtPromParc>8.99 && $VtPromParc<11)
		{
			echo "EX";
		}
		if( $VtPromParc>6.99 && $VtPromParc<9)
		{
			echo "MB";
		}
		if( $VtPromParc>4.99 && $VtPromParc<7)
		{
			echo "B";
		}
		if( $VtPromParc>0 && $VtPromParc<5)
		{
			echo "R";
		}
		if( $VtPromParc==0)
		{
			echo "NR";
		}


	 		//echo number_format($VtPromParc,2); 
		}
	 ?></font></TD>
    <TD align="right"> <?PHP 
		if ($VtFamilia<4)
		{
			if( $VtParcial>8.99 && $VtParcial<11)
			{
				echo "EX";
			}
			if( $VtParcial>6.99 && $VtParcial<9)
			{
				echo "MB";
			}
			if( $VtParcial>4.99 && $VtParcial<7)
			{
				echo "B";
			}
			if( $VtParcial>0 && $VtParcial<5)
			{
				echo "R";
			}
			if( $VtParcial==0)
			{
				echo "NR";
			}
		}else{

		if( $VtEquiv80>8.99 && $VtEquiv80<11)
		{
			echo "EX";
		}
		if( $VtEquiv80>6.99 && $VtEquiv80<9)
		{
			echo "MB";
		}
		if( $VtEquiv80>4.99 && $VtEquiv80<7)
		{
			echo "B";
		}
		if( $VtEquiv80>0 && $VtEquiv80<5)
		{
			echo "R";
		}
		if( $VtEquiv80==0)
		{
			echo "NR";
		}

	 		///echo number_format($VtEquiv80,2);  
		}
	?></TD>
    <TD align="right"><font color=<?php if ( $VtExamen < 7 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			if( $VtExamen>8.99 && $VtExamen<11)
			{
				echo "EX";
			}
			if( $VtExamen>6.99 && $VtExamen<9)
			{
				echo "MB";
			}
			if( $VtExamen>4.99 && $VtExamen<7)
			{
				echo "B";
			}
			if( $VtExamen>0 && $VtExamen<5)
			{
				echo "R";
			}
			if( $VtExamen==0)
			{
				echo "NR";
			}
		}else{

			if( $VtExamen>8.99 && $VtExamen<11)
			{
				echo "EX";
			}
			if( $VtExamen>6.99 && $VtExamen<9)
			{
				echo "MB";
			}
			if( $VtExamen>4.99 && $VtExamen<7)
			{
				echo "B";
			}
			if( $VtExamen>0 && $VtExamen<5)
			{
				echo "R";
			}
			if( $VtExamen==0)
			{
				echo "NR";
			}

	 		// echo number_format($VtExamen,2);
		}
	 ?></font></TD>
    <TD align="right"><font color=<?php if ( $VtExamen < 7 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
			if( $VtExamen>8.99 && $VtExamen<11)
			{
				echo "EX";
			}
			if( $VtExamen>6.99 && $VtExamen<9)
			{
				echo "MB";
			}
			if( $VtExamen>4.99 && $VtExamen<7)
			{
				echo "B";
			}
			if( $VtExamen>0 && $VtExamen<5)
			{
				echo "R";
			}
			if( $VtExamen==0)
			{
				echo "NR";
			}
		}else{

		if( $VtEquiv20>8.99 && $VtEquiv20<11)
		{
			echo "EX";
		}
		if( $VtEquiv20>6.99 && $VtEquiv20<9)
		{
			echo "MB";
		}
		if( $VtEquiv20>4.99 && $VtEquiv20<7)
		{
			echo "B";
		}
		if( $VtEquiv20>0 && $VtEquiv20<5)
		{
			echo "R";
		}
		if( $VtEquiv20==0)
		{
			echo "NR";
		}

	 		//echo number_format($VtEquiv20,2);
		}
	  ?></font></TD>
    <TD align="right"><font color=<?php if ( $VtPromQuim < 7 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
		if ($VtFamilia<4)
		{
		if( $VtPromQuim>8.99 && $VtPromQuim<11)
		{
			echo "EX";
		}
		if( $VtPromQuim>6.99 && $VtPromQuim<9)
		{
			echo "MB";
		}
		if( $VtPromQuim>4.99 && $VtPromQuim<7)
		{
			echo "B";
		}
		if( $VtPromQuim>0 && $VtPromQuim<5)
		{
			echo "R";
		}
		if( $VtPromQuim==0)
		{
			echo "NR";
		}
		}else{

		if( $VtPromQuim>8.99 && $VtPromQuim<11)
		{
			echo "EX";
		}
		if( $VtPromQuim>6.99 && $VtPromQuim<9)
		{
			echo "MB";
		}
		if( $VtPromQuim>4.99 && $VtPromQuim<7)
		{
			echo "B";
		}
		if( $VtPromQuim>0 && $VtPromQuim<5)
		{
			echo "R";
		}
		if( $VtPromQuim==0)
		{
			echo "NR";
		}

	 		///echo number_format($VtPromQuim,2);
		}
	   ?></font></TD>
	</tr>
    <tr>
<?PHP
		}
///////// SIGUIENTE ESTUDIANTE
?>

  </tr>
<?PHP
	}
?>
</table>
  </fieldset></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
  
  
  <?php
  		break 1;
	case 3:
  //////////////////// COMPORTAMIENTO 
  ?>
  
  
 <TR>
  <TD>&nbsp;</TD>
  </TR>
  <tr>
  <td><fieldset><legend><? echo utf8_encode($VtCurso." ".$VtParalelo." / ".$VtMateria); ?></legend>
  <table width="800" border="1">
  <tr>
    <td width="10"><font size="-1">NO</font></td>
    <td width="250"><font size="-1">APELLIDOS Y NOMBRES</font></td>
	<td align="center"><font size="-1">PROM. ANUAL</font></td>
  </tr>
<?php  
	if ( $VLnuDatosRp>0 )
	{
////////////// SI EXISTEN ESTUDIANTES DIBUJO LA FILAS ///////
?>
  <tr>
<?PHP		
		
		$j=0;
		$VtMtrnoAnt=get_result($VLdtDatosRp,0,"mt.mtrno");
		for($i=0; $i<$VLnuDatosRp;$i++)
		{	
			$VTQcodigo=get_result($VLdtDatosRp,$i,"qd.dtqmcodigo");
			$VTQEstado=get_result($VLdtDatosRp,$i,"qd.dtqmestado");
			$VtApellidos=get_result($VLdtDatosRp,$i,"e.perapellidos");
			$VtNombres=get_result($VLdtDatosRp,$i,"e.pernombres");
			$VtMtrno=get_result($VLdtDatosRp,$i,"mt.mtrno");
			$j++;
			$VTMtrestado=get_result($VLdtDatosRp,$i,"mt.mtrestado");
			
				switch ($VTQEstado){
				case "1":
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
			$VtEstudiante=$VtApellidos." ".$VtNombres.$VLdtObserv;
			
?>
    <td align="right" bgcolor="<? echo $VTColor; ?>" > <?php //echo $VTdtprcodigo."-".$VTdtprestado; ?> <input type="checkbox" name="txt_Camp12[]" <?php if ($VTQEstado==5 || $VTQEstado==7 || $VTQEstado > 8){ ?> disabled="disabled" <?php } ?> value="<?php echo $VTQcodigo; ?>" <?php if ( $VTQEstado==5 || $VTQEstado==7 || $VTQEstado==9 ) { ?> checked="checked" <?php } ?>  ><input type="hidden" name="txt_dtqmcodigo[]" value="<?php echo $VTQcodigo; ?>"><? echo $j; ?></td>
    <td bgcolor="<? echo $VTColor; ?>" ><font size="-2" color="<?=$VLdtColor; ?>"><? echo utf8_encode($VtEstudiante); ?></font></td>
<?php
		
///////////IMPRIMIRMOS LOS RESULTADOS QUIMESTRALES
			$x=$i;
			$VtPromParc=get_result($VLdtDatosRp,$x,"qd.quipromparcial");
			$VtEquiv80=get_result($VLdtDatosRp,$x,"qd.quiequivalencia80");
			$VtExamen=get_result($VLdtDatosRp,$x,"qd.quiexamen");
			$VtEquiv20=get_result($VLdtDatosRp,$x,"qd.quiequivalencia20");
			$VtPromQuim=get_result($VLdtDatosRp,$x,"qd.quipromquimestre");
?>
    <TD align="center" bgcolor="<? echo $VTColor; ?>" ><font color=<?php if ( $VtPromQuim < 7 ){ ?>"#FF0000" <?php } else{ ?>"#000000" <?php }?> > <?PHP 
			switch ($VtPromQuim) {
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
	 		
	   ?></font></TD>
	</tr>
    <tr>
<?PHP
		}
///////// SIGUIENTE ESTUDIANTE
?>

  </tr>
<?PHP
	}
?>
</table>
  </fieldset></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
  

  
  <?php
  		break 1;
	case 4:
  //////////////////// ASISTENCIA
  ?>
  
 <TR>
  <TD>&nbsp;</TD>
  </TR>
  <tr>
  <td><fieldset><legend><? echo utf8_encode($VtCurso." ".$VtParalelo." / ".$VtMateria); ?></legend>
  <table width="800" border="1">
  <tr>
    <td width="30"><font size="-1">NO</font></td>
    <td width="230"><font size="-1">APELLIDOS Y NOMBRES</font></td>
<?php
	for ($k=0; $k<$VLnuDatosPr; $k++)
	{
?>
<?PHP 
		$VtParcial=get_result($VLdtDatosPr,$k,"prcdescripcion");
	//echo $VtParcial;
?>    
<?php
	}
?>    
	<td align="center"><font size="-1">FALTA JUSTIFICADAS</font>
    
    </td>
	<td align="center">&nbsp;</td>
	<td align="center"><font size="-1">FALTAS INJUSTIFICADAS</font>
    
    </td>
	<td align="center">&nbsp;</td>
	<td align="center"><font size="-1">ATRASOS</font></td>
  </tr>
<?php  
	if ( $VLnuDatosRp>0 )
	{
////////////// SI EXISTEN ESTUDIANTES DIBUJO LA FILAS ///////
?>
  <tr>
<?PHP		
		
		$j=0;
		$VtMtrnoAnt=get_result($VLdtDatosRp,0,"mt.mtrno");
		for($i=0; $i<$VLnuDatosRp;$i++)
		{	
			$VTQcodigo=get_result($VLdtDatosRp,$i,"qd.dtqmcodigo");
			$VTQEstado=get_result($VLdtDatosRp,$i,"qd.dtqmestado");
			$VtApellidos=get_result($VLdtDatosRp,$i,"e.perapellidos");
			$VtNombres=get_result($VLdtDatosRp,$i,"e.pernombres");
			$VtMtrno=get_result($VLdtDatosRp,$i,"mt.mtrno");
			$j++;
			$VTMtrestado=get_result($VLdtDatosRp,$i,"mt.mtrestado");
			
				switch ($VTQEstado){
				case "1":
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
			$VtEstudiante=$VtApellidos." ".$VtNombres.$VLdtObserv;
			
?>
    <td align="right" bgcolor="<? echo $VTColor; ?>" > <?php //echo $VTdtprcodigo."-".$VTdtprestado; ?> <input type="checkbox" name="txt_Camp12[]" <?php if ($VTQEstado==5 || $VTQEstado==7 || $VTQEstado > 8){ ?> disabled="disabled" <?php } ?> value="<?php echo $VTQcodigo; ?>" <?php if ( $VTQEstado==5 || $VTQEstado==7 || $VTQEstado==9 ) { ?> checked="checked" <?php } ?>  ><input type="hidden" name="txt_dtqmcodigo[]" value="<?php echo $VTQcodigo; ?>"><? echo $j; ?></td>
    <td bgcolor="<? echo $VTColor; ?>" ><font size="-2" color="<?=$VLdtColor; ?>"><? echo utf8_encode($VtEstudiante); ?></font></td>
<?PHP
///////////IMPRIMIRMOS LOS RESULTADOS QUIMESTRALES
			$x=$i;
			$VtPromParc=get_result($VLdtDatosRp,$x,"qd.quipromparcial");
			$VtEquiv80=get_result($VLdtDatosRp,$x,"qd.quiequivalencia80");
			$VtExamen=get_result($VLdtDatosRp,$x,"qd.quiexamen");
			$VtEquiv20=get_result($VLdtDatosRp,$x,"qd.quiequivalencia20");
			$VtPromQuim=get_result($VLdtDatosRp,$x,"qd.quipromquimestre");
?>
    <TD align="center" bgcolor="<? echo $VTColor; ?>" > <?PHP 
	 		echo $VtPromParc; 
	 ?></TD>
    <TD align="right" bgcolor="<? echo $VTColor; ?>" >&nbsp;</TD>
    <TD align="center" bgcolor="<? echo $VTColor; ?>" > <?PHP 
	 		echo $VtExamen;
	 ?></TD>
    <TD align="right" bgcolor="<? echo $VTColor; ?>" >&nbsp;</TD>
    <TD align="right" bgcolor="<? echo $VTColor; ?>" > <?PHP 
	 		echo $VtEquiv20;
	 ?></TD>
	</tr>
    <tr>
<?PHP
		}
///////// SIGUIENTE ESTUDIANTE
?>

  </tr>
<?PHP
	}
?>
</table>
  </fieldset></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
    
  
  
  <?php
  		break 1;
}	
?>

<?	
	
}
  ?>
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
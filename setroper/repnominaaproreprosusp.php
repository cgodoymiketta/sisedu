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
$VLdtHcodigo=$_GET[hcodigo];
$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$VLQryQui="Select q.quicodigo, q.quidescripcion, q.quiorden 
from qmstr q, spcldd e 
where q.inscodigo=".$VLInstitucion." and q.anocodigo=".$VLAnoLocal." 
and e.espcodigo=".$VLdtCamp1." and e.espseccion=q.quiseccion 
and e.inscodigo=1 and e.espestado=1
and not q.quitipo=1 order by q.quiorden"; //// consultamos los quimestres que no son fin de ano

$VTQryEsp="Select * from spcldd where espcodigo=".$VLdtCamp1;
$VTQryCur="Select * from crs where curcodigo=".$VLdtCamp9;
$VTQryPar="Select * from prll where parcodigo=".$VLdtCamp8;
$VTQryMat="SELECT m.matdescripcion , m.mattipo, m.matnoconsecutivo, m.famcodigo
FROM mtr m, `grpmtr` gm, grp g 
WHERE 
g.curcodigo=".$VLdtCamp9."
and g.espcodigo=".$VLdtCamp1."
and g.anocodigo=".$VLAnoLocal."
and g.grucodigo=gm.grucodigo
and gm.gmestado>0
and gm.matcodigo=m.matcodigo
and not (m.mattipo=4 or m.mattipo=5)
order by m.mattipo, m.matnoconsecutivo, m.matdescripcion ";

$VTQryEst="Select p.perapellidos, p.pernombres, m.mtrno, m.mtrestado, ie.inescodigo
from psn p, nsttcnstdnt ie, mtrcl m, grp g
where p.percodigo=ie.percodigo
and ie.inscodigo=".$VLInstitucion."
and g.anocodigo=".$VLAnoLocal."
and g.curcodigo=".$VLdtCamp9."
and g.espcodigo=".$VLdtCamp1."
and ie.inescodigo=m.inescodigo
and m.anocodigo=".$VLAnoLocal."
and m.parcodigo=".$VLdtCamp8."
and m.grucodigo=g.grucodigo 
order by p.perapellidos, p.pernombres, m.mtrno, ie.inescodigo";

$Query = "Select * from nlctv where anocodigo= ".$VLAnoLocal;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if ( $VLnuDatos>0 )
{
	$VLdtPeriodo=get_result($VLdtDatos,0,"anodescripcion");
}
$VLdtDatosEsp = execute_query($VTQryEsp,$VLConexion);
$VLnuDatosEsp = total_records($VLdtDatosEsp);
if ( $VLnuDatosEsp>0 )
{
	$VLdtEspecialidad=get_result($VLdtDatosEsp,0,"espdescripcion");
	$VLdtSeccion=get_result($VLdtDatosEsp,0,"espseccion");
}
$VLdtDatosCur = execute_query($VTQryCur,$VLConexion);
$VLnuDatosCur = total_records($VLdtDatosCur);
if ( $VLnuDatosCur>0 )
{
	$VLdtCurso=get_result($VLdtDatosCur,0,"curdescripcion");
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


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NOMINA DE ALUMNOS APRO-SUSP-REPRO <? echo ($VLdtSeccion." ".$VLdtEspecialidad." ".$VLdtCurso." ".$VLdtParalelo); ?></title>
</head>

<body>

<table width="900" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><img src="../imagenes/membrete2.png" width="779" height="142" /></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center"><font face="Arial Narrow, Arial" size="+2"> <B> NOMINA DE ESTUDIANTES APROBADOS - SUSPENSOS - REPROBADOS</B></font></td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td width="150"><font face="Arial Narrow, Arial" ><b>UBICACIÓN:</b></font></td>
            <td width="220"><font face="Arial Narrow, Arial" ><b>PROVINCIA:</b> ESMERALDAS</font></td>
            <td width="220"><font face="Arial Narrow, Arial" ><b>CANTÓN:</b> ESMERALDAS</font></td>
            <td ><font face="Arial Narrow, Arial" ><b>PARROQUIA:</b> ESMERALDAS</font></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td width="300"><font face="Arial Narrow, Arial" ><b>JORNADA</b></font><font face="Arial Narrow, Arial" >: <? echo $VLdtSeccion; ?></font></td>
            <td width="300"><font face="Arial Narrow, Arial" ><b>CÓDIGO AMIE:</b>08H00148</font></td>
            <td><font face="Arial Narrow, Arial" ><b>CIRCUITO: </b>1</font></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td width="300"><font face="Arial Narrow, Arial" ><b>PERIODO LECTIVO: </b><? echo $VLdtPeriodo; ?></font></td>
            <td width="300"><font face="Arial Narrow, Arial" ><b>SECCIÓN: </b><? echo ($VLdtEspecialidad); ?></font></td>
            <td><font face="Arial Narrow, Arial" ><b>AÑO: </b><? echo ($VLdtCurso); ?>  <? echo $VLdtParalelo; ?></font></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="1">
      <tr>
        <td width="13" height="113" align="center"><font face="Arial Narrow, Arial" size="-1">No</font></td>
        <td width="100" align="center"><font face="Arial Narrow, Arial" size="-1">APELLIDOS Y NOMBRES</font></td>
<?php        
	if ( $VLnuDatosMat>0 )
{
	for ( $l=0; $l<$VLnuDatosMat; $l++)
	{
		$VLdtMateria=get_result($VLdtDatosMat,$l,"m.matdescripcion");
		$VldtMatTipo=get_result($VLdtDatosMat,$l,"m.mattipo");
		
?>        
        <td ><font face="Arial Narrow, Arial" size="-2"><?php echo ($VLdtMateria); ?>&nbsp;</font></td>
<?php
	}
}
?>
        <td width="100"><font face="Arial Narrow, Arial" size="-1">PGA</font></td>
        <td width="100"><font face="Arial Narrow, Arial" size="-1">OBSERVACIONES</font></td>
      </tr>
      
<?php 
//////////////////////// MOSTRAMOS EL LISTADO DE ESTUDIANTES
$VLdtDatosEst = execute_query($VTQryEst,$VLConexion);
$VLnuDatosEst = total_records($VLdtDatosEst);
if ( $VLnuDatosEst>0 )
{
	$j=0;
	for($i=0; $i<$VLnuDatosEst; $i++)
	{
		$j++;
		$VLdtApellido=get_result($VLdtDatosEst,$i,"p.perapellidos");
		$VLdtNombre=get_result($VLdtDatosEst,$i,"p.pernombres");
		$VLdtNoMatricula=get_result($VLdtDatosEst,$i,"m.mtrno");
		$VLdtMatEstado=get_result($VLdtDatosEst,$i,"m.mtrestado");
		
		$VTdtQui1=get_result($VLdtDatosQui,0,"quicodigo");
		$VTdtQui2=get_result($VLdtDatosQui,1,"quicodigo");
		
		///// consultamos sus calificaciones
		$VTQryQui1="Select m.matnoconsecutivo,m.matdescripcion, m.mattipo, m.famcodigo, q.mtrno, q.quipromparcial, q.quiequivalencia80, q.quiexamen, q.quiequivalencia20, q.quipromquimestre
from mtr m, qmstrdtll q
where q.mtrno=".$VLdtNoMatricula." 
and q.quicodigo=".$VTdtQui1." 
and q.matcodigo=m.matcodigo
and m.matestado=1
and not ( m.mattipo=4 or m.mattipo=5)
order by q.mtrno, m.mattipo, m.matnoconsecutivo";

		$VLdtDatosQui1 = execute_query($VTQryQui1,$VLConexion);
		$VLnuDatosQui1 = total_records($VLdtDatosQui1);

		$VTQryQui2="Select m.matnoconsecutivo,m.matdescripcion, m.mattipo, m.famcodigo, q.mtrno, q.quipromparcial, q.quiequivalencia80, q.quiexamen, q.quiequivalencia20, q.quipromquimestre
from mtr m, qmstrdtll q, mtrcl mt, grpmtr gm
where q.mtrno=".$VLdtNoMatricula." 
and q.quicodigo=".$VTdtQui2." 
and q.matcodigo=m.matcodigo
and m.matestado=1
and not ( m.mattipo=4 or m.mattipo=5)
and q.mtrno=mt.mtrno 
and mt.grucodigo=gm.grucodigo
and gm.gmestado>0
and gm.matcodigo=q.matcodigo
order by q.mtrno, m.mattipo, m.matnoconsecutivo";

		$VLdtDatosQui2 = execute_query($VTQryQui2,$VLConexion);
		$VLnuDatosQui2 = total_records($VLdtDatosQui2);
		
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

		$VLdtDatosQuiA = execute_query($VTQryQuiA,$VLConexion);
		$VLnuDatosQuiA = total_records($VLdtDatosQuiA);
			
			
			
/////////////////////// INICIO DEL ESTUDIANTE
?>      
      <tr>
        <td width="13" align="center" valign="middle"><font face="Arial Narrow, Arial" size="-1"><?php echo $i+1; ?></font></td>
        <td align="center" valign="middle"><font face="Arial Narrow, Arial" size="-1"><?php echo ($VLdtApellido." ".$VLdtNombre); ?></font></td>
<?php
//////////////  recuperacion de las materias
	$VLMensaje="APROBADO";
	$VTPromedioGA=0;
	$VTContGA=0;
	for ( $k=0; $k<$VLnuDatosMat; $k++)
{        
//////////// ANUAL
		$VTdtQuiA=get_result($VLdtDatosQuiA,$k,"quipromquimestre");
		$VTdtMatTipo=get_result($VLdtDatosMat,$k,"mattipo");
		$VLMatfamilia=get_result($VLdtDatosMat,$k,"famcodigo");
?>        
        <td align="right"><font face="Arial Narrow, Arial" size="+1" <?php if ($VTdtQuiA<7){ ?> color="#FF0000" <?php } else { ?> color="#000000" <?php } ?>  ><b><?php switch ($VTdtMatTipo)
	{
		case "1":
					if($VLMatfamilia<4)
			{
				switch ($VTdtQuiA) {
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
				if ($VTdtQuiA<7)
				{	
					if ($VLMensaje=="REMEDIAL")
					{$VLMensaje="REMEDIAL"; }else{
					$VLMensaje="SUSPENSO";
					}
					if ($VTdtQuiA<5) { $VLMensaje="REMEDIAL"; }
				}
		 		echo number_format($VTdtQuiA,2); 
				$VTPromedioGA+=$VTdtQuiA;
				$VTContGA++;
			}
		break 1;
		case "2":
		if( $VTdtQuiA>8.99 && $VTdtQuiA<11)
		{
			echo "EX";
		}
		if( $VTdtQuiA>6.99 && $VTdtQuiA<9)
		{
			echo "MB";
		}
		if( $VTdtQuiA>4.99 && $VTdtQuiA<7)
		{
			echo "B";
		}
		if( $VTdtQuiA>0 && $VTdtQuiA<5)
		{
			echo "R";
		}
		if( $VTdtQuiA==0)
		{
			echo "NR";
		}			
		break 1;
		case "3":
			switch ($VTdtQuiA) {
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
?>			
		</b></font></td>
        <td><fontface="Arial Narrow, Arial" size="+1" <?php if (($VTPromedioGA/$VTContGA)<7){ ?> color="#FF0000" <?php } else { ?> color="#000000" <?php } ?> ><b>	
<?php
		echo number_format($VTPromedioGA/$VTContGA,2); 
		break 1;
	}
	?></b></font></td>
    
<?php
 }       

//////////// fin de recuperacion de materias
?>     
		<td> <?php echo $VLMensaje; ?> </td>    
      </tr>
     
<?php
	}
}

///////////////////// fin de un estudiante
?>      
      
    </table></td>
  </tr>
  <tr>
  	<td>
    	<table>
        
        
        </table>
    </td>
  </tr>
</table>


</body>
</html>
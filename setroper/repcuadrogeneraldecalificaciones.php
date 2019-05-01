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
<title>CUADRO GENERAL DE CALIFICACIONES</title>
</head>

<body>

<table width="900" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><img src="../imagenes/membrete2.png" width="779" height="142" /></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center"><font face="Arial Narrow, Arial" size="+2"> <B> CUADRO GENERAL DE CALIFICACIONES</B></font></td>
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
        <td width="65"><font face="Arial Narrow, Arial" size="-1">QUIMESTRE</font></td>
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
        <td width="100" align="center"><font face="Arial Narrow, Arial" size="-1">P.Q.</font></td>
        <td width="100"><font face="Arial Narrow, Arial" size="-1">OBSERVACIONES</font></td>
      </tr>
      
<?php 
//////////////////////// MOSTRAMOS EL LISTADO DE ESTUDIANTES
$VLdtDatosEst = execute_query($VTQryEst,$VLConexion);
$VLnuDatosEst = total_records($VLdtDatosEst);
if ( $VLnuDatosEst>0 )
{
	$j=0;
///////// RECUPERAMOS LOS ESTUDIANTES	
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
		//QUIMESTRE I
		$VTQryQui1="Select m.matnoconsecutivo,m.matdescripcion, m.mattipo, m.famcodigo, q.mtrno, q.quipromparcial, q.quiequivalencia80, q.quiexamen, q.quiequivalencia20, q.quipromquimestre
from mtr m, qmstrdtll q, mtrcl mt, grpmtr gm
where q.mtrno=".$VLdtNoMatricula." 
and q.quicodigo=".$VTdtQui1." 
and q.matcodigo=m.matcodigo
and m.matestado=1
and not ( m.mattipo=4 or m.mattipo=5)
and q.mtrno=mt.mtrno 
and mt.grucodigo=gm.grucodigo
and gm.gmestado>0
and gm.matcodigo=q.matcodigo
order by q.mtrno, m.mattipo, m.matnoconsecutivo";

		$VLdtDatosQui1 = execute_query($VTQryQui1,$VLConexion);
		$VLnuDatosQui1 = total_records($VLdtDatosQui1);
		// QUIMESTRE II
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
		///  PROMEDIO ANUAL
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
        <td width="13" <?php if ($VLdtCamp1<5 || ($VLdtCamp1>7 && $VLdtCamp1<12) || $VLdtCamp1>14){ ?> rowspan="4" <?php } else { ?> rowspan="6" <?php } ?>  align="center" valign="middle"><font face="Arial Narrow, Arial" size="-1"><?php echo $i+1; ?></font></td>
        <td <?php if ($VLdtCamp1<5 || ($VLdtCamp1>7 && $VLdtCamp1<12) || $VLdtCamp1>14){ ?> rowspan="4" <?php } else { ?> rowspan="6" <?php } ?> align="center" valign="middle"><font face="Arial Narrow, Arial" size="-1"><?php echo ($VLdtApellido." ".$VLdtNombre); ?></font></td>
        <td align="center"><font face="Arial Narrow, Arial" size="-1"><b>I</b></font></td>
<?php
/////////////// Enceramos las variables para los promedios
		$VTPromQ1=0;
		$VTPromQ2=0;
		$VTContQ1=0;
		$VTContQ2=0;
//////////////  recuperacion de las materias
	for ( $k=0; $k<$VLnuDatosMat; $k++)
{        
		$VTdtQui1=get_result($VLdtDatosQui1,$k,"quipromquimestre");
		$VTdtMatTipo=get_result($VLdtDatosMat,$k,"mattipo");
		$VLMatfamilia=get_result($VLdtDatosMat,$k,"famcodigo");
		$VTdtTotal[$k]=$VTdtQui1;

//////////// PRIMER QUIMESTRE
?>        
        <td align="right"><font face="Arial Narrow, Arial" size="+1" <?php if ($VTdtQui1<7){ ?> color="#FF0000" <?php } else { ?> color="#000000" <?php } ?> ><?php
	switch ($VTdtMatTipo)
	{
		case "1": // CUANTITATIVAS
		
		if($VLMatfamilia<4)
		{
			switch ($VTdtQui1) {
			case "0":
			echo " ";
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
		 	echo number_format($VTdtQui1,2); 
			$VTPromQ1+=$VTdtQui1;
			$VTContQ1++;
		}
		break 1;
		case "2": // CUALITATIVAS
		if( $VTdtQui1>8.99 && $VTdtQui1<11)
		{
			echo "EX";
		}
		if( $VTdtQui1>6.99 && $VTdtQui1<9)
		{
			echo "MB";
		}
		if( $VTdtQui1>4.99 && $VTdtQui1<7)
		{
			echo "B";
		}
		if( $VTdtQui1>0 && $VTdtQui1<5)
		{
			echo "R";
		}
		if( $VTdtQui1==0)
		{
			echo "NR";
		}			
		break 1;
		case "3": // CONDUCTA
			switch ($VTdtQui1) {
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
</font></td>
<td align="right"><font face="Arial Narrow, Arial" size="+1">
<?php		
		echo number_format($VTPromQ1/$VTContQ1,2);
		break 1;
	}
		 ?></font></td>
<?php
 }       

//////////// fin de recuperacion de materias del primer Quimestre
?>        
        <td <?php if ($VLdtCamp1<5 || ($VLdtCamp1>7 && $VLdtCamp1<12) || $VLdtCamp1>14){ ?> rowspan="4" <?php } else { ?> rowspan="6" <?php } ?> align="center" valign="middle">
        
<?php
////////////////////////// vemos el estado de la matricula /////////////////
///////////////////////  RECUPERAMOS EL PROMEDIO ANUAL
switch ($VLdtMatEstado)
	{
		case "1":
////////// SI LA MATRICULA ES CORRECTA.
?>        
        <p><font face="Arial Narrow, Arial" size="+1"><b>Promedio Anual</b></font></p>
<?php        
		$VLdtMensaje="APROBADO";
		$VTdtPromedio=0;
		$VtdtDiv=0;
		for ( $k=0; $k<$VLnuDatosMat; $k++)
		{ 
				$VTdtQuiA=get_result($VLdtDatosQuiA,$k,"quipromquimestre");
				$VTdtMatTipo=get_result($VLdtDatosMat,$k,"mattipo");
				
		switch ($VTdtMatTipo)
			{
				case "1":
					$VTdtPromedio=$VTdtPromedio + $VTdtQuiA;
					$VtdtDiv=$VtdtDiv +1;
					
					if($VTdtQuiA>=7)
					{
						if ( $VLdtMensaje!="APROBADO")
						{ /* SI EL ESTUDIANTE SUPLETORIO O GRACIA EN OTRA MATERIA NO CAMBIA SU ESTADO */
						  } else { $VLdtMensaje="APROBADO"; }
					} else {
						if($VTdtQuiA>=5)
						{	
							if ( $VLdtMensaje=="GRACIA")
							{ /* si está en GRACIA no cambia su estado */} else { $VLdtMensaje="SUPLETORIO"; }	
						} else { 
							$VLdtMensaje="GRACIA";
						}
					}

				break 1;
				case "2":
				break 1;
				case "3":
				break 1;
			}
		}
	
		$VtdtAnualProm=$VTdtPromedio/$VtdtDiv;
		

?>        
          <p><b><font size="+1" face="Arial Narrow, Arial"><?php 
			if($VLMatfamilia<4)
			{
				if($VtdtAnualProm==0)
				{
					$VTEquivalencia="NR";
				}
				if($VtdtAnualProm>0)
				{
					$VTEquivalencia="N/E";
				}
				if($VtdtAnualProm>3)
				{
					$VTEquivalencia="I";
				}
				if($VtdtAnualProm>5)
				{
					$VTEquivalencia="EP";
				}
				if($VtdtAnualProm>7)
				{
					$VTEquivalencia="A";
				}
				echo $VTEquivalencia;
			} else {	
				 echo number_format($VtdtAnualProm,2); 
			}
		    ?></font></b></p>
          <p><b><font size="+1" face="Arial Narrow, Arial"><?php echo $VLdtMensaje; ?></font></b></p>
<?php 

		break 1;
		case 2:
////////////////////  PARA EL CASO QUE SE HA  DESERTOR ///////////
?>
<p><b><font size="+1" face="Arial Narrow, Arial">DESERTOR</font></b></p>
<?php		
		break;
		
		case 3:
////////////////////  PARA EL CASO QUE SE HA RETIRADO  ///////////

?>
<p><b><font size="+1" face="Arial Narrow, Arial">RETIRADO</font></b></p>
<?php		
		break;
	
	}

?>
          </td>
      </tr>
      <tr>
        <td align="center"><font face="Arial Narrow, Arial" size="-1"><b>II</b></font></td>
<?php
//////////// SEGUNDO QUIMESTRE
//////////////  recuperacion de las materias
	for ( $k=0; $k<$VLnuDatosMat; $k++)
{ 
		$VTdtQui2=get_result($VLdtDatosQui2,$k,"quipromquimestre");
		$VTdtMatTipo=get_result($VLdtDatosMat,$k,"mattipo");
		$VLMatfamilia=get_result($VLdtDatosMat,$k,"famcodigo");
		$VTdtTotal[$k]=$VTdtTotal[$k]+$VTdtQui2;
?>        
        <td align="right"><font face="Arial Narrow, Arial" size="+1" <?php if ($VTdtQui2<7){ ?> color="#FF0000" <?php } else { ?> color="#000000" <?php } ?> ><?php
	switch ($VTdtMatTipo)
	{
		case "1": // CUANTITATIVA
		if($VLMatfamilia<4)
			{
				switch ($VTdtQui2) {
				case "0":
				echo " ";
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
				 echo number_format($VTdtQui2,2); 
				$VTPromQ2+=$VTdtQui2;
				$VTContQ2++;

			}
		break 1;
		case "2": // CUALITATIVA
		if( $VTdtQui2>8.99 && $VTdtQui2<11)
		{
			echo "EX";
		}
		if( $VTdtQui2>6.99 && $VTdtQui2<9)
		{
			echo "MB";
		}
		if( $VTdtQui2>4.99 && $VTdtQui2<7)
		{
			echo "B";
		}
		if( $VTdtQui2>0 && $VTdtQui2<5)
		{
			echo "R";
		}
		if( $VTdtQui2==0)
		{
			echo "NR";
		}			
		break 1;
		case "3": // CONDUCTA
			switch ($VTdtQui2) {
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
</font></td>
<td align="right"><font face="Arial Narrow, Arial" size="+1">
<?php		
		echo number_format($VTPromQ2/$VTContQ2,2);
		break 1;
	}
		 ?></font></td>
<?php
 }       

//////////// fin de recuperacion de materias
?>        
      </tr>
      <tr>
        <td align="center"><font face="Arial Narrow, Arial" size="-2"><b>TOTAL</b></font></td>
<?php
//////////////  recuperacion de las materias
	for ( $k=0; $k<$VLnuDatosMat; $k++)
{        
		$VTdtMatTipo=get_result($VLdtDatosMat,$k,"mattipo");
		$VLMatfamilia=get_result($VLdtDatosMat,$k,"famcodigo");
//////////// TOTAL
?>        
        <td align="right"><font face="Arial Narrow, Arial" size="+1"><?php 	switch ($VTdtMatTipo)
	{
		case "1": // CUANTITATIVA
		$VlResp=$VTdtTotal[$k]/2;
			if($VLMatfamilia<4)
			{
				if($VlResp==0)
				{
					$VTEquivalencia="NR";
				}
				if($VlResp>0)
				{
					$VTEquivalencia="N/E";
				}
				if($VlResp>3)
				{
					$VTEquivalencia="I";
				}
				if($VlResp>5)
				{
					$VTEquivalencia="EP";
				}
				if($VlResp>7)
				{
					$VTEquivalencia="A";
				}
				echo $VTEquivalencia;
			} else {	
				 echo number_format($VTdtTotal[$k],2); 
			}
		break 1;
		case "2": // CUALITATIVA
		break 1;
		case "3": // CONDUCTA
		?>
        </font></td>
        <td><font >
        <?php
		
		break 1;
	}
?></font></td>
<?php
 }       

//////////// fin de recuperacion de materias
//////////  PROMEDIO PARA LA BASICA SUPERIOR /////////
?>        
      </tr>     
<?php if ($VLdtCamp1<5 || ($VLdtCamp1>7 && $VLdtCamp1<12) || $VLdtCamp1>14){  } else { ?>      
      
      <tr>
        <td align="center"><font face="Arial Narrow, Arial" size="-2"><b><?php if ($VLdtCamp1<5 || ($VLdtCamp1>7 && $VLdtCamp1<12) || $VLdtCamp1>14){  } else { ?>PROMEDIO <? } ?></b></font></td>
<?php
//////////////  recuperacion de las materias
	for ( $k=0; $k<$VLnuDatosMat; $k++)
{        
//////////// PROMEDIO
		$VTdtMatTipo=get_result($VLdtDatosMat,$k,"mattipo");
		$VLMatfamilia=get_result($VLdtDatosMat,$k,"famcodigo");

?>        
        <td align="right"><font face="Arial Narrow, Arial" size="+1"><?php if ($VLdtCamp1<5 || ($VLdtCamp1>7 && $VLdtCamp1<12) || $VLdtCamp1>14){ ?> &nbsp; <? } else { 
		 switch ($VTdtMatTipo)
	{
		case "1":
		if($VLMatfamilia<4)
			{
				switch ($VTdtTotal[$k]/2) {
				case "0":
				echo " ";
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
		 		echo number_format($VTdtTotal[$k]/2,2); 
			}
		break 1;
		case "2":
		break 1;
		case "3":
		?>
        </font></td>
        <td><font >
        <?php
		break 1;
	}
		}?></font></td>
<?php
 }       

//////////// fin de recuperacion de materias
?>        
      </tr>
      
<? } 
///////// SUPLETORIO PARA LA BASICA SUPERIOR ///////
?>
<?php if ($VLdtCamp1<5 || ($VLdtCamp1>7 && $VLdtCamp1<12) || $VLdtCamp1>14){  } else { ?>        
      
      <tr>
        <td align="center"><font face="Arial Narrow, Arial" size="-2"><b>SUPLETORIO</b></font></td>
<?php
//////////////  recuperacion de las materias
	for ( $k=0; $k<$VLnuDatosMat; $k++)
{        
//////////// SUPLETORIO
		$VTdtQuiS=get_result($VLdtDatosQuiA,$k,"quiequivalencia80");
		$VTdtMatTipo=get_result($VLdtDatosMat,$k,"mattipo");
		$VLMatfamilia=get_result($VLdtDatosMat,$k,"famcodigo");
?>        
        <td align="right"><font face="Arial Narrow, Arial" size="+1"><?php switch ($VTdtMatTipo)
	{
		case "1":
		if($VLMatfamilia<4)
			{
				switch ($VTdtQuiS) {
				case "0":
				echo " ";
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
				 if ($VTdtQuiS==0)
				 {
				 }else{
					echo number_format($VTdtQuiS,2); 
				 }
			 }
		break 1;
		case "2":
		break 1;
		case "3":
		?>
        </font></td>
        <td><font >
        <?php
		break 1;
	} ?></font></td>
<?php
 }       

//////////// fin de recuperacion de materias
?>        
      </tr>
      
<?php } 
//////// PROMEDIO FINAL BASICA SUPERIOR //////
?>      
      <tr>
        <td align="center"><font face="Arial Narrow, Arial" size="-2"><b>PROM.FINAL</b></font></td>
<?php
//////////////  recuperacion de las materias
	for ( $k=0; $k<$VLnuDatosMat; $k++)
{        
//////////// ANUAL
		$VTdtQuiA=get_result($VLdtDatosQuiA,$k,"quipromquimestre");
		$VTdtMatTipo=get_result($VLdtDatosMat,$k,"mattipo");
		$VLMatfamilia=get_result($VLdtDatosMat,$k,"famcodigo");

?>        
        <td align="right"><font face="Arial Narrow, Arial" size="+1" <?php if ($VTdtQuiA<7){ ?> color="#FF0000" <?php } else { ?> color="#000000" <?php } ?> ><b><?php switch ($VTdtMatTipo)
	{
		case "1": /// CUANTITATIVA
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

		 		echo number_format($VTdtQuiA,2); 
			}
		break 1;
		case "2":  // CUALITATIVA
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
		case "3": // CONDUCTA
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
        </font></td>
        <td>
        <?php
		break 1;
	}
	
	////// FIN DEL ESTUDIANNTE
		if($j==5 && $VTdtMatTipo==3)
	{
		//echo $j;
		$j=0;
/////// cerramos la tabla///////////////////////////////////////
?>
</td></tr>
    </table></td>
  </tr>
  <tr>
  	<td>
    	<table>
        
        
        </table>
    </td>
  </tr>
</table>

<table>
<tr >
<td height="100">&nbsp;</td>
</tr>
</table>

<table width="900" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><img src="../imagenes/membrete2.png" width="779" height="142" /></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center"><font face="Arial Narrow, Arial" size="+2"> <B> CUADRO GENERAL DE CALIFICACIONES</B></font></td>
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
            <td width="300"><font face="Arial Narrow, Arial" ><b>CÓDIGO AMIE:</b> 08H00148</font></td>
            <td><font face="Arial Narrow, Arial" ><b>CIRCUITO: </b> 1</font></td>
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
        <td width="65"><font face="Arial Narrow, Arial" size="-1">QUIMESTRE</font></td>
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
        <td width="100" align="center"><font face="Arial Narrow, Arial" size="-1">P.Q.</font></td>
        <td width="100"><font face="Arial Narrow, Arial" size="-1">OBSERVACIONES</font></td>
      </tr>


<?php		
/////////////////////-----------------////////////////////////////			
	}

	?></b></font></td>
<?php
 }       

//////////// fin de recuperacion de materias
?>        
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
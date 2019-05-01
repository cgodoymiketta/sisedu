<?PHP
require "cnxn_bsddts/mnjdr_bsdts.php";
$VLdtCamp1=$_GET[txt_Camp1];
$VLdtCamp2=$_GET[txt_Camp2];
$VLdtCamp3=$_GET[txt_Camp3];
$VLdtCamp4=$_GET[txt_Camp4];
$VLdtCamp5=$_GET[txt_Camp5];
$VLdtCamp6=$_GET[txt_Camp6];
$VLdtCamp7=$_GET[txt_Camp7];
$VLdtCamp9=$_GET[txt_Camp9];

$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];


$VLConexion=connect();
$Query = "Select * from nlctv where anocodigo= ".$VLAnoLocal;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if ( $VLnuDatos>0 )
{
	$VLdtPeriodo=get_result($VLdtDatos,0,"anodescripcion");
}

$Query=" Select q.quidescripcion, p.prcdescripcion ";
$Query.=" from qmstr q, prcl p ";
$Query.=" where p.quicodigo=q.quicodigo and q.quicodigo=".$VLdtCamp1;
$Query.=" and p.prccodigo=".$VLdtCamp2;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if ( $VLnuDatos>0 )
{
	$VLdtQuimestre=get_result($VLdtDatos,0,"q.quidescripcion");
	$VLdtParcial=get_result($VLdtDatos,0,"p.prcdescripcion");
}


$VLQuerylib="SELECT pd.dtprpromedio, pd.matdescripcion, pd.mattipo, 
pd.matorden, pd.dtqmcodigo, qd.mtrno, p.pernombres, p.perapellidos
from prcldtll pd, qmstrdtll qd, mtrcl m, nsttcnstdnt ie, 
psn p, grp g
where 
qd.dtqmcodigo=pd.dtqmcodigo and m.mtrno=qd.mtrno and 
m.inescodigo=ie.inescodigo and ie.percodigo=p.percodigo and
 m.grucodigo=g.grucodigo and 
pd.prccodigo=".$VLdtCamp2." and g.curcodigo=".$VLdtCamp3."
order by qd.mtrno, pd.mattipo, pd.matorden, pd.dtqmcodigo ";
$VLdtDatosLib = execute_query($VLQuerylib,$VLConexion);
$VLnuDatosLib = total_records($VLdtDatosLib);


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPORTE DE NOTAS PARCIALES</title>
</head>

<body>


<table>
<?php 
	if ($VLnuDatosLib>0)
	{
?>
	<tr>
<?php
		$Otro=0;
		$Otra=0;
		for($i=0 ; $i<$VLnuDatosLib; $i++)
		{			
			$VLMateria=get_result($VLdtDatosLib,$i,"pd.matdescripcion");
			$VLMatTipo=get_result($VLdtDatosLib,$i,"pd.mattipo");
			$VLMatOrden=get_result($VLdtDatosLib,$i,"pd.matorden");
			$VLNoMatricula=get_result($VLdtDatosLib,$i,"qd.mtrno");
			$VLNombre=get_result($VLdtDatosLib,$i,"p.pernombres");
			$VLApellido=get_result($VLdtDatosLib,$i,"p.perapellidos");
			$VLMatNota=get_result($VLdtDatosLib,$i,"pd.dtprpromedio");
			
///////////////// CONSULTAMOS SI ES NUEVO ESTUDIANTE			
			if ($Otro!=$VLNoMatricula)
			{
			/////////////si no es creamos otra libreta
				if($Otra==0) {  /////////////////// ya tenemos un tr cramos un td1
?>					
		<td>			
					
		</td>		
<?php		
						
				}
				
				
			
			}else{
				/////llenamos el detalle de la libreta 
			
			
				
			}
?>



  
  <?php
		}
?>		
	</tr>	
<?php	
	}
  ?>
</table>

    

<table width="300" border="1">
  <tr>
    <td>
            
        <table width="300" border="0">
          <tr>
            <td align="center"><table width="300" border="0">
              <tr>
                <td width="50"><img src="imagenes/logo1.gif" width="71" height="71"></td>
                <td><table width="250" border="0">
                  <tr>
                    <td align="center"><b>ESCUELA EGB FISCOMISIONAL</b></td>
                  </tr>
                  <tr>
                    <td align="center"><b>&quot;NUEVO ECUADOR&quot;</b></td>
                  </tr>
                  <tr>
                    <td align="center"><font size="-2"> Esmeraldas - Ecuador </font></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="300" border="0">
              <tr>
                <td align="center"><font size="+1"><b> REPORTE DE CALIFICACIONES </b></font></td>
              </tr>
              <tr>
                <td align="center"><b>Año Lectivo <?=$VLdtPeriodo; ?></b>                  &nbsp;</td>
              </tr>
              <tr>
                <td><table width="300" border="0">
                  <tr>
                    <td width="127"><font size="-1"> <?=$VLdtQuimestre; ?></font>&nbsp;</td>
                    <td width="26">&nbsp;</td>
                    <td width="127"><font size="-1"><?=$VLdtParcial; ?></font>&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td>Estudiante:</td>
              </tr>
              <tr>
                <td>Curso y Paralelo:</td>
              </tr>
              <tr>
                <td>Docente Tutor/a:</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="300" border="0">
              <tr>
                <td width="32" align="center">#</td>
                <td width="156" align="center">Asignaturas</td>
                <td width="98" align="center">Calificaciones</td>
              </tr>
              <tr>
                <td align="right">1</td>
                <td><?=$VLMateria; ?></td>
                <td><?=$VLMateria; ?></td>
              </tr>
              <tr>
                <td align="right">2</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
              </tr >
              <tr>
                <td align="right">3</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">4</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">5</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">6</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">7</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">8</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">9</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">10</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">11</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>PROMEDIO</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">12</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><font size="-1" >COMPORTAMIENTO</font></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><font size="-1" >FALTAS JUSTIFICADAS</font></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><font size="-1" >FALTAS INJUSTIFICADAS</font></td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table>    
	</td>
  </tr>
</table>

    
 
</body>
</html>
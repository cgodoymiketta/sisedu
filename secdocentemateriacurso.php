<?php 

require "cnxn_bsddts/mnjdr_bsdts.php";
$VLNuevo=$_GET[nuevo_x];
$VLGuardar=$_GET[guardar_x];
$VLModificar=$_GET[modificar_x];
$VLBuscar=$_GET[buscar_x];
$VLImprimir=$_GET[imprimir_x];
$VLEliminar=$_GET[eliminar_x];
$VLConsultar=$_GET[consultar_x];
$VLConsultar2=$_GET[consultar2_x];
$VLdtCriterio=$_GET[critero];
$VLdtCriterio2=$_GET[critero2];
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
$VLdtCamp12=$_GET[txt_Camp12];
$VLdtCamp23=$_GET[txt_Camp23];
$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$numero1= count ($VLdtCamp23); // número de seleccionados

$VLColores=array("#F7BE81","#F5DA81","#F3F781","#D8F781","#BEF781","#9FF781","#81F781","#81F79F","#82e0aa","#73c6b6","#aed6f1","#d2b4de","#f1948a","#ccd1d1","#BE81F7","#F781F3","#F781D8","#F781BE","#F7819F");
$VLColores2=array("#F4FA58","#fad7a0","#bdc3c7","#a9cce3");

$VLtxtCampo1="Código";
$VLtxtCampo2="Apellidos";
$VLtxtCampo3="Nombres";
$VLtxtCampo4="C.C.";
$VLtxtCampo5="Documento";
$VLtxtCampo6="N.Teléfono";
$VLtxtCampo7="Dirección";
$VLtxtCampo8="Estado";
$VLtxtCampo9="Cod Docente";
$VLtxtCampo10="Cod Familia";
$VLtxtCampo11="Familia";
$VLtxtCampo12="Cod Materia";
$VLtxtCampo13="Materia";
$VLtxtCampo14="DocMat";
$VLtxtCampo16="Cod. Curso";
$VLtxtCampo17="Curso";
$VLtxtCampo18="Cod paralelo";
$VLtxtCampo19="Paralelo";



$VLQryCampo1="percodigo";
$VLQryCampo2="perapellidos";
$VLQryCampo3="pernombres";
$VLQryCampo4="percc";
$VLQryCampo5="perdocumento";
$VLQryCampo6="pertelefono";
$VLQryCampo7="perdireccion";
$VLQryCampo8="perestado";
$VLQryCampo9="indocodigo";
$VLQryCampo10="famcodigo";
$VLQryCampo11="famnombre";
$VLQryCampo12="matcodigo";
$VLQryCampo13="matdescripcion";
$VLQryCampo14="dcmtcodigo";
$VLQryCampo15="dcmtestado";
$VLQryCampo16="curcodigo";
$VLQryCampo17="cursigla";
$VLQryCampo18="parcodigo";
$VLQryCampo19="pardescripcion";
$VLQryCampo20="matid";
$VLQryCampo21="grucodigo";
$VLQryCampo22="gmcodigo";
$VLQryCampo23="gmparcodigo";
$VLQryCampo24="dcmtcodigo";




$VLQry1=" Select p.percodigo, p.perapellidos, p.pernombres,";
$VLQry1.="p.percc,p.perdocumento,";
$VLQry1.="p.pertelefono,";
$VLQry1.="p.perdireccion,p.perestado, ";
$VLQry1.=" d.indocodigo from ";
$VLQry1.=" psn p, nsttcndcnt d where ";
$VLQry1.=" p.percodigo=d.percodigo and ";
$VLQry1.=" d.inscodigo=".$VLInstitucion;
$VLQry2=" order by p.perapellidos, p.pernombres ";
$VLQry3=" SELECT gm.gmcodigo, gm.matcodigo, gm.grucodigo ";
$VLQry3.=" FROM grp g, grpmtr gm, dcntmtr dm WHERE ";
$VLQry3.=" dm.matcodigo = gm.matcodigo ";
$VLQry3.=" and g.grucodigo = gm.grucodigo ";
$VLQry3.=" and gm.gmestado = 1 ";
$VLQry3.=" and dm.dcmtestado=1 and indocodigo= ".$VLdtCamp9;
$VLQry3.=" and dm.anocodigo= ".$VLAnoLocal;
$VLQry3.=" and g.anocodigo= ".$VLAnoLocal;
$VLQry4=" Select f.famcodigo, f.famnombre, m.matcodigo,";
$VLQry4.=" m.matdescripcion, m.matestado from fml f, mtr m ";
$VLQry4.=" where f.famcodigo=m.famcodigo ";
$VLQry5=" order by f.famnombre, m.matdescripcion ";
$VLQry6=" Select f.famcodigo, f.famnombre, m.matcodigo,m.matid, d.dcmtcodigo, ";
$VLQry6.=" m.matdescripcion, m.matestado, d.dcmtestado from fml f, mtr m, ";
$VLQry6.=" dcntmtr d where f.famcodigo=m.famcodigo and f.famcodigo=d.famcodigo and ";
$VLQry6.=" m.matcodigo=d.matcodigo and d.dcmtestado=1 and d.indocodigo=".$VLdtCamp9;
$VLQry6.=" and d.anocodigo= ".$VLAnoLocal;

$VLQry7=" order by m.matdescripcion ";
$VLQry8=" Update dcntmtr set ";
$VLQry9=" Insert into dcntmtr ( indocodigo, matcodigo, famcodigo, dcmtestado ) values (";
$VLQry10= "SELECT c.cursigla, c.curorden,p.parcodigo, p.pardescripcion, p.parorden, e.espdescripcion, e.espcodigo, g.grucodigo,e.espseccion, e.esporden ";
$VLQry10.= "FROM  crs c , spcldd e, prll p, grp g, grpprll gp WHERE ";
$VLQry10.= "c.curcodigo=g.curcodigo and e.espcodigo=g.espcodigo and g.gruestado=1 "; 
$VLQry10.= " and g.grucodigo=gp.grucodigo and p.parcodigo=gp.parcodigo ";
$VLQry10.= " and g.anocodigo=".$VLAnoLocal;
$VLQry10.= " order by e.espseccion, e.esporden, c.curorden, p.parorden ";
$VLQry11= "SELECT e.espseccion, count(e.espseccion) as numero ";
$VLQry11.= "FROM  crs c , spcldd e, prll p, grp g, grpprll gp WHERE ";
$VLQry11.= "c.curcodigo=g.curcodigo and e.espcodigo=g.espcodigo and g.gruestado=1 "; 
$VLQry11.= " and g.grucodigo=gp.grucodigo and p.parcodigo=gp.parcodigo ";
$VLQry11.= " and g.anocodigo=".$VLAnoLocal;
$VLQry11.= " group by e.espseccion order by e.espseccion ";
$VLQry12= "SELECT e.espseccion, e.esporden, e.espsiglas, count(e.espsiglas) as numero ";
$VLQry12.= "FROM  crs c , spcldd e, prll p, grp g, grpprll gp WHERE ";
$VLQry12.= "c.curcodigo=g.curcodigo and e.espcodigo=g.espcodigo and g.gruestado=1 "; 
$VLQry12.= " and g.grucodigo=gp.grucodigo and p.parcodigo=gp.parcodigo ";
$VLQry12.= " and g.anocodigo=".$VLAnoLocal;
$VLQry12.= " group by e.espseccion, e.esporden, e.espsiglas  order by e.espseccion, e.esporden, e.espsiglas ";






$VLConexion=connect();
$Query = "Select * from nlctv where anocodigo= ".$VLAnoLocal;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if ( $VLnuDatos>0 )
{
	$VLdtPeriodo=get_result($VLdtDatos,0,"anodescripcion");
}
$QueryD = $VLQry1." and p.".$VLQryCampo1."=".$VLdtCamp1;
$VLdtDatosD = execute_query($QueryD,$VLConexion);
$VLnuDatosD = total_records($VLdtDatosD);
if ( $VLnuDatosD>0 )
{
	$VLdtCamp2=get_result($VLdtDatosD,0,"p.".$VLQryCampo2);
	$VLdtCamp3=get_result($VLdtDatosD,0,"p.".$VLQryCampo3);
	$VLdtCamp2.=" ".$VLdtCamp3;
}


if ( $VLNuevo != "")
{
	$vlccn="nuevo";
} 
if ( $VLConsultarNuevo != "")
{
	$VLdtCamp15=$VLdtCriterio;
	
	$Query = $VLQry8.$VLQry3.$VLdtCamp15;
	$VLdtDatos = execute_query($Query,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ($VLnuDatos>0)
	{
		//$VLdtCamp1=get_result($VLdtDatos,0,$VLQryCampo1);
		$VLdtCamp4=get_result($VLdtDatos,0,$VLQryCampo4);
		$vlccn="modificar";
	}
	

} 
if ( $VLGuardar != "")
{
	$Query1 = " Select gpm.gmcodigo, gpm.dcmtcodigo, ";
	$Query1.= " gpm.parcodigo, gpm.indocodigo, gpm.gpmdestado ";
	$Query1.= " from grpprllmtrdcnt gpm, grpmtr gm, grp g ";
	$Query1.= " where g.grucodigo=gm.grucodigo and "; 
	$Query1.= " gm.gmcodigo=gpm.gmcodigo";
	$Query1.= " and  gpm.indocodigo=".$VLdtCamp9;
	$Query1.= " and g.anocodigo=".$VLAnoLocal;
	$VLdtDatos1 = execute_query($Query1,$VLConexion);
	$VLnuDatos1 = total_records($VLdtDatos1);
	///// enceramos el estado de las materias-grupo-paralelo que esten activas
	if ($VLnuDatos1>0)
	{
		for ($gm=0; $gm<$VLnuDatos1; $gm++)
		{
			$VTDCMTCodigo=get_result($VLdtDatos1,$gm,"gpm.dcmtcodigo");
			$VTGMCodigo=get_result($VLdtDatos1,$gm,"gpm.gmcodigo");
			$VTPARCodigo=get_result($VLdtDatos1,$gm,"gpm.parcodigo");
			$Query2 = "Update grpprllmtrdcnt set gpmdestado=0 where indocodigo=".$VLdtCamp9;
			$Query2.= " and gmcodigo=".$VTGMCodigo." and parcodigo=".$VTPARCodigo." and dcmtcodigo=".$VTDCMTCodigo;			
			$VLdtDatos2 = execute_query($Query2,$VLConexion);
		}
	}
///////  REVISAMOS CUANTOS VIENEN SELECCIONADOS /////////////////
	if($numero1>0)
	{
///////  SEPARAMOS EL GMCODIGO DEL PARCODIGO
		for ($i=0; $i<$numero1; $i++)
		{
			$cadenaTotal=$VLdtCamp23[$i];
			$NCaracter=strlen($cadenaTotal);
			///////  RECUPERAMOS EL DCMT
			$DCMTCodigo="";
			for($j=0; $j<$NCaracter; $j++)
			{
				
				if ( $cadenaTotal[$j]=="-")
				{
					$k=$j+1;
					$j=$NCaracter;
				}else{
					$DCMTCodigo.=$cadenaTotal[$j];
				}
			}
			///////// RECUPERAMOS EL PARCODIGO
			$PARCodigo="";
			for($k; $k<$NCaracter; $k++)
			{
				if ( $cadenaTotal[$k]=="-")
				{
					$l=$k+1;
					$k=$NCaracter;
				}else{
					$PARCodigo.=$cadenaTotal[$k];
				}
			}
			///////// RECUPERAMOS EL GMCOD
			$GMCodigo="";
			for($l; $l<$NCaracter; $l++)
			{
				if ( $cadenaTotal[$l]=="-")
				{
					$l=$NCaracter;
				}else{
					$GMCodigo.=$cadenaTotal[$l];
				}
			}
			
			////////  VALIDAMOS QUE NO ESTEN CREADO			
			if ( $VLnuDatos1>0){
				
				$existe="0";
				for($x=0; $x<$VLnuDatos1; $x++)
				{
					$VTDCMTCodigo=get_result($VLdtDatos1,$x,"gpm.dcmtcodigo");
					$VTGMCodigo=get_result($VLdtDatos1,$x,"gpm.gmcodigo");
					$VTPARCodigo=get_result($VLdtDatos1,$x,"gpm.parcodigo");
					$VTEstado=get_result($VLdtDatos1,$x,"gpm.gpmdestado");
					if ($VTGMCodigo==$GMCodigo && $VTPARCodigo==$PARCodigo && $DCMTCodigo==$VTDCMTCodigo )
					{ 
						$existe=1; 
						$x=$VLnuDatos1; 
					}else{ 
						$existe=0; 
					}
				}
				if ( $existe== 1)
				{
					/////// actualizamos el estado
					$Query2 = "Update grpprllmtrdcnt set gpmdestado=1 where indocodigo=".$VLdtCamp9;
					$Query2.= " and gmcodigo=".$GMCodigo." and parcodigo=".$PARCodigo." and dcmtcodigo=".$DCMTCodigo;
					$VLdtDatos2 = execute_query($Query2,$VLConexion);
				}else{
				////// creamos 
					$Query3 = "Insert into grpprllmtrdcnt(gmcodigo, indocodigo, parcodigo,dcmtcodigo, gpmdestado)  ";
					$Query3.= " values (".$GMCodigo.",".$VLdtCamp9.",".$PARCodigo.",".$DCMTCodigo.",1)";
					$VLdtDatos3 = execute_query($Query3,$VLConexion);
				}
				
			}else
			{
	///////////  NO TIENE CREADO NINGUNA MATERIA EN ESE PARALELO			
				$Query3 = "Insert into grpprllmtrdcnt(gmcodigo, indocodigo, parcodigo,dcmtcodigo, gpmdestado)  ";
				$Query3.= " values (".$GMCodigo.",".$VLdtCamp9.",".$PARCodigo.",".$DCMTCodigo.",1)";
				$VLdtDatos3 = execute_query($Query3,$VLConexion);
			}
		}		
		
	}

		//$VLdtCamp1=get_result($VLdtDatos,0,$VLQryCampo1);
		$VLdtCamp4=get_result($VLdtDatos,0,$VLQryCampo4);
		$vlccn="modificar";

} 
if ( $VLModificar != "")
{
	$vlccn="modificar";
}
if ( $VLConsultar2 != "")
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


?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMINISTRACION DE DOCENTE MATERIA POR CURSO</title>
</head>
<body>
<form name="form1" method="get" action="secdocentemateriacurso.php">
<table width="100%" border="0">
  <tr>
    <td width="10%">&nbsp;</td>
    <td width="80%">
    
<table width="100%" border="0">
	<tr>
	  <td width="40%" height="16"><input type="hidden" name="vlccn" value="<?=$vlccn; ?>"><input type="hidden" name="nlctv" value="<?=$VLAnoLocal; ?>"><input type="hidden" name="nsttcn" value="<?=$VLInstitucion; ?>"><input type="hidden" name="txt_Camp1" value="<?=$VLdtCamp1; ?>"><input type="hidden" name="txt_Camp9" value="<?=$VLdtCamp9; ?>"> &nbsp; </td>
	  <td width="10%">&nbsp;</td>
	  <td width="10%"><input name="guardar" type="image" id="guardar" onClick="sumit" src="imagenes/Floppy Disk Blue_24x24-32.gif" alt="Guardar" width="24" height="24" border="0" value="guardar"></td>
	  <td width="10%">&nbsp;</td>
	  <td width="10%">&nbsp;</td>
	  <td width="10%">&nbsp;</td>
	  <td width="10%"></td>
	</tr>
</table>    
    
    
    </td>
    <td width="10%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?=$VLdtCamp2; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
  
 <table width="100%" border="0">
 			  <?php 
///////////////////// CONSULTAMOS TOD0S L0S CURSOS Y PARALELOS 
					$VLQueryC= $VLQry10;
					$VLdtDatosC = execute_query($VLQueryC,$VLConexion);
					$VLnuDatosC = total_records($VLdtDatosC);
///////////////////// CONSULTAMOS TODAS LAS SECCIONES
					$VLQuerySEC= $VLQry11;
					$VLdtDatosSEC = execute_query($VLQuerySEC,$VLConexion);
					$VLnuDatosSEC = total_records($VLdtDatosSEC);
///////////////////// CONSULTAMOS TODAS LAS ESPECIALIDADES POR SECCION
					$VLQueryESP= $VLQry12;
					$VLdtDatosESP = execute_query($VLQueryESP,$VLConexion);
					$VLnuDatosESP = total_records($VLdtDatosESP);
/////////////////    CONSULTAMOS LAS MATERIAS QUE TIENE ASIGNADAS ///////////////					
					$VLQueryM= $VLQry6.$VLQry7;
					$VLdtDatosM = execute_query($VLQueryM,$VLConexion);
					$VLnuDatosM = total_records($VLdtDatosM);
					
										
					/// CONFIRMAMOS QUE EXISTAN CURSOS CON PARALELOS
					if ( $VLnuDatosC > 0 && $VLnuDatosM>0 )
					{
			  ?>
	<tr>
		<td align="center">	
			<table  border="1">
            
			  <?php 
///////////////////// COLOCAMOS EL ENCABEZADO Y LOS CURSOS CON SUS PARALELOS ///			  
						
			  ?>
              <tr>
              	<td width="300" align="center" rowspan="3" bgcolor="#D8D8D8"> <font size="-1"> MATERIA  <? //=$NCaracter; ?> <? //=$cadena[2]; ?></font> </td>
                
			  <?php 
////////////////////// INGRESAMOS LA SECCION ///////////////////////
				
				for($j=0; $j<$VLnuDatosSEC;$j++){
					$VTSeccion=get_result($VLdtDatosSEC,$j,"e.espseccion");
					$VTSeccionNo=get_result($VLdtDatosSEC,$j,"numero");
					
				?>
              	<td align="center" colspan="<? echo $VTSeccionNo; ?>" bgcolor="<? echo $VLColores2[$j]; ?>"> <font size="-1"><? echo $VTSeccion; ?></font> </td>
				<?php
					}
					
				?>
				</tr><tr>
				<?php
/////////////////////  INGRESAMOS LA ESPECIALIDAD /////////////////			  
				$VTColorN=0;
				$VTColumnaN=0;
				for($k=0; $k<$VLnuDatosESP;$k++){
					$VTEspecialidad=get_result($VLdtDatosESP,$k,"e.espsiglas");
					$VTEspecialidadNo=get_result($VLdtDatosESP,$k,"numero");
					
////////////////////// ponemos color a las columnas ///////////					
					for( $z=0; $z<$VTEspecialidadNo;$z++)
					{
						$VTColorColumna[$VTColumnaN]=$VLColores[$VTColorN];
						$VTColumnaN++;
					}
					
				?>
              	<td align="center" bgcolor="<? echo $VLColores[$VTColorN]; ?> " colspan="<? echo $VTEspecialidadNo; ?>"> <font size="-1"><? echo $VTEspecialidad; ?></font> </td>
				<?php
					$VTColorN++;
				
					}
					
				?>
				</tr><tr>
				<?php
			  	
			  
///////////////////// EMPEZAMOS A PONER LOS CURSOS ///////////////////

				for ( $i=0; $i<$VLnuDatosC; $i++)
				{			  
			  ?>
              	<td align="center"  bgcolor="<? echo $VTColorColumna[$i]; ?> " ><font size="-2">
               
			  <?php 
///////////////////// RECUPERAMOS LA SIGLA Y EL PARALELO ////////////////
				$VTCampo16=get_result($VLdtDatosC,$i,$VLQryCampo16);
				$VTCampo17=get_result($VLdtDatosC,$i,$VLQryCampo17);
				$VTCampo18=get_result($VLdtDatosC,$i,$VLQryCampo18);
				$VTCampo19=get_result($VLdtDatosC,$i,$VLQryCampo19);
				echo $VTCampo17." ".$VTCampo19;
				
			  ?>
                </font></td>
	<?php 	} ///////////////////// FIN DE UN CURSO //////////////// ?>
              </tr>
			  <?php 
///////////////////// EMPEZAMOS A PONER LAS MATERIAS			  
				for ( $j=0; $j<$VLnuDatosM; $j++)
				{	
					$VTCampo12=get_result($VLdtDatosM,$j,"m.".$VLQryCampo12);
					$VTCampo13=get_result($VLdtDatosM,$j,"m.".$VLQryCampo13);
					$VTCampo20=get_result($VLdtDatosM,$j,"m.".$VLQryCampo20);
					$VTCampo24=get_result($VLdtDatosM,$j,"d.".$VLQryCampo24);
						
/////////////////  RECUPERAMOS LAS MATERIAS QUE EXISTEN EN LOS GRUPOS ///////
					$VLQueryE= $VLQry3." and gm.".$VLQryCampo12."=".$VTCampo12 ;
					$VLdtDatosE = execute_query($VLQueryE,$VLConexion);
					$VLnuDatosE = total_records($VLdtDatosE);
									
			  ?>
              <tr>
              	<td  align="center" bgcolor="#D8D8D8"> <font size="-1">  <?=$VTCampo13;//."-".$VTCampo20; ?></font> </td>
                
			  <?php 
///////////////////// EMPEZAMOS A PONER LOS CURSOS

				for ( $i=0; $i<$VLnuDatosC; $i++)
				{			  
			  ?>
              	<td align="center"  bgcolor="<? echo $VTColorColumna[$i]; ?> "><font size="-2">
               
			  <?php 
///////////////////// RECUPERAMOS LA SIGLA Y EL PARALELO ////////////////
				$VTCampo16=get_result($VLdtDatosC,$i,$VLQryCampo16);
				$VTCampo17=get_result($VLdtDatosC,$i,$VLQryCampo17);
				$VTCampo18=get_result($VLdtDatosC,$i,$VLQryCampo18);
				$VTCampo19=get_result($VLdtDatosC,$i,$VLQryCampo19);
				$VTCampo21=get_result($VLdtDatosC,$i,$VLQryCampo21);
					if( $VLnuDatosE>0)
					{
//////////////////////  VALIDAMOS QUE EXISTA EL GRUPO						
						for($k=0; $k<$VLnuDatosE; $k++)
						{
							$VTCampo21_temp=get_result($VLdtDatosE,$k,"gm.".$VLQryCampo21);
							$VTCampo22=get_result($VLdtDatosE,$k,"gm.".$VLQryCampo22);
							
							if ($VTCampo21_temp==$VTCampo21){
								$VTCampo23=$VTCampo24."-".$VTCampo18."-".$VTCampo22;
/////////////////// CONFIRMAMOS SI ESTA SELECCIONADA /////////////								
							$VLQuery4= "Select * from grpprllmtrdcnt where indocodigo=".$VLdtCamp9;
							$VLQuery4.= " and gpmdestado=1 ";							
							$VLQuery4.= " and ".$VLQryCampo24."=".$VTCampo24;							
							$VLQuery4.= " and ".$VLQryCampo18."=".$VTCampo18;							
							$VLQuery4.= " and ".$VLQryCampo22."=".$VTCampo22;							
							$VLdtDatos4 = execute_query($VLQuery4,$VLConexion);
							$VLnuDatos4 = total_records($VLdtDatos4);
								
								
 ?>								
<input type="checkbox" name="txt_Camp23[]" value="<?php echo $VTCampo23; ?>"  <?php if ($VLnuDatos4>0) { ?> checked <?php } ?> ><?php //echo $VTCampo12; ?>
<?php								
							$k=$VLnuDatosE;
							}else
							{
								//echo $VTCampo21_temp." - ".$VTCampo21;
 ?>								
							&nbsp;	
<?php								
							}
							
						}
					} else{
						
					}
			  ?>
                </font></td>
	<?php 	} ///////////////////// FIN DE UN CURSO //////////////// ?>
              </tr>
	<?php 	} ///////////// FIN DE UNA MATERIA Y SUS CURSOS //////////////// ?>
			  <?php 
/////////////////////// FIN DE LA CARGA DE LAS MATERIAS DEL DOCENTE
			  ?> 
			</table>
		</td>
	</tr>
<?php } else {
	?>
    <TR> <td>
    <table width="100%" border="1">
  <tr>
    <td>NO EXISTEN DATOS QUE MOSTRAR, CONFIRME QUE TENGA CURSOS CON PARALELOS Y QUE EL DOCENTE TENGA MATERIAS ASIGNADAS</td>
  </tr>
</table>
	</td>
    </TR>
    <?php
	  }
?>
</table>
   
    
    </td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>

</body>
</html>
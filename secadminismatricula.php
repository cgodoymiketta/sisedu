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
$VLConsultar3=$_GET[consultar3_x];
$VLConsultar4=$_GET[consultar4];
$VLConsultarNuevo=$_GET[consultarnuevo_x];
$VLdtCriterio=$_GET[critero];
$VLdtCriterio2=$_GET[critero2];
$VLdtCriterio3=$_GET[critero3];
$VLdtCriterio4=$_GET[critero4];
$VLdtConsultar=$_GET[txt_Consulta];
$VLdtCamp1=$_GET[txt_Camp1];
$VLdtCamp2=$_GET[txt_Camp2];
$VLdtCamp3=$_GET[txt_Camp3];
$VLdtCamp4=$_GET[txt_Camp4];
$VLdtCamp5=$_GET[txt_Camp5];
$VLdtCamp6=$_GET[txt_Camp6];
$VLdtCamp7=$_GET[txt_Camp7];
$VLdtCamp9=$_GET[txt_Camp9];
$VLdtCamp10=$_GET[txt_Camp10];
$VLdtCamp11=$_GET[txt_Camp11];
$VLdtCamp13=$_GET[txt_Camp13];
$VLdtCamp14=$_GET[txt_Camp14];
$VLdtCamp15=$_GET[txt_Camp15];
$VLdtCamp16=$_GET[txt_Camp16];
$VLdtCamp17=$_GET[txt_Camp17];
$VLdtCamp18=$_GET[txt_Camp18];
$VLdtCamp19=$_GET[txt_Camp19];
$VLdtCamp25=$_GET[txt_Camp25];
$VLdtCamp26=$_GET[txt_Camp26];

$VLdtHcodigo=$_GET[hcodigo];
$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$numero1= count ($VLdtCamp13);
$VLtxtCampo1="Codigo E.";
$VLtxtCampo2="Especialidad";
$VLtxtCampo4="Codigo C.";
$VLtxtCampo5="Curso";
$VLtxtCampo6="codigo grupo";
$VLtxtCampo12="Estudiantes";
$VLtxtCampo13="fecha";
$VLtxtCampo14="Codigo Paralelo";
$VLtxtCampo15="Paralelo descripcion";
$VLtxtCampo16="No Matr�cula ";
$VLtxtCampo17="No Folio ";
$VLtxtCampo18="Fecha Ext";
$VLtxtCampo19="Cod. Est. ";
$VLtxtCampo20="Estudiante estado";
$VLtxtCampo21="Nombres";
$VLtxtCampo22="Apellidos";
$VLtxtCampo23="Fecha de Nacimiento";
$VLtxtCampo24="seccion";

$VLQryCampo1="espcodigo";
$VLQryCampo2="espdescripcion";
$VLQryCampo3="espsiglas";
$VLQryCampo4="curcodigo";
$VLQryCampo5="curdescripcion";
$VLQryCampo6="espestado";
$VLQryCampo7="anocodigo";
$VLQryCampo9="grunoparticipante";
$VLQryCampo10="gruestado";
$VLQryCampo11="grucodigo";
$VLQryCampo13="mtrfecha";
$VLQryCampo14="parcodigo";
$VLQryCampo15="pardescripcion";
$VLQryCampo16="mtrno";
$VLQryCampo17="mtrfolio";
$VLQryCampo18="mtrfechaext";
$VLQryCampo19="inescodigo";
$VLQryCampo20="inesestado";
$VLQryCampo21="p.pernombres";
$VLQryCampo22="p.perapellidos";
$VLQryCampo23="p.perfechanacimiento";
$VLQryCampo24="espseccion";
$VLQryCampo25="mtrestado";
$VLQryCampo26="grucodigo";


$VLQry1=" SELECT p.perapellidos, p.pernombres, p.percc, p.perfechanacimiento, ie.inescodigo";
$VLQry1.=" FROM psn p, nsttcnstdnt ie ";
$VLQry1.=" WHERE p.percodigo = ie.percodigo and ie.inesestado=1 ";
$VLQry2=" like ";
$VLQry3=" where grucodigo=";
$VLQry4.="%";
$VLQry5=")";
$VLQry6="Select * from spcldd ";
$VLQry7= " order by espdescripcion ";
$VLQry8="Select * from grp ";
$VLQry9= " where ";
$VLQry10="Select * from crs ";
$VLQry11= " order by curorden ";
$VLQry12="grp";
$VLQry13="spcldd";
$VLQry14="SELECT p.parcodigo, p.pardescripcion, p.parorden from prll p grppll g ";
$VLQry14.=" where p.parcodigo=g.parcodigo and g.grucodigo=";
$VLQry19= "SELECT espdescripcion, curdescripcion, espseccion, g.grucodigo, curorden ";
$VLQry19.= "FROM`grp` g,`spcldd` s,`crs` c ";
$VLQry19.= " WHERE g.espcodigo = s.espcodigo and g.anocodigo=".$VLAnoLocal." ";
$VLQry19.= " AND g.curcodigo = c.curcodigo ";
$VLQry20 = " GROUP BY curorden,espdescripcion, curdescripcion,  grucodigo ";
$VLQry20.= " order BY curorden,espdescripcion, curdescripcion, grucodigo ";
$VLQry21 = " AND ";
$VLQry22 = "Select p.parcodigo, p.pardescripcion, p.parorden from prll p, grpprll g";
$VLQry22.= " where p.parcodigo=g.parcodigo and g.grucodigo=";
$VLQry23 = " order by p.perapellidos, p.pernombres, p.perfechanacimiento";
$VLQry24 = " insert into mtrcl ( inescodigo,grucodigo,parcodigo,mtrfecha,mtrfechaext,anocodigo,mtrestado) values (";
$VLQry25 = " Select * from mtrcl where ";
$VLQry26 = " update mtrcl set ";
$VLQry27=" SELECT p.perapellidos, p.pernombres, p.percc, p.perfechanacimiento, ie.inescodigo, m.mtrno, m.mtrfolio, m.mtrfecha, m.grucodigo, m.mtrestado, m.parcodigo ";
$VLQry27.=" FROM psn p, nsttcnstdnt ie, mtrcl m  ";
$VLQry27.=" WHERE p.percodigo = ie.percodigo and ie.inesestado=1 and ie.inescodigo=m.inescodigo and m.anocodigo=".$VLAnoLocal." ";

$a="a";
$b="b";
$c="c";
$d="d";

//// armamos la fecha

$txtDia=date("d");
$txtDia2=date("N");
$txtMes=date("m");
$txtAno=date("Y");

$VLFecha=$txtAno."/".$txtMes."/".$txtDia;

$VLFecha=$txtAno."/".$txtMes."/".$txtDia;

switch ($txtDia2) {
case "1":
$VLFechaTexto="lunes";
	break 1; 
case "2":
$VLFechaTexto="martes";	break 1; 
case "3":
$VLFechaTexto="mi�rcoles";	break 1; 
case "4":
$VLFechaTexto="jueves";	break 1; 
case "5":
$VLFechaTexto="viernes";	break 1; 
case "6":
$VLFechaTexto="s�bado";	break 1; 
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
if ( $VLConsultarNuevo != "")/// recupero curso y especialidad
{
	$VLdtCamp15=$VLdtCriterio;
	
	$Query = $VLQry8.$VLQry3.$VLdtCamp15;
	$VLdtDatos = execute_query($Query,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);
	if ($VLnuDatos>0)
	{
		$VLdtCamp1=get_result($VLdtDatos,0,$VLQryCampo1);
		$VLdtCamp4=get_result($VLdtDatos,0,$VLQryCampo4);
		$vlccn="modificar";
	}
	

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


?>

<head><title>Pantalla de Administracion del Sistema - Matr�cula</title></head>
<body>
<?php 
$QueryU = "Select *  from srprfl where usucodigo=".$VLUsuario." and anocodigo=".$VLAnoLocal;
$VLdtDatosU = execute_query($QueryU,$VLConexion);
$VLnuDatosU = total_records($VLdtDatosU);
if($VLnuDatosU>0){
include("sallitnalp/strctr1scrcmb.php"); 
} else{
	include("sanigap/strctr1ndx.php"); 	
}


?>
</body>
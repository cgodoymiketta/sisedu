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
$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$numero1= count ($VLdtCamp12); // número de seleccionados


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
$VLQryCampo16="anocodigo";


$VLQry1=" Select p.percodigo, p.perapellidos, p.pernombres,";
$VLQry1.="p.percc,p.perdocumento,";
$VLQry1.="p.pertelefono,";
$VLQry1.="p.perdireccion,p.perestado, ";
$VLQry1.=" d.indocodigo from ";
$VLQry1.=" psn p, nsttcndcnt d where ";
$VLQry1.=" p.percodigo=d.percodigo and ";
$VLQry1.=" d.inscodigo=".$VLInstitucion;
//$VLQry1.=" and d.anocodigo=".$VLAnoLocal;
$VLQry2=" order by p.perapellidos, p.pernombres ";
$VLQry3=" Select famcodigo, famnombre from fml ";
$VLQry4=" Select f.famcodigo, f.famnombre, m.matcodigo,";
$VLQry4.=" m.matdescripcion, m.matestado from fml f, mtr m ";
$VLQry4.=" where f.famcodigo=m.famcodigo ";
$VLQry5=" order by f.famnombre, m.matdescripcion ";
$VLQry6=" Select f.famcodigo, f.famnombre, m.matcodigo,";
$VLQry6.=" m.matdescripcion, m.matestado, d.dcmtestado from fml f, mtr m, ";
$VLQry6.=" dcntmtr d where f.famcodigo=m.famcodigo and f.famcodigo=d.famcodigo and ";
$VLQry6.=" m.matcodigo=d.matcodigo and d.indocodigo=".$VLdtCamp9;
$VLQry6.=" and d.anocodigo=".$VLAnoLocal;
$VLQry7=" order by  m.matdescripcion,f.famnombre ";
$VLQry8=" Update dcntmtr set ";
$VLQry9=" Insert into dcntmtr ( indocodigo, matcodigo, famcodigo, dcmtestado, anocodigo ) values (";

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
if ( $VLConsultarNuevo != "")
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

<head><title>Pantalla de Administracion del Sistema - Dsitributivo Docente</title></head>
<body>
<?php 
$QueryU = "Select *  from srprfl where usucodigo=".$VLUsuario." and anocodigo=".$VLAnoLocal;
$VLdtDatosU = execute_query($QueryU,$VLConexion);
$VLnuDatosU = total_records($VLdtDatosU);
if($VLnuDatosU>0){	
	include("sallitnalp/strctr1scrddcnt.php");  
} else{
	include("sanigap/strctr1ndx.php"); 	
}
?>
</body> 

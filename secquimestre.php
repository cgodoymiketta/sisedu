<?php 

require "cnxn_bsddts/mnjdr_bsdts.php";
$VLNuevo=$_GET[nuevo_x];
$VLGuardar=$_GET[guardar_x];
$VLModificar=$_GET[modificar_x];
$VLBuscar=$_GET[buscar_x];
$VLImprimir=$_GET[imprimir_x];
$VLEliminar=$_GET[eliminar_x];
$VLConsultar=$_GET[consultar_x];
$VLdtCriterio=$_GET[critero];
$VLdtConsultar=$_GET[txt_Consulta];
$VLdtGenerado=$_GET[GENERAR];
$VLdtAbrir=$_GET[ABRIR];
$VLdtCerrado=$_GET[CERRADO];
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
$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$VLtxtCampo1="Código";
$VLtxtCampo2="Descripcion";
$VLtxtCampo3="Orden";
$VLtxtCampo4="Fecha I";
$VLtxtCampo5="Fecha F";
$VLtxtCampo6="COD. INST";
$VLtxtCampo7="COD. ANIO";
$VLtxtCampo8="Estado";
$VLtxtCampo9="Tipo";
$VLtxtCampo10="Sección";
$VLQryCampo1="quicodigo";
$VLQryCampo2="quidescripcion";
$VLQryCampo3="quiorden";
$VLQryCampo4="quifechai";
$VLQryCampo5="quifechaf";
$VLQryCampo6="inscodigo";
$VLQryCampo7="anocodigo";
$VLQryCampo8="quiestado";
$VLQryCampo9="quitipo";
$VLQryCampo10="quiseccion";

$VLQry1=" insert into qmstr ( ";
$VLQry1.="quidescripcion,quiorden,";
$VLQry1.="quifechai,quifechaf,inscodigo, ";
$VLQry1.="anocodigo,quiestado, quitipo, quiseccion) ";
$VLQry1.=" values ( ";
$VLQry2="update qmstr set  ";
$VLQry3=" where quicodigo=";
$VLQry4.="delete from qmstr ";
$VLQry5=")";
$VLQry6="Select * from qmstr ";
$VLQry7= " order by quiorden ";
$VLQry8="Select * from qmstr ";
$VLQry9= "where";

$VLConexion=connect();
$Query = "Select * from nlctv where anocodigo= ".$VLAnoLocal;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if ( $VLnuDatos>0 )
{
				$VLdtPeriodo=get_result($VLdtDatos,0,"anodescripcion");
}

if ( $VLdtGenerado != "")
{
	$vlccn="generar";
} 

if ( $VLdtAbrir != "")
{
	$vlccn="abrir";
} 

if ( $VLdtCerrado != "")
{
	$vlccn="cerrar";
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


?>

<head><title>Pantalla de Administracion del Sistema - Quimestre</title></head>
<body>
<?php 
$QueryU = "Select *  from srprfl where usucodigo=".$VLUsuario." and anocodigo=".$VLAnoLocal;
$VLdtDatosU = execute_query($QueryU,$VLConexion);
$VLnuDatosU = total_records($VLdtDatosU);
if($VLnuDatosU>0){
	include("sallitnalp/strctr1scrqmstr.php"); 
} else{
	include("sanigap/strctr1ndx.php"); 	
}

?>
</body>

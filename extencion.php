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
$VLdtCamp1=$_GET[txt_Camp1];
$VLdtCamp2=$_GET[txt_Camp2];
$VLdtCamp3=$_GET[txt_Camp3];
$VLdtCamp4=$_GET[txt_Camp4];
$VLdtCamp5=$_GET[txt_Camp5];
$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$VLtxtCampo1="Codigo";
$VLtxtCampo2="Nombre";
$VLtxtCampo3="Siglas";
$VLtxtCampo4="No Créditos";
$VLtxtCampo5="Observaciones";
$VLQryCampo1="espcodigo";
$VLQryCampo2="espdescripcion";
$VLQryCampo3="espsiglas";
$VLQryCampo4="espnocreditos";
$VLQryCampo5="espobservacion";
$VLQryCampo6="espestado";
$VLQry1=" insert into spcldd ( ";
$VLQry1.="espdescripcion,espsiglas,espobservacion,";
$VLQry1.="espestado,espnocreditos) ";
$VLQry1.=" values ( ";
$VLQry2="update spcldd set  ";
$VLQry3=" where espcodigo=";
$VLQry4.="delete from spcldd ";
$VLQry5=")";
$VLQry6="Select * from spcldd ";
$VLQry7= " order by espdescripcion ";
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


?>

<head><title>Pantalla de Administracion del Sistema - Especialidad</title></head>
<body>
<form name="form1" method="get" action="extencion.php">
<?php include("sallitnalp/strctr1spcldd.php"); ?>
</form>
</body>

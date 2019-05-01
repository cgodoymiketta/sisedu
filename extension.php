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

$VLtxtCampo1="Código";
$VLtxtCampo2="Nombre";
$VLtxtCampo3="Siglas";
$VLtxtCampo4="No Teléfono";
$VLtxtCampo5="Dirección";
$VLQryCampo1="extcodigo";
$VLQryCampo2="extnombre";
$VLQryCampo3="extsiglas";
$VLQryCampo4="exttelefono";
$VLQryCampo5="extdireccion";
$VLQryCampo6="extestado";
$VLQry1=" insert into xtncn ( ";
$VLQry1.="extnombre,extsiglas,exttelefono,";
$VLQry1.="extdireccion,extestado) ";
$VLQry1.=" values ( ";
$VLQry2="update xtncn set  ";
$VLQry3=" where extcodigo=";
$VLQry4.="delete from xtncn ";
$VLQry5=")";
$VLQry6="Select * from xtncn ";
$VLQry7= " order by extnombre ";
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

<head><title>Pantalla de Administracion del Sistema - Extensión</title></head>
<body>
<form name="form1" method="get" action="extension.php">
<?php include("sallitnalp/strctr1xtnsn.php"); ?>
</form>
</body>

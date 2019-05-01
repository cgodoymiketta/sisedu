
<?php 
//header('Content-Type: text/html; charset=UTF-8');
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
$VLdtCamp9=$_GET[txt_camp9];
$VLdtCamp10=$_GET[txt_camp10];
$VLUsuar=$_GET[txt_camp9];
$VLClave=$_GET[txt_camp10];
$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$VLtxtCampo1="Codigo";
$VLtxtCampo2="Nombre";
$VLtxtCampo3="Fecha Inicial";
$VLtxtCampo4="Fecha Final";
$VLtxtCampo5="Observaciones";
$VLtxtCampo6="Año Lectivo";
$VLtxtCampo9="Usuario";
$VLtxtCampo10="Clave";

$VLQryCampo1="anocodigo";
$VLQryCampo2="anodescripcion";
$VLQryCampo3="anofechainicial";
$VLQryCampo4="anofechafinal";
$VLQryCampo5="anoobservacion";
$VLQryCampo6="anoestado";
$VLQryCampo7="inscodigo";
$VLQryCampo9="usunombre";
$VLQryCampo10="usupassword";
$VLQryCampo11="usucodigo";

$VLQry1="Select * from sr ";
$VLQry2="  ";
$VLQry3=" ";
$VLQry4=" ";
$VLQry5=" ";
$VLQry6="Select * from nlctv ";
$VLQry7= " order by anofechainicial desc, anofechafinal desc";
$VLQry8=" where  ";
$VLQry9= " ";

$VLConexion=connect();
$VLInstitucion=1;

/*
$Query = "Select * from nlctv where anocodigo= ".$VLAnoLocal;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if ( $VLnuDatos>0 )
{
				$VLdtPeriodo=get_result($VLdtDatos,0,"anodescripcion");
}
*/
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head><title>Pantalla de selección del Periodo de Estudio</title></head>
<body>
<?php 

$Query = $VLQry1.$VLQry8.$VLQryCampo9."='".$VLdtCamp9."' and ".$VLQryCampo10."='".$VLdtCamp10."'";
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if($VLnuDatos>0){
	$VLUsuario=get_result($VLdtDatos,0,$VLQryCampo11);
	include("sanigap/strctr1prd.php"); 
} else{
	include("sanigap/strctr2ndx.php"); 	
}

?>
</body>

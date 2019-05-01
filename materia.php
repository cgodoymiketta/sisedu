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
$VLdtCamp6=$_GET[txt_Camp6];
$VLdtCamp7=$_GET[txt_Camp7];
$VLdtCamp8=$_GET[txt_Camp8];
$VLdtCamp9=$_GET[txt_Camp9];
$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$VLtxtCampo1="Código";
$VLtxtCampo2="Nombre";
$VLtxtCampo3="Siglas";
$VLtxtCampo4="No Crédito";
$VLtxtCampo5="No Consecutivo";
$VLtxtCampo6="Observaciones";
$VLtxtCampo7="Familia";
$VLtxtCampo8="Estado";
$VLtxtCampo9="Tipo";
$VLQryCampo1="matcodigo";
$VLQryCampo2="matdescripcion";
$VLQryCampo3="matid";
$VLQryCampo4="matnocredito";
$VLQryCampo5="matnoconsecutivo";
$VLQryCampo6="matobservacion";
$VLQryCampo7="famcodigo";
$VLQryCampo8="matestado";
$VLQryCampo9="mattipo";


$VLQryCampo7_1="famcodigo";
$VLQryCampo7_2="famnombre";
$VLQry1=" insert into mtr ( ";
$VLQry1.="matdescripcion,matid,";
$VLQry1.="matnocredito,matnoconsecutivo,";
$VLQry1.="matobservacion,famcodigo,mattipo,matestado) ";
$VLQry1.=" values ( ";
$VLQry2="update mtr set  ";
$VLQry3=" where matcodigo=";
$VLQry4.="delete from mtr ";
$VLQry5=")";
$VLQry6="Select m.matcodigo, m.matnocredito, m.mattipo,m.famcodigo,m.matnoconsecutivo, matdescripcion, matid, f.famnombre from mtr m, fml f";
$VLQry7= " order by m.mattipo,m.famcodigo,m.matnoconsecutivo, m.matdescripcion ";
$VLQry8="Select * from grpmtr ";
$VLQry9= "where";
$VLQry10="Select * from mtrdcnt ";
$VLQry11="Select * from fml order by famnombre";
$VLQry12="Select * from fml ";
$VLQry13="where m.famcodigo=f.famcodigo and ";

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

<head><title>Pantalla de Administracion del Sistema - Materia</title></head>
<body>
<?php 
$QueryU = "Select *  from srprfl where usucodigo=".$VLUsuario." and anocodigo=".$VLAnoLocal;
$VLdtDatosU = execute_query($QueryU,$VLConexion);
$VLnuDatosU = total_records($VLdtDatosU);
if($VLnuDatosU>0){
include("sallitnalp/strctr1mtr.php"); 
} else{
	include("sanigap/strctr1ndx.php"); 	
}


?>
</body>
 
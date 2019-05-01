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
$VLdtCalcular=$_GET[CALCULAR];
$VLdtCerrado=$_GET[CERRADO];
$VLdtCamp1=$_GET[txt_Camp1];
$VLdtCamp2=$_GET[txt_Camp2];
$VLdtCamp3=$_GET[txt_Camp3];
$VLdtCamp4=$_GET[txt_Camp4];
$VLdtCamp5=$_GET[txt_Camp5];
$VLdtCamp6=$_GET[txt_Camp6];
$VLdtCamp7=$_GET[txt_Camp7];
$VLdtCamp8=$_GET[txt_Camp8];
$VLdtCamp13=$_GET[txt_Camp13];
$VLdtCamp14=$_GET[txt_Camp14];
$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$VLtxtCampo1="Código";
$VLtxtCampo2="Descripcion";
$VLtxtCampo3="Orden";
$VLtxtCampo4="Fecha I";
$VLtxtCampo5="Fecha F";
$VLtxtCampo6="Quimestre";
$VLtxtCampo7="Estado";
$VLtxtCampo9="Accion";
$VLtxtCampo13="Sección";

$VLQryCampo1="prccodigo";
$VLQryCampo2="prcdescripcion";
$VLQryCampo3="prcorden";
$VLQryCampo4="prcfechai";
$VLQryCampo5="prcfechaf";
$VLQryCampo6="quicodigo";
$VLQryCampo7="prcestado";
$VLQryCampo8="quidescripcion";
$VLQryCampo9="accion";
$VLQryCampo10="quiestado";
$VLQryCampo11="anocodigo";
$VLQryCampo12="inscodigo";
$VLQryCampo13="prcseccion";
$VLQryCampo14="prcversion";
$VLQryCampo15="quiseccion";

$VLQry1=" insert into prcl ( ";
$VLQry1.="prcdescripcion,prcorden,";
$VLQry1.="prcfechai,prcfechaf,quicodigo,prcseccion, ";
$VLQry1.="prcestado,prcversion) ";
$VLQry1.=" values ( ";
$VLQry2="update prcl set  ";
$VLQry3=" where prccodigo=";
$VLQry4.="delete from prcl ";
$VLQry5=")";
$VLQry6="Select * from prcl ";
$VLQry7= " order by prcorden ";
$VLQry8="Select p.prccodigo, p.prcdescripcion, p.prcorden,";
$VLQry8.=" p.prcfechai, p.prcfechaf, p.quicodigo, p.prcestado, p.prcseccion, ";
$VLQry8.=" q.quidescripcion, q.quiseccion, q.quiorden from qmstr q, prcl p where ";
$VLQry8.=" q.quicodigo=p.quicodigo ";
$VLQry9= "where";
$VLQry10= "Select * from qmstr where not ( quiestado>3 or quiestado<2) "." and ".$VLQryCampo12."=".$VLInstitucion." and ".$VLQryCampo11."=".$VLAnoLocal." order by quiorden";
$VLQry11= " order by q.quiseccion, q.quiorden, p.prcorden, p.prcseccion ";
$VLQry12= "Select * from qmstr where not quiestado<2 and ".$VLQryCampo12."=".$VLInstitucion." and ".$VLQryCampo11."=".$VLAnoLocal." order by quiorden";



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

if ( $VLdtCalcular != "")
{
	$vlccn="calcular";
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

<head><title>Pantalla de Administracion del Sistema - Parcial</title></head>
<body>
<?php 
$QueryU = "Select *  from srprfl where usucodigo=".$VLUsuario." and anocodigo=".$VLAnoLocal;
$VLdtDatosU = execute_query($QueryU,$VLConexion);
$VLnuDatosU = total_records($VLdtDatosU);
if($VLnuDatosU>0){
	include("sallitnalp/strctr1scrprcl.php");
} else{
	include("sanigap/strctr1ndx.php"); 	
}
	
?>
</body>

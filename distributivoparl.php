<?php 

require "cnxn_bsddts/mnjdr_bsdts.php";
$VLNuevo=$_GET[nuevo_x];
$VLGuardar=$_GET[guardar_x];
$VLModificar=$_GET[modificar_x];
$VLBuscar=$_GET[buscar_x];
$VLImprimir=$_GET[imprimir_x];
$VLEliminar=$_GET[eliminar_x];
$VLConsultar=$_GET[consultar_x];
$VLConsultarNuevo=$_GET[consultarnuevo_x];
$VLdtCriterio=$_GET[critero];
$VLdtConsultar=$_GET[txt_Consulta];
$VLdtCamp1=$_GET[txt_Camp1];
$VLdtCamp2=$_GET[txt_Camp2];
$VLdtCamp3=$_GET[txt_Camp3];
$VLdtCamp4=$_GET[txt_Camp4];
$VLdtCamp5=$_GET[txt_Camp5];
$VLdtCamp8=$_GET[txt_Camp8];
$VLdtCamp9=$_GET[txt_Camp9];
$VLdtCamp12=$_GET[txt_Camp12];
$VLdtHcodigo=$_GET[hcodigo];
$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$numero1= count ($VLdtCamp8); /// CUENTO EL NUMERO DE REGISTROS
$VLtxtCampo1="Codigo ";  //// codigo especialidad
$VLtxtCampo2="Especialidad";
$VLtxtCampo3="Siglas Especialidad";
$VLtxtCampo4="Código";  /// codigo curso
$VLtxtCampo5="Curso";
$VLtxtCampo8="Activar";
$VLtxtCampo9="Participantes";
$VLtxtCampo11="codigo"; /// codigo paralelo
$VLtxtCampo12="codigo"; /// codigo grupo
$VLtxtCampo13="Paralelo"; /// codigo grupo


$VLQryCampo1="espcodigo";
$VLQryCampo2="espdescripcion";
$VLQryCampo3="espsiglas";
$VLQryCampo4="curcodigo";
$VLQryCampo5="curdescripcion";
$VLQryCampo6="espestado";
$VLQryCampo7="anocodigo";
$VLQryCampo9="grunoparticipante";
$VLQryCampo10="gruestado";
$VLQryCampo11="parcodigo";
$VLQryCampo12="grucodigo";
$VLQryCampo13="parestado";
$VLQryCampo14="pardescripcion";
$VLQryCampo15="parorden";

$VLQry1=" insert into grp ( ";
$VLQry1.= "espcodigo,curcodigo,anocodigo";
$VLQry1.=",grunoparticipante,gruestado) value (";
$VLQry2="update grp set  ";
$VLQry3=" where anocodigo=";
$VLQry4.="delete from  ";
$VLQry5=")";
$VLQry6="Select * from spcldd ";
$VLQry7= " order by espseccion, esporden, espdescripcion ";
$VLQry8="Select * from grp ";
$VLQry9= " where ";
$VLQry10="Select * from crs ";
$VLQry11= " order by curorden ";
$VLQry12="grp";
$VLQry13="spcldd";
$VLQry14="Select * from prll ";
$VLQry15="Select * from grpprll ";
$VLQry16=" order by parorden ";
$VLQry17=" insert into grpprll ( grucodigo, parcodigo) values ( ";
$VLQry18="grpprll";




$a="a";
$b="b";
$c="c";
$d="d";


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
	$VLdtCamp1=$VLdtCriterio;
	$vlccn="modificar";
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

<head><title>Pantalla de Administracion del Sistema - Distributivo paralelo </title></head>
<body>
<?php 
$QueryU = "Select *  from srprfl where usucodigo=".$VLUsuario." and anocodigo=".$VLAnoLocal;
$VLdtDatosU = execute_query($QueryU,$VLConexion);
$VLnuDatosU = total_records($VLdtDatosU);
if($VLnuDatosU>0){
include("sallitnalp/strctr1scrdstrbtvprll.php"); 
} else{
	include("sanigap/strctr1ndx.php"); 	
}


?>
</body>

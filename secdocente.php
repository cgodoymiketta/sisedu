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
$fecha1=strtotime($VLdtCamp7);
$VLdtCamp7=date("Y/m/d",$fecha1);
$VLdtCamp8=$_GET[txt_Camp8];
$VLdtCamp9=$_GET[txt_Camp9];
$VLdtCamp10=$_GET[txt_Camp10];
$VLdtCamp11=$_GET[txt_Camp11];
$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$VLtxtCampo1="Código";
$VLtxtCampo2="Apellido";
$VLtxtCampo3="Nombre";
$VLtxtCampo4="C.C.";
$VLtxtCampo5="Sexo";
$VLtxtCampo6="ID.";
$VLtxtCampo7="F.Nacimiento";
$VLtxtCampo8="N.Teléfono";
$VLtxtCampo9="Dirección";
$VLtxtCampo10="Estado";
$VLQryCampo1="percodigo";
$VLQryCampo2="perapellidos";
$VLQryCampo3="pernombres";
$VLQryCampo4="percc";
$VLQryCampo5="persexo";
$VLQryCampo6="perdocumento";
$VLQryCampo7="perfechanacimiento";
$VLQryCampo8="pertelefono";
$VLQryCampo9="perdireccion";
$VLQryCampo10="perestado";


$VLQry1=" insert into psn ( ";
$VLQry1.="perapellidos,pernombres,";
$VLQry1.="percc,persexo,perdocumento,";
$VLQry1.="perfechanacimiento,pertelefono,";
$VLQry1.="perdireccion,perestado) ";
$VLQry1.=" values ( ";
$VLQry2="update psn set  ";
$VLQry3=" where percodigo=";
//$VLQry4.="delete from psn ";
$VLQry5=")";
$VLQry6="Select "; 
$VLQry6.="p.percodigo,p.perapellidos,p.pernombres,";
$VLQry6.="p.percc,p.persexo,p.perdocumento,";
$VLQry6.="p.perfechanacimiento,p.pertelefono,";
$VLQry6.="p.perdireccion from psn p, nsttcndcnt d ";
$VLQry6.=" where p.percodigo=d.percodigo ";

$VLQry7= " order by p.perapellidos, p.pernombres ";
$VLQry8="Select * from nsttcndcnt ";
$VLQry9= "where";

$VLQry10="Select "; 
$VLQry10.="p.percodigo,p.perapellidos,p.pernombres,";
$VLQry10.="p.percc,p.persexo,p.perdocumento,";
$VLQry10.="p.perfechanacimiento,p.pertelefono,";
$VLQry10.="p.perdireccion from psn p ";
$VLQry10.=" where  ";

$VLQry11= "insert into nsttcndcnt (percodigo, inscodigo) values ( ";

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

<head><title>Pantalla de Secretaria del Sistema - Docentes</title></head>
<body>
<?php 
$QueryU = "Select *  from srprfl where usucodigo=".$VLUsuario." and anocodigo=".$VLAnoLocal;
$VLdtDatosU = execute_query($QueryU,$VLConexion);
$VLnuDatosU = total_records($VLdtDatosU);
if($VLnuDatosU>0){
	include("sallitnalp/strctr1scrdcnt.php"); 
} else{
	include("sanigap/strctr1ndx.php"); 	
}
	
?>
</body>

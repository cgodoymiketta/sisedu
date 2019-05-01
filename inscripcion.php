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
$VLConsultarNuevo=$_GET[consultarnuevo_x];
$VLdtCriterio=$_GET[critero];
$VLdtCriterio2=$_GET[critero2];
$VLdtConsultar=$_GET[txt_Consulta];
$VLdtCamp1=$_GET[txt_Camp1];
$VLdtCamp2=$_GET[txt_Camp2];
$VLdtCamp3=$_GET[txt_Camp3];
$VLdtCamp4=$_GET[txt_Camp4];
$VLdtCamp5=$_GET[txt_Camp5];
$VLdtCamp8=$_GET[txt_Camp8];
$VLdtCamp9=$_GET[txt_Camp9];
$VLdtCamp13=$_GET[txt_Camp13];
$VLdtCamp15=$_GET[txt_Camp15];
$VLdtHcodigo=$_GET[hcodigo];
$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$numero1= count ($VLdtCamp13);
$VLtxtCampo1="Codigo E.";
$VLtxtCampo2="Especialidad";
$VLtxtCampo3="Siglas Especialidad";
$VLtxtCampo4="Codigo C.";
$VLtxtCampo5="Curso";
$VLtxtCampo8="Activar";
$VLtxtCampo9="Participantes";
$VLtxtCampo11="Código F";
$VLtxtCampo12="Estudiantes";
$VLtxtCampo13="Código M";
$VLtxtCampo14="Materia";
$VLQryCampo1="espcodigo";
$VLQryCampo2="espdescripcion";
$VLQryCampo3="espsiglas";
$VLQryCampo4="curcodigo";
$VLQryCampo5="curdescripcion";
$VLQryCampo6="espestado";
$VLQryCampo7="anocodigo";
$VLQryCampo9="grunoparticipante";
$VLQryCampo10="gruestado";
$VLQryCampo11="famcodigo";
$VLQryCampo12="famnombre";
$VLQryCampo13="matcodigo";
$VLQryCampo14="matdescripcion";
$VLQryCampo15="grucodigo";
$VLQryCampo16="gmestado";
$VLQry1=" insert into grpmtr ( ";
$VLQry1.= "matcodigo,grucodigo";
$VLQry1.=",gmestado) value (";
$VLQry2="update grpmtr set  ";
$VLQry3=" where grucodigo=";
$VLQry4.="delete from  ";
$VLQry5=")";
$VLQry6="Select * from spcldd ";
$VLQry7= " order by espdescripcion ";
$VLQry8="Select * from grp ";
$VLQry9= " where ";
$VLQry10="Select * from crs ";
$VLQry11= " order by curorden ";
$VLQry12="grp";
$VLQry13="spcldd";
$VLQry14="Select * from fml ";
$VLQry15="Select * from mtr ";
$VLQry16=" order by matdescripcion ";
$VLQry17="fml";
$VLQry18="Select * from grpmtr ";
$VLQry19= "SELECT espdescripcion, curdescripcion, g.grucodigo, curorden ";
$VLQry19.= "FROM`grp` g,`spcldd` s,`crs` c ";
$VLQry19.= " WHERE g.espcodigo = s.espcodigo";
$VLQry19.= " AND g.curcodigo = c.curcodigo ";
$VLQry20 = " GROUP BY espdescripcion, curdescripcion, curorden, grucodigo ";
$VLQry20.= " order BY espdescripcion, curorden, curdescripcion, grucodigo ";
$VLQry21 = " ";


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

<head><title>Pantalla de Administracion del Sistema - Inscripción</title></head>
<body>
<?php 
$QueryU = "Select *  from srprfl where usucodigo=".$VLUsuario." and anocodigo=".$VLAnoLocal;
$VLdtDatosU = execute_query($QueryU,$VLConexion);
$VLnuDatosU = total_records($VLdtDatosU);
if($VLnuDatosU>0){
include("sallitnalp/strctr1scrnscrpcn.php"); 
} else{
	include("sanigap/strctr1ndx.php"); 	
}


?>
</body>

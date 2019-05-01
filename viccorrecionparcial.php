<?php 

require "cnxn_bsddts/mnjdr_bsdts.php";
header('Content-Type: text/html; charset=UTF-8');
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
$VLdtCamp10=$_GET[txt_Camp10];
$VLdtCamp11=$_GET[txt_Camp11];
$VtFamilia=$_GET[txt_familia];
$VLdtCamp12=$_GET[txt_Camp12];
$VLdtCamp13=$_GET[txt_Camp13];// insumo 1=1 caso contrario =2
$VLdtCamp14=$_GET[txt_Camp14];//VER
$VLdtCamp15=$_GET[txt_Camp15];//grupo
$VLdtCamp19=$_GET[txt_Camp19];//paralelo
$VLdtNota1=$_GET[txt_Nota1];
$VLdtNota2=$_GET[txt_Nota2];
$VLdtNota3=$_GET[txt_Nota3];
$VLdtNota4=$_GET[txt_Nota4];
$VLdtNota5=$_GET[txt_Nota5];
$VLdtNota6=$_GET[txt_Nota6];
$VLdtNota7=$_GET[txt_Nota7];
$VLdtNota8=$_GET[txt_Nota8];
$VLdtNota8=$_GET[txt_Nota9];
$VLdtDesc1=$_GET[txt_Desc1];
$VLdtDesc2=$_GET[txt_Desc2];
$VLdtDesc3=$_GET[txt_Desc3];
$VLdtDesc4=$_GET[txt_Desc4];
$VLdtDesc5=$_GET[txt_Desc5];
$VLdtDesc6=$_GET[txt_Desc6];
$VLdtDesc7=$_GET[txt_Desc7];
$VLdtDesc8=$_GET[txt_Desc8];
$VLdtFecha1=$_GET[txt_Fecha1];
$VLdtFecha2=$_GET[txt_Fecha2];
$VLdtFecha3=$_GET[txt_Fecha3];
$VLdtFecha4=$_GET[txt_Fecha4];
$VLdtFecha5=$_GET[txt_Fecha5];
$VLdtFecha6=$_GET[txt_Fecha6];
$VLdtFecha7=$_GET[txt_Fecha7];
$VLdtFecha8=$_GET[txt_Fecha8];

$VTdtprDescA1=$_GET[txt_DescA1];
$VTdtprDescA2=$_GET[txt_DescA2];


$VLdtprcodigo=$_GET[txt_dtprcodigo];
$VLdtprtareas=$_GET[txt_Tarea];
$VLdtprlecciones=$_GET[txt_leccion];
if ($VLdtprlecciones==""){
$VLdtprlecciones=$_GET[txt_lecc];
}
$VLdtpractindiv=$_GET[txt_ActI];
$VTdtpractgrupal=$_GET[txt_ActG];
$VLdtpradicional1=$_GET[txt_Adc1];
$VLdtpradicional2=$_GET[txt_Adc2];
$VLdtprprueba=$_GET[txt_Prb];
$VLdtprrefuerzo=$_GET[txt_Rfz];
$VLdtprpromedio1=$_GET[txt_Pro1];
$VLdtprpromedio=$_GET[txt_Pro];
$VLdtmattipo=$_GET[txt_dtmattipo];
$VTdtIns1=$_GET[txt_Ins1];
$VTdtIns2=$_GET[txt_Ins2];


$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$VLtxtCampo1="Quimestre";
$VLtxtCampo2="Parcial";
$VLtxtCampo3="Materia";
$VLtxtCampo4="Curso";
$VLtxtCampo5="Estado";
$VLtxtCampo6="Sigla";


$VLQryCampo1="curcodigo";
$VLQryCampo2="curdescripcion";
$VLQryCampo3="curorden";
$VLQryCampo4="curobservacion";
$VLQryCampo5="curestado";
$VLQryCampo6="cursigla";
$VLQryCampo7="espcodigo";
$VLQryCampo17="anocodigo";
$VLQryCampo10="gruestado";
$VLQryCampo13="espsiglas";
$VLQryCampo15="grucodigo";
$VLQryCampo19="parcodigo";
$VLQryCampo20="pardescripcion";
$VLQryCampo21="parorden";

$VLQry1=" insert into crs ( ";
$VLQry1.="curdescripcion,curorden,";
$VLQry1.="curobservacion,cursigla,curestado) ";
$VLQry1.=" values ( ";
$VLQry2="update crs set  ";
$VLQry3=" where curcodigo=";
$VLQry4.="delete from crs ";
$VLQry5=")";
$VLQry6="Select * from crs ";
$VLQry7= " order by curorden ";
$VLQry8="Select * from grp ";
$VLQry9= " where ";
$VLQry10="Select * from spcldd ";
$VLQry11= " order by curorden ";
$VLQry12=" grp ";
$VLQry17= " order by espseccion, esporden, espdescripcion ";

$VLConexion=connect();
$Query = "Select * from nlctv where anocodigo= ".$VLAnoLocal;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);

$VLdtCurCodigo=$VLdtCamp1;


//////////////////// RECUPERAMOS EL CODIGO DEL DOCENTE ////////////
$VTQryDoc= "Select di.indocodigo
from sr u, nsttcndcnt di
where u.usucodigo= ".$VLUsuario."
and u.percodigo=di.percodigo";
$VLdtDatosDc = execute_query($VTQryDoc,$VLConexion);
$VLnuDatosDc = total_records($VLdtDatosDc);
if($VLnuDatosDc>0){
	$VTdtDocCodigo=get_result($VLdtDatosDc,0,"di.indocodigo");				
}


//////////////////// RECUPERAMOS LOS PERMISOS PARA REPORTES DEL USUARIO //////
$VTQryPermisos=" Select p.perfcodigo 
from prfl p, srprfl sp
where sp.usucodigo=".$VLUsuario."
and sp.perfcodigo=p.perfcodigo
and sp.anocodigo=".$VLAnoLocal." 
and p.perfestado=1 ";

$VLdtDatosPe = execute_query($VTQryPermisos,$VLConexion);
$VLnuDatosPe = total_records($VLdtDatosPe);
if($VLnuDatosPe>0){
	$VLPer=0;
	for ( $z=0; $z<$VLnuDatosPe; $z++){
		$VTdtPerfil=get_result($VLdtDatosPe,$z,"p.perfcodigo");
		switch ($VTdtPerfil)
		{
			case 1:
				$VLPer=1;
			break;	
			case 2:
				if ($VLPer!=1){	$VLPer=2; }
			break;	
			case 3:
				if ($VLPer==0 || $VLPer>2) { $VLPer=3; }
			break;	
			case 4:
				if ($VLPer==0 || $VLPer==6){ $VLPer=4; }
			break;	
			case 5:
				if ($VLPer==0 || $VLPer>3) { $VLPer=5; }
			break;	
			case 6:
				if ($VLPer==0 ){ $VLPer=6; }			
			break;	
		}
	
	}
}
//////////////////////////////////////////////////////////////////////////////





$QueryD="Select u.usucodigo, u.percodigo, d.indocodigo, p.perapellidos, p.pernombres, p.percc ";
$QueryD.="from sr u, nsttcndcnt d, psn p ";
$QueryD.="where u.percodigo=d.percodigo and p.percodigo=u.percodigo and u.usucodigo=".$VLUsuario;
$VLdtDatosD = execute_query($QueryD,$VLConexion);
$VLnuDatosD = total_records($VLdtDatosD);

if ( $VLnuDatosD>0 )
{
				$VLdtCamp1=get_result($VLdtDatosD,0,"u.percodigo");
				$VLdtCamp2=get_result($VLdtDatosD,0,"d.indocodigo");
}

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
<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
<head><title>Pantalla del Sistema - Correcion de Notas Parciales</title></head>
<body>


<?php 
$QueryU = "Select *  from srprfl where usucodigo=".$VLUsuario." and anocodigo=".$VLAnoLocal;
$VLdtDatosU = execute_query($QueryU,$VLConexion);
$VLnuDatosU = total_records($VLdtDatosU);
if($VLnuDatosU>0){
include("sallitnalp/strctr1crprvcdctnts.php"); 
} else{
	include("sanigap/strctr1ndx.php"); 	
}

?>
</body>

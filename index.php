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
 
 
 ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="./css/main.css">
    
<head><title>Pantalla de selección del Periodo de Estudio</title></head>
<body class="cover" style="background-image: url('./assets/images/loginFont.jpg');">

<?php include("sanigap/strctr1ndx.php"); ?>
</body>

<?php 

require "cnxn_bsddts/mnjdr_bsdts.php";
$VLRag=$_GET[rag_x];
$VLNuevo=$_GET[nuevo_x];
$VLGuardar=$_GET[guardar_x];
$VLModificar=$_GET[modificar_x];
$VLModificar2=$_GET[modificar2_x];
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
$fecha1=strtotime($VLdtCamp6);
$VLdtCamp6=date("Y/m/d",$fecha1);
$VLdtCamp7=$_GET[txt_Camp7];
$VLdtCamp8=$_GET[txt_Camp8];
$VLdtCamp9=$_GET[txt_Camp9];
$VLdtCamp10=$_GET[txt_Camp10];
$VLdtCamp11=$_GET[txt_Camp11];
$VLdtCamp12=$_GET[txt_Camp12];
$VLdtCamp13=$_GET[txt_Camp13];
$VLdtCamp14=$_GET[txt_Camp14];
$VLdtCamp15=$_GET[txt_Camp15];
$VLdtCamp16=$_GET[txt_Camp16];
$VLdtCamp17=$_GET[txt_Camp17];
$fecha1=strtotime($VLdtCamp17);
$VLdtCamp17=date("Y/m/d",$fecha1);
$VLdtCamp18=$_GET[txt_Camp18];
$VLdtCamp19=$_GET[txt_Camp19];
$VLdtCamp20=$_GET[txt_Camp20];
$VLdtCamp21=$_GET[txt_Camp21];
$VLdtCamp22=$_GET[txt_Camp22];
$VLdtCamp23=$_GET[txt_Camp23];
$VLdtCamp24=$_GET[txt_Camp24];
$VLdtCamp25=$_GET[txt_Camp25];
$VLdtCamp26=$_GET[txt_Camp26];
$VLdtCamp27=$_GET[txt_Camp27];
$VLdtCamp28=$_GET[txt_Camp28];
$VLdtCamp29=$_GET[txt_Camp29];
$VLdtCamp30=$_GET[txt_Camp30];
$VLdtCamp31=$_GET[txt_Camp31];
$VLdtCamp32=$_GET[txt_Camp32];

$VLdtCamp40=$_GET[txt_Camp40];
$VLdtCamp41=$_GET[txt_Camp41];
$VLdtCamp42=$_GET[txt_Camp42];
$VLdtCamp43=$_GET[txt_Camp43];
$VLdtCamp44=$_GET[txt_Camp44];
$VLdtCamp45=$_GET[txt_Camp45];
$VLdtCamp46=$_GET[txt_Camp46];
$VLdtCamp47=$_GET[txt_Camp47];
$VLdtCamp48=$_GET[txt_Camp48];
$VLdtCamp49=$_GET[txt_Camp49];
$VLdtCamp50=$_GET[txt_Camp50];
$VLdtCamp51=$_GET[txt_Camp51];
$VLdtCamp52=$_GET[txt_Camp52];
$VLdtCamp53=$_GET[txt_Camp53];

$VLdtCamp60=$_GET[txt_Camp60];
$VLdtCamp61=$_GET[txt_Camp61];
$VLdtCamp62=$_GET[txt_Camp62];
$VLdtCamp63=$_GET[txt_Camp63];
$VLdtCamp64=$_GET[txt_Camp64];
$VLdtCamp65=$_GET[txt_Camp65];
$VLdtCamp66=$_GET[txt_Camp66];
$VLdtCamp67=$_GET[txt_Camp67];
$VLdtCamp68=$_GET[txt_Camp68];
$VLdtCamp69=$_GET[txt_Camp69];
$VLdtCamp70=$_GET[txt_Camp70];
$VLdtCamp71=$_GET[txt_Camp71];
$VLdtCamp72=$_GET[txt_Camp72];
$VLdtCamp73=$_GET[txt_Camp73];

$VLdtCamp80=$_GET[txt_Camp80];
$VLdtCamp81=$_GET[txt_Camp81];
$VLdtCamp82=$_GET[txt_Camp82];
$VLdtCamp83=$_GET[txt_Camp83];
$VLdtCamp84=$_GET[txt_Camp84];
$VLdtCamp85=$_GET[txt_Camp85];
$VLdtCamp86=$_GET[txt_Camp86];
$VLdtCamp87=$_GET[txt_Camp87];
$VLdtCamp88=$_GET[txt_Camp88];
$VLdtCamp89=$_GET[txt_Camp89];
$VLdtCamp90=$_GET[txt_Camp90];
$VLdtCamp91=$_GET[txt_Camp91];
$VLdtCamp92=$_GET[txt_Camp92];
$VLdtCamp93=$_GET[txt_Camp93];

$VLdtCamp100=$_GET[txt_Camp100];
$VLdtCamp101=$_GET[txt_Camp101];
$VLdtCamp102=$_GET[txt_Camp102];
$VLdtCamp103=$_GET[txt_Camp103];
$VLdtCamp104=$_GET[txt_Camp104];
$VLdtCamp105=$_GET[txt_Camp105];
$VLdtCamp106=$_GET[txt_Camp106];
$VLdtCamp107=$_GET[txt_Camp107];
$VLdtCamp108=$_GET[txt_Camp108];
$VLdtCamp109=$_GET[txt_Camp109];
$VLdtCamp110=$_GET[txt_Camp110];
$VLdtCamp111=$_GET[txt_Camp111];
$VLdtCamp112=$_GET[txt_Camp112];
$VLdtCamp113=$_GET[txt_Camp113];
$VLdtCamp114=$_GET[txt_Camp114];
$VLdtCamp115=$_GET[txt_Camp115];
$VLdtCamp116=$_GET[txt_Camp116];

$VLdtCamp120=$_GET[txt_Camp120];
$VLdtCamp121=$_GET[txt_Camp121];
$VLdtCamp122=$_GET[txt_Camp122];
$VLdtCamp123=$_GET[txt_Camp123];
$VLdtCamp124=$_GET[txt_Camp124];
$VLdtCamp125=$_GET[txt_Camp125];
$VLdtCamp126=$_GET[txt_Camp126];
$VLdtCamp127=$_GET[txt_Camp127];
$VLdtCamp128=$_GET[txt_Camp128];
$VLdtCamp129=$_GET[txt_Camp129];

$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$VLtxtCampo1="Código";
$VLtxtCampo2="Apellidos";
$VLtxtCampo3="Nombres";
$VLtxtCampo4="Documento";
$VLtxtCampo5="Sexo";
$VLtxtCampo6="F.Nacimiento";
$VLtxtCampo7="L.Nacimiento";
$VLtxtCampo8="Dirección";
$VLtxtCampo9="Sector";
$VLtxtCampo10="Teléfonos";
$VLtxtCampo11="e-mail";
$VLtxtCampo12="R. Código";
$VLtxtCampo13="R. Apellidos";
$VLtxtCampo14="R. Nombres";
$VLtxtCampo15="R. Documento";
$VLtxtCampo16="R. Sexo";
$VLtxtCampo17="F. Nacimiento";
$VLtxtCampo18="Parentesco";
$VLtxtCampo19="Prof / Ocupación";
$VLtxtCampo20="Teléfono";
$VLtxtCampo21="Lugar Trabajo";
$VLtxtCampo22="Tip Documento";
$VLtxtCampo24="Nacionalidad";
$VLtxtCampo25="Discapacidad";
$VLtxtCampo26="Carné";
$VLtxtCampo27="%";
$VLtxtCampo28="Edad";
$VLtxtCampo29="Raza";
$VLtxtCampo30="Parroquia";
$VLtxtCampo31="Nacionalidad";
$VLtxtCampo32="Discapacidad";
$VLtxtCampo33="Estado";

$VLtxtCampo40="Parentesco";
$VLtxtCampo41="Apellidos";
$VLtxtCampo42="Nombres";
$VLtxtCampo43="Documento";
$VLtxtCampo44="Cédula";
$VLtxtCampo45="Sexo";
$VLtxtCampo46="F. Nacimiento";
$VLtxtCampo47="Dirección";
$VLtxtCampo48="Telefono";
$VLtxtCampo49="Ocupación";
$VLtxtCampo50="L. Trabaja";
$VLtxtCampo51="E.C.";
$VLtxtCampo52="R. L.";

$VLtxtCampo60="Parentesco";
$VLtxtCampo61="Apellidos";
$VLtxtCampo62="Nombres";
$VLtxtCampo63="Documento";
$VLtxtCampo64="Cédula";
$VLtxtCampo65="Sexo";
$VLtxtCampo66="F. Nacimiento";
$VLtxtCampo67="Dirección";
$VLtxtCampo68="Telefono";
$VLtxtCampo69="Ocupación";
$VLtxtCampo70="L. Trabaja";
$VLtxtCampo71="E.C.";
$VLtxtCampo72="R. L.";

$VLtxtCampo80="Parentesco";
$VLtxtCampo81="Apellidos";
$VLtxtCampo82="Nombres";
$VLtxtCampo83="Documento";
$VLtxtCampo84="Cédula";
$VLtxtCampo85="Sexo";
$VLtxtCampo86="F. Nacimiento";
$VLtxtCampo87="Direccion";
$VLtxtCampo88="Telefono";
$VLtxtCampo89="Ocupación";
$VLtxtCampo90="L. Trabaja";
$VLtxtCampo91="E.C.";
$VLtxtCampo92="R. L.";

$VLtxtCampo100="Hogar";
$VLtxtCampo101="Vive con";
$VLtxtCampo102="Otros";
$VLtxtCampo103="No. Hermanos Varones";
$VLtxtCampo104="No. Hermanos Mujeres";
$VLtxtCampo105="Lugar entre ellos";
$VLtxtCampo106="No. Hijos en la Institución";
$VLtxtCampo107="Años de Educ. Básica";

$VLtxtCampo110="Nivel";
$VLtxtCampo111="Vivienda";
$VLtxtCampo112="Bienes";
$VLtxtCampo113="Ingreso Padre";
$VLtxtCampo114="Egreso Padre";
$VLtxtCampo115="Ingreso Madre";
$VLtxtCampo116="Egreso Madre";

$VLtxtCampo120="Institución de la que procede";
$VLtxtCampo121="Repite";
$VLtxtCampo122="Religión a la que pertenece";
$VLtxtCampo123="Parroquia donde practica";
$VLtxtCampo124="SACRAMENTOS RECIBIDOS";
$VLtxtCampo125="Bautismo : ";
$VLtxtCampo126="Comunión : ";
$VLtxtCampo127="Biblia Latinoamericana : ";
$VLtxtCampo128="Confirmación : ";
$VLtxtCampo129="Observaciones :";

$VLQryCampo1="percodigo";
$VLQryCampo2="perapellidos";
$VLQryCampo3="pernombres";
$VLQryCampo4="percc";
$VLQryCampo5="persexo";
$VLQryCampo6="perfechanacimiento";
$VLQryCampo7="perlugarnacimiento";
$VLQryCampo8="perdireccion";
$VLQryCampo9="persector";
$VLQryCampo10="pertelefono";
$VLQryCampo11="peremail";
$VLQryCampo12="pariente";

$VLQryCampo18="parentezco";
$VLQryCampo19="parprofesion";
$VLQryCampo20="pertelefono";
$VLQryCampo21="parlugartrab";
$VLQryCampo22="perdocumento";
$VLQryCampo23="perdocumento";
$VLQryCampo24="perestado";
$VLQryCampo25="parrepresent";
$VLQryCampo26="ddscarne";
$VLQryCampo27="ddsporcentaje";
$VLQryCampo29="perraza";
$VLQryCampo30="perparroquia";
$VLQryCampo31="pernacionalidad";
$VLQryCampo32="ddsdiscapacidad";
$VLQryCampo33="inesestado";
$VLQryCampo34="perestadocivil";

$VLQryCampo40="f.parentezco";
$VLQryCampo41="p.perapellidos";
$VLQryCampo42="p.pernombres";
$VLQryCampo43="p.perdocumento";
$VLQryCampo44="p.percc";
$VLQryCampo45="p.persexo";
$VLQryCampo46="p.perfechanacimiento";
$VLQryCampo47="p.perdireccion";
$VLQryCampo48="p.pertelefono";
$VLQryCampo49="f.parprofesion";
$VLQryCampo50="f.parlugartrab";
$VLQryCampo51="p.perestadocivil";
$VLQryCampo52="f.parrepresent";
$VLQryCampo53="p.percodigo";

$VLQryCampo100="rfhogar";
$VLQryCampo101="rfvivecon";
$VLQryCampo102="rfotros";
$VLQryCampo103="rfnohermanos";
$VLQryCampo104="rfnohermanas";
$VLQryCampo105="rflugarocupa";
$VLQryCampo106="rfhermanosinst";
$VLQryCampo107="rfhercursos";
$VLQryCampo110="rfnivelsec";
$VLQryCampo111="rfvivienda";
$VLQryCampo112="rfbienes";
$VLQryCampo113="rfingpad";
$VLQryCampo114="rfegrpad";
$VLQryCampo115="rfingmad";
$VLQryCampo116="rfegrmad";

$VLQryCampo120="darinstproced";
$VLQryCampo121="darrepite";

$VLQryCampo122="pasreligion";
$VLQryCampo123="pasparroquia";
$VLQryCampo125="pasbautismo";
$VLQryCampo126="pascomunion";
$VLQryCampo127="pasbiblia";
$VLQryCampo128="pasconfirmacion";
$VLQryCampo129="pasobserv";



$VLQry0=" Select p.percodigo, p.perapellidos, p.pernombres, p.persexo, p.perfechanacimiento, p.perlugarnacimiento,";
$VLQry0.=" p.percc, p.perdireccion, p.persector, p.pertelefono, p.peremail, p.perdocumento, p.pernacionalidad, ";
$VLQry0.=" p.perparroquia, p.perraza, p.perestadocivil from psn p WHERE perestado=1 ";
$VLQry1=" Select p.percodigo, p.perapellidos, p.pernombres, p.persexo, p.perfechanacimiento, p.perlugarnacimiento,";
$VLQry1.=" p.percc, p.perdireccion, p.persector, p.pertelefono, p.peremail, p.perdocumento, p.pernacionalidad, ";
$VLQry1.=" p.perparroquia, p.perraza from psn p, nsttcnstdnt i where i.inesestado=1 and p.percodigo=i.percodigo and ";
$VLQry1.=" i.inscodigo=".$VLInstitucion." ";
$VLQry2=" and ";
$VLQry3=" )";
$VLQry4=" order by p.perapellidos, p.pernombres ";
$VLQry5=" INSERT INTO psn (perapellidos, pernombres, persexo, perfechanacimiento, perlugarnacimiento, ";
$VLQry5.=" percc, perdireccion, persector, pertelefono, peremail, perdocumento, perestadocivil , perestado ) ";
$VLQry5.=" values (";
$VLQry6=" INSERT INTO nsttcnstdnt (inscodigo, anocodigo, percodigo, inesestado) values ( ";
$VLQry7=" INSERT INTO dtsdsld (percodigo) values ( ";
$VLQry8=" INSERT INTO dtscdmcs (percodigo) values ( ";
$VLQry9=" INSERT INTO rfrncsfmlrs (percodigo) values ( ";
$VLQry10=" INSERT INTO dtspstrl (percodigo) values ( ";
$VLQry11=" INSERT INTO hstrvtl (percodigo) values ( ";
$VLQry12=" INSERT INTO prntsc (percodigo,pariente,parentezco,parlugartrab, parprofesion,parrepresent) values ( ";
$VLQry13=" DELETE FROM psn where percodigo=";
$VLQry14=" DELETE FROM nsttcnstdnt where percodigo=";
$VLQry15=" DELETE FROM dtsdsld where percodigo=";
$VLQry16=" DELETE FROM dtscdmcs where percodigo=";
$VLQry17=" DELETE FROM rfrncsfmlrs where percodigo=";
$VLQry18=" DELETE FROM dtspstrl where percodigo=";
$VLQry19=" DELETE FROM hstrvtl where percodigo=";
$VLQry20=" DELETE FROM prntsc where percodigo=";
$VLQry21=" Select p.percodigo, p.perapellidos, p.pernombres, p.persexo, p.perfechanacimiento, ";
$VLQry21.=" p.percc, p.perdireccion, p.pertelefono, p.perdocumento, p.perestadocivil, ";
$VLQry21.=" f.parentezco, f.parlugartrab, f.parprofesion ";
$VLQry21.="from psn p, prntsc f WHERE p.perestado=1 and p.percodigo=f.pariente and f.percodigo=";
$VLQry22=" UPDATE psn SET ";
$VLQry23=" UPDATE prntsc SET ";
$VLQry24=" where ";
$VLQry25=" SELECT * FROM dtsdsld ";
$VLQry26=" SELECT * FROM rfrncsfmlrs ";
$VLQry27=" SELECT * FROM dtscdmcs ";
$VLQry28=" SELECT * FROM dtspstrl ";
$VLQry29=" UPDATE dtsdsld SET ";
$VLQry30=" UPDATE rfrncsfmlrs SET ";
$VLQry31=" UPDATE dtscdmcs SET ";
$VLQry32=" UPDATE dtspstrl SET ";
$VLQry33=" DELETE FROM prntsc WHERE pariente=";


$VLConexion=connect();
$Query = "Select * from nlctv where anocodigo= ".$VLAnoLocal;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if ( $VLnuDatos>0 )
{
	$VLdtPeriodo=get_result($VLdtDatos,0,"anodescripcion");
}
if ( $VLRag != "")
{
	$vlccn="rag";
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
if ( $VLModificar2 != "")
{
	$vlccn="modificar2";
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
if ( $VLConsultar !="")
{
	$vlccn="buscar";
}

?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pantalla de Secretaría del Sistema - Estudiantes</title>
<style type="text/css">
.mat {
	font-weight: bold;
}
.ta {
	font-size: 14px;
}
.fuente {
	font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>
<body>
<?php 
$QueryU = "Select *  from srprfl where usucodigo=".$VLUsuario." and anocodigo=".$VLAnoLocal;
$VLdtDatosU = execute_query($QueryU,$VLConexion);
$VLnuDatosU = total_records($VLdtDatosU);
if($VLnuDatosU>0){
	include("sallitnalp/strctr1scrstdnt.php");  
} else{
	include("sanigap/strctr1ndx.php"); 	
}
?>
</body>

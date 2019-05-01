
<?php 

require "cnxn_bsddts/mnjdr_bsdts.php";
header('Content-Type: text/html; charset=UTF-8');
$VLConexion=connect();


$VLGuardar=$_GET[guardar_x];
$VLAnoLocal=$_GET[nlctv];
$VLAnoreporte=$_GET[nlctv2];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

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
$VLdtCamp12=$_GET[txt_Camp12];
$VLdtCamp13=$_GET[txt_Camp13];
$VLdtCamp14=$_GET[txt_Camp14];
$VLdtCamp15=$_GET[txt_Camp15];
$VLdtCamp16=$_GET[txt_Camp16];
$VLdtCamp17=$_GET[txt_Camp17];
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
$VLdtCamp33=$_GET[txt_Camp33];
$VLdtCamp34=$_GET[txt_Camp34];
$VLdtCamp35=$_GET[txt_Camp35];
$VLdtCamp36=$_GET[txt_Camp36];
$VLdtCamp37=$_GET[txt_Camp37];
$VLdtCamp38=$_GET[txt_Camp38];
$VLdtCamp39=$_GET[txt_Camp39];
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
$VLdtCamp54=$_GET[txt_Camp54];
$VLdtCamp55=$_GET[txt_Camp55];
$VLdtCamp56=$_GET[txt_Camp56];
$VLdtCamp57=$_GET[txt_Camp57];
$VLdtCamp58=$_GET[txt_Camp58];
$VLdtCamp59=$_GET[txt_Camp59];
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
$VLdtCamp74=$_GET[txt_Camp74];
$VLdtCamp75=$_GET[txt_Camp75];
$VLdtCamp76=$_GET[txt_Camp76];
$VLdtCamp77=$_GET[txt_Camp77];
$VLdtCamp78=$_GET[txt_Camp78];
$VLdtCamp79=$_GET[txt_Camp79];
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
$VLdtCamp94=$_GET[txt_Camp94];
$VLdtCamp95=$_GET[txt_Camp95];
$VLdtCamp96=$_GET[txt_Camp96];
$VLdtCamp97=$_GET[txt_Camp97];
$VLdtCamp98=$_GET[txt_Camp98];
$VLdtCamp99=$_GET[txt_Camp99];
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


$VLtxtCampo1="Código";
$VLtxtCampo2="apellidos";
$VLtxtCampo3="nombres";
$VLtxtCampo4="l. nacimiento";
$VLtxtCampo5="f. nacimiento";

$VLtxtCampo6="r1. codigo";
$VLtxtCampo7="r1. parentezco";
$VLtxtCampo8="r1. apellidos";
$VLtxtCampo9="r1. nombres";
$VLtxtCampo10="r1. f. nacimiento";
$VLtxtCampo11="r1. estado civil";
$VLtxtCampo12="r1. Instrucción";
$VLtxtCampo13="r1. profesion";
$VLtxtCampo14="r1. L trabaja";

$VLtxtCampo15="r2. codigo";
$VLtxtCampo16="r2. parentezco";
$VLtxtCampo17="r2. apellidos";
$VLtxtCampo18="r2. nombres";
$VLtxtCampo19="r2. f. nacimiento";
$VLtxtCampo20="r2. estado civil";
$VLtxtCampo21="r2. Instrucción";
$VLtxtCampo22="r2. profesion";
$VLtxtCampo23="r2. L trabaja";

$VLtxtCampo24="r3. codigo";
$VLtxtCampo25="r3. parentezco";
$VLtxtCampo26="r3. apellidos";
$VLtxtCampo27="r3. nombres";
$VLtxtCampo28="r3. f. nacimiento";
$VLtxtCampo29="r3. estado civil";
$VLtxtCampo30="r3. Instrucción";
$VLtxtCampo31="r3. profesion";
$VLtxtCampo32="r3. L trabaja";

$VLtxtCampo33="personas vive";
$VLtxtCampo34="No. hermanos";
$VLtxtCampo35="No. hermanas";
$VLtxtCampo36="lugar ocupa";
$VLtxtCampo37="edades";
$VLtxtCampo38="Nombres estudien";
$VLtxtCampo39="estructura familiar";
$VLtxtCampo40="f discapacidad";
$VLtxtCampo41="f disc quien";
$VLtxtCampo42="Observ";
$VLtxtCampo43="ingreso padre";
$VLtxtCampo44="egreso padre";
$VLtxtCampo45="ingreso madre";
$VLtxtCampo46="egreso madre";
$VLtxtCampo47="ingreso otros";
$VLtxtCampo48="egreso total";
$VLtxtCampo49="Cond. Vivienda";
$VLtxtCampo50="luz";
$VLtxtCampo51="agua";
$VLtxtCampo52="sshh";
$VLtxtCampo53="pozo";
$VLtxtCampo54="telefono";
$VLtxtCampo55="cable";
$VLtxtCampo56="celular";
$VLtxtCampo57="computador";
$VLtxtCampo58="Internet";
$VLtxtCampo59="Descripciones vivienda";
$VLtxtCampo60="Observaciones";

$VLtxtCampo61="Est discapacidad";
$VLtxtCampo62="dic cual";
$VLtxtCampo63="cond medica";
$VLtxtCampo64="ConMed cual";
$VLtxtCampo65="Es. Alergia";
$VLtxtCampo66="Alergia cual";
$VLtxtCampo67="Medicina";
$VLtxtCampo68="Atencion medica";
$VLtxtCampo69="Medico";
$VLtxtCampo70="Observaciones";

$VLtxtCampo71="fecha ing";
$VLtxtCampo72="inst precede";
$VLtxtCampo73="asig prefiere";
$VLtxtCampo74="asig dificultad";
$VLtxtCampo75="dignidades";
$VLtxtCampo76="logros";
$VLtxtCampo77="Participacion";
$VLtxtCampo78="clubes";
$VLtxtCampo79="extracurriculares";

$VLtxtCampo80="edad embarazo";
$VLtxtCampo81="acciden emb";
$VLtxtCampo82="medicamento emb";
$VLtxtCampo83="termino";
$VLtxtCampo84="prematuro";
$VLtxtCampo85="cesarea";
$VLtxtCampo86="normal";
$VLtxtCampo87="dificultad emb";
$VLtxtCampo88="peso";
$VLtxtCampo89="talla";
$VLtxtCampo90="camino";
$VLtxtCampo91="lactancia";
$VLtxtCampo92="biberon";
$VLtxtCampo93="esfinter";
$VLtxtCampo94="enfermedades";
$VLtxtCampo95="accidentes";
$VLtxtCampo96="alergias";
$VLtxtCampo97="cirugias";
$VLtxtCampo98="perd. conocimiento";
$VLtxtCampo99="otros";
$VLtxtCampo100="obesidad";
$VLtxtCampo101="cardiacas";
$VLtxtCampo102="hipertension";
$VLtxtCampo103="diabetes";
$VLtxtCampo104="mentales";
$VLtxtCampo105="otros";
$VLtxtCampo106="padre";
$VLtxtCampo107="madre";
$VLtxtCampo108="hermanos";
$VLtxtCampo109="otros";
$VLtxtCampo110="observaciones";
$VLtxtCampo111="costumbres";

$VLQryCampo1="percodigo";
$VLQryCampo2="perapellidos";
$VLQryCampo3="pernombres";
$VLQryCampo4="perlugarnacimiento";
$VLQryCampo5="perfechanacimiento";

$VLQryCampo6="percodigo";
$VLQryCampo7="parentezco";
$VLQryCampo8="perapellidos";
$VLQryCampo9="pernombres";
$VLQryCampo10="perfechanacimiento";
$VLQryCampo11="perestadocivil";
$VLQryCampo12="parinstruccion";
$VLQryCampo13="parprofesion";
$VLQryCampo14="parlugartrab";

$VLQryCampo15="percodigo";
$VLQryCampo16="parentezco";
$VLQryCampo17="perapellidos";
$VLQryCampo18="pernombres";
$VLQryCampo19="perfechanacimiento";
$VLQryCampo20="perestadocivil";
$VLQryCampo21="parinstruccion";
$VLQryCampo22="parprofesion";
$VLQryCampo23="parlugartrab";

$VLQryCampo24="percodigo";
$VLQryCampo25="parentezco";
$VLQryCampo26="perapellidos";
$VLQryCampo27="pernombres";
$VLQryCampo28="perfechanacimiento";
$VLQryCampo29="perestadocivil";
$VLQryCampo30="parinstruccion";
$VLQryCampo31="parprofesion";
$VLQryCampo32="parlugartrab";

$VLQryCampo33="rfpersvive";
$VLQryCampo34="rfnohermanos";
$VLQryCampo35="rfnohermanas";
$VLQryCampo36="rflugarocupa";
$VLQryCampo37="rfedades";
$VLQryCampo38="rfhinstnombres";
$VLQryCampo39="rfestructura";
$VLQryCampo40="rffdiscapacidad";
$VLQryCampo41="rfnombredeldis";
$VLQryCampo42="rfobservaciones";
$VLQryCampo43="rfingpad";
$VLQryCampo44="rfegrpad";
$VLQryCampo45="rfingmad";
$VLQryCampo46="rfegrmad";
$VLQryCampo47="rfingotro";
$VLQryCampo48="rfegrtotal";
$VLQryCampo49="rfvivienda";
$VLQryCampo50="rfluz";
$VLQryCampo51="rfagua";
$VLQryCampo52="rfsshh";
$VLQryCampo53="rfpozo";
$VLQryCampo54="rftelefono";
$VLQryCampo55="rfcable";
$VLQryCampo56="rfcelular";
$VLQryCampo57="rfcomputador";
$VLQryCampo58="rfinternet";
$VLQryCampo59="rfvivdescrip";
$VLQryCampo60="rfobservacion2";

$VLQryCampo61="ddsdiscapacidad";
$VLQryCampo62="ddsdetalle";
$VLQryCampo63="ddscondmed";
$VLQryCampo64="ddscmdetalle";
$VLQryCampo65="ddsalergia";
$VLQryCampo66="ddsaledetalle";
$VLQryCampo67="ddsmedicamentos";
$VLQryCampo68="ddsatenmedica";
$VLQryCampo69="ddsmedico";
$VLQryCampo70="ddobservacion";

$VLQryCampo71="darfechaing";
$VLQryCampo72="darinstproced";
$VLQryCampo73="darasigpref";
$VLQryCampo74="darasigdifc";
$VLQryCampo75="dardignidad";
$VLQryCampo76="darlogros";
$VLQryCampo77="darpartic";
$VLQryCampo78="darclubes";
$VLQryCampo79="darextracu";

$VLQryCampo80="hvedadmadre";
$VLQryCampo81="hvaccidente";
$VLQryCampo82="hvmedicamento";
$VLQryCampo83="hvtermino";
$VLQryCampo84="hvprematuro";
$VLQryCampo85="hvcesarea";
$VLQryCampo86="hvnormal";
$VLQryCampo87="hvdificultades";
$VLQryCampo88="hvpeso";
$VLQryCampo89="hvtalla";
$VLQryCampo90="hvcaminar";
$VLQryCampo91="hvlactancia";
$VLQryCampo92="hvbiberon";
$VLQryCampo93="hvesfinter";
$VLQryCampo94="hvenfermed";
$VLQryCampo95="hvaccident";
$VLQryCampo96="hvalergias";
$VLQryCampo97="hvcirugias";
$VLQryCampo98="hvperdcono";
$VLQryCampo99="hvotros";
$VLQryCampo100="hvobesidad";
$VLQryCampo101="hvenfcar";
$VLQryCampo102="hvhiper";
$VLQryCampo103="hvdiabetes";
$VLQryCampo104="hvenfmen";
$VLQryCampo105="hvotraenf";
$VLQryCampo106="hvpadre";
$VLQryCampo107="hvmadre";
$VLQryCampo108="hvhermano";
$VLQryCampo109="hvparientes";
$VLQryCampo110="hvobservaciones";
$VLQryCampo111="hvcosthab";


$VLQry1=" Select perapellidos,pernombres, perfechanacimiento,";
$VLQry1.=" perdireccion, persector, perparroquia, pertelefono,";
$VLQry1.=" perraza, persexo, pernacionalidad, perdocumento, ";
$VLQry1.="perlugarnacimiento from psn where percodigo=".$VLdtCamp1;
$VLQry2=" Select p.percodigo, p.perapellidos,p.pernombres, p.perfechanacimiento,";
$VLQry2.="p.perestadocivil, f.parentezco, f.parlugartrab, f.parinstruccion,";
$VLQry2.="f.parprofesion from psn p, prntsc f where p.percodigo=f.pariente and f.percodigo=".$VLdtCamp1;
$VLQry3=" Select * from rfrncsfmlrs where percodigo=".$VLdtCamp1;
$VLQry4=" Select * from dtsdsld where percodigo=".$VLdtCamp1;
$VLQry5=" Select * from dtscdmcs where percodigo=".$VLdtCamp1;
$VLQry6=" Select * from hstrvtl where percodigo=".$VLdtCamp1;
$VLQry7=" Update prntsc set ";
$VLQry8=" Update rfrncsfmlrs set ";
$VLQry9=" Update dtsdsld set ";
$VLQry10=" Update dtscdmcs set ";
$VLQry11=" Update hstrvtl set ";
$VLQry12=" where percodigo=".$VLdtCamp1;
$VLQry13=" where percodigo=".$VLdtCamp1." AND pariente=";






$Query = "Select * from nlctv where anocodigo= ".$VLAnoreporte;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if ( $VLnuDatos>0 )
{
				$VLdtPeriodo=get_result($VLdtDatos,0,"anodescripcion");
}
/*

if ( $VLGuardar!="") /// si damos guardar 
{
/// actualizamos parientes
/// pariente 1
	if ($VLdtCamp6!=""){
		$Query7 = $VLQry7;
		$Query7.= $VLQryCampo12."='".$VLdtCamp12."' ";
		$Query7.= $VLQry13.$VLdtCamp6;		
		execute_query($Query7,$VLConexion);
	}
	if ($VLdtCamp15!=""){
		$Query7 = $VLQry7;
		$Query7.= $VLQryCampo21."='".$VLdtCamp21."' ";
		$Query7.= $VLQry13.$VLdtCamp15;		
		execute_query($Query7,$VLConexion);
	}
	if ($VLdtCamp24!=""){
		$Query7 = $VLQry7;
		$Query7.= $VLQryCampo30."='".$VLdtCamp30."' ";
		$Query7.= $VLQry13.$VLdtCamp24;		
		execute_query($Query7,$VLConexion);
	}
	
/// actualizamos referencias familiares
	$Query8 = $VLQry8;
	$Query8.=$VLQryCampo33."='".$VLdtCamp33."' ,";
	$Query8.=$VLQryCampo34."='".$VLdtCamp34."' ,";
	$Query8.=$VLQryCampo35."='".$VLdtCamp35."' ,";
	$Query8.=$VLQryCampo36."='".$VLdtCamp36."' ,";
	$Query8.=$VLQryCampo37."='".$VLdtCamp37."' ,";
	$Query8.=$VLQryCampo38."='".$VLdtCamp38."' ,";
	$Query8.=$VLQryCampo39."='".$VLdtCamp39."' ,";
	$Query8.=$VLQryCampo40."='".$VLdtCamp40."' ,";
	$Query8.=$VLQryCampo41."='".$VLdtCamp41."' ,";
	$Query8.=$VLQryCampo42."='".$VLdtCamp42."' ,";
	$Query8.=$VLQryCampo43."='".$VLdtCamp43."' ,";
	$Query8.=$VLQryCampo44."='".$VLdtCamp44."' ,";
	$Query8.=$VLQryCampo45."='".$VLdtCamp45."' ,";
	$Query8.=$VLQryCampo46."='".$VLdtCamp46."' ,";
	$Query8.=$VLQryCampo47."='".$VLdtCamp47."' ,";
	$Query8.=$VLQryCampo48."='".$VLdtCamp48."' ,";
	$Query8.=$VLQryCampo49."='".$VLdtCamp49."' ,";
	$Query8.=$VLQryCampo50."='".$VLdtCamp50."' ,";
	$Query8.=$VLQryCampo51."='".$VLdtCamp51."' ,";
	$Query8.=$VLQryCampo52."='".$VLdtCamp52."' ,";
	$Query8.=$VLQryCampo53."='".$VLdtCamp53."' ,";
	$Query8.=$VLQryCampo54."='".$VLdtCamp54."' ,";
	$Query8.=$VLQryCampo55."='".$VLdtCamp55."' ,";
	$Query8.=$VLQryCampo56."='".$VLdtCamp56."' ,";
	$Query8.=$VLQryCampo57."='".$VLdtCamp57."' ,";
	$Query8.=$VLQryCampo58."='".$VLdtCamp58."' ,";
	$Query8.=$VLQryCampo59."='".$VLdtCamp59."' ,";
	$Query8.=$VLQryCampo60."='".$VLdtCamp60."' ";
	$Query8.= $VLQry12;
	execute_query($Query8,$VLConexion);
/// actualizamos datos de salud
	$Query9 = $VLQry9;
	$Query9.=$VLQryCampo61."='".$VLdtCamp61."' ,";
	$Query9.=$VLQryCampo62."='".$VLdtCamp62."' ,";
	$Query9.=$VLQryCampo63."='".$VLdtCamp63."' ,";
	$Query9.=$VLQryCampo64."='".$VLdtCamp64."' ,";
	$Query9.=$VLQryCampo65."='".$VLdtCamp65."' ,";
	$Query9.=$VLQryCampo66."='".$VLdtCamp66."' ,";
	$Query9.=$VLQryCampo67."='".$VLdtCamp67."' ,";
	$Query9.=$VLQryCampo68."='".$VLdtCamp68."' ,";
	$Query9.=$VLQryCampo69."='".$VLdtCamp69."' ,";
	$Query9.=$VLQryCampo70."='".$VLdtCamp70."' ";
	$Query9.= $VLQry12;
	execute_query($Query9,$VLConexion);
/// actualizamos datos de academicos
	$Query10 = $VLQry10;
	$Query10.=$VLQryCampo71."='".$VLdtCamp71."' ,";
	$Query10.=$VLQryCampo72."='".$VLdtCamp72."' ,";
	$Query10.=$VLQryCampo73."='".$VLdtCamp73."' ,";
	$Query10.=$VLQryCampo74."='".$VLdtCamp74."' ,";
	$Query10.=$VLQryCampo75."='".$VLdtCamp75."' ,";
	$Query10.=$VLQryCampo76."='".$VLdtCamp76."' ,";
	$Query10.=$VLQryCampo77."='".$VLdtCamp77."' ,";
	$Query10.=$VLQryCampo78."='".$VLdtCamp78."' ,";
	$Query10.=$VLQryCampo79."='".$VLdtCamp79."' ";
	$Query10.= $VLQry12;
	execute_query($Query10,$VLConexion);
/// actualizamos datos de historia vital
	$Query11 = $VLQry11;
	$Query11.=$VLQryCampo80."='".$VLdtCamp80."' ,";
	$Query11.=$VLQryCampo81."='".$VLdtCamp81."' ,";
	$Query11.=$VLQryCampo82."='".$VLdtCamp82."' ,";
	$Query11.=$VLQryCampo83."='".$VLdtCamp83."' ,";
	$Query11.=$VLQryCampo84."='".$VLdtCamp84."' ,";
	$Query11.=$VLQryCampo85."='".$VLdtCamp85."' ,";
	$Query11.=$VLQryCampo86."='".$VLdtCamp86."' ,";
	$Query11.=$VLQryCampo87."='".$VLdtCamp87."' ,";
	$Query11.=$VLQryCampo88."='".$VLdtCamp88."' ,";
	$Query11.=$VLQryCampo89."='".$VLdtCamp89."' ,";
	$Query11.=$VLQryCampo90."='".$VLdtCamp90."' ,";
	$Query11.=$VLQryCampo91."='".$VLdtCamp91."' ,";
	$Query11.=$VLQryCampo92."='".$VLdtCamp92."' ,";
	$Query11.=$VLQryCampo93."='".$VLdtCamp93."' ,";
	$Query11.=$VLQryCampo94."='".$VLdtCamp94."' ,";
	$Query11.=$VLQryCampo95."='".$VLdtCamp95."' ,";
	$Query11.=$VLQryCampo96."='".$VLdtCamp96."' ,";
	$Query11.=$VLQryCampo97."='".$VLdtCamp97."' ,";
	$Query11.=$VLQryCampo98."='".$VLdtCamp98."' ,";
	$Query11.=$VLQryCampo99."='".$VLdtCamp99."' ,";
	$Query11.=$VLQryCampo100."='".$VLdtCamp100."' ,";
	$Query11.=$VLQryCampo101."='".$VLdtCamp101."' ,";
	$Query11.=$VLQryCampo102."='".$VLdtCamp102."' ,";
	$Query11.=$VLQryCampo103."='".$VLdtCamp103."' ,";
	$Query11.=$VLQryCampo104."='".$VLdtCamp104."' ,";
	$Query11.=$VLQryCampo105."='".$VLdtCamp105."' ,";
	$Query11.=$VLQryCampo106."='".$VLdtCamp106."' ,";
	$Query11.=$VLQryCampo107."='".$VLdtCamp107."' ,";
	$Query11.=$VLQryCampo108."='".$VLdtCamp108."' ,";
	$Query11.=$VLQryCampo109."='".$VLdtCamp109."' ,";
	$Query11.=$VLQryCampo110."='".$VLdtCamp110."' ,";
	$Query11.=$VLQryCampo111."='".$VLdtCamp111."' ";
	$Query11.= $VLQry12;
	execute_query($Query11,$VLConexion);


//$VLdtDatos = execute_query($Query1,$VLConexion);

}
*/

$Query1 = $VLQry1;
$VLdtDatos1 = execute_query($Query1,$VLConexion);
$VLnuDatos1 = total_records($VLdtDatos1);
if ( $VLnuDatos1>0 )
{
				//$VLdtCamp1=get_result($VLdtDatos1,0,$VLQryCampo1);
				$VLdtCamp2=get_result($VLdtDatos1,0,$VLQryCampo2);
				$VLdtCamp3=get_result($VLdtDatos1,0,$VLQryCampo3);
				$VLdtCamp4=get_result($VLdtDatos1,0,$VLQryCampo4);
				$VLdtCamp5=get_result($VLdtDatos1,0,$VLQryCampo5);
				$VLdtCamp5a=get_result($VLdtDatos1,0,"persexo");
				$VLdtCamp5b=get_result($VLdtDatos1,0,"perraza");
				$VLdtCamp5c=get_result($VLdtDatos1,0,"pernacionalidad");
				$VLdtCamp5d=get_result($VLdtDatos1,0,"perdireccion");
				$VLdtCamp5e=get_result($VLdtDatos1,0,"persector");
				$VLdtCamp5f=get_result($VLdtDatos1,0,"perparroquia");
				$VLdtCamp5g=get_result($VLdtDatos1,0,"pertelefono");
}

$Query2 = $VLQry2;
$VLdtDatos2 = execute_query($Query2,$VLConexion);
$VLnuDatos2 = total_records($VLdtDatos2);
if ( $VLnuDatos2>0 )
{
				$VLdtCamp6=get_result($VLdtDatos2,0,$VLQryCampo6);
				$VLdtCamp7=get_result($VLdtDatos2,0,$VLQryCampo7);
				$VLdtCamp8=get_result($VLdtDatos2,0,$VLQryCampo8);
				$VLdtCamp9=get_result($VLdtDatos2,0,$VLQryCampo9);
				$VLdtCamp10=get_result($VLdtDatos2,0,$VLQryCampo10);
				$VLdtCamp11=get_result($VLdtDatos2,0,$VLQryCampo11);
				$VLdtCamp12=get_result($VLdtDatos2,0,$VLQryCampo12);
				$VLdtCamp13=get_result($VLdtDatos2,0,$VLQryCampo13);
				$VLdtCamp14=get_result($VLdtDatos2,0,$VLQryCampo14);				
}
if ( $VLnuDatos2>1 )
{
				$VLdtCamp15=get_result($VLdtDatos2,1,$VLQryCampo15);
				$VLdtCamp16=get_result($VLdtDatos2,1,$VLQryCampo16);
				$VLdtCamp17=get_result($VLdtDatos2,1,$VLQryCampo17);
				$VLdtCamp18=get_result($VLdtDatos2,1,$VLQryCampo18);
				$VLdtCamp19=get_result($VLdtDatos2,1,$VLQryCampo19);
				$VLdtCamp20=get_result($VLdtDatos2,1,$VLQryCampo20);
				$VLdtCamp21=get_result($VLdtDatos2,1,$VLQryCampo21);
				$VLdtCamp22=get_result($VLdtDatos2,1,$VLQryCampo22);
				$VLdtCamp23=get_result($VLdtDatos2,1,$VLQryCampo23);
}
if ( $VLnuDatos2>2 )
{
				$VLdtCamp24=get_result($VLdtDatos2,2,$VLQryCampo24);
				$VLdtCamp25=get_result($VLdtDatos2,2,$VLQryCampo25);
				$VLdtCamp26=get_result($VLdtDatos2,2,$VLQryCampo26);
				$VLdtCamp27=get_result($VLdtDatos2,2,$VLQryCampo27);
				$VLdtCamp28=get_result($VLdtDatos2,2,$VLQryCampo28);
				$VLdtCamp29=get_result($VLdtDatos2,2,$VLQryCampo29);
				$VLdtCamp30=get_result($VLdtDatos2,2,$VLQryCampo30);
				$VLdtCamp31=get_result($VLdtDatos2,2,$VLQryCampo31);
				$VLdtCamp32=get_result($VLdtDatos2,2,$VLQryCampo32);
}

$Query3 = $VLQry3;
$VLdtDatos3 = execute_query($Query3,$VLConexion);
$VLnuDatos3 = total_records($VLdtDatos3);
if ( $VLnuDatos3>0 )
{
				$VLdtCamp33=get_result($VLdtDatos3,0,$VLQryCampo33);
				$VLdtCamp34=get_result($VLdtDatos3,0,$VLQryCampo34);
				$VLdtCamp35=get_result($VLdtDatos3,0,$VLQryCampo35);
				$VLdtCamp36=get_result($VLdtDatos3,0,$VLQryCampo36);
				$VLdtCamp37=get_result($VLdtDatos3,0,$VLQryCampo37);
				$VLdtCamp38=get_result($VLdtDatos3,0,$VLQryCampo38);
				$VLdtCamp39=get_result($VLdtDatos3,0,$VLQryCampo39);
				$VLdtCamp40=get_result($VLdtDatos3,0,$VLQryCampo40);
				$VLdtCamp41=get_result($VLdtDatos3,0,$VLQryCampo41);
				$VLdtCamp42=get_result($VLdtDatos3,0,$VLQryCampo42);
				$VLdtCamp43=get_result($VLdtDatos3,0,$VLQryCampo43);
				$VLdtCamp44=get_result($VLdtDatos3,0,$VLQryCampo44);
				$VLdtCamp45=get_result($VLdtDatos3,0,$VLQryCampo45);
				$VLdtCamp46=get_result($VLdtDatos3,0,$VLQryCampo46);
				$VLdtCamp47=get_result($VLdtDatos3,0,$VLQryCampo47);
				$VLdtCamp48=get_result($VLdtDatos3,0,$VLQryCampo48);
				$VLdtCamp49=get_result($VLdtDatos3,0,$VLQryCampo49);
				$VLdtCamp50=get_result($VLdtDatos3,0,$VLQryCampo50);
				$VLdtCamp51=get_result($VLdtDatos3,0,$VLQryCampo51);
				$VLdtCamp52=get_result($VLdtDatos3,0,$VLQryCampo52);
				$VLdtCamp53=get_result($VLdtDatos3,0,$VLQryCampo53);
				$VLdtCamp54=get_result($VLdtDatos3,0,$VLQryCampo54);
				$VLdtCamp55=get_result($VLdtDatos3,0,$VLQryCampo55);
				$VLdtCamp56=get_result($VLdtDatos3,0,$VLQryCampo56);
				$VLdtCamp57=get_result($VLdtDatos3,0,$VLQryCampo57);
				$VLdtCamp58=get_result($VLdtDatos3,0,$VLQryCampo58);
				$VLdtCamp59=get_result($VLdtDatos3,0,$VLQryCampo59);
				$VLdtCamp60=get_result($VLdtDatos3,0,$VLQryCampo60);
}

$Query4 = $VLQry4;
$VLdtDatos4 = execute_query($Query4,$VLConexion);
$VLnuDatos4 = total_records($VLdtDatos4);
if ( $VLnuDatos4>0 )
{
				$VLdtCamp61=get_result($VLdtDatos4,0,$VLQryCampo61);
				$VLdtCamp62=get_result($VLdtDatos4,0,$VLQryCampo62);
				$VLdtCamp63=get_result($VLdtDatos4,0,$VLQryCampo63);
				$VLdtCamp64=get_result($VLdtDatos4,0,$VLQryCampo64);
				$VLdtCamp65=get_result($VLdtDatos4,0,$VLQryCampo65);
				$VLdtCamp66=get_result($VLdtDatos4,0,$VLQryCampo66);
				$VLdtCamp67=get_result($VLdtDatos4,0,$VLQryCampo67);
				$VLdtCamp68=get_result($VLdtDatos4,0,$VLQryCampo68);
				$VLdtCamp69=get_result($VLdtDatos4,0,$VLQryCampo69);
				$VLdtCamp70=get_result($VLdtDatos4,0,$VLQryCampo70);
}

$Query5 = $VLQry5;
$VLdtDatos5 = execute_query($Query5,$VLConexion);
$VLnuDatos5 = total_records($VLdtDatos5);
if ( $VLnuDatos5>0 )
{
				$VLdtCamp71=get_result($VLdtDatos5,0,$VLQryCampo71);
				$VLdtCamp72=get_result($VLdtDatos5,0,$VLQryCampo72);
				$VLdtCamp73=get_result($VLdtDatos5,0,$VLQryCampo73);
				$VLdtCamp74=get_result($VLdtDatos5,0,$VLQryCampo74);
				$VLdtCamp75=get_result($VLdtDatos5,0,$VLQryCampo75);
				$VLdtCamp76=get_result($VLdtDatos5,0,$VLQryCampo76);
				$VLdtCamp77=get_result($VLdtDatos5,0,$VLQryCampo77);
				$VLdtCamp78=get_result($VLdtDatos5,0,$VLQryCampo78);
				$VLdtCamp79=get_result($VLdtDatos5,0,$VLQryCampo79);
}

$Query6 = $VLQry6;
$VLdtDatos6 = execute_query($Query6,$VLConexion);
$VLnuDatos6 = total_records($VLdtDatos6);
if ( $VLnuDatos6>0 )
{
				$VLdtCamp80=get_result($VLdtDatos6,0,$VLQryCampo80);
				$VLdtCamp81=get_result($VLdtDatos6,0,$VLQryCampo81);
				$VLdtCamp82=get_result($VLdtDatos6,0,$VLQryCampo82);
				$VLdtCamp83=get_result($VLdtDatos6,0,$VLQryCampo83);
				$VLdtCamp84=get_result($VLdtDatos6,0,$VLQryCampo84);
				$VLdtCamp85=get_result($VLdtDatos6,0,$VLQryCampo85);
				$VLdtCamp86=get_result($VLdtDatos6,0,$VLQryCampo86);
				$VLdtCamp87=get_result($VLdtDatos6,0,$VLQryCampo87);
				$VLdtCamp88=get_result($VLdtDatos6,0,$VLQryCampo88);
				$VLdtCamp89=get_result($VLdtDatos6,0,$VLQryCampo89);
				$VLdtCamp90=get_result($VLdtDatos6,0,$VLQryCampo90);
				$VLdtCamp91=get_result($VLdtDatos6,0,$VLQryCampo91);
				$VLdtCamp92=get_result($VLdtDatos6,0,$VLQryCampo92);
				$VLdtCamp93=get_result($VLdtDatos6,0,$VLQryCampo93);
				$VLdtCamp94=get_result($VLdtDatos6,0,$VLQryCampo94);
				$VLdtCamp95=get_result($VLdtDatos6,0,$VLQryCampo95);
				$VLdtCamp96=get_result($VLdtDatos6,0,$VLQryCampo96);
				$VLdtCamp97=get_result($VLdtDatos6,0,$VLQryCampo97);
				$VLdtCamp98=get_result($VLdtDatos6,0,$VLQryCampo98);
				$VLdtCamp99=get_result($VLdtDatos6,0,$VLQryCampo99);
				$VLdtCamp100=get_result($VLdtDatos6,0,$VLQryCampo100);
				$VLdtCamp101=get_result($VLdtDatos6,0,$VLQryCampo101);
				$VLdtCamp102=get_result($VLdtDatos6,0,$VLQryCampo102);
				$VLdtCamp103=get_result($VLdtDatos6,0,$VLQryCampo103);
				$VLdtCamp104=get_result($VLdtDatos6,0,$VLQryCampo104);
				$VLdtCamp105=get_result($VLdtDatos6,0,$VLQryCampo105);
				$VLdtCamp106=get_result($VLdtDatos6,0,$VLQryCampo106);
				$VLdtCamp107=get_result($VLdtDatos6,0,$VLQryCampo107);
				$VLdtCamp108=get_result($VLdtDatos6,0,$VLQryCampo108);
				$VLdtCamp109=get_result($VLdtDatos6,0,$VLQryCampo109);
				$VLdtCamp110=get_result($VLdtDatos6,0,$VLQryCampo110);
				$VLdtCamp111=get_result($VLdtDatos6,0,$VLQryCampo111);
				
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REGISTRO ACUMULATIVO GENERAL</title>
</head>

<body>
<form id="RAG" name="RAG" method="get" action="">

<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagenes/membrete2.png" width="779" height="142" /></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" ><span class="fuente"><font size="4"  >REGISTRO ACUMULATIVO GENERAL</font> </span></td>
  </tr>
  <tr>
    <td align="center"><font size="3"  > AÑO LECTIVO <?=$VLdtPeriodo; ?> </font> </td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<table width="100%" border="1" cellspacing="0" cellpadding="0" >
  <tr>
    <td>DATOS DEL ESTUDIANTE 
        <input type="hidden" name="txt_Camp1" id="txt_Camp1" value="<?=$VLdtCamp1; ?>" /><input type="hidden" name="nlctv" id="nlctv" value="<?=$VLAnoLocal; ?>" /></td>
  </tr>
  <tr>
    <td width="85%">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="30%">Apellidos y Nombres:</td>
            <td><?=$VLdtCamp2." ".$VLdtCamp3; ?></td>
          </tr>
          <tr>
            <td>Sexo:   <?=$VLdtCamp5a; ?></td>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="50%">Raza:   <?=$VLdtCamp5b; ?> </td>
                    <td width="50%">Nacionalidad:   <?=$VLdtCamp5c; ?></td>
                  </tr>
                </table>
            </td>
          </tr>
          <tr>
            <td>Lugar y fecha de nacimiento</td>
            <td><?=$VLdtCamp4." ".$VLdtCamp5; ?></td>
          </tr>
          <tr>
            <td>Direccion:</td>
            <td><?=$VLdtCamp5d; ?></td>
          </tr>
          <tr>
            <td>sector: <?=$VLdtCamp5e; ?></td>
            <td align="center">Parroquia: <?=$VLdtCamp5f; ?></td>
          </tr>
          <tr>
            <td>Telefonos:</td>
            <td><?=$VLdtCamp5g; ?></td>
          </tr>
        </table>
            </td>
          </tr>
        </table>    
	</td>
    <td width="15%"><img src="imagenes/foto.jpg" width="143" height="160" /></td>
  </tr>
</table>


    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
<table width="100%" border="1" cellspacing="0" cellpadding="1" >
  <tr>
    <td>
    2 DATOS FAMILIARES
    </td>
  </tr>
<tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td width="5%"><input type="hidden" name="txt_Camp6" id="txt_Camp6" value="<?=$VLdtCamp6; ?>" /><?=$VLdtCamp7; ?></td>
    <td width="56%"><?=$VLdtCamp8." ".$VLdtCamp9; ?></td>
    <td width="18%">Est. Civil<?=$VLdtCamp11; ?></td>
    <td width="20%">Fecha N.<?=$VLdtCamp10; ?></td>
  </tr>
  <tr>
    <td>Instrucción:<?=$VLdtCamp12; ?></td>
    <td align="center">Profes/Ocupacion:<?=$VLdtCamp13; ?></td>
    <td>Lugar de Trabajo</td>
    <td><?=$VLdtCamp14; ?></td>
  </tr>
</table>
    </td>
  </tr>
<tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td width="5%"><?=$VLdtCamp16; ?><input type="hidden" name="txt_Camp15" id="txt_Camp15" value="<?=$VLdtCamp15; ?>" /></td>
    <td width="56%"><?=$VLdtCamp17." ".$VLdtCamp18; ?></td>
    <td width="18%">Est. Civil<?=$VLdtCamp20; ?></td>
    <td width="20%">Fecha N.<?=$VLdtCamp19; ?></td>
  </tr>
  <tr>
    <td>Instrucción:<?=$VLdtCamp21; ?></td>
    <td align="center">Profes/Ocupacion:<?=$VLdtCamp22; ?></td>
    <td>Lugar de Trabajo</td>
    <td><?=$VLdtCamp23; ?></td>
  </tr>
</table>
    </td>
  </tr>
<tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td width="5%"><?=$VLdtCamp25; ?><input type="hidden" name="txt_Camp24" id="txt_Camp24" value="<?=$VLdtCamp24; ?>" /></td>
    <td width="56%"><?=$VLdtCamp26." ".$VLdtCamp27; ?></td>
    <td width="18%">Est. Civil<?=$VLdtCamp29; ?></td>
    <td width="20%">Fecha N.<?=$VLdtCamp28; ?></td>
  </tr>
  <tr>
    <td>Instrucción:<?=$VLdtCamp30; ?></td>
    <td align="center">Profes/Ocupacion:<?=$VLdtCamp31; ?></td>
    <td>Lugar de Trabajo</td>
    <td><?=$VLdtCamp32; ?></td>
  </tr>
</table>
    </td>
  </tr>  
</table>
    
    </td>
  </tr>  
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
<table width="100%" border="1" cellspacing="1" cellpadding="1" >
  <tr>
    <td>3 REFERENCIAS FAMILIARES</td>
  </tr>
  <TR>
  	<td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>Personas con quien vive el estudiante (especificar todas las personas que conforman la estructura familiar)</td>
  </tr>
  <tr>
    <td><?=$VLdtCamp33; ?>&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right">No. hermanos: </td>
    <td align="left"><?=$VLdtCamp34; ?>&nbsp;</td>
    <td align="right">No. hermanas: </td>
    <td align="left"><?=$VLdtCamp35; ?>&nbsp;</td>
    <td align="right">Lugar que ocupa: </td>
    <td align="left"><?=$VLdtCamp36; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Especificar edades</td>
    <td><?=$VLdtCamp37; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td>Nombre de hermanos/as que estudien en la institucion y edades</td>
  </tr>
  <tr>
    <td align="center"><?=$VLdtCamp38; ?>&nbsp</td>
  </tr>
</table> 
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Descripcion de la estructura familiar</td>
  </tr>
  <tr>
    <td ><?=$VLdtCamp39; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%">Familiares con algun tipo de discapacidad</td>
    <td><?=$VLdtCamp40; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
    <tr>
    <td>Determinar quién</td>
  </tr>
  <tr>
    <td><?=$VLdtCamp41; ?>&nbsp;</td>
  </tr>

  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Observaciones:</td>
  </tr>
  <tr>
    <td><?=$VLdtCamp42; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>


	</table>

    </td>
  </TR>
  <tr>
    <td>REFERENCIAS SOCIOECONÓMICAS GENERALES</td>
  </tr>
  <tr>
  	<td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td>Ingresos/Egresos de los miebros de la familia</td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>INGRESO PADRE</td>
    <td><input name="txt_Camp43" type="text" id="txt_Camp43" size="10" maxlength="10" value="<?=$VLdtCamp43; ?>" disabled="disabled"></td>
    <td>EGRESO PADRE</td>
    <td><input name="txt_Camp44" type="text" id="txt_Camp44" size="10" maxlength="10" value="<?=$VLdtCamp44; ?>" disabled="disabled"></td>
  </tr>
  <tr>
    <td>INGRESO MADRE</td>
    <td><input name="txt_Camp45" type="text" id="txt_Camp45" size="10" maxlength="10" value="<?=$VLdtCamp45; ?>" disabled="disabled"></td>
    <td>EGRESO MADRE</td>
    <td><input name="txt_Camp46" type="text" id="txt_Camp46" size="10" maxlength="10" value="<?=$VLdtCamp46; ?>" disabled="disabled"></td>
  </tr>
  <tr>
    <td>INGRESO OTROS</td>
    <td><input name="txt_Camp47" type="text" id="txt_Camp47" size="10" maxlength="10" value="<?=$VLdtCamp47; ?>" disabled="disabled"></td>
    <td>EGRESO TOTAL</td>
    <td><input name="txt_Camp48" type="text" id="txt_Camp48" size="10" maxlength="10" value="<?=$VLdtCamp48; ?>" disabled="disabled"></td>
  </tr>
</table>
    
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="30%">Condiciones de la Vivienda</td>
    <td align="left"> <?=$VLdtCamp49; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>Servicios:</td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right">Luz eléctrica: <?=$VLdtCamp50; ?>&nbsp; </td>
    <td align="right">Agua Potable: <?=$VLdtCamp51; ?>&nbsp;</td>
    <td align="right">SSHH: <?=$VLdtCamp52; ?>&nbsp;</td>
    <td align="right">Pozo séptico: <?=$VLdtCamp53; ?>&nbsp;</td>
    <td align="right">Teléfono: <?=$VLdtCamp54; ?>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">cable: <?=$VLdtCamp55; ?>&nbsp;</td>
    <td align="right">celular: <?=$VLdtCamp56; ?>&nbsp;</td>
    <td align="right">Computador: <?=$VLdtCamp57; ?>&nbsp;</td>
    <td align="right">Internet: <?=$VLdtCamp58; ?>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Breve descripción de la vivienda (casa, departamento,cuarto, etc)</td>
  </tr>
  <tr>
    <td><?=$VLdtCamp59; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Observaciones:</td>
  </tr>
  <tr>
    <td><?=$VLdtCamp60; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
</table>
    </td>
  </tr>
	</table>

    </td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <tr>
    <td>
<table width="100%" border="1" cellspacing="1" cellpadding="1" >
  <tr>
    <td>4 DATOS DE SALUD</td>
  </tr>
  <tr><td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="50%">El estudiante tiene algún tipo de discapacidad:</td>
    <td><?=$VLdtCamp61; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%">Determinar cuál</td>
    <td align="center"><?=$VLdtCamp62; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%">El estudiante tiene alguna condición médica específica:</td>
    <td><?=$VLdtCamp63; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%">Determinar cuál</td>
    <td align="center"><?=$VLdtCamp64; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%">El estudiante padece de alergias:</td>
    <td><?=$VLdtCamp65; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%">Determinar cuales:</td>
    <td align="center"><?=$VLdtCamp66; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%">Especificar medicamentos que utiliza</td>
    <td align="center"><?=$VLdtCamp67; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%">El estudiante recibe atención médica en:</td>
    <td><?=$VLdtCamp68; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
  
<tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%">Nombre del/la médico/a que atiende regularmente al estudiante</td>
    <td align="center"><?=$VLdtCamp69; ?>&nbsp;</td>
  </tr>
</table>
    </td>
</tr>
  <tr>
    <td>Observaciones:</td>
  </tr>
  <tr>
    <td align="center"><?=$VLdtCamp70; ?>&nbsp;</td>
  </tr>
</table>
    </td>
  </tr>
</table>
  </td></tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="1" cellpadding="1">
      <tr>
        <td>5 DATOS ACADEMICOS/ RENDIMIENTO ESCOLAR</td>
      </tr>
      <tr>
        <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="41%" align="right">Fecha de ingreso a la institución (aa-mm-dd-):</td>
                <td align="center"><?=$VLdtCamp71; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="41%" align="right" width="37%">Institución de la que procede:</td>
                <td align="center"><?=$VLdtCamp72; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
            </td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td>5.1 DATOS ACADÉMICOS</td>
      </tr>
      <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
            
<table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="right" width="37%">Asignaturas de preferencia del estudiante:</td>
    		<td align="center"><?=$VLdtCamp73; ?>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="right" width="37%">Asignaturas en las que ha tenido dificultades:</td>
    		<td align="center"><?=$VLdtCamp74; ?>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="right" width="37%">Dignidades alcanzadas:</td>
    		<td align="center"><?=$VLdtCamp75; ?>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="right" width="37%">Logros académicos:</td>
    		<td align="center"><?=$VLdtCamp76; ?>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="right" width="37%">Participación en:</td>
    		<td align="center"><?=$VLdtCamp77; ?>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="right" width="37%">Clubes:</td>
    		<td align="center"><?=$VLdtCamp78; ?>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="right" width="37%">Extracurriculares:</td>
    		<td align="center"><?=$VLdtCamp79; ?>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table>                
                </td>
              </tr>
            </table>

  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
<table width="100%" border="1" cellspacing="1" cellpadding="1" >
  <tr>
    <td>6 HISTORIA VITAL</td>
  </tr>
  <tr>
    <td>6.1 Embarazo y Parto</td>
  </tr>
  <tr>
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="35%" align="right">Edad de la madre:</td>
                    <td><?=$VLdtCamp80; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="35%" align="right">Accidentes en el embarazo:</td>
                <td><?=$VLdtCamp81; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="35%" align="right">Medicamentos durante el embarazo:</td>
                <td><?=$VLdtCamp82; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td align="right">Al término: </td>
                <td align="left"><?=$VLdtCamp83; ?>&nbsp;</td>
                <td align="right">Prematuro: </td>
                <td align="left"><?=$VLdtCamp84; ?>&nbsp;</td>
                <td align="right">Cesarea: </td>
                <td align="left"><?=$VLdtCamp85; ?>&nbsp;</td>
                <td align="right">P. Normal: </td>
                <td align="left"><?=$VLdtCamp86; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="65%">Especificar Cualquier dificultad en el embarazo ( preclansia, hipoxia, etc... )</td>
                <td align="left"><?=$VLdtCamp87; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table>
    </td>
  </tr>
  <tr>
    <td>6.2 Datos del/la niño/a recién nacido:</td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right" width="20%">Peso al nacer (lb): </td>
        <td align="left" width="10%"><?=$VLdtCamp88; ?>&nbsp;</td>
        <td align="right" width="20%">Talla al nacer (mm): </td>
        <td align="left" width="10%"><?=$VLdtCamp89; ?>&nbsp;</td>
        <td align="right" width="20%">Edad caminó: </td>
        <td align="left" width="10%"><?=$VLdtCamp90; ?>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right" width="20%">edad fin lactancia: </td>
        <td align="left" width="10%"><?=$VLdtCamp91; ?>&nbsp;</td>
        <td align="right" width="20%">edad fin biberón: </td>
        <td align="left" width="10%"><?=$VLdtCamp92; ?>&nbsp;</td>
        <td align="right" width="20%">Edad contr. esfinteres: </td>
        <td align="left" width="10%"><?=$VLdtCamp93; ?>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
    </td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>6.3 Enfermedades ( desde la infancia hasta la actualidad)</td>
  </tr>
  <tr>
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="35%" align="right">Enfermedades: </td>
                <td><?=$VLdtCamp94; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="35%" align="right">Accidentes: </td>
                <td><?=$VLdtCamp95; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="35%" align="right">Alergias: </td>
                <td><?=$VLdtCamp96; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="35%" align="right">Cirugías: </td>
                <td><?=$VLdtCamp97; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="35%" align="right">Pérdidas de conocimiento: </td>
                <td><?=$VLdtCamp98; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="35%" align="right">Otros: </td>
                <td><?=$VLdtCamp99; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table>
    </td>
  </tr>
  <tr>
    <td>6.4 Antecedentes patológicos familiares:</td>
  </tr>
  <tr>
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="20%" align="right">Obesidad : </td>
                <td><?=$VLdtCamp100; ?>&nbsp;</td>
                <td width="20%" align="right">Enf. Cardiacas : </td>
                <td><?=$VLdtCamp101; ?>&nbsp;</td>       
                <td width="20%" align="right">Hipertensión : </td>
                <td><?=$VLdtCamp102; ?>&nbsp;</td>
              </tr>
              <tr>
                <td width="20%" align="right">Diabetes : </td>
                <td><?=$VLdtCamp103; ?>&nbsp;</td>
                <td width="20%" align="right">Enf. Mentales : </td>
                <td><?=$VLdtCamp104; ?>&nbsp;</td>
                <td width="20%" align="right">Otros : </td>
                <td><?=$VLdtCamp105; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table>
    </td>
  </tr>
  <tr>
    <td>6.5 Cómo describiría la relación del/la estudiante con:</td>
  </tr>
  <tr>
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td align="right" width="35%">Padre : </td>
                <td><?=$VLdtCamp106; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td align="right" width="35%">Madre : </td>
                <td><?=$VLdtCamp107; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td align="right" width="35%">Hermanos/as : </td>
                <td><?=$VLdtCamp108; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td align="right" width="35%">Otros: </td>
                <td><?=$VLdtCamp109; ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table>
    </td>
  </tr>
  <tr>
    <td>Observaciones</td>
  </tr>
  <tr>
        <td align="center"><?=$VLdtCamp110; ?>&nbsp;</td>
  </tr>
  <tr>
    <td>6.6 Costumbes, describa hábitos ( alimenticios - sueño ), act. tiempo libre, tareas realiza a diario</td>
  </tr>
  <tr>
        <td align="center"><?=$VLdtCamp111; ?>&nbsp;</td>
  </tr>
</table>
    
    </td>
  </tr>
</table>
      </form></td>

</body>
</html>
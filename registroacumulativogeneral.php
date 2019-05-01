
<?php 

require "cnxn_bsddts/mnjdr_bsdts.php";
header('Content-Type: text/html; charset=UTF-8');
$VLConexion=connect();


$VLGuardar=$_GET[guardar_x];
$VLAnoLocal=$_GET[nlctv];
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






$Query = "Select * from nlctv where anocodigo= ".$VLAnoLocal;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if ( $VLnuDatos>0 )
{
				$VLdtPeriodo=get_result($VLdtDatos,0,"anodescripcion");
}


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
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="10%"><a href="repacumulativogeneral.php?nlctv=<?=$VLAnoLocal; ?>&nsttcn=<?=$VLInstitucion; ?>&txt_Camp1=<?=$VLdtCamp1; ?>"><img src="imagenes/Print_48x48-32.gif" width="24" height="24" /></a></td>
    <td width="10%">&nbsp;</td>
    <td width="40%"><input name="guardar" type="image" id="guardar" onclick="sumit" src="imagenes/Floppy%20Disk%20Blue_24x24-32.gif" alt="Guardar" width="24" height="24" border="0" value="guardar" /></td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#CCFFFF">
  <tr>
    <td>DATOS DEL ESTUDIANTE 
        <input type="hidden" name="txt_Camp1" id="txt_Camp1" value="<?=$VLdtCamp1; ?>" /><input type="hidden" name="nlctv" id="nlctv" value="<?=$VLAnoLocal; ?>" /></td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Apellidos y Nombres</td>
    <td><?=$VLdtCamp2." ".$VLdtCamp3; ?></td>
  </tr>
  <tr>
    <td>Lugar y fecha de nacimiento</td>
    <td><?=$VLdtCamp4." ".$VLdtCamp5; ?></td>
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
<table width="100%" border="0" cellspacing="0" cellpadding="1" bgcolor="#CCCCFF">
  <tr>
    <td>
    2 DATOS FAMILIARES
    </td>
  </tr>
<tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td width="10%">Parentezco<input type="hidden" name="txt_Camp6" id="txt_Camp6" value="<?=$VLdtCamp6; ?>" /></td>
    <td width="20%">
<select name="txt_Camp7" disabled="disabled">
									<option  value="ABUELO" <?php if ( $VLdtCamp7 == "ABUELO") {?> selected <?php }?>>ABUELO</option>
									<option  value="BISABUELO" <?php if ( $VLdtCamp7 == "BISABUELO") {?> selected <?php }?>>BISABUELO</option>
                                    <option  value="ADOPTIVA" <?php if ( $VLdtCamp7 == "ADOPTIVA") {?> selected <?php }?>>ADOPTIVA</option>
                                    <option  value="CRIANZA" <?php if ( $VLdtCamp7 == "CRIANZA") {?> selected <?php }?>>CRIANZA</option>
									<option  value="MADRE" <?php if ( $VLdtCamp7 == "MADRE") {?> selected <?php }?>>MADRE</option>
									<option  value="MADRASTRA" <?php if ( $VLdtCamp7 == "MADRASTRA") {?> selected <?php }?>>MADRASTRA</option>
                                    <option  value="HERMANO" <?php if ( $VLdtCamp7 == "HERMANO") {?> selected <?php }?>>HERMANO</option>
                                    <option value="PADRE" <?php if ( $VLdtCamp7 == "PADRE") {?> selected <?php }?>>PADRE</option>
                                    <option value="PADRASTRO" <?php if ( $VLdtCamp7 == "PADRASTRO") {?> selected <?php }?>>PADRASTRO</option>
                                    <option  value="PRIMO" <?php if ( $VLdtCamp7 == "PRIMO") {?> selected <?php }?>>PRIMO</option>
                                    <option  value="TIO" <?php if ( $VLdtCamp7 == "TIO") {?> selected <?php }?>>TIO</option>
                                    <option  value="TUTOR" <?php if ( $VLdtCamp7 == "TUTOR") {?> selected <?php }?>>TUTOR</option>
                                    <option  value="OTRO" <?php if ( $VLdtCamp7 == "OTRO") {?> selected <?php }?>>OTRO</option>
									</select>    
    </td>
    <td width="10%">Apellidos:</td>
    <td width="20%"><input name="txt_Camp8" type="text" id="txt_Camp8" size="25" maxlength="45" value="<?=$VLdtCamp8; ?>" disabled="disabled"></td>
    <td width="10%">Nombres:</td>
    <td width="20%"><input name="txt_Camp9" type="text" id="txt_Camp9" size="25" maxlength="45" value="<?=$VLdtCamp9; ?>"  disabled="disabled"></td>
  </tr>
  <tr>
    <td>Fecha N. aa-mm-dd</td>
    <td><input name="txt_Camp10" type="text" id="txt_Camp10" size="15" maxlength="45" value="<?=$VLdtCamp10; ?>" disabled="disabled"></td>
    <td>Estado Civil</td>
    <td>
    <select name="txt_Camp11" disabled="disabled">
                <option value="CASADO" <?php if ( $VLdtCamp11 == "CASADO") {?> selected <?php }?>>CASADO</option>
                <option  value="SOLTERO" <?php if ( $VLdtCamp11 == "SOLTERO") {?> selected <?php }?>>SOLTERO</option>
                <option value="UNION LIBRE" <?php if ( $VLdtCamp11 == "UNION LIBRE") {?> selected <?php }?>>UNION LIBRE</option>
                <option value="DIVORCIADO" <?php if ( $VLdtCamp11 == "DIVORCIADO") {?> selected <?php }?>>DIVORCIADO</option>
                <option value="VIUDO" <?php if ( $VLdtCamp11 == "VIUDO") {?> selected <?php }?>>VIUDO</option>
                </select>
    
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Instrucción</td>
    <td><input name="txt_Camp12" type="text" id="txt_Camp12" size="15" maxlength="45" value="<?=$VLdtCamp12; ?>"></td>
    <td>Profes/Ocupac</td>
    <td><input name="txt_Camp13" type="text" id="txt_Camp13" size="25" maxlength="45" value="<?=$VLdtCamp13; ?>" disabled="disabled"></td>
    <td>Lugar de Trabajo</td>
    <td><input name="txt_Camp14" type="text" id="txt_Camp14" size="25" maxlength="45" value="<?=$VLdtCamp14; ?>" disabled="disabled" /></td>
  </tr>
</table>
    </td>
  </tr>
<tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td width="10%">Parentezco<input type="hidden" name="txt_Camp15" id="txt_Camp15" value="<?=$VLdtCamp15; ?>" /></td>
    <td width="20%">
<select name="txt_Camp16"  disabled="disabled">
									<option  value="ABUELO" <?php if ( $VLdtCamp16 == "ABUELO") {?> selected <?php }?>>ABUELO</option>
									<option  value="BISABUELO" <?php if ( $VLdtCamp16 == "BISABUELO") {?> selected <?php }?>>BISABUELO</option>
                                    <option  value="ADOPTIVA" <?php if ( $VLdtCamp16 == "ADOPTIVA") {?> selected <?php }?>>ADOPTIVA</option>
                                    <option  value="CRIANZA" <?php if ( $VLdtCamp16 == "CRIANZA") {?> selected <?php }?>>CRIANZA</option>
									<option  value="MADRE" <?php if ( $VLdtCamp16 == "MADRE") {?> selected <?php }?>>MADRE</option>
									<option  value="MADRASTRA" <?php if ( $VLdtCamp16 == "MADRASTRA") {?> selected <?php }?>>MADRASTRA</option>
                                    <option  value="HERMANO" <?php if ( $VLdtCamp16 == "HERMANO") {?> selected <?php }?>>HERMANO</option>
                                    <option value="PADRE" <?php if ( $VLdtCamp16 == "PADRE") {?> selected <?php }?>>PADRE</option>
                                    <option value="PADRASTRO" <?php if ( $VLdtCamp16 == "PADRASTRO") {?> selected <?php }?>>PADRASTRO</option>
                                    <option  value="PRIMO" <?php if ( $VLdtCamp16 == "PRIMO") {?> selected <?php }?>>PRIMO</option>
                                    <option  value="TIO" <?php if ( $VLdtCamp16 == "TIO") {?> selected <?php }?>>TIO</option>
                                    <option  value="TUTOR" <?php if ( $VLdtCamp16 == "TUTOR") {?> selected <?php }?>>TUTOR</option>
                                    <option  value="OTRO" <?php if ( $VLdtCamp16 == "OTRO") {?> selected <?php }?>>OTRO</option>
									</select>    
    </td>
    <td width="10%">Apellidos:</td>
    <td width="20%"><input name="txt_Camp17" type="text" id="txt_Camp17" size="25" maxlength="45" value="<?=$VLdtCamp17; ?>" disabled="disabled"></td>
    <td width="10%">Nombres:</td>
    <td width="20%"><input name="txt_Camp18" type="text" id="txt_Camp18" size="25" maxlength="45" value="<?=$VLdtCamp18; ?>"  disabled="disabled"></td>
  </tr>
  <tr>
    <td>Fecha N. aa-mm-dd</td>
    <td><input name="txt_Camp19" type="text" id="txt_Camp19" size="15" maxlength="45" value="<?=$VLdtCamp19; ?>" disabled="disabled"></td>
    <td>Estado Civil</td>
    <td> <select name="txt_Camp20" disabled="disabled">
                <option value="CASADO" <?php if ( $VLdtCamp20 == "CASADO") {?> selected <?php }?>>CASADO</option>
                <option  value="SOLTERO" <?php if ( $VLdtCamp20 == "SOLTERO") {?> selected <?php }?>>SOLTERO</option>
                <option value="UNION LIBRE" <?php if ( $VLdtCamp20 == "UNION LIBRE") {?> selected <?php }?>>UNION LIBRE</option>
                <option value="DIVORCIADO" <?php if ( $VLdtCamp20 == "DIVORCIADO") {?> selected <?php }?>>DIVORCIADO</option>
                <option value="VIUDO" <?php if ( $VLdtCamp20 == "VIUDO") {?> selected <?php }?>>VIUDO</option>
                </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Instrucción</td>
    <td><input name="txt_Camp21" type="text" id="txt_Camp21" size="15" maxlength="45" value="<?=$VLdtCamp21; ?>"></td>
    <td>Profes/Ocupac</td>
    <td><input name="txt_Camp22" type="text" id="txt_Camp22" size="25" maxlength="45" value="<?=$VLdtCamp22; ?>" disabled="disabled"></td>
    <td>Lugar de Trabajo</td>
    <td><input name="txt_Camp23" type="text" id="txt_Camp23" size="25" maxlength="45" value="<?=$VLdtCamp23; ?>" disabled="disabled"></td>
  </tr>
</table>
    </td>
  </tr>
<tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td width="10%">Parentezco<input type="hidden" name="txt_Camp24" id="txt_Camp24" value="<?=$VLdtCamp24; ?>" /></td>
    <td width="20%">
<select name="txt_Camp25" disabled="disabled">
									<option  value="ABUELO" <?php if ( $VLdtCamp25 == "ABUELO") {?> selected <?php }?>>ABUELO</option>
									<option  value="BISABUELO" <?php if ( $VLdtCamp25 == "BISABUELO") {?> selected <?php }?>>BISABUELO</option>
                                    <option  value="ADOPTIVA" <?php if ( $VLdtCamp25 == "ADOPTIVA") {?> selected <?php }?>>ADOPTIVA</option>
                                    <option  value="CRIANZA" <?php if ( $VLdtCamp25 == "CRIANZA") {?> selected <?php }?>>CRIANZA</option>
									<option  value="MADRE" <?php if ( $VLdtCamp25 == "MADRE") {?> selected <?php }?>>MADRE</option>
									<option  value="MADRASTRA" <?php if ( $VLdtCamp25 == "MADRASTRA") {?> selected <?php }?>>MADRASTRA</option>
                                    <option  value="HERMANO" <?php if ( $VLdtCamp25 == "HERMANO") {?> selected <?php }?>>HERMANO</option>
                                    <option value="PADRE" <?php if ( $VLdtCamp25 == "PADRE") {?> selected <?php }?>>PADRE</option>
                                    <option value="PADRASTRO" <?php if ( $VLdtCamp25 == "PADRASTRO") {?> selected <?php }?>>PADRASTRO</option>
                                    <option  value="PRIMO" <?php if ( $VLdtCamp25 == "PRIMO") {?> selected <?php }?>>PRIMO</option>
                                    <option  value="TIO" <?php if ( $VLdtCamp25 == "TIO") {?> selected <?php }?>>TIO</option>
                                    <option  value="TUTOR" <?php if ( $VLdtCamp25 == "TUTOR") {?> selected <?php }?>>TUTOR</option>
                                    <option  value="OTRO" <?php if ( $VLdtCamp25 == "OTRO") {?> selected <?php }?>>OTRO</option>
									</select>    
    </td>
    <td width="10%">Apellidos:</td>
    <td width="20%"><input name="txt_Camp26" type="text" id="txt_Camp26" size="25" maxlength="45" value="<?=$VLdtCamp26; ?>" disabled="disabled"></td>
    <td width="10%">Nombres:</td>
    <td width="20%"><input name="txt_Camp27" type="text" id="txt_Camp27" size="25" maxlength="45" value="<?=$VLdtCamp27; ?>" disabled="disabled"></td>
  </tr>
  <tr>
    <td>Fecha N. aa-mm-dd</td>
    <td><input name="txt_Camp28" type="text" id="txt_Camp28" size="15" maxlength="45" value="<?=$VLdtCamp28; ?>" disabled="disabled"></td>
    <td>Estado Civil</td>
    <td><input name="txt_Camp29" type="text" id="txt_Camp29" size="15" maxlength="45" value="<?=$VLdtCamp29; ?>" disabled="disabled"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Instrucción</td>
    <td><input name="txt_Camp30" type="text" id="txt_Camp30" size="15" maxlength="45" value="<?=$VLdtCamp30; ?>"></td>
    <td>Profes/Ocupac</td>
    <td><input name="txt_Camp31" type="text" id="txt_Camp31" size="25" maxlength="45" value="<?=$VLdtCamp31; ?>" disabled="disabled"></td>
    <td>Lugar de Trabajo</td>
    <td><input name="txt_Camp31" type="text" id="txt_Camp32" size="25" maxlength="45" value="<?=$VLdtCamp32; ?>" disabled="disabled"></td>
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
<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#99CCFF">
  <tr>
    <td>3 REFERENCIAS FAMILIARES</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>Personas con quien vive el estudiante (especificar todas las personas que conforman la estructura familiar)</td>
  </tr>
  <tr>
    <td><textarea name="txt_Camp33" cols="100" rows="2" id="txt_Camp33"><?=$VLdtCamp33; ?>
    </textarea></td>
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
    <td>No. hermanos</td>
    <td><input name="txt_Camp34" type="text" id="txt_Camp34" size="5" maxlength="5" value="<?=$VLdtCamp34; ?>"></td>
    <td>No. hermanas</td>
    <td><input name="txt_Camp35" type="text" id="txt_Camp35" size="5" maxlength="5" value="<?=$VLdtCamp35; ?>"></td>
    <td>Lugar que ocupa</td>
    <td><input name="txt_Camp36" type="text" id="txt_Camp36" size="5" maxlength="5" value="<?=$VLdtCamp36; ?>"></td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Especificar edades</td>
    <td><input name="txt_Camp37" type="text" id="txt_Camp37" size="80" maxlength="80" value="<?=$VLdtCamp37; ?>"></td>
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
    <td align="center"><input name="txt_Camp38" type="text" id="txt_Camp38" size="100" maxlength="100" value="<?=$VLdtCamp38; ?>"></td>
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
    <td align="center"><textarea name="txt_Camp39" cols="100" rows="2" id="txt_Camp39"><?=$VLdtCamp39; ?>
    </textarea></td>
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
    <td><select name="txt_Camp40">
                <option  value="No" <?php if ( $VLdtCamp40 == "No") {?> selected <?php }?>>No</option>
                <option value="Si" <?php if ( $VLdtCamp40 == "Si") {?> selected <?php }?>>Si</option>
                </select></td>
  </tr>
</table>
    </td>
  </tr>
    <tr>
    <td>Determinar quién</td>
  </tr>
  <tr>
    <td><input name="txt_Camp41" type="text" id="txt_Camp41" size="100" maxlength="150" value="<?=$VLdtCamp41; ?>"></td>
  </tr>

  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Observaciones:</td>
  </tr>
  <tr>
    <td><textarea name="txt_Camp42" cols="100" rows="3" id="txt_Camp42"><?=$VLdtCamp42; ?>
    </textarea></td>
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
    <td>REFERENCIAS SOCIOECONÓMICAS GENERALES</td>
  </tr>
  <tr>
    <td>Ingresos/Egresos de los miebros de la familia</td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>INGRESO PADRE</td>
    <td><input name="txt_Camp43" type="text" id="txt_Camp43" size="10" maxlength="10" value="<?=$VLdtCamp43; ?>"></td>
    <td>EGRESO PADRE</td>
    <td><input name="txt_Camp44" type="text" id="txt_Camp44" size="10" maxlength="10" value="<?=$VLdtCamp44; ?>"></td>
  </tr>
  <tr>
    <td>INGRESO MADRE</td>
    <td><input name="txt_Camp45" type="text" id="txt_Camp45" size="10" maxlength="10" value="<?=$VLdtCamp45; ?>"></td>
    <td>EGRESO MADRE</td>
    <td><input name="txt_Camp46" type="text" id="txt_Camp46" size="10" maxlength="10" value="<?=$VLdtCamp46; ?>"></td>
  </tr>
  <tr>
    <td>INGRESO OTROS</td>
    <td><input name="txt_Camp47" type="text" id="txt_Camp47" size="10" maxlength="10" value="<?=$VLdtCamp47; ?>"></td>
    <td>EGRESO TOTAL</td>
    <td><input name="txt_Camp48" type="text" id="txt_Camp48" size="10" maxlength="10" value="<?=$VLdtCamp48; ?>"></td>
  </tr>
</table>
    
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>Condiciones de la Vivienda</td>
    <td>
<select name="txt_Camp49">
                <option value="PROPIA" <?php if ( $VLdtCamp49 == "PROPIA") {?> selected <?php }?>>PROPIA</option>
                <option  value="ARRENDADA" <?php if ( $VLdtCamp49 == "ARRENDADA") {?> selected <?php }?>>ARRENDADA</option>
                <option value="FAMILIAR" <?php if ( $VLdtCamp49 == "FAMILIAR") {?> selected <?php }?>>FAMILIAR</option>
                <option value="CEDIDA" <?php if ( $VLdtCamp49 == "CEDIDA") {?> selected <?php }?>>CEDIDA</option>
                <option value="PRESTADA" <?php if ( $VLdtCamp49 == "PRESTADA") {?> selected <?php }?>>PRESTADA</option>
                <option value="ANTICRESIS" <?php if ( $VLdtCamp49 == "ANTICRESIS") {?> selected <?php }?>>ANTICRESIS</option>
                <option value="CON PRESTAMO" <?php if ( $VLdtCamp49 == "CON PRESTAMO") {?> selected <?php }?>>CON PRESTAMO</option>
                </select>    </td>
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
    <td align="right">Luz eléctrica: <select name="txt_Camp50">
                <option  value="No" <?php if ( $VLdtCamp50 == "No") {?> selected <?php }?>>No</option>
                <option value="Si" <?php if ( $VLdtCamp50 == "Si") {?> selected <?php }?>>Si</option>
                </select></td>
    <td align="right">Agua Potable: <select name="txt_Camp51">
                <option  value="No" <?php if ( $VLdtCamp51 == "No") {?> selected <?php }?>>No</option>
                <option value="Si" <?php if ( $VLdtCamp51 == "Si") {?> selected <?php }?>>Si</option>
                </select></td>
    <td align="right">SSHH: <select name="txt_Camp52">
                <option  value="No" <?php if ( $VLdtCamp52 == "No") {?> selected <?php }?>>No</option>
                <option value="Si" <?php if ( $VLdtCamp52 == "Si") {?> selected <?php }?>>Si</option>
                </select></td>
    <td align="right">Pozo séptico: <select name="txt_Camp53">
                <option  value="No" <?php if ( $VLdtCamp53 == "No") {?> selected <?php }?>>No</option>
                <option value="Si" <?php if ( $VLdtCamp53 == "Si") {?> selected <?php }?>>Si</option>
                </select></td>
    <td align="right">Teléfono: <select name="txt_Camp54">
                <option  value="No" <?php if ( $VLdtCamp54 == "No") {?> selected <?php }?>>No</option>
                <option value="Si" <?php if ( $VLdtCamp54 == "Si") {?> selected <?php }?>>Si</option>
                </select></td>
  </tr>
  <tr>
    <td align="right">cable: <select name="txt_Camp55">
                <option  value="No" <?php if ( $VLdtCamp55 == "No") {?> selected <?php }?>>No</option>
                <option value="Si" <?php if ( $VLdtCamp55 == "Si") {?> selected <?php }?>>Si</option>
                </select></td>
    <td align="right">celular: <select name="txt_Camp56">
                <option  value="No" <?php if ( $VLdtCamp56 == "No") {?> selected <?php }?>>No</option>
                <option value="Si" <?php if ( $VLdtCamp56 == "Si") {?> selected <?php }?>>Si</option>
                </select></td>
    <td align="right">Computador: <select name="txt_Camp57">
                <option  value="No" <?php if ( $VLdtCamp57 == "No") {?> selected <?php }?>>No</option>
                <option value="Si" <?php if ( $VLdtCamp57 == "Si") {?> selected <?php }?>>Si</option>
                </select></td>
    <td align="right">Internet: <select name="txt_Camp58">
                <option  value="No" <?php if ( $VLdtCamp58 == "No") {?> selected <?php }?>>No</option>
                <option value="Si" <?php if ( $VLdtCamp58 == "Si") {?> selected <?php }?>>Si</option>
                </select></td>
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
    <td><input name="txt_Camp59" type="text" id="txt_Camp59" value="<?=$VLdtCamp59; ?>
    " size="100" maxlength="150" /></td>
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
    <td><textarea name="txt_Camp60" cols="100" id="txt_Camp60" ><?=$VLdtCamp60; ?>
    </textarea></td>
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
<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#66FFFF">
  <tr>
    <td>4 DATOS DE SALUD</td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="50%">El estudiante tiene algún tipo de discapacidad:</td>
    <td><select name="txt_Camp61">
                <option value="No" <?php if ( $VLdtCamp61 == "No") {?> selected <?php }?>>No</option>
                <option value="Si" <?php if ( $VLdtCamp61 == "Si") {?> selected <?php }?>>Si</option>
                </select></td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%">Determinar cuál</td>
    <td align="center"><input name="txt_Camp62" type="text" id="txt_Camp62" size="100" maxlength="100" value="<?=$VLdtCamp62; ?>"></td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%">El estudiante tiene alguna condición médica específica:</td>
    <td><select name="txt_Camp63">
                <option value="No" <?php if ( $VLdtCamp63 == "No") {?> selected <?php }?>>No</option>
                <option value="Si" <?php if ( $VLdtCamp63 == "Si") {?> selected <?php }?>>Si</option>
                </select></td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%">Determinar cuál</td>
    <td align="center"><input name="txt_Camp64" type="text" id="txt_Camp64" size="100" maxlength="100" value="<?=$VLdtCamp64; ?>"></td>
  </tr>
</table>
    </td>
  </tr>  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%">El estudiante padece de alergias:</td>
    <td><select name="txt_Camp65">
                <option value="No" <?php if ( $VLdtCamp65 == "No") {?> selected <?php }?>>No</option>
                <option value="Si" <?php if ( $VLdtCamp65 == "Si") {?> selected <?php }?>>Si</option>
                </select></td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%">Determinar cuales:</td>
    <td align="center"><input name="txt_Camp66" type="text" id="txt_Camp66" size="100" maxlength="100" value="<?=$VLdtCamp66; ?>"></td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%">Especificar medicamentos que utiliza</td>
    <td align="center"><input name="txt_Camp67" type="text" id="txt_Camp67" size="100" maxlength="100" value="<?=$VLdtCamp67; ?>"></td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%">El estudiante recibe atención médica en:</td>
    <td><select name="txt_Camp68">
                <option value="Centro de salud" <?php if ( $VLdtCamp68 == "Centro de salud") {?> selected <?php }?>>Centro de salud</option>
                <option value="Subcentro de salud" <?php if ( $VLdtCamp68 == "Subcentro de salud") {?> selected <?php }?>>Subcentro de salud</option>
                <option value="Hospital Publico" <?php if ( $VLdtCamp68 == "Hospital Publico") {?> selected <?php }?>>Hospital Publico</option>
                <option value="Hospital Privado" <?php if ( $VLdtCamp68 == "Hospital Privado") {?> selected <?php }?>>Hospital Privado</option>
                </select></td>
  </tr>
</table>
    </td>
  </tr>
  
<tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%">Nombre del/la médico/a que atiende regularmente al estudiante</td>
    <td align="center"><input name="txt_Camp69" type="text" id="txt_Camp69" size="100" maxlength="100" value="<?=$VLdtCamp69; ?>"></td>
  </tr>
</table>
    </td>
</tr>
  <tr>
    <td>Observaciones:</td>
  </tr>
  <tr>
    <td align="center"><textarea name="txt_Camp70" cols="100" id="txt_Camp70"><?=$VLdtCamp70; ?>
    </textarea></td>
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
    
    </td>
  </tr>
  <tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#66FF99">
      <tr>
        <td>5 DATOS ACADEMICOS/ RENDIMIENTO ESCOLAR</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td width="41%">Fecha de ingreso a la institución (aa-mm-dd-)</td>
    		<td align="left"><input name="txt_Camp71" type="text" id="txt_Camp71" size="20" maxlength="20" value="<?=$VLdtCamp71; ?>"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="right" width="37%">Institución de la que procede:</td>
    		<td align="right"><input name="txt_Camp72" type="text" id="txt_Camp72" size="80" maxlength="100" value="<?=$VLdtCamp72; ?>"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>5.1 DATOS ACADÉMICOS</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="right" width="37%">Asignaturas de preferencia del estudiante:</td>
    		<td align="right"><input name="txt_Camp73" type="text" id="txt_Camp73" size="80" maxlength="100" value="<?=$VLdtCamp73; ?>"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="right" width="37%">Asignaturas en las que ha tenido dificultades:</td>
    		<td align="right"><input name="txt_Camp74" type="text" id="txt_Camp74" size="80" maxlength="100" value="<?=$VLdtCamp74; ?>"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="right" width="37%">Dignidades alcanzadas:</td>
    		<td align="right"><input name="txt_Camp75" type="text" id="txt_Camp75" size="80" maxlength="100" value="<?=$VLdtCamp75; ?>"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="right" width="37%">Logros académicos:</td>
    		<td align="right"><input name="txt_Camp76" type="text" id="txt_Camp76" size="80" maxlength="100" value="<?=$VLdtCamp76; ?>"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="right" width="37%">Participación en:</td>
    		<td align="right"><input name="txt_Camp77" type="text" id="txt_Camp77" size="80" maxlength="80" value="<?=$VLdtCamp77; ?>"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="right" width="37%">Clubes:</td>
    		<td align="right"><input name="txt_Camp78" type="text" id="txt_Camp78" size="80" maxlength="80" value="<?=$VLdtCamp78; ?>"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="right" width="37%">Extracurriculares:</td>
    		<td align="right"><input name="txt_Camp79" type="text" id="txt_Camp79" size="80" maxlength="80" value="<?=$VLdtCamp79; ?>"></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#99CC66">
  <tr>
    <td>6 HISTORIA VITAL</td>
  </tr>
  <tr>
    <td>6.1 Embarazo y Parto</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="35%" align="right">Edad de la madre:</td>
    		<td><input name="txt_Camp80" type="text" id="txt_Camp80" size="20" maxlength="20" value="<?=$VLdtCamp80; ?>"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="35%" align="right">Accidentes en el embarazo:</td>
        <td><input name="txt_Camp81" type="text" id="txt_Camp81" size="80" maxlength="80" value="<?=$VLdtCamp81; ?>"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="35%" align="right">Medicamentos durante el embarazo:</td>
        <td><input name="txt_Camp82" type="text" id="txt_Camp82" size="80" maxlength="80" value="<?=$VLdtCamp82; ?>"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td align="right">Al término</td>
        <td align="left"><select name="txt_Camp83">
        <option value="Si" <?php if ( $VLdtCamp83 == "Si") {?> selected <?php }?>>Si</option>
		<option value="No" <?php if ( $VLdtCamp83 == "No" ) {?> selected <?php }?>  >No</option>
	</select></td>
        <td align="right">Prematuro</td>
        <td align="left"><select name="txt_Camp84">
        <option value="Si" <?php if ( $VLdtCamp84 == "Si") {?> selected <?php }?>>Si</option>
		<option value="No" <?php if ( $VLdtCamp84 == "No" ) {?> selected <?php }?>  >No</option>
	</select></td>
        <td align="right">Cesarea</td>
        <td align="left"><select name="txt_Camp85">
        <option value="Si" <?php if ( $VLdtCamp85 == "Si") {?> selected <?php }?>>Si</option>
		<option value="No" <?php if ( $VLdtCamp85 == "No" ) {?> selected <?php }?>  >No</option>
	</select></td>
        <td align="right">P. Normal</td>
        <td align="left"><select name="txt_Camp86">
        <option value="Si" <?php if ( $VLdtCamp86 == "Si") {?> selected <?php }?>>Si</option>
		<option value="No" <?php if ( $VLdtCamp86 == "No" ) {?> selected <?php }?>  >No</option>
	</select></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="60%">Especificar Cualquier dificultad en el embarazo ( preclansia, hipoxia, etc... )</td>
        <td align="left"><input name="txt_Camp87" type="text" id="txt_Camp87" size="44" maxlength="80" value="<?=$VLdtCamp87; ?>"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>6.2 Datos del/la niño/a recién nacido:</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right" width="20%">Peso al nacer (lb)</td>
        <td align="left" width="10%"><input name="txt_Camp88" type="text" id="txt_Camp88" size="10" maxlength="10" value="<?=$VLdtCamp88; ?>"></td>
        <td align="right" width="20%">Talla al nacer (mm)</td>
        <td align="left" width="10%"><input name="txt_Camp89" type="text" id="txt_Camp89" size="10" maxlength="10" value="<?=$VLdtCamp89; ?>"></td>
        <td align="right" width="20%">Edad caminó</td>
        <td align="left" width="10%"><input name="txt_Camp90" type="text" id="txt_Camp90" size="10" maxlength="10" value="<?=$VLdtCamp90; ?>"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right" width="20%">edad fin lactancia</td>
        <td align="left" width="10%"><input name="txt_Camp91" type="text" id="txt_Camp91" size="10" maxlength="10" value="<?=$VLdtCamp91; ?>"></td>
        <td align="right" width="20%">edad fin biberón</td>
        <td align="left" width="10%"><input name="txt_Camp92" type="text" id="txt_Camp92" size="10" maxlength="10" value="<?=$VLdtCamp92; ?>"></td>
        <td align="right" width="20%">Edad contr. esfinteres</td>
        <td align="left" width="10%"><input name="txt_Camp93" type="text" id="txt_Camp93" size="10" maxlength="10" value="<?=$VLdtCamp93; ?>"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>6.3 Enfermedades ( desde la infancia hasta la actualidad)</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="35%" align="right">Enfermedades: </td>
        <td><input name="txt_Camp94" type="text" id="txt_Camp94" size="80" maxlength="80" value="<?=$VLdtCamp94; ?>"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="35%" align="right">Accidentes: </td>
        <td><input name="txt_Camp95" type="text" id="txt_Camp95" size="80" maxlength="80" value="<?=$VLdtCamp95; ?>"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="35%" align="right">Alergias: </td>
        <td><input name="txt_Camp96" type="text" id="txt_Camp96" size="80" maxlength="80" value="<?=$VLdtCamp96; ?>"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="35%" align="right">Cirugías: </td>
        <td><input name="txt_Camp97" type="text" id="txt_Camp97" size="80" maxlength="80" value="<?=$VLdtCamp97; ?>"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="35%" align="right">Pérdidas de conocimiento: </td>
        <td><input name="txt_Camp98" type="text" id="txt_Camp98" size="80" maxlength="80" value="<?=$VLdtCamp98; ?>"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="35%" align="right">Otros: </td>
        <td><input name="txt_Camp99" type="text" id="txt_Camp99" size="80" maxlength="80" value="<?=$VLdtCamp99; ?>"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>6.4 Antecedentes patológicos familiares:</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="20%" align="right">Obesidad</td>
        <td><select name="txt_Camp100">
        <option value="Si" <?php if ( $VLdtCamp100 == "Si") {?> selected <?php }?>>Si</option>
		<option value="No" <?php if ( $VLdtCamp100 == "No" ) {?> selected <?php }?>  >No</option>
	</select></td>
        <td width="20%" align="right">Enf. Cardiacas</td>
		<td><select name="txt_Camp101">
        <option value="Si" <?php if ( $VLdtCamp101 == "Si") {?> selected <?php }?>>Si</option>
		<option value="No" <?php if ( $VLdtCamp101 == "No" ) {?> selected <?php }?>  >No</option>
	</select> </td>       
    	<td width="20%" align="right">Hipertensión</td>
        <td><select name="txt_Camp102">
        <option value="Si" <?php if ( $VLdtCamp102 == "Si") {?> selected <?php }?>>Si</option>
		<option value="No" <?php if ( $VLdtCamp102 == "No" ) {?> selected <?php }?>  >No</option>
	</select></td>
      </tr>
      <tr>
        <td width="20%" align="right">Diabetes</td>
        <td><select name="txt_Camp103">
        <option value="Si" <?php if ( $VLdtCamp103 == "Si") {?> selected <?php }?>>Si</option>
		<option value="No" <?php if ( $VLdtCamp103 == "No" ) {?> selected <?php }?>  >No</option>
	</select></td>
        <td width="20%" align="right">Enf. Mentales</td>
        <td><select name="txt_Camp104">
        <option value="Si" <?php if ( $VLdtCamp104 == "Si") {?> selected <?php }?>>Si</option>
		<option value="No" <?php if ( $VLdtCamp104 == "No" ) {?> selected <?php }?>  >No</option>
	</select></td>
        <td width="20%" align="right">Otros</td>
        <td><select name="txt_Camp105">
        <option value="Si" <?php if ( $VLdtCamp105 == "Si") {?> selected <?php }?>>Si</option>
		<option value="No" <?php if ( $VLdtCamp105 == "No" ) {?> selected <?php }?>  >No</option>
	</select></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>6.5 Cómo describiría la relación del/la estudiante con:</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td align="right" width="35%">Padre: </td>
        <td><input name="txt_Camp106" type="text" id="txt_Camp106" size="80" maxlength="80" value="<?=$VLdtCamp106; ?>"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td align="right" width="35%">Madre: </td>
        <td><input name="txt_Camp107" type="text" id="txt_Camp107" size="80" maxlength="80" value="<?=$VLdtCamp107; ?>"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td align="right" width="35%">Hermanos/as: </td>
        <td><input name="txt_Camp108" type="text" id="txt_Camp108" size="80" maxlength="80" value="<?=$VLdtCamp108; ?>"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td align="right" width="35%">Otros: </td>
        <td><input name="txt_Camp109" type="text" id="txt_Camp109" size="80" maxlength="80" value="<?=$VLdtCamp109; ?>"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>Observaciones</td>
  </tr>
  <tr>
        <td align="center"><textarea name="txt_Camp110" cols="80" rows="3" id="txt_Camp110"><?=$VLdtCamp110; ?>
        </textarea></td>
  </tr>
  <tr>
    <td>6.6 Costumbes, describa hábitos ( alimenticios - sueño ), act. tiempo libre, tareas realiza a diario</td>
  </tr>
  <tr>
        <td align="center"><textarea name="txt_Camp111" cols="80" rows="4" id="txt_Camp111"><?=$VLdtCamp111; ?>
        </textarea></td>
  </tr>
</table>
    
    </td>
  </tr>
</table>
      </form></td>

</body>
</html>
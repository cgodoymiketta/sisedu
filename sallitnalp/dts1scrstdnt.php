<?php 

switch ($vlccn) {
case "nuevo":
//echo "nuevo";
	$VLdtCamp1="";
	$VLdtCamp2="";
	$VLdtCamp3="";
	$VLdtCamp4="";
	$VLdtCamp5="";
	$VLdtCamp6="";
	$VLdtCamp7="";
	$VLdtCamp8="";
	$VLdtCamp9="";
	$VLdtCamp10="";
	$VLdtCamp11="";
	$VLdtCamp12="";
	$VLdtCamp13="";
	$VLdtCamp14="";
	$VLdtCamp15="";
	$VLdtCamp16="";
	$VLdtCamp17="";
	$VLdtCamp18="";
	$VLdtCamp19="";
	$VLdtCamp20="";
	$VLdtCamp21="";

break 1; 
case "guardar":
	
	if ($VLdtCamp3!="" && $VLdtCamp2!="" && $VLdtCamp13!="" && $VLdtCamp14!="" && $VLdtCamp15!="") {
	//////  ESTUDIANTES NUEVOS   ///////
	////// DEBEMOS VALIDAR QUE EL ESTUDIANTE NO EXISTA EN EL SISTEMA EN CUYO CASO  DEBE DAR UN MENSAJE DE ERROR Y NO GUARDAR ///////
	//// VALIDAMOS QUE EL NOMBRE, APELLIDOS Y CEDULA DEL NINO NO EXISTAN.
	
	
		$Query = $VLQry1.$VLQry2.$VLQryCampo2."='".$VLdtCamp2."'".$VLQry2;
		$Query.=$VLQryCampo3."='".$VLdtCamp3."'".$VLQry2.$VLQryCampo4."='".$VLdtCamp4."'";
		$VLdtDatos = execute_query($Query,$VLConexion);
		$VLnuDatos = total_records($VLdtDatos);
		if ( $VLnuDatos>0 )
		{
						$VLMensaje="EL ESTUDIANTE YA EXISTE";
						
///////  REPRESENTANTE LEGAL  /////////////////////////////////////////////////////////////////////////////////
			///////   LO BUSCAMOS     ----------------------------------------------------------------------------------/////
				$VLQryRep=$VLQry0.$VLQry2.$VLQryCampo2."='".$VLdtCamp13."'".$VLQry2;
				$VLQryRep.=$VLQryCampo3."='".$VLdtCamp14."'".$VLQry2.$VLQryCampo4."='".$VLdtCamp15."'";
				$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
			
			///////  CONFIRMAMOS QUE NO EXISTA  EL REPRESENTANTE LEGAL-----------------------------------------------------------------------/////
				if ( $VLnuDatosRep>0 )
				{
				///----------------SI EXISTE NO HACEMOS NADA
				}else{
				///----------------LO CREAMOS AL REPRESENTANTE
					$VLQryRep=$VLQry5."'".$VLdtCamp13."','".$VLdtCamp14."','".$VLdtCamp16."','";
					$VLQryRep.=$VLdtCamp17."','','".$VLdtCamp15."','','";
					$VLQryRep.= "','".$VLdtCamp20."','','".$VLdtCamp23."','',1)";
					$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
	
				}
			/// RECUPERAMOS EL CODIGO DEL REPRESENTANTE
				$VLQryRep=$VLQry0.$VLQry2."p.".$VLQryCampo2."='".$VLdtCamp13."'".$VLQry2."p.";
				$VLQryRep.=$VLQryCampo3."='".$VLdtCamp14."'".$VLQry2."p.".$VLQryCampo4."='".$VLdtCamp15."'";
				$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
				$VLnuDatosRep = total_records($VLdtDatosRep);
				if ( $VLnuDatosRep>0 )
				{
					//// RECUPERAMOS EL CODIGO DEL REPRESENTANTE
					$VLdtCamp12=get_result($VLdtDatosRep,0,"p.".$VLQryCampo1);
				///////    LO ASIGNAMOS AL ESTUDIANTE
				/////// PRNTSC
					$VLQryPar=$VLQry12.$VLdtCamp1.",".$VLdtCamp12.",'".$VLdtCamp18."','".$VLdtCamp21;
					$VLQryPar.="','".$VLdtCamp19."','Si')";
					$VLdtDatosPar = execute_query($VLQryPar,$VLConexion);
				}else{
					$VLMensaje="ERROR AL CREAR AL REPRESENTANTE, COMUNIQUESE CON SOPORTE TECNICO";
					$VLQryErr=$VLQry13.$VLdtCamp1;
					$VLdtDatosErr = execute_query($VLQryErr,$VLConexion);
					$VLQryErr=$VLQry14.$VLdtCamp1;
					$VLdtDatosErr = execute_query($VLQryErr,$VLConexion);
					$VLQryErr=$VLQry15.$VLdtCamp1;
					$VLdtDatosErr = execute_query($VLQryErr,$VLConexion);
					$VLQryErr=$VLQry16.$VLdtCamp1;
					$VLdtDatosErr = execute_query($VLQryErr,$VLConexion);
					$VLQryErr=$VLQry17.$VLdtCamp1;
					$VLdtDatosErr = execute_query($VLQryErr,$VLConexion);
					$VLQryErr=$VLQry18.$VLdtCamp1;
					$VLdtDatosErr = execute_query($VLQryErr,$VLConexion);
					$VLQryErr=$VLQry19.$VLdtCamp1;
					$VLdtDatosErr = execute_query($VLQryErr,$VLConexion);
					$VLQryErr=$VLQry20.$VLdtCamp1;
					$VLdtDatosErr = execute_query($VLQryErr,$VLConexion);
				}
				/*
			}else{
					$VLMensaje="ERROR AL CREAR AL ESTUDIANTE, COMUNIQUESE CON SOPORTE TECNICO";
			}		*/				
		}else{
		/////////////////  EL ESTUDIANTE NO ESTA INGRESADO EN EL SISTEMA
			///// INGRESAMOS AL ESTUDIANTE
			$VLQryEst=$VLQry5."'".$VLdtCamp2."','".$VLdtCamp3."','".$VLdtCamp5."','";
			$VLQryEst.=$VLdtCamp6."','".$VLdtCamp7."','".$VLdtCamp4."','".$VLdtCamp8."','";
			$VLQryEst.= $VLdtCamp9."','".$VLdtCamp10."','".$VLdtCamp11."','".$VLdtCamp22."','";
			$VLQryEst.= "SOLTERO',1)";
			$VLdtDatosEst = execute_query($VLQryEst,$VLConexion);
			//// RECUPERAMOS EL CODIGO DEL ESTUDIANTE
			$VLQryEst=$VLQry0.$VLQry2."p.".$VLQryCampo2."='".$VLdtCamp2."'".$VLQry2."p.".$VLQryCampo3."='".$VLdtCamp3."'";
			$VLdtDatosEst = execute_query($VLQryEst,$VLConexion);
			$VLnuDatosEst = total_records($VLdtDatosEst);
			if ( $VLnuDatosEst==1 )
			{
				$VLdtCamp1=get_result($VLdtDatosEst,0,"p.".$VLQryCampo1);
			
			//// LO INSCRIBIMOS EN LA INSTITUCION
			///// NSTTCNSTDNT
				$VLQryEst1=$VLQry6.$VLInstitucion.",".$VLAnoLocal.",".$VLdtCamp1.",1 ".$VLQry3;
				$VLdtDatosEst = execute_query($VLQryEst1,$VLConexion);

			//// CREAMOS SUS TABLAS DE DATOS
			////DTSDSLD////////////////////////////////////////////////////////////////////////////////////////////////////
				$VLQryEst=$VLQry7.$VLdtCamp1.$VLQry3;
				$VLdtDatosEst = execute_query($VLQryEst,$VLConexion);
			////DTSCDMCS///////////////////////////////////////////////////////////////////////////////////////////////////
				$VLQryEst=$VLQry8.$VLdtCamp1.$VLQry3;
				$VLdtDatosEst = execute_query($VLQryEst,$VLConexion);
			////RFRNCSFMLRS////////////////////////////////////////////////////////////////////////////////////////////////
				$VLQryEst=$VLQry9.$VLdtCamp1.$VLQry3;
				$VLdtDatosEst = execute_query($VLQryEst,$VLConexion);
			////DTSPSTRL///////////////////////////////////////////////////////////////////////////////////////////////////
				$VLQryEst=$VLQry10.$VLdtCamp1.$VLQry3;
				$VLdtDatosEst = execute_query($VLQryEst,$VLConexion);
			////HSTRVTL////////////////////////////////////////////////////////////////////////////////////////////////////
				$VLQryEst=$VLQry11.$VLdtCamp1.$VLQry3;
				$VLdtDatosEst = execute_query($VLQryEst,$VLConexion);
			
			///////  REPRESENTANTE LEGAL  /////////////////////////////////////////////////////////////////////////////////
			///////   LO BUSCAMOS     ----------------------------------------------------------------------------------/////
				$VLQryRep=$VLQry0.$VLQry2.$VLQryCampo2."='".$VLdtCamp13."'".$VLQry2;
				$VLQryRep.=$VLQryCampo3."='".$VLdtCamp14."'".$VLQry2.$VLQryCampo4."='".$VLdtCamp15."'";
				$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
			
			///////  CONFIRMAMOS QUE NO EXISTA  EL REPRESENTANTE LEGAL-----------------------------------------------------------------------/////
				if ( $VLnuDatosRep>0 )
				{
				///----------------SI EXISTE NO HACEMOS NADA
				}else{
				///----------------LO CREAMOS AL REPRESENTANTE
					$VLQryRep=$VLQry5."'".$VLdtCamp13."','".$VLdtCamp14."','".$VLdtCamp16."','";
					$VLQryRep.=$VLdtCamp17."','','".$VLdtCamp15."','','";
					$VLQryRep.= "','".$VLdtCamp20."','','".$VLdtCamp23."','',1)";
					$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
	
				}
			/// RECUPERAMOS EL CODIGO DEL REPRESENTANTE
				$VLQryRep=$VLQry0.$VLQry2."p.".$VLQryCampo2."='".$VLdtCamp13."'".$VLQry2."p.";
				$VLQryRep.=$VLQryCampo3."='".$VLdtCamp14."'".$VLQry2."p.".$VLQryCampo4."='".$VLdtCamp15."'";
				$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
				$VLnuDatosRep = total_records($VLdtDatosRep);
				if ( $VLnuDatosRep>0 )
				{
					//// RECUPERAMOS EL CODIGO DEL REPRESENTANTE
					$VLdtCamp12=get_result($VLdtDatosRep,0,"p.".$VLQryCampo1);
				///////    LO ASIGNAMOS AL ESTUDIANTE
				/////// PRNTSC
					$VLQryPar=$VLQry12.$VLdtCamp1.",".$VLdtCamp12.",'".$VLdtCamp18."','".$VLdtCamp21;
					$VLQryPar.="','".$VLdtCamp19."','Si')";
					$VLdtDatosPar = execute_query($VLQryPar,$VLConexion);
				}else{
					$VLMensaje="ERROR AL CREAR AL REPRESENTANTE, COMUNIQUESE CON SOPORTE TECNICO";
					$VLQryErr=$VLQry13.$VLdtCamp1;
					$VLdtDatosErr = execute_query($VLQryErr,$VLConexion);
					$VLQryErr=$VLQry14.$VLdtCamp1;
					$VLdtDatosErr = execute_query($VLQryErr,$VLConexion);
					$VLQryErr=$VLQry15.$VLdtCamp1;
					$VLdtDatosErr = execute_query($VLQryErr,$VLConexion);
					$VLQryErr=$VLQry16.$VLdtCamp1;
					$VLdtDatosErr = execute_query($VLQryErr,$VLConexion);
					$VLQryErr=$VLQry17.$VLdtCamp1;
					$VLdtDatosErr = execute_query($VLQryErr,$VLConexion);
					$VLQryErr=$VLQry18.$VLdtCamp1;
					$VLdtDatosErr = execute_query($VLQryErr,$VLConexion);
					$VLQryErr=$VLQry19.$VLdtCamp1;
					$VLdtDatosErr = execute_query($VLQryErr,$VLConexion);
					$VLQryErr=$VLQry20.$VLdtCamp1;
					$VLdtDatosErr = execute_query($VLQryErr,$VLConexion);
				}
			}else{
					$VLMensaje="ERROR AL CREAR AL ESTUDIANTE, COMUNIQUESE CON SOPORTE TECNICO";
			}
		}
	}else{
		/// SI NO ESTA EL NOMBRE DEL ESTUDIANTE Y EL APELLIDO NO GRABA	
		$VLMensaje="DEBE INGRESAR APELLIDOS Y NOMBRES DEL ESTUDIANTE Y DEL REPRESENTANTE LEGAL Y EL DOCUMENTO DEL REPRESENTANTE LEGAL";
	}
//echo "guardar";
break 1; 
case "modificar":
///////////////////// CONFIRMAMOS QUE ESTE CARGADO EL CODIGO DEL ESTUDIANTE Y DEL REPRESENTANTE/////////////////
if ( $VLdtCamp1!="" && $VLdtCamp12!=""){
/////////ESTUDIANTE ////////
///////// CONFIRMAMOS QUE ESTEN LOS CAMPOS NECESARIOS DEL ESTUDIANTE /////
	if ( $VLdtCamp2=="" || $VLdtCamp3==""){
///--------------- SI NO ESTAN LOS CAMPOS NECESARIOS DEL ESTUDIANTE NO SE HACE NADA -----------------------
		$VLMensaje="LOS APELLIDOS O NOMBRES DEL ESTUDIANTE HAN SIDO BORRADOS";
	}else{
///--------------- SI ESTAN LOS CAMPOS SE ACTUALIZAN LOS DATOS DEL ESTUDIANTE ----------------------------
		$VLQryEst= $VLQry22;
		$VLQryEst.= $VLQryCampo2."='".$VLdtCamp2;
		$VLQryEst.= "', ".$VLQryCampo3."='".$VLdtCamp3;
		$VLQryEst.= "', ".$VLQryCampo4."='".$VLdtCamp4;
		$VLQryEst.= "', ".$VLQryCampo5."='".$VLdtCamp5;
		$VLQryEst.= "', ".$VLQryCampo6."='".$VLdtCamp6;
		$VLQryEst.= "', ".$VLQryCampo7."='".$VLdtCamp7;
		$VLQryEst.= "', ".$VLQryCampo8."='".$VLdtCamp8;
		$VLQryEst.= "', ".$VLQryCampo9."='".$VLdtCamp9;
		$VLQryEst.= "', ".$VLQryCampo10."='".$VLdtCamp10;
		$VLQryEst.= "', ".$VLQryCampo11."='".$VLdtCamp11;
		$VLQryEst.= "', ".$VLQryCampo22."='".$VLdtCamp22;
		$VLQryEst.="' ".$VLQry24.$VLQryCampo1."=".$VLdtCamp1;
		$VLdtDatosEst = execute_query($VLQryEst,$VLConexion);
	}

/////////  REPRESENTANTE LEGAL /////////////////////////////////////
/////  CONFIRMAMOS QUE LOS DATOS DEL REPRESENTANTE ESTEN COMPLETOS /////////////////////
	if ( $VLdtCamp13=="" || $VLdtCamp14=="" || $VLdtCamp15=="" ) {
///------- SI NO ESTAN COMPLETOS MENSAJE DE ERROR.---------------------------------
	$VLMensaje= " FALTAN DATOS NECESARIOS EN EL REPRESENTANTE LEGAL: APELLIDOS, NOMBRES O CEDULA";	
	}else{
//// --------  RECUPERAMOS LOS REPRESENTANTES ASOCIADOS CON EL ESTUDIANTE -------------------------------
		$VLQryRep= $VLQry21.$VLdtCamp1;
		$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
		$VLnuDatosRep = total_records($VLdtDatosRep);
		if ( $VLnuDatosRep<1 ){
			$VLMensaje= " EL ESTUDIANTE NO TIENE REPRESENTANTES ASOCIADOS INGRESE UNO PARA SEGUIR";	
		}else{		
			$Existe="no";
			$No=0;
			for( $i=0; $i<$VLnuDatosRep; $i++)
			{
				/// ------  DE LOS REPRESENTANTES ASOCIADOS VALIDAMOS
				$VLdtCamp12a=get_result($VLdtDatosRep,$i,"p.".$VLQryCampo1);
				$VLdtCamp13a=get_result($VLdtDatosRep,$i,"p.".$VLQryCampo2);
				$VLdtCamp14a=get_result($VLdtDatosRep,$i,"p.".$VLQryCampo3);
				$VLdtCamp15a=get_result($VLdtDatosRep,$i,"p.".$VLQryCampo4);
////  CONFIRMAMOS QUE EL REP. LEGAL SEA UNO DE LOS ASIGNADOS. ---------------------
			  	if($VLdtCamp15a!=""){
//// -------- COMPARAMOS CON EL NUMERO DE CEDULA ----------------------------------
					if(strcmp(trim($VLdtCamp15),trim($VLdtCamp15a))==0){
						///----------------- es el Representante
						$Existe="si";
						$No=$i; ////------ guardamos el indice en el que esta
						$i=$VLnuDatosRep;
					}
				}else{
//// ---------- SI NO TIENE CEDULA COMPARAMOS CON LOS APELLIDOS Y NOMBRES ---------
					if( strcmp(trim($VLdtCamp13),trim($VLdtCamp13a))==0 && strcmp(trim($VLdtCamp14),trim($VLdtCamp14a))==0){
						$Existe="si";
						$No=$i; ////------ guardamos el indice en el que esta
						$i=$VLnuDatosRep;
					}
				}
			}
			if ( $Existe=="si"){
				$VLdtCamp12a=get_result($VLdtDatosRep,$No,"p.".$VLQryCampo1);
//// ---------- SI EL REPRESENTANTE EXISTE ACTUALIZAMOS LOS DATOS -----------------
				$VLQryRep= $VLQry22;
				$VLQryRep.= $VLQryCampo2."='".$VLdtCamp13;
				$VLQryRep.= "', ".$VLQryCampo3."='".$VLdtCamp14;
				$VLQryRep.= "', ".$VLQryCampo4."='".$VLdtCamp15;
				$VLQryRep.= "', ".$VLQryCampo5."='".$VLdtCamp16;
				$VLQryRep.= "', ".$VLQryCampo6."='".$VLdtCamp17;
				$VLQryRep.= "', ".$VLQryCampo10."='".$VLdtCamp20;
				$VLQryRep.= "' ".$VLQry24.$VLQryCampo1."=".$VLdtCamp12a;
				$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
				$VLdtCamp12=$VLdtCamp12a;
////-------------- ACTUALIZAMOS LOS DATOS DE PARIENTE --------------
				$VLQryFam= $VLQry23;
				$VLQryFam.= $VLQryCampo19."='".$VLdtCamp19."', ";
				$VLQryFam.= $VLQryCampo21."='".$VLdtCamp21."', ";
				$VLQryFam.= $VLQryCampo25."='Si'";
				$VLQryFam.= $VLQry24.$VLQryCampo12."=".$VLdtCamp12a;
				$VLQryFam.= $VLQry2.$VLQryCampo1."=".$VLdtCamp1;
				$VLdtDatosFam = execute_query($VLQryFam,$VLConexion);
			}else {
////---------------- CONFIRMAMOS QUE EXISTA EL REPRESENTANTE EN LA BDD				
				$VLQryFam=$VLQry0;
				$VLQryFam.= $VLQry2.$VLQryCampo4."='".$VLdtCamp15."'";
				$VLdtDatosFam = execute_query($VLQryFam,$VLConexion);
				$VLnuDatosFam = total_records($VLdtDatosFam);
				if ( $VLnuDatosFam>0 ){
//// ---------- SI EL REPRESENTANTE NO ESTA ASIGNADO AL ESTUDIANTE------- ---------
					$Existe="no";
					$No=0;
					for( $i=0; $i<$VLnuDatosFam; $i++)
					{
						/// ------  DE LOS REPRESENTANTES ASOCIADOS VALIDAMOS
						$VLdtCamp12a=get_result($VLdtDatosFam,$i,"p.".$VLQryCampo1);
						$VLdtCamp13a=get_result($VLdtDatosFam,$i,"p.".$VLQryCampo2);
						$VLdtCamp14a=get_result($VLdtDatosFam,$i,"p.".$VLQryCampo3);
						$VLdtCamp15a=get_result($VLdtDatosFam,$i,"p.".$VLQryCampo4);
		////  CONFIRMAMOS QUE EL REP. LEGAL SEA UNO DE LOS ASIGNADOS. ---------------------
						if($VLdtCamp15a!=""){
		//// -------- COMPARAMOS CON EL NUMERO DE CEDULA ----------------------------------
							if(strcmp(trim($VLdtCamp15),trim($VLdtCamp15a))==0){
								///----------------- es el Representante
								$Existe="si";
								$No=$i; ////------ guardamos el indice en el que esta
								$i=$VLnuDatosFam;
							}
						}else{
		//// ---------- SI NO TIENE CEDULA COMPARAMOS CON LOS APELLIDOS Y NOMBRES ---------
							if( strcmp(trim($VLdtCamp13),trim($VLdtCamp13a))==0 && strcmp(trim($VLdtCamp14),trim($VLdtCamp14a))==0){
								$Existe="si";
								$No=$i; ////------ guardamos el indice en el que esta
								$i=$VLnuDatosFam;
							}
						}
					}
					
					if ( $Existe=="si"){
						$VLdtCamp12a=get_result($VLdtDatosFam,$No,"p.".$VLQryCampo1);
//// ---------- SI EL REPRESENTANTE EXISTE ACTUALIZAMOS LOS DATOS -----------------
						$VLQryRep= $VLQry22;
						$VLQryRep.= $VLQryCampo2."='".$VLdtCamp13;
						$VLQryRep.= "', ".$VLQryCampo3."='".$VLdtCamp14;
						$VLQryRep.= "', ".$VLQryCampo4."='".$VLdtCamp15;
						$VLQryRep.= "', ".$VLQryCampo5."='".$VLdtCamp16;
						$VLQryRep.= "', ".$VLQryCampo6."='".$VLdtCamp17;
						$VLQryRep.= "', ".$VLQryCampo10."='".$VLdtCamp20;
						$VLQryRep.= "' ".$VLQry24.$VLQryCampo1."=".$VLdtCamp12a;
						$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
						$VLdtCamp12=$VLdtCamp12a;

/// --------------------- CREAMOS EL PARENTEZCO DE ESTA PERSONA CON EL ESTUDIANTE -----------------						
						$VLQryPar=$VLQry12.$VLdtCamp1.",".$VLdtCamp12.",'".$VLdtCamp18."','".$VLdtCamp21;
						$VLQryPar.="','".$VLdtCamp19."','Si')";
						$VLdtDatosPar = execute_query($VLQryPar,$VLConexion);
					}else {
//// ----------------- CREAMOS AL REPRESENTANTE LEGAL	--------------------------------------------------------------------
						$VLQryRep=$VLQry5."'".$VLdtCamp13."','".$VLdtCamp14."','".$VLdtCamp16."','";
						$VLQryRep.=$VLdtCamp17."','','".$VLdtCamp15."','','";
						$VLQryRep.= "','".$VLdtCamp20."','','".$VLdtCamp23."','',1)";
						$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
		
/// ------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE------------------------------------------------------------------
						$VLQryRep=$VLQry0.$VLQry2."p.".$VLQryCampo2."='".$VLdtCamp13."'".$VLQry2."p.";
						$VLQryRep.=$VLQryCampo3."='".$VLdtCamp14."'".$VLQry2."p.".$VLQryCampo4."='".$VLdtCamp15."'";
						$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
						$VLnuDatosRep = total_records($VLdtDatosRep);
						if ( $VLnuDatosRep>0 )
						{
//// -------------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE----------------------------------------
							$VLdtCamp12=get_result($VLdtDatosRep,0,"p.".$VLQryCampo1);
/////// ---------------------   LO ASIGNAMOS AL ESTUDIANTE-------------------------------------------------------------------
/////// ----------------------------------PRNTSC------------------------------------------------------------------------
							$VLQryPar=$VLQry12.$VLdtCamp1.",".$VLdtCamp12.",'".$VLdtCamp18."','".$VLdtCamp21;
							$VLQryPar.="','".$VLdtCamp19."','Si')";
							$VLdtDatosPar = execute_query($VLQryPar,$VLConexion);
						}else{
							$VLMensaje="ERROR AL CREAR AL REPRESENTANTE , COMUNIQUESE CON SOPORTE TECNICO";
						}
					}
				}else{
					
//// ----------------- CREAMOS AL REPRESENTANTE LEGAL	--------------------------------------------------------------------
					$VLQryRep=$VLQry5."'".$VLdtCamp13."','".$VLdtCamp14."','".$VLdtCamp16."','";
					$VLQryRep.=$VLdtCamp17."','','".$VLdtCamp15."','','";
					$VLQryRep.= "','".$VLdtCamp20."','','".$VLdtCamp23."','',1)";
					$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
	
/// ------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE------------------------------------------------------------------
					$VLQryRep=$VLQry0.$VLQry2."p.".$VLQryCampo2."='".$VLdtCamp13."'".$VLQry2."p.";
					$VLQryRep.=$VLQryCampo3."='".$VLdtCamp14."'".$VLQry2."p.".$VLQryCampo4."='".$VLdtCamp15."'";
					$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
					$VLnuDatosRep = total_records($VLdtDatosRep);
					if ( $VLnuDatosRep>0 )
					{
//// -------------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE----------------------------------------
						$VLdtCamp12=get_result($VLdtDatosRep,0,"p.".$VLQryCampo1);
/////// ---------------------   LO ASIGNAMOS AL ESTUDIANTE-------------------------------------------------------------------
/////// ----------------------------------PRNTSC------------------------------------------------------------------------
						$VLQryPar=$VLQry12.$VLdtCamp1.",".$VLdtCamp12.",'".$VLdtCamp18."','".$VLdtCamp21;
						$VLQryPar.="','".$VLdtCamp19."','Si')";
						$VLdtDatosPar = execute_query($VLQryPar,$VLConexion);
					}else{
						$VLMensaje="ERROR AL CREAR AL REPRESENTANTE , COMUNIQUESE CON SOPORTE TECNICO";
					}
				}				
			}
		}
	}

} else {
//	$VLMensaje= " EXISTIO UN ERROR AL CARGAR AL ESTUDIANTE Y SU REPRESENTANTE.";
/////////////////////////////CONFIRMAMOS QUE EL REPRESENTANTE EXISTA EN LA BDD /////////////////////////////////
	$VLQryFam=$VLQry0;
	$VLQryFam.= $VLQry2.$VLQryCampo4."='".$VLdtCamp15."'";
	$VLdtDatosFam = execute_query($VLQryFam,$VLConexion);
	$VLnuDatosFam = total_records($VLdtDatosFam);
	if ( $VLnuDatosFam>0 ){
//// ---------- SI EL REPRESENTANTE NO ESTA ASIGNADO AL ESTUDIANTE------- ---------
		$Existe="no";
		$No=0;
		for( $i=0; $i<$VLnuDatosFam; $i++)
		{
			/// ------  DE LOS REPRESENTANTES ASOCIADOS VALIDAMOS
			$VLdtCamp12a=get_result($VLdtDatosFam,$i,"p.".$VLQryCampo1);
			$VLdtCamp13a=get_result($VLdtDatosFam,$i,"p.".$VLQryCampo2);
			$VLdtCamp14a=get_result($VLdtDatosFam,$i,"p.".$VLQryCampo3);
			$VLdtCamp15a=get_result($VLdtDatosFam,$i,"p.".$VLQryCampo4);
////  CONFIRMAMOS QUE EL REP. LEGAL SEA UNO DE LOS ASIGNADOS. ---------------------
			if($VLdtCamp15a!=""){
//// -------- COMPARAMOS CON EL NUMERO DE CEDULA ----------------------------------
				if(strcmp(trim($VLdtCamp15),trim($VLdtCamp15a))==0){
					///----------------- es el Representante
					$Existe="si";
					$No=$i; ////------ guardamos el indice en el que esta
					$i=$VLnuDatosFam;
				}
			}else{
//// ---------- SI NO TIENE CEDULA COMPARAMOS CON LOS APELLIDOS Y NOMBRES ---------
				if( strcmp(trim($VLdtCamp13),trim($VLdtCamp13a))==0 && strcmp(trim($VLdtCamp14),trim($VLdtCamp14a))==0){
					$Existe="si";
					$No=$i; ////------ guardamos el indice en el que esta
					$i=$VLnuDatosFam;
				}
			}
		}
		
		if ( $Existe=="si"){
			$VLdtCamp12a=get_result($VLdtDatosFam,$No,"p.".$VLQryCampo1);
//// ---------- SI EL REPRESENTANTE EXISTE ACTUALIZAMOS LOS DATOS -----------------
			$VLQryRep= $VLQry22;
			$VLQryRep.= $VLQryCampo2."='".$VLdtCamp13;
			$VLQryRep.= "', ".$VLQryCampo3."='".$VLdtCamp14;
			$VLQryRep.= "', ".$VLQryCampo4."='".$VLdtCamp15;
			$VLQryRep.= "', ".$VLQryCampo5."='".$VLdtCamp16;
			$VLQryRep.= "', ".$VLQryCampo6."='".$VLdtCamp17;
			$VLQryRep.= "', ".$VLQryCampo10."='".$VLdtCamp20;
			$VLQryRep.= "' ".$VLQry24.$VLQryCampo1."=".$VLdtCamp12a;
			$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
			$VLdtCamp12=$VLdtCamp12a;

/// --------------------- CREAMOS EL PARENTEZCO DE ESTA PERSONA CON EL ESTUDIANTE -----------------						
			$VLQryPar=$VLQry12.$VLdtCamp1.",".$VLdtCamp12.",'".$VLdtCamp18."','".$VLdtCamp21;
			$VLQryPar.="','".$VLdtCamp19."','Si')";
			$VLdtDatosPar = execute_query($VLQryPar,$VLConexion);
		}else {
//// ----------------- CREAMOS AL REPRESENTANTE LEGAL	--------------------------------------------------------------------
			$VLQryRep=$VLQry5."'".$VLdtCamp13."','".$VLdtCamp14."','".$VLdtCamp16."','";
			$VLQryRep.=$VLdtCamp17."','','".$VLdtCamp15."','','";
			$VLQryRep.= "','".$VLdtCamp20."','','".$VLdtCamp23."','',1)";
			$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);

/// ------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE------------------------------------------------------------------
			$VLQryRep=$VLQry0.$VLQry2."p.".$VLQryCampo2."='".$VLdtCamp13."'".$VLQry2."p.";
			$VLQryRep.=$VLQryCampo3."='".$VLdtCamp14."'".$VLQry2."p.".$VLQryCampo4."='".$VLdtCamp15."'";
			$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
			$VLnuDatosRep = total_records($VLdtDatosRep);
			if ( $VLnuDatosRep>0 )
			{
//// -------------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE----------------------------------------
				$VLdtCamp12=get_result($VLdtDatosRep,0,"p.".$VLQryCampo1);
/////// ---------------------   LO ASIGNAMOS AL ESTUDIANTE-------------------------------------------------------------------
/////// ----------------------------------PRNTSC------------------------------------------------------------------------
				$VLQryPar=$VLQry12.$VLdtCamp1.",".$VLdtCamp12.",'".$VLdtCamp18."','".$VLdtCamp21;
				$VLQryPar.="','".$VLdtCamp19."','Si')";
				$VLdtDatosPar = execute_query($VLQryPar,$VLConexion);
			}else{
				$VLMensaje="ERROR AL CREAR AL REPRESENTANTE , COMUNIQUESE CON SOPORTE TECNICO";
			}
		}
	}		
}
break 1; 
case "cargar":
//// VERIFICAMOS QUE TENGAMOS EL CODIGO DEL ESTUDIANTE //////////////////////////////
if ($VLdtCamp1!=""){
///  RECUPERAMOS LOS DATOS DEL ESTUDIANTE ///////////////////////////////////////////
	$QryEst=$VLQry1.$VLQry2."p.".$VLQryCampo1."=".$VLdtCamp1;
	$VLdtDatosEst = execute_query($QryEst,$VLConexion);
	$VLnuDatosEst = total_records($VLdtDatosEst);
	if ($VLnuDatosEst==1){
///  CARGAMOS LOS DATOS DEL ESTUDIANTE //////////////////////////////////////////////
		$VLdtCamp2=get_result($VLdtDatosEst,0,"p.".$VLQryCampo2);
		$VLdtCamp3=get_result($VLdtDatosEst,0,"p.".$VLQryCampo3);
		$VLdtCamp4=get_result($VLdtDatosEst,0,"p.".$VLQryCampo4);
		$VLdtCamp5=get_result($VLdtDatosEst,0,"p.".$VLQryCampo5);
		$VLdtCamp6=get_result($VLdtDatosEst,0,"p.".$VLQryCampo6);
		$VLdtCamp7=get_result($VLdtDatosEst,0,"p.".$VLQryCampo7);
		$VLdtCamp8=get_result($VLdtDatosEst,0,"p.".$VLQryCampo8);
		$VLdtCamp9=get_result($VLdtDatosEst,0,"p.".$VLQryCampo9);
		$VLdtCamp10=get_result($VLdtDatosEst,0,"p.".$VLQryCampo10);
		$VLdtCamp11=get_result($VLdtDatosEst,0,"p.".$VLQryCampo11);
		$VLdtCamp22=get_result($VLdtDatosEst,0,"p.".$VLQryCampo22);

///  RECUPERAMOS LOS DATOS DEL REP LEGAL ////////////////////////////////////////////
		
		$QryRep=$VLQry21.$VLdtCamp1;
		$VLdtDatosRep = execute_query($QryRep,$VLConexion);
		$VLnuDatosRep = total_records($VLdtDatosRep);
		if ($VLnuDatosRep>0){
/// CARGAMOS LOS DATOS DEL REP LEGAL ////////////////////////////////////////////////
			$VLdtCamp12=get_result($VLdtDatosRep,0,"p.".$VLQryCampo1);
			$VLdtCamp13=get_result($VLdtDatosRep,0,"p.".$VLQryCampo2);
			$VLdtCamp14=get_result($VLdtDatosRep,0,"p.".$VLQryCampo3);
			$VLdtCamp15=get_result($VLdtDatosRep,0,"p.".$VLQryCampo4);
			$VLdtCamp16=get_result($VLdtDatosRep,0,"p.".$VLQryCampo5);
			$VLdtCamp17=get_result($VLdtDatosRep,0,"p.".$VLQryCampo6);
			$VLdtCamp18=get_result($VLdtDatosRep,0,"f.".$VLQryCampo18);
			$VLdtCamp19=get_result($VLdtDatosRep,0,"f.".$VLQryCampo19);
			$VLdtCamp20=get_result($VLdtDatosRep,0,"p.".$VLQryCampo10);
			$VLdtCamp21=get_result($VLdtDatosRep,0,"f.".$VLQryCampo21);
			$VLdtCamp23=get_result($VLdtDatosRep,0,"p.".$VLQryCampo23);
		}else {
/// EL ESTUDIANTE NO TIENE REPRESENTANTE LEGAL ////////////////////////////////////////////////
			$VLMensaje="EL ESTUDIANTE NO TIENE ASIGADO REPRESENTANTE LEGAL ";
			}
	}else{
		$VLMensaje="EL CODIGO DEL ESTUDIANTE NO EXISTE";		
	}
} else {
	$VLMensaje="EXISTIO UN ERROR AL CARGAR LOS DATOS DEL ESTUDIANTE";	
}
//echo "cargar";
break 1; 
case "buscar":
//echo "buscar";
break 1; 
case "rag":
	$Vtqueryrag=$VLQry1.$VLQry2."p.".$VLQryCampo1."=".$VLdtCamp1;
	$VLdtDatosrag = execute_query($Vtqueryrag,$VLConexion);
	$VLnuDatosrag = total_records($VLdtDatosrag);
	if ( $VLnuDatosrag>0 )
	{
		$VLdtCamp2=get_result($VLdtDatosrag,0,"p.".$VLQryCampo2);
		$VLdtCamp3=get_result($VLdtDatosrag,0,"p.".$VLQryCampo3);
		$VLdtCamp4=get_result($VLdtDatosrag,0,"p.".$VLQryCampo4);
		$VLdtCamp5=get_result($VLdtDatosrag,0,"p.".$VLQryCampo5);
		$VLdtCamp6=get_result($VLdtDatosrag,0,"p.".$VLQryCampo6);
		$VLdtCamp7=get_result($VLdtDatosrag,0,"p.".$VLQryCampo7);
		$VLdtCamp8=get_result($VLdtDatosrag,0,"p.".$VLQryCampo8);
		$VLdtCamp9=get_result($VLdtDatosrag,0,"p.".$VLQryCampo9);
		$VLdtCamp10=get_result($VLdtDatosrag,0,"p.".$VLQryCampo10);
		$VLdtCamp22=get_result($VLdtDatosrag,0,"p.".$VLQryCampo22);
		$VLdtCamp29=get_result($VLdtDatosrag,0,"p.".$VLQryCampo29);
		$VLdtCamp30=get_result($VLdtDatosrag,0,"p.".$VLQryCampo30);
		$VLdtCamp31=get_result($VLdtDatosrag,0,"p.".$VLQryCampo31);
	}
	/// consulto los datos de salud
	$VtQdtsdsld=$VLQry25.$VLQry24.$VLQryCampo1."=".$VLdtCamp1;
	$VLdtdtsdsld = execute_query($VtQdtsdsld,$VLConexion);
	$VLnuDatosdtsdsld = total_records($VLdtdtsdsld);
	if ( $VLnuDatosdtsdsld>0 )
	{
		$VLdtCamp26=get_result($VLdtdtsdsld,0,$VLQryCampo26);
		$VLdtCamp27=get_result($VLdtdtsdsld,0,$VLQryCampo27);
		$VLdtCamp32=get_result($VLdtdtsdsld,0,$VLQryCampo32);
	}
	///// CONSULTO LOS REPRESENTANTES Y FAMILIARES
	$VtQdtprntsc=$VLQry21.$VLdtCamp1;
	$VLdtprntsc = execute_query($VtQdtprntsc,$VLConexion);
	$VLnuDatosprntsc = total_records($VLdtprntsc);
	if ( $VLnuDatosprntsc>0 )
	{
		$VLdtCamp40=get_result($VLdtprntsc,0,$VLQryCampo40);
		$VLdtCamp41=get_result($VLdtprntsc,0,$VLQryCampo41);
		$VLdtCamp42=get_result($VLdtprntsc,0,$VLQryCampo42);
		$VLdtCamp43=get_result($VLdtprntsc,0,$VLQryCampo43);
		$VLdtCamp44=get_result($VLdtprntsc,0,$VLQryCampo44);
		$VLdtCamp45=get_result($VLdtprntsc,0,$VLQryCampo45);
		$VLdtCamp46=get_result($VLdtprntsc,0,$VLQryCampo46);
		$VLdtCamp47=get_result($VLdtprntsc,0,$VLQryCampo47);
		$VLdtCamp48=get_result($VLdtprntsc,0,$VLQryCampo48);
		$VLdtCamp49=get_result($VLdtprntsc,0,$VLQryCampo49);
		$VLdtCamp50=get_result($VLdtprntsc,0,$VLQryCampo50);
		$VLdtCamp51=get_result($VLdtprntsc,0,$VLQryCampo51);
		$VLdtCamp52=get_result($VLdtprntsc,0,$VLQryCampo52);
		$VLdtCamp53=get_result($VLdtprntsc,0,$VLQryCampo53);
		
		$VLdtCamp60=get_result($VLdtprntsc,1,$VLQryCampo40);
		$VLdtCamp61=get_result($VLdtprntsc,1,$VLQryCampo41);
		$VLdtCamp62=get_result($VLdtprntsc,1,$VLQryCampo42);
		$VLdtCamp63=get_result($VLdtprntsc,1,$VLQryCampo43);
		$VLdtCamp64=get_result($VLdtprntsc,1,$VLQryCampo44);
		$VLdtCamp65=get_result($VLdtprntsc,1,$VLQryCampo45);
		$VLdtCamp66=get_result($VLdtprntsc,1,$VLQryCampo46);
		$VLdtCamp67=get_result($VLdtprntsc,1,$VLQryCampo47);
		$VLdtCamp68=get_result($VLdtprntsc,1,$VLQryCampo48);
		$VLdtCamp69=get_result($VLdtprntsc,1,$VLQryCampo49);
		$VLdtCamp70=get_result($VLdtprntsc,1,$VLQryCampo50);
		$VLdtCamp71=get_result($VLdtprntsc,1,$VLQryCampo51);
		$VLdtCamp72=get_result($VLdtprntsc,1,$VLQryCampo52);
		$VLdtCamp73=get_result($VLdtprntsc,1,$VLQryCampo53);
		
		$VLdtCamp80=get_result($VLdtprntsc,2,$VLQryCampo40);
		$VLdtCamp81=get_result($VLdtprntsc,2,$VLQryCampo41);
		$VLdtCamp82=get_result($VLdtprntsc,2,$VLQryCampo42);
		$VLdtCamp83=get_result($VLdtprntsc,2,$VLQryCampo43);
		$VLdtCamp84=get_result($VLdtprntsc,2,$VLQryCampo44);
		$VLdtCamp85=get_result($VLdtprntsc,2,$VLQryCampo45);
		$VLdtCamp86=get_result($VLdtprntsc,2,$VLQryCampo46);
		$VLdtCamp87=get_result($VLdtprntsc,2,$VLQryCampo47);
		$VLdtCamp88=get_result($VLdtprntsc,2,$VLQryCampo48);
		$VLdtCamp89=get_result($VLdtprntsc,2,$VLQryCampo49);
		$VLdtCamp90=get_result($VLdtprntsc,2,$VLQryCampo50);
		$VLdtCamp91=get_result($VLdtprntsc,2,$VLQryCampo51);
		$VLdtCamp92=get_result($VLdtprntsc,2,$VLQryCampo52);
		$VLdtCamp93=get_result($VLdtprntsc,2,$VLQryCampo53);	
	}
	////// CONSULTO REFERENCIAS FAMILIARES 
	$VtQdtrfrnc=$VLQry26.$VLQry24.$VLQryCampo1."=".$VLdtCamp1;
	$VLdtrfrnc = execute_query($VtQdtrfrnc,$VLConexion);
	$VLnuDatosrfrnc = total_records($VLdtrfrnc);
	if ( $VLnuDatosrfrnc>0 )
	{
		$VLdtCamp100=get_result($VLdtrfrnc,0,$VLQryCampo100);
		$VLdtCamp101=get_result($VLdtrfrnc,0,$VLQryCampo101);
		$VLdtCamp102=get_result($VLdtrfrnc,0,$VLQryCampo102);
		$VLdtCamp103=get_result($VLdtrfrnc,0,$VLQryCampo103);
		$VLdtCamp104=get_result($VLdtrfrnc,0,$VLQryCampo104);
		$VLdtCamp105=get_result($VLdtrfrnc,0,$VLQryCampo105);
		$VLdtCamp106=get_result($VLdtrfrnc,0,$VLQryCampo106);
		$VLdtCamp107=get_result($VLdtrfrnc,0,$VLQryCampo107);
		$VLdtCamp110=get_result($VLdtrfrnc,0,$VLQryCampo110);
		$VLdtCamp111=get_result($VLdtrfrnc,0,$VLQryCampo111);
		$VLdtCamp112=get_result($VLdtrfrnc,0,$VLQryCampo112);
		$VLdtCamp113=get_result($VLdtrfrnc,0,$VLQryCampo113);
		$VLdtCamp114=get_result($VLdtrfrnc,0,$VLQryCampo114);
		$VLdtCamp115=get_result($VLdtrfrnc,0,$VLQryCampo115);
		$VLdtCamp116=get_result($VLdtrfrnc,0,$VLQryCampo116);
	}
	//////// CONSULTO DATOS ACADEMICOS
	$VtQdtdtscdmcs=$VLQry27.$VLQry24.$VLQryCampo1."=".$VLdtCamp1;
	$VLdtdtscdmcs = execute_query($VtQdtdtscdmcs,$VLConexion);
	$VLnuDatosdtscdmcs = total_records($VLdtdtscdmcs);
	if ( $VLnuDatosdtscdmcs>0 )
	{
		$VLdtCamp120=get_result($VLdtdtscdmcs,0,$VLQryCampo120);
		$VLdtCamp121=get_result($VLdtdtscdmcs,0,$VLQryCampo121);
	}
	///////   CONSULTO PASTORAL
	$VtQdtdtspstrl=$VLQry28.$VLQry24.$VLQryCampo1."=".$VLdtCamp1;
	$VLdtdtspstrl = execute_query($VtQdtdtspstrl,$VLConexion);
	$VLnuDatosdtspstrl = total_records($VLdtdtspstrl);
	if ( $VLnuDatosdtspstrl>0 )
	{
		$VLdtCamp122=get_result($VLdtdtspstrl,0,$VLQryCampo122);
		$VLdtCamp123=get_result($VLdtdtspstrl,0,$VLQryCampo123);
		$VLdtCamp124=get_result($VLdtdtspstrl,0,$VLQryCampo124);
		$VLdtCamp125=get_result($VLdtdtspstrl,0,$VLQryCampo125);
		$VLdtCamp126=get_result($VLdtdtspstrl,0,$VLQryCampo126);
		$VLdtCamp127=get_result($VLdtdtspstrl,0,$VLQryCampo127);
		$VLdtCamp128=get_result($VLdtdtspstrl,0,$VLQryCampo128);
		$VLdtCamp129=get_result($VLdtdtspstrl,0,$VLQryCampo129);
	}

//echo "buscar";
break 1; 
case "modificar2":

///////////////// ACTUALIZAMOS DATOS DEL ESTUDIANTE ////////////////////////////////////////////
	if ( $VLdtCamp2=="" || $VLdtCamp3==""){
///--------------- SI NO ESTAN LOS CAMPOS NECESARIOS DEL ESTUDIANTE NO SE HACE NADA -----------------------
		$VLMensaje="LOS APELLIDOS O NOMBRES DEL ESTUDIANTE HAN SIDO BORRADOS";
	}else{
///--------------- SI ESTAN LOS CAMPOS SE ACTUALIZAN LOS DATOS DEL ESTUDIANTE ----------------------------
		$VLQryEst= $VLQry22;
		$VLQryEst.= $VLQryCampo2."='".$VLdtCamp2;
		$VLQryEst.= "', ".$VLQryCampo3."='".$VLdtCamp3;
		$VLQryEst.= "', ".$VLQryCampo4."='".$VLdtCamp4;
		$VLQryEst.= "', ".$VLQryCampo5."='".$VLdtCamp5;
		$VLQryEst.= "', ".$VLQryCampo6."='".$VLdtCamp6;
		$VLQryEst.= "', ".$VLQryCampo7."='".$VLdtCamp7;
		$VLQryEst.= "', ".$VLQryCampo8."='".$VLdtCamp8;
		$VLQryEst.= "', ".$VLQryCampo9."='".$VLdtCamp9;
		$VLQryEst.= "', ".$VLQryCampo10."='".$VLdtCamp10;
		$VLQryEst.= "', ".$VLQryCampo22."='".$VLdtCamp22;
		$VLQryEst.= "', ".$VLQryCampo29."='".$VLdtCamp29;
		$VLQryEst.= "', ".$VLQryCampo30."='".$VLdtCamp30;
		$VLQryEst.= "', ".$VLQryCampo31."='".$VLdtCamp31;
		$VLQryEst.="' ".$VLQry24.$VLQryCampo1."=".$VLdtCamp1;
		$VLdtDatosEst = execute_query($VLQryEst,$VLConexion);
//////////////// ACTUALIZAMOS DATOS DE LAS TABLAS //////////////////////////////////////////////
///-------------- DTSDSLD --------------------------------------------------------------------
		$VLQryDTSDSLD= $VLQry29;
		$VLQryDTSDSLD.= $VLQryCampo32."='".$VLdtCamp32;
		$VLQryDTSDSLD.= "', ".$VLQryCampo26."='".$VLdtCamp26;
		$VLQryDTSDSLD.= "', ".$VLQryCampo27."='".$VLdtCamp27;
		$VLQryDTSDSLD.="' ".$VLQry24.$VLQryCampo1."=".$VLdtCamp1;
		$VLdtDTSDSLD = execute_query($VLQryDTSDSLD,$VLConexion);
///-------------- RFRNCSFMLRS --------------------------------------------------------------------
		$VLQryRFRNCSFMLRS= $VLQry30;
		$VLQryRFRNCSFMLRS.= $VLQryCampo100."='".$VLdtCamp100;
		$VLQryRFRNCSFMLRS.= "', ".$VLQryCampo101."='".$VLdtCamp101;
		$VLQryRFRNCSFMLRS.= "', ".$VLQryCampo102."='".$VLdtCamp102;
		$VLQryRFRNCSFMLRS.= "', ".$VLQryCampo103."='".$VLdtCamp103;
		$VLQryRFRNCSFMLRS.= "', ".$VLQryCampo104."='".$VLdtCamp104;
		$VLQryRFRNCSFMLRS.= "', ".$VLQryCampo105."='".$VLdtCamp105;
		$VLQryRFRNCSFMLRS.= "', ".$VLQryCampo106."='".$VLdtCamp106;
		$VLQryRFRNCSFMLRS.= "', ".$VLQryCampo107."='".$VLdtCamp107;
		$VLQryRFRNCSFMLRS.= "', ".$VLQryCampo110."='".$VLdtCamp110;
		$VLQryRFRNCSFMLRS.= "', ".$VLQryCampo111."='".$VLdtCamp111;
		$VLQryRFRNCSFMLRS.= "', ".$VLQryCampo112."='".$VLdtCamp112;
		$VLQryRFRNCSFMLRS.= "', ".$VLQryCampo113."='".$VLdtCamp113;
		$VLQryRFRNCSFMLRS.= "', ".$VLQryCampo114."='".$VLdtCamp114;
		$VLQryRFRNCSFMLRS.= "', ".$VLQryCampo115."='".$VLdtCamp115;
		$VLQryRFRNCSFMLRS.= "', ".$VLQryCampo116."='".$VLdtCamp116;
		$VLQryRFRNCSFMLRS.="' ".$VLQry24.$VLQryCampo1."=".$VLdtCamp1;
		$VLdtRFRNCSFMLRS = execute_query($VLQryRFRNCSFMLRS,$VLConexion);
///-------------- DTSCDMCS --------------------------------------------------------------------
		$VLQryDTSCDMCS= $VLQry31;
		$VLQryDTSCDMCS.= $VLQryCampo120."='".$VLdtCamp120;
		$VLQryDTSCDMCS.= "', ".$VLQryCampo121."='".$VLdtCamp121;
		$VLQryDTSCDMCS.="' ".$VLQry24.$VLQryCampo1."=".$VLdtCamp1;
		$VLdtDTSCDMCS = execute_query($VLQryDTSCDMCS,$VLConexion);
///-------------- DTSPSTRL --------------------------------------------------------------------
		$VLQryDTSPSTRL= $VLQry32;
		$VLQryDTSPSTRL.= $VLQryCampo122."='".$VLdtCamp122;
		$VLQryDTSPSTRL.= "', ".$VLQryCampo123."='".$VLdtCamp123;
		$VLQryDTSPSTRL.= "', ".$VLQryCampo125."='".$VLdtCamp125;
		$VLQryDTSPSTRL.= "', ".$VLQryCampo126."='".$VLdtCamp126;
		$VLQryDTSPSTRL.= "', ".$VLQryCampo127."='".$VLdtCamp127;
		$VLQryDTSPSTRL.= "', ".$VLQryCampo128."='".$VLdtCamp128;
		$VLQryDTSPSTRL.= "', ".$VLQryCampo129."='".$VLdtCamp129;
		$VLQryDTSPSTRL.="' ".$VLQry24.$VLQryCampo1."=".$VLdtCamp1;
		$VLdtDTSPSTRL = execute_query($VLQryDTSPSTRL,$VLConexion);


//////////////// ACTUALIZAMOS DATOS DE LOS REPRESENTANTES LEGALES ///////////////////////////
///----------------  RECUPERAMOS TODOS LOS REPRESENTANTES ASIGNADOS AL ESTUDIANTE --------
		$VLQryFam= $VLQry21.$VLdtCamp1;
		$VLdtDatosFam = execute_query($VLQryFam,$VLConexion);
		$VLnuDatosFam = total_records($VLdtDatosFam);
		if ( $VLnuDatosFam>0 ){
			
///------------------ REPRESENTANTE LEGAL 1 ------------------------------------------------
/// ---------------- DETERMINAMOS QUE TENGA LOS CAMPOS NECESARIOS
			if( $VLdtCamp53!=""){/// SI SE HA RECUPERADO DE LA BDD
				if ( $VLdtCamp44!=""){ /// CONFIRMAMOS Q TENGA EL NUMERO DE CEDULA
					if($VLdtCamp41!="" && $VLdtCamp42!="" ){
						$Existe="no";
						for($j=0; $j<$VLnuDatosFam; $j++){
	/// ---------------- CON EL NUMERO DE CEDULA CONFIRMAMOS QUE SEA EL REPRESENTANTE
						$VLdtCamp44a=get_result($VLdtDatosFam,$j,$VLQryCampo44);
						$VLdtCamp53a=get_result($VLdtDatosFam,$j,$VLQryCampo53);
							if(strcmp(trim($VLdtCamp44),trim($VLdtCamp44a))==0 ){ 
								$Existe="si";
								$No=$j;
								$j=$VLnuDatosFam;
							}
						}
						if($Existe=="si"){ /// si ya esta asignado al estudiante
/// ---------------- SI EXISTE ACTUALIZAMOS LOS DATOS DE LA PERSONA ------------
							$VLQryRep= $VLQry22;
							$VLQryRep.= $VLQryCampo2."='".$VLdtCamp41."' ,";//apellido
							$VLQryRep.= $VLQryCampo3."='".$VLdtCamp42."' ,";//nombre
							$VLQryRep.= $VLQryCampo5."='".$VLdtCamp45."' ,";//sexo
							$VLQryRep.= $VLQryCampo6."='".$VLdtCamp46."' ,";//fecha nacimiento
							$VLQryRep.= $VLQryCampo8."='".$VLdtCamp47."' ,";//direccion
							$VLQryRep.= $VLQryCampo10."='".$VLdtCamp48."' ,";//telefono
							$VLQryRep.= $VLQryCampo34."='".$VLdtCamp51."' ,";//estado civil
							$VLQryRep.= $VLQryCampo22."='".$VLdtCamp43."'";//documento
							$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp53a."'";//por el codigo encontrado
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
/// ----------------- ACTUALIZAMOS LOS DATOS DEL PARIENTE -------------------
							$VLQryRep= $VLQry23;
							$VLQryRep.= $VLQryCampo18."='".$VLdtCamp40."', ";//parentezco
							$VLQryRep.= $VLQryCampo19."='".$VLdtCamp49."', ";//Profesion
							$VLQryRep.= $VLQryCampo21."='".$VLdtCamp50."', ";//Lugar donde trabaja
							$VLQryRep.= $VLQryCampo25."='".$VLdtCamp52."' ";//Representante legal
							$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp1."'".$VLQry2.$VLQryCampo12."='".$VLdtCamp53a."'";//por el codigo encontrado
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
							
						}else{ /// si no esta asignado al estudiante
/// ---------------- SI NO ESTA EN LOS ASIGNADOS LO BUSCAMOS EN LA BDD
							$VLQryRep= $VLQry0.$VLQry2.$VLQryCampo4."='".$VLdtCamp44."'";
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
							$VLnuDatosRep = total_records($VLdtDatosRep);
							if ( $VLnuDatosRep>0){
///----------------- SI ESTA ACTUALIZAMOS LOS DATOS
								$VLdtCamp44a=get_result($VLdtDatosRep,0,$VLQryCampo44); /// recuperamos cedula
								$VLdtCamp53a=get_result($VLdtDatosRep,0,$VLQryCampo53); /// recuperamos codigo
								if(strcmp(trim($VLdtCamp44),trim($VLdtCamp44a))==0 ){ 
/// ------------------  ACTUALIZAMOS A LA PERSONA	
/// ---------------- SI EXISTE ACTUALIZAMOS LOS DATOS DE LA PERSONA ------------
									$VLQryRep= $VLQry22;
									$VLQryRep.= $VLQryCampo2."='".$VLdtCamp41."' ,";//apellido
									$VLQryRep.= $VLQryCampo3."='".$VLdtCamp42."' ,";//nombre
									$VLQryRep.= $VLQryCampo5."='".$VLdtCamp45."' ,";//sexo
									$VLQryRep.= $VLQryCampo6."='".$VLdtCamp46."' ,";//fecha nacimiento
									$VLQryRep.= $VLQryCampo8."='".$VLdtCamp47."' ,";//direccion
									$VLQryRep.= $VLQryCampo10."='".$VLdtCamp48."' ,";//telefono
									$VLQryRep.= $VLQryCampo34."='".$VLdtCamp51."' ,";//estado civil
									$VLQryRep.= $VLQryCampo22."='".$VLdtCamp43."'";//documento
									$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp53a."'";//por el codigo encontrado
									$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
/// ----------------- ACTUALIZAMOS LOS DATOS DEL PARIENTE -------------------
									$VLQryRep= $VLQry23;
									$VLQryRep.= $VLQryCampo18."='".$VLdtCamp40."', ";//parentezco
									$VLQryRep.= $VLQryCampo19."='".$VLdtCamp49."', ";//Profesion
									$VLQryRep.= $VLQryCampo21."='".$VLdtCamp50."', ";//Lugar donde trabaja
									$VLQryRep.= $VLQryCampo25."='".$VLdtCamp52."' ";//Representante legal
									$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp1."'".$VLQry2.$VLQryCampo12."='".$VLdtCamp53a."'";//por el codigo encontrado
									$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
								}else{
									$VLMensaje="NO COINCIDEN LAS CEDULAS RL1";
								}
							}else{
/// ---------------- SI NO ESTA EN LA BDD LO CREAMOS
								$VLQryRep=$VLQry5."'".$VLdtCamp41."','".$VLdtCamp42."','".$VLdtCamp45."','";
								$VLQryRep.=$VLdtCamp46."','','".$VLdtCamp44."','".$VLdtCamp47."','";
								$VLQryRep.= "','".$VLdtCamp48."','','".$VLdtCamp43."','".$VLdtCamp51."',1)";
								$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
				
/// ------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE------------------------------------------------------------------
								$VLQryRep=$VLQry0.$VLQry2."p.".$VLQryCampo2."='".$VLdtCamp41."'".$VLQry2."p.";
								$VLQryRep.=$VLQryCampo3."='".$VLdtCamp42."'".$VLQry2."p.".$VLQryCampo4."='".$VLdtCamp44."'";
								$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
								$VLnuDatosRep = total_records($VLdtDatosRep);
								if ( $VLnuDatosRep>0 )
								{
//// -------------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE----------------------------------------
									$VLdtCamp53=get_result($VLdtDatosRep,0,"p.".$VLQryCampo1);
/////// ---------------------   LO ASIGNAMOS AL ESTUDIANTE-------------------------------------------------------------------
/////// ----------------------------------PRNTSC------------------------------------------------------------------------
									$VLQryPar=$VLQry12.$VLdtCamp1.",".$VLdtCamp53.",'".$VLdtCamp40."','".$VLdtCamp50;
									$VLQryPar.="','".$VLdtCamp49."','".$VLdtCamp52."')";
									$VLdtDatosPar = execute_query($VLQryPar,$VLConexion);
								}else{
									$VLMensaje="ERROR AL CREAR AL REPRESENTANTE , COMUNIQUESE CON SOPORTE TECNICO, RL1";
								}
							}
						}						
					} else {
	/// ................ SI FALTA EL NOMBRE Y EL APELLIDO ES PORQUE SE QUIERE BORRAR DEL ESTUDIANTE
	/// ................ BORRAMOS EL PARENTESCO
						$VLQryFam= $VLQry33.$VLdtCamp53.$VLQry2.$VLQryCampo1."=".$VLdtCamp1;
						$VLdtDatosFam = execute_query($VLQryFam,$VLConexion);
						$VLMensaje="EL REPRESENTANTE HA SIDO ELIMINADO RL1";	
					}
				}else{
					$VLMensaje="EL REPRESENTANTE DEBE TENER LA CEDULA RL1";	
				}
			} else { /// SI NO SE HA RECUPERADO DE LA BDD
/// ---------------- EL REPRESENTANTE NO TIENE CODIGO EN LA BDD	RECUPERADO ES UNA PERSONA NUEVA
				if ( $VLdtCamp44!=""){ /// CONFIRMAMOS Q TENGA EL NUMERO DE CEDULA
					if($VLdtCamp41!="" && $VLdtCamp42!="" ){
						$Existe="no";
						for($j=0; $j<$VLnuDatosFam; $j++){
	/// ---------------- CON EL NUMERO DE CEDULA CONFIRMAMOS QUE SEA EL REPRESENTANTE
						$VLdtCamp44a=get_result($VLdtDatosFam,$j,$VLQryCampo44);
						$VLdtCamp53a=get_result($VLdtDatosFam,$j,$VLQryCampo53);
							if(strcmp(trim($VLdtCamp44),trim($VLdtCamp44a))==0 ){ 
								$Existe="si";
								$No=$j;
								$j=$VLnuDatosFam;
							}
						}
						if($Existe=="si"){ /// si ya esta asignado al estudiante
/// ---------------- SI EXISTE ACTUALIZAMOS LOS DATOS DE LA PERSONA ------------
							$VLQryRep= $VLQry22;
							$VLQryRep.= $VLQryCampo2."='".$VLdtCamp41."' ,";//apellido
							$VLQryRep.= $VLQryCampo3."='".$VLdtCamp42."' ,";//nombre
							$VLQryRep.= $VLQryCampo5."='".$VLdtCamp45."' ,";//sexo
							$VLQryRep.= $VLQryCampo6."='".$VLdtCamp46."' ,";//fecha nacimiento
							$VLQryRep.= $VLQryCampo8."='".$VLdtCamp47."' ,";//direccion
							$VLQryRep.= $VLQryCampo10."='".$VLdtCamp48."' ,";//telefono
							$VLQryRep.= $VLQryCampo34."='".$VLdtCamp51."' ,";//estado civil
							$VLQryRep.= $VLQryCampo22."='".$VLdtCamp43."'";//documento
							$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp53a."'";//por el codigo encontrado
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
/// ----------------- ACTUALIZAMOS LOS DATOS DEL PARIENTE -------------------
							$VLQryRep= $VLQry23;
							$VLQryRep.= $VLQryCampo18."='".$VLdtCamp40."', ";//parentezco
							$VLQryRep.= $VLQryCampo19."='".$VLdtCamp49."', ";//Profesion
							$VLQryRep.= $VLQryCampo21."='".$VLdtCamp50."', ";//Lugar donde trabaja
							$VLQryRep.= $VLQryCampo25."='".$VLdtCamp52."' ";//Representante legal
							$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp1."'".$VLQry2.$VLQryCampo12."='".$VLdtCamp53a."'";//por el codigo encontrado
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
							
						}else{ /// si no esta asignado al estudiante
/// ---------------- SI NO ESTA EN LOS ASIGNADOS LO BUSCAMOS EN LA BDD
							$VLQryRep= $VLQry0.$VLQry2.$VLQryCampo4."='".$VLdtCamp44."'";
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
							$VLnuDatosRep = total_records($VLdtDatosRep);
							if ( $VLnuDatosRep>0){
///----------------- SI ESTA ACTUALIZAMOS LOS DATOS
								$VLdtCamp44a=get_result($VLdtDatosRep,0,$VLQryCampo44); /// recuperamos cedula
								$VLdtCamp53a=get_result($VLdtDatosRep,0,$VLQryCampo53); /// recuperamos codigo
								if(strcmp(trim($VLdtCamp44),trim($VLdtCamp44a))==0 ){ 
/// ------------------  ACTUALIZAMOS A LA PERSONA	
/// ---------------- SI EXISTE ACTUALIZAMOS LOS DATOS DE LA PERSONA ------------
									$VLQryRep= $VLQry22;
									$VLQryRep.= $VLQryCampo2."='".$VLdtCamp41."' ,";//apellido
									$VLQryRep.= $VLQryCampo3."='".$VLdtCamp42."' ,";//nombre
									$VLQryRep.= $VLQryCampo5."='".$VLdtCamp45."' ,";//sexo
									$VLQryRep.= $VLQryCampo6."='".$VLdtCamp46."' ,";//fecha nacimiento
									$VLQryRep.= $VLQryCampo8."='".$VLdtCamp47."' ,";//direccion
									$VLQryRep.= $VLQryCampo10."='".$VLdtCamp48."' ,";//telefono
									$VLQryRep.= $VLQryCampo34."='".$VLdtCamp51."' ,";//estado civil
									$VLQryRep.= $VLQryCampo22."='".$VLdtCamp43."'";//documento
									$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp53a."'";//por el codigo encontrado
									$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
/// ----------------- ACTUALIZAMOS LOS DATOS DEL PARIENTE -------------------
									$VLQryRep= $VLQry23;
									$VLQryRep.= $VLQryCampo18."='".$VLdtCamp40."', ";//parentezco
									$VLQryRep.= $VLQryCampo19."='".$VLdtCamp49."', ";//Profesion
									$VLQryRep.= $VLQryCampo21."='".$VLdtCamp50."', ";//Lugar donde trabaja
									$VLQryRep.= $VLQryCampo25."='".$VLdtCamp52."' ";//Representante legal
									$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp1."'".$VLQry2.$VLQryCampo12."='".$VLdtCamp53a."'";//por el codigo encontrado
									$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
									
								}else{
									$VLMensaje="NO COINCIDEN LAS CEDULAS RL1";
								}
							}else{
/// ---------------- SI NO ESTA EN LA BDD LO CREAMOS
								$VLQryRep=$VLQry5."'".$VLdtCamp41."','".$VLdtCamp42."','".$VLdtCamp45."','";
								$VLQryRep.=$VLdtCamp46."','','".$VLdtCamp44."','".$VLdtCamp47."','";
								$VLQryRep.= "','".$VLdtCamp48."','','".$VLdtCamp43."','".$VLdtCamp51."',1)";
								$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
				
/// ------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE------------------------------------------------------------------
								$VLQryRep=$VLQry0.$VLQry2."p.".$VLQryCampo2."='".$VLdtCamp41."'".$VLQry2."p.";
								$VLQryRep.=$VLQryCampo3."='".$VLdtCamp42."'".$VLQry2."p.".$VLQryCampo4."='".$VLdtCamp44."'";
								$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
								$VLnuDatosRep = total_records($VLdtDatosRep);
								if ( $VLnuDatosRep>0 )
								{
//// -------------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE----------------------------------------
									$VLdtCamp53=get_result($VLdtDatosRep,0,"p.".$VLQryCampo1);
/////// ---------------------   LO ASIGNAMOS AL ESTUDIANTE-------------------------------------------------------------------
/////// ----------------------------------PRNTSC------------------------------------------------------------------------
									$VLQryPar=$VLQry12.$VLdtCamp1.",".$VLdtCamp53.",'".$VLdtCamp40."','".$VLdtCamp50;
									$VLQryPar.="','".$VLdtCamp49."','".$VLdtCamp52."')";
									$VLdtDatosPar = execute_query($VLQryPar,$VLConexion);
								}else{
									$VLMensaje="ERROR AL CREAR AL REPRESENTANTE , COMUNIQUESE CON SOPORTE TECNICO, RL1";
								}
							}
						}						
					} else {
	/// ................ SI FALTA EL NOMBRE Y EL APELLIDO ES PORQUE SE QUIERE BORRAR DEL ESTUDIANTE
	/// ................ BORRAMOS EL PARENTESCO
						$VLQryFam= $VLQry33.$VLdtCamp53.$VLQry2.$VLQryCampo1."=".$VLdtCamp1;
						$VLdtDatosFam = execute_query($VLQryFam,$VLConexion);
						$VLMensaje="EL REPRESENTANTE HA SIDO ELIMINADO RL1";	
					}
				}else{
					
					$VLMensaje="EL REPRESENTANTE DEBE TENER LA CEDULA RL1";	
				}

			}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
///-------------------------------- REPRESENTANTE LEGAL 2 ------------------------------------------------
//////////////////////////////////////////////////////////////////////////////////////////////////////////

			if( $VLdtCamp73!=""){/// SI SE HA RECUPERADO DE LA BDD
				if ( $VLdtCamp64!=""){ /// CONFIRMAMOS Q TENGA EL NUMERO DE CEDULA
					if($VLdtCamp61!="" && $VLdtCamp62!="" ){
						$Existe="no";
						for($j=0; $j<$VLnuDatosFam; $j++){
	/// ---------------- CON EL NUMERO DE CEDULA CONFIRMAMOS QUE SEA EL REPRESENTANTE
						$VLdtCamp64a=get_result($VLdtDatosFam,$j,$VLQryCampo44);
						$VLdtCamp73a=get_result($VLdtDatosFam,$j,$VLQryCampo53);
							if(strcmp(trim($VLdtCamp64),trim($VLdtCamp64a))==0 ){ 
								$Existe="si";
								$No=$j;
								$j=$VLnuDatosFam;
							}
						}
						if($Existe=="si"){ /// si ya esta asignado al estudiante
/// ---------------- SI EXISTE ACTUALIZAMOS LOS DATOS DE LA PERSONA ------------
							$VLQryRep= $VLQry22;
							$VLQryRep.= $VLQryCampo2."='".$VLdtCamp61."' ,";//apellido
							$VLQryRep.= $VLQryCampo3."='".$VLdtCamp62."' ,";//nombre
							$VLQryRep.= $VLQryCampo5."='".$VLdtCamp65."' ,";//sexo
							$VLQryRep.= $VLQryCampo6."='".$VLdtCamp66."' ,";//fecha nacimiento
							$VLQryRep.= $VLQryCampo8."='".$VLdtCamp67."' ,";//direccion
							$VLQryRep.= $VLQryCampo10."='".$VLdtCamp68."' ,";//telefono
							$VLQryRep.= $VLQryCampo34."='".$VLdtCamp71."' ,";//estado civil
							$VLQryRep.= $VLQryCampo22."='".$VLdtCamp63."'";//documento
							$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp73a."'";//por el codigo encontrado
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
/// ----------------- ACTUALIZAMOS LOS DATOS DEL PARIENTE -------------------
							$VLQryRep= $VLQry23;
							$VLQryRep.= $VLQryCampo18."='".$VLdtCamp60."', ";//parentezco
							$VLQryRep.= $VLQryCampo19."='".$VLdtCamp69."', ";//Profesion
							$VLQryRep.= $VLQryCampo21."='".$VLdtCamp70."', ";//Lugar donde trabaja
							$VLQryRep.= $VLQryCampo25."='".$VLdtCamp72."' ";//Representante legal
							$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp1."'".$VLQry2.$VLQryCampo12."='".$VLdtCamp73a."'";//por el codigo encontrado
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
							
						}else{ /// si no esta asignado al estudiante
/// ---------------- SI NO ESTA EN LOS ASIGNADOS LO BUSCAMOS EN LA BDD
							$VLQryRep= $VLQry0.$VLQry2.$VLQryCampo4."='".$VLdtCamp64."'";
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
							$VLnuDatosRep = total_records($VLdtDatosRep);
							if ( $VLnuDatosRep>0){
///----------------- SI ESTA ACTUALIZAMOS LOS DATOS
								$VLdtCamp64a=get_result($VLdtDatosRep,0,$VLQryCampo44); /// recuperamos cedula
								$VLdtCamp73a=get_result($VLdtDatosRep,0,$VLQryCampo53); /// recuperamos codigo
								if(strcmp(trim($VLdtCamp64),trim($VLdtCamp64a))==0 ){ 
/// ------------------  ACTUALIZAMOS A LA PERSONA	
/// ---------------- SI EXISTE ACTUALIZAMOS LOS DATOS DE LA PERSONA ------------
									$VLQryRep= $VLQry22;
									$VLQryRep.= $VLQryCampo2."='".$VLdtCamp61."' ,";//apellido
									$VLQryRep.= $VLQryCampo3."='".$VLdtCamp62."' ,";//nombre
									$VLQryRep.= $VLQryCampo5."='".$VLdtCamp65."' ,";//sexo
									$VLQryRep.= $VLQryCampo6."='".$VLdtCamp66."' ,";//fecha nacimiento
									$VLQryRep.= $VLQryCampo8."='".$VLdtCamp67."' ,";//direccion
									$VLQryRep.= $VLQryCampo10."='".$VLdtCamp68."' ,";//telefono
									$VLQryRep.= $VLQryCampo34."='".$VLdtCamp71."' ,";//estado civil
									$VLQryRep.= $VLQryCampo22."='".$VLdtCamp63."'";//documento
									$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp73a."'";//por el codigo encontrado
									$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
/// ----------------- ACTUALIZAMOS LOS DATOS DEL PARIENTE -------------------
									$VLQryRep= $VLQry23;
									$VLQryRep.= $VLQryCampo18."='".$VLdtCamp60."', ";//parentezco
									$VLQryRep.= $VLQryCampo19."='".$VLdtCamp69."', ";//Profesion
									$VLQryRep.= $VLQryCampo21."='".$VLdtCamp70."', ";//Lugar donde trabaja
									$VLQryRep.= $VLQryCampo25."='".$VLdtCamp72."' ";//Representante legal
									$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp1."'".$VLQry2.$VLQryCampo12."='".$VLdtCamp73a."'";//por el codigo encontrado
									$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
								}else{
									$VLMensaje="NO COINCIDEN LAS CEDULAS RL2";
								}
							}else{
/// ---------------- SI NO ESTA EN LA BDD LO CREAMOS
								$VLQryRep=$VLQry5."'".$VLdtCamp61."','".$VLdtCamp62."','".$VLdtCamp65."','";
								$VLQryRep.=$VLdtCamp66."','','".$VLdtCamp64."','".$VLdtCamp67."','";
								$VLQryRep.= "','".$VLdtCamp68."','','".$VLdtCamp63."','".$VLdtCamp71."',1)";
								$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
				
/// ------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE------------------------------------------------------------------
								$VLQryRep=$VLQry0.$VLQry2."p.".$VLQryCampo2."='".$VLdtCamp61."'".$VLQry2."p.";
								$VLQryRep.=$VLQryCampo3."='".$VLdtCamp62."'".$VLQry2."p.".$VLQryCampo4."='".$VLdtCamp64."'";
								$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
								$VLnuDatosRep = total_records($VLdtDatosRep);
								if ( $VLnuDatosRep>0 )
								{
//// -------------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE----------------------------------------
									$VLdtCamp73=get_result($VLdtDatosRep,0,"p.".$VLQryCampo1);
/////// ---------------------   LO ASIGNAMOS AL ESTUDIANTE-------------------------------------------------------------------
/////// ----------------------------------PRNTSC------------------------------------------------------------------------
									$VLQryPar=$VLQry12.$VLdtCamp1.",".$VLdtCamp73.",'".$VLdtCamp60."','".$VLdtCamp70;
									$VLQryPar.="','".$VLdtCamp69."','".$VLdtCamp72."')";
									$VLdtDatosPar = execute_query($VLQryPar,$VLConexion);
								}else{
									$VLMensaje="ERROR AL CREAR AL REPRESENTANTE , COMUNIQUESE CON SOPORTE TECNICO RL2";
								}
							}
						}						
					} else {
	/// ................ SI FALTA EL NOMBRE Y EL APELLIDO ES PORQUE SE QUIERE BORRAR DEL ESTUDIANTE
	/// ................ BORRAMOS EL PARENTESCO
						$VLQryFam= $VLQry33.$VLdtCamp73.$VLQry2.$VLQryCampo1."=".$VLdtCamp1;
						$VLdtDatosFam = execute_query($VLQryFam,$VLConexion);
						$VLMensaje="EL REPRESENTANTE HA SIDO ELIMINADO RL2";	
					}
				}else{
					$VLMensaje="EL REPRESENTANTE DEBE TENER LA CEDULA RL2";	
				}
			} else { /// SI NO SE HA RECUPERADO DE LA BDD
/// ---------------- EL REPRESENTANTE NO TIENE CODIGO EN LA BDD	RECUPERADO ES UNA PERSONA NUEVA
				if ( $VLdtCamp64!=""){ /// CONFIRMAMOS Q TENGA EL NUMERO DE CEDULA
					if($VLdtCamp61!="" && $VLdtCamp62!="" ){
						$Existe="no";
						for($j=0; $j<$VLnuDatosFam; $j++){
	/// ---------------- CON EL NUMERO DE CEDULA CONFIRMAMOS QUE SEA EL REPRESENTANTE
						$VLdtCamp64a=get_result($VLdtDatosFam,$j,$VLQryCampo44);
						$VLdtCamp73a=get_result($VLdtDatosFam,$j,$VLQryCampo53);
							if(strcmp(trim($VLdtCamp64),trim($VLdtCamp64a))==0 ){ ////////////////////////---------------------
								$Existe="si";
								$No=$j;
								$j=$VLnuDatosFam;
							}
						}
						if($Existe=="si"){ /// si ya esta asignado al estudiante
/// ---------------- SI EXISTE ACTUALIZAMOS LOS DATOS DE LA PERSONA ------------
							$VLQryRep= $VLQry22;
							$VLQryRep.= $VLQryCampo2."='".$VLdtCamp61."' ,";//apellido
							$VLQryRep.= $VLQryCampo3."='".$VLdtCamp62."' ,";//nombre
							$VLQryRep.= $VLQryCampo5."='".$VLdtCamp65."' ,";//sexo
							$VLQryRep.= $VLQryCampo6."='".$VLdtCamp66."' ,";//fecha nacimiento
							$VLQryRep.= $VLQryCampo8."='".$VLdtCamp67."' ,";//direccion
							$VLQryRep.= $VLQryCampo10."='".$VLdtCamp68."' ,";//telefono
							$VLQryRep.= $VLQryCampo34."='".$VLdtCamp71."' ,";//estado civil
							$VLQryRep.= $VLQryCampo22."='".$VLdtCamp63."'";//documento
							$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp73a."'";//por el codigo encontrado
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
/// ----------------- ACTUALIZAMOS LOS DATOS DEL PARIENTE -------------------
							$VLQryRep= $VLQry23;
							$VLQryRep.= $VLQryCampo18."='".$VLdtCamp60."', ";//parentezco
							$VLQryRep.= $VLQryCampo19."='".$VLdtCamp69."', ";//Profesion
							$VLQryRep.= $VLQryCampo21."='".$VLdtCamp70."', ";//Lugar donde trabaja
							$VLQryRep.= $VLQryCampo25."='".$VLdtCamp72."' ";//Representante legal
							$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp1."'".$VLQry2.$VLQryCampo12."='".$VLdtCamp73a."'";//por el codigo encontrado
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
							
						}else{ /// si no esta asignado al estudiante
/// ---------------- SI NO ESTA EN LOS ASIGNADOS LO BUSCAMOS EN LA BDD
							$VLQryRep= $VLQry0.$VLQry2.$VLQryCampo4."='".$VLdtCamp64."'";
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
							$VLnuDatosRep = total_records($VLdtDatosRep);
							if ( $VLnuDatosRep>0){
///----------------- SI ESTA ACTUALIZAMOS LOS DATOS
								$VLdtCamp64a=get_result($VLdtDatosRep,0,$VLQryCampo44); /// recuperamos cedula
								$VLdtCamp73a=get_result($VLdtDatosRep,0,$VLQryCampo53); /// recuperamos codigo
								if(strcmp(trim($VLdtCamp64),trim($VLdtCamp64a))==0 ){ 
/// ------------------  ACTUALIZAMOS A LA PERSONA	
/// ---------------- SI EXISTE ACTUALIZAMOS LOS DATOS DE LA PERSONA ------------
									$VLQryRep= $VLQry22;
									$VLQryRep.= $VLQryCampo2."='".$VLdtCamp61."' ,";//apellido
									$VLQryRep.= $VLQryCampo3."='".$VLdtCamp62."' ,";//nombre
									$VLQryRep.= $VLQryCampo5."='".$VLdtCamp65."' ,";//sexo
									$VLQryRep.= $VLQryCampo6."='".$VLdtCamp66."' ,";//fecha nacimiento
									$VLQryRep.= $VLQryCampo8."='".$VLdtCamp67."' ,";//direccion
									$VLQryRep.= $VLQryCampo10."='".$VLdtCamp68."' ,";//telefono
									$VLQryRep.= $VLQryCampo34."='".$VLdtCamp71."' ,";//estado civil
									$VLQryRep.= $VLQryCampo22."='".$VLdtCamp63."'";//documento
									$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp73a."'";//por el codigo encontrado
									$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
/// ----------------- ACTUALIZAMOS LOS DATOS DEL PARIENTE -------------------
									$VLQryRep= $VLQry12;
									$VLQryRep.=$VLdtCamp1.",".$VLdtCamp73a.",'".$VLdtCamp60."',";
									$VLQryRep.="'".$VLdtCamp70."', '".$VLdtCamp69."', '".$VLdtCamp72."'".$VLQry3;
									$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
									
								}else{
									$VLMensaje="NO COINCIDEN LAS CEDULAS RL2";
								}
							}else{
/// ---------------- SI NO ESTA EN LA BDD LO CREAMOS
								$VLQryRep=$VLQry5."'".$VLdtCamp61."','".$VLdtCamp62."','".$VLdtCamp65."','";
								$VLQryRep.=$VLdtCamp66."','','".$VLdtCamp64."','".$VLdtCamp67."','";
								$VLQryRep.= "','".$VLdtCamp68."','','".$VLdtCamp63."','".$VLdtCamp71."',1)";
								$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
				
/// ------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE------------------------------------------------------------------
								$VLQryRep=$VLQry0.$VLQry2."p.".$VLQryCampo2."='".$VLdtCamp61."'".$VLQry2."p.";
								$VLQryRep.=$VLQryCampo3."='".$VLdtCamp62."'".$VLQry2."p.".$VLQryCampo4."='".$VLdtCamp64."'";
								$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
								$VLnuDatosRep = total_records($VLdtDatosRep);
								if ( $VLnuDatosRep>0 )
								{
//// -------------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE----------------------------------------
									$VLdtCamp73=get_result($VLdtDatosRep,0,"p.".$VLQryCampo1);
/////// ---------------------   LO ASIGNAMOS AL ESTUDIANTE-------------------------------------------------------------------
/////// ----------------------------------PRNTSC------------------------------------------------------------------------
									$VLQryPar=$VLQry12.$VLdtCamp1.",".$VLdtCamp73.",'".$VLdtCamp60."','".$VLdtCamp70;
									$VLQryPar.="','".$VLdtCamp69."','".$VLdtCamp72."')";
									$VLdtDatosPar = execute_query($VLQryPar,$VLConexion);
								}else{
									$VLMensaje="ERROR AL CREAR AL REPRESENTANTE , COMUNIQUESE CON SOPORTE TECNICO, RL2";
								}
							}
						}						
					} else {
	/// ................ SI FALTA EL NOMBRE Y EL APELLIDO ES PORQUE SE QUIERE BORRAR DEL ESTUDIANTE
	/// ................ BORRAMOS EL PARENTESCO
						$VLQryFam= $VLQry33.$VLdtCamp73.$VLQry2.$VLQryCampo1."=".$VLdtCamp1;
						$VLdtDatosFam = execute_query($VLQryFam,$VLConexion);
						$VLMensaje="EL REPRESENTANTE HA SIDO ELIMINADO, RL2";	
					}
				}else{
					if($VLdtCamp61!="" && $VLdtCamp62!="")
					{
						$VLMensaje="EL REPRESENTANTE DEBE TENER LA CEDULA, RL2";	
					}
				}

			}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///------------------------------------------ REPRESENTANTE LEGAL 3 ------------------------------------------------
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


			if( $VLdtCamp93!=""){/// SI SE HA RECUPERADO DE LA BDD
				if ( $VLdtCamp84!=""){ /// CONFIRMAMOS Q TENGA EL NUMERO DE CEDULA
					if($VLdtCamp81!="" && $VLdtCamp82!="" ){
						$Existe="no";
						for($j=0; $j<$VLnuDatosFam; $j++){
	/// ---------------- CON EL NUMERO DE CEDULA CONFIRMAMOS QUE SEA EL REPRESENTANTE
						$VLdtCamp84a=get_result($VLdtDatosFam,$j,$VLQryCampo44);
						$VLdtCamp93a=get_result($VLdtDatosFam,$j,$VLQryCampo53);
							if(strcmp(trim($VLdtCamp84),trim($VLdtCamp84a))==0 ){ 
								$Existe="si";
								$No=$j;
								$j=$VLnuDatosFam;
							}
						}
						if($Existe=="si"){ /// si ya esta asignado al estudiante
/// ---------------- SI EXISTE ACTUALIZAMOS LOS DATOS DE LA PERSONA ------------
							$VLQryRep= $VLQry22;
							$VLQryRep.= $VLQryCampo2."='".$VLdtCamp81."' ,";//apellido
							$VLQryRep.= $VLQryCampo3."='".$VLdtCamp82."' ,";//nombre
							$VLQryRep.= $VLQryCampo5."='".$VLdtCamp85."' ,";//sexo
							$VLQryRep.= $VLQryCampo6."='".$VLdtCamp86."' ,";//fecha nacimiento
							$VLQryRep.= $VLQryCampo8."='".$VLdtCamp87."' ,";//direccion
							$VLQryRep.= $VLQryCampo10."='".$VLdtCamp88."' ,";//telefono
							$VLQryRep.= $VLQryCampo34."='".$VLdtCamp91."' ,";//estado civil
							$VLQryRep.= $VLQryCampo22."='".$VLdtCamp83."'";//documento
							$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp93a."'";//por el codigo encontrado
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
/// ----------------- ACTUALIZAMOS LOS DATOS DEL PARIENTE -------------------
							$VLQryRep= $VLQry23;
							$VLQryRep.= $VLQryCampo18."='".$VLdtCamp80."', ";//parentezco
							$VLQryRep.= $VLQryCampo19."='".$VLdtCamp89."', ";//Profesion
							$VLQryRep.= $VLQryCampo21."='".$VLdtCamp90."', ";//Lugar donde trabaja
							$VLQryRep.= $VLQryCampo25."='".$VLdtCamp92."' ";//Representante legal
							$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp1."'".$VLQry2.$VLQryCampo12."='".$VLdtCamp93a."'";//por el codigo encontrado
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
							
						}else{ /// si no esta asignado al estudiante
/// ---------------- SI NO ESTA EN LOS ASIGNADOS LO BUSCAMOS EN LA BDD
							$VLQryRep= $VLQry0.$VLQry2.$VLQryCampo4."='".$VLdtCamp84."'";
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
							$VLnuDatosRep = total_records($VLdtDatosRep);
							if ( $VLnuDatosRep>0){
///----------------- SI ESTA ACTUALIZAMOS LOS DATOS
								$VLdtCamp84a=get_result($VLdtDatosRep,0,$VLQryCampo44); /// recuperamos cedula
								$VLdtCamp93a=get_result($VLdtDatosRep,0,$VLQryCampo53); /// recuperamos codigo
								if(strcmp(trim($VLdtCamp64),trim($VLdtCamp64a))==0 ){ 
/// ------------------  ACTUALIZAMOS A LA PERSONA	
/// ---------------- SI EXISTE ACTUALIZAMOS LOS DATOS DE LA PERSONA ------------
									$VLQryRep= $VLQry22;
									$VLQryRep.= $VLQryCampo2."='".$VLdtCamp81."' ,";//apellido
									$VLQryRep.= $VLQryCampo3."='".$VLdtCamp82."' ,";//nombre
									$VLQryRep.= $VLQryCampo5."='".$VLdtCamp85."' ,";//sexo
									$VLQryRep.= $VLQryCampo6."='".$VLdtCamp86."' ,";//fecha nacimiento
									$VLQryRep.= $VLQryCampo8."='".$VLdtCamp87."' ,";//direccion
									$VLQryRep.= $VLQryCampo10."='".$VLdtCamp88."' ,";//telefono
									$VLQryRep.= $VLQryCampo34."='".$VLdtCamp91."' ,";//estado civil
									$VLQryRep.= $VLQryCampo22."='".$VLdtCamp83."'";//documento
									$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp93a."'";//por el codigo encontrado
									$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
/// ----------------- ACTUALIZAMOS LOS DATOS DEL PARIENTE -------------------
									$VLQryRep= $VLQry12;
									$VLQryRep.=$VLdtCamp1.",".$VLdtCamp93a.",'".$VLdtCamp80."',";
									$VLQryRep.="'".$VLdtCamp90."', '".$VLdtCamp89."', '".$VLdtCamp92."'".$VLQry3;
									$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
								}else{
									$VLMensaje="NO COINCIDEN LAS CEDULAS, RL3";
								}
							}else{
/// ---------------- SI NO ESTA EN LA BDD LO CREAMOS
								$VLQryRep=$VLQry5."'".$VLdtCamp81."','".$VLdtCamp82."','".$VLdtCamp85."','";
								$VLQryRep.=$VLdtCamp86."','','".$VLdtCamp84."','".$VLdtCamp87."','";
								$VLQryRep.= "','".$VLdtCamp88."','','".$VLdtCamp83."','".$VLdtCamp91."',1)";
								$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
				
/// ------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE------------------------------------------------------------------
								$VLQryRep=$VLQry0.$VLQry2."p.".$VLQryCampo2."='".$VLdtCamp81."'".$VLQry2."p.";
								$VLQryRep.=$VLQryCampo3."='".$VLdtCamp82."'".$VLQry2."p.".$VLQryCampo4."='".$VLdtCamp84."'";
								$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
								$VLnuDatosRep = total_records($VLdtDatosRep);
								if ( $VLnuDatosRep>0 )
								{
//// -------------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE----------------------------------------
									$VLdtCamp73=get_result($VLdtDatosRep,0,"p.".$VLQryCampo1);
/////// ---------------------   LO ASIGNAMOS AL ESTUDIANTE-------------------------------------------------------------------
/////// ----------------------------------PRNTSC------------------------------------------------------------------------
									$VLQryPar=$VLQry12.$VLdtCamp1.",".$VLdtCamp93.",'".$VLdtCamp80."','".$VLdtCamp90;
									$VLQryPar.="','".$VLdtCamp89."','".$VLdtCamp92."')";
									$VLdtDatosPar = execute_query($VLQryPar,$VLConexion);
								}else{
									$VLMensaje="ERROR AL CREAR AL REPRESENTANTE , COMUNIQUESE CON SOPORTE TECNICO, RL3";
								}
							}
						}						
					} else {
	/// ................ SI FALTA EL NOMBRE Y EL APELLIDO ES PORQUE SE QUIERE BORRAR DEL ESTUDIANTE
	/// ................ BORRAMOS EL PARENTESCO
						$VLQryFam= $VLQry33.$VLdtCamp93.$VLQry2.$VLQryCampo1."=".$VLdtCamp1;
						$VLdtDatosFam = execute_query($VLQryFam,$VLConexion);
						$VLMensaje="EL REPRESENTANTE HA SIDO ELIMINADO, RL3";	
					}
				}else{
					$VLMensaje="EL REPRESENTANTE DEBE TENER LA CEDULA, RL3";	
				}
			} else { /// SI NO SE HA RECUPERADO DE LA BDD
/// ---------------- EL REPRESENTANTE NO TIENE CODIGO EN LA BDD	RECUPERADO ES UNA PERSONA NUEVA
				if ( $VLdtCamp84!=""){ /// CONFIRMAMOS Q TENGA EL NUMERO DE CEDULA
					if($VLdtCamp81!="" && $VLdtCamp82!="" ){
						$Existe="no";
						for($j=0; $j<$VLnuDatosFam; $j++){
	/// ---------------- CON EL NUMERO DE CEDULA CONFIRMAMOS QUE SEA EL REPRESENTANTE
						$VLdtCamp84a=get_result($VLdtDatosFam,$j,$VLQryCampo44);
						$VLdtCamp93a=get_result($VLdtDatosFam,$j,$VLQryCampo53);
							if(strcmp(trim($VLdtCamp84),trim($VLdtCamp84a))==0 ){ ////////////////////////---------------------
								$Existe="si";
								$No=$j;
								$j=$VLnuDatosFam;
							}
						}
						if($Existe=="si"){ /// si ya esta asignado al estudiante
/// ---------------- SI EXISTE ACTUALIZAMOS LOS DATOS DE LA PERSONA ------------
							$VLQryRep= $VLQry22;
							$VLQryRep.= $VLQryCampo2."='".$VLdtCamp81."' ,";//apellido
							$VLQryRep.= $VLQryCampo3."='".$VLdtCamp82."' ,";//nombre
							$VLQryRep.= $VLQryCampo5."='".$VLdtCamp85."' ,";//sexo
							$VLQryRep.= $VLQryCampo6."='".$VLdtCamp86."' ,";//fecha nacimiento
							$VLQryRep.= $VLQryCampo8."='".$VLdtCamp87."' ,";//direccion
							$VLQryRep.= $VLQryCampo10."='".$VLdtCamp88."' ,";//telefono
							$VLQryRep.= $VLQryCampo34."='".$VLdtCamp91."' ,";//estado civil
							$VLQryRep.= $VLQryCampo22."='".$VLdtCamp83."'";//documento
							$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp93a."'";//por el codigo encontrado
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
/// ----------------- ACTUALIZAMOS LOS DATOS DEL PARIENTE -------------------
							$VLQryRep= $VLQry23;
							$VLQryRep.= $VLQryCampo18."='".$VLdtCamp80."', ";//parentezco
							$VLQryRep.= $VLQryCampo19."='".$VLdtCamp89."', ";//Profesion
							$VLQryRep.= $VLQryCampo21."='".$VLdtCamp90."', ";//Lugar donde trabaja
							$VLQryRep.= $VLQryCampo25."='".$VLdtCamp92."' ";//Representante legal
							$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp1."'".$VLQry2.$VLQryCampo12."='".$VLdtCamp93a."'";//por el codigo encontrado
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
							
						}else{ /// si no esta asignado al estudiante
/// ---------------- SI NO ESTA EN LOS ASIGNADOS LO BUSCAMOS EN LA BDD
							$VLQryRep= $VLQry0.$VLQry2.$VLQryCampo4."='".$VLdtCamp84."'";
							$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
							$VLnuDatosRep = total_records($VLdtDatosRep);
							if ( $VLnuDatosRep>0){
///----------------- SI ESTA ACTUALIZAMOS LOS DATOS
								$VLdtCamp84a=get_result($VLdtDatosRep,0,$VLQryCampo44); /// recuperamos cedula
								$VLdtCamp93a=get_result($VLdtDatosRep,0,$VLQryCampo53); /// recuperamos codigo
								if(strcmp(trim($VLdtCamp84),trim($VLdtCamp84a))==0 ){ 
/// ------------------  ACTUALIZAMOS A LA PERSONA	
/// ---------------- SI EXISTE ACTUALIZAMOS LOS DATOS DE LA PERSONA ------------
									$VLQryRep= $VLQry22;
									$VLQryRep.= $VLQryCampo2."='".$VLdtCamp81."' ,";//apellido
									$VLQryRep.= $VLQryCampo3."='".$VLdtCamp82."' ,";//nombre
									$VLQryRep.= $VLQryCampo5."='".$VLdtCamp85."' ,";//sexo
									$VLQryRep.= $VLQryCampo6."='".$VLdtCamp86."' ,";//fecha nacimiento
									$VLQryRep.= $VLQryCampo8."='".$VLdtCamp87."' ,";//direccion
									$VLQryRep.= $VLQryCampo10."='".$VLdtCamp88."' ,";//telefono
									$VLQryRep.= $VLQryCampo34."='".$VLdtCamp91."' ,";//estado civil
									$VLQryRep.= $VLQryCampo22."='".$VLdtCamp83."'";//documento
									$VLQryRep.= $VLQry24.$VLQryCampo1."='".$VLdtCamp93a."'";//por el codigo encontrado
									$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
/// ----------------- CREAMOS LOS DATOS DEL PARIENTE -------------------
									$VLQryRep= $VLQry12;
									$VLQryRep.=$VLdtCamp1.",".$VLdtCamp93a.",'".$VLdtCamp80."',";
									$VLQryRep.="'".$VLdtCamp90."', '".$VLdtCamp89."', '".$VLdtCamp92."'".$VLQry3;
									$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
									
								}else{
									$VLMensaje="NO COINCIDEN LAS CEDULAS, RL3";
								}
							}else{
/// ---------------- SI NO ESTA EN LA BDD LO CREAMOS
								$VLQryRep=$VLQry5."'".$VLdtCamp81."','".$VLdtCamp82."','".$VLdtCamp85."','";
								$VLQryRep.=$VLdtCamp86."','','".$VLdtCamp84."','".$VLdtCamp87."','";
								$VLQryRep.= "','".$VLdtCamp88."','','".$VLdtCamp83."','".$VLdtCamp91."',1)";
								$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
				
/// ------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE------------------------------------------------------------------
								$VLQryRep=$VLQry0.$VLQry2."p.".$VLQryCampo2."='".$VLdtCamp81."'".$VLQry2."p.";
								$VLQryRep.=$VLQryCampo3."='".$VLdtCamp82."'".$VLQry2."p.".$VLQryCampo4."='".$VLdtCamp84."'";
								$VLdtDatosRep = execute_query($VLQryRep,$VLConexion);
								$VLnuDatosRep = total_records($VLdtDatosRep);
								if ( $VLnuDatosRep>0 )
								{
//// -------------------------RECUPERAMOS EL CODIGO DEL REPRESENTANTE----------------------------------------
									$VLdtCamp93=get_result($VLdtDatosRep,0,"p.".$VLQryCampo1);
/////// ---------------------   LO ASIGNAMOS AL ESTUDIANTE-------------------------------------------------------------------
/////// ----------------------------------PRNTSC------------------------------------------------------------------------
									$VLQryPar=$VLQry12.$VLdtCamp1.",".$VLdtCamp93.",'".$VLdtCamp80."','".$VLdtCamp90;
									$VLQryPar.="','".$VLdtCamp89."','".$VLdtCamp92."' ".$VLQry3;
									$VLdtDatosPar = execute_query($VLQryPar,$VLConexion);
								}else{
									$VLMensaje="ERROR AL CREAR AL REPRESENTANTE , COMUNIQUESE CON SOPORTE TECNICO, RL3";
								}
							}
						}						
					} else {
	/// ................ SI FALTA EL NOMBRE Y EL APELLIDO ES PORQUE SE QUIERE BORRAR DEL ESTUDIANTE
	/// ................ BORRAMOS EL PARENTESCO
						$VLQryFam= $VLQry33.$VLdtCamp93.$VLQry2.$VLQryCampo1."=".$VLdtCamp1;
						$VLdtDatosFam = execute_query($VLQryFam,$VLConexion);
						$VLMensaje="EL REPRESENTANTE HA SIDO ELIMINADO, RL3";	
					}
				}else{
					if($VLdtCamp81!="" && $VLdtCamp82!=""){
						$VLMensaje="EL REPRESENTANTE DEBE TENER LA CEDULA, RL3";	
					}
				}
			}


		} else {
/// --------------- EL ESTUDIANTE NO TIENE ASIGNADOS REPRESENTANTES			
			$VLMensaje= " EL ESTUDIANTE NO TIENE REPRESENTANTES ASOCIADOS INGRESE UNO PARA SEGUIR, RL3";
			$vlccn="modificar";
		}
	}

//echo "buscar";
break 1; 
case "consultar":
//echo "buscar";
break 1; 
case "imprimir":
//echo "imprimir";
break 1; 
case "eliminar":

//echo "eliminar";
break 1; 
default: 

}

?>
<table width="100%" border="0">
	<tr>
	  <td ><?php include("mnuccnscrstdnt.php"); ?></td>
	</tr>
	  <tr>
		<td ><hr></td>
	  </tr>
	  <tr>
		<td valign="top">
		<?php
		if ( $vlccn!="buscar")
		{
			if ($vlccn!="rag" && $vlccn!="modificar2" )
			{
				include("dtslstd2scrstdnt.php"); 
			} else {
				include("dtslstd2scrstdntrag.php");
			}
		} else {
		 	include("dtslstd1scrstdnt.php"); 
		 }
		 ?></td>
	</tr>
</table>
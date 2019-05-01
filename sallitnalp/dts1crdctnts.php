<?php 

switch ($vlccn) {
case "nuevo":
//echo "nuevo";
	//$VLdtCamp20="is_numeric ( mixed $var )";
	
break 1; 
case "guardar":
//echo "guardar";
break 1; 
case "modificar":
/////////////// CONFIRMAMOS EL NUMERO DE ESTUDIANTES
	$VtNumero=count($VLdtprcodigo);
	$kk=3;
	if ($VtNumero>0)
	{
		$kk=4;
		switch($VLdtCamp14)
		{
		case "0": ///////// Version 1.0
			$kk=1;
//////////////////////// EL TIPO DE INGRESO /////////////
//////////////////////// NORMAL /////////////////////////	
			if ( $VLdtCamp13=="") 
			{
				$kk=5;
				$VtqueryModSum="";
				$VtqueryModSum2="";				
				for ($i=0; $i<$VtNumero; $i++)
				{
					$kk=6;
					$Vtquery="update prcldtll set ";
					$VLdtprestado=$VTdtprestado[$i]+1;
					$VTdtprestadoMod=$VTdtprestado[$i]-1;
					$Vtquery.=" dtprestado=".$VLdtprestado.", ";										
					$Vtpromedio=0;
					$VtDivisor=0;
					if ( is_numeric($VLdtprtareas[$i])){
						if ($VLdtprtareas[$i]>10)
						{
							$Vtquery.=" dtprtareas=0 ";
						}else{
							$Vtquery.=" dtprtareas=".round($VLdtprtareas[$i],2);
							$Vtpromedio=round($VLdtprtareas[$i],2);
							if($VLdtprtareas[$i]!=0){
								$VtDivisor=$VtDivisor+1;}
						}
					}else{
						$Vtquery.=" dtprtareas=0 ";
					}
					
					if ( is_numeric($VLdtpractindiv[$i])){
						if ($VLdtpractindiv[$i]>10)
						{
							$Vtquery.=" , dtpractindiv=0";
						}else{
							$Vtquery.=" , dtpractindiv=".round($VLdtpractindiv[$i],2);
							$Vtpromedio=$Vtpromedio+round($VLdtpractindiv[$i],2);
							if($VLdtpractindiv[$i]!=0){
								$VtDivisor=$VtDivisor+1;}
						}
					}else{
						$Vtquery.=" , dtpractindiv=0";
					}
					
					if ( is_numeric($VLdtpractgrupal[$i])){
						if ($VLdtpractgrupal[$i]>10)
						{
							$Vtquery.=" , dtpractgrupal=0";
						}else{
							$Vtquery.=" , dtpractgrupal=".round($VLdtpractgrupal[$i],2);
							$Vtpromedio=$Vtpromedio+round($VLdtpractgrupal[$i],2);
							if($VLdtpractgrupal[$i]!=0){
								$VtDivisor=$VtDivisor+1;}
						}
					}else{
					$Vtquery.=" , dtpractgrupal=0";
					}
					
					if ( is_numeric($VLdtprlecciones[$i])){
						if ($VLdtprlecciones[$i]>10)
						{
							$Vtquery.=" , dtprlecciones=0";
						}else{
							$Vtquery.=" , dtprlecciones=".round($VLdtprlecciones[$i],2);
							$Vtpromedio=$Vtpromedio+round($VLdtprlecciones[$i],2);
							if($VLdtprlecciones[$i]!=0) {
								$VtDivisor=$VtDivisor+1;}
						}
					}else{
					$Vtquery.=" , dtprlecciones=0";
					}
			
					if ( is_numeric($VLdtprprueba[$i])){
						if ($VLdtprprueba[$i]>10)
						{
							$Vtquery.=" , dtprprueba=0";
						}else{
							$Vtquery.=" , dtprprueba=".round($VLdtprprueba[$i],2);
							$Vtpromedio=$Vtpromedio+round($VLdtprprueba[$i],2);
							if($VLdtprprueba[$i]!=0) {
								$VtDivisor=$VtDivisor+1;}
						}
					}else{
					$Vtquery.=" , dtprprueba=0";
					}
					
					///// CONFIRMAR EL TIPO DE MATERIA PARA CALCULAR EL PROMEDIO ////
					
					if ( $VLdtmattipo[$i]== 2 || $VLdtmattipo[$i]== 3 ) {
						$kk=10;
						$Vtquery.=" , dtprpromedio=".$VLdtprpromedio[$i];
					}else {
						if ( is_numeric($VLdtprpromedio[$i])){
							if ($VLdtprpromedio[$i]>10)
							{
								$kk=11;
								$Vtquery.=" , dtprpromedio=0";
							}else{
								if ($VtDivisor>0)
								{
									$kk=12;
									if ( $VtFamilia>3)
									{
										$kk=13;
										$aa=$VtDivisor;
										$bb=$Vtpromedio;
										//$aa=1;
										$VLdtprpromedio[$i]=round($Vtpromedio/$VtDivisor,2);
									}
								}else{
									$kk=14;
									$VLdtprpromedio[$i]=0;
								}
								//$kk=12;
								$Vtquery.=" , dtprpromedio=".$VLdtprpromedio[$i];
							}
						}else{
							$kk=15;
							$Vtquery.=" , dtprpromedio=0";
						}
					}
					$Vtquery.=" where ( dtprestado=5 or dtprestado=7 or dtprestado=9 ) and ";
					$Vtquery.=" dtprcodigo=".$VLdtprcodigo[$i];
					$VLdtDatos = execute_query($Vtquery,$VLConexion);
					///////  guardamos el codigo del usuario que modifica en las Autitoria ////
					$VtqueryMod="Update crrcnprcldtll set USUCODIGOMOD=".$VLUsuario." where dtprcodigo=".$VLdtprcodigo[$i];
					$VtqueryMod.=" and dtprestado=".$VTdtprestadoMod;
					$VLdtDatosMod = execute_query($VtqueryMod,$VLConexion);
					$VtqueryModSum.=" ".$VtqueryMod;
					
					//////////////// CONFIRMAMOS SI EL QUIMESTRE ESTA CALCULADO Y LO RECALCULAMOS ///////////
					$VTQueryQuimestre="Select * from qmstrdtll where dtqmcodigo=".$VLdtdtqmcodigo[$i];
					$VLdtDatosQuimestral = execute_query($VTQueryQuimestre,$VLConexion);
					$VLnuDatosQuimestral = total_records($VLdtDatosQuimestral);
					//$VtqueryModSum2.=" - ".$VTQueryQuimestre;
					if ( $VLnuDatosQuimestral>0)
					{
						$VTdtExamen=get_result($VLdtDatosQuimestral,0,"quiexamen");
						$VTdtEquiv20=get_result($VLdtDatosQuimestral,0,"quiequivalencia20");
						if($VTdtExamen>0) ///////  CONFIRMAMOS QUE SE INGRESARA EL EXAMEN PARA PODER ACTUALIZAR
						{
							
							//////// REALIZAMOS LAS OPERACIONES DE ACTUALIZACION AL QUIMESTRE
							////////// CONSULTAMOS LOS PARCIALES INGRESADOS
							$VTQryParcial="Select * from prcldtll where dtqmcodigo=".$VLdtdtqmcodigo[$i];
							$VLdtDatosParcial = execute_query($VTQryParcial,$VLConexion);
							$VLnuDatosParcial = total_records($VLdtDatosParcial);
							$VtqueryModSum2.=" - ".$VTQryParcial;
							if ( $VLnuDatosParcial>0)
							{
								$VTdtPromQParcial=0;//////// REALIZAMOS EL PROMEDIO DE LOS PARCIALES PARA EL QUIMESTRE
								for ($m=0; $m< $VLnuDatosParcial; $m++)
								{
									$VTdtQPromPar=get_result($VLdtDatosParcial,$m,"dtprpromedio");
									$VTdtPromQParcial= $VTdtPromQParcial+$VTdtQPromPar;
									$VtqueryModSum2.=" Prom(".$m.")=".$VTdtQPromPar." - ";
								}	
								$VTdtPromQParcial=round($VTdtPromQParcial/$VLnuDatosParcial,2);
								$VTdtEquiv80=round($VTdtPromQParcial*8/10,2);
							}else {
								
								$VTdtPromQParcial=0;
								$VTdtEquiv80=0;
							}
							$VTdtPromQuim=$VTdtEquiv80+$VTdtEquiv20;
							$QueryQActualizacion="Update qmstrdtll set quipromparcial=".$VTdtPromQParcial.", quiequivalencia80=".$VTdtEquiv80;
							$QueryQActualizacion.=" , quipromquimestre=".$VTdtPromQuim." where dtqmcodigo=".$VLdtdtqmcodigo[$i];
							$VTActualizaQuimestre=execute_query($QueryQActualizacion,$VLConexion);
							
						}else{
							///////// AL FALTAR EL EXAMEN NO ACTUALIZAMOS EL QUIMESTRE
							
							
						}						
						
					}
					
				}
			} else {
				
////////////////////  PARA EL CASO D VENIR DE UN DETALLE /////////
				if ( $VLdtCamp13==1)
				{
					for ($i=0; $i<$VtNumero; $i++)
					{
						
						$Vtquery="update prcldtll set ";
						$Vtpromedio=0;
						$VtDivisor=0;
						if ( is_numeric($VLdtNota1[$i])){
							if ($VLdtNota1[$i]>10)
							{
								$Vtquery.=" prcnota1=0 ";
							}else{
								$Vtquery.=" prcnota1=".round($VLdtNota1[$i],2);
								$Vtpromedio=round($VLdtNota1[$i],2);
								if($VLdtNota1[$i]!=0){
									$VtDivisor=$VtDivisor+1;}
							}
						}else{
							$Vtquery.=" prcnota1=0 ";
						}
						
						if ( is_numeric($VLdtNota2[$i])){
							if ($VLdtNota2[$i]>10)
							{
								$Vtquery.=" , prcnota2=0";
							}else{
								$Vtquery.=" , prcnota2=".round($VLdtNota2[$i],2);
								$Vtpromedio=$Vtpromedio+round($VLdtNota2[$i],2);
								if($VLdtNota2[$i]!=0){
									$VtDivisor=$VtDivisor+1;}
							}
						}else{
							$Vtquery.=" , prcnota2=0";
						}
						
						if ( is_numeric($VLdtNota3[$i])){
							if ($VLdtNota3[$i]>10)
							{
								$Vtquery.=" , prcnota3=0";
							}else{
								$Vtquery.=" , prcnota3=".round($VLdtNota3[$i],2);
								$Vtpromedio=$Vtpromedio+round($VLdtNota3[$i],2);
								if($VLdtNota3[$i]!=0){
									$VtDivisor=$VtDivisor+1;}
							}
						}else{
						$Vtquery.=" , prcnota3=0";
						}
						
						if ( is_numeric($VLdtNota4[$i])){
							if ($VLdtNota4[$i]>10)
							{
								$Vtquery.=" , prcnota4=0";
							}else{
								$Vtquery.=" , prcnota4=".round($VLdtNota4[$i],2);
								$Vtpromedio=$Vtpromedio+round($VLdtNota4[$i],2);
								if($VLdtNota4[$i]!=0) {
									$VtDivisor=$VtDivisor+1;}
							}
						}else{
						$Vtquery.=" , prcnota4=0";
						}
						
						///// CONFIRMAR EL TIPO DE MATERIA PARA CALCULAR EL PROMEDIO ////
						
						if ( $VLdtmattipo[$i]== 2 || $VLdtmattipo[$i]== 3 ) {
							$Vtquery.=" , dtprtareas=".$VLdtprtareas[$i];
						}else {
							if ($VtDivisor>0)
							{
								if ( $VtFamilia>3)
								{
									$VLdtprtareas[$i]=round($Vtpromedio/$VtDivisor,2);
								}
							}
							
							$Vtquery.=" , dtprtareas=".$VLdtprtareas[$i];
						}
						
					if ($VLdtDesc1!=""){ $Vtquery.=" , prcdesc1='".$VLdtDesc1."' ";   }
					if ($VLdtDesc2!=""){ $Vtquery.=" , prcdesc2='".$VLdtDesc2."' ";   }
					if ($VLdtDesc3!=""){ $Vtquery.=" , prcdesc3='".$VLdtDesc3."' ";   }
					if ($VLdtDesc4!=""){ $Vtquery.=" , prcdesc4='".$VLdtDesc4."' ";   }
					if ($VLdtDesc5!=""){ $Vtquery.=" , prcdesc5='".$VLdtDesc5."' ";   }
					if ($VLdtDesc6!=""){ $Vtquery.=" , prcdesc6='".$VLdtDesc6."' ";   }
					if ($VLdtDesc7!=""){ $Vtquery.=" , prcdesc7='".$VLdtDesc7."' ";   }
					if ($VLdtDesc8!=""){ $Vtquery.=" , prcdesc8='".$VLdtDesc8."' ";   }
					if ($VLdtFecha1!=""){ $Vtquery.=" , prcfecha1='".$VLdtFecha1."' ";   }
					if ($VLdtFecha2!=""){ $Vtquery.=" , prcfecha2='".$VLdtFecha2."' ";   }
					if ($VLdtFecha3!=""){ $Vtquery.=" , prcfecha3='".$VLdtFecha3."' ";   }
					if ($VLdtFecha4!=""){ $Vtquery.=" , prcfecha4='".$VLdtFecha4."' ";   }
					if ($VLdtFecha5!=""){ $Vtquery.=" , prcfecha5='".$VLdtFecha5."' ";   }
					if ($VLdtFecha6!=""){ $Vtquery.=" , prcfecha6='".$VLdtFecha6."' ";   }
					if ($VLdtFecha7!=""){ $Vtquery.=" , prcfecha7='".$VLdtFecha7."' ";   }
					if ($VLdtFecha8!=""){ $Vtquery.=" , prcfecha8='".$VLdtFecha8."' ";   }
						
						$Vtquery.=" where ( dtprestado=5 or dtprestado=7 or dtprestado=9 ) and ";
						$Vtquery.="dtprcodigo=".$VLdtprcodigo[$i];
						$VLCadena[$i]=$Vtquery;
						$VLTemp[$i]=$VLdtmattipo[$i];
						$VLdtDatos = execute_query($Vtquery,$VLConexion);
						
					}
					
				} else {
	
	
					for ($i=0; $i<$VtNumero; $i++)
					{
						
						$Vtquery="update prcldtll set ";
						$Vtpromedio=0;
						$VtDivisor=0;
						if ( is_numeric($VLdtNota5[$i])){
							if ($VLdtNota5[$i]>10)
							{
								$Vtquery.=" prcnota5=0 ";
							}else{
								$Vtquery.=" prcnota5=".round($VLdtNota5[$i],2);
								$Vtpromedio=round($VLdtNota5[$i],2);
								if($VLdtNota5[$i]!=0){
									$VtDivisor=$VtDivisor+1;}
							}
						}else{
							$Vtquery.=" prcnota5=0 ";
						}
						
						if ( is_numeric($VLdtNota6[$i])){
							if ($VLdtNota6[$i]>10)
							{
								$Vtquery.=" , prcnota6=0";
							}else{
								$Vtquery.=" , prcnota6=".round($VLdtNota6[$i],2);
								$Vtpromedio=$Vtpromedio+round($VLdtNota6[$i],2);
								if($VLdtNota6[$i]!=0){
									$VtDivisor=$VtDivisor+1;}
							}
						}else{
							$Vtquery.=" , prcnota6=0";
						}
						
						if ( is_numeric($VLdtNota7[$i])){
							if ($VLdtNota7[$i]>10)
							{
								$Vtquery.=" , prcnota7=0";
							}else{
								$Vtquery.=" , prcnota7=".round($VLdtNota7[$i],2);
								$Vtpromedio=$Vtpromedio+round($VLdtNota7[$i],2);
								if($VLdtNota7[$i]!=0){
									$VtDivisor=$VtDivisor+1;}
							}
						}else{
						$Vtquery.=" , prcnota7=0";
						}
						
						if ( is_numeric($VLdtNota8[$i])){
							if ($VLdtNota8[$i]>10)
							{
								$Vtquery.=" , prcnota8=0";
							}else{
								$Vtquery.=" , prcnota8=".round($VLdtNota8[$i],2);
								$Vtpromedio=$Vtpromedio+round($VLdtNota8[$i],2);
								if($VLdtNota8[$i]!=0) {
									$VtDivisor=$VtDivisor+1;}
							}
						}else{
						$Vtquery.=" , prcnota8=0";
						}
						
						///// CONFIRMAR EL TIPO DE MATERIA PARA CALCULAR EL PROMEDIO ////
						
						if ( $VLdtmattipo[$i]== 2 || $VLdtmattipo[$i]== 3 ) {
							$Vtquery.=" , dtpractindiv=".$VLdtpractindiv[$i];
						}else {
							if ($VtDivisor>0)
							{
								if ( $VtFamilia>3)
								{
									$VLdtpractindiv[$i]=round($Vtpromedio/$VtDivisor,2);
								}
							}
							
							$Vtquery.=" , dtpractindiv=".$VLdtpractindiv[$i];
						}
						
					if ($VLdtDesc1!=""){ $Vtquery.=" , prcdesc1='".$VLdtDesc1."' ";   }
					if ($VLdtDesc2!=""){ $Vtquery.=" , prcdesc2='".$VLdtDesc2."' ";   }
					if ($VLdtDesc3!=""){ $Vtquery.=" , prcdesc3='".$VLdtDesc3."' ";   }
					if ($VLdtDesc4!=""){ $Vtquery.=" , prcdesc4='".$VLdtDesc4."' ";   }
					if ($VLdtDesc5!=""){ $Vtquery.=" , prcdesc5='".$VLdtDesc5."' ";   }
					if ($VLdtDesc6!=""){ $Vtquery.=" , prcdesc6='".$VLdtDesc6."' ";   }
					if ($VLdtDesc7!=""){ $Vtquery.=" , prcdesc7='".$VLdtDesc7."' ";   }
					if ($VLdtDesc8!=""){ $Vtquery.=" , prcdesc8='".$VLdtDesc8."' ";   }
					if ($VLdtFecha1!=""){ $Vtquery.=" , prcfecha1='".$VLdtFecha1."' ";   }
					if ($VLdtFecha2!=""){ $Vtquery.=" , prcfecha2='".$VLdtFecha2."' ";   }
					if ($VLdtFecha3!=""){ $Vtquery.=" , prcfecha3='".$VLdtFecha3."' ";   }
					if ($VLdtFecha4!=""){ $Vtquery.=" , prcfecha4='".$VLdtFecha4."' ";   }
					if ($VLdtFecha5!=""){ $Vtquery.=" , prcfecha5='".$VLdtFecha5."' ";   }
					if ($VLdtFecha6!=""){ $Vtquery.=" , prcfecha6='".$VLdtFecha6."' ";   }
					if ($VLdtFecha7!=""){ $Vtquery.=" , prcfecha7='".$VLdtFecha7."' ";   }
					if ($VLdtFecha8!=""){ $Vtquery.=" , prcfecha8='".$VLdtFecha8."' ";   }
						
						$Vtquery.=" where ( dtprestado=5 or dtprestado=7 or dtprestado=9 ) and ";
						$Vtquery.="dtprcodigo=".$VLdtprcodigo[$i];
						$VLdtDatos = execute_query($Vtquery,$VLConexion);
						
					}
				}
			}
		break;
		case "1":  ///////// Version 2.0
		$kk=2;
//////////////////////// EL TIPO DE INGRESO /////////////
//////////////////////// NORMAL /////////////////////////	
			if ( $VLdtCamp13=="") 
			{
				for ($i=0; $i<$VtNumero; $i++)
				{
					if( $VLdtmattipo[$i]== 1) {
						$Vtquery="update prcldtll set ";
						$VTdtprestadoMod=$VTdtprestado[$i]-1;
						$Vtpromedio=0;
						$VtDivisor=0;
						if ( is_numeric($VLdtprrefuerzo[$i])){
							if ($VLdtprrefuerzo[$i]>10)
							{
								$Vtquery.=" dtprrefuerzo=0 ";
							}else{
								$Vtquery.=" dtprrefuerzo=".round($VLdtprrefuerzo[$i],2);
								$Vtpromedio=round($VLdtprrefuerzo[$i],2);
								if($VLdtprrefuerzo[$i]!=0){
									$VtDivisor=$VtDivisor+1;}
							}
						}else{
							$Vtquery.=" dtprrefuerzo=0 ";
						}
						
						$Vtquery.=" where ( dtprestado>4 ) and ";
						$Vtquery.="dtprcodigo=".$VLdtprcodigo[$i];
						$VLdtDatos = execute_query($Vtquery,$VLConexion);
						/////////// actualizamos el usuario de la actualizacion ///////
					///////  guardamos el codigo del usuario que modifica en las Autitoria ////
						$VtqueryMod="Update crrcnprcldtll set USUCODIGOMOD=".$VLUsuario." where dtprcodigo=".$VLdtprcodigo[$i];
						$VtqueryMod.=" and dtprestado=".$VTdtprestadoMod;
						$VLdtDatosMod = execute_query($VtqueryMod,$VLConexion);
						$VtqueryModSum.=" ".$VtqueryMod;
						
						
						
						
					}
					
					
					///// CONFIRMAR EL TIPO DE MATERIA PARA CALCULAR EL PROMEDIO ////

					if ( $VLdtmattipo[$i]== 2 || $VLdtmattipo[$i]== 3 ) { /// Comportamiento y proyectos
						
						$Vtquery="update prcldtll set ";
						$Vtquery.="  dtprpromedio=".$VLdtprpromedio[$i];
						$VLdtprestado=$VTdtprestado[$i]+1;
						$VTdtprestadoMod=$VTdtprestado[$i]-1;
						$Vtquery.=", dtprestado=".$VLdtprestado;					
						$Vtquery.=" where ( dtprestado>4 ) and ";
						$Vtquery.="dtprcodigo=".$VLdtprcodigo[$i];
						$VLdtDatos = execute_query($Vtquery,$VLConexion);
						
						
						/////////////////// Actualizamos el usuario de la actualizacion
					///////  guardamos el codigo del usuario que modifica en las Autitoria ////
						$VtqueryMod="Update crrcnprcldtll set USUCODIGOMOD=".$VLUsuario." where dtprcodigo=".$VLdtprcodigo[$i];
						$VtqueryMod.=" and dtprestado=".$VTdtprestadoMod;
						$VLdtDatosMod = execute_query($VtqueryMod,$VLConexion);
						$VtqueryModSum.=" ".$VtqueryMod;
						
					}
					
					if ( $VLdtmattipo[$i]== 4 ) {	///// asistencia					
						$Vtquery4="update prcldtll set ";
						$VTdtprestadoMod=$VTdtprestado[$i]-1;
						if ( is_numeric($VLdtprlecciones[$i])){
							$Vtquery4.="  dtprlecciones=".$VLdtprlecciones[$i];
						} else {
							$Vtquery4.="  dtprlecciones=0";
						}
						if ( is_numeric($VLdtpractindiv[$i])){
							$Vtquery4.="  , dtpractindiv=".$VLdtpractindiv[$i];
						} else {
							$Vtquery4.=" , dtpractindiv=0";
						}
						if ( is_numeric($VTdtpractgrupal[$i])){
							$Vtquery4.="  , dtpractgrupal=".$VTdtpractgrupal[$i];						
						} else {
							$Vtquery4.="  dtpractgrupal=0";
						}
						$VTdtprestado[$i]=$VTdtprestado[$i]+1;
						$VLdtprestado=$VTdtprestado[$i]+1;
						$Vtquery4.=", dtprestado=".$VLdtprestado;					
						$Vtquery4.=" where ( dtprestado=5 or dtprestado=7 ) and ";
						$Vtquery4.="dtprcodigo=".$VLdtprcodigo[$i];
						$VLdtDatos = execute_query($Vtquery4,$VLConexion);
						//////////////  Actualizamos el usuario de la actualizacion////////
					///////  guardamos el codigo del usuario que modifica en las Autitoria ////
						$VtqueryMod="Update crrcnprcldtll set USUCODIGOMOD=".$VLUsuario." where dtprcodigo=".$VLdtprcodigo[$i];
						$VtqueryMod.=" and dtprestado=".$VTdtprestadoMod;
						$VLdtDatosMod = execute_query($VtqueryMod,$VLConexion);
						$VtqueryModSum.=" ".$VtqueryMod;
						
					}
					
				}
				/////////////
				
			} else {
////////////////////  PARA EL CASO D VENIR DE UN DETALLE /////////
				if ( $VLdtCamp13==1) { //// INSUMO 1 /////////////
					for ($i=0; $i<$VtNumero; $i++)
					{
						$Vtquery="update prcldtll set ";
						$Vtpromedio=0;
						$VtPromedioP=0;
						$VtDivisor=0;
						if ( is_numeric($VLdtprtareas[$i])){ ////// Tareas
							if ($VLdtprtareas[$i]>10)
							{
								$Vtquery.=" dtprtareas=0 ";
							}else{
								$Vtquery.=" dtprtareas=".round($VLdtprtareas[$i],2);
								$Vtpromedio=round($VLdtprtareas[$i],2);
								if($VLdtprtareas[$i]!=0){
									$VtDivisor=$VtDivisor+1;}
							}
						}else{
							$Vtquery.=" dtprtareas=0 ";
						}
						
						if ( is_numeric($VLdtprlecciones[$i])){  ///// Lecciones
							if ($VLdtprlecciones[$i]>10)
							{
								$Vtquery.=" , dtprlecciones=0";
							}else{
								$Vtquery.=" , dtprlecciones=".round($VLdtprlecciones[$i],2);
								$Vtpromedio=$Vtpromedio+round($VLdtprlecciones[$i],2);
								if($VLdtprlecciones[$i]!=0){
									$VtDivisor=$VtDivisor+1;}
							}
						}else{
							$Vtquery.=" , dtprlecciones=0";
						}
						
						if ( is_numeric($VLdtpradicional1[$i])){  ///// Adicional 1
							if ($VLdtpradicional1[$i]>10)
							{
								$Vtquery.=" , dtpradicional1=0";
							}else{
								$Vtquery.=" , dtpradicional1=".round($VLdtpradicional1[$i],2);
								$Vtpromedio=$Vtpromedio+round($VLdtpradicional1[$i],2);
								if($VLdtpradicional1[$i]!=0){
									$VtDivisor=$VtDivisor+1;}
							}
						}else{
						$Vtquery.=" , dtpradicional1=0";
						}
						
						if ( is_numeric($VLdtpradicional2[$i])){  ////// Adicional 2
							if ($VLdtpradicional2[$i]>10)
							{
								$Vtquery.=" , dtpradicional2=0";
							}else{
								$Vtquery.=" , dtpradicional2=".round($VLdtpradicional2[$i],2);
								$Vtpromedio=$Vtpromedio+round($VLdtpradicional2[$i],2);
								if($VLdtpradicional2[$i]!=0) {
									$VtDivisor=$VtDivisor+1;}
							}
						}else{
						$Vtquery.=" , dtpradicional2=0";
						}
						
						///// CONFIRMAR EL TIPO DE MATERIA PARA CALCULAR EL PROMEDIO //// ***** queda pendiente el promedio ****
						/*
						if ( $VLdtmattipo[$i]== 2 || $VLdtmattipo[$i]== 3 ) {
							$Vtquery.=" , dtprtareas=".$VLdtprtareas[$i];
						}else {
							if ($VtDivisor>0)
							{
								if ( $VtFamilia>3)
								{
									$VLdtprtareas[$i]=round($Vtpromedio/$VtDivisor,2);
								}
							}
							
							$Vtquery.=" , dtprtareas=".$VLdtprtareas[$i];
						} */
						
					if ($VTdtprDescA1!=""){ $Vtquery.=" , prcdesca1='".$VTdtprDescA1."' ";   }
					if ($VTdtprDescA2!=""){ $Vtquery.=" , prcdesca2='".$VTdtprDescA2."' ";   }
						
						$Vtquery.=" where ( dtprestado=5 or dtprestado=7 ) and ";
						$Vtquery.="dtprcodigo=".$VLdtprcodigo[$i];
						$VLCadena[$i]=$Vtquery;
						$VLTemp[$i]=$VLdtmattipo[$i];
						$VLdtDatos = execute_query($Vtquery,$VLConexion);
					}
				} else { ///// INSUMO 2  //////////////
					for ($i=0; $i<$VtNumero; $i++)
					{
						
						$Vtquery="update prcldtll set ";
						$Vtpromedio=0;
						$VtDivisor=0;
						if ( is_numeric($VLdtpractindiv[$i])){ ////// actividad individual
							if ($VLdtpractindiv[$i]>10)
							{
								$Vtquery.=" dtpractindiv=0 ";
							}else{
								$Vtquery.=" dtpractindiv=".round($VLdtpractindiv[$i],2);
								$Vtpromedio=round($VLdtpractindiv[$i],2);
								if($VLdtpractindiv[$i]!=0){
									$VtDivisor=$VtDivisor+1;}
							}
						}else{
							$Vtquery.=" dtpractindiv=0 ";
						}
						
						if ( is_numeric($VTdtpractgrupal[$i])){  ///// Activ. Grupal
							if ($VTdtpractgrupal[$i]>10)
							{
								$Vtquery.=" , dtpractgrupal=0";
							}else{
								$Vtquery.=" , dtpractgrupal=".round($VTdtpractgrupal[$i],2);
								$Vtpromedio=$Vtpromedio+round($VTdtpractgrupal[$i],2);
								if($VTdtpractgrupal[$i]!=0){
									$VtDivisor=$VtDivisor+1;}
							}
						}else{
							$Vtquery.=" , dtpractgrupal=0";
						}
						
						if ( is_numeric($VLdtprprueba[$i])){ ///// Evaluacion
							if ($VLdtprprueba[$i]>10)
							{
								$Vtquery.=" , dtprprueba=0";
							}else{
								$Vtquery.=" , dtprprueba=".round($VLdtprprueba[$i],2);
								$Vtpromedio=$Vtpromedio+round($VTdtprprueba[$i],2);
								if($VLdtprprueba[$i]!=0){
									$VtDivisor=$VtDivisor+1;}
							}
						}else{
						$Vtquery.=" , dtprprueba=0";
						}
						
						
						///// CONFIRMAR EL TIPO DE MATERIA PARA CALCULAR EL PROMEDIO //// *** queda pendiente
						/*
						if ( $VLdtmattipo[$i]== 2 || $VLdtmattipo[$i]== 3 ) {
							$Vtquery.=" , dtpractindiv=".$VLdtpractindiv[$i];
						}else {
							if ($VtDivisor>0)
							{
								if ( $VtFamilia>3)
								{
									$VLdtpractindiv[$i]=round($Vtpromedio/$VtDivisor,2);
								}
							}
							
							$Vtquery.=" , dtpractindiv=".$VLdtpractindiv[$i];
						}*/
												
						$Vtquery.=" where ( dtprestado=5 or dtprestado=7 ) and ";
						$Vtquery.="dtprcodigo=".$VLdtprcodigo[$i];
						//$VLCadena[$i]=$Vtquery;
						//$VLTemp[$i]=$VLdtmattipo[$i];
						$VLdtDatos = execute_query($Vtquery,$VLConexion);
						
					}
				}
			}
		break;
		}
	}

break 1; 
case "buscar":
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
	  <td ><?php include("mnuccncrdctnts.php"); ?></td>
	</tr>
	  <tr>
		<td ><hr></td>
	  </tr>
	  <tr>
		<td valign="top">
		<?php
		if ( $VLNuevo != "" || $vlccn=="modificar")
		{
			switch ($VLdtCamp14)
			{
				case 0:
					include("dtslstd2crdctnts0.php"); 
					break 1;
				case 1:
					include("dtslstd2crdctnts1.php"); 
					break 1;
			}
			
			
			
		} else {
		 	include("dtslstd1crdctnts.php"); 
		 }
		 ?></td>
	</tr>
</table>
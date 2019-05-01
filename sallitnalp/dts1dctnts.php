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
				for ($i=0; $i<$VtNumero; $i++)
				{
					$kk=6;
					$Vtquery="update prcldtll set ";
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
					
					
					$Vtquery.=" where ( dtprestado=2 or dtprestado=3 ) and ";
					$Vtquery.="dtprcodigo=".$VLdtprcodigo[$i];
					$VLdtDatos = execute_query($Vtquery,$VLConexion);
					
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
						
						$Vtquery.=" where ( dtprestado=2 or dtprestado=3 ) and ";
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
						
						$Vtquery.=" where ( dtprestado=2 or dtprestado=3 ) and ";
						$Vtquery.="dtprcodigo=".$VLdtprcodigo[$i];
						//$VLCadena[$i]=$Vtquery;
						//$VLTemp[$i]=$VLdtmattipo[$i];
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
					$Vtquery="update prcldtll set ";
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
					
					
					$Vtquery.=" where ( dtprestado=2 or dtprestado=3 ) and ";
					$Vtquery.="dtprcodigo=".$VLdtprcodigo[$i];
					$VLdtDatos = execute_query($Vtquery,$VLConexion);
					
					///// CONFIRMAR EL TIPO DE MATERIA PARA CALCULAR EL PROMEDIO ////

					if ( $VLdtmattipo[$i]== 2 || $VLdtmattipo[$i]== 3 ) {
						
						$Vtquery="update prcldtll set ";
						$Vtquery.="  dtprpromedio=".$VLdtprpromedio[$i];
						$Vtquery.=" where ( dtprestado=2 or dtprestado=3 ) and ";
						$Vtquery.="dtprcodigo=".$VLdtprcodigo[$i];
						$VLdtDatos = execute_query($Vtquery,$VLConexion);
					}
					
					if ( $VLdtmattipo[$i]== 4 ) {						
						$Vtquery4="update prcldtll set ";
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
						$Vtquery4.=" where ( dtprestado=2 or dtprestado=3 ) and ";
						$Vtquery4.="dtprcodigo=".$VLdtprcodigo[$i];
						$VLdtDatos = execute_query($Vtquery4,$VLConexion);
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
						
						$Vtquery.=" where ( dtprestado=2 or dtprestado=3 ) and ";
						$Vtquery.="dtprcodigo=".$VLdtprcodigo[$i];
						$VLCadena[$i]=$Vtquery;
						$VLTemp[$i]=$VLdtmattipo[$i];
						$VLdtDatos = execute_query($Vtquery,$VLConexion);
						//////////////// AHORA CALCULAMOS EL PROMEDIO PARA EL ESTUDIANTE.
						$VtQueryNotas= "Select * from prcldtll where dtprcodigo=".$VLdtprcodigo[$i];
						$VLdtDatosNotas = execute_query($VtQueryNotas,$VLConexion);
						if ($VLdtDatosNotas>0)
						{
							$VtPrTareas=get_result($VLdtDatosNotas,0,"dtprtareas");
							$VtPrActindiv=get_result($VLdtDatosNotas,0,"dtpractindiv");
							$VtPrActgrupal=get_result($VLdtDatosNotas,0,"dtpractgrupal");
							$VtPrLecciones=get_result($VLdtDatosNotas,0,"dtprlecciones");
							$VtPrPrueba=get_result($VLdtDatosNotas,0,"dtprprueba");
							$VtPrAdicional1=get_result($VLdtDatosNotas,0,"dtpradicional1");
							$VtPrAdicional2=get_result($VLdtDatosNotas,0,"dtpradicional2");
							$VtPrPromedio1=get_result($VLdtDatosNotas,0,"dtprpromedio1");
							$VtPrRefuerzo=get_result($VLdtDatosNotas,0,"dtprrefuerzo");
							$VtPrPromedio=get_result($VLdtDatosNotas,0,"dtprpromedio");
							$VTDividir=0;
							$VTSumatoria=0;
							if ( $VtPrTareas>0){ $VTDividir++; $VTSumatoria= $VTSumatoria + $VtPrTareas; }
							if ( $VtPrActindiv>0){ $VTDividir++; $VTSumatoria= $VTSumatoria + $VtPrActindiv; }
							if ( $VtPrActgrupal>0){ $VTDividir++; $VTSumatoria= $VTSumatoria + $VtPrActgrupal; }
							if ( $VtPrLecciones>0){ $VTDividir++; $VTSumatoria= $VTSumatoria + $VtPrLecciones; }
							if ( $VtPrPrueba>0){ $VTDividir++; $VTSumatoria= $VTSumatoria + $VtPrPrueba; }
							if ( $VtPrAdicional1>0){ $VTDividir++; $VTSumatoria= $VTSumatoria + $VtPrAdicional1; }
							if ( $VtPrAdicional2>0){ $VTDividir++; $VTSumatoria= $VTSumatoria + $VtPrAdicional2; }
							////////////  CALCULAMOS EL PROMEDIO 1 ANTES DEL REFUERZO //////
							if( $VTDividir>0)
							{
								$VtPrPromedio1=$VTSumatoria/$VTDividir;	
								} else {
								$VtPrPromedio1=0;
							}
							
							
							if ( $VtPrRefuerzo>0){ 
								if ( $VtPrPromedio1>0)
								{
									$VTDividir++;
									$VtPrPromedio= ( $VTSumatoria+$VtPrRefuerzo)/$VTDividir;
									$VtPrPromedio=round($VtPrPromedio,2);
									} else {
									$VtPrPromedio= 0;	
								}
							
							 } else {
								$VtPrPromedio= round($VtPrPromedio1,2);	
							}
							if ( $VtPrPromedio1>0){ 
								$VtqueryPr="update prcldtll set dtprpromedio1=".round($VtPrPromedio1,2);
								$VtqueryPr.=", dtprpromedio=".round($VtPrPromedio,2);
								$VtqueryPr.=" where ( dtprestado=2 or dtprestado=3 ) and ";
								$VtqueryPr.="dtprcodigo=".$VLdtprcodigo[$i];
								$VLdtDatosPr = execute_query($VtqueryPr,$VLConexion);
							 }
	
						}
						
						
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
												
						$Vtquery.=" where ( dtprestado=2 or dtprestado=3 ) and ";
						$Vtquery.="dtprcodigo=".$VLdtprcodigo[$i];
						//$VLCadena[$i]=$Vtquery;
						//$VLTemp[$i]=$VLdtmattipo[$i];
						$VLdtDatos = execute_query($Vtquery,$VLConexion);

						//////////////// AHORA CALCULAMOS EL PROMEDIO PARA EL ESTUDIANTE.
						$VtQueryNotas= "Select * from prcldtll where dtprcodigo=".$VLdtprcodigo[$i];
						$VLdtDatosNotas = execute_query($VtQueryNotas,$VLConexion);
						if ($VLdtDatosNotas>0)
						{
							$VtPrTareas=get_result($VLdtDatosNotas,0,"dtprtareas");
							$VtPrActindiv=get_result($VLdtDatosNotas,0,"dtpractindiv");
							$VtPrActgrupal=get_result($VLdtDatosNotas,0,"dtpractgrupal");
							$VtPrLecciones=get_result($VLdtDatosNotas,0,"dtprlecciones");
							$VtPrPrueba=get_result($VLdtDatosNotas,0,"dtprprueba");
							$VtPrAdicional1=get_result($VLdtDatosNotas,0,"dtpradicional1");
							$VtPrAdicional2=get_result($VLdtDatosNotas,0,"dtpradicional2");
							$VtPrPromedio1=get_result($VLdtDatosNotas,0,"dtprpromedio1");
							$VtPrRefuerzo=get_result($VLdtDatosNotas,0,"dtprrefuerzo");
							$VtPrPromedio=get_result($VLdtDatosNotas,0,"dtprpromedio");
							$VTDividir=0;
							$VTSumatoria=0;
							if ( $VtPrTareas>0){ $VTDividir++; $VTSumatoria= $VTSumatoria + $VtPrTareas; }
							if ( $VtPrActindiv>0){ $VTDividir++; $VTSumatoria= $VTSumatoria + $VtPrActindiv; }
							if ( $VtPrActgrupal>0){ $VTDividir++; $VTSumatoria= $VTSumatoria + $VtPrActgrupal; }
							if ( $VtPrLecciones>0){ $VTDividir++; $VTSumatoria= $VTSumatoria + $VtPrLecciones; }
							if ( $VtPrPrueba>0){ $VTDividir++; $VTSumatoria= $VTSumatoria + $VtPrPrueba; }
							if ( $VtPrAdicional1>0){ $VTDividir++; $VTSumatoria= $VTSumatoria + $VtPrAdicional1; }
							if ( $VtPrAdicional2>0){ $VTDividir++; $VTSumatoria= $VTSumatoria + $VtPrAdicional2; }
							////////////  CALCULAMOS EL PROMEDIO 1 ANTES DEL REFUERZO //////
							if( $VTDividir>0)
							{
								$VtPrPromedio1=$VTSumatoria/$VTDividir;	
								} else {
								$VtPrPromedio1=0;
							}
							
							
							if ( $VtPrRefuerzo>0){ 
								if ( $VtPrPromedio1>0)
								{
									$VTDividir++;
									$VtPrPromedio= ( $VTSumatoria+$VtPrRefuerzo)/$VTDividir;
									$VtPrPromedio=round($VtPrPromedio,2);
									} else {
									$VtPrPromedio= 0;	
								}
							
							 } else {
								$VtPrPromedio= round($VtPrPromedio1,2);	
							}
							if ( $VtPrPromedio1>0){ 
								$VtqueryPr="update prcldtll set dtprpromedio1=".round($VtPrPromedio1,2);
								$VtqueryPr.=", dtprpromedio=".round($VtPrPromedio,2);
								$VtqueryPr.=" where ( dtprestado=2 or dtprestado=3 ) and ";
								$VtqueryPr.="dtprcodigo=".$VLdtprcodigo[$i];
								$VLdtDatosPr = execute_query($VtqueryPr,$VLConexion);
							 }
						}
						
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
	  <td ><?php include("mnuccndctnts.php"); ?></td>
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
					include("dtslstd2dctnts0.php"); 
					break 1;
				case 1:
					include("dtslstd2dctnts1.php"); 
					break 1;
			}
			
			
			
		} else {
		 	include("dtslstd1dctnts.php"); 
		 }
		 ?></td>
	</tr>
</table>
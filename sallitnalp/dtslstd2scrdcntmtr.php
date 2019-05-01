<table width="100%" border="0">
	<?php 
		if ($VLNuevo != "")
		{  // si es nuevo inicio
			$VLQuery= $VLQry19;
			$VLQuery.= " and ".$VLQryCampo10;
			$VLQuery.= "=1".$VLQry20;
			
			//echo $VLQuery;
			//$VLdtDatos = execute_query($VLQuery,$VLConexion);
			$VLnuDatos = total_records($VLdtDatos);
	?>
		
 	<tr>
		<td >
			<table width="100%" border="0">
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><?=$VLtxtCampo2; ?>:</td>
					<td>
						<select name="critero">
						<?php 
							if ($VLnuDatos<1)
							{
						?>
							<option value="nada">Nada
						<?php } else {
								for ( $i=0; $i<$VLnuDatos; $i++)
								{
									$VTCampo2=get_result($VLdtDatos,$i,$VLQryCampo2);
									$VTCampo5=get_result($VLdtDatos,$i,$VLQryCampo5);
									$VTCampo15=get_result($VLdtDatos,$i,$VLQryCampo15);
									
						?>
							<option value="<?php echo $VTCampo15; ?>"><?php echo $VTCampo5; ?> de <?php echo $VTCampo2; ?>
						<?php 	}
							} ?>					
						</select>
					</td>
					<td><input name="consultarnuevo" type="image" id="consultarnuevo" onClick="sumit" src="imagenes/0025-searchx24.gif" alt="consultarnuevo" width="24" height="24" border="0" value="consultarnuevo"></td>
					<td>&nbsp;</td>
				  </tr>
			</table>	
		</td>
	</tr>

	<?php 

		} // si es nuevo final 
		else { // si no es nuevo inicio
	
	?>
 	<tr>
		<td >
			<table width="100%" border="0">
				  <tr>

					<td><input name="txt_Camp9" type="hidden" id="txt_Camp9" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp9; ?>"></td>
					<td><input name="txt_Camp2" type="text" id="txt_Camp2" size="50" maxlength="60" readonly="1" value="<?=$VLdtCamp2." ".$VLdtCamp3; ?>"></td>
					<td><input name="txt_Camp1" type="hidden" id="txt_Camp1" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp1; ?>"></td>
					<td>&nbsp;</td>					
					<td><input name="txt_Camp15" type="hidden" id="txt_Camp15" size="10" maxlength="9" readonly="1" value="<?=$VLdtCamp15; ?>"><?=$VLtxtCampo11; ?>:</td>
					<td>
						<select name="critero2">
							<option value="Asignadas" <?php if ($VLdtCriterio2 == "Asignadas"){ ?> selected="selected" <?php } ?>  >Asignadas
							<option value="Todas" <?php if ($VLdtCriterio2 == "Todas"){ ?> selected="selected" <?php } ?>  >Todas
						</select>
					<td>&nbsp;</td>
					<td><input name="consultar2" type="image" id="consultar2" onClick="sumit" src="imagenes/0025-searchx24.gif" alt="consultar2" width="24" height="24" border="0" value="consultar2">&nbsp;</td>
				  </tr>
			</table>	
		</td>
	</tr>
    
 			  <?php 
///////////////////// CONSULTAMOS TOD0S L0S CURSOS Y PARALELOS
						$cadena="47-24";

					$VLQueryC= $VLQry10;
					$VLdtDatosC = execute_query($VLQueryC,$VLConexion);
					$VLnuDatosC = total_records($VLdtDatosC);
/////////////////    CONSULTAMOS LAS MATERIAS QUE TIENE ASIGNADAS ///////////////					
					$VLQueryM= $VLQry6;
					$VLdtDatosM = execute_query($VLQueryM,$VLConexion);
					$VLnuDatosM = total_records($VLdtDatosM);
///////////////CONSULTAMOS LAS MATERIAS POR PARALELO QUE TENGA EL DOCENTE ///////////////					
					
					
					
					/// CONFIRMAMOS QUE EXISTAN CURSOS CON PARALELOS
					if ( $VLnuDatosC > 0 && $VLnuDatosM>0 )
					{
			  ?>
	<tr>
		<td align="center">	
			<table  border="1">
            
			  <?php 
///////////////////// COLOCAMOS EL ENCABEZADO Y LOS CURSOS CON SUS PARALELOS ///			  
						
			  ?>
              <tr>
              	<td width="200" align="center"> <font size="-1"> MATERIA  <?=strlen($cadena); ?> <?=$cadena[2]; ?></font> </td>
                
			  <?php 
///////////////////// EMPEZAMOS A PONER LOS CURSOS

				for ( $i=0; $i<$VLnuDatosC; $i++)
				{			  
			  ?>
              	<td align="center"><font size="-2">
               
			  <?php 
///////////////////// RECUPERAMOS LA SIGLA Y EL PARALELO ////////////////
				$VTCampo16=get_result($VLdtDatosC,$i,$VLQryCampo16);
				$VTCampo17=get_result($VLdtDatosC,$i,$VLQryCampo17);
				$VTCampo18=get_result($VLdtDatosC,$i,$VLQryCampo18);
				$VTCampo19=get_result($VLdtDatosC,$i,$VLQryCampo19);
				echo $VTCampo17." ".$VTCampo19;
				
			  ?>
                </font></td>
	<?php 	} ///////////////////// FIN DE UN CURSO //////////////// ?>
              </tr>
			  <?php 
///////////////////// EMPEZAMOS A PONER LAS MATERIAS			  
				for ( $j=0; $j<$VLnuDatosM; $j++)
				{	
					$VTCampo12=get_result($VLdtDatosM,$j,"m.".$VLQryCampo12);
					$VTCampo13=get_result($VLdtDatosM,$j,"m.".$VLQryCampo13);
					
			  ?>
              <tr>
              	<td width="200" align="center"> <font size="-1">  <?=$VTCampo13; ?></font> </td>
                
			  <?php 
///////////////////// EMPEZAMOS A PONER LOS CURSOS

				for ( $i=0; $i<$VLnuDatosC; $i++)
				{			  
			  ?>
              	<td align="center"><font size="-2">
               
			  <?php 
///////////////////// RECUPERAMOS LA SIGLA Y EL PARALELO ////////////////
				$VTCampo16=get_result($VLdtDatosC,$i,$VLQryCampo16);
				$VTCampo17=get_result($VLdtDatosC,$i,$VLQryCampo17);
				$VTCampo18=get_result($VLdtDatosC,$i,$VLQryCampo18);
				$VTCampo19=get_result($VLdtDatosC,$i,$VLQryCampo19);
				echo $VTCampo17." ".$VTCampo19;
				
			  ?>
                </font></td>
	<?php 	} ///////////////////// FIN DE UN CURSO //////////////// ?>
              </tr>



              
	<?php 	} ///////////// FIN DE UNA MATERIA Y SUS CURSOS //////////////// ?>
              
			  <tr>
              	<td ><font size="-1">  <?php echo $VTCampo13; ?></font>&nbsp;</td>
                <td >&nbsp;</td>
			  </tr>
			  <?php 
/////////////////////// FIN DE LA CARGA DE LAS MATERIAS DEL DOCENTE
			  ?> 
              <tr>
              	<td width="400">&nbsp; </td>
              	<td width="300">  <? //=$Vtqueryma."/".$numero1."/".$VLnuDatosma."/".$VLnuDatosfm; ?></td>
              </tr>
			</table>
		</td>
	</tr>
<?php } else {
	?>
    <TR> <td>
    <table width="100%" border="1">
  <tr>
    <td>NO EXISTEN DATOS QUE MOSTRAR, CONFIRME QUE TENGA CURSOS CON PARALELOS Y QUE EL DOCENTE TENGA MATERIAS ASIGNADAS</td>
  </tr>
</table>
	</td>
    </TR>
    <?php
	  }
}?>			
</table>
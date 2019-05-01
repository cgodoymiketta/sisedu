<?php


?>

        <p class="text-center text-muted text-uppercase">Introduzca sus datos de ingreso</p>
        <div class="form-group label-floating">
            <label class="control-label" for="UserName">Usuario</label>
          <input class="form-control" name="txt_camp9" id="UserName" type="text">
            <p class="help-block">Escribe tu nombre de usuario</p>
		</div>
        <div class="form-group label-floating">
            <label class="control-label" for="UserPass">Contraseña</label>
          <input class="form-control" id="UserPass" type="password" name="txt_camp10" size="12">
            <p class="help-block">Escribe tú contraseña</p>
		</div>
        <div class="form-group">
            <label class="control-label">Periodo Lectivo</label>
           
            <select name="nlctv" >
					  <?php 
						$Vtquery= $VLQry6.$VLQry8.$VLQryCampo7." =".$VLInstitucion;
						$Vtquery.= " ".$VLQry7;
						$VLdtDatos = execute_query($Vtquery,$VLConexion);
						$VLnuDatos = total_records($VLdtDatos);
						if ($VLnuDatos==0 )
						{
							echo "<option value='nada'>2011 - 2012</option>";
						} else
						{
							for ( $i=0; $i< $VLnuDatos; $i++  )
							{
								$VTCampo1=get_result($VLdtDatos,$i,$VLQryCampo1);
								$VTCampo2=get_result($VLdtDatos,$i,$VLQryCampo2);
								echo "<option value='".$VTCampo1."'>".$VTCampo2."</option>";
							}
						
						}
								
					?>
					    </select>
            
        </div>
<div class="form-group text-center">
			<input type="submit" value="Iniciar sesión" class="btn btn-raised btn-danger">
		</div>



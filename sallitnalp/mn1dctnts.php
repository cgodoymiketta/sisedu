

<table width="1000" border="0">
  <tr>
    <td width="50">&nbsp;</td>
    <td width="900"><table width="100%" border="0">
      <tr>
        <td width="19%" height="38">
		<table width="100%" border="0">
  <tr>
    <td><strong><font size="2" face="Times New Roman, Times, serif">
    <h1><strong >ADMEDU</strong></h1>
    </font></strong></td>
  </tr>
  <tr>
    <td><strong><font size="2" face="Times New Roman, Times, serif"><?php echo $VLdtPeriodo; ?><input type="hidden" name="nlctv" value="<?php echo $VLAnoLocal; ?>"><input type="hidden" name="nsttcn" value="<?php echo $VLInstitucion; ?>"><input type="hidden" name="sr" value="<?php echo $VLUsuario; ?>"><input type="hidden" name="txt_Camp1" value="<?php echo $VLdtCamp1; ?>"><input type="hidden" name="txt_Camp2" value="<?php echo $VLdtCamp2; ?>"><input type="hidden" name="txt_Camp6" value="<?php echo $VLdtCamp6; ?>"><input type="hidden" name="txt_Camp7" value="<?php echo $VLdtCamp7; ?>"><input type="hidden" name="txt_Camp8" value="<?php echo $VLdtCamp8; ?>"><input type="hidden" name="txt_Camp9" value="<?php echo $VLdtCamp9; ?>"><input type="hidden" name="txt_Camp10" value="<?php echo $VLdtCamp10; ?>"><input type="hidden" name="txt_Camp11" value="<?php echo $VLdtCamp11; ?>"></font></strong></td>
  </tr>
</table>
		</td>
        <td width="62%" align="center" valign="middle">Ingreso de Notas</td>
        <?php 
					$VTReporte=0;
					$VTDocente=0;
					$VTSecretaria=0;
					$VTAdministracion=0;
					$VTLogin=0;
			for ($i=0; $i<$VLnuDatosU;$i++){
				$VlPermiso=get_result($VLdtDatosU,$i,"perfcodigo");
				switch ($VlPermiso) 
				{
				case "1":	
					$VTReporte=1;
					$VTDocente=1;
					$VTSecretaria=1;
					$VTAdministracion=1;
					$VTLogin=1;
					break 1; 				
				case "2":	
					$VTReporte=1;
					$VTSecretaria=1;
					$VTLogin=1;
					break 1;
				case "3":	
					$VTReporte=1;
					$VTDocente=1;
					$VTSecretaria=1;
					break 1; 
				case "4":	
					$VTReporte=1;
					$VTDocente=1;
					break 1;
				case "5":	
					$VTReporte=1;
					$VTDocente=1;
					break 1; 
									
				}
			}
		?>
        <td width="6%">
        <?php if($VTReporte==1){ ?>
        <a href="reportes.php?nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>"><img src="imagenes/Documents%20Folder_48x48-32.gif" alt="Reportes" width="48" height="48" border="0"></a>
        <?php }else{ ?>
        <img src="imagenes/Folder_48x48-32.gif" alt="Reportes" width="48" height="48" border="0">
        <?php } ?>
        </td>
        <td width="6%">
        <?php if($VTDocente==1){ ?>
        <a href="docentes.php?nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>"><img src="imagenes/Applications%20Folder_48x48-32.gif" alt="Docentes" width="48" height="48" border="0"></a>
        <?php }else{ ?>
        <img src="imagenes/Folder_48x48-32.gif" alt="Reportes" width="48" height="48" border="0">
        <?php } ?>
        </td>
        <td width="6%">
        <?php if($VTSecretaria==1){ ?>
        <a href="secretaria.php?nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>"><img src="imagenes/Library%20Folder_48x48-32.gif" alt="secretar&iacute;a" width="48" height="48" border="0"></a>
        <?php }else{ ?>
        <img src="imagenes/Folder_48x48-32.gif" alt="Reportes" width="48" height="48" border="0">
        <?php } ?>
        </td>
        <td width="6%">
        <?php if($VTAdministracion==1){ ?>
        <a href="administracion.php?nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>"><img src="imagenes/Developer%20Folder_48x48-32.gif" alt="Administraci&oacute;n" width="48" height="48" border="0"></a>
        <?php }else{ ?>
        <img src="imagenes/Folder_48x48-32.gif" alt="Reportes" width="48" height="48" border="0">
        <?php } ?>
        </td>
        <td width="6%">
        <?php if($VTLogin==1){ ?>
        <a href="usuario.php?nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>"><img src="imagenes/User%20Folder_48x48-32.gif" alt="Usuario" width="48" height="48" border="0"></a>
        <?php }else{ ?>
        <img src="imagenes/Folder_48x48-32.gif" alt="Reportes" width="48" height="48" border="0">
        <?php } ?>
        </td>
        <td width="6%"><a href="index.php?nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>"><img src="imagenes/Public%20Folder_48x48-32.gif" alt="Cambio Usuario" width="48" height="48" border="0"></a></td>
        <td width="6%"><a href="index.php?nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>"><img src="imagenes/Home_48x48-32.gif" alt="Inicio" width="48" height="48" border="0"></a></td>

      </tr>
    </table></td>
    <td width="50">&nbsp;</td>
  </tr>
</table>

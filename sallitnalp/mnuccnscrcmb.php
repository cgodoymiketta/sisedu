<table width="100%" border="0">
	<tr>
	  <td width="5%" height="16"><input type="hidden" name="vlccn" value="<?=$vlccn; ?>"> &nbsp; </td>
      <!-----------------------------REPORTES CUANDO EL ESTUDIANTE ESTE MATRICULADO ------->
	  <td width="10%">&nbsp;</td>
	  <td width="10%"><? if ( $VLdtCamp16!="") { ?>
      <a href="repfichatutor_pastoral.php?txt_Camp1=<?=$VLdtCamp16 ?>&nlctv=<?=$VLAnoLocal ?>&nsttcn=<?=$VLInstitucion ?>"  target="_blank"> <img src="imagenes/Imagen0002.gif" width="24" height="24" /></a><? } ?></td>
	  <td width="10%"><? if ( $VLdtCamp16!="") { ?>
      <a href="repcontrolcomportamiento.php?txt_Camp1=<?=$VLdtCamp16 ?>&nlctv=<?=$VLAnoLocal ?>&nsttcn=<?=$VLInstitucion ?>"  target="_blank"> <img src="imagenes/Appointments_48x48-32.gif" width="24" height="24" /></a><? } ?></td>
	  <td width="10%"><? if ( $VLdtCamp16!="") { ?>
      <a href="repmatriculareglamentaria.php?txt_Camp1=<?=$VLdtCamp16 ?>&nlctv=<?=$VLAnoLocal ?>&nsttcn=<?=$VLInstitucion ?>"  target="_blank"> <img src="imagenes/Paste_48x48-32.gif" width="24" height="24" /></a><? } ?></td>
      <!-----------------------------HASTA AQUI LOS REPORTES ------->
	  <td width="10%"><input name="nuevo" type="image" id="nuevo" onClick="sumit" src="imagenes/Filex24.gif" alt="Nuevo" width="24" height="24" border="0" value="nuevo"></td>
	  <td width="10%"><? if ( $VLNuevo == "kk"){ ?><input name="guardar" type="image" id="guardar" onClick="sumit" src="imagenes/Floppy%20Disk%20Blue_24x24-32.gif" alt="Guardar" width="24" height="24" border="0" value="guardar"><? } ?></td>
	  <td width="10%"><? if ( $VLdtCamp19!="") { ?><input name="modificar" type="image" id="modificar" onClick="sumit" src="imagenes/Floppy%20Disk%20Blue_24x24-32.gif" alt="Modificar" width="24" height="24" border="0" value="modificar"><? } ?></td>
	  <td width="10%"><input name="buscar" type="image" id="buscar" onClick="sumit" src="imagenes/027-folder_searchx24.gif" alt="Buscar" width="24" height="24" border="0" value="buscar"></td>
	  <td width="10%"><input name="imprimir" type="image" id="imprimir" onClick="sumit" src="imagenes/Printer%204_24x24-32.gif" alt="Imprimir" width="24" height="24" border="0" value="imprimir"></td>
	  <td width="10%"><? if ( $vlccn=="modificar") { ?> <input name="eliminar" type="image" id="eliminar" onClick="sumit" src="imagenes/Recycle%20Bin%20Empty%201_24x24-32.gif" alt="Eliminar" width="24" height="24" border="0" value="eliminar"><? }?></td>
	</tr>
</table>

<table width="100%" border="0">
	<tr>
	  <td width="40%" height="16"><input type="hidden" name="vlccn" value="<?=$vlccn; ?>"> &nbsp; </td>
	  <td width="10%">&nbsp;</td>
	  <td width="10%"><? if ( $VLNuevo != ""){ ?><input name="guardar" type="image" id="guardar" onClick="sumit" src="imagenes/Floppy%20Disk%20Blue_24x24-32.gif" alt="Guardar" width="24" height="24" border="0" value="guardar"><? } ?></td>
	  <td width="10%"><? if ( $vlccn=="modificar") { ?><input name="modificar" type="image" id="modificar" onClick="sumit" src="imagenes/008-doc_editx24.gif" alt="Modificar" width="24" height="24" border="0" value="modificar"><? } ?></td>
	  <td width="10%"><input name="buscar" type="image" id="buscar" onClick="sumit" src="imagenes/027-folder_searchx24.gif" alt="Buscar" width="24" height="24" border="0" value="buscar"></td>
	  <td width="10%"><input name="imprimir" type="image" id="imprimir" onClick="sumit" src="imagenes/Printer%204_24x24-32.gif" alt="Imprimir" width="24" height="24" border="0" value="imprimir"></td>
	  <td width="10%"><? if ( $vlccn=="modificar") { ?> <input name="eliminar" type="image" id="eliminar" onClick="sumit" src="imagenes/Recycle%20Bin%20Empty%201_24x24-32.gif" alt="Eliminar" width="24" height="24" border="0" value="eliminar"><? }?></td>
	</tr>
</table>

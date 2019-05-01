<table width="100%" border="0">
	<tr>
	  <td width="40%" height="16"><input type="hidden" name="vlccn" value="<?=$vlccn; ?>"> &nbsp; </td>
	  <td width="10%">&nbsp;</td>
	  <td width="10%">&nbsp;</td>
	  <td width="10%"><? if ( $VLdtCamp11>3 ) { ?><input name="modificar" type="image" id="modificar" onClick="sumit" src="imagenes/GuardarCerrar.png" alt="Modificar" width="124" height="24" border="0" value="modificar"><? } ?></td>
	  <td width="10%">&nbsp;</td>
	  <td width="10%">
      <a href='setroper/repquimestralmateria.php?vlccn=modificar&txt_Camp1=<?=$VLdtCamp12; ?>&txt_Camp2=<?=$VLdtCamp2; ?>&txt_Camp10=<?=$VLdtCamp10; ?>&txt_Camp6=<?=$VLdtCamp6; ?>&txt_Camp7=<?=$VLdtCamp7; ?>&txt_Camp8=<?=$VLdtCamp8; ?>&txt_Camp9=<?=$VLdtCamp9; ?>&txt_Camp11=<?=$VLdtCamp11; ?>&nlctv=<?=$VLAnoLocal; ?>&nsttcn=<?=$VLInstitucion; ?>&sr=<?=$VLUsuario; ?>' target=_blank > <img src="imagenes/Printer 4_24x24-32.gif" width="24" height="24" />
      </a></td>
	  <td width="10%">&nbsp;</td>
	</tr>
</table>

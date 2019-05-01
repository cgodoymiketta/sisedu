<?php     


//////////////// SE CONSULTA GRUPO ESPECIALIDAD CURSO QUE SE VA A GUARDAR //////////////////////////
$Queryg = $VLQry19.$VLQry21.$VLQryCampo11."=".$VLdtCamp11;
$VLdtDatosg = execute_query($Queryg,$VLConexion);
$VLnuDatosg = total_records($VLdtDatosg);
if ($VLnuDatosg>0)
{
//////////// RECUPERAMOS EL GRUPO QUE NOS INTERESA ////////////////////////	
	$VTCurso=get_result($VLdtDatosg,0,$VLQryCampo5);
	$VTEspecialidad=get_result($VLdtDatosg,0,$VLQryCampo2);
	$VTSeccion=get_result($VLdtDatosg,0,$VLQryCampo24);
	$cadena=$VTCurso." DE ".$VTEspecialidad." ".$VTSeccion;
}  

///////////  RECUPERAMOS EL PARALELO QUE NOS INTERESA ////////////////
$Queryp = $VLQry22.$VLdtCamp11;
$VLdtDatosp = execute_query($Queryp,$VLConexion);
$VLnuDatosp = total_records($VLdtDatosp);


 
if(	$VLdtCriterio4!="" && $VLConsultar3=!""){ //// consultamos los estudiantes para matricular
////////////// RECUEPERAMOS LOS ESTUDIANTES 		
	
	switch ($VLdtCriterio2) {
	case "MATRICULADOS":
		$Vtquery = $VLQry27.$VLQry23;
		break 1; 
	case "PROMOVIDOS":
	
		break 1; 
	case "NUEVOS":
		$Vtquery = $VLQry1;
		$Vtquery .= $VLQry21."  ( ".$VLQryCampo21.$VLQry2."'".$VLQry4.$VLdtCriterio4.$VLQry4."' OR ".$VLQryCampo22.$VLQry2;
		$Vtquery .= "'".$VLQry4.$VLdtCriterio4.$VLQry4."' )".$VLQry23;	
		break 1; 
	case "TODOS":
		$Vtquery = $VLQry1;
		$Vtquery .= $VLQry21."  ( ".$VLQryCampo21.$VLQry2."'".$VLQry4.$VLdtCriterio4.$VLQry4."' OR ".$VLQryCampo22.$VLQry2;
		$Vtquery .= "'".$VLQry4.$VLdtCriterio4.$VLQry4."' )".$VLQry23;	
		default: 
	}
	$VLdtDatos = execute_query($Vtquery,$VLConexion);
	$VLnuDatos = total_records($VLdtDatos);	
	
}

if ($VLdtCriterio2=="MATRICULADOS"){ /// si queremos confirmar los matriculados
	if( $VLConsultar2=!"") //// un grupo de matriculado en particular
	{
		$Vtquery = $VLQry27;
		$Vtquery.=$VLQry21."  ( ".$VLQryCampo21.$VLQry2."'".$VLQry4;
		$Vtquery.=$VLdtCriterio4.$VLQry4."' OR ".$VLQryCampo22.$VLQry2;
		$Vtquery .= "'".$VLQry4.$VLdtCriterio4.$VLQry4."' )";
		$Vtquery.=$VLQry23;
		$VLdtDatos = execute_query($Vtquery,$VLConexion);
		$VLnuDatos = total_records($VLdtDatos);	
	} 
}


if ($VLConsultar3=!"") //// todos los matriculados
{
	$VtqueryM = $VLQry27;
	$VLdtDatosM = execute_query($VtqueryM,$VLConexion);
	$VLnuDatosM = total_records($VLdtDatosM);	
} 

if( $VLConsultar2=!"") //// un grupo de matriculado en particular
{
	$VtqueryM = $VLQry27;
	$VtqueryM.=$VLQry21."  ( ".$VLQryCampo21.$VLQry2."'".$VLQry4;
	$VtqueryM.=$VLdtCriterio4.$VLQry4."' OR ".$VLQryCampo22.$VLQry2;
	$VtqueryM.= "'".$VLQry4.$VLdtCriterio4.$VLQry4."' )";
	$VtqueryM.=$VLQry23;
	$VLdtDatosM = execute_query($VtqueryM,$VLConexion);
	$VLnuDatosM = total_records($VLdtDatosM);	
} 


if ($VLdtCamp19!="" && $VLConsultar4=="1"){ //// tenemos un alumno

	$VtqueryR = $VLQry1.$VLQry21.$VLQryCampo19."=".$VLdtCamp19;
	$VLdtDatosR = execute_query($VtqueryR,$VLConexion);
	$VTCampo22=get_result($VLdtDatosR,0,$VLQryCampo22);
	$VTCampo21=get_result($VLdtDatosR,0,$VLQryCampo21);
	$VLdtCriterio4=$VTCampo22." ".$VTCampo21;
} else {
	$VLdtCamp19="";
	$VLdtCamp16="";
	$VLdtCamp17="";
	$VLdtCriterio4="";
	
}

?>

<table width="100%" border="0" >
  <tr>
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><?=$VLFecha; ?><input name="txt_Camp13" type="hidden" value="<?=$VLFecha; ?>"  /></td>
                <td>&nbsp;<input name="txt_Camp11" type="hidden" value="<?=$VLdtCamp11; ?>"  /></td>
                <td><?=$cadena; ?></td>
                <td>&nbsp;</td>
                <td><select name="txt_Camp14">
<?php  
if ($VLnuDatosp>0)
{
	for($i=0; $i<$VLnuDatosp; $i++){
	$VLdtCamp14a=get_result($VLdtDatosp,$i,$VLQryCampo14);
	$VLdtCamp15a=get_result($VLdtDatosp,$i,$VLQryCampo15);
 ?>
					<option value="<?php echo $VLdtCamp14a; ?>" <?php if ($VLdtCamp14a==$VLdtCamp14) { ?> selected="selected" <?php }  ?> ><?php echo $VLdtCamp15a; ?></option>
<?php }} else {  ?>
					<option value="No tiene asignados">No tiene asignados</option>					
<?php  }  ?>
				</select></td>
                <td>&nbsp;</td>
                <td><select name="critero2">
					<option value="MATRICULADOS" <?php if ($VLdtCriterio2=="MATRICULADOS") { ?> selected="selected" <?php }  ?>>MATRICULADOS</option>
				</select></td>
                <td>&nbsp;</td>
                <td>
<?php 
if ($VLnuDatosp>0) {  ?>                
                <input name="consultar2" type="image" id="consultar2" onClick="sumit" src="imagenes/0025-searchx24.gif" alt="consultar" width="24" height="24" border="0" value="consultar2">
<?php  }  ?>               
                </td>
            </tr>
    </table>
    </td>
  </tr>
  <tr> 
  	<td> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><?=$VLtxtCampo16; ?><input name="txt_Camp16" type="text" value="<?=$VLdtCamp16; ?>" readonly="readonly" size="5" /></td>
            <td>&nbsp;</td>
            <td><?=$VLtxtCampo17; ?><input name="txt_Camp17" type="text" value="<?=$VLdtCamp17; ?>" readonly="readonly" size="5" /></td>
            <td>&nbsp;</td>
            <td><?=$VLtxtCampo19; ?><input name="txt_Camp19" type="text" value="<?=$VLdtCamp19; ?>" readonly="readonly" size="5" /></td>
            <td><input name="critero4" type="text" value="<?=$VLdtCriterio4; ?>" size="40" maxlength="50" /></td>
            <td>&nbsp;</td>
            <td><?php 
        if ($VLnuDatosp>0) {  ?>                
                        <input name="consultar3" type="image" id="consultar3" onClick="sumit" src="imagenes/0025-searchx24.gif" alt="consultar" width="24" height="24" border="0" value="consultar3">
        <?php  }  ?>               
            </td>
          </tr>
        </table>
  	</td>
  </tr>
  <tr>
  	<td>
<table width="100%" border="0">
  <tr>
    <td>Registrar como:&nbsp;</td>
    <td>&nbsp;</td>
    <td><select name="txt_Camp25">
					<option value="1" <?php if ($VLdtCamp25=="1") { ?> selected="selected" <?php }  ?>  >MATRICULADO</option>
					<option value="2" <?php if ($VLdtCamp25=="2") { ?> selected="selected" <?php }  ?>>DESERTOR</option>					
					<option value="3" <?php if ($VLdtCamp25=="3") { ?> selected="selected" <?php }  ?>>RETIRADO</option>
				</select> </td>
    <td>&nbsp;</td>
    <td><select name="txt_Camp26">
<?php  
$Queryg2 = $VLQry19.$VLQry21." g.gruestado=1 order by curorden ";
$VLdtDatosg2 = execute_query($Queryg2,$VLConexion);
$VLnuDatosg2 = total_records($VLdtDatosg2);

if ($VLnuDatosg2>0)
{
	for($i=0; $i<$VLnuDatosg2; $i++){
		$VTCurso=get_result($VLdtDatosg2,$i,$VLQryCampo5);
		$VTEspecialidad=get_result($VLdtDatosg2,$i,$VLQryCampo2);
		$VTSeccion=get_result($VLdtDatosg2,$i,$VLQryCampo24);
		$cadena=$VTCurso." DE ".$VTEspecialidad." ".$VTSeccion;
		$VTCodigoGrupo=get_result($VLdtDatosg2,$i,"g.grucodigo");
 ?>
					<option value="<?php echo $VTCodigoGrupo; ?>" <?php if ($VLdtCamp11==$VTCodigoGrupo) { ?> selected="selected" <?php }  ?> ><?php echo $cadena; ?></option>
<?php }} else {  ?>
					<option value="No tiene asignados">No tiene asignados</option>					
<?php  }  ?>
				</select> <?php //echo $VLQryCamCurso;  ?> </td>
  </tr>
</table>


   </td>
  </tr>
  <tr>
  	<td>
    
	<!---------------------------   Desde aqui se visualiza el listado que se ha almacenado  ----------------------------------------->
	<iframe id="txt_Lista" name="txt_Lista" style="width:755px; height:170px;" frameborder="0"  scrolling="auto" >
<?php 
		$VTTablaLista="<table border='1'>";
		  $VTTablaLista.="<tr>";
		/* Determinamos las columnas que va a tener la tabla */
				$VTTablaLista.="<td width='50' align='center' ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo19."</font></strong></td>";
				$VTTablaLista.="<td width='400' align='center' ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo12."</font></strong></td>";
				$VTTablaLista.="<td width='150' align='center' ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VLtxtCampo16."/".$VLtxtCampo17."</font></strong></td>";
		  $VTTablaLista.="</tr>";


		if ( $VLnuDatos>0 )
		{
			for ( $j=0; $j< $VLnuDatos; $j++  )
			{
				$VTCampo19=get_result($VLdtDatos,$j,$VLQryCampo19);
				$VTCampo21=get_result($VLdtDatos,$j,$VLQryCampo21);
				$VTCampo22=get_result($VLdtDatos,$j,$VLQryCampo22);
				$VTCampo23=get_result($VLdtDatos,$j,$VLQryCampo23);
				$VTCampo16=get_result($VLdtDatos,$j,$VLQryCampo16);
				$VTCampo17=get_result($VLdtDatos,$j,$VLQryCampo17);
				$VTCampo11=get_result($VLdtDatos,$j,$VLQryCampo11);
				$VTCampo25=get_result($VLdtDatos,$j,$VLQryCampo25);
				$VTCampo14=get_result($VLdtDatos,$j,$VLQryCampo14);
				
				if( $VLnuDatosM>0 && $VLdtCriterio2!="MATRICULADOS" )
				{
					for ($i=0 ; $i< $VLnuDatosM; $i++)
					{
						$VTCampo19a=get_result($VLdtDatosM,$i,$VLQryCampo19);
						if ( $VTCampo19a== $VTCampo19)
						{
							$VTCampo16=get_result($VLdtDatosM,$i,$VLQryCampo16);
							$VTCampo17=get_result($VLdtDatosM,$i,$VLQryCampo17);
							$VTCampo11=get_result($VLdtDatosM,$i,$VLQryCampo11);
							$VTCampo25=get_result($VLdtDatosM,$i,$VLQryCampo25);
							$i=$VLnuDatosM;
						}
						
					}
				}
				if ( $VLdtCriterio2=="NUEVOS" && $VTCampo16!="")
				{
				}else {
					//if ( $VTCampo11!=$VLdtCamp11 && $VTCampo11!=""  )
					//{
					//}else{
				$VTTablaLista.="<tr>";
				$VTTablaLista.="<tr><td width='80' ><a href='secadminismatricula.php?vlccn=modificar&critero2=".$VLdtCriterio2."&txt_Camp1=".$VLdtCamp1."&nsttcn=".$VLInstitucion."&nlctv=".$VLAnoLocal."&sr=".$VLUsuario."&txt_Camp14=".$VTCampo14."&txt_Camp11=".$VTCampo11."&txt_Camp19=".$VTCampo19."&txt_Camp16=".$VTCampo16."&txt_Camp25=".$VTCampo25."&txt_Camp17=".$VTCampo17."&consultar4=1' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo19."</font></strong></a></td>";
				$VTTablaLista.="<td width='80' ><a href='secadminismatricula.php?vlccn=modificar&critero2=".$VLdtCriterio2."&txt_Camp1=".$VLdtCamp1."&nsttcn=".$VLInstitucion."&nlctv=".$VLAnoLocal."&sr=".$VLUsuario."&txt_Camp14=".$VTCampo14."&txt_Camp11=".$VTCampo11."&txt_Camp19=".$VTCampo19."&txt_Camp16=".$VTCampo16."&txt_Camp25=".$VTCampo25."&txt_Camp17=".$VTCampo17."&consultar4=1' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo22." ".$VTCampo21."</font></strong></a></td>";
				$VTTablaLista.="<td width='80' align='center' ><a href='secadminismatricula.php?vlccn=modificar&critero2=".$VLdtCriterio2."&txt_Camp1=".$VLdtCamp1."&nsttcn=".$VLInstitucion."&nlctv=".$VLAnoLocal."&sr=".$VLUsuario."&txt_Camp14=".$VTCampo14."&txt_Camp11=".$VTCampo11."&txt_Camp19=".$VTCampo19."&txt_Camp16=".$VTCampo16."&txt_Camp25=".$VTCampo25."&txt_Camp17=".$VTCampo17."&consultar4=1' target=_parent ><font face='Times New Roman, Times, serif' size='2' color='#000000' >".$VTCampo16."/".$VTCampo17."</font></strong></a></td>";
				$VTTablaLista.="</tr>";
					
					//}
				}
			}
		}
		$VTTablaLista.="</table>";
?>		
		</iframe>
		<script> 
			var editor_obj = document.all["txt_Lista"];								
			var editdoc = editor_obj.contentWindow.document;									
			var VTHtml="<html><head><link href='../estilos/estilos.css' rel='stylesheet' type='text/css'></head>";
			var VTTabla="<?=$VTTablaLista?>";
			editdoc.open();
			editdoc.write(VTHtml+'<body leftmargin=0 topmargin=0 rightmargin=0 bottommargin=0>'+VTTabla+'</body></html>');
			editdoc.close();									
			editdoc.editor_obj=editor_obj; 
		</script> 		
<!-----------------------------------  Hasta aqui va la visualización del listado  ----------------------------------------------->
    </td>
  </tr>
</table>

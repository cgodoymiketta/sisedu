<table width="100%" border="0">
					  <tr>
						<td width="85%"  align="left"><strong><font face="Times New Roman, Times, serif" size="2" color="#0000FF" >Consulta </font></strong> </td>
					  </tr>
					  <tr>
						<td width="85%"  align="left"><hr> </td>
					  </tr>
					  <tr>
						<td width="85%"  align="left"><a href="repespestudiante.php?vlccn=listado&nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>"><strong><font face="Times New Roman, Times, serif" size="2" color="#0000FF" > Listado</font></strong></a></td>
					  </tr>
					  <tr>
						<td width="85%"  align="left"><a href="repestudiantegeneral.php?vlccn=modificar&critero2=NUEVOS&txt_Camp1=3&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>&nlctv=<?php echo $VLAnoLocal; ?>&txt_Camp4=1&txt_Camp11=1&consultar2.x=20&consultar2.y=15"><strong><font face="Times New Roman, Times, serif" size="2" color="#0000FF" > Estudiante</font></strong></a></td>
					  </tr>
					  <tr>
						<td width="85%"  align="left"><strong><font face="Times New Roman, Times, serif" size="2" color="#0000FF" >Docente</font></strong></td>
					  </tr>
                      <tr>
						<td width="85%"  align="left"><a href="repcurso.php?vlccn=listado&nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>"><strong><font face="Times New Roman, Times, serif" size="2" color="#990000" >Curso</font></strong></a> </td>
					  </tr>                      <tr>
					<td width="85%"  align="left"><strong><font face="Times New Roman, Times, serif" size="2" color="#0000FF" > Materia</font></strong></td>
					  </tr>
					  <tr>
						<td width="85%"  align="left"><hr> </td>
					  </tr>
					  					  <tr>
						<td width="85%"  align="left"><a href="repparcial.php?vlccn=listado&nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>"><strong><font face="Times New Roman, Times, serif" size="2" color="#990000" >Calificaci&oacute;n Parcial </font></strong></a></td>
					  </tr>
					  <tr>
						<td width="85%"  align="left"><a href="repquimestral.php?vlccn=listado&amp;nlctv=<?php echo $VLAnoLocal; ?>&amp;nsttcn=<?php echo $VLInstitucion; ?>&amp;sr=<?php echo $VLUsuario; ?>"><strong><font face="Times New Roman, Times, serif" size="2" color="#990000" >Calificaci&oacute;n Quimestral</font></strong></a></td>
					  </tr>
					  <tr>
						<td width="85%"  align="left">
                        <a href="represquimestral.php?vlccn=listado&amp;nlctv=<?php echo $VLAnoLocal; ?>&amp;nsttcn=<?php echo $VLInstitucion; ?>&amp;sr=<?php echo $VLUsuario; ?>">
                        <strong><font face="Times New Roman, Times, serif" size="2" color="#990000" >Resumen Quimestral</font></strong>
                        </a>
                        </td>
					  </tr>
					  <tr>
						<td width="85%"  align="left">
<?php                        
//////////////////////////////////  LOS DOCENTES NI DC PUDEN SACAR ESTE REPOTE //////////////////
     if ($VLPer!=4 && $VLPer!=6 && $VLPer!=7 ){ ?>                   
                        <a href="replibreta.php?vlccn=listado&amp;nlctv=<?php echo $VLAnoLocal; ?>&amp;nsttcn=<?php echo $VLInstitucion; ?>&amp;sr=<?php echo $VLUsuario; ?>"><strong><font face="Times New Roman, Times, serif" size="2" color="#990000" >Reportes Parcial</font></strong></a>
<?php	} else { ?>
						<strong><font face="Times New Roman, Times, serif" size="2" color="#990000" >Reportes Parcial</font></strong>
<?php	}  ?>                        
                        </td>
					  </tr>
					  <tr>
						<td width="85%"  align="left">
<?php                        
//////////////////////////////////  LOS DOCENTES NI DC PUDEN SACAR ESTE REPOTE //////////////////
     if ($VLPer!=4 && $VLPer!=6 && $VLPer!=7){
?>                           <a href="replibretaq.php?vlccn=listado&nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>"><strong><font face="Times New Roman, Times, serif" size="2" color="#990000" >Reporte Quimestral</font></strong></a> 
<?php	} else { ?>
						<strong><font face="Times New Roman, Times, serif" size="2" color="#990000" >Reporte Quimestral</font></strong>
<?php	}  ?>                        
                        </td>
					  </tr>
					  <tr>
						<td width="85%"  align="left"><a href="repgenerales.php?vlccn=listado&nlctv=<?php echo $VLAnoLocal; ?>&nsttcn=<?php echo $VLInstitucion; ?>&sr=<?php echo $VLUsuario; ?>"><strong><font face="Times New Roman, Times, serif" size="2" color="#990000" >Reportes Generales</font></strong></a> </td>
					  </tr>
					  <tr>
						<td width="85%"  align="left"><hr> </td>
					  </tr>
					  <tr>
						<td width="85%"  align="left"><strong><font face="Times New Roman, Times, serif" size="2" color="#0000FF" >Silabos </font></strong></td>
					</table>
<table width="100%" border="0">
					  <tr>
					    <td  align="left"><strong><font face="Times New Roman, Times, serif" size="2" color="#006600" > <a href="docnotas.php?vlccn=listado&amp;nlctv=<?php echo $VLAnoLocal; ?>&amp;nsttcn=<?php echo $VLInstitucion; ?>&amp;sr=<?php echo $VLUsuario; ?>">Ingresos de Parciales </a></font></strong></td>
  					  </tr>
					  <tr>
					    <td  align="left"><strong><font face="Times New Roman, Times, serif" size="2" color="#006600" > <a href="docquimestre.php?vlccn=listado&amp;nlctv=<?php echo $VLAnoLocal; ?>&amp;nsttcn=<?php echo $VLInstitucion; ?>&amp;sr=<?php echo $VLUsuario; ?>">Ingreso de Quimestre </a></font></strong></td>
  					  </tr>
					  <tr>
						<td width="85%"  align="left"><strong><font face="Times New Roman, Times, serif" size="2" color="#006600" >Temario</font></strong> </td>
					  </tr>
					  <tr>
						<td width="85%"  align="left"><HR> </td>
                      </tr>
                      <tr>
						<td width="85%"  align="left"><strong><font face="Times New Roman, Times, serif" size="2" color="#006600" > <?php if ( $VLPer==4 || $VLPer>5  ) { ?> <a href="doccorrecionparcial.php?vlccn=listado&amp;nlctv=<?php echo $VLAnoLocal; ?>&amp;nsttcn=<?php echo $VLInstitucion; ?>&amp;sr=<?php echo $VLUsuario; ?>"> <?php } else { ?>  <a href="viccorrecionparcial.php?vlccn=listado&amp;nlctv=<?php echo $VLAnoLocal; ?>&amp;nsttcn=<?php echo $VLInstitucion; ?>&amp;sr=<?php echo $VLUsuario; ?>">  <?php } ?>
					    Correccion Parcial</a></font></strong> </td>
                      </tr>
                      <tr>
						<td width="85%"  align="left"><strong><font face="Times New Roman, Times, serif" size="2" color="#006600" > <?php if ( $VLPer==4 || $VLPer>5 ) { ?> <a href="doccorrecionquimestre.php?vlccn=listado&amp;nlctv=<?php echo $VLAnoLocal; ?>&amp;nsttcn=<?php echo $VLInstitucion; ?>&amp;sr=<?php echo $VLUsuario; ?>"> <?php } else { ?>  <a href="viccorrecionquimestre.php?vlccn=listado&amp;nlctv=<?php echo $VLAnoLocal; ?>&amp;nsttcn=<?php echo $VLInstitucion; ?>&amp;sr=<?php echo $VLUsuario; ?>">  <?php } ?>
					    Correccion Quimestral</a></font></strong> </td>
					  </tr>
                      <tr>
						<td width="85%"  align="left"><strong><font face="Times New Roman, Times, serif" size="2" color="#006600" > <?php if ( $VLPer==4 || $VLPer>5 ) { ?>  <?php } else { ?>  <a href="vicquimestre.php?vlccn=listado&amp;nlctv=<?php echo $VLAnoLocal; ?>&amp;nsttcn=<?php echo $VLInstitucion; ?>&amp;sr=<?php echo $VLUsuario; ?>">  <?php } ?>
					    Quimestre <?php if ( $VLPer==4 || $VLPer>5 ) { ?>  <?php } else { ?>  </a> <?php } ?></font></strong> </td>
					  </tr>
                      <tr>
						<td width="85%"  align="left"><strong><font face="Times New Roman, Times, serif" size="2" color="#006600" > <?php if ( $VLPer==4 || $VLPer>5 ) { ?>  <?php } else { ?>  <a href="vicparcial.php?vlccn=listado&amp;nlctv=<?php echo $VLAnoLocal; ?>&amp;nsttcn=<?php echo $VLInstitucion; ?>&amp;sr=<?php echo $VLUsuario; ?>">  <?php } ?>
					    Parcial <?php if ( $VLPer==4 || $VLPer>5 ) { ?>  <?php } else { ?>  </a> <?php } ?></font></strong></td>
					  </tr>
					</table>
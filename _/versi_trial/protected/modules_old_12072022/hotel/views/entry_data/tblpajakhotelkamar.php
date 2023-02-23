 <?php $no=1; foreach ($model as $row): ?>
	 <tr>
	 	<td><?php echo $no++; ?></td>
	 	<td><?php echo $row['tpajakhotelkamar_kelas'] ?></td>
	 	<td><?php echo $row['tpajakhotelkamar_jumlah'] ?></td>
	 	<td><?php echo $row['tpajakhotelkamar_tarif'] ?></td>
	 	<td><?php echo $row['tpajakhotelkamar_diskon'] ?></td>
	 	<td><?php echo $row['tpajakhotelkamar_terjual'] ?></td>
	 	<td><?php echo $row['tpajakhotelkamar_omzet'] ?></td>
	 	<td align="center">
	 		<a onclick="hapuspajakhoteltemp(<?php echo $row['tpajakhotelkamar_id'] ?>)" href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-red txt-color-white pull-right"  ><i class="glyphicon glyphicon-trash "></i></a> 
	 	</td>
	 </tr>
 <?php endforeach ?>
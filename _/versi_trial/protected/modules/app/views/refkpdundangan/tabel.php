<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr>				                        
			<th data-hide="phone"></th>				                          
			<th data-class="expand"><div align="center">Urutan</div></th>
			<th data-hide="phone"><div align="center">Nama</div></th>
			<th data-hide="phone"><div align="center">Status</div></th>
			<th>Edit</th>
			<th>Hapus</th>
		</tr>
	</thead>
	<tbody>                      
		<?php $no=1; foreach ($datalist as $list): ?>
		<?php if ($list['refkepadaundangan_isaktif']=="T") {
			$label = '<label class="label label-success">Aktif</label>';
		} 
		else {
			$label = '<label class="label label-danger">Tidak Aktif</label>';
		}
		?>
		<tr>				                          
			<td><?php echo $no++; ?></td>
			<td><?php echo $list['refkepadaundangan_urutan']; ?></td>
			<td><?php echo $list['refkepadaundangan_nama']; ?></td>                          
			<td><?php echo $label; ?></td>
			<td>
				<button onClick="edit(<?php echo $list['refkepadaundangan_id']; ?>)" type="button" class="btn btn-circle btn-success btn-sm">
					<i class="fa fa-edit"></i>
				</button>
			</td>
			<td>									
				<button  onclick="hapus(<?php echo $list['refkepadaundangan_id']; ?>)" type='button' class='btn btn-circle btn-danger btn-sm'>
					<i class="fa fa-trash-o"></i>
				</button></td>
			</tr>
		<?php endforeach ?>

	</tbody>
</table>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});
</script>
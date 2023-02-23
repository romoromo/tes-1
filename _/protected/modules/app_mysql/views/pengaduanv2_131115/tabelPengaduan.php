<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
	<thead>			                
		<tr>
			<th width="2%" data-hide="phone">&nbsp;</th>
			<th width="2%" data-hide="phone">No</th>
			<th data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i> Pengirim </th>
			<th data-hide="phone">Topik Pengaduan </th>
			<th data-hide="phone,tablet">Isi Pengaduan </th>
			<th data-hide="phone,tablet">Tanggal </th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; ?>
		<?php foreach ($data['pengaduan'] as $key_pengaduan): ?>
			<tr>
				<td data-hide="phone"><button class="btn btn-default" onclick="detail(<?php echo $key_pengaduan['tblpengaduan_id'] ?>)" type="button">Detail</button></td>
				<td data-hide="phone"><?php echo $i++; ?></td>
				<td data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i><?php echo $key_pengaduan['tblpengaduan_notelp'] ?> - <?php echo $key_pengaduan['tblpengaduan_nama'] ?></td>
				<td data-hide="phone"><?php echo $key_pengaduan['tblpengaduan_jenis'] ?></td>
				<td data-hide="phone,tablet"><?php echo $key_pengaduan['tblpengaduan_komentar'] ?></td>
				<td data-hide="phone,tablet"><?php echo $key_pengaduan['tblpengaduan_tanggal'] ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<script type="text/javascript">
	//jQuery(document).ready(function($) {
	//	reloadDT('dt_basic');
	//});
</script>
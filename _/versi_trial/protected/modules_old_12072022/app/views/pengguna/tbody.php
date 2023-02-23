<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr>
			<th data-hide="phone">No</th>
			<th data-class="expand">Nama Pengguna </th>
			<th data-hide="phone">Username</th>
			<th data-hide="phone">Group</th>
			<th data-hide="phone,tablet">Email</th>
			<th data-hide="phone,tablet">No. Telepon</th>
			<th data-hide="phone,tablet">Status</th>
			<th ></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; $status=""; foreach ($data['data_pengguna'] as $pengguna): ?>
		<tr>

			<td><?php echo $no++; ?></td>
			<td><?php echo $pengguna['TBLPENGGUNA_NAMA']; ?></td>
			<td><?php echo $pengguna['TBLPENGGUNA_USERNAME']; ?></td>
			<td><?php echo $pengguna['TBLROLE_CODE']; ?></td>
			<td><?php echo $pengguna['TBLPENGGUNA_EMAIL']; ?></td>
			<td><?php echo $pengguna['TBLPENGGUNA_NOTELP']; ?></td>
			<td><?php if($pengguna['TBLPENGGUNA_STATUS']== "T") {$status="Aktif";} else {$status ="Tidak Aktif";} ?>
				<?php echo $status; ?>
			</td>
			<td>
				<div align="center">
				<button type="button" rel="tooltip" data-placement="left" data-original-title="Klik untuk mengedit data" onclick='edit(<?php echo $pengguna["TBLPENGGUNA_ID"]; ?>)' class='btn btn-circle btn-success btn-sm'><i class="fa fa-pencil"></i>&nbsp;</button>
										<button type="button" rel="tooltip" data-placement="left" data-original-title="Klik untuk menghapus data" onclick='hapus(<?php echo $pengguna["TBLPENGGUNA_ID"]; ?>)' class='btn btn-circle  btn-danger btn-sm'><i class="fa fa-trash-o"></i>&nbsp;</button>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		pageSetUp();
		reloadDT('dt_basic');
	});
</script>
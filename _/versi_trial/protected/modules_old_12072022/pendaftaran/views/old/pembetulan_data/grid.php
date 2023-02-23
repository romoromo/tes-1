<table id="dt_pipeline" class="table table-striped table-bordered table-hover smart-form" width="100%">
	<thead>
		<tr>
		    <th data-hide="phone"><div class="center"> NPWP</div></th>
		    <th data-hide="phone"><div class="center"> Gol</div></th>
		    <th data-class="expand"><div class="center"> No Pokok</div></th>
		    <th data-hide="phone, tablet"><div class="center"> Kelurahan</div></th>
		    <th data-hide="phone, tablet"><div class="center"> Kecamatan</div></th>
		    <th data-hide="phone, tablet">Nama Usaha</th>
		    <th data-hide="phone, tablet, desktop">Alamat Usaha</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($data['daftar'] as $rowtap): ?>
		<tr>
			<td><?= $rowtap['TBLDAFTAR_JENISPENDAPATAN'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_GOLONGAN'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_NOPOK'] ?></td>
			<td><?= $rowtap['REFKECAMATAN_NAMA'] ?></td>
			<td><?= $rowtap['REFKELURAHAN'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_pipeline');
	});
</script>
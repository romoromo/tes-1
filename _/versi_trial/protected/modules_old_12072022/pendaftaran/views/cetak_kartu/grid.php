<table id="dt_pipeline" class="table table-striped table-bordered table-hover smart-form" width="100%">
	<thead>
		<tr>
			<th>	
		    	<label class="checkbox">
					<input type="checkbox" name="checkbox">
					<i></i>
				</label>
		    </th>
		    <th width="15"> NO</th>
		    <th data-hide="phone"><div class="center"> NPWP</div></th>
		    <th data-hide="phone"><div class="center"> GOL</div></th>
		    <th data-class="expand"><div class="center"> NO POKOK</div></th>
		    <th data-hide="phone, tablet"><div class="center"> KECAMATAN</div></th>
		    <th data-hide="phone, tablet"><div class="center"> KELURAHAN</div></th>
		    <th data-hide="phone, tablet">NAMA BADANUSAHA</th>
		    <th>ALAMAT BADANUSAHA</th>
		    <th>BBU</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = 1; foreach ($data['daftar'] as $rowtap): ?>
		<tr>
			<td>
		    	<label class="checkbox">
					<input type="checkbox" name="checkbox">
					<i></i>
				</label>
		    </td>
			<td><?= $no++; ?></td>
			<td><?= $rowtap['TBLDAFTAR_JENISPENDAPATAN'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_GOLONGAN'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_NOPOK'] ?></td>
			<td>[<?= $rowtap['TBLKECAMATAN_IDBADANUSAHA'] ?>] <?= $rowtap['REFKECAMATAN_NAMA'] ?></td>
			<td>[<?= $rowtap['TBLKELURAHAN_IDBADANUSAHA'] ?>] <?= $rowtap['REFKELURAHAN'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td>
			<td><?= $rowtap['REFBADANUSAHA_IDBADANUSAHA'] ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_pipeline');
	});
</script>
<table id="dt_pipeline" class="table table-striped table-bordered table-hover smart-form" width="100%">
	<thead>
		<tr>
		    <th width="15"> No</th>
	        <th data-hide="phone"><div class="center"> NPWPD</div></th><!-- 
		    <th data-hide="phone"><div class="center"> GOL</div></th> -->
		    <th data-class="expand"><div class="center"> NOPOK</div></th><!-- 
		    <th data-hide="phone, tablet"><div class="center"> KECAMATAN</div></th>
		    <th data-hide="phone, tablet"><div class="center"> KELURAHAN</div></th> -->
		    <th data-hide="phone, tablet">NAMA USAHA</th>
		    <th data-hide="phone, tablet">ALAMAT USAHA</th>
		    <th data-hide="phone, tablet">BBU</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = 1; foreach ($data['daftar'] as $rowtap): ?>
		<tr><td><?= $no++; ?></td>
			<td><?= $rowtap['TBLDAFTAR_JENISPENDAPATAN'] ?></td>
		<?php /*	<td><?= $rowtap['TBLDAFTAR_GOLONGAN'] ?></td> */?>
			<td><?= $rowtap['TBLDAFTAR_NOPOK'] ?></td>
		<?php /*	<td><?= $rowtap['REFKECAMATAN_NAMA'] ?></td>
			<td><?= $rowtap['REFKELURAHAN'] ?></td> */?>
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
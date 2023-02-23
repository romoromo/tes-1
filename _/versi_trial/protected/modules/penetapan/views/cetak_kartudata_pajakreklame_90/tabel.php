
<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
	<thead>
		<!-- <header>
			<span class="widget-icon"> <i class="fa fa-table"></i> </span>
			<h2>&nbsp;Data</h2>
		</header> -->
		<tr>
			
			<th data-hide="phone"><div class="center"> NMREKENING</div></th>
			<th data-hide="phone"><div class="center"> GOL</div></th>
			<th data-hide="phone"><div class="center"> NOPOK</div></th>
			<th data-hide="phone"><div class="center"> KEC</div></th>
			<th data-hide="phone"><div class="center"> KEL</div></th>
			<th data-hide="phone"><div class="center"> BNAMA</div></th>
			<th data-hide="phone"><div class="center"> KE</div></th>
			<th data-hide="phone"><div class="center"> KTRE_1</div></th>
			<th data-hide="phone"><div class="center"> KTRE_2</div></th>
			<th data-hide="phone"><div class="center"> KE_1</div></th>
			<th data-hide="phone"><div class="center"> JUMREK</div></th>
			<th data-hide="phone"><div class="center"> JAM</div></th>
			<th data-hide="phone"><div class="center"> KAW</div></th>
			<th data-hide="phone"><div class="center"> FJ</div></th>
			<th data-hide="phone"><div class="center"> ST</div></th>
			<th data-hide="phone"><div class="center"> SP</div></th>
			<th data-hide="phone"><div class="center"> PANJANG</div></th>
			<th data-hide="phone"><div class="center"> LEBAR</div></th>
			<th data-hide="phone"><div class="center"> JUHR</div></th>
			<th data-hide="phone"><div class="center"> NITI</div></th>
			<th data-hide="phone"><div class="center"> IDX</div></th>
			<th data-hide="phone"><div class="center"> TARIFRP</div></th>
			<th data-hide="phone"><div class="center"> HARGA</div></th>
			<th data-hide="phone"><div class="center"> THP</div></th>
			<th data-hide="phone"><div class="center"> BLP</div></th>
			<th data-hide="phone"><div class="center"> HRP</div></th>
			<th data-hide="phone"><div class="center"> PAJAK</div></th>
			<th data-hide="phone"><div class="center"> THSPT</div></th>
			<th data-hide="phone"><div class="center"> BLSP</div></th>
			<th data-hide="phone"><div class="center"> HRSPT</div></th>
		</thead>
		<tbody>
			<?php $no = 1; ($data['table']); foreach ($data['table'] as $row): ?>
			<tr>

				<td><?= $row['NMREKENING']; ?></td>
				<td><?= $row['TBLDAFTAR_GOLONGAN']; ?></td>
				<td><?= $row['TBLDAFTAR_NOPOK']; ?></td>
				<td><?= $row['TBLKECAMATAN_ID']; ?></td>
				<td><?= $row['TBLKELURAHAN_ID']; ?></td>
				<td><?= $row['TBLDAFTAR_BADANUSAHANAMA']; ?></td>
				<td><?= $row['TBLPENDATAAN_PAJAKKE']; ?></td>
				<td><?= $row['TBLDAFTREKLAME_KETERANGAN1']; ?></td>
				<td><?= $row['TBLDAFTREKLAME_KETERANGAN2']; ?></td>
				<td><?= $row['TBLPENDATAAN_PAJAKKE']; ?></td>
				<td><?= $row['TBLDAFTREKLAME_JMLHREKLAME']; ?></td>
				<td><?= $row['JAM']; ?></td>
				<td><?= $row['TBLDAFTREKLAME_SKORKAWASAN']; ?></td>
				<td><?= $row['FJ']; ?></td>
				<td><?= $row['ST']; ?></td>
				<td><?= $row['REFKETINGGIAN_SKOR']; ?></td>
				<td><?= $row['TBLDAFTREKLAME_PANJANG']; ?></td>
				<td><?= $row['TBLDAFTREKLAME_LEBAR']; ?></td>
				<td><?= $row['TBLDAFTREKLAME_JUMLAHHARI']; ?></td>
				<td><?= $row['TBLDAFTREKLAME_NILAISTRATEGIS']; ?></td>
				<td><?= $row['REFSUDUTPANDANG_SKOR']; ?></td>
				<td><?= $row['TBLDAFTREKLAME_RPTARIF']; ?></td>
				<td><?= $row['HARGA']; ?></td>
				<td><?= $row['TBLPENDATAAN_THNPAJAK']; ?></td>
				<td><?= $row['TBLPENDATAAN_BLNPAJAK']; ?></td>
				<td><?= $row['TBLPENDATAAN_TGLPAJAK']; ?></td>
				<td><?= $row['TBLDAFTREKLAME_PAJAK']; ?></td>
				<td><?= $row['TBLDAFTREKLAME_THNSPTPD']; ?></td>
				<td><?= $row['TBLDAFTREKLAME_BLNSPTPD']; ?></td>
				<td><?= $row['TBLDAFTREKLAME_TGLSPTPD']; ?></td>
				
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});
</script>
<!-- <fieldset>
<header></header>
	<div class="row">
		<section class="col col-md-1">
			<p>J_SKPD</p>
		</section>
		<section class="col col-md-3">
			<label class="input">
				<input type="nopok" name="" id="nopok">
			</label>
		</section>
	</div>
</fieldset> -->



<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
	<thead>
		<!-- <header>
			<span class="widget-icon"> <i class="fa fa-table"></i> </span>
			<h2>&nbsp;Data</h2>
		</header> -->
		<tr>

			<th data-hide="phone">
				<div class="center"> NO</div>
			</th>
			<th data-hide="phone">
				<div class="center"> TANGGAL</div>
			</th>
			<th data-hide="phone">
				<div class="center"> KEGIATAN</div>
			</th>
			<th data-hide="phone">
				<div class="center"> JENIS KETETAPAN</div>
			</th>
			<th data-hide="phone">
				<div class="center"> NOMOR SK</div>
			</th>
			<th data-hide="phone">
				<div class="center"> MASA PAJAK</div>
			</th>
			<th data-hide="phone">
				<div class="center"> JUMLAH PIUTANG</div>
			</th>
			<th data-hide="phone">
				<div class="center"> NAMA WP</div>
			</th>
			<th data-hide="phone">
				<div class="center"> HASIL</div>
			</th>
			<th data-hide="phone">
				<div class="center"> REALISASI</div>
			</th>
	</thead>
	<tbody>
		<?php $no = 1;
		($data['table']);
		foreach ($data['table'] as $row) : ?>
			<tr>

				<td><?= $no++; ?></td>
				<td><?= date('d-m-Y', strtotime($row['TGL'])); ?></td>
				<td><?= $row['KEG']; ?></td>
				<td><?= $row['JEN']; ?></td>
				<td><?= $row['NOSK']; ?></td>
				<td><?= LokalIndonesia::getbulan($row['BLNAKHIR']); ?> 20<?= $row['THN']; ?> </td>
				<td><?= LokalIndonesia::ribuan($row['PIUTANG']); ?></td>
				<td><?= $row['NMWP']; ?></td>
				<td><?= $row['HASIL']; ?></td>
				<td><?= LokalIndonesia::ribuan($row['REALISASI']); ?></td>

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
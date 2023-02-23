<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
	<thead>
		<!-- <header>
			<span class="widget-icon"> <i class="fa fa-table"></i> </span>
			<h2>&nbsp;Data</h2>
		</header> -->
		<tr>

			<th data-hide="phone">
				<div class="center"> Angsuran Ke</div>
			</th>
			<th data-hide="phone">
				<div class="center"> Tanggal Tempo</div>
			</th>
			<th data-hide="phone">
				<div class="center"> Bulan Tempo</div>
			</th>
			<th data-hide="phone">
				<div class="center"> Tahun Tempo</div>
			</th>
			<th data-hide="phone">
				<div class="center"> Total</div>
			</th>
			<th data-hide="phone">
				<div class="center"> Sisa</div>
			</th>
			<th data-hide="phone">
				<div class="center"> Pokok</div>
			</th>
			<th data-hide="phone">
				<div class="center"> Bunga Angsuran</div>
			</th>
	</thead>
	<tbody>
		<?php $no = 1;
		($data['table']);
		foreach ($data['table'] as $row) : ?>
			<tr>

				<td><?= $row['TBLANGSURAN_PAJAKKE']; ?></td>
				<td><?= $row['TBLANGSURAN_TGLBATASKETETAPAN']; ?></td>
				<td><?= $row['TBLANGSURAN_BLNBATASKETETAPAN']; ?></td>
				<td><?= $row['TBLANGSURAN_THNBATASKETETAPAN']; ?></td>
				<td><?= $row['TBLANGSURAN_KETETAPANTOTAL']; ?></td>
				<td><?= $row['TBLANGSURAN_KETETAPANTOTAL'] - $row['TBLANGSURAN_ANGSURAN']; ?></td>
				<td><?= $row['TBLANGSURAN_ANGSURAN']; ?></td>
				<td><?= $row['TBLANGSURAN_BUNGAANGSURAN']; ?></td>


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
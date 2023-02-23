
<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
	<thead>
		<!-- <header>
			<span class="widget-icon"> <i class="fa fa-table"></i> </span>
			<h2>&nbsp;Data</h2>
		</header> -->
		<tr>
			
			<th data-hide="phone"><div class="center"> NMREKENING</div></th>
			<th data-hide="phone"><div class="center"> BNAMA</div></th>
			<th data-hide="phone"><div class="center"> NOPOK</div></th>
			<th data-hide="phone"><div class="center"> KEC</div></th>
			<th data-hide="phone"><div class="center"> KEL</div></th>
			<th data-hide="phone"><div class="center"> BNAMA_1</div></th>
			<th data-hide="phone"><div class="center"> JEN</div></th>
			<th data-hide="phone"><div class="center"> THP</div></th>
			<th data-hide="phone"><div class="center"> BLP</div></th>
			<th data-hide="phone"><div class="center"> HRP</div></th>
			<th data-hide="phone"><div class="center"> RPOMZ</div></th>
			<th data-hide="phone"><div class="center"> THSPT</div></th>
			<th data-hide="phone"><div class="center"> BLSPT</div></th>
			<th data-hide="phone"><div class="center"> HRSPT</div></th>
			<th data-hide="phone"><div class="center"> THESPT</div></th>
			<th data-hide="phone"><div class="center"> BLESPT</div></th>
			<th data-hide="phone"><div class="center"> HRESPT</div></th>
		</thead>
		<tbody>
			<?php $no = 1; ($data['table']); foreach ($data['table'] as $row): ?>
			<tr>

				<td><?= $row['NMREKENING']; ?></td>
				<td><?= $row['TBLDAFTAR_BADANUSAHANAMA']; ?></td>
				<td><?= $row['TBLDAFTAR_NOPOK']; ?></td>
				<td><?= $row['TBLKECAMATAN_ID']; ?></td>
				<td><?= $row['TBLKELURAHAN_ID']; ?></td>
				<td><?= $row['TBLDAFTAR_BADANUSAHANAMA']; ?></td>
				<td><?= $row[$data['namatbl'].'_'.'REKJENIS']; ?></td>
				<td><?= $row['TBLPENDATAAN_THNPAJAK']; ?></td>
				<td><?= $row['TBLPENDATAAN_BLNPAJAK']; ?></td>
				<td><?= $row['TBLPENDATAAN_TGLPAJAK']; ?></td>
				<td align="right"><?= LokalIndonesia::ribuan($row[$data['namatbl'].'_'.'OMSETPAJAK']); ?></td>
				<td><?= $row[$data['namatbl'].'_'.'THNSPTPD']; ?></td>
				<td><?= $row[$data['namatbl'].'_'.'BLNSPTPD']; ?></td>
				<td><?= $row[$data['namatbl'].'_'.'TGLSPTPD']; ?></td>
				<td><?= $row[$data['namatbl'].'_'.'THNENTRI']; ?></td>
				<td><?= $row[$data['namatbl'].'_'.'BLNENTRI']; ?></td>
				<td><?= $row[$data['namatbl'].'_'.'TGLENTRI']; ?></td>
				
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
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



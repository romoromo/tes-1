<table id="dt_pipeline" class="table table-striped table-bordered table-hover smart-form" width="100%">
	<thead>
		<tr>
			<?php /*th class="" width="5%" data-hide="phone">
				<div class="center">
					<label class="checkbox">
						<input checked="" type="checkbox" name="cbx-all" onclick="cekAll(this)">
						<i></i> All
					</label>
				</div>
			</th*/ ?>
			<th width="5%" data-hide="phone">NOMOR SKP</th>
			<th width="7%" data-hide="phone, tablet">TANGGAL SKPD</th>
			<th width="5%" data-class="expand">NOPOK</th>
			<th data-hide="phone, tablet">THP</th>
			<th data-hide="phone, tablet">BLP</th>
			<th data-hide="phone, tablet">HRP</th>
			<th data-hide="phone, tablet">KE</th>
			<th data-hide="phone, tablet">NAMA USAHA</th>
			<th data-hide="phone, tablet">GOL</th>
			<th data-hide="phone, tablet">PAJAK</th>
			<th data-hide="phone, tablet">KDRE</th>
			<th data-hide="phone, tablet">LOKASI</th>
			<th data-hide="phone, tablet">ISI REKLAME</th>
			<th data-hide="phone, tablet">KETERANGAN</th>
			<th data-hide="phone, tablet">JUMLAH</th>
			<th data-hide="phone, tablet">PANJANG</th>
			<th data-hide="phone, tablet">LEBAR</th>
			<th data-hide="phone, tablet">KAW</th>
			<th data-hide="phone, tablet">SP</th>
			<th data-hide="phone, tablet">IDX</th>
			<th data-hide="phone, tablet">NITI</th>
			<th data-hide="phone, tablet">NISEWA</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = $data['nourut']; foreach ($data['ketetapan'] as $rowtap): ?>
		<tr>
			<?php /*td>
				<div align="center">
					<label class="checkbox">
						<input checked="" class="cbx_tetapkan" value="<?php echo $rowtap['TBLDAFTAR_NOPOK'] ?>-<?php echo $rowtap['TBLPENDATAAN_THNPAJAK'] ?>-<?php echo $rowtap['LOKASI'] ?>-<?php echo $rowtap['TBLDAFTREKLAME_NOMORSKPD'] ?>-<?php echo $rowtap['PAJAK'] ?>-<?php echo $rowtap['TBLPENDATAAN_BLNPAJAK'] ?>-<?php echo $rowtap['TBLPENDATAAN_TGLPAJAK'] ?>" name="nopokPajak" type="checkbox">
						<i></i>
					</label>
				</div>
			</td*/ ?>
			<td><?= $rowtap['TBLDAFTREKLAME_NOMORSKPD'] ?></td>
			<td><?= $rowtap['TBLDAFTREKLAME_TGLSKPD'] ?>-<?= $rowtap['TBLDAFTREKLAME_BLNSKPD'] ?>-20<?= $rowtap['TBLDAFTREKLAME_THNSKPD'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_NOPOK'] ?></td>
			<td><?= $rowtap['TBLPENDATAAN_THNPAJAK'] ?></td>
			<td><?= $rowtap['TBLPENDATAAN_BLNPAJAK'] ?></td>
			<td><?= $rowtap['TBLPENDATAAN_TGLPAJAK'] ?></td>
			<td><?= $rowtap['LOKASI'] ?></td>
			<td><?= $rowtap['NAMA_USAHA'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_GOLONGAN'] ?></td>
			<td><?= LokalIndonesia::ribuan($rowtap['PAJAK']) ?></td>
			<td><?= $rowtap['KDRE'] ?></td>
			<td><?= $rowtap['LOKASI'] ?></td>
			<td><?= $rowtap['ISI_REKLAME'] ?></td>
			<td><?= $rowtap['KETERANGAN'] ?></td>
			<td><?= $rowtap['JUMLAH'] ?></td>
			<td><?= $rowtap['TBLDAFTREKLAME_PANJANG'] ?></td>
			<td><?= $rowtap['TBLDAFTREKLAME_LEBAR'] ?></td>
			<td><?= $rowtap['TBLDAFTREKLAME_SKORKAWASAN'] ?></td>
			<td><?= $rowtap['REFKETINGGIAN_SKOR'] ?></td>
			<td><?= $rowtap['REFSUDUTPANDANG_SKOR'] ?></td>
			<td><?= $rowtap['NITI_1'] ?></td>
			<td><?= LokalIndonesia::ribuan($rowtap['TBLDAFTREKLAME_NILAISEWA']) ?></td>
		</tr>
	<?php $no++; endforeach ?>
	</tbody>
</table>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		// reloadDT('dt_pipeline');
	});

	/*jQuery(document).ready(function($) {
		var elm = $("input[name='nopokPajak']");
		cekAll(elm);
	});*/

	function cekAll(elemen) {
		$('.cbx_tetapkan').prop("checked" , elemen.checked);
	}

	$(".cbx_tetapkan").click(function(event) {
		if (!$(event.target).prop('checked')) {
			window.id_eksepsi += ','+$(event.target).val();
			cari();
		}
	});
</script>
<table id="dt_pipeline" class="table table-striped table-bordered table-hover smart-form" width="100%">
	<thead>
		<tr>
			<th class="" width="5%" data-hide="phone">
				<div style="display: none;" class="center">
					<label class="checkbox">
						<input checked="" type="checkbox" name="cbx-all" onclick="cekAll(this)">
						<i></i> All
					</label>
				</div>
			</th>
			<th width="5%" data-hide="phone">NOMOR SKP</th>
			<th data-hide="phone">TANGGAL SKPD</th>
			<th width="25%" data-class="expand">NOPOK</th>
			<th data-hide="phone, tablet">THP</th>
			<th data-hide="phone, tablet">BLP</th>
			<th data-hide="phone, tablet">HRP</th>
			<th data-hide="phone, tablet">KE</th>
			<th data-hide="phone, tablet">NAMA USAHA</th>
			<th data-hide="phone, tablet">GOL</th>
			<th data-hide="phone, tablet">PAJAK</th>
			<th data-hide="phone, tablet">KDRE</th>
			<th data-hide="phone, tablet">TGL_ENTRI</th>
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
			<td>
				<?php if ($rowtap['TBLDAFTREKLAME_TGLSKPD']!=''): ?>
					<label class="label label-success" style="color: white;padding: 2px;" ><strong>Sudah di Tetapkan</strong></label>
				<?php else: ?>
					<div align="center">
						<label class="checkbox">
							<input checked="" class="cbx_tetapkan" value="<?php echo $rowtap['TBLDAFTAR_NOPOK'] ?>-<?php echo $rowtap['TBLPENDATAAN_THNPAJAK'] ?>-<?php echo $rowtap['LOKASI'] ?>-<?php echo $no; ?>-<?php echo $rowtap['PAJAK'] ?>-<?php echo $rowtap['TBLPENDATAAN_BLNPAJAK'] ?>-<?php echo $rowtap['TBLPENDATAAN_TGLPAJAK'] ?>" name="nopokPajak" type="checkbox">
							<i></i>
						</label>
					</div>
				<?php endif; ?>
			</td>
			<td><?= $no ?></td>
			<td><?= strtotime($data['tglskpd']) ? date('d/m/Y', strtotime($data['tglskpd'])) : '' ?></td>
			<td><?= $rowtap['TBLDAFTAR_NOPOK'] ?></td>
			<td><?= $rowtap['TBLPENDATAAN_THNPAJAK'] ?></td>
			<td><?= $rowtap['TBLPENDATAAN_BLNPAJAK'] ?></td>
			<td><?= $rowtap['TBLPENDATAAN_TGLPAJAK'] ?></td>
			<td><?= $rowtap['LOKASI'] ?></td>
			<td><?= $rowtap['NAMA_USAHA'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_GOLONGAN'] ?></td>
			<td><?= LokalIndonesia::ribuan($rowtap['PAJAK']) ?></td>
			<td><?= $rowtap['KDRE'] ?></td>
			<td><?= ($rowtap['TGL_ENTRY']) ?></td>
			<td><?= $rowtap['LOKASI'] ?></td>
			<td><?= $rowtap['ISI_REKLAME'] ?></td>
			<td><?= $rowtap['KETERANGAN'] ?></td>
			<td><?= $rowtap['JUMLAH'] ?></td>
			<td><?= $rowtap['TBLDAFTREKLAME_PANJANG'] ?></td>
			<td><?= $rowtap['TBLDAFTREKLAME_LEBAR'] ?></td>
			<td><?= $rowtap['TBLDAFTREKLAME_SKORKAWASAN'] ?></td>
			<td><?= $rowtap['REFKETINGGIAN_SKOR'] ?></td>
			<td><?= $rowtap['REFSUDUTPANDANG_SKOR'] ?></td>
			<td><?= $rowtap['TBLDAFTREKLAME_NILAISTRATEGIS'] ?></td>
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
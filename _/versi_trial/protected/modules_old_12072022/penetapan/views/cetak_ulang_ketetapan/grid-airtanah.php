<table id="dt_pipeline" class="table table-striped table-bordered table-hover smart-form" width="100%">
	<thead>
		<tr>
			<th width="10%" data-hide="phone">
				<div class="center">
					<label class="checkbox">
						<input checked="" type="checkbox" name="cbx-all" onclick="cekAll(this)">
						<i></i> All
					</label>
				</div>
			</th>
			<th width="5%" data-hide="phone">NOMOR SKP</th>
			<th width="25%" data-class="expand">TANGGAL SKPD</th>
			<th data-hide="phone">NOPOK</th>
			<th data-hide="phone, tablet">THP</th>
			<th data-hide="phone, tablet">BLP</th>
			<th data-hide="phone, tablet">HRP</th>
			<th data-hide="phone, tablet">KE</th>
			<th data-hide="phone, tablet">BNAMA</th>
			<th data-hide="phone, tablet">BAL</th>
			<th data-hide="phone, tablet">PAJAK</th>
			<th data-hide="phone, tablet">PNAMA</th>
			<th data-hide="phone, tablet">GOL</th>
			<th data-hide="phone, tablet">KEC</th>
			<th data-hide="phone, tablet">KEL</th>
			<th data-hide="phone, tablet">VOLUME</th>
			<th data-hide="phone, tablet">TGL ENTRI</th>
		</tr>
	</thead>
	<tbody>
	<?php /*$no=$data['NOURUT'];*/ foreach ($data['ketetapan'] as $row): ?>
		<tr>
			<td>
				<div align="center">
					<label class="checkbox">
						<input checked="" class="cbx_tetapkan" value="<?php echo $row['TBLDAFTAR_NOPOK'] ?>-<?php echo (int)$row['TBLPENDATAAN_THNPAJAK'] ?>-<?php echo (int)$row['TBLPENDATAAN_BLNPAJAK'] ?>-<?php echo $row['TBLDAFTTANAH_NOMORSKPD'] ?>-<?php echo $row['PAJAK'] ?>" name="nopokPajakAir" type="checkbox">
						<i></i>
					</label>
				</div>
			</td>
			<td><?php echo $row['TBLDAFTTANAH_NOMORSKPD']; ?></td>
			<td><?php echo $row['TGL_SKPD'] ?></td>
			<td><?php echo $row['TBLDAFTAR_NOPOK'] ?></td>
			<td><?php echo $row['TBLPENDATAAN_THNPAJAK'] ?></td>
			<td><?php echo $row['TBLPENDATAAN_BLNPAJAK'] ?></td>
			<td><?php echo $row['TBLPENDATAAN_TGLPAJAK'] ?></td>
			<td><?php echo $row['TBLPENDATAAN_PAJAKKE'] ?></td>
			<td><?= $row['NAMA_USAHA'] ?></td>
			<td><?= $row['LOKASI'] ?></td>
			<td><?= LokalIndonesia::ribuan($row['PAJAK']) ?></td>
			<td><?= $row['NAMA_PEMILIK'] ?></td>
			<td><?= $row['TBLDAFTAR_GOLONGAN'] ?></td>
			<td><?= $row['KEC_ID'] ?></td>
			<td><?= $row['KEL_ID'] ?></td>
			<td><?php echo $row['TBLDAFTTANAH_TOTALVOLUME'] ?></td>
			<td><?php echo $row['TGL_ENTRY'] ?></td>
		</tr>
	<?php /*$no++;*/ endforeach ?>
	</tbody>
	<tbody>
	</tbody>
</table>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		// reloadDT('dt_pipeline');
		// var elm = $("input[name='cbx-all']");
		// cekAll(elm);
	});

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
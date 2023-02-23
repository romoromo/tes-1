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
			<th data-hide="phone">TANGGAL SKPD</th>
			<th width="25%" data-class="expand">NOPOK</th>
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
			<th data-hide="phone, tablet">JUMHR</th>
			<th data-hide="phone, tablet">RPOMZ</th>
			<th data-hide="phone, tablet">TARIFPC</th>
			<th data-hide="phone, tablet">TARIFRP</th>
			<th data-hide="phone, tablet">BUNGAPC</th>
			<th data-hide="phone, tablet">BUNGARP</th>
			<th data-hide="phone, tablet">NAIK</th>
			<th data-hide="phone, tablet">PCRING</th>
			<th data-hide="phone, tablet">RPRING</th>
			<th data-hide="phone, tablet">TGL_ENTRY</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = $data['nourut']; foreach ($data['ketetapan'] as $rowtap): ?>
		<tr>
			<td>
				<div align="center">
					<label class="checkbox">
						<input checked="" class="cbx_tetapkan" value="<?php echo $rowtap['TBLDAFTAR_NOPOK'] ?>-<?php echo (int)$rowtap['TBLPENDATAAN_THNPAJAK'] ?>-<?php echo (int)$rowtap['TBLPENDATAAN_BLNPAJAK'] ?>-<?php echo (int)$rowtap['TBLPENDATAAN_TGLPAJAK'] ?>-<?php echo $no ?>-<?php echo $rowtap['PAJAK'] ?>" name="nopokPajakHiburan" type="checkbox">
						<i></i>
					</label>
				</div>
			</td>
			<td><?= $no ?></td>

			<td>
				<?php if ($rowtap['TBLDAFTHIBURAN_TGLSKPD']==''): ?>
					<label class="label label-warning" style="color: white;padding: 2px;" ><strong>Belum di Tetapkan</strong></label>
				<?php else: ?>
					<?php echo $rowtap['TGL_SKPD'] ?>	
				<?php endif; ?>
			</td>
			<td><?= $rowtap['TBLDAFTAR_NOPOK'] ?></td>
			<td><?= $rowtap['TBLPENDATAAN_THNPAJAK'] ?></td>
			<td><?= $rowtap['TBLPENDATAAN_BLNPAJAK'] ?></td>
			<td><?= $rowtap['TBLPENDATAAN_TGLPAJAK'] ?></td>
			<td></td>
			<td><?= $rowtap['NAMA_USAHA'] ?></td>
			<td><?= $rowtap['LOKASI'] ?></td>
			<td><?= LokalIndonesia::ribuan($rowtap['PAJAK']) ?></td>
			<td><?= $rowtap['NAMA_PEMILIK'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_GOLONGAN'] ?></td>
			<td><?= $rowtap['KEC_ID'] ?></td>
			<td><?= $rowtap['KEL_ID'] ?></td>
			<td><?= 30 ?></td>
			<td><?= LokalIndonesia::ribuan($rowtap['OMZET']) ?></td>
			<td><?= $rowtap['TARIFPC'] ?></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><?= $rowtap['TBLDAFTHIBURAN_TGLENTRI'] ?></td>
		</tr>
	<?php $no++; endforeach ?>
	</tbody>
</table>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		// reloadDT('dt_pipeline');
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
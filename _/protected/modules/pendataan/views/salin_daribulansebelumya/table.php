<!-- <table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic"></table> -->

<table id="dt_basic" class="table table-striped table-bordered table-hover smart-form" width="100%">
	<thead>
		<tr>
			<th>
				<label class="checkbox">
					<input type="checkbox" name="checkbox" onclick="cekAll(this)">
					<i></i>
				</label>
			</th>
			<th width="15"> No</th>
			<th data-hide="phone"><div class="center"> Tahun</div></th>
			<th data-hide="phone"><div class="center"> Bulan</div></th>
			<th data-class="expand"><div class="center"> Tgl Entry</div></th>
			<th data-hide="phone, tablet"><div class="center"> Nomor Pokok</div></th>
			<th data-hide="phone, tablet"><div class="center"> Ke</div></th>
			<th data-hide="phone, tablet"> Nama Badan Usaha</th>
			<th data-hide="phone, tablet"> Pemilik</th>
			<th> Pajak</th>
			<th> No SSP</th>
			<th> RP SSPD</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; foreach ($data['table'] as $row): ?>
		<tr>
			<td>
				<label class="checkbox">
					<input checked="" class="cbx_salin" type="checkbox" name="nopokPajak" value="<?= $row['TBLDAFTAR_NOPOK']; ?>-<?= $row['TBLDAFTAR_JNSPENDAPATAN']; ?>-<?= $row['TBLDAFTAR_GOLONGAN']; ?>-<?= $row['TBLKECAMATAN_ID']; ?>-<?= $row['TBLKELURAHAN_ID']; ?>-<?= $row[$data['namatbl'].'_'.'REKURUSAN']; ?>-<?= $row[$data['namatbl'].'_'.'REKPEMERINTAHAN']; ?>-<?= $row[$data['namatbl'].'_'.'REKORGANISASI']; ?>-<?= $row[$data['namatbl'].'_'.'REKPROGRAM']; ?>-<?= $row[$data['namatbl'].'_'.'REKKEGIATAN']; ?>-<?= $row[$data['namatbl'].'_'.'REKDINAS']; ?>-<?= $row[$data['namatbl'].'_'.'REKBIDANG']; ?>-<?= $row[$data['namatbl'].'_'.'REKPENDAPATAN']; ?>-<?= $row[$data['namatbl'].'_'.'REKPAD']; ?>-<?= $row[$data['namatbl'].'_'.'REKPAJAK']; ?>-<?= $row[$data['namatbl'].'_'.'REKAYAT']; ?>-<?= $row[$data['namatbl'].'_'.'REKJENIS']; ?>-<?= $row[$data['namatbl'].'_'.'ISJNSPENETAPAN']; ?>-<?= $row[$data['namatbl'].'_'.'PERSENTARIF']; ?>-<?= $row[$data['namatbl'].'_'.'TGLBATASSPTPD']; ?>">
					<i></i>
				</label>
			</td>
			<td><?= $no++ ?></td>
			<td>20<?= $row['TBLPENDATAAN_THNPAJAK']; ?></td>
			<td><?= LokalIndonesia::getbulan($row['TBLPENDATAAN_BLNPAJAK']); ?></td>
			<td><?= $row[$data['namatbl'].'_'.'TGLENTRI']; ?>/<?= $row[$data['namatbl'].'_'.'BLNENTRI']; ?>/20<?= $row[$data['namatbl'].'_'.'THNENTRI']; ?></td>
			<td><?= $row['TBLDAFTAR_NOPOK']; ?></td>
			<td><?//= $row[$data['namatbl'].'_'.'PAJAKKE']; ?></td>
			<td><?= $row['TBLDAFTAR_BADANUSAHANAMA']; ?></td>
			<td><?= $row['TBLDAFTAR_PEMILIKNAMA']; ?></td>
			<td><?= LokalIndonesia::rupiah($row[$data['namatbl'].'_'.'PAJAK']); ?></td>
			<td><?= $row[$data['namatbl'].'_'.'REGSETOR']; ?></td>
			<td><?= LokalIndonesia::rupiah($row[$data['namatbl'].'_'.'RUPIAHSETOR']) ?></td>

		</tr>
		<?php endforeach ?>
	</tbody>
</table>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		// reloadDT('dt_basic');
	});

	jQuery(document).ready(function($) {
		var elm = $("input[name='nopokPajak']");
		cekAll(elm);
	});

	function cekAll(elemen) {
		$('.cbx_salin').prop("checked" , elemen.checked);
	}

	$(".cbx_salin").click(function(event) {
		if (!$(event.target).prop('checked')) {
			window.id_eksepsi += ','+$(event.target).val();
		}
	});
</script>
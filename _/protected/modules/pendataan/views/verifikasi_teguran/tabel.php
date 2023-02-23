
<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
	<thead>
		<!-- <header>
			<span class="widget-icon"> <i class="fa fa-table"></i> </span>
			<h2>&nbsp;Data</h2>
		</header> -->
		<tr>
			<th data-hide="phone"><div class="center"> NO</div></th>
			<th data-hide="phone"><div class="center"> Aksi</div></th>
			<th data-hide="phone"><div class="center"> Rekening Pajak</div></th>
			<th data-hide="phone"><div class="center"> Nama Badan Usaha</div></th>
			<th data-class="expand"><div class="center"> Nopok</div></th>
			<th data-hide="phone,tablet,desktop"><div class="center"> Kode Kecamatan</div></th>
			<th data-hide="phone,tablet,desktop"><div class="center"> Kode Kelurahan</div></th>
			<th data-hide="phone"><div class="center"> Pemilik </div></th>
			<th data-hide="phone"><div class="center"> Email</div></th>
			<th data-hide="phone"><div class="center"> Status Akun SPTPD</div></th>
			<th data-hide="phone"><div class="center"> Status Verifikasi</div></th>
			<th data-hide="phone,tablet,desktop"><div class="center"> Jenis Pajak</div></th>
			<th data-hide="phone"><div class="center"> Tahun Pajak</div></th>
			<th data-hide="phone"><div class="center"> Bulan Pajak</div></th>
			<th data-hide="phone,tablet,desktop"><div class="center"> Tanggal Pajak</div></th>
			<?php /* ?>
			<th data-hide="phone"><div class="center"> RPOMZ</div></th>
			<th data-hide="phone"><div class="center"> THSPT</div></th>
			<th data-hide="phone"><div class="center"> BLSPT</div></th>
			<th data-hide="phone"><div class="center"> HRSPT</div></th>
			<th data-hide="phone"><div class="center"> THESPT</div></th>
			<th data-hide="phone"><div class="center"> BLESPT</div></th>
			<th data-hide="phone"><div class="center"> HRESPT</div></th>
			<?php */ ?>
		</thead>
		<tbody>
			<?php $no = 1; $list_id = array(); ($data['table']); foreach ($data['table'] as $row): ?>
			<tr>
				<td><?= $no++; ?></td>
				<td>
					<?php if (Tblrole::model()->isRole('SUPERADMIN') OR in_array(Yii::app()->user->role_id, array(96,97)) ): ?>
					<a href="javascript:void(0)" onclick="cetak_record('<?= $row['TBLDAFTAR_NOPOK']; ?>', '<?= $row['NOTEGURAN']; ?>', '<?= $row['TBLPENDATAAN_THNPAJAK']; ?>', '<?= $row['TBLPENDATAAN_BLNPAJAK']; ?>', '<?= $row['TBLREKENING_REKAYAT']; ?>')" class="btn btn-sm btn-default btn-block"><i class="fa fa-download"></i> Lihat Surat</a>
					<?php endif ?>
					<?php if (Tblrole::model()->isRole('SUPERADMIN')): ?>
					<button class="btn btn-sm btn-success btn-block" onclick="verifikasi_teguran('<?= base64_encode($row['TBLTEGURAN_ID']) ?>')">
						<i class="fa fa-check"></i> Verifikasi
					</button>
					<?php endif ?>
					<?php if (Tblrole::model()->isRole('SUPERADMIN') OR Yii::app()->user->role_id == 96): ?>
					<button class="btn btn-sm btn-danger btn-block" onclick="kembalikan('<?= base64_encode($row['TBLTEGURAN_ID']) ?>')">
						<i class="fa fa-reply"></i> Kembalikan
					</button>
					<?php endif ?>
				</td>
				<td><?= $row['NMREKENING']; ?></td>
				<td><?= $row['TBLDAFTAR_BADANUSAHANAMA']; ?></td>
				<td><?= $row['TBLDAFTAR_NOPOK']; ?></td>
				<td><?= $row['TBLKECAMATAN_ID']; ?></td>
				<td><?= $row['TBLKELURAHAN_ID']; ?></td>
				<td><?= $row['TBLDAFTAR_PEMILIKNAMA']; ?></td>
				<td><?= $row['TBLDAFTAR_EMAIL']; ?></td>
				<td><?= $row['STATUS_AKUN_ESPTPD'] ? "PUNYA" : "TIDAK PUNYA"; ?></td>
				<?php if ($row['STATUS_DATA']=='petugas'): ?>
					<td>PETUGAS</td>
				<?php elseif ($row['STATUS_DATA']=='kasubid'): ?>		
					<td>SUB KOORDINATOR</td>
				<?php elseif ($row['STATUS_DATA']=='kabid'): ?>		
					<td>KABID</td>
				<?php elseif ($row['STATUS_DATA']=='wp'): ?>		
					<td>SUDAH DIKIRIM KE WAJIBPAJAK</td>
				<?php endif ?>
				<td><?= $row[$data['namatbl'].'_'.'REKJENIS']; ?></td>
				<td><?= $row['TBLPENDATAAN_THNPAJAK']; ?></td>
				<td><?= $row['TBLPENDATAAN_BLNPAJAK']; ?></td>
				<td><?= $row['TBLPENDATAAN_TGLPAJAK']; ?></td>
				
				<?php /* ?>
				<td align="right"><?= LokalIndonesia::ribuan($row[$data['namatbl'].'_'.'OMSETPAJAK']); ?></td>
				<td><?= $row[$data['namatbl'].'_'.'THNSPTPD']; ?></td>
				<td><?= $row[$data['namatbl'].'_'.'BLNSPTPD']; ?></td>
				<td><?= $row[$data['namatbl'].'_'.'TGLSPTPD']; ?></td>
				<td><?= $row[$data['namatbl'].'_'.'THNENTRI']; ?></td>
				<td><?= $row[$data['namatbl'].'_'.'BLNENTRI']; ?></td>
				<td><?= $row[$data['namatbl'].'_'.'TGLENTRI']; ?></td>
				<?php */ ?>
				
			</tr>
			<?php if ($row['TBLTEGURAN_ID']): ?>
			<?php array_push($list_id, trim($row['TBLTEGURAN_ID'])) ?>
			<?php endif ?>
		<?php endforeach ?>
	</tbody>
</table>
<input type="hidden" name="list_id" id="list_id" value="<?=  base64_encode(CJSON::encode($list_id)) ?>" />
<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});

	function verifikasi_teguran(tgr_id) {
		$.SmartMessageBox({
			title : "Konfirmasi", // judul Smart Alert
			content : "Apakah anda ingin memverifikasi data teguran ini?", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'pendataan/verifikasi_teguran/verifikasi_teguran',
					type: 'POST',
					dataType: 'json',
					data: {teguran_id: tgr_id},
				})
				.done(function(respon) {
					if (respon.status == 'success') {
						notifikasi('Berhasil', 'Data Teguran berhasil diverifikasi', 'success', 1, 0)
						cari()
					} else {
						notifikasi('Maaf', 'Data Teguran gagal diverifikasi', 'x', 1, 0)
					}
					console.log("success");
				})
				.fail(function(jqXHR, exception) {
					handelErr(jqXHR, exception)
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
			}
		});
	}

	function verifikasi_teguran_semua() {
		$.SmartMessageBox({
			title : "Konfirmasi", // judul Smart Alert
			content : "Apakah anda ingin memverifikasi seluruh data teguran ini?", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				var list_id = $("#list_id").val()
				$.ajax({
					url: 'pendataan/verifikasi_teguran/verifikasi_teguran_semua',
					type: 'POST',
					dataType: 'json',
					data: {list_id: (list_id)},
				})
				.done(function(respon) {
					if (respon.status == 'done') {
						notifikasi('Berhasil', 'Semua Teguran selesai diverifikasi', 'success', 1, 0)
						cari()
					} else {
						notifikasi('Maaf', 'Data Teguran gagal diverifikasi', 'x', 1, 0)
					}
					console.log("success");
				})
				.fail(function(jqXHR, exception) {
					handelErr(jqXHR, exception)
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
			}
		});
	}

	function kembalikan(tgr_id) {
		$.SmartMessageBox({
			title : "Konfirmasi", // judul Smart Alert
			content : "Apakah anda ingin mengembalikan data teguran ini?", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'pendataan/verifikasi_teguran/kembalikan',
					type: 'POST',
					dataType: 'json',
					data: {teguran_id: tgr_id},
				})
				.done(function(respon) {
					if (respon.status == 'success') {
						notifikasi('Berhasil', 'Data Teguran berhasil dikembalikan', 'success', 1, 0)
						cari()
					} else {
						notifikasi('Maaf', 'Data Teguran gagal dikembalikan', 'x', 1, 0)
					}
					console.log("success");
				})
				.fail(function(jqXHR, exception) {
					handelErr(jqXHR, exception)
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
			}
		});
	}
</script>

<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
	<thead>
		<!-- <header>
			<span class="widget-icon"> <i class="fa fa-table"></i> </span>
			<h2>&nbsp;Data</h2>
		</header> -->
		<tr>
			
			<th data-hide="phone"><div class="center"> NO</div></th>
			<th data-hide="phone"><div class="center"> BNAMA</div></th>
			<th data-class="expand"><div class="center"> NOPOK</div></th>
<!-- 			<th data-hide="phone,tablet,desktop"><div class="center"> KEC</div></th>
			<th data-hide="phone,tablet,desktop"><div class="center"> KEL</div></th> -->
			<th data-hide="phone"><div class="center"> PNAMA</div></th>
			<th data-hide="phone"><div class="center"> EMAIL</div></th>
<!-- 			<th data-hide="phone"><div class="center"> Status Akun SPTPD</div></th> -->
			<th data-hide="phone"><div class="center"> Status Verifikasi</div></th>
<!-- 			<th data-hide="phone,tablet,desktop"><div class="center"> JEN</div></th>
			<th data-hide="phone"><div class="center"> THP</div></th>
			<th data-hide="phone"><div class="center"> BLP</div></th>
			<th data-hide="phone,tablet,desktop"><div class="center"> HRP</div></th> -->
			<th data-hide="phone"><div class="center"> TGL TERIMA WP</div></th>
			<th data-hide="phone"><div class="center"> KETERANGAN</div></th>
			<th data-hide="phone"><div class="center"> STATUS KIRIM</div></th>
			<th data-hide="phone"><div class="center"> Aksi</div></th>
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
			<?php $no = 1; ($data['table']); foreach ($data['table'] as $row): ?>
			<tr>

				<td><?php echo $no++?></td>
				<td><?= $row['TBLDAFTAR_BADANUSAHANAMA']; ?></td>
				<td><?= $row['TBLDAFTAR_NOPOK']; ?></td>
				<td><?= $row['TBLDAFTAR_PEMILIKNAMA']; ?></td>
				<td><?= $row['TBLDAFTAR_EMAIL']; ?></td>

				<?php if ($row['STATUS_DATA']=='petugas'): ?>
					<td>PETUGAS</td>
				<?php elseif ($row['STATUS_DATA']=='kasubid'): ?>		
					<td>SUB KOORDINATOR</td>
				<?php elseif ($row['STATUS_DATA']=='kabid'): ?>		
					<td>KABID</td>
				<?php elseif ($row['STATUS_DATA']=='wp'): ?>		
					<td>SUDAH DIKIRIM KE WAJIBPAJAK</td>
				<?php endif ?>

				<td><?= $row['TGLTERIMA']; ?></td>
				<td><?= $row['KETERANGAN']; ?></td>
				<td><?= $row['STATUS_KIRIM']; ?></td>
				<td>
					<?php if (Yii::app()->user->role_id == 3): ?>
					<button class="btn btn-sm btn-danger" onclick="batal_tegur('<?= base64_encode($row['TBLTEGURAN_ID']) ?>')">
						<i class="fa fa-times"></i> Batalkan Teguran
					</button>
					<?php endif ?>
				</td>
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
		<?php endforeach ?>
	</tbody>
</table>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});

	function batal_tegur(tgr_id) {
		$.SmartMessageBox({
			title : "Konfirmasi", // judul Smart Alert
			content : "Apakah anda ingin membatalkan teguran data ini?", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'pendataan/cetak_kartudata_teguran/batal_tegur',
					type: 'POST',
					dataType: 'json',
					data: {teguran_id: tgr_id},
				})
				.done(function(respon) {
					if (respon.status == 'success') {
						notifikasi('Berhasil', 'Data Teguran berhasil dibatalkan', 'success', 1, 0)
						cari()
					} else {
						notifikasi('Maaf', 'Data Teguran gagal dibatalkan', 'x', 1, 0)
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
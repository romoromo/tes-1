<p class="alert alert-warning">
	<?php if (!$data['isBANK'] && !$data['isSETBPD'] && empty($data['pendataan'][$data['tabel'].'_NOMORSKPD'])): ?>
	<button type="button" class="btn btn-default" onclick="cetak()">
		<i class="fa fa-pencil"></i> Ubah Data
	</button>
	<?php endif ?>
	<?php if (!$data['isBANK'] && !$data['isSETBPD'] && empty($data['pendataan'][$data['tabel'].'_NOMORSKPD'])): ?>
	<button type="button" class="btn btn-default">
		<i class="fa fa-times"></i> Hapus Pendataan
	</button>
	<?php endif ?>
	<?php if (!$data['isBANK'] && !$data['isSETBPD'] && !empty($data['pendataan'][$data['tabel'].'_NOMORSKPD'])): ?>
	<button type="button" class="btn btn-default">
		<i class="fa fa-times"></i> Hapus Ketetapan
	</button>
	<?php endif ?>
	<?php if (!$data['isBANK'] && $data['isSETBPD']): ?>
	<button id="btnPutusSetBPD" type="button" class="btn btn-default">
		<i class="fa fa-times"></i> Hapus SSPD
	</button>
	<?php endif ?>
	<?php if ($data['isBANK']): ?>
	<button id="btnPutusBank" type="button" class="btn btn-default">
		<i class="fa fa-times"></i> Hapus Setor Bank
	</button>
	<?php endif ?>
</p>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$("#btnPutusBank").click(function(event) {
			$.SmartMessageBox({
				title : "Apakah anda yakin akan menghapus data seto BANK ini?",
				content : "Tindakan ini tidak dapat dibatalkan, pastikan Anda benar memilih data.",
				buttons : '[Tidak][Ya]'
			}, function(ButtonPressed) {
				if (ButtonPressed === "Ya") {
					$.ajax({
						url: 'app/super_datamanager/putusbank',
						type: 'POST',
						dataType: 'json',
						data: {code: '<?= $_REQUEST['code'] ?>'},
					})
					.done(function(respon) {
						if (respon.status=='success') {
							notifikasi('Berhasil', respon.message, 'success', 1, 0);
						} else {
							notifikasi('Maaf :(', respon.message, 'x', 1, 0);
						}
						putuskan(window.elm_putus);
					})
					.fail(function(jqXHR, exception) {
						handelErr(jqXHR, exception);
					})
					.always(function() {
						console.log("complete");
					});
				}
			});
		});

		$("#btnPutusSetBPD").click(function(event) {
			$.SmartMessageBox({
				title : "Apakah anda yakin akan menghapus data setoran (SSPD) ini?",
				content : "Tindakan ini tidak dapat dibatalkan, pastikan Anda benar memilih data.",
				buttons : '[Tidak][Ya]'
			}, function(ButtonPressed) {
				if (ButtonPressed === "Ya") {
					$.ajax({
						url: 'app/super_datamanager/putussetbpd',
						type: 'POST',
						dataType: 'json',
						data: {code: '<?= $_REQUEST['code'] ?>'},
					})
					.done(function(respon) {
						if (respon.status=='success') {
							notifikasi('Berhasil', respon.message, 'success', 1, 0);
						} else {
							notifikasi('Maaf :(', respon.message, 'x', 1, 0);
						}
						putuskan(window.elm_putus);
					})
					.fail(function(jqXHR, exception) {
						handelErr(jqXHR, exception);
					})
					.always(function() {
						console.log("complete");
					});
				}
			});
		});
	});
</script>
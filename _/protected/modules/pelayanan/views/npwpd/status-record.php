<script type="text/javascript">
var tnpwpdx = [];
</script>
<div id="list-daftar-status">
<?php foreach ($data['npwpd'] as $row): ?>
<script type="text/javascript">
tnpwpdx.push( <?= json_encode($row) ?>);
</script>
<?php
	$koderegpajak = TRekening::model()->getKodeREGPajak($row['TREKENING_KODE']);
	// $noregnpwpd = $row['TNPWPD_NOREG'];
	$noregnpwpd = $row['TNPWPD_ID'];
	// $noregnpwpd = sprintf("%07d", $noregnpwpd);
	$kodekec = ($kec = $row['TBLKECAMATAN_KD']) ? $kec : '00';
	$kodekel = ($kel = $row['TBLKELURAHAN_KD']) ? $kel : '00';
	// $bidangusaha = !empty($row['TBIDANGUSAHA_ID']) && $row['TBIDANGUSAHA_ID']!=11 ? $row['TBIDANGUSAHA_NAMA'] : $row['TBIDANGUSAHA_LAIN'];
	$kewajiban_pajak = ( $rek = TRekening::model()->find('TREKENING_KODE=:kode', array(':kode'=>$row['TREKENING_KODE'])) ) ? $rek['TREKENING_NAMA'] : 'N/A';
?>

	<div style="border-right: 1px solid #fff;">
		<div class="row">
			<div class="col col-3">
				<label for="label" class="input">NPWPD</label>
			</div>

			<div class="col col-1">
				<label for="label" class="input"></label>
				<label class="input state-success">
					<input readonly="" type="text" name="" value="<?= $koderegpajak ?>" placeholder="03" class="disabled text-align-right" id="regpajak_<?= $row['TNPWPD_ID'] ?>">
				</label>
			</div>

			<div class="col col-2">
				<label for="label" class="input"></label>
				<label class="input state-success">
					<input type="text" name="" value="<?= $noregnpwpd ?>" maxlength="7" placeholder="9999999" class="valid text-align-right noregkeyup" id="noreg_<?= $row['TNPWPD_ID'] ?>">
				</label>
			</div>

			<div class="col col-1">
				<label for="label" class="input"></label>
				<label class="input state-success">
					<input readonly="" type="text" name="" value="<?= $kodekec ?>" placeholder="99" class="disabled text-align-right" id="keckode_<?= $row['TNPWPD_ID'] ?>">
				</label>
			</div>

			<div class="col col-1">
				<label for="label" class="input"></label>
				<label class="input state-success">
					<input readonly="" type="text" name="" value="<?= $kodekel ?>" placeholder="99" class="disabled text-align-right" id="kelkode_<?= $row['TNPWPD_ID'] ?>">
				</label>
			</div>

			<div class="col col-1">
				<label for="label" class="input"></label>
				<label class="input font-lg" id="npwpd_<?= $row['TNPWPD_ID'] ?>"></label>
			</div>
		</div>

		<br>

		<div class="row">
			<div class="col col-3">
				<!-- <label for="label" class="input">Bidang Usaha</label> -->
				<label for="label" class="input">Kewajiban Pajak</label>
			</div>

			<div class="col col-3">
				<label for="label" class="input"></label>
				<label class="input state-success">
					<input readonly="" type="text" name="" value="<?= $kewajiban_pajak ?>" placeholder="" class="disabled">
				</label>
			</div>

			<button type="button" data-nid="<?= base64_encode(base64_encode( $row['TNPWPD_ID'] )) ?>" class="btn btn-success btn-xs btnSimpanCetakNPWPD hidden">
				Simpan Dan Cetak Tanda Terima
			</button>

		</div>

		<br>

		<div class="row">
			<div class="col col-3">
				<label for="label" class="input">Status Pengukuhan</label>
			</div>

			<div class="col col-3">
				<label for="label" class="input"></label>
				<label class="input state-success">
					<input type="text" disabled="" name="" value="BELUM DIKUKUHKAN" placeholder="Status Pengukuhan" class="disabled">
				</label>
			</div>
		</div>

		<header>
		</header>

		<br>

	</div>

<?php endforeach ?>
</div>

<script type="text/javascript">
	$(".noregkeyup").keyup(function(event) {

		var noreg = $(event.target).val();
		var id = $(event.target).attr('id').split('_')[1];

		var str = "" + $("#noreg_" + id).val();
		var pad = "0000000";
		var registerno = pad.substring(0, pad.length - str.length) + str;

		var npwpd_nya = $("#regpajak_" + id).val() + '.' + registerno + '.' + $("#keckode_" + id).val() + '.' + $("#kelkode_" + id).val();
		$('#npwpd_' + id).html( '[' + npwpd_nya + ']');
	});

	jQuery(document).ready(function($) {
		$(".noregkeyup").trigger('keyup');
	});

	$(".btnSimpanCetakNPWPD").click(function(event) {
		var nid = $(event.target).data('nid');
		var noreg = btoa(btoa($("#noreg_" + atob(atob(atob(btoa(nid)))) ).val()));
		SimpanCetakNPWPD( $(event.target), nid, noreg );
	});

	function SimpanCetakNPWPD(elm, nid, noreg) {
		$(elm).attr('disabled', !0);
		$.ajax({
			url: 'pelayanan/npwpd/doBuildNPWPD',
			type: 'POST',
			dataType: 'json',
			data: {nid: nid, noreg: noreg},
		})
		.done(function(respon) {
			if (respon.status == 'success') {
				detailIzinPemohon(window.idSubyek);
				notifikasi('Berhasil', 'NPWPD berhasil disimpan, mohon tunggu proses cetak formulir', 'success', 1, 0);
				$(elm).hide();
				window.open('<?= Yii::app()->getBaseUrl(1); ?>/pelayanan/verifikasi/cetakformnpwpd/id/' + atob(nid));
			} else if (respon.status == 'already_use') {
				notifikasi('Maaf', respon.msg, 'fail', 1, 0);
			} else {
				notifikasi('Maaf', 'Ada kesalahan proses, mohon ulangi klik Simpan & Cetak', 'fail', 1, 0);
			}
		})
		.fail(function( jqXHR, exception ) {
			handelErr(jqXHR, exception);
		})
		.always(function() {
			console.log("complete");
			$(elm).attr('disabled', !1);
		});
		
	}
</script>
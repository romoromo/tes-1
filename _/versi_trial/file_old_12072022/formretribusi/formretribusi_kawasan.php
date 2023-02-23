<form id="form-pendataan" class="smart-form ng-pristine ng-valid">
	<header> Retribusi Sewa Kawasan Alun - Alun</header>
	<fieldset id="sss">
		<div>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label">Tahun Pajak</label>
					<label class="col control-label">:</label>
					<section class="col col-3">
						<label class="select">
							<select class="select2" name="param[tbltransaksiretribusi_tahunpajak]" id="tbltransaksiretribusi_tahunpajak">
								<option selected="" value="">=== Pilih Tahun Pajak ====</option>
								<?php error_reporting(-1); $data['listtahun'] = Tahun::model()->findAll(); ?>
								<?php foreach ($data['listtahun'] as $tahun): ?>
									<option <?= $tahun['reftahun_nama']==date('Y') ? 'selected' : '' ?> value="<?= $tahun['reftahun_nama'] ?>"><?= $tahun['reftahun_nama'] ?></option>
								<?php endforeach ?>
							</select><i></i>
						</label>
					</section>
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label">Jenis Kawasan</label>
					<label class="col control-label">:</label>
					<section class="col col-3">
						<label class="select">
							<select name="param[refretjeniskawasan_id]" id="refretjeniskawasan_id" onchange="setharga(), hitungTotal()">
								<option selected="" value="">--- Pilih Jenis Kawasan ---</option>
								<?php 
								$otherquery = array();
								$data['listkawasan'] = DBFetch::query( array('from'=>'refretjeniskawasan','otherquery'=>$otherquery,'mode'=>'LIST') ); ?>
								<?php foreach ($data['listkawasan'] as $kawasan): ?>
									<option harga="<?= $kawasan['refretjeniskawasan_harga'] ?>" value="<?= $kawasan['refretjeniskawasan_id'] ?>"><?= $kawasan['refretjeniskawasan_nama'] ?></option>
								<?php endforeach ?>
							</select><i></i>
						</label>
						<input type="hidden" id="tblretribusikawasan_jenis" name="param[tblretribusikawasan_jenis]" value="<?= $kawasan['refretjeniskawasan_nama'] ?>">
					</section>
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label">Jumlah Hari</label>
					<label class="col control-label">:</label>
					<div class="col-md-2">
							<input type="text" class="form-control format-desimal" onkeypress="hitung()" id="tblretribusikawasan_hari" name="param[tblretribusikawasan_hari]">
					</div>
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label">Biaya</label>
					<label class="col control-label">:</label>
					<label class="control-label format-desimal" id="tblretribusikawasan_biaya">Rp  . . . . . </label>
					<input type="hidden" class="tblretribusikawasan_biaya" name="param[tblretribusikawasan_biaya]">
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col md-2 control-label">Harga Kawasan</label>
					<label class="col control-label">X</label>
					<label class="control-label" id="tblretribusikawasan_hari">Jumlah Hari</label>
					<!-- <input type="hidden" id="tblretribusikawasan_hari" name="param[tblretribusikawasan_hari]"> -->
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col col-1 control-label">=</label>
					<label class="col control-label" id=label_total>Rp  . . . . .</label>
					<input type="hidden" id="tblretribusikawasan_total" name="param[tblretribusikawasan_total]">
					<input type="hidden" id="tbltransaksiretribusi_pajak" name="param[tbltransaksiretribusi_pajak]" value="0">
					<input type="hidden" name="param[tblobyek_id]" id="xxobyidxx" value="<?= $data['obyek_id'] ?>" />
					<input type="hidden" name="param[tblretribusitanah_tahunpajak]" value="<?= date('Y') ?>" />
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			</div>
		</fieldset>
		<input type="hidden" name="" />
		<footer>
			<button class="btn btn-primary" type="submit">
				Simpan
			</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">
				Batal
			</button>
		</footer>
	</form>
	<script type="text/javascript">

		window.cmdp = 'tambah';
		window.idtransretr = 0;

		loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
		function runFormValidation() {
		jQuery.validator.addMethod("number_ID", function(value, element) {
			// allow any non-whitespace characters as the host part
			return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:[\s\.,]\d{3})+)(?:[\.,]\d+)?$/.test(value);
		}, 'Mohon isikan dalam angka, pemisah desimal adalah koma (,)');

		var $FormDaftar = $("#form-pendataan").validate({
			// Rules for form validation
			rules : {
				"param[tblretribusikawasan_hari]" : {
					required : true
				}
			},

			// Messages for form validation
			messages : {
				"param[tblretribusikawasan_hari]" : {
					required : 'Mohon isi hari'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			},
			submitHandler : function(form) {
				// saat validasi benar semua, jalankan simpan()
				return simpanRetribusi();
			}
		});
	}

		function hitung() {
			var harga = parseInt(toAngka($("#tblretribusikawasan_biaya").html()));
			var hari = $("#tblretribusikawasan_hari").val();

			var hasil = ( harga * hari );

			console.log(hari);
		}

		function setharga() {
			$("#tblretribusikawasan_biaya").html(toRp($('#refretjeniskawasan_id option:selected').attr('harga')));
			$(".tblretribusikawasan_biaya").val($('#refretjeniskawasan_id option:selected').attr('harga'));
		}

		function hitungTotal() {
			var bulan = $("#tblretribusikawasan_hari").val();
			var harga = parseInt(toAngka($("#tblretribusikawasan_biaya").html()));

			total = (bulan * harga)
			jmlh_bulan = bulan
			$('#label_bulan').html(jmlh_bulan)
			$('#label_total').html(toRp(total));
			$('#tblretribusikawasan_total').val(total);
			$('#tbltransaksiretribusi_pajak').val(total);
	}
		$('#tblretribusikawasan_hari, #tblretribusikawasan_total').keyup(function(event) {
			hitungTotal()
		});

		function simpanRetribusi() {
			var addparam = {id: window.idtransretr, cmd: window.cmdp};
			$.ajax({
				url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_retribusi/simpan',
				type: 'POST',
				dataType: 'json',
				data: $("#form-pendataan").serialize()+'&'+jQuery.param(addparam),
				success: function(respon) {
					if (respon.status=='success') {
						$("#modalRetribusi").modal('hide');
						notifikasi('Berhasil','Pendataan berhasil dientrikan ke sistem','success',1,0);
						simpanDetailKawasan(respon.pk)
					} else {
					}
				}
			});
			return false
	}

		function simpanDetailKawasan(id) {
			var param = {
					tbltransaksiretribusi_id: id
				};
			url_param = jQuery.param(param);
			$.ajax({
				url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_retribusi/simpanDetailKawasan',
				type: 'POST',
				dataType: 'json',
				data: $("#form-pendataan").serialize()+'&'+url_param,
				success: function(respon) {
					detailIzinPemohon(window.idpemohon);
				}
			});
			return false
	}

	loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/moment-js/moment-with-locales.min.js", setMoment);
	function setMoment() {
		moment.locale('id');
	}

	</script>
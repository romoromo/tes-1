<form id="form-pendataan" class="smart-form ng-pristine ng-valid">
	<header>Retribusi Kantin</header>
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
							</select>
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
					<label class="col-md-2 control-label">Jumlah Bulan Penggunaan</label>
					<label class="col control-label">:</label>
					<section class="col col-3">
						<label class="input">
							<input type="text" class="form-control" name="param[tblretribusikantin_bulan]" id="tblretribusikantin_bulan">
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
					<label class="col-md-2 control-label">Biaya Penggunaan</label>
					<label class="col control-label">:</label>
					<label class="control-label">Rp. 100.000</label>
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label">Retribusi dibayar</label>
					<label class="col control-label">=</label>
					<label class="control-label">Bulan</label>
					<label class="col control-label">X</label>
					<label class="control-label">Biaya</label>
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label"></label>
					<label class="col control-label">=</label>
					<label class="control-label" id="label_bulan">. . . .</label>
					<label class="control-label">X</label>
					<label class="control-label">Rp. 100.000</label>
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label"></label>
					<label class="col control-label">=</label>
					<label class="control-label" id="label_total">Rp. . .</label>
					<input type="hidden" id="tblretribusikantin_total" name="param[tblretribusikantin_total]">
					<input type="hidden" id="tblretribusikantin_biayabulanan" name="param[tblretribusikantin_biayabulanan]" value="100000">
					<input type="hidden" id="tbltransaksiretribusi_pajak" name="param[tbltransaksiretribusi_pajak]" value="0">
					<input type="hidden" name="param[tblobyek_id]" id="xxobyidxx" value="<?= $data['obyek_id'] ?>" />
					<!-- <input type="hidden" name="param[tblretribusitanah_tahunpajak]" value="<?= date('Y') ?>" /> -->
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

	<div class="row">
		<section class="col col-md-12">
			<br />
			<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
				<thead>
					<tr>
						<th width="15"> No</th>
						<th data-hide="phone"><div class="center"> Tahun Pajak</div></th>
						<th data-hide="phone"><div class="center"> Tanggal Entri Sptpd</div></th>
						<th data-class="expand"><div class="center"> Nominal Retribusi</div></th>
						<th data-hide="phone, tablet"><div class="center"> Action</div></th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($data['list'] as $key): ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $key['tbltransaksiretribusi_tahunpajak'] ?></td>
						<td><?php echo LokalIndonesia::TanggalUmum($key['tbltransaksiretribusi_tglentrisptpd']) ?></td>
						<td><?php echo LokalIndonesia::rupiah($key['tbltransaksiretribusi_pajak']) ?></td>
						<td align="center">
							<a class="btn btn-sm btn-success" onclick="edit('<?php echo $key['tbltransaksiretribusi_id'] ?>')"><i class="fa fa fa-edit"></i>&nbsp;Edit Data</a> 
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</section>
	</div>

	<script type="text/javascript">
		window.cmdp = 'tambah';
		window.idtransretr = 0;

		jQuery(document).ready(function($) {
			reloadDT('dt_basic');
		});

		loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
		function runFormValidation() {
		jQuery.validator.addMethod("number_ID", function(value, element) {
			// allow any non-whitespace characters as the host part
			return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:[\s\.,]\d{3})+)(?:[\.,]\d+)?$/.test(value);
		}, 'Mohon isikan dalam angka, pemisah desimal adalah koma (,)');

		var $FormDaftar = $("#form-pendataan").validate({
			// Rules for form validation
			rules : {
				"param[tblretribusikantin_bulan]" : {
					required : true
				}
			},

			// Messages for form validation
			messages : {
				"param[tblretribusikantin_bulan]" : {
					required : 'Mohon isi bulan'
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

		function hitungBulanan() {
			var bulan = $("#tblretribusikantin_bulan").val();

			total = (bulan * 100000)
			jmlh_bulan = bulan
			$('#label_bulan').html(jmlh_bulan)
			$('#label_total').html(toRp(total));
			$('#tblretribusikantin_total').val(total);
			$('#tbltransaksiretribusi_pajak').val(total);
	}
		$('#tblretribusikantin_bulan, #tblretribusikantin_total').keyup(function(event) {
			hitungBulanan()
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
					simpanDetailKantin(respon.pk)
				} else {
				}
			}
		});
		return false
	}

	function simpanDetailKantin(id) {
		var param = {
				tbltransaksiretribusi_id: id
			};
		url_param = jQuery.param(param);
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_retribusi/simpanDetailKantin',
			type: 'POST',
			dataType: 'json',
			data: $("#form-pendataan").serialize()+'&'+url_param,
			success: function(respon) {
				detailIzinPemohon(window.idpemohon);
			}
		});
		return false
	}

	function edit(id) {
		window.id = id;
		window.cmd = 'edit';
		$.ajax({
			url: '<?php echo Yii::app()->getBaseUrl(1); ?>/pendaftaran/data_retribusi/getDataKantin',
			type: 'POST',
			dataType: 'json',
			data: {
				id: id
			},
			success: function(respon) {
				$('#tbltransaksiretribusi_tahunpajak').select2('val',respon.tbltransaksiretribusi_tahunpajak);
				$('#tblretribusikantin_bulan').val(respon.tblretribusikantin_bulan);
			}
		});
		return false
	}

	</script>
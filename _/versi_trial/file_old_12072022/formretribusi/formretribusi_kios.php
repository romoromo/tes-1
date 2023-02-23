<form id="form-pendataan" class="smart-form ng-pristine ng-valid">
	<header>Retribusi Kios</header>
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

			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label">Masa Retribusi Awal</label>
					<label class="col control-label">:</label>
					<section class="col col-3">
						<label class="input">
						<input class="datepicker" data-dateformat="dd-mm-yy" type="text" name="param[tbltransaksiretribusi_masaawal]" id="rkiostbltransaksiretribusi_masaawal" placeholder="Masa Awal" />
						<i class="icon-append fa fa-calendar "></i>
					</label>
					</section>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Masa Retribusi Akhir</label>
					<label class="col control-label">:</label>
					<section class="col col-3">
						<label class="input">
						<input class="datepicker" data-dateformat="dd-mm-yy" type="text" name="param[tbltransaksiretribusi_masaakhir]" id="rkiostbltransaksiretribusi_masaakhir" placeholder="Masa Akhir" />
						<i class="icon-append fa fa-calendar "></i>
					</label>
					</section>
				</div>
				<label class="col control-label"></label>
			</div>

			<br>

			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label">Kelas Jalan</label>
					<label class="col control-label">:</label>
					<section class="col col-6">
						<label class="select">
							<select class="select2" name="param[refretkioskelasjalan_id]" id="refretkioskelasjalan_id" onchange="settarif(), hitungTotal()">
								<option selected="" value="">=========== Pilih Kelas Jalan ===========</option>
								<?php 
								$otherquery = array();
								$data['listkelasjalan'] = DBFetch::query( array('from'=>'refretkioskelasjalan','otherquery'=>$otherquery,'mode'=>'LIST') ); ?>
								<?php foreach ($data['listkelasjalan'] as $kelasjalan): ?>
									<option tarif="<?= $kelasjalan['refretkioskelasjalan_tarif'] ?>" value="<?= $kelasjalan['refretkioskelasjalan_id'] ?>"><?= $kelasjalan['refretkioskelasjalan_namajalan'] ?> ( <?= $kelasjalan['refretkioskelasjalan_kelasjalan'] ?> )</option>
								<?php endforeach ?>
							</select>
						</label>
					</section>
				</div>
				<label class="col control-label"></label>
			</div>

			<br>

			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label">Luas</label>
					<label class="col control-label">:</label>
					<section class="col col-2">
						<label class="input">
							<input type="text" class="form-control format-desimal" onkeypress="hitung()" id="tblretribusikioskelasjalan_luas" name="param[tblretribusikioskelasjalan_luas]">
						</label>
					</section>
				</div>
				<label class="col control-label">m2</label>
			</div>
			<br>
			
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-1 control-label">Luas</label>
					<label class="col control-label">x</label>
					<label class="col-md-1 control-label">Tarif Pajak</label>
				</div>
			</div>

			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col 1 control-label text-align-right" id="label_luas">. . . . .</label>
					<label class="col control-label">m2</label>
					<label class="col control-label">X</label>
					<label class="col col-2 control-label" id="tblretribusikioskelasjalan_tarif">. . . . .</label>
					<input type="hidden" id="tblretribusikioskelasjalan_tarif" name="param[tblretribusikioskelasjalan_tarif]">
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col control-label">=</label>
					<label class="control-label" id="label_total">Rp  . . . . . </label>
					<input type="hidden" id="tblretribusikioskelasjalan_total" name="param[tblretribusikioskelasjalan_total]">
					<input type="hidden" id="tbltransaksiretribusi_pajak" name="param[tbltransaksiretribusi_pajak]" value="0">
					<input type="hidden" name="param[tblobyek_id]" id="xxobyidxx" value="<?= $data['obyek_id'] ?>" />
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
		pageSetUp();

		loadScript("<?= Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/moment-js/moment-with-locales.min.js", setMoment);
		function setMoment() {
			moment.locale('id');
		}

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
				"param[tblretribusikioskelasjalan_luas]" : {
					required : true
				}
				,"param[tbltransaksiretribusi_tahunpajak]" : {
					required : true
				}
			},

			// Messages for form validation
			messages : {
				"param[tblretribusikioskelasjalan_luas]" : {
					required : 'Mohon isi luas'
				}
				,"param[tbltransaksiretribusi_tahunpajak]" : {
					required : 'Mohon pilih tahun'
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
			var tarif = parseInt(toAngka($("#tblretribusikioskelasjalan_tarif").html()));
			var luas = $("#tblretribusikioskelasjalan_luas").val();

			var hasil = ( tarif * luas );

			console.log(luas);
		}

		function settarif() {
			$("#tblretribusikioskelasjalan_tarif").html(toRp($('#refretkioskelasjalan_id option:selected').attr('tarif')));
			$("#refretkioskelasjalan_namajalan").val($('#refretkioskelasjalan_id option:selected').text());
		}

		function hitungTotal() {
			var luas = $("#tblretribusikioskelasjalan_luas").val();
			var tarif = parseInt(toAngka($("#tblretribusikioskelasjalan_tarif").html()));

			total = (luas * tarif)
			jmlh_luas = luas
			$('#label_luas').html(jmlh_luas)
			$('#label_total').html(toRp(total));
			$('#tblretribusikioskelasjalan_total').val(total);
			$('#tbltransaksiretribusi_pajak').val(total);
		}

		$('#tblretribusikioskelasjalan_luas, #tblretribusikioskelasjalan_total').keyup(function(event) {
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
					simpanDetailKios(respon.pk)
				} else {
				}
			}
		});
		return false
	}

	function simpanDetailKios(id) {
		var param = {
				tbltransaksiretribusi_id: id, cmd: window.cmdp
			};
		url_param = jQuery.param(param);
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_retribusi/simpanDetailKios',
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
		// window.id = id;
		window.cmdp = 'edit';
		window.idtransretr = window.id;
		$.ajax({
			url: '<?php echo Yii::app()->getBaseUrl(1); ?>/pendaftaran/data_retribusi/getDataKios',
			type: 'POST',
			dataType: 'json',
			data: {
				id: id
			},
			success: function(respon) {
				$('#tbltransaksiretribusi_tahunpajak').select2('val',respon.tbltransaksiretribusi_tahunpajak);
				$('#refretkioskelasjalan_id').select2('val',respon.refretkioskelasjalan_id);
				$('#rkiostbltransaksiretribusi_masaawal').val(moment(respon.tbltransaksiretribusi_masaawal).format("L"));
				$('#rkiostbltransaksiretribusi_masaakhir').val(moment(respon.tbltransaksiretribusi_masaakhir).format("L"));
				$('#tblretribusikioskelasjalan_luas').val(respon.tblretribusikioskelasjalan_luas);
				settarif()
				setTimeout(function() {
					hitungTotal();
				}, 10);
			}
		});
		return false
	}

	</script>
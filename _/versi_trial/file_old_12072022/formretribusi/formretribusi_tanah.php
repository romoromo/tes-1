<?php Yii::import('ext.LokalIndonesia'); ?>
<?php error_reporting(-1); ?>
<?php ini_set('display_errors', 'On'); ?>
<form id="form-pendataan" class="smart-form ng-pristine ng-valid">
	<header>
	<?php if ($data['rekening_kode']=='412020101'): ?>
		Retribusi Pemakaian Usaha/Industri
	<?php endif ?>
	<?php if ($data['rekening_kode']=='412020102'): ?>
		Retribusi Pemakaian Bangunan Perumahan
	<?php endif ?>
	<?php if ($data['rekening_kode']=='412020103'): ?>
		Retribusi Pemakaian Tambak
	<?php endif ?>
	</header>
	<fieldset id="sss">
		<div>
			<div class="row">
				<div class="col col-6">
					<label for="label" class="input">Tahun Pajak</label>
					<label class="select">
						<select name="param[tbltransaksiretribusi_tahunpajak]" class="select2" id="tbltransaksiretribusi_tahunpajak">
							<option selected="" value="">=== Pilih Tahun Pajak ====</option>
							<?php $data['listtahun'] = Tahun::model()->findAll(); ?>
							<?php foreach ($data['listtahun'] as $tahun): ?>
								<option <?= $tahun['reftahun_nama']==date('Y') ? 'selected' : '' ?> value="<?= $tahun['reftahun_nama'] ?>"><?= $tahun['reftahun_nama'] ?></option>
							<?php endforeach ?>
						</select>
					</label>
				</div>
				<div class="col col-6">
					<label for="label" class="input">Tanggal Pendataan</label>
					<label class="input">
						<input value="<?= date('d-m-Y') ?>" class="datepicker" data-dateformat="dd-mm-yy" type="text" name="param[tbltransaksiretribusi_tglentrisptpd]" id="tbltransaksiretribusi_tglentrisptpd" placeholder="Tanggal Retribusi" />
						<i class="icon-append fa fa-calendar "></i>
					</label>
				</div>
			</div>

			<br>

			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label">Masa Retribusi Awal</label>
					<label class="col control-label">:</label>
					<section class="col col-3">
						<label class="input">
						<input class="datepicker" data-dateformat="dd-mm-yy" type="text" name="param[tbltransaksiretribusi_masaawal]" id="rtanahtbltransaksiretribusi_masaawal" placeholder="Masa Awal" />
						<i class="icon-append fa fa-calendar "></i>
					</label>
					</section>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Masa Retribusi Akhir</label>
					<label class="col control-label">:</label>
					<section class="col col-3">
						<label class="input">
						<input class="datepicker" data-dateformat="dd-mm-yy" type="text" name="param[tbltransaksiretribusi_masaakhir]" id="rtanahtbltransaksiretribusi_masaakhir" placeholder="Masa Akhir" />
						<i class="icon-append fa fa-calendar "></i>
					</label>
					</section>
				</div>
				<label class="col control-label"></label>
			</div>

			<br>

			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label">NJOP</label>
					<label class="col control-label">:</label>
					<section class="col col-3">
						<label class="select">
						<select name="param[refnjop_id]" class="select2" id="refnjop_id" onchange="settarif()">
							<option selected="" value="">--- Pilih Kode NJOP ---</option>
							<?php 
							$otherquery = array();
							$data['listnjop'] = DBFetch::query( array('from'=>'refnjop','otherquery'=>$otherquery,'mode'=>'LIST') ); ?>
							<?php foreach ($data['listnjop'] as $tarifnjop): ?>
								<option tarifnjop="<?= $tarifnjop['refnjop_tarif'] ?>" value="<?= $tarifnjop['refnjop_id'] ?>"><?= $tarifnjop['refnjop_kode'] ?>&nbsp;(<?= LokalIndonesia::rupiah($tarifnjop['refnjop_tarif']) ?>)</option>
							<?php endforeach ?>
						</select>
					</label>
					</section>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label"></label>
					<label class="col control-label">:</label>
					<section class="col col-3">
						<label class="input">
						
					</label>
					</section>
				</div>
				<label class="col control-label"></label>
			</div>
			<!-- <div class="col col-md-12">
				<div class="form-group">
					<label class="col col-1 control-label">NJOP</label>
					<label class="col control-label">:</label>
					<div class="col-md-2">
						<input type="text" class="form-control format-rupiah" placeholder="  Rp . . . . . "  name=param[tblretribusitanah_njop] id="tblretribusitanah_njop">
					</div>
				</div>
				<label class="col control-label"></label>
			</div> -->
			<br>
			
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label">Luas</label>
					<label class="col control-label">:</label>
					<section class="col col-2">
						<label class="input">
							<input type="text" class="form-control format-desimal" name="param[tblretribusitanah_luas]" id="tblretribusitanah_luas">
						</label>
					</section>
				</div>
				<label class="col control-label">m2</label>
			</div>

			<br>

			<br>
				<!-- <div class="form-group">
					<label class="col col-1 control-label">P</label>
					<label class="col control-label">:</label>
					<div class="col-md-2">
						<input type="text" class="form-control format-desimal" name="param[tblretribusitanah_panjang]" id="tblretribusitanah_panjang">
					</div>
				</div> -->
				<!-- <label class="col control-label"></label>
				<label class="col control-label">X</label>
				<div class="form-group">
					<label class="col control-label">L</label>
					<label class="col control-label">:</label>
					<div class="col col-2">
						<input type="text" class="form-control format-desimal" placeholder="" name="param[tblretribusitanah_lebar]" id="tblretribusitanah_lebar">
					</div>
				</div> -->
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col col-1 control-label">Tarif</label>
					<label class="col control-label">:</label>
					<div class="col-md-1">
					<?php if ($data['rekening_kode']=='412020101') {
						$tarif=0.5;
					}
						elseif ($data['rekening_kode']=='412020102') {
						$tarif=0.4;
					}
						elseif ($data['rekening_kode']=='412020103') {
						$tarif=0.55;
					}
					?>
						<input type="text" class="form-control disabled" placeholder="Tarif" value=" <?php echo $tarif ?>" name=param[tblretribusitanah_tarif] id="tblretribusitanah_tarif" readonly="">
					</div>
					<label class="col control-label">%</label>
					<label class="col control-label">X</label>
					<label class="col col-2 control-label refnjop_tarif">. . . . .</label>
					<input type="hidden" id="refnjop_tarif" name="param[refnjop_tarif]">
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col col-1 control-label">Hasil</label>
					<label class="col control-label">:</label>
					<label class="control-label" id="label_total">  Rp. . . . <label>
					<input type="hidden" id="tblretribusitanah_total" name="param[tblretribusitanah_total]">
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			</div>
		</fieldset>
		<input type="hidden" name="" />
		<input type="hidden" name="param[tblobyek_id]" id="xxobyidxx" value="<?= $data['obyek_id'] ?>" />
		<input type="hidden" id="tbltransaksiretribusi_pajak" name="param[tbltransaksiretribusi_pajak]" value="0">
		<footer>
			<button btnid="<?= $xc = md5(microtime()); ?>" class="btn btn-primary" type="submit">
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
	
	loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);

	loadScript("<?= Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/moment-js/moment-with-locales.min.js", setMoment);
		function setMoment() {
			moment.locale('id');
		}

	function runFormValidation() {
		jQuery.validator.addMethod("number_ID", function(value, element) {
			// allow any non-whitespace characters as the host part
			return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:[\s\.,]\d{3})+)(?:[\.,]\d+)?$/.test(value);
		}, 'Mohon isikan dalam angka, pemisah desimal adalah koma (,)');

		var $FormDaftar = $("#form-pendataan").validate({
			// Rules for form validation
			rules : {
				"param[tbltransaksiretribusi_tahunpajak]" : {
					required : true
				}
				,"param[tbltransaksiretribusi_tglentrisptpd]" : {
					required : true
				}
				,"param[tblretribusitanah_panjang]" : {
					required : false,
				}
				,"param[tblretribusitanah_lebar]" : {
					required : false,
				}
				,"param[tblretribusitanah_njop]" : {
					required : true
				}
				,"param[tblretribusitanah_luas]" : {
					required : true
				}
			},

			// Messages for form validation
			messages : {
				"param[tbltransaksiretribusi_tahunpajak]" : {
					required : 'Mohon pilih tahun pajak'
				}
				,"param[tbltransaksiretribusi_tglentrisptpd]" : {
					required : 'Mohon entrikan tanggal pendataan',
				}
				,"param[tblretribusitanah_panjang]" : {
					required : 'Mohon entrikan panjang',
				}
				,"param[tblretribusitanah_lebar]" : {
					required : 'Mohon entrikan lebar',
				}
				,"param[tblretribusitanah_njop]" : {
					required : 'Mohon entrikan njop',
				}
				,"param[tblretribusitanah_luas]" : {
					required : 'Mohon entrikan luas',
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

		jQuery(document).ready(function($) {
		setPriceFormat();
		pageSetUp();
		window.cmdp = 'tambah';
		window.idtranskttap = 0;
		$('#tbltransaksiketetapan_carapenetapan').select2("readonly", true);
	});
		function hitungTanah() {
			$("#refnjop_tarif").val($("#refnjop_id option:selected").attr('refnjoptarif'));
			var luas = toAngka( $("#tblretribusitanah_luas").val());
			// var p = toAngka( $("#tblretribusitanah_panjang").val());
			// var l = toAngka( $("#tblretribusitanah_lebar").val());
			// var njop = toAngka ( $("#tblretribusitanah_njop").val());
			var njop = $("#refnjop_id option:selected").attr('tarifnjop')
			// var njop = $("#refreklamejalan_retribusitarif").val();

			total = luas * njop * (Number($("#tblretribusitanah_tarif").val()) / 100);

			totalceil = ceiling(total,100);

			$('#label_total').html(toRp(totalceil));
			$('#tblretribusitanah_total').val(totalceil);
			$('#tbltransaksiretribusi_pajak').val(toRp(totalceil));
	}
		// $('#tblretribusitanah_panjang, #tblretribusitanah_lebar, #tblretribusitanah_njop').keyup(function(event) {
		// 	hitungTanah()
		// });
		$('#tblretribusitanah_luas').keyup(function(event) {
			hitungTanah()
		});
		$('#refnjop_id').change(function(event) {
			hitungTanah()
		});

	function settarif() {
			$(".refnjop_tarif").html(toRp($('#refnjop_id option:selected').attr('tarifnjop')));
			$("#refnjop_tarif").val(toRp($('#refnjop_id option:selected').attr('tarifnjop')));
		}

	function simpanRetribusi() {
		var addparam = {id: window.idtranskttap, cmd: window.cmdp};
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_retribusi/simpan',
			type: 'POST',
			dataType: 'json',
			data: $("#form-pendataan").serialize()+'&'+jQuery.param(addparam),
			success: function(respon) {
				if (respon.status=='success') {
					// $("#modalRetribusi").modal('hide');
					// notifikasi('Berhasil','Pendataan berhasil dientrikan ke sistem','success',0,1);
					simpanDetailTanah(respon.pk)
				} else {
				}
			}
		});
		return false
	}

	function simpanDetailTanah(id) {
		var param = {
				tbltransaksiretribusi_id: id, cmd: window.cmdp
			};
		url_param = jQuery.param(param);
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_retribusi/simpanDetailTanah',
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
		window.idtranskttap = window.id;
		$.ajax({
			url: '<?php echo Yii::app()->getBaseUrl(1); ?>/pendaftaran/data_retribusi/getDataTanah',
			type: 'POST',
			dataType: 'json',
			data: {
				id: id
			},
			success: function(respon) {
				$('#tbltransaksiretribusi_tahunpajak').select2('val',respon.tbltransaksiretribusi_tahunpajak);
				$('#refnjop_id').select2('val',respon.refnjop_id);
				$('#tbltransaksiretribusi_tglentrisptpd').val(moment(respon.tbltransaksiretribusi_tglentrisptpd).format("L"));
				$('#rtanahtbltransaksiretribusi_masaawal').val(moment(respon.tbltransaksiretribusi_masaawal).format("L"));
				$('#rtanahtbltransaksiretribusi_masaakhir').val(moment(respon.tbltransaksiretribusi_masaakhir).format("L"));
				$('#tblretribusitanah_luas').val(respon.tblretribusitanah_luas);
				$('#label_total').html(respon.tblretribusitanah_total);
				setTimeout(function() {
					setPriceFormat();
					settarif();
					hitungTanah();
				}, 10);
			}
		});
		return false
	}

	</script>
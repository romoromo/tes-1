<form id="form-pendataan" class="smart-form">
	<fieldset id="sss">
		<div>
			<div class="col col-9" style="border-right: 1px solid #fff;">
				<div class="row" >
					<div class="col col-4">
						<label for="label" class="input">Jns. Kompensasi</label>
						<label class="select"><br>
							<?php $data['kompensasi'] = DBFetch::query(array('from'=>'refairtanahkompensasi','mode'=>'LIST')); ?>
							<select class="select2" name="param[tblpendataanairtanah_kompensasi]" id="tblpendataanairtanah_kompensasi">
								<?php foreach ($data['kompensasi'] as $kompensasi): ?>
									<option <?php for ($i=1; $i <= 6; $i++): ?> vol<?= $i; ?>="<?= $kompensasi['refairtanahkompensasi_vol'.$i] ?>" <?php endfor; ?> value="<?= $kompensasi['refairtanahkompensasi_nama'] ?><?= $id['refairtanahkompensasi_id'] ?>"><?= $kompensasi['refairtanahkompensasi_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</label>
					</div>
					<div class="col col-4">
						<label for="label" class="input">Jenis Sumber Air</label>
						<label class="select"><br>
							<select name="param[refsumberairtanah_id]" class="select2" id="refsumberairtanah_id">
								<option selected="" value="">= Pilih Sumber Air =</option>
								<?php $data['listsumberair'] = Yii::app()->db
								->createCommand()->select('*')->from('refsumberairtanah')->queryAll(); ?>
								<?php foreach ($data['listsumberair'] as $refsumberairtanah): ?>
									<option value="<?= $refsumberairtanah['refsumberairtanah_id'] ?>"><?= $refsumberairtanah['refsumberairtanah_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</label>
					</div>
					<div class="col col-4">
						<label for="label" class="input">Volume Pengambilan</label>
						<br>
						<label class="input">
							<input name="param[tblobyekairtanah_volume]" class="format-desimal text-align-right" id="tblobyekairtanah_volume">
							<i class="icon-prepend fa fa-square "></i>
						</label>
					</div>
				</div>

				<br>
				<br>
				<br>

				<div class="row" >
					<div class="col col-4">
						<label for="label" class="input">Sumur</label>
						<label class="input">
							<input class="text-align-right" type="text" name="param[tblobyekairtanah_sumur]" id="tblobyekairtanah_sumur" placeholder="Jumlah Sumur" />
							<i class="icon-prepend fa fa-map-marker "></i>
						</label>
					</div>
					<div class="col col-4">
						<label for="label" class="input">Latitude</label>
						<label class="input">
							<input class="text-align-right" type="text" name="param[tblobyekairtanah_latitude]" id="tblobyekairtanah_latitude" placeholder="Latitude" />
							<i class="icon-prepend fa fa-map-marker "></i>
						</label>
					</div>
					<div class="col col-4">
						<label for="label" class="input">Longitude</label>
						<label class="input">
							<input class="text-align-right" type="text" name="param[tblobyekairtanah_longitude]" id="tblobyekairtanah_longitude" placeholder="Longitude" />
							<i class="icon-prepend fa fa-map-marker "></i>
						</label>
					</div>
				</div>
			</div>
				
				<div class="col col-3">
						<label for="label" class="input">Lokasi Sumber</label>
						<br>
						<label class="textarea">
							<textarea rows="3" name="param[tblobyekairtanah_lokasisumber]" class="" id="tblobyekairtanah_lokasisumber"></textarea>
							<i class="icon-append fa fa-square "></i>
						</label>
					</div>
			<?php /*section class="col col-md-6">
				<p style="margin-top: 25px;">
					<em> <i class="fa fa-info-circle"></i> Silahkan Pilih Bidang Usaha</em>
				</p>
			</section*/ ?>
		</div>
	</fieldset>
	<input type="hidden" name="param[tblobyek_id]" id="xxobyidxx" value="<?= $data['obyek_id'] ?>" />
	<input type="hidden" name="param[rekening_kode]" id="xxobyidxx" value="<?= $data['rekening_kode'] ?>" />
	<footer>
		<button btnid="<?= $xc = md5(microtime()); ?>" class="btn btn-primary" type="submit">
			Simpan
		</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">
			Batal
		</button>
	</footer>
</form>

<script type="text/javascript">
	$(function() {
		operation = "A"; //"A"=Adding; "E"=Editing
		selected_index = -1; //Index of the selected list item
		/*tblobyekwaletdet = localStorage.getItem("tblobyekwaletdet");//Retrieve the stored data
		tblobyekwaletdet = JSON.parse(tblobyekwaletdet); //Converts string to object
		if(tblobyekwaletdet == null) //If there is no data, initialize an empty array
			tblobyekwaletdet = [];

		listDetail();*/
	});
	jQuery(document).ready(function($) {
		setPriceFormat();
		pageSetUp();
		window.cmddtlo = 'tambah';
		getData();

	});

	loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/moment-js/moment-with-locales.min.js", setMoment);
	function setMoment() {
		moment.locale('id');
	}

	loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		jQuery.validator.addMethod("number_ID", function(value, element) {
			// allow any non-whitespace characters as the host part
			return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:[\s\.,]\d{3})+)(?:[\.,]\d+)?$/.test(value);
		}, 'Mohon isikan dalam angka, pemisah desimal adalah koma (,)');

		var $FormDaftar = $("#form-pendataan").validate({
			// Rules for form validation
			rules : {
				"param[ref]" : {
					required : true
				}
				,"param[tbl]" : {
					required : true
					,digits : true
				}
			},

			// Messages for form validation
			messages : {
				"param[ref]" : {
					required : 'Mohon pilih '
				}
				,"param[tbl]" : {
					required : 'Mohon entrikan '
					,digits : 'Mohon entrikan dalam digit angka'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			},
			submitHandler : function(form) {
				// saat validasi benar semua, jalankan simpan()
				return simpanPendataan();
			}
		});
	}

	function simpanPendataan() {
		var addparam = {id: window.idobydetil, cmd: window.cmddtlo};
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/detail_obyek/simpanAirTanah',
			type: 'POST',
			dataType: 'json',
			data: $("#form-pendataan").serialize()+'&'+jQuery.param(addparam),
			success: function(respon) {
				if (respon.status=='success') {
					$("#modalDetailObyek").modal('hide');
					notifikasi('Berhasil','Pendataan detail obyek berhasil dientrikan ke sistem','success',1,0);
					setTimeout(function() {
						// detailIzinPemohon(window.idpemohon);
					}, 1000);
				} else {
				}
			}
		});
	}

	function getData() {
		$.ajax({
			url: 'pendaftaran/detail_obyek/getdata',
			type: 'post',
			dataType: 'json',
			data: {
				id: '<?= $data['detilid'] ?>',
				xtbx: '<?= base64_encode($data['tblname']) ?>',
				xtbdtlx: '<?= base64_encode($data['tblname_detail']) ?>',
			},
			success: function (respon) {
				window.idobydetil = '<?= $data['detilid'] ?>';
				window.respon = respon;
				exclude = [];
				toTGL = [];
				toDuit = [];
				$.each(respon, function(index, val) {
					if(!inArray(index,exclude)) {
						$("#"+index).val(respon[index]);
						$("#"+index).select2('val',respon[index]!="0" ? respon[index] : "");
								$("input[type=radio][value='"+respon[index]+"']."+index).prop('checked', true); //pilih radio button
                $("input[type=checkbox]#f_"+index).prop('checked', respon[index]=='T'); //pilih checkbox
								if(inArray(index,toTGL)) {
									tgl = moment(respon[index]).format("LL");
									$("#"+index).html(tgl);
									$("#"+index).val(respon[index]!=null ? moment(respon[index]).format("L") : '');
								}
								if(inArray(index,toDuit)) {
									$("#"+index).html( formatRibuan(respon[index]) );
								}
							}
						});
				window.cmddtlo = 'edit';

				//load detail if have key 'details'
				if (respon.hasOwnProperty('details')) {
					localStorage["tblobyekwaletdet"] = JSON.stringify( respon.details );
					listDetail();
				}

				setPriceFormat();
			}
		});
	}

	</script>
<style type="text/css">
	.disabled{
		background: #ddd !important;
	}
</style>
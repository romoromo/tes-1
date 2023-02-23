<form id="form-pendataan" class="smart-form">
	<fieldset id="sss">
		<div>
			<div class="col col-6" style="border-right: 1px solid #fff;">
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">Asal Tenaga Listrik</label>
						<label class="select">
							<select name="param[refasallistrikppj_id]" class="select2" id="refasallistrikppj_id">
								<option selected="" value="">= Pilih Asal Tenaga =</option>
								<?php error_reporting(-1); $data['listtenaga'] = Yii::app()->db
								->createCommand()->select('*')->from('refasallistrikppj')->queryAll(); ?>
								<?php foreach ($data['listtenaga'] as $refasallistrikppj): ?>
									<option value="<?= $refasallistrikppj['refasallistrikppj_id'] ?>"><?= $refasallistrikppj['refasallistrikppj_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</label>
					</div>
					<div class="col col-6">
						<label for="label" class="input">Golongan Tarif</label>
						<label class="select">
							<select name="param[refgoltarifppj_id]" class="select2" id="refgoltarifppj_id">
								<option selected="" value="">= Pilih Gol. Tarif =</option>
								<?php error_reporting(-1); $data['listgol'] = Yii::app()->db
								->createCommand()->select('*')->from('refgoltarifppj') /*->order('refgoltarifppj_keterangan ASC')*/ ->queryAll(); ?>
								<?php foreach ($data['listgol'] as $goltarif): ?>
									<option value="<?= $goltarif['refgoltarifppj_id'] ?>"><?= $goltarif['refgoltarifppj_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</label>
					</div>
				</div>

				<br>

				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">Tarif Listrik</label>
						<label class="input">
							<input name="param[tblobyekppj_tarif]" class="format-rupiah text-align-right" id="tblobyekppj_tarif">
							<i class="icon-prepend fa fa-money "></i>
						</label>
					</div>

					<div class="col col-6">
						<label for="label" class="input">Longitude</label>
						<label class="input">
							<input class="text-align-right" type="text" name="param[tblobyekhiburan_longitude]" id="tblobyekhiburan_longitude" placeholder="Longitude" />
							<i class="icon-prepend fa fa-map-marker "></i>
						</label>
					</div>
				</div>
			</div>
			<section class="col col-6 pull-right">
				<div class="col col-6">
					<label for="label" class="input">Voltase</label>
					<label class="select">
						<select name="param[refvoltaseppj_id]" class="select2" id="refvoltaseppj_id">
							<option selected="" value="">= Pilih Voltase =</option>
							<?php error_reporting(-1); $data['listvolt'] = Yii::app()->db
							->createCommand()->select('*')->from('refvoltaseppj') /*->order('refvoltaseppj_keterangan ASC')*/ ->queryAll(); ?>
							<?php foreach ($data['listvolt'] as $voltase): ?>
								<option value="<?= $voltase['refvoltaseppj_id'] ?>"><?= $voltase['refvoltaseppj_nama'] ?></option>
							<?php endforeach ?>
						</select>
					</label>
				</div>
				<div class="col col-6">
					<label for="label" class="input">Daya Listrik</label>
					<label class="select">
						<select name="param[refdayappj_id]" class="select2" id="refdayappj_id">
							<option selected="" value="">= Pilih Daya Listrik =</option>
							<?php error_reporting(-1); $data['listdaya'] = Yii::app()->db
							->createCommand()->select('*')->from('refdayappj')
							/*->order('refdayappj_keterangan ASC')*/
							->queryAll(); ?>
							<?php foreach ($data['listdaya'] as $daya): ?>
								<option value="<?= $daya['refdayappj_id'] ?>"><?= $daya['refdayappj_nama'] ?></option>
							<?php endforeach ?>
						</select>
					</label>
				</div>
			</section>

			<section class="col col-6 pull-right">
				<div class="col col-6">
					<label for="label" class="input">Latitude</label>
					<label class="input">
						<input class="text-align-right" type="text" name="param[tblobyekhiburan_latitude]" id="tblobyekhiburan_latitude" placeholder="Latitude" />
						<i class="icon-prepend fa fa-map-marker "></i>
					</label>
				</div>
			</section>

			<div class="col col-md-12">
				<div class="row">
					<div class="col col-md-6">
						<label for="label" class="input"><br>Penggunaan Listrik / Taksiran Penggunaan Listrik:</label>
					</div>
				</div>
			</div>
			<div class="row" >
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<td></td>
								<td>Bulan</td>
								<td>Tarif KWH</td>
							</tr>
						</thead>
						<tbody style="overflow: auto;max-height: 500px" id="_listDetail_">
						</tbody>
						<tfoot>
							<tr id="form-detail">
								<td>
								</td>
								<td>
									<label class="select">
										<select class="select2" name="bulan" id="dtl_tblobyekppjdet_bulan">
											<?php for ($i=1;$i<=12;$i++): ?>
											<option value="<?= LokalIndonesia::getBulan($i); ?>"><?= LokalIndonesia::getBulan($i); ?></option>												
											<?php endfor ?>
										</select>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="format-rupiah text-align-right" type="text" id="dtl_tblobyekppjdet_perkiraankwh" placeholder="Tarif KWH">
										<i class="icon-prepend fa fa-square "></i>
									</label>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<a class="pull-right btn btn-sm btn-success" onclick="tambahDetail()"><i class="fa fa-plus"></i> Perbaharui Data</a>
								</td>
							</tr>
						</tfoot>
					</table>
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
		/*tblobyekppjdet = localStorage.getItem("tblobyekppjdet");//Retrieve the stored data
		tblobyekppjdet = JSON.parse(tblobyekppjdet); //Converts string to object
		if(tblobyekppjdet == null) //If there is no data, initialize an empty array
			tblobyekppjdet = [];

		listDetail();*/
	});

	function tambahDetail() {
			bulan = $("#dtl_tblobyekppjdet_bulan").select2('val');
			tarif = $("#dtl_tblobyekppjdet_perkiraankwh").val();
			rs = {
				"tblobyekppjdet_bulan":bulan
				,"tblobyekppjdet_perkiraankwh": toAngka(tarif)
			};

			if (operation=='E') {
				tblobyekppjdet[selected_index] = rs;
				operation = 'A';
			} else if (operation=='A') {
				tblobyekppjdet.push( rs );
			}
			localStorage["tblobyekppjdet"] = JSON.stringify( tblobyekppjdet );
			$("#form-detail input, #form-detail select").val('');
			$("#form-detail .select2").select2('val','1');
			listDetail();
			window.selected_index = -1;
	}

	function editDetail(selected_index){
		$("#form-detail input, #form-detail select").val('');
		operation = "E"; //Edit
		window.selected_index = selected_index;
		// console.log('edit => '+window.selected_index);
		rs = tblobyekppjdet[selected_index];

		$("#dtl_tblobyekppjdet_bulan").select2('val',rs.tblobyekppjdet_bulan);
		$("#dtl_tblobyekppjdet_perkiraankwh").val(parseInt(rs.tblobyekppjdet_perkiraankwh));
		setPriceFormat();
	 	return true;
	}

	function hapusDetail(selected_index) {
		tblobyekppjdet.splice(selected_index, 1);
		localStorage.setItem("tblobyekppjdet", JSON.stringify(tblobyekppjdet));
		listDetail();
	}

	function listDetail() {
		$("#_listDetail_").html("");
		tblobyekppjdet = JSON.parse(localStorage["tblobyekppjdet"]);
		for(var i in tblobyekppjdet){ 
			var rs = (tblobyekppjdet[i]);
			$("#_listDetail_").append(
				'<tr>'
					+'<td><a class="btn btn-sm btn-warning  btn-circle" onclick="editDetail('+i+')"><i class="fa fa-pencil"></i></a>'
					+'<a class="btn btn-sm  btn-danger btn-circle" onclick="hapusDetail('+i+')"><i class="fa fa-times"></i></a></td>'
					+'<td>'+rs.tblobyekppjdet_bulan+'</td>'
					+'<td><div align="right">'+formatRibuan(rs.tblobyekppjdet_perkiraankwh) +'</div></td>'
				+'</tr>'
			);
		}
		setPriceFormat();
	}

	function updateDetail(){
		/*jnskmr = $("#dtl_tblobyekppjdet_bulan").select2('val');
		jmlkmr = $("#dtl_tblobyekppjdet_jumlkamar").val();*/
		
		localStorage.setItem("tblobyekppjdet", JSON.stringify(tblobyekppjdet));
		operation = "A"; //Return to default value
		return true;
	}
	jQuery(document).ready(function($) {
		setPriceFormat();
		pageSetUp();
		window.cmddtlo = 'tambah';
		getData();

		operation = "A"; //"A"=Adding; "E"=Editing
		selected_index = -1; //Index of the selected list item
		localStorage.setItem("tblobyekppjdet",'[]');
		tblobyekppjdet = localStorage.getItem("tblobyekppjdet");//Retrieve the stored data
		tblobyekppjdet = JSON.parse(tblobyekppjdet); //Converts string to object
		if(tblobyekppjdet == null) //If there is no data, initialize an empty array
			tblobyekppjdet = [];
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
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/detail_obyek/simpanPPJ',
			type: 'POST',
			dataType: 'json',
			data: $("#form-pendataan").serialize()+'&'+jQuery.param(addparam),
			success: function(respon) {
				if (respon.status=='success') {
					$("#modalDetailObyek").modal('hide');
					notifikasi('Berhasil','Pendataan detail obyek berhasil dientrikan ke sistem','success',1,0);
					simpanDetailPPJ(respon.pk);
					setTimeout(function() {
						// detailIzinPemohon(window.idpemohon);
					}, 1000);
				} else {
				}
			}
		});
	}
	
	function simpanDetailPPJ(id) {
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/detail_obyek/simpanDetailPPJ',
			type: 'POST',
			dataType: 'json',
			data: {
				tblobyekppj_id: id
				,tblobyekppjdet: localStorage.getItem("tblobyekppjdet")
			},
			success: function(respon) {
				localStorage.setItem("tblobyekppjdet","[]");
				tblobyekppjdet = [];
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
					localStorage["tblobyekppjdet"] = JSON.stringify( respon.details );
					listDetail();
				}
			}
		});
	}

	</script>
<style type="text/css">
	.disabled{
		background: #ddd !important;
	}
</style>
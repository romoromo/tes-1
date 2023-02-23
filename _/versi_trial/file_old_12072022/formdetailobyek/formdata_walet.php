<form id="form-pendataan" class="smart-form">
	<fieldset id="sss">
		<div>
			<div class="col col-6" style="border-right: 1px solid #fff;">
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">Asal Sarang Burung Walet yg Diambil</label>
						<label class="select">
							<select name="param[refasalwalet_id]" class="select2" id="refasalwalet_id">
								<option selected="" value="">= Pilih Asal Burung =</option>
								<?php $data['listasalwalet'] = Yii::app()->db
								->createCommand()->select('*')->from('refasalwalet')->queryAll(); ?>
								<?php foreach ($data['listasalwalet'] as $refasalwalet): ?>
									<option value="<?= $refasalwalet['refasalwalet_id'] ?>"><?= $refasalwalet['refasalwalet_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</label>
					</div>
					<div class="col col-6">
						<label for="label" class="input">Jenis Sarang Burung Walet yang Diambil</label>
						<label class="select">
							<select name="param[refjeniswalet_id]" class="select2" id="refjeniswalet_id">
								<option selected="" value="">= Pilih Jenis =</option>
								<?php $data['listjnswalet'] = Yii::app()->db
								->createCommand()->select('*')->from('refjeniswalet')->queryAll(); ?>
								<?php foreach ($data['listjnswalet'] as $refjeniswalet): ?>
									<option value="<?= $refjeniswalet['refjeniswalet_id'] ?>"><?= $refjeniswalet['refjeniswalet_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</label>
					</div>
					<div class="col col-6">
						<label for="label" class="input">Harga Pasaran / KG</label>
						<br>
						<label class="input">
							<input name="param[tblobyekwalet_hargapasar]" class="format-rupiah text-align-right" id="tblobyekwalet_hargapasar">
							<i class="icon-prepend fa fa-money "></i>
						</label>
					</div>
				</div>

				<br>

				<div class="row" >
					<div class="col-md-12 pull-right">
					<section>
					<div class="col col-6">
						<label for="label" class="input">Latitude</label>
						<label class="input">
							<input class="text-align-right" type="text" name="param[tblobyekwalet_latitude]" id="tblobyekwalet_latitude" placeholder="Latitude" />
							<i class="icon-prepend fa fa-map-marker "></i>
						</label>
					</div>
					<div class="col col-6">
						<label for="label" class="input">Longitude</label>
						<label class="input">
							<input class="text-align-right" type="text" name="param[tblobyekhotel_longitude]" id="tblobyekhotel_longitude" placeholder="Longitude" />
							<i class="icon-prepend fa fa-map-marker "></i>
						</label>
					</div>
					</section>
						
					</div>
				</div>
			</div>
			<section class="col col-6 pull-right">
				
				<div class="col col-6">
					<label for="label" class="input">Tarif Untuk Pengambilan Sarang Burung</label>
					<label class="select">
						<select name="param[reftarifwalet_id]" class="select2" id="reftarifwalet_id">
							<option selected="" value="">= Pilih Tarif =</option>
							<?php error_reporting(-1); $data['listtarif'] = Yii::app()->db
							->createCommand()->select('*')->from('reftarifwalet')
							/*->order('reftarifwalet_keterangan ASC')*/
							->queryAll(); ?>
							<?php foreach ($data['listtarif'] as $daya): ?>
								<option value="<?= $daya['reftarifwalet_id'] ?>"><?= $daya['reftarifwalet_nama'] ?></option>
							<?php endforeach ?>
						</select>
					</label>
				</div>

				<div class="col col-6">
					<label for="label" class="input">Lokasi</label>
					<br>
					<label class="input">
						<input name="param[tblobyekwalet_lokasi]" class="" id="tblobyekwalet_lokasi">
						<i class="icon-append fa fa-home "></i>
					</label>
				</div>

			</section>

			<div class="col col-md-12">
				<div class="row">
					<div class="col col-md-6">
						<label for="label" class="input"><br></label>
					</div>
				</div>
			</div>
			<div class="row" >
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<td></td>
								<td>Bulan</td>
								<td><div align="center"> Jumlah Panen <br>Sarang Putih</div></td>
								<td>Tarif (Rp)</td>
								<td><div align="center"> Jumlah Panen <br>Sarang Hitam</div></td>
								<td>Tarif (Rp)</td>
								<td>Keterangan</td>
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
										<select style="width: 100px;" class="" name="bulan" id="dtl_tblobyekwaletdet_bulan">
											<?php for ($i=1;$i<=12;$i++): ?>
											<option value="<?= LokalIndonesia::getBulan($i); ?>"><?= LokalIndonesia::getBulan($i); ?></option>												
											<?php endfor ?>
										</select><i></i>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="text-align-right format-ribuan" type="text" id="dtl_tblobyekwaletdet_jumlahputih" placeholder="Jumlah Putih">
										<i class="icon-prepend fa fa-square "></i>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="format-rupiah text-align-right" type="text" id="dtl_tblobyekwaletdet_jumlahhitam" placeholder="Tarif Putih (Rp)">
										<i class="icon-prepend fa fa-money "></i>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="text-align-right format-ribuan" type="text" id="dtl_tblobyekwaletdet_hargaputih" placeholder="Jumlah Hitam">
										<i class="icon-prepend fa fa-square "></i>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="format-rupiah text-align-right" type="text" id="dtl_tblobyekwaletdet_hargahitam" placeholder="Tarif Hitam (Rp)">
										<i class="icon-prepend fa fa-money "></i>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="" type="text" id="dtl_tblobyekwaletdet_keterangan" placeholder="Keterangan">
										<i class="icon-append fa fa-square "></i>
									</label>
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<a class="pull-right btn btn-sm btn-success" onclick="tambahDetail()"><i class="fa fa-plus"></i> Perbaharui Data</a>
								</td>
								<td></td>
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
		/*tblobyekwaletdet = localStorage.getItem("tblobyekwaletdet");//Retrieve the stored data
		tblobyekwaletdet = JSON.parse(tblobyekwaletdet); //Converts string to object
		if(tblobyekwaletdet == null) //If there is no data, initialize an empty array
			tblobyekwaletdet = [];

		listDetail();*/
	});

	function tambahDetail() {
			bulan = $("#dtl_tblobyekwaletdet_bulan").val();
			jumlahputih = $("#dtl_tblobyekwaletdet_jumlahputih").val();
			jumlahhitam = $("#dtl_tblobyekwaletdet_jumlahhitam").val();
			hargaputih = $("#dtl_tblobyekwaletdet_hargaputih").val();
			hargahitam = $("#dtl_tblobyekwaletdet_hargahitam").val();
			keterangan = $("#dtl_tblobyekwaletdet_keterangan").val();
			rs = {
				"tblobyekwaletdet_bulan":bulan
				,"tblobyekwaletdet_jumlahputih": toAngka(jumlahputih)
				,"tblobyekwaletdet_jumlahhitam": toAngka(jumlahhitam)
				,"tblobyekwaletdet_hargaputih": toAngka(hargaputih)
				,"tblobyekwaletdet_hargahitam": toAngka(hargahitam)
				,"tblobyekwaletdet_keterangan": toAngka(keterangan)
			};

			if (operation=='E') {
				tblobyekwaletdet[selected_index] = rs;
				operation = 'A';
			} else if (operation=='A') {
				tblobyekwaletdet.push( rs );
			}
			localStorage["tblobyekwaletdet"] = JSON.stringify( tblobyekwaletdet );
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
		rs = tblobyekwaletdet[selected_index];

		$("#dtl_tblobyekwaletdet_bulan").val(rs.tblobyekwaletdet_bulan);
		$("#dtl_tblobyekwaletdet_jumlahputih").val(parseInt(rs.tblobyekwaletdet_jumlahputih));
		$("#dtl_tblobyekwaletdet_jumlahhitam").val(parseInt(rs.tblobyekwaletdet_jumlahhitam));
		$("#dtl_tblobyekwaletdet_hargaputih").val(parseInt(rs.tblobyekwaletdet_hargaputih));
		$("#dtl_tblobyekwaletdet_hargahitam").val(parseInt(rs.tblobyekwaletdet_hargahitam));
		$("#dtl_tblobyekwaletdet_keterangan").val((rs.tblobyekwaletdet_keterangan));
		setPriceFormat();
	 	return true;
	}

	function hapusDetail(selected_index) {
		tblobyekwaletdet.splice(selected_index, 1);
		localStorage.setItem("tblobyekwaletdet", JSON.stringify(tblobyekwaletdet));
		listDetail();
	}

	function listDetail() {
		$("#_listDetail_").html("");
		tblobyekwaletdet = JSON.parse(localStorage["tblobyekwaletdet"]);
		for(var i in tblobyekwaletdet){ 
			var rs = (tblobyekwaletdet[i]);
			$("#_listDetail_").append(
				'<tr>'
					+'<td><a class="btn btn-sm btn-warning  btn-circle" onclick="editDetail('+i+')"><i class="fa fa-pencil"></i></a>'
					+'<a class="btn btn-sm  btn-danger btn-circle" onclick="hapusDetail('+i+')"><i class="fa fa-times"></i></a></td>'
					+'<td>'+rs.tblobyekwaletdet_bulan+'</td>'
					+'<td><div align="right">'+formatRibuan(rs.tblobyekwaletdet_jumlahputih) +'</div></td>'
					+'<td><div align="right">'+formatRibuan(rs.tblobyekwaletdet_jumlahhitam) +'</div></td>'
					+'<td><div align="right">'+formatRibuan(rs.tblobyekwaletdet_hargaputih) +'</div></td>'
					+'<td><div align="right">'+formatRibuan(rs.tblobyekwaletdet_hargahitam) +'</div></td>'
					+'<td><div align="right">'+(rs.tblobyekwaletdet_keterangan) +'</div></td>'
				+'</tr>'
			);
		}
		setPriceFormat();
	}

	function updateDetail(){
		/*jnskmr = $("#dtl_tblobyekwaletdet_bulan").select2('val');
		jmlkmr = $("#dtl_tblobyekwaletdet_jumlkamar").val();*/
		
		localStorage.setItem("tblobyekwaletdet", JSON.stringify(tblobyekwaletdet));
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
		localStorage.setItem("tblobyekwaletdet",'[]');
		tblobyekwaletdet = localStorage.getItem("tblobyekwaletdet");//Retrieve the stored data
		tblobyekwaletdet = JSON.parse(tblobyekwaletdet); //Converts string to object
		if(tblobyekwaletdet == null) //If there is no data, initialize an empty array
			tblobyekwaletdet = [];
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
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/detail_obyek/simpanWalet',
			type: 'POST',
			dataType: 'json',
			data: $("#form-pendataan").serialize()+'&'+jQuery.param(addparam),
			success: function(respon) {
				if (respon.status=='success') {
					$("#modalDetailObyek").modal('hide');
					notifikasi('Berhasil','Pendataan detail obyek berhasil dientrikan ke sistem','success',1,0);
					simpanDetailWalet(respon.pk);
					setTimeout(function() {
						// detailIzinPemohon(window.idpemohon);
					}, 1000);
				} else {
				}
			}
		});
	}
	
	function simpanDetailWalet(id) {
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/detail_obyek/simpanDetailWalet',
			type: 'POST',
			dataType: 'json',
			data: {
				tblobyekwalet_id: id
				,tblobyekwaletdet: localStorage.getItem("tblobyekwaletdet")
			},
			success: function(respon) {
				localStorage.setItem("tblobyekwaletdet","[]");
				tblobyekwaletdet = [];
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
				toDuit = ['tblobyekwalet_hargapasar'];
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
									$("#"+index).val( formatRibuan(parseInt(respon[index])) );
								}
							}
						});
				window.cmddtlo = 'edit';

				//load detail if have key 'details'
				if (respon.hasOwnProperty('details')) {
					localStorage["tblobyekwaletdet"] = JSON.stringify( respon.details );
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
<form id="form-pendataan" class="smart-form">
	<fieldset id="sss">
		<div>
			<div class="col col-6" style="border-right: 1px solid #fff;">
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">Golongan Hotel</label>
						<label class="select">
							<select name="param[refgolhotel_id]" class="select2" id="refgolhotel_id">
								<option selected="" value="">= Pilih Golongan Hotel =</option>
								<?php error_reporting(-1); $data['listgol'] = Yii::app()->db
								->createCommand()->select('*')->from('refgolhotel')->order('refgolhotel_keterangan ASC')->queryAll(); ?>
								<?php foreach ($data['listgol'] as $golhotel): ?>
									<option value="<?= $golhotel['refgolhotel_id'] ?>"><?= $golhotel['refgolhotel_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</label>
					</div>
					<div class="col col-6">
						<label for="label" class="input">Menggunakan Kas Register:</label>
						<label class="checkbox">
							<input name="param[tblobyekhotel_isregister]" value="F" type="hidden">
							<input name="param[tblobyekhotel_isregister]" value="T" id="f_tblobyekhotel_isregister" type="checkbox"></input><i></i> Ya
						</label>
					</div>
					
				</div>

				<br>

				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">Latitude</label>
						<label class="input">
							<input class="text-align-right" type="text" name="param[tblobyekhotel_latitude]" id="tblobyekhotel_latitude" placeholder="Latitude" />
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
				</div>
			</div>
			<section class="col col-6 pull-right">
				<div class="col col-6">
						<label for="label" class="input">Menggunakan Pembukuan:</label>
						<label class="checkbox">
							<input name="param[tblobyekhotel_iskas]" value="F" type="hidden">
							<input name="param[tblobyekhotel_iskas]" value="T" id="f_tblobyekhotel_iskas" type="checkbox"></input><i></i> Ya
						</label>
					</div>
					<div class="col col-6">
						<label for="label" class="input">Jumlah Karyawan</label>
						<label class="input">
							<input class="text-align-right" type="text" name="param[tblobyekhotel_jumlahpegawai]" id="tblobyekhotel_jumlahpegawai" placeholder="Jumlah Karyawan" />
							<i class="icon-prepend fa fa-user "></i>
						</label>
					</div>
			</section>

			<div class="col col-md-12">
				<div class="row">
					<div class="col col-md-4">
						<label for="label" class="input">Fasilitas yang ada:</label>
						<label class="checkbox">
							<input name="param[tblobyekhotel_isrsidang]" value="F" type="hidden">
							<input name="param[tblobyekhotel_isrsidang]" value="T" id="f_tblobyekhotel_isrsidang" type="checkbox"></input><i></i> Ruang Sidang
						</label>
						<label class="checkbox">
							<input name="param[tblobyekhotel_isrestoran]" value="F" type="hidden">
							<input name="param[tblobyekhotel_isrestoran]" value="T" id="f_tblobyekhotel_isrestoran" type="checkbox"></input><i></i> Restoran
						</label>
						<label class="checkbox">
							<input name="param[tblobyekhotel_isdiskotik]" value="F" type="hidden">
							<input name="param[tblobyekhotel_isdiskotik]" value="T" id="f_tblobyekhotel_isdiskotik" type="checkbox"></input><i></i> Bar/PUB Diskotik
						</label>
						<label class="checkbox">
							<input name="param[tblobyekhotel_iskolamrenang]" value="F" type="hidden">
							<input name="param[tblobyekhotel_iskolamrenang]" value="T" id="f_tblobyekhotel_iskolamrenang" type="checkbox"></input><i></i> Kolam Renang
						</label>
						<label class="checkbox">
							<input name="param[tblobyekhotel_isrentalmobil]" value="F" type="hidden">
							<input name="param[tblobyekhotel_isrentalmobil]" value="T" id="f_tblobyekhotel_isrentalmobil" type="checkbox"></input><i></i> Rental Mobil
						</label>
					</div>
					<div class="col col-md-4">
						<label for="label" class="input">&nbsp;</label>
						<label class="checkbox">
							<input name="param[tblobyekhotel_isbillyard]" value="F" type="hidden">
							<input name="param[tblobyekhotel_isbillyard]" value="T" id="f_tblobyekhotel_isbillyard" type="checkbox"></input><i></i> Billyard
						</label>
						<label class="checkbox">
							<input name="param[tblobyekhotel_islaundry]" value="F" type="hidden">
							<input name="param[tblobyekhotel_islaundry]" value="T" id="f_tblobyekhotel_islaundry" type="checkbox"></input><i></i> Laundry
						</label>
						<label class="checkbox">
							<input name="param[tblobyekhotel_isrpertemuan]" value="F" type="hidden">
							<input name="param[tblobyekhotel_isrpertemuan]" value="T" id="f_tblobyekhotel_isrpertemuan" type="checkbox"></input><i></i> Ruang Pertemuan
						</label>
						<label class="checkbox">
							<input name="param[tblobyekhotel_issewaruangan]" value="F" type="hidden">
							<input name="param[tblobyekhotel_issewaruangan]" value="T" id="f_tblobyekhotel_issewaruangan" type="checkbox"></input><i></i> Persewaan Ruangan
						</label>
						<label class="checkbox">
							<input name="param[tblobyekhotel_istelponfax]" value="F" type="hidden">
							<input name="param[tblobyekhotel_istelponfax]" value="T" id="f_tblobyekhotel_istelponfax" type="checkbox"></input><i></i> Telepon Fax
						</label>
					</div>
					<div class="col col-md-4">
						<label for="label" class="input">&nbsp;</label>
						<label class="checkbox">
							<input name="param[tblobyekhotel_iscoffeshop]" value="F" type="hidden">
							<input name="param[tblobyekhotel_iscoffeshop]" value="T" id="f_tblobyekhotel_iscoffeshop" type="checkbox"></input><i></i> Coffe Shop
						</label>
						<label class="checkbox">
							<input name="param[tblobyekhotel_isfitnescentre]" value="F" type="hidden">
							<input name="param[tblobyekhotel_isfitnescentre]" value="T" id="f_tblobyekhotel_isfitnescentre" type="checkbox"></input><i></i> Fitness Centre
						</label>
						<label class="checkbox">
							<input name="param[tblobyekhotel_isbusiness]" value="F" type="hidden">
							<input name="param[tblobyekhotel_isbusiness]" value="T" id="f_tblobyekhotel_isbusiness" type="checkbox"></input><i></i> Business
						</label>
						<label class="checkbox">
							<input name="param[tblobyekhotel_isbabershop]" value="F" type="hidden">
							<input name="param[tblobyekhotel_isbabershop]" value="T" id="f_tblobyekhotel_isbabershop" type="checkbox"></input><i></i> Barbershop/Salon
						</label>
					</div>
				</div>
			</div>
			<div class="row" >
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<td></td>
								<td>Golongan Kamar</td>
								<td>Tarif (Rp.)</td>
								<td>Jumlah Kamar</td>
							</tr>
						</thead>
						<tbody style="overflow: auto;max-height: 500px" id="_listDetail_">
						</tbody>
						<tfoot>
							<tr id="form-detail">
								<td>
								</td>
								<td>
									<label class="input">
										<input type="text" id="dtl_tblobyekhoteldet_kamar" placeholder="Golongan Kamar">
										<i class="icon-append fa fa-square "></i>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="format-rupiah" type="text" id="dtl_tblobyekhoteldet_tarif" placeholder="Tarif (Rp.)">
										<i class="icon-append fa fa-square "></i>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="text-align-right" type="text" id="dtl_tblobyekhoteldet_jumlkamar" placeholder="Jumlah Kamar">
										<i class="icon-prepend fa fa-square "></i>
									</label>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<a class="pull-right btn btn-sm btn-success" onclick="tambahDetail()"><i class="fa fa-plus"></i> Perbaharui Data</a>
								</td>
								<td></td>
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
		/*tblobyekhoteldet = localStorage.getItem("tblobyekhoteldet");//Retrieve the stored data
		tblobyekhoteldet = JSON.parse(tblobyekhoteldet); //Converts string to object
		if(tblobyekhoteldet == null) //If there is no data, initialize an empty array
			tblobyekhoteldet = [];

		listDetail();*/
	});

	function tambahDetail() {
			jnskmr = $("#dtl_tblobyekhoteldet_kamar").val();
			jmlkmr = $("#dtl_tblobyekhoteldet_jumlkamar").val();
			tarif = $("#dtl_tblobyekhoteldet_tarif").val();
			rs = {
				"tblobyekhoteldet_kamar":jnskmr
				,"tblobyekhoteldet_jumlkamar":jmlkmr
				,"tblobyekhoteldet_tarif": toAngka(tarif)
			};

			if (operation=='E') {
				tblobyekhoteldet[selected_index] = rs;
				operation = 'A';
			} else if (operation=='A') {
				tblobyekhoteldet.push( rs );
			}
			localStorage["tblobyekhoteldet"] = JSON.stringify( tblobyekhoteldet );
			$("#form-detail input, #form-detail select").val('');
			listDetail();
			window.selected_index = -1;
	}

	function editDetail(selected_index){
		$("#form-detail input, #form-detail select").val('');
		operation = "E"; //Edit
		window.selected_index = selected_index;
		// console.log('edit => '+window.selected_index);
		rs = tblobyekhoteldet[selected_index];

		$("#dtl_tblobyekhoteldet_kamar").val(rs.tblobyekhoteldet_kamar);
		$("#dtl_tblobyekhoteldet_jumlkamar").val(rs.tblobyekhoteldet_jumlkamar);
		$("#dtl_tblobyekhoteldet_tarif").val(parseInt(rs.tblobyekhoteldet_tarif));
		setPriceFormat();
	 	return true;
	}

	function hapusDetail(selected_index) {
		tblobyekhoteldet.splice(selected_index, 1);
		localStorage.setItem("tblobyekhoteldet", JSON.stringify(tblobyekhoteldet));
		listDetail();
	}

	function listDetail() {
		$("#_listDetail_").html("");
		tblobyekhoteldet = JSON.parse(localStorage["tblobyekhoteldet"]);
		for(var i in tblobyekhoteldet){ 
			var rs = (tblobyekhoteldet[i]);
			$("#_listDetail_").append(
				'<tr>'
					+'<td><a class="btn btn-sm btn-warning  btn-circle" onclick="editDetail('+i+')"><i class="fa fa-pencil"></i></a>'
					+'<a class="btn btn-sm  btn-danger btn-circle" onclick="hapusDetail('+i+')"><i class="fa fa-times"></i></a></td>'
					+'<td>'+rs.tblobyekhoteldet_kamar+'</td>'
					+'<td><div align="right">'+formatRibuan(rs.tblobyekhoteldet_tarif) +'</div></td>'
					+'<td><div align="right">'+formatRibuan((rs.tblobyekhoteldet_jumlkamar)) +'</div></td>'
				+'</tr>'
			);
		}
		setPriceFormat();
	}

	function updateDetail(){
		jnskmr = $("#dtl_tblobyekhoteldet_kamar").val();
		jmlkmr = $("#dtl_tblobyekhoteldet_jumlkamar").val();
		
		localStorage.setItem("tblobyekhoteldet", JSON.stringify(tblobyekhoteldet));
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
		localStorage.setItem("tblobyekhoteldet",'[]');
		tblobyekhoteldet = localStorage.getItem("tblobyekhoteldet");//Retrieve the stored data
		tblobyekhoteldet = JSON.parse(tblobyekhoteldet); //Converts string to object
		if(tblobyekhoteldet == null) //If there is no data, initialize an empty array
			tblobyekhoteldet = [];
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
				"param[refgolhotel_id]" : {
					required : true
				}
				,"param[tblobyekhotel_jumlahpegawai]" : {
					required : true
					,digits : true
				}
			},

			// Messages for form validation
			messages : {
				"param[refgolhotel_id]" : {
					required : 'Mohon pilih golongan hotel'
				}
				,"param[tblobyekhotel_jumlahpegawai]" : {
					required : 'Mohon entrikan jumlah pegawai'
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
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/detail_obyek/simpanHotel',
			type: 'POST',
			dataType: 'json',
			data: $("#form-pendataan").serialize()+'&'+jQuery.param(addparam),
			success: function(respon) {
				if (respon.status=='success') {
					$("#modalDetailObyek").modal('hide');
					notifikasi('Berhasil','Pendataan detail obyek berhasil dientrikan ke sistem','success',1,0);
					simpanDetailHotel(respon.pk);
					setTimeout(function() {
						// detailIzinPemohon(window.idpemohon);
					}, 1000);
				} else {
				}
			}
		});
	}
	
	function simpanDetailHotel(id) {
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/detail_obyek/simpanDetailHotel',
			type: 'POST',
			dataType: 'json',
			data: {
				tblobyekhotel_id: id
				,tblobyekhoteldet: localStorage.getItem("tblobyekhoteldet")
			},
			success: function(respon) {
				localStorage.setItem("tblobyekhoteldet","[]");
				tblobyekhoteldet = [];
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
					localStorage["tblobyekhoteldet"] = JSON.stringify( respon.details );
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
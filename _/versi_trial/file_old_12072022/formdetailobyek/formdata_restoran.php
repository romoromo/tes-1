<form id="form-pendataan" class="smart-form">
	<fieldset id="sss">
		<div>
			<div class="col col-6" style="border-right: 1px solid #fff;">
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">Golongan Rumah Makan</label>
						<label class="select">
							<select name="param[refgolrestoran_id]" class="select2" id="refgolrestoran_id">
								<option selected="" value="">= Pilih Golongan Rumah Makan =</option>
								<?php error_reporting(-1); $data['listgol'] = Yii::app()->db
								->createCommand()->select('*')->from('refgolrestoran')->order('refgolrestoran_keterangan ASC')->queryAll(); ?>
								<?php foreach ($data['listgol'] as $golresto): ?>
									<option value="<?= $golresto['refgolrestoran_id'] ?>"><?= $golresto['refgolrestoran_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</label>
					</div>
					<div class="col col-6">
						<label for="label" class="input">Menggunakan Kas Register:</label>
						<label class="checkbox">
							<input name="param[tblobyekrestoran_isregister]" value="F" type="hidden">
							<input name="param[tblobyekrestoran_isregister]" value="T" id="f_tblobyekrestoran_isregister" type="checkbox"></input><i></i> Ya
						</label>
					</div>

				</div>

				<br>

				<div class="row">
					<div class="col col-6">
						<label for="label" class="input">Jam Operasional</label>
						<label class="input">
							<input class="text-align-right" name="param[tblobyekhiburan_longitude]" id="tblobyekhiburan_longitude" placeholder="00.00 - 00.00" type="text">
							<i class="icon-prepend fa fa-clock-o "></i>
						</label>
					</div>
					<div class="col col-6">
						<label for="label" class="input">Menu Utama</label>
						<label class="input">
							<input class="text-align-right" name="param[tblobyekhiburan_longitude]" id="tblobyekhiburan_longitude" placeholder="Nasi Goreng/ dll." type="text">
							<i class="icon-prepend fa fa-book "></i>
						</label>
					</div>
				</div>
				<br>
				<br>
				<br>
				<div class="row">
					<div class="col col-6">
						<label for="label" class="input">Latitude</label>
						<label class="input">
							<input class="text-align-right" type="text" name="param[tblobyekrestoran_latitude]" id="tblobyekrestoran_latitude" placeholder="Latitude" />
							<i class="icon-prepend fa fa-map-marker "></i>
						</label>
					</div>
					<div class="col col-6">
						<label for="label" class="input">Longitude</label>
						<label class="input">
							<input class="text-align-right" type="text" name="param[tblobyekrestoran_longitude]" id="tblobyekrestoran_longitude" placeholder="Longitude" />
							<i class="icon-prepend fa fa-map-marker "></i>
						</label>
					</div>
				</div>
			</div>
			<section class="col col-6 pull-right">
				<div class="col col-8">
						<label for="label" class="input">Menggunakan Pembukuan/Pencatatan:</label>
						<label class="checkbox">
							<input name="param[tblobyekrestoran_iskas]" value="F" type="hidden">
							<input name="param[tblobyekrestoran_iskas]" value="T" id="f_tblobyekrestoran_iskas" type="checkbox"></input><i></i> Ya
						</label>
					</div>
			</section>

			<div class="row" >

				
				
				<div class="col col-4">
					<label for="label" class="input">Keterangan</label>
					<label class="textarea">
						<textarea rows="3" name="param[tblobyekairtanah_lokasisumber]" class="" id="tblobyekairtanah_lokasisumber"></textarea>
						<i class="icon-append fa fa-square "></i>
					</label>
				</div>
				</div>

				<br>
				<br>

					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<td></td>
								<td>Jumlah Meja</td>
								<td>Jumlah Kursi</td>
								<td>Jumlah Pengunjung</td>
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
									<label class="input">
										<input class="text-align-right" type="text" id="dtl_tblobyekrestorandet_jmlhmeja" placeholder="Jumlah Meja">
										<i class="icon-prepend fa fa-square "></i>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="text-align-right" type="text" id="dtl_tblobyekrestorandet_jmlhkursi" placeholder="Jumlah Kursi">
										<i class="icon-prepend fa fa-square "></i>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="text-align-right" type="text" id="dtl_tblobyekrestorandet_pengunjung" placeholder="Jumlah Pengunjung">
										<i class="icon-prepend fa fa-square "></i>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="" type="text" id="dtl_tblobyekrestorandet_keterangan" placeholder="Keterangan">
										<i class="icon-append fa fa-square "></i>
									</label>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<a class="pull-right btn btn-sm btn-success" onclick="tambahDetail('R')"><i class="fa fa-plus"></i> Perbaharui Data</a>
								</td>
								<td></td>
								<td></td>
							</tr>
						</tfoot>
					</table>
			</div>

			<div class="row" >
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<td></td>
								<td>Jumlah Pesan</td>
								<td>Banyak Pesanan (PAKET)</td>
								<td>Jumlah Uang</td>
								<td>Keterangan</td>
							</tr>
						</thead>
						<tbody style="overflow: auto;max-height: 500px" id="_listDetail2_">
						</tbody>
						<tfoot>
							<tr id="form-detail2">
								<td>
								</td>
								<td>
									<label class="input">
										<input class="text-align-right" type="text" id="dtl_tblobyekrestorandet_jmlhpesan" placeholder="Jumlah Pesan">
										<i class="icon-prepend fa fa-square "></i>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="text-align-right" type="text" id="dtl_tblobyekrestorandet_jmlhpesanan" placeholder="Banyak Pesanan">
										<i class="icon-prepend fa fa-square "></i>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="text-align-right format-rupiah" type="text" id="dtl_tblobyekrestorandet_jmlhuang" placeholder="Jumlah Uang">
										<i class="icon-prepend fa fa-money "></i>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="" type="text" id="dtl_tblobyekrestorandet_keterangan2" placeholder="Keterangan">
										<i class="icon-append fa fa-square "></i>
									</label>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<a class="pull-right btn btn-sm btn-success" onclick="tambahDetail('C')"><i class="fa fa-plus"></i> Perbaharui Data</a>
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
	/*$(function() {
		operation = "A"; //"A"=Adding; "E"=Editing
		selected_index = -1; //Index of the selected list item
		localStorage.getItem("tblobyekrestorandet") = '[]';
		tblobyekrestorandet = localStorage.getItem("tblobyekrestorandet");//Retrieve the stored data
		tblobyekrestorandet = JSON.parse(tblobyekrestorandet); //Converts string to object
		if(tblobyekrestorandet == null) //If there is no data, initialize an empty array
			tblobyekrestorandet = [];

		listDetail();
	});*/

	function tambahDetail(type) {
			var jmlhmeja = type=='R' ? $("#dtl_tblobyekrestorandet_jmlhmeja").val() : $("#dtl_tblobyekrestorandet_jmlhpesan").val();
			var jmlhkursi = type=='R' ? $("#dtl_tblobyekrestorandet_jmlhkursi").val() : $("#dtl_tblobyekrestorandet_jmlhpesanan").val();
			var pengunjung = type=='R' ? $("#dtl_tblobyekrestorandet_pengunjung").val() : toAngka($("#dtl_tblobyekrestorandet_jmlhuang").val());
			var keterangan = type=='R' ? $("#dtl_tblobyekrestorandet_keterangan").val() : $("#dtl_tblobyekrestorandet_keterangan2").val();
			rs = {
				"tblobyekrestorandet_jmlhmeja": jmlhmeja
				,"tblobyekrestorandet_jmlhkursi": jmlhkursi
				,"tblobyekrestorandet_pengunjung": (pengunjung)
				,"tblobyekrestorandet_keterangan": (keterangan)
				,"tblobyekrestorandet_jenis": (type)
			};

			if (operation=='E') {
				tblobyekrestorandet[selected_index] = rs;
				operation = 'A';
			} else if (operation=='A') {
				tblobyekrestorandet.push( rs );
			}
			localStorage["tblobyekrestorandet"] = JSON.stringify( tblobyekrestorandet );
			$("#form-detail input, #form-detail select").val('');
			$("#form-detail2 input, #form-detail2 select").val('');
			listDetail();
			window.selected_index = -1;
	}

	function editDetail(selected_index, type){
		$("#form-detail input, #form-detail select").val('');
		operation = "E"; //Edit
		window.selected_index = selected_index;
		// console.log('edit => '+window.selected_index);
		rs = tblobyekrestorandet[selected_index];


		if (type=='R') {
			$("#dtl_tblobyekrestorandet_jmlhmeja").val(rs.tblobyekrestorandet_jmlhmeja);
			$("#dtl_tblobyekrestorandet_jmlhkursi").val(rs.tblobyekrestorandet_jmlhkursi);
			$("#dtl_tblobyekrestorandet_pengunjung").val(parseInt(rs.tblobyekrestorandet_pengunjung));
			$("#dtl_tblobyekrestorandet_keterangan").val(parseInt(rs.tblobyekrestorandet_keterangan));
		} else {
			$("#dtl_tblobyekrestorandet_jmlhpesan").val(rs.tblobyekrestorandet_jmlhmeja);
			$("#dtl_tblobyekrestorandet_jmlhpesanan").val(rs.tblobyekrestorandet_jmlhkursi);
			$("#dtl_tblobyekrestorandet_jmlhuang").val(parseInt(rs.tblobyekrestorandet_pengunjung));
			$("#dtl_tblobyekrestorandet_keterangan2").val((rs.tblobyekrestorandet_keterangan));
		}
		setPriceFormat();
	 	return true;
	}

	function hapusDetail(selected_index) {
		tblobyekrestorandet.splice(selected_index, 1);
		localStorage.setItem("tblobyekrestorandet", JSON.stringify(tblobyekrestorandet));
		listDetail();
	}

	function listDetail() {
		$("#_listDetail_").html("");
		$("#_listDetail2_").html("");
		tblobyekrestorandet = JSON.parse(localStorage["tblobyekrestorandet"]);
		for(var i in tblobyekrestorandet){ 
			var rs = (tblobyekrestorandet[i]);
			if (rs.tblobyekrestorandet_jenis=='R') {
				$("#_listDetail_").append(
					'<tr>'
						+'<td><a class="btn btn-sm btn-warning  btn-circle" onclick="editDetail('+i+')"><i class="fa fa-pencil"></i></a>'
						+'<a class="btn btn-sm  btn-danger btn-circle" onclick="hapusDetail('+i+')"><i class="fa fa-times"></i></a></td>'
						+'<td><div align="right">'+formatRibuan(rs.tblobyekrestorandet_jmlhmeja) +'</div></td>'
						+'<td><div align="right">'+formatRibuan(rs.tblobyekrestorandet_jmlhkursi) +'</div></td>'
						+'<td><div align="right">'+formatRibuan((rs.tblobyekrestorandet_pengunjung)) +'</div></td>'
						+'<td><div align="right">'+((rs.tblobyekrestorandet_keterangan)) +'</div></td>'
					+'</tr>'
				);
			} else {
				$("#_listDetail2_").append(
					'<tr>'
						+'<td><a class="btn btn-sm btn-warning  btn-circle" onclick="editDetail('+i+')"><i class="fa fa-pencil"></i></a>'
						+'<a class="btn btn-sm  btn-danger btn-circle" onclick="hapusDetail('+i+')"><i class="fa fa-times"></i></a></td>'
						+'<td><div align="right">'+formatRibuan(rs.tblobyekrestorandet_jmlhmeja) +'</div></td>'
						+'<td><div align="right">'+formatRibuan(rs.tblobyekrestorandet_jmlhkursi) +'</div></td>'
						+'<td><div align="right">'+formatRibuan((rs.tblobyekrestorandet_pengunjung)) +'</div></td>'
						+'<td><div align="right">'+((rs.tblobyekrestorandet_keterangan)) +'</div></td>'
					+'</tr>'
				);
			}
		}
		setPriceFormat();
	}

	function updateDetail(){
		jnskmr = $("#dtl_tblobyekrestorandet_kamar").val();
		jmlkmr = $("#dtl_tblobyekrestorandet_jumlkamar").val();
		
		localStorage.setItem("tblobyekrestorandet", JSON.stringify(tblobyekrestorandet));
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
		localStorage.setItem("tblobyekrestorandet",'[]');
		tblobyekrestorandet = localStorage.getItem("tblobyekrestorandet");//Retrieve the stored data
		tblobyekrestorandet = JSON.parse(tblobyekrestorandet); //Converts string to object
		if(tblobyekrestorandet == null) //If there is no data, initialize an empty array
			tblobyekrestorandet = [];
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
				"param[refgolrestoran_id]" : {
					required : true
				}
				,"param[tblobyekhotel_jumlahpegawai]" : {
					required : true
					,digits : true
				}
			},

			// Messages for form validation
			messages : {
				"param[refgolrestoran_id]" : {
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
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/detail_obyek/simpanRestoran',
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
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/detail_obyek/simpanDetailRestoran',
			type: 'POST',
			dataType: 'json',
			data: {
				tblobyekrestoran_id: id
				,tblobyekrestorandet: localStorage.getItem("tblobyekrestorandet")
			},
			success: function(respon) {
				localStorage.setItem("tblobyekrestorandet","[]");
				tblobyekrestorandet = [];
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
					localStorage["tblobyekrestorandet"] = JSON.stringify( respon.details );
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
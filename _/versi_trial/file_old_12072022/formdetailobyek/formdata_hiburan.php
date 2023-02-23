<form id="form-pendataan" class="smart-form">
	<fieldset id="sss">
		<div>
			<div class="">
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">1. Hiburan yang diselenggarakan</label>
					</div>
					<div class="col col-6">
						<label class="select">
							<select name="param[refjenishiburan_id]" class="select2" id="refjenishiburan_id">
								<option selected="" value="">= Pilih Jenis Hiburan =</option>
								<?php $data['list_jenis'] = Yii::app()->db
								->createCommand()->select('*')->from('refjenishiburan')->where('refjenishiburan_isaktif="T"')->order('refjenishiburan_kode')->queryAll(); ?>
								<?php foreach ($data['list_jenis'] as $refjenishiburan): ?>
									<option value="<?= $refjenishiburan['refjenishiburan_id'] ?>">[<?= $refjenishiburan['refjenishiburan_kode'] ?>] <?= $refjenishiburan['refjenishiburan_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</label>
					</div>
				</div>

				<br>
			</div>

			<div class="row" >
				<div class="col col-6">
					<label for="label" class="input">2. Harga Tanda Masuk yang berlaku</label>
				</div>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<td></td>
							<td>Jenis Tiket</td>
							<td>Tarif (Rp)</td>
							<td>Waktu Pelaksanaan</td>
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
									<input class="" type="text" id="dtl_tblobyekhiburandet_kelas" placeholder="Jenis">
									<i class="icon-append fa fa-square "></i>
								</label>
							</td>
							<td>
								<label class="input">
									<input class="format-rupiah text-align-right" type="text" id="dtl_tblobyekhiburandet_tarif" placeholder="Tarif (Rp)">
									<i class="icon-prepend fa fa-money "></i>
								</label>
							</td>
							<td>
								<label class="input">
								<input value="<?= date('d-m-Y') ?>" class="datepicker" data-dateformat="dd-mm-yy" type="text" name="param[dtl_tblobyekhiburandet_tanggal]" id="dtl_tblobyekhiburandet_tanggal" placeholder="Tanggal Pendataan" />
									<i class="icon-append fa fa-calendar "></i>
								</label>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<a class="pull-right btn btn-sm btn-success" onclick="tambahDetail()"><i class="fa fa-plus"></i> Perbaharui Data</a>
							</td>
							<td></td>
						</tr>
					</tfoot>
				</table>
			</div>
			<br>
			<div class="">
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">3. Jumlah Pertunjukan rata-rata pada hari biasa</label>
					</div>
					<div class="col col-3">
						<label class="input">
							<input class="format-ribuan text-align-right" type="text" id="tblobyekhiburan_tarijmlhhari" name="param[tblobyekhiburan_tarijmlhhari]" placeholder="">
							<i class="icon-prepend fa fa-square "></i>
						</label>
					</div>
				</div>
				<br>
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">Jumlah Pertunjukan rata-rata pada hari Libur/Minggu</label>
					</div>
					<div class="col col-3">
						<label class="input">
							<input class="format-ribuan text-align-right" type="text" id="tblobyekhiburan_tarijmlhlibur" name="param[tblobyekhiburan_tarijmlhlibur]" placeholder="">
							<i class="icon-prepend fa fa-square "></i>
						</label>
					</div>
				</div>
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input"><em>(Khusus untuk pertunjukan film, kesenian, dan sejenisnya)</em></label>
					</div>
				</div>
				<br>
			</div>
			<br>
			<div class="">
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">4. Jumlah Pertunjukan rata-rata pada hari biasa</label>
					</div>
					<div class="col col-3">
						<label class="input">
							<input class="format-ribuan text-align-right" type="text" id="tblobyekhiburan_jmlhhari" name="param[tblobyekhiburan_jmlhhari]" placeholder="">
							<i class="icon-prepend fa fa-square "></i>
						</label>
					</div>
				</div>
				<br>
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">Jumlah Pertunjukan rata-rata pada hari Libur/Minggu</label>
					</div>
					<div class="col col-3">
						<label class="input">
							<input class="format-ribuan text-align-right" type="text" id="tblobyekhiburan_jmlhlibur" name="param[tblobyekhiburan_jmlhlibur]" placeholder="">
							<i class="icon-prepend fa fa-square "></i>
						</label>
					</div>
				</div>

				<br>
			</div>
			<br>
			<div class="">
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">5. Jumlah Mesin/Meja</label>
					</div>
					<div class="col col-3">
						<label class="input">
							<input class="format-ribuan text-align-right" type="text" id="tblobyekhiburan_jmlhmesin" name="param[tblobyekhiburan_jmlhmesin]" placeholder="">
							<i class="icon-prepend fa fa-square "></i>
						</label>
					</div>
				</div>
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input"><em>Khusus untuk bilyard dan permainan ketangkasan</em></label>
					</div>
				</div>
				<br>
			</div>
			<div class="">
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">6. Jumlah Ruangan/Kamar</label>
					</div>
					<div class="col col-3">
						<label class="input">
							<input class="format-ribuan text-align-right" type="text" id="tblobyekhiburan_jmlhkamar" name="param[tblobyekhiburan_jmlhkamar]" placeholder="">
							<i class="icon-prepend fa fa-square "></i>
						</label>
					</div>
				</div>
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input"><em>Khusus untuk panti Pijat, Mandi uap dan Karaoke</em></label>
					</div>
				</div>
				<br>
			</div>
			<div class="">
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">7. Apakah perusahaan menyediakan karcis Bebas (Free) kepada orang-orang tertentu?</label>
					</div>
					<div class="col col-3">
						<label class="checkbox">
							<input name="param[tblobyekhiburan_iskarcisfree]" value="F" type="hidden">
							<input name="param[tblobyekhiburan_iskarcisfree]" value="T" id="f_tblobyekhiburan_iskarcisfree" type="checkbox"></input><i></i> Ya
						</label>
					</div>
				</div>
				<br>
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input"><em>Jika Ya, berapa jumlah yang beredar?</em></label>
					</div>
					<div class="col col-3">
						<label class="input">
							<input class="format-ribuan text-align-right" type="text" id="tblobyekhiburan_jmlhkarcisfree" name="param[tblobyekhiburan_jmlhkarcisfree]" placeholder="">
							<i class="icon-prepend fa fa-square "></i>
						</label>
					</div>
				</div>
			</div>
			<br>
			<div class="">
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">7. Apakah penjualan karcis menggunakan mesin tiket?</label>
					</div>
					<div class="col col-3">
						<label class="checkbox">
							<input name="param[tblobyekhiburan_ismesinkarcis]" value="F" type="hidden">
							<input name="param[tblobyekhiburan_ismesinkarcis]" value="T" id="f_tblobyekhiburan_ismesinkarcis" type="checkbox"></input><i></i> Ya
						</label>
					</div>
				</div>
				<br>
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">Melaksanakan Pencatatan/Pembukuan?</label>
					</div>
					<div class="col col-3">
						<label class="checkbox">
							<input name="param[tblobyekhiburan_ispembukuan]" value="F" type="hidden">
							<input name="param[tblobyekhiburan_ispembukuan]" value="T" id="f_tblobyekhiburan_ispembukuan" type="checkbox"></input><i></i> Ya
						</label>
					</div>
				</div>
			</div>
			<br>
			<div class="">
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">8. Koordinat Lokasi Hiburan</label>
					</div>
					<div class="col col-3">
						<label for="label" class="input">Latitude</label>
						<label class="input">
							<input class="text-align-right" type="text" name="param[tblobyekhiburan_latitude]" id="tblobyekhiburan_latitude" placeholder="Latitude" />
							<i class="icon-prepend fa fa-map-marker "></i>
						</label>
					</div>
					<div class="col col-3">
						<label for="label" class="input">Longitude</label>
						<label class="input">
							<input class="text-align-right" type="text" name="param[tblobyekhiburan_longitude]" id="tblobyekhiburan_longitude" placeholder="Longitude" />
							<i class="icon-prepend fa fa-map-marker "></i>
						</label>
					</div>
				</div>
			</div>
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
		/*tblobyekhiburandet = localStorage.getItem("tblobyekhiburandet");//Retrieve the stored data
		tblobyekhiburandet = JSON.parse(tblobyekhiburandet); //Converts string to object
		if(tblobyekhiburandet == null) //If there is no data, initialize an empty array
			tblobyekhiburandet = [];

		listDetail();*/
	});

	function tambahDetail() {
			kelas = $("#dtl_tblobyekhiburandet_kelas").val();
			tarif = $("#dtl_tblobyekhiburandet_tarif").val();
			tanggal = $("#dtl_tblobyekhiburandet_tanggal").val();
			rs = {
				"tblobyekhiburandet_kelas":kelas
				,"tblobyekhiburandet_tarif": toAngka(tarif)
			};

			if (operation=='E') {
				tblobyekhiburandet[selected_index] = rs;
				operation = 'A';
			} else if (operation=='A') {
				tblobyekhiburandet.push( rs );
			}
			localStorage["tblobyekhiburandet"] = JSON.stringify( tblobyekhiburandet );
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
		rs = tblobyekhiburandet[selected_index];

		$("#dtl_tblobyekhiburandet_kelas").val(rs.tblobyekhiburandet_kelas);
		$("#dtl_tblobyekhiburandet_tarif").val(parseInt(rs.tblobyekhiburandet_tarif));
		$("#dtl_tblobyekhiburandet_tanggal").val(tblobyekhiburandet_tanggal);
		setPriceFormat();
	 	return true;
	}

	function hapusDetail(selected_index) {
		tblobyekhiburandet.splice(selected_index, 1);
		localStorage.setItem("tblobyekhiburandet", JSON.stringify(tblobyekhiburandet));
		listDetail();
	}

	function listDetail() {
		$("#_listDetail_").html("");
		tblobyekhiburandet = JSON.parse(localStorage["tblobyekhiburandet"]);
		for(var i in tblobyekhiburandet){ 
			var rs = (tblobyekhiburandet[i]);
			$("#_listDetail_").append(
				'<tr>'
					+'<td><a class="btn btn-sm btn-warning  btn-circle" onclick="editDetail('+i+')"><i class="fa fa-pencil"></i></a>'
					+'<a class="btn btn-sm  btn-danger btn-circle" onclick="hapusDetail('+i+')"><i class="fa fa-times"></i></a></td>'
					+'<td>'+rs.tblobyekhiburandet_kelas+'</td>'
					+'<td><div align="right">'+formatRibuan(rs.tblobyekhiburandet_tarif) +'</div></td>'
				+'</tr>'
			);
		}
		setPriceFormat();
	}

	function updateDetail(){
		/*jnskmr = $("#dtl_tblobyekhiburandet_bulan").select2('val');
		jmlkmr = $("#dtl_tblobyekhiburandet_jumlkamar").val();*/
		
		localStorage.setItem("tblobyekhiburandet", JSON.stringify(tblobyekhiburandet));
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
		localStorage.setItem("tblobyekhiburandet",'[]');
		tblobyekhiburandet = localStorage.getItem("tblobyekhiburandet");//Retrieve the stored data
		tblobyekhiburandet = JSON.parse(tblobyekhiburandet); //Converts string to object
		if(tblobyekhiburandet == null) //If there is no data, initialize an empty array
			tblobyekhiburandet = [];
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
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/detail_obyek/simpanHiburan',
			type: 'POST',
			dataType: 'json',
			data: $("#form-pendataan").serialize()+'&'+jQuery.param(addparam),
			success: function(respon) {
				if (respon.status=='success') {
					$("#modalDetailObyek").modal('hide');
					notifikasi('Berhasil','Pendataan detail obyek berhasil dientrikan ke sistem','success',1,0);
					simpanDetailHiburan(respon.pk);
					setTimeout(function() {
						// detailIzinPemohon(window.idpemohon);
					}, 1000);
				} else {
				}
			}
		});
	}
	
	function simpanDetailHiburan(id) {
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/detail_obyek/simpanDetailHiburan',
			type: 'POST',
			dataType: 'json',
			data: {
				tblobyekhiburan_id: id
				,tblobyekhiburandet: localStorage.getItem("tblobyekhiburandet")
			},
			success: function(respon) {
				localStorage.setItem("tblobyekhiburandet","[]");
				tblobyekhiburandet = [];
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
					localStorage["tblobyekhiburandet"] = JSON.stringify( respon.details );
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
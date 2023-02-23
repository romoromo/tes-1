<form id="form-pendataan" class="smart-form">
	<fieldset id="sss">
		<div>
			<div class="row" >
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<td></td>
								<td>Nama Bahan</td>
								<td>Volume/Tonase (M3/Ton)</td>
								<td>Harga Pasar/Nilai Strategis</td>
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
										<select name="param[refjenisbahanc_id]" class="select2" id="refjenisbahanc_id">
										<option selected="" value="">= Pilih Bahan =</option>
											<?php $data['list_jenisbhn'] = Yii::app()->db
											->createCommand()->select('*')->from('refjenisbahanc')->queryAll(); ?>
											<?php foreach ($data['list_jenisbhn'] as $refjenisbahanc): ?>
												<option value="<?= $refjenisbahanc['refjenisbahanc_id'] ?>"><?= $refjenisbahanc['refjenisbahanc_nama'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="text-align-right format-desimal" type="text" name="param[tblobyekgalianc_volume]" id="tblobyekgalianc_volume" placeholder="Volume">
										<i class="icon-prepend fa fa-square "></i>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="text-align-right format-rupiah" type="text" name="param[tblobyekgalianc_harga]" id="tblobyekgalianc_harga" placeholder="Harga Pasar">
										<i class="icon-prepend fa fa-square "></i>
									</label>
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<button class="pull-right btn btn-sm btn-success" type="submit"><i class="fa fa-plus"></i> Perbaharui Data</button>
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
		
		<button type="button" class="btn btn-default" data-dismiss="modal">
			Tutup/Batal
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
			bahan = $("#tblobyekgalianc_bahan").val();
			volume = $("#tblobyekgalianc_volume").val();
			harga = $("#tblobyekgalianc_harga").val();
			rs = {
				"tblobyekgalianc_bahan": bahan
				,"tblobyekgalianc_volume": toAngka(volume)
				,"tblobyekgalianc_harga": toAngka(harga)
			};

			if (operation=='E') {
				tblobyekwaletdet[selected_index] = rs;
				operation = 'A';
			} else if (operation=='A') {
				tblobyekwaletdet.push( rs );
			}
			
			$("#form-detail input, #form-detail select").val('');
			$("#form-detail .select2").select2('val','1');
			listDetail();
			window.selected_index = -1;
	}

	function editDetail(selected_index){
		$("#form-detail input, #form-detail select").val('');
		operation = "E"; //Edit
		// window.selected_index = selected_index;
		window.cmddtlo = 'edit';
		window.idobydetil = selected_index;
		// console.log('edit => '+window.selected_index);
		getData(selected_index);
	 	return true;
	}

	function hapusDetail(selected_index) {
		$.SmartMessageBox({
			title : "Konfirmasi Hapus", // judul Smart Alert
			content : "Apakah anda yakin akan menghapus detail parkir ini?", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'pendaftaran/detail_obyek/hapusGalianC',
					type: 'post',
					dataType: 'json',
					data: {
						id: senc(selected_index.toString()),
					},
					success: function (respon) {
						if(respon.status=='success') {
							notifikasi('Sukses','Data detail obyek berhasil dihapus', 'success',1,0);
							listDetail();
						} else {
							notifikasi('Gagal','Data detail obyek gagal dihapus', 'fail',1,0);
						}
					}
				});

			}

		});
	}

	function listDetail() {
		$("#_listDetail_").html("");
		$.ajax({
			url: 'pendaftaran/detail_obyek/getDataGalianC',
			type: 'POST',
			dataType: 'json',
			data: {id: '<?= base64_encode($data['obyek_id']) ?>'},
			success: function(respon) {
				for(var i in respon){ 
					var rs = (respon[i]);
					$("#_listDetail_").append(
						'<tr>'
							+'<td><a class="btn btn-sm btn-warning  btn-circle" onclick="editDetail('+rs.tblobyekgalianc_id+')"><i class="fa fa-pencil"></i></a>'
							+'<a class="btn btn-sm  btn-danger btn-circle" onclick="hapusDetail('+rs.tblobyekgalianc_id+')"><i class="fa fa-times"></i></a></td>'
							+'<td>'+rs.refjenisbahanc_nama+'</td>'
							+'<td><div align="right">'+formatRibuan(rs.tblobyekgalianc_volume) +'</div></td>'
							+'<td><div align="right">'+formatRibuan(rs.tblobyekgalianc_harga) +'</div></td>'
						+'</tr>'
					);
				}
			}
		});
		
		setPriceFormat();
	}

	function updateDetail(){
		/*jnskmr = $("#tblobyekwaletdet_bulan").select2('val');
		jmlkmr = $("#tblobyekwaletdet_jumlkamar").val();*/
		
		localStorage.setItem("tblobyekwaletdet", JSON.stringify(tblobyekwaletdet));
		operation = "A"; //Return to default value
		return true;
	}
	jQuery(document).ready(function($) {
		setPriceFormat();
		pageSetUp();
		window.cmddtlo = 'tambah';
		listDetail();

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
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/detail_obyek/simpanGalianC',
			type: 'POST',
			dataType: 'json',
			data: $("#form-pendataan").serialize()+'&'+jQuery.param(addparam),
			success: function(respon) {
				if (respon.status=='success') {
					// $("#modalDetailObyek").modal('hide');
					notifikasi('Berhasil','Pendataan detail obyek berhasil dientrikan ke sistem','success',1,0);
					$("#form-detail input, #form-detail select").val('');
					$("#form-detail .select2").select2('val','1');
					listDetail();

					if (cmddtlo=='edit') {
						window.cmddtlo ='tambah';
					}
				} else {
				}
			}
		});
	}

	function getData(id) {
		$.ajax({
			url: 'pendaftaran/detail_obyek/getdata',
			type: 'post',
			dataType: 'json',
			data: {
				id: id,
				xtbx: '<?= base64_encode($data['tblname']) ?>'
			},
			success: function (respon) {
				window.idobydetil = id;
				window.respon = respon;
				exclude = [];
				toTGL = [];
				toDuit = ['tblobyekgalianc_tarif'];
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
				setPriceFormat();

				//load detail if have key 'details'
				if (respon.hasOwnProperty('details')) {
					// localStorage["tblobyekwaletdet"] = JSON.stringify( respon.details );
					// listDetail();
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
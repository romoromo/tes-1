<_?php define('ASSETS_URL', 'themes/smartadmin')?>

<div class="well well-sm well-light text-center">
	<h4><i class="fa fa-tasks"></i> Referensi Modul</h4>
</div>

<!--  -->
<section>
	<div class="well">
		<div class="row">
			<div class="col-md-12">
				<div class="widget-body-toolbar">
					<div class="pencarian" style="margin-top: -4px;">
						<button class="btn btn-primary" data-toggle="modal" style="float: right;" id="button_cari" onclick="$('#cari').show(400);$('#button_tutup').show();$('#button_cari').hide();">
							<i class="fa  fa-search"></i>	Pencarian / Filter Data
						</button>	
						<button class="btn btn-primary" data-toggle="modal" style="float: right; display:none" onclick="$('#cari').hide(400);$('#button_cari').show();$('#button_tutup').hide();" id="button_tutup">
							<i class="fa  fa-times"></i>	Tutup Pencarian / Filter
						</button>
					</div>					
				</div>
				<div class="widget-body slideInRight fast animated" id="cari" style="display:none" >
					<form class="smart-form" novalidate="novalidate">
						<fieldset>
							<section>
								<div class="row">
									<div class="col col-6">
										<h3>Pencarian</h3>
									</div>
								</div>
							</section>
							<_?php /* <section>
								<div class="col col-2">
								</div>
								<div class="inline-group">
									<label class="radio">
										<input type="radio" name="Aktif" id="isYa" value="T">
										<i></i> Ya 
									</label>
									<label class="radio">
										<input type="radio" name="Aktif" id="isTidak" value="F">
										<i></i> Tidak
									</label>
								</div>
							</section> */ ?>
							<section>
								<div class="row">
									<div class="col col-2">
										Combo Box
									</div>
									<div class="col col-6">
										<label class="select">
											<select name="cari_refskpd_id" id="cari_refskpd_id" class="select2">
												<option value="">- Pilih Combo Box -</option>
												<_?php //foreach ($data['list_skpd'] as $opSKPD): ?>
												<option value="<_?php //echo $opSKPD['refskpd_id'] ?>">[<_?php //echo $opSKPD['refskpd_kode'] ?>] <_?php //echo $opSKPD['refskpd_nama'] ?></option>
												<_?php //endforeach ?>
												<
											</select>
										</label>
									</div>
								</div>
							</section>

							<section>
								<div class="row">
									<div class="col col-2">
										Sub Combo Box
									</div>
									<div class="col col-6">
										<label class="select">
											<select name="cari_refkelompokdata_id" id="cari_refkelompokdata_id" class="select2">
												<option value="">- Pilih Sub Combo Box -</option>
											</select>
										</label>
									</div>
								</div>
							</section>

							<section>
								<div class="row">
									<div class="col col-2">
										Kode/Uraian
									</div>
									<div class="col col-3">
										<label class="input">
											<input type="text" name="cari_refindikator_kode" id="cari_refindikator_kode">
										</label>
									</div>
								</div>
							</section>

							<section>
								<button type="button" class="btn btn-sm btn-info" onclick="cari()">
									<i class="fa fa-search"></i>
									Cari
								</button>
							</section>	
						</fieldset>
					</form>
				</div>
			</div>
		</div>	
	</div>
</section>
<!--  -->

<section id="widget-grid" class="">
	<div class="well well-sm well-light">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-fsdfgs12441278"
					data-widget-editbutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-sortable="false"
					>
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>Data Grid</h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">

						</div>
						<div class="widget-body no-padding">
							<div class="widget-body-toolbar">
								<button class="btn btn-primary" onclick="tambah()"> <i class="fa fa-plus"></i> Tambah Data</button>
							</div>
							<div id="kontrol_table">
								<table id="dt_pipeline" class="table table-striped table-bordered table-hover" width="100%">
									<thead>
										<tr>
											<th width="10%" data-hide="phone"></th>
											<th width="5%" data-hide="phone">NO</th>
											<th width="25%" data-class="expand">SKPD</th>
											<th data-hide="phone">KEL. DATA</th>
											<th data-hide="phone, tablet">KODE INDIKATOR</th>
											<th data-hide="phone, tablet">URAIAN INDIKATOR</th>
											<th data-hide="phone, tablet">STATUS</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="modul-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Referensi Modul
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form id="form-data" class="smart-form">

					<fieldset>

						<section id="sec_skpd">
							<div class="row">
								<label class="label col col-4">Combo Box</label>
								<div class="col col-10">
									<label class="select">
										<select class="select2" name="param[refskpd_id]" id="refskpd_id">
											<option value="">=== Pilih Combo Box ===</option>
											<_?php //foreach ($data['list_skpd'] as $list) : ?>
												<option value="<_?php //echo $list['refskpd_id'] ?>">[<_?php //echo $list['refskpd_kode'] ?>] <_?php //echo $list['refskpd_nama'] ?></option>
											<_?php //endforeach ?>
										</select>
									</label>

								</div>
							</div>
						</section>

						<section id="sec_skpd">
							<div class="row">
								<label class="label col col-4">Sub Combo Box</label>
								<div class="col col-10">
									<label class="select">
										<select class="select2" name="param[refkelompokdata_id]" id="refkelompokdata_id">
											<option value="">=== Pilih Sub Combo Box ===</option>
										</select>
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">KODE</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input value="" type="text" name="param[refindikator_kode]" id="refindikator_kode">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">URAIAN</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input value="" type="text" name="param[refindikator_nama]" id="refindikator_nama">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Status</label>
								<div class="col col-10">
									<div class="inline-group">
										<label class="radio">
										<input type="radio" class="refindikator_isaktif" name="param[refindikator_isaktif]" id="isT" value="T">
											<i></i> Aktif
										</label>
										<label class="radio">
										<input type="radio" class="refindikator_isaktif" name="param[refindikator_isaktif]" id="isF" value="F">
											<i></i> Tidak Aktif
										</label>
									</div>
								</div>
							</div>
						</section>

					</fieldset>

					<footer>
						<div class="col col-12">
							<label class="textarea">
								<ol>
									<_?php /*<li>Petunjuk ...</li>*/ ?>
								</ol>
							</label>
						</div>

						<button id="btn-simpan" type="submit" class="btn btn-primary">
							Simpan
						</button>
						<button type="reset" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>

					</footer>
				</form>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
	pageSetUp();

	jQuery(document).ready(function($) {
		loadDataTable();
	});

	function loadDataTable() {
		var param = {
			cari_refskpd_id : $("#cari_refskpd_id").val()!=null ? $("#cari_refskpd_id").val() : ""
			,cari_refkelompokdata_id : $("#cari_refkelompokdata_id").val()!=null ? $("#cari_refkelompokdata_id").val() : ""
			,cari_refindikator_kode : $("#cari_refindikator_kode").val()!=null ? $("#cari_refindikator_kode").val() : ""
		};
		var url_param = jQuery.param(param);
		var totalRecords = <_?php echo $data['total_data'] ?>; // total no of records
		var ajaxUrl = "master/indikator/DTJSON?"+url_param // url that fetches the data for the table
		// drawTable($('#dt_basic_pipeline'), 1, totalRecords, ajaxUrl);  //Initializes the datatable
		COLUMN  = [
			{ "data": "refindikator_id", "render": function ( data, type, row, meta ) {
				return '<button rel="tooltip" data-placement="right" data-original-title="Digunakan untuk mengedit data"  class="btn btn-circle btn-warning btn-sm" onclick="edit(\''+row.refindikator_id+'\')"><i class="fa fa-pencil"></i></button>'
				+'<button rel="tooltip" data-placement="right" data-original-title="Digunakan untuk menghapus data"  class="btn btn-circle btn-danger btn-sm" onclick="hapus(\''+row.refindikator_id+'\')"><i class="fa fa-times"></i></button>'
				;
			 }
			}
			,{ "data": "num", "orderable": false }
			,{ "data": "refskpd_nama", "orderable": false }
			,{ "data": "refkelompokdata_nama" ,"orderable": false }
			,{ "data": "refindikator_kode" ,"orderable": false }
			,{ "data": "refindikator_nama" ,"orderable": false }
			,{ "data": "refindikator_isaktif" ,"orderable": false, "render": function ( data, type, row, meta ) {
				return data=='T' ? 'Aktif' : 'Tidak Aktif';
			 }
			}
		];
		ORDERS = [
		[ 2, "asc" ]
		];
		drawTablePipeLine($('#dt_pipeline'), 1, totalRecords, ajaxUrl,COLUMN,ORDERS, pageSetUp);  //Initializes the datatable
	}

	/*form validation*/
	loadScript("<_?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		var $FormData = $("#form-data").validate({
				// Rules for form validation
				rules : {
					"param[refskpd_id]" : {
						required : true
					}
					,"param[refkelompokdata_id]" : {
						required : true
					}
					,"param[refindikator_kode]" : {
						required : true
					},"param[refindikator_nama]" : {
						required : true
					}
				},

				// Messages for form validation
				messages : {
					"param[refskpd_id]" : {
						required : "Mohon pilih SKPD"
					}
					,"param[refkelompokdata_id]" : {
						required : "Mohon pilih Kelompok Data"
					}
					,"param[refindikator_kode]" : {
						required : "Mohon isikan kode indikator"
					},"param[refindikator_nama]" : {
						required : "Mohon isikan nama indikator"
					}
				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				},
				submitHandler : function(form) {
					// saat validasi benar semua, jalankan simpan()
					return simpan();
				}
			});

	};
	/*//form validation*/
	/*CRUD*/
	function tambah () {
		window.cmd = "tambah";
		window.id = '';
		$("#cmd").val("tambah");
		$("#form-data")[0].reset();
		$("#form-data .select2").select2('val','');
		$("#modul-form").modal("show");

	}

	function edit (id) {
		window.id = id;
		window.cmd = "edit";
		$("#form-data")[0].reset();
		$("#form-data .select2").select2('val','');
		$.ajax({
			url: 'master/indikator/getdata',
			type: 'post',
			dataType: "json",
			data: {
				id: id,
			},
			success:function(respon) {
				window.respon = respon;
				exclude = [];
				$.each(respon, function(index, val) {
					if(!inArray(index,exclude)) {
		 				$("#"+index).val(respon[index]);
		 				$("#"+index).select2('val',respon[index]!="0" ? respon[index] : "");
		 				$("input[type=radio][value='"+respon[index]+"']."+index).prop('checked', true); //pilih radio button
					}
				});
				getKelompokDataBySKPD(respon.refskpd_id, 'refkelompokdata_id', respon.refkelompokdata_id)
			}
		});

		$("#modul-form").modal("show");
	}

	function simpan () {
		$.ajax({
			url: 'master/indikator/simpan',
			type: 'post',
			dataType: 'json',
			data:  $("#form-data").serialize()+'&id='+window.id+'&cmd='+window.cmd,
			success: function(respon) {
				if (respon.status=="success") {
					$("#modul-form").modal("hide");
					notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
					loadDataTable();
				}
				else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
				}
			}
		});

		return false;
	}

	function hapus (id) {
		$.SmartMessageBox({
			title : "Konfirmasi Hapus", // judul Smart Alert
			content : "Apakah anda yakin akan menghapus data ini", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'master/indikator/hapus',
					type: 'post',
					dataType: 'json',
					data: {
						id: id,
					},
					success: function (respon) {
						if(respon.status=='success') {
							notifikasi('Sukses','Data berhasil dihapus', 'success',1,0);
							loadDataTable();
						} else {
							notifikasi('Gagal','Data gagal dihapus', 'fail',1,0);
						}
					}
				});

			}

		});
	}
	/*CRUD*/

	function cari() {
		window.cari_refskpd_id = $("#cari_refskpd_id").val()!=null ? $("#cari_refskpd_id").val() : "";
		window.cari_refkelompokdata_id = $("#cari_refkelompokdata_id").val()!=null ? $("#cari_refkelompokdata_id").val() : "";
		loadDataTable();
	}

	$("#cari_refskpd_id").change(function(event) {
		id = $("#cari_refskpd_id").select2('val');
		getKelompokDataBySKPD(id);
	});
	$("#refskpd_id").change(function(event) {
		id = $("#refskpd_id").select2('val');
		getKelompokDataBySKPD(id, 'refkelompokdata_id');
	});

	function getKelompokDataBySKPD(id, elm, setId) {
		if (elm==null) {
			elm = 'cari_refkelompokdata_id';
		}
		id = id!=null ? id : "";
		$("#"+elm).select2('val','');
		$.post('master/indikator/getKelompokDataBySKPD', {cari_refskpd_id: id}, function(json) {
			setSelectList(''+elm, 'Kelompok Data', json);
			if (setId!=null) {
				$("#"+elm).select2('val',setId);
			}
		});
	}
</script>
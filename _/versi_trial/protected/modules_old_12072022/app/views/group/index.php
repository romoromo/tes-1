<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light">
		<h1 align="center" class="page-title txt-color-blueDark"><i class="fa fa-group"></i>
		Setting Group Pengguna</h1>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="well">
			<div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Daftar Group Pengguna</h2>
				</header>
				<!-- widget div-->
				<div>
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
					</div>
					<!-- end widget edit box -->
					<!-- widget content -->
					<div class="widget-body no-padding">
						<div class="widget-body-toolbar">
							<button class="btn btn-primary" onclick="tambah()">
								<i class="fa fa-plus-square"></i>	Tambah
							</button>
						</div>
						<div id="listdata">
						<table id="dt_basic_pipeline" class="table table-striped table-bordered table-hover" width="100%">
							<thead>
								<tr>
									<th data-hide="phone">No</th>
									<th data-class="expand">Nama Group </th>
									<th data-hide="phone">Deskripsi</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
						</div>
					</div>
					<!-- end widget content -->
				</div>
				<!-- end widget div -->
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Group Pengguna
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form id="form-data" class="smart-form">

					<fieldset>


						<section>
							<div class="row">
								<label class="label col col-4">Nama Group</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-square"></i>
										<input value="" type="text" name="param[TBLROLE_CODE]" id="TBLROLE_CODE">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Deskripsi</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-square"></i>
										<input value="" type="text" name="param[TBLROLE_DESC]" id="TBLROLE_DESC">
									</label>
								</div>
							</div>
						</section>
					</fieldset>

					<footer>
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
// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();

	// PAGE RELATED SCRIPTS

	$(document).ready(function () {
		loadDataTable();
	});

	/*form validation*/
	loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		var $FormData = $("#form-data").validate({
				// Rules for form validation
				rules : {
					"param[TBLROLE_CODE]" : {
						required : true
					}
					,"param[TBLROLE_DESC]" : {
						required : true
					}
				},

				// Messages for form validation
				messages : {
					"param[TBLROLE_CODE]" : {
						required : 'Mohon isikan nama pengguna'
					}
					,"param[TBLROLE_DESC]" : {
						required : 'Mohon isikan deskripsi'
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

	function tambah () {
		window.cmd = "tambah";
		window.id = '';
		$("#cmd").val("tambah");
		$("#form-data")[0].reset();
		$("#form-data .select2").select2('val','');
		$("#modal-form").modal("show");

	}

	function edit (id) {
		window.id = id;
		window.cmd = "edit";
		$("#form-data")[0].reset();
		$("#form-data .select2").select2('val','');
		$.ajax({
			url: 'app/group/getdata',
			type: 'post',
			dataType: "json",
			data: {
				id: id,
			},
			success:function(respon) {
				window.respon = respon;
				$.each(respon, function(index, val) {
	 				$("#"+index).val(respon[index]);
	 				$("#"+index).select2('val',respon[index]!="0" ? respon[index] : "");
				});
			}
		});

		$("#modal-form").modal("show");
	}

	function simpan () {
		$.ajax({
			url: 'app/group/simpan',
			type: 'post',
			data:  $("#form-data").serialize()+'&id='+window.id+'&cmd='+window.cmd,
			success: function(data) {
				if (data=="success") {
					$("#modal-form").modal("hide");
					notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
					loadDataTable();
				}
				else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
				}
			}
		});
	}

	function hapus (id) {
		$.SmartMessageBox({
			title : "Konfirmasi Hapus", // judul Smart Alert
			content : "Apakah anda yakin akan menghapus data Pengguna ini", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'app/group/hapus',
					type: 'post',
					data: {
						id: id,
					},
					success: function (data) {
						if(data=='success') {
							notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
							loadDataTable();
						} else {
							notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
						}
					}
				});

			}

		});
	}

	function loadDataTable() {
		var totalRecords = <?php echo $data['total_data'] ?>; // total no of records
		var ajaxUrl = "app/group/DTJSON" // url that fetches the data for the table
		// drawTable($('#dt_basic_pipeline'), 1, totalRecords, ajaxUrl);  //Initializes the datatable
		COLUMN  = [
			{ "data": "num" }
			,{ "data": "TBLROLE_CODE" }
			,{ "data": "TBLROLE_DESC" }
			,{ "data": "TBLROLE_ID", "render": function ( data, type, full, meta ) {
				return '<div align="center"><a rel="tooltip" data-placement="left" data-original-title="Klik untuk mengedit data" onclick="edit('+data+')" class="btn btn-circle btn-primary"><i class="fa fa-pencil"></i></a>'
				+'&nbsp;<a rel="tooltip" data-placement="left" data-original-title="Klik untuk menghapus data" onclick="hapus('+data+')" class="btn btn-circle btn-danger"><i class="fa fa-trash-o"></i></a></div>';
			 }}
		];
		drawTablePipeLine($('#dt_basic_pipeline'), 10, totalRecords, ajaxUrl,COLUMN, pageSetUp);  //Initializes the datatable
	}

</script>
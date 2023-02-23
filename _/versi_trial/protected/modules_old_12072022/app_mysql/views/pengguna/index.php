<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light">
		<h1 align="center" class="page-title txt-color-blueDark"><i class="fa fa-user"></i>
		Setting Pengguna</h1>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="well">
			<div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Daftar Pengguna</h2>
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
									<th data-class="expand">Nama Pengguna </th>
									<th data-hide="phone">Username</th>
									<th data-hide="phone">Group</th>
									<th data-hide="phone,tablet">Email</th>
									<th data-hide="phone,tablet">No. Telepon</th>
									<th data-hide="phone,tablet">Status</th>
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
<div class="modal fade" id="pengguna-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Pengguna
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form id="form-data" class="smart-form">

					<fieldset>


						<section>
							<div class="row">
								<label class="label col col-4">Nama</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input value="" type="text" name="param[tblpengguna_nama]" id="tblpengguna_nama">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Username</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input value="" type="text" name="param[tblpengguna_username]" id="tblpengguna_username">
										<label class="txt-color-red" id="alertExist" style="display:none"><strong>Username sudah dipakai, mohon gunakan username lain</strong></label>
										<label class="txt-color-green" id="alertOk" style="display:none"><strong>Username belum dipakai</strong></label>
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Password</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-qrcode"></i>
										<input value="" type="password" name="param[tblpengguna_password]" id="tblpengguna_password">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Input Ulang Password</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-qrcode"></i>
										<input value="" type="password" name="param[rpassword]" id="rpassword">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Email</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input value="" type="email" name="param[tblpengguna_email]" id="tblpengguna_email">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Nomor Telepon</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-phone"></i>
										<input type="text" name="param[tblpengguna_notelp]" id="tblpengguna_notelp" class="valid">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Group</label>
								<div class="col col-10">
									<label class="select">
										<select class="select2" name="param[tblrole_id]" id="tblrole_id">
											<option selected="" value="">Pilih Group</option>
											<?php foreach ($data['role_list'] as $hakakses): ?>
											<option value="<?php echo $hakakses['tblrole_id']; ?>"><?php echo $hakakses['tblrole_code']; ?></option>
											<?php endforeach; ?>
										</select>
									</label>

								</div>
							</div>
						</section>

						<?php /*<section>
							<div class="row">
								<label class="label col col-4">Blok Sistem</label>
								<div class="col col-10">
									<label class="select">
										<select class="select2" name="param[tblkendalibloksistem_id]" id="tblkendalibloksistem_id">
											<option selected="" value="">Pilih Bloksistem</option>
											<?php foreach ($data['bloksistem'] as $bloksistem): ?>
												<option value="<?php echo $bloksistem['tblkendalibloksistem_id']; ?>"><?php echo $bloksistem['tblkendalibloksistem_nama']; ?></option>
											<?php endforeach ?>
										</select>
									</label>

								</div>
							</div>
						</section>*/ ?>

						<?php /*<section>
							<div class="row">
								<label class="label col col-4">Group Antrian</label>
								<div class="col col-10">
									<label class="select">
										<select class="select2" name="param[tblantriangroup_id]" id="tblantriangroup_id">
											<option value="">Pilih Group Antrian</option>
											<?php foreach ($data['antrian_group'] as $antriangroup): ?>
												<option value="<?php echo $antriangroup['tblantriangroup_id']; ?>"><?php echo $antriangroup['tblantriangroup_nama']; ?></option>
											<?php endforeach ?>
										</select>
									</label>
								</div>
							</div>
						</section>*/ ?>

						<section>
							<div class="row">
								<label class="label col col-4">Status Pengguna</label>
								<div class="col col-10">
									<label class="select"> <i class="icon-append fa fa-user"></i>
										<select name="param[tblpengguna_status]" id="tblpengguna_status">
											<option value="">Pilih Status</option>
											<option value="T">Aktif</option>
											<option value="F">Tidak Aktif</option>
										</select>
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

	$("#tblpengguna_username").keyup(function(event) {
		if ($.trim($("#tblpengguna_username").val())!='') {
			$.ajax({
				url: 'app/pengguna/CekUsername',
				type: 'POST',
				data: {uname: $("#tblpengguna_username").val()},
				success: function (respon) {
					if (respon=='exist') {
						$("#alertExist").show();
						$("#alertOk").hide();
						$("#btn-simpan").attr('disabled', true);
					}else{
						$("#alertExist").hide();
						$("#alertOk").show();
						$("#btn-simpan").attr('disabled',false);	
					}
				}
			});
		} else {
			$("#alertExist").hide();
			$("#alertOk").hide();
		}
	});

	/*form validation*/
	loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		var $FormData = $("#form-data").validate({
				// Rules for form validation
				rules : {
					"param[tblpengguna_nama]" : {
						required : true
					}
					,"param[tblpengguna_username]" : {
						required : true
					}
					,"param[tblrole_id]" : {
						required : true
					}
					,"param[tblpengguna_status]" : {
						required : true
					}
					,"param[tblpengguna_email]" : {
						email : true
					}
				},

				// Messages for form validation
				messages : {
					"param[tblpengguna_nama]" : {
						required : 'Mohon isikan nama pengguna'
					}
					,"param[tblpengguna_username]" : {
						required : 'Mohon isikan username pengguna untuk login'
					}
					,"param[tblrole_id]" : {
						required : 'Mohon pilih group hak akses pengguna untuk login'
					}
					,"param[tblpengguna_status]" : {
						required : 'Mohon pilih status keaktifan pengguna'
					}
					,"param[tblpengguna_email]" : {
						email : 'Mohon isikan email pengguna dengan tepat, atau kosongkan saja'
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
		$("#pengguna-form").modal("show");

	}

	function edit (id) {
		window.id = id;
		window.cmd = "edit";
		$("#form-data")[0].reset();
		$("#form-data .select2").select2('val','');
		$.ajax({
			url: 'app/pengguna/getdata',
			type: 'post',
			dataType: "json",
			data: {
				id: id,
			},
			success:function(respon) {
				window.respon = respon;
				exclude = ['tblpengguna_password'];
				$.each(respon, function(index, val) {
					if(!inArray(index,exclude)) {
		 				$("#"+index).val(respon[index]);
		 				$("#"+index).select2('val',respon[index]!="0" ? respon[index] : "");
					}
				});
			}
		});

		$("#pengguna-form").modal("show");
	}

	function simpan () {
		if (window.cmd=="edit") {

			$.ajax({
				url: 'app/pengguna/simpanpengguna',
				type: 'post',
				data:  $("#form-data").serialize()+'&id='+window.id+'&cmd='+window.cmd,
				success: function(data) {
					if (data=="success") {
						$("#pengguna-form").modal("hide");
						notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
						loadDataTable();
					}
					else {
						notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
					}
				}
			});
		}

		else { //selain adalah fungsi tambah
			if ($("#tblpengguna_password").val() == $("#rpassword").val() && $("#tblpengguna_password").val() != "") {
			$.ajax({
				url: 'app/pengguna/simpanpengguna',
				type: 'post',
				data:  $("#form-data").serialize()+'&id='+window.id+'&cmd='+window.cmd,

				success: function(data) {
					if (data=="success") {
						$("#pengguna-form").modal("hide");
						notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
						loadDataTable();
					}
					else {
						notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
					}
				}
			});
			}

			else {
				//alert("Password yang anda masukan tidak cocok atau Password Belum diisi, Silakan periksa kembali");
				$.SmartMessageBox({
						title : "Terjadi Kesalahan", // judul Smart Alert
						content : "Isian ada yang kosong atau Password yang anda masukan tidak cocok, Silakan periksa kembali", // konten dari smart alert
						buttons : '[Ok]' // pengaturan tombol
					}, function(ButtonPressed) {
						if (ButtonPressed === "Ok") {

						}
					});
			}
		}

		return false;
	}

	function hapus (id) {
		$.SmartMessageBox({
			title : "Konfirmasi Hapus", // judul Smart Alert
			content : "Apakah anda yakin akan menghapus data Pengguna ini", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'app/pengguna/hapusdatapengguna',
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
		var ajaxUrl = "app/pengguna/DTJSON" // url that fetches the data for the table
		// drawTable($('#dt_basic_pipeline'), 1, totalRecords, ajaxUrl);  //Initializes the datatable
		COLUMN  = [
			{ "data": "num" }
			,{ "data": "tblpengguna_nama" }
			,{ "data": "tblpengguna_username" }
			,{ "data": "tblrole_code" }
			,{ "data": "tblpengguna_email" }
			,{ "data": "tblpengguna_notelp" }
			,{ "data": "tblpengguna_status", "render": function ( data, type, full, meta ) {
				return data=='T' ? 'Aktif' : 'Tidak Aktif';
			 } }
			,{ "data": "tblpengguna_id", "render": function ( data, type, full, meta ) {
				return '<div align="center"><a rel="tooltip" data-placement="left" data-original-title="Klik untuk mengedit data" onclick="edit('+data+')" class="btn btn-circle btn-primary"><i class="fa fa-pencil"></i></a>'
				+'&nbsp;<a rel="tooltip" data-placement="left" data-original-title="Klik untuk menghapus data" onclick="hapus('+data+')" class="btn btn-circle btn-danger"><i class="fa fa-trash-o"></i></a></div>';
			 }}
		];
		drawTablePipeLine($('#dt_basic_pipeline'), 10, totalRecords, ajaxUrl,COLUMN, pageSetUp);  //Initializes the datatable
	}

</script>
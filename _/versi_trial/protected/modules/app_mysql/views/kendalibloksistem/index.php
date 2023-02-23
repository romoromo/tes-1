<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<style type="text/css">
	a {
		color: #35a8ce;
		cursor: pointer;

	}
	a:hover {
		text-decoration: none;
	}
	a.thumbnail {
		border: 1px solid #35a8ce;

	}
	a.thumbnail:hover {
		box-shadow: 1px 2px 2px #333;
		-moz-box-shadow: 1px 2px 2px #333;
		-webkit-box-shadow: 1px 2px 2px #333;
	}
</style>
<section>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="well well-sm well-light">
		<h1 align="center" class="page-title txt-color-blueDark"><i class="fa fa-asterisk"></i> 
		Setting Blok Sistem</h1>
        </div>
	</div>
</div>
<section>
	<div class="row">
		<div class="col-xs-6 col-md-4">
			<button class="btn btn-primary btn-block" onclick="tambah()">
			<i class="fa fa-plus-square"></i>
			Tambah Blok Sistem</button>
		</div>
	</div>	
</section>
<hr>
<br>
<div class="row">
<?php foreach ($data['kendalibloksistem'] as $list): ?>
  <div class="col-xs-6 col-md-2" id="list-<?php echo $list['tblkendalibloksistem_id']; ?>">
	  <div align="center">

	    <a onclick="edit(<?php echo $list['tblkendalibloksistem_id']; ?>)" class="thumbnail" id="<?php echo $list['tblkendalibloksistem_id']; ?>" align="center" style="font-align: center;">
	      <font style="font-size: 66px;" class="fa fa-sitemap"></font> 
	      <p><?php echo $list['tblkendalibloksistem_nama']; ?></p>
	      <button onclick="hapus(<?php echo $list['tblkendalibloksistem_id']; ?>)" class="btn btn-danger btn-xs btn-block" style="transition: transform 1s ease 0s;"><i class="fa fa-times"></i>&nbsp;Hapus</button>
	      <input type="hidden" name="namanya" id="namanya" value="<?php echo $list['tblkendalibloksistem_id']; ?>">
	    </a>
	    
	   </div>
  </div>
<?php endforeach; ?>
</div>

</section>

<!-- Modal -->
<div class="modal fade" id="block-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Blok Sistem<div id="tbljadwalsurvey_id"></div>
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form class="smart-form" id="formblocksistem">

					<fieldset>

						<section>
							<div class="row">
								<label class="label col col-4">Nama Blok Sistem</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input value="" type="text" name="nama" id="nama">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Status Routing</label>
								<div class="col col-10">
									<label class="select"> <i class="icon-append fa fa-user"></i>
										<select id="isrouting" name="isrouting">
											<option value="0">=== Pilih Status Routing ===</option>
											<option value="T">Aktif</option>
											<option value="F">Tidak Aktif</option>
										</select>
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Status Aktif</label>
								<div class="col col-10">
									<label class="select"> <i class="icon-append fa fa-user"></i>
										<select id="isaktif" name="isaktif">
											<option value="0">=== Pilih Status ===</option>
											<option value="T">Aktif</option>
											<option value="F">Tidak Aktif</option>
										</select>
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Group</label>
								<div class="col col-10">
									<label class="select"> <i class="icon-append fa fa-user"></i>
										<select id="group" name="group">
											<option value="0">=== Pilih Group ===</option>
											<?php foreach ($data['group'] as $group): ?>
												<option value="<?php echo $group['tblrole_id']; ?>"><?php echo $group['tblrole_code']; ?></option>
												
											<?php endforeach ?>
										</select>
									</label>

								</div>
							</div>
						</section>
					
					</fieldset>

					<input type="hidden" name="cmd" id="cmd" value="">
					<input type="hidden" name="id" id="id" value="">

					<footer>
						<button type="submit" class="btn btn-primary">
							Simpan
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>

					</footer>
									
					

			</div></form>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">

	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();

	loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		var $orderForm = $("#formblocksistem").validate({
				// Rules for form validation
				rules : {
					nama : {
						required : true
					},
					isrouting : {
						required : true
					},
					isaktif : {
						required : true
					},
					group : {
						required : true
					}
				},

				// Messages for form validation
				messages : {
					nama : {
						required : 'Mohon isikan Nama Block Sistem'
					},
					isrouting : {
						required : 'Mohon isikan Status Routing'
					},
					isaktif : {
						required : 'Mohon isikan Status Aktif'
					},
					group : {
						required : 'Mohon isikan Nama Group'
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
	}
	
	// PAGE RELATED SCRIPTS
	
	if($('.DTTT_dropdown.dropdown-menu').length){
		$('.DTTT_dropdown.dropdown-menu').remove();
	}

	//fungsi edit

	function edit (id) {			
		$.ajax({
			url: 'app/kendalibloksistem/edit',
			type: 'post',
			data: {id: id},
			success: function(data) {
				$("#id").val(data.split("||")[0]);
	 			$("#nama").val(data.split("||")[1]);
				$("#isrouting").val(data.split("||")[2]);
				$("#isaktif").val(data.split("||")[3]);
				$("#group").val(data.split("||")[4]);
				$("#cmd").val("edit");

				$("#block-form").modal("show");
			}
		});
	}

	function tambah () {
		$("#cmd").val("tambah");
		$("#id").val("");
		$("#nama").val("");
		$("#isrouting").val("");
		$("#isaktif").val("");
		$("#group").val("");

		$("#block-form").modal("show");
	}

	function simpan () {
		if ($("#cmd").val()=="edit") {

			$.ajax({
				url: 'app/kendalibloksistem/simpan',
				type: 'post',
				data: {
					cmd: $("#cmd").val(),
					id: $("#id").val(),
					nama: $("#nama").val(),
					isrouting: $("#isrouting").val(),
					isaktif: $("#isaktif").val(),
					group: $("#group").val()
				},
				success: function(data) {
					if (data=="success") {
						$("#block-form").modal("hide");
						notifikasi('Sukses','Data Berhasil Disimpan', 'success', false);	
					}
					else {
						notifikasi('Gagal','Data Gagal Disimpan', 'fail');
					}
				}
			}); 
		}
		else { //selain adalah fungsi tambah
				$.ajax({
					url: 'app/kendalibloksistem/simpan',
					type: 'post',
					data: {
						cmd: $("#cmd").val(),
						id: $("#id").val(),
						nama: $("#nama").val(),
						isrouting: $("#isrouting").val(),
						isaktif: $("#isaktif").val(),
						group: $("#group").val()
					},

					success: function(data) {
						if (data=="success") {
							$("#block-form").modal("hide");
							notifikasi('Sukses','Data Berhasil Disimpan', 'success', false);
						}
						else {
							notifikasi('Gagal','Data Gagal Disimpan', 'fail');
						}
					}
				}); 

		}
		return false;
	}

	function hapus(id) {
		$.SmartMessageBox({
				title : "Konfirmasi Hapus", // judul Smart Alert
				content : "Apakah anda yakin akan menghapus data ini ?", // konten dari smart alert
				buttons : '[Tidak][Ya]' // pengaturan tombol
			}, function(ButtonPressed) {
				if (ButtonPressed === "Ya") {
					$.ajax({
					url: 'app/kendalibloksistem/hapus',
					type: 'post',
					data: {id: id},
						success: function (data) {
							if (data=='success') {
								notifikasi('Berhasil', 'Data berhasil dihapus', 'success');
							}
							else {
								notifikasi('Gagal', 'Data surat gagal dihapus', 'failed');
							}
						}
					});

				}

			});
		setTimeout(function() {
			$("#block-form").modal("hide");
		}, 500);
	}

</script>
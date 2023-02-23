<?php define('ASSETS_URL', 'themes/smartadmin'); ?>
<style type="text/css" media="screen">
	.disabel {
		border: 2px solid rgb(153, 153, 167); background: black;
	}
</style>
<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-file-text fa-fw "></i>
			Pengaduan Izin
		</h1>
	</div>
</div>


<div class="well" id="form_pengaduan">
	<article class="col-sm-12">
		<div class="alert alert-warning fade in">
			<button class="close" data-dismiss="alert">
				×
			</button>
			<i class="fa-fw fa fa-warning"></i>
			Silahkan isi kritik dan saran anda. Mohon Data diisi dengan benar untuk kevalidan informasi
		</div>
	</article>

	<form id="pengaduan_form" class="smart-form">
		<div class="form-input-daftar">
			<!-- <div class="row">
				<section class="col col-2">
					<a class="btn btn-sm btn-primary" onclick="lihat()">Lihat Pengaduan</a>
				</section>
			</div> -->
			<div class="row">
				<section class="col col-2">
					<label for="label" class="input">Jenis Pengaduan : </label>
				</section>
				<section class="col col-6">
					<label class="radio">
						<input type="radio" id="pengaduan_jenis_1" name="pengaduan_jenis" value="SARAN" checked="checked">
						<i></i>Saran/Pertanyaan/Informasi
					</label>
					<label class="radio">
						<input type="radio" id="pengaduan_jenis_2" name="pengaduan_jenis" value="PENGADUAN">
						<i></i>Pengaduan/Keluhan/Masalah
					</label>
					<!-- <p>Wajib diisi</p> -->
				</section>
			</div>
			<div class="row">
				<section class="col col-2">
					<label for="label" class="input">Nama : </label>
				</section>
				<section class="col col-6">
					<label class="textarea textarea-resizable"> 										
						<textarea id="pengaduan_nama" name="pengaduan_nama" rows="3" class="custom-scroll"></textarea> 
					</label>
					<!-- <p>Wajib diisi</p> -->
				</section>
			</div>
			<div class="row">
				<section class="col col-2">
					<label for="label" class="input">Email : </label>
				</section>
				<section class="col col-6">
					<label class="input">
						<input type="text" id="pengaduan_email" name="pengaduan_email" class="input-sm">
					</label>
					<!-- <p>Kosongkan bila tidak memiliki email</p> -->
				</section>
			</div>
			<div class="row">
				<section class="col col-2">
					<label for="label" class="input">Alamat : </label>
				</section>
				<section class="col col-6">
					<label class="textarea textarea-resizable"> 										
						<textarea rows="3" id="pengaduan_alamat" name="pengaduan_alamat" class="custom-scroll"></textarea> 
					</label>
				</section>
			</div>
			<div class="row">
				<section class="col col-2">
					<label for="label" class="input">No HP : </label>
				</section>
				<section class="col col-6">
					<label class="input">
						<input type="text" id="pengaduan_nohp" name="pengaduan_nohp" class="input-sm">
					</label>
					<!-- <p>Wajib diisi</p> -->
				</section>
			</div>
			<div class="row">
				<section class="col col-2">
					<label for="label" class="input">Komentar : </label>
				</section>
				<section class="col col-6">
					<label class="textarea textarea-resizable"> 										
						<textarea rows="3" id="pengaduan_komentar" name="pengaduan_komentar" class="custom-scroll"></textarea> 
					</label>
				</section>
			</div>
		</div>
		<footer class="demo-btns">
			<button class="btn btn-primary pull-left" type="submit">
				 Kirim Pengaduan
			</button>
			<button class="btn btn-default pull-left" type="reset">
				Batal
			</button>
		</footer>
	</form>
</div>

<script type="text/javascript">
	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 *
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 *
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 *
	 * // activate inline charts
	 * runAllCharts();
	 *
	 * // setup widgets
	 * setup_widgets_desktop();
	 *
	 * // run form elements
	 * runAllForms();
	 *
	 ********************************
	 *
	 * pageSetUp() is needed whenever you load a page.
	 * It initializes and checks for all basic elements of the page
	 * and makes rendering easier.
	 *
	 */

	pageSetUp();
	
	/*
	 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	 * eg alert("my home function");
	 * 
	 * var pagefunction = function() {
	 *   ...
	 * }
	 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
	 * 
	 * TO LOAD A SCRIPT:
	 * var pagefunction = function (){ 
	 *  loadScript(".../plugin.js", run_after_loaded);	
	 * }
	 * 
	 * OR
	 * 
	 * loadScript(".../plugin.js", run_after_loaded);
	 */

	// PAGE RELATED SCRIPTS

	// pagefunction
	
	var pagefunction = function() {
		
	};
	
	// end pagefunction
	
	// run pagefunction on load

	pagefunction();

	jQuery(document).ready(function($) {
		runFormValidation()
	});

	loadScript("/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		var $orderForm = $("#pengaduan_form").validate({
				// Rules for form validation
				rules : {
					pengaduan_nama : {
						required : true
					},
					pengaduan_email : {
						email : true
					},
					pengaduan_alamat : {
						required : true
					},
					pengaduan_nohp : {
						required : true,
						digits : true
					},
					pengaduan_komentar : {
						required : true
					}
				},

				// Messages for form validation
				messages : {
					pengaduan_nama : {
						required : 'Mohon isikan nama anda'
					},
					pengaduan_email : {
						email : 'Mohon isi dengan email'
					},
					pengaduan_alamat : {
						required : 'Mohon isikan alamat anda'
					},
					pengaduan_nohp : {
						required : 'Mohon isikan nomor handphone anda',
						digits : 'Mohon isi dengan angka'
					},
					pengaduan_komentar : {
						required : 'Mohon isikan komentar anda'
					}
				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				},
				submitHandler : function(form) {
					// saat validasi benar semua, jalankan simpan()
					return pengaduanKirim();
				}
			}
		);
	}

	function pengaduanKirim () {
		$.ajax({
			url: '<?php echo Yii::app()->getBaseUrl(1);?>/pengaduan/pengaduanKirim',
			type: 'POST',
			data: {
				pengaduan_jenis: $("input[name=pengaduan_jenis]:checked").val(),
				pengaduan_nama: $('#pengaduan_nama').val(),
				pengaduan_email: $('#pengaduan_email').val(),
				pengaduan_alamat: $('#pengaduan_alamat').val(),
				pengaduan_nohp: $('#pengaduan_nohp').val(),
				pengaduan_komentar: $('#pengaduan_komentar').val(),
			}
			,success: function  (respon) {
				notifikasi('Berhasil', 'Pengaduan berhasil diajukan', 'success');
			}
		});
	}

</script>






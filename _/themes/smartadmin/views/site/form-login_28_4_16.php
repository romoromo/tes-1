<?php

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Login";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
define('LOGIN', true);
$namaaplikasi = AppConfig::model()->find('tblappconfig_key=:key', array(':key'=>'APLIKASI_NAMA'));
$namainstansi = AppConfig::model()->find('tblappconfig_key=:key', array(':key'=>'APLIKASI_INSTANSI'));
$namapemerintah = AppConfig::model()->find('tblappconfig_key=:key', array(':key'=>'APLIKASI_PEMERINTAH'));
$namawilayah = AppConfig::model()->find('tblappconfig_key=:key', array(':key'=>'APLIKASI_WILAYAH'));

$page_css[] = "your_style.css";
$no_main_header = true;
$page_body_prop = array(
	"id"=>"login",
	"class"=>"animated fadeInDown bg",
	"style"=>"min-height: 710px; background: url(<?php echo APP_URL; ?>/img/images/bg.jpg);background-size:cover;"
	);
require_once("themes/smartadmin/views/layouts/header.php");

?>
<style type="text/css">
	#login
	{
		/* min-height: 0px !important; */
	}
	.bg {
		background: url(<?php echo APP_URL; ?>/themes/smartadmin/img/images/bg.jpg) !important;
		background-size:cover !important;
		background-repeat: no-repeat !important;
	}
	#login #header {
		border-bottom: 2px solid #4185FC!important;
	}
	#main {
		background: none !important;
	}
	/*.redaksional-header
	{
		-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=9, Direction=117, Color=#000000)";
		text-shadow: 3px 6px 9px rgba(0,0,0,0.7);
		filter: progid:DXImageTransform.Microsoft.Shadow(Strength=9, Direction=135, Color=#000000);
	}*/
	.blink_me {
		-webkit-animation-name: blinker;
		-webkit-animation-duration: 1s;
		-webkit-animation-timing-function: linear;
		-webkit-animation-iteration-count: infinite;

		-moz-animation-name: blinker;
		-moz-animation-duration: 1s;
		-moz-animation-timing-function: linear;
		-moz-animation-iteration-count: infinite;

		animation-name: blinker;
		animation-duration: 1s;
		animation-timing-function: linear;
		animation-iteration-count: infinite;
	}

	@-moz-keyframes blinker {
		0% { opacity: 1.0; }
		50% { opacity: 0.0; }
		100% { opacity: 1.0; }
	}

	@-webkit-keyframes blinker {
		0% { opacity: 1.0; }
		50% { opacity: 0.0; }
		100% { opacity: 1.0; }
	}

	@keyframes blinker {
		0% { opacity: 1.0; }
		50% { opacity: 0.0; }
		100% { opacity: 1.0; }
	}
	/*.col-sm-12
	{
		margin-left: 0px !important;
		margin-top: 20% !important;
	}*/
	.box-shadow {
		-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=9, Direction=135, Color=#000000)";/*IE 8*/
		-moz-box-shadow: 8px 8px 9px 1px rgba(0,0,0,0.7);/*FF 3.5+*/
		-webkit-box-shadow: 8px 8px 9px 1px rgba(0,0,0,0.7);/*Saf3-4, Chrome, iOS 4.0.2-4.2, Android 2.3+*/
		box-shadow: 8px 8px 9px 1px rgba(0,0,0,0.7);/* FF3.5+, Opera 9+, Saf1+, Chrome, IE10 */
		filter: progid:DXImageTransform.Microsoft.Shadow(Strength=9, Direction=135, Color=#000000); /*IE 5.5-7*/
	}

	.paragraph-header {
		color: #FFF !important
	}
</style>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->


<div id="main" role="main">

	<!-- MAIN CONTENT -->
	<div id="content" class="container" style="padding: 0px 0px !important;">

		<div class="row" >
			<article class="col-sm-12 col-md-4 col-lg-4"></article>

			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-4 col-lg-4">
				<center><span id="logo" style="margin-left: 0px;"> <img src="<?php echo ASSETS_URL; ?>/img/images/favicon.png" alt="Logo" style="width: 50%;"> </span></center><br>
				<div class="well no-padding">
					<form action="index.html" id="login-form" class="smart-form client-form" style="box-shadow: 0px 0px 6px #D5C2C2;">

						<fieldset>
							<section>
								<center>
									<p class="text-center" style="color: initial;" style="color: initial;font-size: 14px;"><strong style="font-size: 18px;">e-Pajak Daerah </strong></p>
									<p><strong style="font-size: 16px;">Dinas Pendapatan Daerah</strong></p>
									<p><strong style="font-size: 16px;">Kota Yogyakarta</strong></p>
									<p><i>Masukan Username dan Password</i></p>
									<label style="display:none" id="info" class="label txt-color-red blink_me text-center">Username atau Password salah.</label>
								</center>
							</section>
							<section>
								<label class="label">Username</label>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="text" name="LoginForm[username]" id="LoginForm_username">
									<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Masukan Username</b>
								</label>
							</section>

							<section>
								<label class="label">Password</label>
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="LoginForm[password]" id="LoginForm_password">
									<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Masukan Password</b> 
								</label>
							</section><hr><br>
							<section>
								<button type="submit" id="btn-login" class="btn btn-sm btn-primary" style="float: right;">
									Masuk 
								</button>
								<a href="<?php echo Yii::app()->baseUrl; ?>/web" id="btn-login" class="btn btn-sm btn-success" style="float: right; margin-right:5px;">
									Kembali 
								</a>
							</section><br>
							<section>
								<p>Lupa password ? reset <a onclick="lupa_pass()">Klik disini</a></p>
							</section>
							<section>
								<p>Anda belum terdaftar ? daftar <a onclick="daftar()" > disini</a></p>
							</section>
							<section>
								<p>Belum menerima kode aktivasi ? klik <a onclick="kode_aktivasi()"> disini</a></p>
							</section>
							<section>
								<p>Anda belum memiliki NPWPD ? daftar <a href=""> disini</a></p>
							</section>
							<section>
								<p>Anda memerlukan bantuan ? hubungi kami di 4 555 555 (Kring Pajak)</p>
							</section>
						</fieldset>
					</form>
				</div>
				<p align="center" style="color: white;">2016 © Dinas Pendapatan Daerah.</p>

				<!-- <p style="font-size: 10px;color: rgb(24, 105, 176);">Aplikasi ini dapat diakses melalui jaringan internet yang terdapat pada perangkat mobile, seperti : Netbook, Notebook, iPad, Tablet, Smart phone dan lain-lain !</p>
				<div align="center">
				<ul class="list-inline" style="margin-top: 8px;">
					<li>
						<a target="_blank" href="" rel="tooltip" title="" data-placement="bottom" data-original-title="twitter">
							<img src="<?php echo ASSETS_URL; ?>/img/images/twitter-icon.png" alt="" style="width: 66px;">
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" rel="tooltip" title="" data-placement="bottom" data-original-title="Browser">
							<img src="<?php echo ASSETS_URL; ?>/img/images/browser.png" alt="" style="width: 66px;">
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" rel="tooltip" title="" data-placement="bottom" data-original-title="Download APK">
							<img src="<?php echo ASSETS_URL; ?>/img/images/android.png" alt="" style="width: 66px;">
						</a>
					</li>
				</ul>
				</div> -->

			</article>

		</div>

		
	</div>

</div>







<!--Modal Edit Data-->
<div class="modal fade" id="formlupa_pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<i class="fa  fa-fw fa-key"></i> Reset Password
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form class="smart-form" id="form-pemohon">
					<fieldset>
						<div class="row">
							<section class="col col-md-3">
								<p>NPWPD*</p>
							</section>
							<section class="col col-md-7">
								<label class="input">
									<input class="input-sm" type="text" placeholder="Masukan NPWPD" id="npwpd" name="npwpd">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-3">
								<p>Email</p>
							</section>
							<section class="col col-md-7">
								<label class="input">
									<input class="input-sm" type="text" placeholder="Masukan Email" id="email" name="email">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-3">
								<p>Kode Keamanan*</p>
							</section>
							<section class="col col-md-7">
								<img src="<?php echo ASSETS_URL; ?>/img/captcha-image.jpg">
							</section>
						</div>
						<div class="row">
							<section class="col col-md-3"></section>
							<section class="col col-md-7">
								<label class="input">
									<input class="input-sm" type="text" placeholder="Kode Keamanan" id="kode_keamanan" name="kode_keamanan">
								</label>
							</section>
						</div>
					</fieldset>

					<footer>
						<button class="btn btn-primary" data-dismiss="modal" onclick="simpan()">
							Simpan
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
					</footer>
				</form>							
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal Edit Data-->
<div class="modal fade" id="form_daftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<i class="fa  fa-fw fa-file"></i> 	Daftar e-Pajak Daerah
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form class="smart-form" id="form-pemohon">
					<fieldset>
						<div id="form_isidaftar">
							<div class="row">
								<section class="col col-md-3">
									<p>NPWPD*</p>
								</section>
								<section class="col col-md-7">
									<label class="input">
										<input class="input-sm" type="text" placeholder="Masukan NPWPD" id="npwpd" name="npwpd">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-3">
									<p>Email</p>
								</section>
								<section class="col col-md-7">
									<label class="input">
										<input class="input-sm" type="text" placeholder="Masukan Email" id="email" name="email">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-3">
									<p>Kode Keamanan*</p>
								</section>
								<section class="col col-md-7">
									<img src="<?php echo ASSETS_URL; ?>/img/captcha-image.jpg">
								</section>
							</div>
							<div class="row">
								<section class="col col-md-3"></section>
								<section class="col col-md-7">
									<label class="input">
										<input class="input-sm" type="text" placeholder="Kode Keamanan" id="kode_keamanan" name="kode_keamanan">
									</label>
								</section>
							</div>
						</div>
						<div id="form_verifikasi" style="display:none">
							<div class="row">
								<section class="col col-md-3">
									<p>Verifikasi</p>
								</section>
								<section class="col col-md-7">
									<label class="input">
										<input class="input-sm" type="text" placeholder="Masukan Verifikasi" id="verifikasi" name="verifikasi">
									</label>
								</section>
							</div>
						</div>
					</fieldset>

					<footer>
						<a class="btn btn-primary"  id="simpan_isidaftar" onclick="simpan_isidaftar()">
							Simpan
						</a>
						<button class="btn btn-primary" style="display:none" id="simpan_verifikasi" data-dismiss="modal" onclick="simpan()">
							Simpan
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
					</footer>
				</form>							
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal Edit Data-->
<div class="modal fade" id="form_aktivitasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<i class="fa  fa-fw fa-key"></i> Kode Aktivasi
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form class="smart-form" id="form-pemohon">
					<fieldset>
						<div class="row">
							<section class="col col-md-3">
								<p>NPWPD*</p>
							</section>
							<section class="col col-md-7">
								<label class="input">
									<input class="input-sm" type="text" placeholder="Masukan NPWPD" id="npwpd" name="npwpd">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-3">
								<p>Email</p>
							</section>
							<section class="col col-md-7">
								<label class="input">
									<input class="input-sm" type="text" placeholder="Masukan Email" id="email" name="email">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-3">
								<p>Kode Keamanan*</p>
							</section>
							<section class="col col-md-7">
								<img src="<?php echo ASSETS_URL; ?>/img/captcha-image.jpg">
							</section>
						</div>
						<div class="row">
							<section class="col col-md-3"></section>
							<section class="col col-md-7">
								<label class="input">
									<input class="input-sm" type="text" placeholder="Kode Keamanan" id="kode_keamanan" name="kode_keamanan">
								</label>
							</section>
						</div>
					</fieldset>

					<footer>
						<button class="btn btn-primary" data-dismiss="modal" onclick="simpan()">
							Simpan
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
					</footer>
				</form>							
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<style type="text/css"></style>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php
	//include required scripts
require_once("themes/smartadmin/views/layouts/scripts.php");
?>

<!-- PAGE RELATED PLUGIN(S)
	<script src="..."></script>-->

	<script type="text/javascript">
		window.isLogin = false;
		runAllForms();

		$(function() {
		// Validation
		$("#login-form").validate({
			// Rules for form validation
			rules : {
				"LoginForm[username]" : {
					required : true
				},
				"LoginForm[password]" : {
					required : true,
					minlength : 3,
					maxlength : 20
				}
			},

			// Messages for form validation
			messages : {
				"LoginForm[username]" : {
					required : 'Tolong masukkan nama pengguna Anda'
				},
				"LoginForm[password]": {
					required : 'Masukkan kata sandi Anda'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			},
			submitHandler : function(form) {
				// saat validasi benar semua, lakukan proses login
				doLogin();
			}
		});
	});

		function doLogin() {
			str = $("#login-form").serialize() + "&ajax=login-form";
			$.ajax({
				type: "POST",
				url: "",
				data: str,
				dataType: "json",
				beforeSend : function() {
                //$("#btn-login").attr("disabled",true);
            },
            success: function(data, status) {
            	window.data = data;
            	if(data.authenticated)
            	{
            		window.location = data.redirectUrl;
            	}
            	else
            	{
            		$.each(data, function(key, value) {
                       /* var div = "#"+key+"_em_";
                        $(div).text(value);
                        $(div).show();*/
                        $("#info").show('slow');
                        $("#info").html(value);
                    });
                   // $("#btn-login").attr("disabled",false);
               }
           },
       });
		}

		function simpan () {
		$.smallBox({
			title : "Success",
			content : "<i class='fa fa-save'></i><i> Data Berhasil Disimpan</i>",
			color : "#296191",
			iconSmall : "fa fa-thumbs-up bounce animated",
			timeout : 1000			
		});
	}

		function lupa_pass () {
			$("#formlupa_pass").modal('show');
		}

		function daftar () {
			$("#form_daftar").modal('show');
		}

		function simpan_isidaftar () {
			$("#form_verifikasi").show();
			$("#form_isidaftar").hide();
			$("#simpan_verifikasi").show();
			$("#simpan_isidaftar").hide();
		}

		function kode_aktivasi () {
			$("#form_aktivitasi").modal('show');
		}
	</script>

	<?php
	//include footer
	require_once("themes/smartadmin/views/layouts/footer.php");
	?>


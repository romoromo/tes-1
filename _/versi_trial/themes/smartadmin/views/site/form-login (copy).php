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
<!-- <header id="header">


	<div id="logo-group">
		<span id="logo"> <img src="<?php echo ASSETS_URL; ?>/img/images/banner.png" alt="Logo" style="width: 273%; margin-top: -18px; margin-left: -25px;"> </span>


	</div>

	<span id="login-header-space"> </span>

</header> -->

<div id="main" role="main">

	<!-- MAIN CONTENT -->
	<div id="content" class="container">

		<div class="row" >

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="opacity: 0;"></div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 hidden-xs hidden-sm">
					<div class="text-center">
						<img src="<?php echo ASSETS_URL; ?>/img/images/favicon.png" alt="LOGO" width="100px"><br>
						<h1 class="txt-color-white login-header-big"><b><?php echo $namaaplikasi->tblappconfig_value; ?></b></h1>
						<h1 class="txt-color-white login-header-big"><?php echo $namainstansi->tblappconfig_value; ?></h1>
						<h1 class="txt-color-white login-header-big"><?php echo $namapemerintah->tblappconfig_value; ?></h1>
					</div>

					<div class="row" style="height: 180px; margin-top: 80px;">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >

							<div class="pull-left">
								<h4 class="paragraph-header">Selamat datang di <?php echo $namaaplikasi->tblappconfig_value; ?> <?php echo $namawilayah->tblappconfig_value; ?>. Silahkan login pada aplikasi menggunakan form disamping.</h4>
							</div>


						</div>

						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >

							<div class="pull-left">
								<h4 class="paragraph-header">Kunjungi situs resmi kami di:</h4><br>
								<a href="http://www.bpmp2t.mataramkota.go.id/" target="_blank" class="btn btn-primary btn-sm">Website Kota Mataram</a>
							</div>


						</div>
					</div>

					<div class="row" >
						<div class="col-xs-12 col-sm-12 col-lg-3"></div>
						<div class="col-xs-12 col-sm-12 col-lg-6">
							<h6 class="about-heading txt-color-white">Kontak Kami :</h6>
						</div>
					</div>
					<div class="row" >
						<div class="col-xs-12 col-sm-12 col-lg-3"></div>
						<div class="col-xs-12 col-sm-12 col-lg-1">
							<h7 class="about-heading txt-color-white">Alamat</h7>
						</div>
						<div class="col-xs-12 col-sm-12 col-lg-1" style="color: white;">:</div>
						<div class="col-xs-12 col-sm-12 col-lg-6">
							<h7 class="about-heading txt-color-white" style="margin-left: -38px;">Jalan Flamboyan No. 1 Mataram</h7>
						</div>
					</div>
					<div class="row" >
						<div class="col-xs-12 col-sm-12 col-lg-3"></div>
						<div class="col-xs-12 col-sm-12 col-lg-1">
							<h7 class="about-heading txt-color-white">Telpon</h7>
						</div>
						<div class="col-xs-12 col-sm-12 col-lg-1" style="color: white;">:</div>
						<div class="col-xs-12 col-sm-12 col-lg-6">
							<h7 class="about-heading txt-color-white" style="margin-left: -38px;">(0370)641750, 081907494611</h7>
						</div>
					</div>
					<div class="row" >
						<div class="col-xs-12 col-sm-12 col-lg-3"></div>
						<div class="col-xs-12 col-sm-12 col-lg-1">
							<h7 class="about-heading txt-color-white">Fax </h7>
						</div>
						<div class="col-xs-12 col-sm-12 col-lg-1" style="color: white;">:</div>
						<div class="col-xs-12 col-sm-12 col-lg-6">
							<h7 class="about-heading txt-color-white" style="margin-left: -38px;">(0370)641750, 081907494611</h7>
						</div>
					</div>
					<div class="row" >
						<div class="col-xs-12 col-sm-12 col-lg-3"></div>
						<div class="col-xs-12 col-sm-12 col-lg-1">
							<h7 class="about-heading txt-color-white">Email</h7>
						</div>
						<div class="col-xs-12 col-sm-12 col-lg-1" style="color: white;">:</div>
						<div class="col-xs-12 col-sm-12 col-lg-6">
							<h7 class="about-heading txt-color-white" style="margin-left: -38px;">bpmp2t.mataram@gmail.com</h7>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 pull-right">
					<div class="well no-padding">


						<div id="myCarousel" class="carousel fade">
							<ol class="carousel-indicators">
								<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								<li data-target="#myCarousel" data-slide-to="1" class=""></li>
								<li data-target="#myCarousel" data-slide-to="2" class=""></li>
							</ol>
							<div class="carousel-inner">
								<!-- Slide 1 -->
								<div class="item active">
									<img src="<?php echo ASSETS_URL; ?>/img/images/slider 1.png" alt="" width="100%">
									<div class="carousel-caption">
										<h4>Taman Malomba</h4>
										<!--<a href="javascript:void(0);" class="btn btn-info btn-sm">Read more</a>-->
									</div>
								</div>
								<!-- Slide 2 -->
								<div class="item">
									<img src="<?php echo ASSETS_URL; ?>/img/images/slider 2.png" alt="" width="100%">
									<div class="carousel-caption">
										<h4>Patung Terune Dadere</h4>
										<!--<a href="javascript:void(0);" class="btn btn-danger btn-sm">Read more</a>-->
									</div>
								</div>
								<!-- Slide 3 -->
								<div class="item">
									<img src="<?php echo ASSETS_URL; ?>/img/images/slider 3.png" alt="" width="100%">
									<div class="carousel-caption">
										 <h4>Loang Baloq</h4>
										 <!--<a href="javascript:void(0);" class="btn btn-danger btn-sm">Read more</a>-->
									</div>
								</div>
							</div>
							<a class="left carousel-control" href="#myCarousel" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
							<a class="right carousel-control" href="#myCarousel" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
						</div>

						<form method="post" action="<?php echo APP_URL; ?>" id="login-form" class="smart-form client-form" style="margin-top: 110px;">
							<fieldset style="margin-top: -132px;">

								<div class="row">
								<!-- <section class="col col-2">
									<span id="logo"> <img src="<?php echo APP_URL; ?>/themes/smartadmin/img/images/favicon.png" alt="Logo" style="width: 48%;margin-top: -2px;"> </span>
								</section> -->
								<section class="col col-sm-12 col-md-12 col-lg-12">
									<br>
									<h1><p style="color: #A9052A;" class=" text-center"><strong>Login</strong></p></h1>
									<br>
									<p class="alert alert-success" style="color: initial;"><strong>Silahkan login dengan mengisikan username dan password anda.</strong></p>
									<label style="display:none" id="info" class="label txt-color-red blink_me text-center">Username atau Password salah.</label>
								</section>
							</div>


							<div class="row">
								<section class="col col-sm-12 col-md-12 col-lg-12">
									<label class="label">Username</label>
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input type="text" name="LoginForm[username]" id="LoginForm_username">
										<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Masukan Username</b>
									</label>
								</section>

								<section class="col col-sm-12 col-md-12 col-lg-12">
									<label class="label">Password</label>
									<label class="input"> <i class="icon-append fa fa-lock"></i>
										<input type="password" name="LoginForm[password]" id="LoginForm_password">
										<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Masukan Password</b>
									</label>
								</section>
							</div>

						</fieldset>
						<footer>
							<button type="submit" id="btn-login" class="btn btn-primary btn-block">
								Masuk <i class="fa fa-arrow-right"></i>
							</button>
							<a href="landing" id="btn-login" class="btn txt-color-white bg-color-magenta btn-block">
								<i class="fa fa-reply"></i> Kembali ke Halaman Awal
							</a>
						</footer>
					</form>
				</div>

			</div>
		</div>

	</div>


</div>

</div>
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
	</script>

	<?php
	//include footer
	require_once("themes/smartadmin/views/layouts/footer.php");
	?>
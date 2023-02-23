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

$page_css[] = "your_style.css";
$no_main_header = true;
$page_body_prop = array(
	"id"=>"login",
	"class"=>"animated fadeInDown bg",
	"style"=>"min-height: 618px; background: url('<?php echo APP_URL; ?>/img/images/bg.jpg');"
	);
require_once("themes/smartadmin/views/layouts/header.php");

?>
<style type="text/css">
	#login
	{
		
		background: url('<?php echo APP_URL; ?>/themes/smartadmin/img/images/bg.png') !important;
		background-size:cover !important;
		background-repeat: no-repeat !important;
		overflow: auto;
	}
	.bg {
		min-width: 100% !important;
		min-height: 100% !important;
		background: url('<?php echo APP_URL; ?>/themes/smartadmin/img/images/bg.png') !important;
		background-size:cover !important;
		background-repeat: no-repeat !important;
	}
	#login #header {
		border-bottom: 2px solid #4185FC!important;
	}
	/*#main {
		background: none !important;
	}*/
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
</style>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->
<header id="header" style=" margin-top: -47px; background: rgba(5, 31, 146, 0.12) !important; border-bottom: 2px solid #BE0000!important;">
	<!--<span id="logo"></span>-->
	<div id="logo-group">
		<p style="margin-top: 49px;"><marquee style="width: 1203px;color: rgb(202, 3, 3);"><strong>....:: Selamat Datang di Aplikasi Pelayanan Perizinan BPMP2T Kota Mataram ::....</strong></marquee></p>
		<!-- END AJAX-DROPDOWN -->
	</div>
	<span id="login-header-space"> </span>
</header>


<div id="main" role="main">
    <div id="content" class="container" style="margin-top: -42px;">
      <div class="col-md-12" style="margin-top: 65px;" align="center">
        <img class="img-portfolio img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/images/favicon.png" style="width: 10%;">
    </div>
    <div class="col-md-12" align="center">
        <img class="img-portfolio img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/images/title.png" style="width: 70%;">
    </div>

    <div class="col-lg-12" style="margin-top: 8%;">
        <div class="row">

        <div class="col-md-2 col-sm-6">
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="service-item">
                <div align="center">
                    <a href="../informasi_izin/#../informasi/syarat" class="btn btn-default btn-lg" style="background-color: rgba(247, 249, 255, 0.72);border-radius: 16px;box-shadow: 0px 0px 7px #E71010;" rel="tooltip" data-placement="top" data-original-title="Informasi Perizinan"><img class="img-portfolio img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/images/pengaduan.png"> <p><strong style="font-size: 14px;color: darkblue;"><br>Informasi Perizinan</strong></p></a>
                </div>
            </div>
        </div>

        <div class="col-md-2 col-sm-6">
            <div class="service-item">
                <div align="center">
                    <a href="../daftar_online/#../pendaftaran/pendaftaranonline" class="btn btn-primary btn-lg" style="background-color: rgba(247, 249, 255, 0.72);border-radius: 16px;box-shadow: 0px 0px 7px #E71010;" rel="tooltip" data-placement="top" data-original-title="Pendaftaran Online"><img class="img-portfolio img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/images/pengaduan6.png"><p><strong style="font-size: 14px;color: darkblue;"><br>Pendaftaran Online</strong></p></a>
                </div>
            </div>
        </div>

        <div class="col-md-2 col-sm-6">
            <div class="service-item">
                <div align="center">
                    <a href="../pengaduan_izin/#../beranda" class="btn btn-success btn-lg" style="background-color: rgba(247, 249, 255, 0.72);border-radius: 16px;box-shadow: 0px 0px 7px #E71010;" rel="tooltip" data-placement="top" data-original-title="Pengaduan Izin"><img class="img-portfolio img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/images/pengaduan2.png"><p><strong style="font-size: 14px;color: darkblue;"><br>Pengaduan Izin</strong></p></a>
                </div>
            </div>
        </div>

        <div class="col-md-2 col-sm-6">
            <div class="service-item">
                <div align="center">
                    <a href="login" class="btn btn-success btn-lg" style="background-color: rgba(247, 249, 255, 0.72);border-radius: 16px;box-shadow: 0px 0px 7px #E71010;" rel="tooltip" data-placement="top" data-original-title="Pelayanan Perizinan"><img class="img-portfolio img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/images/pengaduan4.png"><p><strong style="font-size: 14px;color: darkblue;"><br>Pelayanan Perizinan</strong></p></a>
                </div>
            </div>
        </div>
    </div><br>
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
                        $("#info").html(value);
                        $("#info").show(400);
                    });
                   // $("#btn-login").attr("disabled",false);
               }
           },
       });
		}

		function showmodalpemda(as) {
			window.location.href = "login/as/"+as;
		}

	</script>

	<?php 
	//include footer
	require_once("themes/smartadmin/views/layouts/footer.php");
	?>
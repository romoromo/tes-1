<?php
/*konfigurasi yang disesuaikan dari SmartAdmin*/
	define('ASSETS_URL', Yii::app()->theme->baseUrl); // atur ASSET_URL / base url adalah path dari theme
	$page_title = "";
	$page_css = array();
	
	$page_body_prop = array(
		"class"=>"fixed-ribbon fixed-header fixed-navigation menu-on-top smart-style-3",
		"style"=>"font-family: Montserrat, 'Open Sans',Arial,Helvetica,Sans-Serif;background: url(<?php echo ASSETS_URL; ?>/img/images/bg-1.jpg) !important;background-size:cover;"
	); //optional properties for <body>
	if( defined('LOGIN') ) 
		$page_body_prop = array(
			"id"=>"login",
			"class"=>"animated fadeInDown bg",
			"style"=>"min-height: 618px; background: url(<?php echo APP_URL; ?>/img/images/yogya.jpg);background-size:cover;"
		 ); // jika yang mengakses LOGIN, maka tambahkan property css untuk form login

	//configure constants

	$directory = realpath(dirname(__FILE__));
	$document_root = realpath($_SERVER['DOCUMENT_ROOT']);
	$base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .
	$_SERVER['HTTP_HOST'];
	$base_url = $base_url.Yii::app()->baseUrl;
	/*if(strpos($directory, $document_root)===0) {
	    $base_url .= str_replace(DIRECTORY_SEPARATOR, '/', substr($directory, strlen($document_root)));
	}*/

	defined("APP_URL") ? null : define("APP_URL", str_replace("/lib", "", $base_url));
	//Assets URL, location of your css, img, js, etc. files
	/*defined("ASSETS_URL") ? null : define("ASSETS_URL", APP_URL);*/
	/*atur data navigasi*/
	require_once 'data_nav.php';
	?>
	<!DOCTYPE html>
	<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/bootstrap-table.css">

		<!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/smartadmin-production.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/smartadmin-skins.css">
		<style type="text/css">
			.aktif_notif {
				padding: 5px;
			}
		</style>
		<!-- SmartAdmin RTL Support is under construction
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/smartadmin-rtl.css"> -->

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		     <link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/your_style.css"> -->

		     <?php
		     /*dicomment dulu, karena belum ada custom css*/
			/*if ($page_css) {
				foreach ($page_css as $css) {
					echo '<link rel="stylesheet" type="text/css" media="screen" href="'.ASSETS_URL.'/css/'.$css.'">';
				}
			}*/
			?>


			<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/demo.css">

			<!-- FAVICONS -->
			<link rel="shortcut icon" href="<?php echo ASSETS_URL; ?>/img/images/favicon.png" type="image/png">
			<link rel="icon" href="<?php echo ASSETS_URL; ?>/img/images/favicon.png" type="image/png">



		<!-- Specifying a Webpage Icon for Web Clip 
		Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="<?php echo ASSETS_URL; ?>/img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo ASSETS_URL; ?>/img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo ASSETS_URL; ?>/img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo ASSETS_URL; ?>/img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="<?php echo ASSETS_URL; ?>/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="<?php echo ASSETS_URL; ?>/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="<?php echo ASSETS_URL; ?>/img/splash/iphone.png" media="screen and (max-device-width: 320px)">		
		<style type="text/css">

			.logos {
				width: 600px !important;
				margin-top: 0px !important;
			}
			.logos img {
				width: 32px !important;
				float: left;
				margin: 6px 0px 0px -4px !important;
			}
			.redaksional_app {
				margin: 0px;
				margin-top: 4px;
				margin-left: 5px;
				color: white;
				font-size: 15px;
				font-family: 'Oswald';
			}
			.badan_app {
				margin: 0px;
				margin-left: 5px;
				color: white;
				font-size: 17px;
				font-weight: bold;
			}

			.smart-style-3 #logo-group span#activity, .smart-style-3 .btn-header>:first-child>a {
				background-color: #37DD5C;
				background-image: -moz-linear-gradient(top,#dd7c37,#b9662b);
				background-image: -webkit-gradient(linear,0 0,0 100%,from(#b9662b),to(#b9662b));
				background-image: -webkit-linear-gradient(top,#dd7c37,#b9662b);
				background-image: -o-linear-gradient(top,#dd7c37,#b9662b);
				background-image: linear-gradient(to bottom,#608EB1,#3A607B);
				color: #fff!important;
				border: 1px solid #6AA9D8;
				text-shadow: #294050 0 -1px;
			}
			.smart-style-3 #logo-group span#activity, .smart-style-3 .btn-header>:first-child>a:hover {				
				-webkit-box-shadow: inset 1px 1px 0 #985813,inset -1px -1px 0 #985813;
				-moz-box-shadow: inset 1px 1px 0 #985813,inset -1px -1px 0 #985813;
				box-shadow: inset 1px 1px 0 #76B6E9,inset -1px -1px 0 #64A3D1;
				background-color: #35DD35;
				background-image: -moz-linear-gradient(top,#dd7a35,#984a13);
				background-image: -webkit-gradient(linear,0 0,0 100%,from(#dd7a35),to(#984a13));
				background-image: -webkit-linear-gradient(top,#dd7a35,#984a13);
				background-image: -o-linear-gradient(top,#dd7a35,#984a13);
				background-image: linear-gradient(to bottom,#4CE45D,#31B149);
			}

			.smart-style-3 body, body.smart-style-3 {
				background: url(<?php echo ASSETS_URL ?>/img/mybg.png) #fff !important;
				background-position: center;
				background-repeat: no-repeat;
				background-attachment: fixed !important;
			}
			#left-panel {
				background: #F5F5F5 !important;
				border: none !important;
				box-shadow: none !important;
			}

			.btn-me {
				padding-right: 5px !important;
				padding-left: 5px !important;
				border-radius: 8px !important;
			}
				.span_redaksional {
				    padding-left: 25px;
				}
			#header {
				background-image: linear-gradient(to bottom, #EA1212, #B40606) !important;
			}

		</style>

	</head>

	<body  <?php 
	if ($page_body_prop) {
		foreach ($page_body_prop as $prop_name => $value) {
			echo $prop_name.'="'.$value.'" ';
		}
	}

	?>
	>
<!-- POSSIBLE CLASSES: minified, fixed-ribbon, fixed-header, fixed-width
	You can also add different skin classes such as "smart-skin-1", "smart-skin-2" etc...-->
	<?php
	if (!$no_main_header) {

		?>
		<!-- HEADER -->
		<header id="header" style="background-image: linear-gradient(to bottom, #EA1212, #B40606) !important;box-shadow: -2px 1px 1px #FFAE00;">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo" class="logos"> 
					<img src="<?php echo ASSETS_URL; ?>/img/images/favicon.png" style="width: 20%; margin-top: -12px;" alt="SIPD Kabupaten Wonogiri
"> 
				<div class="span_redaksional">
					<h4 class="redaksional_app"><?php echo AppConfig::model()->getValue('APLIKASI_NAMA'); ?></h4>
					
					<h4 class="badan_app"><?php echo AppConfig::model()->getValue('APLIKASI_PEMERINTAH'); ?></h4>						
</div>
				</span>
				<!-- END LOGO PLACEHOLDER -->

						<!-- Note: The activity badge color changes when clicked and resets the number to 0
						Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->

						<!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
						


						<!-- END AJAX-DROPDOWN -->
					</div>

					<!-- projects dropdown -->
					
					<!-- end projects dropdown -->

					<!-- pulled right: nav area -->
					<div class="pull-right">

						<!-- collapse menu button -->
						<div id="hide-menu" class="btn-header pull-right">
							<span> <a href="javascript:void(0);" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
						</div>
						<!-- end collapse menu -->
						<?php if(isset(Yii::app()->user->unit)): ?>
							<?php if(Yii::app()->user->unit>=0): ?>
							<div id="logoutz" class="btn-header transparent pull-right">
								<span>
									<a href="<?php echo APP_URL; ?>/site/logout" class="btn-me" title="Log Out" data-logout-msg="Terima Kasih, telah menggunakan aplikasi ini. Klik Ya untuk logout."><i class="fa fa-sign-out"></i> Log Out</a> 
								</span>
							</div>
							<?php endif; ?>
						<?php else: ?>
							<div id="logoutz" class="btn-header transparent pull-right">
								<span>
									&nbsp;<a href="<?php echo APP_URL; ?>/site/login" class="btn-me" title="Log In"><i class="fa fa-sign-in"></i> Log In</a> &nbsp;
								</span>
							</div>
						<?php endif; ?>
							<!-- end logout button -->

						<!-- fullscreen button -->
						<?php if (!isset(Yii::app()->user->username)): ?>
							 <div id="fullscreen" class="btn-header transparent pull-right">
								<span> 
									<a title="Kembali Ke Halaman Awal" href="<?php echo Yii::app()->getbaseUrl(true); ?>/site/landing">
										Halaman Awal
									</a> 
								</span>
							</div>
						<?php endif; ?>	
						<div id="fullscreen" class="btn-header transparent pull-right">
							<span> 
								<a title="Kembali Ke Halaman Sebelumnya" onclick="backpage()">
									<i class="fa fa-reply"></i>
								</a> 
							</span>
						</div>					
						
						<!-- end fullscreen button -->

						<!-- multiple lang dropdown : find all flags in the image folder -->
						
						<!-- end multiple lang -->

					</div>
					<!-- end pulled right: nav area -->

				</header>
				<!-- END HEADER -->

				<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
				Note: These tiles are completely responsive,
				you can add as many as you like
			-->			
			<form id="DoLock" action="site/lock" method="post">
				<input type="hidden" name="id" id="pengguna_id" value="<?php echo Yii::app()->user->getId(); ?>">						
			</form>
			<!-- END SHORTCUT AREA -->
			<script type="text/javascript">
				/*pageSetUp();
				$(document).ready(function() {
					cekpesan();
				});*/
				window.URI = "<?php echo Yii::app()->getbaseUrl(true); ?>";
				function cekpesan () {
					$.ajax({
						url: 'app/pesan/cekpesan',
						type: 'POST',
						data: {},
						success: function (respon) {
							$('#jml_inbox').html(respon);
								/*if (respon>0) {

									$('<audio id="notifberkas"><source src="themes/smartadmin/sound/notify.mp3" type="audio/mpeg"></audio>').appendTo('body');
									$('#notifberkas')[0].play();
								}*/
							}
						});
				}

				function backpage () {
					parent.history.back();
				}
			</script>

			<?php if (isset(Yii::app()->user->username)): ?>
			<?php if(Yii::app()->user->role_id==1): ?>
			<script type="text/javascript">
				setInterval(function(){ cekpesan(); }, 60000);
			</script>
			<?php endif; ?>
			<?php endif; ?>

			<?php
		}
		?>

		

		

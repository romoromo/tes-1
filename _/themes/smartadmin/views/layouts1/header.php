<?php
	/*konfigurasi yang disesuaikan dari SmartAdmin*/
	define('ASSETS_URL', Yii::app()->theme->baseUrl); // atur ASSET_URL / base url adalah path dari theme
	$page_title = "";
	$page_css = array();
	
	//$page_body_prop = array("class"=>"fixed-ribbon fixed-header fixed-navigation menu-on-top smart-style-3"); //optional properties for <body>
	$page_body_prop = array("class"=>"fixed-header menu-on-top smart-style-3"); //optional properties for <body>
	if( defined('LOGIN') ) 
		$page_body_prop = array(
		"id"=>"login",
		 "class"=>"animated fadeInDown bg",
		 "style"=>"min-height: 618px; background: url(<?php echo APP_URL; ?>/themes/smartadmin/img/images/bg.jpg);background-size:cover;"
		 ); // jika yang mengakses LOGIN, maka tambahkan property css untuk form login
//configure constants
	$namaaplikasi = AppConfig::model()->find('tblappconfig_key=:key', array(':key'=>'APLIKASI_NAMA'));
	$namabadan = AppConfig::model()->find('tblappconfig_key=:key', array(':key'=>'APLIKASI_INSTANSI'));
	$namapemerintah = AppConfig::model()->find('tblappconfig_key=:key', array(':key'=>'APLIKASI_PEMERINTAH'));

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

		<!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/smartadmin-production.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/smartadmin-skins.css">

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
		<link rel="shortcut icon" href="<?php echo ASSETS_URL; ?>/img/images/1favicon.png" type="image/png">
		<link rel="icon" href="<?php echo ASSETS_URL; ?>/img/images/1favicon.png" type="image/png">

		<!-- GOOGLE FONT -->
		<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700"> -->

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
				width: 400px !important;
				margin-top: 0px !important;
			}
			.logos img {
				width: 36px !important;
				margin: 3px 0px 0px -3px !important;
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
		</style>
	</head>
<body <?php
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
		<?php /*header id="header" style="background-image: linear-gradient(to bottom,#1B7150,rgba(32, 139, 103, 1));border-bottom: 2px solid #D5C7C7;box-shadow: 1px 1px 2px #DDDB18;"*/ ?>
		<header id="header" style="background-image: linear-gradient(to bottom,#1B7150,rgba(32, 139, 103, 1));border-bottom: 2px solid #D5C7C7;box-shadow: 1px 1px 2px #DDDB18;">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo" class="logos">
					<img src="<?php echo ASSETS_URL; ?>/img/images/favicon.png" class="pull-left" alt="LOGO">
					<h4 class="pull-left redaksional_app"><?php echo $namaaplikasi->tblappconfig_value; ?></h4>
					<h4 class="pull-left badan_app"><?php echo $namapemerintah->tblappconfig_value; ?></h4>
				</span>
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

				<?php if (!(Yii::app()->user->isGuest)): ?>
				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="<?php echo APP_URL; ?>/site/logout" title="Log Out" data-logout-msg="Terima Kasih, telah menggunakan aplikasi ini. Klik Ya untuk logout."><i class="fa fa-sign-out"></i></a> </span>
				</div>
				<!-- end logout button -->
				<?php else: ?>
				<!-- kembali button -->
				<div id="kembali" class="btn-header transparent pull-right">
					<span> <a href="<?php echo APP_URL; ?>/site/login" title="Kembali ke halaman awal" ><i class="fa fa-reply"></i> Kembali ke Halaman Awal</a> </span>
				</div>
				<!-- end kembali button -->
				<?php endif ?>

				<!-- search mobile button (this is hidden till mobile view port) -->
						<?php /* <div id="search-mobile" class="btn-header transparent pull-right">
							<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
						</div> */ ?>
						<!-- end search mobile button -->

						<!-- input: search field -->
						<?php /* <form action="#ajax/search.php" class="header-search pull-right">
							<input type="text" name="param" placeholder="Pencarian" id="search-fld">
							<button type="submit">
								<i class="fa fa-search"></i>
							</button>
							<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
						</form> */ ?>
						<!-- end input: search field -->

						<!-- fullscreen button -->

						<div id="fullscreen" class="btn-header transparent pull-right">
							<span> <a href="javascript:void(0);" onClick="launchFullscreen(document.documentElement);" title="Full Screen"><i class="fa fa-fullscreen"></i></a> </span>
						</div>

						<?php if (!Yii::app()->user->isGuest): ?>

							<?php $displ = ( isset(Yii::app()->user->bloksistem_id) ) ?  "" : "display:none;"; ?>
							<div id="tampil-berkas" class="btn-header pull-right" style="<?php //echo $displ; ?>">
								<span>
									<a href="#" id="cek_berkas" onclick="cekBelumDataPajak();cekBelumPenetapanPajak();cekBelumPenyetoranPajak();" title="Cek Berkas">Cek Berkas</a>
								</span>
							</div>
							<?php if(Yii::app()->user->loket!=0 && Yii::app()->user->group!=0 ): ?>
								<div id="antrian_ulang" class="btn-header pull-right" style="<?php echo $displ; ?>">
									<span>
										<a onClick="panggil_ulang()" href="javascript:void(0);" id="paggil_antrian" title="Panggil Ulang">Panggil Ulang </a>
									</span>
								</div>
								<div id="antrian" class="btn-header pull-right" style="<?php echo $displ; ?>">
									<span>
										<a  onClick="panggil_antrian()" href="javascript:void(0);" id="paggil_antrian" title="Panggil Antrian">Panggil Antrian </a>
									</span>
								</div>
							<?php endif; ?>
						<?php endif ?>
						<!-- BErkas Tombol Control -->

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
			<div id="shortcut">
				<ul>
					<?php if (Tblrole::isRole("SUPERADMIN") OR Tblrole::isRole("PENDATAAN")): ?>
					<li>
						<a href="#pendaftaran/berkas" class="jarvismetro-tile big-cubes double bg-color-blue">
							<span class="badge  bounceIn animated bg-color-red pull-right" id="number_of_belum_data_pajak" style="padding: 10px!important;">0</span>
							<span class="iconbox"> <i class="fa fa-inbox fa-4x"></i>
								<span class="text-align-center">WP Belum Pendataan Bulan ini</span>
							</span>
						</a>
					</li>
					<?php endif ?>
					<?php if (Tblrole::isRole("SUPERADMIN") OR Tblrole::isRole("PENETAPAN")): ?>
					<li>
						<a href="#pendaftaran/berkas/belumpenetapan" class="jarvismetro-tile big-cubes double bg-color-yellow">
							<span class="badge  bounceIn animated bg-color-red pull-right" id="number_of_belum_penetapan_pajak" style="padding: 10px!important;">0</span>
							<span class="iconbox"> <i class="fa fa-legal fa-4x"></i>
								<span class="text-align-center">WP Belum Penetapan Bulan ini</span>
							</span>
						</a>
					</li>
					<?php endif ?>
					<?php if (Tblrole::isRole("SUPERADMIN") OR Tblrole::isRole("PENYETORAN")): ?>
					<li>
						<a href="#pendaftaran/berkas/belumpenyetoran" class="jarvismetro-tile big-cubes double bg-color-magenta">
							<span class="badge  bounceIn animated bg-color-red pull-right" id="number_of_belum_penyetoran_pajak" style="padding: 10px!important;">0</span>
							<span class="iconbox"> <i class="fa fa-dollar fa-4x"></i>
								<span class="text-align-center">WP Belum Penyetoran Bulan ini</span>
							</span>
						</a>
					</li>
					<?php endif ?>
						<form id="DoLock" action="site/lock" method="post">
							<input type="hidden" name="id" id="pengguna_id" value="<?php echo Yii::app()->user->getId(); ?>">
						</form>
					</ul>
					</div>
					<!-- END SHORTCUT AREA -->
					<style type="text/css">
						#header
						{
							background-image: linear-gradient(to bottom,#66D6DF,#2AA39A);
						}
						.smart-style-2 .btn-header>:first-child>a {
							color: #5D616F;
						}
					</style>

					<?php
				}
				?>
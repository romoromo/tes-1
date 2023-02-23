		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php echo ASSETS_URL; ?>/js/plugin/pace/pace.min.js"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
		<script>
		/*--------------KONFIGURASI-----------*/
			window.APP_THEMES = '<?php echo ASSETS_URL; ?>/'; // path themes
			// logo aplikasi
			// gambar diambil dari path themes smartadmin/img/images
			$logo_default = 'favicon.png';
			$logo_dark = 'favicon.png';
			$logo_ultra = 'favicon.png';
			$logo_googleskin = 'favicon.png';

			if (!window.jQuery) {
				document.write('<script src="<?php echo ASSETS_URL; ?>/js/libs/jquery-2.0.2.min.js"><\/script>');
			}
		</script>

		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> -->
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="<?php echo ASSETS_URL; ?>/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

		<!-- BOOTSTRAP JS -->
		<script src="<?php echo ASSETS_URL; ?>/js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="<?php echo ASSETS_URL; ?>/js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="<?php echo ASSETS_URL; ?>/js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/fastclick/fastclick.js"></script>

		<!--[if IE 7]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only -->
		<script src="<?php echo ASSETS_URL; ?>/js/demo.js"></script>

		<!-- MAIN APP JS FILE -->
		<script src="<?php echo ASSETS_URL; ?>/js/app.js?v=20171005"></script>
		<script src="<?php echo ASSETS_URL; ?>/js/custom.js"></script>
		<script src="<?php echo ASSETS_URL; ?>/js/idle.js"></script>

		<script type="text/javascript">
			console.log("cache disabled");
			jQuery(document).ready(function($) {
				$.ajaxSetup({
				    // Disable caching of AJAX responses
				    cache: false
				});
			});

			function handelErr(jqXHR, exception) {
				console.log(jqXHR);
				console.log(exception);
				if (jqXHR.statusText === 'error' ) {
					msg = 'Tidak terkoneksi dengan internet. Periksa koneksi jaringan Anda.';
				} else if (jqXHR.status == 404) {
					msg = 'Laman yang diminta tidak ada. [404]';
				} else if (jqXHR.status == 500) {
					msg = 'Terdapat Kesalahan Server [500].';
				} else if (exception === 'parsererror') {
					msg = 'Requested JSON parse failed.';
				} else if (exception === 'timeout') {
					msg = 'Kesalahan Time out.';
				} else if (exception === 'abort') {
					msg = 'Request dibatalkan.';
				} else {
					msg = 'Uncaught Error.\n' + jqXHR.responseText;
				}
				notifikasi('Maaf', msg + ' Mohon ulangi, jika masih bermasalah laporkan & lampirkan screenshot ke Administrator.', 'fail',0,0);
			}
		</script>
		<script type="text/javascript" src="<?= Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-priceformat/jquery.price_format.2.0.min.js"></script>
		<script type="text/javascript">
			loadScript("<?= Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/moment-js/moment-with-locales.min.js", setMoment);
			function setMoment() {
				moment.locale('id');
			}
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				$(window).keydown(function(event){
					if(event.keyCode == 13) {
						event.preventDefault();
						return false;
					}
				});
			});
		</script>
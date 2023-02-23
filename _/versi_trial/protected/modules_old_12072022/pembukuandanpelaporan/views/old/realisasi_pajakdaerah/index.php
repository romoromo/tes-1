<?php Yii::import('ext.LokalIndonesia'); ?>
<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-file-text fa-fw "></i> 
			Realisasi Penerimaan Pajak Daerah
		</h1>
	</div>
</div>

<div class="row">

	<!-- NEW WIDGET START -->
	<article class="col-sm-12 col-md-12 col-lg-12">

		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget" id="wid-idss-0" data-widget-colorbutton="false" data-widget-editbutton="false" >
				<!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"

			-->
			<header>
				<span class="widget-icon"> <i class="fa fa-search"></i> </span>
				<h2>Pencarian</h2>

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

					<form action="" id="order-form" class="smart-form" novalidate="">
						<fieldset>
							<div class="row">
								<section class="col col-md-2">
									<p>Tahun </p>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<label class="input">
											<input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="masapajak_tahun" name="masapajak_tahun">
										</label>
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Bulan </p>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select class="select2" id="bulan" name="bulan">
											<option value="1">Januari</option>
											<option value="2">Februari</option>
											<option value="3">Maret</option>
											<option value="4">April</option>
											<option value="5">Mei</option>
											<option value="6">Juni</option>
											<option value="7">Juli</option>
											<option value="8">Agustus</option>
											<option value="9">September</option>
											<option value="10">Oktober</option>
											<option value="11">November</option>
											<option value="12">Desember</option>
										</select>
									</label>
								</section><i></i>
							</div>
						</fieldset>
						<footer>
							<button type="button" onclick="cari()" class="btn btn-primary pull-left">
								<i class="fa fa-search"></i> Cari
							</button>
						</footer>
					</form>

				</div>
				<fieldset>
					<legend>
						<!-- WIDGET END -->
					</legend>
				</fieldset>
			</div>
		</div>
	</article>
</div>

<div class="row">

	<!-- NEW WIDGET START -->

	<article class="col-sm-12 col-md-12 col-lg-12">


		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-color-darken" id="wid-id-7" data-widget-editbutton="false"
		data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
				<!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"

			-->
			<header>
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>Hasil Pencarian </h2>

			</header>

			<!-- widget div-->
			<div>

				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->

				</div>
				<!-- end widget edit box -->

				<!-- widget content -->
				
				<!-- end widget content -->
				<div class="table-responsive" style="max-width: 100%; height: 400px!important; overflow: auto;">
					<button class="btn btn-sm btn-default" onclick="cetak('html')">
						<i class="fa fa-print"></i> Cetak Html
					</button>
					<button class="btn btn-sm btn-success" onclick="cetak('excel')">
						<i class="fa fa-table"></i> Cetak Excel
					</button>
					<div id="tabel_laporan">							
						<center><i><b>Silahkan Lakukan Pencarian Terlebih Dahulu</b></i></center>
					</div>
				</div>
			</div>
			<!-- end widget div -->

		</div>

	</div>

	<script type="text/javascript">
		pageSetUp();

		LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

		function cari () {
			$("#tabel_laporan").html('<div align="center">'+LOADER+'').fadeIn(400);
			$.ajax({
				url: 'pembukuandanpelaporan/realisasi_pajakdaerah/Cari',
				type: 'POST',
				data: {
					tahun: $('#masapajak_tahun').val(),
					bulan: $('#bulan').val(),
				},
				success: function (respon) {
					$("#tabel_laporan").html(respon);
					$("#tabel_laporan").prepend('<div align="center">'+LOADER+'');
					$(".loader_img").fadeOut(1000);
				}
			});

		}

		function cetak (jenis) {
			var tahun = $('#masapajak_tahun').val();
			var bulan = $('#bulan').val();

			window.open('<?php echo Yii::app()->getBaseUrl(1) ?>/pembukuandanpelaporan/realisasi_pajakdaerah/Cetak?tahun='+tahun+'&bulan='+bulan+'&jenis='+jenis);
		}


	</script>


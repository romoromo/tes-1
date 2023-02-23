<!-- Cetak Rekap Penerimaan Per-Jenis -->
<?php define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Cetak Rekap Penerimaan Per-Jenis</h4>
		</div>
	</div>
</div>

<section id="widget-grid" class="">
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
			<div class="jarviswidget jarviswidget-color-teal jarviswidget-sortable" id="widget_cetakrekapper_jenisizin" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" role="widget" style="">
				<header role="heading">
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Pencarian Data</h2>
					<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
					<div role="content">
						<div class="jarviswidget-editbox">
						</div>
						<div class="widget-body">
							<form id="form_tahun" class="smart-form" novalidate="">
								<fieldset>
									<div class="row">
										<section class="col col-md-2">
											<p>Tahun </p>
										</section>
										<section class="col col-md-2">
											<label class="select">
												<label class="input">
													<input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="tahun" name="tahun">
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
													<option value="01">Januari</option>
													<option value="02">Februari</option>
													<option value="03">Maret</option>
													<option value="04">April</option>
													<option value="05">Mei</option>
													<option value="06">Juni</option>
													<option value="07">Juli</option>
													<option value="08">Agustus</option>
													<option value="09">September</option>
													<option value="10">Oktober</option>
													<option value="11">November</option>
													<option value="12">Desember</option>
												</select>
											</label>
										</section><i></i>
									</div>		
								</fieldset>
								<footer>
									<button type="button" class="btn btn-sm btn-primary" onclick="cari()">
										<i class="fa  fa-search"></i>&nbsp;Cari
									</button>
								</footer>
							</form>
						</div>
					</div>
				</div>
			</article>
		</div>
		<!-- end row -->
		<div class="row">
			<article class="col-sm-12 col-md-12 col-lg-12">

				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-7" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
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

						<div class="table-responsive" style="max-width: 100%; height: 400px!important; overflow: auto;">
							<button class="btn btn-sm btn-default" onclick="cetak('html')">
								<i class="fa fa-print"></i> Cetak Html
							</button>
							<button class="btn btn-sm btn-success" onclick="cetak('excel')">
								<i class="fa fa-table"></i> Cetak Excel
							</button>
							<div id="tabel_laporan"></div>
							<center><i><b>Silahkan Lakukan Pencarian Terlebih Dahulu</b></i></center>
						</div>
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
		</article>

	</div>

</section>
<script type="text/javascript">

	pageSetUp();

	jQuery(document).ready(function($) {
		$('#bulan').select2('val', <?= date('m') ?> );
	});

	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

	function cari () {
		$("#tabel_laporan").html('<div align="center">'+LOADER+'').fadeIn(400);
		$.ajax({
			url: 'pembukuandanpelaporan/cetakrekap_jenis/Cari',
			type: 'POST',
			data: {
				tahun: $('#tahun').val(),
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
		var tahun = $('#tahun').val();
		var bulan = $('#bulan').val();

		window.open('<?php echo Yii::app()->getBaseUrl(1) ?>/pembukuandanpelaporan/cetakrekap_jenis/Cetak?jenis='+jenis+'&tahun='+tahun+'&bulan='+bulan);
	}

	// function cetak(jenis) {
	// 	var param = jQuery.param(
	// 		{
	// 			tahun: $("#tahun").val,
	// 			bulan: $("#bulan").val,
	// 		});
	// 	window.open('<?= Yii::app()->getBaseUrl(1); ?>/pembukuandanpelaporan/Cetakrekap_jenis/Cetakword?'+ param);
	// }

</script>
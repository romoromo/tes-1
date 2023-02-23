<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-file-text fa-fw "></i> 
			Cetak Daftar Setoran WP/WR
		</h1>
	</div>
</div>

<div class="row">

	<!-- NEW WIDGET START -->
	<article class="col-sm-12 col-md-12 col-lg-12">

		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" >
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
									<h4><b>Tanggal Setor</b></h4>
								</section>
								<section class="col col-sm-2">
									<label class="input">
										<input type="number" value="<?php echo date('Y'); ?>" type="text" id="tahun" name="tahun">
									</label>
								</section>
								<section class="col col-sm-2">
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
								</section>
								<section class="col col-sm-2">
									<label class="input">
										<input type="text" id="tanggal" name="tanggal" placeholder="Tanggal">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Kode BANK/POS/BKP </p>
								</section>
								<section class="col col-md-3">
									<label class="select">
										<select class="select2" id="kode_bank" name="kode_bank">
											<option value="">-- Silahkan Pilih --</option>
											<option value="01">BANK</option>
											<option value="02">POS</option>
											<option value="03">BKP</option>
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
				<div class="table-responsive" style="max-width: 100%; height: 400px!important; overflow: auto;">
					<button class="btn btn-sm btn-default" onclick="cetak('html')">
						<i class="fa fa-print"></i> Cetak Html
					</button>
					<button class="btn btn-sm btn-success" onclick="cetak('excel')">
						<i class="fa fa-table"></i> Cetak Excel
					</button>
					<button class="btn btn-primary" onclick="cetakword()">
						<i class="fa fa-print"></i>	Cetak Word
					</button>
					<div id="tabel_laporan">
						<center><i><b>Silahkan Lakukan Pencarian Terlebih Dahulu</b></i></center>
					</div>
				</div>
				<!-- end widget content -->

			</div>
			<!-- end widget div -->

		</div>

	</div>

	<script type="text/javascript">
		pageSetUp();

		jQuery(document).ready(function($) {
			$('#bulan').select2('val', <?= date('m') ?> );
		});

		LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

		function cari () {
			$("#tabel_laporan").html('<div align="center">'+LOADER+'').fadeIn(400);
			$("#dtbasic2").html('hide');
			
			
			$.ajax({
				url: 'pembukuandanpelaporan/cetaksetoran_wpwr/Cari',
				type: 'POST',
				data: {
					tanggal: $('#tanggal').val(),
					bulan: $('#bulan').val(),
					tahun: $('#tahun').val()
				},
				success: function (respon) {
					$("#tabel_laporan").html(respon);
					$("#tabel_laporan").prepend('<div align="center">'+LOADER+'');
					$(".loader_img").fadeOut(1000);
					$("#ctkhtml").show();
					$("#ctkexcel").show();
					$('#tblatas').hide();
				}
			});

		}

		function cetak (jenis) {
			var tanggal = $('#tanggal').val();
			var bulan = $('#bulan').val();
			var tahun = $('#tahun').val();
			
			window.open('<?php echo Yii::app()->getBaseUrl(1) ?>/pembukuandanpelaporan/cetaksetoran_wpwr/Cetak?tanggal='+tanggal+'&jenis='+jenis+'&bulan='+bulan+'&tahun='+tahun);
		}

		function cetakword(){
			var param = jQuery.param(
				{
					// tanggal: $("#tanggal").val(),
					tgl: $("#tanggal").val(),
					bulan: $("#bulan").val(),
					tahun: $("#tahun").val(),
					jenis: 'word',
				});
			// window.open('<?= Yii::app()->getBaseUrl(1); ?>/pembukuandanpelaporan/cetaksetoran_wpwr/cetakword?'+ param);
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/penyetoran/cetakdaftarsetoranwpwr/cetak?'+ param);
		}
	</script>


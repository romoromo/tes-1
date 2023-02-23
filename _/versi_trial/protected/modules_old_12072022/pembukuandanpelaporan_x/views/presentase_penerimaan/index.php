
<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-file-text fa-fw "></i> 
			Presentase Realisasi Penerimaan
		</h1>
	</div>
</div>

<div class="row">
	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
		<div class="jarviswidget jarviswidget-color-teal jarviswidget-sortable" id="widget_cetakjenisbuku" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" role="widget" style="">
			<header role="heading">
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>Pencarian Data</h2>
				<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
				<div role="content">
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body">
						<form id="form_sumber_pajak" class="smart-form" novalidate="">
							<fieldset>
								<div class="row">
									<div class="row">
										<section class="col col-md-2">
											<p>Rekening </p>
										</section>
										<section class="col col-md-5">
											<label class="select"> 
												<select class="select2" id="TBLREKENING_KODE" name="TBLREKENING_KODE">
													<option value="">-- Pilih Rekening --</option>
													<?php foreach ($data['rek'] as $list): ?>
														<option value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>Tahun </p>
										</section>
										<section class="col col-md-1">
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
												<select class="select2" id="masapajak_bulan" name="masapajak_bulan">
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

		LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

		function cari () {
			$("#tabel_laporan").html('<div align="center">'+LOADER+'').fadeIn(400);
			$.ajax({
				url: 'pembukuandanpelaporan/presentase_penerimaan/Cari',
				type: 'POST',
				data: {
					// tgl_setor: $('#tgl_setor').val(),
				},
				success: function (respon) {
					$("#tabel_laporan").html(respon);
					$("#tabel_laporan").prepend('<div align="center">'+LOADER+'');
					$(".loader_img").fadeOut(1000);
				}
			});

		}

		function cetak () {
			var no_subrek = $('#no_subrek').val();

			if ($('#no_subrek').val()=='') {
				notifikasi('Informasi','Mohon pilih rekening','failed',1,0);
			}else{
				window.open('<?php echo Yii::app()->getBaseUrl(1) ?>/pembukuandanpelaporan/presentase_penerimaan/Cetak?');
			}
		}

	</script>


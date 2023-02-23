<?php define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Cetak Buku Jenis / Laporan Per Ayat Per Bulan</h4>
		</div>
	</div>
</div>

<section id="widget-grid" class="">
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
													<select class="select2" id="rek" name="rek">
														<option value="">== Silahkan Pilih Rekening ==</option>
														<?php foreach ($data['rek'] as $combo_subrek): ?>
															<option value="<?php echo $combo_subrek['TBLREKENING_REKAYAT']; ?>">[<?php echo $combo_subrek['TBLREKENING_KODE_90'] ?>] <?php echo $combo_subrek['TBLREKENING_NAMAREKENING_90']; ?></option>
														<?php endforeach ?>
													</select>
												</label>
											</section>
										</div>
										<div class="row">
											<section class="col col-md-2">
												<p>Tahun </p>
											</section>
											<section class="col col-md-2">
												<label class="input"> 
												<input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="masapajak_tahun" name="masapajak_tahun">
													</label> 
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">
													<p>Bulan </p>
												</section>
												<section class="col col-md-2">
													<label class="select">
														<select class="select2" id="masapajak_bulan" name="masapajak_bulan" >
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
			<!-- end row -->
			<div class="row" id="id_respencarian">
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
							<div class="table-responsive" style="max-width: 100%; height: 800px!important; overflow: auto;">
								<button class="btn btn-sm btn-default" onclick="cetak()">
									<i class="fa fa-print"></i> Preview
								</button>
								<button class="btn btn-sm btn-success" onclick="cetak('excel')">
									<i class="fa fa-table"></i> Cetak Excel
								</button>
								<button class="btn btn-primary" onclick="cetakword()">
									<i class="fa fa-print"></i>	Cetak Word
								</button>
								<br>
								<br>
								<div id="tabel_laporan">							
									<center><i><b>Silahkan Lakukan Pencarian Terlebih Dahulu</b></i></center>
								</div>
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
			$('#masapajak_bulan').select2('val', <?= date('m') ?> );
			$('#id_respencarian').hide();
		});

		LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

		function cari () {
			$("#tabel_laporan").html('<div align="center">'+LOADER+'').fadeIn(400);
			$.ajax({
				url: '<?= $this->MODULE_URL ?>/Cari',
				type: 'POST',
				data: {
					rek: $('#rek').val(),
					masapajak_tahun : $('#masapajak_tahun').val(),
					masapajak_bulan : $('#masapajak_bulan').val()
				},
				success: function (respon) {
					$('#id_respencarian').show('fast');
					$("#tabel_laporan").html(respon);
					$("#tabel_laporan").prepend('<div align="center">'+LOADER+'');
					$(".loader_img").fadeOut(1000);
				}
			});

		}

		function cetak (jenis) {
			var rek = $('#rek').val();
			var masapajak_tahun = $('#masapajak_tahun').val();
			var masapajak_bulan = $('#masapajak_bulan').val();

			window.open('<?php echo Yii::app()->getBaseUrl(1) ?>/<?= $this->MODULE_URL ?>/Cetak?jenis='+jenis+'&rek='+rek+'&masapajak_tahun='+masapajak_tahun+'&masapajak_bulan='+masapajak_bulan);
			$('#id_respencarian').hide();
		}

		function cetakword(){
			var param = jQuery.param(
			{
				// TBLREKENING_REKAYAT: $("#TBLREKENING_AYAT").val(),
				masapajak_bulan: $("#masapajak_bulan").val(),
				masapajak_tahun: $("#masapajak_tahun").val(),
				rek: $("#rek").val(),
			});
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/<?= $this->MODULE_URL ?>/cetakword?'+ param);
			$('#id_respencarian').hide();

		}

	</script>
<?php
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<?php //include_once Yii::app()->getBasePath() . '/views/site/' . 'maintenance.php'; Yii::app()->end(); 
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Verifikasi SKPD</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-teguran" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-sortable="false">
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
					<h2>Pilih Data</h2>

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

						<form action="" id="form-cari" class="smart-form" novalidate>
							<fieldset>

								<div class="row">
									<section class="col col-md-2">
										<p>Tahun Pajak</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input value="<?= date('Y') ?>" type="number" id="CARI_THNPAJAK" name="cari[THNPAJAK]" placeholder="Tahun" maxlength="4">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Bulan Pajak</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="CARI_BLNPAJAK" name="cari[BLNPAJAK]">
												<option value="">-- Bulan --</option>
												<?php for ($i = 1; $i <= 12; $i++) : ?>
													<option <?php //echo $i==(int)date('m') ? 'selected' : '' 
															?> value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
												<?php endfor ?>
											</select>
										</label>
									</section>
								</div>


								<div class="row hidden">
									<section class="col col-md-2">
										<p>Jenis Pajak</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="CARI_REKPAJAK" name="cari[REKPAJAK]">
												<option value="">-- Pilih Jenis Pajak --</option>
												<option value="T">Pajak Air Tanah</option>
												<option value="F">Pajak Reklame</option>
											</select>
										</label>
									</section>
								</div>
							</fieldset>
							<footer>
								<button type="button" class="btn btn-sm btn-primary" id="btnCari">
									<i class="fa fa-search"></i>&nbsp;Cari
								</button>
							</footer>
						</form>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>
		<!-- WIDGET END -->
	</div>
	<!-- end row -->
	</div>
	<!-- end row -->

	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-orange" id="wid-id-data_sauus" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
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
					<h2>&nbsp;Data</h2>

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
						<div class="widget-body-toolbar">
							<button style="display: none;" class="btn btn-success" id="btnVerifikasi"><i class="fa fa-check"></i> Verifikasi Semua</button>
						</div>
						<?php if (Yii::app()->user->username == 'diginet_kabid') : ?>

							<div class="widget-body-toolbar">
								<button class="btn btn-success" id="btnVerifikasisimulasi"><i class="fa fa-check"></i> Verifikasi Simulasi</button>
							</div>
						<?php endif ?>

						<div id="tabel-cari" class="">



						</div>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>
		<!-- WIDGET END -->

	</div>



</section>



<!--Modal Salin-->
<div class="modal fade" id="salin_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Proses Salin
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form class="smart-form" id="form-pemohon">
					<fieldset>
						<div class="row">
							<section class="col col-md-3">
								<p>Tahun Penetapan </p>
							</section>
							<section class="col col-md-6">
								<label class="input">
									<input value="" type="text" name="tahun" id="tahun">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-3">
								<p>Bulan Penetapan </p>
							</section>
							<section class="col col-md-6">
								<label class="select">
									<select name="jenis_penerimaan">
										<option selected="" disabled="">== Silahkan Pilih ==</option>
										<option>Januari</option>
										<option>Februari</option>
										<option>Maret</option>
										<option>April</option>
										<option>Mei</option>
										<option>Juni</option>
										<option>Juli</option>
										<option>Agustus</option>
										<option>September</option>
										<option>Oktober</option>
										<option>November</option>
										<option>Desember</option>
									</select> <i></i>
								</label>
							</section>
						</div>
					</fieldset>

					<footer>
						<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="simpan()">
							Salin
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
					</footer>
				</form>


			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script type="text/javascript">
	pageSetUp();
	LOADER = ''

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');

		$("#btnCari").click(function(event) {
			caridata();
		});
	});

	function caridata() {
		var param = {

		}
		$.ajax({
			url: 'penetapan/tte_skpd_airtanah/caridata',
			type: 'POST',
			data: $("#form-cari").serialize() + '&' + $.param(param),
			success: function(respon) {
				$("#tabel-cari").html(respon);
				$("#tabel-cari").show();
				$("#tabel-cari").prepend('<div align="center">' + LOADER + '');
				$(".loader_img").fadeOut(1000);
			}
		});
	}

	function verifikasi_all() {
		$.SmartMessageBox({
			title: "Konfirmasi",
			content: "Apakah anda yakin akan memverifikasi seluruh data ini?",
			buttons: '[Tidak][Ya]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				var param = {
					data: '',
				}
				$.ajax({
						url: 'penetapan/tte_skpd_airtanah/verifikasi',
						type: 'POST',
						dataType: 'json',
						data: $("#form-cari").serialize() + '&' + $.param(param),
					})
					.done(function(respon) {
						if (respon.status == 'success') {
							console.log("success");
							notifikasi('Berhasil', 'Sudah diverifikasi', 'success', 1, 0);
							setTimeout(function() {
								$("#btnCari").click();
							}, 1000);
						} else {
							notifikasi('Gagal', respon.message, 'failed', 1, 0);
						}
					})
					.fail(function(jqXHR, exception) {
						handelErr(jqXHR, exception)
					})
					.always(function() {
						console.log("complete");
					});
			}
		});
	}

	function verifikasi_simulasi() {
		$.SmartMessageBox({
			title: "Konfirmasi",
			content: "Apakah anda yakin akan memverifikasi seluruh data ini?",
			buttons: '[Tidak][Ya]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				var param = {
					data: '',
				}
				$.ajax({
						url: 'penetapan/tte_skpd_airtanah/verifikasisimulasi',
						type: 'POST',
						dataType: 'json',
						data: $("#form-cari").serialize() + '&' + $.param(param),
					})
					.done(function(respon) {
						console.log("success");
						if (respon.status == 'success') {
							notifikasi('Berhasil', 'Sudah diverifikasi', 'success', 1, 0);
							setTimeout(function() {
								$("#btnCari").click();
							}, 1000);
						}
					})
					.fail(function(jqXHR, exception) {
						handelErr(jqXHR, exception)
					})
					.always(function() {
						console.log("complete");
					});
			}
		});
	}
</script>
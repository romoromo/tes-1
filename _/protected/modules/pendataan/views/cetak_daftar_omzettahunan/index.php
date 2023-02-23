<?php define('ASSETS_URL', Yii::app()->theme->baseUrl); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Cetak Daftar Omzet Tahunan</h4>
		</div>
	</div>
</div>

<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

			<!-- Widget ID (each widget will need unique ID)-->

			<!-- end widget -->

			<div class="jarviswidget jarviswidget-color-teal jarviswidget-sortable" id="wid-i874t8735f87345" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" role="widget" style="">
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
			<header role="heading">
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>Pencarian Data</h2>

				<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
			</header>

				<!-- widget div-->
				<div role="content">

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body">

						<form id="form-pendataan-restoran" class="smart-form">
							<fieldset>
								<div class="row">
									<section class="col col-md-2">
										<p>Tahun Pajak</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input  placeholder="99" type="number" id="TBLPENDATAAN_THNPAJAK" name="param[TBLPENDATAAN_THNPAJAK]" value="<?= date('Y') ?>" placeholder="Tahun" maxlength="4">
										</label>
									</section>
									<section class="col col-md-2" style="display: none;">
										<label class="select">
											<select class="" id="TBLPENDATAAN_BLNPAJAK" name="param[TBLPENDATAAN_BLNPAJAK]">
												<option value="">-- Bulan --</option>
												<?php for ($i=1; $i<=12; $i++): ?>
													<option  value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
												<?php endfor ?>
											</select><i class="fa fa-square"></i>
										</label>
									</section>

									<section class="col col-md-2" style="display: none;">
										<label class="input">
											<input maxlength="2" value="<?php //= date('d') ?>" type="number" id="TBLPENDATAAN_TGLPAJAK" name="param[TBLPENDATAAN_TGLPAJAK]" placeholder="Tanggal" maxlength="2">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Rekening</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TBLREKENING_KODE" name="TBLREKENING_KODE">
												<option value="">-- Pilih Rekening --</option>
												<?php foreach ($data['rek'] as $list): ?>
													<option value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>

									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TBLREKENING_KODESUB" name="TBLREKENING_KODESUB">
												<option value="">-- Pilih Sub Rekening --</option>
												<?php /*foreach ($data['sub_rek'] as $list): ?>
													<option value="<?php echo $list['TREKENING_KODE'] ?>">[<?php echo $list['TREKENING_KODE'] ?>] <?php echo $list['TREKENING_NAMA'] ?></option>
												<?php endforeach*/ ?>
											</select>
										</label>
									</section>
								</div>

								<div class="row" style="display:none">
									<section class="col col-md-2">
										<p>Tgl. Entry SPT</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input maxlength="2" placeholder="99" type="text" id="ENTRI_THNPAJAK" name="param[ENTRI_THNPAJAK]" value="<?= date('y') ?>" placeholder="Tahun" maxlength="4">
										</label>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="" id="ENTRI_THNPAJAK" name="param[ENTRI_THNPAJAK]">
												<option value="">-- Bulan --</option>
												<?php for ($i=1; $i<=12; $i++): ?>
													<option <?php echo $i==(int)date('m') ? 'selected' : '' ?> value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
												<?php endfor ?>
											</select><i class="fa fa-square"></i>
										</label>
									</section>

									<section class="col col-md-2">
										<label class="input">
											<input maxlength="2" value="<?php //= date('d') ?>" type="number" id="ENTRI_TGLPAJAK" name="param[ENTRI_TGLPAJAK]" placeholder="Tanggal" maxlength="2">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TBLKECAMATAN_ID" name="TBLKECAMATAN_ID">
												<option value="">-- Pilih Kecamatan --</option>
												<?php foreach ($data['list_kecamatan'] as $list): ?>
													<option value="<?php echo $list['REFKECAMATAN_ID'] ?>">[<?php echo $list['REFKECAMATAN_ID'] ?>] <?php echo $list['REFKECAMATAN_NAMA'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
								</div>

							<footer>
								<div id="tbl_simpan">
									<button type="button" onclick="cetak()" class="btn btn-sm btn-success">
										<i class="fa fa-print"></i>&nbsp;Cetak
									</button>

									<button type="button" onclick="cari()" class="btn btn-sm btn-primary">
										<i class="fa fa-search"></i>&nbsp;Cari
									</button>
									
									<!-- <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
										<i class="fa fa-ban"></i>	Batal
									</button> -->
								</div>
							</footer>
						</form>

					</div>

				</div>
					<!-- end widget div -->

			</div>
		</article>
				<!-- WIDGET END -->
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

						<div id="div_tabel" class="">
						
							
							
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

<script type="text/javascript">
	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';
	pageSetUp();

	function cari() {
		$("#div_tabel").html('<div align="center">'+LOADER+'').fadeIn(400);
		$.ajax({
			url: 'pendataan/cetak_daftar_omzettahunan/cari',
			type: 'POST',
			data: {
				rekening: $("#TBLREKENING_KODE").val()
				, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
				, TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").val()
				, TBLPENDATAAN_TGLPAJAK: $("#TBLPENDATAAN_TGLPAJAK").val()
				, RPSKP: $("#RPSKP").val()
			},
		})
		.done(function(respon) {
			$("#div_tabel").html(respon);
			$(".loader_img").fadeOut(1000);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}

	function cetak() {
		var param = jQuery.param(
		{
			rekening: $("#TBLREKENING_KODE").val()
			, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
			, TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").val()
			, TBLPENDATAAN_TGLPAJAK: $("#TBLPENDATAAN_TGLPAJAK").val()
		}
		);
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendataan/cetak_daftar_omzettahunan/cetak?' + param);
	}

	$("#TBLREKENING_KODE").change(function(event) {
		getRekeningSub($("#TBLREKENING_KODE").val());
	});

	function getRekeningSub(rekeningkode) {
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/subrekening?kode=4.1.1.2.',
			type: 'POST',
			dataType: 'json',
			data: {kode: rekeningkode},
		})
		.done(function(respon) {
			setComboList ('TBLREKENING_KODESUB', 'Sub Rekening', respon);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}
</script>
<style type="text/css">
input.disabled, textarea.disabled {
	background: #e4e4e4!important;
}
</style>
<?php 
define('ASSETS_URL', Yii::app()->
theme->baseUrl); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Laporan Tunggakan SKPD</h4>
		</div>
	</div>
</div>
<section id="widget-grid" class="">
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
			<div class="jarviswidget jarviswidget-color-teal jarviswidget-sortable" id="widget_pencariandatapajak" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" role="widget" style="">
				<header role="heading">
					<span class="widget-icon"><i class="fa fa-table"></i></span>
					<h2>Pencarian Data</h2>
					<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
					<div role="content">
						<div class="jarviswidget-editbox">
						</div>
						<div class="widget-body">
							<form id="form_sumber_pajak" class="smart-form" novalidate="">
								<fieldset>
									<div class="row">
										<section class="col col-md-2">
											<p>
												Masa Pajak
											</p>
										</section>
										<section class="col col-md-2">
											<label class="input">
												<input class="form-control" type="text" id="masapajak" name="masapajak" autocomplete="off" maxlength="4">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>
											</p>
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
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>
											</p>
										</section>
										<section class="col col-md-4">
											<label class="select">
												<select class="select2" id="TBLREKENING_KODESUB" name="TBLREKENING_KODESUB">
													<option value="">-- Pilih Rekening --</option>
													<?php foreach ($data['sub_rek'] as $list): ?>
														<option value="<?php echo $list['TREKENING_KODE'] ?>">[<?php echo $list['TREKENING_KODE'] ?>] <?php echo $list['TREKENING_NAMA'] ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>
												Kecamatan
											</p>
										</section>
										<section class="col col-md-4">
											<label class="select">
												<select class="select2" id="REFKECAMATAN_ID" name="REFKECAMATAN_ID">
													<option value="">-- Pilih Kecamatan --</option>
													<?php foreach ($data['list_kecamatan'] as $list): ?>
														<option value="<?php echo $list['REFKECAMATAN_ID'] ?>">[<?php echo $list['REFKECAMATAN_ID'] ?>] <?php echo $list['REFKECAMATAN_NAMA'] ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>
												Kd Jalan
											</p>
										</section>
										<section class="col col-md-4">
											<label class="select">
												<select class="select2" id="JALAN" name="JALAN">
													<option value="">-- Pilih Jalan --</option>
													<?php foreach ($data['list_jalan'] as $list): ?>
														<option value="<?php echo $list['KODE'] ?>"> <?php echo $list['NMJLN'] ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>
												Cara Penetapan
											</p>
										</section>
										<section class="col col-md-3">
											<label class="input">
												<input type="text" name="cara_penetapan" id="cara_penetapan">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
										</section>
										<section class="col col-md-4">
											<button type="button" class="btn btn-primary btn-sm" onclick="cetak()">Cetak</button>
										</section>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</article>
		</div>
		<!-- end row -->
	</section>
	<script type="text/javascript">
		pageSetUp();
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

		function cetak () {
			window.masapajak = $('#masapajak').val();
			window.cara_penetapan = $('#cara_penetapan').val();
			window.JALAN = $('#JALAN').val();
			window.TBLREKENING_KODE = $('#TBLREKENING_KODE').val();
			window.REFKECAMATAN_ID = $('#REFKECAMATAN_ID').val();
			window.APP_URL = "<?php echo $data['URL_APP']; ?>";
			window.open(window.APP_URL+'/penagihan/Daftar_tunggakan/cetak?masapajak='+window.masapajak+'&TBLREKENING_KODE='+window.TBLREKENING_KODE+'&REFKECAMATAN_ID='+window.REFKECAMATAN_ID+'&JALAN='+window.JALAN+'&cara_penetapan='+window.cara_penetapan);
		}
	</script>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-orange txt-color-white">
			<h4><i class="fa fa-file fa-fw"></i>  Mapping Referensi Rekening PERMEN 90</h4>
		</div>
	</div>
</div>

<section id="widget-grid" class="hidden">
	<div class="row">
		<article class="col-sm-12 col-md-12 col-lg-12" id="grid-formpencarian">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-sdfsfs4fsfw4t" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-search"></i> </span>
					<h2>Form Pencarian</h2>
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
						<form id="form-pendaftaran" class="smart-form">
							<fieldset>
								<div class="row">
									<section class="col col-2">Tahun</section>
									<section class="col col-3">
										<div class="form-group">
											<label class="select">
												<select class="select2" id="cari_tahun" name="cari_tahun">
													<option value="">-- Pilih Tahun --</option>
													<?php for ($tahun=2010; $tahun<=date('Y')+5; $tahun++): ?>
													<option value="<?= $tahun ?>"><?= $tahun ?></option>
													<?php endfor ?>
												</select>
											</label>
										</div>
									</section>
								</div>
							</fieldset>
							<footer>
								<button class="btn btn-sm btn-primary pull-left" type="button" onclick="showData()"><i class="fa fa-search"></i> Cari</button>
							</footer>
						</form>
					</div>
					<!-- end widget content -->

				</div>

				<!-- end widget div -->

			</div>
			<!-- end widget -->
		</article>
	</div>
</section>

<section id="widget-grid" class="">
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget jarviswidget-color-green" id="wid-id-pendataan-target" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Data Mapping Referensi Rekening PERMEN 90</h2>
				</header>
				<div id="div_grid" style="overflow-x: auto;">

				</div>
			</div>
		</article>
	</div>
</section>

<script type="text/javascript">
	pageSetUp();
	LOADER = '<div align="center" class="loader_img"><img src="<?= Yii::app()->getBaseUrl(1); ?>/images/loader.gif" alt="memuat data..."></div>';
	loadScript("themes/smartadmin/js/plugin/jquery-priceformat/jquery.price_format.2.0.min.js");

	jQuery(document).ready(function($) {
		showData()
	});

	function showData() {
		var tahun = $("#cari_tahun").select2('val');
		$.ajax({
			url: 'app/rekening_90/mapping',
			type: 'POST',
			data: {
				tahun: tahun
			},
			success: function(respon) {
				$("#div_grid").html(respon);
				$("#div_grid").prepend('<div align="center">'+LOADER+'');
				$(".loader_img").fadeOut(1000);
			},
			error: function(respon) {
				$("#div_grid").html("<h2>Ada kesalahan (jaringan / server). Mohon ulangi klik cari.</h2>");
			}
		});
	}

	function loadXeditable() {
		loadScript("themes/smartadmin/js/plugin/x-editable/x-editable.min.js",runXEditDemo);
	}

	function runXEditDemo() {
		$.fn.editable.defaults.mode = 'inline';
		$('.input-x-edit-uang').editable({
			url: 'app/rekening_90/SimpanInline',
			type: 'text',
			title: 'Edit Nilai'
			,ajaxOptions: {
				dataType: 'json' // json response
			}
			,params: function(params) {
				//The params already have the default pk, name and value.
					params.nilaiNominal = toAngka(params.value); //tambah parameter nilaiNominal yg menyimpan pagu dalam angka saja
					params.tahun = window.tahunpilih;
					params.skpd = window.idskpd;
					params.rekening_kode = window.rekening_kode;
						return params;
			}
			,success:function(response){
				if (response.status == 'success') {
					notifikasi('Tersimpan', 'Data berhasil disimpan.', 'success', 1, 0);
					/*updatePagu(window.class_elm,'KEGIATAN', response.data.tblmusrenbangda_id, window.idskpd);
					updatePagu(window.class_elm,'PROGRAM', response.data.refprogram_id, window.idskpd);
					updatePagu(window.class_elm,'BIDANG', response.data.refbidang_id, window.idskpd);
					updatePagu(window.class_elm,'URUSAN', response.data.refurusan_id, window.idskpd);
					updatePagu(window.class_elm,'SKPD', response.data.refurusan_id, window.idskpd);*/
				} else {
					notifikasi('Error', 'Data gagal disimpan.', 'failed', 1, 0);
				}
			}
		});

		$('.textarea-x-edit').editable({
			url: 'app/rekening_90/SimpanInline',
			type: 'textarea',
			showbuttons: 'bottom',
			title: 'Edit Nominal'
			,success:function(response){
				if (response == 'success') {
					notifikasi('Tersimpan', 'Data berhasil disimpan.', 'success', 1, 0);
				} else {
					notifikasi('Error', 'Data gagal disimpan.', 'failed', 1, 0);
				}
			}
		});

		$('.input-x-edit').editable({
			url: 'app/rekening_90/SimpanInline',
			showbuttons: 'bottom',
			title: 'Nilai',
			ajaxOptions: {
				dataType: 'json'
			},
			success:function(response){
				if (response.status == 'success') {
					notifikasi('Tersimpan', 'Data berhasil disimpan.', 'success', 1, 0);
				} else {
					notifikasi('Error', 'Data gagal disimpan.', 'failed', 1, 0);
				}
			}
		});

		$(".input-x-edit-uang").click(function(event) {
			setTimeout(function() {
				setPriceFormat();
				window.class_elm = $(event.target).attr('id');
				//window.idkuncian = $(event.target).data('idkuncian');
				window.idskpd = $(event.target).data('idskpd');
				window.tahunpilih = $(event.target).data('tahun');
				window.rekening_kode = $(event.target).data('koderek');
				window.idPk = $(event.target).data('pk');
			}, 500);
		});
	}
</script>
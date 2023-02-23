	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="well well-sm well-light bg-color-greenLight txt-color-white">
				<h4><i class="fa fa-file-text-o"></i> Rekap Daftar SKPDKB Jabatan </h4>
			</div>
		</div>
	</div>


	<!-- widget grid -->
	<section id="widget-grid" class="" >

		<!-- row -->
		<div class="row">


			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-teal" id="wid-id-Pajak_Restoran" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>Form Daftar SKPDKB Jabatan </h2>
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
							<form id="form_sumber_pajak" class="smart-form" novalidate="">
								<fieldset>
									<header style="margin: -6px;"> Pencarian </header><br>
									<div class="row">
										<section class="col col-md-2">Rekening</section>
										<section class="col col-md-3">
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
										<section class="col col-md-2">Tahun Pajak</section>
										<section class="col col-md-1">
											<label class="checkbox pull-right">
												<input type="checkbox" name="is_tahun" id="is_tahun">
												<i></i>
											</label>
										</section>
										<section class="col col-md-3">
										<label class="input">
												<input class="form-control" value="<?= date('Y') ?>" type="number" id="TBLPENDATAAN_THNPAJAK" name="TBLPENDATAAN_THNPAJAK" type="number">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">Tanggal Ketetapan</section>
										<section class="col col-md-3" >
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" value="<?= date('d-m-Y') ?>" name="tgl_cetakawal" class="datepicker" data-dateformat="dd-mm-yy" id="tgl_cetakawal">
											</label>
										</section>
										<section class="col col-md-1">
										<p>S/D</p>
									  </section>
									  <section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
										  <input type="text" value="<?= date('d-m-Y') ?>" name="tgl_cetakakhir" class="datepicker" data-dateformat="dd-mm-yy" id="tgl_cetakakhir">
										</label>
									  </section>
									</div>
									<div class="row" style="display: none;">
										<section class="col col-md-2"> Tanggal Ketetapan</section>
										<section class="col col-md-2">
											<label>THN (2 digit)</label>
											<label class="input">
												<input class="form-control" type="number" id="THNKURANGBAYAR" name="THNKURANGBAYAR" autocomplete="off">
											</label>
										</section>
										<section class="col col-md-2">
											<label>BLN</label>
											<label class="input">
												<input class="form-control" type="number" id="BLNKURANGBAYAR" name="BLNKURANGBAYAR" autocomplete="off">
											</label>
										</section>
										<section class="col col-md-2">
											<label>TGL</label>
											<label class="input">
												<input class="form-control" type="number" id="TGLKURANGBAYAR" name="TGLKURANGBAYAR" autocomplete="off">
											</label>
										</section>
									</div>
								</fieldset>
								<footer>
									<div>
										<button type="button" class="btn btn-sm btn-primary" onclick="cetakWord()">
											<i class="fa fa-print"></i>&nbsp;Cetak Word
										</button>
									</div>
									<div>
										<button type="button" class="btn btn-sm btn-success" onclick="cetak()">
											<i class="fa fa-print"></i>&nbsp;Cetak Excel
										</button>
									</div>
									<div>
										<button type="button" onclick="cari()" class="btn btn-sm btn-default">
											<i class="fa fa-desktop"></i>&nbsp;View
										</button>
									</div>
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

		<div class="row">
			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-orange" id="wid-id-data_sauusss" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
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
	<!-- end widget grid -->
	<br>



	<script type="text/javascript">
		pageSetUp();

		jQuery(document).ready(function($) {
			reloadDT('dt_basic');
		});

		function cari() {
			var CARI_NOPOK = $('#nopok').val();
			if (CARI_NOPOK=='') {
				notifikasi('Informasi','Mohon isikan Nomor Pokok','failed',1,0);
				return false;
			}

			$.ajax({
				url: 'penetapan/skpdkbjabatan_daftar/cetak',
				type: 'POST',
				data: {
					TBLPENDATAAN_THNPAJAK: ($('#is_tahun').prop('checked') ? $("#TBLPENDATAAN_THNPAJAK").val() : '')
					, TBLREKENING_KODE: $("#TBLREKENING_KODE").val()
					, THNKURANGBAYAR: $("#THNKURANGBAYAR").val()
					, BLNKURANGBAYAR: $("#BLNKURANGBAYAR").val()
					, TGLKURANGBAYAR: $("#TGLKURANGBAYAR").val()
					, TGLCETAKAWAL: $("#tgl_cetakawal").val()
					, TGLCETAKAKHIR: $("#tgl_cetakakhir").val()
				},
			})
			.done(function(respon) {
				$("#div_tabel").html(respon);
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
				//rekening: $("#TBLREKENING_KODE").val()
				 TBLPENDATAAN_THNPAJAK: ($('#is_tahun').prop('checked') ? $("#TBLPENDATAAN_THNPAJAK").val() : '')
				// , TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
				, TBLREKENING_KODE: $("#TBLREKENING_KODE").val()
				, THNKURANGBAYAR: $("#THNKURANGBAYAR").val()
				, BLNKURANGBAYAR: $("#BLNKURANGBAYAR").val()
				, TGLKURANGBAYAR: $("#TGLKURANGBAYAR").val()
				, TGLCETAKAWAL: $("#tgl_cetakawal").val()
				, TGLCETAKAKHIR: $("#tgl_cetakakhir").val()
				
			}
			);
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/skpdkbjabatan_daftar/cetak?' + param);
		}

		function cetakWord() {
			var param = jQuery.param(
			{
				//rekening: $("#TBLREKENING_KODE").val()
				 TBLPENDATAAN_THNPAJAK: ($('#is_tahun').prop('checked') ? $("#TBLPENDATAAN_THNPAJAK").val() : '')
				// , TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
				, TBLREKENING_KODE: $("#TBLREKENING_KODE").val()
				, THNKURANGBAYAR: $("#THNKURANGBAYAR").val()
				, BLNKURANGBAYAR: $("#BLNKURANGBAYAR").val()
				, TGLKURANGBAYAR: $("#TGLKURANGBAYAR").val()
				, TGLCETAKAWAL: $("#tgl_cetakawal").val()
				, TGLCETAKAKHIR: $("#tgl_cetakakhir").val()
				
			}
			);
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/skpdkbjabatan_daftar/cetakword?' + param);
		}

	</script>
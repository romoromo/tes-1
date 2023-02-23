	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="well well-sm well-light bg-color-greenLight txt-color-white">
				<h4><i class="fa fa-file-text-o"></i> SKPD Lebih Bayar - Daftar SKPD Lebih Bayar </h4>
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
						<h2>Form Daftar SKPD Lebih Bayar</h2>
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
									<header style="margin: -6px;">Pencarian</header><br>
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
										<button type="button" class="btn btn-sm btn-primary" onclick="cari()">
											<i class="fa fa-search"></i>&nbsp;Cari
										</button>
									</div>
									<div class="hidden">
										<button type="button" class="btn btn-sm btn-primary" onclick="cetakWord()">
											<i class="fa fa-print"></i>&nbsp;Cetak Word
										</button>
									</div>
									<div class="hidden">
										<button type="button" class="btn btn-sm btn-success" onclick="cetak()">
											<i class="fa fa-print"></i>&nbsp;Cetak Excel
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

	</section>
	<!-- end widget grid -->
	<br>
	<section id="widget-grid-data" style="display: none;" class="">
	<div class="well well-sm well-light">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-fsdfgs12441278"
					data-widget-editbutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-sortable="false"
					>
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>Data Grid</h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">

						</div>
						<div class="widget-body no-padding">
							<div class="widget-body-toolbar">
								<button class="btn btn-sm btn-danger" onclick="batalskpdlb()" type="button">
									<i class="fa fa-trash-o"></i> Batalkan Data Terpilih
								</button>
								<button class="btn btn-sm btn-primary" onclick="cetakWord()" type="button">
										<i class="fa fa-print"></i> Cetak Daftar SKPDLB
									</button>
								<!-- <div class="group_button_proses pull-right" > -->
									<!-- <button class="btn btn-sm txt-color-white bg-color-greenLight" onclick="" type="button">
										<i class="fa fa-print"></i> Cetak Nota
									</button> -->
									<!-- <button class="btn btn-sm txt-color-white bg-color-magenta" onclick="cetakDaftarWord()" type="button">
										<i class="fa fa-print"></i> Cetak Daftar
									</button> -->
									<!-- <button class="btn btn-sm btn-default" onclick="cetakSKPDWord()" type="button">
										<i class="fa fa-print"></i> Cetak SKPD
									</button> -->
								</div>
							</div>
							<div id="kontrol_table" style="overflow-y: scroll;overflow-x: scroll;height: 300px;width: 100%;">
								
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div>
</section>



	<script type="text/javascript">
		pageSetUp();

		jQuery(document).ready(function($) {
			reloadDT('dt_basic');
		});

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
			if ($("#TBLREKENING_KODE").val() == '') {
				notifikasi('Maaf', 'Mohon pilih Rekening', 'x', 1, 0)
				return false
			}
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/skpdlb_daftarskpdlb/cetak?' + param);
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
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/skpdlb_daftarskpdlb/cetakword?' + param);
		}

		function cari() {
		// var THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
		// var BLNPAJAK = $('#TBLPENDATAAN_BLNPAJAK').val();
		// var TGLBATASSKPD = $('#TBLDAFTTANAH_TGLBATASSKPD').val();
		// var TGLENTRI = $('#TBLDAFTTANAH_TGLENTRI').val();
		// var URUTSKPD = $('#TBLDAFTTANAH_URUTSKPD').val();

		// if (THNPAJAK=='' || BLNPAJAK=='') {
		// 	notifikasi('Informasi','Mohon isikan Tahun dan Bulan','failed',1,0);
		// }
		// else if (TGLBATASSKPD=='') {
		// 	notifikasi('Informasi','Mohon isikan Tanggal Batas SKPD','failed',1,0);
		// }
		// else if (URUTSKPD=='') {
		// 	notifikasi('Informasi','Mohon isikan Nomor Nota','failed',1,0);
		// }
		// else{
			// $("html, body").animate({ scrollTop: 800 }, "slow");
			$("#widget-grid-data").slideDown(600);
			// $("#kontrol_table").html(LOADER).fadeIn(400);
			var param = {
				TBLPENDATAAN_THNPAJAK: ($('#is_tahun').prop('checked') ? $("#TBLPENDATAAN_THNPAJAK").val() : '')
				// , TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
				, TBLREKENING_KODE: $("#TBLREKENING_KODE").val()
				, THNKURANGBAYAR: $("#THNKURANGBAYAR").val()
				, BLNKURANGBAYAR: $("#BLNKURANGBAYAR").val()
				, TGLKURANGBAYAR: $("#TGLKURANGBAYAR").val()
				, TGLCETAKAWAL: $("#tgl_cetakawal").val()
				, TGLCETAKAKHIR: $("#tgl_cetakakhir").val()
			};
			$.ajax({
				url: 'penetapan/skpdlb_daftarskpdlb/GetData',
				type: 'POST',
				data:  jQuery.param(param),
				success: function(respon) {
					$('#kontrol_table').html(respon);
		            // $("#kontrol_table").prepend('<div align="center">'+LOADER+'');
		            // $(".loader_img").fadeOut(1000);
		            // $('.group_button_proses').hide();
		            // $('.btnprosestap').show();
					$('#widget-grid-data').show('fast');
				}
			});
			
		// }
	}

	function batalskpdlb() {
		arridPajakSkpdlb = [];

		$("input[name='nopokskpdlb']:checked").each(function() {
			arridPajakSkpdlb.push(this.value);
		});

		count = 0;
		for(x in arridPajakSkpdlb) {
			count++;
		}

		if (count>0) {
			daftaridPajakSkpdlb = arridPajakSkpdlb.toString();

			$.SmartMessageBox({
			title : "Konfirmasi", // judul Smart Alert
			content : "Apakah anda yakin akan membatalkan data terpilih?", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'penetapan/skpdlb_daftarskpdlb/BatalkanSKPDLB',
					type: 'POST',
					dataType: 'json',
					data: {
						 listPajakSKPDLB: daftaridPajakSkpdlb
						,TBLPENDATAAN_THNPAJAK: ($('#is_tahun').prop('checked') ? $("#TBLPENDATAAN_THNPAJAK").val() : '')
						, TBLREKENING_KODE: $("#TBLREKENING_KODE").val()
						, THNKURANGBAYAR: $("#THNKURANGBAYAR").val()
						, BLNKURANGBAYAR: $("#BLNKURANGBAYAR").val()
						, TGLKURANGBAYAR: $("#TGLKURANGBAYAR").val()
						, TGLCETAKAWAL: $("#tgl_cetakawal").val()
						, TGLCETAKAKHIR: $("#tgl_cetakakhir").val()
					},
					// beforeSend: function() {
					// 	loadingTransfer('open');
					// 	$("#dialog-message").modal('show');
					// },
					success: function(respon) {
						if (respon.status=='success') {

							notifikasi('Sukses','Data berhasil di hapus','success',1,0);
						}
						// $('#dt_pipeline label.label-warning').html('<b>Sudah Ditetapkan</b>').addClass('label-success').removeClass('label-warning');
					}
				});
			}
		});

		} else {
			notifikasi('Informasi','Mohon pilih Data yg akan di hapus, dengan mencentang Data.','fail',1,0)
		}

		return false;
	}

	</script>

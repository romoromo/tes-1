<?php
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Riwayat Per Objek Pajak</h4>
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
					<h2>Pilih Data Sumber</h2>

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

						<form action="" id="form_sumber_pajak" class="smart-form" novalidate>
							<fieldset>
								<div class="row">
									<section class="col col-md-2">
										<p>Jenis Pajak</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TBLREKENING_KODE" name="TBLREKENING_KODE">
												<option value="">-- Pilih Rekening --</option>
												<?php foreach ($data['rek'] as $list) : ?>
													<option value="<?php echo $list['TBLREKENING_REKAYAT'] ?>">[<?php echo $list['TBLREKENING_KODE_90'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING_90'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>

								</div>
								<div class="row" hidden>
									<section class="col col-md-2">
										<p>Jenis Ketetapan</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="JNSKETETAPAN" name="JNSKETETAPAN">
												<option value="SEMUA">-- Semua --</option>
												<option value="SPTPD">SPTPD/SKPD</option>
												<option value="SKPDKB">SKPDKB</option>
												<option value="SKPD-A">SKPD-A</option>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Masa Pajak</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input value="2012" type="number" id="TBLPENDATAAN_THNPAJAK_AWAL" name="TBLPENDATAAN_THNPAJAK_AWAL">
										</label>
									</section>
									<section class="col col-md-1">
										<p>S/D</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input value="<?= date('Y') ?>" type="number" id="TBLPENDATAAN_THNPAJAK_AKHIR" name="TBLPENDATAAN_THNPAJAK_AKHIR">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Nopok NPWPD</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input type="text" id="TBLDAFTAR_NOPOK" name="TBLDAFTAR_NOPOK">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Cari Tanggal Kegiatan</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input value="" class="datepicker" type="text" data-dateformat="dd-mm-yy" id="CUTOFF_TGL_AWAL" name="CUTOFF_TGL_AWAL">
										</label>
									</section>
									<section class="col col-md-1">
										<p>S/D</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input value="" class="datepicker" type="text" data-dateformat="dd-mm-yy" id="CUTOFF_TGL_AKHIR" name="CUTOFF_TGL_AKHIR">
										</label>
									</section>
								</div>


							</fieldset>
							<footer>
								<!-- <button type="button" onclick="cetakWord()" class="btn btn-sm btn-primary">
									<i class="fa fa-print"></i>&nbsp;Cetak Word
								</button> -->
								<button type="button" onclick="cetak()" class="btn btn-sm btn-success">
									<i class="fa fa-print"></i>&nbsp;Cetak Excel
								</button>
								<button type="button" class="btn btn-sm btn-primary" onclick="cari()">
									<i class="fa  fa-search"></i>&nbsp;Cari
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
							<button class="btn btn-primary" id="tomboltambah" onclick="tambah()">
								<i class="fa fa-plus-square"></i> Tambah Kegiatan
							</button>
						</div>

						<div id="tabel" class="">



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

<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Tambah Kegiatan
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form id="form-data" class="smart-form">

					<fieldset>
						<section>
							<div class="row">
								<label class="label col col-4">Nopok</label>
								<div class="col col-10">
									<label class="input">
										<input value="" readonly type="text" name="NOPOK_INPUT" id="NOPOK_INPUT">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Tanggal</label>
								<div class="col col-10">
									<label class="input">
										<input value="" class="datepicker" data-dateformat="dd-mm-yy" type="text" name="TANGGAL_INPUT" id="TANGGAL_INPUT">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Kegiatan</label>
								<div class="col col-10">
									<label class="input">
										<input value="" type="text" name="KEGIATAN_INPUT" id="KEGIATAN_INPUT">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Jenis Ketetapan</label>
								<div class="col col-10">
									<label class="select">
										<select class="select2" id="JNSKETETAPAN_INPUT" name="JNSKETETAPAN_INPUT">
											<option value="">-- Silakan Pilih --</option>
											<option value="SPTPD">SPTPD/SKPD</option>
											<option value="SKPDKB">SKPDKB</option>
											<option value="SKPD-A">SKPD-A</option>
										</select>
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">No SK</label>
								<div class="col col-10">
									<label class="input">
										<input value="" type="text" name="NOSK_INPUT" id="NOSK_INPUT">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Tahun</label>
								<div class="col col-10">
									<label class="input">
										<input value="<?= date('Y') ?>" type="number" name="TAHUN_INPUT" id="TAHUN_INPUT">
									</label>
								</div>
							</div>
						</section>
						<section>
							<div class="row">
								<label class="label col col-4">Bulan Awal</label>
								<div class="col col-10">
									<label class="select">
										<select class="select2" id="BLNPAJAK_AWAL_INPUT" name="BLNPAJAK_AWAL_INPUT">
											<option value="">-- Bulan --</option>
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
										</select><i></i>
									</label>
								</div>
							</div>
						</section>
						<section>
							<div class="row">
								<label class="label col col-4">Bulan Akhir</label>
								<div class="col col-10">
									<label class="select">
										<select class="select2" id="BLNPAJAK_AKHIR_INPUT" name="BLNPAJAK_AKHIR_INPUT">
											<option value="">-- Bulan --</option>
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
										</select><i></i>
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Jumlah Piutang</label>
								<div class="col col-10">
									<label class="input">
										<input value="" class="input-sm format-rupiah text-align-right" type="text" name="PIUTANG_INPUT" id="PIUTANG_INPUT">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Hasil</label>
								<div class="col col-10">
									<label class="textarea">
										<textarea rows="3" class="custom-scroll" id="HASIL_INPUT" name="HASIL_INPUT"></textarea>
									</label>
								</div>
							</div>
						</section>



						<!-- <section>
							<div class="row">
								<label class="label col col-4">Golongan/Pangkat</label>
								<div class="col col-10">
									<label class="input"> 
										<input value="" type="text" name="param[TBLPEJABAT_GOLONGAN]" id="TBLPEJABAT_GOLONGAN">
									</label>
								</div>
							</div>
						</section> -->

					</fieldset>

					<footer>
						<button type="button" id="btn-simpan" onclick="tambahkegiatan()" class="btn btn-primary">
							Simpan
						</button>
						<button type="reset" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>

					</footer>
				</form>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>




<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugin/jquery-priceformat/jquery.price_format.2.0.min.js"></script>
<script type="text/javascript">
	pageSetUp();
	setPriceFormat();

	function tambah() {
		var nopok = $("#TBLDAFTAR_NOPOK").val();
		if ($('#TBLDAFTAR_NOPOK').val() == '') {
			notifikasi('Informasi', 'Mohon Pilih Jenis Nopok Objek Pajak', 'failed', 1, 0);
		} else {

			window.cmd = "tambah";
			// window.id = '';
			// $("#cmd").val("tambah");
			$("#form-data")[0].reset();
			$("#form-data .select2").select2('val', '');
			$("#modal-form").modal("show");
			$("#NOPOK_INPUT").val(nopok);
		}

	}

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
		$("#tomboltambah").hide();
	});

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function() {
		generateAutocompleteWP();
	});

	$("#TBLREKENING_KODE").change(function(event) {
		generateAutocompleteWP();
	});


	function generateAutocompleteWP() {
		var kode_rek = $('#TBLREKENING_KODE').select2('val');
		$('#TBLDAFTAR_NOPOK').autocomplete({
			serviceUrl: 'penagihan/cek_data_perwptahunv4/autocompletewpv2',
			params: {
				kode: kode_rek
			},
			onSelect: function(suggestion) {
				//alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
				window.id = suggestion.data;
				window.nopokok = suggestion.TBLDAFTAR_NOPOK;
				window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
				window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
				$(this).val(suggestion.value);
				$('#TBLDAFTAR_NOPOK').val(suggestion.value.split(' | ')[0]);

			},
			showNoSuggestionNotice: true,
			noCache: true,
			noSuggestionNotice: "Tidak ditemukan hasil"
		});
	}

	function cari() {
		if ($('#TBLREKENING_KODE').select2('val') == '') {
			notifikasi('Informasi', 'Mohon Pilih Jenis Pajak', 'failed', 1, 0);
		} else if ($('#TBLDAFTAR_NOPOK').val() == '') {
			notifikasi('Informasi', 'Mohon Pilih Jenis Nopok Objek Pajak', 'failed', 1, 0);
		} else {

			reloadDT('dt_basic');
			$.ajax({
					url: '<?= $this->MODULE_URL ?>/cari',
					type: 'POST',
					data: {
						TBLREKENING_KODE: $("#TBLREKENING_KODE").select2('val'),
						JNSKETETAPAN: $("#JNSKETETAPAN").select2('val'),
						TBLPENDATAAN_THNPAJAK_AWAL: $("#TBLPENDATAAN_THNPAJAK_AWAL").val(),
						TBLPENDATAAN_THNPAJAK_AKHIR: $("#TBLPENDATAAN_THNPAJAK_AKHIR").val(),
						TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val(),
						CUTOFF_TGL_AWAL: $("#CUTOFF_TGL_AWAL").val(),
						CUTOFF_TGL_AKHIR: $("#CUTOFF_TGL_AKHIR").val()
					},
				})
				.done(function(respon) {
					$("#tabel").html(respon);
					$("#tomboltambah").show();
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
		}

	}


	function cetak() {
		if ($('#TBLREKENING_KODE').select2('val') == '') {
			notifikasi('Informasi', 'Mohon Pilih Jenis Pajak', 'failed', 1, 0);
		} else if ($('#TBLDAFTAR_NOPOK').val() == '') {
			notifikasi('Informasi', 'Mohon Pilih Jenis Nopok Objek Pajak', 'failed', 1, 0);
		} else {

			var param = jQuery.param({
				TBLREKENING_KODE: $("#TBLREKENING_KODE").select2('val'),
				JNSKETETAPAN: $("#JNSKETETAPAN").select2('val'),
				TBLPENDATAAN_THNPAJAK_AWAL: $("#TBLPENDATAAN_THNPAJAK_AWAL").val(),
				TBLPENDATAAN_THNPAJAK_AKHIR: $("#TBLPENDATAAN_THNPAJAK_AKHIR").val(),
				TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val(),
				CUTOFF_TGL_AWAL: $("#CUTOFF_TGL_AWAL").val(),
				CUTOFF_TGL_AKHIR: $("#CUTOFF_TGL_AKHIR").val()

			});
			// window.rekening = $("#TBLREKENING_KODE").val
			// window.TBLPENDATAAN_THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
			// window.TBLPENDATAAN_BLNPAJAK = $('#TBLPENDATAAN_BLNPAJAK').val();
			// window.TBLPENDATAAN_TGLPAJAK = $("#TBLPENDATAAN_TGLPAJAK").val();
			// window.TBLREKENING_KODESUB = $("#TBLREKENING_KODESUB").val();
			// window.TBLKECAMATAN_ID = $("#TBLKECAMATAN_ID").val();
			window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/<?= $this->MODULE_URL ?>/cetak?' + param);
		}
	}

	function cetakWord(jenis) {
		var param = jQuery.param({
			rekening: $("#TBLREKENING_KODE").val(),
			TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val(),
			TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").val(),
			TBLPENDATAAN_TGLPAJAK: $("#TBLPENDATAAN_TGLPAJAK").val(),
			TBLREKENING_KODESUB: $("#TBLREKENING_KODESUB").val(),
			ENTRI_THNPAJAK: $("#ENTRI_THNPAJAK").val(),
			ENTRI_BLNPAJAK: $("#ENTRI_BLNPAJAK").select2('val'),
			ENTRI_TGLPAJAK: $("#ENTRI_TGLPAJAK").val(),
			TBLKECAMATAN_ID: $("#TBLKECAMATAN_ID").val(),
			ISONLINE: $("#ISONLINE").select2('val'),
			ISBAYAR: $("#ISBAYAR").select2('val')

		});
		window.rekening = $("#TBLREKENING_KODE").val
		window.TBLPENDATAAN_THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
		window.TBLPENDATAAN_BLNPAJAK = $('#TBLPENDATAAN_BLNPAJAK').val();
		window.TBLPENDATAAN_TGLPAJAK = $("#TBLPENDATAAN_TGLPAJAK").val();
		window.TBLREKENING_KODESUB = $("#TBLREKENING_KODESUB").val();
		window.TBLKECAMATAN_ID = $("#TBLKECAMATAN_ID").val();
		// var URL_APLIKASI = "<?php echo Yii::app()->getBaseUrl(1); ?>";
		window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/<?= $this->MODULE_URL ?>/cetakWord?' + param);
	}

	$("#TBLREKENING_KODE").change(function(event) {
		getRekeningSub($("#TBLREKENING_KODE").val());
	});

	function tambahkegiatan() {

		$.ajax({
				url: '<?= $this->MODULE_URL ?>/simpankegiatan',
				type: 'POST',
				dataType: 'json',
				data: {
					NOPOK_INPUT: $('#NOPOK_INPUT').val(),
					TANGGAL_INPUT: $('#TANGGAL_INPUT').val(),
					KEGIATAN_INPUT: $('#KEGIATAN_INPUT').val(),
					JNSKETETAPAN_INPUT: $('#JNSKETETAPAN_INPUT').select2('val'),
					NOSK_INPUT: $('#NOSK_INPUT').val(),
					TAHUN_INPUT: $('#TAHUN_INPUT').val(),
					BLNPAJAK_AWAL_INPUT: $('#BLNPAJAK_AWAL_INPUT').select2('val'),
					BLNPAJAK_AKHIR_INPUT: $('#BLNPAJAK_AKHIR_INPUT').select2('val'),
					PIUTANG_INPUT: toAngka($('#PIUTANG_INPUT').val()),
					HASIL_INPUT: $('#HASIL_INPUT').val()
				}
			}).done(function(respon) {
				if (respon.pesan == 'success') {
					$("#modal-form").modal("hide");
					notifikasi("Sukses", "Kegiatan berhasil disimpan", "success", 1, 0);
					cari();
					// console.log('success');
				} else {
					// console.log('error');
					notifikasi("Gagal", "Kegiatan gagal disimpan", "failed", 1, 0);
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
	}


	function getRekeningSub(rekeningkode) {
		$.ajax({
				url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/subrekening?kode=4.1.1.2.',
				type: 'POST',
				dataType: 'json',
				data: {
					kode: rekeningkode
				},
			})
			.done(function(respon) {
				setComboList('TBLREKENING_KODESUB', 'Sub Rekening', respon);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

	}
</script>
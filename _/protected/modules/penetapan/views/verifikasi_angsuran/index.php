<?php
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Verifikasi Ketetapan Angsuran</h4>
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
									<section class="col col-md-2" style="margin-left: 2%;">Nomor Pokok WP</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="form-control" type="text" id="TBLDAFTAR_NOPOK" name="TBLDAFTAR_NOPOK">
										</label>
									</section>
								</div>

								<div class="row" hidden>
									<section class="col col-md-2" style="margin-left: 2%;">Ayat</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="form-control" type="text" id="TBLANGSURAN_REKAYAT" name="TBLANGSURAN_REKAYAT">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Masa Pajak</section>
									<section class="col col-md-2">
										<label class="select">
											<label class="input">
												<input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="TBLPENDATAAN_THNPAJAK" name="TBLPENDATAAN_THNPAJAK">
											</label>
										</label>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" id="TBLPENDATAAN_BLNPAJAK" name="TBLPENDATAAN_BLNPAJAK">
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
									</section>
									<!-- <section class="col col-md-1">
										<button type="button" class="btn btn-sm btn-primary" onclick="cari()">Enter</button>
									</section> -->
								</div>

							</fieldset>
							<footer>
								<!-- <button type="button" onclick="cetakWord()" class="btn btn-sm btn-success">
									<i class="fa fa-print"></i>&nbsp;Cetak
								</button> -->
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

						<div id="tabel">



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

<br>




<script type="text/javascript">
	pageSetUp();

	jQuery(document).ready(function($) {
	});

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function() {
		generateAutocompleteWP();
	});


	function generateAutocompleteWP() {
		$('#TBLDAFTAR_NOPOK').autocomplete({
			serviceUrl: 'penetapan/verifikasi_angsuran/autocompletewp',

			onSelect: function(suggestion) {
				//alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
				window.id = suggestion.data;
				window.nopokok = suggestion.TNPWPD_NOPOK;
				window.nama = suggestion.TNPWPD_MILIKNAMA;
				window.alamat = suggestion.TNPWPD_MILIKALAMAT;
				$(this).val(suggestion.value);
				$('#TBLDAFTAR_NOPOK').val(suggestion.value.split(' | ')[0]);
				$('#TBLANGSURAN_REKAYAT').val(suggestion.TBLANGSURAN_REKAYAT);

			},
			showNoSuggestionNotice: true,
			noCache: true,
			noSuggestionNotice: "Tidak ditemukan hasil"
		});
	}

	function cari() {
		$.ajax({
				url: 'penetapan/verifikasi_angsuran/cari',
				type: 'POST',
				data: {
					TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val(),
					TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val(),
					// TBLPENDATAAN_THNPAJAK: ($('#is_tahun').prop('checked') ? $("#TBLPENDATAAN_THNPAJAK").val() : '')
					TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").val(),
					TBLANGSURAN_REKAYAT: $('#TBLANGSURAN_REKAYAT').val(),
				},
			})
			.done(function(respon) {
				$("#tabel").html(respon);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

	}





	/*jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});  


	function salin () {
		$('#salin_data').modal('show');
	}

	function simpan () {
		$.smallBox({
			title : "Success",
			content : "<i class='fa fa-save'></i><i> Data Berhasil Disimpan</i>",
			color : "#296191",
			iconSmall : "fa fa-thumbs-up bounce animated",
			timeout : 1000
		});
	}*/

	function cetak(jenis) {
		//window.rekening = $("#TBLREKENING_KODE").val
		window.TBLPENDATAAN_THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
		window.TBLPENDATAAN_BLNPAJAK = $('#TBLPENDATAAN_BLNPAJAK').val();
		window.TBLPENDATAAN_TGLPAJAK = $("#TBLPENDATAAN_TGLPAJAK").val();
		window.TBLREKENING_KODESUB = $("#TBLREKENING_KODESUB").val();
		window.TBLDAFTREKLAME_THNSPTPD = $("#ENTRI_THNPAJAK").val();
		window.TBLDAFTREKLAME_BLNSPTPD = $("#ENTRI_BLNPAJAK").val();
		window.TBLDAFTREKLAME_TGLSPTPD = $("#ENTRI_TGLPAJAK").val();
		window.TBLKECAMATAN_ID = $("#TBLKECAMATAN_ID").val();
		window.REFJALAN_ID = $("#kodejalan").val();
		window.TBLDAFTREKLAME_ISJNSPENETAPAN = $("#penetapan").val();
		window.TBLDAFTREKLAME_JNSREKLAME = $("#TBLDAFTREKLAME_JNSREKLAME").val();
		var URL_APLIKASI = "<?php echo Yii::app()->getBaseUrl(1); ?>";
		window.open(URL_APLIKASI + "/penetapan/verifikasi_angsuran/cetak?jenis=" + jenis + "&TBLPENDATAAN_THNPAJAK=" + window.TBLPENDATAAN_THNPAJAK + "&TBLPENDATAAN_BLNPAJAK=" + window.TBLPENDATAAN_BLNPAJAK + "&TBLPENDATAAN_TGLPAJAK=" + window.TBLPENDATAAN_TGLPAJAK + "&TBLREKENING_KODESUB=" + window.TBLREKENING_KODESUB + "&TBLDAFTREKLAME_THNSPTPD=" + window.TBLDAFTREKLAME_THNSPTPD + "&TBLDAFTREKLAME_BLNSPTPD=" + window.TBLDAFTREKLAME_BLNSPTPD + "&TBLDAFTREKLAME_TGLSPTPD=" + window.TBLDAFTREKLAME_TGLSPTPD + "&TBLKECAMATAN_ID=" + window.TBLKECAMATAN_ID + "&REFJALAN_ID=" + window.REFJALAN_ID + "&TBLDAFTREKLAME_ISJNSPENETAPAN=" + window.TBLDAFTREKLAME_ISJNSPENETAPAN + "&TBLDAFTREKLAME_JNSREKLAME=" + window.TBLDAFTREKLAME_JNSREKLAME);

	}

	function cetakWord(jenis) {
		//window.rekening = $("#TBLREKENING_KODE").val
		window.TBLPENDATAAN_THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
		window.TBLPENDATAAN_BLNPAJAK = $('#TBLPENDATAAN_BLNPAJAK').val();
		window.TBLPENDATAAN_TGLPAJAK = $("#TBLPENDATAAN_TGLPAJAK").val();
		window.TBLREKENING_KODESUB = $("#TBLREKENING_KODESUB").val();
		window.TBLDAFTREKLAME_THNSPTPD = $("#ENTRI_THNPAJAK").val();
		window.TBLDAFTREKLAME_BLNSPTPD = $("#ENTRI_BLNPAJAK").val();
		window.TBLDAFTREKLAME_TGLSPTPD = $("#ENTRI_TGLPAJAK").val();
		window.TBLKECAMATAN_ID = $("#TBLKECAMATAN_ID").val();
		window.REFJALAN_ID = $("#kodejalan").val();
		window.TBLDAFTREKLAME_ISJNSPENETAPAN = $("#penetapan").val();
		window.TBLDAFTREKLAME_JNSREKLAME = $("#TBLDAFTREKLAME_JNSREKLAME").val();
		var URL_APLIKASI = "<?php echo Yii::app()->getBaseUrl(1); ?>";
		window.open(URL_APLIKASI + "/penetapan/verifikasi_angsuran/cetakWord?jenis=" + jenis + "&TBLPENDATAAN_THNPAJAK=" + window.TBLPENDATAAN_THNPAJAK + "&TBLPENDATAAN_BLNPAJAK=" + window.TBLPENDATAAN_BLNPAJAK + "&TBLPENDATAAN_TGLPAJAK=" + window.TBLPENDATAAN_TGLPAJAK + "&TBLREKENING_KODESUB=" + window.TBLREKENING_KODESUB + "&TBLDAFTREKLAME_THNSPTPD=" + window.TBLDAFTREKLAME_THNSPTPD + "&TBLDAFTREKLAME_BLNSPTPD=" + window.TBLDAFTREKLAME_BLNSPTPD + "&TBLDAFTREKLAME_TGLSPTPD=" + window.TBLDAFTREKLAME_TGLSPTPD + "&TBLKECAMATAN_ID=" + window.TBLKECAMATAN_ID + "&REFJALAN_ID=" + window.REFJALAN_ID + "&TBLDAFTREKLAME_ISJNSPENETAPAN=" + window.TBLDAFTREKLAME_ISJNSPENETAPAN + "&TBLDAFTREKLAME_JNSREKLAME=" + window.TBLDAFTREKLAME_JNSREKLAME);

	}

	$("#penetapan,#TBLDAFTREKLAME_JNSREKLAME").keyup(function(event) {
		$(event.target).val($(event.target).val().toUpperCase());
	});
</script>
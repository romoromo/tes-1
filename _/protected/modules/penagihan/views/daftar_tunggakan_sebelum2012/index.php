<?php
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Laporan Tunggakan SKPD Sebelum 2012</h4>
		</div>
	</div>
</div>

<section id="widget-grid" class="">
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
			<div class="jarviswidget jarviswidget-color-teal jarviswidget-sortable" id="widget_pencariandatapajak" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" role="widget" style="">
				<header role="heading">
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Pencarian Data</h2>
					<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
				</header>
				<div role="content">
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body">
						<form id="form_sumber_pajak" class="smart-form" novalidate="">
							<fieldset>
								<div class="row">
									<section class="col col-md-2">
										<p>Masa Pajak</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input type="number" value="2002" class="form-control" type="text" id="masapajak" name="param[masapajak]" autocomplete="off">
											<!-- <input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="tahunkb" name="param[tahunkb]"> -->
										</label>
									</section>
									<section class="col col-md-1">
										<p>S/D</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input type="number" value="2011" class="form-control" type="text" id="masapajakakhir" name="param[masapajakakhir]" autocomplete="off">
											<!-- <input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="tahunkb" name="param[tahunkb]"> -->
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p></p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TBLREKENING_KODE" name="param[TBLREKENING_KODE]">
												<option value="">-- Pilih Rekening --</option>
												<?php foreach ($data['rek'] as $list) : ?>
													<option value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
								</div>
								<!-- <div class="row">
									<section class="col col-md-2">
										<p></p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TBLREKENING_KODESUB" name="param[TBLREKENING_KODESUB]">
												<option value="">-- Pilih Rekening --</option>
												<?php foreach ($data['sub_rek'] as $list) : ?>
													<option value="<?php echo $list['TREKENING_KODE'] ?>">[<?php echo $list['TREKENING_KODE'] ?>] <?php echo $list['TREKENING_NAMA'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
								</div> -->
								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TBLKECAMATAN_ID" name="param[TBLKECAMATAN_ID]">
												<option value="">-- Pilih Kecamatan --</option>
												<?php foreach ($data['list_kecamatan'] as $list) : ?>
													<option value="<?php echo $list['REFKECAMATAN_ID'] ?>">[<?php echo $list['REFKECAMATAN_ID'] ?>] <?php echo $list['REFKECAMATAN_NAMA'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Nopok</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="form-control" type="text" id="nopok" name="param[nopok]" autocomplete="off">
										</label>
									</section>
									<section class="col col-md-2">
										<p id="status"></p>
									</section>
								</div>
								<div class="row" style="display:none">
									<section class="col col-md-2">
										<p>Cara Penetapan</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input type="text" name="param[cara_penetapan]" id="cara_penetapan">
										</label>
									</section>
								</div>
							</fieldset>
							<footer>
								<button type="button" class="btn btn-success btn-sm" onclick="cetak()">Cetak Excel</button>
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
</section>

<div class="row">

	<!-- NEW WIDGET START -->

	<article class="col-sm-12 col-md-12 col-lg-12">


		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-color-darken" id="wid-id-7" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
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

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function() {
		generateAutocompleteWP();
	});

	$("#TBLREKENING_KODE").change(function(event) {
		generateAutocompleteWP();
		getRekeningSub($("#TBLREKENING_KODE").val());
	});

	function generateAutocompleteWP() {
		var kode_rek = $('#TBLREKENING_KODE').select2('val');
		$('#nopok').autocomplete({
			serviceUrl: 'penagihan/Daftar_tunggakan_sebelum2012/autocompletewpv2',
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
				$('#nopok').val(suggestion.value.split(' | ')[0]);
				$('#status').text(suggestion.status);

			},
			showNoSuggestionNotice: true,
			noCache: true,
			noSuggestionNotice: "Tidak ditemukan hasil"
		});
	}

	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

	function cetak() {
		var rekening = $('#TBLREKENING_KODE').val();
		window.masapajak = $('#masapajak').val();
		window.masapajakakhir = $('#masapajakakhir').val();
		window.nopok = $('#nopok').val();
		window.TBLKECAMATAN_ID = $('#TBLKECAMATAN_ID').val();
		// window.JALAN = $('#JALAN').val();
		window.TBLREKENING_KODE = $('#TBLREKENING_KODE').val();
		window.cara_penetapan = $('#cara_penetapan').val();
		window.APP_URL = "<?php echo $data['URL_APP']; ?>";
		if (rekening == '') {
			notifikasi('Informasi', 'Mohon isikan Jenis Pajak', 'failed', 1, 0);
		} else {

			window.open(window.APP_URL + '/penagihan/Daftar_tunggakan_sebelum2012/cetak?masapajak=' + window.masapajak + '&masapajakakhir=' + window.masapajakakhir + '&nopok=' + window.nopok + '&TBLREKENING_KODE=' + window.TBLREKENING_KODE + '&TBLKECAMATAN_ID=' + window.TBLKECAMATAN_ID + '&JALAN=' + window.JALAN + '&cara_penetapan=' + window.cara_penetapan);
		}
	}

	function cari() {
		// var CARI_NOPOK = $('#nopok').val();
		// if (CARI_NOPOK=='') {
		// 	notifikasi('Informasi','Mohon isikan Nomor Pokok','failed',1,0);
		// 	return false;
		// }
		var rekening = $('#TBLREKENING_KODE').val();
		if (rekening == '') {
			notifikasi('Informasi', 'Mohon isikan Jenis Pajak', 'failed', 1, 0);
		} else {

			$("#tabel_laporan").html('<div align="center">' + LOADER + '').fadeIn(400);
			$.ajax({
				url: 'penagihan/Daftar_tunggakan_sebelum2012/Cari',
				type: 'POST',
				data: {
					masapajak: $('#masapajak').val(),
					masapajakakhir: $('#masapajakakhir').val(),
					TBLKECAMATAN_ID: $('#TBLKECAMATAN_ID').val(),
					// JALAN: $('#JALAN').val(),
					TBLREKENING_KODE: $('#TBLREKENING_KODE').val(),
					cara_penetapan: $('#cara_penetapan').val(),
					nopok: $('#nopok').val(),
				},
				success: function(respon) {
					$("#tabel_laporan").html(respon);
					$("#tabel_laporan").prepend('<div align="center">' + LOADER + '');
					$(".loader_img").fadeOut(1000);
				}
			});
		}


	}

		function getRekeningSub(rekeningkode) {
			$.ajax({
					url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/subrekening',
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
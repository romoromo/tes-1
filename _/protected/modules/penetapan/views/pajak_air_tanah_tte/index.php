<?php define('ASSETS_URL', 'themes/smartadmin')?>

<div class="well well-sm well-light text-center">
	<h4><i class="fa fa-tasks"></i> Nota Perhitungan Air Tanah</h4>
</div>

<!--  -->
<section>
	<div class="well">
		<div class="row">
			<div class="col-md-12">
				<div class="widget-body-toolbar">
					<div class="pencarian" style="margin-top: -4px;">
						<button class="btn btn-primary" data-toggle="modal" style="float: right;display:none;" id="button_cari" onclick="$('#cari').show(400);$('#button_tutup').show();$('#button_cari').hide();">
							<i class="fa  fa-search"></i>	Pencarian / Filter Data
						</button>	
						<button class="btn btn-primary" data-toggle="modal" style="float: right; " onclick="$('#cari').hide(400);$('#button_cari').show();$('#button_tutup').hide();" id="button_tutup">
							<i class="fa  fa-times"></i>	Tutup Pencarian / Filter
						</button>
					</div>					
				</div>
				<div class="widget-body slideInRight fast animated">
					<form class="smart-form" novalidate="novalidate" id="form-pencarian-airtanah">
						<fieldset>
							<section>
								<div class="row">
									<div class="col col-6">
										<h3>Pencarian</h3>
									</div>
								</div>
							</section>
							
							<div class="row">
									<section class="col col-md-2">
										<p>Masa Pajak </p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input type="number" value="<?= date('Y') ?>" onchange="getNoNota(this.value)" name="TBLPENDATAAN_THNPAJAK" id="TBLPENDATAAN_THNPAJAK">
										</label>
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select class="select" id="TBLPENDATAAN_BLNPAJAK" name="TBLPENDATAAN_BLNPAJAK">
												<option value="">-- Pilih Bulan --</option>
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
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Nomor Nota </p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" readonly="" style="background: #e4e4e4;" type="text" id="TBLDAFTTANAH_URUTSKPD" name="TBLDAFTTANAH_URUTSKPD">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan </p>
									</section>
									<section class="col col-md-3">
										<label class="select">
										<select id="TBLKECAMATAN_ID" name="TBLKECAMATAN_ID" class="select2">
											<option value="" selected="">-- Pilih Kecamatan --</option>
											<?php foreach ($data['kecamatan'] as $list): ?>
												<option value="<?php echo $list['REFKECAMATAN_ID'] ?>">[<?php echo $list['REFKECAMATAN_ID'] ?>] <?php echo $list['REFKECAMATAN_NAMA'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
									</section>
								</div>

								<br>

								<div class="row">
									<section class="col col-md-2">
										<p>Dengan Cara</p>
									</section>
									<section class="col col-md-3">
										<label class="select">
										<select id="TBLDAFTTANAH_ISJNSPENETAPAN" name="TBLDAFTTANAH_ISJNSPENETAPAN" class="select2">
											<option value="" selected="">-- Pilih Cara --</option>
											<option value="O"> O | Official Assesment</option>
											<option value="S"> S | Self Assesment</option>
										</select>
									</label>
									</section>
								</div>
						
								<header style="border-color: red;">Setting Tanggal SKPD</header><br>
								<div class="row" style="display: none;">
									<section class="col col-md-2">
										<p>Tgl. Entry SPT</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" value="" id="TBLDAFTTANAH_TGLENTRI" name="TBLDAFTTANAH_TGLENTRI" class="datepicker" data-dateformat="dd-mm-yy">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Ketetapan SKPD</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" value="<?= date('d-m-Y') ?>" id="TBLDAFTTANAH_TGLSKPD" name="TBLDAFTTANAH_TGLSKPD" class="datepicker" data-dateformat="dd-mm-yy">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Batas Tempo SKPD</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" id="TBLDAFTTANAH_TGLBATASSKPD" name="TBLDAFTTANAH_TGLBATASSKPD" class="datepicker" data-dateformat="dd-mm-yy">
										</label>
									</section>
								</div>

							<section>
								<button type="button" class="btn btn-sm btn-info" onclick="window.id_eksepsi='';cari()">
									<i class="fa fa-search"></i>
									Cari
								</button>
							</section>	
						</fieldset>
					</form>
				</div>
			</div>
		</div>	
	</div>
</section>
<!--  -->

<section id="widget-grid-tetapan" style="display: none;" class="">
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
								<button class="btn btn-sm btn-primary btnprosestap" onclick="tetapkan()" type="button">
									<i class="fa fa-forward"></i> Proses
								</button>
								<button class="btn btn-sm txt-color-white bg-color-magenta" onclick="cetakDaftarWord()" type="button">
										<i class="fa fa-print"></i> Cetak Daftar
									</button>
								<button class="btn btn-sm txt-color-white bg-color-greenLight" onclick="cetakNotaWord()" type="button">
										<i class="fa fa-print"></i> Cetak Nota
									</button>
								<div class="group_button_proses pull-right" >
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

<!-- Modal -->
<div class="modal fade" id="modul-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Pengukuhan Obyek
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form id="form-data" class="smart-form">

					<fieldset>

						<section>
							<div class="row">
								<label class="label col col-10">Nama Obyek</label>
								<div class="col col-4">
									<label id="TSUBYEK_BUNAMAMERK"></label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Lokasi Obyek</label>
								<div class="col col-10">
									<label id="tblobyek_alamat"></label>
									<!-- ,Kel. --> <label id="TBLKELURAHAN_NAMA"></label>, <!-- Kec. --> <label id="TBLKECAMATAN_NAMA"></label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-10">Tanggal Pengukuhan Obyek</label>
								<div class="col col-4">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input class="datepicker" data-dateformat="dd-mm-yy" value="" type="text" name="param[TNPWPD_TGLKUKUH]" id="TNPWPD_TGLKUKUH">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Nomor Pengukuhan Obyek</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-square"></i>
										<input readonly="" class="disabled" value="" type="text" name="param[TNPWPD_NOKUKUH]" id="TNPWPD_NOKUKUH" />
									</label>
								</div>
							</div>
						</section>

					</fieldset>

					<footer>
						<div class="col col-12">
							<label class="textarea">
								<ol>
									<?php /*<li>Petunjuk ...</li>*/ ?>
								</ol>
							</label>
						</div>

						<button id="btn-simpan" type="submit" class="btn btn-primary">
							Kukuhkan Obyek
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
<!-- /.modal -->

<div id="dialog-message" title="" align="center" style="width: 300px; display:none;">
	<img id="loadinginfo" src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memproses...">
	<p>Mohon tunggu sampai proses transfer selesai</p>
</div>

<form target="_blank" id="form-skpd-airtanah" style="display: none;" method="post" action="<?= Yii::app()->getBaseUrl(1); ?>/penetapan/pajak_air_tanah_tte/cetakskpdword/">
	<input type="hidden" name="data" id="skpd-airtanah">
</form>

<script type="text/javascript">
	pageSetUp();

	loadScript("<?= Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/moment-js/moment-with-locales.min.js", setMoment);
	function setMoment() {
		moment.locale('id');
		$("#TBLDAFTTANAH_TGLSKPD").trigger('change');
	}

	jQuery(document).ready(function($) {
		getNoNota('<?= date('Y') ?>');
	});

	jQuery(document).ready(function($) {
		LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';
		$("#dialog-message").modal('hide');
		$("#dialog-message").dialog({
			autoOpen : false,
			modal : true,
			title: "Mentransfer Data",
		});

		window.today = new Date();
		window.dd = today.getDate();
		window.mm = today.getMonth()+1; //January is 0!
		window.yyyy = today.getFullYear();

		day = today.getDay();
		if (day==5) {
			window.dd = today.getDate();
		} else if (day==6) {
			window.dd = today.getDate()+2;
		} else if (day==0) {
			window.dd = today.getDate()+1;
		} else {
			window.dd = today.getDate();
		}

		if (window.dd==32) {
			window.mm = today.getMonth()+2; //January is 0!
		} else {
			window.mm = today.getMonth()+1; //January is 0!
		}

		if (window.dd==32) {
			window.dd = 01;
		}
		// $('#TBLDAFTREKLAME_TGLBATASSKPD').val(day);

		if (window.mm==13) {
			window.yyyy = today.getFullYear()+1;
			window.mm = 01;
		} else {
			window.yyyy = today.getFullYear();
		} 

		today = window.dd+'-'+window.mm+'-'+window.yyyy;

		$('#TBLPENDATAAN_THNPAJAK').val(window.yyyy);
		$('#TBLDAFTTANAH_TGLSKPD').val(today);

		setPriceFormat();
		setMoment();
	});

	function loadingTransfer(ev) {
		/*ev{open|close}*/
		$('#dialog-message').dialog(ev);
		$(".ui-dialog-titlebar-close").hide();
	}

	function cari() {
		var THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
		var BLNPAJAK = $('#TBLPENDATAAN_BLNPAJAK').val();
		var TGLBATASSKPD = $('#TBLDAFTTANAH_TGLBATASSKPD').val();
		var TGLENTRI = $('#TBLDAFTTANAH_TGLENTRI').val();
		var URUTSKPD = $('#TBLDAFTTANAH_URUTSKPD').val();

		if (THNPAJAK=='' || BLNPAJAK=='') {
			notifikasi('Informasi','Mohon isikan Tahun dan Bulan','failed',1,0);
		}
		else if (TGLBATASSKPD=='') {
			notifikasi('Informasi','Mohon isikan Tanggal Batas SKPD','failed',1,0);
		}
		else if (URUTSKPD=='') {
			notifikasi('Informasi','Mohon isikan Nomor Nota','failed',1,0);
		}
		else{
			$("html, body").animate({ scrollTop: 800 }, "slow");
			$("#widget-grid-tetapan").slideDown(600);
			$("#kontrol_table").html(LOADER).fadeIn(400);
			var param = {
				id_eksepsi : window.id_eksepsi
			};
			$.ajax({
				url: 'penetapan/pajak_air_tanah_tte/GetData',
				type: 'POST',
				data:  $("#form-pencarian-airtanah").serialize()+'&'+jQuery.param(param),
				success: function(respon) {
					$('#kontrol_table').html(respon);
		            $("#kontrol_table").prepend('<div align="center">'+LOADER+'');
		            $(".loader_img").fadeOut(1000);
		            $('.group_button_proses').hide();
		            $('.btnprosestap').show();
				}
			});
			
			$('#widget-grid-tetapan').show('fast');
		}
	}

	function tetapkan() {
		arridPajakAir = [];

		$("input[name='nopokPajakAir']:checked").each(function() {
			arridPajakAir.push(this.value);
		});

		count = 0;
		for(x in arridPajakAir) {
			count++;
		}

		if (count>0) {
			daftaridPajakAir = arridPajakAir.toString();

			$.SmartMessageBox({
			title : "Konfirmasi", // judul Smart Alert
			content : "Apakah anda yakin akan menetapkan data terpilih?", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'penetapan/pajak_air_tanah_tte/TetapkanPajakAir',
					type: 'POST',
					dataType: 'json',
					data: {
						 listPajakAir: daftaridPajakAir
						,TBLPENDATAAN_THNPAJAK: $('#TBLPENDATAAN_THNPAJAK').val()
						,TBLPENDATAAN_BLNPAJAK: $('#TBLPENDATAAN_BLNPAJAK').val()
						,TBLDAFTTANAH_TGLSKPD: $('#TBLDAFTTANAH_TGLSKPD').val()
						,TBLDAFTTANAH_TGLBATASSKPD: $('#TBLDAFTTANAH_TGLBATASSKPD').val()
					},
					beforeSend: function() {
						loadingTransfer('open');
						$("#dialog-message").modal('show');
					},
					success: function(respon) {
						setTimeout(function() {
							loadingTransfer('close');
							$("#dialog-message").modal('hide');
							// cari();
							$('.group_button_proses').show();
							$('.btnprosestap').hide();
						}, 500);
						getNoNota('<?= date('Y') ?>');
						notifikasi('Sukses','Data berhasil di tetapkan','success',1,0);
						$('#dt_pipeline label.label-warning').html('<b>Sudah Ditetapkan</b>').addClass('label-success').removeClass('label-warning');
					}
				});
			}
		});

		} else {
			notifikasi('Informasi','Mohon pilih Data yg akan di transfer ke Penetapan, dengan mencentang Data.','fail',1,0)
		}

		return false;
	}

	function getNoNota(tahun) {
		$.ajax({
			url: 'penetapan/pajak_air_tanah_tte/GetNoNotaAkhir',
			type: 'POST',
			dataType: 'json',
			data: {
				tahun: tahun
			},
			success: function(respon) {
				if (respon=='') {
					$('#TBLDAFTTANAH_URUTSKPD').val(1);
					
				}
				else{
					$('#TBLDAFTTANAH_URUTSKPD').val(respon.NOMORURUT);
					if ($('#TBLDAFTTANAH_TGLBATASSKPD').val()=='') {
						$("#TBLDAFTTANAH_TGLSKPD").trigger('change');
					}
				}
			}
		});
		
	}

	$("#TBLDAFTTANAH_TGLSKPD").change(function(event) {
		// var tglbatas = moment( $("#TBLDAFTTANAH_TGLSKPD").val().split("-").reverse().join("-") ).add(1, "months");
		// $("#TBLDAFTTANAH_TGLBATASSKPD").val( tglbatas.format('L') );

		var tglbts1 = moment( $("#TBLDAFTTANAH_TGLSKPD").val().split("-").reverse().join("-") ).add(1, "months");

			var tanggal_batas = $("#TBLDAFTTANAH_TGLSKPD").val();

			tanggal_batas = tglbts1.format('L');

			var parts = tanggal_batas.split("-");

			dd = parts[0]; 
			mm = parts[1]; 
			yyyy = parts[2];

			tglbatas_cnvrt = mm+'-'+dd+'-'+yyyy;

			tglbts = new Date(tglbatas_cnvrt);

			// var parts = tanggal_batas.split("-");

			day = tglbts.getDay();
			if (day==5) {
				window.dd = tglbts.getDate();
			} else if (day==6) {
				window.dd = tglbts.getDate()+2;
			} else if (day==0) {
				window.dd = tglbts.getDate()+1;
			} else {
				window.dd = tglbts.getDate();
			}

			if (window.dd==32) {
				window.mm = tglbts.getMonth()+2; //January is 0!
			} else {
				window.mm = tglbts.getMonth()+1; //January is 0!
			}

			if (window.dd==32) {
				window.dd = 01;
			}
			// $('#TBLDAFTREKLAME_TGLBATASSKPD').val(day);

			if (window.mm==13) {
				window.yyyy = tglbts.getFullYear()+1;
				window.mm = 01;
			} else {
				window.yyyy = tglbts.getFullYear();
			}

			tglbatas = window.dd+'-'+window.mm+'-'+window.yyyy;

			$("#TBLDAFTTANAH_TGLBATASSKPD").val( tglbatas );
	});

	function cetakNota() {
		var q = btoa(daftaridPajakAir);
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/pajak_air_tanah_tte/cetakskpd/?data=' + q);
	}

	function cetakDaftar() {
		var q = btoa(daftaridPajakAir);
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/pajak_air_tanah_tte/cetakskpd/?data=' + q);
	}

	function cetakSKPD() {
		var q = btoa(daftaridPajakAir);
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/pajak_air_tanah_tte/cetakskpd/?data=' + q);
	}

	function cetakSKPDWord() {
		var q = btoa(daftaridPajakAir);
		// window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/pajak_air_tanah_tte/cetakskpdword/?data=' + q);
		// var q = btoa(daftaridPajak);
		// // window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/cetakskpdword/?data=' + q);
		// $('#f').val(q);
		// $('#form-skpd-reklame').submit();
		$('#skpd-airtanah').val(q);
		$('#form-skpd-airtanah').submit();
	}

	function cetakDaftarWord() {
			var param = jQuery.param(
			{
				 TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
				, TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").val()
				, TBLDAFTTANAH_TGLSKPD: $("#TBLDAFTTANAH_TGLSKPD").val()
				
			}
			);
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/pajak_air_tanah_tte/cetakdaftarword?' + param);
		}

	function cetakNotaWord() {
			var param = jQuery.param(
			{
				 TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
				, TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").val()
				, TBLDAFTTANAH_TGLSKPD: $("#TBLDAFTTANAH_TGLSKPD").val()
				
			}
			);
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/pajak_air_tanah_tte/cetaknotaword?' + param);
		}

</script>
<style type="text/css">
	.disabled {
		background: #ddd !important;
	}
</style>
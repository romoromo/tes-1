<?php define('ASSETS_URL', Yii::app()->theme->baseUrl); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Cetak Reklame Jatuh Tempo</h4>
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
										<p>Masa Pajak</p>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input type="text" id="TBLDAFTRMAKAN_THNPAJAK" name="param[TBLDAFTRMAKAN_THNPAJAK]" value="<?= date('Y') ?>" placeholder="Tahun" maxlength="4">
										</label>
									</section>
									<section class="col col-md-1">
										<label class="select">
											<select class="" id="TBLDAFTRMAKAN_BLNPAJAK" name="param[TBLDAFTRMAKAN_BLNPAJAK]">
												<option value="">-- Bulan --</option>
												<?php for ($i=1; $i<=12; $i++): ?>
													<option <?php echo $i==(int)date('m') ? 'selected' : '' ?> value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
												<?php endfor ?>
											</select><i class="fa fa-square"></i>
										</label>
									</section>

									<section class="col col-md-1">
										<label class="input">
											<input value="<?= date('d') ?>" type="number" id="TBLDAFTRMAKAN_TGLPAJAK" name="param[TBLDAFTRMAKAN_TGLPAJAK]" placeholder="Tanggal" maxlength="2">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Rekening</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TREKENINGSUB_KODE" name="TREKENINGSUB_KODE">
												<option value="">-- Pilih Rekening --</option>
												<?php foreach ($data['rek'] as $list): ?>
													<option value="<?php echo $list['TREKENING_KODE'] ?>">[<?php echo $list['TREKENING_KODE'] ?>] <?php echo $list['TREKENING_NAMA'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Entry SPT</p>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input type="text" id="TBLDAFTRMAKAN_THNPAJAK_SPT" name="param[TBLDAFTRMAKAN_THNPAJAK_SPT]" value="<?= date('Y') ?>" placeholder="Tahun" maxlength="4">
										</label>
									</section>
									<section class="col col-md-1">
										<label class="select">
											<select class="" id="TBLDAFTRMAKAN_BLNPAJAK_SPT" name="param[TBLDAFTRMAKAN_BLNPAJAK_SPT]">
												<option value="">-- Bulan --</option>
												<?php for ($i=1; $i<=12; $i++): ?>
													<option <?php echo $i==(int)date('m') ? 'selected' : '' ?> value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
												<?php endfor ?>
											</select><i class="fa fa-square"></i>
										</label>
									</section>

									<section class="col col-md-1">
										<label class="input">
											<input value="<?= date('d') ?>" type="number" id="TBLDAFTRMAKAN_TGLPAJAK_SPT" name="param[TBLDAFTRMAKAN_TGLPAJAK_SPT]" placeholder="Tanggal" maxlength="2">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="REFKECAMATAN_ID" name="REFKECAMATAN_ID">
												<option value="">-- Pilih Kecamatan --</option>
												<?php foreach ($data['kecamatan'] as $list): ?>
													<option value="<?php echo $list['REFKECAMATAN_ID'] ?>"><?php echo $list['REFKECAMATAN_NAMA'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Kode Jalan</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="KD_JALAN" name="KD_JALAN">
												<option value="">-- Pilih Kode Jalan --</option>
												<?php foreach ($data['kd_jalan'] as $list): ?>
													<option value="<?php echo $list['RREKJALAN_KODE'] ?>"><?php echo $list['RREKJALAN_NAMAJALAN'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Cara Penetapan</p>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input type="text" id="TBLDAFTRMAKAN_PENETAPAN" name="param[TBLDAFTRMAKAN_PENETAPAN]" value="" placeholder="">
										</label>
									</section>
									<section>
										<p>S / O</p>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Jenis Pajak</p>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input type="text" id="TBLDAFTRMAKAN_JPAJAK" name="param[TBLDAFTRMAKAN_JPAJAK]" value="" placeholder="">
										</label>
									</section>
									<section>
										<p>Tetap (T) / Insidentil (I) / Berjalan (B)</p>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<!-- <p>Kode Jalan</p> -->
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TBLDAFTRMAKAN_SJPAJAK" name="TBLDAFTRMAKAN_SJPAJAK">
												<option value=""></option>
												<option value="mini">Mini</option>
												<option value="midi">Midi</option>
												<option value="maxi">Maxi</option>
											</select>
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Jatuh Tempo</p>
									</section>
								</div>

								<div class="row">

									<!-- <section class="col col-md-1">
										<label class="input">
											<input type="text" id="TBLDAFTRMAKAN_THNPAJAK_TEMPO_AWAL" name="param[TBLDAFTRMAKAN_THNPAJAK_TEMPO_AWAL]" placeholder="Tahun" maxlength="4">
										</label>
									</section>

									<section class="col col-md-1">
										<label class="select">
											<select class="" id="TBLDAFTRMAKAN_BLNPAJAK_TEMPO_AWAL" name="param[TBLDAFTRMAKAN_BLNPAJAK_TEMPO_AWAL]">
												<option value="">-- Bulan --</option>
												
											</select><i class="fa fa-square"></i>
										</label>
									</section>

									<section class="col col-md-1">
										<label class="input">
											<input value="" type="number" id="TBLDAFTRMAKAN_TGLPAJAK_TEMPO_AWAL" name="param[TBLDAFTRMAKAN_TGLPAJAK_TEMPO_AWAL]" placeholder="Tanggal" maxlength="2">
										</label>
									</section> -->

									<section class='col col-md-3'>
										<label class="input">
											<input type="text" id="TANGGAL_AWAL" class="datepicker" data-dateformat="dd-mm-yy">	
										</label>
									</section>

									<section class="col col-md-1" style="margin-left:-20px;">
										S / D
									</section>

									<section class='col col-md-3' style="margin-left:-100px">
										<label class="input">
											<input type="text" id="TANGGAL_AKHIR" class="datepicker" data-dateformat="dd-mm-yy">	
										</label>
									</section>
								</div>

							<footer>
								<div id="tbl_simpan">
									<!-- <button type="submit" class="btn btn-sm btn-primary">
										<i class="fa fa-print"></i>&nbsp;Print Kecil
									</button> -->

									<button type="button" onclick="cetak()" class="btn btn-sm btn-success">
										<i class="fa fa-print"></i>&nbsp;Cetak
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
</section>

<script type="text/javascript" src="<?= Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-priceformat/jquery.price_format.2.0.min.js"></script>
<script type="text/javascript">
		pageSetUp();

		function valNum(n) {
			n = (typeof n == "undefined") ? "0" : n;
			return !isNaN(toAngka(n)) ? Number(toAngka(n)) : 0;
		}

		setPriceFormat();

		LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

		loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
			generateAutocompleteWPResto();
		});

		function generateAutocompleteWPResto() {
			$('#TBLDAFTRMAKAN_NOPOK').autocomplete({
				serviceUrl: 'pendataan/restoran/autocompletewp',

				onSelect: function (suggestion) {
					window.id = suggestion.data;
					window.nopokok = suggestion.TNPWPD_NOPOK;
					window.nama = suggestion.TNPWPD_MILIKNAMA;
					window.nama = suggestion.TSUBYEK_BUNAMAMERK;
					window.alamat = suggestion.TNPWPD_MILIKALAMAT;
					window.alamat = suggestion.TSUBYEK_BUALAMAT;
					$(this).val(suggestion.value);
					$('#TBLDAFTRMAKAN_NOPOK').val(suggestion.value.split(' | ')[0]);

				}
				,showNoSuggestionNotice : true
				,noCache : true
				,noSuggestionNotice : "Tidak ditemukan hasil"
			});
		}

		function cari() {
			var TBLDAFTRMAKAN_NOPOK = $('#TBLDAFTRMAKAN_NOPOK').val();
			if (TBLDAFTRMAKAN_NOPOK=='') {
				notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
				return false;
			}
			else{
				$('#footer-resto').hide('fast');
				$("html, body").animate({ scrollTop: 800 }, "slow");
				$("#form-dokumentasi-tanggal").slideDown(600);

				$('#form-data-perhitungan').hide('fast');
				$.ajax({
					url: 'pendataan/restoran/getdata',
					type: 'POST',
					dataType: 'json',
					data: {
						nopok: btoa(TBLDAFTRMAKAN_NOPOK)
					},
					success: function(respon) {
						$.each(respon, function(kolom, val) {
							$('#' + kolom).val(respon[kolom]);
							$('#' + kolom).select2('val', respon[kolom]);
						});
						window.PERSENPAJAK = respon.TREKENING_TARIF;
						$('#form-data-perhitungan').show('fast');
						$('#form-dokumentasi-tanggal').show('fast');
						$('#footer-resto').show('fast');
						setMasaPajak();
					}
				});

			}

		}

		
	function HitungPajak() {
		var persenpajak = (window.PERSENPAJAK/100);
		var penjualanperhari = valNum($('#TBLDAFTRMAKAN_PERHARIJUAL').val());
		var jmlhari = valNum($('#TBLDAFTRMAKAN_JUMLAHHARIJUAL').val());
		var OMZET = penjualanperhari*jmlhari;

		if (OMZET>0) {
			$('#TBLDAFTRMAKAN_OMSETPAJAK').prop('readonly', 1).addClass('disabled');
		} else {
			$('#TBLDAFTRMAKAN_OMSETPAJAK').prop('readonly', 0).removeClass('disabled');
			var omzet = valNum($('#TBLDAFTRMAKAN_OMSETPAJAK').val());
			var OMZET = omzet;
		}
		/*if (omzet>0 && penjualanperhari<=0) {
			$('#TBLDAFTRMAKAN_PERHARIJUAL').prop('readonly', 1).addClass('disabled');
		} else {
			$('#TBLDAFTRMAKAN_PERHARIJUAL').prop('readonly', 0).removeClass('disabled');
		}*/

		var blnpajaknow = <?= (int)date('m') ?>;
		var blnpajakpilih = $('#TBLDAFTRMAKAN_BLNPAJAK').val();
		bungabln = blnpajaknow-blnpajakpilih;
		bungarp = 0;
		if (bungabln > 0) {
			bungarp = ((2/100) * bungabln) * OMZET;
		}
		$("#TBLDAFTRMAKAN_BUNGASPTPD").val(parseInt(bungarp));
		var pajak = OMZET*persenpajak;
		var setor = pajak + bungarp;
		$("#TBLDAFTRMAKAN_PAJAK").val( ( parseInt(pajak) ) );
		$("#TBLDAFTRMAKAN_RUPIAHSETOR").val( ( parseInt(setor) ) );
		setPriceFormat();
	}

	$('#TBLDAFTRMAKAN_PERHARIJUAL, #TBLDAFTRMAKAN_JUMLAHHARIJUAL, #TBLDAFTRMAKAN_OMSETPAJAK').keyup(function(event) {
		HitungPajak();
	});

	/*form validation*/
	loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		var $FormData = $("#form-pendataan-restoran").validate({
	      // Rules for form validation
	      rules : {
	      	"param[TBLDAFTRMAKAN_NOPOK]" : {
	      		required : true
	      	}
	      	,"param[TBLDAFTRMAKAN_THNPAJAK]" : {
	      		required : true
	      	}
	      	,"param[TBLDAFTRMAKAN_BLNPAJAK]" : {
	      		required : true
	      	}
	      	,"param[TBLDAFTRMAKAN_TGLTERIMA]" : {
	      		required : true
	      	}
	      	,"param[TBLDAFTRMAKAN_TGLBATASSPTPD]" : {
	      		required : true
	      	}
	      },

	      // Messages for form validation
	      messages : {
	      	"param[TBLDAFTRMAKAN_NOPOK]" : {
	      		required : 'Mohon isikan Nomor Pokok WP'
	      	}
	      	,"param[TBLDAFTRMAKAN_THNPAJAK]" : {
	      		required : 'Mohon isikan Tahun Pajak'
	      	}
	      	,"param[TBLDAFTRMAKAN_BLNPAJAK]" : {
	      		required : 'Mohon isikan Bulan Pajak'
	      	}
	      	,"param[TBLDAFTRMAKAN_TGLTERIMA]" : {
	      		required : 'Mohon isikan Tanggal Terima'
	      	}
	      	,"param[TBLDAFTRMAKAN_TGLBATASSPTPD]" : {
	      		required : 'Mohon isikan Tanggal batas'
	      	}
	      },

	      // Do not change code below
	      errorPlacement : function(error, element) {
	      	error.insertAfter(element.parent());
	      },
	      submitHandler : function(form) {
	        // saat validasi benar semua, jalankan simpan()
	        return simpanPendataan();
	    }
		});

	};


	function cetak() {
		var tahun_pajak = $("#TBLDAFTRMAKAN_THNPAJAK").val();
		var bulan_pajak = $("#TBLDAFTRMAKAN_BLNPAJAK").val();
		var tanggal_pajak = $("#TBLDAFTRMAKAN_TGLPAJAK").val();
		var rekening = $("#TREKENINGSUB_KODE").val();
		var tahun_entryspt = $("#TBLDAFTRMAKAN_THNPAJAK_SPT").val();
		var bulan_entryspt = $("#TBLDAFTRMAKAN_BLNPAJAK_SPT").val();
		var tanggal_entryspt = $("#TBLDAFTRMAKAN_TGLPAJAK_SPT").val();
		var id_kecamatan = $("#REFKECAMATAN_ID").val();
		var kode_jalan = $("#KD_JALAN").val();
		var penetapan = $("#TBLDAFTRMAKAN_PENETAPAN").val();
		var jenis_pajak = $("#TBLDAFTRMAKAN_JPAJAK").val();
		var sub_jenis_pajak = $("#TBLDAFTRMAKAN_SJPAJAK").val();/*
		var tahun_jatuh_tempo_awal = $("#TBLDAFTRMAKAN_THNPAJAK_TEMPO_AWAL").val();
		var bulan_jatuh_tempo_awal = $("#TBLDAFTRMAKAN_BLNPAJAK_TEMPO_AWAL").val();
		var tanggal_jatuh_tempo_awal = $("#TBLDAFTRMAKAN_TGLPAJAK_TEMPO_AWAL").val();
		var tahun_jatuh_tempo_akhir = $("#TBLDAFTRMAKAN_THNPAJAK_TEMPO_AKHIR").val();
		var bulan_jatuh_tempo_akhir = $("#TBLDAFTRMAKAN_BLNPAJAK_TEMPO_AKHIR").val();
		var tanggal_jatuh_tempo_akhir = $("#TBLDAFTRMAKAN_TGLPAJAK_TEMPO_AKHIR").val();*/
		var tanggal_awal = $("#TANGGAL_AWAL").val();
		var tanggal_akhir = $("#TANGGAL_AKHIR").val();
		window.tahun_pajak = tahun_pajak;
		window.bulan_pajak = bulan_pajak;
		window.tanggal_pajak = tanggal_pajak;
		window.rekening = rekening;
		window.tahun_entryspt = tahun_entryspt;
		window.bulan_entryspt = bulan_entryspt;
		window.tanggal_entryspt = tanggal_entryspt;
		window.id_kecamatan = id_kecamatan;
		window.kode_jalan = kode_jalan;
		window.penetapan = penetapan;
		window.jenis_pajak = jenis_pajak;
		window.sub_jenis_pajak = sub_jenis_pajak;/*
		window.tahun_jatuh_tempo_awal = tahun_jatuh_tempo_awal;
		window.bulan_jatuh_tempo_awal = bulan_jatuh_tempo_awal;
		window.tanggal_jatuh_tempo_awal = tanggal_jatuh_tempo_awal;
		window.tahun_jatuh_tempo_akhir = tahun_jatuh_tempo_akhir;
		window.bulan_jatuh_tempo_akhir = bulan_jatuh_tempo_akhir;
		window.tanggal_jatuh_tempo_akhir = tanggal_jatuh_tempo_akhir;*/
		window.tanggal_awal = tanggal_awal;
		window.tanggal_akhir = tanggal_akhir;

		$.ajax({
			url: 'pendataan/cetak_reklame_jatuhtempo/cek',
			type: 'POST',
			dataType: 'json',
			data: {
				tahun_pajak : tahun_pajak,
				bulan_pajak : bulan_pajak,
				tanggal_pajak : tanggal_pajak,
				rekening : rekening,
				tahun_entryspt : tahun_entryspt,
				bulan_entryspt : bulan_entryspt,
				tanggal_entryspt : tanggal_entryspt,
				id_kecamatan : id_kecamatan,
				kode_jalan : kode_jalan,
				penetapan : penetapan,
				jenis_pajak : jenis_pajak,
				sub_jenis_pajak : sub_jenis_pajak,
				tanggal_awal : tanggal_awal ,
				tanggal_akhir : tanggal_akhir,
			},
			success : function (respon) {
				if (respon.status=='ada') {
					alert('Maaf Data yang dicari tidak ditemukan');
				}
				else{
					//alert('Maaf ADA yang dicari tidak ditemukan');
					cetak2()
				}
			}
		});

	}

	function cetak2 () {
		window.open('pendataan/cetak_reklame_jatuhtempo/cetak?tahun_pajak='+window.tahun_pajak+'&bulan_pajak='+window.bulan_pajak+'&tanggal_pajak='+window.tanggal_pajak+'&rekening='+window.rekening+'&tahun_entryspt='+window.tahun_entryspt+'&bulan_entryspt='+window.bulan_entryspt+'&tanggal_entryspt='+window.tanggal_entryspt+'&id_kecamatan='+window.id_kecamatan+'&kode_jalan='+window.kode_jalan+'&penetapan='+window.penetapan+'&jenis_pajak='+window.jenis_pajak+'&sub_jenis_pajak='+window.sub_jenis_pajak+'&tanggal_awal='+window.tanggal_awal+'&tanggal_akhir='+window.tanggal_akhir);
	}
/*//form validation*/
</script>
<style type="text/css">
input.disabled, textarea.disabled {
	background: #e4e4e4!important;
}
</style>
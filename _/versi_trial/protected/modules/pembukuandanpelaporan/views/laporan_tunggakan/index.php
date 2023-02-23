<?php define('ASSETS_URL', Yii::app()->theme->baseUrl);?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Daftar Piutang Pajak Reklame</h4>
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
									<section class="col col-md-1">
										<p>Tahun SKPD</p>
									</section>
									<section class="col col-md-1" >
										<label class="checkbox">
											<input type="checkbox" name="th_skpd" id="th_skpd" ><i></i>
										</label>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<label class="input">
												<input type="number" value="<?= date('Y') ?>" class="form-control" id="TBLDAFTREKLAME_THNSKPD" name="param[TBLDAFTREKLAME_THNSKPD]">
											</label>
										</label>
									</section>
									<section class="col col-md-2" >

								</div>
								<div class="row">
									<section class="col col-md-1">
											Bulan SKPD
									</section>
									<section class="col col-md-1" >
										<label class="checkbox">
											<input type="checkbox" name="bl_skpd" id="bl_skpd" ><i></i>
										</label>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" name="param[TBLDAFTREKLAME_BLNSKPDA]" id="TBLDAFTREKLAME_BLNSKPDA">
												<option selected="">== Silahkan Pilih ==</option>
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
											</select>
										</label>
									</section>
									<section class="col col-md-1">
										S / D
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" name="param[TBLDAFTREKLAME_BLNSKPDK]" id="TBLDAFTREKLAME_BLNSKPDK">
												<option selected="">== Silahkan Pilih ==</option>
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
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-1">
										<p>Nomor Pokok</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input type="text" id="TBLDAFTAR_NOPOK" name="param[TBLDAFTAR_NOPOK]" placeholder="Ketik Nomor Pokok WP">
										</label>
									</section>
								</div>
								<!-- <div class="row">
									<section class="col col-md-1">
										<p>Cara Penetapan</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TBLDAFTREKLAME_ISJNSPENETAPAN" name="param[TBLDAFTREKLAME_ISJNSPENETAPAN]">
												<option value="">--- Cara Penetapan ---</option>
												<option value="O">O</option>
												<option value="S">S</option>
											</select>
										</label>
									</section>
									<section class="col col-md-4">
										<label>Official (O)/Self (S)</label>
									</section>
								</div> -->
								<div class="row">
									<section class="col col-md-1">
										<p>Jenis Reklame</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TBLDAFTREKLAME_JNSREKLAME" name="param[TBLDAFTREKLAME_JNSREKLAME]">
												<option value="">---Silahkan Pilih Jenis Reklame---</option>
												<option value="T">T</option>
												<option value="I">I</option>
											</select>
										</label>
									</section>
									<section class="col col-md-4">
										<label>Tetap (T)/Insidentil (I)</label>
									</section>
								</div>

								<div class="row" style="display: none;">
									<section class="col col-md-1">
										Tanggal Cut off
									</section>
									<section class="col col-md-4">
										<label class="input"><i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tglcutoff" class="datepicker" data-dateformat="dd-mm-yy" id="tglcutoff">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-4">
										<button type="button" class="btn btn-primary btn-sm" onclick="window.id_eksepsi='';cari()" > <i class="fa fa-search"> Cari </i></button>
									</section>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</article>

		</section>
		<section id="widget-grid-tetapan" style="" class="">
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
				<header role="heading">
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2> Tabel Pencarian </h2>
				<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">
						<div class="widget-body-toolbar no-padding">
							<p class="alert alert-info">
								<!-- <button type="button" class="btn btn-primary btn-sm" onclick="cetakWordReklame()">
									<i class="fa fa-print"></i> Cetak Surat Teguran
								</button> -->
								 <!-- <button type="button" class="btn btn-primary btn-sm" onclick="cetakDaftar()">
									<i class="fa fa-print"></i> Cetak Word
								</button> -->
								 <button type="button" class="btn btn-success btn-sm" onclick="cetakExcell()">
									<i class="fa fa-print"></i> Cetak Rekap Excel
								</button>
								<button type="button" class="btn btn-success btn-sm" onclick="cetakExcell2()">
									<i class="fa fa-print"></i> Cetak Piutang Excel
								</button>
							</p>

						</div>

						<div class="" id="listdata">

						</div>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>
	</div>
	<!-- end row -->
</section>

<script type="text/javascript">
	pageSetUp();
	window.id_eksepsi = '';

	jQuery(document).ready(function($) {
				$('#TBLDAFTREKLAME_BLNSKPDA').select2('val', <?= date('m') ?> );
				$('#TBLDAFTREKLAME_BLNSKPDK').select2('val', <?= date('m') ?> );
			});

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
			generateAutocompleteWP();
		});


	function generateAutocompleteWP() {
			$('#TBLDAFTAR_NOPOK').autocomplete({
				serviceUrl: '<?= $this->MODULE_URL ?>/autocompletewp',

				onSelect: function (suggestion) {
					window.id = suggestion.data;
					window.nopokok = suggestion.TBLDAFTAR_NOPOK;
					window.nama = suggestion.TNPWPD_MILIKNAMA;
					window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
					window.alamat = suggestion.TNPWPD_MILIKALAMAT;
					window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
					$(this).val(suggestion.value);
					$('#TBLDAFTAR_NOPOK').val(suggestion.value.split(' | ')[0]);
					$('#TBLDAFTAR_BADANUSAHANAMA').val(nama);
					$('#TBLDAFTAR_BADANUSAHAALAMAT').val(alamat);

				}
				,showNoSuggestionNotice : true
				,noCache : true
				,noSuggestionNotice : "Tidak ditemukan hasil"
			});
		}

	function cari() {

		 // var CARI_NOMOR_SURAT = $('#nomor_pajak').val();
			// if (CARI_NOMOR_SURAT==''){
		 // 	notifikasi('Nomor Surat Masih Kosong','failed',1,0);
		 // 	return false;
		// }

		$("#the_preload_element").show();
		$.ajax({
			url: 'pembukuandanpelaporan/laporan_tunggakan/cari',
			type: 'POST',
			data: {
				tglawal: $("#tglawal").val(),
				tglakhir: $("#tglakhir").val(),
				TBLDAFTREKLAME_THNSKPD: $("#TBLDAFTREKLAME_THNSKPD").val(),
				TBLDAFTREKLAME_BLNSKPDA: $("#TBLDAFTREKLAME_BLNSKPDA").val(),
				TBLDAFTREKLAME_BLNSKPDK: $("#TBLDAFTREKLAME_BLNSKPDK").val(),
				TBLDAFTREKLAME_JNSREKLAME: $("#TBLDAFTREKLAME_JNSREKLAME").val(),
				// TBLDAFTREKLAME_ISJNSPENETAPAN: $("#TBLDAFTREKLAME_ISJNSPENETAPAN").val(),
				TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val(),
				// tglcutoff: $("#tglcutoff").val(),
				//jenis_penyetoran: $("#SKPD").val(),
			},
			success:function(respon) {
				$("#listdata").html(respon);
				$("#the_preload_element").hide();
			}
		});
	}

	// function cetakWordReklame() {
	// 	var param = jQuery.param(
	// 	{
	// 		TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
	// 		, TBLDAFTAR_GOLONGAN: $("#TBLDAFTAR_GOLONGAN").val()
	// 		, TBLDAFTAR_BADANUSAHAALAMAT: $("#TBLDAFTAR_BADANUSAHAALAMAT").val()
	// 		, TBLDAFTAR_BADANUSAHANAMA: $("#TBLDAFTAR_BADANUSAHANAMA").val()
	// 		, TBLDAFTREKLAME_THNSKPD: $("#TBLDAFTREKLAME_THNSKPD").val()
	// 		, no_surat: $("#no_surat").val()
	// 		, tglawal: $("#tglawal").val()
	// 		, tglakhir: $("#tglakhir").val()
	// 		, jenis_penyetoran: $("#SKPD").val()
	// 		, TBLDAFTREKLAME_JNSREKLAME: $("#TBLDAFTREKLAME_JNSREKLAME").val()
	// 	});
	// 	window.open('<?= Yii::app()->getBaseUrl(1); ?>/<?= $this->MODULE_URL ?>/cetakwordreklame?'+ param);
	// }


	function validAngka(a)
	{
		if(!/^[0-9.]+$/.test(a.value))
		{
			a.value = a.value.substring(0,a.value.length-1000000000);
		}
	}

	function cetakDaftar() {
		 var param = {
			type: 'word',
			tglawal: $("#tglawal").val(),
			tglakhir: $("#tglakhir").val(),
			TBLDAFTREKLAME_THNSKPD: $("#TBLDAFTREKLAME_THNSKPD").val(),
			TBLDAFTREKLAME_BLNSKPDA: $("#TBLDAFTREKLAME_BLNSKPDA").val(),
			TBLDAFTREKLAME_BLNSKPDK: $("#TBLDAFTREKLAME_BLNSKPDK").val(),
			TBLDAFTREKLAME_JNSREKLAME: $("#TBLDAFTREKLAME_JNSREKLAME").val(),
			// TBLDAFTREKLAME_ISJNSPENETAPAN: $("#TBLDAFTREKLAME_ISJNSPENETAPAN").val(),
			TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
			// tglcutoff: $("#tglcutoff").val()
		}
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/<?= $this->MODULE_URL ?>/CetakWord/?'+jQuery.param(param));
	}

	function cetakExcell() {
		 var param = {
			type: 'excell',
			tglawal: $("#tglawal").val(),
			tglakhir: $("#tglakhir").val(),
			TBLDAFTREKLAME_THNSKPD: $("#TBLDAFTREKLAME_THNSKPD").val(),
			TBLDAFTREKLAME_BLNSKPDA: $("#TBLDAFTREKLAME_BLNSKPDA").val(),
			TBLDAFTREKLAME_BLNSKPDK: $("#TBLDAFTREKLAME_BLNSKPDK").val(),
			TBLDAFTREKLAME_JNSREKLAME: $("#TBLDAFTREKLAME_JNSREKLAME").val(),
			// TBLDAFTREKLAME_ISJNSPENETAPAN: $("#TBLDAFTREKLAME_ISJNSPENETAPAN").val(),
			TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
			// tglcutoff: $("#tglcutoff").val()
		}
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/<?= $this->MODULE_URL ?>/CetakExcell/?'+jQuery.param(param));
	}

	function cetakExcell2() {
		 var param = {
			type: 'excell',
			tglawal: $("#tglawal").val(),
			tglakhir: $("#tglakhir").val(),
			TBLDAFTREKLAME_THNSKPD: $("#TBLDAFTREKLAME_THNSKPD").val(),
			TBLDAFTREKLAME_BLNSKPDA: $("#TBLDAFTREKLAME_BLNSKPDA").val(),
			TBLDAFTREKLAME_BLNSKPDK: $("#TBLDAFTREKLAME_BLNSKPDK").val(),
			TBLDAFTREKLAME_JNSREKLAME: $("#TBLDAFTREKLAME_JNSREKLAME").val(),
			// TBLDAFTREKLAME_ISJNSPENETAPAN: $("#TBLDAFTREKLAME_ISJNSPENETAPAN").val(),
			TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
			// tglcutoff: $("#tglcutoff").val()
		}
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/<?= $this->MODULE_URL ?>/CetakExcell2/?'+jQuery.param(param));
	}
</script>
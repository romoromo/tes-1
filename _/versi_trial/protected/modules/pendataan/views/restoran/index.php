<?php define('ASSETS_URL', Yii::app()->theme->baseUrl); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Entry Pendataan Pajak Restoran</h4>
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
										<p>No. Pokok WP</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input type="text" id="TBLDAFTRMAKAN_NOPOK" name="param[TBLDAFTRMAKAN_NOPOK]" placeholder="Ketik Nomor Pokok WP">
										</label>
									</section>
								</div>
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
												<option selected="" value="">-- Bulan --</option>
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

									<section class="col col-md-2">
										<!-- <button class="btn btn-sm btn-default" type="button" onclick="cari()"> -->
										<button class="btn btn-sm btn-default" type="button" onclick="cekPernahDaftar()">
											<i class="fa fa-forward"></i> Proses
										</button>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Rekening</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TREKENINGSUB_KODE" name="param[TREKENINGSUB_KODE]">
												<option value="">-- Pilih Rekening --</option>
												<?php foreach ($data['rek'] as $list): ?>
													<option value="<?php echo $list['TREKENING_KODE'] ?>">[<?php echo $list['TREKENING_KODE'] ?>] <?php echo $list['TREKENING_NAMA'] ?></option>
												<?php endforeach ?>
												<input type="hidden" id="TREKENINGSUB_TARIF" name="TREKENINGSUB_TARIF">
											</select>
										</label>
									</section>
								</div>

								<!-- FORM WP -->
								<header>Data Wajib Pajak</header><span>&nbsp;</span>
								<div class="row">
									<section class="col col-md-2">
										<p>Nama</p>
									</section>
									<section class="col col-md-5">
										<label class="input">
											<input class="form-control disabled" type="text" id="TSUBYEK_BUNAMAMERK" name="param[TSUBYEK_BUNAMAMERK]" disabled="disabled">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">Alamat</section>
									<section class="col col-md-5">
										<label class="textarea">
											<textarea class="form-control disabled" rows="4" id="TSUBYEK_BUALAMAT" name="param[TSUBYEK_BUALAMAT]" disabled="disabled"></textarea>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>No SPT </p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="wp_input_no_spt" name="wp_input_no_spt">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal SPT </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="wp_input_tgl_spt" class="datepicker" data-dateformat="dd-mm-yy" id="wp_input_tgl_spt">
										</label>
									</section>
								</div>
								<!-- //FORM WP -->
							</fieldset>

							<fieldset id="form-data-perhitungan" style="display: none;">
								<div class="row">
									<section class="col col-md-2">
										<p>Penjualan/Hari</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm format-rupiah text-align-right" type="text" id="TBLDAFTRMAKAN_PERHARIJUAL" name="param[TBLDAFTRMAKAN_PERHARIJUAL]">
										</label>
									</section>
									<section class="col col-md-2">
										<p>Jumlah Hari</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm format-ribuan text-align-right" type="text" id="TBLDAFTRMAKAN_JUMLAHHARIJUAL" name="param[TBLDAFTRMAKAN_JUMLAHHARIJUAL]">
											<input class="input-sm" type="hidden" id="persen_pajak" name="persen_pajak">
											<input class="input-sm" type="hidden" id="kecamatan_pajak" name="kecamatan_pajak">
											<input class="input-sm" type="hidden" id="kelurahan_pajak" name="kelurahan_pajak">
											<input class="input-sm" type="hidden" id="koderekening_sub" name="koderekening_sub">
											<input class="input-sm" type="hidden" id="tarif_rekening" name="tarif_rekening">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Penjualan/Bulan</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm format-rupiah text-align-right" type="text" id="TBLDAFTRMAKAN_OMSETPAJAK" name="param[TBLDAFTRMAKAN_OMSETPAJAK]">
										</label>
									</section>
									<section class="col col-md-2">
										<p>Keringanan</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input name="nama_pemilik" style="background-color: #eeeeee;" readonly="readonly" id="nama_pemilik" type="text" class="input-sm format-ribuan text-align-right">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Awal </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="param[TBLDAFTRMAKAN_MULAI]" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTRMAKAN_MULAI">
										</label>
									</section>
									<section class="col col-md-1"></section>
									<section class="col col-md-2">
										<p>Tanggal Akhir</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="param[TBLDAFTRMAKAN_AKHIR]" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTRMAKAN_AKHIR">
										</label>
									</section>

								</div>

								<div class="row">

									<section class="col col-md-2">
										<p>Pembukuan</p>
									</section>

									<section class="col col-md-2">
										<label class="select">
											<select name="param[TBLDAFTRMAKAN_ISPEMBUKUAN]" id="TBLDAFTRMAKAN_ISPEMBUKUAN">
												<option value="" selected="" disabled="">Silahkan Pilih</option>
												<option value="B">B</option>
											</select> <i></i>
										</label>
									</section>
									<section class="col col-md-2">
										<p>Kas</p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select name="param[TBLDAFTRMAKAN_ISKAS]" id="TBLDAFTRMAKAN_ISKAS">
												<option value="" selected="" disabled="">Silahkan Pilih</option>
												<option value="K">K</option>
												<option value="R">R</option>
											</select> <i></i>
										</label>
									</section>
									<section class="col col-md-2">
										<p>Nota</p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select name="param[TBLDAFTRMAKAN_ISNOTA]" id="TBLDAFTRMAKAN_ISNOTA">
												<option value="" selected="" disabled="">Silahkan Pilih</option>
												<option value="N">N</option>
											</select> <i></i>
										</label>
									</section>
								</div>

								<!-- <div class="row">
									<section class="col col-md-2">
										<p>Pajak </p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm format-rupiah text-align-right" type="text" id="TBLDAFTRMAKAN_PAJAK" name="param[TBLDAFTRMAKAN_PAJAK]">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Bunga SPT </p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm format-rupiah text-align-right" type="text" id="TBLDAFTRMAKAN_BUNGASPTPD" name="param[TBLDAFTRMAKAN_BUNGASPTPD]">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Total Setor </p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input readonly="" class="input-sm format-rupiah text-align-right disabled" type="text" id="TBLDAFTRMAKAN_RUPIAHSETOR" name="param[TBLDAFTRMAKAN_RUPIAHSETOR]">
										</label>
									</section>
								</div> -->

								<div class="row">
									<section class="col col-md-2">
										<p>Pajak</p>
									</section>
									<section class="col col-md-2">
										<div class="input-group">
											<span class="input-group-addon">Rp</span>
											<input class="form-control format-rupiah" id="TBLDAFTRMAKAN_PAJAK" name="param[TBLDAFTRMAKAN_PAJAK]" type="text">
										</div>
									</section>

									<section class="col col-md-1">
										<p>Bunga SPT</p>
									</section>
									<section class="col col-md-2">
										<div class="input-group">
											<span class="input-group-addon">Rp</span>
											<input class="form-control format-rupiah" id="TBLDAFTRMAKAN_BUNGASPTPD" name="param[TBLDAFTRMAKAN_BUNGASPTPD]" type="text">
										</div>
									</section>

									<section class="col col-md-1">
										<p>Total Setor</p>
									</section>
									<section class="col col-md-2">
										<div class="input-group">
											<span class="input-group-addon">Rp</span>
											<input readonly="readonly" style="background-color: #eeeeee;" class="form-control format-rupiah" id="TBLDAFTRMAKAN_RUPIAHSETOR" name="TBLDAFTRMAKAN_RUPIAHSETOR" type="text">
										</div>
									</section>
								</div>
							</fieldset>

							<fieldset id="form-dokumentasi-tanggal" style="display: none;">
								<h4><strong>Dokumentasi Tanggal</strong></h4><br>
								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Terima SPT</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<i class="icon-append fa fa-calendar"></i>
											<input value="<?= date('d-m-Y') ?>" type="text" id="TBLDAFTRMAKAN_TGLTERIMA" name="param[TBLDAFTRMAKAN_TGLTERIMA]" class="datepicker" data-dateformat="dd-mm-yy">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Batas SPT</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<i class="icon-append fa fa-calendar"></i>
											<input disabled="disabled" style="background-color: #eeeeee;" value="<?= date('d-m-Y') ?>" type="text" id="TBLDAFTRMAKAN_TGLBATASSPTPD" name="param[TBLDAFTRMAKAN_TGLBATASSPTPD]" class="datepicker" data-dateformat="dd-mm-yy">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Entry SPT </p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<i class="icon-append fa fa-calendar"></i>
											<input style="background-color: #eeeeee;" value="<?= date('d-m-Y') ?>" disabled="disabled" type="text" id="TBLDAFTRMAKAN_TGLENTRI" name="param[TBLDAFTRMAKAN_TGLENTRI]" class="datepicker" data-dateformat="dd-mm-yy">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										Cara Penghitungan 
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select id="hit_carapenghitungan" name="hit_carapenghitungan" class="select2">
												<option selected="" disabled="">Silahkan Pilih</option>
												<option value="S" selected="" >Self Assesment</option>
												<option value="O">Official Assesment</option>
											</select> 
										</label>
									</section>
								</div>
							</fieldset>
							<footer>
								<div id="tbl_simpan">
									<button type="submit" class="btn btn-sm btn-primary">
										<i class="fa fa-floppy-o"></i>&nbsp;Simpan
									</button>
									<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
										<i class="fa fa-ban"></i>	Batal
									</button>
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

		jQuery(document).ready(function($) {
		window.today = new Date();
		window.dd = today.getDate();
		window.mm = today.getMonth()+1; //January is 0!
		window.yyyy = today.getFullYear();

		if(window.dd<10) {
		    window.dd='0'+window.dd
		} 

		if(window.mm<10) {
		    window.mm='0'+window.mm
		} 

		today = window.dd+'-'+window.mm+'-'+window.yyyy;

		$('#TBLDAFTRMAKAN_THNPAJAK').val(window.yyyy);
		// $('#TBLDAFTRMAKAN_BLNPAJAK').val(window.mm);
		$('#TBLDAFTRMAKAN_TGLPAJAK').val(window.dd);

		$('#TBLDAFTRMAKAN_TGLTERIMA').val(today);
		$('#TBLDAFTRMAKAN_TGLBATASSPTPD').val(today);
		$('#TBLDAFTRMAKAN_TGLENTRI').val(today);

		setPriceFormat();
	});

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
					window.namamerk = suggestion.TSUBYEK_BUNAMAMERK;
					window.alamat = suggestion.TNPWPD_MILIKALAMAT;
					window.alamatbu = suggestion.TSUBYEK_BUALAMAT;
					window.subkoderek = suggestion.TREKENINGSUB_KODE;
					$(this).val(suggestion.value);
					$('#TBLDAFTRMAKAN_NOPOK').val(suggestion.value.split(' | ')[0]);

				}
				,showNoSuggestionNotice : true
				,noCache : true
				,noSuggestionNotice : "Tidak ditemukan hasil"
			});
		}

		function cekPernahDaftar() {
			var THNPAJAK = $('#TBLDAFTRMAKAN_THNPAJAK').val();
			var BLNPAJAK = $('#TBLDAFTRMAKAN_BLNPAJAK option:selected').text();
			var TBLDAFTRMAKAN_NOPOK = $('#TBLDAFTRMAKAN_NOPOK').val();
			if (TBLDAFTRMAKAN_NOPOK=='') {
				notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
			}
			else{
				$.ajax({
					url: 'pendataan/restoran/cekPernahDaftar',
					type: 'POST',
					dataType: 'json',
					data: {
						nopokok: window.nopokok
						,THNPAJAK: $('#TBLDAFTRMAKAN_THNPAJAK').val()
						,BLNPAJAK: $('#TBLDAFTRMAKAN_BLNPAJAK').val()
					},
					success : function (respon) {
						if (respon.status=='sudah') {
							$.SmartMessageBox({
							title : "Informasi", // judul Smart Alert
							content : "Data dengan Nomor Pokok "+window.nopokok+", Masa Pajak "+BLNPAJAK+" "+THNPAJAK+" sudah pernah mendaftar. <br> Apakah anda ingin mengubah data ini?", // konten dari smart alert
							buttons : '[Tidak][Ya]' // pengaturan tombol
						}, function(ButtonPressed) {
							if (ButtonPressed === "Ya") {
								cari();
							}
						});
							return false;
						}
						else{
							cari();
						}
					}
				});
			}

		}

		function getTarifRekening(kodesubrek) {
			$.ajax({
				url: 'pendataan/restoran/GetKodeRek',
				type: 'POST',
				dataType: 'json',
				data: {
					kodesubrek : kodesubrek
				},
				success: function(respon) {
					$('#TREKENINGSUB_TARIF').val(respon.TREKENING_TARIF);
				}
			});
			
		}

	function cari() {
		$('#TBLDAFTRMAKAN_PERHARIJUAL').val('');
		$('#TBLDAFTRMAKAN_OMSETPAJAK').val('');
		$('#TBLDAFTRMAKAN_PAJAK').val('');
		$('#TBLDAFTRMAKAN_BUNGASPTPD').val('');
		$('#TBLDAFTRMAKAN_RUPIAHSETOR').val('');
		var TBLDAFTRMAKAN_NOPOK = $('#TBLDAFTRMAKAN_NOPOK').val();
		if (TBLDAFTRMAKAN_NOPOK=='') {
			notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
		}
		else{
			$('#footer-parkir').hide('fast');
			$("html, body").animate({ scrollTop: 800 }, "slow");
			$("#form-dokumentasi-tanggal").slideDown(600);
			
			$('#form-data-perhitungan').hide('fast');
			$.ajax({
				url: 'pendataan/restoran/getdata',
				type: 'POST',
				dataType: 'json',
				data: {
					 nopokok: window.nopokok
					,THNPAJAK: $('#TBLDAFTRMAKAN_THNPAJAK').val()
					,BLNPAJAK: $('#TBLDAFTRMAKAN_BLNPAJAK').val()
				},
				success: function(respon) {
					$('#TSUBYEK_BUNAMAMERK').val(respon.TSUBYEK_BUNAMAMERK);
					$('#TSUBYEK_BUALAMAT').val(respon.TSUBYEK_BUALAMAT);
					$('#TSUBYEK_MILIKALAMAT').html(window.TSUBYEK_MILIKALAMAT);
					$('#tarif_rekening').val(respon.TREKENING_TARIF);
					$('#TREKENINGSUB_KODE').select2('val',window.subkoderek);
					$('#persen_pajak').val(respon.TREKENING_TARIF);
					window.BULAN_DENDA = respon.BULAN_DENDA;
					window.PERSEN_DENDA = respon.PERSEN_DENDA;

					//$('#TBLDAFTRMAKAN_TGLSPTPD').val(respon.TBLDAFTRMAKAN_TGLSPTPD+'-'+respon.TBLDAFTRMAKAN_BLNSPTPD+'-20'+respon.TBLDAFTRMAKAN_THNSPTPD);
					
					getTarifRekening(window.subkoderek);
					$('#form-data-perhitungan').show('fast');
					$('#form-dokumentasi-tanggal').show('fast');
					$('#footer-parkir').show('fast');
					setMasaPajak();
				}
			});
			
		}
		
	}

	//perhitungan
	$('#TBLDAFTRMAKAN_PERHARIJUAL').keyup(function() {
		var penjualanhari = toAngka($('#TBLDAFTRMAKAN_PERHARIJUAL').val());
		var jumlahhari = $('#TBLDAFTRMAKAN_JUMLAHHARIJUAL').val();
		var tarif = $('#persen_pajak').val();
		if (penjualanhari!=0) {
			$('#TBLDAFTRMAKAN_OMSETPAJAK').attr('disabled', 'disabled');
			$('#TBLDAFTRMAKAN_OMSETPAJAK').attr('style', 'background:#e4e4e4');
			$('#TBLDAFTRMAKAN_OMSETPAJAK').attr('class', 'input-sm form-control');
		}else{
			$('#TBLDAFTRMAKAN_OMSETPAJAK').removeAttr('disabled');
			$('#TBLDAFTRMAKAN_OMSETPAJAK').removeAttr('style');
			$('#TBLDAFTRMAKAN_OMSETPAJAK').removeAttr('class');
		}
		if (tarif==0) {
			window.pajak = 0;
		}else{
			window.pajak = (penjualanhari*jumlahhari)*tarif/100;
		}
		var bulannow = <?php echo date('m'); ?>;
		var bulanpajak = $('#masapajak_bulan').select2('val');
		var bungabln = bulannow-bulanpajak;
		/*if (bungabln>0) {
			window.bunga_spt = window.pajak*(bungabln*2)/100;
		}else{
			window.bunga_spt = 0;
		}*/
		window.bunga_spt = window.pajak* (window.PERSEN_DENDA/100);
		window.totalpajak = window.pajak+window.bunga_spt;
		$('#TBLDAFTRMAKAN_PAJAK').val(window.pajak);
		//hitungbunga();
		$('#TBLDAFTRMAKAN_BUNGASPTPD').val(window.bunga_spt);
		$('#TBLDAFTRMAKAN_RUPIAHSETOR').val(window.totalpajak);

		setPriceFormat();
	});
	$('#TBLDAFTRMAKAN_OMSETPAJAK').keyup(function() {
		var penjualanbulan = toAngka($('#TBLDAFTRMAKAN_OMSETPAJAK').val());
		var jumlahhari = $('#TBLDAFTRMAKAN_JUMLAHHARIJUAL').val();
		var tarif = $('#persen_pajak').val();
		if (penjualanbulan!=0) {
			$('#TBLDAFTRMAKAN_PERHARIJUAL').attr('disabled', 'disabled');
			$('#TBLDAFTRMAKAN_PERHARIJUAL').attr('style', 'background:#e4e4e4');
			$('#TBLDAFTRMAKAN_PERHARIJUAL').attr('class', 'input-sm form-control');
		}else{
			$('#TBLDAFTRMAKAN_PERHARIJUAL').removeAttr('disabled');
			$('#TBLDAFTRMAKAN_PERHARIJUAL').removeAttr('style');
			$('#TBLDAFTRMAKAN_PERHARIJUAL').removeAttr('class');
		}
		if (tarif==0) {
			window.pajak = 0;
		}else{
			window.pajak = (penjualanbulan*tarif)/100;
		}
		var bulannow = <?php echo date('m'); ?>;
		var bulanpajak = $('#masapajak_bulan').select2('val');
		var bungabln = bulannow-bulanpajak;
		if (bungabln>0) {
			window.bunga_spt = window.pajak*(bungabln*2)/100;
		}else{
			window.bunga_spt = 0;
		}
		window.totalpajak = window.pajak+window.bunga_spt;
		$('#TBLDAFTRMAKAN_PAJAK').val(window.pajak);
		$('#TBLDAFTRMAKAN_BUNGASPTPD').val(window.bunga_spt);
		$('#TBLDAFTRMAKAN_RUPIAHSETOR').val(window.totalpajak);
		setPriceFormat();
	});

	function setMasaPajak() {
				$("#TBLDAFTRMAKAN_MULAI").val('');
				$("#TBLDAFTRMAKAN_AKHIR").val('');
				thn = $("#TBLDAFTRMAKAN_THNPAJAK").val();
				bln = $("#TBLDAFTRMAKAN_BLNPAJAK").val();
			// c = $("#tbltransaksiketetapan_notransaksi").val();
		if (thn!='' && bln!='') 
		{
			/*el = "#tbltransaksiketetapan_tglentrisptpd, #tbltransaksiketetapan_tglterimasptpd, #tbltransaksiketetapan_omzettotal, #tbltransaksiketetapan_rupiahdenda, #tbltransaksiketetapan_pajak";
			jQuery.each(el.split(', '), function(index, val) {
			  $(val).val($(val)[0].defaultValue);
			});*/
			window.cmdp = 'tambah';
			window.idtranskttap = 0;
			masapajak = moment([thn,(bln-1)]);
			$("#TBLDAFTRMAKAN_MULAI").val(masapajak.format('L'));
			$("#TBLDAFTRMAKAN_AKHIR").val(masapajak.endOf('month').format('L'));
			$("#TBLDAFTRMAKAN_JUMLAHHARIJUAL").val( masapajak.endOf('month').format('L').split('-')[0]-1 );
			// if (c!='') {
			// isSudahPendataan(thn, bln, c);
			// }
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

function hitungPajakBulan() {
		var OMZET = toAngka($('#TBLDAFTRMAKAN_OMSETPAJAK').val());
		var TARIF = $('#TREKENINGSUB_TARIF').val();
		var bulanpilih = parseInt($('#TBLDAFTRMAKAN_BLNPAJAK').val());
		var bulanini = <?= date('m'); ?>;

		var pajak = (OMZET*TARIF)/100;

		bungabln = bulanini-bulanpilih;

		bungarp = 0;
		if (bungabln > 0) {
			bungarp = bungabln*(2/100) * pajak;
			$('#TBLDAFTRMAKAN_BUNGASPTPD').val(bungarp);
		}

		if (OMZET!=0) {
			$('#TBLDAFTRMAKAN_PERHARIJUAL').attr('disabled', 'disabled');
			$('#TBLDAFTRMAKAN_PERHARIJUAL').attr('style', 'background:#e4e4e4');
			$('#TBLDAFTRMAKAN_PERHARIJUAL').attr('class', 'input-sm form-control');
		}else{
			$('#TBLDAFTRMAKAN_PERHARIJUAL').removeAttr('disabled');
			$('#TBLDAFTRMAKAN_PERHARIJUAL').removeAttr('style');
			$('#TBLDAFTRMAKAN_PERHARIJUAL').removeAttr('class');
		}

		var setor = pajak+bungarp;

		$('#TBLDAFTRMAKAN_PAJAK').val(pajak);
		$('#TBLDAFTRMAKAN_RUPIAHSETOR').val(setor);

		setPriceFormat();
	}

// $('#TBLDAFTRMAKAN_PERHARIJUAL, #TBLDAFTRMAKAN_JUMLAHHARIJUAL, #TBLDAFTRMAKAN_OMSETPAJAK').keyup(function(event) {
// 	HitungPajak();
// });

	function simpanPendataan () {
		$.ajax({
			url: 'pendataan/restoran/simpanPendataan',
			type: 'post',
			dataType: "json",
			data:  $("#form-pendataan-restoran").serialize() + '&' + jQuery.param(addparams),
			success: function(data) {
				if (data.status=="success") {
					notifikasi('Sukses','Data Berhasil Disimpan', 'success');
				}
				else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
				}
			}
		});
	}

	/*function simpanPendataan() {
		var addparams = {
			// TBLDAFTRMAKAN_NOPOK: $("#TBLDAFTRMAKAN_NOPOK").val()
		}
		$.ajax({
			url: 'pendataan/restoran/simpanPendataan',
			type: 'POST',
			dataType: 'json',
			data: $("#form-pendataan-restoran").serialize() + '&' + jQuery.param(addparams),
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}*/


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
/*//form validation*/
</script>
<style type="text/css">
input.disabled, textarea.disabled {
	background: #e4e4e4!important;
}
</style>
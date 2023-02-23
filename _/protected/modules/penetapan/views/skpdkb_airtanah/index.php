	<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="well well-sm well-light bg-color-greenLight txt-color-white">
				<h4><i class="fa fa-file-text-o"></i> SKPDKB - Pajak Air Tanah </h4>
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
				<div class="jarviswidget jarviswidget-color-teal" id="wid-id-kiosss" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>Data</h2>
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
							<form id="form-skpdkb-airtanah" class="smart-form">
								<fieldset>
									<header style="margin: -6px;">Validasi Penyetoran</header><br>
									<div class="row">
										<section class="col col-md-1">Tahun</section>
										<section class="col col-md-2">
											<!-- <label class="input">
												<input type="number" name="TBLPENDATAAN_THNPAJAK" id="TBLPENDATAAN_THNPAJAK">
											</label> -->
											<label class="select">
												<label class="input">
													<input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="TBLPENDATAAN_THNPAJAK" name="TBLPENDATAAN_THNPAJAK">
												</label>
											</label>
										</section>
										<section class="col col-md-2">Masa Pajak Terakhir</section>
										<section class="col col-md-2">
											<label class="select">
												<select class="select2" name="TBLPENDATAAN_BLNPAJAK" id="TBLPENDATAAN_BLNPAJAK">
													<option value="0">== Silahkan Pilih ==</option>
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
													<option selected="" value="12">Desember</option>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-1">Nomor Pokok</section>
										<section class="col col-md-6">
											<label class="input">
												<input class="form-control" type="text" id="TBLDAFTAR_NOPOK" name="TBLDAFTAR_NOPOK" autocomplete="on">
											</label>
										</section>
										<section class="col col-md-1">
											<a onclick="cari()" class="btn btn-sm btn-primary">Enter >></a>
										</section>
									</div>
									<hr><br>
									<div class="row">
										<section class="col col-md-12"><h4 align="center">Entry SKPDKB Pajak Air Tanah</h4></section>
									</div>
									<header style="margin: -6px;">Perorangan</header><br>
									<div class="row">
										<section class="col col-md-2">Nama</section>
										<section class="col col-md-5">
											<label class="input">
												<input style="background: #e4e4e4;" class="form-control" type="text" id="res_nama_wp" name="res_nama_wp" disabled="disabled">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">Alamat</section>
										<section class="col col-md-5">
											<label class="textarea">
												<textarea style="background: #e4e4e4;" class="form-control" rows="4" id="res_alamat_wp" name="res_alamat_wp" disabled="disabled"></textarea>
											</label>
										</section>
									</div>

									<div class="row">
										<section class="col col-md-2">
											<p>Rekening</p>
										</section>
										<section class="col col-md-4">
											<label class="select">
												<select class="select2" id="no_subrek" name="no_subrek" disabled="disabled">
													<option value="">== Silahkan Pilih Rekening ==</option>
														<?php foreach ($data['rek'] as $combo_subrek): ?>
															<option value="<?php echo $combo_subrek['TBLREKENING_KODE']; ?>">[<?php echo $combo_subrek['TBLREKENING_KODEFULL']; ?>] <?php echo $combo_subrek['TBLREKENING_NAMAREKENING']; ?></option>
														<?php endforeach ?>
												</select>
											</label>
										</section>
									</div>

									<div class="row" style="display: none;">
										<section class="col col-md-2">Rekening</section>
										<section class="col col-md-5">
											<label class="input">
												<input style="background: #e4e4e4;" class="form-control" type="text" id="nama_subrekening" name="nama_subrekening" disabled="disabled">
											</label>
										</section>
									</div>
									
									<div style="display: none;">
										<div class="row">
											<section class="col col-md-2"><b>Ketetapan Pajak SKPD</b></section>
										</div>
										<div class="row">
											<section class="col col-md-2" style="margin-left: 2%;">Jumlah Pajak</section>
											<section class="col col-md-5">
												<label class="input">
													<input  style="background: #e4e4e4;" class="input-sm format-rupiah" type="text" id="res_jumlah_pajak_tetap_wp" name="res_jumlah_pajak_tetap_wp" disabled="disabled">
												</label>
											</section>
										</div>
									
										<div class="row">
											<section class="col col-md-2"><b>Setoran Pajak SSPD</b></section>
										</div>
										<div class="row">
											<section class="col col-md-2" style="margin-left: 2%;">Jumlah Pajak</section>
											<section class="col col-md-5">
												<label class="input">
													<input style="background: #e4e4e4;" class="form-control" type="text" id="res_jumlah_pajak_setor_wp" name="res_jumlah_pajak_setor_wp" disabled="disabled">
												</label>
											</section>
										</div>
									</div>

									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Masa Pajak Awal</section>
										<section class="col col-md-2">
											<label class="select">
												<select class="select2" id="TBLDAFTTANAH_BLNKBAWAL" name="TBLDAFTTANAH_BLNKBAWAL">
													<option value="0">== Silahkan Pilih ==</option>
													<option selected="" value="1">Januari</option>
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
										<section class="col col-md-2">Masa Pajak Akhir</section>
										<section class="col col-md-2">
											<label class="select">
												<select class="select2" id="TBLDAFTTANAH_BLNKBAKHIR" name="TBLDAFTTANAH_BLNKBAKHIR">
													<option value="0">== Silahkan Pilih ==</option>
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
													<option selected="" value="12">Desember</option>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2"><b>Pemeriksaan Pajak</b></section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Nomor Pemeriksaan</section>
										<section class="col col-md-2">
											<label class="input">
												<input class="form-control" type="text" id="TBLDAFTTANAH_NOMORPERIKSA" name="TBLDAFTTANAH_NOMORPERIKSA">
											</label>
										</section>
										<section class="col col-md-2">Tanggal Pemeriksaan</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" value="<?= date('d-m-Y') ?>" name="TBLDAFTTANAH_TGLPERIKSA" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTTANAH_TGLPERIKSA">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Jumlah Pajak</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control format-rupiah" type="text" id="TBLDAFTTANAH_PAJAKPERIKSA" name="TBLDAFTTANAH_PAJAKPERIKSA">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2"><b>Kurang Bayar (SKPDKB)</b></section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Nomor SKPDKB</section>
										<section class="col col-md-2">
											<label class="input">
												<input class="form-control" type="text" id="TBLDAFTTANAH_REGKURANGBAYAR" name="TBLDAFTTANAH_REGKURANGBAYAR">
											</label>
										</section>
										<section class="col col-md-2">Tanggal SKPDKB</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" value="<?= date('d-m-Y') ?>" name="TBLDAFTTANAH_TGLKURANGBAYAR" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTTANAH_TGLKURANGBAYAR">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Jumlah Bunga</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-contro format-rupiah" type="text" id="TBLDAFTTANAH_BUNGAKRGBAYAR" name="TBLDAFTTANAH_BUNGAKRGBAYAR">
											</label>
										</section>
										<section class="col col-md-4">Jumlah Bunga Max 24 Bulan</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Jumlah Kenaikan</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control format-rupiah" type="text" id="TBLDAFTTANAH_KENAIKANKRGBAYAR" name="TBLDAFTTANAH_KENAIKANKRGBAYAR">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Jumlah Denda</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control format-rupiah" type="text" id="TBLDAFTTANAH_DENDAKRGBAYAR" name="TBLDAFTTANAH_DENDAKRGBAYAR">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Jumlah Kekurangan</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control format-rupiah" type="text" id="TBLDAFTTANAH_RUPIAHKRGBAYAR" name="TBLDAFTTANAH_RUPIAHKRGBAYAR">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;"><b>Tanggal Batas Pembayaran</b></section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="TBLDAFTTANAH_TGLBTSKRGBAYAR" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTTANAH_TGLBTSKRGBAYAR">
											</label>
										</section>
									</div>
								</fieldset>
								<footer>
									<div id="tbl_simpan">
										<button type="submit" class="btn btn-sm btn-primary">
											<i class="fa fa-save"></i>&nbsp;Simpan
										</button>

										<button type="button" class="btn btn-sm btn-success" onclick="cetakWord()">
											<i class="fa fa-print"></i>&nbsp;Cetak
										</button>

										<button type="button" class="btn btn-sm btn-default" data-dismiss="modal" onclick="reset_form()">
											<i class="fa fa-ban"></i>	Batal
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

	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugin/jquery-priceformat/jquery.price_format.2.0.min.js"></script>
	<script type="text/javascript">
		pageSetUp();
		setPriceFormat();

		function setMoment() {
			moment.locale('id');
			$("#TBLDAFTTANAH_TGLKURANGBAYAR").trigger('change');
		}

		jQuery(document).ready(function($) {
			reloadDT('dt_basic');

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

			$('#TBLPENDATAAN_THNPAJAK').val(window.yyyy);
			$('#TBLDAFTTANAH_TGLKURANGBAYAR').val(today);

			setMoment();
		});

		loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
			generateAutocompleteWPAirTanah();
		});

		function getNoSKPDKB(tahun) {
			$.ajax({
				url: 'penetapan/skpdkb_airtanah/GetNoSKPDKB',
				type: 'POST',
				dataType: 'json',
				data: {
					tahun: tahun
				},
				success: function(respon) {
					if (respon=='') {
						$('#TBLDAFTTANAH_REGKURANGBAYAR').val(1);
						
					}
					else{
						$('#TBLDAFTTANAH_REGKURANGBAYAR').val(respon.NOKB);
						if ($('#TBLDAFTTANAH_TGLBTSKRGBAYAR').val()=='') {
							$("#TBLDAFTTANAH_TGLKURANGBAYAR").trigger('change');
						}
					}
				}
			});
		}

		$("#TBLDAFTTANAH_TGLKURANGBAYAR").change(function(event) {
			var tglbatas = moment( $("#TBLDAFTTANAH_TGLKURANGBAYAR").val().split("-").reverse().join("-") ).add(1, "months");
			$("#TBLDAFTTANAH_TGLBTSKRGBAYAR").val( tglbatas.format('L') );
		});

		function generateAutocompleteWPAirTanah() {
			$('#TBLDAFTAR_NOPOK').autocomplete({
				serviceUrl: 'penetapan/skpdkb_airtanah/autocompletewpairtanah',

				onSelect: function (suggestion) {
			        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
			        window.id = suggestion.data;
			        window.nopokok = suggestion.TBLDAFTAR_NOPOK;
			        window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
			        window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
			        $(this).val(suggestion.value);
			        $('#TBLDAFTAR_NOPOK').val(suggestion.value.split(' | ')[0]);

			    }
			    ,showNoSuggestionNotice : true
			    ,noCache : true
			    ,noSuggestionNotice : "Tidak ditemukan hasil"
			});
		}

		function reset_form(){
			$("#form-skpdkb-airtanah")[0].reset();
			$("#form-skpdkb-airtanah .select2").select2('val', '');
			setMoment();
			// $('#btnsimpan').removeAttr('disabled');
			// reloadDT('dt_basic');
		}

		/*form validation*/
		loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
		function runFormValidation() {
			var $FormData = $("#form-skpdkb-airtanah").validate({
			// Rules for form validation
			rules : {
				"TBLPENDATAAN_THNPAJAK" : {
					required : true
				}
			},

			// Messages for form validation
			messages : {
				"TBLPENDATAAN_BLNPAJAK" : {
					required : 'Mohon isikan Bulan'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			},
			submitHandler : function(form) {
					// saat validasi benar semua, jalankan simpan()
					return simpanskpdkb();
				}
			});

		};
		/*//form validation*/

		function cetak () {
			var param = jQuery.param(
				{
					TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
					, TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").select2('val')
					, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
				}
			);
			window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/penetapan/skpdkb_airtanah/cetak?'+param);
		}

		function cetakWord () {
			var param = jQuery.param(
				{
					TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
					, TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").select2('val')
					, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
				}
			);
			window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/penetapan/skpdkb_airtanah/cetakword?'+param);
		}

		$("#TBLDAFTTANAH_PAJAKPERIKSA, #TBLDAFTTANAH_BUNGAKRGBAYAR, #TBLDAFTTANAH_KENAIKANKRGBAYAR").change(function(event) {
			HitungSKPDKB();
			setPriceFormat();
		});

		function HitungSKPDKB() {
			PJKPERIKSA = toAngka($('#TBLDAFTTANAH_PAJAKPERIKSA').val());
			BUNGAKB = toAngka($('#TBLDAFTTANAH_BUNGAKRGBAYAR').val());
			KENAIKAN = toAngka($('#TBLDAFTTANAH_KENAIKANKRGBAYAR').val());

			RUPIAHKB1 = Number(PJKPERIKSA) + Number(BUNGAKB);

			RUPIAHKB = Number(RUPIAHKB1) + Number(KENAIKAN);


			$(".TBLDAFTTANAH_RUPIAHKRGBAYAR").html(toRp(RUPIAHKB));
			$("#TBLDAFTTANAH_RUPIAHKRGBAYAR").val(RUPIAHKB);
			// $("#TBLDAFTTANAH_RUPIAHKRGBAYAR").val( RUPIAHKB.toFixed(2) );
		}

		function cekPernahDaftar() {
		var THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
		var BLNPAJAK = $('#TBLPENDATAAN_BLNPAJAK').val();
		var TBLDAFTAR_NOPOK = $('#TBLDAFTAR_NOPOK').val();

		getTglBatas(THNPAJAK,BLNPAJAK,window.subkoderek);

		if (TBLDAFTAR_NOPOK=='') {
			notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
			}
			else{
				$.ajax({
					url: 'penetapan/skpdkb_airtanah/CekPernahDaftar',
					type: 'POST',
					dataType: 'json',
					data: {
						 nopokok: window.nopokok
						,THNPAJAK: $('#masapajak_tahun').val()
						,BLNPAJAK: $('#masapajak_bulan').val()
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

		function cari () {
			var CARI_NOPOK = $('#TBLDAFTAR_NOPOK').val();
			var BULAN = $('#TBLPENDATAAN_BLNPAJAK').select2('val');
			var TAHUN = $('#TBLPENDATAAN_THNPAJAK').val();

			getNoSKPDKB(TAHUN);

			if (CARI_NOPOK=='') {
				notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
			}else if(TAHUN==''){
				notifikasi('Informasi','Mohon isikan Tahun','failed',1,0);
			}else if(BULAN==''){
				notifikasi('Informasi','Mohon isikan Bulan','failed',1,0);
			}else{
				$.ajax({
					url: 'penetapan/skpdkb_airtanah/getdata',
					type: 'POST',
					dataType: 'json',
					data: {
						TBLDAFTAR_NOPOK : CARI_NOPOK,
						bulan : $('#TBLPENDATAAN_BLNPAJAK').select2('val'),
						tahun : $('#TBLPENDATAAN_THNPAJAK').val()
					},
					success: function(respon) {
						if (respon.data=='sudah entri') {

							$.SmartMessageBox({
								title : "Informasi", // judul Smart Alert
								content : "Data dengan Nomor Pokok "+CARI_NOPOK+", Masa Pajak "+ $('#TBLPENDATAAN_BLNPAJAK').select2('val')+" "+$('#TBLPENDATAAN_THNPAJAK').val()+" sudah pernah mendaftar. <br> Apakah anda ingin mengubah data ini?", // konten dari smart alert
								buttons : '[Tidak][Ya]' // pengaturan tombol
								}, function(ButtonPressed) {
									if (ButtonPressed === "Ya") {

										$('#TBLDAFTTANAH_BLNKBAWAL').select2('val',respon.AWAL_PAJAK);
										$('#TBLDAFTTANAH_BLNKBAKHIR').select2('val',$('#TBLPENDATAAN_BLNPAJAK').val());
										$('#res_nama_wp').val(respon.TBLDAFTAR_BADANUSAHANAMA);
										$('#nama_subrekening').val(respon.TREKENING_NAMA);
										$('#no_subrek').select2('val',respon.REKENING_KODE);
										$('#hit_jumlahhari').val(respon.JUMLAH_HARI);
										$('#res_alamat_wp').val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
										$('#form_perhitungan').show('fast');
										$('#form_dokumentasi_tanggal').show('fast');
										$('#persen_pajak').val(respon.TREKENING_TARIF);
										$('#kecamatan_pajak').val(respon.TBLKECAMATAN_ID);
										$('#kelurahan_pajak').val(respon.TBLKELURAHAN_ID);
										// $('#TREKENINGSUB_KODE').select2('val',respon.REKENING_KODE);
										// $('#TREKENINGSUB_KODE').val(respon.TREKENINGSUB_KODE);
										$('#tarif_rekening').val(respon.TREKENING_TARIF);
										$('#res_jumlah_pajak_tetap_wp').val(respon.TBLDAFTTANAH_PAJAK);
										$('#res_jumlah_pajak_setor_wp').val(respon.TBLDAFTTANAH_PAJAK);
										$('#TBLDAFTTANAH_REGKURANGBAYAR').val(respon.TBLDAFTTANAH_REGKURANGBAYAR);
										$('#TBLDAFTTANAH_PAJAKPERIKSA').val(respon.TBLDAFTTANAH_PAJAKPERIKSA);
										$('#TBLDAFTTANAH_BUNGAKRGBAYAR').val(respon.TBLDAFTTANAH_BUNGAKRGBAYAR);
										$('#TBLDAFTTANAH_KENAIKANKRGBAYAR').val(respon.TBLDAFTTANAH_KENAIKANKRGBAYAR);
										$('#TBLDAFTTANAH_DENDAKRGBAYAR').val(respon.TBLDAFTTANAH_DENDAKRGBAYAR);
										$('#TBLDAFTTANAH_RUPIAHKRGBAYAR').val(respon.TBLDAFTTANAH_RUPIAHKRGBAYAR);
										$('#TBLDAFTTANAH_BLNKBAWAL').select2('val',respon.TBLDAFTTANAH_BLNKBAWAL);
										$('#TBLDAFTTANAH_BLNKBAKHIR').val(respon.TBLDAFTTANAH_BLNKBAKHIR);
										$('#TBLDAFTTANAH_NOMORPERIKSA').val(respon.TBLDAFTTANAH_NOMORPERIKSA);
										$('#TBLDAFTTANAH_TGLKURANGBAYAR').val(respon.TBLDAFTTANAH_TGLKURANGBAYAR +'-'+ respon.TBLDAFTTANAH_BLNKURANGBAYAR +'-20'+respon.TBLDAFTTANAH_THNKURANGBAYAR);
										$('#TBLDAFTTANAH_TGLBTSKRGBAYAR').val(respon.TBLDAFTTANAH_TGLBTSKRGBAYAR +'-'+ respon.TBLDAFTTANAH_BLNBTSKRGBAYAR +'-20'+ respon.TBLDAFTTANAH_THNBTSKRGBAYAR);
										window.BULAN_DENDA = respon.BULAN_DENDA;
										window.PERSEN_DENDA = respon.PERSEN_DENDA;
										$('#footer-airtanah').show('fast');
										setPriceFormat();
									}
							});
							return false;

						} else if(respon.data=='sudah terdaftar') {

							$('#TBLDAFTTANAH_BLNKBAWAL').select2('val',respon.AWAL_PAJAK);
							$('#TBLDAFTTANAH_BLNKBAKHIR').select2('val',$('#TBLPENDATAAN_BLNPAJAK').val());
							$('#res_nama_wp').val(respon.TBLDAFTAR_BADANUSAHANAMA);
							$('#nama_subrekening').val(respon.TREKENING_NAMA);
							$('#no_subrek').select2('val',respon.REKENING_KODE);
							$('#hit_jumlahhari').val(respon.JUMLAH_HARI);
							$('#res_alamat_wp').val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
							$('#form_perhitungan').show('fast');
							$('#form_dokumentasi_tanggal').show('fast');
							$('#persen_pajak').val(respon.TREKENING_TARIF);
							$('#kecamatan_pajak').val(respon.TBLKECAMATAN_ID);
							$('#kelurahan_pajak').val(respon.TBLKELURAHAN_ID);
							// $('#TREKENINGSUB_KODE').select2('val',respon.REKENING_KODE);
							// $('#TREKENINGSUB_KODE').val(respon.TREKENINGSUB_KODE);
							$('#tarif_rekening').val(respon.TREKENING_TARIF);
							$('#res_jumlah_pajak_tetap_wp').val(respon.TBLDAFTTANAH_PAJAK);
							$('#res_jumlah_pajak_setor_wp').val(respon.TBLDAFTTANAH_PAJAK);
							window.BULAN_DENDA = respon.BULAN_DENDA;
							window.PERSEN_DENDA = respon.PERSEN_DENDA;
							$('#footer-airtanah').show('fast');

						} else {
							notifikasi('Referensi Belum Terdaftar', 'Data dengan nomor '+$('#TBLDAFTAR_NOPOK').val()+' Belum Terdaftar', 'failed', 1,0);
						}
					}
				});
			}
		}

		function simpanskpdkb () {
			$.ajax({
				url: 'penetapan/skpdkb_airtanah/SimpanSKPDKBAirTanah',
				type: 'post',
				dataType: "json",
				data:  $("#form-skpdkb-airtanah").serialize()+'&idkecamatan='+window.idkecamatan+'&idkelurahan='+window.idkelurahan,
				success: function(data) {
					if (data.status=="success") {
						notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
					}
					else {
						notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
					}
				}
			});
		}

	</script>
	<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="well well-sm well-light bg-color-greenLight txt-color-white">
				<h4><i class="fa fa-file-text-o"></i> STPD - Pajak Restoran </h4>
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
							<form id="form-stpd-restoran" class="smart-form">
								<fieldset>
									<header style="margin: -6px;">Validasi Tagihan</header><br>
									<div class="row">
										<section class="col col-md-1">Tahun</section>
										<section class="col col-md-2">
											<!-- <label class="input">
												<input type="number" name="TBLPENDATAAN_THNPAJAK" id="TBLPENDATAAN_THNPAJAK">
											</label> -->
											<label class="select">
												<select class="select2" name="TBLPENDATAAN_THNPAJAK" id="TBLPENDATAAN_THNPAJAK">
													<option selected value="0">== Tahun ==</option>
													<option value="2022">2022</option>
													<option value="2021">2021</option>
													<option value="2020">2020</option>
													<option value="2019">2019</option>
													<option value="2018">2018</option>
													<option value="2017">2017</option>
													<option value="2016">2016</option>
													<option value="2015">2015</option>
													<option value="2014">2014</option>
													<option value="2013">2013</option>
													<option value="2012">2012</option>
													<option value="2011">2011</option>
													<option value="2010">2010</option>
												</select>
											</label>
										</section>
										<section class="col col-md-2">Masa Pajak</section>
										<section class="col col-md-2">
											<label class="select">
												<select class="select2" name="TBLPENDATAAN_BLNPAJAK" id="TBLPENDATAAN_BLNPAJAK">
													<option selected value="0">== Bulan ==</option>
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
										<section class="col col-md-12"><h4 align="center">Entry STPD Pajak Restoran</h4></section>
									</div>
		

									<header style="margin: -6px;">Wajib Pajak</header><br>
									<div class="row">
										<section class="col col-md-2">Nama</section>
										<section class="col col-md-5">
											<label class="input">
												<input style="background: #e4e4e4;" class="form-control" type="text" id="res_nama_wp" name="res_nama_wp" readonly="">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">Alamat</section>
										<section class="col col-md-5">
											<label class="textarea">
												<textarea style="background: #e4e4e4;" class="form-control" rows="4" id="res_alamat_wp" name="res_alamat_wp" readonly=""></textarea>
											</label>
										</section>
									</div>

									<div class="row">
										<section class="col col-md-2">
											<p>Rekening</p>
										</section>
										<section class="col col-md-4">
											<label class="select">
												<select class="select2" id="no_subrek" name="no_subrek" readonly="">
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
												<input style="background: #e4e4e4;" class="form-control" type="text" id="nama_subrekening" name="nama_subrekening" readonly="">
											</label>
										</section>
									</div>
									
									<div>
										<div class="row">
											<section class="col col-md-2"><b>Ketetapan Pajak SKPD</b></section>
										</div>
										<div class="row">
											<section class="col col-md-2" style="margin-left: 2%;">Tanggal SKPD</section>
											<section class="col col-md-2">
												<label class="input">
													<input  style="background: #e4e4e4;" class="form-control" type="text" value="<?= date('d-m-Y') ?>" id="res_tanggal_pajak_tetap_wp" name="res_tanggal_pajak_tetap_wp" readonly="">
												</label>
											</section>
											<section class="col col-md-2" style="margin-left: 2%;">Nomor SKPD</section>
											<section class="col col-md-2">
												<label class="input">
													<input  style="background: #e4e4e4;" class="form-control" type="text" id="res_nomor_pajak_tetap_wp" name="res_nomor_pajak_tetap_wp" readonly="">
												</label>
											</section>
										</div>
										<div class="row">
											<section class="col col-md-2" style="margin-left: 2%;">Jumlah SKPD</section>
											<section class="col col-md-5">
												<label class="input">
													<input  style="background: #e4e4e4;" class="form-control format-rupiah" type="text" id="res_jumlah_pajak_tetap_wp" name="res_jumlah_pajak_tetap_wp" readonly="">
												</label>
											</section>
										</div>
									
										<div class="row">
											<section class="col col-md-2"><b>Setoran Pajak SSPD</b></section>
										</div>
										<div class="row">
											<section class="col col-md-2" style="margin-left: 2%;">Tanggal SSPD</section>
											<section class="col col-md-2">
												<label class="input">
													<input style="background: #e4e4e4;" class="form-control" type="text" value="<?= date('d-m-Y') ?>" id="res_tanggal_pajak_setor_wp" name="res_tanggal_pajak_setor_wp" readonly="">
												</label>
											</section>
											<section class="col col-md-2" style="margin-left: 2%;">Nomor SSPD</section>
											<section class="col col-md-2">
												<label class="input">
													<input style="background: #e4e4e4;" class="form-control" type="text" id="res_nomor_pajak_setor_wp" name="res_nomor_pajak_setor_wp" readonly="">
												</label>
											</section>
										</div>
										<div class="row">
											<section class="col col-md-2" style="margin-left: 2%;">Jumlah SSPD</section>
											<section class="col col-md-5">
												<label class="input">
													<input style="background: #e4e4e4;" class="form-control format-rupiah" type="text" id="res_jumlah_pajak_setor_wp" name="res_jumlah_pajak_setor_wp" readonly="">
												</label>
											</section>
										</div>
									</div>

									<div class="row" style="display: none;">
										<section class="col col-md-2" style="margin-left: 2%;">Masa Pajak Awal</section>
										<section class="col col-md-2">
											<label class="select">
												<select class="select2" id="TBLDAFTRMAKAN_BLNKBAWAL" name="TBLDAFTRMAKAN_BLNKBAWAL">
													<option value="0">== Silahkan Pilih ==</option>
													<option selected value="1">Januari</option>
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
												<select class="select2" id="TBLDAFTRMAKAN_BLNKBAKHIR" name="TBLDAFTRMAKAN_BLNKBAKHIR">
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
										<section class="col col-md-2">Tanggal Pemeriksaan</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input style="background: #e4e4e4;" type="text" value="<?= date('d-m-Y') ?>" name="TBLDAFTRMAKAN_TGLPERIKSA" id="TBLDAFTRMAKAN_TGLPERIKSA" readonly="">
											</label>
										</section>
										<section class="col col-md-2" style="margin-left: 2%;">Nomor Pemeriksaan</section>
										<section class="col col-md-2">
											<label class="input">
												<input style="background: #e4e4e4;" class="form-control" type="text" id="TBLDAFTRMAKAN_NOMORPERIKSA" name="TBLDAFTRMAKAN_NOMORPERIKSA" readonly="">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Jumlah Pajak</section>
										<section class="col col-md-4">
											<label class="input">
												<input style="background: #e4e4e4;" class="form-control format-rupiah" type="text" id="TBLDAFTRMAKAN_PAJAKPERIKSA" name="TBLDAFTRMAKAN_PAJAKPERIKSA" readonly="">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2"><b>Data Tagihan (STPD)</b></section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Nomor STPD</section>
										<section class="col col-md-2">
											<label class="input">
												<input class="form-control" type="text" id="TBLDAFTRMAKAN_NOSURATTAGIHAN" name="TBLDAFTRMAKAN_NOSURATTAGIHAN">
											</label>
										</section>
										<section class="col col-md-2">Tanggal STPD</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" value="<?= date('d-m-Y') ?>" name="TBLDAFTRMAKAN_TGLSURATTAGIHAN" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTRMAKAN_TGLSURATTAGIHAN">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Jumlah Bunga</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control format-rupiah" type="text" id="TBLDAFTRMAKAN_BUNGATAGIHAN" name="TBLDAFTRMAKAN_BUNGATAGIHAN">
											</label>
										</section>
										<section class="col col-md-2">Jumlah Bulan</section>
										<section class="col col-md-2">
											<label class="input">
												<input class="form-control" type="number" id="res_jumlah_bulan_wp" name="res_jumlah_bulan_wp">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Jumlah Tagihan</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control format-rupiah" type="text" id="TBLDAFTRMAKAN_RUPIAHTAGIHAN" name="TBLDAFTRMAKAN_RUPIAHTAGIHAN">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;"><b>Tanggal Batas Pembayaran</b></section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="TBLDAFTRMAKAN_TGLBTSTAGIHAN" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTRMAKAN_TGLBTSTAGIHAN">
											</label>
										</section>
									</div>
								</fieldset>
								<footer>
									<div id="tbl_simpan">
										<button type="submit" id="btnsimpan" class="btn btn-sm btn-primary">
											<i class="fa fa-save"></i>&nbsp;Simpan
										</button>

										<button type="button" id="btncetak" class="btn btn-sm btn-success" onclick="cetakWord()">
											<i class="fa fa-print"></i>&nbsp;Cetak
										</button>

										<button type="button" class="btn btn-sm btn-default" data-dismiss="modal" onclick="reset_form()">
											<i class="fa fa-ban"></i>	Reset
										</button>

										<!-- <button type="button" id="btnhapus" class="btn btn-sm btn-danger" onclick="hapuskb()">
											<i class="fa fa-save"></i>&nbsp;Hapus Data KB
										</button> -->
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
			$("#TBLDAFTRMAKAN_TGLSURATTAGIHAN").trigger('change');
		}

		jQuery(document).ready(function($) {
			reloadDT('dt_basic');
			$('#btncetak').hide('fast');

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
			$('#TBLDAFTRMAKAN_TGLSURATTAGIHAN').val(today);

			setMoment();
		});

		loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
			generateAutocompleteWPResto();
		});

		function getNoSKPDKB(tahun) {
			$.ajax({
				url: 'penetapan/stpd_restoran/GetNoSKPDKB',
				type: 'POST',
				dataType: 'json',
				data: {
					tahun: tahun
				},
				success: function(respon) {
					if (respon=='') {
						$('#TBLDAFTRMAKAN_NOSURATTAGIHAN').val(1);
						
					}
					else{
						$('#TBLDAFTRMAKAN_NOSURATTAGIHAN').val(respon.NOKB);
						if ($('#TBLDAFTRMAKAN_TGLBTSTAGIHAN').val()=='') {
							$("#TBLDAFTRMAKAN_TGLSURATTAGIHAN").trigger('change');
						}
					}
				}
			});
		}

		$("#TBLDAFTRMAKAN_TGLSURATTAGIHAN").change(function(event) {
			var tglbatas = moment( $("#TBLDAFTRMAKAN_TGLSURATTAGIHAN").val().split("-").reverse().join("-") ).add(1, "days");
			$("#TBLDAFTRMAKAN_TGLBTSTAGIHAN").val( tglbatas.format('L') );
		});

		function generateAutocompleteWPResto() {
			$('#TBLDAFTAR_NOPOK').autocomplete({
				serviceUrl: 'penetapan/stpd_restoran/autocompletewpresto',

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
			$("#form-stpd-restoran")[0].reset();
			$("#form-stpd-restoran .select2").select2('val', '');
			setMoment();
			$('#btnsimpan').removeAttr('disabled');
			$('#btncetak').hide('fast');
			// reloadDT('dt_basic');
		}

		/*form validation*/
		loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
		function runFormValidation() {
			var $FormData = $("#form-stpd-restoran").validate({
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
			window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/penetapan/stpd_restoran/cetak?'+param);
		}

		function cetakWord () {
			var param = jQuery.param(
				{
					TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
					, TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").select2('val')
					, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
				}
			);
			window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/penetapan/stpd_restoran/cetakword?'+param);
		}

		$("#res_jumlah_bulan_wp").change(function(event) {
			HitungSKPDKB();
			Hitungtotal();
			setPriceFormat();
		});

		function HitungSKPDKB() {
			PAJAK = toAngka($('#res_jumlah_pajak_tetap_wp').val());
			BULAN = $('#res_jumlah_bulan_wp').val();

			RUPIAHKB1 = (Number(PAJAK) * 2)/100;
			RUPIAHKB = (RUPIAHKB1) * BULAN;

			$(".TBLDAFTRMAKAN_BUNGATAGIHAN").html(toRp(RUPIAHKB));
			$("#TBLDAFTRMAKAN_BUNGATAGIHAN").val(RUPIAHKB.toFixed(0));

			console.log('RUPIAHKB='+RUPIAHKB);
			// $("#TBLDAFTRMAKAN_RUPIAHTAGIHAN").val( RUPIAHKB.toFixed(2) );
		}

		function Hitungtotal(){
			PAJAK = toAngka($('#res_jumlah_pajak_tetap_wp').val());
			
			$(".TBLDAFTRMAKAN_RUPIAHTAGIHAN").html(toRp(PAJAK));
			$("#TBLDAFTRMAKAN_RUPIAHTAGIHAN").val(PAJAK);

		}


		function cari () {
			var CARI_NOPOK = $('#TBLDAFTAR_NOPOK').val();
			var BULAN = $('#TBLPENDATAAN_BLNPAJAK').select2('val');
			var TAHUN = $('#TBLPENDATAAN_THNPAJAK').val();
			window.tahun = $('#TBLPENDATAAN_THNPAJAK').val();

			getNoSKPDKB(TAHUN);

			if (CARI_NOPOK=='') {
				notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
			}else if(TAHUN==''){
				notifikasi('Informasi','Mohon isikan Tahun','failed',1,0);
			}else if(BULAN==''){
				notifikasi('Informasi','Mohon isikan Bulan','failed',1,0);
			}else{
				$.ajax({
					url: 'penetapan/stpd_restoran/getdata',
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
								content : "Data dengan Nomor Pokok "+CARI_NOPOK+", Masa Pajak "+ $('#TBLPENDATAAN_BLNPAJAK').select2('val')+" "+$('#TBLPENDATAAN_THNPAJAK').val()+" sudah memilik STPD. <br> Apakah anda ingin mengubah data ini?", // konten dari smart alert
								buttons : '[Tidak][Ya]' // pengaturan tombol
								}, function(ButtonPressed) {
									if (ButtonPressed === "Ya") {
										getNoSKPDKB(window.tahun);
										if (respon.TBLDAFTRMAKAN_BLNKBAWAL!=null) {
											$('#TBLDAFTRMAKAN_BLNKBAWAL').select2('val',$('#TBLDAFTRMAKAN_BLNKBAWAL').val());
										}
										$('#TBLDAFTRMAKAN_BLNKBAKHIR').select2('val',$('#TBLPENDATAAN_BLNPAJAK').val());
										$('#res_nama_wp').val(respon.TBLDAFTAR_BADANUSAHANAMA);
										$('#nama_subrekening').val(respon.TREKENING_NAMA);
										$('#no_subrek').select2('val',respon.REKENING_KODE);
										$('#hit_jumlahhari').val(respon.JUMLAH_HARI);
										$('#res_alamat_wp').val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
										$('#persen_pajak').val(respon.TREKENING_TARIF);
										$('#kecamatan_pajak').val(respon.TBLKECAMATAN_ID);
										$('#kelurahan_pajak').val(respon.TBLKELURAHAN_ID);
										$('#tarif_rekening').val(respon.TREKENING_TARIF);
										$('#res_tanggal_pajak_tetap_wp').val(respon.TBLDAFTRMAKAN_TGLSKPD +'-'+ respon.TBLDAFTRMAKAN_BLNSKPD +'-20'+ respon.TBLDAFTRMAKAN_THNSKPD);
										$('#res_nomor_pajak_tetap_wp').val('');
										$('#res_jumlah_pajak_tetap_wp').val(respon.TBLDAFTRMAKAN_PAJAK);
										$('#res_tanggal_pajak_setor_wp').val(respon.TBLDAFTRMAKAN_TGLENTRISETOR +'-'+ respon.TBLDAFTRMAKAN_BLNENTRISETOR +'-20'+ respon.TBLDAFTRMAKAN_THNENTRISETOR);
										$('#res_nomor_pajak_setor_wp').val(respon.TBLDAFTRMAKAN_REGSETOR);
										$('#res_jumlah_pajak_setor_wp').val(respon.TBLDAFTRMAKAN_RUPIAHSETOR);
										$('#TBLDAFTRMAKAN_PAJAKPERIKSA').val(respon.TBLDAFTRMAKAN_PAJAKPERIKSA);
										$('#TBLDAFTRMAKAN_BUNGATAGIHAN').val(respon.TBLDAFTRMAKAN_BUNGATAGIHAN);
										$('#TBLDAFTRMAKAN_KENAIKANKRGBAYAR').val(respon.TBLDAFTRMAKAN_KENAIKANKRGBAYAR);
										$('#TBLDAFTRMAKAN_DENDAKRGBAYAR').val(respon.TBLDAFTRMAKAN_DENDAKRGBAYAR);
										$('#TBLDAFTRMAKAN_RUPIAHTAGIHAN').val(respon.TBLDAFTRMAKAN_RUPIAHTAGIHAN);
										$('#TBLDAFTRMAKAN_BLNKBAKHIR').val(respon.TBLDAFTRMAKAN_BLNKBAKHIR);
										$('#TBLDAFTRMAKAN_NOMORPERIKSA').val(respon.TBLDAFTRMAKAN_NOMORPERIKSA);
										$('#TBLDAFTRMAKAN_TGLPERIKSA').val(respon.TBLDAFTRMAKAN_TGLPERIKSA +'-'+ respon.TBLDAFTRMAKAN_BLNPERIKSA +'-20'+ respon.TBLDAFTRMAKAN_THNPERIKSA);
										$('#TBLDAFTRMAKAN_NOSURATTAGIHAN').val(respon.TBLDAFTRMAKAN_NOSURATTAGIHAN);
										$('#TBLDAFTRMAKAN_TGLSURATTAGIHAN').val(respon.TBLDAFTRMAKAN_TGLSURATTAGIHAN +'-'+ respon.TBLDAFTRMAKAN_BLNSURATTAGIHAN +'-20'+respon.TBLDAFTRMAKAN_THNSURATTAGIHAN);
										$('#TBLDAFTRMAKAN_TGLBTSTAGIHAN').val(respon.TBLDAFTRMAKAN_TGLBTSTAGIHAN +'-'+ respon.TBLDAFTRMAKAN_BLNBTSKRGBAYAR +'-20'+ respon.TBLDAFTRMAKAN_THNBTSTAGIHAN);
									
										$('#footer-resto').show('fast');
										setPriceFormat();
										$('#btnsimpan').removeAttr('disabled');
										$('#btncetak').hide('fast');
									} else {
										$('#TBLDAFTRMAKAN_NOSURATTAGIHAN').val(respon.TBLDAFTRMAKAN_NOSURATTAGIHAN);

										if (respon.TBLDAFTRMAKAN_BLNKBAWAL!=null) {
											$('#TBLDAFTRMAKAN_BLNKBAWAL').select2('val',$('#TBLDAFTRMAKAN_BLNKBAWAL').val());
										}
										$('#TBLDAFTRMAKAN_BLNKBAKHIR').select2('val',$('#TBLPENDATAAN_BLNPAJAK').val());
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
										$('#tarif_rekening').val(respon.TREKENING_TARIF);
										$('#res_jumlah_pajak_tetap_wp').val(respon.TBLDAFTRMAKAN_PAJAK);
										$('#res_jumlah_pajak_setor_wp').val(respon.TBLDAFTRMAKAN_PAJAK);
										$('#TBLDAFTRMAKAN_PAJAKPERIKSA').val(respon.TBLDAFTRMAKAN_PAJAKPERIKSA);
										$('#TBLDAFTRMAKAN_BUNGATAGIHAN').val(respon.TBLDAFTRMAKAN_BUNGATAGIHAN);
										$('#TBLDAFTRMAKAN_KENAIKANKRGBAYAR').val(respon.TBLDAFTRMAKAN_KENAIKANKRGBAYAR);
										$('#TBLDAFTRMAKAN_DENDAKRGBAYAR').val(respon.TBLDAFTRMAKAN_DENDAKRGBAYAR);
										$('#TBLDAFTRMAKAN_RUPIAHTAGIHAN').val(respon.TBLDAFTRMAKAN_RUPIAHTAGIHAN);
										$('#TBLDAFTRMAKAN_BLNKBAKHIR').val(respon.TBLDAFTRMAKAN_BLNKBAKHIR);
										$('#TBLDAFTRMAKAN_NOMORPERIKSA').val(respon.TBLDAFTRMAKAN_NOMORPERIKSA);
										$('#TBLDAFTRMAKAN_TGLPERIKSA').val(respon.TBLDAFTRMAKAN_TGLPERIKSA +'-'+ respon.TBLDAFTRMAKAN_BLNPERIKSA +'-20'+ respon.TBLDAFTRMAKAN_THNPERIKSA);
										$('#TBLDAFTRMAKAN_NOSURATTAGIHAN').val(respon.TBLDAFTRMAKAN_NOSURATTAGIHAN);
										$('#TBLDAFTRMAKAN_TGLSURATTAGIHAN').val(respon.TBLDAFTRMAKAN_TGLSURATTAGIHAN +'-'+ respon.TBLDAFTRMAKAN_BLNSURATTAGIHAN +'-20'+respon.TBLDAFTRMAKAN_THNSURATTAGIHAN);
										$('#TBLDAFTRMAKAN_TGLBTSTAGIHAN').val(respon.TBLDAFTRMAKAN_TGLBTSTAGIHAN +'-'+ respon.TBLDAFTRMAKAN_BLNBTSKRGBAYAR +'-20'+ respon.TBLDAFTRMAKAN_THNBTSTAGIHAN);
									
										$('#footer-resto').show('fast');
										setPriceFormat();

										$('#btnsimpan').removeAttr('disabled');
										$('#btncetak').hide('fast');
									}
							});
							return false;

						} else if(respon.data=='sudah terdaftar') {
							if (respon.TBLDAFTRMAKAN_BLNKBAWAL!=null) {
											$('#TBLDAFTRMAKAN_BLNKBAWAL').select2('val',$('#TBLDAFTRMAKAN_BLNKBAWAL').val());
										}
							$('#TBLDAFTRMAKAN_BLNKBAKHIR').select2('val',$('#TBLPENDATAAN_BLNPAJAK').val());
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
							$('#tarif_rekening').val(respon.TREKENING_TARIF);
							$('#res_tanggal_pajak_tetap_wp').val(respon.TBLDAFTRMAKAN_TGLSKPD +'-'+ respon.TBLDAFTRMAKAN_BLNSKPD +'-20'+ respon.TBLDAFTRMAKAN_THNSKPD);
							$('#res_nomor_pajak_tetap_wp').val('');
							$('#res_jumlah_pajak_tetap_wp').val(respon.TBLDAFTRMAKAN_PAJAK);
							$('#res_tanggal_pajak_setor_wp').val(respon.TBLDAFTRMAKAN_TGLENTRISETOR +'-'+ respon.TBLDAFTRMAKAN_BLNENTRISETOR +'-20'+ respon.TBLDAFTRMAKAN_THNENTRISETOR);
							$('#res_nomor_pajak_setor_wp').val(respon.TBLDAFTRMAKAN_REGSETOR);
							$('#res_jumlah_pajak_setor_wp').val(respon.TBLDAFTRMAKAN_RUPIAHSETOR);
							$('#TBLDAFTRMAKAN_BUNGATAGIHAN').val('');
							$('#TBLDAFTRMAKAN_RUPIAHTAGIHAN').val('');
							$('#TBLDAFTRMAKAN_PAJAKPERIKSA').val(respon.TBLDAFTRMAKAN_PAJAKPERIKSA);
							$('#TBLDAFTRMAKAN_NOMORPERIKSA').val(respon.TBLDAFTRMAKAN_NOMORPERIKSA);
							$('#TBLDAFTRMAKAN_TGLPERIKSA').val(respon.TBLDAFTRMAKAN_TGLPERIKSA +'-'+ respon.TBLDAFTRMAKAN_BLNPERIKSA +'-20'+ respon.TBLDAFTRMAKAN_THNPERIKSA);
							$('#footer-resto').show('fast');
							$('#btncetak').show('fast');
							setPriceFormat();
							var tglbatas = moment( $("#TBLDAFTRMAKAN_TGLSURATTAGIHAN").val().split("-").reverse().join("-") ).add(1, "months");
							$("#TBLDAFTRMAKAN_TGLBTSTAGIHAN").val( tglbatas.format('L') );
							$('#btnsimpan').removeAttr('disabled');
						} else if (respon.data=='sudah dibayar'){
							notifikasi('Sudah Dalam Proses Bayar', 'Data KB dengan nomor '+$('#TBLDAFTAR_NOPOK').val()+' Sudah Dibayar', 'failed', 1,0);
							reset_form();
							$('#btnsimpan').attr('disabled','');
						} else if (respon.data=='ada angsur'){
							notifikasi('Sudah Dalam Proses Angsuran', 'Data KB dengan nomor '+$('#TBLDAFTAR_NOPOK').val()+' Sudah Memiliki Angsuran', 'failed', 1,0);
							reset_form();
							$('#btnsimpan').attr('disabled','');	
						} else {
							notifikasi('Referensi SPT Belum Terdaftar', 'Data dengan nomor '+$('#TBLDAFTAR_NOPOK').val()+' Belum Terdaftar', 'failed', 1,0);
							reset_form();
							$('#btnsimpan').attr('disabled','');
						}
					}
				});
			}
		}

		function simpanskpdkb () {
		
			$.ajax({
				url: 'penetapan/stpd_restoran/SimpanSKPDKBRestoran',
				type: 'post',
				dataType: "json",
				data:  $("#form-stpd-restoran").serialize(),
				success: function(data) {
					if (data.status=="success") {
						notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
						$('#btnsimpan').attr('disabled','');
					}
					else {
						notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
					}
				}
			});
		}
	
		function hapuskb() {
			var CARI_NOPOK = $('#TBLDAFTAR_NOPOK').val();
			var BULAN = $('#TBLPENDATAAN_BLNPAJAK').select2('val');
			var TAHUN = $('#TBLPENDATAAN_THNPAJAK').val();
			window.tahun = $('#TBLPENDATAAN_THNPAJAK').val();

			$.SmartMessageBox({
				title : "Informasi", // judul Smart Alert
				content : "Data dengan Nomor Pokok "+CARI_NOPOK+", Masa Pajak "+ $('#TBLPENDATAAN_BLNPAJAK').select2('val')+" "+$('#TBLPENDATAAN_THNPAJAK').val()+"<br> Apakah anda ingin menghapus data ini?", // konten dari smart alert
				buttons : '[Tidak][Ya]' // pengaturan tombol
				}, function(ButtonPressed) {
					if (ButtonPressed === "Ya") {
						$.ajax({
							url: 'penetapan/stpd_restoran/HapusSKPDKB',
							type: 'post',
							dataType: "json",
							data:  $("#form-stpd-restoran").serialize(),
							success: function(data) {
								if (data.status=="success") {
									notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
									$('#btnsimpan').attr('disabled','');
								}
								else {
									notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
								}
							}
						});
					} else {
						
					}
			});
			return false;
		}

	</script>
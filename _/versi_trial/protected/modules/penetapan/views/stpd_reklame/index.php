	<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="well well-sm well-light bg-color-greenLight txt-color-white">
				<h4><i class="fa fa-file-text-o"></i> STPD - Pajak Reklame </h4>
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
							<form id="form-stpd-reklame" class="smart-form">
								<fieldset>
									<header style="margin: -6px;">Jenis Ketetapan</header><br>
									<div class="row">
										<section class="col col-md-1">Jenis</section>
										<section class="col col-md-2">
											<!-- <label class="input">
												<input type="number" name="TBLPENDATAAN_THNPAJAK" id="TBLPENDATAAN_THNPAJAK">
											</label> -->
											<label class="select">
												<select class="select2" disabled="" name="JENIS" id="JENIS">
													
													<option selected value="skpd">SKPD</option>
													
												</select>
											</label>
										</section>
									</div>
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
													<?php foreach ($data['tahun'] as $combo_tahun): ?>
															<option value="<?php echo $combo_tahun['TBLTAHUN_NAMA']; ?>"><?php echo $combo_tahun['TBLTAHUN_NAMA']; ?></option>
														<?php endforeach ?>
													
												</select>
											</label>
										</section>
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
										<section class="col col-md-2">
											<label class="input">
												<input class="form-control" type="text" id="TBLPENDATAAN_TGLPAJAK" name="TBLPENDATAAN_TGLPAJAK" placeholder="Tanggal">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-1">Ke / Lokasi</section>
										<section class="col col-md-2">
											<label class="input">
												<input class="form-control" type="text" id="TBLPENDATAAN_PAJAKKE" name="TBLPENDATAAN_PAJAKKE">
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
										<section class="col col-md-12"><h4 align="center">Entry STPD Pajak Reklame</h4></section>
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

																		
									<div>
										<div class="row">
											<section class="col col-md-2"><b>Ketetapan Pajak</b></section>
										</div>
										<div class="row">
											<section class="col col-md-2" style="margin-left: 2%;">Tanggal SKPD</section>
											<section class="col col-md-2">
												<label class="input">
													<input  style="background: #e4e4e4;" class="form-control" type="text" value="<?= date('d-m-Y') ?>" id="res_tanggal_pajak_tetap_wp" name="res_tanggal_pajak_tetap_wp" readonly="">
												</label>
											</section>
											<section class="col col-md-2" style="margin-left: 2%;">Nomor Ketetapan</section>
											<section class="col col-md-2">
												<label class="input">
													<input  style="background: #e4e4e4;" class="form-control" type="text" id="res_nomor_pajak_tetap_wp" name="res_nomor_pajak_tetap_wp" readonly="">
												</label>
											</section>
										</div>
										<div class="row">
											<section class="col col-md-2" style="margin-left: 2%;">Jumlah PAJAK</section>
											<section class="col col-md-5">
												<label class="input">
													<input  style="background: #e4e4e4;" class="form-control format-rupiah" type="text" id="res_jumlah_pajak_tetap_wp" name="res_jumlah_pajak_tetap_wp" readonly="">
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
												<input class="form-control" type="text" id="TBLDAFTREKLAME_NOSURATTAGIHAN" name="TBLDAFTREKLAME_NOSURATTAGIHAN">
											</label>
										</section>
										<section class="col col-md-2">Tanggal STPD</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" value="<?= date('d-m-Y') ?>" name="TBLDAFTREKLAME_TGLSURATTAGIHAN" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTREKLAME_TGLSURATTAGIHAN">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Jumlah Bunga</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control format-rupiah" type="text" id="TBLDAFTREKLAME_BUNGATAGIHAN" name="TBLDAFTREKLAME_BUNGATAGIHAN">
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
												<input class="form-control format-rupiah" type="text" id="TBLDAFTREKLAME_RUPIAHTAGIHAN" name="TBLDAFTREKLAME_RUPIAHTAGIHAN">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;"><b>Tanggal Batas Pembayaran</b></section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="TBLDAFTREKLAME_TGLBTSTAGIHAN" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTREKLAME_TGLBTSTAGIHAN">
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
			$("#TBLDAFTREKLAME_TGLSURATTAGIHAN").trigger('change');
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
			$('#TBLDAFTREKLAME_TGLSURATTAGIHAN').val(today);

			setMoment();
		});

		loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
			generateAutocompleteWPreklame();
		});

		function getNoSTPD(tahun) {
			$.ajax({
				url: 'penetapan/stpd_reklame/GetNoSTPD',
				type: 'POST',
				dataType: 'json',
				data: {
					tahun: tahun
				},
				success: function(respon) {
					if (respon=='') {
						$('#TBLDAFTREKLAME_NOSURATTAGIHAN').val(1);
						
					}
					else{
						$('#TBLDAFTREKLAME_NOSURATTAGIHAN').val(respon.NOKB);
						if ($('#TBLDAFTREKLAME_TGLBTSTAGIHAN').val()=='') {
							$("#TBLDAFTREKLAME_TGLSURATTAGIHAN").trigger('change');
						}
					}
				}
			});
		}

		$("#TBLDAFTREKLAME_TGLSURATTAGIHAN").change(function(event) {
			var tglbatas = moment( $("#TBLDAFTREKLAME_TGLSURATTAGIHAN").val().split("-").reverse().join("-") ).add(1, "days");
			$("#TBLDAFTREKLAME_TGLBTSTAGIHAN").val( tglbatas.format('L') );
		});

		function generateAutocompleteWPreklame() {
			$('#TBLDAFTAR_NOPOK').autocomplete({
				serviceUrl: 'penetapan/stpd_reklame/autocompletewpreklame',

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
			$("#form-stpd-reklame")[0].reset();
			$("#form-stpd-reklame .select2").select2('val', '');
			setMoment();
			$('#btnsimpan').removeAttr('disabled');
			$('#btncetak').hide('fast');
			// reloadDT('dt_basic');
		}

		/*form validation*/
		loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
		function runFormValidation() {
			var $FormData = $("#form-stpd-reklame").validate({
			// Rules for form validation
			rules : {
				"TBLPENDATAAN_THNPAJAK" : {
					required : true
				}
			},

			// Messages for form validation
			// messages : {
			// 	"TBLPENDATAAN_BLNPAJAK" : {
			// 		required : 'Mohon isikan Bulan'
			// 	}
			// },

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			},
			submitHandler : function(form) {
					// saat validasi benar semua, jalankan simpan()
					return simpanstpd();
				}
			});

		};
		/*//form validation*/

		function cetak () {
			var param = jQuery.param(
				{
					TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
					, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
					, TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").select2('val')
					, TBLPENDATAAN_TGLPAJAK: $("#TBLPENDATAAN_TGLPAJAK").val()
					, TBLPENDATAAN_PAJAKKE: $("#TBLPENDATAAN_PAJAKKE").val()
				}
			);
			window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/penetapan/stpd_reklame/cetak?'+param);
		}

		function cetakWord () {
			var TGLASLI = $("#TBLPENDATAAN_TGLPAJAK").val();
			if (TGLASLI!='') {
				TGL = $("#TBLPENDATAAN_TGLPAJAK").val();
			} else {
				TGL = '0';
			}
			var param = jQuery.param(
				{
					TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
					, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
					, TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").select2('val')
					, TBLPENDATAAN_TGLPAJAK: TGL
					, TBLPENDATAAN_PAJAKKE: $("#TBLPENDATAAN_PAJAKKE").val()
				}
			);
			window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/penetapan/stpd_reklame/cetakword?'+param);
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

			$(".TBLDAFTREKLAME_BUNGATAGIHAN").html(toRp(RUPIAHKB));
			$("#TBLDAFTREKLAME_BUNGATAGIHAN").val(RUPIAHKB.toFixed(0));

			console.log('RUPIAHKB='+RUPIAHKB);
			// $("#TBLDAFTREKLAME_RUPIAHTAGIHAN").val( RUPIAHKB.toFixed(2) );
		}

		function Hitungtotal(){
			PAJAK = toAngka($('#res_jumlah_pajak_tetap_wp').val());
			
			$(".TBLDAFTREKLAME_RUPIAHTAGIHAN").html(toRp(PAJAK));
			$("#TBLDAFTREKLAME_RUPIAHTAGIHAN").val(PAJAK);

		}


		function cari () {
			var CARI_NOPOK = $('#TBLDAFTAR_NOPOK').val();
			var TAHUN = $('#TBLPENDATAAN_THNPAJAK').val();
			var BULAN = $('#TBLPENDATAAN_BLNPAJAK').select2('val');
			var TGLASLI = $('#TBLPENDATAAN_TGLPAJAK').val();
			var KE = $('#TBLPENDATAAN_PAJAKKE').val();
			var JENIS = $('#JENIS').val();

			if (TGLASLI!='') {
				TGL = $('#TBLPENDATAAN_TGLPAJAK').val();
			} else {
				TGL = '0';
			}
			window.tahun = $('#TBLPENDATAAN_THNPAJAK').val();

			getNoSTPD(TAHUN);

			if (CARI_NOPOK=='') {
				notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
			}else if(TAHUN==''){
				notifikasi('Informasi','Mohon isikan Tahun','failed',1,0);
			}else if(KE==''){
				notifikasi('Informasi','Mohon isikan Ke/Lokasi','failed',1,0);
			}else{
				$.ajax({
					url: 'penetapan/stpd_reklame/getdata',
					type: 'POST',
					dataType: 'json',
					data: {
						TBLDAFTAR_NOPOK : CARI_NOPOK,
						tahun : $('#TBLPENDATAAN_THNPAJAK').val(),
						bulan : $('#TBLPENDATAAN_BLNPAJAK').select2('val'),
						tanggal : TGL,
						ke : $('#TBLPENDATAAN_PAJAKKE').val(),
						jenis : $('#JENIS').select2('val')
					},
					success: function(respon) {
						if (respon.data=='sudah entri STPD') {

							$.SmartMessageBox({
								title : "Informasi", // judul Smart Alert
								content : "Data dengan Nomor Pokok "+CARI_NOPOK+", Masa Pajak "+ $('#TBLPENDATAAN_BLNPAJAK').select2('val')+" "+$('#TBLPENDATAAN_THNPAJAK').val()+" sudah memilik STPD. <br> Apakah anda ingin mengubah data ini?", // konten dari smart alert
								buttons : '[Tidak][Ya]' // pengaturan tombol
								}, function(ButtonPressed) {
									if (ButtonPressed === "Ya") {
										getNoSTPD(window.tahun);
										// $('#TBLDAFTREKLAME_NOSURATTAGIHAN').val(respon.TBLDAFTREKLAME_NOSURATTAGIHAN);
										$('#res_nama_wp').val(respon.TBLDAFTAR_BADANUSAHANAMA);
										$('#res_alamat_wp').val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
										$('#nama_subrekening').val(respon.TREKENING_NAMA);
										$('#no_subrek').select2('val',respon.REKENING_KODE);
										$('#res_tanggal_pajak_tetap_wp').val(respon.TBLDAFTREKLAME_TGLSKPD +'-'+ respon.TBLDAFTREKLAME_BLNSKPD +'-20'+ respon.TBLDAFTREKLAME_THNSKPD);
										$('#res_nomor_pajak_tetap_wp').val(respon.TBLDAFTREKLAME_NOMORSKPD);
										$('#res_jumlah_pajak_tetap_wp').val(respon.TBLDAFTREKLAME_PAJAKSKPD);
										$('#TBLDAFTREKLAME_TGLSURATTAGIHAN').val(respon.TBLDAFTREKLAME_TGLSURATTAGIHAN +'-'+ respon.TBLDAFTREKLAME_BLNSURATTAGIHAN +'-20'+respon.TBLDAFTREKLAME_THNSURATTAGIHAN);
										$('#TBLDAFTREKLAME_BUNGATAGIHAN').val(respon.TBLDAFTREKLAME_BUNGATAGIHAN);
										$('#TBLDAFTREKLAME_TGLBTSTAGIHAN').val(respon.TBLDAFTREKLAME_TGLBTSTAGIHAN +'-'+ respon.TBLDAFTREKLAME_BLNBTSTAGIHAN +'-20'+ respon.TBLDAFTREKLAME_THNBTSTAGIHAN);
										$('#res_jumlah_bulan_wp').val(respon.TBLSTPD_JMLBULAN);
										$('#TBLDAFTREKLAME_RUPIAHTAGIHAN').val(respon.TBLDAFTREKLAME_RUPIAHTAGIHAN);
									
										$('#footer-airtanah').show('fast');
										$('#btnsimpan').removeAttr('disabled');
										$('#btnsimpan').show('fast');
										$('#btncetak').show('fast');
										setPriceFormat();
									} else {
										$('#TBLDAFTREKLAME_NOSURATTAGIHAN').val(respon.TBLDAFTREKLAME_NOSURATTAGIHAN);

										$('#res_nama_wp').val(respon.TBLDAFTAR_BADANUSAHANAMA);
										$('#res_alamat_wp').val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
										$('#nama_subrekening').val(respon.TREKENING_NAMA);
										$('#no_subrek').select2('val',respon.REKENING_KODE);
										$('#res_tanggal_pajak_tetap_wp').val(respon.TBLDAFTREKLAME_TGLSKPD +'-'+ respon.TBLDAFTREKLAME_BLNSKPD +'-20'+ respon.TBLDAFTREKLAME_THNSKPD);
										$('#res_nomor_pajak_tetap_wp').val('');
										$('#res_jumlah_pajak_tetap_wp').val(respon.TBLDAFTREKLAME_PAJAKSKPD);
										$('#TBLDAFTREKLAME_TGLSURATTAGIHAN').val(respon.TBLDAFTREKLAME_TGLSURATTAGIHAN +'-'+ respon.TBLDAFTREKLAME_BLNSURATTAGIHAN +'-20'+respon.TBLDAFTREKLAME_THNSURATTAGIHAN);
										$('#TBLDAFTREKLAME_BUNGATAGIHAN').val(respon.TBLDAFTREKLAME_BUNGATAGIHAN);
										$('#TBLDAFTREKLAME_TGLBTSTAGIHAN').val(respon.TBLDAFTREKLAME_TGLBTSTAGIHAN +'-'+ respon.TBLDAFTREKLAME_BLNBTSTAGIHAN +'-20'+ respon.TBLDAFTREKLAME_THNBTSTAGIHAN);
										$('#res_jumlah_bulan_wp').val(respon.TBLSTPD_JMLBULAN);
										$('#TBLDAFTREKLAME_RUPIAHTAGIHAN').val(respon.TBLDAFTREKLAME_RUPIAHTAGIHAN);
									
										$('#footer-airtanah').show('fast');
										setPriceFormat();

										$('#btnsimpan').hide('fast');
										$('#btncetak').show('fast');
									}
							});
							return false;

						} else if(respon.data=='SPT sudah terdaftar') {
							getNoSTPD(window.tahun);
							$('#res_nama_wp').val(respon.TBLDAFTAR_BADANUSAHANAMA);
							$('#res_alamat_wp').val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
							$('#nama_subrekening').val(respon.TREKENING_NAMA);
							$('#no_subrek').select2('val',respon.REKENING_KODE);
							$('#res_tanggal_pajak_tetap_wp').val(respon.TBLDAFTREKLAME_TGLSKPD +'-'+ respon.TBLDAFTREKLAME_BLNSKPD +'-20'+ respon.TBLDAFTREKLAME_THNSKPD);
							$('#res_nomor_pajak_tetap_wp').val(respon.TBLDAFTREKLAME_NOMORSKPD);
							$('#res_jumlah_pajak_tetap_wp').val(respon.TBLDAFTREKLAME_PAJAKSKPD);
								
							
							$('#footer-airtanah').show('fast');
							$('#btncetak').show('fast');
							setPriceFormat();
							var tglbatas = moment( $("#TBLDAFTREKLAME_TGLSURATTAGIHAN").val().split("-").reverse().join("-") ).add(1, "months");
							$("#TBLDAFTREKLAME_TGLBTSTAGIHAN").val( tglbatas.format('L') );
							$('#btnsimpan').removeAttr('disabled');
							$('#btnsimpan').show('fast');
						} else if (respon.data=='sudah dibayar'){
							notifikasi('Sudah Dalam Proses Bayar', 'Data STPD dengan nomor '+$('#TBLDAFTAR_NOPOK').val()+' Sudah Dibayar', 'failed', 1,0);
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

		function simpanstpd () {
		
			$.ajax({
				url: 'penetapan/stpd_reklame/SimpanSTPDreklame',
				type: 'post',
				dataType: "json",
				data:  $("#form-stpd-reklame").serialize(),
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
	

	</script>
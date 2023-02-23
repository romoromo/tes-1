	<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="well well-sm well-light bg-color-greenLight txt-color-white">
				<h4><i class="fa fa-file-text-o"></i> SKPDKB Jabatan </h4>
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
							<form id="form-skpdkb-hotel" class="smart-form">
								<fieldset>
									<header style="margin: -6px;">Pencarian Data</header><br>
									<div class="row">
								<section class="col col-md-1">
									<p>Jenis Pajak </p>
								</section>
								<section class="col col-md-3">
									<label class="select">
										<select class="select2" id="TREKENING_REKAYAT" name="TREKENING_REKAYAT">
											<option value="">-- Pilih Rekening --</option>
											<?php foreach ($data['rek'] as $list): ?>
												<option value="<?php echo $list['TBLREKENING_REKAYAT'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
								</section>
							</div>
									<div class="row">
										<section class="col col-md-1">Tahun</section>
										<section class="col col-md-2">
									<label class="input">
										<input class="input-sm" value="<?php echo date('Y'); ?>" type="number" id="tahun" name="tahun">
									</label>
								</section>
										<section class="col col-md-2">Masa Pajak</section>
										<section class="col col-md-2">
											<label class="select">
												<select class="select2" name="bulan" id="bulan">
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
												<input class="form-control" type="text" id="nopok" name="nopok" autocomplete="on">
											</label>
										</section>
										<section class="col col-md-1">
											<a onclick="cari()" class="btn btn-sm btn-primary">Cari</a>
										</section>
									</div>
									<hr><br>
									<div class="row">
										<section class="col col-md-12"><h4 align="center">Entry SKPDKB Jabatan</h4></section>
									</div>
									<header style="margin: -6px;">Detail</header><br>
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
										<section class="col col-md-2"><b>Monitoring Pajak</b></section>
									</div>
									<div class="row">
										
										<section class="col col-md-2" style="margin-left: 2%;">Tanggal Monitoring</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" value="<?= date('d-m-Y') ?>" name="tgl_monitoring" class="datepicker" data-dateformat="dd-mm-yy" id="tgl_monitoring">
											</label>
										</section>
										<!-- <section class="col col-md-1">
											<a onclick="cari()" class="btn btn-sm btn-primary">Detail</a>
										</section> -->
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Jumlah Omzet</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control format-rupiah" type="text" id="jml_omzet" name="jml_omzet">
											</label>
										</section>
										<section class="col col-md-4">* Omzet Terlapor Menurut Wajib Pajak</section>
									</div>
									<div class="row">
										<section class="col col-md-3"><b>Kurang Bayar (SKPDKB Jabatan)</b></section>
										<section class="col col-md-1">
											<a onclick="cari()" class="btn btn-sm btn-primary">Tetapkan</a>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Nomor SKPDKB Jabatan</section>
										<section class="col col-md-2">
											<label class="input">
												<input class="form-control" type="text" id="TBLDAFTHOTEL_REGKURANGBAYAR" name="TBLDAFTHOTEL_REGKURANGBAYAR">
											</label>
										</section>
										<section class="col col-md-2">Tanggal SKPDKB Jabatan</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" value="<?= date('d-m-Y') ?>" name="TBLDAFTHOTEL_TGLKURANGBAYAR" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTHOTEL_TGLKURANGBAYAR">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Jumlah Pokok</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control format-rupiah" type="text" id="TBLDAFTHOTEL_PAJAKPERIKSA" name="TBLDAFTHOTEL_PAJAKPERIKSA">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Jumlah Bunga</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-contro format-rupiah" type="text" id="TBLDAFTHOTEL_BUNGAKRGBAYAR" name="TBLDAFTHOTEL_BUNGAKRGBAYAR">
											</label>
										</section>
										<section class="col col-md-4">Jumlah Bunga Max 24 Bulan</section>
									</div>
									<!-- <div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Jumlah Kenaikan</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control format-rupiah" type="text" id="TBLDAFTHOTEL_KENAIKANKRGBAYAR" name="TBLDAFTHOTEL_KENAIKANKRGBAYAR">
											</label>
										</section>
									</div> -->
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Jumlah Denda</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control format-rupiah" type="text" id="TBLDAFTHOTEL_DENDAKRGBAYAR" name="TBLDAFTHOTEL_DENDAKRGBAYAR">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Jumlah Ketetapan</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control format-rupiah" type="text" id="TBLDAFTHOTEL_RUPIAHKRGBAYAR" name="TBLDAFTHOTEL_RUPIAHKRGBAYAR">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;"><b>Tanggal Batas Pembayaran</b></section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="TBLDAFTHOTEL_TGLBTSKRGBAYAR" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTHOTEL_TGLBTSKRGBAYAR">
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

										<button type="button" id="btnhapus" class="btn btn-sm btn-danger" onclick="hapuskb()">
											<i class="fa fa-save"></i>&nbsp;Hapus Data KB
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
			$("#TBLDAFTHOTEL_TGLKURANGBAYAR").trigger('change');
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
			$('#TBLDAFTHOTEL_TGLKURANGBAYAR').val(today);

			setMoment();
		});

		loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
			generateAutocompleteWPHotel();
		});

		function getNoSKPDKB(tahun, rek) {
			$.ajax({
				url: 'penetapan/skpdkb_jabatan/GetNoSKPDKB',
				type: 'POST',
				dataType: 'json',
				data: {
					tahun: tahun,
					rek: rek
				},
				success: function(respon) {
					if (respon=='') {
						$('#TBLDAFTHOTEL_REGKURANGBAYAR').val(1);
						
					}
					else{
						$('#TBLDAFTHOTEL_REGKURANGBAYAR').val(respon.NOKB);
						if ($('#TBLDAFTHOTEL_TGLBTSKRGBAYAR').val()=='') {
							$("#TBLDAFTHOTEL_TGLKURANGBAYAR").trigger('change');
						}
					}
				}
			});
		}

		$("#TBLDAFTHOTEL_TGLKURANGBAYAR").change(function(event) {
			var tglbatas = moment( $("#TBLDAFTHOTEL_TGLKURANGBAYAR").val().split("-").reverse().join("-") ).add(1, "months");
			$("#TBLDAFTHOTEL_TGLBTSKRGBAYAR").val( tglbatas.format('L') );
		});

		function generateAutocompleteWPHotel() {
			$('#TBLDAFTAR_NOPOK').autocomplete({
				serviceUrl: 'penetapan/skpdkb_jabatan/autocompletewphotel',

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
			$("#form-skpdkb-hotel")[0].reset();
			$("#form-skpdkb-hotel .select2").select2('val', '');
			setMoment();
			$('#btnsimpan').removeAttr('disabled');
			$('#btncetak').hide('fast');
			// reloadDT('dt_basic');
		}

		/*form validation*/
		loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
		function runFormValidation() {
			var $FormData = $("#form-skpdkb-hotel").validate({
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
					return cekSudahBayar();
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
			window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/penetapan/skpdkb_jabatan/cetak?'+param);
		}

		function cetakWord () {
			var param = jQuery.param(
				{
					TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
					, TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").select2('val')
					, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
				}
			);
			window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/penetapan/skpdkb_jabatan/cetakword?'+param);
		}

		$("#TBLDAFTHOTEL_BUNGAKRGBAYAR, #TBLDAFTHOTEL_PAJAKPERIKSA, #TBLDAFTHOTEL_BUNGAKRGBAYAR, #TBLDAFTHOTEL_KENAIKANKRGBAYAR").change(function(event) {
			HitungSKPDKB();
			setPriceFormat();
		});

		function HitungSKPDKB() {
			PJKPERIKSA = toAngka($('#TBLDAFTHOTEL_PAJAKPERIKSA').val());
			BUNGAKB = toAngka($('#TBLDAFTHOTEL_BUNGAKRGBAYAR').val());
			KENAIKAN = toAngka($('#TBLDAFTHOTEL_KENAIKANKRGBAYAR').val());

			RUPIAHKB1 = Number(PJKPERIKSA) + Number(BUNGAKB);

			RUPIAHKB = Number(RUPIAHKB1) + Number(KENAIKAN);


			$(".TBLDAFTHOTEL_RUPIAHKRGBAYAR").html(toRp(RUPIAHKB));
			$("#TBLDAFTHOTEL_RUPIAHKRGBAYAR").val(RUPIAHKB);
			// $("#TBLDAFTHOTEL_RUPIAHKRGBAYAR").val( RUPIAHKB.toFixed(2) );
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
					url: 'penetapan/skpdkb_jabatan/CekPernahDaftar',
					type: 'POST',
					dataType: 'json',
					data: {
						 nopokok: window.nopokok
						,THNPAJAK: THNPAJAK
						,BLNPAJAK: BLNPAJAK
					},
					success : function (respon) {
						if (respon.status=='sudah') {
							$.SmartMessageBox({
								title : "Informasi", // judul Smart Alert
								content : "Data KB dengan Nomor Pokok "+window.nopokok+", Masa Pajak "+BLNPAJAK+" "+THNPAJAK+" sudah pernah mendaftar. <br> Apakah anda ingin mengubah data ini?", // konten dari smart alert
								buttons : '[Tidak][Ya]' // pengaturan tombol
								}, function(ButtonPressed) {
									if (ButtonPressed === "Ya") {
									// cekSudahBayar();
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

				function cekSudahBayar() {
				var THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
				var BLNPAJAK = $('#TBLPENDATAAN_BLNPAJAK').val();
				var TBLDAFTAR_NOPOK = $('#TBLDAFTAR_NOPOK').val();
				$.ajax({
					url: 'penetapan/skpdkb_jabatan/cekSudahBayar',
					type: 'POST',
					dataType: 'json',
					data: {
						NOPOKOK: TBLDAFTAR_NOPOK
						,TAHUN: THNPAJAK
						,BULAN: BLNPAJAK
					},
					success : function (respon) {
						if (respon.status=='sudah') {
							// $.SmartMessageBox({
							// 	title : "Informasi", // judul Smart Alert
							// 	content : "Data dengan Nomor Pokok "+TBLDAFTAR_NOPOK+", Sudah Dalam Proses Selanjutnya.", // konten dari smart alert
							// 	buttons : '[OK]' // pengaturan tombol
							// 	}, function(ButtonPressed) {
							// 		if (ButtonPressed === "OK") {
							// 		window.location.reload();
							// 	}
							// });
							// return false;
							notifikasi('Maaf', 'Data Sudah Dibayarkan.', 'f', 1, 0);
							setTimeout(function() {
								$('#btnsimpan').attr('disabled','');
							}, 100);
						}
						else{
							simpanskpdkb();
						}
					}
				});
			
		
		}

		function cari () {
			var CARI_NOPOK = $('#nopok').val();
			var BULAN = $('#bulan').select2('val');
			var TAHUN = $('#tahun').val();
			var TBLREKENING_REKAYAT = $('#TREKENING_REKAYAT').val();
			window.tahun = $('#tahun').val();
			window.rek = $('#TREKENING_REKAYAT').val();

			getNoSKPDKB(TAHUN, TBLREKENING_REKAYAT);

			if (CARI_NOPOK=='') {
				notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
			}else if(TAHUN==''){
				notifikasi('Informasi','Mohon isikan Tahun','failed',1,0);
			}else if(BULAN==''){
				notifikasi('Informasi','Mohon isikan Bulan','failed',1,0);
			}else{
				$.ajax({
					url: 'penetapan/skpdkb_jabatan/getdata',
					type: 'POST',
					dataType: 'json',
					data: {
						nopok : CARI_NOPOK,
						bulan : $('#bulan').select2('val'),
						tahun : $('#tahun').val(),
						TBLREKENING_REKAYAT : TBLREKENING_REKAYAT
					},
					success: function(respon) {
						if(respon.data=='ada spt 0') {
							getNoSKPDKB(window.tahun, window.rek);
							$('#res_nama_wp').val(respon.TBLDAFTAR_BADANUSAHANAMA);
							$('#res_alamat_wp').val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
							$('#tgl_monitoring').val(respon.TGL_MONITORING);
							$('#jml_omzet').val(respon.JML_OMZET);

							// $('#nama_subrekening').val(respon.TREKENING_NAMA);
							// $('#no_subrek').select2('val',respon.REKENING_KODE);
							// $('#hit_jumlahhari').val(respon.JUMLAH_HARI);
							// $('#form_perhitungan').show('fast');
							// $('#form_dokumentasi_tanggal').show('fast');
							// $('#persen_pajak').val(respon.TREKENING_TARIF);
							// $('#kecamatan_pajak').val(respon.TBLKECAMATAN_ID);
							// $('#kelurahan_pajak').val(respon.TBLKELURAHAN_ID);
							// $('#tarif_rekening').val(respon.TREKENING_TARIF);
							// $('#res_jumlah_pajak_tetap_wp').val(respon.TBLDAFTHOTEL_PAJAK);
							// $('#res_jumlah_pajak_setor_wp').val(respon.TBLDAFTHOTEL_PAJAK);
							// window.BULAN_DENDA = respon.BULAN_DENDA;
							// window.PERSEN_DENDA = respon.PERSEN_DENDA;
							// $('#footer-hotel').show('fast');
							// $('#btncetak').show('fast');
							// $('#TBLDAFTHOTEL_PAJAKPERIKSA').val('');
							// $('#TBLDAFTHOTEL_BUNGAKRGBAYAR').val('');
							// $('#TBLDAFTHOTEL_KENAIKANKRGBAYAR').val('');
							// $('#TBLDAFTHOTEL_DENDAKRGBAYAR').val('');
							// $('#TBLDAFTHOTEL_RUPIAHKRGBAYAR').val('');
							// $('#TBLDAFTHOTEL_NOMORPERIKSA').val('');

							var tglbatas = moment( $("#TBLDAFTHOTEL_TGLKURANGBAYAR").val().split("-").reverse().join("-") ).add(1, "months");
							$("#TBLDAFTHOTEL_TGLBTSKRGBAYAR").val( tglbatas.format('L') );
							$('#btnsimpan').removeAttr('disabled');
						} else if (respon.data=='sudah ada spt lapor'){
							notifikasi('Sudah Dalam Proses Lapor', 'Data WP dengan nomor '+$('#TBLDAFTAR_NOPOK').val()+' Sudah Melapor Omzet', 'failed', 1,0);
							reset_form();
							$('#btnsimpan').attr('disabled','');
						} 
					}
				});
			}
		}

		function simpanskpdkb () {
		
			$.ajax({
				url: 'penetapan/skpdkb_jabatan/SimpanSKPDKBHotel1',
				type: 'post',
				dataType: "json",
				data:  $("#form-skpdkb-hotel").serialize(),
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
							url: 'penetapan/skpdkb_jabatan/HapusSKPDKB',
							type: 'post',
							dataType: "json",
							data:  $("#form-skpdkb-hotel").serialize(),
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
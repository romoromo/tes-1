	<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="well well-sm well-light bg-color-greenLight txt-color-white">
				<h4><i class="fa fa-file-text-o"></i> SKPD Nihil - Pajak Rumah Makan </h4>
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
				<div class="jarviswidget jarviswidget-color-teal" id="wid-id-Pajak_Restoran" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
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
							<form id="form-skpdn-restoran" class="smart-form" novalidate="">
								<fieldset>
									<header style="margin: -6px;">Validasi Penyetoran</header><br>
									<div class="row">
										<section class="col col-md-1">Tahun</section>
										<section class="col col-md-2">
											<label class="input">
												<input type="number" name="TBLPENDATAAN_THNPAJAK" id="TBLPENDATAAN_THNPAJAK" value="<?php echo date('Y'); ?>">
											</label>
											<!-- <label class="select">
												<select class="select2" name="TBLPENDATAAN_THNPAJAK" id="TBLPENDATAAN_THNPAJAK">
													<option value="0">-- Silahkan Pilih --</option>
													<option value="2020">2020</option>
													<option value="2019">2019</option>
													<option value="2018">2018</option>
													<option selected="" value="2017">2017</option>
													<option value="2016">2016</option>
													<option value="2015">2015</option>
													<option value="2014">2014</option>
													<option value="2013">2013</option>
													<option value="2012">2012</option>
													<option value="2011">2011</option>
													<option value="2010">2010</option>
												</select>
											</label> -->
										</section>
										<section class="col col-md-1">Bulan</section>
										<section class="col col-md-2">
											<label class="select">
												<select class="select2" name="TBLDAFTRMAKAN_BLNKBAWAL" id="TBLDAFTRMAKAN_BLNKBAWAL">
													<option value="0">-- Silahkan Pilih --</option>
													<option value="1" selected="">Januari</option>
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
										<section class="col col-md-1">Sampai Bulan</section>
										<section class="col col-md-2">
											<label class="select">
												<select class="select2" name="TBLDAFTRMAKAN_BLNKBAKHIR" id="TBLDAFTRMAKAN_BLNKBAKHIR">
													<option value="0">-- Silahkan Pilih --</option>
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
													<option value="12" selected="">Desember</option>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-1">Nomor Pokok</section>
										<section class="col col-md-6">
											<label class="input">
												<input class="form-control" type="text" id="TBLDAFTAR_NOPOK" name="TBLDAFTAR_NOPOK" autocomplete="off">
											</label>
										</section>
										<section class="col col-md-1">
											<button type="button" onclick="cari()" class="btn btn-sm btn-primary">Enter</button>
										</section>
									</div>
									<hr><br>
									<div class="row">
										<section class="col col-md-12"><h4 align="center">Entry SKPDN Pajak Rumah Makan</h4></section>
									</div>
									<header style="margin: -6px;">Perorangan</header><br>
									<div class="row">
										<section class="col col-md-2">Nama</section>
										<section class="col col-md-10">
											<span id="TBLDAFTAR_BADANUSAHANAMA"></span>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">Alamat</section>
										<section class="col col-md-10">
											<span id="TBLDAFTAR_BADANUSAHAALAMAT"></span>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">Rekening</section>
										<section class="col col-md-10">
											<span id="NOMOR_REKENING"></span>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2"><b>Setoran Pajak SSPD</b></section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Jumlah Setoran</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control format-rupiah" type="text" id="TBLDAFTRMAKAN_PAJAKPERIKSA" name="TBLDAFTRMAKAN_PAJAKPERIKSA">
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
												<input class="form-control" type="text" id="TBLDAFTRMAKAN_NOMORPERIKSA" name="TBLDAFTRMAKAN_NOMORPERIKSA">
											</label>
										</section>
										<section class="col col-md-2">Tanggal Pemeriksaan</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="TBLDAFTRMAKAN_TGLPERIKSA" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTRMAKAN_TGLPERIKSA">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Pajak Terhutang</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control format-rupiah" type="text" id="TBLDAFTRMAKAN_RUPIAHPERIKSA" name="TBLDAFTRMAKAN_RUPIAHPERIKSA">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2"><b>Nihil (SKPN)</b></section>
									</div>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Nomor SKPDN</section>
										<section class="col col-md-2">
											<label class="input">
												<input class="form-control" type="text" id="TBLDAFTRMAKAN_REGNIHIL" name="TBLDAFTRMAKAN_REGNIHIL">
											</label>
										</section>
										<section class="col col-md-2">Tanggal SKPDKN</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="TBLDAFTRMAKAN_TANGGLNIHIL" class="datepicker" value="<?= date('d-m-Y') ?>"  data-dateformat="dd-mm-yy" id="TBLDAFTRMAKAN_TANGGLNIHIL">
											</label>
										</section>
									</div>
								</fieldset>
								<footer id="footer-restoran">
									<div id="tbl_simpan">
										<button type="submit" class="btn btn-sm btn-primary">
											<i class="fa fa-save"></i>&nbsp;Simpan
										</button>
										
										
											<button type="button" class="btn btn-sm btn-success" onclick="cetakWord()">
												<i class="fa fa-print"></i>&nbsp;Cetak
											</button>
										

										<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
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



	<script type="text/javascript">
		pageSetUp();

		jQuery(document).ready(function($) {
			reloadDT('dt_basic');
			$('#footer-resto').hide('fast');
		});

		loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
			generateAutocomplete();
		});

		function generateAutocomplete() {
			$('#TBLDAFTAR_NOPOK').autocomplete({
				serviceUrl: 'penetapan/skpdnihil_restoran/autocomplete',

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

		loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
		function runFormValidation() {
			var $FormData = $("#form-skpdn-restoran").validate({
			// Rules for form validation
			rules : {
				"TBLPENDATAAN_THNPAJAK" : {
					required : true
				},
				"TBLDAFTAR_NOPOK" : {
					required : true
				},
				"TBLDAFTRMAKAN_BLNKBAWAL" : {
					required : true
				},
				"TBLDAFTRMAKAN_BLNKBAKHIR" : {
					required : true
				},
				"TBLDAFTRMAKAN_PAJAKPERIKSA" : {
					required : true
				},
				"TBLDAFTRMAKAN_NOMORPERIKSA" : {
					required : true
				},
				"TBLDAFTRMAKAN_RUPIAHPERIKSA" : {
					required : true
				},
				"TBLDAFTRMAKAN_REGNIHIL" : {
					required : true
				},
				"TBLDAFTRMAKAN_TGLPERIKSA" : {
					required : true
				},
				"TBLDAFTRMAKAN_TANGGLNIHIL" : {
					required : true
				},
			},

			// Messages for form validation
			messages : {
				"TBLPENDATAAN_THNPAJAK" : {
					required : 'Mohon isikan isian berikut'
				},
				"TBLDAFTAR_NOPOK" : {
					required : 'Mohon isikan isian berikut'
				},
				"TBLDAFTRMAKAN_BLNKBAWAL" : {
					required : 'Mohon isikan isian berikut'
				},
				"TBLDAFTRMAKAN_BLNKBAKHIR" : {
					required : 'Mohon isikan isian berikut'
				},
				"TBLDAFTRMAKAN_PAJAKPERIKSA" : {
					required : 'Mohon isikan isian berikut'
				},
				"TBLDAFTRMAKAN_NOMORPERIKSA" : {
					required : 'Mohon isikan isian berikut'
				},
				"TBLDAFTRMAKAN_RUPIAHPERIKSA" : {
					required : 'Mohon isikan isian berikut'
				},
				"TBLDAFTRMAKAN_REGNIHIL" : {
					required : 'Mohon isikan isian berikut'
				},
				"TBLDAFTRMAKAN_TGLPERIKSA" : {
					required : 'Mohon isikan isian berikut'
				},
				"TBLDAFTRMAKAN_TANGGLNIHIL" : {
					required : 'Mohon isikan isian berikut'
				},
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			},
			submitHandler : function(form) {
					// saat validasi benar semua, jalankan simpan()
					return simpanskpdnihil();
				}
			});

		};

		function cetakWord () {
			var param = jQuery.param(
				{
					TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
					, TBLPENDATAAN_BLNPAJAK: $("#TBLDAFTRMAKAN_BLNKBAKHIR").select2('val')
					, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
				}
			);
			window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/penetapan/skpdnihil_restoran/cetakword?'+param);
		}

		function cari () {
			var CARI_NOPOK = $('#TBLDAFTAR_NOPOK').val();
			var BULAN_AKHIR = $('#TBLDAFTRMAKAN_BLNKBAKHIR').select2('val');
			var TAHUN = $('#TBLPENDATAAN_THNPAJAK').val();

			getNoSKPDNihil(TAHUN);

			if (CARI_NOPOK=='') {
				notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
			}else if(TAHUN==''){
				notifikasi('Informasi','Mohon isikan Tahun','failed',1,0);
			}else if(BULAN_AKHIR==''){
				notifikasi('Informasi','Mohon isikan Bulan','failed',1,0);
			}else{
				$.ajax({
					url: 'penetapan/skpdnihil_restoran/getdata',
					type: 'POST',
					dataType: 'json',
					data: {
						TBLDAFTAR_NOPOK : CARI_NOPOK,
						bulan_akhir : $('#TBLDAFTRMAKAN_BLNKBAKHIR').select2('val'),
						tahun : $('#TBLPENDATAAN_THNPAJAK').val()
					},
					success: function(respon) {
						if (respon.data=='sudah entri') {
							$.SmartMessageBox({
								title : "Informasi", // judul Smart Alert
								content : "Data SKPDN dengan Nomor Pokok "+CARI_NOPOK+", Masa Pajak "+BULAN_AKHIR+" "+TAHUN+" sudah pernah entri. <br> Apakah anda ingin mengubah data ini?", // konten dari smart alert
								buttons : '[Tidak][Ya]' // pengaturan tombol
								}, function(ButtonPressed) {
									if (ButtonPressed === "Ya") {
									
									$('#TBLDAFTAR_BADANUSAHANAMA').html(respon.TBLDAFTAR_BADANUSAHANAMA);
									$('#NOMOR_REKENING').html('1.20.1.20.26.0.0.'+respon.REFBADANUSAHA_REKPENDAPATAN+'.'+respon.REFBADANUSAHA_REKPAD+'.'+respon.REFBADANUSAHA_REKPJK+'.'+respon.REFBADANUSAHA_REKAYAT+'.'+respon.REFBADANUSAHA_REKJENIS+'.0');
									$('#TBLDAFTAR_BADANUSAHAALAMAT').html(respon.TBLDAFTAR_BADANUSAHAALAMAT);

									$('#TBLDAFTRMAKAN_PAJAKPERIKSA').val(respon.TBLDAFTRMAKAN_PAJAKPERIKSA);
									$('#TBLDAFTRMAKAN_RUPIAHPERIKSA').val(respon.TBLDAFTRMAKAN_RUPIAHPERIKSA);
									$('#TBLDAFTRMAKAN_NOMORPERIKSA').val(respon.TBLDAFTRMAKAN_NOMORPERIKSA);
									$('#TBLDAFTRMAKAN_REGNIHIL').val(respon.TBLDAFTRMAKAN_REGNIHIL);

									$('#TBLDAFTRMAKAN_PAJAKPERIKSA').attr('disabled', 'disabled');
									$('#TBLDAFTRMAKAN_PAJAKPERIKSA').attr('style', 'background:#eee');

									if (respon.TBLDAFTRMAKAN_TGLPERIKSA==undefined) {
										$('#TBLDAFTRMAKAN_TGLPERIKSA').val('<?= date('d-m-Y') ?>');
									} else {
										$('#TBLDAFTRMAKAN_TGLPERIKSA').val(respon.TBLDAFTRMAKAN_TGLPERIKSA +'-'+ respon.TBLDAFTRMAKAN_BLNPERIKSA +'-20'+respon.TBLDAFTRMAKAN_THNPERIKSA);
									}
									// $('#TBLDAFTRMAKAN_TANGGLNIHIL').val(respon.TBLDAFTRMAKAN_TANGGLNIHIL +'-'+ respon.TBLDAFTRMAKAN_BULANNIHIL +'-20'+ respon.TBLDAFTRMAKAN_TAHUNNIHIL);

									window.BULAN_DENDA = respon.BULAN_DENDA;
									window.PERSEN_DENDA = respon.PERSEN_DENDA;
									$('#footer-restoran').show('fast');
									setPriceFormat();	

								}
							});
							return false;

						} else if(respon.data=='sudah terdaftar') {

							$('#TBLDAFTAR_BADANUSAHANAMA').html(respon.TBLDAFTAR_BADANUSAHANAMA);
							$('#NOMOR_REKENING').html('1.20.1.20.26.0.0.'+respon.REFBADANUSAHA_REKPENDAPATAN+'.'+respon.REFBADANUSAHA_REKPAD+'.'+respon.REFBADANUSAHA_REKPJK+'.'+respon.REFBADANUSAHA_REKAYAT+'.'+respon.REFBADANUSAHA_REKJENIS+'.0');
							$('#TBLDAFTAR_BADANUSAHAALAMAT').html(respon.TBLDAFTAR_BADANUSAHAALAMAT);

							// $('#TBLDAFTRMAKAN_PAJAKPERIKSA').val(respon.TBLDAFTRMAKAN_PAJAKPERIKSA);
							$('#TBLDAFTRMAKAN_RUPIAHPERIKSA').val(respon.TBLDAFTRMAKAN_RUPIAHPERIKSA);
							$('#TBLDAFTRMAKAN_NOMORPERIKSA').val(respon.TBLDAFTRMAKAN_NOMORPERIKSA);
							$('#TBLDAFTRMAKAN_REGNIHIL').val(respon.TBLDAFTRMAKAN_REGNIHIL);

							if (respon.TBLDAFTRMAKAN_TGLPERIKSA==undefined || respon.TBLDAFTRMAKAN_TGLPERIKSA==0) {
								$('#TBLDAFTRMAKAN_TGLPERIKSA').val('<?= date('d-m-Y') ?>');
							} else {
								$('#TBLDAFTRMAKAN_TGLPERIKSA').val(respon.TBLDAFTRMAKAN_TGLPERIKSA +'-'+ respon.TBLDAFTRMAKAN_BLNPERIKSA +'-20'+respon.TBLDAFTRMAKAN_THNPERIKSA);
							}

							// $('#TBLDAFTRMAKAN_PAJAKPERIKSA').attr('disabled', 'disabled');
							// $('#TBLDAFTRMAKAN_PAJAKPERIKSA').attr('style', 'background:#eee');

							// $('#TBLDAFTRMAKAN_TGLPERIKSA').val(respon.TBLDAFTRMAKAN_TGLPERIKSA +'-'+ respon.TBLDAFTRMAKAN_BLNPERIKSA +'-20'+respon.TBLDAFTRMAKAN_THNPERIKSA);
							// $('#TBLDAFTRMAKAN_TANGGLNIHIL').val(respon.TBLDAFTRMAKAN_TANGGLNIHIL +'-'+ respon.TBLDAFTRMAKAN_BULANNIHIL +'-20'+ respon.TBLDAFTRMAKAN_TAHUNNIHIL);
							getNoSKPDNihil(TAHUN);
							window.BULAN_DENDA = respon.BULAN_DENDA;
							window.PERSEN_DENDA = respon.PERSEN_DENDA;
							$('#footer-restoran').show('fast');
							setPriceFormat();

						} else if (respon.data=='belum terdaftar') {
							notifikasi('Referensi SPT Belum Terdaftar', 'Data SPT dengan nomor '+$('#TBLDAFTAR_NOPOK').val()+' Belum Terdaftar', 'failed', 1,0);
							$('#footer-restoran').hide('fast');
						} else if (respon.data=='belum bayar') {
							notifikasi('Referensi SPT Belum Terbayar', 'Data SPT dengan nomor '+$('#TBLDAFTAR_NOPOK').val()+' Belum Melakukan Pembayarn', 'failed', 1,0);
							$('#footer-restoran').hide('fast');
						}
					}
				});
			}
		}

		function getNoSKPDNihil(tahun) {
			$.ajax({
				url: 'penetapan/skpdnihil_restoran/getNoSKPDNihil',
				type: 'POST',
				dataType: 'json',
				data: {
					tahun: tahun
				},
				success: function(respon) {
					if (respon=='') {
						$('#TBLDAFTRMAKAN_REGNIHIL').val(1);
						
					}
					else{
						$('#TBLDAFTRMAKAN_REGNIHIL').val(respon.NOLB);
						// if ($('#TBLDAFTRMAKAN_TGLBTSKRGBAYAR').val()=='') {
						// 	$("#TBLDAFTRMAKAN_TGLKURANGBAYAR").trigger('change');
						// }
					}
				}
			});
		}

		function simpanskpdnihil () {
			$.ajax({
				url: 'penetapan/skpdnihil_restoran/SimpanSKPDNRestoran',
				type: 'post',
				dataType: "json",
				data:  $("#form-skpdn-restoran").serialize(),
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

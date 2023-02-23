<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file fa-fw"></i> Entry Pendataan Pajak Parkir</h4>
		</div>
	</div>
</div>

<section class="widget-grid">
	<div class="jarviswidget jarviswidget-color-teal" id="wid-id-akdjs" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
		<header>
			<span class="widget-icon"> <i class="fa fa-table"></i> </span>
			<h2>Pencarian Data</h2>
		</header>
		<div>
			<div class="jarviswidget-editbox">
			</div>
			<div class="widget-body">
				<div class="tab-content">
					<form class="smart-form" id="form-pendataan-parkir">
						<fieldset>
							<div class="row">
								<section class="col col-md-2">
									<p>No. Pokok WP</p>
								</section>
								<section class="col col-md-4">
									<label class="input">
										<input type="text" id="TBLDAFTAR_NOPOK" name="TBLDAFTAR_NOPOK" placeholder="Ketik Nomor Pokok WP">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Masa Pajak</p>
								</section>
								<section class="col col-md-1">
									<label class="input">
										<input type="number" id="TBLPENDATAAN_THNPAJAK" name="TBLPENDATAAN_THNPAJAK">
									</label>
								</section>
								<section class="col col-md-1">
									<label class="select">
										<select class="" id="TBLPENDATAAN_BLNPAJAK" name="TBLPENDATAAN_BLNPAJAK">
											<option value="">-- Bulan --</option>
											<option value="01">Januari</option>
											<option value="02">Februari</option>
											<option value="03">Maret</option>
											<option value="04">April</option>
											<option value="05">Mei</option>
											<option value="06">Juni</option>
											<option value="07">Juli</option>
											<option value="08">Agustus</option>
											<option value="09">September</option>
											<option value="10">Oktober</option>
											<option value="11">November</option>
											<option value="12">Desember</option>
										</select><i></i>
									</label>
								</section>
								
								<section class="col col-md-1">
									<label class="checkbox pull-right">
										<input type="checkbox" id="is_tanggal" name="is_tangal">
										<i></i>
									</label>
								</section>
								
								<section class="col col-md-1">
									<label class="input">
										<input type="number" id="TBLPENDATAAN_TGLPAJAK" name="TBLPENDATAAN_TGLPAJAK">
									</label>
								</section>

								<section class="col col-md-2">
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
										<select class="select2" id="REKENING_KODE" name="REKENING_KODE">
											<option value="">-- Pilih Rekening --</option>
											<?php foreach ($data['rek'] as $list): ?>
												<option value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
											<?php endforeach ?>
											<input type="hidden" id="TBLREKENING_PERSEN" name="TBLREKENING_PERSEN">
										</select>
									</label>
								</section>
							</div>
						</fieldset>

						
						<fieldset>
							<h4><strong>Data Wajib Pajak</strong></h4><br>

							<div class="row">
								<section class="col col-md-2">
									<p>Nama</p>
								</section>
								<section class="col col-md-5">
									<label class="input">
										<input style="background: #ddd!important;" class="form-control disabled" type="text" id="TBLDAFTAR_BADANUSAHANAMA" name="param[TBLDAFTAR_BADANUSAHANAMA]" disabled="disabled">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Alamat</p>
								</section>
								<section class="col col-md-5" >
									<label class="textarea" >
										<textarea style="background: #ddd!important;" class="form-control disabled" rows="4" id="TBLDAFTAR_BADANUSAHAALAMAT" name="param[TBLDAFTAR_BADANUSAHAALAMAT]" disabled="disabled"></textarea>
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-2" style="display:none;">
									<p>No. SPT</p>
								</section>
								<section class="col col-md-2" style="display:none;">
									<label class="input">
										<input type="text" id="" name="">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Tanggal SPT</p>
								</section>
								<section class="col col-md-2">
									<label class="input">
										<i class="icon-append fa fa-calendar"></i>
										<input type="text" id="TBLDAFTPARKIR_TGLSPTPD" value="<?php echo date('d-m-Y'); ?>" name="TBLDAFTPARKIR_TGLSPTPD" class="datepicker" data-dateformat="dd-mm-yy">
									</label>
								</section>
							</div>
						</fieldset>

						<fieldset id="form-data-perhitungan" style="display: none;">
							<h4><strong>Data Perhitungan</strong></h4><br>
							<div class="row">
								<section class="col col-md-2">
									<p>Penjualan/ Hari</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input type="text" onkeyup="hitungPajakHari()" class="format-rupiah" id="TBLDAFTPARKIR_PENJUALANHARI" name="TBLDAFTPARKIR_PENJUALANHARI">
									</label>
								</section>
								<section class="col col-md-2">
									<p>Jumlah Hari</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input type="text" onkeyup="hitungPajakHari()" class="format-ribuan" id="TBLDAFTPARKIR_JUMLAHHARIJUAL" name="TBLDAFTPARKIR_JUMLAHHARIJUAL">
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-2">
									<p>Penjualan/ Bulan</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input type="text" onkeyup="hitungPajakBulan()" class="format-rupiah" id="TBLDAFTPARKIR_OMSETPAJAK" name="TBLDAFTPARKIR_OMSETPAJAK">
									</label>
								</section>
								<section class="col col-md-2">
									<p>Keringanan</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input type="text" style="background-color: #eeeeee;" id="" name="" readonly="readonly">
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-2">
									<p>Tanggal Awal</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<i class="icon-append fa fa-calendar"></i>
										<input type="text" id="TBLDAFTPARKIR_TGLMULAIJUAL" name="TBLDAFTPARKIR_TGLMULAIJUAL" class="datepicker" data-dateformat="dd-mm-yy">
									</label>
								</section>
								<section class="col col-md-2">
									<p>Tanggal Berakhir</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<i class="icon-append fa fa-calendar"></i>
										<input type="text" id="TBLDAFTPARKIR_TGLAKHIRJUAL" name="TBLDAFTPARKIR_TGLAKHIRJUAL" class="datepicker" data-dateformat="dd-mm-yy">
									</label>
								</section>
							</div>

							<div class="row" style="display: none;">
								<section class="col col-md-2">
									<p>Pembukuan</p>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select id="TBLDAFTPARKIR_ISPEMBUKUAN" name="TBLDAFTPARKIR_ISPEMBUKUAN">
											<option value="">Silakan Pilih</option>
											<option value="">B</option>
										</select><i></i>
									</label>
								</section>

								<section class="col col-md-1">
									<p>Kas</p>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select id="TBLDAFTPARKIR_ISKAS" name="TBLDAFTPARKIR_ISKAS">
											<option value="">Silakan Pilih</option>
											<option value="K">K</option>
											<option value="R">R</option>
										</select><i></i>
									</label>
								</section>

								<section class="col col-md-1">
									<p>Nota</p>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select id="TBLDAFTPARKIR_ISNOTA" name="TBLDAFTPARKIR_ISNOTA">
											<option value="">Silakan Pilih</option>
											<option value="N">N</option>
										</select><i></i>
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-2">
									<p>Pajak</p>
								</section>
								<section class="col col-md-2">
									<div class="input-group">
										<span class="input-group-addon">Rp</span>
										<input class="form-control format-ribuan" id="TBLDAFTPARKIR_PAJAK" name="TBLDAFTPARKIR_PAJAK" type="text">
									</div>
								</section>

								<section class="col col-md-1">
									<p>Bunga SPT</p>
								</section>
								<section class="col col-md-2">
									<div class="input-group">
										<span class="input-group-addon">Rp</span>
										<input class="form-control format-ribuan" id="TBLDAFTPARKIR_BUNGASPTPD" name="TBLDAFTPARKIR_BUNGASPTPD" type="text">
									</div>
								</section>

								<section class="col col-md-1">
									<p>Total Setor</p>
								</section>
								<section class="col col-md-2">
									<div class="input-group">
										<span class="input-group-addon">Rp</span>
										<input readonly="readonly" style="background-color: #eeeeee;" class="form-control format-ribuan" id="TBLDAFTPARKIR_RUPIAHSETOR" name="TBLDAFTPARKIR_RUPIAHSETOR" type="text">
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
										<input type="text" id="TBLDAFTPARKIR_TGLTERIMA" name="TBLDAFTPARKIR_TGLTERIMA" class="datepicker" data-dateformat="dd-mm-yy">
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
										<input style="background-color: #eeeeee;" readonly="readonly" type="text" id="TBLDAFTPARKIR_TGLBATASSPTPD" name="TBLDAFTPARKIR_TGLBATASSPTPD" class="datepicker" data-dateformat="dd-mm-yy">
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
										<input style="background-color: #eeeeee;" readonly="readonly" type="text" id="TBLDAFTPARKIR_TGLENTRI" name="TBLDAFTPARKIR_TGLENTRI" class="datepicker" data-dateformat="dd-mm-yy">
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
											<option value="S" selected=""> S | Self Assesment</option>
											<option value="O">O | Official Assesment</option>
										</select> 
									</label>
								</section>
							</div>
						</fieldset>
						<footer id="footer-parkir" style="display: none;">
							<section class="col col-md-2">
								
							</section>
							<section class="col col-md-2">
								<button class="btn btn-sm btn-primary pull-left" type="button" onclick="simpanparkir();">
									<i class="fa fa-save"></i>&nbsp;Simpan
								</button>
							</section>
							
						</footer>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">

	pageSetUp();

	/*form validation*/
	  loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	  	function runFormValidation() {
	    	var $FormData = $("#form-pendataan-parkir").validate({
	          // Rules for form validation
	          rules : {
	            "TBLDAFTAR_NOPOK" : {
	              required : true
	            }
	          },

	          // Messages for form validation
	          messages : {
	            "TBLDAFTAR_NOPOK" : {
	              required : 'Mohon isikan Nomor Pokok WP'
	            }
	          },

	          // Do not change code below
	          errorPlacement : function(error, element) {
	            error.insertAfter(element.parent());
	          },
	          submitHandler : function(form) {
	            // saat validasi benar semua, jalankan simpan()
	            return simpanparkir();
	          }
	        });

	  	};
  	/*//form validation*/

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

		$('#TBLPENDATAAN_THNPAJAK').val(window.yyyy);
		$('#TBLPENDATAAN_BLNPAJAK').val(window.mm);
		$('#TBLPENDATAAN_TGLPAJAK').val(window.dd);

		$('#TBLDAFTPARKIR_TGLTERIMA').val(today);
		$('#TBLDAFTPARKIR_TGLBATASSPTPD').val(today);
		$('#TBLDAFTPARKIR_TGLENTRI').val(today);

		setPriceFormat();
		
		nopokok = <?php echo isset($_GET['nopokok']) ? $_GET['nopokok'] : '0'?>;
		thnpajak = <?php echo isset($_GET['thnpajak']) ? $_GET['thnpajak'] : '0'?>;
		blnpajak = <?php echo isset($_GET['blnpajak']) ? $_GET['blnpajak'] : '0'?>;
		tglpajak = <?php echo isset($_GET['tglpajak']) ? $_GET['tglpajak'] : '0'?>;
		
		if(nopokok>0) {$('#TBLDAFTAR_NOPOK').val(nopokok);}
		if(thnpajak>0) {$('#TBLPENDATAAN_THNPAJAK').val(thnpajak);}
		if(blnpajak>=1 && blnpajak<=9) {$('#TBLPENDATAAN_BLNPAJAK').val('0'+tglpajak);} else if(blnpajak>=10) {$('#TBLPENDATAAN_BLNPAJAK').val(blnpajak);}
		if(tglpajak>0) {$('#TBLPENDATAAN_TGLPAJAK').val(tglpajak);}
		if(nopokok>0 || thnpajak>0 || blnpajak>0 || tglpajak>0){cekPernahDaftar();}
	});

	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWPParkir();
	});


	function generateAutocompleteWPParkir() {
		$('#TBLDAFTAR_NOPOK').autocomplete({
			serviceUrl: 'pendataan/pajakparkir/autocompletewpparkir',

			onSelect: function (suggestion) {
		        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
		        window.id = suggestion.data;
		        window.nopokok = suggestion.TBLDAFTAR_NOPOK;
		        window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
		        window.bunamamerk = suggestion.TBLDAFTAR_BADANUSAHANAMA;
		        window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
		        window.bualamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
		        window.koderek = suggestion.REKENING_KODE;
		        window.subkoderek = suggestion.REKENING_KODE;
		        window.idkecamatan = suggestion.TBLKECAMATAN_IDBADANUSAHA;
		        window.idkelurahan = suggestion.TBLKELURAHAN_IDBADANUSAHA;
		        $(this).val(suggestion.value);
		        $('#TBLDAFTAR_NOPOK').val(suggestion.value.split(' | ')[0]);

		    }
		    ,showNoSuggestionNotice : true
		    ,noCache : true
		    ,noSuggestionNotice : "Tidak ditemukan hasil"
		});
	}

	function cekPernahDaftar() {
		var THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
		var BLNPAJAK = $('#TBLPENDATAAN_BLNPAJAK').val();
		var TBLDAFTAR_NOPOK = $('#TBLDAFTAR_NOPOK').val();

		getTglBatas(THNPAJAK,BLNPAJAK,window.koderek)

		if (TBLDAFTAR_NOPOK=='') {
			notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
		}
		else{
			$.ajax({
				url: 'pendataan/pajakparkir/CekPernahDaftar',
				type: 'POST',
				dataType: 'json',
				data: {
					 nopokok: window.nopokok
					,THNPAJAK: $('#TBLPENDATAAN_THNPAJAK').val()
					,BLNPAJAK: $('#TBLPENDATAAN_BLNPAJAK').val()
				},
				success : function (respon) {
					if (respon.status=='sudah') {
						$.SmartMessageBox({
							title : "Informasi", // judul Smart Alert
							content : "Data dengan Nomor Pokok "+window.nopokok+", Masa Pajak "+BLNPAJAK+" "+THNPAJAK+" sudah pernah mendaftar. <br> Apakah anda ingin mengubah data ini?", // konten dari smart alert
							buttons : '[Tidak][Ya]' // pengaturan tombol
						}, function(ButtonPressed) {
							if (ButtonPressed === "Ya") {
								edit();
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

	function getTglBatas(THNPAJAK,BLNPAJAK,KODEREK) {
		$.ajax({
			url: 'pendataan/pajakparkir/GetTGLBatas',
			type: 'POST',
			dataType: 'json',
			data: {
				 THNPAJAK : THNPAJAK
				,BLNPAJAK : BLNPAJAK
				,KODEREK : KODEREK
			},
			success: function(respon) {
				window.tglbataspajak = respon.TGLBATASPAJAK;
				window.tglbatasnow = respon.TGLBATASBLNNOW;
				window.bulanbatas = respon.BLNPAJAK;
				window.bulanbunga = respon.BLNBUNGAHIT;
				$('#TBLDAFTPARKIR_TGLBATASSPTPD').val(respon.TGLBATASPAJAK);
			}
		});
		
	}

	function edit() {
		$('#TBLDAFTPARKIR_PENJUALANHARI').val('');
		$('#TBLDAFTPARKIR_OMSETPAJAK').val('');
		$('#TBLDAFTPARKIR_PAJAK').val('');
		$('#TBLDAFTPARKIR_BUNGASPTPD').val('');
		$('#TBLDAFTPARKIR_RUPIAHSETOR').val('');
		var TBLDAFTAR_NOPOK = $('#TBLDAFTAR_NOPOK').val();
		if (TBLDAFTAR_NOPOK=='') {
			notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
		}
		else{
			$('#footer-parkir').hide('fast');
			$("html, body").animate({ scrollTop: 800 }, "slow");
			$("#form-dokumentasi-tanggal").slideDown(600);
			
			$('#form-data-perhitungan').hide('fast');
			$.ajax({
				url: 'pendataan/pajakparkir/GetWPParkir',
				type: 'POST',
				dataType: 'json',
				data: {
					 nopokok: window.nopokok
					,THNPAJAK: $('#TBLPENDATAAN_THNPAJAK').val()
					,BLNPAJAK: $('#TBLPENDATAAN_BLNPAJAK').val()
				},
				success: function(respon) {
					$('#TBLDAFTAR_BADANUSAHANAMA').val(window.bunamamerk);
					$('#TBLDAFTAR_BADANUSAHAALAMAT').val(window.bualamat);
					$('#REKENING_KODE').select2('val',window.subkoderek);
					$('#TBLDAFTPARKIR_PENJUALANHARI').val(respon.TBLDAFTPARKIR_OMSETPAJAK);
					$('#TBLDAFTPARKIR_PAJAK').val(respon.TBLDAFTPARKIR_PAJAK);
					$('#TBLDAFTPARKIR_BUNGASPTPD').val(respon.TBLDAFTPARKIR_BUNGASPTPD);
					$('#TBLDAFTPARKIR_RUPIAHSETOR').val(respon.TBLDAFTPARKIR_RUPIAHSETOR);

					//$('#TBLDAFTPARKIR_TGLSPTPD').val(respon.TBLDAFTPARKIR_TGLSPTPD+'-'+respon.TBLDAFTPARKIR_BLNSPTPD+'-20'+respon.TBLDAFTPARKIR_THNSPTPD);
					
					getTarifRekening(window.subkoderek);
					$('#form-data-perhitungan').show('fast');
					$('#form-dokumentasi-tanggal').show('fast');
					$('#footer-parkir').show('fast');
					setMasaPajak();
				}
			});
			
		}
		
	}

	function cari() {
		$('#TBLDAFTPARKIR_PENJUALANHARI').val('');
		$('#TBLDAFTPARKIR_OMSETPAJAK').val('');
		$('#TBLDAFTPARKIR_PAJAK').val('');
		$('#TBLDAFTPARKIR_BUNGASPTPD').val('');
		$('#TBLDAFTPARKIR_RUPIAHSETOR').val('');
		var TBLDAFTAR_NOPOK = $('#TBLDAFTAR_NOPOK').val();
		if (TBLDAFTAR_NOPOK=='') {
			notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
		}
		else{
			$('#footer-parkir').hide('fast');
			$("html, body").animate({ scrollTop: 800 }, "slow");
			$("#form-dokumentasi-tanggal").slideDown(600);
			
			$('#form-data-perhitungan').hide('fast');
			$.ajax({
				url: 'pendataan/pajakparkir/GetWPParkir',
				type: 'POST',
				dataType: 'json',
				data: {
					 nopokok: window.nopokok
					,THNPAJAK: $('#TBLPENDATAAN_THNPAJAK').val()
					,BLNPAJAK: $('#TBLPENDATAAN_BLNPAJAK').val()
				},
				success: function(respon) {
					$('#TBLDAFTAR_BADANUSAHANAMA').val(window.bunamamerk);
					$('#TBLDAFTAR_BADANUSAHAALAMAT').val(window.bualamat);
					$('#REKENING_KODE').select2('val',window.subkoderek);

					//$('#TBLDAFTPARKIR_TGLSPTPD').val(respon.TBLDAFTPARKIR_TGLSPTPD+'-'+respon.TBLDAFTPARKIR_BLNSPTPD+'-20'+respon.TBLDAFTPARKIR_THNSPTPD);
					
					getTarifRekening(window.subkoderek);
					$('#form-data-perhitungan').show('fast');
					$('#form-dokumentasi-tanggal').show('fast');
					$('#footer-parkir').show('fast');
					setMasaPajak();
				}
			});
			
		}
		
	}

	function setMasaPajak() {
		$("#TBLDAFTPARKIR_TGLMULAIJUAL").val('');
		$("#TBLDAFTPARKIR_TGLAKHIRJUAL").val('');
		thn = $("#TBLPENDATAAN_THNPAJAK").val();
		bln = $("#TBLPENDATAAN_BLNPAJAK").val();
		// c = $("#tbltransaksiketetapan_notransaksi").val();
		if (thn!='' && bln!='') {
			/*el = "#tbltransaksiketetapan_tglentrisptpd, #tbltransaksiketetapan_tglterimasptpd, #tbltransaksiketetapan_omzettotal, #tbltransaksiketetapan_rupiahdenda, #tbltransaksiketetapan_pajak";
			jQuery.each(el.split(', '), function(index, val) {
			  $(val).val($(val)[0].defaultValue);
			});*/
			window.cmdp = 'tambah';
			window.idtranskttap = 0;	
			masapajak = moment([thn,(bln-1)]);
			$("#TBLDAFTPARKIR_TGLMULAIJUAL").val(masapajak.format('L'));
			$("#TBLDAFTPARKIR_TGLAKHIRJUAL").val(masapajak.endOf('month').format('L'));
			$("#TBLDAFTPARKIR_JUMLAHHARIJUAL").val(masapajak.endOf('month').format('L').split('-')[0]-1);
			// if (c!='') {
			// isSudahPendataan(thn, bln, c);
			// }
		}
	}

	function getTarifRekening(kodesubrek) {
		$.ajax({
			url: 'pendataan/pajakparkir/GetKodeRek',
			type: 'POST',
			dataType: 'json',
			data: {
				kodesubrek : kodesubrek
			},
			success: function(respon) {
				$('#TBLREKENING_PERSEN').val(respon.TBLREKENING_PERSEN);
			}
		});
		
	}

	function hitungPajakHari() {
		var PENJUALANHARI = toAngka($('#TBLDAFTPARKIR_PENJUALANHARI').val());
		var TARIF = $('#TBLREKENING_PERSEN').val();
		var JUMLAHHARI = toAngka($('#TBLDAFTPARKIR_JUMLAHHARIJUAL').val());

		var pajak = (PENJUALANHARI*JUMLAHHARI*TARIF)/100;

		bungabln = window.bulanbunga;

		bungarp = 0;
		if (bungabln > 0) {
			bungarp = ((bulanbunga*2)/100)* pajak;
			$('#TBLDAFTPARKIR_BUNGASPTPD').val(Math.floor(bungarp));
		}

		if (PENJUALANHARI!=0) {
			$('#TBLDAFTPARKIR_OMSETPAJAK').attr('disabled', 'disabled');
			$('#TBLDAFTPARKIR_OMSETPAJAK').attr('style', 'background:#e4e4e4');
			$('#TBLDAFTPARKIR_OMSETPAJAK').attr('class', 'input-sm form-control');
		}else{
			$('#TBLDAFTPARKIR_OMSETPAJAK').removeAttr('disabled');
			$('#TBLDAFTPARKIR_OMSETPAJAK').removeAttr('style');
			$('#TBLDAFTPARKIR_OMSETPAJAK').removeAttr('class');
		}

		var setor = pajak+bungarp;

		$('#TBLDAFTPARKIR_PAJAK').val(Math.floor(pajak));
		$('#TBLDAFTPARKIR_RUPIAHSETOR').val(Math.floor(setor));

		setPriceFormat();
	}

	function hitungPajakBulan() {
		var OMZET = toAngka($('#TBLDAFTPARKIR_OMSETPAJAK').val());
		var TARIF = $('#TBLREKENING_PERSEN').val();

		var pajak = (OMZET*TARIF)/100;

		bungabln = Number(window.bulanbunga);

		bungarp = 0;
		if (bungabln > 0) {
			bungarp = ((bulanbunga*2)/100)* pajak;
			$('#TBLDAFTPARKIR_BUNGASPTPD').val(Math.floor(bungarp));
		}

		if (OMZET!=0) {
			$('#TBLDAFTPARKIR_PENJUALANHARI').attr('disabled', 'disabled');
			$('#TBLDAFTPARKIR_PENJUALANHARI').attr('style', 'background:#e4e4e4');
			$('#TBLDAFTPARKIR_PENJUALANHARI').attr('class', 'input-sm form-control');
		}else{
			$('#TBLDAFTPARKIR_PENJUALANHARI').removeAttr('disabled');
			$('#TBLDAFTPARKIR_PENJUALANHARI').removeAttr('style');
			$('#TBLDAFTPARKIR_PENJUALANHARI').removeAttr('class');
		}

		var setor = pajak+bungarp;

		$('#TBLDAFTPARKIR_PAJAK').val(Math.floor(pajak));
		$('#TBLDAFTPARKIR_RUPIAHSETOR').val(Math.floor(setor));

		setPriceFormat();
	}

	function simpanparkir() {
		if($('#is_tanggal').is(':checked')){
			window.isi_masapajak_tanggal = $('#TBLPENDATAAN_TGLPAJAK').val();
		} else {
			window.isi_masapajak_tanggal = '00';
		}
		$.ajax({
			url: 'pendataan/pajakparkir/SimpanParkir',
			type: 'post',
			dataType: "json",
			data:  $("#form-pendataan-parkir").serialize()+'&idkecamatan='+window.idkecamatan+'&idkelurahan='+window.idkelurahan+'&isi_masapajak_tanggal='+window.isi_masapajak_tanggal,
			success: function(data) {
				if (data.status=="success") {
					notifikasi('Sukses','Data Berhasil Disimpan', 'success',0,1);
				}
				else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
				}
			}
		});
	}

</script>
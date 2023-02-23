<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file fa-fw"></i> Enrty Pendataan Pajak Hiburan Tetap</h4>
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
					<form class="smart-form" id="form-pendataan-hiburan">
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
								<section class="col col-md-2">
									<label class="input">
										<input type="number" id="TBLPENDATAAN_THNPAJAK" name="TBLPENDATAAN_THNPAJAK">
									</label>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select class="" id="TBLPENDATAAN_BLNPAJAK" name="TBLPENDATAAN_BLNPAJAK">
											<option value="">-- Bulan --</option>
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
								
								<!--<section class="col col-md-1">
									<label class="input">
										<input type="number" id="TBLPENDATAAN_TGLPAJAK" name="TBLPENDATAAN_TGLPAJAK">
									</label>
								</section>-->

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
												<option value="<?php echo $list['TBLREKENING_KODE'] ?>" rekjenis="<?php echo $list['TBLREKENING_REKJENIS'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
											<?php endforeach ?>
											<input type="hidden" id="TBLREKENING_PERSEN" name="TBLREKENING_PERSEN">
											<input type="hidden" id="TBLREKENING_REKJENIS" name="TBLREKENING_REKJENIS">
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
										<input type="text" id="TBLDAFTHIBURAN_TGLSPTPD" value="<?php echo date('d-m-Y'); ?>" name="TBLDAFTHIBURAN_TGLSPTPD" class="datepicker" data-dateformat="dd-mm-yy">
									</label>
								</section>

								<section class="col col-md-1">
									<p>Jenis Hiburan</p>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select class="select" id="TBLDAFTHIBURAN_JNSHIBURAN" name="TBLDAFTHIBURAN_JNSHIBURAN" readonly="readonly">
											<option value="T" selected="selected">Tetap</option>
										</select><i></i>
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
										<input type="text" style="background-color: #eeeeee;" readonly="readonly" onkeyup="hitungPajakHari()" class="format-rupiah" id="TBLDAFTHIBURAN_PENJUALANHARI" name="TBLDAFTHIBURAN_PENJUALANHARI">
									</label>
								</section>
								<section class="col col-md-2">
									<p>Jumlah Hari</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input type="text" style="background-color: #eeeeee;" readonly="readonly" onkeyup="hitungPajakHari()" class="format-ribuan" id="TBLDAFTHIBURAN_JUMLAHHARIJUAL" name="TBLDAFTHIBURAN_JUMLAHHARIJUAL">
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-2">
									<p>Penjualan/ Bulan</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input type="text" style="background-color: #eeeeee;" readonly="readonly" onkeyup="hitungPajakBulan()" class="format-rupiah" id="TBLDAFTHIBURAN_OMSETPAJAK" name="TBLDAFTHIBURAN_OMSETPAJAK">
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
										<input type="text" id="TBLDAFTHIBURAN_TGLMULAIJUAL" name="TBLDAFTHIBURAN_TGLMULAIJUAL" class="datepicker" data-dateformat="dd-mm-yy">
									</label>
								</section>
								<section class="col col-md-2">
									<p>Tanggal Berakhir</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<i class="icon-append fa fa-calendar"></i>
										<input type="text" id="TBLDAFTHIBURAN_TGLAKHIRJUAL" name="TBLDAFTHIBURAN_TGLAKHIRJUAL" class="datepicker" data-dateformat="dd-mm-yy">
									</label>
								</section>
							</div>

							<div class="row" style="display: none;">
								<section class="col col-md-2">
									<p>Pembukuan</p>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select id="TBLDAFTHIBURAN_ISPEMBUKUAN" name="TBLDAFTHIBURAN_ISPEMBUKUAN">
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
										<select id="TBLDAFTHIBURAN_ISKAS" name="TBLDAFTHIBURAN_ISKAS">
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
										<select id="TBLDAFTHIBURAN_ISNOTA" name="TBLDAFTHIBURAN_ISNOTA">
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
										<input style="background-color: #eeeeee;" readonly="readonly" class="form-control format-ribuan format-rupiah" id="TBLDAFTHIBURAN_PAJAK" name="TBLDAFTHIBURAN_PAJAK" type="text">
									</div>
								</section>

								<section class="col col-md-1">
									<p>Bunga SPT</p>
								</section>
								<section class="col col-md-2">
									<div class="input-group">
										<span class="input-group-addon">Rp</span>
										<input style="background-color: #eeeeee;" readonly="readonly" class="form-control format-ribuan format-rupiah" id="TBLDAFTHIBURAN_BUNGASPTPD" name="TBLDAFTHIBURAN_BUNGASPTPD" type="text">
									</div>
								</section>

								<section class="col col-md-1">
									<p>Total Setor</p>
								</section>
								<section class="col col-md-2">
									<div class="input-group">
										<span class="input-group-addon">Rp</span>
										<input readonly="readonly" style="background-color: #eeeeee;" class="form-control format-ribuan format-rupiah" id="TBLDAFTHIBURAN_RUPIAHSETOR" name="TBLDAFTHIBURAN_RUPIAHSETOR" type="text">
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
										<input type="text" id="TBLDAFTHIBURAN_TGLTERIMA" name="TBLDAFTHIBURAN_TGLTERIMA" class="datepicker" data-dateformat="dd-mm-yy">
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
										<input style="background-color: #eeeeee;" readonly="readonly" type="text" id="TBLDAFTHIBURAN_TGLBATASSPTPD" name="TBLDAFTHIBURAN_TGLBATASSPTPD" class="datepicker" data-dateformat="dd-mm-yy">
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
										<input style="background-color: #eeeeee;" readonly="readonly" type="text" id="TBLDAFTHIBURAN_TGLENTRI" name="TBLDAFTHIBURAN_TGLENTRI" class="datepicker" data-dateformat="dd-mm-yy">
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-2">
									Cara Penghitungan 
								</section>
								<section class="col col-md-3">
									<label class="select">
										<select id="TBLDAFTHIBURAN_ISJNSPENETAPAN" name="TBLDAFTHIBURAN_ISJNSPENETAPAN" class="select2">
											<option disabled="">Silahkan Pilih</option>
											<option value="S" selected=""> S | Self Assesment</option>
											<option value="O">O | Official Assesment</option>
										</select> 
									</label>
								</section>
							</div>
						</fieldset>
						<footer id="footer-hiburan" style="display: none;">
							<section class="col col-md-2">
								
							</section>
							<section class="col col-md-2">
								<button class="btn btn-sm btn-primary pull-left" type="submit">
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
	    	var $FormData = $("#form-pendataan-hiburan").validate({
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
	            return simpanhiburan();
	          }
	        });

	  	};
  	/*//form validation*/
	$(document).ready(function() {
		$(window).keydown(function(event){
			if(event.keyCode == 13) {
				event.preventDefault();
				return false;
			}
		});
	});

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
		$('#TBLPENDATAAN_BLNPAJAK').val(window.mm-1);
		//$('#TBLPENDATAAN_TGLPAJAK').val(window.dd);

		$('#TBLDAFTHIBURAN_TGLTERIMA').val(today);
		$('#TBLDAFTHIBURAN_TGLBATASSPTPD').val(today);
		$('#TBLDAFTHIBURAN_TGLENTRI').val(today);

		setPriceFormat();
	});

	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWPHiburan();
	});


	function generateAutocompleteWPHiburan() {
		$('#TBLDAFTAR_NOPOK').autocomplete({
			serviceUrl: 'pendataan/teguran_hiburantetap/autocompletewphiburan',

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
				url: 'pendataan/teguran_hiburantetap/CekPernahDaftar',
				type: 'POST',
				dataType: 'json',
				data: {
					 nopokok: window.nopokok
					,THNPAJAK: $('#TBLPENDATAAN_THNPAJAK').val()
					,BLNPAJAK: $('#TBLPENDATAAN_BLNPAJAK').val()
				},
				success : function (respon) {
					window.ada_data = respon.status;
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
							setTimeout(function() {
								$('#TBLDAFTHIBURAN_OMSETPAJAK').val(0);
								$('#TBLDAFTHIBURAN_BUNGASPTPD').val(0);
							hitungPajakBulan();

							}, 500);
					}
				}
			});
		}
		
	}

	function getTglBatas(THNPAJAK,BLNPAJAK,KODEREK) {
		$.ajax({
			url: 'pendataan/teguran_hiburantetap/GetTGLBatas',
			type: 'POST',
			dataType: 'json',
			data: {
				 THNPAJAK : THNPAJAK
				,BLNPAJAK : BLNPAJAK
				,KODEREK : KODEREK
			},
			success: function(respon) {
				window.tglbataspajak = respon.AWAL_PAJAK;
				window.tglbatasnow = respon.AKHIR_PAJAK;
				window.bulanbatas = respon.BLNPAJAK;
				window.bulanbunga = respon.BLNBUNGA;
				$('#TBLDAFTHIBURAN_TGLBATASSPTPD').val(respon.TGL_BATAS);
			}
		});
		
	}

	function cari() {
		$('#TBLDAFTHIBURAN_PENJUALANHARI').val('');
		$('#TBLDAFTHIBURAN_OMSETPAJAK').val('');
		$('#TBLDAFTHIBURAN_PAJAK').val('');
		$('#TBLDAFTHIBURAN_BUNGASPTPD').val('');
		$('#TBLDAFTHIBURAN_RUPIAHSETOR').val('');
		var TBLDAFTAR_NOPOK = $('#TBLDAFTAR_NOPOK').val();
		if (TBLDAFTAR_NOPOK=='') {
			notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
		}
		else{
			$('#footer-hiburan').hide('fast');
			$("html, body").animate({ scrollTop: 800 }, "slow");
			// $("#form-dokumentasi-tanggal").slideDown(600);
			
			$('#form-data-perhitungan').hide('fast');
			$.ajax({
				url: 'pendataan/teguran_hiburantetap/GetWPHiburan',
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
					$('#TBLDAFTHIBURAN_JUMLAHHARIJUAL').val(respon.TBLDAFTHIBURAN_JUMLAHHARIJUAL);
					$('#TBLDAFTHIBURAN_OMSETPAJAK').val(respon.TBLDAFTHIBURAN_OMSETPAJAK);
					$('#TBLDAFTHIBURAN_PAJAK').val(respon.TBLDAFTHIBURAN_PAJAK);
					$('#TBLDAFTHIBURAN_BUNGASPTPD').val(respon.TBLDAFTHIBURAN_BUNGASPTPD);
					$('#TBLDAFTHIBURAN_RUPIAHSETOR').val(eval(respon.TBLDAFTHIBURAN_PAJAK)+eval(respon.TBLDAFTHIBURAN_BUNGASPTPD));

					//$('#TBLDAFTHIBURAN_TGLSPTPD').val(respon.TBLDAFTHIBURAN_TGLSPTPD+'-'+respon.TBLDAFTHIBURAN_BLNSPTPD+'-20'+respon.TBLDAFTHIBURAN_THNSPTPD);
					
					getTarifRekening(window.subkoderek);
					$('#form-data-perhitungan').show('fast');
					// $('#form-dokumentasi-tanggal').show('fast');
					$('#footer-hiburan').show('fast');
					setMasaPajak();
					setPriceFormat();
				}
			});
			
		}
	}

	function setMasaPajak() {
		$("#TBLDAFTHIBURAN_TGLMULAIJUAL").val('');
		$("#TBLDAFTHIBURAN_TGLAKHIRJUAL").val('');
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
			$("#TBLDAFTHIBURAN_TGLMULAIJUAL").val(masapajak.format('L'));
			$("#TBLDAFTHIBURAN_TGLAKHIRJUAL").val(masapajak.endOf('month').format('L'));
			$("#TBLDAFTHIBURAN_JUMLAHHARIJUAL").val(masapajak.endOf('month').format('L').split('-')[0]-1);
			// if (c!='') {
			// isSudahPendataan(thn, bln, c);
			// }
		}
	}

	function getTarifRekening(kodesubrek) {
		$.ajax({
			url: 'pendataan/teguran_hiburantetap/GetKodeRek',
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

	$("#REKENING_KODE").change(function(event) {
		rekjenis = $("#REKENING_KODE option:selected").attr('rekjenis');
		$('#TBLREKENING_REKJENIS').val(rekjenis); 
	});

	function hitungPajakHari() {
		var PENJUALANHARI = toAngka($('#TBLDAFTHIBURAN_PENJUALANHARI').val());
		var TARIF = $('#TBLREKENING_PERSEN').val();
		var JUMLAHHARI = toAngka($('#TBLDAFTHIBURAN_JUMLAHHARIJUAL').val());

		var pajak = (PENJUALANHARI*JUMLAHHARI*TARIF)/100;

		bungabln = window.bulanbunga;

		bungarp = 0;
		if (bungabln > 0) {
			bungarp = ((bulanbunga*2)/100)* pajak;
			$('#TBLDAFTHIBURAN_BUNGASPTPD').val(Math.floor(bungarp));
		}

		if (PENJUALANHARI!=0) {
			$('#TBLDAFTHIBURAN_OMSETPAJAK').attr('disabled', 'disabled');
			$('#TBLDAFTHIBURAN_OMSETPAJAK').attr('style', 'background:#e4e4e4');
			$('#TBLDAFTHIBURAN_OMSETPAJAK').attr('class', 'input-sm form-control');
		}else{
			$('#TBLDAFTHIBURAN_OMSETPAJAK').removeAttr('disabled');
			$('#TBLDAFTHIBURAN_OMSETPAJAK').removeAttr('style');
			$('#TBLDAFTHIBURAN_OMSETPAJAK').removeAttr('class');
		}

		var setor = pajak+bungarp;

		$('#TBLDAFTHIBURAN_PAJAK').val(Math.floor(pajak));
		$('#TBLDAFTHIBURAN_RUPIAHSETOR').val(Math.floor(setor));

		setPriceFormat();
	}

	function hitungPajakBulan() {

		var OMZET = toAngka($('#TBLDAFTHIBURAN_OMSETPAJAK').val());
		var TARIF = $('#TBLREKENING_PERSEN').val();

		var pajak = (OMZET*TARIF)/100;
		pajak = Math.round(pajak);

		bungabln = Number(window.bulanbunga);

		bungarp = 0;
		if (bungabln > 0) {
			bungarp = ((bulanbunga*2)/100)* pajak;
			bungarp = Math.round(bungarp);
			$('#TBLDAFTHIBURAN_BUNGASPTPD').val(bungarp);
		}

		if (OMZET!=0) {
			$('#TBLDAFTHIBURAN_PENJUALANHARI').attr('disabled', 'disabled');
			$('#TBLDAFTHIBURAN_PENJUALANHARI').attr('style', 'background:#e4e4e4');
			$('#TBLDAFTHIBURAN_PENJUALANHARI').attr('class', 'input-sm form-control');
		}else{
			// $('#TBLDAFTHIBURAN_PENJUALANHARI').removeAttr('disabled');
			// $('#TBLDAFTHIBURAN_PENJUALANHARI').removeAttr('style');
			// $('#TBLDAFTHIBURAN_PENJUALANHARI').removeAttr('class');
		}

		var setor = pajak+bungarp;

		$('#TBLDAFTHIBURAN_PAJAK').val(pajak);
		$('#TBLDAFTHIBURAN_RUPIAHSETOR').val(setor);

		setPriceFormat();
	}

	function simpanhiburan () {
		$.ajax({
			url: 'pendataan/teguran_hiburantetap/SimpanHiburan',
			type: 'post',
			dataType: "json",
			data:  $("#form-pendataan-hiburan").serialize()+'&idkecamatan='+window.idkecamatan+'&idkelurahan='+window.idkelurahan+'&ada_data='+window.ada_data,
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

</script>
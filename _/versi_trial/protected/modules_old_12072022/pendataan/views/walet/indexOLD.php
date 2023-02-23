<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file fa-fw"></i> Enrty Pendataan Pajak Walet</h4>
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
					<form class="smart-form" id="form-pendataan-walet">
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
										</select>
										<input type="hidden" id="TBLREKENING_PERSEN" name="TBLREKENING_PERSEN">
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
										<input type="text" id="TBLDAFTBURUNG_TGLSPTPD" value="<?php echo date('d-m-Y'); ?>" name="TBLDAFTBURUNG_TGLSPTPD" class="datepicker" data-dateformat="dd-mm-yy">
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
										<input type="text" onkeyup="hitungPajakHari()" class="format-ribuan" id="TBLDAFTBURUNG_PENJUALANHARI" name="TBLDAFTBURUNG_PENJUALANHARI">
									</label>
								</section>
								<section class="col col-md-2">
									<p>Jumlah Hari</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input type="text" onkeyup="hitungPajakHari()" class="format-ribuan" id="TBLDAFTBURUNG_JUMLAHHARIJUAL" name="TBLDAFTBURUNG_JUMLAHHARIJUAL">
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-2">
									<p>Penjualan/ Bulan</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input type="text" onkeyup="hitungPajakBulan()" class="format-ribuan" id="TBLDAFTBURUNG_OMSETPAJAK" name="TBLDAFTBURUNG_OMSETPAJAK">
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
										<input type="text" id="TBLDAFTBURUNG_TGLMULAIJUAL" name="TBLDAFTBURUNG_TGLMULAIJUAL" class="datepicker" data-dateformat="dd-mm-yy">
									</label>
								</section>
								<section class="col col-md-2">
									<p>Tanggal Berakhir</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<i class="icon-append fa fa-calendar"></i>
										<input type="text" id="TBLDAFTBURUNG_TGLAKHIRJUAL" name="TBLDAFTBURUNG_TGLAKHIRJUAL" class="datepicker" data-dateformat="dd-mm-yy">
									</label>
								</section>
							</div>

							<div class="row" style="display: none;">
								<section class="col col-md-2">
									<p>Pembukuan</p>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select id="TBLDAFTBURUNG_ISPEMBUKUAN" name="TBLDAFTBURUNG_ISPEMBUKUAN">
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
										<select id="TBLDAFTBURUNG_ISKAS" name="TBLDAFTBURUNG_ISKAS">
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
										<select id="TBLDAFTBURUNG_ISNOTA" name="TBLDAFTBURUNG_ISNOTA">
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
										<input class="form-control format-ribuan" id="TBLDAFTBURUNG_PAJAK" name="TBLDAFTBURUNG_PAJAK" type="text">
									</div>
								</section>

								<section class="col col-md-1">
									<p>Bunga SPT</p>
								</section>
								<section class="col col-md-2">
									<div class="input-group">
										<span class="input-group-addon">Rp</span>
										<input class="form-control format-ribuan" id="TBLDAFTBURUNG_BUNGASPTPD" name="TBLDAFTBURUNG_BUNGASPTPD" type="text">
									</div>
								</section>

								<section class="col col-md-1">
									<p>Total Setor</p>
								</section>
								<section class="col col-md-2">
									<div class="input-group">
										<span class="input-group-addon">Rp</span>
										<input readonly="readonly" style="background-color: #eeeeee;" class="form-control format-ribuan" id="TBLDAFTBURUNG_RUPIAHSETOR" name="TBLDAFTBURUNG_RUPIAHSETOR" type="text">
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
										<input type="text" id="TBLDAFTBURUNG_TGLTERIMA" name="TBLDAFTBURUNG_TGLTERIMA" class="datepicker" data-dateformat="dd-mm-yy">
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
										<input style="background-color: #eeeeee;" readonly="readonly" type="text" id="TBLDAFTBURUNG_TGLBATASSPTPD" name="TBLDAFTBURUNG_TGLBATASSPTPD" class="datepicker" data-dateformat="dd-mm-yy">
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
										<input style="background-color: #eeeeee;" readonly="readonly" type="text" id="TBLDAFTBURUNG_TGLENTRI" name="TBLDAFTBURUNG_TGLENTRI" class="datepicker" data-dateformat="dd-mm-yy">
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
	    	var $FormData = $("#form-pendataan-walet").validate({
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
	            return simpanwalet();
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

		nopokok = <?php echo isset($_GET['nopokok']) ? base64_decode($_GET['nopokok']) : '0'?>;
		thnpajak = <?php echo isset($_GET['thnpajak']) ? base64_decode($_GET['thnpajak']) : '0'?>;
		blnpajak = <?php echo isset($_GET['blnpajak']) ? base64_decode($_GET['blnpajak']) : '0'?>;
		tglpajak = <?php echo isset($_GET['tglpajak']) ? base64_decode($_GET['tglpajak']) : '0'?>;
		
		if(nopokok>0) {$('#TBLDAFTAR_NOPOK').val(nopokok);}
		if(thnpajak>0) {$('#TBLPENDATAAN_THNPAJAK').val('20'+thnpajak);}
		if(blnpajak>0) {$('#TBLPENDATAAN_BLNPAJAK').val(blnpajak);}
		if(tglpajak>0) {$('#TBLPENDATAAN_TGLPAJAK').select2('val', tglpajak);}
		if(nopokok>0 || thnpajak>0 || blnpajak>0 || tglpajak>0){cekPernahDaftar();}
		
		today = window.dd+'-'+window.mm+'-'+window.yyyy;

		$('#TBLPENDATAAN_THNPAJAK').val(window.yyyy);
		$('#TBLPENDATAAN_BLNPAJAK').val(window.mm-1);
		$('#TBLPENDATAAN_TGLPAJAK').val(window.dd);

		$('#TBLDAFTBURUNG_TGLTERIMA').val(today);
		$('#TBLDAFTBURUNG_TGLBATASSPTPD').val(today);
		$('#TBLDAFTBURUNG_TGLENTRI').val(today);

		setPriceFormat();
	});

	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWPWalet();
	});


	function generateAutocompleteWPWalet() {
		$('#TBLDAFTAR_NOPOK').autocomplete({
			serviceUrl: 'pendataan/walet/autocompletewpwalet',

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
				url: 'pendataan/walet/CekPernahDaftar',
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
					}
				}
			});
		}
		
	}

	function getTglBatas(THNPAJAK,BLNPAJAK,KODEREK) {
		$.ajax({
			url: 'pendataan/walet/GetTGLBatas',
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
				$('#TBLDAFTBURUNG_TGLBATASSPTPD').val(respon.TGLBATASPAJAK);
			}
		});
		
	}

	function cari() {
		$('#TBLDAFTBURUNG_PENJUALANHARI').val('');
		$('#TBLDAFTBURUNG_OMSETPAJAK').val('');
		$('#TBLDAFTBURUNG_PAJAK').val('');
		$('#TBLDAFTBURUNG_BUNGASPTPD').val('');
		$('#TBLDAFTBURUNG_RUPIAHSETOR').val('');
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
				url: 'pendataan/walet/GetWPWalet',
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

					//$('#TBLDAFTBURUNG_TGLSPTPD').val(respon.TBLDAFTBURUNG_TGLSPTPD+'-'+respon.TBLDAFTBURUNG_BLNSPTPD+'-20'+respon.TBLDAFTBURUNG_THNSPTPD);
					
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
		$("#TBLDAFTBURUNG_TGLMULAIJUAL").val('');
		$("#TBLDAFTBURUNG_TGLAKHIRJUAL").val('');
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
			$("#TBLDAFTBURUNG_TGLMULAIJUAL").val(masapajak.format('L'));
			$("#TBLDAFTBURUNG_TGLAKHIRJUAL").val(masapajak.endOf('month').format('L'));
			$("#TBLDAFTBURUNG_JUMLAHHARIJUAL").val(masapajak.endOf('month').format('L').split('-')[0]);
			// if (c!='') {
			// isSudahPendataan(thn, bln, c);
			// }
		}
	}

	function getTarifRekening(kodesubrek) {
		$.ajax({
			url: 'pendataan/walet/GetKodeRek',
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
		var PENJUALANHARI = toAngka($('#TBLDAFTBURUNG_PENJUALANHARI').val());
		var TARIF = $('#TBLREKENING_PERSEN').val();
		var JUMLAHHARI = toAngka($('#TBLDAFTBURUNG_JUMLAHHARIJUAL').val());

		var pajak = eval((PENJUALANHARI*JUMLAHHARI*TARIF)/100);

		bungabln = eval(window.bulanbunga);

		if (bungabln > 0) {
			bungarp = eval(((bungabln*2)/100)* eval(pajak));
			$('#TBLDAFTBURUNG_BUNGASPTPD').val(Math.floor(bungarp));
		}else{
			bungarp = 0;
		}

		if (PENJUALANHARI!=0) {
			$('#TBLDAFTBURUNG_OMSETPAJAK').attr('disabled', 'disabled');
			$('#TBLDAFTBURUNG_OMSETPAJAK').attr('style', 'background:#e4e4e4');
			$('#TBLDAFTBURUNG_OMSETPAJAK').attr('class', 'input-sm form-control');
		}else{
			$('#TBLDAFTBURUNG_OMSETPAJAK').removeAttr('disabled');
			$('#TBLDAFTBURUNG_OMSETPAJAK').removeAttr('style');
			$('#TBLDAFTBURUNG_OMSETPAJAK').removeAttr('class');
		}

		var setor = eval(pajak+bungarp);

		$('#TBLDAFTBURUNG_PAJAK').val(Math.floor(pajak));
		$('#TBLDAFTBURUNG_RUPIAHSETOR').val(Math.floor(setor));

		setPriceFormat();
	}

	function hitungPajakBulan() {
		var OMZET = toAngka($('#TBLDAFTBURUNG_OMSETPAJAK').val());
		var TARIF = $('#TBLREKENING_PERSEN').val();

		var pajak = eval((OMZET*TARIF)/100);

		bungabln = eval(window.bulanbunga);

		if (bungabln > 0) {
			bungarp = eval(((bungabln*2)/100)* pajak);
			$('#TBLDAFTBURUNG_BUNGASPTPD').val(Math.floor(bungarp));
		}else{
			bungarp = 0;
		}

		if (OMZET!=0) {
			$('#TBLDAFTBURUNG_PENJUALANHARI').attr('disabled', 'disabled');
			$('#TBLDAFTBURUNG_PENJUALANHARI').attr('style', 'background:#e4e4e4');
			$('#TBLDAFTBURUNG_PENJUALANHARI').attr('class', 'input-sm form-control');
		}else{
			$('#TBLDAFTBURUNG_PENJUALANHARI').removeAttr('disabled');
			$('#TBLDAFTBURUNG_PENJUALANHARI').removeAttr('style');
			$('#TBLDAFTBURUNG_PENJUALANHARI').removeAttr('class');
		}

		var setor = eval(pajak+bungarp);

		$('#TBLDAFTBURUNG_PAJAK').val(Math.floor(pajak));
		$('#TBLDAFTBURUNG_RUPIAHSETOR').val(Math.floor(setor));

		setPriceFormat();
	}

	function simpanwalet () {
		if($('#is_tanggal').is(':checked')){
			window.isi_masapajak_tanggal = $('#TBLPENDATAAN_TGLPAJAK').val();
		} else {
			window.isi_masapajak_tanggal = '00';
		}
		$.ajax({
			url: 'pendataan/walet/SimpanWalet',
			type: 'post',
			dataType: "json",
			data:  $("#form-pendataan-walet").serialize()+'&idkecamatan='+window.idkecamatan+'&idkelurahan='+window.idkelurahan+'&isi_masapajak_tanggal='+window.isi_masapajak_tanggal+'&ada_data='+window.ada_data,
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
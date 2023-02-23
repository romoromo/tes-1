<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-red txt-color-white">
			<h4><i class="fa fa-file fa-fw"></i> Enrty Pendataan Pajak Hiburan</h4>
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
										<input type="text" id="TBLDAFTHIBURAN_NOPOK" name="TBLDAFTHIBURAN_NOPOK" placeholder="Ketik Nomor Pokok WP">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Masa Pajak</p>
								</section>
								<section class="col col-md-1">
									<label class="input">
										<input type="number" id="TBLDAFTHIBURAN_THNPAJAK" name="TBLDAFTHIBURAN_THNPAJAK">
									</label>
								</section>
								<section class="col col-md-1">
									<label class="select">
										<select class="" id="TBLDAFTHIBURAN_BLNPAJAK" name="TBLDAFTHIBURAN_BLNPAJAK">
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
									<label class="input">
										<input type="number" id="TBLDAFTHIBURAN_TGLPAJAK" name="TBLDAFTHIBURAN_TGLPAJAK">
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
										<select class="select2" id="TREKENINGSUB_KODE" name="TREKENINGSUB_KODE">
											<option value="">-- Pilih Rekening --</option>
											<?php foreach ($data['rek'] as $list): ?>
												<option value="<?php echo $list['TREKENING_KODE'] ?>">[<?php echo $list['TREKENING_KODE'] ?>] <?php echo $list['TREKENING_NAMA'] ?></option>
											<?php endforeach ?>
											<input type="hidden" id="TREKENINGSUB_TARIF" name="TREKENINGSUB_TARIF">
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
								<section class="col col-md-3">
									<label class="input">
										<span id="TNPWPD_MILIKNAMA"></span>
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Alamat</p>
								</section>
								<section class="col col-md-3">
									<label class="textarea"> 										
										<span id="TNPWPD_MILIKALAMAT"></span>
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
								
								<section class="col col-md-2" style="display: none;">
									<p>Jenis Hiburan</p>
								</section>
								<section class="col col-md-2" style="display: none;">
									<label class="select">
										<select class="select" id="" name="">
											<option value="">-- Pilih Jenis Hiburan --</option>
											<option value="I">I</option>
											<option value="T">T</option>
										</select><i></i>
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
										<input type="text" id="TBLDAFTHIBURAN_TGLSPTPD" name="TBLDAFTHIBURAN_TGLSPTPD" class="datepicker" data-dateformat="dd-mm-yy">
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
										<input type="text" onkeyup="hitungPajakHari()" class="format-rupiah" id="TBLDAFTHIBURAN_PENJUALANHARI" name="TBLDAFTHIBURAN_PENJUALANHARI">
									</label>
								</section>
								<section class="col col-md-2">
									<p>Jumlah Hari</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input type="text" onkeyup="hitungPajakHari()" class="format-ribuan" id="TBLDAFTHIBURAN_JUMLAHHARIJUAL" name="TBLDAFTHIBURAN_JUMLAHHARIJUAL">
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-2">
									<p>Penjualan/ Bulan</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input type="text" onkeyup="hitungPajakBulan()" class="format-rupiah" id="TBLDAFTHIBURAN_OMSETPAJAK" name="TBLDAFTHIBURAN_OMSETPAJAK">
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

							<div class="row">
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
										<input class="form-control format-rupiah" id="TBLDAFTHIBURAN_PAJAK" name="TBLDAFTHIBURAN_PAJAK" type="text">
									</div>
								</section>

								<section class="col col-md-1">
									<p>Bunga SPT</p>
								</section>
								<section class="col col-md-2">
									<div class="input-group">
										<span class="input-group-addon">Rp</span>
										<input class="form-control format-rupiah" id="TBLDAFTHIBURAN_BUNGASPTPD" name="TBLDAFTHIBURAN_BUNGASPTPD" type="text">
									</div>
								</section>

								<section class="col col-md-1">
									<p>Total Setor</p>
								</section>
								<section class="col col-md-2">
									<div class="input-group">
										<span class="input-group-addon">Rp</span>
										<input readonly="readonly" style="background-color: #eeeeee;" class="form-control format-rupiah" id="TBLDAFTHIBURAN_RUPIAHSETOR" name="TBLDAFTHIBURAN_RUPIAHSETOR" type="text">
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
										<input type="text" id="TBLDAFTHIBURAN_TGLBATASSPTPD" name="TBLDAFTHIBURAN_TGLBATASSPTPD" class="datepicker" data-dateformat="dd-mm-yy">
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
										<input type="text" id="TBLDAFTHIBURAN_TGLENTRI" name="TBLDAFTHIBURAN_TGLENTRI" class="datepicker" data-dateformat="dd-mm-yy">
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
											<option value="S" selected="" >S | Self Assesment</option>
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
	            "TBLDAFTHIBURAN_NOPOK" : {
	              required : true
	            }
	          },

	          // Messages for form validation
	          messages : {
	            "TBLDAFTHIBURAN_NOPOK" : {
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

		$('#TBLDAFTHIBURAN_THNPAJAK').val(window.yyyy);
		$('#TBLDAFTHIBURAN_BLNPAJAK').val(window.mm);
		$('#TBLDAFTHIBURAN_TGLPAJAK').val(window.dd);

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
		$('#TBLDAFTHIBURAN_NOPOK').autocomplete({
			serviceUrl: 'pendataan/hiburan/autocompletewphiburan',

			onSelect: function (suggestion) {
		        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
		        window.id = suggestion.data;
		        window.nopokok = suggestion.TNPWPD_NOPOK;
		        window.nama = suggestion.TSUBYEK_MILIKNAMA;
		        window.alamat = suggestion.TSUBYEK_MILIKALAMAT;
		        window.subkoderek = suggestion.TREKENINGSUB_KODE;
		        window.idkecamatan = suggestion.TBLKECAMATAN_ID;
		        window.idkelurahan = suggestion.TBLKELURAHAN_ID;
		        $(this).val(suggestion.value);
		        $('#TBLDAFTHIBURAN_NOPOK').val(suggestion.value.split(' | ')[0]);

		    }
		    ,showNoSuggestionNotice : true
		    ,noCache : true
		    ,noSuggestionNotice : "Tidak ditemukan hasil"
		});
	}

	function cekPernahDaftar() {
		var THNPAJAK = $('#TBLDAFTHIBURAN_THNPAJAK').val();
		var BLNPAJAK = $('#TBLDAFTHIBURAN_BLNPAJAK option:selected').text();
		var TBLDAFTHIBURAN_NOPOK = $('#TBLDAFTHIBURAN_NOPOK').val();
		if (TBLDAFTHIBURAN_NOPOK=='') {
			notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
		}
		else{
			$.ajax({
				url: 'pendataan/hiburan/CekPernahDaftar',
				type: 'POST',
				dataType: 'json',
				data: {
					 nopokok: window.nopokok
					,THNPAJAK: $('#TBLDAFTHIBURAN_THNPAJAK').val()
					,BLNPAJAK: $('#TBLDAFTHIBURAN_BLNPAJAK').val()
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

	function cari() {
		$('#TBLDAFTHIBURAN_PENJUALANHARI').val('');
		$('#TBLDAFTHIBURAN_OMSETPAJAK').val('');
		$('#TBLDAFTHIBURAN_PAJAK').val('');
		$('#TBLDAFTHIBURAN_BUNGASPTPD').val('');
		$('#TBLDAFTHIBURAN_RUPIAHSETOR').val('');
		var TBLDAFTHIBURAN_NOPOK = $('#TBLDAFTHIBURAN_NOPOK').val();
		if (TBLDAFTHIBURAN_NOPOK=='') {
			notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
		}
		else{
			$('#footer-hiburan').hide('fast');
			$("html, body").animate({ scrollTop: 800 }, "slow");
			$("#form-dokumentasi-tanggal").slideDown(600);
			
			$('#form-data-perhitungan').hide('fast');
			$.ajax({
				url: 'pendataan/hiburan/GetWPHiburan',
				type: 'POST',
				dataType: 'json',
				data: {
					 nopokok: window.nopokok
					,THNPAJAK: $('#TBLDAFTHIBURAN_THNPAJAK').val()
					,BLNPAJAK: $('#TBLDAFTHIBURAN_BLNPAJAK').val()
				},
				success: function(respon) {
					$('#TNPWPD_MILIKNAMA').html(window.nama);
					$('#TNPWPD_MILIKALAMAT').html(window.alamat);
					$('#TREKENINGSUB_KODE').select2('val',window.subkoderek);

					//$('#TBLDAFTHIBURAN_TGLSPTPD').val(respon.TBLDAFTHIBURAN_TGLSPTPD+'-'+respon.TBLDAFTHIBURAN_BLNSPTPD+'-20'+respon.TBLDAFTHIBURAN_THNSPTPD);
					
					getTarifRekening(window.subkoderek);
					$('#form-data-perhitungan').show('fast');
					$('#form-dokumentasi-tanggal').show('fast');
					$('#footer-hiburan').show('fast');
					setMasaPajak();
				}
			});
			
		}
		
	}

	function setMasaPajak() {
		$("#TBLDAFTHIBURAN_TGLMULAIJUAL").val('');
		$("#TBLDAFTHIBURAN_TGLAKHIRJUAL").val('');
		thn = $("#TBLDAFTHIBURAN_THNPAJAK").val();
		bln = $("#TBLDAFTHIBURAN_BLNPAJAK").val();
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
			url: 'pendataan/hiburan/GetKodeRek',
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

	function hitungPajakHari() {
		var PENJUALANHARI = toAngka($('#TBLDAFTHIBURAN_PENJUALANHARI').val());
		var TARIF = $('#TREKENINGSUB_TARIF').val();
		var JUMLAHHARI = toAngka($('#TBLDAFTHIBURAN_JUMLAHHARIJUAL').val());
		
		var bulanpilih = parseInt($('#TBLDAFTHIBURAN_BLNPAJAK').val());
		var bulanini = <?= date('m'); ?>;

		bungabln = bulanini-bulanpilih;

		bungarp = 0;
		if (bungabln > 0) {
			bungarp = (2/100) * PENJUALANHARI;
			$('#TBLDAFTHIBURAN_BUNGASPTPD').val(bungarp);
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

		var pajak = (PENJUALANHARI*JUMLAHHARI*TARIF)/100;
		var setor = pajak+bungarp;

		$('#TBLDAFTHIBURAN_PAJAK').val(pajak);
		$('#TBLDAFTHIBURAN_RUPIAHSETOR').val(setor);

		setPriceFormat();
	}

	function hitungPajakBulan() {
		var OMZET = toAngka($('#TBLDAFTHIBURAN_OMSETPAJAK').val());
		var TARIF = $('#TREKENINGSUB_TARIF').val();
		var bulanpilih = parseInt($('#TBLDAFTHIBURAN_BLNPAJAK').val());
		var bulanini = <?= date('m'); ?>;

		var pajak = (OMZET*TARIF)/100;

		bungabln = bulanini-bulanpilih;

		bungarp = 0;
		if (bungabln > 0) {
			bungarp = bungabln*(2/100) * pajak;
			$('#TBLDAFTHIBURAN_BUNGASPTPD').val(bungarp);
		}

		if (OMZET!=0) {
			$('#TBLDAFTHIBURAN_PENJUALANHARI').attr('disabled', 'disabled');
			$('#TBLDAFTHIBURAN_PENJUALANHARI').attr('style', 'background:#e4e4e4');
			$('#TBLDAFTHIBURAN_PENJUALANHARI').attr('class', 'input-sm form-control');
		}else{
			$('#TBLDAFTHIBURAN_PENJUALANHARI').removeAttr('disabled');
			$('#TBLDAFTHIBURAN_PENJUALANHARI').removeAttr('style');
			$('#TBLDAFTHIBURAN_PENJUALANHARI').removeAttr('class');
		}

		var setor = pajak+bungarp;

		$('#TBLDAFTHIBURAN_PAJAK').val(pajak);
		$('#TBLDAFTHIBURAN_RUPIAHSETOR').val(setor);

		setPriceFormat();
	}

	function simpanhiburan () {
		$.ajax({
			url: 'pendataan/hiburan/SimpanHiburan',
			type: 'post',
			dataType: "json",
			data:  $("#form-pendataan-hiburan").serialize()+'&idkecamatan='+window.idkecamatan+'&idkelurahan='+window.idkelurahan,
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
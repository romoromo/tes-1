<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file fa-fw"></i> Entry Pendataan Pajak Air Tanah 2017</h4>
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
					<form class="smart-form" id="form-pendataan-airtanah">
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
										<input type="checkbox" id="cbx_checkbox" name="cbx_checkbox">
										<i></i>
									</label>
								</section>
								
								<section class="col col-md-2">
									<label class="input">
										<input type="number" id="TBLPENDATAAN_TGLPAJAK" name="TBLPENDATAAN_TGLPAJAK">
									</label>
								</section>

								<section class="col col-md-2">
									<button class="btn btn-sm btn-default" type="button" onclick="cekPernahDaftar()" id="tombol_proses">
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
										<select class="select2" id="REKENING_KODE" name="REKENING_KODE" disabled="">
											<option value="">-- Pilih Rekening --</option>
											<?php foreach ($data['rek'] as $list): ?>
												<option value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
											<?php endforeach ?>
											
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
								<section class="col col-md-2">
									<p>Tanggal SPT</p>
								</section>
								<section class="col col-md-2">
									<label class="input">
										<i class="icon-append fa fa-calendar"></i>
										<input type="text" id="TBLDAFTTANAH_TGLSPTPD" value="<?php echo date('d-m-Y'); ?>" name="TBLDAFTTANAH_TGLSPTPD" class="datepicker" data-dateformat="dd-mm-yy">
									</label>
								</section>
							</div>

						</fieldset>

						<fieldset id="form-data-perhitungan" style="display:none;">
							<div class="widget-body">
								<ul id="myTab1" class="nav nav-tabs bordered" style="">
									<li class="active">
										<a href="#s1" data-toggle="tab" ><span class="badge bg-color-blue txt-color-white">1</span>Non PDAM</a>
									</li>
								</ul>

								<div id="myTabContent1" class="tab-content padding-10" style="">
									<div class="tab-pane fade active in" id="s1">
										<div class="row">
											<section class="col col-md-2">
												<p>Volume</p>
											</section>
											<section class="col col-md-2">
												<label class="input">
													<input type="text" name="TBLDAFTTANAH_TOTALVOLUME" id="TBLDAFTTANAH_TOTALVOLUME">
												</label>
											</section>
										</div>
										<div class="row">
											<section class="col col-md-2">
												<p><strong>NPA</strong></p>
											</section>
											<section class="col col-md-2">
												<label class="input">
													<input type="text" class="format-ribuan" name="TBLDAFTTANAH_NILAIAIR1" id="TBLDAFTTANAH_NILAIAIR1">
												</label>
											</section>
										</div>
										<div class="row">
											<section class="col col-md-2">
												<p><strong>Pajak Air Tanah</strong></p>
											</section>
											<section class="col col-md-2">
												<div class="input-group state-success">
													<label class="input">
														<input class="form-control" id="TBLREKENING_PERSEN" name="TBLREKENING_PERSEN" type="text">
													</label>
													<span class="input-group-addon">%</span>
												</div>
											</section>
											<section class="col col-md-1">
												<p><strong>x</strong></p>
											</section>
											<section class="col col-md-1">
												<p><strong>NPA</strong></p>
											</section>
											<section class="col col-md-2">
												<label class="input">
													<input type="text" class="format-ribuan" readonly="readonly" id="TBLDAFTTANAH_NPATARIF" name="TBLDAFTTANAH_NPATARIF">
												</label>
											</section>
										</div>
										<div class="row">
											<section class="col col-md-2">
												<p><strong>Keringanan</strong></p>
											</section>
											<section class="col col-md-2">
												<div class="input-group state-success">
													<label class="input">
														<input readonly="readonly" class="form-control" id="" name="" type="text">
													</label>
													<span class="input-group-addon">%</span>
												</div>
											</section>
										</div>
										<div class="row">
											<section class="col col-md-2">
												<p><strong>Pokok</strong></p>
											</section>
											<section class="col col-md-3">
												<label class="input">
													<input type="text" class="format-rupiah" name="TBLDAFTTANAH_PAJAK" id="TBLDAFTTANAH_PAJAK">
												</label>
											</section>
										</div>
										<div class="row">
											<section class="col col-md-2">
												<p><strong>Denda</strong></p>
											</section>
											<section class="col col-md-3">
												<label class="input">
													<input style="background-color: #d8ddcf;" class="format-rupiah" readonly="readonly" type="text" name="TBLDAFTTANAH_BUNGASPTPD" id="TBLDAFTTANAH_BUNGASPTPD">
												</label>
											</section>
											
											<section class="col col-md">
												<label class="checkbox pull-left">
													<input type="checkbox" id="tanpa_bunga" name="tanpa_bunga">
													<i></i>
												</label>
												<?php /*
												<label class="select">
													<select name="is_nota" id="is_nota" class="select2">
														<option selected="" disabled="">Silahkan Pilih</option>
														<option>N</option>
													</select>
												</label>
												*/ ?>
											</section>
											<section class="col col-md-2">
												<p>Tanpa Denda</p>
											</section>
										</div>
										<div class="row">
											<section class="col col-md-2">
												<p>Total Setor (Rp)</p>
											</section>
											<section class="col col-md-3">
												<label class="input">
													<input type="text" class="format-rupiah" readonly="readonly" style="background-color: #d8ddcf;" name="TBLDAFTTANAH_RUPIAHSETOR" id="TBLDAFTTANAH_RUPIAHSETOR">
												</label>
											</section>
											<section class="col col-md-3">
												<button class="btn btn-sm btn-default" type="button" onclick="hitungpajak()">
													<i class="fa fa-money"></i> Hitung
												</button>
											</section>
										</div>

										<div class="row">
											<section class="col col-md-2">
												<p><strong>Tanggal Awal</strong></p>
											</section>
											<section class="col col-md-3">
												<label class="input">
													<i class="icon-append fa fa-calendar"></i>
													<input type="text" id="TBLDAFTTANAH_TGLMULAIJUAL" name="TBLDAFTTANAH_TGLMULAIJUAL" class="datepicker" data-dateformat="dd-mm-yy">
												</label>
											</section>
											<section class="col col-md-2">
												<p><strong>Tanggal Akhir</strong></p>
											</section>
											<section class="col col-md-3">
												<label class="input">
													<i class="icon-append fa fa-calendar"></i>
													<input type="text" id="TBLDAFTTANAH_TGLAKHIRJUAL" name="TBLDAFTTANAH_TGLAKHIRJUAL" class="datepicker" data-dateformat="dd-mm-yy">
												</label>
											</section>
										</div>
										<div class="row" style="display: none;">
											<section class="col col-md-2">
												<p>Pembukuan</p>
											</section>
											<section class="col col-md-2">
												<label class="select">
													<select id="TBLDAFTTANAH_ISPEMBUKUAN" name="TBLDAFTTANAH_ISPEMBUKUAN">
														<option value="">Silakan Pilih</option>
														<option value="B">B</option>
													</select><i></i>
												</label>
											</section>

											<section class="col col-md-1">
												<p>Kas</p>
											</section>
											<section class="col col-md-2">
												<label class="select">
													<select id="TBLDAFTTANAH_ISKAS" name="TBLDAFTTANAH_ISKAS">
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
													<select id="TBLDAFTTANAH_ISNOTA" name="TBLDAFTTANAH_ISNOTA">
														<option value="">Silakan Pilih</option>
														<option value="N">N</option>
													</select><i></i>
												</label>
											</section>
										</div>
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
												<input type="text" id="TBLDAFTTANAH_TGLTERIMA" name="TBLDAFTTANAH_TGLTERIMA" class="datepicker" data-dateformat="dd-mm-yy">
											</label>
										</section>
									</div>

									<div class="row">
										<section class="col col-md-2">
											<p>Tgl. Batas SPT</p>
										</section>
										<section class="col col-md-3">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input class="form-control datepicker" disabled="disabled" data-dateformat="dd-mm-yy" style="background: #e4e4e4;" type="text" id="TBLDAFTTANAH_TGLBATASSPTPD" name="TBLDAFTTANAH_TGLBATASSPTPD">
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
												<input type="text" id="TBLDAFTTANAH_TGLENTRI" name="TBLDAFTTANAH_TGLENTRI" class="datepicker" data-dateformat="dd-mm-yy">
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
													<option value="S">S | Self Assesment</option>
													<option value="O" selected="">O | Official Assesment</option>
												</select> 
											</label>
										</section>
									</div>
								</fieldset>
								<footer id="footer-pajak-air" style="display: none;">
									<section class="col col-md-2">

									</section>
									<section class="col col-md-2">
										<button id="btnsimpan" class="btn btn-sm btn-primary pull-left" type="submit">
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
	var $FormData = $("#form-pendataan-airtanah").validate({
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
			return simpanairtanah();
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

	nopokok = <?php echo isset($_GET['nopokok']) ? base64_decode($_GET['nopokok']) : '0'?>;
	thnpajak = <?php echo isset($_GET['thnpajak']) ? base64_decode($_GET['thnpajak']) : '0'?>;
	blnpajak = <?php echo isset($_GET['blnpajak']) ? base64_decode($_GET['blnpajak']) : '0'?>;
	tglpajak = <?php echo isset($_GET['tglpajak']) ? base64_decode($_GET['tglpajak']) : '0'?>;
	
	WPAirTanah2(nopokok);
	if(nopokok>0) {$('#TBLDAFTAR_NOPOK').val(nopokok);}
	if(thnpajak>0) {$('#TBLPENDATAAN_THNPAJAK').val('20'+thnpajak);}
	if(blnpajak>0) {$('#TBLPENDATAAN_BLNPAJAK').val(blnpajak);}
	if(tglpajak>0) {$('#TBLPENDATAAN_TGLPAJAK').select2('val', tglpajak);}
	if(nopokok>0 || thnpajak>0 || blnpajak>0 || tglpajak>0){cekPernahDaftar();}
	/*if(window.dd<10) {
	window.dd='0'+window.dd
	} 

	if(window.mm<10) {
	window.mm='0'+window.mm
	} */

	today = window.dd+'-'+window.mm+'-'+window.yyyy;

	$('#TBLPENDATAAN_THNPAJAK').val(window.yyyy);
	$('#TBLPENDATAAN_BLNPAJAK').val(window.mm-1);
	$('#TBLPENDATAAN_TGLPAJAK').val(window.dd);

	$('#TBLDAFTTANAH_TGLTERIMA').val(today);
	$('#TBLDAFTTANAH_TGLBATASSPTPD').val(today);
	$('#TBLDAFTTANAH_TGLENTRI').val(today);

	setPriceFormat();
});

LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
	generateAutocompleteWPAirTanah();
});


function generateAutocompleteWPAirTanah() {
	$('#TBLDAFTAR_NOPOK').autocomplete({
	serviceUrl: '<?= $this->MODULE_URL ?>/autocompletewpairtanah',

	onSelect: function (suggestion) {
		//alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
		window.id = suggestion.data;
		window.nopokok = suggestion.TBLDAFTAR_NOPOK;
		window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
		window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
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

function WPAirTanah2(nopokok) {
	$.ajax({
		url: '<?= $this->MODULE_URL ?>/autocompletewpairtanah2',
		type: 'POST',
		dataType: 'json',
		data: {
			nopokok : nopokok
		},
		success: function(suggestion) {
			window.id = suggestion.data;
			window.nopokok = suggestion.TBLDAFTAR_NOPOK;
			window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
			window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
			window.subkoderek = suggestion.REKENING_KODE;
			window.idkecamatan = suggestion.TBLKECAMATAN_IDBADANUSAHA;
			window.idkelurahan = suggestion.TBLKELURAHAN_IDBADANUSAHA;
		}
	});

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
			url: '<?= $this->MODULE_URL ?>/CekPernahDaftar',
			type: 'POST',
			dataType: 'json',
			data: {
				 nopokok: $('#TBLDAFTAR_NOPOK').val()
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
					$('#TBLDAFTTANAH_TOTALVOLUME').val("");
					$('#TBLDAFTTANAH_NILAIAIR1').val("");
					$('#TBLDAFTTANAH_NPATARIF').val("");
					cari();
				}
			}
		});
	}

}

function cari() {
	$('#TBLDAFTTANAH_PENJUALANHARI').val('');
	$('#TBLDAFTTANAH_OMSETPAJAK').val('');
	$('#TBLDAFTTANAH_PAJAK').val('');
	$('#TBLDAFTTANAH_BUNGASPTPD').val('');
	$('#TBLDAFTTANAH_RUPIAHSETOR').val('');
	$("#btnsimpan").attr('disabled', false);

	var TBLDAFTAR_NOPOK = $('#TBLDAFTAR_NOPOK').val();
	if (TBLDAFTAR_NOPOK=='') {
		notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
	}
	else{
		$('#footer-pajak-air').hide('fast');
		$("html, body").animate({ scrollTop: 800 }, "slow");
		$("#form-dokumentasi-tanggal").slideDown(600);

		$('#form-data-perhitungan').hide('fast');
		$.ajax({
		url: '<?= $this->MODULE_URL ?>/GetWPAirTanah',
		type: 'POST',
		dataType: 'json',
		data: {
			 nopokok: $('#TBLDAFTAR_NOPOK').val()
			,THNPAJAK: $('#TBLPENDATAAN_THNPAJAK').val()
			,BLNPAJAK: $('#TBLPENDATAAN_BLNPAJAK').val()
		},
		success: function(respon) {
			$('#TBLDAFTAR_BADANUSAHANAMA').val(window.nama);
			$('#TBLDAFTAR_BADANUSAHAALAMAT').val(window.alamat);
			$('#REKENING_KODE').select2('val',window.subkoderek);

			//$('#TBLDAFTTANAH_TGLSPTPD').val(respon.TBLDAFTTANAH_TGLSPTPD+'-'+respon.TBLDAFTTANAH_BLNSPTPD+'-20'+respon.TBLDAFTTANAH_THNSPTPD);

			getTarifRekening(window.subkoderek);
			$('#form-data-perhitungan').show('fast');
			$('#form-dokumentasi-tanggal').show('fast');
			$('#footer-pajak-air').show('fast');


			/*---------*/
			if(!respon){
				setMasaPajak();
				return false;
			}
			window.respon = respon;
			exclude = [];
			toDuit = ['TBLDAFTTANAH_NILAIAIR1','TBLDAFTTANAH_NPATARIF','TBLDAFTTANAH_NILAIAIR1','TBLDAFTTANAH_PAJAK','TBLDAFTTANAH_RUPIAHSETOR'];
			$.each(respon, function(index, val) {
				if(!inArray(index,exclude)) {
					$("#"+index).val(respon[index]);
					$("."+index).html(respon[index]);
					$("#"+index).select2('val',respon[index]!="0" ? respon[index] : "");
					$("input[type=radio][value='"+respon[index]+"']."+index).prop('checked', true); //pilih radio button

					if(inArray(index,toDuit)) {
						$("#"+index).val( formatRibuan(parseInt(respon[index])) );
					}
				}
			});
			$("#TBLDAFTTANAH_NILAIAIR1").val( formatRibuan(parseInt(respon['TBLDAFTTANAH_NILAIAIR1'])) );
			$("#TBLDAFTTANAH_NILAIAIR1").trigger('keyup');
			// $("#TBLDAFTTANAH_TGLMULAIJUAL").val( isikiri(respon['TBLDAFTTANAH_TGLMULAIJUAL'], '00') + '-' +isikiri(respon['TBLDAFTTANAH_BLNMULAIJUAL'], '00') + '-' +isikiri(respon['TBLDAFTTANAH_THNMULAIJUAL'], '2000')  );
			// $("#TBLDAFTTANAH_TGLAKHIRJUAL").val( isikiri(respon['TBLDAFTTANAH_TGLAKHIRJUAL'], '00') + '-' +isikiri(respon['TBLDAFTTANAH_BLNAKHIRJUAL'], '00') + '-' +isikiri(respon['TBLDAFTTANAH_THNAKHIRxJUAL'], '2000')  );
			$("#TBLDAFTTANAH_TGLTERIMA").val( isikiri(respon['TBLDAFTTANAH_TGLTERIMA'], '00') + '-' +isikiri(respon['TBLDAFTTANAH_BLNTERIMA'], '00') + '-' +isikiri(respon['TBLDAFTTANAH_THNTERIMA'], '2000')  );
			$("#TBLDAFTTANAH_TGLBATASSPTPD").val( isikiri(respon['TBLDAFTTANAH_TGLBATASSPTPD'], '00') + '-' +isikiri(respon['TBLDAFTTANAH_BLNBATASSPTPD'], '00') + '-' +isikiri(respon['TBLDAFTTANAH_THNBATASSPTPD'], '2000')  );
			$("#TBLDAFTTANAH_TGLENTRI").val( isikiri(respon['TBLDAFTTANAH_TGLENTRI'], '00') + '-' +isikiri(respon['TBLDAFTTANAH_BLNENTRI'], '00') + '-' +isikiri(respon['TBLDAFTTANAH_THNENTRI'], '2000')  );
			$("#TBLDAFTTANAH_TGLSPTPD").val( isikiri(respon['TBLDAFTTANAH_TGLENTRI'], '00') + '-' +isikiri(respon['TBLDAFTTANAH_BLNENTRI'], '00') + '-' +isikiri(respon['TBLDAFTTANAH_THNENTRI'], '2000')  );
			hitungpajak();
			setTimeout(function() {
				hitungpajak();
			}, 1000);
			/*---------*/
			setMasaPajak();
		}
	});

}

}

function setMasaPajak() {
	$("#TBLDAFTTANAH_TGLMULAIJUAL").val('');
	$("#TBLDAFTTANAH_TGLAKHIRJUAL").val('');
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
		$("#TBLDAFTTANAH_TGLMULAIJUAL").val(masapajak.format('L'));
		$("#TBLDAFTTANAH_TGLAKHIRJUAL").val(masapajak.endOf('month').format('L'));
		$("#TBLDAFTTANAH_JUMLAHHARIJUAL").val(masapajak.endOf('month').format('L').split('-')[0]-1);
		// if (c!='') {
		// isSudahPendataan(thn, bln, c);
		// }
	}
}

function getTarifRekening(kodesubrek) {
	$.ajax({
		url: '<?= $this->MODULE_URL ?>/GetKodeRek',
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

function simpanairtanah () {
	$.ajax({
		url: '<?= $this->MODULE_URL ?>/SimpanAirTanah',
		type: 'post',
		dataType: "json",
		data:  $("#form-pendataan-airtanah").serialize()+'&idkecamatan='+window.idkecamatan+'&TBLDAFTTANAH_TGLBATASSPTPD='+$('#TBLDAFTTANAH_TGLBATASSPTPD').val()+'&idkelurahan='+window.idkelurahan+'&ada_data='+window.ada_data,
		success: function(data) {
			if (data.status=="success") {
				$("#btnsimpan").attr('disabled', true);
				notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
				$('#form-data-perhitungan').hide('fast');
				$('#form-dokumentasi-tanggal').hide('fast');
				$('#footer-pajak-air').hide('fast');
			}
			else {
				$("#btnsimpan").attr('disabled', true);
				notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
			}
		}
	});
}

$('#TBLDAFTTANAH_NILAIAIR1').keyup(function() {
	setPriceFormat();
	var NPA = $('#TBLDAFTTANAH_NILAIAIR1').val();
	$('#TBLDAFTTANAH_NPATARIF').val(NPA);
});

function getTglBatas(THNPAJAK,BLNPAJAK,KODEREK) {
	$.ajax({
		url: '<?= $this->MODULE_URL ?>/GetTGLBatas',
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
			$('#TBLDAFTTANAH_TGLBATASSPTPD').val(respon.TGLBATASPAJAK);
		}
	});
	
}

$("#tanpa_bunga").click(function(event) {
	hitungpajak();
});

function hitungpajak() {

	var TARIF = toAngka($('#TBLREKENING_PERSEN').val());
	var NPA = toAngka($('#TBLDAFTTANAH_NILAIAIR1').val());
	var NPATARIF = toAngka($('#TBLDAFTTANAH_NILAIAIR1').val());

	if (NPA=='') {
		notifikasi('Informasi','Mohon isikan Nilai Perolehan Air','failed',1,0);
	}
	else{
		PAJAK = (TARIF/100)*NPATARIF;
		BUNGARP = '';

		if ($('#tanpa_bunga').is(':checked')) {
			BUNGABLN = "";
			BUNGARP = "";
			$('#TBLDAFTTANAH_BUNGASPTPD').val(Math.round(BUNGARP));
		} else {
			BUNGABLN = window.bulanbunga;
		}

		if (BUNGABLN > 0) {
			BUNGARP = ((BUNGABLN*2)/100)* PAJAK;
			$('#TBLDAFTTANAH_BUNGASPTPD').val(Math.round(BUNGARP));
		}

		console.log(PAJAK);
		console.log(BUNGABLN);
		console.log(BUNGARP);

		var TOTALSETOR = PAJAK+BUNGARP;
		
		$('#TBLDAFTTANAH_PAJAK').val(Math.round(PAJAK));
		$('#TBLDAFTTANAH_RUPIAHSETOR').val(Math.round(TOTALSETOR));

		setPriceFormat();
	}
}

<?php $parame = Yii::app()->request->getParam('param'); if (!empty($parame)): 
	$parame = CJSON::decode(base64_decode($parame));
?>
	<?php if (!empty($parame['nopok'])): ?>
		$("#TBLDAFTAR_NOPOK").val('<?= $parame['nopok'] ?>');
		$("#TBLPENDATAAN_THNPAJAK").val('<?= isset($parame['tahun']) ? $parame['tahun'] : '' ?>');
		$("#TBLPENDATAAN_BLNPAJAK").val('<?= isset($parame['bulan']) ? $parame['bulan'] : '' ?>');
		$("#TBLPENDATAAN_TGLPAJAK").val('<?= isset($parame['hari']) ? $parame['hari'] : '' ?>');

		cekPernahDaftar();
	<?php endif ?>
<?php endif ?>
</script>
<style type="text/css">
	input.disabled {
		background: #ccc!important;
	}
</style>
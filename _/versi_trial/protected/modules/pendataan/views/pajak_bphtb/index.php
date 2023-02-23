<?php define('ASSETS_URL', Yii::app()->theme->baseUrl);?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Entry Pendataan SPT BPHTB</h4>
		</div>
	</div>
</div>

<section id="widget-grid" class="">
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
		<div class="jarviswidget jarviswidget-color-teal jarviswidget-sortable" id="widget_pencariandatapajak" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" role="widget" style="">
				<header role="heading">
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Pencarian Data</h2>
				<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
				<div role="content">
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body">
						<form id="form_sumber_pajak" class="smart-form" novalidate="">
							<fieldset>
								<div class="row">
									<section class="col col-md-2">
										<p><strong>No. Pokok WP</strong></p>
									</section>
									<section class="col col-md-5">
										<label class="input">
											<input class="form-control" type="text" id="nomor_pajak" name="nomor_pajak">
										</label>
									</section>						
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Masa Pajak</p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<label class="input">
												<input type="number" value="<?php echo date('Y'); ?>" class="form-control" id="masapajak_tahun" name="masapajak_tahun" />
											</label>
										</label>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" id="masapajak_bulan" name="masapajak_bulan">
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
									<section class="col col-md-1">
										<label class="checkbox pull-right">
											<input type="checkbox" name="is_tanggal" id="is_tanggal">
											<i></i>
										</label>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" id="masapajak_tanggal" name="masapajak_tanggal">
												<?php for ($i=1; $i <32 ; $i++) {  ?>
												<?php if ($i==date('d')): ?>
													<option selected="selected" value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php else: ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php endif ?>
												<?php } ?>
											</select>
										</label>
									</section>
									<section class="col col-md-1">
										<a class="btn btn-sm btn-default" onclick="cari()">
											<i class="fa fa-forward"></i> Proses
										</a>
									</section>			
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Rekening </p>
									</section>
									<section class="col col-md-8">
										<label class="select"> 
											<select class="select2" id="no_subrek" name="no_subrek" disabled="disabled">
													<option value="">== Silahkan Pilih Rekening ==</option>
												<?php foreach ($data['sub_rek'] as $combo_subrek): ?>
													<option value="<?php echo $combo_subrek['TBLREKENING_KODE']; ?>">[<?php echo $combo_subrek['TBLREKENING_KODEFULL']; ?>] <?php echo $combo_subrek['TBLREKENING_NAMAREKENING']; ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
									<section class="col col-md-4" style="display: none;">
										<p id="nama_subrekening" style="font-weight: bolder;"></p>
									</section>
								</div>
								<header>Data Wajib Pajak</header><span>&nbsp;</span>
								<div class="row">
									<section class="col col-md-2">
										<p>Nama</p>
									</section>
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
										<p>No SPT </p>
									</section>
									<section class="col col-md-5">
										<label class="input">
											<input class="input-sm" type="text" id="wp_input_no_spt" name="wp_input_no_spt">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal SPT </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="wp_input_tgl_spt" value="<?php echo date('d-m-Y'); ?>" class="datepicker" data-dateformat="dd-mm-yy" id="wp_input_tgl_spt">
										</label>
									</section>
									<input type="hidden" name="kecamatan_pajak" id="kecamatan_pajak">
									<input type="hidden" name="kelurahan_pajak" id="kelurahan_pajak">
								</div>
							</fieldset>		
							<fieldset id="form_perhitungan" style="display: none;">
								<h4><strong>Data Perhitungan</strong></h4><br>
								<div class="row">
									<section class="col col-md-2">
										<p>No. Obyek Pajak</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm text-align-left" type="text" id="nop" required="" name="nop" data-mask="34.71.999.999.999.9999">
										</label>
									</section>
									<section class="col col-md-2">
										<p>Keringanan</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm text-align-left" type="number" min="1" max="100" value="" id="keringanan" name="keringanan">
										</label>
									</section>
									<section class="col col-md-2">
										<button type="button" id="btndetail" onclick="detail_nop()" class="btn btn-sm btn-primary">
										<i class="fa fa-plus"></i>&nbsp;Detail NOP
										</button>
									
								</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Luas Tanah (Bumi)</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm form-control text-align-left" type="text" id="tanah_luas" name="tanah_luas">
										</label>
									</section>
									<section class="col col-md-2">
										<p>NJOP Tanah</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm form-control format-rupiah text-align-right" type="text" id="tanah_njop" name="tanah_njop">
										</label>
									</section>
									<!-- <section class="col col-md-2">
										<p>Keringanan</p>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input name="hit_keringanan" disabled="disabled" style="background: #e4e4e4;" id="hit_keringanan" type="text" class="input-sm form-control">
										</label>
									</section>
									<section class="col col-md-1">
										<span style="float: left;">%</span>
									</section> -->
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Luas Bangunan</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm form-control text-align-left" type="text" id="bangunan_luas" name="bangunan_luas">
										</label>
									</section>
									<section class="col col-md-2">
										<p>NJOP Bangunan</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm form-control format-rupiah text-align-right" type="text" id="bangunan_njop" name="bangunan_njop">
										</label>
									</section>
								</div>
								<hr>
								<br>
								<div class="row">
									<section class="col col-md-2">
										
									</section>
									<section class="col col-md-3">
										
									</section>
									<section class="col col-md-2">
										<p>NJPBB</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm form-control format-rupiah text-align-right" readonly="" style="background: #e4e4e4;" type="text" id="njpbb" name="njpbb">
										</label>
									</section>
								</div>
								<!-- <div class="row">
									<section class="col col-md-2">
										<p>Include 1/11</p>
									</section>

									<section class="col col-md-2">
										<label class="checkbox pull-left">
											<input type="checkbox" id="including" name="including">
											<i></i>
										</label>
									</section>
								</div> -->

								<div class="row">
									<section class="col col-md-2">
										<p>Nilai Pasar/ Nilai Jual Beli</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm form-control format-rupiah text-align-right" type="text" id="jual" name="jual">
										</label>
									</section>
									<section class="col col-md-2">
										<label class="checkbox pull-left">
											<input type="checkbox" value="T" id="sertifikat" name="sertifikat">
											<i></i>
											<p>Dengan Sertifikat</p>
										</label>
									</section>
								</div>
								
								<div class="row">
									<section class="col col-md-3">
										<p>Jenis Perolehan hak atas tanah dan atau bangunan</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm form-control text-align-left" readonly="" style="background: #e4e4e4;" type="text" id="refbadanusaha_rekjenis" name="refbadanusaha_rekjenis">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Nomor Sertifikat</p>
									</section>
									<section class="col col-md-5">
										<label class="input">
											<input class="input-sm form-control text-align-left" required="" type="text" id="no_sertifikat" name="no_sertifikat">
										</label>
									</section>
								</div>	

								<div class="row">
									<section class="col col-md-1">
										<p>NPOP</p>
									</section>
									<section class="col col-md-1">
										<p style="text-align: right;">=</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm form-control text-align-right format-rupiah" readonly="" style="background: #e4e4e4;" type="text" id="npop" name="npop">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p style="text-align: right;">=</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm form-control text-align-right format-rupiah" readonly="" style="background: #e4e4e4;" type="text" id="npop_2" name="npop_2">
										</label>
									</section>
									<section class="col col-md-1">
										<p>X</p>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input name="persen" id="persen" readonly="" style="background: #e4e4e4;" type="text" class="input-sm form-control">
										</label>
									</section>
									<section class="col col-md-1">
										<span style="text-align:  left;">%</span>
									</section>
								</div>	
								<div class="row">
									<section class="col col-md-1">
										<p>Denda</p>
									</section>
									<section class="col col-md-1">
										<p style="text-align: right;">=</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm form-control text-align-left" type="text" id="denda" name="denda">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-1">
										<p><b>Bayar</b></p>
									</section>
									<section class="col col-md-1">
										<p style="text-align: right;">=</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm form-control text-align-right format-rupiah" readonly="" style="background: #e4e4e4;" type="text" id="bayar" name="bayar">
										</label>
									</section>
								</div>

							
							</fieldset>
							<fieldset id="form_dokumentasi_tanggal" style="display: none;">
								<h4><strong>Dokumentasi Tanggal</strong></h4><br />
								<div class="row">
									<section class="col col-md-2">
										Tgl. Terima SPT 
									</section>
									<section class="col col-md-4">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input class="form-control datepicker" value="<?php echo date('d-m-Y'); ?>" type="text" name="hit_tglterimaspt" data-dateformat="dd-mm-yy" id="hit_tglterimaspt">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										Tgl. Batas SPT 
									</section>
									<section class="col col-md-4">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input class="form-control datepicker" disabled="disabled" style="background: #e4e4e4;" type="text" name="hit_tglbatasspt" data-dateformat="dd-mm-yy" id="hit_tglbatasspt">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										Tgl. Entry SPT 
									</section>
									<section class="col col-md-4">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input class="form-control datepicker" value="<?php echo date('d-m-Y'); ?>" type="text" name="hit_tglentryspt" data-dateformat="dd-mm-yy" id="hit_tglentryspt">
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
							<footer id="footer-hotel" style="display: none;">
								<section class="col col-md-2">
								</section>
								<section class="col col-md-2">
									<a onclick="simpan()" class="btn btn-sm btn-primary pull-left">
										<i class="fa fa-save"></i>&nbsp;Simpan
									</a>
								</section>
							</footer>
						</form>
					</div>
				</div>
			</div>
		</article>
	</div>
	<!-- end row -->
</section>

<div id="dialog-message" title="" align="center" style="width: 300px;">
	<img id="loadinginfo" src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memproses...">
	<p>Mohon tunggu sampai proses transfer selesai</p>
</div>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugin/jquery-priceformat/jquery.price_format.2.0.min.js"></script>
<script type="text/javascript">
	
	window.NPOPTKP = 0;
	pageSetUp();
	setPriceFormat();
	$(document).ready(function() {
		$(window).keydown(function(event){
			if(event.keyCode == 13) {
				event.preventDefault();
				return false;
			}
		});
		reloadDT('dt_basic');
	});
	
	jQuery(document).ready(function($) {
		if ($('#masapajak_bulan').select2('val', '<?php echo date("m")-1 ?>')==0) {
			$('#masapajak_bulan').select2('val', '12');	
		} else {
			$('#masapajak_bulan').select2('val', '<?php echo date("m")-1 ?>');	
		}
		
		nopokok = <?php echo isset($_GET['nopokok']) ? base64_decode($_GET['nopokok']) : '0'?>;
		thnpajak = <?php echo isset($_GET['thnpajak']) ? base64_decode($_GET['thnpajak']) : '0'?>;
		blnpajak = <?php echo isset($_GET['blnpajak']) ? base64_decode($_GET['blnpajak']) : '0'?>;
		tglpajak = <?php echo isset($_GET['tglpajak']) ? base64_decode($_GET['tglpajak']) : '0'?>;
		
		if(nopokok>0) {$('#nomor_pajak').val(nopokok);}
		if(thnpajak>0) {$('#masapajak_tahun').val('20'+thnpajak);}
		if(blnpajak>0) {$('#masapajak_bulan').select2('val', blnpajak);}
		if(tglpajak>0) {$('#masapajak_tanggal').select2('val', tglpajak);}
		if(nopokok>0 || thnpajak>0 || blnpajak>0 || tglpajak>0){cari();}
	});
	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWPHotel();
	});

	$("#dialog-message").dialog({
		autoOpen : false,
		modal : true,
		title: "Memproses Data",
	});

	function loadingTransfer(ev) {
		/*ev{open|close}*/
		$('#dialog-message').dialog(ev);
		$(".ui-dialog-titlebar-close").hide();
	}

	function generateAutocompleteWPHotel() {
		$('#nomor_pajak').autocomplete({
			serviceUrl: 'pendataan/pajak_bphtb/autocompletewp',

			onSelect: function (suggestion) {
		        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
		        window.id = suggestion.data;
		        window.nopokok = suggestion.TBLDAFTAR_NOPOK;
		        window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
		        window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
		        $(this).val(suggestion.value);
		        $('#nomor_pajak').val(suggestion.value.split(' | ')[0]);
		        $('#no_subrek').select2('val', suggestion.REKENING_KODE);

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

	getTglBatas(THNPAJAK,BLNPAJAK,window.subkoderek);

	if (TBLDAFTAR_NOPOK=='') {
		notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
		}
		else{
			$.ajax({
				url: 'pendataan/pajak_bphtb/CekPernahDaftar',
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



	function cari() {
		$('#hit_penjualanhari').val('');
		$('#tanah_luas').val('');
		$('#hit_keringanan').val('');
		$('#hit_pajak').val('');
		$('#hit_bungaspt').val('');
		$('#hit_totalsetor').val('');
		var CARI_NOPOK = $('#nomor_pajak').val();
		if (CARI_NOPOK=='') {
			notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
		}
		else {
			$('#footer-hiburan').hide('fast');
			
			$('#form-data-perhitungan').hide('fast');
			$.ajax({
				url: 'pendataan/pajak_bphtb/getdata',
				type: 'POST',
				dataType: 'json',
				data: {
					nomor_pajak : CARI_NOPOK,
					bulan : $('#masapajak_bulan').select2('val'),
					tahun : $('#masapajak_tahun').val(),
					tgl : ($('#is_tanggal').prop('checked') ? $('#masapajak_tanggal').val() : '')
				},
				success: function(respon) {
					if (respon.data=='ada') {
						if (respon==false) {
							notifikasi('Data yang anda cari tidak ditemukan', 'Data dengan nomor '+$('#nomor_pajak').val()+' Tidak ditemukan', 'failed', 1,0);
						/*} else if(respon.data=='teguran'){
							$.SmartMessageBox({
								title : "Informasi", // judul Smart Alert
								content : "Data dengan Nomor Pokok "+$('#nomor_pajak').val()+", Masa Pajak "+$('#masapajak_bulan').select2('val')+" "+$('#masapajak_tahun').val()+" sudah pernah mendaftar. <br> Apakah anda ingin mengahpus data ini?", // konten dari smart alert
								buttons : '[Tidak][Ya]' // pengaturan tombol
								}, function(ButtonPressed) {
									if (ButtonPressed === "Ya") {
										if (respon.data=='proses selanjutnya') {
											notifikasi('Data sudah diproses ke tahap berikutnya', 'failed', 1,0);
										} else {
											kosongkan_rupiah(respon.TBLDAFTAR_NOPOK,respon.TBLDAFTBPHTB_TGLENTRI);
										}
								}
							});
							return false;*/
						} else {
							if (parseInt(respon.TBLDAFTBPHTB_TGLENTRI)==0) {
								$.SmartMessageBox({
									title : "Informasi Penghapusan Data Teguran", // judul Smart Alert
									content : "Sudah Diterbitkan Teguran, Apakah data ini akan dihapus?", // konten dari smart alert
									buttons : '[Tidak][Ya]' // pengaturan tombol
								}, function(ButtonPressed) {
									if (ButtonPressed === "Ya") {
										$.ajax({
											url: 'pendataan/pajak_bphtb/delt',
											type: 'POST',
											dataType: 'json',
											data: {
												nomor_pajak : CARI_NOPOK,
												bulan : $('#masapajak_bulan').select2('val'),
												tahun : $('#masapajak_tahun').val(),
												tgl : ($('#is_tanggal').prop('checked') ? $('#masapajak_tanggal').val() : '')
											},
										})
										.done(function(respon) {
											if (respon.status=='success') {
												$('#form_perhitungan').hide();
												$('#form_dokumentasi_tanggal').hide();
												notifikasi('Ulangi', 'Mohon isikan pendataan', 'success', 1, 0);
											}
										})
										.fail(function(jqXHR, exception) {
											handelErr(jqXHR, exception);
										})
										.always(function() {
											console.log("complete");
											$('#form_perhitungan').hide();
											$('#form_dokumentasi_tanggal').hide();
											$('#footer-hotel').hide();
											cari();
										});
										
									}
									if (ButtonPressed === "Tidak") {
										console.log("complete");
										$('#form_perhitungan').hide();
										$('#form_dokumentasi_tanggal').hide();
										$('#footer-hotel').hide();
									}
								});
								return false;
							}

							$.SmartMessageBox({
								title : "Informasi", // judul Smart Alert
								content : "Data dengan Nomor Pokok "+$('#nomor_pajak').val()+", Masa Pajak "+$('#masapajak_bulan').select2('val')+" "+$('#masapajak_tahun').val()+" sudah pernah mendaftar. <br> Apakah anda ingin mengubah data ini?", // konten dari smart alert
								buttons : '[Tidak][Ya]' // pengaturan tombol
								}, function(ButtonPressed) {
									if (ButtonPressed === "Ya") {

										if (respon.data=='proses selanjutnya') {
											notifikasi('Data sudah diproses ke tahap berikutnya', 'failed', 1,0);
										} else {
											$('#res_nama_wp').val(respon.TBLDAFTAR_PEMILIKNAMA);
											$('#res_alamat_wp').val(respon.TBLDAFTAR_PEMILIKALAMAT);
											$('#no_subrek').select2('val',respon.REKENING_KODE);
											// $('#nama_subrekening').html(respon.TREKENING_NAMA);
											$('#hit_tglbatasspt').val(respon.TGL_BATAS);
											$('#hit_tanggalawal').val(respon.AWAL_PAJAK);
											$('#hit_tanggalakhir').val(respon.AKHIR_PAJAK);
											$('#hit_jumlahhari').val(respon.JUMLAH_HARI);
											$('#form_perhitungan').show('fast');
											$('#form_dokumentasi_tanggal').show('fast');
											$('#persen_pajak').val(respon.REFBADANUSAHA_PERSEN);
											$('#persen').val(respon.REFBADANUSAHA_PERSEN);
											$('#kecamatan_pajak').val(respon.TBLKECAMATAN_IDBADANUSAHA);
											$('#kelurahan_pajak').val(respon.TBLKELURAHAN_IDBADANUSAHA);

											$('#refbadanusaha_rekpendapatan').val(respon.REFBADANUSAHA_REKPENDAPATAN);
											$('#refbadanusaha_rekpad').val(respon.REFBADANUSAHA_REKPAD);
											$('#refbadanusaha_rekpjk').val(respon.REFBADANUSAHA_REKPJK);
											$('#refbadanusaha_rekayat').val(respon.REFBADANUSAHA_REKAYAT);
											$('#refbadanusaha_rekjenis').val(respon.REFBADANUSAHA_REKJENIS);
											$('#keringanan').val(respon.TBLDAFTBPHTB_PERSENRINGAN);

											var nop = `${respon.TBLDAFTBPHTB_NOP1}.${respon.TBLDAFTBPHTB_NOP2}.${respon.TBLDAFTBPHTB_NOP3}.${respon.TBLDAFTBPHTB_NOP4}.${respon.TBLDAFTBPHTB_NOP5}.${respon.TBLDAFTBPHTB_NOP6}`
											if (respon.TBLDAFTBPHTB_NOP1 == 0) {
												nop = ''
											}
											$('#nop').val(nop);
											$('#tanah_luas').val(respon.TBLDAFTBPHTB_LUASTANAH);
											$('#tanah_njop').val(respon.TBLDAFTBPHTB_NJOPTANAH);
											$('#bangunan_luas').val(respon.TBLDAFTBPHTB_LUASBANGUNAN);
											$('#bangunan_njop').val(respon.TBLDAFTBPHTB_NJOPBANGUNAN);
											$('#jual').val(respon.TBLDAFTBPHTB_NILAIPASAR);
											// $('#bayar').val(respon.TBLDAFTBPHTB_PAJAK);
											$('#no_sertifikat').val(respon.TBLDAFTBPHTB_NOSERTIFIKAT);
											
											// window.NPOPTKP = (respon.NPOPTKP); 
											// hitungPajak() (if exist maka tidak perlu hitung ulang 30-03-2021 rahmat)

											$('#npop').val(respon.TBLDAFTBPHTB_OMSETPAJAK);
											$('#npop_2').val(respon.TBLDAFTBPHTB_OMSETPAJAK);
											$('#bayar').val(respon.TBLDAFTBPHTB_PAJAK);
											$('#njpbb').val(respon.TBLDAFTBPHTB_NILAIJUAL);
											setPriceFormat()

											$('#hit_pajak').val(respon.TBLDAFTBPHTB_PAJAK);
											$('#hit_bungaspt').val(respon.TBLDAFTBPHTB_BUNGASPTPD);

											$('#hit_totalsetor').val(eval(respon.TBLDAFTBPHTB_PAJAK)+eval(respon.TBLDAFTBPHTB_BUNGASPTPD));

											$('#wp_input_tgl_spt').val((respon.TBLDAFTBPHTB_TGLSPTPD)+'-'+(respon.TBLDAFTBPHTB_BLNSPTPD)+'-'+'20'+(respon.TBLDAFTBPHTB_THNSPTPD));
											
											$('#hit_tglterimaspt').val((respon.TBLDAFTBPHTB_TGLTERIMA)+'-'+(respon.TBLDAFTBPHTB_BLNTERIMA)+'-'+'20'+(respon.TBLDAFTBPHTB_THNTERIMA));

											$('#hit_tglbatasspt').val((respon.TBLDAFTBPHTB_TGLBATASSPTPD)+'-'+(respon.TBLDAFTBPHTB_BLNBATASSPTPD)+'-'+'20'+(respon.TBLDAFTBPHTB_THNBATASSPTPD));

											//$('#hit_tglentryspt').val((respon.TBLDAFTBPHTB_TGLENTRI)+'-'+(respon.TBLDAFTBPHTB_BLNENTRI)+'-'+'20'+(respon.TBLDAFTBPHTB_THNENTRI));
											$('#hit_tglentryspt').val('<?php echo date('d-m-Y'); ?>');

											if (respon.TBLDAFTBPHTB_TGLENTRI==0) {
												// jika data teguran tgl terima = hari ini, tgl batas bulan+1
												$('#hit_tglterimaspt').val('<?php echo date('d-m-Y'); ?>');
												$('#hit_tglbatasspt').val(respon.TGL_BATAS);
												$('#wp_input_tgl_spt').val('<?php echo date('d-m-Y'); ?>');
											}
											
											$('#tarif_rekening').val(respon.TREKENING_TARIF);
											window.BULAN_DENDA = respon.BULAN_DENDA;
											window.PERSEN_DENDA = respon.PERSEN_DENDA;
											$('#footer-hotel').show('fast');

											if (respon.hasOwnProperty('tbldaftarnop')) {
												tbldaftarnop = []
												$.each(respon.tbldaftarnop, function(index, rs) {
													tbldaftarnop.push(
													{
														'tbldaftarnop_nop' : rs.TBLDAFTARNOP_NOP,
													})
													localStorage.setItem("tbldaftarnop", JSON.stringify(tbldaftarnop))
												});
											}
											// setPriceFormat();
										}
								}
							});
							return false;

							// notifikasi('Data yang anda cari tidak sudah pernah diinputkan', 'Data dengan nomor '+$('#nomor_pajak').val()+' Sudah Pernah Diinputkan', 'failed', 1,0);
						}
					} else /*if(respon.data=='teguran'){
						if (respon==false) {
							notifikasi('Data yang anda cari tidak ditemukan', 'Data dengan nomor '+$('#nomor_pajak').val()+' Tidak ditemukan', 'failed', 1,0);
						} else {
							$.SmartMessageBox({
								title : "Peringatan", // judul Smart Alert
								content : "Apakah Data Dengan Nomor Pokok "+$('#nomor_pajak').val()+", Masa Pajak "+$('#masapajak_bulan').select2('val')+" "+$('#masapajak_tahun').val()+" akan anda kosongkan ?", // konten dari smart alert
								buttons : '[Tidak][Ya]' // pengaturan tombol
								}, function(ButtonPressed) {
									if (ButtonPressed === "Ya") {
										if (respon.data=='proses selanjutnya') {
											notifikasi('Data sudah diproses ke tahap berikutnya', 'failed', 1,0);
										} else {
											kosongkan_rupiah(respon.TBLDAFTAR_NOPOK,respon.TBLDAFTBPHTB_TGLENTRI);
										}
								}
							});
							return false;

							// notifikasi('Data yang anda cari tidak sudah pernah diinputkan', 'Data dengan nomor '+$('#nomor_pajak').val()+' Sudah Pernah Diinputkan', 'failed', 1,0);
						}
					} else*/ {
						if (respon.data=='proses selanjutnya') {
							// notifikasi('Data sudah di tahap selanjutnya, tidak bisa di edit', 'failed', 0,0);
							notifikasi('Data sudah berada di tahap selanjutnya', 'Data dengan nopok '+$('#nomor_pajak').val()+' Tidak bisa di edit', 'failed', 1,0);
						} else {
							$('#res_nama_wp').val(respon.TBLDAFTAR_PEMILIKNAMA);
							$('#res_alamat_wp').val(respon.TBLDAFTAR_PEMILIKALAMAT);
							$('#no_subrek').select2('val',respon.REKENING_KODE);
							// $('#nama_subrekening').html(respon.TREKENING_NAMA);
							$('#hit_tglbatasspt').val(respon.TGL_BATAS);
							$('#hit_tanggalawal').val(respon.AWAL_PAJAK);
							$('#hit_tanggalakhir').val(respon.AKHIR_PAJAK);
							$('#hit_jumlahhari').val(respon.JUMLAH_HARI);
							$('#form_perhitungan').show('fast');
							$('#form_dokumentasi_tanggal').show('fast');
							$('#persen_pajak').val(respon.TREKENING_TARIF);
							$('#kecamatan_pajak').val(respon.TBLKECAMATAN_IDBADANUSAHA);
							$('#kelurahan_pajak').val(respon.TBLKELURAHAN_IDBADANUSAHA);

							$('#refbadanusaha_rekpendapatan').val(respon.REFBADANUSAHA_REKPENDAPATAN);
							$('#refbadanusaha_rekpad').val(respon.REFBADANUSAHA_REKPAD);
							$('#refbadanusaha_rekpjk').val(respon.REFBADANUSAHA_REKPJK);
							$('#refbadanusaha_rekayat').val(respon.REFBADANUSAHA_REKAYAT);
							$('#refbadanusaha_rekjenis').val(respon.REFBADANUSAHA_REKJENIS);

							$('#persen').val(respon.PCT);
							window.NPOPTKP = (respon.NPOPTKP);
							
							$('#hit_tglentryspt').val('<?php echo date('d-m-Y'); ?>');

							$('#tarif_rekening').val(respon.TREKENING_TARIF);
							window.BULAN_DENDA = respon.BULAN_DENDA;
							window.PERSEN_DENDA = respon.PERSEN_DENDA;
							$('#footer-hotel').show('fast');

						}
					}
				}
			})
			.always(function() {
				$("html, body").animate({ scrollTop: 800 }, "slow");
				$("#r_perhitungan").slideDown(500);
				setTimeout(function() {
					console.log('trigger change')
					$("#nop").trigger('change')
				}, 3000);
			});
			
			
		}
		
	}
	
	function kosongkan_rupiah(NOPOK,TGLENTRI){
		$.ajax({
			url: 'pendataan/pajak_bphtb/kosongkan_rp',
			type: 'POST',
			dataType: 'json',
			data: {
				 NOPOK : NOPOK
				,TGLENTRI : TGLENTRI
			},
			success: function(respon) {
				if(respon.status==failed){
					notifikasi('Gagal','Data gagal dikosongkan', 'failed', 1,0);
				} else {
					notifikasi('Berhasil','Data berhasil dikosongkan', 'success', 0,1);
				}
			}
		});
	}
	
	function getTglBatas(THNPAJAK,BLNPAJAK,KODEREK) {
		$.ajax({
			url: 'pendataan/pajak_bphtb/GetTGLBatas',
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
				$('#hit_tglbatasspt').val(respon.TGLBATASPAJAK);
			}
		});
		
	}

	function simpan() {
		if (!$("form#form_sumber_pajak")[0].checkValidity()) {
			return $("form#form_sumber_pajak")[0].reportValidity()
		}
		var is_lhp = 'F';
		var is_notabil = 'F';
		if ($('#is_lhp').is(':checked')) {
			is_lhp = 'T';
		}
		
		if ($('#is_notabil').is(':checked')) {
			is_notabil = 'T';	
		}

		if($('#is_tanggal').is(':checked')){
			isi_masapajak_tanggal = $('#masapajak_tanggal').select2('val');
		} else {
			isi_masapajak_tanggal = '00';
		}
		var param = {
			bulan_pajak : $('#masapajak_bulan').select2('val'),
			tahun_pajak : $('#masapajak_tahun').val(),
			tanggal_pajak : isi_masapajak_tanggal,
			nopokok : $('#nomor_pajak').val(),
			wp_input_tgl_spt : $('#wp_input_tgl_spt').val(),
			tanah_luas : toAngka($('#tanah_luas').val()),
			hit_tglterimaspt : $('#hit_tglterimaspt').val(),
			hit_tglbatasspt : $('#hit_tglbatasspt').val(),
			hit_tglentryspt : $('#hit_tglentryspt').val(),
			hit_carapenghitungan : $('#hit_carapenghitungan').select2('val'),
			tbldaftarnop : JSON.stringify(tbldaftarnop),
		}
		$.ajax({
			url: 'pendataan/pajak_bphtb/simpandata',
			type: 'POST',
			dataType: 'json',
			data: $("#form_sumber_pajak").serialize()+'&'+$.param(param),
			beforeSend: function() {
				loadingTransfer('open');
			},
			success:function (respon) {
				if (respon.data=='tidak' && respon.status=='success') {
					notifikasi('Sukses','Data Berhasil Disimpan', 'success',0,1);
				} else if (respon.data=='ada' && respon.status=='update') {
					notifikasi('Sukses','Data Berhasil Diperbarui', 'success',0,1);
				} else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
				}
			},
			error: function (jqXHR, exception) {
				handelErr(jqXHR, exception);
			}
		})
		.always(function() {
			loadingTransfer('close');
			console.log("complete");
		});
		
	}
	//perhitungan
	$('#tanah_luas,#tanah_njop,#bangunan_luas,#bangunan_njop,#jual').keyup(function() {
		var penjualanbulan = toAngka($('#tanah_luas').val());
		window.penjualanbulan = penjualanbulan;
		var jumlahhari = $('#hit_jumlahhari').val();
		var tarif = $('#persen_pajak').val();
		if (penjualanbulan!=0) {
			$('#hit_penjualanhari').attr('disabled', 'disabled');
			$('#hit_penjualanhari').attr('style', 'background:#e4e4e4');
		} else {
			// $('#hit_penjualanhari').removeAttr('disabled');
			// $('#hit_penjualanhari').removeAttr('style');
		}
		if (tarif==0) {
			window.pajak = 0;
		} else {
			window.pajak = (penjualanbulan*tarif)/100;
		}
		hitungPajak();
	});

	$("#including, #tanpa_bunga").click(function(event) {
		hitungPajak();
	});

	$("#hit_tglterimaspt").change(function(event) {
		hitungPajak();
	});

	$("#sertifikat").change(function(event) {
		hitungPajak();
	});

	function valNum(num) {
		if (typeof num == 'undefined') {
			return num = 0
		}

		if(isNaN(num)) {
			num = Number(toAngka(num))
		}
		return num
	}

	function hitungPajak() {
		var tanah_luas = valNum($("#tanah_luas").val())
		var tanah_njop = valNum($("#tanah_njop").val())
		var bangunan_luas = valNum($("#bangunan_luas").val())
		var bangunan_njop = valNum($("#bangunan_njop").val())
		var keringanan = valNum($("#keringanan").val())

		var nilai_pasar = valNum($("#jual").val())
		var pct = valNum($("#persen").val())

		var njpbb = (tanah_luas * tanah_njop) + (bangunan_luas * bangunan_njop)
		var npoptkp = window.NPOPTKP
		var npop = 0

		$("#njpbb").val(njpbb)
		if (njpbb > nilai_pasar && !$("#sertifikat").prop('checked')) {
			npop = njpbb - npoptkp
		} else {
			npop = nilai_pasar - npoptkp
		}

		if (npop <= 0) {
			npop = 0
		}

		// 2021-02-26 13:10 di Jogja acuan NPOP dari nilai pasar, miss
		// npop = nilai_pasar

		$("#npop").val( npop )
		$("#npop_2").val( npop )

		if (keringanan != '') {
			ringan = 1-(keringanan/100)
		} else {
			ringan = 1
		}
		console.log(ringan);

		var bayar = (npop * (pct / 100)) * ringan

		$("#bayar").val(Math.round(bayar))

		setPriceFormat()

		var bulannow = <?php echo date('m'); ?>;

		var tglspt = $("#hit_tglterimaspt").val().split("-");
		var tgltgl = new Date(tglspt[2], tglspt[1] - 1, tglspt[0]);
		var tglterimaspt = tgltgl.getMonth()+1;

		var bulanpajak = $('#masapajak_bulan').select2('val') + 1;
		// var bungabln = bulannow-bulanpajak;
		var bungabln = tglterimaspt-bulanpajak;

		if ($('#tanpa_bunga').is(':checked')) {
			if (bungabln>0) {
				window.bunga_spt = window.pajak* (window.PERSEN_DENDA/100);
				// window.bunga_spt = ceiling(window.bunga_spt, 1);
				window.bunga_spt = Math.round(window.bunga_spt);
			} else {
				window.bunga_spt = 0;
			}
		} else {
			window.bunga_spt = window.pajak* (window.PERSEN_DENDA/100);
			// window.bunga_spt = ceiling(window.bunga_spt, 1);
			window.bunga_spt = Math.round(window.bunga_spt);
		}

		// window.pajak = ceiling(window.pajak, 1);

		if ($('#including').is(':checked')) {
			window.pajak = Math.round(window.penjualanbulan/11);
		} else {
			window.pajak = Math.round(window.penjualanbulan/10);
		}

		
		window.totalpajak = window.pajak+window.bunga_spt;
		
		$('#hit_pajak').val(formatRibuan(window.pajak));
		//hitungbunga();
		$('#hit_bungaspt').val(formatRibuan(window.bunga_spt));
		$('#hit_totalsetor').val(formatRibuan(window.totalpajak));
	}


</script>

<?php include_once 'form-detail-nop.php'; ?>
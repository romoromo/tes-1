<?php define('ASSETS_URL', Yii::app()->theme->baseUrl);?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Entry Pendataan Pajak Penerangan Jalan</h4>
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
										<section class="col col-md-5">
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
									<div class="row" style="display:none">
										<section class="col col-md-2">
											<p>Golongan Tarif  </p>
										</section>
										<section class="col col-md-5">
											<label class="select"> 
												<select class="select2" id="jns_pajak" name="jns_pajak" >
													<option value="">== Silahkan Pilih Golongan Tarif ==</option>
													<?php foreach ($data['jns_pajak'] as $jenis): ?>
														<option value="<?php echo $jenis['REFGOLTARIFPJU_TARIF']; ?>" idtarif="<?php echo $jenis['REFGOLTARIFPJU_ID']; ?>"> <?php echo $jenis['REFGOLTARIFPJU_NAMA']; ?></option>
													<?php endforeach ?> 
												</select>
											</label>
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
									</div>
								</fieldset>		
								<fieldset id="form_perhitungan" style="display: none;">
									<h4><strong>Data Perhitungan</strong></h4><br>
									<div class="row">
										<section class="col col-md-2">
											<p>Omzet Industri</p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input  class="input-sm format-rupiah text-align-right" value="0" type="text" id="hit_penjualanhari" name="hit_penjualanhari">
											</label>
										</section>
										<section class="col col-md-2">
											<p>Jumlah Hari</p>
										</section>
										<section class="col col-md-2">
											<label class="input">
												<input class="input-sm text-align-right" type="text" value="30" id="hit_jumlahhari" name="hit_jumlahhari">
												<input class="input-sm" type="hidden" id="persen_pajak" name="persen_pajak">
												<input class="input-sm" type="hidden" id="kecamatan_pajak" name="kecamatan_pajak">
												<input class="input-sm" type="hidden" id="kelurahan_pajak" name="kelurahan_pajak">
												<input class="input-sm" type="hidden" id="tarif_rekening" name="tarif_rekening">

												<input class="input-sm" type="hidden" id="refbadanusaha_rekpendapatan" name="refbadanusaha_rekpendapatan">
												<input class="input-sm" type="hidden" id="refbadanusaha_rekpad" name="refbadanusaha_rekpad">
												<input class="input-sm" type="hidden" id="refbadanusaha_rekpjk" name="refbadanusaha_rekpjk">
												<input class="input-sm" type="hidden" id="refbadanusaha_rekayat" name="refbadanusaha_rekayat">
												<input class="input-sm" type="hidden" id="refbadanusaha_rekjenis" name="refbadanusaha_rekjenis">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>Omzet Non Industri</p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="input-sm form-control format-rupiah text-align-right" value="0" type="text" id="hit_penjualanbulan" name="hit_penjualanbulan">
											</label>
										</section>
										<section class="col col-md-2">
											<p>Keringanan</p>
										</section>
										<section class="col col-md-1">
											<label class="input">
												<input name="hit_keringanan" disabled="disabled" style="background: #e4e4e4;" id="hit_keringanan" type="text" class="input-sm form-control">
											</label>
										</section>
										<section class="col col-md-1">
											<span style="float: left;">%</span>
										</section>
									</div>
									<div class="row" style="display:none">
										<section class="col col-md-2">
											<p>Include 1/11</p>
										</section>

										<section class="col col-md-2">
											<label class="checkbox pull-left">
												<input type="checkbox" id="including" name="including">
												<i></i>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>Tanggal Awal </p>
										</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="hit_tanggalawal" class="datepicker" data-dateformat="dd-mm-yy" id="hit_tanggalawal">
											</label>
										</section>
										<section class="col col-md-2"></section>
										<section class="col col-md-2">
											<p>Tanggal Akhir</p>
										</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="hit_tanggalakhir" class="datepicker" data-dateformat="dd-mm-yy" id="hit_tanggalakhir">
											</label>
										</section>
									</div>

									<div class="row">
										<section class="col col-md-2">
											<p>Pajak Industri </p>
										</section>
										<section class="col col-md-3">
											<label class="input state-success">
												<input class="format-rupiah  valid" name="param[tbltransaksiketetapan_omzetindustri]" id="tbltransaksiketetapan_omzetindustri" readonly="" placeholder="Besar Pajak Industri" aria-invalid="false" type="text">
												<i class="icon-append fa fa-money "></i>
											</label>
										</section>

										<section class="col col-md-1"></section>
										
										<section class="col col-md-2">
											<p>Pajak Non Industri</p>
										</section>
										<section class="col col-md-3">
											<label class="input state-success">
												<input class="format-rupiah valid" name="param[tbltransaksiketetapan_omzetnonindustri]" id="tbltransaksiketetapan_omzetnonindustri" readonly="" placeholder="Besar Pajak Non Industri" aria-invalid="false" type="text">
												<i class="icon-append fa fa-money "></i>
											</label>
										</section>
									</div>	

									<div class="row">
										<section class="col col-md-2">
											<p>Tarif Pajak Industri </p>
										</section>
										<section class="col col-md-3">
											<label class="input">
												<div class="input-group state-success">
													<input readonly="" class="disabled valid" value="3" name="param[tbltransaksiketetapan_tarif]" id="tbltransaksiketetapan_tarif" placeholder="Tarif Pajak" aria-invalid="false" type="text">
													<span class="input-group-addon">%</span>
												</div>
											</label>
										</section>

										<section class="col col-md-1"></section>

										<section class="col col-md-2">
											<p>Tarif Pajak Non Industri </p>
										</section>
										<section class="col col-md-3">
											<label class="input">
												<div class="input-group state-success">
													<input readonly="" class="disabled valid" value="8" name="param[tbltransaksiketetapan_tarifnonid]" id="tbltransaksiketetapan_tarifnonid" placeholder="Tarif Pajak" aria-invalid="false" type="text">
													<span class="input-group-addon">%</span>
												</div>
											</label>
										</section>
									</div>
									

									<div class="row">

										<section class="col col-md-2">
											<p>Tanpa Bunga</p>
										</section>
										<section class="col col-md-2">
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
								</div>
								<div class="row">
									<section class="col col-md-2">
										Pajak
									</section>
									<section class="col col-md-2">
										<label class="input-group"> 
											<span class="input-group-addon">Rp</span>
											<input class="form-control text-align-right format-rupiah" type="text" name="hit_pajak" id="hit_pajak">
										</label>
									</section>
									<section class="col col-md-1">
										Bunga SPT 
									</section>
									<section class="col col-md-2">
										<label class="input-group"> 
											<span class="input-group-addon">Rp</span>
											<input class="form-control text-align-right format-rupiah" type="text" name="hit_bungaspt" id="hit_bungaspt">
										</label>
									</section>
									<section class="col col-md-1">
										Total Setor 
									</section>
									<section class="col col-md-2">
										<label class="input-group"> 
											<span class="input-group-addon">Rp</span>
											<input class="form-control text-align-right format-rupiah" type="text" name="hit_totalsetor" id="hit_totalsetor" disabled="disabled" style="background: #e4e4e4;">
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
	
	
	pageSetUp();
	setPriceFormat();
	$(document).ready(function() {
		$(window).keydown(function(event){
			if(event.keyCode == 13) {
				event.preventDefault();
				return false;
			}
		});
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
		generateAutocompleteWPPPJ();
	});

	$("#dialog-message").dialog({
		autoOpen : false,
		modal : true,
		title: "Mentransfer Data",
	});

	function loadingTransfer(ev) {
		/*ev{open|close}*/
		$('#dialog-message').dialog(ev);
		$(".ui-dialog-titlebar-close").hide();
	}

	function generateAutocompleteWPPPJ() {
		$('#nomor_pajak').autocomplete({
			serviceUrl: 'pendataan/pajakpeneranganjalan/autocompletewpppj',

			onSelect: function (suggestion) {
		        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
		        window.id = suggestion.data;
		        window.nopokok = suggestion.TBLDAFTAR_NOPOK;
		        window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
		        window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
		        $(this).val(suggestion.value);
		        $('#nomor_pajak').val(suggestion.value.split(' | ')[0]);

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
				url: 'pendataan/pajakpeneranganjalan/CekPernahDaftar',
				type: 'POST',
				dataType: 'json',
				data: {
					nopokok: window.nopokok
					,THNPAJAK: $('#masapajak_tahun').val()
					,BLNPAJAK: $('#masapajak_bulan').val()
					,TARIF: $('#jns_pajak').val()
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
		$('#hit_penjualanhari').val(0);
		$('#hit_penjualanbulan').val(0);
		$('#hit_keringanan').val('');
		$('#hit_pajak').val('');
		$('#hit_bungaspt').val('');
		$('#hit_totalsetor').val('');
		var CARI_NOPOK = $('#nomor_pajak').val();
		if (CARI_NOPOK=='') {
			notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
		}
		// var TARIF = $('#jns_pajak').val();
		// if(TARIF==''){
		// 	notifikasi('Informasi','Mohon isikan Golongan Pajak','failed',1,0);
		// }
		else {
			$('#footer-hiburan').hide('fast');
			$("html, body").animate({ scrollTop: 800 }, "slow");
			$("#r_perhitungan").slideDown(500);
			
			$('#form-data-perhitungan').hide('fast');
			$.ajax({
				url: 'pendataan/pajakpeneranganjalan/getdata',
				type: 'POST',
				dataType: 'json',
				data: {
					nomor_pajak : CARI_NOPOK,
					bulan : $('#masapajak_bulan').select2('val'),
					tahun : $('#masapajak_tahun').val(),
					tgl : ($('#is_tanggal').prop('checked') ? $('#masapajak_tanggal').val() : ''),
					persentarif : $('#jns_pajak').val()
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
											kosongkan_rupiah(respon.TBLDAFTAR_NOPOK,respon.TBLDAFTPJU_TGLENTRI);
										}
								}
							});
return false;*/
} else {
	if (parseInt(respon.TBLDAFTPJU_TGLENTRI)==0) {
		$.SmartMessageBox({
									title : "Informasi", // judul Smart Alert
									content : "Apakah data ini akan dihapus?", // konten dari smart alert
									buttons : '[Tidak][Ya]' // pengaturan tombol
								}, function(ButtonPressed) {
									if (ButtonPressed === "Ya") {
										$.ajax({
											url: 'pendataan/pajakpeneranganjalan/delt',
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
										$('#res_nama_wp').val(respon.TBLDAFTAR_BADANUSAHANAMA);
										$('#res_alamat_wp').val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
										$('#no_subrek').select2('val',respon.REKENING_KODE);
											// $('#nama_subrekening').html(respon.TREKENING_NAMA);
											$('#hit_tglbatasspt').val(respon.TGL_BATAS);
											$('#hit_tanggalawal').val(respon.AWAL_PAJAK);
											$('#hit_tanggalakhir').val(respon.AKHIR_PAJAK);
											$('#hit_jumlahhari').val(respon.JUMLAH_HARI);
											$('#form_perhitungan').show('fast');
											$('#form_dokumentasi_tanggal').show('fast');
											$('#persen_pajak').val($("#jns_pajak").select2('val'));
											$('#kecamatan_pajak').val(respon.TBLKECAMATAN_IDBADANUSAHA);
											$('#kelurahan_pajak').val(respon.TBLKELURAHAN_IDBADANUSAHA);

											$('#refbadanusaha_rekpendapatan').val(respon.REFBADANUSAHA_REKPENDAPATAN);
											$('#refbadanusaha_rekpad').val(respon.REFBADANUSAHA_REKPAD);
											$('#refbadanusaha_rekpjk').val(respon.REFBADANUSAHA_REKPJK);
											$('#refbadanusaha_rekayat').val(respon.REFBADANUSAHA_REKAYAT);
											$('#refbadanusaha_rekjenis').val(respon.REFBADANUSAHA_REKJENIS);

											$('#hit_penjualanbulan').val(respon.TBLDAFTPJU_OMSETPAJAK);
											$('#hit_pajak').val(respon.TBLDAFTPJU_PAJAK);
											$('#hit_bungaspt').val(respon.TBLDAFTPJU_BUNGASPTPD);

											$('#hit_totalsetor').val(eval(respon.TBLDAFTPJU_PAJAK)+eval(respon.TBLDAFTPJU_BUNGASPTPD));

											$('#wp_input_tgl_spt').val((respon.TBLDAFTPJU_TGLSPTPD)+'-'+(respon.TBLDAFTPJU_BLNSPTPD)+'-'+'20'+(respon.TBLDAFTPJU_THNSPTPD));
											
											$('#hit_tglterimaspt').val((respon.TBLDAFTPJU_TGLTERIMA)+'-'+(respon.TBLDAFTPJU_BLNTERIMA)+'-'+'20'+(respon.TBLDAFTPJU_THNTERIMA));

											$('#hit_tglbatasspt').val((respon.TBLDAFTPJU_TGLBATASSPTPD)+'-'+(respon.TBLDAFTPJU_BLNBATASSPTPD)+'-'+'20'+(respon.TBLDAFTPJU_THNBATASSPTPD));

											//$('#hit_tglentryspt').val((respon.TBLDAFTPJU_TGLENTRI)+'-'+(respon.TBLDAFTPJU_BLNENTRI)+'-'+'20'+(respon.TBLDAFTPJU_THNENTRI));
											$('#hit_tglentryspt').val('<?php echo date('d-m-Y'); ?>');

											if (respon.TBLDAFTPJU_TGLENTRI==0) {
												// jika data teguran tgl terima = hari ini, tgl batas bulan+1
												$('#hit_tglterimaspt').val('<?php echo date('d-m-Y'); ?>');
												$('#hit_tglbatasspt').val(respon.TGL_BATAS);
												$('#wp_input_tgl_spt').val('<?php echo date('d-m-Y'); ?>');
											}
											
											$('#tarif_rekening').val($("#jns_pajak").select2('val'));
											window.BULAN_DENDA = respon.BULAN_DENDA;
											window.PERSEN_DENDA = respon.PERSEN_DENDA;
											$('#footer-hotel').show('fast');
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
											kosongkan_rupiah(respon.TBLDAFTAR_NOPOK,respon.TBLDAFTPJU_TGLENTRI);
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
							$('#res_nama_wp').val(respon.TBLDAFTAR_BADANUSAHANAMA);
							$('#res_alamat_wp').val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
							$('#no_subrek').select2('val',respon.REKENING_KODE);
							// $('#nama_subrekening').html(respon.TREKENING_NAMA);
							$('#hit_tglbatasspt').val(respon.TGL_BATAS);
							$('#hit_tanggalawal').val(respon.AWAL_PAJAK);
							$('#hit_tanggalakhir').val(respon.AKHIR_PAJAK);
							$('#hit_jumlahhari').val(respon.JUMLAH_HARI);
							$('#form_perhitungan').show('fast');
							$('#form_dokumentasi_tanggal').show('fast');
							$('#persen_pajak').val($("#jns_pajak").select2('val'));
							$('#kecamatan_pajak').val(respon.TBLKECAMATAN_IDBADANUSAHA);
							$('#kelurahan_pajak').val(respon.TBLKELURAHAN_IDBADANUSAHA);

							$('#refbadanusaha_rekpendapatan').val(respon.REFBADANUSAHA_REKPENDAPATAN);
							$('#refbadanusaha_rekpad').val(respon.REFBADANUSAHA_REKPAD);
							$('#refbadanusaha_rekpjk').val(respon.REFBADANUSAHA_REKPJK);
							$('#refbadanusaha_rekayat').val(respon.REFBADANUSAHA_REKAYAT);
							$('#refbadanusaha_rekjenis').val(respon.REFBADANUSAHA_REKJENIS);
							
							$('#hit_tglentryspt').val('<?php echo date('d-m-Y'); ?>');

							$('#tarif_rekening').val($("#jns_pajak").select2('val'));
							window.BULAN_DENDA = respon.BULAN_DENDA;
							window.PERSEN_DENDA = respon.PERSEN_DENDA;
							$('#footer-hotel').show('fast');
						}
					}
				}
			});

}

}

function kosongkan_rupiah(NOPOK,TGLENTRI){
	$.ajax({
		url: 'pendataan/pajakpeneranganjalan/kosongkan_rp',
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
		url: 'pendataan/pajakpeneranganjalan/GetTGLBatas',
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
	$.ajax({
		url: 'pendataan/pajakpeneranganjalan/simpandata',
		type: 'POST',
		dataType: 'json',
		data: {
			bulan_pajak : $('#masapajak_bulan').select2('val'),
			tahun_pajak : $('#masapajak_tahun').val(),
			tanggal_pajak : isi_masapajak_tanggal,
			nopokok : $('#nomor_pajak').val(),
			wp_input_tgl_spt : $('#wp_input_tgl_spt').val(),
			hit_penjualanhari : toAngka($('#hit_penjualanhari').val()),
			hit_jumlahhari : $('#hit_jumlahhari').val(),
			hit_penjualanbulan : toAngka($('#hit_penjualanbulan').val()),
			hit_keringanan : $('#hit_keringanan').val(),
			hit_tanggalawal : $('#hit_tanggalawal').val(),
			hit_tanggalakhir : $('#hit_tanggalakhir').val(),
			hit_pajak : toAngka($('#hit_pajak').val()),
			hit_bungaspt : toAngka($('#hit_bungaspt').val()),
			hit_totalsetor : toAngka($('#hit_totalsetor').val()),
			tbltransaksiketetapan_omzetindustri : toAngka($('#tbltransaksiketetapan_omzetindustri').val()),
			tbltransaksiketetapan_omzetnonindustri : toAngka($('#tbltransaksiketetapan_omzetnonindustri').val()),
			hit_tglterimaspt : $('#hit_tglterimaspt').val(),
			hit_tglbatasspt : $('#hit_tglbatasspt').val(),
			hit_tglentryspt : $('#hit_tglentryspt').val(),
			hit_carapenghitungan : $('#hit_carapenghitungan').select2('val'),
			jns_pajak : $('#jns_pajak').select2('val'),
			kecamatan_pajak : $('#kecamatan_pajak').val(),
			kelurahan_pajak : $('#kelurahan_pajak').val(),

			refbadanusaha_rekpendapatan : $('#refbadanusaha_rekpendapatan').val(),
			refbadanusaha_rekpad : $('#refbadanusaha_rekpad').val(),
			refbadanusaha_rekpjk : $('#refbadanusaha_rekpjk').val(),
			refbadanusaha_rekayat : $('#refbadanusaha_rekayat').val(),
			refbadanusaha_rekjenis : $('#refbadanusaha_rekjenis').val(),

			is_lhp : is_lhp,
			is_notabil : is_notabil,
				//is_kas : $('#is_kas').select2('val'),
				//is_nota : $('#is_nota').select2('val'),
				tarif_rekening : $('#tarif_rekening').val(),
			},
			beforeSend: function() {
				loadingTransfer('open');
			},
			success:function (respon) {
				if (respon.data=='tidak' && respon.status=='success') {
					loadingTransfer('close');
					notifikasi('Sukses','Data Berhasil Disimpan', 'success',0,1);
				} else if (respon.data=='ada' && respon.status=='update') {
					loadingTransfer('close');
					notifikasi('Sukses','Data Berhasil Diperbarui', 'success',0,1);
				} else {
					//loadingTransfer('close');
					notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
				}
			},
			error: function (jqXHR, exception) {
				handelErr(jqXHR, exception);
			}
		});
}
	//perhitungan
	$('#hit_penjualanhari').keyup(function() {
		var penjualanhari = toAngka($('#hit_penjualanhari').val());
		window.penjualanhari = penjualanhari;
		hitungPajak();
	});
	$('#hit_penjualanbulan').keyup(function() {
		var penjualanbulan = toAngka($('#hit_penjualanbulan').val());
		window.penjualanbulan = penjualanbulan;
		hitungPajak();
	});

	$("#including, #tanpa_bunga").click(function(event) {
		hitungPajak();
	});

	$("#hit_tglterimaspt").change(function(event) {
		hitungPajak();
	});

	function hitungPajak(){
		var bulannow = <?php echo date('m'); ?>;
		var tglspt = $("#hit_tglterimaspt").val().split("-");
		var tgltgl = new Date(tglspt[2], tglspt[1] - 1, tglspt[0]);
		var tglterimaspt = tgltgl.getMonth()+1;

		var bulanpajak = $('#masapajak_bulan').select2('val') + 1;
		var bungabln = tglterimaspt-bulanpajak;

		var pajakind = (window.penjualanhari*3)/100;
		var pajaknonind = (window.penjualanbulan*8)/100;
		$('#tbltransaksiketetapan_omzetindustri').val(formatRibuan(pajakind));
		$('#tbltransaksiketetapan_omzetnonindustri').val(formatRibuan(pajaknonind));
		
		var pajaktotal = Math.ceil(pajakind + pajaknonind);
		// var pajaktotal = (pajakind + pajaknonind);
		var bungapajak = (pajaktotal*2)/100;
		var bungaind = (pajakind*2)/100;
		var bungaNonInd = (pajaknonind*2)/100;
		var setorantotalind = (pajakind + bungaind);
		var setorantotalNon = (pajaknonind + bungaNonInd);
		var setorantotal = (pajaktotal + bungapajak);
		var Tanpabunga = 0;
		var setorantotaltnpbng = (pajaktotal + Tanpabunga)

		if (window.penjualanbulan!=0 && window.penjualanhari!=0) {
			$('#hit_pajak').val(formatRibuan(pajaktotal));
			$('#hit_bungaspt').val(formatRibuan(bungapajak));
			$('#hit_totalsetor').val(formatRibuan(setorantotal));
		}
		else if(window.penjualanhari!=0 && window.penjualanbulan==0){
			$('#hit_pajak').val(formatRibuan(pajakind));
			$('#hit_bungaspt').val(formatRibuan(bungaind));
			$('#hit_totalsetor').val(formatRibuan(setorantotalind));
		}
		else if(window.penjualanhari==0 && window.penjualanbulan!=0){
			$('#hit_pajak').val(formatRibuan(pajaknonind));
			$('#hit_bungaspt').val(formatRibuan(bungaNonInd));
			$('#hit_totalsetor').val(formatRibuan(setorantotalNon));
		}

		if ($('#tanpa_bunga').is(':checked')) {
			if(bungabln>0){
				if (window.penjualanbulan!=0 && window.penjualanhari!=0) {
					$('#hit_bungaspt').val(formatRibuan(bungapajak));
				}
				else if(window.penjualanhari!=0 && window.penjualanbulan==0){
					$('#hit_bungaspt').val(formatRibuan(bungaind));
				}
				else if(window.penjualanhari==0 && window.penjualanbulan!=0){
					$('#hit_bungaspt').val(formatRibuan(bungaNonInd));
				}
			} else{

				$('#hit_bungaspt').val(formatRibuan(Tanpabunga));
				$('#hit_totalsetor').val(formatRibuan(setorantotaltnpbng));
			}
		}
		// else{
			
		// }
	}

	function hitungPajakOld() {
		var bulannow = <?php echo date('m'); ?>;
		var tglspt = $("#hit_tglterimaspt").val().split("-");
		var tgltgl = new Date(tglspt[2], tglspt[1] - 1, tglspt[0]);
		var tglterimaspt = tgltgl.getMonth()+1;

		var bulanpajak = $('#masapajak_bulan').select2('val') + 1;
		var bungabln = tglterimaspt-bulanpajak;

		if ($('#tanpa_bunga').is(':checked')) {
			if (bungabln>0) {
				window.bunga_spt = window.pajak* (window.PERSEN_DENDA/100);
				window.bunga_spt = Math.round(window.bunga_spt);
			} else {
				window.bunga_spt = 0;
			}
		} else {
			window.bunga_spt = window.pajak* (window.PERSEN_DENDA/100);
			window.bunga_spt = Math.round(window.bunga_spt);
		}

		window.totalpajak = window.pajak+window.bunga_spt;

		$('#hit_pajak').val(formatRibuan(window.pajak));
		//hitungbunga();
		$('#hit_bungaspt').val(formatRibuan(window.bunga_spt));
		$('#hit_totalsetor').val(formatRibuan(window.totalpajak));
	}

</script>

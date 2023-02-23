<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Entri Setoran Pajak Reklame</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-validasi_penyetoran" 
			data-widget-editbutton="false"
			data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-colorbutton="false"	
			data-widget-togglebutton="false"			
			>
			<header>
				<span class="widget-icon"> <i class="fa fa-search"></i> </span>
				<h2>Validasi Penyetoran</h2>
			</header>
			<div>
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body no-padding">

					<form action="" id="form_sumber_pajak" class="smart-form" novalidate>
						<fieldset>

							<div class="row">
								<section class="col col-md-1">
									<p>Masa Pajak </p>
								</section>
								<section class="col col-md-2">
									<label class="input">
										<input class="input-sm" type="number" value="<?= date('Y') ?>" id="tahunpajak" name="tahunpajak">
									</label>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select class="select2" name="bulanpajak" id="bulanpajak">
											<option value="">= Pilih Bulan =</option>
											<?php for ($i = 1; $i <= 12; $i++): ?>
												<option value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
											<?php endfor ?>
										</select>
									</label>
								</section>
								<section class="col col-md-2">
									<label class="input">
										<input class="input-sm" placeholder="Tanggal" type="number" value="" id="tanggalpajak" name="tanggalpajak">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-1">
									<p>Lokasi</p>
								</section>
								<section class="col col-md-2">
									<label class="input">
										<input class="input-sm" type="text" id="lokasi" name="lokasi">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-1">
									<p>Jenis Setoran </p>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select name="jenis_setoran" id="jenis_setoran" class="select2">
											<option disabled="">== Silahkan Pilih ==</option>
											<option value="SKPD">SKPD</option>
											<option value="STPD">STPD</option>
										</select>
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-1">
									<p>Nomor Pokok</p>
								</section>
								<section class="col col-md-4">
									<label class="input">
										<input class="input-sm" type="text" id="nopok" name="nopok">
									</label>
								</section>
								<section class="col col-md-3">
									<a class="btn btn-sm btn-primary" onclick="cari()">
										Enter <i class="fa fa-forward"></i>
									</a>
								</section>
							</div>
							<header></header><br>
							<div id="id_respencarian">
								<div class="row">
									<section class="col col-md-1">
										<p>Nama</p>
									</section>
									<section class="col col-md-2">
										<span id="TBLDAFTAR_BADANUSAHANAMA"></span>
									</section>
									<section class="col col-md-1">
										<p>No Rekening</p>
									</section>
									<section class="col col-md-2">
										<span id="NOMOR_REKENING"></span>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-1">
										<p>Alamat</p>
									</section>
									<section class="col col-md-2">
										<span id="TBLDAFTAR_BADANUSAHAALAMAT"></span>
									</section>
									<section class="col col-md-1">
										<p>Jenis Pajak</p>
									</section>
									<section class="col col-md-2">
										<span id="TREKENING_NAMA"></span>
									</section>
								</div>
								<div class="row">
									<div class="col-md-6">
										<header>Ketetapan Pajak</header>
										<div  style="padding: 3%;">
											<div class="row">
												<section class="col col-md-2">Tanggal SPT</section>
												<section class="col col-md-4">
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input readonly="" style="background: #eee;" type="text" name="<?php echo $this->namatabel; ?>_TGLSPTPD" class="datepicker form-control" data-dateformat="dd-mm-yy" id="<?php echo $this->namatabel; ?>_TGLSPTPD">
													</label>
												</section>
												<section class="col col-md-1">Batas</section>
												<section class="col col-md-4">
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input readonly="" style="background: #eee;" type="text" name="<?php echo $this->namatabel; ?>_TGLBATASSKPD" class="datepicker form-control" data-dateformat="dd-mm-yy" id="<?php echo $this->namatabel; ?>_TGLBATASSKPD">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Nomor Kohir</section>
												<section class="col col-md-9">
													<label class="input">
														<input class="form-control" style="background: #eee;" id="<?php echo $this->namatabel; ?>_URUTSKPD" readonly="" type="text">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Bunga</section>
												<section class="col col-md-9">
													<label class="input">
														<input class="form-control" style="background: #eee;" id="<?php echo $this->namatabel; ?>_BUNGASPTPD" readonly="" type="text">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Ketetapan</section>
												<section class="col col-md-9">
													<label class="input">
														<input class="form-control" style="background: #eee;" id="<?php echo $this->namatabel; ?>_PAJAK" readonly="" type="text">
													</label>
												</section>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<header>Tagihan Pajak</header>
										<div  style="padding: 3%;">
											<div class="row">
												<section class="col col-md-3">Tanggal STPD</section>
												<section class="col col-md-4">
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input readonly="" type="text" style="background: #eee;" name="request" class="datepicker form-control" data-dateformat="dd-mm-yy" id="<?php echo $this->namatabel; ?>_TGLSURATTAGIHAN">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-3">Nomor STPD</section>
												<section class="col col-md-9">
													<label class="input">
														<input class="form-control" style="background: #eee;" readonly="" type="text" id="<?php echo $this->namatabel; ?>_NOSURATTAGIHAN">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-3">Bunga</section>
												<section class="col col-md-9">
													<label class="input">
														<input class="form-control" style="background: #eee;" readonly="" id="<?php echo $this->namatabel; ?>_BUNGATAGIHAN" type="text">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-3">Denda</section>
												<section class="col col-md-9">
													<label class="input">
														<input class="form-control" style="background: #eee;" readonly="" type="text" id="<?php echo $this->namatabel; ?>_DENDATAGIHAN">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-3">Tagihan Pajak</section>
												<section class="col col-md-9">
													<label class="input">	
														<input class="form-control" style="background: #eee;" readonly="" type="text" id="<?php echo $this->namatabel; ?>_RUPIAHTAGIHAN">
													</label>
												</section>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<header>Setoran Pajak</header>
										<div  style="padding: 3%;">
											<div class="row">
												<section class="col col-md-2">Tempat Setor</section>
												<section class="col col-md-4">
													<label class="input">
														<input type="text" style="background: #eee;" class="form-control" readonly="" id="<?php echo $this->namatabel; ?>_TIPESETOR">
													</label>
												</section>
												<section class="col col-md-6">B=BKP, K=KAS DAERAH</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Tanggal Setor</section>
												<section class="col col-md-4">
													<label class="input">
														<input class="form-control" id="<?php echo $this->namatabel; ?>_TANGGALSETOR" readonly="" style="background: #eee;" type="text">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Bunga</section>
												<section class="col col-md-10">
													<label class="input">	
														<input class="form-control" style="background: #eee;" readonly="" id="bungasetor"  type="text">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Denda</section>
												<section class="col col-md-10">
													<label class="input" >
														<input class="form-control format-rupiah-desimal" style="background: #eee;" readonly="" id="dendasetor" type="text">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Pajak</section>
												<section class="col col-md-10">
													<label class="input">
														<input class="form-control" style="background: #eee;" readonly="" id="pajaksetor" type="text">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Total Setoran</section>
												<section class="col col-md-10">
													<label class="input">
														<input style="background: #eee;" readonly="" class="form-control  format-rupiah-desimal" id="totalsetor" type="text">
													</label>
												</section>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<header>Tagihan Kekurangan Pajak</header>
										<div  style="padding: 3%;">
											<div class="row">
												<section class="col col-md-3">Tanggal SKPDKB</section>
												<section class="col col-md-3">
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input style="background: #eee;" readonly="" type="text" name="request" class="datepicker form-control" data-dateformat="dd-mm-yy" id="<?php echo $this->namatabel; ?>_TGLKURANGBAYAR">
													</label>
												</section>
												<section class="col col-md-3">Tanggal Batas SKPDKB</section>
												<section class="col col-md-3">
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input style="background: #eee;" readonly="" type="text" name="request" class="datepicker form-control" data-dateformat="dd-mm-yy" id="<?php echo $this->namatabel; ?>_TGLBTSKRGBAYAR">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-3">Nomor SKPDKB</section>
												<section class="col col-md-9">
													<label class="input-sm">	
														<input style="background: #eee;" class="form-control" readonly="" type="text" id="<?php echo $this->namatabel; ?>_REGKURANGBAYAR">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-3">Bunga</section>
												<section class="col col-md-9">
													<label class="input">
														<input style="background: #eee;" class="form-control" readonly="" type="text" id="<?php echo $this->namatabel; ?>_BUNGAKRGBAYAR">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-3">Denda</section>
												<section class="col col-md-9">
													<label class="input">
														<input style="background: #eee;" class="form-control" readonly="" type="text" id="<?php echo $this->namatabel; ?>_DENDAKRGBAYAR">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-3">Tagihan Pajak</section>
												<section class="col col-md-9">
													<label class="input">
														<input style="background: #eee;" class="form-control" readonly="" type="text" id="<?php echo $this->namatabel; ?>_RUPIAHKRGBAYAR">
													</label>
												</section>
											</div>
										</div>
									</div>
									<div class="col col-md-12">
										<div class="row">
											<section class="col col-md-1">Nomor SSPD</section>
											<section class="col col-md-2">
												<label class="input">
													<input class="form-control" id="NOMOR_SSPD" name="NOMOR_SSPD" type="text">
												</label>
											</section>
											<section class="col col-md-1">Nomor SSPDS STP</section>
											<section class="col col-md-2">
												<label class="input">
													<input class="form-control" id="NOMOR_SSPDSSTP" name="NOMOR_SSPDSSTP" type="text">
												</label>
											</section>
											<section class="col col-md-1">Nomor SSPD KB</section>
											<section class="col col-md-2">
												<label class="input">
													<input class="form-control" id="NOMOR_SSPDKB" name="NOMOR_SSPDKB" type="text">
												</label>
											</section>
										</div>
										<div class="row">
											<section class="col col-md-1">Tanggal Entry</section>
											<section class="col col-md-4">
												<label class="input"> <i class="icon-append fa fa-calendar"></i>
													<input type="text" class="datepicker" value="<?php echo date('d-m-Y'); ?>" data-dateformat="dd-mm-yy" id="TANGGAL_ENTRY" name="TANGGAL_ENTRY">
												</label>
											</section>
										</div>
										<div class="row">
											<section class="col col-md-1">Tanggal Hitungan Denda</section>
											<section class="col col-md-4">
												<label class="input"> <i class="icon-append fa fa-calendar"></i>
													<input value="<?php echo date('d-m-Y'); ?>" type="text" class="datepicker" data-dateformat="dd-mm-yy" id="TANGGAL_HITUNGAN_DENDA" name="TANGGAL_HITUNGAN_DENDA">
												</label>
											</section>
											<section class="col col-md-4">
												
													<button type="button"  id="btnCetakSSPD" class="btn btn-default btn-sm" onclick="cetakSSPD()"><i class="fa fa-print"></i> Cetak Ulang SSPD</button>
												
											</section>
										</div>
									</div>
								</div>
							</div>
						</fieldset>		
						<footer id="footer_simpandata">
							<a id="btnSimpan" onclick="simpan()" href="javascript:void(0)" class="btn btn-sm btn-primary" style="float: left;">
								<i class="fa fa-save"></i> Simpan
							</a>
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
<!-- end row -->

</section>


<script type="text/javascript">
	pageSetUp();
	// setPriceFormat();

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWPHotel();
	});

	function generateAutocompleteWPHotel() {
		$('#nopok').autocomplete({
			serviceUrl: 'penyetoran/entripajakreklame/autocomplete',

			onSelect: function (suggestion) {
		        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
		        window.id = suggestion.data;
		        window.nopokok = suggestion.TBLDAFTAR_NOPOK;
		        window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
		        window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
		        $(this).val(suggestion.value);
		        $('#nopok').val(suggestion.value.split(' | ')[0]);

		    }
		    ,showNoSuggestionNotice : true
		    ,noCache : true
		    ,noSuggestionNotice : "Tidak ditemukan hasil"
		});
	}

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
		$('#id_respencarian').hide();
		$('#footer_simpandata').hide();
	});

	function cari() {
		$("#id_respencarian input").val('');
		$("#btnCetakSSPD").hide();
		$.ajax({
			url: 'penyetoran/entripajakreklame/getdata',
			type: 'POST',
			dataType: 'json',
			data: {
				tahun : $('#tahunpajak').val(),
				bln : $('#bulanpajak').val(),
				tgl : $('#tanggalpajak').val(),
				lokasi : $('#lokasi').val(),
				jenis_setoran : $('#jenis_setoran').select2('val'),
				nopok : $('#nopok').val(),
			},
			success:function (respon) {
				if (respon.data.validate=='kurang') {
					notifikasi('Silahkan isikan data dengan lengkap', 'Periksa kembali isian data dan klik cari', 'fail', 1,0);
				}else if (!respon.model.TBLPENDATAAN_THNPAJAK) {
					notifikasi('Data tidak ditemukan', 'data dengan nomor pokok '+$('#nopok').val()+' tidak ditemukan', 'fail', 1,0);
				}else{
					$('#TBLDAFTAR_BADANUSAHANAMA').html(respon.model.TBLDAFTAR_BADANUSAHANAMA);
					$('#NOMOR_REKENING').html('1.20.1.20.26.0.0.'+respon.model.<?php echo $this->namatabel; ?>_REKPENDAPATAN+'.'+respon.model.<?php echo $this->namatabel; ?>_REKPAD+'.'+respon.model.<?php echo $this->namatabel; ?>_REKPAJAK+'.'+respon.model.<?php echo $this->namatabel; ?>_REKAYAT+'.'+respon.model.<?php echo $this->namatabel; ?>_REKJENIS+'.0');
					$('#TBLDAFTAR_BADANUSAHAALAMAT').html(respon.model.TBLDAFTAR_BADANUSAHAALAMAT);

					getrekening(respon.model.TREKENING_NAMA);

					if(respon.model.<?php echo $this->namatabel; ?>_THNSPTPD) {
						var tahunthnsptpd = respon.model.<?php echo $this->namatabel; ?>_THNSPTPD;
						var bulansptpd = respon.model.<?php echo $this->namatabel; ?>_BLNSPTPD;
						if(tahunthnsptpd.length==1) {
							var viewtahunthnsptpd = '200'+tahunthnsptpd;
						} else {
							var viewtahunthnsptpd = '20'+tahunthnsptpd;
						}
						if(bulansptpd.length==1) {
							var viewbulansptpd = '0'+bulansptpd;
						} else {
							var viewbulansptpd = bulansptpd;
						}					
						$('#<?php echo $this->namatabel; ?>_TGLSPTPD').val(respon.model.<?php echo $this->namatabel; ?>_TGLSPTPD+'-'+bulansptpd+'-'+viewtahunthnsptpd);
					} else {
						$('#<?php echo $this->namatabel; ?>_TGLSPTPD').val('');
					}

					if(respon.model.<?php echo $this->namatabel; ?>_THNBATASSPTPD) {
						var tahunbatassptpd = respon.model.<?php echo $this->namatabel; ?>_THNBATASSKPD;
						var bulanbatassptpd = respon.model.<?php echo $this->namatabel; ?>_BLNBATASSKPD;
						var TGLBATASSKPD = respon.model.<?php echo $this->namatabel; ?>_TGLBATASSKPD;
						if(tahunbatassptpd.length==1) {
							var viewtahunbatassptpd = '200'+tahunbatassptpd;
						} else {
							var viewtahunbatassptpd = '20'+tahunbatassptpd;
						}
						if(TGLBATASSKPD.length==1){
							var viewtglbatasskpd = '0'+TGLBATASSKPD;
						}
						else{
							var viewtglbatasskpd = TGLBATASSKPD;
						}
						if(bulanbatassptpd.length==1) {
							var viewbulanbatassptpd = '0'+bulanbatassptpd;
						} else {
							var viewbulanbatassptpd = bulanbatassptpd;
						}					
						$('#<?php echo $this->namatabel; ?>_TGLBATASSKPD').val(viewtglbatasskpd+'-'+viewbulanbatassptpd+'-'+viewtahunbatassptpd);
					} else {
						$('#<?php echo $this->namatabel; ?>_TGLBATASSKPD').val('');
					}

					$('#<?php echo $this->namatabel; ?>_URUTSKPD').val(respon.model.<?php echo $this->namatabel; ?>_URUTSKPD);
					if(respon.model.<?php echo $this->namatabel; ?>_BUNGASPTPD) {
						$('#<?php echo $this->namatabel; ?>_BUNGASPTPD').val(toRp(respon.model.<?php echo $this->namatabel; ?>_BUNGASPTPD));
					}
					if(respon.model.<?php echo $this->namatabel; ?>_PAJAKSKPD) {
						$('#<?php echo $this->namatabel; ?>_PAJAK').val(toRp(respon.model.<?php echo $this->namatabel; ?>_PAJAKSKPD));
					}
					if(respon.model.<?php echo $this->namatabel; ?>_THNSURATTAGIHAN) {
						var tahunsurattagihan = respon.model.<?php echo $this->namatabel; ?>_THNSURATTAGIHAN;
						var bulansurattagihan = respon.model.<?php echo $this->namatabel; ?>_BLNSURATTAGIHAN;
						if(tahunsurattagihan.length==1) {
							var viewtahunsurattagihan = '200'+tahunsurattagihan;
						} else {
							var viewtahunsurattagihan = '20'+tahunsurattagihan;
						}
						if(bulansurattagihan.length==1) {
							var viewbulansurattagihan = '0'+bulansurattagihan;
						} else {
							var viewbulansurattagihan = bulansurattagihan;
						}					
						$('#<?php echo $this->namatabel; ?>_TGLSURATTAGIHAN').val(respon.model.<?php echo $this->namatabel; ?>_TGLSURATTAGIHAN+'-'+viewbulansurattagihan+'-'+viewtahunsurattagihan);
					} else {
						$('#<?php echo $this->namatabel; ?>_TGLSURATTAGIHAN').val('');
					}


					$('#<?php echo $this->namatabel; ?>_NOSURATTAGIHAN').val(respon.model.<?php echo $this->namatabel; ?>_NOSURATTAGIHAN);
					if(respon.model.<?php echo $this->namatabel; ?>_BUNGATAGIHAN) {
						$('#<?php echo $this->namatabel; ?>_BUNGATAGIHAN').val(toRp(respon.model.<?php echo $this->namatabel; ?>_BUNGATAGIHAN));
					}
					if(respon.model.<?php echo $this->namatabel; ?>_DENDATAGIHAN) {
						$('#<?php echo $this->namatabel; ?>_DENDATAGIHAN').val(toRp(respon.model.<?php echo $this->namatabel; ?>_DENDATAGIHAN));
					}
					if(respon.model.<?php echo $this->namatabel; ?>_RUPIAHTAGIHAN) {
						$('#<?php echo $this->namatabel; ?>_RUPIAHTAGIHAN').val(toRp(respon.model.<?php echo $this->namatabel; ?>_RUPIAHTAGIHAN));
					}

					$('#<?php echo $this->namatabel; ?>_TIPESETOR').val(respon.model.<?php echo $this->namatabel; ?>_TIPESETOR);

	
					$('#<?php echo $this->namatabel; ?>_TANGGALSETOR').val('<?= date('d-m-Y') ?>');
					
					
					$('#bungasetor').val(toRp(respon.model.BUNGASETOR));
					$('#dendasetor').val(toRp(respon.model.DENDASETOR));
					$('#pajaksetor').val(toRp(respon.model.PAJAKSETOR));
					$('#totalsetor').val(toRp(respon.model.TOTALSETOR));

					$('#TANGGAL_ENTRY').val('<?= date('d-m-Y') ?>');
					$('#TANGGAL_HITUNGAN_DENDA').val('<?= date('d-m-Y') ?>');

					if(respon.model.<?php echo $this->namatabel; ?>_THNKURANGBAYAR) {
						var tahunkurangbayar = respon.model.<?php echo $this->namatabel; ?>_THNKURANGBAYAR;
						var bulankurangbayar = respon.model.<?php echo $this->namatabel; ?>_BLNKURANGBAYAR;
						var tahunbataskurangbayar = respon.model.<?php echo $this->namatabel; ?>_THNBTSKRGBAYAR;
						var bulanbataskurangbayar = respon.model.<?php echo $this->namatabel; ?>_BLNBTSKRGBAYAR;
						/*if(tahunkurangbayar.length==1) {
							var viewtahunkurangbayar = '200'+tahunkurangbayar;
						} else {
							var viewtahunkurangbayar = '20'+tahunkurangbayar;
						}*/
						viewtahunkurangbayar = isikiri(tahunkurangbayar, "2000");
						/*if(bulankurangbayar.length==1) {
							var viewbulankurangbayar = '0'+bulankurangbayar;
						} else {
							var viewbulankurangbayar = bulankurangbayar;
						}*/
						viewbulankurangbayar = isikiri(bulankurangbayar, "00");

						viewtahunbataskurangbayar = isikiri(tahunbataskurangbayar, "2000");
						viewbulanbataskurangbayar = isikiri(bulanbataskurangbayar, "00");
						$('#<?php echo $this->namatabel; ?>_TGLKURANGBAYAR').val(respon.model.<?php echo $this->namatabel; ?>_TGLKURANGBAYAR+'-'+viewbulankurangbayar+'-'+viewtahunkurangbayar);
						$('#<?php echo $this->namatabel; ?>_TGLBTSKRGBAYAR').val(respon.model.<?php echo $this->namatabel; ?>_TGLBTSKRGBAYAR+'-'+viewbulanbataskurangbayar+'-'+viewtahunbataskurangbayar);
					} else {
						$('#<?php echo $this->namatabel; ?>_TGLKURANGBAYAR').val('');
						$('#<?php echo $this->namatabel; ?>_TGLBTSKRGBAYAR').val('');
					}


					$('#<?php echo $this->namatabel; ?>_REGKURANGBAYAR').val(respon.model.<?php echo $this->namatabel; ?>_REGKURANGBAYAR);
					if(respon.model.<?php echo $this->namatabel; ?>_BUNGAKRGBAYAR) {
						$('#<?php echo $this->namatabel; ?>_BUNGAKRGBAYAR').val(toRp(respon.model.<?php echo $this->namatabel; ?>_BUNGAKRGBAYAR));
					}
					if(respon.model.<?php echo $this->namatabel; ?>_DENDAKRGBAYAR) {
						$('#<?php echo $this->namatabel; ?>_DENDAKRGBAYAR').val(toRp(respon.model.<?php echo $this->namatabel; ?>_DENDAKRGBAYAR));
					}
					if(respon.model.<?php echo $this->namatabel; ?>_RUPIAHKRGBAYAR) {
						$('#<?php echo $this->namatabel; ?>_RUPIAHKRGBAYAR').val(toRp(respon.model.<?php echo $this->namatabel; ?>_RUPIAHKRGBAYAR));
					}

					$('#id_respencarian').show('fast');

					if (respon.data.existbpd=='tidak' && respon.data.exist=='ada') {
						notifikasi('Bukan pembayaran tunai', 'data SSPD dengan nomor pokok '+$('#nopok').val()+' dibayarkan non-tunai', 'fail', 1,0);
						$('#footer_simpandata').hide('fast');
						$("#btnCetakSSPD").hide();
					}else if (respon.data.exist=='ada') {
						
						notifikasi('Data SSPD diinputkan', 'data SSPD dengan nomor pokok '+$('#nopok').val()+' sudah diinputkan', 'fail', 1,0);
						$('#NOMOR_SSPD').attr('disabled', 'disabled');
						$('#NOMOR_SSPD').attr('style', 'background:#eee');
						$('#NOMOR_SSPD').val(respon.model.<?php echo $this->namatabel; ?>_REGSETOR);
						$('#NOMOR_SSPDSSTP').attr('disabled', 'disabled');
						$('#NOMOR_SSPDSSTP').attr('style', 'background:#eee');
						//$('#NOMOR_SSPDSSTP').val(respon.model.<?php echo $this->namatabel; ?>_REGTAGIHAN);
						$('#NOMOR_SSPDKB').attr('disabled', 'disabled');
						$('#NOMOR_SSPDKB').attr('style', 'background:#eee');
						//$('#NOMOR_SSPDKB').val(respon.model.<?php echo $this->namatabel; ?>_SSPDKURANGBAYAR);
						$('#TANGGAL_ENTRY').attr('disabled', 'disabled');
						$('#TANGGAL_ENTRY').attr('style', 'background:#eee');

						// if(respon.model.<?php echo $this->namatabel; ?>_THNENTRISETOR) {
						// 	$('#<?php echo $this->namatabel; ?>_TANGGALSETOR, #TANGGAL_ENTRY').val(respon.model.<?php echo $this->namatabel; ?>_TANGGALSETOR+'-'+viewbulansetor+'-'+viewtahunsetor);
						// } else {
						// 	$('#TANGGAL_ENTRY').val('');
						// }

						// var jns_setoran = $('#jenis_setoran').select2('val');
						// if (jns_setoran=='SKPD' || jns_setoran=='SKPDKB') {
						// 	kolomtglbatas = jns_setoran=='SKPDKB' ? 'TGLBTSKRGBAYAR' : 'TGLBATASSPTPD';
						// 	window.BULAN_DENDA = getBulanDenda(convDate($("#<?= $this->namatabel ?>_"+kolomtglbatas).val()), '<?= date('Y-m-d') ?>');
						// 	if (BULAN_DENDA <= 0) {
						// 		$('#TANGGAL_HITUNGAN_DENDA').attr('disabled', 'disabled');
						// 		$('#TANGGAL_HITUNGAN_DENDA').attr('style', 'background:#eee');
						// 	}
						// }

						$('#footer_simpandata').hide('fast');
						$("#btnCetakSSPD").show();
					} else if (respon.data.existbpd=='ada') {

						notifikasi('Data SSPD diinputkan', 'data SSPD dengan nomor pokok '+$('#nopok').val()+' sudah diinputkan', 'fail', 1,0);
						$('#NOMOR_SSPD').attr('disabled', 'disabled');
						$('#NOMOR_SSPD').attr('style', 'background:#eee');
						$('#NOMOR_SSPD').val(respon.model.<?php echo $this->namatabel; ?>_REGSETOR);
						$('#NOMOR_SSPDSSTP').attr('disabled', 'disabled');
						$('#NOMOR_SSPDSSTP').attr('style', 'background:#eee');
						//$('#NOMOR_SSPDSSTP').val(respon.model.<?php echo $this->namatabel; ?>_REGTAGIHAN);
						$('#NOMOR_SSPDKB').attr('disabled', 'disabled');
						$('#NOMOR_SSPDKB').attr('style', 'background:#eee');
						//$('#NOMOR_SSPDKB').val(respon.model.<?php echo $this->namatabel; ?>_SSPDKURANGBAYAR);
						$('#TANGGAL_ENTRY').attr('disabled', 'disabled');
						$('#TANGGAL_ENTRY').attr('style', 'background:#eee');

						// if(respon.model.<?php echo $this->namatabel; ?>_THNENTRISETOR) {
						// 	$('#<?php echo $this->namatabel; ?>_TANGGALSETOR, #TANGGAL_ENTRY').val(respon.model.<?php echo $this->namatabel; ?>_TANGGALSETOR+'-'+viewbulansetor+'-'+viewtahunsetor);
						// } else {
						// 	$('#TANGGAL_ENTRY').val('');
						// }

						var jns_setoran = $('#jenis_setoran').select2('val');
						if (jns_setoran=='SKPD' || jns_setoran=='SKPDKB') {
							kolomtglbatas = jns_setoran=='SKPDKB' ? 'TGLBTSKRGBAYAR' : 'TGLBATASSPTPD';
							window.BULAN_DENDA = getBulanDenda(convDate($("#<?= $this->namatabel ?>_"+kolomtglbatas).val()), '<?= date('Y-m-d') ?>');
							if (BULAN_DENDA <= 0) {
								$('#TANGGAL_HITUNGAN_DENDA').attr('disabled', 'disabled');
								$('#TANGGAL_HITUNGAN_DENDA').attr('style', 'background:#eee');
							}
						}

						$('#footer_simpandata').hide('fast');
						$("#btnCetakSSPD").show();
					}else{
						$('#NOMOR_SSPD').removeAttr('disabled');
						$('#NOMOR_SSPD').removeAttr('style');
						$('#NOMOR_SSPDSSTP').removeAttr('disabled');
						$('#NOMOR_SSPDSSTP').removeAttr('style');
						$('#NOMOR_SSPDKB').removeAttr('disabled');
						$('#NOMOR_SSPDKB').removeAttr('style');
						$('#TANGGAL_ENTRY').removeAttr('disabled');
						$('#TANGGAL_ENTRY').removeAttr('style');
						$('#TANGGAL_HITUNGAN_DENDA').removeAttr('disabled');
						$('#TANGGAL_HITUNGAN_DENDA').removeAttr('style');
						$('#footer_simpandata').show('fast');
						$("#btnCetakSSPD").hide();
					}
				}
			setTimeout(function() {
		hitungDenda2();
		}, 100);
		setTimeout(function() {
		hitungsetor();
		}, 200);
			}
		});
	
	}

function simpan() {
	if ($('#TANGGAL_ENTRY').val()=='') {
		notifikasi('Data Tidak Lengkap', 'Mohon Isikan Tanggal Entry', 'success', 1,0);
		return false;
	}
	// $("#btnSimpan").attr('disabled', 1);
	var NOMOR_SSPD = $('#NOMOR_SSPD').val();
		if (NOMOR_SSPD=='') {
			notifikasi('Informasi','Mohon isikan No SSPD','failed',1,0);
		} else {
	$.ajax({
		url: 'penyetoran/entripajakreklame/simpandata',
		type: 'POST',
		dataType: 'json',
		data: {
			tahun : $('#tahunpajak').val(),
			bln : $('#bulanpajak').val(),
			tgl : $('#tanggalpajak').val(),
			lokasi : $('#lokasi').val(),
			jenis_setoran : $('#jenis_setoran').select2('val'),
			nopok : $('#nopok').val(),
			NOMOR_SSPD : $('#NOMOR_SSPD').val(),
			NOMOR_SSPDSSTP : $('#NOMOR_SSPDSSTP').val(),
			NOMOR_SSPDKB : $('#NOMOR_SSPDKB').val(),
			TANGGAL_ENTRY : $('#TANGGAL_ENTRY').val(),
			TANGGAL_HITUNGAN_DENDA : $('#TANGGAL_HITUNGAN_DENDA').val(),
			pajaksetor : toAngka($('#pajaksetor').val()),
			dendasetor : toAngka($('#dendasetor').val()),
			TANGGALSETOR : $('#<?php echo $this->namatabel; ?>_TANGGALSETOR').val(),
		},
		success:function (respon) {
			if (respon.pesan=='success') {
				cetakSSPD();
				$('#id_respencarian').hide();
				notifikasi('Sukses', 'Data Berhasil Disimpan', 'success', 1,0);
			}else{
				notifikasi('Gagal', 'Sudah pernah diinputkan', 'fail', 1,0);
			}
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		
		$('#footer_simpandata').hide();
	});

	;
}
}

function getrekening(kode) {
	$.ajax({
		url: 'penyetoran/entripajakreklame/getrekening',
		type: 'POST',
		dataType: 'json',
		data: {
			kode : kode,
		},
		success:function (respon) {
			$('#TREKENING_NAMA').html(respon.TBLREKENING_NAMAREKENING);
		}
	});
}

$("#TANGGAL_HITUNGAN_DENDA").change(function(event) {
	hitungDenda2();
	hitungsetor();
});

	// $("#TANGGAL_HITUNGAN_DENDA").keyup(function(event) {
	// 	hitungDenda();
	// });

function hitungDenda() {
	var tglbatas = $("#<?php echo $this->namatabel; ?>_TGLBATASSKPD").val();
		// if (tglbatas=='') {
		// 	tglbatas = $("#<?= $this->namatabel ?>_TGLBTSKRGBAYAR").val();
		// }
		window.BULAN_DENDAX = getBulanDenda(convDate(tglbatas), '<?= date('Y-m-d') ?>');
		var totalpajak = Number(toAngka($('#<?= $this->namatabel ?>_RUPIAHKRGBAYAR').val()));
		rpdenda = Number(toAngka($("#<?= $this->namatabel ?>_DENDAKRGBAYAR").val()));
		totalbayar = Number(toAngka($("#<?= $this->namatabel ?>_RUPIAHKRGBAYAR").val()));
		rpdenda_tambahan = ((BULAN_DENDAX * 2) /100) * totalpajak;
		rpdenda_setor = rpdenda + rpdenda_tambahan;
		$("#dendasetor").val(rpdenda_setor.toFixed(2));
		$("#totalsetor").val((rpdenda_setor + totalbayar).toFixed(2));
		setPriceFormat();
	}

	function hitungDenda2() {

		var jns_setoran = $('#jenis_setoran').select2('val');

		if (jns_setoran == 'SKPD') {

		tglbts1 = $('#<?php echo $this->namatabel; ?>_TGLBATASSKPD').val();
		tglhitdenda = $('#TANGGAL_HITUNGAN_DENDA').val();
		pokok = Number(toAngka($('#<?php echo $this->namatabel; ?>_PAJAK').val()));

	    //tglbts = moment(new Date(tglbts1)).format("MM-DD-YYYY");

		var parts = tglbts1.split("-");

		dd = parts[0]; 
		mm = parts[1]; 
		yyyy = parts[2];

		tglbatas = yyyy+'-'+mm+'-'+dd;

		var parts = tglhitdenda.split("-");

		dd = parts[0]; 
		mm = parts[1]; 
		yyyy = parts[2];

		tglhitungdenda = yyyy+'-'+mm+'-'+dd;

		jmlbulandenda = getBulanDenda(tglbatas,tglhitungdenda);

		if (jmlbulandenda>24) {
	      jmlbulandenda = 24;
	    } else {
	      jmlbulandenda = jmlbulandenda;
	    }
	    
		console.log('tglbatas='+tglbatas);
		console.log('tglhitungdenda='+tglhitungdenda);
		console.log('jmldenda='+jmlbulandenda);

		window.totaldenda = pokok*jmlbulandenda*2/100;
		totalsetoranpajak = pokok + totaldenda;

		$('#dendasetor').val(toRp(totaldenda));

		}
		
	}

	function hitungsetor(){
		var jns_setoran = $('#jenis_setoran').select2('val');

		if (jns_setoran == 'SKPD') {

		pokok = Number(toAngka($('#<?php echo $this->namatabel; ?>_PAJAK').val()));
		totalsetoranpajak = pokok + window.totaldenda;	
		$('#totalsetor').val(toRp(totalsetoranpajak));

		} else if (jns_setoran == 'STPD') {
			pokok = Number(toAngka($('#<?php echo $this->namatabel; ?>_BUNGATAGIHAN').val()));
			totalsetoranpajak = pokok;
			$('#totalsetor').val(toRp(totalsetoranpajak));
		}
	}


	function cetakSSPD() {
		var param = {
			TBLDAFTAR_NOPOK: btoa(btoa($("#nopok").val()))
			,TBLPENDATAAN_THNPAJAK: btoa(btoa($("#tahunpajak").val().substr(-2)))
			,TBLPENDATAAN_BLNPAJAK: btoa(btoa($("#bulanpajak").val()))
			,TBLPENDATAAN_TGLPAJAK: btoa(btoa($("#tanggalpajak").val()))
			,TBLPENDATAAN_PAJAKKE: btoa(btoa($("#lokasi").val()))
			,TBLSETORANBPD_JNSBAYAR: btoa(btoa($("#jenis_setoran").val()))
		}
		window.open('penyetoran/entripajakreklame/cetakSSPD/?'+jQuery.param(param));
	}

</script>

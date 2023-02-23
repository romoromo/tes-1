<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Entri Setoran Transfer Pajak Hiburan</h4>
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
									Tahun
								</section>
								<section class="col col-md-2">
									<label class="input">
										<input class="input-sm" value="<?php echo date('Y'); ?>" type="number" id="tahun" name="tahun">
									</label>
								</section>
								<section class="col col-md-1">
									Bulan
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select class="select2" id="bln" name="bln">
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
										</select>
										<!-- <i></i> -->
									</label>
								</section>
								<section class="col col-md-1">
									Tanggal
								</section>
								<section class="col col-md-1">
									<label class="checkbox pull-right">
										<input type="checkbox" name="is_tanggal" id="is_tanggal">
										<i></i>
									</label>
								</section>
								<section class="col col-md-2">
									<label class="input">
										<input class="input-sm" type="number" id="tgl" name="tgl">
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
											<option selected value="SPTPD">SPTPD</option>
											<option value="STPD">STPD</option>
											<option value="SKPDKB">SKPDKB</option>
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
												<section class="col col-md-1">Batas SPT</section>
												<section class="col col-md-4">
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input readonly="" style="background: #eee;" type="text" name="<?php echo $this->namatabel; ?>_TGLBATASSPTPD" class="datepicker form-control" data-dateformat="dd-mm-yy" id="<?php echo $this->namatabel; ?>_TGLBATASSPTPD">
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
												<section class="col col-md-3">Bunga Tagihan</section>
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
														<input class="form-control" style="background: #eee;" readonly="" type="text" id="<?php echo $this->namatabel; ?>_BUNGATAGIHAN">
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
														<input class="form-control datepicker" data-dateformat="dd-mm-yy" value="<?= date('d-m-Y') ?>" id="<?php echo $this->namatabel; ?>_TANGGALSETOR" type="text">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Bunga</section>
												<section class="col col-md-10">
													<label class="input">	
														<input class="form-control disabled" style="background: #eee;" id="bunga_setor" name="bunga_setor"  type="text">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Denda</section>
												<section class="col col-md-10">
													<label class="input" >
														<input class="form-control disabled format-rupiah-desimal" style="background: #eee;" name="dendasetor" id="dendasetor" type="text">
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
												</div>
												<div class="row">
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
														<input style="background: #eee;" class="form-control" type="text" id="<?php echo $this->namatabel; ?>_RUPIAHKRGBAYAR">
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
											<section class="col col-md-1">Nomor SSPD STP</section>
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
													<input type="text" class="datepicker" data-dateformat="dd-mm-yy" id="TANGGAL_HITUNGAN_DENDA" name="TANGGAL_HITUNGAN_DENDA">
												</label>
											</section>
											<section class="col col-md-4">
												<?php if (Tblrole::model()->isRole('SUPERADMIN')): ?>
												<button type="button" style="display: none;" id="btnCetakSSPD" class="btn btn-default btn-sm" onclick="cetakSSPD()"><i class="fa fa-print"></i> Cetak SSPD</button>
											<?php endif ?>
										</section>
									</div>
								</div>
							</div>
						</div>
					</fieldset>		
					<footer id="footer_simpandata">
						<a id="btn-Simpan" onclick="simpan()" href="javascript:void(0)" class="btn btn-sm btn-primary" style="float: left;">
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
		generateAutocompleteWP();
	});

	function generateAutocompleteWP() {
		$('#nopok').autocomplete({
			serviceUrl: 'Setoranpajak_Trasfer/pajak_hiburan/autocomplete',

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
		$.each($('#id_respencarian input'), function(idx, val) {
			$(val).val( $(val).prop("defaultValue") );
		});

		$("#btnCetakSSPD").hide();

		if($('#is_tanggal').is(':checked')){
			tgl = $('#is_tanggal').select2('val');
		} else {
			tgl = '0';
		}

		$.ajax({
			url: 'Setoranpajak_Trasfer/pajak_hiburan/getdata',
			type: 'POST',
			dataType: 'json',
			data: {
				tahun : $('#tahun').val(),
				bln : $('#bln').val(),
				tgl : ($('#is_tanggal').prop('checked') ? $('#tgl').val() : '0'),
				jenis_setoran : $('#jenis_setoran').select2('val'),
				nopok : $('#nopok').val(),
			},
			success:function (respon) {
				if (respon.data.validate=='kurang') {
					notifikasi('Silahkan isikan data dengan lengkap', 'Periksa kembali isian data dan klik cari', 'fail', 1,0);
				} else if (!respon.model.TBLPENDATAAN_THNPAJAK) {
					notifikasi('Data tidak ditemukan', 'data dengan nomor pokok '+$('#nopok').val()+' tidak ditemukan', 'fail', 1,0);
				} else {
					if (respon.data.exist_bpd=='ada') {
						notifikasi('Data pernah disetor di menu BPD', 'data dengan nomor pokok '+$('#nopok').val()+' disetor melalui menu setor pajak langsung. Silahkan gunakan menu <b>Setoran Pajak (BPD)</b>', 'fail', 1,0);
						return false;
					}
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
						// $('#<?php echo $this->namatabel; ?>_TGLSPTPD').val('');
					}

					if(respon.model.<?php echo $this->namatabel; ?>_THNBATASSPTPD) {
						var tahunbatassptpd = respon.model.<?php echo $this->namatabel; ?>_THNBATASSPTPD;
						var bulanbatassptpd = respon.model.<?php echo $this->namatabel; ?>_BLNBATASSPTPD;
						if(tahunbatassptpd.length==1) {
							var viewtahunbatassptpd = '200'+tahunbatassptpd;
						} else {
							var viewtahunbatassptpd = '20'+tahunbatassptpd;
						}
						if(bulanbatassptpd.length==1) {
							var viewbulanbatassptpd = '0'+bulanbatassptpd;
						} else {
							var viewbulanbatassptpd = bulanbatassptpd;
						}					
						$('#<?php echo $this->namatabel; ?>_TGLBATASSPTPD').val(respon.model.<?php echo $this->namatabel; ?>_TGLBATASSPTPD+'-'+viewbulanbatassptpd+'-'+viewtahunbatassptpd);
					} else {
						// $('#<?php echo $this->namatabel; ?>_TGLBATASSPTPD').val('');
					}

					$('#<?php echo $this->namatabel; ?>_URUTSKPD').val(respon.model.<?php echo $this->namatabel; ?>_URUTSKPD);
					if(respon.model.<?php echo $this->namatabel; ?>_BUNGASPTPD) {
						$('#<?php echo $this->namatabel; ?>_BUNGASPTPD').val(toRp(respon.model.<?php echo $this->namatabel; ?>_BUNGASPTPD));
					}
					if(respon.model.<?php echo $this->namatabel; ?>_PAJAK) {
						$('#<?php echo $this->namatabel; ?>_PAJAK').val(toRp(respon.model.<?php echo $this->namatabel; ?>_PAJAK));
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
						// $('#<?php echo $this->namatabel; ?>_TGLSURATTAGIHAN').val('');
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

					if(respon.model.<?php echo $this->namatabel; ?>_THNENTRISETOR) {
						var tahunsetor = respon.model.<?php echo $this->namatabel; ?>_THNENTRISETOR;
						var bulansetor = respon.model.<?php echo $this->namatabel; ?>_BLNENTRISETOR;
						viewtahunsetor = isikiri(tahunsetor, "2000");
						viewbulansetor = isikiri(bulansetor, "00");
						$('#<?php echo $this->namatabel; ?>_TANGGALSETOR').val(respon.model.<?php echo $this->namatabel; ?>_TGLENTRISETOR+'-'+viewbulansetor+'-'+viewtahunsetor);
					} else {
						$('#<?php echo $this->namatabel; ?>_TANGGALSETOR').val('<?= date('d-m-Y') ?>');
					}
					
					if (jns_setoran=='SKPDKB') {
						$('#pajaksetor').val(toRp(respon.model.<?php echo $this->namatabel; ?>_RUPIAHKRGBAYAR));
					}else{
						$('#pajaksetor').val(toRp(respon.model.PAJAKSETOR));
					}

					$('#bunga_setor').val(toRp(respon.model.BUNGA_SETOR));
					$('#dendasetor').val(toRp(respon.model.DENDASETOR));
					// $('#pajaksetor').val(toRp(respon.model.PAJAKSETOR));
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
					if (respon.data.exist=='ada') {
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

						if(respon.model.<?php echo $this->namatabel; ?>_THNENTRISETOR) {
							$('#<?php echo $this->namatabel; ?>_TANGGALSETOR').val(respon.model.<?php echo $this->namatabel; ?>_TANGGALSETOR+'-'+viewbulansetor+'-'+viewtahunsetor);
						} else {
							$('#TANGGAL_ENTRY').val('');
						}

						$('#footer_simpandata').hide('fast');
						notifikasi('Data SSPD diinputkan', 'data SSPD dengan nomor pokok '+$('#nopok').val()+' sudah diinputkan', 'fail', 1,0);
						$("#btnCetakSSPD").show();
					}else if (respon.data.ang=='ada') {
						$("#btn-Simpan").attr('disabled', 1);
						$('#id_respencarian').hide();
						$('#footer_simpandata').hide();
						notifikasi('Data Angsuran Terdeteksi', 'data dengan nomor pokok '+$('#nopok').val()+' sudah pernah diangsur', 'fail', 1,0);
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
						$('#btn-Simpan').removeAttr('disabled', 'disabled');
					}

					var jns_setoran = $('#jenis_setoran').select2('val');
					if (jns_setoran=='SKPD' || jns_setoran=='SKPDKB') {
						kolomtglbatas = jns_setoran=='SKPDKB' ? 'TGLBTSKRGBAYAR' : 'TGLSKP';
						window.BULAN_DENDA = getBulanDenda(convDate($("#<?= $this->namatabel ?>_"+kolomtglbatas).val()), '<?= date('Y-m-d') ?>');
						if (BULAN_DENDA <= 0) {
							$('#TANGGAL_HITUNGAN_DENDA').attr('disabled', 'disabled');
							$('#TANGGAL_HITUNGAN_DENDA').attr('style', 'background:#eee');
						}
					}else{
						$('#dendasetor').val(0);
					}
				}
				setTimeout(function() {
					hitungDenda();
				}, 100);
			}
		});
	}
function simpan() {
	var NOMOR_SSPD = $('#NOMOR_SSPD').val();
	if (NOMOR_SSPD=='') {
		notifikasi('Informasi','Mohon isikan No SSPD','failed',1,0);
	} else {
		$.ajax({
			url: 'Setoranpajak_Trasfer/pajak_hiburan/simpandata',
			type: 'POST',
			dataType: 'json',
			data: {
				tahun : $('#tahun').val(),
				bln : $('#bln').val(),
				tgl : ($('#is_tanggal').prop('checked') ? $('#tgl').val() : '0'),
				jenis_setoran : $('#jenis_setoran').select2('val'),
				nopok : $('#nopok').val(),
				NOMOR_SSPD : $('#NOMOR_SSPD').val(),
				NOMOR_SSPDSSTP : $('#NOMOR_SSPDSSTP').val(),
				NOMOR_SSPDKB : $('#NOMOR_SSPDKB').val(),
				TANGGAL_ENTRY : $('#TANGGAL_ENTRY').val(),
				TANGGAL_HITUNGAN_DENDA : $('#TANGGAL_HITUNGAN_DENDA').val(),
				pajaksetor : toAngka($('#pajaksetor').val()),
				bunga_setor : toAngka($('#bunga_setor').val()),
				dendasetor : toAngka($('#dendasetor').val()),
				TANGGALSETOR : $('#<?php echo $this->namatabel; ?>_TANGGALSETOR').val(),
			},
			success:function (respon) {
				if (respon.status=='success') {
					cetakSSPD();
					notifikasi('Sukses', 'Data Berhasil Disimpan', 'success', 1,0);
					$("#btn-Simpan").attr('disabled', 1);
					$('#id_respencarian').hide();
					$('#footer_simpandata').hide();
				}else{
					notifikasi('Gagal', 'Sudah pernah diinputkan', 'fail', 1,0);
				}
			}
		})
		.fail(function(jqXHR, exception) {
			handelErr(jqXHR, exception);
			$("#btn-Simpan").removeAttr('disabled');
		})
		.always(function() {
			$('#footer_simpandata').hide();
		});
		
	}
}

function getrekening(kode) {
	$.ajax({
		url: 'penyetoran/entrisetoranpajakhotel/getrekening',
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
	hitungDenda();
});

$("#TANGGAL_HITUNGAN_DENDA").keyup(function(event) {
	hitungDenda();
});

function hitungDenda() {
	var jns_setoran = $('#jenis_setoran').select2('val');
	if (jns_setoran=='SKPD' || jns_setoran=='SKPDKB') {
		tglbatas = $("#<?= $this->namatabel ?>_TGLBTSKRGBAYAR").val();
	
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
	else if (jns_setoran=='SPTPD'){
		totalbayar =  Number(toAngka($("#pajaksetor").val()));
		rpbunga_setor =  Number(toAngka($("#bunga_setor").val()));
		$("#dendasetor").val(0);
		$("#totalsetor").val((rpbunga_setor + totalbayar).toFixed(2));
		setPriceFormat();
	}
	else if (jns_setoran=='STPD'){
		totalbayar =  Number(toAngka($("#<?= $this->namatabel ?>_BUNGATAGIHAN").val()));
		$("#dendasetor").val(0);
		$("#totalsetor").val(totalbayar.toFixed(2));
		setPriceFormat();
	}
}

function cetakSSPD() {
	var param = {
		TBLDAFTAR_NOPOK: btoa(btoa($("#nopok").val()))
		,TBLPENDATAAN_THNPAJAK: btoa(btoa($("#tahun").val().substr(-2)))
		,TBLPENDATAAN_BLNPAJAK: btoa(btoa($("#bln").val()))
		,TBLPENDATAAN_TGLPAJAK: btoa(btoa($("#tgl").val()))
		,TBLPENDATAAN_PAJAKKE: btoa(btoa(0))
		,jenis_setoran: btoa(btoa($('#jenis_setoran').select2('val')))
	}
	window.open('Setoranpajak_Trasfer/pajak_hiburan/cetakSSPD/?'+jQuery.param(param));
}

</script>
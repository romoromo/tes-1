<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Validasi Jabong Tetap</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-jabong_tetapiytd8fsrad67" 
			data-widget-editbutton="false"
			data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-colorbutton="false"	
			data-widget-togglebutton="false"			
			>
				<!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"

				-->
				<header>
					<span class="widget-icon"> <i class="fa fa-search"></i> </span>
					<h2>Validasi Penyetoran</h2>

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
						
						<form action="" id="form-setor" class="smart-form" novalidate>
							<fieldset>

								<div class="row">
									<section class="col col-md-2">
										Nomor Pokok WP
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm" type="text" id="nopok" name="nopok">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tahun Pajak </p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="number" value="<?= date('Y') ?>" id="tahunpajak" name="tahunpajak">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Lokasi</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="pajakke" name="pajakke">
										</label>
									</section>
									<section class="col col-md-3">
										<button class="btn btn-sm btn-primary" type="button" onclick="cari()">
											Proses >>
										</button>
									</section>
								</div>
								<div id="form_setoran" style="display:none">
									<div class=""><br>
										<div class="row">
											<section class="col col-md-1">
												<p>Nama</p>
											</section>
											<section class="col col-md-2" id="wp_nama">
												WP Nama
											</section>
										</div>
										<div class="row">
											<section class="col col-md-1">
												<p>Alamat</p>
											</section>
											<section class="col col-md-8" id="wp_alamat">
												WP Alamat
											</section>
										</div>
										<div class="row">
											<section class="col col-md-1">
												<p>Rekening</p>
											</section>
											<section class="col col-md-2" id="wp_rekening">
												Rekening
											</section>
										</div>
										<header style="background: #cde0c4;">Setoran Pajak</header>
										<div  style="padding: 3%;">
											<div class="row">
												<section class="col col-md-2">Tanggal Setor</section>
												<section class="col col-md-2">
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input type="text" readonly="" class="disabled" value="<?= date('d-m-Y') ?>" id="TBLJABONGBPD_TGLSETOR" name="TBLJABONGBPD_TGLSETOR">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Pemut Listrik</section>
												<section class="col col-md-4">
													<input id="TBLDAFTREKLAME_JUMLAHJABONG" name="TBLDAFTREKLAME_JUMLAHJABONG" class="form-control format-rupiah disabled text-align-right" readonly="" type="text">
												</section>
											</div>
											<div class="row" style="border-bottom: 2px solid #000;margin-bottom: 18px;">
												<section class="col col-md-2">Jabong</section>
												<section class="col col-md-4">
													<input id="TBLDAFTREKLAME_LISTRIKJABONG" name="TBLDAFTREKLAME_LISTRIKJABONG" class="form-control format-rupiah disabled text-align-right" readonly="" type="text">
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Jumlah Setor</section>
												<section class="col col-md-4">
													<input id="TBLDAFTREKLAME_RUPIAHJABONG" name="TBLDAFTREKLAME_RUPIAHJABONG" class="form-control format-rupiah disabled text-align-right" readonly="" type="text">
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Nomor Jabong</section>
												<section class="col col-md-4">
													<label class="input">
														<input type="text" name="TBLJABONGBPD_NOMORSSPD" id="TBLJABONGBPD_NOMORSSPD">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Tanggal Entry SSPD</section>
												<section class="col col-md-2">
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input type="text" value="<?= date('d-m-Y') ?>" name="TBLJABONGBPD_TGLSSPD" class="datepicker" data-dateformat="dd-mm-yy" id="TBLJABONGBPD_TGLSSPD">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Validasi (Y/T)</section>
												<section class="col col-md-2">
													<label class="select">
														<select name="isvalid" id="isvalid">
															<option value="" selected="" disabled="">== Silahkan Pilih ==</option>
															<option value="Y">Y</option>
														</select> <i></i> 
													</label>
												</section>
											</div>
										</div>
										<footer>
											<button id="btnSimpan" onclick="simpan()" class="btn btn-sm btn-primary" type="button">
												Simpan
											</button>
											<button class="btn btn-sm btn-warning">
												Batal
											</button>
											<?php if (Tblrole::model()->isRole('SUPERADMIN')): ?>
											<button type="button" style="display: none;" id="btnCetakValidasiJabong" class="btn btn-default btn-sm" onclick="cetak()"><i class="fa fa-print"></i> Cetak Validasi</button>
											<?php endif ?>
										</footer>
									</div>
								</div>
							</fieldset>						
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

</section><br>


<script type="text/javascript">
	pageSetUp();

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWP();
	});

	function generateAutocompleteWP() {
		$('#nopok').autocomplete({
			serviceUrl: 'validasi/jabong_tap/autocompletewp',

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
	});


	function printSelected () {
		$('#datamodal').modal('show');
	}

	function cari() {
		$.ajax({
			url: 'validasi/jabong_tap/getdata',
			type: 'POST',
			dataType: 'json',
			data: {
				tahun : $('#tahunpajak').val(),
				lokasi : $('#pajakke').val(),
				nopok : $('#nopok').val(),
			},
			success:function (respon) {
				$("#btnSimpan").show();
				$("#btnCetakValidasiJabong").hide();
				$("#TBLJABONGBPD_NOMORSSPD").removeClass('disabled').removeAttr('readonly');
				$("#TBLJABONGBPD_TGLSSPD").removeClass('disabled').removeAttr('readonly');
				if (respon.data.validate=='kurang') {
					notifikasi('Silahkan isikan data dengan lengkap', 'Periksa kembali isian data dan klik cari', 'fail', 1,0);
					return false;
				} else if (!respon.model.TBLPENDATAAN_THNPAJAK) {
					notifikasi('Data tidak ditemukan', 'data dengan nomor pokok '+$('#nopok').val()+' tidak ditemukan', 'fail', 1,0);
					$("#btnSimpan").hide();
					return false;
				} else if (respon.data.exist=='ada') {
					notifikasi('Data sudah pernah diinputkan', 'data dengan nomor pokok '+$('#nopok').val()+' sudah disetor', 'fail', 1,0);
					$("#btnSimpan").hide();
					$("#TBLJABONGBPD_NOMORSSPD").val(respon.model.TBLJABONGBPD_NOMORSSPD).addClass('disabled').attr('readonly', true);
					$("#TBLJABONGBPD_TGLSSPD").val(respon.model.TBLJABONGBPD_TGLSSPD).addClass('disabled').attr('readonly', true);
					$("#btnCetakValidasiJabong").show();
				}
					$('#form_setoran').show();
					$('#wp_nama').html(respon.model.TBLDAFTAR_BADANUSAHANAMA);
					$('#wp_rekening').html('1.20.1.20.26.0.0.'+respon.model.<?php echo $this->namatabel; ?>_REKPENDAPATAN+'.'+respon.model.<?php echo $this->namatabel; ?>_REKPAD+'.'+respon.model.<?php echo $this->namatabel; ?>_REKPAJAK+'.'+respon.model.<?php echo $this->namatabel; ?>_REKAYAT+'.'+respon.model.<?php echo $this->namatabel; ?>_REKJENIS+'.0');
					$('#wp_alamat').html(respon.model.TBLDAFTAR_BADANUSAHAALAMAT);

					$("#TBLDAFTREKLAME_JUMLAHJABONG").val(respon.model.TBLDAFTREKLAME_JUMLAHJABONG);
					$("#TBLDAFTREKLAME_LISTRIKJABONG").val(respon.model.TBLDAFTREKLAME_LISTRIKJABONG);
					$("#TBLDAFTREKLAME_RUPIAHJABONG").val(respon.model.TBLDAFTREKLAME_RUPIAHJABONG);

					setPriceFormat();

					// getrekening(respon.model.TREKENING_NAMA);

					// if(respon.model.<?php echo $this->namatabel; ?>_THNSPTPD) {
					// 	var tahunthnsptpd = respon.model.<?php echo $this->namatabel; ?>_THNSPTPD;
					// 	var bulansptpd = respon.model.<?php echo $this->namatabel; ?>_BLNSPTPD;
					// 	if(tahunthnsptpd.length==1) {
					// 		var viewtahunthnsptpd = '200'+tahunthnsptpd;
					// 	} else {
					// 		var viewtahunthnsptpd = '20'+tahunthnsptpd;
					// 	}
					// 	if(bulansptpd.length==1) {
					// 		var viewbulansptpd = '0'+bulansptpd;
					// 	} else {
					// 		var viewbulansptpd = bulansptpd;
					// 	}					
					// 	$('#<?php echo $this->namatabel; ?>_TGLSPTPD').val(respon.model.<?php echo $this->namatabel; ?>_TGLSPTPD+'-'+bulansptpd+'-'+viewtahunthnsptpd);
					// } else {
					// 	$('#<?php echo $this->namatabel; ?>_TGLSPTPD').val('');
					// }
			}
		});
	}

	function simpan() {
		var addparam = {
		};
		$.ajax({
			url: 'validasi/jabong_tap/simpandata',
			type: 'POST',
			dataType: 'json',
			data: $("#form-setor").serialize()+'&'+jQuery.param(addparam),
			success:function (respon) {
				if (respon.status=='success') {
					cetak();
					$("#btnCetakValidasiJabong").show();
					notifikasi('Sukses', 'Data Berhasil Disimpan', 'success', 1,0);
				}else{
					notifikasi('Gagal', 'Sudah pernah diinputkan', 'fail', 1,0);
				}
			}
		});
	}

	function cetak() {
		var param = {
			TBLDAFTAR_NOPOK: btoa(btoa($("#nopok").val()))
			,TBLPENDATAAN_THNPAJAK: btoa(btoa($("#tahunpajak").val().substr(-2)))
			,TBLPENDATAAN_BLNPAJAK: btoa(btoa(0))
			,TBLPENDATAAN_TGLPAJAK: btoa(btoa(0))
			,TBLPENDATAAN_PAJAKKE: btoa(btoa($("#pajakke").val()))
		}
		window.open('validasi/jabong_tap/cetak/?'+jQuery.param(param));
	}

</script>
<style type="text/css">
	input.disabled {
		background: #ccc!important;
	}
</style>
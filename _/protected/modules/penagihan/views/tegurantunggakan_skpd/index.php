<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Teguran Tunggakan SKPD Sebelum 2012</h4>
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
										<section class="col col-md-6">
											<div class="row">
												<section class="col col-md-3">
													<p>Nomor Pokok</p>
												</section>
												<section class="col col-md-7">
													<label class="input">
														<input class="form-control" type="text" id="TBLDAFTAR_NOPOK" name="param[TBLDAFTAR_NOPOK]" >
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-3">

												</section>
												<section class="col col-md-7">
													<label class="select">
														<select class="select2" id="TBLREKENING_KODE" name="para[TBLREKENING_KODE]">
															<option value="">-- Pilih Rekening --</option>
															<?php foreach ($data['rek'] as $list): ?>
																<option value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
															<?php endforeach ?>
														</select>
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-3">
													<p>Tahun Pajak</p>
												</section>
												<section class="col col-md-4">
													<label class="select">
														<label class="input">
															<input type="number" disabled="disabled"  value="<?php echo date('Y') -4; ?>" id="TBLPENDATAAN_THNPAJAKK" name="param[TBLPENDATAAN_THNPAJAKK]">
														</label>
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-3" >
													<p>S / D</p>
												</section>
												<section class="col col-md-4">
													<label class="select">
														<label class="input">
															<input type="number" value="<?php echo date('Y'); ?>" class="form-control" id="TBLPENDATAAN_THNPAJAKA" name="param[TBLPENDATAAN_THNPAJAKA]">
														</label>
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-3">
													<p>Jenis Penyetoran</p>
												</section>
												<section class="col col-md-4">
													<label class="select">
														<select class="select2" id="jenis_penyetoran" name="jenis_penyetoran" disabled="disabled">
															<option value="" >SKPD</option>
														</select>
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-4">
													<button type="button" class="btn btn-primary btn-sm" onclick="cari()" >Cari</button>
												</section>
											</div>
										</section>
										<section class="col col-md-6">
											<div class="row">
												<section class="col col-md-3">
													<p>Nomor Surat</p>
												</section>
												<section class="col col-md-7">
													<label class="input">
														<input class="form-control" type="text" id="nomor_surat" name="nomor_surat" autocomplete="off">
													</label>
												</section>	
											</div>
											<div class="row">
												<section class="col col-md-3">Tanggal Undangan</section>
												<section class="col col-md-4">
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input type="text" name="tglawal" class="datepicker" data-dateformat="dd-mm-yy" id="tglawal">
													</label>
												</section>
												<section class="col col-md-1"><p align="center">S/D</p></section>
												<section class="col col-md-4">
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input type="text" name="tglakhir" class="datepicker" data-dateformat="dd-mm-yy" id="tglakhir">
													</label>
												</section>
											</div>
											<!-- <div class="row">
												<section class="col col-md-3">
													<p>Waktu</p>
												</section>
												<section class="col col-md-7">
													<label class="input">
														<input class="form-control" type="text" id="waktu" name="waktu" autocomplete="off">
													</label>
												</section>	
											</div> -->
											<div class="row">
												<section class="col col-md-3">Tempat Undangan</section>
												<section class="col col-md-9">
													<label class="textarea"> 										
														<textarea rows="3" name="tempt_undangan">Sub Bid. Penagihan dan Keberatan Pajak Daerah, Gedung Aset Lantai 2</textarea> 
													</label>
												</section>
											</div>
										</section>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</article>
		</div>
	</section>
	<div class="row">
		<article class="col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-7" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Hasil Pencarian </h2>
				</header>

				<!-- widget div-->
				

					<!-- widget edit box -->
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="table-responsive" style="max-width: 100%; height: 400px!important; overflow: auto;">
						<button type="button" class="btn btn-default" onclick="cetakword()">
							<i class="fa fa-print"></i> Cetak Surat Teguran
						</button>	
						<button type="button" class="btn btn-default" onclick="cetakdaftar()">
							<i class="fa fa-print"></i> Cetak Daftar Teguran
						</button>			
						<br>
					
						<div id="cari">							
							<center><i><b>Silahkan Lakukan Pencarian Terlebih Dahulu</b></i></center>
						</div>
					</div>
				
				<!-- end widget content -->

			</div>
			<!-- end widget div -->

		</div>

		<script type="text/javascript">

			pageSetUp();

			jQuery(document).ready(function($) {
				$("#TBLPENDATAAN_THNPAJAKA").val(Number(<?php echo date('Y') ?>)); 
			});
			$("#TBLPENDATAAN_THNPAJAKA").change(function() {
				$("#TBLPENDATAAN_THNPAJAKK").val(Number($("#TBLPENDATAAN_THNPAJAKA").val())-4); 
			});


			LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

			function cari() {
				$("#the_preload_element").show();
				$.ajax({
					url: 'penagihan/Tegurantunggakan_skpd/cari',
					type: 'POST',
					data: {
						TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val(),
						TBLREKENING_KODE: $("#TBLREKENING_KODE").val(),
						TBLPENDATAAN_THNPAJAKA: $("#TBLPENDATAAN_THNPAJAKA").val(),
						TBLPENDATAAN_THNPAJAKK: $("#TBLPENDATAAN_THNPAJAKK").val(),
					},
					success:function(respon) {
						$("#cari").html(respon);
						$("#cari").prepend('<div align="center">'+LOADER+'');
						$(".loader_img").fadeOut(1000);
					}
				});
			}
		
		function cetakword() {

    	if ($('#nomor_surat').val()=='') {
    		notifikasi('Informasi','Mohon Isikan Nomor Surat ','failed',1,0);
    	} else {
    		arridPajak = [];

			$("input[name='nopokPajak']:checked").each(function() {
				arridPajak.push(this.value);
			});

			count = 0;
			for(x in arridPajak) {
				count++;
			}

			daftaridPajak = arridPajak.toString();

			var q = daftaridPajak;
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/penagihan/Tegurantunggakan_skpd/cetakword/?data=' + q +"&TBLPENDATAAN_THNPAJAKA="+$('#TBLPENDATAAN_THNPAJAKA').val()+"&TBLPENDATAAN_THNPAJAKK="+$('#TBLPENDATAAN_THNPAJAKK').val()+"&TBLDAFTAR_NOPOK="+$('#TBLDAFTAR_NOPOK').val()+"&TBLREKENING_KODE="+$('#TBLREKENING_KODE').val()+"&nomor_surat="+$('#nomor_surat').val()+"&tglawal="+$('#tglawal').val()+"&tglakhir="+$('#tglakhir').val()+"&waktu="+$('#waktu').val() );
    	}    	
    	// window.open(window.APP_URL+'/pendataan/cetak_suratteguran/cetaksuratteguran');
	}

		function cetakdaftar() {

    	if ($('#nomor_surat').val()=='') {
    		notifikasi('Informasi','Mohon Isikan Nomor Surat','failed',1,0);
    	} else {
    		arridPajak = [];

			$("input[name='nopokPajak']:checked").each(function() {
				arridPajak.push(this.value);
			});

			count = 0;
			for(x in arridPajak) {
				count++;
			}

			daftaridPajak = arridPajak.toString();

			var q = daftaridPajak;
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/penagihan/Tegurantunggakan_skpd/cetakdaftar/?data=' + q +"&TBLPENDATAAN_THNPAJAKA="+$('#TBLPENDATAAN_THNPAJAKA').val()+"&TBLPENDATAAN_THNPAJAKK="+$('#TBLPENDATAAN_THNPAJAKK').val()+"&TBLDAFTAR_NOPOK="+$('#TBLDAFTAR_NOPOK').val()+"&TBLREKENING_KODE="+$('#TBLREKENING_KODE').val()+"&nomor_surat="+$('#nomor_surat').val()+"&tglawal="+$('#tglawal').val()+"&tglakhir="+$('#tglakhir').val()+"&waktu="+$('#waktu').val() );
    	}    	
    	// window.open(window.APP_URL+'/pendataan/cetak_suratteguran/cetaksuratteguran');
	}

		</script>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Teguran SKPD Angsuran </h4>
		</div>
	</div>
</div>

<!--  -->
<section id="widget-grid">
	<!-- row -->
	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-w463ejwsehjdekjswjedk" 
			data-widget-editbutton="false"
			data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-colorbutton="false"	
			data-widget-togglebutton="false"
			data-widget-sortable="false"			
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
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>Form Pencarian</h2>

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
					<form action="" id="form_sumber_pajak" class="smart-form" novalidate>
						<fieldset>
							<div class="row">
								<section class="col col-md-6">
									<div class="row">
										<section class="col col-md-3">Nomor Pokok</section>
										<section class="col col-md-7">
											<label class="input">
												<input class="input-sm" type="text" id="TBLDAFTAR_NOPOK" name="param[TBLDAFTAR_NOPOK]">
											</label>
										</section>
									</div>
									
									<div class="row">
										<section class="col col-md-3">Jenis Pajak</section>
										<section class="col col-md-7">
											<label class="select">
												<select class="select2" id="TBLREKENING_KODE" name="param[TBLREKENING_KODE]">
													<option value="">-- Pilih Rekening --</option>
													<?php foreach ($data['rek'] as $list): ?>
														<option value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-3">Jenis Penyetoran</section>
										<section class="col col-md-7">
											<select class="form-control" disabled="disabled">
												<option value="SKPD-A">SKPD-A</option>
											</select>
										</section>
									</div>
									<div class="row" style="display: none;">
										<section class="col col-md-3">Kecamatan</section>
										<section class="col col-md-7">
											<label class="select">
												<select class="select2" id="REFKECAMATAN" name="param[REFKECAMATAN]">
													<option value="">-- Pilih Kecamatan --</option>
													<?php foreach ($data['list_kecamatan'] as $list): ?>
														<option value="<?php echo $list['REFKECAMATAN_ID'] ?>">[<?php echo $list['REFKECAMATAN_ID'] ?>] <?php echo $list['REFKECAMATAN_NAMA'] ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
									</div>
									<div class="row" style="display: none;">
										<section class="col col-md-3">Kelurahan</section>
										<section class="col col-md-7">
											<label class="select">
												<select class="select2" id="REFKELURAHAN" name="param[REFKELURAHAN]">
													<option value="">-- Pilih Kecamatan --</option>
													<?php foreach ($data['list_kelurahan'] as $list): ?>
														<option value="<?php echo $list['REFKELURAHAN_ID'] ?>">[<?php echo $list['REFKELURAHAN_ID'] ?>] <?php echo $list['REFKELURAHAN_NAMA'] ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-3">Tahun Pajak</section>
										<section class="col col-md-4">
											<label class="input">
												<input type="number" value="<?php echo date('Y') ?>" class="form-control" id="TBLPENDATAAN_THNPAJAK" name="param[TBLPENDATAAN_THNPAJAK]">
											</label>
										</section>
										<section class="col col-md-1">S/D</section>
										<section class="col col-md-4">
											<label class="input">
												<input type="number" value="<?php echo date('Y') ?>" class="form-control" id="TBLPENDATAAN_THNPAJAK_AKHIR" name="param[TBLPENDATAAN_THNPAJAK_AKHIR]">
											</label>
										</section>
									</div>
								</section>
								<section class="col col-md-6">
									<div class="row">
										<section class="col col-md-3">Nomor Surat</section>
										<section class="col col-md-7">
											<label class="input">
												<input class="input-sm" type="text" id="nomor_surat" name="param[nomor_surat]">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-3">Tanggal Terbit Surat</section>
										<section class="col col-md-7">
											<label class="input"><i class="icon-append fa fa-calendar"></i>
												<input type="text" name="param[tanggalsurat]" class="datepicker" data-dateformat="dd-mm-yy" id="tanggalsurat">
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
									<div class="row">
										<section class="col col-md-3">Waktu</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="timepicker" type="text" id="waktuawal" name="param[waktuawal]" value="08:00">
											</label>
										</section>
										<section class="col col-md-1"><p align="center">S/D</p></section>
										<section class="col col-md-4">
											<label class="input">
												<input class="timepicker" type="text" id="waktuakhir" name="param[waktuakhir]" value="16:00">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-3">Tempat Undangan</section>
										<section class="col col-md-9">
											<label class="textarea"> 										
												<textarea rows="3" 	id="tempt_undangan" name="tempt_undangan">Sub Bid. Penagihan dan Keberatan Pajak Daerah, Gedung Aset Lantai 2</textarea> 
											</label>
										</section>
									</div>
								</section>
							</div>
						</fieldset>		
						<footer>
							<button type="button" class="btn btn-sm btn-primary" onclick="cari()">
								<i class="fa  fa-search"></i>&nbsp;Cari
							</button>
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
<!--  -->
<!-- row -->
<div class="row">
	<article class="col-sm-12 col-md-12 col-lg-12">

		<div class="jarviswidget jarviswidget-color-darken" id="wid-id-7" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
			<header>
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>Hasil Pencarian </h2>

			</header>

			<!-- widget div-->
			<div>

				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->

				</div>
				<!-- end widget edit box -->

				<!-- widget content -->
				<div class="table-responsive" style="max-width: 100%; height: 400px!important; overflow: auto;">
					<button type="button" class="btn btn-default" onclick="cetakWord()">
						<i class="fa fa-print"></i> Cetak Surat Teguran
					</button>	
					<button type="button" class="btn btn-default" onclick="cetakdaftar()">
						<i class="fa fa-print"></i> Cetak Daftar Teguran
					</button>			
					<br>
					<br>
					<div id="tabel_laporan">							
						<center><i><b>Silahkan Lakukan Pencarian Terlebih Dahulu</b></i></center>
					</div>
				</div>
			</div>
			<!-- end widget content -->

		</div>
		<!-- end widget div -->

	</div>
</article>
<!-- end-->

<!--  -->
</section>

</div>


<div style="display: none;" class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel"> Detail Teguran SKPD-A</h4>
			</div>
			<form action="" id="order-form" class="smart-form" novalidate="">	
					<div class="row">
						<section class="col col-md-8">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<td>THP</td>
										<td>BLP</td>
										<td>NOPOK</td>
										<td>THBSKP</td>
										<td>RPANG</td>
										<td>RPSET</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>15</td>
										<td>12</td>
										<td>1657</td>
										<td>16</td>
										<td>7</td>
										<td>205765</td>
									</tr>
								</tbody>
							</table>
						</section>
					</div>								
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>



<script type="text/javascript">
	pageSetUp();
	window.id_eksepsi = '';

	// loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
	// 	generateAutocompleteWPHotel();
	// });

LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';
loadScript("themes/smartadmin/js/bootstrap-timepicker.min.js", function(){
		runTimePicker();
	});

function runTimePicker() {
		$('.timepicker').timepicker({
			showMeridian: false,
		});
	}

function cari() {
	if ($('#TBLREKENING_KODE').val()=='') {
		notifikasi('Informasi','Mohon Tentukan Jenis Pajak','failed',1,0);
	} else if ($('#tanggalsurat').val()=='') {
		notifikasi('Informasi','Mohon Isikan Tanggal Terbit Surat','failed',1,0);
	} else {	
	$("#the_preload_element").show();
	$.ajax({
		url: 'penagihan/Teguran_skpda_2021/cari',
		type: 'POST',
		data: {
			TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val(),
			TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val(),
			TBLPENDATAAN_THNPAJAK_AKHIR: $("#TBLPENDATAAN_THNPAJAK_AKHIR").val(),
			TBLREKENING_KODE: $("#TBLREKENING_KODE").val(),
			tanggalsurat: $("#tanggalsurat").val(),
			// REFKELURAHAN: $("#REFKELURAHAN").val(),
			// REFKECAMATAN: $("#REFKECAMATAN").val(),
		},
		success:function(respon) {
			$("#tabel_laporan").html(respon);
			$("#tabel_laporan").prepend('<div align="center">'+LOADER+'');
			$(".loader_img").fadeOut(1000);
		}
	});
	}
}

	// function cari() {
	// 	$("#data_skpdkb").show();
	// }

		function cetakWord() {

    	if ($('#nomor_surat').val()=='') {
    		notifikasi('Informasi','Mohon Isikan Nomor Surat','failed',1,0);
    	} else if ($('#tanggalsurat').val()=='') {
			notifikasi('Informasi','Mohon Isikan Tanggal Surat','failed',1,0);
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
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/penagihan/Teguran_skpda_2021/cetakword/?data=' + q +"&TBLPENDATAAN_THNPAJAK="+$('#TBLPENDATAAN_THNPAJAK').val()+"&TBLPENDATAAN_THNPAJAK_AKHIR="+$('#TBLPENDATAAN_THNPAJAK_AKHIR').val()+"&TBLDAFTAR_NOPOK="+$('#TBLDAFTAR_NOPOK').val()+"&TBLREKENING_KODE="+$('#TBLREKENING_KODE').val()+"&nomor_surat="+$('#nomor_surat').val()+"&tglawal="+$('#tglawal').val()+"&tglakhir="+$('#tglakhir').val()+"&waktuawal="+$('#waktuawal').val()+"&waktuakhir="+$('#waktuakhir').val()+"&tempt_undangan="+$('#tempt_undangan').val()+"&tanggalsurat="+$('#tanggalsurat').val() );
    	}    	
    	// window.open(window.APP_URL+'/pendataan/cetak_suratteguran/cetaksuratteguran');
	}


		function cetakdaftar() {

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
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/penagihan/Teguran_skpda_2021/cetakdaftar/?data=' + q +"&TBLPENDATAAN_THNPAJAK="+$('#TBLPENDATAAN_THNPAJAK').val()+"&TBLPENDATAAN_THNPAJAK_AKHIR="+$('#TBLPENDATAAN_THNPAJAK_AKHIR').val()+"&TBLDAFTAR_NOPOK="+$('#TBLDAFTAR_NOPOK').val()+"&TBLREKENING_KODE="+$('#TBLREKENING_KODE').val()+"&nomor_surat="+$('#nomor_surat').val()+"&tglawal="+$('#tglawal').val()+"&tglakhir="+$('#tglakhir').val()+"&waktuawal="+$('#waktuawal').val()+"&waktuakhir="+$('#waktuakhir').val()+"&tempt_undangan="+$('#tempt_undangan').val()+"&tanggalsurat="+$('#tanggalsurat').val() );
    	}    	
    	// window.open(window.APP_URL+'/pendataan/cetak_suratteguran/cetaksuratteguran');
	


	function detail() {
		$('#modal_detail').modal('show');
	}

	
</script>
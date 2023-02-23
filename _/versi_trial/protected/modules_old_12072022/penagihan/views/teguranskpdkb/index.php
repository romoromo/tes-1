<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Teguran SKPDKB</h4>
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

						<div class="widget-body">
							<form id="form_sumber_pajak" class="smart-form" novalidate="">
								<fieldset>
									<div class="row">
										<section class="col col-md-1">
											<p>Nomor Pokok</p>
										</section>
										<section class="col col-md-5">
											<label class="input">
												<input class="form-control" type="text" id="TBLDAFTAR_NOPOK" name="param[TBLDAFTAR_NOPOK]" autocomplete="off" onekeyup="validAngka(this)">
											</label>
										</section>
										<section class="col col-md-1">
											<p>Nomor Surat</p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control" type="text" id="no_surat" name="param[no_surat]" autocomplete="off">
											</label>
										</section>					
									</div>
									<div class="row">
										<section class="col col-md-1">
											<p>Jenis Pajak</p>
										</section>
										<section class="col col-md-5">
											<label class="select">
												<select class="select2" id="TBLREKENING_KODE" name="param[TBLREKENING_KODE]">
													<option value="">-- Pilih Rekening --</option>
													<?php foreach ($data['rek'] as $list): ?>
														<option value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
										<section class="col col-md-1">
											<p>Tanggal Terbit Surat</p>
										</section>
										<section class="col col-md-4">
											<label class="input"><i class="icon-append fa fa-calendar"></i>
												<input type="text" name="param[tanggalsurat]" class="datepicker" data-dateformat="dd-mm-yy" id="tanggalsurat">
											</label>
										</section>	
									</div>
									<div class="row">
										<section class="col col-md-1">
											<p>Jenis Penyetoran</p>
										</section>
										<section class="col col-md-5">
											<label class="select">
												<select class="select2" id="jenis_penyetoran" name="jenis_penyetoran" disabled="disabled">
													<option value="" >SKPDKB</option>
												</select>
											</label>
										</section>
										<section class="col col-md-1">
											Tanggal Undangan
										</section>
										<section class="col col-md-2">
											<label class="input"><i class="icon-append fa fa-calendar"></i>
												<input type="text" id="tglawal" name="param[tglawal]" class="datepicker" data-dateformat="dd-mm-yy" >
											</label>
										</section> 
										<section class="col col-md-1">
											S / D
										</section>
										<section class="col col-md-2">
											<label class="input"><i class="icon-append fa fa-calendar"></i>
												<input type="text" id="tglakhir" name="param[tglakhir]" class="datepicker" data-dateformat="dd-mm-yy">
											</label>
										</section>									

									</div>
									<div class="row">
									<section class="col col-md-1">
											<p>Tahun Pajak</p>
										</section>
										<section class="col col-md-2">
											<label class="select">
												<label class="input">
													<input type="number" value="<?php echo date('Y') ?>" id="TBLPENDATAAN_THNPAJAK" name="param[TBLPENDATAAN_THNPAJAK]">
												</label>
											</label>
										</section>
										<section class="col col-md-1">
    										S/D
    									</section>
										<section class="col col-md-2">
											<label class="select">
												<label class="input">
													<input type="number" value="<?php echo date('Y') ?>" id="TBLPENDATAAN_THNPAJAK_AKHIR" name="param[TBLPENDATAAN_THNPAJAK_AKHIR]">
												</label>
											</label>
										</section>
										<section class="col col-md-1">
											<p>Waktu</p>
										</section>
										<section class="col col-md-2">
											<label class="input">
												<input class="form-control" type="text" id="waktuawal" name="param[waktuawal]" value="08:00">
											</label>
										</section>
										<section class="col col-md-1">
    										S/D
    									</section>
    									<section class="col col-md-2">
											<label class="input">
												<input class="form-control" type="text" id="waktuakhir" name="param[waktuakhir]" value="14:00">
											</label>
										</section>
									</div>
								<div class="row">
									<section class="col col-md-6">
										<button type="button" class="btn btn-primary btn-sm" onclick="window.id_eksepsi='';cari()" ><i class="fa fa-search"> Cari </i></button>
									</section>
									<section class="col col-md-1">
											<p>Tempat Undangan</p>
										</section>
										<section class="col col-md-5">
											<label class="textarea"> 										
												<textarea rows="3" name="tempat_undangan" id="tempat_undangan">Ruang Sub Bid Penagihan dan Keberatan Pendapatan Daerah.Gedung Dinas Penanaman Modal dan Perizinan Lt.2 Kota Yogyakarta.
												</textarea> 
											</label>
										</section>
								</div>
								</div>
							</fieldset>
						</form>
				
			</div>
		</article>
	</div>
</section>
<section id="widget-grid-tetapan" style="" class="">
	<div class="well well-sm well-light">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-fsdfgs12441278"
				data-widget-editbutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-sortable="false"
				>
				<header role="heading">
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2> Hasil Pencarian </h2>
					<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->

						<!-- widget content -->
						<div class="table-responsive" style="max-width: 100%; height: 400px!important; overflow: auto;">

							<button type="button" class="btn btn-primary btn-sm" onclick="cetakword()">
								<i class="fa fa-print"></i> Cetak Surat Teguran
							</button>
							<button type="button" class="btn btn-primary btn-sm" onclick="cetakdaftar()">
								<i class="fa fa-print"></i> Cetak Daftar Teguran
							</button>                              


							<div class="" id="listdata">

							</div>

						</div>
						<!-- end widget content -->

					</div>
					<!-- end widget div -->

				</div>
				<!-- end widget -->

			</article>
		</div>
		<!-- end row -->
	</section>

	<script type="text/javascript">
		pageSetUp();

				// 	function sendTH() {
				// 	$('.th_pajak').prop("checked" , elemen.checked);
				// }

				// $(".th_pajak").click(function(event) {
				// 	if (!$(event.target).prop('checked')) {
				// 		window.TBLPENDATAAN_THNPAJAK += ','+$(event.target).val();
				// 	}
				// });

function cari() {
	if ($('#TBLREKENING_KODE').val()=='') {
		notifikasi('Informasi','Mohon Tentukan Jenis Pajak','failed',1,0);
	} else {	
		$("#the_preload_element").show();
		$.ajax({
			url: 'penagihan/Teguranskpdkb/cari',
			type: 'POST',
			data: {
				TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val(),
				tanggalsurat: $("#tanggalsurat").val(),
				TBLREKENING_KODE: $("#TBLREKENING_KODE").val(),
				TBLPENDATAAN_THNPAJAK : $('#TBLPENDATAAN_THNPAJAK').val(),
				TBLPENDATAAN_THNPAJAK_AKHIR : $('#TBLPENDATAAN_THNPAJAK_AKHIR').val()
			},
			success:function(respon) {
				$("#listdata").html(respon);
				$("#the_preload_element").hide();
			}
		})
		.fail(function() {
	        notifikasi('Informasi System','Data dalam database tidak lengkap','failed',1,0);
	    });
	}
}


function cetakword () {
	if ($('#no_surat').val()=='') {
		notifikasi('Informasi','Mohon Isikan Nomor Surat','failed',1,0);
	}else if ($('#tanggalsurat').val()=='') {
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
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/penagihan/Teguranskpdkb/cetakword/?data=' + q +"&TBLPENDATAAN_THNPAJAK="+$('#TBLPENDATAAN_THNPAJAK').val()+"&TBLPENDATAAN_THNPAJAK_AKHIR="+$('#TBLPENDATAAN_THNPAJAK_AKHIR').val()+"&TBLDAFTAR_NOPOK="+$('#TBLDAFTAR_NOPOK').val()+"&TBLREKENING_KODE="+$('#TBLREKENING_KODE').val()+"&no_surat="+$('#no_surat').val()+"&tglawal="+$('#tglawal').val()+"&tglakhir="+$('#tglakhir').val()+"&waktuawal="+$('#waktuawal').val()+"&waktuakhir="+$('#waktuakhir').val()+"&tempat_undangan="+$('#tempat_undangan').val()+"&tanggalsurat="+$('#tanggalsurat').val() );
	}   


		    	// window.open(window.APP_URL+'/pendataan/cetak_suratteguran/cetaksuratteguran');
		    }

		    function cetakdaftar () {

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
		    	window.open('<?= Yii::app()->getBaseUrl(1); ?>/penagihan/Teguranskpdkb/cetakdaftar/?data=' + q +"&TBLPENDATAAN_THNPAJAK="+$('#TBLPENDATAAN_THNPAJAK').val()+"&TBLPENDATAAN_THNPAJAK_AKHIR="+$('#TBLPENDATAAN_THNPAJAK_AKHIR').val()+"&TBLDAFTAR_NOPOK="+$('#TBLDAFTAR_NOPOK').val()+"&TBLREKENING_KODE="+$('#TBLREKENING_KODE').val()+"&no_surat="+$('#no_surat').val()+"&tglawal="+$('#tglawal').val()+"&tglakhir="+$('#tglakhir').val()+"&waktu="+$('#waktu').val()+"&tempat_undangan="+$('#tempat_undangan').val()+"&tanggalsurat="+$('#tanggalsurat').val() );
		    }   


		    	// window.open(window.APP_URL+'/pendataan/cetak_suratteguran/cetaksuratteguran');


		    	function validAngka(a)
		    	{
		    		if(!/^[0-9.]+$/.test(a.value))
		    		{
		    			a.value = a.value.substring(0,a.value.length-1000000000);
		    		}
		    	}


				// function send () {
				// 	$.ajax({
				// 		url: 'penagihan/Teguranskpdkb/cari',
				// 		type: 'POST',
				// 		data: {
				// 		TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val(),
				// 		}
				// 	});
				// }

				// 	function sendTH() {
				// 		if ($('#th_pajak').is(':checked')) {
				// 		window.TBLPENDATAAN_THNPAJAK += ','+$(event.target).val();
				// 		send();
				// 	}
				// }

				// function send () {
				// 	$.ajax({
				// 		url: 'penagihan/Teguranskpdkb/cari',
				// 		type: 'POST',
				// 		data: {
				// 		TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val(),
				// 		}
				// 	});
				// }
			</script>
<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Kartu Data Monitoring Pajak</h4>
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
											Tanggal Entri Monitoring
										</section>
										<section class="col col-md-2">
											<label class="input"><i class="icon-append fa fa-calendar"></i>
												<input type="text" id="tglentriawal" name="param[tglentriawal]" class="datepicker" data-dateformat="dd-mm-yy" >
											</label>
										</section> 
										<section class="col col-md-1">
											S / D
										</section>
										<section class="col col-md-2">
											<label class="input"><i class="icon-append fa fa-calendar"></i>
												<input type="text" id="tglentriakhir" name="param[tglentriakhir]" class="datepicker" data-dateformat="dd-mm-yy">
											</label>
										</section>

										<!-- <section class="col col-md-1">
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
										</section> -->					
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
											
									</div>
									
									
								<div class="row">
									<section class="col col-md-6">
										<button type="button" class="btn btn-primary btn-sm" onclick="window.id_eksepsi='';cari()" ><i class="fa fa-search"> Cari </i></button>
									</section>
									
								</div>
								</div>
							</fieldset>
						</form>
				
			</div>
		</article>
	</div>
</section>
<section id="widget-grid-tetapan-hiburan" style="" class="">
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
								<i class="fa fa-print"></i> Cetak Kartu Data
							</button>
							<!-- <button type="button" class="btn btn-primary btn-sm" onclick="cetakdaftar()">
								<i class="fa fa-print"></i> Cetak Daftar Teguran
							</button> -->                              


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

<section id="widget-grid-tetapan-hotel" style="" class="">
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

							<button type="button" class="btn btn-primary btn-sm" onclick="cetakwordhotel()">
								<i class="fa fa-print"></i> Cetak Kartu Data
							</button>
							<!-- <button type="button" class="btn btn-primary btn-sm" onclick="cetakdaftar()">
								<i class="fa fa-print"></i> Cetak Daftar Teguran
							</button> -->                              


							<div class="" id="listdatahotel">

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

<section id="widget-grid-tetapan-resto" style="" class="">
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

							<button type="button" class="btn btn-primary btn-sm" onclick="cetakwordresto()">
								<i class="fa fa-print"></i> Cetak Kartu Data
							</button>
							<!-- <button type="button" class="btn btn-primary btn-sm" onclick="cetakdaftar()">
								<i class="fa fa-print"></i> Cetak Daftar Teguran
							</button> -->                              


							<div class="" id="listdataresto">

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

<section id="widget-grid-tetapan-parkir" style="" class="">
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

							<button type="button" class="btn btn-primary btn-sm" onclick="cetakwordparkir()">
								<i class="fa fa-print"></i> Cetak Kartu Data
							</button>
							<!-- <button type="button" class="btn btn-primary btn-sm" onclick="cetakdaftar()">
								<i class="fa fa-print"></i> Cetak Daftar Teguran
							</button> -->                              


							<div class="" id="listdataparkir">

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

		jQuery(document).ready(function($) {
			$("#widget-grid-tetapan-hiburan").hide();
			$("#widget-grid-tetapan-hotel").hide();
			$("#widget-grid-tetapan-resto").hide();
			$("#widget-grid-tetapan-parkir").hide();
		});

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
	} else if ($('#tglentriawal').val()=='') {
		notifikasi('Informasi','Mohon Lengkapi Pencarian Tanggal','failed',1,0);
	} else if ($('#TBLREKENING_KODE').val()=='4.1.1.3.0') {	
		$("#the_preload_element").show();
		$.ajax({
			url: 'pendataan/kartudata_monitoring/cari',
			type: 'POST',
			data: {
				TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val(),
				tglentriawal: $("#tglentriawal").val(),
				tglentriakhir: $("#tglentriakhir").val(),
				TBLREKENING_KODE: $("#TBLREKENING_KODE").val()
			},
			success:function(respon) {
				$("#listdata").html(respon);
				$("#widget-grid-tetapan-hiburan").show();
				$("#the_preload_element").hide();
			}
		})
		.fail(function() {
	        notifikasi('Informasi System','Data dalam database tidak lengkap','failed',1,0);
	    });
	} else if ($('#TBLREKENING_KODE').val()=='4.1.1.1.0') {	
		$("#the_preload_element").show();
		$.ajax({
			url: 'pendataan/kartudata_monitoring/cari',
			type: 'POST',
			data: {
				TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val(),
				tglentriawal: $("#tglentriawal").val(),
				tglentriakhir: $("#tglentriakhir").val(),
				TBLREKENING_KODE: $("#TBLREKENING_KODE").val()
			},
			success:function(respon) {
				$("#listdatahotel").html(respon);
				$("#widget-grid-tetapan-hotel").show();
				$("#the_preload_element").hide();
			}
		})
		.fail(function() {
	        notifikasi('Informasi System','Data dalam database tidak lengkap','failed',1,0);
	    });
	} else if ($('#TBLREKENING_KODE').val()=='4.1.1.2.0') {	
		$("#the_preload_element").show();
		$.ajax({
			url: 'pendataan/kartudata_monitoring/cari',
			type: 'POST',
			data: {
				TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val(),
				tglentriawal: $("#tglentriawal").val(),
				tglentriakhir: $("#tglentriakhir").val(),
				TBLREKENING_KODE: $("#TBLREKENING_KODE").val()
			},
			success:function(respon) {
				$("#listdataresto").html(respon);
				$("#widget-grid-tetapan-resto").show();
				$("#the_preload_element").hide();
			}
		})
		.fail(function() {
	        notifikasi('Informasi System','Data dalam database tidak lengkap','failed',1,0);
	    });
	} else if ($('#TBLREKENING_KODE').val()=='4.1.1.7.0') {	
		$("#the_preload_element").show();
		$.ajax({
			url: 'pendataan/kartudata_monitoring/cari',
			type: 'POST',
			data: {
				TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val(),
				tglentriawal: $("#tglentriawal").val(),
				tglentriakhir: $("#tglentriakhir").val(),
				TBLREKENING_KODE: $("#TBLREKENING_KODE").val()
			},
			success:function(respon) {
				$("#listdataparkir").html(respon);
				$("#widget-grid-tetapan-parkir").show();
				$("#the_preload_element").hide();
			}
		})
		.fail(function() {
	        notifikasi('Informasi System','Data dalam database tidak lengkap','failed',1,0);
	    });
	}
}


function cetakword () {
	
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
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendataan/kartudata_monitoring/cetakword/?data=' + q +"&TBLPENDATAAN_THNPAJAK="+$('#TBLPENDATAAN_THNPAJAK').val()+"&TBLPENDATAAN_BLNPAJAK="+$('#TBLPENDATAAN_BLNPAJAK').val()+"&TBLDAFTAR_NOPOK="+$('#TBLDAFTAR_NOPOK').val()+"&TBLREKENING_KODE="+$('#TBLREKENING_KODE').val()+"&tglentriawal="+$('#tglentriawal').val()+"&tglentriakhir="+$('#tglentriakhir').val());
	  


		    	// window.open(window.APP_URL+'/pendataan/cetak_suratteguran/cetaksuratteguran');
}

function cetakwordhotel () {
	
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
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendataan/kartudata_monitoring/cetakwordhotel/?data=' + q +"&TBLPENDATAAN_THNPAJAK="+$('#TBLPENDATAAN_THNPAJAK').val()+"&TBLPENDATAAN_BLNPAJAK="+$('#TBLPENDATAAN_BLNPAJAK').val()+"&TBLDAFTAR_NOPOK="+$('#TBLDAFTAR_NOPOK').val()+"&TBLREKENING_KODE="+$('#TBLREKENING_KODE').val()+"&tglentriawal="+$('#tglentriawal').val()+"&tglentriakhir="+$('#tglentriakhir').val());
	  


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
		    	window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendataan/kartudata_monitoring/cetakdaftar/?data=' + q +"&TBLPENDATAAN_THNPAJAK="+$('#TBLPENDATAAN_THNPAJAK').val()+"&TBLPENDATAAN_THNPAJAK_AKHIR="+$('#TBLPENDATAAN_THNPAJAK_AKHIR').val()+"&TBLDAFTAR_NOPOK="+$('#TBLDAFTAR_NOPOK').val()+"&TBLREKENING_KODE="+$('#TBLREKENING_KODE').val()+"&no_surat="+$('#no_surat').val()+"&tglentriawal="+$('#tglentriawal').val()+"&tglentriakhir="+$('#tglentriakhir').val()+"&waktu="+$('#waktu').val()+"&tempat_undangan="+$('#tempat_undangan').val()+"&tanggalsurat="+$('#tanggalsurat').val() );
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
				// 		url: 'pendataan/kartudata_monitoring/cari',
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
				// 		url: 'pendataan/kartudata_monitoring/cari',
				// 		type: 'POST',
				// 		data: {
				// 		TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val(),
				// 		}
				// 	});
				// }
			</script>
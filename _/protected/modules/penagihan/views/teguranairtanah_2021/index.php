<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Teguran SKPD Air Tanah</h4>
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
														<input type="text" id="TBLDAFTAR_NOPOK" name="param[TBLDAFTAR_NOPOK]"  onkeyup="validAngka(this)">
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
															<input type="number" value="<?php echo date('Y'); ?>" class="form-control" id="TBLPENDATAAN_THNPAJAKA"  name="param[TBLPENDATAAN_THNPAJAKA]">
														</label>
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-3" >
													S / D
												</section>
												<section class="col col-md-4">
													<label class="select">
														<label class="input">
															<input type="number" disabled="disabled" class="form-control" id="TBLPENDATAAN_THNPAJAKK" name="param[TBLPENDATAAN_THNPAJAKK]">
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
															<option value="SKPD" >SKPD</option>
														</select>
													</label>
												</section>
											</div>
										</section>
										<section class="col col-md-6">
											<div class="row">
												<section class="col col-md-2">
													<p>Nomor Surat</p>
												</section>
												<section class="col col-md-7">
													<label class="input">
														<input class="form-control" type="text" id="no_surat" name="no_surat" autocomplete="off">
													</label>
												</section>		
											</div>
											<div class="row">
												<section class="col col-md-2">
													Tanggal Undangan
												</section>
												<section class="col col-md-4">
													<label class="input"><i class="icon-append fa fa-calendar"></i>
														<input type="text" id="tglawal" name="tglawal" class="datepicker" data-dateformat="dd-mm-yy" >
													</label>
												</section> 
												<section class="col col-md-2">
													S / D
												</section>
												<section class="col col-md-4">
													<label class="input"><i class="icon-append fa fa-calendar"></i>
														<input type="text" id="tglakhir" name="tglakhir" class="datepicker" data-dateformat="dd-mm-yy">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">
													<p>Tempat Undangan</p>
												</section>
												<section class="col col-md-8">
													<label class="textarea"> 										
														<textarea rows="3" name="tempat_undangan" id="tempat_undangan">Sub Bid. Penagihan dan Keberatan Pajak Daerah, Gedung Aset Lantai 2
														</textarea> 
													</label>
												</section>
											</div>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											
										</section>
										<section class="col col-md-4">
											<button type="button" class="btn btn-primary btn-sm" onclick="window.id_eksepsi='';cari()" > <i class="fa fa-search"> Cari </i></button>
										</section>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</article>
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
									
										
											<button type="button" class="btn btn-primary btn-sm" onclick="cetakdaftar('excel')">
												<i class="fa fa-print"></i> Cetak Daftar Teguran
											</button>
											<button type="button" class="btn btn-primary btn-sm" onclick="cetakWord()">
												<i class="fa fa-print"></i> Cetak Surat Teguran
											</button> 
											<button type="button" class="btn btn-primary btn-sm" onclick="cetakdaftar2('excel')">
												<i class="fa fa-print"></i> Cetak Daftar Tagihan Keseluruhan 
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
	window.id_eksepsi = '';

	jQuery(document).ready(function($) {
		$("#TBLPENDATAAN_THNPAJAKK").val(Number(<?php echo date('Y') ?>)+4); 
	});

	$("#TBLPENDATAAN_THNPAJAKA").change(function() {
		$("#TBLPENDATAAN_THNPAJAKK").val(Number($("#TBLPENDATAAN_THNPAJAKA").val())+4); 
	});



	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWPHotel();
	});

	pageSetUp();
	function cari() {
		$("#the_preload_element").show();
		$.ajax({
			url: 'penagihan/Teguranairtanah_2021/cari',
			type: 'POST',
			data: {
				
				TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val(),
				TBLPENDATAAN_THNPAJAKA: $("#TBLPENDATAAN_THNPAJAKA").val(),
				TBLPENDATAAN_THNPAJAKK: $("#TBLPENDATAAN_THNPAJAKK").val(),
			},
			success:function(respon) {
				$("#listdata").html(respon);
				$("#the_preload_element").hide();
			}
		});
	}


	function cetakWord () {

		if ($('#no_surat').val()=='') {
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
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/penagihan/Teguranairtanah_2021/cetakword/?data=' + q +"&TBLPENDATAAN_THNPAJAKA="+$('#TBLPENDATAAN_THNPAJAKA').val()+"&TBLPENDATAAN_THNPAJAKK="+$('#TBLPENDATAAN_THNPAJAKK').val()+"&TBLDAFTAR_NOPOK="+$('#TBLDAFTAR_NOPOK').val()+"&no_surat="+$('#no_surat').val()+"&tglawal="+$('#tglawal').val()+"&tglakhir="+$('#tglakhir').val() );
		}   

		
    	// window.open(window.APP_URL+'/pendataan/cetak_suratteguran/cetaksuratteguran');
    }

    function cetakdaftar () {

		if ($('#no_surat').val()=='') {
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
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/penagihan/Teguranairtanah_2021/cetakdaftar/?data=' + q +"&TBLPENDATAAN_THNPAJAKA="+$('#TBLPENDATAAN_THNPAJAKA').val()+"&TBLPENDATAAN_THNPAJAKK="+$('#TBLPENDATAAN_THNPAJAKK').val()+"&TBLDAFTAR_NOPOK="+$('#TBLDAFTAR_NOPOK').val()+"&no_surat="+$('#no_surat').val()+"&tglawal="+$('#tglawal').val()+"&tglakhir="+$('#tglakhir').val() );
		}   

		
    	// window.open(window.APP_URL+'/pendataan/cetak_suratteguran/cetaksuratteguran');
    }

    function generateAutocompleteWPHotel() {
			$('#TBLDAFTAR_NOPOK').autocomplete({
				serviceUrl: 'penagihan/Teguranairtanah_2021/autocomplete',

				onSelect: function (suggestion) {
		        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
		        window.id = suggestion.data;
		        window.nopok = suggestion.TBLDAFTAR_NOPOK;
		        window.nama = suggestion.TBLDAFTAR_PEMILIKNAMA;
		        window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
		        $(this).val(suggestion.value);
		        $('#TBLDAFTAR_NOPOK').val(suggestion.value.split(' | ')[0]);
		        $('#TBLDAFTAR_PEMILIKNAMA').val(nama);
		        $('#TBLDAFTAR_BADANUSAHAALAMAT').val(alamat);

		    }
		    ,showNoSuggestionNotice : true
		    ,noCache : true
		    ,noSuggestionNotice : "Tidak ditemukan hasil"
		});
		}

  	function cetakdaftar2 (jenis) {
			var TBLDAFTAR_NOPOK = $('#TBLDAFTAR_NOPOK').val();
			var TBLPENDATAAN_THNPAJAKA = $('#TBLPENDATAAN_THNPAJAKA').val();
			var TBLPENDATAAN_THNPAJAKK = $('#TBLPENDATAAN_THNPAJAKK').val();

			window.open('<?php echo Yii::app()->getBaseUrl(1) ?>/penagihan/Teguranairtanah_2021/Cetak?jenis='+jenis+'&TBLDAFTAR_NOPOK='+TBLDAFTAR_NOPOK+'&TBLPENDATAAN_THNPAJAKA='+TBLPENDATAAN_THNPAJAKA+'&TBLPENDATAAN_THNPAJAKK='+TBLPENDATAAN_THNPAJAKK);
		}



    function validAngka(a)
    {
    	if(!/^[0-9.]+$/.test(a.value))
    	{
    		a.value = a.value.substring(0,a.value.length-1000000000);
    	}
    }
</script>
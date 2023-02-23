<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>Salin Dari Bulan Sebelumnya</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-teguran" 
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
					<h2>Pilih Data Sumber</h2>

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
									<section class="col col-md-2">
										<p>Nomor Pokok</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="TBLDAFTAR_NOPOK" name="TBLDAFTAR_NOPOK">
										</label>
									</section>
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-3">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select class="select2" id="REFKECAMATAN_ID" name="REFKECAMATAN_ID">
												<option value="">-- Pilih Kecamatan --</option>
												<?php foreach ($data['kecamatan'] as $list): ?>
													<option value="<?php echo $list['REFKECAMATAN_ID'] ?>"><?php echo $list['REFKECAMATAN_NAMA'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Jenis Pajak </p>
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select class="select2" id="TREKENING_KODE" name="TREKENING_KODE">
												<option value="">-- Pilih Rekening --</option>
												<?php foreach ($data['rek'] as $list): ?>
													<option value="<?php echo $list['TBLREKENING_REKAYAT'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
									<section class="col col-md-2">
										<p>Kelurahan</p>
									</section>
									<section class="col col-md-3">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select class="select2" id="REFKELURAHAN_ID" name="REFKELURAHAN_ID">
												<option value="">-- Pilih Kelurahan --</option>
												<?php foreach ($data['kelurahan'] as $list): ?>
													<option value="<?php echo $list['REFKELURAHAN_ID'] ?>"><?php echo $list['REFKELURAHAN_NAMA'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Masa Pajak </p>
									</section>
									<section class="col col-md-1">
										<label class="select">
											<label class="input">
												<input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="TBLPENDATAAN_THNPAJAK" name="TBLPENDATAAN_THNPAJAK">
											</label>
										</label>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" id="TBLPENDATAAN_BLNPAJAK" name="TBLPENDATAAN_BLNPAJAK">
												<option value="01">Januari</option>
												<option value="02">Februari</option>
												<option value="03">Maret</option>
												<option value="04">April</option>
												<option value="05">Mei</option>
												<option value="06">Juni</option>
												<option value="07">Juli</option>
												<option value="08">Agustus</option>
												<option value="09">September</option>
												<option value="10">Oktober</option>
												<option value="11">November</option>
												<option value="12">Desember</option>
											</select>
										</label>
									</section>
									<section class="col col-md-2">
										<p>Nomor Surat</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="nomor_surat" name="nomor_surat">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Jenis Badan Usaha</p>
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select class="select2" id="TREKENINGSUB_KODE" name="TREKENINGSUB_KODE">
												<option value="">-- Pilih Sub Rekening --</option>
												<?php foreach ($data['sub_rek'] as $list): ?>
													<option value="<?php echo $list['TREKENING_KODE'] ?>">[<?php echo $list['TREKENING_KODE'] ?>] <?php echo $list['TREKENING_NAMA'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
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
	<!-- end row -->


	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-orange" id="wid-id-data_sauus" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
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
					<h2>&nbsp;Data</h2>

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
						<p class="alert alert-info"> 
							<button type="button" class="btn btn-default" onclick="salin()">
              					Proses <i class="fa fa-forward"></i> 
              				</button>					
						</p>

						<div id="div_tabel" class="" style="overflow-y: scroll;overflow-x: scroll;height: 300px;width: 100%;">
							
						</div>
						
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>
		<!-- WIDGET END -->

	</div>
</section>

<section id="widget-grid-tetapan" style="display: none;" class="">
	<div class="well well-sm well-light">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-salin-daribulansebelumnya"
					data-widget-editbutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-sortable="false"
					>
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>Data</h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">

						</div>
						<div class="widget-body no-padding">
							<div class="widget-body-toolbar">
								<button class="btn btn-sm btn-primary btnprosestap" onclick="salin()" type="button">
									<i class="fa fa-forward"></i> Proses
								</button>
							</div>
							<div id="div_table" style="overflow-y: scroll;overflow-x: scroll;height: 300px;width: 100%;">
								
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div>
</section>

<!--Modal Salin-->
<div class="modal fade" id="salin_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					 Form Proses Salin
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form class="smart-form" id="form-pemohon">
					<fieldset>
						<div class="row">
							<section class="col col-md-3">
								<p>Tahun Penetapan </p>
							</section>
							<section class="col col-md-6">
								<label class="select">
									<select class="select2" id="TBLPENDATAAN_THNPAJAK_SALIN" name="TBLPENDATAAN_THNPAJAK_SALIN">
										<option selected="">-- Silahkan Pilih Tahun --</option>
										<option value="18">2018</option>
										<option value="17">2017</option>
										<option value="16">2016</option>
										<option value="15">2015</option>
									</select>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-3">
								<p>Bulan Penetapan </p>
							</section>
							<section class="col col-md-6">
								<label class="select">
									<select class="select2" name="TBLPENDATAAN_BLNPAJAK_SALIN" id="TBLPENDATAAN_BLNPAJAK_SALIN">
										<option selected="">-- Silahkan Pilih Bulan --</option>
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
						</div>
					</fieldset>	

					<footer>
						<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="simpan_salin()">
							Salin
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
					</footer>
				</form>							


			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
	pageSetUp();

	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';
		
	jQuery(document).ready(function($) {
		// reloadDT('dt_basic');
	});

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWP();
	});

	$("#TREKENINGSUB_KODE").change(function(event) {
		generateAutocompleteWP();
	});

	function generateAutocompleteWP() {
		var kode_rek = $('#TREKENINGSUB_KODE').select2('val');
		$('#TBLDAFTAR_NOPOK').autocomplete({
			serviceUrl: 'pendataan/salin_daribulansebelumya/autocompletewp',
			params: {kode: kode_rek},
			onSelect: function (suggestion) {
		        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
		        window.id = suggestion.data;
		        window.nopokok = suggestion.TBLDAFTAR_NOPOK;
		        window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
		        window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
		        $(this).val(suggestion.value);
		        $('#TBLDAFTAR_NOPOK').val(suggestion.value.split(' | ')[0]);

		    }
		    ,showNoSuggestionNotice : true
		    ,noCache : true
		    ,noSuggestionNotice : "Tidak ditemukan hasil"
		});
	}

	function cari() {

		var REK = $('#TREKENING_KODE').select2('val');
		if (REK=='') {
			notifikasi('Informasi','Mohon Pilih Rekening','failed',1,0);
			return false;
		}
		$("#div_tabel").html('<div align="center">'+LOADER+'').fadeIn(400);

		$.ajax({
			url: 'pendataan/salin_daribulansebelumya/cari',
			type: 'POST',
			data: {
				rekening: $("#TREKENING_KODE").val()
				, TBLDAFTAR_NOPOK : $("#TBLDAFTAR_NOPOK").val()
				, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
				, TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").select2('val')
				, REFKELURAHAN_ID : $("#REFKELURAHAN_ID").select2('val')
				, REFKECAMATAN_ID : $("#REFKECAMATAN_ID").select2('val')
			},
		})
		.done(function(respon) {
			$("#div_tabel").html(respon);
			$(".loader_img").fadeOut(1000);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}

	function salin() {
		$('#salin_data').modal('show');
	}

	function simpan_salin() {
		arridPajak = [];

		$("input[name='nopokPajak']:checked").each(function() {
			arridPajak.push(this.value);
		});

		count = 0;
		for(x in arridPajak) {
			count++;
		}

		if (count>0) {
			daftaridPajak = arridPajak.toString();

			$.SmartMessageBox({
			title : "Konfirmasi", // judul Smart Alert
			content : "Apakah anda yakin akan menyalin data terpilih?", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'pendataan/salin_daribulansebelumya/SalinData',
					type: 'POST',
					dataType: 'json',
					data: {
						 listData: btoa(daftaridPajak)
						,rekening: $("#TREKENING_KODE").val()
						,TBLPENDATAAN_THNPAJAK_SALIN: $('#TBLPENDATAAN_THNPAJAK_SALIN').select2('val')
						,TBLPENDATAAN_BLNPAJAK_SALIN: $('#TBLPENDATAAN_BLNPAJAK_SALIN').select2('val')
					},
					beforeSend: function() {
						loadingTransfer('open');
						$("#dialog-message").modal('show');
					},
					success: function(respon) {
						// if (respon.status=="success") {
							setTimeout(function() {
								loadingTransfer('close');
								$("#dialog-message").modal('hide');
								$('.btnprosestap').hide();
							 	$("#dialog-message").modal('hide');

							 	
								
							 	
							 	$.each(respon.failed, function(index, val) {
							 	// 	$.SmartMessageBox({
									// 	title : "Konfirmasi", // judul Smart Alert
									// 	content : "Maaf Nopok "+val+", tidak bisa disalin", // konten dari smart alert
									// 	buttons : '[Tidak][Ya]' // pengaturan tombol
									// }, function(ButtonPressed) {
									// 	if (ButtonPressed === "Ya") {

									// 	}
									// })

									// notifikasi('Maaf','Nopok '+val+' ,tidak bisa disalin','failed',0,1);
									notifikasi('Maaf','Nopok '+val+' ,tidak bisa disalin','failed',1,0);
							 		 /* iterate through array or object */
							 	});
								// notifikasi('Sukses','Data berhasil di salin','success',1,0);
							}, 500);
						// } else {
							// notifikasi('Informasi','Maaf , Data gagal disalin.','failed',1,0)
						// }						
					}
				})
				.always(function() {
					console.log("complete");
					loadingTransfer('close');
					notifikasi('Sukses','Data berhasil di salin','success',1,0);
				});	
			}
		});

		} else {
			notifikasi('Informasi','Mohon pilih Data yg akan di salin , dengan mencentang Data.','fail',1,0)
		}

		return false;
	}

	function cekSudahSalin() {
		$.ajax({
			url: '/path/to/file',
			type: 'default GET (Other values: POST)',
			dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {param1: 'value1'},
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}

	function loadingTransfer(ev) {
		/*ev{open|close}*/
		$('#dialog-message').dialog(ev);
		$(".ui-dialog-titlebar-close").hide();
	}

</script>
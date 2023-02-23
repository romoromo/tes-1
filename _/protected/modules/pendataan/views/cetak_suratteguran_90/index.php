<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Proses E-Teguran</h4>
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
									<section class="col col-md-4">
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
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TREKENINGSUB_KODE" name="TREKENINGSUB_KODE">
												<option value="">-- Pilih Rekening --</option>
												<?php foreach ($data['rek'] as $list): ?>
													<option data-rek="<?php echo $list['TBLREKENING_KODE'] ?>" value="<?php echo $list['TBLREKENING_REKAYAT'] ?>">[<?php echo $list['TBLREKENING_KODE_90'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING_90'] ?></option>
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
									<section class="col col-md-2 hidden">
										<p>Jenis Badan Usaha</p>
									</section>
									<section class="col col-md-3 hidden">
										<label class="select">
											<select class="select2" id="TREKENINGSUB_KODE" name="TREKENINGSUB_KODE">
												<option value="">-- Pilih Sub Rekening --</option>
												<?php foreach ($data['sub_rek'] as $list): ?>
													<option value="<?php echo $list['TREKENING_KODE'] ?>">[<?php echo $list['TREKENING_KODE'] ?>] <?php echo $list['TREKENING_NAMA'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>

									<section class="col col-md-2">
										<p>Masa Pajak </p>
									</section>
									<section class="col col-md-2">
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
									<section class="col col-md-2 hidden">
										<p>Status EMail</p>
									</section>
									<section class="col col-md-2 hidden">
										<label class="select">
											<select class="select2" id="STATUS_EMAIL" name="STATUS_EMAIL">
												<option value="ADA">Ada</option>
												<option value="KOSONG">Kosong</option>
											</select>
										</label>
									</section>
									<section class="col col-md-2 hidden"></section>
									<section class="col col-md-2">
										<p>Status Akun ESPTPD</p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" id="STATUS_AKUN_ESPTPD" name="STATUS_AKUN_ESPTPD">
												<option selected value="">Semua</option>
												<option value="PUNYA">Punya</option>
												<option value="TIDAK PUNYA">Tidak Punya</option>
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
							<?php if (Tblrole::model()->isRole('SUPERADMIN') OR in_array(Yii::app()->user->role_id, array(3)) ): ?>
							<button type="button" class="btn btn-default" onclick="cetak()">
								<i class="fa fa-print"></i> Proses Teguran
							</button>
							<button type="button" class="btn btn-default" onclick="cetaksemua()">
								<i class="fa fa-print"></i> Proses Teguran Semua
							</button>
							<?php endif ?>
							<?php /*if (Tblrole::model()->isRole('SUPERADMIN') OR in_array(Yii::app()->user->role_id, array(96,97)) ): ?>
							<button type="button" class="btn btn-default" onclick="">
								<i class="fa fa-print"></i> Verifikasi Semua Teguran
							</button>
							<?php endif*/ ?>
							<?php if (Tblrole::model()->isRole('SUPERADMIN') OR in_array(Yii::app()->user->role_id, array(3, 96,97)) ): ?>
							<button type="button" class="btn btn-default" onclick="cetakWord()">
								<i class="fa fa-print"></i> Cetak Kartu Data Teguran
							</button>							
							<?php endif ?>
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
									<select name="jenis_penerimaan">
										<option selected="" disabled="">== Silahkan Pilih ==</option>
										<option>2017</option>
										<option>2016</option>
									</select> <i></i> 
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-3">
								<p>Bulan Penetapan </p>
							</section>
							<section class="col col-md-6">
								<label class="select">
									<select name="jenis_penerimaan">
										<option selected="" disabled="">== Silahkan Pilih ==</option>
										<option>Januari</option>
										<option>Februari</option>
										<option>Maret</option>
										<option>April</option>
										<option>Mei</option>
										<option>Juni</option>
										<option>Juli</option>
										<option>Agustus</option>
										<option>September</option>
										<option>Oktober</option>
										<option>November</option>
										<option>Desember</option>
									</select> <i></i> 
								</label>
							</section>
						</div>
					</fieldset>	

					<footer>
						<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="simpan()">
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
	
	window.APP_URL = "<?php echo $data['URL_APP']; ?>";
    
    function cetak() {

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
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/<?= $this->MODULE_URL ?>/cetaksuratteguran/?data=' + q +"&TBLPENDATAAN_THNPAJAK="+$('#TBLPENDATAAN_THNPAJAK').val()+"&TBLPENDATAAN_BLNPAJAK="+$('#TBLPENDATAAN_BLNPAJAK').select2('val')+"&nomor_surat="+$('#nomor_surat').val()+"&rekening="+$("#TREKENINGSUB_KODE").val() );
    	}    	
    	// window.open(window.APP_URL+'/<?= $this->MODULE_URL ?>/cetaksuratteguran');
	}
    
    function cetak_record(nopokok) {

    	if ($('#nomor_surat').val()=='') {
    		notifikasi('Informasi','Mohon Isikan Nomor Surat','failed',1,0);
    	} else {
			var q = nopokok;
			var param = {
				data: q,
				TBLPENDATAAN_THNPAJAK: $('#TBLPENDATAAN_THNPAJAK').val(),
				TBLPENDATAAN_BLNPAJAK: $('#TBLPENDATAAN_BLNPAJAK').select2('val'),
				nomor_surat: $('#nomor_surat').val(),
				rekening: $('#TREKENINGSUB_KODE').val(),
				is_draft: 'T',
			}
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/<?= $this->MODULE_URL ?>/cetaksuratteguran/?' + $.param(param) );
    	}    	
    	// window.open(window.APP_URL+'/<?= $this->MODULE_URL ?>/cetaksuratteguran');
	}

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWP();
	});

	$("#TREKENINGSUB_KODE").change(function(event) {
		generateAutocompleteWP();
	});

	function generateAutocompleteWP() {
		var kode_rek = $('#TREKENINGSUB_KODE').select2('val');
		$('#TBLDAFTAR_NOPOK').autocomplete({
			serviceUrl: 'pendataan/cek_data_perwptahun/autocompletewp',
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

    window.APP_URL = "<?php echo $data['URL_APP']; ?>";
    
    function cetaksemua() {

    	if ($('#nomor_surat').val()=='') {
    		notifikasi('Informasi','Mohon Isikan Nomor Surat','failed',1,0);
    	} else {
    		
    		/*$.ajax({
				url: '<?= $this->MODULE_URL ?>/cetaksemua',
				type: 'POST',
				data: {
					rekening: $("#TREKENINGSUB_KODE").val()
					, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
					, TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").select2('val')
					, TBLDAFTAR_NOPOK : $("#TBLDAFTAR_NOPOK").val()
					, nomor_surat : $('#nomor_surat').val()
				},
			})*/

			// var q = daftaridPajak;
			var param = {
				data: '',
				TBLPENDATAAN_THNPAJAK: $('#TBLPENDATAAN_THNPAJAK').val(),
				TBLPENDATAAN_BLNPAJAK: $('#TBLPENDATAAN_BLNPAJAK').val(),
				nomor_surat: $('#nomor_surat').val(),
				rekening: $('#TREKENINGSUB_KODE').val(),
				STATUS_AKUN_ESPTPD: $('#STATUS_AKUN_ESPTPD').val(),
			}
			// window.open('<?= Yii::app()->getBaseUrl(1); ?>/<?= $this->MODULE_URL ?>/cetaksemua/?data='+"&TBLPENDATAAN_THNPAJAK="+$('#TBLPENDATAAN_THNPAJAK').val()+"&TBLPENDATAAN_BLNPAJAK="+$('#TBLPENDATAAN_BLNPAJAK').select2('val')+"&nomor_surat="+$('#nomor_surat').val()+"&rekening="+$("#TREKENINGSUB_KODE").val() );
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/<?= $this->MODULE_URL ?>/cetaksemua/?' + $.param(param) );
    	}
	}	

	jQuery(document).ready(function($) {
		// reloadDT2('dt_basic');
	});

	function cari() {

		var REK = $('#TREKENINGSUB_KODE').select2('val');
		if (REK=='') {
			notifikasi('Informasi','Mohon Pilih Rekening','failed',1,0);
			return false;
		}

		$.ajax({
			url: '<?= $this->MODULE_URL ?>/cari',
			type: 'POST',
			data: {
				rekening: $("#TREKENINGSUB_KODE").val(),
				TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val(),
				TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").select2('val'),
				TBLDAFTAR_NOPOK : $("#TBLDAFTAR_NOPOK").val(),
				REFKECAMATAN_ID : $("#REFKECAMATAN_ID").val(),
				REFKELURAHAN_ID : $("#REFKELURAHAN_ID").val(),
				STATUS_EMAIL : $("#STATUS_EMAIL").val(),
				STATUS_AKUN_ESPTPD : $("#STATUS_AKUN_ESPTPD").val(),
			},
		})
		.done(function(respon) {
			$("#div_tabel").html(respon);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}

	function salin () {
		$('#salin_data').modal('show');
	}

	function simpan () {
		$.smallBox({
			title : "Success",
			content : "<i class='fa fa-save'></i><i> Data Berhasil Disimpan</i>",
			color : "#296191",
			iconSmall : "fa fa-thumbs-up bounce animated",
			timeout : 1000			
		});
	}

	function cetakWord(jenis) {
		var param = (
		{
			rekening: $("#TREKENINGSUB_KODE option:selected").data('rek'),
			TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val(),
			TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").val(),
			TBLPENDATAAN_TGLPAJAK: $("#TBLPENDATAAN_TGLPAJAK").val(),
			TBLREKENING_KODESUB: $("#TBLREKENING_KODESUB").val(),
			ENTRI_THNPAJAK: '', //$("#ENTRI_THNPAJAK").val(),
			ENTRI_BLNPAJAK: '', //$("#ENTRI_BLNPAJAK").select2('val'),
			ENTRI_TGLPAJAK: '', //$("#ENTRI_TGLPAJAK").val(),
			TBLKECAMATAN_ID: $("#TBLKECAMATAN_ID").val(),
			// ISONLINE: $("#ISONLINE").select2('val'),
			
		}
		);
		if (param.rekening == null) {
			notifikasi('Maaf', 'Mohon pilih rekening terlebih dahulu', 'x', 1, 0)
		}
		param = jQuery.param(param)
		// var URL_APLIKASI = "<?php echo Yii::app()->getBaseUrl(1); ?>";
		window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/pendataan/cetak_kartudata_teguran/cetakWord?' + param);
	}

</script>
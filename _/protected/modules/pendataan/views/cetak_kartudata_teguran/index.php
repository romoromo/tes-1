<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Cetak Kartu Data E-Teguran</h4>
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
										<p>Masa Pajak</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input maxlength="2" value="<?php echo date('Y'); ?>" type="number" id="TBLPENDATAAN_THNPAJAK" name="param[TBLPENDATAAN_THNPAJAK]" placeholder="Tahun" maxlength="4">
										</label>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" id="TBLPENDATAAN_BLNPAJAK" name="param[TBLPENDATAAN_BLNPAJAK]">
												<option value="">-- Bulan --</option>
												<?php for ($i=1; $i<=12; $i++): ?>
													<option <?php //echo $i==(int)date('m') ? 'selected' : '' ?> value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
												<?php endfor ?>
											</select>
										</label>
									</section>

									<section class="col col-md-2 hidden">
										<label class="input">
											<input maxlength="2" type="number" id="TBLPENDATAAN_TGLPAJAK" name="param[TBLPENDATAAN_TGLPAJAK]" placeholder="Tanggal" maxlength="2">
										</label>
									</section>
								</div>
							<div class="row">
									<section class="col col-md-2">
										<p>Rekening</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TBLREKENING_KODE" name="TBLREKENING_KODE">
												<option value="">-- Pilih Rekening --</option>
												<?php foreach ($data['rek'] as $list): ?>
													<option value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE_90'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING_90'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>

									<section class="col col-md-4 hidden">
										<label class="select">
											<select class="select2" id="TBLREKENING_KODESUB" name="TBLREKENING_KODESUB">
												<option value="">-- Pilih Sub Rekening --</option>
												<?php /*foreach ($data['sub_rek'] as $list): ?>
													<option value="<?php echo $list['TREKENING_KODE'] ?>">[<?php echo $list['TREKENING_KODE'] ?>] <?php echo $list['TREKENING_NAMA'] ?></option>
												<?php endforeach*/ ?>
											</select>
										</label>
									</section>

									<section class="col col-md-2 hidden">
										<label class="select">
											<select class="select2" id="KODE_JENIS" name="KODE_JENIS">
												<option value="">-- Pilih Kode --</option>
												<option value="T">Tetap</option>
												<option value="I">Insidentil</option>
											</select>
										</label>
									</section>

								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Posisi Data E-Teguran</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="STATUS_DATA" name="STATUS_DATA">
												<option value="">SEMUA</option>
												<option value="petugas">PETUGAS PENDATAAN</option>
												<option value="kasubid">SUB KOORDINATOR</option>
												<option value="kabid">KABID</option>
												<option value="wp">SELESAI VERIFIKASI KABID</option>
											</select>
										</label>
									</section>
								</div>
								<div class="row hidden">
									<section class="col col-md-2">
										<p>Tgl. Entry SPT</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input maxlength="2" type="number" id="ENTRI_THNPAJAK" name="param[ENTRI_THNPAJAK]" placeholder="Tahun" maxlength="4">
										</label>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" id="ENTRI_BLNPAJAK" name="param[ENTRI_BLNPAJAK]">
												<option value="">-- Bulan --</option>
												<?php for ($i=1; $i<=12; $i++): ?>
													<option <?php //echo $i==(int)date('m') ? 'selected' : '' ?> value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
												<?php endfor ?>
											</select>
										</label>
									</section>

									<section class="col col-md-2">
										<label class="input">
											<input maxlength="2" value="<?php //= date('d') ?>" type="number" id="ENTRI_TGLPAJAK" name="param[ENTRI_TGLPAJAK]" placeholder="Tanggal" maxlength="2">
										</label>
									</section>
								</div>
								<div class="row hidden">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TBLKECAMATAN_ID" name="TBLKECAMATAN_ID">
												<option value="">-- Pilih Kecamatan --</option>
												<?php foreach ($data['list_kecamatan'] as $list): ?>
													<option value="<?php echo $list['REFKECAMATAN_ID'] ?>">[<?php echo $list['REFKECAMATAN_ID'] ?>] <?php echo $list['REFKECAMATAN_NAMA'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="ISONLINE" name="ISONLINE">
												<option value="">-- Pilih Status SPTPD --</option>
													<option value="T">ONLINE (Entrian Dari SPTPD)</option>
													<option value="F">OFFLINE (Entrian Dari SIMPADA)</option>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Status Kirim</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="STATUS_KIRIM" name="STATUS_KIRIM">
												<option selected value="">SEMUA</option>
												<option value="ONLINE">ONLINE (via E-SPTPD)</option>
												<option value="OFFLINE">OFFLINE (via POS)</option>
											</select>
										</label>
									</section>
								</div>

							<div class="row">
									<section class="col col-md-2">
										<p>Status Terima Surat</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="STATUS_TERIMA" name="STATUS_TERIMA">
												<option selected value="">SEMUA</option>
												<option value="SUDAH">SUDAH DI TERIMA</option>
												<option value="BELUM">BELUM DI DOWNLOAD</option>
											</select>
										</label>
									</section>
								</div>
								<!-- <div class="row">
									<section class="col col-md-2">
										<p>Tahun Penetapan </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tanggal_daftar" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_jobang">
										</label>
									</section>
								</div> -->
								<div class="row hidden">
									<section class="col col-md-2">
										<p>Cara Penetapan</p>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input type="nopok" name="" id="nopok">
										</label>
									</section> S/O
								</div>

								
							</fieldset>		
							<footer>
								<button type="button" onclick="cetakWord()" class="btn btn-sm btn-primary">
									<i class="fa fa-print"></i>&nbsp;Cetak Daftar Teguran
								</button>
								<?php if (Tblrole::model()->isRole('SUPERADMIN') 
								OR in_array(Yii::app()->user->role_id, array(3)) 
								): ?>
								<button type="button" onclick="cetakrekaptahunan()" class="btn btn-sm btn-success">
									<i class="fa fa-print"></i>&nbsp;Cetak Rekap Teguran Tahunan
								</button>
								<button type="button" class="btn btn-default" onclick="cetakulang()">
									<i class="fa fa-print"></i> Cetak Ulang Surat Teguran
								</button>
								
								<?php endif ?>
								<button type="button" onclick="cetak()" class="btn btn-sm btn-success hidden">
									<i class="fa fa-print"></i>&nbsp;Cetak Excel
								</button>
								<button type="button" class="btn btn-sm btn-default" onclick="cari()">
									<i class="fa fa-search"></i>&nbsp;Cari
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

					<div id="tabel" class="" style="overflow-x: auto;">
						


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
								<label class="input">
									<input value="" type="text" name="tahun" id="tahun">
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

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});

	function cari() {
		if ($('#TBLREKENING_KODE').select2('val')=='') {
			notifikasi('Informasi','Mohon Pilih Jenis Pajak','failed',1,0);
		}
		reloadDT('dt_basic');
		$.ajax({
			url: 'pendataan/cetak_kartudata_teguran/cari',
			type: 'POST',
			data: {
				rekening: $("#TBLREKENING_KODE").val()
				, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
				, TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").val()
				, TBLPENDATAAN_TGLPAJAK: $("#TBLPENDATAAN_TGLPAJAK").val()
				, TBLREKENING_KODESUB: $("#TBLREKENING_KODESUB").val()
				, ENTRI_THNPAJAK: $("#ENTRI_THNPAJAK").val()
				, ENTRI_BLNPAJAK: $("#ENTRI_BLNPAJAK").select2('val')
				, KODE_JENIS: $("#KODE_JENIS").select2('val')
				, ENTRI_TGLPAJAK: $("#ENTRI_TGLPAJAK").val()
				, TBLKECAMATAN_ID: $("#TBLKECAMATAN_ID").val()
				, ISONLINE: $("#ISONLINE").select2('val')
				, STATUS_DATA: $("#STATUS_DATA").select2('val')
				, STATUS_KIRIM: $("#STATUS_KIRIM").select2('val')
				, STATUS_TERIMA: $("#STATUS_TERIMA").select2('val')
			},
		})
		.done(function(respon) {
			$("#tabel").html(respon);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}

	
	function cetak() {
		var param = jQuery.param(
		{
			rekening: $("#TBLREKENING_KODE").val()
			, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
			, TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").val()
			, TBLPENDATAAN_TGLPAJAK: $("#TBLPENDATAAN_TGLPAJAK").val()
			, TBLREKENING_KODESUB: $("#TBLREKENING_KODESUB").val()
			, ENTRI_THNPAJAK: $("#ENTRI_THNPAJAK").val()
			, ENTRI_BLNPAJAK: $("#ENTRI_BLNPAJAK").select2('val')
			, ENTRI_TGLPAJAK: $("#ENTRI_TGLPAJAK").val()
			, TBLKECAMATAN_ID: $("#TBLKECAMATAN_ID").val()
			, ISONLINE: $("#ISONLINE").select2('val')
			, STATUS_KIRIM: $("#STATUS_KIRIM").select2('val')
			
		}
		);
		window.rekening = $("#TBLREKENING_KODE").val
		window.TBLPENDATAAN_THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
		window.TBLPENDATAAN_BLNPAJAK = $('#TBLPENDATAAN_BLNPAJAK').val();
		window.TBLPENDATAAN_TGLPAJAK= $("#TBLPENDATAAN_TGLPAJAK").val();
		window.TBLREKENING_KODESUB= $("#TBLREKENING_KODESUB").val();
		window.TBLKECAMATAN_ID= $("#TBLKECAMATAN_ID").val();
		window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/pendataan/cetak_kartudata_teguran/cetak?' + param);
	}

	function cetakWord(jenis) {
		var param = jQuery.param(
		{
			rekening: $("#TBLREKENING_KODE").val()
			, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
			, TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").val()
			, TBLPENDATAAN_TGLPAJAK: $("#TBLPENDATAAN_TGLPAJAK").val()
			, TBLREKENING_KODESUB: $("#TBLREKENING_KODESUB").val()
			, ENTRI_THNPAJAK: $("#ENTRI_THNPAJAK").val()
			, ENTRI_BLNPAJAK: $("#ENTRI_BLNPAJAK").select2('val')
			, ENTRI_TGLPAJAK: $("#ENTRI_TGLPAJAK").val()
			, TBLKECAMATAN_ID: $("#TBLKECAMATAN_ID").val()
			, ISONLINE: $("#ISONLINE").select2('val')
			, STATUS_KIRIM: $("#STATUS_KIRIM").select2('val')
			, STATUS_TERIMA: $("#STATUS_TERIMA").select2('val')
			
		}
		);
		window.rekening = $("#TBLREKENING_KODE").val
		window.TBLPENDATAAN_THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
		window.TBLPENDATAAN_BLNPAJAK = $('#TBLPENDATAAN_BLNPAJAK').val();
		window.TBLPENDATAAN_TGLPAJAK= $("#TBLPENDATAAN_TGLPAJAK").val();
		window.TBLREKENING_KODESUB= $("#TBLREKENING_KODESUB").val();
		window.TBLKECAMATAN_ID= $("#TBLKECAMATAN_ID").val();
		// var URL_APLIKASI = "<?php echo Yii::app()->getBaseUrl(1); ?>";
		window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/pendataan/cetak_kartudata_teguran/cetakWord?' + param);
	}

	function cetakrekaptahunan(jenis) {
		if ($('#TBLREKENING_KODE').select2('val')=='') {
			notifikasi('Informasi','Mohon Pilih Jenis Pajak','failed',1,0);
		}
		
		var param = jQuery.param(
		{
			rekening: $("#TBLREKENING_KODE").val()
			, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
			
		}
		);
		window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/pendataan/cetak_kartudata_teguran/cetakrekaptahunan?' + param);
	}

	function cetakulang() {

		if ($('#STATUS_DATA').select2('val')!='wp') {
			notifikasi('Informasi','Silakan pilih posisi data SELESAI VERIFIKASI KABID untuk bisa cetak ulang','failed',1,0);
		} else {

			var param = {
				data: '',
				TBLPENDATAAN_THNPAJAK: $('#TBLPENDATAAN_THNPAJAK').val(),
				TBLPENDATAAN_BLNPAJAK: $('#TBLPENDATAAN_BLNPAJAK').val(),
				rekening: $('#TBLREKENING_KODE').val(),
				STATUS_KIRIM: $('#STATUS_KIRIM').val(),
				POSISI: $('#STATUS_DATA').val(),
			}
			
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendataan/cetak_kartudata_teguran/cetakulang?' + $.param(param) );
		}
			
    }
	
	
	$("#TBLREKENING_KODE").change(function(event) {
		getRekeningSub($("#TBLREKENING_KODE").val());
	});


	/*jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});


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
	}*/


	function getRekeningSub(rekeningkode) {
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/subrekening?kode=4.1.1.2.',
			type: 'POST',
			dataType: 'json',
			data: {kode: rekeningkode},
		})
		.done(function(respon) {
			setComboList ('TBLREKENING_KODESUB', 'Sub Rekening', respon);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}


</script>
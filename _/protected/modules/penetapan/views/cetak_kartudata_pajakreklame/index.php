<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Cetak Kartu Data Reklame</h4>
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
									<p>Tanggal Pajak</p>
								</section>
								<section class="col col-md-2">
									<label class="input">
										<input type="number" id="TBLPENDATAAN_THNPAJAK" name="param[TBLPENDATAAN_THNPAJAK]" value="<?//= date('y') ?>" placeholder="Tahun" maxlength="4">
									</label>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select class="" id="TBLPENDATAAN_BLNPAJAK" name="param[TBLPENDATAAN_BLNPAJAK]">
											<option value="">-- Bulan --</option>
											<?php for ($i=1; $i<=12; $i++): ?>
												<option <?php //echo $i==(int)date('m') ? 'selected' : '' ?> value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
											<?php endfor ?>
										</select><i class="fa fa-square"></i>
									</label>
								</section>

								<section class="col col-md-2">
									<label class="input">
										<input value="<?php //= date('d') ?>" type="number" id="TBLPENDATAAN_TGLPAJAK" name="param[TBLPENDATAAN_TGLPAJAK]" placeholder="Tanggal" maxlength="2">
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
												<option selected="" value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
								</section>

								<section class="col col-md-4">
									<label class="select">
										<select class="select2" id="TBLREKENING_KODESUB" name="TBLREKENING_KODESUB">
											<option value="">-- Pilih Rekening --</option>
											<?php /*foreach ($data['sub_rek'] as $list): ?>
												<option value="<?php echo $list['TREKENING_KODE'] ?>">[<?php echo $list['TREKENING_KODE'] ?>] <?php echo $list['TREKENING_NAMA'] ?></option>
											<?php endforeach*/ ?>
										</select>
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Tgl. Penetapan SKPD</p>
								</section>
								<section class="col col-md-2">
									<label class="input">
									<input type="number" id="ENTRI_THNPAJAK" name="param[ENTRI_THNPAJAK]" value="<?//= date('y') ?>" placeholder="Tahun" maxlength="4" />
									</label>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select class="" id="ENTRI_BLNPAJAK" name="param[ENTRI_BLNPAJAK]">
											<option value="">-- Bulan --</option>
											<?php for ($i=1; $i<=12; $i++): ?>
												<option <?php //echo $i==(int)date('m') ? 'selected' : '' ?> value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
											<?php endfor ?>
										</select><i class="fa fa-square"></i>
									</label>
								</section>

								<section class="col col-md-2">
									<label class="input">
										<input value="<?php //= date('d') ?>" type="number" id="ENTRI_TGLPAJAK" name="param[ENTRI_TGLPAJAK]" placeholder="Tanggal" maxlength="2">
									</label>
								</section>
							</div>
							<div class="row">
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
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Kode Jalan</p>
								</section>
								<section class="col col-md-4">
									<label class="select">
										<select class="select2" id="kodejalan" name="kodejalan">
											<option value="">-- Pilih Kode Jalan --</option>
											<?php foreach ($data['list_kodejalan'] as $list): ?>
												<option value="<?php echo $list['RREKJALAN_KODE'] ?>">[<?php echo $list['RREKJALAN_KODE'] ?>] <?php echo $list['RREKJALAN_NAMAJALAN'] ?></option>
											<?php endforeach ?>
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
								<div class="row">
									<section class="col col-md-2">
										<p>Cara Penetapan</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input type="penetapan" name="" id="penetapan">
										</label>
									</section> S/O
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Jenis Pajak</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input type="TBLDAFTREKLAME_JNSREKLAME" name="" id="TBLDAFTREKLAME_JNSREKLAME">
										</label>
									</section>Tetap (T)/ Isidentil (I)/ Berjalan(B)
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p><p>
										</section>
										<section class="col col-md-2">
											<label class="select">
												<select class="select2" id="ukuran" name="ukuran">
													<option></option>
													<option>Mini</option>
													<option>Midi</option>
													<option>Maxi</option>
												</select>
											</label>
										</section>
									</div>


								</fieldset>		
								<footer>
									<button type="button" onclick="cetakWord()" class="btn btn-sm btn-success">
										<i class="fa fa-print"></i>&nbsp;Cetak
									</button>
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

					<div id="tabel" style="overflow-y: scroll;overflow-x: scroll;height: 300px;width: 100%;">
						


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

<br>

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
		getRekeningSub();
	});

	function cari() {
		$.ajax({
			url: 'penetapan/cetak_kartudata_pajakreklame/cari',
			type: 'POST',
			data: {
				rekening: $("#TBLREKENING_KODE").val()
				, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
				, TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").val()
				, TBLPENDATAAN_TGLPAJAK: $("#TBLPENDATAAN_TGLPAJAK").val()
				, TBLREKENING_KODESUB: $("#TBLREKENING_KODESUB").val()
				, TBLDAFTREKLAME_THNSPTPD: $("#ENTRI_THNPAJAK").val()
				, TBLDAFTREKLAME_BLNSPTPD: $("#ENTRI_BLNPAJAK").val()
				, TBLDAFTREKLAME_TGLSPTPD: $("#ENTRI_TGLPAJAK").val()
				, TBLKECAMATAN_ID: $("#TBLKECAMATAN_ID").val()
				, REFJALAN_ID: $("#kodejalan").val()
				, TBLDAFTREKLAME_ISJNSPENETAPAN: $("#penetapan").val()
				, TBLDAFTREKLAME_JNSREKLAME: $("#TBLDAFTREKLAME_JNSREKLAME").val()
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

	$("#TBLREKENING_KODE").change(function(event) {
		getRekeningSub($("#TBLREKENING_KODE").val());
	});

	function getRekeningSub(rekeningkode) {
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/subrekening?kode=4.1.1.4.',
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
	$("#TBLREKENING_KODE").change(function(event) {
		getRekeningSub($("#TBLREKENING_KODE").val());
	});

	function getRekeningSub(rekeningkode) {
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/subrekening?kode=4.1.1.4.',
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

	function cetak (jenis) {
		//window.rekening = $("#TBLREKENING_KODE").val
		window.TBLPENDATAAN_THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
		window.TBLPENDATAAN_BLNPAJAK = $('#TBLPENDATAAN_BLNPAJAK').val();
		window.TBLPENDATAAN_TGLPAJAK= $("#TBLPENDATAAN_TGLPAJAK").val();
		window.TBLREKENING_KODESUB= $("#TBLREKENING_KODESUB").val();
		window.TBLDAFTREKLAME_THNSPTPD= $("#ENTRI_THNPAJAK").val();
		window.TBLDAFTREKLAME_BLNSPTPD= $("#ENTRI_BLNPAJAK").val();
		window.TBLDAFTREKLAME_TGLSPTPD= $("#ENTRI_TGLPAJAK").val();
		window.TBLKECAMATAN_ID= $("#TBLKECAMATAN_ID").val();
		window.REFJALAN_ID= $("#kodejalan").val();
		window.TBLDAFTREKLAME_ISJNSPENETAPAN= $("#penetapan").val();
		window.TBLDAFTREKLAME_JNSREKLAME= $("#TBLDAFTREKLAME_JNSREKLAME").val();
		var URL_APLIKASI = "<?php echo Yii::app()->getBaseUrl(1); ?>";
		window.open(URL_APLIKASI+"/penetapan/cetak_kartudata_pajakreklame/cetak?jenis="+jenis+"&TBLPENDATAAN_THNPAJAK="+window.TBLPENDATAAN_THNPAJAK+"&TBLPENDATAAN_BLNPAJAK="+window.TBLPENDATAAN_BLNPAJAK+"&TBLPENDATAAN_TGLPAJAK="+window.TBLPENDATAAN_TGLPAJAK+"&TBLREKENING_KODESUB="+window.TBLREKENING_KODESUB+"&TBLDAFTREKLAME_THNSPTPD="+window.TBLDAFTREKLAME_THNSPTPD+"&TBLDAFTREKLAME_BLNSPTPD="+window.TBLDAFTREKLAME_BLNSPTPD+"&TBLDAFTREKLAME_TGLSPTPD="+window.TBLDAFTREKLAME_TGLSPTPD+"&TBLKECAMATAN_ID="+window.TBLKECAMATAN_ID+"&REFJALAN_ID="+window.REFJALAN_ID+"&TBLDAFTREKLAME_ISJNSPENETAPAN="+window.TBLDAFTREKLAME_ISJNSPENETAPAN+"&TBLDAFTREKLAME_JNSREKLAME="+window.TBLDAFTREKLAME_JNSREKLAME);

	}

	function cetakWord(jenis) {
		//window.rekening = $("#TBLREKENING_KODE").val
		window.TBLPENDATAAN_THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
		window.TBLPENDATAAN_BLNPAJAK = $('#TBLPENDATAAN_BLNPAJAK').val();
		window.TBLPENDATAAN_TGLPAJAK= $("#TBLPENDATAAN_TGLPAJAK").val();
		window.TBLREKENING_KODESUB= $("#TBLREKENING_KODESUB").val();
		window.TBLDAFTREKLAME_THNSPTPD= $("#ENTRI_THNPAJAK").val();
		window.TBLDAFTREKLAME_BLNSPTPD= $("#ENTRI_BLNPAJAK").val();
		window.TBLDAFTREKLAME_TGLSPTPD= $("#ENTRI_TGLPAJAK").val();
		window.TBLKECAMATAN_ID= $("#TBLKECAMATAN_ID").val();
		window.REFJALAN_ID= $("#kodejalan").val();
		window.TBLDAFTREKLAME_ISJNSPENETAPAN= $("#penetapan").val();
		window.TBLDAFTREKLAME_JNSREKLAME= $("#TBLDAFTREKLAME_JNSREKLAME").val();
		var URL_APLIKASI = "<?php echo Yii::app()->getBaseUrl(1); ?>";
		window.open(URL_APLIKASI+"/penetapan/cetak_kartudata_pajakreklame/cetakWord?jenis="+jenis+"&TBLPENDATAAN_THNPAJAK="+window.TBLPENDATAAN_THNPAJAK+"&TBLPENDATAAN_BLNPAJAK="+window.TBLPENDATAAN_BLNPAJAK+"&TBLPENDATAAN_TGLPAJAK="+window.TBLPENDATAAN_TGLPAJAK+"&TBLREKENING_KODESUB="+window.TBLREKENING_KODESUB+"&TBLDAFTREKLAME_THNSPTPD="+window.TBLDAFTREKLAME_THNSPTPD+"&TBLDAFTREKLAME_BLNSPTPD="+window.TBLDAFTREKLAME_BLNSPTPD+"&TBLDAFTREKLAME_TGLSPTPD="+window.TBLDAFTREKLAME_TGLSPTPD+"&TBLKECAMATAN_ID="+window.TBLKECAMATAN_ID+"&REFJALAN_ID="+window.REFJALAN_ID+"&TBLDAFTREKLAME_ISJNSPENETAPAN="+window.TBLDAFTREKLAME_ISJNSPENETAPAN+"&TBLDAFTREKLAME_JNSREKLAME="+window.TBLDAFTREKLAME_JNSREKLAME);

	}

	$("#penetapan,#TBLDAFTREKLAME_JNSREKLAME").keyup(function(event) {
		$(event.target).val($(event.target).val().toUpperCase());
	});

</script>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Buku Piutang SKPD-A dan SKPDKB </h4>
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
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-wer3ytgrfrytry" 
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
										<section class="col col-md-3">Tahun Pajak</section>
										<section class="col col-md-4">
											<label class="input">
												<input type="number" value="<?php echo date('Y'); ?>" class="form-control" id="TBLPENDATAAN_THNPAJAKA"  name="param[TBLPENDATAAN_THNPAJAKA]">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-3">S / D</section>
										<section class="col col-md-4">
											<label class="input">
												<input type="number" disabled="disabled" class="form-control" id="TBLPENDATAAN_THNPAJAKK" name="param[TBLPENDATAAN_THNPAJAKK]">
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
												<option value="1">SKPDKB & SKPDA</option>
											</select>
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

<!--  -->
<div class="row">

	<!-- NEW WIDGET START -->

	<article class="col-sm-12 col-md-12 col-lg-12">


		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-color-darken" id="wid-id-7" data-widget-editbutton="false"
		data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
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
    		<div id="tabel_laporan">
    			<center><i><b>Silahkan Lakukan Pencarian Terlebih Dahulu</b></i></center>
    		</div>
    	</div>
    	<!-- end widget content -->

    </div>
    <!-- end widget div -->

</div>

</div>
</section>



<script type="text/javascript">
	pageSetUp();

	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

	jQuery(document).ready(function($) {
		$("#TBLPENDATAAN_THNPAJAKK").val(Number(<?php echo date('Y') ?>)+4); 
	});

	$("#TBLPENDATAAN_THNPAJAKA").change(function() {
		$("#TBLPENDATAAN_THNPAJAKK").val(Number($("#TBLPENDATAAN_THNPAJAKA").val())+4); 
	});

	function cari () {
			var JENISPAJAK = $('#TBLREKENING_KODE').val();
			if (JENISPAJAK=='') {
				notifikasi('Informasi','Mohon isikan Jenis Pajak','failed',1,0);
				return false;
			}
			$("#tabel_laporan").html('<div align="center">'+LOADER+'').fadeIn(400);
			$.ajax({
				url: 'penagihan/Buku_piutangskpda/Cari',
				type: 'POST',
				data: {
					 TBLREKENING_KODE : $('#TBLREKENING_KODE').val(),
					TBLDAFTAR_NOPOK : $('#TBLDAFTAR_NOPOK').val(),
					TBLPENDATAAN_THNPAJAKA : $('#TBLPENDATAAN_THNPAJAKA').val(),
					TBLPENDATAAN_THNPAJAKK : $('#TBLPENDATAAN_THNPAJAKK').val(),
				},
				success: function (respon) {
					$("#tabel_laporan").html(respon);
					$("#tabel_laporan").prepend('<div align="center">'+LOADER+'');
					$(".loader_img").fadeOut(1000);
				}
			});

		}

	// 	function cetak() {
	// 		window.TBLDAFTAR_NOPOK = $('#TBLDAFTAR_NOPOK').val();
	// 		window.TBLREKENING_KODE = $('#TBLREKENING_KODE').val();
	// 		window.TBLPENDATAAN_THNPAJAKA = $('#TBLPENDATAAN_THNPAJAKA').val();
	// 		window.TBLPENDATAAN_THNPAJAKK = $('#TBLPENDATAAN_THNPAJAKK').val();
	// 		window.URL_APLIKASI = "<?php echo Yii::app()->getBaseUrl(1); ?>";
	// 		window.open(window.URL_APLIKASI+'/penagihan/Buku_piutangskpda/cetak?TBLPENDATAAN_THNPAJAKA='+window.TBLPENDATAAN_THNPAJAKA+'&TBLPENDATAAN_THNPAJAKK='+window.TBLPENDATAAN_THNPAJAKK+'&TBLDAFTAR_NOPOK='+window.TBLDAFTAR_NOPOK+'&TBLREKENING_KODE='+window.TBLREKENING_KODE);
	// 	// window.open('<?php echo Yii::app()->getBaseUrl(1) ?>penagihan/Buku_piutangskpda/cetak');
	// }

		function cetak () {

    
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
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/penagihan/Buku_piutangskpda/cetak/?data=' + q +"&TBLPENDATAAN_THNPAJAKA="+$('#TBLPENDATAAN_THNPAJAKA').val()+"&TBLPENDATAAN_THNPAJAKK="+$('#TBLPENDATAAN_THNPAJAKK').val()+"&TBLDAFTAR_NOPOK="+$('#TBLDAFTAR_NOPOK').val()+"&TBLREKENING_KODE="+$('#TBLREKENING_KODE').val() );
    	}    	
    	// window.open(window.APP_URL+'/pendataan/cetak_suratteguran/cetaksuratteguran');
	

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});

</script>
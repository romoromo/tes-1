<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Cetak Laporan Realisasi Pendapatan
			</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-cetak_bkp" 
			data-widget-editbutton="false"
			data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-colorbutton="false"	
			data-widget-togglebutton="false"			
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
				<h2>Form Cetak Laporan Penerimaan BKP</h2>

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
								<section class="col col-md-1">
									Tahun
								</section>
								<section class="col col-md-2">
									<!-- <div class="row"> -->
									<!-- <div class="col col-15"> -->
									<label class="input">
										<input type="number" value="<?php echo date('Y'); ?>" name="tahun" id="tahun">
									</label>
									<!-- </div> -->
									<!-- </div> -->
								</section>
							</div>
							<div class="row">
								<section class="col col-md-1">
									Bulan
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select class="select2" name="bulan" id="bulan">
											<option selected="" disabled="">== Silahkan Pilih ==</option>
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
							<div class="row">
								<section class="col col-md-1">
									Tanggal
								</section>
								<section class="col col-md-2">
									<!-- <div class="row"> -->
									<!-- <div class="col col-15"> -->
									<label class="input"> 
										<input value="" type="number" name="tanggal" id="tanggal">
									</label>
									<!-- </div> -->
									<!-- </div> -->
								</section>
							</div>
						</fieldset>	
						<footer><button type="button" class="btn btn-sm btn-primary" onclick="cetak()"> Cetak</button></footer>					
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

</section><br>


<script type="text/javascript">
	pageSetUp();

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
		$('#bulan').select2('val', <?= date('m') ?> );
	});


	function printSelected () {
		$('#datamodal').modal('show');
	}

	function enter() {
		$('#form_hotel').show();
	}

	function cetak () {
		window.tahun = $('#tahun').val();
		window.bulan = $('#bulan').val();
		window.tanggal = $('#tanggal').val();
		var URL_APLIKASI = "<?php echo Yii::app()->getBaseUrl(1); ?>";
		window.open(URL_APLIKASI+"/pembukuandanpelaporan/cetak_lappendapatan/cetak?tahun="+window.tahun+"&bulan="+window.bulan+"&tanggal="+window.tanggal);
		
	}
</script>
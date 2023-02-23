<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Kartu Data Penetapan</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-kartu_penetapan" 
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
					<span class="widget-icon"> <i class="fa fa-search"></i> </span>
					<h2>Cetak Kartu  Penetapan </h2>

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
										Masa Pajak
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input class="input-sm" type="text">
										</label>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input class="input-sm" type="text">
										</label>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input class="input-sm" type="text">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select name="gender">
												<option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select name="gender">
												<option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Ketetapan </p>
									</section>
									<section class="col col-md-2">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_pajak">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select name="gender">
												<option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kd Jalan</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select name="gender">
												<option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Cara Penetapan</p>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input class="input-sm" type="text" id="tgl" name="tgl">
										</label>
									</section>
									<section class="col col-md-4">S / D</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Jenis Pajak</p>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input class="input-sm" type="text" id="tgl" name="tgl">
										</label>
									</section>
									<section class="col col-md-4">Tetap (T) / Insidentil (I)</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select name="gender">
												<option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
								<footer>
									<button class="btn btn-sm btn-primary" type="button" onclick="cetak()">
										Cetak
									</button>
									<button class="btn btn-sm btn-primary" type="button" onclick="print()">
										Print Kecil
									</button>
								</footer>
							</div>
						</div>
					</fieldset>						
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
	});


	function printSelected () {
		$('#datamodal').modal('show');
	}

	function enter() {
		$('#form_hotel').show();
	}

	function cetak(){
	var URL_APLIKASI = "<?php echo Yii::app()->getBaseUrl(1); ?>";
    window.open(URL_APLIKASI+"/penetapan/kartudata_penetapan/cetak?");
	}

	function print(){
	var URL_APLIKASI = "<?php echo Yii::app()->getBaseUrl(1); ?>";
    window.open(URL_APLIKASI+"/penetapan/kartudata_penetapan/print?");
	}
</script>
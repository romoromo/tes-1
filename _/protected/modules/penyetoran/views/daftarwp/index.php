<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Menu Daftar WP/WR</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-daftar_wp" 
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
					<h2>Pencarian Data</h2>

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
								<header>N.P.W.P/R.D</header><br>
								<div style="margin-left: 2%;">
									<div class="row">
										<section class="col col-md-2">
											No NPWPRD
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="input-sm" type="text">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											Penerimaan
										</section>
										<section class="col col-md-2">
											<label class="select">
												<select name="gender">
													<option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
												</select> <i></i> 
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											Golongan
										</section>
										<section class="col col-md-2">
											<label class="select">
												<select name="gender">
													<option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
												</select> <i></i> 
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											Badan Usaha
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
											Aktif / Tidak Aktif
										</section>
										<section class="col col-md-2">
											<label class="select">
												<select name="gender">
													<option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
												</select> <i></i> 
											</label>
										</section>
									</div>
								</div>

								<header>Pemilik / Pribadi</header><br>
								<div style="margin-left: 2%;">
									<div class="row">
										<section class="col col-md-2">
											<p>Nama </p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="input-sm" type="text">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											Kecamatan
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
											Kelurahan
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
											<p>Alamat</p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="input-sm" type="text">
											</label>
										</section>
									</div>
								</div>

								<header>Badan Usaha</header><br>
								<div style="margin-left: 2%;">
									<div class="row">
										<section class="col col-md-2">
											<p>Nama </p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="input-sm" type="text">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											Kecamatan
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
											Kelurahan
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
											<p>Alamat</p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="input-sm" type="text">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>Tanggal Pengukuhan</p>
										</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="REE">
											</label>
										</section>
									</div>
								</div>
							</fieldset>	
							<footer>
								<button class="btn btn-sm btn-primary" type="button">Cari</button>
								<button class="btn btn-sm btn-default" type="button">Batal</button>
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

</script>
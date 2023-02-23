<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Reklame Insidentil</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-reklame_insidental" 
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
					<h2>Validasi Penyetoran</h2>

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
										Nomor Pokok WP
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm" type="text" id="tahun" name="tahun">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Pajak </p>
									</section>
									<section class="col col-md-2">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_pajak">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Lokasi</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm" type="text" id="tgl" name="tgl">
										</label>
									</section>
									<section class="col col-md-3">
										<button class="btn btn-sm btn-primary" type="button" onclick="enter()">
											Proses
										</button>
									</section>
								</div>
								<div id="form_hotel" style="display:none">
									<div class="alert alert-block alert-success ng-scope"><br>
										<div class="row">
											<section class="col col-md-1">
												<p>Nama</p>
											</section>
											<section class="col col-md-2">
												test
											</section>
										</div>
										<div class="row">
											<section class="col col-md-1">
												<p>Alamat</p>
											</section>
											<section class="col col-md-2">
												test
											</section>
										</div>
										<div class="row">
											<section class="col col-md-1">
												<p>Rekening</p>
											</section>
											<section class="col col-md-2">
												test
											</section>
										</div>
										<header style="background: #cde0c4;">Setoran Pajak</header>
										<div  style="padding: 3%;">
											<div class="row">
												<section class="col col-md-2">Tanggal Setor</section>
												<section class="col col-md-2">
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="dp1497752946500">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Pemut Listrik</section>
												<section class="col col-md-9">
													<input class="form-control" disabled="disabled" type="text">
												</section>
											</div>
											<div class="row" style="border-bottom: 2px solid #000;margin-bottom: 18px;">
												<section class="col col-md-2">Jabong</section>
												<section class="col col-md-9">
													<input class="form-control" disabled="disabled" type="text">
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Jumlah Setor</section>
												<section class="col col-md-9">
													<input class="form-control" disabled="disabled" type="text">
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Nomor Jabong</section>
												<section class="col col-md-9">
													<label class="input">
														<input type="text" name="name">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Tanggal Entry SSPD</section>
												<section class="col col-md-2">
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="REE">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">Validasi (Y/T)</section>
												<section class="col col-md-2">
													<label class="select">
														<select name="gender">
															<option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
														</select> <i></i> 
													</label>
												</section>
											</div>
										</div>
										<footer>
											<button class="btn btn-sm btn-primary" type="button">
												Simpan
											</button>
											<button class="btn btn-sm btn-default">
												Batal
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

</script>
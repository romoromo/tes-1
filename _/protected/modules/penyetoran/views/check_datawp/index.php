<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Check Data Per-WP Per Tahun</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-pilih_data" 
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
						
							
							<div class="smart-form">
								<fieldset>
								<div class="row">
									<section class="col col-md-2">
										Jenis Pajak
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
										<p>Tahun Penetapan</p>
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
										<p>No Pokok</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm" type="text">
										</label>
									</section>
									<section class="col col-md-3">
										<button class="btn btn-sm btn-primary" type="button" onclick="enter()">
											Cari
										</button>
										<button class="btn btn-sm btn-primary" type="button">
											Cetak
										</button>
									</section>
								</div>
								</fieldset>
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
								</div>
								<div class="row">
									<section class="col-md-12">
										<table id="dt_basic" class="table table-bordered">
											<thead>
												<tr>
													<th>No</th>
													<th>Bulan Pajak</th>
													<th>No SKP</th>
													<th>SKPD (Rp)</th>
													<th>Tgl Setor</th>
													<th>SSPD (Rp)</th>
													<th>Bulan KB</th>
													<th>No KB</th>
													<th>SSPDKB</th>
													<th>Tnggal Setor</th>
													<th>SSPD (Rp)</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
											</tbody>
										</section>
									</div>
								</div>
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
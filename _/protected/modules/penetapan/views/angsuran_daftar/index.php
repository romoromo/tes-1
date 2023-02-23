	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="well well-sm well-light bg-color-greenLight txt-color-white">
				<h4><i class="fa fa-file-text-o"></i> Angsuran - Daftar Angsuran </h4>
			</div>
		</div>
	</div>


	<!-- widget grid -->
	<section id="widget-grid" class="" >

		<!-- row -->
		<div class="row">


			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-teal" id="wid-id-Pajak_Restoran" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>Form Daftar Angsuran</h2>
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
							<form id="form_sumber_pajak" class="smart-form" novalidate="">
								<fieldset>
									<header style="margin: -6px;">Pencarian</header><br>
									<div class="row">
										<section class="col col-md-2">Rekening</section>
										<section class="col col-md-3">
											<label class="select">
												<select name="">
													<option value="0">== Silahkan Pilih ==</option>
												</select> <i></i> 
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">Masa Pajak</section>
										<section class="col col-md-3">
											<label class="select">
												<select name="">
													<option value="0">== Silahkan Pilih ==</option>
													<option value="1">2017</option>
													<option value="2">2016</option>
													<option value="3">2015</option>
												</select> <i></i> 
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">Tanggal Cetak</section>
										<section class="col col-md-3">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="tgl_cetak" class="datepicker" data-dateformat="dd-mm-yy" id="tgl_cetak">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2"></section>
										<section class="col col-md-1">
											<label>THN 39</label>
											<label class="input">
												<input class="form-control" type="text" id="nomor_pajak" name="nomor_pajak" autocomplete="off">
											</label>
										</section>
										<section class="col col-md-1">
											<label>BLN 12</label>
											<label class="input">
												<input class="form-control" type="text" id="nomor_pajak" name="nomor_pajak" autocomplete="off">
											</label>
										</section>
										<section class="col col-md-1">
											<label>TGL 30</label>
											<label class="input">
												<input class="form-control" type="text" id="nomor_pajak" name="nomor_pajak" autocomplete="off">
											</label>
										</section>
									</div>
								</fieldset>
								<footer>
									<div id="tbl_simpan">
										<button type="submit" class="btn btn-sm btn-success">
											<i class="fa fa-print"></i>&nbsp;Cetak
										</button>
									</div>
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

	</section>
	<!-- end widget grid -->
	<br>



	<script type="text/javascript">
		pageSetUp();

		jQuery(document).ready(function($) {
			reloadDT('dt_basic');
		});


	</script>
<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Penyetoran Khusus Denda BPHTB
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
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-pajak_bphtb" 
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
									<section class="col col-md-1">
										Tahun
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="tahun" name="tahun">
										</label>
									</section>
									<section class="col col-md-1">
										Bulan
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="bln" name="bln">
										</label>
									</section>
									<section class="col col-md-1">
										Tanggal
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="tgl" name="tgl">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-1">
										<p>Jenis Setoran </p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select name="jenis_setoran">
												<option selected="" disabled="">== Silahkan Pilih ==</option>
												<option>SPTPD</option>
												<option>SKPD</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-1">
										<p>Nomor Pokok</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="tgl" name="tgl">
										</label>
									</section>
									<section class="col col-md-3">
										<button class="btn btn-sm btn-primary" type="button" onclick="enter()">
											Enter
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
											<section class="col col-md-1">
												<p>No Rekening</p>
											</section>
											<section class="col col-md-2">
												1423523
											</section>
										</div>
										<div class="row">
											<section class="col col-md-1">
												<p>Alamat</p>
											</section>
											<section class="col col-md-2">
												test
											</section>
											<section class="col col-md-1">
												<p>Jenis Pajak</p>
											</section>
											<section class="col col-md-2">
												1423523
											</section>
										</div>
										<div class="row">
											<div class="col-md-6">
												<header style="background: #cde0c4;">Ketetapan Pajak</header>
												<div  style="padding: 3%;">
													<div class="row">
														<section class="col col-md-2">Tanggal SPT</section>
														<section class="col col-md-4">
															<label class="input"> <i class="icon-append fa fa-calendar"></i>
																<input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="dp1497752946500">
															</label>
														</section>
														<section class="col col-md-1">Batas</section>
														<section class="col col-md-4">
															<label class="input"> <i class="icon-append fa fa-calendar"></i>
																<input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="dp1497752946500">
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-md-2">Nomor Kohir</section>
														<section class="col col-md-9">
															<input class="form-control" disabled="disabled" type="text">
														</section>
													</div>
													<div class="row">
														<section class="col col-md-2">Bunga</section>
														<section class="col col-md-9">
															<input class="form-control" disabled="disabled" type="text">
														</section>
													</div>
													<div class="row">
														<section class="col col-md-2">Ketetapan</section>
														<section class="col col-md-9">
															<input class="form-control" disabled="disabled" type="text">
														</section>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<header style="background: #cde0c4;">Tagihan Pajak</header>
												<div  style="padding: 3%;">
													<div class="row">
														<section class="col col-md-3">Tanggal STPD</section>
														<section class="col col-md-4">
															<label class="input"> <i class="icon-append fa fa-calendar"></i>
																<input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="dp1497752946500">
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-md-3">Nomor STPD</section>
														<section class="col col-md-9">
															<input class="form-control" disabled="disabled" type="text">
														</section>
													</div>
													<div class="row">
														<section class="col col-md-3">Bunga</section>
														<section class="col col-md-9">
															<input class="form-control" disabled="disabled" type="text">
														</section>
													</div>
													<div class="row">
														<section class="col col-md-3">Denda</section>
														<section class="col col-md-9">
															<input class="form-control" disabled="disabled" type="text">
														</section>
													</div>
													<div class="row">
														<section class="col col-md-3">Tagihan Pajak</section>
														<section class="col col-md-9">
															<input class="form-control" disabled="disabled" type="text">
														</section>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<header style="background: #cde0c4;">Setoran Pajak</header>
												<div  style="padding: 3%;">
													<div class="row">
														<section class="col col-md-2">Tempat Setor</section>
														<section class="col col-md-4">
															<select class="form-control input-sm" disabled="disabled">
																<option value="Amsterdam">== Silahkan Pilih ==</option>
															</select>
														</section>
														<section class="col col-md-6">B=BKP, K=KAS DAERAH</section>
													</div>
													<div class="row">
														<section class="col col-md-2">Tanggal Setor</section>
														<section class="col col-md-4">
															<input class="form-control" disabled="disabled" type="text">
														</section>
													</div>
													<div class="row">
														<section class="col col-md-2">Bunga</section>
														<section class="col col-md-10">
															<input class="form-control" type="text">
														</section>
													</div>
													<div class="row">
														<section class="col col-md-2">Denda</section>
														<section class="col col-md-10">
															<input class="form-control" type="text">
														</section>
													</div>
													<div class="row">
														<section class="col col-md-2">Pajak</section>
														<section class="col col-md-10">
															<input class="form-control" disabled="disabled" type="text">
														</section>
													</div>
													<div class="row">
														<section class="col col-md-2">Total Setoran</section>
														<section class="col col-md-10">
															<input class="form-control" type="text">
														</section>
													</div>
													<div class="row">
														<section class="col col-md-2">Nomor SSPD</section>
														<section class="col col-md-4">
															<input class="form-control" type="text">
														</section>
														<section class="col col-md-2">Nomor SSPDS STP</section>
														<section class="col col-md-4">
															<input class="form-control" type="text">
														</section>
													</div>
													<div class="row">
														<section class="col col-md-3">Tanggal Entry</section>
														<section class="col col-md-4">
															<label class="input"> <i class="icon-append fa fa-calendar"></i>
																<input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="dp14977529465012312">
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-md-3">Tanggal Hitungan Denda</section>
														<section class="col col-md-4">
															<label class="input"> <i class="icon-append fa fa-calendar"></i>
																<input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="dp149775dsad012312">
															</label>
														</section>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<header style="background: #cde0c4;">Tagihan Kekurangan Pajak</header>
												<div  style="padding: 3%;">
													<div class="row">
														<section class="col col-md-3">Tanggal</section>
														<section class="col col-md-4">
															<label class="input"> <i class="icon-append fa fa-calendar"></i>
																<input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="dp1497752946500">
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-md-3">Nama SKPDKB</section>
														<section class="col col-md-9">
															<input class="form-control" disabled="disabled" type="text">
														</section>
													</div>
													<div class="row">
														<section class="col col-md-3">Bunga</section>
														<section class="col col-md-9">
															<input class="form-control" disabled="disabled" type="text">
														</section>
													</div>
													<div class="row">
														<section class="col col-md-3">Denda</section>
														<section class="col col-md-9">
															<input class="form-control" disabled="disabled" type="text">
														</section>
													</div>
													<div class="row">
														<section class="col col-md-3">Tagihan SKPDKE</section>
														<section class="col col-md-9">
															<input class="form-control" disabled="disabled" type="text">
														</section>
													</div>
													<div class="row">
														<section class="col col-md-3">Nomor SSPDKB</section>
														<section class="col col-md-3">
															<input class="form-control" type="text">
														</section>
													</div>
													<div class="row">
														<section class="col col-md-3">Cetak</section>
														<section class="col col-md-3">
															<label class="select">
																<select name="gender">
																	<option value="0" selected="" disabled=""></option>
																</select> <i></i> 
															</label>
														</section>
														<section class="col col-md-6">S= SSP, C=Cetak Ulang</section>
													</div>
												</div>
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
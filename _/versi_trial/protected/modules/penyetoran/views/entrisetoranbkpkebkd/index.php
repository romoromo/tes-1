<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Entri Setoran BKP ke BPD</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-setoran_bkp" 
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
										Tanggal Setor
									</section>
									<section class="col col-md-2">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="dp1497757889039">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-1">
										<p>Rekening </p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm" type="text" id="rekening" name="rekening">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-1">
										<p>Setoran Ke</p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select name="gender">
												<option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
											</select> <i></i> 
										</label>
									</section>
									<section class="col col-md-3">
										<button class="btn btn-sm btn-primary" onclick="cari()">
											Enter
										</button>
									</section>
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

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-data_setoran" 
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
					<h2>Setor Pajak Lain - lain</h2>

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
								<header>Penambahan Setoran</header><br>
								<div class="row">
									<section class="col col-md-2">
										Nama Rekening
									</section>
									<section class="col col-md-2">
										<b>Rekening</b>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Keterangan </p>
									</section>
									<section class="col col-md-5">
										<label class="textarea"> 										
											<textarea rows="3" name="info"></textarea> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tahun </p>
									</section>
									<section class="col col-md-2">
										<label for="address" class="input">
											<input type="text" name="address">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kode BKP/Bank </p>
									</section>
									<section class="col col-md-2">
										<label for="address" class="input">
											<input type="text" name="address">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Bukti Setor </p>
									</section>
									<section class="col col-md-5">
										<label for="address" class="input">
											<input type="text" name="address">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Jumlah Setor </p>
									</section>
									<section class="col col-md-5">
										<label for="address" class="input">
											<input type="text" name="address">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Validasi (Y/T)</p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select name="gender">
												<option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
							</fieldset>		
							<footer>
								<button class="btn btn-sm btn-primary">Simpan</button>
								<button class="btn btn-sm btn-default">Batal</button>
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

</section><BR>


<script type="text/javascript">
	pageSetUp();

		

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});


	function printSelected () {
		$('#datamodal').modal('show');
	}

	function tbl_simpan () {
		$('#tbl_cetak').show;
	}

</script>
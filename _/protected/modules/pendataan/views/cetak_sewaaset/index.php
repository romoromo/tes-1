<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>   Daftar Sewa Aset</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-cek_sewa_aset" 
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
										<p>Tanggal Pajak </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tanggal_daftar" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_pengukuhan">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Entry </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tgl_entry" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_entry">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Nomor Pokok</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="nomor_pokok" name="nomor_pokok">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kode</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="nomor_pokok" name="nomor_pokok">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Cara</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="nomor_pokok" name="nomor_pokok">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Entry Aset Sewa </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tanggal_daftar" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_jobang">
										</label>
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
	<!-- end row -->

</section>


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
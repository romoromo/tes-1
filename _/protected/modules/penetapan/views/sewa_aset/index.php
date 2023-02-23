<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Sewa Aset
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
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-cetak_lampiran" 
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
					<h2>Form Cetak Sewa Aset</h2>

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
										Tanggal Pajak
									</section>

									<section class="col col-md-1">
										<label class="checkbox pull-right">
											<input type="checkbox" name="checkbox">
											<i></i>
										</label>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input class="input-sm" value="<?= date('Y') ?>" type="number" id="tahun" name="tahun">
										</label>
									</section>

									<section class="col col-md-1">
										<label class="checkbox pull-right">
											<input type="checkbox" name="checkbox">
											<i></i>
										</label>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input class="input-sm" value="<?= date('m') ?>" type="number" id="bln" name="bln">
										</label>
									</section>

									<section class="col col-md-1">
										<label class="checkbox pull-right">
											<input type="checkbox" name="checkbox">
											<i></i>
										</label>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input class="input-sm" value="<?= date('d') ?>" type="number" id="tgl" name="tgl">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Nomor Pokok</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm" type="text" id="nopok" name="nopok">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Kode</p>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input class="input-sm" type="text" id="nopok" name="nopok">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Cara</p>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input class="input-sm" type="text" id="nopok" name="nopok">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										Tanggal Batas
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input class="input-sm" type="number" id="tahun" name="tahun">
										</label>
									</section>
									<section class="col col-md-1">

									</section>
									<section class="col col-md-1">
										<label class="input">
											<input class="input-sm" type="number" id="bln" name="bln">
										</label>
									</section>
									<section class="col col-md-1">

									</section>
									<section class="col col-md-1">
										<label class="checkbox pull-right">
											<input type="checkbox" name="checkbox">
											<i></i>
										</label>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input class="input-sm" type="number" id="tgl" name="tgl">
										</label>
									</section>
								</div>

							</fieldset>	
							<footer><button type="button" class="btn btn-sm btn-primary"> Cetak</button></footer>					
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
<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>
<!-- Entri Setoran Ke Bank S/D Hari Ini -->
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Cetak Setoran Ke Bank s/d Hari Ini</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-cetak_setor_krbank" 
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
				<h2>Form Cetak Setoran</h2>

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
									Tanggal Setor
								</section>
								<section class="col col-md-3">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input value="<?php echo date('01-02-2018') ?>" type="text" name="tgl_setor" class="datepicker" data-dateformat="dd-mm-yy" id="tgl_setor">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Kode BANK/POS/BKP </p>
								</section>
								<section class="col col-md-3">
									<label class="select">
										<select class="select2" id="kode_bank" name="kode_bank">
											<option value="">.::Silahkan Pilih::.</option>
											<option value="01">BANK</option>
											<option value="02">POS</option>
											<option value="03">BKP</option>
										</select>
									</label>
								</section>
							</div>
							<section class="col col-md-3">
								<button type="button" class="btn btn-sm btn-primary" onclick="cetak()" style="display:none">
									Cetak HTML
								</button>
								<button type="button" class="btn btn-sm btn-success" onclick="CetakWord()">
									<i class="fa fa-table"></i> Cetak Word
								</button> 
							</section>								
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

</section><BR>


<script type="text/javascript">
	pageSetUp();



	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
		reloadDT('dt_basic1');
	});


	function printSelected () {
		$('#datamodal').modal('show');
	}

	function cetak () {
		var tgl_setor = $('#tgl_setor').val();

		if ($('#tgl_setor').val()=='') {
			notifikasi('Informasi','Mohon isikan Tanggal Setor','failed',1,0);
		}else{
			window.open('<?php echo Yii::app()->getBaseUrl(1) ?>/penyetoran/Entrisetorankebank/Cetak?tgl_setor='+tgl_setor);
		}
	}

	function CetakWord() {
		var param = jQuery.param(
		{
			tgl_setor: $("#tgl_setor").val()
		});
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/penyetoran/Entrisetorankebank/CetakWord?'+ param);
	}

	// function tbl_simpan () {
	// 	$('#tbl_cetak').show;
	// }

</script>
<?php
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>
<!-- Lap BKP Harian -->
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Cetak Setoran Ke Bank s/d Hari Ini
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
				<h2>Cetak Setoran Ke Bank s/d Hari Ini</h2>

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
								<section class="col col-md-2">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" name="param[tgl_setor]" id="tgl_setor" class="datepicker" data-dateformat="dd-mm-yy" >
									</label>
								</section>
							</div>
							<div class="row" style="display: none;">
								<section class="col col-md-2">
									<p>Kode BANK/POS/BKP</p>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select name="jenis_setoran">
											<option selected="" disabled="">== Silahkan Pilih ==</option>
											<option value="01">BANK</option>
											<option value="02">POS</option>
											<option value="03">BKP</option>
										</select> <i></i>
									</label>
								</section>
							</div>
						</fieldset>
						<footer>
							<button type="button" class="btn btn-sm btn-default" onclick="cetak()"><i class="fa fa-search"></i> Pencarian</button>
							<button type="button" class="btn btn-sm btn-primary button_cetak" style="display: none;" onclick="CetakWord()">
								<i class="fa fa-table"></i> Cetak Word Rekening Baru
							</button>
							<!-- <button type="button" class="btn btn-sm btn-primary button_cetak" style="display: none;" onclick="CetakWord_lama()">
								<i class="fa fa-table"></i> Cetak Word Rekening Lama
							</button> -->
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

<div class="row" id="id_respencarian">
	<article class="col-sm-12 col-md-12 col-lg-12">
		<div class="jarviswidget jarviswidget-color-darken" id="wid-id-7" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
			<header>
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>Hasil Pencarian </h2>

			</header>

			<!-- widget div-->
			<div>

				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->

				</div>
				<!-- end widget edit box -->

				<!-- widget content -->
				<div class="table-responsive" style="max-width: 100%; height: 800px!important; overflow: auto;">
					<div id="tabel_laporan">
						<center><i><b>Silahkan Lakukan Pencarian Terlebih Dahulu</b></i></center>
					</div>
				</div>
			</div>
			<!-- end widget content -->

		</div>
		<!-- end widget div -->
	</article>
</div>

</section><br>


<script type="text/javascript">
	pageSetUp();



	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});

	function cetak () {
		var tgl_setor = $('#tgl_setor').val();
		if ($('#tgl_setor').val()=='') {
			notifikasi('Informasi','Mohon isikan Tanggal Setor','failed',1,0);
		}else{
			// window.open('<?php echo Yii::app()->getBaseUrl(1) ?>/<?= $this->MODULE_URL ?>/Cetak?tgl_setor='+tgl_setor);
			var url = '<?php echo Yii::app()->getBaseUrl(1) ?>/<?= $this->MODULE_URL ?>/Cetak?tgl_setor='+tgl_setor
			$.ajax({
				url: url,
				type: 'POST',
				data: '',
			})
			.done(function(respon) {
				$("#tabel_laporan").html(respon)
				$(".button_cetak").show()
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
	}

	function CetakWord() {
		var param = jQuery.param(
		{
			tgl_setor: $("#tgl_setor").val()
		});
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/<?= $this->MODULE_URL ?>/CetakWord?'+ param);
	}

	function CetakWord_lama() {
		var param = jQuery.param(
		{
			tgl_setor: $("#tgl_setor").val()
		});
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/<?= $this->MODULE_URL ?>/CetakWord_lama?'+ param);
	}

</script>
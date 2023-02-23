<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Buku Kendali SKPD</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-kendali_skpd" 
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
					<h2>Cetak Laporan Buku Kendali </h2>

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
										Masa Pajak
									</section>
									<section class="col col-md-1">
									<label class="input">
										<input maxlength="2" type="number" id="TBLPENDATAAN_THNPAJAK" name="param[TBLPENDATAAN_THNPAJAK]" value="<?= date('Y') ?>" placeholder="Tahun" maxlength="4">
									</label>
								</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select class="select2" id="TBLREKENING_KODE" name="TBLREKENING_KODE">
												<option value="">-- Pilih Rekening --</option>
												<?php foreach ($data['rek'] as $list): ?>
													<option value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select class="select2" id="TBLREKENING_KODESUB" name="TBLREKENING_KODESUB">
												<option value="">-- Pilih Sub Rekening --</option>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TBLKECAMATAN_ID" name="TBLKECAMATAN_ID">
												<option value="">-- Pilih Kecamatan --</option>
												<?php foreach ($data['list_kecamatan'] as $list): ?>
													<option value="<?php echo $list['REFKECAMATAN_ID'] ?>">[<?php echo $list['REFKECAMATAN_ID'] ?>] <?php echo $list['REFKECAMATAN_NAMA'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kd Jalan</p>
									</section>
									<section class="col col-md-4">
									<label class="select">
										<select class="select2" id="KODEJALAN" name="KODEJALAN">
											<option value="">-- Pilih Kode Jalan --</option>
											<?php foreach ($data['list_kodejalan'] as $list): ?>
												<option value="<?php echo $list['RREKJALAN_KODE'] ?>">[<?php echo $list['RREKJALAN_KODE'] ?>] <?php echo $list['RREKJALAN_NAMAJALAN'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
								</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Cara Penetapan</p>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input class="input-sm" type="text" id="PENETAPAN_CARA" name="PENETAPAN_CARA">
										</label>
									</section>
									<section class="col col-md-4">S / D</section>
								</div>
								<footer>
									<button class="btn btn-sm btn-primary" type="button" onclick="cetak()">
										Cetak
									</button>
									<button class="btn btn-sm btn-primary" type="button" disabled="">
										Print Kecil
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

	function cetak () {
		var param = jQuery.param(
			{
				TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
				, TBLREKENING_KODE: $("#TBLREKENING_KODE").select2('val')
				, TBLREKENING_KODESUB: $("#TBLREKENING_KODESUB").select2('val')
				, KODEJALAN: $("#KODEJALAN").select2('val')
				, TBLKECAMATAN_ID: $("#TBLKECAMATAN_ID").select2('val')
				, PENETAPAN_CARA: $("#PENETAPAN_CARA").val()
			}
		);
		window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/penetapan/bukukendali_skpd/cetak?'+param);
	}


	$("#TBLREKENING_KODE").change(function(event) {
		getRekeningSub($("#TBLREKENING_KODE").val());
	});

	function getRekeningSub(rekeningkode) {
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/subrekening?kode=4.1.1.2.',
			type: 'POST',
			dataType: 'json',
			data: {kode: rekeningkode},
		})
		.done(function(respon) {
			setComboList ('TBLREKENING_KODESUB', 'Sub Rekening', respon);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}

	function printSelected () {
		$('#datamodal').modal('show');
	}

	function enter() {
		$('#form_hotel').show();
	}

</script>
<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Cetak Daftar Setoran WP/WR</h4>
		</div>
	</div>
</div>



<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-angsuran_pajak" 
			data-widget-editbutton="false"
			data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-colorbutton="false"	
			data-widget-togglebutton="false">
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
				<h2>Form Cetak Daftar Setoran </h2>

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
									<label class="input">
										<input class="input-sm" type="text" id="tgl" name="tgl" placeholder="Tanggal">
									</label>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select class="select2" id="bulan" name="bulan" >
											<option value="1">Januari</option>
											<option value="2">Februari</option>
											<option value="3">Maret</option>
											<option value="4">April</option>
											<option value="5">Mei</option>
											<option value="6">Juni</option>
											<option value="7">Juli</option>
											<option value="8">Agustus</option>
											<option value="9">September</option>
											<option value="10">Oktober</option>
											<option value="11">November</option>
											<option value="12">Desember</option>
										</select>
									</label>
								</section>
								<section class="col col-md-2">
									<label class="input">
										<input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="tahun" name="tahun">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Cara Pembayaran </p>
								</section>
								<section class="col col-md-3">
									<label class="select">
										<select class="select2" name="carabyr" id="carabyr">
											<!-- <option disabled="">== Silahkan Pilih ==</option> -->
											<option selected value="">SEMUA</option>
											<option value="OFFLINE">OFFLINE</option>
											<option value="ONLINE">ONLINE</option>
										</select> 
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									Rekening
								</section>
								<section class="col col-md-3">
									<label class="select">
										<select name="rekening" id="rekening" class="select2">
											<option value="">== Silahkan Pilih Rekening ==</option>
											<?php foreach ($data['rek'] as $combo_subrek): ?>
												<option value="<?php echo $combo_subrek['TBLREKENING_REKAYAT']; ?>"><?php echo $combo_subrek['TBLREKENING_NAMAREKENING']; ?></option>
											<?php endforeach ?>
										</select>
									</label>
								</section>
							</div>
						</fieldset>
						<footer>
							<!-- <button type="button" class="btn btn-sm btn-default" onclick="cetak('html')"><i class="fa fa-print"></i> Cetak Preview</button> -->
							<button type="button" class="btn btn-sm btn-primary" onclick="cetak('word')"><i class="fa fa-print"></i> Cetak Word</button>
						</footer>
					</form>
				</div>
			</div>
		</div>
	</article>
</div>
</section>
<script type="text/javascript">
	pageSetUp();
	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
		$('#bulan').select2('val', <?= date('m') ?> );
	});

	function cetak(jenis){
		var tgl = $('#tgl').val();
		var tahun = $('#tahun').val();
		var bulan = $('#bulan').val();
		var carabyr = $('#carabyr').val();
		var rekening = $('#rekening').val();
		 //window.open(window.APP_URL+'/pendataan/cetak_daftar_jabong/cetak');
		 window.open('<?php echo Yii::app()->getBaseUrl(1) ?>/<?= $this->MODULE_URL ?>/cetak?tahun='+tahun+'&bulan='+bulan+'&tgl='+tgl+'&jenis='+jenis+'&carabyr='+carabyr+'&rekening='+rekening);
		}

	</script>
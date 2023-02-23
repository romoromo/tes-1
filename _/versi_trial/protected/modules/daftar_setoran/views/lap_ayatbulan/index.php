<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Cetak Laporan Per Ayat Per Bulan
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
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-cetak_ayat_bulanan" 
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
				<h2>Cetak Laporan Per Ayat Per Bulan</h2>

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
									Rekening
								</section>
								<section class="col col-md-3">
									<label class="select">
										<select name="rekening" id="rekening" class="select2">
											<option value="">== Silahkan Pilih Rekening ==</option>
											<?php foreach ($data['rek'] as $combo_subrek): ?>
												<option value="<?php echo $combo_subrek['TBLREKENING_REKAYAT']; ?>">[<?php echo $combo_subrek['TBLREKENING_KODE'] ?>] <?php echo $combo_subrek['TBLREKENING_NAMAREKENING']; ?></option>
											<?php endforeach ?>
										</select>
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-1">
									Tahun
								</section>
								<section class="col col-md-2">									
									<label class="input"> 
										<input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="tahun" name="tahun">
									</label>										
								</section>
							</div>
							<div class="row">
								<section class="col col-md-1">
									Bulan
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select name="bulan" id="bulan" class="select2">
											<option  disabled="">== Silahkan Pilih ==</option>
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
							</div>
							<div class="row">
								<section class="col col-md-1">
									Cara Pembayaran
								</section>
								<section class="col col-md-3">
									<label class="select">
										<select name="bayar" id="bayar" class="select2">
											<option value="">== Silahkan Pilih ==</option>
											<option value="">SEMUA</option>
											<option value="OFFLINE">OFFLINE</option>
											<option value="ONLINE">ONLINE</option>
										</select> 
									</label>
								</section>
							</div>
						</fieldset>	
						<footer><button type="button" class="btn btn-sm btn-primary" onclick="cetakWord()"> Cetak</button></footer>					
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
		$('#bulan').select2('val', <?= date('m') ?> );
		reloadDT('dt_basic');
	});		

	// jQuery(document).ready(function($) {
	// 	reloadDT('dt_basic');
	// });


function printSelected () {
	$('#datamodal').modal('show');
}

function enter() {
	$('#form_hotel').show();
}

// Ini cetak html tidak digunakan karena menggunakan cetak world
function cetak(){ 
	window.rekening = $('#rekening').val();
	window.tahun = $('#tahun').val();
	window.bulan = $('#bulan').val();
	var URL_APLIKASI = "<?php echo Yii::app()->getBaseUrl(1); ?>";
	window.open(URL_APLIKASI+"/daftar_setoran/lap_ayatbulan/cetak?tahun="+window.tahun+"&bulan="+window.bulan+"&rekening="+window.rekening);
}

function cetakWord(){
	var param = jQuery.param(
			{
				// TBLREKENING_REKAYAT: $("#TBLREKENING_AYAT").val(),
				bulan: $("#bulan").val(),
				tahun: $("#tahun").val(),
				rekening: $("#rekening").val(),
				bayar: $("#bayar").val(),
			});
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/daftar_setoran/lap_ayatbulan/cetakword?'+ param);

		}

</script>
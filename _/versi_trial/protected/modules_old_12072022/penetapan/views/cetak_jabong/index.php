<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Cetak Jabong
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
					<h2>Form Cetak Surat Peringatan Reklame</h2>

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
											<input class="input-sm" value="<?= date('Y') ?>" type="number" id="THP" name="THP">
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
											<input class="input-sm" value="<?= date('m') ?>" type="number" id="BLP" name="BLP">
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
											<input class="input-sm" value="<?= date('d') ?>" type="number" id="HRP" name="HRP">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Nomor Pokok</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="NOPOK" name="NOPOK">
										</label>
									</section>

									<section class="col col-md-1">
										<p>Lokasi</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="lokasi" name="lokasi">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Jenis Reklame</p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" id="TREKENINGSUB_KODE" name="TREKENINGSUB_KODE">
												<option value="">-- Pilih Jenis --</option>
												<option value="">I</option>
												<option value="">T</option>
												<option value="">M</option>
												<option value="">S</option>
												<option value="">B</option>
												<option value="">U</option>
												<option value="">R</option>
												<option value="">F</option>
												<option value="">P</option>
											</select>
										</label>
									</section>

									<section class="col col-md-3">
										<p>(I: Insidental, T: Tetap, M, S, B, U, R, F, P)</p>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										Tanggal Entry Jabong
									</section>

									<section class="col col-md-1">
										<label class="checkbox pull-right">
											<input type="checkbox" name="checkbox">
											<i></i>
										</label>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input class="input-sm" value="<?= date('Y') ?>" type="number" id="THANG1" name="THANG1">
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
											<input class="input-sm" value="<?= date('m') ?>" type="number" id="THANG2" name="THANG2">
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
											<input class="input-sm" value="<?= date('d') ?>" type="number" id="THANG3" name="THANG3">
										</label>
									</section>
								</div>

							</fieldset>	
							<footer><button type="button" onclick="cetak()" class="btn btn-sm btn-primary"> Cetak</button></footer>					
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

		 // Window.APP_URL = "<?php //echo $data['URL_APP'] ?>";
	function cetak(){
		  var THP = $('#THP').val();
		  var BLP = $('#BLP').val();
		  var HRP = $('#HRP').val();
		  var NOPOK = $('#NOPOK').val();
		  var lokasi = $('#lokasi').val();
		  var TREKENINGSUB_KODE = $('#TREKENINGSUB_KODE').val();
		  var THANG1 = $('#THANG1').val();
		  var THANG2 = $('#THANG2').val();
		  var THANG3 = $('#THANG3').val();
		 // window.open(window.APP_URL+'/pendataan/cetak_daftar_jabong/cetak?THP='+THP+'&BLP='+BLP+'&HRP='+HRP+'&NOPOK='+NOPOK+'&lokasi='+lokasi+'&TREKENINGSUB_KODE='+TREKENINGSUB_KODE+'&THANG1='+THANG1+'&THANG2='+THANG2+'&THANG3='+THANG3);
		 window.open('<?php echo Yii::app()->getBaseUrl(1) ?>/penetapan/cetak_jabong/cetak?THP='+THP+'&BLP='+BLP+'&HRP='+HRP+'&NOPOK='+NOPOK+'&lokasi='+lokasi+'&TREKENINGSUB_KODE='+TREKENINGSUB_KODE+'&THANG1='+THANG1+'&THANG2='+THANG2+'&THANG3='+THANG3);
	}

</script>


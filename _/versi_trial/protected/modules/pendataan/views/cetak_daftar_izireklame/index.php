<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Cetak Surat Pemberitahuan Izin Reklame
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
					<h2>Form Cetak Surat Pemberitahuan Izin Reklame</h2>

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

									
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" value="<?= date('Y') ?>" type="number" id="thp" name="thp">
										</label>
									</section>

									
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="number" placeholder="Bulan" id="blp" name="blp">
										</label>
									</section>

									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="number" placeholder="Tanggal" id="hrp" name="hrp">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Nomor Pokok</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="nopok" name="nopok">
										</label>
									</section>

									<section class="col col-md-1">
										<p>Lokasi / Ke</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="ke" name="ke">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Jenis Reklame</p>
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select class="select2" id="kdre" name="kdre">
												<option selected value="">-- Pilih Jenis --</option>
												<option value="I">I</option>
												<option value="T">T</option>
												<option value="M">M</option>
												<option value="S">S</option>
												<option value="B">B</option>
												<option value="U">U</option>
												<option value="R">R</option>
												<option value="F">F</option>
												<option value="P">P</option>
											</select>
										</label>
									</section>

									<section class="col col-md-3">
										<p>(I: Insidental, T: Tetap, M, S, B, U, R, F, P)</p>
									</section>
								</div>


								

								<div class="row">
									<section class="col col-md-2">
										Tanggal Batas
									</section>

									
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" value="<?= date('Y') ?>" type="number" id="thare" name="thare">
										</label>
									</section>

									
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" placeholder="Bulan" type="number" id="blare" name="blare">
										</label>
									</section>

									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" placeholder="Tanggal" type="number" id="hrare" name="hrare">
										</label>
									</section>
								</div>

								<div class="row" style="display: none;">
									<section class="col col-md-2">
										<p>Kode Jalan</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="kdjln" name="kdjln">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Nomor Surat</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="nomor_surat" name="nomor_surat">
										</label>
									</section>
								</div>

							</fieldset>	
							<footer><button type="button" class="btn btn-sm btn-primary" onclick="cetak()"> Cetak</button></footer>					
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
	/*function cetak() {
		var form_sumber_pajak = $('#form_sumber_pajak').val();
		var tahun = $('#tahun').val();
		var bln = $('#bln').val();
		var tgl = $('#tgl').val();
		var nopok = $('#nopok').val();
		var lokasi = $('#lokasi').val();
		var kdre = $('#kdre').val();
		var kode = $('#kode').val();
		var cara = $('#cara').val();
		var tahun_batas = $('#tahun_batas').val();
		var bln_batas = $('#bln_batas').val();
		var tgl_batas = $('#tgl_batas').val();
		var kdjln = $('#kdjln').val();
		var nomor_surat = $('#nomor_surat').val();
		window.open('<?php //echo Yii::app()->GetBaseUrl(1) ?>/pendataan/cetak_daftar_izireklame/cetak?form_sumber_pajak='+form_sumber_pajak+'&tahun='+tahun+'$bln='+bln+'&tgl='+tgl+'&nopok='+nopok+'lokasi='+lokasi+'&kdre='+kdre+'&kode='+kode+'&cara='+cara+'&tahun_batas='+tahun_batas+'&bln_batas='+bln_batas+'&tgl_batas='+tgl_batas+'&kdjln='+kdjln+'&nomor_surat='+nomor_surat);	*/

	function cetak() {
			// window.thp = $('#cbx_thp').prop('checked') ? $('#thp').val() : '';
			var nomor_surat = $('#nomor_surat').val();
		if (nomor_surat=='') {
			notifikasi('Informasi','Mohon isikan Nomor Surat','failed',1,0);
		} else {
			window.thp = $('#thp').val();
			window.blp = $('#blp').val();
			window.hrp = $('#hrp').val();
			window.nopok = $('#nopok').val();
			window.ke = $('#ke').val();
			window.kdre = $('#kdre').val();
			window.thare = $('#thare').val();
			window.blare = $('#blare').val();
			window.hrare = $('#hrare').val();
			window.nomor_surat = $('#nomor_surat').val();
		var URL_APLIKASI = "<?php echo Yii::app()->getBaseUrl(1); ?>";
		window.open(URL_APLIKASI+"/pendataan/cetak_daftar_izireklame/cetakword?thp="+window.thp+"&blp="+window.blp+"&hrp="+window.hrp+"&nopok="+window.nopok+"&ke="+window.ke+"&kdre="+window.kdre+"&thare="+window.thare+"&blare="+window.blare+"&hrare="+window.hrare+"&nomor_surat="+window.nomor_surat);
		}
	
	}

</script>
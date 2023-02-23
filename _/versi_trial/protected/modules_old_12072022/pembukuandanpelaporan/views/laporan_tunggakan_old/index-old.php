<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Laporan Tunggakan</h4>
		</div>
	</div>
</div>

<section id="widget-grid" class="">
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
			<div class="jarviswidget jarviswidget-color-teal jarviswidget-sortable" id="widget_pencariandatapajak" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" role="widget" style="">
				<header role="heading">
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Pencarian Data</h2>
					<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
					<div role="content">
						<div class="jarviswidget-editbox">
						</div>
						<div class="widget-body">
							<form id="form_sumber_pajak" class="smart-form" novalidate="">
								<fieldset>
									<div class="row">
										<!-- <section class="col col-md-2">
											<p>Bulan Terbit</p>
										</section>
										<section class="col col-md-2">
											<label class="select">
												<select class="select2" name="param[TBLPENDATAAN_BLNPAJAK]" id="TBLPENDATAAN_BLNPAJAK">
													<option selected="">== Silahkan Pilih ==</option>
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
										<section class="col col-md-1">
											Tahun
										</section>
										<section class="col col-md-2">
											<label class="input">
												<input type="text" vakue="<?php echo date ('Y') ?>" name="param[TBLDAFTREKLAME_THNSKPD]" id="TBLDAFTREKLAME_THNSKPD">
											</label>
										</section> -->
										<section class="col col-md-1">
											<p>Tahun SKPD</p>
										</section>
										<section class="col col-md-1" >
											<label class="checkbox">
												<input type="checkbox" name="th_skpd" id="th_skpd" ><i></i>
											</label>
										</section>
										<section class="col col-md-2">
											<label class="select">
												<label class="input">
													<input type="number" value="<?php echo date('Y') ?>" id="TBLDAFTREKLAME_THNSKPD" name="param[TBLDAFTREKLAME_THNSKPD]">
												</label>
											</label>
										</section>				
									</div>
									<div class="row">
										<section class="col col-md-1">
										Bulan SKPD
									</section>
									<section class="col col-md-1" >
										<label class="checkbox">
											<input type="checkbox" name="bl_skpd" id="bl_skpd" ><i></i>
										</label>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" name="param[TBLDAFTREKLAME_BLNSKPDA]" id="TBLDAFTREKLAME_BLNSKPDA">
												<option selected="">== Silahkan Pilih ==</option>
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
									<section class="col col-md-1">
										S / D
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" name="param[TBLDAFTREKLAME_BLNSKPDK]" id="TBLDAFTREKLAME_BLNSKPDK">
												<option selected="">== Silahkan Pilih ==</option>
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
										<section class="col col-md-2">
											<p></p>
										</section>
										<section class="col col-md-3">
											<label class="select">
												<select class="select2" id="TBLREKENING_KODE" name="param[TBLREKENING_KODE]">
													<?php foreach ($data['rek'] as $list): ?>
														<option value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
										<section class="col col-md-1">
											Kecamatan
										</section>
										<section class="col col-md-3">
											<label class="select">
												<select class="select2" id="TBLKECAMATAN_ID" name="param[TBLKECAMATAN_ID]">
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
											<p></p>
										</section>
										<section class="col col-md-3">
											<label class="select">
												<select class="select2" id="TBLREKENING_KODESUB" name="param[TBLREKENING_KODESUB]">
													<option value="">-- Pilih Rekening --</option>
													<?php foreach ($data['sub_rek'] as $list): ?>
														<option value="<?php echo $list['TREKENING_KODE'] ?>">[<?php echo $list['TREKENING_KODE'] ?>] <?php echo $list['TREKENING_NAMA'] ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
										<section class="col col-md-1">
											Kd.jalan
										</section>
										<section class="col col-md-3">
											<label class="select">
												<select class="select2" id="JALAN" name="param[JALAN]">
													<option value="">-- Pilih Jalan --</option>
													<?php foreach ($data['list_jalan'] as $list): ?>
														<option value="<?php echo $list['KODE'] ?>"> <?php echo $list['NMJLN'] ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
									</div>
									<div class="row" >
										<section class="col col-md-2">
											Tanggal SKPD Cut Off
										</section>
										<section class="col col-md-3">
											<label class="input"><i class="icon-append fa fa-calendar"></i>
												<input type="text" id="cutoff" name="param[cutoff]" class="datepicker" data-dateformat="dd-mm-yy" >
											</label>
										</section>
									</div>      
									<div class="row">
										<section class="col col-md-2">
											<p>Cara Penetapan</p>
										</section>
										<section class="col col-md-3">
											<label class="input">
												<input type="text" name="param[cara_penetapan]" id="cara_penetapan">			
											</label>
										</section>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</article>
		</div>
		<!-- end row -->
	</section>
	<section id="widget-grid-tetapan" style="" class="">
		<div class="well well-sm well-light">
			<div class="row">
				<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="jarviswidget jarviswidget-color-darken" id="wid-id-fsdfgs12441278"
					data-widget-editbutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-sortable="false"
					>
					<header role="heading">
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2> Hasil Pencarian </h2>
						<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
						<!-- widget div-->
						<div>

							<!-- widget edit box -->
							<div class="jarviswidget-editbox">
								<!-- This area used as dropdown edit box -->

							</div>
							<!-- end widget edit box -->

							<!-- widget content -->
							<div class="widget-body no-padding">
								<div class="widget-body-toolbar no-padding">
									<p class="alert alert-info"> 
										<button type="button" class="btn btn-primary btn-sm" onclick="cetak()">
											<i class="fa fa-print"></i> Cetak Laporan
										</button>
										<!-- <button type="button" class="btn btn-primary btn-sm" onclick="export()">
											<i class="fa fa-table"></i> Export Excel
										</button> -->
									</p>

								</div>

								<div class="" id="listdata">

								</div>

							</div>
							<!-- end widget content -->

						</div>
						<!-- end widget div -->

					</div>
					<!-- end widget -->

				</article>
			</div>
			<!-- end row -->
		</section>

		<script type="text/javascript">

			pageSetUp();

			jQuery(document).ready(function($) {
				$('#TBLPENDATAAN_BLNPAJAK').select2('val', <?= date('m') ?> );
			});

			$("#TBLREKENING_KODE").change(function(event) {
				getRekeningSub($("#TBLREKENING_KODE").val());
			});

			function getRekeningSub(rekeningkode) {
				$.ajax({
					url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/subrekening',
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

			window.APP_URL = "<?php echo $data['URL_APP']; ?>";
			function cetak () {
				window.cara_penetapan = $('#cara_penetapan').val();
				window.cutoff = $('#cutoff').val();
				window.JALAN = $('#JALAN').val();
				window.TBLREKENING_KODE = $('#TBLREKENING_KODE').val();
				window.TBLKECAMATAN_ID = $('#TBLKECAMATAN_ID').val();
				window.TBLDAFTREKLAME_THNSKPD = $('#TBLDAFTREKLAME_THNSKPD').val();
				window.TBLPENDATAAN_BLNPAJAK = $('#TBLPENDATAAN_BLNPAJAK').val();
				window.open(window.APP_URL+'/penagihan/Laporan_tunggakan/cetak?TBLREKENING_KODE='+window.TBLREKENING_KODE+'&TBLKECAMATAN_ID='+window.TBLKECAMATAN_ID+'&cara_penetapan='+window.cara_penetapan+'&JALAN='+window.JALAN+'&TBLDAFTREKLAME_THNSKPD='+window.TBLDAFTREKLAME_THNSKPD+'&TBLPENDATAAN_BLNPAJAK='+window.TBLPENDATAAN_BLNPAJAK+'&cutoff='+window.cutoff);
			}
		</script>
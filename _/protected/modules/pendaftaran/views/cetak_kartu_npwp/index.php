<?php define('ASSETS_URL', 'themes/smartadmin')?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Cetak Kartu NPWP dan Pengukuhan</h4>
		</div>
	</div>
</div>

<!--  -->
<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-adftar_induk" 
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
					<h2>Form Pencarian</h2>

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
						<div class="alert alert-info"> 
							<fieldset>
							<div><b>NPWPRD</b></div><hr><br>
								<div class="row">
									<section class="col col-md-2">
										<p>Nomor NPWPRD</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm" type="text" id="TBLDAFTAR_NOPOK" name="param[TBLDAFTAR_NOPOK]">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Penerimaan </p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select name="param[TBLDAFTAR_JENISPENDAPATAN]" id="TBLDAFTAR_JENISPENDAPATAN">
												<option selected="">== Silahkan Pilih ==</option>
												<option value="P">Pajak</option>
												<option value="R">Retribusi</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Golongan </p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select id="TBLDAFTAR_GOLONGAN" name="param[TBLDAFTAR_GOLONGAN]">
												<option selected="">== Silahkan Pilih ==</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Badan Usaha</p>
									</section>
									<section class="col col-md-4">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select name="badan" id="badan" class="select2" placeholder="--- Silahkan Pilih ---">
												<option></option>
												<option>Hotel Berbintang</option>
												<option>Hotel Mlati 1</option>
												<option>Hotel Mlati 2</option>
												<option>Hotel Mlati 3</option>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Status </p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select name="status">
												<option selected="" disabled="">== Silahkan Pilih ==</option>
												<option>Aktif</option>
												<option>Tidak Aktif</option>
											</select> <i></i> 
										</label>
									</section>
								</div>

								<div><b>Pemilik / Perorangan</b></div><hr><br>
								<div class="row">
									<section class="col col-md-2">
										<p>Nama</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKNAMA" name="param[TBLDAFTAR_PEMILIKNAMA]">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-4">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select name="kec" id="kec" class="select2" placeholder="--- Pilih Kecamatan---">
												<option></option>
												<option>Tegalrejo</option>
												<option>Jetis</option>
												<option>Godokusumo</option>
												<option>Danurejan</option>
												<option>Ngampilan</option>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kelurahan</p>
									</section>
									<section class="col col-md-4">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select name="desa" id="desa" class="select2" placeholder="--- Pilih Desa---">
												<option></option>
												<option>Kricak</option>
												<option>Karangwaru</option>
												<option>Tegalrejo</option>
												<option>Bener</option>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Alamat</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm" type="text" id="nama" name="nama">
										</label>
									</section>
								</div>

								<div><b>Badan Usaha</b></div><hr><br>
								<div class="row">
									<section class="col col-md-2">
										<p>Nama</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHANAMA" name="param[TBLDAFTAR_BADANUSAHANAMA]">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-4">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select name="kec" id="kec" class="select2" placeholder="--- Pilih Kecamatan---">
												<option></option>
												<option>Tegalrejo</option>
												<option>Jetis</option>
												<option>Godokusumo</option>
												<option>Danurejan</option>
												<option>Ngampilan</option>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kelurahan</p>
									</section>
									<section class="col col-md-4">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select name="desa" id="desa" class="select2" placeholder="--- Pilih Desa---">
												<option></option>
												<option>Kricak</option>
												<option>Karangwaru</option>
												<option>Tegalrejo</option>
												<option>Bener</option>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Alamat</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm" type="text" id="nama" name="nama">
										</label>
									</section>
								</div>
							</fieldset>	
						</div>
							<fieldset>	
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Pengukuhan </p>
									</section>
									<section class="col col-md-4">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tanggal_daftar" class="datepicker " data-dateformat="dd/mm/yy" id="tgl_pengukuhan">
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
<!--  -->

<section id="widget-grid-tetapan" style="display: none;" class="">
	<div class="well well-sm well-light">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-orange" id="wid-id-fsdfgs12441278"
					data-widget-editbutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-sortable="false"
					>
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>Data Grid</h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">

						</div>
						<div class="widget-body no-padding">
						<p class="alert alert-info"> 
							<button type="button" class="btn btn-default" onclick="cetak()">
								<i class="fa fa-print"></i> Cetak Daftar
							</button>	
							<button type="button" class="btn btn-default">
								<i class="fa fa-print"></i> Cetak Daftar Status
							</button>					
						</p>
							<div id="kontrol_table" style="overflow-y: scroll;overflow-x: scroll;height: 300px;width: 100%;">
								<table id="dt_pipeline" class="table table-striped table-bordered table-hover" width="100%">
									<thead>
										<tr>
											<th width="10%" data-hide="phone"></th>
											<th width="5%" data-hide="phone">NO</th>
											<th width="25%" data-class="expand">Nama Pemilik</th>
											<th data-hide="phone">Nomor SPTPD</th>
											<th data-hide="phone, tablet">Nama Obyek</th>
											<th data-hide="phone, tablet">Lokasi Obyek</th>
											<th data-hide="phone, tablet">Kelurahan / Kecamatan</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div>
</section>

<div id="dialog-message" title="" align="center" style="width: 300px; display:none;">
	<img id="loadinginfo" src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memproses...">
	<p>Mohon tunggu sampai proses transfer selesai</p>
</div>

<script type="text/javascript">
	pageSetUp();

	jQuery(document).ready(function($) {
		//loadDataTable();
	});

	function loadDataTable() {
		var param = {

		};

		$.ajax({
			url: 'pendaftaran/cetak_kartu_npwp/cari',
			type: 'POST',
			data: $("#form-cari").serialize()+'&'+jQuery.param(param),
		})
		.done(function(respon) {
			console.log("success");
			$("#kontrol_table").html(respon);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}

		jQuery(document).ready(function($) {
		LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';
		$("#dialog-message").modal('hide');
		$("#dialog-message").dialog({
			autoOpen : false,
			modal : true,
			title: "Mentransfer Data",
		});

		setPriceFormat();
	});

	function loadingTransfer(ev) {
		/*ev{open|close}*/
		$('#dialog-message').dialog(ev);
		$(".ui-dialog-titlebar-close").hide();
	}

	function cari() {

			$("html, body").animate({ scrollTop: 800 }, "slow");
			$("#widget-grid-tetapan").slideDown(600);
			$("#kontrol_table").html(LOADER).fadeIn(400);
			$.ajax({
				url: 'pendaftaran/cetak_kartu_npwp/GetData',
				type: 'POST',
				data:  {
						TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
						, TBLDAFTAR_JENISPENDAPATAN: $("#TBLDAFTAR_JENISPENDAPATAN").val()
						, TBLDAFTAR_PEMILIKNAMA: $("#TBLDAFTAR_PEMILIKNAMA").val()
						, TBLDAFTAR_BADANUSAHANAMA: $("#TBLDAFTAR_BADANUSAHANAMA").val()
					},
				success: function(respon) {
					$('#kontrol_table').html(respon);
		            $("#kontrol_table").prepend('<div align="center">'+LOADER+'');
		            $(".loader_img").fadeOut(1000);
				}
			});
			
			$('#widget-grid-tetapan').show('fast');
		// }
	}

	function cetak() {
		var param = jQuery.param(
		{
			TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
			, TBLDAFTAR_JENISPENDAPATAN: $("#TBLDAFTAR_JENISPENDAPATAN").val()
			, TBLDAFTAR_PEMILIKNAMA: $("#TBLDAFTAR_PEMILIKNAMA").val()
			, TBLDAFTAR_BADANUSAHANAMA: $("#TBLDAFTAR_BADANUSAHANAMA").val()
		}
		);
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendaftaran/cetak_kartu_npwp/cetak?' + param);
	}

</script>
<style type="text/css">
	.disabled {
		background: #ddd !important;
	}
</style>
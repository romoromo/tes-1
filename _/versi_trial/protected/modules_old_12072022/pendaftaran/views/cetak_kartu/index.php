<?php define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Cetak Kartu NPWP dan Pengukuhan</h4>
		</div>
	</div>
</div>

<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-cetak-kartu" 
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
						
						<form action="" id="form_cetak_kartunpwp" class="smart-form" novalidate>
						<div class="alert alert-info"> 
								<fieldset>
								<div><b>NPWPD</b></div><hr><br>
									<div class="row">
										<section class="col col-md-2">
											<p>Nomor NPWPD</p>
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
												<select class="select2" name="param[TBLDAFTAR_JENISPENDAPATAN]" id="TBLDAFTAR_JENISPENDAPATAN">
													<option selected="" value="">-- Silahkan Pilih --</option>
													<option value="P">Pajak</option>
													<option value="R">Retribusi</option>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>Golongan </p>
										</section>
										<section class="col col-md-4">
											<label class="select">
												<select class="select2" name="param[TBLDAFTAR_GOLONGAN]" id="TBLDAFTAR_GOLONGAN">
													<option selected="" value="">-- Silahkan Pilih --</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>Badan Usaha</p>
										</section>
										<section class="col col-md-3">
											<label class="select"> <i class="icon-append fa fa-search"></i>
												<select id="REFBADANUSAHA_ID" name="param[REFBADANUSAHA_ID]" class="select2">
													<option value="" selected="">-- Pilih Badan Usaha --</option>
													<?php foreach ($data['rek'] as $row_rek): ?>
														<option value="<?=$row_rek['REFBADANUSAHA_ID']; ?>"><?=$row_rek['REFBADANUSAHA_NAMA']; ?></option>
													<?php endforeach ?>
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
												<select class="select2" name="param[TBLDAFTAR_ISAKTIF]" id="TBLDAFTAR_ISAKTIF">
													<option selected="" value="">-- Silahkan Pilih --</option>
													<option value="Y">Aktif</option>
													<option value="T">Tidak Aktif</option>
												</select>
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
										<section class="col col-md-3">
											<label class="select"> <i class="icon-append fa fa-search"></i>
												<select onchange="getKelurahan(this.value)" name="param[TBLKECAMATAN_IDPEMILIK]" id="TBLKECAMATAN_IDPEMILIK" class="select2" placeholder="--- Pilih Kecamatan---">
													<option value="" selected="">-- Pilih Kecamatan --</option>
													<?php foreach ($data['kec'] as $row_kec): ?>
														<option value="<?=$row_kec['REFKECAMATAN_ID']; ?>"><?=$row_kec['REFKECAMATAN_NAMA']; ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>Kelurahan</p>
										</section>
										<section class="col col-md-3">
											<label class="select"> <i class="icon-append fa fa-search"></i>
												<select name="param[TBLKELURAHAN_IDPEMILIK]" id="TBLKELURAHAN_IDPEMILIK" class="select2">
													<option value="">-- Pilih Kecamatan --</option>
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
												<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKALAMAT" name="param[TBLDAFTAR_PEMILIKALAMAT]">
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
										<section class="col col-md-3">
											<label class="select"> <i class="icon-append fa fa-search"></i>
												<select onchange="getKelurahan2(this.value)" id="TBLKECAMATAN_IDBADANUSAHA" name="param[TBLKECAMATAN_IDBADANUSAHA]" class="select2">
													<option value="" selected="">-- Pilih Kecamatan --</option>
													<?php foreach ($data['kec'] as $row_kec): ?>
														<option value="<?=$row_kec['REFKECAMATAN_ID']; ?>"><?=$row_kec['REFKECAMATAN_NAMA']; ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>Kelurahan</p>
										</section>
										<section class="col col-md-3">
											<label class="select"> <i class="icon-append fa fa-search"></i>
												<select name="param[TBLKELURAHAN_IDBADANUSAHA]" id="TBLKELURAHAN_IDBADANUSAHA" class="select2">
													<option value="">-- Pilih Kelurahan --</option>
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
												<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHAALAMAT" name="param[TBLDAFTAR_BADANUSAHAALAMAT]">
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

	<section id="widget-grid-cetak-kartu-775sdfgsdfds98fbsduf" style="display: none;">
	<div class="well well-sm well-light">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-orange" id="wid-id-cetak-kartu-npwpd-<?= md5(microtime()) ?>"
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
								<i class="fa fa-print"></i> Cetak Kartu Data
							</button>	
							<button type="button" class="btn btn-default" onclick="cetak_status()">
								<i class="fa fa-print"></i> Cetak Daftar Status
							</button>
							<button type="button" class="btn btn-default" onclick="cetak_pengukuhan('<?= base64_encode('WP'); ?>')">
								<i class="fa fa-print"></i> Cetak Pengukuhan WP
							</button>
							<button type="button" class="btn btn-default" onclick="cetak_pengukuhan('<?= base64_encode('ARSIP'); ?>')">
								<i class="fa fa-print"></i> Cetak Pengukuhan Paraf
							</button>	
						</p>
							<div id="kontrol_table" style="overflow-y: scroll;overflow-x: scroll;height: 300px;width: 100%;">
								<table id="dt_pipeline" class="table table-striped table-bordered table-hover smart-form" width="100%">
									<thead>
										<tr>
											<th>	
										    	<label class="checkbox">
													<input type="checkbox" name="checkbox">
													<i></i>
												</label>
										    </th>
										    <th width="15"> NO</th>
										    <th data-hide="phone"><div class="center"> NPWP</div></th>
										    <th data-hide="phone"><div class="center"> GOL</div></th>
										    <th data-class="expand"><div class="center"> NO POKOK</div></th>
										    <th data-hide="phone, tablet"><div class="center"> KELURAHAN</div></th>
										    <th data-hide="phone, tablet"><div class="center"> KECAMATAN</div></th>
										    <th data-hide="phone, tablet">NAMA BADANUSAHA</th>
										    <th>ALAMAT BADANUSAHA</th>
										    <th>BBU</th>
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

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWP();
	});

	function generateAutocompleteWP() {
		$('#TBLDAFTAR_NOPOK').autocomplete({
			serviceUrl: 'pendaftaran/cetak_kartu/autocompletewp',

			onSelect: function (suggestion) {
		        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
		        window.id = suggestion.data;
		        window.nopokok = suggestion.TBLDAFTAR_NOPOK;
		        window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
		        window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
		        $(this).val(suggestion.value);
		        $('#TBLDAFTAR_NOPOK').val(suggestion.value.split(' | ')[0]);

		    }
		    ,showNoSuggestionNotice : true
		    ,noCache : true
		    ,noSuggestionNotice : "Tidak ditemukan hasil"
		});
	}

	function cari() {
			$("html, body").animate({ scrollTop: 800 }, "slow");
			$("#widget-grid-cetak-kartu-775sdfgsdfds98fbsduf").slideDown(600);
			$("#kontrol_table").html(LOADER).fadeIn(400);
			$.ajax({
				url: 'pendaftaran/cetak_kartu/GetData',
				type: 'POST',
				data:  {
						TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
						, TBLDAFTAR_JENISPENDAPATAN: $("#TBLDAFTAR_JENISPENDAPATAN").select2('val')
						, TBLDAFTAR_GOLONGAN: $("#TBLDAFTAR_GOLONGAN").val()
						, REFBADANUSAHA_ID: $("#REFBADANUSAHA_ID").select2('val')
						, TBLDAFTAR_ISAKTIF: $("#TBLDAFTAR_ISAKTIF").val()
						, TBLDAFTAR_PEMILIKNAMA: $("#TBLDAFTAR_PEMILIKNAMA").val()
						, TBLKECAMATAN_IDPEMILIK: $("#TBLKECAMATAN_IDPEMILIK").select2('val')
						, TBLKELURAHAN_IDPEMILIK: $("#TBLKELURAHAN_IDPEMILIK").select2('val')
						, TBLDAFTAR_PEMILIKALAMAT: $("#TBLDAFTAR_PEMILIKALAMAT").val()
						, TBLDAFTAR_BADANUSAHANAMA: $("#TBLDAFTAR_BADANUSAHANAMA").val()
						, TBLKECAMATAN_IDBADANUSAHA: $("#TBLKECAMATAN_IDBADANUSAHA").select2('val')
						, TBLKELURAHAN_IDBADANUSAHA: $("#TBLKELURAHAN_IDBADANUSAHA").select2('val')
						, TBLDAFTAR_BADANUSAHAALAMAT: $("#TBLDAFTAR_BADANUSAHAALAMAT").val()
					},
				success: function(respon) {
					$('#kontrol_table').html(respon);
		            $("#kontrol_table").prepend('<div align="center">'+LOADER+'');
		            $(".loader_img").fadeOut(1000);
				}
			});
			
			$('#widget-grid-cetak-kartu-775sdfgsdfds98fbsduf').show('fast');
		// }
	}

	function getKelurahan(val) {
		$.ajax({
			url: 'pendaftaran/cetak_kartu/getKelurahan',
			type: 'POST',
			dataType: 'html',
			data: {value: val},
			success: function(respon) {
				$('#TBLKELURAHAN_IDPEMILIK').html(respon);
			}
		})
	}

	function getKelurahan2(val) {
		$.ajax({
			url: 'pendaftaran/cetak_kartu/getKelurahan2',
			type: 'POST',
			dataType: 'html',
			data: {value: val},
			success: function(respon) {
				$('#TBLKELURAHAN_IDBADANUSAHA').html(respon);
			}
		})
	}

	function cetak() {
		var param = jQuery.param(
		{
			TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
			, TBLDAFTAR_JENISPENDAPATAN: $("#TBLDAFTAR_JENISPENDAPATAN").select2('val')
			, TBLDAFTAR_GOLONGAN: $("#TBLDAFTAR_GOLONGAN").val()
			, REFBADANUSAHA_ID: $("#REFBADANUSAHA_ID").select2('val')
			, TBLDAFTAR_ISAKTIF: $("#TBLDAFTAR_ISAKTIF").val()
			, TBLDAFTAR_PEMILIKNAMA: $("#TBLDAFTAR_PEMILIKNAMA").val()
			, TBLKECAMATAN_IDPEMILIK: $("#TBLKECAMATAN_IDPEMILIK").select2('val')
			, TBLKELURAHAN_IDPEMILIK: $("#TBLKELURAHAN_IDPEMILIK").select2('val')
			, TBLDAFTAR_PEMILIKALAMAT: $("#TBLDAFTAR_PEMILIKALAMAT").val()
			, TBLDAFTAR_BADANUSAHANAMA: $("#TBLDAFTAR_BADANUSAHANAMA").val()
			, TBLKECAMATAN_IDBADANUSAHA: $("#TBLKECAMATAN_IDBADANUSAHA").select2('val')
			, TBLKELURAHAN_IDBADANUSAHA: $("#TBLKELURAHAN_IDBADANUSAHA").select2('val')
			, TBLDAFTAR_BADANUSAHAALAMAT: $("#TBLDAFTAR_BADANUSAHAALAMAT").val()
		}
		);
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendaftaran/cetak_kartu/cetak?' + param);
	}

	function cetak_pengukuhan(jenis) {
		var param = jQuery.param(
		{
			TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
			, TBLDAFTAR_JENISPENDAPATAN: $("#TBLDAFTAR_JENISPENDAPATAN").select2('val')
			, TBLDAFTAR_GOLONGAN: $("#TBLDAFTAR_GOLONGAN").val()
			, REFBADANUSAHA_ID: $("#REFBADANUSAHA_ID").select2('val')
			, TBLDAFTAR_ISAKTIF: $("#TBLDAFTAR_ISAKTIF").val()
			, TBLDAFTAR_PEMILIKNAMA: $("#TBLDAFTAR_PEMILIKNAMA").val()
			, TBLKECAMATAN_IDPEMILIK: $("#TBLKECAMATAN_IDPEMILIK").select2('val')
			, TBLKELURAHAN_IDPEMILIK: $("#TBLKELURAHAN_IDPEMILIK").select2('val')
			, TBLDAFTAR_PEMILIKALAMAT: $("#TBLDAFTAR_PEMILIKALAMAT").val()
			, TBLDAFTAR_BADANUSAHANAMA: $("#TBLDAFTAR_BADANUSAHANAMA").val()
			, TBLKECAMATAN_IDBADANUSAHA: $("#TBLKECAMATAN_IDBADANUSAHA").select2('val')
			, TBLKELURAHAN_IDBADANUSAHA: $("#TBLKELURAHAN_IDBADANUSAHA").select2('val')
			, TBLDAFTAR_BADANUSAHAALAMAT: $("#TBLDAFTAR_BADANUSAHAALAMAT").val()
			, jenis: jenis
		}
		);
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendaftaran/cetak_kartu/cetakSKNPWPD?' + param);
	}

	function cetak_status() {
		var param = jQuery.param(
		{
			TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
			, TBLDAFTAR_JENISPENDAPATAN: $("#TBLDAFTAR_JENISPENDAPATAN").select2('val')
			, TBLDAFTAR_GOLONGAN: $("#TBLDAFTAR_GOLONGAN").val()
			, REFBADANUSAHA_ID: $("#REFBADANUSAHA_ID").select2('val')
			, TBLDAFTAR_ISAKTIF: $("#TBLDAFTAR_ISAKTIF").val()
			, TBLDAFTAR_PEMILIKNAMA: $("#TBLDAFTAR_PEMILIKNAMA").val()
			, TBLKECAMATAN_IDPEMILIK: $("#TBLKECAMATAN_IDPEMILIK").select2('val')
			, TBLKELURAHAN_IDPEMILIK: $("#TBLKELURAHAN_IDPEMILIK").select2('val')
			, TBLDAFTAR_PEMILIKALAMAT: $("#TBLDAFTAR_PEMILIKALAMAT").val()
			, TBLDAFTAR_BADANUSAHANAMA: $("#TBLDAFTAR_BADANUSAHANAMA").val()
			, TBLKECAMATAN_IDBADANUSAHA: $("#TBLKECAMATAN_IDBADANUSAHA").select2('val')
			, TBLKELURAHAN_IDBADANUSAHA: $("#TBLKELURAHAN_IDBADANUSAHA").select2('val')
			, TBLDAFTAR_BADANUSAHAALAMAT: $("#TBLDAFTAR_BADANUSAHAALAMAT").val()
		}
		);
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendaftaran/cetak_kartu/cetak_status?' + param);
	}

	var pagefunction = function() {

		/* BASIC ;*/
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			
			var breakpointDefinition = {
				desktop : 2800,
				tablet : 1024,
				phone : 480
			};

			$('#dt_basic').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_dt_basic) {
						responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_dt_basic.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_dt_basic.respond();
				}
			});

		/* END BASIC */
	};

	// load related plugins
	loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/jquery.dataTables.min.js", function(){
		loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.colVis.min.js", function(){
			loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.tableTools.min.js", function(){
				loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.bootstrap.min.js", function(){
					loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/datatables.responsive.min.js", pagefunction)
				});
			});
		});
	});



	function hapus(id) {
		window.id = id;
		window.cmd = "hapus";
		$.SmartMessageBox({
			title : "Konfirmasi",
			content : "Apakah anda yakin akan menghapus Data Perusahaan ini?",
			buttons : '[Tidak][Ya]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					type: 'POST',
					data: {id: id},
					success: function  (respon) {
						if (respon=='success') 
							notifikasi("Sukses","Data berhasil dihapus","success");
						else
							notifikasi("Gagal","Data gagal dihapus","failed");
					}
				});

			}

		});
		
	}


	function simpan () {
		$.smallBox({
			title : "Success",
			content : "<i class='fa fa-save'></i><i> Data Berhasil Disimpan</i>",
			color : "#296191",
			iconSmall : "fa fa-thumbs-up bounce animated",
			timeout : 1000			
		});
	}


	function edit () {
		$("#edit").modal('show');
	}

	function loadDataTable() {
		var param = {

		};

		$.ajax({
			url: 'pendaftaran/daftar_induk/cari',
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


</script>





<?php define('ASSETS_URL', 'themes/smartadmin');
	Yii::import('ext.LokalIndonesia');
; ?>

<style type="text/css">
	.infopengaduan {
	  border-left: 1px solid #DDD;
	  padding-left: 10px;
	  float: right;
	  text-align: justify;
	  line-height: 1.5em;
	  width: 18%;
	  color: #333;
	}
</style>

<div class="well well-sm well-light">
	<h1 class="text-center font-lg"><i class="fa fa-ballon"></i> DATA DETAIL PENGADUAN</h1>
</div>


<!-- <div class="inbox-checkbox-triggered">
	<div class="btn-group">
		<a rel="tooltip" title="" data-placement="bottom" data-original-title="Kembali" class="btn btn-default"><strong><i class="fa fa-chevron-circle-left fa-lg"></i></strong></a>
		<a rel="tooltip" title="" data-placement="bottom" data-original-title="Verifikasi Laporan" class="btn btn-default" data-toggle="modal" data-target="#verifikasi"><strong><i class="fa fa-check-square-o fa-lg"></i> Verifikasi</strong></a>
		<a rel="tooltip" title="" data-placement="bottom" data-original-title="Tanggapi Langsung" class="btn btn-default" data-toggle="modal" data-target="#tanggapai"><strong><i class="fa fa-inbox fa-lg"></i> Tanggapi</strong></a>
		<a rel="tooltip" title="" data-placement="bottom" data-original-title="Disposisi" class="deletebutton btn btn-default" data-toggle="modal" data-target="#deposisi"><strong><i class="fa fa-arrow-circle-o-right fa-lg"></i> Disposisi</strong></a>
		<a rel="tooltip" title="" data-placement="bottom" data-original-title="Komentar Langsung" class="btn btn-default" data-toggle="modal" data-target="#komentar"><strong><i class="fa fa-pencil fa-lg"></i> Komentar</strong></a>
	</div>
</div>
<br>
<br> -->

<div class="well well-sm well-light">
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-green" id="table-0" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-sortable="false" data-widget-editbutton="false">
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
				<h2>Daftar Pengaduan  </h2>

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
				  <!-- <div class="widget-body-toolbar">
				  	<a href="#modalsms" data-toggle="modal" class="btn btn-info"><i class="fa fa-plus-square"></i> Tambah
				  	</a>
				  </div> -->
				  <div id="tabelPengaduan">

				  </div>

				</div>
				<!-- end widget content -->

			</div>
			<!-- end widget div -->

		</div>
		<!-- end widget -->

	</article>
	<!-- WIDGET END -->
</div>
</div>

<div class="modal fade" id="modal_detailpengaduan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-lg modal-dialog" style="width:85%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					<i class="fa fa-fw fa-2x fa-file-text-o"></i>&nbsp;Form Tindak Lanjut
				</h4>
			</div>
			<div id="modal_badan"></div>
			
			<!-- end widget content -->

		</div>
		<!-- end widget div -->

	</div>
	<!-- end widget -->
</article>
</div>

<div class="modal fade" id="tanggapi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<i class="fa fa-2x fa-inbox"></i> Tanggapi Laporan
				</h4>
			</div>
			<div class="modal-body no-padding">
				<form method="post" class="smart-form" id="form-upload-22">
					<fieldset>
						<div class="row">
							<section class="col col-md-12">
								<p>Isikan Tanggapan Anda</p>
								<label class="textarea"> 										
									<textarea id="tambah_tanggapan" rows="3" name="tambah_tanggapan" placeholder=""></textarea> 
								</label>
							</section>
						</div>
					</fieldset>
					<footer>
						<button type="button" onclick="simpanTanggapan()" class="btn btn-primary">
							Simpan
						</button>
						<button class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
					</footer>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="komentar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<i class="fa fa-2x fa-comments-o"></i> Komentar Laporan
				</h4>
			</div>
			<div class="modal-body no-padding">
				<div></div>
				<form method="post" class="smart-form" id="form-upload">
					<fieldset>
						<div class="row">
							<section class="col col-md-12">
								<p>Isikan Komentar Anda</p>
								<label class="textarea"> 										
									<textarea id="tambah_komentar" rows="3" name="tambah_komentar" placeholder=""></textarea> 
								</label>
							</section>
						</div>
					</fieldset>
					<footer>
						<button type="button" onclick="simpanKomentar()" class="btn btn-primary">
							Simpan
						</button>
						<button class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
					</footer>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- <div class="modal-footer">
	<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
		<i class="fa fa-ban"></i>	Batal
	</button>
	<button class="btn btn-sm btn-primary" onclick="simpan()">
		<i class="fa fa-floppy-o"></i>&nbsp;Simpan
	</button>
</div> -->
</div>
</div>
</div>



<script type="text/javascript">
	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 *
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 *
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 *
	 * // activate inline charts
	 * runAllCharts();
	 *
	 * // setup widgets
	 * setup_widgets_desktop();
	 *
	 * // run form elements
	 * runAllForms();
	 *
	 ********************************
	 *
	 * pageSetUp() is needed whenever you load a page.
	 * It initializes and checks for all basic elements of the page
	 * and makes rendering easier.
	 *
	 */

	 pageSetUp();

	 $(function() {
	 	getTablePengaduan();
	 });

	/*
	 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	 * eg alert("my home function");
	 * 
	 * var pagefunction = function() {
	 *   ...
	 * }
	 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
	 * 
	 * TO LOAD A SCRIPT:
	 * var pagefunction = function (){ 
	 *  loadScript(".../plugin.js", run_after_loaded);	
	 * }
	 * 
	 * OR
	 * 
	 * loadScript(".../plugin.js", run_after_loaded);
	 */

	// PAGE RELATED SCRIPTS

	// pagefunction
	// pagefunction
	var pagefunction = function() {
		//console.log("cleared");

		/* // DOM Position key index //

			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class

			Also see: http://legacy.datatables.net/usage/features
			*/

			/* BASIC ;*/
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;

			var breakpointDefinition = {
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

			/* BASIC ;*/
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;

			var breakpointDefinition = {
				tablet : 1024,
				phone : 480
			};

			$('#dt_basic1').dataTable({
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



			/* COLUMN FILTER  */
			var otable = $('#datatable_fixed_column').DataTable({
	    	//"bFilter": false,
	    	//"bInfo": false,
	    	//"bLengthChange": false
	    	//"bAutoWidth": false,
	    	//"bPaginate": false,
	    	//"bStateSave": true // saves sort state using localStorage
	    	"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
	    	"t"+
	    	"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
	    	"autoWidth" : true,
	    	"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_fixed_column) {
					responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_fixed_column.respond();
			}

		});

	    // custom toolbar
	    $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');

	    // Apply the filter
	    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {

	    	otable
	    	.column( $(this).parent().index()+':visible' )
	    	.search( this.value )
	    	.draw();

	    } );
	    /* END COLUMN FILTER */

	    /* COLUMN SHOW - HIDE */
	    $('#datatable_col_reorder').dataTable({
	    	"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
	    	"t"+
	    	"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
	    	"autoWidth" : true,
	    	"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_col_reorder) {
					responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_col_reorder.respond();
			}
		});

	    /* END COLUMN SHOW - HIDE */

	    /* TABLETOOLS */
	    $('#datatable_tabletools').dataTable({

			// Tabletools options:
			//   https://datatables.net/extensions/tabletools/button_options
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
			"t"+
			"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
			"oTableTools": {
				"aButtons": [
				"copy",
				"csv",
				"xls",
				{
					"sExtends": "pdf",
					"sTitle": "SmartAdmin_PDF",
					"sPdfMessage": "SmartAdmin PDF Export",
					"sPdfSize": "letter"
				},
				{
					"sExtends": "print",
					"sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
				}
				],
				"sSwfPath": "http://192.168.0.7/diklat/nur/perizinan/ajs/datatables/swf/copy_csv_xls_pdf.swf"
			},
			"autoWidth" : true,
			"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_tabletools) {
					responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_tabletools.respond();
			}
		});

/* END TABLETOOLS */

};

	// load related plugins

	loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/jquery.dataTables.min.js", function(){
		loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.colVis.min.js", function(){
			loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.tableTools.min.js", function(){
				loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.bootstrap.min.js", function(){
					loadScript("<?php echo ASSETS_URL; ?>/ajs/datatable-responsive/datatables.responsive.min.js", pagefunction)
				});
			});
		});
	});

	function getTablePengaduan () {
		$.ajax({
			url: 'app/pengaduanv2/getTablePengaduan',
			type: 'post',
			data: {

			},
			success:function (respon) {
				$("#tabelPengaduan").html(respon);
			}
		});
	}

	function detail (id) {
		window.id = id;
		$("#modal_detailpengaduan").modal('show');
		$.ajax({
			url: 'app/pengaduanv2/getDetail',
			type: 'post',
			data: {id: id},
			success: function (respon) {
				//$("#modal_jenis").html(respon.tblpengaduan_jenis);
				//$('#modal_komentar').html(respon.tblpengaduan_komentar);
				//$('#modal_nama').html(respon.tblpengaduan_nama);
				//$('#modal_hp').html(respon.tblpengaduan_notelp);
				//$('#modal_tanggal').html(respon.tblpengaduan_tanggal);
				//$('#modal_detailnama').val(respon.tblpengaduan_nama);
				$("input[name=is_ditampilkan][value=" + respon.tblpengaduan_status + "]").prop('checked', true);
				$("#modal_badan").html(respon);
			}
		});

	}

	function simpanStatus (status) {
		$.ajax({
			url: 'app/pengaduanv2/simpanStatus',
			type: 'post',
			data: {
				status: status,
				id: window.id,
			},
			success: function (respon) {
				if (respon=="success") {
					notifikasi('Berhasil', 'Status Berhasil diubah', 'success',1,0);
				} else {
					notifikasi('Gagal', 'Status gagal diubah', 'failed',1,0);
				};
			}
		});
		
	}

	function simpanStatusKomentar (status, id) {
		$.ajax({
			url: 'app/pengaduanv2/simpanStatusKomentar',
			type: 'post',
			data: {
				status: status,
				id: id,
			},
			success: function (respon) {
				if (respon=="success") {
					notifikasi('Berhasil', 'Status Berhasil diubah', 'success',1,0);
				} else {
					notifikasi('Gagal', 'Status gagal diubah', 'failed',1,0);
				};
			}
		});
		
	}

	function simpanTanggapan () {
		$.ajax({
			url: 'app/pengaduanv2/simpanTanggapan',
			type: 'post',
			data: {
				id: window.id,
				isi: $("#tambah_tanggapan").val()
			},
			success: function (respon) {
				if (respon=="success") {
					notifikasi('Berhasil', 'Data Berhasil Disimpan', 'success',1,0);
					detail(id);
					$("#tanggapi").modal("hide");
					$("#tambah_tanggapan").val("");
				} else {
					notifikasi('Gagal', 'Data gagal dihapus', 'failed',0,0);
				};
			}
		});
		
	}

	function simpanKomentar () {
		$.ajax({
			url: 'app/pengaduanv2/simpanKomentar',
			type: 'post',
			data: {
				id: window.id,
				isi: $("#tambah_komentar").val()
			},
			success: function (respon) {
				if (respon=="success") {
					notifikasi('Berhasil', 'Data Berhasil Disimpan', 'success',1,0);
					detail(window.id);
					$("#komentar").modal("hide");
					$("#tambah_komentar").val("");
				} else {
					notifikasi('Gagal', 'Data gagal dihapus', 'failed',0,0);
				};
			}
		});
		
	}

	function hapusTindaklanjut (id) {
		$.SmartMessageBox({
			title : "Konfirmasi Penghapusan", // judul Smart Alert
			content : "Apakah anda yakin akan menghapus data ini ?", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
				url: 'app/pengaduanv2/hapusTindaklanjut',
				type: 'post',
				data: {
					id: id,
				},
					success: function (data) {
						if (data=='success') {
							notifikasi('Berhasil', 'Data berhasil dihapus', 'success',1,0);
							detail(window.id);
						}
						else {
							notifikasi('Gagal', 'Data surat gagal dihapus', 'failed',0,0);
						}
					}
				});

			}

		});
		return false;
	}

	function hapusKomentar (id) {
		$.SmartMessageBox({
			title : "Konfirmasi Penghapusan", // judul Smart Alert
			content : "Apakah anda yakin akan menghapus data ini ?", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
				url: 'app/pengaduanv2/hapusKomentar',
				type: 'post',
				data: {
					id: id,
				},
					success: function (data) {
						if (data=='success') {
							notifikasi('Berhasil', 'Data berhasil dihapus', 'success',1,0);
							detail(window.id);
						}
						else {
							notifikasi('Gagal', 'Data surat gagal dihapus', 'failed',0,0);
						}
					}
				});

			}

		});
		return false;
	}

	function tanggapiLangsung (id) {
		$("#tanggapi").modal('show');
	}

	function komentarLangsung (id) {
		$("#komentar").modal('show');
	}

</script>
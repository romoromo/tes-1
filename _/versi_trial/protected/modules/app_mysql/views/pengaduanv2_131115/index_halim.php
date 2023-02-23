<?php define('ASSETS_URL', 'themes/smartadmin');
; ?>

<div class="well well-sm well-light">
	<h1 class="text-center font-lg"><i class="fa fa-ballon"></i> DATA DETAIL PENGADUAN</h1>
</div>


<div class="inbox-checkbox-triggered">
	<div class="btn-group">
		<a rel="tooltip" title="" data-placement="bottom" data-original-title="Kembali" class="btn btn-default"><strong><i class="fa fa-chevron-circle-left fa-lg"></i></strong></a>
		<a rel="tooltip" title="" data-placement="bottom" data-original-title="Verifikasi Laporan" class="btn btn-default" data-toggle="modal" data-target="#verifikasi"><strong><i class="fa fa-check-square-o fa-lg"></i> Verifikasi</strong></a>
		<a rel="tooltip" title="" data-placement="bottom" data-original-title="Tanggapi Langsung" class="btn btn-default" data-toggle="modal" data-target="#tanggapai"><strong><i class="fa fa-inbox fa-lg"></i> Tanggapi</strong></a>
		<a rel="tooltip" title="" data-placement="bottom" data-original-title="Disposisi" class="deletebutton btn btn-default" data-toggle="modal" data-target="#deposisi"><strong><i class="fa fa-arrow-circle-o-right fa-lg"></i> Disposisi</strong></a>
		<a rel="tooltip" title="" data-placement="bottom" data-original-title="Komentar Langsung" class="btn btn-default" data-toggle="modal" data-target="#komentar"><strong><i class="fa fa-pencil fa-lg"></i> Komentar</strong></a>
	</div>
</div><br><br>



<div class="row">
	<article class="col-sm-12 col-md-12 col-lg-12">
<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget well" id="wid-id-3" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
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
				<span class="widget-icon"> <i class="fa fa-comments"></i> </span>
				<h2>Default Tabs with border </h2>

			</header>

			<!-- widget div-->
			<div>

				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->

				</div>
				<!-- end widget edit box -->

				<!-- widget content -->
				<div class="widget-body">
					
					<ul id="myTab1" class="nav nav-tabs bordered">
						<li class="active">
							<a href="#s1" data-toggle="tab">Tindak Lanjut</a>
						</li>
						<li>
							<a href="#s2" data-toggle="tab"> Komentar</a>
						</li>
					</ul>

					<div id="myTabContent1" class="tab-content padding-10">
						<div class="tab-pane fade in active" id="s1">

							<div class="row" style="padding: 45px;margin-top: -30px;">
								<a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tindak_lanjut">Tambah Tindak Lanjut</a>
							</div>
							<div class="tabbable tabs-below" style="margin-top: -47px;">
								<div class="tab-content padding-10">
									<div class="tab-pane active">

										<div class="chat-body no-padding profile-message">
											<ul>
												<li class="message" style="background-color: #F7F7F7;padding: 8px;">
													<img src="/themes/smartadmin/img/sunny.png" class="online">
													<span class="message-text" style="margin-bottom: 13px;"> <a href="javascript:void(0);" class="username">Superadmin</a>
														Didisposisikan ke <strong> Badan Perencanaan Pembangunan Daerah</strong> pada 2015-10-28 14:26:00</span>
												</li>
												<li class="message" style="background-color: #F7F7F7;padding: 8px;margin-top: 4px;">
													<img src="/themes/smartadmin/img/sunny.png" class="online">
													<span class="message-text" style="margin-bottom: 13px;"> <a href="javascript:void(0);" class="username">Superadmin</a>
														Didisposisikan ke <strong> Badan Perencanaan Pembangunan Daerah</strong> pada 2015-10-28 14:26:07</span>
												</li>
												<li class="message" style="background-color: #F7F7F7;padding: 8px;margin-top: 4px;">
													<img src="/themes/smartadmin/img/sunny.png" class="online">
													<span class="message-text" style="margin-bottom: 13px;"> <a href="javascript:void(0);" class="username">Superadmin</a>
														Didisposisikan ke <strong> Kantor Komunikasi dan Informatika</strong>pada 2015-10-28 14:33:47</span>
												</li>
												<li class="message" style="background-color: #F7F7F7;padding: 8px;">
													<img src="/themes/smartadmin/img/sunny.png" class="online">
													<span class="message-text" style="margin-bottom: 13px;"> <a href="javascript:void(0);" class="username">Superadmin</a>
													ya
													<p>pada 2015-10-28 14:25:25</p>
													<p><a href="#">Hapus Tanggapan</a></p></span>
												</li>
												<li class="message" style="background-color: #F7F7F7;padding: 8px;margin-top: 4px;">
													<img src="/themes/smartadmin/img/sunny.png" class="online">
													<span class="message-text" style="margin-bottom: 13px;"> <a href="javascript:void(0);" class="username">Superadmin</a>
													Menanggapi Sms Dari Admin
													<p>pada 2015-10-29 09:15:08 </p>
													<p><a href="#">Hapus Tanggapan</a></p></span>
												</li>
												
												</li>
											</ul>
										</div>

									</div>
								</div>
							</div>

						</div>
						<div class="tab-pane fade" id="s2">

							<div class="chat-body no-padding profile-message">
								<ul>
									<li class="message" style="background-color: #F7F7F7;padding: 8px;">
										<img src="/themes/smartadmin/img/sunny.png" class="online">
										<span class="message-text" style="margin-bottom: 13px;"> <a href="javascript:void(0);" class="username">Badan Perencanaan Pembangunan Daerah</a>
										Test Komentar
										<p>pada 2015-10-29 13:11:52</p>
										<p><a href="#">Hapus Komentar</a></p></span>
									</li>
									<li class="message" style="background-color: #F7F7F7;padding: 8px;margin-top: 4px;">
										<img src="/themes/smartadmin/img/sunny.png" class="online">
										<span class="message-text" style="margin-bottom: 13px;"> <a href="javascript:void(0);" class="username">Superadmin</a>
										Komentar ini mengomentari komentar yg diatasnya komentar ini #yodawg
										<p>pada 2015-10-29 09:15:08 </p>
										<p><a href="#">Hapus Komentar</a></p></span>
									</li>
								</ul>
								<div class="row" style="padding: 32px;">
									<a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#komentar">Tambah Komentar</a>
								</div>
							</div>

						</div>
					</div>

				</div>
				<!-- end widget content -->

			</div>
			<!-- end widget div -->

		</div>
		<!-- end widget -->
	</article>
</div>



<div class="modal fade" id="deposisi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<i class="fa fa-2x fa-arrow-circle-o-right"></i> Disposisi Laporan
				</h4>
			</div>
			<div class="modal-body no-padding">
				<form method="post" enctype="multipart/form-data" class="smart-form" id="form-upload-22">
					<fieldset>
						<div class="row">
							<section class="col col-md-3">
								Pendisposisi
							</section>
							<section class="col col-md-9">
								Superadmin
							</section>
						</div>
						<div class="row">
							<section class="col col-md-3">
								Disposisi
							</section>
							<section class="col col-md-9">
								<label class="textarea"> <i class="icon-append fa fa-comment"></i> 						
									<textarea rows="5" name="comment" placeholder=""></textarea> 
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-3">
								Didisposisikan ke-
							</section>
						</div>
						<div class="row">
							<section class="col col-md-9">
								<label class="checkbox">
									<input type="checkbox" name="checkbox" checked="checked">
									<i></i>Admin
								</label>
								<label class="checkbox">
									<input type="checkbox" name="checkbox" checked="checked">
									<i></i>Badan Perencanaan Pembangunan Daerah
								</label>
								<label class="checkbox">
									<input type="checkbox" name="checkbox" checked="checked">
									<i></i>Badan Penanaman Modal dan Perizinan Terpadu
								</label>
								<label class="checkbox">
									<input type="checkbox" name="checkbox" checked="checked">
									<i></i>Dinas Tanaman Pangan dan Hortikultur
								</label>
								<label class="checkbox">
									<input type="checkbox" name="checkbox" checked="checked">
									<i></i>Inspektorat
								</label>
								<label class="checkbox">
									<input type="checkbox" name="checkbox" checked="checked">
									<i></i>Badan Keluarga Berencana dan Pemberdayaan Perempuan
								</label>
								<label class="checkbox">
									<input type="checkbox" name="checkbox" checked="checked">
									<i></i>Skertariat KPU
								</label>
								<label class="checkbox">
									<input type="checkbox" name="checkbox" checked="checked">
									<i></i>Dinas Perkebunan
								</label>
								<label class="checkbox">
									<input type="checkbox" name="checkbox" checked="checked">
									<i></i>Dinas Pertambangan dan Energi
								</label>
								<label class="checkbox">
									<input type="checkbox" name="checkbox" checked="checked">
									<i></i>Dinas PU Cipta Karya
								</label>
								<label class="checkbox">
									<input type="checkbox" name="checkbox" checked="checked">
									<i></i>Dinas Perhubungan
								</label>
								<label class="checkbox">
									<input type="checkbox" name="checkbox" checked="checked">
									<i></i>Dinas Perindustrian dan Perdagangan
								</label>
							</section>
						</div>
					</fieldset>
					<footer>
						<button type="submit" class="btn btn-primary" data-dismiss="modal">
							Disposisi
						</button>
						<button type="submit" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
					</footer>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="verifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<i class="fa fa-2x fa-check-square-o"></i> Verifikasi Laporan
				</h4>
			</div>
			<div class="modal-body no-padding">
				<form method="post" enctype="multipart/form-data" class="smart-form" id="form-upload-22">
					<fieldset>
						<div class="row">
							<section class="col col-md-3">
								Kategori/Topik
							</section>
							<section class="col col-md-9">
								<label class="select">
									<select name="gender">
									<option selected="" disabled="">Pilih Kategori</option>
										<option>Saran</option>
										<option>Pengaduan</option>
										<option>Penangulangan Kemiskinan</option>
									</select> <i></i> 
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-3">
								Subyek/Judul
							</section>
							<section class="col col-md-9">
								<label class="textarea"> <i class="icon-append fa fa-comment"></i> 						
									<textarea rows="5" name="comment" placeholder=""></textarea> 
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-3">
								Status
							</section>
							<section class="col col-md-9">
								<div class="inline-group">
									<label class="radio">
										<input type="radio" name="radio-inline" checked="">
										<i></i>Aktif
									</label>
									<label class="radio">
										<input type="radio" name="radio-inline">
										<i></i>Tidak Aktif
									</label>
								</div>
							</section>
						</div>
					</fieldset>
					<footer>
						<button type="submit" class="btn btn-primary" data-dismiss="modal">
							Simpan
						</button>
						<button type="submit" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
					</footer>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="tanggapai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
				<form method="post" enctype="multipart/form-data" class="smart-form" id="form-upload-22">
					<fieldset>
						<div class="row">
							<section class="col col-md-12">
								<p>Isikan Tanggapi Anda</p>
								<label class="textarea"> 										
									<textarea rows="3" name="info" placeholder=""></textarea> 
								</label>
							</section>
						</div>
					</fieldset>
					<footer>
						<button type="submit" class="btn btn-primary" data-dismiss="modal">
							Simpan
						</button>
						<button type="submit" class="btn btn-default" data-dismiss="modal">
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
				<form method="post" enctype="multipart/form-data" class="smart-form" id="form-upload-22">
					<fieldset>
						<div class="row">
							<section class="col col-md-12">
								<p>Isikan Komentar Anda</p>
								<label class="textarea"> 										
									<textarea rows="3" name="info" placeholder=""></textarea> 
								</label>
							</section>
						</div>
					</fieldset>
					<footer>
						<button type="submit" class="btn btn-primary" data-dismiss="modal">
							Simpan
						</button>
						<button type="submit" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
					</footer>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="tindak_lanjut" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<i class="fa fa-2x fa-comments-o"></i> Tidak Lanjut Laporan
				</h4>
			</div>
			<div class="modal-body no-padding">
				<form method="post" enctype="multipart/form-data" class="smart-form" id="form-upload-22">
					<fieldset>
						<div class="row">
							<section class="col col-md-12">
								<p>Isikan Tindak Lanjut Anda</p>
								<label class="textarea"> 										
									<textarea rows="3" name="info" placeholder=""></textarea> 
								</label>
							</section>
						</div>
					</fieldset>
					<footer>
						<button type="submit" class="btn btn-primary" data-dismiss="modal">
							Simpan
						</button>
						<button type="submit" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
					</footer>
				</form>
			</div>
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

</script>
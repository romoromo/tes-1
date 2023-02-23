<?php define('ASSETS_URL', 'themes/smartadmin');
; ?>
<div class="well well-sm well-light">

	<button onclick="tambah()" type="button" class="btn btn-labeled btn-primary">
		<span class="btn-label">
			<i class="fa fa-plus "></i>
		</span>Tambah Jenis Izin
	</button>
</div>


<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
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
					<h2>Jenis Izin </h2>

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

					  <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
						  <thead>
							  <tr>
								 <th width="3%" data-hide="phone">No</th>
								 <th width="40%" data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i> Name Jenis Izin</th>
								  <!-- <th width="9%" data-hide="phone"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Lama Proses</th> -->
								  <th width="8%">Perlu Retribusi</th>
								  <!-- <th width="5%" data-hide="phone,tablet"><i class=" txt-color-blue hidden-md hidden-sm hidden-xs"></i>Icon</th> -->
								  <th width="9%" data-hide="phone,tablet">Cek Lapangan / Surat Tugas ?</th>
								  <th width="9%" data-hide="phone,tablet">Tabel Role</th>
								  <th width="7%" data-hide="phone,tablet"><i class=" txt-color-blue hidden-md hidden-sm hidden-xs"></i>Ditampilkan ?</th>
								  <th width="7%" data-hide="phone,tablet"><i class=" txt-color-blue hidden-md hidden-sm hidden-xs"></i>Online ?</th>
								  <th width="7%" data-hide="phone,tablet"><i class=" txt-color-blue hidden-md hidden-sm hidden-xs"></i>Multi ?</th>
								    <th width="14%">&nbsp;</th>
							  </tr>
						  </thead>
						  <tbody>
							   <?php $no=1; foreach ($dataizin as $izin): ?>
						  	<tr>
								  <td><?php echo $no++; ?></td>
								  <td><?php echo $izin['tblizin_nama']; ?></td>
								 <!--  <td>&nbsp;</td> -->
								  <td><?php echo $izin['tblizin_adaretribusi']=='T' ? 'Ya' : 'Tidak'; ?></td>
								  <!-- <td>&nbsp;</td> -->
								  <td><?php echo $izin['tblizin_adaceklap']=='T' ? 'Ya' : 'Tidak'; ?></td>
								  <td><?php echo $izin['tblrole_code']; ?></td>
								  <td><?php echo $izin['tblizin_isaktif']=='T' ? 'Ya' : 'Tidak'; ?></td>
								  <td><?php echo $izin['tblizin_isonline']=='T' ? 'Ya' : 'Tidak'; ?></td>
								  <td><?php echo $izin['tblizin_ismulti']=='T' ? 'Ya' : 'Tidak'; ?></td>
								    <td>

									    	<button onclick="edit(<?php echo $izin['tblizin_id']; ?>)" type="button" class="btn btn-success btn-sm" style="width:65px;">

									    			<i class="fa fa-edit"></i>&nbsp;
									    		Edit
									    	</button>

									    	<button  onclick="hapus(<?php echo $izin['tblizin_id']; ?>)" type='button' class='btn btn-danger btn-sm' style="width:65px;">

									    			<i class="fa fa-trash-o"></i>&nbsp;
									    		Hapus
									    	</button>

									</td>
							  </tr>
						  		<?php endforeach ?>
						  </tbody>
					  </table>

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

	<!-- end row -->

</section>
<!-- end widget grid -->

<!-- INI MODAL EDIT TUJUAN-->
<div class="modal fade" id="modalform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i>&nbsp;Form Jenis Izin</h4>
			</div>
			<form action="" id="form_izin" class="smart-form" novalidate>


				<fieldset>

					<div class="row">
						<section class="col col-3">
							<p>Nama Jenis Izin</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="input">
								<input id="nama_izin" class="input-sm" type="text" name="nama">
							</label>
						</section>
					</div>

					<hr>
					<br />
					<div class="row">
						<section class="col col-3">
							<p>Perlu Retribusi</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="select">
								<select name="retribusi_izin" id="retribusi_izin">
									<option value="T">Ya</option>
									<option value="F">Tidak</option>
								</select>
							</label>
						</section>
					</div>
					<hr>
					<br />
					<div class="row">
						<section class="col col-3">
							<p>Cek Lapangan / Surat Tugas ?</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="select">
								<select name="ceklap_izin" id="ceklap_izin">
									<option value="T">Ya</option>
									<option value="F">Tidak</option>
								</select>
							</label>
						</section>
					</div>
					<hr>
					<br />


					<div class="row">
						<section class="col col-3">
							<p> Tabel Role</p>
						</section>

						<section class="col col-1">:
						</section>

						<section class="col col-8">
							<label class="select">

								<select class="input-sm" id="tambah_role" name="tambah_role">
								<option value="0">===Silahkan Pilih===</option>
										<?php
											foreach ($comboRole as $role)  {
											echo '<option value="'.$role['tblrole_id'].'">'.$role['tblrole_code'].'</option>';
											}
										?>
								</select> <i></i>
							</label>
						</section>
					</div>

					<div class="row">
						<section class="col col-3">
							<p>Ditampilkan ?</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="select">
								<select name="isaktif_izin" id="isaktif_izin">
									<option value="T">Ya</option>
									<option value="F">Tidak</option>
								</select>
							</label>
						</section>
					</div>

					<div class="row">
						<section class="col col-3">
							<p>Is Pendaftaran Online ?</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="select">
								<select name="isonline_izin" id="isonline_izin">
									<option value="T">Ya</option>
									<option value="F">Tidak</option>
								</select>
							</label>
						</section>
					</div>

					<div class="row">
						<section class="col col-3">
							<p>Is Pendaftaran Multi ?</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="select">
								<select name="ismulti_izin" id="ismulti_izin">
									<option value="T">Ya</option>
									<option value="F">Tidak</option>
								</select>
							</label>
						</section>
					</div>

					<hr>
					<br />


			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
					<i class="fa fa-ban"></i>	Batal
				</button>
				<button class="btn btn-sm btn-primary">
					<i class="fa fa-floppy-o"></i>&nbsp;Simpan</button>
			</div>
			</fieldset>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- INI AKHIR DARI MODAL EDIT TUJUAN-->


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


	loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		var $orderForm = $("#form_izin").validate({
				// Rules for form validation
				rules : {
					nama : {
						required : true
					}
				},

				// Messages for form validation
				messages : {
					nama : {
						required : 'Mohon isikan Jenis Izin'
					}
				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				},
				submitHandler : function(form) {
					// saat validasi benar semua, jalankan simpan()
					return simpan();
				}
			});
}

	/*
	 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	 * eg alert("my home function");
	 *
	 * var pagefunction = function() {
	 *   ...
	 * }
	 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
	 *
	 */

	// PAGE RELATED SCRIPTS

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
	            "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
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
					loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/datatables.responsive.min.js", pagefunction)
				});
			});
		});
	});

	function simpan () {
		//$("#eg7").click();
		$.ajax({
			url: 'app/refizin/simpan',
			type: 'POST',
			data: {
				cmd: window.cmd,
				id: window.id,
				nama: $('#nama_izin').val(),
				adaretribusi: $('#retribusi_izin').val(),
				adaceklap: $('#ceklap_izin').val(),
				tambah_role: $('#tambah_role').val(),
				isaktif: $('#isaktif_izin').val(),
				isonline: $('#isonline_izin').val(),
				ismulti: $('#ismulti_izin').val(),
			}
			,success: function  (respon) {
				if (respon=='success'){

					$("#modalform").modal("hide");

					notifikasi("Sukses","Data berhasil disimpan","success");
				}
				else
					notifikasi("Gagal","Data gagal disimpan","failed");
			}
		});
		return false;

	}
function tambah() {
	window.cmd = "tambah";
	$("#modalform").modal("show");
	$("#nama_izin").val('');
	$("#retribusi_izin").val('');
	$("#ceklap_izin").val('');
	$("#isaktif_izin").val('');
	$("#tambah_role").val('');
	$("#isonline_izin").val('');
	$("#ismulti_izin").val('');
}

function editdata() {
	window.cmd = "edit";
	$("#modalform").modal("show");
	$("#nama_izin").val('');
	$("#retribusi_izin").val('');
	$("#ceklap_izin").val('');
	$("#isaktif_izin").val('');
	$("#isonline_izin").val('');
	$("#ismulti_izin").val('');
	$("#tambah_role").val('');
}

function edit(id) {
	window.id = id;
	window.cmd = "edit";
	$.ajax({
		url: 'app/refizin/GetDataIzin',
		type: 'POST',
		data: {id: id},
		success : function (respon) {
			$("#nama_izin").val(respon.split('||')[1]);
			$("#retribusi_izin").val(respon.split('||')[4]);
			$("#ceklap_izin").val(respon.split('||')[5]);
			$("#tambah_role").val(respon.split('||')[8]);
			$("#isaktif_izin").val(respon.split('||')[9]);
			$("#isonline_izin").val(respon.split('||')[10]);
			$("#ismulti_izin").val(respon.split('||')[11]);
		}
	});

	$("#modalform").modal("show");


}


function hapus(id) {
	window.id = id;
	window.cmd = "hapus";
	$.SmartMessageBox({
		title : "Konfirmasi",
		content : "Apakah anda yakin akan menghapus Jenis Izin ini?",
		buttons : '[Tidak][Ya]'
	}, function(ButtonPressed) {
		if (ButtonPressed === "Ya") {
			$.ajax({
				url: 'app/refizin/HapusDataJenisIzin',
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

</script>
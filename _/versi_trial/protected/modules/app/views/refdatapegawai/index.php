<?php define('ASSETS_URL', 'themes/smartadmin');
; ?>
<div class="well well-sm well-light">	

	<button onclick="tambah()" type="button" class="btn btn-labeled btn-primary">
		<span class="btn-label">
			<i class="fa fa-plus "></i>
		</span>Tambah Data Pegawai
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
					<h2>Data Pegawai</h2>

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
                          <th data-hide="phone"><div align="center">No</div></th>
                          <th data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Nama</th>
                          <th data-hide="phone"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>NIP</th>
                          <th data-hide="phone,tablet">Pangkat</th>
                          <th data-hide="phone,tablet">Golongan</th>
                          <th data-hide="phone,tablet">Jabatan</th>
                          <th data-hide="phone,tablet">SKPD</th>
                          <th data-hide="phone,tablet">Ditampilkan ?</th>
                          <th >&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; foreach ($datapegawai as $pegawai): ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $pegawai['tblpegawai_nama']; ?></td>
                          <td><?php echo $pegawai['tblpegawai_nip']; ?></td>
                          <td><?php echo $pegawai['tblpegawai_pangkat']; ?></td>
                          <td><?php echo $pegawai['tblpegawai_golongan']; ?></td>
                          <td><?php echo $pegawai['tblpegawai_jabatan']; ?></td>
                          <td><?php echo $pegawai['tblpegawai_skpd']; ?></td>
                          <td><?php echo $pegawai['tblpegawai_isaktif']=='T' ? 'Ya' : 'Tidak'; ?></td>
                          <td>
                          	<button onclick="edit(<?php echo $pegawai['tblpegawai_id']; ?>)" type="button" class="btn btn-labeled btn-success btn-sm" style="width:65px; height:30px;">
							    		
							    			<i class="fa fa-edit"></i>&nbsp;
							    		Edit
					    	</button>

					    	<button  onclick="hapus(<?php echo $pegawai['tblpegawai_id']; ?>)" type='button' class='btn btn-labeled btn-danger btn-sm' style="width:65px; height:30px;">
							    		
							    			<i class="fa fa-trash-o"></i>&nbsp;
							    		Hapus
					    	</button></td>
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



<!-- INI MODAL TAMBAH MISI-->
<div class="modal fade" id="modalform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-check"></i>&nbsp;Form Tambah Pegawai</h4>
			</div>
			<form action="" id="form_pegawai" class="smart-form" novalidate>
				<fieldset>

						<div class="row">
						<section class="col col-3">
							<p>Nama</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-6">
							<label class="input">
								<input class="input-sm" type="text" id="nama_pegawai" name="data_pegawai">
							</label>
						</section>
					</div>
					<hr>
					<br />
					<div class="row">
						<section class="col col-3">
							<p>NIP</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-6">
							<label class="input">
								<input class="input-sm" type="text" id="nip_pegawai" name="data_nip">
							</label>
						</section>
					</div>
					<hr>
					<br />
					<div class="row">
						<section class="col col-3">
							<p>Pangkat</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-6">
							<label class="input">
								<input class="input-sm" type="text" id="nama_pangkat" name="data_pangkat">
							</label>
						</section>
					</div>
					<hr>
					<br />
					<div class="row">
						<section class="col col-3">
							<p>Golongan </p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-6">
							<label class="input">
								<input class="input-sm" type="text" id="nama_golongan" name="data_golongan">
							</label>
						</section>
					</div>
					<hr>
					<br />
					
					<div class="row">
						<section class="col col-3">
							<p>Jabatan</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-6">
							<label class="input">
								<input class="input-sm" type="text" id="nama_jabatan" name="data_jabatan">
							</label>
						</section>
					</div>
					<hr>
					<br />
					<div class="row">
						<section class="col col-3">
							<p>SKPD</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-6">
							<label class="input">
								<input class="input-sm" type="text" id="nama_skpd" name="data_skpd">
							</label>
						</section>
					</div>
					<hr>
					<br />
					<div class="row">
						<section class="col col-3">
							<p>Ditampilkan ?</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-6">
							<label class="select">
								<select class="input-sm" id="nama_isaktif">
									<option value="0">Silahkan pilih</option>
									<option value="T">Ya</optiaon>
									<option value="F">Tidak</option>
								</select> <i></i> 
							</label>
						</section>
					</div>
					
			
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
		var $orderForm = $("#form_pegawai").validate({
				// Rules for form validation
				rules : {
					data_pegawai : {
						required : true
					},
					data_nip : {
						required : true
					},
					data_pangkat : {
						required : true
					},
					data_golongan : {
						required : true
					},
					data_jabatan : {
						required : true
					},
					data_skpd : {
						required : true
					}
				},

				// Messages for form validation
				messages : {
					data_pegawai : {
						required : 'Mohon isikan Nama Pegawai'
					},
					data_nip : {
						required : 'Mohon isikan NIP'
					},
					data_pangkat : {
						required : 'Mohon isikan Pangkat'
					},
					data_golongan : {
						required : 'Mohon isikan Golongan'
					},
					data_jabatan : {
						required : 'Mohon isikan Jabatan'
					},
					data_skpd : {
						required : 'Mohon isikan SKPD'
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


/*$('#eg7').click(function() {

			$.smallBox({
				title : "Data Berhasil Disimpan",
				content : "<i class='fa fa-save'></i><i> Klik disini untuk lihat data</i>",
				color : "#739E73",
				iconSmall : "fa fa-thumbs-up bounce animated",
				timeout : 4000			
			});

		})*/

/*
		function simpan () {
			$("#eg7").click();
		};*/

	//MODAL
	$('#modal_link').click(function() {
		$('#dialog-message').dialog('open');
		return false;
	});	




	// With Callback
$("#smart-mod-eg1").click(function(e) {
	$.SmartMessageBox({
		title : "Anda yakin ingin menghapus data ini!",
		content : "Data Yang sudah dihapus tidak dapat dikembalikan lagi",
		buttons : '[No][Yes]'
	}, function(ButtonPressed) {
		if (ButtonPressed === "Yes") {

			$.smallBox({
				title : "Callback function",
				content : "<i class='fa fa-clock-o'></i> <i>Data Berhasil Di Hapus</i>",
				color : "#659265",
				iconSmall : "fa fa-check fa-2x fadeInRight animated",
				timeout : 4000
			});
		}
		if (ButtonPressed === "No") {
			$.smallBox({
				title : "Callback function",
				content : "<i class='fa fa-clock-o'></i> <i>Data batal di hapus</i>",
				color : "#C46A69",
				iconSmall : "fa fa-times fa-2x fadeInRight animated",
				timeout : 4000
			});
		}

	});
	e.preventDefault();
			$.SmartMessageBox({
		title : "Anda yakin ingin menghapus data ini!",
		content : "Data Yang sudah dihapus tidak dapat dikembalikan lagi",
		buttons : '[No][Yes]'
	}, function(ButtonPressed) {
		if (ButtonPressed === "Yes") {

			$.smallBox({
				title : "Callback function",
				content : "<i class='fa fa-clock-o'></i> <i>Data Berhasil Di Hapus</i>",
				color : "#659265",
				iconSmall : "fa fa-check fa-2x fadeInRight animated",
				timeout : 4000
			});
		}
		if (ButtonPressed === "No") {
			$.smallBox({
				title : "Callback function",
				content : "<i class='fa fa-clock-o'></i> <i>Data batal di hapus</i>",
				color : "#C46A69",
				iconSmall : "fa fa-times fa-2x fadeInRight animated",
				timeout : 4000
			});
		}

	});
	e.preventDefault();
});	
function hapus() {
	$.SmartMessageBox({
		title : "Anda yakin ingin menghapus data ini!",
		content : "Data Yang sudah dihapus tidak dapat dikembalikan lagi",
		buttons : '[No][Yes]'
	}, function(ButtonPressed) {
		if (ButtonPressed === "Yes") {

			$.smallBox({
				title : "Callback function",
				content : "<i class='fa fa-clock-o'></i> <i>Data Berhasil Di Hapus</i>",
				color : "#659265",
				iconSmall : "fa fa-check fa-2x fadeInRight animated",
				timeout : 4000
			});
		}
		if (ButtonPressed === "No") {
			$.smallBox({
				title : "Callback function",
				content : "<i class='fa fa-clock-o'></i> <i>Data batal di hapus</i>",
				color : "#C46A69",
				iconSmall : "fa fa-times fa-2x fadeInRight animated",
				timeout : 4000
			});
		}

	});
}	

function simpan () {
	$.ajax({
		url: 'app/refdatapegawai/simpan',
		type: 'POST',
		data: {
			cmd: window.cmd,
			id: window.id,
			nama_pegawai: $('#nama_pegawai').val(),
			nip_pegawai: $('#nip_pegawai').val(),
			nama_pangkat: $('#nama_pangkat').val(),
			nama_golongan: $('#nama_golongan').val(),
			nama_jabatan: $('#nama_jabatan').val(),
			nama_skpd: $('#nama_skpd').val(),
			nama_isaktif: $('#nama_isaktif').val(),
		},
		success: function (respon) {
			if (respon=='success'){

				$("#modalform").modal("hide");
				notifikasi("Sukses","Data berhasil disimpan","success");
			}
			else
				notifikasi("Gagal","Data gagal disimpan","failed");
		}
	})
	
};

function tambah () {
	window.cmd="tambah";
	$("#modalform").modal("show");
	$('#nama_pegawai').val('');
	$('#nip_pegawai').val('');
	$('#nama_pangkat').val('');
	$('#nama_golongan').val('');
	$('#nama_jabatan').val('');
	$('#nama_skpd').val('');
	$('#nama_isaktif').val('');
}


function edit (id) {
	window.id = id;
	window.cmd = "edit";
	$.ajax({
		url: 'app/refdatapegawai/GetDataPegawai',
		type: 'POST',
		data: {id: id},
		success: function (respon) {
			$('#nama_pegawai').val(respon.split('||')[1]);
			$('#nip_pegawai').val(respon.split('||')[2]);
			$('#nama_pangkat').val(respon.split('||')[3]);
			$('#nama_golongan').val(respon.split('||')[4]);
			$('#nama_jabatan').val(respon.split('||')[5]);
			$('#nama_skpd').val(respon.split('||')[6]);
			$('#nama_isaktif').val(respon.split('||')[7]);
		}
	});
	$("#modalform").modal("show");

}

function editdata () {
	window.cmd="edit";
	$("#modalform").modal("show");
	$('nama_pegawai').val('');
	$('nip_pegawai').val('');
	$('nama_pangkat').val('');
	$('nama_golongan').val('');
	$('nama_jabatan').val('');
	$('nama_skpd').val('');
	$('nama_isaktif').val('');
	
}


function hapus(id) {
	window.id = id;
	window.cmd = "hapus";
	$.SmartMessageBox({
		title : "Konfirmasi",
		content : "Apakah anda yakin akan menghapus?",
		buttons : '[Tidak][Ya]'
	}, function(ButtonPressed) {
		if (ButtonPressed === "Ya") {
			$.ajax({
				url: 'app/refdatapegawai/HapusDataPegawai',
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
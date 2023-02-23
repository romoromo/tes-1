<?php define('ASSETS_URL', 'themes/smartadmin');
; ?>
<div class="well well-sm well-light">	

	<button onclick="tambah()" type="button" class="btn btn-labeled btn-primary">
		<span class="btn-label">
			<i class="fa fa-plus "></i>
		</span>Tambah Master Aplikasi
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
					<h2>Form Master Aplikasi</h2>

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
								  <th data-hide="phone">No</th>
								  <th data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Nama SKPD </th>
								  <th data-hide="phone"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Kabupaten</th>
								  <th data-hide="phone,tablet">Alamat</th>
								  <th data-hide="phone,tablet">Kepala</th>
								  <th data-hide="phone,tablet">Bendahara</th>
								  <th data-hide="phone,tablet">Kasubagtu</th>
								  <th data-hide="phone,tablet"><i class=" txt-color-blue hidden-md hidden-sm hidden-xs"></i>Ditampilkan ?</th>
							      <th>&nbsp;</th>
							  </tr>
						  </thead>

						  <tbody>
						  <?php $no=1; foreach ($datamasteraplikasi as $masteraplikasi): ?> 
							  <tr>
								  <td><?php echo $no++; ?></td>
								  <td><?php echo $masteraplikasi['tblmaster_skpd']; ?></td>
								  <td><?php echo $masteraplikasi['tblmaster_kabupaten']; ?></td>
								  <td><?php echo $masteraplikasi['tblmaster_alamat']; ?></td>
								  <td><?php echo $masteraplikasi['nama_kepala']; ?></td>
								  <td><?php echo $masteraplikasi['nama_bendahara']; ?></td>
								  <td><?php echo $masteraplikasi['nama_kasubagtu']; ?></td>
								  <td><div align="center"><?php echo $masteraplikasi['tblmaster_isaktif']=='T' ? 'Ya' : 'Tidak'; ?></div></td>
							      <td>
							      <button onclick="edit(<?php echo $masteraplikasi['tblmaster_id']; ?>)" type="button" class="btn btn-labeled btn-success btn-sm" style="width:65px; height:30px;">
								    		
								    			<i class="fa fa-edit"></i>
								    		Edit
								  </button>

								  <button  onclick="hapus(<?php echo $masteraplikasi['tblmaster_id']; ?>)" type='button' class='btn btn-labeled btn-danger btn-sm' style="width:65px; height:30px;">
								    		
								    			<i class="fa fa-trash-o"></i>
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
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-check"></i>&nbsp;Form Tambah Master Aplikasi</h4>
			</div>
			
			<form action="" id="form-master" class="smart-form" novalidate>


				<fieldset>

					<div class="row">
						<section class="col col-3">
							<p>Nama SKPD</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="input">
								<input class="input-sm" type="text" id="nama_skpd" name="tambah_skpd">
							</label>
						</section>
					</div>
					<hr>
					<br />
					
					<div class="row">
						<section class="col col-3">
							<p>Kabupaten</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="input">
								<input class="input-sm" type="text" id="nama_kabupaten" name="tambah_kabupaten">
							</label>
						</section>
					</div>
					<hr>
					<br />
					
					<div class="row">
						<section class="col col-3">
							<p>Alamat</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="input">
								<input class="input-sm" type="text" id="nama_alamat" name="tambah_alamat">
							</label>
						</section>
					</div>
					<hr>
					<br />
					
					<div class="row">
						<section class="col col-3">
							<p>Kepala</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="select">
								<select class="input-sm" id="nama_kepala" name="tambah_kepala">
								<option value="0">===Silahkan Pilih===</option>
										<?php
											foreach ($comboMaster as $combo)  {
											echo '<option value="'.$combo['tblpegawai_id'].'">'.$combo['tblpegawai_nama'].'</option>';
											}
										?>
								</select> <i></i> 
							</label>
						</section>
					</div>
					<hr>
					<br />
					
					<div class="row">
						<section class="col col-3">
							<p>Bendahara</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="select">
								<select class="input-sm" id="nama_bendahara" name="tambah_bendahara">
								<option value="0">===Silahkan Pilih===</option>
										<?php
											foreach ($comboMaster as $combo)  {
											echo '<option value="'.$combo['tblpegawai_id'].'">'.$combo['tblpegawai_nama'].'</option>';
											}
										?>
								</select> <i></i> 
							</label>
						</section>
					</div>
					<hr>
					<br />
					
					<div class="row">
						<section class="col col-3">
							<p>Kasubagtu</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="select">
								<select class="input-sm" id="nama_kasubagtu" name="tambah_kasubagtu">
								<option value="0">===Silahkan Pilih===</option>
										<?php
											foreach ($comboMaster as $combo)  {
											echo '<option value="'.$combo['tblpegawai_id'].'">'.$combo['tblpegawai_nama'].'</option>';
											}
										?>
								</select> <i></i> 
							</label>
						</section>
					</div>
					<hr>
					<br />

					<div class="row">
						<section class="col col-3">
							<p>Isaktif</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="select">
								<select class="input-sm" id="nama_isaktif" name="tambah_isaktif">
								<option value="0">===Silahkan Pilih===</option>
									<option value="T">Ya</option>
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
		var $orderForm = $("#form-master").validate({
				// Rules for form validation
				rules : {
					tambah_skpd : {
						required : true
					},
					tambah_kabupaten : {
						required : true
					},
					tambah_alamat : {
						required : true
					},
					tambah_kepala : {
						required : true
					},
					tambah_bendahara : {
						required : true
					},
					tambah_kasubagtu : {
						required : true
					},
					tambah_isaktif : {
						required : true
					}
				},

				// Messages for form validation
				messages : {
					tambah_skpd : {
						required : 'Mohon isikan Nama SKPD'
					},
					tambah_kabupaten : {
						required : 'Mohon isikan Nama Kabupaten'
					},
					tambah_alamat : {
						required : 'Mohon isikan Alamat'
					},
					tambah_kepala : {
						required : 'Mohon pilih Nama Kepala'
					},
					tambah_bendahara : {
						required : 'Mohon pilih Nama Bendahara'
					},
					tambah_kasubagtu : {
						required : 'Mohon pilih Nama Kasubagtu'
					},
					tambah_isaktif : {
						required : 'Mohon pilih Isaktif'
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
	/*$("#eg7").click();*/
	$.ajax({
		url: 'app/refmasteraplikasi/simpan',
		type: 'POST',
		data: {
			cmd: window.cmd,
			id: window.id,
			nama_skpd: $('#nama_skpd').val(),
			nama_kabupaten: $('#nama_kabupaten').val(),
			nama_alamat: $('#nama_alamat').val(),
			nama_kepala: $('#nama_kepala').val(),
			nama_bendahara: $('#nama_bendahara').val(),
			nama_kasubagtu: $('#nama_kasubagtu').val(),
			nama_isaktif: $('#nama_isaktif').val(),
		}
		,success: function  (respon) {
			if (respon=='success') {
				$("#modalform").modal("hide");

				notifikasi("Sukses","Data berhasil disimpan","success");}
			else
				notifikasi("Gagal","Data gagal disimpan","failed");
		}
	})

};

function tambah() {
	window.cmd = "tambah";
	$("#modalform").modal("show");
	$("#nama_skpd").val('');
	$("#nama_kabupaten").val('');
	$("#nama_alamat").val('');
	$('#nama_kepala').val('');
	$('#nama_bendahara').val('');
	$('#nama_kasubagtu').val('');
	$('#nama_isaktif').val('');
}


function edit(id) {
	window.id = id;
	window.cmd = "edit";
	$.ajax({
		url: 'app/refmasteraplikasi/GetDataMasterAplikasi',
		type: 'POST',
		data: {id: id},
		success : function (respon) {
			$("#nama_skpd").val(respon.split('||')[2]);
			$("#nama_kabupaten").val(respon.split('||')[3]);
			$("#nama_alamat").val(respon.split('||')[4]);
			$("#nama_kepala").val(respon.split('||')[5]);
			$("#nama_bendahara").val(respon.split('||')[6]);
			$("#nama_kasubagtu").val(respon.split('||')[7]);
			$("#nama_isaktif").val(respon.split('||')[8]);

		

		/*var filesbap = respon.split('||')[2];
				if (filesbap != "") {$("#file-bap").html("<a href='file/temp_bap/"+filesbap+"'>Lihat File yang sudah di Upload</a>")}
				else {$("#file-bap").html("Belum ada file yang di upload")}*/
		}

	});

	$("#modalform").modal("show");
	

}



function editdata() {
	window.cmd = "edit";
	$("#modalform").modal("show");
	$("#nama_skpd").val('');
	$("#nama_kabupaten").val('');
	$("#nama_alamat").val('');
	$('#nama_kepala').val('');
	$('#nama_bendahara').val('');
	$('#nama_kasubagtu').val('');
	$('#nama_isaktif').val('');
}


function hapus(id) {
	window.id = id;
	window.cmd = "hapus";
	$.SmartMessageBox({
		title : "Konfirmasi",
		content : "Apakah anda yakin akan menghapus Master Aplikasi ini?",
		buttons : '[Tidak][Ya]'
	}, function(ButtonPressed) {
		if (ButtonPressed === "Ya") {
			$.ajax({
				url: 'app/refmasteraplikasi/HapusDataMasterAplikasi',
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

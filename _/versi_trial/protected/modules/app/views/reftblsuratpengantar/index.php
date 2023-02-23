<?php define('ASSETS_URL', 'themes/smartadmin'); ?>

<!-- widget grid -->
<div class="well">
	<form class="form-horizontal" id="tambah_tabelsk">
		<fieldset>
			<p><b class="font-lg">Tabel Surat Pengantar</b> <br>Buat tabel baru</p>
			<div class="form-group">
				<label class="col-md-3 control-label">Nama Tabel:</label>
				<div class="col-md-4">							
				<div class="input-group">
					<span class="input-group-addon">tblsp_</span>
					<input class="form-control" id="tabel_baru_nama" placeholder="" type="text" name="tabel_baru_nama">
				</div>
				</div>
				<div class="col col-md-4">
					<button type="submit" class="btn btn-labeled btn-primary">
							 <span class="btn-label">
							  <i class="glyphicon glyphicon-edit"></i>
							 </span>Buat Tabel Baru
							</button>

					
				</div>

			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">(Penamaan harus tanpa spasi)</label>
			</div>
			
		</fieldset>
	</form>
</div>


<div class="alert alert-info alert-block">
	
	<h4 class="alert-heading">
	<i class="fa fa-info"></i>
	Informasi</h4>
	<i>Setelah menambahkan tabel baru silakan klik tombol <strong>Edit Tabel Surat Pengantar</strong> untuk mengedit Tabel</i>
	<p class="text-align-left">
		<br>
	<a id="tombol_edit" title="Edit Tabel yang sudah ada" class="btn btn-sm bg-color-teal txt-color-white" style="width: 200px;">
	<i class="fa fa-pencil"></i> Edit Tabel Surat Pengantar
	</a>

	<a id="tombo_batal_edit" title="Edit Tabel yang sudah ada" class="btn btn-sm bg-color-teal txt-color-white" style="width: 200px;">
		<i class="fa fa-times"></i> Batal Edit Tabel Surat Pengantar
	</a></p>
</div>		


<div class="well" id="list-edit">
	<form class="form-horizontal" id="form_pilih">
		<fieldset>
			<p><b class="font-lg">Pilih Tabel yang diedit</b></p>
			<div class="form-group">
				<label class="col-md-2 control-label" for="select-1">Pilih Tabel :</label>
				<div class="col-md-4">
					<select class="form-control" id="nama_tabel" name="nama_tabel" type="text">
						<option value="0"> === Silahkan Pilih Tabel=== </option>
							<?php
									foreach ($datatabel as $tabel)  {
									echo '<option value="'.$tabel['tblspizin_tabelvariabel_id'].'">'.$tabel['tblspizin_tabelsp'].'</option>';
									}
							?>
						</select>
				</div>
			</div>	
		</fieldset>
	</form>
</div>

<section id="tabel_editor">

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
					<h2>Edit Tabel <i id="nama_tabel_diedit"></i></h2>

				</header>

				<!-- widget div-->
			<div>
				<div class="widget-body no-padding">
				<div style="padding: 10px;">
					<button type="button" onclick="hapustabel()" class="btn btn-sm btn-danger">
					<i class="fa fa-times"></i> Hapus Tabel </button>
				</div>
				    <table id="" class="table table-striped table-bordered table-hover" width="100%">
                      <thead>
                        <tr>
                          <th  width="45%" data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i> Nama Field </th>
                          <th  width="9%" data-hide="phone"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Type Field</th>
                          <th  width="9%" data-hide="phone"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Panjang</th>
                          <th  width="9%" data-hide="phone"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Perintah</th>
                        </tr>
                      </thead>
                      <form class="smart-form" id="edit_field" name="edit_field">
                      <tbody id="tbody-edit">
                        
                      </tbody>
			        	</form>
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

	jQuery(document).ready(function($) {
		$("#list-edit").hide();
		$("#tombo_batal_edit").hide();
		$("#tabel_editor").hide();
	});

	$("#tombol_edit").click(function(event) {
		$("#list-edit").slideDown(200);
		$("#tombo_batal_edit").show();
		$("#tombol_edit").hide();
	});

	$("#tombo_batal_edit").click(function(event) {
		$("#list-edit").slideUp(200);
		$("#tombo_batal_edit").hide();
		$("#tombol_edit").show();
		$("#tabel_editor").slideUp(200);
	});

	$("#nama_tabel").change(function(event) {
		getListTabel();
	});

	function getListTabel () {
		$.ajax({
			url: 'app/Reftblsuratpengantar/getfield',
			type: 'post',
			data: {tabel: $("#nama_tabel option:selected").text()},
			success:function(respon) {
				$("#tabel_editor").fadeIn(500);
				$("#nama_tabel_diedit").html($("#nama_tabel option:selected").text());
				$("#tbody-edit").html(respon);
			}
		});
	}

	loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		var $orderForm = $("#tambah_tabelsk").validate({
				// Rules for form validation
				rules : {
					tabel_baru_nama : {
						required : true
					}
				},

				// Messages for form validation
				messages : {
					tabel_baru_nama : {
						required : 'Mohon isikan Nama Tabel Baru'
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

	function simpan () {
	$.ajax({
		url: 'app/Reftblsuratpengantar/simpan',
		type: 'POST',
		data: {
			tabel_baru: $('#tabel_baru_nama').val()
		},
			success: function  (respon) {
				if (respon=='success') {
					notifikasi('Berhasil', 'Tabel Berhasil dibuat', 'success');
				}
				else if(respon=='exist') {
					notifikasi('Gagal', 'Tabel Sudah Ada', 'fail');
				}
				else {
					notifikasi('Gagal', 'Tabel Gagal dibuat', 'fail');
				}	
			}
		});
	return false;

	}

	/*====================== Manipulasi Kolom ================================================*/

	function simpanfield () {
		if ($("#nama_field").val()!='' && $("#panjang_field").val()!='') {
			$.ajax({
				url: 'app/Reftblsuratpengantar/simpanfield',
				type: 'post',
				data: {
					tabel: $("#nama_tabel option:selected").text(),
					nama_field: $("#nama_field").val(),
					tipe_field: $("#tipe_field").val(),
					panjang_field: $("#panjang_field").val(),
					cmd: "tambah"
				},
					success:function(respon) {
						if (respon=='success') {
							notifikasi('Berhasil','Kolom berhasil Ditambahkan','success',true,false);
						}
						else {
							notifikasi('Gagal','Kolom Gagal Ditambahkan','fail',true,false);
						}
						$("#tabel_editor").fadeOut(300);
						getListTabel();
					}
			});
		}
		else {
			$.SmartMessageBox({
				title : "Isian Kosong", // judul Smart Alert
				content : "Anda belum  nama field dan atau panjang field", // konten dari smart alert
				buttons : '[Ok]' // pengaturan tombol
			}, function(ButtonPressed) {
				if (ButtonPressed === "Ok") {
					//nothing to do here
				}
			});
		}
	}

	function editfield (id) {
		$.ajax({
			url: 'app/Reftblsuratpengantar/simpanfield',
			type: 'post',
			data: {
				tabel: $("#nama_tabel option:selected").text(),
				nama_field: $("#nama_field"+id).val(),
				nama_field_lama: $("#nama_field_lama"+id).val(),
				tipe_field: $("#tipe_field"+id).val(),
				panjang_field: $("#panjang_field"+id).val(),
				cmd: "edit"
			},
				success:function(respon) {
					if (respon=='success') {
						notifikasi('Berhasil','Kolom berhasil diubah','success',true,false);
					}
					else {
						notifikasi('Gagal','Kolom Gagal diubah','fail',true,false);
					}
					$("#tabel_editor").fadeOut(300);
					getListTabel();
				}
		});
	}

	function hapusfield (id) {
		$.ajax({
			url: 'app/Reftblsuratpengantar/hapusfield',
			type: 'post',
			data: {
				tabel: $("#nama_tabel option:selected").text(),
				nama_field: $("#nama_field"+id).val()
			},
				success:function(respon) {
					if (respon=='success') {
						notifikasi('Berhasil','Kolom berhasil dihapus','success',true,false);
					}
					else {
						notifikasi('Gagal','Kolom Gagal dihapus','fail',true,false);
					}
					$("#tabel_editor").fadeOut(300);
					getListTabel();
				}
		});
	}

	/*====================== End of Manipulasi Kolom ================================================*/

	function hapustabel () {
		var nama_tabel = $("#nama_tabel option:selected").text();
		$.SmartMessageBox({
				title : "Apakah anda yakin akan menghapus Tabel <i class='txt-color-red'>"+nama_tabel+"</i> ?", // judul Smart Alert
				content : "Peringatan, semua data yang ada di tabel <i class='txt-color-red'>"+nama_tabel+"</i> akan terhapus dan tidak dapat di kembalikan", // konten dari smart alert
				buttons : '[Tidak][Ya]' // pengaturan tombol
			}, function(ButtonPressed) {
				if (ButtonPressed === "Ya") {
					$.ajax({
						url: 'app/Reftblsuratpengantar/hapustabel',
						type: 'post',
						data: {tabel: $("#nama_tabel_diedit").html()},
						success:function (respon) {
							if (respon=='success') {
								notifikasi('Berhasil', 'Tabel Berhasil Dihapus', 'success');
							}
							else {
								notifikasi('Gagal', 'Tabel Gagal Dihapus', 'fail');
							}
						}
					});
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

		})
*/

		/*function simpan () {
			$("#eg7").click();
		};*/

	//MODAL
	$('#modal_link').click(function() {
		$('#dialog-message').dialog('open');
		return false;
	});	
	
</script>
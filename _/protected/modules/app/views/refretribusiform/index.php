<?php define('ASSETS_URL', 'themes/smartadmin');
?>
<div class="well well-sm well-light">	

	<button onclick="tambah()" type="button" class="btn btn-labeled btn-primary">
		<span class="btn-label">
			<i class="fa fa-plus "></i>
		</span>Tambah Retribusi
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
					<h2>Data Form Retribusi</h2>
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
								  <th width="3%">Templet SKRD</th>
								  <th width="45%" data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i> Tabel Retribusi</th>
								  <th width="9%" data-hide="phone"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Jenis Izin</th>
								  <th width="8%">File</th>
								  <th width="5%" data-hide="phone,tablet"><i class=" txt-color-blue hidden-md hidden-sm hidden-xs"></i>Kode Rekening </th>
								    <th width="14%">&nbsp;</th>
							  </tr>
						  </thead>
						  <tbody>
						  <?php $no=1; foreach ($dataretribusi as $retribusi): ?>
							  <tr>
							  	  <td><?php echo $no++; ?></td>
								  <td><?php /*<a href="file/temp_cetak_skr/<?php echo $retribusi['tblretribusiform_skrd']; ?>">*/?><?php echo $retribusi['tblretribusiform_skrd']; ?></td>
							      <td><?php echo $retribusi['tblretribusiform_table']; ?></td>
						          <td><?php echo $retribusi['tblizin_nama']; ?></td>
						          <td><?php /*<a href="file/temp_form_retribusi/<?php echo $retribusi['tblretribusiform_file']; ?>">*/ ?><?php echo $retribusi['tblretribusiform_file']; ?></td>
						          <td><?php echo $retribusi['tblretribusiform_kdrekening']; ?></td>
							      <td>
							      
								    	<button onclick="edit(<?php echo $retribusi['tblretribusiform_id']; ?>)" type="button" class="btn btn-labeled btn-success btn-sm" style="width:65px; height:30px;">
								    		
								    			<i class="fa fa-edit"></i>
								    		Edit
								    	</button>

								    	<button  onclick="hapus(<?php echo $retribusi['tblretribusiform_id']; ?>)" type='button' class='btn btn-labeled btn-danger btn-sm' style="width:65px; height:30px;">
								    	
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
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-check"></i>&nbsp;Form Retribusi</h4>
			</div>
			<form action="" id="order-form" class="smart-form" novalidate>
				<fieldset>

					<div class="row">
						<section class="col col-3">
							<p>Tabel Retribusi </p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="input">
								<input class="input-sm" type="text" id="nama_tabel">
							</label>
						</section>
					</div>
					<hr>
					<br />	

					<div class="row">
						<section class="col col-3">
							<p> Jenis Izin</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="select">
								
								<select class="input-sm" id="nama_izin">
								<option value="0">===Silahkan Pilih===</option>
										<?php
											foreach ($comboIzinFiltered as $izin)  {
											echo '<option value="'.$izin['tblizin_id'].'">'.$izin['tblizin_nama'].'</option>';
											}
										?>
								</select> <i></i> 
							</label>
							<label>Izin yang tampil adalah izin yang belum diatur form hitung & template SKRD</label>
						</section>
					</div>
					<hr>
					<br />

					<div class="row">
						<section class="col col-3">
							<p>Kode rekening</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="input">
								<input class="input-sm" type="text" id="nama_rekening">
							</label>
						</section>
					</div>
					<hr>
					<br />

					<div class="row">
					<section class="col col-6">
						<p class="help-block">
							Nama File SKRD
						<label class="input">
							<input class="input-sm" type="text" id="nama_skrd" onchange="$('#namafilenya_skrd').val(this.value)">
						</label>
						</p>		
					</section>
					</div>

					<section>
					<div id="file-cetakskrd">
							
					</div>
					</section>

					<div class="row">
					<section class="col col-6">
						<p class="help-block">
							Nama File Form Retribusi
						<label class="input">
							<input class="input-sm" type="text" id="nama_retribusi" onchange="$('#namafilenya_retribusi').val(this.value)">
						</label>
						</p>		
					</section>
					</div>

					<section>
					<div id="file-formretribusi">
							
					</div>
					</section>


				</fieldset>							
			</form>

			<form method="post" enctype="multipart/form-data" class="smart-form" action="app/Refretribusiform/SimpanFileTemplateSkrd" id="form-upload-temp">

				<section>
					<label class="label">Upload Template SKRD</label>
					<label for="file" class="input input-file">
							<div class="button">
								<input type="file" id="nama_fileskrd" name="nama_fileskrd" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Upload File PHP" readonly="">
								<input type="hidden" name="namafilenya_skrd" id="namafilenya_skrd" value="">
								<b class="tooltip tooltip-top-right">Upload Template SKRD</b>
					</label>
				</section>
				<section>
					<div class="progress progress-md progress-striped active" id="progress">
						<div class="progress-bar bg-color-blue"  id="bar"  role="progressbar" style="width: auto;"></div>
					</div>
				</section>
										
				<section>
					<button type="submit" id="submit-file" style="display: none;" class="btn btn-block bg-color-blue btn-success">
						<i class="fa fa-upload"></i> Upload File</button>
				</section>
				
			</form>
			<hr>
			<br />

			<form method="post" enctype="multipart/form-data" class="smart-form" action="app/Refretribusiform/SimpanFileRetribusi" id="form-upload-form">

				<section>
					<label class="label">Upload Template Form Retribusi</label>
					<label for="file" class="input input-file">
							<div class="button">
								<input type="file" id="nama_fileretribusi" name="nama_fileretribusi" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Upload File PHP" readonly="">
								<input type="hidden" name="namafilenya_retribusi" id="namafilenya_retribusi" value="">
								<b class="tooltip tooltip-top-right">Upload Template Form Retribusi</b>
					</label>
				</section>
				<section>
					<div class="progress progress-md progress-striped active" id="progress">
						<div class="progress-bar bg-color-blue"  id="bar"  role="progressbar" style="width: auto;"></div>
					</div>
				</section>
										
				<section>
					<button type="submit" id="submit-form" style="display: none;" class="btn btn-block bg-color-blue btn-success">
						<i class="fa fa-upload"></i> Upload File</button>
				</section>
				
			</form>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<i class="fa fa-ban"></i>	Batal
				</button>
				<button onclick="simpan()" type="button" class="btn btn-primary" id="eg7" data-dismiss="modal">
					<i class="fa fa-floppy-o"></i>&nbsp;Simpan</button>
				</div>
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

	loadScript("<?php echo ASSETS_URL; ?>/js/jquery.form.js",defineAjaxForm2);
	function defineAjaxForm2() {
		var options = { 
			beforeSend: function() 
			{
				$("#progress").show();
		    	//clear everything
		    	$("#bar").width('0%');

		    },
		    uploadProgress: function(event, position, total, percentComplete) 
		    {
		    	$("#bar").width(percentComplete+'%');

		    },
		    success: function() 
		    {
		    	$("#bar").width('100%');

		    },
		    complete: function(response) 
		    {
		    	//alert("complete")
		    },
		    error: function()
		    {
		    	alert("error");

		    }

		}; 

		$("#form-upload-temp").ajaxForm(options);
		$("#form-upload-form").ajaxForm(options);
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


	/*	function simpan () {
			$("#eg7").click();
		};
*/
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

function simpan () {
	/*$("#eg7").click();*/
	$.ajax({
		url: 'app/refretribusiform/simpan',
		type: 'POST',
		data: {
			cmd: window.cmd,
			id: window.id,
			nama_tabel: $('#nama_tabel').val(),
			nama_izin: $('#nama_izin').val(),
			id_izin : window.izinid,
			nama_rekening: $('#nama_rekening').val(),
			nama_skrd: $('#nama_skrd').val(),
			nama_retribusi: $('#nama_retribusi').val(),


		}
		,success: function  (respon) {
			$("#submit-file").click();
			$("#submit-form").click();

			if (respon=='success') 
				notifikasi("Sukses","Data berhasil disimpan","success");
			else
				notifikasi("Gagal","Data gagal disimpan","failed");
		}
	})
	return false;

};

function tambah() {
	window.cmd = "tambah";
	$("#modalform").modal("show");
	$('#nama_tabel').val(''),
	$("#nama_izin").val('');
	$("#nama_rekening").val('');
	$('#nama_skrd').val('');
	$('#nama_retribusi').val('');
	$("#nama_izin").prop('disabled', false);
}


function edit(id) {
	window.id = id;
	window.cmd = "edit";
	$.ajax({
		url: 'app/refretribusiform/GetDataRetribusi',
		type: 'POST',
		data: {id: id},
		success : function (respon) {
			$("#nama_tabel").val(respon.split('||')[2]);
			$("#nama_izin").val(respon.split('||')[1]);
			window.izinid = respon.split('||')[1];
			$("#nama_rekening").val(respon.split('||')[4]);
			$("#nama_skrd").val(respon.split('||')[5]);
			$("#nama_skrd").val(respon.split('||')[3]);


			var filesskrd = respon.split('||')[5];
				if (filesskrd != "") {$("#file-cetakskrd").html("<a href='file/temp_cetak_skr/"+filesskrd+"'>Lihat File yang sudah di Upload</a>")}
				else {$("#file-cetakskrd").html("Belum ada file yang di upload")}

			var filesretribusi = respon.split('||')[3];
				if (filesretribusi != "") {$("#file-formretribusi").html("<a href='file/temp_form_retribusi/"+filesretribusi+"'>Lihat File yang sudah di Upload</a>")}
				else {$("#file-formretribusi").html("Belum ada file yang di upload")}

		}
	});

	//kunci jenis izin
	$("#nama_izin").prop('disabled', true);

	$("#modalform").modal("show");
	

}


function editdata() {
	window.cmd = "edit";
	$("#modalform").modal("show");
	$("#nama_tabel").val('');
	$("#nama_izin").val('');
	$("#nama_rekening").val('');
	$("#nama_skrd").val('');
	$("#nama_retribusi").val('');
}


function hapus(id) {
	window.id = id;
	window.cmd = "hapus";
	$.SmartMessageBox({
		title : "Konfirmasi",
		content : "Apakah anda yakin akan menghapus Form Retribusi ini?",
		buttons : '[Tidak][Ya]'
	}, function(ButtonPressed) {
		if (ButtonPressed === "Ya") {
			$.ajax({
				url: 'app/refretribusiform/HapusDataRetribusi',
				type: 'POST',
				data: {id: id},
				success: function  (respon) {
					if (respon=='success') 
						notifikasi("Sukses","Data berhasil dihapus","success",true);
					else
						notifikasi("Gagal","Data gagal dihapus","failed");
				}
			});

		}

	});
	
}

</script>
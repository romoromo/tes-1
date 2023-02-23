<?php define('ASSETS_URL', 'themes/smartadmin');
; ?>



<div class="well well-sm well-light">
<div>
	<div class="row">
		<section class="col-md-2">
			Jenis Izin
		</section>
		<section class="col-md-8">
		  <div>
			<select class="select2" class="form-control" id="jenis_izin" name="jenis_izin" type="text">
			<option value=""> === Silahkan Pilih Jenis Izin=== </option>
				<?php
					foreach ($comboIzin as $izin)  {
					echo '<option value="'.$izin['tblizin_id'].'">'.$izin['tblizin_nama'].'</option>';
					}
				?>
			</select>
			</div>
		</section>
	</div>
</div><br />
<div>
	<div class="row">
		<section class="col-md-2">
			Jenis Pemohonan
		</section>
		<section class="col-md-6">
		  <div>
			<select class="form-control" id="jenis_permohonan" name="jenis_permohonan" type="text">
			<option value="">===Silahkan Pilih Jenis Permohonan===</option>
			</select>
			</div>
		</section>
	</div>
</div><br />
		<div class="row">
		<div class="col-md-2">
		</div>
			<button onclick="buattemplatesk()" class="btn btn-labeled btn-primary">
				<span class="btn-label">
					<i class="fa fa-edit"></i>
				</span>Upload Formulir izin
			</button>
		</div>
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
					<h2>Formulir Izin</h2>

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
				  <div id="datalist">
				  	 <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                      <thead>
                        <tr>
                          <th width="3%"><div align="center">No</div></th>
                          <th  width="45%" data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i> Nama Izin </div></th>
                          <th  width="45%" data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Nama Permohonan</div></th>
                          <th  width="45%" data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Template</div></th>
                          
                          <th>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; foreach ($datatemplatesk as $templatesk): ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $templatesk['tblizin_nama']; ?></td>
                          <td><?php echo $templatesk['tblizinpermohonan_nama']; ?></td>
                          
                          <td><a href="file/temp_formulirizin/<?php echo $templatesk['refformulirizin_file']; ?>" target="_blank"><?php echo $templatesk['refformulirizin_file']; ?></a></td>
                          <td>
                           <button onclick="edit(<?php echo $templatesk['refformulirizin_id']; ?>)" type="button" class="btn btn-labeled btn-success btn-sm" style="width:65px; height:30px;"> 		
					    		<i class="fa fa-edit"></i>
					    		Edit
					    	</button>

					    	<button  onclick="hapus(<?php echo $templatesk['refformulirizin_id']; ?>)" type='button' class='btn btn-labeled btn-danger btn-sm' style="width:65px; height:30px;">
					    		<i class="fa fa-trash-o"></i>
					    		Hapus
					    	</button>
					    </td>
                        </tr>
                       <?php endforeach ?>

                      </tbody>
			        </table>
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

	<!-- end row -->

	<!-- end row -->

</section>
<!-- end widget grid -->



<!-- INI MODAL TAMBAH MISI-->
<div class="modal fade" id="modaltemplatesk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-check"></i>&nbsp;Form Formulir Izin</h4>
			</div>
			<form action="" id="order-form" class="smart-form" novalidate>						
			</form>

			<form method="post" enctype="multipart/form-data" class="smart-form" action="app/Settingformulirizin/SimpanFileTemplateSK" id="form-upload-sk">
			<fieldset>
				<div class="row">
					<section class="col col-6">
						<label class="label">Upload Formulir Izin</label>
						<label for="file" class="input input-file">
								<div class="button">
									<input type="file" id="nama_filesk" name="nama_filesk" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="" readonly="">
									<input type="hidden" name="namafilenya_sk" id="namafilenya_sk" value="">
									<b class="tooltip tooltip-top-right">Upload Formulir Izin</b>
						</label>
						<input type="hidden" name="namafilenya_sk" id="namafilenya_sk" value="">
					</section>
				</div>
				<?php /*<div class="row">
					<section class="col col-6">
							<p class="help-block">
								Nama File SK
							<label class="input">
								<input class="input-sm" type="text" id="tblnama_filesk" name="tblnama_filesk" onchange="$('#namafilenya_sk').val(this.value)">
							</label>
							</p>		
					</section>
				</div>*/ ?>
				
				<section>
					<div class="progress progress-md progress-striped active" id="progress">
						<div class="progress-bar bg-color-blue"  id="bar"  role="progressbar" style="width: auto;"></div>
					</div>
				</section>
				</fieldset>						
				<section>
					<button type="submit" id="submit-file" style="display: none;" class="btn btn-block bg-color-blue btn-success">
						<i class="fa fa-upload"></i> Upload File</button>
				</section>

				<fieldset style="margin-top: -40px;">
					<div>
					<section id="info-variabel">
						
					</section>
					</div>
					
				</fieldset>
			
			</form>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<i class="fa fa-ban"></i> Batal
				</button>
				<button onclick="simpan()" type="button" class="btn btn-primary" id="eg7">
					<i class="fa fa-floppy-o"></i> Simpan</button>
			</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>



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
		    success: function(respon) 
		    {
		    	$("#bar").width('100%');

		    	if (respon.responseText!='failed'){

					$("#modaltemplatesk").modal("hide");

					notifikasi("Sukses","Data berhasil disimpan","success");
					reload();
				}
				else
					notifikasi("Gagal","Data gagal disimpan","failed");

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

		$("#form-upload-sk").ajaxForm(options);
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
	/*function edit() {
		$("#edit1").modal('show');
	}*/


function buattemplatesk() {
	if ($("#jenis_izin").val()!='' &&  $("#jenis_permohonan").val()!='') {
		window.cmd = "tambah";
		window.jenis_izin = $("#jenis_izin").val();
		window.jenis_permohonan = $("#jenis_permohonan").val();

		$("#modaltemplatesk").modal("show");
	}
	else {
		$.SmartMessageBox({
				title : "Isian Kosong", // judul Smart Alert
				content : "Anda belum memilih jenis izin dan atau jenis permohonan", // konten dari smart alert
				buttons : '[Ok]' // pengaturan tombol
			}, function(ButtonPressed) {
				if (ButtonPressed === "Ok") {
					//nothing to do here
				}
			});
	}
}

function edit (id) {
	window.cmd = "edit";
	$.ajax({
		url: 'app/settingformulirizin/Edit',
		type: 'post',
		data: {id: id},
		success:function (respon) {
			$("#nama_table").val(respon.split("||")[5]);
			$("#tblnama_filesk").val(respon.split("||")[3]);
			window.jenis_izin = respon.split("||")[1];
			window.jenis_permohonan = respon.split("||")[2];
			window.id = id;
			$("#modaltemplatesk").modal("show");
		}
	});
}

$("#nama_table").change(function(event) {
	getvariabel($("#nama_table option:selected").text());
});

function getvariabel (tabel) {
	$.ajax({
		url: 'app/settingformulirizin/InfoVariabel',
		type: 'post',
		data: {tabel: tabel},
		success:function(respon){
			$("#info-variabel").html(respon);
		}
	});
}

function simpan() {
	var nama_file = typeof( $("#nama_filesk").val().split('\\')[2] )!="undefined" ? $("#nama_filesk").val().split('\\')[2] : $("#nama_filesk").val().split('\\')[0];
	$.ajax({
		url: 'app/settingformulirizin/simpan',
		type: 'POST',
		data: {
			cmd: window.cmd,
			id: window.id,
			nama_table: $('#nama_table').val(),
			nama_filesk: nama_file,
			izin: window.jenis_izin,
			permohonan: window.jenis_permohonan
		}
		,success: function  (respon) {
				$("#submit-file").click();
				reload();
				/*if (respon=='success'){

					$("#modaltemplatesk").modal("hide");

					notifikasi("Sukses","Data berhasil disimpan","success",false,false);
				}
				else
					notifikasi("Gagal","Data gagal disimpan","failed",false,false);*/
			}
		});
		return false;

}

function hapus(id) {
	$.SmartMessageBox({
				title : "Apakah anda yakin akan menghapus data ini ?", // judul Smart Alert
				content : "Data yang dihapus tidak dapat di kembalikan", // konten dari smart alert
				buttons : '[Tidak][Ya]' // pengaturan tombol
			}, function(ButtonPressed) {
				if (ButtonPressed === "Ya") {
					$.ajax({
						url: 'app/settingformulirizin/Hapus',
						type: 'post',
						data: {id: id},
						success:function (respon) {
							if (respon=='success') {
								notifikasi("Berhasil", "Data berhasil dihapus","success",1,0);
								reload();
							}
							else {
								notifikasi("Gagal", "Data Gagal dihapus","success",1,0);
							}
						}
					});
				}

			});
	
}

$('#jenis_izin').change(function() {
        var selectedCategory = $('#jenis_izin option:selected').val();
        getJenisPermohonan(selectedCategory);
});

function ambiljenispermohonan () {       
		   setTimeout(function () {    
		      $("#jenis_permohonan").val(window.datalist.split('||')[2]);        
		   }, 500)
}


function getJenisPermohonan(idizin) {
		$.ajax({
                type: 'POST',
                url: 'app/settingformulirizin/GetJenisPermohonan',
                dataType: 'html',
                data: {
                	id: idizin
                },
                success: function(txt){
                    //no action on success, its done in the next part
                }
            }).done(function(data){
                //get JSON
                data = $.parseJSON(data);
                //generate <options from JSON
                var list_html = '<option value="">===Silahkan Pilih Jenis Permohonan===</option>';
                if (data.length>0) {
                	$.each(data, function(i, item) {
                    	list_html += '<option value='+data[i].id+'>'+data[i].nama+'</option>';
                	});
                	$('#jenis_permohonan').html(list_html);
                }
                else {
                	$('#jenis_permohonan').html('<option value="">===Silahkan Pilih Jenis Permohonan===</option>');
                }
                
                //replace <select2 with new options
               
                
            });
	}

	function reload() {
		$.ajax({
			url: 'app/settingformulirizin/reload',
			type: 'POST',
			data: {},
			success: function(respon) {
				$("#datalist").html(respon);
			}
		});
		
	}

</script>
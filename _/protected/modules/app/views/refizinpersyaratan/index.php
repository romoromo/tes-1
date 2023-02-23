<?php define('ASSETS_URL', 'themes/smartadmin');
; ?>
<div class="well well-sm well-light">	

	<button onclick="tambah()" type="button" class="btn btn-labeled btn-primary">
		<span class="btn-label">
			<i class="fa fa-plus "></i>
		</span>Tambah Persyaratan Izin
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
					<h2>Persyaratan Izin</h2>

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
							  	  <th width="6%"><div align="center">No</div></th>
								  <th data-hide="phone"></th>
								  <th data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>  Jenis Izin</th>
								  <th><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Jenis Izin Permohonan </th>
								  <th data-hide="phone,tablet"><i class=" txt-color-blue hidden-md hidden-sm hidden-xs"></i>Status Aktif</th>
							  </tr>
						  </thead>
						  <tbody>
						  <?php $no=1; foreach ($izinpersyaratan as $izinpersyaratan): ?>
							  <tr>
							  	  <td><?php echo $no++; ?></td>
							      <td><a onclick="ambilsyarat(<?php echo $izinpersyaratan['tblizinpermohonan_id']; ?>,<?php echo $izinpersyaratan['tblizin_id']; ?>)" class="btn btn-link">Syarat (<?php echo  $izinpersyaratan['jmlh'];?>)</a></td>
								  <td><?php echo $izinpersyaratan['tblizin_nama']; ?></td>
							      <td><?php echo $izinpersyaratan['tblizinpermohonan_nama']; ?></td>
							      <td><?php echo $izinpersyaratan['tblizinpersyaratan_isaktif']=='T' ? 'Ya' : 'Tidak'; ?></td>
							      <!-- <td> -->
							      <!-- <button onclick="edit(<?php echo $izinpersyaratan['tblizinpersyaratan_id']; ?>)" type="button" class="btn btn-labeled btn-success btn-sm" style="width:65px; height:30px;">
								    		
								    			<i class="fa fa-edit"></i>
								    		Edit
								  </button>
 -->
								  <!-- <button  onclick="hapus(<?php echo $izinpersyaratan['tblizinpersyaratan_id']; ?>)" type='button' class='btn btn-labeled btn-danger btn-sm' style="width:65px; height:30px;">
								    		
								    			<i class="fa fa-trash-o"></i>
								    		Hapus
								  </button> --><!-- </td> -->
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
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-check"></i>&nbsp;Form Persyaratan Izin</h4>
			</div>
			<form action="" id="order-form" class="smart-form" novalidate>


				<fieldset>

					<div class="row">
						<section class="col col-3">
							<p> Jenis Izin</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="select">
								<select class="input-sm" id="nama_izin" name="nama_izin">
								<option value="0">===Silahkan Pilih Jenis Izin===</option>
										<?php
											foreach ($comboIzin as $izin)  {
											echo '<option value="'.$izin['tblizin_id'].'">'.$izin['tblizin_nama'].'</option>';
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
							<p> Jenis Izin Permohon</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-6">
							<label class="select">
								<select class="form-control" id="nama_permohonan" name="nama_permohonan">
									<option value="0">===Silahkan Pilih Jenis Permohonan===</option>
								</select><i></i>
						</label>
						</section>
					</div>
					<hr>
					<br />

					<section>
						<label for="jenis_persyaratan" class="input">Jenis Persyaratan</label>
							<select multiple id="jenis_persyaratan" name="jenis_persyaratan" style="width:100%" class="select2">
									<?php
										foreach ($comboPersyaratan as $syarat)  {
											echo '<option value="'.$syarat['tblpersyaratan_id'].'">'.$syarat['tblpersyaratan_nama'].'</option>';
											}
									?>
							</select> <i></i> 
					</section>								
				
					
				
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
					<i class="fa fa-ban"></i>	Batal
				</button>
				<button onclick="simpan()" type="button" class="btn btn-sm btn-primary" id="eg7">
					<i class="fa fa-floppy-o"></i>&nbsp;Simpan</button>
			</div>
				</fieldset>							
			</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<div class="modal fade" id="modalSyarat" tabindex="-1" role="dialog" aria-labelledby="modalsyaratCoeg" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<i class="fa fa-fw fa-2x fa-edit"></i> Edit Syarat
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form id="formsyarat" class="smart-form" novalidate="">

							<fieldset>
								<section>
									<label  class="input">Jenis Persyaratan</label>
									<select multiple id="persyaratan" name="persyaratan" style="width:100%" class="select2">
												<?php
													foreach ($comboPersyaratan as $syarat)  {
													echo '<option value="'.$syarat['tblpersyaratan_id'].'">'.$syarat['tblpersyaratan_nama'].'</option>';
													}
												?>
									</select> <i></i> 
									</section>								
							
							<footer>
								<button type="submit"onclick="return simpansyarat()" class="btn btn-primary">
									<i class="fa fa-save"></i> Simpan
								</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">
									<i class="fa fa-times"></i> Batal
								</button>

							</footer>
							</fieldset>
						</form>						
						

			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- INI MODAL EDIT TUJUAN-->

<!-- INI MODAL EDIT TUJUAN-->
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


		function simpan () {
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


function simpan() {
	var cekmohon = $('#nama_permohonan').val()==0 && $('#nama_permohonan').val()==null;
	if($('#jenis_persyaratan').select2("val").length==0 || cekmohon) {
		$.SmartMessageBox({
			title : "Validasi",
			content : "Data belum lengkap, mohon cek kembali",
			buttons : '[Ya]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {

				return false;
			}
		});
		return false;
	}

	$.ajax({
		url: 'app/refizinpersyaratan/simpan',
		type: 'POST',
		data: {
			cmd: window.cmd,
			id: window.id,
			nama_izin: $('#nama_izin').val(),
			nama_permohonan: $('#nama_permohonan').val(),
			nama_isaktif: $('#nama_isaktif').val(),
			jenis_persyaratan: $('#jenis_persyaratan').select2("val").toString(),
		}
		,success: function  (respon) {
				if (respon!='failed'){

					$("#modalform").modal("hide");
					notifikasi("Sukses","Data berhasil disimpan","success");
				}
				else
					notifikasi("Gagal","Data gagal disimpan","failed");
			}
		});
		return false;

	};

function tambah() {
	window.cmd = "tambah";
	$("#modalform").modal("show");
	$("#nama_izin").val('');
	$("#nama_permohonan").val('');
	$("#nama_isaktif").val('');
	$("#jenis_persyaratan").select2("val",[])
}


function edit(id) {
	window.id = id;
	window.cmd = "edit";
	$.ajax({
		url: 'app/refizinpersyaratan/GetDataIzinPersyaratan',
		type: 'POST',
		data: {id: id},
		success : function (respon) {
			$("#nama_izin").val(respon.split('||')[1]);
			$("#nama_permohonan").val(respon.split('||')[3]);
			$("#nama_isaktif").val(respon.split('||')[5]);

		}
	});

	$("#modalform").modal("show");
	

}


function editdata() {
	window.cmd = "edit";
	$("#modalform").modal("show");
	$("#nama_izin").val('');
	$("#nama_permohonan").val('');
	$("#nama_isaktif").val('');
}


function hapus(id) {
	window.id = id;
	window.cmd = "hapus";
	$.SmartMessageBox({
		title : "Konfirmasi",
		content : "Apakah anda yakin akan menghapus Izin Persyaratan ini?",
		buttons : '[Tidak][Ya]'
	}, function(ButtonPressed) {
		if (ButtonPressed === "Ya") {
			$.ajax({
				url: 'app/refizinpersyaratan/HapusDataIzinPersyaratan',
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

$('#nama_izin').change(function() {
    	//saat kecamatan diganti
        var selectedCategory = $('#nama_izin option:selected').val();
        getJenisPermohonan(selectedCategory);
});

function ambiljenispermohonan () {       
		   setTimeout(function () {    
		      $("#nama_permohonan").val(window.datalist.split('||')[2]);       
		             
		   }, 500)
}

function getJenisPermohonan(idizin) {
		$.ajax({
                type: 'POST',
                url: 'app/refizinpersyaratan/GetJenisPermohonan',
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
                var list_html = '<option value="0">===Silahkan Pilih Jenis Permohonan===</option>';
                if (data.length>0) {
                	$.each(data, function(i, item) {
                    	list_html += '<option value='+data[i].id+'>'+data[i].nama+'</option>';
                	});
                	$('#nama_permohonan').html(list_html);
                }
                else {
                	$('#nama_permohonan').html('<option value="0">===Silahkan Pilih Jenis Permohonan===</option>');
                }
                
                //replace <select2 with new options
               
                
            });
	}

	function simpansyarat () {
		
		if($('#persyaratan').select2("val").length==0) {
			$.SmartMessageBox({
				title : "Validasi",
				content : "Data syarat kosong, mohon isikan syarat",
				buttons : '[Ya]'
			}, function(ButtonPressed) {
				if (ButtonPressed === "Ya") {

					return false;
				}
			});
			return false;
		}
		$.ajax({
			url: 'app/refizinpersyaratan/SimpanPersyaratan',
			type: 'POST',
			data: {
			cmd: window.cmd,
			idizin: window.idizin,
			id: window.idmohon,
			persyaratan: $('#persyaratan').select2("val").toString()
		}
		,success: function  (respon) {
				if (respon!='failed'){

					$("#modalSyarat").modal("hide");
					notifikasi("Sukses","Data berhasil disimpan","success");
				}
				else
					notifikasi("Gagal","Data gagal disimpan","failed");
				}
		});
		return false;

	};

function ambilsyarat (tblizinpermohonan_id,idizin) {
	window.tblizinpermohonan_id = tblizinpermohonan_id;
		$.ajax({
		url: 'app/refizinpersyaratan/GetPersyaratan',
		type: 'POST',
		data: {tblizinpermohonan_id: tblizinpermohonan_id},
		success : function (respon) {
			$("#persyaratan").select2("val",respon.split(','));
			window.idmohon = tblizinpermohonan_id;
			window.idizin = idizin;

		}
		});
	$("#modalSyarat").modal("show");
		
}

</script>


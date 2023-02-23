<?php define('ASSETS_URL', 'themes/smartadmin');
; ?>
<div class="well well-sm well-light">
	<h1 class="text-center font-lg"><i class="fa fa-shield"></i> Block Nomor HP</h1>
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-magenta" id="wid-id-cari" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-sortable="false" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-sortable="false" data-widget-editbutton="false">
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
					<span class="widget-icon"> <i class="fa fa-search"></i> </span>
					<h2>Pencarian</h2>

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
					<form action="" id="login-form" class="smart-form" novalidate="novalidate">

						<fieldset>							

							<section>
								<div class="row">
									<label class="label col col-2">Pencarian</label>
									<div class="col col-3">
										<label class="input">
											<input type="text" id="carinohp">
										</label>
									</div>
								</div>
							</section>							

							
							
						</fieldset>

						<footer>							
							<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">
								<i class="fa fa-search"></i>&nbsp;Cari
							</button>
						</footer>

					</form>					
				</div>

				</div>

			</div>

		</article>

	</div>




	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-white" id="wid-id-0" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-sortable="false" data-widget-editbutton="false">
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
					<h2>Kontrol Data  </h2>

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
				  <div class="widget-body-toolbar">
				  	<a href="#modalsms" data-toggle="modal" class="btn btn-info"><i class="fa fa-plus-square"></i> Tambah
				  	</a>
				  </div>

					  <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
						  <thead>			                
							  <tr>
								 <th width="5%" data-hide="phone">No</th>
								 <!-- <th width="9%" data-hide="phone"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Lama Proses</th> -->
								  <th width="24%">Nomor HP </th>
								  <!-- <th width="5%" data-hide="phone,tablet"><i class=" txt-color-blue hidden-md hidden-sm hidden-xs"></i>Icon</th> -->
								  <th width="16%">&nbsp;</th>
							  </tr>
						  </thead>
						  <tbody>
							  <tr>
                                					<td>1</td>
							    <td>089227189761</td>
							    <td><a href="#modalsms" data-toggle="modal" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>&nbsp;
							      Edit </a>
					                                    <button  onclick="hapus()" type='button' class='btn btn-danger btn-sm' > <i class="fa fa-trash-o"></i>&nbsp;
					                                      Hapus </button></td>
							    </tr>
							  <tr>
                                					<td>2</td>
							    <td>089696969696</td>
							    <td><a href="#modalsms" data-toggle="modal" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>&nbsp;
							      Edit </a>
					                                    <button  onclick="hapus()" type='button' class='btn btn-danger btn-sm' > <i class="fa fa-trash-o"></i>&nbsp;
					                                      Hapus </button></td>
							    </tr>
							   
						  	<tr>
								  <td>3</td>
								  <td>089215169718</td>								 
								  <td>								    	
								    	  <a href="#modalsms" data-toggle="modal" class="btn btn-success btn-sm">									    		
								    			  <i class="fa fa-edit"></i>&nbsp;
								    		  Edit									    	</a>

								    	  <button  onclick="hapus()" type='button' class='btn btn-danger btn-sm' >									    		
								    			  <i class="fa fa-trash-o"></i>&nbsp;
								    		  Hapus									    	</button>									</td>
						    </tr>
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

<!-- INI MODAL TUJUAN-->
<div class="modal fade" id="modalsms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-fw fa-2x fa-file-text-o"></i>&nbsp;Form Block No HP</h4>
			</div>
			<form action="" id="form_izin" class="smart-form" novalidate>
							

				<fieldset>

					
					<section>
						<div class="row">
							<label class="label col col-2">Nomor HP</label>
							<div class="col col-4">
								<label class="input">
									<input type="text" id="nohp">
								</label>
							</div>
						</div>
					</section>
					
								
						
			</fieldset>			
			</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
					<i class="fa fa-ban"></i>	Batal
				</button>
				<button class="btn btn-sm btn-primary">
					<i class="fa fa-floppy-o"></i>&nbsp;Simpan</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- INI AKHIR DARI MODAL sms TUJUAN-->


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

	/*function simpan () {
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
}

function editdata() {
	window.cmd = "edit";
	$("#modalform").modal("show");
	$("#nama_izin").val('');
	$("#retribusi_izin").val('');
	$("#ceklap_izin").val('');
	$("#isaktif_izin").val('');
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
			$("#tambah_role").val(respon.split('||')[7]);
			$("#isaktif_izin").val(respon.split('||')[8]);
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
	
}*/

</script>
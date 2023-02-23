<?php define('ASSETS_URL', 'themes/smartadmin');
; ?>
<div class="well well-sm well-light">
	<h1 class="text-center font-lg"><i class="fa fa-gears"></i> Setting SMS Otomatis</h1>
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blue" id="wid-id-cari" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-sortable="false" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-sortable="false" data-widget-editbutton="false">
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
									<label class="label col col-2">Klasifkasi SMS</label>
									<div class="col col-3">
										<label class="select"> 											
											<select id="klasifikasisms">
												<option selected="" disabled="">--- Pilih Klasifikasi SMS ---</option>
												<option>SARAN</option>
												<option>ADUAN</option>
												<option>INFO</option>
											</select>
										</label>
									</div>
								</div>
							</section>

							<section>
								<div class="row">
									<label class="label col col-2">Group Phonebook</label>
									<div class="col col-3">
										<label class="select"> 											
											<select id="groupphonebook">
												<option selected="" disabled="">--- Pilih Group Phonebook ---</option>
												<option>Semua Daftar di Phonebook</option>
												<option>GROUP STAFF</option>
												<option>GROUP OPERATOR</option>
											</select>
										</label>
									</div>
								</div>
							</section>

							<section>
								<div class="row">
									<label class="label col col-2">Tanggal</label>
									<div class="col col-2">
										<label class="select"> 											
											<select id="tanggal">
												<option selected="" disabled="">--- Silahkan Pilih ---</option>
												<option value="all">Setiap Hari</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
												<option value="13">13</option>
												<option value="14">14</option>
												<option value="15">15</option>
												<option value="16">16</option>
												<option value="17">17</option>
												<option value="18">18</option>
												<option value="19">19</option>
												<option value="20">20</option>
												<option value="21">21</option>
												<option value="22">22</option>
												<option value="23">23</option>
												<option value="24">24</option>
												<option value="25">25</option>
												<option value="26">26</option>
												<option value="27">27</option>
												<option value="28">28</option>
												<option value="29">29</option>
												<option value="30">30</option>
												<option value="31">31</option>
											</select>
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
			<div class="jarviswidget jarviswidget-color-green" id="wid-id-0" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-sortable="false" data-widget-editbutton="false">
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
								 <th width="25%" data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i> Klasifikasi SMS </th>
								  <!-- <th width="9%" data-hide="phone"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Lama Proses</th> -->
								  <th width="24%">Group Phonebook </th>
								  <!-- <th width="5%" data-hide="phone,tablet"><i class=" txt-color-blue hidden-md hidden-sm hidden-xs"></i>Icon</th> -->
								  <th width="11%" data-hide="phone,tablet">Tanggal</th>
								  <th width="11%" data-hide="phone,tablet">Jam</th>
								  <th width="8%" data-hide="phone,tablet"><i class=" txt-color-blue hidden-md hidden-sm hidden-xs"></i>Status</th>
								    <th width="16%">&nbsp;</th>
							  </tr>
						  </thead>
						  <tbody>
							  <tr>
                                					<td>1</td>
							    <td>INFO RETRIBUSI </td>
							    <td>23</td>
							    <td>6</td>
							    <td>06:15:00</td>
							    <td>Aktif</td>
							    <td><a href="#modalsms" data-toggle="modal" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>&nbsp;
							      Edit </a>
					                                    <button  onclick="hapus()" type='button' class='btn btn-danger btn-sm' > <i class="fa fa-trash-o"></i>&nbsp;
					                                      Hapus </button></td>
							    </tr>
							  <tr>
                                					<td>2</td>
							    <td>STATUS</td>
							    <td>24</td>
							    <td>9</td>
							    <td>07:45:00</td>
							    <td>Aktif</td>
							    <td><a href="#modalsms" data-toggle="modal" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>&nbsp;
							      Edit </a>
					                                    <button  onclick="hapus()" type='button' class='btn btn-danger btn-sm' > <i class="fa fa-trash-o"></i>&nbsp;
					                                      Hapus </button></td>
							    </tr>
							   
						  	<tr>
								  <td>3</td>
								  <td>PEMBERITAHUAN</td>								 
								  <td>1</td>								 
								  <td>12</td>
								  <td>18:00:00</td>
								  <td>Aktif</td>
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
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-fw fa-2x fa-file-text-o"></i>&nbsp;Form Setting SMS Otomatis</h4>
			</div>
			<form action="" id="form_izin" class="smart-form" novalidate>
							

				<fieldset>
					<section>
						<div class="row">
							<label class="label col col-3">Klasifkasi SMS</label>
							<div class="col col-5">
								<label class="select"> 											
									<select id="klasifikasisms">
										<option selected="" disabled="">--- Pilih Klasifikasi SMS ---</option>
										<option>SARAN</option>
										<option>ADUAN</option>
										<option>INFO</option>
									</select>
								</label>
							</div>
						</div>
					</section>

					<section>
						<div class="row">
							<label class="label col col-3">Group Phonebook</label>
							<div class="col col-6">
								<label class="select"> 											
									<select id="groupphonebook">
										<option selected="" disabled="">--- Pilih Group Phonebook ---</option>
										<option>Semua Daftar di Phonebook</option>
										<option>GROUP STAFF</option>
										<option>GROUP OPERATOR</option>
									</select>
								</label>
							</div>
						</div>
					</section>

					<section>
						<div class="row">
							<label class="label col col-3">Tanggal</label>
							<div class="col col-5">
								<label class="select"> 											
									<select id="tanggal">
										<option selected="" disabled="">--- Silahkan Pilih ---</option>
										<option value="all">Setiap Hari</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
										<option value="21">21</option>
										<option value="22">22</option>
										<option value="23">23</option>
										<option value="24">24</option>
										<option value="25">25</option>
										<option value="26">26</option>
										<option value="27">27</option>
										<option value="28">28</option>
										<option value="29">29</option>
										<option value="30">30</option>
										<option value="31">31</option>
									</select>
								</label>
							</div>
						</div>
					</section>

					<section>
						<div class="row">
							<label class="label col col-3">Jam</label>
							<div class="col col-3">
								<label class="input"> 											
									<input type="text" id="jam">
								</label>
							</div>
							<label class="label col col-2"><i>format hh:mm (contoh: 14:50)</i></label>
						</div>
					</section>
					
					<section>
						<div class="row">
							<label class="label col col-3">Pesan</label>
							<div class="col col-6">
								<label class="textarea textarea-resizable"> 										
									<textarea rows="3" class="custom-scroll"></textarea> 
								</label>
							</div>							
						</div>
					</section>

					<section>
						<div class="row">
							<label class="label col col-3">Status</label>
							<div class="inline-group col col-5">
								<label class="radio">
									<input type="radio" name="radio-inline">
									<i></i>Aktif</label>
								<label class="radio">
									<input type="radio" name="radio-inline">
									<i></i>Tidak Aktif</label>								
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
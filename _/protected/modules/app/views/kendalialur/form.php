<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="well well-sm well-light">
		<h1 align="center" class="page-title txt-color-blueDark"><i class="fa fa-list"></i> 
		Setting Kendali Alur</h1>
        </div>
	</div>
</div>


<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="well">
		<div class="jarviswidget jarviswidget-color-teal" id="wid-id-5" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false">
			<header>
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>Setting Kendali Alur</h2>

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
						<button class="btn btn-primary" onclick="tambah()">
							<i class="fa fa-plus-square"></i>	Tambah Kendali Alur
						</button>							
					</div>					

					<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
						<thead>
							<tr>
								<th data-hide="phone">No</th>
								<th data-class="expand">Jenis Izin</th>
								<th data-hide="phone">Jenis Permohonan</th>									
								<th data-hide="phone">Blok Sistem</th>									
								<th data-hide="phone">Urut</th>									
								<th data-hide="phone,tablet,tanktop">Jml hari batas waktu</th>		
								<th data-hide="phone,tablet,tanktop">Jml hari batas waktu</th>	
								<th data-hide="phone,tablet,tanktop">Status Aktif</th>									
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; $status=""; foreach ($data['alur'] as $list): 
							if ($list['tblkendalialur_isaktif']=='T') {
								$status = "Aktif";
							}
							else {
								$status = "Tidak Aktif";
							}
							?>
							<tr>

								<td><?php echo $no++; ?></td>
								<td><?php echo $list['tblizin_nama']; ?></td>
								<td><?php echo $list['tblizinpermohonan_nama']; ?></td>
								<td><?php echo $list['tblkendalibloksistem_nama']; ?></td>
								<td><?php echo $list['tblkendalialur_urut']; ?></td>
								<td><?php echo $list['tblkendalialur_jmlharibataswaktu']; ?> hari</td>
								<td><?php echo $list['tblkendalialur_jmljambataswaktu']; ?> jam</td>
								<td><?php echo $status; ?></td>

								<td>
									<a class="btn btn-default btn-sm" rel="popover" data-placement="left" data-content="
									<div class='row'>
										<div class='col-md-12'>
											<div class='well'>
												<button onclick='edit(<?php echo $list["tblkendalialur_id"]; ?>)' class='btn btn-labeled btn-success btn-sm'><span class='btn-label'>
													<i class='fa fa-pencil'></i></span>Edit</button>
													<button onclick='hapus(<?php echo $list["tblkendalialur_id"]; ?>)' class='btn btn-labeled btn-danger btn-sm'><span class='btn-label'>
														<i class='fa fa-trash-o'></i></span>Hapus</button>                                                            
													</div>
												</div>
											</div>"
											data-html="true"><i class="fa fa-gear"></i></a>
										</td>

									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->
			</div>
		</div>
	</div>
</div>
<!-- Modal -->

<div class="modal fade" id="form-kendali" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:850px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Kendali Alur<div id="tbljadwalsurvey_id"></div>
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form class="smart-form" id="form-alur">

					<fieldset>

						<section>
							<div class="row">
								<label class="label col col-4">Jenis Izin</label>
								<div class="col col-12">
									<label class="select"> <i class="icon-append fa fa-user"></i>
										<select name="jenis_izin" id="jenis_izin">
											<option value="0">=== Pilih Jenis Izin ====</option>
											<?php foreach ($data['jenis_izin'] as $jenis_izin): ?>
												<option value="<?php echo $jenis_izin['tblizin_id'] ?>"><?php echo $jenis_izin['tblizin_nama'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Jenis Permohonan</label>
								<div class="col col-12">
									<label class="select"> <i class="icon-append fa fa-user"></i>
										<select name="jenis_permohonan" id="jenis_permohonan">
											<option value="0">=== Pilih Jenis Permohonan ===</option>
										</select>
									</label>

								</div>
							</div>
						</section>

						<!-- -->
						<section>
							<div class="row">
								<label class="label col col-1">Urutan</label>

								<label class="label col col-4">Bloksistem</label>
								<label class="label col col-2">Batas Hari</label>
								<label class="label col col-2">Batas Jam</label>
								<label class="label col col-2">Aktifkan?</label>

							</div>

							<div class="row">

								<div class="col col-1">
									<label class="input"> 
										<input value="" type="text" name="urut" id="urut">
									</label>
								</div>

								<div class="col col-4">
									<label class="select"> <i class="icon-append fa fa-user"></i>
										<select name="bloksistem" id="bloksistem">
											<option value="0">=== Pilih Blok Sistem ===</option>
											<?php foreach ($data['bloksistem'] as $bloksistem): ?>
												<option value="<?php echo $bloksistem['tblkendalibloksistem_id'] ?>"><?php echo $bloksistem['tblkendalibloksistem_nama'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
								</div>
								<div class="col col-2">
									<label class="select">
										<select name="status" id="hari" name="hari">
											<option value="">= Pilih Batas =</option>
											<?php for ($i=0; $i <= 10; $i++) { 
												echo '<option value="'.$i.'">'.$i.' hari</option>';
											} ?>
										</select>
									</label>
								</div>
								<div class="col col-2">
									<label class="select">
										<select name="status" id="waktu" name="waktu">
											<option value="">= Pilih Batas =</option>
											<?php for ($i=0; $i <= 24; $i++) { 
												echo '<option value="'.$i.'">'.$i.' jam</option>';
											} ?>
										</select>
									</label>
								</div>
								<div class="col col-3">
									<label class="select">
										<select name="status" id="status">
											<option value="0">=== Pilih Status ===</option>
											<option value="T">Aktif</option>
											<option value="F">Tidak Aktif</option>
										</select>
									</label>
								</div>
							</div>
						</section>
						<!-- // -->

						<section>
							<div class="row">
								<button onclick="TambahALur()" class="btn btn-warning btn-block btn-sm">Tambah Alur</button>
							</div>
						</section>

					
					</fieldset>

					<table class="table">
						<thead>
							<tr>
								<td>Urutan</td>
								<td>Bloksistem</td>
								<td>Batas Hari</td>
								<td>Batas Jam</td>
								<td></td>
							</tr>
						</thead>
						<tbody id="list-kendali">
							<tr>
								<td>1</td>
								<td>FO</td>
								<td>1 hari</td>
								<td>2 jam</td>
								<td>
									<button type="button" class="btn btn-labeled btn-danger btn-sm">
										<span class='btn-label'><i class='fa fa-trash-o'></i></span>Hapus
									</button>
								</td>
							</tr>
						</tbody>
					</table>

					<input type="hidden" name="cmd" id="cmd" value="">
					<input type="hidden" name="id" id="id" value="">

					<footer>
						<button type="submit" class="btn btn-primary">
							Simpan
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>

					</footer>
									
					

			</div></form>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">
// DO NOT REMOVE : GLOBAL FUNCTIONS!
pageSetUp();

// PAGE RELATED SCRIPTS

// menu
$("#menu").menu();

loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		var $orderForm = $("#form-alur").validate({
				// Rules for form validation
				rules : {
					jenis_izin : {
						required : true
					},
					jenis_permohonan : {
						required : true
					},
					bloksistem : {
						required : true
					},
					urut : {
						required : true,
						digits : true
					},
					hari : {
						required : true,
						digits : true
					},
					waktu : {
						required : true,
						digits : true
					},
					status : {
						required : true
					}
				},

				// Messages for form validation
				messages : {
					jenis_izin : {
						required : 'Mohon isikan Jenis Izin'
					},
					jenis_permohonan : {
						required : 'Mohon isikan Jenis Permohonan'
					},
					bloksistem : {
						required : 'Mohon isikan Blok Sistem'
					},
					urut : {
						required : 'Mohon isikan Urutan',
						digits : 'Mohon isikan hanya dengan angka'
					},
					hari : {
						required : 'Mohon isikan Jumlah Batasan (hari)'
						// ,digits : 'Mohon isikan hanya dengan angka'
					},
					waktu : {
						required : 'Mohon isikan Jumlah Batasan (jam)'
						// ,digits : 'Mohon isikan hanya dengan angka'
					},
					status : {
						required : 'Mohon isikan Status Aktif'
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

$('#jenis_izin').change(function() {
    	//saat kecamatan diganti
        var selectedCategory = $('#jenis_izin option:selected').val();
        getJenisPermohonan(selectedCategory);
});

function getJenisPermohonan(idizin) {
		$.ajax({
                type: 'POST',
                url: 'pendaftaran/izinpendaftaran/GetJenisPermohonan',
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
                var list_html = '<option value="0">=== Pilih Jenis Permohonan ===</option>';
                if (data.length>0) {
                	$.each(data, function(i, item) {
                    	list_html += '<option value='+data[i].id+'>'+data[i].nama+'</option>';
                	});
                	$('#jenis_permohonan').html(list_html);
                }
                else {
                	$('#jenis_permohonan').html('<option value="0">=== Pilih Jenis Permohonan ===</option>');
                }
                
                //replace <select2 with new options
               
                
            });
}

function tambah () {
	$("#cmd").val("tambah");
	$("#jenis_izin").val(0);
	$("#jenis_permohonan").val(0);
	$("#bloksistem").val(0);
	$("#urut").val("");
	$("#hari").val("");
	$("#waktu").val("");
	$("#status").val(0);

	$("#form-kendali").modal("show");
}

function edit (id) {
	$("#cmd").val("edit");
	$.ajax({
		url: 'app/kendalialur/edit',
		type: 'post',
		data: {
			id: id,
		},
		success:function(data) {
			window.datalist = data;
			$("#id").val(data.split("||")[0]);
 			$("#jenis_izin").val(data.split("||")[1]);
 			getJenisPermohonan(data.split("||")[1]);
			ambiljenispermohonan();
			$("#bloksistem").val(data.split("||")[3]);
			$("#urut").val(data.split("||")[4]);
			$("#hari").val(data.split("||")[5]);
			$("#waktu").val(data.split("||")[6]);
			$("#status").val(data.split("||")[7]);
		}
	});
					
	$("#form-kendali").modal("show");
}

function ambiljenispermohonan () {
   setTimeout(function () {    
      $("#jenis_permohonan").val(window.datalist.split('||')[2]);       
             
   }, 200)
}

function TambahAlur() {
	$.ajax({
			url: 'app/kendalialur/TambahAlur',
			type: 'post',
			data: {
				cmd: $("#cmd").val(),
				jenis_izin : $("#jenis_izin").val(),
				jenis_permohonan : $("#jenis_permohonan").val(),
				bloksistem : $("#bloksistem").val(),
				urut : $("#urut").val(),
				hari : $("#hari").val(),
				waktu : $("#waktu").val(),
				status : $("#status").val()
			},

			success: function(data) {
				if (data=="success") {
					$("#form-kendali").modal("hide");
					notifikasi('Sukses','Data Berhasil Disimpan', 'success');
				}
				else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail');
				}
			}
		}); 
}

function getTabelALur() {
	window.id_mohon = $('#jenis_permohonan').val();
	$.ajax({
		url: 'app/kendalialur/GetListTabelAlur',
		type: 'POST',
		data: {jenis_permohonan: window.id_mohon},
		success : function (respon) {
			$("#list-kendali").html(respon);
		}
	});
}

function simpan () {
	if ($("#cmd").val()=="edit") {

		$.ajax({
			url: 'app/kendalialur/simpan',
			type: 'post',
			data: {
				cmd: $("#cmd").val(),
				id: $("#id").val(),
				jenis_izin : $("#jenis_izin").val(),
				jenis_permohonan : $("#jenis_permohonan").val(),
				bloksistem : $("#bloksistem").val(),
				urut : $("#urut").val(),
				hari : $("#hari").val(),
				waktu : $("#waktu").val(),
				status : $("#status").val()
			},
			success: function(data) {
				if (data=="success") {
					$("#form-kendali").modal("hide");
					notifikasi('Sukses','Data Berhasil Disimpan', 'success');
				}
				else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail');
				}
			}
		}); 
	}

	else { //selain adalah fungsi tambah

		$.ajax({
			url: 'app/kendalialur/simpan',
			type: 'post',
			data: {
				cmd: $("#cmd").val(),
				jenis_izin : $("#jenis_izin").val(),
				jenis_permohonan : $("#jenis_permohonan").val(),
				bloksistem : $("#bloksistem").val(),
				urut : $("#urut").val(),
				hari : $("#hari").val(),
				waktu : $("#waktu").val(),
				status : $("#status").val()
			},

			success: function(data) {
				if (data=="success") {
					$("#form-kendali").modal("hide");
					notifikasi('Sukses','Data Berhasil Disimpan', 'success');
				}
				else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail');
				}
			}
		}); 
	}

	return false;
}

function hapus (id) {
	$.SmartMessageBox({
				title : "Konfirmasi Hapus", // judul Smart Alert
				content : "Apakah anda yakin akan menghapus data kendali alur ini ?", // konten dari smart alert
				buttons : '[Tidak][Ya]' // pengaturan tombol
			}, function(ButtonPressed) {
				if (ButtonPressed === "Ya") {
					$.ajax({
						url: 'app/kendalialur/hapus',
						type: 'post',
						data: {
							id: id,
						},
						success: function (data) {
							
							if(data=='success') {
									notifikasi('Sukses','Data Berhasil Disimpan', 'success');
									//window.location.reload();
								} else {
									notifikasi('Gagal','Data Gagal Disimpan', 'fail');
								}
						}
					});

				}
				if (ButtonPressed === "Tidak") {
					
				}

			});
			e.preventDefault();
}

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
				desktop:1280,
				tablet : 1024,
				tanktop : 840,
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
	
</script>
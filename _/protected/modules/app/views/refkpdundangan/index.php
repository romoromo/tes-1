<?php define('ASSETS_URL', 'themes/smartadmin'); ?>
<div class="well well-sm well-light">	

	<button onClick="tambah()" type="button" class="btn btn-labeled btn-primary">
		<span class="btn-label">
			<i class="fa fa-plus "></i>
		</span>Tambah Kepada Undangan
	</button>
</div>


<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" 			
			data-widget-editbutton="false"			
			data-widget-deletebutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-custombutton="false"				
			data-widget-sortable="false"
			>

			<header>
				<span class="widget-icon"> <i class="fa fa-user"></i> </span>
				<h2>Data Referensi Kepada Undangan</h2>

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
					<div id="list_data">
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
							<thead>
								<tr>				                        
									<th data-hide="phone"></th>				                          
									<th data-class="expand"><div align="center">Urutan</div></th>
									<th data-hide="phone"><div align="center">Nama</div></th>
									<th data-hide="phone"><div align="center">Status</div></th>
									<th>Edit</th>
									<th>Hapus</th>
								</tr>
							</thead>
							<tbody>                      
								<?php $no=1; foreach ($datalist as $list): ?>
								<?php if ($list['refkepadaundangan_isaktif']=="T") {
									$label = '<label class="label label-success">Aktif</label>';
								} 
								else {
									$label = '<label class="label label-danger">Tidak Aktif</label>';
								}
								?>
								<tr>				                          
									<td><?php echo $no++; ?></td>
									<td><?php echo $list['refkepadaundangan_urutan']; ?></td>
									<td><?php echo $list['refkepadaundangan_nama']; ?></td>                          
									<td><?php echo $label; ?></td>
									<td>
										<button onClick="edit(<?php echo $list['refkepadaundangan_id']; ?>)" type="button" class="btn btn-circle btn-success btn-sm">
											<i class="fa fa-edit"></i>
										</button>
									</td>
									<td>									
										<button  onclick="hapus(<?php echo $list['refkepadaundangan_id']; ?>)" type='button' class='btn btn-circle btn-danger btn-sm'>
											<i class="fa fa-trash-o"></i>
										</button></td>
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

<!-- <a href="#modalform" data-toggle="modal">check coy</a> -->

<!-- INI MODAL TAMBAH MISI-->
<div class="modal fade" id="modalform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i>&nbsp;Form Kepada Undangan</h4>
			</div>
			<form action="" id="form_input" class="smart-form" novalidate>
				<fieldset>
					<section>
						<div class="row">
							<label class="label col col-3">Urutan</label>
							<div class="col col-9">
								<label class="input"> <i class="icon-append fa fa-list"></i>
									<input type="text" id="urutan" name="urutan" placeholder="Urutan kepada undangan">
								</label>
							</div>
						</div>
					</section>
					<section>
						<div class="row">
							<label class="label col col-3">Nama</label>
							<div class="col col-9">
								<label class="textarea"> <i class="icon-append fa fa-user"></i>
									<textarea name="nama" id="nama" placeholder="Nama Undangan"></textarea>
								</label>
							</div>
						</div>
					</section>
					<section>
						<div class="row">
							<label class="label col col-3">Status</label>
							<div class="col col-4">
								<label class="select"> <i class="icon-append fa fa-list"></i>
									<select id="status">
										<option value="T">Aktif</option>
										<option value="F">Tidak Aktif</option>
									</select>
								</label>
							</div>
						</div>
					</section>		
				</fieldset>							
			</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
					<i class="fa fa-ban"></i>&nbsp;Batal
				</button>
				<button class="btn btn-sm btn-primary" onclick="simpan()">
					<i class="fa fa-floppy-o"></i>&nbsp;Simpan</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<!-- INI AKHIR DARI MODAL EDIT TUJUAN-->

	<script type="text/javascript">

	 pageSetUp();

	 jQuery(document).ready(function($) {
	 	LoadData();
	 });


	 function simpan () {
	 	$.ajax({
	 		url: 'app/refkpdundangan/Simpan',
	 		type: 'POST',
	 		data: {
	 			cmd: window.cmd,
	 			id: window.id,
	 			urutan: $('#urutan').val(),
	 			nama: $('#nama').val(),
	 			status: $('#status').val(),			
	 		},
	 		success: function (respon) {
	 			if (respon=='success'){
	 				$("#modalform").modal("hide");
	 				notifikasi("Sukses","Data berhasil disimpan","success",1,0);
	 				LoadData();
	 			}
	 			else
	 				notifikasi("Gagal","Data gagal disimpan","failed",1,0);
	 		}
	 	})

	 };

	 function tambah () {
	 	window.cmd="tambah";
	 	$("#modalform").modal("show");
	 	$('#urutan').val('');
	 	$('#nama').val('');
	 	$('#status').val('');
	 }


	 function edit (id) {
	 	window.id = id;
	 	window.cmd = "edit";
	 	$.ajax({
	 		url: 'app/refkpdundangan/Edit',
	 		type: 'POST',
	 		data: {id: id},
	 		success: function (respon) {
	 			$('#urutan').val(respon.refkepadaundangan_urutan);
	 			$('#nama').val(respon.refkepadaundangan_nama);
	 			$('#status').val(respon.refkepadaundangan_isaktif);
	 		}
	 	});
	 	$("#modalform").modal("show");

	 }

	 function hapus(id) {
	 	window.id = id;
	 	window.cmd = "hapus";
	 	$.SmartMessageBox({
	 		title : "Konfirmasi",
	 		content : "Apakah anda yakin akan menghapus data ini ?",
	 		buttons : '[Tidak][Ya]'
	 	}, function(ButtonPressed) {
	 		if (ButtonPressed === "Ya") {
	 			$.ajax({
	 				url: 'app/refkpdundangan/Hapus',
	 				type: 'POST',
	 				data: {id: id},
	 				success: function  (respon) {
	 					if (respon=='success') {
	 						notifikasi("Sukses","Data berhasil dihapus","success",1,0);
	 						LoadData();
	 					}
	 					else
	 						notifikasi("Gagal","Data gagal dihapus","failed",1,0);
	 				}
	 			});

	 		}

	 	});
	 }

	 function LoadData() {
	 	$.ajax({
	 		url: 'app/refkpdundangan/LoadData',
	 		type: 'GET',
	 		data: {},
	 		success: function(respon) {
	 			$("#list_data").html(respon);
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
				"sDom":  "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
				"t"+
				"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"oTableTools": {
					"aButtons": [


					"xls"

					],
					"sSwfPath": "<?php echo ASSETS_URL; ?>/js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
				},
				"autoWidth" : true,

				scrollY:        225,
				//"Height" : 200,
				"bDestroy" : true,
				"bSort": false,
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
					// paksa remove overflow
					$('.dataTables_scrollHead').css({overflow: ''});
				}
			});

			/* END BASIC */


		};

</script>
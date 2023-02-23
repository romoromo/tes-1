<?php define('ASSETS_URL', 'themes/smartadmin');
; ?>
<div class="well well-sm well-light">

	<button onclick="tambah()" type="button" class="btn btn-labeled btn-primary">
		<span class="btn-label">
			<i class="fa fa-plus "></i>
		</span>Tambah Template Surat Pemberitahuan
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
				<h2>Data Template Surat Pemberitahuan</h2>

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
					<div id="list-data">
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
							<thead>
								<tr>
									<th width="6%"><div align="center">No</div></th>
									<th width="45%" data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Jenis Izin </div></th>
									<th width="5%" data-hide="phone,tablet"><i class=" txt-color-blue hidden-md hidden-sm hidden-xs"></i>Ditampilkan ?</th>
									<th width="9%" data-hide="phone"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Nama File Draft</div></th>
									<th width="9%" data-hide="phone"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Nama File </div></th>
									<th width="13%">&nbsp;</th>
								</tr>
							</thead>
							<tbody>

							<?php $no=1; foreach ($datatemplatepemberitahuan as $templatebap): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $templatebap['tblizin_nama']; ?></td>
									<td><?php echo $templatebap['tbltemplatepemberitahuan_isaktif']=='T' ? 'Ya' : 'Tidak'; ?></td>
									<td><a href="file/temp_surat_pemberitahuan/<?php echo $templatebap['tbltemplatepemberitahuan_namafile']; ?>"><?php echo $templatebap['tbltemplatepemberitahuan_namafile']; ?></a></td>
									<td><a href="file/temp_surat_pemberitahuan/<?php echo $templatebap['tbltemplatepemberitahuan_namafilejadi']; ?>"><?php echo $templatebap['tbltemplatepemberitahuan_namafilejadi']; ?></a></td>
									<td>
											<button onclick="edit(<?php echo $templatebap['tbltemplatepemberitahuan_id']; ?>)" type="button" class="btn btn-labeled btn-success btn-sm" style="width:65px; height:30px;">

									    			<i class="fa fa-edit"></i>
									    		Edit
									    	</button>

									    	<button  onclick="hapus(<?php echo $templatebap['tbltemplatepemberitahuan_id']; ?>)" type='button' class='btn btn-labeled btn-danger btn-sm' style="width:65px; height:30px;">

									    			<i class="fa fa-trash-o"></i>
									    		Hapus
									    	</button></td>
								</tr>
							<?php endforeach ?>

							</tbody>
						</table>
					</div>
				</div><!-- end widget content -->

				</div><!-- end widget div -->

				</div><!-- end widget -->

				</article><!-- WIDGET END -->

				</div><!-- end row -->

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
									<h4 class="modal-title" id="myModalLabel"><i class="fa fa-check"></i>&nbsp;Form Tambah Template Surat Pemberitahuan</h4>
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
													<select class="input-sm" id="nama_izin">
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
												<p>Ditampilkan ?</p>
											</section>
											<section class="col col-1">:
											</section>
											<section class="col col-8">
												<label class="select">
													<select name="select_isaktif" id="nama_isaktif">
														<option value="T">Ya</option>
														<option value="F">Tidak</option>
													</select>
												</label>
											</section>
										</div>
										<hr>
										<br />
									</fieldset>
								</form>

								<form method="post" enctype="multipart/form-data" class="smart-form" action="app/templatepemberitahuan/SimpanFileTemplatePemberitahuan" id="form-upload-temp">
                                    <fieldset>
                                    <div class="row">
                                     <section class="col col-3">
									    	<label class="label">Upload Template <br>Surat Pemberitahuan (Draft)</label>
									  </section>
									  <section class="col col-1">:
									  </section>
									<section class="col col-6">

										<label for="file" class="input input-file">
											<div class="button">
												<input type="file" id="nama_filepemberitahuan" name="nama_filepemberitahuan" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Upload File RTF" readonly="">
												<input type="hidden" name="namafilenya" id="namafilenya" value="">
												<b class="tooltip tooltip-top-right">Upload Template Surat Pemberitahuan (Draft)</b>
										</label>
									</section>
									</div>

									<section>
										<div class="progress progress-md progress-striped active" id="progress">
											<div class="progress-bar bg-color-blue"  id="bar"  role="progressbar" style="width: auto;"></div>
										</div>
									</section>

									<section>
										<button type="submit" id="submit-file" style="display: none;" class="btn btn-block bg-color-blue btn-success">
										<i class="fa fa-upload"></i> Upload File</button>
									</section>
									<section>
									<div id="file-pemberitahuan">

									</div>
									</section>
									</fieldset>
								</form>

								<form method="post" enctype="multipart/form-data" class="smart-form" action="app/templatepemberitahuan/SimpanFileTemplatePemberitahuan_jadi" id="form-upload-temp-jadi">
                                    <fieldset>
                                    <div class="row">
                                     <section class="col col-3">
									    	<label class="label">Upload Template <br>Surat Pemberitahuan</label>
									  </section>
									  <section class="col col-1">:
									  </section>
									<section class="col col-6">

										<label for="file" class="input input-file">
											<div class="button">
												<input type="file" id="nama_filepemberitahuan_jadi" name="nama_filepemberitahuan_jadi" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Upload File RTF" readonly="">
												<input type="hidden" name="namafilenyajadi" id="namafilenyajadi" value="">
												<b class="tooltip tooltip-top-right">Upload Template Surat Pemberitahuan</b>
										</label>
									</section>
									</div>

									<section>
										<div class="progress progress-md progress-striped active" id="progress">
											<div class="progress-bar bg-color-blue"  id="bar-jadi"  role="progressbar" style="width: auto;"></div>
										</div>
									</section>

									<section>
										<button type="submit" id="submit-file-jadi" style="display: none;" class="btn btn-block bg-color-blue btn-success">
										<i class="fa fa-upload"></i> Upload File</button>
									</section>
									<section>
									<div id="file-pemberitahuan-jadi">

									</div>
									</section>
									</fieldset>
								</form>

								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">
										<i class="fa fa-ban"></i>	Batal
									</button>
									<button onclick="simpan()" type="button" class="btn btn-primary" id="eg7">
										<i class="fa fa-floppy-o"></i>&nbsp;Simpan</button>
								</div>

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
	 * Error 404! Page not found.
	 */

	 pageSetUp();

	function inArray(r,n){for(var t=n.length,e=0;t>e;e++)if(n[e]==r)return!0;return!1}
	loadScript("<?php echo ASSETS_URL; ?>/js/jquery.form.js",defineAjaxForm2);
	function defineAjaxForm2() {
		var all = ['rtf'];
		var options = {
			beforeSend: function()
			{
				$("#progress").show();
		    	//clear everything
		    	$("#bar").width('0%');

		    	filenya = document.getElementById("nama_filepemberitahuan");
				ext = $("#nama_filepemberitahuan").val().split('.').reverse()[0];
				if (!inArray(ext,all) && ext!='') {
					$("#modalform").modal("hide");
					$("#nama_filepemberitahuan").parent().next().val('');
					notifikasi('Peringatan','File yang anda pilih tidak sesuai extensi yang diizinkan! Mohon pilih file berekstensi .rtf','false',1,0);
					xhr.abort();
					return false;
				}

		    },
		    uploadProgress: function(event, position, total, percentComplete)
		    {
		    	$("#bar").width(percentComplete+'%');

		    },
		    success: function(respon)
		    {
		    	$("#bar").width('100%');
		    	if (respon.responseText!='failed'){

					$("#modalform").modal("hide");

					//notifikasi("Sukses","Data berhasil disimpan","success",1,0);
					//reloadTabel();
				}
				else
					notifikasi("Gagal","Data gagal disimpan","failed",1,0);

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

		var optionsJadi = {
			beforeSend: function()
			{
				$("#progress").show();
		    	//clear everything
		    	$("#bar-jadi").width('0%');

		    	filenya = document.getElementById("nama_filepemberitahuan");
				ext = $("#nama_filepemberitahuan").val().split('.').reverse()[0];
				if (!inArray(ext,all) && ext!='') {
					$("#modalform").modal("hide");
					$("#nama_filepemberitahuan").parent().next().val('');
					notifikasi('Peringatan','File yang anda pilih tidak sesuai extensi yang diizinkan! Mohon pilih file berekstensi .rtf','false',1,0);
					xhr.abort();
					return false;
				}

		    },
		    uploadProgress: function(event, position, total, percentComplete)
		    {
		    	$("#bar-jadi").width(percentComplete+'%');

		    },
		    success: function(respon)
		    {
		    	doSimpan();
		    	$("#bar-jadi").width('100%');
		    	if (respon.responseText!='failed'){

					$("#modalform").modal("hide");

					notifikasi("Sukses","Data berhasil disimpan","success",1,0);
					setTimeout(function() {
						reloadTabel();						
					}, 1000);
				}
				else
					notifikasi("Gagal","Data gagal disimpan","failed",1,0);

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
		$("#form-upload-temp-jadi").ajaxForm(optionsJadi);
	}

	function reloadTabel() {
		$.ajax({
			url: 'app/templatepemberitahuan/reloadTabel',
			type: 'POST',
			data: {},
			success: function(respon) {
				$("#list-data").html(respon);
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

	//MODAL
	$('#modal_link').click(function() {
		$('#dialog-message').dialog('open');
		return false;
	});

	function simpan () {
		$("#submit-file").click();
		$("#submit-file-jadi").click();
	}

	function doSimpan() {
		var nama_file = typeof( $("#nama_filepemberitahuan").val().split('\\')[2] )!="undefined" ? $("#nama_filepemberitahuan").val().split('\\')[2] : $("#nama_filepemberitahuan").val().split('\\')[0];
		var nama_file_jadi = typeof( $("#nama_filepemberitahuan_jadi").val().split('\\')[2] )!="undefined" ? $("#nama_filepemberitahuan_jadi").val().split('\\')[2] : $("#nama_filepemberitahuan_jadi").val().split('\\')[0];
		$.ajax({
			url: 'app/templatepemberitahuan/simpan',
			type: 'POST',
			data: {
				cmd: window.cmd,
				id: window.id,
				nama_izin: $('#nama_izin').val(),
				nama_isaktif: $('#nama_isaktif').val(),
				nama_file: nama_file,
				nama_filejadi: nama_file_jadi
			}
			,success: function  (respon) {
				/*if (respon=='success')
					{}
				else
					notifikasi("Gagal","Data gagal disimpan","failed",1,0);*/
			}
		})
		return false;
	}

function tambah() {
	window.cmd = "tambah";
	$("#modalform").modal("show");
	$("#nama_izin").val('');
	$("#nama_isaktif").val('');
	$("#nama_file").val('');

	$("#bar").width('0%');
	$("#nama_filepemberitahuan").parent().next().val('');
	$("#nama_filepemberitahuan").val('');
	$("#file-pemberitahuan").hide();

	$("#bar-jadi").width('0%');
	$("#nama_filepemberitahuan_jadi").parent().next().val('');
	$("#nama_filepemberitahuan_jadi").val('');
	$("#file-pemberitahuan-jadi").hide();
}


function edit(id) {
	$("#bar").width('0%');
	$("#nama_filepemberitahuan").parent().next().val('');
	$("#nama_filepemberitahuan").val('');

	$("#bar-jadi").width('0%');
	$("#nama_filepemberitahuan_jadi").parent().next().val('');
	$("#nama_filepemberitahuan_jadi").val('');

	$("#file-pemberitahuan").show();
	$("#file-pemberitahuan-jadi").show();
	window.id = id;
	window.cmd = "edit";
	$.ajax({
		url: 'app/templatepemberitahuan/GetDataTemplatePemberitahuan',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success : function (respon) {
			$("#nama_izin").val(respon.tblizin_id);
			$("#nama_isaktif").val(respon.tbltemplatepemberitahuan_isaktif);

		

		var filespemberitahuan = respon.tbltemplatepemberitahuan_namafile;
			if (filespemberitahuan != "") {$("#file-pemberitahuan").html("<a href='file/temp_surat_pemberitahuan/"+filespemberitahuan+"'>Lihat File yang sudah di Upload</a>")}
			else {$("#file-pemberitahuan").html("Belum ada file yang di upload")}

		var filespemberitahuan_jadi = respon.tbltemplatepemberitahuan_namafilejadi;
			if (filespemberitahuan_jadi != "") {$("#file-pemberitahuan-jadi").html("<a href='file/temp_surat_pemberitahuan/"+filespemberitahuan_jadi+"'>Lihat File yang sudah di Upload</a>")}
			else {$("#file-pemberitahuan-jadi").html("Belum ada file yang di upload")}

		}

	});

	$("#modalform").modal("show");	

}



function editdata() {
	window.cmd = "edit";
	$("#modalform").modal("show");
	$("#nama_izin").val('');
	$("#nama_isaktif").val('');
	$("#nama_file").val('');
}


function hapus(id) {
	window.id = id;
	window.cmd = "hapus";
	$.SmartMessageBox({
		title : "Konfirmasi",
		content : "Apakah anda yakin akan menghapus Template Surat Pemberitahuan ini?",
		buttons : '[Tidak][Ya]'
	}, function(ButtonPressed) {
		if (ButtonPressed === "Ya") {
			$.ajax({
				url: 'app/templatepemberitahuan/HapusDataTemplatePemberitahuan',
				type: 'POST',
				data: {id: id},
				success: function  (respon) {
					if (respon=='success') {
						notifikasi("Sukses","Data berhasil dihapus","success",1,0);
						reloadTabel();
					}
					else
						notifikasi("Gagal","Data gagal dihapus","failed",1,0);
				}
			});

		}

	});

}


</script>
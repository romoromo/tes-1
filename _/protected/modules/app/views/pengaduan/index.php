<?php define('ASSETS_URL', 'themes/smartadmin');
; ?>
<div class="well well-sm well-light">
	<h1 class="text-center font-lg"><i class="fa fa-ballon"></i> Pengaduan</h1>
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

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
					<h2>Kontrol Data </h2>

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
				  	<!-- <a data-toggle="modal" class="btn btn-info" onclick="tambah()"><i class="fa fa-plus-square"></i> Tambah
				  	</a> -->
				  </div>

					 <div id="tabel"></div>

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
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-fw fa-2x fa-file-text-o"></i>&nbsp;Form Group Phonebook</h4>
			</div>
			<form action="" id="form_group" class="smart-form" novalidate>
				<fieldset>
					<section>
						<div class="row">
							<div class="col col-md-12">
								<label for="label" class="input">Judul Pengaduan : </label>
									<label class="input"> <i class="icon-append fa fa-square "></i>
										<input name="judulpengaduan" type="text" id="judulpengaduan" placeholder="Judul Pengaduan" disabled="disabled">
								</label>
							</div>
						</div>
					</section>

					<section>
						<div class="row">
							<div class="col col-md-12">
								<label for="label" class="input">Pengaduan : </label>
									<label class="input"> <i class="icon-append fa fa-square "></i>
										<input name="pengaduan" type="text" id="pengaduan" placeholder="Pengaduan" disabled="disabled">
								</label>
							</div>
						</div>
					</section>

					<section>
						<div class="row">
							<div class="col col-md-12">
								<label for="label" class="input">Tanggagpan : </label>
									<label class="input"> <i class="icon-append fa fa-user "></i>
										<input name="tanggapan" type="text" id="tanggapan" placeholder="Tanggapan">
								</label>
							</div>
						</div>
					</section>

			</fieldset>
				<fieldset>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
							<i class="fa fa-ban"></i>	Batal
						</button>
						<button type="submit" class="btn btn-sm btn-primary">
							<i class="fa fa-floppy-o"></i>&nbsp;Simpan</button>
					</div>
				</fieldset>
			</form>
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

	$(document).ready(function() {

		gettbl();
	});

	function gettbl () {
		$.ajax({
			url: 'app/pengaduan/gettbl',
			type: 'get',
			data: {},
			success:function (res) {
				$("#tabel").html(res);
			}
		});
	}

	loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		var $orderForm = $("#form_group").validate({
				// Rules for form validation
				rules : {
					tanggapan : {
						required : true
					}
				},

				// Messages for form validation
				messages : {
					tanggapan : {
						required : 'Anda belum mengisi Tanggapan'
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
	function edit (id) {
		$.ajax({
			url: 'app/pengaduan/edit',
			type: 'post',
			dataType: 'json',
			data: {id: id},
			success : function (respon) {
			window.cmd = "edit";
			window.id = id;
			$('#modalsms').modal("show");
			$('#judulpengaduan').val(respon.tblpengaduan_judul);
			$('#pengaduan').val(respon.tblpengaduan_konten);
			$('#tanggapan').val(respon.tblkomentar_konten);
			}
		});

	}

	function simpan () {
		$.ajax({
			url: 'app/pengaduan/simpan',
			type: 'POST',
			data: {
				cmd: window.cmd,
				id: window.id,
				tblpengaduan_konten : $("#tanggapan").val(),
			},
			success:function (respon) {
				$("#modalsms").modal("hide");
				if (respon='success') {
					notifikasi('Terkirim', 'Data berhasil disimpan', 'success',1,0);
					gettbl();
				}
			}
		});
	}

	function hapus(id) {
	if( id!=null ) var urlhapus='app/pengaduan/hapus';
		$.SmartMessageBox({
				title : "Anda yakin ingin menghapus data ini?",
				content : "Data yang sudah dihapus tidak bisa dikembalikan lagi",
				buttons : '[Tidak][Ya]'
			}, function(ButtonPressed) {
				if (ButtonPressed === "Ya") {

					/*jalankan ajax hapus*/
					$.ajax({
						url: urlhapus,
						type: 'post',
						data: {id: id}, // kirim parameter tblhasilsurvey_id
						success: function (data) {
							if(data=='success') {
								notifikasi('Sukses','Data Berhasil Dihapus', 'success',1,0);
								gettbl();
								//window.location.reload();
							} else {
								notifikasi('Gagal','Data Gagal Dihapus', 'fail');
							}
						}
					});
				}

			});
	}

	function toogle_aktif(id, status) {
		$.ajax({
			url: 'app/pengaduan/simpan_status',
			type: 'POST',
			data: {

				id : id,
				status : status,
			},
			success:function  (respon) {
				if (respon=='success') {
					notifikasi('Informasi', 'Status aktif berhasil disimpan', 'success', 1,0);
					gettbl();
				}else{
					notifikasi('Informasi', 'Status aktif gagal disimpan', 'failed', 1,0);
				};
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

</script>
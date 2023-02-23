<?php define('ASSETS_URL', 'themes/smartadmin');
; ?>

<div class="well well-sm well-light">	
	<p class="alert alert-info text-align-center">
	   <strong  style="font-size: 22px;"> Keberatan Pajak (SKPD)</strong>
	</p>
	<form action="" id="order-form" class="smart-form" novalidate>
		<fieldset>
			<div class="row">
				<section class="col col-3">
					<p><strong style="font-size: 18px;">Nomor Penetapan</strong></p>
				</section>
				<section class="col col-1">:
				</section>
				<section class="col col-4">
					<label class="input">
						<input class="input-sm" type="text" style="background-color: gainsboro;">
					</label>
				</section>
				<section class="col col-1">
				    <a  data-toggle='modal' data-target='#cari'>
					<button class='btn btn-success btn-sm' type='submit'>
					<i class="fa fa-search"></i> Pencarian
					</button></a>
				</section>
			</div>
			<div class="row">
				<section class="col col-3">
					<p>Nomor Obyek Pajak</p>
				</section>
				<section class="col col-1">:
				</section>
				<section class="col col-4">
					<label class="input">
						<input class="input-sm" type="text" style="background-color: gainsboro;"
					</label>
				</section>
				
			</div>
			<div class="row">
				<section class="col col-3">
					<p>Nama Obyek Pajak</p>
				</section>
				<section class="col col-1">:
				</section>
				<section class="col col-4">
					<label class="input">
						<input class="input-sm" type="text" style="background-color: gainsboro;">
					</label>
				</section>
			</div>
			<div class="row">
				<section class="col col-3">
				<p>Kecamatan</p>
				</section>
				<section class="col col-1">:
				</section>
				<section class="col col-4">
					<label class="input">
						<input class="input-sm" type="text" style="background-color: gainsboro;">
					</label>
				</section>
			</div>
			<div class="row">
				<section class="col col-3">
				<p>Kelurahan</p>
				</section>
				<section class="col col-1">:
				</section>
				<section class="col col-4">
					<label class="input">
						<input class="input-sm" type="text" style="background-color: gainsboro;">
					</label>
				</section>
			</div>
			<div class="row">
				<section class="col col-3">
				<p>Desa</p>
				</section>
				<section class="col col-1">:
				</section>
				<section class="col col-4">
					<label class="input">
						<input class="input-sm" type="text" style="background-color: gainsboro;">
					</label>
				</section>
			</div>
			<div class="row">
				<section class="col col-3">
				<p>Jalan/RT RW</p>
				</section>
				<section class="col col-1">:
				</section>
				<section class="col col-6">
					<label class="textarea"> 										
						<textarea rows="3" class="custom-scroll" style="background-color: gainsboro;"></textarea> 
					</label>
				</section>
			</div>
			<div class="row">
				<section class="col col-3">
					<p>Bidang Usaha</p>
				</section>
				<section class="col col-1">:
				</section>
				<section class="col col-6">
					<label class="input">
						<input class="input-sm" type="text" style="background-color: gainsboro;">
					</label>
				</section>
			</div>
			<div class="row">
				<section class="col col-3">
					<p>Tanggal Penetapan</p>
				</section>
				<section class="col col-1">:
				</section>
				<section class="col col-4">
					<div class="input-group">
					<input type="text" name="mydate" placeholder="" class="form-control datepicker" data-dateformat="dd/mm/yy">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					</div>
				</section>
			</div>
			<div class="row">
				<section class="col col-3">
					<p>Tanggal Penetapan</p>
				</section>
				<section class="col col-1">:
				</section>
				<section class="col col-4">
					<div class="input-group">
					<input type="text" name="mydate" placeholder="" class="form-control datepicker" data-dateformat="dd/mm/yy">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					</div>
				</section>
			</div>
			<div class="row">
				<section class="col col-3">
					<p>Nama Pemohon</p>
				</section>
				<section class="col col-1">:
				</section>
				<section class="col col-6">
					<label class="input">
						<input class="input-sm" type="text" >
					</label>
				</section>
			</div>
			<div class="row">
				<section class="col col-3">
					<p>Tanggal Pemohon</p>
				</section>
				<section class="col col-1">:
				</section>
				<section class="col col-4">
					<div class="input-group">
					<input type="text" name="mydate" placeholder="" class="form-control datepicker" data-dateformat="dd/mm/yy">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					</div>
				</section>
			</div>
			<div class="row">
				<section class="col col-3">
				<p>Keterangan</p>
				</section>
				<section class="col col-1">:
				</section>
				<section class="col col-6">
					<label class="textarea"> 										
						<textarea rows="3" class="custom-scroll"></textarea> 
					</label>
				</section>
			</div>
			<div class="row">
				<section class="col col-3">
					<p>Nomor SK</p>
				</section>
				<section class="col col-1">:
				</section>
				<section class="col col-6">
					<label class="input">
						<input class="input-sm" type="text" >
					</label>
				</section>
			</div>
			
			<div class="widget-body">

				<hr class="simple">

				<ul id="myTab1" class="nav nav-tabs bordered">
					<li class="active">
						<a href="#s1" data-toggle="tab">Ketetapan Lama</a>
					</li>
					<li class="">
						<a href="#s2" data-toggle="tab">Perhitungan WP</a>
					</li>
					<li class="">
						<a href="#s3" data-toggle="tab">Hasil Keputusan</a>
					</li>
				</ul>

				<div id="myTabContent1" class="tab-content padding-10">
					<div class="tab-pane fade active in" id="s1">
						<div class="row">
						    <section class="col col-3">
								<p>Besar Omset Lama</p>
							</section>
							<section class="col col-1">:
							</section>
							<section class="col col-4">
								<label class="input">
									<input class="input-sm" type="text" style="background-color: gainsboro;">
								</label>
							</section>
						</div>
						<div class="row">
						    <section class="col col-3">
								<p>Tarif Pajak Lama %</p>
							</section>
							<section class="col col-1">:
							</section>
							<section class="col col-2">
								<label class="input">
									<input class="input-sm" type="text" style="background-color: gainsboro;">
								</label>
							</section>
						</div>
						<div class="row">
						    <section class="col col-3">
								<p>Denda Lama</p>
							</section>
							<section class="col col-1">:
							</section>
							<section class="col col-4">
								<label class="input">
									<input class="input-sm" type="text" style="background-color: gainsboro;">
								</label>
							</section>
						</div>
						<div class="row">
						    <section class="col col-3">
								<p><strong style="font-size: 18px;">Ketetapan Pajak Lama</strong></p>
							</section>
							<section class="col col-1">:
							</section>
							<section class="col col-4">
								<label class="input">
									<input class="input-sm" type="text" style="background-color: gainsboro;">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-3">
								<p>Keterangan</p>
							</section>
							<section class="col col-1">:
							</section>
							<section class="col col-4">
								<label class="textarea"> 										
									<textarea rows="3" class="custom-scroll" style="background-color: gainsboro;"></textarea> 
								</label>
							</section>
						</div>
					</div>

					<div class="tab-pane fade" id="s2">
						<div class="row">
						    <section class="col col-3">
								<p>No Penelitian</p>
							</section>
							<section class="col col-1">:
							</section>
							<section class="col col-4">
								<label class="input">
									<input class="input-sm" type="text">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-3">
							<p>Tanggal Penelitian</p>
							</section>
							<section class="col col-1">:
							</section>
							<section class="col col-3">
								<div class="input-group">
									<input type="text" name="mydate" placeholder="" class="form-control datepicker" data-dateformat="dd/mm/yy">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</section>
						</div>
						<div class="row">
						    <section class="col col-3">
								<p><strong style="font-size: 18px;">Perhitungan Pajak Baru</strong></p>
							</section>
							<section class="col col-1">:
							</section>
							<section class="col col-4">
								<label class="input">
									<input class="input-sm" type="text" >
								</label>
							</section>
						</div>
					</div>
					<div class="tab-pane fade" id="s3">
						<label class="radio">
							<input type="radio" name="radio" checked="checked">
							<i></i>Menerima seluruhnya</label>
						<label class="radio">
							<input type="radio" name="radio" checked="checked">
							<i></i>Menerima sebagian</label>
						<label class="radio">
							<input type="radio" name="radio" checked="checked">
							<i></i>Menambah</label>
						<label class="radio">
							<input type="radio" name="radio" checked="checked">
							<i></i>Menolak</label>
					    <div class="row">
						    <section class="col col-3">
								<p><strong style="font-size: 18px;">Ketetapan Pajak Baru</strong></p>
							</section>
							<section class="col col-1">:
							</section>
							<section class="col col-4">
								<label class="input">
									<input class="input-sm" type="text" style="background-color: gainsboro;">
								</label>
							</section>
						</div>
					</div>
				</div>
			</div>
		</fieldset>
		<footer>
		<div class="row" style="float: left;">
				<button class='btn btn-danger btn-sm' type='submit' id="eg7">
					<i class="glyphicon glyphicon-remove"></i> Keluar
				</button>

				<button class='btn btn-warning btn-sm' type='submit' id="eg7">
					<i class="fa fa-print"></i> Cetak SK
				</button>
				
				<button class='btn btn-primary btn-sm' type='submit' id="eg7">
					<i class="fa fa-save"></i> Simpan
				</button>

			</div>
		</footer>
	</form>
</div>





<!-- MODAL CARI -->
<div class="modal fade" id="cari" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-search"></i>&nbsp;Pencarian SKPD</h4>
			</div>
			<form action="" id="order-form" class="smart-form" novalidate>
				<fieldset>
					<div class="row">
						<section class="col col-4">
							<p>Nomor Penetapan/Kohir</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-6">
							<label class="input">
								<input class="input-sm" type="text" id="edit_jenispemohon" name="edit_pemohon">
							</label>
						</section>
					</div>
					<div class="row">
						<section class="col col-4">
							<p>No NPWPD</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-6">
							<label class="input">
								<input class="input-sm" type="text" id="edit_register" name="reg">
							</label>
						</section>
					</div>
					<div class="row">
						<section class="col col-4">
							<p>Nama Pemilik</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-6">
							<label class="input">
								<input class="input-sm" type="text" id="edit_jenispemohon" name="edit_pemohon">
							</label>
						</section>
					</div>
					<div class="row">
						<section class="col col-4">
							<p>Nama Obyek Pajak</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-6">
							<label class="input">
								<input class="input-sm" type="text" id="edit_register" name="reg">
							</label>
						</section>
					</div>
					<div class="row">
						<section class="col col-4">
						<p>Jenis Pajak</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-6">
							<label class="select">
								<select name="interested">
								    <option value="-1" selected="" disabled=""></option>
									<option value="0">Hiburan</option>
									<option value="1">Reklame</option>
									<option value="2">Penerangan Jalan</option>
								</select> <i></i> 
							</label>
						</section>
					</div>
					<div class="row">
						<section class="col col-4">
							<p>Tanggal Penetapan</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-6">
							<label class="input">
								<input type="text" name="mydate" placeholder="" class="datepicker" data-dateformat="dd/mm/yy">
								<i class="icon-append fa fa-calendar"></i>
							</label>
						</section>
					</div>
					<div class="row">
						<section class="col col-4">
							<p>s/d Tanggal</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-6">
							<label class="input">
								<input type="text" name="mydate" placeholder="" class="datepicker" data-dateformat="dd/mm/yy">
								<i class="icon-append fa fa-calendar"></i>
							</label>
						</section>
					</div>
				</fieldset>								
			</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<i class="fa fa-ban"></i>	Batal
				</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">
					<i class="fa fa-search"></i>&nbsp;Cari</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<!---END MODAL CARI -->




<script type="text/javascript">


	pageSetUp();
	
	
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


$('#eg7').click(function() {

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
</script>
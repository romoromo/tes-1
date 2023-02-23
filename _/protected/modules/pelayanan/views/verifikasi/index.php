<?php define('ASSETS_URL', 'themes/smartadmin')?>

<div class="well well-sm well-light text-center">
	<h4><i class="fa fa-tasks"></i> Verifikasi Data</h4>
</div>

<!--  -->
<section>
	<div class="well">
		<div class="row">
			<div class="col-md-12">
				<div class="widget-body-toolbar">
					<div class="pencarian" style="margin-top: -4px;">
						<button class="btn btn-primary" data-toggle="modal" style="float: right;" id="button_cari" onclick="$('#cari').show(400);$('#button_tutup').show();$('#button_cari').hide();">
							<i class="fa  fa-search"></i>	Pencarian / Filter Data
						</button>	
						<button class="btn btn-primary" data-toggle="modal" style="float: right; display:none" onclick="$('#cari').hide(400);$('#button_cari').show();$('#button_tutup').hide();" id="button_tutup">
							<i class="fa  fa-times"></i>	Tutup Pencarian / Filter
						</button>
					</div>					
				</div>
				<div class="widget-body slideInRight fast animated" id="cari">
					<form class="smart-form" novalidate="novalidate">
						<fieldset>
							<section>
								<div class="row">
									<div class="col col-6">
										<h3>Pencarian</h3>
									</div>
								</div>
							</section>
							<?php /* <section>
								<div class="col col-2">
								</div>
								<div class="inline-group">
									<label class="radio">
										<input type="radio" name="Aktif" id="isYa" value="T">
										<i></i> Ya 
									</label>
									<label class="radio">
										<input type="radio" name="Aktif" id="isTidak" value="F">
										<i></i> Tidak
									</label>
								</div>
							</section> */ ?>
							<section>
								<div class="row">
									<div class="col col-2">
										Status Verifikasi
									</div>
									<div class="col col-4">
										<label class="select">
											<select name="cari_tblobyek_ispengukuhan" id="cari_tblobyek_ispengukuhan" class="select2">
												<option value="">- Pilih Status Verifikasi -</option>
												<option value="T">Sudah Diverifikasi</option>
												<option selected="" value="F">Belum Diverifikasi</option>
											</select>
										</label>
									</div>
								</div>
							</section>

							<section>
								<button type="button" class="btn btn-sm btn-info" onclick="cari()">
									<i class="fa fa-search"></i>
									Cari
								</button>
							</section>	
						</fieldset>
					</form>
				</div>
			</div>
		</div>	
	</div>
</section>
<!--  -->

<section id="widget-grid" class="">
	<div class="well well-sm well-light">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-fsdfgs12441278"
					data-widget-editbutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-sortable="false"
					>
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>Data Grid</h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">

						</div>
						<div class="widget-body no-padding">
							<div class="widget-body-toolbar">
								
							</div>
							<div id="kontrol_table">
								<table id="dt_pipeline" class="table table-striped table-bordered table-hover" width="100%">
									<thead>
										<tr>
											<th width="10%" data-hide="phone"></th>
											<th width="5%" data-hide="phone">NO</th>
											<th width="25%" data-class="expand">Nama Pemilik</th>
											<th data-hide="phone">Nomor SPTPD</th>
											<th data-hide="phone, tablet">Nama Obyek</th>
											<th data-hide="phone, tablet">Jenis Pajak</th>
											<th data-hide="phone, tablet">Lokasi Obyek</th>
											<th data-hide="phone, tablet">Kelurahan / Kecamatan</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="modul-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Pengukuhan Obyek
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form id="form-data" class="smart-form">

					<fieldset>

						<section>
							<div class="row">
								<label class="label col col-10">Nama Obyek</label>
								<div class="col col-4">
									<label id="TSUBYEK_BUNAMAMERK"></label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Lokasi Obyek</label>
								<div class="col col-10">
									<label id="tblobyek_alamat"></label>
									<!-- ,Kel. --> <label id="TBLKELURAHAN_NAMA"></label>, <!-- Kec. --> <label id="TBLKECAMATAN_NAMA"></label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-10">Tanggal Pengukuhan Obyek</label>
								<div class="col col-4">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input class="datepicker" data-dateformat="dd-mm-yy" value="" type="text" name="param[TNPWPD_TGLKUKUH]" id="TNPWPD_TGLKUKUH">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Nomor Pengukuhan Obyek</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-square"></i>
										<input readonly="" class="disabled" value="" type="text" name="param[TNPWPD_NOKUKUH]" id="TNPWPD_NOKUKUH" />
									</label>
								</div>
							</div>
						</section>

					</fieldset>

					<footer>
						<div class="col col-12">
							<label class="textarea">
								<ol>
									<?php /*<li>Petunjuk ...</li>*/ ?>
								</ol>
							</label>
						</div>

						<button id="btn-simpan" type="submit" class="btn btn-primary">
							Kukuhkan Obyek
						</button>
						<button type="reset" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>

					</footer>
				</form>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
	pageSetUp();

	jQuery(document).ready(function($) {
		loadDataTable();
	});

	function loadDataTable() {
		var param = {
			cari_tblobyek_ispengukuhan : $("#cari_tblobyek_ispengukuhan").val()!=null ? $("#cari_tblobyek_ispengukuhan").val() : ""
		};
		var url_param = jQuery.param(param);
		var totalRecords = <?php echo $data['total_data'] ?>; // total no of records
		var ajaxUrl = "pelayanan/verifikasi/DTJSON?"+url_param // url that fetches the data for the table
		// drawTable($('#dt_basic_pipeline'), 1, totalRecords, ajaxUrl);  //Initializes the datatable
		COLUMN  = [
			{ "data": "TNPWPD_ID", "orderable": false, "render": function ( data, type, row, meta ) {
				if (row.TNPWPD_ISKUKUH=="F") {
				return '<button rel="tooltip" data-placement="right" data-original-title="Digunakan untuk mengkukuhkan obyek pajak"  class="btn btn-circle btn-warning btn-sm" onclick="pengukuhan(\''+row.TNPWPD_ID+'\')"><i class="fa fa-check"></i></button>'
				} else {
					return '<a rel="tooltip" data-placement="right" data-original-title="Digunakan untuk mencetak surat pengukuhan obyek pajak" target="_blank"  class="btn btn-circle btn-primary btn-sm" href="<?= Yii::app()->getBaseUrl(1); ?>/pelayanan/verifikasi/cetak/?id='+ btoa( row.TNPWPD_ID )+')"><i class="fa fa-print"></i></button>'
					+ '<a rel="tooltip" data-placement="right" data-original-title="Digunakan untuk mencetak kartu NPWPD" target="_blank"  class="btn btn-circle bg-color-magenta txt-color-white btn-sm" href="<?= Yii::app()->getBaseUrl(1); ?>/pelayanan/verifikasi/cetakkartu?npwpd='+ btoa( row.TNPWPD_MILIKNAMA )+'&namawp='+ btoa( row.TNPWPD_MILIKNAMA )+'&alamatwp='+ btoa( row.TNPWPD_MILIKALAMAT )+'&tgltap='+ btoa( row.TNPWPD_TGLKUKUH )+'&jenispajak='+ btoa( row.TBLMASTERREKENING_NAMA )+')"><i class="fa fa-print"></i></button>'
				}
				;
			 }
			}
			,{ "data": "num", "orderable": false }
			,{ "data": "TNPWPD_MILIKNAMA", "orderable": false }
			,{ "data": "TNPWPD_NPWPD" ,"orderable": false }
			,{ "data": "TSUBYEK_BUNAMAMERK" ,"orderable": false }
			,{ "data": "TREKENING_NAMA" ,"orderable": false }
			,{ "data": "TNPWPD_MILIKALAMAT" ,"orderable": false }
			,{ "data": "TBLKECAMATAN_NAMA" ,"orderable": false, "render": function ( data, type, row, meta ) {
				keckel = row.TBLKELURAHAN_NAMA + ", " + row.TBLKECAMATAN_NAMA;
				return keckel;
			 }
			}
		];
		ORDERS = [
		[ 2, "asc" ]
		];
		drawTablePipeLine($('#dt_pipeline'), 1, totalRecords, ajaxUrl,COLUMN,ORDERS, pageSetUp);  //Initializes the datatable
	}

	/*form validation*/
	loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		var $FormData = $("#form-data").validate({
				// Rules for form validation
				rules : {
					"param[tblobyek_pengukuhantgl]" : {
						required : true
					}
					,"param[tblobyek_pengukuhanno]" : {
						required : true
					}
				},

				// Messages for form validation
				messages : {
					"param[tblobyek_pengukuhantgl]" : {
						required : "Mohon isikan tanggal pengukuhan"
					}
					,"param[tblobyek_pengukuhanno]" : {
						required : "Mohon isikan nomor pengukuhan"
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

	};
	/*//form validation*/
	/*CRUD*/

	function pengukuhan(id) {
		window.idKukuh = id;
		window.cmd = "edit";
		$("#form-data")[0].reset();
		$("#form-data .select2").select2('val','');
		$.ajax({
			url: 'pelayanan/verifikasi/getdata',
			type: 'post',
			dataType: "json",
			data: {
				id: id,
			},
			success:function(respon) {
				window.respon = respon;
				exclude = [];
				$.each(respon, function(index, val) {
					if(!inArray(index,exclude)) {
		 				$("#"+index).html(respon[index]);
		 				// $("#"+index).select2('val',respon[index]!="0" ? respon[index] : "");
		 				// $("input[type=radio][value='"+respon[index]+"']."+index).prop('checked', true); //pilih radio button
					}
				});
			}
		});

		$("#modul-form").modal("show");
	}

	function simpan() {
		$.ajax({
			url: 'pelayanan/verifikasi/simpan',
			type: 'post',
			dataType: 'json',
			data:  $("#form-data").serialize()+'&id='+window.idKukuh+'&cmd='+window.cmd,
			success: function(respon) {
				if (respon.status=="success") {
					$("#modul-form").modal("hide");
					notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
					loadDataTable();
				}
				else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
				}
			}
		});

		return false;
	}

	/*CRUD*/

	function cari() {
		window.cari_tblobyek_ispengukuhan = $("#cari_tblobyek_ispengukuhan").val()!=null ? $("#cari_tblobyek_ispengukuhan").val() : "";
		loadDataTable();
	}

	$("#TNPWPD_TGLKUKUH").change(function(event) {
		getNoKukuh(this.value);
	});
	function getNoKukuh(tgl) {
		$.post('pelayanan/verifikasi/generateNOKUKUH', {tgl: tgl,obyid: window.idKukuh}, function(respon) {
			$("#TNPWPD_NOKUKUH").val(respon.nomor);	
		},'json');		
	}
</script>
<style type="text/css">
	.disabled {
		background: #ddd !important;
	}
</style>
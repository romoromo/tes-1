<?php define('ASSETS_URL', 'themes/smartadmin')?>

<div class="well well-sm well-light text-center">
	<h4><i class="fa fa-tasks"></i> Cetak Ketetapan By Tanggal</h4>
</div>

<!--  -->
<section>
	<div class="well">
		<div class="row">
			<div class="col-md-12">
				<div class="widget-body-toolbar">
					<div class="pencarian" style="margin-top: -4px;">
						<button class="btn btn-primary" data-toggle="modal" style="float: right;display:none;" id="button_cari" onclick="$('#cari').show(400);$('#button_tutup').show();$('#button_cari').hide();">
							<i class="fa  fa-search"></i>	Pencarian / Filter Data
						</button>	
						<button class="btn btn-primary" data-toggle="modal" style="float: right; " onclick="$('#cari').hide(400);$('#button_cari').show();$('#button_tutup').hide();" id="button_tutup">
							<i class="fa  fa-times"></i>	Tutup Pencarian / Filter
						</button>
					</div>					
				</div>
				<div class="widget-body slideInRight fast animated" id="cari" >
					<form class="smart-form" novalidate="novalidate">
						<fieldset>
							<section>
								<div class="row">
									<div class="col col-6">
										<h3>Pencarian</h3>
									</div>
								</div>
							</section>

							<div class="row">
								<section class="col col-md-2">
								<p>Jenis Pajak </p>
								</section>
								<section class="col col-md-3">
									<label class="select">
										<select id="TBLKECAMATAN_ID" name="TBLKECAMATAN_ID" class="select2">
											<option value="" selected="">-- Pilih Jenis Pajak --</option>
											<option value="">Pajak Air Tanah</option>
											<option value="">Pajak Reklame</option>
											<option value="">Pajak Hiburan</option>
											<?php // foreach ($data['kecamatan'] as $list): ?>
											<!-- <option value="<?php // echo $list['REFKECAMATAN_KODE'] ?>"><?php // echo $list['REFKECAMATAN_NAMA'] ?></option> -->
											<?php // endforeach ?>
										</select>
									</label>
								</section>
							</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Pajak </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tanggal_daftar" class="datepicker" data-dateformat="dd-mm-yy" id="tgl_jobang">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Kode </p>
									</section>
									<section class="col col-md-1">
										<label class="select">
										<select id="TNPWPD_CARATETAP" name="param[TNPWPD_CARATETAP]" class="select2">
											<option value="" selected="">Kode</option>
											<option value="T">T</option>
											<option value="I">I</option>
											<option value="U">U</option>
											<option value="M">M</option>
											<option value="S">S</option>
											<option value="K">K</option>
											<option value="B">B</option>
										</select>
									</label>
									</section>
									<section class="col col-md-2">
										<p>(I) Insident  (T) Tetap</p>
									</section>
								</div>

								<br>

								<div class="row">
									<section class="col col-md-2">
										<p>Nomor Nota </p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="formulir" name="formulir">
										</label>
									</section>
								</div>
						
								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Entry SPT</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tgl_spt" class="datepicker" data-dateformat="dd-mm-yy" id="tgl_spt">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Cetak SKPD</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tgl_spt" class="datepicker" data-dateformat="dd-mm-yy" id="tgl_spt">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Batas SKPD</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tgl_spt" class="datepicker" data-dateformat="dd-mm-yy" id="tgl_spt">
										</label>
									</section>
								</div>

								<br>
								<header style="border-color: red;">Berdasarkan Tanggal Ketetapan</header>
								<br>

								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Batas SKPD</p>
									</section>
									<section class="col col-md-2">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tglketetapan_awal" class="datepicker" data-dateformat="dd-mm-yy" id="tglketetapan_awal">
										</label>
									</section>
									<section class="col col-md-1">
										S/D
									</section>
									<section class="col col-md-2">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tglketetapan_akhir" class="datepicker" data-dateformat="dd-mm-yy" id="tglketetapan_akhir">
										</label>
									</section>
								</div>

								<br>

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

<section id="widget-grid-tetapan" style="display: none;" class="">
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
			url: 'penetapan/cetak_ketetapanbytanggal/simpan',
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
		$("#widget-grid-tetapan").show();
		$("html, body").animate({ scrollTop: $("#widget-grid-tetapan").offset().top-100 }, "slow");
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
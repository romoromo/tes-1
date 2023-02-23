<?php define('ASSETS_URL', 'themes/smartadmin')?>

<div class="well well-sm well-light text-center">
	<h4><i class="fa fa-tasks"></i> Ubah Data Ketetapan</h4>
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
										<select id="TBLREKENING_KODE" name="TBLREKENING_KODE" class="select2">
											<option value="" selected="">-- Pilih Jenis Pajak --</option>
											<option value="4.1.1.8.0">[4.1.1.8.0] Pajak Air Tanah</option>
											<option value="4.1.1.4.0">[4.1.1.4.0] Pajak Reklame</option>
											<option value="4.1.1.3.0">[4.1.1.3.0] Pajak Hiburan</option>
										</select>
									</label>
								</section>
							</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Pajak</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input maxlength="2" placeholder="99" type="number" id="TBLPENDATAAN_THNPAJAK" name="param[TBLPENDATAAN_THNPAJAK]" value="<?= date('Y') ?>" placeholder="Tahun" maxlength="4">
										</label>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="" id="TBLPENDATAAN_BLNPAJAK" name="param[TBLPENDATAAN_BLNPAJAK]">
												<option value="">-- Bulan --</option>
												<?php for ($i=1; $i<=12; $i++): ?>
													<option <?php echo $i==(int)date('m') ? '' /*'selected'*/ : '' ?> value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
												<?php endfor ?>
											</select><i class="fa fa-square"></i>
										</label>
									</section>

									<section class="col col-md-2">
										<label class="input">
											<input maxlength="2" value="<?php //= date('d') ?>" type="number" id="TBLPENDATAAN_TGLPAJAK" name="param[TBLPENDATAAN_TGLPAJAK]" placeholder="Tanggal" maxlength="2">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Kode </p>
									</section>
									<section class="col col-md-2">
										<label class="select">
										<select id="kode" name="param[kode]" class="select2">
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
											<input class="input-sm" type="text" id="nomornota" name="nomornota">
										</label>
									</section>
								</div>
						
								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Entry SPT</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tglspt" class="datepicker" data-dateformat="dd-mm-yy" id="tglspt">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Entry SKPD</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tglskp" class="datepicker" data-dateformat="dd-mm-yy" id="tglskp">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Batas SKPD</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tglbskp" class="datepicker" data-dateformat="dd-mm-yy" id="tglbskp">
										</label>
									</section>
								</div>

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
							<div id="kontrol_table" style="overflow-y: auto; max-height: 480px;">
							
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
					Form Edit Data SKPD
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form id="form-data" class="smart-form">

					<fieldset>
						<input type="hidden" name="param[tbl]" id="form_tbl">
						<input type="hidden" name="param[nopok]" id="form_nopok">
						<input type="hidden" name="param[thp]" id="form_thp">
						<input type="hidden" name="param[blp]" id="form_blp">
						<input type="hidden" name="param[hrp]" id="form_hrp">
						<input type="hidden" name="param[ke]" id="form_ke">
						<input type="hidden" name="param[nomorskp]" id="form_nomorskp">
						<section>
							<div class="row">
								<label class="label col col-10">Tanggal SKPD</label>
								<div class="col col-4">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input class="datepicker" data-dateformat="dd-mm-yy" value="" type="text" name="param[tglskp]" id="form_tglskp">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-10">NO SKPD</label>
								<div class="col col-4">
									<label class="input"> <i class="icon-append fa fa-square"></i>
										<input value="" type="text" name="param[NOuSKP]" id="form_NOuSKP" />
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-10">Tanggal Batas SKPD</label>
								<div class="col col-4">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input class="datepicker" data-dateformat="dd-mm-yy" value="" type="text" name="param[tglbskp]" id="form_tglbskp">
									</label>
								</div>
							</div>
						</section>

						<section id="ifSKPDRek">
							<div class="row">
								<label class="label col col-10">Tanggal Pasang Reklame</label>
								<div class="col col-4">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input class="datepicker" data-dateformat="dd-mm-yy" value="" type="text" name="param[tglpasangaw]" id="form_tglpasangaw">
									</label>
								</div>
								<div class="col col-4">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input class="datepicker" data-dateformat="dd-mm-yy" value="" type="text" name="param[tglpasangak]" id="form_tglpasangak">
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

						<button type="reset" class="btn btn-default" data-dismiss="modal">
							Tutup Form >>
						</button>
						<button id="btn-simpan" type="submit" class="btn btn-primary">
							Proses Ubah Data >>
						</button>

					</footer>
				</form>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="modul-batal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Pembatalan SKPD
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form id="form-batal" class="smart-form">

					<fieldset>
						<input type="hidden" name="param[tbl]" id="batal_tbl">
						<input type="hidden" name="param[TBLDAFTAR_NOPOK]" id="batal_nopok">
						<input type="hidden" name="param[TBLPENDATAAN_THNPAJAK]" id="batal_thp">
						<input type="hidden" name="param[TBLPENDATAAN_BLNPAJAK]" id="batal_blp">
						<input type="hidden" name="param[TBLPENDATAAN_TGLPAJAK]" id="batal_hrp">
						<input type="hidden" name="param[TBLPENDATAAN_PAJAKKE]" id="batal_ke">
						<input type="hidden" name="param[nomorskp]" id="batal_nomorskp">
						<section>
							<div class="row">
								<label class="label col col-10">NAMA WP</label>
								<div class="col col-6">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input value="" type="text" name="param[namausaha]" id="batal_namausaha">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-10">Masa Pajak</label>
								<div class="col col-6">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input value="" type="text" name="param[masapajak]" id="batal_masapajak">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-10">Lokasi</label>
								<div class="col col-6">
									<label class="input"> <i class="icon-append fa fa-square"></i>
										<input value="" type="text" name="param[lokasi]" id="batal_lokasi">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-10">Tanggal SKPD</label>
								<div class="col col-4">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input class="datepicker" data-dateformat="dd-mm-yy" value="" type="text" name="param[tglskp]" id="batal_tglskp">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-10">NO SKPD</label>
								<div class="col col-4">
									<label class="input"> <i class="icon-append fa fa-square"></i>
										<input value="" type="text" name="param[NOuSKP]" id="batal_NOuSKP" />
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-10">Pajak [RP]</label>
								<div class="col col-5">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input value="" type="text" name="param[pajak]" id="batal_pajak">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-10">Keterangan</label>
								<div class="col col-6">
									<label class="textarea">
										<textarea rows="3" name="param[keterangan]" id="batal_keterangan"></textarea>
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

						<button type="reset" class="btn btn-default" data-dismiss="modal">
							Tutup Form >>
						</button>
						<button id="btn-batal" type="submit" class="btn btn-danger">
							Pembatalan SKPD >>
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
		// loadDataTable();
	});

	loadScript("<?= Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/moment-js/moment-with-locales.min.js", setMoment);
	function setMoment() {
		moment.locale('id');
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
		var $FormBatal = $("#form-batal").validate({
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
					return batalkanskpd();
				}
			});

	};
	/*//form validation*/
	/*CRUD*/

	function simpan() {
		$.ajax({
			url: 'penetapan/edit_ketetapan/simpan',
			type: 'post',
			dataType: 'json',
			data:  $("#form-data").serialize()+'&cmd='+window.cmdproses,
			success: function(respon) {
				if (respon.status=="success") {
					$("#modul-form").modal("hide");
					notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
					cari();
				}
				else {
					notifikasi('Gagal',respon.msg, 'fail',1,0);
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

		var param = {
			kode : $("#kode").val()
			,nomornota : $("#nomornota").val()
			,tahunpajak : $("#TBLPENDATAAN_THNPAJAK").val()
			,bulanpajak : $("#TBLPENDATAAN_BLNPAJAK").val()
			,haripajak : $("#TBLPENDATAAN_TGLPAJAK").val()
			,tglspt : $("#tglspt").val()
			,tglskp : $("#tglskp").val()
			,tglbskp : $("#tglbskp").val()
			,rekening : $("#TBLREKENING_KODE").val()
		}

		$("#kontrol_table").html('<div align="center"><h3>Sedang memuat data...</h3></div>');
		
		$.ajax({
			url: 'penetapan/edit_ketetapan/cari',
			type: 'POST',
			data: jQuery.param(param),
		})
		.done(function(respon) {
			console.log("success");
			$("#kontrol_table").html(respon);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}

	function edit(tbl, nopok, ke, thp, nomorskp) {
		window.cmdproses = 'edit';
		$.SmartMessageBox({
			title : "Konfirmasi",
			content : "Apakah Data Akan Diubah?",
			buttons : '[Tidak][Ya]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'penetapan/edit_ketetapan/getData',
					type: 'POST',
					dataType: 'json',
					data: {
						tbl: tbl
						,nopok: nopok
						,ke: ke
						,thp: thp
						,nomorskp: nomorskp
					}
				})
				.done(function(respon) {
					$("#form_tglskp").val(isikiri(respon[respon.NAMATABEL+'_TGLSKPD'], '00') + '-' + isikiri(respon[respon.NAMATABEL+'_BLNSKPD'], '00') + '-20' + isikiri(respon[respon.NAMATABEL+'_THNSKPD'], '00'));
					$("#form_tglbskp").val(isikiri(respon[respon.NAMATABEL+'_TGLBATASSKPD'], '00') + '-' + isikiri(respon[respon.NAMATABEL+'_BLNBATASSKPD'], '00') + '-20' + isikiri(respon[respon.NAMATABEL+'_THNBATASSKPD'], '00'));
					$("#form_NOuSKP").val(parseInt(respon[respon.NAMATABEL+'_NOMORSKPD']));

					$("#form_tbl").val(tbl);
					$("#form_nopok").val(nopok);
					$("#form_thp").val(thp);
					$("#form_blp").val(respon.TBLPENDATAAN_BLNPAJAK);
					$("#form_hrp").val(respon.TBLPENDATAAN_TGLPAJAK);
					$("#form_ke").val(parseInt(respon.TBLPENDATAAN_PAJAKKE));
					$("#form_nomorskp").val(respon[respon.NAMATABEL+'_NOMORSKPD']);
					$("#modul-form").modal('show');

					$("#ifSKPDRek").hide();
					if (tbl=='VEJMREFGVFJFS0xBTUU=') {
						$("#ifSKPDRek").show();
						$("#form_tglpasangaw").val( isikiri(respon[respon.NAMATABEL+'_TGLMULAIREKLAME'], '00') + '-' + isikiri(respon[respon.NAMATABEL+'_BLNMULAIREKLAME'], '00') + '-20' + isikiri(respon[respon.NAMATABEL+'_THNMULAIREKLAME'], '00'));
						$("#form_tglpasangak").val( isikiri(respon[respon.NAMATABEL+'_TGLAKHIRREKLAME'], '00') + '-' + isikiri(respon[respon.NAMATABEL+'_BLNAKHIRREKLAME'], '00') + '-20' + isikiri(respon[respon.NAMATABEL+'_THNAKHIRREKLAME'], '00'));
					}
				})
				.fail(function(jqXHR, exception) {
					console.log("error");
					handelErr(jqXHR, exception);
				})
				.always(function() {
					console.log("complete");
				});
				;

			}

		});
	}

	function batal(tbl, nopok, ke, thp, nomorskp) {
		window.cmdproses = 'edit';
		$.SmartMessageBox({
			title : "Konfirmasi",
			content : "Apakah Pembatalan Akan Dijalankan?",
			buttons : '[Tidak][Ya]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'penetapan/edit_ketetapan/getDataBatal',
					type: 'POST',
					dataType: 'json',
					data: {
						tbl: tbl
						,nopok: nopok
						,ke: ke
						,thp: thp
						,nomorskp: nomorskp
					}
				})
				.done(function(respon) {
					$("#batal_tglskp").val(isikiri(respon[respon.NAMATABEL+'_TGLSKPD'], '00') + '-' + isikiri(respon[respon.NAMATABEL+'_BLNSKPD'], '00') + '-20' + isikiri(respon[respon.NAMATABEL+'_THNSKPD'], '00'));
					$("#batal_namausaha").val(respon.TBLDAFTAR_BADANUSAHANAMA);
					$("#batal_masapajak").val(respon.masapajak);
					$("#batal_lokasi").val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
					$("#batal_pajak").val(respon[respon.NAMATABEL+'_PAJAK']);
					$("#batal_keterangan").val(respon.keterangan);
					$("#batal_NOuSKP").val(respon[respon.NAMATABEL+'_NOMORSKPD']);

					$("#batal_tbl").val(tbl);
					$("#batal_nopok").val(nopok);
					$("#batal_ke").val(ke);
					$("#batal_thp").val(thp);
					$("#batal_blp").val(respon['TBLPENDATAAN_BLNPAJAK']);
					$("#batal_hrp").val(respon['TBLPENDATAAN_TGLPAJAK']);
					// $("#batal_hrp").val(respon.HRP);
					$("#batal_nomorskp").val(nomorskp);

					$("#modul-batal").modal('show');
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
				;

			}

		});
	}

	function batalkanskpd() {
		$.ajax({
			url: 'penetapan/edit_ketetapan/batalkanskpd',
			type: 'post',
			dataType: 'json',
			data:  $("#form-batal").serialize()+'&cmd='+window.cmdproses,
			success: function(respon) {
				if (respon.status=="success") {
					$("#modul-batal").modal("hide");
					notifikasi('Sukses',respon.msg, 'success',1,0);
					cari();

					$.SmartMessageBox({
						title : "Pembatalan SKP berhasil",
						content : "Apakah pendataan akan dihapus juga?",
						buttons : '[Tidak][Ya]'
					}, function(ButtonPressed) {
						if (ButtonPressed === "Ya") {
							$.ajax({
								url: 'penetapan/edit_ketetapan/hapusdata',
								type: 'POST',
								dataType: 'json',
								data: $("#form-batal").serialize()+'&cmd='+window.cmdproses,
							})
							.done(function(respon) {
								if (respon.status=='success') {
									notifikasi('Berhasil', respon.msg, 'success', 1, 0);
									cari();
								} else {
									notifikasi('Maaf', respon.msg, 'fail', 1, 0);
								}
							})
							.fail(function(jqXHR, exception) {
								console.log("error");
								handelErr(jqXHR, exception);
							})
							.always(function() {
								console.log("complete");
							});
							;

						}

					});

					// cari();
				}
				else {
					notifikasi('Gagal',respon.msg, 'fail',1,0);
				}
			}
		})
		.fail(function(jqXHR, exception) {
			console.log("error");
			handelErr(jqXHR, exception);
		})
		.always(function() {
			console.log("complete");
		});
	}

	$("#form_tglskp").change(function(event) {
		var tglbatas = moment( $("#form_tglskp").val().split("-").reverse().join("-") ).add(1, "months");
		$("#form_tglbskp").val( tglbatas.format('L') );
	});

	function isikiri(angka, pad) {
		return ans = pad.substring(0, pad.length - angka.toString().length) + angka.toString();
	}

</script>
<style type="text/css">
	.disabled {
		background: #ddd !important;
	}
</style>
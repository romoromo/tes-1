<?php define('ASSETS_URL', 'themes/smartadmin')?>

<div class="well well-sm well-light text-center">
	<h4><i class="fa fa-tasks"></i> Cetak Ulang Ketetapan</h4>
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
										<select id="JENIS_PAJAK" name="JENIS_PAJAK" class="select2">
											<option value="" selected="">-- Pilih Jenis Pajak --</option>
											<option value="AIRTANAH">Pajak Air Tanah</option>
											<option value="REKLAME">Pajak Reklame</option>
											<!-- <option value="">Pajak Hiburan</option> -->
											<?php // foreach ($data['kecamatan'] as $list): ?>
											<!-- <option value="<?php // echo $list['REFKECAMATAN_KODE'] ?>"><?php // echo $list['REFKECAMATAN_NAMA'] ?></option> -->
											<?php // endforeach ?>
										</select>
									</label>
								</section>
							</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Masa Pajak</p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<label class="input">
												<input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="TBLPENDATAAN_THNPAJAK" name="param[TBLPENDATAAN_THNPAJAK]">
											</label>
										</label>
									</section>
									<section class="col col-md">
										<label class="checkbox pull-right">
											<input type="checkbox" name="is_bulan" id="is_bulan">
											<i></i>
										</label>
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select class="select2" id="TBLPENDATAAN_BLNPAJAK" name="TBLPENDATAAN_BLNPAJAK">
												<option value="1">Januari</option>
												<option value="2">Februari</option>
												<option value="3">Maret</option>
												<option value="4">April</option>
												<option value="5">Mei</option>
												<option value="6">Juni</option>
												<option value="7">Juli</option>
												<option value="8">Agustus</option>
												<option value="9">September</option>
												<option value="10">Oktober</option>
												<option value="11">November</option>
												<option value="12">Desember</option>
											</select>
										</label>
									</section>
									<section class="col col-md">
										<label class="checkbox pull-right">
											<input type="checkbox" name="is_tanggal" id="is_tanggal">
											<i></i>
										</label>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" id="TBLPENDATAAN_TGLPAJAK" name="TBLPENDATAAN_TGLPAJAK">
												<?php for ($i=1; $i <32 ; $i++) {  ?>
												<?php if ($i==date('d')): ?>
													<option selected="selected" value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php else: ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php endif ?>
												<?php } ?>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kode </p>
									</section>
									<section class="col col-md-2">
										<label class="select">
										<select id="TBLDAFTREKLAME_JNSREKLAME" name="param[TBLDAFTREKLAME_JNSREKLAME]" class="select2">
												<option selected="" value="">-- Pilih Jenis --</option>
											<?php $data['listjns'] = array('T', 'I', 'U', 'M', 'S', 'K', 'B'); foreach ($data['listjns'] as $jns): ?>
												<option value="<?= $jns; ?>"><?= $jns; ?></option>
											<?php endforeach ?>
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
											<input class="input-sm" type="text" id="NOMOR_SKPD" name="NOMOR_SKPD">
										</label>
									</section>
								</div>
						
								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Entry SPT</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" value="<?= date('d-m-Y') ?>" name="TGLENTRI" class="datepicker" data-dateformat="dd-mm-yy" id="TGLENTRI">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Cetak SKPD</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" value="<?= date('d-m-Y') ?>" name="TGLSKPD" class="datepicker" data-dateformat="dd-mm-yy" id="TGLSKPD">
										</label>
									</section>
								</div>
								<div class="row" style="display: none">
									<section class="col col-md-2">
										<p>Tgl. Batas SKPD</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="TGLBATASSKPD" class="datepicker" data-dateformat="dd-mm-yy" id="TGLBATASSKPD">
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
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-fsdfgs12441278d"
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
								<button class="btn btn-sm btn-primary btnprosestap" onclick="tetapkan()" type="button" style="display: none;">
									<i class="fa fa-forward"></i> Proses
								</button>

								<div class="group_button_proses_reklame pull-right" style="display: none;">

									<button class="btn btn-sm txt-color-white bg-color-greenLight" onclick="cetakNotaWord()" type="button">
										<i class="fa fa-print"></i> Cetak Nota
									</button>

									<button class="btn btn-sm txt-color-white bg-color-magenta" onclick="cetakDaftarWord()" type="button">
										<i class="fa fa-print"></i> Cetak Daftar
									</button>

									<button class="btn btn-sm btn-default" id="btnskpdreklame" onclick="cetakSKPDWord()" type="button">
										<i class="fa fa-print"></i> Cetak SKPD
									</button>

								</div>

								<div class="group_button_proses_airtanah pull-right" style="display: none;">

									<button class="btn btn-sm txt-color-white bg-color-greenLight" onclick="cetakNotaWordAirtanah()" type="button">
										<i class="fa fa-print"></i> Cetak Nota
									</button>

									<button class="btn btn-sm txt-color-white bg-color-magenta" onclick="cetakDaftarWordAirtanah()" type="button">
										<i class="fa fa-print"></i> Cetak Daftar
									</button>

									<button class="btn btn-sm btn-default" id="btnskpdairtanah" onclick="cetakSKPDWordAirtanah()" type="button">
										<i class="fa fa-print"></i> Cetak SKPD
									</button>

								</div>
							</div>
							<div id="kontrol_table" style="overflow-y: scroll;overflow-x: scroll;height: 300px;width: 100%;">
								
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

<form target="_blank" id="form-skpd-reklame" style="display: none;" method="post" action="<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/cetakskpdword/">
	<input type="hidden" name="data" id="skpd-reklame">
</form>

<form target="_blank" id="form-skpd-airtanah" style="display: none;" method="post" action="<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/cetakskpdwordairtanah/">
	<input type="hidden" name="data" id="skpd-airtanah">
</form>

<form target="_blank" id="form-nota-skpd-airtanah" style="display: none;" method="post" action="<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/cetaknotawordairtanah/">
	<input type="hidden" name="data" id="nota-skpd-airtanah">
</form>

<form target="_blank" id="form-nota-skpd-reklame" style="display: none;" method="post" action="<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/CetakNotaWord/">
	<input type="hidden" name="data" id="nota-skpd-reklame">
</form>

<form target="_blank" id="form-daftar-skpd-airtanah" style="display: none;" method="post" action="<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/CetakDaftarWordAirtanah/">
	<input type="hidden" name="data" id="daftar-skpd-airtanah">
	<input type="hidden" name="TBLPENDATAAN_THNPAJAK" id="POST_TBLPENDATAAN_THNPAJAK">
	<input type="hidden" name="TBLPENDATAAN_BLNPAJAK" id="POST_TBLPENDATAAN_BLNPAJAK">
	<input type="hidden" name="TBLDAFTREKLAME_TGLSKPD" id="POST_TBLDAFTREKLAME_TGLSKPD">
	<input type="hidden" name="TGLENTRI" id="POST_TGLENTRI">
	<input type="hidden" name="TGLSKPD" id="POST_TGLSKPD">
</form>

<form target="_blank" id="form-daftar-skpd-reklame" style="display: none;" method="post" action="<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/CetakDaftarWord/">
	<input type="hidden" name="data" id="daftar-skpd-reklame">
	<input type="hidden" name="TBLDAFTREKLAME_JNSREKLAME" id="POST_TBLDAFTREKLAME_JNSREKLAME">
	<input type="hidden" name="TBLPENDATAAN_THNPAJAK" id="POST_TBLPENDATAAN_THNPAJAK_REKLAME">
	<input type="hidden" name="TBLPENDATAAN_BLNPAJAK" id="POST_TBLPENDATAAN_BLNPAJAK_REKLAME">
	<input type="hidden" name="TBLDAFTREKLAME_TGLSKPD" id="POST_TBLDAFTREKLAME_TGLSKPD_REKLAME">
	<input type="hidden" name="TGLENTRI" id="POST_TGLENTRI_REKLAME">
	<input type="hidden" name="TGLSKPD" id="POST_TGLSKPD_REKLAME">
</form>


<div id="dialog-message" title="" align="center" style="width: 300px; display:none;">
	<img id="loadinginfo" src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memproses...">
	<p>Mohon tunggu sampai proses transfer selesai</p>
</div>

<script type="text/javascript">
	pageSetUp();
	window.id_eksepsi = '';

	jQuery(document).ready(function($) {
		// loadDataTable();
		LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

		var tglbts1 = moment( $("#TGLSKPD").val().split("-").reverse().join("-") ).add(1, "days");

		var tanggal_batas = $("#TGLSKPD").val();

		tanggal_batas = tglbts1.format('L');

		var parts = tanggal_batas.split("-");

		dd = parts[0]; 
		mm = parts[1]; 
		yyyy = parts[2];

		tglbatas_cnvrt = mm+'-'+dd+'-'+yyyy;

		tglbts = new Date(tglbatas_cnvrt);

		// var parts = tanggal_batas.split("-");

		day = tglbts.getDay();
		if (day==5) {
			window.dd = tglbts.getDate()+3;
		} else if (day==6) {
			window.dd = tglbts.getDate()+2;
		} else if (day==0) {
			window.dd = tglbts.getDate()+1;
		} else {
			window.dd = tglbts.getDate();
		}
		// $('#TBLDAFTREKLAME_TGLBATASSKPD').val(day);

		window.mm = tglbts.getMonth()+1; //January is 0!
		window.yyyy = tglbts.getFullYear();

		// if(window.dd<10) {
		//     window.dd='0'+window.dd
		// } 

		// if(window.mm<10) {
		//     window.mm='0'+window.mm
		// } 

		tglbatas = window.dd+'-'+window.mm+'-'+window.yyyy;

		$("#TGLBATASSKPD").val( tglbatas );

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

	/*function simpan() {
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
	}*/

	/*CRUD*/

	/*function tetapkan() {
		arridPajak = [];

		$("input[name='nopokPajak']:checked").each(function() {
			arridPajak.push(this.value);
		});

		count = 0;
		for(x in arridPajak) {
			count++;
		}

		if (count>0) {
			daftaridPajak = arridPajak.toString();

			$.SmartMessageBox({
			title : "Konfirmasi", // judul Smart Alert
			content : "Apakah anda yakin akan menetapkan data terpilih?", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'penetapan/pajak_reklame/TetapkanPajak',
					type: 'POST',
					dataType: 'json',
					data: {
						 listPajak: daftaridPajak
						,TBLPENDATAAN_THNPAJAK: $('#TBLPENDATAAN_THNPAJAK').val()
						,TBLDAFTREKLAME_BLNPAJAK: $('#TBLDAFTREKLAME_BLNPAJAK').val()
						,TBLDAFTREKLAME_TGLSKPD: $('#TBLDAFTREKLAME_TGLSKPD').val()
						,TBLDAFTREKLAME_TGLBATASSKPD: $('#TBLDAFTREKLAME_TGLBATASSKPD').val()
					},
					beforeSend: function() {
						loadingTransfer('open');
						$("#dialog-message").modal('show');
					},
					success: function(respon) {
						setTimeout(function() {
							loadingTransfer('close');
							$("#dialog-message").modal('hide');
							// /cari();
							$('.group_button_proses').show();
							$('.btnprosestap').hide();
						}, 500);
						// notifikasi('Sukses','Data berhasil di tetapkan','success',1,0);
					}
				})
				.always(function() {
					console.log("complete");
					loadingTransfer('close');
					notifikasi('Sukses','Data berhasil di tetapkan','success',1,0);
					$("#dialog-message").modal('hide');
					$('.group_button_proses').show();
					$('.btnprosestap').hide();
					getLastNoUrut();
					//cari();
				});	
			}
		});

		} else {
			notifikasi('Informasi','Mohon pilih Data yg akan di transfer ke Penetapan, dengan mencentang Data.','fail',1,0)
		}

		return false;
	}*/

	function loadingTransfer(ev) {
		/*ev{open|close}*/
		$('#dialog-message').dialog(ev);
		$(".ui-dialog-titlebar-close").hide();
	}

	function loadDataTable() {
		if ($('#is_bulan').is(':checked')) {
			var is_bulan = $('#TBLPENDATAAN_BLNPAJAK').select2('val')
		}
		if ($('#is_tanggal').is(':checked')) {
			var is_tanggal = $('#TBLPENDATAAN_TGLPAJAK').select2('val')
		}
		var param = {
			id_eksepsi : window.id_eksepsi
			,TBLDAFTREKLAME_JNSREKLAME : $('#TBLDAFTREKLAME_JNSREKLAME').select2('val')
			,TBLPENDATAAN_THNPAJAK : $('#TBLPENDATAAN_THNPAJAK').val()
			,TBLPENDATAAN_BLNPAJAK : is_bulan
			,TBLPENDATAAN_TGLPAJAK : is_tanggal
			,TGLSKPD : $('#TGLSKPD').val()
			,TGLENTRI : $('#TGLENTRI').val()
			,TGLBATASSKPD : $('#TGLBATASSKPD').val()
			,JENIS_PAJAK : $('#JENIS_PAJAK').val()
			,NOMOR_SKPD: $('#NOMOR_SKPD').val()
		};

		$.ajax({
			url: 'penetapan/cetak_ulang_ketetapan/cari',
			type: 'POST',
			// data: $("#form-cari").serialize(),
			data: $("#form-cari").serialize()+'&'+jQuery.param(param),
		})
		.done(function(respon) {
			console.log("success");
			$('#kontrol_table').html(respon);
            $("#kontrol_table").prepend('<div align="center">'+LOADER+'');
            $(".loader_img").fadeOut(1000);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}

	function cari() {
		JENISPAJAK = $('#JENIS_PAJAK').select2('val');

		if (JENISPAJAK=='REKLAME') {
			$('.group_button_proses_reklame').show();
			$('.group_button_proses_airtanah').hide();
		} else {
			$('.group_button_proses_reklame').hide();
			$('.group_button_proses_airtanah').show();
		}

		window.cari_tblobyek_ispengukuhan = $("#cari_tblobyek_ispengukuhan").val()!=null ? $("#cari_tblobyek_ispengukuhan").val() : "";
		$("#widget-grid-tetapan").show();
		$("html, body").animate({ scrollTop: $("#widget-grid-tetapan").offset().top-100 }, "slow");
		// $("#kontrol_table").html(LOADER).fadeIn(400);
		loadDataTable();
		$('.btnprosestap').hide();
	}

	$("#JENIS_PAJAK").change(function(event) {
		var tglbts1 = moment( $("#TGLSKPD").val().split("-").reverse().join("-") ).add(1, "months");

			var tanggal_batas = $("#TGLSKPD").val();

			tanggal_batas = tglbts1.format('L');

			var parts = tanggal_batas.split("-");

			dd = parts[0]; 
			mm = parts[1]; 
			yyyy = parts[2];

			tglbatas_cnvrt = mm+'-'+dd+'-'+yyyy;

			tglbts = new Date(tglbatas_cnvrt);

			// var parts = tanggal_batas.split("-");

			day = tglbts.getDay();
			if (day==5) {
				window.dd = tglbts.getDate();
			} else if (day==6) {
				window.dd = tglbts.getDate()+2;
			} else if (day==0) {
				window.dd = tglbts.getDate()+1;
			} else {
				window.dd = tglbts.getDate();
			}

			if (window.dd==32) {
				window.mm = tglbts.getMonth()+2; //January is 0!
			} else {
				window.mm = tglbts.getMonth()+1; //January is 0!
			}

			if (window.dd==32) {
				window.dd = 01;
			}
			// $('#TBLDAFTREKLAME_TGLBATASSKPD').val(day);

			if (window.mm==13) {
				window.yyyy = tglbts.getFullYear()+1;
				window.mm = 01;
			} else {
				window.yyyy = tglbts.getFullYear();
			}


			// if(window.dd<10) {
			//     window.dd='0'+window.dd
			// } 

			// if(window.mm<10) {
			//     window.mm='0'+window.mm
			// } 

			tglbatas = window.dd+'-'+window.mm+'-'+window.yyyy;
	});

	$("#TNPWPD_TGLKUKUH").change(function(event) {
		getNoKukuh(this.value);
	});

	function getNoKukuh(tgl) {
		$.post('pelayanan/verifikasi/generateNOKUKUH', {tgl: tgl,obyid: window.idKukuh}, function(respon) {
			$("#TNPWPD_NOKUKUH").val(respon.nomor);	
		},'json');		
	}

	function cetakNota() {
		var q = btoa(daftaridPajak);
		// $('#skpd').val(q);
		// $('#form-skpd').submit();
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/cetakskpd/?data=' + q);
	}

	function cetakDaftar() {
		window.TBLDAFTREKLAME_JNSREKLAME = $('#TBLDAFTREKLAME_JNSREKLAME').select2('val');
		window.TBLPENDATAAN_THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
		TBLPENDATAAN_BLNPAJAK =  $('#TBLPENDATAAN_BLNPAJAK').select2('val');
		TBLDAFTREKLAME_TGLSKPD = $('#TBLDAFTREKLAME_TGLSKPD').val();
		TGLENTRI = $('#TGLENTRI').val();
		TGLSKPD = $('#TGLSKPD').val();
		TGLBATASSKPD = $('#TGLBATASSKPD').val();
		var q = daftaridPajak;
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/cetakskpd/?data=' + q +"&TBLDAFTREKLAME_JNSREKLAME="+window.TBLDAFTREKLAME_JNSREKLAME+"&TBLPENDATAAN_THNPAJAK="+window.TBLPENDATAAN_THNPAJAK+"&TBLPENDATAAN_BLNPAJAK="+TBLPENDATAAN_BLNPAJAK+"&TBLDAFTREKLAME_TGLSKPD="+TBLDAFTREKLAME_TGLSKPD+"&TGLENTRI="+TGLENTRI+"&TGLSKPD="+TGLSKPD+"&TGLBATASSKPD="+TGLBATASSKPD);
	}

	function cetakSKPD() {
		var q = btoa(daftaridPajak);
		//window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/cetakskpd/?data=' + q);
		$('#skpd-reklame').val(q);
		$('#form-skpd-reklame').submit();
	}

	$("#TGLSKPD, #TBLDAFTREKLAME_JNSREKLAME").change(function(event) {

		if ($('#TBLDAFTREKLAME_JNSREKLAME').select2('val')=='T' || $('#JENIS_PAJAK').select2('val')=='AIRTANAH') {
			var tglbts1 = moment( $("#TGLSKPD").val().split("-").reverse().join("-") ).add(1, "months");

			var tanggal_batas = $("#TGLSKPD").val();

			tanggal_batas = tglbts1.format('L');

			var parts = tanggal_batas.split("-");

			dd = parts[0]; 
			mm = parts[1]; 
			yyyy = parts[2];

			tglbatas_cnvrt = mm+'-'+dd+'-'+yyyy;

			tglbts = new Date(tglbatas_cnvrt);

			// var parts = tanggal_batas.split("-");

			day = tglbts.getDay();
			if (day==5) {
				window.dd = tglbts.getDate();
			} else if (day==6) {
				window.dd = tglbts.getDate()+2;
			} else if (day==0) {
				window.dd = tglbts.getDate()+1;
			} else {
				window.dd = tglbts.getDate();
			}

			if (window.dd==32) {
				window.mm = tglbts.getMonth()+2; //January is 0!
			} else {
				window.mm = tglbts.getMonth()+1; //January is 0!
			}

			if (window.dd==32) {
				window.dd = 01;
			}
			// $('#TBLDAFTREKLAME_TGLBATASSKPD').val(day);

			if (window.mm==13) {
				window.yyyy = tglbts.getFullYear()+1;
				window.mm = 01;
			} else {
				window.yyyy = tglbts.getFullYear();
			}


			// if(window.dd<10) {
			//     window.dd='0'+window.dd
			// } 

			// if(window.mm<10) {
			//     window.mm='0'+window.mm
			// } 

			tglbatas = window.dd+'-'+window.mm+'-'+window.yyyy;
		} else {
			// var tglbts = moment( $("#TBLDAFTREKLAME_TGLSKPD").val().split("-").reverse().join("-") ).add(1, "days");
			// tglbatas = tglbts.format('L');

			var tglbts1 = moment( $("#TGLSKPD").val().split("-").reverse().join("-") ).add(1, "days");

			var tanggal_batas = $("#TGLSKPD").val();

			tanggal_batas = tglbts1.format('L');

			var parts = tanggal_batas.split("-");

			dd = parts[0]; 
			mm = parts[1]; 
			yyyy = parts[2];

			tglbatas_cnvrt = mm+'-'+dd+'-'+yyyy;

			tglbts = new Date(tglbatas_cnvrt);

			// var parts = tanggal_batas.split("-");

			day = tglbts.getDay();
			if (day==5) {
				window.dd = tglbts.getDate();
			} else if (day==6) {
				window.dd = tglbts.getDate()+2;
			} else if (day==0) {
				window.dd = tglbts.getDate()+1;
			} else {
				window.dd = tglbts.getDate();
			}
			// $('#TBLDAFTREKLAME_TGLBATASSKPD').val(day);

			window.mm = tglbts.getMonth()+1; //January is 0!
			window.yyyy = tglbts.getFullYear();

			// if(window.dd<10) {
			//     window.dd='0'+window.dd
			// } 

			// if(window.mm<10) {
			//     window.mm='0'+window.mm
			// } 

			tglbatas = window.dd+'-'+window.mm+'-'+window.yyyy;

		}

		// window.today = new Date();

		// day = today.getDay();
		// if (day==6) {
		// 	window.dd = today.getDate()+2;
		// } else if (day==7) {
		// 	window.dd = today.getDate()+1;
		// } else {
		// 	window.dd = today.getDate();
		// }

		// window.mm = today.getMonth()+2; //January is 0!
		// window.yyyy = today.getFullYear();

		// today = window.dd+'-'+window.mm+'-'+window.yyyy;

		// $("#TGLBATASSKPD").val( tglbatas );
	});

	function cetakSKPDWordAirtanah() {
		arridPajak = [];

		$("input[name='nopokPajakAir']:checked").each(function() {
			arridPajak.push(this.value);
		});

		count = 0;
		for(x in arridPajak) {
			count++;
		}

		daftaridPajak = arridPajak.toString();

		var q = btoa(daftaridPajak);
		//window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/cetakskpd/?data=' + q);
		$('#skpd-airtanah').val(q);
		$('#form-skpd-airtanah').submit();
	}

	function cetakDaftarWordAirtanah() {

		window.TBLDAFTREKLAME_JNSREKLAME = $('#TBLDAFTREKLAME_JNSREKLAME').select2('val');
		window.TBLPENDATAAN_THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
		TBLPENDATAAN_BLNPAJAK =  $('#TBLPENDATAAN_BLNPAJAK').select2('val');
		TBLDAFTREKLAME_TGLSKPD = $('#TBLDAFTREKLAME_TGLSKPD').val();
		TGLENTRI = $('#TGLENTRI').val();
		TGLSKPD = $('#TGLSKPD').val();
		// TGLBATASSKPD = $('#TGLBATASSKPD').val();

		arridPajak = [];

		$("input[name='nopokPajakAir']:checked").each(function() {
			arridPajak.push(this.value);
		});

		count = 0;
		for(x in arridPajak) {
			count++;
		}

		daftaridPajak = arridPajak.toString();

		var q = btoa(daftaridPajak);
		// window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/cetakdaftarwordairtanah/?data=' + q +"&TBLPENDATAAN_THNPAJAK="+window.TBLPENDATAAN_THNPAJAK+"&TBLPENDATAAN_BLNPAJAK="+TBLPENDATAAN_BLNPAJAK+"&TBLDAFTREKLAME_TGLSKPD="+TBLDAFTREKLAME_TGLSKPD+"&TGLENTRI="+TGLENTRI+"&TGLSKPD="+TGLSKPD+"&TGLBATASSKPD="+TGLBATASSKPD);
		// window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/cetakdaftarwordairtanah/?data=' + q +"&TBLPENDATAAN_THNPAJAK="+window.TBLPENDATAAN_THNPAJAK+"&TBLPENDATAAN_BLNPAJAK="+TBLPENDATAAN_BLNPAJAK+"&TBLDAFTREKLAME_TGLSKPD="+TBLDAFTREKLAME_TGLSKPD+"&TGLENTRI="+TGLENTRI+"&TGLSKPD="+TGLSKPD);
		$('#daftar-skpd-airtanah').val(q);
		$('#POST_TBLPENDATAAN_THNPAJAK').val(window.TBLPENDATAAN_THNPAJAK);
		$('#POST_TBLPENDATAAN_BLNPAJAK').val(TBLPENDATAAN_BLNPAJAK);
		$('#POST_TBLDAFTREKLAME_TGLSKPD').val(TBLDAFTREKLAME_TGLSKPD);
		$('#POST_TGLENTRI').val(TGLENTRI);
		$('#POST_TGLSKPD').val(TGLSKPD);
		$('#form-daftar-skpd-airtanah').submit();
	}

	function cetakDaftarWord() {

		window.TBLDAFTREKLAME_JNSREKLAME = $('#TBLDAFTREKLAME_JNSREKLAME').select2('val');
		window.TBLPENDATAAN_THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
		TBLPENDATAAN_BLNPAJAK =  $('#TBLPENDATAAN_BLNPAJAK').select2('val');
		TBLDAFTREKLAME_TGLSKPD = $('#TBLDAFTREKLAME_TGLSKPD').val();
		TGLENTRI = $('#TGLENTRI').val();
		TGLSKPD = $('#TGLSKPD').val();
		TGLBATASSKPD = $('#TGLBATASSKPD').val();

		arridPajak = [];

		$("input[name='nopokPajak']:checked").each(function() {
			arridPajak.push(this.value);
		});

		count = 0;
		for(x in arridPajak) {
			count++;
		}

		daftaridPajak = arridPajak.toString();

		var q = btoa(daftaridPajak);
		// window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/cetakdaftarword/?data=' + q +"&TBLDAFTREKLAME_JNSREKLAME="+window.TBLDAFTREKLAME_JNSREKLAME+"&TBLPENDATAAN_THNPAJAK="+window.TBLPENDATAAN_THNPAJAK+"&TBLPENDATAAN_BLNPAJAK="+TBLPENDATAAN_BLNPAJAK+"&TBLDAFTREKLAME_TGLSKPD="+TBLDAFTREKLAME_TGLSKPD+"&TGLENTRI="+TGLENTRI+"&TGLSKPD="+TGLSKPD+"&TGLBATASSKPD="+TGLBATASSKPD);

		$('#daftar-skpd-reklame').val(q);
		$('#POST_TBLDAFTREKLAME_JNSREKLAME').val(window.TBLDAFTREKLAME_JNSREKLAME);
		$('#POST_TBLPENDATAAN_THNPAJAK_REKLAME').val(window.TBLPENDATAAN_THNPAJAK);
		$('#POST_TBLPENDATAAN_BLNPAJAK_REKLAME').val(TBLPENDATAAN_BLNPAJAK);
		$('#POST_TBLDAFTREKLAME_TGLSKPD_REKLAME').val(TBLDAFTREKLAME_TGLSKPD);
		$('#POST_TGLENTRI_REKLAME').val(TGLENTRI);
		$('#POST_TGLSKPD_REKLAME').val(TGLSKPD);
		$('#form-daftar-skpd-reklame').submit();
	}

	function cetakNotaWordAirtanah() {

		window.TBLDAFTREKLAME_JNSREKLAME = $('#TBLDAFTREKLAME_JNSREKLAME').select2('val');

		arridPajak = [];

		$("input[name='nopokPajakAir']:checked").each(function() {
			arridPajak.push(this.value);
		});

		count = 0;
		for(x in arridPajak) {
			count++;
		}

		daftaridPajak = arridPajak.toString();

		var q = btoa(daftaridPajak);
		// window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/cetaknotawordairtanah/?data=' + q );
		$('#nota-skpd-airtanah').val(q);
		$('#form-nota-skpd-airtanah').submit();
	}

	function cetakNotaWord() {

		window.TBLDAFTREKLAME_JNSREKLAME = $('#TBLDAFTREKLAME_JNSREKLAME').select2('val');
		window.TGLENTRI = $('#TGLENTRI').val();
		TGLSKPD = $('#TGLSKPD').val();

		arridPajak = [];

		$("input[name='nopokPajak']:checked").each(function() {
			arridPajak.push(this.value);
		});

		count = 0;
		for(x in arridPajak) {
			count++;
		}

		daftaridPajak = arridPajak.toString();

		var q = btoa(daftaridPajak);
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/cetaknotaword/?data=' + q +"&TBLDAFTREKLAME_JNSREKLAME="+window.TBLDAFTREKLAME_JNSREKLAME+"&TGLENTRI="+window.TGLENTRI);

		// $('#nota-skpd-reklame').val(q);
		// $('#form-nota-skpd-reklame').submit();
	}

	

	function cetakSKPDWord() {

		arridPajak = [];

		$("input[name='nopokPajak']:checked").each(function() {
			arridPajak.push(this.value);
		});

		count = 0;
		for(x in arridPajak) {
			count++;
		}

		daftaridPajak = arridPajak.toString();

		var q = btoa(daftaridPajak);
		// window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/cetak_ulang_ketetapan/cetakskpdword/?data=' + q);
		$('#skpd-reklame').val(q);
		$('#form-skpd-reklame').submit();
	}

</script>
<style type="text/css">
	.disabled {
		background: #ddd !important;
	}
</style>
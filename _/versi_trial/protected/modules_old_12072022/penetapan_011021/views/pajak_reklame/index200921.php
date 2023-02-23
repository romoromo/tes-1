<?php define('ASSETS_URL', 'themes/smartadmin')?>

<div class="well well-sm well-light text-center">
	<h4><i class="fa fa-tasks"></i> Nota Perhitungan Reklame</h4>
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
					<form class="smart-form" id="form-cari">
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
									<p>Tahun Pajak </p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input type="number" value="<?= date('Y') ?>" name="param[TBLPENDATAAN_THNPAJAK]" id="TBLPENDATAAN_THNPAJAK">
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-2">
									<p>Kode </p>
								</section>
								<section class="col col-md-3">
									<label class="select">
										<select id="TBLDAFTREKLAME_JNSREKLAME" name="param[TBLDAFTREKLAME_JNSREKLAME]" class="select2">
												<option selected="" value="">-- Pilih Jenis --</option>
											<?php $data['listjns'] = array('T', 'I', 'U', 'M', 'S', 'K', 'B'); foreach ($data['listjns'] as $jns): ?>
												<option value="<?= $jns; ?>"><?= $jns; ?></option>
											<?php endforeach ?>
										</select>
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-2">
									<p>Nomor Nota </p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input readonly="" style="background: #e4e4e4;" class="input-sm" type="text" id="TBLDAFTREKLAME_URUTSKPD" name="param[TBLDAFTREKLAME_URUTSKPD]">
									</label>
								</section>
							</div>
							<div class="row" style="display: none;">
								<section class="col col-md-2">
									<p>Kecamatan </p>
								</section>
								<section class="col col-md-3">
									<label class="select">
										<select id="TBLKECAMATAN_ID" name="param[TBLKECAMATAN_ID]" class="select2">
											<option value="" selected="">-- Pilih Kecamatan --</option>
											<?php foreach ($data['kecamatan'] as $list): ?>
												<option value="<?php echo $list['REFKECAMATAN_ID'] ?>">[<?php echo $list['REFKECAMATAN_ID'] ?>] <?php echo $list['REFKECAMATAN_NAMA'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
								</section>
							</div>

								<br>

								<div class="row" style="display: none;">
									<section class="col col-md-2">
										<p>Dengan Cara</p>
									</section>
									<section class="col col-md-3">
										<label class="select">
										<select id="TBLDAFTREKLAME_ISJNSPENETAPAN" name="param[TBLDAFTREKLAME_ISJNSPENETAPAN]" class="select2">
											<option value="" selected="">-- Pilih Cara --</option>
											<option value="Official Assesment"> O | Official Assesment</option>
										</select>
									</label>
									</section>
								</div>
								<!-- <div class="row">
									<section class="col col-md-2"></section>
									<section class="col col-md-3">
										<button type="button" class="btn btn-sm btn-sm btn-primary" onclick="cari()">
											<i class="fa  fa-search"></i>&nbsp;Cari
										</button>
									</section>
								</div> -->
						
								<header style="border-color: red;">Data Wajib Pajak</header><br>
								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Entry SPT</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="param[TBLDAFTREKLAME_TGLENTRI]" value="<?= date('d-m-Y') ?>" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTREKLAME_TGLENTRI">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Cetak SKPD</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input value="<?= date('d-m-Y') ?>" type="text" name="param[TBLDAFTREKLAME_TGLSKPD]" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTREKLAME_TGLSKPD">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Batas SKPD</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input value="<?= date('d-m-Y') ?>" type="text" name="param[TBLDAFTREKLAME_TGLBATASSKPD]" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTREKLAME_TGLBATASSKPD">
										</label>
									</section>
								</div>

							<section>
								<button type="button" class="btn btn-sm btn-info" onclick="window.id_eksepsi='';cari()">
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
								<button class="btn btn-sm btn-primary btnprosestap" onclick="tetapkan()" type="button">
									<i class="fa fa-forward"></i> Proses
								</button>
								<div class="group_button_proses pull-right" style="display: none;">
									<!-- <button class="btn btn-sm txt-color-white bg-color-greenLight" onclick="cetakNotaWord()" type="button">
										<i class="fa fa-print"></i> Cetak Nota
									</button>
									<button class="btn btn-sm txt-color-white bg-color-magenta" onclick="cetakDaftarWord()" type="button">
										<i class="fa fa-print"></i> Cetak Daftar
									</button> -->
									<button class="btn btn-sm btn-default" onclick="cetakSKPDWord()" type="button">
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

<div id="dialog-message" title="" align="center" style="width: 300px; display:none;">
	<img id="loadinginfo" src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memproses...">
	<p>Mohon tunggu sampai proses transfer selesai</p>
</div>

<form target="_blank" id="form-skpd-reklame" style="display: none;" method="post" action="<?= Yii::app()->getBaseUrl(1); ?>/penetapan/pajak_reklame/cetakskpdword/">
	<input type="hidden" name="data" id="skpd-reklame">
</form>

<script type="text/javascript">
	pageSetUp();
	window.id_eksepsi = '';

	jQuery(document).ready(function($) {
		$("#dialog-message").dialog({
			autoOpen : false,
			modal : true,
			title: "Mentransfer Data",
		});

		getLastNoUrut();

		var tglbts1 = moment( $("#TBLDAFTREKLAME_TGLSKPD").val().split("-").reverse().join("-") ).add(1, "days");

		var tanggal_batas = $("#TBLDAFTREKLAME_TGLSKPD").val();

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

		$("#TBLDAFTREKLAME_TGLBATASSKPD").val( tglbatas );

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
	function loadDataTable() {
		var param = {
			id_eksepsi : window.id_eksepsi
		};

		$.ajax({
			url: 'penetapan/pajak_reklame/cari',
			type: 'POST',
			data: $("#form-cari").serialize()+'&'+jQuery.param(param),
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

	function cari() {
		window.cari_tblobyek_ispengukuhan = $("#cari_tblobyek_ispengukuhan").val()!=null ? $("#cari_tblobyek_ispengukuhan").val() : "";
		$("#widget-grid-tetapan").show();
		$("html, body").animate({ scrollTop: $("#widget-grid-tetapan").offset().top-100 }, "slow");
		loadDataTable();
		$('.group_button_proses').hide();
		$('.btnprosestap').show();
	}

	function tetapkan() {
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
	}

	function loadingTransfer(ev) {
		/*ev{open|close}*/
		$('#dialog-message').dialog(ev);
		$(".ui-dialog-titlebar-close").hide();
	}

	$("#TBLPENDATAAN_THNPAJAK, #TBLDAFTREKLAME_JNSREKLAME").change(function(event) {
		getLastNoUrut();
	});

	$("#TBLDAFTREKLAME_TGLSKPD, #TBLDAFTREKLAME_JNSREKLAME").change(function(event) {

		if ($('#TBLDAFTREKLAME_JNSREKLAME').select2('val')=='T') {
			var tglbts1 = moment( $("#TBLDAFTREKLAME_TGLSKPD").val().split("-").reverse().join("-") ).add(1, "months");

			var tanggal_batas = $("#TBLDAFTREKLAME_TGLSKPD").val();

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

			var tglbts1 = moment( $("#TBLDAFTREKLAME_TGLSKPD").val().split("-").reverse().join("-") ).add(1, "days");

			var tanggal_batas = $("#TBLDAFTREKLAME_TGLSKPD").val();

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

		$("#TBLDAFTREKLAME_TGLBATASSKPD").val( tglbatas );
	});

	function cetakNota() {
		var q = btoa(daftaridPajak);
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/pajak_reklame/cetakskpd/?data=' + q);
	}

	function getLastNoUrut() {
		var tahun = $("#TBLPENDATAAN_THNPAJAK").val();
		var jnsrek = $("#TBLDAFTREKLAME_JNSREKLAME").val();
		$.post('penetapan/pajak_reklame/GetNoNotaAkhir', {tahun: tahun, jnsrek: jnsrek}, function(respon) {
			$("#TBLDAFTREKLAME_URUTSKPD").val(respon.NOMORURUT);
			if (respon=='') {
				$('#TBLDAFTREKLAME_URUTSKPD').val(1);
				}
				else {
					$('#TBLDAFTREKLAME_URUTSKPD').val(respon.NOMORURUT);
					if ($('#TBLDAFTREKLAME_TGLBATASSKPD').val()=='') {
						$("#TBLDAFTREKLAME_TGLSKPD").trigger('change');
					}
				}	
		},'json');		
	}

	function cetakNota() {
		var q = btoa(daftaridPajak);
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/pajak_reklame/cetakskpd/?data=' + q);
	}

	function cetakDaftar() {
		var q = btoa(daftaridPajak);
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/pajak_reklame/cetakskpd/?data=' + q);
	}

	function cetakSKPD() {
		var q = btoa(daftaridPajak);
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/pajak_reklame/cetakskpd/?data=' + q);
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
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/pajak_reklame/cetaknotaword/?data=' + q +"&TBLDAFTREKLAME_JNSREKLAME="+window.TBLDAFTREKLAME_JNSREKLAME+"&TGLENTRI="+window.TGLENTRI);
	}

	function cetakDaftarWord() {
		var q = btoa(daftaridPajak);
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/pajak_reklame/cetakdaftarword/?data=' + q);
	}

	function cetakSKPDWord() {
		var q = btoa(daftaridPajak);
		// window.open('<?= Yii::app()->getBaseUrl(1); ?>/penetapan/pajak_reklame/cetakskpdword/?data=' + q);
		$('#skpd-reklame').val(q);
		$('#form-skpd-reklame').submit();
	}

</script>
<style type="text/css">
	.disabled {
		background: #ddd !important;
	}
</style>
<?php define('ASSETS_URL', 'themes/smartadmin')?>

<div class="well well-sm well-light text-center">
	<h4><i class="fa fa-tasks"></i> Nota Perhitungan Hiburan</h4>
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
					<form class="smart-form" novalidate="novalidate" id="form-pencarian-hiburan">
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
										<p>Tanggal Pajak </p>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input type="number" onchange="getNoNota(this.value)" name="param[TBLPENDATAAN_THNPAJAK]" id="TBLPENDATAAN_THNPAJAK">
										</label>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select" id="TBLPENDATAAN_BLNPAJAK" name="TBLPENDATAAN_BLNPAJAK">
												<option value="">-- Pilih Bulan --</option>
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
											</select><i></i>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Nomor Nota </p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" value="<?= $data['last_nota'] ?>" id="TBLDAFTHIBURAN_URUTSKPD" name="param[TBLDAFTHIBURAN_URUTSKPD]">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan </p>
									</section>
									<section class="col col-md-3">
										<label class="select">
										<select id="TBLKECAMATAN_ID" name="TBLKECAMATAN_ID" class="select2">
											<option value="" selected="">-- Pilih Kecamatan --</option>
											<?php foreach ($data['kecamatan'] as $list): ?>
												<option value="<?php echo $list['REFKECAMATAN_ID'] ?>">[<?php echo $list['REFKECAMATAN_ID'] ?>] <?php echo $list['REFKECAMATAN_NAMA'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
									</section>
								</div>

								<br>

								<div class="row">
									<section class="col col-md-2">
										<p>Dengan Cara</p>
									</section>
									<section class="col col-md-3">
										<label class="select">
										<select id="TBLDAFTHIBURAN_ISJNSPENETAPAN" name="param[TBLDAFTHIBURAN_ISJNSPENETAPAN]" class="select2">
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
											<input type="text" placeholder="Pilih Tanggal" name="param[TBLDAFTHIBURAN_TGLENTRI]" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTHIBURAN_TGLENTRI">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Cetak SKPD</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" placeholder="Pilih Tanggal" name="param[TBLDAFTHIBURAN_TGLSKPD]" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTHIBURAN_TGLSKPD">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Batas SKPD</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" placeholder="Pilih Tanggal" name="TBLDAFTHIBURAN_TGLBATASSKPD" class="datepicker" value="" data-dateformat="dd-mm-yy" id="TBLDAFTHIBURAN_TGLBATASSKPD">
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
								<button class="btn btn-sm btn-primary" onclick="tetapkan()" type="button">
									<i class="fa fa-forward"></i> Proses
								</button>

								<button type="button" class="btn btn-success" onclick="cetak_nota()">
									<i class="fa fa-print"></i> Cetak Nota
								</button>

								<button type="button" class="btn btn-success" onclick="cetak_daftar()">
									<i class="fa fa-print"></i> Cetak Daftar
								</button>

								<button type="button" class="btn btn-success" onclick="cetak_skpd()">
									<i class="fa fa-print"></i> Cetak SKPD
								</button>

							</div>
							<div id="kontrol_table" style="overflow-y: scroll;overflow-x: scroll;height: 300px;width: 100%;">
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
									<!-- ,Kel. --> <label id="TBLKELURAHAN_NAMA"></label>, <!-- Kec. --> <label id="REFKECAMATAN_NAMA"></label>
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

<script type="text/javascript">
	pageSetUp();
	window.id_eksepsi = '';

	function setMoment() {
		moment.locale('id');
		$("#TBLDAFTHIBURAN_TGLSKPD").trigger('change');
	}

	jQuery(document).ready(function($) {
		getNoNota('<?= date('Y') ?>');
	});

	jQuery(document).ready(function($) {
		getNoNota('<?= date('Y') ?>');
		//loadDataTable();

		window.today = new Date();
		window.dd = today.getDate();
		window.mm = today.getMonth()+1; //January is 0!
		window.yyyy = today.getFullYear();

		if(window.dd<10) {
		    window.dd='0'+window.dd
		} 

		if(window.mm<10) {
		    window.mm='0'+window.mm
		} 

		today = window.dd+'-'+window.mm+'-'+window.yyyy;

		$('#TBLPENDATAAN_THNPAJAK').val(window.yyyy);
		$('#TBLDAFTHIBURAN_TGLSKPD').val(today);

		setPriceFormat();
		setMoment();
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

	function loadDataTable() {
		var param = {
			id_eksepsi : window.id_eksepsi
		};

		$.ajax({
			url: 'penetapan/pajak_hiburan/cari',
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

		/*jQuery(document).ready(function($) {
		LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';
		$("#dialog-message").modal('hide');
		$("#dialog-message").dialog({
			autoOpen : false,
			modal : true,
			title: "Mentransfer Data",
		});


		window.today = new Date();
		window.dd = today.getDate();
		window.mm = today.getMonth()+1; //January is 0!
		window.yyyy = today.getFullYear();

		if(window.dd<10) {
		    window.dd='0'+window.dd
		} 

		if(window.mm<10) {
		    window.mm='0'+window.mm
		} 

		today = window.dd+'-'+window.mm+'-'+window.yyyy;

		// $('#TBLDAFTHIBURAN_TGLSKPD').val(today);

		setPriceFormat();
	});*/

	function loadingTransfer(ev) {
		/*ev{open|close}*/
		$('#dialog-message').dialog(ev);
		$(".ui-dialog-titlebar-close").hide();
	}

	function cari() {
		var THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
		var BLNPAJAK = $('#TBLPENDATAAN_BLNPAJAK').val();
		var TGLBATASSKPD = $('#TBLDAFTHIBURAN_TGLBATASSKPD').val();
		// var TGLBATASSKPD = $('#TBLDAFTHIBURAN_TGLBATASSKPD').val();
		var NOMORNOTA = $('#TBLDAFTHIBURAN_URUTSKPD').val();

		if (THNPAJAK=='' || BLNPAJAK=='') {
			notifikasi('Informasi','Mohon isikan Tahun dan Bulan','failed',1,0);
		}
		else if (TGLBATASSKPD=='') {
			notifikasi('Informasi','Mohon isikan Tanggal Batas SKPD','failed',1,0);
		}
		else if (NOMORNOTA=='') {
			notifikasi('Informasi','Mohon isikan Nomor Nota','failed',1,0);
		}
		else{
			$("html, body").animate({ scrollTop: 800 }, "slow");
			$("#widget-grid-tetapan").slideDown(600);
			$("#kontrol_table").html(LOADER).fadeIn(400);
			var param = {
				id_eksepsi : window.id_eksepsi
			};
			$.ajax({
				url: 'penetapan/pajak_hiburan/GetData',
				type: 'POST',
				data:  $("#form-pencarian-hiburan").serialize()+'&'+jQuery.param(param),
				success: function(respon) {
					$('#kontrol_table').html(respon);
		            $("#kontrol_table").prepend('<div align="center">'+LOADER+'');
		            $(".loader_img").fadeOut(1000);
				}
			});
			
			$('#widget-grid-tetapan').show('fast');
		}
	}

	function tetapkan() {
		arridPajakHiburan = [];
		$("input[name='nopokPajakHiburan']:checked").each(function() {
			arridPajakHiburan.push(this.value);
		});

		count = 0;
		for(x in arridPajakHiburan) {
			count++;
		}

		if (count>0) {
			daftaridPajakHiburan = arridPajakHiburan.toString();

			$.SmartMessageBox({
			title : "Konfirmasi", // judul Smart Alert
			content : "Apakah anda yakin akan menetapkan data terpilih?", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'penetapan/pajak_hiburan/TetapkanPajakHiburan',
					type: 'POST',
					data: {
						listPajakHiburan: daftaridPajakHiburan
						,id_eksepsi : window.id_eksepsi
						,TBLPENDATAAN_THNPAJAK : $('#TBLPENDATAAN_THNPAJAK').val()
						,TBLPENDATAAN_BLNPAJAK : $('#TBLPENDATAAN_BLNPAJAK').val()
						,TBLDAFTHIBURAN_TGLSKPD : $('#TBLDAFTHIBURAN_TGLSKPD').val()
						,TBLDAFTHIBURAN_TGLBATASSKPD : $('#TBLDAFTHIBURAN_TGLBATASSKPD').val()
					},
					beforeSend: function() {
						loadingTransfer('open');
						$("#dialog-message").modal('show');
					},
					success: function(respon) {
						setTimeout(function() {
							loadingTransfer('close');
							$("#dialog-message").modal('hide');
							cari();
						}, 500);
					}
				});
			}
		});

		} else {
			notifikasi('Informasi','Mohon pilih Data yg akan di transfer ke Penetapan, dengan mencentang Data.','fail',1,0)
		}

		return false;
	}

	/*function cari() {
		window.cari_tblobyek_ispengukuhan = $("#cari_tblobyek_ispengukuhan").val()!=null ? $("#cari_tblobyek_ispengukuhan").val() : "";
		$("#widget-grid-tetapan").show();
		$("html, body").animate({ scrollTop: $("#widget-grid-tetapan").offset().top-100 }, "slow");
		loadDataTable();
	}*/

	/*$("#TBLPENDATAAN_THNPAJAK").change(function(event) {
		getLastNoUrut(this.value);
	});

	function getLastNoUrut(tahun) {
		$.post('penetapan/pajak_hiburan/GetNoNotaAkhir', {tahun: tahun}, function(respon) {
			$("#TBLDAFTHIBURAN_URUTSKPD").val(respon.NOMORURUT);	
		},'json');		
	}*/

	$("#TBLDAFTHIBURAN_TGLSKPD").change(function(event) {
		var tglbatas = moment( $("#TBLDAFTHIBURAN_TGLSKPD").val().split("-").reverse().join("-") ).add(1, "months");
		$("#TBLDAFTHIBURAN_TGLBATASSKPD").val( tglbatas.format('L') );
	});

	function getNoNota(tahun) {
		$.ajax({
			url: 'penetapan/pajak_hiburan/GetNoNotaAkhir',
			type: 'POST',
			dataType: 'json',
			data: {
				tahun: tahun
			},
			success: function(respon) {
				if (respon=='') {
					$('#TBLDAFTHIBURAN_URUTSKPD').val(1);
					
				}
				else{
					$('#TBLDAFTHIBURAN_URUTSKPD').val(respon.NOMORURUT);
					if ($('#TBLDAFTHIBURAN_TGLBATASSKPD').val()=='') {
						$("#TBLDAFTHIBURAN_TGLSKPD").trigger('change');
					}
				}
			}
		});
		
	}

</script>
<style type="text/css">
	.disabled {
		background: #ddd !important;
	}
</style>
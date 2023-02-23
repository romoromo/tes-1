<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Pendaftaran Wajib Pajak Baru Pribadi</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-pribadi" 
			data-widget-editbutton="false"
			data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-colorbutton="false"	
			data-widget-togglebutton="false"			
			>
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
					<h2>Form Entry</h2>

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
						
						<form action="" id="form-pendaftaran-pribadi" class="smart-form" novalidate>
							<fieldset>
								<div class="row">
									<section class="col col-md-2">
										<p>Nomor Pokok </p>
									</section>
									<section class="col col-md-6">
										<label class="input">
											<input class="input-sm" value="<?= $data['last_nopok'] ?>" type="text" id="TBLDAFTAR_NOPOK" name="param[TBLDAFTAR_NOPOK]">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Jenis Penerimaan </p>
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select class="select2" id="TBLDAFTAR_JENISPENDAPATAN" name="param[TBLDAFTAR_JENISPENDAPATAN]">
												<option selected="" disabled="">== Silahkan Pilih ==</option>
												<option value="P">Pajak</option>
												<option value="R">Retribusi</option>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Golongan </p>
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select class="select2" onchange="setRekening(this.value)" id="TBLDAFTAR_GOLONGAN" name="param[TBLDAFTAR_GOLONGAN]">
												<option selected="" value="">-- Pilih Golongan --</option>
												<option value="1">1</option>
												<!-- <option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option> -->
											</select>
										</label>
									</section>
									<section class="col col-md-1">
										<p>Formulir </p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="TBLDAFTAR_NOFORMULIR" name="param[TBLDAFTAR_NOFORMULIR]">
										</label>
									</section>
								</div>

								<header style="border-color: red;">Perorangan</header><br>
								<div class="row">
									<section class="col col-md-2">
										<p>Nama </p>
									</section>
									<section class="col col-md-6">
										<label class="input">
											<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKNAMA" name="param[TBLDAFTAR_PEMILIKNAMA]">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Alamat</p>
									</section>
									<section class="col col-md-6">
										<label class="textarea"> 										
											<textarea rows="3" name="param[TBLDAFTAR_PEMILIKALAMAT]" id="TBLDAFTAR_PEMILIKALAMAT"></textarea> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Rt/Rw </p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" maxlength="5" type="text" id="TBLDAFTAR_PEMILIKRTRW" name="param[TBLDAFTAR_PEMILIKRTRW]">
										</label>
									</section>
									<section class="col col-md-1">
										<p>No Telp </p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKTELP" name="param[TBLDAFTAR_PEMILIKTELP]">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-3">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select onchange="getKelurahan(this.value)" name="param[TBLKECAMATAN_IDPEMILIK]" id="TBLKECAMATAN_IDPEMILIK" class="select2" placeholder="--- Pilih Kecamatan---">
												<option value="" selected="">-- Pilih Kecamatan --</option>
												<?php foreach ($data['kec'] as $row_kec): ?>
													<option value="<?=$row_kec['REFKECAMATAN_ID']; ?>"><?=$row_kec['REFKECAMATAN_NAMA']; ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
									<section class="col col-md-1">
										<p>Kode Pos </p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" maxlength="5" type="text" id="TBLDAFTAR_PEMILIKKODEPOS" name="param[TBLDAFTAR_PEMILIKKODEPOS]">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Kelurahan</p>
									</section>
									<section class="col col-md-3">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select name="param[TBLKELURAHAN_IDPEMILIK]" onchange="getKodepos(this.value)" id="TBLKELURAHAN_IDPEMILIK" class="select2">
												<option value="">== Pilih Kecamatan ==</option>
											</select>
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">Kota</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKKOTA" name="param[TBLDAFTAR_PEMILIKKOTA]">
										</label>
									</section>
								</div>

								<header style="border-color: red;">Badan Usaha</header><br>
								<div class="row">
									<section class="col col-md-2">
										<p>Nama </p>
									</section>
									<section class="col col-md-6">
										<label class="input">
											<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHANAMA" name="param[TBLDAFTAR_BADANUSAHANAMA]">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Alamat</p>
									</section>
									<section class="col col-md-6">
										<label class="textarea"> 										
											<textarea rows="3" name="param[TBLDAFTAR_BADANUSAHAALAMAT]" id="TBLDAFTAR_BADANUSAHAALAMAT"></textarea> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Rt/Rw </p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" maxlength="5" type="text" id="TBLDAFTAR_BADANUSAHARTRW" name="param[TBLDAFTAR_BADANUSAHARTRW]">
										</label>
									</section>
									<section class="col col-md-1">
										<p>No Telp </p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHATELPAREA" name="param[TBLDAFTAR_BADANUSAHATELPAREA]">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-3">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select onchange="getKelurahan2(this.value)" id="TBLKECAMATAN_IDBADANUSAHA" name="param[TBLKECAMATAN_IDBADANUSAHA]" class="select2">
												<option value="" selected="">-- Pilih Kecamatan --</option>
												<?php foreach ($data['kec'] as $row_kec): ?>
													<option value="<?=$row_kec['REFKECAMATAN_ID']; ?>"><?=$row_kec['REFKECAMATAN_NAMA']; ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
									<section class="col col-md-1">
										<p>Kode Pos </p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" maxlength="5" type="text" id="TBLDAFTAR_BADANUSAHAKODEPOS" name="param[TBLDAFTAR_BADANUSAHAKODEPOS]">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kelurahan</p>
									</section>
									<section class="col col-md-3">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select name="param[TBLKELURAHAN_IDBADANUSAHA]" onchange="getKodepos2(this.value)" id="TBLKELURAHAN_IDBADANUSAHA" class="select2">
												<option value="">== Pilih Kelurahan ==</option>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">Kota</section>
									<section class="col col-md-3">
										<label class="input">
											<input value="KOTA YOGYAKARTA" class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHAKOTA" name="param[TBLDAFTAR_BADANUSAHAKOTA]">
										</label>
									</section>
								</div>

								<header style="border-color: red;">Pendataan Pribadi</header><br>
								<div class="row">
									<section class="col col-md-2">
										<p>Bidang Usaha </p>
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select class="select2" id="REFBADANUSAHA_IDBADANUSAHA" name="param[REFBADANUSAHA_IDBADANUSAHA]">
													<option value="">== Silahkan Pilih Rekening ==</option>
											</select> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Pengukuhan </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" value="<?php echo date('d-m-Y'); ?>" name="param[TBLDAFTAR_TANGGALKUKUH]" class="datepicker " data-dateformat="dd-mm-yy" id="TBLDAFTAR_TANGGALKUKUH">
										</label>
									</section>
									<section class="col col-md-2">
										<p>No Pengukuhan </p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="TBLDAFTAR_NOKUKUH" name="param[TBLDAFTAR_NOKUKUH]">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Formulir Diterima </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" value="<?php echo date('d-m-Y'); ?>" name="param[TBLDAFTAR_TANGGALTERIMADAFTAR]" class="datepicker " data-dateformat="dd-mm-yy" id="TBLDAFTAR_TANGGALTERIMADAFTAR">
										</label>
									</section>
									<section class="col col-md-2">
										<p>Cara Perhitungan </p>
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select class="select2" name="param[TBLDAFTAR_ISJENISPENDAFTARAN]" id="TBLDAFTAR_ISJENISPENDAFTARAN">
												<option selected="" disabled="">== Silahkan Pilih ==</option>
												<option value="O">Official Assessment</option>
												<option value="S">Self Assessment</option>
											</select> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Formulir Entry </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" value="<?php echo date('d-m-Y'); ?>" name="param[TBLDAFTAR_TANGGALENTRYDAFTAR]" class="datepicker " data-dateformat="dd-mm-yy" id="TBLDAFTAR_TANGGALENTRYDAFTAR">
										</label>
									</section>
								</div>

							</fieldset>		
							<footer>
									<button type="submit" class="btn btn-sm btn-primary btnsimpan">
										<i class="fa fa-floppy-o"></i>&nbsp;Simpan
									</button>
									<button type="button" class="btn btn-warning dropdown-toggle" disabled="disabled">
										<i class="fa fa-print"></i> Cetak Kartu
									</button>
									<button type="button" type="button" class="btn btn-sm btn-default" data-dismiss="modal">
										<i class="fa fa-ban"></i>	Batal
									</button>
								</div>
							</footer>				
						</form>

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
</section>


<script type="text/javascript">
	pageSetUp();

	/*form validation*/
	  loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	  	function runFormValidation() {
	    	var $FormData = $("#form-pendaftaran-pribadi").validate({
	          // Rules for form validation
	          rules : {
	            "param[TBLDAFTAR_NOPOK]" : {
	              required : true
	            }
	            ,"param[TBLDAFTAR_JENISPENDAPATAN]" : {
	              required : true
	            }
	            ,"param[TBLDAFTAR_NOFORMULIR]" : {
	              required : true
	            }
	            ,"param[TBLDAFTAR_PEMILIKNAMA]" : {
	              required : true
	            }
	            ,"param[TBLDAFTAR_PEMILIKALAMAT]" : {
	            	required : true
	            }
	            ,"param[TBLDAFTAR_PEMILIKRTRW]" : {
	            	required : true
	            }
	            ,"param[TBLKECAMATAN_IDPEMILIK]" : {
	            	required : true
	            }
	            ,"param[TBLDAFTAR_BADANUSAHANAMA]" : {
	            	required : true
	            }
	            ,"param[TBLDAFTAR_ISJENISPENDAFTARAN]" : {
	            	required : true
	            }
	        },
	          // Messages for form validation
	          messages : {
	          	"param[TBLDAFTAR_NOPOK]" : {
	          		required : 'Mohon isikan Nomor Pokok WP'
	          	}
	          	,"param[TBLDAFTAR_JENISPENDAPATAN]" : {
	          		required : 'Mohon isikan Jenis Pendaftaran'
	          	}
	          	,"param[TBLDAFTAR_NOFORMULIR]" : {
	          		required : 'Mohon isikan Nomor Formulir'
	          	}
	          	,"param[TBLDAFTAR_PEMILIKNAMA]" : {
	          		required : 'Mohon isikan Nama Pemilik'
	          	}
	          	,"param[TBLDAFTAR_PEMILIKALAMAT]" : {
	          		required : 'Mohon isikan Alamat Pemilik'
	          	}
	          	,"param[TBLDAFTAR_PEMILIKRTRW]" : {
	          		required : 'Mohon isikan RT/RT Pemilik'
	          	}
	          	,"param[TBLKECAMATAN_IDPEMILIK]" : {
	          		required : 'Mohon pilih Kecamatan'
	          	}
	          	,"param[TBLDAFTAR_BADANUSAHANAMA]" : {
	          		required : 'Mohon isikan Nama Badan Usaha'
	          	}
	          	,"param[TBLDAFTAR_ISJENISPENDAFTARAN]" : {
	          		required : 'Mohon pilih Jenis Pendaftaran'
	          	}

	          },


	          // Do not change code below
	          errorPlacement : function(error, element) {
	            error.insertAfter(element.parent());
	          },
	          submitHandler : function(form) {
	            // saat validasi benar semua, jalankan simpan()
	            return simpanpendaftaran();
	          }
	        });

	  	};
  	/*//form validation*/

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
		CekNoPok();
	});

	function setRekening(val) {
		$.ajax({
			url: 'pendaftaran/wp_pribadi/setRekening',
			type: 'POST',
			dataType: 'html',
			data: {value: val},
			success: function(respon) {
				$('#REFBADANUSAHA_IDBADANUSAHA').html(respon);
			}
		})
	}

	function getKelurahan(val) {
		$.ajax({
			url: 'pendaftaran/wp_pribadi/getKelurahan',
			type: 'POST',
			dataType: 'html',
			data: {value: val},
			success: function(respon) {
				$('#TBLKELURAHAN_IDPEMILIK').html(respon);
			}
		})
	}

	function getKelurahan2(val) {
		$.ajax({
			url: 'pendaftaran/wp_pribadi/getKelurahan2',
			type: 'POST',
			dataType: 'html',
			data: {value: val},
			success: function(respon) {
				$('#TBLKELURAHAN_IDBADANUSAHA').html(respon);
			}
		})
	}

	function getKodepos(val) {
		$.ajax({
			url: 'pendaftaran/wp_pribadi/getKodepos',
			type: 'POST',
			dataType: 'json',
			data: {value: val},
			success: function(respon) {
				$('#TBLDAFTAR_PEMILIKKODEPOS').val(respon.kodepos);
			}
		})
	}

	function getKodepos2(val) {
		$.ajax({
			url: 'pendaftaran/wp_pribadi/getKodepos2',
			type: 'POST',
			dataType: 'json',
			data: {value: val},
			success: function(respon) {
				$('#TBLDAFTAR_BADANUSAHAKODEPOS').val(respon.kodepos);
			}
		})
	}

	function simpanpendaftaran () {
		$.ajax({
			url: 'pendaftaran/wp_pribadi/SimpanPendaftaran',
			type: 'post',
			dataType: "json",
			data:  $("#form-pendaftaran-pribadi").serialize(),
			success: function(data) {
				if (data.status=="success") {
					notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
					$("#form-pendaftaran-pribadi")[0].reset();
					$("#form-pendaftaran-pribadi .select2").select2('val', '');
				}
				else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
				}
			}
		});
	}

	$("#TBLDAFTAR_BADANUSAHANAMA, #TBLDAFTAR_BADANUSAHAALAMAT, #TBLDAFTAR_PEMILIKNAMA, #TBLDAFTAR_PEMILIKALAMAT, #TBLDAFTAR_BADANUSAHAKOTA, #TBLDAFTAR_PEMILIKKOTA").keyup(function(evt){
		$(evt.target).val($(evt.target).val().toUpperCase())
	})

	function CekNoPok() {
		$.ajax({
			url: 'pendaftaran/wp_pribadi/CekNoPok',
			type: 'POST',
			dataType: 'json',
			data: {nopok: $("#TBLDAFTAR_NOPOK").val()},
		})
		.done(function(respon) {
			if ('exists'==respon.status) {
				notifikasi('Informasi', 'Nomor Pokok sudah dipakai, gunakan nomor lain', 'f', 1,0);
				$(".btnsimpan").attr('disabled', 1);
			} else {
				$(".btnsimpan").removeAttr('disabled');
			}
		})
	}

	$("#TBLDAFTAR_NOPOK").change(function(event) {
		$.ajax({
			url: 'pendaftaran/wp_pribadi/CekNoPok',
			type: 'POST',
			dataType: 'json',
			data: {nopok: $("#TBLDAFTAR_NOPOK").val()},
		})
		.done(function(respon) {
			if ('exists'==respon.status) {
				notifikasi('Informasi', 'Nomor Pokok sudah dipakai, gunakan nomor lain', 'f', 1,0);
				$(".btnsimpan").attr('disabled', 1);
			} else {
				$(".btnsimpan").removeAttr('disabled');
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	});


	// function simpan () {
	// 	$.smallBox({
	// 		title : "Success",
	// 		content : "<i class='fa fa-save'></i><i> Data Berhasil Disimpan</i>",
	// 		color : "#296191",
	// 		iconSmall : "fa fa-thumbs-up bounce animated",
	// 		timeout : 1000			
	// 	});
	// }


</script>
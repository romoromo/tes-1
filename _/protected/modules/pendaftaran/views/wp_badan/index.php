<?php
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Pendaftaran Wajib Pajak Baru Badan</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-badan"
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

						<form action="" id="form-pendaftaran-badan" class="smart-form" novalidate>
							<fieldset>
								<div class="row">
									<section class="col col-md-2">
										<p>Nomor Pokok </p>
									</section>
									<section class="col col-md-6">
										<label class="input">
											<input value="<?= $data['last_nopok'] ?>" class="input-sm" type="number" id="TBLDAFTAR_NOPOK" name="param[TBLDAFTAR_NOPOK]">
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
												<option value="P" selected="selected">Pajak</option>
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
											<select class="select2" onchange="setRekening(this.value);cek_golongan();" id="TBLDAFTAR_GOLONGAN" name="param[TBLDAFTAR_GOLONGAN]">
												<option selected="" value="">-- Pilih Golongan --</option>
												<!-- <option selected="" value="1">1</option> -->
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
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
											<input class="input-sm" maxlength="30" type="text" id="TBLDAFTAR_PEMILIKNAMA" name="param[TBLDAFTAR_PEMILIKNAMA]">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>NIK </p>
									</section>
									<section class="col col-md-6">
										<label class="input">
											<input class="input-sm" maxlength="20" type="text" data-mask="9999999999999999" id="TBLDAFTAR_NIK" name="param[TBLDAFTAR_NIK]">
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
											<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKRTRW" name="param[TBLDAFTAR_PEMILIKRTRW]">
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
	                                   Provinsi
	                                </section>
	                                <section class="col col-md-3">
	                                    <label class="select">
	                                    <select id="TBLPROVINSI_KODE" name="param[TBLPROVINSI_KODE]" class="select2">
	                                            <option value="" selected="">=== Pilih Provinsi ===</option>
	                                            <?php foreach ($data['provinsi'] as $row_prov): ?>
	                                                <option value="<?=$row_prov['TBLPROVINSI_KODE']; ?>"><?=$row_prov['TBLPROVINSI_NAMA']; ?></option>
	                                            <?php endforeach ?>
	                                        </select>
	                                    </label>
	                                </section>
								</div>
								<div class="row">
									 <section class="col col-md-2">
	                                   Kabupaten
	                                </section>
	                                <section class="col col-md-3">
	                                    <label class="select">
	                                    <select id="TBLKABUPATEN_KODE" name="param[TBLKABUPATEN_KODE]" class="select2" onchange="$('input[id=TBLDAFTAR_PEMILIKKOTA]').val(this[selectedIndex].text);">
	                                            <option value="" selected="">=== Pilih Kabupaten ===</option>
	                                        </select>
	                                    </label>
	                                </section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-3">
										<label class="select">
	                                    <select id="TBLKECAMATAN_KODE" name="param[TBLKECAMATAN_KODE]" class="select2">
	                                            <option value="" selected="">=== Pilih Kecamatan ===</option>
	                                        </select>
	                                    </label>
									</section>
									<section class="col col-md-1">
										<p>Kode Pos </p>
									</section>
									<section class="col col-md-2">
	                                    <label for="address" class="input">
	                                        <input type="text" id="TSUBYEK_BUKODEPOS" name="param[TSUBYEK_BUKODEPOS]">
	                                    </label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Kelurahan</p>
									</section>
									<section class="col col-md-3">
										<label class="select">
		                                    <select id="TBLKELURAHAN_KODE" name="param[TBLKELURAHAN_KODE]" class="select2">
	                                            <option value="" selected="">=== Pilih Kelurahan ===</option>
	                                        </select>
	                                    </label>
									</section>
								</div>

								<div class="row" style="display:none;">
									<section class="col col-md-2">Kota</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKKOTA" name="param[TBLDAFTAR_PEMILIKKOTA]" value="KOTA YOGYAKARTA">
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
											<input class="input-sm" maxlength="30" type="text" id="TBLDAFTAR_BADANUSAHANAMA" name="param[TBLDAFTAR_BADANUSAHANAMA]">
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
										<p>Izin Usaha </p>
									</section>
									<section class="col col-md-6">
										<label class="input">
											<input class="input-sm" maxlength="100" type="text" id="TBLDAFTAR_NIB" name="param[TBLDAFTAR_NIB]">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Rt/Rw </p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHARTRW" name="param[TBLDAFTAR_BADANUSAHARTRW]">
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
								<?php /*?><div class="row">
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
											<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHAKODEPOS" name="param[TBLDAFTAR_BADANUSAHAKODEPOS]">
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
								</div><?php */?>
								<div class="row">
									<section class="col col-md-2">
	                                   <p>Provinsi</p>
	                                </section>
	                                <section class="col col-md-3">
	                                    <label class="select">
	                                    <select id="TBLPROVINSI_KODEBADANUSAHA" name="param[TBLPROVINSI_KODEBADANUSAHA]" class="select2">
	                                            <option value="" selected="">=== Pilih Provinsi ===</option>
	                                            <?php foreach ($data['provinsi'] as $row_prov): ?>
	                                                <option value="<?=$row_prov['TBLPROVINSI_KODE']; ?>"><?=$row_prov['TBLPROVINSI_NAMA']; ?></option>
	                                            <?php endforeach ?>
	                                        </select>
	                                    </label>
	                                </section>
								</div>
								<div class="row">
									 <section class="col col-md-2">
	                                   <p>Kabupaten</p>
	                                </section>
	                                <section class="col col-md-3">
	                                    <label class="select">
	                                    <select id="TBLKABUPATEN_KODEBADANUSAHA" name="param[TBLKABUPATEN_KODEBADANUSAHA]" class="select2" onchange="$('input[id=TBLDAFTAR_BADANUSAHAKOTA]').val(this[selectedIndex].text);">
	                                            <option value="" selected="">=== Pilih Kabupaten ===</option>
	                                        </select>
	                                    </label>
	                                </section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-3">
										<label class="select">
	                                    <select id="TBLKECAMATAN_KODEBADANUSAHA" name="param[TBLKECAMATAN_KODEBADANUSAHA]" class="select2">
	                                            <option value="" selected="">=== Pilih Kecamatan ===</option>
	                                        </select>
	                                    </label>
									</section>
									<section class="col col-md-1">
										<p>Kode Pos </p>
									</section>
									<section class="col col-md-2">
	                                    <label for="address" class="input">
	                                        <input type="text" id="TBLDAFTAR_BADANUSAHAKODEPOS" name="param[TBLDAFTAR_BADANUSAHAKODEPOS]">
	                                    </label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Kelurahan</p>
									</section>
									<section class="col col-md-3">
										<label class="select">
		                                    <select id="TBLKELURAHAN_KODEBADANUSAHA" name="param[TBLKELURAHAN_KODEBADANUSAHA]" class="select2">
	                                            <option value="" selected="">=== Pilih Kelurahan ===</option>
	                                        </select>
	                                    </label>
									</section>
									<section class="col col-md-1">
										<p>E - Mail</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="TBLDAFTAR_EMAIL" name="param[TBLDAFTAR_EMAIL]">
										</label>
									</section>
								</div>
								
								<div class="row">
									<section class="col col-md-2">Kota</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHAKOTA" name="param[TBLDAFTAR_BADANUSAHAKOTA]" value="KOTA YOGYAKARTA">
										</label>
									</section>
								</div>

								<header style="border-color: red;">Pendataan badan</header><br>
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
									<button id="btnsimpan" type="submit" class="btn btn-sm btn-primary btnsimpan">
										<i class="fa fa-floppy-o"></i>&nbsp;Simpan
									</button>
									<button type="button" class="btn btn-warning dropdown-toggle" id="CETAK_KARTU">
										<i class="fa fa-print"></i> Cetak Kartu
									</button>
									<button type="button" class="btn btn-sm btn-default" data-dismiss="modal" onblur="reset_form();">
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
	    	var $FormData = $("#form-pendaftaran-badan").validate({
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
	            ,"param[TBLKECAMATAN_IDPEMILIK]" : {
	            	required : true
	            }
	            ,"param[TBLDAFTAR_BADANUSAHANAMA]" : {
	            	required : true
	            }
	            ,"param[TBLDAFTAR_ISJENISPENDAFTARAN]" : {
	            	required : true
	            }
				,"param[REFBADANUSAHA_IDBADANUSAHA]" : {
	            	required : true
	            }
	            ,"param[TBLDAFTAR_NIK]" : {
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
	          	,"param[TBLKECAMATAN_IDPEMILIK]" : {
	          		required : 'Mohon pilih Kecamatan'
	          	}
	          	,"param[TBLDAFTAR_BADANUSAHANAMA]" : {
	          		required : 'Mohon isikan Nama Badan Usaha'
	          	}
	          	,"param[TBLDAFTAR_ISJENISPENDAFTARAN]" : {
	          		required : 'Mohon pilih Jenis Pendaftaran'
	          	}
				,"param[REFBADANUSAHA_IDBADANUSAHA]" : {
	            	required : 'Mohon pilih Bidang Usaha'
	            }
	            ,"param[TBLDAFTAR_NIK]" : {
	          		required : 'Mohon isikan No. KTP/NIK Pemilik'
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
		setDefaultDistrict();
		CekNoPok();
	});

	function setRekening(val) {
		$.ajax({
			url: 'pendaftaran/wp_badan/setRekening',
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
			url: 'pendaftaran/wp_badan/getKelurahan',
			type: 'POST',
			dataType: 'html',
			data: {value: val},
			success: function(respon) {
				$('#TBLKELURAHAN_IDPEMILIK').html(respon);
			}
		})
	}

	function getKodepos(val) {
		$.ajax({
			url: 'pendaftaran/wp_badan/getKodepos',
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
			url: 'pendaftaran/wp_badan/getKodepos2',
			type: 'POST',
			dataType: 'json',
			data: {value: val},
			success: function(respon) {
				$('#TBLDAFTAR_BADANUSAHAKODEPOS').val(respon.kodepos);
			}
		})
	}

	function getKelurahan2(val) {
		$.ajax({
			url: 'pendaftaran/wp_badan/getKelurahan2',
			type: 'POST',
			dataType: 'html',
			data: {value: val},
			success: function(respon) {
				$('#TBLKELURAHAN_IDBADANUSAHA').html(respon);
			}
		})
	}

	function simpanpendaftaran () {
		//$("#btnsimpan").attr('disabled', true);
		$('#CETAK_KARTU').removeAttr('onclick');
		var addparam = window.addparam = {
			kodekec : $('#TBLKECAMATAN_KODE option:selected').attr('kodekec')
			,kodekel : $('#TBLKELURAHAN_KODE option:selected').attr('kodekel')
			,kodekec_bu : $('#TBLKECAMATAN_KODEBADANUSAHA option:selected').attr('kodekec')
			,kodekel_bu : $('#TBLKELURAHAN_KODEBADANUSAHA option:selected').attr('kodekel')
			,nopoknya : $('#TBLDAFTAR_NOPOK').val()
		};
		$.ajax({
			url: 'pendaftaran/wp_badan/SimpanPendaftaran',
			type: 'post',
			dataType: "json",
			data:  $("#form-pendaftaran-badan").serialize()+'&'+jQuery.param(addparam),
			success: function(data) {
				if (data.status=="success") {
					notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
					//$('#btnsimpan').attr('disabled',1);
					$("#btnsimpan").attr('disabled', true);
					$('#CETAK_KARTU').removeAttr('disabled');
					$('#TBLDAFTAR_BADANUSAHAKOTA').val('KOTA YOGYAKARTA');
					//$("#form-pendaftaran-badan")[0].reset();
					//$("#form-pendaftaran-badan .select2").select2('val', '');
					$('#CETAK_KARTU').attr('onclick', 'cetakKartu()');
				}
				else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
				}
			}
		});
	}

	function cetakKartu() {
		var param = {
			TBLDAFTAR_NOPOK : $("#TBLDAFTAR_NOPOK").val()
			,TBLDAFTAR_JENISPENDAPATAN : ''
			,TBLDAFTAR_GOLONGAN : ''
			,REFBADANUSAHA_ID : ''
			,TBLDAFTAR_ISAKTIF : ''
			,TBLDAFTAR_PEMILIKNAMA : ''
			,TBLKECAMATAN_IDPEMILIK : ''
			,TBLKELURAHAN_IDPEMILIK : ''
			,TBLDAFTAR_PEMILIKALAMAT : ''
			,TBLDAFTAR_BADANUSAHANAMA : ''
			,TBLKECAMATAN_IDBADANUSAHA : ''
			,TBLKELURAHAN_IDBADANUSAHA : ''
			,TBLDAFTAR_BADANUSAHAALAMAT : ''
		}
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendaftaran/cetak_kartu/cetak?'+jQuery.param(param));
	}

	$("#TBLDAFTAR_BADANUSAHANAMA, #TBLDAFTAR_BADANUSAHAALAMAT, #TBLDAFTAR_PEMILIKNAMA, #TBLDAFTAR_PEMILIKALAMAT, #TBLDAFTAR_PEMILIKKOTA").keyup(function(evt){
		$(evt.target).val($(evt.target).val().toUpperCase())
	})

	function CekNoPok() {
		$.ajax({
			url: 'pendaftaran/wp_badan/CekNoPok',
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


	// function simpan () {
	// 	$.smallBox({
	// 		title : "Success",
	// 		content : "<i class='fa fa-save'></i><i> Data Berhasil Disimpan</i>",
	// 		color : "#296191",
	// 		iconSmall : "fa fa-thumbs-up bounce animated",
	// 		timeout : 1000
	// 	});
	// }

	$("#TBLDAFTAR_BADANUSAHANAMA, #TBLDAFTAR_BADANUSAHAALAMAT, #TBLDAFTAR_PEMILIKNAMA, #TBLDAFTAR_PEMILIKALAMAT").keyup(function(evt){
		$(evt.target).val($(evt.target).val().toUpperCase())
	})

	$("#TBLDAFTAR_NOPOK").change(function(event) {
		$.ajax({
			url: 'pendaftaran/wp_badan/CekNoPok',
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

	$("#TBLPROVINSI_KODE").change(function(event) {
        getkabupaten('TBLKABUPATEN_KODE', $("#TBLPROVINSI_KODE").select2('val'));
        setComboList('TBLKECAMATAN_KODE', 'Kecamatan', []);
        setComboList('TBLKELURAHAN_KODE', 'Kelurahan', []);
        $("#TBLKABUPATEN_KODE").select2('val', '');
        $("#TBLKECAMATAN_KODE").select2('val', '');
        $("#TBLKELURAHAN_KODE").select2('val', '');
    });

	$("#TBLPROVINSI_KODEBADANUSAHA").change(function(event) {
        getkabupaten_bu('TBLKABUPATEN_KODEBADANUSAHA', $("#TBLPROVINSI_KODEBADANUSAHA").select2('val'));
        setComboList('TBLKECAMATAN_KODEBADANUSAHA', 'Kecamatan', []);
        setComboList('TBLKELURAHAN_KODEBADANUSAHA', 'Kelurahan', []);
        $("#TBLKABUPATEN_KODEBADANUSAHA").select2('val', '');
        $("#TBLKECAMATAN_KODEBADANUSAHA").select2('val', '');
        $("#TBLKELURAHAN_KODEBADANUSAHA").select2('val', '');
    });

    $("#TBLKABUPATEN_KODE").change(function(event) {
        getkecamatan('TBLKECAMATAN_KODE', $("#TBLKABUPATEN_KODE").select2('val'));
        setComboList('TBLKELURAHAN_KODE', 'Kelurahan', []);
        $("#TBLKECAMATAN_KODE").select2('val', '');
        $("#TBLKELURAHAN_KODE").select2('val', '');
    });

    $("#TBLKABUPATEN_KODEBADANUSAHA").change(function(event) {
        getkecamatan_bu('TBLKECAMATAN_KODEBADANUSAHA', $("#TBLKABUPATEN_KODEBADANUSAHA").select2('val'));
        setComboList('TBLKELURAHAN_KODEBADANUSAHA', 'Kelurahan', []);
        $("#TBLKECAMATAN_KODEBADANUSAHA").select2('val', '');
        $("#TBLKELURAHAN_KODEBADANUSAHA").select2('val', '');
    });

    $("#TBLKECAMATAN_KODE").change(function(event) {
        getkelurahan('TBLKELURAHAN_KODE', $("#TBLKECAMATAN_KODE").select2('val'));
        $("#TBLKELURAHAN_KODE").select2('val', '');
    });

    $("#TBLKECAMATAN_KODEBADANUSAHA").change(function(event) {
        getkelurahan_bu('TBLKELURAHAN_KODEBADANUSAHA', $("#TBLKECAMATAN_KODEBADANUSAHA").select2('val'));
        $("#TBLKELURAHAN_KODEBADANUSAHA").select2('val', '');
    });

    $("#TBLKELURAHAN_KODE").change(function(event) {
        setkodepos('TSUBYEK_BUKODEPOS', $("#TBLKECAMATAN_KODE option:selected").attr('nama'), $("#TBLKELURAHAN_KODE option:selected").attr('nama') );
    });

    $("#TBLKELURAHAN_KODEBADANUSAHA").change(function(event) {
        setkodepos_bu('TBLDAFTAR_BADANUSAHAKODEPOS', $("#TBLKECAMATAN_KODEBADANUSAHA option:selected").attr('nama'), $("#TBLKELURAHAN_KODEBADANUSAHA option:selected").attr('nama') );
    });

    function getkabupaten(elm, provkode, kabkode) {
        if (elm==null) {
            elm = 'TBLKABUPATEN_KODE';
        }
        setComboList(elm, 'Kabupaten', []);
        $.ajax({
            url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kabkota_by_prov',
            type: 'POST',
            dataType: 'json',
            data: {id: provkode},
            success: function (respon) {
                setComboList(elm, 'Kabupaten', respon);
                if (kabkode != null) 
                    $("#" + elm).select2('val', kabkode);
            }
        });
    }       

    function getkabupaten_bu(elm, provkode, kabkode) {
        if (elm==null) {
            elm = 'TBLKABUPATEN_KODEBADANUSAHA';
        }
        setComboList(elm, 'Kabupaten', []);
        $.ajax({
            url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kabkota_by_prov',
            type: 'POST',
            dataType: 'json',
            data: {id: provkode},
            success: function (respon) {
                setComboList(elm, 'Kabupaten', respon);
                if (kabkode != null) 
                    $("#" + elm).select2('val', kabkode);
            }
        });
    }       

    function getkecamatan(elm, kabkode, keckode) {
        if (elm==null) {
            elm = 'TBLKECAMATAN_KODE';
        }
        setComboList(elm, 'Kecamatan', []);
        $.ajax({
            url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kec_by_kabkota',
            type: 'POST',
            dataType: 'json',
            data: {id: kabkode},
            success: function (respon) {
                setComboList(elm, 'Kecamatan', respon);
                if (keckode != null) 
                    $("#" + elm).select2('val', keckode);
            }
        });
    }

    function getkecamatan_bu(elm, kabkode, keckode) {
        if (elm==null) {
            elm = 'TBLKECAMATAN_KODEBADANUSAHA';
        }
        setComboList(elm, 'Kecamatan', []);
        $.ajax({
            url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kec_by_kabkota',
            type: 'POST',
            dataType: 'json',
            data: {id: kabkode},
            success: function (respon) {
                setComboList(elm, 'Kecamatan', respon);
                if (keckode != null) 
                    $("#" + elm).select2('val', keckode);
            }
        });
    }

    function getkelurahan(elm, keckode, kelkode) {
        if (elm==null) {
            elm = 'TBLKELURAHAN_KODE';
        }
        setComboList(elm, 'Kelurahan', []);
        $.ajax({
            url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kel_by_kec',
            type: 'POST',
            dataType: 'json',
            data: {id: keckode},
            success: function (respon) {
                setComboList(elm, 'Kelurahan', respon);
                if (kelkode != null) 
                    $("#" + elm).select2('val', kelkode);
            }
        });
    }

    function getkelurahan_bu(elm, keckode, kelkode) {
        if (elm==null) {
            elm = 'TBLKELURAHAN_KODEBADANUSAHA';
        }
        setComboList(elm, 'Kelurahan', []);
        $.ajax({
            url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kel_by_kec',
            type: 'POST',
            dataType: 'json',
            data: {id: keckode},
            success: function (respon) {
                setComboList(elm, 'Kelurahan', respon);
                if (kelkode != null) 
                    $("#" + elm).select2('val', kelkode);
            }
        });
    }

    function setkodepos(elm, kec, kel) {
        $.ajax({
            url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kodepos_by_kec_kel',
            type: 'POST',
            dataType: 'json',
            data: {
                kec: kec
                , kel: kel
            },
            success:function (respon) {
                $('#' + elm).val(respon.POSTAL_CODE);
            }
        });
    }

    function setkodepos_bu(elm, kec, kel) {
        $.ajax({
            url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kodepos_by_kec_kel',
            type: 'POST',
            dataType: 'json',
            data: {
                kec: kec
                , kel: kel
            },
            success:function (respon) {
                $('#' + elm).val(respon.POSTAL_CODE);
            }
        });
    }

	function cek_golongan(){
        var provkode = '<?= AppConfig::model()->getValue('APLIKASI_PROVINSI_KODE') ?>';
        var kabkode = '<?= AppConfig::model()->getValue('APLIKASI_KABUPATEN_KODE') ?>';
		if($("#TBLDAFTAR_GOLONGAN").select2('val')=='3'){
			$("#TBLPROVINSI_KODEBADANUSAHA").select2('val', provkode)
			getkabupaten('TBLKABUPATEN_KODEBADANUSAHA', provkode, kabkode);
			getkecamatan('TBLKECAMATAN_KODEBADANUSAHA', kabkode);
        }
	}
    function setDefaultDistrict() {
        var provkode = '<?= AppConfig::model()->getValue('APLIKASI_PROVINSI_KODE') ?>';
        var kabkode = '<?= AppConfig::model()->getValue('APLIKASI_KABUPATEN_KODE') ?>';
        $("#TBLPROVINSI_KODE").select2('val', provkode)
        getkabupaten('TBLKABUPATEN_KODE', provkode, kabkode);
        getkecamatan('TBLKECAMATAN_KODE', kabkode);
        
        $("#TSUBYEK_MILIKPROVID").select2('val', provkode)
        getkabupaten('TSUBYEK_MILIKKABID', provkode, kabkode);
        getkecamatan('TSUBYEK_MILIKKECID', kabkode);
    }
	
	function reset_form(){
		$("#form-pendaftaran-badan")[0].reset();
		$("#form-pendaftaran-badan .select2").select2('val', '');
		$('#btnsimpan').removeAttr('disabled');
		reloadDT('dt_basic');
		CekNoPok();
		setDefaultDistrict();
	}

</script>
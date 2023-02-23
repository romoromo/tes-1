<div class="row">
	<article class="col-sm-12 col-md-12 col-lg-12" id="grid-formpendaftaran">
		<div class="jarviswidget" id="wid-id-lsfgof467" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> 
					<i class="fa fa-edit"></i>
					</span>
					<h2>Form Pencarian Pemilik/NPWPD</h2>
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
						<div id="form-identitas" class="smart-form">
							<fieldset>

								<div class="row">
									<section class="col col-2">
										<p>Pencarian Berdasarkan</p>
									</section>
									<section class="col col-4">
										<label class="select">
											<select id="pilih_jenis" name="pilih_jenis" onchange="pilih_jenis()">
												<option value="" selected="">Pilih Pencarian</option>
												<option value="1">Pemilik</option>
												<option value="2">NPWPD</option>
											</select> <i></i>
										</label>
									</section>
								</div>

								<div class="row" style="display: none;" id="form_npwpd">
									<section class="col col-2">
										NPWPD
									</section>
									<section class="col col-10">
										<label class="input">
											<input type="text" name="autoobyeknama" id="autoobyeknama" class="form-control" placeholder="Ketik NPWPD">
										</label>
									</section>
									<section class="col col-2">
									</section>
									<section class="col col-4" id="note_obyek">
										<label>
											<em>Tidak ditemukan?</em>
											<button id="btnTambahObyek" type="button" class="btn btn-sm btn-warning">
												<i class="fa fa-user"></i> Tambahkan Pemilik</button>
											</label>
									</section>
								</div>

								<div style="display: none;" class="row">
									<section class="col col-2">
										<p>Warga Negara  </p>
									</section>
									<section class="col col-4">
										<label class="select">
											<select id="status_wn" onchange="pilih_status_wn(this.value)">
												<option value="" selected="">Silahkan Pilih</option>
												<option value="WNI">WNI</option>
												<option value="WNA">WNA</option>
											</select> <i></i>
										</label>
									</section>
								</div>

								<div style="display:none" id="form_pemohon">
									<div class="row">
										<section class="col col-2">
											<p>Status Pemohon  </p>
										</section>
										<section class="col col-4">
											<label class="select">
												<select id="jenisusaha" name="jenisusaha" onchange="pilih_jenisusaha(this.value)">
													<option value="" selected="">Silahkan Pilih</option>
													<option value="Perorangan">Perorangan</option>
													<option value="Badan Usaha">Badan Usaha</option>
												</select> <i></i>
											</label>
										</section>
									</div>

									<div class="row" id="autosubyek">
										<section class="col col-2">
											<p>Identitas Pemilik  </p>
										</section>
										<section class="col col-10">
											<label class="input"> <i class="icon-append fa fa-user "></i>
												<input type="text" name="autosubyeknama" id="autosubyeknama" class="form-control" placeholder="Ketik nama subyek">
												<b class="tooltip tooltip-top-right">Ketikkan nama pemilik pajak</b>
											</label>
											<label><em>Cari dengan nama pemilik</em></label>
										</section>
										<section class="col col-2">
										</section>
										<section class="col col-4" id="note_pemilik">
											<label>
												<em>Tidak ditemukan?</em>
												<button id="btnTambahSubyek" type="button" class="btn btn-sm btn-warning">
													<i class="fa fa-user"></i> Tambahkan Pemilik</button>
												</label>
										</section>
									</div>

									<div id="formpemohon_daftar" style="display: none">
										<?php include_once 'form-npwpd.php'; ?>
									</div>

									<div id="formpemohon_daftar_npwpd" style="display: none">
										<?php include_once 'form-pemilik.php'; ?>
									</div>

									<div class="row" style="display:none" id="ktp">
										<section class="col col-2">
											<p>KTP  </p>
										</section>
										<section class="col col-4">
											<label class="input"> <i class="icon-append fa fa-credit-card "></i>
												<input type="text" name="idKTP" id="idKTP" class="form-control" data-mask="99.99.99.99.99.99.9999" data-mask-placeholder="">
												<b class="tooltip tooltip-bottom-right">Mohon Isikan Nomor KTP Pemohon</b>
											</label>
											<label><em>Contoh Format KTP : 31.02.01.440391.031.2</em></label>
										</section>
										<section class="col col-2">
											<a type="button" class="btn btn-sm btn-primary btn-isIdentity" data-typeidentity="PRIBADI" data-identityelm="idKTP">
												<i class="fa fa-search"></i> Cari
											</a>
										</section>
										<section class="col col-4" style="display:none" id="lengkap_ktp">Nama lengkap sesuai KTP</section>
									</div>

									<div class="row" style="display:none" id="passport">
										<section class="col col-2">
											<p>Passport  </p>
										</section>
										<section class="col col-4">
											<label class="input"> <i class="icon-append fa fa-credit-card "></i>
												<input type="text" name="idPassport" id="idPassport" class="form-control" data-mask="99.99.99.99.99.99.9999" data-mask-placeholder="">
												<b class="tooltip tooltip-bottom-right">Mohon Isikan Nomor Passport Pemohon</b>
											</label>
											<label><em>Contoh Format Passport : 31.02.01.440391.031.2</em></label>
										</section>
										<section class="col col-2">
											<a type="button" class="btn btn-sm btn-primary btn-isIdentity" data-typeidentity="PRIBADI" data-identityelm="idPassport">
												<i class="fa fa-search"></i> Cari
											</a>
										</section>
										<section class="col col-4" style="display:none" id="lengkap_ktp">Nama lengkap sesuai KTP</section>
									</div>

									<div class="row" style="display:none" id="npwp">
										<section class="col col-2">
											<p>NPWP  </p>
										</section>
										<section class="col col-4">
											<label class="input"> <i class="icon-append fa fa-credit-card "></i>
												<input type="text" name="idNPWP" id="idNPWP" class="form-control" style="display: inline-block;" data-mask="99.999.999.9-999.999" data-mask-placeholder="">
												<b class="tooltip tooltip-bottom-right">Mohon Isikan Nomor NPWP Badan Usaha</b>
											</label>
											<label><em>Contoh Format NPWP : 09.254.294.3-407.000</em></label>
										</section>
										<section class="col col-2">
											<a type="button" class="btn btn-sm btn-primary btn-isIdentity" data-typeidentity="BADANUSAHA" data-identityelm="idNPWP">
												<i class="fa fa-search"></i> Cari
											</a>
										</section>
										<section class="col col-4" style="display:none" id="lengkap_npwp">Nama lengkap sesuai NPWP</section>
									</div>

								</div>

								<div style="display:none" id="no_sertifikat">
									<div class="row">
										<section class="col col-2">
											<p>No SHM  </p>
										</section>
										<section class="col col-4">
											<label class="input"> <i class="icon-append fa fa-credit-card "></i>
												<input type="text" name="idNoSHM" id="idNoSHM" class="form-control">
												<b class="tooltip tooltip-bottom-right">Mohon Isikan Nomor SHM</b>
											</label>
										</section>
										<section class="col col-2">
											<a type="button" class="btn btn-sm btn-primary btn-isIdentity" data-typeidentity="LOKASI" data-identityelm="idNoSHM">
												<i class="fa fa-search"></i> Cari
											</a>
										</section>
									</div>
								</div>

								<div style="display:none" id="tombol_akses_lokasi">
									<label>Data tidak ditemukan, silahkan tambah data lokasi terlebih dahulu melalui tombol </label>
									<a target="_blank" href="<?php echo Yii::app()->getBaseUrl(1) ?>/#pendaftaran/master_lokasi" type="button" class="btn btn-sm btn-success">
										<i class="fa fa-plus"></i> Akses Master Lokasi
									</a>
								</div>

							</fieldset>
						</div>
					</div>
				</div>

				<!-- end widget div -->
		</div>
		<!-- end widget -->
	</article>
</div>

<script type="text/javascript">
	window.formobyek = [];
	window.formobyek['wn'] = '';
	window.formobyek['jenis_usaha'] = '';

	pageSetUp();

	function pilih_status_wn (value) {
		window.formobyek['wn'] = value;
		generateAutocompleteSubyek();
		generateAutocompleteObyek()

		$("#tombol_akses_lokasi").hide();
		$("#tombol_akses").hide();
		$("#idKTP, #idNPWP, #idNoSHM").val('');
		if ("WNI"==value) {
			$("#formbadanusaha_daftar").hide();
			// $("#formpemohon_daftar").hide();
			$("#form_pemohon").show();
			$("#status_sertifikat").hide();
			$("#form_perorangan").hide();
			$("#no_sertifikat").hide();
			$("#form_imb").hide();
			$("#pemohon").val("");
			$("#lengkap_npwp").hide();
			$("#lengkap_ktp").hide();

		}
		if ("WNA"==value) {

			$("#formbadanusaha_daftar").hide();
			// $("#formpemohon_daftar").hide();
			$("#form_pemohon").show();
			$("#status_sertifikat").hide();
			$("#form_perorangan").hide();
			$("#no_sertifikat").hide();
			$("#form_imb").hide();
			$("#pemohon").val("");
			$("#lengkap_npwp").hide();
			$("#lengkap_ktp").hide();

			if ( "WNA"==$("#status_wn").val() ) {
				$("#ktp").hide();
				$("#passport").show();
			} else {
				$("#passport").hide();
				$("#ktp").show();
			}
		}
	}

	function pilih_jenisusaha (value) {
		$("#idKTP, #idNPWP").val('');
		window.formobyek['jenis_usaha'] = value;
		generateAutocompleteSubyek();
		generateAutocompleteObyek()
		if ("Perorangan"==value) {
			$("#formbadanusaha_daftar").hide();
			// $("#formpemohon_daftar").hide();
			$("#form_perorangan").hide();
			$("#ktp").show();
			$("#npwp").hide();
			$("#status_sertifikat").hide();
			$("#lengkap_npwp").hide();
			$("#lengkap_ktp").hide();
			// /$("#status_sertifikat").hide();

			if ( "WNA"==$("#status_wn").val() ) {
				$("#ktp").hide();
				$("#passport").show();
			} else {
				$("#passport").hide();
				$("#ktp").show();
			}

		}
		if ("Badan Usaha"==value) {
			$("#formbadanusaha_daftar").hide();
			// $("#formpemohon_daftar").hide();
			$("#form_perorangan").hide();
			$("#ktp").hide();
			$("#npwp").show();
			$("#passport").hide();
			$("#no_sertifikat").hide();
			$("#lengkap_npwp").hide();
			$("#lengkap_ktp").hide();
			$("#formbadanusaha_daftar").hide();
		}
	}

	loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteSubyek();
		generateAutocompleteSubyek4NPWPD();
	});

	function generateAutocompleteSubyek() {
		var param = {
			tblsubyek_wn : $("#status_wn").val()!=null ? $("#status_wn").val() : ""
			,tblsubyek_jenisusaha : $("#jenisusaha").val()!=null ? $("#jenisusaha").val() : ""

		};

		var url_param = jQuery.param(param);
		$('#autosubyeknama').autocomplete({
			serviceUrl: '<?php echo Yii::app()->getBaseUrl(1); ?>/open_data/get/data/AutocompleteSubyek?'+url_param,

			onSelect: function (suggestion) {
				$("#formpemohon_daftar").hide();
				window.idsubyek = suggestion.data;
				$("#autosubyeknama").val(suggestion.value.split("|")[0]);
				$idsubyek = suggestion.data;
				var wn = suggestion.tblsubyek_wn;
				var jenis_usaha = suggestion.tblsubyek_jenisusaha;
				var identitynumber = suggestion.identitynumber;

				detailIzinPemohon(window.idsubyek);

				if ('Badan Usaha'==jenis_usaha) {
					$("#idNPWP").val(identitynumber);
				}
				else if ('Perorangan'==jenis_usaha) {
					var element = ("WNI"==wn) ? "idKTP" : "idPassport";
					$("#"+element).val(identitynumber);
				}

				}
				,showNoSuggestionNotice : true
				,noCache: true
				,noSuggestionNotice : "Tidak ditemukan subyek pajak"
			});
	}

	function generateAutocompleteSubyek4NPWPD() {
		var param = {
			tblsubyek_wn : $("#status_wn").val()!=null ? $("#status_wn").val() : ""
			,tblsubyek_jenisusaha : $("#jenisusaha").val()!=null ? $("#jenisusaha").val() : ""
		};

		var url_param = jQuery.param(param);
		$('#tnpwpddaftar_miliknama').autocomplete({
			serviceUrl: '<?php echo Yii::app()->getBaseUrl(1); ?>/open_data/get/data/AutocompleteSubyek?'+url_param,

			onSelect: function (suggestion) {
				window.idsubyek = suggestion.data;
				$("#tnpwpddaftar_miliknama").val(suggestion.value.split("|")[0]);
				$idsubyek = suggestion.data;
				var wn = suggestion.tblsubyek_wn;
				var jenis_usaha = suggestion.tblsubyek_jenisusaha;
				var identitynumber = suggestion.identitynumber;

				}
			,showNoSuggestionNotice : true
			,noCache: true
			,noSuggestionNotice : "Tidak ditemukan subyek pajak"
		});
	}

	function generateAutocompleteObyek() {
		var param = {
			tblsubyek_wn : $("#status_wn").val()!=null ? $("#status_wn").val() : ""
			,tblsubyek_jenisusaha : $("#jenisusaha").val()!=null ? $("#jenisusaha").val() : ""

		};

		var url_param = jQuery.param(param);
		$('#autoobyeknama').autocomplete({
			serviceUrl: '<?php echo Yii::app()->getBaseUrl(1); ?>/open_data/get/data/AutocompleteObyekNPWPD?'+url_param,

			onSelect: function (suggestion) {
				$("#formpemohon_daftar").hide();
				window.idsubyek = suggestion.data;
				$("#autoobyeknama").val(suggestion.value.split("|")[0]);
				$idsubyek = suggestion.data;
				var wn = suggestion.tblsubyek_wn;
				var jenis_usaha = suggestion.tblsubyek_jenisusaha;
				var identitynumber = suggestion.identitynumber;

				detailIzinPemohon(window.idsubyek);

				if ('Badan Usaha'==jenis_usaha) {
					$("#idNPWP").val(identitynumber);
				}
				else if ('Perorangan'==jenis_usaha) {
					var element = ("WNI"==wn) ? "idKTP" : "idPassport";
					$("#"+element).val(identitynumber);
				}

			}
			,showNoSuggestionNotice : true
			,noCache: true
			,noSuggestionNotice : "Tidak ditemukan subyek pajak"
		});
	}

	function pilih_jenis() {
		var jenis=$('#pilih_jenis').val();
		if (jenis==1) {
			$('#form_npwpd').hide();
			$('#autosubyek').show();
			$('#form_pemohon').show('fast');
		} else {
			$('#form_pemohon').hide('fast');
			$('#autosubyek').hide();
			$('#form_npwpd').show();
		}
	}

	</script>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title"><a id="accordion_pemilikpengelola" data-toggle="collapse" data-parent="#accordion" href="#collapsehree" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> KETERANGAN PEMILIK ATAU PENGELOLA </p></a></h4>
	</div>
	<div id="collapsehree" class="panel-collapse collapse">
		<div class="panel-body">
			<fieldset class="smart-form">
				<div class="row">
					<section class="col col-md-2">
						Nama Pemilik / Pengelola
					</section>
					<section class="col col-md-4">
						<label class="input">
							<input type="text" id="TSUBYEK_MILIKNAMA" name="param[TSUBYEK_MILIKNAMA]" class="form-control" placeholder="Ketik nama Pemilik / Pengelola">
						</label>
						<!-- <label><em>Cari dengan nama pemilik</em></label> -->
					</section>
					<?php /*button id="btnTambahPemilik" type="button" class="btn btn-sm btn-primary">Tambahkan Pemilik/Pengelola</button*/ ?>
				</div>

				<div id="form-pemilik" style="">
					<div style="margin-left: 2%;">
						<div class="row">
							<section class="col col-md-2">
								NIK
							</section>
							<section class="col col-md-3">
								<label for="address" class="input">
									<input data-mask="99.99.99.99.99.99.9999" value="" type="text" name="param[TSUBYEK_MILIKNIK]" id="TSUBYEK_MILIKNIK">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								NPWP
							</section>
							<section class="col col-md-3">
								<label for="address" class="input">
									<input data-mask="99.999.999.9-999.999" value="" type="text" name="param[TSUBYEK_MILIKNPWP]" id="TSUBYEK_MILIKNPWP">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								No. HP
							</section>
							<section class="col col-md-2">
								<label for="address" class="input">
									<input type="text" id="TSUBYEK_MILIKHP" name="param[TSUBYEK_MILIKHP]">
								</label>
							</section>
							<section class="col col-md-2">
								No. HP 2
							</section>
							<section class="col col-md-2">
								<label for="address" class="input">
									<input type="text" id="TSUBYEK_MILIKHP2" name="param[TSUBYEK_MILIKHP2]">
								</label>
							</section>
						</div>
					</div>
					<div class="row" style="display: none;">
						<section class="col col-md-3">
							Jabatan
						</section>
						<section class="col col-md-4">
							<label class="select">
								<select id="tnpwpd_milikjab" name="tnpwpd_milikjab">
									<option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
								</select> <i></i> 
							</label>
						</section>
					</div>
					<div class="row">
						<section class="col col-md-12">
							Alamat Tempat Tinggal (Melampirkan Identitas yang dilaporkan)
						</section>
					</div>
					<div style="margin-left: 2%;">
						<div class="row">
							<section class="col col-md-2">
								Jalan / No.
							</section>
							<section class="col col-md-3">
								<label for="address" class="input">
									<input type="text" id="TSUBYEK_MILIKJALAN" name="param[TSUBYEK_MILIKJALAN]">
								</label>
							</section>

							<section class="col col-md-2">
								Provinsi
							</section>
							<section class="col col-md-3">
								<label class="select">
									<select id="TSUBYEK_MILIKPROVID" name="param[TSUBYEK_MILIKPROVID]" class="select2">
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
								Rt/Rw / Rk
							</section>
							<section class="col col-md-3">
								<label for="address" class="input">
									<input type="text" id="TSUBYEK_MILIKRTRWRK" name="param[TSUBYEK_MILIKRTRWRK]">
								</label>
							</section>
							
							<section class="col col-md-2">
								Kabupaten
							</section>
							<section class="col col-md-3">
								<label class="select">
									<select id="TSUBYEK_MILIKKABID" name="param[TSUBYEK_MILIKKABID]" class="select2">
										<option value="" selected="">=== Pilih Kabupaten ===</option>
									</select>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								Kode Pos
							</section>
							<section class="col col-md-3">
								<label for="address" class="input">
									<input type="text" id="TSUBYEK_MILIKKODEPOS" name="param[TSUBYEK_MILIKKODEPOS]">
								</label>
							</section>
							
							<section class="col col-md-2">
								Kecamatan
							</section>
							<section class="col col-md-3">
								<label class="select">
									<select id="TSUBYEK_MILIKKECID" name="param[TSUBYEK_MILIKKECID]" class="select2">
										<option value="" selected="">=== Pilih Kecamatan ===</option>
									</select>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<!-- File upload -->
							</section>
							<section class="col col-md-3">
								<!-- <label for="file" class="input input-file">
									<div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly="">
								</label> -->
							</section>

							<section class="col col-md-2">
								Kelurahan
							</section>
							<section class="col col-md-3">
								<label class="select">
									<select id="TSUBYEK_MILIKKELID" name="param[TSUBYEK_MILIKKELID]" class="select2" onchange="setkodepos(this.value)">
										<option value="" selected="">=== Pilih Kelurahan ===</option>
									</select>
								</label>
							</section>
						</div>
					</div>
					<div class="row">
						<section class="col col-md-12">
							Kewajiban Pajak
						</section>
					</div>
					<div style="margin-left: 2%;">
						<div class="row">
						<?php /*section class="col col-md-3">
							<label class="radio">
								<input type="radio" name="radio" checked="checked">
								<i></i>Pajak Hotel
							</label>
							<label class="radio">
								<input type="radio" name="radio">
								<i></i>Pajak Restoran
							</label>
							<label class="radio">
								<input type="radio" name="radio">
								<i></i>Pajak Hiburan
							</label>
							<label class="radio">
								<input type="radio" name="radio">
								<i></i>Pajak Reklame
							</label>
							<label class="radio">
								<input type="radio" name="radio">
								<i></i>Pajak Penerangan Jalan
							</label>
						</section>
						<section class="col col-md-6">
							<label class="radio">
								<input type="radio" name="radio">
								<i></i>Pajak Parkir
							</label>
							<label class="radio">
								<input type="radio" name="radio">
								<i></i>Pajak Air Tanah
							</label>
							<label class="radio">
								<input type="radio" name="radio">
								<i></i>Pajak Sarang Burung Walet
							</label>
						</section*/ ?>

						<!-- START -->
						<?php $no = 1; foreach (TRekening::model()->getRekeningAktif() as $list_rek): ?>
						<?php if ( $no-1 / 5 === 1 OR $no == 1): ?>
							<section class="col col-md-4">
							<?php endif ?>
							<?php $pajakrek_kode = $list_rek['TREKENING_KODE']; ?>
							<label class="checkbox pull-left">
								<input type="checkbox" class="radio_jenisrekening" value="<?= $pajakrek_kode ?>" name="param[TREKENING_KODE][]">
								<i></i> <?= $list_rek['TREKENING_NAMA'] ?>
							</label>

							<?php if ($pajakrek_kode != '4110400'): ?>

							<button style="display: none; margin-left: 10px;" id="btn-det-<?= $pajakrek_kode ?>" type="button" onclick="getFormDetail('<?= base64_encode( RFormPajak::model()->getFormKode( $pajakrek_kode ) ) ?>')" class="btn btn-sm bg-color-magenta txt-color-white btn-det">
								<i class="fa fa-table"></i> Detail
							</button>
							
							<?php endif ?>
							
							<br><br>
							<?php if ( $no-1 / 5 === 1 OR $no == 5): ?>
							</section>
						<?php endif ?>
						<?php $no++; endforeach ?>
						<section class="col col-md-4">&nbsp;</section>
						<!-- STOP -->
					</div>

					<div class="row">
						<section class="col col-md-12">
							Rekening Pajak
						</section>
					</div>

						<!-- START -->
					<?php $no = 1; foreach (TRekening::model()->getRekeningAktif() as $list_rek): ?>
					<?php if ($list_rek['TREKENING_KODE'] != '4110400'): ?>
					<div style="margin-left: 2%;">
						<div class="row" style="display: none;" id="section-sub-<?= $list_rek['TREKENING_KODE'] ?>">
							<section class="col col-md-6">
								<label class="select">
									<select class="select_subrek select2" name="param[TREKENINGSUB_KODE][<?= $list_rek['TREKENING_KODE'] ?>]" id="select-sub-<?= $list_rek['TREKENING_KODE'] ?>">
										<option value="" selected="">== Pilih Rekening <?= $list_rek['TREKENING_NAMA'] ?> ==</option>
									<?php foreach (TRekening::model()->getRekeningSubAktif($list_rek['TREKENING_KODE']) as $sub): ?>
										<option value="<?= $sub['TREKENING_KODE'] ?>" id="<?= $sub['TREKENING_ID'] ?>">[<?= $sub['TREKENING_KODE'] ?>] <?= $sub['TREKENING_NAMA'] ?></option>
									<?php endforeach ?>
									</select>
								</label>
							</section>

							<section class="col col-md-3">
								<label class="input">
									<input type="text" id="TNPWPD_PROSENTASEOMZET" name="param[TNPWPD_PROSENTASEOMZET][<?= $list_rek['TREKENING_KODE'] ?>]">
								</label> <em>(Contoh : 1/11 diisi 0,09090909)</em>
							</section>

						<!-- STOP -->
						</div>
					</div>
					<?php endif ?>
					<?php $no++; endforeach ?>
				<div class="col col-md-4" style="float: right; display: none;">
					<div class="row">
						<section class="col col-md-4">
							Tempat
						</section>
						<section class="col col-md-8">
							<label for="address" class="input">
								<input type="text" name="nama_usaha">
							</label>
						</section>
					</div>
					<div class="row">
						<section class="col col-md-4">
							Tanggal
						</section>
						<section class="col col-md-8">
							<label class="input"> <i class="icon-append fa fa-calendar"></i>
								<input type="text" name="request" class="datepicker " data-dateformat="dd/mm/yy" id="tagl_pengelola">
							</label>
						</section>
					</div>
					<div class="row">
						<section class="col col-md-4">
							Nama 
						</section>
						<section class="col col-md-8">
							<label for="address" class="input">
								<input type="text" name="nama_usaha">
							</label>
						</section>
					</div>
					<div class="row" style="display: none;">
						<section class="col col-md-4">
							Tanda Tangan 
						</section>
						<section class="col col-md-8">
							<label class="select">
								<select name="gender">
									<option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
								</select> <i></i> 
							</label>
						</section>
					</div>
				</div>
			</div>
		</fieldset>
	</div>
</div>
</div>

<script type="text/javascript">
	function tambahPemilik() {
		$("#form-pemilik").show();
	}

	$("#btnTambahPemilik").click(function(event) {
		tambahPemilik();
	});

	function getDetailPemilik(id) {
		$.ajax({
			url: 'pelayanan/pemilik/getdata',
			type: 'POST',
			dataType: 'json',
			data: {id: btoa(btoa(id))},
		})
		.done(function(respon) {
			$("#tnpwpd_miliknama").removeClass('ui-autocomplete-loading');
			$("#tnpwpd_bunik").val( respon.TBLSUBYEK_NIK );
			$("#tnpwpd_bunpwp").val( respon.TBLSUBYEK_NPWP );
			$("#tnpwpd_buhp").val( respon.TBLSUBYEK_HP );

			$("#form-pemilik").show();
		})
		.fail(function(jqXHR, exception) {
			handelErr(jqXHR, exception);
		})
		.always(function() {
			console.log("complete");
		});
		
	}

	loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteSubyek4NPWPD();
	});

	function generateAutocompleteSubyek4NPWPD() {
		var param = {
			tblsubyek_wn : $("#status_wn").val()!=null ? $("#status_wn").val() : ""
			,tblsubyek_jenisusaha : $("#jenisusaha").val()!=null ? $("#jenisusaha").val() : ""
		};

		var url_param = jQuery.param(param);
		$('#tnpwpd_miliknama').autocomplete({
			serviceUrl: '<?php echo Yii::app()->getBaseUrl(1); ?>/open_data/get/data/AutocompleteSubyek?'+url_param,

			onSelect: function (suggestion) {
				var idsubyek = suggestion.data;
				$("#tnpwpd_miliknama").val(suggestion.value.split("|")[0]);
				$idsubyek = suggestion.data;
				var wn = suggestion.tblsubyek_wn;
				var jenis_usaha = suggestion.tblsubyek_jenisusaha;
				var identitynumber = suggestion.identitynumber;

				getDetailPemilik(idsubyek);

			}
			,showNoSuggestionNotice : true
			,noCache: true
			,noSuggestionNotice : "Tidak ditemukan subyek pajak"
		});
	}

	$("#TSUBYEK_MILIKPROVID").change(function(event) {
        getkabupaten('TSUBYEK_MILIKKABID', $("#TSUBYEK_MILIKPROVID").select2('val'));
        setComboList('TSUBYEK_MILIKKECID', 'Kecamatan', []);
        setComboList('TSUBYEK_MILIKKELID', 'Kelurahan', []);
    });

	$("#TSUBYEK_MILIKKABID").change(function(event) {
        getkecamatan('TSUBYEK_MILIKKECID', $("#TSUBYEK_MILIKKABID").select2('val'));
        setComboList('TSUBYEK_MILIKKELID', 'Kelurahan', []);
    });

	$("#TSUBYEK_MILIKKECID").change(function(event) {
        getkelurahan('TSUBYEK_MILIKKELID', $("#TSUBYEK_MILIKKECID").select2('val'));
    });
</script>
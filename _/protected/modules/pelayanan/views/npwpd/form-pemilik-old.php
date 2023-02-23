<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapsehree" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> KETERANGAN PEMILIK ATAU PENGELOLA </p></a></h4>
    </div>
    <div id="collapsehree" class="panel-collapse collapse">
        <div class="panel-body">
            <fieldset class="smart-form">
                <div class="row">
                    <section class="col col-md-3">
                       Nama Pemilik / Pengelola
                    </section>
                    <section class="col col-md-4">
                        <label class="input">
                            <input type="text" id="tnpwpd_miliknamax" name="tnpwpd_miliknama" class="form-control" placeholder="Ketik nama Pemilik / Pengelola">
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
                                <input data-mask="99.99.99.99.99.99.9999" value="" type="text" name="tnpwpd_bunik" id="tnpwpd_bunik">
                            </label>
                        </section>
                    </div>
                    <div class="row">
                        <section class="col col-md-2">
                            NPWP
                        </section>
                        <section class="col col-md-3">
                            <label for="address" class="input">
                                <input data-mask="99.999.999.9-999.999" value="" type="text" name="tnpwpd_bunpwp" id="tnpwpd_bunpwp">
                            </label>
                        </section>
                    </div>
                     <div class="row">
                        <section class="col col-md-2">
                            No. HP
                        </section>
                        <section class="col col-md-2">
                            <label for="address" class="input">
                                <input type="text" id="tnpwpd_buhp" name="tnpwpd_buhp">
                            </label>
                        </section>
                        <section class="col col-md-2">
                            No. HP 2
                        </section>
                        <section class="col col-md-2">
                            <label for="address" class="input">
                                <input type="text" id="tnpwpd_buhp2" name="tnpwpd_buhp2">
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
                        <section class="col col-md-2">
                            <label for="address" class="input">
                                <input type="text" id="tnpwpd_milikjalan" name="tnpwpd_milikjalan">
                            </label>
                        </section>
                        <section class="col col-md-2">
                           Kabupaten / Kota
                        </section>
                        <section class="col col-md-2">
                            <label for="address" class="input">
                                <input type="text" id="tnpwpd_milikkabkota" name="tnpwpd_milikkabkota">
                            </label>
                        </section>
                    </div>
                    <div class="row">
                        <section class="col col-md-2">
                           Rt/Rw / Rk
                        </section>
                        <section class="col col-md-2">
                            <label for="address" class="input">
                                <input type="text" name="nama_usaha">
                            </label>
                        </section>
                        <section class="col col-md-2">
                           Nomor Telepon
                        </section>
                        <section class="col col-md-2">
                            <label for="address" class="input">
                                <input type="text" name="nama_usaha">
                            </label>
                        </section>
                    </div>
                    <div class="row">
                        <section class="col col-md-2">
                           Kecamatan
                        </section>
                        <section class="col col-md-2">
                            <label class="select">
                                <select class="select2" name="param[refkecamatan_id]" id="refkecamatan_id">
                                    <option value="0" selected="" >== Silahkan Pilih ==</option>
                                    <?php foreach ($data['list_kecamatan'] as $opKec) : ?>
											<option value="<?php echo $opKec['REFKECAMATAN_ID'] ?>">[<?php echo $opKec['REFKECAMATAN_KODE'] ?>] <?php echo $opKec['REFKECAMATAN_NAMA'] ?>
											</option>
									<?php endforeach ?>
                                </select>
                            </label>
                        </section>
                        <section class="col col-md-2">
                           Kode Pos
                        </section>
                        <section class="col col-md-2">
                            <label for="address" class="input">
                                <input type="text" name="nama_usaha">
                            </label>
                        </section>
                    </div>
                    <div class="row">
                        <section class="col col-md-2">
                           Kelurahan
                        </section>
                        <section class="col col-md-2">
                           <label class="select">
                                 <select class="select2" name="param[refkelurahan_id]" id="refkelurahan_id">
                                    <option value="">=== Pilih Kelurahan ===</option>
                                    <option value=""></option>
                                </select>
                            </label>
                        </section>
                        <section class="col col-md-2">
                           File upload
                        </section>
                        <section class="col col-md-4">
                            <label for="file" class="input input-file">
                            <div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly="">
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
                        			<input type="checkbox" class="radio_jenisrekening" value="<?= $pajakrek_kode ?>" name="param[tblrekening_kode]">
                        			<i></i> <?= $list_rek['TREKENING_NAMA'] ?>
                        		</label>

                        		<button style="display: none; margin-left: 10px;" id="btn-det-<?= $pajakrek_kode ?>" type="button" onclick="getFormDetail('<?= base64_encode( RFormPajak::model()->getFormKode( $pajakrek_kode ) ) ?>')" class="btn btn-sm bg-color-magenta txt-color-white btn-det">
                        			<i class="fa fa-table"></i> Detail
                        		</button>
                        		<br><br>
                        		<?php if ( $no-1 / 5 === 1 OR $no == 5): ?>
                        		</section>
                        	<?php endif ?>
                        	<?php $no++; endforeach ?>
                        <section class="col col-md-4">&nbsp;</section>
                        	<!-- STOP -->
                    </div>
                </div>
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
</script>
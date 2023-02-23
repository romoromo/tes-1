<?php 
$data['list_kecamatan'] = Kecamatan::model()->findAll( array('order'=>'REFKECAMATAN_KODE ASC') );
?>
<form id="form-data-subyek">
<section class="col col-md-12">
    <div class="panel-group smart-accordion-default" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> 
                        <i class="fa fa-lg fa-angle-down pull-right"></i> 
                        <i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> DIISI OLEH SELURUH WAJIB PAJAK BADAN</p>
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse">
                <div class="panel-body no-padding">
                    <fieldset class="smart-form">

                        <div class="row">
                            <section class="col col-md-12">
                                I. Jenis Pemohon
                            </section>

                            <section class="col col-md-2">
                                <label class="radio pull-left">
                                    <input type="radio" class="radio_jenispemohon REFJENISWP_ID" id="isPerorangan" value="1" name="param[REFJENISWP_ID]">
                                    <i></i> 
                                    Perorangan   
                                </label>
                            </section>
                            <section class="col col-md-2">
                                <label class="radio pull-left">
                                    <input type="radio" class="radio_jenispemohon REFJENISWP_ID" id="isPemohon" value="2" name="param[REFJENISWP_ID]">
                                    <i></i> 
                                    Badan Usaha
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-md-2">
                                1. Nama Badan / Merk Usaha
                            </section>
                            <section class="col col-md-6">
                                <label for="address" class="input">
                                    <input type="text" name="param[TSUBYEK_BUNAMAMERK]" id="TSUBYEK_BUNAMAMERK">
                                </label>
                            </section>
                        </div>

                        <div style="margin-left: 2%;">
                            <div id="isNIKPerorangan" style="display: none;" class="row">
                                <section class="col col-md-2">
                                    NIK
                                </section>
                                <section class="col col-md-3">
                                    <label for="address" class="input">
                                        <input data-mask="99.99.99.99.99.99.9999" value="" type="text" name="param[TSUBYEK_BUNIK]" id="TSUBYEK_BUNIK">
                                    </label>
                                </section>
                            </div>
                            <div id="isNPWPBadanUsaha" style="display: none;" class="row">
                                <section class="col col-md-2">
                                    NPWP
                                </section>
                                <section class="col col-md-3">
                                    <label for="address" class="input">
                                        <input data-mask="99.999.999.9-999.999" value="" type="text" name="param[TSUBYEK_BUNPWP]" id="TSUBYEK_BUNPWP">
                                    </label>
                                </section>
                            </div>
                             <div class="row">
                                <section class="col col-md-2">
                                    No. HP
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="TSUBYEK_BUHP" name="param[TSUBYEK_BUHP]">
                                    </label>
                                </section>
                            </div>
                        </div>
                        <div class="row">
                            <section class="col col-md-12">
                                2. Alamat (photo copy Surat Keterangan Domisili diampirkan)
                            </section>
                        </div>
                        <div style="margin-left: 2%;">
                            <div class="row">
                                <section class="col col-md-2">
                                   Jalan / No.
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="TSUBYEK_BUJALAN" name="param[TSUBYEK_BUJALAN]">
                                    </label>
                                </section>

                                <section class="col col-md-2">
                                   Provinsi
                                </section>
                                <section class="col col-md-3">
                                    <label class="select">
                                    <select id="TBLPROVINSI_ID" name="param[TBLPROVINSI_ID]" class="select2">
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
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="TSUBYEK_BURTRWRK" name="param[TSUBYEK_BURTRWRK]">
                                    </label>
                                </section>

                                <section class="col col-md-2">
                                   Kabupaten
                                </section>
                                <section class="col col-md-3">
                                    <label class="select">
                                    <select id="TBLKABUPATEN_ID" name="param[TBLKABUPATEN_ID]" class="select2">
                                            <option value="" selected="">=== Pilih Kabupaten ===</option>
                                        </select>
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-2">
                                   Nomor Telepon
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="TSUBYEK_BUTELP" name="param[TSUBYEK_BUTELP]">
                                    </label>
                                </section>

                                <section class="col col-md-2">
                                    Kecamatan
                                </section>
                                <section class="col col-md-3">
                                    <label class="select">
                                    <select id="TBLKECAMATAN_ID" name="param[TBLKECAMATAN_ID]" class="select2">
                                            <option value="" selected="">=== Pilih Kecamatan ===</option>
                                        </select>
                                    </label>
                                </section>
                                
                            </div>
                            <div class="row">

                                 <section class="col col-md-2">
                                   Nomor Telepon 2
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="TSUBYEK_BUTELP2" name="param[TSUBYEK_BUTELP2]">
                                    </label>
                                </section>

                                <section class="col col-md-2">
                                   Kelurahan
                                </section>
                                <section class="col col-md-3">
                                    <label class="select">
                                    <select id="TBLKELURAHAN_ID" name="param[TBLKELURAHAN_ID]" class="select2">
                                            <option value="" selected="">=== Pilih Kelurahan ===</option>
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
                                   Kode Pos
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="TSUBYEK_BUKODEPOS" name="param[TSUBYEK_BUKODEPOS]">
                                    </label>
                                </section>
                            </div>                                                              

                        </div>
                        <div class="row">
                            <section class="col col-md-12">
                                3. Surat izin yang dimiliki (Photo copy surat izin harap dilampirkan)
                            </section>
                        </div>
                        <div style="margin-left: 2%;">
                            <div class="row">
                                <section class="col col-md-2">
                                   Surat Izin Gangguan
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="TSUBYEK_BUHONO" name="param[TSUBYEK_BUHONO]">
                                    </label>
                                </section>
                                <section class="col col-md-2">
                                   Tanggal
                                </section>
                                <section class="col col-md-2">
                                    <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                    <input type="text" name="request" class="datepicker" data-dateformat="dd-mm-yy" id="TSUBYEK_BUHOTGL" name="param[TSUBYEK_BUHOTGL]">
                                    </label>
                                </section>
                                <section class="col col-md-4">
                                    <!-- <label for="file" class="input input-file">
                                    <div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly="">
                                    </label> -->
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-2">
                                   Surat Izin Usaha Kepariwisata
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="TSUBYEK_BUPARIWISATANO" name="param[TSUBYEK_BUPARIWISATANO]">
                                    </label>
                                </section>
                                <section class="col col-md-2">
                                   Tanggal
                                </section>
                                <section class="col col-md-2">
                                    <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                    <input type="text" name="request" class="datepicker" data-dateformat="dd-mm-yy" id="TSUBYEK_BUAKTANO" name="param[TSUBYEK_BUAKTANO]">
                                    </label>
                                </section>
                                <section class="col col-md-4">
                                    <!-- <label for="file" class="input input-file">
                                    <div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly="">
                                    </label> -->
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-2">
                                  No Akta Pendirian
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="TSUBYEK_BUNOAKTA" name="param[TSUBYEK_BUNOAKTA]">
                                    </label>
                                </section>
                                <section class="col col-md-2">
                                   Tanggal
                                </section>
                                <section class="col col-md-2">
                                    <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                    <input type="text" name="request" class="datepicker" data-dateformat="dd-mm-yy" id="TSUBYEK_BUAKTATGL" name="param[TSUBYEK_BUAKTATGL]">
                                    </label>
                                </section>
                                <section class="col col-md-4">
                                    <!-- <label for="file" class="input input-file">
                                    <div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly="">
                                    </label> -->
                                </section>
                            </div>

                            <div class="row">
                                <section class="col col-md-2">
                                  Surat Izin Lainnya
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="TSUBYEK_BULAIN1NO" name="param[TSUBYEK_BULAIN1NO]">
                                    </label>
                                </section>
                                <section class="col col-md-2">
                                   Tanggal
                                </section>
                                <section class="col col-md-2">
                                    <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                    <input type="text" name="request" class="datepicker" data-dateformat="dd-mm-yy" id="TSUBYEK_BULAIN1TGL" name="param[TSUBYEK_BULAIN1TGL]">
                                    </label>
                                </section>
                                <section class="col col-md-4">
                                    <!-- <label for="file" class="input input-file">
                                    <div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly="">
                                    </label> -->
                                </section>
                            </div>
                        </div>
                        <div class="row">
                            <section class="col col-md-12">
                                4. Bidang Usaha (harap diisi sesuai dengan bidang usahanya)
                            </section>
                        </div>
                        <div style="margin-left: 2%;">
                            <div class="row">
                                <!-- START -->
                                <?php $TBIDANG = Yii::app()->db->createCommand()->select()->from('TBIDANGUSAHA')->where("TBIDANGUSAHA_ISAKTIF='T'")->queryAll(); ?>
                                <?php $no = 1; $jml = count($TBIDANG); foreach ($TBIDANG as $list_rek): ?>
                                <?php if ( ($no-1) % 5 === 0 OR $no == 1): ?>   
                                    <section class="col col-md-<?= (int)($no/5) == 0 ? 2 : 5 ?>"> <!-- buka section -->
                                <?php endif ?>
                                    <?php $pajakrek_kode = $list_rek['TBIDANGUSAHA_ID']; ?>
                                    
                                    <label class="radio pull-left">
                                        <input type="radio" class="radio_bidangusaha TBIDANGUSAHA_ID" value="<?= $pajakrek_kode ?>" name="param[TBIDANGUSAHA_ID]">
                                        <i></i> 
                                        <?= $list_rek['TBIDANGUSAHA_NAMA'] ?>   
                                    </label>

                                    <?php /*!--button style="display: none; margin-left: 10px;" id="btn-det-<?= $pajakrek_kode ?>" type="button" onclick="getFormDetail('<?= base64_encode( RFormPajak::model()->getFormKode( $pajakrek_kode ) ) ?>')" class="btn btn-sm bg-color-magenta txt-color-white btn-det">
                                        <i class="fa fa-table"></i> Detail
                                    </button--*/ ?>
                                    
                                    <br><br>

                                <?php if ( $no % 5 === 0 OR $no == $jml ): ?>
                                    
                                    </section> <!-- tutup section -->

                                <?php endif ?>
                                <?php $no++; endforeach ?>
                                
                                <section id="sec_TBIDANGUSAHA_LAIN" style="display: none;" class="col col-md-4">
                                    <label class="input">
                                    <input type="text" placeholder="Isikan Nama Bidang Usaha" name="param[TBIDANGUSAHA_LAIN]" id="TBIDANGUSAHA_LAIN">
                                    </label>
                                </section>
                                <!-- STOP -->
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        
        <?php include_once 'form-pemilik.php'; ?>

        
    </div>
</section>

<footer>
        <div class="col col-12">
            <label class="textarea">
                <ol>
                    <?php /*<li>Petunjuk ...</li>*/ ?>
                </ol>
            </label>
        </div>

        <button id="btn-simpan" type="submit" class="btn btn-primary">
            Simpan
        </button>
        <!-- <button onclick="simpan()" id="btn-simpan" type="button" class="btn btn-primary">
            Simpan
        </button> -->
        <button type="reset" class="btn btn-default" data-dismiss="modal">
            Batal
        </button>

    </footer>
</form>

<script type="text/javascript">

    function simpanNPWPD() {
    	loadingTransfer('open');
        $.ajax({
            url: 'pelayanan/npwpd/simpan',
            type: 'post',
            dataType: 'json',
            data:  $("#form-data-subyek").serialize()+'&id='+window.idSubyek+'&cmd='+window.cmd,
            success: function(respon) {
                if (respon.status=="success") {
                    $("#formpemohon_daftar").hide();
                    notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
                    detailIzinPemohon(respon.pk);
                }
                else {
                    notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
                }
            }
        })
        .always(function() {
        	console.log("complete");
        	loadingTransfer('close');
        });
        

        return false;
    }

    $("#refkecamatan_id").change(function(event) {
        getkelurahan_by_kecamatan($("#refkecamatan_id").val());
    });

    $("#refkelurahan_id").change(function(event) {
        $("#tnpwpddaftar_bukodepos").val($("#refkelurahan_id option:selected").attr('kodepos'));
    });

    function getkelurahan_by_kecamatan(kecid, kelid) {
        $("#refkelurahan_id").select2('val','');
        $.ajax({
            url: '<?php echo Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kelurahan_by_kecamatan',
            type: 'GET',
            dataType: 'json',
            data: {id: kecid},
            success: function(json) {
                window.jsonx = json;
                // setSelectList('refkelurahan_id', 'Kelurahan', json);
                setComboList('refkelurahan_id', 'Kelurahan', json);
                if (kelid!=null) {
                    setTimeout(function() {
                        $("#refkelurahan_id").select2('val',kelid!="0" ? kelid : "" ); // set combo
                    }, 500);
                }
            }
        });     
    }

    $("#TBLPROVINSI_ID").change(function(event) {
        getkabupaten('TBLKABUPATEN_ID', $("#TBLPROVINSI_ID").select2('val'));
        setComboList('TBLKECAMATAN_ID', 'Kecamatan', []);
        setComboList('TBLKELURAHAN_ID', 'Kelurahan', []);
        $("#TBLKABUPATEN_ID").select2('val', '');
        $("#TBLKECAMATAN_ID").select2('val', '');
        $("#TBLKELURAHAN_ID").select2('val', '');
    });

    $("#TBLKABUPATEN_ID").change(function(event) {
        getkecamatan('TBLKECAMATAN_ID', $("#TBLKABUPATEN_ID").select2('val'));
        setComboList('TBLKELURAHAN_ID', 'Kelurahan', []);
        $("#TBLKECAMATAN_ID").select2('val', '');
        $("#TBLKELURAHAN_ID").select2('val', '');
    });

    $("#TBLKECAMATAN_ID").change(function(event) {
        getkelurahan('TBLKELURAHAN_ID', $("#TBLKECAMATAN_ID").select2('val'));
        $("#TBLKELURAHAN_ID").select2('val', '');
    });

    $("#TBLKELURAHAN_ID").change(function(event) {
        setkodepos('TSUBYEK_BUKODEPOS', $("#TBLKECAMATAN_ID option:selected").attr('nama'), $("#TBLKELURAHAN_ID option:selected").attr('nama') );
    });

    function getkabupaten(elm, provkode, kabkode) {
        if (elm==null) {
            elm = 'TBLKABUPATEN_ID';
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
            elm = 'TBLKECAMATAN_ID';
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
            elm = 'TBLKELURAHAN_ID';
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

    function TambahSubyek() {
        window.cmd = "tambah";
        window.idSubyek = '';
        $("#cmd").val("tambah");
        $("#form-data-subyek")[0].reset();
        $("#form-data-subyek .select2").select2('val','');
        $("#sec_indentitas").hide();
        $(".isBadanUsaha").hide();
        $(".isDalamWil").hide(); 
        $("#ktp").hide();
        $("#formpemohon_daftar").show();

        setDefaultDistrict();

        $('input[type=checkbox].radio_jenisrekening').prop('disabled', 0);

        if ($("#accordion_pemilikpengelola").hasClass('collapsed')) {
			$("#accordion_pemilikpengelola").click();
		}

        /*$("input[type=radio][value='"+window.formobyek['wn']+"'].tblsubyek_wn").prop('checked', true);
        $("input[type=radio][value='"+window.formobyek['jenis_usaha']+"'].tblsubyek_jenisusaha").prop('checked', true);*/

        // setFormIdentitas();

    }

    $("#btnTambahSubyek").click(function(event) {
        TambahSubyek();
    });

    function tambahObyek() {
        /* window.cmd = "tambah";
        window.idSubyek = '';
        $("#cmd").val("tambah");
        $("#form-data-subyek")[0].reset();
        $("#form-data-subyek .select2").select2('val','');
        $("#sec_indentitas").hide();
        $(".isBadanUsaha").hide();
        $(".isDalamWil").hide(); */
        $("#formpemohon_daftar_npwpd").show();

        /*$("input[type=radio][value='"+window.formobyek['wn']+"'].tblsubyek_wn").prop('checked', true);
        $("input[type=radio][value='"+window.formobyek['jenis_usaha']+"'].tblsubyek_jenisusaha").prop('checked', true);*/

        // setFormIdentitas();

    }

    /*$("#btnTambahObyek").click(function(event) {
        tambahObyek();
    });*/

    $('.radio_bidangusaha').click(function(event) {
        var bidangusaha_id = (event.target);
        $("#sec_TBIDANGUSAHA_LAIN").fadeOut('500');
        if ($(bidangusaha_id).val() == 11) {
            $("#sec_TBIDANGUSAHA_LAIN").fadeIn('500');
        }
    });

    $('.radio_jenisrekening').click(function(event) {
        isPilihPajak(event.target);
    });

    function isPilihPajak(elm) {
        if (window.cmd!='edit') {
            $(".btn-det").hide();          
        }
        var kode = $(elm).val();
        if ( $(elm).prop('checked') ) {
            $("#btn-det-" + kode).show(500);         
            $("#section-sub-" + kode).show(500);         
        } else {
            $("#btn-det-" + kode).hide(500);
            $("#section-sub-" + kode).hide(500);
        }
    }

    $(".radio_jenispemohon").click(function(event) {
        if( $(event.target).val()==1 ) {
            //perorangan
            $("#isNPWPBadanUsaha").fadeOut(500);
            $("#isNIKPerorangan").fadeIn(500);
            removeRules(rulesWNIBadanUsaha);
            addRules(rulesWNIPerorangan);
        } else {
            //bu
            $("#isNIKPerorangan").fadeOut(500);
            $("#isNPWPBadanUsaha").fadeIn(500);
            removeRules(rulesWNIPerorangan);
            addRules(rulesWNIBadanUsaha);
        }
    });

    function simpan() {
    	$.SmartMessageBox({
			title : "Konfirmasi Simpan", // judul Smart Alert
			content : "Apakah anda yakin akan menambah data ini?", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				sendAllData();
			}

		});
    }

    function sendAllData() {
        $("#btn-simpan").prop('disabled', 1);
        var serialData = $("#form-data-subyek").serialize();
        var addparam = {
            cmd : window.cmd
            ,id : window.idSubyek
        }

        $.ajax({
            url: 'pelayanan/npwpd/simpan',
            type: 'POST',
            dataType: 'json',
            data: serialData + '&' + jQuery.param(addparam),
        })
        .done(function(respon) {
            if (respon.status == 'success') {
                console.log("success");
                notifikasi('Sukses', "Record tersimpan, lanjutkan mengecek NPWPD", 'success', 1, 0);
                var datan = {
                    sid : respon.pk
                    , list_rek : respon.reks
                }
                statusRecordNPWPD(datan);
                $("#modalKukuh").modal('show');
                detailIzinPemohon(respon.pk);
                window.idSubyek = respon.pk;
                $("#formpemohon_daftar").hide();
            }
        })
        .fail(function( jqXHR, exception ) {
            handelErr(jqXHR, exception);
        })
        .always(function() {
            console.log("complete");
            $("#btn-simpan").prop('disabled', 0);
        });

    }

    function statusRecordNPWPD(data) {
        $("#div_stat_recs").html('<div align="center">Memuat data ....</div>');
        var parami = {
            sid : btoa(btoa(data.sid))
            , list_rek : data.list_rek
        }
        $.ajax({
            url: 'pelayanan/npwpd/statusRecordNPWPD',
            type: 'POST',
            dataType: 'html',
            data: jQuery.param(parami),
        })
        .done(function(respon) {
            $("#div_stat_recs").html(respon);
            pageSetUp();
        })
        .fail(function( jqXHR, exception ) {
            handelErr(jqXHR, exception);
        })
        .always(function() {
            console.log("complete");
        });
    }

    $(".btn-selesai-tutup-npwpd").click(function(event) {
    	$(".btnSimpanCetakNPWPD").click();
        $("#formpemohon_daftar").hide();
        detailIzinPemohon(window.idSubyek);
    });

    /*form validation*/
    loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js");
    //function runFormValidation() {
        var $FormData =window.validation_form_data = $("#form-data-subyek").validate({
                // Rules for form validation
                rules : {
                    "param[TSUBYEK_BUNAMAMERK]" : {
                        required : true
                    }
                    ,"param[REFJENISWP_ID]" : {
                        required : true
                    }
                    ,"param[tblsubyek_status]" : {
                        required : true
                    }
                    ,"param[tblsubyek_jenisusaha]" : {
                        required : true
                    }
                    ,"param[tblsubyek_wn]" : {
                        required : true
                    }
                    ,"param[tblsubyek_kodepos]" : {
                        maxlength : 5
                        ,digits : true
                    }
                },

                // Messages for form validation
                messages : {
                    "param[TSUBYEK_BUNAMAMERK]" : {
                        required : "Mohon entrikan Nama Pemohon / Badan Usaha / Merk Usaha"
                    }
                    ,"param[tblsubyek_alamat]" : {
                        required : "Mohon isikan alamat subyek"
                    }
                    ,"param[tblsubyek_status]" : {
                        required : "Mohon pilih status"
                    }
                    ,"param[tblsubyek_jenisusaha]" : {
                        required : "Mohon pilih status jenis usaha"
                    }
                    ,"param[tblsubyek_wn]" : {
                        required : "Mohon pilih kewarganegaraan"
                    }
                    ,"param[tblsubyek_kodepos]" : {
                        maxlength : "Maksimal 5 digit"
                        ,digits : "Masukkan dalam angka"
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

        var rulesWNIPerorangan = {
            "TSUBYEK_BUNIK" : {
                required: true
                ,onkeyup: false
                ,"remote" :
                {
                    url: '<?= Yii::app()->getBaseUrl(1) ?>/open_data/get/data/isExist',
                    type: "POST",
                    data:
                    {
                        value: function()
                        {
                            return $('#TSUBYEK_BUNIK').val().split('.').join('');
                        }
                        ,table: '<?= base64_encode('TSUBYEK') ?>'
                        ,field: '<?= base64_encode('TSUBYEK_BUNIK') ?>'
                        ,cmdcek: function(){
                            return 'x0*'+ btoa(window.cmd) +'x0*'
                        }
                        ,idx: function(){
                            return 'x0*'+ btoa(window.idSubyek) +'x0*'
                        }
                    }
                }
                ,messages: {
                    required: "Mohon entrikan identitas NIK Pemohon / WP"
                    ,remote: "Identitas sudah terdaftar di sistem"
                }
            }
        }

        var rulesWNIBadanUsaha = {
            "TSUBYEK_BUNPWP" : {
                required: true
                ,onkeyup: false
                ,"remote" :
                {
                    url: '<?= Yii::app()->getBaseUrl(1) ?>/open_data/get/data/isExist',
                    type: "POST",
                    data:
                    {
                        value: function()
                        {
                            return $('#TSUBYEK_BUNPWP').val().split('.').join('').split('-').join('');
                        }
                        ,table: '<?= base64_encode('TSUBYEK') ?>'
                        ,field: '<?= base64_encode('TSUBYEK_BUNPWP') ?>'
                        ,cmdcek: function(){
                            return 'x0*'+ btoa(window.cmd) +'x0*'
                        }
                        ,idx: function(){
                            return 'x0*'+ btoa(window.id) +'x0*'
                        }
                    }
                }
                ,messages: {
                    required: "Mohon entrikan nomor NPWP"
                    ,remote: "Identitas sudah terdaftar di sistem"
                }
            }

            /*,"tblsubyek_namapenanggungjawab" : {
                required : true
                ,messages: {
                    required: "Mohon entrikan nama penanggung jawab"
                }
            }*/
        }

        function addRules(rulesObj){
            for (var item in rulesObj){
                $('#'+item).rules('add',rulesObj[item]);
            }
            // console.log('add');
            // console.log(rulesObj);
        }
        function removeRules(rulesObj){
            for (var item in rulesObj){
                $('#'+item).rules('remove');
            }
            // console.log('remove');
            // console.log(rulesObj);
        }

    //};
    /*//form validation*/

    function setDefaultDistrict() {
        var provkode = '<?= AppConfig::model()->getValue('APLIKASI_PROVINSI_KODE') ?>';
        var kabkode = '<?= AppConfig::model()->getValue('APLIKASI_KABUPATEN_KODE') ?>';
        $("#TBLPROVINSI_ID").select2('val', provkode)
        getkabupaten('TBLKABUPATEN_ID', provkode, kabkode);
        getkecamatan('TBLKECAMATAN_ID', kabkode);
        
        $("#TSUBYEK_MILIKPROVID").select2('val', provkode)
        getkabupaten('TSUBYEK_MILIKKABID', provkode, kabkode);
        getkecamatan('TSUBYEK_MILIKKECID', kabkode);
    }

</script>   
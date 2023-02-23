<?php define('ASSETS_URL', $data['theme_baseurl']); ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-sm well-light bg-color-greenLight txt-color-white">
            <h4><i class="fa fa-file-text-o"></i> SKPDLB - Pajak <?= $this->PAJAK_NAMA ?> </h4>
        </div>
    </div>
</div>

<!-- widget grid -->
<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">


        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-teal" id="wid-id-SETRETRETE" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>Data</h2>
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
                        <form id="form_sumber_pajak" class="smart-form">
                            <div class="alert alert-block alert-success ng-scope">
                                <fieldset style="background: #cde0c4;">
                                    <header style="margin: -2% 0% 0% 0%;background: #cde0c4;">Validasi Penyetoran</header><br>
                                    <div class="row">
                                        <section class="col col-md-1">Tahun</section>
                                        <section class="col col-md-2">
                                            <label class="input">
                                                <input type="number" name="TBLPENDATAAN_THNPAJAK" id="TBLPENDATAAN_THNPAJAK" value="<?php echo date('Y'); ?>">
                                            </label>
                                        </section>
                                        <section class="col col-md-1">Bulan Pajak</section>
                                        <section class="col col-md-2">
                                            <label class="select">
                                                <select class="select2" name="TBLPENDATAAN_BLNPAJAK" id="TBLPENDATAAN_BLNPAJAK">
                                                    <option value="0">-- Silahkan Pilih --</option>
                                                    <?php for ($b = 1; $b <= 12; $b++) : ?>
                                                        <option value="<?= ($b) ?>"><?= LokalIndonesia::getBulan($b) ?></option>
                                                    <?php endfor ?>
                                                </select>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-md-1">Nomor Pokok</section>
                                        <section class="col col-md-4">
                                            <label class="input">
                                                <input class="form-control" type="text" id="TBLDAFTAR_NOPOK" name="TBLDAFTAR_NOPOK" autocomplete="on">
                                            </label>
                                        </section>
                                        <section class="col col-md-1">Tanggal</section>
                                        <section class="col col-md-2">
                                            <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                <input type="number" min="1" max="31" name="TBLPENDATAAN_TGLPAJAK" id="TBLPENDATAAN_TGLPAJAK">
                                            </label>
                                        </section>
                                        <section class="col col-md-1">
                                            <button type="button" onclick="cari()" class="btn btn-sm btn-primary">Enter</button>
                                        </section>
                                    </div>
                                </fieldset>
                            </div>
                            <fieldset id="fieldset_sumber_pajak">
                                <div class="row">
                                    <section class="col col-md-12">
                                        <h4 align="center"><b>Entry SKPDLB Pajak <?= $this->PAJAK_NAMA ?></b></h4>
                                    </section>
                                </div>
                                <header style="margin: -6px;">Perorangan</header><br>
                                <div class="row">
                                    <section class="col col-md-2">Nama</section>
                                    <section class="col col-md-5" style="margin-left: 2%;">
                                        <label class="input">
                                            <input class="disabled form-control" type="text" id="TBLDAFTAR_BADANUSAHANAMA" name="TBLDAFTAR_BADANUSAHANAMA" readonly="">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-2">Alamat</section>
                                    <section class="col col-md-5" style="margin-left: 2%;">
                                        <label class="textarea">
                                            <textarea class="disabled form-control" rows="4" id="TBLDAFTAR_BADANUSAHAALAMAT" name="TBLDAFTAR_BADANUSAHAALAMAT" readonly=""></textarea>
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-2">Rekening</section>
                                    <section class="col col-md-5" style="margin-left: 2%;">
                                        <label class="input">
                                            <input class="disabled form-control" type="text" id="NOMOR_REKENING" name="NOMOR_REKENING" readonly="">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-2">Bulan Awal</section>
                                    <section class="col col-md-2" style="margin-left: 2%;">
                                        <label class="select">
                                            <select class="select2" name="TBLLBHBAYAR_BLNLBAWAL" id="TBLLBHBAYAR_BLNLBAWAL">
                                                <option value="0">-- Silahkan Pilih --</option>
                                                <?php for ($b = 1; $b <= 12; $b++) : ?>
                                                    <option value="<?= ($b) ?>"><?= LokalIndonesia::getBulan($b) ?></option>
                                                <?php endfor ?>
                                            </select>
                                        </label>
                                    </section>
                                    <section class="col col-md-2">Sampai Bulan</section>
                                    <section class="col col-md-2" style="margin-left: 2%;">
                                        <label class="select">
                                            <select readonly class="select2" name="TBLLBHBAYAR_BLNLBAKHIR" id="TBLLBHBAYAR_BLNLBAKHIR">
                                                <option value="0">-- Silahkan Pilih --</option>
                                                <?php for ($b = 1; $b <= 12; $b++) : ?>
                                                    <option value="<?= ($b) ?>"><?= LokalIndonesia::getBulan($b) ?></option>
                                                <?php endfor ?>
                                            </select>
                                        </label>
                                    </section>
                                </div>
                                <div class="row" style="display: none;">
                                    <section class="col col-md-2"><b>Ketetapan Pajak SKPD</b></section>
                                </div>
                                <div class="row" style="display: none;">
                                    <section class="col col-md-2" style="margin-left: 2%;">Jumlah Pajak</section>
                                    <section class="col col-md-5">
                                        <label class="input">
                                            <input class="disabled input-sm format-rupiah" type="text" id="<?= $this->namatabel ?>_PAJAK" name="<?= $this->namatabel ?>_PAJAK" disabled="disabled">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-2"><b>Setoran Pajak SSPD</b></section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-2" style="margin-left: 2%;"> Pajak Terbayar</section>
                                    <section class="col col-md-5">
                                        <label class="input">
                                            <input class="form-control format-rupiah" type="text" name="REFLEBIHBAYAR_TERBAYAR" id="REFLEBIHBAYAR_TERBAYAR">
                                        </label>
                                    </section>
                                </div>

                                <div class="row">
                                    <section class="col col-md-2"><b>Pemeriksaan Pajak</b></section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-2" style="margin-left: 2%;">Nomor Pemeriksaan</section>
                                    <section class="col col-md-2">
                                        <label class="input">
                                            <input class="form-control" type="text" id="TBLLBHBAYAR_NOMORPERIKSA" name="TBLLBHBAYAR_NOMORPERIKSA">
                                        </label>
                                    </section>
                                    <section class="col col-md-1">Tgl Periksa</section>
                                    <section class="col col-md-2">
                                        <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                            <input type="text" name="TBLLBHBAYAR_TGLPERIKSA" class="datepicker" data-dateformat="dd-mm-yy" id="TBLLBHBAYAR_TGLPERIKSA">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-2" style="margin-left: 2%;">Pajak Periksa</section>
                                    <section class="col col-md-5">
                                        <label class="input">
                                            <input class="form-control format-rupiah" type="text" id="TBLLBHBAYAR_PAJAKPERIKSA" name="TBLLBHBAYAR_PAJAKPERIKSA">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-2"><b>Lebih Bayar (SKPDLB)</b></section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-2" style="margin-left: 2%;">Nomor SKPDLB</section>
                                    <section class="col col-md-2">
                                        <label class="input">
                                            <input class="disabled form-control" readonly="" type="text" id="TBLLBHBAYAR_REGLEBIHBAYAR" name="TBLLBHBAYAR_REGLEBIHBAYAR">
                                        </label>
                                    </section>
                                    <section class="col col-md-1">Tgl SKPDLB</section>
                                    <section class="col col-md-2">
                                        <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                            <input type="text" name="TBLLBHBAYAR_TGLLEBIHBAYAR" class="datepicker" data-dateformat="dd-mm-yy" id="TBLLBHBAYAR_TGLLEBIHBAYAR">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-2" style="margin-left: 2%;">Jumlah Lebih Bayar</section>
                                    <section class="col col-md-5">
                                        <label class="input">
                                            <input class="disabled form-control format-rupiah"  readonly="" type="text" id="TBLLBHBAYAR_RUPIAHLBHBAYAR" name="TBLLBHBAYAR_RUPIAHLBHBAYAR">
                                        </label>
                                    </section>
                                </div>
                            </fieldset>
                            <footer id="footer-toolbar">
                                <div>
                                    <button id="btnSimpan" type="submit" class="btn btn-sm btn-primary">
                                        <i class="fa fa-save"></i>&nbsp;Simpan
                                    </button>
                                    <button id="btnReset" type="button" onclick="window.location.reload" class="btn btn-sm btn-default" data-dismiss="modal">
                                        <i class="fa fa-ban"></i> Batal
                                    </button>
                                    <button type="button" class="btn btn-sm btn-success" onclick="cetakWord()">
                                        <i class="fa fa-print"></i>&nbsp;Cetak
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

</section>
<!-- end widget grid -->




<script type="text/javascript">
    pageSetUp();

    jQuery(document).ready(function($) {
        reloadDT('dt_basic');
        $('#footer-toolbar').hide('fast');

        $("#TBLLBHBAYAR_BLNLBAKHIR").select2('readonly', 1)

        $("#TBLLBHBAYAR_PAJAKPERIKSA").change(function(event) {
        	var setoran = parseFloat(toAngka($("#REFLEBIHBAYAR_TERBAYAR").val()))
        	var pajak_periksa = parseFloat(toAngka($("#TBLLBHBAYAR_PAJAKPERIKSA").val()))
        	var pajak_lb = setoran - pajak_periksa
        	$("#TBLLBHBAYAR_RUPIAHLBHBAYAR").val(pajak_lb)
        	setPriceFormat()
        });
    });

    loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function() {
        generateAutocomplete();
    });

    function generateAutocomplete() {
        $('#TBLDAFTAR_NOPOK').autocomplete({
            serviceUrl: '<?= $this->MODUL_URL ?>/autocomplete',

            onSelect: function(suggestion) {
                //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
                window.id = suggestion.data;
                window.nopokok = suggestion.TBLDAFTAR_NOPOK;
                window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
                window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
                $(this).val(suggestion.value);
                $('#TBLDAFTAR_NOPOK').val(suggestion.value.split(' | ')[0]);

            },
            showNoSuggestionNotice: true,
            noCache: true,
            noSuggestionNotice: "Tidak ditemukan hasil"
        });
    }

    loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);

    function runFormValidation() {
        var $FormData = $("#form_sumber_pajak").validate({
            // Rules for form validation
            rules: {
                "TBLPENDATAAN_THNPAJAK": {
                    required: true
                },
                "TBLLBHBAYAR_BLNLBAWAL": {
                    required: true
                },
                "TBLLBHBAYAR_NOMORPERIKSA": {
                    required: true
                },
                "TBLLBHBAYAR_TGLPERIKSA": {
                    required: true
                },
                "TBLLBHBAYAR_REGLEBIHBAYAR": {
                    required: true
                },
                "TBLLBHBAYAR_TGLLEBIHBAYAR": {
                    required: true
                },
                "TBLDAFTAR_NOPOK": {
                    required: true
                },
                "TBLLBHBAYAR_RUPIAHLBHBAYAR": {
                    required: true
                },
            },

            // Messages for form validation
            messages: {
                "TBLPENDATAAN_THNPAJAK": {
                    required: 'Mohon isikan entian berikut',
                },
                "TBLLBHBAYAR_BLNLBAWAL": {
                    required: 'Mohon isikan entian berikut',
                },
                "TBLLBHBAYAR_NOMORPERIKSA": {
                    required: 'Mohon isikan entian berikut',
                },
                "TBLLBHBAYAR_TGLPERIKSA": {
                    required: 'Mohon isikan entian berikut',
                },
                "TBLLBHBAYAR_REGLEBIHBAYAR": {
                    required: 'Mohon isikan entian berikut',
                },
                "TBLLBHBAYAR_TGLLEBIHBAYAR": {
                    required: 'Mohon isikan entian berikut',
                },
                "TBLDAFTAR_NOPOK": {
                    required: 'Mohon isikan entian berikut',
                },
                "TBLLBHBAYAR_RUPIAHLBHBAYAR": {
                    required: 'Mohon isikan entian berikut',
                },
            },

            // Do not change code below
            errorPlacement: function(error, element) {
                error.insertAfter(element.parent());
            },
            submitHandler: function(form) {
                // saat validasi benar semua, jalankan simpan()
                return simpanskpdlb();
            }
        });

    };

    function cetakWord() {
        var param = jQuery.param({
            TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val(),
            TBLPENDATAAN_BLNPAJAK: $("#TBLLBHBAYAR_BLNLBAKHIR").select2('val'),
            TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
        });
        window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/<?= $this->MODUL_URL ?>/cetakword?' + param);
    }

    function cari() {
        var CARI_NOPOK = $('#TBLDAFTAR_NOPOK').val();
        var BULAN_PAJAK = $('#TBLPENDATAAN_BLNPAJAK').select2('val');
        var TAHUN = $('#TBLPENDATAAN_THNPAJAK').val();
        var TGLPAJAK = $('#TBLPENDATAAN_TGLPAJAK').val();

        if (BULAN_PAJAK == 0) {
        	notifikasi('Maaf', 'Mohon pilih bulan pajak', 'x', 1, 0)
        	return false
        }

        $("#fieldset_sumber_pajak input, #fieldset_sumber_pajak textarea, #fieldset_sumber_pajak select").val('')
        $("#fieldset_sumber_pajak select.select2").select2('val', '')

        $("#TBLLBHBAYAR_BLNLBAKHIR").select2('val', BULAN_PAJAK)
        // disable bulan lebih dari bln akhir
        for (var i = 1; i <= 12; i++) {
            var elm = $("#TBLLBHBAYAR_BLNLBAWAL option")[i]
            $(elm).prop('disabled', 0);
            // console.log(i, 'remove disabled')
            if (i > parseInt(BULAN_PAJAK)) {
                // console.log(i, 'lebih dari', parseInt(BULAN_PAJAK))
                $(elm).prop('disabled', 1);
            }
        }

        getNoSKPDLB(TAHUN);

        if (CARI_NOPOK == '') {
            notifikasi('Informasi', 'Mohon isikan No Pokok WP', 'failed', 1, 0);
        } else if (TAHUN == '') {
            notifikasi('Informasi', 'Mohon isikan Tahun', 'failed', 1, 0);
        } else if (BULAN_PAJAK == '') {
            notifikasi('Informasi', 'Mohon isikan Bulan', 'failed', 1, 0);
        } else {
            $.ajax({
                url: '<?= $this->MODUL_URL ?>/getdata',
                type: 'POST',
                dataType: 'json',
                data: {
                    TBLDAFTAR_NOPOK: CARI_NOPOK,
                    tgl_pajak: TGLPAJAK,
                    bulan_pajak: BULAN_PAJAK,
                    tahun: TAHUN
                },
                success: function(respon) {
                    if (respon.data == 'sudah entri') {
                    	// sudah masuk lebih bayar
                        $.SmartMessageBox({
                            title: "Informasi", // judul Smart Alert
                            content: "Data SKPDN dengan Nomor Pokok " + CARI_NOPOK + ", Masa Pajak " + BULAN_PAJAK + " " + TAHUN + " sudah pernah entri. <br> Apakah anda ingin melihat data ini?", // konten dari smart alert
                            buttons: '[Tidak][Ya]' // pengaturan tombol
                        }, function(ButtonPressed) {
                            if (ButtonPressed === "Ya") {

                                $('#TBLDAFTAR_BADANUSAHANAMA').val(respon.TBLDAFTAR_BADANUSAHANAMA);
                                $('#TBLDAFTAR_BADANUSAHAALAMAT').val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
                                $('#NOMOR_REKENING').val('1.20.1.20.26.0.0.' + respon.REFBADANUSAHA_REKPENDAPATAN + '.' + respon.REFBADANUSAHA_REKPAD + '.' + respon.REFBADANUSAHA_REKPJK + '.' + respon.REFBADANUSAHA_REKAYAT + '.' + respon.REFBADANUSAHA_REKJENIS + '.0');

                                $('#REFLEBIHBAYAR_TERBAYAR').val(respon.REFLEBIHBAYAR_TERBAYAR);
                                $('#TBLLBHBAYAR_NOMORPERIKSA').val(respon.TBLLBHBAYAR_NOMORPERIKSA);
                                $('#TBLLBHBAYAR_PAJAKPERIKSA').val(respon.TBLLBHBAYAR_PAJAKPERIKSA);
                                $('#TBLLBHBAYAR_REGLEBIHBAYAR').val(respon.TBLLBHBAYAR_REGLEBIHBAYAR);
                                $('#TBLLBHBAYAR_RUPIAHLBHBAYAR').val(respon.TBLLBHBAYAR_RUPIAHLBHBAYAR);

                                // $('#<?= $this->namatabel ?>_PAJAKPERIKSA').attr('disabled', 'disabled');
                                // $('#<?= $this->namatabel ?>_PAJAKPERIKSA').attr('style', 'background:#eee');

                                if (respon.TBLLBHBAYAR_TGLPERIKSA == undefined) {
                                    $('#TBLLBHBAYAR_TGLPERIKSA').val('<?= date('d-m-Y') ?>');
                                } else {
                                    $('#TBLLBHBAYAR_TGLPERIKSA').val(respon.TBLLBHBAYAR_TGLPERIKSA + '-' + respon.TBLLBHBAYAR_BLNPERIKSA + '-20' + respon.TBLLBHBAYAR_THNPERIKSA);
                                }
                                $('#TBLLBHBAYAR_TGLLEBIHBAYAR').val(respon.TBLLBHBAYAR_TGLLEBIHBAYAR + '-' + respon.TBLLBHBAYAR_BLNLEBIHBAYAR + '-20' + respon.TBLLBHBAYAR_THNLEBIHBAYAR);

                                window.BULAN_DENDA = respon.BULAN_DENDA;
                                window.PERSEN_DENDA = respon.PERSEN_DENDA;
                                $('#footer-toolbar').show('fast');
                                $("#btnSimpan").hide()
                                $("#btnReset").hide()
                                setPriceFormat();

                            }
                        });
                        return false;

                    } else if (respon.data == 'sudah terdaftar') {
                    	// sudah pendataan & setor, belum LB
                        $('#TBLDAFTAR_BADANUSAHANAMA').val(respon.TBLDAFTAR_BADANUSAHANAMA);
                        $('#TBLDAFTAR_BADANUSAHAALAMAT').val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
                        $('#NOMOR_REKENING').val('1.20.1.20.26.0.0.' + respon.REFBADANUSAHA_REKPENDAPATAN + '.' + respon.REFBADANUSAHA_REKPAD + '.' + respon.REFBADANUSAHA_REKPJK + '.' + respon.REFBADANUSAHA_REKAYAT + '.' + respon.REFBADANUSAHA_REKJENIS + '.0');

                        $('#TBLLBHBAYAR_TGLLEBIHBAYAR').val('<?= date('d-m-Y') ?>');

                        getNoSKPDLB(TAHUN);
                        window.BULAN_DENDA = respon.BULAN_DENDA;
                        window.PERSEN_DENDA = respon.PERSEN_DENDA;
                        $('#footer-toolbar').show('fast');
                        $("#btnSimpan").show()
                        $("#btnReset").show()
                        setPriceFormat();

                    } else if (respon.data == 'belum terdaftar') {
                        notifikasi('Referensi SPT Belum Terdaftar', 'Data SPT dengan nomor ' + $('#TBLDAFTAR_NOPOK').val() + ' Belum Terdaftar', 'failed', 1, 0);
                        $('#footer-toolbar').hide('fast');
                    } else if (respon.data == 'belum bayar') {
                        notifikasi('Referensi SPT Belum Terbayar', 'Data SPT dengan nomor ' + $('#TBLDAFTAR_NOPOK').val() + ' Belum Melakukan Pembayaran', 'failed', 1, 0);
                        $('#footer-toolbar').hide('fast');
                    }
                }
            });
        }
    }

    function getNoSKPDLB(tahun) {
        $.ajax({
            url: '<?= $this->MODUL_URL ?>/getNoSKPDLB',
            type: 'POST',
            dataType: 'json',
            data: {
                tahun: tahun
            },
            success: function(respon) {
                if (respon == '') {
                    $('#TBLLBHBAYAR_REGLEBIHBAYAR').val(1);

                } else {
                    $('#TBLLBHBAYAR_REGLEBIHBAYAR').val(respon.NOLB);
                    // if ($('#<?= $this->namatabel ?>_TGLBTSKRGBAYAR').val()=='') {
                    // 	$("#<?= $this->namatabel ?>_TGLKURANGBAYAR").trigger('change');
                    // }
                }
            }
        });
    }

    function simpanskpdlb() {
        $.ajax({
            url: '<?= $this->MODUL_URL ?>/SimpanSKPDLB',
            type: 'post',
            dataType: "json",
            data: $("#form_sumber_pajak").serialize(),
            success: function(data) {
                if (data.status == "success") {
                    notifikasi('Sukses', 'Data Berhasil Disimpan', 'success', 1, 0);
                } else {
                    notifikasi('Gagal', 'Data Gagal Disimpan', 'fail', 1, 0);
                }
            }
        });
    }
</script>

<style type="text/css">
	input.disabled,textarea.disabled,select.disabled {
		background: #e4e4e4!important;
	}
</style>

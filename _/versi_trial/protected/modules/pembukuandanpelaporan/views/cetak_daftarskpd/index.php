<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-sm well-light bg-color-greenLight txt-color-white">
            <h4><i class="fa fa-file-text-o"></i> Cetak Daftar SKPD </h4>
        </div>
    </div>
</div>

<section id="" class="">
    <!-- row -->
    <div class="row">

        
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-teal" id="wid-id-validasi_penyetoran" 
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
            <header role="heading">
                <span class="widget-icon"><i class="fa fa-book"></i></span>
                <h2> Daftar SKPD </h2>
                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
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

                    <form action="" id="form_sumber_pajak" class="smart-form" novalidate>
                        <fieldset>

                            <div class="row">
                                <section class="col col-sm-2">
                                    <P><b>Rekening</b></p>
                                    </section>
                                    <section class="col col-md-3">
                                        <label class="select">
                                            <select class="select2" enabled="enabled" name="rekeningbwh" id="rekeningbwh">
                                                <option value="" >Pilih Pajak</option>
                                                <?php foreach ($data['rek'] as $list): ?>
                                                    <option value="<?php echo $list['TBLREKENING_REKAYAT'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-sm-2">
                                        <p> Tanggal Awal</p>
                                    </section>
                                    <section class="col col-md-3">
                                        <label class="input">
                                            <i class="icon-append fa fa-calendar"></i>
                                            <input name="tglawl" value="<?php echo date('d-m-Y') ?>" class="datepicker Datepicker" data-dateformat="dd-mm-yy" id="tglawl">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-sm-2">
                                        <p> Tanggal Akhir</p>
                                    </section>
                                    <section class="col col-md-3">
                                        <label class="input">
                                            <i class="icon-append fa fa-calendar"></i>
                                            <input name="tglakhir" value="<?php echo date('d-m-Y') ?>" class="datepicker Datepicker" data-dateformat="dd-mm-yy" id="tglakhir">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <footer id="footer_cetakdata">
                                       <!--  <section class="col col-md-2" style="display: none;">
                                            <a class="btn btn-sm btn-primary" style="float: left;" disabled="disabled" onclick="cetakkecilbawah()">
                                                <i class="fa fa-save"></i> Cetak Kecil
                                            </a>
                                        </section>
                                        <section class="col col-md-2" style="display: none;">
                                            <a class="btn btn-sm btn-primary" style="float: left;" onclick="cetakbawah()">
                                                <i class="fa fa-save"></i> Cetak Word
                                            </a>
                                        </section> -->
                                        <section class="col col-md-2">
                                            <a class="btn btn-sm btn-success" style="float: left;" onclick="cetakbawahhtml()">
                                                <i class="fa fa-save"></i> Cetak Excell
                                            </a>
                                        </section>
                                    </footer>
                                </div>

                            </fieldset>     

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

    jQuery(document).ready(function($) {
      $('#bulan').select2('val', <?= date('m') ?> );
  });

    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }


    function myFunction() {
        document.getElementById("myNumber").defaultValue = "16";
    }

    
 function cetakbawahhtml(){
   if ($('#rekeningbwh').select2('val')=='') {
    notifikasi('Informasi','Mohon Isikan Rekening Pajak','failed',1,0);
    }else {
        var tahun = $('#tahun').val();
        var bulan = $('#bulan').val();
        var tanggal = $('#tanggal').val();
        var rekeningbwh= $('#rekeningbwh').val();
        var tglawl= $('#tglawl').val();
        var tglakhir= $('#tglakhir').val();
        window.open('<?php Yii::app()->getBaseUrl(1); ?>/pembukuandanpelaporan/cetak_daftarskpd/cetakbawahhtml?rekening='+rekeningbwh+'&tglawl='+tglawl+'&tglakhir='+tglakhir+'&tahun='+tahun+'&bulan='+bulan+'&tanggal='+tanggal);

    }
}

</script>
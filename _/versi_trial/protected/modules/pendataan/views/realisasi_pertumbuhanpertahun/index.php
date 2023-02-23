<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="well well-sm well-light bg-color-greenLight txt-color-white">
      <h4><i class="fa fa-file-text-o"></i> Realisasi dan Pertumbuhan Pajak Daerah pertahun  </h4>
    </div>
  </div>
</div>

<section id="" class="">
  <!-- row -->
  <div class="row">

    <!-- NEW WIDGET START -->
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
                <span class="widget-icon"><i class="fa fa-list-ul"></i></span>
                <h2> Realisasi dan Pertumbuhan Pajak Daerah pertahun</h2>
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
                          <section class="col col-2">
                            <p>cut off tahun realisasi </p>
                        </section>
                        
                        <section class="col col-2">
                          <label class="input">
                             <input class="input-sm" value="<?php echo date('Y'); ?>" type="number" id="tahun_penetapan" name="param[tahun_penetapan]">
                          </label>
                     </section>

                     <section class="col col-md-1" >
                          <label class="checkbox">
                             S/&
                          </label>
                        </section>
                        <section class="col col-2">
                          <label class="input">
                             <input class="input-sm" value="<?php echo date('Y'); ?>" type="number" id="tahun_penetapan" name="param[tahun_penetapan]">
                          </label>
                     </section>
                    </div>
                                                             
            <div class="row">
              <footer id="footer_cetakdata">
                <section class="col col-md-2">
                  <button type="button" class="btn btn-sm btn-primary" onclick="cetak('html')" >
                    <i class="fa fa-print"></i> Cetak
                  </button>
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
  $("#TBLREKENING_KODE").change(function(event) {
    getRekeningSub($("#TBLREKENING_KODE").val());
  });
  
  function cetak (tipe) {
     window.open('<?php echo Yii::app()->baseUrl; ?>/pendataan/Realisasi_pertumbuhanpertahun/Cetak_daftar?tipe='+tipe);
  }

  function cetakv2 () {
    var TBLREKENING_KODE = $('#TBLREKENING_KODE').val();
        if (TBLREKENING_KODE=='') {
        notifikasi('Informasi','Mohon isikan Rekening Pajak','failed',1,0);
        } else {
          window.tahunpjk = $('#tahunpjk').val();
          window.tahun_penetapan = ($('#tahun_tap').prop('checked') ? $('#tahun_penetapan').val() : ''),
          window.TBLREKENING_KODE = $('#TBLREKENING_KODE').val();
          window.APP_URL = "<?php echo $data['URL_APP']; ?>";
          window.open(window.APP_URL+'/penagihan/Daftra_bukukendali_skpdb/cetakv2?tahunpjk='+window.tahunpjk+'&TBLREKENING_KODE='+window.TBLREKENING_KODE+'&tahun_penetapan='+window.tahun_penetapan);
        }
   }     

  function getRekeningSub(rekeningkode) {
    $.ajax({
      url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/subrekening?kode=4.1.1.2.',
      type: 'POST',
      dataType: 'json',
      data: {kode: rekeningkode},
    })
    .done(function(respon) {
      setComboList ('TBLREKENING_KODESUB', 'Sub Rekening', respon);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  }    
</script>

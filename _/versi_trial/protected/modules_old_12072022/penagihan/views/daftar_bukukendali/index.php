<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="well well-sm well-light bg-color-greenLight txt-color-white">
      <h4><i class="fa fa-file-text-o"></i> Cetak Laporan Buku Kendali </h4>
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
                <h2> Daftar Kartu Data Pajak Reklame </h2>
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
                        <section class="col col-sm0">
                          <h4><b>Masa Pajak</b></h4>
                        </section>
                        <section class="col col-sm-1">
                          <label class="input">
                            <input type="text" id="masapajak" name="param[masapajak]" placeholder="Tahun">
                          </label>
                        </section>
                        <section class="col col-sm-1">
                          <label class="input">
                            <input type="text" maxlength="2" id="bulan" name="param[bulan]" placeholder="Bulan">
                          </label>
                        </section>
                      </div>
                      <div class="row">
                        <section class="col col-3">
                          <label class="select">
                           <select class="select2" id="TBLREKENING_KODE" name="param[TBLREKENING_KODE]">
                            <option value="">-- Pilih Rekening --</option>
                            <?php foreach ($data['rek'] as $list): ?>
                              <option value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </label>
                      </section>
                    </div>
                    <div class="row">
                      <section class="col col-3">
                        <label class="select">
                         <select class="select2" id="TBLREKENING_KODESUB" name="param[TBLREKENING_KODESUB]">
                          <option value="">-- Pilih Rekening --</option>
                          <?php foreach ($data['sub_rek'] as $list): ?>
                            <option value="<?php echo $list['TREKENING_KODE'] ?>">[<?php echo $list['TREKENING_KODE'] ?>] <?php echo $list['TREKENING_NAMA'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </label>
                    </section>
                  </div>
                  <div class="row">
                    <section class="col col-1">
                      <p>Kecamatan</p>
                    </section>
                    <section class="col col-3">
                      <label class="select">
                        <select class="select2" id="TBLKECAMATAN_ID" name="param[TBLKECAMATAN_ID]">
                          <option value="">-- Pilih Kecamatan --</option>
                          <?php foreach ($data['list_kecamatan'] as $list): ?>
                            <option value="<?php echo $list['REFKECAMATAN_ID'] ?>">[<?php echo $list['REFKECAMATAN_ID'] ?>] <?php echo $list['REFKECAMATAN_NAMA'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </label>
                    </section>
                  </div>
                  <div class="row">
                    <section class="col col-1">
                      <p>Kd Jalan</p>
                    </section>
                    <section class="col col-3">
                      <label class="select">
                        <select class="select2" id="JALAN" name="param[JALAN]">
                          <option value="">-- Pilih Jalan --</option>
                          <?php foreach ($data['list_jalan'] as $list): ?>
                            <option value="<?php echo $list['KODE'] ?>"> <?php echo $list['NMJLN'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </label>
                    </section>
                  </div>
                  <div class="row">
                    <section class="col col-sm0">
                     <p>Cara Penetapan</p>
                   </section>
                   <section class="col col-sm-1">
                    <label class="input">
                     <input type="text" id="cara_penetapan" name="param[cara_penetapan]" maxlength="1">
                   </label>
                 </section>
                 <section class="col col-1">
                  <p>S/O</p>
                </section>
              </div>   
              <div id="cutoff" style="display:none;">
                <div class="row" >
                  <section class="col col-md-2">
                    Tanggal SKPD Cut Off
                  </section>
                  <section class="col col-md-3">
                    <label class="input"><i class="icon-append fa fa-calendar"></i>
                      <input type="text" id="cutoff" name="param[cutoff]" class="datepicker" data-dateformat="dd-mm-yy" >
                    </label>
                  </section>
                </div>        
              </div>                                                                             
              <div class="row">
                <footer id="footer_cetakdata">
                  <section class="col col-md-5">
                    <button type="button" class="btn btn-sm btn-primary" onclick="cetak()" >
                      <i class="fa fa-save"></i> Cetak HTML 
                    </button> 
                    <button type="button" class="btn btn-sm btn-primary" onclick="cetakword()" >
                      <i class="fa fa-save"></i> Cetak Word 
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

  function getRekeningSub(rekeningkode) {
    $.ajax({
      url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/subrekening',
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

  function cetak () {
        window.masapajak = $('#masapajak').val();
        window.bulan = $('#bulan').val();
        window.cara_penetapan = $('#cara_penetapan').val();
        window.JALAN = $('#JALAN').val();
        window.TBLREKENING_KODE = $('#TBLREKENING_KODE').val();
        window.TBLKECAMATAN_ID = $('#TBLKECAMATAN_ID').val();
        window.APP_URL = "<?php echo $data['URL_APP']; ?>";
        window.open(window.APP_URL+'/penagihan/Daftar_bukukendali/cetak?masapajak='+window.masapajak+'&TBLREKENING_KODE='+window.TBLREKENING_KODE+'&cara_penetapan='+window.cara_penetapan+'&TBLKECAMATAN_ID='+window.TBLKECAMATAN_ID+'&JALAN='+window.JALAN+'&bulan='+window.bulan);
      }

      function cetakword(){
      var param = jQuery.param(
      {
        // TBLREKENING_REKAYAT: $("#TBLREKENING_AYAT").val(),
        masapajak: $('#masapajak').val(),
        bulan: $('#bulan').val(),
        cara_penetapan: $('#cara_penetapan').val(),
        JALAN: $('#JALAN').val(),
        TBLREKENING_KODE: $('#TBLREKENING_KODE').val(),
        TBLKECAMATAN_ID: $('#TBLKECAMATAN_ID').val(),
      });
      window.open('<?= Yii::app()->getBaseUrl(1); ?>/penagihan/Daftar_bukukendali/cetakword?'+ param);

    }
    </script>
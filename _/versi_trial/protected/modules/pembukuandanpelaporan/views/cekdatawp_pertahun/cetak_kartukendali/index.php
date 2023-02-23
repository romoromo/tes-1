<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="well well-sm well-light bg-color-greenLight txt-color-white">
      <h4><i class="fa fa-file-text-o"></i> Realisasi Per Rekening Pajak Per Bulan</h4>
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
                <h2> Daftar Realisasi </h2>
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
                        <p>Tahun Setor</p>
                      </section>
                        <section class="col col-sm-2">
                          <label class="input">
                           <input type="text" maxlength="4" id="tahun" name="tahun" placeholder="Tahun">
                         </label>
                       </section>
                       <section class="col col-sm-2">
                         <label class="input">
                           <input type="text" id="bulan" name="bulan" placeholder="Bulan">
                         </label>
                       </section>
                     </div>
                     <div class="row">
                      <section class="col col-2">
                        <p>Rekening</p>
                      </section>
                      <section class="col col-3">
                        <label class="select">
                          <select class="select2" id="TBLREKENING_KODE" name="TBLREKENING_KODE">
                            <option value="">-- Pilih Rekening --</option>
                            <?php foreach ($data['rek'] as $list): ?>
                              <option value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </label>
                      </section>
                    </div>
                    <div class="row">
                      <section class="col col-2">
                        <p>Sub Rekening</p>
                      </section>
                      <section class="col col-3">
                        <label class="select">
                          <select class="select2" id="TBLREKENING_KODESUB" name="TBLREKENING_KODESUB">
                            <option value="">-- Pilih Rekening --</option>
                            <?php foreach ($data['sub_rek'] as $list): ?>
                              <option value="<?php echo $list['TREKENING_KODE'] ?>">[<?php echo $list['TREKENING_KODE'] ?>] <?php echo $list['TREKENING_NAMA'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </label>
                      </section>
                    </div>
                    <div class="row">
                      <section class="col col-2">
                        <p>Kecamatan</p>
                      </section>
                      <section class="col col-3">
                        <label class="select">
                          <select class="select2" id="kec" name="kec">
                            <option value="">-- Pilih Kecamatan --</option>
                            <?php foreach ($data['list_kecamatan'] as $list): ?>
                              <option value="<?php echo $list['REFKECAMATAN_ID'] ?>">[<?php echo $list['REFKECAMATAN_ID'] ?>] <?php echo $list['REFKECAMATAN_NAMA'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </label>
                      </section>
                    </div>
                    <div class="row" style="display: none;">
                      <section class="col col-1">
                        <p>Kd Jalan</p>
                      </section>
                      <section class="col col-3">
                        <label class="select">
                          <select class="select2" id="jalan" name="jalan">
                            <option value="">-- Pilih Jalan --</option>
                            <?php foreach ($data['list_jalan'] as $list): ?>
                              <option value="<?php echo $list['KODE'] ?>"> <?php echo $list['NMJLN'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </label>
                      </section>
                    </div>
                    <div class="row" style="display: none;">
                      <section class="col col-sm0">
                       <p>Cara Penetapan</p>
                     </section>
                     <section class="col col-sm-1">
                      <label class="input">
                       <input type="text" maxlength="1" id="cara" name="cara">
                     </label>
                   </section>
                   <section class="col col-1">
                    <p>S/O</p>
                  </section>
                </div>                                                  
                <div class="row">
                  <footer id="footer_cetakdata">
                    <section class="col col-md-2">
                      <button class="btn btn-sm btn-primary" onclick="cetak()" style="float: left;">
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

  function cetak () {
   var TBLREKENING_KODE = $('#TBLREKENING_KODE').val();
   var bulan = $('#bulan').val();
   var tahun = $('#tahun').val();
   var cara = $(' cara').val();
   var kec = $('#kec').val();
   if (tahun=='') {
    notifikasi('Informasi','Mohon isikan Masa Pajak','failed',1,0);
    return false;
  }
  window.open('<?php echo Yii::app()->getBaseUrl(1) ?>/pembukuandanpelaporan/cetak_kartukendali/Cetak?tahun='+tahun+'&TBLREKENING_KODE='+TBLREKENING_KODE+'&bulan='+bulan+'&cara='+cara+'&kec='+kec);
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
<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="well well-sm well-light bg-color-greenLight txt-color-white">
      <h4><i class="fa fa-file-text-o"></i> Daftar Piutang SKPD Air Tanah </h4>
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
                <h2> Buku Kendali SKPD </h2>
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
                          <p>Tahun Pajak</p>
                        </section>
                        <section class="col col-sm-2">
                          <label class="input">
                            <!-- <input type="text" id="masapajak" name="param[masapajak]" placeholder="Tahun"> -->
                            <input type="number" value="<?= date('Y') ?>" id="masapajak" name="param[masapajak]" placeholder="Tahun">
                          </label>
                        </section>
                        <section class="col col-sm-2">
                          <label class="select">
                            <!-- <input type="text" maxlength="2" id="bulan" name="param[bulan]" placeholder="Bulan"> -->
                            <select class="select2" name="param[bulan]" id="bulan">
                        <option selected="" value="">== Pilih Bulan ==</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
                          </label>
                        </section>
                      </div>
                      <div class="row">
                        <section class="col col-sm-2">
                          <p>Tahun Penetapan</p>
                        </section>
                        <section class="col col-md-1" >
                          <label class="checkbox">
                              <input type="checkbox" name="th_skpd" id="th_skpd" ><i></i>
                          </label>
                        </section>
                        <section class="col col-sm-2">
                          <label class="input">
                            <!-- <input type="text" id="masapajak" name="param[masapajak]" placeholder="Tahun"> -->
                            <input type="number" value="<?= date('Y') ?>" id="tahuntap" name="param[tahuntap]" placeholder="Tahun">
                          </label>
                        </section>
                        <section class="col col-sm-2">
                          <label class="select">
                            <!-- <input type="text" maxlength="2" id="bulan" name="param[bulan]" placeholder="Bulan"> -->
                            <select class="select2" name="param[bulantap]" id="bulantap">
                        <option selected="" value="">== Pilih Bulan ==</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
                          </label>
                        </section>
                      </div>
                      <div class="row">
                        <section class="col col-sm-2">
                          <p>Jenis Rekening</p>
                        </section>
                        <section class="col col-3">
                          <label class="select">
                           <select class="select2" id="TBLREKENING_KODE" name="param[TBLREKENING_KODE]">
                            <option value="">-- Pilih Rekening --</option>
                            <?php foreach ($data['rek'] as $list): ?>
                              <option selected="" value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </label>
                      </section>
                    </div>
                    <div class="row" style="display: none;">
                      <section class="col col-sm-2">
                          <p>Jenis Sub Rekening</p>
                        </section>
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
                  <div class="row" style="display: none;">
                    <section class="col col-2">
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
                  <div class="row" style="display: none;">
                    <section class="col col-2">
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
                  <div class="row" style="display: none;">
                    <section class="col col-sm-2">
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
              
                <div class="row" >
                  <section class="col col-md-2">
                    Per Tanggal
                  </section>
                  <section class="col col-md-3">
                    <label class="input"><i class="icon-append fa fa-calendar"></i>
                      <input type="text" id="cutoff" name="param[cutoff]" class="datepicker" data-dateformat="dd-mm-yy" >
                    </label>
                  </section>
                </div>        
                                                                                           
              <div class="row">
                <footer id="footer_cetakdata">
                  <section class="col col-md-5">
                    <button type="button" class="btn btn-sm btn-primary" onclick="cetak()" >
                      <i class="fa fa-save"></i> Cetak Rekap
                    </button> 
                    <!-- <button type="button" class="btn btn-sm btn-primary" onclick="cetakword()" >
                      <i class="fa fa-save"></i> Cetak Word 
                    </button> -->
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
        var TBLREKENING_KODE = $('#TBLREKENING_KODE').val();
        if (TBLREKENING_KODE=='') {
        notifikasi('Informasi','Mohon isikan Rekening Pajak','failed',1,0);
        } else {
        window.masapajak = $('#masapajak').val();
        window.bulan = $('#bulan').val();
        window.tahuntap = ($('#th_skpd').prop('checked') ? $('#tahuntap').val() : '');
        window.bulantap = $('#bulantap').val();
        window.cara_penetapan = $('#cara_penetapan').val();
        window.cutoff = $('#cutoff').val();
        window.TBLREKENING_KODE = $('#TBLREKENING_KODE').val();
        window.TBLKECAMATAN_ID = $('#TBLKECAMATAN_ID').val();
        window.APP_URL = "<?php echo $data['URL_APP']; ?>";
        window.open(window.APP_URL+'/pembukuandanpelaporan/Daftar_piutang_airtanah/cetak?masapajak='+window.masapajak+'&TBLREKENING_KODE='+window.TBLREKENING_KODE+'&cara_penetapan='+window.cara_penetapan+'&TBLKECAMATAN_ID='+window.TBLKECAMATAN_ID+'&cutoff='+window.cutoff+'&bulan='+window.bulan+'&tahuntap='+window.tahuntap+'&bulantap='+window.bulantap);
      }
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
      window.open('<?= Yii::app()->getBaseUrl(1); ?>/pembukuandanpelaporan/Daftar_piutang_airtanah/cetakword?'+ param);

    }
    </script>
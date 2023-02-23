<?php 
  define('ASSETS_URL', Yii::app()->theme->baseUrl); 
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="well well-sm well-light bg-color-greenLight txt-color-white">
        <h4><i class="fa fa-pencil"></i> Entry Sewa Aset Insidentil </h4>
    </div>
    </div>
    </div>


<section id="" class="">
    <!-- row -->
    <div class="row">

        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

      <!-- Widget ID (each widget will need unique ID)-->

      <!-- end widget -->

      <div class="jarviswidget jarviswidget-color-teal jarviswidget-sortable" id="wid-87sd5dr87asf" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" role="widget" style="">
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
        <span class="widget-icon"> <i class="fa fa-check"></i> </span>
        <h2> Validasi Penyetoran </h2>

        <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
      </header>

        <!-- widget div-->
        <div role="content">

          <!-- widget edit box -->
          <div class="jarviswidget-editbox">
            <!-- This area used as dropdown edit box -->

          </div>
          <!-- end widget edit box -->

          <!-- widget content -->
          <div class="widget-body">

    <form id="form-pendataan-reklame2016_tetap" class="smart-form">
      <fieldset>
        <div class="row">
          <section class="col col-md-2">
            <p>No. Pokok WP</p>
          </section>
          <section class="col col-md-4">
            <label class="input">
              <input type="text" id="TBLDAFTAR_NOPOK" name="param[TBLDAFTAR_NOPOK]" placeholder="Ketik Nomor Pokok WP">
            </label>
          </section>
        </div>
        <div class="row">
          <section class="col col-md-2">
            <p>Masa Pajak</p>
          </section>
          <section class="col col-md-1">
            <label class="input">
              <input type="text" id="TBLPENDATAAN_THNPAJAK" name="param[TBLPENDATAAN_THNPAJAK]" value="<?= date('Y') ?>" placeholder="Tahun" maxlength="4">
            </label>
          </section>
          <section class="col col-md-2">
            <label class="select">
              <select class="" id="TBLPENDATAAN_BLNPAJAK" name="param[TBLPENDATAAN_BLNPAJAK]">
                <option selected="" value="0">-- Bulan --</option>
                <?php /*for ($i=1; $i<=12; $i++): ?>
                  <option <?php echo $i==(int)date('m') ? 'selected' : '' ?> value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
                <?php endfor*/ ?>
              </select><i class="fa fa-square"></i>
            </label>
          </section>
          <section class="col col-md-1">
            <label class="input">
              <input value="0" type="number" id="TBLDAFTREKLAME_TGLPAJAK" name="param[TBLDAFTREKLAME_TGLPAJAK]" placeholder="Tanggal" maxlength="2">
            </label>
          </section>

          <section class="col col-md-2">
            <button class="btn btn-sm btn-default" type="button" onclick="cari()">
              <i class="fa fa-forward"></i> Proses
            </button>
          </section>
        </div>

        <div class="row">
          <section class="col col-md-2">
            <p>Lokasi</p>
          </section>
          <section class="col col-md-1">
            <label class="input">
              <input value="1" type="number" id="TBLPENDATAAN_PAJAKKE" name="param[TBLPENDATAAN_PAJAKKE]" placeholder="Lokasi" maxlength="3">
            </label>
          </section>
      </div>
      </fieldset>
        <footer>
        <button type="button" class="btn btn-sm btn-primary" onclick="cetak()"><i class="fa fa-save"> Simpan </i></button>
        <button type="button" class="btn btn-sm btn-primary" onclick="cetak()"><i class="fa fa-print"> Cetak Ketetapan </i></button></footer>
      </form>
      <!-- end widget -->

</article>
</label>
</section>
<script type="text/javascript">
    pageSetUp();
    //$(".form_datetime").datetimepicker({
        //format: "dd MM yyyy - hh:ii",
    //});


</script>
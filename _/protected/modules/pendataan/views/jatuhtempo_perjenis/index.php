<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="well well-sm well-light bg-color-greenLight txt-color-white">
            <h4><i class="fa fa-file-text-o"></i> Jatuh Tempo Perjenis </h4>
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
        <span class="widget-icon"><i class="fa fa-file-text-o"></i></span>
          <h2> Daftar Kartu Data Pajak Reklame Jatuh Tempo </h2>
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
        <section class="col col-1">
            <label class="input">
                <p> Tanggal SPT </p>
            </label>
        </section>
        <section class="col col-1">
            <label class="input">
                <input type="text" placeholder="Tahun">
            </label>
        </section>
        <section class="col col-1">
            <label class="input">
                <input type="text" placeholder="Bulan">
            </label>
        </section>
        <section class="col col-1">
            <label class="input">
                <input type="text" placeholder="Tanggal">
        </label>
        </section>
    </div>
<div class="row">
  <section class="col col-1"></section>
  <section class="col col-2">
      <label class="select">
              <select class="input-md" enabled="enabled">
                <option value="0" ></option>
                <option value="1" >PAJAK REKLAME</option>
              </select><i></i>
      </label>
  </section>
</div>
<div class="row">
  <section class="col col-1"></section>
  <section class="col col-2">
      <label class="select">
              <select class="input-md" enabled="enabled">
                <option value="0" ></option>
                <option value="1" >MEGATRON/ VIDEOTRON NAMA USAHA</option>
                <option value="2" >BANDO JALAN ROKOK</option>
                <option value="3" >BANDO JALAN NON ROKOK</option>
              </select><i></i>
      </label>
  </section>
</div>
<div class="row">
        <section class="col col-1">
            <label class="input">
                <p> Cara </p>
            </label>
        </section>
        <section class="col col-1">
            <label class="input">
                <input type="text">
            </label>
        </section>
        <section class="col col-6">
            <label class="input">
                <p> Self Assesment (S)/ Official Assesment (O) </p>
            </label>
        </section>
</div>
<div class="row">
        <section class="col col-1">
            <label class="input">
                <p> Jenis </p>
            </label>
        </section>
        <section class="col col-1">
            <label class="input">
                <input type="text">
            </label>
        </section>
        <section class="col col-6">
            <label class="input">
                <p> Insidental (I) / Tetap (T) </p>
            </label>
        </section>
</div>
<div class="row">
  <section class="col col-1"></section>
  <section class="col col-2">
      <label class="select">
              <select class="input-md" enabled="enabled">
                <option value="0" ></option>
                <option value="1" >Mini</option>
                <option value="2" >Midi</option>
                <option value="3" >Maxi</option>
              </select><i></i>
      </label>
  </section>
</div>
<div class="row">
          <footer id="footer_cetakdata">
                  <section class="col col-10"></section>
                  <section class="col col-md-2">
                    <button class="btn btn-sm btn-primary" style="float: left;">
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
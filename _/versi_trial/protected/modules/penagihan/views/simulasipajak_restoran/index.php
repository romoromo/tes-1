<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="well well-sm well-light bg-color-greenLight txt-color-white">
            <h4><i class="fa fa-file-text-o"></i> Form Simulasi Setoran Pajak Restoran </h4>
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
        <span class="widget-icon"><i class="fa fa-search"></i></span>
          <h2> Validasi Penyetoran </h2>
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
                <p> Tahun </p>
            </label>
        </section>
        <section class="col col-1">
            <label class="input">
                <input type="text" placeholder="Tahun">
            </label>
        </section>
        <section class="col col-1">
            <label class="input">
                <p> Bulan</p>
            </label>
        </section>
        <section class="col col-1">
            <label class="input">
                <input type="text" placeholder="Bulan">
            </label>
        </section>
        <section class="col col-1">
            <label class="input">
                <p> Tanggal</p>
            </label>
        </section>
        <section class="col col-1">
            <label class="input">
                <input type="text" placeholder="Tanggal">
        </label>
        </section>
    </div>
<div class="row">
  <section class="col col-sm-1">
        <p> Jenis Setoran </p>
  </section>
  <section class="col col-md-2">
      <label class="select">
              <select class="input-md" enabled="enabled">
                <option value="0" ></option>
                <option value="1" >SPTPD</option>
                <option value="2" >SKPD</option>
                <option value="3" >STPD</option>
                <option value="4" >SKPDKB</option>
              </select><i></i>
      </label>
  </section>
</div>
<div class="row">
  <section class="col col-1">
        <p>Nomor Pokok</p>
  </section>
  <section class="col col-2">
      <label class="input">
        <input type="text">      
      </label>
  </section>
   <section class="col col-md-2">
          <button class="btn btn-sm btn-primary" style="float: left;">
              <i class="fa fa-save"></i> Enter
          </button>
      </section>
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
<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-sm well-light bg-color-greenLight txt-color-white">
            <h4><i class="fa fa-file-text-o"></i> Validasi Sewa Aset</h4>
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
                    <span class="widget-icon"><i class="fa fa-check-square"></i></span>
                    <h2> Validasi Penyetoran </h2>

                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

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
                                        <section class="col col-md-2">
                                            <p>Tahun/Bulan/Tanggal</p>
                                        </section>
                                        <section class="col col-2">
                                            <label class="select">
                                                <select class="input-md">
                                                    <option value="0"> Tahun </option>
                                                    <option value="1">2014</option>
                                                    <option value="2">2015</option>
                                                    <option value="3">2016</option>
                                                    <option value="4">2017</option>
                                                    <option value="5">-</option>
                                                </select><i></i>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="select">
                                                <select class="input-md">
                                                    <option value="0"> Bulan </option>
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
                                                </select><i></i>
                                            </label>
                                        </section>
                                        <section class="col col-1">
                                            <label class="select">
                                                <select class="input-md">
                                                    <option value="0"> Tgl </option>
                                                    <option value="1">-</option>
                                                </select><i></i>
                                            </label>
                                        </section>
                                </div>

                                <div class="row">
                                                <section class="col col-2">
                                                        <p> Jenis Setoran </p>
                                                </label>
                                        </section>
                                        <section class="col col-2">
                                                <label class="select">
                                                        <select class="input-md" enabled="enabled" style="background-color: #fff">
                                                                <option value="0" >Pilih</option>
                                                                <option value="2" >SKPD</option>
                                                        </select><i></i>
                                                </label>
                                        </section>
                                        <section class="col col-1">
                                                <label class="input">
                                                        <p> Ke</p>
                                                </label>
                                        </section>
                                        <section class="col col-1">
                                                <label class="input"><div class="row">
                                                        <input type="text">
                                                </label>
                                        </section>
                                </div>

                                <div class="row">
                                        <section class="col col-2">
                                                <label class="input">
                                                        <p> NOPOK </p>
                                                </label>
                                        </section>
                                        <section class="col col-3">
                                                <label class="input">
                                                        <input type="text">
                                                </label>
                                        </section>
                                </div>

                                <div class="row">
                                        <section class="col col-2">
                                                <label class="input">
                                                        <p> Rekening </p>
                                                </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="input">
                                                    <input type="text" value="1-20- 1-20-26-0-0-4-1-1-" disabled="disabled">
                                            </label>
                                        </section>
                                        <section class="col col-sm0">
                                            <label class="input">
                                                    <p>-</p>
                                            </label>
                                        </section>
                                        <section class="col col-sm-1">
                                            <label class="input">
                                                    <input type="text" maxlength="2">
                                            </label>
                                        </section>
                                        <section class="col col-sm0">
                                            <label class="input">
                                                    <p>-</p>
                                            </label>
                                        </section>
                                        <section class="col col-sm-1">
                                            <label class="input">
                                                    <input type="text" maxlength="3">
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                                <button class="btn btn-sm btn-primary" style="float: left;">
                                                        <i class="fa-send-o"></i> Proses
                                                </button>
                                        </section>
                                </div>
                                <div class="row">
                                        <section class="col col-2">
                                                <label class="input">
                                                        <p> Nama</p>
                                                </label>
                                        </section>
                                        <section class="col col-3">
                                                <label class="input">
                                                        <input type="text" disabled="disabled" style="background-color: #ccc">
                                                </label>
                                        </section>
                                        <section class="col col-2">
                                                <label class="input">
                                                        <p> SPT Nama</p>
                                                </label>
                                        </section>
                                        <section class="col col-3">
                                                <label class="input">
                                                        <input type="text" disabled="disabled" style="background-color: #ccc">
                                                </label>
                                        </section>
                                </div>
                                <div class="row">
                                        <section class="col col-2">
                                                <label class="input">
                                                        <p> Alamat</p>
                                                </label>
                                        </section>
                                        <section class="col col-3">
                                                <label class="input">
                                                        <input type="text" disabled="disabled" style="background-color: #ccc">
                                                </label>
                                        </section>
                                        <section class="col col-2">
                                                <label class="input">
                                                        <p> Tanggal Pajak </p>
                                                </label>
                                        </section>
                                        <section class="col col-3">
                                                <label class="input">
                                                        <input type="text" disabled="disabled" style="background-color: #ccc">
                                                </label>
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
<!-- WIDGET END -->

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
                    <header>
                           <span class="widget-icon"> <i class="fa fa-search"></i> </span>
                    <h2>Setoran Pajak Lain-lain</h2>
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
                        <label class="input">
                        <p> Tanggal Setor</p>
                        </label>
                    </section>
                    <section class="col col-md-2">
                        <label class="input">
                            <i class="icon-append fa fa-calendar"></i>
                            <input name="tanggal_setor" class="datepicker" data-dateformat="dd/mm/yy" id="tglstr">
                        </label>
                    </section>
                </div>

        <div class="row">
                <section class="col col-2">
                        <p> Bunga </p>
                        </label>
                </section>
                <section class="col col-3">
                <label class="input">
                                <input type="text">
                        </label>
        </section>
        </div>
        <div class="row">
                <section class="col col-2">
                        <label class="input">
                                <p> Denda</p>
                        </label>
                </section>
                <section class="col col-3">
                        <label class="input">
                                <input type="text">
                        </label>
                </section>
        </div>
        <div class="row">
                <section class="col col-2">
                        <label class="input">
                                <p> Setoran Pajak</p>
                        </label>
                </section>
                <section class="col col-3">
                        <label class="input">
                                <input type="text">
                        </label>
                </section>
        </div>
        
        <div class="row">
                        <section class="col col-2">
                                <label class="input">
                                        <p> Jumlah Setor </p>
                                </label>
                        </section>
                        <section class="col col-3">
                                <label class="input">
                                        <input type="text">
                                </label>
                        </section>
        </div>
        <div class="row">
                <section class="col col-2">
                                <label class="input">
                                <p> Nomor SSPD</p>
                                </label>
                </section>
                <section class="col col-3">
                                <label class="input">
                                <input type="text">
                                </label>
                </section>
        </div>
        <div class="row">
                <section class="col col-2">
                                <label class="input">
                                <p> Tanggal Entry SSPD</p>
                                </label>
                </section>
                <section class="col col-3">
                        <label class="input">
                            <input class="form-control" type="text" value="12/09/2016" disabled="disabled" style="background-color: #ccc">
                        </label>
                 </select>
                </section>
                                        </div>
                                        <div class="row">
            <label class="label col col-2">Validasi (Y/T)</label>
            <section class="col col-2">
                <label class="select">
                    <select name="">
                        <option value="0"></option>
                        <option value="1">Y</option>
                        <option value="2">T</option>
                    </select> <i></i> </label>
            </section>
        </div>

</fieldset>     

<footer id="footer_simpandata">
        <section class="col col-md-2">
        <button class="btn btn-sm btn-primary" style="float: left;">
               <i class="fa fa-save"></i> Simpan
       </button>
       </section>
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
<!-- end row -->

</section>


<script type="text/javascript">
    pageSetUp();


</script>
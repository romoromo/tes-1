<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Surat Tagihan Pajak Air Tanah</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
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
                    <header>
                           <span class="widget-icon"> <i class="fa fa-search"></i> </span>
                           <h2>Validasi Penyetoran</h2>

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

                                  <form action="" id="" class="smart-form" novalidate>
                                         <fieldset>

                                               <div class="row">
                                                  <section class="col col-md-2">
                                                         <p><b>Tahun/Bulan/Tanggal</b></p>
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
                          <section class="col col-md-2">
                                 <p><b>Ke</b></p>
                         </section>
                         <section class="col col-2">
                                 <label class="input">
                                        <input type="text" placeholder="Ke-">
                                </label>
                        </section>
                </div>

                <div class="row">
                  <section class="col col-md-2">
                         <p><b>Nomor Pokok</b></p>
                 </section>
                 <section class="col col-3">
                         <label class="input">
                                <input type="text" placeholder="Nomor Pokok">
                        </label>
                </section>
                <section class="col col-md-2">
                 <button type="button" class="btn btn-sm btn-primary" onclick="cari()">
                         &nbsp;Enter
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
</div>
</section>
<!-- WIDGET END -->

<!-- NEW WIDGET START -->
<section id="widget-grid" class="">
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
                    <header>
                           <span class="widget-icon"> <i class="fa fa-user"></i> </span>
                           <h2>Perorangan</h2>

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
                                                  <section class="col col-md-2">
                                                         <p><b>Nama</b></p>
                                                 </section>
                                                 <section class="col col-2">
                                                         <label class="input">
                                                                <input class="form-control"type="text" value="" disabled="disabled" style="background-color: #ccc">
                                                        </label>
                                                </section>
                                        </div>

                                        <div class="row">
                                          <section class="col col-md-2">
                                                 <p><b>Alamat</b></p>
                                         </section>
                                         <section class="col col-4">
                                                 <label class="textarea"> 										
                                                    <textarea class="form-control"rows="3" name="info" value="Jl.Sedekah ilahi" placeholder="" disabled="disabled" style="background-color: #ccc"></textarea> 
                                            </label>
                                    </section>
                            </div>

                            <div class="row">
                                  <section class="col col-md-2">
                                         <p><b>Rekening</b></p>
                                 </section>
                                 <section class="col col-3">
                                         <label class="select">
                                                <select class="input-md" disabled="disabled" style="background-color: #ccc">
                                                       <option value="0" > - </option>
                                               </select><i></i>
                                       </label>
                               </section>
                               <section class="col col-md-2">
                                 <p><b>Rekening</b></p>
                         </section>
                 </div><br>


                 <div class="">
                  <h4><strong>Ketetapan Pajak (SKPD)</strong></h4>
          </div><br><br>
          <div class="row">
                  <section class="col col-md-2">
                         <p><b>Nomor Pemeriksaan</b></p>
                 </section>
                 <section class="col col-2">
                         <label class="input">
                                <input class="form-control"type="text" disabled="disabled" style="background-color: #ccc">
                        </label>
                </section>
                <section class="col col-md-2">
                 <p><b>Tanggal Pemeriksaan</b></p>
         </section>
         <section class="col col-2">
                 <label class="input">
                        <input class="form-control"type="text" style="background-color: #ccc">
                </label>
        </section>
</div>
<div class="row">
  <section class="col col-md-2">
         <p><b>Jumlah Pajak</b></p>
 </section>
 <section class="col col-5">
         <label class="input">
                <input class="form-control"type="text"style="background-color: #ccc">
        </label>
</section>
</div><br>



<div class="">
  <h4><strong>Setoran Pajak (SSPD)</strong></h4>
</div><br><br>

<div class="row">
  <section class="col col-md-2">
         <p><b>Nomor Pemeriksaan</b></p>
 </section>
 <section class="col col-2">
         <label class="input">
                <input class="form-control"type="text" disabled="disabled" style="background-color: #ccc">
        </label>
</section>
<section class="col col-md-2">
 <p><b>Tanggal Pemeriksaan</b></p>
</section>
<section class="col col-2">
 <label class="input">
        <input class="form-control"type="text" style="background-color: #ccc">
</label>
</section>
</div><br>


<div class="">
  <h4><strong>Pemeriksaan Pajak</strong><h4>
  </div><br><br>

  <div class="row">
          <section class="col col-md-2">
                 <p><b>Nomor Pemeriksaan</b></p>
         </section>
         <section class="col col-2">
                 <label class="input">
                        <input class="form-control"type="text" disabled="disabled" style="background-color: #ccc">
                </label>
        </section>
        <section class="col col-md-2">
         <p><b>Tanggal Pemeriksaan</b></p>
 </section>
 <section class="col col-2">
         <label class="input">
                <input class="form-control"type="text" style="background-color: #ccc">
        </label>
</section>
</div>
<div class="row">
  <section class="col col-md-2">
         <p><b>Jumlah Pajak</b></p>
 </section>
 <section class="col col-5">
         <label class="input">
                <input class="form-control"type="text"style="background-color: #ccc">
        </label>
</section>
</div><br>


<div class="">
  <h4><strong>Tagihan Pajak (STPD)</strong></h4>
</div><br><br>

<div class="row">
  <section class="col col-md-2">
         <p><b>Nomor STPD</b></p>
 </section>
 <section class="col col-2">
         <label class="input">
                <input type="text" >
        </label>
</section>
<section class="col col-md-2">
 <p><b>Tanggal STPD</b></p>
</section>
<section class="col col-md-2">
     <label class="input">
            <i class="icon-append fa fa-calendar"></i>
            <input name="tanggal_STPD" class="datepicker" data-dateformat="dd/mm/yy" id="tglstpd">
    </label>
</section>
</div>
<div class="row">
  <section class="col col-md-2">
         <p><b>Jumlah Bunga</b></p>
 </section>
 <section class="col col-2">
         <label class="input">
                <input class="form-control"type="text" disabled="disabled" style="background-color: #ccc">
        </label>
</section>
<section class="col col-md-2">
 <p><b>Jumlah Bulan</b></p>
</section>
<section class="col col-2">
 <label class="input">
        <input type="text" >
</label>
</section>
</div>
<div class="row">
  <section class="col col-md-2">
         <p><b>Jumlah Tagihan</b></p>
 </section>
 <section class="col col-3">
         <label class="input">
                <input class="form-control"type="text"style="background-color: #ccc">
        </label>
</section>
</div><br>

<div class="row">
  <section class="col col-md-3">
         <h3><b>Tanggal Batas Pembayaran</b></h3>
 </section>
 <section class="col col-md-2">
     <label class="input">
            <i class="icon-append fa fa-calendar"></i>
            <input name="tanggal_pembayaran" class="datepicker" data-dateformat="dd/mm/yy" id="tglpembayaran">
    </label>
</section>
</div>

</fieldset>		

<footer id="footer_simpandata">
        <button class="btn btn-sm btn-primary" style="float: left;">
               <i class="fa fa-save"></i> Simpan
       </button>
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
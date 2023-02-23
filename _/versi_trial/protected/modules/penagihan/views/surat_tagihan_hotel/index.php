<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Surat Tagihan Pajak Hotel</h4>
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

        <form action="" id="form_sumber_pajak" class="smart-form" novalidate>
         <fieldset>

           <div class="row">
            <section class="col col-md-2">
             <p><b>Tahun/Bulan/Tanggal</b></p>
           </section>

           <section class="col col-md-2">
              <label class="input">
                <input type="number" maxlength="4" value="<?= date('Y') ?>" class="form-control" id="TBLPENDATAAN_THNPAJAK" name="param[TBLPENDATAAN_THNPAJAK]" />
              </label>
          </section>
         <section class="col col-md-3">
                    <label class="select">
                      <select class="" id="TBLPENDATAAN_BLNPAJAK" name="param[TBLPENDATAAN_BLNPAJAK]">
                        <option selected="" value="0">-- Bulan --</option>
                        <?for ($i=1; $i<=12; $i++): ?>
                          <option <?php echo $i==(int)date('m') ? 'selected' : '' ?> value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
                        <?php endfor ?>
                      </select><i class="fa fa-square"></i>
                    </label>
                  </section>
       <section class="col col-md-0">
              <input type="checkbox">
        </section>
        <section class="col col-md-1">
            <label class="input">
              <input value="0" type="number" id="TBLPENDATAAN_TGLPAJAK" name="param[TBLPENDATAAN_TGLPAJAK]" placeholder="Tanggal" maxlength="2">
            </label>
        </section>
   </div>


   <div class="row">
    <section class="col col-md-2">
     <p><b>Ke</b></p>
   </section>
   <section class="col col-2">
     <label class="input">
      <input type="text" id="TBLPENDATAAN_PAJAKKE" name="param[TBLPENDATAAN_PAJAKKE]" placeholder="Ke-">
    </label>
  </section>
</div>

<div class="row">
  <section class="col col-md-2">
   <p><b>Nomor Pokok</b></p>
 </section>
<section class="col col-md-5">
  <label class="input">
    <input class="form-control" type="text" id="TBLDAFTAR_NOPOK" name="param[TBLDAFTAR_NOPOK]">
  </label>
</section>    
<section class="col col-md-2">
 <button type="button" class="btn btn-sm btn-primary" onclick="cari()">
   &nbsp;Enter >>
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
      <header>
       <span class="widget-icon"> <i class="fa fa-user"></i> </span>
       <h2>Perorangan</h2>

     </header>

     <!-- widget div-->
     <div id="id_respencarian">

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
          <section class="col col-md-2">
             <span id="TBLDAFTAR_BADANUSAHANAMA"></span>
          </section>
        </div>

        <div class="row">
          <section class="col col-md-2">
           <p><b>Alamat</b></p>
         </section>
        <section class="col col-md-2">
          <span id="TBLDAFTAR_BADANUSAHAALAMAT"></span>
        </section>
      </div>

      <div class="row">
        <section class="col col-md-2">
         <p><b>Rekening</b></p>
       </section>
       <section class="col col-4">
         <label class="select">
          <select class="input-md" disabled="disabled" style="background-color: #ccc">
           <option value="0" > - </option>
         </select><i></i>
       </label>
     </section>
     <section class="col col-md-2">
        <span id="TBLREKENING_NAMAREKENING"></span>
    </section>
   </div><br>
   <div class="">
    <h4><strong>Ketetapan Pajak (SKPD)</strong></h4>
  </div><br><br>
  <div class="row">
    <section class="col col-md-2">
     <p><b>Nomor Pemeriksaan</b></p>
   </section>
   <section class="col col-4">
     <label class="input">
      <input class="form-control"type="text" disabled="disabled" style="background-color: #ccc">
    </label>
  </section>
  <section class="col col-md-2">
   <p><b>Tanggal Pemeriksaan</b></p>
 </section>
 <section class="col col-4">
   <label class="input">
    <input class="form-control"type="text" style="background-color: #ccc">
  </label>
</section>
</div>
<div class="row">
  <section class="col col-md-2">
    <p><b>Jumlah Pajak</b></p>
  </section>
  <section class="col col-4">
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
 <section class="col col-4">
   <label class="input">
    <input class="form-control"type="text" disabled="disabled" style="background-color: #ccc">
  </label>
</section>
<section class="col col-md-2">
 <p><b>Tanggal Pemeriksaan</b></p>
</section>
<section class="col col-4">
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
   <section class="col col-4">
     <label class="input">
      <input class="form-control"type="text" disabled="disabled" style="background-color: #ccc">
    </label>
  </section>
  <section class="col col-md-2">
   <p><b>Tanggal Pemeriksaan</b></p>
 </section>
 <section class="col col-4">
   <label class="input">
    <input class="form-control"type="text" style="background-color: #ccc">
  </label>
</section>
</div>
<div class="row">
  <section class="col col-md-2">
   <p><b>Jumlah Pajak</b></p>
 </section>
 <section class="col col-4">
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
 <section class="col col-4">
   <label class="input">
    <input type="text" >
  </label>
</section>
<section class="col col-md-2">
 <p><b>Tanggal STPD</b></p>
</section>
<section class="col col-md-4">
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
 <section class="col col-4">
   <label class="input">
    <input class="form-control"type="text" disabled="disabled" style="background-color: #ccc">
  </label>
</section>
<section class="col col-md-2">
 <p><b>Jumlah Bulan</b></p>
</section>
<section class="col col-4">
 <label class="input">
  <input type="text" >
</label>
</section>
</div>
<div class="row">
  <section class="col col-md-2">
   <p><b>Jumlah Tagihan</b></p>
 </section>
 <section class="col col-4">
   <label class="input">
    <input class="form-control"type="text"style="background-color: #ccc">
  </label>
</section>
</div><br>

<div class="row">
  <section class="col col-md-2">
   <h3><b>Tanggal Batas Pembayaran</b></h3>
 </section>
 <section class="col col-md-4">
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
  loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
    generateAutocompleteWPHotel();
  });


function generateAutocompleteWPHotel() {
      $('#TBLDAFTAR_NOPOK').autocomplete({
        serviceUrl: 'penagihan/Surat_tagihan_hotel/autocompletewphotel',

        onSelect: function (suggestion) {
              //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
              window.id = suggestion.data;
              window.nopokok = suggestion.TBLDAFTAR_NOPOK;
              window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
              window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
              $(this).val(suggestion.value);
              $('#TBLDAFTAR_NOPOK').val(suggestion.value.split(' | ')[0]);

          }
          ,showNoSuggestionNotice : true
          ,noCache : true
          ,noSuggestionNotice : "Tidak ditemukan hasil"
      });
    }

function cari() {
    $("#id_respencarian input").val('');
    //$("#btnCetakSSPD").hide();

    if($('#is_tanggal').is(':checked')){
      tgl = $('#is_tanggal').select2('val');
    } else {
      tgl = '0';
    }

    $.ajax({
      url: 'penagihan/Surat_tagihan_hotel/getdata',
      type: 'POST',
      dataType: 'json',
      data: {
        tahun : $('#tahun').val(),
        bln : $('#bln').val(),
        tgl : ($('#is_tanggal').prop('checked') ? $('#tgl').val() : '0'),
        jenis_setoran : $('#jenis_setoran').select2('val'),
        nopok : $('#nopok').val(),
      },
      success:function (respon) {
        if (respon.data.validate=='kurang') {
          notifikasi('Silahkan isikan data dengan lengkap', 'Periksa kembali isian data dan klik cari', 'fail', 1,0);
        }else if (!respon.model.TBLPENDATAAN_THNPAJAK) {
          notifikasi('Data tidak ditemukan', 'data dengan nomor pokok '+$('#nopok').val()+' tidak ditemukan', 'fail', 1,0);
        }else{
          $('#TBLDAFTAR_BADANUSAHANAMA').html(respon.model.TBLDAFTAR_BADANUSAHANAMA);
          $('#NOMOR_REKENING').html('1.20.1.20.26.0.0.'+respon.model.<?php echo $this->namatabel; ?>_REKPENDAPATAN+'.'+respon.model.<?php echo $this->namatabel; ?>_REKPAD+'.'+respon.model.<?php echo $this->namatabel; ?>_REKPAJAK+'.'+respon.model.<?php echo $this->namatabel; ?>_REKAYAT+'.'+respon.model.<?php echo $this->namatabel; ?>_REKJENIS+'.0');
          $('#TBLDAFTAR_BADANUSAHAALAMAT').html(respon.model.TBLDAFTAR_BADANUSAHAALAMAT);

          getrekening(respon.model.TREKENING_NAMA);

          if(respon.model.<?php echo $this->namatabel; ?>_THNSPTPD) {
            var tahunthnsptpd = respon.model.<?php echo $this->namatabel; ?>_THNSPTPD;
            var bulansptpd = respon.model.<?php echo $this->namatabel; ?>_BLNSPTPD;
            if(tahunthnsptpd.length==1) {
              var viewtahunthnsptpd = '200'+tahunthnsptpd;
            } else {
              var viewtahunthnsptpd = '20'+tahunthnsptpd;
            }
            if(bulansptpd.length==1) {
              var viewbulansptpd = '0'+bulansptpd;
            } else {
              var viewbulansptpd = bulansptpd;
            }         
            $('#<?php echo $this->namatabel; ?>_TGLSPTPD').val(respon.model.<?php echo $this->namatabel; ?>_TGLSPTPD+'-'+bulansptpd+'-'+viewtahunthnsptpd);
          } else {
            $('#<?php echo $this->namatabel; ?>_TGLSPTPD').val('');
          }

          if(respon.model.<?php echo $this->namatabel; ?>_THNBATASSPTPD) {
            var tahunbatassptpd = respon.model.<?php echo $this->namatabel; ?>_THNBATASSPTPD;
            var bulanbatassptpd = respon.model.<?php echo $this->namatabel; ?>_BLNBATASSPTPD;
            if(tahunbatassptpd.length==1) {
              var viewtahunbatassptpd = '200'+tahunbatassptpd;
            } else {
              var viewtahunbatassptpd = '20'+tahunbatassptpd;
            }
            if(bulanbatassptpd.length==1) {
              var viewbulanbatassptpd = '0'+bulanbatassptpd;
            } else {
              var viewbulanbatassptpd = bulanbatassptpd;
            }         
            $('#<?php echo $this->namatabel; ?>_TGLBATASSPTPD').val(respon.model.<?php echo $this->namatabel; ?>_TGLBATASSPTPD+'-'+viewbulanbatassptpd+'-'+viewtahunbatassptpd);
          } else {
            $('#<?php echo $this->namatabel; ?>_TGLBATASSPTPD').val('');
          }

          $('#<?php echo $this->namatabel; ?>_URUTSKPD').val(respon.model.<?php echo $this->namatabel; ?>_URUTSKPD);
          if(respon.model.<?php echo $this->namatabel; ?>_BUNGASPTPD) {
            $('#<?php echo $this->namatabel; ?>_BUNGASPTPD').val(toRp(respon.model.<?php echo $this->namatabel; ?>_BUNGASPTPD));
          }
          if(respon.model.<?php echo $this->namatabel; ?>_PAJAK) {
            $('#<?php echo $this->namatabel; ?>_PAJAK').val(toRp(respon.model.<?php echo $this->namatabel; ?>_PAJAK));
          }
          if(respon.model.<?php echo $this->namatabel; ?>_THNSURATTAGIHAN) {
            var tahunsurattagihan = respon.model.<?php echo $this->namatabel; ?>_THNSURATTAGIHAN;
            var bulansurattagihan = respon.model.<?php echo $this->namatabel; ?>_BLNSURATTAGIHAN;
            if(tahunsurattagihan.length==1) {
              var viewtahunsurattagihan = '200'+tahunsurattagihan;
            } else {
              var viewtahunsurattagihan = '20'+tahunsurattagihan;
            }
            if(bulansurattagihan.length==1) {
              var viewbulansurattagihan = '0'+bulansurattagihan;
            } else {
              var viewbulansurattagihan = bulansurattagihan;
            }         
            $('#<?php echo $this->namatabel; ?>_TGLSURATTAGIHAN').val(respon.model.<?php echo $this->namatabel; ?>_TGLSURATTAGIHAN+'-'+viewbulansurattagihan+'-'+viewtahunsurattagihan);
          } else {
            $('#<?php echo $this->namatabel; ?>_TGLSURATTAGIHAN').val('');
          }


          $('#<?php echo $this->namatabel; ?>_NOSURATTAGIHAN').val(respon.model.<?php echo $this->namatabel; ?>_NOSURATTAGIHAN);
          if(respon.model.<?php echo $this->namatabel; ?>_BUNGATAGIHAN) {
            $('#<?php echo $this->namatabel; ?>_BUNGATAGIHAN').val(toRp(respon.model.<?php echo $this->namatabel; ?>_BUNGATAGIHAN));
          }
          if(respon.model.<?php echo $this->namatabel; ?>_DENDATAGIHAN) {
          $('#<?php echo $this->namatabel; ?>_DENDATAGIHAN').val(toRp(respon.model.<?php echo $this->namatabel; ?>_DENDATAGIHAN));
          }
          if(respon.model.<?php echo $this->namatabel; ?>_RUPIAHTAGIHAN) {
          $('#<?php echo $this->namatabel; ?>_RUPIAHTAGIHAN').val(toRp(respon.model.<?php echo $this->namatabel; ?>_RUPIAHTAGIHAN));
          }

          $('#<?php echo $this->namatabel; ?>_TIPESETOR').val(respon.model.<?php echo $this->namatabel; ?>_TIPESETOR);

          if(respon.model.<?php echo $this->namatabel; ?>_THNENTRISETOR) {
            var tahunsetor = respon.model.<?php echo $this->namatabel; ?>_THNENTRISETOR;
            var bulansetor = respon.model.<?php echo $this->namatabel; ?>_BLNENTRISETOR;
            viewtahunsetor = isikiri(tahunsetor, "2000");
            viewbulansetor = isikiri(bulansetor, "00");
            $('#<?php echo $this->namatabel; ?>_TANGGALSETOR').val(respon.model.<?php echo $this->namatabel; ?>_TANGGALSETOR+'-'+viewbulansetor+'-'+viewtahunsetor);
          } else {
            $('#<?php echo $this->namatabel; ?>_TANGGALSETOR').val('<?= date('d-m-Y') ?>');
          }
          
          $('#bungasetor').val(toRp(respon.model.BUNGASETOR));
          $('#dendasetor').val(toRp(respon.model.DENDASETOR));
          $('#pajaksetor').val(toRp(respon.model.PAJAKSETOR));
          $('#totalsetor').val(toRp(respon.model.TOTALSETOR));


          if(respon.model.<?php echo $this->namatabel; ?>_THNKURANGBAYAR) {
            var tahunkurangbayar = respon.model.<?php echo $this->namatabel; ?>_THNKURANGBAYAR;
            var bulankurangbayar = respon.model.<?php echo $this->namatabel; ?>_BLNKURANGBAYAR;
            var tahunbataskurangbayar = respon.model.<?php echo $this->namatabel; ?>_THNBTSKRGBAYAR;
            var bulanbataskurangbayar = respon.model.<?php echo $this->namatabel; ?>_BLNBTSKRGBAYAR;
            /*if(tahunkurangbayar.length==1) {
              var viewtahunkurangbayar = '200'+tahunkurangbayar;
            } else {
              var viewtahunkurangbayar = '20'+tahunkurangbayar;
            }*/
            viewtahunkurangbayar = isikiri(tahunkurangbayar, "2000");
            /*if(bulankurangbayar.length==1) {
              var viewbulankurangbayar = '0'+bulankurangbayar;
            } else {
              var viewbulankurangbayar = bulankurangbayar;
            }*/
            viewbulankurangbayar = isikiri(bulankurangbayar, "00");

            viewtahunbataskurangbayar = isikiri(tahunbataskurangbayar, "2000");
            viewbulanbataskurangbayar = isikiri(bulanbataskurangbayar, "00");
            $('#<?php echo $this->namatabel; ?>_TGLKURANGBAYAR').val(respon.model.<?php echo $this->namatabel; ?>_TGLKURANGBAYAR+'-'+viewbulankurangbayar+'-'+viewtahunkurangbayar);
            $('#<?php echo $this->namatabel; ?>_TGLBTSKRGBAYAR').val(respon.model.<?php echo $this->namatabel; ?>_TGLBTSKRGBAYAR+'-'+viewbulanbataskurangbayar+'-'+viewtahunbataskurangbayar);
          } else {
            $('#<?php echo $this->namatabel; ?>_TGLKURANGBAYAR').val('');
            $('#<?php echo $this->namatabel; ?>_TGLBTSKRGBAYAR').val('');
          }


          $('#<?php echo $this->namatabel; ?>_REGKURANGBAYAR').val(respon.model.<?php echo $this->namatabel; ?>_REGKURANGBAYAR);
          if(respon.model.<?php echo $this->namatabel; ?>_BUNGAKRGBAYAR) {
            $('#<?php echo $this->namatabel; ?>_BUNGAKRGBAYAR').val(toRp(respon.model.<?php echo $this->namatabel; ?>_BUNGAKRGBAYAR));
          }
          if(respon.model.<?php echo $this->namatabel; ?>_DENDAKRGBAYAR) {
            $('#<?php echo $this->namatabel; ?>_DENDAKRGBAYAR').val(toRp(respon.model.<?php echo $this->namatabel; ?>_DENDAKRGBAYAR));
          }
          if(respon.model.<?php echo $this->namatabel; ?>_RUPIAHKRGBAYAR) {
            $('#<?php echo $this->namatabel; ?>_RUPIAHKRGBAYAR').val(toRp(respon.model.<?php echo $this->namatabel; ?>_RUPIAHKRGBAYAR));
          }

          $('#id_respencarian').show('fast');
          if (respon.data.exist=='ada') {
            $('#NOMOR_SSPD').attr('disabled', 'disabled');
            $('#NOMOR_SSPD').attr('style', 'background:#eee');
            $('#NOMOR_SSPD').val(respon.model.<?php echo $this->namatabel; ?>_REGSETOR);
            $('#NOMOR_SSPDSSTP').attr('disabled', 'disabled');
            $('#NOMOR_SSPDSSTP').attr('style', 'background:#eee');
            //$('#NOMOR_SSPDSSTP').val(respon.model.<?php echo $this->namatabel; ?>_REGTAGIHAN);
            $('#NOMOR_SSPDKB').attr('disabled', 'disabled');
            $('#NOMOR_SSPDKB').attr('style', 'background:#eee');
            //$('#NOMOR_SSPDKB').val(respon.model.<?php echo $this->namatabel; ?>_SSPDKURANGBAYAR);
            $('#TANGGAL_ENTRY').attr('disabled', 'disabled');
            $('#TANGGAL_ENTRY').attr('style', 'background:#eee');

          if(respon.model.<?php echo $this->namatabel; ?>_THNENTRISETOR) {
            $('#<?php echo $this->namatabel; ?>_TANGGALSETOR, #TANGGAL_ENTRY').val(respon.model.<?php echo $this->namatabel; ?>_TANGGALSETOR+'-'+viewbulansetor+'-'+viewtahunsetor);
          } else {
              $('#TANGGAL_ENTRY').val('');
            }

            var jns_setoran = $('#jenis_setoran').select2('val');
            if (jns_setoran=='SKPD' || jns_setoran=='SKPDKB') {
              kolomtglbatas = jns_setoran=='SKPDKB' ? 'TGLBTSKRGBAYAR' : 'TGLSKP';
              window.BULAN_DENDA = getBulanDenda(convDate($("#<?= $this->namatabel ?>_"+kolomtglbatas).val()), '<?= date('Y-m-d') ?>');
              if (BULAN_DENDA <= 0) {
                $('#TANGGAL_HITUNGAN_DENDA').attr('disabled', 'disabled');
                $('#TANGGAL_HITUNGAN_DENDA').attr('style', 'background:#eee');
              }
            }

            $('#footer_simpandata').hide('fast');
            notifikasi('Data SSPD diinputkan', 'data SSPD dengan nomor pokok '+$('#nopok').val()+' sudah diinputkan', 'fail', 1,0);
            $("#btnCetakSSPD").show();
          }else{
            $('#NOMOR_SSPD').removeAttr('disabled');
            $('#NOMOR_SSPD').removeAttr('style');
            $('#NOMOR_SSPDSSTP').removeAttr('disabled');
            $('#NOMOR_SSPDSSTP').removeAttr('style');
            $('#NOMOR_SSPDKB').removeAttr('disabled');
            $('#NOMOR_SSPDKB').removeAttr('style');
            $('#TANGGAL_ENTRY').removeAttr('disabled');
            $('#TANGGAL_ENTRY').removeAttr('style');
            $('#TANGGAL_HITUNGAN_DENDA').removeAttr('disabled');
            $('#TANGGAL_HITUNGAN_DENDA').removeAttr('style');
            $('#footer_simpandata').show('fast');
          }
        }
      }
    });
  }

</script>


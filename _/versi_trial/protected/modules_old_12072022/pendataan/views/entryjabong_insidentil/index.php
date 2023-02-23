<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl); 
?>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="well well-sm well-light bg-color-greenLight txt-color-white">
      <h4><i class="fa fa-pencil"></i> Entry Jabong Insidentil </h4>
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

          <form id="form-data-jabonginsidentil" class="smart-form">
            <fieldset>
              <div class="row">
                <section class="col col-md-2">
                  <p>No. Pokok WP</p>
              </section>
              <section class="col col-md-4">
                  <label class="input">
                    <input type="text" id="TBLDAFTAR_NOPOK" name="TBLDAFTAR_NOPOK" placeholder="Ketik Nomor Pokok WP">
                </label>
            </section>
        </div>
        <div class="row">
            <section class="col col-md-2">
              <p>Masa Pajak</p>
          </section>
          <section class="col col-md-2">
              <label class="input">
                <input type="text" id="TBLPENDATAAN_THNPAJAK" name="TBLPENDATAAN_THNPAJAK" value="<?= date('Y') ?>" placeholder="Tahun" maxlength="4">
            </label>
        </section>
        <section class="col col-md-3">
          <label class="select">
            <select class="select2" id="TBLPENDATAAN_BLNPAJAK" name="TBLPENDATAAN_BLNPAJAK">
              <option selected="" value="0">-- Bulan --</option>
              <?php for ($i=1; $i<=12; $i++): ?>
                  <option <?php echo $i==(int)date('m') ? 'selected' : '' ?> value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
              <?php endfor?>
          </select>
      </label>
  </section>
  <section class="col col-md-2">
    <label class="input">
      <input value="<?= date('d') ?>" type="number" id="TBLPENDATAAN_TGLPAJAK" name="TBLPENDATAAN_TGLPAJAK" placeholder="Tanggal" maxlength="2">
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
<section class="col col-md-2">
    <label class="input">
      <input type="number" id="TBLPENDATAAN_PAJAKKE" name="TBLPENDATAAN_PAJAKKE" placeholder="Lokasi">
  </label>
</section>
</div>
<fieldset id="form-data-perhitungan" style="display: none;">

    <header>Data Wajib Pajak</header><span>&nbsp;</span>
    <div class="row">
      <section class="col col-md-2">
        <p>Nama</p>
    </section>
    <section class="col col-md-5">
        <label class="input">
          <input class="form-control disabled" type="text" id="TBLDAFTAR_BADANUSAHANAMA" name="TBLDAFTAR_BADANUSAHANAMA" readonly="" style="background: #e4e4e4;">
      </label>
  </section>
</div>
<div class="row">
  <section class="col col-md-2">Alamat</section>
  <section class="col col-md-5">
    <label class="textarea">
      <textarea class="form-control disabled" rows="4" id="TBLDAFTAR_BADANUSAHAALAMAT" name="TBLDAFTAR_BADANUSAHAALAMAT" readonly="" style="background: #e4e4e4;"></textarea>
  </label>
</section>
</div>
<div class="row hidden">
  <section class="col col-md-2">
    <p>No SPT </p>
</section>
<section class="col col-md-2">
    <label class="input">
      <input class="input-sm" type="text" id="wp_input_no_spt" name="wp_input_no_spt">
  </label>
</section>
</div>
<div class="row hidden">
  <section class="col col-md-2">
    <p>Tanggal SPT </p>
</section>

<section class="col col-md-3">
    <label class="input"> <i class="icon-append fa fa-calendar"></i>
      <input value="<?= date('Y') ?>" type="text" name="TBLDAFTREKLAME_THNJABONG" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTREKLAME_THNJABONG">
  </label>
</section>

<section class="col col-md-3">
    <label class="input"> <i class="icon-append fa fa-calendar"></i>
      <input value="<?= date('m') ?>" type="text" name="TBLDAFTREKLAME_BLNJABONG" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTREKLAME_BLNJABONG">
  </label>
</section>

<section class="col col-md-3">
    <label class="input"> <i class="icon-append fa fa-calendar"></i>
      <input value="<?= date('d') ?>" type="text" name="TBLDAFTREKLAME_TGLJABONG" class="datepicker" data-dateformat="dd-mm-yy" id="TBLDAFTREKLAME_TGLJABONG">
  </label>
</section>
</div>

<div class="row">
  <section class="col col-md-2">
    <p>Rekening</p>
</section>
<section class="col col-md-4">
    <label class="select">
      <select class="select2" id="TREKENING_REKJENIS" name="TREKENING_REKJENIS" disabled="">
        <option value="">-- Pilih Rekening --</option>
        <?php foreach ($data['rek'] as $list): ?>
          <option value="<?php echo $list['JEN'] ?>" tarif="<?php echo $list['TARIF'] ?>" tarif1="<?php echo $list['TARIF1'] ?>" satuan="<?php echo $list['SATUAN'] ?>">[<?php echo $list['TREKENING_KODE'] ?>] <?php echo $list['TREKENING_NAMA'] ?></option>
      <?php endforeach ?>
  </select>
</label>
</section>
</div>

<!-- TABS -->
<div class="widget-body">
  <div id="myTabReklameContent" class="tab-content padding-10">

    <div class="tab-pane fade in active" id="tabrek2">
      <div class="row">
        <label class="label label-primary txt-color-white font-lg label-rumus">Perhitungan Jabong Insidentil</label>
    </div>

    <br>

    <div class="row">
        <section class="col col-md-2 font-md">
          <p>Nomor Jabong</p>
      </section>
      <section class="col col-md-5 font-md">
          <input type="text" id="TBLDAFTREKLAME_NOJABONG" name="TBLDAFTREKLAME_NOJABONG">
      </section>
  </div>

  <br>

  <div class="row">

    <section class="col col-md-3 font-md">
      <p>Harga Satuan Pembongkaran</p>
  </section>

  <section class="col-md-2">
      <label class="input">
        <input class="form-control input-sm text-align-right format-rupiah" readonly="" style="background: #e4e4e4;" type="text" name="TBLDAFTREKLAME_HRGDASARJABONG" id="TBLDAFTREKLAME_HRGDASARJABONG" value="15000">
    </label>
</section>

</div>

<div class="row">

    <section class="col col-md-3 font-md">
      <p>Jumlah Pemasangan</p>
  </section>

  <section class="col-md-2">
      <label class="input">
        <input class="form-control input-sm text-align-right" readonly="" style="background: #e4e4e4;" type="text" name="TBLDAFTREKLAME_JMLHREKLAME" id="TBLDAFTREKLAME_JMLHREKLAME">
    </label>
</section>

</div>

<div class="row">

    <section class="col col-md-3 font-md">
      <p>Luas Reklame</p>
  </section>

  <section class="col-md-2">
      <label class="input">
        <input class="form-control input-sm text-align-right" readonly="" style="background: #e4e4e4;" type="text" name="TBLDAFTREKLAME_LUAS" id="TBLDAFTREKLAME_LUAS">
    </label>
</section>

</div>

<div class="row bold">
  <section class="col col-md-3 font-md">
    <p>Biaya Pembongkaran</p>
</section>
<section class="col-md-2">
    <label class="input">
      <input class="form-control input-sm text-align-right format-rupiah" readonly="" style="background: #e4e4e4;" type="text" name="TBLDAFTREKLAME_RUPIAHJABONG" id="TBLDAFTREKLAME_RUPIAHJABONG">
  </label>
</section>

<label class="col control-label">&nbsp;</label>

<section class="col-md-2">
    <button class="btn btn-sm btn-primary" type="button" onclick="hitungJabong()">
      <i class="fa fa-money"></i> Hitung
  </button>
</section>

</div>
<br>
</div>
</div>
</div>
<!-- //TABS -->


</fieldset>

<footer>
  <button type="submit" class="btn btn-sm btn-primary" id="tombol_simpan" style="display: none;"><i class="fa fa-save"> Simpan </i></button>
  <button type="button" class="btn btn-sm btn-primary" id="tombol_cetak" onclick="cetakJabongWord()"><i class="fa fa-print"> Cetak Jabong </i></button></footer>
</form>
<!-- end widget -->

</article>
</label>
</section>

<script type="text/javascript">
    pageSetUp();

    loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
      generateAutocompleteWP();
  });

    /*form validation*/
    loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
    function runFormValidation() {
      var $FormData = $("#form-data-jabonginsidentil").validate({
          // Rules for form validation
          rules : {
            "TBLDAFTREKLAME_RUPIAHJABONG" : {
              required : true
          },

          "TBLDAFTREKLAME_NOJABONG" : {
              required : true
          }
      },

          // Messages for form validation
          messages : {
            "TBLDAFTREKLAME_RUPIAHJABONG" : {
              required : 'Mohon Hitung Jabong'
          },

          "TBLDAFTREKLAME_NOJABONG" : {
              required : 'Mohon Isikan No Jabong'
          }
      },

          // Do not change code below
          errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
        },
        submitHandler : function(form) {
              // saat validasi benar semua, jalankan simpan()
              return simpanjabong();
          }
      });

  };
  /*//form validation*/

  function generateAutocompleteWP() {
      $('#TBLDAFTAR_NOPOK').autocomplete({
        serviceUrl: 'pendataan/reklame2016_tetap/autocompletewp',

        onSelect: function (suggestion) {
          window.id = suggestion.data;
          window.nopokok = suggestion.TBLDAFTAR_NOPOK;
          window.nama = suggestion.TNPWPD_MILIKNAMA;
          window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
          window.alamat = suggestion.TNPWPD_MILIKALAMAT;
          window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
          $(this).val(suggestion.value);
          $('#TBLDAFTAR_NOPOK').val(suggestion.value.split(' | ')[0]);
          $('#TBLDAFTAR_BADANUSAHANAMA').val(nama);
          $('#TBLDAFTAR_BADANUSAHAALAMAT').val(alamat);

      }
      ,showNoSuggestionNotice : true
      ,noCache : true
      ,noSuggestionNotice : "Tidak ditemukan hasil"
  });
  }

  $("#REFJABONGREKLAME_ID").change(function(event) {
    $('#HARGA').val($("#REFJABONGREKLAME_ID option:selected").attr('harga'));
    $('#KESULITAN').val($("#REFJABONGREKLAME_ID option:selected").attr('kesulitan'));
    setPriceFormat(); 
});

  function getNoJabong(tahun) {
      $.ajax({
        url: 'pendataan/entryjabong_insidentil/GetNoJabong',
        type: 'POST',
        dataType: 'json',
        data: {
          tahun: tahun
          ,bulan: $('#TBLDAFTREKLAME_BLNJABONG').val()
      },
      success: function(respon) {
          if (respon=='') {
            $('#TBLDAFTREKLAME_NOJABONG').val(1);
            
        }
        else{
            $('#TBLDAFTREKLAME_NOJABONG').val(respon.NOJABONG);
        }
    }
});
  }

        // function cari() {
        //   $('#form-data-perhitungan').show('fast')
        // }

        function hitungJabong() {

          luasreklame = $('#TBLDAFTREKLAME_LUAS').val();
          jumlahrek = $('#TBLDAFTREKLAME_JMLHREKLAME').val();
          jumlahjabong = $('#TBLDAFTREKLAME_HRGDASARJABONG').val();
          idrek = $('#TREKENING_REKJENIS').select2('val');

          if (idrek== '81' || '83' || '85' || '87' || '89' ) {
            tot_jmljabong = jumlahjabong*jumlahrek;
        } else {
            tot_jmljabong = jumlahjabong*luasreklame*jumlahrek;
        }

        $(".TBLDAFTREKLAME_RUPIAHJABONG").html(toRp(tot_jmljabong));
        $("#TBLDAFTREKLAME_RUPIAHJABONG").val(tot_jmljabong);

          // if($('#is_jml_pemutusanlistrik').is(':checked')){
          //     tarifpemutusan = $('#TARIF_PEMUTUSAN').val();
          // } else {
          //     tarifpemutusan = '0';
          // }

          // tot_listrik = tarifpemutusan*jumlahrek;

          // $(".TBLDAFTREKLAME_LISTRIKJABONG").html(toRp(tot_listrik));
          // $("#TBLDAFTREKLAME_LISTRIKJABONG").val(tot_listrik);

          // total_rupiah = tot_jmljabong+tot_listrik;

          // $(".TBLDAFTREKLAME_RUPIAHJABONG").html(toRp(total_rupiah));
          // $("#TBLDAFTREKLAME_RUPIAHJABONG").val(total_rupiah);

          setPriceFormat();

      }

      function cari() {
          var TBLDAFTAR_NOPOK = $('#TBLDAFTAR_NOPOK').val();
          var TBLPENDATAAN_PAJAKKE = $('#TBLPENDATAAN_PAJAKKE').val();
          var TBLPENDATAAN_THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
          var TBLPENDATAAN_BLNPAJAK = $('#TBLPENDATAAN_BLNPAJAK').val();
          var TBLPENDATAAN_TGLPAJAK = $('#TBLPENDATAAN_TGLPAJAK').val();

          getNoJabong(TBLPENDATAAN_THNPAJAK);
          
          if (TBLDAFTAR_NOPOK=='') {
            notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
            return false;
        }
        else{
            $('#footer-resto').hide('fast');
            $("html, body").animate({ scrollTop: $("#TBLDAFTAR_BADANUSAHANAMA").offset().top-100 }, "slow");
            $("#form-dokumentasi-tanggal").slideDown(600);
            $.ajax({
              url: 'pendataan/entryjabong_insidentil/getdata',
              type: 'POST',
              dataType: 'json',
              data: {
                nopok: btoa(TBLDAFTAR_NOPOK)
                ,tblpendataan_pajakke: btoa(TBLPENDATAAN_PAJAKKE)
                ,tahun: btoa(TBLPENDATAAN_THNPAJAK)
                ,bulan: btoa(TBLPENDATAAN_BLNPAJAK)
                ,tgl: btoa(TBLPENDATAAN_TGLPAJAK)
            },
            success: function(respon) {
                if (respon.data=='sudah entri') {

                    $.SmartMessageBox({
                                    title : "Informasi", // judul Smart Alert
                                    content : "Data dengan Nomor Pokok "+ $('#TBLPENDATAAN_BLNPAJAK').val() +", Masa Pajak "+ $('#TBLPENDATAAN_BLNPAJAK').select2('val')+" "+$('#TBLPENDATAAN_THNPAJAK').val()+" sudah pernah mendaftar. <br> Apakah anda ingin mengubah data ini?", // konten dari smart alert
                                    buttons : '[Tidak][Ya]' // pengaturan tombol
                                }, function(ButtonPressed) {
                                    if (ButtonPressed === "Ya") {

                                        $('#TREKENING_REKJENIS').select2('val',respon.TBLDAFTREKLAME_REKJENIS);
                                        $('#TBLDAFTAR_BADANUSAHANAMA').val(respon.TBLDAFTAR_BADANUSAHANAMA);
                                        $('#TBLDAFTAR_BADANUSAHAALAMAT').val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
                                        $('#TBLDAFTREKLAME_LUAS').val(respon.TBLDAFTREKLAME_LUAS);
                                        $('#TBLDAFTREKLAME_JMLHREKLAME').val(respon.TBLDAFTREKLAME_JMLHREKLAME);
                                        $('#TBLDAFTREKLAME_JMLHREKLAME2').val(respon.TBLDAFTREKLAME_JMLHREKLAME);
                                        $('#TBLDAFTREKLAME_RUPIAHJABONG').val(respon.TBLDAFTREKLAME_RUPIAHJABONG);
                                        $('#TBLDAFTREKLAME_NOJABONG').val(respon.TBLDAFTREKLAME_NOJABONG);
                                        setPriceFormat();
                                        $('#form-data-perhitungan').show('fast');
                                        $('#tombol_simpan').show();
                                    }
                                });
                    return false;

                } else if(respon.data=='sudah terdaftar') {

                    $('#TREKENING_REKJENIS').select2('val',respon.TBLDAFTREKLAME_REKJENIS);
                    $('#TBLDAFTAR_BADANUSAHANAMA').val(respon.TBLDAFTAR_BADANUSAHANAMA);
                    $('#TBLDAFTAR_BADANUSAHAALAMAT').val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
                    $('#TBLDAFTREKLAME_LUAS').val(respon.TBLDAFTREKLAME_LUAS);
                    $('#TBLDAFTREKLAME_JMLHREKLAME').val(respon.TBLDAFTREKLAME_JMLHREKLAME);
                    $('#TBLDAFTREKLAME_JMLHREKLAME2').val(respon.TBLDAFTREKLAME_JMLHREKLAME);

                    $('#form-data-perhitungan').show('fast');
                    $('#tombol_simpan').show();

                } else {
                    notifikasi('Referensi Belum Terdaftar', 'Data dengan nomor '+$('#TBLDAFTAR_NOPOK').val()+' Belum Terdaftar', 'failed', 1,0);
                }

            }
        });

        }

    }

    function simpanjabong () {
        $.ajax({
          url: 'pendataan/entryjabong_insidentil/SimpanJabong',
          type: 'post',
          dataType: "json",
          data:  $("#form-data-jabonginsidentil").serialize(),
          success: function(data) {
            if (data.status=="success") {
                $('#tombol_simpan').attr('disabled', 'disabled');
                notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
            }
            else {
              notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
          }
      }
  });
    }

    function cetakJabong() {
      var param = jQuery.param(
      {
            //rekening: $("#TBLREKENING_KODE").val()
            TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
            , TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
            , TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").val()
            , TBLPENDATAAN_PAJAKKE: $("#TBLPENDATAAN_PAJAKKE").val()
            
        }
        );
      window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendataan/entryjabong_insidentil/cetakjabong?' + param);
  }

  function reload() {
      window.location.reload();
  }

  function cetakJabongWord() {
      reload();
      var param = jQuery.param(
      {
            //rekening: $("#TBLREKENING_KODE").val()
            TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
            , TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
            , TBLPENDATAAN_BLNPAJAK: $("#TBLPENDATAAN_BLNPAJAK").val()
            , TBLPENDATAAN_PAJAKKE: $("#TBLPENDATAAN_PAJAKKE").val()
            
        }
        );
      window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendataan/entryjabong_insidentil/cetakjabongword?' + param);
  }


</script>
<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="well well-sm well-light bg-color-greenLight txt-color-white">
            <h4><i class="fa fa-file-text-o"></i> Cetak Laporan Kendali Air Tanah </h4>
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
          <h2>Daftar Kartu Data Pajak Air Tanah </h2>
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
                         <input type="text" maxlength="2">
                      </label>
                  </section>
</div>
<div class="row">
                  <section class="col col-3">
                      <label class="select">
                              <select class="input-md" enabled="enabled">
                                <option value="0" >Pilih Pajak</option>
                                <option value="1" >PAJAK AIR TANAH</option>
                              </select><i></i>
                      </label>
                  </section>
</div>
<div class="row">
                  <section class="col col-3">
                      <label class="select">
                              <select class="input-md" enabled="enabled">
                                <option value="0" >Pilih</option>
                                <option value="1" >PAJAK AIR BAWAH TANAH</option>
                                <option value="2" >PAJAK AIR TANAH</option>
                              </select><i></i>
                      </label>
                  </section>
</div>
<div class="row">
                  <section class="col col-1">
                        <p>Kecamatan</p>
                  </section>
                  <section class="col col-3">
                      <label class="select">
                              <select class="input-md" enabled="enabled">
                                <option value="0" ></option>
                                <option value="1" >KEC. CANGKRINGAN</option>
                                <option value="2" >KEC. BERBAH</option>
                                <option value="3" >KEC. GAMPING</option>
                                <option value="4" >KEC. KALASAN</option>
                                <option value="5" >KEC. GODEAN</option>
                                <option value="6" >KEC. MOYUDAN</option>
                                <option value="7" >KEC. MINGGIR</option>
                                <option value="8" >KEC. MLATI</option>
                                <option value="9" >KEC. NGAGLIK</option>
                                <option value="10" >KEC. DEPOK</option>
                                <option value="11" >KEC. NGEMPLAK</option>
                                <option value="12" >KEC. MERGANGSAN</option>
                                <option value="13" >KEC. TEMPEL</option>
                                <option value="14" >KEC. PRAMBANAN</option>
                                <option value="15" >KEC. YOGYAKARTA</option>
                                <option value="16" >LUAR KOTA</option>
                              </select><i></i>
                      </label>
                  </section>
</div>
<div class="row">
                  <section class="col col-1">
                        <p>Kd Jalan</p>
                  </section>
                  <section class="col col-3">
                      <label class="select">
                              <select class="input-md" enabled="enabled">
                                <option value="0" ></option>
                                <option value="8" >JL. PURWANGGAN YK</option>
                                <option value="1" >JL. DAGEN YK</option>
                                <option value="2" >JL. TRIKORA YK</option>
                                <option value="3" >JL. PANDEAN</option>
                                <option value="4" >JL. MANGKUYUDAN YK</option>
                                <option value="5" >JL. PERWAKILAN YK</option>
                                <option value="6" >JL. SURYOWIJAYAN YK</option>
                                <option value="7" >ROTOWIJAYAN</option>
                                <option value="8" >JL. MASJID YK</option>
                                <option value="8" >JL. JOGONEGARAN YK</option>
                                <option value="8" >JL. FARIDAN M.NOTO</option>
                                <option value="8" >JL. PABRINGAN YK</option>
                                <option value="8" >JL. IBU RUSWO YK</option>
                                <option value="8" >JL. KEPUH YK</option>
                                <option value="8" >SAMSAT</option>
                                <option value="8" >JL. LANGENSARI YK</option>
                                <option value="8" >JL. SUGENGJERONI YK</option>
                                <option value="8" >JL. AHMAD JAZULI</option>
                                <option value="8" >JL. SRIWEDANI YK</option>
                                <option value="8" >JL. BEJI YK</option>
                                <option value="8" >JL. KARTINI YK</option>
                                <option value="8" >JL. H.AGUS SALIM YK</option>
                                <option value="8" >JL. TENTARA RAKYAT MATARAM</option>
                                <option value="8" >JL. SUKONANDI YK</option>
                                <option value="8" >JL. SINDUNEGARAN YK</option>
                                <option value="8" >JL. LANGENASTRAN YK</option>
                                <option value="8" >JL. SARTONO YK</option>
                                <option value="8" >JL. MELATI WETAN YK</option>
                                <option value="8" >JL. KEMUNING YK</option>
                                <option value="8" >JL. JANTI YK</option>
                                <option value="8" >JL. SOSROWIJAYAN YK</option>
                                <option value="8" >JL. JL. GADEAN YK</option>
                                <option value="8" >JL. REJOWINANGUN</option>
                                <option value="8" >JLN. PROF.DR.SUPOMO YK</option>
                                <option value="8" >RETO DUMILAH</option>
                                <option value="8" >STASIUN TUGU YK</option>
                                <option value="8" >KOMPLEK STA. TUGU YOGYAKARTA</option>
                                <option value="8" >JL. SAMRATULANGI YK</option>
                                <option value="8" >PASAR NGASEM YOGYAKARTA</option>
                                <option value="8" >JL. JUWADI 11 YK</option>
                                <option value="8" >JL. CANDRAKIRANA YK</option>
                                <option value="8" >JL. DEWISARTIKA YK</option>
                                <option value="8" >ASEM GEDE YK</option>
                                <option value="8" >JL. GOWONGAN YOGYAKARTA</option>
                                <option value="8" >TOYOTA KIJANG AB 8730 KA</option>
                                <option value="8" >JL. KEMAKMURAN BALAPAN YK</option>
                                <option value="8" >JL. BUMIJO YOGYAKARTA</option>
                                <option value="8" >JL. GOTONGROYONG/PETINGGEN</option>
                                <option value="8" >JL. BUMIJO YK</option>
                                <option value="8" >JL. AM.SANGAJI YK</option>
                                <option value="8" >JL. SAM RATULANGI YK</option>
                                <option value="8" >JL. PANDEAN YK</option>
                                <option value="8" >JL. SABIRIN YK</option>
                                <option value="8" >JL. DEWI SARTIKA YK</option>
                                <option value="8" >JL. LEMPUYANGAN YK</option>
                                <option value="8" >JL. GOLO YOGYAKARTA</option>
                                <option value="8" >JL. PEMBAYUN YK</option>
                                <option value="8" >JL. MONDORAKAN YK</option>
                                <option value="8" >JL. PRAMUKA YK</option>
                                <option value="8" >JL. PATIMURA KOTABARU YK</option>
                                <option value="8" >JL. KEMAKMURAN YK</option>
                                <option value="8" >JL. GONDOSULI 15/17 YOGYAKARTA</option>
                                <option value="8" >JLN. PEMBELA TANAH AIR YK</option>
                                <option value="8" >JL. BATIKAN YOGYAKARTA</option>
                                <option value="8" >JLN. LEDOK GONDOMANAN NO.7 YOGYAKARTA</option>
                                <option value="8" >JL. YOS SUDARSO</option>
                                <option value="8" >JLN. SAYIDAN YOGYAKARTA</option>
                                <option value="8" >JL. TUNJUNG BACIRO YK</option>
                                <option value="8" >PAKUALAMAN</option>
                                <option value="8" >JL. TUKANGAN YK</option>
                                <option value="8" >JL. KETANDAN YOGYAKARTA</option>
                                <option value="8" >JLN. POLISI ISTIMEWA YK</option>
                                <option value="8" >JLN. BALEREJO YOGYAKARTA</option>
                                <option value="8" >JLN. KERTO YOGYAKARTA</option>
                                <option value="8" >JL. LETJEN S PARMAN YK</option>
                                <option value="8" >JL. PAJEKSAN YOGYAKARTA</option>
                                <option value="8" >JL. LOR PASAR BHARJO YK</option>
                                <option value="8" >JL. PENGOK</option>
                                <option value="8" >JL. PATANGPULUHAN</option>
                                <option value="8" >JLN. KEMETIRAN </option>
                                <option value="8" >JL. ATMO SUKARTO YK</option>
                                <option value="8" >JL. GANDEKAN LOR</option>
                                <option value="8" >JL. MANGUNSARKORO YK</option>
                                <option value="8" >JL. SABIRIN YK</option>
                                <option value="8" >JL. PERWAKILAN YOGYAKARTA</option>
                                <option value="8" >JL. GUNO MRICO YOGYAKARTA</option>
                                <option value="8" >JL. PAKUNCEN BARU YOGYAKARTA</option>
                                <option value="8" >JL. GLAGAHSARI YK</option>
                                <option value="8" >JL. SURYODININGRAT YK</option>
                                <option value="8" >JL. PROF.DR.SUPOMO YK</option>
                                <option value="8" >JL. MAWAR BACIRO YOGYAKARTA</option>
                                <option value="8" >JL. BIMASAKTI YK</option>
                                <option value="8" >JL. TRIBRATA YK</option>
                                <option value="8" >JLN. KENEKAN YK</option>
                                <option value="8" >JLN. DIPONEGORO & SUDIRMAN YOGYAKARTA</option>
                                <option value="8" >JLN. KYAI MOJO-ADISUCIPTO YK</option>
                                <option value="8" >ALUN-ALUN UTARA YK</option>
                                <option value="8" >JL. JOHAR NURHADI YK</option>
                                <option value="8" >JL. AM SANGAJI</option>
                                <option value="8" >JL. MANGKUBUMI NO YK</option>
                                <option value="8" >JL. MALIOBORO</option>
                                <option value="8" >JL. A. YANI YK</option>
                                <option value="8" >WILAYAH KECAMATAN KRATON</option>
                                <option value="8" >SITUS KOTAGEDE</option>
                                <option value="8" >JL. LETJEN PANJAITAN</option>
                                <option value="8" >JL. MINGGIRAN</option>
                                <option value="8" >JL. JOGOKARYAN</option>
                                <option value="8" >JL. TIRTODIPURAN</option>
                                <option value="8" >JL. SURYODININGRATAN</option>
                                <option value="8" >JL. PARANGTRITIS YK</option>
                                <option value="8" >JL. MENUKAN</option>
                                <option value="8" >JL. TRITUNGGAL</option>
                                <option value="8" >JL. SOROGENEN</option>
                                <option value="8" >JL. TEGALTURI</option>
                                <option value="8" >JL. TEGAL GENDU</option>
                                <option value="8" >JL. MONDORAKAN</option>
                                <option value="8" >JL. KARANG</option>
                                <option value="8" >JL. KEMASAN</option>
                                <option value="8" >JL. NGEKSIGONDO</option>
                                <option value="8" >JL. MAGELANG</option>
                                <option value="8" >JL. KYAI MOJO</option>
                                <option value="8" >JL. HOS COKROAMINOTO</option>
                                <option value="8" >JL. RE MARTADINATA</option>
                                <option value="8" >JL. KAPTEN TENDEAN</option>
                                <option value="8" >JL. BUGISAN</option>
                                <option value="8" >JL. SUGENG JERONI</option>
                                <option value="8" >JL. C SIMANJUNTAK</option>
                                <option value="8" >JL. PROF DR YOHANES</option>
                                <option value="8" >JL. URIP SUMOHARJO</option>
                                <option value="8" >JL. LAKSDA ADISUCIPTO</option>
                                <option value="8" >JL. GEJAYAN</option>
                                <option value="8" >JL. MENTERI SUPENO</option>
                                <option value="8" >JL. PERINTIS KEMERDEKAAN</option>
                                <option value="8" >JL. VETERAN</option>
                                <option value="8" >JL. WARUNG BOTO</option>
                                <option value="8" >JL. GAMBIRAN</option>
                                <option value="8" >JL. PRAMUKA/GIWANGAN</option>
                                <option value="8" >JL. IMOGIRI</option>
                                <option value="8" >JL. RETNODULMILAH YK</option>
                                <option value="8" >JL. GEDONG KUNING</option>
                                <option value="8" >JL. WIROBRAJAN/WATES YK</option>
                                <option value="8" >JL. W. MONGINSIDI YK</option>
                                <option value="8" >JL. SARDJITO</option>
                                <option value="8" >JL. PANGERAN DIPONEGORO</option>
                                <option value="8" >JL. JENDERAL SUDIRMAN</option>
                                <option value="8" >JL. JLAGRAN</option>
                                <option value="8" >JL. RAHAYU-SAMIRONO</option>
                                <option value="8" >JL. PASAR KEMBANG</option>
                                <option value="8" >JL. LETJEN SUPRAPTO</option>
                                <option value="8" >JL. PETA</option>
                                <option value="8" >JL. SOSROWIJAYAN</option>
                                <option value="8" >JL. DAGEN</option>
                                <option value="8" >JL. GANDEKAN</option>
                                <option value="8" >JL. BHAYANGKARA YK</option>
                                <option value="8" >JL. KH A.DAHLAN</option>
                                <option value="8" >JL. PANEMBAHAN SENOPATI</option>
                                <option value="8" >JL. SURYOTOMO YK</option>
                                <option value="8" >JL. SURYATMAJAN</option>
                                <option value="8" >JL. JUMINAHAN</option>
                                <option value="8" >JL. BAUSASRAN</option>
                                <option value="8" >JL. HARDJOWINATAN</option>
                                <option value="8" >JL. HAYAM WURUK</option>
                                <option value="8" >JL. DR SUTOMO</option>
                                <option value="8" >JL. DR WAHIDIN-SURYOPRANOTO</option>
                                <option value="8" >JL. KOMPOL B SUPRAPTO</option>
                                <option value="8" >JL. MUNGGUR</option>
                                <option value="8" >JL. GONDOSULI YK</option>
                                <option value="8" >JL. SULTAN AGUNG</option>
                                <option value="8" >JL. KUSUMANEGARA</option>
                                <option value="8" >JL. IPDA TUT HARSONO</option>
                                <option value="8" >JL. GLAGAHSARI</option>
                                <option value="8" >JL. JANTURAN</option>
                                <option value="8" >JL. VETERAN II</option>
                                <option value="8" >JL. KI PENJAWI</option>
                                <option value="8" >JL. BRIGJEN KATAMSO</option>
                                <option value="8" >JL. IREDA</option>
                                <option value="8" >JL. KOL SUGIYONO</option>
                                <option value="8" >JL. SISINGAMANGARAJA</option>
                                <option value="8" >JL. LOWANO</option>
                                <option value="8" >JL. WIROSABAN</option>
                                <option value="8" >JL. BANTUL</option>
                                <option value="8" >JL. KARANGLO/ MENTAOKRAYA</option>
                                <option value="8" >JL. WAHID HASYIM</option>
                                <option value="8" >JL. MT HARYONO</option>
                                <option value="8" >JL. MAYJEN SUTOYO YK</option>
                                <option value="8" >JL. NGAMPILAN</option>
                                <option value="8" >JL. JEND.SUDIRMAN YK</option>
                                <option value="8" >JL. CIK DI TIRO</option>
                                <option value="8" >JL. SUDIRMAN</option>
                                <option value="8" >KAWASAN KOTABARU</option>
                                <option value="8" >JL. GAYAM</option>
                                <option value="8" >JL. KENARI</option>
                                <option value="8" >JL. LETJEN S PARMAN</option>
                                <option value="8" >JL. TAMANSISWA YK</option>
                                <option value="8" >JL. BABARAN</option>
                                <option value="8" >SEPANJANG SUNGAI WINONGO</option>
                                <option value="8" >SEPANJANG SUNGAI CODE</option>
                                <option value="8" >SEPANJANG SUNGAI GAJAH</option>
                                <option value="8" >WILAYAH KARANG WARU</option>
                                <option value="8" >BLUNYAH</option>
                                <option value="8" >JL. PAKUNINGRATAN</option>
                                <option value="8" >JL. KRANGGAN</option>
                                <option value="8" >JL. PONCOWINATAN</option>
                                <option value="8" >JL. TENTARA PELAJAR</option>
                                <option value="8" >JL. JATI</option>
                                <option value="8" >JL. KEMETIRAN KIDUL</option>
                                <option value="8" >JL. KS TUBUN</option>
                                <option value="8" >KAWASAN TERBAN</option>
                                <option value="8" >KAWASAN SAGAN</option>
                                <option value="8" >KAWASAN IROMEJAN</option>
                                <option value="8" >KAWASAN KLITREN</option>
                                <option value="8" >KAWASAN BALAPAN</option>
                                <option value="8" >KAWASAN KUNCEN</option>
                                <option value="8" >KAWASAN JAMBON</option>
                                <option value="8" >KAWASAN KRICAK</option>
                                <option value="8" >KAWASAN BENER</option>
                                <option value="8" >KAWASAN TEGALREJO</option>
                                <option value="8" >KAWASAN TEGALMULYO</option>
                                <option value="8" >KAWASAN KLEBEN</option>
                                <option value="8" >KAWASAN WIROBRAJAN</option>
                                <option value="8" >KAWASAN KETANGGUNGAN</option>
                                <option value="8" >KAWASAN GEDONGKIWO</option>
                                <option value="8" >KAWASAN DONGKELAN</option>
                                <option value="8" >KAWASAN KRAPYAK</option>
                                <option value="8" >KAWASAN MANGKUYUDAN</option>
                                <option value="8" >KAWASAN TIMURAN</option>
                                <option value="8" >KAWASAN MANTRIJERON</option>
                                <option value="8" >KAWASAN BRONTOKUSUMAN</option>
                                <option value="8" >KAWASAN PRAWIROTAMAN</option>
                                <option value="8" >KAWASAN KEPARAKAN</option>
                                <option value="8" >KAWASAN WIROGUNAN</option>
                                <option value="8" >KAWASAN PURWOKINANTI</option>
                                <option value="8" >KAWASAN GUNUNG KETUR</option>
                                <option value="8" >KAWASAN SEMAKI</option>
                                <option value="8" >KAWASAN BACIRO</option>
                                <option value="8" >KAWASAN TIMOHO</option>
                                <option value="8" >KAWASAN GENDENG-SAPEN</option>
                                <option value="8" >KAWASAN MERGANGSANGAN</option>
                                <option value="8" >KAWASAN KARANGKAJEN</option>
                                <option value="8" >KAWASAN SOROSUTAN</option>
                                <option value="8" >KAWASAN SIDIKAN</option>
                                <option value="8" >KAWASAN NITIKAN</option>
                                <option value="8" >KAWASAN WIROSABAN</option>
                                <option value="8" >KAWASAN CELEBAN</option>
                                <option value="8" >KAWASAN PANDEAN</option>
                                <option value="8" >KAWASAN REJOWINANGUN</option>
                                <option value="8" >KAWASAN PILAHAN</option>
                                <option value="8" >KAWASAN DEPOKAN</option>
                                <option value="8" >KAWASAN BASEN</option>
                                <option value="8" >KAWASAN PRENGGAN</option>
                                <option value="8" >KAWASAN PURBAYAN</option>
                                <option value="8" >JL. ABUBAKAR ALI</option>
                                <option value="8" >JL. KLERINGAN</option>
                                <option value="8" >JL. KOMPOL B.SUPRAPTO</option>
                                <option value="8" >JL. KEBUNRAYA YK</option>
                                <option value="8" >JL. KUSBINI YK</option>
                                <option value="8" >JL. PERINTIS KEMERDEKAAN</option>
                                <option value="8" >JL. GAJAH MADA</option>
                                <option value="8" >JL. TIMOHO YK</option>
                                <option value="8" >JL. PRAWIROTAMAN</option>
                                <option value="8" >JL. KARANGLO</option>
                                <option value="8" >JL. BINTARAN YK</option>
                                <option value="8" >JL. SUROTO YK</option>
                                <option value="8" >JL. LANGENSARI YK</option>
                                <option value="8" >JL. NGASEM YK</option>
                                <option value="8" >JL. GAJAHMADA YK</option>
                                <option value="8" >JL. LEMPUYANGAN YK</option>
                                <option value="8" >JL. GAYAM YK</option>
                                <option value="8" >JL. CENDANA YK</option>
                                <option value="8" >JL. KAPAS YK</option>
                                <option value="8" >JL. MATARAM YK</option>
                                <option value="8" >JL. MAS SUHARTO YK</option>
                                <option value="8" >JL. BESKALAN YK</option>
                                <option value="8" >JL. BATIKAN YK</option>
                                <option value="8" >JL. MELATI KULON YK</option>
                              </select><i></i>
                      </label>
                  </section>
</div>
<div class="row">
                  <section class="col col-sm0">
                       <p>Cara Penetapan</p>
                  </section>
                  <section class="col col-sm-1">
                      <label class="input">
                         <input type="text" maxlength="1">
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
                          <i class="fa fa-save"></i> Cetak
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
    window.APP_URL = "<?php echo $data['URL_APP']; ?>";
    function cetak () {
    window.open(window.APP_URL+'/penetapan/rekap_kendaliabt/cetak');
}
</script>
<!--  -->
<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" border="0">
  <thead>  
    <tr>
      <td align="center" width="15%"></td>
      <td align="center"><strong>PEMERINTAH KOTA YOGYAKARTA<br>BADAN PENGELOLAAN KEUANGAN DAN <br> ASET DAERAH <br> <h5>Jl.Kenari No.56 Yogyakarta 55165 <br> Telp. 515865, 515866 Psw. 161, <br> Langsung 548519 dan 562835</strong></td>
      <td align="center"><strong>SKPDKB<br>(SURAT KETETAPAN PAJAK DAERAH <br>KURANG BAYAR) <br> <h4> Tahun : 20<?php echo $data['cetak']['TBLDAFTHOTEL_THNKURANGBAYAR']; ?><br> <div> Bulan : <?php echo $data['cetak']['TBLDAFTHOTEL_BLNKBAWAL']; ?> s/d <?php echo $data['cetak']['TBLDAFTHOTEL_BLNKBAKHIR']; ?></div></strong></td>
      <td align="center">Nomor <br> <?php echo $data['cetak']['TBLDAFTHOTEL_REGKURANGBAYAR']; ?></td>
    </tr>
  </thead>
</table>

<br>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" border="0">
  <thead>
    <tr>
      <td align="left" width="5%">NPWPD</td>
      <td align="left">:</td>
      <td align="left"><?php echo $data['cetak']['TBLDAFTAR_JNSPENDAPATAN']; ?>.<?php echo $data['cetak']['TBLDAFTAR_GOLONGAN']; ?>.<?php echo $data['cetak']['TBLDAFTAR_NOPOK']; ?>.<?php echo $data['cetak']['TBLKECAMATAN_ID']; ?>.<?php echo $data['cetak']['TBLKELURAHAN_ID']; ?></td>
      <td align="left" width="5%">Pemilik</td>
      <td align="left">/</td>
      <td align="left">Pengelola</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td align="left">Nama</td>
      <td align="left">:</td>
      <td align="left"><?php echo $data['cetak']['TBLDAFTAR_BADANUSAHANAMA']; ?></td>
      <td align="left">Nama</td>
      <td align="left">:</td>
      <td align="left"><?php echo $data['cetak']['TBLDAFTAR_PEMILIKNAMA']; ?></td>
      <tr>
        <td align="left">Alamat</td>
        <td align="left">:</td>
        <td align="left"><?php echo $data['cetak']['TBLDAFTAR_BADANUSAHAALAMAT']; ?></td>
        <td align="left">Alamat</td>
        <td align="left">:</td>
        <td align="left"><?php echo $data['cetak']['TBLDAFTAR_PEMILIKALAMAT']; ?></td>
      </tr>
    </tr>
  </tbody>
</table>

<br>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" border="0">
  <thead>
    <tr>
      <td align="left" width="18%">Tanggal Jatuh Tempo Pembayaran</td>
      <td align="left" width="5%">:</td>
      <td align="left"><?php echo $data['cetak']['TBLDAFTHOTEL_TGLBTSKRGBAYAR']; ?>/<?php echo $data['cetak']['TBLDAFTHOTEL_BLNBTSKRGBAYAR']; ?>/<?php echo $data['cetak']['TBLDAFTHOTEL_THNBTSKRGBAYAR']; ?>17</td>
    </tr>
  </thead>
</table>

<br>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" border="0">
  <thead>
    <tr>
      <td align="center" width="3%">I. </td>
      <td align="left">Berdasarkan Pasal 170 Undang-Undang Nomor 28 Tahun 2009, telah dilakukan pemeriksaan atau keterangan lain </td>
    </tr>
    <tr>
      <td></td>
      <td align="left"> atas pelaksanaan kewajiban: </td>
    </tr>
  </thead>
</table>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" border="0">
  <thead>
    <tr>
      <td width="3%"></td>
      <td align="left" width="10%">Rekening</td>
      <td align="left" width="5%">:</td>TBLREKENING_KODEFULL
      <td align="left"><?php echo $data['cetak']['TBLREKENING_KODEFULL']; ?> <?php echo $data['cetak']['NMREK']; ?></td>
    </tr>
  </thead>
</table>
<br>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" border="0">
  <thead>
    <tr>
      <td width="3%"></td>
      <td align="left" width="15%">Masa Pajak Tahun 2014</td>
      <td align="center" width="10%">Bulan</td>
      <td align="left">:</td>
      <td align="left"> <?php echo $data['cetak']['TBLDAFTHOTEL_BLNKBAWAL']; ?> s/d <?php echo $data['cetak']['TBLDAFTHOTEL_BLNKBAKHIR']; ?></td>
    </tr>
  </thead>
</table>

<br>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" border="0">
  <thead>
    <tr>
      <td align="center" width="3%">II. </td>
      <td align="left">Hasil pemeriksaan atau keterangan lain tersebut di atas, penghitungan jumlah yang seharusnya dibayar</td>
    </tr>
    <tr>
      <td></td>
      <td align="left">adalah sebagai berikut:</td>
    </tr>
  </thead>
</table>

<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
  <thead>
    <tr>
      <td align="center" rowspan="2" width="20%">Pemeriksaan<br> pajak (Rp.)</td>
      <td align="center" colspan="2-3">Sanksi Denda (Rp.)</td>
      <td align="center">Penyetoran</td>
      <td align="center">Kurang Bayar</td>
    </tr>
    <tr>
      <td align="center">Bunga (Rp.)</td>
      <td align="center">Denda (Rp.)</td>
      <td align="center"> Rp.</td>
      <td align="center"> Rp.</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td align="center"><?php echo LokalIndonesia::rupiah($data['cetak']['TBLDAFTHOTEL_PAJAKPERIKSA']); ?></td>
      <td align="center"><?php //echo LokalIndonesia::rupiah($data['cetak']['TBLDAFTHOTEL_BUNGAKRGBAYAR']); ?></td>
      <td align="center"><?php echo LokalIndonesia::rupiah($data['cetak']['TBLDAFTHOTEL_DENDAKRGBAYAR']); ?></td>
      <td align="center"><?php echo LokalIndonesia::rupiah($data['cetak']['TBLDAFTHOTEL_RUPIAHSETOR']); ?></td>
      <td align="center"><?php echo LokalIndonesia::rupiah($data['cetak']['TBLDAFTHOTEL_RUPIAHKRGBAYAR']); ?></td>
    </tr>
    <tr>
      <td colspan="4" align="center">Jumlah Yang Masih Harus Dibayar</td>
      <td align="center"><?php echo LokalIndonesia::rupiah($data['cetak']['TBLDAFTHOTEL_RUPIAHKRGBAYAR']); ?></td>
    </tr>
  </tbody>
</table>

<br>
<div class="row">  
  <div class="col col-md-2">
    <div class="row">
      Dengan huruf
    </div>
  </div>
</div>

<hr>
<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
  <thead>
    <tr>
      <td width="3%"></td>
      <td align="left">PERHATIAN:</td>
    </tr>
    <tr>
      <td width="3%" align="center">1.</td>
      <td align="left">Pembayaran dilakukan melalui Bank BPD atau Kas Daerah dengan menggunakan SSPD (Surat Setoran Pajak Daerah).</td>
    </tr>
    <tr>
      <td width="3%" align="center">2.</td>
      <td align="left">Apabila SKPDKB ini tidak kurang dibayar setelah lewat dari tanggal jatuh tempo pembayaran muka akan dikenakan sanksi administrasi berupa bunga sebsar 2% (dua persen) perbulan.</td>
    </tr>
  </thead>
</table>

<br>
<br>
<div id="ttd">
<table width="100%" id="atas" border="0">
<!-- <style type="text/css">
        table,td,th {
            border: 0px solid #C6C6C6;
        }
      </style> -->
      <thead>  
        <tr>
          <td align="center" width="50%"></td>
          <td align="center">YOGYAKARTA, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td align="center" width="50%"></td>
          <td align="center">a.n. Kepala Dinas</td>
        </tr>
        <tr>
          <td width="50%"></td>
          <td align="center">Kepala Seksi Dinas</td>
        </tr>
        <tr>
          <td width="50%"></td>
          <td style="color: white">ttd</td>
        </tr>
        <tr>
         <td width="50%"></td>
         <td style="color: white">ttd</td>
       </tr>
       <tr>
        <td width="50%"></td>
        <td style="color: white">ttd</td>
      </tr>
      <tr>
        <td align="center" width="50%"></td>
        <td align="center">TUTY ARYANI, SH</td>
      </tr>
      <tr>
        <td align="center" width="50%"></td>
        <td align="center">---------------------------------</td>
      </tr>
      <tr>
        <td align="center" width="50%"></td>
        <td align="center">NIP. 19590101 1986603 2 01 1</td>
      </tr>
    </tbody>
  </table>
</div>

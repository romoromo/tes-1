<?php Yii::import('ext.LokalIndonesia'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Untitled Document</title>
  <style type="text/css">
    <!--
    .style3 {font-size: 14px}
    .style4 {font-size: 16px}
  -->
</style>
</head>

<body>
  <div align="center" class="style4">
    <p>BUKU REKAPITULASI PENERIMAAN HARIAN</p>
    <p>&nbsp;</p>
  </div>
  <table width="50%" border="0">
    <tr>
      <td width="37%"><span class="style3">SKPD</span></td>
      <td width="3%">:</td>
      <td width="60%"><span class="style3">BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH </span></td>
    </tr>
    <tr>
      <td><span class="style3">PENGGUNA ANGGARAN </span></td>
      <td>:</td>
      <td><span class="style3">DRS. KADRI RENGGONO, M . SI </span></td>
    </tr>
    <tr>
      <td><span class="style3">BENDAHARA PENERIMA </span></td>
      <td>:</td>
      <td><span class="style3">WARNINGSIH</span></td>
    </tr>
    <tr>
      <td><span class="style3">BULAN</span></td>
      <td>:</td>
      <td><span class="style3"><?php echo LokalIndonesia::getBulan($bulan = $_REQUEST['bulan']) ?> <?php echo $tahun = $_REQUEST['tahun'] ?> </span></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">

    <td width="0" height="0" bordercolor="0" align="center">--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>

  </table>
  <table width="100%" border="0" cellpadding="1" cellspacing="0" >
    <tr boder-bottom>
      <td width="12%">&nbsp;</td>
      <td width="11%">&nbsp;</td>
      <td width="15%">&nbsp;</td>
      <td width="13%" colspan="4">PAJAK DAERAH (RP) </td>
      <td>&nbsp;</td>
      <td colspan="6">LAIN-LAIN PAD YANG SAH (RP) </td>
    </tr>
    <tr>
      <td colspan="12" align="center">--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
    </tr>
    <tr>
      <td align="center" rowspan="2">Tanggal</td>
      <td align="center"><u>4.1.1.01</u> </td>
      <td align="center"><u>4.1.1.02</u> </td>
      <td align="center"><u>4.1.1.03</u> </td>
      <td align="center"><u>4.1.1.04</u> </td>
      <td align="center"><u>4.1.1.05</u> </td>
      <td align="center"><u>4.1.1.07</u> </td>
      <td align="center"><u>4.1.1.08</u> </td>
      <td align="center"><u>4.1.1.09</u> </td>
      <td align="center"><u>4.1.1.10</u> </td>
      <td align="center"><u>4.1.1.11</u> </td>
      <td align="center"><u>4.1.1.23</u> </td>
    </tr>
    <tr>
      
      <td align="center">PJK  HOTEL</td>
      <td align="center">PJK RESTORAN </td>
      <td align="center">PJK HIBURAN</td>
      <td align="center">PJK REKLAME</td>
      <td align="center">P.P.J</td>
      <td align="center"> PJK PARKIR</td>
      <td align="center">AIR TANAH</td>
      <td align="center">PJK BURUNG WALET</td>
      <td align="center">PBB</td>
      <td align="center">BPHTB</td>
      <td align="center">SEWA ASET </td>
    </tr>
    <?php $totalhotel = 0; ?>
    <?php $totalhotel1 = 0; ?>
    <?php $totalrestoran = 0; ?>
    <?php $totalrestoran1 = 0; ?>
    <?php $totalhiburan = 0; ?>
    <?php $totalhiburan1 = 0; ?>
    <?php $totalreklame = 0; ?>
    <?php $totalreklame1 = 0; ?>
    <?php $totalppj = 0; ?>
    <?php $totalppj1 = 0; ?>
    <?php $totalparkir = 0; ?>
    <?php $totalparkir1 = 0; ?>
    <?php $totalair = 0; ?>
    <?php $totalair1 = 0; ?>
    <?php $totalburung = 0; ?>
    <?php $totalburung1 = 0; ?>
    <?php $totalpbb = 0; ?>
    <?php $totalpbb1 = 0; ?>
    <?php $totalbphtb = 0; ?>
    <?php $totalbphtb1 = 0; ?>
    <?php $totalaset = 0; ?>
    <?php $totalaset1 = 0; ?>
    <?php $no=1; foreach($data['cetak'] as $list) :?>
    <?php $totalhotel = $totalhotel+$list['PAJAKHOTEL'] ?>
    <?php $totalhotel1 = $totalhotel1+$list['BNGDNDHOTEL'] ?>
    <?php $totalrestoran = $totalrestoran+$list['PAJAKRESTORAN'] ?>
    <?php $totalrestoran1 = $totalrestoran1+$list['BNGDNDRESTORANL'] ?>
    <?php $totalhiburan = $totalhiburan+$list['PAJAKRESTORAN'] ?>
    <?php $totalhiburan1 = $totalhiburan1+$list['BNGDNDHIBURAN'] ?>
    <?php $totalreklame = $totalreklame+$list['PAJAKREKLAME'] ?>
    <?php $totalreklame1 = $totalreklame1+$list['BNGDNDREKLAME'] ?>
    <?php $totalppj = $totalppj+$list['PAJAKPPJ'] ?>
    <?php $totalppj1 = $totalppj1+$list['BNGDNDPPJ'] ?>
    <?php $totalparkir = $totalparkir+$list['PAJAKPARKIR'] ?>
    <?php $totalparkir1 = $totalparkir1+$list['BNGDNDPARKIR'] ?>
    <?php $totalair = $totalair+$list['PAJAKABT'] ?>
    <?php $totalair1 = $totalair1+$list['BNGDNDABT'] ?>
    <?php $totalburung = $totalburung+$list['PAJAKWALET'] ?>
    <?php $totalburung1 = $totalburung1+$list['BNGDNDWALET'] ?>
    <?php $totalpbb = $totalpbb+$list['PAJAKPBB'] ?>
    <?php $totalpbb1 = $totalpbb1+$list['BNGDNDPBB'] ?>
    <?php $totalbphtb = $totalbphtb+$list['PAJAKBPHTB'] ?>
    <?php $totalbphtb1 = $totalbphtb1+$list['BNGDNDBPHTB'] ?>
    <?php $totalaset = $totalaset+$list['PAJAKSEWA'] ?>
    <?php $totalaset1 = $totalaset1+$list['BNGDNDSEWA'] ?>
    <tr>
      <td align="center"><?php echo $list['TBLSETOR_TGLSETOR'] ?>/<?php echo $list['TBLSETOR_BLNSETOR'] ?>/<?php echo $list['TBLSETOR_THNSETOR'] ?><br>BNG&DND</td>
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKHOTEL']) ?><br><?php echo $list['BNGDNDHOTEL'] ?></td>
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKRESTORAN']) ?><br><?php echo $list['BNGDNDRESTORANL'] ?></td>
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKHIBURAN']) ?><br><?php echo $list['BNGDNDHIBURAN'] ?></td> <!-- Hiburan -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKREKLAME']) ?><br><?php echo $list['BNGDNDREKLAME'] ?></td> <!-- Reklame -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKPPJ']) ?><br><?php echo $list['BNGDNDPPJ'] ?></td> <!-- PPJ -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKPARKIR']) ?><br><?php echo $list['BNGDNDPARKIR'] ?></td> <!-- Parkir -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKABT']) ?><br><?php echo $list['BNGDNDABT'] ?></td> <!-- Air Tanah -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKWALET']) ?><br><?php echo $list['BNGDNDWALET'] ?></td> <!-- Wallet -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKPBB']) ?><br><?php echo $list['BNGDNDPBB'] ?></td> <!-- PBB -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKBPHTB']) ?><br><?php echo $list['BNGDNDBPHTB'] ?></td> <!-- BPHTB -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKSEWA']) ?><br><?php echo $list['BNGDNDSEWA'] ?></td> <!-- Wallet -->
    </tr>
  <?php endforeach ?>
  <tr>
      <td colspan="12" align="center">--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
    </tr>
  <tr>
    <td align="center">Total:</td>
    <td align="right"><?php echo LokalIndonesia::ribuan($totalhotel) ?><br><?php echo LokalIndonesia::ribuan($totalhotel1) ?></td>
    <td align="right"><?php echo LokalIndonesia::ribuan($totalrestoran) ?><br><?php echo LokalIndonesia::ribuan($totalrestoran1) ?></td>
    <td align="right"><?php echo LokalIndonesia::ribuan($totalhiburan) ?><br><?php echo LokalIndonesia::ribuan($totalhiburan1) ?></td>
    <td align="right"><?php echo LokalIndonesia::ribuan($totalreklame) ?><br><?php echo LokalIndonesia::ribuan($totalreklame1) ?></td>
    <td align="right"><?php echo LokalIndonesia::ribuan($totalppj) ?><br><?php echo LokalIndonesia::ribuan($totalppj1) ?></td>
    <td align="right"><?php echo LokalIndonesia::ribuan($totalparkir) ?><br><?php echo LokalIndonesia::ribuan($totalparkir1) ?></td>
    <td align="right"><?php echo LokalIndonesia::ribuan($totalair) ?><br><?php echo LokalIndonesia::ribuan($totalair1) ?></td>
    <td align="right"><?php echo LokalIndonesia::ribuan($totalburung) ?><br><?php echo LokalIndonesia::ribuan($totalburung1) ?></td>
    <td align="right"><?php echo LokalIndonesia::ribuan($totalpbb) ?><br><?php echo LokalIndonesia::ribuan($totalpbb1) ?></td>
    <td align="right"><?php echo LokalIndonesia::ribuan($totalbphtb) ?><br><?php echo LokalIndonesia::ribuan($totalbphtb1) ?></td>
    <td align="right"><?php echo LokalIndonesia::ribuan($totalaset) ?><br><?php echo LokalIndonesia::ribuan($totalaset1) ?></td>
  </tr>
  <tr>
      <td colspan="12" align="center">--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
    </tr>
  </table>

  <br>
  <br>
<table width="100%" id="atas" border="0">
<!-- <style type="text/css">
        table,td,th {
            border: 0px solid #C6C6C6;
        }
</style> -->
<thead>  
  <tr>
    <td align="center">Mengetahui, Pengguna Anggaran</td>
    <td align="center">YOGYAKARTA, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
 </tr>
</thead>
<tbody>
  <tr>
    <td align="center">K.a DPDPK KOTA YOGYAKARTA</td>
    <td align="center">BENDAHARA PENERIMAAN</td>
  </tr>
  <tr>
    <td style="color: white">.</td>
    <td style="color: white">.</td>
  </tr>
  <tr>
    <td style="color: white">.</td>
    <td style="color: white">.</td>
  </tr>
  <tr>
    <td style="color: white">.</td>
    <td style="color: white">.</td>
  </tr>
  <tr>
    <td align="center">Drs. Kadri Renggono ,M.SI</td>
    <td align="center">Warningsih</td>
  </tr>
  <tr>
    <td align="center">---------------------------------</td>
    <td align="center">---------------------------------</td>
  </tr>
  <tr>
    <td align="center">NIP. 196611271993031006</td>
    <td align="center">NIP. 196303091987032004</td>
  </tr>
</tbody>
</table>

  

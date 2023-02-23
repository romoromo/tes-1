<?php Yii::import('ext.LokalIndonesia'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Untitled Document</title>
  <style type="text/css">
    <!--
    .style2 {font-size: 12px}
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
  <table width="70%" border="0">
    <tr>
      <td width="25%"><span class="style3">SKPD</span></td>
      <td width="3%">:</td>
      <td width="70%"><span class="style3">BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH </span></td>
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
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="13%" colspan="4">PAJAK DAERAH (RP) </td>
      <td>&nbsp;</td>
      <td colspan="6">LAIN-LAIN PAD YANG SAH (RP) </td>
    </tr>
    <tr>
      <td colspan="12" align="center">--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
    </tr>
    <tr>
      <td align="center" width="5%" rowspan="2" class="style3">Tanggal</td>
      <td align="center" class="style3"><u>4.1.1.01</u> </td>
      <td align="center" class="style3"><u>4.1.1.02</u> </td>
      <td align="center" class="style3"><u>4.1.1.03</u> </td>
      <td align="center" class="style3"><u>4.1.1.04</u> </td>
      <td align="center" class="style3"><u>4.1.1.05</u> </td>
      <td align="center" class="style3"><u>4.1.1.07</u> </td>
      <td align="center" class="style3"><u>4.1.1.08</u> </td>
      <td align="center" class="style3"><u>4.1.1.09</u> </td>
      <td align="center" class="style3"><u>4.1.1.10</u> </td>
      <td align="center" class="style3"><u>4.1.1.11</u> </td>
      <td align="center" class="style3"><u>4.1.1.23</u> </td>
    </tr>
    <tr>
      
      <td align="center" class="style3">PJK HOTEL</td>
      <td align="center" class="style3">PJK RESTORAN </td>
      <td align="center" class="style3">PJK HIBURAN</td>
      <td align="center" class="style3">PJK REKLAME</td>
      <td align="center" class="style3">P.P.J</td>
      <td align="center" class="style3">PJK PARKIR</td>
      <td align="center" class="style3">AIR TANAH</td>
      <td align="center" class="style3">PJK BURUNG WALET</td>
      <td align="center" class="style3">PBB</td>
      <td align="center" class="style3">BPHTB</td>
      <td align="center" class="style3">SEWA ASET </td>
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
    <?php $totalhiburan = $totalhiburan+$list['PAJAKHIBURAN'] ?>
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
      <td align="center" class="style3"><?php echo $list['TBLSETOR_TGLSETOR'] ?>/<?php echo $list['TBLSETOR_BLNSETOR'] ?>/<?php echo $list['TBLSETOR_THNSETOR'] ?><br>BNG&DND</td>
      <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($list['PAJAKHOTEL']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDHOTEL'])  ?></td>
      <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($list['PAJAKRESTORAN']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDRESTORANL'])  ?></td>
      <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($list['PAJAKHIBURAN']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDHIBURAN'])  ?></td> <!-- Hiburan -->
      <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($list['PAJAKREKLAME']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDREKLAME'])  ?></td> <!-- Reklame -->
      <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($list['PAJAKPPJ']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDPPJ'])  ?></td> <!-- PPJ -->
      <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($list['PAJAKPARKIR']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDPARKIR'])  ?></td> <!-- Parkir -->
      <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($list['PAJAKABT']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDABT'])  ?></td> <!-- Air Tanah -->
      <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($list['PAJAKWALET']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDWALET'])  ?></td> <!-- Wallet -->
      <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($list['PAJAKPBB']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDPBB'])  ?></td> <!-- PBB -->
      <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($list['PAJAKBPHTB']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDBPHTB'])  ?></td> <!-- BPHTB -->
      <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($list['PAJAKSEWA']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDSEWA'])  ?></td> <!-- Aset -->
    </tr>
  <?php endforeach ?>
  <tr>
      <td colspan="12" align="center">--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
    </tr>
  <tr>
    <td align="center" class="style3">Total:</td>
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalhotel) ?><br><?php echo LokalIndonesia::ribuan($totalhotel1) ?></td> <!-- Hotel -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalrestoran) ?><br><?php echo LokalIndonesia::ribuan($totalrestoran1) ?></td> <!-- Restoran -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalhiburan) ?><br><?php echo LokalIndonesia::ribuan($totalhiburan1) ?></td> <!-- Hiburan -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalreklame) ?><br><?php echo LokalIndonesia::ribuan($totalreklame1) ?></td> <!-- Reklame -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalppj) ?><br><?php echo LokalIndonesia::ribuan($totalppj1) ?></td> <!-- PPJ -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalparkir) ?><br><?php echo LokalIndonesia::ribuan($totalparkir1) ?></td> <!-- Parkir -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalair) ?><br><?php echo LokalIndonesia::ribuan($totalair1) ?></td> <!-- Air Tanah -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalburung) ?><br><?php echo LokalIndonesia::ribuan($totalburung1) ?></td> <!-- Wallet -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalpbb) ?><br><?php echo LokalIndonesia::ribuan($totalpbb1) ?></td> <!-- PBB -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalbphtb) ?><br><?php echo LokalIndonesia::ribuan($totalbphtb1) ?></td> <!-- BPHTB -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalaset) ?><br><?php echo LokalIndonesia::ribuan($totalaset1) ?></td> <!-- ASET -->
  </tr>
  <tr>
      <td colspan="12" align="center">--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
    </tr>
  <tr>
    <td align="center" class="style3">Total:</td>
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalhotel+$totalhotel1) ?></td> <!-- Hotel -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalrestoran+$totalrestoran1) ?></td> <!-- Hotel -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalhiburan+$totalhiburan1) ?></td> <!-- Hotel -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalreklame+$totalreklame1) ?></td> <!-- Hotel -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalppj+$totalppj1) ?></td> <!-- Hotel -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalparkir+$totalparkir1) ?></td> <!-- Hotel -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalair+$totalair1) ?></td> <!-- Hotel -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalburung+$totalburung1) ?></td> <!-- Hotel -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalpbb+$totalpbb1) ?></td> <!-- Hotel -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalbphtb+$totalbphtb1) ?></td> <!-- Hotel -->
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan($totalaset+$totalaset1) ?></td> <!-- Hotel -->
  </tr>   
  </table>

  <br>
  <br>
<table width="100%" id="atas" border="0">
<style type="text/css">
    <!--
    .style2 {font-size: 12px}
    .style3 {font-size: 14px}
    .style4 {font-size: 16px}
  -->
</style>
<thead>  
  <tr>
    <td align="center" class="style3">Mengetahui, Pengguna Anggaran</td>
    <td align="center" class="style3">YOGYAKARTA, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
 </tr>
</thead>
<tbody>
  <tr>
    <td align="center" class="style3">K.a DPDPK KOTA YOGYAKARTA</td>
    <td align="center" class="style3">BENDAHARA PENERIMAAN</td>
  </tr>
  <tr>
    <td style="color: white" class="style3">.</td>
    <td style="color: white" class="style3">.</td>
  </tr>
  <tr>
    <td style="color: white" class="style3">.</td>
    <td style="color: white" class="style3">.</td>
  </tr>
  <tr>
    <td style="color: white" class="style3">.</td>
    <td style="color: white" class="style3">.</td>
  </tr>
  <tr>
    <td align="center" class="style3">Drs. Kadri Renggono ,M.SI</td>
    <td align="center" class="style3">Warningsih</td>
  </tr>
  <tr>
    <td align="center" class="style3">---------------------------------</td>
    <td align="center" class="style3">---------------------------------</td>
  </tr>
  <tr>
    <td align="center" class="style3">NIP. 196611271993031006</td>
    <td align="center" class="style3">NIP. 196303091987032004</td>
  </tr>
</tbody>
</table>

  

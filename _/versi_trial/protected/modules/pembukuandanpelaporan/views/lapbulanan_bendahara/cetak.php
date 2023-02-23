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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="32%">BADAN PENGELOLAAN KEUANGAN </td>
    <td width="44%"><div align="center">LAMPIRAN LAPORAN BULANAN </div></td>
    <td width="24%"> </td>
  </tr>
  <tr>
    <td>DAN ASET DAERAH </td>
    <td><div align="center">BENDAHARA PENERIMAAN </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center">------------------------------------------------</div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center">TAHUN : <?php echo $tahun = $_REQUEST['tahun']  ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center">BULAN : <?php echo LokalIndonesia::getBulan($bulan = $_REQUEST['bulan'])  ?></div></td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="5" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td width="15%">NO URUT REKENING </td>
    <td width="22%">NAMA REKENING </td>
    <td width="14%"><div align="right" >BULAN INI </td>
    <td width="14%"><div align="right" >S / D BULAN LALU </td>
    <td width="14%"><div align="right" >S / D BULAN INI </td>
  </tr>
  <tr>
    <td colspan="5" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
  <?php 
    $totalbulanini=0; 
    $totalsdbulanlalu=0; 
    $totalsdbulanini=0; 

    $perayatbulanini=0;
    $perayatsdbulanlalu=0;
    $perayatsdbulanini=0;

    ?>

    <?php $no=1; 
    $countrecord = count($data['cetak']);
    foreach ($data['cetak'] as $list): ?>
    <?php
    $totalbulanini= $totalbulanini+$list['BULAN_INI']; 
    $totalsdbulanlalu= $totalsdbulanlalu+$list['SD_BULANLALU']; 
    $totalsdbulanini= $totalsdbulanini+$list['SD_BULANINI'];
    
    $kodeayat = $list['TBLSETOR_REKPENDAPATAN'].'.'.$list['TBLSETOR_REKPAD'].'.'.$list['TBLSETOR_REKPAJAK'].'.'.$list['TBLSETOR_REKAYAT'];
    $koderekjenis = $list['TBLSETOR_REKPENDAPATAN'].'.'.$list['TBLSETOR_REKPAD'].'.'.$list['TBLSETOR_REKPAJAK'].'.'.$list['TBLSETOR_REKAYAT'].'.'.$list['TBLSETOR_REKJENIS'];

    if($no==1){
      $cekkodeayat = $kodeayat; 
      $perayatbulanini=$perayatbulanini+$list['BULAN_INI'];
      $perayatsdbulanlalu=$perayatsdbulanlalu+$list['SD_BULANLALU'];
      $perayatsdbulanini=$perayatsdbulanini+$list['SD_BULANINI'];
      ?>
      <tr>
        <td><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?>.<?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?></td>
        <td><?php echo $list['NMREK'] ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['BULAN_INI']) ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_BULANLALU']) ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_BULANINI']) ?></td>
      </tr>
    <?php
    } else {
      if($cekkodeayat!=$kodeayat){ ?>
        <tr>
        <td colspan="2" style="text-align: right;"><b>SUB TOTAL Rp :</b></td>
        <td><div align="right"><b><?php echo LokalIndonesia::ribuan($perayatbulanini) ?></b></td>
        <td><div align="right"><b><?php echo LokalIndonesia::ribuan($perayatsdbulanlalu) ?></b></td>
        <td><div align="right"><b><?php echo LokalIndonesia::ribuan($perayatsdbulanini) ?></b></td>
        </tr>
        <tr>
        <td><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?>.<?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?></td>
        <td><?php echo $list['NMREK'] ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['BULAN_INI']) ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_BULANLALU']) ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_BULANINI']) ?></td>
        </tr>

      <?php

      $perayatbulanini=$list['BULAN_INI'];
      $perayatsdbulanlalu=$list['SD_BULANLALU'];
      $perayatsdbulanini=$list['SD_BULANINI'];
      $cekkodeayat = $kodeayat;
      } else {          
        if($no!=$countrecord){
          $perayatbulanini=$perayatbulanini+$list['BULAN_INI'];
          $perayatsdbulanlalu=$perayatsdbulanlalu+$list['SD_BULANLALU'];
          $perayatsdbulanini=$perayatsdbulanini+$list['SD_BULANINI']; 
        ?>
        <tr>
        <td><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?>.<?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?></td>
        <td><?php echo $list['NMREK'] ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['BULAN_INI']) ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_BULANLALU']) ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_BULANINI']) ?></td>
        </tr>
      <?php } else {
          $perayatbulanini=$perayatbulanini+$list['BULAN_INI'];
          $perayatsdbulanlalu=$perayatsdbulanlalu+$list['SD_BULANLALU'];
          $perayatsdbulanini=$perayatsdbulanini+$list['SD_BULANINI'];
        ?>
        <tr>
        <td><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?>.<?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?></td>
        <td><?php echo $list['NMREK'] ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['BULAN_INI']) ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_BULANLALU']) ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_BULANINI']) ?></td>
        <tr>
        <td colspan="2" style="text-align: right;"><b>SUB TOTAL Rp :</b></td>
        <td><div align="right"><b><?php echo LokalIndonesia::ribuan($perayatbulanini) ?></b></td>
        <td><div align="right"><b><?php echo LokalIndonesia::ribuan($perayatsdbulanlalu) ?></b></td>
        <td><div align="right"><b><?php echo LokalIndonesia::ribuan($perayatsdbulanini) ?></b></td>
        </tr>
      <?php }}
    }
    $no++;
    ?>

    
  <?php endforeach ?>
    <tr>
      <td colspan="2"><div align="right" ><strong>GRAND TOTAL Rp :</strong></div></td>
      <td><div align="right"><b><?php echo LokalIndonesia::ribuan($totalbulanini) ?> </b></div></td>
      <td><div align="right"><b><?php echo LokalIndonesia::ribuan($totalsdbulanlalu) ?> </b></div></td>
      <td><div align="right"><b><?php echo LokalIndonesia::ribuan($totalsdbulanini) ?> </b></div></td>

    </tr>
</table>
<p>&nbsp;</p>
</body>
</html>

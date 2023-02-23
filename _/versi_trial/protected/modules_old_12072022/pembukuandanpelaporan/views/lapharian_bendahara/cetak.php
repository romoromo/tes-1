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
      <td width="44%"><div align="center">LAMPIRAN LAPORAN HARIAN </div></td>
      <td width="24%"></td>
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
      <td><div align="center">TANGGAL : <?php echo LokalIndonesia::TanggalUmum($tgl_setor = $_REQUEST['tgl_setor']) ?>  </div></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="5" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
    </tr>
    <tr>
      <td width="15%">URUT REKENING </td>
      <td width="22%">NAMA REKENING </td>
      <td width="14%"><div align="right" >HARI INI </td>
      <td width="14%"><div align="right" >S / D HARI LALU </td>
      <td width="14%"><div align="right" >S / D HARI INI </td>
    </tr>
    <tr>
      <td colspan="5" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
    </tr>
    <?php 
    $totalhariini=0; 
    $totalsdharilalu=0; 
    $totalsdhariini=0; 

    $perayathariini=0;
    $perayatsdharilalu=0;
    $perayatsdhariini=0;

    ?>

    <?php $no=1; 
    $countrecord = count($data['laporan']);
    foreach (array_slice($data['laporan'], 0, 3) as $list): ?>
    <?php
    $totalhariini= $totalhariini+$list['HARI_INI']; 
    $totalsdharilalu= $totalsdharilalu+$list['SD_HARILALU']; 
    $totalsdhariini= $totalsdhariini+$list['SD_HARIINI'];
    
    $kodeayat = $list['TBLSETOR_REKPENDAPATAN'].'.'.$list['TBLSETOR_REKPAD'].'.'.$list['TBLSETOR_REKPAJAK'].'.'.$list['TBLSETOR_REKAYAT'];
    $koderekjenis = $list['TBLSETOR_REKPENDAPATAN'].'.'.$list['TBLSETOR_REKPAD'].'.'.$list['TBLSETOR_REKPAJAK'].'.'.$list['TBLSETOR_REKAYAT'].'.'.$list['TBLSETOR_REKJENIS'];

    if($no==1){
      $cekkodeayat = $kodeayat; 
      $perayathariini=$perayathariini+$list['HARI_INI'];
      $perayatsdharilalu=$perayatsdharilalu+$list['SD_HARILALU'];
      $perayatsdhariini=$perayatsdhariini+$list['SD_HARIINI'];
      ?>
      <tr>
        <td><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?>.<?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?></td>
        <td><?php echo $list['NMREK'] ?></td>
        <td><div align="right">< (12000/3) ></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_HARILALU']) ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_HARIINI']) ?></td>
      </tr>
    <?php
    } else {
      if($cekkodeayat!=$kodeayat){ ?>
        <tr>
        <td colspan="2" style="text-align: right;"><b>SUB TOTAL Rp :</b></td>
        <td><div align="right"><b><?php echo LokalIndonesia::ribuan($perayathariini) ?></b></td>
        <td><div align="right"><b><?php echo LokalIndonesia::ribuan($perayatsdharilalu) ?></b></td>
        <td><div align="right"><b><?php echo LokalIndonesia::ribuan($perayatsdhariini) ?></b></td>
        </tr>
        <tr>
        <td><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?>.<?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?></td>
        <td><?php echo $list['NMREK'] ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['HARI_INI']) ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_HARILALU']) ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_HARIINI']) ?></td>
        </tr>

      <?php
      $perayathariini=$list['HARI_INI'];
      $perayatsdharilalu=$list['SD_HARILALU'];
      $perayatsdhariini=$list['SD_HARIINI'];
      $cekkodeayat = $kodeayat;
      } else {          
        if($no!=$countrecord){
          $perayathariini=$perayathariini+$list['HARI_INI'];
          $perayatsdharilalu=$perayatsdharilalu+$list['SD_HARILALU'];
          $perayatsdhariini=$perayatsdhariini+$list['SD_HARIINI']; 
        ?>
        <tr>
        <td><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?>.<?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?></td>
        <td><?php echo $list['NMREK'] ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['HARI_INI']) ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_HARILALU']) ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_HARIINI']) ?></td>
        </tr>
      <?php } else { ?>
        <tr>
        <td><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?>.<?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?></td>
        <td><?php echo $list['NMREK'] ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['HARI_INI']) ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_HARILALU']) ?></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_HARIINI']) ?></td>
        <tr>
        <td colspan="2" style="text-align: right;"><b>SUB TOTAL Rp :</b></td>
        <td><div align="right"><b><?php echo LokalIndonesia::ribuan($perayathariini) ?></b></td>
        <td><div align="right"><b><?php echo LokalIndonesia::ribuan($perayatsdharilalu) ?></b></td>
        <td><div align="right"><b><?php echo LokalIndonesia::ribuan($perayatsdhariini) ?></b></td>
        </tr>
      <?php }}
    }

    $no++;
    ?>

    
  <?php endforeach ?>
    <tr>
      <td colspan="2"><div align="right" ><strong>GRAND TOTAL Rp :</strong></div></td>
      <td><div align="right"><b><?php echo LokalIndonesia::ribuan($totalhariini) ?> </b></div></td>
      <td><div align="right"><b><?php echo LokalIndonesia::ribuan($totalsdharilalu) ?> </b></div></td>
      <td><div align="right"><b><?php echo LokalIndonesia::ribuan($totalsdhariini) ?> </b></div></td>

    </tr>  
</table>
<p>&nbsp;</p>
</body>
</html>

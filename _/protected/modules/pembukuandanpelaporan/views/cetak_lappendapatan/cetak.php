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
    <td width="36%">BADAN PENGELOLAAN KEUANGAN </td>
    <td width="31%" align="center">LAPORAN REALISASI PENERIMAAN BKP </td>
    <td width="20%">&nbsp;</td>
    <td width="13%"> </td>
  </tr>
  <tr>
    <td>DAN ASET DAERAH </td>
    <td align="center">--------------------------------------------------</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">TAHUN : <?php echo $tahun = $_REQUEST['tahun'] ?> BULAN : <?php echo LokalIndonesia::getBulan($bulan = $_REQUEST['bulan']) ?> TANGGAL : <?php echo $tanggal = $_REQUEST['tanggal'] ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="5%">NO . </td>
    <td width="11%">NO . REK </td>
    <td width="26%">JENIS PAJAK / RETRIBUSI </td>
    <td colspan="3"><div align="center">P E N E R I M A A N </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="23%"><div align="center">BULAN INI </div></td>
    <td width="21%"><div align="center">S / D BULAN LALU </div></td>
    <td width="14%"><div align="center">S / D BULAN INI</div></td>
  </tr>
  <?php $no=1; foreach ($data['cetak'] as $list) :?>
  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?>.<?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?></td>
    <td><?php echo $list['NMREK'] ?></td>
    <td align="right"><?php echo LokalIndonesia::ribuan($list['HARI_INI']) ?></td>
    <td align="right"><?php echo LokalIndonesia::ribuan($list['SD_HARILALU']) ?></td>
    <td align="right"><?php echo LokalIndonesia::ribuan($list['SD_HARIINI']) ?></td>
  </tr>
<?php endforeach ?>
</table>
<p>&nbsp;</p>
<table width="25%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">YOGYAKARTA , <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?> </td>
  </tr>
  <tr>
    <td align="center">B . K . P </td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="25%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">WARNINGSIH</div></td>
  </tr>
  <tr>
    <td><div align="center">------------------------------</div></td>
  </tr>
  <tr>
    <td><div align="center">NIP. 196303091987032004</div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="39%">MODEL : KPPD . II -63 </td>
    <td width="61%">REALISASI PAJAK S/D TANGGAL : <?php echo $tanggal = $_REQUEST['tanggal'] ?> - <?php echo LokalIndonesia::getBulan($bulan = $_REQUEST['bulan']) ?> - <?php echo $tahun = $_REQUEST['tahun'] ?> </td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>

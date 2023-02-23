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
<?php $namarekening = $data['header']['TBLREKENING_NAMAREKENING'] ?>
  <p align="center">PRESENTASEREALISASI PENERIMAAN <?php echo $namarekening ?> TAHUN <?php echo $tahun = $_REQUEST['tahun'] ?></p>
  <p align="center">BULAN <?php echo LokalIndonesia::getBulan($bulan = $_REQUEST['bulan'])?></p>
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td width="4%"><div align="center">NO</div></td>
      <td width="18%"><div align="center">URAIAN</div></td>
      <td width="17%"><div align="center">TARGET</div></td>
      <td width="17%"><div align="center">JUMLAH s . d BLN LALU </div></td>
      <td width="14%"><div align="center">JUMLAH BLN INI </div></td>
      <td width="16%"><div align="center">JUMLAH s . d BLN INI </div></td>
      <td width="14%"><div align="center">PRESENTASE</div></td>
    </tr>
    <?php $total =0; ?>
    <?php $total2 =0; ?>
    <?php $total3 =0; ?>
    <?php $prosen =0; ?>
    <?php $no=1; foreach ($data['cetak'] as $list) :?>
    <?php $total = $list['BULAN_INI']; ?>
    <?php $total2 = $list['SD_BULANLALU']; ?>
    <?php $total3 = $list['SD_BULANINI']; ?>
    <?php $prosen = ($total3 / $list['TARGETANGGARAN']) *100  ?>

    <tr>
      <td align="center"><?php echo $no++; ?></td>
      <td align="center"><?php echo $list['NMREK'] ?></td>
      <td align="right"><?php echo LokalIndonesia::ribuan($list['TARGETANGGARAN'])?></td>
      <td align="right"><?php echo LokalIndonesia::ribuan($total2) ?></td>
      <td align="right"><?php echo LokalIndonesia::ribuan($total) ?></td>
      <td align="right"><?php echo LokalIndonesia::ribuan($total3) ?></td>
      <td align="right"><?php echo number_format($prosen, 2) ?>%</td>
    </tr>
  <?php endforeach ?>
  
</table>
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
          <td align="center">MENGETAHUI,</td>
          <td align="center">YOGYAKARTA, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td align="center">KASIH PEMBUKUAN DAN PELAPORAN </td>
          <td align="center">PEMBUKA </td>
        </tr>
        <tr>
          <td style="color: white">ttd</td>
          <td style="color: white">ttd</td>
        </tr>
        <tr>
          <td style="color: white">ttd</td>
          <td style="color: white">ttd</td>
        </tr>
        <tr>
          <td style="color: white">ttd</td>
          <td style="color: white">ttd</td>
        </tr>
        <tr>
          <td align="center">SANTOSA, S.E. </td>
          <td align="center">A.HENRY ABRAHAM</td>
        </tr>
        <tr>
          <td align="center">NIP. 196312311989031133</td>
          <td align="center">NIP. 197707182005011003</td>
        </tr>
      </tbody>
    </table>
  </div>

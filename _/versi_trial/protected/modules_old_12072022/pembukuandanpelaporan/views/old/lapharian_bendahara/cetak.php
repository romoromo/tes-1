<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Untitled Document</title>
</head>

<body>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="32%">BADAN PENGELOLAAN KEUANGAN </td>
      <td width="44%"><div align="center">LAMPIRAN LAPORAN HARIAN </div></td>
      <td width="24%">HALAMAN : 1 </td>
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
      <td width="19%">URT REKENING </td>
      <td width="32%">NAMA WAJIB PAJAK </td>
      <td width="11%">HARI INI </td>
      <td width="14%">S / D HARI LALU </td>
      <td width="24%">S / D HARI INI </td>
    </tr>
    <tr>
      <td colspan="5" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
    </tr>
    <?php $no=1; foreach ($data['laporan'] as $list) :?>
    <tr>
      <td><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?>.<?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?></td>
      <td><?php echo $list['NMREK'] ?></td>
      <td><?php echo $list['HARI_INI'] ?></td>
      <td><?php echo $list['SD_HARILALU'] ?></td>
      <td><?php echo $list['SD_HARIINI'] ?></td>
    </tr>
  <?php endforeach ?>
</table>
<p>&nbsp;</p>
</body>
</html>

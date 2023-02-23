<?php Yii::import('ext.LokalIndonesia'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Untitled Document</title>
  <style type="text/css">
    <!--
    .style2 {font-size: 12px}
  -->
</style>
</head>

<body>
  <table width="100%" border="0">
    <tr>
      <td width="" align="center"><span>LAPORAN REALISASI PENERIMAAN PAJAK DAERAH YANG DIKELOLA OLEH</span></td>
    </tr>
    <tr>
      <td align="center"><span>BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH KOTA YOGYAKARTA</span></td>
    </tr>
    <tr>
      <td align="center"><span> BULAN <?php echo LokalIndonesia::getBulan($bulan = $_REQUEST['bulan'])?> <?php echo $tahun = $_REQUEST['tahun'] ?></span></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</body>
</html>

<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
  <thead>
    <tr >
      <th rowspan="2" data-hide="phone">KODE REKENING</th>
      <th rowspan="2" data-hide="phone">URAIAN</th>
      <th rowspan="2" data-class="expand">ANGGARAN</th>
      <th colspan="3" data-hide="phone">REALISASI PENERIMAAN</th>
      <th rowspan="2" data-hide="phone">PERSEN</th>
    </tr>
    <tr>
      <td align="center"><b>Bulan ini</b></td>
      <td align="center"><b>S.d Bulan Lalu</b></td>
      <td align="center"><b>S.d Bulan Ini</b></td>
    </tr>
  </thead>
  <tbody>
   <tbody>
   <?php $total = 0; ?>
   <?php $total1 = 0; ?>
   <?php $total2 = 0; ?>
   <?php $total3 = 0; ?>
   <?php $prosen = 0; ?>
   <?php $no=1; foreach ($data['daerah'] as $list) :?>
   <?php $total = $total+$list['BULANINI']; ?> 
   <?php $total1 = $total1+$list['SD_BULANLALU']; ?> 
   <?php $total2 = $total2+$list['SD_BULANINI']; ?>
   <?php $total3 = $total3+$list['TARGETANGGARAN']; ?>
   <?php $bagi = $total2 / $list['TARGETANGGARAN']; ?>
   <?php $prosen = $bagi * 100 ?>
    <tr>
      <td><?php echo $list['REKENING'] ?></td> <!-- KODE REKENING -->   
      <td><?php echo $list['NMREKENING']?></td>    <!-- URAIAN -->  
      <td align="right"><?php echo LokalIndonesia::ribuan($list['TARGETANGGARAN'])?></td>     <!-- ANGGARAN -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['BULANINI'])?></td>    <!-- Bulan Ini -->  
      <td align="right"><?php echo LokalIndonesia::ribuan($list['SD_BULANLALU'])?></td>      
      <td align="right"><?php echo LokalIndonesia::ribuan($list['SD_BULANINI'])?></td>      
      <td align="right"><?php echo number_format($prosen,2)  ?> % </td>      
    </tr>
  <?php endforeach ?>
  <tr>
    <td colspan="2" align="center"><b>JUMLAH :</b></td>  
    <td align="right"><strong><?php echo LokalIndonesia::ribuan($total3) ?></strong></td>                                                   
    <td align="right"><strong><?php echo LokalIndonesia::ribuan($total) ?></strong></td>                                                     
    <td align="right"><strong><?php echo LokalIndonesia::ribuan($total1) ?></strong></td>                                                     
    <td align="right"><strong><?php echo LokalIndonesia::ribuan($total2) ?></strong></td>      
    <td></td>                                                    
  </tr>
</tbody>
</table><br><br><br><br>

<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
 <tr>
 	<td width="70%"></td>
 	<td>
 		Yogyakarta, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?>
 	</td>
 </tr>
 <tr>
 	<td width="70%"></td>
 	<td>
 		Kepala Badan Pengelolaan Keuangan dan Aset Daerah 
 	</td>
 </tr>
 <tr>
 	<td width="70%"></td>
 	<td>
 		Kota Yogyakarta 
 	</td>
 </tr>
</table><br><br><br>

<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
 <tr>
 	<td width="70%"></td>
 	<td>
 		<u>Drs. Kadri Renggono, Msi</u>
 	</td>
 </tr>
 <tr>
 	<td width="70%"></td>
 	<td>
 		NIP. 19661127 199303 1 006
 	</td>
 </tr>
</table>
<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" border="0">
 <style type="text/css">
  <!--
  .style2 {font-size: 12px}
  .style3 {font-size: 14px}
  .style4 {font-size: 16px}
-->
</style>
<tr>
  <td width="" align="center" class="style3"><span>LAPORAN REALISASI PENERIMAAN PAJAK DETAIL YANG DIKELOLA OLEH</span></td>
</tr>
<tr>
  <td align="center" class="style3"><span>BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH KOTA YOGYAKARTA</span></td>
</tr>
<tr>
  <td align="center" class="style3"><span> BULAN <?php echo LokalIndonesia::getBulan($bulan = $_REQUEST['bulan'])?> <?php echo $tahun = $_REQUEST['tahun'] ?></span></td>
</tr>
</table>
<br>

<table width="100%"  border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
  <thead>
   <tr>
    <th rowspan="2" data-hide="phone" class="style3">NO</th>
    <th rowspan="2" data-hide="phone" class="style3">KODE REKENING</th>
    <th rowspan="2" data-hide="phone" class="style3">URAIAN</th>
    <th rowspan="2" data-class="expand" class="style3">ANGGARAN</th>
    <th colspan="3" data-hide="phone" class="style3">REALISASI PENERIMAAN</th>
    <th rowspan="2" data-hide="phone" class="style3">PERSEN</th>
  </tr>
  <tr>
    <td align="center" class="style3"><b>Bulan ini</b></td>
    <td align="center" class="style3"><b>S.d Bulan Lalu</b></td>
    <td align="center" class="style3"><b>S.d Bulan Ini</b></td>
  </tr>
</thead>
<tbody>
  <?php $bulanini = 0; ?>
  <?php $sdbulanlalu = 0; ?>
  <?php $sdbulanini = 0; ?>
  <?php $target = 0; ?>
  <?php $prosen = 0; ?>
  <?php $totalprosen = 0; ?>
  <?php $no=1; foreach ($data['cetak'] as $list) :?>
  <?php $bulanini = $bulanini+$list['BULANINI']; ?> 
  <?php $sdbulanlalu = $sdbulanlalu+$list['SD_BULANLALU']; ?> 
  <?php $sdbulanini = $sdbulanini+$list['SD_BULANINI']; ?>
  <?php $target = $target+$list['TARGETANGGARAN']; ?> 
  <?php $persen = $list['SD_BULANINI'] ?>
  <?php $bagi = $persen / $list['TARGETANGGARAN']; ?>
  <?php $prosen = $bagi * 100 ?>  
  <?php $totalprosen = ($sdbulanini / $target) * 100 ?>
  <tr>
    <td class="style3"><?php echo $no++; ?></td>
    <td class="style3"><?php echo $list['REKENING'] ?></td>      
    <td class="style3"><?php echo $list['NMREKENING'] ?></td>      
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan ($list['TARGETANGGARAN']) ?></td>      
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan ($list['BULANINI']) ?></td>      
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan ($list['SD_BULANLALU']) ?></td>      
    <td align="right" class="style3"><?php echo LokalIndonesia::ribuan ($list['SD_BULANINI']) ?></td>      
    <td align="right" class="style3"><?php echo number_format($prosen,2) ?> % </td>
    <!-- <td></td> -->
  <?php endforeach ?>      
</tr>
<tr>
  <td colspan="3" align="center" class="style3"><b>JUMLAH PAJAK DAERAH</b></td>
  <td align="right" class="style3"><strong><?php echo LokalIndonesia::ribuan($target) ?></strong></td>                                                
  <td align="right" class="style3"><strong><?php echo LokalIndonesia::ribuan($bulanini) ?></strong></td>                                                     
  <td align="right" class="style3"><strong><?php echo LokalIndonesia::ribuan($sdbulanlalu) ?></strong></td>                                                     
  <td align="right" class="style3"><strong><?php echo LokalIndonesia::ribuan($sdbulanini) ?></strong></td>                                                     
  <td align="right" class="style3"><strong><?php echo number_format($totalprosen,2) ?> % </strong></td>                                                     

</tr>
</tbody>
</table>
<br>
<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
 <tr>
  <td width="70%"></td>
  <td class="style3">
    Yogyakarta, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?>
  </td>
</tr>
<tr>
  <td width="70%"></td>
  <td class="style3">
    Kepala Badan Pengelolaan Keuangan dan Aset Daerah 
  </td>
</tr>
<tr>
  <td width="70%"></td>
  <td class="style3">
    Kota Yogyakarta 
  </td>
</tr>
</table><br><br><br>

<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
 <tr>
  <td width="70%"></td>
  <td class="style3">
    <u>Drs. Kadri Renggono, Msi</u>
  </td>
</tr>
<tr>
  <td width="70%"></td>
  <td class="style3">
    NIP. 19661127 199303 1 006
  </td>
</tr>
</table>

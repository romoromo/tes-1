<?php Yii::import('ext.LokalIndonesia'); ?>
 <table width="100%" border="0">
    <tr>
      <td width="" align="center"><span>LAPORAN REALISASI PENERIMAAN PAJAK DETAIL YANG DIKELOLA OLEH</span></td>
    </tr>
    <tr>
      <td align="center"><span>BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH KOTA YOGYAKARTA</span></td>
    </tr>
    <tr>
      <td align="center"><span> BULAN <?php echo LokalIndonesia::getBulan($bulan = $_REQUEST['bulan'])?> <?php echo $tahun = $_REQUEST['tahun'] ?></span></td>
    </tr>
  </table>
<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
  <thead>
   <tr>
    <th rowspan="2" data-hide="phone">NO</th>
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
  <?php $total = 0; ?>
  <?php $total1 = 0; ?>
  <?php $total2 = 0; ?>
  <?php $total3 = 0; ?>
  <?php $no=1; foreach ($data['cetak'] as $list) :?>
  <?php $total = $total+$list['BULANINI']; ?> 
  <?php $total1 = $total1+$list['SD_BULANLALU']; ?> 
  <?php $total2 = $total2+$list['SD_BULANINI']; ?>
  <?php $total3 = $total3+$list['TARGETANGGARAN']; ?> 
  <?php $bagi = $total2 / $list['TARGETANGGARAN']; ?>
  <?php $prosen = $bagi * 100 ?>  
  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $list['REKENING'] ?></td>      
    <td><?php echo $list['NMREKENING'] ?></td>      
    <td align="right"><?php echo LokalIndonesia::ribuan ($list['TARGETANGGARAN']) ?></td>      
    <td align="right"><?php echo LokalIndonesia::ribuan ($list['BULANINI']) ?></td>      
    <td align="right"><?php echo LokalIndonesia::ribuan ($list['SD_BULANLALU']) ?></td>      
    <td align="right"><?php echo LokalIndonesia::ribuan ($list['SD_BULANINI']) ?></td>      
    <td align="right"><?php echo number_format($prosen,2) ?> % </td>
    <!-- <td></td> -->
  <?php endforeach ?>      
</tr>
<tr>
  <td colspan="3" align="center"><b>JUMLAH :</b></td>
  <td></td>                                                     
  <td><strong><?php echo LokalIndonesia::ribuan($total) ?></strong></td>                                                     
  <td><strong><?php echo LokalIndonesia::ribuan($total1) ?></strong></td>                                                     
  <td><strong><?php echo LokalIndonesia::ribuan($total2) ?></strong></td>                                                     
  <td></td>                                                     
</tr>
</tbody>
</table>
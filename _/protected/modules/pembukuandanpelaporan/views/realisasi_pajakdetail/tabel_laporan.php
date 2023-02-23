<?php Yii::import('ext.LokalIndonesia'); ?>
  <table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
  <thead>
  <?php $no=1;?>
    <tr bgcolor="#CCCCCC" align="center">
      <th rowspan="2" data-hide="phone">NO</th>
      <th rowspan="2" data-hide="phone">KODE REKENING</th>
      <th rowspan="2" data-hide="phone">URAIAN</th>
      <th rowspan="2" data-class="expand">ANGGARAN</th>
      <th colspan="3" data-hide="phone">REALISASI PENERIMAAN</th>
      <th rowspan="2" data-hide="phone">PROSEN</th>
    </tr>
    <tr>
      <td><b>Bulan ini</b></td>
      <td><b>S.d Bulan Lalu</b></td>
      <td><b>S.d Bulan Ini</b></td>
    </tr>
  </thead>
  <tbody>
   <?php $total = 0; ?>
  <?php $total1 = 0; ?>
  <?php $total2 = 0; ?>
  <?php $total3 = 0; ?>
  <?php $no=1; foreach ($data['cari'] as $list) :?>
  <?php $total = $list['BULANINI']; ?> 
  <?php $total1 = $list['SD_BULANLALU']; ?> 
  <?php $total2 = $list['SD_BULANINI']; ?>
  <?php $total3 = $list['TARGETANGGARAN']; ?> 
  <?php $bagi = $total2 / $list['TARGETANGGARAN']; ?>
  <?php $prosen = $bagi * 100 ?> 
  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $list['REKENING'] ?></td>      
    <td><?php echo $list['NMREKENING'] ?></td>      
    <td><?php echo LokalIndonesia::ribuan ($list['TARGETANGGARAN'])?></td>      
    <td><?php echo LokalIndonesia::ribuan ($list['BULANINI']) ?></td>      
    <td><?php echo LokalIndonesia::ribuan ($list['SD_BULANLALU']) ?></td>      
    <td><?php echo LokalIndonesia::ribuan ($list['SD_BULANINI']) ?></td>      
    <td><?php echo number_format($prosen,2) ?> % </td>
  <?php endforeach ?>      
</tr>
<tr>
  <td colspan="3" align="center"><b>JUMLAH :</b></td>
  <td></td>                                                     
  <td><?php echo LokalIndonesia::ribuan($total) ?></td>                                                     
  <td><?php echo LokalIndonesia::ribuan($total1) ?></td>                                                     
  <td><?php echo LokalIndonesia::ribuan($total2) ?></td>                                                     
  <td></td>                                                     
</tr>
</tbody>
</table>

<script type="text/javascript">
  jQuery(document).ready(function() {
    reloadDT('dt_basic');
  });
</script>
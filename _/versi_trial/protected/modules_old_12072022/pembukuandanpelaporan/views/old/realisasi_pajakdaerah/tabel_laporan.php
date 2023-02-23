<?php Yii::import('ext.LokalIndonesia'); ?>
<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
  <div>
  </div><br><hr>
  <thead>
    <?php $no=1;?>
    <tr >
      <th rowspan="2" data-hide="phone">NO</th>
      <th rowspan="2" data-hide="phone">KODE REKENING</th>
      <th rowspan="2" data-hide="phone" width="15%">URAIAN</th>
      <th rowspan="2" data-class="expand">ANGGARAN</th>
      <th colspan="3" data-hide="phone" align="center">REALISASI PENERIMAAN</th>
      <th rowspan="2" data-hide="phone">PROSEN</th>
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
    <?php $no=1; foreach ($data['cari'] as $list) :?>
    <?php $total = $total+$list['BULANINI']; ?> 
    <?php $total1 = $total1+$list['SD_BULANLALU']; ?> 
    <?php $total2 = $total2+$list['SD_BULANINI']; ?>
   <?php $total3 = $total3+$list['TARGETANGGARAN']; ?>
   <?php $bagi = $total2 / $list['TARGETANGGARAN'];?>
   <?php $prosen = $bagi * 100 ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $list['REKENING'] ?></td> <!-- KODE REKENING -->   
      <td><?php echo $list['NMREKENING']?></td>    <!-- URAIAN -->  
      <td><?php echo LokalIndonesia::ribuan($list['TARGETANGGARAN'])?></td>     <!-- ANGGARAN -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['BULANINI'])?></td>    <!-- Bulan Ini -->  
      <td align="right"><?php echo LokalIndonesia::ribuan($list['SD_BULANLALU'])?></td>      
      <td align="right"><?php echo LokalIndonesia::ribuan($list['SD_BULANINI'])?></td>      
      <td align="right"><?php echo number_format($prosen,2)  ?> % </td>     
      <!-- <td><?php //echo $list[''] ?></td> -->      
    </tr>
  <?php endforeach ?>
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
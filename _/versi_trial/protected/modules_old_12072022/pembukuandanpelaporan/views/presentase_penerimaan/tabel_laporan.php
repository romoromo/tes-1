<?php Yii::import('ext.LokalIndonesia'); ?>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
      <td width="4%"><div align="center">NO</div></td>
      <td width="18%"><div align="center">URAIAN erewrwe5w4</div></td>
      <td width="17%"><div align="center">TARGET</div></td>
      <td width="17%"><div align="center">JUMLAH s . d BLN LALU </div></td>
      <td width="14%"><div align="center">JUMLAH BLN INI </div></td>
      <td width="16%"><div align="center">JUMLAH s . d BLN INI </div></td>
      <td width="14%"><div align="center">PRESENTASE</div></td>
    </tr>
  </thead>
  <tbody>
    <?php $total =0; ?>
    <?php $total2 =0; ?>
    <?php $total3 =0; ?>
    <?php $prosen =0; ?>
    <?php $no=1; foreach ($data['cari'] as $list) :?>
    <?php $total = $total+$list['BULAN_INI']; ?>
    <?php $total2 = $total2+$list['SD_BULANLALU']; ?>
    <?php $total3 = $total3+$list['SD_BULANINI']; ?>
    <?php $bagi = $total3 / $list['TARGETANGGARAN']; ?>
    <?php $prosen = $bagi *100 ?>
    <tr>
      <td align="center"><?php echo $no++; ?></td>
      <td align="center"><?php echo $list['NMREK'] ?> </td>
      <td align="right"><?php echo LokalIndonesia::ribuan($list['TARGETANGGARAN']) ?></td>
      <td align="right"><?php echo LokalIndonesia::ribuan($total2) ?></td>
      <td align="right"><?php echo LokalIndonesia::ribuan($total) ?></td>
      <td align="right"><?php echo LokalIndonesia::ribuan($total3) ?></td>
      <td align="right"><?php echo number_format($prosen, 2) ?>%</td>
    </tr>
  <?php endforeach ?> 
</tbody>
</table>


<script type="text/javascript">
  jQuery(document).ready(function() {
    reloadDT('dt_basic');
  });
</script>
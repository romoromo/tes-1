<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
  <thead>
 <tr>
      <td width="19%">URT REKENING </td>
      <td width="32%">NAMA WAJIB PAJAK </td>
      <td width="11%">HARI INI </td>
      <td width="14%">S / D HARI LALU </td>
      <td width="24%">S / D HARI INI </td>
    </tr>
  </thead>
  <tbody>
   <?php $no=1; foreach ($data['cari'] as $list) :?>
    <tr>
      <td><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?>.<?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?></td>
      <td><?php echo $list['NMREK'] ?></td>
      <td><?php echo $list['BULAN_INI'] ?></td>
      <td><?php echo $list['SD_BULANLALU'] ?></td>
      <td><?php echo $list['SD_BULANINI'] ?></td>
    </tr>
  <?php endforeach ?>
</tbody>
</table>

<script type="text/javascript">
  jQuery(document).ready(function() {
    reloadDT('dt_basic');
  });
</script>
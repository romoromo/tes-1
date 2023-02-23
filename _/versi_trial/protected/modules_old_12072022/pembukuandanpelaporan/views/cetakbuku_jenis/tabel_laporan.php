<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
  <thead>
    <tr align="center">
          <th data-hide="phone"><div align="center">Urut</div></th>
          <th data-hide="phone" width="10%"><div align="center">Tanggal Setor</div></th>
          <th data-hide="phone" width="10%"><div align="center">No. Bukti</div></th>
          <th data-hide="phone" width="5%"><div align="center">Tahun</div></th>
          <th data-hide="phone" width="15%"><div align="center">Bulan</div></th>
          <th data-hide="phone"><div align="center">Ke</div></th>
          <th data-hide="phone"><div align="center">Penerimaan</div></th>
      </tr>
  </thead>
  <tbody>
   <?php $totalhariini = 0; ?>
   <?php $totalsdharilalu = 0; ?>
   <?php $totalsdhariini = 0; ?>
   <?php $no=1; foreach ($data['cari'] as $list) :?>
   <tr>
     <td><div align="center"><?php echo $no++; ?></div></td> <!-- Urut --> 
     <td><div align="left"><?php echo $list['TBLSETOR_TGLSETOR']?>/<?php echo $list['TBLSETOR_BLNSETOR']?>/<?php echo $list['TBLSETOR_THNSETOR']?></div></td> <!-- Tanggal Setor -->
     <td><div align="left"><?php echo $list['TBLSETOR_NOMORSSPD'] ?></div></td> <!-- No. Bukti -->
     <td><div align="center"><?php echo $list['TBLPENDATAAN_THNPAJAK'] ?></div></td> <!-- Tahun -->
     <td><div align="center"><?php echo LokalIndonesia::getBulan($list['TBLPENDATAAN_BLNPAJAK'])?></div></td> <!-- Bulan -->
     <td><div align="center"><?php //echo $list[''] ?></div></td> <!-- Ke -->
     <td><div align="right"><?php echo LokalIndonesia::ribuan($list['TBLSETOR_RUPIAHSETOR'])?></div></td> <!-- Penerimaan -->       
 </tr>
<?php endforeach ?>
</tbody>
</table>
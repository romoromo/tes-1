<?php Yii::import('ext.LokalIndonesia'); ?>


<body>
  <table width="100%" border="0">
    <tr>
      <td width="" align="center"><span>LAPORAN REALISASI PENERIMAAN PAJAK DAERAH YANG DIKELOLA OLEH</span></td>
    </tr>
    <tr>
      <td align="center"><span>BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH KOTA YOGYAKARTA</span></td>
    </tr>
    <tr>
      <td align="center"><span>SAMPAI DENGAN BULAN <?php echo LokalIndonesia::getBulan($bulan = $_REQUEST['bulan'])?> TAHUN <?php echo $tahun = $_REQUEST['tahun'] ?></span></td>
    </tr>
  </table>
  <p>&nbsp;</p>
<!-- </body> -->
<br>

<table width="100%" border="1"  cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
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
   <?php $sdbulanlalu = 0; ?>
   <?php $sdbulanini = 0; ?>
   <?php $target = 0; ?>
   <?php $prosen = 0; ?>
   <?php $no=1; foreach ($data['daerah'] as $list) :?>
   <?php $total = $total+ $list['BULANINI']; ?> 
   <?php $sdbulanlalu = $sdbulanlalu+ $list['SD_BULANLALU']; ?> 
   <?php $sdbulanini = $sdbulanini+ $list['SD_BULANINI']; ?>
   <?php $target = $target + $list['TARGETANGGARAN']; ?>
   <?php $persen = $list['SD_BULANINI'] ?>
   <?php $bagi = $list['TARGETANGGARAN']>0 ? $persen / $list['TARGETANGGARAN'] : 0; ?>
   <?php $prosen = $bagi * 100 ?>
   <?php $totalprosen = $target>0 ?( ($sdbulanini / $target) * 100) : 0 ?>
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
    <td colspan="2" align="center"><b>JUMLAH PAJAK DAERAH</b></td>  
    <td align="right"><strong><?php echo LokalIndonesia::ribuan($target) ?></strong></td>                                                   
    <td align="right"><strong><?php echo LokalIndonesia::ribuan($total) ?></strong></td>                                                     
    <td align="right"><strong><?php echo LokalIndonesia::ribuan($sdbulanlalu) ?></strong></td>                                                     
    <td align="right"><strong><?php echo LokalIndonesia::ribuan($sdbulanini) ?></strong></td>      
    <td align="right"><strong><?php echo number_format($totalprosen,2)  ?> %</strong></td>      
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
 		<?php echo  $data['jab1']['TBLPEJABAT_URAIAN']  ?> 
 	</td>
 </tr>
 <tr>
 	<td width="70%"></td>
 	<td>
 		 
 	</td>
 </tr>
</table><br><br><br>

<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
 <tr>
 	<td width="70%"></td>
 	<td>
 		<u><?php echo  $data['jab1']['TBLPEJABAT_NAMA']  ?></u>
 	</td>
 </tr>
 <tr>
 	<td width="70%"></td>
 	<td>
 		NIP. <?php echo  $data['jab1']['TBLPEJABAT_NIP']  ?>
 	</td>
 </tr>
</table>
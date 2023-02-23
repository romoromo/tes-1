<!-- Lap BKP Harian -->
<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
  <thead>  
    <tr>
      <td align="left">Dinas Pajak Daerah Dan</td>
      <td align="center">Laporan Setoran Ke Bank</td>
      <td align="left" width="30%"></td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td align="left">Pengelolaan Keuangan</td>
      <td align="center">Bendahara Penerimaan</td>
      <td align="left" width="30%"></td>
    </tr>
    <tr>
     <td align="right"></td>    
     <td align="center">----------------------------</td>    
     <td align="right" width="30%"></td>    
   </tr>
   <tr>
     <td align="right"></td>            
     <td align="center">Tanggal :<?php echo $tgl_setor = $_REQUEST['tgl_setor']; ?> Loket:</td>            
     <td align="right" width="30%"></td>            
   </tr>
 </tbody>
</table>

<!-- <table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic1">
    <thead>  
      <tr>
       
    </tr>
</thead>
<tbody>
 <tr>
</tr>
</tbody>
</table> -->
<br>
<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
 <style type="text/css" >
 </style>
 <thead>  
  <tr>
    <td align="center">URT</td>
    <td align="center">REKENING</td>
    <td align="center">NAMA WAJIB PAJAK</td>
    <td align="center">HARI INI</td>
    <td align="center">S/D HARI LALU</td>
    <td align="center">S/D HARI INI</td>
  </tr>
</thead>
<tbody>
  <?php
  function hitung_ayat($data, $kodeayat, $col)
  {
    $total = 0;
    foreach ($data as $r) {
      $ayat = $r['TBLSETOR_REKPENDAPATAN'] .'.'. $r['TBLSETOR_REKPAD'] .'.'. $r['TBLSETOR_REKPAJAK'] .'.'. $r['TBLSETOR_REKAYAT'];
      if ($ayat == $kodeayat) :
        $total += $r[$col];
      endif;
    }
    return $total;
  }
  ?>
  <?php $total1 = 0; ?>
  <?php $total2 = 0; ?>
  <?php $total3 = 0; ?>

  <?php $no=1; $rekkode_before = ''; foreach ($data['bkp'] as $list) :?>
  <?php $total1 = $total1+$list['HARI_INI']; ?>                  
  <?php $total2 = $total2+$list['SD_HARILALU']; ?>                  
  <?php $total3 = $total3+$list['SD_HARIINI']; ?>

  <?php $rekkode_now = $list['TBLSETOR_REKPENDAPATAN'] .'.'. $list['TBLSETOR_REKPAD'] .'.'. $list['TBLSETOR_REKPAJAK'] .'.'. $list['TBLSETOR_REKAYAT'] ?>

  <?php if ($rekkode_before!=$rekkode_now): ?>
    <?php if ($no!=1): ?>
      <tr>
        <td><div align="center"></div></td> 
        <td><div align="right"></div> </td> 
        <td><div align="right">Total Ayat <!-- (<?= $rekkode_before ?> | <?= $rekkode_now ?>) -->:</div> </td> <!-- Total per ayat -->
        <?php $no=1; $rekkode_hitung = ''; ?>
        <?php $rekkode_belum = $list['TBLSETOR_REKPENDAPATAN'] .'.'. $list['TBLSETOR_REKPAD'] .'.'. $list['TBLSETOR_REKPAJAK'] .'.'. $list['TBLSETOR_REKAYAT'] ?>
        <?php if ($rekkode_hitung!=$rekkode_belum): ?>
          <?php $totalh1 = hitung_ayat($data['bkp'], $rekkode_before, 'HARI_INI') ?>
          <?php $totalh2 = hitung_ayat($data['bkp'], $rekkode_before, 'SD_HARILALU') ?>
          <?php $totalh3 = hitung_ayat($data['bkp'], $rekkode_before, 'SD_HARIINI') ?>
          <td align="right"><?php echo LokalIndonesia::ribuan($totalh1);?></td> <!-- HARI INI  -->
          <td align="right"><?php echo LokalIndonesia::ribuan($totalh2);?></td> <!-- S/D HARI LALU -->
          <td align="right"><?php echo LokalIndonesia::ribuan($totalh3);?></td> <!-- S/D HARI INI -->
        <?php $rekkode_hitung=$rekkode_belum; endif; ?> 
    </tr>
  <?php endif ?>
<?php endif ?>

<tr>
  <td><div align="center"><?php echo $no; ?></div></td> <!-- URT -->
  <td><div align="left"><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?>.<?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?></div> </td> <!--  REKENING -->
    <td><div align="left"><?php echo $list['NMREK'] ?></div> </td> <!-- NAMA WAJIB PAJAK -->
    <td><div align="right"><?php echo LokalIndonesia::ribuan($list['HARI_INI'])?></div> </td> <!-- HARI INI  -->
    <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_HARILALU']) ?></div> </td> <!-- S/D HARI LALU -->
    <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_HARIINI']) ?></div> </td> <!-- S/D HARI INI -->

  </tr>

  <?php $rekkode_before=$rekkode_now;  ?>
  <?php $no++; endforeach ?>
  <tr>
    <td><div align="center"><?php //echo $no++; ?></div></td> <!-- URT -->
    <td><div align="right"></div> </td> <!--  REKENING -->
    <td><div align="right">Total Ayat :</div> </td> <!-- NAMA WAJIB PAJAK -->
    <?php $totalh1 = hitung_ayat($data['bkp'], $rekkode_before, 'HARI_INI') ?>
    <?php $totalh2 = hitung_ayat($data['bkp'], $rekkode_before, 'SD_HARILALU') ?>
    <?php $totalh3 = hitung_ayat($data['bkp'], $rekkode_before, 'SD_HARIINI') ?>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalh1);?></div> </td> <!-- HARI INI  -->
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalh2);?></div> </td> <!-- S/D HARI LALU -->
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalh3);?></div> </td> <!-- S/D HARI INI -->

  </tr>
  <tr>
    <td><div align="right"> </div></td>
    <td><div align="right"> </div></td>
    <td><div align="center"><strong>Jumlah :</strong> </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($total1); ?> </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($total2); ?> </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($total3); ?> </div></td>
  </tr>
</tbody>
</table>

<br>
<div id="ttd">
  <table width="100%" id="atas" border="0">
<!-- <style type="text/css">
        table,td,th {
            border: 0px solid #C6C6C6;
        }
      </style> -->
      <thead>  
        <tr>
          <td align="left" width="50%"></td>
          <td align="center">YOGYAKARTA, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td align="left" width="50%"></td>
          <td align="center">BENDAHARA PENERIMAAN</td>
        </tr>
        <tr>
          <td align="left" width="50%"></td>
          <td style="color: white">.</td>
        </tr>
        <tr>
          <td align="left" width="50%"></td>
          <td style="color: white">.</td>
        </tr>
        <tr>
          <td align="left" width="50%"></td>
          <td style="color: white">.</td>
        </tr>
        <tr>
          <td align="left" width="50%"></td>
          <td align="center">Warningsih</td>
        </tr>
        <tr>
          <td align="left" width="50%"></td>
          <td align="center">---------------------------------</td>
        </tr>
        <tr>
          <td align="center" width="50%"> MODEL : KKPD</td>
          <td align="center">NIP. 196303091987032004</td>
        </tr>
      </tbody>
    </table>
  </div>
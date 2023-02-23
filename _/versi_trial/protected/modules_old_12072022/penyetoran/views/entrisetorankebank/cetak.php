<!-- Entri Setoran Ke Bank S/D Hari Ini -->
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
<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
   <style type="text/css" >
   </style>
   <thead>  
      <tr>
        <td align="center">NO</td>
        <td align="center">URT REKENING</td>
        <td align="center">NAMA WAJIB PAJAK</td>
        <td align="center">HARI INI</td>
        <td align="center">S/D HARI LALU</td>
        <td align="center">S/D HARI INI</td>
    </tr>
</thead>
<tbody>
<?php $total1 = 0; ?>
<?php $total2 = 0; ?>
<?php $total3 = 0; ?>
  <?php $no=1; foreach ($data['bank'] as $list) :?>
<?php $total1 = $total1+$list['HARI_INI'] ?>                  
<?php $total2 = $total2+$list['SD_HARILALU'] ?>                  
<?php $total3 = $total3+$list['SD_HARIINI'] ?>                  
   <tr>
    <td><div align="center"><?php echo $no++; ?></div></td> <!-- NO -->
    <td><div align="center"><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?>.<?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?></div> </td> <!-- URT REKENING -->
    <td><div align="left"><?php echo $list['NMREK'] ?></div><br><div align="right">Total Ayat : </div> </td> <!-- NAMA WAJIB PAJAK -->
    <td><div align="right"><?php echo LokalIndonesia::ribuan($list['HARI_INI']) ?></div><br><div align="right"><?php echo LokalIndonesia::ribuan($list['HARI_INI']) ?></div> </td> <!-- HARI INI  -->
    <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_HARILALU']) ?></div><br><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_HARILALU']) ?></div>  </td> <!-- S/D HARI LALU -->
    <td><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_HARIINI']) ?></div><br><div align="right"><?php echo LokalIndonesia::ribuan($list['SD_HARIINI']) ?></div>  </td> <!-- S/D HARI INI -->
</tr>
<?php endforeach ?>
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
    <td style="color: white">ttd</td>
  </tr>
  <tr>
    <td align="left" width="50%"></td>
    <td style="color: white">ttd</td>
  </tr>
  <tr>
    <td align="left" width="50%"></td>
    <td style="color: white">ttd</td>
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
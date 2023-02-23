<!-- Lap Realisasi BKP -->
<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
<thead>  
  <tr>
    <td align="left">Dinas Pajak Daerah Dan</td>
    <td align="center">Laporan Realisasi Penerimaan BKP</td>
  </tr>
</thead>
<tbody>
  <tr>
    <td align="left">Pengelolaan Keuangan</td>
    <td align="center">Tahun Setor : <?php echo $tahun = $_REQUEST['tahun']; ?>    Bulan : <?php echo $bulan = LokalIndonesia::getBulan($_REQUEST['bulan']);?> Tanggal : <?php echo $tanggal = $_REQUEST['tanggal']; ?></td>
  </tr>
</tbody>
</table>

<br>
<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
 <style type="text/css" >
</style>
<thead>  
  <tr>
    <td align="center">URT</td>
    <td align="center">No. Rek</td>
    <td align="center" width="10">Jenis Pajak / Retribusi</td>
    <td align="center" colspan="4-6">Penerimaan</td>
    <tr>
    <td align="center"></td>
    <td align="center"></td>
    <td align="center"></td>
    <td align="center">Bulan Ini</td>
    <td align="center">S/D Bulan Lalu</td>
    <td align="center">S/D Bulan Ini<td>
  
    </tr>
</tr>
</thead>
<tbody>
<?php //$totalhariini = 0; ?>
<?php //$totalsdharilalu = 0; ?>
<?php //$totalsdhariini = 0; ?>
 <?php //$no=1; $rekkode_before = ''; foreach ($data['realisasibkp'] as $list) :?>                  
<?php //$totalhariini = $totalhariini+$list['HARI_INI']; ?>
<?php //$totalsdharilalu = $totalsdharilalu+$list['SD_HARILALU']; ?>
<?php //$totalsdhariini = $totalsdhariini+$list['SD_HARIINI']; ?>

<?php //$rekkode_now = $list['TBLSETOR_REKPENDAPATAN'] .'.'. $list['TBLSETOR_REKPAD'] .'.'. $list['TBLSETOR_REKPAJAK'] ?>

<?php //if ($rekkode_before!=$rekkode_now): $rekkode_before=$rekkode_now; ?>
      <?php //if ($no!=1): ?>
        <tr>
          <td><div align="center"><?php //echo $no++; ?></div></td> <!-- URT -->
          <td><div align="right"></div> </td> <!--  REKENING -->
          <td><div align="right">Sub Total :</div> </td> <!-- NAMA WAJIB PAJAK -->
          <td><div align="right"><?php //echo LokalIndonesia::ribuan($totalhariini);?></div> </td> <!-- HARI INI  -->
          <td><div align="right"><?php //echo LokalIndonesia::ribuan($totalsdhariini);?></div> </td> <!-- S/D HARI LALU -->
          <td><div align="right"><?php //echo LokalIndonesia::ribuan($totalsdharilalu);?></div> </td> <!-- S/D HARI INI -->

        </tr>
      <?php //endif ?>
    <?php //endif ?>

    <tr>
        <td><div align="center"><?php //echo $no++; ?></div></td> <!-- URT -->
        <td><div align="center">

        <?php //echo $list['TBLSETOR_REKPENDAPATAN']?>.<?php //echo $list['TBLSETOR_REKPAD']?>.<?php //echo $list['TBLSETOR_REKPAJAK']?>.<?php //echo $list['TBLSETOR_REKAYAT'] ?>.<?php //echo $list['TBLSETOR_REKJENIS'] ?></div> </td> <!-- No.Rek -->
        <td><div align="left"><?php //echo $list['TBLREKENING_NAMAREKENING'] ?></div> </td> <!-- Jenis Pajak / Retribusi -->
        <td><div align="right"><?php //echo LokalIndonesia::ribuan($list['HARI_INI'])?></div> </td> <!-- Bulan Ini  -->
        <td><div align="right"><?php //echo LokalIndonesia::ribuan($list['SD_HARILALU'])?></div> </td> <!-- S/D Bulan Lalu -->
        <td><div align="right"><?php //echo LokalIndonesia::ribuan($list['SD_HARIINI'])?></div> </td> <!-- S/D Bulan Ini -->
    </tr>
<?php //$no++; endforeach ?>
 <tr>
          <td><div align="center"><?php //echo $no++; ?></div></td> <!-- URT -->
          <td><div align="right"></div> </td> <!--  REKENING -->
          <td><div align="right">Sub Total :</div> </td> <!-- NAMA WAJIB PAJAK -->
          <td><div align="right"><?php //echo LokalIndonesia::ribuan($totalhariini);?></div> </td> <!-- HARI INI  -->
          <td><div align="right"><?php //echo LokalIndonesia::ribuan($totalsdhariini);?></div> </td> <!-- S/D HARI LALU -->
          <td><div align="right"><?php //echo LokalIndonesia::ribuan($totalsdharilalu);?></div> </td> <!-- S/D HARI INI -->

        </tr>

 <tr>
      <td><div align="right"> </div></td>
      <td><div align="right"> </div></td>
      <td><div align="center"><strong>Jumlah :</strong></div></td>
      <td><div align="right"><?php //echo LokalIndonesia::ribuan($totalhariini);?></div></td>
      <td><div align="right"><?php //echo LokalIndonesia::ribuan($totalsdhariini);?></div></td>
      <td><div align="right"><?php //echo LokalIndonesia::ribuan($totalsdharilalu);?></div></td>
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
    <td align="center">YOGYAKARTA, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
    <td width="50%"></td>
 </tr>
</thead>
<tbody>
  <tr>
    <td align="center">B.K.P</td>
    <td width="50%"></td>
  </tr>
  <tr>
    <td style="color: white">ttd</td>
    <td width="50%"></td>
  </tr>
  <tr>
    <td style="color: white">ttd</td>
    <td width="50%"></td>
  </tr>
  <tr>
    <td style="color: white">ttd</td>
    <td width="50%"></td>
  </tr>
  <tr>
    <td align="center">Warningsih</td>
    <td width="50%"></td>
  </tr>
  <tr>
    <td align="center">---------------------------------</td>
    <td width="50%"></td>
  </tr>
  <tr>
    <td align="center">NIP. 196303091987032004</td>
    <td width="50%"></td>
  </tr>
  <tr>
    <td align="center"> MODEL = KKPD.II-63</td>
     <td width="50%">Realisasi Pajak S/D Tanggal : <?php echo $tanggal = $_REQUEST['tanggal']; ?>-<?php echo $bulan = LokalIndonesia::getBulan($_REQUEST['bulan']);?>-<?php echo $tahun = $_REQUEST['tahun']; ?></td>
  </tr>
</tbody>
</table>
</div>
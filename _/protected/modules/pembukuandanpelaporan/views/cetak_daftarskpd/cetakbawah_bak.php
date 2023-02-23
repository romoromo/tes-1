<!-- Setoran Harian  bawah -->
<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" border="0">
  <thead>  
    <tr>
      <td align="left" width="33%">DINAS PAJAK DAERAH DAN</td>
      <td align="center" width="33%">BUKU PENERIMAAN <?php echo $data['judul'] ?> </td>
      <td align="center" width="33%">TANGGAL :  <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td align="left">PENGELOLAAN KEUANGAN</td>
      <td align="center">TANGGAL SETOR : <?php echo $tanggal = $_REQUEST['tanggal'] ?>-<?php echo LokalIndonesia::getBulan($bulan = $_REQUEST['bulan']) ?>-<?php echo $tahun = $_REQUEST['tahun'] ?></td> 
      <td align="center"> </td>
    </tr>
  </tbody>
</table>

<br>
<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
 <style type="text/css" >
 </style>
 <thead>  
  <!-- <tr>
    <td colspan="11" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
  </tr> -->
  <tr>
    <td colspan="11" align="center">__________________________________________________________________________________________________________________________________</td>
  </tr>
  <tr>
    <td align="center">NO</td>
    <td align="center">TG. STOR</td>
    <td align="center">NOMOR</td>
    <td align="center">NAMA WAJIB PAJAK/RETRIBUSI</td>
    <td align="center">NPWP</td>
    <td align="center">REKENING PAD</td>
    <td align="center">PENERIMAAN</td>
    <td align="center">BL</th>
      <td align="center">TH</td>
      <td align="center">MEDIA</td>
      <td align="center">LOK</td>
    </tr>
    <tr>
      <td colspan="11" align="center">__________________________________________________________________________________________________________________________________</td>
    </tr>
   <!--   <tr>
    <td colspan="11" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
  </tr> -->
</thead>
<?php $total=0; ?>
<?php $no=1; foreach ($data['bawah'] as $list) :?>
  <?php $total= $total+$list['TBLSETOR_RUPIAHSETOR'] ?>
  <tbody>   
    <tr>
     <td align="center"><?php echo $no++; ?></td> <!-- NO -->
     <td align="center"><?php echo $list['TBLSETOR_TGLSETOR'] ?>-<?php echo $list['TBLSETOR_BLNSETOR'] ?>-<?php echo $list['TBLSETOR_THNSETOR'] ?></td> <!-- TG. SETOR -->
     <td align="center"><?php echo $list['TBLSETOR_NOMORSSPD'] ?></td> <!-- NOMOR -->
     <td align="center"><?php echo $list['BNAMA'] ?></td> <!-- NAMA WAJIB PAJAK -->
     <td align="center"><?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo $list['TBLDAFTAR_NOPOK'] ?>.<?php echo $list['TBLKECAMATAN_IDBADANUSAHA'] ?>.<?php echo $list['TBLKELURAHAN_IDBADANUSAHA'] ?></td> <!-- NPWP -->
     <td align="center"><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?>.<?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?></td> <!-- REKENING PAD -->
     <td align="right"><?php echo LokalIndonesia::ribuan($list['TBLSETOR_RUPIAHSETOR']) ?></td> <!-- PENERIMAAN -->
     <td align="center"><?php echo $list['TBLPENDATAAN_BLNPAJAK'] ?></td> <!-- BL -->
     <td align="center"><?php echo $list['TBLPENDATAAN_THNPAJAK'] ?></td> <!-- TH -->
     <td align="center"><?php echo $list['TBLSETOR_JNSBAYAR'] ?></td> <!-- MEDIA -->
     <td align="center"><?php //echo $list[''] ?></td> <!-- LOK -->
   </tr>
 <?php endforeach ?>
 <tr>
   <tr>
    <td colspan="11" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
  <td><div align="right"> </div></td>
  <td><div align="right"> </div></td>
  <td><div align="right"> </div></td>
  <td><div align="right"> </div></td>
  <td><div align="center"><strong>TOTAL Rp :</strong></div></td>
  <td><div align="right"> </div></td>
  <td><div align="right"> </div></td>
  <td><div align="right"> </div></td>
  <td><div align="right"> <?php echo LokalIndonesia::ribuan($total); ?> </div></td>
</tr>
<tr>
  <td colspan="11" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
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
          <td align="left">YOGYAKARTA, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td align="left">BENDAHARA PENERIMAAN</td>
        </tr>
        <tr>
          <td style="color: white"> </td>
        </tr>
        <tr>
          <td style="color: white"> </td>
        </tr>
        <tr>
          <td style="color: white"> </td>
        </tr>
        <tr>
          <td align="left">Warningsih</td>
        </tr>
        <tr>
          <td align="left">---------------------------------</td>
        </tr>
        <tr>
          <td align="left">NIP. 196303091987032004</td>
        </tr>
      </tbody>
    </table>
  </div>
<!-- Setoran Harian  bawah -->
<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" border="0">
  <thead>  
    <tr>
      <td align="left" width="33%">BADAN PENGELOLAAN KEUANGAN</td>
      <td align="center" width="33%">REALISASI <?php echo $data['judul'] ?> </td>
      <td align="center" width="33%">TANGGAL :  <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td align="left">DAN ASET DAERAH</td>
      <td align="center">TANGGAL SETOR : <?php echo $tanggal = $_REQUEST['tglawl'] ?> S/D <?php echo $tanggal = $_REQUEST['tglakhir'] ?></td> 
      <td align="center"> </td>
    </tr>
  </tbody>
</table>

<br>
<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
 <style type="text/css" >
</style>
<thead>  
  <tr>
    <td align="center">NO</td>
    <td align="center">TGL. SETOR</td>
    <td align="center">JENIS REKENING</td>
    <td align="center">NAMA WAJIB PAJAK/RETRIBUSI</td>
    <td align="center">NOPOK</td>
    <td align="center">KEC</td>
    <td align="center">KEL</td>
    <td align="center">TAHUN PAJAK</td>
    <td align="center">BULAN PAJAK</th>
    <td align="center">JENIS BAYAR</th>
    <td align="center">NOMOR SSPD</td>
    <td align="center">POKOK</td>
    <td align="center">BUNGA</td>
    <td align="center">DENDA</td>
</tr>
</thead>
<?php $total=0; $totalbng=0; $totaldnd=0; ?>
<?php $no=1; foreach ($data['bawah'] as $list) :?>
<?php $total= $total+$list['TBLSETOR_RUPIAHSETOR'] ?>
<?php $totalbng= $totalbng+$list['TBLSETOR_BUNGAKETETAPAN'] ?>
<?php $totaldnd= $totaldnd+$list['TBLSETOR_DENDAKETETAPAN'] ?>
<tbody>   
    <tr>
      <td align="center"><?php echo $no++; ?></td> <!-- NO -->
      <td align="center"><?php echo $list['TBLSETOR_TGLSETOR'] ?>-<?php echo $list['TBLSETOR_BLNSETOR'] ?>-<?php echo $list['TBLSETOR_THNSETOR'] ?></td> <!-- TG. SETOR -->
      <td align="center"><?php echo $list['BBU'] ?></td> <!-- BBU -->
      <td align="center"><?php echo $list['BNAMA'] ?></td> <!-- NAMA WAJIB PAJAK -->
      <td align="center"><?php echo $list['TBLDAFTAR_NOPOK'] ?></td> <!-- NOPOK -->
      <td align="center"><?php echo $list['TBLKECAMATAN_IDBADANUSAHA'] ?></td> <!-- KEC -->
      <td align="center"><?php echo $list['TBLKELURAHAN_IDBADANUSAHA'] ?></td> <!-- KEL -->
      <td align="center"><?php echo $list['TBLPENDATAAN_THNPAJAK'] ?></td> <!-- TH -->
      <td align="center"><?php echo $list['TBLPENDATAAN_BLNPAJAK'] ?></td> <!-- BL -->
      <td align="center"><?php echo $list['TBLSETOR_JNSBAYAR'] ?></td> <!-- MEDIA -->
      <td align="center"><?php echo $list['TBLSETOR_NOMORSSPD'] ?></td> <!-- NOMOR -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['TBLSETOR_RUPIAHSETOR']) ?></td> <!-- PENERIMAAN -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['TBLSETOR_BUNGAKETETAPAN']) ?></td> <!-- BUNGA -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['TBLSETOR_DENDAKETETAPAN']) ?></td> <!-- DENDA -->
      
    </tr>
  <?php endforeach ?>
 <tr>
 <tr>
    <td colspan="14" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
      
      <td colspan="11"><div align="right" ><strong>TOTAL Rp :</strong></div></td>
      <td><div align="right"><?php echo LokalIndonesia::ribuan($total); ?> </div></td>
      <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbng); ?>  </div></td>
      <td><div align="right"><?php echo LokalIndonesia::ribuan($totaldnd); ?>  </div></td>
    </tr>
    <tr>
    <td colspan="14" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
</tbody>
</table>

<br>
<div id="ttd">
<table width="35%" id="atas" border="0">
<!-- <style type="text/css">
        table,td,th {
            border: 0px solid #C6C6C6;
        }
</style> -->
<thead>  
  <tr>
    <td align="center">YOGYAKARTA, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
 </tr>
</thead>
<tbody>
  <tr>
    <td align="center">BENDAHARA PENERIMAAN</td>
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
    <td align="center">Warningsih</td>
  </tr>
  <tr>
    <td align="center">---------------------------------</td>
  </tr>
  <tr>
    <td align="center">NIP. 196303091987032004</td>
  </tr>
</tbody>
</table>
</div>

<!-- Kas Umum Harian -->
<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
<thead>  
  <tr>
    <td align="left">Dinas Pajak Daerah Dan</td>
    <td align="center">Buku kas Umum Harian</td>
  </tr>
</thead>
<tbody>
  <tr>
    <td align="left">Pengelolaan Keuangan</td>
    <td align="center">Tahun Setor : <?php echo $tahun = $_REQUEST['tahun']; ?>    Bulan : <?php echo $bulan = LokalIndonesia::getBulan($_REQUEST['bulan']);?> </td>
  </tr>
</tbody>
</table>

<br>
<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
 <style type="text/css" >
</style>
<thead>  
  <tr>
    <td align="center">NO</td>
    <td align="center">TG. STOR</td>
    <td align="center">NO. SSP</td>
    <td align="center">NAMA WAJIB PAJAK/RETRIBUSI</td>
    <td align="center">NPWPD</td>
    <td align="center">JENIS P/R<br>REKENING</td>
    <td align="center">PAJAK<br>T.B.H</td>
    <td align="center">KE</th>
    <td align="center">PENERIMAAN RP</td>
    <td align="center">PENGELUARAN RP</td>
</tr>
</thead>
<tbody>
<?php $total =0; ?>
 <?php $no=1; foreach ($data['hasil'] as $list) :?>                  
 <?php $total = $total+$list['TBLSETOR_RUPIAHSETOR']; ?>   
    <tr>
        <td><div align="center"><?php echo $no++; ?></div></td> <!-- No -->
        <td><div align="center"><?php echo $list['TBLSETOR_TGLSETOR']?>/<?php echo $list['TBLSETOR_BLNSETOR']?>/<?php echo $list['TBLSETOR_THNSETOR']?></div> </td> <!-- TG.SETOR -->
        <td><div align="center"><?php echo $list['TBLSETOR_NOMORSSPD'] ?></div> </td> <!-- NO. SSP -->
        <td><div align="left"><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?></div> </td> <!-- NAMA WAJIB PAJAK/RETRIBUSI  -->
        <td><div align="left"><?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo $list['TBLDAFTAR_NOPOK'] ?>.<?php echo $list['TBLKELURAHAN_IDBADANUSAHA'] ?>.<?php echo $list['TBLKECAMATAN_IDBADANUSAHA'] ?></div> </td> <!-- NPWPD -->
        <td><div align="center"><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?><?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?></div> </td> <!-- JENIS P/R REKENING -->
        <td><div align="center"><?php echo $list['TBLPENDATAAN_THNPAJAK'] ?> <?php echo $list['TBLPENDATAAN_BLNPAJAK'] ?> <?php echo $list['TBLPENDATAAN_TGLPAJAK'] ?></div> </td> <!-- PAJAK T.B.H -->
        <td><div align="center"><?php //echo $list[''] ?></div> </td> <!-- KE -->
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['TBLSETOR_RUPIAHSETOR']) ?></div> </td> <!-- PENERIMAAN RP -->
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['TBLSETOR_RUPIAHSETOR']) ?></div> </td> <!-- PENGELUARAN RP  -->
    </tr>
<?php endforeach ?>
 <tr>
      <td><div align="right"> </div></td>
      <td><div align="right"> </div></td>
      <td><div align="right"> </div></td>
      <td><div align="right"> </div></td>
      <td><div align="right"> </div></td>
      <td><div align="right"> </div></td>
      <td><div align="right"> </div></td>
      <td><div align="center"><strong>TOTAL Rp :</strong></div></td>
      <td><div align="right"><?php echo LokalIndonesia::ribuan($total); ?> </div></td>
      <td><div align="right"><?php echo LokalIndonesia::ribuan($total); ?> </div></td>
    </tr>
</tbody>
</table>

<br>
<div id="Rekapitulasi">
<table width="100%" id="atas" border="0">
<!-- <style type="text/css">
        table,td,th {
            border: 0px solid #C6C6C6;
        }
</style> -->
<thead>  
  <tr>
    <td align="left"><strong>Rekapitulasi</strong></td>
 </tr>
</thead>
<tbody>
  <tr>
    <td align="left" width="20%">1. Sisa Kas Hari Lalu</td>
    <td align="left">Rp : </td>
  </tr>
   <tr>
    <td align="left" width="20%">2. Jumlah Penerimaan</td>
    <td align="left">Rp : <?php echo LokalIndonesia::ribuan($total); ?></td>
  </tr>
   <tr>
    <td align="left" width="20%">3. Jumlah Penyetoran</td>
    <td align="left">Rp : <?php echo LokalIndonesia::ribuan($total); ?></td>
  </tr>
  <tr>
    <td align="left" width="20%">Sisa Kas Hari Ini</td>
    <td align="left">Rp : </td>
  </tr>
</tbody>
</table>
</div>

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
    <td align="center">Kepala Dinas Pajak Daerah Dan</td>
    <td align="center">YOGYAKARTA, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
 </tr>
</thead>
<tbody>
  <tr>
    <td align="center">Pengelolaan Keuangan</td>
    <td align="center">BENDAHARA PENERIMAAN</td>
  </tr>
  <tr>
    <td style="color: white">ttd</td>
    <td style="color: white">ttd</td>
  </tr>
  <tr>
    <td style="color: white">ttd</td>
    <td style="color: white">ttd</td>
  </tr>
  <tr>
    <td style="color: white">ttd</td>
    <td style="color: white">ttd</td>
  </tr>
  <tr>
    <td align="center">Drs. Kadri Renggono ,M.SI</td>
    <td align="center">Warningsih</td>
  </tr>
  <tr>
    <td align="center">---------------------------------</td>
    <td align="center">---------------------------------</td>
  </tr>
  <tr>
    <td align="center">NIP. 196611271993031006</td>
    <td align="center">NIP. 196303091987032004</td>
  </tr>
</tbody>
</table>
</div>
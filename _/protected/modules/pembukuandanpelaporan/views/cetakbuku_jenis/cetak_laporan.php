<!-- Laporan Obyek Rinci Jabong -->
<?php Yii::import('ext.LokalIndonesia'); ?>
<div id="header">
  <table width="100%">
    <thead>
      <tr>
        <td align="center">Buku Pembantu</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td align="center">Per Rincian Obyek Penerimaan</td>        
      </tr>
    </tbody>
  </table>
</div>

<br>
<div id="tblatas" style="display: ">
  <table width="100%" id="atas" border="0">
<style type="text/css">
    <!--
    .style2 {font-size: 12px}
    .style3 {font-size: 14px}
    .style4 {font-size: 16px}
  -->
</style>
     <!--  <thead>  
        <tr>
          <td align="center">Buku Rekapitulasi Penerimaan Harian</td>
        </tr>
      </thead> -->
      <tbody>
        <tr>
          <td align="left" width="20%">SKPD</td>
          <td> : </td>
          <td> Badan Pengelolaan Keuangan Dan Aset Daerah Kota Yogyakarta </td>
          <tr>
            <td align="left" width="20%">Kode Rekening</td>
            <td> : </td>
            <?php $koderek = $data['header']['TBLSETOR_REKPENDAPATAN']; ?>
            <?php $koderek1 = $data['header']['TBLSETOR_REKPAD']; ?>
            <?php $koderek2 = $data['header']['TBLSETOR_REKPAJAK']; ?>
            <?php $koderek3 = $data['header']['TBLSETOR_REKAYAT']; ?>
            <td> <?php echo $koderek ?>.<?php echo $koderek1 ?>.<?php echo $koderek2 ?>.<?php echo $koderek3 ?> </td>   </tr>
            <tr>
             <td align="left" width="20%">Nama Rekening</td>
             <td> : </td>
             <?php $namarekening = $data['header']['NMREK']; ?>
             <td> <?php echo $namarekening ?> </td>
           </tr>
           <tr>
             <td align="left" width="20%">Jumlah Anggaran</td>
             <td> : </td>
             <td> Rp. </td>
           </tr>
           <tr>
             <td align="left" width="20%">Tahun Angaran</td>
             <td> : </td>
             <td> <?php echo $masapajak_tahun = $_REQUEST['masapajak_tahun']; ?> </td>
           </tr>
           <tr>
             <td align="left" width="20%">Bulan Anggaran</td>
             <td> : </td>
             <td> <?php echo $masapajak_bulan = LokalIndonesia::getBulan($_REQUEST['masapajak_bulan']);?> </td>
           </tr>
         </tr>
       </tbody>
     </table>
   </div>

   <table width="100%" >
    <thead>
      <td align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
    </thead>
  </table>
  <table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
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
      <tr>
        <td colspan="7" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
      </tr>
    </thead>
    <tbody>
     <?php $totalhariini = 0; ?>
     <?php $totalsdharilalu = 0; ?>
     <?php $totalsdhariini = 0; ?>
     <?php $no=1; foreach ($data['cetak'] as $list) :?>
     <?php $totalhariini =$data['total']['BULANINI']; ?>
     <?php $totalsdharilalu = $data['total']['SD_BULANLALU']; ?>
     <?php $totalsdhariini = $data['total']['SD_BULANINI']; ?>
     <tr>
       <td><div align="center"><?php echo $no++; ?></div></td> <!-- Urut --> 
       <td><div align="left"><?php echo $list['TBLSETOR_TGLSETOR']?>/<?php echo $list['TBLSETOR_BLNSETOR']?>/<?php echo $list['TBLSETOR_THNSETOR']?></div></td> <!-- Tanggal Setor -->
       <td><div align="left"><?php echo $list['TBLSETOR_NOMORSSPD'] ?></div></td> <!-- No. Bukti -->
       <td><div align="center"><?php echo $list['TBLPENDATAAN_THNPAJAK'] ?></div></td> <!-- Tahun -->
       <td><div align="center"><?php echo LokalIndonesia::getBulan($list['TBLPENDATAAN_BLNPAJAK'])?></div></td> <!-- Bulan -->
       <td><div align="center"><?php //echo $list[''] ?></div></td> <!-- Ke -->
       <td><div align="center"><?php echo LokalIndonesia::ribuan($list['TBLSETOR_RUPIAHSETOR'])?></div></td> <!-- Penerimaan -->       
     </tr>
   <?php endforeach ?>
   <tr>
    <td colspan="7" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
  <tr>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><div align="left">TOTAL BULAN INI </div></td>
   <td align="center"> : </td>
   <td align="center"> <?php echo LokalIndonesia::ribuan($totalhariini) ?> </td>
   <tr>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td ><div align="left">TOTAL S/D BULAN LALU </div></td>
     <td align="center"> : </td>
     <td align="center"> <?php echo LokalIndonesia::ribuan($totalsdharilalu) ?> </td>
   </tr>
   <tr>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td ><div align="left">TOTAL S/D BULAN INI </div></td>
     <td align="center"> : </td>
     <td align="center"> <?php echo LokalIndonesia::ribuan($totalsdhariini) ?> </td>
   </tr>
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
          <td align="center"> Mengetahui:</td>
          <td align="center">YOGYAKARTA, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td align="center">Pengguna Anggaran</td>
          <td align="center">BENDAHARA PENERIMAAN</td>
        </tr>
        <tr>
          <td style="color: white">.</td>
          <td style="color: white">.</td>
        </tr>
        <tr>
          <td style="color: white">.</td>
          <td style="color: white">.</td>
        </tr>
        <tr>
          <td style="color: white">.</td>
          <td style="color: white">.</td>
        </tr>
        <tr>
          <td align="center"> Drs. Kadri Renggono,M.SI</td>
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

  <script type="text/javascript">
    pageSetUp();
    jQuery(document).ready(function() {
    //reloadDT('atas');
  });
  </script>
<?php Yii::import('ext.LokalIndonesia'); ?>
<div id="tblatas" style="display: ">
  <table width="100%" id="atas" border="0">
<!-- <style type="text/css">
        table,td,th {
            border: 0px solid #C6C6C6;
        }
      </style> -->
      <thead>  
        <tr>
          <td align="left">Badan Pengelolaan Keuangan Dan</td>
          <td align="center">Daftar Setoran Harian</td>
          <td align="center">Tanggal: <?php echo $tgl_setor = $_REQUEST['tgl_setor']; ?> </td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td align="left">Aset Daerah</td>
          <td align="left"></td>
          <td align="left"></td>
        </tr>
      </tbody>
    </table>
  </div>

  <table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
    <thead>
      <tr align="center">
        <th data-hide="phone"><div align="center">NO</div></th>
        <th data-hide="phone"><div align="center">NPWPD</div></th>
        <th data-hide="phone"><div align="center">NAMA WP/WR <br> ALAMAT</div></th>
        <th data-class="expand"><div align="center">MEDIA <br>REF.TAHUN</div></th>
        <th data-hide="phone"><div align="center">BUKTI SETOR<br> TGL.</div></th>
        <th data-hide="phone,tablet,desktop"><div align="center">REKENING</div></th>
        <th data-hide="phone,tablet,desktop"><div align="center">SETORAN</div></th>
      </tr>
    </thead>
    <tbody>
      <?php $total = 0; ?>  
      <?php $no=1; foreach ($data['setoran'] as $list) :?>
      <?php $total = $total+$list['TBLSETOR_RUPIAHSETOR']; ?>
      <tr>
        <td><div align="center"><?php echo $no++; ?></div></td> <!-- NO -->
        <td><div align="center"><?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo $list['TBLDAFTAR_NOPOK'] ?>.<?php echo $list['TBLKECAMATAN_IDBADANUSAHA'] ?>.<?php echo $list['TBLKECAMATAN_IDBADANUSAHA'] ?></div></td> <!-- NPWPD -->        
        <td><div align="left"><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?> <br> <?php echo $list['TBLDAFTAR_BADANUSAHAALAMAT'] ?></div></td> <!-- NAMA WP/WR ALAMAT -->
        <td><div align="center"><?php echo $list['TBLSETOR_JNSBAYAR'] ?> <br><?php echo $list['TBLPENDATAAN_THNPAJAK'] ?>/<?php echo $list['TBLPENDATAAN_BLNPAJAK'] ?></div></td> <!-- REF.TAHUN -->  
        <td><div align="center"><?php echo $list['TBLSETOR_NOMORSSPD'] ?><br><?php echo $list['TBLSETOR_TGLSETOR'] ?>/<?php echo $list['TBLSETOR_BLNSETOR'] ?>/<?php echo $list['TBLSETOR_THNSETOR'] ?></div> </td> <!--BUKTI SETOR TGL -->       
        <td><div align="center"><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?>.<?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?> <br><?php echo $list['TBLREKENING_NAMAREKENING'] ?></div></td> <!-- REKENING -->       
        <td><div align="right"><?php echo LokalIndonesia::ribuan($list['TBLSETOR_RUPIAHSETOR'])  ?></div></td> <!-- SETORAN -->       
      </tr>
    <?php endforeach ?>
    <tr>

    </tr>
  </tbody>
</table>

<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
  <thead>
    <tr>
     <td width="25%"><div align="right"></div></td>
     <td width="50%"><div align="center"><strong>TOTAL Rp :</strong></div></td>
     <td><div align="right"><?php echo LokalIndonesia::ribuan($total); ?> </div></td>
   </tr>
 </thead>
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
          <td align="left" width="50%"></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td align="center">BENDAHARA PENERIMAAN</td>
          <td align="left" width="50%"></td>
        </tr>
        <tr>
          <td style="color: white">ttd</td>
          <td align="left" width="50%"></td>
        </tr>
        <tr>
          <td style="color: white">ttd</td>
          <td align="left" width="50%"></td>
        </tr>
        <tr>
          <td style="color: white">ttd</td>
          <td align="left" width="50%"></td>
        </tr>
        <tr>
          <td align="center">Warningsih</td>
          <td align="left" width="50%"></td>
        </tr>
        <tr>
          <td align="center">---------------------------------</td>
          <td align="left" width="50%"></td>
        </tr>
        <tr>
          <td align="center">NIP. 196303091987032004</td>
          <td align="left" width="50%"></td>
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
<!-- Tunggakan Pajak -->
<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
    <thead>
        <style type="text/css">
            <!--
            .style2 {font-size: 12px}
            .style3 {font-size: 14px}
            .style4 {font-size: 16px}
        -->
    </style>
    <tr>
        <?php $namarekening = $data['header']['NMREK'] ?>
        <th colspan="17" style="text-align-last:left;">BUKU KENDALI <?php echo $namarekening ?>  TAHUN  <?php echo $tahun = $_REQUEST['tahun'] ?> 
            PER: <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?>
        </th>
    </tr>
    <thead>  
      <tr>
        <th>NO</th>
        <th>NAMA/ALAMAT</th>
        <th>NPWPD </th>
        <th>ALAMAT</th>
        <th>JANUARI RP</th>
        <th>FEBRUARI RP</th>
        <th>MARET RP</th>
        <th>APRIL RP</th>
        <th>MEI RP</th>
        <th>JUNI RP</th>
        <th>JULI RP</th>
        <th>AGUSTUS RP</th>
        <th>SEPTEMBER RP</th>
        <th>NOVEMBER RP</th>
        <th>DESEMBER RP</th>
        <th>JUMLAH RP</th>
        <th>SKPD</th>
    </tr>
</thead>
<tbody style="text-align: center;">
    <?php $no=1; foreach ($data['tunggakan'] as $list) :?>
    <tr>
        <td><?php echo $no++; ?></td> <!-- NO -->
        <td><?php echo$list['TBLDAFTAR_BADANUSAHANAMA'] ?></td> <!-- NAMA/ALAMAT -->
        <td><?php echo$list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo $list['TBLDAFTAR_NOPOK'] ?>.<?php echo $list['TBLKECAMATAN_IDBADANUSAHA'] ?>.<?php echo $list['TBLKELURAHAN_IDBADANUSAHA'] ?></td> <!-- NPWPD -->
        <td><?php echo$list['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td> <!-- ALAMAT -->
        <td><?php echo LokalIndonesia::ribuan($list['JANUARI']) ?></td> <!-- JANUARI RP -->
        <td><?php echo LokalIndonesia::ribuan($list['FEBRUARI']) ?></td> <!-- FEBRUARI RP -->
        <td><?php echo LokalIndonesia::ribuan($list['MARET']) ?></td> <!--  MARET RP -->
        <td><?php echo LokalIndonesia::ribuan($list['APRIL']) ?></td> <!-- APRIL RP -->
        <td><?php echo LokalIndonesia::ribuan($list['MEI']) ?></td> <!-- MEI RP -->
        <td><?php echo LokalIndonesia::ribuan($list['JUNI']) ?></td> <!-- JUNI RP -->
        <td><?php echo LokalIndonesia::ribuan($list['JULI']) ?></td> <!-- JULI RP -->
        <td><?php echo LokalIndonesia::ribuan($list['AGUSTUS']) ?></td> <!-- AGUSTUS RP -->
        <td><?php echo LokalIndonesia::ribuan($list['SEPTEMBER']) ?></td> <!-- SEPTEMBER RP -->
        <td><?php echo LokalIndonesia::ribuan($list['NOVEMBER']) ?></td> <!-- NOVEMBER RP -->
        <td><?php echo LokalIndonesia::ribuan($list['DESEMBER']) ?></td> <!-- DESEMBER RP -->
        <td><?php echo LokalIndonesia::ribuan($list['JUMLAH_PEMBAYARAN']) ?></td> <!-- JUMLAH RP -->
        <td><?php echo $list['JUMLAH_SKPD'] ?></td> <!-- SKPD -->
    </tr>
<?php endforeach ?>
</tbody>
</table><br><br><br>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" cellpadding="5" border="0">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th> 
            <th></th> 
            <th></th> 
            <th></th> 
            <th></th> 
            <th></th> 
            <th></th> 
            <th></th> 
            <th></th> 
            <th></th> 
            <th></th> 
            <th></th> 
            <th></th> 
            <th>Yogyakarta,<?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></th> 
            <th></th> 
        </tr>
        <thead>  
          <tr>
            <th></th> 
            <th></th>
            <th></th>
            <th colspan="1">Kepala Seksi Penagihan dan Keberatan</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th> 
            <th></th> 
            <th></th> 
            <th></th> 
            <th></th> 
            <th></th> 
            <th>Pemegang Buku Kendali</th> 
            <th></th>
        </tr>
    </thead>
    <tbody style="text-align: center;">
      <tr>
        <td><br><br><br><br><br><br><br><br><br><br><br></td>
        <td></td>
        <td></td>
        <td>E. IRAWATI. SIP<br>
            NIP. 19591128 198003 2 003
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>M. ROHMAD ROMADHON<br>
            NIP. 1967121992031002</td>
            <td></td>
        </tr>
    </tbody>
</table>
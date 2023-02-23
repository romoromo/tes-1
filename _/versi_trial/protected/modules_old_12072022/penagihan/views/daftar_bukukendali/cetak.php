<?php Yii::import('ext.LokalIndonesia'); ?>

<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
    <thead>
        <tr>
            <th colspan="18" style="text-align-last:left;">BUKU KENDALI PAJAK <?php echo $data['judul'] ?> TAHUN <?php echo $masapajak = $_REQUEST['masapajak'] ?><br>
                PER: <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?>
            </th>
        </tr>
        <thead>  
          <tr>
            <th>NO</th>
            <th>NAMA/ALAMAT</th>
            <th>NPWPD</th>
            <th>ALAMAT</th>
            <th>JANUARI</th>
            <th>FEBRUARI</th>
            <th>MARET</th>
            <th>APRIL</th>
            <th>MEI</th>
            <th>JUNI</th>
            <th>JULI</th>
            <th>AGUSTUS</th>
            <th>SEPTEMBER</th>
            <th>OKTOBER</th>
            <th>NOVEMBER</th>
            <th>DESEMBER</th>
            <th>JUMLAH</th>
            <th>SKPD</th>
        </tr>
    </thead>
    <tbody style="text-align: center;">
      <?php $no=1; foreach ($data['kendali'] as $list) :?>
      <tr>
      <td><?php echo $no++; ?></td>
        <td><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
        <td><?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo $list['TBLDAFTAR_NOPOK'] ?>.<?php echo $list['TBLKECAMATAN_IDBADANUSAHA'] ?>.<?php echo $list['TBLKELURAHAN_IDBADANUSAHA'] ?></td>
        <td><?php echo $list['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td>
        <td><?php echo LokalIndonesia::ribuan($list['JANUARI']) ?></td>
        <td><?php echo LokalIndonesia::ribuan($list['FEBRUARI']) ?></td>
        <td><?php echo LokalIndonesia::ribuan($list['MARET']) ?></td>
        <td><?php echo LokalIndonesia::ribuan($list['APRIL']) ?></td>
        <td><?php echo LokalIndonesia::ribuan($list['MEI']) ?></td>
        <td><?php echo LokalIndonesia::ribuan($list['JUNI'])?></td>
        <td><?php echo LokalIndonesia::ribuan($list['JULI']) ?></td>
        <td><?php echo LokalIndonesia::ribuan($list['AGUSTUS']) ?></td>
        <td><?php echo LokalIndonesia::ribuan($list['SEPTEMBER']) ?></td>
        <td><?php echo LokalIndonesia::ribuan($list['OKTOBER']) ?></td>
        <td><?php echo LokalIndonesia::ribuan($list['NOVEMBER']) ?></td>
        <td><?php echo LokalIndonesia::ribuan($list['DESEMBER']) ?></td>
        <td><?php echo LokalIndonesia::ribuan($list['JUMLAH_PEMBAYARAN']) ?></td>
        <td><?php echo $list['JUMLAH_SKPD'] ?></td>
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
            <th>Yogyakarta, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></th> 
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

<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
<thead>  
  <tr>
    <th colspan="2" align="left">Dinas Pajak Daerah Dan</th>
    <th colspan="2" align="center">Daftar Setoran Harian</th>
    <th colspan="3" align="center">Tanggal: <?php echo $tgl = $_REQUEST['tgl']; ?>/<?php echo $bulan = $_REQUEST['bulan']; ?>/<?php echo $tahun = $_REQUEST['tahun'] ?> </th>
  </tr>
  <tr>
    <th align="center">No</th>
    <th align="center">NPWPD</th>
    <th align="center">NAMA WP/WR <br> ALAMAT</th>
    <th align="center">MEDIA <br> REF.TAHUN</th>
    <th align="center">BUKTI SETOR <br> TGL. KE</th>
    <th align="center">REKENING</th>
    <th align="center">SETORAN</th>
</tr>
</thead>
<tbody>
    <?php $no=1; foreach ($data['hasil'] as $list) :?>                  
    <tr>
        <td><div align="center"><?php echo $no++; ?></div></td> <!-- No -->
        <td><div align="center"><?php echo $list['TBLDAFTAR_GOLONGAN']?>.<?php echo $list['TBLDAFTAR_NOPOK'] ?>.<?php echo $list['TBLKECAMATAN_IDBADANUSAHA']?>.<?php echo $list['TBLKELURAHAN_IDBADANUSAHA']?></div> </td> <!-- NPWPD -->
        <td><div align="center"><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?><br><?php echo $list['TBLDAFTAR_BADANUSAHAALAMAT'] ?></div> </td> <!-- NAMA WP/WR ALAMAT -->
        <td><div align="center"><?php echo $list['TBLSETOR_JNSBAYAR'] ?><br><?php echo $list['TBLPENDATAAN_THNPAJAK'] ?>/<?php echo $list['TBLPENDATAAN_BLNPAJAK'] ?></div> </td> <!-- MEDIA REF.TAHUN -->
        <td><div align="center"><?php echo $list['TBLSETOR_NOMORSSPD'] ?><br><?php echo $list['TBLSETOR_THNSETOR'] ?>/<?php echo $list['TBLSETOR_BLNSETOR'] ?>/<?php echo $list['TBLSETOR_TGLSETOR'] ?></div> </td> <!-- BUKTI SETOR TGL. KE -->
        <td><div align="center"><?php echo $list['TBLREKENING_NAMAREKENING'] ?></div> </td> <!-- REKENING -->
        <td><div align="center"><?php echo $list['TBLSETOR_REKPENDAPATAN'] ?>.<?php echo $list['TBLSETOR_REKPAD'] ?>.<?php echo $list['TBLSETOR_REKPAJAK'] ?>.<?php echo $list['TBLSETOR_REKAYAT'] ?>.<?php echo $list['TBLSETOR_REKJENIS'] ?><br><?php echo LokalIndonesia::ribuan($list['TBLSETOR_RUPIAHSETOR']) ?></div> </td> <!-- SETORAN -->
    </tr>
<?php endforeach ?>
</tbody>
</table>
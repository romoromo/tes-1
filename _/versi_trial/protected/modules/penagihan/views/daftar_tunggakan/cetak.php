<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
<thead>
<tr>
    <th colspan="18" style="text-align-last:left;">
        BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH KOTA YOGYAKARTA <br>
         LAPORAN TUNGGAKAN <?php echo $data ['judul'] ?><br>
         TAHUN PAJAK <?php echo $masapajak = $_REQUEST['masapajak'] ?><br>
         PER: <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?>
    </th>
</tr>
<thead>
<tr>
    <th>
        NO
    </th>
    <th>
        NAMA
    </th>
    <th>
        NPWPD
    </th>
    <th>
        ALAMAT
    </th>
    <th>
        JAN
    </th>
    <th>
        FEB
    </th>
    <th>
        MAR
    </th>
    <th>
        APR
    </th>
    <th>
        MEI
    </th>
    <th>
        JUN
    </th>
    <th>
        JUL
    </th>
    <th>
        AGU
    </th>
    <th>
        SEP
    </th>
    <th>
        OKT
    </th>
    <th>
        NOV
    </th>
    <th>
        DES
    </th>
    <th>
        JUMLAH
    </th>
    <th>
        SKPD
    </th>
</tr>
</thead>
<tbody style="text-align: center;">
<?php $no=1; foreach ($data['tunggakan'] as $list) :?>
<tr>
    <td>
        <?php echo $no++; ?> <!-- NO -->
    </td>
    <td>
        <?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?> <!-- NAMA -->
    </td>
    <td>
        <?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo $list['TBLDAFTAR_NOPOK'] ?>.<?php echo $list['TBLKECAMATAN_IDBADANUSAHA'] ?>.<?php echo $list['TBLKELURAHAN_IDBADANUSAHA'] ?> <!-- NPWPD -->
    </td>
    <td>
        <?php echo $list['TBLDAFTAR_BADANUSAHAALAMAT'] ?> <!-- ALAMAT -->
    </td>
    <td>
        <?php echo LokalIndonesia::ribuan($list['TUNGAKAN_JANUARI']) ?> <!-- JANUARI -->
    </td>
    <td>
        <?php echo LokalIndonesia::ribuan($list['TUNGAKAN_FEBRUARI']) ?>
    </td>
    <td>
        <?php echo LokalIndonesia::ribuan($list['TUNGAKAN_MARET']) ?>
    </td>
    <td>
        <?php echo LokalIndonesia::ribuan($list['TUNGAKAN_APRIL']) ?>
    </td>
    <td>
        <?php echo LokalIndonesia::ribuan($list['TUNGAKAN_MEI']) ?>
    </td>
    <td>
        <?php echo LokalIndonesia::ribuan($list['TUNGAKAN_JUNI']) ?>
    </td>
    <td>
        <?php echo LokalIndonesia::ribuan($list['TUNGAKAN_JULI']) ?>
    </td>
    <td>
        <?php echo LokalIndonesia::ribuan($list['TUNGAKAN_AGUSTUS']) ?>
    </td>
    <td>
        <?php echo LokalIndonesia::ribuan($list['TUNGAKAN_SEPTEMBER']) ?>
    </td>
    <td>
        <?php echo LokalIndonesia::ribuan($list['TUNGAKAN_OKTOBER']) ?>
    </td>
    <td>
        <?php echo LokalIndonesia::ribuan($list['TUNGAKAN_NOVEMBER']) ?>
    </td>
    <td>
        <?php echo LokalIndonesia::ribuan($list['TUNGAKAN_DESEMBER']) ?>
    </td>
    <td>
        <?php echo LokalIndonesia::ribuan($list['JUMLAH_TUNGGAKAN']) ?>
    </td>
    <td>
        <?php echo $list['JUMLAH_SKPD'] ?>
    </td>
</tr>
<?php endforeach ?>
</tbody>
</table>
<br>
<br>
<br>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" cellpadding="5" border="0">
<thead>
<tr>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
        Yogyakarta, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?>
    </th>
    <th>
    </th>
</tr>
<thead>
<tr>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th colspan="1">
       <?php echo $data['jab1']['TBLPEJABAT_URAIAN'] ?>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
        <?php echo $data['jab2']['TBLPEJABAT_URAIAN'] ?>
    </th>
    <th>
    </th>
</tr>
</thead>
<tbody style="text-align: center;">
<tr>
    <td>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
        <?php echo $data['jab1']['TBLPEJABAT_NAMA'] ?><br>
         NIP. <?php echo $data['jab1']['TBLPEJABAT_NIP'] ?>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
        <?php echo $data['jab2']['TBLPEJABAT_NAMA'] ?><br>
         NIP. <?php echo $data['jab2']['TBLPEJABAT_NIP'] ?>
    </td>
    <td>
    </td>
</tr>
</tbody>
</table>
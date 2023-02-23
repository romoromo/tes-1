<body style="padding:5%;">
    <header>
        <p style="text-align-last:left;"><strong>BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH</strong><br>
            <strong>KOTA YOGYAKARTA</strong><br>
            <strong>SEKSI PENAGIHAN DAN KEBERATAN</strong>
        </p>
        <p style="text-align:center;"><strong>LAPORAN TUNGGAKAN PAJAK REKLAME BULAN <?php echo LokalIndonesia::getBulan($TBLPENDATAAN_BLNPAJAK=$_REQUEST['TBLPENDATAAN_BLNPAJAK']) ?> TAHUN <?php echo $TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'] ?> <br> PER : </strong>
        </p>
    </header><br>
    <table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" cellpadding="0" cellspacing="0" border="1">
      <tr>
        <th >NO</th>
        <th >WAJIB PAJAK</th>
        <th >ALAMAT</th>
        <th >KETERANGAN</th>
        <th colspan="4">NPWP</th>
        <th >TAHUN</th>
        <th >LOKASI</th>
        <th >REK</th>
        <th >NO SKPD</th>
        <th >BPT</th>
        <th >KETETAPAN</th>
        <th >PEMASANGAN</th>
    </tr>
</thead>
<tbody style="text-align: center;">
    <?php $totalpajak = 0; ?>
    <?php $no=1; foreach ($data['cetak'] as $row): ?>
    <?php $totalpajak = $totalpajak+$row['TBLDAFTREKLAME_PAJAK'] ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['TBLDAFTAR_BADANUSAHANAMA'] ?></td> <!-- WP -->
        <td><?php echo $row['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td> <!-- ALAMAT -->
        <td><?php echo $row['TBLDAFTREKLAME_KETERANGAN1'] ?></td> <!-- KETERANGAN -->
        <td><?php echo $row['TBLDAFTAR_GOLONGAN'] ?></td> <!-- GOL -->
        <td><?php echo $row['TBLDAFTAR_NOPOK'] ?></td> <!-- NOPOK -->
        <td><?php echo $row['TBLKECAMATAN_ID'] ?></td> 
        <td><?php echo $row['TBLKELURAHAN_ID'] ?></td>
        <td><?php echo $row['TBLPENDATAAN_THNPAJAK'] ?></td> <!-- TH -->
        <td><?php echo $row['TBLPENDATAAN_PAJAKKE'] ?></td> <!-- Lok -->
        <td><?php echo $row['TBLDAFTREKLAME_REKJENIS'] ?></td> <!-- Rek -->
        <td><?php echo $row['TBLDAFTREKLAME_NOMORSKPD'] ?></td> <!-- No SKPD -->
        <td><?php echo $row['TBLDAFTREKLAME_TGLBATASSKPD'] ?>/<?php echo LokalIndonesia::getBulan($row['TBLDAFTREKLAME_BLNBATASSKPD']) ?>/<?php echo $row['TBLDAFTREKLAME_THNBATASSKPD'] + 2000?></td> <!-- BPT -->
        <td><?php echo LokalIndonesia::ribuan($row['TBLDAFTREKLAME_PAJAK']) ?></td> <!-- KETETAPAN -->
        <td><?php echo $row['TBLDAFTREKLAME_NAMAJALAN'] ?></td> <!-- PEMASANGAN -->
    </tr>
<?php endforeach ?>
<tr>
    <td colspan="13"> JUMLAH:</td>
    <td align="center"> <?php echo LokalIndonesia::ribuan($totalpajak) ?></td>
    <td></td>
</tr>
</tbody>
</table>
<br>
<br>
<br>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" cellpadding="0" border="0">
    <thead>
        <tr>
            <td width="15%"> Total Tunggakan </td>
            <td width="2%">:</td>
            <td><?php  $no++; ?></td>
        </tr>
        <tr>
            <td width="15%"> Total SKPD  </td>
            <td width="2%">:</td>
            <td>Rp. <?php echo LokalIndonesia::ribuan($totalpajak) ?></td>
        </tr>
    </thead>
</table>

<br>
<br>
<br>
<br>
<br>

<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" cellpadding="0" border="0">
    <thead>
        <tr>
            <td align="center">Kepala Seksi Penagihan dan Keberatan</td>
            <td align="center">Yogyakarta, <?php echo date('d-m-Y') ?> <br> Pemegang Buku Kendali</td>
        </tr>
    </thead>
    <tbody>
     <tr>
    <td style="color: white" class="style3">.</td>
    <td style="color: white" class="style3">.</td>
  </tr>
  <tr>
    <td style="color: white" class="style3">.</td>
    <td style="color: white" class="style3">.</td>
  </tr>
  <tr>
    <td style="color: white" class="style3">.</td>
    <td style="color: white" class="style3">.</td>
  </tr>
        <tr>
            <td align="center">E. IRAWATI. SIP<br>
NIP. 19591128 198003 2 003 </td>
            <td align="center">MEYRINA NUR IVADA<br>
NIP. 198405142009022011</td>
        </tr>
    </tbody>
</table>
</body>
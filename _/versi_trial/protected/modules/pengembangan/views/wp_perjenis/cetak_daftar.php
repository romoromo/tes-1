  <table width="100%">
    <tr>
      
      <td align="center" colspan= "12" width="100%">
       DAFTAR WAJIB <?php echo $data['jenis']?>
     </td>
  </tr>
</table>
	<br>

<?php if ($data['bphtb']== 1):?>
<table id="dt_pipeline"  border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover smart-form" width="100%" >
  <thead>
    <tr>
        <th class="col-md-1"> No</th>
        <th class="col-md-3"> NPWPD</th>
        <th class="col-md-3"> Kode Kecamatan</th>
        <th class="col-md-3"> Kode Kelurahan</th>
        <th class="col-md-3"> NIK</th>
        <th class="col-md-4"> Nama</th>
        <th class="col-md-5"> Alamat</th>
        <th class="col-md-5"> Kota</th>
        <!-- <th class="col-md-3"> Nama Pemilik/Pengelola</th> -->
        <th class="col-md-3"> Alamat Objek</th>
        <th class="col-md-3"> RT/RW</th>
        <th class="col-md-3"> Kota</th>
        <!-- <th class="col-md-3"> Data Izin Usaha</th> -->
        <!-- <th class="col-md-3"> No. Telp Usaha</th> -->
        <!-- <th class="col-md-3"> No. Telp Pemilik</th> -->
        <!-- <th class="col-md-3"> Alamat Email</div></th> -->
    </tr>
  </thead>
  <tbody>
  <?php $no = 1; foreach ($data['cetak'] as $rowtap): ?>
    <tr>
      <td align="center"><?= $no++; ?></td>
      <td align="center"><?= $rowtap['TBLDAFTAR_JENISPENDAPATAN'] ?>.<?= $rowtap['TBLDAFTAR_GOLONGAN'] ?>.<?= sprintf("%07d",$rowtap['TBLDAFTAR_NOPOK']) ?>.<?= sprintf("%02d",$rowtap['TBLKECAMATAN_IDBADANUSAHA']) ?>.<?= sprintf("%02d",$rowtap['TBLKELURAHAN_IDBADANUSAHA']) ?></td> <!-- N.P.W.P.D --> <!-- TBLKECAMATAN_IDBADANUSAHA Dan TBLKELURAHAN_IDBADANUSAHA -->
      <td align="center"><?= sprintf("%02d",$rowtap['TBLKECAMATAN_IDBADANUSAHA']) ?></td>
      <td align="center"><?= sprintf("%02d",$rowtap['TBLKELURAHAN_IDBADANUSAHA']) ?></td>
      <td align="left"><?= $rowtap['TBLDAFTAR_NIK'] ?></td> <!-- NIK -->
      <td align="left"><?= $rowtap['TBLDAFTAR_PEMILIKNAMA'] ?></td> <!-- NAMA -->
      <td align="left"><?= $rowtap['TBLDAFTAR_PEMILIKALAMAT'] ?></td> <!-- ALAMAT -->
      <td align="left"><?= $rowtap['TBLDAFTAR_PEMILIKKOTA'] ?></td> <!-- KOTA -->
      <td align="left"><?= $rowtap['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td> <!-- alamat objek -->
      <td align="left"><?= $rowtap['TBLDAFTAR_BADANUSAHARTRW'] ?></td> <!-- rt/rw -->
      <td align="left"><?= $rowtap['TBLDAFTAR_BADANUSAHAKOTA'] ?></td> <!-- kota -->
    </tr>
  <?php endforeach ?>
  </tbody>
</table><br><br>
<?php elseif ($data['bphtb']== 0): ?>
  <table id="dt_pipeline"  border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover smart-form" width="100%" >
  <thead>
    <tr>
        <th class="col-md-1"> No</th>
        <th class="col-md-3"> NPWPD</th>
        <th class="col-md-3"> Kode Kecamatan</th>
        <th class="col-md-3"> Kode Kelurahan</th>
        <th class="col-md-4"> Nama Objek Pajak</th>
        <th class="col-md-5"> Alamat Objek Pajak</th>
        <th class="col-md-5"> NIK</th>
        <th class="col-md-3"> Nama Pemilik/Pengelola</th>
        <th class="col-md-3"> Alamat Pemilik/Pengelola</th>
        <th class="col-md-3"> Data Izin Usaha</th>
        <th class="col-md-3"> No. Telp Usaha</th>
        <th class="col-md-3"> No. Telp Pemilik</th>
        <th class="col-md-3"> Alamat Email</div></th>
    </tr>
  </thead>
  <tbody>
  <?php $no = 1; foreach ($data['cetak'] as $rowtap): ?>
    <tr>
      <td align="center"><?= $no++; ?></td>
      <td align="center"><?= $rowtap['TBLDAFTAR_JENISPENDAPATAN'] ?>.<?= $rowtap['TBLDAFTAR_GOLONGAN'] ?>.<?= sprintf("%07d",$rowtap['TBLDAFTAR_NOPOK']) ?>.<?= sprintf("%02d",$rowtap['TBLKECAMATAN_IDBADANUSAHA']) ?>.<?= sprintf("%02d",$rowtap['TBLKELURAHAN_IDBADANUSAHA']) ?></td> <!-- N.P.W.P.D --> <!-- TBLKECAMATAN_IDBADANUSAHA Dan TBLKELURAHAN_IDBADANUSAHA -->
      <td align="center"><?= sprintf("%02d",$rowtap['TBLKECAMATAN_IDBADANUSAHA']) ?></td>
      <td align="center"><?= sprintf("%02d",$rowtap['TBLKELURAHAN_IDBADANUSAHA']) ?></td>
      <td align="left"><?= $rowtap['TBLDAFTAR_BADANUSAHANAMA'] ?></td> <!-- NAMA -->
      <td align="left"><?= $rowtap['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td> <!-- ALAMAT -->
      <td align="left"><?= $rowtap['TBLDAFTAR_NIK'] ?></td> <!-- NIK -->
      <td align="left"><?= $rowtap['TBLDAFTAR_PEMILIKNAMA'] ?></td>
      <td align="left"><?= $rowtap['TBLDAFTAR_PEMILIKALAMAT'] ?></td>
      <td align="left"><?= $rowtap['TBLDAFTAR_NIB'] ?></td>
      <td align="left"><?= $rowtap['TBLDAFTAR_BADANUSAHATELP'] ?></td>
      <td align="left"><?= $rowtap['TBLDAFTAR_PEMILIKTELP'] ?></td>
      <td align="left"><?= $rowtap['TBLDAFTAR_EMAIL'] ?></td> <!-- EMAIL -->
    </tr>
  <?php endforeach ?>
  </tbody>
</table><br><br>
<?php endif; ?>



<table id="dt_pipeline"  border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover smart-form" width="100%" >
  <thead>
    <tr>
      <td colspan="5"> MENGETAHUI</td>
      <td> TANGGAL:<?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
    </tr>
    <tr>
      <td colspan="5"><?php echo $data['jab3']['TBLPEJABAT_URAIAN']; ?></td>
      <td><font>PETUGAS:</font></td>
    </tr>
    <tr>
      <td><font color="white">****</font></td>
    </tr>
    <tr>
      <td><font color="white">****</font></td>
    </tr>
    <tr>
      <td><font color="white">****</font></td>
    </tr>
</thead>
<tbody>
  <tr>
    <td colspan="5"><?php echo $data['jab3']['TBLPEJABAT_NAMA']; ?></td>
  </tr>
  <tr>
    <td colspan="5">-------------------------------------</td>
    <td>-------------------------------------------------</td>
  </tr>
  <tr>
    <td colspan="5">NIP. <?php echo $data['jab3']['TBLPEJABAT_NIP']; ?></td>
  </tr>
</tbody>


</table>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_pipeline');
	});
</script>
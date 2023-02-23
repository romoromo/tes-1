  <table width="100%" border="0">
    <tr>
      <td width="34%">
        BADAN PENGELOLAAN KEUANGAN DAN
        <br>
        ASET DAERAH
      </td>
      <td width="33%">
       DAFTAR INDUK WAJIB PAJAK 
     </td>
  </tr>
</table>
    <br><br>
<table width="100%" border="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
  <thead>  
    <tr>
      <th class="col-md-1">No</th>
      <th class="col-md-3">NPWPD</th>
      <th class="col-md-4">NAMA</th>
      <th class="col-md-5">ALAMAT</th>
      <th class="col-md-3">BBU</th>
    </tr>
    <th class="col-md-1">=====</th>
    <th class="col-md-3">=====================</th>
    <th class="col-md-4">=====================</th>
    <th class="col-md-5">=====================</th>
    <th class="col-md-2">======</th>
    <tr>
  </thead>
  <tbody>
  <?php $no = 1; foreach ($data['cetak'] as $rowtap): ?>
      <tr>
        <td align="center"><?= $no++ ?></td>
       <td align="center"><?= $rowtap['TBLDAFTAR_JENISPENDAPATAN'] ?>.<?= $rowtap['TBLDAFTAR_GOLONGAN'] ?>.<?= $rowtap['TBLDAFTAR_NOPOK'] ?></td> <!-- N.P.W.P.D --> <!-- TBLKECAMATAN_IDBADANUSAHA Dan TBLKELURAHAN_IDBADANUSAHA -->
      <td align="center"><?= $rowtap['TBLDAFTAR_BADANUSAHANAMA'] ?></td> <!-- NAMA -->
      <td align="center"><?= $rowtap['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td> <!-- ALAMAT -->
      <td align="center"><?= $rowtap['REFBADANUSAHA_IDBADANUSAHA'] ?></td> <!-- BBU -->
      </tr>
  <?php endforeach ?>
  </tbody>
</table>
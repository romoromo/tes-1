  <table width="100%">
    <tr>
      <td width="34%">
        DINAS PAJAK DAERAH DAN 
        PENGELOLAAN KEUANGAN DAERAH
      </td>
      <td width="33%">
       DAFTAR INDUK WAJIB PAJAK 
     </td>
     <td width="10%">
      HALAMAN 1
    </td>
  </tr>
  <tr>
    <td></td>   
  </tr>
</table>
<table width="100%"  class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
  <thead>  
    <tr>
      <th class="col-md-1">No</th>
      <th class="col-md-3">NPWPD</th>
      <th class="col-md-4">NAMA</th>
      <th class="col-md-5">ALAMAT</th>
      <th class="col-md-3">BBD</th>
    </tr>
    <th class="col-md-1">========================</th>
    <th class="col-md-3">========================</th>
    <th class="col-md-4">========================</th>
    <th class="col-md-5">========================</th>
    <th class="col-md-2">========================</th>
    <tr>
  </thead>
  <tbody>
  <?php $no = 1; foreach ($data['cetak'] as $row): ?>
      <tr>
        <td align="center"><?= $no++ ?>.</td>
        <td align="center"><?= $row['TBLDAFTAR_NOPOK'] ?></td>
        <td align="center"><?= $row['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
        <td align="center"><?= $row['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td>
        <td align="center"><?= $row['REFBADANUSAHA_IDBADANUSAHA'] ?></td>
      </tr>
  <?php endforeach ?>
  </tbody>
</table>
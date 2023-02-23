<button class="btn btn-sm btn-default" onclick="cetak('html')">
  <i class="fa fa-print"></i> Cetak Html
</button>

<button class="btn btn-sm btn-primary" onclick="cetak('word')">
  <i class="fa fa-book"></i> Cetak Word
</button>

<button class="btn btn-sm btn-success" onclick="cetak('excel')">
  <i class="fa fa-table"></i> Cetak Excel
</button>
<br>
<br>
<table class="table table-striped table-bordered table-hover" width="100%" style="overflow:  auto; display: /*max-width:100%; max-height:500px;*/">
  <thead>                   
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Nama Perusahaan</th>
      <th>Jenis Izin</th>
      <th>Jenis Permohonan</th>
      <th>Keterangan</th>
    </tr>
  </thead>
  <tbody>
  <?php $no=1; foreach ($data['data'] as $row): ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $row['tblizinpendaftaran_namapemohon'] ?></td>
      <td><?php echo $row['tblizinpendaftaran_lokasiizin'] ?></td>
      <td><?php echo $row['tblizinpendaftaran_usaha'] ?></td>
      <th><?php echo $row['tblizin_nama'] ?></th>
      <th><?php echo $row['tblizinpermohonan_nama'] ?></th>
      <td><?php echo $row['tblizinpendaftaran_keterangan'] ?></td>
    </tr>
  <?php endforeach ?>
  </tbody>
</table>
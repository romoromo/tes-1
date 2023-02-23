<table border="1" cellspacing="1" cellpadding="1" width="100%" style="border-collapse:collapse;">
  <thead style="font-size:14px;">                   
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
  <tbody style="font-size:13px;">
  <?php $no=1; foreach ($data['data'] as $row): ?>
    <tr>
      <td align="center"><?php echo $no++; ?></td>
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
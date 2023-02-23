<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
    <thead>
      <tr>
        <td width="5%"><div align="center">No</div></td>
        <td width="22%"><div align="center">Klasifikasi</div></td>
        <td width="12%"><div align="center">Tarif</div></td>
        <td width="12%"><div align="center">Jumlah Tersedia</div></td>
        <td width="12%"><div align="center">Terjual</div></td>
        <td width="12%"><div align="center">Occupancy </div></td>
        <td width="12%"><div align="center">Aksi </div></td>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($data['tabel'] as $key): ?>
        <tr>
            <td><?php echo $key['ID_KLASIFIKASI_KMR']; ?></td>
            <td><?php echo $key['KLASIFIKASI_KMR']; ?></td>
            <td><?php echo LokalIndonesia::rupiah($key['TARIF_KMR']); ?></td>
            <td><?php echo $key['JUMLAH_TERSEDIA']; ?></td>
            <td><?php echo $key['JUMLAH_TERJUAL']; ?></td>
            <td><?php echo $key['OCCUPANCY']; ?></td>
            <td align="center">
                <a rel="tooltip" data-placement="left" data-original-title="Klik untuk mengedit data" onclick="editdatahotel('<?php echo $key['TBLMONITORING_HOTEL_ID']; ?>')" class="btn btn-circle btn-primary"><i class="fa fa-pencil"></i></a>&nbsp;<a rel="tooltip" data-placement="left" data-original-title="Klik untuk menghapus data" onclick="hapusdatahotel('<?php echo $key['TBLMONITORING_HOTEL_ID']; ?>')" class="btn btn-circle btn-danger"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function () {
        reloadDT('dt_basic');
    });
</script>
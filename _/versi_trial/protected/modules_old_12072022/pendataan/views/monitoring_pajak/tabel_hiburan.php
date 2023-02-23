<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
    <thead>
      <tr>
        <td width="5%"><div align="center">No</div></td>
        <td width="22%"><div align="center">Klasifikasi</div></td>
        <td width="12%"><div align="center">Jumlah</div></td>
        <td width="12%"><div align="center">Tarif</div></td>
        <td width="12%"><div align="center">Keterangan </div></td>
        <td width="12%"><div align="center">Aksi </div></td>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($data['tabel'] as $key): ?>
        <tr>
            <td><?php echo $key['ID_KLASIFIKASI_KMR']; ?></td>
            <td><?php echo $key['KLASIFIKASI_KMR']; ?></td>
            <td><?php echo $key['JML_KMR']; ?></td>
            <td><?php echo LokalIndonesia::rupiah($key['TARIF_KMR']); ?></td>
            <td><?php echo $key['KETERANGAN']; ?></td>
            <td align="center">
                <a rel="tooltip" data-placement="left" data-original-title="Klik untuk mengedit data" onclick="editdatahiburan('<?php echo $key['TBLMONITORING_HIBURAN_ID']; ?>')" class="btn btn-circle btn-primary"><i class="fa fa-pencil"></i></a>&nbsp;<a rel="tooltip" data-placement="left" data-original-title="Klik untuk menghapus data" onclick="hapusdatahiburan('<?php echo $key['TBLMONITORING_HIBURAN_ID']; ?>')" class="btn btn-circle btn-danger"><i class="fa fa-trash-o"></i></a>
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
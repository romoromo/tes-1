<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
    <thead>
      <tr>
        <td width="5%"><div align="center">No</div></td>
        <td width="22%"><div align="center">Uraian Tiket</div></td>
        <td width="12%"><div align="center">Kode Tiket</div></td>
        <td width="12%"><div align="center">Nilai Lembar</div></td>
        <td width="12%"><div align="center">Jumlah Lembar </div></td>
        <td width="12%"><div align="center">Aksi </div></td>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($data['tabel'] as $key): ?>
        <tr>
            <td><?php echo $key['NO_URUT']; ?></td>
            <td><?php echo $key['URAIAN']; ?></td>
            <td><?php echo $key['TIKET_KODE']; ?></td>
            <td><?php echo $key['TIKET_NILAI']; ?></td>
            <td><?php echo $key['JML_LEMBAR']; ?></td>
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
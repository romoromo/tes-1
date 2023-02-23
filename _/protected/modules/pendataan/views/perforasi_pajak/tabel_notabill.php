<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
    <thead>
      <tr>
        <td width="5%"><div align="center">No</div></td>
        <td width="22%"><div align="center">Nama Usaha</div></td>
        <td width="12%"><div align="center">No Nota</div></td>
        <td width="12%"><div align="center">Jumlah Buku/Blok</div></td>
        <td width="12%"><div align="center">Isi Per Buku/Blok</div></td>
        <td width="12%"><div align="center">Jumlah Lembar </div></td>
        <td width="12%"><div align="center">Aksi </div></td>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($data['tabel'] as $key): ?>
        <tr>
            <td><?php echo $key['NO_URUT']; ?></td>
            <td><?php echo $key['BNAMA']; ?></td>
            <td><?php echo $key['NOPERFORASI']; ?></td>
            <td><?php echo $key['JML_BUKU']; ?></td>
            <td><?php echo $key['ISI_PERBUKU']; ?></td>
            <td><?php echo $key['JML_LEMBAR']; ?></td>
            <td align="center">
                <a rel="tooltip" data-placement="left" data-original-title="Klik untuk mengedit data" onclick="editdatanotabill('<?php echo $key['TBLPERFORASI_ID']; ?>')" class="btn btn-circle btn-primary"><i class="fa fa-pencil"></i></a>&nbsp;<a rel="tooltip" data-placement="left" data-original-title="Klik untuk menghapus data" onclick="hapusdatanotabill('<?php echo $key['TBLPERFORASI_ID']; ?>')" class="btn btn-circle btn-danger"><i class="fa fa-trash-o"></i></a>
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
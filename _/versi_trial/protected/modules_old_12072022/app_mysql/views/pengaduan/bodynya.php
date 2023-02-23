<?php $i=1; ?>
	<?php foreach ($tabel as $bodynya): ?>
	<tr>
        <td><?php echo $i++ ?></td>
	    <td><?php echo $bodynya['tblpengaduan_nama'] ?></td>
	    <td><?php echo $bodynya['tblkomentar_nama'] ?></td>
	    <td><?php
			switch ($bodynya['refgroupphonebook_isaktif']) {
				case 'T':
					$label = '<label class="label label-success">Aktif</label>';
					break;
				case 'F':
					$label = '<label class="label label-danger">Tidak Aktif</label>';
					break;

				default:
					$label =  "-";
					break;
			}
			echo $label;
			?>
		</td>
	    <td><button onclick="edit(<?php echo $bodynya['tblpengaduan_id'] ?>)" data-toggle="modal" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>&nbsp; Edit </button>
        <button onclick="hapus(<?php echo $bodynya['tblpengaduan_id'] ?>)" type='button' class='btn btn-danger btn-sm' > <i class="fa fa-trash-o"></i>&nbsp; Hapus </button></td>
	</tr>
<?php endforeach; ?>
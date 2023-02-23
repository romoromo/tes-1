<table border="1" class="table table-bordered">
	<thead>
	<tr>
		<?php foreach ($data['laporan'] as $row): ?>
		<th></th>
		<?php foreach ($row as $kolom => $value): ?>
		<th><?= $kolom ?></th>
		<?php endforeach ?>
		<?php break; endforeach ?>
	</tr>
	</thead>
	<tbody>
		<?php foreach ($data['laporan'] as $row): ?>
		<tr>
			<td>
				<button class="btn btn-warning btn-block" onclick="edit('<?= base64_encode($data['namaTBL']) ?>', '<?= base64_encode($row['NOPOK']) ?>', '<?= base64_encode((int)$row['TBLPENDATAAN_PAJAKKE']) ?>', '<?= base64_encode($row['TBLPENDATAAN_THNPAJAK']) ?>', '<?= base64_encode($row['NOMORSKP']) ?>')"><i class="fa fa-pencil"></i> Edit</button>
				<button class="btn btn-danger btn-block" onclick="batal('<?= base64_encode($data['namaTBL']) ?>', '<?= base64_encode($row['NOPOK']) ?>', '<?= base64_encode((int)$row['TBLPENDATAAN_PAJAKKE']) ?>', '<?= base64_encode($row['TBLPENDATAAN_THNPAJAK']) ?>', '<?= base64_encode($row['NOMORSKP']) ?>')"><i class="fa fa-times"></i> Pembatalan</button>
			</td>
			<?php foreach ($row as $kolom => $value): ?>
			<td><?= $row[$kolom] ?></td>
			<?php endforeach ?>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
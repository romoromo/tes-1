<?php foreach ($DataAlur as $alur): ?>
	<tr>
		<td><?php echo $alur['tblkendalialur_urut']; ?></td>
		<td><?php echo $alur['tblkendalibloksistem_nama']; ?></td>
		<td><?php echo $alur['tblkendalialur_jmlharibataswaktu']; ?> hari</td>
		<td><?php echo $alur['tblkendalialur_jmljambataswaktu']; ?> jam</td>
		<td>
			<button onclick="HapusAlur(<?php echo $alur['tblkendalialur_id']; ?>)" type="button" class="btn btn-labeled btn-danger btn-sm">
				<span class='btn-label'><i class='fa fa-trash-o'></i></span>Hapus
			</button>
			<?php 
				if($alur['tblkendalialur_isaktif']=='F') {
					$stat = 'T'; $btn = "btn-success"; $text = "Aktifkan";
				} else {
					$stat = 'F'; $btn = "btn-warning"; $text = "Non Aktifkan";
				}
			?>
			<button onclick="GantiStatus(<?php echo $alur['tblkendalialur_id'].','.$stat; ?>)" type="button" class="btn btn-labeled <?php echo $btn; ?> btn-sm">
				<span class='btn-label'><i class='fa fa-trash-o'></i></span><?php echo $text; ?>
			</button>
		</td>
	</tr>
<?php endforeach ?>
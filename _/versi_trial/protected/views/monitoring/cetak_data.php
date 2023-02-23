<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body onload="window.print()">
		<center>
			<h3>Data Pendapatan Daerah Tahun <?php echo $tahun; ?></h3>
		</center>
		<center>
		<table width="70%" border="1" style="border-collapse: collapse;">
			<thead>
				<tr style="padding: 10px;">
					<th width="15"> No</th>
					<th data-hide="phone"><div class="center"> Bidang Usaha</div></th>
					<th data-hide="phone"><div class="center"> Jumlah</div></th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($data['realisasi_perrekening'] as $list_realisasi_perrekening): ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $list_realisasi_perrekening['NM_REKENING']; ?></td>
					<td><?php echo LokalIndonesia::rupiah($list_realisasi_perrekening['rupiahsetor']); ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		</center>
	</body>
</html>
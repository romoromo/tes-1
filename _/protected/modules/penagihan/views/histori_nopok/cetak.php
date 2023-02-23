<style type="text/css">
	.font {
		font-family: monospace;
		"

	}

	.table-bordered {
		border: 1px solid #000000;
	}

	.table {
		width: 100%;
	}

	table {
		border-collapse: collapse;
	}
</style>
<!-- KEPALA CETAK-->
<table width="100%" class="font">
	<tr>
		<td colspan="2" style="width: 50%">BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH</td>
		<td colspan="6" style="width: 50%">
			<!-- <center>
				DAFTAR HISTORI <?php //echo $data['namarek']; ?>
			</center> -->
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<table>
				
			</table>
		</td>
	</tr>
</table>
<br>
<!--END KEPALA CETAK-->

<!---BODY CETAK-->
<table width="100%" class="font table table-bordered" border="1">
	<thead>
		<tr>
			<th data-hide="phone">
				<div class="center"> NO</div>
			</th>
			<th data-hide="phone">
				<div class="center"> TANGGAL</div>
			</th>
			<th data-hide="phone">
				<div class="center"> KEGIATAN</div>
			</th>
			<th data-hide="phone">
				<div class="center"> JENIS KETETAPAN</div>
			</th>
			<th data-hide="phone">
				<div class="center"> NOMOR SK</div>
			</th>
			<th data-hide="phone">
				<div class="center"> MASA PAJAK</div>
			</th>
			<th data-hide="phone">
				<div class="center"> JUMLAH PIUTANG</div>
			</th>
			<th data-hide="phone">
				<div class="center"> NAMA WP</div>
			</th>
			<th data-hide="phone">
				<div class="center"> HASIL</div>
			</th>
			<th data-hide="phone">
				<div class="center"> REALISASI</div>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php $total = 0; ?>
		<?php $no = 1;
		foreach ($data['hasil'] as $list) : ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= date('d-m-Y', strtotime($row['TGL'])); ?></td>
				<td><?= $row['KEG']; ?></td>
				<td><?= $row['JEN']; ?></td>
				<td><?= $row['NOSK']; ?></td>
				<td><?= LokalIndonesia::getbulan($row['BLNAKHIR']); ?> 20<?= $row['THN']; ?> </td>
				<td><?= LokalIndonesia::ribuan($row['PIUTANG']); ?></td>
				<td>-</td>
				<td>-</td>
				<td><?= LokalIndonesia::ribuan($row['REALISASI']); ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<!---END BODY CETAK-->

<br><br>
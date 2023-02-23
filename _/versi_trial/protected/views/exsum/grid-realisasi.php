<?php 
	$tahun = isset($_REQUEST['tahun']) && !empty($_REQUEST['tahun']) ? (int)$_REQUEST['tahun'] : date('Y');
	$data_dash_bulan_rek = Yii::app()->db->createCommand('SELECT * FROM DASK_GRID_BULAN_INI')->queryAll();
	$data_dash_hari_rek = Yii::app()->db->createCommand('SELECT * FROM DASK_GRID_TANGGAL_INI')->queryAll();
	// $data_grafik_batang_realisasi = Yii::app()->db->createCommand('CALL PROC_DASHBOARD_REALISASI('.$tahun.')')->queryRow();

 ?>
<div id="div-dash-per-bulan-rek">
	<h3 align="center">Realisasi Pendapatan Per Bulan Tahun <?= date('Y') ?></h3>
	<table class="table table-bordered">
		<thead>
			<th>Pajak</th>
			<th>Bulan Lalu</th>
			<th>Bulan Ini</th>
			<th>s/d Bulan Ini</th>
		</thead>
		<tbody>
			<?php foreach ($data_dash_bulan_rek as $row): ?>
			<tr>
			<td><?php echo $row['PAJAK'] ?></td>
			<td><div align="right"><?php echo LokalIndonesia::ribuan($row['BULAN_LALU']) ?></div></td>
			<td><div align="right"><?php echo LokalIndonesia::ribuan($row['BULAN_INI']) ?></div></td>
			<td><div align="right"><?php echo LokalIndonesia::ribuan($row['SD_BULAN_INI']) ?></div></td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
<br>
<div id="div-dash-per-hari-rek">
	<h3 align="center">Realisasi Pendapatan Harian Bulan <?= LokalIndonesia::getBulan(date('m')) ?></h3>
	<table class="table table-bordered">
		<thead>
			<th>Pajak</th>
			<th>Hari Lalu</th>
			<th>Hari Ini</th>
			<th>s/d Hari Ini</th>
		</thead>
		<tbody>
			<?php foreach ($data_dash_hari_rek as $row): ?>
			<tr>
			<td><?php echo $row['PAJAK'] ?></td>
			<td><div align="right"><?php echo LokalIndonesia::ribuan($row['HARI_LALU']) ?></div></td>
			<td><div align="right"><?php echo LokalIndonesia::ribuan($row['HARI_INI']) ?></div></td>
			<td><div align="right"><?php echo LokalIndonesia::ribuan($row['SD_HARI_INI']) ?></div></td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>

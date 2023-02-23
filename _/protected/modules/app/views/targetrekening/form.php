<?php Yii::import('ext.LokalIndonesia'); ?>
<div align="center">
	<h3>Target Pajak Tahun <?= $data['tahun'] ?></h3>
</div>
<table id="dt_basic" class="table table-striped table-bordered" width="100%" style="border-collapse:collapse;" cellpadding="2" cellspacing="2">
	<thead>
		<tr>
			<th data-hide="phone">No</th>
			<th data-hide="phone, tablet">Rekening</th>
			<th data-hide="phone">Target (Rp)</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = 1; foreach ($data['list'] as $row): ?>
		<tr>
			<td><?= $no++ ?></td>
			<td>[<?= $row['TBLMASTERREKENING_KODE'] ?>] <?= $row['TBLMASTERREKENING_NAMA'] ?></td>
			<td>
			<div align="right">
			<?php 
			$dt = TargetPajak::model()->find('TBLMASTERREKENING_KODE=:kode AND REFTARGETPAJAK_TAHUN=:tahun', array(':kode'=>$row['TBLMASTERREKENING_KODE'], ':tahun'=>$data['tahun'])); ?>
			<a href="#" data-koderek="<?= $row['TBLMASTERREKENING_KODE'] ?>" data-tahun="<?= $data['tahun'] ?>" id="NOMINAL" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $dt ? $dt['REFTARGETPAJAK_ID'] : 0 ?>" data-original-title="Nominal" class="input-x-edit-uang">
			<?php echo $dt ? LokalIndonesia::ribuan($dt['REFTARGETPAJAK_NOMINAL']) : 0; ?>
			</a>
			</div>
			 </td>
		</tr>
	<?php endforeach ?>
	<?php $data['rekpbb'] = array(
		array(
			'TBLMASTERREKENING_KODE'=>'4111101'
			,'TBLMASTERREKENING_NAMA'=>'PAJAK BUMI DAN BANGUNAN'
		)
		,array(
			'TBLMASTERREKENING_KODE'=>'4111102'
			,'TBLMASTERREKENING_NAMA'=>'Bea Perolehan Hak Atas Tanah dan Bangunan'
		)
	) ?>
	<?php /*foreach ($data['rekpbb'] as $row): ?>
		<tr>
			<td><?= $no++ ?></td>
			<td>[<?= $row['TBLMASTERREKENING_KODE'] ?>] <?= $row['TBLMASTERREKENING_NAMA'] ?></td>
			<td>
			<div align="right">
			<?php 
			$dt = TargetPajak::model()->find('TBLMASTERREKENING_KODE=:kode AND REFTARGETPAJAK_TAHUN=:tahun ', array(':kode'=>$row['TBLMASTERREKENING_KODE'], ':tahun'=>$data['tahun'])); ?>
			<a href="#" data-koderek="<?= $row['TBLMASTERREKENING_KODE'] ?>" data-tahun="<?= $data['tahun'] ?>" id="nominal" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $dt ? $dt['REFTARGETPAJAK_ID'] : 0 ?>" data-original-title="Nominal" class="input-x-edit-uang">
			<?php echo $dt ? LokalIndonesia::ribuan($dt['REFTARGETPAJAK_NOMINAL']) : 0; ?>
			</a>
			</div>
			 </td>
		</tr>
	<?php endforeach*/ ?>
	</tbody>
</table>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		loadXeditable();
	});
</script>
<?php Yii::import('ext.LokalIndonesia'); ?>
<button id="btnTambah" class="btn btn-primary">
	<i class="fa fa-plus"></i> Tambah
</button>
<br>
<table id="dt_basic" class="table table-striped table-bordered" width="100%" style="border-collapse:collapse;" cellpadding="2" cellspacing="2">
	<thead>
		<tr>
			<th data-hide="phone">No</th>
			<th data-hide="phone, tablet">ID</th>
			<th data-hide="phone, tablet">NAMA BU</th>
			<th data-hide="phone, tablet">NAMA BU 90</th>

			<th data-hide="phone, tablet">REKPEND</th>
			<th data-hide="phone, tablet">REKPAD</th>
			<th data-hide="phone, tablet">REKPJK</th>
			<th data-hide="phone, tablet">REKAYAT</th>
			<th data-hide="phone, tablet">REKJENIS</th>

			<th data-hide="phone, tablet"><b>REKPEND 90</b></th>
			<th data-hide="phone, tablet"><b>REKPAD 90</b></th>
			<th data-hide="phone, tablet"><b>REKPJK 90</b></th>
			<th data-hide="phone, tablet"><b>REKAYAT 90</b></th>
			<th data-hide="phone, tablet"><b>REKJENIS 90</b></th>
			<th data-hide="phone, tablet"><b>REKSUB 90</b></th>

			<th data-hide="phone, tablet"><b>KET</b></th>
			<th data-hide="phone, tablet"><b>KET 90</b></th>

			<!-- <th data-hide="phone">Target (Rp)</th> -->
		</tr>
	</thead>
	<tbody>
	<?php $no = 1; foreach ($data['list'] as $row): ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $row['REFBADANUSAHA_ID'] ?></td>
			<td><?= $row['REFBADANUSAHA_NAMA'] ?></td>
			<td>
				<a href="javascript:void(0)" id="REFBADANUSAHA_NAMA_90" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $row['REFBADANUSAHA_ID'] ?>" data-original-title="Isi" class="input-x-edit">
				<?= $row['REFBADANUSAHA_NAMA_90'] ?>
				</a>
			</td>

			<td><?= $row['REFBADANUSAHA_REKPENDAPATAN'] ?></td>
			<td><?= $row['REFBADANUSAHA_REKPAD'] ?></td>
			<td><?= $row['REFBADANUSAHA_REKPJK'] ?></td>
			<td><?= $row['REFBADANUSAHA_REKAYAT'] ?></td>
			<td><?= $row['REFBADANUSAHA_REKJENIS'] ?></td>

			<td>
				<a href="javascript:void(0)" id="REFBADANUSAHA_REKPENDAPATAN_90" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $row['REFBADANUSAHA_ID'] ?>" data-original-title="Kode" class="input-x-edit">
				<?= $row['REFBADANUSAHA_REKPENDAPATAN_90'] ?>
				</a>
			</td>
			<td>
				<a href="javascript:void(0)" id="REFBADANUSAHA_REKPAD_90" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $row['REFBADANUSAHA_ID'] ?>" data-original-title="Kode" class="input-x-edit">
				<?= $row['REFBADANUSAHA_REKPAD_90'] ?>
				</a>
			</td>
			<td>
				<a href="javascript:void(0)" id="REFBADANUSAHA_REKPJK_90" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $row['REFBADANUSAHA_ID'] ?>" data-original-title="Kode" class="input-x-edit">
				<?= $row['REFBADANUSAHA_REKPJK_90'] ?>
				</a>
			</td>
			<td>
				<a href="javascript:void(0)" id="REFBADANUSAHA_REKAYAT_90" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $row['REFBADANUSAHA_ID'] ?>" data-original-title="Kode" class="input-x-edit">
				<?= $row['REFBADANUSAHA_REKAYAT_90'] ?>
				</a>
			</td>
			<td>
				<a href="javascript:void(0)" id="REFBADANUSAHA_REKJENIS_90" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $row['REFBADANUSAHA_ID'] ?>" data-original-title="Kode" class="input-x-edit">
				<?= $row['REFBADANUSAHA_REKJENIS_90'] ?>
				</a>
			</td>
			<td>
				<a href="javascript:void(0)" id="REFBADANUSAHA_REKSUB_90" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $row['REFBADANUSAHA_ID'] ?>" data-original-title="Kode" class="input-x-edit">
				<?= $row['REFBADANUSAHA_REKSUB_90'] ?>
				</a>
			</td>

			<td><?= $row['REFBADANUSAHA_REKKETERANGAN'] ?></td>
			<td><?= $row['REFBADANUSAHA_REKKETERANGAN_90'] ?></td>
			<?php /* ?>
			<td>
			<div align="right">
			<?php 
			$dt = TargetPajak::model()->find('TBLMASTERREKENING_KODE=:kode AND REFTARGETPAJAK_TAHUN=:tahun', array(':kode'=>$row['TBLMASTERREKENING_KODE'], ':tahun'=>$data['tahun'])); ?>
			<a href="#" data-koderek="<?= $row['TBLMASTERREKENING_KODE'] ?>" data-tahun="<?= $data['tahun'] ?>" id="NOMINAL" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $dt ? $dt['REFTARGETPAJAK_ID'] : 0 ?>" data-original-title="Nominal" class="input-x-edit-uang">
			<?php echo $dt ? LokalIndonesia::ribuan($dt['REFTARGETPAJAK_NOMINAL']) : 0; ?>
			</a>
			</div>
			 </td>
			<?php */ ?>
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

<div id="sub"></div>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		loadXeditable();

		$("#btnTambah").click(function(event) {
			$.ajax({
				url: 'app/badanusaha_90/loadform',
				type: 'POST',
				data: {},
			})
			.done(function(respon) {
				$("#sub").html(respon)
				$("#form-data")[0].reset()
				$("#modal-data").modal('show')
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		});
	});
</script>
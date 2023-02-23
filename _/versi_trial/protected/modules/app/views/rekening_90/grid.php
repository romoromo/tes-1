<?php Yii::import('ext.LokalIndonesia'); ?>
<button id="btnTambah" class="btn btn-primary">
	<i class="fa fa-plus"></i> Tambah
</button>
<br>
<table id="dt_basic" class="table table-striped table-bordered" width="100%" style="border-collapse:collapse;" cellpadding="2" cellspacing="2">
	<thead>
		<tr>
			<th data-hide="phone">No</th>
			<th data-hide="phone, tablet">NAMA REKENING</th>
			<th data-hide="phone, tablet">NAMA REKENING 90</th>

			<th data-hide="phone, tablet">REKENING LAMA</th>

			<!-- <th data-hide="phone, tablet"><b>REKENING 90</b></th> -->
			<th data-hide="phone, tablet"><b>REKPEND 90</b></th>
			<th data-hide="phone, tablet"><b>REKPAD 90</b></th>
			<th data-hide="phone, tablet"><b>REKPJK 90</b></th>
			<th data-hide="phone, tablet"><b>REKAYAT 90</b></th>
			<th data-hide="phone, tablet"><b>REKJENIS 90</b></th>
			<th data-hide="phone, tablet"><b>REKSUB 90</b></th>
		</tr>
	</thead>
	<tbody>
	<?php $no = 1; foreach ($data['list'] as $row): ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $row['TBLREKENING_NAMAREKENING'] ?></td>
			<td>
				<a href="javascript:void(0)" id="TBLREKENING_NAMAREKENING_90" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $row['TBLREKENING_KODE'] ?>" data-original-title="Isi" class="input-x-edit">
				<?= $row['TBLREKENING_NAMAREKENING_90'] ?>
				</a>
			</td>

			<td>
				<?= $row['TBLREKENING_KODE'] ?>
			</td>

			<td>
				<a href="javascript:void(0)" id="TBLREKENING_REKPENDAPATAN_90" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $row['TBLREKENING_KODE'] ?>" data-original-title="Kode" class="input-x-edit">
				<?= $row['TBLREKENING_REKPENDAPATAN_90'] ?>
				</a>
			</td>
			<td>
				<a href="javascript:void(0)" id="TBLREKENING_REKPAD_90" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $row['TBLREKENING_KODE'] ?>" data-original-title="Kode" class="input-x-edit">
				<?= $row['TBLREKENING_REKPAD_90'] ?>
				</a>
			</td>
			<td>
				<a href="javascript:void(0)" id="TBLREKENING_REKPAJAK_90" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $row['TBLREKENING_KODE'] ?>" data-original-title="Kode" class="input-x-edit">
				<?= $row['TBLREKENING_REKPAJAK_90'] ?>
				</a>
			</td>
			<td>
				<a href="javascript:void(0)" id="TBLREKENING_REKAYAT_90" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $row['TBLREKENING_KODE'] ?>" data-original-title="Kode" class="input-x-edit">
				<?= $row['TBLREKENING_REKAYAT_90'] ?>
				</a>
			</td>
			<td>
				<a href="javascript:void(0)" id="TBLREKENING_REKJENIS_90" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $row['TBLREKENING_KODE'] ?>" data-original-title="Kode" class="input-x-edit">
				<?= $row['TBLREKENING_REKJENIS_90'] ?>
				</a>
			</td>
			<td>
				<a href="javascript:void(0)" id="TBLREKENING_REKSUBJENIS_90" data-placement="left" data-inputclass="format-rupiah" data-type="text" data-pk="<?= $row['TBLREKENING_KODE'] ?>" data-original-title="Kode" class="input-x-edit">
				<?= $row['TBLREKENING_REKSUBJENIS_90'] ?>
				</a>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>

<div id="sub"></div>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		loadXeditable();

		$("#btnTambah").click(function(event) {
			$.ajax({
				url: 'app/rekening_90/loadform',
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
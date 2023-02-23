<table id="dt_pipeline" class="table table-striped table-bordered table-hover smart-form" width="100%">
	<thead>
		<tr>
			<th data-hide="phone">
				<div class="center">
					<label class="checkbox">
						<input checked="" type="checkbox" name="cbx-all" onclick="cekAll(this)">
						<i></i> All
					</label>
				</div>
			</th>
			<th data-hide="phone">NO</th>
			<th data-hide="phone">TGL.SKPDLB</th>
			<th data-class="expand">NO.LB</th>
			<th data-hide="phone, tablet">NAMA WAJIB PAJAK</th>
			<th data-hide="phone, tablet">NPWPD</th>
			<th data-hide="phone, tablet">THP</th>
			<th data-hide="phone, tablet">BLP</th>
			<th data-hide="phone, tablet">HRP</th>
			<th data-hide="phone, tablet">TERBAYAR</th>
			<th data-hide="phone, tablet">PAJAK PERIKSA</th>
			<th data-hide="phone, tablet">LEBIH BAYAR</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=1; foreach ($data['skpdlb'] as $row): ?>   
		<tr>
			<td>
					<div align="center">
						<label class="checkbox">
							<input checked="" class="cbx_batalkan" value="<?php echo $row['TBLDAFTAR_NOPOK'] ?>-<?php echo (int)$row['TBLPENDATAAN_THNPAJAK'] ?>-<?php echo (int)$row['TBLPENDATAAN_BLNPAJAK'] ?>-<?php echo $row['REGLEBIHBAYAR'] ?>" name="nopokskpdlb" type="checkbox">
							<i></i>
						</label>
					</div>

			</td>
			<!-- <td><div align="center">
					<button class="btn btn-sm btn-danger btnprosestap" onclick="batalskpdlb()" type="button">
									<i class="fa fa-trash"></i> Edit
					</button>
				</div>
			</td> -->
			<td><?php echo $no++ ?></td>
			<td><?php  echo $row['TGLLEBIHBAYAR'] .'-'. $row['BLNLEBIHBAYAR'] .'-20'. $row['THNLEBIHBAYAR'] ?></td>
			<td><?php echo $row['REGLEBIHBAYAR'] ?></td>
			<td><?php echo $row['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
			<td><?php echo $row['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $row['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d", $row['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$row['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$row['TBLKELURAHAN_IDBADANUSAHA']) ?></td>
			<td><?php echo $row['TBLPENDATAAN_THNPAJAK'] ?></td>
			<td><?php echo $row['TBLPENDATAAN_BLNPAJAK'] ?></td>
			<td><?php echo $row['TBLPENDATAAN_TGLPAJAK'] ?></td>
			<td><?php echo $row['REFLEBIHBAYAR_TERBAYAR'] ?></td>
			<td><?php echo $row['PAJAKPERIKSA'] ?></td>
			<td><?php echo $row['RUPIAHLBHBAYAR'] ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
	<tbody>
	</tbody>
</table>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		// reloadDT('dt_pipeline');
		// var elm = $("input[name='cbx-all']");
		// cekAll(elm);
	});

	function cekAll(elemen) {
		$('.cbx_batalkan').prop("checked" , elemen.checked);
	}

	$(".cbx_batalkan").click(function(event) {
		if (!$(event.target).prop('checked')) {
			window.id_eksepsi += ','+$(event.target).val();
			cari();
		}
	});
</script>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
	<thead>
		<tr>
			<th>
				<label class="checkbox">
					<input type="checkbox" name="checkbox" checked="">
				</label>
			</th>
			<th width="15"> No</th>
			<th data-hide="phone"><div class="center"> Tahun</div></th>
			<th data-hide="phone"><div class="center"> Bulan</div></th>
			<th data-class="expand"><div class="center"> Tgl Entry</div></th>
			<th data-hide="phone, tablet"><div class="center"> Nomor Pokok</div></th>
			<th data-hide="phone, tablet"><div class="center"> Ke</div></th>
			<th data-hide="phone, tablet"> Nama Badan Usaha</th>
			<th data-hide="phone, tablet"> Pemilik</th>
			<th> Pajak</th>
			<th> No SSP</th>
			<th> RP SSPD</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; foreach ($data['table'] as $row): ?>
		<tr>
			<td>
			<?php if ($row['TBLDAFTAR_ISAKTIF']=='N'): ?>
				NON-AKTIF
			<?php else: ?>
				<label class="checkbox">
					<input class="cbx_pilih" type="checkbox" name="nopokPajak" value="<?php echo $row['TBLDAFTAR_NOPOK']; ?>">
					<i></i>
				</label>
			<?php endif ?>
			</td>
			<td><?= $no++ ?></td>
			<td>20<?= $row['TBLPENDATAAN_THNPAJAK']; ?></td>
			<td><?= LokalIndonesia::getbulan($row['TBLPENDATAAN_BLNPAJAK']); ?></td>
			<td><?= $row[$data['namatbl'].'_'.'TGLENTRI']; ?>/<?= $row[$data['namatbl'].'_'.'BLNENTRI']; ?>/20<?= $row[$data['namatbl'].'_'.'THNENTRI']; ?></td>
			<td><?= $row['TBLDAFTAR_NOPOK']; ?></td>
			<td><?//= $row[$data['namatbl'].'_'.'PAJAKKE']; ?></td>
			<td><?= $row['TBLDAFTAR_BADANUSAHANAMA']; ?></td>
			<td><?= $row['TBLDAFTAR_PEMILIKNAMA']; ?></td>
			<td><?= LokalIndonesia::rupiah($row[$data['namatbl'].'_'.'PAJAK']); ?></td>
			<td><?= $row[$data['namatbl'].'_'.'REGSETOR']; ?></td>
			<td><?= LokalIndonesia::rupiah($row[$data['namatbl'].'_'.'RUPIAHSETOR']) ?></td>

		</tr>
		<?php endforeach ?>
	</tbody>
</table>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT2('dt_basic');
	});

	function cekAll(elemen) {
		$('.cbx_pilih').prop("checked" , elemen.checked);
	}

	$(".cbx_pilih").click(function(event) {
		if (!$(event.target).prop('checked')) {
			window.id_eksepsi += ','+$(event.target).val();
			// cari();
		}
	});
</script>
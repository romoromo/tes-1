
<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
	<thead>
		<!-- <header>
			<span class="widget-icon"> <i class="fa fa-table"></i> </span>
			<h2>&nbsp;Data</h2>
		</header> -->
		<tr>
			
			<th data-hide="phone"><div class="center"> Bulan Pajak</div></th>
			<th data-hide="phone"><div class="center"> No. SKP</div></th>
			<th data-hide="phone"><div class="center"> Pajak (Rp.)</div></th>
			<th data-hide="phone"><div class="center"> Tgl. Lapor SPT</div></th>
			<th data-hide="phone"><div class="center"> SSPD (Rp.)</div></th>
			<th data-hide="phone"><div class="center"> Tgl. Setor</div></th>
			
		</thead>
		<tbody>
			<?php 
			$jskpd = 0;
			$jsspd = 0;
			$jsspdkb = 0;
			$jsskd= 0;
			$no = 1; foreach ($data['laporan'] as $row): 
			$jskpd += $row[$data['namatbl'].'_PAJAKSKPD'];
			$jsspd += $row[$data['namatbl'].'_RUPIAHSETOR'];
			$jsspdkb += $row[$data['namatbl'].'_RUPIAHKRGBAYAR'];
			$jsskd += $row[$data['namatbl'].'_RUPIAHKRGBAYAR'];
			$tunggakan = $jskpd-$jsspd
			?>
			<tr>

				<td><?= $row['TBLPENDATAAN_BLNPAJAK']; ?></td>
				<td><?= $row[$data['namatbl'].'_NOMORSKPD']; ?></td>
				<td style="text-align:right;"><?= LokalIndonesia::ribuan($row[$data['namatbl'].'_PAJAKSKPD']); ?></td>
				<td>
					<?php if (!empty($row[$data['namatbl'].'_TGLENTRI'])): ?>
						<?= $row[$data['namatbl'].'_TGLENTRI']; ?>/
					<?php endif ?>
					<?php if (!empty($row[$data['namatbl'].'_BLNENTRI'])): ?>
						<?= $row[$data['namatbl'].'_BLNENTRI']; ?>/
					<?php endif ?>
					<?php if (!empty($row[$data['namatbl'].'_THNENTRI'])): ?> 
						20<?= $row[$data['namatbl'].'_THNENTRI'] ?>
					<?php endif ?>				</td>
				<td style="text-align:right;"><?= LokalIndonesia::ribuan($row[$data['namatbl'].'_RUPIAHSETOR']); ?></td>
				<td>
					<?php if (!empty($row[$data['namatbl'].'_TANGGALSETOR'])): ?>
						<?= $row[$data['namatbl'].'_TANGGALSETOR']; ?>/
					<?php endif ?>
					<?php if (!empty($row[$data['namatbl'].'_BULANSETOR'])): ?>
						<?= $row[$data['namatbl'].'_BULANSETOR']; ?>/
					<?php endif ?>
					<?php if (!empty($row[$data['namatbl'].'_TAHUNSETOR'])): ?> 
						20<?= $row[$data['namatbl'].'_TAHUNSETOR'] ?>
					<?php endif ?>				</td>
				
			</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="3" rowspan="3">&nbsp;</td>
			<td><strong>jUMLAH SKPD : </strong></td>
			<td style="text-align:right;"><?= LokalIndonesia::ribuan($jskpd); ?></td>
			
			<td rowspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td><strong>JUMLAH SSPD : </strong></td>
			<td style="text-align:right;"><?= LokalIndonesia::ribuan($jsspd); ?></td>
			
		</tr>
		<tr>
			<td><strong>TUNGGAKAN : </strong></td>
			<td style="text-align:right;"><?= LokalIndonesia::ribuan($tunggakan); ?></td>
			
		</tr>
	</tfoot>
</table>
<!-- <fieldset>
<header></header>
	<div class="row">
		<section class="col col-md-1">
			<p>J_SKPD</p>
		</section>
		<section class="col col-md-3">
			<label class="input">
				<input type="nopok" name="" id="nopok">
			</label>
		</section>
	</div>
</fieldset> -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});
</script>
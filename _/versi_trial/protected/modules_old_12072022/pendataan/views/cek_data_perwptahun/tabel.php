
<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
	<thead>
		<!-- <header>
			<span class="widget-icon"> <i class="fa fa-table"></i> </span>
			<h2>&nbsp;Data</h2>
		</header> -->
		<tr>
			
			<th data-hide="phone"><div class="center"> Bulan Pajak</div></th>
			<th data-hide="phone"><div class="center"> No. SKP</div></th>
			<th data-hide="phone"><div class="center"> SKPD (Rp.)</div></th>
			<th data-hide="phone"><div class="center"> Tgl. Setor</div></th>
			<th data-hide="phone"><div class="center"> SSPD (Rp.)</div></th>
			<th data-hide="phone"><div class="center"> Bulan KB</div></th>
			<th data-hide="phone"><div class="center"> No. KB</div></th>
			<th data-hide="phone"><div class="center"> SSPDKB</div></th>
			<th data-hide="phone"><div class="center"> Tgl. Setoran</div></th>
			<th data-hide="phone"><div class="center"> SSKD(Rp.)</div></th>
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
			?>
			<tr>

				<td><?= $row['TBLPENDATAAN_BLNPAJAK']; ?></td>
				<td><?= $row[$data['namatbl'].'_NOMORSKPD']; ?></td>
				<td style="text-align:right;"><?= LokalIndonesia::ribuan($row[$data['namatbl'].'_PAJAKSKPD']); ?></td>
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
				<td style="text-align:right;"><?= LokalIndonesia::ribuan($row[$data['namatbl'].'_RUPIAHSETOR']); ?></td>
				<td><?= $row['TBLPENDATAAN_BLNPAJAK']; ?></td>
				<td><?= $row[$data['namatbl'].'_REGKURANGBAYAR']; ?></td>
				<td style="text-align:right;">
					<?php if (!empty($row[$data['namatbl'].'_RUPIAHKRGBAYAR'])): ?>	
						<?= $row[$data['namatbl'].'_RUPIAHKRGBAYAR']; ?>
					<?php else: ?>
						0
					<?php endif ?>				</td>
				<td>
					<?php if (!empty($row[$data['namatbl'].'_TGLBTSKRGBAYAR'])): ?>	
						<?= $row[$data['namatbl'].'_TGLBTSKRGBAYAR']; ?>/
					<?php endif ?>
					<?php if (!empty($row[$data['namatbl'].'_BLNBTSKRGBAYAR'])): ?>	
						<?= $row[$data['namatbl'].'_BLNBTSKRGBAYAR']; ?>/
					<?php endif ?>
					<?php if (!empty($row[$data['namatbl'].'_THNKURANGBAYAR'])): ?>	
						<?= $row[$data['namatbl'].'_THNBTSKRGBAYAR']; ?>
					<?php endif ?>				</td>
				<td style="text-align:right;"><?= LokalIndonesia::ribuan($row[$data['namatbl'].'_RUPIAHKRGBAYAR']); ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="3" rowspan="3">&nbsp;</td>
			<td><strong>J-SKPD : </strong></td>
			<td style="text-align:right;"><?= LokalIndonesia::ribuan($jskpd); ?></td>
			<td colspan="2" rowspan="3">&nbsp;</td>
			<td><strong>J-SSPDKB : </strong></td>
			<td style="text-align:right;"><?= LokalIndonesia::ribuan($jsspdkb); ?></td>
			<td rowspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td><strong>J-SSPD : </strong></td>
			<td style="text-align:right;"><?= LokalIndonesia::ribuan($jsspd); ?></td>
			<td><strong>J-SSKD : </strong></td>
			<td style="text-align:right;"><?= LokalIndonesia::ribuan($jsskd); ?></td>
		</tr>
		<tr>
			<td><strong>TUNGGAKAN : </strong></td>
			<td style="text-align:right;"><?= LokalIndonesia::ribuan('0'); ?></td>
			<td><strong>TUNGGAKAN : </strong></td>
			<td style="text-align:right;"><?= LokalIndonesia::ribuan('0'); ?></td>
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
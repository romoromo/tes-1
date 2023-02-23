<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
	<thead>
		<tr>
			<th data-hide="phone" align="center"> NO</th>
			<th data-hide="phone" align="center"> Nama WP</th>
			<th data-hide="phone" align="center"> NPWPD</th>
			<th data-hide="phone" align="center"> TH</th>
			<th data-hide="phone" align="center"> BL</th>
			<th data-hide="phone" align="center"> TGL Batas SKPD</th>
			<th data-hide="phone" align="center"> Jenis</th>
			<th data-hide="phone" align="center"> Ketetapan</th>
			<th data-hide="phone" align="center"> Bunga KB</th>
			<th data-hide="phone" align="center"> Denda</th>
			<th data-hide="phone" align="center"> Rupiah SKPDKB</th>
			<th data-hide="phone" align="center"> Jml Angsur</th>
			<th data-hide="phone" align="center"> 1</th>
			<th data-hide="phone" align="center"> 2</th>
			<th data-hide="phone" align="center"> 3</th>
			<th data-hide="phone" align="center"> 4</th>
			<th data-hide="phone" align="center"> 5</th>
			<th data-hide="phone" align="center"> 6</th>
			<th data-hide="phone" align="center"> 7</th>
			<th data-hide="phone" align="center"> 8</th>
			<th data-hide="phone" align="center"> 9</th>
			<th data-hide="phone" align="center"> 10</th>
			<th data-hide="phone" align="center"> 11</th>
			<th data-hide="phone" align="center"> 12</th>
			<th data-hide="phone" align="center"> Tunggakan</th>
		</tr>
	</thead>
	<tbody>
		<?php $jmlh = 0; ?>
		<?php $totaltunggakan = 0; ?>
		<?php $no=1; foreach ($data['cari'] as $list): ?>
		<?php if($list) 
		$totaltunggakan = $list['ANG1'] +  $list['ANG2'] + $list['ANG3'] + $list['ANG4'] + $list['ANG5'] + $list['ANG6'] + $list['ANG7'] + $list['ANG8'] + $list['ANG9'] + $list['ANG10'] + $list['ANG11'] + $list['ANG12'] ;?>
		<?php $totaltunggakan2 = $list['POKOK'] + $list['BUNGA'] ?>
		<tr>
			<td><?php echo $no++; ?></td> <!-- NO -->
			<td><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?></td> <!-- Nama WP -->
			<td><?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo $list['TBLDAFTAR_NOPOK'] ?>.<?php echo $list['TBLKECAMATAN_ID'] ?>.<?php echo $list['TBLKELURAHAN_ID'] ?></td> <!-- NPWPD -->
			<td><?php echo $list['TBLPENDATAAN_THNPAJAK'] ?></td> <!-- TH -->
			<td><?php echo $list['TBLPENDATAAN_BLNPAJAK'] ?></td> <!-- BL -->
			<td><?php echo $list[$data['NamaTBL'].'_TGLBTSKRGBAYAR'] ?>/<?php echo $list[$data['NamaTBL'].'_BLNBTSKRGBAYAR'] ?>/<?php echo $list[$data['NamaTBL'].'_THNBTSKRGBAYAR'] ?></td>
			<td><?= $list['HITUNG'] == '' ? 'KB' : 'A' ;?></td>
			<td><?php echo LokalIndonesia::ribuan($list['POKOK']) ?></td> <!-- Ketetapan -->
			<td><?php echo LokalIndonesia::ribuan($list['BUNGA']) ?></td> <!-- Bunga -->
			<td><?php echo LokalIndonesia::ribuan($list['DENDA']) ?></td> <!-- Denda -->
			<td><?php echo LokalIndonesia::ribuan($list['TOTAL']) ?></td> <!-- Total -->
			<td><?php echo LokalIndonesia::ribuan($list['HITUNG']) ?></td> <!-- Tunai -->
			<td><?php echo LokalIndonesia::ribuan($list['ANG1'])?></td>
			<td><?php echo LokalIndonesia::ribuan($list['ANG2'])?></td>
			<td><?php echo LokalIndonesia::ribuan($list['ANG3'])?></td>
			<td><?php echo LokalIndonesia::ribuan($list['ANG4'])?></td>
			<td><?php echo LokalIndonesia::ribuan($list['ANG5'])?></td>
			<td><?php echo LokalIndonesia::ribuan($list['ANG6'])?></td>
			<td><?php echo LokalIndonesia::ribuan($list['ANG7'])?></td>
			<td><?php echo LokalIndonesia::ribuan($list['ANG8'])?></td>
			<td><?php echo LokalIndonesia::ribuan($list['ANG9'])?></td>
			<td><?php echo LokalIndonesia::ribuan($list['ANG10']) ?></td>
			<td><?php echo LokalIndonesia::ribuan($list['ANG11']) ?></td>
			<td><?php echo LokalIndonesia::ribuan($list['ANG12']) ?></td>
			<td><?php echo LokalIndonesia::ribuan($list['TOTALANGSUR']) ?></td><!-- Tunggakan -->
		</tr>
	<?php endforeach ?>
</tbody>
</table>
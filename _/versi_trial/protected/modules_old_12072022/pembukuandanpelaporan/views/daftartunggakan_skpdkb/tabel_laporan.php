<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
	<thead>
		<tr>
			<th data-hide="phone" align="center"> NO</th>
			<th data-hide="phone" align="center"> Nama WP</th>
			<th data-hide="phone" align="center"> Alamat OP</th>
			<th data-hide="phone" align="center"> NPWPD</th>
			<th data-hide="phone" align="center"> Masa Pajak</th>
			<th data-hide="phone" align="center"> No. SKPD-A</th>
			<th data-hide="phone" align="center"> TGL Terbit SKPD</th>
			<th data-hide="phone" align="center"> Jenis</th>
			<th data-hide="phone" align="center"> Ketetapan Pokok</th>
			<th data-hide="phone" align="center"> Bunga Tambahan</th>
			<th data-hide="phone" align="center"> Total Tunggakan Pokok</th>
			<th data-hide="phone" align="center"> Total Tunggakan Bunga</th>
			<th data-hide="phone" align="center"> Jml Angsur</th>
			<th data-hide="phone" align="center"> Tunggakan Ke 1</th>
			<th data-hide="phone" align="center"> Tunggakan Ke 2</th>
			<th data-hide="phone" align="center"> Tunggakan Ke 3</th>
			<th data-hide="phone" align="center"> Tunggakan Ke 4</th>
			<th data-hide="phone" align="center"> Tunggakan Ke 5</th>
			<th data-hide="phone" align="center"> Tunggakan Ke 6</th>
			<th data-hide="phone" align="center"> Tunggakan Ke 7</th>
			<th data-hide="phone" align="center"> Tunggakan Ke 8</th>
			<th data-hide="phone" align="center"> Tunggakan Ke 9</th>
			<th data-hide="phone" align="center"> Tunggakan Ke 10</th>
			<th data-hide="phone" align="center"> Tunggakan Ke 11</th>
			<th data-hide="phone" align="center"> Tunggakan Ke 12</th>
			
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
			<td><?php echo $list['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td> <!-- Alanat OP -->
			<td><?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo $list['TBLDAFTAR_NOPOK'] ?>.<?php echo $list['TBLKECAMATAN_ID'] ?>.<?php echo $list['TBLKELURAHAN_ID'] ?></td> <!-- NPWPD -->
			<td><?php echo LokalIndonesia::getBulan($list['TBLPENDATAAN_BLNPAJAK']) ?> 20<?php echo $list['TBLPENDATAAN_THNPAJAK'] ?></td> <!-- Masa -->
			<td><?php echo $list[$data['NamaTBL'].'_REGSURATANGSUR'] ?></td> <!-- No.SKPD -->
			<td><?php echo $list[$data['NamaTBL'].'_TGLSURATANGSUR'] ?>/<?php echo $list[$data['NamaTBL'].'_BLNSURATANGSUR'] ?>/<?php echo $list[$data['NamaTBL'].'_THNSURATANGSUR'] ?></td>
			<td><?php 
			if ($list['HITUNG']=='') {
				echo 'KB';
			} else {
				echo 'Angsur';
			}
			?></td>
			<td><?php echo LokalIndonesia::ribuan($list['TOTAL']) ?></td> <!-- Ketetapan -->
			<td><?php echo LokalIndonesia::ribuan($list['BUNGA']) ?></td> <!-- Bunga -->
			<td><?php echo LokalIndonesia::ribuan($list['TOTALANGSUR']) ?></td><!-- Tunggakan Pokok -->
			<td><?php echo LokalIndonesia::ribuan($list['TOTALBUNGA']) ?></td><!-- Tunggakan Bunga-->
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
			
		</tr>
	<?php endforeach ?>
</tbody>
</table>
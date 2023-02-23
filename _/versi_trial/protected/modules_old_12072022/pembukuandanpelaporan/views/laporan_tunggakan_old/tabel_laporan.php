<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
	<thead>
		<tr>
			<th data-hide="phone" align="center"> TGL KB</th>
			<th data-hide="phone" align="center"> Nama WP</th>
			<th data-hide="phone" align="center"> NPWPD</th>
			<th data-hide="phone" align="center"> TH</th>
			<th data-hide="phone" align="center"> BL</th>
			<th data-hide="phone" align="center"> Ketetapan</th>
			<th data-hide="phone" align="center"> Bunga</th>
			<th data-hide="phone" align="center"> Denda</th>
			<th data-hide="phone" align="center"> Total</th>
			<th data-hide="phone" align="center"> Tunai</th>
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
			<th data-hide="phone" align="center"> Total</th>
			<th data-hide="phone" align="center"> Piutang</th>
			<th data-hide="phone" align="center"> Adjust</th>
			<th data-hide="phone" align="center"> KET</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=1; foreach ($data['cari'] as $list) :?>
		<tr>
			<td><?php echo $list['TBLDAFTHOTEL_THNKURANGBAYAR'] ?>/<?php echo $list['TBLDAFTHOTEL_BLNKURANGBAYAR'] ?>/<?php echo $list['TBLDAFTHOTEL_TGLKURANGBAYAR'] ?></td>
			<td><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
			<td><?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo $list['TBLDAFTAR_NOPOK'] ?>.<?php echo $list['TBLKECAMATAN_ID'] ?>.<?php echo $list['TBLKELURAHAN_ID'] ?></td>
			<td><?php echo $list['TBLPENDATAAN_THNPAJAK'] ?></td>
			<td><?php echo $list['TBLPENDATAAN_BLNPAJAK'] ?></td>
			<td><?php echo $list['POKOK'] ?></td>
			<td><?php echo $list['BUNGA'] ?></td>
			<td><?php echo $list['DENDA'] ?></td>
			<td><?php echo $list['TOTAL'] ?></td>
			<td><?php echo $list['TUNAI'] ?></td>
			<td><?php echo $list['ANG1'] ?></td>
			<td><?php echo $list['ANG2'] ?></td>
			<td><?php echo $list['ANG3'] ?></td>
			<td><?php echo $list['ANG4'] ?></td>
			<td><?php echo $list['ANG5'] ?></td>
			<td><?php echo $list['ANG6'] ?></td>
			<td><?php echo $list['ANG7'] ?></td>
			<td><?php echo $list['ANG8'] ?></td>
			<td><?php echo $list['ANG9'] ?></td>
			<td><?php echo $list['ANG10'] ?></td>
			<td><?php echo $list['ANG11'] ?></td>
			<td><?php echo $list['ANG12'] ?></td>
			<td><?php echo $list['TOTALANGSUR'] ?></td> <!-- Total -->
			<td><?php //echo $list[''] ?></td> <!-- Piutang -->
			<td><?php //echo $list[''] ?></td> <!-- Adjust -->
			<td><?php //echo $list[''] ?></td> <!-- KET -->
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
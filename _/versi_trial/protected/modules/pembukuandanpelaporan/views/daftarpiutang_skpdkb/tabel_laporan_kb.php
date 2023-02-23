<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
	<thead>
		<tr>
			<th data-hide="phone" align="center"> NO</th>
			<th data-hide="phone" align="center"> Kode Rekening</th>
			<th data-hide="phone" align="center"> Nama Rekening</th>
			<th data-hide="phone" align="center"> Nama WP</th>
			<th data-hide="phone" align="center"> Alamat OP</th>
			<th data-hide="phone" align="center"> NPWPD</th>
			<th data-hide="phone" align="center"> No. SKPDKB</th>
			<th data-hide="phone" align="center"> Masa Pajak</th>
			<th data-hide="phone" align="center"> TGL Terbit SKPD</th>
			<th data-hide="phone" align="center"> TGL Batas SKPD</th>
			<th data-hide="phone" align="center"> Jenis</th>
			<th data-hide="phone" align="center"> Pokok KB</th>
			<th data-hide="phone" align="center"> Bunga KB</th>
			<th data-hide="phone" align="center"> Kenaikan KB</th>
			<th data-hide="phone" align="center"> Total</th>
			<th data-hide="phone" align="center"> Setoran</th>
			<th data-hide="phone" align="center"> Piutang</th>
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
			<td><?php echo $list['KODEREK'] ?></td> <!-- kode -->
			<td><?php echo $list['NAMAREK'] ?></td> <!-- nama rek -->
			<td><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?></td> <!-- Nama WP -->
			<td><?php echo $list['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td> <!-- Alamat WP -->
			<td><?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo sprintf('%07d',$list['TBLDAFTAR_NOPOK']) ?>.<?php echo sprintf('%02d',$list['TBLKECAMATAN_ID']) ?>.<?php echo sprintf('%02d',$list['TBLKELURAHAN_ID']) ?></td> <!-- NPWPD -->
			<td><?php echo $list[$data['NamaTBL'].'_REGKURANGBAYAR'] ?></td> <!-- No SKPD -->
			<td><?php echo LokalIndonesia::getBulan($list[$data['NamaTBL'].'_BLNKBAWAL']) ?> - <?php echo LokalIndonesia::getBulan($list[$data['NamaTBL'].'_BLNKBAKHIR']) ?> 20<?php echo $list['TBLPENDATAAN_THNPAJAK'] ?></td> <!-- MAsa -->
			<td><?php echo $list[$data['NamaTBL'].'_TGLKURANGBAYAR'] ?>/<?php echo $list[$data['NamaTBL'].'_BLNKURANGBAYAR'] ?>/<?php echo $list[$data['NamaTBL'].'_THNKURANGBAYAR'] ?></td>	
			<td><?php echo $list[$data['NamaTBL'].'_TGLBTSKRGBAYAR'] ?>/<?php echo $list[$data['NamaTBL'].'_BLNBTSKRGBAYAR'] ?>/<?php echo $list[$data['NamaTBL'].'_THNBTSKRGBAYAR'] ?></td>
			<td><?php 
			if ($list['HITUNG']=='') {
				echo 'KB';
			} else {
				echo 'A';
			}
			?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['POKOK']) ?></td> <!-- Ketetapan -->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['BUNGA']) ?></td> <!-- Bunga -->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['KENAIKAN']) ?></td> <!-- Denda -->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['TOTAL']) ?></td> <!-- Total -->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['TBLSETOR_RUPIAHSETOR']) ?></td> <!-- Setoran -->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['TOTALANGSUR']) ?></td><!-- Tunggakan -->
		</tr>
	<?php endforeach ?>
</tbody>
</table>
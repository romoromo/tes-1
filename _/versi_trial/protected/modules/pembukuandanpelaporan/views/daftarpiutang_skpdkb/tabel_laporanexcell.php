<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
	<thead>
		<tr>
			<!-- <th data-hide="phone" align="center"> NO</th> -->
			<th data-hide="phone" align="center"> Kode Rekening</th>
			<th data-hide="phone" align="center"> Nama Rekening</th>
			<th data-hide="phone" align="center"> Nama WP</th>
			<th data-hide="phone" align="center"> Alamat OP</th>
			<th data-hide="phone" align="center"> NPWPD</th>
			<th data-hide="phone" align="center"> Masa Pajak</th>
			<th data-hide="phone" align="center"> TGL Terbit SKPD</th>
			<th data-hide="phone" align="center"> No. SKPD-A</th>
			<th data-hide="phone" align="center"> Angsuran Ke</th>
			<th data-hide="phone" align="center"> Ketetapan Pokok</th>
			<th data-hide="phone" align="center"> Setoran Pokok</th>
			<th data-hide="phone" align="center"> Piutang</th>
		</tr>
	</thead>
	<tbody>
		<?php $jmlh = 0; ?>
		<?php $totaltunggakan = 0; ?>
		<?php $no=1; foreach ($data['cari'] as $list): ?>
		<?php $totaltunggakan = $list['POKOK'] + $list['BUNGA'];
		$nosurat =  $list[$data['NamaTBL'].'_REGSURATANGSUR']; 

		if($no==1){
			$ceknosurat	= $nosurat;
		?>
		<tr>
			<td><?php echo $list['KODEREK'] ?></td> <!-- kode -->
			<td><?php echo $list['NAMAREK'] ?></td> <!-- nama rek -->	
			<td><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?></td> <!-- Nama WP -->
			<td><?php echo $list['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td> <!-- Alanat OP -->
			<td><?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo sprintf('%07d',$list['TBLDAFTAR_NOPOK']) ?>.<?php echo sprintf('%02d',$list['TBLKECAMATAN_ID']) ?>.<?php echo sprintf('%02d',$list['TBLKELURAHAN_ID']) ?></td> <!-- NPWPD -->
			<td><?php echo LokalIndonesia::getBulan($list['TBLPENDATAAN_BLNPAJAK']) ?> 20<?php echo $list['TBLPENDATAAN_THNPAJAK'] ?></td> <!-- Masa -->
			<td align="center"	><?php echo $list[$data['NamaTBL'].'_TGLSURATANGSUR'] ?>/<?php echo $list[$data['NamaTBL'].'_BLNSURATANGSUR'] ?>/<?php echo $list[$data['NamaTBL'].'_THNSURATANGSUR'] ?></td>
			<td align="center"><?php echo $list[$data['NamaTBL'].'_REGSURATANGSUR'] ?></td> <!-- Nama WP -->
			<td align="center"><?php echo LokalIndonesia::ribuan($list['HITUNG']) ?></td> <!-- Angsuran Ke -->
			<td align="	right"><?php echo LokalIndonesia::ribuan($list['ANGSURAN']) ?></td> <!-- Ketetapan Pokok -->
			<td align="	right"><?php echo LokalIndonesia::ribuan($list['SETORAN']) ?></td> <!-- Denda -->
			<td align="	right"><?php echo LokalIndonesia::ribuan($list['TUNGGAKAN']) ?></td><!-- Tunggakan -->
		</tr>
		<?php
		} else {
			if($ceknosurat != $nosurat) {			
      	?>
		<tr>
			<td colspan="10" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
		</tr>
		<tr>
			<td><?php echo $list['KODEREK'] ?></td> <!-- kode -->
			<td><?php echo $list['NAMAREK'] ?></td> <!-- nama rek -->
			<td><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?></td> <!-- Nama WP -->
			<td><?php echo $list['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td> <!-- Alanat OP -->
			<td><?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo sprintf('%07d',$list['TBLDAFTAR_NOPOK']) ?>.<?php echo sprintf('%02d',$list['TBLKECAMATAN_ID']) ?>.<?php echo sprintf('%02d',$list['TBLKELURAHAN_ID']) ?></td> <!-- NPWPD -->
			<td><?php echo LokalIndonesia::getBulan($list['TBLPENDATAAN_BLNPAJAK']) ?> 20<?php echo $list['TBLPENDATAAN_THNPAJAK'] ?></td> <!-- Masa -->
			<td align="center"><?php echo $list[$data['NamaTBL'].'_TGLSURATANGSUR'] ?>/<?php echo $list[$data['NamaTBL'].'_BLNSURATANGSUR'] ?>/<?php echo $list[$data['NamaTBL'].'_THNSURATANGSUR'] ?></td>
			<td align="center"><?php echo $list[$data['NamaTBL'].'_REGSURATANGSUR'] ?></td> <!-- Nama WP -->
			<td align="center"><?php echo LokalIndonesia::ribuan($list['HITUNG']) ?></td> <!-- Angsuran Ke -->
			<td align="	right"><?php echo LokalIndonesia::ribuan($list['ANGSURAN']) ?></td> <!-- Ketetapan Pokok -->
			<td align="	right"><?php echo LokalIndonesia::ribuan($list['SETORAN']) ?></td> <!-- Denda -->
			<td align="	right"><?php echo LokalIndonesia::ribuan($list['TUNGGAKAN']) ?></td><!-- Tunggakan -->
		</tr>	
		<?php
		$ceknosurat = $nosurat;
		} else { ?>
			<tr>
			<td><?php echo $list['KODEREK'] ?></td> <!-- kode -->
			<td><?php echo $list['NAMAREK'] ?></td> <!-- nama rek -->
			<td><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?></td> <!-- Nama WP -->
			<td><?php echo $list['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td> <!-- Alanat OP -->
			<td><?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo sprintf('%07d',$list['TBLDAFTAR_NOPOK']) ?>.<?php echo sprintf('%02d',$list['TBLKECAMATAN_ID']) ?>.<?php echo sprintf('%02d',$list['TBLKELURAHAN_ID']) ?></td> <!-- NPWPD -->
			<td><?php echo LokalIndonesia::getBulan($list['TBLPENDATAAN_BLNPAJAK']) ?> 20<?php echo $list['TBLPENDATAAN_THNPAJAK'] ?></td> <!-- Masa -->
			<td align="center"><?php echo $list[$data['NamaTBL'].'_TGLSURATANGSUR'] ?>/<?php echo $list[$data['NamaTBL'].'_BLNSURATANGSUR'] ?>/<?php echo $list[$data['NamaTBL'].'_THNSURATANGSUR'] ?></td>
			<td align="center"><?php echo $list[$data['NamaTBL'].'_REGSURATANGSUR'] ?></td> <!-- Nama WP -->
			<td align="center"><?php echo LokalIndonesia::ribuan($list['HITUNG']) ?></td> <!-- Angsuran Ke -->
			<td align="	right"><?php echo LokalIndonesia::ribuan($list['ANGSURAN']) ?></td> <!-- Ketetapan Pokok -->
			<td align="	right"><?php echo LokalIndonesia::ribuan($list['SETORAN']) ?></td> <!-- Denda -->
			<td align="	right"><?php echo LokalIndonesia::ribuan($list['TUNGGAKAN']) ?></td><!-- Tunggakan -->
		</tr>
		<?php	
		}}
		 $no++;
		?>
	<?php endforeach ?>
</tbody>
</table>
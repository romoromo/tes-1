<?php Yii::import('ext.LokalIndonesia'); ?>
<table id="dt_basic" width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
	<thead>
		<tr>
			<th data-hide="phone" align="center"> NO</th>
			<th data-hide="phone" align="center"> STATUS OBJEK PAJAK</th>
			<th data-hide="phone" align="center"> NAMA</th>
			<th data-hide="phone" align="center"> NPWPD</th>
			<th data-hide="phone" align="center"> TAHUN PAJAK</th>
			<th data-hide="phone" align="center"> ALAMAT</th>
			<th data-hide="phone" align="center"> JAN</th>
			<th data-hide="phone" align="center"> FEB</th>
			<th data-hide="phone" align="center"> MAR</th>
			<th data-hide="phone" align="center"> APR</th>
			<th data-hide="phone" align="center"> MEI</th>
			<th data-hide="phone" align="center"> JUN</th>
			<th data-hide="phone" align="center"> JUL</th>
			<th data-hide="phone" align="center"> AGU</th>
			<th data-hide="phone" align="center"> SEP</th>
			<th data-hide="phone" align="center"> OKT</th>
			<th data-hide="phone" align="center"> NOV</th>
			<th data-hide="phone" align="center"> DES</th>
			<th data-hide="phone" align="center"> JUMLAH</th>
			<th data-hide="phone" align="center"> SKPD</th>
		</tr>
	</thead>
	<tbody>
		<?php $jmlh = 0; ?>
		<?php $totaltunggakan = 0; ?>
		<?php $no = 1;
		foreach ($data['cari'] as $list) : ?>
			<tr>
				<td><?php echo $no++; ?></td> <!-- NO -->
				<td><?php 
					if ($list['TBLDAFTAR_ISAKTIF']=='Y') {
						echo 'MASIH AKTIF'; 
					} else {
						echo 'TUTUP';
					}	
					?></td>
				<td><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?></td> <!-- Nama WP -->
				<td><?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo sprintf('%07d', $list['TBLDAFTAR_NOPOK']) ?>.<?php echo sprintf('%02d', $list['TBLKECAMATAN_IDBADANUSAHA']) ?>.<?php echo sprintf('%02d', $list['TBLKELURAHAN_IDBADANUSAHA']) ?></td> <!-- NPWPD -->
				<td>20<?php echo sprintf('%02d', $list['TBLPENDATAAN_THNPAJAK']) ?></td>
				<td><?php echo $list['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td> <!-- TH -->
				<td><?php echo LokalIndonesia::ribuan($list['TUNGAKAN_JANUARI']) ?></td>
				<td><?php echo LokalIndonesia::ribuan($list['TUNGAKAN_FEBRUARI']) ?></td>
				<td><?php echo LokalIndonesia::ribuan($list['TUNGAKAN_MARET']) ?></td>
				<td><?php echo LokalIndonesia::ribuan($list['TUNGAKAN_APRIL']) ?></td>
				<td><?php echo LokalIndonesia::ribuan($list['TUNGAKAN_MEI']) ?></td>
				<td><?php echo LokalIndonesia::ribuan($list['TUNGAKAN_JUNI']) ?></td>
				<td><?php echo LokalIndonesia::ribuan($list['TUNGAKAN_JULI']) ?></td>
				<td><?php echo LokalIndonesia::ribuan($list['TUNGAKAN_AGUSTUS']) ?></td>
				<td><?php echo LokalIndonesia::ribuan($list['TUNGAKAN_SEPTEMBER']) ?></td>
				<td><?php echo LokalIndonesia::ribuan($list['TUNGAKAN_OKTOBER']) ?></td>
				<td><?php echo LokalIndonesia::ribuan($list['TUNGAKAN_NOVEMBER']) ?></td>
				<td><?php echo LokalIndonesia::ribuan($list['TUNGAKAN_DESEMBER']) ?></td>
				<td><?php echo LokalIndonesia::ribuan($list['JUMLAH_TUNGGAKAN']) ?></td>
				<td><?php echo LokalIndonesia::ribuan($list['JUMLAH_SKPD']) ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});
</script>
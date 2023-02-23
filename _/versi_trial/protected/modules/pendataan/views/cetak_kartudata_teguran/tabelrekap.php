<div align="center">	
<h3>REKAP TEGURAN <?php echo $data['judul'] ?></h3>
<h3> TAHUN : <?php echo $data['tahun_pajak'] ?></h3>
</div>
<br>
<br>
<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
	<thead>
		<tr>
			<th data-hide="phone"><div class="center"> No</th>
		    <th data-hide="phone"><div class="center"> NPWPD</div></th>
		    <th data-hide="phone"><div class="center"> Wajib Pajak</div></th>
		    <th data-class="expand"><div class="center"> Alamat</div></th>
		    <th data-hide="phone, tablet"><div class="center"> JANUARI</div></th>
		    <th data-hide="phone, tablet"><div class="center"> FEBRUARI</div></th>
		    <th data-hide="phone, tablet"><div class="center"> MARET</div></th>
		    <th data-hide="phone, tablet"><div class="center"> APRIL</div></th>
		    <th data-hide="phone, tablet"><div class="center"> MEI</div></th>
		    <th data-hide="phone, tablet"><div class="center"> JUNI</div></th>
		    <th data-hide="phone, tablet"><div class="center"> JULI</div></th>
		    <th data-hide="phone, tablet"><div class="center"> AGUSTUS</div></th>
		    <th data-hide="phone, tablet"><div class="center"> SEPTEMBER</div></th>
		    <th data-hide="phone, tablet"><div class="center"> OKTOBER</div></th>
		    <th data-hide="phone, tablet"><div class="center"> NOVEMBER</div></th>
		    <th data-hide="phone, tablet"><div class="center"> DESEMBER</div></th>
		</tr>
	</thead>
	<tbody>
	<?php $no = 1; foreach ($data['hasil'] as $row): ?>
		<tr>
			<td><?= $no++ ?>.</td>
			<td><?= sprintf('%07d',$row['TBLDAFTAR_NOPOK']) ?></td>
			<td><?= $row['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
			<td><?= $row['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td>
			<td align="right"><?= $row['JAN'] ?></td>
			<td align="right"><?= $row['FEB'] ?></td>
			<td align="right"><?= $row['MAR'] ?></td>
			<td align="right"><?= $row['APR'] ?></td>
			<td align="right"><?= $row['MEI'] ?></td>
			<td align="right"><?= $row['JUN'] ?></td>
			<td align="right"><?= $row['JUL'] ?></td>
			<td align="right"><?= $row['AGT'] ?></td>
			<td align="right"><?= $row['SEP'] ?></td>
			<td align="right"><?= $row['OKT'] ?></td>
			<td align="right"><?= $row['NOV'] ?></td>
			<td align="right"><?= $row['DES'] ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>


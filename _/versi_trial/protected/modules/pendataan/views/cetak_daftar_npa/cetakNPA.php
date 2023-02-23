<div align="center">	
<h3>REKAP NPA <?php echo $data['judul'] ?></h3>
<h3> TAHUN : <?php echo $data['tahun_pajak'] ?></h3>
</div>
<br>
<br>
<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
	<thead>
		<tr>
			<th data-hide="phone"><div class="center"> No</th>
		    <th data-hide="phone"><div class="center"> NPWPD</div></th>
		    <th data-hide="phone"><div class="center"> Kec</div></th>
		    <th data-hide="phone"><div class="center"> Kel</div></th>
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
	<?php $no = 1; foreach ($data['laporan'] as $row): ?>
		<tr>
			<td><?= $no++ ?>.</td>
			<td><?= sprintf('%07d',$row['TBLDAFTAR_NOPOK']) ?></td>
			<td><?= sprintf('%02d',$row['TBLKECAMATAN_IDBADANUSAHA']) ?></td>
			<td><?= sprintf('%02d',$row['TBLKELURAHAN_IDBADANUSAHA']) ?></td>
			<td><?= $row['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
			<td><?= $row['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['NPAJAN']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['NPAFEB']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['NPAMAR']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['NPAAPR']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['NPAMEI']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['NPAJUN']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['NPAJUL']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['NPAAGT']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['NPASEP']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['NPAOKT']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['NPANOV']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['NPADES']) ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>

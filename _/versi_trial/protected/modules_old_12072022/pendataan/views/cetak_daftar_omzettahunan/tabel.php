<div align="center">	
<h3>REKAP OMZET PAJAK </h3>
</div>
<br>
<br>
Kecamatan
<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
	<thead>
		<tr>
			<th width="15"> No</th>
		    <th data-hide="phone"><div class="center"> NPWPD</div></th>
		    <th data-hide="phone"><div class="center"> Wajib Pajak</div></th>
		    <th data-class="expand"><div class="center"> Alamat</div></th>
		    <th data-hide="phone, tablet"><div class="center"> JANUARI</div></th>
		    <th data-hide="phone, tablet"><div class="center"> FEBRUARI</div></th>
		    <th data-hide="phone, tablet"><div class="center"> MARET</div></th>
		    <th data-hide="phone, tablet"><div class="center"> APRIL</div></th>
		    <th data-hide="phone, tablet"><div class="center"> MEI</div></th>
		    <th data-hide="phone, tablet"><div class="center"> JUNI</div></th>
		</tr>
	</thead>
	<tbody>
	<?php $no = 1; foreach ($data['laporan'] as $row): ?>
		<tr>
			<td><?= $no++ ?>.</td>
			<td><?= $row['TBLDAFTAR_GOLONGAN'] ?></td>
			<td><?= $row['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
			<td><?= $row['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['JANUARI']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['FEBRUARI']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['MARET']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['APRIL']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['MEI']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['JUNI']) ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>

<div align="center">	
<h3>REKAP OMZET PAJAK </h3>
</div>
<br>
<br>
Kecamatan
<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
	<thead>
		<tr>
			<th width="15"> No</th>
		    <th data-hide="phone"><div class="center"> NPWPD</div></th>
		    <th data-hide="phone"><div class="center"> Wajib Pajak</div></th>
		    <th data-class="expand"><div class="center"> Alamat</div></th>
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
			<td><?= $row['TBLDAFTAR_GOLONGAN'] ?></td>
			<td><?= $row['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
			<td><?= $row['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['JULI']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['AGUSTUS']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['SEPTEMBER']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['OKTOBER']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['NOVEMBER']) ?></td>
			<td align="right"><?= LokalIndonesia::ribuan($row['DESEMBER']) ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
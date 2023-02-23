<style type="text/css">
	table {
		border-collapse: collapse;
	}
	thead {
		background-color: #ccc;
	}
	th {
		text-align: center !important;
		text-transform: uppercase !important;
	}
</style>
<br>
<table width="100%" border="0">
	<tr>
		<th>
			<p style="font-size:20px;">BADAN PENGELOLAAN KEUANGAN DAN <br> ASET DAERAH</p>
		</th>
		<th>
			<p align="left">DAFTAR JATUH TEMPO PAJAK REKLAME <br>
			TAHUN : <?php echo $tahun_pajak; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; BULAN : <?php echo $nama_bulan; ?>
			<br>TANGGAL ENTRY SPT : <?php echo $tanggal_entryspt_view; ?>
			<br>DENGAN CARA : <?php echo $nama_jenispajak ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php echo $nama_penetapan ?></P>
		</th>
		<th></th>
	</tr>
</table>
<br>
<table width="100%" border="1" cellpadding="5">
	<thead>
		<tr>
			<th><div class="center">No</div></th>
			<th><div class="center">No.POK</div></th>            
			<th><div class="center">Nama Wajib Pajak</div></th>
			<th><div class="center">Lokasi</div></th>
			<th><div class="center">JREK</div></th>
			<th><div class="center">WKT</div></th>
			<th><div class="center">KA</div></th>
			<th><div class="center">LS</div></th>
			<th><div class="center">FJ</div></th>
			<th><div class="center">TS</div></th>
			<th><div class="center">SP</div></th>
			<th><div class="center">PANJG</div></th>
			<th><div class="center">LEBAR</div></th>
			<th><div class="center">NITI</div></th>
			<th><div class="center">TGL.AWAL</div></th>
			<th><div class="center">TGL.AKHIR</div></th>
			<th><div class="center">PAJAK</div></th>
	  </tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($data['list'] as $list) : ?>
		<tr>
			<th><div class="center"><?php $no++; ?></div></th>
			<th><div class="center"><?php echo $list['TBLDAFTAR_NOPOK'] ?></div></th>            
			<th><div class="center"><?php echo $list['TBLDAFTAR_BADANUSAHANAMA']; ?> </div></th>
			<th><div class="center"><?php echo $list['TBLDAFTREKLAME_NAMAJALAN'] ?></div></th>
			<th><div class="center"><?php echo $list['TBLDAFTREKLAME_JMLHREKLAME'] ?></div></th>
			<th><div class="center"><?php echo $list['TBLDAFTREKLAME_JUMLAHHARI'] ?></div></th>
			<th><div class="center"><?php echo $list['TBLDAFTREKLAME_SKORKAWASAN'] ?></div></th>
			<th><div class="center"><?php echo $list['LS'] ?></div></th>
			<th><div class="center"><?php echo $list['FJ'] ?></div></th>
			<th><div class="center"><?php echo $list['ST'] ?></div></th>
			<th><div class="center"><?php echo $list['REFKETINGGIAN_SKOR'] ?></div></th>
			<th><div class="center"><?php echo $list['TBLDAFTREKLAME_PANJANG'] ?></div></th>
			<th><div class="center"><?php echo $list['TBLDAFTREKLAME_LEBAR'] ?></div></th>
			<th><div class="center"><?php echo $list['TBLDAFTREKLAME_NILAISTRATEGIS'] ?></div></th>
			<th><div class="center"><?php echo $list['TBLDAFTREKLAME_TGLMULAIREKLAME'] ?> / <?php echo $list['TBLDAFTREKLAME_BLNMULAIREKLAME'] ?> / <?php echo $list['TBLDAFTREKLAME_THNMULAIREKLAME'] ?>  </div></th>
			<th><div class="center"><?php echo $list['TBLDAFTREKLAME_TGLAKHIRREKLAME'] ?> /<?php echo $list['TBLDAFTREKLAME_BLNAKHIRREKLAME'] ?> /<?php echo $list['TBLDAFTREKLAME_THNAKHIRREKLAME'] ?> </div></th>
			<th><div class="center"><?php echo LokalIndonesia::rupiah($list['TBLDAFTREKLAME_PAJAK']) ?></div></th>
		</tr>
		<tr>
			<th><div class="center">&nbsp;</div></th>
			<th><div class="center">&nbsp;</div></th>            
			<th colspan="5"><div class="center"><?php echo $list['TBLDAFTREKLAME_KETERANGAN1'] ?></div></th>
			<th colspan="8"><div class="center"><?php echo $list['TBLDAFTREKLAME_NAMAJALAN'] ?></div></th>
			<th><div class="center"></div></th>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
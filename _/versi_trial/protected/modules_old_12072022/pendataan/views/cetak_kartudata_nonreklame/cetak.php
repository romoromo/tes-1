<style type="text/css">
	.font{
		font-family: monospace;"
	}

	.table-bordered {
		border: 1px solid #000000;
	}
	.table {
		width: 100%;
	}
	table {
		border-collapse: collapse;
	}
</style>
<!-- KEPALA CETAK-->
<table width="100%" class="font">
	<tr>
		<td colspan="2" style="width: 50%">BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH</td>		
		<td colspan="6" style="width: 50%">
			<center>
				DAFTAR KARTU DATA <?php echo $data['namarek']; ?>
			</center>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<table>
				<tr>
					<td colspan="3" >Tahun Pajak</td>
					<td>:</td>
					<td align="left">20<?php echo $masapajak = $_REQUEST['TBLPENDATAAN_THNPAJAK'] ?></td>
				</tr>
				<tr>
					<td colspan="3" >Bulan Pajak</td>
					<td>:</td>
					<td><?php echo LokalIndonesia::getBulan($blnpajak = $_REQUEST['TBLPENDATAAN_BLNPAJAK']) ?></td>
				</tr>
				<tr>
					<td colspan="3" >Tanggal Entri SPT</td>
					<td>:</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3" >Dengan Cara</td>
					<td>:</td>
					<td></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br>
<!--END KEPALA CETAK-->

<!---BODY CETAK-->
<table width="100%" class="font table table-bordered" border="1" >
	<thead>
		<tr>
			<td align="center">No.</td>		
			<td align="center">P</td>
			<td align="center">NOPOK</td>
			<td align="center">KEC</td>
			<td align="center">KEL</td>
			<td align="center">NAMA WAJIB PAJAK</td>
			<td align="center">ALAMAT WAJIB PAJAK</td>
			<td align="center">REKENING</td>
			<td align="center">TAHUN</td>
			<td align="center">BULAN</td>
			<td align="center">TANGGAL SPT</td>
			<td align="center">OMSET</td>
		</tr>
	</thead>
	<tbody>
    <?php $total=0;?>
    <?php $no=1; foreach ($data['hasil'] as $list) :?>
    <?php $total= $total+$list['OMSET'] ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td>P</td>
			<td><?php echo (sprintf('%07d',$list['TBLDAFTAR_NOPOK'])); ?></td>
			<td><?php echo (sprintf('%02d',$list['TBLKECAMATAN_ID'])); ?></td>
			<td><?php echo (sprintf('%02d',$list['TBLKELURAHAN_ID'])); ?></td>
			<td><?php echo $list['TBLDAFTAR_BADANUSAHANAMA']; ?></td>
			<td><?php echo $list['TBLDAFTAR_BADANUSAHAALAMAT']; ?></td>
			<td><?php echo $list['NMREKENING']; ?></td>
			<td>20<?php echo $list['TBLPENDATAAN_THNPAJAK']; ?></td>
			<td><?php echo $list['TBLPENDATAAN_BLNPAJAK']; ?></td>
			<td><?php echo $list['TGLENTRI']; ?>-<?php echo $list['BLNENTRI']; ?>-20<?php echo $list['THNENTRI']; ?></td>
			<td><?php echo LokalIndonesia::ribuan($list['OMSET']); ?></td>
		</tr>
    <?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="11">
				<p align="right">TOTAL</p>
			</td>
			<td><?php echo LokalIndonesia::ribuan($total); ?></td>
		</tr>
	</tfoot>
</table>
<!---END BODY CETAK-->

<br><br>
<!---END FOOTER CETAK-->
<table width="85%" class="font" align="center">
	<tr>
		<td colspan="2">MENGETAHUI</td>
		<td colspan="2"></td>
		<td colspan="3">YOGYAKARTA, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
	</tr>
	<tr>
		<td colspan="2" style="width: 15%"><p><?php echo $data['jab2']['TBLPEJABAT_URAIAN']; ?></p></td>		
		<td colspan="2" style="width: 25%"><p><?php echo $data['jab3']['TBLPEJABAT_URAIAN']; ?></p></td>
		<td colspan="3" style="width: 30%"><P><?php echo $data['jab4']['TBLPEJABAT_URAIAN']; ?></P></td>
	</tr>
	<tr>
		<td style="height: 60px"></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="2" ><?php echo $data['jab2']['TBLPEJABAT_NAMA']; ?></td>		
		<td colspan="2" ><?php echo $data['jab3']['TBLPEJABAT_NAMA']; ?></td>
		<td colspan="3" ><?php echo $data['jab4']['TBLPEJABAT_NAMA']; ?></td>
	</tr>
	<tr>
		<td colspan="2" >--------------------</td>		
		<td colspan="2" >--------------------</td>
		<td colspan="3" >--------------------</td>
	</tr>
	<tr>
		<td colspan="2" >NIP.<?php echo $data['jab2']['TBLPEJABAT_NIP']; ?></td>		
		<td colspan="2" >NIP.<?php echo $data['jab3']['TBLPEJABAT_NIP']; ?></td>
		<td colspan="3" >NIP.<?php echo $data['jab4']['TBLPEJABAT_NIP']; ?></td>
	</tr>
</table>
<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
	<thead>
		<tr>
			<th >No.</th>
			<th >NOSKP</th>
			<th >TANGGAL SKPD </th>
			<th >MASA PAJAK</th>
			<th >NPWPD</th>
			<th >NAMA WP</th>
			<th >ALAMAT</th>
			<th >NO DATA</th>
			<th >NASKAH</th>
			<th >LOKASI</th>
			<th >UKURAN</th>
			<th >PANJANG</th>
			<th >LEBAR</th>
			<th >SP</th>
			<th >PENEMPATAN</th>
			<th >TGL MULAI</th>
			<th >TGL AKHIR</th>
			<th >KETERANGAN</th>
			<th >RPSKP</th>
			<!-- <th >TANGGAL SETOR</th> -->
			<th >JANUARI</th>
			<th >FEBRUARI</th>
			<th >MARET</th>
			<th >APRIL</th>
			<th >MEI</th>
			<th >JUNI</th>
			<th >JULI</th>
			<th >AGUSTUS</th>
			<th >SEPTEMBER</th>
			<th >OKTOBER</th>
			<th >NOVEMBER</th>
			<th >DESEMBER</th>
			<th >SSPD</th>
			<th >SISA</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach  ($data['cari'] as $row): ?>
		<tr>
			<td><?=$no++;?></td>
			<td><?=$row['TBLDAFTREKLAME_NOMORSKPD'];?></td>
			<td><?=$row['TBLDAFTREKLAME_TGLSKPD'];?>/<?=$row['TBLDAFTREKLAME_BLNSKPD'];?>/<?=$row['TBLDAFTREKLAME_THNSKPD'] +2000 ;?></td> 
			<td><?=$row['TBLPENDATAAN_THNPAJAK'] +2000;?></td> 
			<td><?=$row['TBLDAFTAR_NOPOK'];?></td> 
			<td><?=$row['TBLDAFTAR_BADANUSAHANAMA'];?></td>
			<td><?=$row['TBLDAFTAR_BADANUSAHAALAMAT'];?></td>
			<td><?=$row['TBLPENDATAAN_PAJAKKE'];?></td> 
			<td><?=$row['TBLDAFTREKLAME_KETERANGAN1'];?></td> 
			<td><?=$row['TBLDAFTREKLAME_KETERANGAN2'];?></td>
			<td><?=$row['TBLDAFTREKLAME_ISIREKLAME'];?></td>
			<td><?=$row['TBLDAFTREKLAME_PANJANG'];?></td>
			<td><?=$row['TBLDAFTREKLAME_LEBAR'];?></td>
			<td><?=$row['REFKETINGGIAN_SKOR'];?></td>
			<td><?=$row['TBLDAFTREKLAME_PENEMPATAN'];?></td>
			<td><?=$row['TBLDAFTREKLAME_TGLMULAIREKLAME'];?>/<?=$row['TBLDAFTREKLAME_BLNMULAIREKLAME'];?>/<?=$row['TBLDAFTREKLAME_THNMULAIREKLAME'] +2000 ;?></td> 
			<td><?=$row['TBLDAFTREKLAME_TGLAKHIRREKLAME'];?>/<?=$row['TBLDAFTREKLAME_BLNAKHIRREKLAME'];?>/<?=$row['TBLDAFTREKLAME_THNAKHIRREKLAME'] +2000 ;?></td> 
			<td><?=$row['TBLREKENING_NAMAREKENING'];?></td>
			<td><?= LokalIndonesia::ribuan($row['TBLDAFTREKLAME_PAJAKSKPD']);?></td>
			<td><?=$row['JAN'];?></td>
			<td><?=$row['FEB'];?></td>
			<td><?=$row['MAR'];?></td>
			<td><?=$row['APR'];?></td>
			<td><?=$row['MEI'];?></td>
			<td><?=$row['JUN'];?></td>
			<td><?=$row['JUL'];?></td>
			<td><?=$row['AGT'];?></td>
			<td><?=$row['SEP'];?></td>
			<td><?=$row['OKT'];?></td>
			<td><?=$row['NOV'];?></td>
			<td><?=$row['DES'];?></td>
			<td>Rp. <?= LokalIndonesia::ribuan($row['TBLDAFTREKLAME_RUPIAHSETOR']);?></td>
			<td>Rp. <?= LokalIndonesia::ribuan(abs($row['TBLDAFTREKLAME_RUPIAHSETOR'] - $row['TBLDAFTREKLAME_PAJAKSKPD'])); ?></td> 

		</tr>
	<?php endforeach ?>
</tbody>
</table>


<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
	<tbody>
		<tr>
			<td height="18" align="left"><font face="Arial"><br></font></td>
			<td colspan=20 align="center" valign=bottom><font face="Arial"</font></td>
				<td align="left"><font face="Arial"><br></font></td>
				<td align="left"><font face="Arial"><br></font></td>
				<td align="left"><font face="Arial"><br></font></td>
				<td align="left"><font face="Arial"><br></font></td>
				<td align="left"><font face="Arial"><br></font></td>
				<td align="left"><font face="Arial"><br></font></td>
			</tr>
		<tr>
			<td height="18" align="left"><font face="Arial"><br></font></td>
			<td colspan=10 align="center" valign=bottom><font face="Arial" color="#000000">MENGETAHUI</font></td>
				<td align="left"><font face="Arial"><br></font></td>
				<td align="left"><font face="Arial"><br></font></td>
				<td align="left"><font face="Arial"><br></font></td>
				<td align="left"><font face="Arial"><br></font></td>
				<td align="left"><font face="Arial"><br></font></td>
				<td align="left"><font face="Arial"><br></font></td>
			</tr>
			<tr>
				<td height="18" align="left"><font face="Arial"><br></font></td>
				<td colspan=10 align="center" valign=bottom><font face="Arial" color="#000000">KASUBBID PEMBUKUAN PENDAPATAN DAERAH</font></td>
					<td align="left"><font face="Arial"><br></font></td>
					<td colspan=10 align="center" valign=bottom><font face="Arial" color="#000000">PEMEGANG BUKU KENDALI</font></td>
					<td align="left"><font face="Arial"><br></font></td>
					<td align="left"><font face="Arial"><br></font></td>
				</tr>
				<tr>
					<td height="18" align="left"><font face="Arial"><br></font></td>
					<td align="center" valign=bottom><font face="Arial" color="#000000"><br></font></td>
					<td align="center" valign=bottom><font face="Arial" color="#000000"><br></font></td>
					<td align="center" valign=bottom><font face="Arial" color="#000000"><br></font></td>
					<td align="left"><font face="Arial"><br></font></td>
					<td align="center" valign=bottom><font face="Arial" color="#000000"><br></font></td>
					<td align="center" valign=bottom><font face="Arial" color="#000000"><br></font></td>
					<td align="center" valign=bottom><font face="Arial" color="#000000"><br></font></td>
					<td align="left"><font face="Arial"><br></font></td>
					<td align="left"><font face="Arial"><br></font></td>
				</tr>
				<tr>
					<td height="18" align="left"><font face="Arial"><br></font></td>
					<td align="left"><font face="Arial" color="#000000"><br></font></td>
					<td align="left"><font face="Arial" color="#000000"><br></font></td>
					<td align="left"><font face="Arial" color="#000000"><br></font></td>
					<td align="left"><font face="Arial"><br></font></td>
					<td align="left"><font face="Arial" color="#000000"><br></font></td>
					<td align="left"><font face="Arial" color="#000000"><br></font></td>
					<td align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial" color="#000000"><br></font></td>
					<td align="left"><font face="Arial"><br></font></td>
					<td align="left"><font face="Arial"><br></font></td>
				</tr>
				<tr>
					<td height="18" align="left"><font face="Arial"><br></font></td>
					<td align="left"><font face="Arial" color="#000000"><br></font></td>
					<td align="left"><font face="Arial" color="#000000"><br></font></td>
					<td align="left"><font face="Arial" color="#000000"><br></font></td>
					<td align="left"><font face="Arial"><br></font></td>
					<td align="left"><font face="Arial" color="#000000"><br></font></td>
					<td align="left"><font face="Arial" color="#000000"><br></font></td>
					<td align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial" color="#000000"><br></font></td>
					<td align="left"><font face="Arial"><br></font></td>
					<td align="left"><font face="Arial"><br></font></td>
				</tr>
				<tr>
					<td height="18" align="left"><font face="Arial"><br></font></td>
					<td colspan=10 align="center" valign=bottom><u><font face="Arial" color="#000000">???</font></u></td>
						<td align="left"><font face="Arial"><br></font></td>
						<td colspan=10 align="center" valign=bottom><u><font face="Arial" color="#000000">???</font></u></td>
						<td align="left"><font face="Arial"><br></font></td>
						<td align="left"><font face="Arial"><br></font></td>
					</tr>
					<tr>
						<td height="18" align="left"><font face="Arial"><br></font></td>
						<td colspan=10 align="center" valign=bottom><font face="Arial" color="#000000">NIP.???</font></td>
							<td align="left"><font face="Arial"><br></font></td>
							<td colspan=10 align="center" valign=bottom><font face="Arial" color="#000000">NIP.???</font></td>
							<td align="left"><font face="Arial"><br></font></td>
							<td align="left"><font face="Arial"><br></font></td>
						</tr>
						<tr>
							<td height="18" align="left"><font face="Arial"><br></font></td>
							<td colspan=10 align="center" valign=bottom><font face="Arial" color="#000000"></font></td>
							<td align="left"><font face="Arial"><br></font></td>
							<td align="left"><font face="Arial" color="#000000"><br></font></td>
							<td align="left"><font face="Arial" color="#000000"><br></font></td>
							<td align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><b><font face="Arial" color="#000000"><br></font></td>
							<td align="left"><font face="Arial"><br></font></td>
							<td align="left"><font face="Arial"><br></font></td>
						</tr>
					</tbody>
				</table>



				<script type="text/javascript">
//     jQuery(document).ready(function($) {
//          reloadDT('dt_basic');
//          $('.cbx_tetapkan').prop("checked" , false);
//     });

//     /*jQuery(document).ready(function($) {
//         var elm = $("input[name='nopokPajak']");
//         cekAll(elm);
//     });*/

// function cekAll(elemen) {
//     $('.cbx_tetapkan').prop("checked" , elemen.checked);
// }

// // $(".cbx_tetapkan").click(function(event) {
// //     if (!$(event.target).prop('checked')) {
// //         window.id_eksepsi += ','+$(event.target).val();
// //         // cari();
// //     }

// // });
</script>
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
		<?php $no=1; $jumlahskp=0; $jumlahsetor=0; $totalsisa=0; $totaljan=0; $totalfeb=0; $totalmar=0; $totalapr=0; $totalmei=0; $totaljun=0; $totaljul=0; $totalagt=0; $totalsep=0; $totalokt=0; $totalnov=0; $totaldes=0;foreach  ($data['cari'] as $row): ?>
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
			<td><?php $jumlahskp += $row['TBLDAFTREKLAME_PAJAKSKPD'] ; echo LokalIndonesia::ribuan($row['TBLDAFTREKLAME_PAJAKSKPD']);?></td>
			<td><?php $totaljan += $row['BYRJAN'] ; echo $row['JAN']; ?></td>
			<td><?php $totalfeb += $row['BYRFEB'] ; echo $row['FEB'];?></td>
			<td><?php $totalmar += $row['BYRMAR'] ; echo $row['MAR'];?></td>
			<td><?php $totalapr += $row['BYRAPR'] ; echo $row['APR'];?></td>
			<td><?php $totalmei += $row['BYRMEI'] ; echo $row['MEI'];?></td>
			<td><?php $totaljun += $row['BYRJUN'] ; echo $row['JUN'];?></td>
			<td><?php $totaljul += $row['BYRJUL'] ; echo $row['JUL'];?></td>
			<td><?php $totalagt += $row['BYRAGT'] ; echo $row['AGT'];?></td>
			<td><?php $totalsep += $row['BYRSEP'] ; echo $row['SEP'];?></td>
			<td><?php $totalokt += $row['BYROKT'] ; echo $row['OKT'];?></td>
			<td><?php $totalnov += $row['BYRNOV'] ; echo $row['NOV'];?></td>
			<td><?php $totaldes += $row['BYRDES'] ; echo $row['DES'];?></td>
			<td><?php $jumlahsetor += $row['TBLDAFTREKLAME_RUPIAHSETOR'] ; echo LokalIndonesia::ribuan($row['TBLDAFTREKLAME_RUPIAHSETOR']);?></td>
			<td><?php $totalsisa += ($row['TBLDAFTREKLAME_PAJAKSKPD'] - $row['TBLDAFTREKLAME_RUPIAHSETOR']) ; echo LokalIndonesia::ribuan($row['TBLDAFTREKLAME_PAJAKSKPD'] - $row['TBLDAFTREKLAME_RUPIAHSETOR']); ?></td> 

		</tr>
	<?php endforeach ?>
	<tr>
			<td align="right" colspan="18">TOTAL</td>
			<td><?php echo LokalIndonesia::ribuan($jumlahskp); ?></td>
			<td><?php echo LokalIndonesia::ribuan($totaljan) ; ?></td>
			<td><?php echo LokalIndonesia::ribuan($totalfeb) ; ?></td>
			<td><?php echo LokalIndonesia::ribuan($totalmar) ; ?></td>
			<td><?php echo LokalIndonesia::ribuan($totalapr) ; ?></td>
			<td><?php echo LokalIndonesia::ribuan($totalmei) ; ?></td>
			<td><?php echo LokalIndonesia::ribuan($totaljun) ; ?></td>
			<td><?php echo LokalIndonesia::ribuan($totaljul) ; ?></td>
			<td><?php echo LokalIndonesia::ribuan($totalagt) ; ?></td>
			<td><?php echo LokalIndonesia::ribuan($totalsep) ; ?></td>
			<td><?php echo LokalIndonesia::ribuan($totalokt) ; ?></td>
			<td><?php echo LokalIndonesia::ribuan($totalnov) ; ?></td>
			<td><?php echo LokalIndonesia::ribuan($totaldes) ; ?></td>
			<td><?php echo LokalIndonesia::ribuan($jumlahsetor) ; ?></td>
			<td><?php echo LokalIndonesia::ribuan($totalsisa) ; ?></td>
			</tr>
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
				<td colspan=10 align="center" valign=bottom><font face="Arial" color="#000000"><?php echo $data['jab3']['TBLPEJABAT_URAIAN']; ?></font></td>
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
					<td colspan=10 align="center" valign=bottom><u><font face="Arial" color="#000000"><?php echo $data['jab3']['TBLPEJABAT_NAMA']; ?></font></u></td>
						<td align="left"><font face="Arial"><br></font></td>
						<td colspan=10 align="center" valign=bottom><u><font face="Arial" color="#000000"><?php echo $data['jab4']['TBLPEJABAT_NAMA']; ?></font></u></td>
						<td align="left"><font face="Arial"><br></font></td>
						<td align="left"><font face="Arial"><br></font></td>
					</tr>
					<tr>
						<td height="18" align="left"><font face="Arial"><br></font></td>
						<td colspan=10 align="center" valign=bottom><font face="Arial" color="#000000">NIP. <?php echo $data['jab3']['TBLPEJABAT_NIP']; ?></font></td>
							<td align="left"><font face="Arial"><br></font></td>
							<td colspan=10 align="center" valign=bottom><font face="Arial" color="#000000">NIP. <?php echo $data['jab4']['TBLPEJABAT_NIP']; ?></font></td>
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
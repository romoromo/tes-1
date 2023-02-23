<?php Yii::import('ext.LokalIndonesia'); ?>

<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" cellpadding="5" border="0">
	<!-- <table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" > -->
		<thead>
			<tr>
				<th colspan="18" style="text-align-last:left;">BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH<br>
					DAFTAR SKPDKB   : <?php echo  $data['namapajak']  ?> <br>
					TAHUN PAJAK     : <?php echo  $data['thnpndataanpajak']  ?>
				</th>
			</tr>
			<thead>  
				<tr>
					<th>NO</th>
					<th>TGL.SKPDKB</th>
					<th>NO.KB</th>
					<th>NAMA WAJIB PAJAK</th>
					<th>NPWPD</th>
					<th>TH</th>
					<th>BL</th>
					<th>HR</th>
					<th>PEMERIKSAAN</th>
					<th>KENAIKAN</th>
					<th>BUNGA</th>
					<th>SETOR</th>
					<th>KEKURANGAN</th>
					<th>STATUS ANGSUR</th>
				</tr>
			</thead>
			<tbody style="text-align: center;">
				<?php $totalperiksa  = 0;
				$totaldenda          = 0; 
				$totalbunga          = 0;
				$totalsetor          = 0;
				$totalkb             = 0;
				?>
				<?php $no=1; foreach ($data['cetak'] as $value): ?>
				<?php 
				$totalperiksa    = $totalperiksa + $value[''.$data['namatabel'].'_PAJAKPERIKSA'];
				$totaldenda      = $totaldenda + $value['KENAIKANKRGBAYAR'];
				$totalbunga      = $totalbunga + $value[''.$data['namatabel'].'_BUNGAKRGBAYAR'];
				$totalsetor      = $totalsetor + $value['TBLSETORANBPD_RUPIAHSETOR'];
				$sisa 			 = $value[''.$data['namatabel'].'_RUPIAHKRGBAYAR'] - $value['TBLSETORANBPD_RUPIAHSETOR'];
				$totalkb         = $totalkb + $sisa; 
				?>
				<tr>
					<td style="text-align: center;"><?php echo $no++; ?></td>
					<td style="text-align: right;"><?php echo $value[''.$data['namatabel'].'_TGLKURANGBAYAR'] .'-'. $value[''.$data['namatabel'].'_BLNKURANGBAYAR'] .'-20'. $value[''.$data['namatabel'].'_THNKURANGBAYAR']; ?></td>
					<td style="text-align: right;"><?php echo $value[''.$data['namatabel'].'_REGKURANGBAYAR'] ?></td>
					<td style="text-align: left;"><?php echo $value['TBLDAFTAR_BADANUSAHANAMA']; ?></td>
					<td style="text-align: right;"><?php echo $value['TBLDAFTAR_JENISPENDAPATAN'] ?>.<?php echo $value['TBLDAFTAR_GOLONGAN'] ?>.<?php echo sprintf("%07d", $value['TBLDAFTAR_NOPOK']); ?>.<?php echo sprintf("%02d",$value['TBLKECAMATAN_IDBADANUSAHA']) ?>.<?php echo sprintf("%02d",$value['TBLKELURAHAN_IDBADANUSAHA']); ?></td>
					<td style="text-align: right;"><?php echo $value['TBLPENDATAAN_THNPAJAK'] ?></td>
					<td style="text-align: right;"><?php echo $value['TBLPENDATAAN_BLNPAJAK'] ?></td>
					<td style="text-align: right;"><?php echo $value['TBLPENDATAAN_TGLPAJAK'] ?></td>
					<td style="text-align: right;"><?php echo LokalIndonesia::ribuan($value[''.$data['namatabel'].'_PAJAKPERIKSA']); ?></td>
					<td style="text-align: right;"><?php echo LokalIndonesia::ribuan($value['KENAIKANKRGBAYAR']); ?></td>
					<td style="text-align: right;"><?php echo LokalIndonesia::ribuan($value[''.$data['namatabel'].'_BUNGAKRGBAYAR']); ?></td>
					<td style="text-align: right;"><?php echo LokalIndonesia::ribuan($value['TBLSETORANBPD_RUPIAHSETOR']); ?></td>
					<td style="text-align: right;"><?php echo LokalIndonesia::ribuan($value[''.$data['namatabel'].'_RUPIAHKRGBAYAR'] - $value['TBLSETORANBPD_RUPIAHSETOR']); ?></td>
					<td style="text-align: right;"><?php echo $value['STATUS_ANGSUR']; ?></td>
				</tr>
			<?php endforeach ?>
			<tr>
				<td colspan="8" style="text-align: right;"><b>TOTAL (RP.) :</b></td>
				<td style="text-align: right;"><b><?php echo LokalIndonesia::ribuan($totalperiksa); ?></b></td>
				<td style="text-align: right;"><b><?php echo LokalIndonesia::ribuan($totaldenda); ?></b></td>
				<td style="text-align: right;"><b><?php echo LokalIndonesia::ribuan($totalbunga); ?></b></td>
				<td style="text-align: right;"><b><?php echo LokalIndonesia::ribuan($totalsetor); ?></b></td>
				<td style="text-align: right;"><b><?php echo LokalIndonesia::ribuan($totalkb); ?></b></td>

			</tr>
		</tbody>
	</table><br><br><br>
	<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" cellpadding="5" border="0">
		<thead>
			<tr>
				<th></th> 
				<th></th> 
				<th></th> 
				<th>MENGETAHUI :</th> 
				<th></th> 
				<th></th> 
				<th></th> 
				<th></th> 
				<th></th> 
				<th></th> 
				<th>Yogyakarta, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></th> 
				<th></th> 
			</tr>
			<thead>  
				<tr>
					<th></th> 
					<th></th>
					<th></th>
					<th colspan="1"><?php echo  $data['jab1']['TBLPEJABAT_URAIAN']  ?></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th> 
					<th><?php echo  $data['jab2']['TBLPEJABAT_URAIAN']  ?></th> 
					<th></th>
				</tr>
			</thead>
			<tbody style="text-align: center;">
				<tr>
					<td><br><br><br><br><br><br><br><br><br><br><br></td>
					<td></td>
					<td></td>
					<td><?php echo  $data['jab1']['TBLPEJABAT_NAMA']  ?><br>
						NIP. <?php echo  $data['jab1']['TBLPEJABAT_NIP']  ?>
					</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td><td><?php echo  $data['jab2']['TBLPEJABAT_NAMA']  ?><br>
					NIP. <?php echo  $data['jab2']['TBLPEJABAT_NIP']  ?></td>
					<td></td>
				</tr>
			</tbody>
		</table>

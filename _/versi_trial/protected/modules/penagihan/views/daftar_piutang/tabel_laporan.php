<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
	<thead>
        <tr>
            <th colspan="17" style="text-align-last:left;">KARTU DATA PIUTANG<br>
                PER: <?php echo $_REQUEST['tgl_cutoff']; ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
        	<td colspan="2" align="left">NPWPD</td>
        	<td colspan="15" align="left"><?php echo $data['wp']['TBLDAFTAR_GOLONGAN'] ?>.<?php echo $data['wp']['TBLDAFTAR_NOPOK'] ?>.<?php echo $data['wp']['TBLKECAMATAN_IDBADANUSAHA'] ?>.<?php echo $data['wp']['TBLKELURAHAN_IDBADANUSAHA'] ?></td>
        </tr>
        <tr>
        	<td colspan="2" align="left">NAMA USAHA</td>
        	<td colspan="8" align="left"><?php echo $data['wp']['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
        	<td align="left">NAMA PEMILIK</td>
        	<td colspan="7" align="left"><?php echo $data['wp']['TBLDAFTAR_PEMILIKNAMA'] ?></td>
        </tr>
        <tr>
        	<td colspan="2" align="left">ALAMAT USAHA</td>
        	<td colspan="8" align="left"><?php echo $data['wp']['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td>
        	<td align="left">ALAMAT PEMILIK</td>
        	<td colspan="7" align="left"><?php echo $data['wp']['TBLDAFTAR_PEMILIKALAMAT'] ?></td>
        </tr>
    </tbody>

	<thead>
		<tr>
			<th rowspan="2" data-hide="phone" align="center"> No. <br> Urut</th>
			<th rowspan="2" data-hide="phone" align="center"> No. SKPDKB</th>
			<th rowspan="2" data-hide="phone" align="center"> TGL SKPD</th>
			<th rowspan="2" data-hide="phone" align="center"> TGL Jatuh Tempo</th>
			<th rowspan="2" data-hide="phone" align="center"> Masa Pajak</th>
			<th rowspan="2" data-hide="phone" align="center"> Tahun Pajak</th>
			<th rowspan="2" data-hide="phone" align="center"> Jenis Ketetapan</th>
			<th rowspan="2" ></th>
			<th rowspan="1" colspan="4" data-hide="phone" align="center"> Ketetapan</th>
			<th rowspan="2" data-hide="phone" align="center"> Denda<br>Keterlambatan</th>
			<th rowspan="2" data-hide="phone" align="center"> Piutang</th>
			<th rowspan="1" colspan="2" data-hide="phone" align="center"> Realisasi</th>
			<th rowspan="2" data-hide="phone" align="center"> Piutang Yang <br>Masih Harus <br>Dibayar</th>
			<!-- <th rowspan="2" data-hide="phone" align="center"> Total Piutang</th> -->
			
		</tr>
		<tr>
			<th rowspan="1" data-hide="phone" align="center"> Pokok</th>
			<th rowspan="1" data-hide="phone" align="center"> Kenaikan 25%</th>
			<th rowspan="1" data-hide="phone" align="center"> Bunga KB/Angsuran</th>
			<th rowspan="1" data-hide="phone" align="center"> Pajak Terutang <br> Kurang Bayar</th>
			<!-- <th rowspan="1" data-hide="phone" align="center"> Pokok</th>
			<th rowspan="1" data-hide="phone" align="center"> Bunga</th>
			<th rowspan="1" data-hide="phone" align="center"> Kenaikan</th> -->
			<th rowspan="1" data-hide="phone" align="center"> Nominal</th>
			<th data-hide="phone" align="center"> Tanggal Bayar</th>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>&nbsp;(1)</td>
			<td>&nbsp;(2)</td>
			<td>&nbsp;(3)</td>
			<td>&nbsp;(4) = (1) + (2) + (3)</td>
			<td>&nbsp;(5)</td>
			<td>&nbsp;(6) = (4) + (5)</td>
			<td>&nbsp;(7)</td>
			<td></td>
			<td>&nbsp;(8) = (6) - (7)</td>
		</tr>
	</thead>
	<tbody>
		<?php $jmlh = 0; $totalpokok = 0; $totalpiutang = 0; $totalbunga = 0; $totaldenda = 0; $totalkbangsur = 0; $totalbayar = 0; $totalestimasibayar = 0; $totalestimasidenda = 0; $tunggakankb = 0; $totalbungaangsur = 0;?>
		<?php $totaltunggakan = 0; ?>
		<?php $no=1; foreach ($data['cari'] as $list): ?>
		<?php $totalbayar = $totalbayar+$list['BAYAR']; ?>
		
		<tr>
			<td><?php echo $no++; ?></td> <!-- NO -->
			<td align="center"><?php echo $list[$data['NamaTBL'].'_REGKURANGBAYAR'] ?></td> <!-- No KB -->
			<td><?php echo $list[$data['NamaTBL'].'_TGLKURANGBAYAR'] ?>/<?php echo $list[$data['NamaTBL'].'_BLNKURANGBAYAR'] ?>/20<?php echo sprintf('%02d', $list[$data['NamaTBL'].'_THNKURANGBAYAR']) ?></td> <!-- TGLSKPDKB -->
			<td><?php echo $list[$data['NamaTBL'].'_TGLBTSKRGBAYAR'] ?>/<?php echo $list[$data['NamaTBL'].'_BLNBTSKRGBAYAR'] ?>/20<?php echo sprintf('%02d', $list[$data['NamaTBL'].'_THNBTSKRGBAYAR']) ?></td> <!-- TGL TEMPO SKPDKB -->
			<td><?php 
				if ($list[$data['NamaTBL'].'_BLNKBAWAL']==null) {
					echo LokalIndonesia::getBulan($list[$data['NamaTBL'].'_BLNKBAKHIR']);
				} else {
					echo LokalIndonesia::getBulan($list[$data['NamaTBL'].'_BLNKBAWAL']) .'-'. LokalIndonesia::getBulan($list[$data['NamaTBL'].'_BLNKBAKHIR']); 

				}

			?></td> <!-- Masa Pajak -->
			<td>20<?php echo sprintf('%02d', $list['TBLPENDATAAN_THNPAJAK']) ?></td><!-- Tahun -->
			<td><?php 
			if ($list['ANG1']==''):?> 
				KURANG BAYAR
			<?php else: ?>
				DIANGSUR <?= $list['HITUNG'] ?>x

				<?php
				$infoangsuran = $this->infoangsuran($list['TBLDAFTAR_NOPOK'], $list['TBLPENDATAAN_THNPAJAK'], $list[$data['NamaTBL'].'_BLNKBAKHIR'], $data['NamaTBL'], $totalbungaangsur);
				// echo CJSON::encode($infoangsuran);
				?>
			<?php endif ?>
			</td> <!-- STATUS ANGS/KB -->
			<td>
			<?php 
			if ($list['ANG1']==''):?>
		    <?php else: ?>
		    	<button onclick="ang('<?= $data['NamaTBL'] ?>', '<?= $list['TBLDAFTAR_NOPOK'] ?>', '<?= $list['TBLPENDATAAN_THNPAJAK'] ?>', '<?= $list[$data['NamaTBL'].'_BLNKBAKHIR'] ?>', '<?= $totalbungaangsur ?>')" type="button" class="btn btn-labeled btn-success btn-sm" style="width:65px; height:30px;">
		    		<i class="fa fa-edit"></i> Detail
		    	</button>
		    <?php endif ?>
	    	</td> <!-- TOMBOL DETAIL -->
	    	<td align="right">
				<?php if ($list['ANG1'] == ''): ?>
				<?php $pokok = $list['POKOK'] ?>
				<?php else: ?>
				<?php $pokok = $infoangsuran['data']['bunga']['JUMLAHPOKOK'] ?>
				<?php endif ?>
				<?= LokalIndonesia::ribuan($pokok); ?>
			</td> <!-- Pokok -->
			<td align="right">
				<?php if ($list['ANG1'] == ''): ?>
				<?php $kenaikan = $list['KENAIKAN'] ?>
				<?php else: ?>
				<?php $kenaikan = 0 ?>
				<?php endif ?>
				<?= LokalIndonesia::ribuan($kenaikan); ?>
			</td> <!-- Kenaikan -->
			<td align="right">
				<?php if ($list['ANG1'] == ''): ?>
				<?php $bunga = $list['BUNGA'] ?>
				<?php else: ?>
				<?php $bunga = $infoangsuran['data']['bunga']['JUMLAHBUNGA'] ?>
				<?php endif ?>
				<?= LokalIndonesia::ribuan($bunga); ?>
			</td> <!-- Bunga -->
			<td align="right">
				<?php $kbangsur = $pokok + $kenaikan + $bunga; 
						$totalkbangsur = $totalkbangsur+$kbangsur;
				?>
				<?= LokalIndonesia::ribuan($kbangsur);?></td> <!-- Pajak Terutang kurang bayar-->
			<td align="right">
				<?php 
					if ($list['ANG1']=='' && $list['TANGGALSETOR']==null) {
					    $tglbatas = date('Y-m-d', strtotime('20'.sprintf('%02d', $list[$data['NamaTBL'].'_THNBTSKRGBAYAR']).'-'.$list[$data['NamaTBL'].'_BLNBTSKRGBAYAR'].'-'.$list[$data['NamaTBL'].'_TGLBTSKRGBAYAR']));
					    $tglhitungdenda = date('Y-m-d');
					    $pokok =$list['TOTAL'];
					    // echo $tglbatas.'<br>'.$pokok.'<br>';

					    $jmlbulandenda = LokalIndonesia::getBulanDenda($tglbatas,$tglhitungdenda);

					    if ($jmlbulandenda>24) {
					      $jmlbulandenda = 24;
					    } else {
					      $jmlbulandenda = $jmlbulandenda;
					    }

					    $totaldenda = $pokok*$jmlbulandenda*(2/100);
					    // $totalsetoranpajak = $pokok + $totaldenda;

					} elseif ($list['ANG1']=='' && $list['TANGGALSETOR']!=null) {
						$totaldenda = 0;
					} else {
				 		$totaldenda = $this->getangsuran($list['TBLDAFTAR_NOPOK'],$list['TBLPENDATAAN_THNPAJAK'],$list[$data['NamaTBL'].'_BLNKBAKHIR'],'denda');

					} 

					$totalestimasidenda=$totalestimasidenda+$totaldenda;
				    // echo LokalIndonesia::ribuan($totaldenda);
				 ?>
				 <?= LokalIndonesia::ribuan($denda = $totaldenda); ?>
			</td> <!-- denda -->
			<td align="right">
				<?php $piutang = $kbangsur + $denda; 
						$totalpiutang = $totalpiutang+$piutang;
				?>
				<?= LokalIndonesia::ribuan($piutang);?></td> <!-- Piutang-->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['BAYAR']) ?></td> <!-- Setoran Total-->
			<td align="right">
				<?php if ($list['ANG1'] == ''): ?>
					<?php if ($list['TANGGALSETOR']!=null): ?>
					<?php echo date('d-m-Y', strtotime($list['TANGGALSETOR'])); ?>
					<?php endif ?>
				<?php else: ?>
					<?= $infoangsuran['data']['tglsetor'] ?>
				<?php endif ?>
			</td><!-- Tanggal Setor -->
			<td align="right">
				<?php 
					if ($list['ANG1']=='' && $list['TANGGALSETOR']==null) {
					    $tglbatas = date('Y-m-d', strtotime('20'.sprintf('%02d', $list[$data['NamaTBL'].'_THNBTSKRGBAYAR']).'-'.$list[$data['NamaTBL'].'_BLNBTSKRGBAYAR'].'-'.$list[$data['NamaTBL'].'_TGLBTSKRGBAYAR']));
					    $tglhitungdenda = date('Y-m-d');
					    $pokok =$list['TOTAL'];

					    $jmlbulandenda = LokalIndonesia::getBulanDenda($tglbatas,$tglhitungdenda);

					    if ($jmlbulandenda>24) {
					      $jmlbulandenda = 24;
					    } else {
					      $jmlbulandenda = $jmlbulandenda;
					    }

					    $totaldenda = $pokok*$jmlbulandenda*(2/100);
					    $totalsetoranpajak = $pokok + $totaldenda;

					} elseif ($list['ANG1']=='' && $list['TANGGALSETOR']!=null) {
						 $totalsetoranpajak = 0;

					} else {
				 		$totalsetoranpajak = $this->getangsuran($list['TBLDAFTAR_NOPOK'],$list['TBLPENDATAAN_THNPAJAK'],$list[$data['NamaTBL'].'_BLNKBAKHIR'],'dibayar'); 

					}
					 	$totalestimasibayar = $totalestimasibayar+$totalsetoranpajak;
					 	echo LokalIndonesia::ribuan($totalsetoranpajak); 
				 ?>
				 
			</td> <!-- piutang yg masih harus dibayar -->

			<!-- <td align="right"><?php echo LokalIndonesia::ribuan($list['TBLSETOR_RUPIAHSETOR']) ?></td> <!-- Setoran Pokok -c-> -->
			<!-- <td align="right"><?php echo LokalIndonesia::ribuan($list['TBLSETOR_BUNGAKETETAPAN']) ?></td> <!-- Setoran Bunga--c> -->
			<!-- <td align="right"><?php echo LokalIndonesia::ribuan($list['TBLSETOR_DENDAKETETAPAN']) ?></td> <!-- Setoran kenaikan-c-> -->
			
			<!-- <td align="right">
				<?php if ($list['ANG1']!=''){
					$tunggakankb = $this->getangsuran($list['TBLDAFTAR_NOPOK'],$list['TBLPENDATAAN_THNPAJAK'],$list[$data['NamaTBL'].'_BLNKBAKHIR'],'dibayar');

				} else {
					if($list['TANGGALSETOR']==null){
						$tglbatas = date('Y-m-d', strtotime('20'.sprintf('%02d', $list[$data['NamaTBL'].'_THNBTSKRGBAYAR']).'-'.$list[$data['NamaTBL'].'_BLNBTSKRGBAYAR'].'-'.$list[$data['NamaTBL'].'_TGLBTSKRGBAYAR']));
						$tglcetak = date('Y-m-d');
						$pokok =$list['TOTAL'];

						$jmlbulandenda = LokalIndonesia::getBulanDenda($tglbatas,$tglhitungdenda);

					    if ($jmlbulandenda>24) {
					      $jmlbulandenda = 24;
					    } else {
					      $jmlbulandenda = $jmlbulandenda;
					    }

						if ($tglbatas < $tglcetak) {
							$totaldenda = $pokok*$jmlbulandenda*(2/100);
							$tunggakankb = $pokok + $totaldenda;
						} else {
							$tunggakankb = 0;
						}

					} else {
						$tunggakankb = 0;
					}
				}

				$totaltunggakan = $totaltunggakan+$tunggakankb;
				echo LokalIndonesia::ribuan($tunggakankb);

				?>	
			</td><!-- tunggakan/total piutang --> 
			
		</tr>
	<?php endforeach ?>
    <tr>
        <td colspan="11"><div align="right" ><strong>TOTAL Rp :</strong></div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totalkbangsur); ?> </div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totalestimasidenda); ?></div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totalpiutang); ?></div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbayar); ?> </div></td>
        <td><div></div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totalestimasibayar); ?></div></td>
        <!-- <td colspan="3" ><div align="right"></div></td> -->
        <!-- <td><div></div></td> -->
        <!-- <td><div align="right"><?php //echo LokalIndonesia::ribuan($totaltunggakan); ?> </div></td> -->
    </tr>
</tbody>
</table>
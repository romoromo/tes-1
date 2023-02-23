<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
	<thead>
		<?php if ($_REQUEST['tahunpjk']==''):?>
        <tr>
            <th colspan="20" style="text-align-last:left;">PEMBUKUAN SKPDKB <?php echo $data['judul'] ?> TAHUN TERBIT SKPDKB <?php echo $masapajak = $_REQUEST['tahunkb'] ?> S/D <?php echo $masapajak = $_REQUEST['tahunkb_akhir'] ?><br>
                PER: <?php echo $_REQUEST['tgl_cutoff']; ?>
            </th>
        </tr>
        <?php elseif ($_REQUEST['tahunkb']==''): ?>
        <tr>
            <th colspan="20" style="text-align-last:left;">PEMBUKUAN SKPDKB <?php echo $data['judul'] ?> TAHUN PAJAK <?php echo $masapajak = $_REQUEST['tahunpjk'] ?> S/D <?php echo $masapajak = $_REQUEST['tahunpjk_akhir'] ?><br>
                PER: <?php echo $_REQUEST['tgl_cutoff']; ?>
            </th>
        </tr>
        <?php else: ?>
        <tr>
            <th colspan="20" style="text-align-last:left;">PEMBUKUAN SKPDKB <?php echo $data['judul'] ?><br>
                PER: <?php echo $_REQUEST['tgl_cutoff']; ?>
            </th>
        </tr>
        <?php endif ?>
    </thead>
	<thead>
		<tr>
			<th data-hide="phone" align="center"> NO</th>
			<th data-hide="phone" align="center"> Nama WP</th>
			<th data-hide="phone" align="center"> Alamat OP</th>
			<th data-hide="phone" align="center"> NPWPD</th>
			<th data-hide="phone" align="center"> No. SKPDKB</th>
			<th data-hide="phone" align="center"> Masa Pajak</th>
			<th data-hide="phone" align="center"> Tahun Pajak</th>
			<th data-hide="phone" align="center"> TGL Terbit SKPD</th>
			<th data-hide="phone" align="center"> TGL Batas SKPD</th>
			<th data-hide="phone" align="center"> Status Piutang</th>
			<th data-hide="phone" align="center"> Pokok KB</th>
			<th data-hide="phone" align="center"> Bunga KB</th>
			<th data-hide="phone" align="center"> Denda KB</th>
			<th data-hide="phone" align="center"> Total SKPDKB</th>
			<th data-hide="phone" align="center"> Setoran Pokok</th>
			<th data-hide="phone" align="center"> Setoran Bunga</th>
			<th data-hide="phone" align="center"> Setoran Denda</th>
			<th data-hide="phone" align="center"> Total Setoran</th>
			<th data-hide="phone" align="center"> Tanggal Setor</th>
			<th data-hide="phone" align="center"> Piutang</th>
		</tr>
	</thead>
	<tbody>
		<?php $jmlh = 0; $totalpokok = 0; $totalbunga = 0; $totaldenda = 0; $totalkb = 0; $totalbayar = 0;?>
		<?php $totaltunggakan = 0; ?>
		<?php $no=1; foreach ($data['cari'] as $list): ?>
		<?php $totalpokok= $totalpokok+$list['POKOK'] ?>
		<?php $totalbunga= $totalbunga+$list['BUNGA'] ?>
		<?php $totaldenda= $totaldenda+$list['KENAIKAN'] ?>
		<?php $totalkb= $totalkb+$list['TOTAL'] ?>
		<?php $totalbayar= $totalbayar+$list['BAYAR'] ?>
		
		<tr>
			<td><?php echo $no++; ?></td> <!-- NO -->
			<td><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?></td> <!-- Nama WP -->
			<td><?php echo $list['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td> <!-- Alamat WP -->
			<td><?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo $list['TBLDAFTAR_NOPOK'] ?>.<?php echo $list['TBLKECAMATAN_ID'] ?>.<?php echo $list['TBLKELURAHAN_ID'] ?></td> <!-- NPWPD -->
			<td align="center"><?php echo $list[$data['NamaTBL'].'_REGKURANGBAYAR'] ?></td> <!-- Alamat WP -->
			<td><?php echo LokalIndonesia::getBulan($list[$data['NamaTBL'].'_BLNKBAWAL']) ?> - <?php echo LokalIndonesia::getBulan($list[$data['NamaTBL'].'_BLNKBAKHIR']) ?></td>
			<td>20<?php echo $list['TBLPENDATAAN_THNPAJAK'] ?></td> <!-- TH -->
			<td><?php echo $list[$data['NamaTBL'].'_TGLKURANGBAYAR'] ?>/<?php echo $list[$data['NamaTBL'].'_BLNKURANGBAYAR'] ?>/20<?php echo $list[$data['NamaTBL'].'_THNKURANGBAYAR'] ?></td>			
			<td><?php echo $list[$data['NamaTBL'].'_TGLBTSKRGBAYAR'] ?>/<?php echo $list[$data['NamaTBL'].'_BLNBTSKRGBAYAR'] ?>/20<?php echo $list[$data['NamaTBL'].'_THNBTSKRGBAYAR'] ?></td>
			<td><?php 
			if ($list['ANG1']==''):?> 
				KURANG BAYAR
			<?php else: ?>
				DIANGSUR <?= $list['HITUNG'] ?>x
			<?php endif ?>
			</td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['POKOK']) ?></td> <!-- Ketetapan -->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['BUNGA']) ?></td> <!-- Bunga -->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['KENAIKAN']) ?></td> <!-- Denda -->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['TOTAL']) ?></td> <!-- Total -->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['TBLSETOR_RUPIAHSETOR']) ?></td> <!-- Setoran Pokok -->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['TBLSETOR_BUNGAKETETAPAN']) ?></td> <!-- Setoran Bunga-->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['TBLSETOR_DENDAKETETAPAN']) ?></td> <!-- Setoran Denda-->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['BAYAR']) ?></td> <!-- Setoran Total-->
			<td align="right"><?php if ($list['TANGGALSETOR']!=null) {
			echo date('d-m-Y', strtotime($list['TANGGALSETOR']));
			} ?></td><!-- Tanggal Setor -->
			
			<td align="right">
			<?php if ($list['ANG1']=='' && $list['TANGGALSETOR']==null): ?>
			<?= LokalIndonesia::ribuan($list['TOTAL']) ?>
			<?php $totaltunggakan+=$list['TOTAL']; ?>
			<?php elseif ($list['ANG1']!=''): ?>
			<?= LokalIndonesia::ribuan($list['TOTAL']-$list['BAYAR']) ?>
			<?php $totaltunggakan+=($list['TOTAL']-$list['BAYAR']); ?>
			<?php elseif ($list['ANG1']=='' && $list['TANGGALSETOR']!=null): ?>
			0
			<?php endif ?></td><!-- Piutang -->
		</tr>
	<?php endforeach ?>
    <tr>
        <td colspan="10"><div align="right" ><strong>TOTAL Rp :</strong></div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totalpokok); ?> </div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbunga); ?> </div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totaldenda); ?> </div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totalkb); ?> </div></td>
        <td colspan="3"><div align="right" ></div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbayar); ?> </div></td>
        <td colspan="1"><div align="right" ></div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltunggakan); ?> </div></td>
    </tr>
</tbody>
</table>
<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
	<thead>
        <tr>
            <th colspan="20" style="text-align-last:left;">SURAT KETETAPAN ANGSURAN
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
        	<td colspan="2" align="left">NOMOR SURAT</td>
        	<td colspan="18" align="left"><?php echo $data['detail'][$data['NamaTBL'].'_REGSURATANGSUR'] ?></td>
        </tr>
        <tr>
        	<td colspan="2" align="left">MASA PAJAK</td>
        	<td colspan="18" align="left"><?php 
        	if ($data['detail'][$data['NamaTBL'].'_BLNKBAWAL']=='0') {
					echo LokalIndonesia::getBulan($data['detail']['TBLPENDATAAN_BLNPAJAK']) .' '. '20'.$data['detail']['TBLPENDATAAN_THNPAJAK'];
				} else {
					echo LokalIndonesia::getBulan($data['detail'][$data['NamaTBL'].'_BLNKBAWAL']) .'-'. LokalIndonesia::getBulan($data['detail'][$data['NamaTBL'].'_BLNKBAKHIR']) .' '. '20'.$data['detail']['TBLPENDATAAN_THNPAJAK']; 
				}
        	?></td>
        </tr>
        <tr>
        	<td colspan="2" align="left">TANGGAL KETETAPAN</td>
        	<td colspan="18" align="left"><?php 
        	if ($data['detail'][$data['NamaTBL'].'_TGLSURATANGSUR']=='0') {
					echo 'Data Kurang Lengkap';
				} else {
					echo $data['detail'][$data['NamaTBL'].'_TGLSURATANGSUR'] .' '. LokalIndonesia::getBulan($data['detail'][$data['NamaTBL'].'_BLNSURATANGSUR']) .' '. '20'.$data['detail'][$data['NamaTBL'].'_THNSURATANGSUR']; 
				}
        	?></td>
        </tr>
        <tr>
        	<td colspan="2" align="left">POKOK KURANG BAYAR</td>
        	<td colspan="18" align="left"><?php echo LokalIndonesia::ribuan($data['detail'][$data['NamaTBL'].'_RUPIAHKRGBAYAR']) ?></td>
        </tr>
        <tr>
        	<td colspan="2" align="left">DENDA TAMBAHAN</td>
        	<td colspan="18" align="left"><?php echo LokalIndonesia::ribuan($data['detail']['DENDATAMBAHAN']) ?></td>
        </tr>
        <tr>
        	<td colspan="2" align="left">BUNGA ANGSURAN</td>
        	<td colspan="18" align="left"><?php echo LokalIndonesia::ribuan($data['bunga']['JUMLAHBUNGA']) ?></td>
        </tr>
    </tbody>

	<thead>
		<tr>
			<th data-hide="phone" align="center"> Angsuran <br> Ke</th>
			<th data-hide="phone" align="center"> TGL Jatuh Tempo</th>
			<th data-hide="phone" align="center"> Angsuran Pokok</th>
			<th data-hide="phone" align="center"> Angsuran Bunga</th>
			<th data-hide="phone" align="center"> Angsuran Total</th>
			<th data-hide="phone" align="center"> No. SSPD</th>
			<th data-hide="phone" align="center"> Tanggal<br> SSPD</th>
			<th data-hide="phone" align="center"> Rupiah Setor</th>
			<th data-hide="phone" align="center"> Denda<br>Keterlambatan</th>
			<th data-hide="phone" align="center"> Jumlah Yang <br>Harus Dibayar</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $jmlh = 0; $totalpokok = 0; $totalbunga = 0; $totalang = 0; $totalestimasidenda = 0; $totalestimasibayar = 0; $totalsetor = 0;?>
		<?php $totaltunggakan = 0; ?>
		<?php $no=1; foreach ($data['ang'] as $list): ?>
		<?php $totalpokok= $totalpokok+$list['TBLANGSURAN_ANGSURAN'] ?>
		<?php $totalbunga= $totalbunga+$list['TBLANGSURAN_BUNGAANGSURAN'] ?>
		<?php $totalang= $totalang+$list['TOTALANGSURAN'] ?>
		<?php $totalsetor= $totalsetor+$list['SETORAN'] ?>
		<?php $totaltunggakan= $totaltunggakan+$list['TUNGGAKAN'] ?>
		
		<tr>
			<td><?php echo $list['TBLANGSURAN_PAJAKKE'] ?></td> <!-- ke -->
			<td><?php echo $list['TBLANGSURAN_TGLBATASKETETAPAN'] ?>/<?php echo $list['TBLANGSURAN_BLNBATASKETETAPAN'] ?>/20<?php echo $list['TBLANGSURAN_THNBATASKETETAPAN'] ?></td> <!-- TGL TEMPO SKPDA -->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['TBLANGSURAN_ANGSURAN']) ?></td> <!-- Pokok -->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['TBLANGSURAN_BUNGAANGSURAN']) ?></td> <!-- Bunga -->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['TOTALANGSURAN']) ?></td> <!-- TOTAL PER ANGSUR -->
			<td><?php echo $list['TBLANGSURAN_NOMORSETOR'] ?></td> <!-- NO. SSPD -->
			<td><?php if ($list['TBLANGSURAN_NOMORSETOR']!=null): ?>
				<?php echo $list['TBLANGSURAN_TGLSETORANGSURAN'] ?>/<?php echo $list['TBLANGSURAN_BLNSETORANGSURAN'] ?>/20<?php echo $list['TBLANGSURAN_THNSETORANGSURAN'] ?>
				<?php endif ?>
			</td> <!-- TGL SSPD -->
			<td align="right"><?php echo LokalIndonesia::ribuan($list['SETORAN']) ?></td> <!-- RUPIAH SETOR -->
			<td align="right">
				<?php if ($list['TBLANGSURAN_NOMORSETOR']!=null): ?>
					0
				<?php else: ?>
				<?php
				    $tglbatas = date('Y-m-d', strtotime('20'.sprintf('%02d', $list['TBLANGSURAN_THNBATASKETETAPAN']).'-'.$list['TBLANGSURAN_BLNBATASKETETAPAN'].'-'.$list['TBLANGSURAN_TGLBATASKETETAPAN']));
				    $tglhitungdenda = date('Y-m-d');
				    $pokok =$list['TBLANGSURAN_ANGSURAN']+$list['TBLANGSURAN_BUNGAANGSURAN'];
				    // echo $tglbatas.'<br>'.$pokok.'<br>';

				    $jmlbulandenda = LokalIndonesia::getBulanDenda($tglbatas,$tglhitungdenda);

				    if ($jmlbulandenda>24) {
				      $jmlbulandenda = 24;
				    } else {
				      $jmlbulandenda = $jmlbulandenda;
				    }

				    $totaldenda = $pokok*$jmlbulandenda*(2/100);
				    $totalsetoranpajak = $pokok + $totaldenda;
				    // echo $tglbatas.$tglhitungdenda;
				    echo LokalIndonesia::ribuan($totaldenda);
				  ?>
				 <?php $totalestimasidenda+=$totaldenda; ?>
				<?php endif ?>
			</td> <!-- denda -->
			<td align="right">
				<?php if ($list['TBLANGSURAN_NOMORSETOR']!=null): ?>
					0
				<?php else: ?>
				<?php
				    $tglbatas = date('Y-m-d', strtotime('20'.sprintf('%02d', $list['TBLANGSURAN_THNBATASKETETAPAN']).'-'.$list['TBLANGSURAN_BLNBATASKETETAPAN'].'-'.$list['TBLANGSURAN_TGLBATASKETETAPAN']));
				    $tglhitungdenda = date('Y-m-d');
				    $pokok =$list['TBLANGSURAN_ANGSURAN']+$list['TBLANGSURAN_BUNGAANGSURAN'];

				    $jmlbulandenda = LokalIndonesia::getBulanDenda($tglbatas,$tglhitungdenda);

				    if ($jmlbulandenda>24) {
				      $jmlbulandenda = 24;
				    } else {
				      $jmlbulandenda = $jmlbulandenda;
				    }

				    $totaldenda = $pokok*$jmlbulandenda*(2/100);
				    $totalsetoranpajak = $pokok + $totaldenda;
				    

				    echo LokalIndonesia::ribuan($totalsetoranpajak);
				  ?>
				  <?php $totalestimasibayar+=$totalsetoranpajak; ?>
				<?php endif ?>
			</td> <!-- jml yg harus dibayar -->
			
		</tr>
	<?php endforeach ?>
    <tr>
        <td colspan="2"><div align="right" ><strong>TOTAL Rp :</strong></div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totalpokok); ?> </div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbunga); ?> </div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totalang); ?> </div></td>
        <td colspan="2"><div align="right" ></div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totalsetor); ?> </div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totalestimasidenda); ?> </div></td>
        <td><div align="right"><?php echo LokalIndonesia::ribuan($totalestimasibayar); ?> </div></td>
    </tr>
</tbody>
</table>
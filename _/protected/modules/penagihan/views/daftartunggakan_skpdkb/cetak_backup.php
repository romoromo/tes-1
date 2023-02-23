<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
<thead>
	<tr>
		<td align="center">DAFTAR TUNGGAKAN <?php echo $data['judul'] ?> BERDASARKAN SKPD TAHUN <?php echo $tahun = $_REQUEST['tahunpjk'] ?></td>
	</tr>
</thead>
<tbody>
	<tr>
		<td align="center"> PER <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
	</tr>
</tbody>
</table>
<br>
<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
	<thead>
		<tr>
			<th data-hide="phone" align="center"> TGL KB</th>
			<th data-hide="phone" align="center"> Nama WP</th>
			<th data-hide="phone" align="center"> NPWPD</th>
			<th data-hide="phone" align="center"> TH</th>
			<th data-hide="phone" align="center"> BL</th>
			<th data-hide="phone" align="center"> Ketetapan</th>
			<th data-hide="phone" align="center"> Bunga</th>
			<th data-hide="phone" align="center"> Denda</th>
			<th data-hide="phone" align="center"> Total</th>
			<th data-hide="phone" align="center"> Tunai</th>
			<th data-hide="phone" align="center"> 1</th>
			<th data-hide="phone" align="center"> 2</th>
			<th data-hide="phone" align="center"> 3</th>
			<th data-hide="phone" align="center"> 4</th>
			<th data-hide="phone" align="center"> 5</th>
			<th data-hide="phone" align="center"> 6</th>
			<th data-hide="phone" align="center"> 7</th>
			<th data-hide="phone" align="center"> 8</th>
			<th data-hide="phone" align="center"> 9</th>
			<th data-hide="phone" align="center"> 10</th>
			<th data-hide="phone" align="center"> 11</th>
			<th data-hide="phone" align="center"> 12</th>
			<th data-hide="phone" align="center"> Total</th>
			<th data-hide="phone" align="center"> Piutang</th>
			<th data-hide="phone" align="center"> Adjust</th>
			<th data-hide="phone" align="center"> KET</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=1; foreach ($data['cetak'] as $list) :?>
		<tr>
			<td align="center"><?php echo $no++; ?></td>
			<td align="center"><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
			<td align="center"><?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo $list['TBLDAFTAR_NOPOK'] ?>.<?php echo $list['TBLKECAMATAN_ID'] ?>.<?php echo $list['TBLKELURAHAN_ID'] ?></td>
			<td align="center"><?php echo $list['TBLPENDATAAN_THNPAJAK'] ?></td>
			<td align="center"><?php echo $list['TBLPENDATAAN_BLNPAJAK'] ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['POKOK']) ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['BUNGA']) ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['DENDA']) ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['TOTAL']) ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['TUNAI']) ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['ANG1']) ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['ANG2']) ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['ANG3']) ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['ANG4']) ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['ANG5']) ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['ANG6']) ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['ANG7']) ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['ANG8']) ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['ANG9']) ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['ANG10']) ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['ANG11']) ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['ANG12'])  ?></td>
			<td align="right"><?php echo LokalIndonesia::ribuan($list['TOTALANGSUR']) ?></td> <!-- Total -->
			<td><?php //echo $list[''] ?></td> <!-- Piutang -->
			<td><?php //echo $list[''] ?></td> <!-- Adjust -->
			<td><?php //echo $list[''] ?></td> <!-- KET -->
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
<br>
<table width="100%" id="atas" border="0">
<!-- <style type="text/css">
        table,td,th {
            border: 0px solid #C6C6C6;
        }
    </style> -->
    <thead>  
      <tr>
        <td align="center"> MENGETAHUI:</td>
        <td align="center">YOGYAKARTA, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td align="center">KASI PEMBUKUAN DAN PELAPORAN</td>
        <td align="center">PETUGAS PEMBUKUAN</td>
      </tr>
      <tr>
        <td style="color: white">.</td>
        <td style="color: white">.</td>
      </tr>
      <tr>
        <td style="color: white">.</td>
        <td style="color: white">.</td>
      </tr>
      <tr>
        <td style="color: white">.</td>
        <td style="color: white">.</td>
      </tr>
      <tr>
        <td align="center"> SANTOSA S,E.</td>
        <td align="center" style="color: white">.</td>
      </tr>
      <tr>
        <td align="center">NIP. 1963201231 198903 1133</td>
        <td align="center" style="color: white">.</td>
      </tr>
    </tbody>
</table>
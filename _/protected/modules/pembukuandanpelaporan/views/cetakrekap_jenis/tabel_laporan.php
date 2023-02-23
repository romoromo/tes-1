<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
	 <style type="text/css">
    <!--
    .style2 {font-size: 12px}
    .style3 {font-size: 14px}
    .style4 {font-size: 16px}
  -->
</style>
  <thead>                   
		<tr>
			<td align="center">Tanggal</td>
			<td align="center"><u>4.1.1.01</u><br> PJK  HOTEL </td>
			<td align="center"><u>4.1.1.02</u><br>PJK RESTORAN </td>
			<td align="center"><u>4.1.1.03</u><br>PJK HIBURAN </td>
			<td align="center"><u>4.1.1.04</u><br>PJK REKLAME </td>
			<td align="center"><u>4.1.1.05</u><br>P.P.J</td>
			<td align="center"><u>4.1.1.07</u><br> PJK PARKIR </td>
			<td align="center"><u>4.1.1.08</u><br>AIR TANAH </td>
			<td align="center"><u>4.1.1.09</u><br>PJK BURUNG W </td>
			<td align="center"><u>4.1.1.10</u><br>PBB </td>
			<td align="center"><u>4.1.1.11</u><br>BPHTB </td>
			<td align="center"><u>4.1.1.23</u><br>SEWA ASET </td>
		</tr>
	</thead>
	<tbody>
	<?php $totalhotel = 0; ?>
    <?php $totalhotel1 = 0; ?>
    <?php $totalrestoran = 0; ?>
    <?php $totalrestoran1 = 0; ?>
    <?php $totalhiburan = 0; ?>
    <?php $totalhiburan1 = 0; ?>
    <?php $totalreklame = 0; ?>
    <?php $totalreklame1 = 0; ?>
    <?php $totalppj = 0; ?>
    <?php $totalppj1 = 0; ?>
    <?php $totalparkir = 0; ?>
    <?php $totalparkir1 = 0; ?>
    <?php $totalair = 0; ?>
    <?php $totalair1 = 0; ?>
    <?php $totalburung = 0; ?>
    <?php $totalburung1 = 0; ?>
    <?php $totalpbb = 0; ?>
    <?php $totalpbb1 = 0; ?>
    <?php $totalbphtb = 0; ?>
    <?php $totalbphtb1 = 0; ?>
    <?php $totalaset = 0; ?>
    <?php $totalaset1 = 0; ?>
    <?php $no=1; foreach($data['cari'] as $list) :?>
    <?php $totalhotel = $totalhotel+$list['PAJAKHOTEL'] ?>
    <?php $totalhotel1 = $totalhotel1+$list['BNGDNDHOTEL'] ?>
    <?php $totalrestoran = $totalrestoran+$list['PAJAKRESTORAN'] ?>
    <?php $totalrestoran1 = $totalrestoran1+$list['BNGDNDRESTORANL'] ?>
    <?php $totalhiburan = $totalhiburan+$list['PAJAKRESTORAN'] ?>
    <?php $totalhiburan1 = $totalhiburan1+$list['BNGDNDHIBURAN'] ?>
    <?php $totalreklame = $totalreklame+$list['PAJAKREKLAME'] ?>
    <?php $totalreklame1 = $totalreklame1+$list['BNGDNDREKLAME'] ?>
    <?php $totalppj = $totalppj+$list['PAJAKPPJ'] ?>
    <?php $totalppj1 = $totalppj1+$list['BNGDNDPPJ'] ?>
    <?php $totalparkir = $totalparkir+$list['PAJAKPARKIR'] ?>
    <?php $totalparkir1 = $totalparkir1+$list['BNGDNDPARKIR'] ?>
    <?php $totalair = $totalair+$list['PAJAKABT'] ?>
    <?php $totalair1 = $totalair1+$list['BNGDNDABT'] ?>
    <?php $totalburung = $totalburung+$list['PAJAKWALET'] ?>
    <?php $totalburung1 = $totalburung1+$list['BNGDNDWALET'] ?>
    <?php $totalpbb = $totalpbb+$list['PAJAKPBB'] ?>
    <?php $totalpbb1 = $totalpbb1+$list['BNGDNDPBB'] ?>
    <?php $totalbphtb = $totalbphtb+$list['PAJAKBPHTB'] ?>
    <?php $totalbphtb1 = $totalbphtb1+$list['BNGDNDBPHTB'] ?>
    <?php $totalaset = $totalaset+$list['PAJAKSEWA'] ?>
    <?php $totalaset1 = $totalaset1+$list['BNGDNDSEWA'] ?>
    <tr>
      <td align="center"><?php echo $list['TBLSETOR_TGLSETOR'] ?>/<?php echo $list['TBLSETOR_BLNSETOR'] ?>/<?php echo $list['TBLSETOR_THNSETOR'] ?><br>BNG&DND</td>
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKHOTEL']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDHOTEL']) ?></td>
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKRESTORAN']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDRESTORANL']) ?></td>
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKHIBURAN']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDHIBURAN']) ?></td> <!-- Hiburan -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKREKLAME']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDREKLAME']) ?></td> <!-- Reklame -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKPPJ']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDPPJ']) ?></td> <!-- PPJ -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKPARKIR']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDPARKIR']) ?></td> <!-- Parkir -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKABT']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDABT']) ?></td> <!-- Air Tanah -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKWALET']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDWALET']) ?></td> <!-- Wallet -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKPBB']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDPBB']) ?></td> <!-- PBB -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKBPHTB']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDBPHTB']) ?></td> <!-- BPHTB -->
      <td align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKSEWA']) ?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDSEWA']) ?></td> <!-- Wallet -->
    </tr>
  <?php endforeach ?>
	</tbody>
</table>
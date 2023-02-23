<!-- Penerimaan Perayat -->
<?php Yii::import('ext.LokalIndonesia'); ?>
<div id="header">
  <table width="100%">
    <thead>
      <tr>
        <td align="center">Buku Rekapitulasi Penerimaan Harian</td>
      </tr>
    </thead>
  </table>
</div>

<br>
<div id="tblatas" style="display: ">
  <table width="100%" id="atas" border="0">
<!-- <style type="text/css">
        table,td,th {
            border: 0px solid #C6C6C6;
        }
      </style> -->
     <!--  <thead>  
        <tr>
          <td align="center">Buku Rekapitulasi Penerimaan Harian</td>
        </tr>
      </thead> -->
      <tbody>
        <tr>
          <td align="left" width="15%">SKPD</td>
          <td> : </td>
          <td> BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH </td>
          <tr>
            <td align="left" width="15%">Pengguna Anggaran</td>
            <td> : </td>
            <td> WASESA, S.H. </td>
          </tr>
          <tr>
            <td align="left" width="15%">Bendahara Penerima</td>
            <td> : </td>
            <td> B. ENY WIDYAWATI </td>
          </tr>
          <tr>
            <td align="left" width="15%">Bulan</td>
            <td> : </td>
            <td> <?php echo $bulan = LokalIndonesia::getBulan($_REQUEST['bulan']);?> <?php echo $tahun = $_REQUEST['tahun']; ?> </td>
          </tr>
        </tr>
      </tbody>
    </table>
  </div>

<br>
<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
  <thead>
    <tr align="center">
      <th data-hide="phone" rowspan="3"><div align="center">Tanggal</div></th>
      <th data-hide="phone" colspan="4"><div align="center">Pajak Daerah (Rp)</div></th>
      <th data-hide="phone" colspan="4"><div align="center">Lain-Lain PAD Yang Sah (Rp)</div></th>
    </tr>
     <tr align="center">
      <td data-hide="phone"><div align="center">4.1.1.01</div></td>
      <td data-hide="phone"><div align="center">4.1.1.02</div></td>
      <td data-hide="phone"><div align="center">4.1.1.03</div></td>
      <td data-hide="phone"><div align="center">4.1.1.04</div></td>
      <td data-hide="phone"><div align="center">4.1.1.05</div></td>
      <td data-hide="phone"><div align="center">4.1.1.06</div></td>
      <td data-hide="phone"><div align="center">4.1.1.07</div></td>
      <td data-hide="phone"><div align="center">4.1.1.08</div></td>
    </tr>
    <tr align="center">
      <td data-hide="phone"><div align="center">Pajak Hotel</div></td>
      <td data-hide="phone"><div align="center">Pajak Restoran</div></td>
      <td data-hide="phone"><div align="center">Pajak Hiburan</div></td>
      <td data-hide="phone"><div align="center">Pajak Reklame</div></td>
      <td data-hide="phone"><div align="center">P.P.J</div></td>
      <td data-hide="phone"><div align="center">Pajak Parkir</div></td>
      <td data-hide="phone"><div align="center">Air Tanah</div></td>
      <td data-hide="phone"><div align="center">Pajak Burung W</div></td>
    </tr>
  </thead>
  <tbody>
   <?php $totalhotel = 0; ?>
   <?php $totalhotelbngdnd = 0; ?>
   <?php $totalrestoran = 0; ?>
   <?php $totalrestoranbngdnd = 0; ?>
   <?php $totalhiburan = 0; ?>
   <?php $totalhiburanbngdnd = 0; ?>
   <?php $totalreklame = 0; ?>
   <?php $totalreklamebngdnd = 0; ?>
   <?php $totalppj = 0; ?>
   <?php $totalppjbngdnd = 0; ?>
   <?php $totalparkir = 0; ?>
   <?php $totalparkirbngdnd = 0; ?>
   <?php $totalairtanah = 0; ?>
   <?php $totalairtanahbngdnd = 0; ?>
   <?php $totalburung = 0; ?>
   <?php $totalburungbngdnd = 0; ?>
  <?php $no=1; foreach ($data['ayat'] as $list) :?>
  <?php $totalhotel = $totalhotel+$list['PAJAKHOTEL'];?>
  <?php $totalhotelbngdnd = $totalhotelbngdnd+$list['BNGDNDHOTEL'];?>
  <?php $totalrestoran = $totalrestoran+$list['PAJAKRESTORAN'];?>
  <?php $totalrestoranbngdnd = $totalrestoranbngdnd+$list['BNGDNDRESTORANL'];?>
  <?php $totalhiburan = $totalhiburan+$list['PAJAKHIBURAN'];?>
  <?php $totalhiburanbngdnd = $totalhiburanbngdnd+$list['BNGDNDHIBURAN'];?>
  <?php $totalreklame = $totalreklame+$list['PAJAKREKLAME'];?>
  <?php $totalreklamebngdnd = $totalreklamebngdnd+$list['BNGDNDREKLAME'];?>
  <?php $totalppj = $totalppj+$list['PPJ'];?>
  <?php $totalppjbngdnd = $totalppjbngdnd+$list['BNGDNDPPJ'];?>
  <?php $totalparkir = $totalparkir+$list['PARKIR'];?>
  <?php $totalparkirbngdnd = $totalparkirbngdnd+$list['BNGDNDPARKIR'];?>
  <?php $totalairtanah = $totalairtanah+$list['PAJAKABT'];?>
  <?php $totalairtanahbngdnd = $totalairtanahbngdnd+$list['BNGDNDABT'];?>
  <?php $totalburung = $totalburung+$list['PAJAKWALET'];?>
  <?php $totalburungbngdnd = $totalburungbngdnd+$list['BNGDNDWALET'];?>
    <tr>
      <td><div align="right"><?php echo $list['TBLSETOR_TGLSETOR']?>/<?php echo $list['TBLSETOR_BLNSETOR']?>/<?php echo $list['TBLSETOR_THNSETOR']?><br>BNG & DND</div></td> 
      <td><div align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKHOTEL'] )?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDHOTEL'] )?></div></td> <!-- Pajak Hotel -->
      <td><div align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKRESTORAN'] )?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDRESTORANL'] )?></div></td> <!-- Pajak Restoran -->
      <td><div align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKHIBURAN'] )?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDHIBURAN'] )?></div></td> <!-- Pajak Hiburan -->
      <td><div align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKREKLAME'] )?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDREKLAME'] )?></div></td> <!-- Pajak Reklame -->
      <td><div align="right"><?php echo LokalIndonesia::ribuan($list['PPJ'] )?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDPPJ'] )?></div></td> <!-- P.P.J -->
      <td><div align="right"><?php echo LokalIndonesia::ribuan($list['PARKIR'] )?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDPARKIR'] )?></div></td> <!-- Pajak Parkir -->
      <td><div align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKABT'] )?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDABT'] )?></div></td> <!-- Air Tanah -->
      <td><div align="right"><?php echo LokalIndonesia::ribuan($list['PAJAKWALET'] )?><br><?php echo LokalIndonesia::ribuan($list['BNGDNDWALET'] )?></div></td> <!-- Pajak Burung W -->       
    </tr>
  <?php endforeach ?>
    <tr>
      <td><div align="center"><strong>TOTAL :</strong></div></td>
      <td><div align="right"><?php echo LokalIndonesia::ribuan($totalhotel) ?><br> <?php echo LokalIndonesia::ribuan($totalhotelbngdnd) ?> </div></td>
      <td><div align="right"><?php echo LokalIndonesia::ribuan($totalrestoran) ?><br> <?php echo LokalIndonesia::ribuan($totalrestoranbngdnd) ?> </div></td>
      <td><div align="right"><?php echo LokalIndonesia::ribuan($totalhiburan) ?><br> <?php echo LokalIndonesia::ribuan($totalhiburanbngdnd) ?> </div></td>
      <td><div align="right"><?php echo LokalIndonesia::ribuan($totalreklame) ?><br> <?php echo LokalIndonesia::ribuan($totalreklamebngdnd) ?> </div></td>
      <td><div align="right"><?php echo LokalIndonesia::ribuan($totalppj) ?><br> <?php echo LokalIndonesia::ribuan($totalppjbngdnd) ?> </div></td>
      <td><div align="right"><?php echo LokalIndonesia::ribuan($totalparkir) ?><br> <?php echo LokalIndonesia::ribuan($totalparkirbngdnd) ?> </div></td>
      <td><div align="right"><?php echo LokalIndonesia::ribuan($totalairtanah) ?><br> <?php echo LokalIndonesia::ribuan($totalairtanahbngdnd) ?> </div></td>
      <td><div align="right"><?php echo LokalIndonesia::ribuan($totalburung) ?><br> <?php echo LokalIndonesia::ribuan($totalburungbngdnd) ?> </div></td>
    </tr>
</tbody>
</table>

  <br>
  <div id="ttd">
    <table width="100%" id="atas" border="0">
<!-- <style type="text/css">
        table,td,th {
            border: 0px solid #C6C6C6;
        }
      </style> -->
      <thead>  
        <tr>
          <td align="center"> Mengetahui, Pengguna Anggaran</td>
          <td align="center">YOGYAKARTA, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td align="center">KEPALA BPKAD KOTA YOGYAKARTA</td>
          <td align="center">BENDAHARA PENERIMAAN</td>
        </tr>
        <tr>
          <td style="color: white">ttd</td>
          <td style="color: white">ttd</td>
        </tr>
        <tr>
          <td style="color: white">ttd</td>
          <td style="color: white">ttd</td>
        </tr>
        <tr>
          <td style="color: white">ttd</td>
          <td style="color: white">ttd</td>
        </tr>
        <tr>
          <td align="center"> WASESA, S.H.</td>
          <td align="center">B. ENY WIDYAWATI</td>
        </tr>
        <tr>
          <td align="center">---------------------------------</td>
          <td align="center">---------------------------------</td>
        </tr>
        <tr>
          <td align="center">NIP. 196405061993031009</td>
          <td align="center">NIP. 196509151989032014</td>
        </tr>
      </tbody>
    </table>
  </div>

  <script type="text/javascript">
    pageSetUp();
    jQuery(document).ready(function() {
    //reloadDT('atas');
  });
</script>
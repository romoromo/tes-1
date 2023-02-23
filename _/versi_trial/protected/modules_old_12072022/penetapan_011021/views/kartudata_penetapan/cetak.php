<!-- Kas Umum Bulanan -->
<?php Yii::import('ext.LokalIndonesia'); ?>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
  <thead>  
    <tr>
      <td align="left">Dinas Pajak Daerah Dan</td>
      <td align="left">Daftar Penetapan......</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td align="left">Pengelolaan Keuangan</td>
      <td align="left">Tahun : Bulan :</td>
      <tr>
      <td></td>
      <td align="left">Tanggal SKPD :</td>
      </tr>
      <tr>
      <td></td>
      <td align="left">Dengan Cara :</td>
    </tr>
    </tr>
  </tbody>
</table>

<br>
<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
 <style type="text/css" >
 </style>
 <thead>  
  <tr>
    <td align="center">NO</td>
    <td align="center">NO.POKOK/NAMA WAJIB PAJAK</td>
    <td align="center">JENIS REKLAME</td>
    <td align="center">JREK</td>
    <td align="center">PANJANG</td>
    <td align="center">LEBAR</td>
    <td align="center">TH PAJAK</td>
    <td align="center">TGL SKPD<br>TGL BTS SKPD</th>
      <td align="center">JENIS</td>
      <td align="center">PAJAK</td>
    </tr>
  </thead>
  <tbody>
   <?php $no=1; //foreach ($data[''] as $list) :?>                  
   <tr>
    <td><div align="center"><?php //echo $no++; ?></div></td> <!-- No -->
    <td><div align="center"><?php //echo $list['']?>/<?php //echo $list['']?>/<?php //echo $list['']?> </div> </td> <!-- NO.POKOK/NAMA WAJIB PAJAK -->
    <td><div align="center"><?php //echo $list[''] ?></div> </td> <!-- JENIS REKLAME -->
    <td><div align="center"><?php //echo $list[''] ?></div> </td> <!-- JREK  -->
    <td><div align="center"><?php //echo $list[''] ?></div> </td> <!-- PANJANG -->
    <td><div align="center"><?php //echo $list[''] ?></div> </td> <!-- LEBAR -->
    <td><div align="center"><?php //echo $list[''] ?> <?php //echo $list[''] ?> <?php //echo $list[''] ?></div> </td> <!-- TH PAJAK  -->
    <td><div align="center"><?php //echo $list[''] ?></div> </td> <!-- TGL SKPD TGL BTS SKPD -->
    <td><div align="right"><?php //echo $list[''] ?></div> </td> <!-- JENIS -->
    <td><div align="right"><?php //echo LokalIndonesia::ribuan($list['']) ?></div> </td> <!-- PAJAK  -->
  </tr>
  <?php //endforeach ?>
  <tr>
    <td><div align="right"> </div></td>
    <td><div align="right"> </div></td>
    <td><div align="center"><strong>TOTAL REKLAME :</strong></div></td>
    <td><div align="right"> </div></td>
    <td><div align="right"> </div></td>
    <td><div align="right"> </div></td>
    <td><div align="right"> </div></td>
    <td><div align="right"> </div></td>
    <td><div align="right"><?php //echo LokalIndonesia::ribuan(); ?> </div></td>
    <td><div align="right"></div></td>
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
          <td width="10%"></td> 
          <td align="left">MENGETAHUI:</td>
          <td width="20%"></td> 
          <td align="left">Tanggal: <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></td>      <td width="20%"></td> 
        </tr>
      </thead>
      <tbody>
        <tr>
          <td width="10%"></td> 
          <td align="left">KA.SIE.PENETAPAN</td>
          <td width="20%"></td> 
          <td align="left">PETUGAS :</td>
          <td width="20%"></td> 
        </tr>
        <tr>
          <td style="color: white">ttd</td>
          <td style="color: white">ttd</td>
          <td style="color: white">ttd</td>
          <td style="color: white">ttd</td>
        </tr>
        <tr>
          <td style="color: white">ttd</td>
          <td style="color: white">ttd</td>
          <td style="color: white">ttd</td>
          <td style="color: white">ttd</td>
        </tr>
        <tr>
          <td style="color: white">ttd</td>
          <td style="color: white">ttd</td>
          <td style="color: white">ttd</td>
          <td style="color: white">ttd</td>
        </tr>
        <tr>
          <td width="10%"></td> 
          <td align="left">TUTY ARYANI , SH</td>
          <td width="20%"></td> 
          <td align="left">EDY SUTOPO</td>
          <td width="20%"></td> 
        </tr>
        <tr>
          <td width="10%"></td> 
          <td align="left">---------------------------------</td>
          <td width="20%"></td> 
          <td align="left">---------------------------------</td>
          <td width="20%"></td> 
        </tr>
        <tr>
          <td width="10%"></td> 
          <td align="left">NIP. 195901011986032011</td>
          <td width="20%"></td> 
          <td align="left">NIP. 196805271992031005</td>
          <td width="20%"></td> 

        </tr>
      </tbody>
    </table>
  </div>
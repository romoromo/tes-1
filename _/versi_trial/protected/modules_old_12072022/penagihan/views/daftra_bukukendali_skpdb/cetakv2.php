<?php Yii::import('ext.LokalIndonesia'); ?>
<!-- SKPD A -->
<header>
 <tr>
    <th style="text-align-last:left;"><strong>BUKU KENDALI <?php echo $data ['judul'] ?> </strong><br>
        <strong>Per, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></strong>
    </th>
</tr>
</header><br>
<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
  <tr>
    <th align="center">NO</th>
    <th align="center">WAJIB PAJAK</th>
    <th align="center">ALAMAT</th>
    <th align="center">PENGUSAHA</th>
    <th align="center">NPWPD</th>
    <th align="center">NO.SKPDKB</th>
    <th align="center">MASA PAJAK</th>
    <th align="center">JATUH TEMPO</th>
    <th align="center">POKOK</th>
    <th align="center">BUNGA</th>
    <th align="center">JUMLAH</th> 
    <th align="center">PEMBAYARAN</th> 
    <th align="center">TGL BAYAR</th> 
    <th align="center">TUNGGAKAN</th> 
</tr>
</thead>
<tbody style="text-align: center;">
  <?php $no=1; foreach ($data['skpdbv2'] as $list) :?>
  <tr>
    <td><?php echo $no++; ?></td> <!-- NO -->
    <td><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?></td> <!-- WAJIB PAJAK -->
    <td><?php echo $list['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td> <!-- ALAMAT -->
    <td><?php echo $list['TBLDAFTAR_PEMILIKNAMA'] ?></td> <!-- PENGUSAHA -->
    <td><?php echo $list['TBLDAFTAR_JNSPENDAPATAN'] ?>.<?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo $list['TBLDAFTAR_NOPOK'] ?>.<?php echo $list['TBLKECAMATAN_ID'] ?>.<?php echo $list['TBLKELURAHAN_ID'] ?></td> <!-- NPWPD -->
    <td><?php echo $list[$data['NamaTBL'].'_REGKURANGBAYAR'] ?></td> <!-- NO.SKPDKB -->
    <td><?php echo $list[$data['NamaTBL'].'_BLNKBAWAL'] ?>/<?php echo $list[$data['NamaTBL'].'_THNBTSKRGBAYAR'] ?>/<?php //echo $list[''] ?> s/d <?php //echo $list['TBLDAFTRMAKAN_THNBTSKRGBAYAR'] ?>/<?php //echo $list['TBLDAFTRMAKAN_BLNKBALIR'] ?>/<?php //echo $list[''] ?></td> <!-- MASA PAJAK -->
    <td><?php echo $list[$data['NamaTBL'].'_TGLBTSKRGBAYAR'] ?>/<?php echo $list[$data['NamaTBL'].'_BLNBTSKRGBAYAR'] ?>/<?php echo $lis[$data['NamaTBL'].'_THNBTSKRGBAYAR'] ?></td> <!-- JATUH TEMPO -->
    <td><?php echo $list['POKOK'] ?></td> <!-- POKOK -->
    <td><?php echo $list['BUNGA'] ?></td>
    <td><?php echo $list['JUMLAH'] ?></td>
    <td><?php echo $list['TERBAYARKAN'] ?></td>
    <td><?php echo $list['HRSSP'] ?>/<?php echo $list['BLSSP'] ?>/<?php echo $list['THSSP']?></td> <!-- TGL BAYAR -->
    <td><?php echo $list['TUNGGAKAN'] ?></td>
</tr>
<?php endforeach ?>
</tbody>
</table><br><br><br>
<table width="100%" border="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" cellpadding="5" border="0">
    <thead>
        <tr>
            <th></th> 
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
            <th></th> 
            <th></th>
            <th></th>
            <th colspan="1">Kepala Seksi Penagihan dan Keberatan</th>
            
            <th>Pemegang Buku Kendali</th> 
            <th></th>
        </tr>
    </thead>
    <tbody style="text-align: center;">
      <tr>
        <td><br><br><br><br><br><br><br><br><br><br><br></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>E. IRAWATI. SIP<br>
            NIP. 19591128 198003 2 003
        </td>
        
        <td>EKO<br>
            NIP. 197407041994021005</td>
            <td></td>
        </tr>
    </tbody>
</table>

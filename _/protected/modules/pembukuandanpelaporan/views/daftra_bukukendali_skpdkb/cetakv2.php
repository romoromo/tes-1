<?php Yii::import('ext.LokalIndonesia'); ?>
<!-- SKPD A -->
<header>
 <tr>
    <th style="text-align-last:left;"><strong>BUKU KENDALI SKPDKB <?php echo $data ['judul'] ?> TAHUN PAJAK <?php echo $masapajak = $_REQUEST['tahunpjk'] ?></strong><br>
        <strong>Per, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></strong>
    </th>
</tr>
</header><br>
<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
  <tr>
    <th align="center">NO</th>
    <th align="center">WAJIB PAJAK</th>
    <th align="center">ALAMAT</th>
    <th align="center">PEMILIK</th>
    <th align="center">NPWPD</th>
    <th align="center">MASA PAJAK</th>
    <th align="center">NO.SKPDKB</th>
    <th align="center">TGL TERBIT SKPDKB</th>
    <th align="center">JATUH TEMPO</th>
    <th align="center">PAJAK PERIKSA</th>
    <th align="center">BUNGA</th>
    <th align="center">DENDA</th>
    <th align="center">TOTAL</th> 
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
    <td><?php echo $list['TBLDAFTAR_JNSPENDAPATAN'] ?>.<?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo sprintf("%07d", $list['TBLDAFTAR_NOPOK']) ?>.<?php echo sprintf("%02d", $list['TBLKECAMATAN_ID']) ?>.<?php echo sprintf("%02d", $list['TBLKELURAHAN_ID']) ?></td> <!-- NPWPD -->
    <td><?php echo LokalIndonesia::getBulan($list[$data['namaTBL'].'_BLNKBAWAL']) ?> s/d <?php echo LokalIndonesia::getBulan($list[$data['namaTBL'].'_BLNKBAKHIR']) ?> 20<?php echo $list['TBLPENDATAAN_THNPAJAK'] ?></td> <!-- MASA PAJAK -->
    <td><?php echo $list[$data['namaTBL'].'_REGKURANGBAYAR'] ?></td> <!-- NO.SKPDKB -->
    <td><?php echo $list[$data['namaTBL'].'_TGLKURANGBAYAR'] ?> <?php echo LokalIndonesia::getBulan($list[$data['namaTBL'].'_BLNKURANGBAYAR']) ?> 20<?php echo $list[$data['namaTBL'].'_THNKURANGBAYAR'] ?></td> <!-- TANGGAL TERBIT -->
    <td><?php echo $list[$data['namaTBL'].'_TGLBTSKRGBAYAR'] ?> <?php echo LokalIndonesia::getBulan($list[$data['namaTBL'].'_BLNBTSKRGBAYAR']) ?> 20<?php echo $list[$data['namaTBL'].'_THNBTSKRGBAYAR'] ?></td> <!-- JATUH TEMPO -->
    <td><?php echo LokalIndonesia::ribuan($list['POKOK']) ?></td> <!-- POKOK -->
    <td><?php echo LokalIndonesia::ribuan($list['BUNGA']) ?></td>
    <td><?php echo LokalIndonesia::ribuan($list['DENDA']) ?></td>
    <td><?php echo LokalIndonesia::ribuan($list['JUMLAH']) ?></td>
    <td><?php echo LokalIndonesia::ribuan($list['TERBAYARKAN']) ?></td>
    <td><?php echo $list['HRSSP']=='' ? '' : $list['HRSSP'].' '.LokalIndonesia::getBulan($list['BLSSP']).' '.($list['THSSP']+2000) ?></td> <!-- TGL BAYAR -->
    <td><?php echo $list['TERBAYARKAN']=='' ? LokalIndonesia::ribuan($list['JUMLAH']) : '0' ?></td>
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
            <th colspan="1"><?php echo $data['jab3']['TBLPEJABAT_URAIAN']; ?></th>
            
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
        <td><?php echo $data['jab3']['TBLPEJABAT_NAMA']; ?><br>
            NIP. <?php echo $data['jab3']['TBLPEJABAT_NIP']; ?>
        </td>
        
        <!-- <td><?php //echo $data['jab4']['TBLPEJABAT_NAMA']; ?><br> -->
        <?php 
        if(strlen($data['jab4']['TBLPEJABAT_NIP'])==4){ ?>   
            <td><?php echo $data['jab4']['TBLPEJABAT_NAMA']; ?><br>
            NITB. <?php echo $data['jab4']['TBLPEJABAT_NIP']; ?>
            </td>
        <?php
        } else { ?>
            <td><?php echo $data['jab4']['TBLPEJABAT_NAMA']; ?><br>
            NIP. <?php echo $data['jab4']['TBLPEJABAT_NIP']; ?>
            </td> 
        <?php 
        } ?>
            <td></td>
        </tr>
    </tbody>
</table>

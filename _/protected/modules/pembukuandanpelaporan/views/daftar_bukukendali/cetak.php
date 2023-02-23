<?php Yii::import('ext.LokalIndonesia'); ?>

<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
    <thead>
        <tr>
            <th colspan="20" style="text-align-last:left;">BUKU KENDALI <?php echo $data['judul'] ?> TAHUN PAJAK <?php echo $masapajak = $_REQUEST['masapajak'] ?><br>
                PER: <?php echo $_REQUEST['cutoff']; ?>
            </th>
        </tr>
        <thead>  
          <tr>
            <th>NO</th>
            <th>NAMA/ALAMAT</th>
            <th colspan="4">NPWPD</th>
            <th>ALAMAT</th>
            <th>JANUARI</th>
            <th>FEBRUARI</th>
            <th>MARET</th>
            <th>APRIL</th>
            <th>MEI</th>
            <th>JUNI</th>
            <th>JULI</th>
            <th>AGUSTUS</th>
            <th>SEPTEMBER</th>
            <th>OKTOBER</th>
            <th>NOVEMBER</th>
            <th>DESEMBER</th>
            <th>JUMLAH</th><!-- 
            <th>SKPD</th> -->
        </tr>
    </thead>
    <tbody style="text-align: center;">
      <?php $total=0; $totaljan=0; $totalfeb=0; $totalmar=0; $totalapr=0; $totalmei=0; $totaljun=0; $totaljul=0; $totalagt=0; $totalsep=0; $totalokt=0; $totalnov=0; $totaldes=0; ?>
      <?php $no=1; foreach ($data['kendali'] as $list) :?>
      <?php $total= $total+$list['JUMLAH_PEMBAYARAN'] ?>
      <?php $totaljan= $totaljan+$list['JANUARI'] ?>
      <?php $totalfeb= $totalfeb+$list['FEBRUARI'] ?>
      <?php $totalmar= $totalmar+$list['MARET'] ?>
      <?php $totalapr= $totalapr+$list['APRIL'] ?>
      <?php $totalmei= $totalmei+$list['MEI'] ?>
      <?php $totaljun= $totaljun+$list['JUNI'] ?>
      <?php $totaljul= $totaljul+$list['JULI'] ?>
      <?php $totalagt= $totalagt+$list['AGUSTUS'] ?>
      <?php $totalsep= $totalsep+$list['SEPTEMBER'] ?>
      <?php $totalokt= $totalokt+$list['OKTOBER'] ?>
      <?php $totalnov= $totalnov+$list['NOVEMBER'] ?>
      <?php $totaldes= $totaldes+$list['DESEMBER'] ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
        <td><?php echo $list['TBLDAFTAR_GOLONGAN'] ?></td>
        <td><?php echo sprintf("&nbsp;%07d", $list['TBLDAFTAR_NOPOK']) ?></td>
        <td><?php echo sprintf("%02d", $list['TBLKECAMATAN_IDBADANUSAHA']) ?></td>
        <td><?php echo sprintf("%02d", $list['TBLKELURAHAN_IDBADANUSAHA']) ?></td>
        <td><?php echo $list['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['JANUARI']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['FEBRUARI']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['MARET']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['APRIL']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['MEI']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['JUNI'])?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['JULI']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['AGUSTUS']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SEPTEMBER']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['OKTOBER']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['NOVEMBER']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['DESEMBER']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['JUMLAH_PEMBAYARAN']) ?></td><!-- 
        <td><?php //echo $list['JUMLAH_SKPD'] ?></td> -->
    </tr>
    <?php endforeach ?>
    <tr>
     <tr>
        <td colspan="20" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
      </tr>
          
          <td colspan="7"><div align="right" ><strong>TOTAL Rp :</strong></div></td>
          <td><div align="right"><?php echo LokalIndonesia::ribuan($totaljan); ?> </div></td>
          <td><div align="right"><?php echo LokalIndonesia::ribuan($totalfeb); ?>  </div></td>
          <td><div align="right"><?php echo LokalIndonesia::ribuan($totalmar); ?>  </div></td>
          <td><div align="right"><?php echo LokalIndonesia::ribuan($totalapr); ?>  </div></td>
          <td><div align="right"><?php echo LokalIndonesia::ribuan($totalmei); ?>  </div></td>
          <td><div align="right"><?php echo LokalIndonesia::ribuan($totaljun); ?>  </div></td>
          <td><div align="right"><?php echo LokalIndonesia::ribuan($totaljul); ?>  </div></td>
          <td><div align="right"><?php echo LokalIndonesia::ribuan($totalagt); ?>  </div></td>
          <td><div align="right"><?php echo LokalIndonesia::ribuan($totalsep); ?>  </div></td>
          <td><div align="right"><?php echo LokalIndonesia::ribuan($totalokt); ?>  </div></td>
          <td><div align="right"><?php echo LokalIndonesia::ribuan($totalnov); ?>  </div></td>
          <td><div align="right"><?php echo LokalIndonesia::ribuan($totaldes); ?>  </div></td>
          <td><div align="right"><?php echo LokalIndonesia::ribuan($total); ?>  </div></td>
        </tr>
        <tr>
        <td colspan="20" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
      </tr>
</tbody>
</table><br><br><br>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" cellpadding="5" border="0">
    <thead>
        <tr>
            <th colspan="19"></th>
            <th>Yogyakarta, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></th>
        </tr>
        <thead>  
          <tr>
            <th colspan="1" rowspan="4"></th> 
            <th><?php echo $data['jab3']['TBLPEJABAT_URAIAN']; ?></th>
            <th colspan="17" rowspan="4"></th> 
            <th>Pemegang Buku Kendali</th> 
            <th></th>
        </tr>
    </thead>
    <tbody style="text-align: center;">
      <tr>
      </tr>
      <tr>
      </tr>
      <tr>
      </tr>
      <tr>
      </tr>  
      <tr>
        <td colspan="1"></td>
        <td align="center"><?php echo $data['jab3']['TBLPEJABAT_NAMA']; ?><br>
            NIP. <?php echo $data['jab3']['TBLPEJABAT_NIP']; ?>
        </td>
        <?php 
        if(strlen($data['jab4']['TBLPEJABAT_NIP'])==4){ ?>   
            <td colspan="17"></td>
            <td align="center"><?php echo $data['jab4']['TBLPEJABAT_NAMA']; ?><br>
            NITB. <?php echo $data['jab4']['TBLPEJABAT_NIP']; ?></td>
        <?php
        } else { ?>
            <td colspan="17"></td>
            <td align="center"><?php echo $data['jab4']['TBLPEJABAT_NAMA']; ?><br>
            NIP. <?php echo $data['jab4']['TBLPEJABAT_NIP']; ?></td> 
        <?php 
        } ?>
            <td></td>
        </tr>
    </tbody>
</table>

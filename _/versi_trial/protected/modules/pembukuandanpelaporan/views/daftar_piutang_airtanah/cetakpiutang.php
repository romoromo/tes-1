<?php Yii::import('ext.LokalIndonesia'); ?>

<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
    <thead>
        <tr>
            <th colspan="20" style="text-align-last:left;">DAFTAR PIUTANG <?php echo $data['judul'] ?> TAHUN PAJAK <?php echo $masapajak = $_REQUEST['masapajak'] ?><br>
            PER:            </th>
        </tr>
        <thead>  
          <tr>
            <th width="2%" rowspan="2">NO</th>
            <th width="7%" rowspan="2">NAMA/ALAMAT</th>
            <th colspan="4" rowspan="2">NPWPD</th>
            <th width="4%" rowspan="2">ALAMAT</th>
            <th width="4%" colspan="1">JUMLAH</th>
            <th width="7%" colspan="1">JANUARI</th>
            <th width="7%" colspan="1">FEBRUARI</th>
            <th width="7%" colspan="1">MARET</th>
            <th width="7%" colspan="1">APRIL</th>
            <th width="7%" colspan="1">MEI</th>
            <th width="7%" colspan="1">JUNI</th>
            <th width="7%" colspan="1">JULI</th>
            <th width="7%" colspan="1">AGUSTUS</th>
            <th width="7%" colspan="1">SEPTEMBER</th>
            <th width="7%" colspan="1">OKTOBER</th>
            <th width="7%" colspan="1">NOVEMBER</th>
            <th width="7%" colspan="1">DESEMBER</th>
        </tr>
        <tr>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">TUNGGAKAN</th>
        </tr>
    </thead>
    <tbody style="text-align: center;">
      <?php $totalskpdjan=0; $totalskpdfeb=0; $totalskpdmar=0; $totalskpdapr=0; $totalskpdmei=0; $totalskpdjun=0; $totalskpdjul=0; $totalskpdagt=0; $totalskpdsep=0; $totalskpdokt=0; $totalskpdnov=0; $totalskpddes=0; $totaltgkjan=0; $totaltgkfeb=0; $totaltgkmar=0; $totaltgkapr=0; $totaltgkmei=0; $totaltgkjun=0; $totaltgkjul=0; $totaltgkagt=0; $totaltgksep=0; $totaltgkokt=0; $totaltgknov=0; $totaltgkdes=0; ?>
      <?php $no=1; foreach ($data['kendali'] as $list) :?>
      <?php $totalskpdjan= $totalskpdjan+$list['SKPDJAN'] ?>
      <?php $totalskpdfeb= $totalskpdfeb+$list['SKPDFEB'] ?>
      <?php $totalskpdmar= $totalskpdmar+$list['SKPDMAR'] ?>
      <?php $totalskpdapr= $totalskpdapr+$list['SKPDAPR'] ?>
      <?php $totalskpdmei= $totalskpdmei+$list['SKPDMEI'] ?>
      <?php $totalskpdjun= $totalskpdjun+$list['SKPDJUN'] ?>
      <?php $totalskpdjul= $totalskpdjul+$list['SKPDJUL'] ?>
      <?php $totalskpdagt= $totalskpdagt+$list['SKPDAGT'] ?>
      <?php $totalskpdsep= $totalskpdsep+$list['SKPDSEP'] ?>
      <?php $totalskpdokt= $totalskpdokt+$list['SKPDOKT'] ?>
      <?php $totalskpdnov= $totalskpdnov+$list['SKPDNOV'] ?>
      <?php $totalskpddes= $totalskpddes+$list['SKPDDES'] ?>

      <?php $totaltgkjan= $totaltgkjan+($list['SKPDJAN']-$list['BYRJAN']) ?>
      <?php $totaltgkfeb= $totaltgkfeb+($list['SKPDFEB']-$list['BYRFEB']) ?>
      <?php $totaltgkmar= $totaltgkmar+($list['SKPDMAR']-$list['BYRMAR']) ?>
      <?php $totaltgkapr= $totaltgkapr+($list['SKPDAPR']-$list['BYRAPR']) ?>
      <?php $totaltgkmei= $totaltgkmei+($list['SKPDMEI']-$list['BYRMEI']) ?>
      <?php $totaltgkjun= $totaltgkjun+($list['SKPDJUN']-$list['BYRJUN']) ?>
      <?php $totaltgkjul= $totaltgkjul+($list['SKPDJUL']-$list['BYRJUL']) ?>
      <?php $totaltgkagt= $totaltgkagt+($list['SKPDAGT']-$list['BYRAGT']) ?>
      <?php $totaltgksep= $totaltgksep+($list['SKPDSEP']-$list['BYRSEP']) ?>
      <?php $totaltgkokt= $totaltgkokt+($list['SKPDOKT']-$list['BYROKT']) ?>
      <?php $totaltgknov= $totaltgknov+($list['SKPDNOV']-$list['BYRNOV']) ?>
      <?php $totaltgkdes= $totaltgkdes+($list['SKPDDES']-$list['BYRDES']) ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
        <td width="1%"><?php echo $list['TBLDAFTAR_GOLONGAN'] ?></td>
        <td width="1%"><?php echo sprintf("&nbsp;%07d", $list['TBLDAFTAR_NOPOK']) ?></td>
        <td width="1%"><?php echo sprintf("%02d", $list['TBLKECAMATAN_IDBADANUSAHA']) ?></td>
        <td width="4%"><?php echo sprintf("%02d", $list['TBLKELURAHAN_IDBADANUSAHA']) ?></td>
        <td><?php echo $list['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td>
        <td align="right"><?php echo $list['JMLTUNGGAKAN'] ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDJAN']-$list['BYRJAN']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDFEB']-$list['BYRFEB']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDMAR']-$list['BYRMAR']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDAPR']-$list['BYRAPR']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDMEI']-$list['BYRMEI']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDJUN']-$list['BYRJUN']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDJUL']-$list['BYRJUL']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDAGT']-$list['BYRAGT']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDSEP']-$list['BYRSEP']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDOKT']-$list['BYROKT']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDNOV']-$list['BYRNOV']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDDES']-$list['BYRDES']) ?></td>
    </tr>
<?php endforeach ?>
<tr>
 <td colspan="20" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
</tr>
<tr><td colspan="8"><div align="right" ><strong>TOTAL Rp :</strong></div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkjan); ?> </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkfeb); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkmar); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkapr); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkmei); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkjun); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkjul); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkagt); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgksep); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkokt); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgknov); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkdes); ?>  </div></td>
</tr>
<tr>
    <td colspan="20" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
</tr>
</tbody>
</table>
<br><br><br>
<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" cellpadding="5" border="0">
    <thead>
        <tr>
            <th colspan="18"></th>
            <th>Yogyakarta, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></th>
        </tr>
        <thead>  
          <tr>
            <th colspan="1" rowspan="4"></th> 
            <th><?php echo $data['jab3']['TBLPEJABAT_URAIAN']; ?></th>
            <th colspan="15" rowspan="4"></th> 
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
            <td colspan="15"></td>
            <td align="center"><?php echo $data['jab4']['TBLPEJABAT_NAMA']; ?><br>
                NITB. <?php echo $data['jab4']['TBLPEJABAT_NIP']; ?></td>
                <?php
            } else { ?>
                <td colspan="15"></td>
                <td align="center"><?php echo $data['jab4']['TBLPEJABAT_NAMA']; ?><br>
                    NIP. <?php echo $data['jab4']['TBLPEJABAT_NIP']; ?></td> 
                    <?php 
                } ?>
                <td></td>
            </tr>
        </tbody>
    </table>
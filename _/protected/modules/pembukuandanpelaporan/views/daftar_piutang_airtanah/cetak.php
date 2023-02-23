<?php Yii::import('ext.LokalIndonesia'); ?>

<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
    <thead>
        <tr>
            <th colspan="67" style="text-align-last:left;">BUKU KENDALI <?php echo $data['judul'] ?> TAHUN PAJAK <?php echo $masapajak = $_REQUEST['masapajak'] ?><br>
            PER:            </th>
        </tr>
        <thead>  
          <tr>
            <th width="2%" rowspan="2">NO</th>
            <th width="7%" rowspan="2">NAMA/ALAMAT</th>
            <th colspan="4" rowspan="2">NPWPD</th>
            <th width="4%" rowspan="2">ALAMAT</th>
            <th width="7%" colspan="3">JANUARI</th>
            <th width="4%" colspan="2">Tgl</th>
            <th width="7%" colspan="3">FEBRUARI</th>
            <th width="4%" colspan="2">Tgl</th>
            <th width="7%" colspan="3">MARET</th>
            <th width="4%" colspan="2">Tgl</th>
            <th width="7%" colspan="3">APRIL</th>
            <th width="4%" colspan="2">Tgl</th>
            <th width="7%" colspan="3">MEI</th>
            <th  width="4%"colspan="2">Tgl</th>
            <th width="7%" colspan="3">JUNI</th>
            <th width="4%" colspan="2">Tgl</th>
            <th width="7%" colspan="3">JULI</th>
            <th width="4%" colspan="2">Tgl</th>
            <th width="7%" colspan="3">AGUSTUS</th>
            <th width="4%" colspan="2">Tgl</th>
            <th width="7%" colspan="3">SEPTEMBER</th>
            <th width="4%" colspan="2">Tgl</th>
            <th width="7%" colspan="3">OKTOBER</th>
            <th width="4%" colspan="2">Tgl</th>
            <th width="7%" colspan="3">NOVEMBER</th>
            <th width="4%" colspan="2">Tgl</th>
            <th width="7%" colspan="3">DESEMBER</th>
            <th width="4%"colspan="2">Tgl</th>
        </tr>
        <tr>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
            <th width="3%">TUNGGAKAN</th>
            <th width="3%">SKPD</th>
            <th width="3%">REALISASI</th>
        </tr>
    </thead>
    <tbody style="text-align: center;">
      <?php $totalskpdjan=0; $totalskpdfeb=0; $totalskpdmar=0; $totalskpdapr=0; $totalskpdmei=0; $totalskpdjun=0; $totalskpdjul=0; $totalskpdagt=0; $totalskpdsep=0; $totalskpdokt=0; $totalskpdnov=0; $totalskpddes=0; $totalbyrjan=0; $totalbyrfeb=0; $totalbyrmar=0; $totalbyrapr=0; $totalbyrmei=0; $totalbyrjun=0; $totalbyrjul=0; $totalbyragt=0; $totalbyrsep=0; $totalbyrokt=0; $totalbyrnov=0; $totalbyrdes=0; $totaltgkjan=0; $totaltgkfeb=0; $totaltgkmar=0; $totaltgkapr=0; $totaltgkmei=0; $totaltgkjun=0; $totaltgkjul=0; $totaltgkagt=0; $totaltgksep=0; $totaltgkokt=0; $totaltgknov=0; $totaltgkdes=0; ?>
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

      <?php $totalbyrjan= $totalbyrjan+$list['BYRJAN'] ?>
      <?php $totalbyrfeb= $totalbyrfeb+$list['BYRFEB'] ?>
      <?php $totalbyrmar= $totalbyrmar+$list['BYRMAR'] ?>
      <?php $totalbyrapr= $totalbyrapr+$list['BYRAPR'] ?>
      <?php $totalbyrmei= $totalbyrmei+$list['BYRMEI'] ?>
      <?php $totalbyrjun= $totalbyrjun+$list['BYRJUN'] ?>
      <?php $totalbyrjul= $totalbyrjul+$list['BYRJUL'] ?>
      <?php $totalbyragt= $totalbyragt+$list['BYRAGT'] ?>
      <?php $totalbyrsep= $totalbyrsep+$list['BYRSEP'] ?>
      <?php $totalbyrokt= $totalbyrokt+$list['BYROKT'] ?>
      <?php $totalbyrnov= $totalbyrnov+$list['BYRNOV'] ?>
      <?php $totalbyrdes= $totalbyrdes+$list['BYRDES'] ?>

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
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDJAN']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['BYRJAN']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDJAN']-$list['BYRJAN']) ?></td>
        <td align="right"><?php echo $list['TGLSKPDJAN'] ?></td>
        <td align="right"><?php echo $list['TGLBYRJAN'] ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDFEB']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['BYRFEB']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDFEB']-$list['BYRFEB']) ?></td>
        <td align="right"><?php echo $list['TGLSKPDFEB'] ?></td>
        <td align="right"><?php echo $list['TGLBYRFEB'] ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDMAR']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['BYRMAR']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDMAR']-$list['BYRMAR']) ?></td>
        <td align="right"><?php echo $list['TGLSKPDMAR'] ?></td>
        <td align="right"><?php echo $list['TGLBYRMAR'] ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDAPR']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['BYRAPR']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDAPR']-$list['BYRAPR']) ?></td>
        <td align="right"><?php echo $list['TGLSKPDAPR'] ?></td>
        <td align="right"><?php echo $list['TGLBYRAPR'] ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDMEI']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['BYRMEI']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDMEI']-$list['BYRMEI']) ?></td>
        <td align="right"><?php echo $list['TGLSKPDMEI'] ?></td>
        <td align="right"><?php echo $list['TGLBYRMEI'] ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDJUN'])?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['BYRJUN']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDJUN']-$list['BYRJUN']) ?></td>
        <td align="right"><?php echo $list['TGLSKPDJUN'] ?></td>
        <td align="right"><?php echo $list['TGLBYRJUN'] ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDJUL']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['BYRJUL']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDJUL']-$list['BYRJUL']) ?></td>
        <td align="right"><?php echo $list['TGLSKPDJUL'] ?></td>
        <td align="right"><?php echo $list['TGLBYRJUL'] ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDAGT']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['BYRAGT']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDAGT']-$list['BYRAGT']) ?></td>
        <td align="right"><?php echo $list['TGLSKPDAGT'] ?></td>
        <td align="right"><?php echo $list['TGLBYRAGT'] ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDSEP']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['BYRSEP']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDSEP']-$list['BYRSEP']) ?></td>
        <td align="right"><?php echo $list['TGLSKPDSEP'] ?></td>
        <td align="right"><?php echo $list['TGLBYRSEP'] ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDOKT']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['BYROKT']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDOKT']-$list['BYROKT']) ?></td>
        <td align="right"><?php echo $list['TGLSKPDOKT'] ?></td>
        <td align="right"><?php echo $list['TGLBYROKT'] ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDNOV']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['BYRNOV']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDNOV']-$list['BYRNOV']) ?></td>
        <td align="right"><?php echo $list['TGLSKPDNOV'] ?></td>
        <td align="right"><?php echo $list['TGLBYRNOV'] ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDDES']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['BYRDES']) ?></td>
        <td align="right"><?php echo LokalIndonesia::ribuan($list['SKPDDES']-$list['BYRDES']) ?></td>
        <td align="right"><?php echo $list['TGLSKPDDES'] ?></td>
        <td align="right"><?php echo $list['TGLBYRDES'] ?></td>
    </tr>
<?php endforeach ?>
<tr>
 <td colspan="66" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
</tr>
<tr><td colspan="7"><div align="right" ><strong>TOTAL Rp :</strong></div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalskpdjan); ?> </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbyrjan); ?> </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkjan); ?> </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalskpdfeb); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbyrfeb); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkfeb); ?>  </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalskpdmar); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbyrmar); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkmar); ?>  </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalskpdapr); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbyrapr); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkapr); ?>  </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalskpdmei); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbyrmei); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkmei); ?>  </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalskpdjun); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbyrjun); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkjun); ?>  </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalskpdjul); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbyrjul); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkjul); ?>  </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalskpdagt); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbyragt); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkagt); ?>  </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalskpdsep); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbyrsep); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgksep); ?>  </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalskpdokt); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbyrokt); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkokt); ?>  </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalskpdnov); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbyrnov); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgknov); ?>  </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalskpddes); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totalbyrdes); ?>  </div></td>
    <td><div align="right"><?php echo LokalIndonesia::ribuan($totaltgkdes); ?>  </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
<tr>
    <td colspan="66" align="center">----------------------------------------------------------------------------------------------------------------------------------</td>
</tr>
</tbody>
</table>
<br><br><br>
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
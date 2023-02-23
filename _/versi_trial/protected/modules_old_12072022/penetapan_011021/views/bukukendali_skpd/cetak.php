<?php Yii::import('ext.LokalIndonesia'); ?>

<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
                <thead>
                <tr>
                <th colspan="18" style="text-align-last:left;">BUKU KENDALI PAJAK PAJAK AIR TANAH TAHUN <?= $_REQUEST['TBLPENDATAAN_THNPAJAK'] ?><br>
                PER: TGL <?= date('d') ?> BULAN <?= strtoupper((LokalIndonesia::getBulan(date('m')))) ?> TAHUN <?= date('Y') ?>
                </th>
                </tr>
                <thead>  
                  <tr>
                    <th>NO</th>
                    <th>NAMA/ALAMAT</th>
                    <th>NPWPD</th>
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
                    <th>JUMLAH</th>
                    <th>SKPD</th>
                  </tr>
                </thead>
                <tbody style="text-align: center;">
                <?php $no = 1; foreach ($data['cetak'] as $rowtap): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $rowtap['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
                    <td><?= $rowtap['TBLDAFTAR_JENISPENDAPATAN'] ?>.<?= $rowtap['TBLDAFTAR_GOLONGAN'] ?>.<?= $rowtap['TBLDAFTAR_NOPOK'] ?>.<?= $rowtap['TBLKECAMATAN_IDBADANUSAHA'] ?>.<?= $rowtap['TBLKELURAHAN_IDBADANUSAHA'] ?></td>
                    <td><?= $rowtap['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td>
                    <td><?= $rowtap['JANUARI'] ?></td>
                    <td><?= $rowtap['FEBRUARI'] ?></td>
                    <td><?= $rowtap['MARET'] ?></td>
                    <td><?= $rowtap['APRIL'] ?></td>
                    <td><?= $rowtap['MEI'] ?></td>
                    <td><?= $rowtap['JUNI'] ?></td>
                    <td><?= $rowtap['JULI'] ?></td>
                    <td><?= $rowtap['AGUSTUS'] ?></td>
                    <td><?= $rowtap['SEPTEMBER'] ?></td>
                    <td><?= $rowtap['OKTOBER'] ?></td>
                    <td><?= $rowtap['NOVEMBER'] ?></td>
                    <td><?= $rowtap['DESEMBER'] ?></td>
                    <td><?= $rowtap['JUMLAH_PEMBAYARAN'] ?></td>
                    <td><?= $rowtap['JUMLAH_SKPD'] ?></td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table><br><br><br>
              <table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic" cellpadding="5" border="0">
                <thead>
                <tr>
                <th></th>
                <th></th>
                <th></th> 
                <th></th> 
                <th></th> 
                <th></th> 
                <th></th> 
                <th></th> 
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
                    <th colspan="1">Kepala Seksi Penagihan dan Keberatan</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th> 
                    <th></th> 
                    <th></th> 
                    <th></th> 
                    <th></th> 
                    <th></th> 
                    <th>Pemegang Buku Kendali</th> 
                    <th></th>
                  </tr>
                </thead>
                <tbody style="text-align: center;">
                  <tr>
                    <td><br><br><br><br><br><br><br><br><br><br><br></td>
                    <td></td>
                    <td></td>
                    <td>E. IRAWATI. SIP<br>
                        NIP. 19591128 198003 2 003
                        </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>M. ROHMAD ROMADHON<br>
                        NIP. 1967121992031002</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>

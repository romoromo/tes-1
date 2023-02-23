<?php Yii::import('ext.LokalIndonesia'); ?>
<!-- SKPD A -->
 <table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
                <thead>
                <tr>
                <th colspan="19" style="text-align-last:left;">BUKU KENDALI SKPD ANGSUR  <?php echo $data['judul'] ?> TAHUN PAJAK <?php echo  $tahun = $_REQUEST['tahun'] ?> <br>
                PER: <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?>
                </th>
                </tr>
                <thead>  
                  <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>NPWPD </th>
                    <th>ALAMAT</th>
                    <th>TAHUN PAJAK</th>
                    <th>TAHUN SK-A</th>
                    <th>JML ANGSUR</th>
                    <th>STATUS ANGSURAN</th>
                    <th>SISA ANGSURAN</th>
                    <th>KE <br>1</th>
                    <th>KE <br>2</th>
                    <th>KE <br>3</th>
                    <th>KE <br>4</th>
                    <th>KE <br>5</th>
                    <th>KE <br>6</th>
                    <th>KE <br>7</th>
                    <th>KE <br>8</th>
                    <th>KE <br>9</th>
                    <th>KE <br>10</th>
                    <th>KE <br>11</th>
                    <th>KE <br>12</th>
                  </tr>
                </thead>
                <tbody style="text-align: center;">
                <?php $no=1; foreach ($data['skpda'] as $list) :?>
                  <tr>
                    <td><?php echo $no++; ?></td> <!-- NO -->
                    <td><?php echo $list['TBLANGSURAN_NAMABADANUSAHA'] ?></td> <!-- NAMA -->
                    <td><?php echo $list['TBLANGSURAN_GOLONGAN'] ?>.<?php echo $list['TBLDAFTAR_NOPOK'] ?>.<?php echo $list['TBLKECAMATAN_ID'] ?>.<?php echo $list['TBLKELURAHAN_ID'] ?></td> <!-- NPWPD -->
                    <td><?php echo $list['TBLANGSURAN_ALAMATBADANUSAHA'] ?></td> <!-- ALAMAT -->
                    <td>20<?php echo $list['TBLPENDATAAN_THNPAJAK'] ?></td> <!-- ALAMAT -->
                    <td>20<?php echo $list['TBLANGSURAN_THNKETETAPAN'] ?></td> <!-- ALAMAT -->
                    <td><?php echo $list['JML_ANGSUR'] ?></td> <!-- ALAMAT -->
                    <td><?php echo $list['STAT'] ?></td> <!-- ALAMAT -->
                    <td>SISA <?php echo ($list['JML_ANGSUR']-$list['JML_SETOR']) ?> x</td> <!-- ALAMAT -->
                    <td><?php echo LokalIndonesia::ribuan($list['ANG1']) ?></td> <!-- JANUARI RP -->
                    <td><?php echo LokalIndonesia::ribuan($list['ANG2']) ?></td> <!-- FEBRUARI RP -->
                    <td><?php echo LokalIndonesia::ribuan($list['ANG3']) ?></td> <!--  MARET RP -->
                    <td><?php echo LokalIndonesia::ribuan($list['ANG4']) ?></td> <!-- APRIL RP -->
                    <td><?php echo LokalIndonesia::ribuan($list['ANG5']) ?></td> <!-- MEI RP -->
                    <td><?php echo LokalIndonesia::ribuan($list['ANG6']) ?></td> <!-- JUNI RP -->
                    <td><?php echo LokalIndonesia::ribuan($list['ANG7']) ?></td> <!-- JULI RP -->
                    <td><?php echo LokalIndonesia::ribuan($list['ANG8']) ?></td> <!-- AGUSTUS RP -->
                    <td><?php echo LokalIndonesia::ribuan($list['ANG9']) ?></td> <!-- SEPTEMBER RP -->
                    <td><?php echo LokalIndonesia::ribuan($list['ANG10']) ?></td> <!-- NOVEMBER RP -->
                    <td><?php echo LokalIndonesia::ribuan($list['ANG11']) ?></td> <!-- DESEMBER RP -->
                    <td><?php echo LokalIndonesia::ribuan($list['ANG12']) ?></td> <!-- JUMLAH RP -->
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
                <th>Yogyakarta,<?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')); ?></th> 
                <th></th> 
                </tr>
                <thead>  
                  <tr>
                    <th></th> 
                    <th></th>
                    <th></th>
                    <th colspan="1"><?php echo $data['jab3']['TBLPEJABAT_URAIAN']; ?></th>
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
                    <td><?php echo $data['jab3']['TBLPEJABAT_NAMA']; ?><br>
                        NIP. <?php echo $data['jab3']['TBLPEJABAT_NIP']; ?>
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
                    <?php 
                    if(strlen($data['jab4']['TBLPEJABAT_NIP'])==4){ ?>   
                        <td><?php echo $data['jab4']['TBLPEJABAT_NAMA']; ?><br>
                        NITB. <?php echo $data['jab4']['TBLPEJABAT_NIP']; ?></td>
                    <?php
                    } else { ?>
                        <td><?php echo $data['jab4']['TBLPEJABAT_NAMA']; ?><br>
                        NIP. <?php echo $data['jab4']['TBLPEJABAT_NIP']; ?></td> 
                    <?php 
                    } ?>
                    <td></td>
                  </tr>
                </tbody>
              </table>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
  <title>Kartu Data Pajak Air Tanah</title>
  <style type="text/css">
    <!--
    .style5 {font-size: 12}
    .style3 {
     font-size: 14px;
     font-weight: bold;
   }
   .style5 {font-size: 12px}
   .dotter {
    border: 1px dotted #3A3A3A;
    padding: 5px;
  }
-->
</style>
<?php 
Yii::import('ext.TanggalIndonesia');
$tgl = new TanggalIndonesia;
?>
</head>

<body style="margin:10px">
  <table width="100%" border="0" style="border-collapse:collapse">
    <tr>
      <td colspan="10"><div align="center" class="style3">KARTU DATA PAJAK AIR TANAH<br />
        TAHUN PAJAK <?php echo $tahun ?></div></td>
      </tr></table>
      <div class="dotter">	
        <table width="100%" border="0" style="border-collapse:collapse">
          <tr>
            <td width="229"><span class="style5">N.P.W.P.D</span></td>
            <td width="5"><span class="style5">:</span></td>
            <td colspan="8"><span class="style5"><?php echo $data['surat']['tblobyek_npwpd'] ?></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span></td>
          </tr>
          <tr>
            <td><span class="style5">NAMA WAJIB PAJAK </span></td>
            <td><span class="style5">:</span></td>
            <td colspan="8"><span class="style5"><?php echo $data['surat']['tblobyek_nama'] ?></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span></td>
          </tr>
          <tr>
            <td><span class="style5">ALAMAT BADAN </span></td>
            <td><span class="style5">:</span></td>
            <td colspan="8"><span class="style5"><?php echo $data['surat']['tblobyek_alamat'] ?></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span></td>
          </tr>
          <tr>
            <td><span class="style5">NAMA PEMILIK </span></td>
            <td><span class="style5">:</span></td>
            <td colspan="8"><span class="style5"><?php echo $data['surat']['tblsubyek_nama'] ?></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span></td>
          </tr>
          <tr>
            <td><span class="style5">ALAMAT PEMILIK </span></td>
            <td><span class="style5">:</span></td>
            <td colspan="8"><span class="style5"><?php echo $data['surat']['tblsubyek_alamat'] ?></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span></td>
          </tr>
        </table>
      </div>
      <div class="dotter">	
        <table width="100%" border="0" style="border-collapse:collapse">
          <tr>
            <td width="229"><span class="style5">A. Ayat Penerimaan Pajak </span></td>
            <td width="10"><span class="style5">:</span></td>
            <td width="400"><span class="style5"><?php echo $data['surat']['tblmasterrekening_kode'] ?></span></td>
            <td colspan="2"><span class="style5"></span> <span class="style5"></span></td>
            <td width="229"><span class="style5">E. Nomor Surat Teguran SPTPD </span></td>
            <td width="10"><span class="style5">:</span></td>
            <td width="10" colspan="3"><span class="style5"><?php echo "--" ?></span><span class="style5"></span><span class="style5"></span></td>
          </tr>
          <tr>
            <td><span class="style5">B. No. SPTPD Yang Dikirim </span></td>
            <td><span class="style5">:</span></td>
            <td><span class="style5"><?php echo $data['surat']['tblobyek_nomorsptpd'] ?></span></td>
            <td colspan="2"><span class="style5"></span><span class="style5"></span></td>
            <td><span class="style5">F. Tanggal Surat Teguran SPTPD </span></td>
            <td><span class="style5">:</span></td>
            <td colspan="3"><span class="style5"><?php echo "--" ?></span><span class="style5"></span><span class="style5"></span></td>
          </tr>
          <tr>
            <td><span class="style5">C. Tanggal Kirim SPTPD </span></td>
            <td><span class="style5">:</span></td>
            <td><span class="style5"><?php echo $tgl->TanggalHari($data['surat']['tgl_kirim']) ?></span></td>
            <td colspan="2"><span class="style5"></span><span class="style5"></span></td>
            <td><span class="style5">G. Terlambat Memasukan SPTPD </span></td>
            <td><span class="style5">:</span></td>
            <td colspan="3"><span class="style5"><?php echo "--" ?></span><span class="style5"></span><span class="style5"></span></td>
          </tr>
          <tr>
            <td><span class="style5">D. Tanggal Batas Pengembalian </span></td>
            <td><span class="style5">:</span></td>
            <td><span class="style5"><?php echo "--" ?></span></td>
            <td colspan="2"><span class="style5"></span><span class="style5"></span></td>
            <td><span class="style5">H. Tarif Pajak Sesuai Perda </span></td>
            <td><span class="style5">:</span></td>
            <td colspan="3"><span class="style5"><?php echo $data['surat']['tblmasterrekening_tarif']*100 ?>%</span><span class="style5"></span><span class="style5"></span></td>
          </tr>
        </table>
      </div>
      <div class="dotter">	
        <table width="100%" border="0" style="border-collapse:collapse">
          <tr>
            <td colspan="10"><span class="style5">OBJEK PAJAK AIR BAWAH TANAH </span></td>
          </tr>
        </table>
      </div>
      <div class="dotter">	
        <table width="100%" border="0" style="border-collapse:collapse">
          <tr>
            <td width="229"><span class="style5">1. Kelas / Golongan </span></td>
            <td width="3"><span class="style5">:</span></td>
            <td width="301"><span class="style5"><?php echo "--" ?></span></td>
            <td width="94"><span class="style5"></span></td>
            <td colspan="6"><span class="style5">Data Perhitungan Nilai Perolehan Air Tanah</span></td>
          </tr>
          <tr>
            <td><span class="style5">2. Nilai Meter Awal </span></td>
            <td><span class="style5">:</span></td>
            <td><span class="style5"><?php echo "--" ?></span></td>
            <td><span class="style5"></span></td>
            <td width="149"><span class="style5">I <?php echo "--" ?> M<sup>3</sup> </span></td>
            <td colspan="2"><span class="style5">X </span><span class="style5">Rp. <?php echo "--" ?></span></td>
            <td width="7"><span class="style5">=</span></td>
            <td width="365"><span class="style5">Rp. <?php echo "--" ?></span></td>
            <td width="1"><span class="style5"></span></td>
          </tr>
          <tr>
            <td><span class="style5">3. Nilai Meter Akhir </span></td>
            <td><span class="style5">:</span></td>
            <td><span class="style5"><?php echo "--" ?></span></td>
            <td><span class="style5"></span></td>
            <td><span class="style5">II <?php echo "--" ?> M<sup>3</sup> </span></td>
            <td colspan="2"><span class="style5"> X </span><span class="style5">Rp. <?php echo "--" ?></span></td>
            <td><span class="style5">=</span></td>
            <td><span class="style5">Rp. <?php echo "--" ?></span></td>
            <td><span class="style5"></span></td>
          </tr>
          <tr>
            <td><span class="style5">4. Volume Air Yang Digunakan </span></td>
            <td><span class="style5">:</span></td>
            <td><span class="style5"><?php echo "--" ?></span></td>
            <td><span class="style5"></span></td>
            <td><span class="style5">III <?php echo "--" ?> M<sup>3</sup> </span></td>
            <td colspan="2"><span class="style5">X </span><span class="style5">Rp. <?php echo "--" ?></span></td>
            <td><span class="style5">=</span></td>
            <td><span class="style5">Rp. <?php echo "--" ?></span></td>
            <td><span class="style5"></span></td>
          </tr>
          <tr>
            <td colspan="4" rowspan="3"><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span></td>
            <td><span class="style5">IV <?php echo "--" ?> M<sup>3</sup> </span></td>
            <td colspan="2"><span class="style5">X</span><span class="style5"> Rp. <?php echo "--" ?></span></td>
            <td><span class="style5">=</span></td>
            <td><span class="style5">Rp. <?php echo "--" ?></span></td>
            <td><span class="style5"></span></td>
          </tr>
          <tr>
            <td><span class="style5">V <?php echo "--" ?> M<sup>3</sup> </span></td>
            <td colspan="2"><span class="style5">X </span><span class="style5">Rp. <?php echo "--" ?></span></td>
            <td><span class="style5">=</span></td>
            <td><span class="style5">Rp. <?php echo "--" ?></span></td>
            <td><span class="style5"></span></td>
          </tr>
          <tr>
            <td colspan="4"><span class="style5">Jumlah Perolehan Air Tanah </span><span class="style5"></span><span class="style5"></span><span class="style5"></span></td>
            <td><span class="style5">Rp. <?php echo "--" ?></span></td>
            <td><span class="style5"></span></td>
          </tr>
        </table>
      </div>
      <div class="dotter">	
        <table width="100%" border="0" style="border-collapse:collapse">
          <tr>
            <td colspan="10"><table width="100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse:collapse">
              <tr>
                <td width="22" class="style5"><div align="center">No.</div></td>
                <td width="109" class="style5"><div align="center">Tanggal Terima SPTPD </div></td>
                <td width="94" class="style5"><div align="center">Masa Pajak </div></td>
                <td width="58" class="style5"><div align="center">Volume Air </div></td>
                <td width="71" class="style5"><div align="center">Nilai Perolehan Air Bawah Tanah </div></td>
                <td width="76" class="style5"><div align="center">Tanggal Penetapan </div></td>
                <td width="85" class="style5"><div align="center">No. Kohir Penetapan </div></td>
                <td width="88" class="style5"><div align="center">Jumlah Ketetapan </div></td>
                <td width="78" class="style5"><div align="center">Tanggal Penyetoran </div></td>
                <td width="78" class="style5"><div align="center">No. Bukti Penyetoran </div></td>
                <td width="125" class="style5"><div align="center">Jumlah Penyetoran </div></td>
              </tr>
              <?php $no=1; foreach ($data['transaksi'] as $key): ?>
              <tr>
                <td class="style5"><div align="center"><?php echo $no++ ?></div></td>
                <td class="style5"><?php echo date('d/m/Y', strtotime($key['tbltransaksiketetapan_tglterimasptpd'])); ?></td>
                <td class="style5"><?php echo date('d/m/Y', strtotime($key['tbltransaksiketetapan_masaawal'])) ?> s/d <?php echo date('d/m/Y', strtotime($key['tbltransaksiketetapan_masaakhir'])) ?></td>
                <td class="style5"><div align="right"><?php echo "--" ?></div></td>
                <td class="style5"><div align="right"><?php echo "--" ?></div></td>
                <td class="style5"><?php echo date('d/m/Y', strtotime($key['tbltransaksiketetapan_tglketetapan'])) ?></td>
                <td class="style5"><div align="center"><?php echo $key['tbltransaksiketetapan_nokohirketetapan'] ?></div></td>
                <td class="style5"><div align="right"><?php echo "--" ?></div></td>
                <td class="style5"><?php echo date('d/m/Y', strtotime($key['tbltransaksiketetapan_tglsetor'])) ?></td>
                <td class="style5"><div align="center"><?php echo "--" ?></div></td>
                <td class="style5"><div align="right"><?php echo $key['tbltransaksiketetapan_jumlahsetor'] ?></div></td>
              </tr>
            <?php endforeach ?>
          </table></td>
        </tr>
        <tr>
          <td colspan="10"><span class="style5">Hasil Pemerikasaan : </span></td>
        </tr>
      </table></div>
      <div class="dotter">	
        <table width="100%" border="0" style="border-collapse:collapse">
          <tr>
            <td colspan="10"><table width="100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse:collapse">
              <tr>
                <td width="24" class="style5"><div align="center">No.</div></td>
                <td width="80" class="style5"><div align="center">Masa Pajak </div></td>
                <td width="112" class="style5"><div align="center">Nilai Perolehan Hasil Pemeriksaan  </div></td>
                <td width="166" class="style5"><div align="center">Nilai Perolehan yang dilaporkan WP </div></td>
                <td width="87" class="style5"><div align="center">Selisih Nilai Perolehan </div></td>
                <td width="98" class="style5"><div align="center">Jumlah Penetapan </div></td>
                <td width="103" class="style5"><div align="center">Jumlah Penyetoran  </div></td>
                <td width="230" class="style5"><div align="center">Jumlah Hutang Pajak yang Harus di Setorkan </div></td>
              </tr>
              <?php $no=1; foreach ($data['hasil_transaksi'] as $key): ?>
              <tr>
                <td class="style5"><div align="center"><?php echo $no++ ?></div></td>
                <td class="style5"><?php echo date('d/m/Y', strtotime($key['tbltransaksiketetapan_masaawal'])) ?> s/d <?php echo date('d/m/Y', strtotime($key['tbltransaksiketetapan_masaakhir'])) ?></td>
                <td class="style5"><?php echo "--" ?></td>
                <td class="style5"><?php echo "--" ?></td>
                <td class="style5"><?php echo "--" ?></td>
                <td class="style5"><?php echo "--" ?></td>
                <td class="style5"><?php echo $key['tbltransaksiketetapan_jumlahsetor'] ?></td>
                <td class="style5"><?php echo "--" ?></td>
              </tr>
            <?php endforeach; ?>
          </table></td>
        </tr>
      </table>
    </div>
    <div class="dotter">	
      <table width="100%" border="0" style="border-collapse:collapse">
        <tr>
          <td colspan="10"><table width="100%" border="0">
            <tr>
              <td width="301" height="185" class="style5"><div align="center">
                <table width="200" border="0" >
                  <tr>
                    <td><div align="center">Disetujui,<br />
                      KEPALA BIDANG PENDATAAN DAN <br /></div></td>
                    </tr>
                    <tr>
                      <td height="73">&nbsp;</td>
                    </tr>
                    <tr>
                      <td><div	 align="center">Dra. ALFIANI <br />
                        PENATA TINGKAT I <br />
                        NIP : 19650314 199803 2 004 <br /></div></td>
                      </tr>
                    </table>
                  </div></td>
                  <td width="317" class="style5"><div align="center">
                    <table width="200" border="0">
                      <tr>
                        <td><div	 align="center">Disetujui,<br />
                          KEPALA SEKSI PENDATAAN / PENDAFTARAN <br /></div></td>
                        </tr>
                        <tr>
                          <td height="69">&nbsp;</td>
                        </tr>
                        <tr>
                          <td><div	 align="center">SUDARNO, SE <br />
                            PENATA MUDATINGKAT I<br />
                            NIP : 19650314 199803 2 004<br /></div></td>
                          </tr>
                        </table>
                      </div></td>
                      <td width="320" class="style5"><div align="center">
                        <table width="200" border="0">
                          <tr>
                            <td><p align="center">KASI PEMERIKSAAN </p>                </td>
                          </tr>
                          <tr>
                            <td height="107">&nbsp;</td>
                          </tr>
                          <tr>
                            <td><div	 align="center">FRIDA HANUM SIMATU, PANG, SE <br />
                              PENATA<br />
                              NIP : 19650314 199803 2 004 <br /></div></td>
                            </tr>
                          </table>
                        </div></td>
                        <td width="339" class="style5"><div align="center">
                          <table width="200" height="177" border="0">
                            <tr>
                              <td>Petugas Operator Komputer, </td>
                            </tr>
                            <tr>
                              <td>Tanggal Dibuat </td>
                            </tr>
                            <tr>
                              <td>Nama Petugas </td>
                            </tr>
                            <tr>
                              <td height="84">Tanda Tangan </td>
                            </tr>
                          </table>
                        </div></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></div>
              </body>
              </html>

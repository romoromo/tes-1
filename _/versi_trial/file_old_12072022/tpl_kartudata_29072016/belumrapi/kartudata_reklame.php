<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
  <title>Kartu Data Pajak Reklame</title>
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

<body>
  <table width="100%" border="0" style="border-collapse:collapse">
    <tr>
      <td colspan="10"><div align="center" class="style3">KARTU DATA REKLAME<br />
        <span class="style5">TAHUN PAJAK <?php echo $tahun ?></span></div></td>
      </tr>
    </table>
    <div class="dotter">	
      <table width="100%" border="0" style="border-collapse:collapse">
        <tr>
          <td width="229"><span class="style5">N.P.W.P.D</span></td>
          <td width="10"><span class="style5">:</span></td>
          <td width="640" colspan="8"><span class="style5"><?php echo $data['surat']['tblobyek_npwpd'] ?></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span><span class="style5"></span></td>
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
          <td width="400"><span class="style5"><?php echo $data['surat']['tblsubyek_alamat'] ?></span></td>
          <td colspan="2"><span class="style5"></span> <span class="style5"></span></td>
          <td width="229"><span class="style5">E. Nomor Surat Teguran</span></td>
          <td width="10"><span class="style5">:</span></td>
          <td width="10" colspan="3"><span class="style5"><?php echo "--" ?></span><span class="style5"></span><span class="style5"></span></td>
        </tr>
        <tr>
          <td><span class="style5">B. No. SPTPD Yang Dikirim </span></td>
          <td><span class="style5">:</span></td>
          <td><span class="style5"><?php echo $data['surat']['tblobyek_nomorsptpd'] ?></span></td>
          <td colspan="2"><span class="style5"></span><span class="style5"></span></td>
          <td><span class="style5">F. Tanggal Surat Teguran</span></td>
          <td><span class="style5">:</span></td>
          <td colspan="3"><span class="style5"><?php echo "--" ?></span><span class="style5"></span><span class="style5"></span></td>
        </tr>
        <tr>
          <td><span class="style5">C. Tanggal Kirim SPTPD </span></td>
          <td><span class="style5">:</span></td>
          <td><span class="style5"><?php echo $tgl->TanggalHari($data['surat']['tgl_kirim']) ?></span></td>
          <td colspan="2"><span class="style5"></span><span class="style5"></span></td>
          <td><span class="style5">G. Terlambat Memasukan</span></td>
          <td><span class="style5">:</span></td>
          <td colspan="3"><span class="style5"><?php echo "--" ?></span><span class="style5"></span><span class="style5"></span></td>
        </tr>
        <tr>
          <td><span class="style5">D. Tanggal Batas</span></td>
          <td><span class="style5">:</span></td>
          <td><span class="style5"><?php echo $tgl->TanggalHari($data['surat']['tblobyek_tglbataskirim']) ?></span></td>
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
          <td colspan="10"><span class="style5">OBJEK PAJAK REKLAME </span></td>
        </tr>
      </table>
    </div>
    <div class="dotter">	
      <table width="100%" border="0" style="border-collapse:collapse">
        <tr>
          <td colspan="10"><table width="100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse:collapse">
            <tr>
              <td width="28" class="style5"><div align="center">No.</div></td>
              <td width="135" class="style5"><div align="center">Tanggal Terima SPTPD </div></td>
              <td width="182" class="style5"><div align="center">Masa Pajak </div></td>
              <td width="89" class="style5"><div align="center">Nilai Perolehan Reklame </div></td>
              <td width="127" class="style5">Perhitungan Reklame </td>
              <td width="63" class="style5"><div align="center">Tanggal Penetapan </div></td>
              <td width="106" class="style5"><div align="center">No. Kohir Penetapan </div></td>
              <td width="109" class="style5"><div align="center">Jumlah Ketetapan </div></td>
              <td width="97" class="style5"><div align="center">Tanggal Penyetoran </div></td>
              <td width="97" class="style5"><div align="center">No. Bukti Penyetoran </div></td>
              <td width="160" class="style5"><div align="center">Jumlah Penyetoran </div></td>
            </tr>
            <?php $no=1; foreach ($data['transaksi'] as $key): ?>
            <tr>
              <td class="style5"><div align="center"><?php echo $no++ ?></div></td>
              <td class="style5"><?php echo date('d/m/Y', strtotime($key['tbltransaksiketetapan_tglterimasptpd'])); ?></td>
              <td class="style5"><?php echo date('d/m/Y', strtotime($key['tbltransaksiketetapan_masaawal'])) ?> s/d <?php echo date('d/m/Y', strtotime($key['tbltransaksiketetapan_masaakhir'])) ?></td>
              <td class="style5"><div align="right"><?php echo "--" ?></div></td>
              <td class="style5"><?php echo "--" ?></td>
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
      </table></div>
      <div class="dotter">	
        <table width="100%" border="0" style="border-collapse:collapse">
          <tr>
            <td colspan="10"><span class="style5">Hasil Pemeriksaan : </span></td>
          </tr>
        </table>
      </div>
      <div class="dotter">	
        <table width="100%" border="0" style="border-collapse:collapse">
          <tr>
            <td colspan="10"><table width="100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse:collapse">
              <tr>
                <td width="33" class="style5"><div align="center">No.</div></td>
                <td width="108" class="style5"><div align="center">Masa Pajak </div></td>
                <td width="189" class="style5"><div align="center">Nilai Perolehan Pajak Reklame <br />
                  Hasil Pemeriksaan  </div></td>
                  <td width="183" class="style5"><div align="center">Nilai Perolehan Pajak Reklame <br />
                    yang dilaporkan WP </div></td>
                    <td width="147" class="style5"><div align="center">Selisih Nilai Perolehan </div></td>
                    <td width="127" class="style5"><div align="center">Jumlah Ketetapan </div></td>
                    <td width="161" class="style5"><div align="center">Jumlah Penyetoran  </div></td>
                    <td width="269" class="style5"><div align="center">Jumlah Hutang Pajak yang Harus di Setorkan </div></td>
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
                  <?php endforeach ?>
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
                      </table>
                    </body>
                    </html>

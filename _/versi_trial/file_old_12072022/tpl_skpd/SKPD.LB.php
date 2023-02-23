<?php 
$ts = $data['transaksiketetapan'];
$no = 1;
$nomor_kohir = strtoupper( $ts['tblketetapanlebihbayar_nokohirketetapan'] );;
$masa_awal = LokalIndonesia::TGLID($ts['tblketetapanlebihbayar_masaawal'],'/');
$masa_akhir = LokalIndonesia::TGLID($ts['tblketetapanlebihbayar_masaakhir'],'/');
$wp_nama = strtoupper( $ts['tblobyek_nama'] );
$wp_alamat = strtoupper( $ts['tblobyek_alamat'] );
$wp_npwpd = strtoupper( $ts['tblobyek_npwpd'] );
$kelurahan_nama = strtoupper( $ts['refkelurahan_nama'] );
$kecamatan_nama = strtoupper( $ts['refkecamatan_nama'] );
$rekening_kode = strtoupper( $ts['tblmasterrekening_kode'] );
$rekening_nama = strtoupper( $ts['tblmasterrekening_nama'] );
$tblketetapanlebihbayar_pajak =  $ts['tblketetapanlebihbayar_pajak'];
$tblketetapanlebihbayar_rupiahbunga =  $ts['tblketetapanlebihbayar_rupiahbunga'];
$tblketetapanlebihbayar_pajaktotallb =  $ts['tblketetapanlebihbayar_pajaktotallb'];
$tblketetapanlebihbayar_tglketetapanlb =  $ts['tblketetapanlebihbayar_tglketetapankb'];
$tblketetapanlebihbayar_pajaktotallb_terbilang = LokalIndonesia::terbilangrupiah(intval( $ts['tblketetapanlebihbayar_pajaktotallb'] ));
 ?>
 <!-- <?php var_dump($tblketetapanlebihbayar_pajaktotallb_terbilang); ?> -->
 <!-- <?php var_dump($tblketetapanlebihbayar_pajaktotallb); ?> -->
 <!-- <?php var_dump(intval( $ts['tblketetapanlebihbayar_pajaktotallb'] )); ?> -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Surat Ketetapan Pajak Daerah Lebih Bayar </title>
</head>
<style>
table{border-collapse:collapse;}
.outer{border-top:dotted black 1px; border-right:dotted black 1px; border-bottom:dotted black 1px; border-left:dotted black 1px;}
.top{border-top:dotted black 1px;}
.right{border-right:dotted black 1px;}
.bottom{border-bottom:dotted black 1px;}
.left{border-left:dotted black 1px;}

.outer {
}
</style>
<body>
  <center>
	<div style="max-width:1000px; padding:5px;">
		<table width="90%" class="outer" cellspacing="0">
			<tr>
				<td colspan="4" align="center" class="outer">
					PEMERINTAH <?= strtoupper( AppConfig::model()->getValue('APLIKASI_WILAYAH') ) ?><br />
					<?= strtoupper( AppConfig::model()->getValue('APLIKASI_ALAMAT_INSTANSI') ) ?>			  </td>
			  <td colspan="3" align="center" class="outer">
					SURAT KETETAPAN PAJAK DAERAH LEBIH BAYAR
				    (SKPD.LB)<br />
					MASA PAJAK<br />
		      <strong><?=  $masa_awal ?></strong> s/d <strong><?=  $masa_akhir ?></strong> </td>
				<td width="19%" align="center" class="outer">
					NO. KOHIR<br />
					<?=  $nomor_kohir ?>				</td>
			</tr>
			<tr>
			  <td colspan="8" align="center">&nbsp;</td>
		  </tr>
			<tr>
			  <td colspan="2">Nama Badang /Merk Usaha </td>
			  <td width="1%" align="center">:</td>
			  <td colspan="4"><?=  $wp_nama ?></td>
			  <td>&nbsp;</td>
		  </tr>
			<tr>
			  <td colspan="2">Alamat</td>
			  <td align="center">:</td>
			  <td colspan="4"><?=  $wp_alamat ?></td>
			  <td>&nbsp;</td>
		  </tr>
			<tr>
			  <td colspan="2">&nbsp;</td>
			  <td align="center">:</td>
			  <td colspan="4"><?=  $kelurahan_nama ?> - <?=  $kecamatan_nama ?></td>
			  <td>&nbsp;</td>
		  </tr>
			<tr>
			  <td colspan="2">N.P.W.P.D</td>
			  <td align="center">:</td>
			  <td colspan="4"><?=  $wp_npwpd ?></td>
			  <td>&nbsp;</td>
		  </tr>
			<tr>
			  <td colspan="2">No. Ijin Usaha </td>
			  <td align="center">:</td>
			  <td colspan="4"></td>
			  <td>&nbsp;</td>
		  </tr>
			<tr>
			  <td colspan="2">Batas Penyetoran Terakhir </td>
			  <td align="center">:</td>
			  <td colspan="4">30 Hari Setelah SKPD diterima Wajib Pajak (WP) </td>
			  <td>&nbsp;</td>
		  </tr>
			<tr class="bottom">
			  <td colspan="8">&nbsp;</td>
		  </tr>
			<tr class="bottom">
			  <td colspan="8">I. Berdasarkan Pasal 109 Perda No. 2 Tahun 2011 telah dilakukan pemeriksaan atau keterangan lain atas pelaksanaan kewajiban : </td>
			 </tr>
			 <tr class="bottom">
			  <td colspan="8">&nbsp;</td>
			 </tr>
			<tr>
              <td colspan="2">Ayat Pajak</td>
			  <td>:</td>
			  <td width="22%"><?=  $rekening_kode ?></td>
			  <td colspan="3">&nbsp;</td>
			  <td>&nbsp;</td>
		  </tr>
			<tr>
              <td colspan="2">Nama Pajak </td>
			  <td>:</td>
			  <td><?=  $rekening_nama ?></td>
			  <td colspan="3">&nbsp;</td>
			  <td>&nbsp;</td>
		  </tr>
			
			
			<tr>
			  <td colspan="8">&nbsp;</td>
		  </tr>
		  <tr class="bottom">
			  <td colspan="8">II. Dari pemeriksaan atau keterangan lain tersebut diatas, perhitungan jumlah yang masih harus dibayar adalah sebagai berikut : </td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td align="right">&nbsp;</td>
		  </tr>
			<tr>
			  <td width="3%">1.</td>
			  <td colspan="4">Dasar Pengenaan </td>
			  <td width="21%">&nbsp;</td>
			  <td width="4%">Rp.</td>
		      <td align="right"><!-- $dasar_pajak -->0</td>
		  </tr>
			<tr>
			  <td>2.</td>
			  <td colspan="4">Pajak terhutang </td>
			  <td>&nbsp;</td>
			  <td>Rp.</td>
		      <td align="right"><?= "0"; ?> <!-- $terhutang_pajak --></td>
		  </tr>
			<tr>
			  <td>3.</td>
			  <td colspan="4">Kredit pajak </td>
			  <td>&nbsp;</td>
			  <td>Rp.</td>
			  <td align="right">&nbsp;</td>
		  </tr>
			
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">- Setoran </td>
			  <td>&nbsp;</td>
			  <td>Rp.</td>
			  <td align="right"><?= "0"; ?> <!-- $setoran_pajak --></td>
		  </tr>
			<tr>
			  <td>4.</td>
			  <td colspan="4">Jumlah Kelebihan Pajak Lebih Bayar </td>
			  <td>&nbsp;</td>
			  <td>Rp.</td>
			  <td align="right"><?= LokalIndonesia::ribuan( $tblketetapanlebihbayar_pajaktotallb); ?> <!-- $kekurangan_pajak --></td>
		  </tr>
			<tr>
			  <td>5.</td>
			  <td colspan="4">Sanksi</td>
			  <td>&nbsp;</td>
			  <td>Rp.</td>
			  <td align="right"><?= "0"; ?> <!-- $sanksi_pajak --></td>
		  </tr>
			<tr class="top bottom">
			  <td>6.</td>
			  <td colspan="4">Jumlah yang masih harus dibayar </td>
			  <td>&nbsp;</td>
			  <td>Rp.</td>
		      <td align="right"><?= "0"; ?> <!-- $jumlah_pajak --></td>
		  </tr>
			<tr>
			  <td width="3%">&nbsp;</td>
			  <td colspan="4">Jumlah Ketetapan Pokok Pajak </td>
			  <td width="21%">&nbsp;</td>
			  <td width="4%">Rp.</td>
		      <td align="right"><?=  LokalIndonesia::ribuan( $tblketetapanlebihbayar_pajak ) ?></td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">Pengenaan Biaya Administrasi </td>
			  <td>&nbsp;</td>
			  <td>Rp.</td>
		      <td align="right"><?=  LokalIndonesia::ribuan( $tblketetapanlebihbayar_rupiahbunga ) ?></td>
		  </tr>
			
			
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">Pengenaan Kenaikan Pajak / Denda </td>
			  <td>&nbsp;</td>
			  <td>Rp.</td>
			  <td align="right">0.00</td>
		  </tr>
			<tr class="top bottom">
			  <td>&nbsp;</td>
			  <td colspan="4">Jumlah Ketetapan Pajak Terutang </td>
			  <td>&nbsp;</td>
			  <td>Rp.</td>
		      <td align="right"><?=  LokalIndonesia::ribuan( $tblketetapanlebihbayar_pajaktotallb ) ?></td>
		  </tr>
			
			<tr>
			  <td colspan="8">Dengan Huruf :</td>
		  </tr>
			<tr>
			  <td colspan="8"><?= $tblketetapanlebihbayar_pajaktotallb_terbilang ?></td>
		  </tr>
			<tr class="bottom">
			  <td colspan="8">&nbsp;</td>
		  </tr>
			<tr>
			  <td colspan="5">PERHATIAN</td>
			  <td>&nbsp;</td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td>1.</td>
			  <td colspan="5">Harap penyetoran dilakukan melalui BPK atau Kas Daerah dengan menggunakan <br />
		      Surat Setoran Pajak Daerah (SSPD) </td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td>2.</td>
			  <td colspan="5">SKPDKB ini dibayar dengan cara sekaligus / angsuran </td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td></td>
			  <td colspan="4"></td>
			  <td colspan="3" align="center">&nbsp;</td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">&nbsp;</td>
			  <td colspan="3" align="center">&nbsp;</td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">&nbsp;</td>
			  <td colspan="3" align="center"><?= strtoupper( AppConfig::model()->getValue('APLIKASI_CETAK_WILAYAH') ) ?>, <?=  LokalIndonesia::TanggalUmum( $tblketetapanlebihbayar_tglketetapanlb ) ?></td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">&nbsp;</td>
			  <td colspan="3" align="center">KEPALA DINAS PENDAPATAN DAERAH</td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">&nbsp;</td>
			  <td colspan="3" align="center"><?= strtoupper( AppConfig::model()->getValue('APLIKASI_WILAYAH') ) ?> </td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">&nbsp;</td>
			  <td>&nbsp;</td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">&nbsp;</td>
			  <td>&nbsp;</td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">&nbsp;</td>
			  <td>&nbsp;</td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">&nbsp;</td>
			  <td>&nbsp;</td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">&nbsp;</td>
			  <td colspan="3" align="center"><?= strtoupper( AppConfig::model()->getValue('CETAK_KEPALA_NAMA') ) ?></td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">&nbsp;</td>
			  <td colspan="3" align="center"><?= strtoupper( AppConfig::model()->getValue('CETAK_KEPALA_JABATAN') ) ?></td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">&nbsp;</td>
			  <td colspan="3" align="center">NIP. <?= strtoupper( AppConfig::model()->getValue('CETAK_KEPALA_NIP') ) ?> </td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">&nbsp;</td>
			  <td colspan="3" align="center">&nbsp;</td>
		  </tr>
		</table>
	</div>
  </center>
</body>
</html>

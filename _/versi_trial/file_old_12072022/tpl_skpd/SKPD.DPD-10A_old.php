<?php 
$ts = $data['transaksiketetapan'];
$no = 1;
$nomor_kohir = strtoupper( $ts['tbltransaksiketetapan_nokohirketetapan'] );;
$masa_awal = LokalIndonesia::TGLID($ts['tbltransaksiketetapan_masaawal'],'/');
$masa_akhir = LokalIndonesia::TGLID($ts['tbltransaksiketetapan_masaakhir'],'/');
$wp_nama = strtoupper( $ts['tblobyek_nama'] );
$wp_alamat = strtoupper( $ts['tblobyek_alamat'] );
$wp_npwpd = strtoupper( $ts['tblobyek_npwpd'] );
$kelurahan_nama = strtoupper( $ts['refkelurahan_nama'] );
$kecamatan_nama = strtoupper( $ts['refkecamatan_nama'] );
$rekening_kode = strtoupper( $ts['tblmasterrekening_kode'] );
$rekening_nama = strtoupper( $ts['tblmasterrekening_nama'] );
$tbltransaksiketetapan_pajak =  $ts['tbltransaksiketetapan_pajak'];
$tbltransaksiketetapan_rupiahbunga =  $ts['tbltransaksiketetapan_rupiahbunga'];
$tbltransaksiketetapan_pajakketetapan =  $ts['tbltransaksiketetapan_pajakketetapan'];
$tbltransaksiketetapan_tglketetapan =  $ts['tbltransaksiketetapan_tglketetapan'];
$tbltransaksiketetapan_pajakketetapan_terbilang = LokalIndonesia::terbilangrupiah(floatval( $ts['tbltransaksiketetapan_pajakketetapan'] ));
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Surat Ketetapan Pajak Daerah</title>
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
					<?= strtoupper( AppConfig::model()->getValue('APLIKASI_ALAMAT_INSTANSI') ) ?>
									</td>
			  <td colspan="3" align="center" class="outer">
					SURAT KETETAPAN PAJAK DAERAH<br />
				    (SKPD)<br />
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
			<tr>
			  <td>No.</td>
			  <td align="center">KD. REKENING </td>
			  <td colspan="4" align="center">JENIS PAJAK DAERAH </td>
			  <td colspan="2" align="center">JUMLAH</td>
		  </tr>
			<tr>
			  <td><?= $no ?>.</td>
			  <td align="center"><?=  $rekening_kode ?></td>
			  <td colspan="4"><?=  $rekening_nama ?></td>
			  <td>Rp.</td>
			  <td align="right"><?=  LokalIndonesia::ribuan( $tbltransaksiketetapan_pajak ) ?></td>
		  </tr>
			
			<tr>
			  <td colspan="8">&nbsp;</td>
		  </tr>
			<tr>
			  <td width="2%">&nbsp;</td>
			  <td colspan="4">Jumlah Ketetapan Pokok Pajak </td>
			  <td width="21%">&nbsp;</td>
			  <td width="4%">Rp.</td>
		      <td align="right"><?=  LokalIndonesia::ribuan( $tbltransaksiketetapan_pajak ) ?></td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">Pengenaan Biaya Administrasi </td>
			  <td>&nbsp;</td>
			  <td>Rp.</td>
		      <td align="right"><?=  LokalIndonesia::ribuan( $tbltransaksiketetapan_rupiahbunga ) ?></td>
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
		      <td align="right"><?=  LokalIndonesia::ribuan( $tbltransaksiketetapan_pajakketetapan ) ?></td>
		  </tr>
			
			<tr>
			  <td colspan="8">Dengan Huruf :</td>
		  </tr>
			<tr>
			  <td colspan="8"><?= $tbltransaksiketetapan_pajakketetapan_terbilang ?></td>
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
			  <td colspan="5">Harap penyetoran dilakukan melalui Bendahara Penerimaan Dispenda Kab. Deli Serdang </td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td>2.</td>
			  <td colspan="5">Penyetoran harus menggunakan Surat Setoran Pajak Daerah (SSPD) </td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td>3.</td>
			  <td colspan="5">Penyetoran Pajak Daerah dinyatakan LUNAS, apabila SSPD telah disahkan/Validasi Kas </td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="5">Register/cap/tanda tangan BKP </td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td>4.</td>
			  <td colspan="5">Apabila dalam masa Pajak berjalan, Saudara belum dapat melunasi hutang Pajak Saudara, </td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="5">maka penagihan akan kami lakukan, dengan mengirimkan Surat Tagihan Pajak Daerah (STPD) </td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="5">dengan mengenakan kenaikan Pajak/denda dan sanksi administrasi berupa bunga sebesar </td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="5">2% perbulan, seusai Undang-undang dan Peraturan Daerah (PERDA) yang telah diberlakukan </td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td>5.</td>
			  <td colspan="5">Apabila dalam SKPD ini masih ada hal yang belum dimengerti harap saudara datang ke </td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="5">kantor Dispenda Kabupaten Deli Serdang, setiap hari jam kerja </td>
			  <td colspan="2">&nbsp;</td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">&nbsp;</td>
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
			  <td colspan="3" align="center"><?= strtoupper( AppConfig::model()->getValue('APLIKASI_CETAK_WILAYAH') ) ?>, <?=  LokalIndonesia::TanggalUmum( $tbltransaksiketetapan_tglketetapan ) ?></td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">&nbsp;</td>
			  <td colspan="3" align="center">KEPALA DINAS PENDAPATAN DAERAH</td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4">&nbsp;</td>
			  <td colspan="3" align="center">KABUPATEN DELI SERDANG </td>
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

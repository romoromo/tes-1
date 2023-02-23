<?php Yii::import('ext.LokalIndonesia'); ?>
<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=Generator content="Microsoft Word 15 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
  {font-family:"Cambria Math";
  panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
  {font-family:Calibri;
  panose-1:2 15 5 2 2 2 4 3 2 4;}
@font-face
  {font-family:Cambria;
  panose-1:2 4 5 3 5 4 6 3 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
  {margin-top:0in;
  margin-right:0in;
  margin-bottom:10.0pt;
  margin-left:0in;
  line-height:115%;
  font-size:11.0pt;
  font-family:"Calibri","sans-serif";}
h1
  {mso-style-link:"Heading 1 Char";
  margin-top:24.0pt;
  margin-right:0in;
  margin-bottom:0in;
  margin-left:0in;
  margin-bottom:.0001pt;
  text-indent:0in;
  line-height:115%;
  page-break-after:avoid;
  font-size:14.0pt;
  font-family:"Cambria","serif";
  color:#365F91;}
h2
  {mso-style-link:"Heading 2 Char";
  margin-top:10.0pt;
  margin-right:0in;
  margin-bottom:0in;
  margin-left:.5in;
  margin-bottom:.0001pt;
  text-indent:0in;
  line-height:115%;
  page-break-after:avoid;
  font-size:13.0pt;
  font-family:"Cambria","serif";
  color:#4F81BD;}
h3
  {mso-style-link:"Heading 3 Char";
  margin-top:10.0pt;
  margin-right:0in;
  margin-bottom:0in;
  margin-left:1.0in;
  margin-bottom:.0001pt;
  text-indent:0in;
  line-height:115%;
  page-break-after:avoid;
  font-size:11.0pt;
  font-family:"Cambria","serif";
  color:#4F81BD;}
h4
  {mso-style-link:"Heading 4 Char";
  margin-top:10.0pt;
  margin-right:0in;
  margin-bottom:0in;
  margin-left:1.5in;
  margin-bottom:.0001pt;
  text-indent:0in;
  line-height:115%;
  page-break-after:avoid;
  font-size:11.0pt;
  font-family:"Cambria","serif";
  color:#4F81BD;
  font-style:italic;}
h5
  {mso-style-link:"Heading 5 Char";
  margin-top:10.0pt;
  margin-right:0in;
  margin-bottom:0in;
  margin-left:2.0in;
  margin-bottom:.0001pt;
  text-indent:0in;
  line-height:115%;
  page-break-after:avoid;
  font-size:11.0pt;
  font-family:"Cambria","serif";
  color:#243F60;
  font-weight:normal;}
h6
  {mso-style-link:"Heading 6 Char";
  margin-top:10.0pt;
  margin-right:0in;
  margin-bottom:0in;
  margin-left:2.5in;
  margin-bottom:.0001pt;
  text-indent:0in;
  line-height:115%;
  page-break-after:avoid;
  font-size:11.0pt;
  font-family:"Cambria","serif";
  color:#243F60;
  font-weight:normal;
  font-style:italic;}
p.MsoHeading7, li.MsoHeading7, div.MsoHeading7
  {mso-style-link:"Heading 7 Char";
  margin-top:10.0pt;
  margin-right:0in;
  margin-bottom:0in;
  margin-left:3.0in;
  margin-bottom:.0001pt;
  text-indent:0in;
  line-height:115%;
  page-break-after:avoid;
  font-size:11.0pt;
  font-family:"Cambria","serif";
  color:#404040;
  font-style:italic;}
p.MsoHeading8, li.MsoHeading8, div.MsoHeading8
  {mso-style-link:"Heading 8 Char";
  margin-top:10.0pt;
  margin-right:0in;
  margin-bottom:0in;
  margin-left:3.5in;
  margin-bottom:.0001pt;
  text-indent:0in;
  line-height:115%;
  page-break-after:avoid;
  font-size:10.0pt;
  font-family:"Cambria","serif";
  color:#404040;}
p.MsoHeading9, li.MsoHeading9, div.MsoHeading9
  {mso-style-link:"Heading 9 Char";
  margin-top:10.0pt;
  margin-right:0in;
  margin-bottom:0in;
  margin-left:4.0in;
  margin-bottom:.0001pt;
  text-indent:0in;
  line-height:115%;
  page-break-after:avoid;
  font-size:10.0pt;
  font-family:"Cambria","serif";
  color:#404040;
  font-style:italic;}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
  {margin-top:0in;
  margin-right:0in;
  margin-bottom:10.0pt;
  margin-left:.5in;
  line-height:115%;
  font-size:11.0pt;
  font-family:"Calibri","sans-serif";}
p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
  {margin-top:0in;
  margin-right:0in;
  margin-bottom:0in;
  margin-left:.5in;
  margin-bottom:.0001pt;
  line-height:115%;
  font-size:11.0pt;
  font-family:"Calibri","sans-serif";}
p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
  {margin-top:0in;
  margin-right:0in;
  margin-bottom:0in;
  margin-left:.5in;
  margin-bottom:.0001pt;
  line-height:115%;
  font-size:11.0pt;
  font-family:"Calibri","sans-serif";}
p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
  {margin-top:0in;
  margin-right:0in;
  margin-bottom:10.0pt;
  margin-left:.5in;
  line-height:115%;
  font-size:11.0pt;
  font-family:"Calibri","sans-serif";}
span.Heading1Char
  {mso-style-name:"Heading 1 Char";
  mso-style-link:"Heading 1";
  font-family:"Cambria","serif";
  color:#365F91;
  font-weight:bold;}
span.Heading2Char
  {mso-style-name:"Heading 2 Char";
  mso-style-link:"Heading 2";
  font-family:"Cambria","serif";
  color:#4F81BD;
  font-weight:bold;}
span.Heading3Char
  {mso-style-name:"Heading 3 Char";
  mso-style-link:"Heading 3";
  font-family:"Cambria","serif";
  color:#4F81BD;
  font-weight:bold;}
span.Heading4Char
  {mso-style-name:"Heading 4 Char";
  mso-style-link:"Heading 4";
  font-family:"Cambria","serif";
  color:#4F81BD;
  font-weight:bold;
  font-style:italic;}
span.Heading5Char
  {mso-style-name:"Heading 5 Char";
  mso-style-link:"Heading 5";
  font-family:"Cambria","serif";
  color:#243F60;}
span.Heading6Char
  {mso-style-name:"Heading 6 Char";
  mso-style-link:"Heading 6";
  font-family:"Cambria","serif";
  color:#243F60;
  font-style:italic;}
span.Heading7Char
  {mso-style-name:"Heading 7 Char";
  mso-style-link:"Heading 7";
  font-family:"Cambria","serif";
  color:#404040;
  font-style:italic;}
span.Heading8Char
  {mso-style-name:"Heading 8 Char";
  mso-style-link:"Heading 8";
  font-family:"Cambria","serif";
  color:#404040;}
span.Heading9Char
  {mso-style-name:"Heading 9 Char";
  mso-style-link:"Heading 9";
  font-family:"Cambria","serif";
  color:#404040;
  font-style:italic;}
.MsoChpDefault
  {font-family:"Calibri","sans-serif";}
@page WordSection1
  {size:8.5in 11.0in;
  margin:1.0in 1.0in 1.0in 1.0in;}
div.WordSection1
  {page:WordSection1;}
 /* List Definitions */
 ol
  {margin-bottom:0in;}
ul
  {margin-bottom:0in;}
-->
</style>

</head>

<body lang=EN-US>

<div class=WordSection1 align="center">

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=672
 style='width:7.0in;margin-left:-12.6pt;border-collapse:collapse;border:none'>
 <tr style='height:71.5pt'>
  <td width=276 colspan=2 style='width:207.0pt;border:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:71.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>PEMERINTAH KOTA TEGAL<br>
BADAN KEUANGAN DAERAH </p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>JL. KI GEDE SEBAYU NO. 5</p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>TELP (0283) 353714</p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>T E G A L</p></td>
  <td width=270 colspan=2 style='width:202.5pt;border:solid black 1.0pt;
  border-left:none;padding:0in 5.4pt 0in 5.4pt;height:71.5pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>SURAT TAGIHAN RETRIBUSI DAERAH</p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><br>
  TAHUN RETRIBUSI : <?php echo $data['strd']['tbltransaksiretribusi_tahunpajak'] ?></p>
  </td>
  <td width=126 style='width:94.5pt;border:solid black 1.0pt;border-left:none;
  padding:0in 5.4pt 0in 5.4pt;height:71.5pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>No. Urut :</p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>&nbsp;</p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><?php echo $data['strd']['tblsetoran_nomorsetor'] ?></p>
  </td>
 </tr>
 <tr style='height:85.0pt'>
  <td width=672 colspan=5 valign=top style='width:7.0in;border:solid black 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:85.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'> NAMA  : <?php echo $data['strd']['tblsubyek_nama'] ?></p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'> ALAMAT  : <?php echo $data['strd']['tblsubyek_alamat'] ?></p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'> NPWPD  : <?php echo $data['strd']['tblobyek_npwpd'] ?></p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>&nbsp;</p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'> Tanggal Jatuh Tempo : <?php echo date('d-m-Y',strtotime($data['strd']['tbltransaksiretribusi_tgljatuhtempo'])) ?></p>
  </td>
 </tr>
 <tr style='height:206.5pt'>
  <td width=672 colspan=5 style='width:7.0in;border:solid black 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:206.5pt'>
  <p class=MsoListParagraphCxSpFirst style='margin-bottom:0in;margin-bottom:
  .0001pt;text-indent:-.5in;line-height:normal'><span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>I.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>Berdasarkan Pasal 7 &amp; Pasal 10 Undang undang No. 18 Tahun 1997</p>
  <p class=MsoListParagraphCxSpMiddle style='margin-bottom:0in;margin-bottom:
  .0001pt;line-height:normal'>Telah dilakukan pemeriksaan/keterangann lain atas
  pelaksanaan kewajiban :</p>
  <p class=MsoListParagraphCxSpMiddle style='margin-bottom:0in;margin-bottom:
  .0001pt;line-height:normal'>Kode Rekening : <?php echo $data['strd']['tblsetoran_rekeningkode'] ?></p>
  <p class=MsoListParagraphCxSpMiddle style='margin-bottom:0in;margin-bottom:
  .0001pt;line-height:normal'>Nama : <?php echo $data['strd']['tblmasterrekening_nama'] ?></p>
  <p class=MsoListParagraphCxSpMiddle style='margin-bottom:0in;margin-bottom:
  .0001pt;line-height:normal'>TAHUN RETRIBUSI : TAHUN <?php echo $data['strd']['tbltransaksiretribusi_tahunpajakn'] ?></p>
  <p class=MsoListParagraphCxSpLast style='margin-bottom:0in;margin-bottom:
  .0001pt;text-indent:-.5in;line-height:normal'><span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>II.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>Dari penelitian dan atau pemeriksaan tersebut diatas, penghitungan
  jumlah<br>
  yang masih harus dibayar adalah sebagai berikut :<br>
  1. Pajak/Ret. Yang kurang bayar Rp. 0,00<br>
  2. Sanksi administrasi :<br>
   a. Biaya tambahan (Psl.19(2)) Rp. <?php echo number_format( round($data['strd']['tblsetoran_bungasetor']),2,',','.') ?><br>
   ----------------------<br>
   b. Jumlah Biaya -<br>
   tambahan (a) Rp. <?php echo number_format( round($data['strd']['tblsetoran_bungasetor']),2,',','.') ?><br>
  3. Jumlah Pajak/Ret. yang masih -<br>
   harus dibayar (1+2b) Rp. <?php echo number_format( round($data['strd']['tblsetoran_bungasetor']),2,',','.') ?> </p>
  </td>
 </tr>
 <tr style='height:17.5pt'>
  <td width=672 colspan=5 style='width:7.0in;border:solid black 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:17.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'> Dengan Huruf : <?php echo LokalIndonesia::terbilangangka(round($data['strd']['tblsetoran_bungasetor'])) ?> rupiah</p>
  </td>
 </tr>
 <tr style='height:80.5pt'>
  <td width=672 colspan=5 valign=top style='width:7.0in;border:solid black 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:80.5pt'>
  <p class=MsoListParagraphCxSpFirst style='margin-bottom:0in;margin-bottom:
  .0001pt;text-indent:-.25in;line-height:normal'><span style='font-size:12.0pt'>1.<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
  style='font-size:12.0pt'>Harap penyetoran dilakukan pada Kas Daerah atau
  tempat lain yang ditunjuk (BKP,PBKP) dengan menggunakan Surat Ketetapan
  Retribusi Daerah (SKRD)<br>
  <br>
  </span></p>
  <p class=MsoListParagraphCxSpLast style='margin-bottom:0in;margin-bottom:
  .0001pt;text-indent:-.25in;line-height:normal'><span style='font-size:12.0pt'>2.<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
  style='font-size:12.0pt'>Apabila SKRD ini tidak atau kurang dibayar lewat
  waktu paling lama 1 bulan setelah SKRD diterima atau lewat tanggal <br>
  <br>
  </span></p>
  </td>
 </tr>
 <tr style='height:168.25pt'>
  <td width=672 colspan=5 valign=top style='width:7.0in;border:solid black 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:168.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>T E G A L, <?php echo LokalIndonesia::TanggalUmum(date('Y-m-d')) ?><br>
  a.n. KEPALA DPPKAD KOTA TEGAL</p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>KABID PENDATAAN PENETAPAN DAN PENAGIHAN<br>
    Ka. Sub. Bid. Penetapan<br>
  </p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><br>
    Tgl.terima  : </p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>Nama WP/WR  :</p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>Parap WP/WR  :
  </p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>
  </p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>YUSABBIHUL AKBAR
  S.Kom <br>
  ----------------------------------------</p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>NIP. 19771221 200212 1 006</p>
  </td>
 </tr>
 <tr style='height:103.0pt'>
  <td width=224 valign=top style='width:168.0pt;border:solid black 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:103.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>Penyetor</p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>&nbsp;</p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>&nbsp;</p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>&nbsp;</p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>___________________</p>
  </td>
  <td width=224 colspan=2 valign=top style='width:168.0pt;border-top:none;
  border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:103.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>Diterima Oleh,</p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>Petugas Tempat Pennmbayaran<br>
  Tanggal  :</p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>Tanda Tangan  :</p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>Nama Terang  :</p>
  </td>
  <td width=224 colspan=2 valign=top style='width:168.0pt;border-top:none;
  border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:103.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>Ruang untuk Teraan</p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>Kas Register</p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>&nbsp;</p>
  </td>
 </tr>
 <tr height=0>
  <td width=224 style='border:none'></td>
  <td width=52 style='border:none'></td>
  <td width=172 style='border:none'></td>
  <td width=98 style='border:none'></td>
  <td width=126 style='border:none'></td>
 </tr>
</table>

<p class=MsoNormal>&nbsp;</p>

</div>

</body>

</html>

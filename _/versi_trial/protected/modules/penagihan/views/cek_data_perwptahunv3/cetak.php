<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 12">
<meta name=Originator content="Microsoft Word 12">
<link rel=File-List href="Cek_WP_per_Tahun_V2_KBAngs_files/filelist.xml">
<link rel=themeData href="Cek_WP_per_Tahun_V2_KBAngs_files/themedata.thmx">
<link rel=colorSchemeMapping>
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:1;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:0 0 0 0 0 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-1610611985 1073750139 0 0 159 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:0cm;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;
	mso-ansi-language:IN;
	mso-fareast-language:IN;}
span.SpellE
	{mso-style-name:"";
	mso-spl-e:yes;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;
	mso-ansi-language:IN;
	mso-fareast-language:IN;}
.MsoPapDefault
	{mso-style-type:export-only;
	margin-bottom:10.0pt;
	line-height:115%;}
 /* Page Definitions */
 @page
	{mso-page-border-surround-header:no;
	mso-page-border-surround-footer:no;}
@page Section1
	{size:612.0pt 792.0pt;
	margin:12.75pt 11.35pt 12.75pt 9.05pt;
	mso-header-margin:36.0pt;
	mso-footer-margin:36.0pt;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
	
@media print {
    footer {page-break-after: always;}
}
-->
</style>
</head>

<body lang=EN-US style='tab-interval:36.0pt;text-justify-trim:punctuation'>
<?php $no=1; $idbefore = array('jenis'=>''); foreach($data['hasil'] as $rowPage): ?>
<?php if($rowPage['TBLSETOR_JNS2']!=$idbefore['jenis']): ?>
 <?php $totalskpd=0; ?>
 <?php $totalsspd=0; ?>
<?php $idbefore['jenis'] = $rowPage['TBLSETOR_JNS2']; ?>
<div class=Section<?= $no++ ?>>


<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-yfti-tbllook:1184;mso-padding-alt:
 0cm 5.4pt 0cm 5.4pt;mso-border-insideh:none;mso-border-insidev:none'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <?php if($rowPage['TBLSETOR_JNSBAYAR']=='SPTPD'): ?>
  <td width=243 colspan=4 rowspan=2 valign=top style='width:182.55pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'>BADAN PENGELOLAAN
  KEUANGAN DAN ASET DAERAH<o:p></o:p></span></p>
  </td>
  <td width=81 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=162 colspan=2 valign=top style='width:121.7pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-family:"Courier New"'><?= $data['namarek'] ?>
    <o:p></o:p></span></p>
  </td>
  <td width=81 colspan=3 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=243 colspan=3 valign=top style='width:182.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'>TANGGAL : <?= date('d/m/Y') ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=81 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=81 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=81 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=81 colspan=3 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=81 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=81 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=81 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2'>
  <td width=81 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=77 valign=top style='width:57.95pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=85 colspan=2 valign=top style='width:63.75pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=81 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=81 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=81 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=81 colspan=3 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=81 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=81 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=81 valign=top style='width:60.85pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3'>
  <td width=158 colspan=2 valign=top style='width:118.8pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'>TAHUN<o:p></o:p></span></p>
  </td>
  <td width=19 valign=top style='width:14.2pt;padding:0cm 1.4pt 0cm 1.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'>:<o:p></o:p></span></p>
  </td>
  <td width=228 colspan=3 valign=top style='width:171.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'>20<?= $data['tahunpajak'] ?><o:p></o:p></span></p>
  </td>
  <td width=140 colspan=2 valign=top style='width:105.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'>NPWPD<o:p></o:p></span></p>
  </td>
  <td width=19 valign=top style='width:14.2pt;padding:0cm 1.4pt 0cm 1.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'>:<o:p></o:p></span></p>
  </td>
  <td width=247 colspan=4 valign=top style='width:184.9pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><?php echo $data['wp']['TBLDAFTAR_GOLONGAN']?>.<?php echo $data['wp']['TBLDAFTAR_NOPOK']?>.<?php echo $data['wp']['TBLKECAMATAN_IDBADANUSAHA']?>.<?php echo $data['wp']['TBLKELURAHAN_IDBADANUSAHA']?></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4'>
  <td width=158 colspan=2 valign=top style='width:118.8pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'>NAMA BADAN USAHA<o:p></o:p></span></p>
  </td>
  <td width=19 valign=top style='width:14.2pt;padding:0cm 1.4pt 0cm 1.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'>:<o:p></o:p></span></p>
  </td>
  <td width=228 colspan=3 valign=top style='width:171.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><?php echo $data['wp']['TBLDAFTAR_BADANUSAHANAMA']?></span></p>
  </td>
  <td width=140 colspan=2 valign=top style='width:105.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'>ALAMAT USAHA<o:p></o:p></span></p>
  </td>
  <td width=19 valign=top style='width:14.2pt;padding:0cm 1.4pt 0cm 1.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'>:<o:p></o:p></span></p>
  </td>
  <td width=247 colspan=4 valign=top style='width:184.9pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Courier New";mso-ansi-language:EN-US'><?php echo $data['wp']['TBLDAFTAR_PEMILIKALAMAT'] ?></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:5;mso-yfti-lastrow:yes'>
  <td width=158 colspan=2 valign=top style='width:118.8pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'>PEMILIK<o:p></o:p></span></p>
  </td>
  <td width=19 valign=top style='width:14.2pt;padding:0cm 1.4pt 0cm 1.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'>:<o:p></o:p></span></p>
  </td>
  <td width=228 colspan=3 valign=top style='width:171.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><?php echo $data['wp']['TBLDAFTAR_PEMILIKNAMA']?></span></p>
  </td>
  <td width=140 colspan=2 valign=top style='width:105.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'>ALAMAT PEMILIK<o:p></o:p></span></p>
  </td>
  <td width=19 valign=top style='width:14.2pt;padding:0cm 1.4pt 0cm 1.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'>:<o:p></o:p></span></p>
  </td>
  <td width=247 colspan=4 valign=top style='width:184.9pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Courier New"'><?php echo $data['wp']['TBLDAFTAR_BADANUSAHAALAMAT']?></span></p>
  </td>
<?php endif ?>
 </tr>
 <![if !supportMisalignedColumns]>
 <tr height=0>
  <td width=70 style='border:none'></td>
  <td width=65 style='border:none'></td>
  <td width=19 style='border:none'></td>
  <td width=61 style='border:none'></td>
  <td width=69 style='border:none'></td>
  <td width=88 style='border:none'></td>
  <td width=88 style='border:none'></td>
  <td width=42 style='border:none'></td>
  <td width=17 style='border:none'></td>
  <td width=3 style='border:none'></td>
  <td width=79 style='border:none'></td>
  <td width=74 style='border:none'></td>
  <td width=71 style='border:none'></td>
 </tr>
 <![endif]>
</table>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=792
 style='width:593.7pt;border-collapse:collapse;border:none;mso-yfti-tbllook:
 1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:none;mso-border-insidev:
 none'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:28.6pt'>
  <td width=45 valign=top style='width:33.75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>JENIS KETETAPAN<o:p></o:p></span></p>
  </td>

  <?php if ($rowPage['TBLSETOR_JNSBAYAR']=='SKPD-A'): ?>
  <td width=45 valign=top style='width:33.75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>KE<o:p></o:p></span></p>
  </td>
  <?php elseif ($rowPage['TBLSETOR_JNSBAYAR']=='SKPDKB' || $rowPage['TBLSETOR_JNSBAYAR']=='SKPDKB di angsur'): ?>
  <td width=45 valign=top style='width:33.75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>MASA<o:p></o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>PAJAK<o:p></o:p></span></p>
  </td>
  <?php else: ?>
  <td width=45 valign=top style='width:33.75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>BULAN<o:p></o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>PAJAK<o:p></o:p></span></p>
  </td>
  <?php endif ?>

  <td width=47 valign=top style='width:35.45pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>NO.<o:p></o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>SKP<o:p></o:p></span></p>
  </td>

  <?php if ($rowPage['TBLSETOR_JNSBAYAR']=='SPTPD' || $rowPage['TBLSETOR_JNSBAYAR']=='SKPD'): ?>
  <td width=95 valign=top style='width:70.9pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>TANGGAL<o:p></o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>LAPOR<o:p></o:p></span></p>
  </td>
  <?php elseif ($rowPage['TBLSETOR_JNSBAYAR']=='SKPD-A'): ?>
  <td width=95 valign=top style='width:70.9pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>TANGGAL<o:p></o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>SKPD-A<o:p></o:p></span></p>
  </td>
  <?php elseif ($rowPage['TBLSETOR_JNSBAYAR']=='SKPDKB' || $rowPage['TBLSETOR_JNSBAYAR']=='SKPDKB di angsur'): ?>
  <td width=95 valign=top style='width:70.9pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>TANGGAL<o:p></o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>SKPDKB<o:p></o:p></span></p>
  </td>
   <?php endif ?>

  <?php if ($rowPage['TBLSETOR_JNSBAYAR']=='SKPDKB' || $rowPage['TBLSETOR_JNSBAYAR']=='SKPDKB di angsur'): ?>
  <td width=138 colspan=3 valign=top style='width:103.3pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'>PAJAK<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'>PERIKSA<o:p></o:p></span></p>
  </td>
  <?php elseif ($rowPage['TBLSETOR_JNSBAYAR']=='SKPD-A'): ?> 
  <td width=138 colspan=3 valign=top style='width:103.3pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'>ANGSURAN<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'>POKOK<o:p></o:p></span></p>
  </td>
  <?php elseif ($rowPage['TBLSETOR_JNSBAYAR']=='SPTPD' || $rowPage['TBLSETOR_JNSBAYAR']=='SKPD'): ?> 
  <td width=138 colspan=3 valign=top style='width:103.3pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'>SPT<o:p></o:p></span></p>
  </td>
  <?php endif ?>

  <?php if ($rowPage['TBLSETOR_JNSBAYAR']=='SKPDKB' || $rowPage['TBLSETOR_JNSBAYAR']=='SKPDKB di angsur'): ?>

    <td width=138 colspan=1 valign=top style='width:103.3pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:28.6pt'>
    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
    text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
    mso-bidi-font-size:11.0pt;font-family:"Courier New"'>BUNGA<o:p></o:p></span></p>
    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
    normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
    font-family:"Courier New"'>PERIKSA<o:p></o:p></span></p>
    </td>
    <td width=138 colspan=1 valign=top style='width:103.3pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:28.6pt'>
    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
    text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
    mso-bidi-font-size:11.0pt;font-family:"Courier New"'>DENDA<o:p></o:p></span></p>
    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
    normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
    font-family:"Courier New"'>PERIKSA<o:p></o:p></span></p>
    </td>
    <td width=138 colspan=1 valign=top style='width:103.3pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:28.6pt'>
    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
    text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
    mso-bidi-font-size:11.0pt;font-family:"Courier New"'>TOTAL<o:p></o:p></span></p>
    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
    normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
    font-family:"Courier New"'>KURANG BAYAR<o:p></o:p></span></p>
    </td>
  <?php elseif ($rowPage['TBLSETOR_JNSBAYAR']=='SKPD-A'): ?>
    <td width=138 colspan=1 valign=top style='width:103.3pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:28.6pt'>
    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
    text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
    mso-bidi-font-size:11.0pt;font-family:"Courier New"'>BUNGA<o:p></o:p></span></p>
    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
    normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
    font-family:"Courier New"'>ANGSURAN<o:p></o:p></span></p>
    </td>
  <?php endif ?>

  <td width=80 valign=top style='width:59.7pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'>NO.SSPD<o:p></o:p></span></p>
  </td>
  <!-- <td width=85 valign=top style='width:63.8pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'>JENIS SETORAN<o:p></o:p></span></p>
  </td> -->
  <td width=85 valign=top style='width:63.75pt;padding:0cm 1.4pt 0cm 1.4pt;
  height:28.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'>TGL.SETOR<o:p></o:p></span></p>
  </td>

  <?php if ($rowPage['TBLSETOR_JNSBAYAR']=='SKPD-A'): ?>
  <td width=123 valign=top style='width:92.15pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'>SETORAN<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>POKOK<o:p></o:p></span></p>
  </td>
  <?php else: ?>
  <td width=123 valign=top style='width:92.15pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'>SSPD<o:p></o:p></span></p>
  </td>
  <?php endif ?>

  <?php if ($rowPage['TBLSETOR_JNSBAYAR']=='SKPD-A'): ?>
  <td width=95 colspan=3 valign=top style='width:70.9pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'>SETORAN<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>BUNGA<o:p></o:p></span></p>
  </td>
  <?php else: ?>
  <td width=95 colspan=3 valign=top style='width:70.9pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'>KET<o:p></o:p></span></p>
  </td>
   <?php endif ?>
 </tr>
 <tr style='mso-yfti-irow:1;height:14.2pt'>
  <?php if ($rowPage['TBLSETOR_JNSBAYAR']=='SKPDKB' || $rowPage['TBLSETOR_JNSBAYAR']=='SKPDKB di angsur'): ?>
    <td width=792 colspan=14 valign=top style='width:593.7pt;padding:0cm 5.4pt 0cm 5.4pt;height:14.2pt'>
  <?php else: ?>
    <td width=792 colspan=13 valign=top style='width:593.7pt;padding:0cm 5.4pt 0cm 5.4pt;height:14.2pt'>
  <?php endif ?>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>-----------------------------------------------------------------------------------------------<o:p></o:p></span></p>
  </td>
 </tr>
 <!-- <?php //print_r($data['hasil']);die(); ?> -->
 <?php foreach($data['hasil'] as $row): ?>
 <?php if($idbefore['jenis']==$row['TBLSETOR_JNS2']): ?>
 <tr style='mso-yfti-irow:2;height:11.35pt'>
  <td width=45 valign=top style='width:33.75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:11.35pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'><?= $row['TIPE'] ?><o:p></o:p></span></p>
  </td>

  <?php if($row['TBLSETOR_JNSBAYAR']=='SKPDKB' || $row['TBLSETOR_JNSBAYAR']=='SKPDKB di angsur'): ?>
  <td width=45 valign=top style='width:33.75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:11.35pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'><?= LokalIndonesia::getBulan($row['BLP']) ?> S/D <?= LokalIndonesia::getBulan($row['BLP2']) ?> 20<?= $row['TBLPENDATAAN_THNPAJAK'] ?><o:p></o:p></span></p>
  </td>
  <?php else: ?>
  <td width=45 valign=top style='width:33.75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:11.35pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'><?= $row['BLP'] ?><o:p></o:p></span></p>
  </td> 
  <?php endif ?>

  <td width=47 valign=top style='width:35.45pt;padding:0cm 1.4pt 0cm 1.4pt;
  height:11.35pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'><?= $row['NOSKP'] ?></span></p>
  </td>
  <td width=95 valign=top style='width:70.9pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:11.35pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>

  <?php if($row['TBLSETOR_JNSBAYAR']=='SKPDKB' || $row['TBLSETOR_JNSBAYAR']=='SKPDKB di angsur'): ?>
  <?php echo $row[$data['namatbl'].'_TGLKURANGBAYAR'] . '/' . $row[$data['namatbl'].'_BLNKURANGBAYAR'] . '/20' . $row[$data['namatbl'].'_THNKURANGBAYAR'] ?>
  <?php elseif($row['TBLSETOR_JNSBAYAR']=='SPTPD'): ?>
  <?php echo !empty($row[$data['namatbl'].'_TGLSPTPD']) ? $row[$data['namatbl'].'_TGLSPTPD'] . '/' . $row[$data['namatbl'].'_BLNSPTPD'] . '/20' . $row[$data['namatbl'].'_THNSPTPD'] : '' ?>
  <?php else: ?>
  <?php echo !empty($row[$data['namatbl'].'_TGLSKPD']) ? $row[$data['namatbl'].'_TGLSKPD'] . '/' . $row[$data['namatbl'].'_BLNSKPD'] . '/20' . $row[$data['namatbl'].'_THNSKPD'] : '' ?> 
  <?php endif ?>

  </span></p>
  </td>
  <?php if ($row['TBLSETOR_JNSBAYAR']=='SKPDKB' || $row['TBLSETOR_JNSBAYAR']=='SKPDKB di angsur'): ?>
  <td width=138 colspan=3 valign=top style='width:103.3pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:11.35pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'><?php $totalskpd+=$row['PAJAK']+$row['BUNGA']+$row['KENAIKAN']; ?><?= LokalIndonesia::ribuan($row['PAJAK']) ?></span></p>
  </td>
  <?php elseif ($row['TBLSETOR_JNSBAYAR']=='SKPD-A'): ?> 
  <td width=138 colspan=3 valign=top style='width:103.3pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:11.35pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'><?php $totalskpd+=$row['PAJAK']; ?><?= LokalIndonesia::ribuan($row['PAJAK']) ?></span></p>
  </td>
  <?php else: ?> 
  <td width=138 colspan=3 valign=top style='width:103.3pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:11.35pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'><?php $totalskpd+=$row['PAJAK']+$row['BUNGA']; ?><?= LokalIndonesia::ribuan($row['PAJAK']) ?></span></p>
  </td>
  <?php endif ?>
  <?php if ($row['TBLSETOR_JNSBAYAR']=='SKPDKB' || $row['TBLSETOR_JNSBAYAR']=='SKPDKB di angsur'): ?>

    
    <td width=80 valign=top style='width:59.7pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:11.35pt'>
    <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
    text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
    mso-bidi-font-size:11.0pt;font-family:"Courier New"'><?php echo LokalIndonesia::ribuan($row['BUNGA']); ?></span></p>
    </td>
    
    <td width=80 valign=top style='width:59.7pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:11.35pt'>
    <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
    text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
    mso-bidi-font-size:11.0pt;font-family:"Courier New"'><?php echo LokalIndonesia::ribuan($row['KENAIKAN']); ?></span></p>
    </td>

    <td width=80 valign=top style='width:59.7pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:11.35pt'>
    <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
    text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
    mso-bidi-font-size:11.0pt;font-family:"Courier New"'><?php echo LokalIndonesia::ribuan($row['RPKB']); ?></span></p>
    </td>

  <?php elseif ($row['TBLSETOR_JNSBAYAR']=='SKPD-A'): ?>

    <td width=80 valign=top style='width:59.7pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:11.35pt'>
    <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
    text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
    mso-bidi-font-size:11.0pt;font-family:"Courier New"'><?php echo LokalIndonesia::ribuan($row['BUNGA']); ?></span></p>
    </td>
  <?php endif ?>

  <td width=80 valign=top style='width:59.7pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:11.35pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'><?= ($row['NOMORSSPD']) ?></span></p>
  </td>
  
  <td width=85 valign=top style='width:63.75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:11.35pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'><?= !empty($row['TBLSETOR_TGLSETOR']) ? sprintf('%02d', $row['TBLSETOR_TGLSETOR']) . '/' . sprintf('%02d', $row['TBLSETOR_BLNSETOR']) . '/20' . $row['TBLSETOR_THNSETOR'] : '' ?></span></p>
  </td>
  <td width=123 valign=top style='width:92.15pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:11.35pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'><?php $totalsspd+=$row['TBLSETOR_RUPIAHSETOR']; ?><?= LokalIndonesia::ribuan($row['TBLSETOR_RUPIAHSETOR']) ?></span></p>
  </td>

  <td width=95 colspan=3 valign=top style='width:70.9pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'>
  <?php if($row['TBLSETOR_JNSBAYAR']=='SKPDKB di angsur'): ?>
  Diangsur <?= $row['JML_ANGSUR'] ?> kali
  <?php elseif ($row['TBLSETOR_JNSBAYAR']=='SKPD-A'): ?>
  <?= LokalIndonesia::ribuan($row['SETORANBUNGA']) ?>
  <?php endif ?>
  </span></p>
  </td>
 </tr>
  <?php endif; ?>
 <?php endforeach; ?>
 <tr style='mso-yfti-irow:3;height:14.2pt'>
  <?php if ($row['TBLSETOR_JNSBAYAR']=='SKPDKB' || $row['TBLSETOR_JNSBAYAR']=='SKPDKB di angsur'): ?>
    <td width=792 colspan=14 valign=top style='width:593.7pt;padding:0cm 5.4pt 0cm 5.4pt;height:14.2pt'>
  <?php else: ?>
    <td width=792 colspan=13 valign=top style='width:593.7pt;padding:0cm 5.4pt 0cm 5.4pt;height:14.2pt'>
  <?php endif ?>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>-------------------------------------------------------------------------------------------------<o:p></o:p></span></p>
  </td>
 </tr>
<?php if ($rowPage['TBLSETOR_JNSBAYAR']<>'SKPDKB di angsur'): ?>

  <?php if ($rowPage['TBLSETOR_JNSBAYAR']=='SKPD-A'): ?>
      <tr style='mso-yfti-irow:4;height:14.2pt'>
      <td width=130 colspan=4 valign=top style='width:3.0cm;padding:0cm 5.4pt 0cm 5.4pt;
      height:14.2pt'>
      <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
      normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
      font-family:"Courier New"'>DARI POKOK KURANG BAYAR<o:p></o:p></span></p>
      </td>
      <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:14.2pt'>
      <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
      text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
      mso-bidi-font-size:11.0pt;font-family:"Courier New"'>:<o:p></o:p></span></p>
      </td>
      <td width=170 colspan=3 valign=top style='width:127.6pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:14.2pt'>
      <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
      text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
      mso-bidi-font-size:11.0pt;font-family:"Courier New"'><?= LokalIndonesia::ribuan($rowPage['RPKB']) ?><o:p></o:p></span></p>
      </td>
      <td width=241 colspan=3 valign=top style='width:180.75pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:14.2pt'>
      <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
      normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
      font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
      </td>
      <td width=16 valign=top style='width:11.8pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:14.2pt'>
      <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
      normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
      font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
      </td>
      <td width=46 valign=top style='width:34.25pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:14.2pt'>
      <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
      normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
      font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
      </td>
     </tr>
  <?php endif ?>

 <tr style='mso-yfti-irow:4;height:14.2pt'>
  <?php if ($rowPage['TBLSETOR_JNSBAYAR']=='SKPD-A'): ?>
  <td width=130 colspan=4 valign=top style='width:3.0cm;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>POKOK SKPD-ANGSURAN<o:p></o:p></span></p>
  </td>
  <?php else: ?>
  <td width=130 colspan=4 valign=top style='width:3.0cm;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>JML SKPD<o:p></o:p></span></p>
  </td>
  <?php endif ?>

  <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'>:<o:p></o:p></span></p>
  </td>
  <td width=170 colspan=3 valign=top style='width:127.6pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'><?= LokalIndonesia::ribuan($totalskpd) ?><o:p></o:p></span></p>
  </td>
  <td width=241 colspan=3 valign=top style='width:180.75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=16 valign=top style='width:11.8pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=46 valign=top style='width:34.25pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:5;height:14.2pt'>
  <td width=130 colspan=4 valign=top style='width:3.0cm;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal align=right  style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>JML SUDAH BAYAR<o:p></o:p></span></p>
  </td>
  <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'>:<o:p></o:p></span></p>
  </td>
  
  <td width=170 colspan=3 valign=top style='width:127.6pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'><?= LokalIndonesia::ribuan($totalsspd) ?><o:p></o:p></span></p>
  </td>
  

  <td width=241 colspan=3 valign=top style='width:180.75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=16 valign=top style='width:11.8pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=46 valign=top style='width:34.25pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:6;mso-yfti-lastrow:yes;height:14.2pt'>
  <td width=130 colspan=4 valign=top style='width:3.0cm;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'>TUNGGAKAN<o:p></o:p></span></p>
  </td>
  <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'>:<o:p></o:p></span></p>
  </td>
  <?php if ($rowPage['TBLSETOR_JNSBAYAR']=='SKPD-A'): ?>
  <td width=170 colspan=3 valign=top style='width:127.6pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'><?= LokalIndonesia::ribuan($rowPage['RPKB']-$totalsspd) ?><o:p></o:p></span></p>
  </td>
  <?php else: ?>
  <td width=170 colspan=3 valign=top style='width:127.6pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Courier New"'><?= LokalIndonesia::ribuan($totalskpd-$totalsspd) ?><o:p></o:p></span></p>
  </td>
  <?php endif ?>

  <td width=241 colspan=3 valign=top style='width:180.75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=16 valign=top style='width:11.8pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=46 valign=top style='width:34.25pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.2pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:10.0pt;mso-bidi-font-size:11.0pt;
  font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <?php endif ?>
 <![if !supportMisalignedColumns]>
 <tr height=0>
  <td width=230 style='border:none'></td>
  <td width=108 style='border:none'></td>
  <td width=126 style='border:none'></td>
  <td width=120 style='border:none'></td>
  <td width=27 style='border:none'></td>
  <td width=3 style='border:none'></td>
  <td width=118 style='border:none'></td>
  <td width=166 style='border:none'></td>
  <td width=126 style='border:none'></td>
  <td width=150 style='border:none'></td>
  <td width=40 style='border:none'></td>
  <td width=34 style='border:none'></td>
  <td width=69 style='border:none'></td>
 </tr>
 <![endif]>
</table>

<p class=MsoNormal><span lang=IN style='font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>

</div>
<footer></footer>
<?php endif; ?>
<?php endforeach; ?>

</body>

</html>

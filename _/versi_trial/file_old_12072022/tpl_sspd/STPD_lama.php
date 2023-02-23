<?php 
$ts = $data['stpd'];

$no = 1;
// $JENIS_BAYAR = $ts['JENIS_BAYAR'];
$nomor_kohir = strtoupper( $ts['tbltransaksiketetapan_nokohirketetapan'] );
$masa_awal = LokalIndonesia::TGLID($ts['tbltransaksiketetapan_masaawal'],'/');
$masa_akhir = LokalIndonesia::TGLID($ts['tbltransaksiketetapan_masaakhir'],'/');
$tahunpajak = $ts['tbltransaksiketetapan_tahunpajak'];
$wp_nama = strtoupper( $ts['tblobyek_nama'] );
$wp_alamat = strtoupper( $ts['tblobyek_alamat'] );
$wp_npwpd = strtoupper( $ts['tblobyek_npwpd'] );
// echo "string"; Yii::app()->end();
/*$kelurahan_nama = strtoupper( $ts['refkelurahan_nama'] );
$kecamatan_nama = strtoupper( $ts['refkecamatan_nama'] );*/
$rekening_kode = strtoupper( $ts['tbltagihan_rekeningkode'] );
$rekening_nama = strtoupper( $ts['tbltagihan_uraianrekening'] );
$tbltransaksiketetapan_pajak =  $ts['tbltransaksiketetapan_pajak'];
$tbltransaksiketetapan_rupiahbunga =  $ts['tbltransaksiketetapan_rupiahbunga'];
$tbltransaksiketetapan_pajakketetapan =  $ts['tbltransaksiketetapan_pajakketetapan'];
/*if ($JENIS_BAYAR=='SPTPD') {
	$tbltransaksiketetapan_pajakketetapan =  $tbltransaksiketetapan_pajak;
}*/
$tbltransaksiketetapan_tglketetapan = strtotime($ts['tbltransaksiketetapan_tglketetapan']) ? LokalIndonesia::TanggalUmum($ts['tbltransaksiketetapan_tglketetapan']) : '';
$batassetor = strtotime($ts['tbltransaksiketetapan_tgljatuhtempo']) ? LokalIndonesia::TanggalUmum($ts['tbltransaksiketetapan_tgljatuhtempo']) : '';
$tbltransaksiketetapan_pajakketetapan_terbilang = LokalIndonesia::terbilangangka(( $tbltransaksiketetapan_pajakketetapan )).' rupiah';
$tbltagihan_bungatagihterakhir =  $ts['tbltagihan_bungatagihterakhir'];
$tbltagihan_totaltagihterakhir =  $ts['tbltagihan_totaltagihterakhir'];
 ?>
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=gb2312">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 12">
<meta name=Originator content="Microsoft Word 12">
<link rel=File-List href="stpd_ccccccc_files/filelist.xml">
<title>Cetak STPD</title>
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>Suryo Prasetyo</o:Author>
  <o:LastAuthor>Suryo Prasetyo</o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>2</o:TotalTime>
  <o:LastPrinted>2016-06-14T02:43:00Z</o:LastPrinted>
  <o:Created>2016-06-14T03:04:00Z</o:Created>
  <o:LastSaved>2016-06-14T03:04:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>193</o:Words>
  <o:Characters>1102</o:Characters>
  <o:Company>Diginet Media</o:Company>
  <o:Lines>9</o:Lines>
  <o:Paragraphs>2</o:Paragraphs>
  <o:CharactersWithSpaces>1293</o:CharactersWithSpaces>
  <o:Version>12.00</o:Version>
 </o:DocumentProperties>
</xml><![endif]-->
<link rel=themeData href="stpd_ccccccc_files/themedata.thmx">
<link rel=colorSchemeMapping href="stpd_ccccccc_files/colorschememapping.xml">
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:SpellingState>Clean</w:SpellingState>
  <w:GrammarState>Clean</w:GrammarState>
  <w:TrackMoves>false</w:TrackMoves>
  <w:TrackFormatting/>
  <w:DrawingGridHorizontalSpacing>6 pt</w:DrawingGridHorizontalSpacing>
  <w:DisplayHorizontalDrawingGridEvery>0</w:DisplayHorizontalDrawingGridEvery>
  <w:DisplayVerticalDrawingGridEvery>2</w:DisplayVerticalDrawingGridEvery>
  <w:ValidateAgainstSchemas/>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:DoNotPromoteQF/>
  <w:LidThemeOther>EN-US</w:LidThemeOther>
  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
  <w:Compatibility>
   <w:BreakWrappedTables/>
   <w:SnapToGridInCell/>
   <w:WrapTextWithPunct/>
   <w:UseAsianBreakRules/>
   <w:DontGrowAutofit/>
   <w:SplitPgBreakAndParaMark/>
   <w:DontVertAlignCellWithSp/>
   <w:DontBreakConstrainedForcedTables/>
   <w:DontVertAlignInTxbx/>
   <w:Word11KerningPairs/>
   <w:CachedColBalance/>
   <w:UseFELayout/>
  </w:Compatibility>
  <m:mathPr>
   <m:mathFont m:val="Cambria Math"/>
   <m:brkBin m:val="before"/>
   <m:brkBinSub m:val="--"/>
   <m:smallFrac m:val="off"/>
   <m:dispDef/>
   <m:lMargin m:val="0"/>
   <m:rMargin m:val="0"/>
   <m:defJc m:val="centerGroup"/>
   <m:wrapIndent m:val="1440"/>
   <m:intLim m:val="subSup"/>
   <m:naryLim m:val="undOvr"/>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"
  DefSemiHidden="false" DefQFormat="false" DefPriority="99"
  LatentStyleCount="267">
  <w:LsdException Locked="false" Priority="0" UnhideWhenUsed="false"
   QFormat="true" Name="Normal"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" QFormat="true"
   Name="heading 1"/>
  <w:LsdException Locked="false" SemiHidden="true" QFormat="true"
   Name="heading 2"/>
  <w:LsdException Locked="false" SemiHidden="true" QFormat="true"
   Name="heading 3"/>
  <w:LsdException Locked="false" SemiHidden="true" QFormat="true"
   Name="heading 4"/>
  <w:LsdException Locked="false" SemiHidden="true" QFormat="true"
   Name="heading 5"/>
  <w:LsdException Locked="false" SemiHidden="true" QFormat="true"
   Name="heading 6"/>
  <w:LsdException Locked="false" SemiHidden="true" QFormat="true"
   Name="heading 7"/>
  <w:LsdException Locked="false" SemiHidden="true" QFormat="true"
   Name="heading 8"/>
  <w:LsdException Locked="false" SemiHidden="true" QFormat="true"
   Name="heading 9"/>
  <w:LsdException Locked="false" SemiHidden="true" QFormat="true" Name="caption"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" QFormat="true"
   Name="Title"/>
  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" QFormat="true"
   Name="Subtitle"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" QFormat="true"
   Name="Strong"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" QFormat="true"
   Name="Emphasis"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="HTML Top of Form"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="HTML Bottom of Form"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="Outline List 1"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="Outline List 2"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="Outline List 3"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="Placeholder Text"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" QFormat="true"
   Name="No Spacing"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="Revision"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" QFormat="true"
   Name="List Paragraph"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" QFormat="true"
   Name="Quote"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" QFormat="true"
   Name="Intense Quote"/>
  <w:LsdException Locked="false" Priority="19" UnhideWhenUsed="false"
   QFormat="true" Name="Subtle Emphasis"/>
  <w:LsdException Locked="false" Priority="21" UnhideWhenUsed="false"
   QFormat="true" Name="Intense Emphasis"/>
  <w:LsdException Locked="false" Priority="31" UnhideWhenUsed="false"
   QFormat="true" Name="Subtle Reference"/>
  <w:LsdException Locked="false" Priority="32" UnhideWhenUsed="false"
   QFormat="true" Name="Intense Reference"/>
  <w:LsdException Locked="false" Priority="33" UnhideWhenUsed="false"
   QFormat="true" Name="Book Title"/>
  <w:LsdException Locked="false" Priority="37" SemiHidden="true"
   Name="Bibliography"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true" QFormat="true"
   Name="TOC Heading"/>
 </w:LatentStyles>
</xml><![endif]-->
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Wingdings;
	panose-1:0 0 0 0 0 0 0 0 0 0;
	mso-font-charset:2;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:0 268435456 0 0 -2147483648 0;}
@font-face
	{font-family:SimSun;
	panose-1:2 11 6 6 3 8 4 2 2 4;
	mso-font-alt:SimSun;
	mso-font-charset:128;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520092945 1809841403 8388662 0 4063647 0;}
@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-1610611985 1107304683 0 0 159 0;}
@font-face
	{font-family:"\@SimSun";
	mso-font-charset:128;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520092945 1809841403 8388662 0 4063647 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	text-align:justify;
	text-justify:inter-ideograph;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:SimSun;
	mso-fareast-language:ZH-CN;}
p
	{mso-style-priority:99;
	mso-margin-top-alt:auto;
	margin-right:0cm;
	mso-margin-bottom-alt:auto;
	margin-left:0cm;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"SimSun","sans-serif";
	mso-bidi-font-family:SimSun;
	mso-fareast-language:ZH-CN;}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:36.0pt;
	margin-bottom:.0001pt;
	mso-add-space:auto;
	text-align:justify;
	text-justify:inter-ideograph;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:SimSun;
	mso-fareast-language:ZH-CN;}
p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:36.0pt;
	margin-bottom:.0001pt;
	mso-add-space:auto;
	text-align:justify;
	text-justify:inter-ideograph;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:SimSun;
	mso-fareast-language:ZH-CN;}
p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:36.0pt;
	margin-bottom:.0001pt;
	mso-add-space:auto;
	text-align:justify;
	text-justify:inter-ideograph;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:SimSun;
	mso-fareast-language:ZH-CN;}
p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:36.0pt;
	margin-bottom:.0001pt;
	mso-add-space:auto;
	text-align:justify;
	text-justify:inter-ideograph;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:SimSun;
	mso-fareast-language:ZH-CN;}
span.10
	{mso-style-name:10;
	mso-style-unhide:no;
	font-family:"Times New Roman","serif";
	mso-ascii-font-family:"Times New Roman";
	mso-hansi-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";}
span.msonormal0
	{mso-style-name:msonormal;
	mso-style-unhide:no;}
span.SpellE
	{mso-style-name:"";
	mso-spl-e:yes;}
span.GramE
	{mso-style-name:"";
	mso-gram-e:yes;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	font-size:10.0pt;
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;}
 /* Page Definitions */
 @page
	{mso-page-border-surround-header:no;
	mso-page-border-surround-footer:no;}
@page Section1
	{size:612.0pt 792.0pt;
	margin:1.0cm 2.0cm 1.0cm 2.0cm;
	mso-header-margin:36.0pt;
	mso-footer-margin:36.0pt;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
 /* List Definitions */
 @list l0
	{mso-list-id:45569587;
	mso-list-type:hybrid;
	mso-list-template-ids:1825872884 -1777936370 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l0:level1
	{mso-level-start-at:0;
	mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:46.8pt;
	text-indent:-18.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:SimSun;}
@list l1
	{mso-list-id:373190323;
	mso-list-type:hybrid;
	mso-list-template-ids:994608832 -1777936370 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l1:level1
	{mso-level-start-at:0;
	mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:46.8pt;
	text-indent:-18.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:SimSun;}
@list l2
	{mso-list-id:831991042;
	mso-list-type:hybrid;
	mso-list-template-ids:-1272155800 67698689 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l2:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:64.8pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l3
	{mso-list-id:1210188334;
	mso-list-type:hybrid;
	mso-list-template-ids:-1192587106 552603244 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l3:level1
	{mso-level-number-format:roman-upper;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:54.0pt;
	text-indent:-36.0pt;}
ol
	{margin-bottom:0cm;}
ul
	{margin-bottom:0cm;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Table Normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-qformat:yes;
	mso-style-parent:"";
	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
	mso-para-margin:0cm;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";}
table.MsoTableGrid
	{mso-style-name:"Table Grid";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-priority:99;
	mso-padding-alt:0cm 0cm 0cm 0cm;
	mso-para-margin:0cm;
	mso-para-margin-bottom:.0001pt;
	text-align:justify;
	text-justify:inter-ideograph;
	mso-pagination:none;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="3074"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=EN-US style='tab-interval:36.0pt'>

<div class=Section1>

<p class=MsoNormal align=center style='text-align:center'><o:p>&nbsp;</o:p></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;mso-yfti-tbllook:1184'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=319 valign=top style='width:239.25pt;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal align=center style='text-align:center;mso-pagination:none'><o:p>&nbsp;</o:p></p>
  <p class=MsoNormal align=left style='text-align:left;mso-pagination:none'>PEMERINTAH
  <?= strtoupper(AppConfig::model()->getValue('APLIKASI_WILAYAH')); ?><br>
   <?= strtoupper(AppConfig::model()->getValue('APLIKASI_ALAMAT_INSTANSI')); ?></p>
  </td>
  <td width=307 colspan=2 valign=top style='width:230.25pt;
  border-left:none;mso-border-top-alt:inset windowtext .75pt;mso-border-bottom-alt:
  inset windowtext .75pt;mso-border-right-alt:inset windowtext .75pt;
  padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal align=center style='text-align:center;mso-pagination:none'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:22.0pt;mso-bidi-font-size:
  20.0pt'>STPD<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center;mso-pagination:none'><b
  style='mso-bidi-font-weight:normal'>(<span class=SpellE>Surat</span> <span
  class=SpellE>Tagihan</span> <span class=SpellE>Pajak</span> Daerah)<o:p></o:p></b></p>
  <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
   style='border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
    <td width=201 valign=top style='width:150.8pt;padding:0cm 0cm 0cm 0cm'>
    <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=293
     style='width:219.7pt;margin-left:7.3pt;border-collapse:collapse;
     mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm'>
     <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
      <td width=104 valign="middle" style='width:77.95pt;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;mso-pagination:none'><span
      class=SpellE><b style='mso-bidi-font-weight:normal'>Masa</b></span><b
      style='mso-bidi-font-weight:normal'> <span class=SpellE>Pajak</span><o:p></o:p></b></p>
      </td>
      <td valign="middle" width=189 style='width:5.0cm;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;mso-pagination:none'><b
      style='mso-bidi-font-weight:normal'>: <?= $masa_awal ?> s/d <?= $masa_akhir ?><o:p></o:p></b></p>
      </td>
     </tr>
     <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
      <td valign="middle" width=104 style='width:77.95pt;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;mso-pagination:none'><span
      class=SpellE><b style='mso-bidi-font-weight:normal'>Tahun</b></span><b
      style='mso-bidi-font-weight:normal'><span style='mso-spacerun:yes'>&nbsp;</span></b></p>
      </td>
      <td width=189 style='width:5.0cm;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;mso-pagination:none'><b
      style='mso-bidi-font-weight:normal'>: <?= $tahunpajak ?></b></p>
      </td>
     </tr>
    </table>
    <p class=MsoNormal style='mso-pagination:none'><o:p></o:p></p>
    </td>
    <td width=104 valign=top style='width:77.95pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoNormal style='mso-pagination:none'><o:p>&nbsp;</o:p></p>
    </td>
   </tr>
  </table>
  </td>
  <td width=167 valign=top style='width:125.45pt;border-left:
  none;mso-border-top-alt:inset windowtext .75pt;mso-border-bottom-alt:inset windowtext .75pt;
  mso-border-right-alt:inset windowtext .75pt;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal align=center style='text-align:center;mso-pagination:none'><o:p>&nbsp;</o:p></p>
  <p class=MsoNormal align=center style='text-align:center;mso-pagination:none'>No.
  <span class=SpellE>Urut</span></p>
  <table width="100%" class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
   style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
   mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm;mso-border-insideh:
   .5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
    <td width=28 valign=top style='width:20.85pt;border:solid windowtext 1.0pt;
    mso-border-alt:solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoNormal align=center style='text-align:center;mso-pagination:
    none'><o:p>&nbsp;</o:p></p>
    </td>
    <td width=28 valign=top style='width:20.85pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoNormal align=center style='text-align:center;mso-pagination:
    none'><o:p>&nbsp;</o:p></p>
    </td>
    <td width=28 valign=top style='width:20.85pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoNormal align=center style='text-align:center;mso-pagination:
    none'><o:p>&nbsp;</o:p></p>
    </td>
    <td width=28 valign=top style='width:20.85pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoNormal align=center style='text-align:center;mso-pagination:
    none'><o:p>&nbsp;</o:p></p>
    </td>
    <td width=28 valign=top style='width:20.85pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoNormal align=center style='text-align:center;mso-pagination:
    none'><o:p>&nbsp;</o:p></p>
    </td>
   </tr>
  </table>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=793 colspan=4 valign=top style='width:594.95pt;
  border-top:none;mso-border-left-alt:inset windowtext .75pt;mso-border-bottom-alt:
  inset windowtext .75pt;mso-border-right-alt:inset windowtext .75pt;
  padding:.75pt .75pt .75pt .75pt'>
  <div style='margin-left:5.75pt'>
  <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
   style='border-collapse:collapse;mso-yfti-tbllook:1184'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
    <td width=179 valign=top style='width:134.45pt;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal align=left style='text-align:left;line-height:150%;
    mso-pagination:none'><span class=SpellE>Nama</span></p>
    </td>
    <td width=9 valign=top style='width:7.1pt;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal align=left style='text-align:left;line-height:150%;
    mso-pagination:none'>:</p>
    </td>
    <td width=549 valign=top style='width:411.95pt;padding:.75pt .75pt .75pt .75pt'><?= $wp_nama ?></td>
   </tr>
   <tr style='mso-yfti-irow:1'>
    <td width=179 valign=top style='width:134.45pt;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal align=left style='text-align:left;line-height:150%;
    mso-pagination:none'><span class=SpellE>Alamat</span></p>
    </td>
    <td width=9 valign=top style='width:7.1pt;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal align=left style='text-align:left;line-height:150%;
    mso-pagination:none'>:</p>
    </td>
    <td width=549 valign=top style='width:411.95pt;padding:.75pt .75pt .75pt .75pt'><?= $wp_alamat ?></td>
   </tr>
   <tr style='mso-yfti-irow:2'>
    <td width=179 valign=top style='width:134.45pt;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal align=left style='text-align:left;line-height:150%;
    mso-pagination:none'>NPWD</p>
    </td>
    <td width=9 valign=top style='width:7.1pt;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal align=left style='text-align:left;line-height:150%;
    mso-pagination:none'>:</p>
    </td>
    <td width=549 valign=top style='width:411.95pt;padding:.75pt .75pt .75pt .75pt'>
    <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
     style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
     mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm;mso-border-insideh:
     .5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
     <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
      <td width=30 valign=top style='width:22.8pt;border:none;border-right:
      solid windowtext 1.0pt;mso-border-right-alt:solid windowtext .5pt;
      padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'><o:p>&nbsp;</o:p></p>      </td>
      <td width=30 valign=top style='width:22.8pt;border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'><o:p>&nbsp;</o:p>
      <?= $wp_npwpd[0]; ?></p>      </td>
      <td width=30 valign=top style='width:22.8pt;border:none;border-right:
      solid windowtext 1.0pt;mso-border-left-alt:solid windowtext .5pt;
      mso-border-left-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
      padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'><o:p>&nbsp;</o:p></p>      </td>
      <td width=30 valign=top style='width:22.8pt;border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'>
        <o:p><?= $wp_npwpd[2]; ?></o:p>
      </p>      </td>
      <td width=30 valign=top style='width:22.8pt;border:none;border-right:
      solid windowtext 1.0pt;mso-border-left-alt:solid windowtext .5pt;
      mso-border-left-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
      padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'><o:p>&nbsp;</o:p></p>      </td>
      <td width=30 valign=top style='width:22.8pt;border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'>
        <o:p><?= $wp_npwpd[4]; ?></o:p>
      </p>      </td>
      <td width=30 valign=top style='width:22.8pt;border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'>
        <o:p><?= $wp_npwpd[5]; ?></o:p>
      </p>      </td>
      <td width=30 valign=top style='width:22.8pt;border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'>
        <o:p><?= $wp_npwpd[6]; ?></o:p>
      </p>      </td>
      <td width=30 valign=top style='width:22.8pt;border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'>
        <o:p><?= $wp_npwpd[7]; ?></o:p>
      </p>      </td>
      <td width=30 valign=top style='width:22.8pt;border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'>
        <o:p><?= $wp_npwpd[8]; ?></o:p>
      </p>      </td>
      <td width=30 valign=top style='width:22.8pt;border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'>
        <o:p><?= $wp_npwpd[9]; ?></o:p>
      </p>      </td>
      <td width=30 valign=top style='width:22.8pt;border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'>
        <o:p><?= $wp_npwpd[10]; ?></o:p>
      </p>      </td>
      <td width=30 valign=top style='width:22.8pt;border:none;border-right:
      solid windowtext 1.0pt;mso-border-left-alt:solid windowtext .5pt;
      mso-border-left-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
      padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'><o:p>&nbsp;</o:p></p>      </td>
      <td width=30 valign=top style='width:22.8pt;border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'>
        <o:p><?= $wp_npwpd[11]; ?></o:p>
      </p>      </td>
      <td width=30 valign=top style='width:22.8pt;border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'>
        <o:p><?= $wp_npwpd[12]; ?></o:p>
      </p>      </td>
      <td width=30 valign=top style='width:22.8pt;border:none;border-right:
      solid windowtext 1.0pt;mso-border-left-alt:solid windowtext .5pt;
      mso-border-left-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
      padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'><o:p>&nbsp;</o:p></p>      </td>
      <td width=30 valign=top style='width:22.8pt;border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'>
        <o:p><?= $wp_npwpd[14]; ?></o:p>
      </p>      </td>
      <td width=30 valign=top style='width:22.85pt;border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=left style='text-align:left;line-height:150%;
      mso-pagination:none'>
        <o:p><span class="MsoNormal" style="text-align:left;line-height:150%;
      mso-pagination:none">
          <?= $wp_npwpd[14]; ?>
        </span></o:p>
      </p>      </td>
     </tr>
    </table>
    </td>
   </tr>
   <tr style='mso-yfti-irow:3;mso-yfti-lastrow:yes'>
    <td width=179 valign=top style='width:134.45pt;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal align=left style='text-align:left;line-height:150%;
    mso-pagination:none'><span class=SpellE>Tanggal</span> <span class=SpellE>Jatuh</span>
    Tempo</p>
    </td>
    <td width=9 valign=top style='width:7.1pt;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal align=left style='text-align:left;line-height:150%;
    mso-pagination:none'>:</p>
    </td>
    <td width=549 valign=top style='width:411.95pt;padding:.75pt .75pt .75pt .75pt'></td>
   </tr>
  </table>
  </div>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2'>
  <td width=793 colspan=4 valign=top style='width:594.95pt;
  border-top:none;mso-border-left-alt:inset windowtext .75pt;mso-border-bottom-alt:
  inset windowtext .75pt;mso-border-right-alt:inset windowtext .75pt;
  padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoListParagraphCxSpFirst align=left style='margin-left:27.2pt;
  mso-add-space:auto;text-align:left;text-indent:-21.25pt;mso-pagination:none;
  mso-list:l3 level1 lfo1'><![if !supportLists]><span style='mso-fareast-font-family:
  "Times New Roman"'><span style='mso-list:Ignore'>I.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span></span><![endif]>Berdasarkan pasal 7 Undang - Undang Nomor 18 Tahun 1997 telah dilakukan penelitian dan/atau pemeriksaan<br>
  <span class=SpellE>atau</span> <span class=SpellE>keterangan</span> lain <span
  class=SpellE>atas</span> <span class=SpellE>pelaksanaan</span> <span
  class=SpellE>kewajiban</span><br style='mso-special-character:line-break'>
  <![if !supportLineBreakNewLine]><br style='mso-special-character:line-break'>
  <![endif]></p>
  <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
   style='margin-left:27.2pt;border-collapse:collapse;mso-yfti-tbllook:1184;
   mso-padding-alt:0cm 0cm 0cm 0cm'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
    <td width=151 valign=top style='width:113.0pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoListParagraphCxSpLast align=left style='margin-left:0cm;
    mso-add-space:auto;text-align:left;mso-pagination:none'><span class=SpellE>Ayat</span>
    <span class=SpellE>Pajak</span></p>
    </td>
    <td width=603 valign=top style='width:452.45pt;padding:0cm 0cm 0cm 0cm'>
    <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
     style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
     mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm;mso-border-insideh:
     .5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
     <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
      <td width=30 style='width:22.8pt;border:none;border-right:solid windowtext 1.0pt;
      mso-border-right-alt:solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal style='line-height:150%;mso-pagination:none'>:</p>
      </td>
      <td width=38 style='width:1.0cm;border:solid windowtext 1.0pt;border-left:
      none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
      padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=center style='text-align:center;line-height:
      150%;mso-pagination:none'><?= $rekening_kode[0] ?></p>
      </td>
      <td width=38 style='width:1.0cm;border:solid windowtext 1.0pt;border-left:
      none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
      padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=center style='text-align:center;line-height:
      150%;mso-pagination:none'><?= $rekening_kode[1] ?></p>
      </td>
      <td width=38 style='width:1.0cm;border:solid windowtext 1.0pt;border-left:
      none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
      padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=center style='text-align:center;line-height:
      150%;mso-pagination:none'><?= $rekening_kode[2] ?></p>
      </td>
      <td width=38 style='width:1.0cm;border:solid windowtext 1.0pt;border-left:
      none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
      padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=center style='text-align:center;line-height:
      150%;mso-pagination:none'><?= $rekening_kode[3] ?></p>
      </td>
      <td width=38 style='width:1.0cm;border:solid windowtext 1.0pt;border-left:
      none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
      padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=center style='text-align:center;line-height:
      150%;mso-pagination:none'><?= $rekening_kode[4] ?></p>
      </td>
      <td width=38 style='width:1.0cm;border:solid windowtext 1.0pt;border-left:
      none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
      padding:0cm 0cm 0cm 0cm'>
      <p class=MsoNormal align=center style='text-align:center;line-height:
      150%;mso-pagination:none'><?= $rekening_kode[5] ?><?= $rekening_kode[6] ?></p>
      </td>
     </tr>
    </table>
    <p class=MsoListParagraph align=left style='margin-left:0cm;mso-add-space:
    auto;text-align:left;mso-pagination:none'><o:p></o:p></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
    <td width=151 valign=top style='width:113.0pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoListParagraphCxSpFirst align=left style='margin-left:0cm;
    mso-add-space:auto;text-align:left;mso-pagination:none'><span class=SpellE>Nama</span>
    <span class=SpellE>Pajak</span></p>
    </td>
    <td width=603 valign=top style='width:452.45pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoListParagraphCxSpLast align=left style='margin-left:0cm;
    mso-add-space:auto;text-align:left;line-height:150%;mso-pagination:none'>:
    <?= $rekening_nama ?></p>
    </td>
   </tr>
  </table>
  <p class=MsoListParagraphCxSpFirst align=left style='margin-left:27.2pt;
  mso-add-space:auto;text-align:left;text-indent:-21.25pt;mso-pagination:none;
  mso-list:l3 level1 lfo1'><![if !supportLists]><span style='mso-fareast-font-family:
  "Times New Roman"'><span style='mso-list:Ignore'>II.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span></span><![endif]>Dari <span class=SpellE>penelitian</span> <span
  class=SpellE>dan</span>/<span class=SpellE>atau</span> <span class=SpellE>pemeriksaan</span>
  <span class=SpellE>tersebut</span> <span class=SpellE>diatas</span>, <span
  class=SpellE>penghitungan</span> <span class=SpellE>jumlah</span> yang <span
  class=SpellE>masuk</span> <span class=SpellE>masih</span> <span class=SpellE>harus</span>
  <span class=SpellE>dibayar</span><br>
  <span class=SpellE>adalah</span> <span class=SpellE>sebagai</span> <span
  class=SpellE>berikut</span>:</p>
  <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
   style='margin-left:27.2pt;border-collapse:collapse;mso-yfti-tbllook:1184;
   mso-padding-alt:0cm 0cm 0cm 0cm'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
    <td width=491 valign=top style='width:368.15pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoListParagraphCxSpMiddle align=left style='margin-left:0cm;
    mso-add-space:auto;text-align:left;mso-pagination:none'>1 <span
    class=SpellE>Pajak</span> yang <span class=SpellE>terhutang</span></p>
    </td>
    <td width=47 valign=top style='width:35.45pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoListParagraphCxSpMiddle align=left style='margin-left:0cm;
    mso-add-space:auto;text-align:left;mso-pagination:none'><span class=SpellE>Rp</span>.</p>
    </td>
    <td width=216 valign=top style='width:161.85pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoListParagraphCxSpLast align=right style='margin-left:0cm;
    mso-add-space:auto;text-align:right;mso-pagination:none'><?= LokalIndonesia::ribuan($tbltagihan_totaltagihterakhir) ?></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1'>
    <td width=491 valign=top style='width:368.15pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoListParagraphCxSpFirst align=left style='margin-left:0cm;
    mso-add-space:auto;text-align:left;mso-pagination:none'>2 <span
    class=SpellE>Pajak</span> yang <span class=SpellE>terhutang</span></p>
    </td>
    <td width=47 valign=top style='width:35.45pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoListParagraphCxSpMiddle align=left style='margin-left:0cm;
    mso-add-space:auto;text-align:left;mso-pagination:none'><o:p>&nbsp;</o:p></p>
    </td>
    <td width=216 valign=top style='width:161.85pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoListParagraphCxSpLast align=right style='margin-left:0cm;
    mso-add-space:auto;text-align:right;mso-pagination:none'><o:p>&nbsp;</o:p></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:2'>
    <td width=491 valign=top style='width:368.15pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoListParagraphCxSpFirst align=left style='margin-left:0cm;
    mso-add-space:auto;text-align:left;mso-pagination:none'><span
    style='mso-spacerun:yes'>&nbsp;&nbsp; </span>a<span
    style='mso-spacerun:yes'>&nbsp;&nbsp; </span><span class=SpellE>Bunga</span>
    (<span class=SpellE>Pasal</span> 10 (3))</p>
    </td>
    <td width=47 valign=top style='width:35.45pt;border:none;border-bottom:
    solid windowtext 1.0pt;mso-border-bottom-alt:solid windowtext .5pt;
    padding:0cm 0cm 0cm 0cm'>
    <p class=MsoListParagraphCxSpMiddle align=left style='margin-left:0cm;
    mso-add-space:auto;text-align:left;mso-pagination:none'><span class=SpellE>Rp</span></p>
    </td>
    <td width=216 valign=top style='width:161.85pt;border:none;border-bottom:
    solid windowtext 1.0pt;mso-border-bottom-alt:solid windowtext .5pt;
    padding:0cm 0cm 0cm 0cm'>
    <p class=MsoListParagraphCxSpLast align=right style='margin-left:0cm;
    mso-add-space:auto;text-align:right;mso-pagination:none'><o:p><?= LokalIndonesia::ribuan($tbltagihan_bungatagihterakhir) ?></o:p></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:3;mso-yfti-lastrow:yes'>
    <td width=491 valign=top style='width:368.15pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoListParagraphCxSpFirst align=left style='margin-left:0cm;
    mso-add-space:auto;text-align:left;mso-pagination:none'>4 <span
    class=SpellE>Jumlah</span> yang <span class=SpellE>masih</span> <span
    class=SpellE>harus</span> <span class=SpellE>dibayar</span> (1 + 2a)</p>
    </td>
    <td width=47 valign=top style='width:35.45pt;border:none;mso-border-top-alt:
    solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoListParagraphCxSpMiddle align=left style='margin-left:0cm;
    mso-add-space:auto;text-align:left;mso-pagination:none'><span class=SpellE>Rp</span>.</p>
    </td>
    <td width=216 valign=top style='width:161.85pt;border:none;mso-border-top-alt:
    solid windowtext .5pt;padding:0cm 0cm 0cm 0cm'>
    <p class=MsoListParagraphCxSpLast align=right style='margin-left:0cm;
    mso-add-space:auto;text-align:right;mso-pagination:none'><o:p><?= LokalIndonesia::ribuan($tbltagihan_totaltagihterakhir) ?></o:p></p>
    </td>
   </tr>
  </table>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3'>
  <td width=793 colspan=4 valign=top style='width:594.95pt;
  border-top:none;mso-border-left-alt:inset windowtext .75pt;mso-border-bottom-alt:
  inset windowtext .75pt;mso-border-right-alt:inset windowtext .75pt;
  padding:.75pt .75pt .75pt .75pt'>
  <div style='margin-left:28.8pt'>
  <p class=MsoNormal style='margin-left:86.4pt;mso-pagination:none'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></p>
  <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
   style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
   mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm;mso-border-insideh:
   .5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:19.85pt;mso-row-margin-right:
    34.55pt'>
    <td width=122 valign=top style='width:91.45pt;border:none;border-right:
    solid windowtext 1.0pt;mso-border-right-alt:solid windowtext .5pt;
    padding:0cm 0cm 0cm 0cm;height:19.85pt'>
    <p class=MsoNormal style='mso-pagination:none'><span class=SpellE>Dengan</span>
    <span class=SpellE>huruf</span></p>
    </td>
    <td width=585 colspan=2 valign=top style='width:438.65pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0cm 0cm 0cm 0cm;height:19.85pt'>
    <p class=MsoNormal style='mso-pagination:none'><o:p><?= LokalIndonesia::terbilangangka($tbltagihan_totaltagihterakhir) ?> rupiah</o:p></p>
    </td>
    <td style='mso-cell-special:placeholder;border:none;padding:0cm 0cm 0cm 0cm'
    width=46><p class='MsoNormal'>    
      <p class='MsoNormal'></td>
   </tr>
  
   <![if !supportMisalignedColumns]>
   <tr height=0>
    <td width=94 style='border:none'></td>
    <td width=191 style='border:none'></td>
    <td width=247 style='border:none'></td>
    <td width=34 style='border:none'></td>
   </tr>
   <![endif]>
  </table>
  <br>
  </div>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4'>
  <td width=793 colspan=4 valign=top style='width:594.95pt;
  border-top:none;mso-border-left-alt:inset windowtext .75pt;mso-border-bottom-alt:
  inset windowtext .75pt;mso-border-right-alt:inset windowtext .75pt;
  padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal style='margin-left:28.8pt;mso-pagination:none'><br>
  <b style='mso-bidi-font-weight:normal'><u>PERHATIAN<o:p></o:p></u></b></p>
  <p class=MsoListParagraphCxSpFirst align=left style='margin-left:46.8pt;
  mso-add-space:auto;text-align:left;text-indent:-18.0pt;mso-pagination:none;
  mso-list:l0 level1 lfo4'><![if !supportLists]><span style='mso-fareast-font-family:
  "Times New Roman"'><span style='mso-list:Ignore'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span></span><![endif]><span class=SpellE>Harap</span> <span
  class=SpellE>penyetoran</span> <span class=SpellE>dilakukan</span> <span
  class=SpellE>melalui</span> <span class=SpellE>Bendahara</span> <span
  class=SpellE>Penerimaan</span> <span class=SpellE>atau</span> <span
  class=SpellE>Kas</span> Daerah (Bank ..................) <span class=SpellE>dengan</span><br>
  <span class=SpellE>menggunakan</span> <span class=SpellE>Surat</span> <span
  class=SpellE>Setoran</span> <span class=SpellE>Pajak</span> Daerah (SSPD)</p>
  <p class=MsoListParagraphCxSpLast align=left style='margin-left:46.8pt;
  mso-add-space:auto;text-align:left;text-indent:-18.0pt;mso-pagination:none;
  mso-list:l0 level1 lfo4'><![if !supportLists]><span style='mso-fareast-font-family:
  "Times New Roman"'><span style='mso-list:Ignore'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span></span><![endif]><span class=SpellE>Apabila</span> STPD <span
  class=SpellE>ini</span> <span class=SpellE>tidak</span> <span class=SpellE>atau</span>
  <span class=SpellE>kurang</span> <span class=SpellE>dibayar</span> <span
  class=SpellE>setelah</span> <span class=SpellE>lewat</span> <span
  class=SpellE>waktu</span> paling lama 30 <span class=SpellE>hari</span> <span
  class=SpellE>sejak</span> STPD <span class=SpellE>ini</span><br>
  <span class=SpellE>diterima</span>, <span class=SpellE>dikenakan</span> <span
  class=SpellE>sanksi</span> <span class=SpellE>administrasi</span> <span
  class=SpellE>berupa</span> <span class=SpellE>bunga</span> <span
  class=SpellE>sebesar</span> 2% per <span class=SpellE>bulan</span>.</p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:5;mso-yfti-lastrow:yes'>
  <td width=415 colspan=2 valign=top style='width:311.45pt;
  border-top:none;mso-border-left-alt:inset windowtext .75pt;mso-border-bottom-alt:
  inset windowtext .75pt;mso-border-right-alt:inset windowtext .75pt;
  padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal align=left style='text-align:left;mso-pagination:none'><o:p>&nbsp;</o:p></p>
  </td>
  <td width=378 colspan=2 valign=top style='width:10.0cm;border-top:none;
  border-left:none;border-bottom:inset 1.0pt;border-right:inset 1.0pt;
  mso-border-top-alt:inset windowtext .75pt;mso-border-top-alt:inset windowtext .75pt;
  mso-border-bottom-alt:inset windowtext .75pt;mso-border-right-alt:inset windowtext .75pt;
  padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal align=center style='text-align:center;mso-pagination:none'>.........................................
  <span class=SpellE>Tahun </span><?= date('Y') ?></p>
  <p class=MsoNormal align=center style='text-align:center;mso-pagination:none'>a/n
  KEPALA DINAS PENDAPATAN DAERAH</p>
  <p class=MsoNormal align=center style='text-align:center;mso-pagination:none'><span
  class=GramE>KEPALA .................</span> PENETAPAN</p>
  <p class=MsoNormal align=center style='text-align:center;mso-pagination:none'><br>
  <br>
  (.................................................................................)
  <br>
  NIP</p>
  </td>
 </tr>
 <![if !supportMisalignedColumns]>
 <tr height=0>
  <td width=250 style='border:none'></td>
  <td width=77 style='border:none'></td>
  <td width=169 style='border:none'></td>
  <td width=103 style='border:none'></td>
 </tr>
 <![endif]>
</table>

<p class=MsoNormal align=left style='text-align:left'><o:p>&nbsp;</o:p></p>

</div>

</body>

</html>

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
$tbltransaksiketetapan_pajakpengurangan = $ts['tbltransaksiketetapan_pajakpengurangan'];
$tbltransaksiketetapan_rupiahbunga =  $ts['tbltransaksiketetapan_rupiahbunga'];
$tbltransaksiketetapan_pajakketetapan =  $ts['tbltransaksiketetapan_pajakketetapan'];
$tbltransaksiketetapan_tglketetapan =  $ts['tbltransaksiketetapan_tglketetapan'];
$tbltransaksiketetapan_pajakketetapan_terbilang = LokalIndonesia::terbilangangka(floatval( $ts['tbltransaksiketetapan_pajakketetapan'] ));
 ?>

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
<link rel=File-List href="SKPD_files/filelist.xml">
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>Suryo Prasetyo</o:Author>
  <o:LastAuthor>Suryo Prasetyo</o:LastAuthor>
  <o:Revision>17</o:Revision>
  <o:TotalTime>25</o:TotalTime>
  <o:Created>2016-06-16T06:15:00Z</o:Created>
  <o:LastSaved>2016-06-16T06:37:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>246</o:Words>
  <o:Characters>1407</o:Characters>
  <o:Company>Diginet Media</o:Company>
  <o:Lines>11</o:Lines>
  <o:Paragraphs>3</o:Paragraphs>
  <o:CharactersWithSpaces>1650</o:CharactersWithSpaces>
  <o:Version>12.00</o:Version>
 </o:DocumentProperties>
</xml><![endif]-->
<link rel=dataStoreItem href="SKPD_files/item0006.xml"
target="SKPD_files/props0007.xml">
<link rel=themeData href="SKPD_files/themedata.thmx">
<link rel=colorSchemeMapping href="SKPD_files/colorschememapping.xml">
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:SpellingState>Clean</w:SpellingState>
  <w:GrammarState>Clean</w:GrammarState>
  <w:TrackMoves>false</w:TrackMoves>
  <w:TrackFormatting/>
  <w:PunctuationKerning/>
  <w:DrawingGridHorizontalSpacing>5,5 pt</w:DrawingGridHorizontalSpacing>
  <w:DisplayHorizontalDrawingGridEvery>2</w:DisplayHorizontalDrawingGridEvery>
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
  DefSemiHidden="true" DefQFormat="false" DefPriority="99"
  LatentStyleCount="267">
  <w:LsdException Locked="false" Priority="0" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Normal"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 1"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 2"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 3"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 4"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 5"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 6"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 7"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 8"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 9"/>
  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>
  <w:LsdException Locked="false" Priority="10" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Title"/>
  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>
  <w:LsdException Locked="false" Priority="11" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>
  <w:LsdException Locked="false" Priority="22" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Strong"/>
  <w:LsdException Locked="false" Priority="20" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>
  <w:LsdException Locked="false" Priority="59" SemiHidden="false"
   UnhideWhenUsed="false" Name="Table Grid"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>
  <w:LsdException Locked="false" Priority="1" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 1"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>
  <w:LsdException Locked="false" Priority="34" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>
  <w:LsdException Locked="false" Priority="29" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Quote"/>
  <w:LsdException Locked="false" Priority="30" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 1"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 1"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 2"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 2"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 2"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 3"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 3"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 3"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 4"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 4"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 4"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 5"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 5"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 5"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 6"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 6"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 6"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="19" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>
  <w:LsdException Locked="false" Priority="21" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>
  <w:LsdException Locked="false" Priority="31" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>
  <w:LsdException Locked="false" Priority="32" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>
  <w:LsdException Locked="false" Priority="33" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>
  <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>
  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>
 </w:LatentStyles>
</xml><![endif]-->
<style>
<!--
 /* Font Definitions */
 @font-face
  {font-family:"Cambria Math";
  panose-1:2 4 5 3 5 4 6 3 2 4;
  mso-font-charset:0;
  mso-generic-font-family:roman;
  mso-font-pitch:variable;
  mso-font-signature:-1610611985 1107304683 0 0 159 0;}
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
  mso-fareast-font-family:Calibri;
  mso-fareast-theme-font:minor-latin;
  mso-hansi-font-family:Calibri;
  mso-hansi-theme-font:minor-latin;
  mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi;}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
  {mso-style-priority:34;
  mso-style-unhide:no;
  mso-style-qformat:yes;
  margin-top:0cm;
  margin-right:0cm;
  margin-bottom:10.0pt;
  margin-left:36.0pt;
  mso-add-space:auto;
  line-height:115%;
  mso-pagination:widow-orphan;
  font-size:11.0pt;
  font-family:"Calibri","sans-serif";
  mso-ascii-font-family:Calibri;
  mso-ascii-theme-font:minor-latin;
  mso-fareast-font-family:Calibri;
  mso-fareast-theme-font:minor-latin;
  mso-hansi-font-family:Calibri;
  mso-hansi-theme-font:minor-latin;
  mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi;}
p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
  {mso-style-priority:34;
  mso-style-unhide:no;
  mso-style-qformat:yes;
  mso-style-type:export-only;
  margin-top:0cm;
  margin-right:0cm;
  margin-bottom:0cm;
  margin-left:36.0pt;
  margin-bottom:.0001pt;
  mso-add-space:auto;
  line-height:115%;
  mso-pagination:widow-orphan;
  font-size:11.0pt;
  font-family:"Calibri","sans-serif";
  mso-ascii-font-family:Calibri;
  mso-ascii-theme-font:minor-latin;
  mso-fareast-font-family:Calibri;
  mso-fareast-theme-font:minor-latin;
  mso-hansi-font-family:Calibri;
  mso-hansi-theme-font:minor-latin;
  mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi;}
p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
  {mso-style-priority:34;
  mso-style-unhide:no;
  mso-style-qformat:yes;
  mso-style-type:export-only;
  margin-top:0cm;
  margin-right:0cm;
  margin-bottom:0cm;
  margin-left:36.0pt;
  margin-bottom:.0001pt;
  mso-add-space:auto;
  line-height:115%;
  mso-pagination:widow-orphan;
  font-size:11.0pt;
  font-family:"Calibri","sans-serif";
  mso-ascii-font-family:Calibri;
  mso-ascii-theme-font:minor-latin;
  mso-fareast-font-family:Calibri;
  mso-fareast-theme-font:minor-latin;
  mso-hansi-font-family:Calibri;
  mso-hansi-theme-font:minor-latin;
  mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi;}
p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
  {mso-style-priority:34;
  mso-style-unhide:no;
  mso-style-qformat:yes;
  mso-style-type:export-only;
  margin-top:0cm;
  margin-right:0cm;
  margin-bottom:10.0pt;
  margin-left:36.0pt;
  mso-add-space:auto;
  line-height:115%;
  mso-pagination:widow-orphan;
  font-size:11.0pt;
  font-family:"Calibri","sans-serif";
  mso-ascii-font-family:Calibri;
  mso-ascii-theme-font:minor-latin;
  mso-fareast-font-family:Calibri;
  mso-fareast-theme-font:minor-latin;
  mso-hansi-font-family:Calibri;
  mso-hansi-theme-font:minor-latin;
  mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi;}
span.SpellE
  {mso-style-name:"";
  mso-spl-e:yes;}
span.GramE
  {mso-style-name:"";
  mso-gram-e:yes;}
.MsoChpDefault
  {mso-style-type:export-only;
  mso-default-props:yes;
  mso-ascii-font-family:Calibri;
  mso-ascii-theme-font:minor-latin;
  mso-fareast-font-family:Calibri;
  mso-fareast-theme-font:minor-latin;
  mso-hansi-font-family:Calibri;
  mso-hansi-theme-font:minor-latin;
  mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi;}
.MsoPapDefault
  {mso-style-type:export-only;
  margin-bottom:10.0pt;
  line-height:115%;}
@page Section1
  {size:21.0cm 841.95pt;
  margin:42.55pt 1.0cm 42.55pt 1.0cm;
  mso-header-margin:36.0pt;
  mso-footer-margin:36.0pt;
  mso-paper-source:0;}
div.Section1
  {page:Section1;}
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
  mso-para-margin-top:0cm;
  mso-para-margin-right:0cm;
  mso-para-margin-bottom:10.0pt;
  mso-para-margin-left:0cm;
  line-height:115%;
  mso-pagination:widow-orphan;
  font-size:11.0pt;
  font-family:"Calibri","sans-serif";
  mso-ascii-font-family:Calibri;
  mso-ascii-theme-font:minor-latin;
  mso-hansi-font-family:Calibri;
  mso-hansi-theme-font:minor-latin;}
table.MsoTableGrid
  {mso-style-name:"Table Grid";
  mso-tstyle-rowband-size:0;
  mso-tstyle-colband-size:0;
  mso-style-priority:59;
  mso-style-unhide:no;
  border:solid black 1.0pt;
  mso-border-themecolor:text1;
  mso-border-alt:solid black .5pt;
  mso-border-themecolor:text1;
  mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
  mso-border-insideh:.5pt solid black;
  mso-border-insideh-themecolor:text1;
  mso-border-insidev:.5pt solid black;
  mso-border-insidev-themecolor:text1;
  mso-para-margin:0cm;
  mso-para-margin-bottom:.0001pt;
  mso-pagination:widow-orphan;
  font-size:11.0pt;
  font-family:"Calibri","sans-serif";
  mso-ascii-font-family:Calibri;
  mso-ascii-theme-font:minor-latin;
  mso-hansi-font-family:Calibri;
  mso-hansi-theme-font:minor-latin;}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="5122"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
<title>Cetak SKPD</title></head>

<body lang=EN-US style='tab-interval:36.0pt'>

<div class=Section1>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='/*border-collapse:collapse;*/border:none;mso-border-alt:solid windowtext .75pt;
 mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:
 .75pt dotted windowtext;mso-border-insidev:.75pt dotted windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=287 colspan=3 valign=top style='width:215.15pt;border:dotted windowtext 1.0pt;
  mso-border-alt:dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><br>
  PEMERINTAH <?= strtoupper( AppConfig::model()->getValue('APLIKASI_WILAYAH') ) ?><br>
  DINAS PENDAPATAN DAERAH<br>
  <?= strtoupper( AppConfig::model()->getValue('APLIKASI_ALAMAT_INSTANSI') ) ?><br style='mso-special-character:line-break'>
  <![if !supportLineBreakNewLine]><br style='mso-special-character:line-break'>
  <![endif]><o:p></o:p></span></p>  </td>
  <td width=308 colspan=4 valign=top style='width:230.8pt;border:dotted windowtext 1.0pt;
  border-left:none;mso-border-left-alt:dotted windowtext .75pt;mso-border-alt:
  dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><br>
  SURAT KETETAPAN PAJAK DAERAH<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'>(SKPD)<br>
  MASA PAJAK<br>
  <br>
  </span><b style='mso-bidi-font-weight:normal'><span style='mso-bidi-font-size:
  9.0pt;font-family:"Arial","sans-serif"'><?=  $masa_awal ?><span
  style='mso-spacerun:yes'>          </span>s/d<span
  style='mso-spacerun:yes'>          </span><?=  $masa_akhir ?></span></b><span
  style='font-size:9.0pt;font-family:"Arial","sans-serif"'><span
  style='mso-spacerun:yes'>        </span><o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=138 valign=top style='width:103.5pt;border:dotted windowtext 1.0pt;
  border-left:none;mso-border-left-alt:dotted windowtext .75pt;mso-border-alt:
  dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><br>
  NO. KOHIR<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><br>
  <?=  $nomor_kohir ?><o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=733 colspan=8 valign=top style='width:549.45pt;border:dotted windowtext 1.0pt;
  border-top:none;mso-border-top-alt:dotted windowtext .75pt;mso-border-alt:
  dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
   style='border-collapse:collapse;border:none;mso-yfti-tbllook:1184;
   mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:none;mso-border-insidev:
   none'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
    <td width=198 valign=top style='width:148.45pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span class=SpellE><span style='font-size:9.0pt;
    font-family:"Arial","sans-serif"'>Nama</span></span><span style='font-size:
    9.0pt;font-family:"Arial","sans-serif"'> <span class=SpellE>Badan</span> / <span
    class=SpellE>Merk</span> Usaha<o:p></o:p></span></p>    </td>
    <td width=19 valign=top style='width:14.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>:<o:p></o:p></span></p>    </td>
    <td width=500 valign=top style='width:375.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?=  $wp_nama ?><o:p></o:p></span></p>    </td>
   </tr>
   <tr style='mso-yfti-irow:1'>
    <td width=198 valign=top style='width:148.45pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span class=SpellE><span style='font-size:9.0pt;
    font-family:"Arial","sans-serif"'>Alamat</span></span><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p></o:p></span></p>    </td>
    <td width=19 valign=top style='width:14.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal;tab-stops:38.25pt'><span style='font-size:9.0pt;
    font-family:"Arial","sans-serif"'>:<o:p></o:p></span></p>    </td>
    <td width=500 valign=top style='width:375.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?=  $wp_alamat ?><o:p></o:p></span></p>    </td>
   </tr>
   <tr style='mso-yfti-irow:2'>
    <td width=198 valign=top style='width:148.45pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>    </td>
    <td width=19 valign=top style='width:14.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>:<o:p></o:p></span></p>    </td>
    <td width=500 valign=top style='width:375.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p><?=  $kelurahan_nama ?> - <?=  $kecamatan_nama ?></span></p>    </td>
   </tr>
   <tr style='mso-yfti-irow:3'>
    <td width=198 valign=top style='width:148.45pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>N.P.W.P.D<o:p></o:p></span></p>    </td>
    <td width=19 valign=top style='width:14.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>:<o:p></o:p></span></p>    </td>
    <td width=500 valign=top style='width:375.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?=  $wp_npwpd ?><o:p></o:p></span></p>    </td>
   </tr>
   <tr style='mso-yfti-irow:4'>
    <td width=198 valign=top style='width:148.45pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>No.
    <span class=SpellE>Ijin</span> Usaha<o:p></o:p></span></p>    </td>
    <td width=19 valign=top style='width:14.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>:<o:p></o:p></span></p>    </td>
    <td width=500 valign=top style='width:375.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>    </td>
   </tr>
   <tr style='mso-yfti-irow:5;mso-yfti-lastrow:yes'>
    <td width=198 valign=top style='width:148.45pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Batas
    <span class=SpellE>Penyetoran</span> <span class=SpellE>Terakhir</span><o:p></o:p></span></p>    </td>
    <td width=19 valign=top style='width:14.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>:
    <o:p></o:p></span></p>    </td>
    <td width=500 valign=top style='width:375.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;
    line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>30
    <span class=SpellE>Hari</span> <span class=SpellE>Setelah</span> SKPD <span
    class=SpellE>diterima</span> <span class=SpellE>Wajib</span> <span
    class=SpellE>Pajak</span> (WP)<o:p></o:p></span></p>    </td>
   </tr>
  </table>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:2;height:1.0cm'>
  <td width=36 style='width:26.7pt;border:dotted windowtext 1.0pt;border-top:
  none;mso-border-top-alt:dotted windowtext .75pt;mso-border-alt:dotted windowtext .75pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'>NO<o:p></o:p></span></p>  </td>
  <td width=123 style='width:92.1pt;border-top:none;border-left:none;
  border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .75pt;mso-border-left-alt:dotted windowtext .75pt;
  mso-border-alt:dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:1.0cm'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'>KD. REKENING<o:p></o:p></span></p>  </td>
  <td width=350 colspan=3 style='width:262.25pt;border-top:none;border-left:
  none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .75pt;mso-border-left-alt:dotted windowtext .75pt;
  mso-border-alt:dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:1.0cm'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'>JENIS PAJAK DAERAH<o:p></o:p></span></p>  </td>
  <td width=225 colspan=3 style='width:168.4pt;border-top:none;border-left:
  none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .75pt;mso-border-left-alt:dotted windowtext .75pt;
  mso-border-alt:dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:1.0cm'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'>JUMLAH<o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:3;height:2.0cm'>
  <td width=36 valign=top style='width:26.7pt;border:dotted windowtext 1.0pt;
  border-top:none;mso-border-top-alt:dotted windowtext .75pt;mso-border-alt:
  dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt;height:2.0cm'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><br>
  1<o:p></o:p></span></p>  </td>
  <td width=123 valign=top style='width:92.1pt;border-top:none;border-left:
  none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .75pt;mso-border-left-alt:dotted windowtext .75pt;
  mso-border-alt:dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:2.0cm'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><br>
  <?=  $rekening_kode ?><o:p></o:p></span></p>  </td>
  <td width=350 colspan=3 valign=top style='width:262.25pt;border-top:none;
  border-left:none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .75pt;mso-border-left-alt:dotted windowtext .75pt;
  mso-border-alt:dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:2.0cm'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><br>
  <span class=SpellE><?=  $rekening_nama ?><o:p></o:p></span></p>  </td>
  <td width=38 valign=top style='width:1.0cm;border:none;border-bottom:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .75pt;mso-border-left-alt:dotted windowtext .75pt;
  mso-border-top-alt:dotted windowtext .75pt;mso-border-left-alt:dotted windowtext .75pt;
  mso-border-bottom-alt:dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:2.0cm'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><br>
  <span class=SpellE>Rp</span>.<o:p></o:p></span></p>  </td>
  <td width=187 colspan=2 valign=top style='width:140.05pt;border-top:none;
  border-left:none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .75pt;mso-border-top-alt:dotted windowtext .75pt;
  mso-border-bottom-alt:dotted windowtext .75pt;mso-border-right-alt:dotted windowtext .75pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:2.0cm'>
  <p class=MsoNormal align=right style='margin-top:0cm;margin-right:14.15pt;
  margin-bottom:0cm;margin-left:0cm;margin-bottom:.0001pt;text-align:right;
  line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><br>
  <?=  LokalIndonesia::ribuan( $tbltransaksiketetapan_pajak ) ?><o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:4'>
  <td width=36 rowspan=4 valign=top style='width:26.7pt;border:none;border-left:
  dotted windowtext 1.0pt;mso-border-top-alt:dotted windowtext .75pt;
  mso-border-top-alt:dotted windowtext .75pt;mso-border-left-alt:dotted windowtext .75pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=472 colspan=4 rowspan=4 valign=top style='width:354.35pt;
  border:none;mso-border-top-alt:dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  150%'><span style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><br>
  <span class=SpellE>Jumlah</span> <span class=SpellE>Ketetapan</span> <span
  class=SpellE>Pokok</span> <span class=SpellE>Pajak</span><br>
  <span class=SpellE>Pengenaan</span> <span class=SpellE>Biaya</span> <span
  class=SpellE>Administrasi</span><br>
  <span class=SpellE>Pengenaan</span> <span class=SpellE>Kenaikan</span> <span
  class=SpellE>Pajak</span> / <span class=SpellE>Denda</span>
  <br>
  <span class=SpellE>Pengurangan</span> <span
  class=SpellE>Pajak</span></span></p></td>
  <td width=38 valign=top style='width:1.0cm;border:none;mso-border-top-alt:
  dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  150%'><span style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><br>
  <span class=SpellE>Rp</span>.<o:p></o:p></span></p>  </td>
  <td width=187 colspan=2 valign=top style='width:140.05pt;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-top-alt:dotted windowtext .75pt;
  mso-border-top-alt:dotted windowtext .75pt;mso-border-right-alt:dotted windowtext .75pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=right style='margin-top:0cm;margin-right:14.15pt;
  margin-bottom:0cm;margin-left:0cm;margin-bottom:.0001pt;text-align:right;
  line-height:150%'><span style='font-size:9.0pt;line-height:150%;font-family:
  "Arial","sans-serif"'><br>
  <?=  LokalIndonesia::ribuan( $tbltransaksiketetapan_pajak+$tbltransaksiketetapan_pajakpengurangan ) ?><o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:5'>
  <td width=38 valign=top style='width:1.0cm;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  150%'><span class=SpellE><span style='font-size:9.0pt;line-height:150%;
  font-family:"Arial","sans-serif"'>Rp</span></span><span style='font-size:
  9.0pt;line-height:150%;font-family:"Arial","sans-serif"'>.<o:p></o:p></span></p>  </td>
  <td width=187 colspan=2 valign=top style='width:140.05pt;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-right-alt:dotted windowtext .75pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=right style='margin-top:0cm;margin-right:14.15pt;
  margin-bottom:0cm;margin-left:0cm;margin-bottom:.0001pt;text-align:right;
  line-height:150%'><span style='font-size:9.0pt;line-height:150%;font-family:
  "Arial","sans-serif"'><?=  LokalIndonesia::ribuan( $tbltransaksiketetapan_rupiahbunga ) ?><o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:6'>
   <td valign=top style='width:1.0cm;border:none;padding:0cm 5.4pt 0cm 5.4pt'><span class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  150%"><span class=SpellE><span style='font-size:9.0pt;line-height:150%;
  font-family:"Arial","sans-serif"'>Rp</span></span><span style='font-size:
  9.0pt;line-height:150%;font-family:"Arial","sans-serif"'>.
         <o:p></o:p>
   </span></span></td>
   <td width=187 colspan=2 valign=top style='width:140.05pt;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-right-alt:dotted windowtext .75pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal align=right style='margin-top:0cm;margin-right:14.15pt;
  margin-bottom:0cm;margin-left:0cm;margin-bottom:.0001pt;text-align:right;
  line-height:150%'><span style='font-size:9.0pt;line-height:150%;font-family:
  "Arial","sans-serif"'>0
        <o:p></o:p></span></p></td>
 </tr>
 <tr style='mso-yfti-irow:6'>
  <td width=38 valign=top style='width:1.0cm;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  150%'><span class=SpellE><span style='font-size:9.0pt;line-height:150%;
  font-family:"Arial","sans-serif"'>Rp</span></span><span style='font-size:
  9.0pt;line-height:150%;font-family:"Arial","sans-serif"'>.<o:p></o:p></span></p>  </td>
  <td width=187 colspan=2 valign=top style='width:140.05pt;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-right-alt:dotted windowtext .75pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal align=right style='margin-top:0cm;margin-right:14.15pt;
  margin-bottom:0cm;margin-left:0cm;margin-bottom:.0001pt;text-align:right;
  line-height:150%'><span style='font-size:9.0pt;line-height:150%;font-family:
  "Arial","sans-serif"'><?=  LokalIndonesia::ribuan( $tbltransaksiketetapan_pajakpengurangan ) ?>
        <o:p></o:p></span></p></td>
 </tr>
 <tr style='mso-yfti-irow:7;height:19.85pt'>
  <td width=36 valign=top style='width:26.7pt;border-top:none;border-left:dotted windowtext 1.0pt;
  border-bottom:dotted windowtext 1.0pt;border-right:none;mso-border-left-alt:
  dotted windowtext .75pt;mso-border-bottom-alt:dotted windowtext .75pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=472 colspan=4 style='width:354.35pt;border:none;border-bottom:dotted windowtext 1.0pt;
  mso-border-bottom-alt:dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:19.85pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Jumlah</span></span><span
  style='font-size:9.0pt;font-family:"Arial","sans-serif"'> <span class=SpellE>Ketetapan</span>
  <span class=SpellE>Pajak</span> <span class=SpellE>terutang</span><o:p></o:p></span></p>  </td>
  <td width=38 style='width:1.0cm;border:none;border-bottom:dotted windowtext 1.0pt;
  mso-border-bottom-alt:dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:19.85pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Rp</span></span><span
  style='font-size:9.0pt;font-family:"Arial","sans-serif"'>.<o:p></o:p></span></p>  </td>
  <td width=187 colspan=2 style='width:140.05pt;border-top:none;border-left:
  none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-bottom-alt:dotted windowtext .75pt;mso-border-right-alt:dotted windowtext .75pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
  <p class=MsoNormal align=right style='margin-top:0cm;margin-right:14.15pt;
  margin-bottom:0cm;margin-left:0cm;margin-bottom:.0001pt;text-align:right;
  line-height:normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?=  LokalIndonesia::ribuan( $tbltransaksiketetapan_pajakketetapan ) ?><o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:8;height:42.5pt'>
  <td width=733 colspan=8 valign=top style='width:549.45pt;border:dotted windowtext 1.0pt;
  border-top:none;mso-border-top-alt:dotted windowtext .75pt;mso-border-alt:
  dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt;height:42.5pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:14.15pt;margin-bottom:
  0cm;margin-left:0cm;margin-bottom:.0001pt;line-height:normal'><span
  style='font-size:9.0pt;font-family:"Arial","sans-serif"'><span
  style='mso-spacerun:yes'>         </span><span class=SpellE>Dengan</span> <span
  class=SpellE>Huruf</span>:<br>
  <span style='mso-spacerun:yes'>         </span>
  <span class=SpellE><?= $tbltransaksiketetapan_pajakketetapan_terbilang ?></span>
  <br
  style='mso-special-character:line-break'>
  <![if !supportLineBreakNewLine]><br style='mso-special-character:line-break'>
  <![endif]><o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:9'>
  <td width=733 colspan=8 valign=top style='width:549.45pt;border:dotted windowtext 1.0pt;
  border-top:none;mso-border-top-alt:dotted windowtext .75pt;mso-border-alt:
  dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  150%'><span style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><br>
  PERHATIAN<o:p></o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  150%'><span style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'>1.
  <span class=SpellE>Penyetoran</span> <span class=SpellE>dilakukan</span> <span
  class=SpellE><span class=GramE>melalui</span></span><span class=GramE><span
  style='mso-spacerun:yes'>  </span><span class=SpellE>Bendahara</span></span> <span
  class=SpellE>Penerimaan</span> <span class=SpellE>Dispenda</span> <span
  class=SpellE>Kab</span>. Deli <span class=SpellE>Serdang</span><br>
  2. <span class=SpellE>Penyetoran</span> <span class=SpellE>harus</span> <span
  class=SpellE>menggunakan</span> <span class=SpellE>Surat</span> <span
  class=SpellE>Setoran</span> <span class=SpellE>Pajak</span> Daerah<br>
  3. <span class=SpellE>Setoran</span> <span class=SpellE>Pajak</span> Daerah <span
  class=SpellE>dinyatakan</span> LUNAS, <span class=SpellE>apabila</span> SSPD <span
  class=SpellE>telah</span> <span class=SpellE>disahkan</span>/<span
  class=SpellE>Validasi</span> <span class=SpellE>Kas</span><br>
  <span style='mso-spacerun:yes'>     </span>Register/cap/<span class=SpellE>tanda</span>
  <span class=SpellE>tangan</span> BKP<br>
  4. <span class=SpellE>Apabila</span> <span class=SpellE>dalam</span> <span
  class=SpellE>masa</span> <span class=SpellE>Pajak</span> <span class=SpellE>berjalan</span>,
  <span class=SpellE>Saudara</span> <span class=SpellE>belum</span> <span
  class=SpellE>dapat</span> <span class=SpellE>melunasi</span> <span
  class=SpellE>hutang</span> <span class=SpellE>Pajak</span> <span
  class=SpellE>Saudara</span>,<br>
  <span style='mso-spacerun:yes'>     </span><span class=SpellE>maka</span> <span
  class=SpellE>penagihan</span> <span class=SpellE>akan</span> <span
  class=SpellE>kami</span> <span class=SpellE>lakukan</span>, <span
  class=SpellE>dengan</span> <span class=SpellE>mengirimkan</span> <span
  class=SpellE>Surat</span> <span class=SpellE>Tagihan</span> <span
  class=SpellE>Pajak</span> Daerah (STPD)<br>
  <span style='mso-spacerun:yes'>     </span><span class=SpellE>dengan</span> <span
  class=SpellE>mengenakan</span> <span class=SpellE>kenaikan</span> <span
  class=SpellE>Pajak</span>/<span class=SpellE>denda</span> <span class=SpellE>dan</span>
  <span class=SpellE>sanksi</span> <span class=SpellE>administrasi</span> <span
  class=SpellE>berupa</span> <span class=SpellE>bunga</span> <span
  class=SpellE>sebesar</span><o:p></o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  150%'><span style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><span
  style='mso-spacerun:yes'>     </span>2% <span class=SpellE>perbulan</span>, <span
  class=SpellE>seusai</span> <span class=SpellE>Undang-undang</span> <span
  class=SpellE>dan</span> <span class=SpellE>Peraturan</span> Daerah (PERDA)
  yang <span class=SpellE>telah</span> <span class=SpellE>diberlakukan</span><br>
  5. <span class=SpellE>Apabila</span> <span class=SpellE>dalam</span> SKPD <span
  class=SpellE>ini</span> <span class=SpellE>masih</span> <span class=SpellE>ada</span>
  <span class=SpellE>hal</span> yang <span class=SpellE>belum</span> <span
  class=SpellE>dimengerti</span> <span class=SpellE>harap</span> <span
  class=SpellE>saudara</span> <span class=SpellE>datang</span> <span
  class=SpellE>ke</span><o:p></o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  150%'><span style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><span
  style='mso-spacerun:yes'>    </span><span class=SpellE>kantor</span> <span
  class=SpellE>Dispenda</span> <span class=SpellE>Kota</span> Tegal, <span class=SpellE>setiap</span> <span
  class=SpellE>hari</span> jam <span class=SpellE>kerja</span><br
  style='mso-special-character:line-break'>
  <![if !supportLineBreakNewLine]><br style='mso-special-character:line-break'>
  <![endif]><o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:10;mso-yfti-lastrow:yes;height:132.0pt'>
  <td width=371 colspan=4 valign=top style='width:278.2pt;border-top:none;
  border-left:dotted windowtext 1.0pt;border-bottom:dotted windowtext 1.0pt;
  border-right:none;mso-border-top-alt:dotted windowtext .75pt;mso-border-top-alt:
  dotted windowtext .75pt;mso-border-left-alt:dotted windowtext .75pt;
  mso-border-bottom-alt:dotted windowtext .75pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:132.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=362 colspan=4 valign=top style='width:271.25pt;border-top:none;
  border-left:none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .75pt;mso-border-top-alt:dotted windowtext .75pt;
  mso-border-bottom-alt:dotted windowtext .75pt;mso-border-right-alt:dotted windowtext .75pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:132.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><br>
  <?= strtoupper( AppConfig::model()->getValue('APLIKASI_CETAK_WILAYAH') ) ?>, <?=  LokalIndonesia::TanggalUmum( $tbltransaksiketetapan_tglketetapan ) ?><o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'>KEPALA DINAS PENDAPATAN DAERAH<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'>Kota Tegal
      <o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><?= strtoupper( AppConfig::model()->getValue('CETAK_KEPALA_NAMA') ) ?><o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><?= strtoupper( AppConfig::model()->getValue('CETAK_KEPALA_JABATAN') ) ?><o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'>NIP. <?= strtoupper( AppConfig::model()->getValue('CETAK_KEPALA_NIP') ) ?><o:p></o:p></span></p>  </td>
 </tr>
 <![if !supportMisalignedColumns]>
 <tr height=0>
  <td width=36 style='border:none'></td>
  <td width=123 style='border:none'></td>
  <td width=128 style='border:none'></td>
  <td width=84 style='border:none'></td>
  <td width=137 style='border:none'></td>
  <td width=38 style='border:none'></td>
  <td width=49 style='border:none'></td>
  <td width=138 style='border:none'></td>
 </tr>
 <![endif]>
</table>

<p class=MsoNormal><span class=GramE><span style='font-size:9.0pt;line-height:
115%;font-family:"Arial","sans-serif"'>MODEL :</span></span><span
style='font-size:9.0pt;line-height:115%;font-family:"Arial","sans-serif"'> DPD
– 10.A<o:p></o:p></span></p>

</div>

</body>

</html>

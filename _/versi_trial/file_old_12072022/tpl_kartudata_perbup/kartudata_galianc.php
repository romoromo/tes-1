<?php 

$select = '*';
$from = 'tblobyekgalianc';
$otherquery = array(
  'leftjoin_refjenisbahanc' => array('refjenisbahanc','tblobyekgalianc.refjenisbahanc_id = refjenisbahanc.refjenisbahanc_id')
);
$filter = array(
  'EQ__tblobyek_id' => $data['id']
);
$mode = 'LIST';


$data_detail_obyek = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery,'filter'=>$filter,'mode'=>$mode));
?>
<?php 

$select = '*';
$from = 'tbltransaksiketetapan';
$otherquery = array(
 'leftjoin_tblobyekgalianc' => array('tblobyekgalianc','tbltransaksiketetapan.tblobyek_id= tblobyekgalianc.tblobyek_id')
);
$filter = array(
  'EQ__tbltransaksiketetapan.tblobyek_id' => $data['id']
  ,'EQ__tbltransaksiketetapan_tahunpajak' => $tahun
);
$mode = 'LIST';

$rowtetap=array();
$data_ketetapan = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery,'filter'=>$filter,'mode'=>$mode));
foreach ($data_ketetapan as $datatetap){
$rowtetap[]=$datatetap;
}
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
<link rel=File-List
href="KARTU%20DATA%20PAJAK%20GALIAN%20GOLONGAN%20C_files/filelist.xml">
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>Suryo Prasetyo</o:Author>
  <o:LastAuthor>Suryo Prasetyo</o:LastAuthor>
  <o:Revision>3</o:Revision>
  <o:TotalTime>40</o:TotalTime>
  <o:LastPrinted>2016-07-14T13:19:00Z</o:LastPrinted>
  <o:Created>2016-07-18T05:07:00Z</o:Created>
  <o:LastSaved>2016-07-18T05:08:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>107</o:Words>
  <o:Characters>613</o:Characters>
  <o:Company>Diginet Media</o:Company>
  <o:Lines>5</o:Lines>
  <o:Paragraphs>1</o:Paragraphs>
  <o:CharactersWithSpaces>719</o:CharactersWithSpaces>
  <o:Version>12.00</o:Version>
 </o:DocumentProperties>
</xml><![endif]-->
<link rel=dataStoreItem
href="KARTU%20DATA%20PAJAK%20GALIAN%20GOLONGAN%20C_files/item0006.xml"
target="KARTU%20DATA%20PAJAK%20GALIAN%20GOLONGAN%20C_files/props0007.xml">
<link rel=themeData
href="KARTU%20DATA%20PAJAK%20GALIAN%20GOLONGAN%20C_files/themedata.thmx">
<link rel=colorSchemeMapping
href="KARTU%20DATA%20PAJAK%20GALIAN%20GOLONGAN%20C_files/colorschememapping.xml">
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:Zoom>130</w:Zoom>
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
  margin:0cm;
  margin-bottom:.0001pt;
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
  margin-bottom:0cm;
  margin-left:36.0pt;
  margin-bottom:.0001pt;
  mso-add-space:auto;
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
  margin-bottom:0cm;
  margin-left:36.0pt;
  margin-bottom:.0001pt;
  mso-add-space:auto;
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
  mso-para-margin:0cm;
  mso-para-margin-bottom:.0001pt;
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
 <o:shapedefaults v:ext="edit" spidmax="2050"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=EN-US style='tab-interval:259.1pt'>

<div class=Section1>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:
 .5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=733 colspan=2 valign=top style='width:549.45pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:115%'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt;mso-bidi-font-size:
  9.0pt;line-height:115%;font-family:"Arial","sans-serif"'>KARTU DATA <o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center;line-height:115%'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt;mso-bidi-font-size:
  9.0pt;line-height:115%;font-family:"Arial","sans-serif"'>PAJAK GALIAN
  GOLONGAN C<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center;line-height:115%'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:9.0pt;line-height:
  115%;font-family:"Arial","sans-serif"'>Tahun Pajak : <?= $data['surat']['tbltransaksiketetapan_tahunpajak']; ?></span></b><span
  style='font-size:9.0pt;line-height:115%;font-family:"Arial","sans-serif"'><o:p></o:p></span></p>
  <p class=MsoNormal style='line-height:115%'><span style='font-size:9.0pt;
  line-height:115%;font-family:"Arial","sans-serif"'>N.P.W.P.D<br
  style='mso-special-character:line-break'>
  <![if !supportLineBreakNewLine]><br style='mso-special-character:line-break'>
  <![endif]><o:p></o:p></span></p>
  <p class=MsoNormal style='line-height:115%'><span style='font-size:9.0pt;
  line-height:115%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 align=left
   style='border-collapse:collapse;border:none;mso-border-alt:solid black .5pt;
   mso-border-themecolor:text1;mso-table-overlap:never;mso-yfti-tbllook:1184;
   mso-table-lspace:9.0pt;margin-left:6.75pt;mso-table-rspace:9.0pt;margin-right:
   6.75pt;mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:page;
   mso-table-left:25.5pt;mso-table-top:-15.95pt;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
    height:14.15pt'>
    <td width=30 style='width:22.7pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-bottom:solid windowtext 1.0pt;mso-border-alt:solid black .5pt;
    mso-border-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $data['surat']['tblobyek_npwpd'][0]; ?></span></p>
    </td>
    <td width=30 style='width:22.7pt;border:none;border-right:solid black 1.0pt;
    mso-border-right-themecolor:text1;mso-border-left-alt:solid black .5pt;
    mso-border-left-themecolor:text1;mso-border-left-alt:solid black .5pt;
    mso-border-left-themecolor:text1;mso-border-right-alt:solid black .5pt;
    mso-border-right-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=30 style='width:22.7pt;border-top:solid black 1.0pt;mso-border-top-themecolor:
    text1;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:
    solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-left-alt:
    solid black .5pt;mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;
    mso-border-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $data['surat']['tblobyek_npwpd'][2]; ?></span></p>
    </td>
    <td width=30 style='width:22.7pt;border:none;border-right:solid black 1.0pt;
    mso-border-right-themecolor:text1;mso-border-left-alt:solid black .5pt;
    mso-border-left-themecolor:text1;mso-border-left-alt:solid black .5pt;
    mso-border-left-themecolor:text1;mso-border-right-alt:solid black .5pt;
    mso-border-right-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal>&nbsp;</p>
    </td>
    <td width=30 style='width:22.7pt;border-top:solid black 1.0pt;mso-border-top-themecolor:
    text1;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:
    solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-left-alt:
    solid black .5pt;mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;
    mso-border-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $data['surat']['tblobyek_npwpd'][4]; ?></span></p>
    </td>
    <td width=30 style='width:22.7pt;border-top:solid black 1.0pt;mso-border-top-themecolor:
    text1;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:
    solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-left-alt:
    solid black .5pt;mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;
    mso-border-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $data['surat']['tblobyek_npwpd'][5]; ?></span></p>
    </td>
    <td width=30 style='width:22.7pt;border-top:solid black 1.0pt;mso-border-top-themecolor:
    text1;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:
    solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-left-alt:
    solid black .5pt;mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;
    mso-border-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $data['surat']['tblobyek_npwpd'][6]; ?></span></p>
    </td>
    <td width=30 style='width:22.7pt;border-top:solid black 1.0pt;mso-border-top-themecolor:
    text1;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:
    solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-left-alt:
    solid black .5pt;mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;
    mso-border-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $data['surat']['tblobyek_npwpd'][7]; ?></span></p>
    </td>
    <td width=30 style='width:22.7pt;border-top:solid black 1.0pt;mso-border-top-themecolor:
    text1;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:
    solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-left-alt:
    solid black .5pt;mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;
    mso-border-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $data['surat']['tblobyek_npwpd'][8]; ?></span></p>
    </td>
    <td width=30 style='width:22.7pt;border-top:solid black 1.0pt;mso-border-top-themecolor:
    text1;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:
    solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-left-alt:
    solid black .5pt;mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;
    mso-border-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $data['surat']['tblobyek_npwpd'][9]; ?></span></p>
    </td>
    <td width=30 style='width:22.7pt;border-top:solid black 1.0pt;mso-border-top-themecolor:
    text1;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:
    solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-left-alt:
    solid black .5pt;mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;
    mso-border-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $data['surat']['tblobyek_npwpd'][10]; ?></span></p>
    </td>
    <td width=30 style='width:22.7pt;border:none;border-right:solid black 1.0pt;
    mso-border-right-themecolor:text1;mso-border-left-alt:solid black .5pt;
    mso-border-left-themecolor:text1;mso-border-left-alt:solid black .5pt;
    mso-border-left-themecolor:text1;mso-border-right-alt:solid black .5pt;
    mso-border-right-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=30 style='width:22.7pt;border-top:solid black 1.0pt;mso-border-top-themecolor:
    text1;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:
    solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-left-alt:
    solid black .5pt;mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;
    mso-border-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $data['surat']['tblobyek_npwpd'][12]; ?></span></p>
    </td>
    <td width=30 style='width:22.7pt;border-top:solid black 1.0pt;mso-border-top-themecolor:
    text1;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:
    solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-left-alt:
    solid black .5pt;mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;
    mso-border-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $data['surat']['tblobyek_npwpd'][13]; ?></span></p>
    </td>
    <td width=30 style='width:22.7pt;border:none;border-right:solid black 1.0pt;
    mso-border-right-themecolor:text1;mso-border-left-alt:solid black .5pt;
    mso-border-left-themecolor:text1;mso-border-left-alt:solid black .5pt;
    mso-border-left-themecolor:text1;mso-border-right-alt:solid black .5pt;
    mso-border-right-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=30 style='width:22.7pt;border-top:solid black 1.0pt;mso-border-top-themecolor:
    text1;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:
    solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-left-alt:
    solid black .5pt;mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;
    mso-border-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $data['surat']['tblobyek_npwpd'][15]; ?></span></p>
    </td>
    <td width=30 style='width:22.7pt;border-top:solid black 1.0pt;mso-border-top-themecolor:
    text1;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:
    solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-left-alt:
    solid black .5pt;mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;
    mso-border-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $data['surat']['tblobyek_npwpd'][16]; ?></p>
    </td>
    <td width=16 style='width:11.8pt;border:none;mso-border-left-alt:solid black .5pt;
    mso-border-left-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal style='line-height:115%'><span style='font-size:9.0pt;
  line-height:115%;font-family:"Arial","sans-serif"'><span
  style='mso-spacerun:yes'>?</span><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=733 colspan=2 valign=top style='width:549.45pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 width=690
   style='width:517.15pt;border-collapse:collapse;border:none;mso-yfti-tbllook:
   1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:none;mso-border-insidev:
   none'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:14.15pt'>
    <td width=170 valign=top style='width:127.6pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>1
    Nama Badan <o:p></o:p></span></p>
    </td>
    <td width=519 valign=top style='width:389.55pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>:<?= $data['surat']['tblobyek_nama']; ?></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1;height:14.15pt'>
    <td width=170 valign=top style='width:127.6pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>2
    Alamat<o:p></o:p></span></p>
    </td>
    <td width=519 valign=top style='width:389.55pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>:<?= $data['surat']['tblobyek_alamat']; ?></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:2;height:14.15pt'>
    <td width=170 valign=top style='width:127.6pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>3
    Nama Pemilik<o:p></o:p></span></p>
    </td>
    <td width=519 valign=top style='width:389.55pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>:<?= $data['surat']['tblsubyek_nama']; ?></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:3;height:14.15pt'>
    <td width=170 valign=top style='width:127.6pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>4
    Alamat<o:p></o:p></span></p>
    </td>
    <td width=519 valign=top style='width:389.55pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>:<?= $data['surat']['tblsubyek_alamat']; ?></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:4;mso-yfti-lastrow:yes;height:14.15pt'>
    <td width=170 valign=top style='width:127.6pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>5
    Nomor dan Tanggal SIPD<o:p></o:p></span></p>
    </td>
    <td width=519 valign=top style='width:389.55pt;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>:<o:p></o:p></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes;height:42.5pt'>
  <td width=700 valign=top style='width:524.65pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:42.5pt'>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><span
  style='mso-spacerun:yes'>??? </span>1 Data Objek Pajak<o:p></o:p></span></p>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=576
   style='width:432.0pt;margin-left:31.25pt;border-collapse:collapse;
   border:none;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
   mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:14.4pt'>
    <td width=54 style='width:40.5pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal align=center style='text-align:center'><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>No<o:p></o:p></span></p>    </td>
    <td width=164 style='width:123.35pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal align=center style='text-align:center'><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Nama Bahan Galian
    C<o:p></o:p></span></p>    </td>
    <td width=186 style='width:139.5pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal align=center style='text-align:center'><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Sumber Pengambilan<o:p></o:p></span></p>    </td>
    <td width=172 style='width:128.65pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal align=center style='text-align:center'><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Harga Pasar/Nilai
    Standar<o:p></o:p></span></p>
    <p class=MsoNormal align=center style='text-align:center'><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>(Rp)/M3<o:p></o:p></span></p>    </td>
   </tr>
   <?php $no=1; foreach($data_detail_obyek as $rowDetail): ?>
   <tr style='mso-yfti-irow:1;height:14.4pt'>
    <td width=54 style='width:40.5pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $no++ ?></span></p>    </td>
    <td width=164 style='width:123.35pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $rowDetail['refjenisbahanc_nama'] ?></span></p>    </td>
    <td width=186 style='width:139.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>    </td>
    <td width=172 style='width:128.65pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= LokalIndonesia::rupiah($rowDetail['tblobyekgalianc_harga']) ?></span></p>    </td>
   </tr>
   <?php endforeach; ?>
  </table>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><span
  style='mso-spacerun:yes'>??? </span>2 Volume Pemakaian dan Setoran Yang
  Dilakukan<o:p></o:p></span></p>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=576
   style='width:432.2pt;margin-left:31.25pt;border-collapse:collapse;
   border:none;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
   mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:14.4pt'>
    <td width=54 style='width:40.5pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal align=center style='text-align:center'><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>No<o:p></o:p></span></p>    </td>
    <td width=96 style='width:72.0pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal align=center style='text-align:center'><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Tanggal<o:p></o:p></span></p>    </td>
    <td width=114 style='width:85.5pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal align=center style='text-align:center'><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Massa<o:p></o:p></span></p>    </td>
    <td width=144 style='width:108.0pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal align=center style='text-align:center'><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Volume/Tonase<o:p></o:p></span></p>
    <p class=MsoNormal align=center style='text-align:center'><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>(M3/Ton)<o:p></o:p></span></p>    </td>
    <td width=168 style='width:126.2pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal align=center style='text-align:center'><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Setoran (Rp)<o:p></o:p></span></p>    </td>
   </tr>
   <?php $nomor=1; for($i=0;$i<=15;$i++): ?>
   <tr style='mso-yfti-irow:1;height:14.4pt'>
    <td width=54 style='width:40.5pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal align=center style='text-align:center'><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $nomor++ ?><o:p></o:p></span></p>    </td>
    <td width=96 style='width:72.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?php if( isset($rowtetap[$i])):?><?= date('d/m/Y',strtotime($rowtetap[$i]['tbltransaksiketetapan_tglentrisptpd'])) ?><?php endif; ?></span></p>    </td>
    <td width=114 style='width:85.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?php if( isset($rowtetap[$i])):?><?=  LokalIndonesia::getBulan($rowtetap[$i]['tbltransaksiketetapan_bulanpajak']); ?><?php endif; ?></span></p>    </td>
    <td width=144 style='width:108.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?php if( isset($rowtetap[$i])):?><?= $rowtetap[$i]['tblobyekgalianc_volume'] ?><?php endif; ?></span></p>    </td>
    <td width=168 style='width:126.2pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.4pt;text-align:right'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?php if( isset($rowtetap[$i])):?><?= LokalIndonesia::ribuan($rowtetap[$i]['tbltransaksiketetapan_jumlahsetor'] ); ?><?php endif; ?></span></p>    </td>
   </tr>
   <?php endfor; ?>
  </table>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";
  mso-ansi-language:IN'><o:p>&nbsp;</o:p></span></p>
  <table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 align=left
   style='border-collapse:collapse;border:none;mso-table-overlap:never;
   mso-yfti-tbllook:1184;mso-table-lspace:9.0pt;margin-left:6.75pt;mso-table-rspace:
   9.0pt;margin-right:6.75pt;mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:
   page;mso-table-left:65.75pt;mso-table-top:6.55pt;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
   mso-border-insideh:none;mso-border-insidev:none'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
    <td width=349 valign=top style='width:261.95pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:
    center;line-height:150%'><span style='font-size:9.0pt;line-height:150%;
    font-family:"Arial","sans-serif"'>Mengetahui<o:p></o:p></span></p>
    <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:
    center;line-height:150%'><span style='font-size:9.0pt;line-height:150%;
    font-family:"Arial","sans-serif"'>Kepala???????Pendaftaran dan Pendataaan<o:p></o:p></span></p>
    <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
    style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
    style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:
    center;line-height:150%'><span style='font-size:9.0pt;line-height:150%;
    font-family:"Arial","sans-serif"'>(??????????????..)<o:p></o:p></span></p>
    <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
    style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><span
    style='mso-spacerun:yes'>???????????????????? </span>NIP.<o:p></o:p></span></p>
    </td>
    <td width=265 valign=top style='width:198.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:
    center;line-height:150%'><span style='font-size:9.0pt;line-height:150%;
    font-family:"Arial","sans-serif"'>Dibuat Oleh:<o:p></o:p></span></p>
    <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:
    center;line-height:150%'><span style='font-size:9.0pt;line-height:150%;
    font-family:"Arial","sans-serif"'>Kepala??????Pendataan<o:p></o:p></span></p>
    <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:
    center;line-height:150%'><span style='font-size:9.0pt;line-height:150%;
    font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:
    center;line-height:150%'><span style='font-size:9.0pt;line-height:150%;
    font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:
    center;line-height:150%'><span style='font-size:9.0pt;line-height:150%;
    font-family:"Arial","sans-serif"'>(??????????????)<o:p></o:p></span></p>
    <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
    style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><span
    style='mso-spacerun:yes'>???????? </span>NIP.<o:p></o:p></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p></o:p></span></p>
  </td>
  <td width=33 style='width:24.8pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;mso-border-bottom-alt:
  solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;padding:
  0cm 5.4pt 0cm 5.4pt;height:42.5pt'>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:center;
  line-height:150%'><span style='font-size:9.0pt;line-height:150%;font-family:
  "Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:center;
  line-height:150%'><span style='font-size:9.0pt;line-height:150%;font-family:
  "Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><span
style='mso-spacerun:yes'>?</span>MODEL : DPD-04E<o:p></o:p></span></p>

</div>

</body>

</html>

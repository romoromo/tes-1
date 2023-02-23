<?php 
$select = '*';
$from = 'tblobyekhiburan';
$otherquery = array(
    'leftjoin_refjenishiburan' => array('refjenishiburan','tblobyekhiburan.refjenishiburan_id= refjenishiburan.refjenishiburan_id')
);
$filter = array(
  'EQ__tblobyek_id' => $data['id']
);
$mode = 'DETAIL';


$data_jenishiburan= DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery,'filter'=>$filter,'mode'=>$mode));
?>
<?php 
$select = '*';
$from = 'tblobyekhiburandet';
$otherquery = array(
    'leftjoin_tblobyekhiburan' => array('tblobyekhiburan','tblobyekhiburandet.tblobyekhiburan_id= tblobyekhiburan.tblobyekhiburan_id')
);
$filter = array(
  'EQ__tblobyekhiburandet.tblobyek_id' => $data['id']
);
$mode = 'LIST';


$data_detailhiburan= DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery,'filter'=>$filter,'mode'=>$mode));
?>
<?php 

$select = '*';
$from = 'tbltransaksiketetapan';
$otherquery = array();
$filter = array(
  'EQ__tbltransaksiketetapan.tblobyek_id' => $data['id']
);
$mode = 'LIST';

$rowtetap=array();
$data_detail_obyek = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery,'filter'=>$filter,'mode'=>$mode));
foreach ($data_detail_obyek as $datatetap){
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
<link rel=File-List href="KARTU%20DATA_HIBURAN_files/filelist.xml">
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>Suryo Prasetyo</o:Author>
  <o:LastAuthor>Suryo Prasetyo</o:LastAuthor>
  <o:Revision>5</o:Revision>
  <o:TotalTime>43</o:TotalTime>
  <o:LastPrinted>2016-07-14T13:19:00Z</o:LastPrinted>
  <o:Created>2016-07-18T04:14:00Z</o:Created>
  <o:LastSaved>2016-07-18T04:36:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>264</o:Words>
  <o:Characters>1508</o:Characters>
  <o:Company>Diginet Media</o:Company>
  <o:Lines>12</o:Lines>
  <o:Paragraphs>3</o:Paragraphs>
  <o:CharactersWithSpaces>1769</o:CharactersWithSpaces>
  <o:Version>12.00</o:Version>
 </o:DocumentProperties>
</xml><![endif]-->
<link rel=dataStoreItem href="KARTU%20DATA_HIBURAN_files/item0006.xml"
target="KARTU%20DATA_HIBURAN_files/props0007.xml">
<link rel=themeData href="KARTU%20DATA_HIBURAN_files/themedata.thmx">
<link rel=colorSchemeMapping
href="KARTU%20DATA_HIBURAN_files/colorschememapping.xml">
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:Zoom>130</w:Zoom>
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
 <o:shapedefaults v:ext="edit" spidmax="5122"/>
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
  9.0pt;line-height:115%;font-family:"Arial","sans-serif"'>PAJAK </span></b><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-size:10.0pt;
  mso-bidi-font-size:9.0pt;line-height:115%;font-family:"Arial","sans-serif";
  mso-ansi-language:IN'>HIBURAN</span></b><b style='mso-bidi-font-weight:normal'><span
  style='font-size:10.0pt;mso-bidi-font-size:9.0pt;line-height:115%;font-family:
  "Arial","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center;line-height:115%'><span
  class=SpellE><b style='mso-bidi-font-weight:normal'><span style='font-size:
  9.0pt;line-height:115%;font-family:"Arial","sans-serif"'>Tahun</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:9.0pt;line-height:
  115%;font-family:"Arial","sans-serif"'> <span class=SpellE><span class=GramE>Pajak</span></span><span
  class=GramE> :</span> <?= $data['surat']['tbltransaksiketetapan_tahunpajak']; ?></span></b><span style='font-size:9.0pt;
  line-height:115%;font-family:"Arial","sans-serif"'><o:p></o:p></span></p>
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
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
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
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $data['surat']['tblobyek_npwpd'][16]; ?></span></p>
    </td>
    <td width=16 style='width:11.8pt;border:none;mso-border-left-alt:solid black .5pt;
    mso-border-left-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal style='line-height:115%'><span style='font-size:9.0pt;
  line-height:115%;font-family:"Arial","sans-serif"'><span
  style='mso-spacerun:yes'> </span><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=733 colspan=2 valign=top style='width:549.45pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 align=left
   width=690 style='width:517.15pt;border-collapse:collapse;border:none;
   mso-table-overlap:never;mso-yfti-tbllook:1184;mso-table-lspace:9.0pt;
   margin-left:6.75pt;mso-table-rspace:9.0pt;margin-right:6.75pt;mso-table-anchor-vertical:
   paragraph;mso-table-anchor-horizontal:margin;mso-table-left:left;mso-table-top:
   inside;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:none;
   mso-border-insidev:none'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:14.15pt'>
    <td width=151 style='width:113.15pt;padding:0cm 5.4pt 0cm 5.4pt;height:
    14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>1
    <span class=SpellE>Nama</span> <span class=SpellE>Badan</span> <o:p></o:p></span></p>
    </td>
    <td width=539 style='width:404.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>: <?= $data['surat']['tblobyek_nama']; ?><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1;height:14.15pt'>
    <td width=151 style='width:113.15pt;padding:0cm 5.4pt 0cm 5.4pt;height:
    14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>2
    <span class=SpellE>Alamat</span><o:p></o:p></span></p>
    </td>
    <td width=539 style='width:404.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>: <?= $data['surat']['tblobyek_alamat']; ?><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:2;height:14.15pt'>
    <td width=151 style='width:113.15pt;padding:0cm 5.4pt 0cm 5.4pt;height:
    14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>3
    <span class=SpellE>Nama</span> <span class=SpellE>Pemilik</span><o:p></o:p></span></p>
    </td>
    <td width=539 style='width:404.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>: <?= $data['surat']['tblsubyek_nama']; ?><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:3;mso-yfti-lastrow:yes;height:14.15pt'>
    <td width=151 style='width:113.15pt;padding:0cm 5.4pt 0cm 5.4pt;height:
    14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>4
    <span class=SpellE>Alamat</span><o:p></o:p></span></p>
    </td>
    <td width=539 style='width:404.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>: <?= $data['surat']['tblsubyek_alamat']; ?><o:p></o:p></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><span
  style='mso-spacerun:yes'> </span><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;height:42.5pt'>
  <td width=699 valign=top style='width:524.6pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:42.5pt'>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 align=left
   style='border-collapse:collapse;border:none;mso-border-alt:solid black .5pt;
   mso-border-themecolor:text1;mso-table-overlap:never;mso-yfti-tbllook:1184;
   mso-table-lspace:9.0pt;margin-left:6.75pt;mso-table-rspace:9.0pt;margin-right:
   6.75pt;mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:page;
   mso-table-left:149.25pt;mso-table-top:-.65pt;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
    height:14.15pt'>
    <td width=30 style='width:22.7pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";
    mso-ansi-language:IN'><?= $data_jenishiburan['refjenishiburan_kode'][0]?></span></p>
    </td>
    <td width=30 valign=top style='width:22.7pt;border:solid black 1.0pt;
    mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
    mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;
    mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
    <p class=MsoNormal><span lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";
    mso-ansi-language:IN'><?= $data_jenishiburan['refjenishiburan_kode'][1]?></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal><span lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";
  mso-ansi-language:IN'>1 Hiburan yang diselengarakan :<span
  style='mso-spacerun:yes'>  </span><o:p></o:p></span></p>
  <p class=MsoNormal><span lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";
  mso-ansi-language:IN'><span style='mso-spacerun:yes'>   </span></span><span
  style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p></o:p></span></p>
  <table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
   style='margin-left:13.95pt;border-collapse:collapse;border:none;mso-yfti-tbllook:
   1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:none;mso-border-insidev:
   none'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
    <td width=38 valign=top style='width:1.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>01<o:p></o:p></span></p>
    </td>
    <td width=227 valign=top style='width:6.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>Pertunjukkan
    Film<o:p></o:p></span></p>
    </td>
    <td width=38 valign=top style='width:1.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>07<o:p></o:p></span></p>
    </td>
    <td width=293 colspan=3 valign=top style='width:219.95pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>Permainan<span
    style='mso-spacerun:yes'>  </span>Bilyard<o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1;mso-row-margin-right:1.0cm'>
    <td width=38 valign=top style='width:1.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>02<o:p></o:p></span></p>
    </td>
    <td width=227 valign=top style='width:6.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>Pertunjukkan
    Kesenian dan Lainnya <o:p></o:p></span></p>
    </td>
    <td width=38 valign=top style='width:1.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>08<o:p></o:p></span></p>
    </td>
    <td width=255 valign=top style='width:191.6pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>Permainan
    Ketangkasan<o:p></o:p></span></p>
    </td>
    <td style='mso-cell-special:placeholder;border:none;padding:0cm 0cm 0cm 0cm'
    width=38 colspan=2><p class='MsoNormal'></td>
   </tr>
   <tr style='mso-yfti-irow:2;mso-row-margin-right:21.25pt'>
    <td width=38 valign=top style='width:1.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>03<o:p></o:p></span></p>
    </td>
    <td width=227 valign=top style='width:6.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>Pagelaran
    Musik dan Tari<o:p></o:p></span></p>
    </td>
    <td width=38 valign=top style='width:1.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>09<o:p></o:p></span></p>
    </td>
    <td width=265 colspan=2 valign=top style='width:198.7pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>Panti Pijat
    /Mandi Uap<o:p></o:p></span></p>
    </td>
    <td style='mso-cell-special:placeholder;border:none;padding:0cm 0cm 0cm 0cm'
    width=28><p class='MsoNormal'></td>
   </tr>
   <tr style='mso-yfti-irow:3;mso-row-margin-right:21.25pt'>
    <td width=38 valign=top style='width:1.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>04<o:p></o:p></span></p>
    </td>
    <td width=227 valign=top style='width:6.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>Diskotik<o:p></o:p></span></p>
    </td>
    <td width=38 valign=top style='width:1.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>10<o:p></o:p></span></p>
    </td>
    <td width=265 colspan=2 valign=top style='width:198.7pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>Pertandingan
    Olah</span><span style='font-size:8.0pt;mso-bidi-font-size:9.0pt;
    font-family:"Arial","sans-serif"'> R</span><span lang=IN style='font-size:
    8.0pt;mso-bidi-font-size:9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:
    IN'>aga<o:p></o:p></span></p>
    </td>
    <td style='mso-cell-special:placeholder;border:none;padding:0cm 0cm 0cm 0cm'
    width=28><p class='MsoNormal'></td>
   </tr>
   <tr style='mso-yfti-irow:4;mso-row-margin-right:21.25pt'>
    <td width=38 valign=top style='width:1.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>05<o:p></o:p></span></p>
    </td>
    <td width=227 valign=top style='width:6.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>Karaoke<o:p></o:p></span></p>
    </td>
    <td width=38 valign=top style='width:1.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>11<o:p></o:p></span></p>
    </td>
    <td width=265 colspan=2 valign=top style='width:198.7pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>Hiburan
    Lainnya yang ditetapkan oleh<o:p></o:p></span></p>
    </td>
    <td style='mso-cell-special:placeholder;border:none;padding:0cm 0cm 0cm 0cm'
    width=28><p class='MsoNormal'></td>
   </tr>
   <tr style='mso-yfti-irow:5;mso-yfti-lastrow:yes;mso-row-margin-right:21.25pt'>
    <td width=38 valign=top style='width:1.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>06<o:p></o:p></span></p>
    </td>
    <td width=227 valign=top style='width:6.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>Klub Malam<o:p></o:p></span></p>
    </td>
    <td width=38 valign=top style='width:1.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=265 colspan=2 valign=top style='width:198.7pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:8.0pt;mso-bidi-font-size:
    9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>Kepala Daerah yaitu:.................................................<o:p></o:p></span></p>
    </td>
    <td style='mso-cell-special:placeholder;border:none;padding:0cm 0cm 0cm 0cm'
    width=28><p class='MsoNormal'></td>
   </tr>
   <![if !supportMisalignedColumns]>
   <tr height=0>
    <td width=38 style='border:none'></td>
    <td width=227 style='border:none'></td>
    <td width=38 style='border:none'></td>
    <td width=255 style='border:none'></td>
    <td width=9 style='border:none'></td>
    <td width=28 style='border:none'></td>
   </tr>
   <![endif]>
  </table>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";
  mso-ansi-language:IN'>2 Tarif Fasilitas dan Waktu Pertunjukkan<o:p></o:p></span></p>
  <p class=MsoNormal style='tab-stops:11.25pt 27.0pt'><span lang=IN
  style='font-size:9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:
  IN'><span style='mso-spacerun:yes'>    </span>2.1 Untuk Pertunjukkan Film,</span><span
  lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif"'> </span><span
  lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:
  IN'>Kesenian dan Sejenisnya,</span><span lang=IN style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'> </span><span lang=IN style='font-size:
  9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:IN'>Pagelaran Musik
  dan Tari:<span style='mso-spacerun:yes'>          </span><o:p></o:p></span></p>
  <table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
   style='margin-left:28.1pt;border-collapse:collapse;border:none;mso-yfti-tbllook:
   1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:none;mso-border-insidev:
   none'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
    <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>a</span><span
    lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:
    IN'>.<span style='mso-spacerun:yes'>   </span>Jumlah Kursi<o:p></o:p></span></p>
    </td>
    <td width=21 valign=top style='width:16.1pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>=<o:p></o:p></span></p>
    </td>
    <td width=344 valign=top style='width:257.95pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";
    mso-ansi-language:IN'>......................... buah <o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1'>
    <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>b</span><span
    lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:
    IN'>.<span style='mso-spacerun:yes'>   </span>Jumlah Pertujukkan / Hari<o:p></o:p></span></p>
    </td>
    <td width=21 valign=top style='width:16.1pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>=<o:p></o:p></span></p>
    </td>
    <td width=344 valign=top style='width:257.95pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";
    mso-ansi-language:IN'><?= $data_jenishiburan['tblobyekhiburan_tarijmlhhari'] ?> kali</span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes'>
    <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>c</span><span
    lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:
    IN'>.<span style='mso-spacerun:yes'>   </span>Tarif<o:p></o:p></span></p>
    </td>
    <td width=21 valign=top style='width:16.1pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>=<o:p></o:p></span></p>
    </td>
    <td width=344 valign=top style='width:257.95pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";
    mso-ansi-language:IN'>Rp......................................<o:p></o:p></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal><span lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";
  mso-ansi-language:IN'><span style='mso-spacerun:yes'>    </span>2.</span><span
  style='font-size:9.0pt;font-family:"Arial","sans-serif"'>2</span><span
  lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:
  IN'> Bilyard dan Permainan Ketangkasan</span><span style='font-size:9.0pt;
  font-family:"Arial","sans-serif"'><o:p></o:p></span></p>
  <table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 width=646
   style='width:484.85pt;margin-left:28.1pt;border-collapse:collapse;
   border:none;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
   mso-border-insideh:none;mso-border-insidev:none'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
    <td width=236 valign=top style='width:176.8pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>a</span><span
    lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:
    IN'>.<span style='mso-spacerun:yes'>   </span>Jumlah Meja/Mesin</span><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p></o:p></span></p>
    </td>
    <td width=21 valign=top style='width:16.1pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>=<o:p></o:p></span></p>
    </td>
    <td width=389 valign=top style='width:291.95pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";
    mso-ansi-language:IN'><?= $data_jenishiburan['tblobyekhiburan_tarijmlhhari'] ?>  buah </span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1'>
    <td width=236 valign=top style='width:176.8pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>b</span><span
    lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:
    IN'>.<span style='mso-spacerun:yes'>   </span></span><span class=SpellE><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Tarif</span></span><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'> per <span
    class=SpellE>Meja</span>/Game<o:p></o:p></span></p>
    </td>
    <td width=21 valign=top style='width:16.1pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>=<o:p></o:p></span></p>
    </td>
    <td width=389 valign=top style='width:291.95pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";
    mso-ansi-language:IN'>Rp......................................<o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes'>
    <td width=236 valign=top style='width:176.8pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>c</span><span
    lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:
    IN'>.<span style='mso-spacerun:yes'>   </span>Tarif<o:p></o:p></span></p>
    </td>
    <td width=21 valign=top style='width:16.1pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>=<o:p></o:p></span></p>
    </td>
    <td width=389 valign=top style='width:291.95pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>………………...<span
    style='mso-spacerun:yes'>  </span>jam<o:p></o:p></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><span
  style='mso-spacerun:yes'>    </span>2.3 <span class=SpellE>Untuk</span> <span
  class=SpellE>Panti</span> <span class=SpellE>Pijat</span>, Karaoke, <span
  class=SpellE>Mandi</span> <span class=SpellE>Uap</span><o:p></o:p></span></p>
  <p class=MsoNormal style='tab-stops:9.0pt 17.25pt'><span style='font-size:
  9.0pt;font-family:"Arial","sans-serif"'><span style='mso-spacerun:yes'> 
  </span><o:p></o:p></span></p>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
   style='margin-left:31.25pt;border-collapse:collapse;border:none;mso-border-alt:
   solid black .5pt;mso-border-themecolor:text1;mso-yfti-tbllook:1184;
   mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:14.4pt'>
    <td width=54 style='width:40.5pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal align=center style='text-align:center;tab-stops:9.0pt 17.25pt'><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>No<o:p></o:p></span></p>
    </td>
    <td width=112 style='width:83.95pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal align=center style='text-align:center;tab-stops:9.0pt 17.25pt'><span
    class=SpellE><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Kelas</span></span><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'> <span
    class=SpellE>Kamar</span><o:p></o:p></span></p>
    </td>
    <td width=113 style='width:3.0cm;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal align=center style='text-align:center;tab-stops:9.0pt 17.25pt'><span
    class=SpellE><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Jlh</span></span><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'> <span
    class=SpellE>Kamar</span><o:p></o:p></span></p>
    </td>
    <td width=104 style='width:77.95pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal align=center style='text-align:center;tab-stops:9.0pt 17.25pt'><span
    class=SpellE><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Tarif</span></span><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'> (<span
    class=SpellE>Rp</span>)<o:p></o:p></span></p>
    </td>
    <td width=259 style='width:194.4pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal align=center style='text-align:center;tab-stops:9.0pt 17.25pt'><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Rata-rata <span
    class=SpellE>Tamu</span> per <span class=SpellE>Hari</span><o:p></o:p></span></p>
    </td>
   </tr>
   <?php $no=1; foreach($data_detailhiburan as $rowDetail): ?>
   <tr style='mso-yfti-irow:1;height:14.4pt'>
    <td width=54 style='width:40.5pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal style='tab-stops:9.0pt 17.25pt'><span style='font-size:
    9.0pt;font-family:"Arial","sans-serif"'><?= $no++?></span></p>
    </td>
    <td width=112 style='width:83.95pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.4pt'>
    <p class=MsoNormal style='tab-stops:9.0pt 17.25pt'><span style='font-size:
    9.0pt;font-family:"Arial","sans-serif"'><?= $rowDetail['tblobyekhiburandet_kelas'] ?></span></p>
    </td>
    <td width=113 style='width:3.0cm;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.4pt'>
    <p class=MsoNormal style='tab-stops:9.0pt 17.25pt'><span style='font-size:
    9.0pt;font-family:"Arial","sans-serif"'></span><span style="font-size:
    9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?= $rowDetail['tblobyekhiburan_jmlhkamar'] ?></span></p>
    </td>
    <td width=104 style='width:77.95pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.4pt'>
    <p class=MsoNormal style='tab-stops:9.0pt 17.25pt'><span style='font-size:
    9.0pt;font-family:"Arial","sans-serif"'><?= $rowDetail['tblobyekhiburandet_tarif'] ?></span></p>
    </td>
    <td width=259 style='width:194.4pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.4pt'>
    <p class=MsoNormal style='tab-stops:9.0pt 17.25pt'><span style='font-size:
    9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    </td>
   </tr>
   <?php endforeach; ?>
   <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes;height:14.4pt'>
    <td width=54 style='width:40.5pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt'>
    <p class=MsoNormal style='tab-stops:9.0pt 17.25pt'><span style='font-size:
    9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=112 style='width:83.95pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.4pt'>
    <p class=MsoNormal style='tab-stops:9.0pt 17.25pt'><span style='font-size:
    9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=113 style='width:3.0cm;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.4pt'>
    <p class=MsoNormal style='tab-stops:9.0pt 17.25pt'><span style='font-size:
    9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=104 style='width:77.95pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.4pt'>
    <p class=MsoNormal style='tab-stops:9.0pt 17.25pt'><span style='font-size:
    9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=259 style='width:194.4pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:14.4pt'>
    <p class=MsoNormal style='tab-stops:9.0pt 17.25pt'><span style='font-size:
    9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><span
  style='mso-spacerun:yes'>   </span><o:p></o:p></span></p>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><span
  style='mso-spacerun:yes'>   </span>2.4 <span class=SpellE>Untuk</span> <span
  class=SpellE>Diskotik</span>, <span class=SpellE>Klab</span> <span
  class=SpellE>Malam</span>, <span class=SpellE>Pertandingan</span> <span
  class=SpellE>Olah</span> Raga<o:p></o:p></span></p>
  <table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 width=643
   style='width:17.0cm;margin-left:28.1pt;border-collapse:collapse;border:none;
   mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:
   none;mso-border-insidev:none'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
    <td width=236 valign=top style='width:176.8pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>a</span><span
    lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:
    IN'>.<span style='mso-spacerun:yes'>   </span>Jumlah </span><span
    class=SpellE><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Pengunjung</span></span><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'> per <span
    class=SpellE>Hari</span><o:p></o:p></span></p>
    </td>
    <td width=21 valign=top style='width:16.1pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>=<o:p></o:p></span></p>
    </td>
    <td width=385 valign=top style='width:289.05pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";
    mso-ansi-language:IN'>......................... </span><span class=SpellE><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Orang</span></span><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
    <td width=236 valign=top style='width:176.8pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>b</span><span
    lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";mso-ansi-language:
    IN'>.<span style='mso-spacerun:yes'>   </span></span><span class=SpellE><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Tarif</span></span><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'> <span
    class=SpellE>atau</span> <span class=SpellE>Harga</span> <span
    class=SpellE>Tanda</span> <span class=SpellE>Masuk</span><o:p></o:p></span></p>
    </td>
    <td width=21 valign=top style='width:16.1pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>=<o:p></o:p></span></p>
    </td>
    <td width=385 valign=top style='width:289.05pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal><span lang=IN style='font-size:9.0pt;font-family:"Arial","sans-serif";
    mso-ansi-language:IN'>Rp......................................<o:p></o:p></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>3
  <span class=SpellE>Jumlah</span> <span class=SpellE>Pembayaran</span> <span
  class=SpellE>dan</span> <span class=SpellE>Setoran</span> yang <span
  class=SpellE>dilakukan</span>:<br style='mso-special-character:line-break'>
  <![if !supportLineBreakNewLine]><br style='mso-special-character:line-break'>
  <![endif]><o:p></o:p></span></p>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
   style='margin-left:31.25pt;border-collapse:collapse;border:none;mso-border-alt:
   solid black .5pt;mso-border-themecolor:text1;mso-yfti-tbllook:1184;
   mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:11.35pt'>
    <td width=54 style='width:40.5pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:11.35pt'>
    <p class=MsoNormal align=center style='text-align:center;tab-stops:9.0pt 17.25pt'><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>No<o:p></o:p></span></p>    </td>
    <td width=102 style='width:76.5pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:11.35pt'>
    <p class=MsoNormal align=center style='text-align:center;tab-stops:9.0pt 17.25pt 28.5pt center 57.6pt'><span
    class=SpellE><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Tanggal</span></span><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p></o:p></span></p>    </td>
    <td width=126 style='width:94.5pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:11.35pt'>
    <p class=MsoNormal align=center style='text-align:center;tab-stops:9.0pt 17.25pt'><span
    class=SpellE><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Masa</span></span><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'><o:p></o:p></span></p>    </td>
    <td width=180 style='width:135.0pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:11.35pt'>
    <p class=MsoNormal align=center style='text-align:center;tab-stops:9.0pt 17.25pt'><span
    class=SpellE><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Jumlah</span></span><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'> <span
    class=SpellE>Pembayaran</span> (<span class=SpellE>Rp</span>)<o:p></o:p></span></p>    </td>
    <td width=180 style='width:135.35pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:11.35pt'>
    <p class=MsoNormal align=center style='text-align:center;tab-stops:9.0pt 17.25pt'><span
    class=SpellE><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Setoran</span></span><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'>(<span
    class=SpellE>Rp</span>)<o:p></o:p></span></p>    </td>
   </tr>
   <?php $nomor=1; for($i=0;$i<=15;$i++): ?>
   <tr style='mso-yfti-irow:1;height:11.35pt'>
    <td width=54 style='width:40.5pt;border:solid black 1.0pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:
    text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;
    padding:0cm 5.4pt 0cm 5.4pt;height:11.35pt'>
    <p class=MsoNormal align=center style='text-align:center;tab-stops:9.0pt 17.25pt'><span
    style='font-size:9.0pt;font-family:"Arial","sans-serif"'><?= $nomor++ ?></span></p>    </td>
    <td width=102 style='width:76.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:11.35pt'>
    <p class=MsoNormal style='tab-stops:9.0pt 17.25pt'><span style='font-size:
    9.0pt;font-family:"Arial","sans-serif"'><?php if( isset($rowtetap[$i])):?><?= date('d/m/Y',strtotime($rowtetap[$i]['tbltransaksiketetapan_tglentrisptpd'])) ?><?php endif; ?></span></p>    </td>
    <td width=126 style='width:94.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:11.35pt'>
    <p class=MsoNormal style='tab-stops:9.0pt 17.25pt'><span style='font-size:
    9.0pt;font-family:"Arial","sans-serif"'><?php if( isset($rowtetap[$i])):?><?=  LokalIndonesia::getBulan($rowtetap[$i]['tbltransaksiketetapan_bulanpajak']); ?><?php endif; ?></span></p>    </td>
    <td width=180 style='width:135.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:11.35pt;text-align:right'>
    <p class=MsoNormal style='tab-stops:9.0pt 17.25pt'><span style='font-size:
    9.0pt;font-family:"Arial","sans-serif"'><?php if( isset($rowtetap[$i])):?><?= LokalIndonesia::ribuan($rowtetap[$i]['tbltransaksiketetapan_pajak'] ); ?><?php endif; ?></span></p>    </td>
    <td width=180 style='width:135.35pt;border-top:none;border-left:none;
    border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;
    height:11.35pt;text-align:right'>
    <p class=MsoNormal style='tab-stops:9.0pt 17.25pt'><span style='font-size:
    9.0pt;font-family:"Arial","sans-serif"'><?php if( isset($rowtetap[$i])):?><?= LokalIndonesia::ribuan($rowtetap[$i]['tbltransaksiketetapan_jumlahsetor'] ); ?><?php endif; ?></span></p>    </td>
   </tr>
   <?php endfor; ?>
  </table>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><br
  style='mso-special-character:line-break'>
  <![if !supportLineBreakNewLine]><br style='mso-special-character:line-break'>
  <![endif]><o:p></o:p></span></p>
  </td>
  <td width=33 style='width:24.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:42.5pt'>
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
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><br
  style='mso-special-character:line-break'>
  <![if !supportLineBreakNewLine]><br style='mso-special-character:line-break'>
  <![endif]><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3;mso-yfti-lastrow:yes;height:42.5pt'>
  <td width=699 valign=top style='width:524.6pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:42.5pt'>
  <table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 align=left
   style='border-collapse:collapse;border:none;mso-table-overlap:never;
   mso-yfti-tbllook:1184;mso-table-lspace:9.0pt;margin-left:6.75pt;mso-table-rspace:
   9.0pt;margin-right:6.75pt;mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:
   page;mso-table-left:65.75pt;mso-table-top:6.55pt;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
   mso-border-insideh:none;mso-border-insidev:none'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
    <td width=349 valign=top style='width:261.95pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:
    center;line-height:150%'><span class=SpellE><span style='font-size:9.0pt;
    line-height:150%;font-family:"Arial","sans-serif"'>Mengetahui</span></span><span
    style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p></o:p></span></p>
    <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:
    center;line-height:150%'><span class=SpellE><span style='font-size:9.0pt;
    line-height:150%;font-family:"Arial","sans-serif"'>Kepala</span></span><span
    style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'>…………………<span
    class=SpellE>Pendaftaran</span> <span class=SpellE>dan</span> <span
    class=SpellE>Pendataaan</span><o:p></o:p></span></p>
    <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
    style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
    style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:
    center;line-height:150%'><span style='font-size:9.0pt;line-height:150%;
    font-family:"Arial","sans-serif"'>(……………………………………..)<o:p></o:p></span></p>
    <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
    style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><span
    style='mso-spacerun:yes'>                     </span>NIP.<o:p></o:p></span></p>
    </td>
    <td width=265 valign=top style='width:198.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:
    center;line-height:150%'><span class=SpellE><span style='font-size:9.0pt;
    line-height:150%;font-family:"Arial","sans-serif"'>Dibuat</span></span><span
    style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'> <span
    class=SpellE>Oleh</span>:<o:p></o:p></span></p>
    <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:
    center;line-height:150%'><span class=SpellE><span style='font-size:9.0pt;
    line-height:150%;font-family:"Arial","sans-serif"'>Kepala</span></span><span
    style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'>………………<span
    class=SpellE>Pendataan</span><o:p></o:p></span></p>
    <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:
    center;line-height:150%'><span style='font-size:9.0pt;line-height:150%;
    font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:
    center;line-height:150%'><span style='font-size:9.0pt;line-height:150%;
    font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
    <p class=MsoNormal align=center style='margin-right:14.15pt;text-align:
    center;line-height:150%'><span style='font-size:9.0pt;line-height:150%;
    font-family:"Arial","sans-serif"'>(……………………………………)<o:p></o:p></span></p>
    <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
    style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><span
    style='mso-spacerun:yes'>         </span>NIP.<o:p></o:p></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal><o:p></o:p></p>
  </td>
  <td width=33 style='width:24.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:42.5pt'>
  <p class=MsoNormal style='margin-right:14.15pt;line-height:150%'><span
  style='font-size:9.0pt;line-height:150%;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal><span style='font-size:9.0pt;font-family:"Arial","sans-serif"'><span
style='mso-spacerun:yes'> </span>MODEL : DPD-04B<o:p></o:p></span></p>

</div>

</body>

</html>

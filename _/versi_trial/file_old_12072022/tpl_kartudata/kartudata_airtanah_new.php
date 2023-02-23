<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">
<?php Yii::import('ext.LokalIndonesia'); ?>
<?php //var_dump($data['idobyek']); Yii::app()->end(); ?>
<?php $objekpajak = Yii::app()->db->createCommand('SELECT *
  FROM
  tbltransaksiketetapan
  LEFT JOIN tblsetoran ON tblsetoran.tbltransaksiketetapan_id = tbltransaksiketetapan.tbltransaksiketetapan_id
  LEFT JOIN tblpendataanairtanah ON tblpendataanairtanah.tbltransaksiketetapan_id = tbltransaksiketetapan.tbltransaksiketetapan_id
  WHERE tbltransaksiketetapan.tblobyek_id='.$data['idobyek']
  )->queryAll();
$rows=array();
foreach ($objekpajak as $rowdata) {
  $rows[] = $rowdata;
  $transttp_id = (int)$rowdata['tbltransaksiketetapan_id'];
  $omzettotal = $rowdata['tbltransaksiketetapan_pajak'];
  $kelas = $rowdata['tblpendataanairtanah_kelas'];
  $meterawal = $rowdata['tblpendataanairtanah_meterawal'];
  $meterakhir = $rowdata['tblpendataanairtanah_meterakhir'];
  $volume = $rowdata['tblpendataanairtanah_volume'];
}
$detailhitung = Yii::app()->db->createCommand('SELECT *
  FROM
  tblpendataanairtanahdet
  WHERE tbltransaksiketetapan_id='.$transttp_id
  )->queryAll();
 $rowshitung=array();$ke=1;
foreach ($detailhitung as $rowhit) {
  $rowshitung[$ke] = $rowhit; $ke++;
}
?>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 12">
<meta name=Originator content="Microsoft Word 12">
<link rel=File-List href="airtanah_files/filelist.xml">
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>computa</o:Author>
  <o:LastAuthor>computa</o:LastAuthor>
  <o:Revision>114</o:Revision>
  <o:TotalTime>84</o:TotalTime>
  <o:Created>2016-08-29T13:52:00Z</o:Created>
  <o:LastSaved>2016-08-30T01:55:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>347</o:Words>
  <o:Characters>1962</o:Characters>
  <o:Lines>16</o:Lines>
  <o:Paragraphs>4</o:Paragraphs>
  <o:CharactersWithSpaces>2305</o:CharactersWithSpaces>
  <o:Version>12.00</o:Version>
 </o:DocumentProperties>
</xml><![endif]-->
<link rel=themeData href="airtanah_files/themedata.thmx">
<link rel=colorSchemeMapping href="airtanah_files/colorschememapping.xml">
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:Zoom>80</w:Zoom>
  <w:TrackMoves/>
  <w:TrackFormatting/>
  <w:PunctuationKerning/>
  <w:DrawingGridHorizontalSpacing>5.5 pt</w:DrawingGridHorizontalSpacing>
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
  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>
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
.MsoChpDefault
  {mso-style-type:export-only;
  mso-default-props:yes;
  font-size:10.0pt;
  mso-ansi-font-size:10.0pt;
  mso-bidi-font-size:10.0pt;
  mso-ascii-font-family:Calibri;
  mso-ascii-theme-font:minor-latin;
  mso-fareast-font-family:Calibri;
  mso-fareast-theme-font:minor-latin;
  mso-hansi-font-family:Calibri;
  mso-hansi-theme-font:minor-latin;
  mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi;}
 /* Page Definitions */
 @page
  {mso-gutter-position:top;}
@page Section1
  {size:792.1pt 1071.05pt;
  margin:36.0pt 36.0pt 36.0pt 36.0pt;
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
  font-size:10.0pt;
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
 <o:shapedefaults v:ext="edit" spidmax="1026"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=EN-US style='tab-interval:36.0pt'>

<div class=Section1>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width="100%"
 style='width:100.34%;border-collapse:collapse;border:none;mso-border-alt:dotted windowtext .5pt;
 mso-yfti-tbllook:1184;mso-padding-alt:1.4pt 5.4pt 1.4pt 5.4pt;mso-border-insideh:
 .5pt dotted windowtext;mso-border-insidev:.5pt dotted windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width="100%" colspan=28 valign=top style='width:100.0%;border:dotted windowtext 1.0pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:14.0pt;font-family:"Arial","sans-serif"'>KARTU DATA PAJAK
  AIR TANAH<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-family:"Arial","sans-serif"'>Tahun Pajak 2016</span></b><span
  style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width="18%" colspan=3 valign=top style='width:18.16%;border:none;
  border-left:dotted windowtext 1.0pt;mso-border-top-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>N.P.W.P.D
<o:p></o:p></span></p>
  </td>
  <td width="81%" colspan=25 valign=top style='width:81.84%;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-top-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>: <?php echo $data['surat']['tblsubyek_npwpd'] ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2'>
  <td width="18%" colspan=3 valign=top style='width:18.16%;border:none;
  border-left:dotted windowtext 1.0pt;mso-border-left-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>NAMA PEMILIK/WP
<o:p></o:p></span></p>
  </td>
  <td width="81%" colspan=25 valign=top style='width:81.84%;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>: <?php echo $data['surat']['tblsubyek_nama'] ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3'>
  <td width="18%" colspan=3 valign=top style='width:18.16%;border:none;
  border-left:dotted windowtext 1.0pt;mso-border-left-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>NOMOR OBYEK PAJAK<o:p></o:p></span></p>
  </td>
  <td width="81%" colspan=25 valign=top style='width:81.84%;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>: <?php echo $data['surat']['tblobyek_npwpd'] ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4'>
  <td width="18%" colspan=3 valign=top style='width:18.16%;border:none;
  border-left:dotted windowtext 1.0pt;mso-border-left-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>NAMA OBYEK PAJAK<o:p></o:p></span></p>
  </td>
  <td width="81%" colspan=25 valign=top style='width:81.84%;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>: <?php echo $data['surat']['tblobyek_nama'] ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4'>
  <td width="18%" colspan=3 valign=top style='width:18.16%;border:none;
  border-left:dotted windowtext 1.0pt;mso-border-left-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>ALAMAT BADAN 
        <o:p></o:p></span></p></td>
  <td width="81%" colspan=25 valign=top style='width:81.84%;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>: <?php echo $data['surat']['tblobyek_alamat'] ?>&nbsp; <?php echo $data['surat']['refkelurahan_nama'] ?> &nbsp; <?php echo $data['surat']['refkecamatan_nama'] ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:5'>
  <td width="18%" colspan=3 valign=top style='width:18.16%;border-top:none;
  border-left:dotted windowtext 1.0pt;border-bottom:dotted windowtext 1.0pt;
  border-right:none;mso-border-left-alt:dotted windowtext .5pt;mso-border-bottom-alt:
  dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>ALAMAT
  PEMILIK<o:p></o:p></span></p>
  </td>
  <td width="81%" colspan=25 valign=top style='width:81.84%;border-top:none;
  border-left:none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-bottom-alt:dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>: <?php echo $data['surat']['tblsubyek_alamat'] ?> &nbsp; <?php echo $data['surat']['refkelurahan_nama'] ?> &nbsp; <?php echo $data['surat']['refkecamatan_nama'] ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:6'>
  <td width="18%" colspan=3 valign=top style='width:18.16%;border:none;
  border-left:dotted windowtext 1.0pt;mso-border-top-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>A.
  Ayat Penerimaan Pajak<o:p></o:p></span></p>
  </td>
  <td width="32%" colspan=10 valign=top style='width:32.56%;border:none;
  mso-border-top-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>:<?php echo $data['surat']['tblmasterrekening_kode'] ?> (<?php echo $data['surat']['tblmasterrekening_nama'] ?>)<o:p></o:p></span></p>
  </td>
  <td width="15%" colspan=10 valign=top style='width:15.84%;border:none;
  mso-border-top-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>E.
  Nomor Surat Teguran SPTPD<o:p></o:p></span></p>
  </td>
  <td width="33%" colspan=5 valign=top style='width:33.44%;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-top-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>: <?php echo "" ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:7'>
  <td width="18%" colspan=3 valign=top style='width:18.16%;border:none;
  border-left:dotted windowtext 1.0pt;mso-border-left-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>B.
  Nomor SPTPD Yang dikirim<o:p></o:p></span></p>
  </td>
  <td width="32%" colspan=10 valign=top style='width:32.56%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>: <?php echo $data['surat']['tblobyek_nomorsptpd'] ?><o:p></o:p></span></p>
  </td>
  <td width="15%" colspan=10 valign=top style='width:15.84%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>F.
  Tanggal Surat Teguran SPTPD<o:p></o:p></span></p>
  </td>
  <td width="33%" colspan=5 valign=top style='width:33.44%;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>: <?php echo "" ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:8'>
  <td width="18%" colspan=3 valign=top style='width:18.16%;border:none;
  border-left:dotted windowtext 1.0pt;mso-border-left-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>C.
  Tanggal Kirim SPTPD<o:p></o:p></span></p>
  </td>
  <td width="32%" colspan=10 valign=top style='width:32.56%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>: <?php echo LokalIndonesia::TanggalUmum($data['surat']['tbltransaksiketetapan_tglentrisptpd']) ?><o:p></o:p></span></p>
  </td>
  <td width="15%" colspan=10 valign=top style='width:15.84%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>G.
  Terlambat Memasukan SPTPD<o:p></o:p></span></p>
  </td>
  <td width="33%" colspan=5 valign=top style='width:33.44%;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>: <?php echo "" ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:9'>
  <td width="18%" colspan=3 valign=top style='width:18.16%;border:none;
  border-left:dotted windowtext 1.0pt;mso-border-left-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>D.
  Tanggal Batas Pengembalian<o:p></o:p></span></p>
  </td>
  <td width="32%" colspan=10 valign=top style='width:32.56%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>: <?php echo $data['surat']['tbltransaksiketetapan_tgljatuhtempo'] != "" ? LokalIndonesia::TanggalUmum($data['surat']['tbltransaksiketetapan_tgljatuhtempo']) : "" ?><o:p></o:p></span></p>
  </td>
  <td width="15%" colspan=10 valign=top style='width:15.84%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>H.</span><span
  style='mso-bidi-font-family:"Times New Roman"'> </span><span
  style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Tarif Pajak Sesuai
  Perda</span><span style='mso-bidi-font-family:"Times New Roman"'><o:p></o:p></span></p>
  </td>
  <td width="33%" colspan=5 valign=top style='width:33.44%;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='mso-bidi-font-family:"Times New Roman"'></span><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>:</span><span style='mso-bidi-font-family:
  "Times New Roman"'> </span><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'></span><span
  style='mso-bidi-font-family:"Times New Roman"'> </span><span
  style='font-size:10.0pt;font-family:"Arial","sans-serif"'><?php echo $data['surat']['tblmasterrekening_tarif']*100 ?>%</span><span style='mso-bidi-font-family:"Times New Roman"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:10'>
  <td width="100%" colspan=28 valign=top style='width:100.0%;border:dotted windowtext 1.0pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><!-- <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>OBJEK
  PAJAK AIR BAWAH TANAH :<o:p></o:p></span> --></p>
  </td>
 </tr>
<!--  <tr style='mso-yfti-irow:11'>
  <td width="18%" colspan=3 style='width:18.16%;border:none;border-left:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-top-alt:dotted windowtext .5pt;
  mso-border-left-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>1.
  Kelas / Golongan<o:p></o:p></span></p>
  </td>
  <td width="1%" style='width:1.72%;border:none;mso-border-top-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>:<o:p></o:p></span></p>
  </td>
  <td width="13%" colspan=4 valign=top style='width:13.44%;border:none;
  mso-border-top-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?php echo $kelas ?><o:p></o:p></span></p>
  </td>
  <td width="13%" colspan=4 valign=top style='width:13.86%;border:none;
  mso-border-top-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="6%" colspan=4 valign=top style='width:6.78%;border:none;
  mso-border-top-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="46%" colspan=12 valign=top style='width:46.04%;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-top-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Data
  Perhitungan Nilai Perolehan Air Tanah<o:p></o:p></span></p>
  </td>
 </tr> -->
<!--  <tr style='mso-yfti-irow:12'>
  <td width="18%" colspan=3 valign=top style='width:18.16%;border:none;
  border-left:dotted windowtext 1.0pt;mso-border-left-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>2.
  Nilai Meter Awal<o:p></o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.72%;border:none;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>: <o:p></o:p></span></p>
  </td>
  <td width="13%" colspan=4 valign=top style='width:13.44%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?php echo $meterawal ?><o:p></o:p></span></p>
  </td>
  <td width="13%" colspan=4 valign=top style='width:13.86%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="6%" colspan=4 valign=top style='width:6.78%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>I<o:p></o:p></span></p>
  </td>
  <td width="9%" colspan=4 valign=top style='width:9.16%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?= $rowshitung[1]['tblpendataanairtanahdet_vol']?> M<sup>3</sup> X Rp.<o:p></o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.1%;border:none;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="6%" colspan=3 valign=top style='width:6.88%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><?= $rowshitung[1]['tblpendataanairtanahdet_hargasekmen']?>
  =<o:p></o:p></span></p>
  </td>
  <td width="6%" valign=top style='width:6.8%;border:none;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><?= $rowshitung[1]['tblpendataanairtanahdet_nparupiah']?><o:p></o:p></span></p>
  </td>
  <td width="10%" colspan=2 valign=top style='width:10.94%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="11%" valign=top style='width:11.16%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr> -->
<!--  <tr style='mso-yfti-irow:13'>
  <td width="18%" colspan=3 valign=top style='width:18.16%;border:none;
  border-left:dotted windowtext 1.0pt;mso-border-left-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>3.
  Nilai Meter Akhir<o:p></o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.72%;border:none;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>: <o:p></o:p></span></p>
  </td>
  <td width="13%" colspan=4 valign=top style='width:13.44%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?php echo $meterakhir ?><o:p></o:p></span></p>
  </td>
  <td width="13%" colspan=4 valign=top style='width:13.86%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="6%" colspan=4 valign=top style='width:6.78%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>II<o:p></o:p></span></p>
  </td>
  <td width="9%" colspan=4 valign=top style='width:9.16%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?= $rowshitung[2]['tblpendataanairtanahdet_vol']?> M<sup>3</sup> X Rp.<o:p></o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.1%;border:none;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="6%" colspan=3 valign=top style='width:6.88%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><?= $rowshitung[2]['tblpendataanairtanahdet_hargasekmen']?>
  =<o:p></o:p></span></p>
  </td>
  <td width="6%" valign=top style='width:6.8%;border:none;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><?= $rowshitung[2]['tblpendataanairtanahdet_nparupiah']?><o:p></o:p></span></p>
  </td>
  <td width="10%" colspan=2 valign=top style='width:10.94%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="11%" valign=top style='width:11.16%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr> -->
<!--  <tr style='mso-yfti-irow:14'>
  <td width="18%" colspan=3 valign=top style='width:18.16%;border:none;
  border-left:dotted windowtext 1.0pt;mso-border-left-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>4.
  Volume Air yang Digunakan<o:p></o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.72%;border:none;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>: <o:p></o:p></span></p>
  </td>
  <td width="13%" colspan=4 valign=top style='width:13.44%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?php echo $volume ?><o:p></o:p></span></p>
  </td>
  <td width="13%" colspan=4 valign=top style='width:13.86%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="6%" colspan=4 valign=top style='width:6.78%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>III<o:p></o:p></span></p>
  </td>
  <td width="9%" colspan=4 valign=top style='width:9.16%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?= $rowshitung[3]['tblpendataanairtanahdet_vol']?> M<sup>3</sup> X Rp.<o:p></o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.1%;border:none;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="6%" colspan=3 valign=top style='width:6.88%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><?= $rowshitung[3]['tblpendataanairtanahdet_hargasekmen']?>
  =<o:p></o:p></span></p>
  </td>
  <td width="6%" valign=top style='width:6.8%;border:none;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><?= $rowshitung[3]['tblpendataanairtanahdet_nparupiah']?><o:p></o:p></span></p>
  </td>
  <td width="10%" colspan=2 valign=top style='width:10.94%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="11%" valign=top style='width:11.16%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr> -->
<!--  <tr style='mso-yfti-irow:15'>
  <td width="47%" colspan=12 valign=top style='width:47.18%;border:none;
  border-left:dotted windowtext 1.0pt;mso-border-left-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p></o:p></span></p>
  </td>
  <td width="6%" colspan=4 valign=top style='width:6.78%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>IV<o:p></o:p></span></p>
  </td>
  <td width="9%" colspan=4 valign=top style='width:9.16%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?= $rowshitung[4]['tblpendataanairtanahdet_vol']?> M<sup>3</sup> X Rp.<o:p></o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.1%;border:none;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="6%" colspan=3 valign=top style='width:6.88%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><?= $rowshitung[4]['tblpendataanairtanahdet_hargasekmen']?>
  =<o:p></o:p></span></p>
  </td>
  <td width="6%" valign=top style='width:6.8%;border:none;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><?= $rowshitung[4]['tblpendataanairtanahdet_nparupiah']?><o:p></o:p></span></p>
  </td>
  <td width="10%" valign=top style='width:10.62%;border:none;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="11%" colspan=2 valign=top style='width:11.48%;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr> -->
<!--  <tr style='mso-yfti-irow:16'>
  <td width="47%" colspan=12 valign=top style='width:47.18%;border:none;
  border-left:dotted windowtext 1.0pt;mso-border-left-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'></td>
  <td width="6%" colspan=4 valign=top style='width:6.78%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>V<o:p></o:p></span></p>
  </td>
  <td width="9%" colspan=4 valign=top style='width:9.16%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?= $rowshitung[5]['tblpendataanairtanahdet_vol']?> M<sup>3</sup> X Rp.<o:p></o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.1%;border:none;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="6%" colspan=3 valign=top style='width:6.88%;border:none;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><?= $rowshitung[5]['tblpendataanairtanahdet_hargasekmen']?>
  =<o:p></o:p></span></p>
  </td>
  <td width="6%" valign=top style='width:6.8%;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-bottom-alt:solid windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><?= $rowshitung[5]['tblpendataanairtanahdet_nparupiah']?><o:p></o:p></span></p>
  </td>
  <td width="10%" valign=top style='width:10.62%;border:none;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="11%" colspan=2 valign=top style='width:11.48%;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr> -->
<!--  <tr style='mso-yfti-irow:17'>
  <td width="47%" colspan=12 valign=top style='width:47.18%;border-top:none;
  border-left:dotted windowtext 1.0pt;border-bottom:dotted windowtext 1.0pt;
  border-right:none;mso-border-left-alt:dotted windowtext .5pt;mso-border-bottom-alt:
  dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'></td>
  <td width="18%" colspan=10 valign=top style='width:18.84%;border:none;
  border-bottom:dotted windowtext 1.0pt;mso-border-bottom-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Jumlah
  Nilai Perolehan Air Tanah<o:p></o:p></span></p>
  </td>
  <td width="5%" colspan=2 valign=top style='width:5.08%;border:none;
  border-bottom:dotted windowtext 1.0pt;mso-border-bottom-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Rp.<o:p></o:p></span></p>
  </td>
  <td width="6%" valign=top style='width:6.8%;border:none;border-bottom:dotted windowtext 1.0pt;
  mso-border-bottom-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><?php echo LokalIndonesia::ribuan($omzettotal); ?><o:p></o:p></span></p>
  </td>
  <td width="10%" valign=top style='width:10.62%;border:none;border-bottom:
  dotted windowtext 1.0pt;mso-border-bottom-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="11%" colspan=2 valign=top style='width:11.48%;border-top:none;
  border-left:none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-bottom-alt:dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr> -->
 <tr style='mso-yfti-irow:18'>
  <td width="2%" style='width:2.42%;border:dotted windowtext 1.0pt;border-top:
  none;mso-border-top-alt:dotted windowtext .5pt;mso-border-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>No.<o:p></o:p></span></p>
  </td>
  <td width="10%" style='width:10.64%;border-top:none;border-left:none;
  border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Tanggal Terima SPTPD<o:p></o:p></span></p>
  </td>
  <td width="11%" colspan=4 style='width:11.58%;border-top:none;border-left:
  none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Masa Pajak<o:p></o:p></span></p>
  </td>
  <td width="5%" colspan=2 style='width:5.1%;border-top:none;border-left:none;border-bottom:
  dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;mso-border-top-alt:
  dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;mso-border-alt:
  dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Volume Air<o:p></o:p></span></p>
  </td>
  <td width="10%" colspan=2 valign=top style='width:10.2%;border-top:none;
  border-left:none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Nilai Perolehan Air Bawah Tanah<o:p></o:p></span></p>
  </td>
  <td width="6%" colspan=4 style='width:6.72%;border-top:none;border-left:none;
  border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Tanggal Penetapan<o:p></o:p></span></p>
  </td>
  <td width="6%" colspan=2 style='width:6.76%;border-top:none;border-left:none;
  border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>

  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>No. Kohir<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Ketetapan<o:p></o:p></span></p>
  </td>
  <td width="9%" colspan=3 style='width:9.24%;border-top:none;border-left:none;
  border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Jumlah<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Ketetapan<o:p></o:p></span></p>
  </td>
  <td width="8%" colspan=5 style='width:8.44%;border-top:none;border-left:none;
  border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Tanggal<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Penyetoran<o:p></o:p></span></p>
  </td>
  <td width="6%" style='width:6.8%;border-top:none;border-left:none;border-bottom:
  dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;mso-border-left-alt:
  dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;mso-border-bottom-alt:
  dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>No. Bukti<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Penyetoran<o:p></o:p></span></p>
  </td>
  <td width="22%" colspan=3 style='width:22.1%;border-top:none;border-left:
  none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Jumlah<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Penyetoran<o:p></o:p></span></p>
  </td>
 </tr>
 <?php $no = 1; for ($i=0; $i <= 11; $i++): ?>
 <tr style='mso-yfti-irow:19'>
  <td width="2%" style='width:2.42%;border-top:none;border-left:dotted windowtext 1.0pt;
  border-bottom:none;border-right:dotted windowtext 1.0pt;mso-border-top-alt:
  dotted windowtext .5pt;mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:
  dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?php echo $no++; ?>.<o:p></o:p></span></p>
  </td>
  <td width="10%" style='width:10.64%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?php if (isset($rows[$i])): ?><?php if (strtotime($rows[$i]['tbltransaksiketetapan_tglterimasptpd'])): ?><?php echo date("d/m/Y", strtotime($rows[$i]['tbltransaksiketetapan_tglterimasptpd'])); ?><?php else: ?>00/00/0000<?php endif ?><?php endif ?><o:p></o:p></span></p>
  </td>
  <td width="11%" colspan=4 style='width:11.58%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?php if (isset($rows[$i])): ?><?php if (strtotime($rows[$i]['tbltransaksiketetapan_masaawal'])): ?><?php echo date("d/m/Y", strtotime($rows[$i]['tbltransaksiketetapan_masaawal'])).' s/d '; ?><?php else: ?>00/00/0000 s/d <?php endif ?><?php endif ?><?php if (isset($rows[$i])): ?><?php if (strtotime($rows[$i]['tbltransaksiketetapan_masaakhir'])): ?><?php echo date("d/m/Y", strtotime($rows[$i]['tbltransaksiketetapan_masaakhir'])); ?><?php else: ?>00/00/0000<?php endif ?><?php endif ?><o:p></o:p></span></p>
  </td>
  <td width="5%" colspan=2 style='width:5.1%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?php if (isset($rows[$i])): ?><?php if (isset($rows[$i]['tblpendataanairtanah_volume'])): ?><?php echo $rows[$i]['tblpendataanairtanah_volume']; ?><?php else: ?>---<?php endif ?><?php endif ?><o:p></o:p></span></p>
  </td>
  <td width="10%" colspan=2 valign=top style='width:10.2%;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-top-alt:dotted windowtext .5pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-top-alt:dotted windowtext .5pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><!-- $000.000.000.00 --><?php if (isset($rows[$i])): ?><?php if (isset($rows[$i]['tbltransaksiketetapan_pajak'])): ?><?php echo LokalIndonesia::ribuan($rows[$i]['tbltransaksiketetapan_pajak']); ?><?php else: ?>-------<?php endif ?><?php endif ?><o:p></o:p></span></p>
  </td>
  <td width="6%" colspan=4 style='width:6.72%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?php if (isset($rows[$i])): ?><?php if (strtotime($rows[$i]['tbltransaksiketetapan_tglketetapan'])): ?><?php echo date("d/m/Y", strtotime($rows[$i]['tbltransaksiketetapan_tglketetapan'])); ?><?php else: ?>00-00-0000<?php endif ?><?php endif ?><o:p></o:p></span></p>
  </td>
  <td width="6%" colspan=2 style='width:6.76%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?php if (isset($rows[$i])): ?><?php if ($rows[$i]['tbltransaksiketetapan_nokohirketetapan']): ?><?php echo $rows[$i]['tbltransaksiketetapan_nokohirketetapan']; ?><?php else: ?>00000<?php endif ?><?php endif ?><o:p></o:p></span></p>
  </td>
  <td width="9%" colspan=3 style='width:9.24%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?php if (isset($rows[$i])): ?><?php if (isset($rows[$i]['tbltransaksiketetapan_pajakketetapan'])): ?><?php echo LokalIndonesia::ribuan($rows[$i]['tbltransaksiketetapan_pajakketetapan']); ?><?php else: ?>0.00<?php endif ?><?php endif ?><o:p></o:p></span></p>
  </td>
  <td width="8%" colspan=5 style='width:8.44%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?php if (isset($rows[$i])): ?><?php if (strtotime($rows[$i]['tbltransaksiketetapan_tglsetor'])): ?><?php echo date("d/m/Y", strtotime($rows[$i]['tbltransaksiketetapan_tglsetor'])); ?><?php else: ?>-<?php endif ?><?php endif ?><o:p></o:p></span></p>
  </td>
  <td width="6%" style='width:6.8%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?php if (isset($rows[$i])): ?><?php if (isset($rows[$i]['tblsetoran_nomorsetor'])): ?><?php echo $rows[$i]['tblsetoran_nomorsetor']; ?><?php else: ?>0<?php endif ?><?php endif ?><o:p></o:p></span></p>
  </td>
  <td width="22%" colspan=3 style='width:22.1%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><?php if (isset($rows[$i])): ?><?php if (isset($rows[$i]['tbltransaksiketetapan_jumlahsetor'])): ?><?php echo LokalIndonesia::ribuan($rows[$i]['tbltransaksiketetapan_jumlahsetor']); ?><?php else: ?>0<?php endif ?><?php endif ?><o:p></o:p></span></p>
  </td>
 </tr>
 <?php endfor ?>
 <tr style='mso-yfti-irow:30'>
  <td width="2%" style='width:2.42%;border-top:none;border-left:dotted windowtext 1.0pt;
  border-bottom:none;border-right:dotted windowtext 1.0pt;mso-border-left-alt:
  dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="10%" style='width:10.64%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="11%" colspan=4 style='width:11.58%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="5%" colspan=2 style='width:5.1%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="10%" colspan=2 valign=top style='width:10.2%;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="6%" colspan=4 style='width:6.72%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="6%" colspan=2 style='width:6.76%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="9%" colspan=3 style='width:9.24%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="8%" colspan=5 style='width:8.44%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="6%" style='width:6.8%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="22%" colspan=3 style='width:22.1%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:32'>
  <td width="100%" colspan=28 valign=top style='width:100.0%;border:dotted windowtext 1.0pt;
  border-top:none;mso-border-top-alt:dotted windowtext .5pt;mso-border-alt:
  dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Hasil
  Pemeriksaan :<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:33'>
  <td width="2%" style='width:2.42%;border:dotted windowtext 1.0pt;border-top:
  none;mso-border-top-alt:dotted windowtext .5pt;mso-border-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>No.<o:p></o:p></span></p>
  </td>
  <td width="10%" style='width:10.64%;border-top:none;border-left:none;
  border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Masa Pajak<o:p></o:p></span></p>
  </td>
  <td width="11%" colspan=4 style='width:11.58%;border-top:none;border-left:
  none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Nilai Perolehan Hasil Pemeriksaan<o:p></o:p></span></p>
  </td>
  <td width="19%" colspan=4 style='width:19.84%;border-top:none;border-left:
  none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Nilai Perolehan Pajak Hotel yang dilaporkan
  WP<o:p></o:p></span></p>
  </td>
  <td width="6%" colspan=4 style='width:6.68%;border-top:none;border-left:none;
  border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Selisih Nilai Perolehan<o:p></o:p></span></p>
  </td>
  <td width="6%" colspan=3 style='width:6.9%;border-top:none;border-left:none;
  border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Jumlah Ketetapan<o:p></o:p></span></p>
  </td>
  <td width="8%" colspan=6 style='width:8.5%;border-top:none;border-left:none;
  border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Jumlah Penyetoran<o:p></o:p></span></p>
  </td>
  <td width="33%" colspan=5 style='width:33.44%;border-top:none;border-left:
  none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Jumlah Hutang Pajak yang<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Harus Disetorkan<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:34;height:39.25pt'>
  <td width="2%" style='width:2.42%;border:dotted windowtext 1.0pt;border-top:
  none;mso-border-top-alt:dotted windowtext .5pt;mso-border-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt;height:39.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><span style='mso-spacerun:yes'> </span><o:p></o:p></span></p>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10.0pt;line-height:115%;font-family:"Arial","sans-serif"'><o:p></o:p></span></p>
  </td>
  <td width="10%" style='width:10.64%;border-top:none;border-left:none;
  border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt;
  height:39.25pt'></td>
  <td width="11%" colspan=4 style='width:11.58%;border-top:none;border-left:
  none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt;
  height:39.25pt'></td>
  <td width="19%" colspan=4 style='width:19.84%;border-top:none;border-left:
  none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt;
  height:39.25pt'></td>
  <td width="6%" colspan=4 style='width:6.68%;border-top:none;border-left:none;
  border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt;
  height:39.25pt'></td>
  <td width="6%" colspan=3 style='width:6.9%;border-top:none;border-left:none;
  border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt;
  height:39.25pt'></td>
  <td width="8%" colspan=6 style='width:8.5%;border-top:none;border-left:none;
  border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt;
  height:39.25pt'></td>
  <td width="33%" colspan=5 style='width:33.44%;border-top:none;border-left:
  none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt;
  height:39.25pt'></td>
 </tr>
 <tr style='mso-yfti-irow:35'>
  <td width="22%" colspan=5 style='width:22.38%;border-top:none;border-left:
  dotted windowtext 1.0pt;border-bottom:none;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-top-alt:dotted windowtext .5pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Disetujui,<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>KEPALA BIDANG PENDATAAN, PENETAPAN, DAN PENAGIHAN</span><span
  style='font-size:10.0pt;font-family:"Arial","sans-serif";mso-fareast-font-family:
  "Times New Roman"'><o:p></o:p></span></p>
  </td>
  <td width="24%" colspan=6 style='width:24.28%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";mso-fareast-font-family:"Times New Roman"'>Disetujui,<br>
  KEPALA BIDANG PERBENDAHARAAN</span><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'><o:p></o:p></span></p>
  </td>
  <td width="14%" colspan=7 style='width:14.18%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>KEPALA SEKSI PELAPORAN<o:p></o:p></span></p>
  </td>
  <td width="39%" colspan=10 style='width:39.18%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-top-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  mso-fareast-font-family:"Times New Roman"'>Petugas Operator Komputer,<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:36;height:53.9pt'>
  <td width="22%" colspan=5 valign=top style='width:22.38%;border-top:none;
  border-left:dotted windowtext 1.0pt;border-bottom:none;border-right:dotted windowtext 1.0pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt;height:53.9pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="24%" colspan=6 valign=top style='width:24.28%;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt;height:53.9pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="14%" colspan=7 valign=top style='width:14.18%;border:none;
  border-right:dotted windowtext 1.0pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt;height:53.9pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="39%" colspan=10 style='width:39.18%;border:none;border-right:dotted windowtext 1.0pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-right-alt:dotted windowtext .5pt;padding:1.4pt 5.4pt 1.4pt 5.4pt;
  height:53.9pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  mso-fareast-font-family:"Times New Roman"'>Tanggal Dibuat<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:37;mso-yfti-lastrow:yes;height:60.1pt'>
  <td width="22%" colspan=5 style='width:22.38%;border:dotted windowtext 1.0pt;
  border-top:none;mso-border-left-alt:dotted windowtext .5pt;mso-border-bottom-alt:
  dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt;height:60.1pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";mso-fareast-font-family:"Times New Roman"'>NASRUDDIN CHUSNUL HULUK, SE.<br>
  PENATA TINGKAT I <br>
  NIP : 19720627 199803 1 003<o:p></o:p></span></p>
  </td>
  <td width="24%" colspan=6 style='width:24.28%;border-top:none;border-left:
  none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-bottom-alt:dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt;height:60.1pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";mso-fareast-font-family:"Times New Roman"'>HERU PRASETYA, SSTP<br>
  PENATA TINGKAT I<br>
  NIP : 19810503 199912 1 001<o:p></o:p></span></p>
  </td>
  <td width="14%" colspan=7 style='width:14.18%;border-top:none;border-left:
  none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-bottom-alt:dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt;height:60.1pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";mso-fareast-font-family:"Times New Roman"'>JUNIANTO EKO SAPUTRO, SE<br>
  PENATA TINGKAT I<br>
  NIP : 19690628 200212 1 </span><span style='font-size:10.0pt;font-family:
  "Arial","sans-serif"'><o:p></o:p></span></p>
  </td>
  <td width="39%" colspan=10 style='width:39.18%;border-top:none;border-left:
  none;border-bottom:dotted windowtext 1.0pt;border-right:dotted windowtext 1.0pt;
  mso-border-left-alt:dotted windowtext .5pt;mso-border-left-alt:dotted windowtext .5pt;
  mso-border-bottom-alt:dotted windowtext .5pt;mso-border-right-alt:dotted windowtext .5pt;
  padding:1.4pt 5.4pt 1.4pt 5.4pt;height:60.1pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  mso-fareast-font-family:"Times New Roman"'>Nama Petugas<o:p></o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  mso-fareast-font-family:"Times New Roman"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  mso-fareast-font-family:"Times New Roman"'>Tanda Tangan<o:p></o:p></span></p>
  </td>
 </tr>
 <![if !supportMisalignedColumns]>
 <tr height=0>
  <td width=35 style='border:none'></td>
  <td width=71 style='border:none'></td>
  <td width=39 style='border:none'></td>
  <td width=19 style='border:none'></td>
  <td width=19 style='border:none'></td>
  <td width=17 style='border:none'></td>
  <td width=61 style='border:none'></td>
  <td width=39 style='border:none'></td>
  <td width=72 style='border:none'></td>
  <td width=52 style='border:none'></td>
  <td width=25 style='border:none'></td>
  <td width=7 style='border:none'></td>
  <td width=44 style='border:none'></td>
  <td width=5 style='border:none'></td>
  <td width=28 style='border:none'></td>
  <td width=6 style='border:none'></td>
  <td width=49 style='border:none'></td>
  <td width=33 style='border:none'></td>
  <td width=22 style='border:none'></td>
  <td width=3 style='border:none'></td>
  <td width=15 style='border:none'></td>
  <td width=19 style='border:none'></td>
  <td width=6 style='border:none'></td>
  <td width=47 style='border:none'></td>
  <td width=81 style='border:none'></td>
  <td width=53 style='border:none'></td>
  <td width=2 style='border:none'></td>
  <td width=56 style='border:none'></td>
 </tr>
 <![endif]>
</table>

<p class=MsoNormal><span style='font-family:"Arial","sans-serif"'><o:p>&nbsp;</o:p></span></p>

</div>

</body>

</html>

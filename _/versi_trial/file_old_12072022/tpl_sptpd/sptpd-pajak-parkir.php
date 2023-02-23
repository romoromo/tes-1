<?php
$listData = $_REQUEST['listData'];
//$idtrans = $_REQUEST['idtrans'];

$datawp = Yii::app()->db->createCommand()->select('
	tbltransaksiketetapan.tbltransaksiketetapan_id,
tblobyekparkir.tbltransaksiketetapan_id,
tbltransaksiketetapan.tbltransaksiketetapan_masaawal,
tbltransaksiketetapan.tbltransaksiketetapan_masaakhir,
tbltransaksiketetapan.tbltransaksiketetapan_pajakketetapan,
tbltransaksiketetapan.tbltransaksiketetapan_omzettotal,
tbltransaksiketetapan.tbltransaksiketetapan_jumlahsetor')
->from('tbltransaksiketetapan')
->leftJoin('tblobyekparkir','tbltransaksiketetapan.tbltransaksiketetapan_id = tblobyekparkir.tbltransaksiketetapan_id')
->where('tbltransaksiketetapan.tbltransaksiketetapan_id=:idoby ', array(':idoby'=>$data['idtrans']))
->queryRow();
?>
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
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:8.0pt;
	margin-left:0in;
	line-height:106%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
a:link, span.MsoHyperlink
	{color:blue;
	text-decoration:underline;}
a:visited, span.MsoHyperlinkFollowed
	{color:purple;
	text-decoration:underline;}
p.xl65, li.xl65, div.xl65
	{mso-style-name:xl65;
	margin-right:0in;
	margin-left:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl66, li.xl66, div.xl66
	{mso-style-name:xl66;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl67, li.xl67, div.xl67
	{mso-style-name:xl67;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl68, li.xl68, div.xl68
	{mso-style-name:xl68;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl69, li.xl69, div.xl69
	{mso-style-name:xl69;
	margin-right:0in;
	margin-left:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";
	color:black;}
p.xl70, li.xl70, div.xl70
	{mso-style-name:xl70;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl71, li.xl71, div.xl71
	{mso-style-name:xl71;
	margin-right:0in;
	margin-left:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl72, li.xl72, div.xl72
	{mso-style-name:xl72;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl73, li.xl73, div.xl73
	{mso-style-name:xl73;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl74, li.xl74, div.xl74
	{mso-style-name:xl74;
	margin-right:0in;
	margin-left:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl75, li.xl75, div.xl75
	{mso-style-name:xl75;
	margin-right:0in;
	margin-left:0in;
	font-size:14.0pt;
	font-family:"Arial","sans-serif";}
p.xl76, li.xl76, div.xl76
	{mso-style-name:xl76;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl77, li.xl77, div.xl77
	{mso-style-name:xl77;
	margin-right:0in;
	margin-left:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl78, li.xl78, div.xl78
	{mso-style-name:xl78;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl79, li.xl79, div.xl79
	{mso-style-name:xl79;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl80, li.xl80, div.xl80
	{mso-style-name:xl80;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl81, li.xl81, div.xl81
	{mso-style-name:xl81;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl82, li.xl82, div.xl82
	{mso-style-name:xl82;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:14.0pt;
	font-family:"Arial","sans-serif";}
p.xl83, li.xl83, div.xl83
	{mso-style-name:xl83;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl84, li.xl84, div.xl84
	{mso-style-name:xl84;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl85, li.xl85, div.xl85
	{mso-style-name:xl85;
	margin-right:0in;
	margin-left:0in;
	font-size:10.0pt;
	font-family:"Arial","sans-serif";}
p.xl86, li.xl86, div.xl86
	{mso-style-name:xl86;
	margin-right:0in;
	margin-left:0in;
	text-align:right;
	font-size:10.0pt;
	font-family:"Arial","sans-serif";}
p.xl87, li.xl87, div.xl87
	{mso-style-name:xl87;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl88, li.xl88, div.xl88
	{mso-style-name:xl88;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl89, li.xl89, div.xl89
	{mso-style-name:xl89;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";
	font-weight:bold;}
p.xl90, li.xl90, div.xl90
	{mso-style-name:xl90;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";
	font-weight:bold;}
p.xl91, li.xl91, div.xl91
	{mso-style-name:xl91;
	margin-right:0in;
	margin-left:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl92, li.xl92, div.xl92
	{mso-style-name:xl92;
	margin-right:0in;
	margin-left:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl93, li.xl93, div.xl93
	{mso-style-name:xl93;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl94, li.xl94, div.xl94
	{mso-style-name:xl94;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl95, li.xl95, div.xl95
	{mso-style-name:xl95;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";
	font-weight:bold;}
p.xl96, li.xl96, div.xl96
	{mso-style-name:xl96;
	margin-right:0in;
	margin-left:0in;
	text-align:right;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl97, li.xl97, div.xl97
	{mso-style-name:xl97;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl98, li.xl98, div.xl98
	{mso-style-name:xl98;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl99, li.xl99, div.xl99
	{mso-style-name:xl99;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl100, li.xl100, div.xl100
	{mso-style-name:xl100;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";
	font-weight:bold;}
p.xl101, li.xl101, div.xl101
	{mso-style-name:xl101;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";
	font-weight:bold;}
p.xl102, li.xl102, div.xl102
	{mso-style-name:xl102;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";
	font-weight:bold;}
p.xl103, li.xl103, div.xl103
	{mso-style-name:xl103;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:14.0pt;
	font-family:"Arial","sans-serif";}
p.xl104, li.xl104, div.xl104
	{mso-style-name:xl104;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	font-size:14.0pt;
	font-family:"Arial","sans-serif";}
p.xl105, li.xl105, div.xl105
	{mso-style-name:xl105;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:14.0pt;
	font-family:"Arial","sans-serif";}
p.xl106, li.xl106, div.xl106
	{mso-style-name:xl106;
	margin-right:0in;
	margin-left:0in;
	text-align:right;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl107, li.xl107, div.xl107
	{mso-style-name:xl107;
	margin-right:0in;
	margin-left:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
.MsoChpDefault
	{font-size:10.0pt;
	font-family:"Calibri","sans-serif";}
@page WordSection1
	{size:11.0in 8.5in;
	margin:.5in .5in .5in .5in;}
div.WordSection1
	{page:WordSection1;}
.style1 {
	font-family: "Arial", "sans-serif";
	font-size: 10.0pt;
	color: black;
}
-->
</style>

</head>

<body lang=EN-US link=blue vlink=purple>

<div class=WordSection1>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="88%"
 style='width:88.0%;border-collapse:collapse'>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border-top:solid windowtext 1.0pt;
  border-left:solid windowtext 1.0pt;border-bottom:none;border-right:none;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;border-top:
  solid windowtext 1.0pt;border-left:none;border-bottom:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border-top:
  solid windowtext 1.0pt;border-left:none;border-bottom:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="29%" nowrap colspan=6 valign=bottom style='width:29.46%;
  border:none;border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;PEMERINTAH KOTA TEGAL</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 style='width:5.14%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 style='width:4.7%;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="13%" nowrap colspan=6 style='width:13.56%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>No. SPTPD</span></p>
  </td>
  <td width="4%" nowrap colspan=2 style='width:4.42%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>:</span></p>
  </td>
  <td width="19%" nowrap colspan=9 valign=bottom style='width:19.48%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'><?php echo $data['surat']['tblobyek_nomorsptpd']; ?></span></p>
  </td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="49%" nowrap colspan=12 valign=bottom style='width:49.9%;
  border:none;border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;<?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI')) ?></span></p>
  </td>
  <td width="4%" nowrap colspan=2 style='width:4.74%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="2%" nowrap style='width:2.62%;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.66%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.52%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 style='width:4.58%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 style='width:4.28%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="33%" nowrap colspan=7 valign=bottom style='width:33.08%;
  border:none;border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;Jl. Ki Gede Sebayu No. 5</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="5%" colspan=2 style='width:5.14%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" colspan=2 style='width:4.7%;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="15%" nowrap colspan=6 style='width:15.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Masa Pajak</span></p>
  </td>
  <td width="4%" nowrap colspan=2 style='width:4.28%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>:</span></p>
  </td>
  <td width="17%" nowrap colspan=9 valign=bottom style='width:17.4%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'><?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaawal']) ?> s/d <?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaakhir']) ?></span></p>
  </td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="33%" nowrap colspan=7 valign=bottom style='width:33.08%;
  border:none;border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;Telp.
  (0283) 355137 - 355138 Pwt 218</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="5%" colspan=2 style='width:5.14%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" colspan=2 style='width:4.7%;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="6%" colspan=3 style='width:6.8%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="2%" style='width:2.2%;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="6%" nowrap colspan=3 valign=bottom style='width:6.22%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="39%" nowrap colspan=9 valign=bottom style='width:39.66%;
  border:none;border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;<span class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style='font-family:"Arial","sans-serif";color:black'>T E G A L</span></span></span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="6%" nowrap colspan=2 valign=bottom style='width:6.12%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.74%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.62%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="13%" nowrap colspan=6 style='width:13.6%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Tahun Pajak</span></p>
  </td>
  <td width="4%" nowrap colspan=2 style='width:4.28%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>:</span></p>
  </td>
  <td width="17%" nowrap colspan=9 valign=bottom style='width:17.4%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'><?php echo $data['detail_transaksi']['tbltransaksiketetapan_tahunpajak'] ?></span></p>
  </td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="18%" nowrap colspan=3 valign=bottom style='width:18.92%;
  border:none;border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;border-top:
  none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border-top:solid windowtext 1.0pt;
  border-left:solid windowtext 1.0pt;border-bottom:none;border-right:none;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="14%" nowrap colspan=4 valign=bottom style='width:14.34%;
  border:none;border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border-top:
  solid windowtext 1.0pt;border-left:none;border-bottom:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="100%" nowrap colspan=34 valign=bottom style='width:100.0%;
  border-top:none;border-left:solid windowtext 1.0pt;border-bottom:none;
  border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  font-family:"Arial","sans-serif";color:black'>SPTPD</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="100%" nowrap colspan=34 valign=bottom style='width:100.0%;
  border-top:none;border-left:solid windowtext 1.0pt;border-bottom:none;
  border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>(SURAT PEMBERITAHUAN PAJAK
  DAERAH)</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="100%" nowrap colspan=34 valign=bottom style='width:100.0%;
  border-top:none;border-left:solid windowtext 1.0pt;border-bottom:none;
  border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>PAJAK PARKIR</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="18%" nowrap colspan=3 valign=bottom style='width:18.92%;
  border:none;border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;N.P.W.P.D</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="13%" nowrap colspan=6 valign=bottom style='width:13.34%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Kepada Yth,</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="29%" nowrap colspan=6 valign=bottom style='width:29.46%;
  border:none;border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'><?php echo $data['surat']['tblsubyek_npwpd']; ?></span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="24%" nowrap colspan=11 valign=bottom style='width:24.3%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:left;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'><?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI_SINGKAT')) ?> KOTA TEGAL</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="22%" nowrap colspan=10 valign=bottom style='width:22.26%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span class="style1">.</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>di</span></p>
  </td>
  <td width="17%" nowrap colspan=8 valign=bottom style='width:17.68%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:left;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>TEGAL</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="14%" nowrap colspan=4 valign=bottom style='width:14.34%;
  border:none;border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border-top:solid windowtext 1.0pt;
  border-left:solid windowtext 1.0pt;border-bottom:none;border-right:none;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;PERHATIAN :</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>

  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border-top:
  solid windowtext 1.0pt;border-left:none;border-bottom:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>1</span></p>
  </td>
  <td width="46%" nowrap colspan=14 valign=bottom style='width:46.72%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Harap diisi dalam rangkap dua (2) dengan huruf CETAK</span></p>
  </td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.66%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.52%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.28%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>2</span></p>
  </td>
  <td width="18%" nowrap colspan=5 valign=bottom style='width:18.92%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Beri nomor pada kotak</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="38%" nowrap colspan=14 valign=bottom style='width:38.86%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;yang tersedia untuk jawaban yang diberikan</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.28%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>3</span></p>
  </td>
  <td width="56%" nowrap colspan=18 valign=bottom style='width:56.88%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Setelah diisi dan ditanda tangani, harap diserahkan kembali
  kepada</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.52%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.28%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="61%" nowrap colspan=20 valign=bottom style='width:61.4%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Dinas Pendapatan, Pengelolaan Keuangan dan Aset Daerah paling
  lambat</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.28%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="22%" nowrap colspan=6 valign=bottom style='width:22.54%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>tanggal 15 bulan berikutnya</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>



  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>4</span></p>
  </td>
  <td width="79%" nowrap colspan=28 valign=bottom style='width:79.16%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Keterlambatan Penyerahan pada tanggal tersebut diatas akan
  dilakukan teguran kepada WP</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="79%" nowrap colspan=28 valign=bottom style='width:79.16%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>dan apabila masih belum menyerahkan dokumen dalam 7 (tujuh) hari
  setelah Surat Teguran</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="39%" nowrap colspan=11 valign=bottom style='width:39.36%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>diterima akan dilakukan penetapan secara jabatan</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.74%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.66%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.52%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.28%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="100%" nowrap colspan=34 valign=bottom style='width:100.0%;
  border:solid windowtext 1.0pt;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>A. DIISI OLEH WAJIB PAJAK</span></b></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>1.</span></p>
  </td>
  <td width="20%" nowrap colspan=6 valign=bottom style='width:20.62%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Parkir
  yang diselenggarakan</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;border:solid windowtext 1.0pt;
  border-left:none;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>01</span></p>
  </td>
  <td width="10%" nowrap colspan=4 valign=bottom style='width:10.14%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Sepeda</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.52%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="6%" nowrap colspan=3 valign=bottom style='width:6.5%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.32%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="6%" nowrap colspan=3 valign=bottom style='width:6.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.1%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>02</span></p>
  </td>
  <td width="12%" nowrap colspan=5 valign=bottom style='width:12.44%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Sepeda motor</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>03</span></p>
  </td>
  <td width="7%" nowrap colspan=3 valign=bottom style='width:7.9%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Mobil</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>2</span></p>
  </td>
  <td width="23%" nowrap colspan=7 valign=bottom style='width:23.84%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Harga tanda masuk yang berlaku</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="6%" nowrap colspan=2 valign=bottom style='width:6.12%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.74%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.66%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.52%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="6%" nowrap colspan=3 valign=bottom style='width:6.5%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.1%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>-</span></p>
  </td>
  <td width="7%" nowrap colspan=2 valign=bottom style='width:7.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Sepeda</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Rp.</span></p>
  </td>
  <td width="13%" nowrap colspan=5 valign=bottom style='width:13.48%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>........................</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:

  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>-</span></p>
  </td>
  <td width="10%" nowrap colspan=3 valign=bottom style='width:10.54%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Sepeda motor</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Rp.</span></p>
  </td>
  <td width="13%" nowrap colspan=5 valign=bottom style='width:13.48%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>........................</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>-</span></p>
  </td>
  <td width="7%" nowrap colspan=2 valign=bottom style='width:7.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Mobil</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Rp.</span></p>
  </td>
  <td width="13%" nowrap colspan=5 valign=bottom style='width:13.48%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>........................</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>3</span></p>
  </td>
  <td width="34%" nowrap colspan=10 valign=bottom style='width:34.08%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:

  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Jumlah pengunjung rata-rata pada hari biasa</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.74%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.66%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>:</span></p>
  </td>
  <td width="13%" nowrap colspan=6 valign=bottom style='width:13.6%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>........................</span></p>
  </td>
  <td width="8%" nowrap colspan=4 valign=bottom style='width:8.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>orang</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="41%" nowrap colspan=13 valign=bottom style='width:41.46%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Jumlah pengunjung rata-rata pada hari libur/minggu</span></p>
  </td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.66%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>:</span></p>
  </td>
  <td width="13%" nowrap colspan=6 valign=bottom style='width:13.6%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>........................</span></p>
  </td>
  <td width="8%" nowrap colspan=4 valign=bottom style='width:8.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>orang</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:

  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="29%" nowrap colspan=10 valign=bottom style='width:29.84%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.52%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="6%" nowrap colspan=3 valign=bottom style='width:6.5%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.1%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>4</span></p>
  </td>
  <td width="69%" nowrap colspan=25 style='width:69.42%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Apakah perusahaan menyediakan karcis bebas (free) kepada
  orang-orang tertentu :</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>1</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Ya</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>

  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>2</span></p>
  </td>
  <td width="7%" nowrap colspan=3 valign=bottom style='width:7.9%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Tidak</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="27%" nowrap colspan=8 style='width:27.98%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Jika YA berapa jumlah yang beredar</span></p>
  </td>
  <td width="6%" nowrap colspan=2 valign=bottom style='width:6.12%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>:</span></p>
  </td>
  <td width="13%" nowrap colspan=5 valign=bottom style='width:13.02%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>........................</span></p>
  </td>
  <td width="9%" nowrap colspan=4 valign=bottom style='width:9.0%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>buah</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.28%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>5</span></p>
  </td>
  <td width="27%" nowrap colspan=8 style='width:27.98%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Penjualan karcis dengan mesin tiket :</span></p>
  </td>
  <td width="6%" nowrap colspan=2 valign=bottom style='width:6.12%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.74%;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="2%" nowrap valign=bottom style='width:2.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>1</span></p>
  </td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.66%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Ya</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.52%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="6%" nowrap colspan=3 valign=bottom style='width:6.5%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.1%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>2</span></p>
  </td>
  <td width="7%" nowrap colspan=3 valign=bottom style='width:7.9%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Tidak</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>6</span></p>
  </td>
  <td width="34%" nowrap colspan=10 style='width:34.08%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Melaksanakan Pembukuan / Pencatatan :</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.74%;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="2%" nowrap valign=bottom style='width:2.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>1</span></p>
  </td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.66%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Ya</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.52%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.28%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>2</span></p>
  </td>
  <td width="7%" nowrap colspan=3 valign=bottom style='width:7.9%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Tidak</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border-top:
  none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="100%" nowrap colspan=34 valign=bottom style='width:100.0%;
  border-top:none;border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>B. DIISI OLEH PENGUSAHA PARKIR
  SELF ASSESMENT</span></b></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>1</span></p>
  </td>
  <td width="89%" nowrap colspan=33 valign=bottom style='width:89.48%;
  border:none;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Jumlah Pajak Terhutang untuk Masa Pajak sebelumnya (akumulasi
  dari awal Masa Pajak dalam Tahun Pajak</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="12%" nowrap colspan=3 valign=bottom style='width:12.1%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Tertentu) :</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>a.</span></p>
  </td>
  <td width="10%" nowrap colspan=3 valign=bottom style='width:10.6%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Masa Pajak</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>:</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Tgl</span></p>
  </td>
  <td width="13%" nowrap colspan=5 valign=bottom style='width:13.48%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class="style1">.....</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>s/d</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Tgl</span></p>
  </td>
  <td width="13%" nowrap colspan=6 valign=bottom style='width:13.54%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>&nbsp;</p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>b.</span></p>
  </td>
  <td width="20%" nowrap colspan=6 valign=bottom style='width:20.62%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Dasar Pengenaan (jumlah </span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>:</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Rp</span></p>
  </td>
  <td width="8%" nowrap colspan=3 valign=bottom style='width:8.78%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>&nbsp;</p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="20%" nowrap colspan=6 valign=bottom style='width:20.62%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>pembayaran yang diterima)</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>c.</span></p>
  </td>
  <td width="20%" nowrap colspan=6 valign=bottom style='width:20.62%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Tarif Pajak (sesuai Perda)</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>:</span></p>
  </td>
  <td width="7%" nowrap colspan=2 valign=bottom style='width:7.76%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>................</span></p>
  </td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>%</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>d.</span></p>
  </td>
  <td width="17%" nowrap colspan=5 valign=bottom style='width:17.26%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>

  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Pajak Terhutang ( b x c )</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>:</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Rp.</span></p>
  </td>
  <td width="8%" nowrap colspan=3 valign=bottom style='width:8.78%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>................</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>2</span></p>
  </td>
  <td width="70%" nowrap colspan=24 valign=bottom style='width:70.26%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Jumlah Pajak Terhutang untuk Masa Pajak sekarang (lampirkan foto
  copy dokumen)</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>a.</span></p>
  </td>
  <td width="10%" nowrap colspan=3 valign=bottom style='width:10.6%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Masa Pajak</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>:</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Tgl</span></p>
  </td>
  <td width="13%" nowrap colspan=5 valign=bottom style='width:13.48%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  color:black"><?php echo LokalIndonesia::TanggalUmum($datawp['tbltransaksiketetapan_masaawal']); ?></span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>s/d</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Tgl</span></p>
  </td>
  <td width="13%" nowrap colspan=6 valign=bottom style='width:13.54%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'><?php echo LokalIndonesia::TanggalUmum($datawp['tbltransaksiketetapan_masaakhir']); ?></span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>b.</span></p>
  </td>
  <td width="20%" nowrap colspan=6 valign=bottom style='width:20.62%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Dasar Pengenaan (jumlah </span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>:</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Rp</span></p>
  </td>
  <td width="8%" nowrap colspan=3 valign=bottom style='width:8.78%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  color:black"><?php echo LokalIndonesia::ribuan($datawp['tbltransaksiketetapan_omzettotal']); ?></span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="20%" nowrap colspan=6 valign=bottom style='width:20.62%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>pembayaran yang diterima)</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>c.</span></p>
  </td>
  <td width="20%" nowrap colspan=6 valign=bottom style='width:20.62%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Tarif Pajak (sesuai Perda)</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>:</span></p>
  </td>
  <td width="14%" nowrap colspan=5 valign=bottom style='width:14.98%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>25%</span></p>
  </td>
  <td width="2%" nowrap valign=bottom style='width:2.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.66%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.52%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="6%" nowrap colspan=3 valign=bottom style='width:6.5%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.1%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>d.</span></p>
  </td>
  <td width="17%" nowrap colspan=5 valign=bottom style='width:17.26%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Pajak Terhutang ( b x c )</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>:</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Rp.</span></p>
  </td>
  <td width="8%" nowrap colspan=3 valign=bottom style='width:8.78%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  color:black"><?php echo LokalIndonesia::ribuan($datawp['tbltransaksiketetapan_jumlahsetor']); ?></span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border-top:
  none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
 </tr>
  <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
 </tr>
  <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
 </tr>
  <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
 </tr>
  <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="100%" nowrap colspan=34 valign=bottom style='width:100.0%;
  border:solid windowtext 1.0pt;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>C. DIISI OLEH PENGUSAHA PARKIR
  OFFICIAL ASSESMENT</span></b></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>a.</span></p>
  </td>
  <td width="10%" nowrap colspan=3 valign=bottom style='width:10.6%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Masa Pajak</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>:</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Tgl</span></p>
  </td>
  <td width="13%" nowrap colspan=5 valign=bottom style='width:13.48%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>.........................</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>s/d</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Tgl</span></p>
  </td>
  <td width="13%" nowrap colspan=6 valign=bottom style='width:13.54%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>.........................</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>b.</span></p>
  </td>
  <td width="20%" nowrap colspan=6 valign=bottom style='width:20.62%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Dasar Pengenaan (jumlah </span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>:</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Rp</span></p>
  </td>
  <td width="8%" nowrap colspan=3 valign=bottom style='width:8.78%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>................</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="20%" nowrap colspan=6 valign=bottom style='width:20.62%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>pembayaran yang diterima)</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="100%" nowrap colspan=34 valign=bottom style='width:100.0%;
  border:solid windowtext 1.0pt;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>D. PERNYATAAN</span></b></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></b></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></b></p>
  </td>
  <td width="83%" nowrap colspan=30 valign=bottom style='width:83.48%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Dengan menyadari sepenuhnya akan segala akibat termasuk
  sanksi-sanksi sesuai dengan ketentuan</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.8%;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></b></p>
  </td>
  <td width="83%" nowrap colspan=30 valign=bottom style='width:83.48%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>perundang-undangan yang berlaku, saya atau yang saya beri kuasa
  menyatakan bahwa apa yang</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.8%;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></b></p>
  </td>
  <td width="79%" nowrap colspan=28 valign=bottom style='width:79.16%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>telah beritahukan tersebut diatas beserta lampiran-lampiran
  adalah benar, lengkap dan jelas</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></b></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></b></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="17%" nowrap colspan=7 valign=bottom style='width:17.02%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>...............................,</span></p>
  </td>
  <td width="8%" nowrap colspan=4 valign=bottom style='width:8.76%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>Tahun</span></p>
  </td>
  <td width="8%" nowrap colspan=4 valign=bottom style='width:8.92%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>...............</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="34%" nowrap colspan=15 valign=bottom style='width:34.72%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>Wajib Pajak</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="26%" nowrap colspan=12 valign=bottom style='width:26.82%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>____________________</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="26%" nowrap colspan=12 valign=bottom style='width:26.82%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>Nama Jelas</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border-top:
  none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="100%" nowrap colspan=34 valign=bottom style='width:100.0%;
  border-top:none;border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>E. DIISI OLEH PETUGAS PENERIMA
  <?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI_SINGKAT')) ?></span></b></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="15%" nowrap colspan=4 valign=bottom style='width:15.86%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Diterima tanggal</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>:</span></p>
  </td>
  <td width="14%" nowrap colspan=4 valign=bottom style='width:14.32%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>................................</span></p>
  </td>
  <td width="6%" nowrap colspan=2 valign=bottom style='width:6.12%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.74%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.66%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.52%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="6%" nowrap colspan=3 valign=bottom style='width:6.5%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.18%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="1%" nowrap valign=bottom style='width:1.76%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="12%" nowrap colspan=3 valign=bottom style='width:12.1%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Nama Jelas</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>:</span></p>
  </td>
  <td width="14%" nowrap colspan=4 valign=bottom style='width:14.32%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>................................</span></p>
  </td>
  <td width="6%" nowrap colspan=2 valign=bottom style='width:6.12%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.74%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.66%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.52%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="6%" nowrap colspan=3 valign=bottom style='width:6.5%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.1%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>NIP</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>:</span></p>
  </td>
  <td width="14%" nowrap colspan=4 valign=bottom style='width:14.32%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>................................</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="12%" nowrap colspan=3 valign=bottom style='width:12.1%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>Tanda tangan</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>:</span></p>
  </td>
  <td width="14%" nowrap colspan=4 valign=bottom style='width:14.32%;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif";color:black'>................................</span></p>
  </td>
  <td width="6%" nowrap colspan=2 valign=bottom style='width:6.12%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.74%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.62%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.66%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.52%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.36%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="6%" nowrap colspan=3 valign=bottom style='width:6.5%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.32%;padding:
  0in 5.4pt 0in 5.4pt;height:12.65pt'></td>
  <td width="2%" nowrap valign=bottom style='width:2.1%;padding:0in 5.4pt 0in 5.4pt;
  height:12.65pt'></td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:12.65pt'>
  <td width="10%" nowrap valign=bottom style='width:10.52%;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.26%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.12%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.7%;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.78%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.04%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.62%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.36%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.22%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.12%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.64%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="5%" nowrap colspan=2 valign=bottom style='width:5.14%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.7%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.46%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.54%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.58%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.42%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.34%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.48%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.44%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap colspan=2 valign=bottom style='width:4.14%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" nowrap colspan=2 valign=bottom style='width:3.84%;border-top:
  none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:

  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr height=0>
  <td width=99 style='border:none'></td>
  <td width=42 style='border:none'></td>
  <td width=28 style='border:none'></td>
  <td width=35 style='border:none'></td>
  <td width=36 style='border:none'></td>
  <td width=29 style='border:none'></td>
  <td width=36 style='border:none'></td>
  <td width=33 style='border:none'></td>
  <td width=32 style='border:none'></td>
  <td width=42 style='border:none'></td>
  <td width=37 style='border:none'></td>
  <td width=22 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=18 style='border:none'></td>
  <td width=22 style='border:none'></td>
  <td width=33 style='border:none'></td>
  <td width=18 style='border:none'></td>
  <td width=18 style='border:none'></td>
  <td width=19 style='border:none'></td>
  <td width=19 style='border:none'></td>
  <td width=19 style='border:none'></td>
  <td width=20 style='border:none'></td>
  <td width=19 style='border:none'></td>
  <td width=19 style='border:none'></td>
  <td width=17 style='border:none'></td>
  <td width=19 style='border:none'></td>
  <td width=18 style='border:none'></td>
  <td width=19 style='border:none'></td>
  <td width=18 style='border:none'></td>
  <td width=19 style='border:none'></td>
  <td width=17 style='border:none'></td>
  <td width=17 style='border:none'></td>
  <td width=17 style='border:none'></td>
  <td width=18 style='border:none'></td>
 </tr>
</table>

<p class=MsoNormal><span style='font-size:10.0pt;line-height:106%'>&nbsp;</span></p>

</div>

</body>

</html>

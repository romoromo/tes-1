<?php 
	Yii::import('ext.LokalIndonesia');
	Yii::import('application.models.detail.ObyekHotel');
	$gethotel = ObyekHotel::model()->find('tblobyek_id=:idobyek', array(':idobyek'=>$data['id']));
	$idgolhotel = $gethotel['refgolhotel_id'];
	$golhotel = GolonganHotel::model()->findByPk($idgolhotel);
	$kodegol = $golhotel['refgolhotel_keterangan'];
	$detail_hotel = Yii::app()->db->createCommand()->select()->from('tblobyekhoteldet')->where('tblobyek_id=:idobyek', array(':idobyek'=>$data['id']))->queryAll();
	
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
	line-height:107%;
	font-size:9.0pt;
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
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl93, li.xl93, div.xl93
	{mso-style-name:xl93;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl94, li.xl94, div.xl94
	{mso-style-name:xl94;
	margin-right:0in;
	margin-left:0in;
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
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl101, li.xl101, div.xl101
	{mso-style-name:xl101;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl102, li.xl102, div.xl102
	{mso-style-name:xl102;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl103, li.xl103, div.xl103
	{mso-style-name:xl103;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl104, li.xl104, div.xl104
	{mso-style-name:xl104;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl105, li.xl105, div.xl105
	{mso-style-name:xl105;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl106, li.xl106, div.xl106
	{mso-style-name:xl106;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";
	font-weight:bold;}
p.xl107, li.xl107, div.xl107
	{mso-style-name:xl107;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";
	font-weight:bold;}
p.xl108, li.xl108, div.xl108
	{mso-style-name:xl108;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";
	font-weight:bold;}
p.xl109, li.xl109, div.xl109
	{mso-style-name:xl109;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:14.0pt;
	font-family:"Arial","sans-serif";}
p.xl110, li.xl110, div.xl110
	{mso-style-name:xl110;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	font-size:14.0pt;
	font-family:"Arial","sans-serif";}
p.xl111, li.xl111, div.xl111
	{mso-style-name:xl111;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:14.0pt;
	font-family:"Arial","sans-serif";}
p.xl112, li.xl112, div.xl112
	{mso-style-name:xl112;
	margin-right:0in;
	margin-left:0in;
	text-align:right;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl113, li.xl113, div.xl113
	{mso-style-name:xl113;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl114, li.xl114, div.xl114
	{mso-style-name:xl114;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl115, li.xl115, div.xl115
	{mso-style-name:xl115;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
.MsoChpDefault
	{font-family:"Calibri","sans-serif";}
.MsoPapDefault
	{margin-bottom:8.0pt;
	line-height:50%;}
@page WordSection1
	{size:11.0in 8.5in;
	margin:.5in .5in .5in .5in;}
div.WordSection1
	{page:WordSection1;}
-->
</style>

<title>SPTPD <?php echo $data['surat']['tblobyek_nama'] ?></title></head>

<body lang=EN-US link=blue vlink=purple>

<div class=WordSection1>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="50%"
 style='width:50.0%;border-collapse:collapse'>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border-top:solid windowtext 1.0pt;border-left:
  solid windowtext 1.0pt;border-bottom:none;border-right:none;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border-top:solid windowtext 1.0pt;border-left:
  none;border-bottom:none;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border-top:solid windowtext 1.0pt;border-left:
  none;border-bottom:none;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap colspan=6 valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>PEMERINTAH
  KOTA TEGAL</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap style='border:none;border-right:solid windowtext 1.0pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:14.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap colspan=3 style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>No. SPTPD</span></p>  </td>
  <td nowrap style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td nowrap colspan=5 valign=bottom style='/*padding:0in 5.4pt 0in 5.4pt;*/
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?php echo $data['surat']['tblobyek_nomorsptpd']; ?></span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap colspan=11 valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI')) ?></span></p>  </td>
  <td nowrap style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap style='border:none;border-right:solid windowtext 1.0pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:14.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap colspan=7 valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Jl. Ki
  Gede Sebayu No. 5</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td style='border:none;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap colspan=3 style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Masa Pajak</span></p>  </td>
  <td nowrap style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td width=171 nowrap colspan=5 valign=bottom style='width:128.6pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaawal']) ?> s/d <?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaakhir']) ?></span></p>
  </td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap colspan=7 valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><span class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal">Telp.
  (0283) 355137 - 355138 Pwt 218</span></span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td style='border:none;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap colspan=6 valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><span class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal">T E G A L</span></span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap colspan=3 style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tahun
  Pajak</span></p>  </td>
  <td nowrap style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td nowrap colspan=5 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?php echo $data['detail_transaksi']['tbltransaksiketetapan_tahunpajak'] ?></span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border-top:solid windowtext 1.0pt;border-left:
  solid windowtext 1.0pt;border-bottom:none;border-right:none;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap colspan=5 valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border-top:solid windowtext 1.0pt;border-left:
  none;border-bottom:none;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap colspan=25 valign=bottom style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:none;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:14.0pt;
  font-family:"Arial","sans-serif";color:black'>SPTPD</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap colspan=25 valign=bottom style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:none;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>(SURAT PEMBERITAHUAN PAJAK DAERAH)</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap colspan=25 valign=bottom style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:none;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>PAJAK HOTEL</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap colspan=3 valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;N.P.W.P.D</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Kepada
  Yth,</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap colspan=6 valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'><p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:left;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'><?php echo $data['surat']['tblsubyek_npwpd']; ?></span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap colspan=6 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>Kepala <?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI_SINGKAT')) ?> <?= AppConfig::model()->getValue('APLIKASI_PEMERINTAH') ?></span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap colspan=6 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>Jl Ki Gede
  Sebayu No. 3</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>di</span></p>  </td>
  <td nowrap colspan=5 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:left;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>Tegal</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap colspan=5 valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border-top:solid windowtext 1.0pt;border-left:
  solid windowtext 1.0pt;border-bottom:none;border-right:none;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;PERHATIAN
  :</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-top:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border-top:solid windowtext 1.0pt;border-left:
  none;border-bottom:none;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>1</span></p>  </td>
  <td nowrap colspan=12 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Harap
  diisi dalam rangkap dua (2) dengan huruf CETAK</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>

  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>2</span></p>  </td>
  <td nowrap colspan=5 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Beri nomor
  pada kotak</span></p>  </td>
  <td nowrap valign=bottom style='border:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap colspan=9 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;yang
  tersedia untuk jawaban yang diberikan</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>3</span></p>  </td>
  <td nowrap colspan=14 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Setelah
  diisi dan ditanda tangani, harap diserahkan kembali kepada <?= AppConfig::model()->getValue('APLIKASI_INSTANSI') ?> paling lambat</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap colspan=15 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>tanggal 15
  bulan berikutnya</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>4</span></p>  </td>
  <td nowrap colspan=19 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Keterlambatan
  Penyerahan pada tanggal tersebut diatas akan dilakukan teguran kepada WP</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap colspan=19 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>dan
  apabila masih belum menyerahkan dokumen dalam 7 (tujuh) hari setelah Surat
  Teguran</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap colspan=10 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>diterima
  akan dilakukan penetapan secara jabatan</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap colspan=25 valign=bottom style='border:solid windowtext 1.0pt;
  border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>A. DIISI OLEH PENGUSAHA HOTEL</span></b></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>1.</span></p>  </td>
  <td nowrap colspan=4 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif"'>Golongan Hotel :</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <?php 
  	$golkode1 = substr($kodegol, 0,1); 
  	$golkode2 = substr($kodegol, 1,2); 
  ?>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?php echo $golkode1; ?></span></p>  </td>
  <td nowrap valign=bottom style='border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?php echo $golkode2; ?></span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>01</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Bintang
  Lima</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>06</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Melati
  Tiga</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>02</span></p>  </td>
  <td nowrap colspan=4 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Bintang
  Empat</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>07</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Melati Dua</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>03</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Bintang
  Tiga</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>08</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Melati
  Satu</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>04</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Bintang
  Dua</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>09</span></p>  </td>
  <td nowrap colspan=2 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Ekonomi</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>05</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Bintang
  Satu</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>10</span></p>  </td>
  <td nowrap colspan=4 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Lainnya :
  ...............</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>2</span></p>  </td>
  <td nowrap colspan=6 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tarif dan
  jumlah kamar hotel :</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:18.75pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:18.75pt'></td>
  <td nowrap colspan=2 style='border:solid windowtext 1.0pt;border-right:none;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>No.</span></p>  </td>
  <td nowrap colspan=5 style='border:solid windowtext 1.0pt;border-right:none;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>Golongan Kamar</span></p>  </td>
  <td nowrap colspan=8 style='border:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>Tarif (Rp.)</span></p>  </td>
  <td nowrap colspan=7 style='border-top:solid windowtext 1.0pt;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>Jumlah Kamar</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <?php $nodet = 1; foreach($detail_hotel as $dethotel): ?>
 <tr style='height:18.75pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt'></td>
  <td nowrap colspan=2 style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'><?= $nodet++ ?></span></p>  </td>
  <td colspan="5" valign=bottom nowrap style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'><?= $dethotel['tblobyekhoteldet_kamar'] ?></td>
  <td colspan="8" valign=bottom nowrap style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;text-align:right'><?= LokalIndonesia::ribuan($dethotel['tblobyekhoteldet_tarif']) ?></td>
  <td colspan="7" valign=bottom nowrap style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;text-align:right'><?= LokalIndonesia::ribuan($dethotel['tblobyekhoteldet_jumlkamar']) ?></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <?php endforeach; ?>
 <?php /*tr style='height:18.75pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:18.75pt'></td>
  <td nowrap colspan=2 style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>2</span></p>
  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td nowrap colspan=3 valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td nowrap valign=bottom style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:none;padding:0in 5.4pt 0in 5.4pt;
  height:18.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>
  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td nowrap colspan=3 valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td nowrap valign=bottom style='border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td nowrap valign=bottom style='border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:18.75pt'>

  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:18.75pt'></td>
  <td nowrap colspan=2 style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>3</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:none;padding:0in 5.4pt 0in 5.4pt;
  height:18.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:18.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr*/ ?>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>3</span></p>  </td>
  <td nowrap colspan=6 style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Menggunakan
  kas register</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>
  <?= $gethotel['tblobyekhotel_isregister']=="T" ? "1" : "2" ?>
  </span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>1</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Ya</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>2</span></p>  </td>
  <td nowrap colspan=2 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tidak</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>4</span></p>  </td>
  <td nowrap colspan=9 style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Melaksanakan
  Pembukuan / Pencatatan :</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?= $gethotel['tblobyekhotel_iskas']=="T" ? "1" : "2" ?></span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>1</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Ya</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>2</span></p>  </td>
  <td nowrap colspan=2 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tidak</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:none;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap colspan=25 valign=bottom style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>B. DIISI OLEH PENGUSAHA HOTEL SELF ASSESMENT</span></b></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>1</span></p>  </td>
  <td nowrap colspan=22 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Jumlah
  Pembayaran dan Pajak Terhutang untuk Masa Pajak sebelumnya (akumulasi dari
  awal Masa Pajak </span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap colspan=7 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>dalam
  Tahun Pajak Tertentu) :</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>a.</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Masa Pajak</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tgl</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>.........................</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>s/d</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tgl</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>.........................</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>b.</span></p>  </td>
  <td nowrap colspan=6 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Dasar
  Pengenaan (jumlah </span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Rp</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>.........................</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap colspan=6 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>pembayaran
  yang diterima)</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>c.</span></p>  </td>
  <td nowrap colspan=6 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tarif
  Pajak (sesuai Perda)</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td nowrap colspan=2 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>................</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>%</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>d.</span></p>  </td>
  <td nowrap colspan=5 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Pajak
  Terhutang ( b x c )</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Rp.</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>.........................</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>2</span></p>  </td>
  <td nowrap colspan=21 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Jumlah
  Pembayaran dan Pajak Terhutang untuk Masa Pajak sekarang (lampirkan foto copy
  dokumen)</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>a.</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Masa Pajak</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tgl</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'><?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaawal']) ?></span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>s/d</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tgl</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'><?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaakhir']) ?></span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>b.</span></p>  </td>
  <td nowrap colspan=6 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Dasar
  Pengenaan (jumlah </span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Rp</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'><?php echo LokalIndonesia::ribuan($data['detail_transaksi']['tbltransaksiketetapan_omzettotal'],0,0) ?></span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap colspan=6 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>pembayaran
  yang diterima)</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>c.</span></p>  </td>
  <td nowrap colspan=6 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tarif
  Pajak (sesuai Perda)</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td nowrap colspan=2 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'><?php echo ($data['detail_transaksi']['tbltransaksiketetapan_tarif']*100) ?></span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>%</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>d.</span></p>  </td>
  <td nowrap colspan=5 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Pajak
  Terhutang ( b x c )</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Rp.</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'><?php echo LokalIndonesia::ribuan($data['detail_transaksi']['tbltransaksiketetapan_pajak'],0,0) ?></span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:none;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;

  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;

  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;

  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;

  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:9.75pt'>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap colspan=25 valign=bottom style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>C. DIISI OLEH PENGUSAHA HOTEL OFFICIAL ASSESMENT</span></b></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>a.</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Masa Pajak</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tgl</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>.........................</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>s/d</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tgl</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>.........................</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>b.</span></p>  </td>
  <td nowrap colspan=6 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Dasar
  Pengenaan (jumlah </span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Rp</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>.........................</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap colspan=6 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>pembayaran
  yang diterima)</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap colspan=25 valign=bottom style='border:solid windowtext 1.0pt;
  border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>D. PERNYATAAN</span></b></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
  <td nowrap colspan=20 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Dengan
  menyadari sepenuhnya akan segala akibat termasuk sanksi-sanksi sesuai dengan
  ketentuan</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
  <td nowrap colspan=20 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>perundang-undangan
  yang berlaku, saya atau yang saya beri kuasa menyatakan bahwa apa yang</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
  <td nowrap colspan=19 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>telah
  beritahukan tersebut diatas beserta lampiran-lampiran adalah benar, lengkap
  dan jelas</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap colspan=4 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
   </td>
  <td nowrap colspan=2 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:left;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'><!--Tahun-->
  <?php  
      Yii::import('ext.source_qrcode.tpl_class');
      Yii::import('ext.source_qrcode.qrcode');

      $qr = new qrcode();
      $qr->text($data['surat']['tbltransaksiketetapan_kodeboking']);
  ?>
  <img style="height:60px;" src="<?php echo $qr->get_link(); ?>">
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>
  <?php if($data['detail_transaksi']['tbltransaksiketetapan_isterbayar']=="T"): ?>
  <?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_tglsetor']) ?>
  <?php else: ?>
  ............................... 
  <?php endif; ?>
  </span></p> 
  </span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap colspan=2 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <!--<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>...............</span></p>-->  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap colspan=9 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>Wajib Pajak</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap colspan=7 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>____________________</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap colspan=7 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>Nama Jelas</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:none;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap colspan=25 valign=bottom style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>E. DIISI OLEH PETUGAS PENERIMA <?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI_SINGKAT')) ?></span></b></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap colspan=4 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Diterima
  tanggal</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td nowrap colspan=4 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>................................</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Nama Jelas</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td nowrap colspan=4 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>................................</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>NIP</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td nowrap colspan=4 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>................................</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>

  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap colspan=3 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tanda
  tangan</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td nowrap colspan=4 valign=bottom style='padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>................................</span></p>  </td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='padding:0in 5.4pt 0in 5.4pt;height:15.0pt'></td>
  <td nowrap valign=bottom style='border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.0pt'>
  <td nowrap valign=bottom style='border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:none;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td nowrap valign=bottom style='border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
</table>
</div>

</body>

</html>

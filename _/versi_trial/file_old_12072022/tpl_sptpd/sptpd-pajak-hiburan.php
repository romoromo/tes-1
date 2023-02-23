<?php 
	Yii::import('ext.LokalIndonesia');
	Yii::import('application.models.detail.ObyekHiburan');
	$gethiburan = ObyekHiburan::model()->find('tblobyek_id=:idobyek', array(':idobyek'=>$data['id']));
	$detail_hiburan= Yii::app()->db->createCommand()->select()->from('tblobyekhiburan')->where('tblobyek_id=:idobyek', array(':idobyek'=>$data['id']))->leftJoin('refjenishiburan','refjenishiburan.refjenishiburan_id=tblobyekhiburan.refjenishiburan_id')->queryRow();
	$kodegol = $detail_hiburan['refjenishiburan_kode'];
	$details_hiburan = Yii::app()->db->createCommand()->select()->from('tblobyekhiburandet')->where('tblobyek_id=:idobyek', array(':idobyek'=>$data['id']))->queryAll();
	
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
	border:none;
	padding:0in;
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
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
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
	font-family:"Arial","sans-serif";
	color:black;}
p.xl72, li.xl72, div.xl72
	{mso-style-name:xl72;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl73, li.xl73, div.xl73
	{mso-style-name:xl73;
	margin-right:0in;
	margin-left:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl74, li.xl74, div.xl74
	{mso-style-name:xl74;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl75, li.xl75, div.xl75
	{mso-style-name:xl75;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl76, li.xl76, div.xl76
	{mso-style-name:xl76;
	margin-right:0in;
	margin-left:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl77, li.xl77, div.xl77
	{mso-style-name:xl77;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl78, li.xl78, div.xl78
	{mso-style-name:xl78;
	margin-right:0in;
	margin-left:0in;
	font-size:14.0pt;
	font-family:"Arial","sans-serif";}
p.xl79, li.xl79, div.xl79
	{mso-style-name:xl79;
	margin-right:0in;
	margin-left:0in;
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
	font-family:"Arial","sans-serif";
	font-weight:bold;}
p.xl82, li.xl82, div.xl82
	{mso-style-name:xl82;
	margin-right:0in;
	margin-left:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl83, li.xl83, div.xl83
	{mso-style-name:xl83;
	margin-right:0in;
	margin-left:0in;
	text-align:right;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl84, li.xl84, div.xl84
	{mso-style-name:xl84;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl85, li.xl85, div.xl85
	{mso-style-name:xl85;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl86, li.xl86, div.xl86
	{mso-style-name:xl86;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
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
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl90, li.xl90, div.xl90
	{mso-style-name:xl90;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.xl91, li.xl91, div.xl91
	{mso-style-name:xl91;
	margin-right:0in;
	margin-left:0in;
	border:none;
	padding:0in;
	font-size:14.0pt;
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
	font-size:10.0pt;
	font-family:"Arial","sans-serif";}
p.xl95, li.xl95, div.xl95
	{mso-style-name:xl95;
	margin-right:0in;
	margin-left:0in;
	text-align:right;
	font-size:10.0pt;
	font-family:"Arial","sans-serif";}
p.xl96, li.xl96, div.xl96
	{mso-style-name:xl96;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
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
	font-family:"Arial","sans-serif";
	font-weight:bold;}
p.xl98, li.xl98, div.xl98
	{mso-style-name:xl98;
	margin-right:0in;
	margin-left:0in;
	text-align:center;
	border:none;
	padding:0in;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";
	font-weight:bold;}
p.xl99, li.xl99, div.xl99
	{mso-style-name:xl99;
	margin-right:0in;
	margin-left:0in;
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
.MsoChpDefault
	{font-family:"Calibri","sans-serif";}
.MsoPapDefault
	{margin-bottom:8.0pt;
	line-height:107%;}
@page WordSection1
	{size:992.25pt 793.8pt;
	margin:.5in .5in .5in .5in;}
div.WordSection1
	{page:WordSection1;}
.style1 {font-family: "Arial", "sans-serif"}
-->
</style>

<title>SPTPD <?php echo $data['surat']['tblobyek_nama'] ?></title></head>

<body lang=EN-US link=blue vlink=purple>

<div class=WordSection1>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=1038
 style='width:778.6pt;border-collapse:collapse'>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border-top:solid windowtext 1.0pt;
  border-left:solid windowtext 1.0pt;border-bottom:none;border-right:none;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap colspan=6 valign=bottom style='width:244.45pt;
  border:none;border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;PEMERINTAH
  KOTA TEGAL</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap style='width:30.9pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'></td>
  <td width=253 nowrap colspan=3 style='width:95.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>No. SPTPD</span></p>  </td>
  <td width=168 nowrap style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td width=164 nowrap colspan=5 valign=bottom style='width:123.1pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?php echo $data['surat']['tblobyek_nomorsptpd']; ?></span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap colspan=11 valign=bottom style='width:400.95pt;
  border:none;border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;<?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI')) ?></span></p>  </td>
  <td width=133 nowrap style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap style='width:30.9pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:14.0pt;font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap colspan=7 valign=bottom style='width:276.45pt;
  border:none;border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;Jl. Ki
  Gede Sebayu No. 5</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'></td>
  <td width=89 style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'></td>
  <td width=129 style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'></td>
  <td width=133 style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'></td>
  <td width=41 style='width:30.9pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap colspan=3 style='width:95.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Masa Pajak</span></p>  </td>
  <td width=168 nowrap style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td width=164 nowrap colspan=5 valign=bottom style='width:123.1pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaawal']) ?> s/d <?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaakhir']) ?></span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap colspan=7 valign=bottom style='width:276.45pt;
  border:none;border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span><span class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style='font-family:"Arial","sans-serif";color:black'>Telp.
  (0283) 355137 - 355138 Pwt 218</span></span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'></td>
  <td width=89 style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'></td>
  <td width=129 style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'></td>
  <td width=133 style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'></td>
  <td width=41 style='width:30.9pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'></td>
  <td width=168 style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap colspan=6 valign=bottom style='width:244.45pt;
  border:none;border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;<span class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal">T E G A L</span></span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap colspan=3 style='width:95.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tahun
  Pajak</span></p>  </td>
  <td width=168 nowrap style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td width=164 nowrap colspan=5 valign=bottom style='width:123.1pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?php echo $data['detail_transaksi']['tbltransaksiketetapan_tahunpajak'] ?></span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border-top:solid windowtext 1.0pt;
  border-left:solid windowtext 1.0pt;border-bottom:none;border-right:none;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap colspan=4 valign=bottom style='width:124.45pt;
  border:none;border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap colspan=23 valign=bottom style='width:778.6pt;
  border-top:none;border-left:solid windowtext 1.0pt;border-bottom:none;
  border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:14.0pt;
  font-family:"Arial","sans-serif";color:black'>SPTPD</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap colspan=23 valign=bottom style='width:778.6pt;
  border-top:none;border-left:solid windowtext 1.0pt;border-bottom:none;
  border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>(SURAT PEMBERITAHUAN PAJAK DAERAH)</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap colspan=23 valign=bottom style='width:778.6pt;
  border-top:none;border-left:solid windowtext 1.0pt;border-bottom:none;
  border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>PAJAK HIBURAN</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap colspan=3 valign=bottom style='width:151.25pt;
  border:none;border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;N.P.W.P.D</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap colspan=3 valign=bottom style='width:95.7pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Kepada
  Yth,</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap colspan=6 valign=bottom style='width:244.45pt;
  border:none;border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:left;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'><?php echo $data['surat']['tblsubyek_npwpd']; ?></span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap colspan=5 valign=bottom style='width:158.3pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:left;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>Kepala <?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI_SINGKAT')) ?> Kota Tegal</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap colspan=5 valign=bottom style='width:158.3pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:left;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>Jl Ki Gede Sebayu No. 5</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>di</span></p>  </td>
  <td width=168 nowrap colspan=4 valign=bottom style='width:125.85pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:left;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'><span class="style1">TEGAL</span></span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap colspan=4 valign=bottom style='width:124.45pt;
  border:none;border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border-top:solid windowtext 1.0pt;
  border-left:solid windowtext 1.0pt;border-bottom:none;border-right:none;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;PERHATIAN
  :</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>1</span></p>  </td>
  <td width=918 nowrap colspan=12 valign=bottom style='width:372.9pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Harap
  diisi dalam rangkap dua (2) dengan huruf CETAK</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>2</span></p>  </td>
  <td width=918 nowrap colspan=5 valign=bottom style='width:154.35pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Beri nomor
  pada kotak</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap colspan=9 valign=bottom style='width:286.75pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;yang
  tersedia untuk jawaban yang diberikan</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>3</span></p>  </td>
  <td width=918 nowrap colspan=21 valign=bottom style='width:441.45pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Setelah
  diisi dan ditanda tangani, harap diserahkan kembali kepada <?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI')) ?> paling lambat tanggal 15 bulan</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap colspan=6 valign=bottom style='width:186.35pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>
   berikutnya</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>4</span></p>  </td>
  <td width=918 nowrap colspan=21 valign=bottom style='width:600.15pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Keterlambatan
  Penyerahan pada tanggal tersebut diatas akan dilakukan teguran kepada WP dan
  apabila masih belum menyerahkan</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap colspan=19 valign=bottom style='width:600.15pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>dokumen dalam 7 (tujuh) hari setelah Surat
  Teguran diterima akan dilakukan penetapan secara jabatan</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:5.35pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:5.35pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:5.35pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:5.35pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap colspan=23 valign=bottom style='width:778.6pt;
  border:solid windowtext 1.0pt;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>A. DIISI OLEH WAJIB PAJAK</span></b></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>1.</span></p>  </td>
  <td width=718 nowrap colspan=7 valign=bottom style='width:213.4pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif"'>Hiburan yang
  diselenggarakan</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>
  <?php 
  	$golkode1 = substr($kodegol, 0,1); 
  	$golkode2 = substr($kodegol, 1,2); 
  ?>
  <?= $golkode1 ?>
  </span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?= $golkode2 ?></span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>01</span></p>  </td>
  <td width=345 nowrap colspan=4 valign=bottom style='width:132.65pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Pertunjukan
  film</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>02</span></p>  </td>
  <td width=345 nowrap colspan=8 valign=bottom style='width:258.5pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Pertunjukan
  kesenian dan sejenisnya</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>03</span></p>  </td>
  <td width=345 nowrap colspan=6 valign=bottom style='width:195.9pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Pagelaran
  musik dan tari</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>04</span></p>  </td>
  <td width=345 nowrap colspan=2 valign=bottom style='width:68.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Diskotik</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>05</span></p>  </td>
  <td width=345 nowrap colspan=2 valign=bottom style='width:68.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Karaoke</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>06</span></p>  </td>
  <td width=345 nowrap colspan=3 valign=bottom style='width:100.2pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Klab Malam</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>07</span></p>  </td>
  <td width=345 nowrap colspan=4 valign=bottom style='width:132.65pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Permainan
  Billyard</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>08</span></p>  </td>
  <td width=345 nowrap colspan=5 valign=bottom style='width:164.85pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Permainan
  ketangkasan</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>09</span></p>  </td>
  <td width=345 nowrap colspan=5 valign=bottom style='width:164.85pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Panti
  Pijat / Mandi Uap</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>10</span></p>  </td>
  <td width=345 nowrap colspan=5 valign=bottom style='width:164.85pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Pertandingan
  olahraga</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>11</span></p>  </td>
  <td width=345 nowrap colspan=8 valign=bottom style='width:258.5pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Hiburan
  lainnya yang ditetapkan oleh</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap colspan=4 valign=bottom style='width:132.65pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Kepala
  Daerah :</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>yaitu</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>:</span></p>  </td>
  <td width=170 nowrap colspan=4 valign=bottom style='width:127.4pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>................................</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>2</span></p>  </td>
  <td width=718 nowrap colspan=7 valign=bottom style='width:213.4pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Harga
  tanda masuk yang berlaku</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <?php $nodet = 1; foreach($details_hiburan as $dethiburan): ?>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>-</span></p>  </td>
  <td width=82 nowrap colspan=2 valign=bottom style='width:61.15pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Kelas</span></p>  </td>
  <td width=124 nowrap colspan=3 valign=bottom style='width:92.9pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?= $dethiburan['tblobyekhiburandet_kelas'] ?></span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Rp.</span></p>  </td>
  <td width=133 nowrap colspan=3 valign=bottom style='width:99.65pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?= LokalIndonesia::ribuan($dethiburan['tblobyekhiburandet_tarif'],0,0) ?></span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <?php endforeach; ?>
 <?php /*tr style='height:15.25pt'>
  <td width=120 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>-</span></p>
  </td>
  <td width=82 nowrap colspan=2 valign=bottom style='width:61.15pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Kelas</span></p>
  </td>
  <td width=124 nowrap colspan=3 valign=bottom style='width:92.9pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>........................</span></p>
  </td>
  <td width=38 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=46 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Rp.</span></p>
  </td>
  <td width=133 nowrap colspan=3 valign=bottom style='width:99.65pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>........................</span></p>
  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=120 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>-</span></p>
  </td>
  <td width=82 nowrap colspan=2 valign=bottom style='width:61.15pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Kelas</span></p>
  </td>
  <td width=124 nowrap colspan=3 valign=bottom style='width:92.9pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>........................</span></p>
  </td>
  <td width=38 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=46 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Rp.</span></p>
  </td>
  <td width=133 nowrap colspan=3 valign=bottom style='width:99.65pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>........................</span></p>
  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>
  </td>
 </tr*/ ?>
 <tr style='height:9.9pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:9.9pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.9pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:9.9pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>3</span></p>  </td>
  <td width=718 nowrap colspan=9 valign=bottom style='width:280.3pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Jumlah
  pertunjukan rata-rata pada hari biasa</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=253 nowrap colspan=3 valign=bottom style='width:95.05pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?= LokalIndonesia::ribuan($detail_hiburan['tblobyekhiburan_tarijmlhhari'],0,0) ?></span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>kali</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap colspan=11 valign=bottom style='width:342.35pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Jumlah
  pertunjukan rata-rata pada hari libur/minggu</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=253 nowrap colspan=3 valign=bottom style='width:95.05pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?= LokalIndonesia::ribuan($detail_hiburan['tblobyekhiburan_tarijmlhlibur'],0,0) ?></span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>kali</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap colspan=10 valign=bottom style='width:311.4pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>(Khusus
  untuk Pertunjukan Film, Kesenian dan</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap colspan=8 valign=bottom style='width:245.5pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Sejenisnya,
  Pagelaran Musik dan Tari)</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:9.15pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:9.15pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=382 nowrap colspan=7 valign=bottom style='width:224.15pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.15pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:9.15pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>4</span></p>  </td>
  <td width=718 nowrap colspan=9 valign=bottom style='width:280.3pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Jumlah
  pengunjung rata-rata pada hari biasa</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=253 nowrap colspan=3 valign=bottom style='width:95.05pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?= LokalIndonesia::ribuan($detail_hiburan['tblobyekhiburan_tarijmlhhari'],0,0) ?></span></p>  </td>
  <td width=168 nowrap colspan=2 valign=bottom style='width:63.25pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>orang</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap colspan=11 valign=bottom style='width:342.35pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Jumlah
  pengunjung rata-rata pada hari libur/minggu</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=253 nowrap colspan=3 valign=bottom style='width:95.05pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?= LokalIndonesia::ribuan($detail_hiburan['tblobyekhiburan_tarijmlhlibur'],0,0) ?></span></p>  </td>
  <td width=168 nowrap colspan=2 valign=bottom style='width:63.25pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>orang</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:9.15pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:9.15pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=718 nowrap style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=382 nowrap colspan=7 valign=bottom style='width:224.15pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.15pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:9.15pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:9.15pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>5</span></p>  </td>
  <td width=718 nowrap colspan=5 style='width:155.8pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Jumlah
  meja / mesin</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=127 nowrap colspan=3 valign=bottom style='width:95.6pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><?= LokalIndonesia::ribuan($detail_hiburan['tblobyekhiburan_jmlhmesin'],0,0) ?></p>  </td>
  <td width=133 nowrap colspan=2 valign=bottom style='width:62.05pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>buah</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap colspan=10 style='width:311.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>(Khusus
  untuk Billyard, Permainan Ketangkasan)</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:6.85pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:6.85pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=718 nowrap style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:6.85pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:6.85pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>6</span></p>  </td>
  <td width=718 nowrap colspan=5 style='width:155.8pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Jumlah
  kamar / ruangan </span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=127 nowrap colspan=3 valign=bottom style='width:95.6pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?= LokalIndonesia::ribuan($detail_hiburan['tblobyekhiburan_jmlhkamar'],0,0) ?></span></p>  </td>
  <td width=133 nowrap colspan=2 valign=bottom style='width:62.05pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>buah</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap colspan=10 style='width:311.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>(Khusus
  untuk panti pijat, mandi uap, karaoke)</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:7.6pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=718 nowrap style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.6pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>7</span></p>  </td>
  <td width=718 nowrap colspan=17 style='width:538.25pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Apakah
  perusahaan menyediakan karcis bebas (free) kepada orang-orang tertentu :</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?= ($detail_hiburan['tblobyekhiburan_tarijmlhhari']=="T") ? "1" : "2" ?></span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>1</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Ya</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>2</span></p>  </td>
  <td width=345 nowrap colspan=2 valign=bottom style='width:68.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tidak</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap colspan=8 style='width:245.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Jika YA
  berapa jumlah yang beredar</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=133 nowrap colspan=3 valign=bottom style='width:99.65pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?= LokalIndonesia::ribuan($detail_hiburan['tblobyekhiburan_jmlhkarcisfree'],0,0) ?></span></p>  </td>
  <td width=253 nowrap colspan=2 valign=bottom style='width:62.6pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>buah</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>8</span></p>  </td>
  <td width=718 nowrap colspan=8 style='width:245.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Penjualan
  karcis dengan mesin tiket :</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?= ($detail_hiburan['tblobyekhiburan_tarijmlhhari']=="T") ? "1" : "2" ?></span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>1</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Ya</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>2</span></p>  </td>
  <td width=345 nowrap colspan=2 valign=bottom style='width:68.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tidak</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>9</span></p>  </td>
  <td width=718 nowrap colspan=9 style='width:280.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Melaksanakan
  Pembukuan / Pencatatan :</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?= ($detail_hiburan['tblobyekhiburan_ispembukuan']=="T") ? "1" : "2" ?></span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>1</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Ya</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>2</span></p>  </td>
  <td width=345 nowrap colspan=2 valign=bottom style='width:68.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tidak</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 
 <tr style='height:12.2pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;border:none;
  border-top:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-top:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:7.65pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:7.65pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'><span class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style='font-family:"Arial","sans-serif";color:black'>
  </span></span>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:7.65pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;padding:0in 5.4pt 0in 5.4pt;
  height:7.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:12.2pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
  <tr style='height:12.2pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:12.2pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:12.2pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:12.2pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:12.2pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:12.2pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:12.2pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:12.2pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;padding:0in 5.4pt 0in 5.4pt;
  height:12.2pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>	
 <tr style='height:15.25pt'>
  <td width=1038 nowrap colspan=23 valign=bottom style='width:778.6pt;
  border:solid windowtext 1.0pt;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>B. DIISI OLEH WP SELF ASSESMENT</span></b></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>1</span></p>  </td>
  <td width=918 nowrap colspan=22 valign=bottom style='width:688.5pt;
  border:none;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Jumlah
  Pajak Terhutang untuk Masa Pajak sebelumnya (akumulasi dari awal Masa Pajak
  dalam Tahun Pajak</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap colspan=3 valign=bottom style='width:91.75pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tertentu)
  :</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>a.</span></p>  </td>
  <td width=718 nowrap colspan=3 valign=bottom style='width:91.75pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Masa Pajak</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tgl</span></p>  </td>
  <td width=129 nowrap colspan=3 valign=bottom style='width:96.8pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>.........................</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>s/d</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tgl</span></p>  </td>
  <td width=170 nowrap colspan=3 valign=bottom style='width:96.3pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>.........................</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>b.</span></p>  </td>
  <td width=718 nowrap colspan=6 valign=bottom style='width:184.65pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Dasar
  Pengenaan (jumlah </span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Rp</span></p>  </td>
  <td width=129 nowrap colspan=2 valign=bottom style='width:65.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>................</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap colspan=6 valign=bottom style='width:184.65pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>pembayaran
  yang diterima)</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>c.</span></p>  </td>
  <td width=718 nowrap colspan=6 valign=bottom style='width:184.65pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tarif
  Pajak (sesuai Perda)</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=89 nowrap colspan=2 valign=bottom style='width:66.85pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>................</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>%</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>d.</span></p>  </td>
  <td width=718 nowrap colspan=5 valign=bottom style='width:155.8pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Pajak
  Terhutang ( b x c )</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Rp.</span></p>  </td>
  <td width=129 nowrap colspan=2 valign=bottom style='width:65.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>................</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>2</span></p>  </td>
  <td width=918 nowrap colspan=17 valign=bottom style='width:537.8pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Jumlah
  Pajak Terhutang untuk Masa Pajak sekarang (lampirkan foto copy dokumen)</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>a.</span></p>  </td>
  <td width=718 nowrap colspan=3 valign=bottom style='width:91.75pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Masa Pajak</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tgl</span></p>  </td>
  <td width=129 nowrap colspan=3 valign=bottom style='width:96.8pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaawal']) ?></span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>s/d</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tgl</span></p>  </td>
  <td width=170 nowrap colspan=3 valign=bottom style='width:96.3pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaakhir']) ?></span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>b.</span></p>  </td>
  <td width=718 nowrap colspan=6 valign=bottom style='width:184.65pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Dasar
  Pengenaan (jumlah </span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Rp</span></p>  </td>
  <td width=129 nowrap colspan=2 valign=bottom style='width:65.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?php echo LokalIndonesia::ribuan($data['detail_transaksi']['tbltransaksiketetapan_omzettotal'],0,0) ?></span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap colspan=6 valign=bottom style='width:184.65pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>pembayaran
  yang diterima)</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>c.</span></p>  </td>
  <td width=718 nowrap colspan=6 valign=bottom style='width:184.65pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tarif
  Pajak (sesuai Perda)</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=89 nowrap colspan=2 valign=bottom style='width:66.85pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?php echo ($data['detail_transaksi']['tbltransaksiketetapan_tarif']*100) ?></span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>%</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>d.</span></p>  </td>
  <td width=718 nowrap colspan=5 valign=bottom style='width:155.8pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Pajak
  Terhutang ( b x c )</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Rp.</span></p>  </td>
  <td width=129 nowrap colspan=2 valign=bottom style='width:65.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'><?php echo LokalIndonesia::ribuan($data['detail_transaksi']['tbltransaksiketetapan_pajak'],0,0) ?></span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap colspan=23 valign=bottom style='width:778.6pt;
  border:solid windowtext 1.0pt;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>C. DIISI OLEH PENGUSAHA HIBURAN OFFICIAL ASSESMENT</span></b></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>a.</span></p>  </td>
  <td width=718 nowrap colspan=3 valign=bottom style='width:91.75pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Masa Pajak</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tgl</span></p>  </td>
  <td width=129 nowrap colspan=3 valign=bottom style='width:96.8pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>.........................</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>s/d</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Tgl</span></p>  </td>
  <td width=170 nowrap colspan=3 valign=bottom style='width:96.3pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>.........................</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>b.</span></p>  </td>
  <td width=718 nowrap colspan=6 valign=bottom style='width:184.65pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Dasar
  Pengenaan (jumlah </span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>:</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Rp</span></p>  </td>
  <td width=129 nowrap colspan=2 valign=bottom style='width:65.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>................</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap colspan=6 valign=bottom style='width:184.65pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>pembayaran
  yang diterima)</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap colspan=23 valign=bottom style='width:778.6pt;
  border:solid windowtext 1.0pt;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>D. PERNYATAAN</span></b></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
  <td width=918 nowrap colspan=20 valign=bottom style='width:631.45pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>Dengan
  menyadari sepenuhnya akan segala akibat termasuk sanksi-sanksi sesuai dengan
  ketentuan</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
  <td width=918 nowrap colspan=20 valign=bottom style='width:631.45pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>perundang-undangan
  yang berlaku, saya atau yang saya beri kuasa menyatakan bahwa apa yang</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
  <td width=918 nowrap colspan=19 valign=bottom style='width:600.15pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>telah
  beritahukan tersebut diatas beserta lampiran-lampiran adalah benar, lengkap
  dan jelas</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td nowrap colspan=8 valign=bottom style='width:132.65pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <div align="center" class="xxxxxxxxx">
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>&nbsp;</p>  
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'><p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
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
  </span></p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>&nbsp;</p>
  </div>
  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></b></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap colspan=8 valign=bottom style='width:258.5pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>Wajib Pajak</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap colspan=6 valign=bottom style='width:189.6pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>____________________</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border:none;
  border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=253 nowrap colspan=6 valign=bottom style='width:189.6pt;padding:
  0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>Nama Jelas</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.25pt'></td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=1038 nowrap valign=bottom style='width:90.1pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=918 nowrap valign=bottom style='width:30.55pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=718 nowrap valign=bottom style='width:30.55pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=82 nowrap valign=bottom style='width:30.55pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.55pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=124 nowrap valign=bottom style='width:32.0pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=43 nowrap valign=bottom style='width:32.0pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=382 nowrap valign=bottom style='width:28.85pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=127 nowrap valign=bottom style='width:28.75pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=89 nowrap valign=bottom style='width:32.05pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=129 nowrap valign=bottom style='width:34.75pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=133 nowrap valign=bottom style='width:31.1pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=41 nowrap valign=bottom style='width:30.9pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=345 nowrap valign=bottom style='width:37.55pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=253 nowrap valign=bottom style='width:30.9pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=170 nowrap valign=bottom style='width:31.65pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=211 nowrap valign=bottom style='width:32.45pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=168 nowrap valign=bottom style='width:32.15pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=164 nowrap valign=bottom style='width:31.05pt;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=83 nowrap valign=bottom style='width:31.3pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Arial","sans-serif";
  color:black'>&nbsp;</span></p>  </td>
  <td width=42 nowrap valign=bottom style='width:31.3pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=39 nowrap valign=bottom style='width:29.4pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
  <td width=37 nowrap valign=bottom style='width:27.6pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Arial","sans-serif";color:black'>&nbsp;</span></p>  </td>
 </tr>
</table>

<p class=MsoNormal>&nbsp;</p>

</div>

</body>

</html>

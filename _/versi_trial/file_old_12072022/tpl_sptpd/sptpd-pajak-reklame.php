<?php 
	Yii::import('ext.LokalIndonesia');
	Yii::import('application.models.detail.ObyekHotel');
	$gethotel = ObyekHotel::model()->find('tblobyek_id=:idobyek', array(':idobyek'=>$data['id']));
	$idgolhotel = $gethotel['refgolhotel_id'];
	$golhotel = GolonganHotel::model()->findByPk($idgolhotel);
	$kodegol = $golhotel['refgolhotel_keterangan'];
	$detail_hotel = Yii::app()->db->createCommand()->select()->from('tblobyekhoteldet')->where('tblobyek_id=:idobyek', array(':idobyek'=>$data['id']))->queryAll();
	
?>

<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
<link rel=File-List href="SPTPD%20reklame_files/filelist.xml">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<style id="SPTPD all_31439_Styles"><!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.font531439
	{color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;}
.xl6531439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6631439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6731439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6831439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6931439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7031439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7131439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7231439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7331439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7431439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7531439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7631439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:underline;
	text-underline-style:single;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7731439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7831439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7931439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8031439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8131439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8231439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8331439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8431439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8531439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8631439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8731439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8831439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8931439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9031439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9131439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9231439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9331439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9431439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9531439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9631439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9731439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9831439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9931439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10031439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:underline;
	text-underline-style:single;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10131439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10231439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10331439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10431439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10531439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10631439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\@";
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10731439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\@";
	text-align:left;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10831439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10931439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11031439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11131439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11231439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11331439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11431439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11531439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11631439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11731439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11831439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11931439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12031439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12131439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12231439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12331439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12431439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12531439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12631439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12731439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl12831439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl12931439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl13031439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl13131439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl13231439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl13331439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl13431439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13531439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13631439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13731439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13831439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl13931439
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
--></style>
</head>

<body>
<!--[if !excel]>&nbsp;&nbsp;<![endif]
<!--The following information was generated by Microsoft Excel's Publish as Web
Page wizard.-->
<!--If the same item is republished from Excel, all information between the DIV
tags will be replaced.-->

<!--START OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD -->

<div id="SPTPD all_31439" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=1051 class=xl6731439
 style='border-collapse:collapse;table-layout:fixed;width:792pt'>
 <col class=xl6731439 width=25 style='mso-width-source:userset;mso-width-alt:
 914;width:19pt'>
 <col class=xl6731439 width=15 style='mso-width-source:userset;mso-width-alt:
 548;width:11pt'>
 <col class=xl6731439 width=18 style='mso-width-source:userset;mso-width-alt:
 658;width:14pt'>
 <col class=xl6731439 width=0 style='display:none;mso-width-source:userset;
 mso-width-alt:438'>
 <col class=xl6731439 width=47 style='mso-width-source:userset;mso-width-alt:
 1718;width:35pt'>
 <col class=xl6731439 width=7 style='mso-width-source:userset;mso-width-alt:
 256;width:5pt'>
 <col class=xl6731439 width=46 style='mso-width-source:userset;mso-width-alt:
 1682;width:35pt'>
 <col class=xl6731439 width=14 style='mso-width-source:userset;mso-width-alt:
 512;width:11pt'>
 <col class=xl6731439 width=33 span=3 style='mso-width-source:userset;
 mso-width-alt:1206;width:25pt'>
 <col class=xl6731439 width=26 style='mso-width-source:userset;mso-width-alt:
 950;width:20pt'>
 <col class=xl6731439 width=23 style='mso-width-source:userset;mso-width-alt:
 841;width:17pt'>
 <col class=xl6731439 width=33 span=3 style='mso-width-source:userset;
 mso-width-alt:1206;width:25pt'>
 <col class=xl6731439 width=28 style='mso-width-source:userset;mso-width-alt:
 1024;width:21pt'>
 <col class=xl6731439 width=60 style='mso-width-source:userset;mso-width-alt:
 2194;width:45pt'>
 <col class=xl6731439 width=34 style='mso-width-source:userset;mso-width-alt:
 1243;width:26pt'>
 <col class=xl6731439 width=63 style='mso-width-source:userset;mso-width-alt:
 2304;width:47pt'>
 <col class=xl6731439 width=23 style='mso-width-source:userset;mso-width-alt:
 841;width:17pt'>
 <col class=xl6731439 width=43 style='mso-width-source:userset;mso-width-alt:
 1572;width:32pt'>
 <col class=xl6731439 width=33 style='mso-width-source:userset;mso-width-alt:
 1206;width:25pt'>
 <col class=xl6731439 width=22 style='mso-width-source:userset;mso-width-alt:
 804;width:17pt'>
 <col class=xl6731439 width=33 style='mso-width-source:userset;mso-width-alt:
 1206;width:25pt'>
 <col class=xl6731439 width=32 style='mso-width-source:userset;mso-width-alt:
 1170;width:24pt'>
 <col class=xl6731439 width=53 style='mso-width-source:userset;mso-width-alt:
 1938;width:40pt'>
 <col class=xl6731439 width=47 style='mso-width-source:userset;mso-width-alt:
 1718;width:35pt'>
 <col class=xl6731439 width=33 style='mso-width-source:userset;mso-width-alt:
 1206;width:25pt'>
 <col class=xl6731439 width=64 span=2 style='width:48pt'>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6731439 width=25 style='height:15.0pt;width:19pt'></td>
  <td class=xl6731439 width=15 style='width:11pt'></td>
  <td class=xl6731439 width=18 style='width:14pt'></td>
  <td class=xl6731439 width=0></td>
  <td class=xl6731439 width=47 style='width:35pt'></td>
  <td class=xl6731439 width=7 style='width:5pt'></td>
  <td class=xl6731439 width=46 style='width:35pt'></td>
  <td class=xl6731439 width=14 style='width:11pt'></td>
  <td class=xl6731439 width=33 style='width:25pt'></td>
  <td class=xl6731439 width=33 style='width:25pt'></td>
  <td class=xl6731439 width=33 style='width:25pt'></td>
  <td class=xl6731439 width=26 style='width:20pt'></td>
  <td class=xl6731439 width=23 style='width:17pt'></td>
  <td class=xl6731439 width=33 style='width:25pt'></td>
  <td class=xl6731439 width=33 style='width:25pt'></td>
  <td class=xl6731439 width=33 style='width:25pt'></td>
  <td class=xl6731439 width=28 style='width:21pt'></td>
  <td class=xl6731439 width=60 style='width:45pt'></td>
  <td class=xl6731439 width=34 style='width:26pt'></td>
  <td class=xl6731439 width=63 style='width:47pt'></td>
  <td class=xl6731439 width=23 style='width:17pt'></td>
  <td class=xl6731439 width=43 style='width:32pt'></td>
  <td class=xl6731439 width=33 style='width:25pt'></td>
  <td class=xl6731439 width=22 style='width:17pt'></td>
  <td class=xl6731439 width=33 style='width:25pt'></td>
  <td class=xl6731439 width=32 style='width:24pt'></td>
  <td class=xl6731439 width=53 style='width:40pt'></td>
  <td class=xl6731439 width=47 style='width:35pt'></td>
  <td class=xl6731439 width=33 style='width:25pt'></td>
  <td class=xl6731439 width=64 style='width:48pt'></td>
  <td class=xl6731439 width=64 style='width:48pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6531439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl6631439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl6631439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439 colspan=9><span
  style='mso-spacerun:yes'>&nbsp;</span>PEMERINTAH KOTA TEGAL</td>
  <td class=xl6731439></td>
  <td class=xl8231439></td>
  <td class=xl8231439></td>
  <td class=xl8231439></td>
  <td class=xl8231439></td>
  <td class=xl8231439></td>
  <td class=xl8531439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9131439 colspan=2>No. SPTPD</td>
  <td class=xl8231439></td>
  <td class=xl8431439>:</td>
  <td colspan=4 class=xl9231439><?php echo $data['surat']['tblobyek_nomorsptpd']; ?></td>
  <td class=xl9431439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439 colspan=14><span style='mso-spacerun:yes'>&nbsp;</span><?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI')) ?></td>
  <td class=xl8231439></td>
  <td class=xl8531439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl8231439></td>
  <td class=xl7431439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td colspan=8 class=xl9531439><span style='mso-spacerun:yes'>&nbsp;</span>Jl. Ki
  Gede Sebayu No. 3</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl8331439 width=26 style='width:20pt'></td>
  <td class=xl8331439 width=23 style='width:17pt'></td>
  <td class=xl8331439 width=33 style='width:25pt'></td>
  <td class=xl8331439 width=33 style='width:25pt'></td>
  <td class=xl8331439 width=33 style='width:25pt'></td>
  <td class=xl8631439 width=28 style='width:21pt'>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9131439 colspan=2>Masa Pajak</td>
  <td class=xl8331439 width=43 style='width:32pt'></td>
  <td class=xl8431439>:</td>
  <td colspan=4 class=xl9231439>................................</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td colspan=8 class=xl9531439><span style='mso-spacerun:yes'>&nbsp;</span>Telp.
  (0283) 355137 - 355138</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl8331439 width=26 style='width:20pt'></td>
  <td class=xl8331439 width=23 style='width:17pt'></td>
  <td class=xl8331439 width=33 style='width:25pt'></td>
  <td class=xl8331439 width=33 style='width:25pt'></td>
  <td class=xl8331439 width=33 style='width:25pt'></td>
  <td class=xl8631439 width=28 style='width:21pt'>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl8331439 width=43 style='width:32pt'></td>
  <td class=xl8331439 width=33 style='width:25pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439 colspan=9><span style='mso-spacerun:yes'>&nbsp;</span>T E G A
  L</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9131439 colspan=2>Tahun Pajak</td>
  <td class=xl6731439></td>
  <td class=xl8431439>:</td>
  <td colspan=4 class=xl9231439>................................</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439 colspan=4><span style='mso-spacerun:yes'>&nbsp;</span></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl8831439>&nbsp;</td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl8731439>&nbsp;</td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6531439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl9631439>&nbsp;</td>
  <td colspan=5 class=xl9631439>&nbsp;</td>
  <td class=xl9631439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439 style='border-top:none'>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439 style='border-top:none'>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl6631439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td colspan=27 class=xl11931439 style='border-right:.5pt solid black'>SPTPD</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td colspan=27 class=xl9331439 style='border-right:.5pt solid black'>(SURAT
  PEMBERITAHUAN PAJAK DAERAH)</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td colspan=27 class=xl9331439 style='border-right:.5pt solid black'>PAJAK
  REKLAME</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td colspan=4 class=xl7331439><span
  style='mso-spacerun:yes'>&nbsp;</span>N.P.W.P.D</td>
  <td class=xl6731439>:</td>
  <td class=xl6731439 colspan=6>..............</td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=3>Kepada Yth,</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td colspan=4 class=xl9531439>&nbsp;NAMA WP</td>
  <td class=xl6731439>:</td>
  <td class=xl6731439 colspan=6>..............</td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td colspan=5 class=xl9231439><?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI_SINGKAT')) ?> KOTA TEGAL</td>
  <td class=xl9731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td colspan=4 class=xl9531439>&nbsp;ALAMAT</td>
  <td class=xl6731439>:</td>
  <td class=xl6731439 colspan=6>..............</td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439>di</td>
  <td class=xl9731439></td>
  <td class=xl9731439></td>
  <td class=xl9731439></td>
  <td class=xl9731439></td>
  <td class=xl9731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td colspan=4 class=xl9231439>T E G A L</td>
  <td class=xl9731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td colspan=5 class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl11431439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl11331439>&nbsp;</td>
  <td class=xl11331439>&nbsp;</td>
  <td class=xl11331439>&nbsp;</td>
  <td class=xl11331439>&nbsp;</td>
  <td class=xl11331439>&nbsp;</td>
  <td class=xl11331439>&nbsp;</td>
  <td class=xl11331439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl11331439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl10131439>&nbsp;</td>
  <td class=xl10231439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439 colspan=6><span
  style='mso-spacerun:yes'>&nbsp;</span>PERHATIAN :</td>
  <td class=xl7131439></td>
  <td class=xl7131439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9331439>1</td>
  <td class=xl6731439 colspan=9>Harap diisi<span style='mso-spacerun:yes'>&nbsp;
  </span>dengan huruf CETAK</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9331439>2</td>
  <td class=xl6731439 colspan=26 style='border-right:.5pt solid black'>Setelah
  Formulir Pendaftaran ini diisi dan ditandatangani oleh wajib pajak , harap
  diserahkan kembali kepada Dinas, Pendapatan,</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9331439>&nbsp;</td>
  <td class=xl6731439 colspan=25>Pengelolaan Keuangan dan Aset Daerah langsung
  atau dikirim melalui Pos paling lambat tanggal sejak berakhirnya<span
  style='mso-spacerun:yes'>&nbsp;</span></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl6731439 style='height:14.25pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439 colspan=5>masa pajak</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl6731439 style='height:14.25pt'></td>
  <td class=xl6831439 align=right>3</td>
  <td class=xl6731439 colspan=19>Keterlambatan penyerahan SPTPD pada tanggal
  tersebut akan dilakukan teguran SPTPD</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl6731439 style='height:14.25pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td colspan=27 class=xl11631439 style='border-right:.5pt solid black'>A.
  DIISI OLEH WAJIB PAJAK</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7931439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl7231439>1.</td>
  <td class=xl7231439></td>
  <td class=xl7931439 colspan=5>Data obyek pajak</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7931439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td colspan=3 rowspan=3 class=xl12431439 style='border-bottom:.5pt solid black'>No.</td>
  <td colspan=7 rowspan=3 class=xl12431439 style='border-bottom:.5pt solid black'>Jenis
  Reklame dan Thema</td>
  <td colspan=5 rowspan=3 class=xl10331439 width=150 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black;width:113pt'>Lokasi<span
  style='mso-spacerun:yes'>&nbsp;&nbsp; </span>Pemasangan</td>
  <td colspan=4 rowspan=3 class=xl12431439 style='border-bottom:.5pt solid black'>Ukuran</td>
  <td colspan=3 rowspan=3 class=xl10331439 width=98 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black;width:74pt'>Jumlah (buah)</td>
  <td colspan=3 rowspan=3 class=xl10931439 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black'>Masa Pajak</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl10931439 style='border-top:none'>&nbsp;</td>
  <td class=xl11031439 style='border-top:none'>&nbsp;</td>
  <td class=xl11031439 style='border-top:none'>&nbsp;</td>
  <td class=xl10931439 style='border-top:none'>&nbsp;</td>
  <td class=xl11031439 style='border-top:none'>&nbsp;</td>
  <td class=xl11031439 style='border-top:none'>&nbsp;</td>
  <td class=xl11031439 style='border-top:none'>&nbsp;</td>
  <td class=xl11031439 style='border-top:none'>&nbsp;</td>
  <td class=xl11031439 style='border-top:none'>&nbsp;</td>
  <td class=xl11031439 style='border-top:none'>&nbsp;</td>
  <td class=xl10331439 width=23 style='border-top:none;width:17pt'>&nbsp;</td>
  <td class=xl10431439 width=33 style='border-top:none;width:25pt'>&nbsp;</td>
  <td class=xl10431439 width=33 style='border-top:none;width:25pt'>&nbsp;</td>
  <td class=xl10431439 width=33 style='border-top:none;width:25pt'>&nbsp;</td>
  <td class=xl10431439 width=28 style='border-top:none;width:21pt'>&nbsp;</td>
  <td class=xl10931439 style='border-top:none'>&nbsp;</td>
  <td class=xl11031439 style='border-top:none'>&nbsp;</td>
  <td class=xl11031439 style='border-top:none'>&nbsp;</td>
  <td class=xl11131439 style='border-top:none'>&nbsp;</td>
  <td class=xl10431439 width=43 style='border-top:none;width:32pt'>&nbsp;</td>
  <td class=xl10431439 width=33 style='border-top:none;width:25pt'>&nbsp;</td>
  <td class=xl10531439 width=22 style='border-top:none;width:17pt'>&nbsp;</td>
  <td class=xl11031439 style='border-top:none'>&nbsp;</td>
  <td class=xl11031439 style='border-top:none'>&nbsp;</td>
  <td class=xl11131439 style='border-top:none'>&nbsp;</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9331439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td colspan=3 class=xl9331439>1.</td>
  <td class=xl6831439 colspan=2><span style='mso-spacerun:yes'>&nbsp;</span>Jenis</td>
  <td class=xl6731439>:</td>
  <td colspan=3 class=xl7231439>.......</td>
  <td class=xl6731439>*)</td>
  <td colspan=5 class=xl9331439>.....................</td>
  <td class=xl10731439>Panjang</td>
  <td class=xl10631439>:</td>
  <td class=xl6731439>.....</td>
  <td class=xl6931439>m</td>
  <td colspan=3 class=xl7231439 style='border-right:.5pt solid black'>.....................</td>
  <td colspan=3 class=xl7231439 style='border-right:.5pt solid black'>......................</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl7931439></td>
  <td class=xl6831439 colspan=2>Thema</td>
  <td class=xl6731439>:</td>
  <td colspan=3 class=xl7231439>.......</td>
  <td class=xl6731439></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl10731439>Lebar</td>
  <td class=xl10631439>:</td>
  <td class=xl6731439>.....</td>
  <td class=xl6931439>m</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td colspan=3 class=xl7231439 style='border-right:.5pt solid black'>s/d</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl9331439>&nbsp;</td>
  <td class=xl7231439></td>
  <td class=xl7931439></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td colspan=3 class=xl7231439>.......</td>
  <td class=xl6731439></td>
  <td class=xl9331439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl10731439>Tinggi</td>
  <td class=xl10631439>:</td>
  <td class=xl6731439>.....</td>
  <td class=xl6931439>m</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td colspan=3 class=xl7231439 style='border-right:.5pt solid black'>......................</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl7931439></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9331439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6831439>Luas</td>
  <td class=xl6731439>:</td>
  <td class=xl6731439>.....</td>
  <td class=xl6931439>m<font class="font531439"></font></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl7931439></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9331439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl7931439></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9331439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl7931439></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9331439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl7931439></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9331439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl7831439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl11531439>&nbsp;</td>
  <td class=xl7831439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl9931439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl8831439>&nbsp;</td>
  <td class=xl7831439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7531439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7531439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7531439>&nbsp;</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7931439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7931439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl10031439 colspan=5>Keterangan :</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439 colspan=5>Jenis Reklame</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td colspan=5 class=xl9231439>Permanen<span style='mso-spacerun:yes'>&nbsp;</span></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=4>Non Permanen</td>
  <td class=xl6731439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=2>Keterangan:</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl9231439 colspan=8>1. Reklame Papan/Billboard/</td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=4>1. Reklame Kain</td>
  <td class=xl6731439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9231439>Panjang</td>
  <td class=xl7231439>:</td>
  <td class=xl6731439 colspan=5>panjang bidang reklame</td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl9231439 colspan=7><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;
  </span>Videotron / Megatron</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439>a.</td>
  <td class=xl6731439 colspan=2>Spanduk</td>
  <td class=xl6731439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9231439>Lebar</td>
  <td class=xl7231439>:</td>
  <td class=xl6731439 colspan=5>lebar bidang reklame</td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl9231439>a.</td>
  <td class=xl9131439>Papan</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439>b.</td>
  <td class=xl6731439 colspan=3>Umbul-Umbul</td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9231439>Tinggi</td>
  <td class=xl7231439>:</td>
  <td class=xl6731439 colspan=7 style='border-right:.5pt solid black'>jarak
  antara ambang atas reklame<span style='mso-spacerun:yes'>&nbsp;</span></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl9231439>b.</td>
  <td class=xl9131439 colspan=3>ThinPlat</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439>c.</td>
  <td class=xl6731439 colspan=2>Banner</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=5>sampai ambang bawah</td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl9231439>c.</td>
  <td class=xl6731439 colspan=3>Billboard</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439>d.</td>
  <td class=xl6731439 colspan=2>Baliho</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9231439>Luas</td>
  <td class=xl7231439>:</td>
  <td class=xl6731439 colspan=4>panjang kali lebar</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl9231439>d.</td>
  <td class=xl6731439 colspan=3>Neonsign</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439>e.</td>
  <td class=xl6731439 colspan=3>LayarToko</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl9231439>e.</td>
  <td class=xl6731439 colspan=3>Neonbox</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=6>2. Reklame Selebaran</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl10831439></td>
  <td class=xl10831439></td>
  <td class=xl10831439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl9231439>f.</td>
  <td class=xl6731439 colspan=5>Megatron / Videotron</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=5>3. Reklame Berjalan</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=5>4. Reklame Udara</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=5>5. Reklame Suara</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td rowspan=2 class=xl13931439 width=63 style='width:47pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=5>6. Reklame Film/Slide</td>
  <td class=xl6731439></td>
  <td class=xl9731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td colspan=2 rowspan=2 class=xl13831439 width=65 style='width:49pt'></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td colspan=2 class=xl9231439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439 colspan=6>*) Isikan Salah Satu</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl7831439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl8831439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7531439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl8831439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td colspan=27 class=xl11631439 style='border-right:.5pt solid black'>B.
  DIISI OLEH WAJIB PAJAK</td>
  <td class=xl6731439></td>
  <td class=xl9831439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439 colspan=14>Dihitung berdasarkanNilai Kontrak dengan Pihak
  Ketiga :</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439>a.</td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=3>Masa Pajak</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439>:</td>
  <td class=xl9231439>Tgl</td>
  <td colspan=4 class=xl9231439>.........................</td>
  <td class=xl7231439>s/d</td>
  <td class=xl7231439></td>
  <td class=xl6731439>Tgl</td>
  <td colspan=3 class=xl9231439>.........................</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439>b.</td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=3>Nilai Kontrak</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439>:</td>
  <td class=xl9231439>Rp</td>
  <td colspan=3 class=xl9231439>................</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl9831439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439>c.</td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=6>Tarif Pajak (sesuai Perda)</td>
  <td class=xl6731439></td>
  <td class=xl6731439>:</td>
  <td colspan=2 class=xl12231439>25%</td>
  <td class=xl9231439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439>d.</td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=6>Pajak Terhutang ( b x c )</td>
  <td class=xl6731439></td>
  <td class=xl6731439>:</td>
  <td class=xl9231439>Rp.</td>
  <td colspan=3 class=xl9231439>................</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl7831439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl11231439>&nbsp;</td>
  <td class=xl11231439>&nbsp;</td>
  <td class=xl11231439>&nbsp;</td>
  <td class=xl11231439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7531439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr class=xl6731439 height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td colspan=27 class=xl11631439 style='border-right:.5pt solid black'>C.
  PERNYATAAN</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td colspan=25 rowspan=3 class=xl13331439 width=803 style='width:606pt'>Dengan
  menyadari sepenuhnya akan segala akibat termasuk sanksi-sanksi sesuai dengan
  ketentuan perundang-undangan yang berlaku, saya atau yang saya beri kuasa
  menyatakan bahwa apa yang telah kami beritahukan tersebut di atas beserta
  lampiran-lampirannya adalah benar, lengkap dan jelas</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl6731439 style='height:16.5pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td class=xl9831439></td>
  <td colspan=5 class=xl9231439>...............................,</td>
  <td colspan=2 class=xl7231439>Tahun</td>
  <td colspan=2 class=xl9231439>...............</td>
  <td class=xl9831439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td colspan=9 class=xl7231439>Wajib Pajak</td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl8931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl7231439></td>
  <td colspan=6 class=xl7231439>____________________</td>
  <td class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td colspan=6 class=xl7231439>Nama Jelas</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl8831439>&nbsp;</td>
  <td class=xl8831439>&nbsp;</td>
  <td class=xl8831439>&nbsp;</td>
  <td class=xl8831439>&nbsp;</td>
  <td class=xl8831439>&nbsp;</td>
  <td class=xl8831439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td colspan=27 class=xl11631439 style='border-right:.5pt solid black'>D.
  DIISI OLEH PETUGAS PENERIMA <?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI_SINGKAT')) ?> KOTA TEGAL</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl7431439></td>
  <td class=xl7431439></td>
  <td class=xl7431439></td>
  <td class=xl7431439></td>
  <td class=xl7431439></td>
  <td class=xl7431439></td>
  <td class=xl7431439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9831439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439 colspan=10>Penghitungan dan Penetapan Pajak :</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439>&nbsp;</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439>&nbsp;</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439>&nbsp;</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439>&nbsp;</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439>&nbsp;</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439>&nbsp;</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439>&nbsp;</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439>&nbsp;</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439>&nbsp;</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439>&nbsp;</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439>&nbsp;</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439>&nbsp;</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439>&nbsp;</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439>&nbsp;</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9531439>&nbsp;</td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl9231439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl8931439>&nbsp;</td>
  <td class=xl9131439></td>
  <td class=xl9131439></td>
  <td class=xl8431439></td>
  <td class=xl9131439></td>
  <td class=xl9131439></td>
  <td class=xl9131439></td>
  <td class=xl9131439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl8931439>&nbsp;</td>
  <td class=xl9131439></td>
  <td class=xl9131439></td>
  <td class=xl8431439></td>
  <td class=xl9131439></td>
  <td class=xl9131439></td>
  <td class=xl9131439></td>
  <td class=xl9131439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl8931439>&nbsp;</td>
  <td class=xl9131439></td>
  <td class=xl9131439></td>
  <td class=xl8431439></td>
  <td class=xl9131439></td>
  <td class=xl9131439></td>
  <td class=xl9131439></td>
  <td class=xl9131439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl8931439>&nbsp;</td>
  <td class=xl9131439 colspan=5>Diterima tanggal</td>
  <td class=xl9131439>:</td>
  <td colspan=5 class=xl9131439>................................</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl8931439>&nbsp;</td>
  <td class=xl9131439 colspan=5>Nama Petugas</td>
  <td class=xl9131439>:</td>
  <td colspan=5 class=xl9131439>................................</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl8931439>&nbsp;</td>
  <td class=xl9131439 colspan=3>NIP</td>
  <td class=xl9131439></td>
  <td class=xl9131439></td>
  <td class=xl9131439>:</td>
  <td colspan=5 class=xl9131439>................................</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td colspan=6 class=xl7231439></td>
  <td class=xl6731439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl7831439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7531439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td colspan=27 class=xl7231439>----------------------- Gunting Disini
  --------------------------------'<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;</span></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6531439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td colspan=3 class=xl12331439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439>&nbsp;</td>
  <td class=xl8031439 style='border-top:none'>&nbsp;</td>
  <td class=xl6631439 style='border-top:none'>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl8931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=2>NO. SPTPD</td>
  <td class=xl6731439></td>
  <td colspan=4 class=xl7231439>...............................</td>
  <td class=xl7231439></td>
  <td class=xl9031439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl7631439><u style='visibility:hidden;mso-ignore:visibility'>&nbsp;</u></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td colspan=19 class=xl9831439>TANDA TERIMA</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl7331439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl8131439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=3>NPWPD</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439>:</td>
  <td class=xl7231439></td>
  <td colspan=12 class=xl9231439>...........................................................................................................</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl7731439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439>NAMA</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439>:</td>
  <td class=xl7231439></td>
  <td colspan=12 class=xl9231439>...........................................................................................................</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl7731439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439 colspan=3>ALAMAT</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439>:</td>
  <td class=xl7231439></td>
  <td colspan=12 class=xl9231439>------------------------------------------------------------</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl7731439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl7731439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td colspan=2 class=xl7231439>...............</td>
  <td class=xl6731439>, ......<span style='display:none'>.</span></td>
  <td colspan=2 class=xl9731439>....... Tahun</td>
  <td class=xl6731439 colspan=2>.......</td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl7731439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td colspan=6 class=xl7231439>Yang menerima</td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6831439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl7231439></td>
  <td class=xl6931439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl9331439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td colspan=6 class=xl7231439>( ........................ )</td>
  <td class=xl7231439></td>
  <td class=xl9431439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl7831439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7031439>&nbsp;</td>
  <td class=xl7531439>&nbsp;</td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6731439 style='height:15.0pt'></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
  <td class=xl6731439></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=25 style='width:19pt'></td>
  <td width=15 style='width:11pt'></td>
  <td width=18 style='width:14pt'></td>
  <td width=0></td>
  <td width=47 style='width:35pt'></td>
  <td width=7 style='width:5pt'></td>
  <td width=46 style='width:35pt'></td>
  <td width=14 style='width:11pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=26 style='width:20pt'></td>
  <td width=23 style='width:17pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=28 style='width:21pt'></td>
  <td width=60 style='width:45pt'></td>
  <td width=34 style='width:26pt'></td>
  <td width=63 style='width:47pt'></td>
  <td width=23 style='width:17pt'></td>
  <td width=43 style='width:32pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=22 style='width:17pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=32 style='width:24pt'></td>
  <td width=53 style='width:40pt'></td>
  <td width=47 style='width:35pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=64 style='width:48pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>






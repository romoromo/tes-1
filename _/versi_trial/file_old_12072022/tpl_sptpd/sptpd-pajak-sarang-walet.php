<?php 
	Yii::import('ext.LokalIndonesia');
	Yii::import('application.models.detail.ObyekWalet');
	$getwalet = ObyekWalet::model()->find('tblobyek_id=:idobyek', array(':idobyek'=>$data['id']));
	$detail_walet = Yii::app()->db->createCommand()->select()->from('tblobyekwalet')->where('tblobyek_id=:idobyek', array(':idobyek'=>$data['id']))->queryAll();
	
?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 12">
<link rel=File-List
href="SPTPD%20Pajak%20Sarang%20Burung%20Walet_files/filelist.xml">
<style id="SPTPD all_29579_Styles">
<!--table
	{mso-displayed-decimal-separator:"\,";
	mso-displayed-thousand-separator:"\.";}
.xl6529579
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
.xl6629579
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
.xl6729579
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
.xl6829579
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
.xl6929579
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
.xl7029579
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
.xl7129579
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
.xl7229579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl7329579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl7429579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl7529579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7629579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl7729579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7829579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl7929579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8029579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8129579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8229579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl8329579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8429579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8529579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl8629579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl8729579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl8829579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl8929579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl9029579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl9129579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9229579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9329579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9429579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl9529579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9629579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9729579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9829579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9929579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl10029579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl10129579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl10229579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10329579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl10429579
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
.xl10529579
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
.xl10629579
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
.xl10729579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10pt;
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
.xl10829579
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
.xl10929579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl11029579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl11129579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl11229579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11329579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl11429579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl11529579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11629579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl11729579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Bookman Old Style", serif;
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
.xl11829579
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10pt;
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
-->
</style>
<title>SPTPD <?php echo $data['surat']['tblobyek_nama'] ?></title></head>

<body>
<!--[if !excel]>&nbsp;&nbsp;<![endif]-->

<div id="SPTPD all_29579" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=960 class=xl7529579
 style='border-collapse:collapse;table-layout:fixed;width:733pt'>
 <col class=xl7529579 width=10 style='mso-width-source:userset;mso-width-alt:
 365;width:8pt'>
 <col class=xl7529579 width=38 span=25 style='mso-width-source:userset;
 mso-width-alt:1389;width:29pt'>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl7529579 width=10 style='height:15.0pt;width:8pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
  <td class=xl7529579 width=38 style='width:29pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7229579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7429579>&nbsp;</td>
  <td class=xl7129579>&nbsp;</td>
  <td class=xl7129579>&nbsp;</td>
  <td class=xl7129579>&nbsp;</td>
  <td class=xl7129579>&nbsp;</td>
  <td class=xl7129579>&nbsp;</td>
  <td class=xl7129579>&nbsp;</td>
  <td class=xl7129579>&nbsp;</td>
  <td class=xl7129579>&nbsp;</td>
  <td class=xl7129579>&nbsp;</td>
  <td class=xl7129579>&nbsp;</td>
  <td class=xl6729579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579 colspan=6><span
  style='mso-spacerun:yes'>&nbsp;</span>PEMERINTAH KOTA TEGAL</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7729579></td>
  <td class=xl7729579></td>
  <td class=xl7729579></td>
  <td class=xl7729579></td>
  <td class=xl7729579></td>
  <td class=xl7829579>&nbsp;</td>
  <td class=xl6529579></td>
  <td class=xl10729579 colspan=3>No. SPTPD</td>
  <td class=xl10629579>:</td>
  <td colspan=5 class=xl11829579><?php echo $data['surat']['tblobyek_nomorsptpd']; ?></td>
  <td class=xl10529579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579 colspan=11><span style='mso-spacerun:yes'>&nbsp;</span><?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI')) ?></td>
  <td class=xl7729579></td>
  <td class=xl7729579></td>
  <td class=xl7829579>&nbsp;</td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6929579></td>
  <td class=xl10829579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6629579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td colspan=7 class=xl8629579><span style='mso-spacerun:yes'>&nbsp;</span>Jl. Ki
  Gede Sebayu No. 5</td>
  <td class=xl8329579></td>
  <td class=xl8429579 width=38 style='width:29pt'></td>
  <td class=xl8429579 width=38 style='width:29pt'></td>
  <td class=xl8429579 width=38 style='width:29pt'></td>
  <td class=xl8429579 width=38 style='width:29pt'></td>
  <td class=xl8429579 width=38 style='width:29pt'></td>
  <td class=xl8529579 width=38 style='width:29pt'>&nbsp;</td>
  <td class=xl6529579></td>
  <td class=xl10729579 colspan=3>Masa Pajak</td>
  <td class=xl10629579>:</td>
  <td colspan=5 class=xl11829579><?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaawal']) ?> s/d <?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaakhir']) ?></td>
  <td class=xl6629579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td colspan=7 class=xl8629579><span style='mso-spacerun:yes'>&nbsp;</span>Telp.
  (0283) 355137 - 355138</td>
  <td class=xl7529579></td>
  <td class=xl8429579 width=38 style='width:29pt'></td>
  <td class=xl8429579 width=38 style='width:29pt'></td>
  <td class=xl8429579 width=38 style='width:29pt'></td>
  <td class=xl8429579 width=38 style='width:29pt'></td>
  <td class=xl8429579 width=38 style='width:29pt'></td>
  <td class=xl8529579 width=38 style='width:29pt'>&nbsp;</td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl7029579 width=38 style='width:29pt'></td>
  <td class=xl7029579 width=38 style='width:29pt'></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6629579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl8629579 colspan=8><span style='mso-spacerun:yes'>&nbsp;</span>T E G A
  L</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8229579>&nbsp;</td>
  <td class=xl6529579></td>
  <td class=xl10729579 colspan=3>Tahun Pajak</td>
  <td class=xl10629579>:</td>
  <td colspan=5 class=xl11829579><?php echo $data['detail_transaksi']['tbltransaksiketetapan_tahunpajak'] ?></td>
  <td class=xl6629579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl8629579 colspan=3><span style='mso-spacerun:yes'>&nbsp;</span></td>
  <td class=xl8329579></td>
  <td class=xl8329579></td>
  <td class=xl8329579></td>
  <td class=xl8329579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8229579>&nbsp;</td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6629579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl8629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8729579>&nbsp;</td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8829579>&nbsp;</td>
  <td class=xl10429579></td>
  <td class=xl10429579></td>
  <td class=xl10429579></td>
  <td class=xl6529579></td>
  <td class=xl6829579>&nbsp;</td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6529579></td>
  <td class=xl6629579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7229579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl9029579>&nbsp;</td>
  <td colspan=5 class=xl9029579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7429579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td colspan=25 class=xl11429579 style='border-right:.5pt solid black'>SPTPD</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td colspan=25 class=xl9429579 style='border-right:.5pt solid black'>(SURAT
  PEMBERITAHUAN PAJAK DAERAH)</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td colspan=25 class=xl9429579 style='border-right:.5pt solid black'>PAJAK
  SARANG BURUNG WALET</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579 colspan=3><span
  style='mso-spacerun:yes'>&nbsp;</span>N.P.W.P.D</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579 colspan=3>Kepada Yth,</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td colspan=6 class=xl8629579><span
  style='mso-spacerun:yes'>&nbsp;</span><?php echo $data['surat']['tblsubyek_npwpd']; ?></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td colspan=6 class=xl11829579>Kepala <?= AppConfig::model()->getValue('APLIKASI_INSTANSI_SINGKAT') ?> Kota Tegal</td>
  <td class=xl9129579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td colspan=6 class=xl11829579>Jl Ki Gede Sebayu No. 5</td>
  <td class=xl9129579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl6529579>di</td>
  <td colspan=5 class=xl11829579>TEGAL</td>
  <td class=xl9129579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8729579>&nbsp;</td>
  <td colspan=5 class=xl8729579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8729579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl9229579><span style='mso-spacerun:yes'>&nbsp;</span>PERHATIAN :<span
  style='display:none'></span></td>
  <td class=xl9329579></td>
  <td class=xl9329579></td>
  <td class=xl9329579></td>
  <td class=xl9329579></td>
  <td class=xl9329579></td>
  <td class=xl9329579></td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7429579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl9429579>1</td>
  <td class=xl7529579 colspan=12>Harap diisi dalam rangkap dua (2) dengan huruf
  CETAK</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl9429579>2</td>
  <td class=xl7529579 colspan=5>Beri nomor pada kotak</td>
  <td class=xl9529579>&nbsp;</td>
  <td class=xl7529579 colspan=10><span style='mso-spacerun:yes'>&nbsp;</span>yang
  tersedia untuk jawaban yang diberikan</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl9429579>3</td>
  <td class=xl7529579 colspan=14>Setelah diisi dan ditanda tangani, harap
  diserahkan kembali kepada <?= AppConfig::model()->getValue('APLIKASI_INSTANSI') ?> paling lambat tanggal 15 bulan</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl9429579></td>
  <td class=xl7529579 colspan=14>berikutnya</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl9429579>4</td>
  <td class=xl7529579 colspan=19>Keterlambatan Penyerahan pada tanggal tersebut
  diatas akan dilakukan teguran kepada WP dan apabila masih belum</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579 colspan=19>menyerahkan dokumen
  dalam 7 (tujuh) hari setelah Surat Teguran diterima akan dilakukan penetapan secara
  jabatan</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td colspan=25 class=xl10929579 style='border-right:.5pt solid black'>A.
  DIISI OLEH PENGUSAHA SARANG BURUNG WALET</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl9629579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7929579>1</td>
  <td class=xl9729579 colspan=3>Jenis Burung</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl9829579><?= $getwalet['refjeniswalet_id'] ? $getwalet['refjeniswalet_id'] : "" ?></td>
  <td class=xl8029579>1</td>
  <td class=xl8329579 colspan=3>Burung Sriti</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td colspan=3 class=xl8329579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579>2</td>
  <td class=xl8329579 colspan=3>Burung Walet</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.75pt'>
  <td height=25 class=xl7529579 style='height:18.75pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7929579>2</td>
  <td class=xl9729579 colspan=2>Lokasi</td>
  <td class=xl8129579></td>
  <td class=xl8129579></td>
  <td class=xl8129579></td>
  <td class=xl8129579></td>
  <td class=xl8129579></td>
  <td class=xl8129579></td>
  <td class=xl7929579>:</td>
  <td colspan=4 class=xl7929579><?= $getwalet['tblobyekwalet_lokasi'] ?></td>
  <td class=xl8129579></td>
  <td class=xl8129579></td>
  <td class=xl8129579></td>
  <td class=xl8129579></td>
  <td class=xl8129579></td>
  <td class=xl8129579></td>
  <td class=xl8129579></td>
  <td class=xl8129579></td>
  <td class=xl8129579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7929579>3</td>
  <td class=xl9729579 colspan=6>Volume panen yang diambil</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579>:</td>
  <td colspan=4 class=xl7929579>................................</td>
  <td class=xl8329579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl8029579></td>
  <td class=xl9729579 colspan=9>(lampirkan rincian dari jumlah tiap lokasi)</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl8329579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl9929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8729579>&nbsp;</td>
  <td class=xl8729579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl10029579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td colspan=25 class=xl10929579 style='border-right:.5pt solid black'>B.
  DIISI OLEH WAJIB PAJAK SELF ASSESMENT</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl9429579>1</td>
  <td class=xl7529579 colspan=21>Jumlah Omzet dan Pajak Terhutang untuk Masa
  Pajak sebelumnya (akumulasi dari awal Masa Pajak<span
  style='mso-spacerun:yes'>&nbsp;</span></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579 colspan=7>dalam Tahun Pajak Tertentu) :</td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579>a.</td>
  <td class=xl7529579 colspan=3>Masa Pajak</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579>:</td>
  <td class=xl8329579>Tgl</td>
  <td colspan=3 class=xl8029579>.........................</td>
  <td class=xl8029579>s/d</td>
  <td class=xl7529579>Tgl</td>
  <td colspan=3 class=xl8029579>.........................</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579>b.</td>
  <td class=xl7529579 colspan=4>Dasar Pengenaan</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579>:</td>
  <td class=xl8329579>Rp</td>
  <td colspan=3 class=xl8029579>.........................</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579 colspan=3>(Omzet Pajak)</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8329579></td>
  <td class=xl8329579></td>
  <td class=xl8329579></td>
  <td class=xl8329579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579>c.</td>
  <td class=xl7529579 colspan=6>Tarif Pajak (sesuai Perda)</td>
  <td class=xl8029579>:</td>
  <td colspan=2 class=xl8029579>................</td>
  <td class=xl8029579>%</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579>d.</td>
  <td class=xl7529579 colspan=5>Pajak Terhutang ( b x c )</td>
  <td class=xl7529579></td>
  <td class=xl8029579>:</td>
  <td class=xl8329579>Rp.</td>
  <td colspan=3 class=xl8029579>.........................</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl9429579>2</td>
  <td class=xl7529579 colspan=20>Jumlah Omzet dan Pajak Terhutang untuk Masa
  Pajak sekarang (lampirkan foto copy dokumen)</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579>a.</td>
  <td class=xl7529579 colspan=3>Masa Pajak</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579>:</td>
  <td class=xl8329579>Tgl</td>
  <td colspan=3 class=xl8029579><?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaawal']) ?></td>
  <td class=xl8029579>s/d</td>
  <td class=xl7529579>Tgl</td>
  <td colspan=3 class=xl8029579><?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaakhir']) ?></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579>b.</td>
  <td class=xl7529579 colspan=4>Dasar Pengenaan</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579>:</td>
  <td class=xl8329579>Rp</td>
  <td colspan=3 class=xl8029579><?php echo LokalIndonesia::ribuan($data['detail_transaksi']['tbltransaksiketetapan_omzettotal'],0,0) ?></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579 colspan=3>(Omzet Pajak)</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8329579></td>
  <td class=xl8329579></td>
  <td class=xl8329579></td>
  <td class=xl8329579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579>c.</td>
  <td class=xl7529579 colspan=6>Tarif Pajak (sesuai Perda)</td>
  <td class=xl8029579>:</td>
  <td colspan=2 class=xl8029579><?php echo ($data['detail_transaksi']['tbltransaksiketetapan_tarif']*100) ?></td>
  <td class=xl8029579>%</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579>d.</td>
  <td class=xl7529579 colspan=5>Pajak Terhutang ( b x c )</td>
  <td class=xl7529579></td>
  <td class=xl8029579>:</td>
  <td class=xl8329579>Rp.</td>
  <td colspan=3 class=xl8029579><?php echo LokalIndonesia::ribuan($data['detail_transaksi']['tbltransaksiketetapan_pajak'],0,0) ?></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td colspan=25 class=xl10929579 style='border-right:.5pt solid black'>C.
  DIISI OLEH WAJIB PAJAK OFFICIAL ASSESMENT</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579>a.</td>
  <td class=xl7529579 colspan=3>Masa Pajak</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579>:</td>
  <td class=xl8329579>Tgl</td>
  <td colspan=3 class=xl8029579>.........................</td>
  <td class=xl8029579>s/d</td>
  <td class=xl7529579>Tgl</td>
  <td colspan=3 class=xl8029579>.........................</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579>b.</td>
  <td class=xl7529579 colspan=4>Dasar Pengenaan</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579>:</td>
  <td class=xl8329579>Rp</td>
  <td colspan=3 class=xl8029579>.........................</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579 colspan=4>(Nilai Perolehan)</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8329579></td>
  <td class=xl8329579></td>
  <td class=xl8329579></td>
  <td class=xl8329579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='page-break-before:always;mso-height-source:userset;
  height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl9029579>&nbsp;</td>
  <td class=xl9029579>&nbsp;</td>
  <td class=xl9029579>&nbsp;</td>
  <td class=xl9029579>&nbsp;</td>
  <td class=xl9029579>&nbsp;</td>
  <td class=xl9029579>&nbsp;</td>
  <td class=xl9029579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
 </tr>
 <tr>
   <td></td>
   <td><p style="page-break-after:always;"></p>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td colspan=25 class=xl10929579 style='border-right:.5pt solid black'> D.
  PERNYATAAN</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl10129579>&nbsp;</td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10329579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl10129579>&nbsp;</td>
  <td class=xl8329579 colspan=21>Dengan menyadari sepenuhnya akan segala akibat
  termasuk sanksi-sanksi sesuai dengan ketentuan</td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10329579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl10129579>&nbsp;</td>
  <td class=xl8329579 colspan=20>perundang-undangan yang berlaku, saya atau
  yang saya beri kuasa menyatakan bahwa apa yang</td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10329579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl10129579>&nbsp;</td>
  <td class=xl8329579 colspan=19>telah beritahukan tersebut diatas beserta
  lampiran-lampiran adalah benar, lengkap dan jelas</td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10329579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl10129579>&nbsp;</td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10329579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl10129579>&nbsp;</td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td class=xl10229579></td>
  <td colspan=4 class=xl8329579></td>
  <td colspan=2 class=xl8029579>
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
  <?php endif; ?></td>
  <td class=xl8029579></td>
  <td colspan=2 class=xl8329579></td>
  <td class=xl10229579></td>
  <td class=xl10329579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td colspan=9 class=xl8029579>Wajib Pajak</td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td colspan=7 class=xl8029579>____________________</td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td colspan=7 class=xl8029579>Nama Jelas</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl9029579>&nbsp;</td>
  <td class=xl9029579>&nbsp;</td>
  <td class=xl9029579>&nbsp;</td>
  <td class=xl9029579>&nbsp;</td>
  <td class=xl9029579>&nbsp;</td>
  <td class=xl9029579>&nbsp;</td>
  <td class=xl9029579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td colspan=25 class=xl10929579 style='border-right:.5pt solid black'>E.
  DIISI OLEH PETUGAS PENERIMA <?= AppConfig::model()->getValue('APLIKASI_INSTANSI_SINGKAT') ?></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7229579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7329579 style='border-top:none'>&nbsp;</td>
  <td class=xl7429579 style='border-top:none'>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579 colspan=13>Tata cara penghitungan dan penetapan oleh
  Pejabat <?= AppConfig::model()->getValue('APLIKASI_INSTANSI_SINGKAT') ?></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl9829579 align=right>2</td>
  <td class=xl8029579>1</td>
  <td class=xl7529579 colspan=14>Official Assesment (dihitung dan ditetapkan
  oleh Pejabat <?= AppConfig::model()->getValue('APLIKASI_INSTANSI_SINGKAT') ?></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl8029579>2</td>
  <td class=xl7529579 colspan=13>Self Assesment (menghitung dan menetapkan
  pajak sendiri)</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579 colspan=4>Diterima tanggal</td>
  <td class=xl8029579>:</td>
  <td colspan=4 class=xl8029579>................................</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579 colspan=3>Nama Jelas</td>
  <td class=xl7529579></td>
  <td class=xl8029579>:</td>
  <td colspan=4 class=xl8029579>................................</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579>NIP</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579>:</td>
  <td colspan=4 class=xl8029579>................................</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579 colspan=3>Tanda tangan</td>
  <td class=xl7529579></td>
  <td class=xl8029579>:</td>
  <td colspan=4 class=xl8029579>................................</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl9929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl10029579>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td colspan=10 class=xl8029579>------------------------------------------------------------</td>
  <td class=xl7529579></td>
  <td colspan=3 class=xl11229579>Gunting disini</td>
  <td class=xl7529579></td>
  <td colspan=10 class=xl8029579>------------------------------------------------------------</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7229579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td colspan=3 class=xl11329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7329579>&nbsp;</td>
  <td class=xl7429579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579 colspan=3>NO. SPTPD</td>
  <td colspan=4 class=xl8029579>...............................</td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td colspan=16 class=xl10229579>TANDA TERIMA</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579 colspan=2>NPWPD</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579>:</td>
  <td colspan=10 class=xl8329579>...........................................................................................................</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579 colspan=2>NAMA</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579>:</td>
  <td colspan=10 class=xl8329579>...........................................................................................................</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579 colspan=2>ALAMAT</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579>:</td>
  <td colspan=10 class=xl8329579>...........................................................................................................</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td colspan=2 class=xl8029579>...............</td>
  <td class=xl7529579>, .....<span style='display:none'>..</span></td>
  <td colspan=2 class=xl9129579>....... Tahun</td>
  <td class=xl7529579 colspan=2>.......</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td colspan=6 class=xl8029579>Yang menerima</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl7629579>&nbsp;</td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td colspan=6 class=xl8029579>( ........................ )</td>
  <td class=xl8029579></td>
  <td class=xl7529579></td>
  <td class=xl7529579></td>
  <td class=xl8229579>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl7529579 style='height:15.0pt'></td>
  <td class=xl9929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl8929579>&nbsp;</td>
  <td class=xl10029579>&nbsp;</td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=10 style='width:8pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
  <td width=38 style='width:29pt'></td>
 </tr>
 <![endif]>
</table>

</div>

</body>

</html>

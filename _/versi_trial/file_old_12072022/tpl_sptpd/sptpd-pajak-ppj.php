<?php 
	Yii::import('ext.LokalIndonesia');
	Yii::import('application.models.detail.ObyekPPJ');
	$getppj = ObyekPPJ::model()->find('tblobyek_id=:idobyek', array(':idobyek'=>$data['id']));
	$detail_ppj= Yii::app()->db->createCommand()->select()->from('tblobyekppj')->where('tblobyek_id=:idobyek', array(':idobyek'=>$data['id']))
	/*->leftJoin('refdayappj','tblobyekppj.refdayappj_id = refdayappj.refdayappj_id')
	->leftJoin('refasallistrikppj','tblobyekppj.refasallistrikppj_id = refasallistrikppj.refasallistrikppj_id')
	->leftJoin('refgoltarifppj','tblobyekppj.refgoltarifppj_id = refgoltarifppj.refgoltarifppj_id')
	->leftJoin('refvoltaseppj','tblobyekppj.refvoltaseppj_id = refvoltaseppj.refvoltaseppj_id')*/
	->queryRow();
	$details_ppj= Yii::app()->db->createCommand()->select()->from('tblobyekppjdet')->where('tblobyek_id=:idobyek', array(':idobyek'=>$data['id']))->queryAll();
	$row_dtl_ppj = array();
	foreach($details_ppj as $dtl_ppj):
		$row_dtl_ppj[$dtl_ppj['tblobyekppjdet_bulan']] = $dtl_ppj['tblobyekppjdet_perkiraankwh'];
	endforeach;
	
?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 12">
<link rel=File-List href="SPTPD%20Pajak%20PPJ_new_files/filelist.xml">
<style id="SPTPD all (version 1)_14931_Styles">
<!--table
	{mso-displayed-decimal-separator:"\,";
	mso-displayed-thousand-separator:"\.";}
.xl6514931
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
.xl6614931
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
.xl6714931
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
.xl6814931
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
.xl6914931
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
.xl7014931
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
.xl7114931
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
.xl7214931
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
.xl7314931
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
.xl7414931
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
.xl7514931
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
.xl7614931
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
.xl7714931
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
.xl7814931
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
.xl7914931
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
.xl8014931
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
.xl8114931
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
.xl8214931
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
.xl8314931
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
.xl8414931
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
.xl8514931
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
.xl8614931
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
.xl8714931
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
.xl8814931
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
.xl8914931
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
.xl9014931
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
.xl9114931
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
.xl9214931
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
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9314931
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
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9414931
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
.xl9514931
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
.xl9614931
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
.xl9714931
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
.xl9814931
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
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
.xl9914931
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
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
.xl10014931
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
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10114931
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
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10214931
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
.xl10314931
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
.xl10414931
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
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10514931
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
.xl10614931
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
.xl10714931
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
.xl10814931
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
.xl10914931
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
.xl11014931
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
.xl11114931
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
.xl11214931
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
.xl11314931
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11pt;
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
.xl11414931
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
.xl11514931
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
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11614931
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
.xl11714931
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
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
-->
</style>
<title>SPTPD <?php echo $data['surat']['tblobyek_nama'] ?></title></head>

<body>
<!--[if !excel]>&nbsp;&nbsp;<![endif]-->

<div id="SPTPD all (version 1)_14931" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=792 class=xl6814931
 style='border-collapse:collapse; width:600pt'>
 <col class=xl6814931 width=33 span=24 style='mso-width-source:userset;
 mso-width-alt:1206;width:25pt'>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6814931 width=33 style='height:15.0pt;width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
  <td class=xl6814931 width=33 style='width:25pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6514931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6714931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6714931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td colspan=11 class=xl6914931><span
  style='mso-spacerun:yes'> </span>PEMERINTAH KOTA TEGAL</td>
  <td class=xl8814931></td>
  <td class=xl9514931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl8414931 colspan=3>No. SPTPD</td>
  <td class=xl9414931>:</td>
  <td colspan=4 class=xl8914931><?php echo $data['surat']['tblobyek_nomorsptpd']; ?></td>
  <td class=xl7314931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td colspan=12 class=xl6914931><span style='mso-spacerun:yes'> </span><?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI')) ?></td>
  <td class=xl9514931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl8814931></td>
  <td class=xl8014931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td colspan=12 class=xl7414931><span style='mso-spacerun:yes'> </span>Jl. Ki
  Gede Sebayu No. 5</td>
  <td class=xl9614931 width=33 style='width:25pt'>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl8414931 colspan=3>Masa Pajak</td>
  <td class=xl9414931>:</td>
  <td colspan=4 class=xl8914931><?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaawal']) ?> s/d <?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaakhir']) ?></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td colspan=11 class=xl7414931><span style='mso-spacerun:yes'> </span>Telp.
  (0283) 355137 - 355138</td>
  <td class=xl9114931 width=33 style='width:25pt'></td>
  <td class=xl9614931 width=33 style='width:25pt'>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl9114931 width=33 style='width:25pt'></td>
  <td class=xl9114931 width=33 style='width:25pt'></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td colspan=11 class=xl7414931><span style='mso-spacerun:yes'> </span>T E G A
  L</td>
  <td class=xl7214931></td>
  <td class=xl7014931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl8414931 colspan=3>Tahun Pajak</td>
  <td class=xl9414931>:</td>
  <td colspan=4 class=xl8914931><?php echo $data['detail_transaksi']['tbltransaksiketetapan_tahunpajak'] ?></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td colspan=6 class=xl7414931><span style='mso-spacerun:yes'> </span></td>
  <td class=xl8914931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl7014931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl7414931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7714931>&nbsp;</td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl9714931>&nbsp;</td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6514931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl7514931>&nbsp;</td>
  <td colspan=4 class=xl7514931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6714931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td colspan=23 class=xl11014931 style='border-right:.5pt solid black'>SPTPD</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td colspan=23 class=xl7114931 style='border-right:.5pt solid black'>(SURAT
  PEMBERITAHUAN PAJAK DAERAH)</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td colspan=23 class=xl7114931 style='border-right:.5pt solid black'>PAJAK
  PENERANGAN JALAN</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931 colspan=3><span
  style='mso-spacerun:yes'> </span>N.P.W.P.D</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl10514931 colspan=3>Kepada Yth,</td>
  <td class=xl10514931></td>
  <td class=xl10514931></td>
  <td class=xl10514931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td colspan=6 class=xl11314931><?php echo $data['surat']['tblsubyek_npwpd']; ?></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td colspan=6 class=xl10514931>Kepala <?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI_SINGKAT')) ?> <?= AppConfig::model()->getValue('APLIKASI_PEMERINTAH') ?></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td colspan=6 class=xl10514931>Jl Ki Gede Sebayu No. 5</td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl10514931>di</td>
  <td colspan=2 class=xl10514931>TEGAL</td>
  <td class=xl10514931></td>
  <td class=xl10514931></td>
  <td class=xl10514931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7714931>&nbsp;</td>
  <td colspan=4 class=xl7714931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7714931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td colspan="5" class=xl9214931><span style='mso-spacerun:yes'> </span>PE<span
  style='display:none'>RHATIAN :</span>RHATIAN</td>
  <td class=xl7814931></td>
  <td class=xl7814931></td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6714931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl7114931>1</td>
  <td class=xl6814931 colspan=12>Harap diisi dalam rangkap dua (2) dengan huruf
  CETAK</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl7114931>2</td>
  <td class=xl6814931 colspan=5>Beri nomor pada kotak</td>
  <td class=xl10014931>&nbsp;</td>
  <td class=xl6814931 colspan=9><span style='mso-spacerun:yes'> </span>yang
  tersedia untuk jawaban yang diberikan</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl7114931>3</td>
  <td class=xl6814931 colspan=14>Setelah diisi dan ditanda tangani, harap
  diserahkan kembali kepada <?= AppConfig::model()->getValue('APLIKASI_INSTANSI') ?></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl7114931>&nbsp;</td>
  <td class=xl6814931 colspan=15> dan
  Aset Daerah paling lambat tanggal 15 bulan berikutnya</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl7114931>4</td>
  <td class=xl6814931 colspan=19>Keterlambatan Penyerahan pada tanggal tersebut
  diatas akan dilakukan teguran kepada WP</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931 colspan=19>dan apabila masih belum menyerahkan dokumen
  dalam 7 (tujuh) hari setelah Surat Teguran</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931 colspan=10>diterima akan dilakukan penetapan secara
  jabatan</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td colspan=23 class=xl10614931 style='border-right:.5pt solid black'>A.
  DIISI OLEH WAJIB PAJAK</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl8614931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl7214931>1.</td>
  <td class=xl8614931 colspan=4>Asal tenaga listrik</td>
  <td class=xl6814931></td>
  <td class=xl9314931><?= $detail_ppj['refasallistrikppj_id'] ?></td>
  <td class=xl6814931></td>
  <td class=xl7214931>1.</td>
  <td class=xl6814931 colspan=4>PLN/Sumber lain</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931>2.</td>
  <td class=xl6814931 colspan=6>Non PLN/dihasilkan sendiri</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl7214931>2.</td>
  <td class=xl6814931 colspan=4>Golongan Tarif</td>
  <td class=xl6814931></td>
  <td class=xl9314931><?= $detail_ppj['refgoltarifppj_id'] ?></td>
  <td class=xl6814931></td>
  <td class=xl7214931>1.</td>
  <td class=xl6814931 colspan=2>Industri</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931>2.</td>
  <td class=xl6814931 colspan=4>Rumah tangga</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931>3.</td>
  <td class=xl6814931 colspan=2>Sosial</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931>4.</td>
  <td class=xl6814931 colspan=2>Lainnya</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl8614931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl7214931>3.</td>
  <td class=xl8614931 colspan=2>Voltase</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl9314931><?= $detail_ppj['refvoltaseppj_id'] ?></td>
  <td class=xl6814931></td>
  <td class=xl7214931>1.</td>
  <td class=xl6814931 colspan=2>220 Volt</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl8614931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931>2.</td>
  <td class=xl6814931 colspan=2>Lainnya</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl7214931>4.</td>
  <td class=xl6814931 colspan=3>Daya listrik</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl9314931><?= $detail_ppj['refdayappj_id'] ?></td>
  <td class=xl6814931></td>
  <td class=xl7214931>1.</td>
  <td class=xl6814931></td>
  <td class=xl9914931>450</td>
  <td class=xl9814931>Watt</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931>2.</td>
  <td class=xl6814931></td>
  <td class=xl9914931>900</td>
  <td class=xl9814931>Watt</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931>3.</td>
  <td class=xl6814931></td>
  <td class=xl9914931>1200</td>
  <td class=xl9814931>Watt</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931>4.</td>
  <td class=xl6814931></td>
  <td class=xl9914931>1600</td>
  <td class=xl9814931>Watt</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931>5.</td>
  <td class=xl6814931></td>
  <td class=xl9914931>2200</td>
  <td class=xl9814931>Watt</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931>6.</td>
  <td class=xl7214931>&gt;</td>
  <td class=xl9914931>2200</td>
  <td class=xl9814931>Watt</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl7214931>5.</td>
  <td class=xl6814931 colspan=10>Penggunaan listrik / taksiran penggunaan
  listrik</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl10014931>No.</td>
  <td colspan=4 class=xl10014931 style='border-left:none'>Bulan</td>
  <td colspan=7 class=xl10014931 style='border-left:none'>Jumlah KWH terpakai</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl10114931 style='border-top:none'>1</td>
  <td colspan=4 class=xl11514931 style='border-right:.5pt solid black;
  border-left:none'><span style='mso-spacerun:yes'> </span>
  <?= isset($row_dtl_ppj["Januari"]) ? "Januari" : "..................." ?>  </td>
  <td colspan=7 class=xl10014931 style='border-left:none'><?= isset($row_dtl_ppj["Januari"]) ? $row_dtl_ppj["Januari"] : "..................." ?></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl10114931 style='border-top:none'>2</td>
  <td colspan=4 class=xl11514931 style='border-right:.5pt solid black;
  border-left:none'><span style='mso-spacerun:yes'> </span><?= isset($row_dtl_ppj["Februari"]) ? "Februari" : "..................." ?></td>
  <td colspan=7 class=xl10014931 style='border-left:none'><?= isset($row_dtl_ppj["Februari"]) ? $row_dtl_ppj["Februari"] : "..................." ?></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl10114931 style='border-top:none'>3</td>
  <td colspan=4 class=xl11514931 style='border-right:.5pt solid black;
  border-left:none'><span style='mso-spacerun:yes'> </span><?= isset($row_dtl_ppj["Maret"]) ? "Maret" : "..................." ?></td>
  <td colspan=7 class=xl10014931 style='border-left:none'><?= isset($row_dtl_ppj["Maret"]) ? $row_dtl_ppj["Maret"] : "..................." ?></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl10114931 style='border-top:none'>4</td>
  <td colspan=4 class=xl11514931 style='border-right:.5pt solid black;
  border-left:none'><span style='mso-spacerun:yes'> </span><?= isset($row_dtl_ppj["April"]) ? "April" : "..................." ?></td>
  <td colspan=7 class=xl10014931 style='border-left:none'><?= isset($row_dtl_ppj["April"]) ? $row_dtl_ppj["April"] : "..................." ?></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl10114931 style='border-top:none'>5</td>
  <td colspan=4 class=xl11514931 style='border-right:.5pt solid black;
  border-left:none'><span style='mso-spacerun:yes'> </span><?= isset($row_dtl_ppj["Mei"]) ? "Mei" : "..................." ?></td>
  <td colspan=7 class=xl10014931 style='border-left:none'><?= isset($row_dtl_ppj["Mei"]) ? $row_dtl_ppj["Mei"] : "..................." ?></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl10114931 style='border-top:none'>6</td>
  <td colspan=4 class=xl11514931 style='border-right:.5pt solid black;
  border-left:none'><span style='mso-spacerun:yes'> </span><?= isset($row_dtl_ppj["Juni"]) ? "Juni" : "..................." ?></td>
  <td colspan=7 class=xl10014931 style='border-left:none'><?= isset($row_dtl_ppj["Juni"]) ? $row_dtl_ppj["Juni"] : "..................." ?></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl10114931 style='border-top:none'>7</td>
  <td colspan=4 class=xl11514931 style='border-right:.5pt solid black;
  border-left:none'><span style='mso-spacerun:yes'> </span><?= isset($row_dtl_ppj["Juli"]) ? "Juli" : "..................." ?></td>
  <td colspan=7 class=xl10014931 style='border-left:none'><?= isset($row_dtl_ppj["Juli"]) ? $row_dtl_ppj["Juli"] : "..................." ?></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl10114931 style='border-top:none'>8</td>
  <td colspan=4 class=xl11514931 style='border-right:.5pt solid black;
  border-left:none'><span style='mso-spacerun:yes'> </span><?= isset($row_dtl_ppj["Agustus"]) ? "Agustus" : "..................." ?></td>
  <td colspan=7 class=xl10014931 style='border-left:none'><?= isset($row_dtl_ppj["Agustus"]) ? $row_dtl_ppj["Agustus"] : "..................." ?></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl10114931 style='border-top:none'>9</td>
  <td colspan=4 class=xl11514931 style='border-right:.5pt solid black;
  border-left:none'><span style='mso-spacerun:yes'> </span><?= isset($row_dtl_ppj["September"]) ? "September" : "..................." ?></td>
  <td colspan=7 class=xl10014931 style='border-left:none'><?= isset($row_dtl_ppj["September"]) ? $row_dtl_ppj["September"] : "..................." ?></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl10114931 style='border-top:none'>10</td>
  <td colspan=4 class=xl11514931 style='border-right:.5pt solid black;
  border-left:none'><span style='mso-spacerun:yes'> </span><?= isset($row_dtl_ppj["Oktober"]) ? "Oktober" : "..................." ?></td>
  <td colspan=7 class=xl10014931 style='border-left:none'><?= isset($row_dtl_ppj["Oktober"]) ? $row_dtl_ppj["Oktober"] : "..................." ?></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl10114931 style='border-top:none'>11</td>
  <td colspan=4 class=xl11514931 style='border-right:.5pt solid black;
  border-left:none'><span style='mso-spacerun:yes'> </span><?= isset($row_dtl_ppj["November"]) ? "November" : "..................." ?></td>
  <td colspan=7 class=xl10014931 style='border-left:none'><?= isset($row_dtl_ppj["November"]) ? $row_dtl_ppj["November"] : "..................." ?></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl10114931 style='border-top:none'>12</td>
  <td colspan=4 class=xl11514931 style='border-right:.5pt solid black;
  border-left:none'><span style='mso-spacerun:yes'> </span><?= isset($row_dtl_ppj["Desember"]) ? "Desember" : "..................." ?></td>
  <td colspan=7 class=xl10014931 style='border-left:none'><?= isset($row_dtl_ppj["Desember"]) ? $row_dtl_ppj["Desember"] : "..................." ?></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl8514931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7714931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl8114931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl7514931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
  <td class=xl6614931 style='border-top:none'>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
 </tr>
 <tr height=20 style='page-break-before:always;mso-height-source:userset;
  height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7714931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td colspan=23 class=xl10614931 style='border-right:.5pt solid black'>B.
  DIISI OLEH WP SELF ASSESMENT</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl7114931>1</td>
  <td class=xl6814931 colspan=22 style='border-right:.5pt solid black'>Jumlah
  Pajak Terhutang untuk Masa Pajak sebelumnya (akumulasi dari awal Masa Pajak
  dalam Tahun Pajak</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931 colspan=3>Tertentu) :</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931>a.</td>
  <td class=xl6814931 colspan=3>Masa Pajak</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931>:</td>
  <td class=xl8914931>Tgl</td>
  <td colspan=3 class=xl8914931>.........................</td>
  <td class=xl6814931>s/d</td>
  <td class=xl6814931>Tgl</td>
  <td colspan=3 class=xl8914931>.........................</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931>b.</td>
  <td class=xl6814931 colspan=4>Dasar Pengenaan</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931>:</td>
  <td class=xl8914931>Rp</td>
  <td colspan=2 class=xl8914931>................</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931>c.</td>
  <td class=xl6814931 colspan=6>Tarif Pajak (sesuai Perda)</td>
  <td class=xl6814931>:</td>
  <td colspan=2 class=xl8914931>................</td>
  <td class=xl7214931>%</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>

  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931>d.</td>
  <td class=xl6814931 colspan=5>Pajak Terhutang ( b x c )</td>
  <td class=xl6814931></td>
  <td class=xl6814931>:</td>
  <td class=xl8914931>Rp.</td>
  <td colspan=2 class=xl8914931>................</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl7114931>2</td>
  <td class=xl6814931 colspan=21>Jumlah Pajak Terhutang untuk Masa Pajak
  sekarang (lampirkan dokumen dengan format isian terlampir)</td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931>a.</td>
  <td class=xl6814931 colspan=3>Masa Pajak</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931>:</td>
  <td class=xl8914931>Tgl</td>
  <td colspan=3 class=xl8914931><?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaawal']) ?></td>
  <td class=xl6814931>s/d</td>
  <td class=xl6814931>Tgl</td>
  <td colspan=3 class=xl8914931><?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaakhir']) ?></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931>b.</td>
  <td class=xl6814931 colspan=4>Dasar Pengenaan</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931>:</td>
  <td class=xl8914931>Rp</td>
  <td colspan=2 class=xl8914931><?php echo LokalIndonesia::ribuan($data['detail_transaksi']['tbltransaksiketetapan_omzettotal'],0,0) ?></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931>c.</td>
  <td class=xl6814931 colspan=6>Tarif Pajak (sesuai Perda)</td>
  <td class=xl6814931>:</td>
  <td colspan=2 class=xl8914931><?php echo ($data['surat']['tblmasterrekening_tarif']*100) ?></td>
  <td class=xl7214931>%</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>

  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931>d.</td>
  <td class=xl6814931 colspan=5>Pajak Terhutang ( b x c )</td>
  <td class=xl6814931></td>
  <td class=xl6814931>:</td>
  <td class=xl8914931>Rp.</td>
  <td colspan=2 class=xl8914931><?php echo LokalIndonesia::ribuan($data['detail_transaksi']['tbltransaksiketetapan_pajak'],0,0) ?></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td colspan=23 class=xl10614931 style='border-right:.5pt solid black'>C.
  PERNYATAAN</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl10214931>&nbsp;</td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl10314931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>

  <td class=xl10214931>&nbsp;</td>
  <td class=xl8914931 colspan=20>Dengan menyadari sepenuhnya akan segala akibat
  termasuk sanksi-sanksi sesuai dengan ketentuan</td>
  <td class=xl9014931></td>
  <td class=xl10314931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl10214931>&nbsp;</td>
  <td class=xl8914931 colspan=20>perundang-undangan yang berlaku, saya atau
  yang saya beri kuasa menyatakan bahwa apa yang</td>
  <td class=xl9014931></td>
  <td class=xl10314931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl10214931>&nbsp;</td>
  <td class=xl8914931 colspan=19>telah beritahukan tersebut diatas beserta
  lampiran-lampiran adalah benar, lengkap dan jelas</td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl10314931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl10214931>&nbsp;</td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl10314931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl10214931>&nbsp;</td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl9014931></td>
  <td class=xl8914931></td>
  <td colspan=7 class=xl7214931>
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
  <td class=xl9014931></td>
  <td class=xl10314931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td colspan=8 class=xl7214931>Wajib Pajak</td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td colspan=6 class=xl7214931>____________________</td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td colspan=6 class=xl7214931>Nama Jelas</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl7214931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td colspan=23 class=xl10614931 style='border-right:.5pt solid black'>D.
  DIISI OLEH PETUGAS PENERIMA <?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI_SINGKAT')) ?></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl8214931><u style='visibility:hidden;mso-ignore:visibility'>&nbsp;</u></td>
  <td class=xl8014931></td>
  <td class=xl8014931></td>
  <td class=xl8014931></td>
  <td class=xl8014931></td>
  <td class=xl8014931></td>
  <td class=xl8014931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl7914931>&nbsp;</td>
  <td class=xl8014931 colspan=12>Tata cara penghitungan dan penetapan yang
  dikehendaki</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl8714931>&nbsp;</td>
  <td class=xl10414931>&nbsp;</td>
  <td class=xl9414931>1</td>
  <td class=xl8414931 colspan=14>Official Assesment (dihitung dan ditetapkan
  oleh Pejabat <?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI_SINGKAT')) ?>)</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl8314931>&nbsp;</td>
  <td class=xl8414931></td>
  <td class=xl9414931>2</td>
  <td class=xl8414931 colspan=12>Self Assesment (menghitung dan menetapkan
  pajak sendiri)</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl8314931>&nbsp;</td>
  <td class=xl8414931></td>
  <td class=xl9414931></td>
  <td class=xl8414931></td>
  <td class=xl8414931></td>
  <td class=xl8414931></td>
  <td class=xl8414931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl8314931>&nbsp;</td>
  <td class=xl8414931 colspan=4>Diterima tanggal</td>
  <td class=xl8414931>:</td>
  <td colspan=4 class=xl8414931>................................</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl8314931>&nbsp;</td>
  <td class=xl8414931 colspan=4>Nama Petugas</td>
  <td class=xl8414931>:</td>
  <td colspan=4 class=xl8414931>................................</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl8314931>&nbsp;</td>
  <td class=xl8414931>NIP</td>
  <td class=xl8414931></td>
  <td class=xl8414931></td>
  <td class=xl8414931></td>
  <td class=xl8414931>:</td>
  <td colspan=4 class=xl8414931>................................</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td colspan=6 class=xl7214931>( ........................ )</td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl8514931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl8114931>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td colspan=9 class=xl7214931>------------------------------------------------------------</td>
  <td colspan=4 class=xl7214931>Gunting disini</td>
  <td colspan=10 class=xl10914931>-----------------------------------------------------------------</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6514931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td colspan=3 class=xl11414931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6614931>&nbsp;</td>
  <td class=xl6714931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931 colspan=3>NO. SPTPD</td>
  <td colspan=4 class=xl7214931>...............................</td>
  <td class=xl7214931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td colspan=16 class=xl9014931>TANDA TERIMA</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931 colspan=2>NPWPD</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931>:</td>
  <td colspan=10 class=xl8914931>...........................................................................................................</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931 colspan=2>NAMA</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931>:</td>
  <td colspan=10 class=xl8914931>...........................................................................................................</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931 colspan=2>ALAMAT</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931>:</td>
  <td colspan=10 class=xl8914931>...........................................................................................................</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>

  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td colspan=2 class=xl7214931>...............</td>
  <td class=xl6814931>, ......<span style='display:none'>.</span></td>
  <td colspan=2 class=xl10914931>....... Tahun</td>
  <td class=xl6814931>.......</td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td colspan=6 class=xl7214931>Yang menerima</td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl7214931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6914931>&nbsp;</td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td colspan=6 class=xl7214931>( ........................ )</td>
  <td class=xl7214931></td>
  <td class=xl7014931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl8514931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl7614931>&nbsp;</td>
  <td class=xl8114931>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6814931 style='height:15.0pt'></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
  <td class=xl6814931></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
 </tr>
 <![endif]>
</table>

</div>

</body>

</html>



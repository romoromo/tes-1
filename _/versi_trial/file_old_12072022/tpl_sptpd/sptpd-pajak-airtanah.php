

<?php 
	Yii::import('ext.LokalIndonesia');
	Yii::import('application.models.detail.ObyekHotel');
	$listData = $_REQUEST['listData'];
	$transid = (int)base64_decode($_REQUEST['transid']);
	$transidpat = (int)base64_decode($_REQUEST['transid']);
	$transidjml = (int)base64_decode($_REQUEST['transid']);
	$voljml = (int)base64_decode($_REQUEST['transid']);
	$pjk = (int)base64_decode($_REQUEST['transid']);


	$datawp = Yii::app()->db->createCommand()->select('tblsubyek.tblsubyek_id,
tblobyek.tblsubyek_id,
tblobyek.tblobyek_id,
tblsubyek.tblsubyek_npwpd,
tblsubyek.tblsubyek_nama,
tblsubyek.tblsubyek_alamat,
tblobyek.tblobyek_nama,
tblobyek.tblobyek_alamat')
	->from('tblsubyek')
	->join('tblobyek','tblsubyek.tblsubyek_id = tblobyek.tblsubyek_id')
	->where('tblobyek_id=:idoby ', array(':idoby'=>$listData))
	->queryRow();
	$datamt = Yii::app()->db->createCommand()->select('tbltransaksiketetapan.tbltransaksiketetapan_bulanpajak,
tbltransaksiketetapan.tbltransaksiketetapan_tahunpajak,
tbltransaksiketetapan.tbltransaksiketetapan_masaawal,
tbltransaksiketetapan.tbltransaksiketetapan_masaakhir,
tbltransaksiketetapan.tbltransaksiketetapan_id')
	->from('tbltransaksiketetapan')
	->where('tbltransaksiketetapan_id', array(':idoby'=>$listData))
	->queryRow();
	$gethotel = ObyekHotel::model()->find('tblobyek_id=:idobyek', array(':idobyek'=>$data['id']));
	$idgolhotel = $gethotel['refgolhotel_id'];
	$golhotel = GolonganHotel::model()->findByPk($idgolhotel);
	$kodegol = $golhotel['refgolhotel_keterangan'];
	$detail_hotel = Yii::app()->db->createCommand()->select()->from('tblobyekhoteldet')->where('tblobyek_id=:idobyek', array(':idobyek'=>$data['id']))->queryAll();
	$dataj = Yii::app()->db->createCommand()->select('
		tblpendataanreklame.tbltransaksiketetapan_id,
refjenisreklame.refjenisreklame_id,
refjenisreklame.refjenisreklame_nama,
tblpendataanreklame.refjenisreklame_id,
tblpendataanreklame.tblpendataanreklame_judul,
tblpendataanreklame.tblpendataanreklame_lokasi,
tblpendataanreklame.tblpendataanreklame_panjang,
tblpendataanreklame.tblpendataanreklame_lebar,
tblpendataanreklame.tblpendataanreklame_luas,
tblpendataanreklame.tblpendataanreklame_ketinggian,
tblpendataanreklame.tblpendataanreklame_jumlahreklame,
tblpendataanreklame.tblpendataanreklame_masaawal,
tblpendataanreklame.tblpendataanreklame_masaakhir')
	->from('tblpendataanreklame')
	->join('refjenisreklame',' tblpendataanreklame.refjenisreklame_id = refjenisreklame.refjenisreklame_id')
	->where('tbltransaksiketetapan_id=:idtap', array(':idtap'=>$transid))
	->queryRow();

	$datapat = Yii::app()->db->createCommand()->select('
		tblpendataanairtanahdet.tblpendataanairtanahdet_id,
tblpendataanairtanahdet.tblpendataanairtanahdet_volket,
tblpendataanairtanahdet.tblpendataanairtanahdet_vol,
tblpendataanairtanahdet.tblpendataanairtanahdet_hargasekmen,
tblpendataanairtanahdet.tblpendataanairtanahdet_nparupiah,
tblpendataanairtanahdet.tblpendataanairtanahdet_urut')
	->from('tblpendataanairtanahdet')
	->where('tbltransaksiketetapan_id=:idtpt', array(':idtpt'=>$transidpat))
	->order('tblpendataanairtanahdet_urut')
	->queryAll();
	$uraian_pat = array(); $no = 1;
	foreach ($datapat as $row) {
		$uraian_pat[$no] = $row;
		$no++;
	}

	$transidjml = Yii::app()->db->createCommand()->select('
		tbltransaksiketetapan.tbltransaksiketetapan_omzettotal')
	->from('tbltransaksiketetapan')
	->where('tbltransaksiketetapan_id=:idtjml', array(':idtjml'=>$transidjml))
	->queryRow();

	$voljml = Yii::app()->db->createCommand()->select('
		tblpendataanairtanah_volume')
	->from('tblpendataanairtanah')
	->where('tbltransaksiketetapan_id=:idvol', array(':idvol'=>$voljml))
	->queryRow();

	$pjk = Yii::app()->db->createCommand()->select('
		tbltransaksiketetapan.tbltransaksiketetapan_pajak')
	->from('tbltransaksiketetapan')
	->where('tbltransaksiketetapan_id=:idtpjk', array(':idtpjk'=>$pjk))
	->queryRow();
?>


<!-- <?php print_r($dataj) ?> -->


<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 12">
<link rel=File-List href="JT_files/filelist.xml">
<style id="yaku_23919_Styles">
<!--table
	{mso-displayed-decimal-separator:"\,";
	mso-displayed-thousand-separator:"\.";}
.xl6523919
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
.xl6623919
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
.xl6723919
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
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6823919
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
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6923919
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
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7023919
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
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7123919
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
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7223919
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
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7323919
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
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7423919
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7523919
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
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7623919
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
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7723919
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
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7823919
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
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7923919
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
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8023919
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
	text-align:left;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8123919
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8223919
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8323919
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
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8423919
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
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8523919
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
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8623919
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
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8723919
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
.xl8823919
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8923919
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
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9023919
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
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}









.xl9123919
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
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
.xl9223919
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
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
.xl9323919
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
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
.xl9423919
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
	text-align:left;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9523919
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
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9623919
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
	text-align:left;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9723919
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
	text-align:left;
	vertical-align:top;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9823919
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
	white-space:normal;}
.xl9923919
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
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
.xl10023919
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
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
.xl10123919
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
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
.xl10223919

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
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10323919
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
	text-align:left;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10423919
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
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10523919
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
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10623919
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
	text-align:left;
	vertical-align:top;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10723919
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
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
.xl10823919
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
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10923919
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
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11023919
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
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11123919
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
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11223919
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
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11323919
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
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11423919
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
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11523919
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
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;

	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11623919
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
	text-align:left;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11723919
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
	text-align:left;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11823919
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
	text-align:left;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11923919
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
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12023919
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
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12123919
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
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12223919
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
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12323919
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
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;

	white-space:nowrap;}
.xl12423919
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
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12523919
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
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12623919
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
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12723919
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
	text-align:left;
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl12823919
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
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12923919
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
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13023919
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
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13123919
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
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13223919
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
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13323919
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
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13423919
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
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13523919
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
	text-align:left;
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13623919
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
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13723919
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
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13823919
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
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13923919
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
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl14023919
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
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl14123919
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
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl14223919
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
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl14323919
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
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14423919
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
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl14523919
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14623919
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
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14723919
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14823919
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14923919
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl15023919
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
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl15123919
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
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl15223919
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
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
.xl15323919
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:1;
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
.xl15423919
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:1;
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
.xl15523919
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
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl15623919
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
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl15723919
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
	white-space:nowrap;}
.style97 {padding-top: 1px; padding-right: 1px; padding-left: 1px; mso-ignore: padding; color: black; font-size: 10pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Arial, sans-serif; mso-font-charset: 0; mso-number-format: General; text-align: general; vertical-align: middle; mso-background-source: auto; mso-pattern: auto; white-space: nowrap; }
.style103 {padding-top: 1px; padding-right: 1px; padding-left: 1px; mso-ignore: padding; color: black; font-size: 10pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Arial, sans-serif; mso-font-charset: 0; mso-number-format: General; text-align: left; vertical-align: bottom; border: .5pt solid windowtext; mso-background-source: auto; mso-pattern: auto; white-space: nowrap; }
.style104 {padding-top: 1px; padding-right: 1px; padding-left: 1px; mso-ignore: padding; color: black; font-size: 10pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Arial, sans-serif; mso-font-charset: 0; mso-number-format: General; text-align: left; vertical-align: middle; border-top: .5pt solid windowtext; border-right: none; border-bottom: none; border-left: .5pt solid windowtext; mso-background-source: auto; mso-pattern: auto; white-space: nowrap; }
.style105 {padding-top: 1px; padding-right: 1px; padding-left: 1px; mso-ignore: padding; color: black; font-size: 10pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Arial, sans-serif; mso-font-charset: 0; mso-number-format: General; text-align: left; vertical-align: middle; border-top: none; border-right: none; border-bottom: .5pt solid windowtext; border-left: .5pt solid windowtext; mso-background-source: auto; mso-pattern: auto; white-space: nowrap; }
.xl99239191 {padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
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
.xl6831439 {padding-top:1px;
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
.xl9231439 {padding-top:1px;
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
.xl92314391 {padding-top:1px;
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
.xl92314392 {padding-top:1px;
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
.xl92314393 {padding-top:1px;
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
.xl6731439 {padding-top:1px;
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
.xl67314391 {padding-top:1px;
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
.xl67314392 {padding-top:1px;
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
.xl92314394 {padding-top:1px;
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
.xl673143921 {padding-top:1px;
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
.xl6731439211 {padding-top:1px;
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
.xl110239191 {padding-top:1px;
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
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl1102391911 {padding-top:1px;
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
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6731439212 {padding-top:1px;
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
.xl67314392111 {padding-top:1px;
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
.xl67314392112 {padding-top:1px;
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
.xl1102391912 {padding-top:1px;
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
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11023919111 {padding-top:1px;
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
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl67314392121 {padding-top:1px;
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
.xl673143921211 {padding-top:1px;
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
.xl673143921212 {padding-top:1px;
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
.xl6731439212121 {padding-top:1px;
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
.xl67314392121211 {padding-top:1px;
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
.xl673143921213 {padding-top:1px;
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
.xl673143921121 {padding-top:1px;
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
.xl6731439212111 {padding-top:1px;
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
.xl6731439211211 {padding-top:1px;
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
.xl67314392112111 {padding-top:1px;
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
.xl67314392113 {padding-top:1px;
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
.xl134239191 {padding-top:1px;
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
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl1342391911 {padding-top:1px;
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
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13423919111 {padding-top:1px;
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
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl134239191111 {padding-top:1px;
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
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid windowtext;

	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl65239191 {padding-top:1px;
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
.xl65239192 {padding-top:1px;
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
-->
</style>
</head>

<body>


<div id="yaku_23919" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=853 class=xl6523919
 style='border-collapse:collapse;table-layout:fixed;width:646pt'>
 <col class=xl6523919 width=12 style='mso-width-source:userset;mso-width-alt:
 438;width:9pt'>
 <col class=xl6523919 width=33 span=2 style='mso-width-source:userset;
 mso-width-alt:1206;width:25pt'>
 <col class=xl6523919 width=37 style='mso-width-source:userset;mso-width-alt:
 1353;width:28pt'>
 <col class=xl6523919 width=33 span=9 style='mso-width-source:userset;
 mso-width-alt:1206;width:25pt'>
 <col class=xl6523919 width=45 style='mso-width-source:userset;mso-width-alt:
 1645;width:34pt'>
 <col class=xl6523919 width=33 span=12 style='mso-width-source:userset;
 mso-width-alt:1206;width:25pt'>
 <tr height=20 style='height:15.0pt'>
  <td height=5 class=xl6523919 width=2 style='height:15.0pt;width:9pt'></td>
  <td class=xl6523919 width=85 style='width:25pt'></td>
  <td class=xl6523919 width=24 style='width:25pt'></td>
  <td class=xl6523919 width=37 style='width:28pt'></td>
  <td class=xl6523919 width=33 style='width:25pt'></td>
  <td class=xl6523919 width=33 style='width:25pt'></td>
  <td class=xl6523919 width=33 style='width:25pt'></td>
  <td class=xl6523919 width=33 style='width:25pt'></td>
  <td class=xl6523919 width=27 style='width:25pt'></td>
  <td class=xl6523919 width=23 style='width:25pt'></td>
  <td class=xl6523919 width=66 style='width:25pt'></td>
  <td class=xl6523919 width=102 style='width:25pt'></td>
  <td class=xl6523919 width=23 style='width:25pt'></td>
  <td class=xl6523919 width=74 style='width:34pt'></td>
  <td class=xl6523919 width=33 style='width:25pt'></td>
  <td class=xl6523919 width=39 style='width:25pt'></td>
  <td class=xl6523919 width=142 style='width:25pt'></td>
  <td class=xl6523919 width=23 style='width:25pt'></td>
  <td class=xl6523919 width=26 style='width:25pt'></td>
  <td class=xl6523919 width=37 style='width:25pt'></td>
  <td class=xl6523919 width=126 style='width:25pt'></td>
  <td class=xl6523919 width=30 style='width:25pt'></td>
  <td class=xl6523919 width=23 style='width:25pt'></td>
  <td class=xl6523919 width=20 style='width:25pt'></td>
  <td class=xl6523919 width=18 style='width:25pt'></td>
  <td class=xl6523919 width=4 style='width:25pt'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl6723919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6923919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6923919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td colspan=6 class=xl8023919><span
  style='mso-spacerun:yes'></span>PEMERINTAH KOTA TEGAL</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7023919></td>
  <td class=xl7023919></td>
  <td class=xl7023919></td>
  <td class=xl7023919></td>
  <td class=xl7023919></td>
  <td class=xl7123919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl7223919 colspan=3>No. SPTPD</td>
  <td class=xl7323919>:</td>
  <td colspan=5 rowspan=2 class=xl7223919 style="vertical-align: top;"><span class="xl9231439"><?php echo $data['surat']['tblobyek_nomorsptpd']; ?></span></td>
  <td class=xl7423919>&nbsp;</td>
 </tr>


 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td colspan=11 class=xl8023919>
    <?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI')) ?>  </td>
  <td class=xl7023919></td>
  <td class=xl7023919></td>
  <td class=xl7123919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7023919></td>
  <td class=xl7023919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td colspan=6 class=xl8023919>Jl. Ki Gede Sebayu No. 5 </td>
  <td class=xl6523919></td>
  <td class=xl7623919></td>
  <td class=xl7723919 width=23 style='width:25pt'></td>
  <td class=xl7723919 width=66 style='width:25pt'></td>
  <td class=xl7723919 width=102 style='width:25pt'></td>
  <td class=xl7723919 width=23 style='width:25pt'></td>
  <td class=xl7723919 width=74 style='width:34pt'></td>
  <td class=xl7823919 width=33 style='width:25pt'>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl7223919 colspan=3>Masa Pajak</td>
  <td class=xl7323919>:</td>
  <td colspan=5 rowspan=2 class=xl13523919><span class="xl92314391" style="white-space: normal; vertical-align: top;"><?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaawal']) ?></span> s/d<span class="xl92314392" style="white-space: normal; vertical-align: top;"> <?php echo LokalIndonesia::TanggalUmum($data['detail_transaksi']['tbltransaksiketetapan_masaakhir']) ?></span></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td colspan=9 class=xl8023919><span style='mso-spacerun:yes'></span>Telp.
  (0283) 355137 - 355138 Pwt 218</td>
  <td class=xl7723919 width=66 style='width:25pt'></td>
  <td class=xl7723919 width=102 style='width:25pt'></td>
  <td class=xl7723919 width=23 style='width:25pt'></td>
  <td class=xl7723919 width=74 style='width:34pt'></td>
  <td class=xl7823919 width=33 style='width:25pt'>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7723919 width=26 style='width:25pt'></td>
  <td class=xl7723919 width=37 style='width:25pt'></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td colspan=7 class=xl8023919><span style='mso-spacerun:yes'></span>T E G A
  L</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl7223919 colspan=3>Tahun Pajak</td>
  <td class=xl7323919>:</td>
  <td colspan=5 rowspan=2 class=xl13523919><span class="xl92314393"><?php echo $data['detail_transaksi']['tbltransaksiketetapan_tahunpajak']; ?></span></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td colspan=3 class=xl8823919>&nbsp;</td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8023919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl8223919>&nbsp;</td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl6723919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl8423919>&nbsp;</td>
  <td colspan=5 class=xl8423919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6923919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td colspan=25 class=xl8823919 style='border-right:.5pt solid black'>SPTPD</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td colspan=25 class=xl8823919 style='border-right:.5pt solid black'>(SURAT
  PEMBERITAHUAN PAJAK DAERAH)</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td colspan=25 class=xl8823919 style='border-right:.5pt solid black'>PAJAK
  AIR TANAH </td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>

  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td colspan=3 class=xl8023919><span
  style='mso-spacerun:yes'></span>N.P.W.P.D</td>
  <td class=xl6523919>:</td>
  <td colspan=13 class=xl13523919><span class="xl6731439"><?php echo $datawp['tblsubyek_npwpd']; ?></span></td>
  <td class=xl6523919 colspan=3>Kepada Yth,</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td colspan=3 class=xl12823919>NAMA WP</td>
  <td class=xl6523919>:</td>
  <td colspan=12 class=xl13523919><span class="xl67314391" style="vertical-align: bottom;"><?php echo $datawp['tblsubyek_nama']; ?></span></td>
  <td class=xl6523919></td>
  <td colspan=6 class=xl7623919><span class="xl92314394">
    <?= strtoupper(AppConfig::model()->getValue('APLIKASI_INSTANSI_SINGKAT')) ?>
  </span> Kota Tegal</td>
  <td class=xl6623919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td colspan=3 class=xl8023919 style="vertical-align: top;">ALAMAT</td>
  <td class=xl6523919 style="vertical-align: top;">:</td>
  <td colspan=9 rowspan=3 class=xl13523919><span class="xl67314392"><?php echo $datawp['tblsubyek_alamat']; ?></span></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td colspan=6 class=xl7623919>Jl Ki Gede Sebayu No. 5 </td>
  <td class=xl6623919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919>di</td>
  <td colspan=5 class=xl7623919>TEGAL</td>
  <td class=xl6623919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl6623919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td colspan=5 class=xl8123919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>

  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8623919><span style='mso-spacerun:yes'></span>PERHATIAN<span
  style='display:none'>HATIAN :</span></td>
  <td class=xl8723919></td>
  <td class=xl8723919></td>
  <td class=xl8723919></td>
  <td class=xl8723919></td>
  <td class=xl8723919></td>
  <td class=xl8723919></td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6923919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8823919>1</td>
  <td colspan=11 class=xl7623919>Harap diisi dengan huruf CETAK</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8823919>2</td>
  <td colspan=22 rowspan=3 class=xl12723919 style='width:562pt'>Setelah
  formulir pendaftaran ini diisi dan ditanda tangani oleh wajib pajak, harap
  diserahka kembali kepada Badan Keuangan 
  Daerah langsung atau dikiram melalui Pos paling lambat tanggal sejak
  berakhirnya masa pajak</td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8823919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8823919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8923919>3</td>
  <td colspan=22 class=xl12723919 style='width:562pt'>Keterlambatan
  penyerahan SPTPD pada tanggal tersebut akan dilakukan teguran SPTPD</td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8823919>&nbsp;</td>
  <td class=xl9023919 width=24 style='width:25pt'></td>
  <td class=xl9023919 width=37 style='width:28pt'></td>
  <td class=xl9023919 width=33 style='width:25pt'></td>
  <td class=xl9023919 width=33 style='width:25pt'></td>
  <td class=xl9023919 width=33 style='width:25pt'></td>
  <td class=xl9023919 width=33 style='width:25pt'></td>
  <td class=xl9023919 width=27 style='width:25pt'></td>
  <td class=xl9023919 width=23 style='width:25pt'></td>
  <td class=xl9023919 width=66 style='width:25pt'></td>
  <td class=xl9023919 width=102 style='width:25pt'></td>
  <td class=xl9023919 width=23 style='width:25pt'></td>
  <td class=xl9023919 width=74 style='width:34pt'></td>
  <td class=xl9023919 width=33 style='width:25pt'></td>
  <td class=xl9023919 width=39 style='width:25pt'></td>
  <td class=xl9023919 width=142 style='width:25pt'></td>
  <td class=xl9023919 width=23 style='width:25pt'></td>
  <td class=xl9023919 width=26 style='width:25pt'></td>
  <td class=xl9023919 width=37 style='width:25pt'></td>
  <td class=xl9023919 width=126 style='width:25pt'></td>
  <td class=xl9023919 width=30 style='width:25pt'></td>
  <td class=xl9023919 width=23 style='width:25pt'></td>
  <td class=xl9023919 width=20 style='width:25pt'></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td colspan=25 class=xl9923919 style='border-right:.5pt solid black'>A. DIISI
  OLEH PENGUSAHA AIR TANAH </td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl9123919>&nbsp;</td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9323919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8823919>1</td>
  <td colspan=6 class=xl7223919>Air Tanah</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6623919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td rowspan=2 class=xl15023919>No.</td>
  <td colspan=5 rowspan=2 class=xl12023919 style='border-right:.5pt solid black'>Volume
  Air</td>
  <td colspan=5 rowspan=2 class=xl12023919 style='border-bottom:.5pt solid black'>Harga
  Dasar Air</td>
  <td colspan=3 rowspan=2 class=xl12023919 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black'>Vol</td>
  <td colspan=9 class=xl10923919>NPA Rp.</td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.75pt'>
  <td height=25 class=xl6523919 style='height:18.75pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td colspan=9 class=xl7223919 style='border-right:.5pt solid black'>Nilai
  Perolehan Air Tanah</td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl6523919 style='height:16.5pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl9423919 style="aligen:center">1</td>
  <td colspan=5 class=xl11023919 style='border-right:.5pt solid black;
  border-left:none'><div align="right"><span class="xl673143921">
    <?php if(isset($uraian_pat[1])): ?>
    <?= $uraian_pat[1]['tblpendataanairtanahdet_volket'] ?>&nbsp;
    <?php endif;?>
  </span></div></td>
  <td colspan=5 class=xl11623919 style='border-right:.5pt solid black;
  border-left:none; '><div align="right"><span class="xl6731439212">
    <?php if(isset($uraian_pat[1])): ?>
	&nbsp;<?= $uraian_pat[1]['tblpendataanairtanahdet_hargasekmen'] ?>&nbsp;
	<?php endif;?>
  </span></div></td>
  <td colspan="3" class=xl6523919 style='border-right:.5pt solid black; aligen'><div align="right"><span class="xl67314392121">
    <?php if(isset($uraian_pat[1])): ?>
	<?= $uraian_pat[1]['tblpendataanairtanahdet_vol'] ?>&nbsp;
	<?php endif;?>
  </span></div></td>
  <td colspan=9 class=xl11923919 style='border-left:none'><div align="right"><span class="xl673143921213">
    <?php if(isset($uraian_pat[1])): ?>
    <?= LokalIndonesia::ribuan($uraian_pat[1]['tblpendataanairtanahdet_nparupiah']) ?>&nbsp;
    <?php endif;?>
  </span></div></td>
  <td class=xl9523919 style='border-left:none'>&nbsp;</td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl6523919 style='height:14.25pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl9623919 style='border-top:none'>2</td>
  <td colspan=5 class=xl11623919 style='border-right:.5pt solid black;
  border-left:none'><div align="right"><span class="xl6731439211">
    <?php if(isset($uraian_pat[2])): ?>
    <?= $uraian_pat[2]['tblpendataanairtanahdet_volket'] ?>&nbsp;
    <?php endif;?>
  </span></div></td>
  <td colspan=5 class=xl11623919 style='border-right:.5pt solid black;
  border-left:none'><div align="right"><span class="xl67314392111">
    <?php if(isset($uraian_pat[2])): ?>
	<?= $uraian_pat[2]['tblpendataanairtanahdet_hargasekmen'] ?>&nbsp;
	<?php endif;?>
  </span></div></td>
  <td colspan=3 class=xl13123919 style='border-right:.5pt solid black;
  border-left:none'><div align="left"><div align="right"><span class="xl673143921211">
    <?php if(isset($uraian_pat[2])): ?>
	<?= $uraian_pat[2]['tblpendataanairtanahdet_vol'] ?>&nbsp;
	<?php endif;?>
  </span></div></td>
  <td colspan=9 class=xl13123919 style='border-right:.5pt solid black;
  border-left:none'><div align="right"><span class="xl6731439212111">
    <?php if(isset($uraian_pat[2])): ?>
    <?= LokalIndonesia::ribuan( $uraian_pat[2]['tblpendataanairtanahdet_nparupiah']) ?>&nbsp;
    <?php endif;?>
  </span></div></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl6523919 style='height:14.25pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl9423919 style='border-top:none'>3</td>
  <td colspan=5 class=xl11023919 style='border-right:.5pt solid black;
  border-left:none'><div align="right"><span class="xl67314392113">
    <?php if(isset($uraian_pat[3])): ?>
    <?= $uraian_pat[3]['tblpendataanairtanahdet_volket'] ?>&nbsp;
    <?php endif;?>
  </span></div></td>
  <td colspan=5 class=xl11023919 style='border-right:.5pt solid black;
  border-left:none'><div align="right"><span class="xl67314392112">
    <?php if(isset($uraian_pat[3])): ?>
	<?= $uraian_pat[3]['tblpendataanairtanahdet_hargasekmen'] ?>&nbsp;
	<?php endif;?>
  </span></div></td>
  <td colspan=3 class=xl11323919 style='border-right:.5pt solid black;
  border-left:none'><div align="left"><div align="right"><span class="xl673143921212">
    <?php if(isset($uraian_pat[3])): ?>
	<?= $uraian_pat[3]['tblpendataanairtanahdet_vol'] ?>&nbsp;
	<?php endif;?>
  </span></div></td>
  <td colspan=9 class=xl13423919 style='border-left:none'><div align="right"><span class="xl673143921121">
    <?php if(isset($uraian_pat[3])): ?>
    <?= LokalIndonesia::ribuan( $uraian_pat[3]['tblpendataanairtanahdet_nparupiah']) ?>&nbsp;
    <?php endif;?>
  </span></div></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl9723919 style='border-top:none'>4</td>
  <td colspan=5 class=xl11023919 style='border-right:.5pt solid black;
  border-left:none'><div align="right"><span class="xl110239191" style="border-right:none;
  border-left:none; border-top:none; border-bottom:none">
    <?php if(isset($uraian_pat[4])): ?>
    <?= $uraian_pat[4]['tblpendataanairtanahdet_volket'] ?>&nbsp;
    <?php endif;?>
  </span></div></td>
  <td colspan=5 class=xl11023919 style='border-right:.5pt solid black;
  border-left:none'><div align="right"><span class="xl1102391912" style="border-right:none;
  border-left:none; border-top:none; border-bottom:none">
    <?php if(isset($uraian_pat[4])): ?>
	<?= $uraian_pat[4]['tblpendataanairtanahdet_hargasekmen'] ?>&nbsp;
	<?php endif;?>
  </span></div></td>
  <td colspan=3 class=xl11323919 style='border-right:.5pt solid black;
  border-left:none'><div align="left"><div align="right"><span class="xl6731439212121">
    <?php if(isset($uraian_pat[4])): ?>
	<?= $uraian_pat[4]['tblpendataanairtanahdet_vol'] ?>&nbsp;
	<?php endif;?>
  </span></div></td>
  <td colspan=9 class=xl13423919 style='border-left:none'><div align="right"><span class="xl6731439211211">
    <?php if(isset($uraian_pat[4])): ?>
    <?= LokalIndonesia::ribuan($uraian_pat[4]['tblpendataanairtanahdet_nparupiah']) ?>&nbsp;
    <?php endif;?>
  </span></div></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl10623919>5</td>
  <td colspan=5 class=xl8623919 style='border-right:.5pt solid black;
  border-left:none'><div align="right"><span class="xl1102391911" style="border-right:none;
  border-left:none; border-top:none; border-bottom:none">
    <?php if(isset($uraian_pat[5])): ?>
    <?= $uraian_pat[5]['tblpendataanairtanahdet_volket'] ?>&nbsp;
    <?php endif;?>
  </span></div></td>
  <td colspan=5 class=xl11023919 style='border-right:.5pt solid black;
  border-left:none'><div align="right"><span class="xl11023919111" style="border-right:none;
  border-left:none; border-top:none; border-bottom:none">
    <?php if(isset($uraian_pat[5])): ?>
	<?= $uraian_pat[5]['tblpendataanairtanahdet_hargasekmen'] ?>&nbsp;
	<?php endif;?>
  </span></div></td>
  <td colspan=3 class=xl11323919 style='border-right:.5pt solid black;
  border-left:none'><div align="left"><div align="right"><span class="xl67314392121211">
    <?php if(isset($uraian_pat[5])): ?>
	<?= $uraian_pat[5]['tblpendataanairtanahdet_vol'] ?>&nbsp;
	<?php endif;?>
  </span></div></td>
  <td colspan=9 class=xl13423919 style='border-left:none'><div align="right"><span class="xl67314392112111">
    <?php if(isset($uraian_pat[5])): ?>
    <?= LokalIndonesia::ribuan($uraian_pat[5]['tblpendataanairtanahdet_nparupiah']) ?>&nbsp;
    <?php endif;?>
  </span></div></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl10623919>6</td>
  <td colspan=5 class=xl8623919 style='border-right:.5pt solid black;
  border-left:none'><div align="right"><span class="xl1102391911" style="border-right:none;
  border-left:none; border-top:none; border-bottom:none">
    <?php if(isset($uraian_pat[6])): ?>
    <?= $uraian_pat[6]['tblpendataanairtanahdet_volket'] ?>&nbsp;
    <?php endif;?>
  </span></div></td>
  <td colspan=5 class=xl11023919 style='border-right:.5pt solid black;
  border-left:none'><div align="right"><span class="xl11023919111" style="border-right:none;
  border-left:none; border-top:none; border-bottom:none">
    <?php if(isset($uraian_pat[6])): ?>
	<?= $uraian_pat[6]['tblpendataanairtanahdet_hargasekmen'] ?>&nbsp;
	<?php endif;?>
  </span></div></td>
  <td colspan=3 class=xl11323919 style='border-right:.5pt solid black;
  border-left:none'><div align="left"><div align="right"><span class="xl67314392121211">
    <?php if(isset($uraian_pat[6])): ?>
	<?= $uraian_pat[6]['tblpendataanairtanahdet_vol'] ?>&nbsp;
	<?php endif;?>
  </span></div></td>
  <td colspan=9 class=xl13423919 style='border-left:none'><div align="right"><span class="xl67314392112111">
    <?php if(isset($uraian_pat[6])): ?>
    <?= LokalIndonesia::ribuan($uraian_pat[6]['tblpendataanairtanahdet_nparupiah']) ?>&nbsp;
    <?php endif;?>
  </span></div></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td colspan=6 class=xl14423919>&nbsp;</td>
  <td colspan=5 class=style103>&nbsp;Jumlah NPA</td>
  <td colspan=3 class=xl13423919 style='border-left:none'><div align="right"><span class="xl1342391911" style="border-left:none; border-bottom:none; border-right:none; border-top: none;">
    <?php echo $voljml['tblpendataanairtanah_volume']; ?>&nbsp;</span></div></td>
  <td colspan=9 class=xl13423919 style='border-left:none'>
    <div align="right"><span class="xl134239191" style="border-left:none; border-bottom:none; border-right:none; border-top: none;">
        <?php echo LokalIndonesia::ribuan($transidjml['tbltransaksiketetapan_omzettotal']); ?>&nbsp;</span></div></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>


  <td colspan=6 class=xl14523919 style='width:153pt'>&nbsp;</td>
  <td colspan=8 class=style104 style='border-right:.5pt solid black'>&nbsp;Jumlah
  Pajak Terhutang 20%</td>
  <td colspan=9 class=xl14323919 style='border-left:none;width:225pt'><div align="right"><span class="xl13423919111" style="border-left:none; border-bottom:none; border-right:none; border-top: none;"><?php echo LokalIndonesia::ribuan($pjk['tbltransaksiketetapan_pajak']); ?>&nbsp;</span></div></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td colspan=6 class=xl14723919 style='border-right:.5pt solid black;
  width:153pt'>&nbsp;</td>
  <td colspan=8 class=style105 style='border-right:.5pt solid black;
  border-left:none'>&nbsp;Jumlah Pajak Terhutang (pembulatan)</td>
  <td colspan=9 class=xl14323919 style='border-left:none;width:225pt'><div align="right"><span class="xl134239191111" style="border-left:none; border-bottom:none; border-right:none; border-top: none;"><?php echo LokalIndonesia::ribuan($pjk['tbltransaksiketetapan_pajak']); ?>&nbsp;</span></div></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl9823919 width=24 style='width:25pt'></td>
  <td class=xl9823919 width=37 style='width:28pt'></td>
  <td class=xl9823919 width=33 style='width:25pt'></td>
  <td class=xl9823919 width=33 style='width:25pt'></td>
  <td class=xl9823919 width=33 style='width:25pt'></td>
  <td class=xl9823919 width=33 style='width:25pt'></td>
  <td class=xl9823919 width=27 style='width:25pt'></td>
  <td class=xl9823919 width=23 style='width:25pt'></td>
  <td class=xl9823919 width=66 style='width:25pt'></td>
  <td class=xl9823919 width=102 style='width:25pt'></td>
  <td class=xl9823919 width=23 style='width:25pt'></td>
  <td class=xl9823919 width=74 style='width:34pt'></td>
  <td class=xl9823919 width=33 style='width:25pt'></td>
  <td class=xl9823919 width=39 style='width:25pt'></td>
  <td class=xl9823919 width=142 style='width:25pt'></td>
  <td class=xl9823919 width=23 style='width:25pt'></td>
  <td class=xl9823919 width=26 style='width:25pt'></td>
  <td class=xl9823919 width=37 style='width:25pt'></td>
  <td class=xl9823919 width=126 style='width:25pt'></td>
  <td class=xl9823919 width=30 style='width:25pt'></td>
  <td class=xl9823919 width=23 style='width:25pt'></td>
  <td class=xl9823919 width=20 style='width:25pt'></td>
  <td class=xl9823919 width=18 style='width:25pt'></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td colspan=2 class=style97>&nbsp;</td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl15623919></td>
  <td class=xl9823919 width=18 style='width:25pt'></td>
  <td class=xl7523919>&nbsp;</td>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl10223919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl10423919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  

  <td class=xl6523919></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl15523919>&nbsp;</td>
  <td class=xl10823919>&nbsp;</td>
  <td class=xl10823919>&nbsp;</td>
  <td class=xl10823919>&nbsp;</td>
  <td class=xl10823919>&nbsp;</td>
  <td class=xl10723919>&nbsp;</td>
  <td class=xl10723919>&nbsp;</td>
  <td class=xl10723919>&nbsp;</td>
  <td class=xl10723919>&nbsp;</td>
  <td class=xl10723919 colspan=6>B. DIISI OLEH WAJIB PAJAK</td>
  <td class=xl10723919>&nbsp;</td>
  <td class=xl10723919>&nbsp;</td>
  <td class=xl10723919>&nbsp;</td>
  <td class=xl10723919>&nbsp;</td>
  <td class=xl10723919>&nbsp;</td>
  <td class=xl10723919>&nbsp;</td>
  <td class=xl10723919>&nbsp;</td>
  <td class=xl10723919>&nbsp;</td>
  <td class=xl10723919>&nbsp;</td>
  <td class=xl15223919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>

  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8823919>1</td>
  <td class=xl6523919 colspan=10>Dihitug Berdasarkan Nilai Kontrak Dengan Pihak
  Ke 3</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919 colspan=6>dalam Tahun Pajak Tertentu) :</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>

  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919>a.</td>
  <td class=xl6523919 colspan=3>Masa Pajak</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919>:</td>
  <td class=xl7623919>Tgl</td>
  <td class=xl7923919>.........................</td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919>s/d</td>
  <td class=xl6523919>Tgl</td>
  <td class=xl7923919>.........................</td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919>b.</td>
  <td class=xl6523919 colspan=3>Nilai Kontrak</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919>:</td>
  <td class=xl7623919>Rp</td>
  <td class=xl7923919>.........................</td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>

  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919 colspan=5>Tarif Pajak (sesuai Perda)</td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919>c.</td>
  <td class=xl6523919 colspan=5>Tarif Pajak (sesuai Perda)</td>
  <td class=xl6523919></td>
  <td class=xl7923919>:</td>
  <td class=xl7923919>................</td>
  <td class=xl7923919></td>
  <td class=xl7923919>%</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>

  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919>d.</td>
  <td class=xl6523919 colspan=5>Pajak Terhutang ( b x c )</td>
  <td class=xl6523919></td>
  <td class=xl7923919>:</td>
  <td class=xl7623919>Rp.</td>
  <td class=xl7923919>.........................</td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl10223919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl10423919>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
 </tr>
 <tr height=20 style='height:15.0pt'>

  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
 </tr>
 

 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td colspan="24" class=xl6723919><div align="center"><strong>C. PERNYATAAN </strong></div></td>
  <td class=xl6923919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl6723919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl10523919>&nbsp;</td>
  <td class=xl10523919>&nbsp;</td>
  <td class=xl10523919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6923919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>

  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>

  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919 colspan=24 style='border-right:.5pt solid black'>Dengan
  menyadari sepenuhnya akan segala akibat termasuk sanksi - sanksi sesuai
  dengan ketentuan perundang - undangan yang </td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919 colspan=24 style='border-right:.5pt solid black'>berlaku atau
  yang saya beri kuasa menyatakan bahwa ap yang telah kami beritahukan terseut
  diatas beserta lampiran - lampiran adalah </td>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8823919>&nbsp;</td>
  <td colspan="5" class=xl9023919 style='width:25pt'>benar,lengkap,dan jelas </td>
  <td class=xl9023919 width=33 style='width:25pt'></td>
  <td class=xl9023919 width=27 style='width:25pt'></td>
  <td class=xl9023919 width=23 style='width:25pt'></td>
  <td class=xl9023919 width=66 style='width:25pt'></td>
  <td class=xl9023919 width=102 style='width:25pt'></td>
  <td class=xl9023919 width=23 style='width:25pt'></td>
  <td class=xl9023919 width=74 style='width:34pt'></td>
  <td class=xl9023919 width=33 style='width:25pt'></td>
  <td class=xl9023919 width=39 style='width:25pt'></td>
  <td class=xl9023919 width=142 style='width:25pt'></td>
  <td class=xl9023919 width=23 style='width:25pt'></td>
  <td class=xl9023919 width=26 style='width:25pt'></td>
  <td class=xl9023919 width=37 style='width:25pt'></td>
  <td class=xl9023919 width=126 style='width:25pt'></td>
  <td class=xl9023919 width=30 style='width:25pt'></td>
  <td class=xl9023919 width=23 style='width:25pt'></td>
  <td class=xl9023919 width=20 style='width:25pt'></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>

  <td class=xl10223919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl10423919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl15523919 style='border-top:none'>&nbsp;</td>
  <td class=xl10723919 style='border-top:none'>&nbsp;</td>
  <td class=xl10723919 style='border-top:none'>&nbsp;</td>
  <td class=xl10823919 style='border-top:none'>&nbsp;</td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10723919 colspan=11>D. DIISI OLEH PETUGAS PENERIMA BAKEUDA KOTA
  TEGAL</td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10123919 style='border-top:none'>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl9123919>&nbsp;</td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9323919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl9123919>&nbsp;</td>
  <td class=xl7623919 colspan=18>Dengan menyadari sepenuhnya akan segala akibat
  termasuk sanksi-sanksi sesuai dengan ketentuan</td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9323919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl9123919>&nbsp;</td>
  <td class=xl7623919 colspan=17>perundang-undangan yang berlaku, saya atau
  yang saya beri kuasa menyatakan bahwa apa yang</td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9323919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl9123919>&nbsp;</td>
  <td class=xl7623919 colspan=16>telah beritahukan tersebut diatas beserta
  lampiran-lampiran adalah benar, lengkap dan jelas</td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9323919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl9123919>&nbsp;</td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9323919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl9123919>&nbsp;</td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl7623919 colspan=7>Tegal,
  ..............................................</td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl9223919></td>
  <td class=xl9323919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>

  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919>Wajib Pajak</td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7923919>____________________</td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919>Nama Jelas &amp; Stempel</td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl10223919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>

  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl10423919>&nbsp;</td>
 </tr>
</tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl15523919 style='border-top:none'>&nbsp;</td>
  <td class=xl10723919 style='border-top:none'>&nbsp;</td>
  <td class=xl10723919 style='border-top:none'>&nbsp;</td>
  <td class=xl10823919 style='border-top:none'>&nbsp;</td>

  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10723919 colspan=11><strong>E. DIISI OLEH PETUGAS PENERINA</strong></td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10023919 style='border-top:none'>&nbsp;</td>
  <td class=xl10123919 style='border-top:none'>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl6723919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6823919 style='border-top:none'>&nbsp;</td>
  <td class=xl6923919 style='border-top:none'>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919 colspan=7>Perhitungan dan penetapan Pajak :</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>

  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919 colspan=3>Diterima tanggal</td>
  <td class=xl6523919 colspan=4>:…………………….</td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919 colspan=3>Nama Petugas</td>
  <td class=xl6523919 colspan=4><span class="xl65239191">:&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.</span></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>

  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919>NIP</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td colspan="4" class=xl6523919><span class="xl65239192">:&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.</span></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl10223919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>
  <td class=xl8123919>&nbsp;</td>

  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl10423919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl6723919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl10523919>&nbsp;</td>
  <td class=xl10523919>&nbsp;</td>
  <td class=xl10523919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6823919>&nbsp;</td>
  <td class=xl6923919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919 colspan=3>NO. SPTPD</td>
  <td class=xl7923919>...............................</td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl9223919>TANDA TERIMA</td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl9223919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919 colspan=2>NPWPD</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919>:</td>
  <td class=xl7623919 colspan=13>...........................................................................................................</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919 colspan=2>NAMA</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919>:</td>
  <td class=xl7623919 colspan=13>...........................................................................................................</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919 colspan=2>ALAMAT</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919>:</td>
  <td class=xl7623919 colspan=13>...........................................................................................................</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7623919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl7623919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919>...............</td>
  <td class=xl7923919></td>
  <td class=xl6523919>, ......<span style='display:none'>.</span></td>
  <td class=xl6623919>....... Tahun</td>
  <td class=xl6623919></td>
  <td class=xl6523919>.......</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919>Yang menerima</td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl8523919>&nbsp;</td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7923919>( ........................ )</td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl7923919></td>
  <td class=xl6523919></td>
  <td class=xl6523919></td>
  <td class=xl7523919>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6523919 style='height:15.0pt'></td>
  <td class=xl10223919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl8323919>&nbsp;</td>
  <td class=xl10423919>&nbsp;</td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=2 style='width:9pt'></td>
  <td width=85 style='width:25pt'></td>
  <td width=24 style='width:25pt'></td>
  <td width=37 style='width:28pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=27 style='width:25pt'></td>
  <td width=23 style='width:25pt'></td>
  <td width=66 style='width:25pt'></td>
  <td width=102 style='width:25pt'></td>
  <td width=23 style='width:25pt'></td>
  <td width=74 style='width:34pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=39 style='width:25pt'></td>
  <td width=142 style='width:25pt'></td>
  <td width=23 style='width:25pt'></td>
  <td width=26 style='width:25pt'></td>
  <td width=37 style='width:25pt'></td>
  <td width=126 style='width:25pt'></td>
  <td width=30 style='width:25pt'></td>
  <td width=23 style='width:25pt'></td>
  <td width=20 style='width:25pt'></td>
  <td width=18 style='width:25pt'></td>
  <td width=4 style='width:25pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>

<?php
	//$select = '*';
//	$from = 'tblsetoran';
//	$otherquery = array(
//		/*'leftjoin_1' => array('tbltransaksiketetapan', 'tbltransaksiketetapan.tblobyek_id = tblobyek.tblobyek_id')
//		,'join_2' => array('tblsubyek', 'tblsubyek.tblsubyek_id = tblobyek.tblsubyek_id')*/
//	);
//	$filter = array(
//		'EQ__rekening_jenis' =>  $data['rekening_kode']
//		,'EQ__ketetapan_tahunpajak' => $data['tahun_pajak']
//		//,'GTEQ__vlap_L3.ketetapan_tgl_AS_tglawal' => strval($tgl_ketetapan_awal) //.' '. ' 00:00:00'
//		//,'LTEQ__vlap_L3.ketetapan_tgl_AS_tglakhir' => strval($tgl_ketetapan_akhir) //.' '. ' 23:59:59'
//		);
	//$data['laporan'] = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery,'filter'=>$filter, 'mode'=>'LIST'));
	
	$querySQL = '
	SELECT
	tbltransaksiketetapan.*
	FROM
	tbltransaksiketetapan
	WHERE
	kode_obyek LIKE "%41102%"
	AND YEAR(tbltransaksiketetapan_tglketetapan) = '.$data['tahun_pajak'].'
	';
	
	$data['laporan'] = Yii::app()->db->createCommand($querySQL)->queryAll();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<meta name="generator" content="LibreOffice 4.4.3.2 (Linux)"/>
	<meta name="author" content="Diginet "/>
	<meta name="created" content="2017-01-06T15:21:48.547219289"/>
	<meta name="changedby" content="Diginet "/>
	<meta name="changed" content="2017-01-06T15:24:22.152838959"/>
	
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Liberation Sans"; /*font-size:x-small*/ }
	</style>
	
</head>

<body>
<table border="0" align="center" cellspacing="0">
	<colgroup width="50"></colgroup>
	<colgroup width="50"></colgroup>
	<colgroup width="300"></colgroup>
	<colgroup width="200"></colgroup>
	<tr>
		<td colspan=4 height="17" align="center" valign=bottom>REKAP PIUTANG </td>
  </tr>
	<tr>
		<td colspan=4 height="17" align="center" valign=bottom>PAJAK RESTORAN</td>
  </tr>
	<tr>
		<td colspan=4 height="17" align="center" valign=bottom>TAHUN <?= $data['tahun_pajak'] ?></td>
  </tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left" valign=bottom><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 height="34" align="center" valign=middle>NO</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>TAHUN</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>JUMLAH TUNGGAKAN</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>KETERANGAN</td>
	</tr>
	<tr>
  </tr>
  <?php $total= array('setor_jumlah'=>0); $no = 1; foreach($data['laporan'] as $row): ?>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom sdval="1" sdnum="1033;"><?= $no++; ?></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="2013" sdnum="1033;"><?= $data['tahun_pajak'] ?></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="2000" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><?= LokalIndonesia::ribuan($row['setor_jumlah']); $total['setor_jumlah']+= $row['setor_jumlah']; ?></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
	</tr>	
  <?php endforeach; ?>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="17" align="center" valign=bottom>JUMLAH TOTAL</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="2302000" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"> <?= LokalIndonesia::ribuan($total['setor_jumlah']) ?> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="center" valign=bottom><?= AppConfig::model()->getValue('APLIKASI_CETAK_WILAYAH') ?>, <?= LokalIndonesia::TanggalUmum(date('Y-m-d')) ?></td>
	</tr>
	<tr>
		<td colspan=2 height="17" align="center" valign=bottom>MENGETAHUI</td>
		<td align="left" valign=bottom><br></td>
		<td align="center" valign=bottom><br></td>
	</tr>
	<tr>
		<td colspan=2 height="17" align="center" valign=bottom>KABID PENDATAAN,PENETAPAN DAN PENAGIHAN</td>
		<td align="left" valign=bottom><br></td>
		<td align="center" valign=bottom>KEPALA SEKSI PENAGIHAN</td>
	</tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="center" valign=bottom><br></td>
	</tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td colspan=2 height="18" align="center" valign=bottom><u><font face="Calibri" color="#000000">SONI SONTANI, SH</font></u></td>
		<td align="left" valign=bottom><u><font face="Calibri" color="#000000"><br></font></u></td>
		<td align="center" valign=bottom><u><font face="Calibri" color="#000000">GIGIH WAHYUDIN, SH.MM</font></u></td>
	</tr>
	<tr>
		<td colspan=2 height="17" align="center" valign=bottom>Pembina </td>
		<td align="left" valign=bottom><br></td>
		<td align="center" valign=bottom>NIP. 19710522 199702 1 002</td>
	</tr>
	<tr>
		<td colspan=2 height="17" align="center" valign=bottom>NIP.19630122 1986 1 008</td>
		<td align="left" valign=bottom><br></td>
		<td align="left"><br></td>
	</tr>
</table>
<!-- ************************************************************************** -->
</body>

</html>

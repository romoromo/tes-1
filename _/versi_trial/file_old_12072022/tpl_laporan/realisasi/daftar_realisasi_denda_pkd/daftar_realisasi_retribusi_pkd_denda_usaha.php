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
		tblsetoran.tblsetoran_tglsetor AS setoran_tgl,
		tblsetoran.tblsetoran_nomorsetor AS setoran_kohir,
		tblsubyek.tblsubyek_nama AS subyek_nama,
		tblsubyek.tblsubyek_alamat AS subyek_alamat,
		tblsubyek.tblsubyek_npwpd AS subyek_npwpd,
		tblsubyek.tblsubyek_npwrd AS subyek_npwrd,
		tblobyek.tblobyek_nama AS obyek_nama,
		tblobyek.tblobyek_alamat AS obyek_alamat,
		tblobyek.tblobyek_npwpd AS obyek_nop,
		tblmasterrekening.tblmasterrekening_kode AS rekening_kode,
		tblmasterrekening.tblmasterrekening_nama AS rekening_nama,
		tblmasterrekening.tblmasterrekening_jenis AS rekening_jenis,
		tbltransaksiketetapan.tbltransaksiketetapan_tglketetapan AS ketetapan_tgl,
		tbltransaksiketetapan.tbltransaksiketetapan_nokohirketetapan AS ketetapan_kohir,
		tbltransaksiketetapan.tbltransaksiketetapan_tahunpajak AS ketetapan_tahunpajak,
		tbltransaksiketetapan.tbltransaksiketetapan_masaawal AS ketetapan_masaawal,
		tbltransaksiketetapan.tbltransaksiketetapan_masaakhir AS ketetapan_masaakhir,
		tblpendataanreklame.tblpendataanreklame_luas AS pendataan_sekunder,
		YEAR(tblsetoran_tglsetor) AS setor_tahun,
		tblsetoran.tblsetoran_totalsetor AS setor_jumlah,
		tblsetoran.tblsetoran_dendasetor AS setor_denda,
		tblsetoran.tblsetoran_tglsetor AS setor_tgl
	FROM
	tblsetoran
	JOIN tblobyek ON tblobyek.tblobyek_id = tblsetoran.tblobyek_id
	JOIN tblsubyek ON tblobyek.tblsubyek_id = tblsubyek.tblsubyek_id
	LEFT JOIN tblmasterrekening ON tblobyek.tblmasterrekening_id = tblmasterrekening.tblmasterrekening_id
	LEFT JOIN tbltransaksiketetapan ON tblsetoran.tbltransaksiketetapan_id = tbltransaksiketetapan.tbltransaksiketetapan_id
	LEFT JOIN tblpendataanreklame ON tbltransaksiketetapan.tbltransaksiketetapan_id = tblpendataanreklame.tbltransaksiketetapan_id
	WHERE
		tblmasterrekening_kode LIKE "'.$data['rekening_kode'].'%"
		AND YEAR(tblsetoran_tglsetor) = '.$data['tahun_setor'].'
	ORDER BY
		tblmasterrekening.tblmasterrekening_kode
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
	<meta name="created" content="2016-12-23T08:39:46.815195314"/>
	<meta name="changedby" content="Diginet "/>
	<meta name="changed" content="2016-12-24T09:35:30.097525615"/>
	
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Liberation Sans"; font-size:x-small }
	</style>
	
</head>

<body>
<table cellspacing="0" border="0">
	<colgroup width="45"></colgroup>
	<colgroup width="100"></colgroup>
	<colgroup width="61"></colgroup>
	<colgroup width="49"></colgroup>
	<colgroup width="327"></colgroup>
	<colgroup width="387"></colgroup>
	<colgroup width="133"></colgroup>
	<colgroup width="93"></colgroup>
	<colgroup span="2" width="28"></colgroup>
	<colgroup width="68"></colgroup>
	<colgroup width="53"></colgroup>
	<colgroup width="104"></colgroup>
	<colgroup width="100"></colgroup>
	<tr>
		<td colspan=14 height="17" align="center" valign=bottom>DAFTAR REALISASI DENDA  RETRIBUSI PEMAKAIAN KEKAYAAN DAERAH </td>
		</tr>
	<tr>
		<td colspan=14 height="17" align="center" valign=bottom>JENIS : TANAH USAHA</td>
		</tr>
	<tr>
		<td colspan=14 height="17" align="center" valign=bottom>TAHUN <?= $data['tahun_setor'] ?></td>
		</tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 height="37" align="center" valign=middle>NO</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=bottom>SKRD</td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom>STAT</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>NAMA</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>ALAMAT</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>NPWPD</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="center" valign=middle>AYAT</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>TAHUN</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>LUAS</td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"> JUMLAH </font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom>TANGGAL</td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom>TGL.TAP</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom>KOHIR</td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom>SPT</td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"> SETOR </font></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom>SETOR</td>
	</tr>
	<?php $total= array('setor_jumlah'=>0); $no = 1; foreach($data['laporan'] as $row): ?>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="18" align="center" valign=bottom sdval="1" sdnum="1033;"><?= $no++; ?></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="42023" sdnum="1033;1033;M/D/YYYY"><?= strtotime($row['ketetapan_tgl']) ? date('d/m/Y', strtotime($row['ketetapan_tgl']) ) : "" ?></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="171" sdnum="1033;"><font face="Arial"><?= $row['ketetapan_kohir'] ?></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">G</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><?= $row['subyek_nama'] ?></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><?= $row['subyek_alamat'] ?></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><?= $row['subyek_npwprd'] ?></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="101061213" sdnum="1033;">101061213</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="12" sdnum="1033;">12</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="9" sdnum="1033;">9</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="2009" sdnum="1033;">2009</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="200" sdnum="1033;">200</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="115300" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"><?= LokalIndonesia::ribuan($row['pendataan_sekunder'],null,2) ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="42023" sdnum="1033;1033;M/D/YYYY"><?= strtotime($row['setoran_tgl']) ? date('d/m/Y', strtotime($row['setoran_tgl']) ) : "" ?></td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 height="18" align="center" valign=bottom>JUMLAH</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="192200" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"> <?= LokalIndonesia::ribuan($total['setor_jumlah']) ?> </font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td colspan=7 align="center" valign=bottom><?= AppConfig::model()->getValue('APLIKASI_CETAK_WILAYAH') ?>,<span
  style='mso-spacerun:yes'>  </span><?= LokalIndonesia::TanggalUmum(date('Y-m-d')) ?></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="center" valign=bottom><br></td>
		<td align="center" valign=bottom><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="18" align="left"><br></td>
		<td colspan=4 align="center" valign=bottom><font face="Calibri" color="#000000">MENGETAHUI</font></td>
		<td align="left"><br></td>
		<td colspan=7 align="center" valign=bottom><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="18" align="left"><br></td>
		<td colspan=4 align="center" valign=bottom><font face="Calibri" color="#000000">KABID PENATAAN,PENETAPAN DAN PENAGIHAN</font></td>
		<td align="left"><br></td>
		<td colspan=7 align="center" valign=bottom><font face="Calibri" color="#000000">BENDAHARAWAN PENERIMA</font></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="18" align="left"><br></td>
		<td align="center" valign=bottom><font face="Calibri" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Calibri" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><br></td>
		<td align="center" valign=bottom><font face="Calibri" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="18" align="left"><br></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><br></td>
		<td align="left" valign=bottom><font face="Calibri" color="#000000"><br></font></td>
		<td align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="18" align="left"><br></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><br></td>
		<td align="left" valign=bottom><font face="Calibri" color="#000000"><br></font></td>
		<td align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="18" align="left"><br></td>
		<td colspan=4 align="center" valign=bottom><u><font face="Calibri" color="#000000">SONI SONTANI,SH</font></u></td>
		<td align="left"><br></td>
		<td colspan=7 align="center" valign=bottom><u><font face="Calibri" color="#000000">INDRA LESMANA</font></u></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="18" align="left"><br></td>
		<td colspan=4 align="center" valign=bottom><font face="Calibri" color="#000000">Pembina</font></td>
		<td align="left"><br></td>
		<td colspan=7 align="center" valign=bottom><font face="Calibri" color="#000000">NIP.19771124 200801 1 002</font></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="18" align="left"><br></td>
		<td colspan=4 align="center" valign=bottom><font face="Calibri" color="#000000">NIP.19630122 1986 1 008</font></td>
		<td align="left"><b><font face="Calibri" color="#000000"><br></font></b></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><br></td>
	</tr>
</table>
<!-- ************************************************************************** -->
</body>

</html>

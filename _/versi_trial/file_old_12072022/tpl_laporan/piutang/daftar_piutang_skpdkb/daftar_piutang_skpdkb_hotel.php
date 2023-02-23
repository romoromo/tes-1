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
		tbltransaksiketetapan.tbltransaksiketetapan_masaawal AS ketetapan_masaawal,
		tbltransaksiketetapan.tbltransaksiketetapan_masaakhir AS ketetapan_masaakhir,
		YEAR(tblsetoran_tglsetor) AS setor_tahun,
		tblsetoran.tblsetoran_totalsetor AS setor_jumlah,
		tblsetoran.tblsetoran_dendasetor AS setor_denda,
		tblsetoran.tblsetoran_tglsetor AS setor_tgl
	FROM
	tblsetoran
	JOIN tblobyek ON tblobyek.tblobyek_id = tblsetoran.tblobyek_id
	JOIN tblsubyek ON tblobyek.tblsubyek_id = tblsubyek.tblsubyek_id
	JOIN tblmasterrekening ON tblobyek.tblmasterrekening_id = tblmasterrekening.tblmasterrekening_id
	JOIN tbltransaksiketetapan ON tblsetoran.tbltransaksiketetapan_id = tbltransaksiketetapan.tbltransaksiketetapan_id
	WHERE
		tblmasterrekening_kode LIKE "41101%"
		AND YEAR(tblsetoran_tglsetor) = '.$data['tahun_pajak'].'
		AND YEAR(tbltransaksiketetapan.tbltransaksiketetapan_tahunpajak) = '.($data['tahun_pajak']-1).'
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
	<meta name="created" content="2016-12-09T15:16:32.336223824"/>
	<meta name="changedby" content="Diginet "/>
	<meta name="changed" content="2016-12-09T15:16:57.148207652"/>
	
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Liberation Sans"; font-size:x-small }
	</style>
	
</head>

<body>
<table border="0" align="center" cellspacing="0">
	<colgroup width="36"></colgroup>
	<colgroup width="161"></colgroup>
	<colgroup width="93"></colgroup>
	<colgroup width="289"></colgroup>
	<colgroup width="232"></colgroup>
	<colgroup width="133"></colgroup>
	<colgroup width="51"></colgroup>
	<colgroup width="171"></colgroup>
	<colgroup width="123"></colgroup>
	<tr>
		<td colspan=9 height="17" align="center" valign=bottom>DAFTAR PIUTANG SKPD.KB</td>
  </tr>
	<tr>
		<td colspan=9 height="17" align="center" valign=bottom>PAJAK HOTEL </td>
  </tr>
	<tr>
		<td colspan=9 height="17" align="center" valign=bottom>TAHUN <?= $data['tahun_pajak'] ?></td>
  </tr>
	<tr>
		<td height="18" align="left"><br></td>
		<td align="center" valign=bottom sdnum="1033;1057;[$-421]DD MMMM YYYY;@"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"><br></font></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 height="37" align="center" valign=middle>NO</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=bottom>SKPD,KB</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>NAMA</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>ALAMAT</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>NPWPD</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>LUAS</td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"> KETETAPAN </font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>KETERANGAN</td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdnum="1033;1057;[$-421]DD MMMM YYYY;@">TGL.TAP</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom>NO.KOHIR</td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"> RP. </font></td>
  </tr>
  	<?php $total= array('setor_jumlah'=>0); $no = 1; foreach($data['laporan'] as $row): ?>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="18" align="center" valign=bottom sdval="1" sdnum="1033;"><?= $no++; ?></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="40178" sdnum="1033;1033;M/D/YYYY">12/31/2009</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="6715" sdnum="1033;">6715</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">HOTEL IRIAN/ABDULLAH BUGHRI</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">JL.GAJAH MADA  TEGAL</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">P210000190202</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2300000" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"> 2,300,000 </font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="18" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdnum="1033;1057;[$-421]DD MMMM YYYY;@"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 height="18" align="center" valign=bottom>JUMLAH</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2300000" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Calibri" color="#000000"> 2,300,000 </font></td>
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
	</tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td colspan=4 align="center" valign=bottom>Tegal. 04 Januari 2016</td>
  </tr>
	<tr>
		<td colspan=4 height="17" align="center" valign=bottom>MENGETAHUI</td>
		<td align="left" valign=bottom><br></td>
		<td align="left"><br></td>
		<td align="center" valign=bottom><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td colspan=4 height="17" align="center" valign=bottom>KABID PENDATAAN,PENETAPAN DAN PENAGIHAN</td>
		<td align="left" valign=bottom><br></td>
		<td colspan=4 align="center" valign=bottom>KEPALA SEKSI PENAGIHAN</td>
  </tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="center" valign=bottom><br></td>
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
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td colspan=4 height="18" align="center" valign=bottom><u><font face="Calibri" color="#000000">SONI SONTANI, SH</font></u></td>
		<td align="left" valign=bottom><u><font face="Calibri" color="#000000"><br></font></u></td>
		<td colspan=4 align="center" valign=bottom><u><font face="Calibri" color="#000000">GIGIH WAHYUDIN, SH.MM</font></u></td>
  </tr>
	<tr>
		<td colspan=4 height="17" align="center" valign=bottom>Pembina </td>
		<td align="left" valign=bottom><br></td>
		<td colspan=4 align="center" valign=bottom>NIP. 19710522 199702 1 002</td>
  </tr>
	<tr>
		<td colspan=4 height="17" align="center" valign=bottom>NIP.19630122 1986 1 008</td>
		<td align="left" valign=bottom><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
</table>
<!-- ************************************************************************** -->
</body>

</html>

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
		tblmasterrekening.tblmasterrekening_kode LIKE "41108%"
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
	<meta name="generator" content="LibreOffice 5.1.2.2 (Linux)"/>
	<meta name="created" content="2016-12-16T10:25:15.820083155"/>
	<meta name="changed" content="2016-12-16T10:25:50.983601319"/>
	
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Liberation Sans"; font-size:x-small }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
	</style>
	
</head>

<body>
<table cellspacing="0" border="0">
	<colgroup width="57"></colgroup>
	<colgroup width="100"></colgroup>
	<colgroup width="61"></colgroup>
	<colgroup width="344"></colgroup>
	<colgroup width="427"></colgroup>
	<colgroup width="135"></colgroup>
	<colgroup width="69"></colgroup>
	<colgroup width="56"></colgroup>
	<colgroup span="2" width="28"></colgroup>
	<colgroup width="84"></colgroup>
	<colgroup width="135"></colgroup>
	<colgroup width="100"></colgroup>
	<tr>
		<td colspan=14 height="17" align="center" valign=bottom><font face="Arial">DAFTAR REALISASI PAJAK REKLAME</font></td>
		</tr>
	<tr>
		<td colspan=14 height="17" align="center" valign=bottom><font face="Arial">JENIS : REKLAME PAPAN/BILLD/VIDEO/MEGATRON</font></td>
		</tr>
	<tr>
		<td colspan=14 height="17" align="center" valign=bottom><font face="Arial">TAHUN <?= $data['tahun_setor'] ?></font></td>
		</tr>
	<tr>
		<td height="17" align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 height="34" align="center" valign=middle><font face="Arial">NO</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=bottom><font face="Arial">SKPD</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font face="Arial">NAMA</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font face="Arial">ALAMAT</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font face="Arial">NPWPD</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font face="Arial">TAHUN</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font face="Arial">AYAT</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" valign=middle><font face="Arial">JENIS</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font face="Arial">LUAS /</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial" color="#000000"> JML.SETOR </font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font face="Arial">TGL.SETOR</font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><font face="Arial">TGL.TAP</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font face="Arial">KOHIR</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font face="Arial">LEMBAR</font></td>
		</tr>
	<?php $total= array('setor_jumlah'=>0); $no = 1; foreach($data['laporan'] as $row): ?>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="18" align="center" valign=bottom sdval="1" sdnum="1033;"><font face="Arial"><?= $no++; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="42086" sdnum="1033;1033;M/D/YYYY"><font face="Arial"><?= strtotime($row['ketetapan_tgl']) ? date('d/m/Y', strtotime($row['ketetapan_tgl']) ) : "" ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="1563" sdnum="1033;"><font face="Arial"><?= $row['ketetapan_kohir'] ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><font face="Arial"><?= $row['subyek_nama'] ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><font face="Arial"><?= $row['subyek_alamat'] ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><font face="Arial"><?= $row['subyek_npwpd'] ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="2015" sdnum="1033;"><font face="Arial"><?= $row['ketetapan_tahunpajak'] ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="41104" sdnum="1033;"><font face="Arial">41104</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="1" sdnum="1033;">&nbsp;</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="21" sdnum="1033;">&nbsp;</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="24" sdnum="1033;"><font face="Arial"><?= LokalIndonesia::ribuan($row['pendataan_sekunder'],null,2) ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="66100" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial" color="#000000"> <?= LokalIndonesia::ribuan($row['setor_jumlah']); $total['setor_jumlah']+= $row['setor_jumlah']; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" sdval="42086" sdnum="1033;1033;M/D/YYYY"><font face="Arial"><?= strtotime($row['setoran_tgl']) ? date('d/m/Y', strtotime($row['setoran_tgl']) ) : "" ?></font></td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 height="18" align="center" valign=middle><font face="Arial">JUMLAH TOTAL</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><font face="Arial"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><font face="Arial"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><font face="Arial"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><font face="Arial"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="66100" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial" color="#000000"> <?= LokalIndonesia::ribuan($total['setor_jumlah']) ?> </font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><font face="Arial"><br></font></td>
		
	</tr>
	<tr>
		<td height="17" align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
	</tr>
	<tr>
		<td height="17" align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td colspan=3 align="center" valign=bottom><font face="Arial"><?= AppConfig::model()->getValue('APLIKASI_CETAK_WILAYAH') ?>,<span
  style='mso-spacerun:yes'>?? </span><?= LokalIndonesia::TanggalUmum(date('Y-m-d')) ?></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
	</tr>
	<tr>
		<td height="17" align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="center" valign=bottom><font face="Arial"><br></font></td>
		<td align="center" valign=bottom><font face="Arial"><br></font></td>
		<td align="center" valign=bottom><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
	</tr>
	<tr>
		<td height="18" align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td colspan=3 align="center" valign=bottom><b><font face="Arial" color="#000000">MENGETAHUI</font></b></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
	</tr>
	<tr>
		<td height="18" align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td colspan=3 align="center" valign=bottom><b><font face="Arial" color="#000000">KABID PENATAAN,PENETAPAN DAN PENAGIHAN</font></b></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td colspan=3 align="center" valign=bottom><font face="Arial" color="#000000">BENDAHARAWAN PENERIMA</font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
	</tr>
	<tr>
		<td height="18" align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="center" valign=bottom><b><font face="Arial" color="#000000"><br></font></b></td>
		<td align="center" valign=bottom><b><font face="Arial" color="#000000"><br></font></b></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="center" valign=bottom><font face="Arial" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial" color="#000000"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
	</tr>
	<tr>
		<td height="18" align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><b><font face="Arial" color="#000000"><br></font></b></td>
		<td align="left"><b><font face="Arial" color="#000000"><br></font></b></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial" color="#000000"><br></font></td>
		<td align="left"><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial" color="#000000"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
	</tr>
	<tr>
		<td height="18" align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><b><font face="Arial" color="#000000"><br></font></b></td>
		<td align="left"><b><font face="Arial" color="#000000"><br></font></b></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial" color="#000000"><br></font></td>
		<td align="left"><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial" color="#000000"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
	</tr>
	<tr>
		<td height="18" align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td colspan=3 align="center" valign=bottom><b><u><font face="Arial" color="#000000">SONI SONTANI,SH</font></u></b></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td colspan=3 align="center" valign=bottom><u><font face="Arial" color="#000000">INDRA LESMANA</font></u></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
	</tr>
	<tr>
		<td height="18" align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td colspan=3 align="center" valign=bottom><b><font face="Arial" color="#000000">Pembina</font></b></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td colspan=3 align="center" valign=bottom><font face="Arial" color="#000000">NIP.19771124 200801 1 002</font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
	</tr>
	<tr>
		<td height="18" align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td colspan=3 align="center" valign=bottom><b><font face="Arial" color="#000000">NIP.19630122 1986 1 008</font></b></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><b><font face="Arial" color="#000000"><br></font></b></td>
		<td align="left"><b><font face="Arial" color="#000000"><br></font></b></td>
		<td align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><b><font face="Arial" color="#000000"><br></font></b></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
		<td align="left" sdnum="1033;0;_(* #,##0_);_(* (#,##0);_(* &quot;-&quot;_);_(@_)"><font face="Arial"><br></font></td>
		<td align="left"><font face="Arial"><br></font></td>
	</tr>
</table>
<!-- ************************************************************************** -->
</body>

</html>

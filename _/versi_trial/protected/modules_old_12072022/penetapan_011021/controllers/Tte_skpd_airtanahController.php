<?php

class Tte_skpd_airtanahController extends Controller
{
	var $TABEL = 'TBLDAFTTANAH';
	public function actionIndex()
	{
		
		$this->renderPartial('index');
	}	

	public function actioncaridata()
	{
		$tahun = DMOrcl::getRequest('cari', 'THNPAJAK');
		$bulan = DMOrcl::getRequest('cari', 'BLNPAJAK');

		$q = Yii::app()->db->createCommand()
		->select("
		TTE.*, 
		T.*, 
		DFT.*, 
		{$this->TABEL}_NILAIAIR1 AS NPA,
		{$this->TABEL}_TOTALVOLUME AS VOL,
		{$this->TABEL}_PAJAK AS PAJAK,
		CONCAT (
			TBLDAFTTANAH_TGLENTRI,
			CONCAT (
				'-',
				CONCAT (
					TBLDAFTTANAH_BLNENTRI,
					(
						CONCAT (
							'-20',
							TBLDAFTTANAH_THNENTRI
						)
					)
				)
			)
		) AS TGL_ENTRY,
		(
			SELECT
				TRIM(TBLREKENING.TBLREKENING_NAMAREKENING)
			FROM
				TBLREKENING
			WHERE
				TBLREKENING.TBLREKENING_REKPENDAPATAN = T.TBLDAFTTANAH_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = T.TBLDAFTTANAH_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = T.TBLDAFTTANAH_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = T.TBLDAFTTANAH_REKAYAT
			AND TBLREKENING.TBLREKENING_REKJENIS = T.TBLDAFTTANAH_REKJENIS
		) AS NMREKENING
		")
		->from("{$this->TABEL} T")
		->leftJoin('TBLDAFTAR DFT','DFT.TBLDAFTAR_NOPOK=T.TBLDAFTAR_NOPOK')
		->leftJoin('TBLTTE TTE','
			TTE.TBLDAFTAR_NOPOK=T.TBLDAFTAR_NOPOK 
			AND TTE.TBLPENDATAAN_THNPAJAK=T.TBLPENDATAAN_THNPAJAK 
			AND TTE.TBLPENDATAAN_BLNPAJAK=T.TBLPENDATAAN_BLNPAJAK 
			AND NVL(TTE.TBLPENDATAAN_TGLPAJAK, 0)=NVL(T.TBLPENDATAAN_TGLPAJAK, 0) 
			')
		->where("{$this->TABEL}_STATUSDATA=:flag", array(':flag' => 2));

		if (!empty($tahun)) {
			$q->andWhere("T.TBLPENDATAAN_THNPAJAK=:thn", array(':thn' => substr($tahun, -2), ));
		}
		if (!empty($bulan)) {
			$q->andWhere("T.TBLPENDATAAN_BLNPAJAK=:bln", array(':bln' => $bulan, ));
		}

		$data['results'] = $q->queryAll();
		$this->renderPartial('tabel', array('data' => $data,));
	}

	public function actionSkpd_draft()
	{
		$params = CJSON::decode(base64_decode(Yii::app()->request->getParam('params')));

		$data_trans = $params;
		$abulan = ['01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'];
		$abulan = array_merge($abulan, ['1' => 'Januari', '2' => 'Februari', '3' => 'Maret', '4' => 'April', '5' => 'Mei', '6' => 'Juni', '7' => 'Juli', '8' => 'Agustus', '9' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'] );
		
		// ----------------------------------------------------------
		$data_replace['{$WP_NAMA}']          = $WP_NAMA = $data_trans['TBLDAFTAR_BADANUSAHANAMA'];
		$data_replace['{$WP_ALAMAT}']        = $WP_ALAMAT = $data_trans['TBLDAFTAR_BADANUSAHAALAMAT'];
		$NPWPD = $data_trans['TBLDAFTAR_JENISPENDAPATAN'] 
		. '.' .  $data_trans['TBLDAFTAR_GOLONGAN'] 
		. '.' .  sprintf('%07d', $data_trans['TBLDAFTAR_NOPOK']) 
		. '.' .  $data_trans['TBLKECAMATAN_IDBADANUSAHA'] 
		. '.' .  $data_trans['TBLKELURAHAN_IDBADANUSAHA'];
		$data_replace['{$WP_NPWPD}']         = $WP_NPWPD = $NPWPD;
		$data_replace['{$PAJAK_MASA}']       = $PAJAK_MASA = $abulan[(($data_trans['TBLPENDATAAN_BLNPAJAK']))];
		$TGL_BATAS_SKPD = (2000+ $data_trans["{$this->TABEL}_THNBATASSKPD"]) . '-' . sprintf('%02d', $data_trans["{$this->TABEL}_BLNBATASSKPD"]) . '-' . sprintf('%02d', $data_trans["{$this->TABEL}_TGLBATASSKPD"]) ;
		$data_replace['{$PAJAK_JATUHTEMPO}'] = $PAJAK_JATUHTEMPO = date('d', strtotime($TGL_BATAS_SKPD)) . " " . $abulan[date('m', strtotime($TGL_BATAS_SKPD))] . " " . date('Y', strtotime($TGL_BATAS_SKPD));
		$data_replace['{$PAJAK_TAHUN}']      = $PAJAK_TAHUN = ((2000+$data_trans['TBLPENDATAAN_THNPAJAK']));
		$data_replace['{$PAJAK_NOURUT}']     = $PAJAK_NOURUT = $data_trans['TBLDAFTTANAH_NOMORSKPD'];
		$AYAT = $data_trans['TBLDAFTTANAH_REKPENDAPATAN']
		. '.' .  $data_trans['TBLDAFTTANAH_REKPAD']
		. '.' .  $data_trans['TBLDAFTTANAH_REKPAJAK']
		. '.' .  $data_trans['TBLDAFTTANAH_REKJENIS']
		. '.' .  $data_trans['TBLDAFTTANAH_REKAYAT']
		;
		$data_replace['{$PAJAK_AYAT}']       = $PAJAK_AYAT = $AYAT;
		$data_replace['{$PAJAK_NAMA}']       = $PAJAK_NAMA = $data_trans['NMREKENING'];
		$data_replace['{$PAJAK_NOMINAL}']    = $PAJAK_NOMINAL = number_format($data_trans['PAJAK'], 0, ",", ".");
		$data_replace['{$PAJAK_BUNGA}']      = '0'; //$PAJAK_BUNGA = number_format($data_trans['T_JMLHKENAIKAN'], 0, ",", ".");
		$data_replace['{$PAJAK_KENAIKAN}']   = '0'; //$PAJAK_KENAIKAN = number_format($data_trans['T_JMLHKENAIKAN'], 0, ",", ".");
		$data_replace['{$PAJAK_TOTAL}']      = $PAJAK_TOTAL = number_format($data_trans['PAJAK'], 0, ",", ".");
		$data_replace['{$PAJAK_TERBILANG}']  = $PAJAK_TERBILANG = ($data_trans['PAJAK']!=0) ? LokalIndonesia::terbilangangka($data_trans['PAJAK']) : "Nol";
		$data_replace['{$VOL}']              = $VOL = $data_trans['VOL'];

		$data_replace['{$LABEL_BOOKING}']  = ''; //$LABEL_BOOKING = !empty($data_trans['T_KODEBAYAR']) ? "ID Billing" : '';
		$data_replace['{$KODE_BOOKING}']   = ''; //$KODE_BOOKING = !empty($data_trans['T_KODEBAYAR']) ? ': '.$data_trans['T_KODEBAYAR'] : '';
		$data_replace['{$LABEL_STIMULUS}'] = $LABEL_STIMULUS = ($data_trans['PAJAK']- $data_trans["{$this->TABEL}_PAJAK"]!=0) ? "Stimulus Pengurangan Pajak 50%" : '';

		$STIMULUS = ($data_trans['PAJAK']- $data_trans["{$this->TABEL}_PAJAK"]);

		$data_replace['{$PAJAK_STIMULUS}'] = $PAJAK_STIMULUS = $data_trans['PAJAK']- $data_trans["{$this->TABEL}_PAJAK"] != 0 ? number_format($STIMULUS, 0, ",", ".") : '';

		// // $CETAK_MASA = date('d') .' '. $abulan[date('m')];
		$data_replace['{$CETAK_MASA}']  = $CETAK_MASA = date('d', strtotime($data_trans['TGL_ENTRY'])) .' '. $abulan[date('m', strtotime($data_trans['TGL_ENTRY']))];
		$data_replace['{$CETAK_TAHUN}']  = $CETAK_TAHUN = date('Y', strtotime($data_trans['TGL_ENTRY']));
		// $data_replace['{$CETAK_TAHUN}'] = $CETAK_TAHUN = date('Y');

		$tampilttdwp = ''; //isi dengan qrcode
		$tampilttdwp .= '<br><br><br>'; //isi dengan qrcode
		$data_replace['{$tampilttdwp}']    = $tampilttdwp;

		$ar_ttd = Yii::app()->db->createCommand()
		->select()
		->from('TBLPEJABAT')
		->where("REFJABATAN_ID=:id", array('id' => 6))
		->queryRow()
		;

		$data_replace['{$CETAK_PEJABATNAMA}']    = $CETAK_PEJABATNAMA = $ar_ttd['TBLPEJABAT_NAMA'];
		$data_replace['{$CETAK_PEJABATJABAT}']   = $CETAK_PEJABATJABAT = $ar_ttd['TBLPEJABAT_URAIAN'];
		$data_replace['{$CETAK_PEJABATPANGKAT}'] = ''; //$CETAK_PEJABATPANGKAT = $ar_ttd['S_PANGKATPEJ'];
		$data_replace['{$CETAK_PEJABATNIP}']     = $CETAK_PEJABATNIP = $ar_ttd['TBLPEJABAT_NIP'];
		// echo json_encode(array($data_trans, $data_replace));exit;
		// echo json_encode($ar_ttd);exit;
		// ----------------------------------------------------------

		$data_meta = array(
			'title' => 'SKPD Air Tanah',
			'namafile' => '001',
		);
		$pdf_file = BerkasSKPDComp::plug()
		->load_template('SKPD_Air_Tanah.html')
		->parseTPL($data_replace)
		->pdf2string($data_meta)
		;
		echo CJSON::encode(array(
			// 'url'      => $pdf_file['url'],
			'binary'   => $pdf_file,
			'payloads' => $params,
		));
	}
}
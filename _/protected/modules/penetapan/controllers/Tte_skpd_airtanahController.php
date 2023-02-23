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

		$sum = Yii::app()->db->createCommand()
		->select('sum(TBLDAFTTANAH_PAJAKSKPD) as JMLRUPIAHSKPD,count(TBLDAFTTANAH_NOMORSKPD) as JMLSKPD')
		->from("{$this->TABEL}")
		->group('TBLPENDATAAN_THNPAJAK,TBLPENDATAAN_BLNPAJAK');
		if (!empty($tahun)) {
			$sum->andWhere("TBLPENDATAAN_THNPAJAK=:thn", array(':thn' => substr($tahun, -2), ));
		}
		if (!empty($bulan)) {
			$sum->andWhere("TBLPENDATAAN_BLNPAJAK=:bln", array(':bln' => $bulan, ));
		}
		$data['sum'] = $sum->queryRow();

		$q = Yii::app()->db->createCommand()
		->select("
		TTE.*, 
		T.*, 
		DFT.*, 
		{$this->TABEL}_NILAIAIR1 AS NPA,
		{$this->TABEL}_TOTALVOLUME AS VOL,
		{$this->TABEL}_PAJAK AS PAJAK,
		{$this->TABEL}_STATUSDATA AS STATUS_DATA,
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
		// ->where("{$this->TABEL}_STATUSDATA=:flag", array(':flag' => 2))
		;

		if (!empty($tahun)) {
			$q->andWhere("T.TBLPENDATAAN_THNPAJAK=:thn", array(':thn' => substr($tahun, -2), ));
		}
		if (!empty($bulan)) {
			$q->andWhere("T.TBLPENDATAAN_BLNPAJAK=:bln", array(':bln' => $bulan, ));
		}

		// $data['results'] = $q->order("{$this->TABEL}_STATUSDATA DESC")->queryAll();
		// $order_custom = '';
		// if (Yii::app()->user->role_id == 97) {
		// 	$order_custom = "
		// 	case 
		//        when {$this->TABEL}_STATUSDATA = '3' then 1 
		//        when {$this->TABEL}_STATUSDATA = '2' then 2
		//        when {$this->TABEL}_STATUSDATA = '4' then 3
		//        when {$this->TABEL}_STATUSDATA = '1' then 4
		//        else 5
		//     end";
		// } elseif (Yii::app()->user->role_id == 94) {
		// 	$order_custom = "
		// 	case 
		//        when {$this->TABEL}_STATUSDATA = '2' then 1 
		//        when {$this->TABEL}_STATUSDATA = '3' then 2
		//        when {$this->TABEL}_STATUSDATA = '4' then 3
		//        when {$this->TABEL}_STATUSDATA = '1' then 4
		//        else 5
		//     end";
		// }

		// comment karna ada status_data baru, rahmat 15-06-2021

		$order_custom = '';
		if (Yii::app()->user->role_id == 97) {
			$order_custom = "T.TBLKECAMATAN_ID,T.TBLDAFTAR_NOPOK,T.TBLKELURAHAN_ID,T.TBLPENDATAAN_PAJAKKE,T.TBLDAFTTANAH_PAJAK,
			case 
		       when {$this->TABEL}_STATUSDATA = '4' then 1 
		       when {$this->TABEL}_STATUSDATA = '3' then 2
		       when {$this->TABEL}_STATUSDATA = '5' then 3
		       when {$this->TABEL}_STATUSDATA = '2' then 4
		       when {$this->TABEL}_STATUSDATA = '1' then 5
		       else 6
		    end";
		} elseif (Yii::app()->user->role_id == 94) {
			$order_custom = "T.TBLKECAMATAN_ID,T.TBLDAFTAR_NOPOK,T.TBLKELURAHAN_ID,T.TBLPENDATAAN_PAJAKKE,T.TBLDAFTTANAH_PAJAK,
			case 
		       when {$this->TABEL}_STATUSDATA = '3' then 1 
		       when {$this->TABEL}_STATUSDATA = '4' then 2
		       when {$this->TABEL}_STATUSDATA = '5' then 3
		       when {$this->TABEL}_STATUSDATA = '2' then 4
		       when {$this->TABEL}_STATUSDATA = '1' then 5
		       else 6
		    end";
		}

		$data['results'] = $q->order("{$order_custom}")->queryAll();
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
		// $data_replace['{$PAJAK_MASA}']       = $PAJAK_MASA = $abulan[(($data_trans['TBLPENDATAAN_BLNPAJAK']))];
		$data_replace['{$PAJAK_MASA}']       = $PAJAK_MASA = LokalIndonesia::getBulan($data_trans['TBLPENDATAAN_BLNPAJAK']);
		// var_dump($data_trans);
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
		$data_replace['{$CETAK_MASA}']  = $CETAK_MASA = $data_trans["{$this->TABEL}_TGLSKPD"] .' '. LokalIndonesia::getBulan($data_trans["{$this->TABEL}_BLNSKPD"]);
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

	public function actionVerifikasi()
	{
		$data['cari'] = $param = Yii::app()->request->getParam('cari', array());
		$data['grafik'] = Yii::app()->request->getParam('grafik', '');
		$data['data'] = Yii::app()->request->getParam('data', '');

		$year = substr($param['THNPAJAK'], -2);
		$bulan = (int)$param['BLNPAJAK'];
		$ke = 0;

		// $STATUS_DATA = 0;
		// $status = 0;
		// if (Yii::app()->user->role_id == 94) {
		// 	$STATUS_DATA = 3;
		// 	$status = 2;
		// } elseif (Yii::app()->user->role_id == 97) {
		// 	$STATUS_DATA = 4;
		// 	$status = 3;
		// } comment krna ada perubahan alur, rahmat 15-06-2021

		$STATUS_DATA = 0;
		$status = 0;
		if (Yii::app()->user->role_id == 94) {
			$STATUS_DATA = 4;
			$status = 3;
		} elseif (Yii::app()->user->role_id == 97) {
			$STATUS_DATA = 5;
			$status = 4;
		}

		try {
			if (!empty($STATUS_DATA)) {
				// update STATUSDATA
				$arr['data'] = array(
					'TBLDAFTTANAH_STATUSDATA' => $STATUS_DATA,
					'TBLDAFTTANAH_IDVERIF' => Yii::app()->user->getId(),
					'TBLDAFTTANAH_TGLVERIF' => new CDbExpression("to_date('" . date('Y-m-d H:i:s') . "','yyyy-mm-dd hh24:mi:ss')"),
				);
				$arr['param'] = array(':year' => $year, ':bulan' => $bulan, ':ke' => $ke, ':status' => $status,);

				$update = '';
				$update = Yii::app()->db->createCommand()
				->update(
					"TBLDAFTTANAH",
					$arr['data'],
					'TBLPENDATAAN_THNPAJAK=:year
				AND TBLPENDATAAN_BLNPAJAK=:bulan
				AND NVL(TBLPENDATAAN_PAJAKKE, 0)=:ke
				AND TBLDAFTTANAH_STATUSDATA=:status
				',
					$arr['param']
				);
			}
			echo CJSON::encode(array('status' => 'success', 'update' => $update, 'data' => $arr));
		} catch (CDbException $e) {
			echo CJSON::encode(array('status' => 'failed', 'message' => $e->getMessage()));
		}

		

	}

	public function actionVerifikasisimulasi()
	{
		$data['cari'] = $param = Yii::app()->request->getParam('cari', array());
		$data['grafik'] = Yii::app()->request->getParam('grafik', '');
		$data['data'] = Yii::app()->request->getParam('data', '');

		$year = substr($param['THNPAJAK'], -2);
		$bulan = (int)$param['BLNPAJAK'];
		$ke = 0;
		// $nopok = 8855;

		// $STATUS_DATA = 0;
		// $status = 0;
		// if (Yii::app()->user->role_id == 94) {
		// 	$STATUS_DATA = 3;
		// 	$status = 2;
		// } elseif (Yii::app()->user->role_id == 97) {
		// 	$STATUS_DATA = 4;
		// 	$status = 3;
		// } comment krna ada perubahan alur, rahmat 15-06-2021

		$STATUS_DATA = 0;
		$status = 0;
		if (Yii::app()->user->role_id == 94) {
			$STATUS_DATA = 4;
			$status = 3;
		} elseif (Yii::app()->user->role_id == 97) {
			$STATUS_DATA = 5;
			$status = 4;
		}

		if (!empty($STATUS_DATA)) {
			// update STATUSDATA
			$arr['data'] = array(
				'TBLDAFTTANAH_STATUSDATA' => $STATUS_DATA,
				'TBLDAFTTANAH_IDVERIF' => Yii::app()->user->getId(),
				'TBLDAFTTANAH_TGLVERIF' => new CDbExpression("to_date('" . date('Y-m-d H:i:s') . "','yyyy-mm-dd hh24:mi:ss')"),
			);
			$arr['param'] = array(':year' => $year, ':bulan' => $bulan, ':ke' => $ke, ':status' => $status);

			$update = '';
			$update = Yii::app()->db->createCommand()
				->update(
					"DIGINET.TBLDAFTTANAH",
					$arr['data'],
					'TBLPENDATAAN_THNPAJAK=:year
				AND TBLPENDATAAN_BLNPAJAK=:bulan
				AND NVL(TBLPENDATAAN_PAJAKKE, 0)=:ke
				AND TBLDAFTTANAH_STATUSDATA=:status
				',
					$arr['param']
				);
		}

		echo CJSON::encode(array('status' => 'success', 'update' => $update, 'data' => $arr));
	}
}
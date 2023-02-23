<?php

class Histori_nopokController extends Controller
{
	var $MODULE_URL = 'penagihan/histori_nopok';

	public function actionIndex()
	{
		$data['list_kecamatan'] = Yii::app()->db->createCommand()->select()->from('REFKECAMATAN')->queryAll();
		$data['rek'] = Yii::app()->db->createCommand('
			SELECT
			*
			FROM
			TBLREKENING_90 TBLREKENING
			WHERE
			TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			AND TBLREKENING_REKAYAT <>4
			AND TBLREKENING_REKAYAT <>10
			AND TBLREKENING_REKAYAT <>16
			AND TBLREKENING_REKAYAT <>23
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			')->queryAll();
		$data['sub_rek'] = Yii::app()->db->createCommand()
		->select('*')
		->from('TREKENING')
		->where('TREKENING_LEVEL=1')
		->queryAll();
		
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionCetak()
	{
		// $namaTBL = '';
		$TBLREKENING_KODE = Yii::app()->request->getParam('TBLREKENING_KODE', '');
		$TBLPENDATAAN_THNPAJAK_AWAL = substr(Yii::app()->request->getParam('TBLPENDATAAN_THNPAJAK_AWAL', ''), 2, 2);
		$TBLPENDATAAN_THNPAJAK_AKHIR = substr(Yii::app()->request->getParam('TBLPENDATAAN_THNPAJAK_AKHIR', ''), 2, 2);
		$TBLDAFTAR_NOPOK = Yii::app()->request->getParam('TBLDAFTAR_NOPOK', '');
		$CUTOFF_TGL_AWAL = Yii::app()->request->getParam('CUTOFF_TGL_AWAL', '');
		$CUTOFF_TGL_AKHIR = date('Y-m-d', strtotime(Yii::app()->request->getParam('CUTOFF_TGL_AKHIR', date('Y-m-d'))));

		$wheretgl = '';
		if ($CUTOFF_TGL_AWAL) {
			$tgl = date('Y-m-d', strtotime($CUTOFF_TGL_AWAL));
			$wheretgl = " WHERE TGL >= TO_DATE('" . $tgl . "', 'YYYY-MM-DD') AND TGL <= TO_DATE('" . $CUTOFF_TGL_AKHIR . "', 'YYYY-MM-DD') ";
		}

		switch ($TBLREKENING_KODE) {
			case '1':
				$namaTBL = 'TBLDAFTHOTEL';
				$AYAT = '1';
				$AYAT_NAMA = 'PAJAK HOTEL';
				$FIELDPAJAK = 'PAJAK';
				$JENISBAYAR = 'STPD';

				break;

			case '2':
				$namaTBL = 'TBLDAFTRMAKAN';
				$AYAT = '2';
				$AYAT_NAMA = 'PAJAK RESTORAN';
				$FIELDPAJAK = 'PAJAK';
				$JENISBAYAR = 'STPD';

				break;

			case '3':
				$namaTBL = 'TBLDAFTHIBURAN';
				$AYAT = '3';
				$AYAT_NAMA = 'PAJAK HIBURAN';
				$FIELDPAJAK = 'PAJAK';
				$JENISBAYAR = 'STPD';
				break;

			case '4':
				$namaTBL = 'TBLDAFTREKLAME';
				$AYAT = '4';
				$AYAT_NAMA = 'PAJAK REKLAME';
				$FIELDPAJAK = 'PAJAK';
				$JENISBAYAR = 'SKPD';
				break;

			case '5':
				$namaTBL = 'TBLDAFTPJU';
				$AYAT = '5';
				$AYAT_NAMA = 'PAJAK PJU';
				$FIELDPAJAK = 'PAJAK';
				$JENISBAYAR = 'STPD';
				break;

			case '7':
				$namaTBL = 'TBLDAFTPARKIR';
				$AYAT = '7';
				$AYAT_NAMA = 'PAJAK PARKIR';
				$FIELDPAJAK = 'PAJAK';
				$JENISBAYAR = 'STPD';
				break;

			case '8':
				$namaTBL = 'TBLDAFTTANAH';
				$AYAT = '8';
				$AYAT_NAMA = 'PAJAK AIR TANAH';
				$FIELDPAJAK = 'PAJAKSKPD';
				$JENISBAYAR = 'SKPD';
				break;

			case '9':
				$namaTBL = 'TBLDAFTBURUNG';
				$AYAT = '9';
				$AYAT_NAMA = 'PAJAK SARANG BURUNG WALET';
				$FIELDPAJAK = 'PAJAK';
				$JENISBAYAR = 'STPD';
				break;

			case '11':
				$namaTBL = 'TBLDAFTBPHTB';
				$AYAT = '11';
				$AYAT_NAMA = 'PAJAK BPHTB';
				$FIELDPAJAK = 'PAJAK';
				$JENISBAYAR = 'STPD';
				break;

			default:
				$namaTBL = 'TBLDAFTHOTEL';
				break;
		}

		// $JNSKETETAPAN = Yii::app()->request->getParam('JNSKETETAPAN','');

		$sql = "
				SELECT * FROM (
				SELECT
					TO_DATE( " . $namaTBL . "_THNKURANGBAYAR || '-' || LPAD( " . $namaTBL . "_BLNKURANGBAYAR, 2, '0' ) || '-' || LPAD( " . $namaTBL . "_TGLKURANGBAYAR, 2, '0' ), 'YY-MM-DD' ) AS TGL ,'SKPDKB' JEN, 'PENETAPAN SKPDKB' KEG, 4 URUT, TO_CHAR(" . $namaTBL . "_REGKURANGBAYAR) NOSK, NULL AS STAANGS, " . $namaTBL . ".TBLPENDATAAN_THNPAJAK THN, NVL(" . $namaTBL . "." . $namaTBL . "_BLNKBAWAL,0) BLNAWAL, NVL(" . $namaTBL . "_BLNKBAKHIR," . $namaTBL . ".TBLPENDATAAN_BLNPAJAK) BLNAKHIR, NULL AS KE, " . $namaTBL . "_RUPIAHKRGBAYAR PIUTANG, NULL AS REALISASI, ('Penetapan SKPDKB No. '||TO_CHAR(" . $namaTBL . "_REGKURANGBAYAR)) HASIL, TBLDAFTAR_PEMILIKNAMA NMWP
				FROM
					" . $namaTBL . "
				LEFT JOIN TBLANGSURAN	ON TBLANGSURAN.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK 
					AND TBLANGSURAN.TBLPENDATAAN_THNPAJAK = " . $namaTBL . ".TBLPENDATAAN_THNPAJAK 
					AND TBLANGSURAN.TBLPENDATAAN_BLNPAJAK = " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK 
					AND NVL( TBLANGSURAN.TBLPENDATAAN_TGLPAJAK, 0 ) = NVL( " . $namaTBL . ".TBLPENDATAAN_TGLPAJAK, 0 )
					AND TBLANGSURAN_PAJAKKE = 1
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK
				WHERE
					" . $namaTBL . ".TBLDAFTAR_NOPOK = " . $TBLDAFTAR_NOPOK . " 
					AND " . $namaTBL . ".TBLPENDATAAN_THNPAJAK >= " . $TBLPENDATAAN_THNPAJAK_AWAL . " 
					AND " . $namaTBL . ".TBLPENDATAAN_THNPAJAK <= " . $TBLPENDATAAN_THNPAJAK_AKHIR . "
					AND NVL( " . $namaTBL . "." . $namaTBL . "_REGKURANGBAYAR, 0 ) > 0 UNION

				SELECT
					TO_DATE( TBLANGSURAN_THNKETETAPAN || '-' || LPAD( TBLANGSURAN_BLNKETETAPAN, 2, '0' ) || '-' || LPAD( TBLANGSURAN_TGLKETETAPAN, 2, '0' ), 'YY-MM-DD' ) AS TGL , 'SKPD-A' JEN, 'PENETAPAN ANGSURAN' KEG, 6 URUT,
					TO_CHAR(NVL(MAX(" . $namaTBL . "_REGSURATANGSUR),'')) NOSK, MAX(" . $namaTBL . "_REGKURANGBAYAR) AS STAANGS, " . $namaTBL . ".TBLPENDATAAN_THNPAJAK THN, MAX(NVL(" . $namaTBL . "." . $namaTBL . "_BLNKBAWAL,0)) BLNAWAL, MAX(NVL(" . $namaTBL . "_BLNKBAKHIR," . $namaTBL . ".TBLPENDATAAN_BLNPAJAK)) BLNAKHIR, NULL AS KE, SUM (TBLANGSURAN_KETETAPANTOTAL + TBLANGSURAN_BUNGAANGSURAN) PIUTANG, NULL AS REALISASI, ('Penetapan SKPD-A No. '||TO_CHAR(NVL(MAX(" . $namaTBL . "_REGSURATANGSUR),''))||' dari SKPDKB No. '||TO_CHAR(NVL(MAX(" . $namaTBL . "_REGKURANGBAYAR),''))) HASIL, MAX(TBLDAFTAR_PEMILIKNAMA) NMWP 
				FROM
					TBLANGSURAN
				LEFT JOIN " . $namaTBL . " ON TBLANGSURAN.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK 
					AND TBLANGSURAN.TBLPENDATAAN_THNPAJAK = " . $namaTBL . ".TBLPENDATAAN_THNPAJAK 
					AND TBLANGSURAN.TBLPENDATAAN_BLNPAJAK = " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK 
					AND NVL( TBLANGSURAN.TBLPENDATAAN_TGLPAJAK, 0 ) = NVL( " . $namaTBL . ".TBLPENDATAAN_TGLPAJAK, 0 )
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK 
				WHERE
					TBLANGSURAN.TBLDAFTAR_NOPOK = " . $TBLDAFTAR_NOPOK . " 
					AND TBLANGSURAN.TBLPENDATAAN_THNPAJAK >= " . $TBLPENDATAAN_THNPAJAK_AWAL . " 
					AND TBLANGSURAN.TBLPENDATAAN_THNPAJAK <= " . $TBLPENDATAAN_THNPAJAK_AKHIR . " 
				GROUP BY TBLANGSURAN_THNKETETAPAN, TBLANGSURAN_BLNKETETAPAN, TBLANGSURAN_TGLKETETAPAN, " . $namaTBL . ".			TBLPENDATAAN_THNPAJAK UNION

				SELECT
					TO_DATE( TBLSETOR_THNSETOR || '-' || LPAD( TBLSETOR_BLNSETOR, 2, '0' ) || '-' || LPAD( TBLSETOR_TGLSETOR, 2, '0' ), 'YY-MM-DD' ) AS TGL , 'SKPDKB' JEN, ('PEMBAYARAN '||TBLSETOR_JNSBAYAR) KEG, 5 URUT, TO_CHAR(TBLSETOR_NOMORSSPD) NOSK, NULL AS STAANGS, TBLSETOR.TBLPENDATAAN_THNPAJAK THN, NVL(" . $namaTBL . "." . $namaTBL . "_BLNKBAWAL,0) BLNAWAL, NVL(" . $namaTBL . "_BLNKBAKHIR," . $namaTBL . ".TBLPENDATAAN_BLNPAJAK) BLNAKHIR, " . $namaTBL . ".TBLPENDATAAN_PAJAKKE KE, " . $namaTBL . "_RUPIAHKRGBAYAR AS PIUTANG, (TBLSETOR_RUPIAHSETOR+TBLSETOR_BUNGAKETETAPAN+TBLSETOR_DENDAKETETAPAN) REALISASI, ('Pembayaran SKPDKB No. '||TO_CHAR(" . $namaTBL . "_REGKURANGBAYAR)||' dengan No. SSPD '||TO_CHAR(TBLSETOR_NOMORSSPD)) HASIL, TBLDAFTAR_PEMILIKNAMA NMWP
				FROM
					TBLSETOR 
				LEFT JOIN " . $namaTBL . " ON TBLSETOR.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK 
					AND TBLSETOR.TBLPENDATAAN_THNPAJAK = " . $namaTBL . ".TBLPENDATAAN_THNPAJAK 
					AND TBLSETOR.TBLPENDATAAN_BLNPAJAK = " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK 
					AND NVL( TBLSETOR.TBLPENDATAAN_TGLPAJAK, 0 ) = NVL( " . $namaTBL . ".TBLPENDATAAN_TGLPAJAK, 0 )
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK
				WHERE
					TBLSETOR.TBLDAFTAR_NOPOK = " . $TBLDAFTAR_NOPOK . " 
					AND TBLSETOR.TBLPENDATAAN_THNPAJAK >= " . $TBLPENDATAAN_THNPAJAK_AWAL . " 
					AND TBLSETOR.TBLPENDATAAN_THNPAJAK <= " . $TBLPENDATAAN_THNPAJAK_AKHIR . " 
					AND TBLSETOR_REKPAJAK = 1 
					AND TRIM(TBLSETOR_JNSBAYAR) = 'SKPDKB' UNION
					
				SELECT
					TO_DATE( TBLSETOR_THNSETOR || '-' || LPAD( TBLSETOR_BLNSETOR, 2, '0' ) || '-' || LPAD( TBLSETOR_TGLSETOR, 2, '0' ), 'YY-MM-DD' ) AS TGL , 'SKPD-A' JEN, ('PEMBAYARAN '||TBLSETOR_JNSBAYAR||' ke '||TBLANGSURAN_PAJAKKE) KEG, 7 URUT, TO_CHAR(TBLSETOR_NOMORSSPD) NOSK, NULL AS STAANGS, TBLSETOR.TBLPENDATAAN_THNPAJAK THN, NVL(" . $namaTBL . "." . $namaTBL . "_BLNKBAWAL,0) BLNAWAL, NVL(" . $namaTBL . "_BLNKBAKHIR," . $namaTBL . ".TBLPENDATAAN_BLNPAJAK) BLNAKHIR, TBLANGSURAN_PAJAKKE KE, TBLANGSURAN_KETETAPANTOTAL AS PIUTANG, (TBLSETOR_RUPIAHSETOR+TBLSETOR_BUNGAKETETAPAN+TBLSETOR_DENDAKETETAPAN) REALISASI, ('Pembayaran SKPD-A No. '||TO_CHAR(" . $namaTBL . "_REGSURATANGSUR)||' ke '||TBLANGSURAN_PAJAKKE||' dengan No. SSPD '||TO_CHAR(TBLSETOR_NOMORSSPD)) HASIL, TBLDAFTAR_PEMILIKNAMA NMWP
				FROM
					TBLSETOR 
				LEFT JOIN " . $namaTBL . " ON TBLSETOR.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK 
					AND TBLSETOR.TBLPENDATAAN_THNPAJAK = " . $namaTBL . ".TBLPENDATAAN_THNPAJAK 
					AND TBLSETOR.TBLPENDATAAN_BLNPAJAK = " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK 
					AND NVL( TBLSETOR.TBLPENDATAAN_TGLPAJAK, 0 ) = NVL( " . $namaTBL . ".TBLPENDATAAN_TGLPAJAK, 0 )
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK
				LEFT JOIN TBLANGSURAN ON TBLANGSURAN.TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK 
					AND TBLANGSURAN.TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK 
					AND TBLANGSURAN.TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK 
					AND TBLANGSURAN.TBLANGSURAN_PAJAKKE = TBLSETOR.TBLPENDATAAN_PAJAKKE 
					AND NVL( TBLANGSURAN.TBLPENDATAAN_TGLPAJAK, 0 ) = NVL( TBLSETOR.TBLPENDATAAN_TGLPAJAK, 0 )
				WHERE
					TBLSETOR.TBLDAFTAR_NOPOK = " . $TBLDAFTAR_NOPOK . " 
					AND TBLSETOR.TBLPENDATAAN_THNPAJAK >= " . $TBLPENDATAAN_THNPAJAK_AWAL . " 
					AND TBLSETOR.TBLPENDATAAN_THNPAJAK <= " . $TBLPENDATAAN_THNPAJAK_AKHIR . " 
					AND TBLSETOR_REKPAJAK = 1 
					AND TRIM(TBLSETOR_JNSBAYAR) = 'SKPD-A' UNION

				SELECT 
					TBLHISTORIWP_TGL AS TGL, TBLHISTORIWP_JNSKETETAPAN AS JEN, TBLHISTORIWP_KEGIATAN AS KEG, 1 URUT, TBLHISTORIWP_NOSK NOSK, NULL AS STAANGS, TBLHISTORIWP_THNPAJAK THN, TBLHISTORIWP_BLNPAJAKAWAL BLNAWAL, TBLHISTORIWP_BLNPAJAKAKHIR BLNAKHIR, NULL AS KE, TBLHISTORIWP_PIUTANG PIUTANG, NULL AS REALISASI, TBLHISTORIWP_HASIL HASIL, TBLDAFTAR_PEMILIKNAMA NMWP
				FROM 
					TBLHISTORIWP
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = TBLHISTORIWP_NOPOK
				WHERE
					TBLHISTORIWP_NOPOK = " . $TBLDAFTAR_NOPOK . "
					AND TBLHISTORIWP_THNPAJAK >= " . $TBLPENDATAAN_THNPAJAK_AWAL . " 
					AND TBLHISTORIWP_THNPAJAK <= " . $TBLPENDATAAN_THNPAJAK_AKHIR . " UNION
				
				SELECT 
					TGLHIMBAUAN AS TGL, STATUS_DATA AS JEN, 'PENERBITAN HIMBAUAN' AS KEG, 2 URUT, NOHIMBAUAN NOSK, NULL AS STAANGS, THP THN, BLP BLNAWAL, BLP BLNAKHIR, NULL AS KE, NULL AS PIUTANG, NULL AS REALISASI, NULL AS HASIL, TBLDAFTAR_PEMILIKNAMA NMWP
				FROM 
					TBLHIMBAUAN
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = NOPOK
				WHERE
					NOPOK = " . $TBLDAFTAR_NOPOK . "
					AND THP >= " . $TBLPENDATAAN_THNPAJAK_AWAL . " 
					AND THP <= " . $TBLPENDATAAN_THNPAJAK_AKHIR . "
					
				) TAB " . $wheretgl . " ORDER BY TGL, URUT
				";

		$data['table'] = Yii::app()->db->createCommand( $sql )->queryAll();
		// echo $sql;Yii::app()->end();
		$data['namarek'] = $AYAT_NAMA;

		$sql2="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 9";
		$sql3="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 4";	
		$sql4="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 5";	

		$data['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();
		$data['jab3'] = Yii::app()->db->createCommand($sql3)->queryRow();
		$data['jab4'] = Yii::app()->db->createCommand($sql4)->queryRow();

		header('Content-Type: application/excel');
		header("Content-Disposition: attachment;Filename=HistoriWP.xls");
		
		$this->renderPartial('tabel', array('data'=>$data));
	}

	public function actioncari()
	{
		$data = array();

		$rek = isset($_REQUEST['TBLREKENING_KODE']) && !empty($_REQUEST['TBLREKENING_KODE']) ? $_REQUEST['TBLREKENING_KODE'] : '';
		switch ( $rek ) {
			case '1':
			$namaTBL = 'TBLDAFTHOTEL';
			$AYAT = '1';
			$JENISBAYAR = 'STPD';
			break;
			
			case '2':
			$namaTBL = 'TBLDAFTRMAKAN';
			$AYAT = '2';
			$JENISBAYAR = 'STPD';
			break;
			
			case '3':
			$namaTBL = 'TBLDAFTHIBURAN';
			$AYAT = '3';
			$JENISBAYAR = 'STPD';
			break;
			
			case '4':
			$namaTBL = 'TBLDAFTREKLAME';
			$AYAT = '4';
			$JENISBAYAR = 'SKPD';
			break;

			case '5':
			$namaTBL = 'TBLDAFTPJU';
			$AYAT = '5';
			$JENISBAYAR = 'STPD';
			break;
			
			case '7':
			$namaTBL = 'TBLDAFTPARKIR';
			$AYAT = '7';
			$JENISBAYAR = 'STPD';
			break;
			
			case '8':
			$namaTBL = 'TBLDAFTTANAH';
			$AYAT = '8';
			$JENISBAYAR = 'SKPD';
			break;
			
			case '9':
			$namaTBL = 'TBLDAFTBURUNG';
			$AYAT = '9';
			$JENISBAYAR = 'STPD';
			break;

			case '11':
			$namaTBL = 'TBLDAFTBPHTB';
			$AYAT = '11';
			$JENISBAYAR = 'STPD';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
		}

		$data['namatbl'] = $namaTBL;
		// $data['jenisbayar'] = $JENISBAYAR;
		$data['table'] = $this->getData();
		/*$data['hasil'] = $this->getData();*/
		$this->renderPartial('tabel', array('data'=>$data));
	}

	public function actionCetakWord()
	{
		// error_reporting(0);

		// baca file template, yg dipakai
		// $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
		
		// echo "$query";
		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '4.1.1.1.0':
			$namaTBL = 'TBLDAFTHOTEL';
			$AYAT = '1';
			$AYAT_NAMA = 'PAJAK HOTEL';
			$JENISBAYAR = 'STPD';
			break;
			
			case '4.1.1.2.0':
			$namaTBL = 'TBLDAFTRMAKAN';
			$AYAT = '2';
			$AYAT_NAMA = 'PAJAK RESTORAN';
			$JENISBAYAR = 'STPD';
			break;
			
			case '4.1.1.3.0':
			$namaTBL = 'TBLDAFTHIBURAN';
			$AYAT = '3';
			$AYAT_NAMA = 'PAJAK HIBURAN';
			$JENISBAYAR = 'STPD';
			break;
			
			case '4.1.1.4.0':
			$namaTBL = 'TBLDAFTREKLAME';
			$AYAT = '4';
			$AYAT_NAMA = 'PAJAK REKLAME';
			$JENISBAYAR = 'STPD';
			break;

			case '4.1.1.5.0':
			$namaTBL = 'TBLDAFTPJU';
			$AYAT = '5';
			$AYAT_NAMA = 'PAJAK PJU';
			$JENISBAYAR = 'STPD';
			break;
			
			case '4.1.1.7.0':
			$namaTBL = 'TBLDAFTPARKIR';
			$AYAT = '7';
			$AYAT_NAMA = 'PAJAK PARKIR';
			$JENISBAYAR = 'STPD';
			break;
			
			case '4.1.1.8.0':
			$namaTBL = 'TBLDAFTTANAH';
			$AYAT = '8';
			$AYAT_NAMA = 'PAJAK AIR TANAH';
			$JENISBAYAR = 'SKPD';
			break;
			
			case '4.1.1.9.0':
			$namaTBL = 'TBLDAFTBURUNG';
			$AYAT = '9';
			$AYAT_NAMA = 'PAJAK SARANG BURUNG WALET';
			$JENISBAYAR = 'STPD';
			break;

			case '4.1.1.11.0':
			$namaTBL = 'TBLDAFTBPHTB';
			$AYAT = '11';
			$AYAT_NAMA = 'PAJAK BPHTB';
			$JENISBAYAR = 'STPD';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
				}

				$tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
				$bulanpjk = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
				$tglpjk = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
				$kecamatan = isset($_REQUEST['TBLKECAMATAN_ID']) && !empty($_REQUEST['TBLKECAMATAN_ID']) ? (int)$_REQUEST['TBLKECAMATAN_ID'] : "''";

				$tahunsptpd = isset($_REQUEST['ENTRI_THNPAJAK']) && !empty($_REQUEST['ENTRI_THNPAJAK']) ? (int)$_REQUEST['ENTRI_THNPAJAK'] :'';
				$bulansptpd = isset($_REQUEST['ENTRI_BLNPAJAK']) && !empty($_REQUEST['ENTRI_BLNPAJAK']) ?(int)$_REQUEST['ENTRI_BLNPAJAK'] :'';
				$tanggalsptpd = isset($_REQUEST['ENTRI_TGLPAJAK']) && !empty($_REQUEST['ENTRI_TGLPAJAK']) ? (int)$_REQUEST['ENTRI_TGLPAJAK'] :'';
				
				$wherethnpajak = $tahunpjk!=0 ? (' AND '.$namaTBL.'.TBLPENDATAAN_THNPAJAK='.$tahunpjk) : '';
				$whereblnpajak = $bulanpjk!=0 ? (' AND '.$namaTBL.'.TBLPENDATAAN_BLNPAJAK='.$bulanpjk) : '';
				$wheretglpajak = $tglpjk!=0 ? (' AND '.$namaTBL.'.TBLPENDATAAN_TGLPAJAK='.$tglpjk) : '';

				$wheretahunsptpd = $tahunsptpd!=0 ? (' AND '.$namaTBL.'_THNENTRI='.$tahunsptpd) : '';
				$wherebulansptpd = $bulansptpd!=0 ? (' AND '.$namaTBL.'_BLNENTRI='.$bulansptpd) : '';
				// $wheretanggalsptpd = $tanggalsptpd!=0 ? (' AND '.$namaTBL.'_TGLENTRI='.$tanggalsptpd) : '';
				if ($_REQUEST['ENTRI_TGLPAJAK']=='') {
					$wheretanggalsptpd = '';
				} else {
					$wheretanggalsptpd = (' AND '.$namaTBL.'_TGLENTRI='.$_REQUEST['ENTRI_TGLPAJAK']);
				}

				$ISONLINE = $_REQUEST['ISONLINE'] ? $_REQUEST['ISONLINE'] : 'X';
				if ($ISONLINE=='T') {
					$WHEREISONLINE = (" AND IS_CREATE LIKE 'ESPTPD         '") ? (" AND IS_CREATE = 'ESPTPD         '") : "";
				} elseif ($ISONLINE=='F') {
					$WHEREISONLINE = (" AND IS_CREATE LIKE 'MAPATDA        '") ? (" AND IS_CREATE = 'MAPATDA        '") : "";
				} else {
					$WHEREISONLINE = "";
				}

				$ISBAYAR = $_REQUEST['ISBAYAR'] ? $_REQUEST['ISBAYAR'] : 'X';
				if ($ISBAYAR=='T') {
					$JOINISBAYAR = " LEFT JOIN TBLSETOR ON 
						$namaTBL.TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
						AND $namaTBL.TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
						AND $namaTBL.TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK
						AND NVL($namaTBL.TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0)
						AND TBLSETOR_JNSBAYAR LIKE '%".$JENISBAYAR."%'
						";
					$WHEREISBAYAR = " AND TBLSETOR.TBLDAFTAR_NOPOK IS NOT NULL";
				} elseif ($ISBAYAR=='F') {
					$JOINISBAYAR = " LEFT JOIN TBLSETOR ON 
						$namaTBL.TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
						AND $namaTBL.TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
						AND $namaTBL.TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK
						AND NVL($namaTBL.TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0)
						AND TBLSETOR_JNSBAYAR LIKE '%".$JENISBAYAR."%'
						";
					$WHEREISBAYAR = " AND TBLSETOR.TBLDAFTAR_NOPOK IS NULL AND NVL(".$namaTBL."_PAJAK,0) <> 0 ";
				} else {
					$JOINISBAYAR = "";
					$WHEREISBAYAR = "";
				}

				
				$KODE = isset($_REQUEST['KODE_JENIS']) && !empty($_REQUEST['KODE_JENIS']) ? $_REQUEST['KODE_JENIS'] :'';

				if ($KODE=='T') {
					$wherejenis = (' AND NVL('.$namaTBL.'.TBLPENDATAAN_TGLPAJAK,0)  = 0');
				} else if($KODE=='I') {
					$wherejenis = (' AND NVL('.$namaTBL.'.TBLPENDATAAN_TGLPAJAK,0)  <> 0');
				} else {
					$wherejenis = '';
				}

				if ($AYAT == '8') {
					$totalvolume = 'TBLDAFTTANAH_TOTALVOLUME,';
				} else {
					$totalvolume = '';
				}

				// $rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
				// switch ( $rek ) {
				// 	case '4.1.1.1.0':
				// 	$namaTBL = 'TBLDAFTHOTEL';
				// 	$AYAT = '1';
				// 	break;
					
				// 	case '4.1.1.2.0':
				// 	$namaTBL = 'TBLDAFTRMAKAN';
				// 	$AYAT = '2';
				// 	break;
					
				// 	case '4.1.1.3.0':
				// 	$namaTBL = 'TBLDAFTHIBURAN';
				// 	$AYAT = '3';
				// 	break;
					
				// 	case '4.1.1.4.0':
				// 	$namaTBL = 'TBLDAFTREKLAME';
				// 	$AYAT = '4';
				// 	break;
					
				// 	case '4.1.1.7.0':
				// 	$namaTBL = 'TBLDAFTPARKIR';
				// 	$AYAT = '7';
				// 	break;
					
				// 	case '4.1.1.8.0':
				// 	$namaTBL = 'TBLDAFTTANAH';
				// 	$AYAT = '8';
				// 	break;
					
				// 	case '4.1.1.9.0':
				// 	$namaTBL = 'TBLDAFTBURUNG';
				// 	$AYAT = '9';
				// 	break;
					
				// 	default:
				// 	$namaTBL = 'TBLDAFTHOTEL';
				// 	break;
				// }
				 $sql="SELECT
			(
				SELECT
					TBLREKENING.TBLREKENING_NAMAREKENING
				FROM
					TBLREKENING
				WHERE
					TBLREKENING.TBLREKENING_REKPENDAPATAN = ".$namaTBL.".".$namaTBL ."_REKPENDAPATAN
				AND TBLREKENING.TBLREKENING_REKPAD = ".$namaTBL.".".$namaTBL ."_REKPAD
				AND TBLREKENING.TBLREKENING_REKPAJAK = ".$namaTBL.".".$namaTBL ."_REKPAJAK
				AND TBLREKENING.TBLREKENING_REKAYAT = ".$namaTBL.".".$namaTBL ."_REKAYAT
				AND TBLREKENING.TBLREKENING_REKJENIS = ".$namaTBL.".".$namaTBL ."_REKJENIS
			) AS NMREKening,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			".$namaTBL.".TBLKECAMATAN_ID,
			".$namaTBL.".TBLKELURAHAN_ID,
			".$namaTBL ."_REKJENIS,
			".$namaTBL.".TBLPENDATAAN_THNPAJAK,
			".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
			".$namaTBL.".TBLPENDATAAN_TGLPAJAK,
			".$namaTBL.".TBLPENDATAAN_PAJAKKE,
			".$namaTBL ."_OMSETPAJAK,
			".$namaTBL ."_PAJAK,
			".$namaTBL ."_THNSPTPD,
			".$namaTBL ."_BLNSPTPD,
			".$namaTBL ."_TGLSPTPD,
			".$namaTBL ."_THNENTRI,
			".$namaTBL ."_BLNENTRI,
			".$totalvolume."
			".$namaTBL ."_TGLENTRI
			FROM
				TBLDAFTAR
			INNER JOIN $namaTBL ON TBLDAFTAR.TBLDAFTAR_NOPOK = $namaTBL.TBLDAFTAR_NOPOK
			" . $JOINISBAYAR . "
			WHERE
				TBLDAFTAR.tbldaftar_badanusahanama IS NOT NULL
			AND TBLDAFTAR.TBLDAFTAR_NOPOK <> 150000
			AND ".$namaTBL ."_TGLENTRI != 0
			AND ".$namaTBL ."_rekpendapatan = 4
			AND ".$namaTBL ."_REKPAD = 1
			AND ".$namaTBL ."_REKPAJAK = 1
			AND ".$namaTBL ."_REKAYAT = $AYAT

			" . $wherethnpajak . "
			" . $whereblnpajak . "
			" . $wheretglpajak . "
			" . $wherejenis . "
			" . $WHEREISONLINE . "
			" . $WHEREISBAYAR . "

			-- AND ".$namaTBL .".".$namaTBL ."_isjnspenetapan = 'S'
			" .$wheretahunsptpd. "
			" .$wherebulansptpd. "
			" .$wheretanggalsptpd. "
			-- AND ".$namaTBL ."_REKJENIS = 1
			-- AND ".$namaTBL .".TBLKECAMATAN_ID = ".$kecamatan."
			-- AND ".$namaTBL ."_THNENTRI = 16
			-- AND ".$namaTBL ."_BLNENTRI = 02
			-- AND ".$namaTBL ."_TGLENTRI = 05
			-- AND NVL(".$namaTBL."_TGLENTRI,0) > 0
			-- AND NVL(".$namaTBL ."_OMSETPAJAK,0) > 0
			ORDER BY
				TBLKECAMATAN_ID,
				TBLKELURAHAN_ID,
				".$namaTBL.".TBLDAFTAR_NOPOK,
				".$namaTBL.".TBLPENDATAAN_PAJAKKE,
				".$namaTBL.".".$namaTBL."_PAJAK
			";
		$data['hasil'] = Yii::app()->db->createCommand( $sql )->queryAll();

		$sql2="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 9";
		$sql3="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 4";	
		$sql4="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 5";
		$sql5="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 14";	

		$data['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();
		$data['jab3'] = Yii::app()->db->createCommand($sql3)->queryRow();
		$data['jab4'] = Yii::app()->db->createCommand($sql4)->queryRow();
		$data['jab5'] = Yii::app()->db->createCommand($sql5)->queryRow();

		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '4.1.1.1.0':
			$namaTBL = 'TBLDAFTHOTEL';
			$AYAT = '1';
			break;
			
			case '4.1.1.2.0':
			$namaTBL = 'TBLDAFTRMAKAN';
			$AYAT = '2';
			break;
			
			case '4.1.1.3.0':
			$namaTBL = 'TBLDAFTHIBURAN';
			$AYAT = '3';
			break;
			
			case '4.1.1.4.0':
			$namaTBL = 'TBLDAFTREKLAME';
			$AYAT = '4';
			break;

			case '4.1.1.5.0':
			$namaTBL = 'TBLDAFTPJU';
			$AYAT = '5';
			break;
			
			case '4.1.1.7.0':
			$namaTBL = 'TBLDAFTPARKIR';
			$AYAT = '7';
			break;
			
			case '4.1.1.8.0':
			$namaTBL = 'TBLDAFTTANAH';
			$AYAT = '8';
			break;
			
			case '4.1.1.9.0':
			$namaTBL = 'TBLDAFTBURUNG';
			$AYAT = '9';
			break;

			case '4.1.1.11.0':
			$namaTBL = 'TBLDAFTBPHTB';
			$AYAT = '11';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
		}



		// $data['list_kartudata'] = Yii::app()->db->createCommand($query)->queryAll();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_kartudata' . DIRECTORY_SEPARATOR;

		if ($AYAT=='8') {
			$namatpl = $path_tpl . 'kartudata-airtanah.docx';
		} else {
			$namatpl = $path_tpl . 'kartudata-nonreklame.docx';
		}

		Yii::import('ext.DMOpenTBS',true);
		Yii::import('ext.LokalIndonesia');
		DMOpenTBS::init();
		$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
		$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

		// Delete a sheet 
		// $otbs->PlugIn(OPENTBS_DELETE_SHEETS, 'Delete me'); 


		// Display a sheet (make it visible) 
		// $otbs->PlugIn(OPENTBS_DISPLAY_SHEETS, 'Display me'); 

		// Change the current sheet 
		// $otbs->PlugIn(OPENTBS_SELECT_SHEET, 2); 

		// A recordset for merging tables

		//INI CODING QUERY CETAK WORD

			

		$dt = array();
		$rows = array();
		
		// $totaljumrek = array('totaljumrek'=>0); 
		$total = array('total'=>0); $no=1; foreach ($data['hasil'] as $kolom) :

			$dt['no'] = $no++;
			$dt['nopok'] = $kolom['TBLDAFTAR_NOPOK'];
			$dt['noskp'] = $kolom['TBLDAFTAR_GOLONGAN'];
			$dt['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
			if ($AYAT=='11') {
				$dt['namabadan'] = $kolom['TBLDAFTAR_PEMILIKNAMA'];
			} else {
				$dt['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
			}

			$dt['kec'] = $kolom['TBLKECAMATAN_IDBADANUSAHA'];
			$dt['kel'] = $kolom['TBLKELURAHAN_IDBADANUSAHA'];

			$dt['jen'] = $kolom[''.$namaTBL.'_REKJENIS'];

			$dt['thspt'] = $kolom[''.$namaTBL.'_THNENTRI'];
			$dt['blspt'] = sprintf("%02d",$kolom[''.$namaTBL.'_BLNENTRI']);
			$dt['tglspt'] = sprintf("%02d",$kolom[''.$namaTBL.'_TGLENTRI']);

			$dt['omset'] = LokalIndonesia::ribuan($kolom[''.$namaTBL.'_OMSETPAJAK']);

			if ($AYAT=='8') {
				$dt['vol'] = $kolom[''.$namaTBL.'_TOTALVOLUME'];
			} else {
				$dt['vol'] = '';
			} 

			 
			
			
			$dt['pajak'] = LokalIndonesia::ribuan($kolom[''.$namaTBL.'_PAJAK']);

			if ($AYAT=='8') {
				$total['total'] += $kolom[''.$namaTBL.'_PAJAK'];
			} else {
				$total['total'] += $kolom[''.$namaTBL.'_OMSETPAJAK'];
			}

			$thnpajak = $kolom['TBLPENDATAAN_THNPAJAK'];
			$blnpajak = $kolom['TBLPENDATAAN_BLNPAJAK'];
			$tglpajak = $kolom['TBLPENDATAAN_TGLPAJAK'];

			// $thnentri = $kolom['TBLDAFTREKLAME_THNENTRI'];
			// $tglentri = $kolom['TBLDAFTREKLAME_TGLENTRI'];
			// $blnentri = $kolom['TBLDAFTREKLAME_BLNENTRI'];

			$dt['namarek'] = $kolom['NMREKENING'];
			$rek = $kolom['NMREKENING'];

			// $dt['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_PAJAK']);

			$dt['thnpajak'] = $kolom['TBLPENDATAAN_THNPAJAK'];
			$dt['blnpajak'] = $kolom['TBLPENDATAAN_BLNPAJAK'];
			$dt['tglpajak'] = $kolom['TBLPENDATAAN_TGLPAJAK'];

			// $dt['npwpd'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d", $kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);
			$dt['npwpd'] = sprintf("%07d", $kolom['TBLDAFTAR_NOPOK']);

		array_push($rows, $dt);

		endforeach;

		$header = array();

		$header['total'] = LokalIndonesia::ribuan($total['total']);
		$header['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');
		$header['jabatan1'] = $data['jab2']['TBLPEJABAT_URAIAN'];
		$header['jabatan2'] = $data['jab3']['TBLPEJABAT_URAIAN'];
		$header['jabatan3'] = $data['jab4']['TBLPEJABAT_URAIAN'];
		$header['jabatan4'] = $data['jab5']['TBLPEJABAT_URAIAN'];

		$header['nama1'] = $data['jab2']['TBLPEJABAT_NAMA'];
		$header['nama2'] = $data['jab3']['TBLPEJABAT_NAMA'];
		$header['nama3'] = $data['jab4']['TBLPEJABAT_NAMA'];
		$header['nama4'] = $data['jab5']['TBLPEJABAT_NAMA'];

		$header['nip1'] = $data['jab2']['TBLPEJABAT_NIP'];
		$header['nip2'] = $data['jab3']['TBLPEJABAT_NIP'];
		$header['nip3'] = $data['jab4']['TBLPEJABAT_NIP'];
		$header['nip4'] = $data['jab5']['TBLPEJABAT_NIP'];

		$thn_spt = isset($_REQUEST['ENTRI_THNPAJAK']) && !empty($_REQUEST['ENTRI_THNPAJAK']) ? (int)$_REQUEST['ENTRI_THNPAJAK'] : '';
		$bln_spt = isset($_REQUEST['ENTRI_BLNPAJAK']) && !empty($_REQUEST['ENTRI_BLNPAJAK']) ? (int)$_REQUEST['ENTRI_BLNPAJAK'] : '';
		$tgl_spt = isset($_REQUEST['ENTRI_TGLPAJAK']) && !empty($_REQUEST['ENTRI_TGLPAJAK']) ? (int)$_REQUEST['ENTRI_TGLPAJAK'] : '';
		
		$GLOBALS['thnpajak'] = '';
		$GLOBALS['blnpajak'] = '';
		$GLOBALS['tglpajak'] = '';

		$thnpajak = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$blnpajak = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
		$tglpajak = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
		$GLOBALS['thnpajak'] = !empty($thnpajak) ? '20'. $thnpajak : '';
		$GLOBALS['blnpajak'] = !empty($blnpajak) ? $blnpajak : '';
		$GLOBALS['tglpajak'] = !empty($tglpajak) ? $tglpajak : '';

		// var_dump($header['hasil']);die;
		$GLOBALS['thnentri'] = $thn_spt;
		$GLOBALS['blnentri'] = $bln_spt;
		// $GLOBALS['tglentri'] = $tglentri;
		$GLOBALS['tglentri'] = $tgl_spt;
		$GLOBALS['cara'] = '';
		$GLOBALS['namarek'] = $AYAT_NAMA;
		
		//SAMPAI SINI QUERYNYA

		// var_dump($data);
		// echo json_encode($data);Yii::app()->end();
		// echo json_encode($row);

		// Merge data in the first sheet 
		// $npwpd = $data['TBLDAFTAR_NOPOK'];
		$namafileDL = "KARTUDATA-NONREKLAME.docx";
		$otbs->MergeBlock('dt', $rows); 
		$otbs->MergeField('header', $header); 
		// $otbs->MergeField('setoran', $setoran); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}
	
	public function getData()
	{
		// $namaTBL = '';
		$TBLREKENING_KODE = Yii::app()->request->getParam('TBLREKENING_KODE','');
		$TBLPENDATAAN_THNPAJAK_AWAL = substr(Yii::app()->request->getParam('TBLPENDATAAN_THNPAJAK_AWAL',''),2,2);
		$TBLPENDATAAN_THNPAJAK_AKHIR = substr(Yii::app()->request->getParam('TBLPENDATAAN_THNPAJAK_AKHIR',''),2,2);
		$TBLDAFTAR_NOPOK = Yii::app()->request->getParam('TBLDAFTAR_NOPOK','');
		$CUTOFF_TGL_AWAL = Yii::app()->request->getParam('CUTOFF_TGL_AWAL','');
		$CUTOFF_TGL_AKHIR = date('Y-m-d', strtotime(Yii::app()->request->getParam('CUTOFF_TGL_AKHIR',date('Y-m-d'))));

		$wheretgl = '';
		if ($CUTOFF_TGL_AWAL) {
			$tgl = date('Y-m-d', strtotime($CUTOFF_TGL_AWAL));
			$wheretgl = " WHERE TGL >= TO_DATE('". $tgl. "', 'YYYY-MM-DD') AND TGL <= TO_DATE('". $CUTOFF_TGL_AKHIR. "', 'YYYY-MM-DD') ";
		}

		switch ($TBLREKENING_KODE ) {
			case '1':
			$namaTBL = 'TBLDAFTHOTEL';
			$AYAT = '1';
			$AYAT_NAMA = 'PAJAK HOTEL';
			$FIELDPAJAK = 'PAJAK';
			$JENISBAYAR = 'STPD';

			break;
			
			case '2':
			$namaTBL = 'TBLDAFTRMAKAN';
			$AYAT = '2';
			$AYAT_NAMA = 'PAJAK RESTORAN';
			$FIELDPAJAK = 'PAJAK';
			$JENISBAYAR = 'STPD';

			break;
			
			case '3':
			$namaTBL = 'TBLDAFTHIBURAN';
			$AYAT = '3';
			$AYAT_NAMA = 'PAJAK HIBURAN';
			$FIELDPAJAK = 'PAJAK';
			$JENISBAYAR = 'STPD';
			break;
			
			case '4':
			$namaTBL = 'TBLDAFTREKLAME';
			$AYAT = '4';
			$AYAT_NAMA = 'PAJAK REKLAME';
			$FIELDPAJAK = 'PAJAK';
			$JENISBAYAR = 'SKPD';
			break;

			case '5':
			$namaTBL = 'TBLDAFTPJU';
			$AYAT = '5';
			$AYAT_NAMA = 'PAJAK PJU';
			$FIELDPAJAK = 'PAJAK';
			$JENISBAYAR = 'STPD';
			break;
			
			case '7':
			$namaTBL = 'TBLDAFTPARKIR';
			$AYAT = '7';
			$AYAT_NAMA = 'PAJAK PARKIR';
			$FIELDPAJAK = 'PAJAK';
			$JENISBAYAR = 'STPD';
			break;
			
			case '8':
			$namaTBL = 'TBLDAFTTANAH';
			$AYAT = '8';
			$AYAT_NAMA = 'PAJAK AIR TANAH';
			$FIELDPAJAK = 'PAJAKSKPD';
			$JENISBAYAR = 'SKPD';
			break;
			
			case '9':
			$namaTBL = 'TBLDAFTBURUNG';
			$AYAT = '9';
			$AYAT_NAMA = 'PAJAK SARANG BURUNG WALET';
			$FIELDPAJAK = 'PAJAK';
			$JENISBAYAR = 'STPD';
			break;

			case '11':
			$namaTBL = 'TBLDAFTBPHTB';
			$AYAT = '11';
			$AYAT_NAMA = 'PAJAK BPHTB';
			$FIELDPAJAK = 'PAJAK';
			$JENISBAYAR = 'STPD';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
		}

		// $JNSKETETAPAN = Yii::app()->request->getParam('JNSKETETAPAN','');
		
				$sql = "
				SELECT * FROM (
				SELECT
					TO_DATE( ".$namaTBL."_THNKURANGBAYAR || '-' || LPAD( ".$namaTBL."_BLNKURANGBAYAR, 2, '0' ) || '-' || LPAD( ".$namaTBL."_TGLKURANGBAYAR, 2, '0' ), 'YY-MM-DD' ) AS TGL ,'SKPDKB' JEN, 'PENETAPAN SKPDKB' KEG, 4 URUT, TO_CHAR(".$namaTBL."_REGKURANGBAYAR) NOSK, NULL AS STAANGS, ".$namaTBL.".TBLPENDATAAN_THNPAJAK THN, NVL(".$namaTBL.".".$namaTBL."_BLNKBAWAL,0) BLNAWAL, NVL(".$namaTBL. "_BLNKBAKHIR," . $namaTBL . ".TBLPENDATAAN_BLNPAJAK) BLNAKHIR, NULL AS KE, ".$namaTBL. "_RUPIAHKRGBAYAR PIUTANG, NULL AS REALISASI, ('Penetapan SKPDKB No. '||TO_CHAR(" . $namaTBL . "_REGKURANGBAYAR)) HASIL, TBLDAFTAR_PEMILIKNAMA NMWP
				FROM
					".$namaTBL."
				LEFT JOIN TBLANGSURAN	ON TBLANGSURAN.TBLDAFTAR_NOPOK = ".$namaTBL.".TBLDAFTAR_NOPOK 
					AND TBLANGSURAN.TBLPENDATAAN_THNPAJAK = ".$namaTBL.".TBLPENDATAAN_THNPAJAK 
					AND TBLANGSURAN.TBLPENDATAAN_BLNPAJAK = ".$namaTBL.".TBLPENDATAAN_BLNPAJAK 
					AND NVL( TBLANGSURAN.TBLPENDATAAN_TGLPAJAK, 0 ) = NVL( ".$namaTBL. ".TBLPENDATAAN_TGLPAJAK, 0 )
					AND TBLANGSURAN_PAJAKKE = 1
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK
				WHERE
					".$namaTBL.".TBLDAFTAR_NOPOK = ". $TBLDAFTAR_NOPOK." 
					AND ".$namaTBL.".TBLPENDATAAN_THNPAJAK >= ". $TBLPENDATAAN_THNPAJAK_AWAL." 
					AND ".$namaTBL.".TBLPENDATAAN_THNPAJAK <= ". $TBLPENDATAAN_THNPAJAK_AKHIR."
					AND NVL( ".$namaTBL.".".$namaTBL. "_REGKURANGBAYAR, 0 ) > 0 UNION

				SELECT
					TO_DATE( TBLANGSURAN_THNKETETAPAN || '-' || LPAD( TBLANGSURAN_BLNKETETAPAN, 2, '0' ) || '-' || LPAD( TBLANGSURAN_TGLKETETAPAN, 2, '0' ), 'YY-MM-DD' ) AS TGL , 'SKPD-A' JEN, 'PENETAPAN ANGSURAN' KEG, 6 URUT,
					TO_CHAR(NVL(MAX(".$namaTBL."_REGSURATANGSUR),'')) NOSK, MAX(".$namaTBL."_REGKURANGBAYAR) AS STAANGS, ".$namaTBL.".TBLPENDATAAN_THNPAJAK THN, MAX(NVL(".$namaTBL.".".$namaTBL."_BLNKBAWAL,0)) BLNAWAL, MAX(NVL(".$namaTBL. "_BLNKBAKHIR," . $namaTBL . ".TBLPENDATAAN_BLNPAJAK)) BLNAKHIR, NULL AS KE, SUM (TBLANGSURAN_KETETAPANTOTAL + TBLANGSURAN_BUNGAANGSURAN) PIUTANG, NULL AS REALISASI, ('Penetapan SKPD-A No. '||TO_CHAR(NVL(MAX(" . $namaTBL . "_REGSURATANGSUR),''))||' dari SKPDKB No. '||TO_CHAR(NVL(MAX(" . $namaTBL . "_REGKURANGBAYAR),''))) HASIL, MAX(TBLDAFTAR_PEMILIKNAMA) NMWP 
				FROM
					TBLANGSURAN
				LEFT JOIN ".$namaTBL." ON TBLANGSURAN.TBLDAFTAR_NOPOK = ".$namaTBL.".TBLDAFTAR_NOPOK 
					AND TBLANGSURAN.TBLPENDATAAN_THNPAJAK = ".$namaTBL.".TBLPENDATAAN_THNPAJAK 
					AND TBLANGSURAN.TBLPENDATAAN_BLNPAJAK = ".$namaTBL.".TBLPENDATAAN_BLNPAJAK 
					AND NVL( TBLANGSURAN.TBLPENDATAAN_TGLPAJAK, 0 ) = NVL( ".$namaTBL. ".TBLPENDATAAN_TGLPAJAK, 0 )
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK 
				WHERE
					TBLANGSURAN.TBLDAFTAR_NOPOK = " . $TBLDAFTAR_NOPOK . " 
					AND TBLANGSURAN.TBLPENDATAAN_THNPAJAK >= " . $TBLPENDATAAN_THNPAJAK_AWAL . " 
					AND TBLANGSURAN.TBLPENDATAAN_THNPAJAK <= " . $TBLPENDATAAN_THNPAJAK_AKHIR . " 
				GROUP BY TBLANGSURAN_THNKETETAPAN, TBLANGSURAN_BLNKETETAPAN, TBLANGSURAN_TGLKETETAPAN, ".$namaTBL. ".			TBLPENDATAAN_THNPAJAK UNION

				SELECT
					TO_DATE( TBLSETOR_THNSETOR || '-' || LPAD( TBLSETOR_BLNSETOR, 2, '0' ) || '-' || LPAD( TBLSETOR_TGLSETOR, 2, '0' ), 'YY-MM-DD' ) AS TGL , 'SKPDKB' JEN, ('PEMBAYARAN '||TBLSETOR_JNSBAYAR) KEG, 5 URUT, TO_CHAR(TBLSETOR_NOMORSSPD) NOSK, NULL AS STAANGS, TBLSETOR.TBLPENDATAAN_THNPAJAK THN, NVL(" . $namaTBL . "." . $namaTBL . "_BLNKBAWAL,0) BLNAWAL, NVL(" . $namaTBL . "_BLNKBAKHIR," . $namaTBL . ".TBLPENDATAAN_BLNPAJAK) BLNAKHIR, " . $namaTBL . ".TBLPENDATAAN_PAJAKKE KE, " . $namaTBL . "_RUPIAHKRGBAYAR AS PIUTANG, (TBLSETOR_RUPIAHSETOR+TBLSETOR_BUNGAKETETAPAN+TBLSETOR_DENDAKETETAPAN) REALISASI, ('Pembayaran SKPDKB No. '||TO_CHAR(" . $namaTBL . "_REGKURANGBAYAR)||' dengan No. SSPD '||TO_CHAR(TBLSETOR_NOMORSSPD)) HASIL, TBLDAFTAR_PEMILIKNAMA NMWP
				FROM
					TBLSETOR 
				LEFT JOIN " . $namaTBL . " ON TBLSETOR.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK 
					AND TBLSETOR.TBLPENDATAAN_THNPAJAK = " . $namaTBL . ".TBLPENDATAAN_THNPAJAK 
					AND TBLSETOR.TBLPENDATAAN_BLNPAJAK = " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK 
					AND NVL( TBLSETOR.TBLPENDATAAN_TGLPAJAK, 0 ) = NVL( " . $namaTBL . ".TBLPENDATAAN_TGLPAJAK, 0 )
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK
				WHERE
					TBLSETOR.TBLDAFTAR_NOPOK = " . $TBLDAFTAR_NOPOK . " 
					AND TBLSETOR.TBLPENDATAAN_THNPAJAK >= " . $TBLPENDATAAN_THNPAJAK_AWAL . " 
					AND TBLSETOR.TBLPENDATAAN_THNPAJAK <= ". $TBLPENDATAAN_THNPAJAK_AKHIR. " 
					AND TBLSETOR_REKPAJAK = 1 
					AND TRIM(TBLSETOR_JNSBAYAR) = 'SKPDKB' UNION
					
				SELECT
					TO_DATE( TBLSETOR_THNSETOR || '-' || LPAD( TBLSETOR_BLNSETOR, 2, '0' ) || '-' || LPAD( TBLSETOR_TGLSETOR, 2, '0' ), 'YY-MM-DD' ) AS TGL , 'SKPD-A' JEN, ('PEMBAYARAN '||TBLSETOR_JNSBAYAR||' ke '||TBLANGSURAN_PAJAKKE) KEG, 7 URUT, TO_CHAR(TBLSETOR_NOMORSSPD) NOSK, NULL AS STAANGS, TBLSETOR.TBLPENDATAAN_THNPAJAK THN, NVL(" . $namaTBL . "." . $namaTBL . "_BLNKBAWAL,0) BLNAWAL, NVL(" . $namaTBL . "_BLNKBAKHIR," . $namaTBL . ".TBLPENDATAAN_BLNPAJAK) BLNAKHIR, TBLANGSURAN_PAJAKKE KE, TBLANGSURAN_KETETAPANTOTAL AS PIUTANG, (TBLSETOR_RUPIAHSETOR+TBLSETOR_BUNGAKETETAPAN+TBLSETOR_DENDAKETETAPAN) REALISASI, ('Pembayaran SKPD-A No. '||TO_CHAR(" . $namaTBL . "_REGSURATANGSUR)||' ke '||TBLANGSURAN_PAJAKKE||' dengan No. SSPD '||TO_CHAR(TBLSETOR_NOMORSSPD)) HASIL, TBLDAFTAR_PEMILIKNAMA NMWP
				FROM
					TBLSETOR 
				LEFT JOIN " . $namaTBL . " ON TBLSETOR.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK 
					AND TBLSETOR.TBLPENDATAAN_THNPAJAK = " . $namaTBL . ".TBLPENDATAAN_THNPAJAK 
					AND TBLSETOR.TBLPENDATAAN_BLNPAJAK = " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK 
					AND NVL( TBLSETOR.TBLPENDATAAN_TGLPAJAK, 0 ) = NVL( " . $namaTBL . ".TBLPENDATAAN_TGLPAJAK, 0 )
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK
				LEFT JOIN TBLANGSURAN ON TBLANGSURAN.TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK 
					AND TBLANGSURAN.TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK 
					AND TBLANGSURAN.TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK 
					AND TBLANGSURAN.TBLANGSURAN_PAJAKKE = TBLSETOR.TBLPENDATAAN_PAJAKKE 
					AND NVL( TBLANGSURAN.TBLPENDATAAN_TGLPAJAK, 0 ) = NVL( TBLSETOR.TBLPENDATAAN_TGLPAJAK, 0 )
				WHERE
					TBLSETOR.TBLDAFTAR_NOPOK = " . $TBLDAFTAR_NOPOK . " 
					AND TBLSETOR.TBLPENDATAAN_THNPAJAK >= " . $TBLPENDATAAN_THNPAJAK_AWAL . " 
					AND TBLSETOR.TBLPENDATAAN_THNPAJAK <= ". $TBLPENDATAAN_THNPAJAK_AKHIR. " 
					AND TBLSETOR_REKPAJAK = 1 
					AND TRIM(TBLSETOR_JNSBAYAR) = 'SKPD-A' UNION

				SELECT 
					TBLHISTORIWP_TGL AS TGL, TBLHISTORIWP_JNSKETETAPAN AS JEN, TBLHISTORIWP_KEGIATAN AS KEG, 1 URUT, TBLHISTORIWP_NOSK NOSK, NULL AS STAANGS, TBLHISTORIWP_THNPAJAK THN, TBLHISTORIWP_BLNPAJAKAWAL BLNAWAL, TBLHISTORIWP_BLNPAJAKAKHIR BLNAKHIR, NULL AS KE, TBLHISTORIWP_PIUTANG PIUTANG, NULL AS REALISASI, TBLHISTORIWP_HASIL HASIL, TBLDAFTAR_PEMILIKNAMA NMWP
				FROM 
					TBLHISTORIWP
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = TBLHISTORIWP_NOPOK
				WHERE
					TBLHISTORIWP_NOPOK = ".$TBLDAFTAR_NOPOK. "
					AND TBLHISTORIWP_THNPAJAK >= " . $TBLPENDATAAN_THNPAJAK_AWAL . " 
					AND TBLHISTORIWP_THNPAJAK <= " . $TBLPENDATAAN_THNPAJAK_AKHIR . " UNION

				SELECT 
					TGLHIMBAUAN AS TGL, STATUS_DATA AS JEN, 'PENERBITAN HIMBAUAN' AS KEG, 2 URUT, NOHIMBAUAN NOSK, NULL AS STAANGS, THP THN, BLP BLNAWAL, BLP BLNAKHIR, NULL AS KE, NULL AS PIUTANG, NULL AS REALISASI, NULL AS HASIL, TBLDAFTAR_PEMILIKNAMA NMWP
				FROM 
					TBLHIMBAUAN
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = NOPOK
				WHERE
					NOPOK = " . $TBLDAFTAR_NOPOK . "
					AND THP >= " . $TBLPENDATAAN_THNPAJAK_AWAL . " 
					AND THP <= " . $TBLPENDATAAN_THNPAJAK_AKHIR . "
					
				) TAB ".$wheretgl." ORDER BY TGL, URUT
				";

				// echo $sql;Yii::app()->end();
		// echo $sql;Yii::app()->end();
		return $data = Yii::app()->db->createCommand( $sql )->queryAll();

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	}

	public function actionsimpankegiatan()
	{
		// echo CJSON::encode(array('pesan' => 'failed'));Yii::app()->end();
		$NOPOK_INPUT = Yii::app()->request->getParam('NOPOK_INPUT','');
		$TANGGAL_INPUT = Yii::app()->request->getParam('TANGGAL_INPUT','');
		$KEGIATAN_INPUT = Yii::app()->request->getParam('KEGIATAN_INPUT','');
		$JNSKETETAPAN_INPUT = Yii::app()->request->getParam('JNSKETETAPAN_INPUT','');
		$NOSK_INPUT = Yii::app()->request->getParam('NOSK_INPUT','');
		$TAHUN_INPUT = Yii::app()->request->getParam('TAHUN_INPUT','');
		$BLNPAJAK_AWAL_INPUT = intval(Yii::app()->request->getParam('BLNPAJAK_AWAL_INPUT',0));
		$BLNPAJAK_AKHIR_INPUT = intval(Yii::app()->request->getParam('BLNPAJAK_AKHIR_INPUT',0));
		$PIUTANG_INPUT = Yii::app()->request->getParam('PIUTANG_INPUT',0)? Yii::app()->request->getParam('PIUTANG_INPUT'): 0;
		$HASIL_INPUT = Yii::app()->request->getParam('HASIL_INPUT','');

		$IDPENGGUNA = Yii::app()->user->pengguna_id;
		$wpr = Yii::app()->db->createCommand('SELECT * FROM TBLDAFTAR WHERE TBLDAFTAR_NOPOK=' . $NOPOK_INPUT . '')->queryRow();

		// $command_insrt = Yii::app()->db->createCommand();
		// $arrayOfData = array(
		// 	'TBLHISTORIWP_TGL' => 'TO_DATE('.date('Y-m-d H:i:s',strtotime($TANGGAL_INPUT)).', ',
		// 	'TBLHISTORIWP_KEGIATAN' => strtoupper($KEGIATAN_INPUT),
		// 	'TBLHISTORIWP_JNSKETETAPAN' => $JNSKETETAPAN_INPUT,
		// 	'TBLHISTORIWP_NOSK' => $NOSK_INPUT,
		// 	'TBLHISTORIWP_THNPAJAK' => substr($TAHUN_INPUT,-2),
		// 	'TBLHISTORIWP_BLNPAJAKAWAL' => $BLNPAJAK_AWAL_INPUT,
		// 	'TBLHISTORIWP_BLNPAJAKAKHIR' => $BLNPAJAK_AKHIR_INPUT,
		// 	'TBLHISTORIWP_PIUTANG' => $PIUTANG_INPUT,
		// 	'TBLHISTORIWP_NMWP' => $wpr['TBLDAFTAR_PEMILIKNAMA'],
		// 	'TBLHISTORIWP_HASIL' => $HASIL_INPUT,
		// 	'TBLHISTORIWP_REALISASI' => '',
		// 	'TBLPENGGUNA_ID' => $IDPENGGUNA,
		// 	'TBHISTORIWP_NOPOK' => $NOPOK_INPUT

		// );
		// $insert = $command_insrt->insert('TBLHISTORIWP', $arrayOfData);

		$sqlinsert ="INSERT INTO TBLHISTORIWP ( TBLHISTORIWP_TGL, TBLHISTORIWP_KEGIATAN, TBLHISTORIWP_JNSKETETAPAN, TBLHISTORIWP_NOSK, TBLHISTORIWP_THNPAJAK, TBLHISTORIWP_BLNPAJAKAWAL, TBLHISTORIWP_BLNPAJAKAKHIR, TBLHISTORIWP_PIUTANG, TBLHISTORIWP_NMWP, TBLHISTORIWP_HASIL, TBLHISTORIWP_REALISASI, TBLPENGGUNA_ID, TBLHISTORIWP_NOPOK )
		VALUES
			(
			TO_DATE('". date('Y-m-d H:i:s', strtotime($TANGGAL_INPUT))."', 'YYYY-MM-DD HH24:MI:SS'), '". strtoupper($KEGIATAN_INPUT)."', '". $JNSKETETAPAN_INPUT."', '". $NOSK_INPUT."', ". substr($TAHUN_INPUT, -2).", ". $BLNPAJAK_AWAL_INPUT.", ". $BLNPAJAK_AKHIR_INPUT.", 0, '". $wpr['TBLDAFTAR_PEMILIKNAMA']."', '". $HASIL_INPUT."', 0, ". $IDPENGGUNA.", ". $NOPOK_INPUT."
			)";
			// echo $sqlinsert;Yii::app()->end();
		$insert = Yii::app()->db->createCommand($sqlinsert)->execute();
		if ($insert) {
			echo CJSON::encode(array('pesan' => 'success'));
		} else {
			echo CJSON::encode(array('pesan' => 'failed'));
		}
	}
}
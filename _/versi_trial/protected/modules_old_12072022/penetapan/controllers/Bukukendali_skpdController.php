<?php

class Bukukendali_skpdController extends Controller
{
	public function actionIndex()
	{
		$data['list_jalan'] = Yii::app()->db->createCommand()->select()->from('tabjalan')->queryAll();
		$data['list_kecamatan'] = Yii::app()->db->createCommand()->select()->from('REFKECAMATAN')->queryAll();
		$data['rek'] = Yii::app()->db->createCommand('
			SELECT
			*
			FROM
			TBLREKENING
			WHERE
			TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			AND TBLREKENING_REKAYAT = 4
			OR TBLREKENING_REKAYAT = 8
			AND TBLREKENING_REKJENIS = 0
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
		$data['URL_APP'] = Yii::app()->getBaseUrl(true);
		$this->renderPartial('index', array('data'=>$data));
		
	}

	public function getData()
	{
		$namaTBL = '';
		$tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$bulanpjk = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';

		$wherethnpajak = $tahunpjk!=0 ? (' AND TBLPENDATAAN_THNPAJAK='.$tahunpjk) : '';
		$whereblnpajak = $bulanpjk!=0 ? (' AND TBLPENDATAAN_BLNPAJAK='.$bulanpjk) : '';

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
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
		}
		$sql = "
		SELECT
		TBLDAFTAR.TBLDAFTAR_GOLONGAN
		,TBLDAFTAR.TBLDAFTAR_NOPOK
		,TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		,TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		,TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
		,TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=1  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  JANUARI,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=2  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  FEBRUARI,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=3  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  MARET,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=4  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  APRIL,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=5  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  MEI,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=6  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  JUNI,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=7  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  JULI,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=8  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  AGUSTUS,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=9  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  SEPTEMBER,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=10  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  OKTOBER,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=11  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  NOVEMBER,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=12  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  DESEMBER
		
		FROM TBLDAFTAR
		Inner Join " . $namaTBL . " ON TBLDAFTAR.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK
		
		WHERE
		" . $namaTBL . "_REKPENDAPATAN = 4
		AND " . $namaTBL . "_REKPAD = 1
		AND " . $namaTBL . "_REKPAJAK = 1
		AND " . $namaTBL . "_REKAYAT = ".$AYAT."
		".$wherethnpajak."
		".$whereblnpajak."
		and " . $namaTBL . "." . $namaTBL . "_ISJNSPENETAPAN='S'

		group by TBLDAFTAR.TBLDAFTAR_GOLONGAN
		,TBLDAFTAR.TBLDAFTAR_NOPOK
		,TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		,TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		,TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
		,TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT

		ORDER BY  TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		,TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		,TBLDAFTAR.TBLDAFTAR_NOPOK
		";
		return $data = Yii::app()->db->createCommand( $sql )->queryAll();
	}
	
	public function actionCetak()
	{

		$masapajak = substr($_REQUEST['masapajak'], -2) ? substr($_REQUEST['masapajak'], -2) : '' ;
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '' ;
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '' ;
		$TBLKECAMATAN_ID = $_REQUEST['TBLKECAMATAN_ID'] ? $_REQUEST['TBLKECAMATAN_ID'] : '' ;
		$JALAN = $_REQUEST['JALAN'] ? $_REQUEST['JALAN'] : '' ;
		$cara_penetapan = $_REQUEST['cara_penetapan'] ? $_REQUEST['cara_penetapan'] : '' ;
		$cutoff = trim($_REQUEST['cutoff'])!='' ? date('Y-m-d', strtotime($_REQUEST['cutoff']) ) : "";
		// $explode = explode('-',$cutoff);
		// $tglc =$explode[2];
		// $blnc =$explode[1];
		// $tahunc = substr($explode[0], -2);

		$AYAT = $_REQUEST['TBLREKENING_KODE'];
		if($AYAT=='4.1.1.1.0'){
			$namaTBL = 'TBLDAFTHOTEL';
			$judul = 'PAJAK HOTEL';
			$NAKB = 'DENDAKRGBAYAR';
			// $petugas = 'NURWITANTO PRAWISDA';
			// $nip = 'NITB-2435';
			$jab_id = '18';
			$REKAYAT = '1';
		}
		elseif($AYAT=='4.1.1.2.0'){
			$namaTBL= 'TBLDAFTRMAKAN';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$REKAYAT = '2';
			// $petugas = 'YULI PURWANTO, SE.';
			// $nip = 'NIP. 197407041994021005';
			$jab_id = '19';
		}
		elseif($AYAT=='4.1.1.3.0'){
			$namaTBL= 'TBLDAFTHIBURAN';
			$judul = 'PAJAK HIBURAN';
			$NAKB = 'NAKB';
			$REKAYAT = '3';
			// $petugas = 'ELSI NURLITA IKAWATI, SE.';
			// $nip = 'NIP. 197104121992031003';
			$jab_id = '20';
		}
		elseif($AYAT=='4.1.1.4.0'){
			$namaTBL= 'TBLDAFTREKLAME';
			$judul = 'PAJAK REKLAME';
			$NAKB = 'NAKB';
			$REKAYAT = '4';
			// $petugas = 'MEYRINA NUR IVADA, SE.';
			// $nip = 'NIP. 196903251990031003';
			$jab_id = '23';
		}
		elseif($AYAT=='4.1.1.7.0'){
			$namaTBL= 'TBLDAFTPARKIR';
			$judul = 'PAJAK PARKIR';
			$NAKB = 'NAKB';
			$REKAYAT = '7';
			// $petugas = 'A. YULIANTO ANDRI W., A.Md.';
			// $nip = 'NITB-2376';
			$jab_id = '21';
		}
		elseif($AYAT=='4.1.1.8.0'){
			$namaTBL= 'TBLDAFTTANAH';
			$judul = 'PAJAK AIR TANAH';
			$NAKB = 'NAKB';
			$REKAYAT = '8';
			// $petugas = 'EKO HERIYANTO, S.Pd.';
			// $nip = 'NIP. 196805081992031011';
			$jab_id = '22';
		}
		elseif($AYAT=='4.1.1.9.0'){
			$namaTBL= 'TBLDAFTBURUNG';
			$judul = 'PAJAK SARANG BURUNG WALET';
			$NAKB = 'NAKB';
			$REKAYAT = '9';
			// $petugas = 'EKO HERIYANTO, S.Pd.';
			// $nip = 'NIP. 196805081992031011';
		}
		elseif($AYAT=='4.1.1.11.0'){
			$namaTBL= 'TBLDAFTBPHTB';
			$judul = 'PAJAK BPHTB';
			$NAKB = 'NAKB';
			$REKAYAT = '11';
			// $petugas = '';
			// $nip = '';
		}

		$KDJLNREK = $_REQUEST['TBLREKENING_KODE'];
		if($KDJLNREK=='4.1.1.4.0'){
			$KDJLN = "AND ".$namaTBL.".REFJALAN_ID = ".$JALAN."";
		}
		else{
			$KDJLN = "";
		};

		if($JALAN==''){
			$KDJLN = "";
		}
		else{
			$KDJLN = "AND ".$namaTBL.".REFJALAN_ID = ".$JALAN."";
		};


		if($masapajak==''){
			$wherethnpajak = "";
		}
		else{
			$wherethnpajak = "AND TBLPENDATAAN_THNPAJAK = ".$masapajak."";
		};

		if($bulan==''){
			$whereblnpajak = "";
		}
		else{
			$whereblnpajak = "AND TBLPENDATAAN_BLNPAJAK = ".$bulan."";
		};

		if($TBLKECAMATAN_ID==''){
			$wherekecamatan = "";
		}
		else{
			$wherekecamatan = "AND ".$namaTBL.".TBLKECAMATAN_ID = ".$TBLKECAMATAN_ID."";
		};

		if($cara_penetapan==''){
			$penetapan = "";
		}
		else{
			$penetapan = "AND ".$namaTBL.".ISJNSPENETAPAN = ".$cara_penetapan."";
		};

		// if($tahunc==''){
		// 	$wheretahunc = "";
		// }
		// else{
		// 	$wheretahunc = "AND ".$namaTBL.".".$namaTBL."_TAHUNSETOR <= ".$tahunc."";
		// };

		// if($blnc==''){
		// 	$whereblnc = "";
		// }
		// else{
		// 	$whereblnc = "AND ".$namaTBL.".".$namaTBL."_BULANSETOR <= ".$blnc."";
		// };

		// if($tglc==''){
		// 	$wheretglc = "";
		// }
		// else{
		// 	$wheretglc = "AND ".$namaTBL.".".$namaTBL."_TANGGALSETOR <= ".$tglc."";
		// };

		if(empty($cutoff)){
			$cutoff = "";
		}
		else { if ($AYAT=='4.1.1.4.0'){
			$cutoff = " 
			AND TO_DATE (
				CONCAT (
					TBLDAFTREKLAME_BLNSKPD,
					CONCAT (
						'-',
						CONCAT (TBLDAFTREKLAME_TGLSKPD, CONCAT('-', TBLDAFTREKLAME_THNSKPD))
						)
			),
			'MM-DD-YY'
			) < TO_DATE('$cutoff', 'YYYY-MM-DD')
			";
			} else {
				$cutoff = " 
				AND TO_DATE (
					CONCAT (
						".$namaTBL.".".$namaTBL."_BLNTERIMA,
						CONCAT (
							'-',
							CONCAT (".$namaTBL.".".$namaTBL."_TGLTERIMA, CONCAT('-', ".$namaTBL.".".$namaTBL."_THNTERIMA))
							)
				),
				'MM-DD-YY'
				) < TO_DATE('$cutoff', 'YYYY-MM-DD')
				";
			}
		};


		$SQLKODE = $_REQUEST['TBLREKENING_KODE'];
		if($SQLKODE=='4.1.1.4.0'){
			$sql= "SELECT
			*
			FROM
			(
				SELECT
				tbldaftar_badanusahanama,
				tbldaftar_badanusahaalamat,
				TBLSETOR.TBLSETOR_RUPIAHSETOR,
				TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK,
				TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK,
				TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK,
				TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE,
				TBLDAFTREKLAME.TBLDAFTAR_GOLONGAN,
				TBLDAFTREKLAME.TBLDAFTAR_NOPOK,
				TBLDAFTREKLAME.TBLKECAMATAN_ID,
				TBLDAFTREKLAME.TBLKELURAHAN_ID,
				TBLDAFTREKLAME.TBLDAFTREKLAME_ISJNSPENETAPAN,
				TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRI,
				TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRI,
				TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRI,
				TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAK,
				TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN2,
				TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN1,
				TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME,
				TBLDAFTREKLAME.TBLDAFTREKLAME_THNBATASSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_BLNBATASSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_TGLBATASSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_NOMORSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_URUTSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAKSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_THNSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRISETOR,
				TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRISETOR,
				TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRISETOR,
				TBLDAFTREKLAME.TBLDAFTREKLAME_REGSETOR,
				TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHSETOR,
				TBLDAFTREKLAME.REFJALAN_ID,
				CONCAT (
					TBLDAFTREKLAME_TGLSPTPD,
					CONCAT (
						'/',
						CONCAT (
							TBLDAFTREKLAME_BLNSPTPD,
							(CONCAT('/20', TBLDAFTREKLAME_THNSPTPD))
							)
				)
				) AS TGLSPT,
				CONCAT (
					TBLDAFTREKLAME_TGLENTRI,
					CONCAT (
						'/',
						CONCAT (
							TBLDAFTREKLAME_BLNENTRI,
							(CONCAT('/20', TBLDAFTREKLAME_THNENTRI))
							)
				)
				) AS Tgl_ENTRY,
				TO_DATE (
					CONCAT (
						TBLDAFTREKLAME_BLNSKPD,
						CONCAT (
							'/',
							CONCAT (TBLDAFTREKLAME_TGLSKPD, CONCAT('/20', TBLDAFTREKLAME_THNSKPD))
							)
				),
				'MM/DD/YY'
				) AS Tanggal_Ketetapan,
				(
					CASE
					WHEN NVL (TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAKSKPD, 0) <> 0 THEN
					'SKPD Sudah Dicetak'
					WHEN NVL (TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHSETOR, 0) <> 0 THEN
					'SKPD Sudah Dicetak'
					END
					) AS status
				FROM
				TBLDAFTREKLAME
				LEFT JOIN TBLSETOR ON TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
				AND TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK
				AND TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK = TBLSETOR.TBLPENDATAAN_TGLPAJAK
				AND TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE = TBLSETOR.TBLPENDATAAN_PAJAKKE
				AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND (
					NVL (TBLSETOR.TBLSETOR_JNSKETETAPAN, '0') = '0'
					OR TBLSETOR.TBLSETOR_JNSKETETAPAN = 'T'
					)
				AND TBLSETOR.TBLSETOR_REKPAJAK = 1
				INNER JOIN TBLDAFTAR ON TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLDAFTAR.tbldaftar_nopok
				)
				WHERE
				NVL (TBLDAFTREKLAME_THNSKPD, 0) <> 0
				AND NVL (TBLDAFTREKLAME_BLNSKPD, 0) <> 0
				AND NVL (TBLDAFTREKLAME_TGLSKPD, 0) <> 0
				AND NVL (TBLDAFTREKLAME_PAJAK, 0) > 0
				AND NVL (TBLDAFTREKLAME_PAJAKSKPD, 0) > 0
				AND NVL (TBLDAFTREKLAME_RUPIAHSETOR, 0) <> 0
				AND TBLPENDATAAN_THNPAJAK = ".$masapajak."
				".$cutoff."
				";

				$data['kendali'] = $kendali = Yii::app()->db->createCommand($sql)->queryAll();
				}
				
				else{
					$sqllain = "SELECT
					*
					FROM
					(
						SELECT
						TBLDAFTAR.TBLDAFTAR_NOPOK,
						".$namaTBL.".TBLPENDATAAN_THNPAJAK,
						TBLDAFTAR.tbldaftar_badanusahanama,
						TBLDAFTAR.tbldaftar_pemiliknama,
						TBLDAFTAR.tbldaftar_jenispendapatan,
						TBLDAFTAR.tbldaftar_golongan,
						TBLDAFTAR.tblkelurahan_idbadanusaha,
						TBLDAFTAR.tblkecamatan_idbadanusaha,
						TBLDAFTAR.tbldaftar_badanusahaalamat,
						SUM (
							CASE
							WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
							AND TBLPENDATAAN_BLNPAJAK = 1 THEN
							NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
							ELSE
							0
							END
							) AS januari,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 2 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS februari,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 3 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS maret,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 4 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS april,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 5 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS mei,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 6 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS juni,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 7 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS juli,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 8 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS agustus,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 9 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS september,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 10 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS oktober,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 11 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS november,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 12 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS desember,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0) THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS jumlah_pembayaran,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0 
					AND NVL(".$namaTBL.".TBLPENDATAAN_TGLPAJAK, 0) = 0) THEN
					1
					ELSE
					0
					END
					) AS jumlah_skpd
				FROM
				TBLDAFTAR
				INNER JOIN ".$namaTBL." ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
				WHERE
				TBLDAFTAR.TBLDAFTAR_NOPOK <> 150000
				AND TBLDAFTAR.TBLDAFTAR_NOPOK <> 151000
				AND TBLDAFTAR.TBLDAFTAR_NOPOK <> 1500000
				AND ".$namaTBL."_REKPENDAPATAN = 4
				AND ".$namaTBL."_REKPAD = 1
				AND ".$namaTBL."_REKPAJAK = 1
				AND ".$namaTBL."_REKAYAT = ".$REKAYAT."
				".$wherethnpajak."
				".$whereblnpajak."
				".$penetapan."
				".$wherekecamatan."
				".$cutoff."
				GROUP BY
				".$namaTBL.".TBLPENDATAAN_THNPAJAK,
				TBLDAFTAR.TBLDAFTAR_NOPOK,
				TBLDAFTAR.tbldaftar_badanusahanama,
				TBLDAFTAR.tbldaftar_pemiliknama,
				TBLDAFTAR.tbldaftar_jenispendapatan,
				TBLDAFTAR.tbldaftar_golongan,
				TBLDAFTAR.TBLDAFTAR_NOPOK,
				TBLDAFTAR.tblkelurahan_idbadanusaha,
				TBLDAFTAR.tblkecamatan_idbadanusaha,
				TBLDAFTAR.tbldaftar_badanusahaalamat
				)
				ORDER BY
				tblkecamatan_idbadanusaha,
				tblkelurahan_idbadanusaha,
				TBLDAFTAR_NOPOK
				
				";

				$data['kendali'] = $kendali = Yii::app()->db->createCommand($sqllain)->queryAll();
				};
				// AND ".$namaTBL.".KDJLN = '40559'
				$data['judul'] = $judul;

				$sql3="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 6";	
				$sql4="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = ".$jab_id."";	

				$data['jab3'] = Yii::app()->db->createCommand($sql3)->queryRow();
				$data['jab4'] = Yii::app()->db->createCommand($sql4)->queryRow();

				// header('Content-Type: application/excel');
				// header("Content-Disposition: attachment;Filename=Daftar Buku Kendali SKPD.xls");

				$this->renderPartial('cetak', array('data'=>$data));
}

public function actioncetakword()
{
	$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
	$namatpl = $path_tpl . 'BUKU KENDALI SKPD (F4).docx';
	$namafileDL = "Buku Kendali SKPD.docx";

		// if (base64_decode($data['jenis'])=='REK') {
		// 	$namatpl = $path_tpl . 'Temp_Teguranrek.docx';
		// 	$namafileDL = "Surat-Teguranrek.docx"; 
		// }

	Yii::import('ext.DMOpenTBS',true);
	Yii::import('ext.LokalIndonesia');
	DMOpenTBS::init();
	$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
	$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

	$masapajak = substr($_REQUEST['masapajak'], -2) ? substr($_REQUEST['masapajak'], -2) : '' ;
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '' ;
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '' ;
		$TBLKECAMATAN_ID = $_REQUEST['TBLKECAMATAN_ID'] ? $_REQUEST['TBLKECAMATAN_ID'] : '' ;
		$JALAN = $_REQUEST['JALAN'] ? $_REQUEST['JALAN'] : '' ;
		$cara_penetapan = $_REQUEST['cara_penetapan'] ? $_REQUEST['cara_penetapan'] : '' ;

		$AYAT = $_REQUEST['TBLREKENING_KODE'];
		if($AYAT=='4.1.1.1.0'){
			$namaTBL = 'TBLDAFTHOTEL';
			$judul = 'PAJAK HOTEL';
			$NAKB = 'DENDAKRGBAYAR';
			$REKAYAT = '1';
			$petugas = 'M. ROHMAD ROMADHON';
			$nip = 'NIP. 1967121992031002';
		}
		elseif($AYAT=='4.1.1.2.0'){
			$namaTBL= 'TBLDAFTRMAKAN';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$REKAYAT = '2';
			$petugas = 'YULI  PURWANTO';
			$nip = '197407041994021005';
		}
		elseif($AYAT=='4.1.1.3.0'){
			$namaTBL= 'TBLDAFTHIBURAN';
			$judul = 'PAJAK HIBURAN';
			$NAKB = 'NAKB';
			$REKAYAT = '3';
			$petugas = 'ELSI NURLITA IKAWATI, A.Md';
			$nip = '197104121992031003';
		}
		elseif($AYAT=='4.1.1.4.0'){
			$namaTBL= 'TBLDAFTREKLAME';
			$judul = 'PAJAK REKLAME';
			$NAKB = 'NAKB';
			$REKAYAT = '4';
			$petugas = 'MEYRINA NUR IVADA';
			$nip = '196903251990031003';
		}
		elseif($AYAT=='4.1.1.7.0'){
			$namaTBL= 'TBLDAFTPARKIR';
			$judul = 'PAJAK PARKIR';
			$NAKB = 'NAKB';
			$REKAYAT = '7';
			$petugas = 'NURWITANTO P';
			$nip = '';
		}
		elseif($AYAT=='4.1.1.8.0'){
			$namaTBL= 'TBLDAFTTANAH';
			$judul = 'PAJAK AIR TANAH';
			$NAKB = 'NAKB';
			$REKAYAT = '8';
			$petugas = 'EKO HERIYANTO';
			$nip = '196805081992031011';
		}
		elseif($AYAT=='4.1.1.9.0'){
			$namaTBL= 'TBLDAFTBURUNG';
			$judul = 'PAJAK SARANG BURUNG WALET';
			$NAKB = 'NAKB';
			$REKAYAT = '9';
			$petugas = 'JOKO SUNGKONO';
			$nip = '195908081981021007';
		}
		elseif($AYAT=='4.1.1.11.0'){
			$namaTBL= 'TBLDAFTBPHTB';
			$judul = 'PAJAK BPHTB';
			$NAKB = 'NAKB';
			$REKAYAT = '11';
			$petugas = '';
			$nip = '';
		};

		// $KDJLNREK = $_REQUEST['TBLREKENING_KODE'];
		// if($KDJLNREK=='4.1.1.4.0'){
		// 	$KDJLN = "AND ".$namaTBL.".REFJALAN_ID = ".$JALAN."";
		// }
		// else{
		// 	$KDJLN = "";
		// };

		// if($JALAN==''){
		// 	$KDJLN = "";
		// }
		// else{
		// 	$KDJLN = "AND ".$namaTBL.".REFJALAN_ID = ".$JALAN."";
		// };
				if($masapajak==''){
			$wherethnpajak = "";
		}
		else{
			$wherethnpajak = "AND TBLPENDATAAN_THNPAJAK = ".$masapajak."";
		};

		if($bulan==''){
			$whereblnpajak = "";
		}
		else{
			$whereblnpajak = "AND TBLPENDATAAN_BLNPAJAK = ".$bulan."";
		};

		if($TBLKECAMATAN_ID==''){
			$wherekecamatan = "";
		}
		else{
			$wherekecamatan = "AND ".$namaTBL.".TBLKECAMATAN_ID = ".$TBLKECAMATAN_ID."";
		};

		if($cara_penetapan==''){
			$penetapan = "";
		}
		else{
			$penetapan = "AND ".$namaTBL.".ISJNSPENETAPAN = ".$cara_penetapan."";
		};

		$SQLKODE = $_REQUEST['TBLREKENING_KODE'];
		if($SQLKODE=='4.1.1.4.0'){
			$sql= "SELECT
			*
			FROM
			(
				SELECT
				tbldaftar_badanusahanama,
				tbldaftar_badanusahaalamat,
				TBLSETOR.TBLSETOR_RUPIAHSETOR,
				TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK,
				TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK,
				TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK,
				TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE,
				TBLDAFTREKLAME.TBLDAFTAR_GOLONGAN,
				TBLDAFTREKLAME.TBLDAFTAR_NOPOK,
				TBLDAFTREKLAME.TBLKECAMATAN_ID,
				TBLDAFTREKLAME.TBLKELURAHAN_ID,
				TBLDAFTREKLAME.TBLDAFTREKLAME_ISJNSPENETAPAN,
				TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRI,
				TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRI,
				TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRI,
				TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAK,
				TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN2,
				TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN1,
				TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME,
				TBLDAFTREKLAME.TBLDAFTREKLAME_THNBATASSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_BLNBATASSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_TGLBATASSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_NOMORSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_URUTSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAKSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_THNSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSKPD,
				TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRISETOR,
				TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRISETOR,
				TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRISETOR,
				TBLDAFTREKLAME.TBLDAFTREKLAME_REGSETOR,
				TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHSETOR,
				TBLDAFTREKLAME.REFJALAN_ID,
				CONCAT (
					TBLDAFTREKLAME_TGLSPTPD,
					CONCAT (
						'/',
						CONCAT (
							TBLDAFTREKLAME_BLNSPTPD,
							(CONCAT('/20', TBLDAFTREKLAME_THNSPTPD))
							)
				)
				) AS TGLSPT,
				CONCAT (
					TBLDAFTREKLAME_TGLENTRI,
					CONCAT (
						'/',
						CONCAT (
							TBLDAFTREKLAME_BLNENTRI,
							(CONCAT('/20', TBLDAFTREKLAME_THNENTRI))
							)
				)
				) AS Tgl_ENTRY,
				TO_DATE (
					CONCAT (
						TBLDAFTREKLAME_BLNSKPD,
						CONCAT (
							'/',
							CONCAT (TBLDAFTREKLAME_TGLSKPD, CONCAT('/20', TBLDAFTREKLAME_THNSKPD))
							)
				),
				'MM/DD/YY'
				) AS Tanggal_Ketetapan,
				(
					CASE
					WHEN NVL (TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAKSKPD, 0) <> 0 THEN
					'SKPD Sudah Dicetak'
					WHEN NVL (TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHSETOR, 0) <> 0 THEN
					'SKPD Sudah Dicetak'
					END
					) AS status
				FROM
				TBLDAFTREKLAME
				LEFT JOIN TBLSETOR ON TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
				AND TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK
				AND TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK = TBLSETOR.TBLPENDATAAN_TGLPAJAK
				AND TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE = TBLSETOR.TBLPENDATAAN_PAJAKKE
				AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND (
					NVL (TBLSETOR.TBLSETOR_JNSKETETAPAN, '0') = '0'
					OR TBLSETOR.TBLSETOR_JNSKETETAPAN = 'T'
					)
				AND TBLSETOR.TBLSETOR_REKPAJAK = 1
				INNER JOIN TBLDAFTAR ON TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLDAFTAR.tbldaftar_nopok
				)
				WHERE
				NVL (TBLDAFTREKLAME_THNSKPD, 0) <> 0
				AND NVL (TBLDAFTREKLAME_BLNSKPD, 0) <> 0
				AND NVL (TBLDAFTREKLAME_TGLSKPD, 0) <> 0
				AND NVL (TBLDAFTREKLAME_PAJAK, 0) > 0
				AND NVL (TBLDAFTREKLAME_PAJAKSKPD, 0) > 0
				AND NVL (TBLDAFTREKLAME_RUPIAHSETOR, 0) <> 0
				AND TBLPENDATAAN_THNPAJAK = ".$masapajak."
				AND Tanggal_Ketetapan < TO_DATE ('2015-09-26', 'YYYY-MM-DD')";

				$datax['kendali'] =  Yii::app()->db->createCommand($sql)->queryAll();
				}
				
				else{
					$sqllain = "SELECT
					*
					FROM
					(
						SELECT
						TBLDAFTAR.TBLDAFTAR_NOPOK,
						".$namaTBL.".TBLPENDATAAN_THNPAJAK,
						TBLDAFTAR.tbldaftar_badanusahanama,
						TBLDAFTAR.tbldaftar_pemiliknama,
						TBLDAFTAR.tbldaftar_jenispendapatan,
						TBLDAFTAR.tbldaftar_golongan,
						TBLDAFTAR.tblkelurahan_idbadanusaha,
						TBLDAFTAR.tblkecamatan_idbadanusaha,
						TBLDAFTAR.tbldaftar_badanusahaalamat,
						SUM (
							CASE
							WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
							AND TBLPENDATAAN_BLNPAJAK = 1 THEN
							NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
							ELSE
							0
							END
							) AS januari,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 2 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS februari,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 3 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS maret,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 4 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS april,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 5 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS mei,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 6 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS juni,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 7 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS juli,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 8 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS agustus,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 9 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS september,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 10 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS oktober,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 11 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS november,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 12 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS desember,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0) THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS jumlah_pembayaran,
				SUM (
					CASE
					WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) > 0) THEN
					1
					ELSE
					0
					END
					) AS jumlah_skpd
				FROM
				TBLDAFTAR
				INNER JOIN ".$namaTBL." ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
				WHERE
				TBLDAFTAR.tbldaftar_badanusahanama IS NOT NULL
				AND ".$namaTBL."_REKPENDAPATAN = 4
				AND ".$namaTBL."_REKPAD = 1
				AND ".$namaTBL."_REKPAJAK = 1
				AND ".$namaTBL."_REKAYAT = ".$REKAYAT."
				".$wherethnpajak."
				".$whereblnpajak."
				".$penetapan."
				".$wherekecamatan."
				GROUP BY
				".$namaTBL.".TBLPENDATAAN_THNPAJAK,
				TBLDAFTAR.TBLDAFTAR_NOPOK,
				TBLDAFTAR.tbldaftar_badanusahanama,
				TBLDAFTAR.tbldaftar_pemiliknama,
				TBLDAFTAR.tbldaftar_jenispendapatan,
				TBLDAFTAR.tbldaftar_golongan,
				TBLDAFTAR.TBLDAFTAR_NOPOK,
				TBLDAFTAR.tblkelurahan_idbadanusaha,
				TBLDAFTAR.tblkecamatan_idbadanusaha,
				TBLDAFTAR.tbldaftar_badanusahaalamat
				)
				ORDER BY
				tblkecamatan_idbadanusaha,
				tblkelurahan_idbadanusaha,
				TBLDAFTAR_NOPOK";

				$datax['kendali'] = Yii::app()->db->createCommand($sqllain)->queryAll();
			};

			$data = array();
			$rows = array();

			$no = 1;

			$tanggalsurat = date('d') . ' ' . LokalIndonesia::getBulan(date('m')) . ' ' . date('Y');
			$GLOBALS['datenow'] = $tanggalsurat;
			$GLOBALS['jenispajak'] = $judul;
			$GLOBALS['petugas'] = $petugas;
			$GLOBALS['nip'] = $nip;
			foreach ($datax['kendali'] as $kolom) :
				$NPWPD = $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$kolom['TBLKECAMATAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$kolom['TBLKELURAHAN_IDBADANUSAHA']));

				$data['no'] = $no++;
				$data['nopok'] = $NPWPD;
				$data['namawp'] = trim($kolom['TBLDAFTAR_BADANUSAHANAMA']);
				$data['alamat'] = trim($kolom['TBLDAFTAR_BADANUSAHAALAMAT']);
				$data['rpset1'] = LokalIndonesia::ribuan($kolom['JANUARI']);
				$data['rpset2'] = LokalIndonesia::ribuan($kolom['FEBRUARI']);
				$data['rpset3'] = LokalIndonesia::ribuan($kolom['MARET']);
				$data['rpset4'] = LokalIndonesia::ribuan($kolom['APRIL']);
				$data['rpset5'] = LokalIndonesia::ribuan($kolom['MEI']);
				$data['rpset6'] = LokalIndonesia::ribuan($kolom['JUNI']);
				$data['rpset7'] = LokalIndonesia::ribuan($kolom['JULI']);
				$data['rpset8'] = LokalIndonesia::ribuan($kolom['AGUSTUS']);
				$data['rpset9'] = LokalIndonesia::ribuan($kolom['SEPTEMBER']);
				$data['rpset10'] = LokalIndonesia::ribuan($kolom['OKTOBER']);
				$data['rpset11'] = LokalIndonesia::ribuan($kolom['NOVEMBER']);
				$data['rpset12'] = LokalIndonesia::ribuan($kolom['DESEMBER']);
				$data['rpsetor'] = LokalIndonesia::ribuan($kolom['JUMLAH_PEMBAYARAN']);

				array_push($rows, $data);
			endforeach;

			$header=array();
			$header['datenow'] = $tanggalsurat;

			$otbs->MergeBlock('data', $rows); 
			$otbs->MergeField('header', $header); 
					// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

			$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
			Yii::app()->end();

}
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
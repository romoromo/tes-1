<?php

class Daftar_piutang_airtanahController extends Controller
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
			AND TBLREKENING_REKAYAT = 8
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
			case '4.1.1.8.0':
			$namaTBL = 'TBLDAFTTANAH';
			$AYAT = '8';
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
		$tahuntap = substr($_REQUEST['tahuntap'], -2) ? substr($_REQUEST['tahuntap'], -2) : '' ;
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '' ;
		$bulantap = $_REQUEST['bulantap'] ? $_REQUEST['bulantap'] : '' ;
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '' ;
		$TBLKECAMATAN_ID = $_REQUEST['TBLKECAMATAN_ID'] ? $_REQUEST['TBLKECAMATAN_ID'] : '' ;
		// $JALAN = $_REQUEST['JALAN'] ? $_REQUEST['JALAN'] : '' ;
		$cara_penetapan = $_REQUEST['cara_penetapan'] ? $_REQUEST['cara_penetapan'] : '' ;
		$cutoff = trim($_REQUEST['cutoff'])!='' ? date('Y-m-d', strtotime($_REQUEST['cutoff']) ) : "";
		$explode = explode('-',$cutoff);
		$tglc =$explode[2];
		$blnc =$explode[1];
		$tahunc = substr($explode[0], -2);

		$AYAT = $_REQUEST['TBLREKENING_KODE'];
		
		if($AYAT=='4.1.1.8.0'){
			$namaTBL= 'TBLDAFTTANAH';
			$judul = 'PAJAK AIR TANAH';
			$NAKB = 'NAKB';
			$REKAYAT = '8';
			// $petugas = 'EKO HERIYANTO, S.Pd.';
			// $nip = 'NIP. 196805081992031011';
			$jab_id = '22';
		}

		$KDJLNREK = $_REQUEST['TBLREKENING_KODE'];
		if($KDJLNREK=='4.1.1.4.0'){
			$KDJLN = "AND ".$namaTBL.".REFJALAN_ID = ".$JALAN."";
		}
		else{
			$KDJLN = "";
		};

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

		if($tahuntap==''){
			$wherethntap = "";
		}
		else{
			$wherethntap = "AND ".$namaTBL."_THNSKPD = ".$tahuntap."";
		};

		if($bulan==''){
			$whereblnpajak = "";
		}
		else{
			$whereblnpajak = "AND TBLPENDATAAN_BLNPAJAK = ".$bulan."";
		};

		if($bulantap==''){
			$whereblntap = "";
		}
		else{
			$whereblntap = "AND ".$namaTBL."_BLNSKPD = ".$bulantap."";
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
				AND
				TO_DATE ( NVL(".$namaTBL.".".$namaTBL."_TAHUNSETOR,2000) || '/' || NVL(".$namaTBL.".".$namaTBL."_BULANSETOR,1)  || '/' || NVL(".$namaTBL.".".$namaTBL."_TANGGALSETOR,1),  'YY/MM/DD')  
				< TO_DATE('$cutoff', 'YYYY-MM-DD')
				";
			}
		};

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
					WHEN TBLPENDATAAN_BLNPAJAK = 1 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdjan,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 1  ".$cutoff." THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrjan,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 1
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdjan,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 1 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0  ".$cutoff."
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrjan,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 2 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdfeb,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 2  ".$cutoff." THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrfeb,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 2 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdfeb,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 2 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0 ".$cutoff." 
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrfeb,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 3 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdmar,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 3 ".$cutoff." THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrmar,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 3 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdmar,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 3 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0 ".$cutoff." 
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrmar,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 4 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdapr,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 4  ".$cutoff." THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrapr,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 4 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdapr,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 4 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0 ".$cutoff." 
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrapr,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 5 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdmei,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 5  ".$cutoff." THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrmei,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 5 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdmei,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 5 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0 ".$cutoff." 
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrmei,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 6 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdjun,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 6  ".$cutoff." THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrjun,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 6 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdjun,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 6 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0 ".$cutoff." 
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrjun,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 7 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdjul,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 7  ".$cutoff." THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrjul,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 7 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdjul,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 7 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0 ".$cutoff." 
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrjul,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 8 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdagt,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 8  ".$cutoff." THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byragt,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 8 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdagt,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 8 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0 ".$cutoff." 
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyragt,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 9 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdsep,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 9  ".$cutoff." THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrsep,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 9 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdsep,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 9 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0 ".$cutoff." 
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrsep,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 10 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdokt,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 10  ".$cutoff." THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrokt,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 10 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdokt,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 10 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0 ".$cutoff." 
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrokt,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 11 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdnov,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 11 ".$cutoff." THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrnov,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 11 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdnov,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 11 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0 ".$cutoff." 
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrnov,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 12 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpddes,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 12  ".$cutoff." THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrdes,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 12 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpddes,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 12 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0 ".$cutoff." 
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrdes
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
				".$wherethntap."
				".$whereblnpajak."
				".$whereblntap."
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
				TBLDAFTAR_NOPOK
				
				";

				$data['kendali'] = $kendali = Yii::app()->db->createCommand($sqllain)->queryAll();
				
				// AND ".$namaTBL.".KDJLN = '40559'
				$data['judul'] = $judul;

				$sql3="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 7";	
				$sql4="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 30";	

				$data['jab3'] = Yii::app()->db->createCommand($sql3)->queryRow();
				$data['jab4'] = Yii::app()->db->createCommand($sql4)->queryRow();

				header('Content-Type: application/excel');
				header("Content-Disposition: attachment;Filename=Daftar Ketetapan dan Tunggakan SKPD Airtanah.xls");

				$this->renderPartial('cetak', array('data'=>$data));
}

	public function actionCetakpiutang()
	{

		$masapajak = substr($_REQUEST['masapajak'], -2) ? substr($_REQUEST['masapajak'], -2) : '' ;
		$tahuntap = substr($_REQUEST['tahuntap'], -2) ? substr($_REQUEST['tahuntap'], -2) : '' ;
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '' ;
		$bulantap = $_REQUEST['bulantap'] ? $_REQUEST['bulantap'] : '' ;
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '' ;
		$TBLKECAMATAN_ID = $_REQUEST['TBLKECAMATAN_ID'] ? $_REQUEST['TBLKECAMATAN_ID'] : '' ;
		// $JALAN = $_REQUEST['JALAN'] ? $_REQUEST['JALAN'] : '' ;
		$cara_penetapan = $_REQUEST['cara_penetapan'] ? $_REQUEST['cara_penetapan'] : '' ;
		$cutoff = trim($_REQUEST['cutoff'])!='' ? date('Y-m-d', strtotime($_REQUEST['cutoff']) ) : "";
		// $explode = explode('-',$cutoff);
		// $tglc =$explode[2];
		// $blnc =$explode[1];
		// $tahunc = substr($explode[0], -2);

		$AYAT = $_REQUEST['TBLREKENING_KODE'];
		
		if($AYAT=='4.1.1.8.0'){
			$namaTBL= 'TBLDAFTTANAH';
			$judul = 'PAJAK AIR TANAH';
			$NAKB = 'NAKB';
			$REKAYAT = '8';
			// $petugas = 'EKO HERIYANTO, S.Pd.';
			// $nip = 'NIP. 196805081992031011';
			$jab_id = '22';
		}

		$KDJLNREK = $_REQUEST['TBLREKENING_KODE'];
		if($KDJLNREK=='4.1.1.4.0'){
			$KDJLN = "AND ".$namaTBL.".REFJALAN_ID = ".$JALAN."";
		}
		else{
			$KDJLN = "";
		};

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

		if($tahuntap==''){
			$wherethntap = "";
		}
		else{
			$wherethntap = "AND ".$namaTBL."_THNSKPD = ".$tahuntap."";
		};

		if($bulan==''){
			$whereblnpajak = "";
		}
		else{
			$whereblnpajak = "AND TBLPENDATAAN_BLNPAJAK = ".$bulan."";
		};

		if($bulantap==''){
			$whereblntap = "";
		}
		else{
			$whereblntap = "AND ".$namaTBL."_BLNSKPD = ".$bulantap."";
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
				AND
				TO_DATE ( NVL(".$namaTBL.".".$namaTBL."_TAHUNSETOR,2000) || '/' || NVL(".$namaTBL.".".$namaTBL."_BULANSETOR,1)  || '/' || NVL(".$namaTBL.".".$namaTBL."_TANGGALSETOR,1),  'YY/MM/DD')
				< TO_DATE('$cutoff', 'YYYY-MM-DD')
				";
			}
		};

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
					COUNT (CASE WHEN NVL(".$namaTBL."_TANGGALSETOR, 0) = 0 THEN TBLDAFTAR.TBLDAFTAR_NOPOK ELSE 0 END) AS jmltunggakan,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 1 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdjan,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 1 THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrjan,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 1 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdjan,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 1 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrjan,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 2 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdfeb,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 2 THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrfeb,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 2 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdfeb,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 2 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrfeb,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 3 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdmar,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 3 THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrmar,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 3 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdmar,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 3 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrmar,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 4 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdapr,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 4 THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrapr,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 4 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdapr,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 4 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrapr,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 5 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdmei,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 5 THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrmei,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 5 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdmei,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 5 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrmei,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 6 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdjun,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 6 THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrjun,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 6 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdjun,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 6 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrjun,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 7 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdjul,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 7 THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrjul,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 7 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdjul,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 7 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrjul,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 8 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdagt,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 8 THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byragt,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 8 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdagt,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 8 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyragt,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 9 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdsep,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 9 THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrsep,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 9 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdsep,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 9 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrsep,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 10 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdokt,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 10 THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrokt,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 10 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdokt,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 10 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrokt,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 11 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpdnov,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 11 THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrnov,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 11 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpdnov,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 11 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrnov,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 12 THEN
					NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS skpddes,
					SUM (
					CASE
					WHEN TBLPENDATAAN_BLNPAJAK = 12 THEN
					NVL (".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0)
					ELSE
					0
					END
					) AS byrdes,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 12 
					THEN NVL(".$namaTBL."_TGLSKPD, '') ||'/' || NVL(".$namaTBL."_BLNSKPD, '') ||'/' || NVL(".$namaTBL."_THNSKPD, '')
					ELSE 
					NULL
					END
					) AS tglskpddes,
					WM_CONCAT (
					CASE WHEN TBLPENDATAAN_BLNPAJAK = 12 AND NVL(".$namaTBL."_TANGGALSETOR, 0) <> 0
					THEN NVL(".$namaTBL."_TANGGALSETOR, 0) ||'/' || NVL(".$namaTBL."_BULANSETOR, 0) ||'/' || NVL(".$namaTBL."_TAHUNSETOR, 0)
					ELSE 
					NULL
					END
					) AS tglbyrdes
				FROM
				TBLDAFTAR
				INNER JOIN ".$namaTBL." ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
				WHERE
				TBLDAFTAR.TBLDAFTAR_NOPOK <> 150000
				AND TBLDAFTAR.TBLDAFTAR_NOPOK <> 151000
				AND TBLDAFTAR.TBLDAFTAR_NOPOK <> 1500000
				AND NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) = 0
				AND ".$namaTBL."_REKPENDAPATAN = 4
				AND ".$namaTBL."_REKPAD = 1
				AND ".$namaTBL."_REKPAJAK = 1
				AND ".$namaTBL."_REKAYAT = ".$REKAYAT."
				".$wherethnpajak."
				".$wherethntap."
				".$whereblnpajak."
				".$whereblntap."
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
				
				// AND ".$namaTBL.".KDJLN = '40559'
				$data['judul'] = $judul;

				$sql3="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 7";	
				$sql4="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 30";	

				$data['jab3'] = Yii::app()->db->createCommand($sql3)->queryRow();
				$data['jab4'] = Yii::app()->db->createCommand($sql4)->queryRow();

				header('Content-Type: application/excel');
				header("Content-Disposition: attachment;Filename=Daftar Tunggakan SKPD Airtanah.xls");

				$this->renderPartial('cetakpiutang', array('data'=>$data));
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
<?php

class Skpdkb_daftarController extends Controller
{
	public function actionIndex()
	{
		$data['rek'] = Yii::app()->db->createCommand('
			SELECT
			*
			FROM
			TBLREKENING
			WHERE
			TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			AND TBLREKENING_REKAYAT <> 4
			AND TBLREKENING_REKAYAT <> 5
			AND TBLREKENING_REKAYAT <> 9
			AND TBLREKENING_REKAYAT <> 10
			AND TBLREKENING_REKAYAT <> 11
			AND TBLREKENING_REKAYAT <> 23
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			')->queryAll();
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionCetak()
	{
		$TBLREKENING_KODE = isset($_REQUEST['TBLREKENING_KODE']) && !empty($_REQUEST['TBLREKENING_KODE']) ? $_REQUEST['TBLREKENING_KODE'] : '';
		$TBLPENDATAAN_THNPAJAK = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
		$THNKURANGBAYAR = isset($_REQUEST['THNKURANGBAYAR']) && !empty($_REQUEST['THNKURANGBAYAR']) ? $_REQUEST['THNKURANGBAYAR'] : '';
		$BLNKURANGBAYAR = isset($_REQUEST['BLNKURANGBAYAR']) && !empty($_REQUEST['BLNKURANGBAYAR']) ? $_REQUEST['BLNKURANGBAYAR'] : '';
		$TGLKURANGBAYAR = isset($_REQUEST['TGLKURANGBAYAR']) && !empty($_REQUEST['TGLKURANGBAYAR']) ? $_REQUEST['TGLKURANGBAYAR'] : '';
		$TGLCETAK = trim($_REQUEST['TGLCETAK'])!='' ? date('Y-m-d', strtotime($_REQUEST['TGLCETAK']) ) : "";
		$explode = explode('-',$TGLCETAK);
		$tgla =$explode[2];
		$blna =$explode[1];
		$tahuna = substr($explode[0], -2);

		/*$TBLREKENING_KODE = !empty(DMOrcl::getRequest('TBLREKENING_KODE')) ? DMOrcl::getRequest('TBLREKENING_KODE') : '';
		$TBLPENDATAAN_THNPAJAK = !empty(DMOrcl::getRequest('TBLPENDATAAN_THNPAJAK')) ? DMOrcl::getRequest('TBLPENDATAAN_THNPAJAK') : '';
		
		$THNKURANGBAYAR = !empty(DMOrcl::getRequest('THNKURANGBAYAR')) ? DMOrcl::getRequest('THNKURANGBAYAR') : '';
		$BLNKURANGBAYAR = !empty(DMOrcl::getRequest('BLNKURANGBAYAR')) ? DMOrcl::getRequest('BLNKURANGBAYAR') : '';
		$TGLKURANGBAYAR = !empty(DMOrcl::getRequest('TGLKURANGBAYAR')) ? DMOrcl::getRequest('TGLKURANGBAYAR') : '';*/

		if ($TBLREKENING_KODE=='4.1.1.1.0') {
			$NAMATABEL = 'TBLDAFTHOTEL';
			$NAMAPAJAK = 'PAJAK HOTEL';
			$NAKB = 'KENAIKANKRGBAYAR';
		} else if ($TBLREKENING_KODE=='4.1.1.2.0') {
			$NAMATABEL = 'TBLDAFTRMAKAN';
			$NAMAPAJAK = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
		} else if ($TBLREKENING_KODE=='4.1.1.3.0') {
			$NAMATABEL = 'TBLDAFTHIBURAN';
			$NAMAPAJAK = 'PAJAK HIBURAN';
			$NAKB = 'NAKB';
		} else if ($TBLREKENING_KODE=='4.1.1.4.0') {
			$NAMATABEL = 'TBLDAFTREKLAME';
			$NAMAPAJAK = 'PAJAK REKLAME';
			$NAKB = 'NAKB';
		} else if ($TBLREKENING_KODE=='4.1.1.7.0') {
			$NAMATABEL = 'TBLDAFTPARKIR';
			$NAMAPAJAK = 'PAJAK PARKIR';
			$NAKB = 'NAKB';
		} else if ($TBLREKENING_KODE=='4.1.1.8.0') {
			$NAMATABEL = 'TBLDAFTTANAH';
			$NAMAPAJAK = 'PAJAK AIR TANAH';
			$NAKB = 'NAKB';
		} else if ($TBLREKENING_KODE=='4.1.1.9.0') {
			$NAMATABEL = 'TBLDAFTBURUNG';
			$NAMAPAJAK = 'PAJAK SARANG WALET';
			$NAKB = 'NAKB';
		} else {

		}
		if($TBLPENDATAAN_THNPAJAK==''){
			$tahunpjk = "";
		}
		else{
			$tahunpjk = "AND ".$NAMATABEL.".TBLPENDATAAN_THNPAJAK = ".$TBLPENDATAAN_THNPAJAK."";
		};

		if($THNKURANGBAYAR==''){
			$tahunkrgbyr = "AND ".$NAMATABEL."_THNKURANGBAYAR = ".$tahuna."";
		}
		else{
			$tahunkrgbyr = "AND ".$NAMATABEL."_THNKURANGBAYAR = ".$THNKURANGBAYAR."";
		};

		if($BLNKURANGBAYAR==''){
			if($blna=='') {
				$bulankrgbyr = "";
			}
			else{
				$bulankrgbyr = "AND ".$NAMATABEL."_BLNKURANGBAYAR = ".$blna."";	
			};
		}
		else{
			$bulankrgbyr = "AND ".$NAMATABEL."_BLNKURANGBAYAR = ".$BLNKURANGBAYAR."";
		};

		if($TGLKURANGBAYAR==''){
			if($tgla=='') {
				$tanggalkrgbyr = "";
			}
			else{	
				$tanggalkrgbyr = "AND ".$NAMATABEL."_TGLKURANGBAYAR = ".$tgla."";
			};

		}
		else{
			$tanggalkrgbyr = "AND ".$NAMATABEL."_TGLKURANGBAYAR = ".$TGLKURANGBAYAR."";
		};

		$jenisbayar = "'SKPDKB'";

		$sql ="
		SELECT
		(
		SELECT
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NAMATABEL.".TBLDAFTAR_NOPOK
		) AS TBLDAFTAR_BADANUSAHANAMA,
		(
		SELECT
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NAMATABEL.".TBLDAFTAR_NOPOK
		) AS TBLDAFTAR_BADANUSAHAALAMAT,
		(
		SELECT
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NAMATABEL.".TBLDAFTAR_NOPOK
		) AS TBLKECAMATAN_IDBADANUSAHA,
		(
		SELECT
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NAMATABEL.".TBLDAFTAR_NOPOK
		) AS TBLKELURAHAN_IDBADANUSAHA,
		".$NAMATABEL.".TBLDAFTAR_NOPOK,
		".$NAMATABEL.".TBLDAFTAR_GOLONGAN,
		".$NAMATABEL.".TBLDAFTAR_JNSPENDAPATAN AS TBLDAFTAR_JENISPENDAPATAN,
		".$NAMATABEL.".TBLPENDATAAN_THNPAJAK,
		".$NAMATABEL.".TBLPENDATAAN_BLNPAJAK,
		".$NAMATABEL.".TBLPENDATAAN_TGLPAJAK,
		".$NAMATABEL.".".$NAMATABEL."_THNKURANGBAYAR,
		".$NAMATABEL.".".$NAMATABEL."_TGLKURANGBAYAR,
		".$NAMATABEL.".".$NAMATABEL."_BLNKURANGBAYAR,
		".$NAMATABEL.".".$NAMATABEL."_BLNBTSKRGBAYAR,
		".$NAMATABEL.".".$NAMATABEL."_TGLBTSKRGBAYAR,
		".$NAMATABEL.".".$NAMATABEL."_RUPIAHSETOR,
		NVL(".$NAMATABEL.".".$NAMATABEL."_REGKURANGBAYAR, 0) AS ".$NAMATABEL."_REGKURANGBAYAR,
		NVL(".$NAMATABEL.".".$NAMATABEL."_PAJAKPERIKSA, 0) AS ".$NAMATABEL."_PAJAKPERIKSA,
		NVL(".$NAMATABEL.".".$NAMATABEL."_DENDAKRGBAYAR, 0) AS ".$NAMATABEL."_DENDAKRGBAYAR,
		NVL(".$NAMATABEL.".".$NAMATABEL."_".$NAKB.", 0) AS KENAIKANKRGBAYAR,
		NVL(".$NAMATABEL.".".$NAMATABEL."_BUNGAKRGBAYAR, 0) AS ".$NAMATABEL."_BUNGAKRGBAYAR,
		NVL(".$NAMATABEL.".".$NAMATABEL."_RUPIAHKRGBAYAR, 0) AS ".$NAMATABEL."_RUPIAHKRGBAYAR,
		TBLSETORANBPD.TBLSETORANBPD_JNSKETETAPAN,
		CASE WHEN TBLSETORANBPD.TBLSETORANBPD_JNSBAYAR = ".$jenisbayar."
		THEN NVL (TBLSETORANBPD.TBLSETORANBPD_PAJAKKURANGBAYAR, 0) ELSE 0 END AS TBLSETORANBPD_RUPIAHSETOR
		FROM
			".$NAMATABEL."
		LEFT JOIN TBLSETORANBPD ON TBLSETORANBPD.TBLDAFTAR_NOPOK = ".$NAMATABEL.".TBLDAFTAR_NOPOK
		AND ".$NAMATABEL.".TBLPENDATAAN_THNPAJAK=TBLSETORANBPD.TBLPENDATAAN_THNPAJAK
		AND ".$NAMATABEL.".TBLPENDATAAN_BLNPAJAK=TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK
		AND NVL(".$NAMATABEL.".TBLPENDATAAN_TGLPAJAK, 0)=NVL(TBLSETORANBPD.TBLPENDATAAN_TGLPAJAK, 0)
		AND NVL(TBLSETORANBPD.TBLSETORANBPD_JNSBAYAR, 0) = ".$jenisbayar."
		WHERE
		NVL (".$NAMATABEL."_REGKURANGBAYAR, 0) > 0
		".$tahunpjk."
		".$tahunkrgbyr."
		".$bulankrgbyr."
		".$tanggalkrgbyr."
		
		ORDER BY
			TO_NUMBER (TO_CHAR(NVL(".$NAMATABEL."_REGKURANGBAYAR, 0)))
		";

		/*$select = "TBLDAFTAR.*, ".$NAMATABEL.".*";

        $from = "TBLDAFTAR";

        $otherquery = array(
             'join_'.$NAMATABEL.''=>array($NAMATABEL,'TBLDAFTAR.TBLDAFTAR_NOPOK = '.$NAMATABEL.'.TBLDAFTAR_NOPOK')
             ,'order'=> 'TO_NUMBER (TO_CHAR(NVL('.$NAMATABEL.'_REGKURANGBAYAR, 0)))'
             //'leftjoin_REFBADANUSAHA'=>array('TBLDAFTAR','TBLDAFTAR.REFBADANUSAHA_IDPEMILIK=REFBADANUSAHA.REFBADANUSAHA_ID')
        );

        $filter = array(
            'EQ__'.$NAMATABEL.'_THNKURANGBAYAR' => $THNKURANGBAYAR
			,'EQ__'.$NAMATABEL.'_BLNKURANGBAYAR' => $BLNKURANGBAYAR
			,'EQ__'.$NAMATABEL.'_TGLKURANGBAYAR' => $TGLKURANGBAYAR
			,'EQ__TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
        $data['cetak'] = DBFetch::query($arrayConfig);*/
        $data['cetak'] = Yii::app()->db->createCommand( $sql )->queryAll();
        $data['namatabel'] = $NAMATABEL;
        $data['namapajak'] = $NAMAPAJAK;
        $data['thnpndataanpajak'] = $TBLPENDATAAN_THNPAJAK;
		// echo $sql;exit;

		// $data['rek'] = Yii::app()->db->createCommand( $sql )->queryAll();
		// header('Content-Type: application/excel');
		// header("Content-Disposition: attachment;Filename=Cetak_Daftar_SKPDKB.xls");

		// $this->renderPartial('cetak-daftar-skpdkb', array('data'=>$data));
		$this->renderPartial('cetak-daftar-skpdkb_new', array('data'=>$data));
	}

	public function actionCetakWord()
	{
		$TBLREKENING_KODE = isset($_REQUEST['TBLREKENING_KODE']) && !empty($_REQUEST['TBLREKENING_KODE']) ? $_REQUEST['TBLREKENING_KODE'] : '';
		$TBLPENDATAAN_THNPAJAK = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2): '';
		$THNKURANGBAYAR = isset($_REQUEST['THNKURANGBAYAR']) && !empty($_REQUEST['THNKURANGBAYAR']) ? $_REQUEST['THNKURANGBAYAR'] : '';
		$BLNKURANGBAYAR = isset($_REQUEST['BLNKURANGBAYAR']) && !empty($_REQUEST['BLNKURANGBAYAR']) ? $_REQUEST['BLNKURANGBAYAR'] : '';
		$TGLKURANGBAYAR = isset($_REQUEST['TGLKURANGBAYAR']) && !empty($_REQUEST['TGLKURANGBAYAR']) ? $_REQUEST['TGLKURANGBAYAR'] : '';
		$TGLCETAK = trim($_REQUEST['TGLCETAK'])!='' ? date('Y-m-d', strtotime($_REQUEST['TGLCETAK']) ) : "";
		$explode = explode('-',$TGLCETAK);
		$tgla =$explode[2];
		$blna =$explode[1];
		$tahuna = substr($explode[0], -2);

		/*$TBLREKENING_KODE = !empty(DMOrcl::getRequest('TBLREKENING_KODE')) ? DMOrcl::getRequest('TBLREKENING_KODE') : '';
		$TBLPENDATAAN_THNPAJAK = !empty(DMOrcl::getRequest('TBLPENDATAAN_THNPAJAK')) ? DMOrcl::getRequest('TBLPENDATAAN_THNPAJAK') : '';
		
		$THNKURANGBAYAR = !empty(DMOrcl::getRequest('THNKURANGBAYAR')) ? DMOrcl::getRequest('THNKURANGBAYAR') : '';
		$BLNKURANGBAYAR = !empty(DMOrcl::getRequest('BLNKURANGBAYAR')) ? DMOrcl::getRequest('BLNKURANGBAYAR') : '';
		$TGLKURANGBAYAR = !empty(DMOrcl::getRequest('TGLKURANGBAYAR')) ? DMOrcl::getRequest('TGLKURANGBAYAR') : '';*/

		if ($TBLREKENING_KODE=='4.1.1.1.0') {
			$NAMATABEL = 'TBLDAFTHOTEL';
			$NAMAPAJAK = 'PAJAK HOTEL';
			$NAKB = 'KENAIKANKRGBAYAR';
		} else if ($TBLREKENING_KODE=='4.1.1.2.0') {
			$NAMATABEL = 'TBLDAFTRMAKAN';
			$NAMAPAJAK = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
		} else if ($TBLREKENING_KODE=='4.1.1.3.0') {
			$NAMATABEL = 'TBLDAFTHIBURAN';
			$NAMAPAJAK = 'PAJAK HIBURAN';
			$NAKB = 'NAKB';
		} else if ($TBLREKENING_KODE=='4.1.1.4.0') {
			$NAMATABEL = 'TBLDAFTREKLAME';
			$NAMAPAJAK = 'PAJAK REKLAME';
			$NAKB = 'NAKB';
		} else if ($TBLREKENING_KODE=='4.1.1.7.0') {
			$NAMATABEL = 'TBLDAFTPARKIR';
			$NAMAPAJAK = 'PAJAK PARKIR';
			$NAKB = 'NAKB';
		} else if ($TBLREKENING_KODE=='4.1.1.8.0') {
			$NAMATABEL = 'TBLDAFTTANAH';
			$NAMAPAJAK = 'PAJAK AIR TANAH';
			$NAKB = 'NAKB';
		} else if ($TBLREKENING_KODE=='4.1.1.9.0') {
			$NAMATABEL = 'TBLDAFTBURUNG';
			$NAMAPAJAK = 'PAJAK SARANG WALET';
			$NAKB = 'NAKB';
		} else {

		}

		if($TBLPENDATAAN_THNPAJAK==''){
			$tahunpjk = "";

		}
		else{
			$tahunpjk = "AND ".$NAMATABEL.".TBLPENDATAAN_THNPAJAK = ".$TBLPENDATAAN_THNPAJAK."";
		};

		if($THNKURANGBAYAR==''){
			$tahunkrgbyr = "AND ".$NAMATABEL."_THNKURANGBAYAR = ".$tahuna."";

		}
		else{
			$tahunkrgbyr = "AND ".$NAMATABEL."_THNKURANGBAYAR = ".$THNKURANGBAYAR."";
		};

		if($BLNKURANGBAYAR==''){
			$bulankrgbyr = "AND ".$NAMATABEL."_BLNKURANGBAYAR = ".$blna."";

		}
		else{
			$bulankrgbyr = "AND ".$NAMATABEL."_BLNKURANGBAYAR = ".$BLNKURANGBAYAR."";
		};

		if($TGLKURANGBAYAR==''){
			$tanggalkrgbyr = "AND ".$NAMATABEL."_TGLKURANGBAYAR = ".$tgla."";

		}
		else{
			$tanggalkrgbyr = "AND ".$NAMATABEL."_TGLKURANGBAYAR = ".$TGLKURANGBAYAR."";
		};

		$jenisbayar = "'SKPDKB'";

		$sql ="
		SELECT
		(
		SELECT
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NAMATABEL.".TBLDAFTAR_NOPOK
		) AS TBLDAFTAR_BADANUSAHANAMA,
		(
		SELECT
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NAMATABEL.".TBLDAFTAR_NOPOK
		) AS TBLDAFTAR_BADANUSAHAALAMAT,
		(
		SELECT
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NAMATABEL.".TBLDAFTAR_NOPOK
		) AS TBLKECAMATAN_IDBADANUSAHA,
		(
		SELECT
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NAMATABEL.".TBLDAFTAR_NOPOK
		) AS TBLKELURAHAN_IDBADANUSAHA,
		".$NAMATABEL.".TBLDAFTAR_NOPOK,
		".$NAMATABEL.".TBLDAFTAR_GOLONGAN,
		".$NAMATABEL.".TBLDAFTAR_JNSPENDAPATAN AS TBLDAFTAR_JENISPENDAPATAN,
		".$NAMATABEL.".TBLPENDATAAN_THNPAJAK,
		".$NAMATABEL.".TBLPENDATAAN_BLNPAJAK,
		".$NAMATABEL.".TBLPENDATAAN_TGLPAJAK,
		".$NAMATABEL.".".$NAMATABEL."_THNKURANGBAYAR,
		".$NAMATABEL.".".$NAMATABEL."_TGLKURANGBAYAR,
		".$NAMATABEL.".".$NAMATABEL."_BLNKURANGBAYAR,
		".$NAMATABEL.".".$NAMATABEL."_BLNBTSKRGBAYAR,
		".$NAMATABEL.".".$NAMATABEL."_TGLBTSKRGBAYAR,
		NVL(".$NAMATABEL.".".$NAMATABEL."_REGKURANGBAYAR, 0) AS ".$NAMATABEL."_REGKURANGBAYAR,
		NVL(".$NAMATABEL.".".$NAMATABEL."_PAJAKPERIKSA, 0) AS ".$NAMATABEL."_PAJAKPERIKSA,
		NVL(".$NAMATABEL.".".$NAMATABEL."_DENDAKRGBAYAR, 0) AS ".$NAMATABEL."_DENDAKRGBAYAR,
		NVL(".$NAMATABEL.".".$NAMATABEL."_".$NAKB.", 0) AS KENAIKANKRGBAYAR,
		NVL(".$NAMATABEL.".".$NAMATABEL."_BUNGAKRGBAYAR, 0) AS ".$NAMATABEL."_BUNGAKRGBAYAR,
		NVL(".$NAMATABEL.".".$NAMATABEL."_RUPIAHKRGBAYAR, 0) AS ".$NAMATABEL."_RUPIAHKRGBAYAR,
		TBLSETORANBPD.TBLSETORANBPD_JNSKETETAPAN,
		TBLSETORANBPD.TBLSETORANBPD_PAJAKKURANGBAYAR,
		CASE WHEN TBLSETORANBPD.TBLSETORANBPD_JNSBAYAR = ".$jenisbayar."
		THEN NVL (TBLSETORANBPD.TBLSETORANBPD_PAJAKKURANGBAYAR, 0) ELSE 0 END AS TBLSETORANBPD_RUPIAHSETOR,
		(NVL (
		".$NAMATABEL.".".$NAMATABEL."_RUPIAHKRGBAYAR,
		0
		) - (CASE
		WHEN TBLSETORANBPD.TBLSETORANBPD_JNSBAYAR = 'SKPDKB' THEN
		NVL (
		TBLSETORANBPD.TBLSETORANBPD_PAJAKKURANGBAYAR,
		0
		)
		ELSE
		0
		END)) AS JML
		FROM
			".$NAMATABEL."
		LEFT JOIN TBLSETORANBPD ON TBLSETORANBPD.TBLDAFTAR_NOPOK = ".$NAMATABEL.".TBLDAFTAR_NOPOK
		AND ".$NAMATABEL.".TBLPENDATAAN_THNPAJAK=TBLSETORANBPD.TBLPENDATAAN_THNPAJAK
		AND ".$NAMATABEL.".TBLPENDATAAN_BLNPAJAK=TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK
		AND NVL(".$NAMATABEL.".TBLPENDATAAN_TGLPAJAK, 0)=NVL(TBLSETORANBPD.TBLPENDATAAN_TGLPAJAK, 0)
		AND NVL(TBLSETORANBPD.TBLSETORANBPD_JNSBAYAR, 0) = ".$jenisbayar."
		WHERE
		NVL (".$NAMATABEL."_REGKURANGBAYAR, 0) > 0
		".$tahunpjk."
		".$tahunkrgbyr."
		".$bulankrgbyr."
		".$tanggalkrgbyr."
		
		ORDER BY
			TO_NUMBER (TO_CHAR(NVL(".$NAMATABEL."_REGKURANGBAYAR, 0)))
		";

		/*$select = "TBLDAFTAR.*
		,".$NAMATABEL.".TBLDAFTAR_NOPOK
		,".$NAMATABEL.".TBLPENDATAAN_THNPAJAK
		,".$NAMATABEL.".TBLPENDATAAN_BLNPAJAK
		,".$NAMATABEL.".TBLPENDATAAN_TGLPAJAK
		,".$NAMATABEL.".".$NAMATABEL."_TGLKURANGBAYAR
		,".$NAMATABEL.".".$NAMATABEL."_BLNKURANGBAYAR
		,".$NAMATABEL.".".$NAMATABEL."_THNKURANGBAYAR
		,NVL(".$NAMATABEL.".".$NAMATABEL."_REGKURANGBAYAR,0) AS ".$NAMATABEL."_REGKURANGBAYAR 
		,NVL(".$NAMATABEL.".".$NAMATABEL."_PAJAKPERIKSA,0) AS ".$NAMATABEL."_PAJAKPERIKSA 
		,NVL(".$NAMATABEL.".".$NAMATABEL."_DENDAKRGBAYAR,0) AS ".$NAMATABEL."_DENDAKRGBAYAR 
		,NVL(".$NAMATABEL.".".$NAMATABEL."_BUNGAKRGBAYAR,0) AS ".$NAMATABEL."_BUNGAKRGBAYAR
		,NVL(".$NAMATABEL.".".$NAMATABEL."_RUPIAHKRGBAYAR,0) AS ".$NAMATABEL."_RUPIAHKRGBAYAR
		CASE WHEN TBLSETORANBPD.TBLSETORANBPD_JNSKETETAPAN = 'K' THEN NVL (TBLSETORANBPD.TBLSETORANBPD_PAJAKKURANGBAYAR, 0) ELSE 0 END AS TBLSETORANBPD_RUPIAHSETOR"; 

        $from = $NAMATABEL;

        $otherquery = array(
             'leftjoin_TBLSETORANBPD'=>array('TBLSETORANBPD','TBLSETORANBPD.TBLDAFTAR_NOPOK = '.$NAMATABEL.'.TBLDAFTAR_NOPOK')
             ,'order'=> 'TO_NUMBER (TO_CHAR(NVL('.$NAMATABEL.'_REGKURANGBAYAR, 0)))'
             //'leftjoin_REFBADANUSAHA'=>array('TBLDAFTAR','TBLDAFTAR.REFBADANUSAHA_IDPEMILIK=REFBADANUSAHA.REFBADANUSAHA_ID')
        );

        $filter = array(
            'EQ__'.$NAMATABEL.'_THNKURANGBAYAR' => $THNKURANGBAYAR
			,'EQ__'.$NAMATABEL.'_BLNKURANGBAYAR' => $BLNKURANGBAYAR
			,'EQ__'.$NAMATABEL.'_TGLKURANGBAYAR' => $TGLKURANGBAYAR
			,'EQ__TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
        $data['cetak'] = DBFetch::query($arrayConfig);*/
		// echo $sql;die();

		$data['cetak'] = Yii::app()->db->createCommand( $sql )->queryAll();
		$data['NAMATABEL'] = $NAMATABEL;

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_skpdkb' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'daftar_skpdkb.docx';

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
		
		$totalkb = array('totalkb'=>0); $totalsetor = array('totalsetor'=>0); $totalbunga = array('totalbunga'=>0); $totaldenda = array('totaldenda'=>0); $totalperiksa = array('totalperiksa'=>0); $no=1; foreach ($data['cetak'] as $kolom) :

			$dt['no'] = $no++;
			$dt['tglkb'] = $kolom[''.$NAMATABEL.'_TGLKURANGBAYAR'] .'-'. $kolom[''.$NAMATABEL.'_BLNKURANGBAYAR'] .'-20'. $kolom[''.$NAMATABEL.'_THNKURANGBAYAR'];
			// $dt['tglkb'] = '';
			$dt['nokb'] = $kolom[''.$NAMATABEL.'_REGKURANGBAYAR'];
			$dt['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];

			// $dt['lok'] = $kolom['TBLPENDATAAN_PAJAKKE'];
			// $dt['jumlahrekl'] = $kolom['TBLDAFTREKLAME_JMLHREKLAME']; 
			// $totaljumrek['totaljumrek'] += $kolom['TBLDAFTREKLAME_JMLHREKLAME'];
			// $totalpajak['totalpajak'] += $kolom['TBLDAFTREKLAME_PAJAK'];

			$dt['thn'] = $kolom['TBLPENDATAAN_THNPAJAK'];
			$dt['bln'] = $kolom['TBLPENDATAAN_BLNPAJAK'];
			$dt['tgl'] = $kolom['TBLPENDATAAN_TGLPAJAK'];

			$dt['pjkperiksa'] = LokalIndonesia::ribuan($kolom[''.$NAMATABEL.'_PAJAKPERIKSA']);
			$dt['dendakb'] = LokalIndonesia::ribuan($kolom['KENAIKANKRGBAYAR']);
			$dt['bungakb'] = LokalIndonesia::ribuan($kolom[''.$NAMATABEL.'_BUNGAKRGBAYAR']);
			$dt['rupiahsetor'] = LokalIndonesia::ribuan($kolom['TBLSETORANBPD_RUPIAHSETOR']);
			$dt['rupiahkb'] = LokalIndonesia::ribuan($kolom['JML']);

			$totalperiksa['totalperiksa'] += $kolom[''.$NAMATABEL.'_PAJAKPERIKSA'];
			$totaldenda['totaldenda'] += $kolom['KENAIKANKRGBAYAR'];
			$totalbunga['totalbunga'] += $kolom[''.$NAMATABEL.'_BUNGAKRGBAYAR'];
			$totalsetor['totalsetor'] += $kolom['TBLSETORANBPD_RUPIAHSETOR'];
			$totalkb['totalkb'] += $kolom['JML'];

			// $thnentri = $kolom['TBLDAFTREKLAME_THNENTRI'];
			// $tglentri = $kolom['TBLDAFTREKLAME_TGLENTRI'];
			// $blnentri = $kolom['TBLDAFTREKLAME_BLNENTRI'];

			// $dt['namarek'] = $kolom['NMREKENING'];

			// $dt['ket1'] = $kolom['TBLDAFTREKLAME_KETERANGAN1'];
			// $dt['ket2'] = $kolom['TBLDAFTREKLAME_KETERANGAN2'];

			// $dt['wkt'] = $kolom['TBLDAFTREKLAME_JUMLAHHARI'];
			// $dt['ka'] = $kolom['TBLDAFTREKLAME_SKORKAWASAN'];
			// $dt['fj'] = $kolom['FJ'];
			// $dt['st'] = $kolom['ST'];
			// $dt['sp'] = $kolom['REFKETINGGIAN_SKOR'];
			// $dt['pjg'] = floatval($kolom['TBLDAFTREKLAME_PANJANG']);
			// $dt['lebar'] = floatval($kolom['TBLDAFTREKLAME_LEBAR']);
			// $dt['pjgxlebar'] = $kolom['TBLDAFTREKLAME_PANJANG']*$kolom['TBLDAFTREKLAME_LEBAR'];
			// $dt['niti'] = $kolom['TBLDAFTREKLAME_NILAISTRATEGIS'];
			// $dt['index'] = $kolom['REFSUDUTPANDANG_SKOR'];
			// $dt['biaya'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_RPTARIF']);
			// $dt['harga'] = LokalIndonesia::ribuan($kolom['HARGA']);
			// $dt['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_PAJAK']);

			// $dt['thnpajak'] = $kolom['TBLPENDATAAN_THNPAJAK'];
			// $dt['blnpajak'] = $kolom['TBLPENDATAAN_BLNPAJAK'];
			// $dt['tglpajak'] = $kolom['TBLPENDATAAN_TGLPAJAK'];

			$dt['npwpd'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d", $kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);

		array_push($rows, $dt);

		endforeach;

		$header = array();

		$header['totalperiksa'] = LokalIndonesia::ribuan($totalperiksa['totalperiksa']);
		$header['totaldenda'] = LokalIndonesia::ribuan($totaldenda['totaldenda']);
		$header['totalbunga'] = LokalIndonesia::ribuan($totalbunga['totalbunga']);
		$header['totalsetor'] = LokalIndonesia::ribuan($totalsetor['totalsetor']);
		$header['totalkb'] = LokalIndonesia::ribuan($totalkb['totalkb']);
		// $header['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
		$header['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');

		$thnpajak = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$blnpajak = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
		$tglpajak = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';

		$GLOBALS['namapajak'] = $NAMAPAJAK;

		if ($thnpajak=='') {
			$GLOBALS['tahunpajak'] = '';
		} else {
			$GLOBALS['tahunpajak'] = $thnpajak;
		}
		// $GLOBALS['tglentri'] = $tgl_spt;

		//SAMPAI SINI QUERYNYAhttps://stackoverflow.com/questions/19263954/opentbs-merge-2-rows-in-word-document-table-simultaneously

		// var_dump($data);
		// echo json_encode($rows);Yii::app()->end();
		// echo json_encode($rows);

		// Merge data in the first sheet 
		// $npwpd = $data['TBLDAFTAR_NOPOK'];
		$namafileDL = "DAFTAR-SKPDKB.docx";
		$otbs->MergeBlock('dt', $rows); 
		$otbs->MergeField('header', $header); 
		// $otbs->MergeField('setoran', $setoran); 
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
<?php

class Angsuranspt_parkirController extends Controller
{
	var $KODE_GOL = 2;
	var $PAJAK_AYAT = 7;
	var $PAJAK_REK = '4.1.1.7.0';
	var $namatabel = 'TBLDAFTPARKIR';
	var $modul_url = 'penetapan/angsuranspt_parkir';
	var $jenispajak = 'PARKIR';

	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['sub_rek'] = TRekening::model()->getRekeningSubAktif('4110100');

		$data['rek'] = Yii::app()->db->createCommand("
			SELECT *
			FROM TBLREKENING
			WHERE TBLREKENING_KODE LIKE '4.1.1.7.%'
			ORDER BY TBLREKENING_KODE
			")
		->queryAll();

		$this->renderPartial('index', array('data'=>$data));
	}

	public function cekPAJAK($tahun, $bulan, $TBLDAFTAR_NOPOK)
	{
		$model = Yii::app()->db->createCommand("SELECT NVL({$this->namatabel}_PAJAK,0) FROM {$this->namatabel} WHERE TBLDAFTAR_NOPOK = ".$TBLDAFTAR_NOPOK." AND TBLPENDATAAN_THNPAJAK = ".$tahun." AND TBLPENDATAAN_BLNPAJAK = ".$bulan."")->queryScalar();
		return $model;
	}

	public function actiongetdata()
	{
		$TBLDAFTAR_NOPOK = intval($_POST['TBLDAFTAR_NOPOK']);
		$bulan = trim($_POST['bulan']);
		$tahun = trim($_POST['tahun']);
		$tanggal = isset($_POST['tanggal']) ? intval($_POST['tanggal']) : '0' ;
		$tahun_substr = substr($tahun, 2,4);
		$cekpajak = $this->cekPAJAK($tahun_substr, $bulan, $TBLDAFTAR_NOPOK);
		$arrayFilter = array(
			'THNPAJAK' => (int)substr($tahun, -2),
			'BLNPAJAK' => (int)$bulan,
			'TGLPAJAK' => (int)$tanggal,
			'NOPOK' => $TBLDAFTAR_NOPOK,
		);
		$cekAngsur = $this->cekPernahAngsur($arrayFilter);
		$cekAngsurSetor = $this->cekAngsurSetor($arrayFilter);
		// $cek = $this->cekPernahDaftar($tahun_substr, $bulan, $TBLDAFTAR_NOPOK);
		Yii::import('ext.LokalIndonesia');
		if ($cekpajak!=0) {

			$data['data'] = 'pajak > 0';

			$select = "
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
			TBLDAFTAR.TBLDAFTAR_ISAKTIF,
			TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
			TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			REFBADANUSAHA.REKENING_KODE,
			REFBADANUSAHA.REFBADANUSAHA_REKPENDAPATAN,
			REFBADANUSAHA.REFBADANUSAHA_REKPAD,
			REFBADANUSAHA.REFBADANUSAHA_REKPJK,
			REFBADANUSAHA.REFBADANUSAHA_REKAYAT,
			REFBADANUSAHA.REFBADANUSAHA_REKJENIS,
			REFBADANUSAHA.REFBADANUSAHA_PERSEN,

			NVL({$this->namatabel}.{$this->namatabel}_TGLSPTPD,0) AS {$this->namatabel}_TGLSPTPD,
			NVL({$this->namatabel}.{$this->namatabel}_BLNSPTPD,0) AS {$this->namatabel}_BLNSPTPD,
			NVL({$this->namatabel}.{$this->namatabel}_THNSPTPD,0) AS {$this->namatabel}_THNSPTPD,
			NVL({$this->namatabel}.{$this->namatabel}_PAJAK,0) AS {$this->namatabel}_PAJAK,
			NVL({$this->namatabel}.{$this->namatabel}_TGLBATASSPTPD,0) AS {$this->namatabel}_TGLBATASSPTPD,
			NVL({$this->namatabel}.{$this->namatabel}_BLNBATASSPTPD,0) AS {$this->namatabel}_BLNBATASSPTPD,
			NVL({$this->namatabel}.{$this->namatabel}_THNBATASSPTPD,0) AS {$this->namatabel}_THNBATASSPTPD,
			NVL({$this->namatabel}.{$this->namatabel}_JUMLAHANGSUR,0) AS {$this->namatabel}_JUMLAHANGSUR,
			NVL({$this->namatabel}.{$this->namatabel}_TGLSURATANGSUR,0) AS {$this->namatabel}_TGLSURATANGSUR,
			NVL({$this->namatabel}.{$this->namatabel}_BLNSURATANGSUR,0) AS {$this->namatabel}_BLNSURATANGSUR,
			NVL({$this->namatabel}.{$this->namatabel}_THNSURATANGSUR,0) AS {$this->namatabel}_THNSURATANGSUR,

			NVL({$this->namatabel}.{$this->namatabel}_REGSURATANGSUR,0) AS {$this->namatabel}_REGSURATANGSUR
			";
			$from = 'TBLDAFTAR';
			$filter = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
			);

			$filter_AND = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
				,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
				,'EQ__'.$this->namatabel.'.TBLPENDATAAN_THNPAJAK' => $tahun_substr
				,'EQ__'.$this->namatabel.'.TBLPENDATAAN_BLNPAJAK' => $bulan
			// ,'EQ__tblsubyek_isaktif' => "T"
			);

			$otherquery = array(
				'limit'=> 30
				,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
				,'join_2'=> array(''.$this->namatabel.'', 'TBLDAFTAR.TBLDAFTAR_NOPOK = '.$this->namatabel.'.TBLDAFTAR_NOPOK')
				,'order'=> 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC'
			);
			$model = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL') );

			Yii::import('ext.LokalIndonesia');
			$data['TBLDAFTAR_BADANUSAHANAMA'] =$model['TBLDAFTAR_BADANUSAHANAMA'];
			$data['TBLDAFTAR_BADANUSAHAALAMAT'] =$model['TBLDAFTAR_BADANUSAHAALAMAT'];
			$data['REKENING_KODE'] =$model['REKENING_KODE'];
			$data['TREKENING_TARIF'] =$model['REFBADANUSAHA_PERSEN'];

			// $data['TBLDAFTAR_NPWPD'] = $model['TBLDAFTAR_JENISPENDAPATAN'] +'.'+ $model['TBLDAFTAR_GOLONGAN'] +'.'+ $model['TBLDAFTAR_NOPOK'] +'.'+ sprintf("%02d",$model['TBLKECAMATAN_IDBADANUSAHA']) +'.'+ sprintf("%02d",$model['TBLKELURAHAN_IDBADANUSAHA']);

			$data['TBLDAFTAR_JENISPENDAPATAN'] = $model['TBLDAFTAR_JENISPENDAPATAN'];
			$data['TBLDAFTAR_GOLONGAN'] = $model['TBLDAFTAR_GOLONGAN'];
			$data['TBLDAFTAR_NOPOK'] = sprintf("%05d",$model['TBLDAFTAR_NOPOK']);
			$data['TBLKECAMATAN_IDBADANUSAHA'] = sprintf("%02d",$model['TBLKECAMATAN_IDBADANUSAHA']);
			$data['TBLKELURAHAN_IDBADANUSAHA'] = sprintf("%02d",$model['TBLKELURAHAN_IDBADANUSAHA']);

			$data['REFBADANUSAHA_REKPENDAPATAN'] =$model['REFBADANUSAHA_REKPENDAPATAN'];
			$data['REFBADANUSAHA_REKPAD'] =$model['REFBADANUSAHA_REKPAD'];
			$data['REFBADANUSAHA_REKPJK'] =$model['REFBADANUSAHA_REKPJK'];
			$data['REFBADANUSAHA_REKAYAT'] =$model['REFBADANUSAHA_REKAYAT'];
			$data['REFBADANUSAHA_REKJENIS'] =$model['REFBADANUSAHA_REKJENIS'];

			$data[''.$this->namatabel.'_PAJAK'] = LokalIndonesia::ribuan($model[''.$this->namatabel.'_PAJAK']);
			$data[''.$this->namatabel.'_TGLSPTPD'] = sprintf("%02d",$model[''.$this->namatabel.'_TGLSPTPD']);
			$data[''.$this->namatabel.'_BLNSPTPD'] = sprintf("%02d",$model[''.$this->namatabel.'_BLNSPTPD']);
			$data[''.$this->namatabel.'_THNSPTPD'] = $model[''.$this->namatabel.'_THNSPTPD'];

			$data[''.$this->namatabel.'_TGLBATASSPTPD'] = sprintf("%02d",$model[''.$this->namatabel.'_TGLBATASSPTPD']);
			$data[''.$this->namatabel.'_BLNBATASSPTPD'] = sprintf("%02d",$model[''.$this->namatabel.'_BLNBATASSPTPD']);
			$data[''.$this->namatabel.'_THNBATASSPTPD'] = $model[''.$this->namatabel.'_THNBATASSPTPD'];
			$data[''.$this->namatabel.'_JUMLAHANGSUR'] = $model[''.$this->namatabel.'_JUMLAHANGSUR'];
			$data[''.$this->namatabel.'_TGLSURATANGSUR'] = sprintf('%02d', $model[''.$this->namatabel.'_TGLSURATANGSUR']) . '-' . sprintf('%02d', $model[''.$this->namatabel.'_BLNSURATANGSUR']) . '-' . str_pad($model[''.$this->namatabel.'_THNSURATANGSUR'], 4, "2000", STR_PAD_LEFT);
			$data[''.$this->namatabel.'_REGSURATANGSUR'] = $model[''.$this->namatabel.'_REGSURATANGSUR'];

		} else {

			$data['data'] = 'pajak 0';

			

		}

		$data['cekAngsur'] = $cekAngsur;
		$data['cekAngsurSetor'] = $cekAngsurSetor;
		echo CJSON::encode($data);
	}

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim\

		$tahun_pajak = $data['THNPAJAK'] = intval($_POST['TBLPENDATAAN_THNPAJAK']);
		$bulan_pajak = $data['BLNPAJAK'] = intval($_POST['TBLPENDATAAN_BLNPAJAK']);
		$tanggal_pajak = $data['TGLPAJAK'] = isset($_POST['TBLPENDATAAN_TGLPAJAK']) ? intval($_POST['TBLPENDATAAN_TGLPAJAK']) : 0;

		$nopokok = $data['NOPOK'] = intval($_POST['TBLDAFTAR_NOPOK']);

		$date_suratangsur = trim($_POST[''.$this->namatabel.'_TGLSURATANGSUR']);
		$arr_tglsuratangsur = explode('-', $date_suratangsur);

		$regsuratangsur = trim($_POST[''.$this->namatabel.'_REGSURATANGSUR']);
		$jumlahangsur = trim($_POST[''.$this->namatabel.'_JUMLAHANGSUR']);

		$pokoktambahan = trim($_POST[''.$this->namatabel.'_TOTALPAJAK']);
		$bungatambahan = trim($_POST[''.$this->namatabel.'_BUNGATAMBAHAN']);

		if ($cmd=="tambah") {

			$column = array(''.$this->namatabel.'_THNSURATANGSUR'=>substr($arr_tglsuratangsur[2], -2)
				,''.$this->namatabel.'_BLNSURATANGSUR'=>$arr_tglsuratangsur[1]
				,''.$this->namatabel.'_TGLSURATANGSUR'=>$arr_tglsuratangsur[0]
				,''.$this->namatabel.'_REGSURATANGSUR'=>$regsuratangsur
				,''.$this->namatabel.'_JUMLAHANGSUR'=>$jumlahangsur
				,''.$this->namatabel.'_POKOKTAMBAHAN'=>LokalIndonesia::toAngka($pokoktambahan)
				,''.$this->namatabel.'_BUNGATAMBAHAN'=>LokalIndonesia::toAngka($bungatambahan)
			);

			$res['data'] = 'ada';
			$command = Yii::app()->db->createCommand();

			$simpan = $command->update(''.$this->namatabel.'', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPAJAK AND TBLPENDATAAN_BLNPAJAK =:BLNPAJAK AND NVL(TBLPENDATAAN_TGLPAJAK, 0) =:TGLPAJAK',array(':NOPOK' => $nopokok, ':THNPAJAK' =>substr($tahun_pajak, -2), ':BLNPAJAK' => $bulan_pajak, ':TGLPAJAK' => (int)$tanggal_pajak));

			if ($simpan) {
				$arrayDATA = array(
					'id' => $nopokok
					,'noperiksa' => $regsuratangsur
					,'masaawal' => ''
					,'data' => $data
					,'tblketetapanangsuran' => json_decode($_POST['tblketetapanangsuran'], 1)
				);
				$res['simpanDetailAngsuran'] = 'nothing';
				$arrayFilter = array(
					'THNPAJAK' => (int)substr($tahun_pajak, -2),
					'BLNPAJAK' => (int)$bulan_pajak,
					'TGLPAJAK' => (int)$tanggal_pajak,
					'NOPOK' => $nopokok,
				);
				if ($this->cekPernahAngsur($arrayFilter)=='tidak') {
					$res['simpanDetailAngsuran'] = $this->simpanDetailAngsuran($arrayDATA);
				}
				$res['status'] = 'success';
			}else{
				$res['status'] = 'failed';
			}
		}
		elseif($cmd=="edit") {
			// $id = filter_var(base64_decode($_REQUEST['id']), FILTER_VALIDATE_INT);
			// $model = SuratPerjanjianAngsuran::model()->findByPk($id);
		}
		else {
			$res['status'] = 'InvalidCommand';
			Yii::app()->end();
		}
		echo CJSON::encode($res);
	}

	public function actionHapus()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

			$tahun_pajak = $data['THNPAJAK'] = intval($_POST['TBLPENDATAAN_THNPAJAK']);
			$bulan_pajak = $data['BLNPAJAK'] = intval($_POST['TBLPENDATAAN_BLNPAJAK']);
			$tanggal_pajak = $data['TGLPAJAK'] = isset($_POST['TBLPENDATAAN_TGLPAJAK']) ? intval($_POST['TBLPENDATAAN_TGLPAJAK']) : 0;

			$nopokok = $data['NOPOK'] = intval($_POST['TBLDAFTAR_NOPOK']);

			$date_suratangsur = trim($_POST[''.$this->namatabel.'_TGLSURATANGSUR']);
			$arr_tglsuratangsur = explode('-', $date_suratangsur);

			$regsuratangsur = trim($_POST[''.$this->namatabel.'_REGSURATANGSUR']);
			$jumlahangsur = trim($_POST[''.$this->namatabel.'_JUMLAHANGSUR']);

			$pokoktambahan = trim($_POST[''.$this->namatabel.'_TOTALPAJAK']);
			$bungatambahan = trim($_POST[''.$this->namatabel.'_BUNGATAMBAHAN']);;
		// echo CJSON::encode(array('status'=>'success', $_REQUEST));Yii::app()->end();

			$column = array(''.$this->namatabel.'_THNSURATANGSUR' => new CDbExpression('NULL')
				,''.$this->namatabel.'_BLNSURATANGSUR' => new CDbExpression('NULL')
				,''.$this->namatabel.'_TGLSURATANGSUR' => new CDbExpression('NULL')
				,''.$this->namatabel.'_REGSURATANGSUR' => new CDbExpression('NULL')
				,''.$this->namatabel.'_JUMLAHANGSUR' => new CDbExpression('NULL')
			);

			$res['data'] = 'ada';
			$command = Yii::app()->db->createCommand();

			$batalangs = $command->update(''.$this->namatabel.'', $column,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPAJAK AND TBLPENDATAAN_BLNPAJAK =:BLNPAJAK AND NVL(TBLPENDATAAN_TGLPAJAK, 0) =:TGLPAJAK',array(':NOPOK' => $nopokok, ':THNPAJAK' =>substr($tahun_pajak, -2), ':BLNPAJAK' => $bulan_pajak, ':TGLPAJAK' => (int)$tanggal_pajak));

			if ($batalangs) {
				$commandDelAngs = Yii::app()->db->createCommand();

				$batalangs = $commandDelAngs->delete('TBLANGSURAN', 'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPAJAK AND TBLPENDATAAN_BLNPAJAK =:BLNPAJAK AND NVL(TBLPENDATAAN_TGLPAJAK, 0) =:TGLPAJAK',array(':NOPOK' => $nopokok, ':THNPAJAK' =>substr($tahun_pajak, -2), ':BLNPAJAK' => $bulan_pajak, ':TGLPAJAK' => (int)$tanggal_pajak));
				$res['status'] = 'success';
			}else{
				$res['status'] = 'failed';
			}
			echo CJSON::encode($res);
		}

		public function simpanDetailAngsuran($arrayDATA)
		{
		// var_dump($arrayDATA['tblketetapanangsuran']);Yii::app()->end();
			$data = $arrayDATA['data'];
			$statuse = array();
			$ke = 1; foreach ($arrayDATA['tblketetapanangsuran'] as $rowDetail) :
			// var_dump($rowDetail);
			$rowDetail = (array)$rowDetail;
			// var_dump($rowDetail);
			if ($ke==1) {
				$masaawal = $arrayDATA['masaawal'];
			} else {
				$rowDetailBefore = (array)$arrayDATA['tblketetapanangsuran'][$ke-1];
				$masaawal = strtotime($rowDetailBefore['tgljatuhtempoangsur']) ? date('Y-m-d', strtotime( $rowDetailBefore['tgljatuhtempoangsur'] ) ) : new CDbExpression('NULL');
			}
			$tgljtempo = strtotime($rowDetail['tgljatuhtempoangsur']) ? date('Y-m-d', strtotime( $rowDetail['tgljatuhtempoangsur'] ) ) : NULL;

			$sqlSPT = 'SELECT *
			FROM '.$this->namatabel.'
			JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK=' . $this->namatabel . '.TBLDAFTAR_NOPOK
			WHERE TBLPENDATAAN_THNPAJAK='.(int)substr($data['THNPAJAK'],-2) .'
			AND TBLPENDATAAN_BLNPAJAK='.(int)$data['BLNPAJAK'].'
			AND NVL(TBLPENDATAAN_TGLPAJAK,0)=' . (int)$data['TGLPAJAK'] . '
			AND ' . $this->namatabel . '.TBLDAFTAR_NOPOK=' . (int)$data['NOPOK'] . '';
			// Yii::app()->end();
			$dataSPT = Yii::app()->db->createCommand($sqlSPT)->queryRow();
			$command_insrt = Yii::app()->db->createCommand();
			$arrayOfData = array(
				'TBLPENDATAAN_THNPAJAK' => (int)substr($data['THNPAJAK'],-2),
				'TBLPENDATAAN_BLNPAJAK' => (int)$data['BLNPAJAK'],
				'TBLPENDATAAN_TGLPAJAK' => (int)$data['TGLPAJAK'],
				'TBLANGSURAN_JNSSURAT' => 'A',
				'TBLDAFTAR_JNSPENDAPATAN' => 'P',
				'TBLDAFTAR_NOPOK' => (int)$data['NOPOK'],
				'LOP' => '',
				'TBLANGSURAN_PAJAKKE' => $rowDetail['ke'],
				'TBLANGSURAN_GOLONGAN' => isset($dataSPT['TBLDAFTAR_GOLONGAN']) ? $dataSPT['TBLDAFTAR_GOLONGAN'] : '',
				'TBLKECAMATAN_ID' => isset($dataSPT['TBLKECAMATAN_ID']) ? $dataSPT['TBLKECAMATAN_ID'] : '',
				'TBLKELURAHAN_ID' => isset($dataSPT['TBLKELURAHAN_ID']) ? $dataSPT['TBLKELURAHAN_ID'] : '',
				'TBLANGSURAN_NAMABADANUSAHA' => isset($dataSPT['TBLDAFTAR_BADANUSAHANAMA']) ? substr($dataSPT['TBLDAFTAR_BADANUSAHANAMA'], 0, 25) : '',
				'TBLANGSURAN_ALAMATBADANUSAHA' => isset($dataSPT['TBLDAFTAR_BADANUSAHAALAMAT']) ? substr($dataSPT['TBLDAFTAR_BADANUSAHAALAMAT'], 0, 30) : '',
				'TBLANGSURAN_CARAKETETAPAN' => isset($dataSPT[''.$this->namatabel.'_ISJNSPENETAPAN']) ? $dataSPT[''.$this->namatabel.'_ISJNSPENETAPAN'] : '',
				'PJ' => null,
				'TBLANGSURAN_THNKETETAPAN' => isset($dataSPT[''.$this->namatabel.'_THNSURATANGSUR']) ? $dataSPT[''.$this->namatabel.'_THNSURATANGSUR'] : '',
				'TBLANGSURAN_BLNKETETAPAN' => isset($dataSPT[''.$this->namatabel.'_BLNSURATANGSUR']) ? $dataSPT[''.$this->namatabel.'_BLNSURATANGSUR'] : '',
				'TBLANGSURAN_TGLKETETAPAN' => isset($dataSPT[''.$this->namatabel.'_TGLSURATANGSUR']) ? $dataSPT[''.$this->namatabel.'_TGLSURATANGSUR'] : '',
				'TBLANGSURAN_NOKETETAPAN' => isset($dataSPT[''.$this->namatabel.'_REGSURATANGSUR']) ? $dataSPT[''.$this->namatabel.'_REGSURATANGSUR'] : '',
				'TBLANGSURAN_THNAWALKETETAPAN' => '0',
				'TBLANGSURAN_BLNAWALKETETAPAN' => '0',
				'TBLANGSURAN_TGLAWALKETETAPAN' => '0',
				'TBLANGSURAN_THNBATASKETETAPAN' => (int)substr($rowDetail['thnjatuhtempoangsur'], -2),
				'TBLANGSURAN_BLNBATASKETETAPAN' => (int)$rowDetail['blnjatuhtempoangsur'],
				'TBLANGSURAN_TGLBATASKETETAPAN' => (int)$rowDetail['tgljatuhtempoangsur'],
				'TBLANGSURAN_THNTERIMAKETETAPAN' => '0',
				'TBLANGSURAN_BLNTERIMAKETETAPAN' => '0',
				'TBLANGSURAN_TGLTERIMAKETETAPAN' => '0',
				'TBLANGSURAN_THNENTRIKETETAPAN' => isset($dataSPT[''.$this->namatabel.'_THNSURATANGSUR']) ? $dataSPT[''.$this->namatabel.'_THNSURATANGSUR'] : '',
				'TBLANGSURAN_BLNENTRIKETETAPAN' => isset($dataSPT[''.$this->namatabel.'_BLNSURATANGSUR']) ? $dataSPT[''.$this->namatabel.'_BLNSURATANGSUR'] : '',
				'TBLANGSURAN_TGLENTRIKETETAPAN' => isset($dataSPT[''.$this->namatabel.'_TGLSURATANGSUR']) ? $dataSPT[''.$this->namatabel.'_TGLSURATANGSUR'] : '',
				'TBLANGSURAN_KETETAPANTOTAL' => $rowDetail['rpskp'],
				'TBLANGSURAN_ANGSURAN' => $rowDetail['pokokangsur'],
				'TBLANGSURAN_SETORAN' => null,
				'TBLANGSURAN_SISAANGSURAN' => null,
				'TBLANGSURAN_DENDAANGSURAN' => null,
				'TBLANGSURAN_BUNGAANGSURAN' => $rowDetail['bungaangsur'],
				'TBLANGSURAN_THNSETORANGSURAN' => null,
				'TBLANGSURAN_BLNSETORANGSURAN' => null,
				'TBLANGSURAN_TGLSETORANGSURAN' => null,
				'TBLANGSURAN_THNENTRISETOR' => null,
				'TBLANGSURAN_BLNENTRISETOR' => null,
				'TBLANGSURAN_TGLENTRISETOR' => null,
				'TBLANGSURAN_NOMORSETOR' => null,
				'TBLANGSURAN_REKPENDAPATAN' => isset($dataSPT[$this->namatabel.'_REKPENDAPATAN']) ? $dataSPT[$this->namatabel.'_REKPENDAPATAN'] : '',
				'TBLANGSURAN_REKPAD' => isset($dataSPT[$this->namatabel.'_REKPAD']) ? $dataSPT[$this->namatabel.'_REKPAD'] : '',
				'TBLANGSURAN_REKPAJAK' => isset($dataSPT[$this->namatabel.'_REKPAJAK']) ? $dataSPT[$this->namatabel.'_REKPAJAK'] : '',
				'TBLANGSURAN_REKAYAT' => isset($dataSPT[$this->namatabel.'_REKAYAT']) ? $dataSPT[$this->namatabel.'_REKAYAT'] : '',
				'TBLANGSURAN_REKJENIS' => isset($dataSPT[$this->namatabel.'_REKJENIS']) ? $dataSPT[$this->namatabel.'_REKJENIS'] : '',
				'OPER' => null,
				'TER' => null,
				'JAM' => null,
			);

			$insert = $command_insrt->insert('TBLANGSURAN', $arrayOfData);
			if ($insert) {
				$statuse[] =  (array('pesan'=>'success'));
			}else{
				$statuse[] =  (array('pesan'=>'failed', 'posisi'=>'insert ke tabel angsuran'));
			}
		endforeach;
		return $statuse;

	}

	public function cekPernahAngsur($arrayFilter)
	{
		$sqlcek = "
		SELECT COUNT(TBLPENDATAAN_BLNPAJAK) AS JML FROM TBLANGSURAN
		WHERE
		TBLPENDATAAN_THNPAJAK=" . (int)substr($arrayFilter["THNPAJAK"],-2) ."
		AND TBLPENDATAAN_BLNPAJAK=" . (int)$arrayFilter["BLNPAJAK"]."
		AND NVL(TBLPENDATAAN_TGLPAJAK,0)=" . (int)$arrayFilter["TGLPAJAK"] . "
		AND TBLDAFTAR_NOPOK=" . (int)$arrayFilter["NOPOK"]
		. "";
		$model = Yii::app()->db->createCommand($sqlcek)->queryRow();
		if ($model['JML']>0) {
			return 'ada';
		}else{
			return 'tidak';
		}
	}

	public function cekAngsurSetor($arrayFilter)
	{
		$sqlcek = "
		SELECT COUNT(TBLPENDATAAN_BLNPAJAK) AS JML FROM TBLANGSURAN
		WHERE
		TBLPENDATAAN_THNPAJAK=" . (int)substr($arrayFilter["THNPAJAK"],-2) ."
		AND TBLPENDATAAN_BLNPAJAK=" . (int)$arrayFilter["BLNPAJAK"]."
		AND NVL(TBLPENDATAAN_TGLPAJAK,0)=" . (int)$arrayFilter["TGLPAJAK"] . "
		AND TBLDAFTAR_NOPOK=" . (int)$arrayFilter["NOPOK"] . "
		AND (
			TBLANGSURAN_SETORAN IS NOT NULL
			OR TBLANGSURAN_TGLSETORANGSURAN IS NOT NULL
		)
		";
		$model = Yii::app()->db->createCommand($sqlcek)->queryRow();
		if ($model['JML']>0) {
			return 'ada';
		}else{
			return 'tidak';
		}
	}

	public function actionautocompletewpparkir()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');

		$query = trim($_REQUEST['query']);

		$select = ''.$this->namatabel.'.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT';
		$from = ''.$this->namatabel.'';
		$filter = array(
			'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA' => $query
			,'LK__TBLDAFTAR.TBLDAFTAR_NOPOK' => $query
		);

		$filter_AND = array(
			//'EQ__TREKENING_KODE' => '4110100'
			// ,'EQ__tblsubyek_jenisusaha' => $jenisusaha
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = '.$this->namatabel.'.TBLDAFTAR_NOPOK')
			,'order'=> ''.$this->namatabel.'.TBLDAFTAR_NOPOK ASC'
			,'group'=> ''.$this->namatabel.'.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$results = DBFetch::query($arrayConfig);

		$suggestions = array();

		foreach($results as $result)
		{
			$suggestions[] = array(
				"value" => $result['TBLDAFTAR_NOPOK']. ' | ' . $result['TBLDAFTAR_BADANUSAHANAMA']
				,"data" => $result['TBLDAFTAR_NOPOK']
				,"TBLDAFTAR_BADANUSAHANAMA" => $result['TBLDAFTAR_BADANUSAHANAMA']
				,"TBLDAFTAR_BADANUSAHAALAMAT" => $result['TBLDAFTAR_BADANUSAHAALAMAT']
				,"TBLDAFTAR_NOPOK" => $result['TBLDAFTAR_NOPOK']
			);
		}

		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function actionCetakKetetapan()
	{
		$data['filter'] = isset($_REQUEST['form_cetakketetapan_data']) ? base64_decode($_REQUEST['form_cetakketetapan_data']) : '';

		$PARAMS = array();
		parse_str($data['filter'], $PARAMS);

		if (
			( isset($PARAMS['TBLDAFTAR_NOPOK']) AND !empty((int) $PARAMS['TBLDAFTAR_NOPOK']) )
			AND ( isset($PARAMS['TBLPENDATAAN_THNPAJAK']) AND !empty((int) $PARAMS['TBLPENDATAAN_THNPAJAK']) )
			AND ( isset($PARAMS['TBLPENDATAAN_BLNPAJAK']) AND !empty((int) $PARAMS['TBLPENDATAAN_BLNPAJAK']) )
		) {
        	// var_dump($PARAMS);
        	// OKE LANJUT
		} else {
			echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak</h3>";
			Yii::app()->end();
		}

		$TBLDAFTAR_NOPOK = intval($PARAMS['TBLDAFTAR_NOPOK']);
		$bulan = intval($PARAMS['TBLPENDATAAN_BLNPAJAK']);
		$tahun = intval($PARAMS['TBLPENDATAAN_THNPAJAK']);
		$tanggal = isset($PARAMS['TBLPENDATAAN_TGLPAJAK']) ? intval($PARAMS['TBLPENDATAAN_TGLPAJAK']) : '0' ;
		$tahun_substr = substr($tahun, 2,4);

		$flag = '';
		$query = '';
		$select = "
		TBLDAFTAR.TBLDAFTAR_NOPOK AS NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		REFBADANUSAHA.REKENING_KODE,
		REFBADANUSAHA.REFBADANUSAHA_REKPENDAPATAN,
		REFBADANUSAHA.REFBADANUSAHA_REKPAD,
		REFBADANUSAHA.REFBADANUSAHA_REKPJK,
		REFBADANUSAHA.REFBADANUSAHA_REKAYAT,
		REFBADANUSAHA.REFBADANUSAHA_REKJENIS,
		TBLPENDATAAN_THNPAJAK,
		TBLPENDATAAN_BLNPAJAK,
		{$this->namatabel}_REKPENDAPATAN,
		{$this->namatabel}_REKPAD,
		{$this->namatabel}_REKPAJAK,
		{$this->namatabel}_REKAYAT,
		{$this->namatabel}_REKJENIS,
		{$this->namatabel}_REKBIDANG,
		{$this->namatabel}_REKDINAS,
		{$this->namatabel}_REKKEGIATAN,
		{$this->namatabel}_REKORGANISASI,
		{$this->namatabel}_REKPEMERINTAHAN,
		{$this->namatabel}_REKPROGRAM,
		{$this->namatabel}_REKURUSAN,
		REFBADANUSAHA.REFBADANUSAHA_PERSEN,
		(
			SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING
			FROM
			TBLREKENING
			WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = {$this->namatabel}.{$this->namatabel}_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = {$this->namatabel}.{$this->namatabel}_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = {$this->namatabel}.{$this->namatabel}_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = {$this->namatabel}.{$this->namatabel}_REKAYAT
			AND TBLREKENING.TBLREKENING_REKJENIS = {$this->namatabel}.{$this->namatabel}_REKJENIS
		) AS NMREK,
		NVL({$this->namatabel}.{$this->namatabel}_NOMORPERIKSA, 0) AS {$this->namatabel}_NOMORPERIKSA,
		NVL({$this->namatabel}.{$this->namatabel}_REGKURANGBAYAR, 0) AS {$this->namatabel}_REGKURANGBAYAR,
		NVL({$this->namatabel}.{$this->namatabel}_PAJAKPERIKSA,0) AS {$this->namatabel}_PAJAKPERIKSA,
		NVL({$this->namatabel}.{$this->namatabel}_BUNGAKRGBAYAR,0) AS {$this->namatabel}_BUNGAKRGBAYAR,
		NVL({$this->namatabel}.{$this->namatabel}_NAKB,0) AS {$this->namatabel}_KENAIKANKRGBAYAR,
		NVL({$this->namatabel}.{$this->namatabel}_DENDAKRGBAYAR,0) AS {$this->namatabel}_DENDAKRGBAYAR,
		NVL({$this->namatabel}.{$this->namatabel}_PAJAK,0) AS {$this->namatabel}_PAJAK,
		NVL({$this->namatabel}.{$this->namatabel}_BLNKBAWAL,0) AS {$this->namatabel}_BLNKBAWAL,
		NVL({$this->namatabel}.{$this->namatabel}_BLNKBAKHIR,0) AS {$this->namatabel}_BLNKBAKHIR,
		NVL({$this->namatabel}.{$this->namatabel}_TGLSPTPD,0) AS {$this->namatabel}_TGLSPTPD,
		NVL({$this->namatabel}.{$this->namatabel}_BLNSPTPD,0) AS {$this->namatabel}_BLNSPTPD,
		NVL({$this->namatabel}.{$this->namatabel}_THNKURANGBAYAR,0) AS {$this->namatabel}_THNKURANGBAYAR,
		NVL({$this->namatabel}.{$this->namatabel}_TGLBTSKRGBAYAR,0) AS {$this->namatabel}_TGLBTSKRGBAYAR,
		NVL({$this->namatabel}.{$this->namatabel}_BLNBTSKRGBAYAR,0) AS {$this->namatabel}_BLNBTSKRGBAYAR,
		NVL({$this->namatabel}.{$this->namatabel}_THNBTSKRGBAYAR,0) AS {$this->namatabel}_THNBTSKRGBAYAR,
		NVL({$this->namatabel}.{$this->namatabel}_TGLSPTPD,0) AS {$this->namatabel}_TGLSPTPD,
		NVL({$this->namatabel}.{$this->namatabel}_BLNSPTPD,0) AS {$this->namatabel}_BLNSPTPD,
		NVL({$this->namatabel}.{$this->namatabel}_THNSPTPD,0) AS {$this->namatabel}_THNSPTPD,
		NVL({$this->namatabel}.{$this->namatabel}_JUMLAHANGSUR,0) AS {$this->namatabel}_JUMLAHANGSUR,
		NVL({$this->namatabel}.{$this->namatabel}_TGLSURATANGSUR,0) AS {$this->namatabel}_TGLSURATANGSUR,
		NVL({$this->namatabel}.{$this->namatabel}_BLNSURATANGSUR,0) AS {$this->namatabel}_BLNSURATANGSUR,
		NVL({$this->namatabel}.{$this->namatabel}_THNSURATANGSUR,0) AS {$this->namatabel}_THNSURATANGSUR,
		NVL({$this->namatabel}.{$this->namatabel}_REGSURATANGSUR,0) AS {$this->namatabel}_REGSURATANGSUR
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,'EQ__'.$this->namatabel.'.TBLPENDATAAN_THNPAJAK' => $tahun_substr
			,'EQ__'.$this->namatabel.'.TBLPENDATAAN_BLNPAJAK' => $bulan
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			// 'limit'=> 30
			'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA'),
			'join_2'=> array(''.$this->namatabel.'', 'TBLDAFTAR.TBLDAFTAR_NOPOK = '.$this->namatabel.'.TBLDAFTAR_NOPOK'),
			'order'=> 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC',
		);
		$data['utama'] = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>false,'otherquery'=>$otherquery,'mode'=>'DETAIL') );

		$select_rinci = "
		
		";
		$from_rinci = 'TBLANGSURAN';
		$filter_rinci = array(
			'EQ__TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK,
			'EQ__TBLPENDATAAN_THNPAJAK' => $tahun_substr,
			'EQ__TBLPENDATAAN_BLNPAJAK' => $bulan,
		);

		$filter_rinci_AND = array(
		);

		$otherquery_rinci = array(
			'andwhere'=> ("
				NVL(TBLPENDATAAN_TGLPAJAK,0)= " . (int)$tanggal . "
				"),
		);
		$data['rinci'] = DBFetch::query( array('select'=>$select_rinci,'from'=>$from_rinci,'filter'=>$filter_rinci,'filter_AND'=>$filter_rinci_AND,'filterOR'=>false,'otherquery'=>$otherquery_rinci,'mode'=>'LIST') );

        // echo CJSON::encode($data);;Yii::app()->end();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_angsuran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'TPL_KETETAPANANGS_SPT.docx';

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

        $skpd = array();
        $rows = array();

        $sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 2";

        $data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();

        $kolom = $data['utama'];

        $skpd['no'] = null;
        $skpd['nopok'] = sprintf("%07d",$kolom['NOPOK']);
        $skpd['jabatan'] = $data['jab1']['TBLPEJABAT_URAIAN'];
        $skpd['petugas'] = $data['jab1']['TBLPEJABAT_NAMA'];
        $skpd['nip'] = $data['jab1']['TBLPEJABAT_NIP'];

        // $skpd['noskp'] = $kolom[$this->namatabel . '_NOMORSKPD'];
        $skpd['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
        $skpd['alamatbadan'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
        $skpd['namapemilik'] = $kolom['TBLDAFTAR_PEMILIKNAMA'];
        $skpd['alamatpemilik'] = $kolom['TBLDAFTAR_PEMILIKALAMAT'];
        $skpd['tahunpajak'] = '20'. $kolom['TBLPENDATAAN_THNPAJAK'];
        $skpd['bulanawal'] = LokalIndonesia::getBulan($kolom['TBLPENDATAAN_BLNPAJAK']);
        $skpd['bulanakhir'] = '';
        $skpd['noskp'] = $kolom["{$this->namatabel}_REGSURATANGSUR"];
        $skpd['thnskp'] = $kolom["{$this->namatabel}_THNSURATANGSUR"];
        $skpd['jenispajak'] = $this->jenispajak;
        $skpd['npwpd'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d",$kolom['NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);

        $skpd['rekkode'] = $kolom[$this->namatabel .'_REKURUSAN'] .'.'. $kolom[$this->namatabel .'_REKPEMERINTAHAN'] .'.'. $kolom[$this->namatabel .'_REKORGANISASI'] .'.'. $kolom[$this->namatabel .'_REKPROGRAM'] .'.'. $kolom[$this->namatabel .'_REKKEGIATAN'] .'.'. $kolom[$this->namatabel .'_REKDINAS'] .'.'. $kolom[$this->namatabel .'_REKBIDANG'] .'.'. $kolom[$this->namatabel .'_REKPENDAPATAN'] .'.'. $kolom[$this->namatabel .'_REKPAD'] .'.'. $kolom[$this->namatabel .'_REKPAJAK'] .'.'. $kolom[$this->namatabel .'_REKAYAT'] .'.'. $kolom[$this->namatabel .'_REKJENIS'];

        // $skpd['pajak'] = LokalIndonesia::ribuan($kolom['PAJAK']);
        // $skpd['bunga'] = LokalIndonesia::ribuan($kolom[$this->namatabel .'_DENDAKRGBAYAR']);

        // $skpd['total'] = LokalIndonesia::ribuan($kolom['PAJAK']+$kolom[$this->namatabel .'_DENDAKRGBAYAR']);
        // $skpd['terbilang'] = LokalIndonesia::terbilangangka($kolom['PAJAK']+$kolom[$this->namatabel .'_DENDAKRGBAYAR']);

        $skpd['tglskpd'] = $kolom[$this->namatabel .'_TGLSPTPD'] .' '. LokalIndonesia::getBulan($kolom[$this->namatabel .'_BLNSPTPD']);
        $skpd['blnskpd'] = LokalIndonesia::getBulan($kolom[$this->namatabel .'_BLNSPTPD']);
        $skpd['thnskpd'] = '20'. $kolom[$this->namatabel .'_THNSPTPD'];

        $bungaangsur = 0;
        $totalpokok = 0;
        foreach ($data['rinci'] as $angs) :
        	$bungaangsurr = $angs['TBLANGSURAN_BUNGAANGSURAN'];
        	$bungaangsur += $angs['TBLANGSURAN_BUNGAANGSURAN'];
        	$totalpokokdanbunga = $angs['TBLANGSURAN_ANGSURAN'] + $angs['TBLANGSURAN_BUNGAANGSURAN'];
        	$totalpokok += $angs['TBLANGSURAN_ANGSURAN'];
        	$rincian = array(
        		'ke' => $angs['TBLANGSURAN_PAJAKKE'],
        		'rpangsuran' => LokalIndonesia::ribuan($angs['TBLANGSURAN_ANGSURAN'], 0, 0),
        		'rpbunga' => LokalIndonesia::ribuan($bungaangsurr, 0, 0),
        		'rptotalangsuran' => LokalIndonesia::ribuan($totalpokokdanbunga, 0, 0),
        		'tglskp' => $angs['TBLANGSURAN_TGLKETETAPAN'] . '/' . (sprintf('%02d', $angs['TBLANGSURAN_BLNKETETAPAN'])) . '/' . ($angs['TBLANGSURAN_THNKETETAPAN']),
        		'tglbatasskp' => $angs['TBLANGSURAN_TGLBATASKETETAPAN'] . '/' . (sprintf('%02d', $angs['TBLANGSURAN_BLNBATASKETETAPAN'])) . '/' . ($angs['TBLANGSURAN_THNBATASKETETAPAN']),
        	); 
        	array_push($rows, $rincian);

        endforeach;
        $skpd['rpangsuran'] = LokalIndonesia::ribuan($angs['TBLANGSURAN_ANGSURAN'], 0, 0);
        $skpd['rptotalpokok'] = LokalIndonesia::ribuan($totalpokok, 0, 0);
        $skpd['rpbunga'] = LokalIndonesia::ribuan($bungaangsur, 0, 0);
        $skpd['rptotalangsur'] = LokalIndonesia::ribuan($angs['TBLANGSURAN_KETETAPANTOTAL'], 0, 0);
        $skpd['rptotalangsur_terbilang'] = LokalIndonesia::terbilangangka($angs['TBLANGSURAN_KETETAPANTOTAL']);
        $skpd['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');

        //SAMPAI SINI QUERYNYA

        // var_dump($data);
        // echo json_encode($rows);Yii::app()->end();
        // echo json_encode($row);

        // Merge data in the first sheet
        $namafileDL = "SKPD-ANGSURAN-STIMULUS-2020.docx";
        $otbs->MergeBlock('angsuran', $rows);
        $otbs->MergeField('header', $skpd);
        // $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

        $otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
        // echo "string";Yii::app()->end();
        Yii::app()->end();
    }

    public function actionCetakPerjanjian()
	{
		$data['filter'] = isset($_REQUEST['form_cetakperjanjian_data']) ? base64_decode($_REQUEST['form_cetakperjanjian_data']) : '';

		$PARAMS = array();
		parse_str($data['filter'], $PARAMS);

		if (
			( isset($PARAMS['TBLDAFTAR_NOPOK']) AND !empty((int) $PARAMS['TBLDAFTAR_NOPOK']) )
			AND ( isset($PARAMS['TBLPENDATAAN_THNPAJAK']) AND !empty((int) $PARAMS['TBLPENDATAAN_THNPAJAK']) )
			AND ( isset($PARAMS['TBLPENDATAAN_BLNPAJAK']) AND !empty((int) $PARAMS['TBLPENDATAAN_BLNPAJAK']) )
		) {
        	// var_dump($PARAMS);
        	// OKE LANJUT
		} else {
			echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak</h3>";
			Yii::app()->end();
		}

		$TBLDAFTAR_NOPOK = intval($PARAMS['TBLDAFTAR_NOPOK']);
		$bulan = intval($PARAMS['TBLPENDATAAN_BLNPAJAK']);
		$tahun = intval($PARAMS['TBLPENDATAAN_THNPAJAK']);
		$tanggal = isset($PARAMS['TBLPENDATAAN_TGLPAJAK']) ? intval($PARAMS['TBLPENDATAAN_TGLPAJAK']) : '0' ;
		$tahun_substr = substr($tahun, 2,4);

		$flag = '';
		$query = '';
		$select = "
		TBLDAFTAR.TBLDAFTAR_NOPOK AS NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		REFBADANUSAHA.REKENING_KODE,
		REFBADANUSAHA.REFBADANUSAHA_REKPENDAPATAN,
		REFBADANUSAHA.REFBADANUSAHA_REKPAD,
		REFBADANUSAHA.REFBADANUSAHA_REKPJK,
		REFBADANUSAHA.REFBADANUSAHA_REKAYAT,
		REFBADANUSAHA.REFBADANUSAHA_REKJENIS,
		TBLPENDATAAN_THNPAJAK,
		TBLPENDATAAN_BLNPAJAK,
		{$this->namatabel}_REKPENDAPATAN,
		{$this->namatabel}_REKPAD,
		{$this->namatabel}_REKPAJAK,
		{$this->namatabel}_REKAYAT,
		{$this->namatabel}_REKJENIS,
		{$this->namatabel}_REKBIDANG,
		{$this->namatabel}_REKDINAS,
		{$this->namatabel}_REKKEGIATAN,
		{$this->namatabel}_REKORGANISASI,
		{$this->namatabel}_REKPEMERINTAHAN,
		{$this->namatabel}_REKPROGRAM,
		{$this->namatabel}_REKURUSAN,
		REFBADANUSAHA.REFBADANUSAHA_PERSEN,
		(
			SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING
			FROM
			TBLREKENING
			WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = {$this->namatabel}.{$this->namatabel}_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = {$this->namatabel}.{$this->namatabel}_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = {$this->namatabel}.{$this->namatabel}_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = {$this->namatabel}.{$this->namatabel}_REKAYAT
			AND TBLREKENING.TBLREKENING_REKJENIS = {$this->namatabel}.{$this->namatabel}_REKJENIS
		) AS NMREK,
		NVL({$this->namatabel}.{$this->namatabel}_NOMORPERIKSA, 0) AS {$this->namatabel}_NOMORPERIKSA,
		NVL({$this->namatabel}.{$this->namatabel}_REGKURANGBAYAR, 0) AS {$this->namatabel}_REGKURANGBAYAR,
		NVL({$this->namatabel}.{$this->namatabel}_PAJAKPERIKSA,0) AS {$this->namatabel}_PAJAKPERIKSA,
		NVL({$this->namatabel}.{$this->namatabel}_BUNGAKRGBAYAR,0) AS {$this->namatabel}_BUNGAKRGBAYAR,
		NVL({$this->namatabel}.{$this->namatabel}_NAKB,0) AS {$this->namatabel}_KENAIKANKRGBAYAR,
		NVL({$this->namatabel}.{$this->namatabel}_DENDAKRGBAYAR,0) AS {$this->namatabel}_DENDAKRGBAYAR,
		NVL({$this->namatabel}.{$this->namatabel}_PAJAK,0) AS {$this->namatabel}_PAJAK,
		NVL({$this->namatabel}.{$this->namatabel}_BLNKBAWAL,0) AS {$this->namatabel}_BLNKBAWAL,
		NVL({$this->namatabel}.{$this->namatabel}_BLNKBAKHIR,0) AS {$this->namatabel}_BLNKBAKHIR,
		NVL({$this->namatabel}.{$this->namatabel}_TGLSPTPD,0) AS {$this->namatabel}_TGLSPTPD,
		NVL({$this->namatabel}.{$this->namatabel}_BLNSPTPD,0) AS {$this->namatabel}_BLNSPTPD,
		NVL({$this->namatabel}.{$this->namatabel}_THNKURANGBAYAR,0) AS {$this->namatabel}_THNKURANGBAYAR,
		NVL({$this->namatabel}.{$this->namatabel}_TGLBTSKRGBAYAR,0) AS {$this->namatabel}_TGLBTSKRGBAYAR,
		NVL({$this->namatabel}.{$this->namatabel}_BLNBTSKRGBAYAR,0) AS {$this->namatabel}_BLNBTSKRGBAYAR,
		NVL({$this->namatabel}.{$this->namatabel}_THNBTSKRGBAYAR,0) AS {$this->namatabel}_THNBTSKRGBAYAR,
		NVL({$this->namatabel}.{$this->namatabel}_TGLSPTPD,0) AS {$this->namatabel}_TGLSPTPD,
		NVL({$this->namatabel}.{$this->namatabel}_BLNSPTPD,0) AS {$this->namatabel}_BLNSPTPD,
		NVL({$this->namatabel}.{$this->namatabel}_THNSPTPD,0) AS {$this->namatabel}_THNSPTPD,
		NVL({$this->namatabel}.{$this->namatabel}_JUMLAHANGSUR,0) AS {$this->namatabel}_JUMLAHANGSUR,
		NVL({$this->namatabel}.{$this->namatabel}_TGLSURATANGSUR,0) AS {$this->namatabel}_TGLSURATANGSUR,
		NVL({$this->namatabel}.{$this->namatabel}_BLNSURATANGSUR,0) AS {$this->namatabel}_BLNSURATANGSUR,
		NVL({$this->namatabel}.{$this->namatabel}_THNSURATANGSUR,0) AS {$this->namatabel}_THNSURATANGSUR,
		NVL({$this->namatabel}.{$this->namatabel}_REGSURATANGSUR,0) AS {$this->namatabel}_REGSURATANGSUR
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,'EQ__'.$this->namatabel.'.TBLPENDATAAN_THNPAJAK' => $tahun_substr
			,'EQ__'.$this->namatabel.'.TBLPENDATAAN_BLNPAJAK' => $bulan
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			// 'limit'=> 30
			'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA'),
			'join_2'=> array(''.$this->namatabel.'', 'TBLDAFTAR.TBLDAFTAR_NOPOK = '.$this->namatabel.'.TBLDAFTAR_NOPOK'),
			'order'=> 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC',
		);
		$data['utama'] = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>false,'otherquery'=>$otherquery,'mode'=>'DETAIL') );

		$select_rinci = "
		
		";
		$from_rinci = 'TBLANGSURAN';
		$filter_rinci = array(
			'EQ__TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK,
			'EQ__TBLPENDATAAN_THNPAJAK' => $tahun_substr,
			'EQ__TBLPENDATAAN_BLNPAJAK' => $bulan,
		);

		$filter_rinci_AND = array(
		);

		$otherquery_rinci = array(
			'andwhere'=> ("
				NVL(TBLPENDATAAN_TGLPAJAK,0)= " . (int)$tanggal . "
				"),
		);
		$data['rinci'] = DBFetch::query( array('select'=>$select_rinci,'from'=>$from_rinci,'filter'=>$filter_rinci,'filter_AND'=>$filter_rinci_AND,'filterOR'=>false,'otherquery'=>$otherquery_rinci,'mode'=>'LIST') );

        // echo CJSON::encode($data);;Yii::app()->end();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_angsuran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'TPL_PERJANJIANANGS_SPT.docx';

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

        $skpd = array();
        $rows = array();

        $sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 2";

        $data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();

        $kolom = $data['utama'];

        $skpd['no'] = null;
        $skpd['nopok'] = sprintf("%07d",$kolom['NOPOK']);
        $skpd['jabatan'] = $data['jab1']['TBLPEJABAT_URAIAN'];
        $skpd['petugas'] = $data['jab1']['TBLPEJABAT_NAMA'];
        $skpd['nip'] = $data['jab1']['TBLPEJABAT_NIP'];

        // $skpd['noskp'] = $kolom[$this->namatabel . '_NOMORSKPD'];
        $skpd['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
        $skpd['alamatbadan'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
        $skpd['namapemilik'] = $kolom['TBLDAFTAR_PEMILIKNAMA'];
        $skpd['alamatpemilik'] = $kolom['TBLDAFTAR_PEMILIKALAMAT'];
        $skpd['tahun'] = '20'. $kolom['TBLPENDATAAN_THNPAJAK'];
        $skpd['bulan'] = LokalIndonesia::getBulan($kolom['TBLPENDATAAN_BLNPAJAK']);
        $skpd['bulanakhir'] = '';
        $skpd['noskp'] = $kolom["{$this->namatabel}_REGSURATANGSUR"];
        $skpd['thnskp'] = $kolom["{$this->namatabel}_THNSURATANGSUR"];
        $skpd['pajak'] = LokalIndonesia::ribuan($kolom["{$this->namatabel}_PAJAK"]);
        $skpd['tglsuratangsur'] = $kolom["{$this->namatabel}_TGLSURATANGSUR"].' '. LokalIndonesia::getBulan($kolom["{$this->namatabel}_BLNSURATANGSUR"]).' '.'20'.$kolom["{$this->namatabel}_THNSURATANGSUR"];
        $skpd['kaliangsur'] = $kolom["{$this->namatabel}_JUMLAHANGSUR"];
        $skpd['jenispajak'] = $this->jenispajak;
        $skpd['npwpd'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d",$kolom['NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);

        $skpd['rekkode'] = $kolom[$this->namatabel .'_REKURUSAN'] .'.'. $kolom[$this->namatabel .'_REKPEMERINTAHAN'] .'.'. $kolom[$this->namatabel .'_REKORGANISASI'] .'.'. $kolom[$this->namatabel .'_REKPROGRAM'] .'.'. $kolom[$this->namatabel .'_REKKEGIATAN'] .'.'. $kolom[$this->namatabel .'_REKDINAS'] .'.'. $kolom[$this->namatabel .'_REKBIDANG'] .'.'. $kolom[$this->namatabel .'_REKPENDAPATAN'] .'.'. $kolom[$this->namatabel .'_REKPAD'] .'.'. $kolom[$this->namatabel .'_REKPAJAK'] .'.'. $kolom[$this->namatabel .'_REKAYAT'] .'.'. $kolom[$this->namatabel .'_REKJENIS'];

        // $skpd['pajak'] = LokalIndonesia::ribuan($kolom['PAJAK']);
        // $skpd['bunga'] = LokalIndonesia::ribuan($kolom[$this->namatabel .'_DENDAKRGBAYAR']);

        // $skpd['total'] = LokalIndonesia::ribuan($kolom['PAJAK']+$kolom[$this->namatabel .'_DENDAKRGBAYAR']);
        // $skpd['terbilang'] = LokalIndonesia::terbilangangka($kolom['PAJAK']+$kolom[$this->namatabel .'_DENDAKRGBAYAR']);

        $skpd['tglskpd'] = $kolom[$this->namatabel .'_TGLSPTPD'] .' '. LokalIndonesia::getBulan($kolom[$this->namatabel .'_BLNSPTPD']);
        $skpd['blnskpd'] = LokalIndonesia::getBulan($kolom[$this->namatabel .'_BLNSPTPD']);
        $skpd['thnskpd'] = '20'. $kolom[$this->namatabel .'_THNSPTPD'];

        $bungaangsur = 0;
        foreach ($data['rinci'] as $angs) :
        	$bungaangsurr = $angs['TBLANGSURAN_BUNGAANGSURAN'];
        	$totalpokokdanbunga = $angs['TBLANGSURAN_ANGSURAN'] + $angs['TBLANGSURAN_BUNGAANGSURAN'];
        	$bungaangsur += $angs['TBLANGSURAN_BUNGAANGSURAN'];
        	$rincian = array(
        		'ke' => $angs['TBLANGSURAN_PAJAKKE'],
        		'rpangsuran' => LokalIndonesia::ribuan($angs['TBLANGSURAN_ANGSURAN'], 0, 0),
        		'rpbunga' => LokalIndonesia::ribuan($bungaangsurr, 0, 0),
        		'rptotalangsuran' => LokalIndonesia::ribuan($totalpokokdanbunga, 0, 0),
        		'tglskp' => $angs['TBLANGSURAN_TGLKETETAPAN'] . '/' . (sprintf('%02d', $angs['TBLANGSURAN_BLNKETETAPAN'])) . '/' . ($angs['TBLANGSURAN_THNKETETAPAN']),
        		'tglbatasskp' => $angs['TBLANGSURAN_TGLBATASKETETAPAN'] . '/' . (sprintf('%02d', $angs['TBLANGSURAN_BLNBATASKETETAPAN'])) . '/' .'20'.($angs['TBLANGSURAN_THNBATASKETETAPAN']),
        	); 
        	array_push($rows, $rincian);

        endforeach;
        $skpd['rpangsuran'] = LokalIndonesia::ribuan($angs['TBLANGSURAN_ANGSURAN'], 0, 0);
        $skpd['rpbunga'] = LokalIndonesia::ribuan($bungaangsur, 0, 0);
        $skpd['rptotalangsur'] = LokalIndonesia::ribuan($angs['TBLANGSURAN_KETETAPANTOTAL'], 0, 0);
        $skpd['rptotalangsur_terbilang'] = LokalIndonesia::terbilangangka($angs['TBLANGSURAN_KETETAPANTOTAL']);
        $skpd['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');

        //SAMPAI SINI QUERYNYA

        // var_dump($data);
        // echo json_encode($rows);Yii::app()->end();
        // echo json_encode($row);

        // Merge data in the first sheet
        $namafileDL = "PERJANJIAN-ANGSURAN-STIMULUS-2020.docx";
        $otbs->MergeBlock('angsuran', $rows);
        $otbs->MergeField('header', $skpd);
        // $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

        $otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
        // echo "string";Yii::app()->end();
        Yii::app()->end();
    }

    public function actionGetNoANG()
    {
    	$tahun = $_REQUEST['tahun'];
    	$splthn = substr($tahun, -2);

    	$data = Yii::app()->db->createCommand("SELECT
    		MAX(TO_NUMBER (TO_CHAR(NVL({$this->namatabel}_REGSURATANGSUR, 0))))+1 AS noang
    		FROM
    		{$this->namatabel}
    		WHERE
    		TBLPENDATAAN_THNPAJAK = ".$splthn."
    		AND NVL ({$this->namatabel}_REGSURATANGSUR, 0) <> 0
    		ORDER BY
    		TO_NUMBER (TO_CHAR(NVL(noang, 0))) DESC")->queryRow();

    	echo CJSON::encode($data);
    }
}
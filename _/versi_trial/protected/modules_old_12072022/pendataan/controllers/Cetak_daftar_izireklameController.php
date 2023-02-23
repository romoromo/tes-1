<?php

class Cetak_daftar_izireklameController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionCetakword()
	{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'surat_pemberitahuan_izin_reklame.docx';
		$namafileDL = "Surat Pemberitahuan Izin Reklame.docx";

		Yii::import('ext.DMOpenTBS',true);
		Yii::import('ext.LokalIndonesia');
		DMOpenTBS::init();
		$otbs = new clsTinyButStrong;

			// Useful for debugging purposes. Displays the errors
		$otbs->NoErr = 0;
			$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

			$template = $namatpl;
			$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

			$thp = !empty($_REQUEST['thp']) ? $_REQUEST['thp'] : '';
			$blp = !empty($_REQUEST['blp']) ? $_REQUEST['blp'] : '';
			$hrp = !empty($_REQUEST['hrp']) ? $_REQUEST['hrp'] : '';
			$nopok = !empty($_REQUEST['nopok']) ? $_REQUEST['nopok'] : '';
			$ke = !empty($_REQUEST['ke']) ? $_REQUEST['ke'] : '';
			$kdre = !empty($_REQUEST['kdre']) ? $_REQUEST['kdre'] : '';
			$thare = $_REQUEST['thare'];
			$blare = !empty($_REQUEST['blare']) ? $_REQUEST['blare'] : '';
			$hrare = !empty($_REQUEST['hrare']) ? $_REQUEST['hrare'] : '';
			// $data=array();
			// echo "run"; Yii::app()->end();
			$data['nomor_surat'] = $_REQUEST['nomor_surat'];


					$wherenopok = '';
				if (!empty($nopok)) {
					$wherenopok = ' AND "TBLDAFTAR".TBLDAFTAR_NOPOK = ' . $nopok;
				}

				$wherethp = '';
				if (!empty($thp)) {
					$wherethp = ' AND "TBLDAFTREKLAME".TBLPENDATAAN_THNPAJAK = ' . substr($thp, -2);
				}

				$whereblp = '';
				if (!empty($blp)) {
					$whereblp = ' AND "TBLDAFTREKLAME".TBLPENDATAAN_BLNPAJAK = ' . $blp;
				}

				$wherehrp = '';
				if (!empty($hrp)) {
					$wherehrp = ' AND "TBLDAFTREKLAME".TBLPENDATAAN_TGLPAJAK = ' . $hrp;
				}

				$whereke = '';
				if (!empty($ke)) {
					$whereke = ' AND "TBLDAFTREKLAME".TBLPENDATAAN_PAJAKKE = ' . $ke;
				}

				$wherekdre = '';
				if (!empty($kdre)) {
					$wherekdre = " AND TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME = '$kdre'";
				}

				$wherethare = '';
				if (!empty($thare)) {
					$wherethare = ' AND "TBLDAFTREKLAME".TBLDAFTREKLAME_THNAKHIRREKLAME = ' . substr($thare, -2);
				}

				$whereblare = '';
				if (!empty($blare)) {
					$whereblare = ' AND "TBLDAFTREKLAME".TBLDAFTREKLAME_BLNAKHIRREKLAME = ' . $blare;
				}

				$wherehrare = '';
				if (!empty($hrare)) {
					$wherehrare = ' AND "TBLDAFTREKLAME".TBLDAFTREKLAME_TGLAKHIRREKLAME = ' . $hrare;
				}
				$wherdata = '';
				$wherkode = '';
				
				
			$sql = 'SELECT
		    TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
		    TBLDAFTAR.TBLDAFTAR_NOPOK,
		    TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		    TBLDAFTAR.TBLDAFTAR_NOFORMULIR,
		    TBLDAFTAR.TBLDAFTAR_NOPOKL,
		    TBLDAFTAR.TBLDAFTAR_GOLONGANL,
		    TBLDAFTAR.TBLDAFTAR_NPWPP,
		    TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		    TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		    TBLDAFTAR.TBLDAFTAR_BADANUSAHARTRW,
		    TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		    TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		    TBLDAFTREKLAME.*
			FROM
			    TBLDAFTAR,
			    TBLDAFTREKLAME
			WHERE
			    TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK
			    '
					. $wherenopok 
					. $wherethp 
					. $whereblp 
					. $wherehrp 
					. $whereke 
					. $wherekdre 
					. $wherethare
					. $whereblare 
					. $wherehrare 
					. '

			ORDER BY
			    TBLDAFTREKLAME_THNAKHIRREKLAME,
			    TBLDAFTREKLAME_BLNAKHIRREKLAME,
			    TBLDAFTREKLAME_TGLAKHIRREKLAME
			    
			    ';
			 // echo($sql);die();

			$data['cetak'] = Yii::app()->db->createCommand($sql)->queryAll();

			$sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 1";

			$data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();

			// $data['NamaTBL'] = $NamaTBL;

			$dt = array();
			$rows = array();
			$tanggalsurat = date('d') . ' ' . LokalIndonesia::getBulan(date('m')) . ' ' . date('Y');

			$GLOBALS['datenow'] = $tanggalsurat;
			$GLOBALS['no_surat'] = $_REQUEST['nomor_surat'] ;
			// $GLOBALS['tempat_undangan'] = $_REQUEST['tempat_undangan'] ;
			// $GLOBALS['tglundangan1'] = LokalIndonesia::TanggalUmum($_REQUEST['tglawal']);
			// $GLOBALS['tglundangan2'] = LokalIndonesia::TanggalUmum($_REQUEST['tglakhir']);
			// $GLOBALS['waktuawal'] = $_REQUEST['waktuawal'];
			// $GLOBALS['waktuakhir'] = $_REQUEST['waktuakhir'];
			$GLOBALS['jabatan'] = $data['jab1']['TBLPEJABAT_URAIAN'];
			$GLOBALS['nama'] = $data['jab1']['TBLPEJABAT_NAMA'];
			$GLOBALS['nip'] = $data['jab1']['TBLPEJABAT_NIP'];

			$total = array('total'=>0);

			foreach ($data['cetak'] as $kolom) :
				$total1 = '';
				$badannama = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
				$badanalamat = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
				$NPWPD = $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$kolom['TBLKECAMATAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$kolom['TBLKELURAHAN_IDBADANUSAHA']));
				$BATAS = $kolom['TBLDAFTREKLAME_TGLAKHIRREKLAME'] . '-' . LokalIndonesia::getBulan($kolom['TBLDAFTREKLAME_BLNAKHIRREKLAME']) . '-' . ($kolom['TBLDAFTREKLAME_THNAKHIRREKLAME'] +2000); 
				$UKURAN = $kolom['TBLDAFTREKLAME_PANJANG'] . 'M' . ' x ' . $kolom['TBLDAFTREKLAME_LEBAR'] . 'M';
				$MASA = $kolom['TBLPENDATAAN_THNPAJAK']+2000 . '  BULAN ' . LokalIndonesia::getBulan($kolom['TBLPENDATAAN_BLNPAJAK']) . '  TGL ' . ($kolom['TBLPENDATAAN_TGLPAJAK']);

				// $dt['jenis'] = ''.$JenisPajak.'';
				$dt['no'] = null;
				$dt['namabadan'] = $badannama;
				$dt['alamatbadan'] = $badanalamat;
				$dt['nopok'] = $NPWPD;
				$dt['ktre1'] = $kolom['TBLDAFTREKLAME_KETERANGAN1'];
				$dt['jml'] = $kolom['TBLDAFTREKLAME_JMLHREKLAME'];
				$dt['ukuran'] = $UKURAN;
				$dt['idx'] = $kolom['REFSUDUTPANDANG_SKOR'];

				if ($kolom['TBLDAFTREKLAME_JNSREKLAME']=='I'){
					$dt['masapajak'] = $MASA;
				} else {
					$dt['masapajak'] = $kolom['TBLPENDATAAN_THNPAJAK']+2000;
				}
				// $dt['masapajak'] = $MASA;
				$dt['ke'] = $kolom['TBLPENDATAAN_PAJAKKE'];

				$dt['ktre2'] = $kolom['TBLDAFTREKLAME_KETERANGAN2'];
				// $dt['kdjln'] = $kolom['REFJALAN_ID'];

				$dt['noizin'] = $kolom['TBLDAFTREKLAME_PENEMPATAN'];
				$dt['tglakhir'] = $BATAS;

				array_push($rows, $dt);

			endforeach;
			$header=array();
			$header['total'] = LokalIndonesia::ribuan($total['total']);
			$header['terbilang'] = LokalIndonesia::terbilang($total['total']);


			$otbs->MergeBlock('dt', $rows); 
			$otbs->MergeField('header', $header);
				// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

			$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
	 // echo "string";Yii::app()->end();
			Yii::app()->end();


		

		
	}
	public function actionCetak()
	{
		//$cmd = $_REQUEST['cmd'];
		$thp = !empty($_REQUEST['thp']) ? $_REQUEST['thp'] : '';
		$blp = !empty($_REQUEST['blp']) ? $_REQUEST['blp'] : '';
		$hrp = !empty($_REQUEST['hrp']) ? $_REQUEST['hrp'] : '';
		$nopok = !empty($_REQUEST['nopok']) ? $_REQUEST['nopok'] : '';
		$ke = !empty($_REQUEST['ke']) ? $_REQUEST['ke'] : '';
		$thare = $_REQUEST['thare'];
		$blare = !empty($_REQUEST['blare']) ? $_REQUEST['blare'] : '';
		$hrare = !empty($_REQUEST['hrare']) ? $_REQUEST['hrare'] : '';
		$data=array();
		// echo "run"; Yii::app()->end();
		$data['nomor_surat'] = $_REQUEST['nomor_surat'];
		//$kode['kode_jalan'] = $_REQUEST['kode_jalan'];

		$wherenopok = '';
		if (!empty($nopok)) {
			$wherenopok = ' AND "TBLDAFTAR".TBLDAFTAR_NOPOK = ' . $nopok;
		}

		$wherethp = '';
		if (!empty($thp)) {
			$wherethp = ' AND "TBLDAFTREKLAME".TBLPENDATAAN_THNPAJAK = ' . substr($thp, -2);
		}

		$whereblp = '';
		if (!empty($blp)) {
			$whereblp = ' AND "TBLDAFTREKLAME".TBLPENDATAAN_BLNPAJAK = ' . $blp;
		}

		$wherehrp = '';
		if (!empty($hrp)) {
			$wherehrp = ' AND "TBLDAFTREKLAME".TBLPENDATAAN_TGLPAJAK = ' . $hrp;
		}

		$whereke = '';
		if (!empty($ke)) {
			$whereke = ' AND "TBLDAFTREKLAME".TBLPENDATAAN_PAJAKKE = ' . $ke;
		}

		$wherethare = '';
		if (!empty($hare)) {
			$wherethare = ' AND "TBLDAFTREKLAME".TBLDAFTREKLAME_THNAKHIRREKLAME = ' . substr($thare, -2);
		}

		$whereblare = '';
		if (!empty($blare)) {
			$whereblare = ' AND "TBLDAFTREKLAME".TBLDAFTREKLAME_BLNAKHIRREKLAME = ' . $blare;
		}

		$wherehrare = '';
		if (!empty($hrare)) {
			$wherehrare = ' AND "TBLDAFTREKLAME".TBLDAFTREKLAME_TGLAKHIRREKLAME = ' . $hrare;
		}
		$wherdata = '';
		$wherkode = '';
		
		
				$sql = 'SELECT
    TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
    TBLDAFTAR.TBLDAFTAR_NOPOK,
    TBLDAFTAR.TBLDAFTAR_GOLONGAN,
    TBLDAFTAR.TBLDAFTAR_NOFORMULIR,
    TBLDAFTAR.TBLDAFTAR_NOPOKL,
    TBLDAFTAR.TBLDAFTAR_GOLONGANL,
    TBLDAFTAR.TBLDAFTAR_NPWPP,
    TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
    TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
    TBLDAFTAR.TBLDAFTAR_BADANUSAHARTRW,
    TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
    TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
    TBLDAFTREKLAME.*
FROM
    TBLDAFTAR,
    TBLDAFTREKLAME
WHERE
    TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK
    '
		. $wherenopok 
		. $wherethp 
		. $whereblp 
		. $wherehrp 
		. $whereke 
		. $wherethare 
		. $whereblare 
		. $wherehrare 
		. '

ORDER BY
    TBLDAFTREKLAME_THNAKHIRREKLAME,
    TBLDAFTREKLAME_BLNAKHIRREKLAME,
    TBLDAFTREKLAME_TGLAKHIRREKLAME
    
    ';
		
		$data['hasil'] = $hasil = Yii::app()->db->createCommand($sql)->queryAll();

$this->renderPartial('cetak', array('data'=>$data));
}

public function actionGetdata()
	{
		



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
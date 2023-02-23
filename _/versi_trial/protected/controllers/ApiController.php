<?php

class ApiController extends Controller {

	public function actionIndex()
	{
		echo "Api Service Pendapatan ";
		// echo md5('*51mP4tD4J06J4*'.date('Y-m-d'));
	}

	public function actionupdatekodebayar() {
		$getlastkodebayar =Yii::app()->db->createCommand()
		->select('TBLANGSURAN_KODEBAYAR')
		->from('TBLANGSURAN')
		->where('TBLANGSURAN_KODEBAYAR is not null')
		->order('SUBSTR (TBLANGSURAN_KODEBAYAR, 7, 4) DESC')
		->queryScalar();

		$getlasturut = substr($getlastkodebayar, 6, 4);
		echo $getlasturut;
	}

	public function actionCekBayarReklame() {
		$nodaftar = isset($_GET['nodaftar']) ? $_GET['nodaftar'] : 'xxxx';
		$nodaftar = "%{$nodaftar}%";
		$user = isset($_GET['user']) ? $_GET['user'] : '';
		$key  = isset($_GET['key']) ? $_GET['key'] : '';
		if (Yii::app()->params['userapi']==$user && Yii::app()->params['passapi']==$key) {
			$ke = Yii::app()->db->createCommand()
			->select('NVL(TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE,0)')
			->from('TBLDAFTREKLAME')
			->where('TBLDAFTREKLAME.TBLDAFTREKLAME_NODAFTARIZIN LIKE :nodaftar',array(':nodaftar'=>$nodaftar))
			->queryScalar();

			if ($ke!=0) {
				$cekpembayaran = Yii::app()->db->createCommand()
				->select('
					1 AS status_pendataan,
					CASE
					WHEN TBLSETOR.TBLSETOR_NOMORSSPD is not null THEN 1
					ELSE 0 END AS status_bayar_pajak,
					CASE 
					WHEN NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_NOJABONG,0) > 0 AND TBLSETJABONG_NOMORSSPD is not null THEN 1 
					WHEN NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_NOJABONG,0) = 0 AND TBLSETJABONG_NOMORSSPD is null THEN 1
					ELSE 0 END AS status_bayar_jabong
					')
				->from('TBLDAFTREKLAME')
				->leftjoin("TBLSETOR","TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
					AND TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK
					AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0)
					AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
					AND TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE = TBLSETOR.TBLPENDATAAN_PAJAKKE
					AND TBLSETOR.TBLSETOR_JNSBAYAR LIKE 'SKPD%'")
				->leftjoin('TBLSETJABONG','TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK = TBLSETJABONG.TBLPENDATAAN_THNPAJAK
					AND TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK = TBLSETJABONG.TBLPENDATAAN_BLNPAJAK
					AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSETJABONG.TBLPENDATAAN_TGLPAJAK,0)
					AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLSETJABONG.TBLDAFTAR_NOPOK
					AND TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE = TBLSETJABONG.TBLPENDATAAN_PAJAKKE')
				->where('TBLDAFTREKLAME.TBLDAFTREKLAME_NODAFTARIZIN LIKE :nodaftar',array(':nodaftar'=>$nodaftar))
				->queryRow();

				echo CJSON::encode(
					array( 
					'status'              => 'success', 
					'status_pendataan'    => $cekpembayaran['STATUS_PENDATAAN'],
					'status_bayar_pajak'  => $cekpembayaran['STATUS_BAYAR_PAJAK'],
					'status_bayar_jabong' => $cekpembayaran['STATUS_BAYAR_JABONG']
					) 
				);

			} elseif ($ke==0) {
				echo CJSON::encode(
					array( 
						'status'=>'success', 
						'status_pendataan'=>'0' 
					) 
				);
			}

		} else {
			echo CJSON::encode(array( 'status'=>'failed', 'message'=>'user pass salah' ) );
		}
	}
	
	function isValidJSON($str) {
	   json_decode($str);
	   return json_last_error() == JSON_ERROR_NONE;
	}

	public function actionGetBPHTBService() {
		$postdata = file_get_contents('php://input');
		/*
		$nop = isset($_REQUEST['NOP']) ? $_REQUEST['NOP'] : '';
		$nossp = isset($_REQUEST['NTPD']) ? $_REQUEST['NTPD'] : '';
		$user = isset($_REQUEST['USERNAME']) ? $_REQUEST['USERNAME'] : '';
		$key  = isset($_REQUEST['PASSWORD']) ? $_REQUEST['PASSWORD'] : '';
        */
        
		if (strlen($postdata) > 0 && $this->isValidJSON($postdata)) {
	  		$decoded_params = json_decode($postdata);	
        
        
			if (Yii::app()->params['userapibpn']==$decoded_params->USERNAME && Yii::app()->params['passapibpn']==$decoded_params->PASSWORD) {

				$cekpembayaran = Yii::app()->db->createCommand();
				$cekpembayaran->select("
					T1.NOPOK,
					nvl(T3.NIK,'0') NIK,
					nvl(TRIM(T3.PNAMA),'-') NAMA,
					nvl(TRIM(T3.PAL),'-') ALAMAT,
					T7.NOP1||
					T7.NOP2||
					LPAD(T7.NOP3,3,'0')||
					LPAD(T7.NOP4,3,'0')||
					LPAD(T7.NOP5,3,'0')||
					LPAD(T7.NOP6,4,'0')||
					nvl(T7.NOP7,0) NOP,
					TRIM(T5.NM_KELURAHAN) KELURAHAN_OP,
					TRIM(T4.NM_KECAMATAN) KECAMATAN_OP,
					'KOTA YOGYAKARTA' KOTA_OP,
					T1.LUAST LUASTANAH,
					T1.LUASB LUASBANGUNAN,
					T1.NJOPT,
					T1.NJOPB,
					TRIM(nvl(T2.NOSSP,'0'))||T6.PEND||T6.PAD||T6.PJK||T6.AYT||LPAD(T6.JEN,2,'0')||'20'||T2.THSET NTPD,
					LPAD(T2.HRSET,2,'0')||'/'||LPAD(T2.BLSET,2,'0')||'/20'||T2.THSET TANGGAL_PEMBAYARAN, 
					ROUND(T1.RPSKP) PEMBAYARAN,
					CASE
					WHEN TRIM(nvl(T2.NOSSP,0))=0 THEN 'H'
					ELSE 
					'L'
					END JENISBAYAR,
					CASE
					WHEN TRIM(nvl(T2.NOSSP,0))=0 THEN 'T'
					ELSE 
					'Y'
					END STATUS
					");
				$cekpembayaran->from('SYSTEM.spttb T1');
				$cekpembayaran->leftjoin('SYSTEM.seto T2','T1.THP=T2.THP AND T1.BLP=T2.BLP AND nvl(T1.HRP,0)=nvl(T2.HRP,0) AND T1.NOPOK=T2.NOPOK');
				$cekpembayaran->leftjoin('SYSTEM.spttb_nop T7','T1.THP=T7.THP AND T1.BLP=T7.BLP AND nvl(T1.HRP,0)=nvl(T7.HRP,0) AND T1.NOPOK=T7.NOPOK'); // tambah left join daftarnop 28-12-2020 rahmat
				$cekpembayaran->leftjoin('SYSTEM.wpr T3','T1.NOPOK=T3.NOPOK');
				$cekpembayaran->leftjoin('SYSTEM.REF_KECAMATAN T4',"LPAD(T1.NOP3,3,'0')=T4.KD_KECAMATAN");
				$cekpembayaran->leftjoin('SYSTEM.REF_KELURAHAN T5',"LPAD(T1.NOP3,3,'0')=T5.KD_KECAMATAN AND LPAD(T1.NOP4,3,'0')=T5.KD_KELURAHAN");
				$cekpembayaran->leftjoin('SYSTEM.tblrek T6',"T6.PEND=T1.PEND AND T6.PAD=T1.PAD  AND T6.PJK=T1.PJK AND T6.AYT=T1.AYT AND T6.JEN=T1.JEN");
				$cekpembayaran->where("
					T7.NOP1||
					T7.NOP2||
					LPAD(T7.NOP3,3,'0')||
					LPAD(T7.NOP4,3,'0')||
					LPAD(T7.NOP5,3,'0')||
					LPAD(T7.NOP6,4,'0')||
					nvl(T7.NOP7,0)=:nop AND TRIM(nvl(T2.NOSSP,'0'))||T6.PEND||T6.PAD||T6.PJK||T6.AYT||LPAD(T6.JEN,2,'0')||'20'||T2.THSET =:nossp",array(':nop'=>$decoded_params->NOP,':nossp'=>$decoded_params->NTPD)); // ubah where ke T7 28-12-2020 rahmat
				$cekpembayaran->order('T1.THSPT DESC,T1.BLSPT DESC,T1.HRSPT DESC');
				$cekpembayaran->limit(1);
				$data = $cekpembayaran->QueryRow();
				if(!empty($data)) {
				    if($data['NIK']!='0'){$NIK=$data['NIK'];}else{$NIK=null;}
					$respon = array(
							"result"=>array(
								"NOP"=>$data['NOP'],
								"NIK"=>$NIK,
								"NAMA"=>$data['NAMA'],
								"ALAMAT"=>$data['ALAMAT'],
								"KELURAHAN_OP"=>$data['KELURAHAN_OP'],
								"KECAMATAN_OP"=>$data['KECAMATAN_OP'],
								"KOTA_OP"=>$data['KOTA_OP'],
								"LUASTANAH"=>$data['LUASTANAH'],
								"LUASBANGUNAN"=>$data['LUASBANGUNAN'],
								"PEMBAYARAN"=>round($data['PEMBAYARAN']),
								"STATUS"=>$data['STATUS'],
								"TANGGAL_PEMBAYARAN"=>$data['TANGGAL_PEMBAYARAN'],
								"NTPD"=>$data['NTPD'],
								"JENISBAYAR"=>$data['JENISBAYAR']
							),
							'respon_code'=>'OK'
						);
					echo CJSON::encode($respon
					);
				} else {
				    
				    
				    if(($this->cekNOP($decoded_params->NOP)==0) && ($this->cekNTPD($decoded_params->NTPD)!=0)){
				        echo CJSON::encode(
    						array( 
    							'respon_code'=>'NOP tidak ditemukan'
    						) 
    					);
				        
				    } else if (($this->cekNOP($decoded_params->NOP)!=0) && ($this->cekNTPD($decoded_params->NTPD)==0)){
				        echo CJSON::encode(
    						array( 
    							'respon_code'=>'NTPD tidak ditemukan'
    						) 
    					);
				    
				    } else {
				    
    					echo CJSON::encode(
    						array( 
    							'respon_code'=>'DATA tidak ditemukan'
    						) 
    					);
				    }
				}


			} else {
				echo CJSON::encode(
						array( 
							'respon_code'=>'Not Authorized'
						) 
					);
			}
		
		} else {
			echo CJSON::encode(
					array( 
						'respon_code'=>'JSON Not Valid'
					) 
				);
		}

		

	}
	function cekNOP($str) {
	   $ceknop = Yii::app()->db->createCommand();
	   $ceknop->select("COUNT(*) jumlah");
	   $ceknop->from('SYSTEM.spttb T1');
	   $ceknop->leftjoin('SYSTEM.seto T2','T1.THP=T2.THP AND T1.BLP=T2.BLP AND nvl(T1.HRP,0)=nvl(T2.HRP,0) AND T1.NOPOK=T2.NOPOK');
	   $ceknop->join('SYSTEM.spttb_nop T7','T1.THP=T7.THP AND T1.BLP=T7.BLP AND nvl(T1.HRP,0)=nvl(T7.HRP,0) AND T1.NOPOK=T7.NOPOK'); // tambah left join daftarnop 28-12-2020 rahmat
	   $ceknop->leftjoin('SYSTEM.wpr T3','T1.NOPOK=T3.NOPOK');
	   $ceknop->leftjoin('SYSTEM.REF_KECAMATAN T4',"LPAD(T1.NOP3,3,'0')=T4.KD_KECAMATAN");
	   $ceknop->leftjoin('SYSTEM.REF_KELURAHAN T5',"LPAD(T1.NOP3,3,'0')=T5.KD_KECAMATAN AND LPAD(T1.NOP4,3,'0')=T5.KD_KELURAHAN");
	   $ceknop->leftjoin('SYSTEM.tblrek T6',"T6.PEND=T1.PEND AND T6.PAD=T1.PAD  AND T6.PJK=T1.PJK AND T6.AYT=T1.AYT AND T6.JEN=T1.JEN");
	   $ceknop->where("
					T7.NOP1||
					T7.NOP2||
					LPAD(T7.NOP3,3,'0')||
					LPAD(T7.NOP4,3,'0')||
					LPAD(T7.NOP5,3,'0')||
					LPAD(T7.NOP6,4,'0')||
					nvl(T7.NOP7,0)=:nop",array(':nop'=>$str)); // ubah where ke T7 28-12-2020 rahmat
	   $data = $ceknop->QueryRow();
	   $record = $data['JUMLAH'];
	   return $record;
	}
	function cekNTPD($str) {
	   $cekntpd = Yii::app()->db->createCommand();
	   $cekntpd->select("COUNT(*) jumlah");
	   $cekntpd->from('SYSTEM.spttb T1');
	   $cekntpd->leftjoin('SYSTEM.seto T2','T1.THP=T2.THP AND T1.BLP=T2.BLP AND nvl(T1.HRP,0)=nvl(T2.HRP,0) AND T1.NOPOK=T2.NOPOK');
	   $cekntpd->leftjoin('SYSTEM.wpr T3','T1.NOPOK=T3.NOPOK');
	   $cekntpd->leftjoin('SYSTEM.REF_KECAMATAN T4',"LPAD(T1.NOP3,3,'0')=T4.KD_KECAMATAN");
	   $cekntpd->leftjoin('SYSTEM.REF_KELURAHAN T5',"LPAD(T1.NOP3,3,'0')=T5.KD_KECAMATAN AND LPAD(T1.NOP4,3,'0')=T5.KD_KELURAHAN");
	   $cekntpd->leftjoin('SYSTEM.tblrek T6',"T6.PEND=T1.PEND AND T6.PAD=T1.PAD  AND T6.PJK=T1.PJK AND T6.AYT=T1.AYT AND T6.JEN=T1.JEN");
	   $cekntpd->where("TRIM(nvl(T2.NOSSP,'0'))||T6.PEND||T6.PAD||T6.PJK||T6.AYT||LPAD(T6.JEN,2,'0')||'20'||T2.THSET =:nossp",array(':nossp'=>$str));
	   $data = $cekntpd->QueryRow();
	   $record = $data['JUMLAH'];
	   return $record;
	}

	public function actiongetdatawp()
	{	
		header('Content-Type: application/json');
		$namaawal = isset($_GET['nama']) ? $_GET['nama'] : '';
		$nama = "%{$namaawal}%";
		$jenis_pajak = isset($_GET['jenis_pajak']) ? $_GET['jenis_pajak'] : '';
		$user = isset($_GET['user']) ? $_GET['user'] : '';
		$key  = isset($_GET['key']) ? $_GET['key'] : '';
		if (Yii::app()->params['userapi']==$user && Yii::app()->params['passapi']==$key) {

			if (!empty($namaawal)) {
				$sqlnama = " AND tbldaftar_pemiliknama LIKE '".$nama."' ";
			} else {
				$sqlnama = "";
			}

			if ($jenis_pajak=='HOTEL') {
				$jnspajak = '1';

			} else if ($jenis_pajak=='RUMAH MAKAN') {
				$jnspajak = '2';

			} else if ($jenis_pajak=='HIBURAN') {
				$jnspajak = '3';

			} else if ($jenis_pajak=='REKLAME') {
				$jnspajak = '4';

			} else if ($jenis_pajak=='PJU') {
				$jnspajak = '5';

			} else if ($jenis_pajak=='PARKIR') {
				$jnspajak = '7';

			} else if ($jenis_pajak=='AIRTANAH') {
				$jnspajak = '8';

			} else if ($jenis_pajak=='SARANG BURUNG WALET') {
				$jnspajak = '9';

			} else {
				echo CJSON::encode(array( 'status'=>'failed', 'message'=>'jenis pajak tidak ditemukan' ) );
				Yii::app()->end();
			}

			$sql = "SELECT
					TRIM(tbldaftar_pemiliknama) NAMA_PEMILIK,
					TRIM(tbldaftar_pemilikalamat) ALAMAT_PEMILIK,
					TRIM(tbldaftar_badanusahanama) NAMA_USAHA,
					TRIM(tbldaftar_badanusahaalamat) ALAMAT_USAHA,
					JNS_PAJAK JENIS_PAJAK,
					'P.' || LPAD( tbldaftar_nopok, 7, 0 ) || '.' || LPAD( tblkecamatan_idbadanusaha, 2, 0 ) || '.' || LPAD( tblkelurahan_idbadanusaha, 2, 0 ) NPWPD 
				FROM
					TBLDAFTAR
					JOIN REFBADANUSAHA_90 ON TBLDAFTAR.refbadanusaha_idbadanusaha = REFBADANUSAHA_90.REFBADANUSAHA_ID 
				WHERE
					tbldaftar_nopok IS NOT NULL 
					AND tbldaftar_nopok <> 1500000  
					AND tbldaftar_isaktif = 'Y' 
					AND REFBADANUSAHA_REKAYAT = :jenis_pajak 
					{$sqlnama}
				ORDER BY
					tbldaftar_nopok,
					tblkecamatan_idbadanusaha,
					tblkelurahan_idbadanusaha
					";
			$xdata = Yii::app()->db->createCommand($sql)
			->bindParam(':jenis_pajak', $jnspajak)
			->queryAll();

			// echo $xdata;die();

			$result  = [];

			foreach ($xdata as $data) {
				$result[] = array(
					'nama_pemilik'          =>$data['NAMA_PEMILIK']
					,'alamat_pemilik'          =>$data['ALAMAT_PEMILIK']
					,'nama_usaha'         =>$data['NAMA_USAHA']
					,'alamat_usaha'          =>$data['ALAMAT_USAHA']
					,'jenis_pajak' =>$data['JENIS_PAJAK'] 
					,'npwpd' =>$data['NPWPD']
				);
			}
			$dtresult = $result;

			if (!empty($dtresult)) {
				echo CJSON::encode(
					array( 
					'status'  => 'success',
					'message'=>'data ditemukan', 
					'data'    => $dtresult
					) 
				);
			} else {
				echo CJSON::encode(
					array( 
					'status'  => 'success',
					'message'=>'data tidak ditemukan', 
					'data'    => ''
					) 
				);
			}

			

		} else {
			echo CJSON::encode(array( 'status'=>'failed', 'message'=>'otorisasi salah' ) );
		}
	}

	public function actiongetkswpd() {

		header('Content-Type: application/json');

		$nikparam = isset($_GET['nik']) ? $_GET['nik'] : '';
		$npwpdparam = isset($_GET['npwpd']) ? $_GET['npwpd'] : '';
		$nopparam = isset($_GET['nop']) ? $_GET['nop'] : '';
		$nik = "%{$nikparam}%";
		$user = isset($_GET['user']) ? $_GET['user'] : '';
		$key  = isset($_GET['key']) ? $_GET['key'] : '';
		if (Yii::app()->params['userapi']==$user && Yii::app()->params['passapi']==$key) {

			if (empty($nikparam) && empty($npwpdparam) && empty($nopparam)) {
				echo CJSON::encode(array( 'status'=>'failed', 'message'=>'parameter tidak boleh kosong' ) );
				Yii::app()->end();
			}

			if (!empty($nikparam)) {

				if (strlen($nikparam)!=16) {
					echo CJSON::encode(array( 'status'=>'failed', 'message'=>'nik invalid' ) );
					Yii::app()->end();
				}

				$cekexisting = Yii::app()->db->createCommand()
				->select('count(NVL(TBLDAFTAR.TBLDAFTAR_NOPOK,0))')
				->from('TBLDAFTAR')
				->where('TBLDAFTAR.TBLDAFTAR_NIK LIKE :nik',array(':nik'=>$nik))
				->queryScalar();

				if ($cekexisting!=0) {

					$data = Yii::app()->db->createCommand()
					->select("
						TBLDAFTAR_NOPOK,
						NVL(TBLDAFTAR.TBLDAFTAR_NIK,0) NIK,
						NVL(TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,0) NAMA,
						NVL(TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,0) ALAMAT,
						NVL(TBLDAFTAR.TBLDAFTAR_PEMILIKKOTA,0) KOTA,
						NVL(REFBADANUSAHA_IDBADANUSAHA,0) BBU,
						NVL(REFBADANUSAHA_IDPEMILIK,0) PBU,
						NVL(TBLDAFTAR_ISAKTIF,'Y') STA
						")
					->from('TBLDAFTAR')
					->where('TBLDAFTAR.TBLDAFTAR_NIK LIKE :nik',array(':nik'=>$nik))
					->group('TBLDAFTAR_NIK,TBLDAFTAR_PEMILIKNAMA,TBLDAFTAR_PEMILIKALAMAT,TBLDAFTAR_PEMILIKKOTA,TBLDAFTAR_ISAKTIF,REFBADANUSAHA_IDBADANUSAHA,REFBADANUSAHA_IDPEMILIK,TBLDAFTAR_NOPOK')
					->limit(1)
					->queryRow();

					if ($data['STA']=='N') {
						echo CJSON::encode(array( 'status'=>'failed', 'message'=>'status npwpd non-aktif' ) );
						Yii::app()->end();
					}


					if ($data['BBU']=='0') {
						if ($data['PBU']=='0') {
							echo CJSON::encode(array( 'status'=>'failed', 'message'=>'npwpd invalid' ) );
							Yii::app()->end();
						} else {

							$daftarnopok = $this->getdaftarnopok($data['TBLDAFTAR_NOPOK'],'bphtb');
						}
					} else {

						$daftarnopok = $this->getdaftarnopok($nikparam,'nik');
					}

					echo CJSON::encode(array( 'status'=>'success',
					'nik'=>$data['NIK'],
					'nama'=>$data['NAMA'],
					'alamat'=>$data['ALAMAT'],
					'kota'=>$data['KOTA'],
					'objek'=>$daftarnopok
					 ) );
					Yii::app()->end();

				} else {
					echo CJSON::encode(array( 'status'=>'failed', 'message'=>'nik belum terdaftar sebagai npwpd' ) );
					Yii::app()->end();
				}

			}

			if (!empty($npwpdparam)) {

				$nopok = intval($npwpdparam);

				$cekexisting = Yii::app()->db->createCommand()
				->select('count(NVL(TBLDAFTAR.TBLDAFTAR_NOPOK,0))')
				->from('TBLDAFTAR')
				->where('TBLDAFTAR.TBLDAFTAR_NOPOK LIKE :nopok',array(':nopok'=>$nopok))
				->queryScalar();

				if ($cekexisting!=0) {

					$data = Yii::app()->db->createCommand()
					->select("
						NVL(TBLDAFTAR.TBLDAFTAR_NIK,0) NIK,
						NVL(TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,0) NAMA,
						NVL(TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,0) ALAMAT,
						NVL(TBLDAFTAR.TBLDAFTAR_PEMILIKKOTA,0) KOTA,
						NVL(REFBADANUSAHA_IDBADANUSAHA,0) BBU,
						NVL(REFBADANUSAHA_IDPEMILIK,0) PBU,
						NVL(TBLDAFTAR_ISAKTIF,'Y') STA
						")
					->from('TBLDAFTAR')
					->where('TBLDAFTAR.TBLDAFTAR_NOPOK LIKE :nopok',array(':nopok'=>$nopok))
					// ->group('TBLDAFTAR_NOPOK,TBLDAFTAR_PEMILIKNAMA,TBLDAFTAR_PEMILIKALAMAT,TBLDAFTAR_PEMILIKKOTA')
					->queryRow();

					if ($data['STA']=='N') {
						echo CJSON::encode(array( 'status'=>'failed', 'message'=>'status npwpd non-aktif' ) );
						Yii::app()->end();
					}

					if ($data['BBU']=='0') {
						if ($data['PBU']=='0') {
							echo CJSON::encode(array( 'status'=>'failed', 'message'=>'npwpd invalid' ) );
							Yii::app()->end();
						} else {

							$daftarnopok = $this->getdaftarnopok($nopok,'bphtb');
						}
					} else {

						$daftarnopok = $this->getdaftarnopok($nopok,'npwpd');
					}


					echo CJSON::encode(array( 'status'=>'success',
					'nik'=>$data['NIK'],
					'nama'=>$data['NAMA'],
					'alamat'=>$data['ALAMAT'],
					'kota'=>$data['KOTA'],
					'objek'=>$daftarnopok
					 ) );
					Yii::app()->end();

				} else {
					echo CJSON::encode(array( 'status'=>'failed', 'message'=>'npwpd invalid' ) );
					Yii::app()->end();
				}
			}

			if (!empty($nopparam)) {

				$nop = $nopparam;

				$sqlceknop ="SELECT NOP FROM (
				SELECT TBLDAFTBPHTB_NOP1||
				TBLDAFTBPHTB_NOP2||
				LPAD(TBLDAFTBPHTB_NOP3,3,'0')||
				LPAD(TBLDAFTBPHTB_NOP4,3,'0')||
				LPAD(TBLDAFTBPHTB_NOP5,3,'0')||
				LPAD(TBLDAFTBPHTB_NOP6,4,'0')||
				nvl(TBLDAFTBPHTB_NOP7,0) AS NOP
				FROM TBLDAFTBPHTB 
				UNION
				SELECT TBLDAFTARNOP_NOP1||
				TBLDAFTARNOP_NOP2||
				LPAD(TBLDAFTARNOP_NOP3,3,'0')||
				LPAD(TBLDAFTARNOP_NOP4,3,'0')||
				LPAD(TBLDAFTARNOP_NOP5,3,'0')||
				LPAD(TBLDAFTARNOP_NOP6,4,'0')||
				nvl(TBLDAFTARNOP_NOP7,0) AS NOP
				 FROM TBLDAFTARNOP
				 ) TABNOP 
				 WHERE NOP = ".$nop."
				 GROUP BY NOP";

				$cekexisting = Yii::app()->db->createCommand($sqlceknop)->queryScalar();

				if ($cekexisting!=0) {

					$sqldata = "SELECT NOP,
					TBLDAFTAR_NOPOK,
					tbldaftar_badanusahanama AS NAMA,
					tbldaftar_badanusahaalamat AS ALAMAT,
					tbldaftar_badanusahakota AS KOTA,
					NVL(tbldaftar_nik,0) AS NIK 
					FROM (
					SELECT TBLDAFTBPHTB_NOP1||
					TBLDAFTBPHTB_NOP2||
					LPAD(TBLDAFTBPHTB_NOP3,3,'0')||
					LPAD(TBLDAFTBPHTB_NOP4,3,'0')||
					LPAD(TBLDAFTBPHTB_NOP5,3,'0')||
					LPAD(TBLDAFTBPHTB_NOP6,4,'0')||
					nvl(TBLDAFTBPHTB_NOP7,0) AS NOP,TBLDAFTBPHTB.TBLDAFTAR_NOPOK,
					tbldaftar_badanusahanama,tbldaftar_badanusahaalamat,tbldaftar_badanusahakota,tbldaftar_nik 
					FROM TBLDAFTBPHTB
					JOIN TBLDAFTAR ON TBLDAFTBPHTB.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK	
					UNION
					SELECT TBLDAFTARNOP_NOP1||
					TBLDAFTARNOP_NOP2||
					LPAD(TBLDAFTARNOP_NOP3,3,'0')||
					LPAD(TBLDAFTARNOP_NOP4,3,'0')||
					LPAD(TBLDAFTARNOP_NOP5,3,'0')||
					LPAD(TBLDAFTARNOP_NOP6,4,'0')||
					nvl(TBLDAFTARNOP_NOP7,0) AS NOP,TBLDAFTBPHTB.TBLDAFTAR_NOPOK,
					tbldaftar_badanusahanama,tbldaftar_badanusahaalamat,tbldaftar_badanusahakota,tbldaftar_nik
					FROM TBLDAFTARNOP 
					JOIN TBLDAFTBPHTB ON 
					TBLDAFTBPHTB.TBLDAFTAR_NOPOK = TBLDAFTARNOP.TBLDAFTAR_NOPOK
					AND TBLDAFTBPHTB.TBLPENDATAAN_THNPAJAK = TBLDAFTARNOP.TBLPENDATAAN_THNPAJAK
					AND TBLDAFTBPHTB.TBLPENDATAAN_BLNPAJAK = TBLDAFTARNOP.TBLPENDATAAN_BLNPAJAK
					AND NVL(TBLDAFTBPHTB.TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLDAFTARNOP.TBLPENDATAAN_TGLPAJAK,0)
					JOIN TBLDAFTAR ON TBLDAFTBPHTB.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
							 
					) TABNOP 
					WHERE NOP = ".$nop."
					GROUP BY NOP,TBLDAFTAR_NOPOK,tbldaftar_badanusahanama,tbldaftar_badanusahaalamat,tbldaftar_badanusahakota,tbldaftar_nik";
					$data = Yii::app()->db->createCommand($sqldata)->queryRow(); 

					$daftarnopok = $this->getdaftarnopok($data['TBLDAFTAR_NOPOK'],'bphtb');

					echo CJSON::encode(array( 'status'=>'success',
					'nik'=>$data['NIK'],
					'nama'=>$data['NAMA'],
					'alamat'=>$data['ALAMAT'],
					'kota'=>$data['KOTA'],
					'objek'=>$daftarnopok
					 ) );
					Yii::app()->end();

				} else {
					echo CJSON::encode(array( 'status'=>'failed', 'message'=>'nop tidak ditemukan' ) );
					Yii::app()->end();
				}
			}

			

		} else {
			echo CJSON::encode(array( 'status'=>'failed', 'message'=>'user atau key salah' ) );
		}
	}

	public function getdaftarnopok($param,$jenis) {

		if ($jenis=='nik') {
			$nik = "%{$param}%";
			$daftarnopok = Yii::app()->db->createCommand()
				->SELECT("					
					TBLDAFTAR_NOPOK NOPOK,
					TBLDAFTAR_BADANUSAHANAMA,
					TBLDAFTAR_BADANUSAHAALAMAT,
					('P.' || LPAD(TBLDAFTAR.TBLDAFTAR_NOPOK,7,'0') || '.' || LPAD(TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,2,'0') || '.' || LPAD(TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,2,'0') ) AS NPWPD,
					UPPER(REFBADANUSAHA_REKKETERANGAN_90) JENIS,
					REFBADANUSAHA_REKAYAT AYAT
					")
				->FROM('TBLDAFTAR')
				->join('REFBADANUSAHA_90','TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA = REFBADANUSAHA_90.REFBADANUSAHA_ID')
				->where("TBLDAFTAR_NIK LIKE :nik AND TBLDAFTAR_ISAKTIF = 'Y'", array(":nik"=>$nik))
				->order('TBLDAFTAR_NOPOK ASC')
				->queryAll();
		} elseif ($jenis=='npwpd') {
			$nopok = $param;
			$daftarnopok = Yii::app()->db->createCommand()
				->SELECT("					
					TBLDAFTAR_NOPOK NOPOK,
					TBLDAFTAR_BADANUSAHANAMA,
					TBLDAFTAR_BADANUSAHAALAMAT,
					('P.' || LPAD(TBLDAFTAR.TBLDAFTAR_NOPOK,7,'0') || '.' || LPAD(TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,2,'0') || '.' || LPAD(TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,2,'0') ) AS NPWPD,
					UPPER(REFBADANUSAHA_REKKETERANGAN_90) JENIS,
					REFBADANUSAHA_REKAYAT AYAT
					")
				->FROM('TBLDAFTAR')
				->join('REFBADANUSAHA_90','TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA = REFBADANUSAHA_90.REFBADANUSAHA_ID')
				->where("TBLDAFTAR_NOPOK = :nopok AND TBLDAFTAR_ISAKTIF = 'Y'", array(":nopok"=>$nopok))
				->order('TBLDAFTAR_NOPOK ASC')
				->queryAll();
		} elseif ($jenis=='bphtb') {
			$nopok = $param;
			$daftarnopok = Yii::app()->db->createCommand()
				->SELECT("					
					TBLDAFTAR_NOPOK NOPOK,
					TBLDAFTAR_BADANUSAHANAMA,
					TBLDAFTAR_BADANUSAHAALAMAT,
					('P.' || LPAD(TBLDAFTAR.TBLDAFTAR_NOPOK,7,'0') || '.' || LPAD(TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,2,'0') || '.' || LPAD(TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,2,'0') ) AS NPWPD,
					UPPER(REFBADANUSAHA_REKKETERANGAN_90) JENIS,
					REFBADANUSAHA_REKAYAT AYAT
					")
				->FROM('TBLDAFTAR')
				->join('REFBADANUSAHA_90','TBLDAFTAR.REFBADANUSAHA_IDPEMILIK = REFBADANUSAHA_90.REFBADANUSAHA_ID')
				->where("TBLDAFTAR_NOPOK = :nopok", array(":nopok"=>$nopok))
				->order('TBLDAFTAR_NOPOK ASC')
				->queryAll();
		}

		// var_dump($daftarnopok) ;die();

		foreach ($daftarnopok as $data){

					$ceklapor=$this->ceklaporpajak($data['NOPOK'],$data['AYAT']);
					$cektunggakan=$this->cektunggakanpajak($data['NOPOK'],$data['AYAT']);
					$cekbayar=$this->cekbayarpajak($data['NOPOK'],$data['AYAT']);

					$daftarusaha[]=array(
						'jenispajak'=>$data['JENIS'],
						'npwpd'=>$data['NPWPD'],
						'namausaha'=>$data['TBLDAFTAR_BADANUSAHANAMA'],
						'alamat'=>$data['TBLDAFTAR_BADANUSAHAALAMAT'],
						'belumpelaporanspt'=>$ceklapor,
						'tunggakan'=>$cektunggakan,
						'realisasi'=>$cekbayar
						);
					
		}		
				
		return $daftarusaha;

	}

	public function ceklaporpajak($nopok,$ayat) {

		if ($ayat=='1') {
			$namatabel = 'TBLDAFTHOTEL';
		} elseif ($ayat=='2') {
			$namatabel = 'TBLDAFTRMAKAN';
		} elseif ($ayat=='3') {
			$namatabel = 'TBLDAFTHIBURAN';
		} elseif ($ayat=='4') {
			$namatabel = 'TBLDAFTREKLAME';
		} elseif ($ayat=='5') {
			$namatabel = 'TBLDAFTPJU';
		} elseif ($ayat=='7') {
			$namatabel = 'TBLDAFTPARKIR';
		} elseif ($ayat=='8') {
			$namatabel = 'TBLDAFTTANAH';
		} elseif ($ayat=='9') {
			$namatabel = 'TBLDAFTBURUNG';
		} elseif ($ayat=='11') {
			$namatabel = 'TBLDAFTBPHTB';
		} else {
			$namatabel = '';
		}

		if ($namatabel!='') {
			$ceklapor = Yii::app()->db->createCommand()
				->SELECT("					
					count(TBLPENDATAAN_THNPAJAK)
					")
				->FROM($namatabel)
				->where("TBLPENDATAAN_THNPAJAK > '13' AND TBLDAFTAR_NOPOK LIKE :nopok AND NVL(".$namatabel."_TGLENTRI,0) = 0", array(":nopok"=>$nopok))
				->queryScalar();
		} else {
			$ceklapor = 0;
		}

		if ($ceklapor>0) {
			$reslapor = 'F';
		} else {
			$reslapor = 'T';
		}
		

		return $ceklapor;

	}

	public function cektunggakanpajak($nopok,$ayat) {

		if ($ayat=='1') {
			$namatabel = 'TBLDAFTHOTEL';
		} elseif ($ayat=='2') {
			$namatabel = 'TBLDAFTRMAKAN';
		} elseif ($ayat=='3') {
			$namatabel = 'TBLDAFTHIBURAN';
		} elseif ($ayat=='4') {
			$namatabel = 'TBLDAFTREKLAME';
		} elseif ($ayat=='5') {
			$namatabel = 'TBLDAFTPJU';
		} elseif ($ayat=='7') {
			$namatabel = 'TBLDAFTPARKIR';
		} elseif ($ayat=='8') {
			$namatabel = 'TBLDAFTTANAH';
		} elseif ($ayat=='9') {
			$namatabel = 'TBLDAFTBURUNG';
		} elseif ($ayat=='11') {
			$namatabel = 'TBLDAFTBPHTB';
		} else {
			$namatabel = '';
		}

		if ($namatabel!='') {

			if ($ayat=='4' || $ayat=='8') {

				if ($ayat=='4') {
					$pajakke = " AND NVL(TBLSETOR.TBLPENDATAAN_PAJAKKE,0) = NVL(".$namatabel.".TBLPENDATAAN_PAJAKKE,0)";
				} else {
					$pajakke = '';
				}

				$sqlcektunggakanpokok = "
				SELECT NVL(SUM(".$namatabel.".".$namatabel."_PAJAKSKPD),0) AS POKOK FROM ".$namatabel." WHERE ".$namatabel.".TBLDAFTAR_NOPOK = ".$nopok."
				AND ".$namatabel.".TBLPENDATAAN_THNPAJAK > '13'
				AND ".$namatabel.".TBLPENDATAAN_BLNPAJAK <= '12'
				AND ".$namatabel.".".$namatabel."_PAJAKSKPD > 0
				AND NVL(".$namatabel.".".$namatabel."_NOMORSKPD,0) > 0 
				AND NOT EXISTS (SELECT * FROM TBLSETOR WHERE 
				".$namatabel.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND TBLSETOR.TBLPENDATAAN_THNPAJAK = ".$namatabel.".TBLPENDATAAN_THNPAJAK
				AND NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = NVL(".$namatabel.".TBLPENDATAAN_BLNPAJAK,0)
				AND NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0) = NVL(".$namatabel.".TBLPENDATAAN_TGLPAJAK,0)
				".$pajakke."
				AND TBLSETOR_JNSKETETAPAN IS NULL
				)
				";

				// echo $sqlcektunggakanpokok;die();

				$cektunggakanpokok = Yii::app()->db->createCommand($sqlcektunggakanpokok)->queryScalar(); // cek pokok skpd
				$cektunggakan = $cektunggakanpokok;

			} else {

				$sqlcektunggakanpokok = "
				SELECT NVL(SUM(".$namatabel.".".$namatabel."_PAJAKSKPD),0) AS POKOK FROM ".$namatabel." WHERE ".$namatabel.".TBLDAFTAR_NOPOK = ".$nopok."
				AND ".$namatabel.".TBLPENDATAAN_THNPAJAK > '13'
				AND ".$namatabel.".TBLPENDATAAN_BLNPAJAK <= '12'
				AND NVL(".$namatabel.".".$namatabel."_PAJAKSKPD,0) > 0
				AND NVL(".$namatabel.".".$namatabel."_TGLENTRI,0) > 0
				AND NOT EXISTS (SELECT * FROM TBLSETOR WHERE 
				".$namatabel.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND TBLSETOR.TBLPENDATAAN_THNPAJAK = ".$namatabel.".TBLPENDATAAN_THNPAJAK
				AND TBLSETOR.TBLPENDATAAN_BLNPAJAK = ".$namatabel.".TBLPENDATAAN_BLNPAJAK
				AND NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0) = NVL(".$namatabel.".TBLPENDATAAN_TGLPAJAK,0)
				AND TBLSETOR_JNSKETETAPAN IS NULL
				)
				";

				$cektunggakanpokok = Yii::app()->db->createCommand($sqlcektunggakanpokok)->queryScalar(); // cek pokok spt
				$cektunggakankb = '0';
				$cektunggakanangs = '0';

				if ($ayat=='1' || $ayat=='2' || $ayat=='3' || $ayat=='7') { // cek kb/angs hanya untuk hotel/rest0/hiburan/parkir

					$sqlcektunggakankb = "
					SELECT 
					NVL(SUM(".$namatabel."_RUPIAHKRGBAYAR),0) AS KB
					FROM (
					SELECT ".$namatabel.".TBLPENDATAAN_THNPAJAK,
							".$namatabel.".TBLPENDATAAN_BLNPAJAK,
							".$namatabel.".TBLDAFTAR_NOPOK,
							TBLDAFTAR_NIK,
							".$namatabel.".".$namatabel."_REGKURANGBAYAR,
							".$namatabel."_RUPIAHKRGBAYAR,
							CASE WHEN TBLSETOR.TBLSETOR_JNSKETETAPAN = 'K' THEN
							NVL( TBLSETOR.TBLSETOR_RUPIAHSETOR, 0 ) + NVL( TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0 ) 
							ELSE 0 
							END 
							AS BAYAR,
					TBLANGSURAN.TBLANGSURAN_PAJAKKE AS ANGS
					FROM ".$namatabel." 
					JOIN TBLDAFTAR ON ".$namatabel.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
					LEFT JOIN TBLSETOR ON ".$namatabel.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK 
								AND NVL( ".$namatabel.".TBLPENDATAAN_THNPAJAK, 0 ) = NVL( TBLSETOR.TBLPENDATAAN_THNPAJAK, 0 ) 
								AND NVL( ".$namatabel.".TBLPENDATAAN_BLNPAJAK, 0 ) = NVL( TBLSETOR.TBLPENDATAAN_BLNPAJAK, 0 ) 
								AND NVL( ".$namatabel.".TBLPENDATAAN_TGLPAJAK, 0 ) = NVL( TBLSETOR.TBLPENDATAAN_TGLPAJAK, 0 ) 
								AND NVL( TBLSETOR.TBLSETOR_REKPAJAK, 0 ) = 1 
								AND TBLSETOR.TBLSETOR_JNSKETETAPAN = 'K'
					LEFT JOIN TBLANGSURAN ON ".$namatabel.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK 
								AND NVL( ".$namatabel.".TBLPENDATAAN_THNPAJAK, 0 ) = NVL( TBLANGSURAN.TBLPENDATAAN_THNPAJAK, 0 ) 
								AND NVL( ".$namatabel.".TBLPENDATAAN_BLNPAJAK, 0 ) = NVL( TBLANGSURAN.TBLPENDATAAN_BLNPAJAK, 0 ) 
								AND NVL( ".$namatabel.".TBLPENDATAAN_TGLPAJAK, 0 ) = NVL( TBLANGSURAN.TBLPENDATAAN_TGLPAJAK, 0 ) 
								AND NVL( TBLANGSURAN.TBLANGSURAN_PAJAKKE, 0 ) = 1
								
					WHERE ".$namatabel.".TBLDAFTAR_NOPOK IS NOT NULL
					AND ".$namatabel.".TBLPENDATAAN_THNPAJAK > '13' 
							AND NVL( ".$namatabel.".".$namatabel."_REGKURANGBAYAR, 0 ) <> 0 
							AND NVL( ".$namatabel.".".$namatabel."_REGSURATANGSUR, 0 ) = 0
					ORDER BY
					".$namatabel.".TBLDAFTAR_NOPOK,
							".$namatabel.".TBLPENDATAAN_THNPAJAK,
							".$namatabel.".TBLPENDATAAN_BLNPAJAK

					) TABKB WHERE BAYAR = 0
					AND ANGS IS NULL
					AND TBLDAFTAR_NOPOK = ".$nopok."
					GROUP BY TBLDAFTAR_NOPOK
					";

					$cektunggakankb = Yii::app()->db->createCommand($sqlcektunggakankb)->queryScalar(); // cek kb

					$sqlcektunggakanangs = "
					SELECT
						NVL(SUM((TBLANGSURAN_ANGSURAN + TBLANGSURAN_BUNGAANGSURAN)),0) 
					FROM
						TBLANGSURAN 
					WHERE
						TBLDAFTAR_NOPOK = ".$nopok."
						AND TBLPENDATAAN_THNPAJAK > '13' 
						AND NVL( TBLANGSURAN_SETORAN, 0 ) = 0 
					GROUP BY
						TBLDAFTAR_NOPOK
					";

					$cektunggakanangs = Yii::app()->db->createCommand($sqlcektunggakanangs)->queryScalar(); // cek angs

				}

				
				$cektunggakan = $cektunggakanpokok+$cektunggakankb+$cektunggakanangs;

			}

				

		} else {
			$cektunggakan = 0;
		}
		
		if ($cektunggakan>0) {
			$reslapor = 'F';
		} else {
			$reslapor = 'T';
		}

		return $cektunggakan;
	}

	public function cekbayarpajak($nopok,$ayat) {

		if ($ayat=='1') {
			$namatabel = 'TBLDAFTHOTEL';
		} elseif ($ayat=='2') {
			$namatabel = 'TBLDAFTRMAKAN';
		} elseif ($ayat=='3') {
			$namatabel = 'TBLDAFTHIBURAN';
		} elseif ($ayat=='4') {
			$namatabel = 'TBLDAFTREKLAME';
		} elseif ($ayat=='5') {
			$namatabel = 'TBLDAFTPJU';
		} elseif ($ayat=='7') {
			$namatabel = 'TBLDAFTPARKIR';
		} elseif ($ayat=='8') {
			$namatabel = 'TBLDAFTTANAH';
		} elseif ($ayat=='9') {
			$namatabel = 'TBLDAFTBURUNG';
		} elseif ($ayat=='11') {
			$namatabel = 'TBLDAFTBPHTB';
		} else {
			$namatabel = '';
		}

		if ($namatabel!='') {

			if ($ayat=='4' || $ayat=='8') {

				if ($ayat=='4') {
					$pajakke = " AND NVL(TBLSETOR.TBLPENDATAAN_PAJAKKE,0) = NVL(".$namatabel.".TBLPENDATAAN_PAJAKKE,0)";
				} else {
					$pajakke = '';
				}

				$sqlcekbayarpokok = "
				SELECT NVL(sum(".$namatabel.".".$namatabel."_PAJAKSKPD),0) FROM ".$namatabel." WHERE ".$namatabel.".TBLDAFTAR_NOPOK = ".$nopok."
				AND ".$namatabel.".TBLPENDATAAN_THNPAJAK >= '12'
				AND EXISTS (SELECT * FROM TBLSETOR WHERE 
				".$namatabel.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND TBLSETOR.TBLPENDATAAN_THNPAJAK = ".$namatabel.".TBLPENDATAAN_THNPAJAK
				AND TBLSETOR.TBLPENDATAAN_BLNPAJAK = ".$namatabel.".TBLPENDATAAN_BLNPAJAK
				AND NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0) = NVL(".$namatabel.".TBLPENDATAAN_TGLPAJAK,0)
				".$pajakke."
				AND TBLSETOR_JNSBAYAR LIKE '%SKPD%'
				)
				";

				$cekbayar = Yii::app()->db->createCommand($sqlcekbayarpokok)->queryScalar();

			} else {

				$sqlcekbayarpokok = "
				SELECT NVL(sum(".$namatabel.".".$namatabel."_PAJAKSKPD),0) FROM ".$namatabel." WHERE ".$namatabel.".TBLDAFTAR_NOPOK = ".$nopok."
				AND ".$namatabel.".TBLPENDATAAN_THNPAJAK >= '12'
				AND EXISTS (SELECT * FROM TBLSETOR WHERE 
				".$namatabel.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND TBLSETOR.TBLPENDATAAN_THNPAJAK = ".$namatabel.".TBLPENDATAAN_THNPAJAK
				AND TBLSETOR.TBLPENDATAAN_BLNPAJAK = ".$namatabel.".TBLPENDATAAN_BLNPAJAK
				AND NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0) = NVL(".$namatabel.".TBLPENDATAAN_TGLPAJAK,0)
				AND TBLSETOR_JNSBAYAR LIKE '%SPTPD%'
				)
				";

				$cekbayar = Yii::app()->db->createCommand($sqlcekbayarpokok)->queryScalar();
			}


		} else {
			$cekbayar = 0;
		}
		
		if ($cekbayar>0) {
			$reslapor = 'F';
		} else {
			$reslapor = 'T';
		}

		return $cekbayar;
	}

	public function actiongettagihanrealisasi() {

		header('Content-Type: application/json');

		$sqlrek = "SELECT
			TBLREKENING_KODE,
			TBLREKENING_NAMAREKENING,
			TBLREKENING_REKAYAT 
		FROM
			TBLREKENING_90 
		WHERE
			TBLREKENING_REKPAJAK = 1 
			AND TBLREKENING_REKAYAT > 0
			AND TBLREKENING_REKAYAT <> 10
			AND TBLREKENING_REKAYAT <> 23 
			AND TBLREKENING_REKJENIS = 0 
			AND TBLREKENING_REKPAD = 1 
		GROUP BY
			TBLREKENING_KODE,
			TBLREKENING_NAMAREKENING,
			TBLREKENING_REKAYAT 
		ORDER BY
			TBLREKENING_REKAYAT,
			TBLREKENING_KODE";
		$sqlrekening = Yii::app()->db->createCommand($sqlrek)->queryAll();

		foreach ($sqlrekening as $data) {

			$gettunggakan = $this->gettunggakanrekening($data['TBLREKENING_REKAYAT']);
			$getrealisasi = $this->getrealisasirekening($data['TBLREKENING_REKAYAT']);

			$daftarrekening[]=array(
						'kode'=>$data['TBLREKENING_KODE'],
						'nama'=>$data['TBLREKENING_NAMAREKENING'],
						'tunggakan'=>$gettunggakan,
						'realisasi'=>$getrealisasi
						);
		}

		echo CJSON::encode(array( 'status'=>'success',
					'data'=>$daftarrekening
					 ) );
					Yii::app()->end();
	}

	public function gettunggakanrekening($rek) {
		if ($rek=='1') {
			$namatabel = 'TBLDAFTHOTEL';
		} elseif ($rek=='2') {
			$namatabel = 'TBLDAFTRMAKAN';
		} elseif ($rek=='3') {
			$namatabel = 'TBLDAFTHIBURAN';
		} elseif ($rek=='4') {
			$namatabel = 'TBLDAFTREKLAME';
		} elseif ($rek=='5') {
			$namatabel = 'TBLDAFTPJU';
		} elseif ($rek=='7') {
			$namatabel = 'TBLDAFTPARKIR';
		} elseif ($rek=='8') {
			$namatabel = 'TBLDAFTTANAH';
		} elseif ($rek=='9') {
			$namatabel = 'TBLDAFTBURUNG';
		} elseif ($rek=='11') {
			$namatabel = 'TBLDAFTBPHTB';
		} else {
			$namatabel = '';
		}

		$tahun = substr(date('Y'), -2);

		if ($rek=='4' || $rek=='8') {

			if ($rek=='4') {
					$pajakke = " AND NVL(TBLSETOR.TBLPENDATAAN_PAJAKKE,0) = NVL(".$namatabel.".TBLPENDATAAN_PAJAKKE,0)";
				} else {
					$pajakke = '';
				}

			$sqltunggakanrekening = "
				SELECT NVL(SUM(".$namatabel.".".$namatabel."_PAJAKSKPD),0) AS POKOK FROM ".$namatabel." WHERE 
				".$namatabel.".TBLPENDATAAN_THNPAJAK = ".$tahun."
				AND ".$namatabel.".TBLPENDATAAN_BLNPAJAK <= '12'
				AND ".$namatabel.".".$namatabel."_PAJAKSKPD > 0
				AND NVL(".$namatabel.".".$namatabel."_NOMORSKPD,0) > 0 
				AND NOT EXISTS (SELECT * FROM TBLSETOR WHERE 
				".$namatabel.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND TBLSETOR.TBLPENDATAAN_THNPAJAK = ".$namatabel.".TBLPENDATAAN_THNPAJAK
				AND NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = NVL(".$namatabel.".TBLPENDATAAN_BLNPAJAK,0)
				AND NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0) = NVL(".$namatabel.".TBLPENDATAAN_TGLPAJAK,0)
				".$pajakke."
				AND TBLSETOR_JNSKETETAPAN IS NULL
				)
				";

				// echo $sqlcektunggakanpokok;die();

				$restunggakan = Yii::app()->db->createCommand($sqltunggakanrekening)->queryScalar();

		} else {
			$sqltunggakanrekening = "SELECT NVL(SUM(".$namatabel.".".$namatabel."_PAJAKSKPD),0) AS POKOK FROM ".$namatabel." 
			WHERE ".$namatabel.".TBLPENDATAAN_THNPAJAK = ".$tahun."
				AND ".$namatabel.".TBLPENDATAAN_BLNPAJAK <= '12'
				AND NVL(".$namatabel.".".$namatabel."_PAJAKSKPD,0) > 0
				AND NVL(".$namatabel.".".$namatabel."_TGLENTRI,0) > 0
				AND NOT EXISTS (SELECT * FROM TBLSETOR WHERE 
				".$namatabel.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND TBLSETOR.TBLPENDATAAN_THNPAJAK = ".$namatabel.".TBLPENDATAAN_THNPAJAK
				AND TBLSETOR.TBLPENDATAAN_BLNPAJAK = ".$namatabel.".TBLPENDATAAN_BLNPAJAK
				AND NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0) = NVL(".$namatabel.".TBLPENDATAAN_TGLPAJAK,0)
				AND TBLSETOR_JNSKETETAPAN IS NULL
				)";
		
			$restunggakan = Yii::app()->db->createCommand($sqltunggakanrekening)->queryScalar();
		}


		return $restunggakan;

	}

	public function getrealisasirekening($rek) {
		if ($rek=='1') {
			$namatabel = 'TBLDAFTHOTEL';
		} elseif ($rek=='2') {
			$namatabel = 'TBLDAFTRMAKAN';
		} elseif ($rek=='3') {
			$namatabel = 'TBLDAFTHIBURAN';
		} elseif ($rek=='4') {
			$namatabel = 'TBLDAFTREKLAME';
		} elseif ($rek=='5') {
			$namatabel = 'TBLDAFTPJU';
		} elseif ($rek=='7') {
			$namatabel = 'TBLDAFTPARKIR';
		} elseif ($rek=='8') {
			$namatabel = 'TBLDAFTTANAH';
		} elseif ($rek=='9') {
			$namatabel = 'TBLDAFTBURUNG';
		} elseif ($rek=='11') {
			$namatabel = 'TBLDAFTBPHTB';
		} else {
			$namatabel = '';
		}

		$tahun = substr(date('Y'), -2);

		if ($rek=='4' || $rek=='8') {

			if ($rek=='4') {
					$pajakke = " AND NVL(TBLSETOR.TBLPENDATAAN_PAJAKKE,0) = NVL(".$namatabel.".TBLPENDATAAN_PAJAKKE,0)";
				} else {
					$pajakke = '';
				}

			$sqltunggakanrekening = "
				SELECT NVL(SUM(".$namatabel.".".$namatabel."_PAJAKSKPD),0) AS POKOK FROM ".$namatabel." WHERE 
				".$namatabel.".TBLPENDATAAN_THNPAJAK = ".$tahun."
				AND ".$namatabel.".TBLPENDATAAN_BLNPAJAK <= '12'
				AND ".$namatabel.".".$namatabel."_PAJAKSKPD > 0
				AND NVL(".$namatabel.".".$namatabel."_NOMORSKPD,0) > 0 
				AND EXISTS (SELECT * FROM TBLSETOR WHERE 
				".$namatabel.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND TBLSETOR.TBLPENDATAAN_THNPAJAK = ".$namatabel.".TBLPENDATAAN_THNPAJAK
				AND NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = NVL(".$namatabel.".TBLPENDATAAN_BLNPAJAK,0)
				AND NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0) = NVL(".$namatabel.".TBLPENDATAAN_TGLPAJAK,0)
				".$pajakke."
				AND TBLSETOR_JNSKETETAPAN IS NULL
				)
				";

				$restunggakan = Yii::app()->db->createCommand($sqltunggakanrekening)->queryScalar();

		} else {
			$sqltunggakanrekening = "SELECT NVL(SUM(".$namatabel.".".$namatabel."_PAJAKSKPD),0) AS POKOK FROM ".$namatabel." 
			WHERE ".$namatabel.".TBLPENDATAAN_THNPAJAK = ".$tahun."
				AND ".$namatabel.".TBLPENDATAAN_BLNPAJAK <= '12'
				AND NVL(".$namatabel.".".$namatabel."_PAJAKSKPD,0) > 0
				AND NVL(".$namatabel.".".$namatabel."_TGLENTRI,0) > 0
				AND EXISTS (SELECT * FROM TBLSETOR WHERE 
				".$namatabel.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND TBLSETOR.TBLPENDATAAN_THNPAJAK = ".$namatabel.".TBLPENDATAAN_THNPAJAK
				AND TBLSETOR.TBLPENDATAAN_BLNPAJAK = ".$namatabel.".TBLPENDATAAN_BLNPAJAK
				AND NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0) = NVL(".$namatabel.".TBLPENDATAAN_TGLPAJAK,0)
				AND TBLSETOR_JNSKETETAPAN IS NULL
				)";
		
			$restunggakan = Yii::app()->db->createCommand($sqltunggakanrekening)->queryScalar();
		}


		return $restunggakan;

	}

	public function actiongetrekapjmlwp5tahun() {

		header('Content-Type: application/json');
		
		$sqltahun = "SELECT TO_CHAR(SYSDATE,'YYYY')-LEVEL+1 AS TAHUN FROM
		DUAL
		CONNECT BY LEVEL <= 5";

		$restahun = Yii::app()->db->createCommand($sqltahun)->queryAll();

		foreach ($restahun as $data) {

			$paramtahun = substr($data['TAHUN'], -2);

			$rekening = $this->getrekeningrekap($paramtahun);

			$daftartahunan[]=array(
						'tahun'=>$data['TAHUN'],
						'rekening'=>$rekening
						);
		}

		echo CJSON::encode(array( 'status'=>'success',
					'data'=>$daftartahunan
					 ) );
					Yii::app()->end();
	}

	public function getrekeningrekap($tahun) {

		$sqlrek = "SELECT
				TBLREKENING_KODE,
				TBLREKENING_NAMAREKENING,
				TBLREKENING_REKAYAT 
			FROM
				TBLREKENING_90 
			WHERE
				TBLREKENING_REKPAJAK = 1 
				AND TBLREKENING_REKAYAT > 0
				AND TBLREKENING_REKAYAT <> 10
				AND TBLREKENING_REKAYAT <> 23 
				AND TBLREKENING_REKJENIS = 0 
				AND TBLREKENING_REKPAD = 1 
			GROUP BY
				TBLREKENING_KODE,
				TBLREKENING_NAMAREKENING,
				TBLREKENING_REKAYAT 
			ORDER BY
				TBLREKENING_REKAYAT,
				TBLREKENING_KODE";
			$sqlrekening = Yii::app()->db->createCommand($sqlrek)->queryAll();

			foreach ($sqlrekening as $rek) {

				$getjumlahwp = $this->getjumlahwptahun($rek['TBLREKENING_REKAYAT'],$tahun);

				$daftarrekening[]=array(
						'kode'=>$rek['TBLREKENING_KODE'],
						'nama'=>$rek['TBLREKENING_NAMAREKENING'],
						'jumlah'=>$getjumlahwp
						);
			}

			return $daftarrekening;
	}

	public function getjumlahwptahun($ayat,$thn) {
		$tahun = substr($thn, -2);
		$sqljmlwp = "SELECT					
				count(TBLDAFTAR_NOPOK) JML
				-- tbldaftar_tahunkukuh, 
				-- (SELECT REFKECAMATAN_NAMA FROM REFKECAMATAN WHERE tblkecamatan_idbadanusaha = refkecamatan_id) AS NM_KEC,
				-- (SELECT REFKELURAHAN_NAMA FROM REFKELURAHAN WHERE tblkecamatan_idbadanusaha = refkecamatan_id 
				-- AND tblkelurahan_idbadanusaha = refkelurahan_id) AS NM_KEL,
				-- tblkecamatan_idbadanusaha,tblkelurahan_idbadanusaha
				FROM TBLDAFTAR
				join REFBADANUSAHA_90 ON TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA = REFBADANUSAHA_90.REFBADANUSAHA_ID
				where REFBADANUSAHA_REKAYAT = ".$ayat."
				AND TBLDAFTAR_ISAKTIF = 'Y' and tbldaftar_tahunkukuh = ".$tahun."
				-- GROUP BY tbldaftar_tahunkukuh,tblkecamatan_idbadanusaha,tblkelurahan_idbadanusaha
				-- order by tbldaftar_tahunkukuh,tblkecamatan_idbadanusaha,tblkelurahan_idbadanusaha";
		$sqljmlhwp = Yii::app()->db->createCommand($sqljmlwp)->queryScalar();
		// $daftarkeckel = array();

		// foreach ($sqljmlhwp as $data) {

		// 		$daftarkeckel[]=array(
		// 				'kecamatan'=>$data['NM_KEC'],
		// 				'kelurahan'=>$data['NM_KEL'],
		// 				'jml'=>$data['JML']
		// 				);
		// 	}

		return $sqljmlhwp;

	}

	public function actiongetbphtbsample()
	{
		header('Content-Type: application/json');
		$sql = "SELECT 
			TBLDAFTBPHTB.TBLDAFTAR_NOPOK nopok, 
			TBLDAFTBPHTB.TBLDAFTBPHTB_NOP1 || '.' || 
			TBLDAFTBPHTB.TBLDAFTBPHTB_NOP2 || '.' || 
			LPAD(TBLDAFTBPHTB.TBLDAFTBPHTB_NOP3,3,'0') || '.' || 
			LPAD(TBLDAFTBPHTB.TBLDAFTBPHTB_NOP4,3,'0') || '.' || 
			LPAD(TBLDAFTBPHTB.TBLDAFTBPHTB_NOP5,3,'0') || '.' || 
			LPAD(TBLDAFTBPHTB.TBLDAFTBPHTB_NOP6,4,'0') || '.' || 
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_NOP7,'0') nop, 
			TBLDAFTBPHTB.TBLPENDATAAN_THNPAJAK thnpajak, 
			TBLDAFTBPHTB.TBLPENDATAAN_BLNPAJAK blnpajak,
			TBLDAFTBPHTB.TBLDAFTBPHTB_TGLSPTPD tglspt, 
			TBLDAFTBPHTB.TBLDAFTBPHTB_BLNSPTPD blnspt, 
			TBLDAFTBPHTB.TBLDAFTBPHTB_THNSPTPD thnspt, 
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_PERSENRINGAN,'0') ringan, 
			TBLDAFTBPHTB.TBLDAFTBPHTB_LUASTANAH lt, 
			TBLDAFTBPHTB.TBLDAFTBPHTB_NJOPTANAH njopt, 
			TBLDAFTBPHTB.TBLDAFTBPHTB_LUASBANGUNAN lb, 
			TBLDAFTBPHTB.TBLDAFTBPHTB_NJOPBANGUNAN njopb, 
			TBLDAFTBPHTB.TBLDAFTBPHTB_NILAIJUAL njpbb, 
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_NILAIPASAR,'0') pasar, 
			TBLDAFTBPHTB.TBLDAFTBPHTB_OMSETPAJAK npop, 
			TBLDAFTBPHTB.TBLDAFTBPHTB_PERSENTARIF tarif, 
			TBLDAFTBPHTB.TBLDAFTBPHTB_PAJAK total, 
			TBLDAFTBPHTB.TBLDAFTBPHTB_PAJAKSKPD totalskpd, 
			TBLDAFTBPHTB.TBLDAFTBPHTB_NOSERTIFIKAT sertifikat, 
			TBLDAFTBPHTB.TBLDAFTBPHTB_REKAYAT ayat, 
			TBLDAFTBPHTB.TBLDAFTBPHTB_REKJENIS jenis
		FROM
			TBLDAFTBPHTB
		WHERE
			TBLPENDATAAN_THNPAJAK = 21 AND TBLPENDATAAN_BLNPAJAK = 3 AND 
			TBLDAFTAR_NOPOK = 923069";
		$res = Yii::app()->db->createCommand($sql)->queryRow();

		$getdetailnop = $this->getdetailnop($res['THNPAJAK'],$res['BLNPAJAK'],$res['NOPOK']);

		$data = CJSON::encode(array(
					'nopok'=>$res['NOPOK'],
					'nop'=>$res['NOP'],
					'thnpajak'=>$res['THNPAJAK'],
					'blnpajak'=>$res['BLNPAJAK'],
					'tglspt'=>$res['TGLSPT'].'-'.sprintf('%02d',$res['BLNSPT']).'-20'.$res['THNSPT'],
					'keringananan' =>$res['RINGAN'],
					'luastanah'=>$res['LT'],
					'luasbangunan'=>$res['LB'],
					'njoptanah'=>$res['NJOPT'],
					'njopbangunan'=>$res['NJOPB'],
					'njpbb'=>$res['NJPBB'],
					'nilaipasar'=>$res['PASAR'],
					'npop'=>$res['NPOP'],
					'tarif'=>$res['TARIF'],
					'total'=>$res['TOTAL'],
					'sertifikat'=>$res['SERTIFIKAT'],
					'ayat'=>$res['AYAT'],
					'jenis'=>$res['JENIS'],
					'detailnop'=>$getdetailnop
					));
		echo $data;
		// echo base64_encode($data);
	}

	public function actiongetjenisbphtb()
	{
		header('Content-Type: application/json');
		$sql = "SELECT TBLREKENING_KODE kode,TBLREKENING_REKAYAT ayat, TBLREKENING_REKJENIS jenis,TRIM(TBLREKENING_NAMAREKENING) nama FROM TBLREKENING_90 WHERE TBLREKENING_REKAYAT = 11 AND TBLREKENING_REKJENIS <> 0 ORDER BY TBLREKENING_REKJENIS";
		$res = Yii::app()->db->createCommand($sql)->queryAll();
		echo CJSON::encode(
					$res
				);
	}

	public function getdetailnop($thn,$bln,$nopok)
	{
		$sql = "SELECT TBLDAFTARNOP_URUT URUT,TBLDAFTARNOP_NOP1 || '.' || 
				TBLDAFTARNOP_NOP2 || '.' ||
				LPAD(TBLDAFTARNOP_NOP3,3,'0') || '.' ||
				LPAD(TBLDAFTARNOP_NOP4,3,'0') || '.' ||
				LPAD(TBLDAFTARNOP_NOP5,3,'0') || '.' ||
				LPAD(TBLDAFTARNOP_NOP6,4,'0') || '.' ||
				TBLDAFTARNOP_NOP7 NOP FROM TBLDAFTARNOP WHERE TBLPENDATAAN_THNPAJAK = {$thn} AND TBLPENDATAAN_BLNPAJAK = {$bln} AND TBLDAFTAR_NOPOK = {$nopok} AND TBLDAFTARNOP_NOP1 IS NOT NULL";
		$res = Yii::app()->db->createCommand($sql)->queryAll();

		foreach ($res as $key) {
			$daftarnop[]=array(
						'nomor'=>$key['URUT'],
						'nop'=>$key['NOP']
						);
		}

		return $daftarnop;
	}

	public function actioninsertbphtb()
	{

		$user = $_SERVER['PHP_AUTH_USER'];
		$key = $_SERVER['PHP_AUTH_PW'];

		if (Yii::app()->params['userapi']==$user && Yii::app()->params['passapi']==$key) {
		
		$postraw = base64_decode(Yii::app()->request->getParam('data'));

		$data = CJSON::decode($postraw);

		$tglspt = explode('-', $data['tglspt']);
		$nop_exp = explode('.', $data['nop']);

		$cek = $this->cekPernahDaftar($data['thnpajak'], $data['blnpajak'], $data['nopok']);

		$column = array('TBLPENDATAAN_THNPAJAK'=>substr($data['thnpajak'], -2)
				    ,'TBLPENDATAAN_BLNPAJAK'=>$data['blnpajak']
				    ,'TBLPENDATAAN_TGLPAJAK'=>0
				    ,'TBLDAFTAR_NOPOK'=>$data['nopok']
				    ,'TBLDAFTAR_JNSPENDAPATAN'=>'P'
				    ,'TBLDAFTAR_GOLONGAN'=>1
				    ,'TBLDAFTBPHTB_REKURUSAN'=>1
				    ,'TBLDAFTBPHTB_REKPEMERINTAHAN'=>20
				    ,'TBLDAFTBPHTB_REKORGANISASI'=>1
				    ,'TBLDAFTBPHTB_REKPROGRAM'=>20
				    ,'TBLDAFTBPHTB_REKKEGIATAN'=>26
				    ,'TBLDAFTBPHTB_REKDINAS'=>0
				    ,'TBLDAFTBPHTB_REKBIDANG'=>0
				    ,'TBLDAFTBPHTB_REKPENDAPATAN'=>4
				    ,'TBLDAFTBPHTB_REKPAD'=>1
				    ,'TBLDAFTBPHTB_REKPAJAK'=>1
				    ,'TBLDAFTBPHTB_REKAYAT'=>11
				    ,'TBLDAFTBPHTB_REKJENIS'=>$data['jenis']
				    ,'TBLKECAMATAN_ID'=>''//$kecamatan_pajak
				    ,'TBLKELURAHAN_ID'=>''//$kelurahan_pajak
				    //,'TBLDAFTBPHTB_ISKAS'=>$is_kas
				    //,'TBLDAFTBPHTB_ISPEMBUKUAN'=>$is_pembukuan
				    // /,'TBLDAFTBPHTB_ISNOTA'=>$is_nota
				    // ,'TBLDAFTBPHTB_ISLHP'=>$is_lhp
				    // ,'TBLDAFTBPHTB_ISNOTABIL'=>$is_notabil
				    ,'TBLDAFTBPHTB_ISJNSPENETAPAN'=>'S'
				    ,'TBLDAFTBPHTB_THNMULAIJUAL'=>null //substr($arr_tglawal[2], -2)
				    ,'TBLDAFTBPHTB_BLNMULAIJUAL'=>null //$arr_tglawal[1]
				    ,'TBLDAFTBPHTB_TGLMULAIJUAL'=>null //$arr_tglawal[0]
				    ,'TBLDAFTBPHTB_THNAKHIRJUAL'=>null //substr($arr_tglakhir[2], -2)
				    ,'TBLDAFTBPHTB_BLNAKHIRJUAL'=>null //$arr_tglakhir[1]
				    ,'TBLDAFTBPHTB_TGLAKHIRJUAL'=>null //$arr_tglakhir[0]
				    ,'TBLDAFTBPHTB_JUMLAHHARIJUAL'=>null
				    ,'TBLDAFTBPHTB_OMSETPAJAK'=>$data['npop']
				    ,'TBLDAFTBPHTB_PERSENTARIF'=>$data['tarif']
				    ,'TBLDAFTBPHTB_PAJAK'=>$data['total']
				    ,'TBLDAFTBPHTB_PAJAKSKPD'=>$data['total']
				    ,'TBLDAFTBPHTB_THNSPTPD'=>substr($tglspt[2], -2)
				    ,'TBLDAFTBPHTB_BLNSPTPD'=>int($tglspt[1])
				    ,'TBLDAFTBPHTB_TGLSPTPD'=>$tglspt[0]
				    ,'TBLDAFTBPHTB_THNTERIMA'=>substr($tglspt[2],-2)
				    ,'TBLDAFTBPHTB_BLNTERIMA'=>int($tglspt[1])
				    ,'TBLDAFTBPHTB_TGLTERIMA'=>$tglspt[0]
				    ,'TBLDAFTBPHTB_THNBATASSPTPD'=>substr($tglspt[2],-2)
				    ,'TBLDAFTBPHTB_BLNBATASSPTPD'=>int($tglspt[1])
				    ,'TBLDAFTBPHTB_TGLBATASSPTPD'=>$tglspt[0]
				    ,'TBLDAFTBPHTB_THNENTRI'=>substr($tglspt[2],-2)
				    ,'TBLDAFTBPHTB_BLNENTRI'=>int($tglspt[1])
				    ,'TBLDAFTBPHTB_TGLENTRI'=>$tglspt[0]
				    ,'TBLDAFTBPHTB_BUNGASPTPD'=>null

				    ,'TBLDAFTBPHTB_NOP1'=>$nop_exp[0]
				    ,'TBLDAFTBPHTB_NOP2'=>$nop_exp[1]
				    ,'TBLDAFTBPHTB_NOP3'=>$nop_exp[2]
				    ,'TBLDAFTBPHTB_NOP4'=>$nop_exp[3]
				    ,'TBLDAFTBPHTB_NOP5'=>$nop_exp[4]
				    ,'TBLDAFTBPHTB_NOP6'=>$nop_exp[5]
				    ,'TBLDAFTBPHTB_NOP7'=>$nop_exp[6]
				    ,'TBLDAFTBPHTB_LUASTANAH'=>$data['luastanah']
				    ,'TBLDAFTBPHTB_LUASBANGUNAN'=>$data['luasbangunan']
				    ,'TBLDAFTBPHTB_NJOPTANAH'=>$data['njoptanah']
				    ,'TBLDAFTBPHTB_NJOPBANGUNAN'=>$data['njopbangunan']
				    ,'TBLDAFTBPHTB_HARGATANAH'=>$data['luastanah'] * $data['njoptanah']
				    ,'TBLDAFTBPHTB_HARGABANGUNAN'=>$data['luasbangunan'] * $data['njopbangunan']
				    ,'TBLDAFTBPHTB_NILAIJUAL'=>$data['njpbb']
				    ,'TBLDAFTBPHTB_NILAIPASAR'=>$data['nilaipasar']
				    ,'TBLDAFTBPHTB_JNSBPHTB'=>$data['jenis']
				    ,'TBLDAFTBPHTB_NOSERTIFIKAT'=>$data['sertifikat']
				    ,'TBLDAFTBPHTB_PERSENRINGAN'=>$data['keringananan']
				);

		$command = Yii::app()->db->createCommand();

		$deletedulu = $command
		->delete("TBLDAFTARNOP", 
			'
			TBLPENDATAAN_THNPAJAK=:thn
			AND TBLPENDATAAN_BLNPAJAK=:bln
			AND NVL(TBLPENDATAAN_TGLPAJAK,0)=:tgl
			AND TBLDAFTAR_NOPOK=:nopok
			', 
			array(
				':thn'   => substr($data['thnpajak'], -2),
				':bln'   => $data['blnpajak'],
				':tgl'   => 0,
				':nopok' => $data['nopok'],
			)
		);	

		foreach ($data['detailnop'] as $row) {
			$datanop = $row['nop'];
			$dataurut = $row['nomor'];
			// $nop = $n['tbldaftarnop_nop'];
		$nop_exp = explode('.', $datanop);
		$nop_1 = isset($nop_exp[0]) ? $nop_exp[0] : null;
		$nop_2 = isset($nop_exp[1]) ? $nop_exp[1] : null;
		$nop_3 = isset($nop_exp[2]) ? $nop_exp[2] : null;
		$nop_4 = isset($nop_exp[3]) ? $nop_exp[3] : null;
		$nop_5 = isset($nop_exp[4]) ? $nop_exp[4] : null;
		$nop_6 = isset($nop_exp[5]) ? $nop_exp[5] : null;
		$nop_7 = isset($nop_exp[6]) ? $nop_exp[6] : null;

			$data_column[] = array(
				'TBLPENDATAAN_THNPAJAK'  => $data['thnpajak'],
				'TBLPENDATAAN_BLNPAJAK'  => $data['blnpajak'],
				'TBLPENDATAAN_TGLPAJAK'  => 0,
				'TBLDAFTAR_NOPOK'        => $data['nopok'],
				'TBLDAFTARNOP_URUT'      => $dataurut,
				'TBLDAFTARNOP_NOP'      => $datanop,
				'TBLDAFTARNOP_NOP1'       => $nop_1,
				'TBLDAFTARNOP_NOP2'       => $nop_2,
				'TBLDAFTARNOP_NOP3'       => $nop_3,
				'TBLDAFTARNOP_NOP4'       => $nop_4,
				'TBLDAFTARNOP_NOP5'       => $nop_5,
				'TBLDAFTARNOP_NOP6'       => $nop_6,
				'TBLDAFTARNOP_NOP7'       => $nop_7,
				'TBLDAFTARNOP_SYSINSERT' => DMOrcl::getNow(),
			);

		}

		foreach ($data_column as $key => $rs) :
			$simpan = $command->insert("TBLDAFTARNOP", 
				$rs
			);
        endforeach;

		if ($cek>0) {
			$res['data'] = 'ada';
			$command = Yii::app()->db->createCommand();

			$simpan = $command->update('TBLDAFTBPHTB', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPAJAK AND TBLPENDATAAN_BLNPAJAK =:BLNPAJAK AND NVL(TBLPENDATAAN_TGLPAJAK, 0) =:TGLPAJAK',array(':NOPOK' => $data['nopok'], ':THNPAJAK' =>substr($data['thnpajak'], -2), ':BLNPAJAK' => $data['blnpajak'], ':TGLPAJAK' => 0));
			if ($simpan) {
				echo CJSON::encode(array('code'=>'00','message'=>'Update berhasil'));
			}else{
				echo CJSON::encode(array('code'=>'99','message'=>'Update gagal'));
			}
		} else {
			$res['data'] = 'tidak';
			$insert = Yii::app()->db->createCommand();
			$simpan = $insert->insert('TBLDAFTBPHTB', $column);
			if ($simpan) {
				echo CJSON::encode(array('code'=>'00','message'=>'Simpan berhasil'));
			}else{
				echo CJSON::encode(array('code'=>'99','message'=>'Simpan gagal'));
			}
		}

		} else {
			echo CJSON::encode(array('code'=>'04','message'=>'Otorisasi salah'));
		}
	}

	public function cekPernahDaftar($thn, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTBPHTB WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)= 0 AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;
	}

	public function actiongettagihanketetapan()
	{
		header('Content-Type: application/json');
		header("Access-Control-Allow-Methods: POST");
		// $user = $_SERVER['PHP_AUTH_USER'];
		// $key = $_SERVER['PHP_AUTH_PW'];
		$idbilling = Yii::app()->request->getParam('IDBILLING');
		$token = Yii::app()->request->getParam('TOKEN');

		if (empty($idbilling)) {
			echo CJSON::encode(array('responsecode'=>'05','summarytext'=>'PARAMETER TIDAK LENGKAP'));
			Yii::app()->end();
		}

		if ($idbilling=='3471201250110002') {
			echo CJSON::encode(array('responsecode'=>'02','summarytext'=>'TAGIHAN SUDAH LUNAS'));
			Yii::app()->end();
		}

		if (Yii::app()->params['passapitoken']==$token) {
			$data = CJSON::encode(array(

						'IDBILING'=>'3471201250110001',
						'NPWPD'=>'P.3.0017472.11.31',
						'NAMAOP'=>'ZEST HOTEL/ PT. INDRA ANGGIRA SARI',
						'ALAMATOP'=>'JL. GAJAH MADA NO.28 YOGYAKARTA',
						'NAMAWP'=>'ADRIANSYAH AKBAR',
						'ALAMATWP'=>'JL. MINYAK RAYA NO. 6A RT/RW 03/06 DUREN TIGA PANCORAN JAKARTA SELATAN',
						'BULANPAJAK'=>'12',
						'TAHUNPAJAK'=>'2020',
						'JENISPAJAK'=>'01',
						'MASAPAJAK'=>'2020',
						'URAIANKEG'=>'HOTEL BINTANG DUA',
						'TGLPENETAPAN'=>'2022-01-18',
						'TGLJATUHTEMPO'=>'2022-02-18',
						'NOSSPD'=>'',
						'TAGIHANPOKOK'=>'165765221',
						'DENDA'=>'0',
						'summarytext'=>'SUCCESS',
						'responsecode'=>'00'
						));
			echo $data;
			Yii::app()->end();
		} else {
				echo CJSON::encode(array('responsecode'=>'04','summarytext'=>'AUTHENTIFICATION ERROR'));
		}

	}

	public function actionbayartagihanketetapan()
	{
		header('Content-Type: application/json');
		header("Access-Control-Allow-Methods: POST");
		// $user = $_SERVER['PHP_AUTH_USER'];
		// $key = $_SERVER['PHP_AUTH_PW'];
		$idbilling = Yii::app()->request->getParam('IDBILLING');
		$jmlbayar = Yii::app()->request->getParam('PEMBAYARAN');
		$noresi = Yii::app()->request->getParam('NORESI');
		$token = Yii::app()->request->getParam('TOKEN');

		if (empty($idbilling)) {
			echo CJSON::encode(array('responsecode'=>'05','summarytext'=>'PARAMETER TIDAK LENGKAP'));
			Yii::app()->end();
		}
		if (empty($noresi)) {
			echo CJSON::encode(array('responsecode'=>'05','summarytext'=>'PARAMETER TIDAK LENGKAP'));
			Yii::app()->end();
		}
		if ($jmlbayar!='165765221') {
			echo CJSON::encode(array('responsecode'=>'01','summarytext'=>'JUMLAH PEMBAYARAN KURANG DARI TAGIHAN'));
			Yii::app()->end();
		}
		if ($idbilling=='3471201250110002') {
			echo CJSON::encode(array('responsecode'=>'02','summarytext'=>'TAGIHAN SUDAH LUNAS'));
			Yii::app()->end();
		}

		if (Yii::app()->params['passapitoken']==$token) {
			$data = CJSON::encode(array(

						'IDBILING'=>'3471201250110001',
						'NPWPD'=>'P.3.0017472.11.31',
						'NAMAOP'=>'ZEST HOTEL/ PT. INDRA ANGGIRA SARI',
						'ALAMATOP'=>'JL. GAJAH MADA NO.28 YOGYAKARTA',
						'NAMAWP'=>'ADRIANSYAH AKBAR',
						'ALAMATWP'=>'JL. MINYAK RAYA NO. 6A RT/RW 03/06 DUREN TIGA PANCORAN JAKARTA SELATAN',
						'BULANPAJAK'=>'12',
						'TAHUNPAJAK'=>'2020',
						'JENISPAJAK'=>'01',
						'MASAPAJAK'=>'2020',
						'URAIANKEG'=>'HOTEL BINTANG DUA',
						'TGLPENETAPAN'=>'2022-01-18',
						'TGLJATUHTEMPO'=>'2022-02-18',
						'NOSSPD'=>'',
						'TAGIHANPOKOK'=>'165765221',
						'DENDA'=>'0',
						'summarytext'=>'PEMBAYARAN BERHASIL',
						'responsecode'=>'00'
						));
			echo $data;
			Yii::app()->end();
		} else {
				echo CJSON::encode(array('responsecode'=>'04','summarytext'=>'AUTHENTIFICATION ERROR'));
		}
	}


}

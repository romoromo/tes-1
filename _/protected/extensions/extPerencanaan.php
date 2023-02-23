<?php 
	/**
	* written by : Suryo Prasetyo W <the.oyrus@gmail.com>
	* description : Extension untuk mengolah data-data mengenai perencanaan
	* 
	*/
	class extPerencanaan extends CApplicationComponent
	{
		public static function KUSKPD($skpd_kode)
		{
			#misal 1.20.05 maka kode urusan => 1
			$exp = explode('.',$skpd_kode);
			return $exp[0];
		}

		public static function KBSKPD($skpd_kode)
		{
			#misal 1.20.05 maka kode bidang => 20
			$exp = explode('.',$skpd_kode);
			return $exp[1];
		}

		public static function KU($urusan_kode, $skpd_kode)
		{
			#misal 1.20 maka kode urusan => 20
			#misal 0.10 maka kode urusan => (sesuai kode urusan skpd)
			if( $urusan_kode=="0" ) {
				#jika pecahan urusan berkode 0 (Urusan Setiap SKPD)
				#maka gunakan kode urusan dari kode skpd
				return self::KUSKPD($skpd_kode);
			} else {
				return $urusan_kode;
			}
		}

		public static function KB($bidang_kode, $skpd_kode)
		{
			#misal 1.20 maka kode bidang => 20
			#misal 0.10 maka kode bidang => (sesuai kode bidang skpd)
			$exp = explode('.',$bidang_kode);
			if( $exp[0]=="0" ) {
				#jika pecahan urusan berkode 0 (Urusan Setiap SKPD)
				#maka gunakan kode bidang dari kode skpd
				return self::KBSKPD($skpd_kode);
			} else {
				return isset($exp[1]) ? $exp[1] : "";
			}
		}

		public static function KPSKPD($program_kode)
		{
			$exp = explode('.',$program_kode);
			return $exp[2];
		}

		public static function KKSKPD($kegiatan_kode)
		{
			$exp = explode('.',$kegiatan_kode);
			return $exp[3];
		}

		public static function KodeAll($skpd_kode, $kegiatan_kode)
		{
			#0.00.01.01 milik (1.14.01 Dinas Tenaga Kerja dan Transmigrasi) akan menjadi 
			#==> 01.14.1.14.01.01
			$exp = explode('.',$kegiatan_kode);
			return self::KU( $exp[0] , $skpd_kode ) . '.' . self::KB( $exp[0] . '.' . $exp[1] , $skpd_kode ) . '.' . $skpd_kode . '.' . $exp[2] . '.' . $exp[3];
		}

		public static function KodeKeg($skpd_kode, $kegiatan_kode)
		{
			#0.00.01.01 milik (1.14.01 Dinas Tenaga Kerja dan Transmigrasi) akan menjadi 
			#==> 01.14.1.14.01.01
			$exp = explode('.',$kegiatan_kode);
			return $skpd_kode . '.' . $exp[2] . '.' . $exp[3];
		}

		public static function getInfo($recordset, $tblname, $column, $idbefore)
		{
			if ($recordset[$tblname.'_'.$column] == $idbefore) {
				return array();
			} else {
				$recordset;
			}
		}

		public static function KodeSatuan($arrId)
		{
			$KodeSatuan = '';
			$jml = 0;
			foreach ($arrId as $idSatuan) {
				$namasatuan = ($satuan = Satuan::model()->findByPk($idSatuan) ) ? $satuan->refsatuan_nama : "";
				$KodeSatuan .= strtoupper($namasatuan!='' ? $namasatuan[0] : "");
				if($namasatuan!='') {
					$jml++;
				}
			}
			if ($jml==1) {
				$KodeSatuan = ($satuan = Satuan::model()->findByPk($arrId[0]) ) ? $satuan->refsatuan_nama : "";
			}
			return $KodeSatuan;
		}
	}
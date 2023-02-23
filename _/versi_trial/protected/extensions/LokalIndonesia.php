<?php 
	/**
	* written by : Suryo Prasetyo W <the.oyrus@gmail.com>
	* description : Extension untuk menggenerate data-data Lokal di Indonesia
	* 
	*/
	class LokalIndonesia extends CApplicationComponent
	{
		public static function TanggalUmum($tgl)
		{
			$tanggal = date('d',strtotime($tgl));
			$bulan = self::getBulan(date('n',strtotime($tgl)));
			$tahun = date('Y',strtotime($tgl));
			$tanggalumum = $tanggal ." ".$bulan." ".$tahun;
			return $tanggalumum;
		}

		public static function TGLID($tgl, $separator='-')
		{
			$tgl = date('d'.$separator.'m'.$separator.'Y',strtotime($tgl));
			return $tgl;
		}

		public static function TanggalHari($tgl)
		{
			$tglumum = self::TanggalUmum($tgl);
			$hari = self::getHari($tgl);
			return $hari .' '. $tglumum;
		}

		public static function getBulan($kodebulan)
		{
			$bln = explode('|','Januari|Februari|Maret|April|Mei|Juni|Juli|Agustus|September|Oktober|November|Desember');
			return $bulan = isset($bln[$kodebulan-1]) ? $bln[$kodebulan-1] : "salah";
		}

		public static function getHari($tgl) {
			if(!strtotime($tgl)){ 
				return '';
			} else {
				$tanggal = strtotime($tgl);
				$hari = date('w', $tanggal);
				switch ($hari) {
					case 0: $hari = 'Minggu'; break;
					case 1: $hari = 'Senin'; break;
					case 2: $hari = 'Selasa'; break;
					case 3: $hari = 'Rabu'; break;
					case 4: $hari = 'Kamis'; break;
					case 5: $hari = 'Jumat'; break;
					case 6: $hari = 'Sabtu'; break;
				}
				return $hari;
			}
		}

		public function getHariLangsung($tgl) {
			if(($tgl == '') or ($tgl == null) or ($tgl == '0') or ($tgl == '01-01-1970') or ($tgl == '1970-01-01') or ($tgl == '0000-00-00') or ($tgl == '00-00-0000')){ 
				return '';
			} else {
				$tanggal = strtotime($tgl);
				$hari = date('w', $tanggal);
				switch ($hari) {
					case 0: $hari = 'Minggu'; break;
					case 1: $hari = 'Senin'; break;
					case 2: $hari = 'Selasa'; break;
					case 3: $hari = 'Rabu'; break;
					case 4: $hari = 'Kamis'; break;
					case 5: $hari = 'Jumat'; break;
					case 6: $hari = 'Sabtu'; break;
				}
				return $hari;
			}
		}

		public static function getJam($waktu,$akhiran='WIB') {
			$jam = date('H:i',strtotime($waktu));
			return $jam.' '.$akhiran;
		}

		public static function rupiah($uang)
		{
			$rp = number_format($uang,0,',','.');
			return 'Rp. ' . $rp;
		}

		public static function ribu_ribuan($uang, $isSkipNull=false, $decimal=0)
		{
			$uang = ($uang / 1000);
			if ($isSkipNull) {
				return $uang = $uang==null ? "" : number_format($uang,$decimal,',','.');
			}
			$ribuan = number_format($uang,$decimal,',','.');
			return $ribuan;
		}

		public static function ribuan($uang, $isSkipNull=false, $decimal=0)
		{
			if ($isSkipNull) {
				return $uang = $uang==null ? "" : number_format($uang,$decimal,',','.');
			}
			$ribuan = number_format($uang,$decimal,',','.');
			return $ribuan;
		}

		public static function terbilangrupiah($uang)
		{
			$uang = number_format($uang,0);
			$rp = self::spellNumberInIndonesian($uang);
			return ucwords( $rp.' rupiah ' ) ;
		}

		public static function spellNumberInIndonesian ($number) {
			$number = ($number);
			/*if (!ereg("^[0-9]{1,15}$", $number))   deprecated*/
			if (!preg_match("/^[0-9]{1,15}$/", $number))
				return(false);
			$ones = array("", "satu", "dua", "tiga", "empat",
				"lima", "enam", "tujuh", "delapan", "sembilan");
			$majorUnits = array("", "ribu", "juta", "milyar", "trilyun");
			$minorUnits = array("", "puluh", "ratus");
			$result = "";
			$isAnyMajorUnit = false;
			$length = strlen($number);
			for ($i = 0, $pos = $length - 1; $i < $length; $i++, $pos--) {
				if ($number{$i} != '0') {
					if ($number{$i} != '1')
						$result .= $ones[$number{$i}].' '.$minorUnits[$pos % 3].' ';
					else if ($pos % 3 == 1 && $number{$i + 1} != '0') {
						if ($number{$i + 1} == '1')
							$result .= "sebelas ";
						else
							$result .= $ones[$number{$i + 1}]." belas ";
						$i++; $pos--;
					} else if ($pos % 3 != 0)
					$result .= "se".$minorUnits[$pos % 3].' ';
					else if ($pos == 3 && !$isAnyMajorUnit)
						$result .= "se";
					else
						$result .= "satu ";
					$isAnyMajorUnit = true;
				}
				if ($pos % 3 == 0 && $isAnyMajorUnit) {
					$result .= $majorUnits[$pos / 3].' ';
					$isAnyMajorUnit = false;
				}
			}
			$result = trim($result);
			if ($result == "") $result = "nol";
			return($result);
		}

		public static function kekata($x) {
			$x = abs($x);
			$angka = array("", "satu", "dua", "tiga", "empat", "lima",
				"enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
			$temp = "";
			if ($x <12) {
					$temp = " ". $angka[$x];
				} else if ($x <20) {
					$temp = self::kekata($x - 10). " belas";
				} else if ($x <100) {
					$temp = self::kekata($x/10)." puluh". self::kekata($x % 10);
				} else if ($x <200) {
					$temp = " seratus" . self::kekata($x - 100);
				} else if ($x <1000) {
					$temp = self::kekata($x/100) . " ratus" . self::kekata($x % 100);
				} else if ($x <2000) {
					$temp = " seribu" . self::kekata($x - 1000);
				} else if ($x <1000000) {
					$temp = self::kekata($x/1000) . " ribu" . self::kekata($x % 1000);
				} else if ($x <1000000000) {
					$temp = self::kekata($x/1000000) . " juta" . self::kekata($x % 1000000);
				} else if ($x <1000000000000) {
					$temp = self::kekata($x/1000000000) . " milyar" . self::kekata(fmod($x,1000000000));
				} else if ($x <1000000000000000) {
					$temp = self::kekata($x/1000000000000) . " trilyun" . self::kekata(fmod($x,1000000000000));
				}
				return $temp;
			}

		public static function terbilangangka($x, $style=4) {
			if($x<0) {
				$hasil = "minus ". trim(self::kekata($x));
			} else {
				$hasil = trim(self::kekata($x));
			}
			switch ($style) {
				case 1:
				$hasil = strtoupper($hasil);
				break;
				case 2:
				$hasil = strtolower($hasil);
				break;
				case 3:
				$hasil = ucwords($hasil);
				break;
				default:
				$hasil = ucfirst($hasil);
				break;
			}
			return $hasil;
		}

		public static function datediff($tgl1, $tgl2, $isABS=false){
			$tgl1 = (is_string($tgl1) ? strtotime($tgl1) : $tgl1);
			$tgl2 = (is_string($tgl2) ? strtotime($tgl2) : $tgl2);
			$diff_secs = ($tgl1 - $tgl2);
			if ($isABS) {
				$diff_secs = abs($tgl1 - $tgl2);
			}
			$base_year = min(date("Y", $tgl1), date("Y", $tgl2));
			$diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
			return array( "years" => date("Y", $diff) - $base_year,
				"months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1,
				"months" => date("n", $diff) - 1,
				"days_total" => floor($diff_secs / (3600 * 24)),
				"days" => date("j", $diff) - 1,
				"hours_total" => floor($diff_secs / 3600),
				"hours" => date("G", $diff),
				"minutes_total" => floor($diff_secs / 60),
				"minutes" => (int) date("i", $diff),
				"seconds_total" => $diff_secs,
				"seconds" => (int) date("s", $diff) );
		}
		public function monthdiff($tgl1,$tgl2)
		{
			$tanggal1 = date('Y-m-d', strtotime($tgl1));
			$tanggal2 = date('Y-m-d', strtotime($tgl2));
			$model = Yii::app()->db->createCommand("SELECT
				MONTHS_BETWEEN (
				TO_DATE ('".$tanggal2."', 'YYYY-MM-DD'),
				TO_DATE ('".$tanggal1."', 'YYYY-MM-DD')
				) AS BULAN
				FROM
				DUAL")->queryRow();
			return $model['BULAN'];
		}

		public static function selisih_tgl($tgla, $tglb, $suffix="")
		{
			$selisih = floor(abs( strtotime($tgla) - strtotime($tglb) ) / 86400);
			return $selisih." ".$suffix;
		}

		function xTimeAgo ($oldTime, $newTime, $timeType) {
			$timeCalc = strtotime($newTime) - strtotime($oldTime);
			if ($timeType == "x") {
				if ($timeCalc = 60) {
					$timeType = "m";
				}
				if ($timeCalc = (60*60)) {
					$timeType = "h";
				}
				if ($timeCalc = (60*60*24)) {
					$timeType = "d";
				}
			}
			if ($timeType == "s") {
				$timeCalc .= " seconds ago";
			}
			if ($timeType == "m") {
				$timeCalc = round($timeCalc/60) . " menit";
			}
			if ($timeType == "h") {
				$timeCalc = round($timeCalc/60/60) . " jam";
			}
			if ($timeType == "d") {
				$timeCalc = round($timeCalc/60/60/24) . " hari";
			}
			return $timeCalc;
		}

		function timeAgo($timestamp){
			date_default_timezone_set('Asia/Jakarta');
			$skrg = date("Y-m-d H:i:s");
			$isi = str_replace("-","",$this->xTimeAgo($skrg,$timestamp,"m"));
			$isi2 = str_replace("-","",$this->xTimeAgo($skrg,$timestamp,"h"));
			$isi3 = str_replace("-","",$this->xTimeAgo($skrg,$timestamp,"d"));
			$go="";
			if($isi > 60)
			{
				$go=$isi2;
			}elseif($isi2 > 24)
			{
				$go=$isi3;
			}elseif($isi < 61)
			{
				$go=$isi;
			}
			return $go;
		}

		function cek_selisih_waktu($oldTime, $newTime, $issuffix=false)
		{
			$hasil = $this->xTimeAgo($oldTime,$newTime,'m');
			$selisih_menit = explode(" ", $this->xTimeAgo($oldTime,$newTime,'m') );
			$selisih_jam = explode(" ", $this->xTimeAgo($oldTime,$newTime,'h') );

			if($selisih_menit[0] < 60) {
				//$hasil = xTimeAgo($oldTime,$newTime,'h');
				$hasil = "0 menit";
				if(!$issuffix) {
					$hasil = 0;
				}
			}

			if($selisih_menit[0] > 60) {
				$hasil = $this->xTimeAgo($oldTime,$newTime,'h');
				if(!$issuffix) {
					$hasil = explode(" ", $hasil);
					$hasil = $hasil[0];
				}
			}

			if($selisih_jam[0] > 23) {
				$hasil = $this->xTimeAgo($oldTime,$newTime,'d');
				if(!$issuffix) {
					$hasil = explode(" ", $hasil);
					$hasil = $hasil[0];
				}
			}

			return $hasil;

		}

		public static function formatNPWP($npwp)
		{
			/*11.111.111.1-111.111
			* https://agusblog.wordpress.com/2007/02/20/catatan-php/*/
			$formatNPWP = substr($npwp,0,2)."."
				.substr($npwp,2,2)."."
				.substr($npwp,5,2)."."
				.substr($npwp,8,2)."-"
				.substr($npwp,9,2)."."
				.substr($npwp,12,4);
			return $formatNPWP;
		}

		public static function formatKTP($ktp)
		{
			/*01.23.45.67.89.1011.12131415
			  33.22.11.XX.XX.XX.XXXX
			* */
			$formatNPWP = 
				substr($ktp,0,2)."."
				.substr($ktp,2,2)."."
				.substr($ktp,4,2)."."
				.substr($ktp,6,2)."."
				.substr($ktp,8,2)."."
				.substr($ktp,10,2)."."
				.substr($ktp,12,4);
			return $formatNPWP;
		}

		public function Terbilang ($number) {
			$number = strval($number);
			/*if (!ereg("^[0-9]{1,15}$", $number))   deprecated*/
			if (!preg_match("/^[0-9]{1,15}$/", $number))
				return(false);
			$ones = array("", "satu", "dua", "tiga", "empat",
				"lima", "enam", "tujuh", "delapan", "sembilan");
			$majorUnits = array("", "ribu", "juta", "milyar", "trilyun");
			$minorUnits = array("", "puluh", "ratus");
			$result = "";
			$isAnyMajorUnit = false;
			$length = strlen($number);
			for ($i = 0, $pos = $length - 1; $i < $length; $i++, $pos--) {
				if ($number{$i} != '0') {
					if ($number{$i} != '1')
						$result .= $ones[$number{$i}].' '.$minorUnits[$pos % 3].' ';
					else if ($pos % 3 == 1 && $number{$i + 1} != '0') {
						if ($number{$i + 1} == '1')
							$result .= "sebelas ";
						else
							$result .= $ones[$number{$i + 1}]." belas ";
						$i++; $pos--;
					} else if ($pos % 3 != 0)
					$result .= "se".$minorUnits[$pos % 3].' ';
					else if ($pos == 3 && !$isAnyMajorUnit)
						$result .= "se";
					else
						$result .= "satu ";
					$isAnyMajorUnit = true;
				}
				if ($pos % 3 == 0 && $isAnyMajorUnit) {
					$result .= $majorUnits[$pos / 3].' ';
					$isAnyMajorUnit = false;
				}
			}
			$result = trim($result);
			if ($result == "") $result = "nol";
			return($result);
		}

		function num2romawi($num) 
		{
			$n = intval($num);
			$res = '';
			
			/*** roman_numerals array  ***/
			$roman_numerals = array(
				'M'  => 1000,
				'CM' => 900,
				'D'  => 500,
				'CD' => 400,
				'C'  => 100,
				'XC' => 90,
				'L'  => 50,
				'XL' => 40,
				'X'  => 10,
				'IX' => 9,
				'V'  => 5,
				'IV' => 4,
				'I'  => 1);
			
			foreach ($roman_numerals as $roman => $number) 
			{
				/*** divide to get  matches ***/
				$matches = intval($n / $number);
				
				/*** assign the roman char * $matches ***/
				$res .= str_repeat($roman, $matches);
				
				/*** substract from the number ***/
				$n = $n % $number;
			}
			
			/*** return the res ***/
			return $res;
		}

		public static function toAngka($rp)
		{
			$rp = str_replace(".", "", $rp);
			$rp = str_replace(",", ".", $rp);
			$rp = str_replace("Rp ", "", $rp);
			return $rp;
		}

		public static function getBulanDenda($tglbatas, $tglterima)
		{
			/*$tglterima = '2017-09-10';
			$tglbatas = '2017-09-10';*/

			$bulandenda = 0;
			if($tglterima>$tglbatas) {
				$bulandenda = 1;
				$tglbatas_inc = $tglbatas;
				while($tglbatas_inc<$tglterima) {
					$tglbatas_inc = date("Y-m-d", strtotime("+1 month", strtotime($tglbatas_inc)));
					if($tglbatas_inc<$tglterima) {
						$bulandenda += 1;
					}
					// break;
				}
			}

			return $bulandenda;
		}

	}
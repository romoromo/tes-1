<?php 
/**
* 
*/
class DMOrcl extends CApplicationComponent
{
	
	public static function getSequence($SequenceName)
	{
		$getlastid=Yii::app()->db->createCommand('SELECT '.$SequenceName.'.NEXTVAL AS LASTID
		FROM DUAL');
		return $getlastid->queryScalar();
	}

	public static function getNow($format = 'yyyy-mm-dd hh24:mi:ss')
	{
		return new CDbExpression("TO_DATE('" . date('Y-m-d H:i:s') . "',  ' " . $format . " ') ");
	}

	public static function formatNPWPD($npwpd='')
	{
		$formatNPWPD = 
			'P.' .
			substr($npwpd,0,2)."."
			.substr($npwpd,2,7)."."
			.substr($npwpd,9,2)."."
			.substr($npwpd,11,2);
		return $formatNPWPD;
	}

	public static function getRequest($index, $sub='')
	{
		if (isset($_REQUEST[$index])) {
			if (!empty($sub) && isset($_REQUEST[$index][$sub])) {
				return $_REQUEST[$index][$sub];
			} elseif (is_array($_REQUEST[$index])) {
				return '';
			}
			return $_REQUEST[$index];
		} else {
			return null;
		}
	}

	public static function getTGLBATAS($koderek, $thn, $bln)
	{
		$q = 'SELECT *
		FROM REFTGLBATAS
		WHERE 
		REFTGLBATAS_JENISREK=' . $koderek
		. ' AND REFTGLBATAS_TAHUN = ' . $thn
		. ' AND REFTGLBATAS_BULAN = ' . $bln
		;
		$dt = Yii::app()->db->createCommand($q)->queryRow();
		if ( $dt ) {
			return $dt['REFTGLBATAS_TANGGAL'];
		} else {
			return '10';
		}
	}
}
 ?>
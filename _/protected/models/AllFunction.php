<?php

class AllFunction extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/*GRAFIK PENDAPATAN DAERAH (REALISASI PER REKENING)*/
	public function getAnggaranByKodeRekening($kode)
	{
		$data = Yii::app()->db->createCommand('SELECT anggaran FROM realisasi_perrekening WHERE kd_rekening = '.$kode)->queryRow();
		return $data['anggaran'];
	}
	public function getKetetapanByKodeRekening($kode)
	{
		$data = Yii::app()->db->createCommand('SELECT rupiahketetaan FROM realisasi_perrekening WHERE kd_rekening = '.$kode)->queryRow();
		return $data['rupiahketetaan'];
	}
	public function getRealisasiByKodeRekening($kode)
	{
		$data = Yii::app()->db->createCommand('SELECT rupiahsetor FROM realisasi_perrekening WHERE kd_rekening = '.$kode)->queryRow();
		return $data['rupiahsetor'];
	}

	/*GRAFIK PENDAPATAN DAERAH (REALISASI PER REKENING)*/
	public function getKetetapanByKecamatan($idkec)
	{
		$data = Yii::app()->db->createCommand('SELECT rupiahketetaan FROM realisasi_perkecamatan WHERE nama = "'.$idkec.'"')->queryRow();
		return $data['rupiahketetaan'];
	}
	public function getJmlSetorByKecamatan($idkec)
	{
		$data = Yii::app()->db->createCommand('SELECT rupiahsetor FROM realisasi_perkecamatan WHERE nama = "'.$idkec.'"')->queryRow();
		return $data['rupiahsetor'];
	}

	/*GRAFIK PENDAPATAN DAERAH (REALISASI PER REKENING PER KECAMATAN)*/
	public function getJmlByJenisKec($jenis, $kec, $rek)
	{
		$jenis 	= 'KETETAPAN';
		$data = Yii::app()->db->createCommand('SELECT '.$jenis.'_'.$rek.' AS jml FROM REALISASIPAJAKPERKECAMATANPERREKENING216 WHERE nama = "'.$kec.'"')->queryRow();
		return $data['jml'];
	}

}

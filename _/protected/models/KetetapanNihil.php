<?php

/**
 * This is the model class for table "tblketetapannihil".
 *
 * The followings are the available columns in table 'tblketetapannihil':
 * @property integer $tblketetapannihil_id
 * @property string $tblobyek_id
 * @property string $refjenistransaksi_id
 * @property string $tblketetapannihil_ke
 * @property string $tblketetapannihil_masaawal
 * @property string $tblketetapannihil_masaakhir
 * @property string $tblketetapannihil_tarif
 * @property string $tblketetapannihil_omzettetap
 * @property string $tblketetapannihil_omzetperiksa
 * @property string $tblketetapannihil_omzetterhutang
 * @property string $tblketetapannihil_pajaktetap
 * @property string $tblketetapannihil_pajakperiksa
 * @property string $tblketetapannihil_pajakterhutang
 * @property string $tblketetapannihil_tglentrydaftar
 * @property string $tblketetapannihil_nokohirskpd
 * @property integer $tblketetapannihil_tahunpajak
 * @property integer $tblketetapannihil_bulanpajak
 * @property string $tblketetapannihil_noperiksa
 * @property string $tblketetapannihil_tglterimaperiksa
 * @property string $tblketetapannihil_petugasperiksa
 * @property string $tblketetapannihil_tglketetapan
 * @property string $tblketetapannihil_tgljatuhtempo
 * @property string $tblketetapannihil_persenbunga
 * @property integer $tblketetapannihil_bulanbunga
 * @property string $tblketetapannihil_rupiahbunga
 * @property string $tblketetapannihil_rupiahdenda
 * @property string $tblketetapannihil_pajaktotalkb
 * @property string $tblketetapannihil_nosspd
 * @property string $tblketetapannihil_noreg
 * @property string $tblketetapannihil_tglreg
 * @property string $tblketetapannihil_tglsetor
 * @property integer $tblketetapannihil_viabayar
 * @property string $tblketetapannihil_kodeskpd
 * @property string $tblketetapannihil_jumlahsetor
 * @property integer $tblpengguna_penggunapendaftaranid
 * @property integer $tblpengguna_penggunapenetapanid
 * @property integer $tblpengguna_penggunapenyetoranid
 * @property string $tblketetapannihil_istetap
 * @property string $tblketetapannihil_isskpdnihil
 * @property string $tblketetapannihil_ispiutang
 * @property string $tblketetapannihil_isskpdlb
 * @property string $tblsuratpemeriksaanpajaknihil_id
 * @property string $tbltransaksiketetapan_id
 * @property string $tblketetapannihil_isbataltetap
 */
class KetetapanNihil extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblketetapannihil';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblketetapannihil_tahunpajak', 'required'),
			array('tblketetapannihil_tahunpajak, tblketetapannihil_bulanpajak, tblketetapannihil_bulanbunga, tblketetapannihil_viabayar, tblpengguna_penggunapendaftaranid, tblpengguna_penggunapenetapanid, tblpengguna_penggunapenyetoranid', 'numerical', 'integerOnly'=>true),
			array('tblobyek_id, tblketetapannihil_ke, tblketetapannihil_tarif, tblketetapannihil_omzettetap, tblketetapannihil_omzetperiksa, tblketetapannihil_omzetterhutang, tblketetapannihil_pajaktetap, tblketetapannihil_pajakperiksa, tblketetapannihil_pajakterhutang, tblketetapannihil_nokohirskpd, tblketetapannihil_persenbunga, tblketetapannihil_rupiahbunga, tblketetapannihil_rupiahdenda, tblketetapannihil_pajaktotalkb, tblketetapannihil_nosspd, tblketetapannihil_noreg, tblketetapannihil_jumlahsetor', 'length', 'max'=>18),
			array('refjenistransaksi_id', 'length', 'max'=>2),
			array('tblsuratpemeriksaanpajaknihil_id', 'length', 'max'=>10),
			array('tblketetapannihil_noperiksa, tblketetapannihil_petugasperiksa', 'length', 'max'=>100),
			array('tblketetapannihil_kodeskpd', 'length', 'max'=>15),
			array('tblketetapannihil_istetap, tblketetapannihil_isskpdnihil, tblketetapannihil_ispiutang, tblketetapannihil_isskpdlb, tblketetapannihil_isbataltetap', 'length', 'max'=>1),
			array('tbltransaksiketetapan_id', 'length', 'max'=>6),
			array('tblketetapannihil_masaawal, tblketetapannihil_masaakhir, tblketetapannihil_tglentrydaftar, tblketetapannihil_tglterimaperiksa, tblketetapannihil_tglketetapan, tblketetapannihil_tgljatuhtempo, tblketetapannihil_tglreg, tblketetapannihil_tglsetor', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblketetapannihil_id, tblobyek_id, refjenistransaksi_id, tblketetapannihil_ke, tblketetapannihil_masaawal, tblketetapannihil_masaakhir, tblketetapannihil_tarif, tblketetapannihil_omzettetap, tblketetapannihil_omzetperiksa, tblketetapannihil_omzetterhutang, tblketetapannihil_pajaktetap, tblketetapannihil_pajakperiksa, tblketetapannihil_pajakterhutang, tblketetapannihil_tglentrydaftar, tblketetapannihil_nokohirskpd, tblketetapannihil_tahunpajak, tblketetapannihil_bulanpajak, tblketetapannihil_noperiksa, tblketetapannihil_tglterimaperiksa, tblketetapannihil_petugasperiksa, tblketetapannihil_tglketetapan, tblketetapannihil_tgljatuhtempo, tblketetapannihil_persenbunga, tblketetapannihil_bulanbunga, tblketetapannihil_rupiahbunga, tblketetapannihil_rupiahdenda, tblketetapannihil_pajaktotalkb, tblketetapannihil_nosspd, tblketetapannihil_noreg, tblketetapannihil_tglreg, tblketetapannihil_tglsetor, tblketetapannihil_viabayar, tblketetapannihil_kodeskpd, tblketetapannihil_jumlahsetor, tblpengguna_penggunapendaftaranid, tblpengguna_penggunapenetapanid, tblpengguna_penggunapenyetoranid, tblketetapannihil_istetap, tblketetapannihil_isskpdnihil, tblketetapannihil_ispiutang, tblketetapannihil_isskpdlb, tblsuratpemeriksaanpajaknihil_id, tbltransaksiketetapan_id, tblketetapannihil_isbataltetap', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tblketetapannihil_id' => 'Tblketetapannihil',
			'tblobyek_id' => 'Tblobyek',
			'refjenistransaksi_id' => 'Refjenistransaksi',
			'tblketetapannihil_ke' => 'Tblketetapannihil Ke',
			'tblketetapannihil_masaawal' => 'Tblketetapannihil Masaawal',
			'tblketetapannihil_masaakhir' => 'Tblketetapannihil Masaakhir',
			'tblketetapannihil_tarif' => 'Tblketetapannihil Tarif',
			'tblketetapannihil_omzettetap' => 'Tblketetapannihil Omzettetap',
			'tblketetapannihil_omzetperiksa' => 'Tblketetapannihil Omzetperiksa',
			'tblketetapannihil_omzetterhutang' => 'Tblketetapannihil Omzetterhutang',
			'tblketetapannihil_pajaktetap' => 'Tblketetapannihil Pajaktetap',
			'tblketetapannihil_pajakperiksa' => 'Tblketetapannihil Pajakperiksa',
			'tblketetapannihil_pajakterhutang' => 'Tblketetapannihil Pajakterhutang',
			'tblketetapannihil_tglentrydaftar' => 'Tblketetapannihil Tglentrydaftar',
			'tblketetapannihil_nokohirskpd' => 'Tblketetapannihil Nokohirskpd',
			'tblketetapannihil_tahunpajak' => 'Tblketetapannihil Tahunpajak',
			'tblketetapannihil_bulanpajak' => 'Tblketetapannihil Bulanpajak',
			'tblketetapannihil_noperiksa' => 'Tblketetapannihil Noperiksa',
			'tblketetapannihil_tglterimaperiksa' => 'Tblketetapannihil Tglterimaperiksa',
			'tblketetapannihil_petugasperiksa' => 'Tblketetapannihil Petugasperiksa',
			'tblketetapannihil_tglketetapan' => 'Tblketetapannihil Tglketetapan',
			'tblketetapannihil_tgljatuhtempo' => 'Tblketetapannihil Tgljatuhtempo',
			'tblketetapannihil_persenbunga' => 'Tblketetapannihil Persenbunga',
			'tblketetapannihil_bulanbunga' => 'Tblketetapannihil Bulanbunga',
			'tblketetapannihil_rupiahbunga' => 'Tblketetapannihil Rupiahbunga',
			'tblketetapannihil_rupiahdenda' => 'Tblketetapannihil Rupiahdenda',
			'tblketetapannihil_pajaktotalkb' => 'Tblketetapannihil Pajaktotalkb',
			'tblketetapannihil_nosspd' => 'Tblketetapannihil Nosspd',
			'tblketetapannihil_noreg' => 'Tblketetapannihil Noreg',
			'tblketetapannihil_tglreg' => 'Tblketetapannihil Tglreg',
			'tblketetapannihil_tglsetor' => 'Tblketetapannihil Tglsetor',
			'tblketetapannihil_viabayar' => 'Tblketetapannihil Viabayar',
			'tblketetapannihil_kodeskpd' => 'Tblketetapannihil Kodeskpd',
			'tblketetapannihil_jumlahsetor' => 'Tblketetapannihil Jumlahsetor',
			'tblpengguna_penggunapendaftaranid' => 'Tblpengguna Penggunapendaftaranid',
			'tblpengguna_penggunapenetapanid' => 'Tblpengguna Penggunapenetapanid',
			'tblpengguna_penggunapenyetoranid' => 'Tblpengguna Penggunapenyetoranid',
			'tblketetapannihil_istetap' => 'Tblketetapannihil Istetap',
			'tblketetapannihil_isskpdnihil' => 'Tblketetapannihil Isskpdnihil',
			'tblketetapannihil_ispiutang' => 'Tblketetapannihil Ispiutang',
			'tblketetapannihil_isskpdlb' => 'Tblketetapannihil Isskpdlb',
			'tblsuratpemeriksaanpajaknihil_id' => 'Tblsuratpemeriksaanpajaknihil',
			'tbltransaksiketetapan_id' => 'Tbltransaksiketetapan',
			'tblketetapannihil_isbataltetap' => 'Tblketetapannihil Isbataltetap',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('tblketetapannihil_id',$this->tblketetapannihil_id);
		$criteria->compare('tblobyek_id',$this->tblobyek_id,true);
		$criteria->compare('refjenistransaksi_id',$this->refjenistransaksi_id,true);
		$criteria->compare('tblketetapannihil_ke',$this->tblketetapannihil_ke,true);
		$criteria->compare('tblketetapannihil_masaawal',$this->tblketetapannihil_masaawal,true);
		$criteria->compare('tblketetapannihil_masaakhir',$this->tblketetapannihil_masaakhir,true);
		$criteria->compare('tblketetapannihil_tarif',$this->tblketetapannihil_tarif,true);
		$criteria->compare('tblketetapannihil_omzettetap',$this->tblketetapannihil_omzettetap,true);
		$criteria->compare('tblketetapannihil_omzetperiksa',$this->tblketetapannihil_omzetperiksa,true);
		$criteria->compare('tblketetapannihil_omzetterhutang',$this->tblketetapannihil_omzetterhutang,true);
		$criteria->compare('tblketetapannihil_pajaktetap',$this->tblketetapannihil_pajaktetap,true);
		$criteria->compare('tblketetapannihil_pajakperiksa',$this->tblketetapannihil_pajakperiksa,true);
		$criteria->compare('tblketetapannihil_pajakterhutang',$this->tblketetapannihil_pajakterhutang,true);
		$criteria->compare('tblketetapannihil_tglentrydaftar',$this->tblketetapannihil_tglentrydaftar,true);
		$criteria->compare('tblketetapannihil_nokohirskpd',$this->tblketetapannihil_nokohirskpd,true);
		$criteria->compare('tblketetapannihil_tahunpajak',$this->tblketetapannihil_tahunpajak);
		$criteria->compare('tblketetapannihil_bulanpajak',$this->tblketetapannihil_bulanpajak);
		$criteria->compare('tblketetapannihil_noperiksa',$this->tblketetapannihil_noperiksa,true);
		$criteria->compare('tblketetapannihil_tglterimaperiksa',$this->tblketetapannihil_tglterimaperiksa,true);
		$criteria->compare('tblketetapannihil_petugasperiksa',$this->tblketetapannihil_petugasperiksa,true);
		$criteria->compare('tblketetapannihil_tglketetapan',$this->tblketetapannihil_tglketetapan,true);
		$criteria->compare('tblketetapannihil_tgljatuhtempo',$this->tblketetapannihil_tgljatuhtempo,true);
		$criteria->compare('tblketetapannihil_persenbunga',$this->tblketetapannihil_persenbunga,true);
		$criteria->compare('tblketetapannihil_bulanbunga',$this->tblketetapannihil_bulanbunga);
		$criteria->compare('tblketetapannihil_rupiahbunga',$this->tblketetapannihil_rupiahbunga,true);
		$criteria->compare('tblketetapannihil_rupiahdenda',$this->tblketetapannihil_rupiahdenda,true);
		$criteria->compare('tblketetapannihil_pajaktotalkb',$this->tblketetapannihil_pajaktotalkb,true);
		$criteria->compare('tblketetapannihil_nosspd',$this->tblketetapannihil_nosspd,true);
		$criteria->compare('tblketetapannihil_noreg',$this->tblketetapannihil_noreg,true);
		$criteria->compare('tblketetapannihil_tglreg',$this->tblketetapannihil_tglreg,true);
		$criteria->compare('tblketetapannihil_tglsetor',$this->tblketetapannihil_tglsetor,true);
		$criteria->compare('tblketetapannihil_viabayar',$this->tblketetapannihil_viabayar);
		$criteria->compare('tblketetapannihil_kodeskpd',$this->tblketetapannihil_kodeskpd,true);
		$criteria->compare('tblketetapannihil_jumlahsetor',$this->tblketetapannihil_jumlahsetor,true);
		$criteria->compare('tblpengguna_penggunapendaftaranid',$this->tblpengguna_penggunapendaftaranid);
		$criteria->compare('tblpengguna_penggunapenetapanid',$this->tblpengguna_penggunapenetapanid);
		$criteria->compare('tblpengguna_penggunapenyetoranid',$this->tblpengguna_penggunapenyetoranid);
		$criteria->compare('tblketetapannihil_istetap',$this->tblketetapannihil_istetap,true);
		$criteria->compare('tblketetapannihil_isskpdnihil',$this->tblketetapannihil_isskpdnihil,true);
		$criteria->compare('tblketetapannihil_ispiutang',$this->tblketetapannihil_ispiutang,true);
		$criteria->compare('tblketetapannihil_isskpdlb',$this->tblketetapannihil_isskpdlb,true);
		$criteria->compare('tblsuratpemeriksaanpajaknihil_id',$this->tblsuratpemeriksaanpajaknihil_id,true);
		$criteria->compare('tbltransaksiketetapan_id',$this->tbltransaksiketetapan_id,true);
		$criteria->compare('tblketetapannihil_isbataltetap',$this->tblketetapannihil_isbataltetap,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KetetapanNihil the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

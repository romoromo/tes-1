<?php

/**
 * This is the model class for table "tblketetapanangsuran".
 *
 * The followings are the available columns in table 'tblketetapanangsuran':
 * @property integer $tblketetapanangsuran_id
 * @property string $tblobyek_id
 * @property integer $tblsuratperjanjianangsuran_id
 * @property string $refjenistransaksi_id
 * @property string $tblketetapanangsuran_ke
 * @property integer $tblketetapanangsuran_tahunangsur
 * @property integer $tblketetapanangsuran_bulanangsur
 * @property string $tblketetapanangsuran_masaawal
 * @property string $tblketetapanangsuran_masaakhir
 * @property string $refrekening_id
 * @property string $tblketetapanangsuran_pokokangsur
 * @property string $tblketetapanangsuran_tarifangsur
 * @property string $tblketetapanangsuran_bungaangsur
 * @property string $tblketetapanangsuran_nosspd
 * @property string $tblketetapanangsuran_noreg
 * @property string $tblketetapanangsuran_tglsetor
 * @property integer $tblketetapanangsuran_viabayar
 * @property string $tblketetapanangsuran_tgljatuhtempoangsur
 * @property string $tblketetapanangsuran_rupiahdendaterlambat
 * @property string $tblketetapanangsuran_jumlahsetor
 * @property integer $tblpengguna_penggunapendaftaranid
 * @property integer $tblpengguna_penggunapenetapanid
 * @property integer $tblpengguna_penggunapenyetoranid
 * @property string $tblketetapanangsuran_isbayar
 * @property string $tblketetapanangsuran_ispiutang
 */
class KetetapanAngsuran extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblketetapanangsuran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblketetapanangsuran_tahunangsur', 'required'),
			array('tblsuratperjanjianangsuran_id, tblketetapanangsuran_tahunangsur, tblketetapanangsuran_bulanangsur, tblketetapanangsuran_viabayar, tblpengguna_penggunapendaftaranid, tblpengguna_penggunapenetapanid, tblpengguna_penggunapenyetoranid', 'numerical', 'integerOnly'=>true),
			array('tblobyek_id, tblketetapanangsuran_ke, tblketetapanangsuran_pokokangsur, tblketetapanangsuran_tarifangsur, tblketetapanangsuran_bungaangsur, tblketetapanangsuran_nosspd, tblketetapanangsuran_noreg, tblketetapanangsuran_rupiahdendaterlambat, tblketetapanangsuran_jumlahsetor', 'length', 'max'=>18),
			array('refjenistransaksi_id', 'length', 'max'=>2),
			// array('refrekening_id', 'length', 'max'=>10),
			array('tblketetapanangsuran_isbayar, tblketetapanangsuran_ispiutang', 'length', 'max'=>1),
			array('tblketetapanangsuran_masaawal, tblketetapanangsuran_masaakhir, tblketetapanangsuran_tglsetor, tblketetapanangsuran_tgljatuhtempoangsur', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblketetapanangsuran_id, tblobyek_id, tblsuratperjanjianangsuran_id, refjenistransaksi_id, tblketetapanangsuran_ke, tblketetapanangsuran_tahunangsur, tblketetapanangsuran_bulanangsur, tblketetapanangsuran_masaawal, tblketetapanangsuran_masaakhir, tblketetapanangsuran_pokokangsur, tblketetapanangsuran_tarifangsur, tblketetapanangsuran_bungaangsur, tblketetapanangsuran_nosspd, tblketetapanangsuran_noreg, tblketetapanangsuran_tglsetor, tblketetapanangsuran_viabayar, tblketetapanangsuran_tgljatuhtempoangsur, tblketetapanangsuran_rupiahdendaterlambat, tblketetapanangsuran_jumlahsetor, tblpengguna_penggunapendaftaranid, tblpengguna_penggunapenetapanid, tblpengguna_penggunapenyetoranid, tblketetapanangsuran_isbayar, tblketetapanangsuran_ispiutang', 'safe', 'on'=>'search'),
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
			'tblketetapanangsuran_id' => 'Tblketetapanangsuran',
			'tblobyek_id' => 'Tblobyek',
			'tblsuratperjanjianangsuran_id' => 'Tblsuratperjanjianangsuran',
			'refjenistransaksi_id' => 'Refjenistransaksi',
			'tblketetapanangsuran_ke' => 'Tblketetapanangsuran Ke',
			'tblketetapanangsuran_tahunangsur' => 'Tblketetapanangsuran Tahunangsur',
			'tblketetapanangsuran_bulanangsur' => 'Tblketetapanangsuran Bulanangsur',
			'tblketetapanangsuran_masaawal' => 'Tblketetapanangsuran Masaawal',
			'tblketetapanangsuran_masaakhir' => 'Tblketetapanangsuran Masaakhir',
			// 'refrekening_id' => 'Refrekening',
			'tblketetapanangsuran_pokokangsur' => 'Tblketetapanangsuran Pokokangsur',
			'tblketetapanangsuran_tarifangsur' => 'Tblketetapanangsuran Tarifangsur',
			'tblketetapanangsuran_bungaangsur' => 'Tblketetapanangsuran Bungaangsur',
			'tblketetapanangsuran_nosspd' => 'Tblketetapanangsuran Nosspd',
			'tblketetapanangsuran_noreg' => 'Tblketetapanangsuran Noreg',
			'tblketetapanangsuran_tglsetor' => 'Tblketetapanangsuran Tglsetor',
			'tblketetapanangsuran_viabayar' => 'Tblketetapanangsuran Viabayar',
			'tblketetapanangsuran_tgljatuhtempoangsur' => 'Tblketetapanangsuran Tgljatuhtempoangsur',
			'tblketetapanangsuran_rupiahdendaterlambat' => 'Tblketetapanangsuran Rupiahdendaterlambat',
			'tblketetapanangsuran_jumlahsetor' => 'Tblketetapanangsuran Jumlahsetor',
			'tblpengguna_penggunapendaftaranid' => 'Tblpengguna Penggunapendaftaranid',
			'tblpengguna_penggunapenetapanid' => 'Tblpengguna Penggunapenetapanid',
			'tblpengguna_penggunapenyetoranid' => 'Tblpengguna Penggunapenyetoranid',
			'tblketetapanangsuran_isbayar' => 'Tblketetapanangsuran Isbayar',
			'tblketetapanangsuran_ispiutang' => 'Tblketetapanangsuran Ispiutang',
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

		$criteria->compare('tblketetapanangsuran_id',$this->tblketetapanangsuran_id);
		$criteria->compare('tblobyek_id',$this->tblobyek_id,true);
		$criteria->compare('tblsuratperjanjianangsuran_id',$this->tblsuratperjanjianangsuran_id);
		$criteria->compare('refjenistransaksi_id',$this->refjenistransaksi_id,true);
		$criteria->compare('tblketetapanangsuran_ke',$this->tblketetapanangsuran_ke,true);
		$criteria->compare('tblketetapanangsuran_tahunangsur',$this->tblketetapanangsuran_tahunangsur);
		$criteria->compare('tblketetapanangsuran_bulanangsur',$this->tblketetapanangsuran_bulanangsur);
		$criteria->compare('tblketetapanangsuran_masaawal',$this->tblketetapanangsuran_masaawal,true);
		$criteria->compare('tblketetapanangsuran_masaakhir',$this->tblketetapanangsuran_masaakhir,true);
		// $criteria->compare('refrekening_id',$this->refrekening_id,true);
		$criteria->compare('tblketetapanangsuran_pokokangsur',$this->tblketetapanangsuran_pokokangsur,true);
		$criteria->compare('tblketetapanangsuran_tarifangsur',$this->tblketetapanangsuran_tarifangsur,true);
		$criteria->compare('tblketetapanangsuran_bungaangsur',$this->tblketetapanangsuran_bungaangsur,true);
		$criteria->compare('tblketetapanangsuran_nosspd',$this->tblketetapanangsuran_nosspd,true);
		$criteria->compare('tblketetapanangsuran_noreg',$this->tblketetapanangsuran_noreg,true);
		$criteria->compare('tblketetapanangsuran_tglsetor',$this->tblketetapanangsuran_tglsetor,true);
		$criteria->compare('tblketetapanangsuran_viabayar',$this->tblketetapanangsuran_viabayar);
		$criteria->compare('tblketetapanangsuran_tgljatuhtempoangsur',$this->tblketetapanangsuran_tgljatuhtempoangsur,true);
		$criteria->compare('tblketetapanangsuran_rupiahdendaterlambat',$this->tblketetapanangsuran_rupiahdendaterlambat,true);
		$criteria->compare('tblketetapanangsuran_jumlahsetor',$this->tblketetapanangsuran_jumlahsetor,true);
		$criteria->compare('tblpengguna_penggunapendaftaranid',$this->tblpengguna_penggunapendaftaranid);
		$criteria->compare('tblpengguna_penggunapenetapanid',$this->tblpengguna_penggunapenetapanid);
		$criteria->compare('tblpengguna_penggunapenyetoranid',$this->tblpengguna_penggunapenyetoranid);
		$criteria->compare('tblketetapanangsuran_isbayar',$this->tblketetapanangsuran_isbayar,true);
		$criteria->compare('tblketetapanangsuran_ispiutang',$this->tblketetapanangsuran_ispiutang,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KetetapanAngsuran the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

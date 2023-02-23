<?php

/**
 * This is the model class for table "TNPWPD".
 *
 * The followings are the available columns in table 'TNPWPD':
 * @property integer $TNPWPD_ID
 * @property integer $TSUBYEK_ID
 * @property string $TNPWPD_MILIKNAMA
 * @property string $TNPWPD_NIK
 * @property string $TNPWPD_NPWP
 * @property string $TNPWPD_MILIKJAB
 * @property string $TNPWPD_MILIKALAMAT
 * @property string $TNPWPD_MILIKJALAN
 * @property string $TNPWPD_MILIKRTRWRK
 * @property string $TNPWPD_MILIKKEL
 * @property string $TNPWPD_MILIKKEC
 * @property integer $TNPWPD_MILIKPROVID
 * @property integer $TNPWPD_MILIKKABID
 * @property integer $TNPWPD_MILIKKECID
 * @property integer $TNPWPD_MILIKKELID
 * @property string $TNPWPD_MILIKTELP
 * @property string $TNPWPD_MILIKHP
 * @property string $TNPWPD_MILIKHP2
 * @property string $TNPWPD_MILIKKODEPOS
 * @property integer $TREKENING_ID
 * @property string $TREKENING_KODE
 * @property string $TNPWPD_NPWPD
 * @property string $TNPWPD_TGLDAFTAR
 * @property string $TNPWPD_NAMAJELAS
 * @property string $TNPWPD_TGLTERIMA
 * @property string $TNPWPD_NAMATERIMA
 * @property string $TNPWPD_NIPTERIMA
 * @property string $TNPWPD_ESTIMASI
 * @property string $TNPWPD_KET
 * @property string $TNPWPD_TGLCATAT
 * @property string $TNPWPD_NAMACATAT
 * @property string $TNPWPD_NIPCATAT
 * @property string $TNPWPD_NOFORMULIR
 * @property integer $TBLPENGGUNA_ID
 * @property string $TNPWPD_TGLENTRY
 * @property string $TNPWPD_TGLUPDATE
 * @property string $TNPWPD_ISKUKUH
 * @property string $TNPWPD_TGLKUKUH
 * @property string $TNPWPD_NOKUKUH
 * @property string $TNPWPD_HAPUS
 * @property string $TNPWPD_ISAKTIF
 */
class TNPWPD extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TNPWPD';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TNPWPD_ID, TSUBYEK_ID', 'required'),
			array('TNPWPD_ID, TSUBYEK_ID, TNPWPD_MILIKPROVID, TNPWPD_MILIKKABID, TNPWPD_MILIKKECID, TNPWPD_MILIKKELID, TREKENING_ID, TBLPENGGUNA_ID', 'numerical', 'integerOnly'=>true),
			array('TNPWPD_MILIKNAMA, TNPWPD_MILIKJAB, TNPWPD_MILIKALAMAT, TNPWPD_MILIKJALAN, TNPWPD_MILIKRTRWRK, TNPWPD_MILIKKEL, TNPWPD_MILIKKEC, TNPWPD_MILIKTELP, TNPWPD_NPWPD, TNPWPD_NAMAJELAS, TNPWPD_NAMATERIMA, TNPWPD_NAMACATAT, TNPWPD_NOFORMULIR, TNPWPD_NOKUKUH', 'length', 'max'=>255),
			array('TNPWPD_NIK, TNPWPD_NPWP, TNPWPD_MILIKHP, TNPWPD_MILIKHP2', 'length', 'max'=>100),
			array('TNPWPD_MILIKKODEPOS', 'length', 'max'=>10),
			array('TREKENING_KODE', 'length', 'max'=>20),
			array('TNPWPD_NIPTERIMA, TNPWPD_NIPCATAT', 'length', 'max'=>15),
			array('TNPWPD_KET', 'length', 'max'=>500),
			array('TNPWPD_ISKUKUH, TNPWPD_HAPUS, TNPWPD_ISAKTIF', 'length', 'max'=>1),
			array('TNPWPD_TGLDAFTAR, TNPWPD_TGLTERIMA, TNPWPD_ESTIMASI, TNPWPD_TGLCATAT, TNPWPD_TGLENTRY, TNPWPD_TGLUPDATE, TNPWPD_TGLKUKUH', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TNPWPD_ID, TSUBYEK_ID, TNPWPD_MILIKNAMA, TNPWPD_NIK, TNPWPD_NPWP, TNPWPD_MILIKJAB, TNPWPD_MILIKALAMAT, TNPWPD_MILIKJALAN, TNPWPD_MILIKRTRWRK, TNPWPD_MILIKKEL, TNPWPD_MILIKKEC, TNPWPD_MILIKPROVID, TNPWPD_MILIKKABID, TNPWPD_MILIKKECID, TNPWPD_MILIKKELID, TNPWPD_MILIKTELP, TNPWPD_MILIKHP, TNPWPD_MILIKHP2, TNPWPD_MILIKKODEPOS, TREKENING_ID, TREKENING_KODE, TNPWPD_NPWPD, TNPWPD_TGLDAFTAR, TNPWPD_NAMAJELAS, TNPWPD_TGLTERIMA, TNPWPD_NAMATERIMA, TNPWPD_NIPTERIMA, TNPWPD_ESTIMASI, TNPWPD_KET, TNPWPD_TGLCATAT, TNPWPD_NAMACATAT, TNPWPD_NIPCATAT, TNPWPD_NOFORMULIR, TBLPENGGUNA_ID, TNPWPD_TGLENTRY, TNPWPD_TGLUPDATE, TNPWPD_ISKUKUH, TNPWPD_TGLKUKUH, TNPWPD_NOKUKUH, TNPWPD_HAPUS, TNPWPD_ISAKTIF', 'safe', 'on'=>'search'),
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
			'TNPWPD_ID' => 'Tnpwpd',
			'TSUBYEK_ID' => 'Tsubyek',
			'TNPWPD_MILIKNAMA' => 'Tnpwpd Miliknama',
			'TNPWPD_NIK' => 'Tnpwpd Nik',
			'TNPWPD_NPWP' => 'Tnpwpd Npwp',
			'TNPWPD_MILIKJAB' => 'Tnpwpd Milikjab',
			'TNPWPD_MILIKALAMAT' => 'Tnpwpd Milikalamat',
			'TNPWPD_MILIKJALAN' => 'Tnpwpd Milikjalan',
			'TNPWPD_MILIKRTRWRK' => 'Tnpwpd Milikrtrwrk',
			'TNPWPD_MILIKKEL' => 'Tnpwpd Milikkel',
			'TNPWPD_MILIKKEC' => 'Tnpwpd Milikkec',
			'TNPWPD_MILIKPROVID' => 'Tnpwpd Milikprovid',
			'TNPWPD_MILIKKABID' => 'Tnpwpd Milikkabid',
			'TNPWPD_MILIKKECID' => 'Tnpwpd Milikkecid',
			'TNPWPD_MILIKKELID' => 'Tnpwpd Milikkelid',
			'TNPWPD_MILIKTELP' => 'Tnpwpd Miliktelp',
			'TNPWPD_MILIKHP' => 'Tnpwpd Milikhp',
			'TNPWPD_MILIKHP2' => 'Tnpwpd Milikhp2',
			'TNPWPD_MILIKKODEPOS' => 'Tnpwpd Milikkodepos',
			'TREKENING_ID' => 'Trekening',
			'TREKENING_KODE' => 'Trekening Kode',
			'TNPWPD_NPWPD' => 'Tnpwpd Npwpd',
			'TNPWPD_TGLDAFTAR' => 'Tnpwpd Tgldaftar',
			'TNPWPD_NAMAJELAS' => 'Tnpwpd Namajelas',
			'TNPWPD_TGLTERIMA' => 'Tnpwpd Tglterima',
			'TNPWPD_NAMATERIMA' => 'Tnpwpd Namaterima',
			'TNPWPD_NIPTERIMA' => 'Tnpwpd Nipterima',
			'TNPWPD_ESTIMASI' => 'Tnpwpd Estimasi',
			'TNPWPD_KET' => 'Tnpwpd Ket',
			'TNPWPD_TGLCATAT' => 'Tnpwpd Tglcatat',
			'TNPWPD_NAMACATAT' => 'Tnpwpd Namacatat',
			'TNPWPD_NIPCATAT' => 'Tnpwpd Nipcatat',
			'TNPWPD_NOFORMULIR' => 'Tnpwpd Noformulir',
			'TBLPENGGUNA_ID' => 'Tblpengguna',
			'TNPWPD_TGLENTRY' => 'Tnpwpd Tglentry',
			'TNPWPD_TGLUPDATE' => 'Tnpwpd Tglupdate',
			'TNPWPD_ISKUKUH' => 'Tnpwpd Iskukuh',
			'TNPWPD_TGLKUKUH' => 'Tnpwpd Tglkukuh',
			'TNPWPD_NOKUKUH' => 'Tnpwpd Nokukuh',
			'TNPWPD_HAPUS' => 'Tnpwpd Hapus',
			'TNPWPD_ISAKTIF' => 'Tnpwpd Isaktif',
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

		$criteria->compare('TNPWPD_ID',$this->TNPWPD_ID);
		$criteria->compare('TSUBYEK_ID',$this->TSUBYEK_ID);
		$criteria->compare('TNPWPD_MILIKNAMA',$this->TNPWPD_MILIKNAMA,true);
		$criteria->compare('TNPWPD_NIK',$this->TNPWPD_NIK,true);
		$criteria->compare('TNPWPD_NPWP',$this->TNPWPD_NPWP,true);
		$criteria->compare('TNPWPD_MILIKJAB',$this->TNPWPD_MILIKJAB,true);
		$criteria->compare('TNPWPD_MILIKALAMAT',$this->TNPWPD_MILIKALAMAT,true);
		$criteria->compare('TNPWPD_MILIKJALAN',$this->TNPWPD_MILIKJALAN,true);
		$criteria->compare('TNPWPD_MILIKRTRWRK',$this->TNPWPD_MILIKRTRWRK,true);
		$criteria->compare('TNPWPD_MILIKKEL',$this->TNPWPD_MILIKKEL,true);
		$criteria->compare('TNPWPD_MILIKKEC',$this->TNPWPD_MILIKKEC,true);
		$criteria->compare('TNPWPD_MILIKPROVID',$this->TNPWPD_MILIKPROVID);
		$criteria->compare('TNPWPD_MILIKKABID',$this->TNPWPD_MILIKKABID);
		$criteria->compare('TNPWPD_MILIKKECID',$this->TNPWPD_MILIKKECID);
		$criteria->compare('TNPWPD_MILIKKELID',$this->TNPWPD_MILIKKELID);
		$criteria->compare('TNPWPD_MILIKTELP',$this->TNPWPD_MILIKTELP,true);
		$criteria->compare('TNPWPD_MILIKHP',$this->TNPWPD_MILIKHP,true);
		$criteria->compare('TNPWPD_MILIKHP2',$this->TNPWPD_MILIKHP2,true);
		$criteria->compare('TNPWPD_MILIKKODEPOS',$this->TNPWPD_MILIKKODEPOS,true);
		$criteria->compare('TREKENING_ID',$this->TREKENING_ID);
		$criteria->compare('TREKENING_KODE',$this->TREKENING_KODE,true);
		$criteria->compare('TNPWPD_NPWPD',$this->TNPWPD_NPWPD,true);
		$criteria->compare('TNPWPD_TGLDAFTAR',$this->TNPWPD_TGLDAFTAR,true);
		$criteria->compare('TNPWPD_NAMAJELAS',$this->TNPWPD_NAMAJELAS,true);
		$criteria->compare('TNPWPD_TGLTERIMA',$this->TNPWPD_TGLTERIMA,true);
		$criteria->compare('TNPWPD_NAMATERIMA',$this->TNPWPD_NAMATERIMA,true);
		$criteria->compare('TNPWPD_NIPTERIMA',$this->TNPWPD_NIPTERIMA,true);
		$criteria->compare('TNPWPD_ESTIMASI',$this->TNPWPD_ESTIMASI,true);
		$criteria->compare('TNPWPD_KET',$this->TNPWPD_KET,true);
		$criteria->compare('TNPWPD_TGLCATAT',$this->TNPWPD_TGLCATAT,true);
		$criteria->compare('TNPWPD_NAMACATAT',$this->TNPWPD_NAMACATAT,true);
		$criteria->compare('TNPWPD_NIPCATAT',$this->TNPWPD_NIPCATAT,true);
		$criteria->compare('TNPWPD_NOFORMULIR',$this->TNPWPD_NOFORMULIR,true);
		$criteria->compare('TBLPENGGUNA_ID',$this->TBLPENGGUNA_ID);
		$criteria->compare('TNPWPD_TGLENTRY',$this->TNPWPD_TGLENTRY,true);
		$criteria->compare('TNPWPD_TGLUPDATE',$this->TNPWPD_TGLUPDATE,true);
		$criteria->compare('TNPWPD_ISKUKUH',$this->TNPWPD_ISKUKUH,true);
		$criteria->compare('TNPWPD_TGLKUKUH',$this->TNPWPD_TGLKUKUH,true);
		$criteria->compare('TNPWPD_NOKUKUH',$this->TNPWPD_NOKUKUH,true);
		$criteria->compare('TNPWPD_HAPUS',$this->TNPWPD_HAPUS,true);
		$criteria->compare('TNPWPD_ISAKTIF',$this->TNPWPD_ISAKTIF,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TNPWPD the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

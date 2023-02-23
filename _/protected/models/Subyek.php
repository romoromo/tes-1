<?php

/**
 * This is the model class for table "TBLSUBYEK".
 *
 * The followings are the available columns in table 'TBLSUBYEK':
 * @property string $TBLSUBYEK_ID
 * @property string $TBLSUBYEK_NODAFTAR
 * @property string $TBLSUBYEK_TGLDAFTAR
 * @property string $TBLSUBYEK_WN
 * @property string $TBLSUBYEK_JENISUSAHA
 * @property string $TBLSUBYEK_NIK
 * @property string $TBLSUBYEK_NPWP
 * @property string $TBLSUBYEK_PASPORT
 * @property string $TBLSUBYEK_NAMA
 * @property string $TBLSUBYEK_NAMAPENANGGUNGJAWAB
 * @property string $TBLSUBYEK_NIKPENANGGUNGJAWAB
 * @property string $TBLSUBYEK_NOHPPENANGGUNGJAWAB
 * @property string $TBLSUBYEK_STATUS
 * @property integer $REFPROPINSI_ID
 * @property integer $REFKABUPATEN_ID
 * @property integer $REFKECAMATAN_ID
 * @property integer $REFKELURAHAN_ID
 * @property string $TBLSUBYEK_ALAMAT
 * @property string $TBLSUBYEK_KODEPOS
 * @property string $TBLSUBYEK_EMAIL
 * @property string $TBLSUBYEK_HP
 * @property string $TBLSUBYEK_TELPON
 * @property integer $TBLPENGGUNA_ID
 * @property string $TBLSUBYEK_TGLSYSINSERT
 * @property string $TBLSUBYEK_TGLSYSEDIT
 * @property string $TBLSUBYEK_HAPUS
 *
 * The followings are the available model relations:
 * @property Refkabupaten $refkabupaten
 * @property Refkecamatan $refkecamatan
 * @property Refkelurahan $refkelurahan
 * @property Refpropinsi $refpropinsi
 */
class Subyek extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TBLSUBYEK';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TBLSUBYEK_TGLDAFTAR, TBLSUBYEK_NAMA, TBLSUBYEK_ALAMAT, TBLPENGGUNA_ID, TBLSUBYEK_TGLSYSINSERT', 'required'),
			array('REFPROPINSI_ID, REFKABUPATEN_ID, TBLPENGGUNA_ID', 'numerical', 'integerOnly'=>true),
			array('TBLSUBYEK_NODAFTAR', 'length', 'max'=>50),
			array('TBLSUBYEK_WN', 'length', 'max'=>3),
			array('TBLSUBYEK_JENISUSAHA', 'length', 'max'=>11),
			array('TBLSUBYEK_NIK, TBLSUBYEK_NPWP, TBLSUBYEK_PASPORT', 'length', 'max'=>30),
			array('TBLSUBYEK_NAMA, TBLSUBYEK_NAMAPENANGGUNGJAWAB', 'length', 'max'=>150),
			array('TBLSUBYEK_NIKPENANGGUNGJAWAB', 'length', 'max'=>25),
			array('TBLSUBYEK_NOHPPENANGGUNGJAWAB, TBLSUBYEK_HP', 'length', 'max'=>15),
			array('TBLSUBYEK_STATUS', 'length', 'max'=>13),
			array('TBLSUBYEK_ALAMAT', 'length', 'max'=>250),
			array('TBLSUBYEK_KODEPOS', 'length', 'max'=>10),
			array('TBLSUBYEK_EMAIL', 'length', 'max'=>100),
			array('TBLSUBYEK_HAPUS', 'length', 'max'=>2),
			array('TBLSUBYEK_TELPON', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TBLSUBYEK_ID, TBLSUBYEK_NODAFTAR, TBLSUBYEK_TGLDAFTAR, TBLSUBYEK_WN, TBLSUBYEK_JENISUSAHA, TBLSUBYEK_NIK, TBLSUBYEK_NPWP, TBLSUBYEK_PASPORT, TBLSUBYEK_NAMA, TBLSUBYEK_NAMAPENANGGUNGJAWAB, TBLSUBYEK_NIKPENANGGUNGJAWAB, TBLSUBYEK_NOHPPENANGGUNGJAWAB, TBLSUBYEK_STATUS, REFPROPINSI_ID, REFKABUPATEN_ID, REFKECAMATAN_ID, REFKELURAHAN_ID, TBLSUBYEK_ALAMAT, TBLSUBYEK_KODEPOS, TBLSUBYEK_EMAIL, TBLSUBYEK_HP, TBLSUBYEK_TELPON, TBLPENGGUNA_ID, TBLSUBYEK_TGLSYSINSERT, TBLSUBYEK_TGLSYSEDIT, TBLSUBYEK_HAPUS', 'safe', 'on'=>'search'),
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
			'refkabupaten' => array(self::BELONGS_TO, 'Refkabupaten', 'REFKABUPATEN_ID'),
			'refkecamatan' => array(self::BELONGS_TO, 'Refkecamatan', 'REFKECAMATAN_ID'),
			'refkelurahan' => array(self::BELONGS_TO, 'Refkelurahan', 'REFKELURAHAN_ID'),
			'refpropinsi' => array(self::BELONGS_TO, 'Refpropinsi', 'REFPROPINSI_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'TBLSUBYEK_ID' => 'Tblsubyek',
			'TBLSUBYEK_NODAFTAR' => 'Tblsubyek Nodaftar',
			'TBLSUBYEK_TGLDAFTAR' => 'Tblsubyek Tgldaftar',
			'TBLSUBYEK_WN' => 'Tblsubyek Wn',
			'TBLSUBYEK_JENISUSAHA' => 'Tblsubyek Jenisusaha',
			'TBLSUBYEK_NIK' => 'Tblsubyek Nik',
			'TBLSUBYEK_NPWP' => 'Tblsubyek Npwp',
			'TBLSUBYEK_PASPORT' => 'Tblsubyek Pasport',
			'TBLSUBYEK_NAMA' => 'Tblsubyek Nama',
			'TBLSUBYEK_NAMAPENANGGUNGJAWAB' => 'Tblsubyek Namapenanggungjawab',
			'TBLSUBYEK_NIKPENANGGUNGJAWAB' => 'Tblsubyek Nikpenanggungjawab',
			'TBLSUBYEK_NOHPPENANGGUNGJAWAB' => 'Tblsubyek Nohppenanggungjawab',
			'TBLSUBYEK_STATUS' => 'Tblsubyek Status',
			'REFPROPINSI_ID' => 'Refpropinsi',
			'REFKABUPATEN_ID' => 'Refkabupaten',
			'REFKECAMATAN_ID' => 'Refkecamatan',
			'REFKELURAHAN_ID' => 'Refkelurahan',
			'TBLSUBYEK_ALAMAT' => 'Tblsubyek Alamat',
			'TBLSUBYEK_KODEPOS' => 'Tblsubyek Kodepos',
			'TBLSUBYEK_EMAIL' => 'Tblsubyek Email',
			'TBLSUBYEK_HP' => 'Tblsubyek Hp',
			'TBLSUBYEK_TELPON' => 'Tblsubyek Telpon',
			'TBLPENGGUNA_ID' => 'Tblpengguna',
			'TBLSUBYEK_TGLSYSINSERT' => 'Tblsubyek Tglsysinsert',
			'TBLSUBYEK_TGLSYSEDIT' => 'Tblsubyek Tglsysedit',
			'TBLSUBYEK_HAPUS' => 'Tblsubyek Hapus',
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

		$criteria->compare('TBLSUBYEK_ID',$this->TBLSUBYEK_ID,true);
		$criteria->compare('TBLSUBYEK_NODAFTAR',$this->TBLSUBYEK_NODAFTAR,true);
		$criteria->compare('TBLSUBYEK_TGLDAFTAR',$this->TBLSUBYEK_TGLDAFTAR,true);
		$criteria->compare('TBLSUBYEK_WN',$this->TBLSUBYEK_WN,true);
		$criteria->compare('TBLSUBYEK_JENISUSAHA',$this->TBLSUBYEK_JENISUSAHA,true);
		$criteria->compare('TBLSUBYEK_NIK',$this->TBLSUBYEK_NIK,true);
		$criteria->compare('TBLSUBYEK_NPWP',$this->TBLSUBYEK_NPWP,true);
		$criteria->compare('TBLSUBYEK_PASPORT',$this->TBLSUBYEK_PASPORT,true);
		$criteria->compare('TBLSUBYEK_NAMA',$this->TBLSUBYEK_NAMA,true);
		$criteria->compare('TBLSUBYEK_NAMAPENANGGUNGJAWAB',$this->TBLSUBYEK_NAMAPENANGGUNGJAWAB,true);
		$criteria->compare('TBLSUBYEK_NIKPENANGGUNGJAWAB',$this->TBLSUBYEK_NIKPENANGGUNGJAWAB,true);
		$criteria->compare('TBLSUBYEK_NOHPPENANGGUNGJAWAB',$this->TBLSUBYEK_NOHPPENANGGUNGJAWAB,true);
		$criteria->compare('TBLSUBYEK_STATUS',$this->TBLSUBYEK_STATUS,true);
		$criteria->compare('REFPROPINSI_ID',$this->REFPROPINSI_ID);
		$criteria->compare('REFKABUPATEN_ID',$this->REFKABUPATEN_ID);
		$criteria->compare('REFKECAMATAN_ID',$this->REFKECAMATAN_ID);
		$criteria->compare('REFKELURAHAN_ID',$this->REFKELURAHAN_ID);
		$criteria->compare('TBLSUBYEK_ALAMAT',$this->TBLSUBYEK_ALAMAT,true);
		$criteria->compare('TBLSUBYEK_KODEPOS',$this->TBLSUBYEK_KODEPOS,true);
		$criteria->compare('TBLSUBYEK_EMAIL',$this->TBLSUBYEK_EMAIL,true);
		$criteria->compare('TBLSUBYEK_HP',$this->TBLSUBYEK_HP,true);
		$criteria->compare('TBLSUBYEK_TELPON',$this->TBLSUBYEK_TELPON,true);
		$criteria->compare('TBLPENGGUNA_ID',$this->TBLPENGGUNA_ID);
		$criteria->compare('TBLSUBYEK_TGLSYSINSERT',$this->TBLSUBYEK_TGLSYSINSERT,true);
		$criteria->compare('TBLSUBYEK_TGLSYSEDIT',$this->TBLSUBYEK_TGLSYSEDIT,true);
		$criteria->compare('TBLSUBYEK_HAPUS',$this->TBLSUBYEK_HAPUS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Subyek the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

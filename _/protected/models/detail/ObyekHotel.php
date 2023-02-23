<?php

/**
 * This is the model class for table "tblobyekhotel".
 *
 * The followings are the available columns in table 'tblobyekhotel':
 * @property string $tblobyekhotel_id
 * @property string $tblobyek_id
 * @property string $tblobyek_nomor
 * @property integer $refbidangusaha_id
 * @property string $tblobyekhotel_isregister
 * @property string $tblobyekhotel_iskas
 * @property integer $refgolhotel_id
 * @property string $tblobyekhotel_isrsidang
 * @property string $tblobyekhotel_isrestoran
 * @property string $tblobyekhotel_isdiskotik
 * @property string $tblobyekhotel_iskolamrenang
 * @property string $tblobyekhotel_isbillyard
 * @property string $tblobyekhotel_islaundry
 * @property string $tblobyekhotel_isrpertemuan
 * @property string $tblobyekhotel_issewaruangan
 * @property string $tblobyekhotel_iscoffeshop
 * @property string $tblobyekhotel_isfitnescentre
 * @property string $tblobyekhotel_isbusiness
 * @property string $tblobyekhotel_isbabershop
 * @property integer $tblobyekhotel_jumlahpegawai
 */
class ObyekHotel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblobyekhotel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refbidangusaha_id, refgolhotel_id, tblobyekhotel_jumlahpegawai', 'numerical', 'integerOnly'=>true),
			array('tblobyek_id', 'length', 'max'=>19),
			array('tblobyek_nomor, tblobyekhotel_isregister, tblobyekhotel_iskas', 'length', 'max'=>255),
			array('tblobyekhotel_isrsidang, tblobyekhotel_isrestoran, tblobyekhotel_isdiskotik, tblobyekhotel_iskolamrenang, tblobyekhotel_isbillyard, tblobyekhotel_islaundry, tblobyekhotel_isrpertemuan, tblobyekhotel_issewaruangan, tblobyekhotel_iscoffeshop, tblobyekhotel_isfitnescentre, tblobyekhotel_isbusiness, tblobyekhotel_isbabershop', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblobyekhotel_id, tblobyek_id, tblobyek_nomor, refbidangusaha_id, tblobyekhotel_isregister, tblobyekhotel_iskas, refgolhotel_id, tblobyekhotel_isrsidang, tblobyekhotel_isrestoran, tblobyekhotel_isdiskotik, tblobyekhotel_iskolamrenang, tblobyekhotel_isbillyard, tblobyekhotel_islaundry, tblobyekhotel_isrpertemuan, tblobyekhotel_issewaruangan, tblobyekhotel_iscoffeshop, tblobyekhotel_isfitnescentre, tblobyekhotel_isbusiness, tblobyekhotel_isbabershop, tblobyekhotel_jumlahpegawai', 'safe', 'on'=>'search'),
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
			'tblobyekhotel_id' => 'Tblobyekhotel',
			'tblobyek_id' => 'Tblobyek',
			'tblobyek_nomor' => 'Tblobyek Nomor',
			'refbidangusaha_id' => 'Refbidangusaha',
			'tblobyekhotel_isregister' => 'Tblobyekhotel Isregister',
			'tblobyekhotel_iskas' => 'Tblobyekhotel Iskas',
			'refgolhotel_id' => 'Refgolhotel',
			'tblobyekhotel_isrsidang' => 'Tblobyekhotel Isrsidang',
			'tblobyekhotel_isrestoran' => 'Tblobyekhotel Isrestoran',
			'tblobyekhotel_isdiskotik' => 'Tblobyekhotel Isdiskotik',
			'tblobyekhotel_iskolamrenang' => 'Tblobyekhotel Iskolamrenang',
			'tblobyekhotel_isbillyard' => 'Tblobyekhotel Isbillyard',
			'tblobyekhotel_islaundry' => 'Tblobyekhotel Islaundry',
			'tblobyekhotel_isrpertemuan' => 'Tblobyekhotel Isrpertemuan',
			'tblobyekhotel_issewaruangan' => 'Tblobyekhotel Issewaruangan',
			'tblobyekhotel_iscoffeshop' => 'Tblobyekhotel Iscoffeshop',
			'tblobyekhotel_isfitnescentre' => 'Tblobyekhotel Isfitnescentre',
			'tblobyekhotel_isbusiness' => 'Tblobyekhotel Isbusiness',
			'tblobyekhotel_isbabershop' => 'Tblobyekhotel Isbabershop',
			'tblobyekhotel_jumlahpegawai' => 'Tblobyekhotel Jumlahpegawai',
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

		$criteria->compare('tblobyekhotel_id',$this->tblobyekhotel_id,true);
		$criteria->compare('tblobyek_id',$this->tblobyek_id,true);
		$criteria->compare('tblobyek_nomor',$this->tblobyek_nomor,true);
		$criteria->compare('refbidangusaha_id',$this->refbidangusaha_id);
		$criteria->compare('tblobyekhotel_isregister',$this->tblobyekhotel_isregister,true);
		$criteria->compare('tblobyekhotel_iskas',$this->tblobyekhotel_iskas,true);
		$criteria->compare('refgolhotel_id',$this->refgolhotel_id);
		$criteria->compare('tblobyekhotel_isrsidang',$this->tblobyekhotel_isrsidang,true);
		$criteria->compare('tblobyekhotel_isrestoran',$this->tblobyekhotel_isrestoran,true);
		$criteria->compare('tblobyekhotel_isdiskotik',$this->tblobyekhotel_isdiskotik,true);
		$criteria->compare('tblobyekhotel_iskolamrenang',$this->tblobyekhotel_iskolamrenang,true);
		$criteria->compare('tblobyekhotel_isbillyard',$this->tblobyekhotel_isbillyard,true);
		$criteria->compare('tblobyekhotel_islaundry',$this->tblobyekhotel_islaundry,true);
		$criteria->compare('tblobyekhotel_isrpertemuan',$this->tblobyekhotel_isrpertemuan,true);
		$criteria->compare('tblobyekhotel_issewaruangan',$this->tblobyekhotel_issewaruangan,true);
		$criteria->compare('tblobyekhotel_iscoffeshop',$this->tblobyekhotel_iscoffeshop,true);
		$criteria->compare('tblobyekhotel_isfitnescentre',$this->tblobyekhotel_isfitnescentre,true);
		$criteria->compare('tblobyekhotel_isbusiness',$this->tblobyekhotel_isbusiness,true);
		$criteria->compare('tblobyekhotel_isbabershop',$this->tblobyekhotel_isbabershop,true);
		$criteria->compare('tblobyekhotel_jumlahpegawai',$this->tblobyekhotel_jumlahpegawai);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ObyekHotel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

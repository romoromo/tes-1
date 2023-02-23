<?php

/**
 * This is the model class for table "tblobyekparkir".
 *
 * The followings are the available columns in table 'tblobyekparkir':
 * @property string $tblobyekparkir_id
 * @property string $tblobyek_id
 * @property string $tblobyek_nomor
 * @property string $tblobyekparkir_kendaraan
 * @property string $tblobyekparkir_kapasitas
 * @property string $tblobyekparkir_tarif
 */
class ObyekParkir extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblobyekparkir';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblobyek_id', 'length', 'max'=>19),
			array('tblobyek_nomor', 'length', 'max'=>255),
			array('tblobyekparkir_kendaraan', 'length', 'max'=>225),
			array('tblobyekparkir_kapasitas, tblobyekparkir_tarif', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblobyekparkir_id, tblobyek_id, tblobyek_nomor, tblobyekparkir_kendaraan, tblobyekparkir_kapasitas, tblobyekparkir_tarif', 'safe', 'on'=>'search'),
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
			'tblobyekparkir_id' => 'Tblobyekparkir',
			'tblobyek_id' => 'Tblobyek',
			'tblobyek_nomor' => 'Tblobyek Nomor',
			'tblobyekparkir_kendaraan' => 'Tblobyekparkir Kendaraan',
			'tblobyekparkir_kapasitas' => 'Tblobyekparkir Kapasitas',
			'tblobyekparkir_tarif' => 'Tblobyekparkir Tarif',
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

		$criteria->compare('tblobyekparkir_id',$this->tblobyekparkir_id,true);
		$criteria->compare('tblobyek_id',$this->tblobyek_id,true);
		$criteria->compare('tblobyek_nomor',$this->tblobyek_nomor,true);
		$criteria->compare('tblobyekparkir_kendaraan',$this->tblobyekparkir_kendaraan,true);
		$criteria->compare('tblobyekparkir_kapasitas',$this->tblobyekparkir_kapasitas,true);
		$criteria->compare('tblobyekparkir_tarif',$this->tblobyekparkir_tarif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ObyekParkir the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

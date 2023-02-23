<?php

/**
 * This is the model class for table "tblobyekairtanah".
 *
 * The followings are the available columns in table 'tblobyekairtanah':
 * @property string $tblobyekairtanah_id
 * @property string $tblobyek_id
 * @property string $tblobyek_nomor
 * @property integer $refbidangusaha_id
 * @property string $tblobyekairtanah_lokasisumber
 * @property integer $refsumberairtanah_id
 * @property string $tblobyekairtanah_volume
 */
class ObyekAirTanah extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblobyekairtanah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refbidangusaha_id, refsumberairtanah_id', 'numerical', 'integerOnly'=>true),
			array('tblobyek_id', 'length', 'max'=>19),
			array('tblobyek_nomor', 'length', 'max'=>255),
			array('tblobyekairtanah_volume', 'length', 'max'=>16),
			array('tblobyekairtanah_lokasisumber', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblobyekairtanah_id, tblobyek_id, tblobyek_nomor, refbidangusaha_id, tblobyekairtanah_lokasisumber, refsumberairtanah_id, tblobyekairtanah_volume', 'safe', 'on'=>'search'),
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
			'tblobyekairtanah_id' => 'Tblobyekairtanah',
			'tblobyek_id' => 'Tblobyek',
			'tblobyek_nomor' => 'Tblobyek Nomor',
			'refbidangusaha_id' => 'Refbidangusaha',
			'tblobyekairtanah_lokasisumber' => 'Tblobyekairtanah Lokasisumber',
			'refsumberairtanah_id' => 'Refsumberairtanah',
			'tblobyekairtanah_volume' => 'Tblobyekairtanah Volume',
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

		$criteria->compare('tblobyekairtanah_id',$this->tblobyekairtanah_id,true);
		$criteria->compare('tblobyek_id',$this->tblobyek_id,true);
		$criteria->compare('tblobyek_nomor',$this->tblobyek_nomor,true);
		$criteria->compare('refbidangusaha_id',$this->refbidangusaha_id);
		$criteria->compare('tblobyekairtanah_lokasisumber',$this->tblobyekairtanah_lokasisumber,true);
		$criteria->compare('refsumberairtanah_id',$this->refsumberairtanah_id);
		$criteria->compare('tblobyekairtanah_volume',$this->tblobyekairtanah_volume,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ObyekAirTanah the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

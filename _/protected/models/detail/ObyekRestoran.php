<?php

/**
 * This is the model class for table "tblobyekrestoran".
 *
 * The followings are the available columns in table 'tblobyekrestoran':
 * @property string $tblobyekrestoran_id
 * @property string $tblobyek_id
 * @property string $tblobyek_nomor
 * @property integer $refgolrestoran_id
 * @property string $tblobyekrestoran_isregister
 * @property string $tblobyekrestoran_iskas
 */
class ObyekRestoran extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblobyekrestoran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refgolrestoran_id', 'numerical', 'integerOnly'=>true),
			array('tblobyek_id', 'length', 'max'=>19),
			array('tblobyek_nomor', 'length', 'max'=>255),
			array('tblobyekrestoran_isregister, tblobyekrestoran_iskas', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblobyekrestoran_id, tblobyek_id, tblobyek_nomor, refgolrestoran_id, tblobyekrestoran_isregister, tblobyekrestoran_iskas', 'safe', 'on'=>'search'),
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
			'tblobyekrestoran_id' => 'Tblobyekrestoran',
			'tblobyek_id' => 'Tblobyek',
			'tblobyek_nomor' => 'Tblobyek Nomor',
			'refgolrestoran_id' => 'Refgolrestoran',
			'tblobyekrestoran_isregister' => 'Tblobyekrestoran Isregister',
			'tblobyekrestoran_iskas' => 'Tblobyekrestoran Iskas',
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

		$criteria->compare('tblobyekrestoran_id',$this->tblobyekrestoran_id,true);
		$criteria->compare('tblobyek_id',$this->tblobyek_id,true);
		$criteria->compare('tblobyek_nomor',$this->tblobyek_nomor,true);
		$criteria->compare('refgolrestoran_id',$this->refgolrestoran_id);
		$criteria->compare('tblobyekrestoran_isregister',$this->tblobyekrestoran_isregister,true);
		$criteria->compare('tblobyekrestoran_iskas',$this->tblobyekrestoran_iskas,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ObyekRestoran the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

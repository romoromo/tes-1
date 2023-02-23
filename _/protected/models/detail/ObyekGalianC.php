<?php

/**
 * This is the model class for table "tblobyekgalianc".
 *
 * The followings are the available columns in table 'tblobyekgalianc':
 * @property string $tblobyekgalianc_id
 * @property string $tblobyek_id
 * @property string $tblobyek_nomor
 * @property string $tblobyekgalianc_proyek
 * @property integer $refjenisbahanc_id
 * @property string $tblobyekgalianc_volume
 * @property string $tblobyekgalianc_harga
 */
class ObyekGalianC extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblobyekgalianc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refjenisbahanc_id', 'numerical', 'integerOnly'=>true),
			array('tblobyek_id', 'length', 'max'=>19),
			array('tblobyek_nomor', 'length', 'max'=>255),
			array('tblobyekgalianc_proyek', 'length', 'max'=>6),
			array('tblobyekgalianc_volume, tblobyekgalianc_harga', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblobyekgalianc_id, tblobyek_id, tblobyek_nomor, tblobyekgalianc_proyek, refjenisbahanc_id, tblobyekgalianc_volume, tblobyekgalianc_harga', 'safe', 'on'=>'search'),
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
			'tblobyekgalianc_id' => 'Tblobyekgalianc',
			'tblobyek_id' => 'Tblobyek',
			'tblobyek_nomor' => 'Tblobyek Nomor',
			'tblobyekgalianc_proyek' => 'Tblobyekgalianc Proyek',
			'refjenisbahanc_id' => 'Refjenisbahanc',
			'tblobyekgalianc_volume' => 'Tblobyekgalianc Volume',
			'tblobyekgalianc_harga' => 'Tblobyekgalianc Harga',
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

		$criteria->compare('tblobyekgalianc_id',$this->tblobyekgalianc_id,true);
		$criteria->compare('tblobyek_id',$this->tblobyek_id,true);
		$criteria->compare('tblobyek_nomor',$this->tblobyek_nomor,true);
		$criteria->compare('tblobyekgalianc_proyek',$this->tblobyekgalianc_proyek,true);
		$criteria->compare('refjenisbahanc_id',$this->refjenisbahanc_id);
		$criteria->compare('tblobyekgalianc_volume',$this->tblobyekgalianc_volume,true);
		$criteria->compare('tblobyekgalianc_harga',$this->tblobyekgalianc_harga,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ObyekGalianC the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "tblobyekppj".
 *
 * The followings are the available columns in table 'tblobyekppj':
 * @property string $tblobyekppj_id
 * @property string $tblobyek_id
 * @property string $tblobyek_nomor
 * @property integer $refgoltarifppj_id
 * @property integer $refasallistrikppj_id
 * @property integer $refvoltaseppj_id
 * @property integer $refdayappj_id
 * @property string $tblobyekppj_tarif
 * @property string $tblobyekppj_perkiraan
 */
class ObyekPPJ extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblobyekppj';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refgoltarifppj_id, refasallistrikppj_id, refvoltaseppj_id, refdayappj_id', 'numerical', 'integerOnly'=>true),
			array('tblobyek_id', 'length', 'max'=>19),
			array('tblobyek_nomor', 'length', 'max'=>255),
			array('tblobyekppj_tarif', 'length', 'max'=>20),
			array('tblobyekppj_perkiraan', 'length', 'max'=>16),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblobyekppj_id, tblobyek_id, tblobyek_nomor, refgoltarifppj_id, refasallistrikppj_id, refvoltaseppj_id, refdayappj_id, tblobyekppj_tarif, tblobyekppj_perkiraan', 'safe', 'on'=>'search'),
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
			'tblobyekppj_id' => 'Tblobyekppj',
			'tblobyek_id' => 'Tblobyek',
			'tblobyek_nomor' => 'Tblobyek Nomor',
			'refgoltarifppj_id' => 'Refgoltarifppj',
			'refasallistrikppj_id' => 'Refasallistrikppj',
			'refvoltaseppj_id' => 'Refvoltaseppj',
			'refdayappj_id' => 'Refdayappj',
			'tblobyekppj_tarif' => 'Tblobyekppj Tarif',
			'tblobyekppj_perkiraan' => 'Tblobyekppj Perkiraan',
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

		$criteria->compare('tblobyekppj_id',$this->tblobyekppj_id,true);
		$criteria->compare('tblobyek_id',$this->tblobyek_id,true);
		$criteria->compare('tblobyek_nomor',$this->tblobyek_nomor,true);
		$criteria->compare('refgoltarifppj_id',$this->refgoltarifppj_id);
		$criteria->compare('refasallistrikppj_id',$this->refasallistrikppj_id);
		$criteria->compare('refvoltaseppj_id',$this->refvoltaseppj_id);
		$criteria->compare('refdayappj_id',$this->refdayappj_id);
		$criteria->compare('tblobyekppj_tarif',$this->tblobyekppj_tarif,true);
		$criteria->compare('tblobyekppj_perkiraan',$this->tblobyekppj_perkiraan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ObyekPPJ the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

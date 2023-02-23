<?php

/**
 * This is the model class for table "refjenispermasalahan".
 *
 * The followings are the available columns in table 'refjenispermasalahan':
 * @property integer $refjenispermasalahan_id
 * @property string $refjenispermasalahan_kode
 * @property string $refjenispermasalahan_keterangan
 */
class Refjenispermasalahan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'refjenispermasalahan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refjenispermasalahan_kode', 'length', 'max'=>50),
			array('refjenispermasalahan_keterangan', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('refjenispermasalahan_id, refjenispermasalahan_kode, refjenispermasalahan_keterangan', 'safe', 'on'=>'search'),
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
			'refjenispermasalahan_id' => 'Refjenispermasalahan',
			'refjenispermasalahan_kode' => 'Refjenispermasalahan Kode',
			'refjenispermasalahan_keterangan' => 'Refjenispermasalahan Keterangan',
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

		$criteria->compare('refjenispermasalahan_id',$this->refjenispermasalahan_id);
		$criteria->compare('refjenispermasalahan_kode',$this->refjenispermasalahan_kode,true);
		$criteria->compare('refjenispermasalahan_keterangan',$this->refjenispermasalahan_keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Refjenispermasalahan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

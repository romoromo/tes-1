<?php

/**
 * This is the model class for table "refairjenisindustri".
 *
 * The followings are the available columns in table 'refairjenisindustri':
 * @property integer $refairjenisindustri_id
 * @property string $refairjenisindustri_kode
 * @property string $refairjenisindustri_nama
 * @property string $refairjenisindustri_tahunpajak
 */
class AirJenisIndustri extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'refairjenisindustri';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refairjenisindustri_kode', 'length', 'max'=>10),
			array('refairjenisindustri_nama', 'length', 'max'=>125),
			array('refairjenisindustri_tahunpajak', 'length', 'max'=>18),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('refairjenisindustri_id, refairjenisindustri_kode, refairjenisindustri_nama, refairjenisindustri_tahunpajak', 'safe', 'on'=>'search'),
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
			'refairjenisindustri_id' => 'Refairjenisindustri',
			'refairjenisindustri_kode' => 'Refairjenisindustri Kode',
			'refairjenisindustri_nama' => 'Refairjenisindustri Nama',
			'refairjenisindustri_tahunpajak' => 'Refairjenisindustri Tahunpajak',
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

		$criteria->compare('refairjenisindustri_id',$this->refairjenisindustri_id);
		$criteria->compare('refairjenisindustri_kode',$this->refairjenisindustri_kode,true);
		$criteria->compare('refairjenisindustri_nama',$this->refairjenisindustri_nama,true);
		$criteria->compare('refairjenisindustri_tahunpajak',$this->refairjenisindustri_tahunpajak,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AirJenisIndustri the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

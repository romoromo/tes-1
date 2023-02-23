<?php

/**
 * This is the model class for table "reftahun".
 *
 * The followings are the available columns in table 'reftahun':
 * @property integer $reftahun_id
 * @property integer $reftahun_nama
 * @property string $reftahun_uraian
 * @property string $reftahun_isaktif
 */
class Tahun extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reftahun';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reftahun_nama', 'required'),
			array('reftahun_nama', 'numerical', 'integerOnly'=>true),
			array('reftahun_isaktif', 'length', 'max'=>1),
			array('reftahun_uraian', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('reftahun_id, reftahun_nama, reftahun_uraian, reftahun_isaktif', 'safe', 'on'=>'search'),
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
			'reftahun_id' => 'Reftahun',
			'reftahun_nama' => 'Reftahun Nama',
			'reftahun_uraian' => 'Reftahun Uraian',
			'reftahun_isaktif' => 'Reftahun Isaktif',
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

		$criteria->compare('reftahun_id',$this->reftahun_id);
		$criteria->compare('reftahun_nama',$this->reftahun_nama);
		$criteria->compare('reftahun_uraian',$this->reftahun_uraian,true);
		$criteria->compare('reftahun_isaktif',$this->reftahun_isaktif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tahun the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

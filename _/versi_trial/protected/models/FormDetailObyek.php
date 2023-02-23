<?php

/**
 * This is the model class for table "refformdetailobyek".
 *
 * The followings are the available columns in table 'refformdetailobyek':
 * @property string $refformdetailobyek_id
 * @property string $refrekening_kode
 * @property string $refformdetailobyek_file
 * @property string $refformdetailobyek_tabel
 * @property string $refformdetailobyek_isaktif
 */
class FormDetailObyek extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'refformdetailobyek';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refrekening_kode', 'length', 'max'=>10),
			array('refformdetailobyek_file, refformdetailobyek_tabel', 'length', 'max'=>255),
			array('refformdetailobyek_isaktif', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('refformdetailobyek_id, refrekening_kode, refformdetailobyek_file, refformdetailobyek_tabel, refformdetailobyek_isaktif', 'safe', 'on'=>'search'),
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
			'refformdetailobyek_id' => 'Refformdetailobyek',
			'refrekening_kode' => 'Refrekening Kode',
			'refformdetailobyek_file' => 'Refformdetailobyek File',
			'refformdetailobyek_tabel' => 'Refformdetailobyek Tabel',
			'refformdetailobyek_isaktif' => 'Refformdetailobyek Isaktif',
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

		$criteria->compare('refformdetailobyek_id',$this->refformdetailobyek_id,true);
		$criteria->compare('refrekening_kode',$this->refrekening_kode,true);
		$criteria->compare('refformdetailobyek_file',$this->refformdetailobyek_file,true);
		$criteria->compare('refformdetailobyek_tabel',$this->refformdetailobyek_tabel,true);
		$criteria->compare('refformdetailobyek_isaktif',$this->refformdetailobyek_isaktif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FormDetailObyek the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

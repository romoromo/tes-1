<?php

/**
 * This is the model class for table "tblpejabat".
 *
 * The followings are the available columns in table 'tblpejabat':
 * @property integer $tblpejabat_id
 * @property string $tblpejabat_nama
 * @property string $tblpejabat_nip
 * @property string $tblpejabat_jabatan
 * @property integer $refjabatan_id
 * @property string $tblpejabat_golongan
 */
class Tblpejabat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TBLPEJABAT';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('REFJABATAN_ID', 'numerical', 'integerOnly'=>true),
			array('TBLPEJABAT_NAMA, TBLPEJABAT_NIP', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TBLPEJABAT_ID, TBLPEJABAT_NAMA, TBLPEJABAT_NIP, REFJABATAN_ID', 'safe', 'on'=>'search'),
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
			'TBLPEJABAT_ID' => 'Tblpejabat',
			'TBLPEJABAT_NAMA' => 'Tblpejabat Nama',
			'TBLPEJABAT_NIP' => 'Tblpejabat Nip',
			'REFJABATAN_ID' => 'Refjabatan',
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

		$criteria->compare('TBLPEJABAT_ID',$this->TBLPEJABAT_ID);
		$criteria->compare('TBLPEJABAT_NAMA',$this->TBLPEJABAT_NAMA,true);
		$criteria->compare('TBLPEJABAT_NIP',$this->TBLPEJABAT_NIP);
		$criteria->compare('REFJABATAN_ID',$this->REFJABATAN_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tblpejabat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

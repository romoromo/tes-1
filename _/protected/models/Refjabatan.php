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
class Refjabatan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'REFJABATAN';
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
			array('REFJABATAN_NAMA, TBLREKENING_KODE', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TBLREKENING_KODE, REFJABATAN_NAMA', 'safe', 'on'=>'search'),
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
			'REFJABATAN_ID' => 'Refjabatan',
			'REFJABATAN_NAMA' => 'Refjabatan Nama',
			'TBLREKENING_KODE' => 'Tblrekening Kode',
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

		$criteria->compare('REFJABATAN_ID',$this->REFJABATAN_ID);
		$criteria->compare('REFJABATAN_NAMA',$this->REFJABATAN_NAMA,true);
		$criteria->compare('TBLREKENING_KODE',$this->TBLREKENING_KODE,true);

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

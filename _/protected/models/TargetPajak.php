<?php

/**
 * This is the model class for table "REFTARGETPAJAK".
 *
 * The followings are the available columns in table 'REFTARGETPAJAK':
 * @property string $REFTARGETPAJAK_ID
 * @property string $TBLMASTERREKENING_KODE
 * @property string $REFTARGETPAJAK_TAHUN
 * @property integer $REFSKPD_ID
 * @property string $REFTARGETPAJAK_NOMINAL
 */
class TargetPajak extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'REFTARGETPAJAK';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TBLMASTERREKENING_KODE, REFTARGETPAJAK_TAHUN, REFSKPD_ID', 'required'),
			array('REFSKPD_ID', 'numerical', 'integerOnly'=>true),
			array('TBLMASTERREKENING_KODE', 'length', 'max'=>255),
			array('REFTARGETPAJAK_TAHUN', 'length', 'max'=>4),
			array('REFTARGETPAJAK_NOMINAL', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('REFTARGETPAJAK_ID, TBLMASTERREKENING_KODE, REFTARGETPAJAK_TAHUN, REFSKPD_ID, REFTARGETPAJAK_NOMINAL', 'safe', 'on'=>'search'),
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
			'REFTARGETPAJAK_ID' => 'Reftargetpajak',
			'TBLMASTERREKENING_KODE' => 'Tblmasterrekening Kode',
			'REFTARGETPAJAK_TAHUN' => 'Reftargetpajak Tahun',
			'REFSKPD_ID' => 'Refskpd',
			'REFTARGETPAJAK_NOMINAL' => 'Reftargetpajak Nominal',
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

		$criteria->compare('REFTARGETPAJAK_ID',$this->REFTARGETPAJAK_ID,true);
		$criteria->compare('TBLMASTERREKENING_KODE',$this->TBLMASTERREKENING_KODE,true);
		$criteria->compare('REFTARGETPAJAK_TAHUN',$this->REFTARGETPAJAK_TAHUN,true);
		$criteria->compare('REFSKPD_ID',$this->REFSKPD_ID);
		$criteria->compare('REFTARGETPAJAK_NOMINAL',$this->REFTARGETPAJAK_NOMINAL,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TargetPajak the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

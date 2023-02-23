<?php

/**
 * This is the model class for table "RFORMPAJAK".
 *
 * The followings are the available columns in table 'RFORMPAJAK':
 * @property integer $RFORMPAJAK_ID
 * @property string $TREKENING_KODE
 * @property string $RFORMPAJAK_KODE
 * @property string $RFORMPAJAK_ISAKTIF
 * @property string $RFORMPAJAK_MODDETAIL
 * @property string $RFORMPAJAK_MODPENDATAAN
 */
class RFormPajak extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'RFORMPAJAK';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RFORMPAJAK_ID', 'required'),
			array('RFORMPAJAK_ID', 'numerical', 'integerOnly'=>true),
			array('TREKENING_KODE, RFORMPAJAK_KODE, RFORMPAJAK_MODDETAIL, RFORMPAJAK_MODPENDATAAN', 'length', 'max'=>255),
			array('RFORMPAJAK_ISAKTIF', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('RFORMPAJAK_ID, TREKENING_KODE, RFORMPAJAK_KODE, RFORMPAJAK_ISAKTIF, RFORMPAJAK_MODDETAIL, RFORMPAJAK_MODPENDATAAN', 'safe', 'on'=>'search'),
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
			'RFORMPAJAK_ID' => 'Rformpajak',
			'TREKENING_KODE' => 'Trekening Kode',
			'RFORMPAJAK_KODE' => 'Rformpajak Kode',
			'RFORMPAJAK_ISAKTIF' => 'Rformpajak Isaktif',
			'RFORMPAJAK_MODDETAIL' => 'Rformpajak Moddetail',
			'RFORMPAJAK_MODPENDATAAN' => 'Rformpajak Modpendataan',
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

		$criteria->compare('RFORMPAJAK_ID',$this->RFORMPAJAK_ID);
		$criteria->compare('TREKENING_KODE',$this->TREKENING_KODE,true);
		$criteria->compare('RFORMPAJAK_KODE',$this->RFORMPAJAK_KODE,true);
		$criteria->compare('RFORMPAJAK_ISAKTIF',$this->RFORMPAJAK_ISAKTIF,true);
		$criteria->compare('RFORMPAJAK_MODDETAIL',$this->RFORMPAJAK_MODDETAIL,true);
		$criteria->compare('RFORMPAJAK_MODPENDATAAN',$this->RFORMPAJAK_MODPENDATAAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RFormPajak the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getFormKode($rekening_kode)
	{
		$fkode = RFormPajak::model()->find("TREKENING_KODE=:rek AND RFORMPAJAK_ISAKTIF='T'", array(':rek' => $rekening_kode));
		return $fkode ? $fkode['RFORMPAJAK_KODE'] : 'NOT_AVAILABLE';
	}
}

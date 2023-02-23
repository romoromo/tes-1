<?php

/**
 * This is the model class for table "tblobyekwalet".
 *
 * The followings are the available columns in table 'tblobyekwalet':
 * @property string $tblobyekwalet_id
 * @property string $tblobyek_id
 * @property string $tblobyek_nomor
 * @property integer $refasalwalet_id
 * @property integer $refjeniswalet_id
 * @property integer $reftarifwalet_id
 * @property string $tblobyekwalet_hargapasar
 */
class ObyekWalet extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblobyekwalet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refasalwalet_id, refjeniswalet_id, reftarifwalet_id', 'numerical', 'integerOnly'=>true),
			array('tblobyek_id', 'length', 'max'=>19),
			array('tblobyek_nomor', 'length', 'max'=>255),
			array('tblobyekwalet_hargapasar', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblobyekwalet_id, tblobyek_id, tblobyek_nomor, refasalwalet_id, refjeniswalet_id, reftarifwalet_id, tblobyekwalet_hargapasar', 'safe', 'on'=>'search'),
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
			'tblobyekwalet_id' => 'Tblobyekwalet',
			'tblobyek_id' => 'Tblobyek',
			'tblobyek_nomor' => 'Tblobyek Nomor',
			'refasalwalet_id' => 'Refasalwalet',
			'refjeniswalet_id' => 'Refjeniswalet',
			'reftarifwalet_id' => 'Reftarifwalet',
			'tblobyekwalet_hargapasar' => 'Tblobyekwalet Hargapasar',
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

		$criteria->compare('tblobyekwalet_id',$this->tblobyekwalet_id,true);
		$criteria->compare('tblobyek_id',$this->tblobyek_id,true);
		$criteria->compare('tblobyek_nomor',$this->tblobyek_nomor,true);
		$criteria->compare('refasalwalet_id',$this->refasalwalet_id);
		$criteria->compare('refjeniswalet_id',$this->refjeniswalet_id);
		$criteria->compare('reftarifwalet_id',$this->reftarifwalet_id);
		$criteria->compare('tblobyekwalet_hargapasar',$this->tblobyekwalet_hargapasar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ObyekWalet the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "refbphtbperolehan".
 *
 * The followings are the available columns in table 'refbphtbperolehan':
 * @property integer $refbphtbperolehan_id
 * @property string $refbphtbperolehan_keterangan
 * @property double $refbphtbperolehan_npoptkp
 * @property string $refbphtbperolehan_pengenaan
 */
class BPHTBPerolehan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'refbphtbperolehan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refbphtbperolehan_id', 'required'),
			array('refbphtbperolehan_id', 'numerical', 'integerOnly'=>true),
			array('refbphtbperolehan_npoptkp', 'numerical'),
			array('refbphtbperolehan_keterangan', 'length', 'max'=>200),
			array('refbphtbperolehan_pengenaan', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('refbphtbperolehan_id, refbphtbperolehan_keterangan, refbphtbperolehan_npoptkp, refbphtbperolehan_pengenaan', 'safe', 'on'=>'search'),
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
			'refbphtbperolehan_id' => 'Refbphtbperolehan',
			'refbphtbperolehan_keterangan' => 'Refbphtbperolehan Keterangan',
			'refbphtbperolehan_npoptkp' => 'Refbphtbperolehan Npoptkp',
			'refbphtbperolehan_pengenaan' => 'Refbphtbperolehan Pengenaan',
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

		$criteria->compare('refbphtbperolehan_id',$this->refbphtbperolehan_id);
		$criteria->compare('refbphtbperolehan_keterangan',$this->refbphtbperolehan_keterangan,true);
		$criteria->compare('refbphtbperolehan_npoptkp',$this->refbphtbperolehan_npoptkp);
		$criteria->compare('refbphtbperolehan_pengenaan',$this->refbphtbperolehan_pengenaan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BPHTBPerolehan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

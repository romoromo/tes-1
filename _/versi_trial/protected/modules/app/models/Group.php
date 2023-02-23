<?php

/**
 * This is the model class for table "TBLROLE".
 *
 * The followings are the available columns in table 'TBLROLE':
 * @property integer $TBLROLE_ID
 * @property string $TBLROLE_CODE
 * @property string $TBLROLE_DESC
 */
class Group extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TBLROLE';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TBLROLE_CODE, TBLROLE_DESC', 'required'),
			array('TBLROLE_CODE', 'length', 'max'=>25),
			array('TBLROLE_DESC', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TBLROLE_ID, TBLROLE_CODE, TBLROLE_DESC', 'safe', 'on'=>'search'),
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
			'TBLROLE_ID' => 'Tblrole',
			'TBLROLE_CODE' => 'Tblrole Code',
			'TBLROLE_DESC' => 'Tblrole Desc',
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

		$criteria->compare('TBLROLE_ID',$this->TBLROLE_ID);
		$criteria->compare('TBLROLE_CODE',$this->TBLROLE_CODE,true);
		$criteria->compare('TBLROLE_DESC',$this->TBLROLE_DESC,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Group the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

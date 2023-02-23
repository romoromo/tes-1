<?php

/**
 * This is the model class for table "tblroleprivilege".
 *
 * The followings are the available columns in table 'tblroleprivilege':
 * @property integer $TBLROLEPRIVILEGE_ID
 * @property integer $TBLROLE_ID
 * @property integer $TBLMENU_ID
 * @property string $TBLROLEPRIVILEGE_ISCREATE
 * @property string $TBLROLEPRIVILEGE_ISUPDATE
 * @property string $TBLROLEPRIVILEGE_ISDELETE
 * @property string $TBLROLEPRIVILEGE_ISSEARCH
 * @property string $TBLROLEPRIVILEGE_ISPRINT
 * @property string $TBLROLEPRIVILEGE_ISSHOW
 */
class Tblroleprivilege extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TBLROLEPRIVILEGE';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TBLROLE_ID, TBLMENU_ID', 'numerical', 'integerOnly'=>true),
			array('TBLROLEPRIVILEGE_ISCREATE, TBLROLEPRIVILEGE_ISUPDATE, TBLROLEPRIVILEGE_ISDELETE, TBLROLEPRIVILEGE_ISSEARCH, TBLROLEPRIVILEGE_ISPRINT, TBLROLEPRIVILEGE_ISSHOW', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TBLROLEPRIVILEGE_ID, TBLROLE_ID, TBLMENU_ID, TBLROLEPRIVILEGE_ISCREATE, TBLROLEPRIVILEGE_ISUPDATE, TBLROLEPRIVILEGE_ISDELETE, TBLROLEPRIVILEGE_ISSEARCH, TBLROLEPRIVILEGE_ISPRINT, TBLROLEPRIVILEGE_ISSHOW', 'safe', 'on'=>'search'),
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
			'TBLROLEPRIVILEGE_ID' => 'Tblroleprivilege',
			'TBLROLE_ID' => 'Tblrole',
			'TBLMENU_ID' => 'Tblmenu',
			'TBLROLEPRIVILEGE_ISCREATE' => 'Tblroleprivilege Iscreate',
			'TBLROLEPRIVILEGE_ISUPDATE' => 'Tblroleprivilege Isupdate',
			'TBLROLEPRIVILEGE_ISDELETE' => 'Tblroleprivilege Isdelete',
			'TBLROLEPRIVILEGE_ISSEARCH' => 'Tblroleprivilege Issearch',
			'TBLROLEPRIVILEGE_ISPRINT' => 'Tblroleprivilege Isprint',
			'TBLROLEPRIVILEGE_ISSHOW' => 'Tblroleprivilege Isshow',
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

		$criteria->compare('TBLROLEPRIVILEGE_ID',$this->TBLROLEPRIVILEGE_ID);
		$criteria->compare('TBLROLE_ID',$this->TBLROLE_ID);
		$criteria->compare('TBLMENU_ID',$this->TBLMENU_ID);
		$criteria->compare('TBLROLEPRIVILEGE_ISCREATE',$this->TBLROLEPRIVILEGE_ISCREATE,true);
		$criteria->compare('TBLROLEPRIVILEGE_ISUPDATE',$this->TBLROLEPRIVILEGE_ISUPDATE,true);
		$criteria->compare('TBLROLEPRIVILEGE_ISDELETE',$this->TBLROLEPRIVILEGE_ISDELETE,true);
		$criteria->compare('TBLROLEPRIVILEGE_ISSEARCH',$this->TBLROLEPRIVILEGE_ISSEARCH,true);
		$criteria->compare('TBLROLEPRIVILEGE_ISPRINT',$this->TBLROLEPRIVILEGE_ISPRINT,true);
		$criteria->compare('TBLROLEPRIVILEGE_ISSHOW',$this->TBLROLEPRIVILEGE_ISSHOW,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tblroleprivilege the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

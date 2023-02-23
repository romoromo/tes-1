<?php

/**
 * This is the model class for table "tblkendalibloksistem".
 *
 * The followings are the available columns in table 'tblkendalibloksistem':
 * @property string $TBLKENDALIBLOKSISTEM_ID
 * @property string $TBLKENDALIBLOKSISTEM_NAMA
 * @property string $TBLKENDALIBLOKSISTEM_ISROUTING
 * @property string $TBLKENDALIBLOKSISTEM_ISAKTIF
 * @property integer $TBLROLE_ID
 */
class Kendalibloksistem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TBLKENDALIBLOKSISTEM';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TBLKENDALIBLOKSISTEM_NAMA', 'required'),
			array('TBLROLE_ID', 'numerical', 'integerOnly'=>true),
			array('TBLKENDALIBLOKSISTEM_NAMA', 'length', 'max'=>60),
			array('TBLKENDALIBLOKSISTEM_ISROUTING, TBLKENDALIBLOKSISTEM_ISAKTIF', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TBLKENDALIBLOKSISTEM_ID, TBLKENDALIBLOKSISTEM_NAMA, TBLKENDALIBLOKSISTEM_ISROUTING, TBLKENDALIBLOKSISTEM_ISAKTIF, TBLROLE_ID', 'safe', 'on'=>'search'),
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
			'TBLKENDALIBLOKSISTEM_ID' => 'Tblkendalibloksistem',
			'TBLKENDALIBLOKSISTEM_NAMA' => 'Tblkendalibloksistem Nama',
			'TBLKENDALIBLOKSISTEM_ISROUTING' => 'Tblkendalibloksistem Isrouting',
			'TBLKENDALIBLOKSISTEM_ISAKTIF' => 'Tblkendalibloksistem Isaktif',
			'TBLROLE_ID' => 'Tblrole',
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

		$criteria->compare('TBLKENDALIBLOKSISTEM_ID',$this->TBLKENDALIBLOKSISTEM_ID,true);
		$criteria->compare('TBLKENDALIBLOKSISTEM_NAMA',$this->TBLKENDALIBLOKSISTEM_NAMA,true);
		$criteria->compare('TBLKENDALIBLOKSISTEM_ISROUTING',$this->TBLKENDALIBLOKSISTEM_ISROUTING,true);
		$criteria->compare('TBLKENDALIBLOKSISTEM_ISAKTIF',$this->TBLKENDALIBLOKSISTEM_ISAKTIF,true);
		$criteria->compare('TBLROLE_ID',$this->TBLROLE_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kendalibloksistem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getBlokSistemId($id_role)
	{
		$bloksistem = Kendalibloksistem::model()->find('TBLROLE_ID=:rolenya', array('rolenya'=>$id_role));
		return $bloksistem->TBLKENDALIBLOKSISTEM_ID;
	}
}

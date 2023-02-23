<?php

/**
 * This is the model class for table "tblkendalibloksistem".
 *
 * The followings are the available columns in table 'tblkendalibloksistem':
 * @property string $tblkendalibloksistem_id
 * @property string $tblkendalibloksistem_nama
 * @property string $tblkendalibloksistem_isrouting
 * @property string $tblkendalibloksistem_isaktif
 * @property integer $tblrole_id
 */
class Kendalibloksistem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblkendalibloksistem';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblkendalibloksistem_nama', 'required'),
			array('tblrole_id', 'numerical', 'integerOnly'=>true),
			array('tblkendalibloksistem_nama', 'length', 'max'=>60),
			array('tblkendalibloksistem_isrouting, tblkendalibloksistem_isaktif', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblkendalibloksistem_id, tblkendalibloksistem_nama, tblkendalibloksistem_isrouting, tblkendalibloksistem_isaktif, tblrole_id', 'safe', 'on'=>'search'),
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
			'tblkendalibloksistem_id' => 'Tblkendalibloksistem',
			'tblkendalibloksistem_nama' => 'Tblkendalibloksistem Nama',
			'tblkendalibloksistem_isrouting' => 'Tblkendalibloksistem Isrouting',
			'tblkendalibloksistem_isaktif' => 'Tblkendalibloksistem Isaktif',
			'tblrole_id' => 'Tblrole',
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

		$criteria->compare('tblkendalibloksistem_id',$this->tblkendalibloksistem_id,true);
		$criteria->compare('tblkendalibloksistem_nama',$this->tblkendalibloksistem_nama,true);
		$criteria->compare('tblkendalibloksistem_isrouting',$this->tblkendalibloksistem_isrouting,true);
		$criteria->compare('tblkendalibloksistem_isaktif',$this->tblkendalibloksistem_isaktif,true);
		$criteria->compare('tblrole_id',$this->tblrole_id);

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
		$bloksistem = Kendalibloksistem::model()->find('tblrole_id=:rolenya', array('rolenya'=>$id_role));
		return $bloksistem->tblkendalibloksistem_id;
	}
}

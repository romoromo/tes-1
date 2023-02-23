<?php

/**
 * This is the model class for table "tblpengguna".
 *
 * The followings are the available columns in table 'tblpengguna':
 * @property integer $tblpengguna_id
 * @property string $TBLPENGGUNA_NAMA
 * @property string $TBLPENGGUNA_USERNAME
 * @property string $TBLPENGGUNA_EMAIL
 * @property string $TBLPENGGUNA_PASSWORD
 * @property integer $TBLROLE_ID
 * @property string $TBLPENGGUNA_IDSUBUNIT
 * @property string $TBLPENGGUNA_STATUS
 * @property string $TBLPENGGUNA_MODIFIED
 * @property string $TBLPENGGUNA_CREATED
 * @property string $TBLPENGGUNA_NOTELP
 */
class Tblpengguna extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TBLPENGGUNA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	/*public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TBLPENGGUNA_NAMA, TBLPENGGUNA_USERNAME, TBLPENGGUNA_MODIFIED, TBLPENGGUNA_CREATED', 'required'),
			array('TBLROLE_ID', 'numerical', 'integerOnly'=>true),
			array('TBLPENGGUNA_NAMA, TBLPENGGUNA_USERNAME, TBLPENGGUNA_EMAIL, TBLPENGGUNA_PASSWORD', 'length', 'max'=>255),
			array('TBLPENGGUNA_IDSUBUNIT', 'length', 'max'=>15),
			array('TBLPENGGUNA_STATUS', 'length', 'max'=>1),
			array('TBLPENGGUNA_NOTELP', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblpengguna_id, TBLPENGGUNA_NAMA, TBLPENGGUNA_USERNAME, TBLPENGGUNA_EMAIL, TBLPENGGUNA_PASSWORD, TBLROLE_ID, TBLPENGGUNA_IDSUBUNIT, TBLPENGGUNA_STATUS, TBLPENGGUNA_MODIFIED, TBLPENGGUNA_CREATED, TBLPENGGUNA_NOTELP', 'safe', 'on'=>'search'),
		);
	}*/

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
			'TBLPENGGUNA_ID' => 'Tblpengguna',
			'TBLPENGGUNA_NAMA' => 'Tblpengguna Nama',
			'TBLPENGGUNA_USERNAME' => 'Tblpengguna Username',
			'TBLPENGGUNA_EMAIL' => 'Tblpengguna Email',
			'TBLPENGGUNA_PASSWORD' => 'Tblpengguna Password',
			'TBLROLE_ID' => 'Tblrole',
			'TBLPENGGUNA_IDSUBUNIT' => 'Tblpengguna Idsubunit',
			'TBLPENGGUNA_STATUS' => 'Tblpengguna Status',
			'TBLPENGGUNA_MODIFIED' => 'Tblpengguna Modified',
			'TBLPENGGUNA_CREATED' => 'Tblpengguna Created',
			'TBLPENGGUNA_NOTELP' => 'Tblpengguna Notelp',
			'TBLPENGGUNA_FOTO' => 'Tblpengguna Foto',
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

		$criteria->compare('TBLPENGGUNA_ID',$this->TBLPENGGUNA_ID);
		$criteria->compare('TBLPENGGUNA_NAMA',$this->TBLPENGGUNA_NAMA,true);
		$criteria->compare('TBLPENGGUNA_USERNAME',$this->TBLPENGGUNA_USERNAME,true);
		$criteria->compare('TBLPENGGUNA_EMAIL',$this->TBLPENGGUNA_EMAIL,true);
		$criteria->compare('TBLPENGGUNA_PASSWORD',$this->TBLPENGGUNA_PASSWORD,true);
		$criteria->compare('TBLROLE_ID',$this->TBLROLE_ID);
		$criteria->compare('TBLPENGGUNA_IDSUBUNIT',$this->TBLPENGGUNA_IDSUBUNIT,true);
		$criteria->compare('TBLPENGGUNA_STATUS',$this->TBLPENGGUNA_STATUS,true);
		$criteria->compare('TBLPENGGUNA_MODIFIED',$this->TBLPENGGUNA_MODIFIED,true);
		$criteria->compare('TBLPENGGUNA_CREATED',$this->TBLPENGGUNA_CREATED,true);
		$criteria->compare('TBLPENGGUNA_NOTELP',$this->TBLPENGGUNA_NOTELP,true);
		$criteria->compare('TBLPENGGUNA_FOTO',$this->TBLPENGGUNA_FOTO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tblpengguna the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

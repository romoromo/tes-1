<?php

/**
 * This is the model class for table "TBLKENDALIBLOKSISTEMTUGAS".
 *
 * The followings are the available columns in table 'TBLKENDALIBLOKSISTEMTUGAS':
 * @property string $TBLKENDALIBLOKSISTEMTUGAS_ID
 * @property string $TBLKENDALIBLOKSISTEM_ID
 * @property string $TBLKENDALIBLOKSISTEMTUGAS_NAMA
 * @property string $TBLKENDALIBLOKSISTEMTUGAS_ISAKTIF
 */
class KendalibloksistemTugas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TBLKENDALIBLOKSISTEMTUGAS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TBLKENDALIBLOKSISTEM_ID, TBLKENDALIBLOKSISTEMTUGAS_NAMA', 'required'),
			array('TBLKENDALIBLOKSISTEM_ID', 'length', 'max'=>10),
			array('TBLKENDALIBLOKSISTEMTUGAS_NAMA', 'length', 'max'=>150),
			array('TBLKENDALIBLOKSISTEMTUGAS_ISAKTIF', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TBLKENDALIBLOKSISTEMTUGAS_ID, TBLKENDALIBLOKSISTEM_ID, TBLKENDALIBLOKSISTEMTUGAS_NAMA, TBLKENDALIBLOKSISTEMTUGAS_ISAKTIF', 'safe', 'on'=>'search'),
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
			'TBLKENDALIBLOKSISTEMTUGAS_ID' => 'Tblkendalibloksistemtugas',
			'TBLKENDALIBLOKSISTEM_ID' => 'Tblkendalibloksistem',
			'TBLKENDALIBLOKSISTEMTUGAS_NAMA' => 'Tblkendalibloksistemtugas Nama',
			'TBLKENDALIBLOKSISTEMTUGAS_ISAKTIF' => 'Tblkendalibloksistemtugas Isaktif',
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

		$criteria->compare('TBLKENDALIBLOKSISTEMTUGAS_ID',$this->TBLKENDALIBLOKSISTEMTUGAS_ID,true);
		$criteria->compare('TBLKENDALIBLOKSISTEM_ID',$this->TBLKENDALIBLOKSISTEM_ID,true);
		$criteria->compare('TBLKENDALIBLOKSISTEMTUGAS_NAMA',$this->TBLKENDALIBLOKSISTEMTUGAS_NAMA,true);
		$criteria->compare('TBLKENDALIBLOKSISTEMTUGAS_ISAKTIF',$this->TBLKENDALIBLOKSISTEMTUGAS_ISAKTIF,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KendalibloksistemTugas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tugas()
	{
		$data = Yii::app()->db->createCommand('SELECT * FROM vkendalibloksistemtugas')->queryAll();
		return $data;
	}
}

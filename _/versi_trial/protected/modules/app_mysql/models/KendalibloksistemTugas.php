<?php

/**
 * This is the model class for table "tblkendalibloksistemtugas".
 *
 * The followings are the available columns in table 'tblkendalibloksistemtugas':
 * @property string $tblkendalibloksistemtugas_id
 * @property string $tblkendalibloksistem_id
 * @property string $tblkendalibloksistemtugas_nama
 * @property string $tblkendalibloksistemtugas_isaktif
 */
class KendalibloksistemTugas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblkendalibloksistemtugas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblkendalibloksistem_id, tblkendalibloksistemtugas_nama', 'required'),
			array('tblkendalibloksistem_id', 'length', 'max'=>10),
			array('tblkendalibloksistemtugas_nama', 'length', 'max'=>150),
			array('tblkendalibloksistemtugas_isaktif', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblkendalibloksistemtugas_id, tblkendalibloksistem_id, tblkendalibloksistemtugas_nama, tblkendalibloksistemtugas_isaktif', 'safe', 'on'=>'search'),
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
			'tblkendalibloksistemtugas_id' => 'Tblkendalibloksistemtugas',
			'tblkendalibloksistem_id' => 'Tblkendalibloksistem',
			'tblkendalibloksistemtugas_nama' => 'Tblkendalibloksistemtugas Nama',
			'tblkendalibloksistemtugas_isaktif' => 'Tblkendalibloksistemtugas Isaktif',
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

		$criteria->compare('tblkendalibloksistemtugas_id',$this->tblkendalibloksistemtugas_id,true);
		$criteria->compare('tblkendalibloksistem_id',$this->tblkendalibloksistem_id,true);
		$criteria->compare('tblkendalibloksistemtugas_nama',$this->tblkendalibloksistemtugas_nama,true);
		$criteria->compare('tblkendalibloksistemtugas_isaktif',$this->tblkendalibloksistemtugas_isaktif,true);

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

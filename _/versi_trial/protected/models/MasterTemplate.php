<?php

/**
 * This is the model class for table "tblmastertemplate".
 *
 * The followings are the available columns in table 'tblmastertemplate':
 * @property string $tblmastertemplate_id
 * @property string $tblmastertemplate_jenis
 * @property string $tblmastertemplate_kelompok
 * @property string $tblmastertemplate_namafile
 * @property string $tblmastertemplate_isaktif
 */
class MasterTemplate extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblmastertemplate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblmastertemplate_jenis, tblmastertemplate_namafile', 'required'),
			array('tblmastertemplate_jenis, tblmastertemplate_kelompok, tblmastertemplate_namafile', 'length', 'max'=>255),
			array('tblmastertemplate_isaktif', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblmastertemplate_id, tblmastertemplate_jenis, tblmastertemplate_kelompok, tblmastertemplate_namafile, tblmastertemplate_isaktif', 'safe', 'on'=>'search'),
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
			'tblmastertemplate_id' => 'Tblmastertemplate',
			'tblmastertemplate_jenis' => 'Tblmastertemplate Jenis',
			'tblmastertemplate_kelompok' => 'Tblmastertemplate Kelompok',
			'tblmastertemplate_namafile' => 'Tblmastertemplate Namafile',
			'tblmastertemplate_isaktif' => 'Tblmastertemplate Isaktif',
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

		$criteria->compare('tblmastertemplate_id',$this->tblmastertemplate_id,true);
		$criteria->compare('tblmastertemplate_jenis',$this->tblmastertemplate_jenis,true);
		$criteria->compare('tblmastertemplate_kelompok',$this->tblmastertemplate_kelompok,true);
		$criteria->compare('tblmastertemplate_namafile',$this->tblmastertemplate_namafile,true);
		$criteria->compare('tblmastertemplate_isaktif',$this->tblmastertemplate_isaktif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MasterTemplate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

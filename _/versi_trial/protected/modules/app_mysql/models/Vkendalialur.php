<?php

/**
 * This is the model class for table "vkendalialur".
 *
 * The followings are the available columns in table 'vkendalialur':
 * @property string $tblizin_nama
 * @property string $tblizin_id
 * @property string $tblizinpermohonan_id
 * @property string $tblkendalibloksistem_id
 * @property string $tblkendalialur_urut
 * @property double $tblkendalialur_jmlharibataswaktu
 * @property double $tblkendalialur_jmljambataswaktu
 * @property string $tblkendalialur_isaktif
 * @property string $tblizinpermohonan_nama
 * @property string $tblkendalibloksistem_nama
 * @property string $tblkendalialur_id
 */
class Vkendalialur extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vkendalialur';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblizin_nama, tblizin_id, tblizinpermohonan_id, tblkendalibloksistem_id, tblkendalialur_urut, tblkendalialur_jmlharibataswaktu, tblkendalialur_jmljambataswaktu, tblkendalibloksistem_nama', 'required'),
			array('tblkendalialur_jmlharibataswaktu, tblkendalialur_jmljambataswaktu', 'numerical'),
			array('tblizin_nama, tblizinpermohonan_nama', 'length', 'max'=>255),
			array('tblizin_id, tblizinpermohonan_id, tblkendalibloksistem_id, tblkendalialur_urut, tblkendalialur_id', 'length', 'max'=>10),
			array('tblkendalialur_isaktif', 'length', 'max'=>1),
			array('tblkendalibloksistem_nama', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblizin_nama, tblizin_id, tblizinpermohonan_id, tblkendalibloksistem_id, tblkendalialur_urut, tblkendalialur_jmlharibataswaktu, tblkendalialur_jmljambataswaktu, tblkendalialur_isaktif, tblizinpermohonan_nama, tblkendalibloksistem_nama, tblkendalialur_id', 'safe', 'on'=>'search'),
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
			'tblizin_nama' => 'Tblizin Nama',
			'tblizin_id' => 'Tblizin',
			'tblizinpermohonan_id' => 'Tblizinpermohonan',
			'tblkendalibloksistem_id' => 'Tblkendalibloksistem',
			'tblkendalialur_urut' => 'Tblkendalialur Urut',
			'tblkendalialur_jmlharibataswaktu' => 'Tblkendalialur Jmlharibataswaktu',
			'tblkendalialur_jmljambataswaktu' => 'Tblkendalialur Jmljambataswaktu',
			'tblkendalialur_isaktif' => 'Tblkendalialur Isaktif',
			'tblizinpermohonan_nama' => 'Tblizinpermohonan Nama',
			'tblkendalibloksistem_nama' => 'Tblkendalibloksistem Nama',
			'tblkendalialur_id' => 'Tblkendalialur',
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

		$criteria->compare('tblizin_nama',$this->tblizin_nama,true);
		$criteria->compare('tblizin_id',$this->tblizin_id,true);
		$criteria->compare('tblizinpermohonan_id',$this->tblizinpermohonan_id,true);
		$criteria->compare('tblkendalibloksistem_id',$this->tblkendalibloksistem_id,true);
		$criteria->compare('tblkendalialur_urut',$this->tblkendalialur_urut,true);
		$criteria->compare('tblkendalialur_jmlharibataswaktu',$this->tblkendalialur_jmlharibataswaktu);
		$criteria->compare('tblkendalialur_jmljambataswaktu',$this->tblkendalialur_jmljambataswaktu);
		$criteria->compare('tblkendalialur_isaktif',$this->tblkendalialur_isaktif,true);
		$criteria->compare('tblizinpermohonan_nama',$this->tblizinpermohonan_nama,true);
		$criteria->compare('tblkendalibloksistem_nama',$this->tblkendalibloksistem_nama,true);
		$criteria->compare('tblkendalialur_id',$this->tblkendalialur_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vkendalialur the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

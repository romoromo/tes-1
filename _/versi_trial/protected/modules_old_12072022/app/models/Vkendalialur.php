<?php

/**
 * This is the model class for table "VKENDALIALUR".
 *
 * The followings are the available columns in table 'VKENDALIALUR':
 * @property string $TBLIZIN_NAMA
 * @property string $TBLIZIN_ID
 * @property string $TBLIZINPERMOHONAN_ID
 * @property string $TBLKENDALIBLOKSISTEM_ID
 * @property string $TBLKENDALIALUR_URUT
 * @property double $TBLKENDALIALUR_JMLHARIBATASWAKTU
 * @property double $TBLKENDALIALUR_JMLJAMBATASWAKTU
 * @property string $TBLKENDALIALUR_ISAKTIF
 * @property string $TBLIZINPERMOHONAN_NAMA
 * @property string $TBLKENDALIBLOKSISTEM_NAMA
 * @property string $TBLKENDALIALUR_ID
 */
class VKENDALIALUR extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'VKENDALIALUR';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TBLIZIN_NAMA, TBLIZIN_ID, TBLIZINPERMOHONAN_ID, TBLKENDALIBLOKSISTEM_ID, TBLKENDALIALUR_URUT, TBLKENDALIALUR_JMLHARIBATASWAKTU, TBLKENDALIALUR_JMLJAMBATASWAKTU, TBLKENDALIBLOKSISTEM_NAMA', 'required'),
			array('TBLKENDALIALUR_JMLHARIBATASWAKTU, TBLKENDALIALUR_JMLJAMBATASWAKTU', 'numerical'),
			array('TBLIZIN_NAMA, TBLIZINPERMOHONAN_NAMA', 'length', 'max'=>255),
			array('TBLIZIN_ID, TBLIZINPERMOHONAN_ID, TBLKENDALIBLOKSISTEM_ID, TBLKENDALIALUR_URUT, TBLKENDALIALUR_ID', 'length', 'max'=>10),
			array('TBLKENDALIALUR_ISAKTIF', 'length', 'max'=>1),
			array('TBLKENDALIBLOKSISTEM_NAMA', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TBLIZIN_NAMA, TBLIZIN_ID, TBLIZINPERMOHONAN_ID, TBLKENDALIBLOKSISTEM_ID, TBLKENDALIALUR_URUT, TBLKENDALIALUR_JMLHARIBATASWAKTU, TBLKENDALIALUR_JMLJAMBATASWAKTU, TBLKENDALIALUR_ISAKTIF, TBLIZINPERMOHONAN_NAMA, TBLKENDALIBLOKSISTEM_NAMA, TBLKENDALIALUR_ID', 'safe', 'on'=>'search'),
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
			'TBLIZIN_NAMA' => 'Tblizin Nama',
			'TBLIZIN_ID' => 'Tblizin',
			'TBLIZINPERMOHONAN_ID' => 'Tblizinpermohonan',
			'TBLKENDALIBLOKSISTEM_ID' => 'Tblkendalibloksistem',
			'TBLKENDALIALUR_URUT' => 'Tblkendalialur Urut',
			'TBLKENDALIALUR_JMLHARIBATASWAKTU' => 'Tblkendalialur Jmlharibataswaktu',
			'TBLKENDALIALUR_JMLJAMBATASWAKTU' => 'Tblkendalialur Jmljambataswaktu',
			'TBLKENDALIALUR_ISAKTIF' => 'Tblkendalialur Isaktif',
			'TBLIZINPERMOHONAN_NAMA' => 'Tblizinpermohonan Nama',
			'TBLKENDALIBLOKSISTEM_NAMA' => 'Tblkendalibloksistem Nama',
			'TBLKENDALIALUR_ID' => 'Tblkendalialur',
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

		$criteria->compare('TBLIZIN_NAMA',$this->TBLIZIN_NAMA,true);
		$criteria->compare('TBLIZIN_ID',$this->TBLIZIN_ID,true);
		$criteria->compare('TBLIZINPERMOHONAN_ID',$this->TBLIZINPERMOHONAN_ID,true);
		$criteria->compare('TBLKENDALIBLOKSISTEM_ID',$this->TBLKENDALIBLOKSISTEM_ID,true);
		$criteria->compare('TBLKENDALIALUR_URUT',$this->TBLKENDALIALUR_URUT,true);
		$criteria->compare('TBLKENDALIALUR_JMLHARIBATASWAKTU',$this->TBLKENDALIALUR_JMLHARIBATASWAKTU);
		$criteria->compare('TBLKENDALIALUR_JMLJAMBATASWAKTU',$this->TBLKENDALIALUR_JMLJAMBATASWAKTU);
		$criteria->compare('TBLKENDALIALUR_ISAKTIF',$this->TBLKENDALIALUR_ISAKTIF,true);
		$criteria->compare('TBLIZINPERMOHONAN_NAMA',$this->TBLIZINPERMOHONAN_NAMA,true);
		$criteria->compare('TBLKENDALIBLOKSISTEM_NAMA',$this->TBLKENDALIBLOKSISTEM_NAMA,true);
		$criteria->compare('TBLKENDALIALUR_ID',$this->TBLKENDALIALUR_ID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VKENDALIALUR the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

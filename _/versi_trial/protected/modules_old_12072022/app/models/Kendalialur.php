<?php

/**
 * This is the model class for table "tblkendalialur".
 *
 * The followings are the available columns in table 'tblkendalialur':
 * @property string $tblkendalialur_id
 * @property string $tblizinpermohonan_id
 * @property string $tblizin_id
 * @property string $tblkendalibloksistem_id
 * @property string $tblkendalialur_urut
 * @property double $tblkendalialur_jmlharibataswaktu
 * @property double $tblkendalialur_jmljambataswaktu
 * @property string $tblkendalialur_isaktif
 */
class Kendalialur extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblkendalialur';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblizinpermohonan_id, tblizin_id, tblkendalibloksistem_id, tblkendalialur_urut, tblkendalialur_jmlharibataswaktu, tblkendalialur_jmljambataswaktu', 'required'),
			array('tblkendalialur_jmlharibataswaktu, tblkendalialur_jmljambataswaktu', 'numerical'),
			array('tblizinpermohonan_id, tblizin_id, tblkendalibloksistem_id, tblkendalialur_urut', 'length', 'max'=>10),
			array('tblkendalialur_isaktif', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblkendalialur_id, tblizinpermohonan_id, tblizin_id, tblkendalibloksistem_id, tblkendalialur_urut, tblkendalialur_jmlharibataswaktu, tblkendalialur_jmljambataswaktu, tblkendalialur_isaktif', 'safe', 'on'=>'search'),
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
			'tblkendalialur_id' => 'Tblkendalialur',
			'tblizinpermohonan_id' => 'Tblizinpermohonan',
			'tblizin_id' => 'Tblizin',
			'tblkendalibloksistem_id' => 'Tblkendalibloksistem',
			'tblkendalialur_urut' => 'Tblkendalialur Urut',
			'tblkendalialur_jmlharibataswaktu' => 'Tblkendalialur Jmlharibataswaktu',
			'tblkendalialur_jmljambataswaktu' => 'Tblkendalialur Jmljambataswaktu',
			'tblkendalialur_isaktif' => 'Tblkendalialur Isaktif',
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

		$criteria->compare('tblkendalialur_id',$this->tblkendalialur_id,true);
		$criteria->compare('tblizinpermohonan_id',$this->tblizinpermohonan_id,true);
		$criteria->compare('tblizin_id',$this->tblizin_id,true);
		$criteria->compare('tblkendalibloksistem_id',$this->tblkendalibloksistem_id,true);
		$criteria->compare('tblkendalialur_urut',$this->tblkendalialur_urut,true);
		$criteria->compare('tblkendalialur_jmlharibataswaktu',$this->tblkendalialur_jmlharibataswaktu);
		$criteria->compare('tblkendalialur_jmljambataswaktu',$this->tblkendalialur_jmljambataswaktu);
		$criteria->compare('tblkendalialur_isaktif',$this->tblkendalialur_isaktif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kendalialur the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function Kendalialur()
	{
		$data = Yii::app()->db->createCommand('SELECT * FROM vkendalialur ORDER BY tblizin_nama, tblkendalialur_urut ASC ')->queryAll();
		return $data;
	}

	public function Edit($id)
	{
		$data = Yii::app()->db->createCommand('SELECT 
			tblkendalialur_id,
			tblizin_id,
			tblizinpermohonan_id,
			tblkendalibloksistem_id,
			tblkendalialur_urut,
			tblkendalialur_jmlharibataswaktu,
			tblkendalialur_jmljambataswaktu,
			tblkendalialur_isaktif FROM vkendalialur WHERE tblkendalialur_id = '.$id.'
			')->queryRow();
		return $data;
	}

	public function ListTabelAlur($id_mohon)
	{
		$sql = "SELECT
			tblkendalialur.tblkendalialur_id,
			tblizin.tblizin_nama,
			tblizinpermohonan.tblizinpermohonan_nama,
			tblkendalialur.tblizinpermohonan_id,
			tblkendalialur.tblizin_id,
			tblkendalialur.tblkendalibloksistem_id,
			tblkendalialur.tblkendalialur_urut,
			tblkendalialur.tblkendalialur_jmlharibataswaktu,
			tblkendalialur.tblkendalialur_jmljambataswaktu,
			tblkendalialur.tblkendalialur_isaktif,
			tblkendalibloksistem.tblkendalibloksistem_nama
			FROM
			tblkendalialur
			INNER JOIN tblizin ON tblkendalialur.tblizin_id = tblizin.tblizin_id
			INNER JOIN tblizinpermohonan ON tblkendalialur.tblizinpermohonan_id = tblizinpermohonan.tblizinpermohonan_id
			INNER JOIN tblkendalibloksistem ON tblkendalialur.tblkendalibloksistem_id = tblkendalibloksistem.tblkendalibloksistem_id
			WHERE tblkendalialur.tblizinpermohonan_id = ".$id_mohon."
			ORDER BY tblkendalialur_urut ASC";
		$data = Yii::app()->db->createCommand($sql)->queryAll();
		return $data;
	}
}

<?php

/**
 * This is the model class for table "tblmasterrekening".
 *
 * The followings are the available columns in table 'tblmasterrekening':
 * @property integer $tblmasterrekening_id
 * @property string $tblmasterrekening_kode
 * @property string $tblmasterrekening_level
 * @property string $tblmasterrekening_nama
 * @property string $tblmasterrekening_tarif
 * @property string $refunitorg_kode
 * @property double $tblmasterrekening_target
 * @property string $tblmasterrekening_status
 * @property string $tblmasterrekening_aktif
 */
class MasterRekening extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblmasterrekening';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblmasterrekening_target', 'numerical'),
			array('tblmasterrekening_kode, refunitorg_kode', 'length', 'max'=>20),
			array('tblmasterrekening_level', 'length', 'max'=>2),
			array('tblmasterrekening_nama', 'length', 'max'=>255),
			array('tblmasterrekening_tarif', 'length', 'max'=>6),
			array('tblmasterrekening_status', 'length', 'max'=>7),
			array('tblmasterrekening_aktif', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblmasterrekening_id, tblmasterrekening_kode, tblmasterrekening_level, tblmasterrekening_nama, tblmasterrekening_tarif, refunitorg_kode, tblmasterrekening_target, tblmasterrekening_status, tblmasterrekening_aktif', 'safe', 'on'=>'search'),
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
			'tblmasterrekening_id' => 'Tblmasterrekening',
			'tblmasterrekening_kode' => 'Tblmasterrekening Kode',
			'tblmasterrekening_level' => 'Tblmasterrekening Level',
			'tblmasterrekening_nama' => 'Tblmasterrekening Nama',
			'tblmasterrekening_tarif' => 'Tblmasterrekening Tarif',
			'refunitorg_kode' => 'Refunitorg Kode',
			'tblmasterrekening_target' => 'Tblmasterrekening Target',
			'tblmasterrekening_status' => 'Tblmasterrekening Status',
			'tblmasterrekening_aktif' => 'Tblmasterrekening Aktif',
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

		$criteria->compare('tblmasterrekening_id',$this->tblmasterrekening_id);
		$criteria->compare('tblmasterrekening_kode',$this->tblmasterrekening_kode,true);
		$criteria->compare('tblmasterrekening_level',$this->tblmasterrekening_level,true);
		$criteria->compare('tblmasterrekening_nama',$this->tblmasterrekening_nama,true);
		$criteria->compare('tblmasterrekening_tarif',$this->tblmasterrekening_tarif,true);
		$criteria->compare('refunitorg_kode',$this->refunitorg_kode,true);
		$criteria->compare('tblmasterrekening_target',$this->tblmasterrekening_target);
		$criteria->compare('tblmasterrekening_status',$this->tblmasterrekening_status,true);
		$criteria->compare('tblmasterrekening_aktif',$this->tblmasterrekening_aktif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MasterRekening the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

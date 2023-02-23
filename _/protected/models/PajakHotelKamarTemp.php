<?php

/**
 * This is the model class for table "tpajakhotelkamar_temp".
 *
 * The followings are the available columns in table 'tpajakhotelkamar_temp':
 * @property string $tpajakhotelkamar_id
 * @property string $tpajakhotel_id
 * @property string $tnpwpddaftar_id
 * @property string $tpajakhotelkamar_kelas
 * @property integer $tpajakhotelkamar_jumlah
 * @property string $tpajakhotelkamar_tarif
 * @property string $tpajakhotelkamar_diskon
 * @property integer $tpajakhotelkamar_terjual
 * @property string $tpajakhotelkamar_omzet
 * @property string $tpajakhotelkos
 * @property integer $tblpengguna_id
 * @property string $tpajakhotelkamar_tglentry
 * @property string $tpajakhotelkamar_tglupdate
 */
class PajakHotelKamarTemp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tpajakhotelkamar_temp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tpajakhotelkamar_jumlah, tpajakhotelkamar_terjual, tblpengguna_id', 'numerical', 'integerOnly'=>true),
			array('tpajakhotel_id, tnpwpddaftar_id', 'length', 'max'=>19),
			array('tpajakhotelkamar_kelas', 'length', 'max'=>100),
			array('tpajakhotelkamar_tarif, tpajakhotelkamar_diskon, tpajakhotelkamar_omzet', 'length', 'max'=>25),
			array('tpajakhotelkos', 'length', 'max'=>255),
			array('tpajakhotelkamar_tglentry, tpajakhotelkamar_tglupdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tpajakhotelkamar_id, tpajakhotel_id, tnpwpddaftar_id, tpajakhotelkamar_kelas, tpajakhotelkamar_jumlah, tpajakhotelkamar_tarif, tpajakhotelkamar_diskon, tpajakhotelkamar_terjual, tpajakhotelkamar_omzet, tpajakhotelkos, tblpengguna_id, tpajakhotelkamar_tglentry, tpajakhotelkamar_tglupdate', 'safe', 'on'=>'search'),
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
			'tpajakhotelkamar_id' => 'Tpajakhotelkamar',
			'tpajakhotel_id' => 'Tpajakhotel',
			'tnpwpddaftar_id' => 'Tnpwpddaftar',
			'tpajakhotelkamar_kelas' => 'Tpajakhotelkamar Kelas',
			'tpajakhotelkamar_jumlah' => 'Tpajakhotelkamar Jumlah',
			'tpajakhotelkamar_tarif' => 'Tpajakhotelkamar Tarif',
			'tpajakhotelkamar_diskon' => 'Tpajakhotelkamar Diskon',
			'tpajakhotelkamar_terjual' => 'Tpajakhotelkamar Terjual',
			'tpajakhotelkamar_omzet' => 'Tpajakhotelkamar Omzet',
			'tpajakhotelkos' => 'Tpajakhotelkos',
			'tblpengguna_id' => 'Tblpengguna',
			'tpajakhotelkamar_tglentry' => 'Tpajakhotelkamar Tglentry',
			'tpajakhotelkamar_tglupdate' => 'Tpajakhotelkamar Tglupdate',
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

		$criteria->compare('tpajakhotelkamar_id',$this->tpajakhotelkamar_id,true);
		$criteria->compare('tpajakhotel_id',$this->tpajakhotel_id,true);
		$criteria->compare('tnpwpddaftar_id',$this->tnpwpddaftar_id,true);
		$criteria->compare('tpajakhotelkamar_kelas',$this->tpajakhotelkamar_kelas,true);
		$criteria->compare('tpajakhotelkamar_jumlah',$this->tpajakhotelkamar_jumlah);
		$criteria->compare('tpajakhotelkamar_tarif',$this->tpajakhotelkamar_tarif,true);
		$criteria->compare('tpajakhotelkamar_diskon',$this->tpajakhotelkamar_diskon,true);
		$criteria->compare('tpajakhotelkamar_terjual',$this->tpajakhotelkamar_terjual);
		$criteria->compare('tpajakhotelkamar_omzet',$this->tpajakhotelkamar_omzet,true);
		$criteria->compare('tpajakhotelkos',$this->tpajakhotelkos,true);
		$criteria->compare('tblpengguna_id',$this->tblpengguna_id);
		$criteria->compare('tpajakhotelkamar_tglentry',$this->tpajakhotelkamar_tglentry,true);
		$criteria->compare('tpajakhotelkamar_tglupdate',$this->tpajakhotelkamar_tglupdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PajakHotelKamarTemp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

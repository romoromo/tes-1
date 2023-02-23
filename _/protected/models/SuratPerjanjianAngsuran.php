<?php

/**
 * This is the model class for table "tblsuratperjanjianangsuran".
 *
 * The followings are the available columns in table 'tblsuratperjanjianangsuran':
 * @property integer $tblsuratperjanjianangsuran_id
 * @property integer $tblobyek_id
 * @property string $tblsuratperjanjianangsuran_registerangsuran
 * @property string $tblsuratketetapankurangbayar_nomor
 * @property integer $tblsuratketetapankurangbayar_id
 * @property string $tblsuratperjanjianangsuran_nomor
 * @property string $tblsuratperjanjianangsuran_masaawal
 * @property string $tblsuratperjanjianangsuran_masaakhir
 * @property integer $tblsuratperjanjianangsuran_jumlahangsur
 * @property string $tblsuratperjanjianangsuran_ketetapankb
 * @property integer $tblsuratperjanjianangsuran_bulanterlambat
 * @property string $tblsuratperjanjianangsuran_tarifbunga
 * @property string $tblsuratperjanjianangsuran_rpbunga
 * @property string $tblsuratperjanjianangsuran_rpdenda
 * @property string $tblsuratperjanjianangsuran_totalangsuran
 * @property string $tblsuratperjanjianangsuran_terbayar
 * @property string $tblsuratperjanjianangsuran_sisaterhutang
 * @property string $tblsuratperjanjianangsuran_tgljatuhtempo
 */
class SuratPerjanjianAngsuran extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblsuratperjanjianangsuran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblobyek_id, tblsuratketetapankurangbayar_id, tblsuratperjanjianangsuran_jumlahangsur, tblsuratperjanjianangsuran_bulanterlambat', 'numerical', 'integerOnly'=>true),
			array('tblsuratperjanjianangsuran_registerangsuran, tblsuratperjanjianangsuran_nomor', 'length', 'max'=>255),
			array('tblsuratketetapankurangbayar_nomor', 'length', 'max'=>50),
			array('tblsuratperjanjianangsuran_ketetapankb, tblsuratperjanjianangsuran_rpbunga, tblsuratperjanjianangsuran_rpdenda, tblsuratperjanjianangsuran_totalangsuran, tblsuratperjanjianangsuran_terbayar, tblsuratperjanjianangsuran_sisaterhutang', 'length', 'max'=>20),
			array('tblsuratperjanjianangsuran_tarifbunga', 'length', 'max'=>6),
			array('tblsuratperjanjianangsuran_masaawal, tblsuratperjanjianangsuran_masaakhir, tblsuratperjanjianangsuran_tgljatuhtempo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblsuratperjanjianangsuran_id, tblobyek_id, tblsuratperjanjianangsuran_registerangsuran, tblsuratketetapankurangbayar_nomor, tblsuratketetapankurangbayar_id, tblsuratperjanjianangsuran_nomor, tblsuratperjanjianangsuran_masaawal, tblsuratperjanjianangsuran_masaakhir, tblsuratperjanjianangsuran_jumlahangsur, tblsuratperjanjianangsuran_ketetapankb, tblsuratperjanjianangsuran_bulanterlambat, tblsuratperjanjianangsuran_tarifbunga, tblsuratperjanjianangsuran_rpbunga, tblsuratperjanjianangsuran_rpdenda, tblsuratperjanjianangsuran_totalangsuran, tblsuratperjanjianangsuran_terbayar, tblsuratperjanjianangsuran_sisaterhutang, tblsuratperjanjianangsuran_tgljatuhtempo', 'safe', 'on'=>'search'),
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
			'tblsuratperjanjianangsuran_id' => 'Tblsuratperjanjianangsuran',
			'tblobyek_id' => 'Tblobyek',
			'tblsuratperjanjianangsuran_registerangsuran' => 'Tblsuratperjanjianangsuran Registerangsuran',
			'tblsuratketetapankurangbayar_nomor' => 'Tblsuratketetapankurangbayar Nomor',
			'tblsuratketetapankurangbayar_id' => 'Tblsuratketetapankurangbayar',
			'tblsuratperjanjianangsuran_nomor' => 'Tblsuratperjanjianangsuran Nomor',
			'tblsuratperjanjianangsuran_masaawal' => 'Tblsuratperjanjianangsuran Masaawal',
			'tblsuratperjanjianangsuran_masaakhir' => 'Tblsuratperjanjianangsuran Masaakhir',
			'tblsuratperjanjianangsuran_jumlahangsur' => 'Tblsuratperjanjianangsuran Jumlahangsur',
			'tblsuratperjanjianangsuran_ketetapankb' => 'Tblsuratperjanjianangsuran Ketetapankb',
			'tblsuratperjanjianangsuran_bulanterlambat' => 'Tblsuratperjanjianangsuran Bulanterlambat',
			'tblsuratperjanjianangsuran_tarifbunga' => 'Tblsuratperjanjianangsuran Tarifbunga',
			'tblsuratperjanjianangsuran_rpbunga' => 'Tblsuratperjanjianangsuran Rpbunga',
			'tblsuratperjanjianangsuran_rpdenda' => 'Tblsuratperjanjianangsuran Rpdenda',
			'tblsuratperjanjianangsuran_totalangsuran' => 'Tblsuratperjanjianangsuran Totalangsuran',
			'tblsuratperjanjianangsuran_terbayar' => 'Tblsuratperjanjianangsuran Terbayar',
			'tblsuratperjanjianangsuran_sisaterhutang' => 'Tblsuratperjanjianangsuran Sisaterhutang',
			'tblsuratperjanjianangsuran_tgljatuhtempo' => 'Tblsuratperjanjianangsuran Tgljatuhtempo',
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

		$criteria->compare('tblsuratperjanjianangsuran_id',$this->tblsuratperjanjianangsuran_id);
		$criteria->compare('tblobyek_id',$this->tblobyek_id);
		$criteria->compare('tblsuratperjanjianangsuran_registerangsuran',$this->tblsuratperjanjianangsuran_registerangsuran,true);
		$criteria->compare('tblsuratketetapankurangbayar_nomor',$this->tblsuratketetapankurangbayar_nomor,true);
		$criteria->compare('tblsuratketetapankurangbayar_id',$this->tblsuratketetapankurangbayar_id);
		$criteria->compare('tblsuratperjanjianangsuran_nomor',$this->tblsuratperjanjianangsuran_nomor,true);
		$criteria->compare('tblsuratperjanjianangsuran_masaawal',$this->tblsuratperjanjianangsuran_masaawal,true);
		$criteria->compare('tblsuratperjanjianangsuran_masaakhir',$this->tblsuratperjanjianangsuran_masaakhir,true);
		$criteria->compare('tblsuratperjanjianangsuran_jumlahangsur',$this->tblsuratperjanjianangsuran_jumlahangsur);
		$criteria->compare('tblsuratperjanjianangsuran_ketetapankb',$this->tblsuratperjanjianangsuran_ketetapankb,true);
		$criteria->compare('tblsuratperjanjianangsuran_bulanterlambat',$this->tblsuratperjanjianangsuran_bulanterlambat);
		$criteria->compare('tblsuratperjanjianangsuran_tarifbunga',$this->tblsuratperjanjianangsuran_tarifbunga,true);
		$criteria->compare('tblsuratperjanjianangsuran_rpbunga',$this->tblsuratperjanjianangsuran_rpbunga,true);
		$criteria->compare('tblsuratperjanjianangsuran_rpdenda',$this->tblsuratperjanjianangsuran_rpdenda,true);
		$criteria->compare('tblsuratperjanjianangsuran_totalangsuran',$this->tblsuratperjanjianangsuran_totalangsuran,true);
		$criteria->compare('tblsuratperjanjianangsuran_terbayar',$this->tblsuratperjanjianangsuran_terbayar,true);
		$criteria->compare('tblsuratperjanjianangsuran_sisaterhutang',$this->tblsuratperjanjianangsuran_sisaterhutang,true);
		$criteria->compare('tblsuratperjanjianangsuran_tgljatuhtempo',$this->tblsuratperjanjianangsuran_tgljatuhtempo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SuratPerjanjianAngsuran the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

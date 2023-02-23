<?php

/**
 * This is the model class for table "tblsuratpemeriksaanpajaklebih".
 *
 * The followings are the available columns in table 'tblsuratpemeriksaanpajaklebih':
 * @property integer $tblsuratpemeriksaanpajaklebih_id
 * @property integer $tblobyek_id
 * @property string $tblsuratpemeriksaanpajaklebih_nomorperiksa
 * @property string $tblsuratpemeriksaanpajaklebih_petugasperiksa
 * @property string $tblketetapanlebihbayar_pajakperiksa
 * @property string $tblsuratpemeriksaanpajaklebih_tglperiksa
 */
class SuratPemeriksaanPajakLebihBayar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblsuratpemeriksaanpajaklebih';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblobyek_id', 'numerical', 'integerOnly'=>true),
			array('tblsuratpemeriksaanpajaklebih_nomorperiksa, tblsuratpemeriksaanpajaklebih_petugasperiksa', 'length', 'max'=>255),
			array('tblketetapanlebihbayar_pajakperiksa', 'length', 'max'=>20),
			array('tblsuratpemeriksaanpajaklebih_tglperiksa', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblsuratpemeriksaanpajaklebih_id, tblobyek_id, tblsuratpemeriksaanpajaklebih_nomorperiksa, tblsuratpemeriksaanpajaklebih_petugasperiksa, tblketetapanlebihbayar_pajakperiksa, tblsuratpemeriksaanpajaklebih_tglperiksa', 'safe', 'on'=>'search'),
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
			'tblsuratpemeriksaanpajaklebih_id' => 'Tblsuratpemeriksaanpajaklebih',
			'tblobyek_id' => 'Tblobyek',
			'tblsuratpemeriksaanpajaklebih_nomorperiksa' => 'Tblsuratpemeriksaanpajaklebih Nomorperiksa',
			'tblsuratpemeriksaanpajaklebih_petugasperiksa' => 'Tblsuratpemeriksaanpajaklebih Petugasperiksa',
			'tblketetapanlebihbayar_pajakperiksa' => 'Tblketetapanlebihbayar Pajakperiksa',
			'tblsuratpemeriksaanpajaklebih_tglperiksa' => 'Tblsuratpemeriksaanpajaklebih Tglperiksa',
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

		$criteria->compare('tblsuratpemeriksaanpajaklebih_id',$this->tblsuratpemeriksaanpajaklebih_id);
		$criteria->compare('tblobyek_id',$this->tblobyek_id);
		$criteria->compare('tblsuratpemeriksaanpajaklebih_nomorperiksa',$this->tblsuratpemeriksaanpajaklebih_nomorperiksa,true);
		$criteria->compare('tblsuratpemeriksaanpajaklebih_petugasperiksa',$this->tblsuratpemeriksaanpajaklebih_petugasperiksa,true);
		$criteria->compare('tblketetapanlebihbayar_pajakperiksa',$this->tblketetapanlebihbayar_pajakperiksa,true);
		$criteria->compare('tblsuratpemeriksaanpajaklebih_tglperiksa',$this->tblsuratpemeriksaanpajaklebih_tglperiksa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SuratPemeriksaanPajakLebihBayar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

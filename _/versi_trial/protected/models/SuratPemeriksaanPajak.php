<?php

/**
 * This is the model class for table "tblsuratpemeriksaanpajak".
 *
 * The followings are the available columns in table 'tblsuratpemeriksaanpajak':
 * @property integer $tblsuratpemeriksaanpajak_id
 * @property integer $tblobyek_id
 * @property string $tblsuratpemeriksaanpajak_nomorperiksa
 * @property string $tblsuratpemeriksaanpajak_petugasperiksa
 * @property string $tblsuratketetapankurangbayar_pajakperiksa
 * @property string $tblsuratketetapankurangbayar_tglperiksa
 */
class SuratPemeriksaanPajak extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblsuratpemeriksaanpajak';
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
			array('tblsuratpemeriksaanpajak_nomorperiksa, tblsuratpemeriksaanpajak_petugasperiksa', 'length', 'max'=>255),
			array('tblsuratketetapankurangbayar_pajakperiksa', 'length', 'max'=>20),
			array('tblsuratketetapankurangbayar_tglperiksa', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblsuratpemeriksaanpajak_id, tblobyek_id, tblsuratpemeriksaanpajak_nomorperiksa, tblsuratpemeriksaanpajak_petugasperiksa, tblsuratketetapankurangbayar_pajakperiksa, tblsuratketetapankurangbayar_tglperiksa', 'safe', 'on'=>'search'),
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
			'tblsuratpemeriksaanpajak_id' => 'Tblsuratpemeriksaanpajak',
			'tblobyek_id' => 'Tblobyek',
			'tblsuratpemeriksaanpajak_nomorperiksa' => 'Tblsuratpemeriksaanpajak Nomorperiksa',
			'tblsuratpemeriksaanpajak_petugasperiksa' => 'Tblsuratpemeriksaanpajak Petugasperiksa',
			'tblsuratketetapankurangbayar_pajakperiksa' => 'Tblsuratketetapankurangbayar Pajakperiksa',
			'tblsuratketetapankurangbayar_tglperiksa' => 'Tblsuratketetapankurangbayar Tglperiksa',
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

		$criteria->compare('tblsuratpemeriksaanpajak_id',$this->tblsuratpemeriksaanpajak_id);
		$criteria->compare('tblobyek_id',$this->tblobyek_id);
		$criteria->compare('tblsuratpemeriksaanpajak_nomorperiksa',$this->tblsuratpemeriksaanpajak_nomorperiksa,true);
		$criteria->compare('tblsuratpemeriksaanpajak_petugasperiksa',$this->tblsuratpemeriksaanpajak_petugasperiksa,true);
		$criteria->compare('tblsuratketetapankurangbayar_pajakperiksa',$this->tblsuratketetapankurangbayar_pajakperiksa,true);
		$criteria->compare('tblsuratketetapankurangbayar_tglperiksa',$this->tblsuratketetapankurangbayar_tglperiksa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SuratPemeriksaanPajak the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

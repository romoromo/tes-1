<?php

/**
 * This is the model class for table "tblsuratpemeriksaanpajaknihil".
 *
 * The followings are the available columns in table 'tblsuratpemeriksaanpajaknihil':
 * @property integer $tblsuratpemeriksaanpajaknihil_id
 * @property integer $tblobyek_id
 * @property string $tblsuratpemeriksaanpajaknihil_nomorperiksa
 * @property string $tblsuratpemeriksaanpajaknihil_petugasperiksa
 * @property string $tblketetapannihil_pajakperiksa
 * @property string $tblsuratpemeriksaanpajaknihil_tglperiksa
 */
class SuratPemeriksaanPajakNihil extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblsuratpemeriksaanpajaknihil';
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
			array('tblsuratpemeriksaanpajaknihil_nomorperiksa, tblsuratpemeriksaanpajaknihil_petugasperiksa', 'length', 'max'=>255),
			array('tblketetapannihil_pajakperiksa', 'length', 'max'=>20),
			array('tblsuratpemeriksaanpajaknihil_tglperiksa', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblsuratpemeriksaanpajaknihil_id, tblobyek_id, tblsuratpemeriksaanpajaknihil_nomorperiksa, tblsuratpemeriksaanpajaknihil_petugasperiksa, tblketetapannihil_pajakperiksa, tblsuratpemeriksaanpajaknihil_tglperiksa', 'safe', 'on'=>'search'),
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
			'tblsuratpemeriksaanpajaknihil_id' => 'Tblsuratpemeriksaanpajaknihil',
			'tblobyek_id' => 'Tblobyek',
			'tblsuratpemeriksaanpajaknihil_nomorperiksa' => 'Tblsuratpemeriksaanpajaknihil Nomorperiksa',
			'tblsuratpemeriksaanpajaknihil_petugasperiksa' => 'Tblsuratpemeriksaanpajaknihil Petugasperiksa',
			'tblketetapannihil_pajakperiksa' => 'Tblketetapannihil Pajakperiksa',
			'tblsuratpemeriksaanpajaknihil_tglperiksa' => 'Tblsuratpemeriksaanpajaknihil Tglperiksa',
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

		$criteria->compare('tblsuratpemeriksaanpajaknihil_id',$this->tblsuratpemeriksaanpajaknihil_id);
		$criteria->compare('tblobyek_id',$this->tblobyek_id);
		$criteria->compare('tblsuratpemeriksaanpajaknihil_nomorperiksa',$this->tblsuratpemeriksaanpajaknihil_nomorperiksa,true);
		$criteria->compare('tblsuratpemeriksaanpajaknihil_petugasperiksa',$this->tblsuratpemeriksaanpajaknihil_petugasperiksa,true);
		$criteria->compare('tblketetapannihil_pajakperiksa',$this->tblketetapannihil_pajakperiksa,true);
		$criteria->compare('tblsuratpemeriksaanpajaknihil_tglperiksa',$this->tblsuratpemeriksaanpajaknihil_tglperiksa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SuratPemeriksaanPajakNihil the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

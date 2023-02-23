<?php

/**
 * This is the model class for table "tblobyekhiburan".
 *
 * The followings are the available columns in table 'tblobyekhiburan':
 * @property string $tblobyekhiburan_id
 * @property string $tblobyek_id
 * @property string $tblobyek_nomor
 * @property integer $refjenishiburan_id
 * @property string $tblobyekhiburan_tarijmlhhari
 * @property string $tblobyekhiburan_tarijmlhlibur
 * @property integer $tblobyekhiburan_jmlhhari
 * @property string $tblobyekhiburan_jmlhlibur
 * @property string $tblobyekhiburan_jmlhmesin
 * @property string $tblobyekhiburan_jmlhkamar
 * @property string $tblobyekhiburan_iskarcisfree
 * @property integer $tblobyekhiburan_jmlhkarcisfree
 * @property string $tblobyekhiburan_ismesinkarcis
 * @property string $tblobyekhiburan_ispembukuan
 */
class ObyekHiburan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblobyekhiburan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refjenishiburan_id, tblobyekhiburan_jmlhhari, tblobyekhiburan_jmlhkarcisfree', 'numerical', 'integerOnly'=>true),
			array('tblobyek_id', 'length', 'max'=>19),
			array('tblobyek_nomor, tblobyekhiburan_tarijmlhhari, tblobyekhiburan_tarijmlhlibur, tblobyekhiburan_jmlhlibur, tblobyekhiburan_jmlhmesin, tblobyekhiburan_jmlhkamar', 'length', 'max'=>255),
			array('tblobyekhiburan_iskarcisfree, tblobyekhiburan_ismesinkarcis, tblobyekhiburan_ispembukuan', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblobyekhiburan_id, tblobyek_id, tblobyek_nomor, refjenishiburan_id, tblobyekhiburan_tarijmlhhari, tblobyekhiburan_tarijmlhlibur, tblobyekhiburan_jmlhhari, tblobyekhiburan_jmlhlibur, tblobyekhiburan_jmlhmesin, tblobyekhiburan_jmlhkamar, tblobyekhiburan_iskarcisfree, tblobyekhiburan_jmlhkarcisfree, tblobyekhiburan_ismesinkarcis, tblobyekhiburan_ispembukuan', 'safe', 'on'=>'search'),
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
			'tblobyekhiburan_id' => 'Tblobyekhiburan',
			'tblobyek_id' => 'Tblobyek',
			'tblobyek_nomor' => 'Tblobyek Nomor',
			'refjenishiburan_id' => 'Refjenishiburan',
			'tblobyekhiburan_tarijmlhhari' => 'Tblobyekhiburan Tarijmlhhari',
			'tblobyekhiburan_tarijmlhlibur' => 'Tblobyekhiburan Tarijmlhlibur',
			'tblobyekhiburan_jmlhhari' => 'Tblobyekhiburan Jmlhhari',
			'tblobyekhiburan_jmlhlibur' => 'Tblobyekhiburan Jmlhlibur',
			'tblobyekhiburan_jmlhmesin' => 'Tblobyekhiburan Jmlhmesin',
			'tblobyekhiburan_jmlhkamar' => 'Tblobyekhiburan Jmlhkamar',
			'tblobyekhiburan_iskarcisfree' => 'Tblobyekhiburan Iskarcisfree',
			'tblobyekhiburan_jmlhkarcisfree' => 'Tblobyekhiburan Jmlhkarcisfree',
			'tblobyekhiburan_ismesinkarcis' => 'Tblobyekhiburan Ismesinkarcis',
			'tblobyekhiburan_ispembukuan' => 'Tblobyekhiburan Ispembukuan',
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

		$criteria->compare('tblobyekhiburan_id',$this->tblobyekhiburan_id,true);
		$criteria->compare('tblobyek_id',$this->tblobyek_id,true);
		$criteria->compare('tblobyek_nomor',$this->tblobyek_nomor,true);
		$criteria->compare('refjenishiburan_id',$this->refjenishiburan_id);
		$criteria->compare('tblobyekhiburan_tarijmlhhari',$this->tblobyekhiburan_tarijmlhhari,true);
		$criteria->compare('tblobyekhiburan_tarijmlhlibur',$this->tblobyekhiburan_tarijmlhlibur,true);
		$criteria->compare('tblobyekhiburan_jmlhhari',$this->tblobyekhiburan_jmlhhari);
		$criteria->compare('tblobyekhiburan_jmlhlibur',$this->tblobyekhiburan_jmlhlibur,true);
		$criteria->compare('tblobyekhiburan_jmlhmesin',$this->tblobyekhiburan_jmlhmesin,true);
		$criteria->compare('tblobyekhiburan_jmlhkamar',$this->tblobyekhiburan_jmlhkamar,true);
		$criteria->compare('tblobyekhiburan_iskarcisfree',$this->tblobyekhiburan_iskarcisfree,true);
		$criteria->compare('tblobyekhiburan_jmlhkarcisfree',$this->tblobyekhiburan_jmlhkarcisfree);
		$criteria->compare('tblobyekhiburan_ismesinkarcis',$this->tblobyekhiburan_ismesinkarcis,true);
		$criteria->compare('tblobyekhiburan_ispembukuan',$this->tblobyekhiburan_ispembukuan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ObyekHiburan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

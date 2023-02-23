<?php

/**
 * This is the model class for table "refkelurahan".
 *
 * The followings are the available columns in table 'refkelurahan':
 * @property integer $REFKELURAHAN_ID
 * @property integer $REFKECAMATAN_ID
 * @property string $REFKELURAHAN_KODE
 * @property string $REFKELURAHAN_NAMA
 *
 * The followings are the available model relations:
 * @property Refkecamatan $refkecamatan
 * @property Tblsubyek[] $tblsubyeks
 */
class Kelurahan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'REFKELURAHAN';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('REFKECAMATAN_ID', 'numerical', 'integerOnly'=>true),
			array('REFKELURAHAN_KODE', 'length', 'max'=>2),
			array('REFKELURAHAN_NAMA', 'length', 'max'=>125),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('REFKELURAHAN_ID, REFKECAMATAN_ID, REFKELURAHAN_KODE, REFKELURAHAN_NAMA', 'safe', 'on'=>'search'),
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
			'refkecamatan' => array(self::BELONGS_TO, 'Refkecamatan', 'REFKECAMATAN_ID'),
			'tblsubyeks' => array(self::HAS_MANY, 'Tblsubyek', 'REFKELURAHAN_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'REFKELURAHAN_ID' => 'Refkelurahan',
			'REFKECAMATAN_ID' => 'Refkecamatan',
			'REFKELURAHAN_KODE' => 'Refkelurahan Kode',
			'REFKELURAHAN_NAMA' => 'Refkelurahan Nama',
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

		$criteria->compare('REFKELURAHAN_ID',$this->REFKELURAHAN_ID);
		$criteria->compare('REFKECAMATAN_ID',$this->REFKECAMATAN_ID);
		$criteria->compare('REFKELURAHAN_KODE',$this->REFKELURAHAN_KODE,true);
		$criteria->compare('REFKELURAHAN_NAMA',$this->REFKELURAHAN_NAMA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kelurahan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

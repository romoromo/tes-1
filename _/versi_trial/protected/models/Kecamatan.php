<?php

/**
 * This is the model class for table "refkecamatan".
 *
 * The followings are the available columns in table 'refkecamatan':
 * @property integer $REFKECAMATAN_ID
 * @property integer $REFKABUPATEN_ID
 * @property string $REFKECAMATAN_KODE
 * @property string $REFKECAMATAN_NAMA
 *
 * The followings are the available model relations:
 * @property Refkabupaten $REFKABUPATEN
 * @property Refkelurahan[] $refkelurahans
 * @property Tblsubyek[] $tblsubyeks
 */
class Kecamatan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'REFKECAMATAN';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('REFKABUPATEN_ID', 'numerical', 'integerOnly'=>true),
			array('REFKECAMATAN_KODE', 'length', 'max'=>2),
			array('REFKECAMATAN_NAMA', 'length', 'max'=>125),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('REFKECAMATAN_ID, REFKABUPATEN_ID, REFKECAMATAN_KODE, REFKECAMATAN_NAMA', 'safe', 'on'=>'search'),
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
			'REFKABUPATEN' => array(self::BELONGS_TO, 'Refkabupaten', 'REFKABUPATEN_ID'),
			'refkelurahans' => array(self::HAS_MANY, 'Refkelurahan', 'REFKECAMATAN_ID'),
			'tblsubyeks' => array(self::HAS_MANY, 'Tblsubyek', 'REFKECAMATAN_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'REFKECAMATAN_ID' => 'Refkecamatan',
			'REFKABUPATEN_ID' => 'Refkabupaten',
			'REFKECAMATAN_KODE' => 'Refkecamatan Kode',
			'REFKECAMATAN_NAMA' => 'Refkecamatan Nama',
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

		$criteria->compare('REFKECAMATAN_ID',$this->REFKECAMATAN_ID);
		$criteria->compare('REFKABUPATEN_ID',$this->REFKABUPATEN_ID);
		$criteria->compare('REFKECAMATAN_KODE',$this->REFKECAMATAN_KODE,true);
		$criteria->compare('REFKECAMATAN_NAMA',$this->REFKECAMATAN_NAMA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kecamatan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

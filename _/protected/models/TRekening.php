<?php

/**
 * This is the model class for table "TREKENING".
 *
 * The followings are the available columns in table 'TREKENING':
 * @property integer $TREKENING_ID
 * @property string $TREKENING_KODE
 * @property string $TREKENING_LEVEL
 * @property string $TREKENING_NAMA
 * @property string $TREKENING_TARIF
 * @property string $refunitorg_kode
 * @property double $TREKENING_TARGET
 * @property string $TREKENING_STATUS
 * @property string $TREKENING_AKTIF
 */
class TRekening extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TREKENING';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TREKENING_TARGET', 'numerical'),
			array('TREKENING_KODE, refunitorg_kode', 'length', 'max'=>20),
			array('TREKENING_LEVEL', 'length', 'max'=>2),
			array('TREKENING_NAMA', 'length', 'max'=>255),
			array('TREKENING_TARIF', 'length', 'max'=>6),
			array('TREKENING_STATUS', 'length', 'max'=>7),
			array('TREKENING_AKTIF', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TREKENING_ID, TREKENING_KODE, TREKENING_LEVEL, TREKENING_NAMA, TREKENING_TARIF, refunitorg_kode, TREKENING_TARGET, TREKENING_STATUS, TREKENING_AKTIF', 'safe', 'on'=>'search'),
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
			'TREKENING_ID' => 'Tblmasterrekening',
			'TREKENING_KODE' => 'Tblmasterrekening Kode',
			'TREKENING_LEVEL' => 'Tblmasterrekening Level',
			'TREKENING_NAMA' => 'Tblmasterrekening Nama',
			'TREKENING_TARIF' => 'Tblmasterrekening Tarif',
			'REFUNITORG_KODE' => 'Refunitorg Kode',
			'TREKENING_TARGET' => 'Tblmasterrekening Target',
			'TREKENING_STATUS' => 'Tblmasterrekening Status',
			'TREKENING_AKTIF' => 'Tblmasterrekening Aktif',
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

		$criteria->compare('TREKENING_ID',$this->TREKENING_ID);
		$criteria->compare('TREKENING_KODE',$this->TREKENING_KODE,true);
		$criteria->compare('TREKENING_LEVEL',$this->TREKENING_LEVEL,true);
		$criteria->compare('TREKENING_NAMA',$this->TREKENING_NAMA,true);
		$criteria->compare('TREKENING_TARIF',$this->TREKENING_TARIF,true);
		$criteria->compare('REFUNITORG_KODE',$this->refunitorg_kode,true);
		$criteria->compare('TREKENING_TARGET',$this->TREKENING_TARGET);
		$criteria->compare('TREKENING_STATUS',$this->TREKENING_STATUS,true);
		$criteria->compare('TREKENING_AKTIF',$this->TREKENING_AKTIF,true);

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

	public function getRekeningAktif()
	{
		/*SQL
		SELECT
		*
		FROM
		TREKENING
		WHERE TREKENING_AKTIF='T'
		AND LENGTH(TREKENING_KODE) = 5
		ORDER BY TREKENING_KODE
		*/

		return Yii::app()->db->createCommand()
		->select()
		->from('TREKENING')
		// ->where("TREKENING_AKTIF='T' AND LENGTH(TREKENING_KODE) = 5")
		->where("TREKENING_LEVEL = 0 AND TREKENING_AKTIF='T'")
		->order('TREKENING_KODE')
		->queryAll();
		;
	}

	public function getRekeningSubAktif($kode)
	{
		Yii::import('ext.DBFetch');
		$select = '*';
		$from = 'TREKENING';
		$filter = array(
			'LK__TREKENING_KODE' => substr($kode, 0, 5)
			, 'EQ__TREKENING_LEVEL' => 1
		);
		$otherquery = array(
			'order' => 'TREKENING_KODE'
		);

		return DBFetch::query( array('from'=>$from, 'filter'=>$filter, 'otherquery'=>$otherquery, 'mode'=>'LIST') );

		/*return Yii::app()->db->createCommand()
		->select()
		->from('TREKENING')
		// ->where("TREKENING_AKTIF='T' AND LENGTH(TREKENING_KODE) = 5")
		->where("TREKENING_LEVEL = 1")
		->andWhere('TREKENING_KODE LIKE :kode', array(':kode' => $kode))
		->order('TREKENING_KODE')
		->queryAll();
		;*/
	}

	public function getKodeREGPajak($kode='')
	{
		$rek = TRekening::model()->find('TREKENING_KODE=:kode', array(':kode' => $kode) );
		if ($rek) {
			return $rek['TREKENING_KODEREG'];
		} else {
			return '';
		}
	}
}

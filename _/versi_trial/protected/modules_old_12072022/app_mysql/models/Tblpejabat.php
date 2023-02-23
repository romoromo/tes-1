<?php

/**
 * This is the model class for table "tblpejabat".
 *
 * The followings are the available columns in table 'tblpejabat':
 * @property integer $tblpejabat_id
 * @property string $tblpejabat_nama
 * @property string $tblpejabat_nip
 * @property string $tblpejabat_jabatan
 * @property string $tblpejabat_golongan
 */
class Tblpejabat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblpejabat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblpejabat_nama, tblpejabat_nip, tblpejabat_golongan', 'required'),
			array('tblpejabat_nama, tblpejabat_nip, tblpejabat_golongan', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblpejabat_id, tblpejabat_nama, tblpejabat_nip, tblpejabat_jabatan, tblpejabat_golongan', 'safe', 'on'=>'search'),
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
			'tblpejabat_id' => 'Tblpejabat',
			'tblpejabat_nama' => 'Tblpejabat Nama',
			'tblpejabat_nip' => 'Tblpejabat Nip',
			'tblpejabat_jabatan' => 'Tblpejabat Jabatan',
			'tblpejabat_golongan' => 'Tblpejabat Golongan',
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

		$criteria->compare('tblpejabat_id',$this->tblpejabat_id);
		$criteria->compare('tblpejabat_nama',$this->tblpejabat_nama,true);
		$criteria->compare('tblpejabat_nip',$this->tblpejabat_nip,true);
		$criteria->compare('tblpejabat_jabatan',$this->tblpejabat_jabatan,true);
		$criteria->compare('tblpejabat_golongan',$this->tblpejabat_golongan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tblpejabat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getDataPenandaTangan($kode='')
	{
		$dt = Yii::app()->db->createCommand()
		->select('tblpejabat_nama AS pejabat_nama, tblpejabat_nip AS pejabat_nip, tblpejabat_golongan AS pejabat_golongan, refjabatan_nama AS jabatan_nama')
		->from('refpenandatangan')
		->leftJoin('tblpejabat', 'refpenandatangan.tblpejabat_id = tblpejabat.tblpejabat_id')
		->leftJoin('refjabatan', 'refjabatan.refjabatan_id = tblpejabat.refjabatan_id')
		->where('refpenandatangan_kode=:kode', array(':kode'=>$kode))
		->queryRow();
		if (!$dt) {
			$dt = array(
				'pejabat_nama' => ''
				, 'pejabat_nip' => ''
				, 'pejabat_golongan' => ''
				, 'jabatan_nama' => ''
			);
		}
		return $dt;
	}
}

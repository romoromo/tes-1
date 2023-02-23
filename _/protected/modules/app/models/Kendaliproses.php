<?php

/**
 * This is the model class for table "TBLKENDALIPROSES".
 *
 * The followings are the available columns in table 'TBLKENDALIPROSES':
 * @property string $TBLKENDALIPROSES_ID
 * @property string $TBLIZINPENDAFTARAN_ID
 * @property string $TBLKENDALIBLOKSISTEMTUGAS_ID
 * @property string $TBLKENDALIPROSES_TGLMULAI
 * @property string $TBLKENDALIPROSES_TGLMULAI_SYS
 * @property string $TBLKENDALIBLOKSISTEM_IDASAL
 * @property string $TBLKENDALIPROSES_TGLSELESAI
 * @property string $TBLKENDALIPROSES_TGLSELESAI_SYS
 * @property string $TBLKENDALIBLOKSISTEM_IDKIRIM
 * @property string $TBLKENDALIPROSES_ISPARAF
 * @property string $TBLKENDALIPROSES_CATATAN
 * @property string $TBLPENGGUNA_ID
 * @property string $TBLKENDALIPROSES_ISBERKASFISIKDIKIRIM
 * @property string $TBLKENDALIPROSES_TGLBERKASFISIKDIKIRIM
 * @property string $TBLKENDALIPROSES_TGLBERKASFISIKDIKIRIM_SYS
 * @property string $TBLKENDALIPROSES_STATUS
 * @property string $TBLKENDALIPROSES_TGLTERIMA
 * @property integer $TBLPENOLAKAN_ID
 * @property string $TBLKENDALIPROSES_PENOLAKAN
 * @property integer $TBLKENDALIPROSES_JAMLAMBAT
 * @property integer $TBLKENDALIPROSES_harilambat
 * @property integer $TBLKENDALIPROSES_JAMLAMBAT_SYS
 * @property integer $TBLKENDALIPROSES_HARILAMBAT_SYS
 */
class Kendaliproses extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TBLKENDALIPROSES';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TBLIZINPENDAFTARAN_ID', 'required'),
			array('TBLPENOLAKAN_ID, TBLKENDALIPROSES_JAMLAMBAT, TBLKENDALIPROSES_harilambat, TBLKENDALIPROSES_JAMLAMBAT_SYS, TBLKENDALIPROSES_HARILAMBAT_SYS', 'numerical', 'integerOnly'=>true),
			array('TBLIZINPENDAFTARAN_ID, TBLKENDALIBLOKSISTEMTUGAS_ID, TBLKENDALIBLOKSISTEM_IDASAL, TBLKENDALIBLOKSISTEM_IDKIRIM, TBLKENDALIPROSES_STATUS', 'length', 'max'=>10),
			array('TBLKENDALIPROSES_ISPARAF, TBLKENDALIPROSES_ISBERKASFISIKDIKIRIM', 'length', 'max'=>1),
			array('TBLPENGGUNA_ID', 'length', 'max'=>15),
			array('TBLKENDALIPROSES_TGLMULAI, TBLKENDALIPROSES_TGLMULAI_SYS, TBLKENDALIPROSES_TGLSELESAI, TBLKENDALIPROSES_TGLSELESAI_SYS, TBLKENDALIPROSES_CATATAN, TBLKENDALIPROSES_TGLBERKASFISIKDIKIRIM, TBLKENDALIPROSES_TGLBERKASFISIKDIKIRIM_SYS, TBLKENDALIPROSES_TGLTERIMA, TBLKENDALIPROSES_PENOLAKAN', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TBLKENDALIPROSES_ID, TBLIZINPENDAFTARAN_ID, TBLKENDALIBLOKSISTEMTUGAS_ID, TBLKENDALIPROSES_TGLMULAI, TBLKENDALIPROSES_TGLMULAI_SYS, TBLKENDALIBLOKSISTEM_IDASAL, TBLKENDALIPROSES_TGLSELESAI, TBLKENDALIPROSES_TGLSELESAI_SYS, TBLKENDALIBLOKSISTEM_IDKIRIM, TBLKENDALIPROSES_ISPARAF, TBLKENDALIPROSES_CATATAN, TBLPENGGUNA_ID, TBLKENDALIPROSES_ISBERKASFISIKDIKIRIM, TBLKENDALIPROSES_TGLBERKASFISIKDIKIRIM, TBLKENDALIPROSES_TGLBERKASFISIKDIKIRIM_SYS, TBLKENDALIPROSES_STATUS, TBLKENDALIPROSES_TGLTERIMA, TBLPENOLAKAN_ID, TBLKENDALIPROSES_PENOLAKAN, TBLKENDALIPROSES_JAMLAMBAT, TBLKENDALIPROSES_harilambat, TBLKENDALIPROSES_JAMLAMBAT_SYS, TBLKENDALIPROSES_HARILAMBAT_SYS', 'safe', 'on'=>'search'),
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
			'TBLKENDALIPROSES_ID' => 'Tblkendaliproses',
			'TBLIZINPENDAFTARAN_ID' => 'Tblizinpendaftaran',
			'TBLKENDALIBLOKSISTEMTUGAS_ID' => 'Tblkendalibloksistemtugas',
			'TBLKENDALIPROSES_TGLMULAI' => 'Tblkendaliproses Tglmulai',
			'TBLKENDALIPROSES_TGLMULAI_SYS' => 'Tblkendaliproses Tglmulai Sys',
			'TBLKENDALIBLOKSISTEM_IDASAL' => 'Tblkendalibloksistem Idasal',
			'TBLKENDALIPROSES_TGLSELESAI' => 'Tblkendaliproses Tglselesai',
			'TBLKENDALIPROSES_TGLSELESAI_SYS' => 'Tblkendaliproses Tglselesai Sys',
			'TBLKENDALIBLOKSISTEM_IDKIRIM' => 'Tblkendalibloksistem Idkirim',
			'TBLKENDALIPROSES_ISPARAF' => 'Tblkendaliproses Isparaf',
			'TBLKENDALIPROSES_CATATAN' => 'Tblkendaliproses Catatan',
			'TBLPENGGUNA_ID' => 'Tblpengguna',
			'TBLKENDALIPROSES_ISBERKASFISIKDIKIRIM' => 'Tblkendaliproses Isberkasfisikdikirim',
			'TBLKENDALIPROSES_TGLBERKASFISIKDIKIRIM' => 'Tblkendaliproses Tglberkasfisikdikirim',
			'TBLKENDALIPROSES_TGLBERKASFISIKDIKIRIM_SYS' => 'Tblkendaliproses Tglberkasfisikdikirim Sys',
			'TBLKENDALIPROSES_STATUS' => 'Tblkendaliproses Status',
			'TBLKENDALIPROSES_TGLTERIMA' => 'Tblkendaliproses Tglterima',
			'TBLPENOLAKAN_ID' => 'Tblpenolakan',
			'TBLKENDALIPROSES_PENOLAKAN' => 'Tblkendaliproses Penolakan',
			'TBLKENDALIPROSES_JAMLAMBAT' => 'Tblkendaliproses Jamlambat',
			'TBLKENDALIPROSES_harilambat' => 'Tblkendaliproses Harilambat',
			'TBLKENDALIPROSES_JAMLAMBAT_SYS' => 'Tblkendaliproses Jamlambat Sys',
			'TBLKENDALIPROSES_HARILAMBAT_SYS' => 'Tblkendaliproses Harilambat Sys',
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

		$criteria->compare('TBLKENDALIPROSES_ID',$this->TBLKENDALIPROSES_ID,true);
		$criteria->compare('TBLIZINPENDAFTARAN_ID',$this->TBLIZINPENDAFTARAN_ID,true);
		$criteria->compare('TBLKENDALIBLOKSISTEMTUGAS_ID',$this->TBLKENDALIBLOKSISTEMTUGAS_ID,true);
		$criteria->compare('TBLKENDALIPROSES_TGLMULAI',$this->TBLKENDALIPROSES_TGLMULAI,true);
		$criteria->compare('TBLKENDALIPROSES_TGLMULAI_SYS',$this->TBLKENDALIPROSES_TGLMULAI_SYS,true);
		$criteria->compare('TBLKENDALIBLOKSISTEM_IDASAL',$this->TBLKENDALIBLOKSISTEM_IDASAL,true);
		$criteria->compare('TBLKENDALIPROSES_TGLSELESAI',$this->TBLKENDALIPROSES_TGLSELESAI,true);
		$criteria->compare('TBLKENDALIPROSES_TGLSELESAI_SYS',$this->TBLKENDALIPROSES_TGLSELESAI_SYS,true);
		$criteria->compare('TBLKENDALIBLOKSISTEM_IDKIRIM',$this->TBLKENDALIBLOKSISTEM_IDKIRIM,true);
		$criteria->compare('TBLKENDALIPROSES_ISPARAF',$this->TBLKENDALIPROSES_ISPARAF,true);
		$criteria->compare('TBLKENDALIPROSES_CATATAN',$this->TBLKENDALIPROSES_CATATAN,true);
		$criteria->compare('TBLPENGGUNA_ID',$this->TBLPENGGUNA_ID,true);
		$criteria->compare('TBLKENDALIPROSES_ISBERKASFISIKDIKIRIM',$this->TBLKENDALIPROSES_ISBERKASFISIKDIKIRIM,true);
		$criteria->compare('TBLKENDALIPROSES_TGLBERKASFISIKDIKIRIM',$this->TBLKENDALIPROSES_TGLBERKASFISIKDIKIRIM,true);
		$criteria->compare('TBLKENDALIPROSES_TGLBERKASFISIKDIKIRIM_SYS',$this->TBLKENDALIPROSES_TGLBERKASFISIKDIKIRIM_SYS,true);
		$criteria->compare('TBLKENDALIPROSES_STATUS',$this->TBLKENDALIPROSES_STATUS,true);
		$criteria->compare('TBLKENDALIPROSES_TGLTERIMA',$this->TBLKENDALIPROSES_TGLTERIMA,true);
		$criteria->compare('TBLPENOLAKAN_ID',$this->TBLPENOLAKAN_ID);
		$criteria->compare('TBLKENDALIPROSES_PENOLAKAN',$this->TBLKENDALIPROSES_PENOLAKAN,true);
		$criteria->compare('TBLKENDALIPROSES_JAMLAMBAT',$this->TBLKENDALIPROSES_JAMLAMBAT);
		$criteria->compare('TBLKENDALIPROSES_harilambat',$this->TBLKENDALIPROSES_harilambat);
		$criteria->compare('TBLKENDALIPROSES_JAMLAMBAT_SYS',$this->TBLKENDALIPROSES_JAMLAMBAT_SYS);
		$criteria->compare('TBLKENDALIPROSES_HARILAMBAT_SYS',$this->TBLKENDALIPROSES_HARILAMBAT_SYS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kendaliproses the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

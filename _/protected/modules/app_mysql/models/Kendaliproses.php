<?php

/**
 * This is the model class for table "tblkendaliproses".
 *
 * The followings are the available columns in table 'tblkendaliproses':
 * @property string $tblkendaliproses_id
 * @property string $tblizinpendaftaran_id
 * @property string $tblkendalibloksistemtugas_id
 * @property string $tblkendaliproses_tglmulai
 * @property string $tblkendaliproses_tglmulai_sys
 * @property string $tblkendalibloksistem_idasal
 * @property string $tblkendaliproses_tglselesai
 * @property string $tblkendaliproses_tglselesai_sys
 * @property string $tblkendalibloksistem_idkirim
 * @property string $tblkendaliproses_isparaf
 * @property string $tblkendaliproses_catatan
 * @property string $tblpengguna_id
 * @property string $tblkendaliproses_isberkasfisikdikirim
 * @property string $tblkendaliproses_tglberkasfisikdikirim
 * @property string $tblkendaliproses_tglberkasfisikdikirim_sys
 * @property string $tblkendaliproses_status
 * @property string $tblkendaliproses_tglterima
 * @property integer $tblpenolakan_id
 * @property string $tblkendaliproses_penolakan
 * @property integer $tblkendaliproses_jamlambat
 * @property integer $tblkendaliproses_harilambat
 * @property integer $tblkendaliproses_jamlambat_sys
 * @property integer $tblkendaliproses_harilambat_sys
 */
class Kendaliproses extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblkendaliproses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblizinpendaftaran_id', 'required'),
			array('tblpenolakan_id, tblkendaliproses_jamlambat, tblkendaliproses_harilambat, tblkendaliproses_jamlambat_sys, tblkendaliproses_harilambat_sys', 'numerical', 'integerOnly'=>true),
			array('tblizinpendaftaran_id, tblkendalibloksistemtugas_id, tblkendalibloksistem_idasal, tblkendalibloksistem_idkirim, tblkendaliproses_status', 'length', 'max'=>10),
			array('tblkendaliproses_isparaf, tblkendaliproses_isberkasfisikdikirim', 'length', 'max'=>1),
			array('tblpengguna_id', 'length', 'max'=>15),
			array('tblkendaliproses_tglmulai, tblkendaliproses_tglmulai_sys, tblkendaliproses_tglselesai, tblkendaliproses_tglselesai_sys, tblkendaliproses_catatan, tblkendaliproses_tglberkasfisikdikirim, tblkendaliproses_tglberkasfisikdikirim_sys, tblkendaliproses_tglterima, tblkendaliproses_penolakan', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblkendaliproses_id, tblizinpendaftaran_id, tblkendalibloksistemtugas_id, tblkendaliproses_tglmulai, tblkendaliproses_tglmulai_sys, tblkendalibloksistem_idasal, tblkendaliproses_tglselesai, tblkendaliproses_tglselesai_sys, tblkendalibloksistem_idkirim, tblkendaliproses_isparaf, tblkendaliproses_catatan, tblpengguna_id, tblkendaliproses_isberkasfisikdikirim, tblkendaliproses_tglberkasfisikdikirim, tblkendaliproses_tglberkasfisikdikirim_sys, tblkendaliproses_status, tblkendaliproses_tglterima, tblpenolakan_id, tblkendaliproses_penolakan, tblkendaliproses_jamlambat, tblkendaliproses_harilambat, tblkendaliproses_jamlambat_sys, tblkendaliproses_harilambat_sys', 'safe', 'on'=>'search'),
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
			'tblkendaliproses_id' => 'Tblkendaliproses',
			'tblizinpendaftaran_id' => 'Tblizinpendaftaran',
			'tblkendalibloksistemtugas_id' => 'Tblkendalibloksistemtugas',
			'tblkendaliproses_tglmulai' => 'Tblkendaliproses Tglmulai',
			'tblkendaliproses_tglmulai_sys' => 'Tblkendaliproses Tglmulai Sys',
			'tblkendalibloksistem_idasal' => 'Tblkendalibloksistem Idasal',
			'tblkendaliproses_tglselesai' => 'Tblkendaliproses Tglselesai',
			'tblkendaliproses_tglselesai_sys' => 'Tblkendaliproses Tglselesai Sys',
			'tblkendalibloksistem_idkirim' => 'Tblkendalibloksistem Idkirim',
			'tblkendaliproses_isparaf' => 'Tblkendaliproses Isparaf',
			'tblkendaliproses_catatan' => 'Tblkendaliproses Catatan',
			'tblpengguna_id' => 'Tblpengguna',
			'tblkendaliproses_isberkasfisikdikirim' => 'Tblkendaliproses Isberkasfisikdikirim',
			'tblkendaliproses_tglberkasfisikdikirim' => 'Tblkendaliproses Tglberkasfisikdikirim',
			'tblkendaliproses_tglberkasfisikdikirim_sys' => 'Tblkendaliproses Tglberkasfisikdikirim Sys',
			'tblkendaliproses_status' => 'Tblkendaliproses Status',
			'tblkendaliproses_tglterima' => 'Tblkendaliproses Tglterima',
			'tblpenolakan_id' => 'Tblpenolakan',
			'tblkendaliproses_penolakan' => 'Tblkendaliproses Penolakan',
			'tblkendaliproses_jamlambat' => 'Tblkendaliproses Jamlambat',
			'tblkendaliproses_harilambat' => 'Tblkendaliproses Harilambat',
			'tblkendaliproses_jamlambat_sys' => 'Tblkendaliproses Jamlambat Sys',
			'tblkendaliproses_harilambat_sys' => 'Tblkendaliproses Harilambat Sys',
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

		$criteria->compare('tblkendaliproses_id',$this->tblkendaliproses_id,true);
		$criteria->compare('tblizinpendaftaran_id',$this->tblizinpendaftaran_id,true);
		$criteria->compare('tblkendalibloksistemtugas_id',$this->tblkendalibloksistemtugas_id,true);
		$criteria->compare('tblkendaliproses_tglmulai',$this->tblkendaliproses_tglmulai,true);
		$criteria->compare('tblkendaliproses_tglmulai_sys',$this->tblkendaliproses_tglmulai_sys,true);
		$criteria->compare('tblkendalibloksistem_idasal',$this->tblkendalibloksistem_idasal,true);
		$criteria->compare('tblkendaliproses_tglselesai',$this->tblkendaliproses_tglselesai,true);
		$criteria->compare('tblkendaliproses_tglselesai_sys',$this->tblkendaliproses_tglselesai_sys,true);
		$criteria->compare('tblkendalibloksistem_idkirim',$this->tblkendalibloksistem_idkirim,true);
		$criteria->compare('tblkendaliproses_isparaf',$this->tblkendaliproses_isparaf,true);
		$criteria->compare('tblkendaliproses_catatan',$this->tblkendaliproses_catatan,true);
		$criteria->compare('tblpengguna_id',$this->tblpengguna_id,true);
		$criteria->compare('tblkendaliproses_isberkasfisikdikirim',$this->tblkendaliproses_isberkasfisikdikirim,true);
		$criteria->compare('tblkendaliproses_tglberkasfisikdikirim',$this->tblkendaliproses_tglberkasfisikdikirim,true);
		$criteria->compare('tblkendaliproses_tglberkasfisikdikirim_sys',$this->tblkendaliproses_tglberkasfisikdikirim_sys,true);
		$criteria->compare('tblkendaliproses_status',$this->tblkendaliproses_status,true);
		$criteria->compare('tblkendaliproses_tglterima',$this->tblkendaliproses_tglterima,true);
		$criteria->compare('tblpenolakan_id',$this->tblpenolakan_id);
		$criteria->compare('tblkendaliproses_penolakan',$this->tblkendaliproses_penolakan,true);
		$criteria->compare('tblkendaliproses_jamlambat',$this->tblkendaliproses_jamlambat);
		$criteria->compare('tblkendaliproses_harilambat',$this->tblkendaliproses_harilambat);
		$criteria->compare('tblkendaliproses_jamlambat_sys',$this->tblkendaliproses_jamlambat_sys);
		$criteria->compare('tblkendaliproses_harilambat_sys',$this->tblkendaliproses_harilambat_sys);

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

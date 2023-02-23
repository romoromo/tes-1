<?php

/**
 * This is the model class for table "tblsetoran".
 *
 * The followings are the available columns in table 'tblsetoran':
 * @property integer $tblsetoran_id
 * @property integer $tblobyek_id
 * @property string $tblsetoran_registersetor
 * @property string $tblsetoran_rekeningkode
 * @property string $tblsetoran_uraianrekening
 * @property string $tblsetoran_tglsysinsert
 * @property string $tblsetoran_tglsysedit
 * @property integer $tblsetoran_viasetor
 * @property string $tblsetoran_uraian
 * @property string $tblsetoran_bungasetor
 * @property string $tblsetoran_dendasetor
 * @property string $tblsetoran_jenissetoran
 * @property string $tblsetoran_tglsetor
 * @property double $tblsetoran_totalsetor
 * @property string $tblsetoran_pengguna
 * @property integer $tblsetoran_jenisreferensi
 * @property string $tblsetoran_noreferensi
 * @property string $tblsetoran_obyeknama
 * @property string $tblsetoran_obyekalamat
 * @property string $tblsetoran_ishapus
 * @property string $tblsetoran_istunggakan
 * @property string $tblsetoran_isbayarsendiri
 * @property integer $refbidangusaha_id
 * @property string $tblsetoran_penyetornik
 * @property string $tblsetoran_penyetor
 * @property string $tbltransaksiketetapan_id
 */
class Setoran extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblsetoran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblobyek_id, tblsetoran_viasetor, tblsetoran_jenisreferensi, refbidangusaha_id', 'numerical', 'integerOnly'=>true),
			array('tblsetoran_totalsetor', 'numerical'),
			// array('tblsetoran_registersetor, tblsetoran_pengguna, tblsetoran_obyeknama, tbltransaksiketetapan_id', 'length', 'max'=>20),
			array('tblsetoran_rekeningkode, tblsetoran_uraianrekening', 'length', 'max'=>255),
			array('tblsetoran_uraian', 'length', 'max'=>200),
			array('tblsetoran_bungasetor, tblsetoran_dendasetor', 'length', 'max'=>19),
			array('tblsetoran_jenissetoran', 'length', 'max'=>10),
			array('tblsetoran_noreferensi', 'length', 'max'=>50),
			array('tblsetoran_obyekalamat', 'length', 'max'=>300),
			array('tblsetoran_ishapus, tblsetoran_istunggakan, tblsetoran_isbayarsendiri', 'length', 'max'=>1),
			array('tblsetoran_penyetornik', 'length', 'max'=>30),
			array('tblsetoran_penyetor', 'length', 'max'=>100),
			array('tblsetoran_tglsysinsert, tblsetoran_tglsysedit, tblsetoran_tglsetor', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblsetoran_id, tblobyek_id, tblsetoran_registersetor, tblsetoran_rekeningkode, tblsetoran_uraianrekening, tblsetoran_tglsysinsert, tblsetoran_tglsysedit, tblsetoran_viasetor, tblsetoran_uraian, tblsetoran_bungasetor, tblsetoran_dendasetor, tblsetoran_jenissetoran, tblsetoran_tglsetor, tblsetoran_totalsetor, tblsetoran_pengguna, tblsetoran_jenisreferensi, tblsetoran_noreferensi, tblsetoran_obyeknama, tblsetoran_obyekalamat, tblsetoran_ishapus, tblsetoran_istunggakan, tblsetoran_isbayarsendiri, refbidangusaha_id, tblsetoran_penyetornik, tblsetoran_penyetor, tbltransaksiketetapan_id', 'safe', 'on'=>'search'),
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
			'tblsetoran_id' => 'Tblsetoran',
			'tblobyek_id' => 'Tblobyek',
			'tblsetoran_registersetor' => 'Tblsetoran Registersetor',
			'tblsetoran_rekeningkode' => 'Tblsetoran Rekeningkode',
			'tblsetoran_uraianrekening' => 'Tblsetoran Uraianrekening',
			'tblsetoran_tglsysinsert' => 'Tblsetoran Tglsysinsert',
			'tblsetoran_tglsysedit' => 'Tblsetoran Tglsysedit',
			'tblsetoran_viasetor' => 'Tblsetoran Viasetor',
			'tblsetoran_uraian' => 'Tblsetoran Uraian',
			'tblsetoran_bungasetor' => 'Tblsetoran Bungasetor',
			'tblsetoran_dendasetor' => 'Tblsetoran Dendasetor',
			'tblsetoran_jenissetoran' => 'Tblsetoran Jenissetoran',
			'tblsetoran_tglsetor' => 'Tblsetoran Tglsetor',
			'tblsetoran_totalsetor' => 'Tblsetoran Totalsetor',
			'tblsetoran_pengguna' => 'Tblsetoran Pengguna',
			'tblsetoran_jenisreferensi' => 'Tblsetoran Jenisreferensi',
			'tblsetoran_noreferensi' => 'Tblsetoran Noreferensi',
			'tblsetoran_obyeknama' => 'Tblsetoran Obyeknama',
			'tblsetoran_obyekalamat' => 'Tblsetoran Obyekalamat',
			'tblsetoran_ishapus' => 'Tblsetoran Ishapus',
			'tblsetoran_istunggakan' => 'Tblsetoran Istunggakan',
			'tblsetoran_isbayarsendiri' => 'Tblsetoran Isbayarsendiri',
			'refbidangusaha_id' => 'Refbidangusaha',
			'tblsetoran_penyetornik' => 'Tblsetoran Penyetornik',
			'tblsetoran_penyetor' => 'Tblsetoran Penyetor',
			'tbltransaksiketetapan_id' => 'Tbltransaksiketetapan',
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

		$criteria->compare('tblsetoran_id',$this->tblsetoran_id);
		$criteria->compare('tblobyek_id',$this->tblobyek_id);
		$criteria->compare('tblsetoran_registersetor',$this->tblsetoran_registersetor,true);
		$criteria->compare('tblsetoran_rekeningkode',$this->tblsetoran_rekeningkode,true);
		$criteria->compare('tblsetoran_uraianrekening',$this->tblsetoran_uraianrekening,true);
		$criteria->compare('tblsetoran_tglsysinsert',$this->tblsetoran_tglsysinsert,true);
		$criteria->compare('tblsetoran_tglsysedit',$this->tblsetoran_tglsysedit,true);
		$criteria->compare('tblsetoran_viasetor',$this->tblsetoran_viasetor);
		$criteria->compare('tblsetoran_uraian',$this->tblsetoran_uraian,true);
		$criteria->compare('tblsetoran_bungasetor',$this->tblsetoran_bungasetor,true);
		$criteria->compare('tblsetoran_dendasetor',$this->tblsetoran_dendasetor,true);
		$criteria->compare('tblsetoran_jenissetoran',$this->tblsetoran_jenissetoran,true);
		$criteria->compare('tblsetoran_tglsetor',$this->tblsetoran_tglsetor,true);
		$criteria->compare('tblsetoran_totalsetor',$this->tblsetoran_totalsetor);
		$criteria->compare('tblsetoran_pengguna',$this->tblsetoran_pengguna,true);
		$criteria->compare('tblsetoran_jenisreferensi',$this->tblsetoran_jenisreferensi);
		$criteria->compare('tblsetoran_noreferensi',$this->tblsetoran_noreferensi,true);
		$criteria->compare('tblsetoran_obyeknama',$this->tblsetoran_obyeknama,true);
		$criteria->compare('tblsetoran_obyekalamat',$this->tblsetoran_obyekalamat,true);
		$criteria->compare('tblsetoran_ishapus',$this->tblsetoran_ishapus,true);
		$criteria->compare('tblsetoran_istunggakan',$this->tblsetoran_istunggakan,true);
		$criteria->compare('tblsetoran_isbayarsendiri',$this->tblsetoran_isbayarsendiri,true);
		$criteria->compare('refbidangusaha_id',$this->refbidangusaha_id);
		$criteria->compare('tblsetoran_penyetornik',$this->tblsetoran_penyetornik,true);
		$criteria->compare('tblsetoran_penyetor',$this->tblsetoran_penyetor,true);
		$criteria->compare('tbltransaksiketetapan_id',$this->tbltransaksiketetapan_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Setoran the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

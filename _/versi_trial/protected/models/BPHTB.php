<?php

/**
 * This is the model class for table "tblpendataanbphtb".
 *
 * The followings are the available columns in table 'tblpendataanbphtb':
 * @property integer $tblpendataanbphtb_id
 * @property string $tblsubyek_id
 * @property string $tblpendataanbphtbdetil_nosertifikat
 * @property string $tblpendataanbphtbdetil_nop
 * @property string $tblpendataanbphtb_tgllayanan
 * @property string $tblpendataanbphtb_tglsysinsert
 * @property string $tblpendataanbphtb_tglsysedit
 * @property string $tblpendataanbphtb_pemohonnama
 * @property string $tblpendataanbphtb_pemohonalamat
 * @property integer $refkecamatansubyek_id
 * @property integer $refkelurahansubyek_id
 * @property double $tblpendataanbphtb_luastanah
 * @property double $tblpendataanbphtb_luasbangunan
 * @property double $tblpendataanbphtb_njoptanah
 * @property double $tblpendataanbphtb_njopbangunan
 * @property double $tblpendataanbphtb_njpbb
 * @property double $tblpendataanbphtb_nilaipasar
 * @property double $tblpendataanbphtb_npop
 * @property double $tblpendataanbphtb_npoptkp
 * @property double $tblpendataanbphtb_tarifpersen
 * @property double $tblpendataanbphtb_npopkp
 * @property double $tblpendataanbphtb_pajakterhutang
 * @property integer $refbphtbperolehan_id
 * @property string $tblpendataanbphtb_hapus
 * @property integer $refbphtbketerangan_id
 * @property string $tblpendataanbphtb_catatan
 */
class BPHTB extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblpendataanbphtb';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refkecamatansubyek_id, refkelurahansubyek_id, refbphtbperolehan_id, refbphtbketerangan_id', 'numerical', 'integerOnly'=>true),
			array('tblpendataanbphtb_luastanah, tblpendataanbphtb_luasbangunan, tblpendataanbphtb_njoptanah, tblpendataanbphtb_njopbangunan, tblpendataanbphtb_njpbb, tblpendataanbphtb_nilaipasar, tblpendataanbphtb_npop, tblpendataanbphtb_npoptkp, tblpendataanbphtb_tarifpersen, tblpendataanbphtb_npopkp, tblpendataanbphtb_pajakterhutang', 'numerical'),
			array('tblsubyek_id', 'length', 'max'=>20),
			array('tblpendataanbphtbdetil_nosertifikat, tblpendataanbphtbdetil_nop', 'length', 'max'=>30),
			array('tblpendataanbphtb_pemohonnama', 'length', 'max'=>100),
			array('tblpendataanbphtb_pemohonalamat, tblpendataanbphtb_catatan', 'length', 'max'=>200),
			array('tblpendataanbphtb_hapus', 'length', 'max'=>1),
			array('tblpendataanbphtb_tgllayanan, tblpendataanbphtb_tglsysinsert, tblpendataanbphtb_tglsysedit', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblpendataanbphtb_id, tblsubyek_id, tblpendataanbphtbdetil_nosertifikat, tblpendataanbphtbdetil_nop, tblpendataanbphtb_tgllayanan, tblpendataanbphtb_tglsysinsert, tblpendataanbphtb_tglsysedit, tblpendataanbphtb_pemohonnama, tblpendataanbphtb_pemohonalamat, refkecamatansubyek_id, refkelurahansubyek_id, tblpendataanbphtb_luastanah, tblpendataanbphtb_luasbangunan, tblpendataanbphtb_njoptanah, tblpendataanbphtb_njopbangunan, tblpendataanbphtb_njpbb, tblpendataanbphtb_nilaipasar, tblpendataanbphtb_npop, tblpendataanbphtb_npoptkp, tblpendataanbphtb_tarifpersen, tblpendataanbphtb_npopkp, tblpendataanbphtb_pajakterhutang, refbphtbperolehan_id, tblpendataanbphtb_hapus, refbphtbketerangan_id, tblpendataanbphtb_catatan', 'safe', 'on'=>'search'),
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
			'tblpendataanbphtb_id' => 'Tblpendataanbphtb',
			'tblsubyek_id' => 'Tblsubyek',
			'tblpendataanbphtbdetil_nosertifikat' => 'Tblpendataanbphtbdetil Nosertifikat',
			'tblpendataanbphtbdetil_nop' => 'Tblpendataanbphtbdetil Nop',
			'tblpendataanbphtb_tgllayanan' => 'Tblpendataanbphtb Tgllayanan',
			'tblpendataanbphtb_tglsysinsert' => 'Tblpendataanbphtb Tglsysinsert',
			'tblpendataanbphtb_tglsysedit' => 'Tblpendataanbphtb Tglsysedit',
			'tblpendataanbphtb_pemohonnama' => 'Tblpendataanbphtb Pemohonnama',
			'tblpendataanbphtb_pemohonalamat' => 'Tblpendataanbphtb Pemohonalamat',
			'refkecamatansubyek_id' => 'Refkecamatansubyek',
			'refkelurahansubyek_id' => 'Refkelurahansubyek',
			'tblpendataanbphtb_luastanah' => 'Tblpendataanbphtb Luastanah',
			'tblpendataanbphtb_luasbangunan' => 'Tblpendataanbphtb Luasbangunan',
			'tblpendataanbphtb_njoptanah' => 'Tblpendataanbphtb Njoptanah',
			'tblpendataanbphtb_njopbangunan' => 'Tblpendataanbphtb Njopbangunan',
			'tblpendataanbphtb_njpbb' => 'Tblpendataanbphtb Njpbb',
			'tblpendataanbphtb_nilaipasar' => 'Tblpendataanbphtb Nilaipasar',
			'tblpendataanbphtb_npop' => 'Tblpendataanbphtb Npop',
			'tblpendataanbphtb_npoptkp' => 'Tblpendataanbphtb Npoptkp',
			'tblpendataanbphtb_tarifpersen' => 'Tblpendataanbphtb Tarifpersen',
			'tblpendataanbphtb_npopkp' => 'Tblpendataanbphtb Npopkp',
			'tblpendataanbphtb_pajakterhutang' => 'Tblpendataanbphtb Pajakterhutang',
			'refbphtbperolehan_id' => 'Refbphtbperolehan',
			'tblpendataanbphtb_hapus' => 'Tblpendataanbphtb Hapus',
			'refbphtbketerangan_id' => 'Refbphtbketerangan',
			'tblpendataanbphtb_catatan' => 'Tblpendataanbphtb Catatan',
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

		$criteria->compare('tblpendataanbphtb_id',$this->tblpendataanbphtb_id);
		$criteria->compare('tblsubyek_id',$this->tblsubyek_id,true);
		$criteria->compare('tblpendataanbphtbdetil_nosertifikat',$this->tblpendataanbphtbdetil_nosertifikat,true);
		$criteria->compare('tblpendataanbphtbdetil_nop',$this->tblpendataanbphtbdetil_nop,true);
		$criteria->compare('tblpendataanbphtb_tgllayanan',$this->tblpendataanbphtb_tgllayanan,true);
		$criteria->compare('tblpendataanbphtb_tglsysinsert',$this->tblpendataanbphtb_tglsysinsert,true);
		$criteria->compare('tblpendataanbphtb_tglsysedit',$this->tblpendataanbphtb_tglsysedit,true);
		$criteria->compare('tblpendataanbphtb_pemohonnama',$this->tblpendataanbphtb_pemohonnama,true);
		$criteria->compare('tblpendataanbphtb_pemohonalamat',$this->tblpendataanbphtb_pemohonalamat,true);
		$criteria->compare('refkecamatansubyek_id',$this->refkecamatansubyek_id);
		$criteria->compare('refkelurahansubyek_id',$this->refkelurahansubyek_id);
		$criteria->compare('tblpendataanbphtb_luastanah',$this->tblpendataanbphtb_luastanah);
		$criteria->compare('tblpendataanbphtb_luasbangunan',$this->tblpendataanbphtb_luasbangunan);
		$criteria->compare('tblpendataanbphtb_njoptanah',$this->tblpendataanbphtb_njoptanah);
		$criteria->compare('tblpendataanbphtb_njopbangunan',$this->tblpendataanbphtb_njopbangunan);
		$criteria->compare('tblpendataanbphtb_njpbb',$this->tblpendataanbphtb_njpbb);
		$criteria->compare('tblpendataanbphtb_nilaipasar',$this->tblpendataanbphtb_nilaipasar);
		$criteria->compare('tblpendataanbphtb_npop',$this->tblpendataanbphtb_npop);
		$criteria->compare('tblpendataanbphtb_npoptkp',$this->tblpendataanbphtb_npoptkp);
		$criteria->compare('tblpendataanbphtb_tarifpersen',$this->tblpendataanbphtb_tarifpersen);
		$criteria->compare('tblpendataanbphtb_npopkp',$this->tblpendataanbphtb_npopkp);
		$criteria->compare('tblpendataanbphtb_pajakterhutang',$this->tblpendataanbphtb_pajakterhutang);
		$criteria->compare('refbphtbperolehan_id',$this->refbphtbperolehan_id);
		$criteria->compare('tblpendataanbphtb_hapus',$this->tblpendataanbphtb_hapus,true);
		$criteria->compare('refbphtbketerangan_id',$this->refbphtbketerangan_id);
		$criteria->compare('tblpendataanbphtb_catatan',$this->tblpendataanbphtb_catatan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BPHTB the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

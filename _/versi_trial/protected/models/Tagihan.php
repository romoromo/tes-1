<?php

/**
 * This is the model class for table "tbltagihan".
 *
 * The followings are the available columns in table 'tbltagihan':
 * @property integer $tbltagihan_id
 * @property integer $tblobyek_id
 * @property string $tbltransaksiketetapan_id
 * @property string $tbltagihan_namatabel
 * @property string $tbltagihan_jenisketetapan
 * @property string $tbltagihan_rekeningkode
 * @property string $tbltagihan_uraianrekening
 * @property string $tbltagihan_tglsysinsert
 * @property string $tbltagihan_tglsysedit
 * @property string $tbltagihan_tgljatuhtempoterakhir
 * @property integer $tbltagihan_tagihanterakhirke
 * @property string $tbltagihan_bungatagihterakhir
 * @property string $tbltagihan_dendatagihterakhir
 * @property double $tbltagihan_totaltagihterakhir
 * @property string $tbltagihan_tgltagihterakhir
 * @property string $tbltagihan_pengguna
 * @property string $tbltagihan_obyeknama
 * @property string $tbltagihan_obyekalamat
 * @property string $tbltagihan_ishapus
 * @property string $tbltagihan_istunggakan
 * @property string $tbltagihan_isbayar
 */
class Tagihan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbltagihan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblobyek_id, tbltagihan_tagihanterakhirke', 'numerical', 'integerOnly'=>true),
			array('tbltagihan_totaltagihterakhir', 'numerical'),
			array('tbltransaksiketetapan_id, tbltagihan_pengguna, tbltagihan_obyeknama', 'length', 'max'=>20),
			array('tbltagihan_namatabel', 'length', 'max'=>30),
			array('tbltagihan_jenisketetapan', 'length', 'max'=>10),
			array('tbltagihan_rekeningkode, tbltagihan_uraianrekening', 'length', 'max'=>255),
			array('tbltagihan_bungatagihterakhir, tbltagihan_dendatagihterakhir', 'length', 'max'=>19),
			array('tbltagihan_obyekalamat', 'length', 'max'=>300),
			array('tbltagihan_ishapus, tbltagihan_istunggakan, tbltagihan_isbayar', 'length', 'max'=>1),
			array('tbltagihan_tglsysinsert, tbltagihan_tglsysedit, tbltagihan_tgljatuhtempoterakhir, tbltagihan_tgltagihterakhir', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tbltagihan_id, tblobyek_id, tbltransaksiketetapan_id, tbltagihan_namatabel, tbltagihan_jenisketetapan, tbltagihan_rekeningkode, tbltagihan_uraianrekening, tbltagihan_tglsysinsert, tbltagihan_tglsysedit, tbltagihan_tgljatuhtempoterakhir, tbltagihan_tagihanterakhirke, tbltagihan_bungatagihterakhir, tbltagihan_dendatagihterakhir, tbltagihan_totaltagihterakhir, tbltagihan_tgltagihterakhir, tbltagihan_pengguna, tbltagihan_obyeknama, tbltagihan_obyekalamat, tbltagihan_ishapus, tbltagihan_istunggakan, tbltagihan_isbayar', 'safe', 'on'=>'search'),
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
			'tbltagihan_id' => 'Tbltagihan',
			'tblobyek_id' => 'Tblobyek',
			'tbltransaksiketetapan_id' => 'Tbltransaksiketetapan',
			'tbltagihan_namatabel' => 'Tbltagihan Namatabel',
			'tbltagihan_jenisketetapan' => 'Tbltagihan Jenisketetapan',
			'tbltagihan_rekeningkode' => 'Tbltagihan Rekeningkode',
			'tbltagihan_uraianrekening' => 'Tbltagihan Uraianrekening',
			'tbltagihan_tglsysinsert' => 'Tbltagihan Tglsysinsert',
			'tbltagihan_tglsysedit' => 'Tbltagihan Tglsysedit',
			'tbltagihan_tgljatuhtempoterakhir' => 'Tbltagihan Tgljatuhtempoterakhir',
			'tbltagihan_tagihanterakhirke' => 'Tbltagihan Tagihanterakhirke',
			'tbltagihan_bungatagihterakhir' => 'Tbltagihan Bungatagihterakhir',
			'tbltagihan_dendatagihterakhir' => 'Tbltagihan Dendatagihterakhir',
			'tbltagihan_totaltagihterakhir' => 'Tbltagihan Totaltagihterakhir',
			'tbltagihan_tgltagihterakhir' => 'Tbltagihan Tgltagihterakhir',
			'tbltagihan_pengguna' => 'Tbltagihan Pengguna',
			'tbltagihan_obyeknama' => 'Tbltagihan Obyeknama',
			'tbltagihan_obyekalamat' => 'Tbltagihan Obyekalamat',
			'tbltagihan_ishapus' => 'Tbltagihan Ishapus',
			'tbltagihan_istunggakan' => 'Tbltagihan Istunggakan',
			'tbltagihan_isbayar' => 'Tbltagihan Isbayar',
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

		$criteria->compare('tbltagihan_id',$this->tbltagihan_id);
		$criteria->compare('tblobyek_id',$this->tblobyek_id);
		$criteria->compare('tbltransaksiketetapan_id',$this->tbltransaksiketetapan_id,true);
		$criteria->compare('tbltagihan_namatabel',$this->tbltagihan_namatabel,true);
		$criteria->compare('tbltagihan_jenisketetapan',$this->tbltagihan_jenisketetapan,true);
		$criteria->compare('tbltagihan_rekeningkode',$this->tbltagihan_rekeningkode,true);
		$criteria->compare('tbltagihan_uraianrekening',$this->tbltagihan_uraianrekening,true);
		$criteria->compare('tbltagihan_tglsysinsert',$this->tbltagihan_tglsysinsert,true);
		$criteria->compare('tbltagihan_tglsysedit',$this->tbltagihan_tglsysedit,true);
		$criteria->compare('tbltagihan_tgljatuhtempoterakhir',$this->tbltagihan_tgljatuhtempoterakhir,true);
		$criteria->compare('tbltagihan_tagihanterakhirke',$this->tbltagihan_tagihanterakhirke);
		$criteria->compare('tbltagihan_bungatagihterakhir',$this->tbltagihan_bungatagihterakhir,true);
		$criteria->compare('tbltagihan_dendatagihterakhir',$this->tbltagihan_dendatagihterakhir,true);
		$criteria->compare('tbltagihan_totaltagihterakhir',$this->tbltagihan_totaltagihterakhir);
		$criteria->compare('tbltagihan_tgltagihterakhir',$this->tbltagihan_tgltagihterakhir,true);
		$criteria->compare('tbltagihan_pengguna',$this->tbltagihan_pengguna,true);
		$criteria->compare('tbltagihan_obyeknama',$this->tbltagihan_obyeknama,true);
		$criteria->compare('tbltagihan_obyekalamat',$this->tbltagihan_obyekalamat,true);
		$criteria->compare('tbltagihan_ishapus',$this->tbltagihan_ishapus,true);
		$criteria->compare('tbltagihan_istunggakan',$this->tbltagihan_istunggakan,true);
		$criteria->compare('tbltagihan_isbayar',$this->tbltagihan_isbayar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tagihan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

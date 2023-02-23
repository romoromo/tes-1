<?php

/**
 * This is the model class for table "tbltagihandetail".
 *
 * The followings are the available columns in table 'tbltagihandetail':
 * @property integer $tbltagihandetail_id
 * @property integer $tbltagihan_id
 * @property integer $tblobyek_id
 * @property string $tbltransaksiketetapan_id
 * @property string $tbltagihandetail_namatabel
 * @property string $tbltagihandetail_jenisketetapan
 * @property string $tbltagihandetail_rekeningkode
 * @property string $tbltagihandetail_uraianrekening
 * @property string $tbltagihandetail_tglsysinsert
 * @property string $tbltagihandetail_tglsysedit
 * @property string $tbltagihandetail_tgljatuhtempo
 * @property integer $tbltagihandetail_tagihanke
 * @property string $tbltagihandetail_bungatagih
 * @property string $tbltagihandetail_dendatagih
 * @property double $tbltagihandetail_totaltagih
 * @property string $tbltagihandetail_tgltagih
 * @property string $tbltagihandetail_pengguna
 * @property string $tbltagihandetail_ishapus
 * @property string $tbltagihandetail_istunggakan
 * @property string $tbltagihandetail_isbayar
 * @property string $tbltagihandetail_isterakhir
 */
class TagihanDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbltagihandetail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbltagihan_id, tblobyek_id, tbltagihandetail_tagihanke', 'numerical', 'integerOnly'=>true),
			array('tbltagihandetail_totaltagih', 'numerical'),
			array('tbltransaksiketetapan_id, tbltagihandetail_pengguna', 'length', 'max'=>20),
			array('tbltagihandetail_namatabel', 'length', 'max'=>30),
			array('tbltagihandetail_jenisketetapan', 'length', 'max'=>10),
			array('tbltagihandetail_rekeningkode, tbltagihandetail_uraianrekening', 'length', 'max'=>255),
			array('tbltagihandetail_bungatagih, tbltagihandetail_dendatagih', 'length', 'max'=>19),
			array('tbltagihandetail_ishapus, tbltagihandetail_istunggakan, tbltagihandetail_isbayar', 'length', 'max'=>1),
			array('tbltagihandetail_tglsysinsert, tbltagihandetail_tglsysedit, tbltagihandetail_tgljatuhtempo, tbltagihandetail_tgltagih, tbltagihandetail_isterakhir', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tbltagihandetail_id, tbltagihan_id, tblobyek_id, tbltransaksiketetapan_id, tbltagihandetail_namatabel, tbltagihandetail_jenisketetapan, tbltagihandetail_rekeningkode, tbltagihandetail_uraianrekening, tbltagihandetail_tglsysinsert, tbltagihandetail_tglsysedit, tbltagihandetail_tgljatuhtempo, tbltagihandetail_tagihanke, tbltagihandetail_bungatagih, tbltagihandetail_dendatagih, tbltagihandetail_totaltagih, tbltagihandetail_tgltagih, tbltagihandetail_pengguna, tbltagihandetail_ishapus, tbltagihandetail_istunggakan, tbltagihandetail_isbayar, tbltagihandetail_isterakhir', 'safe', 'on'=>'search'),
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
			'tbltagihandetail_id' => 'Tbltagihandetail',
			'tbltagihan_id' => 'Tbltagihan',
			'tblobyek_id' => 'Tblobyek',
			'tbltransaksiketetapan_id' => 'Tbltransaksiketetapan',
			'tbltagihandetail_namatabel' => 'Tbltagihandetail Namatabel',
			'tbltagihandetail_jenisketetapan' => 'Tbltagihandetail Jenisketetapan',
			'tbltagihandetail_rekeningkode' => 'Tbltagihandetail Rekeningkode',
			'tbltagihandetail_uraianrekening' => 'Tbltagihandetail Uraianrekening',
			'tbltagihandetail_tglsysinsert' => 'Tbltagihandetail Tglsysinsert',
			'tbltagihandetail_tglsysedit' => 'Tbltagihandetail Tglsysedit',
			'tbltagihandetail_tgljatuhtempo' => 'Tbltagihandetail Tgljatuhtempo',
			'tbltagihandetail_tagihanke' => 'Tbltagihandetail Tagihanke',
			'tbltagihandetail_bungatagih' => 'Tbltagihandetail Bungatagih',
			'tbltagihandetail_dendatagih' => 'Tbltagihandetail Dendatagih',
			'tbltagihandetail_totaltagih' => 'Tbltagihandetail Totaltagih',
			'tbltagihandetail_tgltagih' => 'Tbltagihandetail Tgltagih',
			'tbltagihandetail_pengguna' => 'Tbltagihandetail Pengguna',
			'tbltagihandetail_ishapus' => 'Tbltagihandetail Ishapus',
			'tbltagihandetail_istunggakan' => 'Tbltagihandetail Istunggakan',
			'tbltagihandetail_isbayar' => 'Tbltagihandetail Isbayar',
			'tbltagihandetail_isterakhir' => 'Tbltagihandetail Isterakhir',
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

		$criteria->compare('tbltagihandetail_id',$this->tbltagihandetail_id);
		$criteria->compare('tbltagihan_id',$this->tbltagihan_id);
		$criteria->compare('tblobyek_id',$this->tblobyek_id);
		$criteria->compare('tbltransaksiketetapan_id',$this->tbltransaksiketetapan_id,true);
		$criteria->compare('tbltagihandetail_namatabel',$this->tbltagihandetail_namatabel,true);
		$criteria->compare('tbltagihandetail_jenisketetapan',$this->tbltagihandetail_jenisketetapan,true);
		$criteria->compare('tbltagihandetail_rekeningkode',$this->tbltagihandetail_rekeningkode,true);
		$criteria->compare('tbltagihandetail_uraianrekening',$this->tbltagihandetail_uraianrekening,true);
		$criteria->compare('tbltagihandetail_tglsysinsert',$this->tbltagihandetail_tglsysinsert,true);
		$criteria->compare('tbltagihandetail_tglsysedit',$this->tbltagihandetail_tglsysedit,true);
		$criteria->compare('tbltagihandetail_tgljatuhtempo',$this->tbltagihandetail_tgljatuhtempo,true);
		$criteria->compare('tbltagihandetail_tagihanke',$this->tbltagihandetail_tagihanke);
		$criteria->compare('tbltagihandetail_bungatagih',$this->tbltagihandetail_bungatagih,true);
		$criteria->compare('tbltagihandetail_dendatagih',$this->tbltagihandetail_dendatagih,true);
		$criteria->compare('tbltagihandetail_totaltagih',$this->tbltagihandetail_totaltagih);
		$criteria->compare('tbltagihandetail_tgltagih',$this->tbltagihandetail_tgltagih,true);
		$criteria->compare('tbltagihandetail_pengguna',$this->tbltagihandetail_pengguna,true);
		$criteria->compare('tbltagihandetail_ishapus',$this->tbltagihandetail_ishapus,true);
		$criteria->compare('tbltagihandetail_istunggakan',$this->tbltagihandetail_istunggakan,true);
		$criteria->compare('tbltagihandetail_isbayar',$this->tbltagihandetail_isbayar,true);
		$criteria->compare('tbltagihandetail_isterakhir',$this->tbltagihandetail_isterakhir,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TagihanDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "tpajakhotel".
 *
 * The followings are the available columns in table 'tpajakhotel':
 * @property string $tpajakhotel_id
 * @property string $tnpwpddaftar_id
 * @property string $tnpwpddaftar_npwpd
 * @property string $tpajakhotel_nomor
 * @property string $tpajakhotel_mspajak
 * @property integer $tpajakhotel_tahunpajak
 * @property string $tpajakhotel_tglditerima
 * @property string $tpajakhotel_isubah
 * @property string $tpajakhotel_omzetkamar
 * @property string $tpajakhotel_omzetpenunjang
 * @property string $tpajakhotel_omzetkos
 * @property string $tpajakhotel_omzetjumlah
 * @property string $tpajakhotel_service
 * @property string $tpajakhotel_jmltotal
 * @property string $tpajakhotel_tarif
 * @property string $tpajakhotel_dibayar
 * @property string $tpajakhotel_tglbuat
 * @property string $tpajakhotel_tglteliti
 * @property string $tpajakhotel_namateliti
 * @property string $tpajakhotel_nipteliti
 * @property string $tpajakhotel_nosptpd
 * @property string $tpajakhotel_tglsptpd
 * @property string $tpajakhotel_penerima
 * @property integer $refgolhotel_id
 * @property string $tpajakhotel_istelp
 * @property string $tpajakhotel_omzettelp
 * @property string $tpajakhotel_isinternet
 * @property string $tpajakhotel_omzetinternet
 * @property string $tpajakhotel_isfotocopy
 * @property string $tpajakhotel_omzetfotocopy
 * @property string $tpajakhotel_islaundry
 * @property string $tpajakhotel_omzetlaundry
 * @property string $tpajakhotel_iswisata
 * @property string $tpajakhotel_omzetwisata
 * @property string $tpajakhotel_isfood
 * @property string $tpajakhotel_omzetfood
 * @property string $tpajakhotel_issewaruang
 * @property string $tpajakhotel_omzetsewaruang
 * @property string $tpajakhotel_issport
 * @property string $tpajakhotel_omzetsport
 * @property string $tpajakhotel_ishiburan
 * @property string $tpajakhotel_omzethiburan
 * @property string $tpajakhotel_islain
 * @property string $tpajakhotel_omzetlain
 * @property string $tpajakhotel_jumlahfas
 * @property integer $tblpengguna_id
 * @property string $tpajakhotel_tglentry
 * @property string $tpajakhotel_tglupdate
 */
class PajakHotel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tpajakhotel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tpajakhotel_tahunpajak, refgolhotel_id, tblpengguna_id', 'numerical', 'integerOnly'=>true),
			array('tnpwpddaftar_id', 'length', 'max'=>19),
			array('tnpwpddaftar_npwpd, tpajakhotel_nomor, tpajakhotel_mspajak, tpajakhotel_namateliti, tpajakhotel_nipteliti, tpajakhotel_nosptpd, tpajakhotel_penerima', 'length', 'max'=>255),
			array('tpajakhotel_isubah, tpajakhotel_istelp, tpajakhotel_isinternet, tpajakhotel_isfotocopy, tpajakhotel_islaundry, tpajakhotel_iswisata, tpajakhotel_isfood, tpajakhotel_issewaruang, tpajakhotel_issport, tpajakhotel_ishiburan, tpajakhotel_islain', 'length', 'max'=>1),
			array('tpajakhotel_omzetkamar, tpajakhotel_omzetpenunjang, tpajakhotel_omzetkos, tpajakhotel_omzetjumlah, tpajakhotel_service, tpajakhotel_jmltotal, tpajakhotel_tarif, tpajakhotel_dibayar, tpajakhotel_omzettelp, tpajakhotel_omzetinternet, tpajakhotel_omzetfotocopy, tpajakhotel_omzetlaundry, tpajakhotel_omzetwisata, tpajakhotel_omzetfood, tpajakhotel_omzetsewaruang, tpajakhotel_omzetsport, tpajakhotel_omzethiburan, tpajakhotel_omzetlain, tpajakhotel_jumlahfas', 'length', 'max'=>25),
			array('tpajakhotel_tglditerima, tpajakhotel_tglbuat, tpajakhotel_tglteliti, tpajakhotel_tglsptpd, tpajakhotel_tglentry, tpajakhotel_tglupdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tpajakhotel_id, tnpwpddaftar_id, tnpwpddaftar_npwpd, tpajakhotel_nomor, tpajakhotel_mspajak, tpajakhotel_tahunpajak, tpajakhotel_tglditerima, tpajakhotel_isubah, tpajakhotel_omzetkamar, tpajakhotel_omzetpenunjang, tpajakhotel_omzetkos, tpajakhotel_omzetjumlah, tpajakhotel_service, tpajakhotel_jmltotal, tpajakhotel_tarif, tpajakhotel_dibayar, tpajakhotel_tglbuat, tpajakhotel_tglteliti, tpajakhotel_namateliti, tpajakhotel_nipteliti, tpajakhotel_nosptpd, tpajakhotel_tglsptpd, tpajakhotel_penerima, refgolhotel_id, tpajakhotel_istelp, tpajakhotel_omzettelp, tpajakhotel_isinternet, tpajakhotel_omzetinternet, tpajakhotel_isfotocopy, tpajakhotel_omzetfotocopy, tpajakhotel_islaundry, tpajakhotel_omzetlaundry, tpajakhotel_iswisata, tpajakhotel_omzetwisata, tpajakhotel_isfood, tpajakhotel_omzetfood, tpajakhotel_issewaruang, tpajakhotel_omzetsewaruang, tpajakhotel_issport, tpajakhotel_omzetsport, tpajakhotel_ishiburan, tpajakhotel_omzethiburan, tpajakhotel_islain, tpajakhotel_omzetlain, tpajakhotel_jumlahfas, tblpengguna_id, tpajakhotel_tglentry, tpajakhotel_tglupdate', 'safe', 'on'=>'search'),
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
			'tpajakhotel_id' => 'Tpajakhotel',
			'tnpwpddaftar_id' => 'Tnpwpddaftar',
			'tnpwpddaftar_npwpd' => 'Tnpwpddaftar Npwpd',
			'tpajakhotel_nomor' => 'Tpajakhotel Nomor',
			'tpajakhotel_mspajak' => 'Tpajakhotel Mspajak',
			'tpajakhotel_tahunpajak' => 'Tpajakhotel Tahunpajak',
			'tpajakhotel_tglditerima' => 'Tpajakhotel Tglditerima',
			'tpajakhotel_isubah' => 'Tpajakhotel Isubah',
			'tpajakhotel_omzetkamar' => 'Tpajakhotel Omzetkamar',
			'tpajakhotel_omzetpenunjang' => 'Tpajakhotel Omzetpenunjang',
			'tpajakhotel_omzetkos' => 'Tpajakhotel Omzetkos',
			'tpajakhotel_omzetjumlah' => 'Tpajakhotel Omzetjumlah',
			'tpajakhotel_service' => 'Tpajakhotel Service',
			'tpajakhotel_jmltotal' => 'Tpajakhotel Jmltotal',
			'tpajakhotel_tarif' => 'Tpajakhotel Tarif',
			'tpajakhotel_dibayar' => 'Tpajakhotel Dibayar',
			'tpajakhotel_tglbuat' => 'Tpajakhotel Tglbuat',
			'tpajakhotel_tglteliti' => 'Tpajakhotel Tglteliti',
			'tpajakhotel_namateliti' => 'Tpajakhotel Namateliti',
			'tpajakhotel_nipteliti' => 'Tpajakhotel Nipteliti',
			'tpajakhotel_nosptpd' => 'Tpajakhotel Nosptpd',
			'tpajakhotel_tglsptpd' => 'Tpajakhotel Tglsptpd',
			'tpajakhotel_penerima' => 'Tpajakhotel Penerima',
			'refgolhotel_id' => 'Refgolhotel',
			'tpajakhotel_istelp' => 'Tpajakhotel Istelp',
			'tpajakhotel_omzettelp' => 'Tpajakhotel Omzettelp',
			'tpajakhotel_isinternet' => 'Tpajakhotel Isinternet',
			'tpajakhotel_omzetinternet' => 'Tpajakhotel Omzetinternet',
			'tpajakhotel_isfotocopy' => 'Tpajakhotel Isfotocopy',
			'tpajakhotel_omzetfotocopy' => 'Tpajakhotel Omzetfotocopy',
			'tpajakhotel_islaundry' => 'Tpajakhotel Islaundry',
			'tpajakhotel_omzetlaundry' => 'Tpajakhotel Omzetlaundry',
			'tpajakhotel_iswisata' => 'Tpajakhotel Iswisata',
			'tpajakhotel_omzetwisata' => 'Tpajakhotel Omzetwisata',
			'tpajakhotel_isfood' => 'Tpajakhotel Isfood',
			'tpajakhotel_omzetfood' => 'Tpajakhotel Omzetfood',
			'tpajakhotel_issewaruang' => 'Tpajakhotel Issewaruang',
			'tpajakhotel_omzetsewaruang' => 'Tpajakhotel Omzetsewaruang',
			'tpajakhotel_issport' => 'Tpajakhotel Issport',
			'tpajakhotel_omzetsport' => 'Tpajakhotel Omzetsport',
			'tpajakhotel_ishiburan' => 'Tpajakhotel Ishiburan',
			'tpajakhotel_omzethiburan' => 'Tpajakhotel Omzethiburan',
			'tpajakhotel_islain' => 'Tpajakhotel Islain',
			'tpajakhotel_omzetlain' => 'Tpajakhotel Omzetlain',
			'tpajakhotel_jumlahfas' => 'Tpajakhotel Jumlahfas',
			'tblpengguna_id' => 'Tblpengguna',
			'tpajakhotel_tglentry' => 'Tpajakhotel Tglentry',
			'tpajakhotel_tglupdate' => 'Tpajakhotel Tglupdate',
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

		$criteria->compare('tpajakhotel_id',$this->tpajakhotel_id,true);
		$criteria->compare('tnpwpddaftar_id',$this->tnpwpddaftar_id,true);
		$criteria->compare('tnpwpddaftar_npwpd',$this->tnpwpddaftar_npwpd,true);
		$criteria->compare('tpajakhotel_nomor',$this->tpajakhotel_nomor,true);
		$criteria->compare('tpajakhotel_mspajak',$this->tpajakhotel_mspajak,true);
		$criteria->compare('tpajakhotel_tahunpajak',$this->tpajakhotel_tahunpajak);
		$criteria->compare('tpajakhotel_tglditerima',$this->tpajakhotel_tglditerima,true);
		$criteria->compare('tpajakhotel_isubah',$this->tpajakhotel_isubah,true);
		$criteria->compare('tpajakhotel_omzetkamar',$this->tpajakhotel_omzetkamar,true);
		$criteria->compare('tpajakhotel_omzetpenunjang',$this->tpajakhotel_omzetpenunjang,true);
		$criteria->compare('tpajakhotel_omzetkos',$this->tpajakhotel_omzetkos,true);
		$criteria->compare('tpajakhotel_omzetjumlah',$this->tpajakhotel_omzetjumlah,true);
		$criteria->compare('tpajakhotel_service',$this->tpajakhotel_service,true);
		$criteria->compare('tpajakhotel_jmltotal',$this->tpajakhotel_jmltotal,true);
		$criteria->compare('tpajakhotel_tarif',$this->tpajakhotel_tarif,true);
		$criteria->compare('tpajakhotel_dibayar',$this->tpajakhotel_dibayar,true);
		$criteria->compare('tpajakhotel_tglbuat',$this->tpajakhotel_tglbuat,true);
		$criteria->compare('tpajakhotel_tglteliti',$this->tpajakhotel_tglteliti,true);
		$criteria->compare('tpajakhotel_namateliti',$this->tpajakhotel_namateliti,true);
		$criteria->compare('tpajakhotel_nipteliti',$this->tpajakhotel_nipteliti,true);
		$criteria->compare('tpajakhotel_nosptpd',$this->tpajakhotel_nosptpd,true);
		$criteria->compare('tpajakhotel_tglsptpd',$this->tpajakhotel_tglsptpd,true);
		$criteria->compare('tpajakhotel_penerima',$this->tpajakhotel_penerima,true);
		$criteria->compare('refgolhotel_id',$this->refgolhotel_id);
		$criteria->compare('tpajakhotel_istelp',$this->tpajakhotel_istelp,true);
		$criteria->compare('tpajakhotel_omzettelp',$this->tpajakhotel_omzettelp,true);
		$criteria->compare('tpajakhotel_isinternet',$this->tpajakhotel_isinternet,true);
		$criteria->compare('tpajakhotel_omzetinternet',$this->tpajakhotel_omzetinternet,true);
		$criteria->compare('tpajakhotel_isfotocopy',$this->tpajakhotel_isfotocopy,true);
		$criteria->compare('tpajakhotel_omzetfotocopy',$this->tpajakhotel_omzetfotocopy,true);
		$criteria->compare('tpajakhotel_islaundry',$this->tpajakhotel_islaundry,true);
		$criteria->compare('tpajakhotel_omzetlaundry',$this->tpajakhotel_omzetlaundry,true);
		$criteria->compare('tpajakhotel_iswisata',$this->tpajakhotel_iswisata,true);
		$criteria->compare('tpajakhotel_omzetwisata',$this->tpajakhotel_omzetwisata,true);
		$criteria->compare('tpajakhotel_isfood',$this->tpajakhotel_isfood,true);
		$criteria->compare('tpajakhotel_omzetfood',$this->tpajakhotel_omzetfood,true);
		$criteria->compare('tpajakhotel_issewaruang',$this->tpajakhotel_issewaruang,true);
		$criteria->compare('tpajakhotel_omzetsewaruang',$this->tpajakhotel_omzetsewaruang,true);
		$criteria->compare('tpajakhotel_issport',$this->tpajakhotel_issport,true);
		$criteria->compare('tpajakhotel_omzetsport',$this->tpajakhotel_omzetsport,true);
		$criteria->compare('tpajakhotel_ishiburan',$this->tpajakhotel_ishiburan,true);
		$criteria->compare('tpajakhotel_omzethiburan',$this->tpajakhotel_omzethiburan,true);
		$criteria->compare('tpajakhotel_islain',$this->tpajakhotel_islain,true);
		$criteria->compare('tpajakhotel_omzetlain',$this->tpajakhotel_omzetlain,true);
		$criteria->compare('tpajakhotel_jumlahfas',$this->tpajakhotel_jumlahfas,true);
		$criteria->compare('tblpengguna_id',$this->tblpengguna_id);
		$criteria->compare('tpajakhotel_tglentry',$this->tpajakhotel_tglentry,true);
		$criteria->compare('tpajakhotel_tglupdate',$this->tpajakhotel_tglupdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PajakHotel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

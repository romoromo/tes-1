<?php

/**
 * This is the model class for table "TNPWPD".
 *
 * The followings are the available columns in table 'TNPWPD':
 * @property string $TNPWPD_id
 * @property string $tblsubyek_id
 * @property integer $TNPWPD_nomorsptpd
 * @property string $TNPWPD_nama
 * @property string $TNPWPD_jenis
 * @property string $TNPWPD_golongan
 * @property string $TNPWPD_nopok
 * @property integer $refkecamatan_id
 * @property integer $refkelurahan_id
 * @property string $TNPWPD_alamat
 * @property string $TNPWPD_kodepos
 * @property string $TNPWPD_telpon
 * @property string $TNPWPD_pengukuhantgl
 * @property string $TNPWPD_pengukuhanno
 * @property string $TNPWPD_npwpd
 * @property string $TNPWPD_tglsysinsert
 * @property string $TNPWPD_tglsysedit
 * @property integer $tblpengguna_id
 * @property string $TNPWPD_hapus
 * @property string $TNPWPD_tgldaftar
 * @property string $TNPWPD_tglbataskirim
 * @property string $TNPWPD_alamatpenerima
 * @property string $tblmasterrekening_id
 * @property string $TNPWPD_isaktif
 * @property string $TNPWPD_ispengukuhan
 */
class Obyek extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TNPWPD';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	/*public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TNPWPD_nomorsptpd, TNPWPD_tglsysinsert', 'required'),
			array('TNPWPD_nomorsptpd, refkecamatan_id, refkelurahan_id, tblpengguna_id', 'numerical', 'integerOnly'=>true),
			array('tblsubyek_id', 'length', 'max'=>19),
			array('TNPWPD_nama', 'length', 'max'=>125),
			array('TNPWPD_jenis', 'length', 'max'=>9),
			array('TNPWPD_golongan', 'length', 'max'=>11),
			array('TNPWPD_nopok', 'length', 'max'=>7),
			array('TNPWPD_alamat', 'length', 'max'=>225),
			array('TNPWPD_kodepos', 'length', 'max'=>18),
			array('TNPWPD_telpon', 'length', 'max'=>30),
			array('TNPWPD_pengukuhanno, TNPWPD_npwpd', 'length', 'max'=>50),
			array('TNPWPD_hapus, TNPWPD_isaktif, TNPWPD_ispengukuhan', 'length', 'max'=>1),
			array('TNPWPD_alamatpenerima', 'length', 'max'=>250),
			array('tblmasterrekening_id', 'length', 'max'=>10),
			array('TNPWPD_pengukuhantgl, TNPWPD_tgldaftar, TNPWPD_tglbataskirim', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TNPWPD_id, tblsubyek_id, TNPWPD_nomorsptpd, TNPWPD_nama, TNPWPD_jenis, TNPWPD_golongan, TNPWPD_nopok, refkecamatan_id, refkelurahan_id, TNPWPD_alamat, TNPWPD_kodepos, TNPWPD_telpon, TNPWPD_pengukuhantgl, TNPWPD_pengukuhanno, TNPWPD_npwpd, TNPWPD_tglsysinsert, TNPWPD_tglsysedit, tblpengguna_id, TNPWPD_hapus, TNPWPD_tgldaftar, TNPWPD_tglbataskirim, TNPWPD_alamatpenerima, tblmasterrekening_id, TNPWPD_isaktif, TNPWPD_ispengukuhan', 'safe', 'on'=>'search'),
		);
	}*/

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
	/*public function attributeLabels()
	{
		return array(
			'TNPWPD_id' => 'Tblobyek',
			'tblsubyek_id' => 'Tblsubyek',
			'TNPWPD_nomorsptpd' => 'Tblobyek Nomorsptpd',
			'TNPWPD_nama' => 'Tblobyek Nama',
			'TNPWPD_jenis' => 'Tblobyek Jenis',
			'TNPWPD_golongan' => 'Tblobyek Golongan',
			'TNPWPD_nopok' => 'Tblobyek Nopok',
			'refkecamatan_id' => 'Refkecamatan',
			'refkelurahan_id' => 'Refkelurahan',
			'TNPWPD_alamat' => 'Tblobyek Alamat',
			'TNPWPD_kodepos' => 'Tblobyek Kodepos',
			'TNPWPD_telpon' => 'Tblobyek Telpon',
			'TNPWPD_pengukuhantgl' => 'Tblobyek Pengukuhantgl',
			'TNPWPD_pengukuhanno' => 'Tblobyek Pengukuhanno',
			'TNPWPD_npwpd' => 'Tblobyek Npwpd',
			'TNPWPD_tglsysinsert' => 'Tblobyek Tglsysinsert',
			'TNPWPD_tglsysedit' => 'Tblobyek Tglsysedit',
			'tblpengguna_id' => 'Tblpengguna',
			'TNPWPD_hapus' => 'Tblobyek Hapus',
			'TNPWPD_tgldaftar' => 'Tblobyek Tgldaftar',
			'TNPWPD_tglbataskirim' => 'Tblobyek Tglbataskirim',
			'TNPWPD_alamatpenerima' => 'Tblobyek Alamatpenerima',
			'tblmasterrekening_id' => 'Tblmasterrekening',
			'TNPWPD_isaktif' => 'Tblobyek Isaktif',
			'TNPWPD_ispengukuhan' => 'Tblobyek Ispengukuhan',
		);
	}*/

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
	/*public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('TNPWPD_id',$this->TNPWPD_id,true);
		$criteria->compare('tblsubyek_id',$this->tblsubyek_id,true);
		$criteria->compare('TNPWPD_nomorsptpd',$this->TNPWPD_nomorsptpd);
		$criteria->compare('TNPWPD_nama',$this->TNPWPD_nama,true);
		$criteria->compare('TNPWPD_jenis',$this->TNPWPD_jenis,true);
		$criteria->compare('TNPWPD_golongan',$this->TNPWPD_golongan,true);
		$criteria->compare('TNPWPD_nopok',$this->TNPWPD_nopok,true);
		$criteria->compare('refkecamatan_id',$this->refkecamatan_id);
		$criteria->compare('refkelurahan_id',$this->refkelurahan_id);
		$criteria->compare('TNPWPD_alamat',$this->TNPWPD_alamat,true);
		$criteria->compare('TNPWPD_kodepos',$this->TNPWPD_kodepos,true);
		$criteria->compare('TNPWPD_telpon',$this->TNPWPD_telpon,true);
		$criteria->compare('TNPWPD_pengukuhantgl',$this->TNPWPD_pengukuhantgl,true);
		$criteria->compare('TNPWPD_pengukuhanno',$this->TNPWPD_pengukuhanno,true);
		$criteria->compare('TNPWPD_npwpd',$this->TNPWPD_npwpd,true);
		$criteria->compare('TNPWPD_tglsysinsert',$this->TNPWPD_tglsysinsert,true);
		$criteria->compare('TNPWPD_tglsysedit',$this->TNPWPD_tglsysedit,true);
		$criteria->compare('tblpengguna_id',$this->tblpengguna_id);
		$criteria->compare('TNPWPD_hapus',$this->TNPWPD_hapus,true);
		$criteria->compare('TNPWPD_tgldaftar',$this->TNPWPD_tgldaftar,true);
		$criteria->compare('TNPWPD_tglbataskirim',$this->TNPWPD_tglbataskirim,true);
		$criteria->compare('TNPWPD_alamatpenerima',$this->TNPWPD_alamatpenerima,true);
		$criteria->compare('tblmasterrekening_id',$this->tblmasterrekening_id,true);
		$criteria->compare('TNPWPD_isaktif',$this->TNPWPD_isaktif,true);
		$criteria->compare('TNPWPD_ispengukuhan',$this->TNPWPD_ispengukuhan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}*/

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Obyek the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

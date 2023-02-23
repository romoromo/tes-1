<?php

/**
 * This is the model class for table "tblobyek".
 *
 * The followings are the available columns in table 'tblobyek':
 * @property string $tblobyek_id
 * @property string $tblsubyek_id
 * @property integer $tblobyek_nomorsptpd
 * @property string $tblobyek_nama
 * @property string $tblobyek_jenis
 * @property string $tblobyek_golongan
 * @property string $tblobyek_nopok
 * @property integer $refkecamatan_id
 * @property integer $refkelurahan_id
 * @property string $tblobyek_alamat
 * @property string $tblobyek_kodepos
 * @property string $tblobyek_telpon
 * @property string $tblobyek_pengukuhantgl
 * @property string $tblobyek_pengukuhanno
 * @property string $tblobyek_npwpd
 * @property string $tblobyek_tglsysinsert
 * @property string $tblobyek_tglsysedit
 * @property integer $tblpengguna_id
 * @property string $tblobyek_hapus
 * @property string $tblobyek_tgldaftar
 * @property string $tblobyek_tglbataskirim
 * @property string $tblobyek_alamatpenerima
 * @property string $tblmasterrekening_id
 * @property string $tblobyek_isaktif
 * @property string $tblobyek_ispengukuhan
 */
class Obyek extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblobyek';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblobyek_nomorsptpd, tblobyek_tglsysinsert', 'required'),
			array('tblobyek_nomorsptpd, refkecamatan_id, refkelurahan_id, tblpengguna_id', 'numerical', 'integerOnly'=>true),
			array('tblsubyek_id', 'length', 'max'=>19),
			array('tblobyek_nama', 'length', 'max'=>125),
			array('tblobyek_jenis', 'length', 'max'=>9),
			array('tblobyek_golongan', 'length', 'max'=>11),
			array('tblobyek_nopok', 'length', 'max'=>7),
			array('tblobyek_alamat', 'length', 'max'=>225),
			array('tblobyek_kodepos', 'length', 'max'=>18),
			array('tblobyek_telpon', 'length', 'max'=>30),
			array('tblobyek_pengukuhanno, tblobyek_npwpd', 'length', 'max'=>50),
			array('tblobyek_hapus, tblobyek_isaktif, tblobyek_ispengukuhan', 'length', 'max'=>1),
			array('tblobyek_alamatpenerima', 'length', 'max'=>250),
			array('tblmasterrekening_id', 'length', 'max'=>10),
			array('tblobyek_pengukuhantgl, tblobyek_tgldaftar, tblobyek_tglbataskirim', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblobyek_id, tblsubyek_id, tblobyek_nomorsptpd, tblobyek_nama, tblobyek_jenis, tblobyek_golongan, tblobyek_nopok, refkecamatan_id, refkelurahan_id, tblobyek_alamat, tblobyek_kodepos, tblobyek_telpon, tblobyek_pengukuhantgl, tblobyek_pengukuhanno, tblobyek_npwpd, tblobyek_tglsysinsert, tblobyek_tglsysedit, tblpengguna_id, tblobyek_hapus, tblobyek_tgldaftar, tblobyek_tglbataskirim, tblobyek_alamatpenerima, tblmasterrekening_id, tblobyek_isaktif, tblobyek_ispengukuhan', 'safe', 'on'=>'search'),
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
			'tblobyek_id' => 'Tblobyek',
			'tblsubyek_id' => 'Tblsubyek',
			'tblobyek_nomorsptpd' => 'Tblobyek Nomorsptpd',
			'tblobyek_nama' => 'Tblobyek Nama',
			'tblobyek_jenis' => 'Tblobyek Jenis',
			'tblobyek_golongan' => 'Tblobyek Golongan',
			'tblobyek_nopok' => 'Tblobyek Nopok',
			'refkecamatan_id' => 'Refkecamatan',
			'refkelurahan_id' => 'Refkelurahan',
			'tblobyek_alamat' => 'Tblobyek Alamat',
			'tblobyek_kodepos' => 'Tblobyek Kodepos',
			'tblobyek_telpon' => 'Tblobyek Telpon',
			'tblobyek_pengukuhantgl' => 'Tblobyek Pengukuhantgl',
			'tblobyek_pengukuhanno' => 'Tblobyek Pengukuhanno',
			'tblobyek_npwpd' => 'Tblobyek Npwpd',
			'tblobyek_tglsysinsert' => 'Tblobyek Tglsysinsert',
			'tblobyek_tglsysedit' => 'Tblobyek Tglsysedit',
			'tblpengguna_id' => 'Tblpengguna',
			'tblobyek_hapus' => 'Tblobyek Hapus',
			'tblobyek_tgldaftar' => 'Tblobyek Tgldaftar',
			'tblobyek_tglbataskirim' => 'Tblobyek Tglbataskirim',
			'tblobyek_alamatpenerima' => 'Tblobyek Alamatpenerima',
			'tblmasterrekening_id' => 'Tblmasterrekening',
			'tblobyek_isaktif' => 'Tblobyek Isaktif',
			'tblobyek_ispengukuhan' => 'Tblobyek Ispengukuhan',
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

		$criteria->compare('tblobyek_id',$this->tblobyek_id,true);
		$criteria->compare('tblsubyek_id',$this->tblsubyek_id,true);
		$criteria->compare('tblobyek_nomorsptpd',$this->tblobyek_nomorsptpd);
		$criteria->compare('tblobyek_nama',$this->tblobyek_nama,true);
		$criteria->compare('tblobyek_jenis',$this->tblobyek_jenis,true);
		$criteria->compare('tblobyek_golongan',$this->tblobyek_golongan,true);
		$criteria->compare('tblobyek_nopok',$this->tblobyek_nopok,true);
		$criteria->compare('refkecamatan_id',$this->refkecamatan_id);
		$criteria->compare('refkelurahan_id',$this->refkelurahan_id);
		$criteria->compare('tblobyek_alamat',$this->tblobyek_alamat,true);
		$criteria->compare('tblobyek_kodepos',$this->tblobyek_kodepos,true);
		$criteria->compare('tblobyek_telpon',$this->tblobyek_telpon,true);
		$criteria->compare('tblobyek_pengukuhantgl',$this->tblobyek_pengukuhantgl,true);
		$criteria->compare('tblobyek_pengukuhanno',$this->tblobyek_pengukuhanno,true);
		$criteria->compare('tblobyek_npwpd',$this->tblobyek_npwpd,true);
		$criteria->compare('tblobyek_tglsysinsert',$this->tblobyek_tglsysinsert,true);
		$criteria->compare('tblobyek_tglsysedit',$this->tblobyek_tglsysedit,true);
		$criteria->compare('tblpengguna_id',$this->tblpengguna_id);
		$criteria->compare('tblobyek_hapus',$this->tblobyek_hapus,true);
		$criteria->compare('tblobyek_tgldaftar',$this->tblobyek_tgldaftar,true);
		$criteria->compare('tblobyek_tglbataskirim',$this->tblobyek_tglbataskirim,true);
		$criteria->compare('tblobyek_alamatpenerima',$this->tblobyek_alamatpenerima,true);
		$criteria->compare('tblmasterrekening_id',$this->tblmasterrekening_id,true);
		$criteria->compare('tblobyek_isaktif',$this->tblobyek_isaktif,true);
		$criteria->compare('tblobyek_ispengukuhan',$this->tblobyek_ispengukuhan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

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

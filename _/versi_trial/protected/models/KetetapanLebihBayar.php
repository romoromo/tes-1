<?php

/**
 * This is the model class for table "tblketetapanlebihbayar".
 *
 * The followings are the available columns in table 'tblketetapanlebihbayar':
 * @property integer $tblketetapanlebihbayar_id
 * @property string $tblobyek_id
 * @property string $refjenistransaksi_id
 * @property string $tblketetapanlebihbayar_ke
 * @property string $tblketetapanlebihbayar_masaawal
 * @property string $tblketetapanlebihbayar_masaakhir
 * @property string $tblketetapanlebihbayar_tarif
 * @property string $tblketetapanlebihbayar_omzettetap
 * @property string $tblketetapanlebihbayar_omzetperiksa
 * @property string $tblketetapanlebihbayar_omzetterhutang
 * @property string $tblketetapanlebihbayar_pajaktetap
 * @property string $tblketetapanlebihbayar_pajakperiksa
 * @property string $tblketetapanlebihbayar_pajakterhutang
 * @property string $tblketetapanlebihbayar_tglentrydaftar
 * @property string $tblketetapanlebihbayar_nokohirskpd
 * @property integer $tblketetapanlebihbayar_tahunpajak
 * @property integer $tblketetapanlebihbayar_bulanpajak
 * @property string $tblketetapanlebihbayar_noperiksa
 * @property string $tblketetapanlebihbayar_tglterimaperiksa
 * @property string $tblketetapanlebihbayar_petugasperiksa
 * @property string $tblketetapanlebihbayar_tglketetapanlb
 * @property string $tblketetapanlebihbayar_tgljatuhtempolb
 * @property string $tblketetapanlebihbayar_persenbunga
 * @property integer $tblketetapanlebihbayar_bulanbunga
 * @property string $tblketetapanlebihbayar_rupiahbunga
 * @property string $tblketetapanlebihbayar_rupiahdenda
 * @property string $tblketetapanlebihbayar_pajaktotallb
 * @property string $tblketetapanlebihbayar_nosspd
 * @property string $tblketetapanlebihbayar_noreg
 * @property string $tblketetapanlebihbayar_tglreg
 * @property string $tblketetapanlebihbayar_tglsetor
 * @property integer $tblketetapanlebihbayar_viabayar
 * @property string $tblketetapanlebihbayar_kodeskpd
 * @property string $tblketetapanlebihbayar_jumlahsetor
 * @property string $tblketetapanlebihbayar_noreg2
 * @property string $tblketetapanlebihbayar_tglreg2
 * @property string $tblketetapanlebihbayar_bunga2
 * @property string $tblketetapanlebihbayar_denda2
 * @property string $tblketetapanlebihbayar_jumlahsetor2
 * @property string $tblketetapanlebihbayar_noreg3
 * @property string $tblketetapanlebihbayar_tglreg3
 * @property string $tblketetapanlebihbayar_bunga3
 * @property string $tblketetapanlebihbayar_denda3
 * @property string $tblketetapanlebihbayar_jumlahsetor3
 * @property string $tblketetapanlebihbayar_tgltempo
 * @property integer $tblpengguna_penggunapendaftaranid
 * @property integer $tblpengguna_penggunapenetapanid
 * @property integer $tblpengguna_penggunapenyetoranid
 * @property string $tblketetapanlebihbayar_istetap
 * @property string $tbltransaksiketetapan_isskpdkb
 * @property string $tbltransaksiketetapan_isskpdangsur
 * @property string $tbltransaksiketetapan_isskpdnihil
 * @property string $tblketetapanlebihbayar_isskpdlb
 * @property string $tbltransaksiketetapan_ispiutang
 * @property integer $tblsuratpemeriksaanpajaklebih_id
 * @property string $tbltransaksiketetapan_id
 * @property string $tblketetapanlebihbayar_isbataltetap
 */
class KetetapanLebihBayar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblketetapanlebihbayar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblketetapanlebihbayar_tahunpajak', 'required'),
			array('tblketetapanlebihbayar_tahunpajak, tblketetapanlebihbayar_bulanpajak, tblketetapanlebihbayar_bulanbunga, tblketetapanlebihbayar_viabayar, tblpengguna_penggunapendaftaranid, tblpengguna_penggunapenetapanid, tblpengguna_penggunapenyetoranid, tblsuratpemeriksaanpajaklebih_id', 'numerical', 'integerOnly'=>true),
			array('tblobyek_id, tblketetapanlebihbayar_ke, tblketetapanlebihbayar_tarif, tblketetapanlebihbayar_omzettetap, tblketetapanlebihbayar_omzetperiksa, tblketetapanlebihbayar_omzetterhutang, tblketetapanlebihbayar_pajaktetap, tblketetapanlebihbayar_pajakperiksa, tblketetapanlebihbayar_pajakterhutang, tblketetapanlebihbayar_nokohirskpd, tblketetapanlebihbayar_persenbunga, tblketetapanlebihbayar_rupiahbunga, tblketetapanlebihbayar_rupiahdenda, tblketetapanlebihbayar_pajaktotallb, tblketetapanlebihbayar_nosspd, tblketetapanlebihbayar_noreg, tblketetapanlebihbayar_jumlahsetor, tblketetapanlebihbayar_noreg2, tblketetapanlebihbayar_bunga2, tblketetapanlebihbayar_denda2, tblketetapanlebihbayar_jumlahsetor2, tblketetapanlebihbayar_noreg3, tblketetapanlebihbayar_bunga3, tblketetapanlebihbayar_denda3, tblketetapanlebihbayar_jumlahsetor3', 'length', 'max'=>18),
			array('refjenistransaksi_id', 'length', 'max'=>2),
			array('tblketetapanlebihbayar_noperiksa, tblketetapanlebihbayar_petugasperiksa', 'length', 'max'=>100),
			array('tblketetapanlebihbayar_kodeskpd', 'length', 'max'=>15),
			array('tblketetapanlebihbayar_istetap, tbltransaksiketetapan_isskpdkb, tbltransaksiketetapan_isskpdangsur, tbltransaksiketetapan_isskpdnihil, tblketetapanlebihbayar_isskpdlb, tbltransaksiketetapan_ispiutang, tblketetapanlebihbayar_isbataltetap', 'length', 'max'=>1),
			array('tbltransaksiketetapan_id', 'length', 'max'=>6),
			array('tblketetapanlebihbayar_masaawal, tblketetapanlebihbayar_masaakhir, tblketetapanlebihbayar_tglentrydaftar, tblketetapanlebihbayar_tglterimaperiksa, tblketetapanlebihbayar_tglketetapanlb, tblketetapanlebihbayar_tgljatuhtempolb, tblketetapanlebihbayar_tglreg, tblketetapanlebihbayar_tglsetor, tblketetapanlebihbayar_tglreg2, tblketetapanlebihbayar_tglreg3, tblketetapanlebihbayar_tgltempo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblketetapanlebihbayar_id, tblobyek_id, refjenistransaksi_id, tblketetapanlebihbayar_ke, tblketetapanlebihbayar_masaawal, tblketetapanlebihbayar_masaakhir, tblketetapanlebihbayar_tarif, tblketetapanlebihbayar_omzettetap, tblketetapanlebihbayar_omzetperiksa, tblketetapanlebihbayar_omzetterhutang, tblketetapanlebihbayar_pajaktetap, tblketetapanlebihbayar_pajakperiksa, tblketetapanlebihbayar_pajakterhutang, tblketetapanlebihbayar_tglentrydaftar, tblketetapanlebihbayar_nokohirskpd, tblketetapanlebihbayar_tahunpajak, tblketetapanlebihbayar_bulanpajak, tblketetapanlebihbayar_noperiksa, tblketetapanlebihbayar_tglterimaperiksa, tblketetapanlebihbayar_petugasperiksa, tblketetapanlebihbayar_tglketetapanlb, tblketetapanlebihbayar_tgljatuhtempolb, tblketetapanlebihbayar_persenbunga, tblketetapanlebihbayar_bulanbunga, tblketetapanlebihbayar_rupiahbunga, tblketetapanlebihbayar_rupiahdenda, tblketetapanlebihbayar_pajaktotallb, tblketetapanlebihbayar_nosspd, tblketetapanlebihbayar_noreg, tblketetapanlebihbayar_tglreg, tblketetapanlebihbayar_tglsetor, tblketetapanlebihbayar_viabayar, tblketetapanlebihbayar_kodeskpd, tblketetapanlebihbayar_jumlahsetor, tblketetapanlebihbayar_noreg2, tblketetapanlebihbayar_tglreg2, tblketetapanlebihbayar_bunga2, tblketetapanlebihbayar_denda2, tblketetapanlebihbayar_jumlahsetor2, tblketetapanlebihbayar_noreg3, tblketetapanlebihbayar_tglreg3, tblketetapanlebihbayar_bunga3, tblketetapanlebihbayar_denda3, tblketetapanlebihbayar_jumlahsetor3, tblketetapanlebihbayar_tgltempo, tblpengguna_penggunapendaftaranid, tblpengguna_penggunapenetapanid, tblpengguna_penggunapenyetoranid, tblketetapanlebihbayar_istetap, tbltransaksiketetapan_isskpdkb, tbltransaksiketetapan_isskpdangsur, tbltransaksiketetapan_isskpdnihil, tblketetapanlebihbayar_isskpdlb, tbltransaksiketetapan_ispiutang, tblsuratpemeriksaanpajaklebih_id, tbltransaksiketetapan_id, tblketetapanlebihbayar_isbataltetap', 'safe', 'on'=>'search'),
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
			'tblketetapanlebihbayar_id' => 'Tblketetapanlebihbayar',
			'tblobyek_id' => 'Tblobyek',
			'refjenistransaksi_id' => 'Refjenistransaksi',
			'tblketetapanlebihbayar_ke' => 'Tblketetapanlebihbayar Ke',
			'tblketetapanlebihbayar_masaawal' => 'Tblketetapanlebihbayar Masaawal',
			'tblketetapanlebihbayar_masaakhir' => 'Tblketetapanlebihbayar Masaakhir',
			'tblketetapanlebihbayar_tarif' => 'Tblketetapanlebihbayar Tarif',
			'tblketetapanlebihbayar_omzettetap' => 'Tblketetapanlebihbayar Omzettetap',
			'tblketetapanlebihbayar_omzetperiksa' => 'Tblketetapanlebihbayar Omzetperiksa',
			'tblketetapanlebihbayar_omzetterhutang' => 'Tblketetapanlebihbayar Omzetterhutang',
			'tblketetapanlebihbayar_pajaktetap' => 'Tblketetapanlebihbayar Pajaktetap',
			'tblketetapanlebihbayar_pajakperiksa' => 'Tblketetapanlebihbayar Pajakperiksa',
			'tblketetapanlebihbayar_pajakterhutang' => 'Tblketetapanlebihbayar Pajakterhutang',
			'tblketetapanlebihbayar_tglentrydaftar' => 'Tblketetapanlebihbayar Tglentrydaftar',
			'tblketetapanlebihbayar_nokohirskpd' => 'Tblketetapanlebihbayar Nokohirskpd',
			'tblketetapanlebihbayar_tahunpajak' => 'Tblketetapanlebihbayar Tahunpajak',
			'tblketetapanlebihbayar_bulanpajak' => 'Tblketetapanlebihbayar Bulanpajak',
			'tblketetapanlebihbayar_noperiksa' => 'Tblketetapanlebihbayar Noperiksa',
			'tblketetapanlebihbayar_tglterimaperiksa' => 'Tblketetapanlebihbayar Tglterimaperiksa',
			'tblketetapanlebihbayar_petugasperiksa' => 'Tblketetapanlebihbayar Petugasperiksa',
			'tblketetapanlebihbayar_tglketetapanlb' => 'Tblketetapanlebihbayar Tglketetapanlb',
			'tblketetapanlebihbayar_tgljatuhtempolb' => 'Tblketetapanlebihbayar Tgljatuhtempolb',
			'tblketetapanlebihbayar_persenbunga' => 'Tblketetapanlebihbayar Persenbunga',
			'tblketetapanlebihbayar_bulanbunga' => 'Tblketetapanlebihbayar Bulanbunga',
			'tblketetapanlebihbayar_rupiahbunga' => 'Tblketetapanlebihbayar Rupiahbunga',
			'tblketetapanlebihbayar_rupiahdenda' => 'Tblketetapanlebihbayar Rupiahdenda',
			'tblketetapanlebihbayar_pajaktotallb' => 'Tblketetapanlebihbayar Pajaktotallb',
			'tblketetapanlebihbayar_nosspd' => 'Tblketetapanlebihbayar Nosspd',
			'tblketetapanlebihbayar_noreg' => 'Tblketetapanlebihbayar Noreg',
			'tblketetapanlebihbayar_tglreg' => 'Tblketetapanlebihbayar Tglreg',
			'tblketetapanlebihbayar_tglsetor' => 'Tblketetapanlebihbayar Tglsetor',
			'tblketetapanlebihbayar_viabayar' => 'Tblketetapanlebihbayar Viabayar',
			'tblketetapanlebihbayar_kodeskpd' => 'Tblketetapanlebihbayar Kodeskpd',
			'tblketetapanlebihbayar_jumlahsetor' => 'Tblketetapanlebihbayar Jumlahsetor',
			'tblketetapanlebihbayar_noreg2' => 'Tblketetapanlebihbayar Noreg2',
			'tblketetapanlebihbayar_tglreg2' => 'Tblketetapanlebihbayar Tglreg2',
			'tblketetapanlebihbayar_bunga2' => 'Tblketetapanlebihbayar Bunga2',
			'tblketetapanlebihbayar_denda2' => 'Tblketetapanlebihbayar Denda2',
			'tblketetapanlebihbayar_jumlahsetor2' => 'Tblketetapanlebihbayar Jumlahsetor2',
			'tblketetapanlebihbayar_noreg3' => 'Tblketetapanlebihbayar Noreg3',
			'tblketetapanlebihbayar_tglreg3' => 'Tblketetapanlebihbayar Tglreg3',
			'tblketetapanlebihbayar_bunga3' => 'Tblketetapanlebihbayar Bunga3',
			'tblketetapanlebihbayar_denda3' => 'Tblketetapanlebihbayar Denda3',
			'tblketetapanlebihbayar_jumlahsetor3' => 'Tblketetapanlebihbayar Jumlahsetor3',
			'tblketetapanlebihbayar_tgltempo' => 'Tblketetapanlebihbayar Tgltempo',
			'tblpengguna_penggunapendaftaranid' => 'Tblpengguna Penggunapendaftaranid',
			'tblpengguna_penggunapenetapanid' => 'Tblpengguna Penggunapenetapanid',
			'tblpengguna_penggunapenyetoranid' => 'Tblpengguna Penggunapenyetoranid',
			'tblketetapanlebihbayar_istetap' => 'Tblketetapanlebihbayar Istetap',
			'tbltransaksiketetapan_isskpdkb' => 'Tbltransaksiketetapan Isskpdkb',
			'tbltransaksiketetapan_isskpdangsur' => 'Tbltransaksiketetapan Isskpdangsur',
			'tbltransaksiketetapan_isskpdnihil' => 'Tbltransaksiketetapan Isskpdnihil',
			'tblketetapanlebihbayar_isskpdlb' => 'Tblketetapanlebihbayar Isskpdlb',
			'tbltransaksiketetapan_ispiutang' => 'Tbltransaksiketetapan Ispiutang',
			'tblsuratpemeriksaanpajaklebih_id' => 'Tblsuratpemeriksaanpajaklebih',
			'tbltransaksiketetapan_id' => 'Tbltransaksiketetapan',
			'tblketetapanlebihbayar_isbataltetap' => 'Tblketetapanlebihbayar Isbataltetap',
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

		$criteria->compare('tblketetapanlebihbayar_id',$this->tblketetapanlebihbayar_id);
		$criteria->compare('tblobyek_id',$this->tblobyek_id,true);
		$criteria->compare('refjenistransaksi_id',$this->refjenistransaksi_id,true);
		$criteria->compare('tblketetapanlebihbayar_ke',$this->tblketetapanlebihbayar_ke,true);
		$criteria->compare('tblketetapanlebihbayar_masaawal',$this->tblketetapanlebihbayar_masaawal,true);
		$criteria->compare('tblketetapanlebihbayar_masaakhir',$this->tblketetapanlebihbayar_masaakhir,true);
		$criteria->compare('tblketetapanlebihbayar_tarif',$this->tblketetapanlebihbayar_tarif,true);
		$criteria->compare('tblketetapanlebihbayar_omzettetap',$this->tblketetapanlebihbayar_omzettetap,true);
		$criteria->compare('tblketetapanlebihbayar_omzetperiksa',$this->tblketetapanlebihbayar_omzetperiksa,true);
		$criteria->compare('tblketetapanlebihbayar_omzetterhutang',$this->tblketetapanlebihbayar_omzetterhutang,true);
		$criteria->compare('tblketetapanlebihbayar_pajaktetap',$this->tblketetapanlebihbayar_pajaktetap,true);
		$criteria->compare('tblketetapanlebihbayar_pajakperiksa',$this->tblketetapanlebihbayar_pajakperiksa,true);
		$criteria->compare('tblketetapanlebihbayar_pajakterhutang',$this->tblketetapanlebihbayar_pajakterhutang,true);
		$criteria->compare('tblketetapanlebihbayar_tglentrydaftar',$this->tblketetapanlebihbayar_tglentrydaftar,true);
		$criteria->compare('tblketetapanlebihbayar_nokohirskpd',$this->tblketetapanlebihbayar_nokohirskpd,true);
		$criteria->compare('tblketetapanlebihbayar_tahunpajak',$this->tblketetapanlebihbayar_tahunpajak);
		$criteria->compare('tblketetapanlebihbayar_bulanpajak',$this->tblketetapanlebihbayar_bulanpajak);
		$criteria->compare('tblketetapanlebihbayar_noperiksa',$this->tblketetapanlebihbayar_noperiksa,true);
		$criteria->compare('tblketetapanlebihbayar_tglterimaperiksa',$this->tblketetapanlebihbayar_tglterimaperiksa,true);
		$criteria->compare('tblketetapanlebihbayar_petugasperiksa',$this->tblketetapanlebihbayar_petugasperiksa,true);
		$criteria->compare('tblketetapanlebihbayar_tglketetapanlb',$this->tblketetapanlebihbayar_tglketetapanlb,true);
		$criteria->compare('tblketetapanlebihbayar_tgljatuhtempolb',$this->tblketetapanlebihbayar_tgljatuhtempolb,true);
		$criteria->compare('tblketetapanlebihbayar_persenbunga',$this->tblketetapanlebihbayar_persenbunga,true);
		$criteria->compare('tblketetapanlebihbayar_bulanbunga',$this->tblketetapanlebihbayar_bulanbunga);
		$criteria->compare('tblketetapanlebihbayar_rupiahbunga',$this->tblketetapanlebihbayar_rupiahbunga,true);
		$criteria->compare('tblketetapanlebihbayar_rupiahdenda',$this->tblketetapanlebihbayar_rupiahdenda,true);
		$criteria->compare('tblketetapanlebihbayar_pajaktotallb',$this->tblketetapanlebihbayar_pajaktotallb,true);
		$criteria->compare('tblketetapanlebihbayar_nosspd',$this->tblketetapanlebihbayar_nosspd,true);
		$criteria->compare('tblketetapanlebihbayar_noreg',$this->tblketetapanlebihbayar_noreg,true);
		$criteria->compare('tblketetapanlebihbayar_tglreg',$this->tblketetapanlebihbayar_tglreg,true);
		$criteria->compare('tblketetapanlebihbayar_tglsetor',$this->tblketetapanlebihbayar_tglsetor,true);
		$criteria->compare('tblketetapanlebihbayar_viabayar',$this->tblketetapanlebihbayar_viabayar);
		$criteria->compare('tblketetapanlebihbayar_kodeskpd',$this->tblketetapanlebihbayar_kodeskpd,true);
		$criteria->compare('tblketetapanlebihbayar_jumlahsetor',$this->tblketetapanlebihbayar_jumlahsetor,true);
		$criteria->compare('tblketetapanlebihbayar_noreg2',$this->tblketetapanlebihbayar_noreg2,true);
		$criteria->compare('tblketetapanlebihbayar_tglreg2',$this->tblketetapanlebihbayar_tglreg2,true);
		$criteria->compare('tblketetapanlebihbayar_bunga2',$this->tblketetapanlebihbayar_bunga2,true);
		$criteria->compare('tblketetapanlebihbayar_denda2',$this->tblketetapanlebihbayar_denda2,true);
		$criteria->compare('tblketetapanlebihbayar_jumlahsetor2',$this->tblketetapanlebihbayar_jumlahsetor2,true);
		$criteria->compare('tblketetapanlebihbayar_noreg3',$this->tblketetapanlebihbayar_noreg3,true);
		$criteria->compare('tblketetapanlebihbayar_tglreg3',$this->tblketetapanlebihbayar_tglreg3,true);
		$criteria->compare('tblketetapanlebihbayar_bunga3',$this->tblketetapanlebihbayar_bunga3,true);
		$criteria->compare('tblketetapanlebihbayar_denda3',$this->tblketetapanlebihbayar_denda3,true);
		$criteria->compare('tblketetapanlebihbayar_jumlahsetor3',$this->tblketetapanlebihbayar_jumlahsetor3,true);
		$criteria->compare('tblketetapanlebihbayar_tgltempo',$this->tblketetapanlebihbayar_tgltempo,true);
		$criteria->compare('tblpengguna_penggunapendaftaranid',$this->tblpengguna_penggunapendaftaranid);
		$criteria->compare('tblpengguna_penggunapenetapanid',$this->tblpengguna_penggunapenetapanid);
		$criteria->compare('tblpengguna_penggunapenyetoranid',$this->tblpengguna_penggunapenyetoranid);
		$criteria->compare('tblketetapanlebihbayar_istetap',$this->tblketetapanlebihbayar_istetap,true);
		$criteria->compare('tbltransaksiketetapan_isskpdkb',$this->tbltransaksiketetapan_isskpdkb,true);
		$criteria->compare('tbltransaksiketetapan_isskpdangsur',$this->tbltransaksiketetapan_isskpdangsur,true);
		$criteria->compare('tbltransaksiketetapan_isskpdnihil',$this->tbltransaksiketetapan_isskpdnihil,true);
		$criteria->compare('tblketetapanlebihbayar_isskpdlb',$this->tblketetapanlebihbayar_isskpdlb,true);
		$criteria->compare('tbltransaksiketetapan_ispiutang',$this->tbltransaksiketetapan_ispiutang,true);
		$criteria->compare('tblsuratpemeriksaanpajaklebih_id',$this->tblsuratpemeriksaanpajaklebih_id);
		$criteria->compare('tbltransaksiketetapan_id',$this->tbltransaksiketetapan_id,true);
		$criteria->compare('tblketetapanlebihbayar_isbataltetap',$this->tblketetapanlebihbayar_isbataltetap,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KetetapanLebihBayar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

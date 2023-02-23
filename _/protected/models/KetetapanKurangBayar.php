<?php

/**
 * This is the model class for table "tblketetapankurangbayar".
 *
 * The followings are the available columns in table 'tblketetapankurangbayar':
 * @property integer $tblketetapankurangbayar_id
 * @property string $tblobyek_id
 * @property string $refjenistransaksi_id
 * @property string $tblketetapankurangbayar_ke
 * @property string $tblketetapankurangbayar_masaawal
 * @property string $tblketetapankurangbayar_masaakhir
 * @property string $tblketetapankurangbayar_tarif
 * @property string $tblketetapankurangbayar_omzettetap
 * @property string $tblketetapankurangbayar_omzetperiksa
 * @property string $tblketetapankurangbayar_omzetterhutang
 * @property string $tblketetapankurangbayar_pajaktetap
 * @property string $tblketetapankurangbayar_pajakperiksa
 * @property string $tblketetapankurangbayar_pajakterhutang
 * @property string $tblketetapankurangbayar_tglentrydaftar
 * @property string $tblketetapankurangbayar_nokohirskpd
 * @property integer $tblketetapankurangbayar_tahunpajak
 * @property integer $tblketetapankurangbayar_bulanpajak
 * @property string $tblketetapankurangbayar_noperiksa
 * @property string $tblketetapankurangbayar_tglterimaperiksa
 * @property string $tblketetapankurangbayar_petugasperiksa
 * @property string $tblketetapankurangbayar_tglketetapankb
 * @property string $tblketetapankurangbayar_tgljatuhtempokb
 * @property string $tblketetapankurangbayar_persenbunga
 * @property integer $tblketetapankurangbayar_bulanbunga
 * @property string $tblketetapankurangbayar_rupiahbunga
 * @property string $tblketetapankurangbayar_rupiahdenda
 * @property string $tblketetapankurangbayar_pajaktotalkb
 * @property string $tblketetapankurangbayar_nosspd
 * @property string $tblketetapankurangbayar_noreg
 * @property string $tblketetapankurangbayar_tglreg
 * @property string $tblketetapankurangbayar_tglsetor
 * @property integer $tblketetapankurangbayar_viabayar
 * @property string $tblketetapankurangbayar_kodeskpd
 * @property string $tblketetapankurangbayar_jumlahsetor
 * @property string $tblketetapankurangbayar_noreg2
 * @property string $tblketetapankurangbayar_tglreg2
 * @property string $tblketetapankurangbayar_bunga2
 * @property string $tblketetapankurangbayar_denda2
 * @property string $tblketetapankurangbayar_jumlahsetor2
 * @property string $tblketetapankurangbayar_noreg3
 * @property string $tblketetapankurangbayar_tglreg3
 * @property string $tblketetapankurangbayar_bunga3
 * @property string $tblketetapankurangbayar_denda3
 * @property string $tblketetapankurangbayar_jumlahsetor3
 * @property string $tblketetapankurangbayar_tgltempo
 * @property integer $tblpengguna_penggunapendaftaranid
 * @property integer $tblpengguna_penggunapenetapanid
 * @property integer $tblpengguna_penggunapenyetoranid
 * @property string $tbltransaksiketetapan_istetap
 * @property string $tbltransaksiketetapan_isskpdkb
 * @property string $tbltransaksiketetapan_isskpdangsur
 * @property string $tbltransaksiketetapan_isskpdnihil
 * @property string $tbltransaksiketetapan_isskpdlb
 * @property string $tbltransaksiketetapan_ispiutang
 * @property integer $tblsuratpemeriksaanpajak_id
 * @property string $tbltransaksiketetapan_id
 * @property string $tblketetapankurangbayar_isbataltetap
 * @property string $tblketetapankurangbayar_isterbayar
 * @property string $tblketetapankurangbayar_iscetaksspd
 */
class KetetapanKurangBayar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblketetapankurangbayar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblketetapankurangbayar_tahunpajak', 'required'),
			array('tblketetapankurangbayar_tahunpajak, tblketetapankurangbayar_bulanpajak, tblketetapankurangbayar_bulanbunga, tblketetapankurangbayar_viabayar, tblpengguna_penggunapendaftaranid, tblpengguna_penggunapenetapanid, tblpengguna_penggunapenyetoranid, tblsuratpemeriksaanpajak_id', 'numerical', 'integerOnly'=>true),
			array('tblobyek_id, tblketetapankurangbayar_ke, tblketetapankurangbayar_tarif, tblketetapankurangbayar_omzettetap, tblketetapankurangbayar_omzetperiksa, tblketetapankurangbayar_omzetterhutang, tblketetapankurangbayar_pajaktetap, tblketetapankurangbayar_pajakperiksa, tblketetapankurangbayar_pajakterhutang, tblketetapankurangbayar_nokohirskpd, tblketetapankurangbayar_persenbunga, tblketetapankurangbayar_rupiahbunga, tblketetapankurangbayar_rupiahdenda, tblketetapankurangbayar_pajaktotalkb, tblketetapankurangbayar_nosspd, tblketetapankurangbayar_noreg, tblketetapankurangbayar_jumlahsetor, tblketetapankurangbayar_noreg2, tblketetapankurangbayar_bunga2, tblketetapankurangbayar_denda2, tblketetapankurangbayar_jumlahsetor2, tblketetapankurangbayar_noreg3, tblketetapankurangbayar_bunga3, tblketetapankurangbayar_denda3, tblketetapankurangbayar_jumlahsetor3', 'length', 'max'=>18),
			array('refjenistransaksi_id', 'length', 'max'=>2),
			array('tblketetapankurangbayar_noperiksa, tblketetapankurangbayar_petugasperiksa', 'length', 'max'=>100),
			array('tblketetapankurangbayar_kodeskpd', 'length', 'max'=>15),
			array('tbltransaksiketetapan_istetap, tbltransaksiketetapan_isskpdkb, tbltransaksiketetapan_isskpdangsur, tbltransaksiketetapan_isskpdnihil, tbltransaksiketetapan_isskpdlb, tbltransaksiketetapan_ispiutang, tblketetapankurangbayar_isbataltetap, tblketetapankurangbayar_isterbayar, tblketetapankurangbayar_iscetaksspd', 'length', 'max'=>1),
			array('tbltransaksiketetapan_id', 'length', 'max'=>6),
			array('tblketetapankurangbayar_masaawal, tblketetapankurangbayar_masaakhir, tblketetapankurangbayar_tglentrydaftar, tblketetapankurangbayar_tglterimaperiksa, tblketetapankurangbayar_tglketetapankb, tblketetapankurangbayar_tgljatuhtempokb, tblketetapankurangbayar_tglreg, tblketetapankurangbayar_tglsetor, tblketetapankurangbayar_tglreg2, tblketetapankurangbayar_tglreg3, tblketetapankurangbayar_tgltempo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblketetapankurangbayar_id, tblobyek_id, refjenistransaksi_id, tblketetapankurangbayar_ke, tblketetapankurangbayar_masaawal, tblketetapankurangbayar_masaakhir,tblketetapankurangbayar_tarif, tblketetapankurangbayar_omzettetap, tblketetapankurangbayar_omzetperiksa, tblketetapankurangbayar_omzetterhutang, tblketetapankurangbayar_pajaktetap, tblketetapankurangbayar_pajakperiksa, tblketetapankurangbayar_pajakterhutang, tblketetapankurangbayar_tglentrydaftar, tblketetapankurangbayar_nokohirskpd, tblketetapankurangbayar_tahunpajak, tblketetapankurangbayar_bulanpajak, tblketetapankurangbayar_noperiksa, tblketetapankurangbayar_tglterimaperiksa, tblketetapankurangbayar_petugasperiksa, tblketetapankurangbayar_tglketetapankb, tblketetapankurangbayar_tgljatuhtempokb, tblketetapankurangbayar_persenbunga, tblketetapankurangbayar_bulanbunga, tblketetapankurangbayar_rupiahbunga, tblketetapankurangbayar_rupiahdenda, tblketetapankurangbayar_pajaktotalkb, tblketetapankurangbayar_nosspd, tblketetapankurangbayar_noreg, tblketetapankurangbayar_tglreg, tblketetapankurangbayar_tglsetor, tblketetapankurangbayar_viabayar, tblketetapankurangbayar_kodeskpd, tblketetapankurangbayar_jumlahsetor, tblketetapankurangbayar_noreg2, tblketetapankurangbayar_tglreg2, tblketetapankurangbayar_bunga2, tblketetapankurangbayar_denda2, tblketetapankurangbayar_jumlahsetor2, tblketetapankurangbayar_noreg3, tblketetapankurangbayar_tglreg3, tblketetapankurangbayar_bunga3, tblketetapankurangbayar_denda3, tblketetapankurangbayar_jumlahsetor3, tblketetapankurangbayar_tgltempo, tblpengguna_penggunapendaftaranid, tblpengguna_penggunapenetapanid, tblpengguna_penggunapenyetoranid, tbltransaksiketetapan_istetap, tbltransaksiketetapan_isskpdkb, tbltransaksiketetapan_isskpdangsur, tbltransaksiketetapan_isskpdnihil, tbltransaksiketetapan_isskpdlb, tbltransaksiketetapan_ispiutang, tblsuratpemeriksaanpajak_id, tbltransaksiketetapan_id, tblketetapankurangbayar_isbataltetap, tblketetapankurangbayar_isterbayar, tblketetapankurangbayar_iscetaksspd', 'safe', 'on'=>'search'),
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
			'tblketetapankurangbayar_id' => 'Tblketetapankurangbayar',
			'tblobyek_id' => 'Tblobyek',
			'refjenistransaksi_id' => 'Refjenistransaksi',
			'tblketetapankurangbayar_ke' => 'Tblketetapankurangbayar Ke',
			'tblketetapankurangbayar_masaawal' => 'Tblketetapankurangbayar Masaawal',
			'tblketetapankurangbayar_masaakhir' => 'Tblketetapankurangbayar Masaakhir',
			'tblketetapankurangbayar_tarif' => 'Tblketetapankurangbayar Tarif',
			'tblketetapankurangbayar_omzettetap' => 'Tblketetapankurangbayar Omzettetap',
			'tblketetapankurangbayar_omzetperiksa' => 'Tblketetapankurangbayar Omzetperiksa',
			'tblketetapankurangbayar_omzetterhutang' => 'Tblketetapankurangbayar Omzetterhutang',
			'tblketetapankurangbayar_pajaktetap' => 'Tblketetapankurangbayar Pajaktetap',
			'tblketetapankurangbayar_pajakperiksa' => 'Tblketetapankurangbayar Pajakperiksa',
			'tblketetapankurangbayar_pajakterhutang' => 'Tblketetapankurangbayar Pajakterhutang',
			'tblketetapankurangbayar_tglentrydaftar' => 'Tblketetapankurangbayar Tglentrydaftar',
			'tblketetapankurangbayar_nokohirskpd' => 'Tblketetapankurangbayar Nokohirskpd',
			'tblketetapankurangbayar_tahunpajak' => 'Tblketetapankurangbayar Tahunpajak',
			'tblketetapankurangbayar_bulanpajak' => 'Tblketetapankurangbayar Bulanpajak',
			'tblketetapankurangbayar_noperiksa' => 'Tblketetapankurangbayar Noperiksa',
			'tblketetapankurangbayar_tglterimaperiksa' => 'Tblketetapankurangbayar Tglterimaperiksa',
			'tblketetapankurangbayar_petugasperiksa' => 'Tblketetapankurangbayar Petugasperiksa',
			'tblketetapankurangbayar_tglketetapankb' => 'Tblketetapankurangbayar Tglketetapankb',
			'tblketetapankurangbayar_tgljatuhtempokb' => 'Tblketetapankurangbayar Tgljatuhtempokb',
			'tblketetapankurangbayar_persenbunga' => 'Tblketetapankurangbayar Persenbunga',
			'tblketetapankurangbayar_bulanbunga' => 'Tblketetapankurangbayar Bulanbunga',
			'tblketetapankurangbayar_rupiahbunga' => 'Tblketetapankurangbayar Rupiahbunga',
			'tblketetapankurangbayar_rupiahdenda' => 'Tblketetapankurangbayar Rupiahdenda',
			'tblketetapankurangbayar_pajaktotalkb' => 'Tblketetapankurangbayar Pajaktotalkb',
			'tblketetapankurangbayar_nosspd' => 'Tblketetapankurangbayar Nosspd',
			'tblketetapankurangbayar_noreg' => 'Tblketetapankurangbayar Noreg',
			'tblketetapankurangbayar_tglreg' => 'Tblketetapankurangbayar Tglreg',
			'tblketetapankurangbayar_tglsetor' => 'Tblketetapankurangbayar Tglsetor',
			'tblketetapankurangbayar_viabayar' => 'Tblketetapankurangbayar Viabayar',
			'tblketetapankurangbayar_kodeskpd' => 'Tblketetapankurangbayar Kodeskpd',
			'tblketetapankurangbayar_jumlahsetor' => 'Tblketetapankurangbayar Jumlahsetor',
			'tblketetapankurangbayar_noreg2' => 'Tblketetapankurangbayar Noreg2',
			'tblketetapankurangbayar_tglreg2' => 'Tblketetapankurangbayar Tglreg2',
			'tblketetapankurangbayar_bunga2' => 'Tblketetapankurangbayar Bunga2',
			'tblketetapankurangbayar_denda2' => 'Tblketetapankurangbayar Denda2',
			'tblketetapankurangbayar_jumlahsetor2' => 'Tblketetapankurangbayar Jumlahsetor2',
			'tblketetapankurangbayar_noreg3' => 'Tblketetapankurangbayar Noreg3',
			'tblketetapankurangbayar_tglreg3' => 'Tblketetapankurangbayar Tglreg3',
			'tblketetapankurangbayar_bunga3' => 'Tblketetapankurangbayar Bunga3',
			'tblketetapankurangbayar_denda3' => 'Tblketetapankurangbayar Denda3',
			'tblketetapankurangbayar_jumlahsetor3' => 'Tblketetapankurangbayar Jumlahsetor3',
			'tblketetapankurangbayar_tgltempo' => 'Tblketetapankurangbayar Tgltempo',
			'tblpengguna_penggunapendaftaranid' => 'Tblpengguna Penggunapendaftaranid',
			'tblpengguna_penggunapenetapanid' => 'Tblpengguna Penggunapenetapanid',
			'tblpengguna_penggunapenyetoranid' => 'Tblpengguna Penggunapenyetoranid',
			'tbltransaksiketetapan_istetap' => 'Tbltransaksiketetapan Istetap',
			'tbltransaksiketetapan_isskpdkb' => 'Tbltransaksiketetapan Isskpdkb',
			'tbltransaksiketetapan_isskpdangsur' => 'Tbltransaksiketetapan Isskpdangsur',
			'tbltransaksiketetapan_isskpdnihil' => 'Tbltransaksiketetapan Isskpdnihil',
			'tbltransaksiketetapan_isskpdlb' => 'Tbltransaksiketetapan Isskpdlb',
			'tbltransaksiketetapan_ispiutang' => 'Tbltransaksiketetapan Ispiutang',
			'tblsuratpemeriksaanpajak_id' => 'Tblsuratpemeriksaanpajak',
			'tbltransaksiketetapan_id' => 'Tbltransaksiketetapan',
			'tblketetapankurangbayar_isbataltetap' => 'Tblketetapankurangbayar Isbataltetap',
			'tblketetapankurangbayar_isterbayar' => 'Tblketetapankurangbayar Isterbayar',
			'tblketetapankurangbayar_iscetaksspd' => 'Tblketetapankurangbayar Iscetaksspd',
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

		$criteria->compare('tblketetapankurangbayar_id',$this->tblketetapankurangbayar_id);
		$criteria->compare('tblobyek_id',$this->tblobyek_id,true);
		$criteria->compare('refjenistransaksi_id',$this->refjenistransaksi_id,true);
		$criteria->compare('tblketetapankurangbayar_ke',$this->tblketetapankurangbayar_ke,true);
		$criteria->compare('tblketetapankurangbayar_masaawal',$this->tblketetapankurangbayar_masaawal,true);
		$criteria->compare('tblketetapankurangbayar_masaakhir',$this->tblketetapankurangbayar_masaakhir,true);
		$criteria->compare('tblketetapankurangbayar_tarif',$this->tblketetapankurangbayar_tarif,true);
		$criteria->compare('tblketetapankurangbayar_omzettetap',$this->tblketetapankurangbayar_omzettetap,true);
		$criteria->compare('tblketetapankurangbayar_omzetperiksa',$this->tblketetapankurangbayar_omzetperiksa,true);
		$criteria->compare('tblketetapankurangbayar_omzetterhutang',$this->tblketetapankurangbayar_omzetterhutang,true);
		$criteria->compare('tblketetapankurangbayar_pajaktetap',$this->tblketetapankurangbayar_pajaktetap,true);
		$criteria->compare('tblketetapankurangbayar_pajakperiksa',$this->tblketetapankurangbayar_pajakperiksa,true);
		$criteria->compare('tblketetapankurangbayar_pajakterhutang',$this->tblketetapankurangbayar_pajakterhutang,true);
		$criteria->compare('tblketetapankurangbayar_tglentrydaftar',$this->tblketetapankurangbayar_tglentrydaftar,true);
		$criteria->compare('tblketetapankurangbayar_nokohirskpd',$this->tblketetapankurangbayar_nokohirskpd,true);
		$criteria->compare('tblketetapankurangbayar_tahunpajak',$this->tblketetapankurangbayar_tahunpajak);
		$criteria->compare('tblketetapankurangbayar_bulanpajak',$this->tblketetapankurangbayar_bulanpajak);
		$criteria->compare('tblketetapankurangbayar_noperiksa',$this->tblketetapankurangbayar_noperiksa,true);
		$criteria->compare('tblketetapankurangbayar_tglterimaperiksa',$this->tblketetapankurangbayar_tglterimaperiksa,true);
		$criteria->compare('tblketetapankurangbayar_petugasperiksa',$this->tblketetapankurangbayar_petugasperiksa,true);
		$criteria->compare('tblketetapankurangbayar_tglketetapankb',$this->tblketetapankurangbayar_tglketetapankb,true);
		$criteria->compare('tblketetapankurangbayar_tgljatuhtempokb',$this->tblketetapankurangbayar_tgljatuhtempokb,true);
		$criteria->compare('tblketetapankurangbayar_persenbunga',$this->tblketetapankurangbayar_persenbunga,true);
		$criteria->compare('tblketetapankurangbayar_bulanbunga',$this->tblketetapankurangbayar_bulanbunga);
		$criteria->compare('tblketetapankurangbayar_rupiahbunga',$this->tblketetapankurangbayar_rupiahbunga,true);
		$criteria->compare('tblketetapankurangbayar_rupiahdenda',$this->tblketetapankurangbayar_rupiahdenda,true);
		$criteria->compare('tblketetapankurangbayar_pajaktotalkb',$this->tblketetapankurangbayar_pajaktotalkb,true);
		$criteria->compare('tblketetapankurangbayar_nosspd',$this->tblketetapankurangbayar_nosspd,true);
		$criteria->compare('tblketetapankurangbayar_noreg',$this->tblketetapankurangbayar_noreg,true);
		$criteria->compare('tblketetapankurangbayar_tglreg',$this->tblketetapankurangbayar_tglreg,true);
		$criteria->compare('tblketetapankurangbayar_tglsetor',$this->tblketetapankurangbayar_tglsetor,true);
		$criteria->compare('tblketetapankurangbayar_viabayar',$this->tblketetapankurangbayar_viabayar);
		$criteria->compare('tblketetapankurangbayar_kodeskpd',$this->tblketetapankurangbayar_kodeskpd,true);
		$criteria->compare('tblketetapankurangbayar_jumlahsetor',$this->tblketetapankurangbayar_jumlahsetor,true);
		$criteria->compare('tblketetapankurangbayar_noreg2',$this->tblketetapankurangbayar_noreg2,true);
		$criteria->compare('tblketetapankurangbayar_tglreg2',$this->tblketetapankurangbayar_tglreg2,true);
		$criteria->compare('tblketetapankurangbayar_bunga2',$this->tblketetapankurangbayar_bunga2,true);
		$criteria->compare('tblketetapankurangbayar_denda2',$this->tblketetapankurangbayar_denda2,true);
		$criteria->compare('tblketetapankurangbayar_jumlahsetor2',$this->tblketetapankurangbayar_jumlahsetor2,true);
		$criteria->compare('tblketetapankurangbayar_noreg3',$this->tblketetapankurangbayar_noreg3,true);
		$criteria->compare('tblketetapankurangbayar_tglreg3',$this->tblketetapankurangbayar_tglreg3,true);
		$criteria->compare('tblketetapankurangbayar_bunga3',$this->tblketetapankurangbayar_bunga3,true);
		$criteria->compare('tblketetapankurangbayar_denda3',$this->tblketetapankurangbayar_denda3,true);
		$criteria->compare('tblketetapankurangbayar_jumlahsetor3',$this->tblketetapankurangbayar_jumlahsetor3,true);
		$criteria->compare('tblketetapankurangbayar_tgltempo',$this->tblketetapankurangbayar_tgltempo,true);
		$criteria->compare('tblpengguna_penggunapendaftaranid',$this->tblpengguna_penggunapendaftaranid);
		$criteria->compare('tblpengguna_penggunapenetapanid',$this->tblpengguna_penggunapenetapanid);
		$criteria->compare('tblpengguna_penggunapenyetoranid',$this->tblpengguna_penggunapenyetoranid);
		$criteria->compare('tbltransaksiketetapan_istetap',$this->tbltransaksiketetapan_istetap,true);
		$criteria->compare('tbltransaksiketetapan_isskpdkb',$this->tbltransaksiketetapan_isskpdkb,true);
		$criteria->compare('tbltransaksiketetapan_isskpdangsur',$this->tbltransaksiketetapan_isskpdangsur,true);
		$criteria->compare('tbltransaksiketetapan_isskpdnihil',$this->tbltransaksiketetapan_isskpdnihil,true);
		$criteria->compare('tbltransaksiketetapan_isskpdlb',$this->tbltransaksiketetapan_isskpdlb,true);
		$criteria->compare('tbltransaksiketetapan_ispiutang',$this->tbltransaksiketetapan_ispiutang,true);
		$criteria->compare('tblsuratpemeriksaanpajak_id',$this->tblsuratpemeriksaanpajak_id);
		$criteria->compare('tbltransaksiketetapan_id',$this->tbltransaksiketetapan_id,true);
		$criteria->compare('tblketetapankurangbayar_isbataltetap',$this->tblketetapankurangbayar_isbataltetap,true);
		$criteria->compare('tblketetapankurangbayar_isterbayar',$this->tblketetapankurangbayar_isterbayar,true);
		$criteria->compare('tblketetapankurangbayar_iscetaksspd',$this->tblketetapankurangbayar_iscetaksspd,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KetetapanKurangBayar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

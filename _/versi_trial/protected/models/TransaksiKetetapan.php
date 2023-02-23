<?php

/**
 * This is the model class for table "tbltransaksiketetapan".
 *
 * The followings are the available columns in table 'tbltransaksiketetapan':
 * @property integer $tbltransaksiketetapan_id
 * @property string $tblobyek_id
 * @property string $refjenistransaksi_id
 * @property string $tbltransaksiketetapan_ke
 * @property string $tbltransaksiketetapan_masaawal
 * @property string $tbltransaksiketetapan_masaakhir
 * @property string $tblmasterrekening_id
 * @property string $tbltransaksiketetapan_tarif
 * @property string $tbltransaksiketetapan_tarif2
 * @property integer $tbltransaksiketetapan_isregister
 * @property integer $tbltransaksiketetapan_ispembukuan
 * @property string $tbltransaksiketetapan_omzetindustri
 * @property string $tbltransaksiketetapan_omzetnonindustri
 * @property string $tbltransaksiketetapan_omzettotal
 * @property string $tbltransaksiketetapan_pajakindustri
 * @property string $tbltransaksiketetapan_pajaknonindustri
 * @property string $tbltransaksiketetapan_pajak
 * @property string $tbltransaksiketetapan_carapenetapan
 * @property string $tbltransaksiketetapan_tglentrisptpd
 * @property string $tbltransaksiketetapan_tglterimasptpd
 * @property string $tbltransaksiketetapan_tglketetapan
 * @property string $tbltransaksiketetapan_tgljatuhtempo
 * @property string $tbltransaksiketetapan_nokohirketetapan
 * @property string $tbltransaksiketetapan_persenbunga
 * @property integer $tbltransaksiketetapan_bulanbunga
 * @property string $tbltransaksiketetapan_rupiahbunga
 * @property string $tbltransaksiketetapan_rupiahdenda
 * @property string $tbltransaksiketetapan_pajakketetapan
 * @property string $tbltransaksiketetapan_nosspd
 * @property string $tgl_kirim
 * @property string $tgl_terima
 * @property string $tbltransaksiketetapan_tglsetor
 * @property integer $tbltransaksiketetapan_viabayar
 * @property string $tbltransaksiketetapan_kodeskpd
 * @property string $tbltransaksiketetapan_jumlahsetor
 * @property integer $tbltransaksiketetapan_statustetap
 * @property string $tbltransaksiketetapan_tglreg
 * @property string $tbltransaksiketetapan_noreg
 * @property string $tbltransaksiketetapan_tgltunggakan
 * @property string $tbltransaksiketetapan_jumlahtunggakan
 * @property string $tbltransaksiketetapan_noregtunggakan
 * @property integer $tbltransaksiketetapan_cgantung
 * @property integer $tbltransaksiketetapan_tahunpajak
 * @property integer $tbltransaksiketetapan_bulanpajak
 * @property string $tbltransaksiketetapan_tgltempo
 * @property integer $tblpengguna_penggunapendataanid
 * @property integer $tblpengguna_penggunapenetapanid
 * @property integer $tblpengguna_penggunapenyetoranid
 * @property string $tbltransaksiketetapan_istetap
 * @property string $tbltransaksiketetapan_isskpdkb
 * @property string $tbltransaksiketetapan_isskpdangsur
 * @property string $tbltransaksiketetapan_isskpdnihil
 * @property string $tbltransaksiketetapan_isskpdlb
 * @property string $tbltransaksiketetapan_ispiutang
 * @property string $tbltransaksiketetapan_isbataltetap
 * @property string $tbltransaksiketetapan_isterbayar
 * @property string $tbltransaksiketetapan_iscetaksspd
 * @property string $tbltransaksiketetapan_persenpengurangan
 * @property string $tbltransaksiketetapan_pajakpengurangan
 */
class TransaksiKetetapan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbltransaksiketetapan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbltransaksiketetapan_tahunpajak', 'required'),
			array('tbltransaksiketetapan_isregister, tbltransaksiketetapan_ispembukuan, tbltransaksiketetapan_bulanbunga, tbltransaksiketetapan_viabayar, tbltransaksiketetapan_statustetap, tbltransaksiketetapan_cgantung, tbltransaksiketetapan_tahunpajak, tbltransaksiketetapan_bulanpajak, tblpengguna_penggunapendataanid, tblpengguna_penggunapenetapanid, tblpengguna_penggunapenyetoranid', 'numerical', 'integerOnly'=>true),
			array('tblobyek_id', 'length', 'max'=>20),
			array('refjenistransaksi_id', 'length', 'max'=>2),
			array('tbltransaksiketetapan_ke, tbltransaksiketetapan_tarif, tbltransaksiketetapan_omzetindustri, tbltransaksiketetapan_omzetnonindustri, tbltransaksiketetapan_omzettotal, tbltransaksiketetapan_pajakindustri, tbltransaksiketetapan_pajaknonindustri, tbltransaksiketetapan_pajak, tbltransaksiketetapan_carapenetapan, tbltransaksiketetapan_nokohirketetapan, tbltransaksiketetapan_persenbunga, tbltransaksiketetapan_rupiahbunga, tbltransaksiketetapan_rupiahdenda, tbltransaksiketetapan_pajakketetapan, tbltransaksiketetapan_jumlahsetor, tbltransaksiketetapan_noreg, tbltransaksiketetapan_jumlahtunggakan, tbltransaksiketetapan_noregtunggakan, tbltransaksiketetapan_pajakpengurangan', 'length', 'max'=>18),
			array('tblmasterrekening_id, tbltransaksiketetapan_tarif2, tbltransaksiketetapan_persenpengurangan', 'length', 'max'=>10),
			array('tbltransaksiketetapan_kodeskpd', 'length', 'max'=>15),
			array('tbltransaksiketetapan_istetap, tbltransaksiketetapan_isskpdkb, tbltransaksiketetapan_isskpdangsur, tbltransaksiketetapan_isskpdnihil, tbltransaksiketetapan_isskpdlb, tbltransaksiketetapan_ispiutang, tbltransaksiketetapan_isbataltetap, tbltransaksiketetapan_isterbayar, tbltransaksiketetapan_iscetaksspd', 'length', 'max'=>1),
			array('tbltransaksiketetapan_masaawal, tbltransaksiketetapan_masaakhir, tbltransaksiketetapan_tglentrisptpd, tbltransaksiketetapan_tglterimasptpd, tbltransaksiketetapan_tglketetapan, tbltransaksiketetapan_tgljatuhtempo, tgl_kirim, tgl_terima, tbltransaksiketetapan_tglsetor, tbltransaksiketetapan_tglreg, tbltransaksiketetapan_tgltunggakan, tbltransaksiketetapan_tgltempo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tbltransaksiketetapan_id, tblobyek_id, refjenistransaksi_id, tbltransaksiketetapan_ke, tbltransaksiketetapan_masaawal, tbltransaksiketetapan_masaakhir, tblmasterrekening_id, tbltransaksiketetapan_tarif, tbltransaksiketetapan_tarif2, tbltransaksiketetapan_isregister, tbltransaksiketetapan_ispembukuan, tbltransaksiketetapan_omzetindustri, tbltransaksiketetapan_omzetnonindustri, tbltransaksiketetapan_omzettotal, tbltransaksiketetapan_pajakindustri, tbltransaksiketetapan_pajaknonindustri, tbltransaksiketetapan_pajak, tbltransaksiketetapan_carapenetapan, tbltransaksiketetapan_tglentrisptpd, tbltransaksiketetapan_tglterimasptpd, tbltransaksiketetapan_tglketetapan, tbltransaksiketetapan_tgljatuhtempo, tbltransaksiketetapan_nokohirketetapan, tbltransaksiketetapan_persenbunga, tbltransaksiketetapan_bulanbunga, tbltransaksiketetapan_rupiahbunga, tbltransaksiketetapan_rupiahdenda, tbltransaksiketetapan_pajakketetapan, tbltransaksiketetapan_nosspd, tgl_kirim, tgl_terima, tbltransaksiketetapan_tglsetor, tbltransaksiketetapan_viabayar, tbltransaksiketetapan_kodeskpd, tbltransaksiketetapan_jumlahsetor, tbltransaksiketetapan_statustetap, tbltransaksiketetapan_tglreg, tbltransaksiketetapan_noreg, tbltransaksiketetapan_tgltunggakan, tbltransaksiketetapan_jumlahtunggakan, tbltransaksiketetapan_noregtunggakan, tbltransaksiketetapan_cgantung, tbltransaksiketetapan_tahunpajak, tbltransaksiketetapan_bulanpajak, tbltransaksiketetapan_tgltempo, tblpengguna_penggunapendataanid, tblpengguna_penggunapenetapanid, tblpengguna_penggunapenyetoranid, tbltransaksiketetapan_istetap, tbltransaksiketetapan_isskpdkb, tbltransaksiketetapan_isskpdangsur, tbltransaksiketetapan_isskpdnihil, tbltransaksiketetapan_isskpdlb, tbltransaksiketetapan_ispiutang, tbltransaksiketetapan_isbataltetap, tbltransaksiketetapan_isterbayar, tbltransaksiketetapan_iscetaksspd, tbltransaksiketetapan_persenpengurangan, tbltransaksiketetapan_pajakpengurangan', 'safe', 'on'=>'search'),
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
			'tbltransaksiketetapan_id' => 'Tbltransaksiketetapan',
			'tblobyek_id' => 'Tblobyek',
			'refjenistransaksi_id' => 'Refjenistransaksi',
			'tbltransaksiketetapan_ke' => 'Tbltransaksiketetapan Ke',
			'tbltransaksiketetapan_masaawal' => 'Tbltransaksiketetapan Masaawal',
			'tbltransaksiketetapan_masaakhir' => 'Tbltransaksiketetapan Masaakhir',
			'tblmasterrekening_id' => 'Refrekening',
			'tbltransaksiketetapan_tarif' => 'Tbltransaksiketetapan Tarif',
			'tbltransaksiketetapan_tarif2' => 'Tbltransaksiketetapan Tarif2',
			'tbltransaksiketetapan_isregister' => 'Tbltransaksiketetapan Isregister',
			'tbltransaksiketetapan_ispembukuan' => 'Tbltransaksiketetapan Ispembukuan',
			'tbltransaksiketetapan_omzetindustri' => 'Tbltransaksiketetapan Omzetindustri',
			'tbltransaksiketetapan_omzetnonindustri' => 'Tbltransaksiketetapan Omzetnonindustri',
			'tbltransaksiketetapan_omzettotal' => 'Tbltransaksiketetapan Omzettotal',
			'tbltransaksiketetapan_pajakindustri' => 'Tbltransaksiketetapan Pajakindustri',
			'tbltransaksiketetapan_pajaknonindustri' => 'Tbltransaksiketetapan Pajaknonindustri',
			'tbltransaksiketetapan_pajak' => 'Tbltransaksiketetapan Pajak',
			'tbltransaksiketetapan_carapenetapan' => 'Tbltransaksiketetapan Carapenetapan',
			'tbltransaksiketetapan_tglentrisptpd' => 'Tbltransaksiketetapan Tglentrisptpd',
			'tbltransaksiketetapan_tglterimasptpd' => 'Tbltransaksiketetapan Tglterimasptpd',
			'tbltransaksiketetapan_tglketetapan' => 'Tbltransaksiketetapan Tglketetapan',
			'tbltransaksiketetapan_tgljatuhtempo' => 'Tbltransaksiketetapan Tgljatuhtempo',
			'tbltransaksiketetapan_nokohirketetapan' => 'Tbltransaksiketetapan Nokohirketetapan',
			'tbltransaksiketetapan_persenbunga' => 'Tbltransaksiketetapan Persenbunga',
			'tbltransaksiketetapan_bulanbunga' => 'Tbltransaksiketetapan Bulanbunga',
			'tbltransaksiketetapan_rupiahbunga' => 'Tbltransaksiketetapan Rupiahbunga',
			'tbltransaksiketetapan_rupiahdenda' => 'Tbltransaksiketetapan Rupiahdenda',
			'tbltransaksiketetapan_pajakketetapan' => 'Tbltransaksiketetapan Pajakketetapan',
			'tbltransaksiketetapan_nosspd' => 'Tbltransaksiketetapan Nosspd',
			'tgl_kirim' => 'Tgl Kirim',
			'tgl_terima' => 'Tgl Terima',
			'tbltransaksiketetapan_tglsetor' => 'Tbltransaksiketetapan Tglsetor',
			'tbltransaksiketetapan_viabayar' => 'Tbltransaksiketetapan Viabayar',
			'tbltransaksiketetapan_kodeskpd' => 'Tbltransaksiketetapan Kodeskpd',
			'tbltransaksiketetapan_jumlahsetor' => 'Tbltransaksiketetapan Jumlahsetor',
			'tbltransaksiketetapan_statustetap' => 'Tbltransaksiketetapan Statustetap',
			'tbltransaksiketetapan_tglreg' => 'Tbltransaksiketetapan Tglreg',
			'tbltransaksiketetapan_noreg' => 'Tbltransaksiketetapan Noreg',
			'tbltransaksiketetapan_tgltunggakan' => 'Tbltransaksiketetapan Tgltunggakan',
			'tbltransaksiketetapan_jumlahtunggakan' => 'Tbltransaksiketetapan Jumlahtunggakan',
			'tbltransaksiketetapan_noregtunggakan' => 'Tbltransaksiketetapan Noregtunggakan',
			'tbltransaksiketetapan_cgantung' => 'Tbltransaksiketetapan Cgantung',
			'tbltransaksiketetapan_tahunpajak' => 'Tbltransaksiketetapan Tahunpajak',
			'tbltransaksiketetapan_bulanpajak' => 'Tbltransaksiketetapan Bulanpajak',
			'tbltransaksiketetapan_tgltempo' => 'Tbltransaksiketetapan Tgltempo',
			'tblpengguna_penggunapendataanid' => 'Tblpengguna Penggunapendaftaranid',
			'tblpengguna_penggunapenetapanid' => 'Tblpengguna Penggunapenetapanid',
			'tblpengguna_penggunapenyetoranid' => 'Tblpengguna Penggunapenyetoranid',
			'tbltransaksiketetapan_istetap' => 'Tbltransaksiketetapan Istetap',
			'tbltransaksiketetapan_isskpdkb' => 'Tbltransaksiketetapan Isskpdkb',
			'tbltransaksiketetapan_isskpdangsur' => 'Tbltransaksiketetapan Isskpdangsur',
			'tbltransaksiketetapan_isskpdnihil' => 'Tbltransaksiketetapan Isskpdnihil',
			'tbltransaksiketetapan_isskpdlb' => 'Tbltransaksiketetapan Isskpdlb',
			'tbltransaksiketetapan_ispiutang' => 'Tbltransaksiketetapan Ispiutang',
			'tbltransaksiketetapan_isbataltetap' => 'Tbltransaksiketetapan Isbataltetap',
			'tbltransaksiketetapan_isterbayar' => 'Tbltransaksiketetapan Isterbayar',
			'tbltransaksiketetapan_iscetaksspd' => 'Tbltransaksiketetapan Iscetaksspd',
			'tbltransaksiketetapan_persenpengurangan' => 'Tbltransaksiketetapan Persenpengurangan',
			'tbltransaksiketetapan_pajakpengurangan' => 'Tbltransaksiketetapan Pajakpengurangan',
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

		$criteria->compare('tbltransaksiketetapan_id',$this->tbltransaksiketetapan_id);
		$criteria->compare('tblobyek_id',$this->tblobyek_id,true);
		$criteria->compare('refjenistransaksi_id',$this->refjenistransaksi_id,true);
		$criteria->compare('tbltransaksiketetapan_ke',$this->tbltransaksiketetapan_ke,true);
		$criteria->compare('tbltransaksiketetapan_masaawal',$this->tbltransaksiketetapan_masaawal,true);
		$criteria->compare('tbltransaksiketetapan_masaakhir',$this->tbltransaksiketetapan_masaakhir,true);
		$criteria->compare('tblmasterrekening_id',$this->tblmasterrekening_id,true);
		$criteria->compare('tbltransaksiketetapan_tarif',$this->tbltransaksiketetapan_tarif,true);
		$criteria->compare('tbltransaksiketetapan_tarif2',$this->tbltransaksiketetapan_tarif2,true);
		$criteria->compare('tbltransaksiketetapan_isregister',$this->tbltransaksiketetapan_isregister);
		$criteria->compare('tbltransaksiketetapan_ispembukuan',$this->tbltransaksiketetapan_ispembukuan);
		$criteria->compare('tbltransaksiketetapan_omzetindustri',$this->tbltransaksiketetapan_omzetindustri,true);
		$criteria->compare('tbltransaksiketetapan_omzetnonindustri',$this->tbltransaksiketetapan_omzetnonindustri,true);
		$criteria->compare('tbltransaksiketetapan_omzettotal',$this->tbltransaksiketetapan_omzettotal,true);
		$criteria->compare('tbltransaksiketetapan_pajakindustri',$this->tbltransaksiketetapan_pajakindustri,true);
		$criteria->compare('tbltransaksiketetapan_pajaknonindustri',$this->tbltransaksiketetapan_pajaknonindustri,true);
		$criteria->compare('tbltransaksiketetapan_pajak',$this->tbltransaksiketetapan_pajak,true);
		$criteria->compare('tbltransaksiketetapan_carapenetapan',$this->tbltransaksiketetapan_carapenetapan,true);
		$criteria->compare('tbltransaksiketetapan_tglentrisptpd',$this->tbltransaksiketetapan_tglentrisptpd,true);
		$criteria->compare('tbltransaksiketetapan_tglterimasptpd',$this->tbltransaksiketetapan_tglterimasptpd,true);
		$criteria->compare('tbltransaksiketetapan_tglketetapan',$this->tbltransaksiketetapan_tglketetapan,true);
		$criteria->compare('tbltransaksiketetapan_tgljatuhtempo',$this->tbltransaksiketetapan_tgljatuhtempo,true);
		$criteria->compare('tbltransaksiketetapan_nokohirketetapan',$this->tbltransaksiketetapan_nokohirketetapan,true);
		$criteria->compare('tbltransaksiketetapan_persenbunga',$this->tbltransaksiketetapan_persenbunga,true);
		$criteria->compare('tbltransaksiketetapan_bulanbunga',$this->tbltransaksiketetapan_bulanbunga);
		$criteria->compare('tbltransaksiketetapan_rupiahbunga',$this->tbltransaksiketetapan_rupiahbunga,true);
		$criteria->compare('tbltransaksiketetapan_rupiahdenda',$this->tbltransaksiketetapan_rupiahdenda,true);
		$criteria->compare('tbltransaksiketetapan_pajakketetapan',$this->tbltransaksiketetapan_pajakketetapan,true);
		$criteria->compare('tbltransaksiketetapan_nosspd',$this->tbltransaksiketetapan_nosspd,true);
		$criteria->compare('tgl_kirim',$this->tgl_kirim,true);
		$criteria->compare('tgl_terima',$this->tgl_terima,true);
		$criteria->compare('tbltransaksiketetapan_tglsetor',$this->tbltransaksiketetapan_tglsetor,true);
		$criteria->compare('tbltransaksiketetapan_viabayar',$this->tbltransaksiketetapan_viabayar);
		$criteria->compare('tbltransaksiketetapan_kodeskpd',$this->tbltransaksiketetapan_kodeskpd,true);
		$criteria->compare('tbltransaksiketetapan_jumlahsetor',$this->tbltransaksiketetapan_jumlahsetor,true);
		$criteria->compare('tbltransaksiketetapan_statustetap',$this->tbltransaksiketetapan_statustetap);
		$criteria->compare('tbltransaksiketetapan_tglreg',$this->tbltransaksiketetapan_tglreg,true);
		$criteria->compare('tbltransaksiketetapan_noreg',$this->tbltransaksiketetapan_noreg,true);
		$criteria->compare('tbltransaksiketetapan_tgltunggakan',$this->tbltransaksiketetapan_tgltunggakan,true);
		$criteria->compare('tbltransaksiketetapan_jumlahtunggakan',$this->tbltransaksiketetapan_jumlahtunggakan,true);
		$criteria->compare('tbltransaksiketetapan_noregtunggakan',$this->tbltransaksiketetapan_noregtunggakan,true);
		$criteria->compare('tbltransaksiketetapan_cgantung',$this->tbltransaksiketetapan_cgantung);
		$criteria->compare('tbltransaksiketetapan_tahunpajak',$this->tbltransaksiketetapan_tahunpajak);
		$criteria->compare('tbltransaksiketetapan_bulanpajak',$this->tbltransaksiketetapan_bulanpajak);
		$criteria->compare('tbltransaksiketetapan_tgltempo',$this->tbltransaksiketetapan_tgltempo,true);
		$criteria->compare('tblpengguna_penggunapendataanid',$this->tblpengguna_penggunapendataanid);
		$criteria->compare('tblpengguna_penggunapenetapanid',$this->tblpengguna_penggunapenetapanid);
		$criteria->compare('tblpengguna_penggunapenyetoranid',$this->tblpengguna_penggunapenyetoranid);
		$criteria->compare('tbltransaksiketetapan_istetap',$this->tbltransaksiketetapan_istetap,true);
		$criteria->compare('tbltransaksiketetapan_isskpdkb',$this->tbltransaksiketetapan_isskpdkb,true);
		$criteria->compare('tbltransaksiketetapan_isskpdangsur',$this->tbltransaksiketetapan_isskpdangsur,true);
		$criteria->compare('tbltransaksiketetapan_isskpdnihil',$this->tbltransaksiketetapan_isskpdnihil,true);
		$criteria->compare('tbltransaksiketetapan_isskpdlb',$this->tbltransaksiketetapan_isskpdlb,true);
		$criteria->compare('tbltransaksiketetapan_ispiutang',$this->tbltransaksiketetapan_ispiutang,true);
		$criteria->compare('tbltransaksiketetapan_isbataltetap',$this->tbltransaksiketetapan_isbataltetap,true);
		$criteria->compare('tbltransaksiketetapan_isterbayar',$this->tbltransaksiketetapan_isterbayar,true);
		$criteria->compare('tbltransaksiketetapan_iscetaksspd',$this->tbltransaksiketetapan_iscetaksspd,true);
		$criteria->compare('tbltransaksiketetapan_persenpengurangan',$this->tbltransaksiketetapan_persenpengurangan,true);
		$criteria->compare('tbltransaksiketetapan_pajakpengurangan',$this->tbltransaksiketetapan_pajakpengurangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TransaksiKetetapan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

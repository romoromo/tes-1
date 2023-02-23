
<?php

/**
 * This is the model class for table "TBLDAFTHOTEL".
 *
 * The followings are the available columns in table 'TBLDAFTHOTEL':
 * @property string $TBLDAFTHOTEL_THNPAJAK
 * @property string $TBLDAFTHOTEL_BLNPAJAK
 * @property string $TBLDAFTHOTEL_TGLPAJAK
 * @property string $TBLDAFTHOTEL_PAJAKKE
 * @property string $TBLDAFTHOTEL_JNSPENDAPATAN
 * @property string $TBLDAFTHOTEL_GOLONGAN
 * @property string $TBLDAFTHOTEL_NOPOK
 * @property string $TBLKECAMATAN_ID
 * @property string $TBLKELURAHAN_ID
 * @property string $TBLDAFTHOTEL_REKURUSAN
 * @property string $TBLDAFTHOTEL_REKPEMERINTAHAN
 * @property string $TBLDAFTHOTEL_REKORGANISASI
 * @property string $TBLDAFTHOTEL_REKPROGRAM
 * @property string $TBLDAFTHOTEL_REKKEGIATAN
 * @property string $TBLDAFTHOTEL_REKDINAS
 * @property string $TBLDAFTHOTEL_REKBIDANG
 * @property string $TBLDAFTHOTEL_REKPENDAPATAN
 * @property string $TBLDAFTHOTEL_REKPAD
 * @property string $TBLDAFTHOTEL_REKPAJAK
 * @property string $TBLDAFTHOTEL_REKAYAT
 * @property string $TBLDAFTHOTEL_REKJENIS
 * @property string $TBLDAFTHOTEL_REKSUBJENIS
 * @property string $TBLDAFTHOTEL_REKBADANUSAHA
 * @property string $TBLDAFTHOTEL_ISKAS
 * @property string $TBLDAFTHOTEL_ISPEMBUKUAN
 * @property string $TBLDAFTHOTEL_ISNOTA
 * @property string $TBLDAFTHOTEL_ISJNSPENETAPAN
 * @property string $TBLDAFTHOTEL_THNMULAIJUAL
 * @property string $TBLDAFTHOTEL_BLNMULAIJUAL
 * @property string $TBLDAFTHOTEL_TGLMULAIJUAL
 * @property string $TBLDAFTHOTEL_THNAKHIRJUAL
 * @property string $TBLDAFTHOTEL_BLNAKHIRJUAL
 * @property string $TBLDAFTHOTEL_TGLAKHIRJUAL
 * @property string $TBLDAFTHOTEL_JUMLAHHARIJUAL
 * @property string $TBLDAFTHOTEL_OMSETPAJAK
 * @property string $TBLDAFTHOTEL_PERSENTARIF
 * @property string $TBLDAFTHOTEL_PAJAK
 * @property string $TBLDAFTHOTEL_THNSPTPD
 * @property string $TBLDAFTHOTEL_BLNSPTPD
 * @property string $TBLDAFTHOTEL_TGLSPTPD
 * @property string $TBLDAFTHOTEL_AYATSPTPD
 * @property string $TBLDAFTHOTEL_BUNGASPTPD
 * @property string $TBLDAFTHOTEL_THNBATASSPTPD
 * @property string $TBLDAFTHOTEL_BLNBATASSPTPD
 * @property string $TBLDAFTHOTEL_TGLBATASSPTPD
 * @property string $TBLDAFTHOTEL_THNTERIMA
 * @property string $TBLDAFTHOTEL_BLNTERIMA
 * @property string $TBLDAFTHOTEL_TGLTERIMA
 * @property string $TBLDAFTHOTEL_THNENTRI
 * @property string $TBLDAFTHOTEL_BLNENTRI
 * @property string $TBLDAFTHOTEL_TGLENTRI
 * @property string $TBLDAFTHOTEL_THNSKPD
 * @property string $TBLDAFTHOTEL_BLNSKPD
 * @property string $TBLDAFTHOTEL_TGLSKPD
 * @property string $TBLDAFTHOTEL_AYATSKPD
 * @property string $TBLDAFTHOTEL_NOMORSKPD
 * @property string $TBLDAFTHOTEL_URUTSKPD
 * @property string $TBLDAFTHOTEL_PAJAKSKPD
 * @property string $TBLDAFTHOTEL_THNBATASSKPD
 * @property string $TBLDAFTHOTEL_BLNBATASSKPD
 * @property string $TBLDAFTHOTEL_TGLBATASSKPD
 * @property string $TBLDAFTHOTEL_THTERIMASKPD
 * @property string $TBLDAFTHOTEL_BLNTERIMASKPD
 * @property string $TBLDAFTHOTEL_TGLTERIMASKPD
 * @property string $TBLDAFTHOTEL_TGLPERIKSA
 * @property string $TBLDAFTHOTEL_BLNPERIKSA
 * @property string $TBLDAFTHOTEL_THNPERIKSA
 * @property string $TBLDAFTHOTEL_NOMORPERIKSA
 * @property string $TBLDAFTHOTEL_OMSETPERIKSA
 * @property string $TBLDAFTHOTEL_PAJAKPERIKSA
 * @property string $TBLDAFTHOTEL_THNKURANGBAYAR
 * @property string $TBLDAFTHOTEL_BLNKURANGBAYAR
 * @property string $TBLDAFTHOTEL_TGLKURANGBAYAR
 * @property string $TBLDAFTHOTEL_AYTKURANGBAYAR
 * @property string $TBLDAFTHOTEL_REGKURANGBAYAR
 * @property string $TBLDAFTHOTEL_URUTKURANGBAYAR
 * @property string $TBLDAFTHOTEL_KURANGBAYARKE
 * @property string $TBLDAFTHOTEL_BUNGAKRGBAYAR
 * @property string $TBLDAFTHOTEL_DENDAKRGBAYAR
 * @property string $TBLDAFTHOTEL_RUPIAHKRGBAYAR
 * @property string $TBLDAFTHOTEL_THNBTSKRGBAYAR
 * @property string $TBLDAFTHOTEL_BLNBTSKRGBAYAR
 * @property string $TBLDAFTHOTEL_TGLBTSKRGBAYAR
 * @property string $TBLDAFTHOTEL_THNTRMKRGBAYAR
 * @property string $TBLDAFTHOTEL_BLNTRMKRGBAYAR
 * @property string $TBLDAFTHOTEL_TGLTRMKRGBAYAR
 * @property string $TBLDAFTHOTEL_TAHUNNIHIL
 * @property string $TBLDAFTHOTEL_BULANNIHIL
 * @property string $TBLDAFTHOTEL_TANGGLNIHIL
 * @property string $TBLDAFTHOTEL_AYATNIHIL
 * @property string $TBLDAFTHOTEL_REGNIHIL
 * @property string $TBLDAFTHOTEL_URUTNIHIL
 * @property string $TBLDAFTHOTEL_TAHUNSETOR
 * @property string $TBLDAFTHOTEL_BULANSETOR
 * @property string $TBLDAFTHOTEL_TANGGALSETOR
 * @property string $TBLDAFTHOTEL_AYATSETOR
 * @property string $TBLDAFTHOTEL_REGSETOR
 * @property string $TBLDAFTHOTEL_SETORKE
 * @property string $TBLDAFTHOTEL_RUPIAHSETOR
 * @property string $TBLDAFTHOTEL_TIPESETOR
 * @property string $TBLDAFTHOTEL_ISLUNAS
 * @property string $TBLDAFTHOTEL_THNENTRISETOR
 * @property string $TBLDAFTHOTEL_BLNENTRISETOR
 * @property string $TBLDAFTHOTEL_TGLENTRISETOR
 * @property string $TBLDAFTHOTEL_THNSURATTAGIHAN
 * @property string $TBLDAFTHOTEL_BLNSURATTAGIHAN
 * @property string $TBLDAFTHOTEL_TGLSURATTAGIHAN
 * @property string $TBLDAFTHOTEL_AYTSURATTAGIHAN
 * @property string $TBLDAFTHOTEL_NOSURATTAGIHAN
 * @property string $TBLDAFTHOTEL_SURATTAGIHANKE
 * @property string $TBLDAFTHOTEL_BUNGATAGIHAN
 * @property string $TBLDAFTHOTEL_DENDATAGIHAN
 * @property string $TBLDAFTHOTEL_RUPIAHTAGIHAN
 * @property string $TBLDAFTHOTEL_THNBTSTAGIHAN
 * @property string $TBLDAFTHOTEL_BLNBTSTAGIHAN
 * @property string $TBLDAFTHOTEL_TGLBTSTAGIHAN
 * @property string $TBLDAFTHOTEL_THNTRMTAGIHAN
 * @property string $TBLDAFTHOTEL_BLNTRMTAGIHAN
 * @property string $TBLDAFTHOTEL_TGLTRMTAGIHAN
 * @property string $TBLDAFTHOTEL_THNSURATANGSUR
 * @property string $TBLDAFTHOTEL_BLNSURATANGSUR
 * @property string $TBLDAFTHOTEL_TGLSURATANGSUR
 * @property string $TBLDAFTHOTEL_REGSURATANGSUR
 * @property string $TBLDAFTHOTEL_BLNKBAWAL
 * @property string $TBLDAFTHOTEL_BLNKBAKHIR
 * @property string $TBLDAFTHOTEL_JUMLAHANGSUR
 * @property string $TBLDAFTHOTEL_POKOKTAMBAHAN
 * @property string $TBLDAFTHOTEL_BUNGATAMBAHAN
 */
class TBLDAFTHOTEL extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'TBLDAFTHOTEL';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('TBLDAFTHOTEL_THNPAJAK, TBLDAFTHOTEL_BLNPAJAK, TBLDAFTHOTEL_TGLPAJAK, TBLDAFTHOTEL_PAJAKKE, TBLDAFTHOTEL_GOLONGAN, TBLDAFTHOTEL_NOPOK, TBLKECAMATAN_ID, TBLKELURAHAN_ID, TBLDAFTHOTEL_REKURUSAN, TBLDAFTHOTEL_REKPEMERINTAHAN, TBLDAFTHOTEL_REKORGANISASI, TBLDAFTHOTEL_REKPROGRAM, TBLDAFTHOTEL_REKKEGIATAN, TBLDAFTHOTEL_REKDINAS, TBLDAFTHOTEL_REKBIDANG, TBLDAFTHOTEL_REKPENDAPATAN, TBLDAFTHOTEL_REKPAD, TBLDAFTHOTEL_REKPAJAK, TBLDAFTHOTEL_REKAYAT, TBLDAFTHOTEL_REKJENIS, TBLDAFTHOTEL_REKSUBJENIS, TBLDAFTHOTEL_THNMULAIJUAL, TBLDAFTHOTEL_BLNMULAIJUAL, TBLDAFTHOTEL_TGLMULAIJUAL, TBLDAFTHOTEL_THNAKHIRJUAL, TBLDAFTHOTEL_BLNAKHIRJUAL, TBLDAFTHOTEL_TGLAKHIRJUAL, TBLDAFTHOTEL_JUMLAHHARIJUAL, TBLDAFTHOTEL_PERSENTARIF, TBLDAFTHOTEL_THNSPTPD, TBLDAFTHOTEL_BLNSPTPD, TBLDAFTHOTEL_TGLSPTPD, TBLDAFTHOTEL_BUNGASPTPD, TBLDAFTHOTEL_THNBATASSPTPD, TBLDAFTHOTEL_BLNBATASSPTPD, TBLDAFTHOTEL_TGLBATASSPTPD, TBLDAFTHOTEL_THNTERIMA, TBLDAFTHOTEL_BLNTERIMA, TBLDAFTHOTEL_TGLTERIMA, TBLDAFTHOTEL_THNENTRI, TBLDAFTHOTEL_BLNENTRI, TBLDAFTHOTEL_TGLENTRI, TBLDAFTHOTEL_THNSKPD, TBLDAFTHOTEL_BLNSKPD, TBLDAFTHOTEL_TGLSKPD, TBLDAFTHOTEL_URUTSKPD, TBLDAFTHOTEL_THNBATASSKPD, TBLDAFTHOTEL_BLNBATASSKPD, TBLDAFTHOTEL_TGLBATASSKPD, TBLDAFTHOTEL_THTERIMASKPD, TBLDAFTHOTEL_BLNTERIMASKPD, TBLDAFTHOTEL_TGLTERIMASKPD, TBLDAFTHOTEL_TGLPERIKSA, TBLDAFTHOTEL_BLNPERIKSA, TBLDAFTHOTEL_THNPERIKSA, TBLDAFTHOTEL_OMSETPERIKSA, TBLDAFTHOTEL_THNKURANGBAYAR, TBLDAFTHOTEL_BLNKURANGBAYAR, TBLDAFTHOTEL_TGLKURANGBAYAR, TBLDAFTHOTEL_URUTKURANGBAYAR, TBLDAFTHOTEL_KURANGBAYARKE, TBLDAFTHOTEL_THNBTSKRGBAYAR, TBLDAFTHOTEL_BLNBTSKRGBAYAR, TBLDAFTHOTEL_TGLBTSKRGBAYAR, TBLDAFTHOTEL_THNTRMKRGBAYAR, TBLDAFTHOTEL_BLNTRMKRGBAYAR, TBLDAFTHOTEL_TGLTRMKRGBAYAR, TBLDAFTHOTEL_TAHUNNIHIL, TBLDAFTHOTEL_BULANNIHIL, TBLDAFTHOTEL_TANGGLNIHIL, TBLDAFTHOTEL_URUTNIHIL, TBLDAFTHOTEL_TAHUNSETOR, TBLDAFTHOTEL_BULANSETOR, TBLDAFTHOTEL_TANGGALSETOR, TBLDAFTHOTEL_SETORKE, TBLDAFTHOTEL_THNENTRISETOR, TBLDAFTHOTEL_BLNENTRISETOR, TBLDAFTHOTEL_TGLENTRISETOR, TBLDAFTHOTEL_THNSURATTAGIHAN, TBLDAFTHOTEL_BLNSURATTAGIHAN, TBLDAFTHOTEL_TGLSURATTAGIHAN, TBLDAFTHOTEL_SURATTAGIHANKE, TBLDAFTHOTEL_THNBTSTAGIHAN, TBLDAFTHOTEL_BLNBTSTAGIHAN, TBLDAFTHOTEL_TGLBTSTAGIHAN, TBLDAFTHOTEL_THNTRMTAGIHAN, TBLDAFTHOTEL_BLNTRMTAGIHAN, TBLDAFTHOTEL_TGLTRMTAGIHAN, TBLDAFTHOTEL_THNSURATANGSUR, TBLDAFTHOTEL_BLNSURATANGSUR, TBLDAFTHOTEL_TGLSURATANGSUR, TBLDAFTHOTEL_REGSURATANGSUR', 'length', 'max'=>65),
            array('TBLDAFTHOTEL_JNSPENDAPATAN, TBLDAFTHOTEL_ISKAS, TBLDAFTHOTEL_ISPEMBUKUAN, TBLDAFTHOTEL_ISNOTA, TBLDAFTHOTEL_ISJNSPENETAPAN, TBLDAFTHOTEL_AYATSPTPD, TBLDAFTHOTEL_AYATSKPD, TBLDAFTHOTEL_AYTKURANGBAYAR, TBLDAFTHOTEL_AYATNIHIL, TBLDAFTHOTEL_AYATSETOR, TBLDAFTHOTEL_TIPESETOR, TBLDAFTHOTEL_ISLUNAS, TBLDAFTHOTEL_AYTSURATTAGIHAN', 'length', 'max'=>1),
            array('TBLDAFTHOTEL_REKBADANUSAHA', 'length', 'max'=>3),
            array('TBLDAFTHOTEL_OMSETPAJAK', 'length', 'max'=>15),
            array('TBLDAFTHOTEL_PAJAK, TBLDAFTHOTEL_PAJAKSKPD, TBLDAFTHOTEL_PAJAKPERIKSA, TBLDAFTHOTEL_BUNGAKRGBAYAR, TBLDAFTHOTEL_DENDAKRGBAYAR, TBLDAFTHOTEL_RUPIAHKRGBAYAR, TBLDAFTHOTEL_RUPIAHSETOR, TBLDAFTHOTEL_BUNGATAGIHAN, TBLDAFTHOTEL_DENDATAGIHAN, TBLDAFTHOTEL_RUPIAHTAGIHAN', 'length', 'max'=>16),
            array('TBLDAFTHOTEL_NOMORSKPD, TBLDAFTHOTEL_NOMORPERIKSA, TBLDAFTHOTEL_REGKURANGBAYAR, TBLDAFTHOTEL_REGNIHIL, TBLDAFTHOTEL_NOSURATTAGIHAN, TBLDAFTHOTEL_BLNKBAWAL, TBLDAFTHOTEL_BLNKBAKHIR, TBLDAFTHOTEL_JUMLAHANGSUR', 'length', 'max'=>6),
            array('TBLDAFTHOTEL_REGSETOR', 'length', 'max'=>7),
            array('TBLDAFTHOTEL_POKOKTAMBAHAN, TBLDAFTHOTEL_BUNGATAMBAHAN', 'length', 'max'=>19),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('TBLDAFTHOTEL_THNPAJAK, TBLDAFTHOTEL_BLNPAJAK, TBLDAFTHOTEL_TGLPAJAK, TBLDAFTHOTEL_PAJAKKE, TBLDAFTHOTEL_JNSPENDAPATAN, TBLDAFTHOTEL_GOLONGAN, TBLDAFTHOTEL_NOPOK, TBLKECAMATAN_ID, TBLKELURAHAN_ID, TBLDAFTHOTEL_REKURUSAN, TBLDAFTHOTEL_REKPEMERINTAHAN, TBLDAFTHOTEL_REKORGANISASI, TBLDAFTHOTEL_REKPROGRAM, TBLDAFTHOTEL_REKKEGIATAN, TBLDAFTHOTEL_REKDINAS, TBLDAFTHOTEL_REKBIDANG, TBLDAFTHOTEL_REKPENDAPATAN, TBLDAFTHOTEL_REKPAD, TBLDAFTHOTEL_REKPAJAK, TBLDAFTHOTEL_REKAYAT, TBLDAFTHOTEL_REKJENIS, TBLDAFTHOTEL_REKSUBJENIS, TBLDAFTHOTEL_REKBADANUSAHA, TBLDAFTHOTEL_ISKAS, TBLDAFTHOTEL_ISPEMBUKUAN, TBLDAFTHOTEL_ISNOTA, TBLDAFTHOTEL_ISJNSPENETAPAN, TBLDAFTHOTEL_THNMULAIJUAL, TBLDAFTHOTEL_BLNMULAIJUAL, TBLDAFTHOTEL_TGLMULAIJUAL, TBLDAFTHOTEL_THNAKHIRJUAL, TBLDAFTHOTEL_BLNAKHIRJUAL, TBLDAFTHOTEL_TGLAKHIRJUAL, TBLDAFTHOTEL_JUMLAHHARIJUAL, TBLDAFTHOTEL_OMSETPAJAK, TBLDAFTHOTEL_PERSENTARIF, TBLDAFTHOTEL_PAJAK, TBLDAFTHOTEL_THNSPTPD, TBLDAFTHOTEL_BLNSPTPD, TBLDAFTHOTEL_TGLSPTPD, TBLDAFTHOTEL_AYATSPTPD, TBLDAFTHOTEL_BUNGASPTPD, TBLDAFTHOTEL_THNBATASSPTPD, TBLDAFTHOTEL_BLNBATASSPTPD, TBLDAFTHOTEL_TGLBATASSPTPD, TBLDAFTHOTEL_THNTERIMA, TBLDAFTHOTEL_BLNTERIMA, TBLDAFTHOTEL_TGLTERIMA, TBLDAFTHOTEL_THNENTRI, TBLDAFTHOTEL_BLNENTRI, TBLDAFTHOTEL_TGLENTRI, TBLDAFTHOTEL_THNSKPD, TBLDAFTHOTEL_BLNSKPD, TBLDAFTHOTEL_TGLSKPD, TBLDAFTHOTEL_AYATSKPD, TBLDAFTHOTEL_NOMORSKPD, TBLDAFTHOTEL_URUTSKPD, TBLDAFTHOTEL_PAJAKSKPD, TBLDAFTHOTEL_THNBATASSKPD, TBLDAFTHOTEL_BLNBATASSKPD, TBLDAFTHOTEL_TGLBATASSKPD, TBLDAFTHOTEL_THTERIMASKPD, TBLDAFTHOTEL_BLNTERIMASKPD, TBLDAFTHOTEL_TGLTERIMASKPD, TBLDAFTHOTEL_TGLPERIKSA, TBLDAFTHOTEL_BLNPERIKSA, TBLDAFTHOTEL_THNPERIKSA, TBLDAFTHOTEL_NOMORPERIKSA, TBLDAFTHOTEL_OMSETPERIKSA, TBLDAFTHOTEL_PAJAKPERIKSA, TBLDAFTHOTEL_THNKURANGBAYAR, TBLDAFTHOTEL_BLNKURANGBAYAR, TBLDAFTHOTEL_TGLKURANGBAYAR, TBLDAFTHOTEL_AYTKURANGBAYAR, TBLDAFTHOTEL_REGKURANGBAYAR, TBLDAFTHOTEL_URUTKURANGBAYAR, TBLDAFTHOTEL_KURANGBAYARKE, TBLDAFTHOTEL_BUNGAKRGBAYAR, TBLDAFTHOTEL_DENDAKRGBAYAR, TBLDAFTHOTEL_RUPIAHKRGBAYAR, TBLDAFTHOTEL_THNBTSKRGBAYAR, TBLDAFTHOTEL_BLNBTSKRGBAYAR, TBLDAFTHOTEL_TGLBTSKRGBAYAR, TBLDAFTHOTEL_THNTRMKRGBAYAR, TBLDAFTHOTEL_BLNTRMKRGBAYAR, TBLDAFTHOTEL_TGLTRMKRGBAYAR, TBLDAFTHOTEL_TAHUNNIHIL, TBLDAFTHOTEL_BULANNIHIL, TBLDAFTHOTEL_TANGGLNIHIL, TBLDAFTHOTEL_AYATNIHIL, TBLDAFTHOTEL_REGNIHIL, TBLDAFTHOTEL_URUTNIHIL, TBLDAFTHOTEL_TAHUNSETOR, TBLDAFTHOTEL_BULANSETOR, TBLDAFTHOTEL_TANGGALSETOR, TBLDAFTHOTEL_AYATSETOR, TBLDAFTHOTEL_REGSETOR, TBLDAFTHOTEL_SETORKE, TBLDAFTHOTEL_RUPIAHSETOR, TBLDAFTHOTEL_TIPESETOR, TBLDAFTHOTEL_ISLUNAS, TBLDAFTHOTEL_THNENTRISETOR, TBLDAFTHOTEL_BLNENTRISETOR, TBLDAFTHOTEL_TGLENTRISETOR, TBLDAFTHOTEL_THNSURATTAGIHAN, TBLDAFTHOTEL_BLNSURATTAGIHAN, TBLDAFTHOTEL_TGLSURATTAGIHAN, TBLDAFTHOTEL_AYTSURATTAGIHAN, TBLDAFTHOTEL_NOSURATTAGIHAN, TBLDAFTHOTEL_SURATTAGIHANKE, TBLDAFTHOTEL_BUNGATAGIHAN, TBLDAFTHOTEL_DENDATAGIHAN, TBLDAFTHOTEL_RUPIAHTAGIHAN, TBLDAFTHOTEL_THNBTSTAGIHAN, TBLDAFTHOTEL_BLNBTSTAGIHAN, TBLDAFTHOTEL_TGLBTSTAGIHAN, TBLDAFTHOTEL_THNTRMTAGIHAN, TBLDAFTHOTEL_BLNTRMTAGIHAN, TBLDAFTHOTEL_TGLTRMTAGIHAN, TBLDAFTHOTEL_THNSURATANGSUR, TBLDAFTHOTEL_BLNSURATANGSUR, TBLDAFTHOTEL_TGLSURATANGSUR, TBLDAFTHOTEL_REGSURATANGSUR, TBLDAFTHOTEL_BLNKBAWAL, TBLDAFTHOTEL_BLNKBAKHIR, TBLDAFTHOTEL_JUMLAHANGSUR, TBLDAFTHOTEL_POKOKTAMBAHAN, TBLDAFTHOTEL_BUNGATAMBAHAN', 'safe', 'on'=>'search'),
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
            'TBLDAFTHOTEL_THNPAJAK' => 'Tbldafthotel Thnpajak',
            'TBLDAFTHOTEL_BLNPAJAK' => 'Tbldafthotel Blnpajak',
            'TBLDAFTHOTEL_TGLPAJAK' => 'Tbldafthotel Tglpajak',
            'TBLDAFTHOTEL_PAJAKKE' => 'Tbldafthotel Pajakke',
            'TBLDAFTHOTEL_JNSPENDAPATAN' => 'Tbldafthotel Jnspendapatan',
            'TBLDAFTHOTEL_GOLONGAN' => 'Tbldafthotel Golongan',
            'TBLDAFTHOTEL_NOPOK' => 'Tbldafthotel Nopok',
            'TBLKECAMATAN_ID' => 'Tblkecamatan',
            'TBLKELURAHAN_ID' => 'Tblkelurahan',
            'TBLDAFTHOTEL_REKURUSAN' => 'Tbldafthotel Rekurusan',
            'TBLDAFTHOTEL_REKPEMERINTAHAN' => 'Tbldafthotel Rekpemerintahan',
            'TBLDAFTHOTEL_REKORGANISASI' => 'Tbldafthotel Rekorganisasi',
            'TBLDAFTHOTEL_REKPROGRAM' => 'Tbldafthotel Rekprogram',
            'TBLDAFTHOTEL_REKKEGIATAN' => 'Tbldafthotel Rekkegiatan',
            'TBLDAFTHOTEL_REKDINAS' => 'Tbldafthotel Rekdinas',
            'TBLDAFTHOTEL_REKBIDANG' => 'Tbldafthotel Rekbidang',
            'TBLDAFTHOTEL_REKPENDAPATAN' => 'Tbldafthotel Rekpendapatan',
            'TBLDAFTHOTEL_REKPAD' => 'Tbldafthotel Rekpad',
            'TBLDAFTHOTEL_REKPAJAK' => 'Tbldafthotel Rekpajak',
            'TBLDAFTHOTEL_REKAYAT' => 'Tbldafthotel Rekayat',
            'TBLDAFTHOTEL_REKJENIS' => 'Tbldafthotel Rekjenis',
            'TBLDAFTHOTEL_REKSUBJENIS' => 'Tbldafthotel Reksubjenis',
            'TBLDAFTHOTEL_REKBADANUSAHA' => 'Tbldafthotel Rekbadanusaha',
            'TBLDAFTHOTEL_ISKAS' => 'Tbldafthotel Iskas',
            'TBLDAFTHOTEL_ISPEMBUKUAN' => 'Tbldafthotel Ispembukuan',
            'TBLDAFTHOTEL_ISNOTA' => 'Tbldafthotel Isnota',
            'TBLDAFTHOTEL_ISJNSPENETAPAN' => 'Tbldafthotel Isjnspenetapan',
            'TBLDAFTHOTEL_THNMULAIJUAL' => 'Tbldafthotel Thnmulaijual',
            'TBLDAFTHOTEL_BLNMULAIJUAL' => 'Tbldafthotel Blnmulaijual',
            'TBLDAFTHOTEL_TGLMULAIJUAL' => 'Tbldafthotel Tglmulaijual',
            'TBLDAFTHOTEL_THNAKHIRJUAL' => 'Tbldafthotel Thnakhirjual',
            'TBLDAFTHOTEL_BLNAKHIRJUAL' => 'Tbldafthotel Blnakhirjual',
            'TBLDAFTHOTEL_TGLAKHIRJUAL' => 'Tbldafthotel Tglakhirjual',
            'TBLDAFTHOTEL_JUMLAHHARIJUAL' => 'Tbldafthotel Jumlahharijual',
            'TBLDAFTHOTEL_OMSETPAJAK' => 'Tbldafthotel Omsetpajak',
            'TBLDAFTHOTEL_PERSENTARIF' => 'Tbldafthotel Persentarif',
            'TBLDAFTHOTEL_PAJAK' => 'Tbldafthotel Pajak',
            'TBLDAFTHOTEL_THNSPTPD' => 'Tbldafthotel Thnsptpd',
            'TBLDAFTHOTEL_BLNSPTPD' => 'Tbldafthotel Blnsptpd',
            'TBLDAFTHOTEL_TGLSPTPD' => 'Tbldafthotel Tglsptpd',
            'TBLDAFTHOTEL_AYATSPTPD' => 'Tbldafthotel Ayatsptpd',
            'TBLDAFTHOTEL_BUNGASPTPD' => 'Tbldafthotel Bungasptpd',
            'TBLDAFTHOTEL_THNBATASSPTPD' => 'Tbldafthotel Thnbatassptpd',
            'TBLDAFTHOTEL_BLNBATASSPTPD' => 'Tbldafthotel Blnbatassptpd',
            'TBLDAFTHOTEL_TGLBATASSPTPD' => 'Tbldafthotel Tglbatassptpd',
            'TBLDAFTHOTEL_THNTERIMA' => 'Tbldafthotel Thnterima',
            'TBLDAFTHOTEL_BLNTERIMA' => 'Tbldafthotel Blnterima',
            'TBLDAFTHOTEL_TGLTERIMA' => 'Tbldafthotel Tglterima',
            'TBLDAFTHOTEL_THNENTRI' => 'Tbldafthotel Thnentri',
            'TBLDAFTHOTEL_BLNENTRI' => 'Tbldafthotel Blnentri',
            'TBLDAFTHOTEL_TGLENTRI' => 'Tbldafthotel Tglentri',
            'TBLDAFTHOTEL_THNSKPD' => 'Tbldafthotel Thnskpd',
            'TBLDAFTHOTEL_BLNSKPD' => 'Tbldafthotel Blnskpd',
            'TBLDAFTHOTEL_TGLSKPD' => 'Tbldafthotel Tglskpd',
            'TBLDAFTHOTEL_AYATSKPD' => 'Tbldafthotel Ayatskpd',
            'TBLDAFTHOTEL_NOMORSKPD' => 'Tbldafthotel Nomorskpd',
            'TBLDAFTHOTEL_URUTSKPD' => 'Tbldafthotel Urutskpd',
            'TBLDAFTHOTEL_PAJAKSKPD' => 'Tbldafthotel Pajakskpd',
            'TBLDAFTHOTEL_THNBATASSKPD' => 'Tbldafthotel Thnbatasskpd',
            'TBLDAFTHOTEL_BLNBATASSKPD' => 'Tbldafthotel Blnbatasskpd',
            'TBLDAFTHOTEL_TGLBATASSKPD' => 'Tbldafthotel Tglbatasskpd',
            'TBLDAFTHOTEL_THTERIMASKPD' => 'Tbldafthotel Thterimaskpd',
            'TBLDAFTHOTEL_BLNTERIMASKPD' => 'Tbldafthotel Blnterimaskpd',
            'TBLDAFTHOTEL_TGLTERIMASKPD' => 'Tbldafthotel Tglterimaskpd',
            'TBLDAFTHOTEL_TGLPERIKSA' => 'Tbldafthotel Tglperiksa',
            'TBLDAFTHOTEL_BLNPERIKSA' => 'Tbldafthotel Blnperiksa',
            'TBLDAFTHOTEL_THNPERIKSA' => 'Tbldafthotel Thnperiksa',
            'TBLDAFTHOTEL_NOMORPERIKSA' => 'Tbldafthotel Nomorperiksa',
            'TBLDAFTHOTEL_OMSETPERIKSA' => 'Tbldafthotel Omsetperiksa',
            'TBLDAFTHOTEL_PAJAKPERIKSA' => 'Tbldafthotel Pajakperiksa',
            'TBLDAFTHOTEL_THNKURANGBAYAR' => 'Tbldafthotel Thnkurangbayar',
            'TBLDAFTHOTEL_BLNKURANGBAYAR' => 'Tbldafthotel Blnkurangbayar',
            'TBLDAFTHOTEL_TGLKURANGBAYAR' => 'Tbldafthotel Tglkurangbayar',
            'TBLDAFTHOTEL_AYTKURANGBAYAR' => 'Tbldafthotel Aytkurangbayar',
            'TBLDAFTHOTEL_REGKURANGBAYAR' => 'Tbldafthotel Regkurangbayar',
            'TBLDAFTHOTEL_URUTKURANGBAYAR' => 'Tbldafthotel Urutkurangbayar',
            'TBLDAFTHOTEL_KURANGBAYARKE' => 'Tbldafthotel Kurangbayarke',
            'TBLDAFTHOTEL_BUNGAKRGBAYAR' => 'Tbldafthotel Bungakrgbayar',
            'TBLDAFTHOTEL_DENDAKRGBAYAR' => 'Tbldafthotel Dendakrgbayar',
            'TBLDAFTHOTEL_RUPIAHKRGBAYAR' => 'Tbldafthotel Rupiahkrgbayar',
            'TBLDAFTHOTEL_THNBTSKRGBAYAR' => 'Tbldafthotel Thnbtskrgbayar',
            'TBLDAFTHOTEL_BLNBTSKRGBAYAR' => 'Tbldafthotel Blnbtskrgbayar',
            'TBLDAFTHOTEL_TGLBTSKRGBAYAR' => 'Tbldafthotel Tglbtskrgbayar',
            'TBLDAFTHOTEL_THNTRMKRGBAYAR' => 'Tbldafthotel Thntrmkrgbayar',
            'TBLDAFTHOTEL_BLNTRMKRGBAYAR' => 'Tbldafthotel Blntrmkrgbayar',
            'TBLDAFTHOTEL_TGLTRMKRGBAYAR' => 'Tbldafthotel Tgltrmkrgbayar',
            'TBLDAFTHOTEL_TAHUNNIHIL' => 'Tbldafthotel Tahunnihil',
            'TBLDAFTHOTEL_BULANNIHIL' => 'Tbldafthotel Bulannihil',
            'TBLDAFTHOTEL_TANGGLNIHIL' => 'Tbldafthotel Tangglnihil',
            'TBLDAFTHOTEL_AYATNIHIL' => 'Tbldafthotel Ayatnihil',
            'TBLDAFTHOTEL_REGNIHIL' => 'Tbldafthotel Regnihil',
            'TBLDAFTHOTEL_URUTNIHIL' => 'Tbldafthotel Urutnihil',
            'TBLDAFTHOTEL_TAHUNSETOR' => 'Tbldafthotel Tahunsetor',
            'TBLDAFTHOTEL_BULANSETOR' => 'Tbldafthotel Bulansetor',
            'TBLDAFTHOTEL_TANGGALSETOR' => 'Tbldafthotel Tanggalsetor',
            'TBLDAFTHOTEL_AYATSETOR' => 'Tbldafthotel Ayatsetor',
            'TBLDAFTHOTEL_REGSETOR' => 'Tbldafthotel Regsetor',
            'TBLDAFTHOTEL_SETORKE' => 'Tbldafthotel Setorke',
            'TBLDAFTHOTEL_RUPIAHSETOR' => 'Tbldafthotel Rupiahsetor',
            'TBLDAFTHOTEL_TIPESETOR' => 'Tbldafthotel Tipesetor',
            'TBLDAFTHOTEL_ISLUNAS' => 'Tbldafthotel Islunas',
            'TBLDAFTHOTEL_THNENTRISETOR' => 'Tbldafthotel Thnentrisetor',
            'TBLDAFTHOTEL_BLNENTRISETOR' => 'Tbldafthotel Blnentrisetor',
            'TBLDAFTHOTEL_TGLENTRISETOR' => 'Tbldafthotel Tglentrisetor',
            'TBLDAFTHOTEL_THNSURATTAGIHAN' => 'Tbldafthotel Thnsurattagihan',
            'TBLDAFTHOTEL_BLNSURATTAGIHAN' => 'Tbldafthotel Blnsurattagihan',
            'TBLDAFTHOTEL_TGLSURATTAGIHAN' => 'Tbldafthotel Tglsurattagihan',
            'TBLDAFTHOTEL_AYTSURATTAGIHAN' => 'Tbldafthotel Aytsurattagihan',
            'TBLDAFTHOTEL_NOSURATTAGIHAN' => 'Tbldafthotel Nosurattagihan',
            'TBLDAFTHOTEL_SURATTAGIHANKE' => 'Tbldafthotel Surattagihanke',
            'TBLDAFTHOTEL_BUNGATAGIHAN' => 'Tbldafthotel Bungatagihan',
            'TBLDAFTHOTEL_DENDATAGIHAN' => 'Tbldafthotel Dendatagihan',
            'TBLDAFTHOTEL_RUPIAHTAGIHAN' => 'Tbldafthotel Rupiahtagihan',
            'TBLDAFTHOTEL_THNBTSTAGIHAN' => 'Tbldafthotel Thnbtstagihan',
            'TBLDAFTHOTEL_BLNBTSTAGIHAN' => 'Tbldafthotel Blnbtstagihan',
            'TBLDAFTHOTEL_TGLBTSTAGIHAN' => 'Tbldafthotel Tglbtstagihan',
            'TBLDAFTHOTEL_THNTRMTAGIHAN' => 'Tbldafthotel Thntrmtagihan',
            'TBLDAFTHOTEL_BLNTRMTAGIHAN' => 'Tbldafthotel Blntrmtagihan',
            'TBLDAFTHOTEL_TGLTRMTAGIHAN' => 'Tbldafthotel Tgltrmtagihan',
            'TBLDAFTHOTEL_THNSURATANGSUR' => 'Tbldafthotel Thnsuratangsur',
            'TBLDAFTHOTEL_BLNSURATANGSUR' => 'Tbldafthotel Blnsuratangsur',
            'TBLDAFTHOTEL_TGLSURATANGSUR' => 'Tbldafthotel Tglsuratangsur',
            'TBLDAFTHOTEL_REGSURATANGSUR' => 'Tbldafthotel Regsuratangsur',
            'TBLDAFTHOTEL_BLNKBAWAL' => 'Tbldafthotel Blnkbawal',
            'TBLDAFTHOTEL_BLNKBAKHIR' => 'Tbldafthotel Blnkbakhir',
            'TBLDAFTHOTEL_JUMLAHANGSUR' => 'Tbldafthotel Jumlahangsur',
            'TBLDAFTHOTEL_POKOKTAMBAHAN' => 'Tbldafthotel Pokoktambahan',
            'TBLDAFTHOTEL_BUNGATAMBAHAN' => 'Tbldafthotel Bungatambahan',
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

        $criteria->compare('TBLDAFTHOTEL_THNPAJAK',$this->TBLDAFTHOTEL_THNPAJAK,true);
        $criteria->compare('TBLDAFTHOTEL_BLNPAJAK',$this->TBLDAFTHOTEL_BLNPAJAK,true);
        $criteria->compare('TBLDAFTHOTEL_TGLPAJAK',$this->TBLDAFTHOTEL_TGLPAJAK,true);
        $criteria->compare('TBLDAFTHOTEL_PAJAKKE',$this->TBLDAFTHOTEL_PAJAKKE,true);
        $criteria->compare('TBLDAFTHOTEL_JNSPENDAPATAN',$this->TBLDAFTHOTEL_JNSPENDAPATAN,true);
        $criteria->compare('TBLDAFTHOTEL_GOLONGAN',$this->TBLDAFTHOTEL_GOLONGAN,true);
        $criteria->compare('TBLDAFTHOTEL_NOPOK',$this->TBLDAFTHOTEL_NOPOK,true);
        $criteria->compare('TBLKECAMATAN_ID',$this->TBLKECAMATAN_ID,true);
        $criteria->compare('TBLKELURAHAN_ID',$this->TBLKELURAHAN_ID,true);
        $criteria->compare('TBLDAFTHOTEL_REKURUSAN',$this->TBLDAFTHOTEL_REKURUSAN,true);
        $criteria->compare('TBLDAFTHOTEL_REKPEMERINTAHAN',$this->TBLDAFTHOTEL_REKPEMERINTAHAN,true);
        $criteria->compare('TBLDAFTHOTEL_REKORGANISASI',$this->TBLDAFTHOTEL_REKORGANISASI,true);
        $criteria->compare('TBLDAFTHOTEL_REKPROGRAM',$this->TBLDAFTHOTEL_REKPROGRAM,true);
        $criteria->compare('TBLDAFTHOTEL_REKKEGIATAN',$this->TBLDAFTHOTEL_REKKEGIATAN,true);
        $criteria->compare('TBLDAFTHOTEL_REKDINAS',$this->TBLDAFTHOTEL_REKDINAS,true);
        $criteria->compare('TBLDAFTHOTEL_REKBIDANG',$this->TBLDAFTHOTEL_REKBIDANG,true);
        $criteria->compare('TBLDAFTHOTEL_REKPENDAPATAN',$this->TBLDAFTHOTEL_REKPENDAPATAN,true);
        $criteria->compare('TBLDAFTHOTEL_REKPAD',$this->TBLDAFTHOTEL_REKPAD,true);
        $criteria->compare('TBLDAFTHOTEL_REKPAJAK',$this->TBLDAFTHOTEL_REKPAJAK,true);
        $criteria->compare('TBLDAFTHOTEL_REKAYAT',$this->TBLDAFTHOTEL_REKAYAT,true);
        $criteria->compare('TBLDAFTHOTEL_REKJENIS',$this->TBLDAFTHOTEL_REKJENIS,true);
        $criteria->compare('TBLDAFTHOTEL_REKSUBJENIS',$this->TBLDAFTHOTEL_REKSUBJENIS,true);
        $criteria->compare('TBLDAFTHOTEL_REKBADANUSAHA',$this->TBLDAFTHOTEL_REKBADANUSAHA,true);
        $criteria->compare('TBLDAFTHOTEL_ISKAS',$this->TBLDAFTHOTEL_ISKAS,true);
        $criteria->compare('TBLDAFTHOTEL_ISPEMBUKUAN',$this->TBLDAFTHOTEL_ISPEMBUKUAN,true);
        $criteria->compare('TBLDAFTHOTEL_ISNOTA',$this->TBLDAFTHOTEL_ISNOTA,true);
        $criteria->compare('TBLDAFTHOTEL_ISJNSPENETAPAN',$this->TBLDAFTHOTEL_ISJNSPENETAPAN,true);
        $criteria->compare('TBLDAFTHOTEL_THNMULAIJUAL',$this->TBLDAFTHOTEL_THNMULAIJUAL,true);
        $criteria->compare('TBLDAFTHOTEL_BLNMULAIJUAL',$this->TBLDAFTHOTEL_BLNMULAIJUAL,true);
        $criteria->compare('TBLDAFTHOTEL_TGLMULAIJUAL',$this->TBLDAFTHOTEL_TGLMULAIJUAL,true);
        $criteria->compare('TBLDAFTHOTEL_THNAKHIRJUAL',$this->TBLDAFTHOTEL_THNAKHIRJUAL,true);
        $criteria->compare('TBLDAFTHOTEL_BLNAKHIRJUAL',$this->TBLDAFTHOTEL_BLNAKHIRJUAL,true);
        $criteria->compare('TBLDAFTHOTEL_TGLAKHIRJUAL',$this->TBLDAFTHOTEL_TGLAKHIRJUAL,true);
        $criteria->compare('TBLDAFTHOTEL_JUMLAHHARIJUAL',$this->TBLDAFTHOTEL_JUMLAHHARIJUAL,true);
        $criteria->compare('TBLDAFTHOTEL_OMSETPAJAK',$this->TBLDAFTHOTEL_OMSETPAJAK,true);
        $criteria->compare('TBLDAFTHOTEL_PERSENTARIF',$this->TBLDAFTHOTEL_PERSENTARIF,true);
        $criteria->compare('TBLDAFTHOTEL_PAJAK',$this->TBLDAFTHOTEL_PAJAK,true);
        $criteria->compare('TBLDAFTHOTEL_THNSPTPD',$this->TBLDAFTHOTEL_THNSPTPD,true);
        $criteria->compare('TBLDAFTHOTEL_BLNSPTPD',$this->TBLDAFTHOTEL_BLNSPTPD,true);
        $criteria->compare('TBLDAFTHOTEL_TGLSPTPD',$this->TBLDAFTHOTEL_TGLSPTPD,true);
        $criteria->compare('TBLDAFTHOTEL_AYATSPTPD',$this->TBLDAFTHOTEL_AYATSPTPD,true);
        $criteria->compare('TBLDAFTHOTEL_BUNGASPTPD',$this->TBLDAFTHOTEL_BUNGASPTPD,true);
        $criteria->compare('TBLDAFTHOTEL_THNBATASSPTPD',$this->TBLDAFTHOTEL_THNBATASSPTPD,true);
        $criteria->compare('TBLDAFTHOTEL_BLNBATASSPTPD',$this->TBLDAFTHOTEL_BLNBATASSPTPD,true);
        $criteria->compare('TBLDAFTHOTEL_TGLBATASSPTPD',$this->TBLDAFTHOTEL_TGLBATASSPTPD,true);
        $criteria->compare('TBLDAFTHOTEL_THNTERIMA',$this->TBLDAFTHOTEL_THNTERIMA,true);
        $criteria->compare('TBLDAFTHOTEL_BLNTERIMA',$this->TBLDAFTHOTEL_BLNTERIMA,true);
        $criteria->compare('TBLDAFTHOTEL_TGLTERIMA',$this->TBLDAFTHOTEL_TGLTERIMA,true);
        $criteria->compare('TBLDAFTHOTEL_THNENTRI',$this->TBLDAFTHOTEL_THNENTRI,true);
        $criteria->compare('TBLDAFTHOTEL_BLNENTRI',$this->TBLDAFTHOTEL_BLNENTRI,true);
        $criteria->compare('TBLDAFTHOTEL_TGLENTRI',$this->TBLDAFTHOTEL_TGLENTRI,true);
        $criteria->compare('TBLDAFTHOTEL_THNSKPD',$this->TBLDAFTHOTEL_THNSKPD,true);
        $criteria->compare('TBLDAFTHOTEL_BLNSKPD',$this->TBLDAFTHOTEL_BLNSKPD,true);
        $criteria->compare('TBLDAFTHOTEL_TGLSKPD',$this->TBLDAFTHOTEL_TGLSKPD,true);
        $criteria->compare('TBLDAFTHOTEL_AYATSKPD',$this->TBLDAFTHOTEL_AYATSKPD,true);
        $criteria->compare('TBLDAFTHOTEL_NOMORSKPD',$this->TBLDAFTHOTEL_NOMORSKPD,true);
        $criteria->compare('TBLDAFTHOTEL_URUTSKPD',$this->TBLDAFTHOTEL_URUTSKPD,true);
        $criteria->compare('TBLDAFTHOTEL_PAJAKSKPD',$this->TBLDAFTHOTEL_PAJAKSKPD,true);
        $criteria->compare('TBLDAFTHOTEL_THNBATASSKPD',$this->TBLDAFTHOTEL_THNBATASSKPD,true);
        $criteria->compare('TBLDAFTHOTEL_BLNBATASSKPD',$this->TBLDAFTHOTEL_BLNBATASSKPD,true);
        $criteria->compare('TBLDAFTHOTEL_TGLBATASSKPD',$this->TBLDAFTHOTEL_TGLBATASSKPD,true);
        $criteria->compare('TBLDAFTHOTEL_THTERIMASKPD',$this->TBLDAFTHOTEL_THTERIMASKPD,true);
        $criteria->compare('TBLDAFTHOTEL_BLNTERIMASKPD',$this->TBLDAFTHOTEL_BLNTERIMASKPD,true);
        $criteria->compare('TBLDAFTHOTEL_TGLTERIMASKPD',$this->TBLDAFTHOTEL_TGLTERIMASKPD,true);
        $criteria->compare('TBLDAFTHOTEL_TGLPERIKSA',$this->TBLDAFTHOTEL_TGLPERIKSA,true);
        $criteria->compare('TBLDAFTHOTEL_BLNPERIKSA',$this->TBLDAFTHOTEL_BLNPERIKSA,true);
        $criteria->compare('TBLDAFTHOTEL_THNPERIKSA',$this->TBLDAFTHOTEL_THNPERIKSA,true);
        $criteria->compare('TBLDAFTHOTEL_NOMORPERIKSA',$this->TBLDAFTHOTEL_NOMORPERIKSA,true);
        $criteria->compare('TBLDAFTHOTEL_OMSETPERIKSA',$this->TBLDAFTHOTEL_OMSETPERIKSA,true);
        $criteria->compare('TBLDAFTHOTEL_PAJAKPERIKSA',$this->TBLDAFTHOTEL_PAJAKPERIKSA,true);
        $criteria->compare('TBLDAFTHOTEL_THNKURANGBAYAR',$this->TBLDAFTHOTEL_THNKURANGBAYAR,true);
        $criteria->compare('TBLDAFTHOTEL_BLNKURANGBAYAR',$this->TBLDAFTHOTEL_BLNKURANGBAYAR,true);
        $criteria->compare('TBLDAFTHOTEL_TGLKURANGBAYAR',$this->TBLDAFTHOTEL_TGLKURANGBAYAR,true);
        $criteria->compare('TBLDAFTHOTEL_AYTKURANGBAYAR',$this->TBLDAFTHOTEL_AYTKURANGBAYAR,true);
        $criteria->compare('TBLDAFTHOTEL_REGKURANGBAYAR',$this->TBLDAFTHOTEL_REGKURANGBAYAR,true);
        $criteria->compare('TBLDAFTHOTEL_URUTKURANGBAYAR',$this->TBLDAFTHOTEL_URUTKURANGBAYAR,true);
        $criteria->compare('TBLDAFTHOTEL_KURANGBAYARKE',$this->TBLDAFTHOTEL_KURANGBAYARKE,true);
        $criteria->compare('TBLDAFTHOTEL_BUNGAKRGBAYAR',$this->TBLDAFTHOTEL_BUNGAKRGBAYAR,true);
        $criteria->compare('TBLDAFTHOTEL_DENDAKRGBAYAR',$this->TBLDAFTHOTEL_DENDAKRGBAYAR,true);
        $criteria->compare('TBLDAFTHOTEL_RUPIAHKRGBAYAR',$this->TBLDAFTHOTEL_RUPIAHKRGBAYAR,true);
        $criteria->compare('TBLDAFTHOTEL_THNBTSKRGBAYAR',$this->TBLDAFTHOTEL_THNBTSKRGBAYAR,true);
        $criteria->compare('TBLDAFTHOTEL_BLNBTSKRGBAYAR',$this->TBLDAFTHOTEL_BLNBTSKRGBAYAR,true);
        $criteria->compare('TBLDAFTHOTEL_TGLBTSKRGBAYAR',$this->TBLDAFTHOTEL_TGLBTSKRGBAYAR,true);
        $criteria->compare('TBLDAFTHOTEL_THNTRMKRGBAYAR',$this->TBLDAFTHOTEL_THNTRMKRGBAYAR,true);
        $criteria->compare('TBLDAFTHOTEL_BLNTRMKRGBAYAR',$this->TBLDAFTHOTEL_BLNTRMKRGBAYAR,true);
        $criteria->compare('TBLDAFTHOTEL_TGLTRMKRGBAYAR',$this->TBLDAFTHOTEL_TGLTRMKRGBAYAR,true);
        $criteria->compare('TBLDAFTHOTEL_TAHUNNIHIL',$this->TBLDAFTHOTEL_TAHUNNIHIL,true);
        $criteria->compare('TBLDAFTHOTEL_BULANNIHIL',$this->TBLDAFTHOTEL_BULANNIHIL,true);
        $criteria->compare('TBLDAFTHOTEL_TANGGLNIHIL',$this->TBLDAFTHOTEL_TANGGLNIHIL,true);
        $criteria->compare('TBLDAFTHOTEL_AYATNIHIL',$this->TBLDAFTHOTEL_AYATNIHIL,true);
        $criteria->compare('TBLDAFTHOTEL_REGNIHIL',$this->TBLDAFTHOTEL_REGNIHIL,true);
        $criteria->compare('TBLDAFTHOTEL_URUTNIHIL',$this->TBLDAFTHOTEL_URUTNIHIL,true);
        $criteria->compare('TBLDAFTHOTEL_TAHUNSETOR',$this->TBLDAFTHOTEL_TAHUNSETOR,true);
        $criteria->compare('TBLDAFTHOTEL_BULANSETOR',$this->TBLDAFTHOTEL_BULANSETOR,true);
        $criteria->compare('TBLDAFTHOTEL_TANGGALSETOR',$this->TBLDAFTHOTEL_TANGGALSETOR,true);
        $criteria->compare('TBLDAFTHOTEL_AYATSETOR',$this->TBLDAFTHOTEL_AYATSETOR,true);
        $criteria->compare('TBLDAFTHOTEL_REGSETOR',$this->TBLDAFTHOTEL_REGSETOR,true);
        $criteria->compare('TBLDAFTHOTEL_SETORKE',$this->TBLDAFTHOTEL_SETORKE,true);
        $criteria->compare('TBLDAFTHOTEL_RUPIAHSETOR',$this->TBLDAFTHOTEL_RUPIAHSETOR,true);
        $criteria->compare('TBLDAFTHOTEL_TIPESETOR',$this->TBLDAFTHOTEL_TIPESETOR,true);
        $criteria->compare('TBLDAFTHOTEL_ISLUNAS',$this->TBLDAFTHOTEL_ISLUNAS,true);
        $criteria->compare('TBLDAFTHOTEL_THNENTRISETOR',$this->TBLDAFTHOTEL_THNENTRISETOR,true);
        $criteria->compare('TBLDAFTHOTEL_BLNENTRISETOR',$this->TBLDAFTHOTEL_BLNENTRISETOR,true);
        $criteria->compare('TBLDAFTHOTEL_TGLENTRISETOR',$this->TBLDAFTHOTEL_TGLENTRISETOR,true);
        $criteria->compare('TBLDAFTHOTEL_THNSURATTAGIHAN',$this->TBLDAFTHOTEL_THNSURATTAGIHAN,true);
        $criteria->compare('TBLDAFTHOTEL_BLNSURATTAGIHAN',$this->TBLDAFTHOTEL_BLNSURATTAGIHAN,true);
        $criteria->compare('TBLDAFTHOTEL_TGLSURATTAGIHAN',$this->TBLDAFTHOTEL_TGLSURATTAGIHAN,true);
        $criteria->compare('TBLDAFTHOTEL_AYTSURATTAGIHAN',$this->TBLDAFTHOTEL_AYTSURATTAGIHAN,true);
        $criteria->compare('TBLDAFTHOTEL_NOSURATTAGIHAN',$this->TBLDAFTHOTEL_NOSURATTAGIHAN,true);
        $criteria->compare('TBLDAFTHOTEL_SURATTAGIHANKE',$this->TBLDAFTHOTEL_SURATTAGIHANKE,true);
        $criteria->compare('TBLDAFTHOTEL_BUNGATAGIHAN',$this->TBLDAFTHOTEL_BUNGATAGIHAN,true);
        $criteria->compare('TBLDAFTHOTEL_DENDATAGIHAN',$this->TBLDAFTHOTEL_DENDATAGIHAN,true);
        $criteria->compare('TBLDAFTHOTEL_RUPIAHTAGIHAN',$this->TBLDAFTHOTEL_RUPIAHTAGIHAN,true);
        $criteria->compare('TBLDAFTHOTEL_THNBTSTAGIHAN',$this->TBLDAFTHOTEL_THNBTSTAGIHAN,true);
        $criteria->compare('TBLDAFTHOTEL_BLNBTSTAGIHAN',$this->TBLDAFTHOTEL_BLNBTSTAGIHAN,true);
        $criteria->compare('TBLDAFTHOTEL_TGLBTSTAGIHAN',$this->TBLDAFTHOTEL_TGLBTSTAGIHAN,true);
        $criteria->compare('TBLDAFTHOTEL_THNTRMTAGIHAN',$this->TBLDAFTHOTEL_THNTRMTAGIHAN,true);
        $criteria->compare('TBLDAFTHOTEL_BLNTRMTAGIHAN',$this->TBLDAFTHOTEL_BLNTRMTAGIHAN,true);
        $criteria->compare('TBLDAFTHOTEL_TGLTRMTAGIHAN',$this->TBLDAFTHOTEL_TGLTRMTAGIHAN,true);
        $criteria->compare('TBLDAFTHOTEL_THNSURATANGSUR',$this->TBLDAFTHOTEL_THNSURATANGSUR,true);
        $criteria->compare('TBLDAFTHOTEL_BLNSURATANGSUR',$this->TBLDAFTHOTEL_BLNSURATANGSUR,true);
        $criteria->compare('TBLDAFTHOTEL_TGLSURATANGSUR',$this->TBLDAFTHOTEL_TGLSURATANGSUR,true);
        $criteria->compare('TBLDAFTHOTEL_REGSURATANGSUR',$this->TBLDAFTHOTEL_REGSURATANGSUR,true);
        $criteria->compare('TBLDAFTHOTEL_BLNKBAWAL',$this->TBLDAFTHOTEL_BLNKBAWAL,true);
        $criteria->compare('TBLDAFTHOTEL_BLNKBAKHIR',$this->TBLDAFTHOTEL_BLNKBAKHIR,true);
        $criteria->compare('TBLDAFTHOTEL_JUMLAHANGSUR',$this->TBLDAFTHOTEL_JUMLAHANGSUR,true);
        $criteria->compare('TBLDAFTHOTEL_POKOKTAMBAHAN',$this->TBLDAFTHOTEL_POKOKTAMBAHAN,true);
        $criteria->compare('TBLDAFTHOTEL_BUNGATAMBAHAN',$this->TBLDAFTHOTEL_BUNGATAMBAHAN,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TBLDAFTHOTEL the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
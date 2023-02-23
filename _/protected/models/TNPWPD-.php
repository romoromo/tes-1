<?php

/**
 * This is the model class for table "TNPWPD".
 *
 * The followings are the available columns in table 'TNPWPD':
 * @property string $TNPWPD_ID
 * @property string $REFJENISWP_ID
 * @property string $TNPWPD_BUNIK
 * @property string $TNPWPD_BUNPWP
 * @property string $TNPWPD_BUMERK
 * @property string $TNPWPD_BUALAMAT
 * @property string $TNPWPD_BUJALAN
 * @property string $TNPWPD_BURTRWRK
 * @property string $REFKELURAHAN_ID
 * @property string $REFKECAMATAN_ID
 * @property string $TNPWPD_BUTELP
 * @property string $TNPWPD_BUHP
 * @property string $TNPWPD_BUKODEPOS
 * @property string $TNPWPD_BUNOAKTA
 * @property string $TNPWPD_BUAKTANO
 * @property string $TNPWPD_BUAKTATGL
 * @property string $TNPWPD_BUHONO
 * @property string $TNPWPD_BUHOTGL
 * @property string $TNPWPD_BUPARIWISATANO
 * @property string $TNPWPD_BUPARIWISATATGL
 * @property string $TNPWPD_BULAIN1NO
 * @property string $TNPWPD_BULAIN1TGL
 * @property string $TNPWPD_BULAIN2NO
 * @property string $TNPWPD_BULAIN2TGL
 * @property string $TNPWPD_ISBUHOTEL
 * @property string $TNPWPD_ISBURESTORAN
 * @property string $TNPWPD_ISBUHIBURAN
 * @property string $TNPWPD_ISBUREKLAME
 * @property string $TNPWPD_ISBUPJU
 * @property string $TNPWPD_ISBUPARKIRLUARJALAN
 * @property string $TNPWPD_ISBUAIRTANAH
 * @property string $TNPWPD_ISBUWALET
 * @property string $TNPWPD_ISBUPBB
 * @property string $TNPWPD_ISBUBPHTB
 * @property string $TNPWPD_ISBULAINNYA
 * @property string $TNPWPD_MILIKNAMA
 * @property string $TNPWPD_NIK
 * @property string $TNPWPD_NPWP
 * @property string $TNPWPD_MILIKJAB
 * @property string $TNPWPD_MILIKALAMAT
 * @property string $TNPWPD_MILIKJALAN
 * @property string $TNPWPD_MILIKRTRWRK
 * @property string $TNPWPD_MILIKKEL
 * @property string $TNPWPD_MILIKKEC
 * @property string $TNPWPD_MILIKKABKOTA
 * @property string $TNPWPD_MILIKTELP
 * @property string $TNPWPD_MILIKHP
 * @property string $TNPWPD_MILIKKODEPOS
 * @property string $TNPWPD_ISPAJAKHOTEL
 * @property string $TNPWPD_ISPAJAKRESTORAN
 * @property string $TNPWPD_ISPAJAKHIBURAN
 * @property string $TNPWPD_ISPAJAKREKLAME
 * @property string $TNPWPD_ISPAJAKPJU
 * @property string $TNPWPD_ISPAJAKPARKIRLUARJALAN
 * @property string $TNPWPD_ISPAJAKAIRTANAH
 * @property string $TNPWPD_ISPAJAKWALET
 * @property string $TNPWPD_ISPAJAKPBB
 * @property string $TNPWPD_ISPAJAKBPHTB
 * @property string $TNPWPD_ISPAJAKLAINNYA
 * @property string $TNPWPD_NPWPD
 * @property string $TNPWPD_TGLDAFTAR
 * @property string $TNPWPD_NAMAJELAS
 * @property string $TNPWPD_TGLTERIMA
 * @property string $TNPWPD_NAMATERIMA
 * @property string $TNPWPD_NIPTERIMA
 * @property string $TNPWPD_ESTIMASI
 * @property string $TNPWPD_KET
 * @property string $TNPWPD_TGLCATAT
 * @property string $TNPWPD_NAMACATAT
 * @property string $TNPWPD_NIPCATAT
 * @property string $TNPWPD_NOFORMULIR
 * @property string $TBLPENGGUNA_ID
 * @property string $TNPWPD_TGLENTRY
 * @property string $TNPWPD_TGLUPDATE
 * @property string $TBLSUBYEK_ID
 * @property string $TNPWPD_ISKUKUH
 * @property string $TNPWPD_TGLKUKUH
 * @property string $TNPWPD_NOKUKUH
 * @property string $TREKENING_ID
 * @property string $TREKENING_KODE
 * @property string $TNPWPD_HAPUS
 * @property string $TNPWPD_ISAKTIF
 * @property string $TNPWPD_TGLBATASKIRIM
 */
class TNPWPD extends CActiveRecord
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
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('TNPWPD_ID', 'required'),
            array('TNPWPD_ID, TBLSUBYEK_ID, TREKENING_KODE', 'length', 'max'=>20),
            array('REFJENISWP_ID, REFKELURAHAN_ID, REFKECAMATAN_ID, TNPWPD_BUKODEPOS, TBLPENGGUNA_ID, TREKENING_ID', 'length', 'max'=>11),
            array('TNPWPD_BUNIK, TNPWPD_BUTELP, TNPWPD_BUHP, TNPWPD_NIK, TNPWPD_NPWP, TNPWPD_MILIKHP', 'length', 'max'=>100),
            array('TNPWPD_BUNPWP, TNPWPD_BUMERK, TNPWPD_BUALAMAT, TNPWPD_BUJALAN, TNPWPD_BURTRWRK, TNPWPD_BUNOAKTA, TNPWPD_BUAKTANO, TNPWPD_ISBUHOTEL, TNPWPD_ISBURESTORAN, TNPWPD_ISBUHIBURAN, TNPWPD_ISBUREKLAME, TNPWPD_ISBUPJU, TNPWPD_ISBUPARKIRLUARJALAN, TNPWPD_ISBUAIRTANAH, TNPWPD_ISBUWALET, TNPWPD_ISBUPBB, TNPWPD_ISBUBPHTB, TNPWPD_ISBULAINNYA, TNPWPD_MILIKNAMA, TNPWPD_MILIKJAB, TNPWPD_MILIKALAMAT, TNPWPD_MILIKJALAN, TNPWPD_MILIKRTRWRK, TNPWPD_MILIKKEL, TNPWPD_MILIKKEC, TNPWPD_MILIKKABKOTA, TNPWPD_MILIKTELP, TNPWPD_ISPAJAKHOTEL, TNPWPD_ISPAJAKRESTORAN, TNPWPD_ISPAJAKHIBURAN, TNPWPD_ISPAJAKREKLAME, TNPWPD_ISPAJAKPJU, TNPWPD_ISPAJAKPARKIRLUARJALAN, TNPWPD_ISPAJAKAIRTANAH, TNPWPD_ISPAJAKWALET, TNPWPD_ISPAJAKPBB, TNPWPD_ISPAJAKBPHTB, TNPWPD_ISPAJAKLAINNYA, TNPWPD_NPWPD, TNPWPD_NAMAJELAS, TNPWPD_NAMATERIMA, TNPWPD_NAMACATAT, TNPWPD_NOFORMULIR, TNPWPD_NOKUKUH', 'length', 'max'=>255),
            array('TNPWPD_BUHONO, TNPWPD_BUPARIWISATANO, TNPWPD_BULAIN1NO, TNPWPD_BULAIN2NO', 'length', 'max'=>150),
            array('TNPWPD_MILIKKODEPOS', 'length', 'max'=>10),
            array('TNPWPD_NIPTERIMA, TNPWPD_NIPCATAT', 'length', 'max'=>15),
            array('TNPWPD_ISKUKUH, TNPWPD_HAPUS, TNPWPD_ISAKTIF', 'length', 'max'=>1),
            array('TNPWPD_BUAKTATGL, TNPWPD_BUHOTGL, TNPWPD_BUPARIWISATATGL, TNPWPD_BULAIN1TGL, TNPWPD_BULAIN2TGL, TNPWPD_TGLDAFTAR, TNPWPD_TGLTERIMA, TNPWPD_ESTIMASI, TNPWPD_KET, TNPWPD_TGLCATAT, TNPWPD_TGLENTRY, TNPWPD_TGLUPDATE, TNPWPD_TGLKUKUH, TNPWPD_TGLBATASKIRIM', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('TNPWPD_ID, REFJENISWP_ID, TNPWPD_BUNIK, TNPWPD_BUNPWP, TNPWPD_BUMERK, TNPWPD_BUALAMAT, TNPWPD_BUJALAN, TNPWPD_BURTRWRK, REFKELURAHAN_ID, REFKECAMATAN_ID, TNPWPD_BUTELP, TNPWPD_BUHP, TNPWPD_BUKODEPOS, TNPWPD_BUNOAKTA, TNPWPD_BUAKTANO, TNPWPD_BUAKTATGL, TNPWPD_BUHONO, TNPWPD_BUHOTGL, TNPWPD_BUPARIWISATANO, TNPWPD_BUPARIWISATATGL, TNPWPD_BULAIN1NO, TNPWPD_BULAIN1TGL, TNPWPD_BULAIN2NO, TNPWPD_BULAIN2TGL, TNPWPD_ISBUHOTEL, TNPWPD_ISBURESTORAN, TNPWPD_ISBUHIBURAN, TNPWPD_ISBUREKLAME, TNPWPD_ISBUPJU, TNPWPD_ISBUPARKIRLUARJALAN, TNPWPD_ISBUAIRTANAH, TNPWPD_ISBUWALET, TNPWPD_ISBUPBB, TNPWPD_ISBUBPHTB, TNPWPD_ISBULAINNYA, TNPWPD_MILIKNAMA, TNPWPD_NIK, TNPWPD_NPWP, TNPWPD_MILIKJAB, TNPWPD_MILIKALAMAT, TNPWPD_MILIKJALAN, TNPWPD_MILIKRTRWRK, TNPWPD_MILIKKEL, TNPWPD_MILIKKEC, TNPWPD_MILIKKABKOTA, TNPWPD_MILIKTELP, TNPWPD_MILIKHP, TNPWPD_MILIKKODEPOS, TNPWPD_ISPAJAKHOTEL, TNPWPD_ISPAJAKRESTORAN, TNPWPD_ISPAJAKHIBURAN, TNPWPD_ISPAJAKREKLAME, TNPWPD_ISPAJAKPJU, TNPWPD_ISPAJAKPARKIRLUARJALAN, TNPWPD_ISPAJAKAIRTANAH, TNPWPD_ISPAJAKWALET, TNPWPD_ISPAJAKPBB, TNPWPD_ISPAJAKBPHTB, TNPWPD_ISPAJAKLAINNYA, TNPWPD_NPWPD, TNPWPD_TGLDAFTAR, TNPWPD_NAMAJELAS, TNPWPD_TGLTERIMA, TNPWPD_NAMATERIMA, TNPWPD_NIPTERIMA, TNPWPD_ESTIMASI, TNPWPD_KET, TNPWPD_TGLCATAT, TNPWPD_NAMACATAT, TNPWPD_NIPCATAT, TNPWPD_NOFORMULIR, TBLPENGGUNA_ID, TNPWPD_TGLENTRY, TNPWPD_TGLUPDATE, TBLSUBYEK_ID, TNPWPD_ISKUKUH, TNPWPD_TGLKUKUH, TNPWPD_NOKUKUH, TREKENING_ID, TREKENING_KODE, TNPWPD_HAPUS, TNPWPD_ISAKTIF, TNPWPD_TGLBATASKIRIM', 'safe', 'on'=>'search'),
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
            'TNPWPD_ID' => 'Tnpwpd',
            'REFJENISWP_ID' => 'Refjeniswp',
            'TNPWPD_BUNIK' => 'Tnpwpd Bunik',
            'TNPWPD_BUNPWP' => 'Tnpwpd Bunpwp',
            'TNPWPD_BUMERK' => 'Tnpwpd Bumerk',
            'TNPWPD_BUALAMAT' => 'Tnpwpd Bualamat',
            'TNPWPD_BUJALAN' => 'Tnpwpd Bujalan',
            'TNPWPD_BURTRWRK' => 'Tnpwpd Burtrwrk',
            'REFKELURAHAN_ID' => 'Refkelurahan',
            'REFKECAMATAN_ID' => 'Refkecamatan',
            'TNPWPD_BUTELP' => 'Tnpwpd Butelp',
            'TNPWPD_BUHP' => 'Tnpwpd Buhp',
            'TNPWPD_BUKODEPOS' => 'Tnpwpd Bukodepos',
            'TNPWPD_BUNOAKTA' => 'Tnpwpd Bunoakta',
            'TNPWPD_BUAKTANO' => 'Tnpwpd Buaktano',
            'TNPWPD_BUAKTATGL' => 'Tnpwpd Buaktatgl',
            'TNPWPD_BUHONO' => 'Tnpwpd Buhono',
            'TNPWPD_BUHOTGL' => 'Tnpwpd Buhotgl',
            'TNPWPD_BUPARIWISATANO' => 'Tnpwpd Bupariwisatano',
            'TNPWPD_BUPARIWISATATGL' => 'Tnpwpd Bupariwisatatgl',
            'TNPWPD_BULAIN1NO' => 'Tnpwpd Bulain1 No',
            'TNPWPD_BULAIN1TGL' => 'Tnpwpd Bulain1 Tgl',
            'TNPWPD_BULAIN2NO' => 'Tnpwpd Bulain2 No',
            'TNPWPD_BULAIN2TGL' => 'Tnpwpd Bulain2 Tgl',
            'TNPWPD_ISBUHOTEL' => 'Tnpwpd Isbuhotel',
            'TNPWPD_ISBURESTORAN' => 'Tnpwpd Isburestoran',
            'TNPWPD_ISBUHIBURAN' => 'Tnpwpd Isbuhiburan',
            'TNPWPD_ISBUREKLAME' => 'Tnpwpd Isbureklame',
            'TNPWPD_ISBUPJU' => 'Tnpwpd Isbupju',
            'TNPWPD_ISBUPARKIRLUARJALAN' => 'Tnpwpd Isbuparkirluarjalan',
            'TNPWPD_ISBUAIRTANAH' => 'Tnpwpd Isbuairtanah',
            'TNPWPD_ISBUWALET' => 'Tnpwpd Isbuwalet',
            'TNPWPD_ISBUPBB' => 'Tnpwpd Isbupbb',
            'TNPWPD_ISBUBPHTB' => 'Tnpwpd Isbubphtb',
            'TNPWPD_ISBULAINNYA' => 'Tnpwpd Isbulainnya',
            'TNPWPD_MILIKNAMA' => 'Tnpwpd Miliknama',
            'TNPWPD_NIK' => 'Tnpwpd Nik',
            'TNPWPD_NPWP' => 'Tnpwpd Npwp',
            'TNPWPD_MILIKJAB' => 'Tnpwpd Milikjab',
            'TNPWPD_MILIKALAMAT' => 'Tnpwpd Milikalamat',
            'TNPWPD_MILIKJALAN' => 'Tnpwpd Milikjalan',
            'TNPWPD_MILIKRTRWRK' => 'Tnpwpd Milikrtrwrk',
            'TNPWPD_MILIKKEL' => 'Tnpwpd Milikkel',
            'TNPWPD_MILIKKEC' => 'Tnpwpd Milikkec',
            'TNPWPD_MILIKKABKOTA' => 'Tnpwpd Milikkabkota',
            'TNPWPD_MILIKTELP' => 'Tnpwpd Miliktelp',
            'TNPWPD_MILIKHP' => 'Tnpwpd Milikhp',
            'TNPWPD_MILIKKODEPOS' => 'Tnpwpd Milikkodepos',
            'TNPWPD_ISPAJAKHOTEL' => 'Tnpwpd Ispajakhotel',
            'TNPWPD_ISPAJAKRESTORAN' => 'Tnpwpd Ispajakrestoran',
            'TNPWPD_ISPAJAKHIBURAN' => 'Tnpwpd Ispajakhiburan',
            'TNPWPD_ISPAJAKREKLAME' => 'Tnpwpd Ispajakreklame',
            'TNPWPD_ISPAJAKPJU' => 'Tnpwpd Ispajakpju',
            'TNPWPD_ISPAJAKPARKIRLUARJALAN' => 'Tnpwpd Ispajakparkirluarjalan',
            'TNPWPD_ISPAJAKAIRTANAH' => 'Tnpwpd Ispajakairtanah',
            'TNPWPD_ISPAJAKWALET' => 'Tnpwpd Ispajakwalet',
            'TNPWPD_ISPAJAKPBB' => 'Tnpwpd Ispajakpbb',
            'TNPWPD_ISPAJAKBPHTB' => 'Tnpwpd Ispajakbphtb',
            'TNPWPD_ISPAJAKLAINNYA' => 'Tnpwpd Ispajaklainnya',
            'TNPWPD_NPWPD' => 'Tnpwpd Npwpd',
            'TNPWPD_TGLDAFTAR' => 'Tnpwpd Tgldaftar',
            'TNPWPD_NAMAJELAS' => 'Tnpwpd Namajelas',
            'TNPWPD_TGLTERIMA' => 'Tnpwpd Tglterima',
            'TNPWPD_NAMATERIMA' => 'Tnpwpd Namaterima',
            'TNPWPD_NIPTERIMA' => 'Tnpwpd Nipterima',
            'TNPWPD_ESTIMASI' => 'Tnpwpd Estimasi',
            'TNPWPD_KET' => 'Tnpwpd Ket',
            'TNPWPD_TGLCATAT' => 'Tnpwpd Tglcatat',
            'TNPWPD_NAMACATAT' => 'Tnpwpd Namacatat',
            'TNPWPD_NIPCATAT' => 'Tnpwpd Nipcatat',
            'TNPWPD_NOFORMULIR' => 'Tnpwpd Noformulir',
            'TBLPENGGUNA_ID' => 'Tblpengguna',
            'TNPWPD_TGLENTRY' => 'Tnpwpd Tglentry',
            'TNPWPD_TGLUPDATE' => 'Tnpwpd Tglupdate',
            'TBLSUBYEK_ID' => 'Tblsubyek',
            'TNPWPD_ISKUKUH' => 'Tnpwpd Iskukuh',
            'TNPWPD_TGLKUKUH' => 'Tnpwpd Tglkukuh',
            'TNPWPD_NOKUKUH' => 'Tnpwpd Nokukuh',
            'TREKENING_ID' => 'Trekening',
            'TREKENING_KODE' => 'Trekening Kode',
            'TNPWPD_HAPUS' => 'Tnpwpd Hapus',
            'TNPWPD_ISAKTIF' => 'Tnpwpd Isaktif',
            'TNPWPD_TGLBATASKIRIM' => 'Tnpwpd Tglbataskirim',
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

        $criteria->compare('TNPWPD_ID',$this->TNPWPD_ID,true);
        $criteria->compare('REFJENISWP_ID',$this->REFJENISWP_ID,true);
        $criteria->compare('TNPWPD_BUNIK',$this->TNPWPD_BUNIK,true);
        $criteria->compare('TNPWPD_BUNPWP',$this->TNPWPD_BUNPWP,true);
        $criteria->compare('TNPWPD_BUMERK',$this->TNPWPD_BUMERK,true);
        $criteria->compare('TNPWPD_BUALAMAT',$this->TNPWPD_BUALAMAT,true);
        $criteria->compare('TNPWPD_BUJALAN',$this->TNPWPD_BUJALAN,true);
        $criteria->compare('TNPWPD_BURTRWRK',$this->TNPWPD_BURTRWRK,true);
        $criteria->compare('REFKELURAHAN_ID',$this->REFKELURAHAN_ID,true);
        $criteria->compare('REFKECAMATAN_ID',$this->REFKECAMATAN_ID,true);
        $criteria->compare('TNPWPD_BUTELP',$this->TNPWPD_BUTELP,true);
        $criteria->compare('TNPWPD_BUHP',$this->TNPWPD_BUHP,true);
        $criteria->compare('TNPWPD_BUKODEPOS',$this->TNPWPD_BUKODEPOS,true);
        $criteria->compare('TNPWPD_BUNOAKTA',$this->TNPWPD_BUNOAKTA,true);
        $criteria->compare('TNPWPD_BUAKTANO',$this->TNPWPD_BUAKTANO,true);
        $criteria->compare('TNPWPD_BUAKTATGL',$this->TNPWPD_BUAKTATGL,true);
        $criteria->compare('TNPWPD_BUHONO',$this->TNPWPD_BUHONO,true);
        $criteria->compare('TNPWPD_BUHOTGL',$this->TNPWPD_BUHOTGL,true);
        $criteria->compare('TNPWPD_BUPARIWISATANO',$this->TNPWPD_BUPARIWISATANO,true);
        $criteria->compare('TNPWPD_BUPARIWISATATGL',$this->TNPWPD_BUPARIWISATATGL,true);
        $criteria->compare('TNPWPD_BULAIN1NO',$this->TNPWPD_BULAIN1NO,true);
        $criteria->compare('TNPWPD_BULAIN1TGL',$this->TNPWPD_BULAIN1TGL,true);
        $criteria->compare('TNPWPD_BULAIN2NO',$this->TNPWPD_BULAIN2NO,true);
        $criteria->compare('TNPWPD_BULAIN2TGL',$this->TNPWPD_BULAIN2TGL,true);
        $criteria->compare('TNPWPD_ISBUHOTEL',$this->TNPWPD_ISBUHOTEL,true);
        $criteria->compare('TNPWPD_ISBURESTORAN',$this->TNPWPD_ISBURESTORAN,true);
        $criteria->compare('TNPWPD_ISBUHIBURAN',$this->TNPWPD_ISBUHIBURAN,true);
        $criteria->compare('TNPWPD_ISBUREKLAME',$this->TNPWPD_ISBUREKLAME,true);
        $criteria->compare('TNPWPD_ISBUPJU',$this->TNPWPD_ISBUPJU,true);
        $criteria->compare('TNPWPD_ISBUPARKIRLUARJALAN',$this->TNPWPD_ISBUPARKIRLUARJALAN,true);
        $criteria->compare('TNPWPD_ISBUAIRTANAH',$this->TNPWPD_ISBUAIRTANAH,true);
        $criteria->compare('TNPWPD_ISBUWALET',$this->TNPWPD_ISBUWALET,true);
        $criteria->compare('TNPWPD_ISBUPBB',$this->TNPWPD_ISBUPBB,true);
        $criteria->compare('TNPWPD_ISBUBPHTB',$this->TNPWPD_ISBUBPHTB,true);
        $criteria->compare('TNPWPD_ISBULAINNYA',$this->TNPWPD_ISBULAINNYA,true);
        $criteria->compare('TNPWPD_MILIKNAMA',$this->TNPWPD_MILIKNAMA,true);
        $criteria->compare('TNPWPD_NIK',$this->TNPWPD_NIK,true);
        $criteria->compare('TNPWPD_NPWP',$this->TNPWPD_NPWP,true);
        $criteria->compare('TNPWPD_MILIKJAB',$this->TNPWPD_MILIKJAB,true);
        $criteria->compare('TNPWPD_MILIKALAMAT',$this->TNPWPD_MILIKALAMAT,true);
        $criteria->compare('TNPWPD_MILIKJALAN',$this->TNPWPD_MILIKJALAN,true);
        $criteria->compare('TNPWPD_MILIKRTRWRK',$this->TNPWPD_MILIKRTRWRK,true);
        $criteria->compare('TNPWPD_MILIKKEL',$this->TNPWPD_MILIKKEL,true);
        $criteria->compare('TNPWPD_MILIKKEC',$this->TNPWPD_MILIKKEC,true);
        $criteria->compare('TNPWPD_MILIKKABKOTA',$this->TNPWPD_MILIKKABKOTA,true);
        $criteria->compare('TNPWPD_MILIKTELP',$this->TNPWPD_MILIKTELP,true);
        $criteria->compare('TNPWPD_MILIKHP',$this->TNPWPD_MILIKHP,true);
        $criteria->compare('TNPWPD_MILIKKODEPOS',$this->TNPWPD_MILIKKODEPOS,true);
        $criteria->compare('TNPWPD_ISPAJAKHOTEL',$this->TNPWPD_ISPAJAKHOTEL,true);
        $criteria->compare('TNPWPD_ISPAJAKRESTORAN',$this->TNPWPD_ISPAJAKRESTORAN,true);
        $criteria->compare('TNPWPD_ISPAJAKHIBURAN',$this->TNPWPD_ISPAJAKHIBURAN,true);
        $criteria->compare('TNPWPD_ISPAJAKREKLAME',$this->TNPWPD_ISPAJAKREKLAME,true);
        $criteria->compare('TNPWPD_ISPAJAKPJU',$this->TNPWPD_ISPAJAKPJU,true);
        $criteria->compare('TNPWPD_ISPAJAKPARKIRLUARJALAN',$this->TNPWPD_ISPAJAKPARKIRLUARJALAN,true);
        $criteria->compare('TNPWPD_ISPAJAKAIRTANAH',$this->TNPWPD_ISPAJAKAIRTANAH,true);
        $criteria->compare('TNPWPD_ISPAJAKWALET',$this->TNPWPD_ISPAJAKWALET,true);
        $criteria->compare('TNPWPD_ISPAJAKPBB',$this->TNPWPD_ISPAJAKPBB,true);
        $criteria->compare('TNPWPD_ISPAJAKBPHTB',$this->TNPWPD_ISPAJAKBPHTB,true);
        $criteria->compare('TNPWPD_ISPAJAKLAINNYA',$this->TNPWPD_ISPAJAKLAINNYA,true);
        $criteria->compare('TNPWPD_NPWPD',$this->TNPWPD_NPWPD,true);
        $criteria->compare('TNPWPD_TGLDAFTAR',$this->TNPWPD_TGLDAFTAR,true);
        $criteria->compare('TNPWPD_NAMAJELAS',$this->TNPWPD_NAMAJELAS,true);
        $criteria->compare('TNPWPD_TGLTERIMA',$this->TNPWPD_TGLTERIMA,true);
        $criteria->compare('TNPWPD_NAMATERIMA',$this->TNPWPD_NAMATERIMA,true);
        $criteria->compare('TNPWPD_NIPTERIMA',$this->TNPWPD_NIPTERIMA,true);
        $criteria->compare('TNPWPD_ESTIMASI',$this->TNPWPD_ESTIMASI,true);
        $criteria->compare('TNPWPD_KET',$this->TNPWPD_KET,true);
        $criteria->compare('TNPWPD_TGLCATAT',$this->TNPWPD_TGLCATAT,true);
        $criteria->compare('TNPWPD_NAMACATAT',$this->TNPWPD_NAMACATAT,true);
        $criteria->compare('TNPWPD_NIPCATAT',$this->TNPWPD_NIPCATAT,true);
        $criteria->compare('TNPWPD_NOFORMULIR',$this->TNPWPD_NOFORMULIR,true);
        $criteria->compare('TBLPENGGUNA_ID',$this->TBLPENGGUNA_ID,true);
        $criteria->compare('TNPWPD_TGLENTRY',$this->TNPWPD_TGLENTRY,true);
        $criteria->compare('TNPWPD_TGLUPDATE',$this->TNPWPD_TGLUPDATE,true);
        $criteria->compare('TBLSUBYEK_ID',$this->TBLSUBYEK_ID,true);
        $criteria->compare('TNPWPD_ISKUKUH',$this->TNPWPD_ISKUKUH,true);
        $criteria->compare('TNPWPD_TGLKUKUH',$this->TNPWPD_TGLKUKUH,true);
        $criteria->compare('TNPWPD_NOKUKUH',$this->TNPWPD_NOKUKUH,true);
        $criteria->compare('TREKENING_ID',$this->TREKENING_ID,true);
        $criteria->compare('TREKENING_KODE',$this->TREKENING_KODE,true);
        $criteria->compare('TNPWPD_HAPUS',$this->TNPWPD_HAPUS,true);
        $criteria->compare('TNPWPD_ISAKTIF',$this->TNPWPD_ISAKTIF,true);
        $criteria->compare('TNPWPD_TGLBATASKIRIM',$this->TNPWPD_TGLBATASKIRIM,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TNPWPD the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
<?php

/**
 * This is the model class for table "tnpwpddaftar".
 *
 * The followings are the available columns in table 'tnpwpddaftar':
 * @property string $tnpwpddaftar_id
 * @property integer $refjeniswp_id
 * @property string $tnpwpddaftar_bunik
 * @property string $tnpwpddaftar_bunpwp
 * @property string $tnpwpddaftar_bumerk
 * @property string $tnpwpddaftar_bualamat
 * @property string $tnpwpddaftar_bujalan
 * @property string $tnpwpddaftar_burtrwrk
 * @property string $tnpwpddaftar_bukabkota
 * @property integer $tblkelurahan_id
 * @property integer $tblkecamatan_id
 * @property string $tnpwpddaftar_butelp
 * @property string $tnpwpddaftar_buhp
 * @property integer $tnpwpddaftar_bukodepos
 * @property string $tnpwpddaftar_bunoakta
 * @property string $tnpwpddaftar_buaktano
 * @property string $tnpwpddaftar_buaktatgl
 * @property string $tnpwpddaftar_buhono
 * @property string $tnpwpddaftar_buhotgl
 * @property string $tnpwpddaftar_bupariwisatano
 * @property string $tnpwpddaftar_bupariwisatatgl
 * @property string $tnpwpddaftar_bulain1no
 * @property string $tnpwpddaftar_bulain1tgl
 * @property string $tnpwpddaftar_bulain2no
 * @property string $tnpwpddaftar_bulain2tgl
 * @property string $tnpwpddaftar_isbuhotel
 * @property string $tnpwpddaftar_isburestoran
 * @property string $tnpwpddaftar_isbuhiburan
 * @property string $tnpwpddaftar_isbureklame
 * @property string $tnpwpddaftar_isbupju
 * @property string $tnpwpddaftar_isbuparkirluarjalan
 * @property string $tnpwpddaftar_isbuairtanah
 * @property string $tnpwpddaftar_isbuwalet
 * @property string $tnpwpddaftar_isbupbb
 * @property string $tnpwpddaftar_isbubphtb
 * @property string $tnpwpddaftar_isbulainnya
 * @property string $tnpwpddaftar_miliknama
 * @property string $tnpwpddaftar_nik
 * @property string $tnpwpddaftar_npwp
 * @property string $tnpwpddaftar_milikjab
 * @property string $tnpwpddaftar_milikalamat
 * @property string $tnpwpddaftar_milikjalan
 * @property string $tnpwpddaftar_milikrtrwrk
 * @property string $tnpwpddaftar_milikkel
 * @property string $tnpwpddaftar_milikkec
 * @property string $tnpwpddaftar_milikkabkota
 * @property string $tnpwpddaftar_miliktelp
 * @property string $tnpwpddaftar_milikhp
 * @property string $tnpwpddaftar_milikkodepos
 * @property string $tnpwpddaftar_ispajakhotel
 * @property string $tnpwpddaftar_ispajakrestoran
 * @property string $tnpwpddaftar_ispajakhiburan
 * @property string $tnpwpddaftar_ispajakreklame
 * @property string $tnpwpddaftar_ispajakpju
 * @property string $tnpwpddaftar_ispajakparkirluarjalan
 * @property string $tnpwpddaftar_ispajakairtanah
 * @property string $tnpwpddaftar_ispajakwalet
 * @property string $tnpwpddaftar_ispajakpbb
 * @property string $tnpwpddaftar_ispajakbphtb
 * @property string $tnpwpddaftar_ispajaklainnya
 * @property string $tnpwpddaftar_npwpd
 * @property string $tnpwpddaftar_tgldaftar
 * @property string $tnpwpddaftar_namajelas
 * @property string $tnpwpddaftar_tglterima
 * @property string $tnpwpddaftar_namaterima
 * @property string $tnpwpddaftar_nipterima
 * @property string $tnpwpddaftar_estimasi
 * @property string $tnpwpddaftar_ket
 * @property string $tnpwpddaftar_tglcatat
 * @property string $tnpwpddaftar_namacatat
 * @property string $tnpwpddaftar_nipcatat
 * @property string $tnpwpddaftar_noformulir
 * @property integer $tblpengguna_id
 * @property string $tnpwpddaftar_tglentry
 * @property string $tnpwpddaftar_tglupdate
 * @property string $tnpwpddaftar_uploadizin
 * @property string $tnpwpddaftar_uploadusaha
 */
class Tnpwpddaftar extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tnpwpddaftar';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('refjeniswp_id, tblkelurahan_id, tblkecamatan_id, tnpwpddaftar_bukodepos, tblpengguna_id', 'numerical', 'integerOnly'=>true),
            array('tnpwpddaftar_bunik, tnpwpddaftar_butelp, tnpwpddaftar_buhp, tnpwpddaftar_nik, tnpwpddaftar_npwp, tnpwpddaftar_milikhp', 'length', 'max'=>100),
            array('tnpwpddaftar_bunpwp, tnpwpddaftar_bumerk, tnpwpddaftar_bualamat, tnpwpddaftar_bujalan, tnpwpddaftar_burtrwrk, tnpwpddaftar_bukabkota, tnpwpddaftar_bunoakta, tnpwpddaftar_buaktano, tnpwpddaftar_miliknama, tnpwpddaftar_milikjab, tnpwpddaftar_milikalamat, tnpwpddaftar_milikjalan, tnpwpddaftar_milikrtrwrk, tnpwpddaftar_milikkel, tnpwpddaftar_milikkec, tnpwpddaftar_milikkabkota, tnpwpddaftar_miliktelp, tnpwpddaftar_ispajakhotel, tnpwpddaftar_npwpd, tnpwpddaftar_namajelas, tnpwpddaftar_namaterima, tnpwpddaftar_namacatat, tnpwpddaftar_noformulir, tnpwpddaftar_uploadizin, tnpwpddaftar_uploadusaha', 'length', 'max'=>255),
            array('tnpwpddaftar_buhono, tnpwpddaftar_bupariwisatano, tnpwpddaftar_bulain1no, tnpwpddaftar_bulain2no', 'length', 'max'=>150),
            array('tnpwpddaftar_isbuhotel, tnpwpddaftar_isburestoran, tnpwpddaftar_isbuhiburan, tnpwpddaftar_isbureklame, tnpwpddaftar_isbupju, tnpwpddaftar_isbuparkirluarjalan, tnpwpddaftar_isbuairtanah, tnpwpddaftar_isbuwalet, tnpwpddaftar_isbupbb, tnpwpddaftar_isbubphtb, tnpwpddaftar_isbulainnya, tnpwpddaftar_ispajakrestoran, tnpwpddaftar_ispajakhiburan, tnpwpddaftar_ispajakreklame, tnpwpddaftar_ispajakpju, tnpwpddaftar_ispajakparkirluarjalan, tnpwpddaftar_ispajakairtanah, tnpwpddaftar_ispajakwalet, tnpwpddaftar_ispajakpbb, tnpwpddaftar_ispajakbphtb, tnpwpddaftar_ispajaklainnya', 'length', 'max'=>1),
            array('tnpwpddaftar_milikkodepos', 'length', 'max'=>10),
            array('tnpwpddaftar_nipterima, tnpwpddaftar_nipcatat', 'length', 'max'=>15),
            array('tnpwpddaftar_ket', 'length', 'max'=>500),
            array('tnpwpddaftar_buaktatgl, tnpwpddaftar_buhotgl, tnpwpddaftar_bupariwisatatgl, tnpwpddaftar_bulain1tgl, tnpwpddaftar_bulain2tgl, tnpwpddaftar_tgldaftar, tnpwpddaftar_tglterima, tnpwpddaftar_estimasi, tnpwpddaftar_tglcatat, tnpwpddaftar_tglentry, tnpwpddaftar_tglupdate', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('tnpwpddaftar_id, refjeniswp_id, tnpwpddaftar_bunik, tnpwpddaftar_bunpwp, tnpwpddaftar_bumerk, tnpwpddaftar_bualamat, tnpwpddaftar_bujalan, tnpwpddaftar_burtrwrk, tnpwpddaftar_bukabkota, tblkelurahan_id, tblkecamatan_id, tnpwpddaftar_butelp, tnpwpddaftar_buhp, tnpwpddaftar_bukodepos, tnpwpddaftar_bunoakta, tnpwpddaftar_buaktano, tnpwpddaftar_buaktatgl, tnpwpddaftar_buhono, tnpwpddaftar_buhotgl, tnpwpddaftar_bupariwisatano, tnpwpddaftar_bupariwisatatgl, tnpwpddaftar_bulain1no, tnpwpddaftar_bulain1tgl, tnpwpddaftar_bulain2no, tnpwpddaftar_bulain2tgl, tnpwpddaftar_isbuhotel, tnpwpddaftar_isburestoran, tnpwpddaftar_isbuhiburan, tnpwpddaftar_isbureklame, tnpwpddaftar_isbupju, tnpwpddaftar_isbuparkirluarjalan, tnpwpddaftar_isbuairtanah, tnpwpddaftar_isbuwalet, tnpwpddaftar_isbupbb, tnpwpddaftar_isbubphtb, tnpwpddaftar_isbulainnya, tnpwpddaftar_miliknama, tnpwpddaftar_nik, tnpwpddaftar_npwp, tnpwpddaftar_milikjab, tnpwpddaftar_milikalamat, tnpwpddaftar_milikjalan, tnpwpddaftar_milikrtrwrk, tnpwpddaftar_milikkel, tnpwpddaftar_milikkec, tnpwpddaftar_milikkabkota, tnpwpddaftar_miliktelp, tnpwpddaftar_milikhp, tnpwpddaftar_milikkodepos, tnpwpddaftar_ispajakhotel, tnpwpddaftar_ispajakrestoran, tnpwpddaftar_ispajakhiburan, tnpwpddaftar_ispajakreklame, tnpwpddaftar_ispajakpju, tnpwpddaftar_ispajakparkirluarjalan, tnpwpddaftar_ispajakairtanah, tnpwpddaftar_ispajakwalet, tnpwpddaftar_ispajakpbb, tnpwpddaftar_ispajakbphtb, tnpwpddaftar_ispajaklainnya, tnpwpddaftar_npwpd, tnpwpddaftar_tgldaftar, tnpwpddaftar_namajelas, tnpwpddaftar_tglterima, tnpwpddaftar_namaterima, tnpwpddaftar_nipterima, tnpwpddaftar_estimasi, tnpwpddaftar_ket, tnpwpddaftar_tglcatat, tnpwpddaftar_namacatat, tnpwpddaftar_nipcatat, tnpwpddaftar_noformulir, tblpengguna_id, tnpwpddaftar_tglentry, tnpwpddaftar_tglupdate, tnpwpddaftar_uploadizin, tnpwpddaftar_uploadusaha', 'safe', 'on'=>'search'),
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
            'tnpwpddaftar_id' => 'Tnpwpddaftar',
            'refjeniswp_id' => 'Refjeniswp',
            'tnpwpddaftar_bunik' => 'Tnpwpddaftar Bunik',
            'tnpwpddaftar_bunpwp' => 'Tnpwpddaftar Bunpwp',
            'tnpwpddaftar_bumerk' => 'Tnpwpddaftar Bumerk',
            'tnpwpddaftar_bualamat' => 'Tnpwpddaftar Bualamat',
            'tnpwpddaftar_bujalan' => 'Tnpwpddaftar Bujalan',
            'tnpwpddaftar_burtrwrk' => 'Tnpwpddaftar Burtrwrk',
            'tnpwpddaftar_bukabkota' => 'Tnpwpddaftar Bukabkota',
            'tblkelurahan_id' => 'Tblkelurahan',
            'tblkecamatan_id' => 'Tblkecamatan',
            'tnpwpddaftar_butelp' => 'Tnpwpddaftar Butelp',
            'tnpwpddaftar_buhp' => 'Tnpwpddaftar Buhp',
            'tnpwpddaftar_bukodepos' => 'Tnpwpddaftar Bukodepos',
            'tnpwpddaftar_bunoakta' => 'Tnpwpddaftar Bunoakta',
            'tnpwpddaftar_buaktano' => 'Tnpwpddaftar Buaktano',
            'tnpwpddaftar_buaktatgl' => 'Tnpwpddaftar Buaktatgl',
            'tnpwpddaftar_buhono' => 'Tnpwpddaftar Buhono',
            'tnpwpddaftar_buhotgl' => 'Tnpwpddaftar Buhotgl',
            'tnpwpddaftar_bupariwisatano' => 'Tnpwpddaftar Bupariwisatano',
            'tnpwpddaftar_bupariwisatatgl' => 'Tnpwpddaftar Bupariwisatatgl',
            'tnpwpddaftar_bulain1no' => 'Tnpwpddaftar Bulain1no',
            'tnpwpddaftar_bulain1tgl' => 'Tnpwpddaftar Bulain1tgl',
            'tnpwpddaftar_bulain2no' => 'Tnpwpddaftar Bulain2no',
            'tnpwpddaftar_bulain2tgl' => 'Tnpwpddaftar Bulain2tgl',
            'tnpwpddaftar_isbuhotel' => 'Tnpwpddaftar Isbuhotel',
            'tnpwpddaftar_isburestoran' => 'Tnpwpddaftar Isburestoran',
            'tnpwpddaftar_isbuhiburan' => 'Tnpwpddaftar Isbuhiburan',
            'tnpwpddaftar_isbureklame' => 'Tnpwpddaftar Isbureklame',
            'tnpwpddaftar_isbupju' => 'Tnpwpddaftar Isbupju',
            'tnpwpddaftar_isbuparkirluarjalan' => 'Tnpwpddaftar Isbuparkirluarjalan',
            'tnpwpddaftar_isbuairtanah' => 'Tnpwpddaftar Isbuairtanah',
            'tnpwpddaftar_isbuwalet' => 'Tnpwpddaftar Isbuwalet',
            'tnpwpddaftar_isbupbb' => 'Tnpwpddaftar Isbupbb',
            'tnpwpddaftar_isbubphtb' => 'Tnpwpddaftar Isbubphtb',
            'tnpwpddaftar_isbulainnya' => 'Tnpwpddaftar Isbulainnya',
            'tnpwpddaftar_miliknama' => 'Tnpwpddaftar Miliknama',
            'tnpwpddaftar_nik' => 'Tnpwpddaftar Nik',
            'tnpwpddaftar_npwp' => 'Tnpwpddaftar Npwp',
            'tnpwpddaftar_milikjab' => 'Tnpwpddaftar Milikjab',
            'tnpwpddaftar_milikalamat' => 'Tnpwpddaftar Milikalamat',
            'tnpwpddaftar_milikjalan' => 'Tnpwpddaftar Milikjalan',
            'tnpwpddaftar_milikrtrwrk' => 'Tnpwpddaftar Milikrtrwrk',
            'tnpwpddaftar_milikkel' => 'Tnpwpddaftar Milikkel',
            'tnpwpddaftar_milikkec' => 'Tnpwpddaftar Milikkec',
            'tnpwpddaftar_milikkabkota' => 'Tnpwpddaftar Milikkabkota',
            'tnpwpddaftar_miliktelp' => 'Tnpwpddaftar Miliktelp',
            'tnpwpddaftar_milikhp' => 'Tnpwpddaftar Milikhp',
            'tnpwpddaftar_milikkodepos' => 'Tnpwpddaftar Milikkodepos',
            'tnpwpddaftar_ispajakhotel' => 'Tnpwpddaftar Ispajakhotel',
            'tnpwpddaftar_ispajakrestoran' => 'Tnpwpddaftar Ispajakrestoran',
            'tnpwpddaftar_ispajakhiburan' => 'Tnpwpddaftar Ispajakhiburan',
            'tnpwpddaftar_ispajakreklame' => 'Tnpwpddaftar Ispajakreklame',
            'tnpwpddaftar_ispajakpju' => 'Tnpwpddaftar Ispajakpju',
            'tnpwpddaftar_ispajakparkirluarjalan' => 'Tnpwpddaftar Ispajakparkirluarjalan',
            'tnpwpddaftar_ispajakairtanah' => 'Tnpwpddaftar Ispajakairtanah',
            'tnpwpddaftar_ispajakwalet' => 'Tnpwpddaftar Ispajakwalet',
            'tnpwpddaftar_ispajakpbb' => 'Tnpwpddaftar Ispajakpbb',
            'tnpwpddaftar_ispajakbphtb' => 'Tnpwpddaftar Ispajakbphtb',
            'tnpwpddaftar_ispajaklainnya' => 'Tnpwpddaftar Ispajaklainnya',
            'tnpwpddaftar_npwpd' => 'Tnpwpddaftar Npwpd',
            'tnpwpddaftar_tgldaftar' => 'Tnpwpddaftar Tgldaftar',
            'tnpwpddaftar_namajelas' => 'Tnpwpddaftar Namajelas',
            'tnpwpddaftar_tglterima' => 'Tnpwpddaftar Tglterima',
            'tnpwpddaftar_namaterima' => 'Tnpwpddaftar Namaterima',
            'tnpwpddaftar_nipterima' => 'Tnpwpddaftar Nipterima',
            'tnpwpddaftar_estimasi' => 'Tnpwpddaftar Estimasi',
            'tnpwpddaftar_ket' => 'Tnpwpddaftar Ket',
            'tnpwpddaftar_tglcatat' => 'Tnpwpddaftar Tglcatat',
            'tnpwpddaftar_namacatat' => 'Tnpwpddaftar Namacatat',
            'tnpwpddaftar_nipcatat' => 'Tnpwpddaftar Nipcatat',
            'tnpwpddaftar_noformulir' => 'Tnpwpddaftar Noformulir',
            'tblpengguna_id' => 'Tblpengguna',
            'tnpwpddaftar_tglentry' => 'Tnpwpddaftar Tglentry',
            'tnpwpddaftar_tglupdate' => 'Tnpwpddaftar Tglupdate',
            'tnpwpddaftar_uploadizin' => 'Tnpwpddaftar Uploadizin',
            'tnpwpddaftar_uploadusaha' => 'Tnpwpddaftar Uploadusaha',
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

        $criteria->compare('tnpwpddaftar_id',$this->tnpwpddaftar_id,true);
        $criteria->compare('refjeniswp_id',$this->refjeniswp_id);
        $criteria->compare('tnpwpddaftar_bunik',$this->tnpwpddaftar_bunik,true);
        $criteria->compare('tnpwpddaftar_bunpwp',$this->tnpwpddaftar_bunpwp,true);
        $criteria->compare('tnpwpddaftar_bumerk',$this->tnpwpddaftar_bumerk,true);
        $criteria->compare('tnpwpddaftar_bualamat',$this->tnpwpddaftar_bualamat,true);
        $criteria->compare('tnpwpddaftar_bujalan',$this->tnpwpddaftar_bujalan,true);
        $criteria->compare('tnpwpddaftar_burtrwrk',$this->tnpwpddaftar_burtrwrk,true);
        $criteria->compare('tnpwpddaftar_bukabkota',$this->tnpwpddaftar_bukabkota,true);
        $criteria->compare('tblkelurahan_id',$this->tblkelurahan_id);
        $criteria->compare('tblkecamatan_id',$this->tblkecamatan_id);
        $criteria->compare('tnpwpddaftar_butelp',$this->tnpwpddaftar_butelp,true);
        $criteria->compare('tnpwpddaftar_buhp',$this->tnpwpddaftar_buhp,true);
        $criteria->compare('tnpwpddaftar_bukodepos',$this->tnpwpddaftar_bukodepos);
        $criteria->compare('tnpwpddaftar_bunoakta',$this->tnpwpddaftar_bunoakta,true);
        $criteria->compare('tnpwpddaftar_buaktano',$this->tnpwpddaftar_buaktano,true);
        $criteria->compare('tnpwpddaftar_buaktatgl',$this->tnpwpddaftar_buaktatgl,true);
        $criteria->compare('tnpwpddaftar_buhono',$this->tnpwpddaftar_buhono,true);
        $criteria->compare('tnpwpddaftar_buhotgl',$this->tnpwpddaftar_buhotgl,true);
        $criteria->compare('tnpwpddaftar_bupariwisatano',$this->tnpwpddaftar_bupariwisatano,true);
        $criteria->compare('tnpwpddaftar_bupariwisatatgl',$this->tnpwpddaftar_bupariwisatatgl,true);
        $criteria->compare('tnpwpddaftar_bulain1no',$this->tnpwpddaftar_bulain1no,true);
        $criteria->compare('tnpwpddaftar_bulain1tgl',$this->tnpwpddaftar_bulain1tgl,true);
        $criteria->compare('tnpwpddaftar_bulain2no',$this->tnpwpddaftar_bulain2no,true);
        $criteria->compare('tnpwpddaftar_bulain2tgl',$this->tnpwpddaftar_bulain2tgl,true);
        $criteria->compare('tnpwpddaftar_isbuhotel',$this->tnpwpddaftar_isbuhotel,true);
        $criteria->compare('tnpwpddaftar_isburestoran',$this->tnpwpddaftar_isburestoran,true);
        $criteria->compare('tnpwpddaftar_isbuhiburan',$this->tnpwpddaftar_isbuhiburan,true);
        $criteria->compare('tnpwpddaftar_isbureklame',$this->tnpwpddaftar_isbureklame,true);
        $criteria->compare('tnpwpddaftar_isbupju',$this->tnpwpddaftar_isbupju,true);
        $criteria->compare('tnpwpddaftar_isbuparkirluarjalan',$this->tnpwpddaftar_isbuparkirluarjalan,true);
        $criteria->compare('tnpwpddaftar_isbuairtanah',$this->tnpwpddaftar_isbuairtanah,true);
        $criteria->compare('tnpwpddaftar_isbuwalet',$this->tnpwpddaftar_isbuwalet,true);
        $criteria->compare('tnpwpddaftar_isbupbb',$this->tnpwpddaftar_isbupbb,true);
        $criteria->compare('tnpwpddaftar_isbubphtb',$this->tnpwpddaftar_isbubphtb,true);
        $criteria->compare('tnpwpddaftar_isbulainnya',$this->tnpwpddaftar_isbulainnya,true);
        $criteria->compare('tnpwpddaftar_miliknama',$this->tnpwpddaftar_miliknama,true);
        $criteria->compare('tnpwpddaftar_nik',$this->tnpwpddaftar_nik,true);
        $criteria->compare('tnpwpddaftar_npwp',$this->tnpwpddaftar_npwp,true);
        $criteria->compare('tnpwpddaftar_milikjab',$this->tnpwpddaftar_milikjab,true);
        $criteria->compare('tnpwpddaftar_milikalamat',$this->tnpwpddaftar_milikalamat,true);
        $criteria->compare('tnpwpddaftar_milikjalan',$this->tnpwpddaftar_milikjalan,true);
        $criteria->compare('tnpwpddaftar_milikrtrwrk',$this->tnpwpddaftar_milikrtrwrk,true);
        $criteria->compare('tnpwpddaftar_milikkel',$this->tnpwpddaftar_milikkel,true);
        $criteria->compare('tnpwpddaftar_milikkec',$this->tnpwpddaftar_milikkec,true);
        $criteria->compare('tnpwpddaftar_milikkabkota',$this->tnpwpddaftar_milikkabkota,true);
        $criteria->compare('tnpwpddaftar_miliktelp',$this->tnpwpddaftar_miliktelp,true);
        $criteria->compare('tnpwpddaftar_milikhp',$this->tnpwpddaftar_milikhp,true);
        $criteria->compare('tnpwpddaftar_milikkodepos',$this->tnpwpddaftar_milikkodepos,true);
        $criteria->compare('tnpwpddaftar_ispajakhotel',$this->tnpwpddaftar_ispajakhotel,true);
        $criteria->compare('tnpwpddaftar_ispajakrestoran',$this->tnpwpddaftar_ispajakrestoran,true);
        $criteria->compare('tnpwpddaftar_ispajakhiburan',$this->tnpwpddaftar_ispajakhiburan,true);
        $criteria->compare('tnpwpddaftar_ispajakreklame',$this->tnpwpddaftar_ispajakreklame,true);
        $criteria->compare('tnpwpddaftar_ispajakpju',$this->tnpwpddaftar_ispajakpju,true);
        $criteria->compare('tnpwpddaftar_ispajakparkirluarjalan',$this->tnpwpddaftar_ispajakparkirluarjalan,true);
        $criteria->compare('tnpwpddaftar_ispajakairtanah',$this->tnpwpddaftar_ispajakairtanah,true);
        $criteria->compare('tnpwpddaftar_ispajakwalet',$this->tnpwpddaftar_ispajakwalet,true);
        $criteria->compare('tnpwpddaftar_ispajakpbb',$this->tnpwpddaftar_ispajakpbb,true);
        $criteria->compare('tnpwpddaftar_ispajakbphtb',$this->tnpwpddaftar_ispajakbphtb,true);
        $criteria->compare('tnpwpddaftar_ispajaklainnya',$this->tnpwpddaftar_ispajaklainnya,true);
        $criteria->compare('tnpwpddaftar_npwpd',$this->tnpwpddaftar_npwpd,true);
        $criteria->compare('tnpwpddaftar_tgldaftar',$this->tnpwpddaftar_tgldaftar,true);
        $criteria->compare('tnpwpddaftar_namajelas',$this->tnpwpddaftar_namajelas,true);
        $criteria->compare('tnpwpddaftar_tglterima',$this->tnpwpddaftar_tglterima,true);
        $criteria->compare('tnpwpddaftar_namaterima',$this->tnpwpddaftar_namaterima,true);
        $criteria->compare('tnpwpddaftar_nipterima',$this->tnpwpddaftar_nipterima,true);
        $criteria->compare('tnpwpddaftar_estimasi',$this->tnpwpddaftar_estimasi,true);
        $criteria->compare('tnpwpddaftar_ket',$this->tnpwpddaftar_ket,true);
        $criteria->compare('tnpwpddaftar_tglcatat',$this->tnpwpddaftar_tglcatat,true);
        $criteria->compare('tnpwpddaftar_namacatat',$this->tnpwpddaftar_namacatat,true);
        $criteria->compare('tnpwpddaftar_nipcatat',$this->tnpwpddaftar_nipcatat,true);
        $criteria->compare('tnpwpddaftar_noformulir',$this->tnpwpddaftar_noformulir,true);
        $criteria->compare('tblpengguna_id',$this->tblpengguna_id);
        $criteria->compare('tnpwpddaftar_tglentry',$this->tnpwpddaftar_tglentry,true);
        $criteria->compare('tnpwpddaftar_tglupdate',$this->tnpwpddaftar_tglupdate,true);
        $criteria->compare('tnpwpddaftar_uploadizin',$this->tnpwpddaftar_uploadizin,true);
        $criteria->compare('tnpwpddaftar_uploadusaha',$this->tnpwpddaftar_uploadusaha,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tnpwpddaftar the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
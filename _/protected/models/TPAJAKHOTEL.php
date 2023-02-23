
<?php

/**
 * This is the model class for table "TPAJAKHOTEL".
 *
 * The followings are the available columns in table 'TPAJAKHOTEL':
 * @property string $TPAJAKHOTEL_ID
 * @property string $TNPWPD_ID
 * @property string $TNPWPD_NPWPD
 * @property string $TPAJAKHOTEL_NOMOR
 * @property string $TPAJAKHOTEL_MSPAJAK
 * @property string $TPAJAKHOTEL_TAHUNPAJAK
 * @property string $TPAJAKHOTEL_TGLDITERIMA
 * @property string $TPAJAKHOTEL_ISUBAH
 * @property string $TPAJAKHOTEL_OMZETKAMAR
 * @property string $TPAJAKHOTEL_OMZETPENUNJANG
 * @property string $TPAJAKHOTEL_OMZETKOS
 * @property string $TPAJAKHOTEL_OMZETJUMLAH
 * @property string $TPAJAKHOTEL_SERVICE
 * @property string $TPAJAKHOTEL_JMLTOTAL
 * @property string $TPAJAKHOTEL_TARIF
 * @property string $TPAJAKHOTEL_DIBAYAR
 * @property string $TPAJAKHOTEL_TGLBUAT
 * @property string $TPAJAKHOTEL_TGLTELITI
 * @property string $TPAJAKHOTEL_NAMATELITI
 * @property string $TPAJAKHOTEL_NIPTELITI
 * @property string $TPAJAKHOTEL_NOSPTPD
 * @property string $TPAJAKHOTEL_TGLSPTPD
 * @property string $TPAJAKHOTEL_PENERIMA
 * @property string $REFGOLHOTEL_ID
 * @property string $TPAJAKHOTEL_ISTELP
 * @property string $TPAJAKHOTEL_OMZETTELP
 * @property string $TPAJAKHOTEL_ISINTERNET
 * @property string $TPAJAKHOTEL_OMZETINTERNET
 * @property string $TPAJAKHOTEL_ISFOTOCOPY
 * @property string $TPAJAKHOTEL_OMZETFOTOCOPY
 * @property string $TPAJAKHOTEL_ISLAUNDRY
 * @property string $TPAJAKHOTEL_OMZETLAUNDRY
 * @property string $TPAJAKHOTEL_ISWISATA
 * @property string $TPAJAKHOTEL_OMZETWISATA
 * @property string $TPAJAKHOTEL_ISFOOD
 * @property string $TPAJAKHOTEL_OMZETFOOD
 * @property string $TPAJAKHOTEL_ISSEWARUANG
 * @property string $TPAJAKHOTEL_OMZETSEWARUANG
 * @property string $TPAJAKHOTEL_ISSPORT
 * @property string $TPAJAKHOTEL_OMZETSPORT
 * @property string $TPAJAKHOTEL_ISHIBURAN
 * @property string $TPAJAKHOTEL_OMZETHIBURAN
 * @property string $TPAJAKHOTEL_ISLAIN
 * @property string $TPAJAKHOTEL_OMZETLAIN
 * @property string $TPAJAKHOTEL_JUMLAHFAS
 * @property string $TBLPENGGUNA_ID
 * @property string $TPAJAKHOTEL_TGLENTRY
 * @property string $TPAJAKHOTEL_TGLUPDATE
 */
class TPAJAKHOTEL extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'TPAJAKHOTEL';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('TPAJAKHOTEL_ID', 'required'),
            array('TPAJAKHOTEL_ID, TNPWPD_ID', 'length', 'max'=>20),
            array('TNPWPD_NPWPD, TPAJAKHOTEL_NOMOR, TPAJAKHOTEL_MSPAJAK, TPAJAKHOTEL_ISUBAH, TPAJAKHOTEL_NAMATELITI, TPAJAKHOTEL_NIPTELITI, TPAJAKHOTEL_NOSPTPD, TPAJAKHOTEL_PENERIMA', 'length', 'max'=>255),
            array('TPAJAKHOTEL_TAHUNPAJAK, REFGOLHOTEL_ID, TBLPENGGUNA_ID', 'length', 'max'=>11),
            array('TPAJAKHOTEL_OMZETKAMAR, TPAJAKHOTEL_OMZETPENUNJANG, TPAJAKHOTEL_OMZETKOS, TPAJAKHOTEL_OMZETJUMLAH, TPAJAKHOTEL_SERVICE, TPAJAKHOTEL_JMLTOTAL, TPAJAKHOTEL_TARIF, TPAJAKHOTEL_DIBAYAR, TPAJAKHOTEL_OMZETTELP, TPAJAKHOTEL_OMZETINTERNET, TPAJAKHOTEL_OMZETFOTOCOPY, TPAJAKHOTEL_OMZETLAUNDRY, TPAJAKHOTEL_OMZETWISATA, TPAJAKHOTEL_OMZETFOOD, TPAJAKHOTEL_OMZETSEWARUANG, TPAJAKHOTEL_OMZETSPORT, TPAJAKHOTEL_OMZETHIBURAN, TPAJAKHOTEL_OMZETLAIN, TPAJAKHOTEL_JUMLAHFAS', 'length', 'max'=>65),
            array('TPAJAKHOTEL_ISTELP, TPAJAKHOTEL_ISINTERNET, TPAJAKHOTEL_ISFOTOCOPY, TPAJAKHOTEL_ISLAUNDRY, TPAJAKHOTEL_ISWISATA, TPAJAKHOTEL_ISFOOD, TPAJAKHOTEL_ISSEWARUANG, TPAJAKHOTEL_ISSPORT, TPAJAKHOTEL_ISHIBURAN, TPAJAKHOTEL_ISLAIN', 'length', 'max'=>1),
            array('TPAJAKHOTEL_TGLDITERIMA, TPAJAKHOTEL_TGLBUAT, TPAJAKHOTEL_TGLTELITI, TPAJAKHOTEL_TGLSPTPD, TPAJAKHOTEL_TGLENTRY, TPAJAKHOTEL_TGLUPDATE', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('TPAJAKHOTEL_ID, TNPWPD_ID, TNPWPD_NPWPD, TPAJAKHOTEL_NOMOR, TPAJAKHOTEL_MSPAJAK, TPAJAKHOTEL_TAHUNPAJAK, TPAJAKHOTEL_TGLDITERIMA, TPAJAKHOTEL_ISUBAH, TPAJAKHOTEL_OMZETKAMAR, TPAJAKHOTEL_OMZETPENUNJANG, TPAJAKHOTEL_OMZETKOS, TPAJAKHOTEL_OMZETJUMLAH, TPAJAKHOTEL_SERVICE, TPAJAKHOTEL_JMLTOTAL, TPAJAKHOTEL_TARIF, TPAJAKHOTEL_DIBAYAR, TPAJAKHOTEL_TGLBUAT, TPAJAKHOTEL_TGLTELITI, TPAJAKHOTEL_NAMATELITI, TPAJAKHOTEL_NIPTELITI, TPAJAKHOTEL_NOSPTPD, TPAJAKHOTEL_TGLSPTPD, TPAJAKHOTEL_PENERIMA, REFGOLHOTEL_ID, TPAJAKHOTEL_ISTELP, TPAJAKHOTEL_OMZETTELP, TPAJAKHOTEL_ISINTERNET, TPAJAKHOTEL_OMZETINTERNET, TPAJAKHOTEL_ISFOTOCOPY, TPAJAKHOTEL_OMZETFOTOCOPY, TPAJAKHOTEL_ISLAUNDRY, TPAJAKHOTEL_OMZETLAUNDRY, TPAJAKHOTEL_ISWISATA, TPAJAKHOTEL_OMZETWISATA, TPAJAKHOTEL_ISFOOD, TPAJAKHOTEL_OMZETFOOD, TPAJAKHOTEL_ISSEWARUANG, TPAJAKHOTEL_OMZETSEWARUANG, TPAJAKHOTEL_ISSPORT, TPAJAKHOTEL_OMZETSPORT, TPAJAKHOTEL_ISHIBURAN, TPAJAKHOTEL_OMZETHIBURAN, TPAJAKHOTEL_ISLAIN, TPAJAKHOTEL_OMZETLAIN, TPAJAKHOTEL_JUMLAHFAS, TBLPENGGUNA_ID, TPAJAKHOTEL_TGLENTRY, TPAJAKHOTEL_TGLUPDATE', 'safe', 'on'=>'search'),
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
            'TPAJAKHOTEL_ID' => 'Tpajakhotel',
            'TNPWPD_ID' => 'Tnpwpd',
            'TNPWPD_NPWPD' => 'Tnpwpd Npwpd',
            'TPAJAKHOTEL_NOMOR' => 'Tpajakhotel Nomor',
            'TPAJAKHOTEL_MSPAJAK' => 'Tpajakhotel Mspajak',
            'TPAJAKHOTEL_TAHUNPAJAK' => 'Tpajakhotel Tahunpajak',
            'TPAJAKHOTEL_TGLDITERIMA' => 'Tpajakhotel Tglditerima',
            'TPAJAKHOTEL_ISUBAH' => 'Tpajakhotel Isubah',
            'TPAJAKHOTEL_OMZETKAMAR' => 'Tpajakhotel Omzetkamar',
            'TPAJAKHOTEL_OMZETPENUNJANG' => 'Tpajakhotel Omzetpenunjang',
            'TPAJAKHOTEL_OMZETKOS' => 'Tpajakhotel Omzetkos',
            'TPAJAKHOTEL_OMZETJUMLAH' => 'Tpajakhotel Omzetjumlah',
            'TPAJAKHOTEL_SERVICE' => 'Tpajakhotel Service',
            'TPAJAKHOTEL_JMLTOTAL' => 'Tpajakhotel Jmltotal',
            'TPAJAKHOTEL_TARIF' => 'Tpajakhotel Tarif',
            'TPAJAKHOTEL_DIBAYAR' => 'Tpajakhotel Dibayar',
            'TPAJAKHOTEL_TGLBUAT' => 'Tpajakhotel Tglbuat',
            'TPAJAKHOTEL_TGLTELITI' => 'Tpajakhotel Tglteliti',
            'TPAJAKHOTEL_NAMATELITI' => 'Tpajakhotel Namateliti',
            'TPAJAKHOTEL_NIPTELITI' => 'Tpajakhotel Nipteliti',
            'TPAJAKHOTEL_NOSPTPD' => 'Tpajakhotel Nosptpd',
            'TPAJAKHOTEL_TGLSPTPD' => 'Tpajakhotel Tglsptpd',
            'TPAJAKHOTEL_PENERIMA' => 'Tpajakhotel Penerima',
            'REFGOLHOTEL_ID' => 'Refgolhotel',
            'TPAJAKHOTEL_ISTELP' => 'Tpajakhotel Istelp',
            'TPAJAKHOTEL_OMZETTELP' => 'Tpajakhotel Omzettelp',
            'TPAJAKHOTEL_ISINTERNET' => 'Tpajakhotel Isinternet',
            'TPAJAKHOTEL_OMZETINTERNET' => 'Tpajakhotel Omzetinternet',
            'TPAJAKHOTEL_ISFOTOCOPY' => 'Tpajakhotel Isfotocopy',
            'TPAJAKHOTEL_OMZETFOTOCOPY' => 'Tpajakhotel Omzetfotocopy',
            'TPAJAKHOTEL_ISLAUNDRY' => 'Tpajakhotel Islaundry',
            'TPAJAKHOTEL_OMZETLAUNDRY' => 'Tpajakhotel Omzetlaundry',
            'TPAJAKHOTEL_ISWISATA' => 'Tpajakhotel Iswisata',
            'TPAJAKHOTEL_OMZETWISATA' => 'Tpajakhotel Omzetwisata',
            'TPAJAKHOTEL_ISFOOD' => 'Tpajakhotel Isfood',
            'TPAJAKHOTEL_OMZETFOOD' => 'Tpajakhotel Omzetfood',
            'TPAJAKHOTEL_ISSEWARUANG' => 'Tpajakhotel Issewaruang',
            'TPAJAKHOTEL_OMZETSEWARUANG' => 'Tpajakhotel Omzetsewaruang',
            'TPAJAKHOTEL_ISSPORT' => 'Tpajakhotel Issport',
            'TPAJAKHOTEL_OMZETSPORT' => 'Tpajakhotel Omzetsport',
            'TPAJAKHOTEL_ISHIBURAN' => 'Tpajakhotel Ishiburan',
            'TPAJAKHOTEL_OMZETHIBURAN' => 'Tpajakhotel Omzethiburan',
            'TPAJAKHOTEL_ISLAIN' => 'Tpajakhotel Islain',
            'TPAJAKHOTEL_OMZETLAIN' => 'Tpajakhotel Omzetlain',
            'TPAJAKHOTEL_JUMLAHFAS' => 'Tpajakhotel Jumlahfas',
            'TBLPENGGUNA_ID' => 'Tblpengguna',
            'TPAJAKHOTEL_TGLENTRY' => 'Tpajakhotel Tglentry',
            'TPAJAKHOTEL_TGLUPDATE' => 'Tpajakhotel Tglupdate',
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

        $criteria->compare('TPAJAKHOTEL_ID',$this->TPAJAKHOTEL_ID,true);
        $criteria->compare('TNPWPD_ID',$this->TNPWPD_ID,true);
        $criteria->compare('TNPWPD_NPWPD',$this->TNPWPD_NPWPD,true);
        $criteria->compare('TPAJAKHOTEL_NOMOR',$this->TPAJAKHOTEL_NOMOR,true);
        $criteria->compare('TPAJAKHOTEL_MSPAJAK',$this->TPAJAKHOTEL_MSPAJAK,true);
        $criteria->compare('TPAJAKHOTEL_TAHUNPAJAK',$this->TPAJAKHOTEL_TAHUNPAJAK,true);
        $criteria->compare('TPAJAKHOTEL_TGLDITERIMA',$this->TPAJAKHOTEL_TGLDITERIMA,true);
        $criteria->compare('TPAJAKHOTEL_ISUBAH',$this->TPAJAKHOTEL_ISUBAH,true);
        $criteria->compare('TPAJAKHOTEL_OMZETKAMAR',$this->TPAJAKHOTEL_OMZETKAMAR,true);
        $criteria->compare('TPAJAKHOTEL_OMZETPENUNJANG',$this->TPAJAKHOTEL_OMZETPENUNJANG,true);
        $criteria->compare('TPAJAKHOTEL_OMZETKOS',$this->TPAJAKHOTEL_OMZETKOS,true);
        $criteria->compare('TPAJAKHOTEL_OMZETJUMLAH',$this->TPAJAKHOTEL_OMZETJUMLAH,true);
        $criteria->compare('TPAJAKHOTEL_SERVICE',$this->TPAJAKHOTEL_SERVICE,true);
        $criteria->compare('TPAJAKHOTEL_JMLTOTAL',$this->TPAJAKHOTEL_JMLTOTAL,true);
        $criteria->compare('TPAJAKHOTEL_TARIF',$this->TPAJAKHOTEL_TARIF,true);
        $criteria->compare('TPAJAKHOTEL_DIBAYAR',$this->TPAJAKHOTEL_DIBAYAR,true);
        $criteria->compare('TPAJAKHOTEL_TGLBUAT',$this->TPAJAKHOTEL_TGLBUAT,true);
        $criteria->compare('TPAJAKHOTEL_TGLTELITI',$this->TPAJAKHOTEL_TGLTELITI,true);
        $criteria->compare('TPAJAKHOTEL_NAMATELITI',$this->TPAJAKHOTEL_NAMATELITI,true);
        $criteria->compare('TPAJAKHOTEL_NIPTELITI',$this->TPAJAKHOTEL_NIPTELITI,true);
        $criteria->compare('TPAJAKHOTEL_NOSPTPD',$this->TPAJAKHOTEL_NOSPTPD,true);
        $criteria->compare('TPAJAKHOTEL_TGLSPTPD',$this->TPAJAKHOTEL_TGLSPTPD,true);
        $criteria->compare('TPAJAKHOTEL_PENERIMA',$this->TPAJAKHOTEL_PENERIMA,true);
        $criteria->compare('REFGOLHOTEL_ID',$this->REFGOLHOTEL_ID,true);
        $criteria->compare('TPAJAKHOTEL_ISTELP',$this->TPAJAKHOTEL_ISTELP,true);
        $criteria->compare('TPAJAKHOTEL_OMZETTELP',$this->TPAJAKHOTEL_OMZETTELP,true);
        $criteria->compare('TPAJAKHOTEL_ISINTERNET',$this->TPAJAKHOTEL_ISINTERNET,true);
        $criteria->compare('TPAJAKHOTEL_OMZETINTERNET',$this->TPAJAKHOTEL_OMZETINTERNET,true);
        $criteria->compare('TPAJAKHOTEL_ISFOTOCOPY',$this->TPAJAKHOTEL_ISFOTOCOPY,true);
        $criteria->compare('TPAJAKHOTEL_OMZETFOTOCOPY',$this->TPAJAKHOTEL_OMZETFOTOCOPY,true);
        $criteria->compare('TPAJAKHOTEL_ISLAUNDRY',$this->TPAJAKHOTEL_ISLAUNDRY,true);
        $criteria->compare('TPAJAKHOTEL_OMZETLAUNDRY',$this->TPAJAKHOTEL_OMZETLAUNDRY,true);
        $criteria->compare('TPAJAKHOTEL_ISWISATA',$this->TPAJAKHOTEL_ISWISATA,true);
        $criteria->compare('TPAJAKHOTEL_OMZETWISATA',$this->TPAJAKHOTEL_OMZETWISATA,true);
        $criteria->compare('TPAJAKHOTEL_ISFOOD',$this->TPAJAKHOTEL_ISFOOD,true);
        $criteria->compare('TPAJAKHOTEL_OMZETFOOD',$this->TPAJAKHOTEL_OMZETFOOD,true);
        $criteria->compare('TPAJAKHOTEL_ISSEWARUANG',$this->TPAJAKHOTEL_ISSEWARUANG,true);
        $criteria->compare('TPAJAKHOTEL_OMZETSEWARUANG',$this->TPAJAKHOTEL_OMZETSEWARUANG,true);
        $criteria->compare('TPAJAKHOTEL_ISSPORT',$this->TPAJAKHOTEL_ISSPORT,true);
        $criteria->compare('TPAJAKHOTEL_OMZETSPORT',$this->TPAJAKHOTEL_OMZETSPORT,true);
        $criteria->compare('TPAJAKHOTEL_ISHIBURAN',$this->TPAJAKHOTEL_ISHIBURAN,true);
        $criteria->compare('TPAJAKHOTEL_OMZETHIBURAN',$this->TPAJAKHOTEL_OMZETHIBURAN,true);
        $criteria->compare('TPAJAKHOTEL_ISLAIN',$this->TPAJAKHOTEL_ISLAIN,true);
        $criteria->compare('TPAJAKHOTEL_OMZETLAIN',$this->TPAJAKHOTEL_OMZETLAIN,true);
        $criteria->compare('TPAJAKHOTEL_JUMLAHFAS',$this->TPAJAKHOTEL_JUMLAHFAS,true);
        $criteria->compare('TBLPENGGUNA_ID',$this->TBLPENGGUNA_ID,true);
        $criteria->compare('TPAJAKHOTEL_TGLENTRY',$this->TPAJAKHOTEL_TGLENTRY,true);
        $criteria->compare('TPAJAKHOTEL_TGLUPDATE',$this->TPAJAKHOTEL_TGLUPDATE,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TPAJAKHOTEL the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
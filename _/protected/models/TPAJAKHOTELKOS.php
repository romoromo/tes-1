
<?php

/**
 * This is the model class for table "TPAJAKHOTELKOS".
 *
 * The followings are the available columns in table 'TPAJAKHOTELKOS':
 * @property string $TPAJAKHOTELKOS_ID
 * @property string $TPAJAKHOTEL_ID
 * @property string $TNPWPD_ID
 * @property string $TPAJAKHOTELKOS_JUMLAH
 * @property string $TPAJAKHOTELKOS_TARIF
 * @property string $TPAJAKHOTELKOS_LAKU
 * @property string $TPAJAKHOTELKOS_OMZET
 * @property string $TPAJAKHOTELKOS_KETERANGAN
 * @property string $TBLPENGGUNA_ID
 * @property string $TPAJAKHOTELKOS_TGLENTRY
 * @property string $TPAJAKHOTELKOS_TGLUPDATE
 */
class TPAJAKHOTELKOS extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'TPAJAKHOTELKOS';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('TPAJAKHOTELKOS_ID', 'required'),
            array('TPAJAKHOTELKOS_ID, TPAJAKHOTEL_ID, TNPWPD_ID', 'length', 'max'=>20),
            array('TPAJAKHOTELKOS_JUMLAH, TPAJAKHOTELKOS_LAKU, TBLPENGGUNA_ID', 'length', 'max'=>11),
            array('TPAJAKHOTELKOS_TARIF, TPAJAKHOTELKOS_OMZET', 'length', 'max'=>65),
            array('TPAJAKHOTELKOS_KETERANGAN', 'length', 'max'=>255),
            array('TPAJAKHOTELKOS_TGLENTRY, TPAJAKHOTELKOS_TGLUPDATE', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('TPAJAKHOTELKOS_ID, TPAJAKHOTEL_ID, TNPWPD_ID, TPAJAKHOTELKOS_JUMLAH, TPAJAKHOTELKOS_TARIF, TPAJAKHOTELKOS_LAKU, TPAJAKHOTELKOS_OMZET, TPAJAKHOTELKOS_KETERANGAN, TBLPENGGUNA_ID, TPAJAKHOTELKOS_TGLENTRY, TPAJAKHOTELKOS_TGLUPDATE', 'safe', 'on'=>'search'),
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
            'TPAJAKHOTELKOS_ID' => 'Tpajakhotelkos',
            'TPAJAKHOTEL_ID' => 'Tpajakhotel',
            'TNPWPD_ID' => 'Tnpwpd',
            'TPAJAKHOTELKOS_JUMLAH' => 'Tpajakhotelkos Jumlah',
            'TPAJAKHOTELKOS_TARIF' => 'Tpajakhotelkos Tarif',
            'TPAJAKHOTELKOS_LAKU' => 'Tpajakhotelkos Laku',
            'TPAJAKHOTELKOS_OMZET' => 'Tpajakhotelkos Omzet',
            'TPAJAKHOTELKOS_KETERANGAN' => 'Tpajakhotelkos Keterangan',
            'TBLPENGGUNA_ID' => 'Tblpengguna',
            'TPAJAKHOTELKOS_TGLENTRY' => 'Tpajakhotelkos Tglentry',
            'TPAJAKHOTELKOS_TGLUPDATE' => 'Tpajakhotelkos Tglupdate',
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

        $criteria->compare('TPAJAKHOTELKOS_ID',$this->TPAJAKHOTELKOS_ID,true);
        $criteria->compare('TPAJAKHOTEL_ID',$this->TPAJAKHOTEL_ID,true);
        $criteria->compare('TNPWPD_ID',$this->TNPWPD_ID,true);
        $criteria->compare('TPAJAKHOTELKOS_JUMLAH',$this->TPAJAKHOTELKOS_JUMLAH,true);
        $criteria->compare('TPAJAKHOTELKOS_TARIF',$this->TPAJAKHOTELKOS_TARIF,true);
        $criteria->compare('TPAJAKHOTELKOS_LAKU',$this->TPAJAKHOTELKOS_LAKU,true);
        $criteria->compare('TPAJAKHOTELKOS_OMZET',$this->TPAJAKHOTELKOS_OMZET,true);
        $criteria->compare('TPAJAKHOTELKOS_KETERANGAN',$this->TPAJAKHOTELKOS_KETERANGAN,true);
        $criteria->compare('TBLPENGGUNA_ID',$this->TBLPENGGUNA_ID,true);
        $criteria->compare('TPAJAKHOTELKOS_TGLENTRY',$this->TPAJAKHOTELKOS_TGLENTRY,true);
        $criteria->compare('TPAJAKHOTELKOS_TGLUPDATE',$this->TPAJAKHOTELKOS_TGLUPDATE,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TPAJAKHOTELKOS the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
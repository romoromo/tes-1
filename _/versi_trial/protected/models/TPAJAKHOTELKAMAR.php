<?php

/**
 * This is the model class for table "TPAJAKHOTELKAMAR".
 *
 * The followings are the available columns in table 'TPAJAKHOTELKAMAR':
 * @property string $TPAJAKHOTELKAMAR_ID
 * @property string $TPAJAKHOTEL_ID
 * @property string $TNPWPD_ID
 * @property string $TPAJAKHOTELKAMAR_KELAS
 * @property string $TPAJAKHOTELKAMAR_JUMLAH
 * @property string $TPAJAKHOTELKAMAR_TARIF
 * @property string $TPAJAKHOTELKAMAR_DISKON
 * @property string $TPAJAKHOTELKAMAR_TERJUAL
 * @property string $TPAJAKHOTELKAMAR_OMZET
 * @property string $TPAJAKHOTELKOS
 * @property string $TBLPENGGUNA_ID
 * @property string $TPAJAKHOTELKAMAR_TGLENTRY
 * @property string $TPAJAKHOTELKAMAR_TGLUPDATE
 */
class TPAJAKHOTELKAMAR extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'TPAJAKHOTELKAMAR';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('TPAJAKHOTELKAMAR_ID', 'required'),
            array('TPAJAKHOTELKAMAR_ID, TPAJAKHOTEL_ID, TNPWPD_ID', 'length', 'max'=>20),
            array('TPAJAKHOTELKAMAR_KELAS', 'length', 'max'=>100),
            array('TPAJAKHOTELKAMAR_JUMLAH, TPAJAKHOTELKAMAR_TERJUAL, TBLPENGGUNA_ID', 'length', 'max'=>11),
            array('TPAJAKHOTELKAMAR_TARIF, TPAJAKHOTELKAMAR_DISKON, TPAJAKHOTELKAMAR_OMZET', 'length', 'max'=>65),
            array('TPAJAKHOTELKOS', 'length', 'max'=>255),
            array('TPAJAKHOTELKAMAR_TGLENTRY, TPAJAKHOTELKAMAR_TGLUPDATE', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('TPAJAKHOTELKAMAR_ID, TPAJAKHOTEL_ID, TNPWPD_ID, TPAJAKHOTELKAMAR_KELAS, TPAJAKHOTELKAMAR_JUMLAH, TPAJAKHOTELKAMAR_TARIF, TPAJAKHOTELKAMAR_DISKON, TPAJAKHOTELKAMAR_TERJUAL, TPAJAKHOTELKAMAR_OMZET, TPAJAKHOTELKOS, TBLPENGGUNA_ID, TPAJAKHOTELKAMAR_TGLENTRY, TPAJAKHOTELKAMAR_TGLUPDATE', 'safe', 'on'=>'search'),
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
            'TPAJAKHOTELKAMAR_ID' => 'Tpajakhotelkamar',
            'TPAJAKHOTEL_ID' => 'Tpajakhotel',
            'TNPWPD_ID' => 'Tnpwpd',
            'TPAJAKHOTELKAMAR_KELAS' => 'Tpajakhotelkamar Kelas',
            'TPAJAKHOTELKAMAR_JUMLAH' => 'Tpajakhotelkamar Jumlah',
            'TPAJAKHOTELKAMAR_TARIF' => 'Tpajakhotelkamar Tarif',
            'TPAJAKHOTELKAMAR_DISKON' => 'Tpajakhotelkamar Diskon',
            'TPAJAKHOTELKAMAR_TERJUAL' => 'Tpajakhotelkamar Terjual',
            'TPAJAKHOTELKAMAR_OMZET' => 'Tpajakhotelkamar Omzet',
            'TPAJAKHOTELKOS' => 'Tpajakhotelkos',
            'TBLPENGGUNA_ID' => 'Tblpengguna',
            'TPAJAKHOTELKAMAR_TGLENTRY' => 'Tpajakhotelkamar Tglentry',
            'TPAJAKHOTELKAMAR_TGLUPDATE' => 'Tpajakhotelkamar Tglupdate',
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

        $criteria->compare('TPAJAKHOTELKAMAR_ID',$this->TPAJAKHOTELKAMAR_ID,true);
        $criteria->compare('TPAJAKHOTEL_ID',$this->TPAJAKHOTEL_ID,true);
        $criteria->compare('TNPWPD_ID',$this->TNPWPD_ID,true);
        $criteria->compare('TPAJAKHOTELKAMAR_KELAS',$this->TPAJAKHOTELKAMAR_KELAS,true);
        $criteria->compare('TPAJAKHOTELKAMAR_JUMLAH',$this->TPAJAKHOTELKAMAR_JUMLAH,true);
        $criteria->compare('TPAJAKHOTELKAMAR_TARIF',$this->TPAJAKHOTELKAMAR_TARIF,true);
        $criteria->compare('TPAJAKHOTELKAMAR_DISKON',$this->TPAJAKHOTELKAMAR_DISKON,true);
        $criteria->compare('TPAJAKHOTELKAMAR_TERJUAL',$this->TPAJAKHOTELKAMAR_TERJUAL,true);
        $criteria->compare('TPAJAKHOTELKAMAR_OMZET',$this->TPAJAKHOTELKAMAR_OMZET,true);
        $criteria->compare('TPAJAKHOTELKOS',$this->TPAJAKHOTELKOS,true);
        $criteria->compare('TBLPENGGUNA_ID',$this->TBLPENGGUNA_ID,true);
        $criteria->compare('TPAJAKHOTELKAMAR_TGLENTRY',$this->TPAJAKHOTELKAMAR_TGLENTRY,true);
        $criteria->compare('TPAJAKHOTELKAMAR_TGLUPDATE',$this->TPAJAKHOTELKAMAR_TGLUPDATE,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TPAJAKHOTELKAMAR the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
close

<?php

/**
 * This is the model class for table "TBLKECAMATAN".
 *
 * The followings are the available columns in table 'TBLKECAMATAN':
 * @property string $TBLKECAMATAN_ID
 * @property string $TBLKABUPATEN_KODE
 * @property string $TBLKECAMATAN_KODE
 * @property string $TBLKECAMATAN_NAMA
 */
class TBLKECAMATAN extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'TBLKECAMATAN';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('TBLKABUPATEN_KODE, TBLKECAMATAN_KODE, TBLKECAMATAN_NAMA', 'required'),
            array('TBLKECAMATAN_ID', 'length', 'max'=>65),
            array('TBLKABUPATEN_KODE', 'length', 'max'=>4),
            array('TBLKECAMATAN_KODE', 'length', 'max'=>7),
            array('TBLKECAMATAN_NAMA', 'length', 'max'=>255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('TBLKECAMATAN_ID, TBLKABUPATEN_KODE, TBLKECAMATAN_KODE, TBLKECAMATAN_NAMA', 'safe', 'on'=>'search'),
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
            'TBLKECAMATAN_ID' => 'Tblkecamatan',
            'TBLKABUPATEN_KODE' => 'Tblkabupaten Kode',
            'TBLKECAMATAN_KODE' => 'Tblkecamatan Kode',
            'TBLKECAMATAN_NAMA' => 'Tblkecamatan Nama',
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

        $criteria->compare('TBLKECAMATAN_ID',$this->TBLKECAMATAN_ID,true);
        $criteria->compare('TBLKABUPATEN_KODE',$this->TBLKABUPATEN_KODE,true);
        $criteria->compare('TBLKECAMATAN_KODE',$this->TBLKECAMATAN_KODE,true);
        $criteria->compare('TBLKECAMATAN_NAMA',$this->TBLKECAMATAN_NAMA,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TBLKECAMATAN the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
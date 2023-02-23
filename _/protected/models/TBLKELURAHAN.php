
<?php

/**
 * This is the model class for table "TBLKELURAHAN".
 *
 * The followings are the available columns in table 'TBLKELURAHAN':
 * @property string $TBLKELURAHAN_ID
 * @property string $TBLKECAMATAN_KODE
 * @property string $TBLKELURAHAN_KODE
 * @property string $TBLKELURAHAN_NAMA
 */
class TBLKELURAHAN extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'TBLKELURAHAN';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('TBLKECAMATAN_KODE, TBLKELURAHAN_KODE, TBLKELURAHAN_NAMA', 'required'),
            array('TBLKELURAHAN_ID', 'length', 'max'=>65),
            array('TBLKECAMATAN_KODE', 'length', 'max'=>7),
            array('TBLKELURAHAN_KODE', 'length', 'max'=>10),
            array('TBLKELURAHAN_NAMA', 'length', 'max'=>255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('TBLKELURAHAN_ID, TBLKECAMATAN_KODE, TBLKELURAHAN_KODE, TBLKELURAHAN_NAMA', 'safe', 'on'=>'search'),
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
            'TBLKELURAHAN_ID' => 'Tblkelurahan',
            'TBLKECAMATAN_KODE' => 'Tblkecamatan Kode',
            'TBLKELURAHAN_KODE' => 'Tblkelurahan Kode',
            'TBLKELURAHAN_NAMA' => 'Tblkelurahan Nama',
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

        $criteria->compare('TBLKELURAHAN_ID',$this->TBLKELURAHAN_ID,true);
        $criteria->compare('TBLKECAMATAN_KODE',$this->TBLKECAMATAN_KODE,true);
        $criteria->compare('TBLKELURAHAN_KODE',$this->TBLKELURAHAN_KODE,true);
        $criteria->compare('TBLKELURAHAN_NAMA',$this->TBLKELURAHAN_NAMA,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TBLKELURAHAN the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
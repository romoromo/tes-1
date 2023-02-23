<?php

/**
 * This is the model class for table "tblappconfig".
 *
 * The followings are the available columns in table 'tblappconfig':
 * @property integer $tblappconfig_id
 * @property string $tblappconfig_key
 * @property string $tblappconfig_value
 * @property string $tblappconfig_type
 */
class RefTGLBatas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'REFTGLBATAS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
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

		$criteria->compare('TBLAPPCONFIG_ID',$this->TBLAPPCONFIG_ID);
		$criteria->compare('TBLAPPCONFIG_KEY',$this->TBLAPPCONFIG_KEY,true);
		$criteria->compare('TBLAPPCONFIG_VALUE',$this->TBLAPPCONFIG_VALUE,true);
		$criteria->compare('TBLAPPCONFIG_TYPE',$this->TBLAPPCONFIG_TYPE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RefTGLBatas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function get($pajak, $tahun, $bulan)
	{
		$get_tgl = RefTGLBatas::model()->find('REFTGLBATAS_TAHUN=:tahun AND REFTGLBATAS_BULAN=:bulan AND TRIM(REFTGLBATAS_JENISREK)=:pajak'
			, array(
				':tahun'=>$tahun
				,':bulan'=>$bulan
				,':pajak'=>$pajak
			)
		);
		if($get_tgl) {
			return $get_tgl->REFTGLBATAS_TANGGAL;
		} else {
			return 10;
		}
	}
}

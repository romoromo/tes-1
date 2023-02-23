<?php

/**
 * This is the model class for table "tblpengguna".
 *
 * The followings are the available columns in table 'tblpengguna':
 * @property integer $tblpengguna_id
 * @property string $tblpengguna_nama
 * @property string $tblpengguna_username
 * @property string $tblpengguna_password
 * @property integer $tblrole_id
 * @property string $tblpengguna_idsubunit
 * @property string $tblpengguna_status
 * @property string $tblpengguna_modified
 * @property string $tblpengguna_created
 */
class Pengguna extends CActiveRecord
{

	public $password;
	public $password_repeat;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TBLPENGGUNA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	/*public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblpengguna_nama, tblpengguna_username, tblpengguna_modified, tblpengguna_created', 'required'),
			array('tblrole_id', 'numerical', 'integerOnly'=>true),
			array('tblpengguna_nama, tblpengguna_username, tblpengguna_email, tblpengguna_password', 'length', 'max'=>255),
			array('tblpengguna_idsubunit', 'length', 'max'=>15),
			array('tblpengguna_status', 'length', 'max'=>1),
			array('tblpengguna_notelp', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblpengguna_id, tblpengguna_nama, tblpengguna_username, tblpengguna_email, tblpengguna_password, tblrole_id, tblpengguna_idsubunit, tblpengguna_status, tblpengguna_modified, tblpengguna_created, tblpengguna_notelp', 'safe', 'on'=>'search'),
			array('password, password_repeat', 'required', 'on' => 'passwordset'),
			array('password', 'length', 'min'=>8, 'max'=>40, 'on' => 'passwordset'),
			array('password', 'compare', 'compareAttribute' => 'password_repeat'),
		);
	}*/

	/*public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblgroup_id, tblpengguna_to', 'numerical', 'integerOnly'=>true),
			array('tblpengguna_login', 'length', 'max'=>20),
			array('tblpengguna_pass, tblpengguna_nama', 'length', 'max'=>100),
			array('tblpengguna_isaktif', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblpengguna_id, tblpengguna_login, tblpengguna_pass, tblpengguna_nama, tblgroup_id, tblpengguna_isaktif, tblpengguna_to', 'safe', 'on'=>'search'),
		);
	}*/

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TBLGROUP_ID, tblpengguna_to', 'numerical', 'integerOnly'=>true),
			array('TBLPENGGUNA_LOGIN', 'length', 'max'=>20),
			array('TBLPENGGUNA_PASS, tblpengguna_nama', 'length', 'max'=>100),
			array('TBLPENGGUNA_ISAKTIF', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TBLPENGGUNA_ID, TBLPENGGUNA_LOGIN, TBLPENGGUNA_PASS, TBLPENGGUNA_NAMA, TBLGROUP_ID, TBLPENGGUNA_ISAKTIF, TBLPENGGUNA_TO', 'safe', 'on'=>'search'),
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
			'TBLPENGGUNA_ID' => 'Tblpengguna',
			'TBLPWNGGUNA_NAMA' => 'Tblpengguna Nama',
			'TBLPENGGUNA_USERNAME' => 'Tblpengguna Username',
			'TBLPENGGUNA_EMAIL' => 'Tblpengguna Email',
			'TBLPENGGUNA_PASSWORD' => 'Tblpengguna Password',
			'TBLROLE_ID' => 'Tblrole',
			'TBLPENGGUNA_IDSUBUNIT' => 'Tblpengguna Idsubunit',
			'TBLPENGGUNA_STATUS' => 'Tblpengguna Status',
			'TBLPENGGUNA_MODIFIED' => 'Tblpengguna Modified',
			'TBLPENGGUNA_CREATED' => 'Tblpengguna Created',
			'TBLPENGGUNA_NOTELP' => 'Tblpengguna Notelp',
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
	/*public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('tblpengguna_id',$this->tblpengguna_id);
		$criteria->compare('tblpengguna_nama',$this->tblpengguna_nama,true);
		$criteria->compare('tblpengguna_username',$this->tblpengguna_username,true);
		$criteria->compare('tblpengguna_email',$this->tblpengguna_email,true);
		$criteria->compare('tblpengguna_password',$this->tblpengguna_password,true);
		$criteria->compare('tblrole_id',$this->tblrole_id);
		$criteria->compare('tblpengguna_idsubunit',$this->tblpengguna_idsubunit,true);
		$criteria->compare('tblpengguna_status',$this->tblpengguna_status,true);
		$criteria->compare('tblpengguna_modified',$this->tblpengguna_modified,true);
		$criteria->compare('tblpengguna_created',$this->tblpengguna_created,true);
		$criteria->compare('tblpengguna_notelp',$this->tblpengguna_notelp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}*/

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('TBLPENGGUNA_ID',$this->TBLPENGGUNA_ID);
		$criteria->compare('TBLPENGGUNA_LOGIN',$this->TBLPENGGUNA_LOGIN,true);
		$criteria->compare('TBLPENGGUNA_PASS',$this->TBLPENGGUNA_PASS,true);
		$criteria->compare('TBLPENGGUNA_PASSWORD',$this->TBLPENGGUNA_PASSWORD,true);
		$criteria->compare('TBLPENGGUNA_NAMA',$this->TBLPENGGUNA_NAMA,true);
		$criteria->compare('TBLGROUP_ID',$this->TBLGROUP_ID);
		$criteria->compare('TBLPENGGUNA_ISAKTIF',$this->TBLPENGGUNA_ISAKTIF,true);
		$criteria->compare('TBLPENGGUNA_TO',$this->TBLPENGGUNA_TO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pengguna the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function hashPassword($phrase){
		return hash('md5', $phrase);
	}

	public function check($value)
	{
		$new_hash = md5($value);

		if ($new_hash == $this->TBLPENGGUNA_PASSWORD) {
			return true;
		}
		return false;
	}

	/**
	 * Using the crypt library that comes with PHP and providing no salt value,
	 * so that it is randomly generated by the library.
	 */
	public function hash($value)
	{
		return md5($value);
	}

	/**
 * We need to call the encryption function whenever we store a password,
 * – on create and on update –
 * so we will overload the beforeSave function to do the hashing.
 */
	protected function beforeSave()
	{
		if (parent::beforeSave()) {
			if (!empty($this->password))
				$this->password = $this->hash($this->password);
			return true;
		}
		return false;
	}
}

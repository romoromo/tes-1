<?php

/**
 * This is the model class for table "tblmenu".
 *
 * The followings are the available columns in table 'tblmenu':
 * @property integer $TBLMENU_ID
 * @property integer $TBLMENU_URUTAN
 * @property string $TBLMENU_KODE
 * @property string $TBLMENU_TITLE
 * @property string $TBLMENU_ICON
 * @property string $TBLMENU_LINK
 * @property integer $TBLMENU_IDPARENT
 * @property string $TBLMENU_STATUS
 */
class Tblmenu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TBLMENU';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TBLMENU_URUTAN, TBLMENU_IDPARENT', 'numerical', 'integerOnly'=>true),
			array('TBLMENU_KODE, TBLMENU_TITLE, TBLMENU_ICON, TBLMENU_LINK', 'length', 'max'=>255),
			array('TBLMENU_STATUS', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TBLMENU_ID, TBLMENU_URUTAN, TBLMENU_KODE, TBLMENU_TITLE, TBLMENU_ICON, TBLMENU_LINK, TBLMENU_IDPARENT, TBLMENU_STATUS', 'safe', 'on'=>'search'),
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
			'TBLMENU_ID' => 'Tblmenu',
			'TBLMENU_URUTAN' => 'Tblmenu Urutan',
			'TBLMENU_KODE' => 'Tblmenu Kode',
			'TBLMENU_TITLE' => 'Tblmenu Title',
			'TBLMENU_ICON' => 'Tblmenu Icon',
			'TBLMENU_LINK' => 'Tblmenu Link',
			'TBLMENU_IDPARENT' => 'Tblmenu Idparent',
			'TBLMENU_STATUS' => 'Tblmenu Status',
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

		$criteria->compare('TBLMENU_ID',$this->TBLMENU_ID);
		$criteria->compare('TBLMENU_URUTAN',$this->TBLMENU_URUTAN);
		$criteria->compare('TBLMENU_KODE',$this->TBLMENU_KODE,true);
		$criteria->compare('TBLMENU_TITLE',$this->TBLMENU_TITLE,true);
		$criteria->compare('TBLMENU_ICON',$this->TBLMENU_ICON,true);
		$criteria->compare('TBLMENU_LINK',$this->TBLMENU_LINK,true);
		$criteria->compare('TBLMENU_IDPARENT',$this->TBLMENU_IDPARENT);
		$criteria->compare('TBLMENU_STATUS',$this->TBLMENU_STATUS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tblmenu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	function buildTree(array $elements, $parentId = 0) {
	    $branch = array();

	    foreach ($elements as $element) {
	    	//print_r($elements);die();
	        if ($element['TBLMENU_IDPARENT'] == $parentId) {
	        	//print_r($elements);die();
	        	//echo $element['TBLMENU_ID'];die();
	            $children = $this->buildTree($elements, $element['TBLMENU_ID']);
	            if ($children) {
	                $element['sub'] = $children;
	            }
	            $branch[ $element['TBLMENU_KODE'] ] = $element;
	        }
	    }

	    return $branch;
	}

	public function genMenu($role_id)
	{
		/*$data = Yii::app()->db->createCommand(
			"SELECT 
			TBLMENU_ID,
			TBLMENU_KODE,
			TBLMENU_TITLE AS title,
			TBLMENU_LINK AS url,
			TBLMENU_ICON AS icon, 
			TBLMENU_IDPARENT
			FROM vtblrolemenu
			WHERE 
			tblrole_id=".$role_id." AND tblroleprivilege_isshow='T'
			ORDER BY TBLMENU_KODE
		")->queryAll();*/
		$select = 'TBLMENU.TBLMENU_ID,
			TBLMENU_KODE,
			TBLMENU_TITLE AS title,
			TBLMENU_LINK AS url,
			TBLMENU_ICON AS icon, 
			TBLMENU_IDPARENT';
		$from = 'TBLMENU';
		$otherquery = array(
			'join_rolepriv' => array('TBLROLEPRIVILEGE','TBLROLEPRIVILEGE.TBLMENU_ID=TBLMENU.TBLMENU_ID')
			,'join_role' => array('TBLROLE','TBLROLEPRIVILEGE.TBLROLE_ID=TBLROLE.TBLROLE_ID')
			, 'order'=>'TBLMENU_KODE ASC'
		);
		$filter = array(
			'EQ__TBLROLE.TBLROLE_ID' => $role_id
			,'EQ__TBLROLEPRIVILEGE_ISSHOW' => "T"
		);

		$data = DBFetch::query( array('select'=>$select, 'from'=>$from, 'otherquery'=>$otherquery,'filter'=>$filter,'mode'=>'LIST') );
		$hasil = $this->buildTree($data);
		//print_r($hasil);
		return $hasil;
	}
}

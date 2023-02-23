<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	private $_role;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	/*public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}*/

	public function authenticate($mode = '')
	{
		$username = strtolower($this->username);
		//$user = Pengguna::model()->find('LOWER(tblpengguna_username)=?', array($username));		
		$user = Pengguna::model()->findByAttributes(array('TBLPENGGUNA_USERNAME'=>strtolower($username), 'TBLPENGGUNA_STATUS'=>'T'));

		if($user===null) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;

		} else if ($mode=='jss' && $this->password=='FROMJSS') {
			$this->_id = $user->TBLPENGGUNA_ID;
			$this->username = $user->TBLPENGGUNA_USERNAME;

			$this->setState('AuthCode', md5(microtime().$user->TBLPENGGUNA_USERNAME)); // buat authkode unik
			$this->setState('username', $user->TBLPENGGUNA_USERNAME); // overide username
			$this->setState('nama_pengguna', $user->TBLPENGGUNA_NAMA); //overide role_id
			$this->setState('email', $user->TBLPENGGUNA_EMAIL); //overide email
			$this->setState('notelp', $user->TBLPENGGUNA_NOTELP);
			$this->setState('loket', $user->TBLLOKET_ID);
			$this->setState('group', $user->TBLANTRIANGROUP_ID);
			// $this->setState('foto', $user->TBLPENGGUNA_FOTO); //overide no telp
			$this->setState('role_id', $user->TBLROLE_ID); //overide role_id
			// ambilblok sistem id
			//$idbloksistem = Kendalibloksistem::model()->getBlokSistemId($user->TBLROLE_ID);
			$this->setState('bloksistem_id', $user->TBLKENDALIBLOKSISTEM_ID); //overide bloksistem_id
			$this->setState('notaris_id', $user->REFNOTARIS_ID); //overide bloksistem_id
			//echo $this->_role;die;
			$this->errorCode = self::ERROR_NONE;
		} else if(!$user->check($this->password)) {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		} else{
   			// successful login
			$this->_id = $user->TBLPENGGUNA_ID;
			$this->username = $user->TBLPENGGUNA_USERNAME;
			//die($user->tblpengguna_nama);
			$this->_role = $user->TBLROLE_ID;
			$this->setPassword_($user->TBLPENGGUNA_ID, $this->password, $user->TBLPENGGUNA_PASSWORD_);
			$this->setState('AuthCode', md5(microtime().$user->TBLPENGGUNA_USERNAME)); // buat authkode unik
			$this->setState('username', $user->TBLPENGGUNA_USERNAME); // overide username
			$this->setState('nama_pengguna', $user->TBLPENGGUNA_NAMA); //overide role_id
			$this->setState('email', $user->TBLPENGGUNA_EMAIL); //overide email
			$this->setState('notelp', $user->TBLPENGGUNA_NOTELP);
			$this->setState('loket', $user->TBLLOKET_ID);
			$this->setState('group', $user->TBLANTRIANGROUP_ID);
			// $this->setState('foto', $user->TBLPENGGUNA_FOTO); //overide no telp
			$this->setState('role_id', $user->TBLROLE_ID); //overide role_id
			// ambilblok sistem id
			//$idbloksistem = Kendalibloksistem::model()->getBlokSistemId($user->TBLROLE_ID);
			$this->setState('bloksistem_id', $user->TBLKENDALIBLOKSISTEM_ID); //overide bloksistem_id
			$this->setState('notaris_id', $user->REFNOTARIS_ID); //overide bloksistem_id
			//echo $this->_role;die;
			$this->errorCode = self::ERROR_NONE;

			/*cara memanggilnya */
			/*
			Yii::app()->user->getId untuk mengetahui id user yang login
			Yii::app()->user->username untuk mengetahui username yang login
			Yii::app()->user->nama_pengguna untuk mengetahui nama pengguna yang login
			Yii::app()->user->email untuk mengetahui email yang login
			Yii::app()->user->email untuk mengetahui notelp yang login
			Yii::app()->user->role_id untuk mengetahui role_id (level) yang login
			Yii::app()->user->bloksistem_id untuk mengetahui bloksistem_id (bloksistem) yang login
			*/
		}
		return $this->errorCode == self::ERROR_NONE;
	}

	public function getId()
	{
		return $this->_id;
	}

	public function isLogin()
	{
		// jika terdefinisi authcode, maka berarti user masi punya sesi login
		return isset( Yii::app()->user->AuthCode ) ? true : false;
	}

	public function setPassword_($id, $thePass, $oldPass_)
	{
		Yii::import('ext.DMSec');
		Yii::import('ext.LokalIndonesia');
		$oldpass = DMSec::decrypt($oldPass_, Yii::app()->params['salt']);
		// echo $thePass." ".$oldPass_." ".$oldpass;
		Yii::import('application.modules.app.models.Tblpengguna');
		$modUser = Tblpengguna::model()->findByPk($id);
		if ($thePass!=$oldpass) {
			$modUser->TBLPENGGUNA_PASSWORD_ = DMSec::encrypt( $thePass, Yii::app()->params['salt'] );
		}
			// $modUser->tblpengguna_lastlogin = date('Y-m-d H:i:s');
			// $modUser->tblpengguna_lastloginip = LokalIndonesia::get_ip();

			if ($modUser->save()) {
				$modUser = Tblpengguna::model()->findByPk($id);
				$pass = DMSec::decrypt($modUser->TBLPENGGUNA_PASSWORD_, Yii::app()->params['salt']);
				// self::addUserChat($modUser->tblpengguna_username, $pass, $modUser->tblpengguna_email);
			}

	}

}

<?php

/**
 * 
 */
class LoginjssController extends Controller
{
	var $TOKEN = '';
	public function init()
	{
		# code...
	}

	public function actionIndex()
	{
		// $token = Yii::app()->request->getParam('token');
		$token = $_GET['token'];
		// $token = base64_decode($token);
		if (!empty($token)) {
			// echo $token;Yii::app()->end();
			$this->TOKEN = $token;
			$this->validateJSS();
		}
	}

	public function validateJSS()
	{
		$TOKEN = $this->TOKEN;
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://layananupik.jogjakota.go.id/lumen/public/jss/profile",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"authorization: Bearer {$TOKEN}",
				"cache-control: no-cache",
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			$this->redirect('https://jss.jogjakota.go.id/access_denied');
		} else {
			$r = CJSON::decode($response);
			if ($r['status']) {
				$rdata = $r['data'];
				# valid
				$ID_JSS = $rdata['id_upik'];
				$User = Pengguna::model()->findByAttributes(array('TBLPENGGUNA_IDJSS'=>($ID_JSS), 'TBLPENGGUNA_STATUS'=>'T'));
				if (!$User) {
					# tidak ada usernya, skip
					$this->redirect('https://jss.jogjakota.go.id/access_denied');
					Yii::app()->end();
					exit;
				}
				// mulai bypass login
				$model = new LoginForm;
				$model->attributes = array('username'=>$User['TBLPENGGUNA_USERNAME'], 'password'=>'FROMJSS');
				$modeljss = $model->login('jss');

				$this->redirect(Yii::app()->getBaseUrl(1));
				echo "LOGIN DENGAN JSS";
				exit;
			} else {
				$this->redirect('https://jss.jogjakota.go.id/access_denied');
				exit;
			}

		}
	}
}
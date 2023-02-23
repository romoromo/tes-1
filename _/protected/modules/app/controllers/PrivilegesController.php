<?php

class PrivilegesController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;

		$data['dataakses']=Yii::app()->db->createCommand()
		->select('TBLROLE_ID AS id,
			TBLROLE_CODE AS kode')
		->from('TBLROLE')
		->queryAll();
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionAturHakAkses()
	{
		$data = json_decode(stripslashes($_POST['datacheck']));
		$idgrup = trim($_POST['idgrup']);

		foreach ($data as $list => $val) {
			// echo $list .'=>'.$val."\n";
			$model = Tblroleprivilege::model()->findByPk($list);
			if ($model) {
				$model->TBLROLEPRIVILEGE_ISSHOW = $val;
				if ($model->save()) {
					echo "success";
				}
				else {

				}
			}
		}
		
	}

	public function actionlistAkses()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = (int) ($_POST['id']);


		$data['tree_menu'] = $this->genMenu($id);

		$role_info = Tblrole::model()->findByPk($id);

		$resnama = $role_info;

		$this->renderPartial('listhakakses', array('data'=>$data, 'judul'=>$resnama));
	}

	public function genMenu($role_id)
	{
		$data = Yii::app()->db->createCommand()
		->select('TBLMENU.TBLMENU_ID AS menu_id,
			TBLMENU.TBLMENU_ID,
			TBLMENU_KODE,
			TBLMENU_KODE AS kode,
			TBLMENU_TITLE AS title,
			TBLMENU_LINK AS url,
			TBLMENU_ICON AS icon, 
			TBLMENU_IDPARENT,
			TBLROLEPRIVILEGE_ID AS id,
			TBLROLEPRIVILEGE_ISSHOW,
			TBLROLE_ID
			')
		->from('TBLROLEPRIVILEGE')
		->join('TBLMENU','TBLROLEPRIVILEGE.TBLMENU_ID = TBLMENU.TBLMENU_ID')
		->where('TBLROLE_ID = '.$role_id)
		->order('TBLMENU_KODE ASC')
		->queryAll();
		$hasil = Tblmenu::model()->buildTree($data);
		//print_r($hasil);
		return $hasil;
	}
}
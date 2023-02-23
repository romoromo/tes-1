<?php
$data['mod_name'] = str_replace( array('.', '/') , array('') , $data['mod_name'] );
$form = 'Form.php';

$path = dirname(Yii::app()->getBasePath()).'/file/detailpajak/' . $data['mod_name'] . '/' . $form;
if (!empty($data['mod_name']) && file_exists( $path ) ): ?>
<?php include_once $path; ?>
<?php else: ?>
	<div align="center"><h3>Modul <!-- <?= $data['mod_name'] ?> --> belum tersedia</h3></div>
<?php endif ?>
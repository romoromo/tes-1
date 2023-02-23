<?php
/* @var $this TblroleController */
/* @var $model Tblrole */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'tblrole_id'); ?>
		<?php echo $form->textField($model,'tblrole_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblrole_code'); ?>
		<?php echo $form->textField($model,'tblrole_code',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblrole_desc'); ?>
		<?php echo $form->textField($model,'tblrole_desc',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
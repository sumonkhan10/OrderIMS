<?php
$this->pageTitle=Yii::app()->name . ' - লগইন';
//$this->breadcrumbs=array(
//	'লগইন',
//);
?>

<h1>লগইন</h1>

<p>আপনার লগইন পরিচয়পত্রের জন্য নিচের ফর্মটি পূরণ করুন:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">যে ফিল্ড গুলোতে <span class="required">*</span> আছে, সেগুলি প্রয়োজন.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
<!--		<p class="hint">
			Hint: You may login with <tt>demo/demo</tt> or <tt>admin/admin</tt>.
		</p>-->
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('লগইন'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

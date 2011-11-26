<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'visit-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'import_id'); ?>
		<?php echo $form->textField($model,'import_id'); ?>
		<?php echo $form->error($model,'import_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'training_id'); ?>
		<?php echo $form->textField($model,'training_id',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'training_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visit_id'); ?>
		<?php echo $form->textField($model,'visit_id',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'visit_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'field_officer'); ?>
		<?php echo $form->textField($model,'field_officer',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'field_officer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'due_date'); ?>
		<?php echo $form->textField($model,'due_date',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'due_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'completed_date'); ?>
		<?php echo $form->textField($model,'completed_date',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'completed_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apprentice_first_name'); ?>
		<?php echo $form->textField($model,'apprentice_first_name',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'apprentice_first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apprentice_surname'); ?>
		<?php echo $form->textField($model,'apprentice_surname',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'apprentice_surname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employer_id'); ?>
		<?php echo $form->textField($model,'employer_id',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'employer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employer_name'); ?>
		<?php echo $form->textField($model,'employer_name',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'employer_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
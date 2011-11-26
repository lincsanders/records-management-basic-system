<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'apprentice-form',
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
		<?php echo $form->labelEx($model,'apprentice_date_of_birth'); ?>
		<?php echo $form->textField($model,'apprentice_date_of_birth',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'apprentice_date_of_birth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apprentice_phone'); ?>
		<?php echo $form->textField($model,'apprentice_phone',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'apprentice_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apprentice_mobile'); ?>
		<?php echo $form->textField($model,'apprentice_mobile',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'apprentice_mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apprentice_email'); ?>
		<?php echo $form->textField($model,'apprentice_email',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'apprentice_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'trade'); ?>
		<?php echo $form->textField($model,'trade',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'trade'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'field_officer'); ?>
		<?php echo $form->textField($model,'field_officer',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'field_officer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expected_end_date'); ?>
		<?php echo $form->textField($model,'expected_end_date',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'expected_end_date'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'employer_address'); ?>
		<?php echo $form->textField($model,'employer_address',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'employer_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employer_suburb'); ?>
		<?php echo $form->textField($model,'employer_suburb',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'employer_suburb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employer_state'); ?>
		<?php echo $form->textField($model,'employer_state',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'employer_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employer_postcode'); ?>
		<?php echo $form->textField($model,'employer_postcode',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'employer_postcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employer_contact'); ?>
		<?php echo $form->textField($model,'employer_contact',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'employer_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employer_phone'); ?>
		<?php echo $form->textField($model,'employer_phone',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'employer_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employer_mobile'); ?>
		<?php echo $form->textField($model,'employer_mobile',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'employer_mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employer_email'); ?>
		<?php echo $form->textField($model,'employer_email',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'employer_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'next_visit_date'); ?>
		<?php echo $form->textField($model,'next_visit_date',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'next_visit_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'import_id'); ?>
		<?php echo $form->textField($model,'import_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'training_id'); ?>
		<?php echo $form->textField($model,'training_id',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apprentice_first_name'); ?>
		<?php echo $form->textField($model,'apprentice_first_name',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apprentice_surname'); ?>
		<?php echo $form->textField($model,'apprentice_surname',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apprentice_date_of_birth'); ?>
		<?php echo $form->textField($model,'apprentice_date_of_birth',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apprentice_phone'); ?>
		<?php echo $form->textField($model,'apprentice_phone',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apprentice_mobile'); ?>
		<?php echo $form->textField($model,'apprentice_mobile',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apprentice_email'); ?>
		<?php echo $form->textField($model,'apprentice_email',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trade'); ?>
		<?php echo $form->textField($model,'trade',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'field_officer'); ?>
		<?php echo $form->textField($model,'field_officer',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expected_end_date'); ?>
		<?php echo $form->textField($model,'expected_end_date',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employer_id'); ?>
		<?php echo $form->textField($model,'employer_id',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employer_name'); ?>
		<?php echo $form->textField($model,'employer_name',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employer_address'); ?>
		<?php echo $form->textField($model,'employer_address',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employer_suburb'); ?>
		<?php echo $form->textField($model,'employer_suburb',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employer_state'); ?>
		<?php echo $form->textField($model,'employer_state',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employer_postcode'); ?>
		<?php echo $form->textField($model,'employer_postcode',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employer_contact'); ?>
		<?php echo $form->textField($model,'employer_contact',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employer_phone'); ?>
		<?php echo $form->textField($model,'employer_phone',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employer_mobile'); ?>
		<?php echo $form->textField($model,'employer_mobile',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employer_email'); ?>
		<?php echo $form->textField($model,'employer_email',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'next_visit_date'); ?>
		<?php echo $form->textField($model,'next_visit_date',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
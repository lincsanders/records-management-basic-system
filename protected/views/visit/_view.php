<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('import_id')); ?>:</b>
	<?php echo CHtml::encode($data->import_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('training_id')); ?>:</b>
	<?php echo CHtml::encode($data->training_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visit_id')); ?>:</b>
	<?php echo CHtml::encode($data->visit_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field_officer')); ?>:</b>
	<?php echo CHtml::encode($data->field_officer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('due_date')); ?>:</b>
	<?php echo CHtml::encode($data->due_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('completed_date')); ?>:</b>
	<?php echo CHtml::encode($data->completed_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('apprentice_first_name')); ?>:</b>
	<?php echo CHtml::encode($data->apprentice_first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apprentice_surname')); ?>:</b>
	<?php echo CHtml::encode($data->apprentice_surname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employer_id')); ?>:</b>
	<?php echo CHtml::encode($data->employer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employer_name')); ?>:</b>
	<?php echo CHtml::encode($data->employer_name); ?>
	<br />

	*/ ?>

</div>
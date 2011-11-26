<?php
$this->breadcrumbs=array(
	'Apprentices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Apprentice', 'url'=>array('index')),
	array('label'=>'Create Apprentice', 'url'=>array('create')),
	array('label'=>'Update Apprentice', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Apprentice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Apprentice', 'url'=>array('admin')),
);
?>

<h1>View Apprentice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'import_id',
		'training_id',
		'apprentice_first_name',
		'apprentice_surname',
		'apprentice_date_of_birth',
		'apprentice_phone',
		'apprentice_mobile',
		'apprentice_email',
		'trade',
		'field_officer',
		'start_date',
		'expected_end_date',
		'employer_id',
		'employer_name',
		'employer_address',
		'employer_suburb',
		'employer_state',
		'employer_postcode',
		'employer_contact',
		'employer_phone',
		'employer_mobile',
		'employer_email',
		'next_visit_date',
	),
)); ?>

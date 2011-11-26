<?php
$this->breadcrumbs=array(
	'Apprentices'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Apprentice', 'url'=>array('index')),
	array('label'=>'Create Apprentice', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('apprentice-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Apprentices</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'apprentice-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'import_id',
		'training_id',
		'apprentice_first_name',
		'apprentice_surname',
		'apprentice_date_of_birth',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

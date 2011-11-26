<?php
$this->breadcrumbs=array(
	'Imports'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Import', 'url'=>array('index')),
	array('label'=>'Create Import', 'url'=>array('create')),
	array('label'=>'Update Import', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Import', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Import', 'url'=>array('admin')),
);
?>

<h1>View Import #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'filename',
		'datetime',
	),
)); ?>

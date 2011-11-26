<?php
$this->breadcrumbs=array(
	'Imports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Import', 'url'=>array('index')),
	array('label'=>'Create Import', 'url'=>array('create')),
	array('label'=>'View Import', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Import', 'url'=>array('admin')),
);
?>

<h1>Update Import <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
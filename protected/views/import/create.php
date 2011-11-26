<?php
$this->breadcrumbs=array(
	'Imports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Import', 'url'=>array('index')),
	array('label'=>'Manage Import', 'url'=>array('admin')),
);
?>

<h1>Create Import</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
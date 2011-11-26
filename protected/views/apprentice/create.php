<?php
$this->breadcrumbs=array(
	'Apprentices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Apprentice', 'url'=>array('index')),
	array('label'=>'Manage Apprentice', 'url'=>array('admin')),
);
?>

<h1>Create Apprentice</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
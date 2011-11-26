<?php
$this->breadcrumbs=array(
	'Imports',
);

$this->menu=array(
	array('label'=>'Create Import', 'url'=>array('create')),
	array('label'=>'Manage Import', 'url'=>array('admin')),
);
?>

<h1>Imports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

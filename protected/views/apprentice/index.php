<?php
$this->breadcrumbs=array(
	'Apprentices',
);

$this->menu=array(
	array('label'=>'Create Apprentice', 'url'=>array('create')),
	array('label'=>'Manage Apprentice', 'url'=>array('admin')),
);
?>

<h1>Apprentices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

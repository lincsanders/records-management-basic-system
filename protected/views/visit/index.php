<?php
$this->breadcrumbs=array(
	'Visits',
);

$this->menu=array(
	array('label'=>'Create Visit', 'url'=>array('create')),
	array('label'=>'Manage Visit', 'url'=>array('admin')),
);
?>

<h1>Visits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

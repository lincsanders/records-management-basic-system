<Record>
<?php foreach($model->attributes as $fieldName => $value): ?>
	<<?=$model->getAttributeLabel($fieldName)?>><?=$value?></<?=$model->getAttributeLabel($fieldName)?>>
<?php endforeach; ?>
</Record>

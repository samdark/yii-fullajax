<?php $this->renderPartial('_menu')?>

<?php
$dataProvider = new CArrayDataProvider(array(
	array(
		'id' => 1,
		'name' => 'Wei Zhuo',
	),
	array(
		'id' => 2,
		'name' => 'Qiang Xue',
	),
	array(
		'id' => 3,
		'name' => 'Sebastián Thierer',
	),
	array(
		'id' => 4,
		'name' => 'Alexander Makarov',
	),
	array(
		'id' => 5,
		'name' => 'Maurizio Domba',
	),
	array(
		'id' => 6,
		'name' => 'Y!!',
	),
	array(
		'id' => 7,
		'name' => 'Jeffrey Winesett',
	),
	array(
		'id' => 8,
		'name' => 'Jonah Turnquist',
	),
	array(
		'id' => 9,
		'name' => 'István Beregszászi',
	),
), array(
	'id'=>'user',
	'sort'=>array(
		'attributes'=>array(
	   		'id', 'name',
		),
	),
	'pagination'=>array(
		'pageSize'=>5,
	),
));

$this->widget('zii.widgets.grid.CGridView', array(
      'dataProvider'=>$dataProvider,
))?>
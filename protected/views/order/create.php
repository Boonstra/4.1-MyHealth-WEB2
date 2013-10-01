<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Create',
);
$this->menu=array(
	array('label'=>'View Bill', 'url'=>array('/bill/view','id'=>$model->bill_id)),
);
?>

<h1>Create Order</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
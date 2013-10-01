<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs = array(
    'Orders' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Add Order', 'url' => array('create')),
    array('label' => 'Manage Bill', 'url' => array('bill/view', 'id' => $model->bill_id)),
);
?>

<h1>Update Order <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
<?php
/* @var $this BillController */
/* @var $model Bill */

$this->breadcrumbs = array(
    'Bills' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'New Bill', 'url' => array('create')),
    array('label' => 'Update Bill', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Bill', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Add Order', 'url' => array('order/create', 'bill_id' => $model->id)),
);
?>

<h1>View Bill #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'name' => 'username',
            'value' => $model->user->username,
        ),
        array(
            'name' => 'paid',
            'value' => $model->paid == 1 ? "Yes" : "No",
        ),
        array(
            'name' => 'payment_by',
            'value' => $model->payment_by == 1 ? "Bedrijf" : "User",
        ),
        array(
            'name' => 'Total price',
            'value' => $model->getTotalPrice(),
        ),
    ),
));
?>

<h2>Orders:</h2>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'order-grid',
    'dataProvider' => new CArrayDataProvider($model->orders),
    'filter' => Order::model(),
    'columns' => array(
        'description',
        'code',
        'price',
        array
            (
            'class' => 'CButtonColumn',
            'template' => '{update}{delete}',
            'buttons' => array
                (
                'update' => array
                    (
                    'label' => 'Update',
                    'url' => 'Yii::app()->createUrl("order/update", array("id"=>$data->id,"bill_id"=>$data->bill->id))',
                ),
                'delete' => array
                    (
                    'label' => 'Delete',
                    'url' => 'Yii::app()->createUrl("order/delete", array("id"=>$data->id))',
                ),
            ),
        ),
    ),
));
?>
<?php
echo CHtml::link("Add Order", array('order/create', 'bill_id' => $model->id));
?>
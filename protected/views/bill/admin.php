<?php
/* @var $this BillController */
/* @var $model Bill */

$this->breadcrumbs = array(
    'Bills' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'New Bill', 'url' => array('create')),
);
?>

<h1>Manage Bills</h1>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'bill-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'user_id',
            'value' => '$data->user->id == 1 ? "User":"Bedrijf"', //@todo, translate
            'filter' => CHtml::dropDownList('Bill[user_id]', $model->user_id, CHtml::listData(array_merge(array('id'=>'','username'=>''), User::model()->findAll()), 'id', 'username')),
        ),
        array(
            'name' => 'paid',
            'value' => '$data->paid == 1 ? "Yes":"No"', //@todo, translate
            'filter' => CHtml::dropDownList('Bill[paid]', $model->paid, CHtml::listData(
                            array(
                        array('value' => '', 'name' => ''),
                        array('value' => 1, 'name' => 'Yes'),
                        array('value' => 0, 'name' => 'No'),
                            ), 'value', 'name')
            ),
        ),
        array(
            'name' => 'payment_by',
            'value' => '$data->payment_by == 1 ? "User":"Bedrijf"', //@todo, translate
            'filter' => CHtml::dropDownList('Bill[payment_by]', $model->payment_by, CHtml::listData(
                            array(
                        array('value' => '', 'name' => ''),
                        array('value' => 1, 'name' => 'User'),
                        array('value' => 0, 'name' => 'Bedrijf'),
                            ), 'value', 'name')
            ),
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>

<?php

/**
 * This is the model class for table "tbl_bill".
 *
 * The followings are the available columns in table 'tbl_bill':
 * @property integer $id
 * @property integer $user_id
 * @property integer $paid
 * @property integer $payment_by
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Order[] $orders
 */
class Bill extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_bill';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, payment_by', 'required'),
            array('user_id, paid, payment_by', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, paid, payment_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'orders' => array(self::HAS_MANY, 'Order', 'bill_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'paid' => 'Paid',
            'payment_by' => 'Payment By',
        );
    }

    public function getTotalPrice() {
        $sum = 0;
        foreach ($this->orders as $order) {
            $sum += $order->price;
        }
        return $sum;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('paid', $this->paid);
        $criteria->compare('payment_by', $this->payment_by);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Bill the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

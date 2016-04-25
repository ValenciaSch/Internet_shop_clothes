<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Order".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_delivery
 * @property string $address_delivery
 * @property integer $id_payment
 * @property string $comments
 * @property double $total_sum
 * @property string $date
 *
 * @property Delivery $idDelivery
 * @property Payment $idPayment
 * @property User1 $idUser
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_delivery', 'address_delivery', 'id_payment', 'comments', 'total_sum'], 'required'],
            [['id_user', 'id_delivery', 'id_payment'], 'integer'],
            [['total_sum'], 'number'],
            [['date'], 'safe'],
            [['address_delivery', 'comments'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_delivery' => 'Id Delivery',
            'address_delivery' => 'Address Delivery',
            'id_payment' => 'Id Payment',
            'comments' => 'Comments',
            'total_sum' => 'Total Sum',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDelivery()
    {
        return $this->hasOne(Delivery::className(), ['id' => 'id_delivery']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPayment()
    {
        return $this->hasOne(Payment::className(), ['id' => 'id_payment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User1::className(), ['id' => 'id_user']);
    }
}

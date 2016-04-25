<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "OrderGoods".
 *
 * @property integer $id
 * @property integer $id_order
 * @property integer $id_goods
 * @property string $color
 * @property string $size
 * @property integer $quantity
 * @property double $price
 * @property double $sum
 * @property string $date
 */
class Order_goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Order_goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_order', 'id_goods', 'color', 'size', 'quantity', 'price', 'sum'], 'required'],
            [['id_order', 'id_goods', 'quantity'], 'integer'],
            [['price', 'sum'], 'number'],
            [['date'], 'safe'],
            [['color'], 'string', 'max' => 255],
            [['size'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_order' => 'Id Order',
            'id_goods' => 'Id Goods',
            'color' => 'Color',
            'size' => 'Size',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'sum' => 'Sum',
            'date' => 'Date',
        ];
    }
}

<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Category3".
 *
 * @property integer $id
 * @property string $id_catygory2
 * @property string $name
 */
class Category3 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Category3';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_catygory2', 'name'], 'required'],
            [['id_catygory2'], 'string', 'max' => 11],
            [['name'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_catygory2' => 'Id Catygory2',
            'name' => 'Name',
        ];
    }
}

<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Category2".
 *
 * @property integer $id
 * @property integer $id_category
 * @property string $name
 */
class Category2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Category2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_category', 'name'], 'required'],
            [['id_category'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_category' => 'Id Category',
            'name' => 'Name',
        ];
    }
}

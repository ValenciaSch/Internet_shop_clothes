<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Goods".
 *
 * @property integer $id
 * @property string $name
 * @property integer $id_brands
 * @property integer $id_category1
 * @property integer $id_category2
 * @property integer $id_category3
 * @property string $img
 * @property string $id_color
 * @property string $img_clothers
 * @property string $id_size
 * @property string $img_slide
 * @property string $short_description
 * @property string $full_description
 * @property integer $visible
 * @property integer $hits
 * @property integer $new1
 * @property integer $sale
 * @property double $price
 * @property string $date
 *
 * @property Category1 $idCategory1
 * @property Category2 $idCategory2
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'id_brands', 'id_category1', 'id_category2', 'id_category3', 'img', 'id_color', 'img_clothers', 'id_size', 'img_slide', 'short_description', 'full_description','visible',  'price'], 'required'],
            [['id_brands', 'id_category1', 'id_category2',  'visible', 'hits', 'new1', 'sale'], 'integer'],
            [['short_description', 'full_description', 'id_category3'], 'string'],
            [['price'], 'number'],
            [['date'], 'safe'],
            [['name', 'img', 'id_color', 'img_clothers', 'id_size', 'img_slide'], 'string', 'max' => 255],
          //  [['img_clothers', 'img_slide',], 'file', 'skipOnEmpty' => false, 'extensions' => ' jpg', 'maxFiles' => 10],
          
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'id_brands' => 'Id Brands',
            'id_category1' => 'Id Category1',
            'id_category2' => 'Id Category2',
            'id_category3' => 'Id Category3',
            'img' => 'Img',
            'id_color' => 'Id Color',
            'img_clothers' => 'Img Clothers',
            'id_size' => 'Id Size',
            'img_slide' => 'Img Slide',
            'short_description' => 'Short Description',
            'full_description' => 'Full Description',
            'visible' => 'Visible',
            'hits' => 'Hits',
            'new1' => 'New1',
            'sale' => 'Sale',
            'price' => 'Price',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategory1()
    {
        return $this->hasOne(Category1::className(), ['id' => 'id_category1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategory2()
    {
        return $this->hasOne(Category2::className(), ['id' => 'id_category2']);
    }
    
    
    //добавление данных в БД из файла
    /* public function upload($imageFiles)
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
    */
    
    
    
}

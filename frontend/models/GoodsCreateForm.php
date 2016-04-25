<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\Goods;
/**
 */
class GoodsCreateForm extends Model
{

    public $name;
    public  $id_brands;
    public  $id_category1;
    public $id_category2;
    public $id_category3;
    public  $img;
    public  $id_color;
    public $img_clothers;
    public $img_slide;
    public $id_size;
    public  $short_description;
    public  $full_description;
    public $visible;
    public $hits;
    public $new1;
    public  $sale;
    public $price;
    
    public function rules()
    {
        return [
            [['name', 'id_brands', 'id_category1', 'id_category2', 'id_category3', 'img', 'id_color', 'img_clothers', 'id_size', 'img_slide', 'short_description', 'full_description','visible',  'price'], 'required'],
            [['id_brands', 'id_category1', 'id_category2', 'id_category3', 'visible', 'hits', 'new1', 'sale'], 'integer'],
            [['short_description', 'full_description', ], 'string'],
            [['price'], 'number'],
            [['date'], 'safe'],
            [['name', 'img', 'id_color', 'img_clothers', 'id_size', 'img_slide'], 'string', 'max' => 255],
            [['img_clothers', 'img_slide',], 'file', 'skipOnEmpty' => false, 'extensions' => ' jpg', 'maxFiles' => 10],
          
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

   
    
    
     public function saveCreate()
    {       
     
      $str_id_category3=implode("; ", $this->id_category3);
    
      
        //подключение к БД
          $db=Yii::$app->db;
                $db->createCommand()->insert('Goods', [
                'name' => $this->name,
                'id_brands' => $this->id_brands,
                'id_category1' =>$this->id_category1,
                'id_category2' => $this->id_category2,
                'id_category3' => $str_id_category3,
               // 'img' => $this->img,
                'id_color' => $this->id_color,
             //   'img_clothers' => $this->img_clothers,
                'id_size' => $this->id_size,
              //  'img_slide' => $this->img_slide,
                'short_description' => $this->short_description,
                'full_description' => $this->full_description,
                'visible' => $this->visible,
                'hits' => $this->hits,
                'new1' => $this->new1,
                'sale' => $this->sale,
                'price' => $this->price,
                    
                ])->execute();
               
               
              
    }
    
    //обновление  в БД  данных .
     public function updateCreate($id, $img, $img_clothers, $img_slide )
    {
            $db=Yii::$app->db;
           $db->createCommand()->update('Goods', [ 'img' => $img, 'img_clothers' => $img_clothers, 'img_slide' =>$img_slide], $id)->execute();
   } 
}

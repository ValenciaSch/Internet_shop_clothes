<?php
namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadTableForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;
    public $file_id;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
             [['file', 'file_id'], 'file', 'extensions' => 'xml','message' => 'Файлы можно загружать только с расширением xml!'],
        ];
    }
    public function saveTable ($file) 
    {
      //  echo Yii::getAlias('@upload');
       // $path1=Yii::getAlias('@app');
     // $path=$path1.'web\upload\';
     //Открытие и чтение xml файла
       $xmlfile=\Yii::getAlias('@uploads').$file;
       $xml = simplexml_load_file($xmlfile);

        //подключение к БД
        $db=\Yii::$app->db;
        
        if (count($xml)>0){
            
            foreach($xml as $key)
            
            {  
              //сохранение данных в таблицу из файла
            
                    $db->createCommand()->insert('Goods', [
                        'name' => $key->name,
                        'id_brands' =>$key->id_brands,
                        'id_category1' => $key->id_category1,
                        'id_category2' => $key->id_category2,
                        'id_category3' => $key->id_category3,
                        'img' =>$key->img,
                        'id_color' =>$key->id_color,
                        'img_clothers' => $key->img_clothers,
                        'id_size' => $key->id_size,
                        'img_slide' => $key->img_slide,
                        'short_description' =>$key->short_description,
                        'full_description' =>$key->full_description,
                        'visible' =>$key->visible,
                        'hits' => $key->hits,
                        'new1' => $key->new1,
                        'sale' => $key->sale,
                        'price' =>$key->price,
                    ])->execute();            
            }
            
            //удаляем файл            
            unlink($xmlfile);
            return true;
      }
      return false;
      
    }
    
    
     public function updateTable($file_id )
    {
        
        //Открытие и чтение xml файла
       $xmlfile=\Yii::getAlias('@uploads').$file_id;
       $xml = simplexml_load_file($xmlfile);

          //подключение к БД       
             $db=\Yii::$app->db;
            
            if (count($xml)>0){
                
              foreach($xml as $key)
            
            { 
                $id="id=".$key->id;
              $db->createCommand()->update('Goods', ['price' =>$key->price ], $id)->execute();
              
              }
               //удаляем файл            
            unlink($xmlfile);
            return true;
      }
      return false;
   } 
}
?>
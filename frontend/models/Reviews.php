<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Reviews".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $name_user
 * @property integer $id_good
 * @property string $message
 * @property string $date
 */
class Reviews extends \yii\db\ActiveRecord
{
  /*  public $id_user;
    public $name_user;
    public $id_good;
    public $message;*/
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_user', 'message'], 'required'],
            [['id_user', 'id_good'], 'integer'],
            [['message','name_user'], 'string'],
            [['date'], 'safe'],
            [['name_user','message'], 'string', 'min' => 2, 'max' => 250],
            
             // проверяет, что "username" начинается с буквы и содержит только буквенные символы,
            // числовые символы и знак подчеркивания
         // [ 'name_user', 'match', 'pattern' => '/^[a-z]\w*$/i'],
          
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
            'name_user' => 'Name User',
            'id_good' => 'Id Good',
            'message' => 'Message',
            'date' => 'Date',
        ];
    }
    
    
    
  public function saveReviews ($id)
    { 
        //подключение к БД
        $db=Yii::$app->db;
        
         if (!Yii::$app->user->isGuest)
            {
                  $id_reviews=Reviews::find()->where(['id_user' =>$this->id_user,'id_good' =>$id, 'message' => htmlentities($this->message )])->one();
                 // INSERT (table name, column values)
                  if (!isset($id_reviews->id)){
                    $db->createCommand()->insert('Reviews', [
                        'id_user' =>Yii::$app->user->id,
                        'id_good' => $id,
                        'message' => htmlentities($this->message ),                   
                    ])->execute();
                   }  
            }
       else {
        
            $id_reviews=Reviews::find()->where(['name_user' =>htmlentities($this->name_user ),'id_good' =>$id, 'message' => htmlentities($this->message )])->one();
            if (!isset($id_reviews->id)){
                $db->createCommand()->insert('Reviews', [
                        'name_user' =>htmlentities($this->name_user ),
                        'id_good' => $id,
                        'message' => htmlentities($this->message ),                  
                    ])->execute();                     
                }
            }
         
    }
   
    
}

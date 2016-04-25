<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ListGoodsForm extends Model
{
    public $checkboxListColor;
    public $checkboxListSize;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [       
                 ['checkboxListColor', 'safe'],
                 ['checkboxListSize', 'safe']
                 
                    
          //  [['listColor', 'listSize', 'quantity'], 'required','message' => 'Поле должно быть обязательно заполнено!'],
           //  ['listSize', 'required','message' => 'Поле должно быть обязательно заполнено!'],
        ];
    }

public function attributeLabels()
    {
        return [
            'checkboxListColor' => '',
            'checkboxListSize' => '',   
        ];
    }
    
    /**
 * @return array
 */
public function getCheckboxListColor()
{
    return $this->checkboxListColor;
}

/**
 * @param array $Color
 */
public function setCheckboxListColor($checkboxListColor)
{
    /**
     * Здесь в приватном свойстве requirements после load будет хранится массив
     */
    $this->checkboxListColor = $checkboxListColor;
}


/**
 * @return array
 */
public function getCheckboxListSize()
{
    return $this->checkboxListSize;
}

/**
 * @param array $Size
 */
public function setCheckboxListSize($checkboxListSize)
{
    /**
     * Здесь в приватном свойстве requirements после load будет хранится массив
     */
    $this->checkboxListSize = $checkboxListSize;
}

   
}

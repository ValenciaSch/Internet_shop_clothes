<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

use frontend\models\User1;

/**
 * ContactForm is the model behind the contact form.
 */
class LoginForm extends Model
{
    public $login;
    public $password;
    public $rememberMe = true;
    public $status;

    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        
            [['login','password'], 'filter', 'filter' => 'trim'],
            [['login','password'], 'required', 'message' => 'Поле должно быть обязательно заполнено!'],
          //  ['login', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Ётот Ћогин уже зан¤т.'],
             ['login', 'string', 'min' => 2, 'max' => 255, 'message' => 'Поле должно содержать больше 2 символов!'],

          
             // ['password', 'required'],
              ['password', 'string', 'min' => 6, 'message' => 'Поле должно содержать больше 6 символов!'],
       
        //    [['login', 'password'], 'required', 'on' => 'default'],
         //   [ 'password', 'required', 'on' => 'loginWithEmail'],            
        //    ['rememberMe', 'boolean'],
         //   ['password', 'validatePassword'],
       
       
        ];
    }

public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня'
           
        ];
    }
    
  /*   public function validatePassword($attribute)
    {
        if (!$this->hasErrors()):
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)):
                $field = ($this->scenario === 'loginWithEmail') ? 'email' : 'username';
                $this->addError($attribute, 'Неправильный '.$field.' или пароль.');
            endif;
        endif;
    }
    public function getUser()
    {
        if ($this->_user === false):
            if($this->scenario === 'loginWithEmail'):
                $this->_user = User1::findByEmail($this->email);
            else:
                $this->_user = User1::findByUsername($this->login);
            endif;
        endif;
        return $this->_user;
    }
    
    public function login()
    {
        if ($this->validate()):
            $this->status = ($user = $this->getUser()) ? $user->status : User1::STATUS_NOT_ACTIVE;
            if ($this->status === User1::STATUS_ACTIVE):
                return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
            else:
                return false;
            endif;
        else:
            return false;
        endif;
    }
    */
     public function hashPassword($passwd)
    {
    return md5($passwd);
    } 
    
      public function signup()
    {
        if ($this->validate()) {
            $user = new User1();
            $user->login = $this->login;
             $user->password = $this->password;
          //  $user->email = $this->email;
          // Хешировать пароль
           // $user->password = $this->hashPassword($password);          
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
   
}

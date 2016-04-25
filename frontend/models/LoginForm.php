<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
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
            // username and password are both required
            [['login', 'password'], 'required', 'message' => 'Поле должно быть обязательно заполнено!'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
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
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неверный Пароль или Логин ');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $this->status = ($user = $this->getUser()) ? $user->status : User1::STATUS_NOT_ACTIVE;
            if ($this->status === User1::STATUS_ACTIVE){
                return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);                
            } 
            else { 
                if ($this->status === User1::STATUS_ADMIN){
                    return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
                  } 
            
             return false;
           }
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user =User1::findByUsername($this->login); //User1::find()->where(['login' => $this->login])->one()
        }

        return $this->_user;
    }
}

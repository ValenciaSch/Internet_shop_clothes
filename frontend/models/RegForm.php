<?php
namespace frontend\models;


use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class RegForm extends Model
{
   
    public $lastname;
    public $firstname;
    public $patronymic;
    public $telephone;
    public $email;
    public $login;
    public $password;
    public $repassword; //повторите пароль
    
    public $status;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
       
           // обрезает пробелы вокруг "username" и "email"
           [[ 'lastname','firstname','patronymic','login','email','telephone', 'password','repassword'], 'filter', 'filter' => 'trim'],
           [['lastname','firstname','patronymic','login','email','telephone', 'password','repassword'], 'required', 'message' => 'Поле должно быть обязательно заполнено!'], 
        
        
         // проверяет, что "username" начинается с буквы и содержит только буквенные символы,
       // числовые символы и знак подчеркивания
      //    [ 'lastname', 'match', 'pattern' => '/^[a-z]\w*$/i'],
       //   [ 'firstname', 'match', 'pattern' => '/^[a-z]\w*$/i'],
       //   [ 'patronymic', 'match', 'pattern' => '/^[a-z]\w*$/i'],
          [ 'login', 'match', 'pattern' => '/^[a-z]\w*$/i'],
        
                             
            [['lastname','firstname','patronymic','login'], 'string', 'min' => 2, 'max' => 255, 'message' => 'Поле должно содержать больше 2 символов!'],
            
           // ['firstname', 'filter', 'filter' => 'trim'],
           // ['firstname', 'required'],            
           // ['firstname', 'string', 'min' => 2, 'max' => 255],
            
            //['patronymic', 'filter', 'filter' => 'trim'],
           // ['patronymic', 'required'],            
          //  ['patronymic', 'string', 'min' => 2, 'max' => 255],
            
          //  ['login', 'filter', 'filter' => 'trim'],
          //  ['login', 'required'],
           ['login', 'unique', 'targetClass' => User1::className(), 'message' => 'Этот Логин уже занят.'],
          //  ['login', 'string', 'min' => 2, 'max' => 255],

          //  ['email', 'filter', 'filter' => 'trim'],
          // // ['email', 'required'],
            ['email', 'email', 'message' => 'Некорректный email адресс!'],
            ['email', 'string', 'max' => 255],
            
            
         //  ['telephone', 'filter', 'filter' => 'trim'],
          // ['telephone', 'required'],            
          // ['telephone', 'match', 'pattern'=>'^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$', 'message'=>'Tags can only contain word characters.'],
           

             // ['password', 'required'],
              [['password','repassword'], 'string', 'min' => 6,'message' => 'Длина Пароля должна быть больше 6 символов!'],
            
            //  ['repassword', 'required'],
              ['repassword', 'compare', 'compareAttribute' => 'password'],
              
            /*  ['status', 'default', 'value' => User1::STATUS_ACTIVE, 'on' => 'default'],
                ['status', 'in', 'range' =>[
                    User1::STATUS_NOT_ACTIVE,
                    User1::STATUS_ACTIVE
                ]],
                ['status', 'default', 'value' => User1::STATUS_NOT_ACTIVE, 'on' => 'emailActivation'],   
              */              
                           
              
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'lastname' => 'Фамилия',
            'firstname' => 'Имя',
            'patronymic' => 'Отчество',
            'login' => 'Логин',
            'email' => 'Еmail',
            'telephone' => 'Телефон',
            'password' => 'Пароль',
            'repassword' => 'Пароль*',
        ];
    }
    
     public function reg()
    {
        $user = new User1();
        $user->lastname = $this->lastname;
        $user->firstname = $this->firstname;
        $user->patronymic = $this->patronymic;
        $user->telephone = $this->telephone;
        $user->login = $this->login;
        $user->email = $this->email;       
        $user->setPassword($this->password);
        $user->generateAuthKey();
        if($this->scenario === 'emailActivation')
            $user->generateSecretKey();
        return $user->save() ? $user : null;
    }
    
    
    public function sendActivationEmail($user)
    {
        return Yii::$app->mailer->compose('activationEmail', ['user' => $user])
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name.' (отправлено роботом).'])
            ->setTo($this->email)
            ->setSubject('Активация для '.Yii::$app->name)
            ->send();
    }
}
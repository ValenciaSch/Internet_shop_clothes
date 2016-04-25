<?php 
namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;



class BehaviorsController  extends Controller
{

public function behaviors()
    {
       return [
            'access' => [
                'class' => AccessControl::className(),               
                'rules' => [
                   
                    [
                        'allow' => true,
                        'controllers' => [ 'goods','user1', 'order', 'order_goods', 'default'  ],//
                        // 'actions' => ['index'],
                      //  'verbs' => ['GET', 'POST'],
                        //'roles' => ['@']
                          'matchCallback' => function ($rule, $action) {
                            
                            return Yii::$app->user->identity->admin == '20';
                        }
                    ],
                 
                ],
            ],
        ];
   
    }
}


?>
<?php
namespace app\modules\admin\controllers;

use Yii;
use frontend\models\Order;
use frontend\models\Search\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\UploadTableForm;
class DefaultController extends Controller
{
    //подключение шапки
     public $layout="inner";
     
      public function behaviors()
    { 
         return [
            'access' => [
                'class' => AccessControl::className(),
              //   'only' => ['index'],
                'rules' => [
                    [
                       // 'actions' => ['index'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                             return Yii::$app->user->identity->admin == '20';
                        }
                    ],
                ],
            ],
        ];
    }
     
    public function actionIndex()
    {
       // $am=Yii::app()->getBaseUrl(true);
  // $am= Yii::getFrameworkPath();
        return $this->render('index',['am' => $am]);
        
    }
    
     /**
     * Logs out the current user.
     *   Выход
     * @return mixed
     */
    public function actionLogout()
    {
        // Выходим
        \Yii::$app->user->logout();
                
        //echo "ddsd"; 
      //  die;
        return $this->goHome();
    }
    
   /*  public function actionUpload()
    {
        $model = new UploadTableForm();

     //   if (Yii::$app->request->isPost) {
        if ($model->load(\Yii::$app->request->post()))
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {                
                $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
            }
        }

        return $this->render('upload', ['model' => $model]);
    }*/
    
}

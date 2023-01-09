<?php

namespace backend\modules\api\controllers;

use stdClass;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class UsersController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            //’except' => ['index', 'view'], //Excluir aos GETs
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }
    public function auth($username, $password)
    {
        $user = \common\models\User::findByUsername($username);
        if ($user && $user->validatePassword($password))
        {
            return $user;
        }
        throw new \yii\web\ForbiddenHttpException('Sem Autenticação'); //403
    }

    public function actionLogin()
    {
        $request = Yii::$app->request;
        $params = $request->authCredentials;
        $user = \common\models\User::findByUsername($params);
        return $user;


    }

}

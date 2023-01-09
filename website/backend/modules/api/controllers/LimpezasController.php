<?php

namespace backend\modules\api\controllers;

use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class LimpezasController extends ActiveController
{
    public $modelClass = 'common\models\Limpezas';

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
        throw new \yii\web\ForbiddenHttpException('No authentication'); //403
    }
    public function actionNaopertubar($id)
    {
        $modelLimpezas = new $this->modelClass;
        $recs = $modelLimpezas::find()->where('idQuarto'==$utilizador->id)->one();
        return ['Alterado con sucesso'.$recs->estado];
    }


}

<?php

namespace backend\modules\api\controllers;

use common\models\Limpezas;
use Yii;
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

    public function actionNova(){

        $request = Yii::$app->request;

        $params = $request->getBodyParams();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;


        $limpezas = new Limpezas();
        $limpezas->idColaborador = 5;
        $limpezas->idCliente = $params['idCliente'];
        $limpezas->idQuarto = $params['idQuarto'];
        $limpezas->data = date('Y-m-d');
        $limpezas->estado = "Não Limpo";
        $limpezas->perturbar = "Perturbar";

        if ($limpezas->save()){
            return $limpezas;
        }
        else{
            return null;
        }

    }
}

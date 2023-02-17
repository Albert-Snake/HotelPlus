<?php

namespace backend\modules\api\controllers;

use common\models\Mesasmarcacoes;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class MesasmarcacoesController extends ActiveController
{
    public $modelClass = 'common\models\Mesasmarcacoes';

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


        $mesaMarcacao = new Mesasmarcacoes();
        $mesaMarcacao->nrPessoas = $params['nrpessoas'];
        $mesaMarcacao->idCliente = $params['idCliente'];
        $mesaMarcacao->idMesa = $params['idMesa'];
        $mesaMarcacao->estado = "nao entregue";
        $mesaMarcacao->data = date('Y-m-d');

        if ($mesaMarcacao->save()){
            return $mesaMarcacao;
        }
        else{
            return null;
        }

    }
}

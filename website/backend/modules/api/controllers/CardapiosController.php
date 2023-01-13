<?php

namespace backend\modules\api\controllers;

use common\models\Cardapio;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class CardapiosController extends ActiveController
{
    public $modelClass = 'common\models\Cardapio';

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

    public function actionCarnes()
    {
        $carnes = Cardapio::find()->where(['categoria'=>'Carne'])->all();
        return $carnes;
    }

    public function actionPeixes()
    {
        $peixes = Cardapio::find()->where(['categoria'=>'Peixe'])->all();
        return $peixes;
    }

    public function actionSobremesas()
    {
        $sobremesas = Cardapio::find()->where(['categoria'=>'Sobremesas'])->all();
        return $sobremesas;
    }

    public function actionBebidaslisas()
    {
        $bebidas = Cardapio::find()->where(['categoria'=>'Bebidas Lisas'])->all();
        return $bebidas;
    }

    public function actionBebidasgasosas()
    {
        $bebidas = Cardapio::find()->where(['categoria'=>'Bebidas Gasosas'])->all();
        return $bebidas;
    }

    public function actionBebidasalcolicas()
    {
        $bebidas = Cardapio::find()->where(['categoria'=>'Bebidas Alcólicas'])->all();
        return $bebidas;
    }

}

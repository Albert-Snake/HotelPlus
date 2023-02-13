<?php

namespace backend\modules\api\controllers;

use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class CalculadoraController extends ActiveController
{
    public $modelClass = 'common\models\Cardapio';



    public function actionPi()
    {
        $pi = 'PI=>3.14';
        return $pi;
    }
}

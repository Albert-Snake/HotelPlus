<?php

namespace frontend\controllers;

use common\models\Estadias;
use common\models\EstadiasSearch;
use common\models\Quartos;
use DateTime;
use Yii;
use yii\debug\models\timeline\DataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstadiasController implements the CRUD actions for Estadias model.
 */
class EstadiasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Estadias models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }else{
//            $searchModel = new EstadiasSearch();
//            $dataProvider = $searchModel->search($this->request->queryParams);
//
//            return $this->render('index', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
            $historicoEstadias = Estadias::find()
                ->where(['idCliente'=> Yii::$app->user->identity->id])
                ->all();


            return $this->render('index', [
                'historicoEstadias' => $historicoEstadias,
            ]);
        }

    }

    /**
     * Displays a single Estadias model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Estadias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($quarto)
    {
        $idQuarto = Quartos::find()->where(['id' => $quarto])->one();

        if($quarto != ''){
            $valorNoite = $idQuarto->valorNoite;
        }
        else{
            $valorNoite = null;
        }

        $model = new Estadias();
        $model->idQuarto = $quarto;
        $model->idCliente = Yii::$app->user->identity->id;
        $model->dataPedido = date('Y-m-d');
        $model->duracao = 1;
        $model->valorTotal = $valorNoite * $model->duracao;
//        $model->idQuarto = $_GET['quarto'];
//        $model->idCliente = Yii::$app->user->identity->id;
//        $model->dataPedido = date('Y-m-d');
//        $model->valorTotal = null;

//        // to refresh current action
//        $this->refresh();
//        // or
//        Yii::app()->controller->refresh();

        if ($this->request->isPost) {

//            $model->duracao = date('Y-m-d',$model->dataTermo) - date('Y-m-d', $model->dataInicio);
//            $model->valorTotal = $valorNoite * $model->lotacao;

            if ($model->load($this->request->post()) && $model->save()) {
//                return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['index', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Estadias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Estadias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Estadias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Estadias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Estadias::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
